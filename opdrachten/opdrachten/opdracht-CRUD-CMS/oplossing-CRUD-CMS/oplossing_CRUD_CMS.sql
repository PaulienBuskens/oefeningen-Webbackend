-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 18 mrt 2015 om 15:57
-- Serverversie: 5.6.16
-- PHP-versie: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Databank: `oplossing_crud_cms`
--
CREATE DATABASE IF NOT EXISTS `oplossing_crud_cms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `oplossing_crud_cms`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `artikels`
--

CREATE TABLE IF NOT EXISTS `artikels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(250) NOT NULL,
  `artikel` text NOT NULL,
  `kernwoorden` varchar(250) NOT NULL,
  `datum` date NOT NULL,
  `is_active` int(1) unsigned NOT NULL,
  `is_archived` int(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Tabel leegmaken voor invoegen `artikels`
--

TRUNCATE TABLE `artikels`;
--
-- Gegevens worden uitgevoerd voor tabel `artikels`
--

INSERT INTO `artikels` (`id`, `titel`, `artikel`, `kernwoorden`, `datum`, `is_active`, `is_archived`) VALUES
(1, 'Eerste tests', 'test', 'kernwoord 01', '0000-00-00', 1, 0),
(2, 'Tweede test', 'test', 'kernwoord 01', '1990-10-12', 1, 0),
(3, 'Derde artikel', 'test', 'test', '1980-01-01', 1, 0),
(4, 'testsqsd', 'qsdfqsdf', 'qsdfqsdf', '1980-01-01', 1, 0),
(5, 'Een testjesss', 'test', 'test', '1995-07-27', 1, 0),
(6, 'Test', 'qsdfqsd', 'ghjfgjfgh', '1984-05-05', 0, 0),
(7, '', '', '', '0000-00-00', 1, 1),
(8, 'aha', 'test', '1254', '1258-01-01', 1, 0),
(9, '', '', '', '0000-00-00', 1, 1),
(10, '', '', '', '0000-00-00', 1, 1),
(11, 'Toevoegen', 'test', 'test', '0000-00-00', 1, 1),
(12, 'Test', 'test', 'test', '0000-00-00', 1, 1),
(13, 'Eerste test', 'test', 'kernwoord 01', '0000-00-00', 1, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(250) COLLATE utf8_bin NOT NULL,
  `password` varchar(250) COLLATE utf8_bin NOT NULL,
  `salt` varchar(250) COLLATE utf8_bin NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Tabel leegmaken voor invoegen `users`
--

TRUNCATE TABLE `users`;
--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `salt`, `user_type`, `date`) VALUES
(1, 'test@test.be', 'ff5fc63ed509c23e6f823a090a3647fd23d4005f5717ec338a0cb91fb7243f5393c5798cdf251b90a92979aa1f98bb20ecfab864b708b831cfa9f24e41e93af8', '296697392550977479b8229.22705951', 1, '2015-03-18 14:01:59');
