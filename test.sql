-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mar. 19 fév. 2019 à 18:28
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `test`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=``@`%` PROCEDURE `AddGeometryColumn` (`catalog` VARCHAR(64), `t_schema` VARCHAR(64), `t_name` VARCHAR(64), `geometry_column` VARCHAR(64), `t_srid` INT)  begin
  set @qwe= concat('ALTER TABLE ', t_schema, '.', t_name, ' ADD ', geometry_column,' GEOMETRY REF_SYSTEM_ID=', t_srid); PREPARE ls from @qwe; execute ls; deallocate prepare ls; end$$

CREATE DEFINER=``@`%` PROCEDURE `DropGeometryColumn` (`catalog` VARCHAR(64), `t_schema` VARCHAR(64), `t_name` VARCHAR(64), `geometry_column` VARCHAR(64))  begin
  set @qwe= concat('ALTER TABLE ', t_schema, '.', t_name, ' DROP ', geometry_column); PREPARE ls from @qwe; execute ls; deallocate prepare ls; end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `actualites`
--

CREATE TABLE `actualites` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sentence` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `date` datetime DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `actualites`
--

INSERT INTO `actualites` (`id`, `title`, `sentence`, `content`, `date`, `author_id`, `category_id`) VALUES
(1, 'Origines du projet', 'J\'ai été \"trader\", opérateur de marché financier, pendant 7 ans. ', 'Il a été \"trader\", opérateur de marché financier, pendant 7 ans. \r\nA la mort de sa mère, il a effectué un voyage initiatique dans le nord du Canada. Il s\'est ensuite installé à Montréal.\r\n\r\nDans le grand nord, il a été confronté à l\'idée de l\'absurdité de la vie. Ce grand cycle que l\'on subit. Il y a ressenti le besoin de s\'extraire de la cité pour mieux percevoir l\'essentiel. Nous n\'avons que peu de temps sur Terre pour apporter le meilleur à notre prochain et à cette petite planète bleue.\r\n\r\nAvec \"Un billet pour l\'Alaska\", il a mis dans une aventure fictive son parcours initiatique à travers le  personnage riche qu\'est Anna Jakin.', '2018-12-11 15:39:32', 2, 2),
(2, 'Rencontre - Signature au salon du livre à Paris', 'Jean Forteroche sera présent au prochain Salon du livre à Paris.', 'Jean Forteroche a écrit son dernier roman dans un seul et unique but, aller à la rencontre de son public.\r\n\r\nIl tenait à ce que son roman soit le support de discussion pour que les gens puissent lui évoquer leurs expériences de vie quant à leurs épisodes d\'isolements méditatifs.', '2018-12-11 15:44:00', 2, 2),
(17, 'LECTURE SIGNATURE', 'Le froid arrive à la FNAC Montparnasse !', '<p>Jean Forteroche sera en d&eacute;dicace &agrave; la <strong>FNAC Montparnasse</strong> le <strong>22 f&eacute;vrier 2019</strong>, &agrave; partir de <strong>16h00</strong>.</p><p>Il lira quelques passages de son nouveau roman&nbsp;<em>Un billet pour l\'Alaska.</em></p>', '2019-01-13 23:56:13', 2, 2),
(18, 'CAFE DE FLORE', 'Une rencontre exclusive  aura lieu dans un lieu historique.', '<p>Jean Forteroche va boire un th&eacute; avec vous le<strong> 25 f&eacute;vrier 2019</strong> &agrave; partir de <strong>15h00</strong> au <strong>Caf&eacute; de Flore</strong>.<br />Une interview exclusive y aura lieu avec la journaliste <strong>Mina Tennenbaum</strong> pour la <strong>radio FIP</strong> &agrave; partir de <strong>16h30</strong>.<br /><strong>R&eacute;servez</strong> votre place &agrave; cette adresse mail <strong>annadesnos@badassagency.com</strong>&nbsp;<br />Anna Desnos</p>', '2019-01-14 19:10:21', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sentence` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `date` datetime DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `Acommentaires` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `sentence`, `content`, `date`, `author_id`, `category_id`, `Acommentaires`) VALUES
(1, 'Enfance', 'Il n\'avait jamais été question qu\'elle devienne analyste financier durant son enfance. Elle avait toujours clamé haut et fort qu\'elle voulait travailler pour la NASA.', 'Il n\'avait jamais été question qu\'elle devienne analyste financier durant son enfance. Elle avait toujours clamé haut et fort qu\'elle voulait travailler pour la NASA.\r\nElle avait imaginé pouvoir rentrer dans le cercle des humains qui ont été en orbite autour de la Terre.\r\nTrès vite, elle avait déchanté en se baladant dans les rayons jouets des supermarchés. Tous les jouets scientifiques  étaient en bleu avec, en général, une représentation d\'un garçon aux yeux bleus.\r\n\r\nAujourd\'hui, les choses évoluent et changent mais elle avait été élevée à une autre époque. \"Elevée\", à l\'évocation de ce participe passé, Anna Jakin avait l\'impression d\'avoir grandie dans un élevage de poules avec ses deux soeurs.', '2018-12-11 15:23:06', 1, 1, NULL),
(2, 'Un grand pas pour la femme', 'Aujourd\'hui, les choses avaient évoluées et changées mais elle avait été élevée à une autre époque.', 'Aujourd\'hui, les choses avaient évoluées et changées mais elle avait été élevée à une autre époque. \"Elevée\", à l\'évocation de ce participe passé, Anna Jakin avait l\'impression d\'avoir grandie dans un élevage de poules avec ses deux soeurs.\r\n\r\nElle n\'était pas très féministe.\r\nPas dans le sens moderne du terme.\r\nDans ce domaine, elle était plus proche d\'une personne telle que Denise Bombardier, féministe de la première heure des années 80 qui n\'avait pas besoin d\'exposer ses seins mais ses idées afin de défendre sa cause.\r\n\r\nUn serveur chinois lui avait prédit un soir qu\'elle serait une grande scientifique mais pas comme elle l\'avait espéré. Elle avait souvent imaginé ce que serait de dormir dans le ciel avec la terre comme horizon.\r\n\r\nCeux qui avaient vu la Terre au bord d\'une capsule spatiale avaient l\'air changés au plus profond de leur âme. Elle le devinait à chaque video youtube postée par la NASA. Ces personnes avaient quelque chose de plus dans le regard, un pétillement.', '2018-12-11 15:25:34', 1, 1, NULL),
(3, 'Réalité', 'Il n\'y avait aucun lien avec les étoiles dans le travail qui lui avait été confié aujourd\'hui. Il était question d\'analyser la santé financière d\'une start-up qui recyclait des repas bio à la limite de la date de péremption.', 'Il n\'y avait aucun lien avec les étoiles dans le travail qui lui avait été confié aujourd\'hui. Il était question d\'analyser la santé financière d\'une start-up qui recyclait des repas bio à la limite de la date de péremption.  Le fond la touchait mais la manière d\'estimer une telle boîte lui déplaisait surtout si la tâche était commanditée par Antoine, son supérieur, cynique, cocaïnomane, pervers et \'trumpist-juste-pour-la-provoc\'.\r\n\r\nAntoine se tenait devant elle, l\'air faussement intelligent, la narine encore farineuse. Il disait qu\'il leur faudrait \'torcher\' cette analyse pour ce genre de boîte \'foireuse\' qui empêche le vrai travail. Il reniflait par intermittence. A l\'intérieur d\'elle-même, Anna souriait car elle savait que le liquide qui coulait du nez d\'Antoine n\'était qu\'une réacton directe du cerveau car les cristaux de cocaine détruisaient la cloison nasale avant d\'atteindre directement le cerveau. Cette drogue ne passait quasiment pas par les poumons. Au rythme où il en prenait, elle savait que la maladie du cerveau d\'Antoine se déclarerait vite. Elle en serait vite débarrassée.', '2018-12-11 15:29:24', 1, 1, NULL),
(4, 'A la recherche des étoiles', 'Elle se mit dans un mode d\'écoute-absence. Il lui parlait et avait l\'impression qu\'elle écoutait.', 'Elle se mit dans un mode d\'écoute-absence. Il lui parlait et avait l\'impression qu\'elle écoutait.\r\n\r\nElle se rappelait du premier téléscope que son père lui avait offert quand ils habitaient dans les hauteurs de Sèvres, à la périphérie de Paris.\r\n\r\nSon père lui avait montré qu\'il y avait autre chose derrrière la voie lactée. Elle avait saisi, ce soir là, que même un grain de sable comparé à tout le sable du monde ne pourrait jamais décrire la place de la Terre par rapport au reste de l\'univers.\r\nQuand elle avait des soucis, elle relativisait souvent en comparant son problème à ce qui se cachait au-delà de la voie lactée.', '2018-12-11 15:34:16', 1, 1, NULL),
(5, 'Le voyage', 'Voyager, c\'était la graine que le père d\'Anna avait semé en son coeur de petite fille peureuse.', 'Voyager, c\'était la graine que le père d\'Anna avait semé en son coeur de petite fille peureuse. Il lui faudrait un jour voyager au dehors pour voyager dans les contrées de son âme.\r\nElle était le mouvement et ses pensées étaient son vaisseau. Dans le RER de la Défense Grande Arche qui la menait chez elle, à Chaville, ces idées tourbillaient sans cesse. Elle savait que ce jour arriverait, le jour du départ.\r\n\r\nElle le savait depuis la mort de son père, parti il y a deux ans, emporté par un furieux cancer des poumons.\r\nElle était bien âcre, avec le recul, cette douce odeur de tabac parfumé à la vanille qui émanait de la pipe de son père.\r\nElle avait posé sa pipe en cerisier sur le cercueil de son père.\r\nIl ne fumerait plus dans sa bibliothèque.\r\nLa fumée, la matière, l\'atome, les protons, les neutrons, le boson de Higgs...\r\nElle s\'était vue, pendant les funérailles, dire dans un murmure qu\'elle seule pouvait entendre, qu\'elle partirai pour imaginer une théorie qui unifierait le monde quantique et le monde macroscopique.\r\nL\'Alaska l\'attendait pour cette retraite méditative.', '2018-12-11 15:35:49', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `secret` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `authors`
--

INSERT INTO `authors` (`id`, `firstname`, `lastname`, `password`, `email`, `secret`) VALUES
(1, 'Jean', 'Forteroche', 'jf74094d43910033275e6d69a9ff05abe731ce623131', 'srinath@srinath.fr', '247720bff8b2155d891925009b0bb29fe022024a'),
(2, 'Anna', 'Desnos - Agent Littéraire', 'ActualiteAnnaDesnos', 'veejayseye@gmail.com', 'b42b33ace6f4a32d9db8d0d82b1f91b8e9e02951');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Roman'),
(2, 'Actualités');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` datetime DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `article_id` int(11) NOT NULL,
  `approved` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `content`, `date`, `nom`, `article_id`, `approved`) VALUES
(56, 'Joli pas pour la femme.', '2019-01-13 14:32:32', 'Simone de Beauvoir', 2, 1),
(57, 'C\'est beau l\'enfance!', '2019-01-13 14:35:50', 'Tom Sawyer', 1, 0),
(62, 'Le boson de Higgs, la particule de Dieu!\r\nBelle introduction.\r\nMerci pour votre travail remarquable.', '2019-01-13 23:44:58', 'Hugh Everett', 5, 1),
(63, 'J\'aime le silence dans vos histoires.', '2019-01-14 00:02:45', 'Emmanuelle Devos', 4, 1),
(64, 'J\'aime Trump et je ne vois pas pourquoi on le mélange à toutes les sauces.\r\nC\'est une personne élue, il faut la respecter.', '2019-01-14 00:12:04', 'MLP', 3, 1),
(78, 'TADATADA', '2019-02-19 10:38:39', 'FISH and F1SH', 5, 0);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `nom`, `email`, `telephone`, `content`, `date`) VALUES
(2, 'Batman', 'btm@gmail.com', '0797877767', 'Je peux vous sauver.', '2019-01-06 12:43:31'),
(3, 'Jacques Mesrine', 'jacquesmesrine@gmail.com', '0777889966', 'Je n\'ai pas aimé la biographie qu\'on a faite de moi.\r\nPourriez-vous traiter mon histoire.\r\nCordialement', '2019-01-06 12:48:18'),
(6, 'Superman', 'superman@gmail.com', '077777777777', 'Je n\'ai pas aimé le passage sur la kriptonite.\r\nMerci de le rectifier.', '2019-01-06 13:00:06'),
(7, 'Sam Cooke', 'samcooke@gmail.com', '01122334455', 'J\'aimerai faire une chanson avec votre roman.', '2019-01-06 14:49:01'),
(13, 'Wade Watts', 'wadewatts@gmail.com', '0148352745', 'I am working in the oasis. \r\nCan you help me build it better?\r\nWade', '2019-01-07 01:54:58');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actualites`
--
ALTER TABLE `actualites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actualites`
--
ALTER TABLE `actualites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
