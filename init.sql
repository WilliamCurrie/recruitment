SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `customers`
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `address` varchar(255) NULL,
  `twitterAlias` varchar(255) NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `bookings`
-- ----------------------------
DROP TABLE IF EXISTS `bookings`;
CREATE TABLE `bookings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `customerId` int(11) NOT NULL,
  `reference` varchar(15) NOT NULL,
  `date` DATETIME NOT NULL,
  PRIMARY KEY  (`id`),
  INDEX (`customerId`),
  CONSTRAINT
    `booking_customer_fk`
    FOREIGN KEY (`customerId`)
    REFERENCES `customers`(`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

INSERT INTO `customers` (id, firstName, lastName, address) VALUES
(1, 'Jim', 'Edwards', '23 Where I live, Liverpool, L1 3TF'),
(2, 'Dave', 'Maher', '24 My House, Manchester, M1 3TF'),
(3, 'Susan', 'Lewis', '25 Skelmer Road, London, LN1 3TF'),
(4, 'Lorraine', 'Taylor', '26 Palm Avenue, Newcastle, N1 3TF');

INSERT INTO `bookings` (customerId, reference, date) VALUES
(1, 'JE122', '2017-01-01'),
(1, 'JE125', '2017-03-02'),
(4, 'LT478', '2017-02-15'),
(4, 'LT791', '2017-04-01');
