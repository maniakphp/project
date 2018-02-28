<?php declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\{
  Advert, Category,Location, User
};
use PHPUnit\Framework\TestCase;

class AdvertTest extends TestCase
{
    /**
     * @var Advert
     */
    private $entity;

    /**
     * @var array
     */
    private $provider;

    public function setUp()
    {
        $now = new \DateTime();
        $this->entity = new Advert($now, $now);

        $this->provider = [
            [
                'category' => $this->createMock(Category::class),
                'location' => $this->createMock(Location::class),
                'user' => $this->createMock(User::class),
                'slug' => 'sprzedam-telefon',
                'title' => 'Sprzedam telefon',
                'content' => 'Sprzedam telefon w bardzo dobrym stanie i niedrogo!',
                'status' => Advert::STATUS_ACTIVE,
                'created' => $now,
                'updated' => $now,
            ],
            [
                'category' => $this->createMock(Category::class),
                'location' => $this->createMock(Location::class),
                'user' => $this->createMock(User::class),
                'slug' => 'sprzdam-szafe',
                'title' => 'Sprzdam szafe',
                'content' => 'Sprzdam szafę w stanie dobrym+. Uwaga, tanio!',
                'status' => Advert::STATUS_FINISHED,
                'created' => new \DateTime(),
                'updated' => new \DateTime(),
        ],
        ];
    }

    public function testGetId()
    {
        $id = $this->entity->getId();

        $this->assertObjectHasAttribute('id', $this->entity);
        $this->assertNull($id);
    }

    public function testGetCategory()
    {
        $this->entity->setCategory($this->provider[0]['category']);

        $category = $this->entity->getCategory();
        $this->assertInstanceOf(Category::class, $category);
        $this->assertSame($this->provider[0]['category'], $category);
        $this->assertNotSame($this->provider[1]['category'], $category);
    }

    public function testGetLocation()
    {
        $this->entity->setLocation($this->provider[0]['location']);

        $location = $this->entity->getLocation();
        $this->assertInstanceOf(Location::class, $location);
        $this->assertSame($this->provider[0]['location'], $location);
        $this->assertNotSame($this->provider[1]['location'], $location);
    }

    public function testGetUser()
    {
        $this->entity->setUser($this->provider[0]['user']);

        $user = $this->entity->getUser();
        $this->assertInstanceOf(User::class, $user);
        $this->assertSame($this->provider[0]['user'], $user);
        $this->assertNotSame($this->provider[1]['user'], $user);
    }

    public function testGetSlug()
    {
        $this->entity->setSlug($this->provider[0]['slug']);

        $slug = $this->entity->getSlug();
        $this->assertSame($this->provider[0]['slug'], $slug);
        $this->assertNotSame($this->provider[1]['slug'], $slug);
    }

    public function testGetTitle()
    {
        $this->entity->setTitle($this->provider[0]['title']);

        $title = $this->entity->getTitle();
        $this->assertSame($this->provider[0]['title'], $title);
        $this->assertNotSame($this->provider[1]['title'], $title);
    }

    public function testGetContent()
    {
        $this->entity->setContent($this->provider[0]['content']);

        $content = $this->entity->getContent();
        $this->assertSame($this->provider[0]['content'], $content);
        $this->assertNotSame($this->provider[1]['content'], $content);
    }

    public function testGetStatus()
    {
        $status = $this->entity->getStatus();
        $this->assertSame($this->provider[0]['status'], $status);
        $this->assertNotSame($this->provider[1]['status'], $status);
    }

    public function testValidStatus()
    {
        $now = new \DateTime();
        $advert = new Advert($now, $now, 'expired');
        $status = $advert->getStatus();
        $this->assertNotContains($status, Advert::getStatusChoices());
    }

    public function testGetCreated()
    {
        $created = $this->entity->getCreated();
        $this->assertSame($this->provider[0]['created'], $created);
        $this->assertNotSame($this->provider[1]['created'], $created);
    }

    public function testGetUpdated()
    {
        $updated = $this->entity->getUpdated();
        $this->assertSame($this->provider[0]['updated'], $updated);
        $this->assertNotSame($this->provider[1]['updated'], $updated);
    }
}
