<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190124153323 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE stage_club (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(128) NOT NULL, place VARCHAR(128) DEFAULT \'Club de Bourg-en-bresse\' NOT NULL, date DATETIME NOT NULL, poster VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, alt VARCHAR(64) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage_api (id INT AUTO_INCREMENT NOT NULL, id_api INT NOT NULL, is_suggested TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, role VARCHAR(32) NOT NULL, code VARCHAR(32) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE grade (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carsharing (id INT AUTO_INCREMENT NOT NULL, stage_api_id INT DEFAULT NULL, user_id INT DEFAULT NULL, seat_number INT NOT NULL, INDEX IDX_4FDAE719C81F9823 (stage_api_id), INDEX IDX_4FDAE719A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carsharing_user (carsharing_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_111C90C28F0361 (carsharing_id), INDEX IDX_111C90CA76ED395 (user_id), PRIMARY KEY(carsharing_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_users (id INT AUTO_INCREMENT NOT NULL, role_id INT NOT NULL, name VARCHAR(64) NOT NULL, firstname VARCHAR(64) NOT NULL, birthdate DATETIME NOT NULL, address VARCHAR(128) DEFAULT NULL, phone VARCHAR(32) NOT NULL, email VARCHAR(64) NOT NULL, password VARCHAR(64) NOT NULL, license VARCHAR(16) DEFAULT NULL, responsability ENUM(\'membre\', \'secrétaire\', \'trésorier\', \'président\'), teacher_comment LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_C2502824E7927C74 (email), UNIQUE INDEX UNIQ_C250282435C246D5 (password), INDEX IDX_C2502824D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_grade (user_id INT NOT NULL, grade_id INT NOT NULL, INDEX IDX_BB98556CA76ED395 (user_id), INDEX IDX_BB98556CFE19A1A8 (grade_id), PRIMARY KEY(user_id, grade_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_technique (user_id INT NOT NULL, technique_id INT NOT NULL, INDEX IDX_D7DB15A5A76ED395 (user_id), INDEX IDX_D7DB15A51F8ACB26 (technique_id), PRIMARY KEY(user_id, technique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technique (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(128) NOT NULL, attack VARCHAR(128) NOT NULL, side VARCHAR(32) NOT NULL, position VARCHAR(32) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(64) NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carsharing ADD CONSTRAINT FK_4FDAE719C81F9823 FOREIGN KEY (stage_api_id) REFERENCES stage_api (id)');
        $this->addSql('ALTER TABLE carsharing ADD CONSTRAINT FK_4FDAE719A76ED395 FOREIGN KEY (user_id) REFERENCES app_users (id)');
        $this->addSql('ALTER TABLE carsharing_user ADD CONSTRAINT FK_111C90C28F0361 FOREIGN KEY (carsharing_id) REFERENCES carsharing (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE carsharing_user ADD CONSTRAINT FK_111C90CA76ED395 FOREIGN KEY (user_id) REFERENCES app_users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE app_users ADD CONSTRAINT FK_C2502824D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE user_grade ADD CONSTRAINT FK_BB98556CA76ED395 FOREIGN KEY (user_id) REFERENCES app_users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_grade ADD CONSTRAINT FK_BB98556CFE19A1A8 FOREIGN KEY (grade_id) REFERENCES grade (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_technique ADD CONSTRAINT FK_D7DB15A5A76ED395 FOREIGN KEY (user_id) REFERENCES app_users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_technique ADD CONSTRAINT FK_D7DB15A51F8ACB26 FOREIGN KEY (technique_id) REFERENCES technique (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE carsharing DROP FOREIGN KEY FK_4FDAE719C81F9823');
        $this->addSql('ALTER TABLE app_users DROP FOREIGN KEY FK_C2502824D60322AC');
        $this->addSql('ALTER TABLE user_grade DROP FOREIGN KEY FK_BB98556CFE19A1A8');
        $this->addSql('ALTER TABLE carsharing_user DROP FOREIGN KEY FK_111C90C28F0361');
        $this->addSql('ALTER TABLE carsharing DROP FOREIGN KEY FK_4FDAE719A76ED395');
        $this->addSql('ALTER TABLE carsharing_user DROP FOREIGN KEY FK_111C90CA76ED395');
        $this->addSql('ALTER TABLE user_grade DROP FOREIGN KEY FK_BB98556CA76ED395');
        $this->addSql('ALTER TABLE user_technique DROP FOREIGN KEY FK_D7DB15A5A76ED395');
        $this->addSql('ALTER TABLE user_technique DROP FOREIGN KEY FK_D7DB15A51F8ACB26');
        $this->addSql('DROP TABLE stage_club');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE stage_api');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE grade');
        $this->addSql('DROP TABLE carsharing');
        $this->addSql('DROP TABLE carsharing_user');
        $this->addSql('DROP TABLE app_users');
        $this->addSql('DROP TABLE user_grade');
        $this->addSql('DROP TABLE user_technique');
        $this->addSql('DROP TABLE technique');
        $this->addSql('DROP TABLE news');
    }
}
