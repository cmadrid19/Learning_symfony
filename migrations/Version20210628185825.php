<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210628185825 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fondo_author (fondo_id INT NOT NULL, author_id INT NOT NULL, INDEX IDX_610CDB30AA510E89 (fondo_id), INDEX IDX_610CDB30F675F31B (author_id), PRIMARY KEY(fondo_id, author_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fondo_author ADD CONSTRAINT FK_610CDB30AA510E89 FOREIGN KEY (fondo_id) REFERENCES fondo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fondo_author ADD CONSTRAINT FK_610CDB30F675F31B FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE editorial ADD fondo_id INT NOT NULL');
        $this->addSql('ALTER TABLE editorial ADD CONSTRAINT FK_8F713754AA510E89 FOREIGN KEY (fondo_id) REFERENCES fondo (id)');
        $this->addSql('CREATE INDEX IDX_8F713754AA510E89 ON editorial (fondo_id)');
        $this->addSql('ALTER TABLE fondo ADD string VARCHAR(20) NOT NULL, ADD edicion VARCHAR(20) NOT NULL, ADD categoria VARCHAR(20) NOT NULL, DROP isbn, DROP edition, DROP publication, DROP category, CHANGE title title VARCHAR(20) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE fondo_author');
        $this->addSql('ALTER TABLE editorial DROP FOREIGN KEY FK_8F713754AA510E89');
        $this->addSql('DROP INDEX IDX_8F713754AA510E89 ON editorial');
        $this->addSql('ALTER TABLE editorial DROP fondo_id');
        $this->addSql('ALTER TABLE fondo ADD isbn VARCHAR(12) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD edition VARCHAR(4) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD publication INT NOT NULL, ADD category VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP string, DROP edicion, DROP categoria, CHANGE title title VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
