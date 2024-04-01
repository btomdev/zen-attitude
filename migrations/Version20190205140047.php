<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190205140047 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE carsharing DROP FOREIGN KEY FK_4FDAE719A76ED395');
        $this->addSql('DROP INDEX IDX_4FDAE719A76ED395 ON carsharing');
        $this->addSql('ALTER TABLE carsharing ADD driver_id INT NOT NULL, ADD appointment_at TIME NOT NULL, ADD appointment_to VARCHAR(255) NOT NULL, ADD comment LONGTEXT DEFAULT NULL, DROP user_id');
        $this->addSql('ALTER TABLE carsharing ADD CONSTRAINT FK_4FDAE719C3423909 FOREIGN KEY (driver_id) REFERENCES app_users (id)');
        $this->addSql('CREATE INDEX IDX_4FDAE719C3423909 ON carsharing (driver_id)');
        $this->addSql('ALTER TABLE stage_api ADD animator VARCHAR(64) NOT NULL, ADD date DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE carsharing DROP FOREIGN KEY FK_4FDAE719C3423909');
        $this->addSql('DROP INDEX IDX_4FDAE719C3423909 ON carsharing');
        $this->addSql('ALTER TABLE carsharing ADD user_id INT DEFAULT NULL, DROP driver_id, DROP appointment_at, DROP appointment_to, DROP comment');
        $this->addSql('ALTER TABLE carsharing ADD CONSTRAINT FK_4FDAE719A76ED395 FOREIGN KEY (user_id) REFERENCES app_users (id)');
        $this->addSql('CREATE INDEX IDX_4FDAE719A76ED395 ON carsharing (user_id)');
        $this->addSql('ALTER TABLE stage_api DROP animator, DROP date');
    }
}
