<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200723143453 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projects_languages DROP FOREIGN KEY FK_796D94465D237A9A');
        $this->addSql('ALTER TABLE projects_languages DROP FOREIGN KEY FK_796D94461EDE0F55');
        $this->addSql('ALTER TABLE screenshots DROP FOREIGN KEY FK_1A8D2713166D1F9C');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, message LONGTEXT NOT NULL, mail VARCHAR(255) NOT NULL, date DATETIME NOT NULL, phone VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, icon VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, baseline VARCHAR(255) NOT NULL, description1 LONGTEXT NOT NULL, description2 LONGTEXT NOT NULL, link VARCHAR(255) DEFAULT NULL, cover VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_language (project_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_E995FA6E166D1F9C (project_id), INDEX IDX_E995FA6E82F1BAF4 (language_id), PRIMARY KEY(project_id, language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE screenshot (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, file VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_58991E41166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE project_language ADD CONSTRAINT FK_E995FA6E166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_language ADD CONSTRAINT FK_E995FA6E82F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE screenshot ADD CONSTRAINT FK_58991E41166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE SET NULL');
        $this->addSql('DROP TABLE contacts');
        $this->addSql('DROP TABLE languages');
        $this->addSql('DROP TABLE projects');
        $this->addSql('DROP TABLE projects_languages');
        $this->addSql('DROP TABLE screenshots');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project_language DROP FOREIGN KEY FK_E995FA6E82F1BAF4');
        $this->addSql('ALTER TABLE project_language DROP FOREIGN KEY FK_E995FA6E166D1F9C');
        $this->addSql('ALTER TABLE screenshot DROP FOREIGN KEY FK_58991E41166D1F9C');
        $this->addSql('CREATE TABLE contacts (id INT AUTO_INCREMENT NOT NULL, message LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, mail VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date DATETIME NOT NULL, phone VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE languages (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, icon VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE projects (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, logo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, baseline VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description1 LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description2 LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, link VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, cover VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE projects_languages (projects_id INT NOT NULL, languages_id INT NOT NULL, INDEX IDX_796D94461EDE0F55 (projects_id), INDEX IDX_796D94465D237A9A (languages_id), PRIMARY KEY(projects_id, languages_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE screenshots (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, file VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_1A8D2713166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE projects_languages ADD CONSTRAINT FK_796D94461EDE0F55 FOREIGN KEY (projects_id) REFERENCES projects (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projects_languages ADD CONSTRAINT FK_796D94465D237A9A FOREIGN KEY (languages_id) REFERENCES languages (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE screenshots ADD CONSTRAINT FK_1A8D2713166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id) ON UPDATE NO ACTION ON DELETE SET NULL');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE project_language');
        $this->addSql('DROP TABLE screenshot');
    }
}
