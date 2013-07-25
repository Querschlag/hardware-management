-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Jul 2013 um 13:48
-- Server Version: 5.5.32
-- PHP-Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
SET foreign_key_checks = 0;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `itv_v1`
--
CREATE DATABASE IF NOT EXISTS `itv_v1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `itv_v1`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE IF NOT EXISTS `benutzer` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `bg_id` int(11) NOT NULL,
  `b_pw` varchar(255) NOT NULL DEFAULT 'PASSWORD',
  `Vorname` varchar(40) NOT NULL,
  `Nachname` varchar(40) NOT NULL,
  `b_name` varchar(40) NOT NULL,
  `b-email` varchar(255) NOT NULL,
  PRIMARY KEY (`b_id`),
  KEY `bg_id` (`bg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`b_id`, `bg_id`, `b_pw`, `Vorname`, `Nachname`, `b_name`, `b-email`) VALUES
(8, 5, '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '', '', 'Leon', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzergruppe`
--

CREATE TABLE IF NOT EXISTS `benutzergruppe` (
  `bg_id` int(11) NOT NULL AUTO_INCREMENT,
  `bg_name` varchar(40) NOT NULL,
  `bg_rechte` int(11) NOT NULL,
  PRIMARY KEY (`bg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Daten für Tabelle `benutzergruppe`
--

INSERT INTO `benutzergruppe` (`bg_id`, `bg_name`, `bg_rechte`) VALUES
(5, 'Lehrer', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kart_kattribut`
--

CREATE TABLE IF NOT EXISTS `kart_kattribut` (
  `komponentenarten_ka_id` int(11) NOT NULL,
  `komponentenattribute_kat_id` int(11) NOT NULL,
  PRIMARY KEY (`komponentenarten_ka_id`,`komponentenattribute_kat_id`),
  KEY `fk_komponentenarten_has_komponentenattribute_komponentenattri1` (`komponentenattribute_kat_id`),
  KEY `fk_komponentenarten_has_komponentenattribute_komponentenarten1` (`komponentenarten_ka_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `kart_kattribut`
--

INSERT INTO `kart_kattribut` (`komponentenarten_ka_id`, `komponentenattribute_kat_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(3, 5),
(2, 6),
(2, 7),
(3, 8),
(3, 9),
(12, 9),
(4, 10),
(9, 10),
(10, 10),
(11, 10),
(4, 11),
(4, 12),
(4, 13),
(9, 13),
(4, 14),
(9, 14),
(11, 14),
(12, 14),
(6, 15),
(6, 16),
(12, 16),
(6, 17),
(6, 18),
(7, 19),
(7, 20),
(8, 21),
(9, 21),
(11, 21),
(12, 21),
(8, 22),
(9, 22),
(10, 22),
(11, 22),
(12, 22),
(8, 23),
(9, 23),
(12, 23),
(9, 24),
(10, 24),
(12, 24),
(9, 25),
(12, 25),
(9, 26),
(12, 26),
(9, 27),
(10, 27),
(11, 27),
(12, 27),
(9, 28),
(12, 28),
(9, 29),
(9, 30),
(10, 30);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kattribut_zulaessiger_wert`
--

CREATE TABLE IF NOT EXISTS `kattribut_zulaessiger_wert` (
  `komponentenattribute_kat_id` int(11) NOT NULL,
  `zulaessige_werte_zw_id` int(11) NOT NULL,
  PRIMARY KEY (`komponentenattribute_kat_id`,`zulaessige_werte_zw_id`),
  KEY `fk_komponentenattribute_has_zulaessige_werte_zulaessige_werte1` (`zulaessige_werte_zw_id`),
  KEY `fk_komponentenattribute_has_zulaessige_werte_komponentenattri1` (`komponentenattribute_kat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `kattribut_zulaessiger_wert`
--

INSERT INTO `kattribut_zulaessiger_wert` (`komponentenattribute_kat_id`, `zulaessige_werte_zw_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(4, 6),
(4, 7),
(4, 8),
(4, 9),
(4, 10),
(28, 11),
(28, 12),
(28, 13),
(28, 14),
(28, 15),
(28, 16),
(28, 17),
(26, 18),
(26, 19);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `komponente`
--

CREATE TABLE IF NOT EXISTS `komponente` (
  `k_id` int(11) NOT NULL AUTO_INCREMENT,
  `lieferant_l_id` int(11) NOT NULL,
  `lieferant_r_id` int(11) NOT NULL,
  `k_name` varchar(40) NOT NULL,
  `k_einkaufsdatum` int(11) DEFAULT NULL,
  `k_gewaehrleistungsdauer` int(11) DEFAULT NULL,
  `k_notiz` varchar(1024) DEFAULT NULL,
  `k_hersteller` varchar(45) DEFAULT NULL,
  `komponentenarten_ka_id` int(11) NOT NULL,
  PRIMARY KEY (`k_id`),
  KEY `fk_komponenten_haendler` (`lieferant_l_id`),
  KEY `fk_komponenten_raeume1` (`lieferant_r_id`),
  KEY `fk_komponenten_komponentenarten1` (`komponentenarten_ka_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `komponente`
--

INSERT INTO `komponente` (`k_id`, `lieferant_l_id`, `lieferant_r_id`, `k_name`, `k_einkaufsdatum`, `k_gewaehrleistungsdauer`, `k_notiz`, `k_hersteller`, `komponentenarten_ka_id`) VALUES
(1, 1, 1, 'XT-801', 2052013, 30, NULL, 'Siemens', 3),
(2, 1, 1, 'GTX-560', 25072013, 12, NULL, 'Nvidia', 12);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `komponentenarten`
--

CREATE TABLE IF NOT EXISTS `komponentenarten` (
  `ka_id` int(11) NOT NULL AUTO_INCREMENT,
  `ka_komponentenart` varchar(45) DEFAULT NULL,
  `ka_link` varchar(255) NOT NULL,
  PRIMARY KEY (`ka_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Daten für Tabelle `komponentenarten`
--

INSERT INTO `komponentenarten` (`ka_id`, `ka_komponentenart`, `ka_link`) VALUES
(1, 'Ethernet Kabel', ''),
(2, 'Prozessor', ''),
(3, 'Motherboard', ''),
(4, 'Beamer', ''),
(5, 'Drucker', ''),
(6, 'Server', ''),
(7, 'Modem', ''),
(8, 'Blu-ray Player', ''),
(9, 'Notebook', ''),
(10, 'Mobiles Gerät', ''),
(11, 'Fernseher', ''),
(12, 'Computer', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `komponentenattribute`
--

CREATE TABLE IF NOT EXISTS `komponentenattribute` (
  `kat_id` int(11) NOT NULL AUTO_INCREMENT,
  `kat_name` varchar(40) NOT NULL,
  PRIMARY KEY (`kat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Daten für Tabelle `komponentenattribute`
--

INSERT INTO `komponentenattribute` (`kat_id`, `kat_name`) VALUES
(1, 'Länge in Meter'),
(2, 'Klasse'),
(3, 'Durchmesser'),
(4, 'Anzahl Kerne'),
(5, 'Prozessorsockel'),
(6, 'Taktrate'),
(7, 'Pufferspeicher'),
(8, 'Chipsatz'),
(9, 'Kühlung'),
(10, 'Auflösung'),
(11, 'Format'),
(12, 'Kontrast'),
(13, 'Leistung'),
(14, 'Gewicht'),
(15, 'RAID Level'),
(16, 'Gehäusetyp'),
(17, 'Festplattenspeicher'),
(18, 'Arbeitsspeicher'),
(19, 'Anschlussart'),
(20, 'Anzahl Ports'),
(21, 'Anschlüsse'),
(22, 'Farbe'),
(23, 'Interne Festplatte'),
(24, 'CPU'),
(25, 'Grafikkarte'),
(26, 'Webcam'),
(27, 'Größe Display'),
(28, 'Betriebssystem'),
(29, 'Zubehör'),
(30, 'Akku'),
(31, 'Gehäuse'),
(32, 'LTE'),
(33, '3D-Fähig'),
(34, 'Typ'),
(35, 'Kühlung');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `komponente_kattribut`
--

CREATE TABLE IF NOT EXISTS `komponente_kattribut` (
  `komponenten_k_id` int(11) NOT NULL,
  `komponentenattribute_kat_id` int(11) NOT NULL,
  `khkat_wert` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`komponenten_k_id`,`komponentenattribute_kat_id`),
  KEY `fk_komponenten_has_komponentenattribute_komponentenattribute1` (`komponentenattribute_kat_id`),
  KEY `fk_komponenten_has_komponentenattribute_komponenten1` (`komponenten_k_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `komponente_kattribut`
--

INSERT INTO `komponente_kattribut` (`komponenten_k_id`, `komponentenattribute_kat_id`, `khkat_wert`) VALUES
(1, 6, '2400 Ghz'),
(2, 15, '2');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `komponente_komponente`
--

CREATE TABLE IF NOT EXISTS `komponente_komponente` (
  `komponenten_k_id_aggregat` int(11) NOT NULL,
  `komponenten_k_id_teil` int(11) NOT NULL,
  `khk_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`khk_id`),
  KEY `fk_komponenten_has_komponenten_komponenten2` (`komponenten_k_id_teil`),
  KEY `fk_komponenten_has_komponenten_komponenten1` (`komponenten_k_id_aggregat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `komp_vorgang`
--

CREATE TABLE IF NOT EXISTS `komp_vorgang` (
  `k_id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `comment` varchar(1024) NOT NULL,
  `datum` int(11) NOT NULL,
  KEY `k_id` (`k_id`),
  KEY `v_id` (`v_id`),
  KEY `b_id` (`b_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `lieferant`
--

CREATE TABLE IF NOT EXISTS `lieferant` (
  `l_id` int(11) NOT NULL AUTO_INCREMENT,
  `l_firmenname` varchar(45) DEFAULT NULL,
  `l_strasse` varchar(45) DEFAULT NULL,
  `l_plz` varchar(15) DEFAULT NULL,
  `l_ort` varchar(45) DEFAULT NULL,
  `l_tel` varchar(20) DEFAULT NULL,
  `l_mobil` varchar(20) DEFAULT NULL,
  `l_fax` varchar(20) DEFAULT NULL,
  `l_email` varchar(45) DEFAULT NULL,
  `l_land` char(40) NOT NULL,
  PRIMARY KEY (`l_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `lieferant`
--

INSERT INTO `lieferant` (`l_id`, `l_firmenname`, `l_strasse`, `l_plz`, `l_ort`, `l_tel`, `l_mobil`, `l_fax`, `l_email`, `l_land`) VALUES
(1, 'Siemens', 'Siemensstrasse', '91173', 'Nürnberg', NULL, NULL, NULL, 'siemens@gmail.com', 'Deutschland');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `raeume`
--

CREATE TABLE IF NOT EXISTS `raeume` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_nr` varchar(11) DEFAULT NULL COMMENT 'z.B. r014, W304, etc.',
  `r_etage` int(11) NOT NULL,
  `r_bezeichnung` varchar(45) DEFAULT NULL COMMENT 'z.B. Werkstatt, Lager,...',
  `r_notiz` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `raeume`
--

INSERT INTO `raeume` (`r_id`, `r_nr`, `r_etage`, `r_bezeichnung`, `r_notiz`) VALUES
(1, '01', 0, 'Computerraum', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vorgangsarten`
--

CREATE TABLE IF NOT EXISTS `vorgangsarten` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `v_bezeichnung` varchar(45) DEFAULT NULL COMMENT 'Einbau / Ausbau',
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `vorgangsarten`
--

INSERT INTO `vorgangsarten` (`v_id`, `v_bezeichnung`) VALUES
(1, 'OK'),
(2, 'Problem');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zulaessige_werte`
--

CREATE TABLE IF NOT EXISTS `zulaessige_werte` (
  `zw_id` int(11) NOT NULL AUTO_INCREMENT,
  `zw_wert` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`zw_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Daten für Tabelle `zulaessige_werte`
--

INSERT INTO `zulaessige_werte` (`zw_id`, `zw_wert`) VALUES
(1, 'KAT 3'),
(2, 'KAT 4'),
(3, 'KAT 5'),
(4, 'KAT 6'),
(5, 'KAT 7'),
(6, '1'),
(7, '2'),
(8, '4'),
(9, '8'),
(10, '16'),
(11, 'Windows 7 32-Bit'),
(12, 'Windows 7 64-Bit'),
(13, 'Windows Vista 32-Bit'),
(14, 'Windows Vista 64-Bit'),
(15, 'Windows XP 32-Bit'),
(16, 'MAC-OS'),
(17, 'Linux'),
(18, 'Ja'),
(19, 'Nein');

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD CONSTRAINT `fk_benutzer_benutzergruppe` FOREIGN KEY (`bg_id`) REFERENCES `benutzergruppe` (`bg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `kart_kattribut`
--
ALTER TABLE `kart_kattribut`
  ADD CONSTRAINT `fk_komponentenarten_has_komponentenattribute_komponentenarten1` FOREIGN KEY (`komponentenarten_ka_id`) REFERENCES `komponentenarten` (`ka_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_komponentenarten_has_komponentenattribute_komponentenattri1` FOREIGN KEY (`komponentenattribute_kat_id`) REFERENCES `komponentenattribute` (`kat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `kattribut_zulaessiger_wert`
--
ALTER TABLE `kattribut_zulaessiger_wert`
  ADD CONSTRAINT `fk_komponentenattribute_has_zulaessige_werte_komponentenattri1` FOREIGN KEY (`komponentenattribute_kat_id`) REFERENCES `komponentenattribute` (`kat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_komponentenattribute_has_zulaessige_werte_zulaessige_werte1` FOREIGN KEY (`zulaessige_werte_zw_id`) REFERENCES `zulaessige_werte` (`zw_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `komponente`
--
ALTER TABLE `komponente`
  ADD CONSTRAINT `fk_komponenten_haendler` FOREIGN KEY (`lieferant_l_id`) REFERENCES `lieferant` (`l_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_komponenten_komponentenarten1` FOREIGN KEY (`komponentenarten_ka_id`) REFERENCES `komponentenarten` (`ka_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_komponenten_raeume1` FOREIGN KEY (`lieferant_r_id`) REFERENCES `raeume` (`r_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `komponente_kattribut`
--
ALTER TABLE `komponente_kattribut`
  ADD CONSTRAINT `fk_komponenten_has_komponentenattribute_komponenten1` FOREIGN KEY (`komponenten_k_id`) REFERENCES `komponente` (`k_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_komponenten_has_komponentenattribute_komponentenattribute1` FOREIGN KEY (`komponentenattribute_kat_id`) REFERENCES `komponentenattribute` (`kat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `komponente_komponente`
--
ALTER TABLE `komponente_komponente`
  ADD CONSTRAINT `fk_komponenten_has_komponenten_komponenten1` FOREIGN KEY (`komponenten_k_id_aggregat`) REFERENCES `komponente` (`k_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_komponenten_has_komponenten_komponenten2` FOREIGN KEY (`komponenten_k_id_teil`) REFERENCES `komponente` (`k_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `komp_vorgang`
--
ALTER TABLE `komp_vorgang`
  ADD CONSTRAINT `fk_b_id` FOREIGN KEY (`b_id`) REFERENCES `benutzer` (`b_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_k_id` FOREIGN KEY (`k_id`) REFERENCES `komponente` (`k_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_v_id` FOREIGN KEY (`v_id`) REFERENCES `vorgangsarten` (`v_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

SET foreign_key_checks = 1;