<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230106130747 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE enigme (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponse_enigme_un (id INT AUTO_INCREMENT NOT NULL, id_enigme_id INT DEFAULT NULL, user_id_id INT DEFAULT NULL, reponse VARCHAR(255) NOT NULL, INDEX IDX_28520A44A2C40D0 (id_enigme_id), INDEX IDX_28520A49D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles JSON NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_progression (user_id_id INT NOT NULL, progression INT NOT NULL, PRIMARY KEY(user_id_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reponse_enigme_un ADD CONSTRAINT FK_28520A44A2C40D0 FOREIGN KEY (id_enigme_id) REFERENCES enigme (id)');
        $this->addSql('ALTER TABLE reponse_enigme_un ADD CONSTRAINT FK_28520A49D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_progression ADD CONSTRAINT FK_7CA999E69D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponse_enigme_un DROP FOREIGN KEY FK_28520A44A2C40D0');
        $this->addSql('ALTER TABLE reponse_enigme_un DROP FOREIGN KEY FK_28520A49D86650F');
        $this->addSql('ALTER TABLE user_progression DROP FOREIGN KEY FK_7CA999E69D86650F');
        $this->addSql('DROP TABLE enigme');
        $this->addSql('DROP TABLE reponse_enigme_un');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_progression');
    }
}
