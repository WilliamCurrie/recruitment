SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;
-- Prefixing the column names with the name of the table serves two purposes:
-- 1) Avoids the need of table /column aliasing when joining multiple columns that may contain the same name columns
-- 2) Helps to discover the database structure without the need to maintain additional documentation. This is why I
--    would know that 'booking_customer_id' in table 'bookings' is a FK to table 'customers' even if the foreign key
--    wasn't defined (although I defined it anyway for completeness sake)

-- I also changed the tables engine. There is no reason (as far as I can see) to use MyISAM in this case.
-- ----------------------------
--  Table structure for `customers`
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL auto_increment,
  `customer_first_name` varchar(30) NOT NULL,
  `customer_second_name` varchar(30) NOT NULL,
  `customer_address` varchar(255) NULL,
  `customer_twitter_alias` varchar(255) NULL,
  PRIMARY KEY  (`customer_id`)
) ENGINE=InnoDb AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `bookings`
-- ----------------------------
DROP TABLE IF EXISTS `bookings`;
CREATE TABLE `bookings` (
  `booking_id` int(10) NOT NULL auto_increment,
  `booking_customer_id` int(11) NOT NULL,
  `booking_reference` varchar(15) NOT NULL,
  `booking_date` DATETIME NOT NULL,
  PRIMARY KEY  (`booking_id`)
) ENGINE=InnoDb AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


-- ----------------------------
-- FK definition
-- ----------------------------
ALTER TABLE `test`.`bookings`
ADD INDEX `fk_bookings_customers_idx` (`booking_customer_id` ASC);
ALTER TABLE `test`.`bookings`
ADD CONSTRAINT `fk_bookings_customers`
  FOREIGN KEY (`booking_customer_id`)
  REFERENCES `test`.`customers` (`customer_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

-- ----------------------------
-- Insert some data
-- ----------------------------
INSERT INTO `customers` (customer_id, customer_first_name, customer_second_name, customer_address) VALUES
(1, 'Jim', 'Edwards', '23 Where I live, Liverpool, L1 3TF'),
(2, 'Dave', 'Maher', '24 My House, Manchester, M1 3TF'),
(3, 'Susan', 'Lewis', '25 Skelmer Road, London, LN1 3TF'),
(4, 'Lorraine', 'Taylor', '26 Palm Avenue, Newcastle, N1 3TF');

INSERT INTO `bookings` (booking_customer_id, booking_reference, booking_date) VALUES
(1, 'JE122', '2017-01-01'),
(1, 'JE125', '2017-03-02'),
(4, 'LT478', '2017-02-15'),
(4, 'LT791', '2017-04-01');
