<?php

namespace App\DataFixtures;

use App\Entity\Informations;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class InformationsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $informations = new Informations();
        $informations->setNom("Atelier Yoga");
        $informations->setTexte("Atelier Yoga le 14 Avril a 18h30");
        $informations->setIsActive(true);
        $manager->persist($informations);

        $informations = new Informations();
        $informations->setNom("Atelier cuisine");
        $informations->setTexte("Atelier cuisine le 21 Avril a 18h30");
        $informations->setIsActive(false);
        $manager->persist($informations);

        $manager->flush();
    }
}
