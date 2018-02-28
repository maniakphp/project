<?php declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Location;
use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase
{

    /**
     * @var Location
     */
    private $entity;

    /**
     * @var array
     */
    private $provider;

    public function setUp()
    {
        $this->entity = new Location('rzeszow', 'Rzeszów')  ;
        $this->provider = [
            [
                'slug' => 'rzeszow',
                'name' => 'Rzeszów',
            ],
            [
                'slug' => 'wroclaw',
                'name' => 'Wrocław',
            ],
        ];
    }

    public function testGetId()
    {
        $id = $this->entity->getId();

        $this->assertObjectHasAttribute('id', $this->entity);
        $this->assertNull($id);
    }

    public function testGetSlug()
    {
        $slug = $this->entity->getSlug();
        $this->assertSame($this->provider[0]['slug'], $slug);
        $this->assertNotSame($this->provider[1]['slug'], $slug);
    }

    public function testGetName()
    {
        $name = $this->entity->getName();
        $this->assertSame($this->provider[0]['name'], $name);
        $this->assertNotSame($this->provider[1]['name'], $name);
    }
}
