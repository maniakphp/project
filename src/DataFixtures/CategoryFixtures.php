<?php declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Nette\Utils\DateTime;

/**
 * Class CategoryFixtures
 *
 * @package App\DataFixtures
 */
class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $now = new DateTime();
        $carsCategory = new Category('Samochody', $now, $now);
        $usedCarsCategory = new Category('Używane', $now, $now, $carsCategory);
        $newCarsCategory = new Category('Nowe', $now, $now, $carsCategory);
        $damagedCarsCategory = new Category('Uszkodzone', $now, $now, $usedCarsCategory);
        
        $computersCategory = new Category('Komputery', $now, $now);
        $pcComputersCategory = new Category('Stacjonarne', $now, $now, $computersCategory);
        $notebookComputersCategory = new Category('Laptopy', $now, $now, $computersCategory);

        $manager->persist($carsCategory);
        $manager->persist($usedCarsCategory);
        $manager->persist($newCarsCategory);
        $manager->persist($damagedCarsCategory);

        $manager->persist($computersCategory);
        $manager->persist($pcComputersCategory);
        $manager->persist($notebookComputersCategory);
        $manager->flush();

        $this->addReference('category_cars', $carsCategory);
        $this->addReference('category_used_cars', $usedCarsCategory);
        $this->addReference('category_new_cars', $newCarsCategory);
        $this->addReference('category_damaged_cars', $damagedCarsCategory);
        $this->addReference('category_computers', $computersCategory);
        $this->addReference('category_computers_pc', $pcComputersCategory);
        $this->addReference('category_computers_notebook', $notebookComputersCategory);
    }
}
