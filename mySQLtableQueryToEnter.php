<!--Run once if needed-->
<?php
$query = 
"CREATE TABLE `playerSettings` (
  `playerUsername` varchar(15) NOT NULL,
  `playerPassword` varchar(60) NOT NULL,
  `playerEmail` varchar(45) NOT NULL,
  `playerShottype1` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT 'Holds up to 32767 (2 bytes)',
  `playerShottype2` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `playerShottype3` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `playerCharPart1` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT 'Holds up to 127. Uses 1 byte',
  `playerCharPart2` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `playerCharPart3` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `playerCharPart4` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `playerLevel` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `playerExp` int(10) unsigned NOT NULL DEFAULT '0',
  `playerMovespeed` tinyint(1) unsigned NOT NULL DEFAULT '4',
  `playerHitbox` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `playerBackground` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `playerBGM` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `playerNameDisplay` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `idNumber` int(100) NOT NULL AUTO_INCREMENT,
  `P2Shot1` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `P2Shot2` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `P2Shot3` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `P2Head` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `P2Face` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `P2Body` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `P2Legs` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `P2Movespeed` tinyint(1) unsigned NOT NULL DEFAULT '4',
  `P2Hitbox` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `fire1P1` int(3) DEFAULT '1',
  `fire2P1` int(3) DEFAULT '1',
  `fire3P1` int(3) DEFAULT '1',
  `fire1P2` int(3) DEFAULT '1',
  `fire2P2` int(3) DEFAULT '1',
  `fire3P2` int(3) DEFAULT '1',
  `animateMethod` tinyint(3) NOT NULL DEFAULT '1' COMMENT 'In the config screen. Used to let Firefox users play.',
  PRIMARY KEY (`idNumber`),
  UNIQUE KEY `playerUsername_UNIQUE` (`playerUsername`),
  UNIQUE KEY `playerEmail_UNIQUE` (`playerEmail`),
  UNIQUE KEY `idNumber_UNIQUE` (`idNumber`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='This is the table to hold user settings for a bullethell.';"

$result = mysqli_query($link, $query);
if(!$result) die ("Database access failed: ".mysqli_error($link));

?>