<?php

namespace App\DataFixtures;

use App\Entity\Experience;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ExperienceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 9; $i++){
            $experience = new Experience();
            $experience->setName($faker->sentence);
            $experience->setDescription($faker->paragraph);
            $experience->setYear(2010);
            $experience->setPlace($faker->word);
            $manager->persist($experience);
        }

        $manager->flush();
    }
}
