<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230826124006 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, background VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activity_person (activity_id INT NOT NULL, person_id INT NOT NULL, INDEX IDX_66AA317681C06096 (activity_id), INDEX IDX_66AA3176217BBB47 (person_id), PRIMARY KEY(activity_id, person_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE drink (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE food (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, is_hot TINYINT(1) NOT NULL, is_gluten_free TINYINT(1) NOT NULL, is_lactose_free TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kid (id INT AUTO_INCREMENT NOT NULL, age INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lodging (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, phone_number VARCHAR(10) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, room_number INT DEFAULT NULL, distance DOUBLE PRECISION NOT NULL, website VARCHAR(255) DEFAULT NULL, address LONGTEXT NOT NULL, maps_link VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_food (menu_id INT NOT NULL, food_id INT NOT NULL, INDEX IDX_1C77D9B9CCD7E912 (menu_id), INDEX IDX_1C77D9B9BA8E87C4 (food_id), PRIMARY KEY(menu_id, food_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person (id INT AUTO_INCREMENT NOT NULL, table_id INT DEFAULT NULL, menu_id INT DEFAULT NULL, lodging_id INT DEFAULT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, come_to_town_hall TINYINT(1) NOT NULL, come_to_reception TINYINT(1) NOT NULL, come_to_party TINYINT(1) NOT NULL, is_announcement_sent TINYINT(1) NOT NULL, INDEX IDX_34DCD176ECFF285C (table_id), INDEX IDX_34DCD176CCD7E912 (menu_id), INDEX IDX_34DCD17687335AF1 (lodging_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `table` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE timeline (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE timeline_event (id INT AUTO_INCREMENT NOT NULL, timeline_id INT NOT NULL, date DATETIME NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_1BC087E1EDBEDD37 (timeline_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activity_person ADD CONSTRAINT FK_66AA317681C06096 FOREIGN KEY (activity_id) REFERENCES activity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activity_person ADD CONSTRAINT FK_66AA3176217BBB47 FOREIGN KEY (person_id) REFERENCES person (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_food ADD CONSTRAINT FK_1C77D9B9CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_food ADD CONSTRAINT FK_1C77D9B9BA8E87C4 FOREIGN KEY (food_id) REFERENCES food (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE person ADD CONSTRAINT FK_34DCD176ECFF285C FOREIGN KEY (table_id) REFERENCES `table` (id)');
        $this->addSql('ALTER TABLE person ADD CONSTRAINT FK_34DCD176CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE person ADD CONSTRAINT FK_34DCD17687335AF1 FOREIGN KEY (lodging_id) REFERENCES lodging (id)');
        $this->addSql('ALTER TABLE timeline_event ADD CONSTRAINT FK_1BC087E1EDBEDD37 FOREIGN KEY (timeline_id) REFERENCES timeline (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activity_person DROP FOREIGN KEY FK_66AA317681C06096');
        $this->addSql('ALTER TABLE activity_person DROP FOREIGN KEY FK_66AA3176217BBB47');
        $this->addSql('ALTER TABLE menu_food DROP FOREIGN KEY FK_1C77D9B9CCD7E912');
        $this->addSql('ALTER TABLE menu_food DROP FOREIGN KEY FK_1C77D9B9BA8E87C4');
        $this->addSql('ALTER TABLE person DROP FOREIGN KEY FK_34DCD176ECFF285C');
        $this->addSql('ALTER TABLE person DROP FOREIGN KEY FK_34DCD176CCD7E912');
        $this->addSql('ALTER TABLE person DROP FOREIGN KEY FK_34DCD17687335AF1');
        $this->addSql('ALTER TABLE timeline_event DROP FOREIGN KEY FK_1BC087E1EDBEDD37');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE activity_person');
        $this->addSql('DROP TABLE drink');
        $this->addSql('DROP TABLE food');
        $this->addSql('DROP TABLE kid');
        $this->addSql('DROP TABLE lodging');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE menu_food');
        $this->addSql('DROP TABLE person');
        $this->addSql('DROP TABLE `table`');
        $this->addSql('DROP TABLE timeline');
        $this->addSql('DROP TABLE timeline_event');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
