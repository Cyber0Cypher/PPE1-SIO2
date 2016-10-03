--
-- Base de données :  `parking`
--

-- --------------------------------------------------------

--
-- Structure de la table `place`
--
DROP DATABASE parking;
CREATE DATABASE parking;
USE parking;

CREATE TABLE IF NOT EXISTS `place` (
  `id_place` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_place`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reservation` int(11) NOT NULL AUTO_INCREMENT,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  PRIMARY KEY (`id_reservation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_utilisateur` varchar(20) NOT NULL,
  `prenom_utilisateur` varchar(20) NOT NULL,
  `mdp_utilisateur` varchar(20) NOT NULL,
  `mail_utilisateur` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `confirme` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `mdp_utilisateur`, `mail_utilisateur`, `admin`, `confirme`) VALUES
(1, 'Bouillennec', 'Valentin', '4657', 'val.bouillennec@gmail.com', 1, 1),
(2, 'nom1', 'prenom1', '0000', 'utilisateur', 0, 1),
(3, 'john', 'doe', '0000', 'john.doe@mail.com', 0, 0),
(4, 'Obama', 'Barack', '0000', 'barack.obama@president.us', 0, 0),
(5, 'wayne', 'bruce', '0000', 'batmail@mail.com', 0, 0),
(6, 'Stark', 'Tony', '0000', 'tony.stark@gmail.com', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
