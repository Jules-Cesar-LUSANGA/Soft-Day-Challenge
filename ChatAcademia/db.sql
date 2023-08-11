-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 07 Août 2023 à 07:12
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ca`
--
CREATE DATABASE IF NOT EXISTS `ca` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ca`;

-- --------------------------------------------------------

--
-- Structure de la table `blog_articles`
--

CREATE TABLE `blog_articles` (
  `id` int(11) NOT NULL,
  `author` text NOT NULL,
  `article_title` text NOT NULL,
  `category` text NOT NULL,
  `content` text NOT NULL,
  `article_date` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL,
  `category_title` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `article_id` text NOT NULL,
  `content` text NOT NULL,
  `date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `blog_likes`
--

CREATE TABLE `blog_likes` (
  `id` int(11) NOT NULL,
  `article_id` text NOT NULL,
  `username` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `sender` varchar(250) CHARACTER SET latin1 NOT NULL,
  `receiver` varchar(250) CHARACTER SET latin1 NOT NULL,
  `msg` varchar(10000) NOT NULL,
  `msg_date` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `chats_with_teachers`
--

CREATE TABLE `chats_with_teachers` (
  `id` int(11) NOT NULL,
  `teacher` text NOT NULL,
  `teacher_complete_name` text NOT NULL,
  `question` text NOT NULL,
  `question_author` text NOT NULL,
  `question_date` varchar(250) NOT NULL,
  `question_status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `chats_with_teachers_answers`
--

CREATE TABLE `chats_with_teachers_answers` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `answer_content` text NOT NULL,
  `answer_author` text NOT NULL,
  `answer_date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `chats_with_teachers_comments`
--

CREATE TABLE `chats_with_teachers_comments` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `comment_author` text NOT NULL,
  `comment_content` text NOT NULL,
  `comment_date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `exclusions`
--

CREATE TABLE `exclusions` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `forums_answers`
--

CREATE TABLE `forums_answers` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `question_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `forums_comments`
--

CREATE TABLE `forums_comments` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `forums_likes`
--

CREATE TABLE `forums_likes` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `username` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `forums_posts`
--

CREATE TABLE `forums_posts` (
  `id` int(11) NOT NULL,
  `author` mediumtext NOT NULL,
  `title` mediumtext NOT NULL,
  `category` mediumtext NOT NULL,
  `content` mediumtext NOT NULL,
  `date` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `friend_request`
--

CREATE TABLE `friend_request` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `future_friend_username` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `my_friends`
--

CREATE TABLE `my_friends` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `friend` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `mdp` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text CHARACTER SET latin1 NOT NULL,
  `mdp` text CHARACTER SET latin1 NOT NULL,
  `complete_name` text CHARACTER SET latin1 NOT NULL,
  `matricule` text CHARACTER SET latin1 NOT NULL,
  `email` text CHARACTER SET latin1 NOT NULL,
  `promotion` text CHARACTER SET latin1 NOT NULL,
  `category` text CHARACTER SET latin1 NOT NULL,
  `img` text CHARACTER SET latin1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `mdp`, `complete_name`, `matricule`, `email`, `promotion`, `category`, `img`) VALUES
(1, 'jc', '$2y$10$mLsrccvb9bYCPsCM1cOw7.0Hfj61PFss9RXyyajwhHlCCKKezsFci', 'Jules-César LUSANGA', '22li214', '22li214@esisalama.org', 'L1', 'Etudiant', 'jc.jpg'),
(2, 'admin', '$2y$10$8yg89RCCShnB93Dpv53WXe2xA.eaNEPb7Z/oIstNI1EWTJ4TK6JDC', 'admin', 'Enseignant', 'admin@info.ca', 'Enseignant', 'Enseignant', 'avatar.png');

-- --------------------------------------------------------

--
-- Structure de la table `warnings`
--

CREATE TABLE `warnings` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `warning` text NOT NULL,
  `warning_date` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `blog_articles`
--
ALTER TABLE `blog_articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `blog_likes`
--
ALTER TABLE `blog_likes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chats_with_teachers`
--
ALTER TABLE `chats_with_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chats_with_teachers_answers`
--
ALTER TABLE `chats_with_teachers_answers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chats_with_teachers_comments`
--
ALTER TABLE `chats_with_teachers_comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `exclusions`
--
ALTER TABLE `exclusions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `forums_answers`
--
ALTER TABLE `forums_answers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `forums_comments`
--
ALTER TABLE `forums_comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `forums_likes`
--
ALTER TABLE `forums_likes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `forums_posts`
--
ALTER TABLE `forums_posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `friend_request`
--
ALTER TABLE `friend_request`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `my_friends`
--
ALTER TABLE `my_friends`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `warnings`
--
ALTER TABLE `warnings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `blog_articles`
--
ALTER TABLE `blog_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `blog_likes`
--
ALTER TABLE `blog_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `chats_with_teachers`
--
ALTER TABLE `chats_with_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `chats_with_teachers_answers`
--
ALTER TABLE `chats_with_teachers_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `chats_with_teachers_comments`
--
ALTER TABLE `chats_with_teachers_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `exclusions`
--
ALTER TABLE `exclusions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `forums_answers`
--
ALTER TABLE `forums_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `forums_comments`
--
ALTER TABLE `forums_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `forums_likes`
--
ALTER TABLE `forums_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `forums_posts`
--
ALTER TABLE `forums_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `friend_request`
--
ALTER TABLE `friend_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `my_friends`
--
ALTER TABLE `my_friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `warnings`
--
ALTER TABLE `warnings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
