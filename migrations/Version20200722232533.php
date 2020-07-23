<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200722232533 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE screenshots DROP FOREIGN KEY FK_1A8D2713166D1F9C');
        $this->addSql('ALTER TABLE screenshots CHANGE project_id project_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE screenshots ADD CONSTRAINT FK_1A8D2713166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE screenshots DROP FOREIGN KEY FK_1A8D2713166D1F9C');
        $this->addSql('ALTER TABLE screenshots CHANGE project_id project_id INT NOT NULL');
        $this->addSql('ALTER TABLE screenshots ADD CONSTRAINT FK_1A8D2713166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
