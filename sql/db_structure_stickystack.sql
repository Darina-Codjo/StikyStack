-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 04 mai 2024 à 17:30
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `stickystack`
--

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `idNote` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` varchar(500) NOT NULL,
  `creationDate` datetime(6) NOT NULL,
  `updateDate` datetime(6) NOT NULL,
  `sharedWith` enum('','','','','','','','','','') NOT NULL,
  PRIMARY KEY (`idNote`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `fullName` varchar(20) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `creationDate` datetime(6) NOT NULL,
  `updateDate` datetime(6) NOT NULL,
  `password` varchar(100) NOT NULL,
  `notes` enum('','','','','','','','','','','','','','','','','','','','') DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table 'link'
--

DROP TABLE IF EXISTS 'link'
CREATE TABLE IF NOT EXISTS 'link' (
'idUser' int,
'idNote'int,
FOREIGN KEY (idUser) REFERENCES user(idUser),
FOREIGN KEY (idNote) REFERENCES note(idNote),
PRIMARY KEY (idUser, idNote)
) ENGINE=MEMORY DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
