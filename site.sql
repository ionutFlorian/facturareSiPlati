-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Gazda: 127.0.0.1
-- Timp de generare: 19 Sep 2013 la 15:01
-- Versiune server: 5.5.32
-- Versiune PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Bază de date: `site`
--
CREATE DATABASE IF NOT EXISTS `site` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `site`;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `facturi`
--

CREATE TABLE IF NOT EXISTS `facturi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Salvarea datelor din tabel `facturi`
--

INSERT INTO `facturi` (`id`, `title`) VALUES
(3, 'Prima Factura'),
(4, 'A doua factura');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `plati`
--

CREATE TABLE IF NOT EXISTS `plati` (
  `facturaId` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `suma` int(11) NOT NULL,
  KEY `id` (`id`),
  KEY `facturaId` (`facturaId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Salvarea datelor din tabel `plati`
--

INSERT INTO `plati` (`facturaId`, `id`, `suma`) VALUES
(0, 1, 200),
(0, 2, 200),
(0, 3, 100),
(3, 4, 120),
(3, 5, 200);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
