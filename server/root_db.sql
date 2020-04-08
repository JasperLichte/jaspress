SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `licenses` (
    `token` varchar(255) NOT NULL,
    `database` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
