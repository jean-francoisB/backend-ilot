<?php

namespace App\DataFixtures;

use App\Entity\Sortie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class SortieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $sortie = new Sortie();
        $sortie->setNom("Parc");
        $sortie->setTexte("Bla bla bla bla bla bla bla bla bla bla bla ");
        $sortie->setImageName("try2.jpg");
        $sortie->setIsActive(true);
        $manager->persist($sortie);

        $sortie = new Sortie();
        $sortie->setNom("Jeux");
        $sortie->setTexte("Bla bla bla bla bla bla bla bla bla bla bla ");
        $sortie->setImageName("try2.jpg");
        $sortie->setIsActive(true);
        $manager->persist($sortie);

        $sortie = new Sortie();
        $sortie->setNom("forêt");
        $sortie->setTexte("Bla bla bla bla bla bla bla bla bla bla bla ");
        $sortie->setImageName("try2.jpg");
        $sortie->setIsActive(false);
        $manager->persist($sortie);

        $manager->flush();
    }
}
