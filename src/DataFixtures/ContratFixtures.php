<?php

namespace App\DataFixtures;

use App\Entity\Contrat;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ContratFixtures extends Fixture implements DependentFixtureInterface
{


    public function load(ObjectManager $manager): void
    {
        $contrat = new Contrat();
        $contrat->setTemps(39);
        $contrat->setTarif(5.15);
        $contrat->setEnfant($this->getReference(EnfantFixtures::LEA));
        $manager->persist($contrat);
    

        $contrat = new Contrat();
        $contrat->setTemps(40);
        $contrat->setTarif(5);
        $contrat->setEnfant($this->getReference(EnfantFixtures::AMBRE));
        $manager->persist($contrat);
        

        $contrat = new Contrat();
        $contrat->setTemps(42);
        $contrat->setTarif(4.90);
        $contrat->setEnfant($this->getReference(EnfantFixtures::JANE));
        $manager->persist($contrat);
        

        $manager->flush();
    }

    public function getDependencies()
    {
        return[
            EnfantFixtures::class
        ];
    }
}
