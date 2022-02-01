<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220201155601 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE achat_produits (id INT AUTO_INCREMENT NOT NULL, personne_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, nombre INT NOT NULL, INDEX IDX_451259A6A21BD112 (personne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE achat_produits ADD CONSTRAINT FK_451259A6A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE adresse CHANGE code_postal codepostal INT NOT NULL');
        $this->addSql('ALTER TABLE personne CHANGE date_naiss date_naiss DATETIME DEFAULT NULL, CHANGE telephone telephone VARCHAR(255) NOT NULL, CHANGE password pwd VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE achat_produits');
        $this->addSql('ALTER TABLE adresse CHANGE codepostal code_postal INT NOT NULL');
        $this->addSql('ALTER TABLE personne CHANGE date_naiss date_naiss DATETIME NOT NULL, CHANGE telephone telephone VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE pwd password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
