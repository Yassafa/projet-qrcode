-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2025 at 01:55 PM
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
-- Database: `qrcode`
--

-- --------------------------------------------------------

--
-- Table structure for table `anomalie`
--

CREATE TABLE `anomalie` (
  `id_anomalie` bigint(20) UNSIGNED NOT NULL,
  `date_signalement` datetime NOT NULL,
  `description_anomalie` text DEFAULT NULL,
  `personne_signalant` varchar(50) DEFAULT NULL,
  `lien_photo` varchar(50) DEFAULT NULL,
  `type_anomalie` varchar(50) NOT NULL,
  `id_equipement` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('AJLOM', 2, NULL, NULL, NULL),
('GTHYH', 2, NULL, NULL, NULL),
('GYBYB', 2, NULL, NULL, NULL),
('MPGTG', 2, NULL, NULL, NULL),
('TGMHY', 2, NULL, NULL, NULL),
('VTTHH', 2, NULL, NULL, NULL),
('YHYHU', 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deplacement`
--

CREATE TABLE `deplacement` (
  `id_deplacement` bigint(20) UNSIGNED NOT NULL,
  `date_deplacement` datetime NOT NULL,
  `description_deplacement` text DEFAULT NULL,
  `personne_deplacant` varchar(50) DEFAULT NULL,
  `id_salle_origine` int(11) NOT NULL,
  `id_banc_origine` char(50) NOT NULL,
  `id_salle_destination` int(11) NOT NULL,
  `id_banc_destination` char(50) NOT NULL,
  `id_equipement` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('2D0GD', NULL, NULL, 'Content/img/GBF1.jpg', 3, 2, 'GYBYB', 'Opérationnel', 2, 'GYBYB', 'GBF'),
('5D22V', NULL, NULL, 'Content/img/Multimetre1.jpg', 1, 2, 'TGMHY', 'Opérationnel', 2, 'TGMHY', 'Multimètre'),
('5DF35', NULL, NULL, 'Content/img/GBF1.jpg', 3, 2, 'MPGTG', 'Opérationnel', 2, 'MPGTG', 'GBF'),
('8FDVF', NULL, NULL, 'Content/img/Alimentation1.jpg', 2, 2, 'GTHYH', 'Opérationnel', 2, 'GTHYH', 'Alimentation'),
('95VDS', NULL, NULL, 'Content/img/Alimentation1.jpg', 2, 2, 'TGMHY', 'Opérationnel', 2, 'TGMHY', 'Alimentation'),
('A46JF', NULL, NULL, 'Content/img/GBF1.jpg', 3, 2, 'AJLOM', 'Opérationnel', 2, 'AJLOM', 'GBF'),
('BQL20', NULL, NULL, 'Content/img/Oscilloscope1.jpg', 3, 2, 'GTHYH', 'Opérationnel', 2, 'GTHYH', 'Oscilloscope'),
('D0F5G', NULL, NULL, 'Content/img/Alimentation1.jpg', 2, 2, 'MPGTG', 'Opérationnel', 2, 'MPGTG', 'Alimentation'),
('DF32G', NULL, NULL, 'Content/img/Multimetre1.jpg', 1, 2, 'MPGTG', 'Opérationnel', 2, 'MPGTG', 'Multimètre'),
('DF95F', NULL, NULL, 'Content/img/Multimetre1.jpg', 1, 2, 'GTHYH', 'Opérationnel', 2, 'GTHYH', 'Multimètre'),
('DFV20', NULL, NULL, 'Content/img/Oscilloscope1.jpg', 3, 2, 'MPGTG', 'Opérationnel', 2, 'MPGTG', 'Oscilloscope'),
('DV51G', NULL, NULL, 'Content/img/Multimetre1.jpg', 1, 2, 'GYBYB', 'Opérationnel', 2, 'GYBYB', 'Multimètre'),
('FDF51', NULL, NULL, 'Content/img/GBF1.jpg', 3, 2, 'GTHYH', 'Opérationnel', 2, 'GTHYH', 'GBF'),
('G5HJ0', NULL, NULL, 'Content/img/Multimetre1.jpg', 1, 2, 'VTTHH', 'Opérationnel', 2, 'VTTHH', 'Multimètre'),
('G5X9X', NULL, NULL, 'Content/img/Oscilloscope1.jpg', 3, 2, 'VTTHH', 'Opérationnel', 2, 'VTTHH', 'Oscilloscope'),
('GV10D', NULL, NULL, 'Content/img/GBF3.jpg', 1, 2, 'TGMHY', 'Opérationnel', 2, 'TGMHY', 'GBF'),
('K986A', NULL, NULL, 'Content/img/Multimetre1.jpg', 1, 2, 'AJLOM', 'Opérationnel', 2, 'AJLOM', 'Multimètre'),
('M47D5', NULL, NULL, 'Content/img/Oscilloscope1.jpg', 3, 2, 'GYBYB', 'Opérationnel', 2, 'GYBYB', 'Oscilloscope'),
('OKO55', NULL, NULL, 'Content/img/Alimentation1.jpg', 2, 2, 'VTTHH', 'Opérationnel', 2, 'VTTHH', 'Alimentation'),
('P30MN', NULL, NULL, 'Content/img/Alimentation1.jpg', 2, 2, 'AJLOM', 'Opérationnel', 2, 'AJLOM', 'Alimentation'),
('SC11F', NULL, NULL, 'Content/img/Alimentation1.jpg', 2, 2, 'YHYHU', 'Opérationnel', 2, 'YHYHU', 'Alimentation'),
('SFV7F', NULL, NULL, 'Content/img/Oscilloscope1.jpg', 3, 2, 'TGMHY', 'Opérationnel', 2, 'TGMHY', 'Oscilloscope'),
('T63L9', NULL, NULL, 'Content/img/Oscilloscope1.jpg', 3, 2, 'AJLOM', 'Opérationnel', 2, 'AJLOM', 'Oscilloscope'),
('V66WW', NULL, NULL, 'Content/img/GBF2.jpg', 2, 2, 'VTTHH', 'Opérationnel', 2, 'VTTHH', 'GBF'),
('VD4VF', NULL, NULL, 'Content/img/Alimentation1.jpg', 2, 2, 'GYBYB', 'Opérationnel', 2, 'GYBYB', 'Alimentation'),
('VF47F', NULL, NULL, 'Content/img/GBF2.jpg', 2, 2, 'YHYHU', 'Opérationnel', 2, 'YHYHU', 'GBF'),
('WCCSD', NULL, NULL, 'Content/img/Oscilloscope1.jpg', 3, 2, 'YHYHU', 'Opérationnel', 2, 'YHYHU', 'Oscilloscope'),
('XVF51', NULL, NULL, 'Content/img/Multimetre1.jpg', 1, 2, 'YHYHU', 'Opérationnel', 2, 'YHYHU', 'Multimètre');

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
  `email` varchar(50) DEFAULT NULL,
  `date_derniere_modif` date DEFAULT NULL,
  `commentaires` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fournisseur`
--

INSERT INTO `fournisseur` (`id_fournisseur`, `nom_fournisseur`, `email`, `date_derniere_modif`, `commentaires`) VALUES
(1, 'Agilent', NULL, NULL, NULL),
(2, 'Metrix', NULL, NULL, NULL),
(3, 'Keysight', NULL, NULL, NULL),
(4, 'Fluke', NULL, NULL, NULL);

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
('Alimentation', 2),
('GBF', 1),
('GBF', 2),
('GBF', 3),
('Multimètre', 1),
('Oscilloscope', 3);

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
(1, 'O200', NULL),
(2, 'Q202', NULL),
(3, 'Q200', NULL),
(4, 'Q206', NULL),
(5, 'T208', NULL),
(6, 'Q209', NULL),
(7, 'Q200B', NULL),
(8, 'P200', NULL),
(9, 'Q201', NULL),
(10, 'Q100', NULL),
(11, 'R101', NULL),
(12, 'S100', NULL);

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
('Apparition'),
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
('Alimentation', NULL),
('GBF', NULL),
('Multimetre', NULL),
('Oscilloscope', NULL);

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
  MODIFY `id_anomalie` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deplacement`
--
ALTER TABLE `deplacement`
  MODIFY `id_deplacement` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_fournisseur` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salle`
--
ALTER TABLE `salle`
  MODIFY `id_salle` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
