-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.7.16-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema school
--

CREATE DATABASE IF NOT EXISTS school;
USE school;

--
-- Temporary table structure for view `liteinfo`
--
DROP TABLE IF EXISTS `liteinfo`;
DROP VIEW IF EXISTS `liteinfo`;
CREATE TABLE `liteinfo` (
  `姓名` char(10),
  `专业` char(20),
  `总分` decimal(32,0)
);

--
-- Definition of table `les`
--

DROP TABLE IF EXISTS `les`;
CREATE TABLE `les` (
  `LesName` char(20) NOT NULL,
  `LesID` char(10) NOT NULL,
  `StuID` char(10) NOT NULL,
  `Etc` text,
  `Mark` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

--
-- Dumping data for table `les`
--

/*!40000 ALTER TABLE `les` DISABLE KEYS */;
INSERT INTO `les` (`LesName`,`LesID`,`StuID`,`Etc`,`Mark`) VALUES 
 ('MySQL','789001','9221115001',NULL,75),
 ('Java','789002','9221115001',NULL,80);
/*!40000 ALTER TABLE `les` ENABLE KEYS */;


--
-- Definition of table `spec`
--

DROP TABLE IF EXISTS `spec`;
CREATE TABLE `spec` (
  `SpecID` char(10) NOT NULL,
  `SpecName` char(20) NOT NULL,
  `Etc` text,
  PRIMARY KEY (`SpecID`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

--
-- Dumping data for table `spec`
--

/*!40000 ALTER TABLE `spec` DISABLE KEYS */;
INSERT INTO `spec` (`SpecID`,`SpecName`,`Etc`) VALUES 
 ('1','网络','网络专业负责网络与系统维护'),
 ('2','软件','软件专业专职于软件研发'),
 ('3','设计','设计专业负责界面UI与艺术制作');
/*!40000 ALTER TABLE `spec` ENABLE KEYS */;


--
-- Definition of table `stu`
--

DROP TABLE IF EXISTS `stu`;
CREATE TABLE `stu` (
  `StuID` char(10) NOT NULL,
  `Name` char(10) NOT NULL,
  `Sex` tinyint(1) NOT NULL,
  `SpecID` char(10) NOT NULL,
  `Birthday` date NOT NULL,
  `Etc` text,
  `Intro` text,
  PRIMARY KEY (`StuID`),
  UNIQUE KEY `StuID` (`StuID`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

--
-- Dumping data for table `stu`
--

/*!40000 ALTER TABLE `stu` DISABLE KEYS */;
INSERT INTO `stu` (`StuID`,`Name`,`Sex`,`SpecID`,`Birthday`,`Etc`,`Intro`) VALUES 
 ('1','1',1,'1','1999-02-09','hello','this is a test information!'),
 ('2','2',0,'2','2222-02-02','222222','22222222222222222222222a'),
 ('9221115001','张山峰',1,'1','1997-01-01','影月神庙','11'),
 ('9221115002','李斯哲',1,'1','1997-06-30','刺刀海岸',''),
 ('9221115003','王伍柏',1,'1','1997-08-12','提瑞斯法王座',''),
 ('9221115004','阿斯渡',0,'1','1997-12-06','落锤湿地',''),
 ('9221115005','晓之尘',0,'1','1997-10-09','翡翠王国',''),
 ('9221115006','中端荷',0,'1','1997-09-06','冰风湖',''),
 ('9221115007','阿三',1,'2','1996-05-26',NULL,''),
 ('9221115008','国兴',1,'2','1997-06-21',NULL,''),
 ('9221115009','俊风',1,'2','1996-09-12',NULL,''),
 ('9221115010','季萌',0,'2','1997-05-25',NULL,''),
 ('9221115011','慧雅',0,'2','1996-08-02',NULL,''),
 ('9221115012','启颜',0,'2','1997-02-09',NULL,''),
 ('9221115013','宏才',1,'3','1996-02-01',NULL,''),
 ('9221115014','德宇',1,'3','1996-05-19',NULL,''),
 ('9221115015','光远',1,'3','1996-11-29',NULL,''),
 ('9221115016','芷巧',0,'3','1996-04-22',NULL,''),
 ('9221115017','琼华',0,'3','1996-08-16',NULL,''),
 ('9221115018','铃语',0,'3','1996-07-01',NULL,'');
/*!40000 ALTER TABLE `stu` ENABLE KEYS */;

--
-- Create schema school2
--

CREATE DATABASE IF NOT EXISTS school2;
USE school2;

--
-- Definition of table `kc`
--

DROP TABLE IF EXISTS `kc`;
CREATE TABLE `kc` (
  `LesID` char(10) NOT NULL,
  `LesName` char(20) NOT NULL,
  `LesCredit` double DEFAULT NULL,
  `LesTime` char(20) DEFAULT NULL,
  PRIMARY KEY (`LesID`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

--
-- Dumping data for table `kc`
--

/*!40000 ALTER TABLE `kc` DISABLE KEYS */;
/*!40000 ALTER TABLE `kc` ENABLE KEYS */;


--
-- Definition of table `spec`
--

DROP TABLE IF EXISTS `spec`;
CREATE TABLE `spec` (
  `SpecID` char(10) NOT NULL,
  `SpecName` char(20) NOT NULL,
  `Etc` text,
  `Intro` text,
  PRIMARY KEY (`SpecID`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

--
-- Dumping data for table `spec`
--

/*!40000 ALTER TABLE `spec` DISABLE KEYS */;
INSERT INTO `spec` (`SpecID`,`SpecName`,`Etc`,`Intro`) VALUES 
 ('1','Network','etc','Network is a subject that connects computer to computer'),
 ('2','Software',NULL,NULL),
 ('3','Design',NULL,NULL);
/*!40000 ALTER TABLE `spec` ENABLE KEYS */;


--
-- Definition of table `stu`
--

DROP TABLE IF EXISTS `stu`;
CREATE TABLE `stu` (
  `StuID` char(10) NOT NULL,
  `Name` char(10) NOT NULL,
  `Sex` tinyint(1) unsigned NOT NULL,
  `SpecID` char(10) DEFAULT NULL,
  `Birthday` date DEFAULT NULL,
  `Etc` text,
  `Intro` text,
  PRIMARY KEY (`StuID`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

--
-- Dumping data for table `stu`
--

/*!40000 ALTER TABLE `stu` DISABLE KEYS */;
INSERT INTO `stu` (`StuID`,`Name`,`Sex`,`SpecID`,`Birthday`,`Etc`,`Intro`) VALUES 
 ('9221115001','zhangsan',1,'1','1997-07-07','etc','intro'),
 ('9221115002','lisi',1,'1','1997-05-05',NULL,NULL),
 ('9221115003','wanger',1,'1','1997-06-08',NULL,NULL);
/*!40000 ALTER TABLE `stu` ENABLE KEYS */;


--
-- Definition of table `xk`
--

DROP TABLE IF EXISTS `xk`;
CREATE TABLE `xk` (
  `StuID` char(10) NOT NULL,
  `LesID` char(10) NOT NULL,
  `Grade` double DEFAULT NULL,
  PRIMARY KEY (`LesID`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

--
-- Dumping data for table `xk`
--

/*!40000 ALTER TABLE `xk` DISABLE KEYS */;
/*!40000 ALTER TABLE `xk` ENABLE KEYS */;


--
-- Definition of procedure `jc`
--

DROP PROCEDURE IF EXISTS `jc`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `jc`(in n int, out num int)
begin
declare i int;
declare j int;
set i = 1;
set j = 1;
set num = 0;

while i <= n do
    set j=j*i;
    set num=num+j;
    set i=i+1;
end while;
end $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;
--
-- Create schema school
--

CREATE DATABASE IF NOT EXISTS school;
USE school;

--
-- Definition of view `liteinfo`
--

DROP TABLE IF EXISTS `liteinfo`;
DROP VIEW IF EXISTS `liteinfo`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `liteinfo` AS select `stu`.`Name` AS `姓名`,`spec`.`SpecName` AS `专业`,sum(`les`.`Mark`) AS `总分` from ((`spec` join `stu`) join `les`) where ((`spec`.`SpecID` = `stu`.`SpecID`) and (`stu`.`StuID` = `les`.`StuID`)) group by `stu`.`Name`;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
