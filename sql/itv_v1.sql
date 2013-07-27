-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 26. Jul 2013 um 12:29
-- Server Version: 5.5.32
-- PHP-Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
SET FOREIGN_KEY_CHECKS=0;

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
  `b_vorname` varchar(40) NOT NULL,
  `b_nachname` varchar(40) NOT NULL,
  `b_name` varchar(40) NOT NULL,
  `b_email` varchar(255) NOT NULL,
  PRIMARY KEY (`b_id`),
  KEY `bg_id` (`bg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`b_id`, `bg_id`, `b_pw`, `b_vorname`, `b_nachname`, `b_name`, `b_email`) VALUES
(8, 5, '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '', '', 'Leon', ''),
(9, 5, '*00A51F3F48415C7D4E8908980D443C29C69B60C9', 'Johannes', 'Alt', 'johannes.alt', 'altjohannes510@gmail.com'),
(10, 5, '*A4B6157319038724E3560894F7F932C8886EBFCF', 'Leon', 'Geim', 'leongeim', ''),
(11, 5, '*94BDCEBE19083CE2A1F959FD02F964C7AF4CFC29', 'Thomas', 'Bayer', 'thomas.bayer', 'thomasbayer95@gmail.com'),
(17, 5, '*C519D9F81EFE5C77B3C94A67119B98A4C17711EB', 'Philipp', 'Schmidkunz', 'philipp.schmidkunz', 'philippschmidkunz@googlemail.com'),
(18, 6, '*E2C277BAA637E2E323FEA3A03F2E409B374D8827', 'Adrian', 'Geuss', 'adrian.geuss', 'adriangeuss@gmail.com'),
(19, 5, '*6892D460CC3543A87AC6F13DE339B62EFBDDBCA0', 'Thomas', 'Bayer2', 'thomas.bayer2', 'thomas.bayer@test.com'),
(20, 6, '*51B76DE2A6FC620B72FA100C6BBC5A84694FE894', 'Thomas', 'Michl', 'thomas.michl', 'thomas.michl1988@gmail.com');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzergruppe`
--

CREATE TABLE IF NOT EXISTS `benutzergruppe` (
  `bg_id` int(11) NOT NULL AUTO_INCREMENT,
  `bg_name` varchar(40) NOT NULL,
  `bg_rechte` int(11) NOT NULL,
  PRIMARY KEY (`bg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Daten für Tabelle `benutzergruppe`
--

INSERT INTO `benutzergruppe` (`bg_id`, `bg_name`, `bg_rechte`) VALUES
(5, 'Lehrer', 3),
(6, 'Systembetreuer', 1),
(7, 'Azubis', 2);

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
  `lieferant_l_id` int(11) DEFAULT NULL,
  `lieferant_r_id` int(11) DEFAULT NULL,
  `k_name` varchar(40) DEFAULT NULL,
  `k_einkaufsdatum` int(11) DEFAULT NULL,
  `k_gewaehrleistungsdauer` int(11) DEFAULT NULL,
  `k_notiz` varchar(1024) DEFAULT NULL,
  `k_hersteller` varchar(45) DEFAULT NULL,
  `komponentenarten_ka_id` int(11) DEFAULT NULL,
  `k_device` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`k_id`),
  KEY `fk_komponenten_haendler` (`lieferant_l_id`),
  KEY `fk_komponenten_raeume1` (`lieferant_r_id`),
  KEY `fk_komponenten_komponentenarten1` (`komponentenarten_ka_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Daten für Tabelle `komponente`
--

INSERT INTO `komponente` (`k_id`, `lieferant_l_id`, `lieferant_r_id`, `k_name`, `k_einkaufsdatum`, `k_gewaehrleistungsdauer`, `k_notiz`, `k_hersteller`, `komponentenarten_ka_id`, `k_device`) VALUES
(1, 1, 1, 'XT-801', 2052013, 30, NULL, 'Siemens', 2, 0),
(2, 1, 1, 'GTX-560', 25072013, 12, NULL, 'Nvidia', 12, 0),
(3, 1, 1, 'Plasma TV', 25072013, 1, 'Fernseher', 'Leonie', 11, 0),
(4, 1, 1, 'Plasma TV', 25072013, 1, 'Fernseher', 'Leonie', 11, 1),
(11, 1, 1, '', 1374789600, 1406325600, 'advavadv', 'hp', 12, 1),
(12, 1, 1, '', 1374789600, 1437861600, '', 'hp', 12, 1),
(13, 1, 1, 'sasda', 1372716000, 1375002269, 'qw', 'asdasda', 12, 1),
(14, 1, 1, '', 1374789600, 1375002387, '', '', 12, 1),
(15, 1, 1, 'testtesttest', 1374789600, 1374876000, 'asdvasdvasv', 'hp', 12, 1),
(16, 1, 1, 'testtesttest', 1374789600, 1374876000, 'asdvasdvasv', 'hp', 12, 1),
(17, 1, 1, 'testtesttest', 1374789600, 1374962400, 'asdvasvasdv', 'hp', 12, 1),
(18, 1, 1, '', 1372716000, 1372716000, '', '', 12, 1),
(19, 1, 1, '', 1373320800, 1373320800, '', '', 12, 1),
(20, 1, 1, '', 1372802400, 1372802400, '', '', 12, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

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
(35, 'Kühlung'),
(36, 'twest'),
(37, 'twest');

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
(1, 2, 'KAT 3'),
(1, 35, ''),
(1, 36, ''),
(1, 37, '123'),
(2, 15, '2'),
(17, 9, '4 GB RAM'),
(17, 14, '4GHz');

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
  `kom_id` int(11) NOT NULL AUTO_INCREMENT,
  `k_id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `comment` varchar(1024) NOT NULL,
  `datum` int(11) NOT NULL,
  PRIMARY KEY (`kom_id`),
  KEY `k_id` (`k_id`),
  KEY `v_id` (`v_id`),
  KEY `b_id` (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `komp_vorgang`
--

INSERT INTO `komp_vorgang` (`kom_id`, `k_id`, `v_id`, `b_id`, `comment`, `datum`) VALUES
(1, 1, 2, 8, '', 0),
(2, 4, 2, 8, '', 2121212);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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

SET FOREIGN_KEY_CHECKS=1;