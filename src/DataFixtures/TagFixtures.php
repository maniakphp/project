<?php declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class TagFixtures
 *
 * @package App\DataFixtures
 */
class TagFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     *
     * @throws \Doctrine\Common\DataFixtures\BadMethodCallException
     */
    public function load(ObjectManager $manager)
    {
        $tags = ['rower', 'samochód', 'telefon','meble', 'laptop', 'agd'];

        foreach ($tags as $tag) {
            $tagEntity = new Tag($tag);

            $this->addReference('tag_' . $tag, $tagEntity);
            $manager->persist($tagEntity);
        }

        $manager->flush();
    }
}
