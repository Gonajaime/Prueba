<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230421084836 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cliente DROP userName, DROP Password, DROP img, CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE usuario ADD id INT AUTO_INCREMENT NOT NULL, ADD cliente_id INT NOT NULL, ADD id_id INT NOT NULL, ADD usuario VARCHAR(255) NOT NULL, ADD apellidos VARCHAR(255) NOT NULL, ADD fecha_creación DATE NOT NULL, ADD fecha_modificación DATE NOT NULL, DROP apellido, DROP fecha creación, DROP fecha modificación, CHANGE nombre nombre VARCHAR(255) NOT NULL, CHANGE población población VARCHAR(255) NOT NULL, CHANGE categoría categoría VARCHAR(255) NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE usuario ADD CONSTRAINT FK_2265B05DDE734E51 FOREIGN KEY (cliente_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE usuario ADD CONSTRAINT FK_2265B05D7F449E57 FOREIGN KEY (id_id) REFERENCES cliente (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2265B05DDE734E51 ON usuario (cliente_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2265B05D7F449E57 ON usuario (id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cliente MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON cliente');
        $this->addSql('ALTER TABLE cliente ADD userName VARCHAR(50) NOT NULL, ADD Password TEXT NOT NULL, ADD img VARCHAR(500) NOT NULL, CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE usuario MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE usuario DROP FOREIGN KEY FK_2265B05DDE734E51');
        $this->addSql('ALTER TABLE usuario DROP FOREIGN KEY FK_2265B05D7F449E57');
        $this->addSql('DROP INDEX UNIQ_2265B05DDE734E51 ON usuario');
        $this->addSql('DROP INDEX UNIQ_2265B05D7F449E57 ON usuario');
        $this->addSql('DROP INDEX `primary` ON usuario');
        $this->addSql('ALTER TABLE usuario ADD apellido VARCHAR(80) NOT NULL, ADD fecha creación DATE NOT NULL, ADD fecha modificación DATE NOT NULL, DROP id, DROP cliente_id, DROP id_id, DROP usuario, DROP apellidos, DROP fecha_creación, DROP fecha_modificación, CHANGE nombre nombre VARCHAR(50) NOT NULL, CHANGE población población VARCHAR(80) NOT NULL, CHANGE categoría categoría VARCHAR(50) NOT NULL');
    }
}
