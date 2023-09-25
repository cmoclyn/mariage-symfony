<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230911071759 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE kid');
        $this->addSql('ALTER TABLE person ADD menu_id INT DEFAULT NULL, ADD type VARCHAR(255) NOT NULL, ADD age INT DEFAULT NULL');
        $this->addSql('ALTER TABLE person ADD CONSTRAINT FK_34DCD176CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('CREATE INDEX IDX_34DCD176CCD7E912 ON person (menu_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE kid (id INT AUTO_INCREMENT NOT NULL, age INT NOT NULL, firstname VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, lastname VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, come_to_town_hall TINYINT(1) NOT NULL, replied TINYINT(1) NOT NULL, come_to_party TINYINT(1) NOT NULL, is_announcement_sent TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE person DROP FOREIGN KEY FK_34DCD176CCD7E912');
        $this->addSql('DROP INDEX IDX_34DCD176CCD7E912 ON person');
        $this->addSql('ALTER TABLE person DROP menu_id, DROP type, DROP age');
    }
}
