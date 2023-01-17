-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 17 jan. 2023 à 11:04
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `captair`
--

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `titre` varchar(500) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`id`, `titre`, `contenu`) VALUES
(4, 'Quelle est la fonction principale de nos bracelets Captair ?', 'Notre entreprise Captair a pour objectif de fournir des bracelets équipés de capteurs pour permettre \r\naux utilisateurs de connaître l\'état en temps réel du réseau de métro à Paris. En utilisant une flotte d\r\n\'utilisateurs équipés de nos bracelets, nous pouvons fournir des informations sur \r\nl\'état du réseau de manière précise.\r\n'),
(5, 'Comment utiliser les informations fournies par les bracelets Captair ?', 'Les informations collectées par les bracelets Captair sont disponibles en temps réel sur \r\nnotre site web dans l\'onglet \"données\". Vous pouvez également paramétrer \r\ndes alertes pour être informé en temps réel des perturbations sur le réseau.'),
(6, 'Qu\'arrive-t-il si mon bracelet Captair ne fonctionne plus ?', 'Si votre bracelet Captair ne fonctionne plus correctement, \r\nn\'hésitez pas à nous contacter pour que nous puissions vous aider à résoudre le problème. \r\nNous disposons d\'un service d\'assistance clientèle dédié qui se tient à votre disposition pour répondre\r\nà toutes vos questions et vous aider à résoudre les problèmes éventuels.'),
(7, 'Est-il possible de consulter l\'état du réseau de métro à Paris sans posséder un bracelet Captair ?', 'Oui, il est possible de consulter l\'état du réseau de métro à Paris même si vous ne possédez \r\npas un bracelet Captair. Les informations collectées par nos utilisateurs équipés de bracelets sont disponibles en temps réel sur notre application mobile, \r\net sont accessibles à tous les utilisateurs. \r\nIl vous suffit de télécharger l\'application et de vous connecter pour avoir accès à ces informations.'),
(8, 'Comment jumeler sa montre avec son compte ? ', 'Pour synchroniser votre montre avec votre compte, \r\nil suffit de suivre ces quelques étapes.\r\n Lors de l\'acquisition de votre montre, vous recevrez un code de jumelage unique. \r\nEn accédant à votre compte en ligne, \r\nvous pourrez entrer ce code pour établir une liaison entre votre montre et votre compte. \r\nCette opération ne prend que quelques minutes \r\net vous permettra de bénéficier des fonctionnalités de votre montre de manière optimale.'),
(9, 'Quel est le délai de préparation et d\'expédition pour les commandes ?', 'Concernant le délai de préparation et d\'expédition des commandes, \r\nsachez que dès validation de votre commande, celle-ci sera mise en fabrication.\r\n Il faut généralement compter entre une à deux semaines pour la réception de votre commande, \r\naprès expédition de celle-ci. Nous nous efforçons de maintenir des délais d\'expédition aussi courts que\r\n possible tout en garantissant la qualité de nos produits.\r\n N\'hésitez pas à nous contacter pour toutes questions supplémentaires.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
