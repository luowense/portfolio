<?php

namespace App\DataFixtures;

use App\Entity\AuthenticateUser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class UserAuthenticateFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        $user = new AuthenticateUser();
        $user->setEmail('test@test.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword('123');
        $manager->persist($user);

        $manager->flush();
    }
}
