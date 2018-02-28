<?php declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     *
     * @throws \Doctrine\Common\DataFixtures\BadMethodCallException
     */
    public function load(ObjectManager $manager)
    {
        $users = [
            [
                'username' => 'grzeznikiewicz',
                'password' => password_hash("@nonsePro!ect", PASSWORD_BCRYPT),
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

        foreach ($users as $user) {
            $userEntity = new User($user['username'], $user['password'], $user['email']);
            $userEntity->setIsActive($user['isActive']);

            $this->addReference('user_'.$user['username'], $userEntity);
            $manager->persist($userEntity);
        }

        $manager->flush();
    }
}
