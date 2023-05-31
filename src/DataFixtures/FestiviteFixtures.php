<?php

namespace App\DataFixtures;

use App\Entity\Festivite;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class FestiviteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $festivite = new Festivite();
        $festivite->setNom("Noel");
        $festivite->setTexte("Bla bla bla bla bla bla bla bla bla bla bla ");
        $festivite->setImageName("try2.jpg");
        $festivite->setIsActive(true);
        $manager->persist($festivite);

        $festivite = new Festivite();
        $festivite->setNom("Paques");
        $festivite->setTexte("Bla bla bla bla bla bla bla bla bla bla bla ");
        $festivite->setImageName("try2.jpg");
        $festivite->setIsActive(true);
        $manager->persist($festivite);

        $festivite = new Festivite();
        $festivite->setNom("Halloween");
        $festivite->setTexte("Bla bla bla bla bla bla bla bla bla bla bla ");
        $festivite->setImageName("try2.jpg");
        $festivite->setIsActive(false);
        $manager->persist($festivite);

        $manager->flush();
    }
}
