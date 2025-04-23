-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2024 at 01:24 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdd_97car`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `Id_client` int(11) NOT NULL,
  `mel` varchar(255) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `telephone` char(10) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `code_postal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`Id_client`, `mel`, `nom`, `prenom`, `telephone`, `ville`, `adresse`, `code_postal`) VALUES
(5, 'IsabelleLabossiere@teleworm.us', 'Isabelle', 'Labossière', '0105928125', ' LES MUREAUX ', '36, rue du Paillle en queue', 78130),
(6, 'FleuretteBeauchemin@teleworm.us', 'Fleurette', 'Beauchemin', '0504446471', 'TOULOUSE', '93, rue Pierre De Coubertin', 31100),
(7, 'WarraneBonnet@teleworm.us', 'Bonnet', 'Warrane', '0227287908', 'ORVAULT', '44, boulevard Amiral Courbet', 44700),
(8, 'ArmandLemaitre@teleworm.us', 'Lemaître', 'Armand', '0164662619', 'RIS-ORANGIS', '4, rue Gustave Eiffel', 91130);

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

CREATE TABLE `facture` (
  `Id_facture` int(11) NOT NULL,
  `date_facture` varchar(22) DEFAULT NULL,
  `Id_client` int(11) NOT NULL,
  `Id_voiture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `facture`
--

INSERT INTO `facture` (`Id_facture`, `date_facture`, `Id_client`, `Id_voiture`) VALUES
(25, '2024-04-30', 5, 8),
(26, '2023-04-29', 5, 7),
(27, '2019-04-29', 6, 9),
(28, '2022-05-11', 6, 10),
(29, '2024-04-29', 7, 11),
(30, '2024-02-21', 8, 12);

-- --------------------------------------------------------

--
-- Table structure for table `facture_reparation`
--

CREATE TABLE `facture_reparation` (
  `Id_facture` int(11) NOT NULL,
  `Id_reparation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `facture_reparation`
--

INSERT INTO `facture_reparation` (`Id_facture`, `Id_reparation`) VALUES
(25, 85),
(25, 87),
(25, 89),
(25, 91),
(25, 92),
(26, 84),
(26, 89),
(26, 90),
(26, 91),
(26, 92),
(27, 85),
(27, 86),
(27, 87),
(27, 89),
(27, 91),
(28, 87),
(28, 88),
(28, 89),
(28, 90),
(28, 92),
(29, 84),
(29, 86),
(29, 87),
(29, 89),
(29, 92),
(30, 84),
(30, 85),
(30, 88),
(30, 90),
(30, 91);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Id_login` int(11) NOT NULL,
  `mel` varchar(150) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Id_login`, `mel`, `token`, `nom`, `prenom`, `mdp`) VALUES
(1, 'luc.moutanin@gmail.com', '130e04ec32a79e2ebd1b1f68e6a2b169e496b7849fcb6d892126836a60077f80', 'moutanin', 'luc', 'azerty123');

-- --------------------------------------------------------

--
-- Table structure for table `reparation`
--

CREATE TABLE `reparation` (
  `Id_reparation` int(11) NOT NULL,
  `descriptions` varchar(255) DEFAULT NULL,
  `cout` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reparation`
--

INSERT INTO `reparation` (`Id_reparation`, `descriptions`, `cout`, `quantite`) VALUES
(84, 'Kit d&#039;embrayage', 689, 1),
(85, 'Courroie de distribution', 536, 1),
(86, 'Amortisseur', 319, 1),
(87, 'Révision générale', 222, 1),
(88, 'Disque et plaquettes', 221, 4),
(89, 'Batterie', 135, 1),
(90, 'Décalaminage', 93, 1),
(91, 'Parallélisme', 57, 2),
(92, 'Diagnostic électronique', 48, 1);

-- --------------------------------------------------------

--
-- Table structure for table `voiture`
--

CREATE TABLE `voiture` (
  `Id_voiture` int(11) NOT NULL,
  `annee` int(11) DEFAULT NULL,
  `marque` varchar(100) DEFAULT NULL,
  `kilometrage` int(11) DEFAULT NULL,
  `modele` varchar(50) DEFAULT NULL,
  `immatriculation` varchar(12) DEFAULT NULL,
  `Id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `voiture`
--

INSERT INTO `voiture` (`Id_voiture`, `annee`, `marque`, `kilometrage`, `modele`, `immatriculation`, `Id_client`) VALUES
(7, 2003, 'Fiat', 5000, 'Punto', 'AA-23A-XB', 5),
(8, 2005, 'Audi', 100000, 'A5', 'AM-201-XA', 5),
(9, 2000, 'Mercedes', 200000, 'Classe C', 'HA-21A-WW', 6),
(10, 2013, 'Bmw', 23403, 'Serie 4', 'AA-201-AA', 6),
(11, 2015, 'Peugeot', 3323, '208', 'BR-201-AA', 7),
(12, 2022, 'Dacia', 10000, 'Logan', 'KL-MM2-21', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`Id_client`);

--
-- Indexes for table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`Id_facture`),
  ADD KEY `Id_client` (`Id_client`),
  ADD KEY `Id_voiture` (`Id_voiture`);

--
-- Indexes for table `facture_reparation`
--
ALTER TABLE `facture_reparation`
  ADD PRIMARY KEY (`Id_facture`,`Id_reparation`) USING BTREE,
  ADD KEY `Id_facture` (`Id_facture`,`Id_reparation`),
  ADD KEY `Id_reparation` (`Id_reparation`,`Id_facture`) USING BTREE;

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Id_login`);

--
-- Indexes for table `reparation`
--
ALTER TABLE `reparation`
  ADD PRIMARY KEY (`Id_reparation`);

--
-- Indexes for table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`Id_voiture`),
  ADD KEY `Id_client` (`Id_client`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `Id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `facture`
--
ALTER TABLE `facture`
  MODIFY `Id_facture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `Id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reparation`
--
ALTER TABLE `reparation`
  MODIFY `Id_reparation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `Id_voiture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`Id_client`) REFERENCES `client` (`Id_client`),
  ADD CONSTRAINT `facture_ibfk_2` FOREIGN KEY (`Id_voiture`) REFERENCES `voiture` (`Id_voiture`);

--
-- Constraints for table `facture_reparation`
--
ALTER TABLE `facture_reparation`
  ADD CONSTRAINT `facture_reparation_ibfk_1` FOREIGN KEY (`Id_facture`) REFERENCES `facture` (`Id_facture`),
  ADD CONSTRAINT `facture_reparation_ibfk_2` FOREIGN KEY (`Id_reparation`) REFERENCES `reparation` (`Id_reparation`);

--
-- Constraints for table `voiture`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `voiture_ibfk_1` FOREIGN KEY (`Id_client`) REFERENCES `client` (`Id_client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
