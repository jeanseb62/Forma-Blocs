<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210921231036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE quotation (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(50) NOT NULL, first_name VARCHAR(50) NOT NULL, number_street INT NOT NULL, street VARCHAR(45) NOT NULL, zip VARCHAR(5) NOT NULL, city VARCHAR(45) NOT NULL, country VARCHAR(50) NOT NULL, phone INT NOT NULL, message LONGTEXT NOT NULL, status LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', benefit LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', send_by_email LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', created_at DATETIME DEFAULT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE formation_block');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formation_block (formation_id INT NOT NULL, block_id INT NOT NULL, INDEX IDX_F59009575200282E (formation_id), INDEX IDX_F5900957E9ED820C (block_id), PRIMARY KEY(formation_id, block_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE formation_block ADD CONSTRAINT FK_F59009575200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_block ADD CONSTRAINT FK_F5900957E9ED820C FOREIGN KEY (block_id) REFERENCES block (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE quotation');
    }
}
