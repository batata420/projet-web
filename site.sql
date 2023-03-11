-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 11, 2023 at 10:06 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site`
--

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(3) NOT NULL AUTO_INCREMENT,
  `id_member` int(3) DEFAULT NULL,
  `id_produit` int(3) DEFAULT NULL,
  `prix` int(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_commande`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `pseudo` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `cp` int(5) UNSIGNED ZEROFILL NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `statut` int(11) DEFAULT '0',
  PRIMARY KEY (`id_member`),
  UNIQUE KEY `pseudo` (`pseudo`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membre`
--

INSERT INTO `membre` (`pseudo`, `nom`, `prenom`, `mdp`, `email`, `ville`, `cp`, `adresse`, `id_member`, `statut`) VALUES
('dali', 'dali', 'dali', '123', 'dalisaid2000@gmail.com', 'grombalia', 12345, 'qsdqzdff', 17, 1),
('lianne', 'hamza', 'ghassen', '123', 'hamza@gmail.com', 'grombalia', 08080, 'xD', 32, 0),
('samer', 'qsdqz', 'samer', '123', 'samer@gmail.com', 'grombalia', 12345, '6514sdqfesdf', 34, 0);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(3) NOT NULL AUTO_INCREMENT,
  `reference` varchar(20) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `descrip` text NOT NULL,
  `photo` varchar(250) NOT NULL,
  `prix` int(3) NOT NULL,
  `stock` int(3) NOT NULL,
  PRIMARY KEY (`id_produit`),
  UNIQUE KEY `reference` (`reference`),
  UNIQUE KEY `reference_2` (`reference`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id_produit`, `reference`, `categorie`, `titre`, `descrip`, `photo`, `prix`, `stock`) VALUES
(10, '2', 'jacket', 'Varsity Jacket', 'â€¢Size : S-M-L-XL-XXL ðŸ·ï¸ â€¢Num: 51 078 025- 29 550 272 â€¢Livraison gratuite ðŸ“¦ðŸš€	', 'images/2.jpg	', 20, 3),
(9, '1', 'jacket', 'Varsity Jacket RQX', 'â€¢Size : S-M-L-XL-XXL ðŸ·ï¸ â€¢Num: 51 078 025- 29 550 272 â€¢Livraison gratuite ðŸ“¦ðŸš€', 'images/1.jpg', 15, 3),
(11, '3', 'shoes', 'Ice Bleu', 'â€¢Size :38-39-40-41-42-43ðŸ· â€¢Num: 51 078 025- 29 550 272 â€¢Livraison gratuite ðŸ“¦ðŸš€', 'images/3.jpg', 25, 5),
(15, '6', 'shoes', 'AF1 Double Swoosh', 'â€¢Size :38-39-40-41-42-43ðŸ· â€¢Num: 51 078 025- 29 550 272 â€¢Livraison gratuite ðŸ“¦ðŸš€', 'images/4.jpg', 20, 6),
(14, '5', 'shoes', 'Converse Motion', 'â€¢Size :38-39-40-41-42-43ðŸ· â€¢Num: 51 078 025- 29 550 272 â€¢Livraison gratuite ðŸ“¦ðŸš€', 'images/5.jpg	', 45, 8),
(17, '4', 'shoes', 'Panda', 'â€¢Size :38-39-40-41-42-43ðŸ· â€¢Num: 51 078 025- 29 550 272 â€¢Livraison gratuite ðŸ“¦ðŸš€', 'images/6.jpg	', 30, 4),
(18, '7', 'shoes', 'Dunk Low Grey Fog', 'â€¢Size :38-39-40-41-42-43ðŸ· â€¢Num: 51 078 025- 29 550 272 â€¢Livraison gratuite ðŸ“¦ðŸš€', 'images/7.jpg', 40, 2),
(19, '8', 'shoes', 'Court purple', 'â€¢Size :38-39-40-41-42-43ðŸ· â€¢Num: 51 078 025- 29 550 272 â€¢Livraison gratuite ðŸ“¦ðŸš€', 'images/8.jpg	', 25, 1),
(20, '9', 'shoes', 'Retro 3 x Fragment', 'â€¢Size :38-39-40-41-42-43ðŸ· â€¢Num: 51 078 025- 29 550 272 â€¢Livraison gratuite ðŸ“¦ðŸš€', 'images/9.jpg	', 35, 6),
(21, '10', 'shoes', 'Purple air jordan	', 'â€¢Size :38-39-40-41-42-43ðŸ· â€¢Num: 51 078 025- 29 550 272 â€¢Livraison gratuite ðŸ“¦ðŸš€', 'images/10.jpg', 50, 2),
(22, '11', 'jacket', 'TNF 700 Sans-Manches', 'â€¢Size : S-M-L-XL-XXL ðŸ·ï¸ â€¢Num: 51 078 025- 29 550 272 â€¢Livraison gratuite ðŸ“¦ðŸš€', 'images/11.jpg	', 15, 3),
(23, '12', 'shoes', 'Blazer Mid 77', 'â€¢Size :38-39-40-41-42-43ðŸ· â€¢Num: 51 078 025- 29 550 272 â€¢Livraison gratuite ðŸ“¦ðŸš€', 'images/12.jpg	', 55, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
