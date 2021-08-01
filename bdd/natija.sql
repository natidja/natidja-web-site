-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2021 at 10:42 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `natija`
--

-- --------------------------------------------------------

--
-- Table structure for table `labo`
--

CREATE TABLE `labo` (
  `id_labo` int(10) NOT NULL,
  `nom_labo` varchar(30) NOT NULL,
  `wilaya` varchar(20) NOT NULL,
  `adresse` varchar(20) NOT NULL,
  `numero` int(10) NOT NULL,
  `adresse_email` varchar(30) NOT NULL,
  `pwd` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labo`
--

INSERT INTO `labo` (`id_labo`, `nom_labo`, `wilaya`, `adresse`, `numero`, `adresse_email`, `pwd`) VALUES
(1, 'natija', 'Tlemcen', 'jdkfhkdll', 555555555, 'issam.moh04@gmail.com', 0),
(2, 'hamouche', 'Tlemcen', 'imama', 58756768, 'hamouche@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id_p` int(10) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `nom_p` varchar(10) NOT NULL,
  `prenom_p` varchar(15) NOT NULL,
  `date_naissance` date NOT NULL,
  `resultat` varchar(10) NOT NULL,
  `id_test` int(10) NOT NULL,
  `sexe` varchar(6) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id_p`, `pseudo`, `mdp`, `nom_p`, `prenom_p`, `date_naissance`, `resultat`, `id_test`, `sexe`, `avatar`) VALUES
(402, 'bekhtaoui_radia', 'qVBRKHnR  ', 'bekhtaoui', 'radia', '2001-12-01', 'negatif', 231, 'femme', 'test1.pdf'),
(403, 'issam_peer', 'aMNray1E  ', 'issam', 'peer', '2021-08-06', 'negatif', 232, 'homme', 'Colibris Vert.pdf'),
(404, 'ziani_issam', 'ispFwI6T  ', 'ziani', 'issam', '2001-04-04', 'positif', 233, 'homme', 'test1.pdf'),
(410, 'houssem_eddine', 'qBOIw8RG', 'houssem ', 'eddine', '2002-01-24', 'negatif', 237, 'homme', NULL),
(412, 'houssem_eddine', 'qBOIw8RG', 'houssem ', 'eddine', '2002-01-24', 'negatif', 237, 'homme', NULL),
(413, 'houssem_eddine', 'qBOIw8RG', 'houssem ', 'eddine', '2002-01-24', 'positif', 239, 'homme', NULL),
(415, 'houssem_eddine', 'qBOIw8RG', 'houssem ', 'eddine', '2002-01-24', 'negatif', 237, 'homme', NULL),
(416, 'houssem_eddine', 'qBOIw8RG', 'houssem ', 'eddine', '2002-01-24', 'positif', 239, 'homme', NULL),
(417, 'houssem_eddine', 'qBOIw8RG', 'houssem', 'eddine', '2002-01-24', 'en attente', 240, 'homme', NULL),
(418, 'baba _amina', '79OtC8fT', 'baba ', 'amina', '1996-06-04', 'en attente', 241, 'femme', NULL),
(419, 'baba_aness', 'wBtLYZ0n', 'baba', 'aness', '0001-01-01', 'negatif', 242, 'homme', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id_test` int(10) NOT NULL,
  `nom_p` varchar(10) NOT NULL,
  `prenom_p` varchar(15) NOT NULL,
  `date_naissance` date NOT NULL,
  `type` varchar(15) NOT NULL,
  `resultat` varchar(10) DEFAULT NULL,
  `sexe` varchar(6) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `date_test` datetime DEFAULT NULL,
  `id_labo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id_test`, `nom_p`, `prenom_p`, `date_naissance`, `type`, `resultat`, `sexe`, `avatar`, `date_test`, `id_labo`) VALUES
(231, 'bekhtaoui', 'radia', '2001-12-01', 'antigÃ©nique', 'negatif', 'femme', 'test1.pdf', '2021-08-01 06:10:52', 2),
(232, 'issam', 'peer', '2021-08-06', 'antigÃ©nique', 'negatif', 'homme', 'Colibris Vert.pdf', '2021-08-01 06:21:29', 2),
(233, 'ziani', 'issam', '2001-04-04', 'antigÃ©nique', 'positif', 'homme', 'test1.pdf', '2021-08-01 07:06:27', 2),
(237, 'houssem ', 'eddine', '2002-01-24', 'sérologique', 'negatif', 'homme', NULL, '2021-08-01 08:05:54', 1),
(239, 'houssem ', 'eddine', '2002-01-24', 'antigénique', 'positif', 'homme', NULL, '2021-08-01 09:17:25', 1),
(240, 'houssem', 'eddine', '2002-01-24', 'virologique', 'en attente', 'homme', NULL, '2021-08-01 09:17:38', 1),
(241, 'baba ', 'amina', '1996-06-04', 'sérologique', 'en attente', 'femme', NULL, '2021-08-01 00:00:00', 1),
(242, 'baba', 'aness', '0001-01-01', 'sérologique', 'negatif', 'homme', NULL, '2021-08-01 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `labo`
--
ALTER TABLE `labo`
  ADD PRIMARY KEY (`id_labo`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `fk_resultat` (`id_test`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id_test`),
  ADD KEY `fk_id_labo` (`id_labo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `labo`
--
ALTER TABLE `labo`
  MODIFY `id_labo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id_p` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=420;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id_test` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `fk_date_naissance` FOREIGN KEY (`id_test`) REFERENCES `test` (`id_test`),
  ADD CONSTRAINT `fk_nom_p` FOREIGN KEY (`id_test`) REFERENCES `test` (`id_test`),
  ADD CONSTRAINT `fk_prenom_p` FOREIGN KEY (`id_test`) REFERENCES `test` (`id_test`),
  ADD CONSTRAINT `fk_resultat` FOREIGN KEY (`id_test`) REFERENCES `test` (`id_test`),
  ADD CONSTRAINT `fk_sexe` FOREIGN KEY (`id_test`) REFERENCES `test` (`id_test`);

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `fk_id_labo` FOREIGN KEY (`id_labo`) REFERENCES `labo` (`id_labo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
