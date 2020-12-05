-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 30 nov. 2020 à 08:50
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `php`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteur`
--

DROP TABLE IF EXISTS `acteur`;
CREATE TABLE IF NOT EXISTS `acteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `acteur`
--

INSERT INTO `acteur` (`id`, `nom`) VALUES
(1, 'Mark Hamill'),
(2, 'Harrison Ford'),
(3, 'Carrie Fisher'),
(4, 'Alec Guinness'),
(5, 'Jhon Travolta'),
(6, 'Samuel L. Jackson'),
(7, 'Uma Thurman'),
(8, 'Bruce Willis'),
(9, 'Rutger Hauer'),
(10, 'Sean Young'),
(11, 'Daryl Hannah'),
(12, 'Leonardo DiCaprio'),
(13, 'Kate Winslet'),
(14, 'Billy Zane'),
(15, 'Kathy Bates'),
(16, 'Mel Gibson'),
(17, 'Sophie Marceau'),
(18, 'Catherine McCormack'),
(19, 'Patrick McGoohan'),
(20, 'Tim Robbins'),
(21, 'Morgan Freeman'),
(22, 'Bob Gunton'),
(23, 'William Sadler'),
(24, 'Will Smith'),
(25, 'Bill Pullman'),
(26, 'Jeff Goldblum'),
(27, 'Mary McDonnell'),
(28, 'Chazz Palminteri'),
(29, 'Kevin Spacey'),
(30, 'Gabriel Byrne'),
(31, 'Benicio Del Toro'),
(32, 'Karen Allen'),
(33, 'Paul Freeman'),
(34, 'Denholm Elliot');

-- --------------------------------------------------------

--
-- Structure de la table `casting`
--

DROP TABLE IF EXISTS `casting`;
CREATE TABLE IF NOT EXISTS `casting` (
  `film` int NOT NULL,
  `acteur` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=FIXED;

--
-- Déchargement des données de la table `casting`
--

INSERT INTO `casting` (`film`, `acteur`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(3, 2),
(3, 9),
(3, 10),
(3, 11),
(4, 12),
(4, 13),
(4, 14),
(4, 15),
(5, 16),
(5, 17),
(5, 18),
(5, 19),
(6, 20),
(6, 21),
(6, 22),
(6, 23),
(7, 24),
(7, 25),
(7, 26),
(7, 27),
(8, 28),
(8, 29),
(8, 30),
(8, 31),
(9, 2),
(9, 32),
(9, 33),
(9, 34);

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  `annee` int NOT NULL,
  `score` float NOT NULL,
  `nbVotants` int NOT NULL,
  `jaquette` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id`, `nom`, `annee`, `score`, `nbVotants`, `jaquette`) VALUES
(1, 'Star Wars', 1977, 8.9, 14182, 'https://fr.web.img2.acsta.net/c_210_280/medias/nmedia/18/35/41/59/18422600.jpg'),
(2, 'Pulp Fiction', 1994, 8.4, 11693, NULL),
(3, 'Blade Runner', 1982, 8.6, 8665, NULL),
(4, 'Titanic', 1997, 9.2, 8129, 'https://www.notrecinema.com/images/wallpapers/vign/jaquette_465318.jpg'),
(5, 'Braveheart', 1995, 8.4, 8074, NULL),
(6, 'The Shawshank Redemption', 1994, 8.8, 7850, NULL),
(7, 'Independence Day', 1996, 7, 7138, NULL),
(8, 'The Usual Suspects', 1995, 8.7, 6981, NULL),
(9, 'Raiders of the Lost Ark', 1981, 8.4, 6488, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `pwd` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `pwd`, `email`) VALUES
(1, 'admin', 'php', 'admin@mail.org'),
(2, 'vincent', 'vphp', 'vincent@mail.org'),
(3, 'test', 'tphp', 'test@mail.org');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
