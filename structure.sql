CREATE TABLE IF NOT EXISTS `pdv_liste` (
  `pdv` int(11) NOT NULL,
  `latitude` DOUBLE NOT NULL,
  `longitude` DOUBLE NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `ville` varchar(50),
  `cp` MEDIUMINT UNSIGNED,
  PRIMARY KEY (`pdv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `carburants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pdv` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `prix` int(11) DEFAULT NULL,
  `maj` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`),
  KEY `pdv` (`pdv`),
  CONSTRAINT `carburants_ibfk_1` FOREIGN KEY (`pdv`) REFERENCES `pdv_liste` (`pdv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;