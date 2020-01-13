-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 13 jan. 2020 à 10:38
-- Version du serveur :  5.7.23-log
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `appswebmessageriedb`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id_message` int(3) NOT NULL AUTO_INCREMENT,
  `id_user1` int(2) NOT NULL,
  `id_users2` int(2) NOT NULL,
  `msgTxt` text NOT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_message`, `id_user1`, `id_users2`, `msgTxt`, `status`) VALUES
(88, 1, 3, 'Esserrati Mohammed', NULL),
(89, 1, 3, 'Taha Angezdam', NULL),
(90, 1, 3, 'Mohammed Mharzi', NULL),
(91, 1, 3, 'Salam', NULL),
(92, 1, 3, 'Ahlan ssi taha', NULL),
(93, 1, 3, 'cava bien', NULL),
(94, 1, 3, 'Ana 9addit hadchii mzyan', NULL),
(95, 1, 3, 'Ewa sir t9awad', NULL),
(96, 1, 3, 'azckiazekicazem', NULL),
(97, 1, 3, 'azcaca', NULL),
(98, 1, 3, 'aca', NULL),
(99, 1, 3, 'Salut', NULL),
(100, 1, 3, 'Hi', NULL),
(101, 1, 3, 'Kidayar a  ssat', NULL),
(102, 1, 3, 'DLZALDA', NULL),
(103, 1, 3, 'kHAY ZIN', NULL),
(104, 1, 3, 'Cava ?', NULL),
(105, 1, 3, 'Fatima', NULL),
(106, 1, 3, 'ok', NULL),
(107, 1, 3, 'ok', NULL),
(108, 1, 3, 'OK Bonjour', NULL),
(109, 1, 3, 'lazcjkma', NULL),
(110, 1, 3, 'WA FIN A RACHID', NULL),
(111, 1, 3, 'bnjr', NULL),
(112, 1, 3, 'dazd', NULL),
(113, 1, 3, 'ere', NULL),
(114, 1, 3, 'Hi', NULL),
(115, 1, 3, 'hi', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(2) NOT NULL AUTO_INCREMENT COMMENT 'identifiant de utilisateur',
  `pronom` varchar(25) DEFAULT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `psw` varchar(20) DEFAULT NULL,
  `telephone` varchar(10) DEFAULT NULL,
  `sexe` varchar(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT 'status = En ligne / Hors ligne.',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `pronom`, `nom`, `email`, `psw`, `telephone`, `sexe`, `status`) VALUES
(1, 'med', 'abde', 'med@msg', 'med', '9832', 'm', NULL),
(2, 'esrt esrt', 'abde', 'sermadi@hhh', 'med', '312313', 'm', 1),
(15, 'taha', 'ang', 'taha@chat.com', 'taha', '1245678', 'f', 1),
(16, 'Med', 'Mharzi', 'Mharzi@chat.com', 'sarati1234', '1245678', 'm', 1),
(17, 'ABDE', 'MED', 'sarati.mohammed@chat.com', 'med', '1245678', 'm', 1),
(18, 'taha', 'ang', 'sarati@chat.com', 'ofezmjk', 'MEDd', 'm', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
