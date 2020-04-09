<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200409204708 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE team (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, match_id INTEGER DEFAULT NULL, score INTEGER NOT NULL, has_won BOOLEAN NOT NULL)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F2ABEACD6 ON team (match_id)');
        $this->addSql('CREATE TABLE team_player (team_id INTEGER NOT NULL, player_id INTEGER NOT NULL, PRIMARY KEY(team_id, player_id))');
        $this->addSql('CREATE INDEX IDX_EE023DBC296CD8AE ON team_player (team_id)');
        $this->addSql('CREATE INDEX IDX_EE023DBC99E6F5DF ON team_player (player_id)');
        $this->addSql('CREATE TABLE "match" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, played_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TABLE player (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(50) NOT NULL, skill_value INTEGER NOT NULL, image_url VARCHAR(200) DEFAULT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE team_player');
        $this->addSql('DROP TABLE "match"');
        $this->addSql('DROP TABLE player');
    }
}
