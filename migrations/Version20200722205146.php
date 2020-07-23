<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200722205146 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE languages (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, baseline VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects_languages (projects_id INT NOT NULL, languages_id INT NOT NULL, INDEX IDX_796D94461EDE0F55 (projects_id), INDEX IDX_796D94465D237A9A (languages_id), PRIMARY KEY(projects_id, languages_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE projects_languages ADD CONSTRAINT FK_796D94461EDE0F55 FOREIGN KEY (projects_id) REFERENCES projects (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projects_languages ADD CONSTRAINT FK_796D94465D237A9A FOREIGN KEY (languages_id) REFERENCES languages (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contacts CHANGE date date DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projects_languages DROP FOREIGN KEY FK_796D94465D237A9A');
        $this->addSql('ALTER TABLE projects_languages DROP FOREIGN KEY FK_796D94461EDE0F55');
        $this->addSql('DROP TABLE languages');
        $this->addSql('DROP TABLE projects');
        $this->addSql('DROP TABLE projects_languages');
        $this->addSql('ALTER TABLE contacts CHANGE date date VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
