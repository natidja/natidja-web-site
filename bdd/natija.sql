-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 06 Août 2021 à 22:53
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `natija`
--

-- --------------------------------------------------------

--
-- Structure de la table `labo`
--

CREATE TABLE IF NOT EXISTS `labo` (
  `id_labo` int(10) NOT NULL AUTO_INCREMENT,
  `nom_labo` varchar(30) NOT NULL,
  `wilaya` varchar(20) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `numero` int(10) NOT NULL,
  `adresse_email` varchar(30) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  PRIMARY KEY (`id_labo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `labo`
--

INSERT INTO `labo` (`id_labo`, `nom_labo`, `wilaya`, `adresse`, `numero`, `adresse_email`, `pwd`) VALUES
(3, 'natidja', 'Tlemcen', 'Imama', 550505050, 'natidja@gmail.com', 'acidome'),
(4, 'Likan', 'Oran', 'IDK', 560606060, 'likan@gmail.com', 'tweel');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `id_p` int(10) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(30) DEFAULT NULL,
  `mdp` varchar(20) DEFAULT NULL,
  `nom_p` varchar(20) NOT NULL,
  `prenom_p` varchar(20) NOT NULL,
  `date_naissance` date NOT NULL,
  `id_test` int(10) NOT NULL,
  `nbr_test` int(1) NOT NULL,
  PRIMARY KEY (`id_p`),
  KEY `fk_resultat` (`id_test`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=486 ;

--
-- Contenu de la table `patient`
--

INSERT INTO `patient` (`id_p`, `pseudo`, `mdp`, `nom_p`, `prenom_p`, `date_naissance`, `id_test`, `nbr_test`) VALUES
(474, 'bekhtaoui_radia', 'qYNVt4Oy', 'bekhtaoui', 'radia', '2021-08-18', 327, 10),
(475, 'ziani_mohammed', 'wBuNm9Rt', 'ziani', 'mohammed', '2021-08-13', 328, 1),
(485, 'ziani_issam', 'lt4O8NVs', 'ziani', 'issam', '2021-08-20', 347, 1);

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id_test` int(10) NOT NULL AUTO_INCREMENT,
  `nom_p` varchar(20) NOT NULL,
  `prenom_p` varchar(20) NOT NULL,
  `date_naissance` date NOT NULL,
  `resultat` varchar(10) DEFAULT NULL,
  `sexe` varchar(6) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `date_test` datetime DEFAULT NULL,
  `id_labo` int(10) NOT NULL,
  PRIMARY KEY (`id_test`),
  KEY `fk_id_labo` (`id_labo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=348 ;

--
-- Contenu de la table `test`
--

INSERT INTO `test` (`id_test`, `nom_p`, `prenom_p`, `date_naissance`, `resultat`, `sexe`, `avatar`, `date_test`, `id_labo`) VALUES
(327, 'bekhtaoui', 'radia', '2021-08-18', 'prÃ©s', 'femme', 'test1.pdf', '2021-08-06 06:32:32', 3),
(328, 'ziani', 'mohammed', '2021-08-13', 'prÃ©s', 'homme', 'test2.pdf', '2021-08-06 06:36:26', 3),
(343, 'bekhtaoui', 'radia', '2021-08-18', 'prÃ©s', 'femme', '', '2021-08-06 08:52:02', 3),
(347, 'ziani', 'issam', '2021-08-20', 'en attente', 'homme', '', '2021-08-06 08:55:10', 3);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `fk_date_naissance` FOREIGN KEY (`id_test`) REFERENCES `test` (`id_test`),
  ADD CONSTRAINT `fk_id_test` FOREIGN KEY (`id_test`) REFERENCES `test` (`id_test`),
  ADD CONSTRAINT `fk_nom_p` FOREIGN KEY (`id_test`) REFERENCES `test` (`id_test`),
  ADD CONSTRAINT `fk_prenom_p` FOREIGN KEY (`id_test`) REFERENCES `test` (`id_test`);

--
-- Contraintes pour la table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `fk_id_labo` FOREIGN KEY (`id_labo`) REFERENCES `labo` (`id_labo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
