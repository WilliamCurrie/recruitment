SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `customers`
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL auto_increment,
  `first_name` varchar(30) NOT NULL,
  `second_name` varchar(30) NOT NULL,
  `address` varchar(255) NULL,
  `twitter_alias` varchar(255) NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Table structure for `bookings`
-- ----------------------------
DROP TABLE IF EXISTS `bookings`;
CREATE TABLE `bookings` (
  `booking_id` int(10) NOT NULL auto_increment,
  `customer_id` int(10) NOT NULL,
  `booking_reference` varchar(15) NOT NULL,
  `booking_date` DATETIME NOT NULL,
  PRIMARY KEY (`booking_id`),
  FOREIGN KEY (`customer_id`) REFERENCES `customers`(`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO `customers` (`customer_id`, `first_name`, `second_name`, `address`) VALUES
(1, 'Jim', 'Edwards', '23 Where I live, Liverpool, L1 3TF'),
(2, 'Dave', 'Maher', '24 My House, Manchester, M1 3TF'),
(3, 'Susan', 'Lewis', '25 Skelmer Road, London, LN1 3TF'),
(4, 'Lorraine', 'Taylor', '26 Palm Avenue, Newcastle, N1 3TF');

INSERT INTO `bookings` (`customer_id`, `booking_reference`, `booking_date`) VALUES
(1, 'JE122', '2017-01-01'),
(1, 'JE125', '2017-03-02'),
(4, 'LT478', '2017-02-15'),
(4, 'LT791', '2017-04-01');
