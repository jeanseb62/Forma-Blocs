<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210916124534 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation ADD blocks_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFEE2E1C8C FOREIGN KEY (blocks_id) REFERENCES block (id)');
        $this->addSql('CREATE INDEX IDX_404021BFEE2E1C8C ON formation (blocks_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFEE2E1C8C');
        $this->addSql('DROP INDEX IDX_404021BFEE2E1C8C ON formation');
        $this->addSql('ALTER TABLE formation DROP blocks_id');
    }
}
