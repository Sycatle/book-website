-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 19, 2022 at 09:55 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(10) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `author_slug` varchar(150) NOT NULL,
  `author_category_id` int(10) NOT NULL,
  `author_description` text NOT NULL,
  `author_biography` text NOT NULL,
  `author_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`, `author_slug`, `author_category_id`, `author_description`, `author_biography`, `author_birth`) VALUES
(1, 'J.K. Rowling', 'jk_rowling', 5, '', 'Joanne Rowling, plus connue sous les noms de plume J. K. Rowling et Robert Galbraith, est une romancière et scénariste britannique née le 31 juillet 1965 dans l\'agglomération de Yate.', '1965-07-31'),
(2, 'Stephen R. Covey', 'stephen-r-covey', 1, 'Stephen Richards Covey était un éducateur, auteur , homme d\'affaires et conférencier américain. ', 'Covey est née de Stephen Glenn Covey et d\'Irene Louise Richards Covey à Salt Lake City , Utah, le 24 octobre 1932. Louise était la fille de Stephen L Richards , apôtre et conseiller dans la première présidence de l\'Église de Jésus . Christ des saints des derniers jours sous David. McKay . Covey était le petit-fils de Stephen Mack Covey qui a fondé l\'original Little America Wyoming près de Granger, Wyoming. Il était athlétique dans sa jeunesse mais a souffert d\'une épiphyse fémorale capitale glissée au collège, l\'obligeant à se concentrer sur les universitaires et un membre de l\'équipe de débat et a obtenu son diplôme d\'études secondaires tôt. Covey a obtenu un baccalauréat ès sciences en administration des affaires de l\' Université de l\'Utah , un MBA de la Harvard Business School de l\'Université de Harvard et un doctorat en éducation religieuse (DRE) de l\'Université Brigham Young . Il était membre de la fraternité Pi Kappa Alpha . Il a reçu dix doctorats honorifiques .', '1932-10-24'),
(3, 'Daniel Goleman', 'daniel-goleman', 1, 'Daniel Goleman est un psychologue américain né le 7 mars 1946 à Stockton (Californie).', 'Il est diplômé de l\'université Harvard et docteur en psychologie clinique et développement personnel, puis devient journaliste au New York Times, où il suit particulièrement les sciences du comportement.  Il publie en 1995 l\'ouvrage Intelligence émotionnelle.  Il est membre du conseil d\'administration du Mind and Life Institute, qui facilite les rencontres entre la science et le bouddhisme. Il fait partie de l\'Association américaine pour le progrès de la science.', '1946-03-07'),
(4, 'Eckhart Tolle', 'eckhart-tolle', 1, 'Eckhart Tolle, de son vrai nom Ulrich Leonard Tolle, né le 16 février 1948 à Lünen (Allemagne), est un écrivain et conférencier canadien d\'origine allemande, auteur des best-sellers Le Pouvoir du moment présent et Nouvelle Terre.', 'Né à Lünen en Allemagne, en 1948, il déménage en Espagne, à l’âge de 13 ans, pour vivre avec son père. À 19 ans, Tolle part en Angleterre et, pendant 3 ans, enseigne l’allemand et l’espagnol dans une école de langues londonienne. Selon ses dires, souffrant de « dépression, d’anxiété et de peur », il commence à « chercher des réponses ». Vers l’âge de 22 ans, il décide de poursuivre ses recherches en étudiant la philosophie, la psychologie, la littérature, et s’inscrit à l’université de Londres. Son diplôme obtenu, il commence à faire de la recherche à l’université de Cambridge en 1977.', '1948-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(150) NOT NULL,
  `book_slug` varchar(100) NOT NULL,
  `book_author_id` int(10) NOT NULL,
  `book_description` text NOT NULL,
  `book_summary` text,
  `book_parution` int(4) NOT NULL,
  `book_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `book_slug`, `book_author_id`, `book_description`, `book_summary`, `book_parution`, `book_category_id`) VALUES
(1, 'Les 7 habitudes de ceux qui réalisent tout ce qu\'ils entreprennent', 'les-7-habitudes-de-ceux-qui-realisent-tout-ce-quils-entreprennent', 2, 'Je suis la grande description du livre', 'Je suis le résumé du livre', 1989, 1),
(5, 'Le pouvoir du moment présent', 'le-pouvoir-du-moment-present', 4, 'Le pouvoir du moment présent - Guide d\'éveil spirituel (The Power of Now: A Guide to Spiritual Enlightenment) est un livre d\'Eckhart Tolle paru en 1997, traduit en 33 langues et qui s\'est vendu à plus de 3 millions d\'exemplaires. Le livre est destiné à être un guide d\'auto-assistance de la vie quotidienne et souligne l\'importance de vivre dans le moment présent et d\'éviter de se perdre dans les pensées du passé ou du futur.', 'En premier lieu, Tolle parle de ce qu\'il pense être « faux » chez l\'humain, à savoir la nature de l\'inconscience et de la dysfonction.\r\n\r\nEn deuxième lieu, l\'auteur traite de la « transformation de la conscience humaine » qu\'il décrit comme étant « quelque chose de disponible dans l\'instant, peu importe qui vous êtes et où vous vous trouvez ».', 2022, 1),
(6, 'L\'intelligence émotionnelle', 'lintelligence-emotionnelle', 3, 'Dans ce livre, Daniel Goleman, docteur en psychologie, remet en cause la conception traditionnelle de l\'intelligence.', 'La conception traditionnelle de l\'intelligence néglige une part essentielle du comportement humain : les réactions émotionnelles. Le QI n\'est pas le seul critère ; il existe une autre forme d\'intelligence, l\'intelligence émotionnelle, que l\'on peut stimuler et développer dès l\'enfance. Refuser d\'écouter ses émotions peut entraîner une instabilité générale, alors que maîtrise de soi, motivation, respect d\'autrui sont autant de qualités pour réussir. Daniel Goleman nous invite à accepter nos émotions, pour développer une nouvelle forme d\'intelligence.', 2003, 1),
(7, 'Harry Potter, Tome 1: L\'école des sorciers', 'harry-potter-tome-1-lecole-des-sorciers', 1, 'Le jour de ses onze ans, Harry Potter, un orphelin élevé par un oncle et une tante qui le détestent, voit son existence bouleversée. Un géant vient le chercher pour l\'emmener à Poudlard, une école de sorcellerie ! Voler en balai, jeter des sorts, combattre les trolls : Harry se révèle un sorcier doué. Mais un mystère entoure sa naissance et l\'effroyable V., le mage dont personne n\'ose prononcer le nom.', 'Après la mort de ses parents (Lily et James Potter), Harry Potter est recueilli par sa tante maternelle Pétunia et son oncle Vernon à l\'âge d\'un an. Ces derniers, animés depuis toujours d\'une haine féroce envers les parents du garçon qu\'ils qualifient de gens « bizarres », voire de « monstres », traitent froidement leur neveu et demeurent indifférents aux humiliations que leur fils Dudley lui fait subir. Harry ignore tout de l\'histoire de ses parents, si ce n\'est qu\'ils ont été, semble-t-il, tués dans un accident de voiture. Cependant, le jour des onze ans de Harry, un demi-géant du nom de Rubeus Hagrid vient le chercher pour l\'informer de son inscription à Poudlard, une école de sorcellerie où il est inscrit depuis sa naissance, et lui remettre sa lettre. Il lui révèle qu’il a toujours été un sorcier, tout comme l\'étaient ses parents, tués en réalité par le plus puissant mage noir du monde de la sorcellerie : Voldemort (surnommé « Celui-Dont-On-Ne-Doit-Pas-Prononcer-Le-Nom », « Vous savez qui » ou « Tu sais qui »). Ce serait Harry lui-même, alors qu\'il n\'était encore qu\'un bébé, qui aurait fait ricocher le sortilège que Voldemort lui destinait, neutralisant ses pouvoirs et le réduisant à l\'état de créature insignifiante. Le fait d\'avoir vécu son enfance chez son oncle et sa tante dépourvus de pouvoirs magiques lui aurait permis de grandir à l\'abri de l\'admiration qu\'il suscite dans le monde des sorciers. Hagrid l\'accompagne ensuite sur le chemin de Traverse pour acheter sa baguette magique et ses fournitures scolaires. Le demi-géant en profite pour récupérer sur ordre de Dumbledore un mystérieux paquet à Gringotts, la banque des sorciers.\r\nHarry fait la connaissance de Ron Weasley et Hermione Granger dans le Poudlard Express, le train les conduisant à l\'école, et découvre rapidement l\'hostilité que semblent lui vouer le jeune Drago Malefoy et le professeur de potions Severus Rogue. À leur arrivée à Poudlard, les élèves sont répartis dans différentes maisons après avoir enfilé le « choixpeau » qui analyse leur personnalité : Harry, Ron et Hermione sont tous les trois répartis dans la maison Gryffondor.\r\nUn peu plus tard dans l\'année, les trois amis découvrent par hasard qu\'un immense chien à trois têtes est hébergé au sein même du château et semble garder quelque chose sous une trappe, sans doute l\'objet mystérieux que Hagrid a récupéré à la banque des sorciers juste avant la rentrée. Harry est persuadé que le professeur Rogue tente de faire diversion pour essayer de passer devant le chien à trois têtes et récupérer l\'objet en question, qui semble concerner Dumbledore et l\'un de ses amis, un certain Nicolas Flamel.\r\nLe jour de Noël, Harry découvre parmi ses cadeaux une cape d\'invisibilité ayant appartenu à son père James Potter. Il décide de s\'en servir, et pour éviter Rogue et Rusard qui se trouvent sur son chemin dans les couloirs, se cache dans une salle de classe désaffectée où il découvre un miroir étrange, le miroir du Riséd, ayant le pouvoir de montrer le désir le plus cher de la personne qui observe son reflet. Harry observe ainsi avec fascination ses parents disparus avec lesquels il peut interagir.\r\nHarry, Ron et Hermione comprennent que l\'objet si précieux caché sous la trappe est une pierre philosophale créée par Nicolas Flamel, et qui aurait le pouvoir d\'offrir l\'immortalité. Ils sont persuadés que Voldemort, par le biais du professeur Rogue, cherche à s\'en emparer. Pour récupérer la pierre en premier, Harry, Ron et Hermione passent sous la trappe gardée par le chien et franchissent une série d\'obstacles conçus par les plus talentueux professeurs de Poudlard. Dans la pièce de la dernière énigme, ce n\'est pas le professeur Rogue que retrouve Harry mais le professeur Quirrell, professeur de défense contre les forces du Mal, qui se tient devant le miroir du Riséd, placé là par Dumbledore.\r\nHarry est terrifié lorsque Quirrell déroule le turban violet qu\'il porte sur la tête : le couvre-chef dissimule en réalité le visage de Voldemort, formé à l\'arrière du crâne de Quirrell ; le mage noir avait « emprunté » le corps du professeur pour se rapprocher de la pierre cachée et pour lui transmettre plus aisément ses ordres. Harry parvient à récupérer la pierre grâce au miroir. Voldemort ordonne alors à Quirrell de tuer Harry mais Dumbledore s\'interpose in extremis.', 2011, 5),
(11, 'Harry Potter, Tome 1: L\'école des sorciers', 'harry-potter-tome-1-lecole-du-sorciers', 1, 'Le jour de ses onze ans, Harry Potter, un orphelin élevé par un oncle et une tante qui le détestent, voit son existence bouleversée. Un géant vient le chercher pour l\'emmener à Poudlard, une école de sorcellerie ! Voler en balai, jeter des sorts, combattre les trolls : Harry se révèle un sorcier doué. Mais un mystère entoure sa naissance et l\'effroyable V., le mage dont personne n\'ose prononcer le nom.', 'Après la mort de ses parents (Lily et James Potter), Harry Potter est recueilli par sa tante maternelle Pétunia et son oncle Vernon à l\'âge d\'un an. Ces derniers, animés depuis toujours d\'une haine féroce envers les parents du garçon qu\'ils qualifient de gens « bizarres », voire de « monstres », traitent froidement leur neveu et demeurent indifférents aux humiliations que leur fils Dudley lui fait subir. Harry ignore tout de l\'histoire de ses parents, si ce n\'est qu\'ils ont été, semble-t-il, tués dans un accident de voiture. Cependant, le jour des onze ans de Harry, un demi-géant du nom de Rubeus Hagrid vient le chercher pour l\'informer de son inscription à Poudlard, une école de sorcellerie où il est inscrit depuis sa naissance, et lui remettre sa lettre. Il lui révèle qu’il a toujours été un sorcier, tout comme l\'étaient ses parents, tués en réalité par le plus puissant mage noir du monde de la sorcellerie : Voldemort (surnommé « Celui-Dont-On-Ne-Doit-Pas-Prononcer-Le-Nom », « Vous savez qui » ou « Tu sais qui »). Ce serait Harry lui-même, alors qu\'il n\'était encore qu\'un bébé, qui aurait fait ricocher le sortilège que Voldemort lui destinait, neutralisant ses pouvoirs et le réduisant à l\'état de créature insignifiante. Le fait d\'avoir vécu son enfance chez son oncle et sa tante dépourvus de pouvoirs magiques lui aurait permis de grandir à l\'abri de l\'admiration qu\'il suscite dans le monde des sorciers. Hagrid l\'accompagne ensuite sur le chemin de Traverse pour acheter sa baguette magique et ses fournitures scolaires. Le demi-géant en profite pour récupérer sur ordre de Dumbledore un mystérieux paquet à Gringotts, la banque des sorciers.\r\nHarry fait la connaissance de Ron Weasley et Hermione Granger dans le Poudlard Express, le train les conduisant à l\'école, et découvre rapidement l\'hostilité que semblent lui vouer le jeune Drago Malefoy et le professeur de potions Severus Rogue. À leur arrivée à Poudlard, les élèves sont répartis dans différentes maisons après avoir enfilé le « choixpeau » qui analyse leur personnalité : Harry, Ron et Hermione sont tous les trois répartis dans la maison Gryffondor.\r\nUn peu plus tard dans l\'année, les trois amis découvrent par hasard qu\'un immense chien à trois têtes est hébergé au sein même du château et semble garder quelque chose sous une trappe, sans doute l\'objet mystérieux que Hagrid a récupéré à la banque des sorciers juste avant la rentrée. Harry est persuadé que le professeur Rogue tente de faire diversion pour essayer de passer devant le chien à trois têtes et récupérer l\'objet en question, qui semble concerner Dumbledore et l\'un de ses amis, un certain Nicolas Flamel.\r\nLe jour de Noël, Harry découvre parmi ses cadeaux une cape d\'invisibilité ayant appartenu à son père James Potter. Il décide de s\'en servir, et pour éviter Rogue et Rusard qui se trouvent sur son chemin dans les couloirs, se cache dans une salle de classe désaffectée où il découvre un miroir étrange, le miroir du Riséd, ayant le pouvoir de montrer le désir le plus cher de la personne qui observe son reflet. Harry observe ainsi avec fascination ses parents disparus avec lesquels il peut interagir.\r\nHarry, Ron et Hermione comprennent que l\'objet si précieux caché sous la trappe est une pierre philosophale créée par Nicolas Flamel, et qui aurait le pouvoir d\'offrir l\'immortalité. Ils sont persuadés que Voldemort, par le biais du professeur Rogue, cherche à s\'en emparer. Pour récupérer la pierre en premier, Harry, Ron et Hermione passent sous la trappe gardée par le chien et franchissent une série d\'obstacles conçus par les plus talentueux professeurs de Poudlard. Dans la pièce de la dernière énigme, ce n\'est pas le professeur Rogue que retrouve Harry mais le professeur Quirrell, professeur de défense contre les forces du Mal, qui se tient devant le miroir du Riséd, placé là par Dumbledore.\r\nHarry est terrifié lorsque Quirrell déroule le turban violet qu\'il porte sur la tête : le couvre-chef dissimule en réalité le visage de Voldemort, formé à l\'arrière du crâne de Quirrell ; le mage noir avait « emprunté » le corps du professeur pour se rapprocher de la pierre cachée et pour lui transmettre plus aisément ses ordres. Harry parvient à récupérer la pierre grâce au miroir. Voldemort ordonne alors à Quirrell de tuer Harry mais Dumbledore s\'interpose in extremis.', 2011, 5);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_slug` varchar(100) NOT NULL,
  `category_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_slug`, `category_description`) VALUES
