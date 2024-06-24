-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 24 jun 2024 om 09:00
-- Serverversie: 8.3.0
-- PHP-versie: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patisserie_enrollment`
--
CREATE DATABASE IF NOT EXISTS `patisserie_enrollment` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `patisserie_enrollment`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '123123');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `bericht` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `contacts`
--

INSERT INTO `contacts` (`id`, `email`, `bericht`, `created_at`) VALUES
(1, 'test@gmail.com', 'Hoi, Ik ben Test en wil iets zeggen.', '2024-06-24 08:29:39');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `enrollments`
--

DROP TABLE IF EXISTS `enrollments`;
CREATE TABLE IF NOT EXISTS `enrollments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `voornaam` varchar(50) NOT NULL,
  `achternaam` varchar(50) NOT NULL,
  `geboortedatum` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefoonnummer` varchar(20) NOT NULL,
  `straatnaam` varchar(100) NOT NULL,
  `postcode` varchar(20) NOT NULL,
  `woonplaats` varchar(50) NOT NULL,
  `motivatie` text NOT NULL,
  `ervaring` text NOT NULL,
  `hoe_gehoord` enum('internet','vrienden_familie','social_media','andere') DEFAULT NULL,
  `motivatiebrief_path` varchar(255) NOT NULL,
  `voorwaarden` tinyint(1) NOT NULL,
  `inschrijfdatum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `enrollments`
--

INSERT INTO `enrollments` (`id`, `voornaam`, `achternaam`, `geboortedatum`, `email`, `telefoonnummer`, `straatnaam`, `postcode`, `woonplaats`, `motivatie`, `ervaring`, `hoe_gehoord`, `motivatiebrief_path`, `voorwaarden`, `inschrijfdatum`) VALUES
(1, 'Hyper', 'Nano', '2000-02-05', 'hhypernanoo@gmail.com', '0639142009', 'Daltoonlaan 25', '2528 CD', 'Utrecht', 'Omdat het super leuk is.', 'Ja', 'internet', 'uploads/cv-template.pdf', 1, '2024-06-24 07:25:24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
