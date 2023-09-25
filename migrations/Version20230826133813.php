<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230826133813 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE kid ADD firstname VARCHAR(255) NOT NULL, ADD lastname VARCHAR(255) NOT NULL, ADD come_to_town_hall TINYINT(1) NOT NULL, ADD come_to_reception TINYINT(1) NOT NULL, ADD come_to_party TINYINT(1) NOT NULL, ADD is_announcement_sent TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE kid DROP firstname, DROP lastname, DROP come_to_town_hall, DROP come_to_reception, DROP come_to_party, DROP is_announcement_sent');
    }
}
