<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210923230931 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE advice (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE block (id INT AUTO_INCREMENT NOT NULL, formation_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_831B97225200282E (formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(45) NOT NULL, first_name VARCHAR(45) NOT NULL, email VARCHAR(45) NOT NULL, phone VARCHAR(16) NOT NULL, message LONGTEXT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, public LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(150) NOT NULL, type VARCHAR(150) NOT NULL, nb_blocs INT NOT NULL, price_min INT NOT NULL, price_max INT NOT NULL, document_pdf VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, is_published TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quotation (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(50) NOT NULL, first_name VARCHAR(50) NOT NULL, street VARCHAR(45) NOT NULL, zip VARCHAR(5) NOT NULL, city VARCHAR(45) NOT NULL, country VARCHAR(50) NOT NULL, phone VARCHAR(16) NOT NULL, message LONGTEXT NOT NULL, status LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', benefit LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', send_by_email LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', email VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT NULL, number_street VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, login VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE block ADD CONSTRAINT FK_831B97225200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE block DROP FOREIGN KEY FK_831B97225200282E');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('DROP TABLE advice');
        $this->addSql('DROP TABLE block');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE quotation');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE user');
    }
}
