<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260717100740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles JSON NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE clients (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, phonenumber VARCHAR(30) NOT NULL, email VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE devis (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, statut VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, budget NUMERIC(10, 2) NOT NULL, client_id INT NOT NULL, INDEX IDX_8B27C52B19EB6921 (client_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE devis_prestation (id INT AUTO_INCREMENT NOT NULL, quantité INT NOT NULL, prix NUMERIC(10, 2) NOT NULL, devis_id INT NOT NULL, prestation_id INT NOT NULL, INDEX IDX_E169C44541DEFADA (devis_id), INDEX IDX_E169C4459E45C554 (prestation_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, ordre_affichage INT NOT NULL, type VARCHAR(255) NOT NULL, prestation_id INT DEFAULT NULL, INDEX IDX_C53D045F9E45C554 (prestation_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, lu TINYINT NOT NULL, contenu LONGTEXT NOT NULL, client_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_B6BD307F19EB6921 (client_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE prestations (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, price VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE text (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, type VARCHAR(255) NOT NULL, contenu LONGTEXT DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52B19EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE devis_prestation ADD CONSTRAINT FK_E169C44541DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id)');
        $this->addSql('ALTER TABLE devis_prestation ADD CONSTRAINT FK_E169C4459E45C554 FOREIGN KEY (prestation_id) REFERENCES prestations (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F9E45C554 FOREIGN KEY (prestation_id) REFERENCES prestations (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F19EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52B19EB6921');
        $this->addSql('ALTER TABLE devis_prestation DROP FOREIGN KEY FK_E169C44541DEFADA');
        $this->addSql('ALTER TABLE devis_prestation DROP FOREIGN KEY FK_E169C4459E45C554');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F9E45C554');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F19EB6921');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE devis');
        $this->addSql('DROP TABLE devis_prestation');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE prestations');
        $this->addSql('DROP TABLE text');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
