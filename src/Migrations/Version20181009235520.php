<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181009235520 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, abonne_id INT NOT NULL, num_compteur VARCHAR(255) NOT NULL, nom_abn VARCHAR(255) NOT NULL, date_facture DATE NOT NULL, anc_consommation INT DEFAULT NULL, nouv_consommation INT DEFAULT NULL, solde INT DEFAULT NULL, solde_anterieur INT DEFAULT NULL, total_facture INT DEFAULT NULL, date_limite_paiement DATE NOT NULL, INDEX IDX_FE866410C325A696 (abonne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410C325A696 FOREIGN KEY (abonne_id) REFERENCES abonne (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE facture');
    }
}
