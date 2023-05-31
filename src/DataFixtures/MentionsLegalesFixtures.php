<?php

namespace App\DataFixtures;

use App\Entity\MentionsLegales;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class MentionsLegalesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $mentionsLegales = new MentionsLegales();
        $mentionsLegales->setNom("Propriété intellectuelle");
        $mentionsLegales->setTexte("L'ensemble des contenus présents sur le site L'îlot Papillons, incluant notamment les textes, photographies, graphismes, logos, marques, est protégé par les dispositions du Code de la propriété intellectuelle et appartient à L'îlot Papillons ou à ses partenaires. Toute reproduction, diffusion, exploitation ou utilisation, même partielle, des contenus du site, sans autorisation préalable écrite de L'îlot Papillons, est strictement interdite et pourra faire l'objet de poursuites judiciaires.");
        $manager->persist($mentionsLegales);

        $mentionsLegales = new MentionsLegales();
        $mentionsLegales->setNom("Données personnelles");
        $mentionsLegales->setTexte("Le site L'îlot Papillons ne peut garantir l'exactitude, la complétude, l'actualité des informations diffusées sur son site. En conséquence, la responsabilité de [Nom de la société ou du responsable légal] ne pourra être engagée du fait de l'utilisation des informations fournies sur le site. De même, le site L'îlot Papillons ne peut être tenu responsable des éventuels virus qui pourraient infecter l'ordinateur ou tout autre équipement informatique de l'utilisateur, suite à une utilisation ou un accès au site.");
        $manager->persist($mentionsLegales);

        $mentionsLegales = new MentionsLegales();
        $mentionsLegales->setNom("Droit applicable");
        $mentionsLegales->setTexte("Les présentes mentions légales sont soumises au droit français. Tout litige résultant de l'utilisation du site sera soumis à la compétence exclusive des tribunaux français.");
        $manager->persist($mentionsLegales);

        $mentionsLegales = new MentionsLegales();
        $mentionsLegales->setNom("Date de dernière mise à jour des mentions légales");
        $mentionsLegales->setTexte("3 avril 2023");
        $manager->persist($mentionsLegales);

        $manager->flush();
    }
}
