<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221229224013 extends AbstractMigration
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
        $this->addSql('CREATE TABLE user_progression (user_id_id INT NOT NULL, enigme_id_id INT NOT NULL, resultat INT NOT NULL, INDEX IDX_7CA999E69D86650F (user_id_id), INDEX IDX_7CA999E6AA8A6DE (enigme_id_id), PRIMARY KEY(user_id_id, enigme_id_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reponse_enigme_un ADD CONSTRAINT FK_28520A44A2C40D0 FOREIGN KEY (id_enigme_id) REFERENCES enigme (id)');
        $this->addSql('ALTER TABLE reponse_enigme_un ADD CONSTRAINT FK_28520A49D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_progression ADD CONSTRAINT FK_7CA999E69D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_progression ADD CONSTRAINT FK_7CA999E6AA8A6DE FOREIGN KEY (enigme_id_id) REFERENCES enigme (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponse_enigme_un DROP FOREIGN KEY FK_28520A44A2C40D0');
        $this->addSql('ALTER TABLE reponse_enigme_un DROP FOREIGN KEY FK_28520A49D86650F');
        $this->addSql('ALTER TABLE user_progression DROP FOREIGN KEY FK_7CA999E69D86650F');
        $this->addSql('ALTER TABLE user_progression DROP FOREIGN KEY FK_7CA999E6AA8A6DE');
        $this->addSql('DROP TABLE enigme');
        $this->addSql('DROP TABLE reponse_enigme_un');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_progression');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
