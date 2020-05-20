-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 20 mai 2020 à 07:57
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sitecv`
--

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

DROP TABLE IF EXISTS `competences`;
CREATE TABLE IF NOT EXISTS `competences` (
  `id_comp` int(3) NOT NULL AUTO_INCREMENT,
  `niveau` int(2) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `nom_comp` varchar(50) NOT NULL,
  PRIMARY KEY (`id_comp`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`id_comp`, `niveau`, `categorie`, `nom_comp`) VALUES
(2, 8, 'web', 'test'),
(3, 7, 'logiciel', 'test2'),
(4, 5, 'reseaux', 'test3');

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

DROP TABLE IF EXISTS `connexion`;
CREATE TABLE IF NOT EXISTS `connexion` (
  `id_connexion` int(1) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  PRIMARY KEY (`id_connexion`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`id_connexion`, `pseudo`, `mdp`) VALUES
(1, 'admin', '@dm1n');

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

DROP TABLE IF EXISTS `experiences`;
CREATE TABLE IF NOT EXISTS `experiences` (
  `id_expe` int(3) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `information` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  PRIMARY KEY (`id_expe`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `experiences`
--

INSERT INTO `experiences` (`id_expe`, `titre`, `description`, `information`, `date_debut`, `date_fin`) VALUES
(22, 'CMP ', 'Job d&#039;&eacute;t&eacute;', 'De la manutention&nbsp;(constructions de cartons, filmer des palettes, utilisation d&rsquo;un transpalette).', '2018-08-08', '2018-08-13'),
(23, 'Soci&eacute;t&eacute; Neilwan - McDonald&#039;s', 'CDI', 'Services en salles, encaisser, pr&eacute;paration de boissons et de glaces, pr&eacute;paration de commande, prise de commandes au drive.', '2018-10-10', '2018-11-25');

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

DROP TABLE IF EXISTS `formations`;
CREATE TABLE IF NOT EXISTS `formations` (
  `id_form` int(3) NOT NULL AUTO_INCREMENT,
  `nom_ecole` varchar(40) NOT NULL,
  `date_obt` date NOT NULL,
  `diplome` varchar(50) NOT NULL,
  PRIMARY KEY (`id_form`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `formations`
--

INSERT INTO `formations` (`id_form`, `nom_ecole`, `date_obt`, `diplome`) VALUES
(2, 'Paris Ynov Campus', '2019-06-30', 'ing&eacute;sup'),
(3, 'Lyc&eacute;e Charles Baudelaires', '2017-06-25', 'Bac Scientifique');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
