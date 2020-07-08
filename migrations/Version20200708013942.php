<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200708013942 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3EC0DC9B3');
        $this->addSql('DROP TABLE boursier');
        $this->addSql('DROP TABLE non_boursier');
        $this->addSql('DROP INDEX UNIQ_717E22E3EC0DC9B3 ON etudiant');
        $this->addSql('DROP INDEX UNIQ_717E22E39FA70E62 ON etudiant');
        $this->addSql('ALTER TABLE etudiant ADD loger_id INT DEFAULT NULL, ADD libelle VARCHAR(255) NOT NULL, ADD montant INT NOT NULL, ADD is_housed TINYINT(1) NOT NULL, ADD adresse VARCHAR(255) NOT NULL, DROP boursier_id, DROP non_boursier_id');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3838DE57B FOREIGN KEY (loger_id) REFERENCES chambre (id)');
        $this->addSql('CREATE INDEX IDX_717E22E3838DE57B ON etudiant (loger_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE boursier (id INT AUTO_INCREMENT NOT NULL, loger_id INT DEFAULT NULL, libelle VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, montant INT NOT NULL, is_housed TINYINT(1) NOT NULL, INDEX IDX_CAE21B51838DE57B (loger_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE non_boursier (id INT AUTO_INCREMENT NOT NULL, adresse VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE boursier ADD CONSTRAINT FK_CAE21B51838DE57B FOREIGN KEY (loger_id) REFERENCES chambre (id)');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3838DE57B');
        $this->addSql('DROP INDEX IDX_717E22E3838DE57B ON etudiant');
        $this->addSql('ALTER TABLE etudiant ADD non_boursier_id INT DEFAULT NULL, DROP libelle, DROP montant, DROP is_housed, DROP adresse, CHANGE loger_id boursier_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3EC0DC9B3 FOREIGN KEY (boursier_id) REFERENCES boursier (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_717E22E3EC0DC9B3 ON etudiant (boursier_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_717E22E39FA70E62 ON etudiant (non_boursier_id)');
    }
}
