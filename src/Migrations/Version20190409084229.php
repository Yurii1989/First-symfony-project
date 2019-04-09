<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190409084229 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('INSERT INTO tag(id, label) VALUE(UUID(), "portrait")');
        $this->addSql('INSERT INTO tag(id, label) VALUE(UUID(), "landscape")');
        $this->addSql('INSERT INTO tag(id, label) VALUE(UUID(), "nature")');
        $this->addSql('INSERT INTO tag(id, label) VALUE(UUID(), "sport")');
        $this->addSql('INSERT INTO tag(id, label) VALUE(UUID(), "animals")');
        $this->addSql('INSERT INTO tag(id, label) VALUE(UUID(), "design")');
        $this->addSql('INSERT INTO tag(id, label) VALUE(UUID(), "children")');
        $this->addSql('INSERT INTO tag(id, label) VALUE(UUID(), "aliens")');
        $this->addSql('INSERT INTO tag(id, label) VALUE(UUID(), "puppies")');
        $this->addSql('INSERT INTO tag(id, label) VALUE(UUID(), "objects")');
        $this->addSql('INSERT INTO tag(id, label) VALUE(UUID(), "food")');
        $this->addSql('INSERT INTO tag(id, label) VALUE(UUID(), "programming")');
        $this->addSql('INSERT INTO tag(id, label) VALUE(UUID(), "superheroes")');
        // this up() migration is auto-generated, please modify it to your needs

    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DELETE FROM tag WHERE label = "portrait"');
        $this->addSql('DELETE FROM tag WHERE label = "landscape"');
        $this->addSql('DELETE FROM tag WHERE label = "nature"');
        $this->addSql('DELETE FROM tag WHERE label = "sport"');
        $this->addSql('DELETE FROM tag WHERE label = "animals"');
        $this->addSql('DELETE FROM tag WHERE label = "design"');
        $this->addSql('DELETE FROM tag WHERE label = "children"');
        $this->addSql('DELETE FROM tag WHERE label = "aliens"');
        $this->addSql('DELETE FROM tag WHERE label = "puppies"');
        $this->addSql('DELETE FROM tag WHERE label = "objects"');
        $this->addSql('DELETE FROM tag WHERE label = "food"');
        $this->addSql('DELETE FROM tag WHERE label = "programming"');
        $this->addSql('DELETE FROM tag WHERE label = "superheroes"');
        // this down() migration is auto-generated, please modify it to your needs

    }
}
