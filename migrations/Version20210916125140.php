<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210916125140 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE block ADD formation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE block ADD CONSTRAINT FK_831B97225200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_831B97225200282E ON block (formation_id)');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFEE2E1C8C');
        $this->addSql('DROP INDEX IDX_404021BFEE2E1C8C ON formation');
        $this->addSql('ALTER TABLE formation DROP blocks_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE block DROP FOREIGN KEY FK_831B97225200282E');
        $this->addSql('DROP INDEX IDX_831B97225200282E ON block');
        $this->addSql('ALTER TABLE block DROP formation_id');
        $this->addSql('ALTER TABLE formation ADD blocks_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFEE2E1C8C FOREIGN KEY (blocks_id) REFERENCES block (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_404021BFEE2E1C8C ON formation (blocks_id)');
    }
}
