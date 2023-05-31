<?php

namespace App\DataFixtures;

use App\Entity\Enfant;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EnfantFixtures extends Fixture implements DependentFixtureInterface
{
    public const LEA = "Léa";
    public const AMBRE = "Ambre";
    public const JANE = "Jane";

    public function load(ObjectManager $manager): void
    {
        $enfant = new Enfant();
        $enfant->setNom("BERNARD");
        $enfant->setPrenom("Léa");
        $enfant->setDtNaissance(new DateTimeImmutable('2021-06-16'));
        $enfant->addParent($this->getReference(UserFixtures::JOHN_DOE));
        $manager->persist($enfant);
        $this->addReference(self::LEA, $enfant);


        $enfant = new Enfant();
        $enfant->setNom("NOUNOU");
        $enfant->setPrenom("Ambre");
        $enfant->setDtNaissance(new DateTimeImmutable('2021-10-16'));
        $enfant->addParent($this->getReference(UserFixtures::NOUNOU));
        $manager->persist($enfant);
        $this->addReference(self::AMBRE, $enfant);

        $enfant = new Enfant();
        $enfant->setNom("DOE");
        $enfant->setPrenom("Jane");
        $enfant->setDtNaissance(new DateTimeImmutable('2022-10-16'));
        $enfant->addParent($this->getReference(UserFixtures::JOHN_DOE));
        $manager->persist($enfant);
        $this->addReference(self::JANE, $enfant);

        $manager->flush();
    }

    public function getDependencies()
    {
        return[
            UserFixtures::class,
        ];
    }
}
