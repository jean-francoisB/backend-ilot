<?php

namespace App\DataFixtures;

use App\Entity\Activite;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ActiviteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $activite = new Activite();
        $activite->setNom("Danse");
        $activite->setTexte("Bla bla bla bla bla bla bla bla bla bla bla ");
        $activite->setImageName("try2.jpg");
        $activite->setIsActive(true);
        $manager->persist($activite);

        $activite = new Activite();
        $activite->setNom("Gym");
        $activite->setTexte("Bla bla bla bla bla bla bla bla bla bla bla ");
        $activite->setImageName("try2.jpg");
        $activite->setIsActive(true);
        $manager->persist($activite);

        $activite = new Activite();
        $activite->setNom("Yoga");
        $activite->setTexte("Bla bla bla bla bla bla bla bla bla bla bla ");
        $activite->setImageName("try2.jpg");
        $activite->setIsActive(false);
        $manager->persist($activite);

        $manager->flush();
    }
}
