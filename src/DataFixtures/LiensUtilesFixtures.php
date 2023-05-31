<?php

namespace App\DataFixtures;

use App\Entity\LiensUtiles;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class LiensUtilesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $liensUtiles = new LiensUtiles();
        $liensUtiles->setNom('Pajemploi');
        $liensUtiles->setUrl("https://www.pajemploi.urssaf.fr/");
        $manager->persist($liensUtiles);

        $liensUtiles = new LiensUtiles();
        $liensUtiles->setNom('Caf');
        $liensUtiles->setUrl("https://www.caf.fr/");
        $manager->persist($liensUtiles);

        $liensUtiles = new LiensUtiles();
        $liensUtiles->setNom('Monenfant.fr');
        $liensUtiles->setUrl("https://monenfant.fr/");
        $manager->persist($liensUtiles);

        

        $manager->flush();
    }
}
