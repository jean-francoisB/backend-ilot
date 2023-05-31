<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixtures extends Fixture
{



    /**PROPRIETES ******** */

    public const JOHN_DOE = "John Doe";
    public const NOUNOU = "Nounou";

    private $encoder;

    /** CONSTRUCTEUR***** */

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('admin@admin.com');
        $user->setRoles(['ROLE_USER', 'ROLE_ADMIN','ROLE_NOUNOU']);
        $user->setNom('BERNARD');
        $user->setPrenom('JF');
        $user->setAdresse("17 rue de la poupée qui tousse");
        $user->setCodePostal(75014);
        $user->setVille("Paris");
        $user->setTelephone("0102030405");
        $user->setPassword($this->encoder->hashPassword($user, 'pass'));
        
        $manager->persist($user);
        

        $user = new User();
        $user->setEmail('user@user.com');
        $user->setRoles(['ROLE_USER']);
        $user->setNom('DOE');
        $user->setPrenom('John');
        $user->setAdresse("10 rue de l'inconnu");
        $user->setCodePostal(75016);
        $user->setVille("Paris");
        $user->setTelephone("0203040506");
        $user->setPassword($this->encoder->hashPassword($user, 'pass'));
        
        $manager->persist($user);
        $this->addReference(self::JOHN_DOE, $user);
        
        $user = new User();
        $user->setEmail('nounou@nounou.com');
        $user->setRoles(['ROLE_NOUNOU']);
        $user->setNom('Nounou');
        $user->setPrenom('Jessica');
        $user->setAdresse("10 rue de l'inconnu");
        $user->setCodePostal(75016);
        $user->setVille("Paris");
        $user->setTelephone("0304050607");
        $user->setPassword($this->encoder->hashPassword($user, 'pass'));
        
        $manager->persist($user);
        $this->addReference(self::NOUNOU, $user);

        $manager->flush();
    }
}
