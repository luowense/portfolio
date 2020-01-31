<?php

namespace App\DataFixtures;

use App\Entity\BlogPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class BlogPostFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i <= 50; $i++) {
            $post = new BlogPost();
            $post->setTitle($faker->sentence);
            $post->setContent($faker->paragraph);
            $post->setPicture($faker->imageUrl(1500,400));
            $post->setCategory($this->getReference('category_' . rand(0,9)));
            $manager->persist($post);
        }

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return class-string[]
     */
    public function getDependencies()
    {
        return [BlogCategoryFixtures::class];
    }
}
