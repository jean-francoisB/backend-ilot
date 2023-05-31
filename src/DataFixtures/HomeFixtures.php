<?php

namespace App\DataFixtures;

use App\Entity\Home;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class HomeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $home = new Home();
        $home->setTitre("Bienvenue sur le site de notre MAM");
        $home->setTexte("<p>Bienvenue à l'Ilot Papillons, une maison d'assistante maternelle qui offre un environnement chaleureux et accueillant pour les enfants de tous âges. Notre maison est conçue pour offrir un espace de jeu et d'apprentissage sécurisé, confortable et stimulant pour les enfants, tout en offrant une tranquillité d'esprit aux parents.</p>
        <p>Nous avons une équipe expérimentée d'assistantes maternelles qualifiées qui sont passionnées par leur travail et engagées à offrir des soins attentionnés à chaque enfant. Nous travaillons en étroite collaboration avec les parents pour comprendre les besoins uniques de chaque enfant et nous adaptons nos activités pour les encourager à explorer et à apprendre.</p>
        <p>Notre maison d'assistante maternelle est équipée de tout le matériel et les jouets nécessaires pour répondre aux besoins de développement des enfants. Nous sommes à proximité d'un parc où les enfants peuvent profiter de l'air frais, se défouler et explorer la nature.</p>
        <p>Chez l'Ilot Papillons, nous sommes fiers de notre approche professionnelle, centrée sur l'enfant et respectueuse des besoins de chaque famille. Nous offrons des services de garde à temps plein ou à temps partiel, ainsi que des activités éducatives pour aider les enfants à se développer sur tous les plans.</p>
        <p>Nous sommes heureux de vous inviter à découvrir notre maison d'assistante maternelle et à en apprendre davantage sur notre approche unique. Nous sommes convaincus que vous serez impressionné par notre engagement à offrir des soins de qualité et des expériences éducatives enrichissantes pour votre enfant.</p>");
        $home->setSignature("L'équipe de la MAM L'îlot Papillons");
        $home->setIsActive(true);
        $manager->persist($home);

        $home = new Home();
        $home->setTitre("Bienvenue au printemps");
        $home->setTexte("Voici le site aux couleurs du printemps");
        $home->setIsActive(false);
        $home->setSignature("L'équipe de la MAM L'îlot Papillons");
        $manager->persist($home);


        $manager->flush();
    }
}
