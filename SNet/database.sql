-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 24 Juillet 2023 à 11:04
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `anonimat` text NOT NULL,
  `categorie` text NOT NULL,
  `article` varchar(10000) NOT NULL,
  `date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `author`, `anonimat`, `categorie`, `article`, `date`) VALUES
(1, 'ada', 'no', 'code', 'Cours d\'initiation à la programmation, demain à 8h', '08:14:50 - 02/07/2023'),
(2, 'ada', 'yes', 'others', 'Ceci doit être anonyme !', '08:15:33 - 02/07/2023'),
(3, 'ada', 'yes', 'others', 'Ceci doit être anonyme !', '08:16:55 - 02/07/2023'),
(4, 'ada', 'no', 'network', 'Un autre article', '08:18:27 - 02/07/2023'),
(5, 'jc', 'no', 'network', 'Les réseaux informatiques !', '09:13:08 - 02/07/2023'),
(6, 'asus', 'no', 'code', 'Bonjour les amis ! J\'espère que vous allez bien. Je viens aujourd\'hui pour vous dire ceci : Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repudiandae eius corrupti saepe eos dolor mollitia id delectus ut minima nam nisi, reprehenderit perspiciatis sint esse officiis vero corporis explicabo dignissimos!\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque recusandae vero deserunt, accusamus qui, atque aliquid impedit velit ipsam illo nam, maiores molestiae omnis modi mollitia distinctio magnam cupiditate minima. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis quaerat commodi molestias vitae eius, aspernatur nemo saepe eaque ducimus assumenda ad sed temporibus maiores, officiis at similique rem qui. In.', '12:09:39 - 02/07/2023'),
(7, 'sylva', 'no', 'code', 'Mon premier article', '15:33:42 - 02/07/2023'),
(8, 'sylva', 'yes', 'code', 'Ceci est article anonyme !', '15:34:13 - 02/07/2023'),
(9, 'jc', 'yes', 'code', 'Bonjour le monde', '15:09:21 - 10/07/2023'),
(10, 'jc', 'no', 'design', 'Ceci est le premier article sur le design !', '01:26:36 - 11/07/2023'),
(11, 'jc', 'no', 'design', 'Est-ce que le design vous plait ?', '12:37:07 - 11/07/2023');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` varchar(4000) NOT NULL,
  `date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `username`, `post_id`, `comment`, `date`) VALUES
(1, 'jc', 6, 'C\'est bon', '2023/07/08 10:44:02'),
(2, 'jc', 4, '245469f3c41b3222441056b6bc6e789710ef2bfb', '2023/07/08 10:48:27'),
(3, 'jc', 6, 'Un très bon article !', '2023/07/10 15:29:37'),
(4, 'jc', 3, 'Pourquoi anonyme ?', '2023/07/10 15:33:07'),
(5, 'jc', 3, 'Réponds !', '2023/07/10 15:34:45'),
(6, 'ada', 3, 'J\'ai manqué quoi ?', '2023/07/10 15:35:39'),
(7, 'ada', 9, 'Merci de nous avoir salué !', '2023/07/10 18:00:49'),
(8, 'ada', 6, 'J\'aprécie\r\n', '2023/07/10 18:14:55'),
(9, 'jc', 11, 'Moi non !', '2023/07/11 12:37:47'),
(10, 'jc', 10, 'Bonjour', '2023/07/11 13:19:44'),
(11, 'jc', 10, 'J\'ai hâte d\'apprendre cela !', '2023/07/11 13:25:57');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `username`) VALUES
(3, 6, 'ada'),
(4, 4, 'ada');

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

CREATE TABLE `reponses` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reponses`
--

INSERT INTO `reponses` (`id`, `username`, `post_id`, `comment_id`, `answer`, `date`) VALUES
(2, 'jc', 11, 9, 'Comment ?', '2023/07/11 13:18:48'),
(3, 'jane', 10, 11, 'Moi aussi', '2023/07/11 13:27:20');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `reponses`
--
ALTER TABLE `reponses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;--
-- Base de données :  `dbb`
--
CREATE DATABASE IF NOT EXISTS `dbb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dbb`;

-- --------------------------------------------------------

--
-- Structure de la table `tb`
--

CREATE TABLE `tb` (
  `id` int(11) NOT NULL,
  `task` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tb`
