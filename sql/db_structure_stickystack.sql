DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `idNote` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` varchar(500) NOT NULL,
  `creationDate` datetime(6) NOT NULL,
  `updateDate` datetime(6) NOT NULL,
  PRIMARY KEY (`idNote`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `creationDate` datetime(6) NOT NULL,
  `updateDate` datetime(6) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Structure de la table 'link'
--

DROP TABLE IF EXISTS `link`;
CREATE TABLE IF NOT EXISTS `link` (
`idLink` int NOT NULL AUTO_INCREMENT,
`idUser` int,
`idNote`int,
FOREIGN KEY (`idUser`) REFERENCES user(`idUser`),
FOREIGN KEY (`idNote`) REFERENCES note(`idNote`),
PRIMARY KEY (`idLink`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
