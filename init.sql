DROP DATABASE test;
CREATE DATABASE test;
USE test;
GRANT ALL PRIVILEGES ON test.* TO 'testuser'@'localhost' IDENTIFIED BY 'password';

CREATE TABLE `customers` (
    `id` int(10) NOT NULL auto_increment,
    `first_name` varchar(30) NOT NULL,
    `last_name` varchar(30) NOT NULL,
    `address` varchar(255) NULL,
    `twitter_alias` varchar(255) NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `bookings` (
    `id` int(10) NOT NULL auto_increment,
    `reference` varchar(15) NOT NULL,
    `date` DATETIME NOT NULL,
    `customer_id` int(11) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY(`customer_id`) REFERENCES `customers`(`id`)
) ENGINE=InnoDB;

INSERT INTO `customers` (first_name, last_name, address) VALUES
('Jim', 'Edwards', '23 Where I live, Liverpool, L1 3TF'),
('Dave', 'Maher', '24 My House, Manchester, M1 3TF'),
('Susan', 'Lewis', '25 Skelmer Road, London, LN1 3TF'),
('Lorraine', 'Taylor', '26 Palm Avenue, Newcastle, N1 3TF');

INSERT INTO `bookings` (customer_id, reference, date) VALUES
(1, 'JE122', '2017-01-01'),
(1, 'JE125', '2017-03-02'),
(4, 'LT478', '2017-02-15'),
(4, 'LT791', '2017-04-01');
