<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200704160740 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE boursier (id INT AUTO_INCREMENT NOT NULL, loger_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, montant INT NOT NULL, is_housed TINYINT(1) NOT NULL, INDEX IDX_CAE21B51838DE57B (loger_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chambre (id INT AUTO_INCREMENT NOT NULL, numero INT NOT NULL, type VARCHAR(255) NOT NULL, numero_bat INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, etudiant_id INT DEFAULT NULL, etudiant_non_boursier_id INT DEFAULT NULL, matricule VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone INT NOT NULL, date_naissance DATE NOT NULL, UNIQUE INDEX UNIQ_717E22E3DDEAB1A3 (etudiant_id), UNIQUE INDEX UNIQ_717E22E3C8DDF1C4 (etudiant_non_boursier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE non_boursier (id INT AUTO_INCREMENT NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE boursier ADD CONSTRAINT FK_CAE21B51838DE57B FOREIGN KEY (loger_id) REFERENCES chambre (id)');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES boursier (id)');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3C8DDF1C4 FOREIGN KEY (etudiant_non_boursier_id) REFERENCES non_boursier (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3DDEAB1A3');
        $this->addSql('ALTER TABLE boursier DROP FOREIGN KEY FK_CAE21B51838DE57B');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3C8DDF1C4');
        $this->addSql('DROP TABLE boursier');
        $this->addSql('DROP TABLE chambre');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE non_boursier');
    }
}
