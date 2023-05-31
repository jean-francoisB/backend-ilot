<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230407102136 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activite (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, texte LONGTEXT NOT NULL, is_active TINYINT(1) NOT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', image_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bonus (id INT AUTO_INCREMENT NOT NULL, image_name VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, texte LONGTEXT NOT NULL, is_active TINYINT(1) NOT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carousel (id INT AUTO_INCREMENT NOT NULL, image_name VARCHAR(255) NOT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', titre VARCHAR(255) DEFAULT NULL, texte VARCHAR(255) DEFAULT NULL, tag VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contrat (id INT AUTO_INCREMENT NOT NULL, enfant_id INT NOT NULL, temps VARCHAR(255) DEFAULT NULL, tarif DOUBLE PRECISION DEFAULT NULL, INDEX IDX_60349993450D2529 (enfant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contrat_heures (contrat_id INT NOT NULL, heures_id INT NOT NULL, INDEX IDX_AC58A2B11823061F (contrat_id), INDEX IDX_AC58A2B1D05B21E6 (heures_id), PRIMARY KEY(contrat_id, heures_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enfant (id INT AUTO_INCREMENT NOT NULL, nounou_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, dt_naissance DATETIME DEFAULT NULL, INDEX IDX_34B70CA2294EC139 (nounou_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enfant_user (enfant_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_EBBCCE7E450D2529 (enfant_id), INDEX IDX_EBBCCE7EA76ED395 (user_id), PRIMARY KEY(enfant_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE festivite (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, texte LONGTEXT NOT NULL, is_active TINYINT(1) NOT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', image_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE heures (id INT AUTO_INCREMENT NOT NULL, lundi_start TIME DEFAULT NULL, mardi_start TIME DEFAULT NULL, mercredi_start TIME DEFAULT NULL, jeudi_start TIME DEFAULT NULL, vendredi_start TIME DEFAULT NULL, lundi_end TIME DEFAULT NULL, mardi_end TIME DEFAULT NULL, mercredi_end TIME DEFAULT NULL, jeudi_end TIME DEFAULT NULL, vendredi_end TIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE home (id INT AUTO_INCREMENT NOT NULL, image_name VARCHAR(255) DEFAULT NULL, texte LONGTEXT NOT NULL, is_active TINYINT(1) NOT NULL, signature VARCHAR(255) NOT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', titre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE informations (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, texte VARCHAR(255) NOT NULL, is_active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE liens_utiles (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mentions_legales (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, texte LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, texte LONGTEXT NOT NULL, image_name VARCHAR(255) DEFAULT NULL, is_active TINYINT(1) NOT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sortie (id INT AUTO_INCREMENT NOT NULL, image_name VARCHAR(255) DEFAULT NULL, nom VARCHAR(255) NOT NULL, texte LONGTEXT NOT NULL, is_active TINYINT(1) NOT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(5) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, telephone VARCHAR(15) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993450D2529 FOREIGN KEY (enfant_id) REFERENCES enfant (id)');
        $this->addSql('ALTER TABLE contrat_heures ADD CONSTRAINT FK_AC58A2B11823061F FOREIGN KEY (contrat_id) REFERENCES contrat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contrat_heures ADD CONSTRAINT FK_AC58A2B1D05B21E6 FOREIGN KEY (heures_id) REFERENCES heures (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE enfant ADD CONSTRAINT FK_34B70CA2294EC139 FOREIGN KEY (nounou_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE enfant_user ADD CONSTRAINT FK_EBBCCE7E450D2529 FOREIGN KEY (enfant_id) REFERENCES enfant (id)');
        $this->addSql('ALTER TABLE enfant_user ADD CONSTRAINT FK_EBBCCE7EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993450D2529');
        $this->addSql('ALTER TABLE contrat_heures DROP FOREIGN KEY FK_AC58A2B11823061F');
        $this->addSql('ALTER TABLE contrat_heures DROP FOREIGN KEY FK_AC58A2B1D05B21E6');
        $this->addSql('ALTER TABLE enfant DROP FOREIGN KEY FK_34B70CA2294EC139');
        $this->addSql('ALTER TABLE enfant_user DROP FOREIGN KEY FK_EBBCCE7E450D2529');
        $this->addSql('ALTER TABLE enfant_user DROP FOREIGN KEY FK_EBBCCE7EA76ED395');
        $this->addSql('DROP TABLE activite');
        $this->addSql('DROP TABLE bonus');
        $this->addSql('DROP TABLE carousel');
        $this->addSql('DROP TABLE contrat');
        $this->addSql('DROP TABLE contrat_heures');
        $this->addSql('DROP TABLE enfant');
        $this->addSql('DROP TABLE enfant_user');
        $this->addSql('DROP TABLE festivite');
        $this->addSql('DROP TABLE heures');
        $this->addSql('DROP TABLE home');
        $this->addSql('DROP TABLE informations');
        $this->addSql('DROP TABLE liens_utiles');
        $this->addSql('DROP TABLE mentions_legales');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE sortie');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
