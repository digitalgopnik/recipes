# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.18-MariaDB)
# Datenbank: rezepte
# Erstellt am: 2017-07-25 18:46:51 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle bilder
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bilder`;

CREATE TABLE `bilder` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pfad` varchar(1024) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Export von Tabelle bilder_zu_information
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bilder_zu_information`;

CREATE TABLE `bilder_zu_information` (
  `bilder_id` int(11) NOT NULL,
  `information_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Export von Tabelle information
# ------------------------------------------------------------

DROP TABLE IF EXISTS `information`;

CREATE TABLE `information` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `dauer` varchar(255) DEFAULT NULL,
  `anzahl` int(11) DEFAULT NULL,
  `portionen_personen` varchar(32) DEFAULT NULL,
  `sonstiges` longtext,
  `kueche` varchar(64) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `information` WRITE;
/*!40000 ALTER TABLE `information` DISABLE KEYS */;

INSERT INTO `information` (`id`, `name`, `dauer`, `anzahl`, `portionen_personen`, `sonstiges`, `kueche`, `created`, `modified`)
VALUES
	(1,'Russischer Zupfkuchen','1 Stunde',1,'Portion','','Russisch','2017-06-13 19:23:34','2017-07-22 12:15:40'),
	(2,'Vegane Pelmeni','45 Minuten',2,'Personen','','Russisch','2017-07-22 08:59:00','2017-07-22 08:59:00'),
	(3,'Gefüllte Auberginenröllchen mit veganer Mayonnaise','60 Minuten',10,'Röllchen','','Russisch','2017-07-22 09:06:50','2017-07-22 09:06:50'),
	(4,'Rote Bete goes \"Borschtsch\"','60 Minuten',4,'Personen','','Russisch','2017-07-22 09:09:28','2017-07-22 09:09:28'),
	(5,'Currytofu mit Mango-Chutney','60 Minuten',2,'Portionen','','Indisch','2017-07-22 09:16:24','2017-07-22 09:17:16'),
	(6,'Vegane Carbonara','45 Minuten',4,'Portionen','','Italienisch','2017-07-22 12:47:55','2017-07-22 12:47:55'),
	(7,'Pizza für Faule','60 Minuten',2,'Personen','','Italienisch','2017-07-22 12:48:46','2017-07-22 12:48:46'),
	(8,'Hirsebratling mit Amaranth','60 Minuten',3,'Personen','','kA','2017-07-22 12:49:48','2017-07-22 12:49:48');

/*!40000 ALTER TABLE `information` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle information_zu_kategorie
# ------------------------------------------------------------

DROP TABLE IF EXISTS `information_zu_kategorie`;

CREATE TABLE `information_zu_kategorie` (
  `information_id` int(11) NOT NULL,
  `kategorie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `information_zu_kategorie` WRITE;
/*!40000 ALTER TABLE `information_zu_kategorie` DISABLE KEYS */;

INSERT INTO `information_zu_kategorie` (`information_id`, `kategorie_id`)
VALUES
	(1,1),
	(2,1),
	(3,1),
	(4,1);

/*!40000 ALTER TABLE `information_zu_kategorie` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle kategorie
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kategorie`;

CREATE TABLE `kategorie` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kategorie` WRITE;
/*!40000 ALTER TABLE `kategorie` DISABLE KEYS */;

INSERT INTO `kategorie` (`id`, `name`, `created`, `modified`)
VALUES
	(1,'Hauptgang','2017-06-13 19:19:33','2017-06-13 19:19:33'),
	(2,'Kuchen','2017-06-13 19:19:41','2017-06-13 19:19:41'),
	(3,'Aufstrich','2017-06-13 19:19:49','2017-06-13 19:19:49'),
	(4,'Vorspeise','2017-07-12 16:58:49','2017-07-12 16:58:49');

/*!40000 ALTER TABLE `kategorie` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle zubereitung
# ------------------------------------------------------------

DROP TABLE IF EXISTS `zubereitung`;

CREATE TABLE `zubereitung` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titel` varchar(1024) DEFAULT NULL,
  `beschreibung` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `zubereitung` WRITE;
/*!40000 ALTER TABLE `zubereitung` DISABLE KEYS */;