(1, 'Développement personnel', 'developpement_personnel', 'Le développement personnel est un ensemble hétéroclite de pratiques, appartenant à divers courants de pensées, qui ont pour objectif l\'amélioration de la connaissance de soi, la valorisation des talents et potentiels, l\'amélioration de la qualité de vie personnelle, la réalisation de ses aspirations et de ses rêves.'),
(2, 'Classiques', 'classique', 'Quand un livre a résisté à l’épreuve du temps et est toujours d’actualité et de réflexion.'),
(3, 'Fiction Littéraire', 'fiction_litteraire', 'La fiction littéraire est souvent indirecte, dans leur thème et comprend une sorte d’analyse sur ce que signifie être humain.'),
(4, 'Fiction générale', 'fiction_general', 'Ces livres sont des histoires facilement attrayantes dans un cadre contemporain.\r\n\r\nIls sont plus accessibles que la Fiction littéraire et ne contiennent aucun des ingrédients spécifiques au genre sur lesquels reposent les autres catégories..'),
(5, 'Fantasy', 'fantasy', 'La fantasy est un genre artistique qui représente des phénomènes surnaturels imaginaires, souvent associés au mythe et souvent figurés par l\'intervention ou l\'emploi de la magie.'),
(6, 'Roman', 'roman', 'Le roman est un genre littéraire caractérisé essentiellement par une narration fictionnelle et dont la première apparition peut être datée du xiie siècle. Initialement écrit en vers qui jouent sur les assonances, il est écrit en prose dès le xiie siècle et se distingue du conte ou de l\'épopée par sa vocation à être lu individuellement et non écouté.');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `user_id` int(10) NOT NULL,
  `access_admin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`user_id`, `access_admin`) VALUES
(8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(10) NOT NULL,
  `post_type` varchar(10) NOT NULL,
  `post_user_id` int(10) NOT NULL,
  `post_allowed` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `quote_id` int(10) NOT NULL,
  `quote_text` varchar(255) NOT NULL,
  `quote_slug` varchar(255) NOT NULL,
  `quote_author_id` int(100) NOT NULL,
  `quote_category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`quote_id`, `quote_text`, `quote_slug`, `quote_author_id`, `quote_category_id`) VALUES