--

INSERT INTO `tb` (`id`, `task`) VALUES
(1, 'ça va là-bàs ?'),
(2, 'ça va là-bàs ?'),
(3, 'l\'été passé s\'est passé comme ça été'),
(4, 'l\'été passé s\'est passé comme ça été');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `tb`
--
ALTER TABLE `tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `tb`
--
ALTER TABLE `tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;--
-- Base de données :  `php_mysql`
--
CREATE DATABASE IF NOT EXISTS `php_mysql` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `php_mysql`;
--
-- Base de données :  `snet`
--
CREATE DATABASE IF NOT EXISTS `snet` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `snet`;

-- --------------------------------------------------------

--
-- Structure de la table `articles_likes`
--

CREATE TABLE `articles_likes` (
  `id` int(11) NOT NULL,
  `article_id` text NOT NULL,
  `username` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `articles_likes`
--

INSERT INTO `articles_likes` (`id`, `article_id`, `username`) VALUES
(2, '4', 'jc'),
(4, '3', 'jc'),
(6, '7', 'jc'),
(8, '5', 'ada');

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
  `article_date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `blog_articles`
--

INSERT INTO `blog_articles` (`id`, `author`, `article_title`, `category`, `content`, `article_date`) VALUES
(1, 'jc', 'Devenir un bon développeur !', '', 'La seule chose à faire pour devenir un bon développeur est de ... Suite dans 2 heures !', '2023/07/16 07:49:48'),
(3, 'ada', 'Les pros du code', '', 'Un bon pro du code ne fait pas...', '2023/07/16 08:13:01'),
(4, 'jane', 'Mon premier article', '', 'Ceci est mon premier article.<br />\r\nJe l\'ai modifié trois fois.', '2023/07/16 08:18:16'),
(5, 'ada', 'Avancées technologiques', 'Technologie', 'La technologie avance très vite.', '2023/07/20 23:46:16'),
(6, 'jc', 'La science en bref', 'Sciences', 'La science est un domaine de la vie, qui cherche à expliquer tout ce qui existe.', '2023/07/21 02:04:30'),
(7, 'jc', 'La vie', 'Développement personnel', 'Dans la vie, lorsque tu as un rêve, il faut le protéger. Car on ne sait jamais ce que l\'avenir nous réserve.', '2023/07/24 06:32:16');

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

--
-- Contenu de la table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `username`, `article_id`, `content`, `date`) VALUES
(1, 'jc', '1', 'Et ?', '2023/07/16 09:20:45'),
(2, 'jc', '4', 'Ton premier ?', '2023/07/16 09:21:56'),
(3, 'jc', '4', 'Oui, c\'est mon premier.', '2023/07/16 09:22:35'),
(4, 'jc', '1', 'J\'ai aimé mon propre article !', '2023/07/16 10:12:24'),
(5, 'jc', '3', '... ne fait pas quoi ?', '2023/07/20 15:59:32'),
(6, 'jc', '7', 'J\'ai aimé.', '2023/07/24 06:34:57'),
(7, 'ada', '7', 'Comme on dit : l\'avenir est incertain.', '2023/07/24 06:37:09');

-- --------------------------------------------------------

--
-- Structure de la table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `sender` varchar(250) NOT NULL,
  `receiver` varchar(250) NOT NULL,
  `msg` varchar(10000) NOT NULL,
  `msg_date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `chats`
--

INSERT INTO `chats` (`id`, `sender`, `receiver`, `msg`, `msg_date`) VALUES
(2, 'jc', 'ada', 'Bonjour', '2023/07/21 03:46:30'),
(3, 'ada', 'jc', 'Tu vas bien ?', '2023/07/21 03:47:08'),
(4, 'jc', 'ada', 'Oui, et toi ?', '2023/07/21 03:58:20'),
(5, 'ada', 'jc', 'Bien. Quoi de neuf ?', '2023/07/21 03:59:02'),
(6, 'ada', 'jane', 'Bonjour', '2023/07/21 04:34:20'),
(7, 'ada', 'jc', 'Tu vas bien j\'espÃ¨re ?', '2023/07/21 04:35:09'),
(8, 'jc', 'ada', 'Oui et toi ?', '2023/07/21 05:25:11'),
(9, 'jc', 'ada', 'Tu vas bien j\'espère ?', '2023/07/24 09:33:51');

-- --------------------------------------------------------

--
-- Structure de la table `forum_posts`
--

CREATE TABLE `forum_posts` (
  `id` int(11) NOT NULL,
  `author` text NOT NULL,
  `title` text NOT NULL,
  `category` text NOT NULL,
  `content` text NOT NULL,
  `date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `forum_posts`
--

INSERT INTO `forum_posts` (`id`, `author`, `title`, `category`, `content`, `date`) VALUES
(21, 'ada', 'UI/UX', 'Design', 'C\'est quoi ces 2 termes ?', '2023/07/24 06:38:10'),
(3, 'jc', 'Architecture réseaux', 'Réseaux', 'Puis-je apprendre d\'avantage sur l\'architecture des réseaux ?', '06:54:29 - 12/07/2023'),
(4, 'ada', 'Questions bêtes', 'Divers', 'Toutes les questions sont permises ?', '07:10:19 - 12/07/2023'),
(5, 'ada', 'Salutation', 'Divers', '<p><strong>Bonjour&nbsp;</strong>le monde ! Vous<span style="font-family: Impact,Charcoal,sans-serif;"> allez bien ?</span></p>', '07:24:16 - 12/07/2023'),
(7, 'ada', 'WYSIWYG', 'Design', 'Il y avait du javascript ici.', '07:29:03 - 12/07/2023'),
(8, 'jc', 'Salutations', 'Divers', '<p><strong>Bonjour le monde !</strong></p>', '07:40:33 - 12/07/2023'),
(9, 'jc', 'Programmation', 'Programmation', '<p>Programmation</p>', '09:06:28 - 12/07/2023'),
(10, 'jc', 'Tuto', 'Divers', 'Mon tuto', '2023/07/15 21:44:15'),
(11, 'jc', 'Photoshop', 'Design', 'Photoshop sans programmation...', '2023/07/15 21:56:57'),
(12, 'jc', 'PremiÃ¨re demande', 'Divers', 'Bonjour, puis-je avoir de l\'aide ?', '2023/07/15 22:20:28'),
(13, 'jc', 'Protocole IP', 'Réseaux', 'C\'est quoi un protocole IP ?', '2023/07/15 22:22:15'),
(15, 'jc', 'Web Design', 'Design', 'C\'est quoi le web design ?', '2023/07/15 22:50:09'),
(16, 'jc', 'Bonjour', 'Divers', 'Bonjour le monde', '2023/07/15 22:55:30'),
(19, 'jc', 'Salutations', 'RÃ©seaux', 'Mes salutations Ã  tous les amoureux des rÃ©seaux !', '2023/07/16 06:35:20'),
(20, 'jc', 'Design', 'Design', 'Ton design est vraiment...', '2023/07/16 06:39:27');

-- --------------------------------------------------------

--
-- Structure de la table `forums_answers`
--

CREATE TABLE `forums_answers` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `comment_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `forums_answers`
--

INSERT INTO `forums_answers` (`id`, `username`, `comment_id`, `answer`, `date`) VALUES
(1, 'jc', 16, 'C\'est ça ?', '2023/07/16 06:20:24'),
(2, 'jc', 16, 'Tu es sûr ?', '2023/07/16 06:20:48'),
(3, 'jc', 16, 'Comme vous le dites, j\'accepte.', '2023/07/16 06:23:01'),
(4, 'jc', 17, 'Je crois que oui', '2023/07/16 06:38:47'),
(5, 'jc', 18, 'Pourquoi les salutations ici ?', '2023/07/16 06:42:11'),
(6, 'ada', 21, 'Je crois qu\'il veut dire que c\'est moche!', '2023/07/16 06:56:22'),
(7, 'ada', 22, 'Ce n\'est pas ton problème !', '2023/07/20 17:42:26'),
(8, 'ada', 23, 'A cette question bien-sûr', '2023/07/24 06:38:47');

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

--
-- Contenu de la table `forums_comments`
--

INSERT INTO `forums_comments` (`id`, `username`, `post_id`, `comment`, `date`) VALUES
(1, 'jc', 6, 'C\'est bon', '2023/07/08 10:44:02'),
(2, 'jc', 4, '245469f3c41b3222441056b6bc6e789710ef2bfb', '2023/07/08 10:48:27'),
(3, 'jc', 6, 'Un très bon article !', '2023/07/10 15:29:37'),
(4, 'jc', 3, 'Pourquoi anonyme ?', '2023/07/10 15:33:07'),
(5, 'jc', 3, 'Réponds !', '2023/07/10 15:34:45'),
(6, 'ada', 3, 'J\'ai manqué quoi ?', '2023/07/10 15:35:39'),
(7, 'ada', 9, 'Merci de nous avoir salué !', '2023/07/10 18:00:49'),
(8, 'ada', 6, 'J\'aprécie\r\n', '2023/07/10 18:14:55'),
(9, 'jc', 11, 'Moi non !', '2023/07/11 12:37:47'),
(10, 'jc', 10, 'Bonjour', '2023/07/11 13:19:44'),
(11, 'jc', 10, 'J\'ai hâte d\'apprendre cela !', '2023/07/11 13:25:57'),
(12, 'jc', 10, 'viewQuestion', '2023/07/16 02:37:40'),
(13, 'jc', 10, 'Bonjour le monde, Comment tu vas ?', '2023/07/16 02:59:36'),
(14, 'jc', 10, 'Vous allez bien ?', '2023/07/16 03:00:35'),
(15, 'jc', 4, 'Bonjour ?', '2023/07/16 03:02:21'),
(16, 'jc', 15, 'C\'est la stylisation des interfaces web.', '2023/07/16 05:24:05'),
(17, 'jc', 15, 'Tu as compris ?', '2023/07/16 06:38:07'),
(18, 'jc', 18, 'Bonjour', '2023/07/16 06:41:56'),
(19, 'jc', 16, 'Ca va ?', '2023/07/16 06:43:30'),
(20, 'jc', 16, 'Lollllllllllllll', '2023/07/16 06:43:44'),
(21, 'jc', 20, 'Il est quoi ?', '2023/07/16 06:55:34'),
(22, 'ada', 2, 'Ton post n\'a pas de titre!', '2023/07/20 17:42:11'),
(23, 'ada', 21, 'J\'ai besoin des réponses.', '2023/07/24 06:38:26'),
(24, 'jc', 13, 'Tu ne sais pas ?', '2023/07/24 07:49:40');

-- --------------------------------------------------------

--
-- Structure de la table `forums_likes`
--

CREATE TABLE `forums_likes` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `username` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `forums_likes`
--

INSERT INTO `forums_likes` (`id`, `question_id`, `username`) VALUES
(1, 20, 'jane');

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

--
-- Contenu de la table `my_friends`
--

INSERT INTO `my_friends` (`id`, `username`, `friend`) VALUES
(1, 'asus', 'ada'),
(2, 'ada', 'jane'),
(3, 'ada', 'jc');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `mdp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `mdp`) VALUES
(1, 'ada', 'ada1'),
(2, 'jane', 'jane'),
(3, 'john', 'john'),
(4, 'jc', 'jc'),
(5, 'wamp', 'wamp-server'),
(6, 'jeredMinono', '123456'),
(7, 'jules-cesar', '27062001'),
(8, 'asus', 'asus'),
(9, 'sylva', 'sylva'),
(10, 'bonjour', 'bonjour'),
(11, 'chrinovic', ',ukebq');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles_likes`
--
ALTER TABLE `articles_likes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `blog_articles`
--
ALTER TABLE `blog_articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `forum_posts`
--
ALTER TABLE `forum_posts`
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
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles_likes`
--
ALTER TABLE `articles_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `blog_articles`
--
ALTER TABLE `blog_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `forum_posts`
--
ALTER TABLE `forum_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `forums_answers`
--
ALTER TABLE `forums_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `forums_comments`
--
ALTER TABLE `forums_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `forums_likes`
--
ALTER TABLE `forums_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `friend_request`
--
ALTER TABLE `friend_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `my_friends`
--
ALTER TABLE `my_friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
