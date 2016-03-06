-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Dim 06 Mars 2016 à 11:10
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `spacevoidDB`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `post_related_id` int(11) NOT NULL,
  `user_related_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `content`, `post_related_id`, `user_related_id`, `username`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras luctus nunc metus, sit amet rutrum nibh sodales non. Donec dolor purus, sodales ut sollicitudin eu, tincidunt eget odio. Proin tincidunt justo lectus, tristique pretium dolor facilisis et. Integer ac lorem eget massa tincidunt scelerisque. Pellentesque lacinia dignissim elementum. Nulla ultrices scelerisque lacus sit amet imperdiet. Curabitur porttitor pharetra lacus, eget aliquet magna finibus faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec sit amet mauris gravida, efficitur orci finibus, varius quam.', 5, 2, ''),
(2, 'Curabitur feugiat, nisi eget vulputate porttitor, diam orci eleifend lectus, id luctus dui lacus ac risus. Ut sit amet commodo velit, non dapibus ex. Donec quis dictum mi. Duis eget semper metus. Integer mollis varius erat, nec mollis sem tempus gravida. Aenean commodo, magna finibus euismod blandit, nulla orci laoreet ipsum, a sodales leo justo fringilla risus. In nec erat nec nisl porttitor varius et at mauris. Maecenas consequat egestas ex eget porta. Duis nunc dui, commodo non sagittis id, mollis nec nibh. Sed non sapien risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam quis sem eget magna scelerisque eleifend. Integer mauris metus, iaculis eget tellus in, convallis consequat dolor. Aenean sapien mi, lobortis ut cursus eu, congue eget nisi. Aliquam eu dignissim leo. Aliquam tristique vestibulum urna, sit amet blandit tortor ornare quis.', 7, 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `content` longtext CHARACTER SET utf8,
  `post_cover` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_date` varchar(10) CHARACTER SET utf8 NOT NULL,
  `user_related_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `post_cover`, `post_date`, `user_related_id`) VALUES
(5, 'Un d&ocirc;me volcanique a fait basculer la surface de Mars il y a 3 milliards d\'ann&eacute;es', 'Il y a trois milliards d\'annÃ©es environ, la formation d\'un immense dÃ´me volcanique a littÃ©ralement fait basculer la surface de la planÃ¨te Mars. Un Ã©vÃ¨nement dont la survenue avait dÃ©jÃ  Ã©tÃ© suggÃ©rÃ©e, mais qui n\'avait jusqu\'ici jamais Ã©tÃ© dÃ©montrÃ©.Il y a 3 Ã  3.5 milliards d\'annÃ©es, un Ã©vÃ¨nement colossal a eu lieu Ã  la surface de la planÃ¨te Mars : la formation d\'un immense dÃ´me volcanique, connu sous le nom de dÃ´me de Tharsis, a ni plus ni moins fait basculer la surface de la planÃ¨te rouge, de 20 Ã  25 degrÃ©s.Comment expliquer un tel phÃ©nomÃ¨ne ? En cause, la gigantesque masse du dÃ´me de Tharsis, lequel est ni plus ni moins l\'Ã©difice volcanique le plus massif de l\'ensemble du systÃ¨me solaire.Pour bien comprendre, il nous faut revenir il y a 3.7 milliards d\'annÃ©es. A cette Ã©poque, la formation du dÃ´me de Tharsis dÃ©bute, vers 20Â° de latitude nord. L\'activitÃ© volcanique de cet Ã©difice se poursuit durant des centaines de millions d\'annÃ©es, et dÃ©bouche sur la formation d\'un plateau de plus de 5000 km de diamÃ¨tre, et d\'une Ã©paisseur d\'environ 12 km d\'Ã©paisseur. Soit une masse de un milliard de milliards de tonnes, soit 1.4% la masse de la Lune !RÃ©sultat ? La croÃ»te et le manteau de Mars se sont mis Ã  pivoter, tournant autour du noyau interne de Mars. Un dÃ©placement qui a conduit le dÃ´me de Tharsis Ã  se retrouver... sur l\'Ã©quateur.En d\'autres termes, les pÃ´les de Mars se sont dÃ©placÃ©s. Et de fait, dans cette nouvelle Ã©tude, les auteurs montrent pour la premiÃ¨re fois que les riviÃ¨res martiennes Ã©taient Ã  l\'origine rÃ©parties sur une bande tropicale sud d\'une planÃ¨te Mars tournant autour de pÃ´les dÃ©calÃ©s d\'une vingtaine de degrÃ©s par rapport aux pÃ´les actuels.Or, ces pÃ´les calculÃ©s par cette nouvelle Ã©tude sont cohÃ©rents avec les emplacements obtenus lors d\'une prÃ©cÃ©dente Ã©tude, menÃ©e en 2010 par Isamu Matsuyama (UniversitÃ© d\'Arizona, Etats-Unis). Laquelle avait montrÃ© que si le dÃ´me de Tharsis Ã©tait "retirÃ©" de la planÃ¨te Mars, celleâ€ci s\'orienterait diffÃ©remment par rapport Ã  son axe.Et ce n\'est pas tout. Car la topographie de Mars avant le basculement permet d\'en savoir plus sur le climat primitif de la planÃ¨te. En utilisant des modÃ¨les climatiques, les auteurs de l\'Ã©tude ont mis en Ã©vidence la prÃ©sence Ã  cette Ã©poque d\'un climat froid et d\'une atmosphÃ¨re plus dense que celle d\'aujourd\'hui, avec une accumulation de glaces autour de 25Â° Sud, dans les rÃ©gions qui correspondent aux sources des riviÃ¨res aujourd\'hui assÃ©chÃ©es.Au final, ces travaux modifient considÃ©rablement notre reprÃ©sentation de la surface de Mars telle qu\'elle a dÃ» Ãªtre il y a 4 milliards d\'annÃ©es. De fait, selon ce nouveau scÃ©nario, la pÃ©riode de stabilitÃ© de l\'eau liquide qui a dÃ©bouchÃ© sur la formation de vallÃ©es fluviales est contemporaine, et probablement une consÃ©quence, de l\'activitÃ© volcanique du dÃ´me de Tharsis. Le basculement dÃ©clenchÃ© par le dÃ´me de Tharsis a eu lieu aprÃ¨s la fin de l\'activitÃ© fluviale, soit il y a -3,5 milliards d\'annÃ©es environ. Lequel a a ainsi donnÃ© Ã  Mars le visage que les planÃ©tologues lui conniassent aujourd\'hui.', 'planete-mars-surface_0.jpg', '06/03/2016', 1),
(6, 'La surface de Pluton se r&eacute;v&egrave;le &eacute;tonnamment complexe', 'La surface de Pluton est plus complexe que prÃ©vu, rÃ©vÃ¨le de rÃ©centes images capturÃ©es par la sonde New Horizons.Des reliefs particuliÃ¨rement complexes. Tel est le constat que l\'on peut tirer des derniers clichÃ©s de la surface de la planÃ¨te naine Pluton, obtenus par la sonde New Horizons. Une complexitÃ© qui Ã©tonne les auteurs de la dÃ©couverte : "Si un artiste avait peint la surface de Pluton de cette maniÃ¨re avant le survol par la sonde, je ne l\'aurais pas cru. Pourtant, c\'est vraiment ce qui se trouve lÃ -bas", rÃ©vÃ¨le Alan Stern, responsable de la mission New Horizons dans un communiquÃ© publiÃ© par la NASA.Pour bien comprendre, il nous faut revenir il y a 3.7 milliards d\'annÃ©es. A cette Ã©poque, la formation du dÃ´me de Tharsis dÃ©bute, vers 20Â° de latitude nord. L\'activitÃ© volcanique de cet Ã©difice se poursuit durant des centaines de millions d\'annÃ©es, et dÃ©bouche sur la formation d\'un plateau de plus de 5000 km de diamÃ¨tre, et d\'une Ã©paisseur d\'environ 12 km d\'Ã©paisseur. Soit une masse de un milliard de milliards de tonnes, soit 1.4% la masse de la Lune !RÃ©sultat ? La croÃ»te et le manteau de Mars se sont mis Ã  pivoter, tournant autour du noyau interne de Mars. Un dÃ©placement qui a conduit le dÃ´me de Tharsis Ã  se retrouver... sur l\'Ã©quateur.En d\'autres termes, les pÃ´les de Mars se sont dÃ©placÃ©s. Et de fait, dans cette nouvelle Ã©tude, les auteurs montrent pour la premiÃ¨re fois que les riviÃ¨res martiennes Ã©taient Ã  l\'origine rÃ©parties sur une bande tropicale sud d\'une planÃ¨te Mars tournant autour de pÃ´les dÃ©calÃ©s d\'une vingtaine de degrÃ©s par rapport aux pÃ´les actuels.Or, ces pÃ´les calculÃ©s par cette nouvelle Ã©tude sont cohÃ©rents avec les emplacements obtenus lors d\'une prÃ©cÃ©dente Ã©tude, menÃ©e en 2010 par Isamu Matsuyama (UniversitÃ© d\'Arizona, Etats-Unis). Laquelle avait montrÃ© que si le dÃ´me de Tharsis Ã©tait "retirÃ©" de la planÃ¨te Mars, celleâ€ci s\'orienterait diffÃ©remment par rapport Ã  son axe.Et ce n\'est pas tout. Car la topographie de Mars avant le basculement permet d\'en savoir plus sur le climat primitif de la planÃ¨te. En utilisant des modÃ¨les climatiques, les auteurs de l\'Ã©tude ont mis en Ã©vidence la prÃ©sence Ã  cette Ã©poque d\'un climat froid et d\'une atmosphÃ¨re plus dense que celle d\'aujourd\'hui, avec une accumulation de glaces autour de 25Â° Sud, dans les rÃ©gions qui correspondent aux sources des riviÃ¨res aujourd\'hui assÃ©chÃ©es.Au final, ces travaux modifient considÃ©rablement notre reprÃ©sentation de la surface de Mars telle qu\'elle a dÃ» Ãªtre il y a 4 milliards d\'annÃ©es. De fait, selon ce nouveau scÃ©nario, la pÃ©riode de stabilitÃ© de l\'eau liquide qui a dÃ©bouchÃ© sur la formation de vallÃ©es fluviales est contemporaine, et probablement une consÃ©quence, de l\'activitÃ© volcanique du dÃ´me de Tharsis. Le basculement dÃ©clenchÃ© par le dÃ´me de Tharsis a eu lieu aprÃ¨s la fin de l\'activitÃ© fluviale, soit il y a -3,5 milliards d\'annÃ©es environ. Lequel a a ainsi donnÃ© Ã  Mars le visage que les planÃ©tologues lui conniassent aujourd\'hui.', 'surface-pluton_0.jpg', '06/03/2016', 1),
(7, '   Apr&egrave;s 8 mois &laquo; pass&eacute;s sur Mars &raquo;, des astronautes sortent du d&ocirc;me', 'Six astronomes de la Nasa ont passÃ© huit mois confinÃ©s dans un dÃ´me de 100 m2, situÃ© Ã  2.400 mÃ¨tres d\'altitude sur un volcan d\'Hawaii. Objectif ? Tester les capacitÃ©s physiques et psychologiques des astronomes, en vue de la vraie mission dâ€™exploration de Mars, prÃ©vue par la Nasa pour les annÃ©es 2030.La mission HI-SEAS (Hawaii Space Exploration Analog and Simulation), visant Ã  simuler les conditions de vie des astronautes sur Mars, s\'est achevÃ©e ce lundi 15 juin 2015 : les six astronomes de la Nasa impliquÃ©s dans cette expÃ©rience ont quittÃ© le dÃ´me de 100 m2 oÃ¹ ils Ã©taient confinÃ©s depuis huit mois.Le but de la mission HI-SEAS ? Tester la rÃ©sistance physique et psychologique des astronautes, en vue de prÃ©parer la mission dâ€™exploration martienne envisagÃ©e par la NASA pour les annÃ©es 2030.Le dÃ´me, baptisÃ© HI-SEAS Habitat, est situÃ© Ã  Hawaii, Ã  plus de 2400 mÃ¨tres d\'altitude, prÃ¨s du volcan Mauna Loa : une rÃ©gion dÃ©sertique et abandonnÃ©e, oÃ¹ la faune est rare.Le dÃ´me, d\'environ 100 m2 et large de seulement 11 mÃ¨tres, est formÃ© par deux Ã©tages. A lâ€™intÃ©rieur, des parties communes destinÃ©s Ã  la vie quotidienne et aux entraÃ®nements. Le dÃ´me est dotÃ© de hublots, qui offrait aux membres de lâ€™expÃ©rience une vue sur le paysage dÃ©solÃ© environnant.Le bilan de l\'expÃ©rience est positif, selon la NASA. Les six astronautes ont montrÃ© de bonnes capacitÃ©s d\'adaptation, et ont maintenu des relations de bonne qualitÃ©. Il est Ã  noter que la pratique du yoga est venue Ã  leur aide, afin dâ€™abaisser lâ€™angoisse et le stress parfois ressentis.', 'PIA14293-amended1.jpg', '06/03/2016', 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `signup_date` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL,
  `last_login` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `mail`, `description`, `firstname`, `lastname`, `signup_date`, `role`, `last_login`) VALUES
(1, 'Blogger', '2916b97bf47b57a1f75c24b5f3770875', 'blogger@spacevoid.space', '', '', '', '06.03.2016', 'blogger', '06.03.2016'),
(2, 'Admin', 'e3ee636035ae9d2454018b7cefc6f901', 'admin@spacevoid.space', '', 'John', 'Doe', '06.03.2016', 'superadmin', '06.03.2016'),
(3, 'User', 'b73437033da2d0a652db198e265a3fa4', 'user@spacevoid.space', '', '', '', '06.03.2016', 'user', '06.03.2016');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
