-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 24. Jul 2013 um 08:09
-- Server Version: 5.5.32
-- PHP-Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


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
  `b_pw` varchar(40) NOT NULL DEFAULT 'PASSWORD',
  `b_name` varchar(40) NOT NULL,
  `b-email` varchar(255) NOT NULL,
  PRIMARY KEY (`b_id`),
  KEY `bg_id` (`bg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzergruppe`
--

CREATE TABLE IF NOT EXISTS `benutzergruppe` (
  `bg_id` int(11) NOT NULL AUTO_INCREMENT,
  `bg_name` varchar(40) NOT NULL,
  `bg_rechte` int(11) NOT NULL,
  PRIMARY KEY (`bg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `komponentenarten`
--

CREATE TABLE IF NOT EXISTS `komponentenarten` (
  `ka_id` int(11) NOT NULL AUTO_INCREMENT,
  `ka_komponentenart` varchar(45) DEFAULT NULL,
  `ka_link` varchar(255) NOT NULL,
  PRIMARY KEY (`ka_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `komponentenattribute`
--

CREATE TABLE IF NOT EXISTS `komponentenattribute` (
  `kat_id` int(11) NOT NULL AUTO_INCREMENT,
  `kat_name` varchar(40) NOT NULL,
  PRIMARY KEY (`kat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `komponente_komponente`
--

CREATE TABLE IF NOT EXISTS `komponente_komponente` (
  `komponenten_k_id_aggregat` int(11) NOT NULL,
  `komponenten_k_id_teil` int(11) NOT NULL,
  `khk_id` int(11) NOT NULL AUTO_INCREMENT,
  `vorgangsarten_v_id` int(11) NOT NULL,
  `khk_datum` int(11) DEFAULT NULL,
  PRIMARY KEY (`khk_id`),
  KEY `fk_komponenten_has_komponenten_komponenten2` (`komponenten_k_id_teil`),
  KEY `fk_komponenten_has_komponenten_komponenten1` (`komponenten_k_id_aggregat`),
  KEY `fk_komponente_hat_komponente_vorgangsarten1` (`vorgangsarten_v_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vorgangsarten`
--

CREATE TABLE IF NOT EXISTS `vorgangsarten` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `v_bezeichnung` varchar(45) DEFAULT NULL COMMENT 'Einbau / Ausbau',
  `vs_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  PRIMARY KEY (`v_id`),
  KEY `b_id` (`b_id`),
  KEY `vs_id` (`vs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vorgangsartenstatus`
--

CREATE TABLE IF NOT EXISTS `vorgangsartenstatus` (
  `vs_id` int(11) NOT NULL AUTO_INCREMENT,
  `vs_bezeichnung` varchar(50) NOT NULL,
  PRIMARY KEY (`vs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zulaessige_werte`
--

CREATE TABLE IF NOT EXISTS `zulaessige_werte` (
  `zw_id` int(11) NOT NULL AUTO_INCREMENT,
  `zw_wert` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`zw_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  ADD CONSTRAINT `fk_komponenten_has_komponenten_komponenten2` FOREIGN KEY (`komponenten_k_id_teil`) REFERENCES `komponente` (`k_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_komponente_hat_komponente_vorgangsarten1` FOREIGN KEY (`vorgangsarten_v_id`) REFERENCES `vorgangsarten` (`v_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `vorgangsarten`
--
ALTER TABLE `vorgangsarten`
  ADD CONSTRAINT `vorgangsarten_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `benutzer` (`b_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `vorgangsarten_ibfk_2` FOREIGN KEY (`vs_id`) REFERENCES `vorgangsartenstatus` (`vs_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
