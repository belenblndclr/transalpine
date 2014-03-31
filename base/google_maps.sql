-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 31 Mars 2014 à 21:55
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `google_maps`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `id_role` varchar(3) NOT NULL,
  `login` varchar(15) NOT NULL,
  `pass` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `id_role`, `login`, `pass`) VALUES
(1, '1', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(2, '2', 'compte1', 'f984a882448c0b850a7cea8a4cbc749ae2e6fe1f'),
(3, '3', 'compte2', '098cc54c5b88b57c81d3b3e239af23e380154257'),
(4, '4', 'compte3', 'bcd891170c9e585d40c4f927d0b94bd8f6cf5c48'),
(5, '5', 'compte4', '185625d322dfb45f51a8d2b775a6e41fc6c94526'),
(6, '1', 'compte5', '97ca5cda703f130298be3b7942394735b26263c6'),
(7, '2', 'compte6', '308dd1e4874d0fdf79bc172e8c3092f9881343f4'),
(8, '3', 'compte7', '596992c0e2764519b3dbdfdd3c4310c6d3863470'),
(9, '4', 'compte8', '0c63db99df1c2e77742285106bd4fe588cb18132'),
(10, '5', 'compte9', '4d16258494b225ec3e6ecd227e517c739a9d29ca');

-- --------------------------------------------------------

--
-- Structure de la table `admin_niv`
--

CREATE TABLE IF NOT EXISTS `admin_niv` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `id_role` int(3) NOT NULL,
  `role` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `admin_niv`
--

INSERT INTO `admin_niv` (`id`, `id_role`, `role`) VALUES
(1, 1, 'Administrateur'),
(2, 2, 'Editeur'),
(3, 3, 'Auteur'),
(4, 4, 'Contributeur'),
(5, 5, 'Abonné');

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE IF NOT EXISTS `auteur` (
  `IDAUTEUR` int(11) NOT NULL,
  `NOM` char(20) DEFAULT NULL,
  `STATUT` char(30) DEFAULT NULL,
  PRIMARY KEY (`IDAUTEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `auteur`
--

INSERT INTO `auteur` (`IDAUTEUR`, `NOM`, `STATUT`) VALUES
(0, 'Inconnu', 'Inconnu');

-- --------------------------------------------------------

--
-- Structure de la table `contribution`
--

CREATE TABLE IF NOT EXISTS `contribution` (
  `IDDOC` int(11) NOT NULL,
  `EMAILCONTRI` char(30) NOT NULL,
  `DATECONTRI` date NOT NULL,
  `TXTCONTRI` mediumtext NOT NULL,
  `DESCCONTRI` mediumtext NOT NULL,
  `STATUTCONTRI` varchar(10) NOT NULL,
  PRIMARY KEY (`IDDOC`,`EMAILCONTRI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contribution`
--

INSERT INTO `contribution` (`IDDOC`, `EMAILCONTRI`, `DATECONTRI`, `TXTCONTRI`, `DESCCONTRI`, `STATUTCONTRI`) VALUES
(1, 'coco@mail.fr', '0000-00-00', 'Lucas ipsum dolor sit amet maul kenobi thrawn bespin skywalker solo solo zabrak darth padmé. Watto secura dooku darth tatooine binks. Aayla hutt boba darth jinn anakin palpatine wampa kamino. Utapau jango dagobah windu darth chewbacca. Organa darth antilles mon binks maul calrissian bespin luke. Yoda wedge jinn moff. Darth darth solo moff darth thrawn qui-gonn moff wampa. Hutt darth naboo kit cade binks calrissian. Maul bespin darth fett wookiee hutt anakin aayla. Cade luke luke kit qui-gonn kessel skywalker organa. ', 'darth solo moff darth thrawn qui-gonn moff wampa. Hutt darth naboo kit cade binks calrissian. Maul bespin darth fett wookiee hutt anakin aayla.', 'att'),
(2, 'hey@mail.fr', '0000-00-00', 'Lucas ipsum dolor sit amet maul kenobi thrawn bespin skywalker solo solo zabrak darth padmé. Watto secura dooku darth tatooine binks. Aayla hutt boba darth jinn anakin palpatine wampa kamino. Utapau jango dagobah windu darth chewbacca. Organa darth antilles mon binks maul calrissian bespin luke. Yoda wedge jinn moff. Darth darth solo moff darth thrawn qui-gonn moff wampa. Hutt darth naboo kit cade binks calrissian. Maul bespin darth fett wookiee hutt anakin aayla. Cade luke luke kit qui-gonn kessel skywalker organa. ', 'darth solo moff darth thrawn qui-gonn moff wampa. Hutt darth naboo kit cade binks calrissian. Maul bespin darth fett wookiee hutt anakin aayla.', 'maj');

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `IDDOC` int(11) NOT NULL,
  `IDREGION` int(11) NOT NULL,
  `DATE` date DEFAULT NULL,
  `SIECLE` int(11) NOT NULL,
  `TYPOLOGIE` char(10) NOT NULL,
  `IMAGE` mediumtext,
  `TRANSCRIPTION` longtext,
  `latitude` decimal(10,6) NOT NULL,
  `longitude` decimal(10,6) NOT NULL,
  PRIMARY KEY (`IDDOC`),
  KEY `FK_DOCUMENT_ORIGINAIR_REGION` (`IDREGION`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `document`
--

INSERT INTO `document` (`IDDOC`, `IDREGION`, `DATE`, `SIECLE`, `TYPOLOGIE`, `IMAGE`, `TRANSCRIPTION`, `latitude`, `longitude`) VALUES
(0, 2, '2014-03-01', 21, 'Inc', NULL, NULL, '46.918630', '6.157200'),
(1, 1, '2014-03-01', 21, 'Inc', NULL, NULL, '45.918623', '6.157969'),
(3, 1, '2014-03-23', 20, 'lll', '//', 'Coucou', '46.082377', '6.362768'),
(4, 1, '2014-03-23', 20, 'lll', '//', 'Coucou', '46.082377', '6.362768'),
(6, 1, '2014-03-19', 19, 'ddd', '/img/add.png', NULL, '46.082377', '6.362768'),
(8, 2, '2014-03-23', 18, 'coucou', '/img/add.png', 'Unde Rufinus ea tempestate praefectus praetorio ad discrimen trusus est ultimum. ire enim ipse compellebatur ad militem, quem exagitabat inopia simul et feritas, et alioqui coalito more in ordinarias dignitates asperum semper et saevum, ut satisfaceret atque monstraret, quam ob causam annonae convectio sit impedita.Unde Rufinus ea tempestate praefectus praetorio ad discrimen trusus est ultimum. ire enim ipse compellebatur ad militem, quem exagitabat inopia simul et feritas, et alioqui coalito more in ordinarias dignitates asperum semper et saevum, ut satisfaceret atque monstraret, quam ob causam annonae convectio sit impedita.', '46.082377', '6.362768'),
(2555, 3, '2014-02-03', 21, '1', '/img/add.png', 'Unde Rufinus ea tempestate praefectus praetorio ad discrimen trusus est ultimum. ire enim ipse compellebatur ad militem, quem exagitabat inopia simul et feritas, et alioqui coalito more in ordinarias dignitates asperum semper et saevum, ut satisfaceret atque monstraret, quam ob causam annonae convectio sit impedita.', '46.082377', '6.362768'),
(25545, 2, '2014-03-04', 21, 'Compta', '/img/add.png', 'Unde Rufinus ea tempestate praefectus praetorio ad discrimen trusus est ultimum. ire enim ipse compellebatur ad militem, quem exagitabat inopia simul et feritas, et alioqui coalito more in ordinarias dignitates asperum semper et saevum, ut satisfaceret atque monstraret, quam ob causam annonae convectio sit impedita.', '46.082377', '6.362768');

-- --------------------------------------------------------

--
-- Structure de la table `ecritpar`
--

CREATE TABLE IF NOT EXISTS `ecritpar` (
  `IDDOC` int(11) NOT NULL,
  `IDAUTEUR` int(11) NOT NULL,
  PRIMARY KEY (`IDDOC`,`IDAUTEUR`),
  KEY `FK_ECRITPAR_ECRITPAR_AUTEUR` (`IDAUTEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `map`
--

CREATE TABLE IF NOT EXISTS `map` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `ville` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `longitude` decimal(10,6) NOT NULL,
  `latitude` decimal(10,6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `map`
--

INSERT INTO `map` (`id`, `ville`, `description`, `longitude`, `latitude`) VALUES
(9, 'Equateur', '1/1', '1.000000', '1.000000'),
(10, 'Annecy le vieux IAE', 'IAE Savoie Mont Blanc', '6.157969', '45.918623');

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `IDREGION` int(11) NOT NULL,
  `NOMREGION` char(10) NOT NULL,
  PRIMARY KEY (`IDREGION`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `region`
--

INSERT INTO `region` (`IDREGION`, `NOMREGION`) VALUES
(1, 'Savoie'),
(2, 'Piémont'),
(3, 'Dauphiné'),
(4, 'Suisse');

-- --------------------------------------------------------

--
-- Structure de la table `revue`
--

CREATE TABLE IF NOT EXISTS `revue` (
  `IDREVUE` int(11) NOT NULL AUTO_INCREMENT,
  `URLPDF` varchar(255) NOT NULL DEFAULT 'revues/pdf/',
  `DATEPUBLICATION` date NOT NULL,
  `REFERENCE` varchar(25) NOT NULL,
  `COUV` varchar(255) NOT NULL,
  `TITRE` varchar(255) NOT NULL,
  `PREVIEW` longtext NOT NULL,
  `KEYWORD1` varchar(20) NOT NULL,
  `KEYWORD2` varchar(20) NOT NULL,
  `KEYWORD3` varchar(20) NOT NULL,
  PRIMARY KEY (`IDREVUE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `revue`
--

INSERT INTO `revue` (`IDREVUE`, `URLPDF`, `DATEPUBLICATION`, `REFERENCE`, `COUV`, `TITRE`, `PREVIEW`, `KEYWORD1`, `KEYWORD2`, `KEYWORD3`) VALUES
(1, 'revues/pdf/', '2001-05-17', 'RF20010517', '/img/add.png', 'Titre 1 parce que c''est la base', 'Quam quidem partem accusationis admiratus sum et moleste tuli potissimum esse Atratino datam. Neque enim decebat neque aetas illa postulabat neque, id quod animadvertere poteratis, pudor patiebatur optimi adulescentis in tali illum oratione versari. Vellem aliquis ex vobis robustioribus hunc male dicendi locum suscepisset; aliquanto liberius et fortius et magis more nostro refutaremus istam male dicendi licentiam. Tecum, Atratine, agam lenius, quod et pudor tuus moderatur orationi meae et meum erga te parentemque tuum beneficium tueri debeo.', 'histoire', 'savoie', 'coucou'),
(2, '', '2002-02-12', 'RF22534d', '/img/delete.png', 'Titre Wesh', 'Excitavit hic ardor milites per municipia plurima, quae isdem conterminant, dispositos et castella, sed quisque serpentes latius pro viribus repellere moliens, nunc globis confertos, aliquotiens et dispersos multitudine superabatur ingenti, quae nata et educata inter editos recurvosque ambitus montium eos ut loca plana persultat et mollia, missilibus obvios eminus lacessens et ululatu truci perterrens.', 'A', 'B', 'C');

-- --------------------------------------------------------

--
-- Structure de la table `transcripteur`
--

CREATE TABLE IF NOT EXISTS `transcripteur` (
  `IDTRANSCRIPT` int(11) NOT NULL,
  `NOMTRANS` char(20) NOT NULL,
  `PRENOMTRANS` char(20) DEFAULT NULL,
  `EMAILTRANS` char(20) NOT NULL,
  `STRUCTURETRANS` char(100) DEFAULT NULL,
  PRIMARY KEY (`IDTRANSCRIPT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `transcritpar`
--

CREATE TABLE IF NOT EXISTS `transcritpar` (
  `IDTRANSCRIPT` int(11) NOT NULL,
  `IDDOC` int(11) NOT NULL,
  PRIMARY KEY (`IDTRANSCRIPT`,`IDDOC`),
  KEY `FK_TRANSCRI_TRANSCRIT_DOCUMENT` (`IDDOC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `FK_DOCUMENT_ORIGINAIR_REGION` FOREIGN KEY (`IDREGION`) REFERENCES `region` (`IDREGION`);

--
-- Contraintes pour la table `ecritpar`
--
ALTER TABLE `ecritpar`
  ADD CONSTRAINT `FK_ECRITPAR_ECRITPAR2_DOCUMENT` FOREIGN KEY (`IDDOC`) REFERENCES `document` (`IDDOC`),
  ADD CONSTRAINT `FK_ECRITPAR_ECRITPAR_AUTEUR` FOREIGN KEY (`IDAUTEUR`) REFERENCES `auteur` (`IDAUTEUR`);

--
-- Contraintes pour la table `transcritpar`
--
ALTER TABLE `transcritpar`
  ADD CONSTRAINT `FK_TRANSCRI_TRANSCRIT_DOCUMENT` FOREIGN KEY (`IDDOC`) REFERENCES `document` (`IDDOC`),
  ADD CONSTRAINT `FK_TRANSCRI_TRANSCRIT_TRANSCRI` FOREIGN KEY (`IDTRANSCRIPT`) REFERENCES `transcripteur` (`IDTRANSCRIPT`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
