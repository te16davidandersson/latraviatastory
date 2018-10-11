-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 11 okt 2018 kl 10:22
-- Serverversion: 10.1.29-MariaDB
-- PHP-version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `te16`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `login`
--

CREATE TABLE `login` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(16) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumpning av Data i tabell `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `email`) VALUES
(1, 'david', '$2y$10$QIHmNHkx.AhOQ1Qiq5Lwt.PKEuKwJFh896IhFfrv.aeHiqgldKfSK', 'david.andersson@elev.ga.ntig.se');

-- --------------------------------------------------------

--
-- Tabellstruktur `story`
--

CREATE TABLE `story` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_bin NOT NULL,
  `place` varchar(64) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumpning av Data i tabell `story`
--

INSERT INTO `story` (`id`, `text`, `place`) VALUES
(1, 'Du och Violetta bor på landet, ni får slut på pengar', 'landet'),
(2, 'Du reser för att tjäna pengar', 'landet'),
(3, 'Du stannar', 'landet'),
(4, 'Violetta är döende', 'landet'),
(5, 'Violetta är döende', 'landet'),
(6, 'Fortsätt tjäna pengar', 'reser'),
(7, 'Återvänd', 'reser'),
(8, 'Ge Violetta pasta carbonara', 'landet'),
(9, 'Ge Violetta pasta alfredo', 'landet'),
(10, 'Violetta dog', 'reser'),
(11, 'Violetta dog', 'landet'),
(12, 'Slut på pengar', 'landet'),
(13, 'Fortsätt tjäna pengar', 'reser'),
(14, 'Återvänd och ge Violetta pasta alfredo', 'landet'),
(15, 'Violetta får pasta alfredo (Återupplivas)', 'landet'),
(16, 'Res och tjäna pengar', 'reser'),
(17, 'Ge Violetta pasta alfredo (Återupplivas)', 'landet'),
(18, 'Res och tjäna pengar', 'landet'),
(19, 'Stanna', 'landet'),
(20, 'Violetta ska begravas', 'landet'),
(21, 'Död (Slut)', 'landet'),
(22, 'Sörj henns död och gå vidare i livet', 'landet'),
(23, 'Återvänd och ge henne pasta alfredo', 'landet'),
(24, 'Slut', 'landet');

-- --------------------------------------------------------

--
-- Tabellstruktur `storylinks`
--

CREATE TABLE `storylinks` (
  `id` int(10) UNSIGNED NOT NULL,
  `storyid` int(10) UNSIGNED NOT NULL,
  `target` int(10) UNSIGNED NOT NULL,
  `text` varchar(128) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumpning av Data i tabell `storylinks`
--

INSERT INTO `storylinks` (`id`, `storyid`, `target`, `text`) VALUES
(1, 1, 2, 'Alfredo reser'),
(2, 1, 3, 'Alfredo stannar');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `storylinks`
--
ALTER TABLE `storylinks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `storyid` (`storyid`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT för tabell `story`
--
ALTER TABLE `story`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT för tabell `storylinks`
--
ALTER TABLE `storylinks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
