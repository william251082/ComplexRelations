<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20181201105815 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE genus ADD slug VARCHAR(255) NOT NULL, CHANGE fun_fact fun_fact VARCHAR(255) DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_38C5106E989D9B62 ON genus (slug)');
        $this->addSql('ALTER TABLE user CHANGE first_name first_name VARCHAR(255) DEFAULT NULL, CHANGE last_name last_name VARCHAR(255) DEFAULT NULL, CHANGE avatar_uri avatar_uri VARCHAR(255) DEFAULT NULL, CHANGE university_name university_name VARCHAR(255) DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_38C5106E989D9B62 ON genus');
        $this->addSql('ALTER TABLE genus DROP slug, CHANGE fun_fact fun_fact VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE user CHANGE first_name first_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE last_name last_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE avatar_uri avatar_uri VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE university_name university_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
    }
}