(1, 'La vie est un mystère qu\'il faut vivre, et non un problème à résoudre.', 'la_vie_est_un_mystere_qu_il_faut_vivre_et_non_un_probleme_a_resoudre', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user_lastname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user_username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user_email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user_password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user_biography` text CHARACTER SET utf8 NOT NULL,
  `user_gender` int(10) NOT NULL DEFAULT '0',
  `user_birth` date DEFAULT NULL,
  `user_joindate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_username`, `user_email`, `user_password`, `user_biography`, `user_gender`, `user_birth`, `user_joindate`) VALUES
(8, 'Charlie', 'Dallier-Wood', 'sycatle', '4b68ec1ea84e4f0f56c58b8176c1e895a7c5812393e0f9c212968871aec65063', '096ed626ece9243baf67d54683864c9f9e083c5b9434e94478fd201ad6c4b4b5', 'Founder of Bebl.io', 1, '2003-07-03', '2022-05-05 14:12:58'),
(9, 'Steven', 'Covey', 'gerard', '3a0feadc4ece6313799ccb593764459e051de2ee477278eda0877b73a467ff0f', '096ed626ece9243baf67d54683864c9f9e083c5b9434e94478fd201ad6c4b4b5', '', 0, NULL, '2022-05-05 14:12:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`),
  ADD UNIQUE KEY `author_id` (`author_id`,`author_slug`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `slug` (`book_slug`),
  ADD UNIQUE KEY `book_id` (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `id` (`category_id`,`category_slug`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`quote_id`),
  ADD UNIQUE KEY `quote_id` (`quote_id`,`quote_slug`),
  ADD KEY `quote_slug` (`quote_slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`user_username`,`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `quote_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
