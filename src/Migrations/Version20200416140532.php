<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200416140532 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE album (id INT AUTO_INCREMENT NOT NULL, artist_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, release_year INT NOT NULL, created DATE NOT NULL, INDEX IDX_39986E43B7970CF8 (artist_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artist (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, start_year INT NOT NULL, created DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE style (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE style_artist (style_id INT NOT NULL, artist_id INT NOT NULL, INDEX IDX_2BFC685DBACD6074 (style_id), INDEX IDX_2BFC685DB7970CF8 (artist_id), PRIMARY KEY(style_id, artist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, mail VARCHAR(255) NOT NULL, role JSON NOT NULL, password VARCHAR(255) NOT NULL, lastconnection DATETIME DEFAULT NULL, birth_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_artist (user_id INT NOT NULL, artist_id INT NOT NULL, INDEX IDX_640B8DBAA76ED395 (user_id), INDEX IDX_640B8DBAB7970CF8 (artist_id), PRIMARY KEY(user_id, artist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE album ADD CONSTRAINT FK_39986E43B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id)');
        $this->addSql('ALTER TABLE style_artist ADD CONSTRAINT FK_2BFC685DBACD6074 FOREIGN KEY (style_id) REFERENCES style (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE style_artist ADD CONSTRAINT FK_2BFC685DB7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_artist ADD CONSTRAINT FK_640B8DBAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_artist ADD CONSTRAINT FK_640B8DBAB7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE album DROP FOREIGN KEY FK_39986E43B7970CF8');
        $this->addSql('ALTER TABLE style_artist DROP FOREIGN KEY FK_2BFC685DB7970CF8');
        $this->addSql('ALTER TABLE user_artist DROP FOREIGN KEY FK_640B8DBAB7970CF8');
        $this->addSql('ALTER TABLE style_artist DROP FOREIGN KEY FK_2BFC685DBACD6074');
        $this->addSql('ALTER TABLE user_artist DROP FOREIGN KEY FK_640B8DBAA76ED395');
        $this->addSql('DROP TABLE album');
        $this->addSql('DROP TABLE artist');
        $this->addSql('DROP TABLE style');
        $this->addSql('DROP TABLE style_artist');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_artist');
    }
}
