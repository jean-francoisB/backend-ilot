<?php

namespace App\DataFixtures;

use App\Entity\Bonus;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BonusFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $bonus = new Bonus();
        $bonus->setNom("Masque");
        $bonus->setTexte("Bla bla bla bla bla bla bla bla bla bla bla ");
        $bonus->setImageName("masque.jpg");
        $bonus->setIsActive(true);
        
        $manager->persist($bonus);

        $bonus = new Bonus();
        $bonus->setNom("Coloriage");
        $bonus->setTexte("Bla bla bla bla bla bla bla bla bla bla bla ");
        $bonus->setImageName("try2.jpg");
        $bonus->setIsActive(true);
        
        $manager->persist($bonus);

        $bonus = new Bonus();
        $bonus->setNom("Peinture");
        $bonus->setTexte("Bla bla bla bla bla bla bla bla bla bla bla ");
        $bonus->setImageName("try2.jpg");
        $bonus->setIsActive(false);
        
        $manager->persist($bonus);

        $manager->flush();
    }
}
