-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 18 nov. 2018 à 20:48
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `recipe_buddy`
--

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `category` varchar(50) COLLATE utf8_bin NOT NULL,
  `idPicture` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FOREIGN_KEY_INGREDIENT` (`idPicture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `pantry`
--

DROP TABLE IF EXISTS `pantry`;
CREATE TABLE IF NOT EXISTS `pantry` (
  `idUser` int(11) NOT NULL,
  `idIngredient` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`idUser`,`idIngredient`),
  KEY `FOREIGN_KEY_PANTRY_IDINGREDIENT` (`idIngredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `path` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `idRecipe` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`idRecipe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `recipe`
--

DROP TABLE IF EXISTS `recipe`;
CREATE TABLE IF NOT EXISTS `recipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `difficulty` int(11) NOT NULL,
  `time` time NOT NULL,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FOREIGN_KEY_RECIPE` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `recipe_ingredients`
--

DROP TABLE IF EXISTS `recipe_ingredients`;
CREATE TABLE IF NOT EXISTS `recipe_ingredients` (
  `idRecipe` int(11) NOT NULL,
  `idIngredient` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`idRecipe`,`idIngredient`),
  KEY `FOREIGN_KEY_RECIPE_INGREDIENTS_IDINGREDIENT` (`idIngredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `recipe_pictures`
--

DROP TABLE IF EXISTS `recipe_pictures`;
CREATE TABLE IF NOT EXISTS `recipe_pictures` (
  `idRecipe` int(11) NOT NULL,
  `idPicture` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`idRecipe`,`idPicture`),
  KEY `FOREIGN_KEY_RECIPE_PICTURES_IDPICTURE` (`idPicture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `shopping_list_ingredients`
--

DROP TABLE IF EXISTS `shopping_list_ingredients`;
CREATE TABLE IF NOT EXISTS `shopping_list_ingredients` (
  `idUser` int(11) NOT NULL,
  `idIngredient` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`idUser`,`idIngredient`),
  KEY `FOREIGN_KEY_SLI_IDINGREDIENT` (`idIngredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `shopping_list_recipes`
--

DROP TABLE IF EXISTS `shopping_list_recipes`;
CREATE TABLE IF NOT EXISTS `shopping_list_recipes` (
  `idUser` int(11) NOT NULL,
  `idRecipe` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`idUser`,`idRecipe`),
  KEY `FOREIGN_KEY_SLR_IDRECIPE` (`idRecipe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `step`
--

DROP TABLE IF EXISTS `step`;
CREATE TABLE IF NOT EXISTS `step` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `idRecipe` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FOREIGN_KEY_STEP` (`idRecipe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(50) COLLATE utf8_bin NOT NULL,
  `firstname` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `birthdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `wish`
--

DROP TABLE IF EXISTS `wish`;
CREATE TABLE IF NOT EXISTS `wish` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FOREIGN_KEY_WISH` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD CONSTRAINT `FOREIGN_KEY_INGREDIENT` FOREIGN KEY (`idPicture`) REFERENCES `picture` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `pantry`
--
ALTER TABLE `pantry`
  ADD CONSTRAINT `FOREIGN_KEY_PANTRY_IDINGREDIENT` FOREIGN KEY (`idIngredient`) REFERENCES `ingredient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FOREIGN_KEY_PANTRY_IDUSER` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `FOREIGN_KEY_RATING` FOREIGN KEY (`idRecipe`) REFERENCES `recipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `FOREIGN_KEY_RECIPE` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  ADD CONSTRAINT `FOREIGN_KEY_RECIPE_INGREDIENTS_IDINGREDIENT` FOREIGN KEY (`idIngredient`) REFERENCES `ingredient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FOREIGN_KEY_RECIPE_INGREDIENT_IDRECIPE` FOREIGN KEY (`idRecipe`) REFERENCES `recipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `recipe_pictures`
--
ALTER TABLE `recipe_pictures`
  ADD CONSTRAINT `FOREIGN_KEY_RECIPE_PICTURES_IDPICTURE` FOREIGN KEY (`idPicture`) REFERENCES `picture` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FOREIGN_KEY_RECIPE_PICTURES_IDRECIPE` FOREIGN KEY (`idRecipe`) REFERENCES `recipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `shopping_list_ingredients`
--
ALTER TABLE `shopping_list_ingredients`
  ADD CONSTRAINT `FOREIGN_KEY_SLI_IDINGREDIENT` FOREIGN KEY (`idIngredient`) REFERENCES `ingredient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FOREIGN_KEY_SLI_IDUSER` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `shopping_list_recipes`
--
ALTER TABLE `shopping_list_recipes`
  ADD CONSTRAINT `FOREIGN_KEY_SLR_IDRECIPE` FOREIGN KEY (`idRecipe`) REFERENCES `recipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FOREIGN_KEY_SLR_IDUSER` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `step`
--
ALTER TABLE `step`
  ADD CONSTRAINT `FOREIGN_KEY_STEP` FOREIGN KEY (`idRecipe`) REFERENCES `recipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wish`
--
ALTER TABLE `wish`
  ADD CONSTRAINT `FOREIGN_KEY_WISH` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
