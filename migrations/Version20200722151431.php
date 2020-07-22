<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200722151431 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD name VARCHAR(255) NOT NULL, ADD bio1 LONGTEXT DEFAULT NULL, ADD bio2 LONGTEXT DEFAULT NULL, ADD title VARCHAR(255) NOT NULL, ADD profile_picture VARCHAR(255) NOT NULL, ADD facebook VARCHAR(255) DEFAULT NULL, ADD twitter VARCHAR(255) DEFAULT NULL, ADD linkedin VARCHAR(255) DEFAULT NULL, ADD github VARCHAR(255) DEFAULT NULL, ADD adress VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP name, DROP bio1, DROP bio2, DROP title, DROP profile_picture, DROP facebook, DROP twitter, DROP linkedin, DROP github, DROP adress');
    }
}
