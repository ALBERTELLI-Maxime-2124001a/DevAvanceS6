<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240221153152 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE album ADD tracklist LONGTEXT DEFAULT NULL, ADD style VARCHAR(255) DEFAULT NULL, DROP nombre_mus, DROP musiques, DROP durees');
        $this->addSql('ALTER TABLE artist CHANGE nom nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE chanson ADD style VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE mdp mdp VARCHAR(250) NOT NULL, CHANGE discotheque discotheque INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chanson DROP style');
        $this->addSql('ALTER TABLE album ADD nombre_mus INT DEFAULT NULL, ADD durees LONGTEXT DEFAULT NULL, DROP style, CHANGE tracklist musiques LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE mdp mdp VARCHAR(50) NOT NULL, CHANGE discotheque discotheque INT NOT NULL');
        $this->addSql('ALTER TABLE artist CHANGE nom nom VARCHAR(100) NOT NULL');
    }
}
