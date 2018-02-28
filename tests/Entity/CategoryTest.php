<?php declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Category;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    /**
     * @var Category
     */
    private $entity;

    private $provider;

    public function setUp()
    {
        $now = new \DateTime();

        $this->entity = new Category(
            'Telefony',
            $now,
            $now
        );

        $this->provider = [
            [
                'title' => 'Telefony',
                'slug' => 'telefony-' . $now->format('Y-d-m-h-m'),
                'parent' => $this->createMock(Category::class),
                'created' => $now,
                'updated' => $now,
            ],
            [
                'title' => 'Meble',
                'slug' => 'meble-' . $now->format('Y-d-m-h-m'),
                'parent' => $this->createMock(Category::class),
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

    public function testGetTitle()
    {
        $title = $this->entity->getTitle();
        $this->assertSame($this->provider[0]['title'], $title);
        $this->assertNotSame($this->provider[1]['title'], $title);
    }

    public function testGetSlug()
    {
        $this->entity->setSlug($this->provider[0]['slug']);

        $slug = $this->entity->getSlug();
        $this->assertSame($this->provider[0]['slug'], $slug);
        $this->assertNotSame($this->provider[1]['slug'], $slug);
    }

    public function testGetParent()
    {
        $parent = $this->entity->getParent();
        $this->assertNull(null, $parent);
        $this->assertNotSame($this->provider[1]['parent'], $parent);
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
