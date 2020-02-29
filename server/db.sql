SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE requests (
  id int(11) NOT NULL,
  ip varchar(127) NOT NULL,
  path varchar(255) NOT NULL,
  time datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE settings (
  id varchar(127) NOT NULL,
  value varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE requests
  ADD PRIMARY KEY (id);

ALTER TABLE settings
  ADD PRIMARY KEY (id);

ALTER TABLE requests
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
