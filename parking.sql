-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 10 Octobre 2016 à 10:36
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `parking`
--

-- --------------------------------------------------------

--
-- Structure de la table `place`
--

CREATE TABLE IF NOT EXISTS `place` (
  `id_place` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_reservation` int(11) NOT NULL,
  PRIMARY KEY (`id_place`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `place`
--

INSERT INTO `place` (`id_place`, `id_utilisateur`, `id_reservation`) VALUES
(1, 0, 0),
(2, 2, 8),
(3, 0, 0),
(4, 0, 0),
(5, 0, 0),
(6, 0, 0),
(7, 0, 0),
(8, 0, 0),
(9, 0, 0),
(10, 0, 0),
(11, 0, 0),
(12, 0, 0),
(13, 0, 0),
(14, 0, 0),
(15, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reservation` int(11) NOT NULL AUTO_INCREMENT,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `id_place` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_reservation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `date_debut`, `date_fin`, `id_place`, `id_utilisateur`) VALUES
(1, '2016-10-09 21:58:41', '2016-10-09 21:59:41', 14, 10),
(2, '2016-10-09 21:59:08', '2016-10-09 22:00:08', 7, 6),
(3, '2016-10-09 22:41:08', '2016-10-09 22:42:08', 6, 5),
(4, '2016-10-09 22:41:17', '2016-10-09 22:42:17', 3, 6),
(5, '2016-10-09 22:41:27', '2016-10-09 22:42:27', 8, 4),
(6, '2016-10-09 22:41:34', '2016-10-09 22:42:34', 13, 3),
(7, '2016-10-09 22:41:41', '2016-10-09 22:42:41', 12, 8),
(8, '2016-10-09 22:41:49', '2016-10-09 22:42:49', 2, 9),
(9, '2016-10-09 22:41:56', '2016-10-09 22:42:56', 1, 10),
(10, '2016-10-09 22:48:13', '2016-10-09 23:48:13', 9, 5),
(11, '2016-10-09 22:48:19', '2016-10-09 23:48:19', 4, 6),
(12, '2016-10-09 22:48:27', '2016-10-09 23:48:27', 2, 4),
(13, '2016-10-09 22:48:34', '2016-10-09 23:48:34', 6, 7),
(14, '2016-10-09 22:48:42', '2016-10-09 23:48:42', 3, 9),
(15, '2016-10-09 22:48:49', '2016-10-09 23:48:49', 1, 10),
(16, '2016-10-09 22:51:30', '2016-10-11 22:51:30', 8, 8),
(17, '2016-10-09 22:51:37', '2016-10-11 22:51:37', 5, 3),
(18, '2016-10-09 23:20:41', '2016-10-11 23:20:41', 7, 5),
(19, '2016-10-09 23:22:09', '2016-10-11 23:22:09', 9, 5),
(20, '2016-10-09 23:22:18', '2016-10-11 23:22:18', 7, 5),
(21, '2016-10-09 23:22:26', '2016-10-11 23:22:26', 9, 5),
(22, '2016-10-09 23:23:40', '2016-10-11 23:23:40', 9, 5),
(23, '2016-10-09 23:24:14', '2016-10-11 23:24:14', 4, 6),
(24, '2016-10-09 23:45:22', '2016-10-11 23:45:22', 3, 8),
(25, '2016-10-09 23:45:30', '2016-10-11 23:45:30', 4, 3),
(26, '2016-10-09 23:45:37', '2016-10-11 23:45:37', 5, 6),
(27, '2016-10-10 10:07:07', '2016-10-12 10:07:07', 4, 3),
(28, '2016-10-10 10:07:54', '2016-10-12 10:07:54', 1, 3),
(29, '2016-10-10 10:09:46', '2016-10-12 10:09:46', 2, 2),
(30, '2016-10-10 10:09:52', '2016-10-12 10:09:52', 2, 2),
(31, '2016-10-10 10:23:17', '2016-10-12 10:23:17', 11, 5),
(32, '2016-10-10 10:31:44', '2016-10-12 10:31:44', 12, 5),
(33, '2016-10-10 10:31:59', '2016-10-12 10:31:59', 11, 5),
(34, '2016-10-10 10:34:12', '2016-10-12 10:34:12', 9, 5),
(35, '2016-10-10 10:36:25', '2016-10-12 10:36:25', 13, 5);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_utilisateur` varchar(20) NOT NULL,
  `prenom_utilisateur` varchar(20) NOT NULL,
  `mdp_utilisateur` varchar(50) NOT NULL,
  `mail_utilisateur` varchar(50) NOT NULL,
  `secret_utilisateur` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `confirme` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `mdp_utilisateur`, `mail_utilisateur`, `secret_utilisateur`, `admin`, `confirme`) VALUES
(1, 'Bouillennec', 'Valentin', '71c87baa2085d94f2411a2b78b84f3fc91b8ba66', 'val.bouillennec@gmail.com', 'secret', 1, 1),
(2, 'nom1', 'prenom1', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 'utilisateur', 'secret', 0, 1),
(3, 'john', 'doe', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 'john.doe@mail.com', 'secret', 0, 1),
(4, 'Obama', 'Barack', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 'barack.obama@president.us', 'secret', 0, 1),
(5, 'wayne', 'bruce', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 'batmail@mail.com', 'secret', 0, 1),
(6, 'Stark', 'Tony', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 'tony.stark@gmail.com', 'secret', 0, 1),
(7, 'Cage', 'Luke', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 'bulletproof@mail.com', 'secret', 0, 1),
(8, 'Bauer', 'Jack', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 'jack@mail.com', 'secret', 0, 1),
(9, 'Jobs', 'Steve', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 'apple@mail.com', 'secret', 0, 1),
(10, 'Gates', 'Bill', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 'microsoft@mail.com', 'secret', 0, 1),
(11, 'Nguy', 'Fabrice', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 'fabrice.nguy@gmail.com', 'mot', 1, 1),
(12, 'test', 'test', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 'test', 'secret', 0, 1),
(13, 'test2', 'test2', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 'test2', 'secret', 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
