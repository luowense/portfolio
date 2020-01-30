<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use App\Repository\UserRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class SkillFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        for($i = 0; $i < 6; $i++){
            $skill = new Skill();
            $skill->setName($faker->word);
            $skill->setLevel(rand(50, 89));
            $skill->setUser(null);
            $manager->persist($skill);
        }

        $manager->flush();
    }
}
