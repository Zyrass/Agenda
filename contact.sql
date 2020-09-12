-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 12 sep. 2020 à 16:20
-- Version du serveur :  10.3.22-MariaDB-1ubuntu1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `agenda`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `tel` char(10) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `tel`, `mail`) VALUES
(1, 'lopez', 'jaime lorente', '4598786554', 'jaime-lorente@casa.es'),
(2, 'morte', 'Álvaro', '9999999999', 'alvaro-morte@casa.es'),
(3, 'corberó', 'Úrsula', '9999999999', 'ursula-corbero@casa.es'),
(4, 'acebo', 'esther', '7777777777', 'esther-acebo@casa.es'),
(5, 'longoria', 'eva', '1235467895', 'eva-longoria@star.us'),
(6, 'statham', 'jason', '7496321585', 'jason-statham@acteur.us'),
(7, 'cruise', 'tom', '4613798528', 'tom-cruise@acteur.us'),
(8, 'depp', 'johnny', '9945337711', 'johnny-depp@acteur.us'),
(9, 'willis', 'bruce', '4466882255', 'bruce-willis@acteur.us'),
(10, 'bartoli', 'jenifer', '5555777733', 'jenifer@chanteuse.fr'),
(11, 'm\'roumbaba', 'saïd', '8822668822', 'soprano@chanteur.fr'),
(12, 'depay', 'memphis', '0011991100', 'memphis-depay@footballeur.pb'),
(13, 'gonin', 'charlotte', '7946130793', 'vitaa@chanteuse.fr'),
(14, 'tota', 'matthieu', '9764318293', 'pokora@chanteur.fr'),
(15, 'ward', 'susan', '4444666655', 'susan-ward@actrice.us');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
