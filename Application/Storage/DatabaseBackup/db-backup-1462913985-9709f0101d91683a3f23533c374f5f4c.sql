DROP TABLE IF EXISTS admin;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(12) NOT NULL,
  `sifre` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kayittarihi` datetime DEFAULT NULL,
  `songiris` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS migrations;

CREATE TABLE `migrations` (
  `name` varchar(512) NOT NULL,
  `type` varchar(256) NOT NULL,
  `version` varchar(3) NOT NULL,
  `date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




