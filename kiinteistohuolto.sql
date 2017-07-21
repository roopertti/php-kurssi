-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2017 at 05:13 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kiinteistohuolto`
--

-- --------------------------------------------------------

--
-- Table structure for table `asiakas`
--

CREATE TABLE `asiakas` (
  `avain` int(11) NOT NULL,
  `tunnus` varchar(8) NOT NULL,
  `salasana` varchar(8) NOT NULL,
  `nimi` varchar(32) NOT NULL,
  `kaynti_osoite` varchar(32) NOT NULL,
  `laskutus_osoite` varchar(32) NOT NULL,
  `puhnro` varchar(12) NOT NULL,
  `email` varchar(32) NOT NULL,
  `asunnon_tyyppi` varchar(20) NOT NULL,
  `asunnon_pinta_ala` int(10) NOT NULL,
  `tontin_pinta_ala` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asiakas`
--

INSERT INTO `asiakas` (`avain`, `tunnus`, `salasana`, `nimi`, `kaynti_osoite`, `laskutus_osoite`, `puhnro`, `email`, `asunnon_tyyppi`, `asunnon_pinta_ala`, `tontin_pinta_ala`) VALUES
(1, 'robertk', 'asdf123', 'Robert Kuhlmann', 'Puronsuunkatu 8 A 20', 'Puronsuunkatu 8 A 20', '503060930', 'robzku2@hotmail.com', 'YksiÃ¶', 34, 34),
(2, 'testi', 'testi', 'Tero Testaaja', 'Testikatu 1', 'Testikatu 1', '12345678', 'testi@testi.fi', 'Omakotitalo', 200, 300);

-- --------------------------------------------------------

--
-- Table structure for table `tarjouspyynto`
--

CREATE TABLE `tarjouspyynto` (
  `id` int(11) NOT NULL,
  `tilaaja` varchar(32) NOT NULL,
  `kuvaus` varchar(500) NOT NULL,
  `jatetty` datetime NOT NULL,
  `kustannus_arvio` int(10) DEFAULT NULL,
  `vastattu` datetime DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `asiakasId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarjouspyynto`
--

INSERT INTO `tarjouspyynto` (`id`, `tilaaja`, `kuvaus`, `jatetty`, `kustannus_arvio`, `vastattu`, `status`, `asiakasId`) VALUES
(15, 'Robert Kuhlmann', 'vuan kehttaatko tulla tuon perkellleen pihanurmen ajammaan,,,!! pentti tarjoopi olovin', '2017-07-20 01:12:44', 1, NULL, 'VASTATTU', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tilaus`
--

CREATE TABLE `tilaus` (
  `id` int(11) NOT NULL,
  `tilaaja` varchar(32) NOT NULL,
  `kuvaus` varchar(500) NOT NULL,
  `tilattu` datetime NOT NULL,
  `aloitettu` datetime DEFAULT NULL,
  `valmistunut` datetime DEFAULT NULL,
  `hyvaksytty` datetime DEFAULT NULL,
  `kommentti` varchar(500) DEFAULT NULL,
  `tarvikkeet` varchar(500) DEFAULT NULL,
  `kustannus_arvio` int(10) DEFAULT NULL,
  `tuntimaara` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `asiakasId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tilaus`
--

INSERT INTO `tilaus` (`id`, `tilaaja`, `kuvaus`, `tilattu`, `aloitettu`, `valmistunut`, `hyvaksytty`, `kommentti`, `tarvikkeet`, `kustannus_arvio`, `tuntimaara`, `status`, `asiakasId`) VALUES
(3, 'Robert Kuhlmann', 'Vuan pitÃ¤s kÃ¤yÃ¤ kastelemassa tuas kukkia!', '2017-07-20 00:16:29', NULL, NULL, NULL, NULL, NULL, 15, 0, 'TILATTU', 1),
(4, 'Robert Kuhlmann', 'perrrrskule asd', '2017-07-20 00:37:21', NULL, NULL, NULL, NULL, NULL, 50, 0, 'TILATTU', 1),
(5, 'Robert Kuhlmann', 'semmosta', '2017-07-20 01:09:42', NULL, NULL, NULL, NULL, NULL, 20, 0, 'TILATTU', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asiakas`
--
ALTER TABLE `asiakas`
  ADD PRIMARY KEY (`avain`),
  ADD UNIQUE KEY `tunnus` (`tunnus`);

--
-- Indexes for table `tarjouspyynto`
--
ALTER TABLE `tarjouspyynto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tilaus`
--
ALTER TABLE `tilaus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asiakas`
--
ALTER TABLE `asiakas`
  MODIFY `avain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tarjouspyynto`
--
ALTER TABLE `tarjouspyynto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tilaus`
--
ALTER TABLE `tilaus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
