-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 07 Décembre 2015 à 01:50
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `blog`
--

INSERT INTO `blog` (`id`, `id_user`, `name`, `theme`, `url_alias`, `description`, `picture_path`) VALUES
(4, 7, 'Blog de la fac', 'informations', 'master2-info-um2', 'blog d''informations des masters 2 informatique de l''UM2', '32a398575e2e830f8df9af41a35f1517f30bc049.png'),
(18, 8, 'Musique', 'Blog sur la musique', 'musique', 'Blog concernant tout ce qui concerne la musique. Venez discuter de tout entre passionnés!! =)', NULL),
(19, 9, 'Tout pour la cuisine', 'La cuisine dans tout ses état!!', 'cuisine', 'Venez découvrir de bons petits plats et épatez vos amis!!', NULL),
(20, 7, 'Astronomie', 'Tout ce qui concerne l''astronomie', 'astro', 'Découvrez notre univers!!', 'd4b96916a9ca874818a8b4ae134b2359fe0679d0.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_blog` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(44, 'Rock', 18),
(45, 'Classique', 18),
(46, 'Rap', 18),
(47, 'Reggae', 18),
(48, 'Metal', 18),
(50, 'Trance', 18),
(51, 'Entrees', 19),
(52, 'Plat', 19),
(53, 'Dessert', 19),
(54, 'Boisson', 19),
(56, 'Etoile', 20),
(57, 'Planete', 20);

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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `id_post`, `content`, `date_creation`, `id_user`) VALUES
(32, 79, 'Manque le lien lol', '2015-12-06 23:56:06', 7),
(33, 79, 'OUPS merci !!', '2015-12-06 23:57:14', 8),
(34, 75, 'Cours de symfony trop cool!!', '2015-12-07 00:04:20', 8),
(35, 9, 'NAAAAAAAAAAAAAAAAAAN :''(((', '2015-12-07 00:05:04', 8),
(36, 10, 'permettra de ?\r\n\r\nOn aimerait plus de clarté SVP', '2015-12-07 00:06:55', 8),
(37, 82, 'Hmmmm trop boonnnn!!!', '2015-12-07 00:15:18', 9),
(38, 75, 'Ouai trop sympa le prof en plus <3', '2015-12-07 00:16:16', 9),
(39, 83, 'Whouaaaaa', '2015-12-07 00:20:15', 7),
(40, 84, 'Oubliez pas la crème solaire lol!', '2015-12-07 00:22:07', 7),
(41, 86, 'Merci!', '2015-12-07 00:24:28', 7);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `surname`, `lastname`, `age`, `profile_picture_path`) VALUES
(7, 'test', 'test', 'test@test.com', 'test@test.com', 1, '7qny3t74n7k0ws0c4g8occ0cosw8kos', '$2y$13$7qny3t74n7k0ws0c4g8ocOlnORzBDptbm9tJEyhve/qD9ClsbZf.e', '2015-12-07 00:32:40', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'test prénom', 'test nom', 12, NULL),
(8, 'stacyqt', 'stacyqt', 'samfobis@gmail.com', 'samfobis@gmail.com', 1, 'ex2cufg04y04cw0k800so4sogg0800s', '$2y$13$ex2cufg04y04cw0k800soudeE7QH/YqNquDqwfplYf9Jh8.EOgPG2', '2015-12-06 23:56:42', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'samuel', 'fobis', 26, NULL),
(9, 'cyril', 'cyril', 'lignac@cuistot.fr', 'lignac@cuistot.fr', 1, 'q6k36jc8a348c8k0g040ok40cwoc08w', '$2y$13$q6k36jc8a348c8k0g040oeMe13XoJOnZZCarUNKVRdI96DsBXZH5.', '2015-12-07 00:08:40', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'cyril', 'Lignac', 38, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `post`
--

INSERT INTO `post` (`id`, `name`, `url_alias`, `content`, `date_creation`, `id_blog`, `id_category`) VALUES
(9, 'Devoirs à rendre !!', 'devoir', 'Le td sera a rendre par mail avant la fin de la semaine.\r\n\r\nMerci!!', '2015-11-02 00:50:02', 4, 1),
(10, 'Intitulé du projet', 'projet-301', 'Projet - Application de la mort qui tue\r\n\r\nVous devez développer une application qui permettra de...\r\n\r\nMerci!!', '2015-11-02 00:51:48', 4, 1),
(74, 'Stage recherche', 'rec', 'Bonsoir,\r\n\r\nPour rappel, la réunion pour les stage recherche aura lieu mercredi.\r\nN''oubliez pas de vous inscrire sur le sondage suivant si vous etes interessez:\r\nhttps://framadate.org/fRhjcdTkowVT29IF\r\n\r\nEnfin, la liste des sujets de stages sera disponible d''ici peu là:\r\nhttps://info-web.lirmm.fr/collorg/28e27ffa-d95a-4203-872a-29b31eb7c8b1\r\n\r\nA mercredi (ou pas),', '2015-12-06 23:35:17', 4, 17),
(75, 'Reunion fin de semestre', 'reunion', 'Bonjour à tous,\r\n\r\nLa réunion entre les délégués et les responsables du master approche, du coup\r\navez-vous des informations ou/et des questions à faire remonter ?\r\n\r\nN''hésitez pas à nous répondre par mail ou directement, nous prenons note de tout.', '2015-12-06 23:36:28', 4, 17),
(77, 'Rock am ring 2016', 'rar2016', 'Le concert ROCK AM RING de l''année 2016 est prévu pour le  wkd du 3-5 juin! Reservez vos places!!', '2015-12-06 23:52:31', 18, 44),
(79, 'GIMS en concert a carrefour', 'gimss', 'La vidéo du concert de gims a carrefour !!\r\n\r\nEDIT:https://www.youtube.com/watch?v=JO1VsJdswjY', '2015-12-06 23:57:45', 18, 46),
(80, 'Mickael Jackson en vie?', 'MJ', 'Mickael Jackson serait encore en vie?\r\n\r\nDiscutez en!', '2015-12-07 00:02:02', 18, 17),
(81, 'Soupe de Poisson', 'soupe', 'Voici la recette de la soupe de poisson !!\r\n\r\n\r\nPréparation:  15 mn\r\nCuisson:  40 mn\r\nTemps total:  55 mn\r\nNb de personnes: 8-10\r\n \r\nLES INGRÉDIENTS\r\n\r\n    Tous les restes, les arêtes, les parures de poissons ou crustacé que vous avez (pour moi c’était des restes de bar après avoir prélevé des filets\r\n    Légumes (cette liste par exemple ou ce que vous trouverez)\r\n    1 boite de bonnes tomates italiennes entières au jus\r\n    2 tomates fraiches\r\n    ¼ de fenouil\r\n    Deux gros oignons\r\n    Un poireau\r\n    Des hauts d’oignons verts\r\n    des petits oignons blancs\r\n    2 gousses d’ail\r\n    4 petites boites de safran en pistils\r\n    Des feuilles et tiges de basilic et persil plat\r\n    1 peu de vin blanc\r\n    Eau\r\n    1 feuille de laurier\r\n    du thym frais\r\n\r\nLA RECETTE\r\n\r\n    Ciselez tous les légumes grossièrement.\r\n    Préparez la soupe de poisson :\r\n    dans un faitout, versez un bon filet d’huile d’olive, puis faites revenir les légumes tous ensemble, excepté les tomates.\r\n    Puis ajoutez : vos parures et vos arêtes de poissons, les tomates fraiches et en boites, les pistils de safran et le thym et le laurier (Une feuille de laurier suffit).\r\n    Ajoutez un petit verre de vin blanc et mouillez à hauteur avec de l’eau.\r\n    Amenez à ébullition puis faites mijoter à feu doux pendant 30 minutes.\r\n    Passez la soupe, puis faites-la réduire jusqu’à consistance voulue. Vous pouvez la déguster avec des petits croutons de pain grillé et une bonne rouille relevée. C''est un délice.\r\n    Si vous souhaitez en faire un plat unique, vous pouvez pocher du poisson coupé en gros morceaux quelques minutes dans la soupe avant de la faire réduire, et servir cette soupe de poisson accompagnée de rouille délicieuse et de riz basmati par exemple.\r\n\r\n\r\n\r\n( Comment préparer une soupe de poisson en quelques minutes : cas pratique et principe en vidéo! Ce jour-là j’ai préparé ma soupe avec des restes de bar…C’était chez mon ami David Khayat, un long week-end, il avait prélevé les filets du poisson pour faire la fameuse recette de Christian Constant, filet de bar au caviar ! Excusez-nous pour le bruit et les fausses notes au piano, mais c’est du direct!', '2015-12-07 00:13:42', 19, 52),
(82, 'Glace au chorizo', 'chorizozo', '1 Allumez le gril du four. Coupez les poivrons en gros quartiers et épépinez-les. Posez-les sur la plaque de four, côté peau vers le haut et passez-les sous le gril jusqu’à ce que la peau brunisse. Enfermez les poivrons dans un sac plastique (type sac congélation). Laissez reposer environ 10 min.\r\n2 Pendant ce temps, ôtez la peau du chorizo et coupez-le en tout petits dés. Sortez les poivrons du sac et ôtez leur peau.\r\n3 Mixez les poivrons avec les tomates égouttées, 25 cl d''eau, la crème, le piment et le basilic effeuillé. Salez, poivrez. Ajoutez les dés de chorizo et placez en sorbetière. Faites prendre au congélateur au moins 4 h.\r\n4 Servez des boules de sorbet à l’apéritif avec des gressins.', '2015-12-07 00:14:56', 19, 53),
(83, 'Le soleil', 'soleil', 'Le Soleil est l’étoile du Système solaire. Dans la classification astronomique, c’est une étoile de type naine jaune, composée d’hydrogène (75 % de la masse ou 92 % du volume) et d’hélium (25 % de la masse ou 8 % du volume)9. Le Soleil fait partie de la galaxie appelée la Voie lactée et est situé à environ environ 8 kpc (?26 100 a.l.) du centre galactique. Autour de lui gravitent la Terre (à la vitesse de 30 km/s), sept autres planètes, au moins cinq planètes naines, de très nombreux astéroïdes et comètes et une bande de poussière. Le Soleil représente à lui seul 99,86 % de la masse du Système solaire ainsi constitué, Jupiter représentant plus des deux tiers du reste.\r\n\r\nL’énergie solaire transmise par le rayonnement solaire rend possible la vie sur Terre par apport d''énergie lumineuse (lumière) et d''énergie thermique (chaleur), permettant la présence d’eau à l’état liquide et la photosynthèse des végétaux. Les UV solaires contribuent à la désinfection naturelle des eaux de surfaces et à y détruire certaines molécules indésirables (quand l''eau n''est pas trop turbide)10. La polarisation naturelle de la lumière solaire (y compris de nuit après diffusion ou réflexion, par la Lune) ou par des matériaux tels que l’eau ou les cuticules végétales est utilisée par de nombreuses espèces pour s’orienter.\r\n\r\nLe rayonnement solaire est aussi responsable des climats et de la plupart des phénomènes météorologiques observés sur la Terre. En effet, le bilan radiatif global de la Terre est tel que la densité thermique à la surface de la Terre est en moyenne à 99,97 % ou 99,98 % d’origine solairenote 1. Comme pour tous les autres corps, ces flux thermiques sont continuellement émis dans l’espace, sous forme de rayonnement thermique infrarouge ; la Terre restant ainsi en « équilibre dynamique ».\r\n\r\nLe demi-grand axe de l’orbite de la Terre autour du Soleil, couramment appelé « distance de la Terre au Soleil », égal à 149 597 870 km1, est la définition originale de l’unité astronomique (ua). Il faut 8 minutes et 19 secondes pour que la lumière du Soleil parvienne jusqu’à la Terre11.', '2015-12-07 00:20:03', 20, 56),
(84, 'UY Scuti', 'UY-Scuti', 'UY Scuti est une supergéante rouge de la constellation de l''Écu de Sobieski, située à approximativement 2,9 kpc soit 9500 années-lumière de la Terre. C''est actuellement la plus grande étoile connue de l''univers, dépassant VY Canis Majoris. Si elle était placée au centre de notre système solaire, l''étoile engloutirait toutes les planètes jusqu''à Jupiter, son rayon n''est pas connu avec certitude mais il est possible qu''il puisse être plus grand que l''orbite de Saturne.\r\n\r\nCaractéristiques\r\n\r\nL''étoile est classée variable semi-régulière ayant une période de pulsation de 740 jours. Elle a une puissance bolométrique de 340 000 L?, la rendant l''une des étoiles les plus lumineuses de la galaxie.\r\n\r\nMalgré sa taille immense, UY Scuti n''est pas classée comme hypergéante. Il existe une classe de 0 sur la classification spectrale de Morgan-Keenan pour les hypergéantes, mais elle est exceptionnelle. Ces étoiles sont plus communément classées Ia-0, Ia+ ou même Iae, en étant basé uniquement sur les observations spectrales ; quant aux supergéantes rouges, elles reçoivent rarement ce genre de classifications spéciales supplémentaires. Une grande luminosité et/ou une grande taille ne permettent pas de définir une hypergéante. Cela requiert la détection des signatures spectrales de l''instabilité atmosphérique et une importante perte de masse. Dans le cas de UY Scuti, son spectre présente des raies spectrales de carbone, d''oxyde de silicium et d''eau, mais ne montre aucune raies spectrales d''oxygène, de néon ou d''autres éléments plus lourds, indiquant donc une perte de masse insuffisante. D''ailleurs, son emplacement sur le diagramme de Hertzsprung-Russell est en dessous de la région ovale des hypergéantes, ce qui la rend seulement classée comme supergéante rouge lumineuse.\r\nTaille\r\n\r\nEn été 2012, des astronomes du VLT au Chili ont mesuré les paramètres de trois étoiles du centre galactique : UY Scuti, AH Scorpii et KW Sagitarii. Ils ont observé que ces astres sont 1 000 fois plus grands que le Soleil, les rendant étoiles faisant parties des plus grandes connues. Leurs tailles ont été mesurées avec le rayon de Rosseland, l''emplacement où l''épaisseur optique est égale à 1 (quelquefois une valeur différente, par exemple 2/3).\r\n\r\nUY Scuti était la plus grande étoile des trois, avec un rayon de 1 708 ± 192 R?. Le rayon de cette étoile est donc le rayon stellaire le plus grand jamais observé, environ 2 fois la taille de la célèbre Bételgeuse. UY Scuti est si gigantesque que si la Terre avait le diamètre d''un ballon de plage de 20 cm, le Soleil mesurerait 22 m (la hauteur de la statue d''El Cristo de las Noas au Mexique) et UY Scuti aurait un diamètre d''environ 40 km (environ 48 fois la hauteur de la Burj Khalifa).', '2015-12-07 00:21:34', 20, 56),
(85, 'Jupiter', 'Jupiter', 'Jupiter est une planète géante gazeuse. Il s''agit de la plus grosse planète du Système solaire, plus volumineuse et massive que toutes les autres planètes réunies, et la cinquième planète par sa distance au Soleil (après Mercure, Vénus, la Terre et Mars).\r\n\r\nJupiter est ainsi officiellement désignée1, en français comme en anglais2, d''après le dieu romain Jupiter3, assimilé au dieu grec Zeus.\r\n\r\nLe symbole astronomique de la planète était « ? » qui serait une représentation stylisée du foudre de Jupiter ou bien serait dérivé d''un hiéroglyphe4 ou, comme cela ressortirait de certains papyrus d''Oxyrhynque5, de la lettre grecque zêta, initiale du grec ancien ???? (Zeús). L''Union astronomique internationale recommande de substituer au symbole astronomique « ? » l''abréviation « J », correspondant à la lettre capitale J de l''alphabet latin, initiale de l''anglais Jupiter6.\r\n\r\nVisible à l''œil nu dans le ciel nocturne, Jupiter est habituellement le quatrième objet le plus brillant de la voûte céleste, après le Soleil, la Lune et Vénus7. Parfois, Mars apparaît plus lumineuse que Jupiter et de temps en temps Jupiter apparaît plus lumineuse que Vénus8. Jupiter était au périhélie le 17 mars 20119 et sera à l''aphélie le 17 février 201710.\r\n\r\nComme sur les autres planètes gazeuses, des vents violents, de près de 600 km/h, parcourent les couches supérieures de la planète. La Grande Tache rouge, un anticyclone qui fait trois fois la taille de la Terre, est une zone de surpression qui est observée au moins depuis le XVIIe siècle.\r\n\r\nRegroupant Jupiter et les objets se trouvant dans sa sphère d''influence, le système jovien est une composante majeure du Système solaire externe. Il comprend notamment les nombreuses lunes de Jupiter dont les quatre lunes galiléennes — Io, Europe, Ganymède et Callisto — qui, observés pour la première fois, en 1610, par Galilée au moyen d''une lunette astronomique de son invention, sont les premiers objets découverts par l''astronomie télescopique. Il comprend aussi les anneaux de Jupiter, un système d''anneaux planétaires observés pour la première fois, en 1979, par la sonde spatiale américaine Voyager 1.\r\n\r\nL''influence de Jupiter s''étend, au-delà du système jovien, à de nombreux objets dont les astéroïdes troyens de Jupiter.\r\n\r\nLa masse jovienne est une unité de masse utilisée pour exprimer la masse d''objets substellaires tels que les naines brunes.', '2015-12-07 00:23:14', 20, 57),
(86, 'Document', 'doc', 'Bonjour,\r\n\r\nVous trouverez à l''extrémité de ce lien :\r\n\r\nhttps://www.dropbox.com/sh/5cbvugqe3oz1fwk/AACR2m1TsuY8pY7aq__5YAQpa?dl=0\r\n\r\nles documents de cours et TP du cours d''aujourd''hui sur les lignes de produits.\r\n\r\nLa suite du TP donnera lieu à l''un des projets personnels pour l''évaluation du module pour ceux qui seront intéressés.\r\n\r\nBien cordialement,\r\nMarianne Huchard', '2015-12-07 00:24:16', 4, 6),
(87, 'Cephei', 'cephei', 'VV Cephei est une étoile binaire à éclipses située dans la constellation de Céphée à environ 3 000 années-lumière de la Terre. Elle contient une hypergéante rouge, VV Cephei A, qui est l''une des étoiles les plus grandes actuellement connues\r\n\r\nVV Cephei A\r\n\r\nVV Cephei A, l''hypergéante rouge, est de type spectral M2 et son diamètre est environ 1 900 fois plus important que celui du Soleil[réf. nécessaire], ce qui fait environ 2 650 000 000 km de diamètre ; si elle était située à la place du Soleil dans le système solaire, elle s''étendrait jusqu''à l''orbite de Saturne. Sa luminosité est comprise entre 275 000 et 575 000 luminosité solaire. Sa masse est inconnue : estimée à partir de ses caractéristiques orbitales, elle serait de 100 masses solaires ; à partir de sa luminosité, entre 25 et 40 masses solaires.\r\n\r\nLorsque VV Cephei A est au plus proche de son compagnon, elle remplit totalement son lobe de Roche et perd de la matière au profit de VV Cephei B.\r\n\r\n\r\nVV Cephei B\r\n\r\nVV Cephei B est une étoile bleue de la séquence principale, de type spectral B0. Elle est environ 10 fois plus grande que le Soleil et 100 000 fois plus lumineuse.', '2015-12-07 00:29:38', 20, 56),
(88, 'pagination savior', 'ps', 'Pour ne pas passer à coter de la pagination, c''est quand même assez sexy', '2011-11-11 11:11:11', 4, 10);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT pour la table `fos_user`
--
ALTER TABLE `fos_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=89;
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
ADD CONSTRAINT `FK_64C19C14B354D41` FOREIGN KEY (`id_blog`) REFERENCES `blog` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
ADD CONSTRAINT `FK_9474526C6B3CA4B` FOREIGN KEY (`id_user`) REFERENCES `fos_user` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_9474526CD1AA708F` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
ADD CONSTRAINT `FK_5A8A6C8D4B354D41` FOREIGN KEY (`id_blog`) REFERENCES `blog` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_5A8A6C8D5697F554` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
