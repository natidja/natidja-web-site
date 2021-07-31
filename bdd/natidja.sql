-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2021 at 09:16 PM
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
-- Database: `natidja`
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
  `adresse_email` varchar(20) NOT NULL,
  `pwd` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labo`
--

INSERT INTO `labo` (`id_labo`, `nom_labo`, `wilaya`, `adresse`, `numero`, `adresse_email`, `pwd`) VALUES
(1, 'natidja', 'tlemcen', 'hjhdh', 43434343, 'labo@gmail.com', 'acidom');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id_p` int(10) NOT NULL,
  `pseudo` varchar(20) DEFAULT NULL,
  `mdp` varchar(20) DEFAULT NULL,
  `nom_p` varchar(10) NOT NULL,
  `prenom_p` varchar(15) NOT NULL,
  `date_naissance` date NOT NULL,
  `resultat` varchar(10) NOT NULL,
  `id_test` int(10) NOT NULL,
  `sexe` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id_p`, `pseudo`, `mdp`, `nom_p`, `prenom_p`, `date_naissance`, `resultat`, `id_test`, `sexe`) VALUES
(463, 'sayeh_khalil', 'hajoDzoP', 'sayeh', 'khalil', '0001-01-01', 'en attente', 190, 'homme'),
(470, 'houssem_qqqq', 'yYbkkVxs', 'houssem', 'qqqq', '0001-01-01', 'en attente', 193, 'homme'),
(472, 'houssem_baba', 'Z2vo0yU3', 'houssem', 'baba', '2021-07-31', 'en attente', 195, 'homme'),
(479, 'sdf_testmen', '92o6cPOx', 'sdf', 'testmen', '0001-01-01', 'positif', 198, 'homme'),
(485, 'houssem_eddine', 'OvPCPoZw', 'houssem', 'eddine', '2002-01-24', 'positif', 201, 'homme'),
(486, 'houssem_eddine', 'OvPCPoZw', 'houssem', 'eddine', '2002-01-24', 'positif', 202, 'homme'),
(489, 'houssem_testmen', '5UMbwD1j', 'houssem', 'testmen', '2002-01-24', 'negatif', 204, 'homme'),
(498, 'houssem_eddine', 'OvPCPoZw', 'houssem', 'eddine', '2002-01-24', 'negatif', 205, 'homme'),
(506, 'sdf_khra', 'a42QLFNl', 'sdf', 'khra', '2002-01-24', 'negatif', 206, 'homme');

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
  `date_test` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id_test`, `nom_p`, `prenom_p`, `date_naissance`, `type`, `resultat`, `sexe`, `date_test`) VALUES
(190, 'sayeh', 'khalil', '0001-01-01', 'virologique', 'en attente', 'homme', NULL),
(193, 'houssem', 'qqqq', '0001-01-01', 'sérologique', 'en attente', 'homme', NULL),
(195, 'houssem', 'baba', '2021-07-31', 'virologique', 'en attente', 'homme', NULL),
(198, 'sdf', 'testmen', '0001-01-01', 'sérologique', 'positif', 'homme', NULL),
(201, 'houssem', 'eddine', '2002-01-24', 'antigénique', 'positif', 'homme', '0000-00-00 00:00:00'),
(202, 'houssem', 'eddine', '2002-01-24', 'antigénique', 'positif', 'homme', '0000-00-00 00:00:00'),
(204, 'houssem', 'testmen', '2002-01-24', 'virologique', 'negatif', 'homme', '0000-00-00 00:00:00'),
(205, 'houssem', 'eddine', '2002-01-24', 'sérologique', 'negatif', 'homme', '0000-00-00 00:00:00'),
(206, 'sdf', 'khra', '2002-01-24', 'sérologique', 'negatif', 'homme', '2021-07-31 07:54:13');

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
  ADD PRIMARY KEY (`id_test`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `labo`
--
ALTER TABLE `labo`
  MODIFY `id_labo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id_p` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=507;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id_test` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

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
  ADD CONSTRAINT `fk_resultat` FOREIGN KEY (`id_test`) REFERENCES `test` (`id_test`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
