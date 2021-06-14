<?php

namespace App\DataFixtures;

use App\Entity\Gite;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i=0; $i < 5; $i++) { 
            $faker = Factory::create('fr_FR');
            $gite[$i] = new Gite();
            $gite[$i]->setAddress($faker->address());
            $gite[$i]->setSuperficy($faker->numberBetween(60, 180));
            $gite[$i]->setBedroom($faker->numberBetween(1, 4));
            $gite[$i]->setNbBed($faker->numberBetween(1, 4));
            $gite[$i]->setAnimals((bool)rand(0, 1));
            $gite[$i]->setPriceAnimals($faker->randomFloat(2, 5, 10));
            $gite[$i]->setPriceHightSeason($faker->randomFloat(2, 80, 180));
            $gite[$i]->setPriceLowSeason($faker->randomFloat(2, 50, 150));

            $manager->persist($gite[$i]);
        }
        $manager->flush();
    }
}
