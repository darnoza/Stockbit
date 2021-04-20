CREATE TABLE `tb_log` (
  `Seq` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(20) NOT NULL,
  `Search` varchar(100) NOT NULL,
  `imdbID` varchar(100) NOT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Seq`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
