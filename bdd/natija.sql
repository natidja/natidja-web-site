-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2021 at 12:22 AM
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
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id_p` int(10) NOT NULL,
  `pseudo` varchar(30) DEFAULT NULL,
  `mdp` varchar(20) DEFAULT NULL,
  `nom_p` varchar(20) NOT NULL,
  `prenom_p` varchar(20) NOT NULL,
  `date_naissance` date NOT NULL,
  `id_test` int(10) NOT NULL,
  `nbr_test` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id_p`, `pseudo`, `mdp`, `nom_p`, `prenom_p`, `date_naissance`, `id_test`, `nbr_test`) VALUES
(474, 'bekhtaoui_radia', 'qYNVt4Oy', 'bekhtaoui', 'radia', '2021-08-18', 327, 2),
(475, 'ziani_mohammed', 'wBuNm9Rt', 'ziani', 'mohammed', '2021-08-13', 328, 1),
(485, 'ziani_issam', 'lt4O8NVs', 'ziani', 'issam', '2021-08-20', 347, 1),
(487, 'malti_djellel', 'nKq5vO1s', 'malti', 'djellel', '0001-01-01', 349, 1),
(488, 'bekhtaoui_radia', 'Fo55ctAa', 'bekhtaoui', 'radia', '2021-08-18', 350, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `fk_resultat` (`id_test`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id_p` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=489;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `fk_date_naissance` FOREIGN KEY (`id_test`) REFERENCES `test` (`id_test`),
  ADD CONSTRAINT `fk_id_test` FOREIGN KEY (`id_test`) REFERENCES `test` (`id_test`),
  ADD CONSTRAINT `fk_nom_p` FOREIGN KEY (`id_test`) REFERENCES `test` (`id_test`),
  ADD CONSTRAINT `fk_prenom_p` FOREIGN KEY (`id_test`) REFERENCES `test` (`id_test`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
