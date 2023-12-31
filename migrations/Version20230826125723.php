<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230826125723 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE person ADD lodging_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE person ADD CONSTRAINT FK_34DCD17687335AF1 FOREIGN KEY (lodging_id) REFERENCES lodging (id)');
        $this->addSql('CREATE INDEX IDX_34DCD17687335AF1 ON person (lodging_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE person DROP FOREIGN KEY FK_34DCD17687335AF1');
        $this->addSql('DROP INDEX IDX_34DCD17687335AF1 ON person');
        $this->addSql('ALTER TABLE person DROP lodging_id');
    }
}
