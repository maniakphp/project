<?php declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Location;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LocationFixtures
 *
 * @package App\DataFixtures
 */
class LocationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $locations = [
            'rzeszow' => 'Rzeszow',
            'wroclaw' => 'Wroclaw',
            'gdansk' => 'Gdańsk',
        ];

        foreach ($locations as $slug => $location) {
            $locationEntity = new Location($slug, $location);
            $this->addReference('location_' . $slug, $locationEntity);

            $manager->persist($locationEntity);
        }

        $manager->flush();
    }
}
