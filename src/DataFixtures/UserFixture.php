<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        $user = new User();
        $user->setPassword('123');
        $user->setEmail('test1@test.com');
        $user->setName($faker->name);
        $user->setDescription($faker->paragraph);
        $user->setPicture($faker->word);
        $user->setSummary($faker->paragraph);
        $manager->persist($user);

        $manager->flush();
    }
}
