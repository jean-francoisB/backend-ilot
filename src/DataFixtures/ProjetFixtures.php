<?php

namespace App\DataFixtures;

use App\Entity\Projet;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProjetFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $projet = new Projet();
        $projet->setNom("Motricité");
        $projet->setTexte("Bla bla bla bla bla bla bla bla bla bla bla ");
        $projet->setImageName("try2.jpg");
        $projet->setIsActive(true);

        $manager->persist($projet);

        $projet = new Projet();
        $projet->setNom("Chant");
        $projet->setTexte("Bla bla bla bla bla bla bla bla bla bla bla ");
        $projet->setImageName("try2.jpg");
        $projet->setIsActive(true);

        $manager->persist($projet);

        $projet = new Projet();
        $projet->setNom("Langage des signes");
        $projet->setTexte("Bla bla bla bla bla bla bla bla bla bla bla ");
        $projet->setImageName("try2.jpg");
        $projet->setIsActive(false);

        $manager->persist($projet);

        $manager->flush();
    }
}
