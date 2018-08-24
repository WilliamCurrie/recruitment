<?php declare(strict_types=1);

namespace Wranx\Application\Console\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180823204755 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql("INSERT INTO `customers` (id, title, first_name, last_name, address) VALUES
(1, 'Mr', 'Jim', 'Edwards', '23 Where I live, Liverpool, L1 3TF'),
(2, 'Mr', 'Dave', 'Maher', '24 My House, Manchester, M1 3TF'),
(3, 'Mrs', 'Susan', 'Lewis', '25 Skelmer Road, London, LN1 3TF'),
(4, 'Mrs','Lorraine', 'Taylor', '26 Palm Avenue, Newcastle, N1 3TF'),
(5, 'Mr', 'Jim', 'Johnson', null)");

        $this->addSql("INSERT INTO `bookings` (customer_id, booking_reference, booking_date) VALUES
(1, 'JE122', '2017-01-01'),
(1, 'JE125', '2017-03-02'),
(4, 'LT478', '2017-02-15'),
(4, 'LT791', '2017-04-01')");
    }

    public function down(Schema $schema) : void
    {

    }
}
