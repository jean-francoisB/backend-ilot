<?php

namespace App\DataFixtures;

use App\Entity\Carousel;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CarouselFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $carousel = new Carousel();
        $carousel->setImageName("try1.jpg");
        $carousel->setTag("home");
        $carousel->setTitre("Nos activités");
        $carousel->setTexte("Nous proposons a nos enfants différents thèmes tout au long de l'année où tout le monde participe");
        $manager->persist($carousel);

        $carousel = new Carousel();
        $carousel->setImageName("try2.jpg");
        $carousel->setTag("home");
        $carousel->setTitre("Notre groupe");
        $carousel->setTexte("Nous proposons a nos enfants différents thèmes tout au long de l'année où tout le monde participe");
        $manager->persist($carousel);

        $carousel = new Carousel();
        $carousel->setImageName("try3.jpg");
        $carousel->setTag("home");
        $carousel->setTitre("On s'amuse");
        $carousel->setTexte("Nous proposons a nos enfants différents thèmes tout au long de l'année où tout le monde participe");
        $manager->persist($carousel);

        $manager->flush();
    }
}
