<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20241004143142 extends AbstractMigration
{
    public function getDescription(): string
    {
        return "Initial migration";
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            "CREATE SEQUENCE category_id_seq INCREMENT BY 1 MINVALUE 1 START 1"
        );
        $this->addSql(
            "CREATE SEQUENCE episode_id_seq INCREMENT BY 1 MINVALUE 1 START 1"
        );
        $this->addSql(
            "CREATE SEQUENCE season_id_seq INCREMENT BY 1 MINVALUE 1 START 1"
        );
        $this->addSql(
            "CREATE TABLE category (id INT NOT NULL, name VARCHAR(100) NOT NULL, label VARCHAR(100) NOT NULL, PRIMARY KEY(id))"
        );
        $this->addSql(
            "CREATE TABLE episode (id INT NOT NULL, title VARCHAR(255) NOT NULL, duration TIME(0) WITHOUT TIME ZONE NOT NULL, release_date DATE NOT NULL, PRIMARY KEY(id))"
        );
        $this->addSql(
            "CREATE TABLE season (id INT NOT NULL, season_number INT NOT NULL, PRIMARY KEY(id))"
        );
        $this->addSql(
            "ALTER TABLE media RENAME COLUMN media_type TO mediaType"
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql("CREATE SCHEMA public");
        $this->addSql("DROP SEQUENCE category_id_seq CASCADE");
        $this->addSql("DROP SEQUENCE episode_id_seq CASCADE");
        $this->addSql("DROP SEQUENCE season_id_seq CASCADE");
        $this->addSql("DROP TABLE category");
        $this->addSql("DROP TABLE episode");
        $this->addSql("DROP TABLE season");
        $this->addSql(
            "ALTER TABLE media RENAME COLUMN mediaType TO media_type"
        );
    }
}
