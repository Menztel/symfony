<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie1 = new Movie();
        $movie1->setTitle("The Shawshank Redemption");
        $movie1->setShortDescription("This is a nice movie");
        $movie1->setReleaseDate(new \DateTime("1994-09-23"));
        $movie1->setCoverImage("shawshank_redemption.jpg");
        $movie1->setStaff([]);
        $movie1->setCastt([]);
        $manager->persist($movie1);

        $movie1 = new Movie();
        $movie2->setTitle("The Shawshank Redemption");
        $movie2->setShortDescription("This is a nice movie");
        $movie2->setReleaseDate(new \DateTime("1994-09-23"));
        $movie2->setCoverImage("shawshank_redemption.jpg");
        $movie2->setStaff([]);
        $movie2->setCastt([]);
        $manager->persist($movie2);

        $manager->flush();
    }
}
