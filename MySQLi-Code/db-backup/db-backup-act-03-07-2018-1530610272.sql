DROP TABLE IF EXISTS tbjoina;

CREATE TABLE `tbjoina` (
  `noa` int(11) NOT NULL AUTO_INCREMENT,
  `joina` varchar(200) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`noa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO tbjoina VALUES("1","A*A","1"),
("2","B*B","2");



DROP TABLE IF EXISTS tbjoinb;

CREATE TABLE `tbjoinb` (
  `nob` int(11) NOT NULL AUTO_INCREMENT,
  `joinb` varchar(200) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`nob`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO tbjoinb VALUES("1","A/A","1"),
("2","A/A","2");



DROP TABLE IF EXISTS tbshow;

CREATE TABLE `tbshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO tbshow VALUES("1","กขคง","name4@email.com","0000-00-00"),
("2","B","BB","0000-00-00"),
("3","Name 5","name5@email.com","0000-00-00"),
("4","C","CC","0000-00-00");



