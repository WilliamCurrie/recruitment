<?php declare(strict_types=1);

namespace Wranx\Application\Console\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180823190805 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $table = $schema->createTable('customers');
        $table->addColumn('id', Type::INTEGER)->setAutoincrement(true);
        $table->addColumn('first_name', Type::STRING);
        $table->addColumn('last_name', Type::STRING);
        $table->addColumn('address', Type::STRING)->setNotnull(false);
        $table->addColumn('twitter_alias', Type::STRING)->setNotnull(false);
        $table->setPrimaryKey(['id']);

        $table = $schema->createTable('bookings');
        $table->addColumn('id', Type::INTEGER)->setAutoincrement(true);
        $table->addColumn('customer_id', Type::INTEGER);
        $table->addColumn('booking_reference', Type::STRING);
        $table->addColumn('booking_date', Type::DATETIME);
        $table->setPrimaryKey(['id']);
    }

    public function down(Schema $schema) : void
    {
        $schema->dropTable('customers');
        $schema->dropTable('bookings');
    }
}
