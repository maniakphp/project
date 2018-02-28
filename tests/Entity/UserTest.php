<?php declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    /**
     * @var User
     */
    private $entity;

    /**
     * @var array
     */
    private $provider;

    public function setUp()
    {
        $password = password_hash("@nonsePro!ect", PASSWORD_BCRYPT);
        $this->entity = new User(
            'grzeznikiewicz',
            $password,
            'grzeznikiewicz@pgs-soft.com'
        );

        $this->provider = [
            [
                'username' => 'grzeznikiewicz',
                'password' => $password,
                'email' => 'grzeznikiewicz@pgs-soft.com',
                'isActive' => true,
            ],
            [
                'username' => 'grzeznik',
                'password' => password_hash("@nonsePro!ect2018", PASSWORD_BCRYPT),
                'email' => 'grzeznik@pgs-soft.com',
                'isActive' => false,
            ],
        ];
    }

    public function testGetId()
    {
        $id = $this->entity->getId();

        $this->assertObjectHasAttribute('id', $this->entity);
        $this->assertNull($id);
    }

    public function testGetUsername()
    {
        $username = $this->entity->getUsername();
        $this->assertSame($this->provider[0]['username'], $username);
        $this->assertNotSame($this->provider[1]['username'], $username);
    }

    public function testGetPassword()
    {
        $password = $this->entity->getPassword();
        $this->assertSame($this->provider[0]['password'], $password);
        $this->assertNotSame($this->provider[1]['password'], $password);
    }

    public function testGetEmail()
    {
        $email = $this->entity->getEmail();
        $this->assertSame($this->provider[0]['email'], $email);
        $this->assertNotSame($this->provider[1]['email'], $email);
    }

    public function testIsActive()
    {
        $this->entity->setIsActive($this->provider[0]['isActive']);

        $isActive = $this->entity->isActive();
        $this->assertSame($this->provider[0]['isActive'], $isActive);
        $this->assertNotSame($this->provider[1]['isActive'], $isActive);
    }
}
