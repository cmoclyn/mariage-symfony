<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230826124804 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE table_dinner (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE person ADD table_dinner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE person ADD CONSTRAINT FK_34DCD1764EF2C5F6 FOREIGN KEY (table_dinner_id) REFERENCES table_dinner (id)');
        $this->addSql('CREATE INDEX IDX_34DCD1764EF2C5F6 ON person (table_dinner_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE person DROP FOREIGN KEY FK_34DCD1764EF2C5F6');
        $this->addSql('DROP TABLE table_dinner');
        $this->addSql('DROP INDEX IDX_34DCD1764EF2C5F6 ON person');
        $this->addSql('ALTER TABLE person DROP table_dinner_id');
    }
}
