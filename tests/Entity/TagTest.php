<?php declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Tag;
use PHPUnit\Framework\TestCase;

class TagTest extends TestCase
{

    /**
     * @var Tag
     */
    private $entity;

    /**
     * @var array
     */
    private $provider;

    public function setUp()
    {
        $this->entity = new Tag('telefon');
        $this->provider = [
            [
                'name' => 'telefon',
            ],
            [
                'name' => 'drukarka',
            ],
        ];
    }

    public function testGetId()
    {
        $id = $this->entity->getId();

        $this->assertObjectHasAttribute('id', $this->entity);
        $this->assertNull($id);
    }

    public function testGetName()
    {
        $name = $this->entity->getName();
        $this->assertSame($this->provider[0]['name'], $name);
        $this->assertNotSame($this->provider[1]['name'], $name);
    }
}
