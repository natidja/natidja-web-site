-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 01 Août 2021 à 20:18
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
  `adresse` varchar(20) NOT NULL,
  `numero` int(10) NOT NULL,
  `adresse_email` varchar(30) NOT NULL,
  `pwd` int(10) NOT NULL,
  PRIMARY KEY (`id_labo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `labo`
--

INSERT INTO `labo` (`id_labo`, `nom_labo`, `wilaya`, `adresse`, `numero`, `adresse_email`, `pwd`) VALUES
(1, 'natija', 'Tlemcen', 'jdkfhkdll', 555555555, 'issam.moh04@gmail.co', 0),
(2, 'hamouche', 'Tlemcen', 'imama', 58756768, 'hamouche@gmail.com', 0);

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `id_p` int(10) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `nom_p` varchar(10) NOT NULL,
  `prenom_p` varchar(15) NOT NULL,
  `date_naissance` date NOT NULL,
  `resultat` varchar(10) NOT NULL,
  `id_test` int(10) NOT NULL,
  `sexe` varchar(6) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_p`),
  KEY `fk_resultat` (`id_test`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=405 ;

--
-- Contenu de la table `patient`
--

INSERT INTO `patient` (`id_p`, `pseudo`, `mdp`, `nom_p`, `prenom_p`, `date_naissance`, `resultat`, `id_test`, `sexe`, `avatar`) VALUES
(402, 'bekhtaoui_radia', 'qVBRKHnR  ', 'bekhtaoui', 'radia', '2001-12-01', 'negatif', 231, 'femme', 'test1.pdf'),
(403, 'issam_peer', 'aMNray1E  ', 'issam', 'peer', '2021-08-06', 'negatif', 232, 'homme', 'Colibris Vert.pdf'),
(404, 'ziani_issam', 'ispFwI6T  ', 'ziani', 'issam', '2001-04-04', 'positif', 233, 'homme', 'test1.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id_test` int(10) NOT NULL AUTO_INCREMENT,
  `nom_p` varchar(10) NOT NULL,
  `prenom_p` varchar(15) NOT NULL,
  `date_naissance` date NOT NULL,
  `type` varchar(15) NOT NULL,
  `resultat` varchar(10) DEFAULT NULL,
  `sexe` varchar(6) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `date_test` datetime DEFAULT NULL,
  `id_labo` int(10) NOT NULL,
  PRIMARY KEY (`id_test`),
  KEY `fk_id_labo` (`id_labo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=234 ;

--
-- Contenu de la table `test`
--

INSERT INTO `test` (`id_test`, `nom_p`, `prenom_p`, `date_naissance`, `type`, `resultat`, `sexe`, `avatar`, `date_test`, `id_labo`) VALUES
(231, 'bekhtaoui', 'radia', '2001-12-01', 'antigÃ©nique', 'negatif', 'femme', 'test1.pdf', '2021-08-01 06:10:52', 2),
(232, 'issam', 'peer', '2021-08-06', 'antigÃ©nique', 'negatif', 'homme', 'Colibris Vert.pdf', '2021-08-01 06:21:29', 2),
(233, 'ziani', 'issam', '2001-04-04', 'antigÃ©nique', 'positif', 'homme', 'test1.pdf', '2021-08-01 07:06:27', 2);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `fk_date_naissance` FOREIGN KEY (`id_test`) REFERENCES `test` (`id_test`),
  ADD CONSTRAINT `fk_nom_p` FOREIGN KEY (`id_test`) REFERENCES `test` (`id_test`),
  ADD CONSTRAINT `fk_prenom_p` FOREIGN KEY (`id_test`) REFERENCES `test` (`id_test`),
  ADD CONSTRAINT `fk_resultat` FOREIGN KEY (`id_test`) REFERENCES `test` (`id_test`),
  ADD CONSTRAINT `fk_sexe` FOREIGN KEY (`id_test`) REFERENCES `test` (`id_test`);

--
-- Contraintes pour la table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `fk_id_labo` FOREIGN KEY (`id_labo`) REFERENCES `labo` (`id_labo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
