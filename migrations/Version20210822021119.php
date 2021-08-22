<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210822021119 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE descripion_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE movies_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE note_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE category (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE descripion (id INT NOT NULL, content TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE movies (id INT NOT NULL, description_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, create_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C61EED30D9F966B ON movies (description_id)');
        $this->addSql('COMMENT ON COLUMN movies.create_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN movies.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE movies_category (movies_id INT NOT NULL, category_id INT NOT NULL, PRIMARY KEY(movies_id, category_id))');
        $this->addSql('CREATE INDEX IDX_EE38B6F953F590A4 ON movies_category (movies_id)');
        $this->addSql('CREATE INDEX IDX_EE38B6F912469DE2 ON movies_category (category_id)');
        $this->addSql('CREATE TABLE note (id INT NOT NULL, movies_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_CFBDFA1453F590A4 ON note (movies_id)');
        $this->addSql('ALTER TABLE movies ADD CONSTRAINT FK_C61EED30D9F966B FOREIGN KEY (description_id) REFERENCES descripion (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE movies_category ADD CONSTRAINT FK_EE38B6F953F590A4 FOREIGN KEY (movies_id) REFERENCES movies (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE movies_category ADD CONSTRAINT FK_EE38B6F912469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA1453F590A4 FOREIGN KEY (movies_id) REFERENCES movies (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE movies_category DROP CONSTRAINT FK_EE38B6F912469DE2');
        $this->addSql('ALTER TABLE movies DROP CONSTRAINT FK_C61EED30D9F966B');
        $this->addSql('ALTER TABLE movies_category DROP CONSTRAINT FK_EE38B6F953F590A4');
        $this->addSql('ALTER TABLE note DROP CONSTRAINT FK_CFBDFA1453F590A4');
        $this->addSql('DROP SEQUENCE category_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE descripion_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE movies_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE note_id_seq CASCADE');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE descripion');
        $this->addSql('DROP TABLE movies');
        $this->addSql('DROP TABLE movies_category');
        $this->addSql('DROP TABLE note');
    }
}
