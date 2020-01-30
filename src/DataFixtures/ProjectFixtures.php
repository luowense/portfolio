<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ProjectFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 15; $i++){
            $project = new Project();
            $project->setName($faker->word);
            $project->setDescription($faker->paragraph);
            $project->setPicture('https://images.unsplash.com/photo-1464054313797-e27fb58e90a9?dpr=1&auto=format&crop=entropy&fit=crop&w=1500&h=996&q=80');
            $project->setLanguage(null);
            $manager->persist($project);
        }

        $manager->flush();
    }
}
