CREATE TABLE IF NOT EXISTS `pdv_liste` (
  `pdv` int(11) NOT NULL,
  `latitude` FLOAT NOT NULL,
  `longitude` FLOAT NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pdv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `carburants` (
  `id` int(11) NOT NULL,
  `pdv` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `prix` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pdv` (`pdv`),
  CONSTRAINT `carburants_ibfk_1` FOREIGN KEY (`pdv`) REFERENCES `pdv_liste` (`pdv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;