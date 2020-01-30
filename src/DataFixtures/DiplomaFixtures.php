<?php

namespace App\DataFixtures;

use App\Entity\Diploma;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class DiplomaFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 7; $i++){
            $diploma = new Diploma();
            $diploma->setDescription($faker->paragraph);
            $diploma->setName($faker->word);
            $diploma->setPlace($faker->word);
            $diploma->setYear('2222');
            $diploma->setUniversity($faker->word);
            $diploma->setUser(null);

            $manager->persist($diploma);
        }

        $manager->flush();
    }
}
