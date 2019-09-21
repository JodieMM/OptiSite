CREATE DATABASE `opti_db` /*!40100 DEFAULT CHARACTER SET utf8 */;

CREATE TABLE `accounts` (
  `email` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `newSoftwareEmails` tinyint(4) NOT NULL DEFAULT '1',
  `generalEmails` tinyint(4) NOT NULL DEFAULT '1',
  `confirmed` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `logged_in` (
  `email` varchar(50) NOT NULL,
  `verikey` varchar(255) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`email`),
  CONSTRAINT `logged_in_email` FOREIGN KEY (`email`) REFERENCES `accounts` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `verification_codes` (
  `email` varchar(50) NOT NULL,
  `vericode` varchar(255) NOT NULL,
  `use_code` varchar(1) NOT NULL DEFAULT 'R' COMMENT 'R - Register\nU - Update (Email)\nP - Reset Password',
  `replacement` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`email`),
  CONSTRAINT `emailReplacement` FOREIGN KEY (`email`) REFERENCES `accounts` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `blacklist` (
  `email` varchar(50) NOT NULL,
  `requested` tinyint(4) DEFAULT '0',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
