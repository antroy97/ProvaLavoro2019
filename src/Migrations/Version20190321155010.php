<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190321155010 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE gruppo (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nome VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__utenti AS SELECT id, nome FROM utenti');
        $this->addSql('DROP TABLE utenti');
        $this->addSql('CREATE TABLE utenti (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, gruppo_id INTEGER NOT NULL, nome VARCHAR(255) NOT NULL COLLATE BINARY, cognome VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, CONSTRAINT FK_D7F3FFCB869B87DB FOREIGN KEY (gruppo_id) REFERENCES gruppo (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO utenti (id, nome) SELECT id, nome FROM __temp__utenti');
        $this->addSql('DROP TABLE __temp__utenti');
        $this->addSql('CREATE INDEX IDX_D7F3FFCB869B87DB ON utenti (gruppo_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE gruppo');
        $this->addSql('DROP INDEX IDX_D7F3FFCB869B87DB');
        $this->addSql('CREATE TEMPORARY TABLE __temp__utenti AS SELECT id, nome FROM utenti');
        $this->addSql('DROP TABLE utenti');
        $this->addSql('CREATE TABLE utenti (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nome VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO utenti (id, nome) SELECT id, nome FROM __temp__utenti');
        $this->addSql('DROP TABLE __temp__utenti');
    }
}
