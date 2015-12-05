-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 05 Décembre 2015 à 18:54
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
`id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `theme` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `url_alias` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `picture_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `blog`
--

INSERT INTO `blog` (`id`, `id_user`, `name`, `theme`, `url_alias`, `description`, `picture_path`) VALUES
(4, 7, 'Blog de la fac', 'informations', 'master2-info-um2', 'blog d''informations des masters 2 informatique de l''UM2', '32a398575e2e830f8df9af41a35f1517f30bc049.png'),
(13, 7, 'test', 'test thème', 'test-url', 'test description', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_blog` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `nom`, `id_blog`) VALUES
(1, 'HMIN301', 4),
(2, 'HMIN302', 4),
(3, 'HMIN303', 4),
(4, 'HMIN304', 4),
(5, 'HMIN305', 4),
(6, 'HMIN306', 4),
(7, 'HMIN307', 4),
(8, 'HMIN308', 4),
(10, 'HMIN309', 4),
(11, 'HMIN310', 4),
(12, 'HMIN311', 4),
(17, 'general', NULL),
(38, 'test-categorie', 13);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
`id` int(11) NOT NULL,
  `id_post` int(11) DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `date_creation` datetime NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `id_post`, `content`, `date_creation`, `id_user`) VALUES
(2, 72, 'sgdgdfdfg', '2015-12-04 23:12:25', 7),
(4, 72, 'test', '2015-12-04 23:15:55', 7),
(5, 72, 'test', '2015-12-04 23:16:05', 7),
(6, 72, 'test', '2015-12-04 23:18:04', 7),
(7, 72, 'test', '2015-12-04 23:18:15', 7),
(8, 72, 'sdfsdf', '2015-12-04 23:21:12', 7),
(9, 72, 'sdfsdf', '2015-12-04 23:21:20', 7),
(10, 72, 'tyrty', '2015-12-04 23:23:15', 7),
(11, 72, 'tyrty', '2015-12-04 23:23:33', 7),
(12, 72, 'tyrty', '2015-12-04 23:23:45', 7),
(13, 72, 'jfgjhgh', '2015-12-04 23:24:18', 7),
(14, 72, 'jfgjhgh', '2015-12-04 23:24:26', 7),
(28, 72, 'ytuityu', '2015-12-05 18:32:41', 7),
(29, 72, 'uiopiop', '2015-12-05 18:32:50', 7),
(30, 72, 'zerzer', '2015-12-05 18:33:03', 7);

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

CREATE TABLE IF NOT EXISTS `fos_user` (
`id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `profile_picture_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `surname`, `lastname`, `age`, `profile_picture_path`) VALUES
(7, 'test', 'test', 'test@test.com', 'test@test.com', 1, '7qny3t74n7k0ws0c4g8occ0cosw8kos', '$2y$13$7qny3t74n7k0ws0c4g8ocOlnORzBDptbm9tJEyhve/qD9ClsbZf.e', '2015-12-05 17:46:43', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'test prénom', 'test nom', 12, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `url_alias` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `date_creation` datetime NOT NULL,
  `id_blog` int(11) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `post`
--

INSERT INTO `post` (`id`, `name`, `url_alias`, `content`, `date_creation`, `id_blog`, `id_category`) VALUES
(7, 'Pas de cours lundi 02/11', '0211', 'Il n''y aura pas de cours ce lundi 02 novembre.\r\n\r\nMerci', '2015-11-02 00:48:14', 4, 1),
(8, 'Cours retardé d''une heure', '02-11-15', 'ddd', '2015-11-02 00:49:12', 4, 1),
(9, 'Devoirs à rendre !!', 'devoir', 'Le td sera a rendre par mail avant la fin de la semaine.\r\n\r\nMerci!!', '2015-11-02 00:50:02', 4, 1),
(10, 'Intitulé du projet', 'projet-301', 'Projet - Application de la mort qui tue\r\n\r\nVous devez développer une application qui permettra de...\r\n\r\nMerci!!', '2015-11-02 00:51:48', 4, 1),
(11, 'fdef', 'kappa', 'Databases and Doctrine\r\n2.7 version\r\nedit this page\r\n\r\nOne of the most common and challenging tasks for any application involves persisting and reading information to and from a database. Although the Symfony full-stack Framework doesn''t integrate any ORM by default, the Symfony Standard Edition, which is the most widely used distribution, comes integrated with Doctrine, a library whose sole goal is to give you powerful tools to make this easy. In this chapter, you''ll learn the basic philosophy behind Doctrine and see how easy working with a database can be.\r\n\r\nDoctrine is totally decoupled from Symfony and using it is optional. This chapter is all about the Doctrine ORM, which aims to let you map objects to a relational database (such as MySQL, PostgreSQL or Microsoft SQL). If you prefer to use raw database queries, this is easy, and explained in the "How to Use Doctrine DBAL" cookbook entry.\r\n\r\nYou can also persist data to MongoDB using Doctrine ODM library. For more information, read the "DoctrineMongoDBBundle" documentation.\r\nA Simple Example: A Product¶\r\n\r\nThe easiest way to understand how Doctrine works is to see it in action. In this section, you''ll configure your database, create a Product object, persist it to the database and fetch it back out.\r\nConfiguring the Database¶\r\n\r\nBefore you really begin, you''ll need to configure your database connection information. By convention, this information is usually configured in an app/config/parameters.yml file:\r\n\r\n1\r\n2\r\n3\r\n4\r\n5\r\n6\r\n7\r\n8\r\n9\r\n\r\n	\r\n\r\n# app/config/parameters.yml\r\nparameters:\r\n    database_driver:    pdo_mysql\r\n    database_host:      localhost\r\n    database_name:      test_project\r\n    database_user:      root\r\n    database_password:  password\r\n\r\n# ...\r\n\r\nDefining the configuration via parameters.yml is just a convention. The parameters defined in that file are referenced by the main configuration file when setting up Doctrine:\r\n\r\n    YAML\r\n\r\n    1\r\n    2\r\n    3\r\n    4\r\n    5\r\n    6\r\n    7\r\n    8\r\n\r\n    	\r\n\r\n    # app/config/config.yml\r\n    doctrine:\r\n        dbal:\r\n            driver:   "%database_driver%"\r\n            host:     "%database_host%"\r\n            dbname:   "%database_name%"\r\n            user:     "%database_user%"\r\n            password: "%database_password%"\r\n\r\n    XML\r\n    PHP\r\n\r\nBy separating the database information into a separate file, you can easily keep different versions of the file on each server. You can also easily store database configuration (or any sensitive information) outside of your project, like inside your Apache configuration, for example. For more information, see How to Set external Parameters in the Service Container.\r\n\r\nNow that Doctrine knows about your database, you can have it create the database for you:\r\n\r\n1\r\n\r\n	\r\n\r\n$ php app/console doctrine:database:create\r\n\r\nSetting up the Database to be UTF8\r\n\r\nOne mistake even seasoned developers make when starting a Symfony project is forgetting to set up default charset and collation on their database, ending up with latin type collations, which are default for most databases. They might even remember to do it the very first time, but forget that it''s all gone after running a relatively common command during development:\r\n\r\n1\r\n2\r\n\r\n	\r\n\r\n$ php app/console doctrine:database:drop --force\r\n$ php app/console doctrine:database:create\r\n\r\nThere''s no way to configure these defaults inside Doctrine, as it tries to be as agnostic as possible in terms of environment configuration. One way to solve this problem is to configure server-level defaults.\r\n\r\nSetting UTF8 defaults for MySQL is as simple as adding a few lines to your configuration file (typically my.cnf):\r\n\r\n1\r\n2\r\n3\r\n4\r\n\r\n	\r\n\r\n[mysqld]\r\n# Version 5.5.3 introduced "utf8mb4", which is recommended\r\ncollation-server     = utf8mb4_general_ci # Replaces utf8_general_ci\r\ncharacter-set-server = utf8mb4            # Replaces utf8\r\n\r\nWe recommend against MySQL''s utf8 character set, since it does not support 4-byte unicode characters, and strings containing them will be truncated. This is fixed by the newer utf8mb4 character set.\r\n\r\nIf you want to use SQLite as your database, you need to set the path where your database file should be stored:\r\n\r\n    YAML\r\n\r\n    1\r\n    2\r\n    3\r\n    4\r\n    5\r\n    6\r\n\r\n    	\r\n\r\n    # app/config/config.yml\r\n    doctrine:\r\n        dbal:\r\n            driver: pdo_sqlite\r\n            path: "%kernel.root_dir%/sqlite.db"\r\n            charset: UTF8\r\n\r\n    XML\r\n    PHP\r\n\r\nCreating an Entity Class¶\r\n\r\nSuppose you''re building an application where products need to be displayed. Without even thinking about Doctrine or databases, you already know that you need a Product object to represent those products. Create this class inside the Entity directory of your AppBundle:\r\n\r\n1\r\n2\r\n3\r\n4\r\n5\r\n6\r\n7\r\n8\r\n9\r\n\r\n	\r\n\r\n// src/AppBundle/Entity/Product.php\r\nnamespace AppBundle\\Entity;\r\n\r\nclass Product\r\n{\r\n    protected $name;\r\n    protected $price;\r\n    protected $description;\r\n}\r\n\r\nThe class - often called an "entity", meaning a basic class that holds data - is simple and helps fulfill the business requirement of needing products in your application. This class can''t be persisted to a database yet - it''s just a simple PHP class.\r\n\r\nOnce you learn the concepts behind Doctrine, you can have Doctrine create simple entity classes for you. This will ask you interactive questions to help you build any entity:\r\n\r\n1\r\n\r\n	\r\n\r\n$ php app/console doctrine:generate:entity\r\n\r\nAdd Mapping Information¶\r\n\r\nDoctrine allows you to work with databases in a much more interesting way than just fetching rows of a column-based table into an array. Instead, Doctrine allows you to persist entire objects to the database and fetch entire objects out of the database. This works by mapping a PHP class to a database table, and the properties of that PHP class to columns on the table:\r\n../_images/doctrine_image_1.png\r\n\r\nFor Doctrine to be able to do this, you just have to create "metadata", or configuration that tells Doctrine exactly how the Product class and its properties should be mapped to the database. This metadata can be specified in a number of different formats including YAML, XML or directly inside the Product class via annotations:', '2015-11-02 14:01:10', 4, 1),
(18, 'Kapparino', 'kapparino', 'Hello Kodo', '2015-11-02 21:22:36', 4, 1),
(19, '\\o/ kek', 'oki', '$post_update->setName($form["name"]->getData());            $post_update->setUrlAlias($form["url_alias"]->getData());            $post_update->setContent($form["content"]->getData());            $em->flush', '2015-11-02 21:23:14', 4, 1),
(71, 'test-article', 'test-url-article', 'test article content', '2015-12-03 15:41:18', 13, 38),
(72, 'test de titre d''article super long test de titre d''article super long test de titre d''article super long test de titre d''article super long test de titre d''article super long test de titre d''article s', 'a', 'test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long test d''article super long', '2015-12-03 15:52:16', 4, 1),
(73, 'azeaz', 'azeaze', 'azeazeaze', '2015-12-04 22:46:22', 4, 17);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `blog`
--
ALTER TABLE `blog`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_C01551435E237E06` (`name`), ADD UNIQUE KEY `UNIQ_C015514324C804E3` (`url_alias`), ADD KEY `IDX_C01551436B3CA4B` (`id_user`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_64C19C14B354D41` (`id_blog`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_9474526CD1AA708F` (`id_post`), ADD KEY `IDX_9474526C6B3CA4B` (`id_user`);

--
-- Index pour la table `fos_user`
--
ALTER TABLE `fos_user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`), ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_5A8A6C8D24C804E3` (`url_alias`), ADD KEY `IDX_5A8A6C8D4B354D41` (`id_blog`), ADD KEY `IDX_5A8A6C8D5697F554` (`id_category`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `blog`
--
ALTER TABLE `blog`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `fos_user`
--
ALTER TABLE `fos_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `blog`
--
ALTER TABLE `blog`
ADD CONSTRAINT `FK_C01551436B3CA4B` FOREIGN KEY (`id_user`) REFERENCES `fos_user` (`id`);

--
-- Contraintes pour la table `category`
--
ALTER TABLE `category`
ADD CONSTRAINT `FK_64C19C14B354D41` FOREIGN KEY (`id_blog`) REFERENCES `blog` (`id`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
ADD CONSTRAINT `FK_9474526C6B3CA4B` FOREIGN KEY (`id_user`) REFERENCES `fos_user` (`id`),
ADD CONSTRAINT `FK_9474526CD1AA708F` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
ADD CONSTRAINT `FK_5A8A6C8D4B354D41` FOREIGN KEY (`id_blog`) REFERENCES `blog` (`id`),
ADD CONSTRAINT `FK_5A8A6C8D5697F554` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
