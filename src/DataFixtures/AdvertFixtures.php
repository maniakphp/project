<?php declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Advert;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class AdvertFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $now = new \DateTime();
        $tags = new ArrayCollection([$this->getReference('tag_laptop')]);
        for ($i = 1; $i <= 20; $i++) {
            $advert = new Advert($now, $now);
            $advert
                ->setCategory($this->getReference('category_cars'))
                ->setTags($tags)
                ->setLocation($this->getReference('location_rzeszow'))
                ->setUser($this->getReference('user_grzeznik'))
                ->setSlug('ogloszenie_numer_' . $i)
                ->setTitle('Ogłoszenie numer ' . $i)
                ->setContent('Treść ogłoszenia nr ' . $i);

            $manager->persist($advert);
        }
        $manager->flush();
    }

    /**
     * @return array
     */
    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
            LocationFixtures::class,
            UserFixtures::class,
            TagFixtures::class,
        ];
    }
}