INSERT INTO `zubereitung` (`id`, `titel`, `beschreibung`)
VALUES
	(1,NULL,'Zuerst die Zutaten für den Teig ohne die Milch mit den Knethaken des Mixers verrühren. Wenn er zu trocken sein sollte, etwas Flüssigkeit hinzugeben, bis er die richtige Konsistenz zum Auskleiden der Springform hat.\r\n\r\nEin wenig Teig für die Krümel beiseitestellen und den Rest in die Springform drücken und einen Rand formen. Die Springform für eine Stunde in den Kühlschrank stellen. \r\n\r\nNach 50 min. den Backofen auf 160°C vorheizen und die Zutaten für die Creme verrühren. In die Springform füllen, aus dem restlichen Teig Krümel formen und auf der Creme verteilen. Für 40 – 45 min. ab in den Backofen und genießen.'),
	(2,NULL,'Zwiebel und Knoblauch fein Würfeln. Die Schale der Roten Beet mit einem scharfen Messer entfernen und die Knollen in mundgerechte Stücke schneiden. Karotten, Kohl & eventuell eine Petersilienwurzel ebenfalls in kleine Stücke schneiden. Karotten und Petersilienwurzel wasche ich sehr gründlich, da ich sie gerne mit Schale verarbeite.\r\n\r\nIn einem Topf Öl erhitzen und Zwiebel mit Knoblauch darin anschwitzen. Die Stücke von Karotten, Kohl & Petersilienwurzel ebenfalls hinzufügen und etwa 4 Minuten mitbraten. Mit Salz und Pfeffer ordentlich würzen. Dann die Rote Bete hinzufügen. Alles kräftig durchmischen und mit Agavendicksaft ca. 3 Minuten karamellisieren lassen. Mit Balsamico Essig ablöschen und mit der Gemüsebrühe auffüllen. Das Ganze kurz stark aufkochen lassen und dann auf niedriger Stufe mindestens 35-45 Minuten vor sich hin köcheln lassen. Mit dem Saft einer halben Zitrone, Salz, Pfeffer und Dill abschmecken.\r\n\r\nTipp: Direkt nach der Kochzeit werden einige Zutaten, wie etwa der Kohl, die tiefrote Farbe der Bete noch nicht ganz aufgenommen haben. Man sollte die Suppe noch mindestens 2-3 Stunden kalt ziehen oder über Nacht im Kühlschrank stehen lassen. Erst dann hat das gesamte Gericht die tolle satt-rote Farbe der Bete aufgesogen.\r\nDas Gericht heiß mit einem dicken Klacks Sojajoghurt mit ein paar Spritzern Zitrone anrichten und mit viel Dill bestreuen.');

/*!40000 ALTER TABLE `zubereitung` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle zubereitung_zu_information
# ------------------------------------------------------------

DROP TABLE IF EXISTS `zubereitung_zu_information`;

CREATE TABLE `zubereitung_zu_information` (
  `zubereitung_id` int(11) NOT NULL,
  `information_id` int(11) NOT NULL,
  `sortierung` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `zubereitung_zu_information` WRITE;
/*!40000 ALTER TABLE `zubereitung_zu_information` DISABLE KEYS */;

INSERT INTO `zubereitung_zu_information` (`zubereitung_id`, `information_id`, `sortierung`)
VALUES
	(1,1,1),
	(2,4,1);

/*!40000 ALTER TABLE `zubereitung_zu_information` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle zutaten
# ------------------------------------------------------------

DROP TABLE IF EXISTS `zutaten`;

CREATE TABLE `zutaten` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `menge` varchar(16) DEFAULT NULL,
  `einheit` varchar(16) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `zutaten` WRITE;
/*!40000 ALTER TABLE `zutaten` DISABLE KEYS */;

INSERT INTO `zutaten` (`id`, `menge`, `einheit`, `name`, `created`, `modified`)
VALUES
	(1,'200','g','Mehl','2017-06-13 19:24:23','2017-06-13 19:24:23'),
	(3,'100','g','Zucker','2017-06-13 19:24:40','2017-06-13 19:24:40'),
	(4,'120','g','Margarine','2017-06-13 19:24:45','2017-06-13 19:24:45'),
	(5,'1','Packung','Vanillinzucker','2017-06-13 19:24:53','2017-06-13 19:24:53'),
	(7,'1','Packung','Backpulver','2017-06-13 19:25:11','2017-06-13 19:25:11'),
	(8,'40','g','Kakao','2017-06-13 19:25:22','2017-06-13 19:25:22'),
	(9,'wenig','','Hafermilch','2017-06-13 19:25:28','2017-06-13 19:25:28'),
	(10,'1','Becher','Joghurt (400g)','2017-06-13 19:25:39','2017-06-13 19:25:39'),
	(11,'1','Packung','Puddingpulver (Vanille)','2017-06-13 19:25:46','2017-06-13 19:25:46'),
	(12,'70','g','Zucker','2017-06-13 19:25:56','2017-06-13 19:25:56'),
	(13,'etwas','','Zitronensaft','2017-06-13 19:26:03','2017-06-13 19:26:03');

/*!40000 ALTER TABLE `zutaten` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle zutaten_zu_information
# ------------------------------------------------------------

DROP TABLE IF EXISTS `zutaten_zu_information`;

CREATE TABLE `zutaten_zu_information` (
  `information_id` int(11) NOT NULL,
  `zutaten_id` int(11) NOT NULL,
  `sortierung` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `zutaten_zu_information` WRITE;
/*!40000 ALTER TABLE `zutaten_zu_information` DISABLE KEYS */;

INSERT INTO `zutaten_zu_information` (`information_id`, `zutaten_id`, `sortierung`)
VALUES
	(1,1,NULL),
	(1,2,NULL),
	(1,3,NULL),
	(1,4,NULL),
	(1,5,NULL),
	(1,6,NULL),
	(1,7,NULL),
	(1,8,NULL),
	(1,9,NULL),
	(1,10,NULL),
	(1,11,NULL),
	(1,12,NULL),
	(1,13,NULL);

/*!40000 ALTER TABLE `zutaten_zu_information` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
