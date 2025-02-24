-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2025 at 02:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_qrcode`
--

-- --------------------------------------------------------

--
-- Table structure for table `anomalie`
--

CREATE TABLE `anomalie` (
  `id_anomalie` bigint(20) UNSIGNED NOT NULL,
  `date_signalement` date NOT NULL,
  `description_anomalie` text DEFAULT NULL,
  `personne_signalant` varchar(50) DEFAULT NULL,
  `lien_photo` varchar(50) DEFAULT NULL,
  `type_anomalie` varchar(50) NOT NULL,
  `id_equipement` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anomalie`
--

INSERT INTO `anomalie` (`id_anomalie`, `date_signalement`, `description_anomalie`, `personne_signalant`, `lien_photo`, `type_anomalie`, `id_equipement`) VALUES
(1, '2022-05-08', 'câble endommagé', 'F.Butelle', 'Content/img/alim1', 'Panne', 'P30-MN'),
(2, '2024-10-25', 'problème surchauffe', 'F.Butelle', 'Content/img/oscilloscope1', 'Panne', 'T63-L9');

-- --------------------------------------------------------

--
-- Table structure for table `banc`
--

CREATE TABLE `banc` (
  `id_banc` char(50) NOT NULL,
  `id_salle` int(11) NOT NULL,
  `date_achat` date DEFAULT NULL,
  `commentaires` text DEFAULT NULL,
  `id_fournisseur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banc`
--

INSERT INTO `banc` (`id_banc`, `id_salle`, `date_achat`, `commentaires`, `id_fournisseur`) VALUES
('AJLOM', 1, '2024-10-21', '', 1),
('EG?IJ', 7, '2019-06-25', '', 1),
('EGETRG', 9, '2023-12-30', '', 1),
('EHTH', 11, '2002-02-20', '', 1),
('EHTYJ', 11, '2011-11-11', '', 1),
('FSRTH', 9, '2021-06-23', '', 2),
('GOERJ', 8, '2012-02-16', '', 1),
('GTHYH', 2, '2023-06-12', '', 2),
('GYBYB', 2, '2021-01-02', '', 1),
('JRTDHR', 10, '2012-09-29', '', 2),
('MPGTG', 1, '2024-10-30', '', 1),
('OKJFO7', 12, '2001-05-26', '', 2),
('PZOOGF', 8, '2016-10-26', '', 2),
('SGTHYH', 10, '2008-05-09', '', 1),
('TG5HY', 4, '2020-07-01', '', 2),
('UHGRI', 7, '2022-04-30', '', 1),
('VBYHVYJ', 5, '2020-07-01', '', 1),
('VHHY', 4, '2010-05-17', '', 1),
('VNH?NUK', 6, '2021-01-18', '', 2),
('VTTHH', 3, '2016-02-05', '', 1),
('XFTGT', 5, '2015-10-17', '', 1),
('YHYHYU', 3, '2020-12-25', '', 1),
('YYBBF', 6, '2022-04-23', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `deplacement`
--

CREATE TABLE `deplacement` (
  `id_deplacement` bigint(20) UNSIGNED NOT NULL,
  `date_deplacement` date NOT NULL,
  `description_deplacement` text DEFAULT NULL,
  `personne_deplacant` varchar(50) DEFAULT NULL,
  `id_salle_origine` int(11) NOT NULL,
  `id_banc_origine` char(50) NOT NULL,
  `id_salle_destination` int(11) NOT NULL,
  `id_banc_destination` char(50) NOT NULL,
  `id_equipement` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deplacement`
--

INSERT INTO `deplacement` (`id_deplacement`, `date_deplacement`, `description_deplacement`, `personne_deplacant`, `id_salle_origine`, `id_banc_origine`, `id_salle_destination`, `id_banc_destination`, `id_equipement`) VALUES
(1, '2024-10-21', NULL, 'N.Fabre', 2, 'GTHYH', 4, 'TG5HY', 'T63-L9'),
(2, '2024-10-23', NULL, 'N.Fabre', 4, 'TG5HY', 2, 'GYBYB', 'T63-L9'),
(3, '2024-10-24', 'Remis à sa place initiale', 'N.Fabre', 2, 'GYBYB', 2, 'GTHYH', 'T63-L9'),
(4, '2024-11-11', NULL, 'N.Fabre', 2, 'GTHYH', 6, 'YYBBF', 'T63-L9'),
(5, '2024-11-13', 'Laissez-le à cette place j\'en aurai besoin demain', 'N.Fabre', 6, 'YYBBF', 2, 'GTHYH', 'T63-L9');

-- --------------------------------------------------------

--
-- Table structure for table `equipement`
--

CREATE TABLE `equipement` (
  `id_equipement` char(50) NOT NULL,
  `date_achat` date DEFAULT NULL,
  `infos_sup` text DEFAULT NULL,
  `lien_photo` varchar(50) NOT NULL,
  `id_fournisseur` int(11) DEFAULT NULL,
  `id_salle_actuelle` int(11) NOT NULL,
  `id_banc_actuel` char(50) NOT NULL,
  `etat` varchar(50) NOT NULL,
  `id_salle_affectation` int(11) NOT NULL,
  `id_banc_affectation` char(50) NOT NULL,
  `type_equipement` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipement`
--

INSERT INTO `equipement` (`id_equipement`, `date_achat`, `infos_sup`, `lien_photo`, `id_fournisseur`, `id_salle_actuelle`, `id_banc_actuel`, `etat`, `id_salle_affectation`, `id_banc_affectation`, `type_equipement`) VALUES
('A46-JF', '2019-04-20', 'bonjour', 'Content/img/GBF1.jpg', 1, 5, 'XFTGT', 'Opérationnel', 2, 'GTHYH', 'GBF'),
('K98-6A', '2019-04-06', 'hello', 'Content/img/multimetre1.jpg', 2, 4, 'VHHY', 'Opérationnel', 2, 'GTHYH', 'Multimètre'),
('P30-MN', '2019-03-12', 'aurevoir', 'Content/img/alim1.jpg', 1, 9, 'FSRTH', 'Défectueux', 2, 'GTHYH', 'Alimentation'),
('T63-L9', '2019-04-09', 'bye', 'Content/img/oscilloscope1.jpg', 1, 11, 'EHTH', 'Opérationnel', 2, 'GTHYH', 'Oscilloscope');

-- --------------------------------------------------------

--
-- Table structure for table `etat`
--

CREATE TABLE `etat` (
  `etat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `etat`
--

INSERT INTO `etat` (`etat`) VALUES
('Défectueux'),
('Introuvable'),
('Opérationnel');

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_fournisseur` bigint(20) UNSIGNED NOT NULL,
  `nom_fournisseur` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_derniere_modif` date DEFAULT NULL,
  `commentaires` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fournisseur`
--

INSERT INTO `fournisseur` (`id_fournisseur`, `nom_fournisseur`, `email`, `date_derniere_modif`, `commentaires`) VALUES
(1, 'Electro Depot', 'electro.depot@gmail.com', '2025-02-10', ''),
(2, 'Leroy Merlin', 'leroy.merlin@gmail.com', '2025-02-09', '');

-- --------------------------------------------------------

--
-- Table structure for table `fournit`
--

CREATE TABLE `fournit` (
  `type_equipement` varchar(50) NOT NULL,
  `id_fournisseur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fournit`
--

INSERT INTO `fournit` (`type_equipement`, `id_fournisseur`) VALUES
('GBF', 2),
('Multimètre', 1),
('Multimètre', 2),
('Oscilloscope', 1);

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

CREATE TABLE `salle` (
  `id_salle` bigint(20) UNSIGNED NOT NULL,
  `nom_salle` char(50) NOT NULL,
  `date_reamenagement` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salle`
--

INSERT INTO `salle` (`id_salle`, `nom_salle`, `date_reamenagement`) VALUES
(1, 'O200', '2024-10-20'),
(2, 'Q202', '2023-06-10'),
(3, 'Q200', '2020-09-05'),
(4, 'Q206', '2018-12-16'),
(5, 'T208', '2021-07-31'),
(6, 'Q209', '2001-01-01'),
(7, 'Q200B', '2019-08-25'),
(8, 'P200', '2024-02-14'),
(9, 'Q201', '2017-03-23'),
(10, 'Q100', '2015-04-06'),
(11, 'R101', '2000-01-23'),
(12, 'S100', '2025-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `typeanomalie`
--

CREATE TABLE `typeanomalie` (
  `type_anomalie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `typeanomalie`
--

INSERT INTO `typeanomalie` (`type_anomalie`) VALUES
('Disparition'),
('Panne');

-- --------------------------------------------------------

--
-- Table structure for table `typeequipement`
--

CREATE TABLE `typeequipement` (
  `type_equipement` varchar(50) NOT NULL,
  `description_equipement` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `typeequipement`
--

INSERT INTO `typeequipement` (`type_equipement`, `description_equipement`) VALUES
('Alimentation', ''),
('GBF', ''),
('Multimètre', ''),
('Oscilloscope', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anomalie`
--
ALTER TABLE `anomalie`
  ADD PRIMARY KEY (`id_anomalie`);

--
-- Indexes for table `banc`
--
ALTER TABLE `banc`
  ADD PRIMARY KEY (`id_banc`,`id_salle`);

--
-- Indexes for table `deplacement`
--
ALTER TABLE `deplacement`
  ADD PRIMARY KEY (`id_deplacement`);

--
-- Indexes for table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`id_equipement`);

--
-- Indexes for table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`etat`);

--
-- Indexes for table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_fournisseur`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `fournit`
--
ALTER TABLE `fournit`
  ADD PRIMARY KEY (`type_equipement`,`id_fournisseur`);

--
-- Indexes for table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id_salle`),
  ADD UNIQUE KEY `nom_salle` (`nom_salle`);

--
-- Indexes for table `typeanomalie`
--
ALTER TABLE `typeanomalie`
  ADD PRIMARY KEY (`type_anomalie`);

--
-- Indexes for table `typeequipement`
--
ALTER TABLE `typeequipement`
  ADD PRIMARY KEY (`type_equipement`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anomalie`
--
ALTER TABLE `anomalie`
  MODIFY `id_anomalie` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deplacement`
--
ALTER TABLE `deplacement`
  MODIFY `id_deplacement` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_fournisseur` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salle`
--
ALTER TABLE `salle`
  MODIFY `id_salle` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
