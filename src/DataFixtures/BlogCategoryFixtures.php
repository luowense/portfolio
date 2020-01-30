<?php

namespace App\DataFixtures;

use App\Entity\BlogCategory;
use AppTestBundle\Entity\UnitTests\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class BlogCategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 10; $i++){
            $category = new BlogCategory();
            $category->setName($faker->word);
            $this->addReference('category_' . $i, $category);
            $manager->persist($category);
        }

        $manager->flush();
    }
}
