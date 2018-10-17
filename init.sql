SET NAMES UTF8MB3;
SET FOREIGN_KEY_CHECKS = 0;

-- -------------------------------------------------------------------
-- InnoDB is a reasonable choice if you need to store data with a high degree of fidelity with complicated interactions and relationships.
-- MyISAM is a reasonable choice if you need to save or load a large number of records in a small amount of time.

-- I wouldn't recommend using MyISAM for data that matters.
-- It's great for logging or comments fields or anything where you don't particularly care if a record vanishes into the twisting nether.
-- InnoDB is good for when you care about your data, don't need fast searches and have to use MySQL.
-- --------------------------------------------------------------------

-- --------------------------------
--  Table structure for `customers`
-- --------------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `surname` VARCHAR(255) NOT NULL,
  `address` VARCHAR(255) NULL,
  `twitter_alias` VARCHAR(255) NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB3;

-- --------------------------------
--  Table structure for `bookings`
-- --------------------------------
DROP TABLE IF EXISTS `bookings`;
CREATE TABLE `bookings` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `customer_id` INT(11) NOT NULL,
  `reference` VARCHAR(255) NOT NULL,
  `for_date` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`customer_id`)
        REFERENCES customers(`id`)
        ON DELETE CASCADE
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB3;

INSERT INTO `customers` (`id`, `title`, `name`, `surname`, `address`) VALUES
(1, 'Mr.', 'Jim', 'Edwards', '23 Where I live, Liverpool, L1 3TF'),
(2, 'Mr.', 'Dave', 'Maher', '24 My House, Manchester, M1 3TF'),
(3, 'Mrs.', 'Susan', 'Lewis', '25 Skelmer Road, London, LN1 3TF'),
(4, 'Miss', 'Lorraine', 'Taylor', '26 Palm Avenue, Newcastle, N1 3TF');

INSERT INTO `bookings` (`customer_id`, `reference`, `for_date`) VALUES
(1, 'JE122', '2017-01-01'),
(1, 'JE125', '2017-03-02'),
(4, 'LT478', '2017-02-15'),
(4, 'LT791', '2017-04-01');

SET FOREIGN_KEY_CHECKS = 1;
