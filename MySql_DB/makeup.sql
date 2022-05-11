SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `makeup` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `makeup`;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `name` varchar(25) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `admin` (`name`, `surname`, `email`, `password`, `admin_id`) VALUES
('Michal', 'Nowak', 'mn@gm.com', '123456789', 1);

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`appointment_id`),
  KEY `user_id` (`user_id`) USING BTREE,
  KEY `service` (`service`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO `appointment` (`appointment_id`, `user_id`, `service`, `date`, `time`) VALUES
(4, 2, 4, '2020-05-13', '15:00:00'),
(6, 1, 4, '2020-05-21', '18:00:00'),
(7, 1, 9, '2020-05-14', '12:00:00'),
(8, 1, 10, '2020-06-07', '19:19:00'),
(9, 4, 10, '2020-06-05', '17:53:00');

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `category` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO `service` (`id`, `name`, `category`, `description`, `availability`, `price`) VALUES
(4, 'Bridal trial', 'Makeup', '', 1, 45),
(5, 'Bridal ', 'Makeup', '', 1, 60),
(6, 'Daytime', 'Makeup', '', 1, 25),
(7, 'Evening', 'Makeup', '', 1, 35),
(8, 'Occasional', 'Makeup', '', 1, 35),
(9, 'Kids', 'Face painting', '', 1, 20),
(10, 'Adults', 'Face painting', '', 1, 40);

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `user` (`user_id`, `name`, `surname`, `birthdate`, `phone`, `email`, `password`, `reg_date`) VALUES
(1, 'Alex', 'Campos', '2000-05-01', '123456789', 'ac@gm.com', '123456789', '2020-05-28 08:56:55'),
(2, 'Reik', 'Luna', '2001-05-20', '01234567777', 'rl@gm.com', '1234567899', '2020-05-29 14:11:53'),
(4, 'Tester', 'testing', '2015-03-29', '0123123123', 'Test@gmail.com', '123456789', '2020-05-29 14:18:22');


ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`service`) REFERENCES `service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
