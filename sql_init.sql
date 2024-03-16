CREATE DATABASE IF NOT EXISTS`mi`
CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `mi`;

CREATE TABLE IF NOT EXISTS `users` (
  `Id` int(10) unsigned NOT NULL auto_increment,
  `FirstName` varchar(32) NOT NULL ,
  `LastName` varchar(32) NOT NULL ,
  `UserName` varchar(32) NOT NULL ,
  `Passw` varchar(256) NOT NULL ,
  PRIMARY KEY  (`Id`)
)
ENGINE = MYISAM
CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE UNIQUE INDEX uniqueUserName on users (UserName);