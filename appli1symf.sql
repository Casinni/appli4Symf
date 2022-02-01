-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 01 fév. 2022 à 18:16
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `appli1symf`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat_produits`
--

CREATE TABLE `achat_produits` (
  `id` int(11) NOT NULL,
  `personne_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `nombre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `achat_produits`
--

INSERT INTO `achat_produits` (`id`, `personne_id`, `nom`, `prix`, `nombre`) VALUES
(1, 5, 'smartphone Android Pixel', 458.12, 1),
(2, 4, 'ordinateur HP i5', 1250.5, 2),
(3, 5, 'Livre sur Symfony', 45.9, 1);

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `rue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codepostal` int(11) NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`id`, `numero`, `rue`, `codepostal`, `ville`) VALUES
(1, 2019507053, 'Boulevard Victor Hugo', 56000, 'Vannes'),
(2, 1339740856, 'Boulevard Victor Hugo', 56000, 'Vannes'),
(3, 1533715943, 'Boulevard Victor Hugo', 56000, 'Vannes');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220201155601', '2022-02-01 16:56:08', 136);

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `id` int(11) NOT NULL,
  `auteur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id`, `auteur`, `edition`, `information`, `titre`) VALUES
(1, 'Victor Hugo', 'Hachette', 'bon livre', 'Les Miserables'),
(2, 'Gustave Flaubert', 'jacques Neefs', 'Livre en moyen état', 'Madame Bovary'),
(3, 'Guy de Maupassant', 'Folio', 'Livre en excellent état', 'Le Horla'),
(4, 'Victor Hugo', 'Galimard', 'Livre en bon état', 'Les Miserables');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naiss` datetime DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id`, `nom`, `prenom`, `date_naiss`, `email`, `telephone`, `login`, `pwd`, `adresse_id`) VALUES
(4, 'Hugo', 'Victor', '1992-01-19 16:51:51', 'vhugo@free.fr', '0102030405', 'vhugo', '2046faceb42307d8d2ee8f80c3c27bc9', 1),
(5, 'Valjean', 'Jean', '1992-01-19 16:51:51', 'jvaljean@free.fr', '0102030406', 'jvaljean', '2046faceb42307d8d2ee8f80c3c27bc9', 2),
(6, 'Macron', 'Brigitte', '1992-01-19 16:51:51', 'bmacron@free.fr', '0102030407', 'bmacron', '2046faceb42307d8d2ee8f80c3c27bc9', 3);

-- --------------------------------------------------------

--
-- Structure de la table `personne_livre`
--

CREATE TABLE `personne_livre` (
  `personne_id` int(11) NOT NULL,
  `livre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personne_livre`
--

INSERT INTO `personne_livre` (`personne_id`, `livre_id`) VALUES
(4, 1),
(4, 3),
(4, 4),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(6, 1),
(6, 2),
(6, 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `achat_produits`
--
ALTER TABLE `achat_produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_451259A6A21BD112` (`personne_id`);

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_FCEC9EF4DE7DC5C` (`adresse_id`);

--
-- Index pour la table `personne_livre`
--
ALTER TABLE `personne_livre`
  ADD PRIMARY KEY (`personne_id`,`livre_id`),
  ADD KEY `IDX_B8825EF0A21BD112` (`personne_id`),
  ADD KEY `IDX_B8825EF037D925CB` (`livre_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `achat_produits`
--
ALTER TABLE `achat_produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `achat_produits`
--
ALTER TABLE `achat_produits`
  ADD CONSTRAINT `FK_451259A6A21BD112` FOREIGN KEY (`personne_id`) REFERENCES `personne` (`id`);

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `FK_FCEC9EF4DE7DC5C` FOREIGN KEY (`adresse_id`) REFERENCES `adresse` (`id`);

--
-- Contraintes pour la table `personne_livre`
--
ALTER TABLE `personne_livre`
  ADD CONSTRAINT `FK_B8825EF037D925CB` FOREIGN KEY (`livre_id`) REFERENCES `livre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B8825EF0A21BD112` FOREIGN KEY (`personne_id`) REFERENCES `personne` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
