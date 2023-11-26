-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 26, 2023 at 01:53 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `theme` int DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `profilepic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `emailverified` int DEFAULT NULL,
  `adminStatus` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `email`, `password`, `datetime`, `description`, `bio`, `theme`, `country`, `display_name`, `profilepic`, `banner`, `emailverified`, `adminStatus`) VALUES
(3, 'Steef581', 'stefan.woltinge@gmail.com', '$2y$10$IEu0e0VfdLjtVagAUham6.aoAR4hw5bs1mV5IscPjoSQ0YCPiKUtG', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'InsulineInspecteur', 'sven.woltinge070302@gmail.com', '$2y$10$rnriahYyGZvWylgJeEFpOeaQ65d86It2vstuQiuyJuo9ut.GSwcKC', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'lars', 'lars@gmail.com', '$2y$10$28MauvatDcJ72D8tKe.SKueqHFephTLYTTgiDxwscd8GUiU5myy1q', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Woltonn', 'wolton.mail@gmail.com', '$2y$10$KKBf3Lji4X9i/H6bNSypkeDb5hIwO3QF.xhfkXSnPNA0xaMf0ZStq', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Wolton', 'christian.woltinge@gmail.com', '$2y$12$yVTsvvONN2qs6lqe5LJ6MOThZsWoHcmshHBUMSu7/wPXgvpXayS2G', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'CG_Wolton', 'cg.woltinge@student.alfa-college.nl', '$2y$12$d7hP5ZH6wILyUhfGfairiuJATOGK5KLwir0PnvnyxEQb7XhS/diAu', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
