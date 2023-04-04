
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 06:33 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `timesBought` int(11) NOT NULL,
  `categories` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `name`, `price`, `img`, `timesBought`, `categories`, `description`) VALUES
(1, 'Rocket League', 10, 'Img/Games/1.webp', 8, 'Action', 'WELCOME TO THE HIGH-POWERED HYBRID OF ARCADE-STYLE SOCCER AND VEHICULAR MAYHEM!\nCUSTOMIZE YOUR CAR, HIT THE FIELD, AND COMPETE IN ONE OF THE MOST CRITICALLY ACCLAIMED SPORTS GAMES OF ALL TIME!\n'),
(2, 'Assassin\'s Creed Valhalla', 70, 'Img/Games/2.webp', 71, 'Adventure', 'In Assassin\'s Creed Valhalla, become Eivor, a legendary Viking raider on a quest for glory. Explore a dynamic and beautiful open world set against the brutal backdrop of England\'s Dark Ages. Raid your enemies, grow your settlement and build your political power in the quest to earn a place among the gods in Valhalla.\n'),
(3, 'Borderlands 3', 249, 'Img/Games/3.webp', 66, 'Action', 'The original shooter-looter returns, packing bazillions of guns and an all-new mayhem-fueled adventure! Blast through new worlds and enemies as one of four brand new Vault Hunters – the ultimate treasure-seeking badasses of the Borderlands, each with deep skill trees, abilities, and customization. Play solo or join with friends to take on insane enemies, score loads of loot and save your home from the most ruthless cult leaders in the galaxy.\n'),
(4, 'Snow Runner', 119, 'Img/Games/4.webp', 27, 'Adventure', 'Get ready for the next-generation off-road SnowRunner puts you in the driver’s seat of powerful vehicles as you conquer extreme open environments with the most advanced terrain simulation ever. Drive 40 vehicles from brands such as Ford, Chevrolet, and Freightliner as you leave your mark on an untamed open world.\n'),
(5, 'Back For Blood', 229, 'Img/Games/5.webp', 16, 'Adventure', 'Back 4 Blood is a thrilling cooperative first-person shooter from the creators of the critically acclaimed Left 4 Dead franchise. You are at the center of a war against the Ridden. These once-human hosts of a deadly parasite have turned into terrifying creatures bent on devouring what remains of civilization. With humanity\'s extinction on the line, it\'s up to you and your friends to take the fight to the enemy, eradicate the Ridden, and reclaim the world.\n'),
(6, 'Battlefield 2042', 229, 'Img/Games/6.webp', 7, 'Action', 'Battlefield™ 2042 is a first-person shooter that marks the return to the iconic all-out warfare of the franchise. Adapt and overcome in a near-future world transformed by disorder. Squad up and bring a cutting-edge arsenal into dynamically-changing battlegrounds supporting 128 players, unprecedented scale, and epic destruction.\n'),
(7, 'Conan Exiles', 21, 'Img/Games/7.webp', 0, 'Adventure', 'Conan Exiles is an online multiplayer survival game, now with mounts and mounted combat, set in the lands of Conan the Barbarian. Enter a vast, open-world sandbox and play together with friends and strangers as you build your own home or even a shared city. Survive freezing cold temperatures, explore loot-filled dungeons, develop your character from a lowly peasant to a mighty barbarian, and fight to dominate your enemies in epic siege wars.\nexperience!\n'),
(8, 'Crysis Remastered Trilogy', 47, 'Img/Games/8.webp', 10, 'Action', 'The classic first person shooter from Crytek is back with the action-packed gameplay, sandbox world, and thrilling epic battles you loved the first time around – now with remastered graphics optimized for a new generation of hardware.\n'),
(9, 'Defend The Rook', 32, 'Img/Games/9.webp', 0, 'Adventure', 'A roguelike tactics board combat combined with tower defense elements. Defeat the invading hordes to stay alive and save the land!\n'),
(10, 'Far Cry 6', 275, 'Img/Games/10.webp', 12, 'Action', 'Welcome to Hope County, Montana, land of the free and the brave but also home to a fanatical doomsday cult known as Eden’s Gate. Stand up to cult leader Joseph Seed, and his siblings, the Heralds, to spark the fires of resistance and liberate the besieged community.\n'),
(11, 'Red Dead Redemption', 229, 'Img/Games/11.webp', 8, 'Action', 'Arthur Morgan and the Van der Linde gang are outlaws on the run. With federal agents and the best bounty hunters in the nation massing on their heels, the gang must rob, steal and fight their way across the rugged heartland of America in order to survive. As deepening internal divisions threaten to tear the gang apart, Arthur must make a choice between his own ideals and loyalty to the gang who raised him.\n'),
(12, 'Genshin Impact', 0, 'Img/Games/12.webp', 0, 'Action', 'Explore Vast Areas, Encounter Powerful Enemies, and Discover Secrets of an Unknown World. A Land of Elements Lies Before You, Begin an Unforgettable Journey to Unveil Its Secrets. Breathtaking Graphics. Intense Action RPG Combat. Fully Localized.\n'),
(13, 'Godfall', 47, 'Img/Games/13.webp', 0, 'Action', 'The popular dungeon-crawling RPG series comes to Steam! Monsters\' Den: Godfall is a new game, larger in scope and richer in content than ever before.\n'),
(14, 'Guild Of Dungeoneering', 40, 'Img/Games/14.webp', 0, 'Adventure', 'Now fully rebuilt and remastered, Guild of Dungeoneering Ultimate Edition is a turn-based dungeon crawler with a twist: instead of controlling the hero you build the dungeon around them. Using cards drawn from your Guild decks, you lay down rooms, monsters, traps and of course loot! Meanwhile your hero is making their own decisions on where to go and what to fight. But will they be strong enough to take on the deepest dungeons? In between dungeon runs you manage your Guild, building new rooms to attract new classes of adventurer and expand your decks of cards with more powerful items.\n'),
(15, 'Hitman III', 233, 'Img/Games/15.webp', 8, 'Action', 'Tracking two targets, the “Gilded Cage” mission challenges players to eliminate private banker Claus Strandberg, holed up inside the secure Swedish Consulate, and army General Reza Zaydan, protected by his elite squad of soldiers who have taken over an abandoned school.\n'),
(16, 'Human Kind', 40, 'Img/Games/16.webp', 1, 'Adventure', 'HUMANKIND™ is a historical strategy game, where you’ll be re-writing the entire narrative of human history and combining cultures to create a civilization that’s as unique as you are.\n'),
(17, 'Kena Bridge Of Spirits', 30, 'Img/Games/17.webp', 1, 'Adventure', 'A story-driven, action adventure combining exploration with fast-paced combat. As Kena, players find and grow a team of charming spirit companions called the Rot, enhancing their abilities and creating new ways to manipulate the environment.\n'),
(18, 'League Of Legends', 0, 'Img/Games/18.webp', 1, 'Action', 'League of Legends is a team-based game with over 140 champions to make epic plays with.\n'),
(19, 'Path Finder ', 189, 'Img/Games/19.webp', 0, 'Action', 'Embark on a journey to a realm overrun by demons in a new epic RPG from the creators of the critically acclaimed Pathfinder: Kingmaker. Explore the nature of good and evil, learn the true cost of power, and rise as a Mythic Hero capable of deeds beyond mortal expectations.\n'),
(20, 'Rise Of The Tomb Raider', 150, 'Img/Games/20.webp', 3, 'Adventure', 'Rise of the Tomb Raider: 20 Year Celebration includes the base game and Season Pass featuring all-new content. Explore Croft Manor in the new “Blood Ties” story, then defend it against a zombie invasion in “Lara’s Nightmare”.\n'),
(21, 'Battlefront II', 189, 'Img/Games/21.webp', 0, 'Action', 'Be the hero in the ultimate Star Wars™ battle fantasy with Star Wars™ Battlefront™ II: Celebration Edition! Get Star Wars Battlefront II and the complete collection of customization content acquirable through in-game purchase from launch up to — and including — items inspired by Star Wars™: THE RISE OF SKYWALKER™*.\n'),
(22, 'The Eternal Cylinder', 75, 'Img/Games/22.webp', 0, 'Action', 'Enjoy a rich variety of Trebhum designs, as each mutations combine with one another to create surprising new creatures. This allows your herd to continue to evolve as you explore new areas.\n'),
(23, 'The Hunter call of the wild', 26, 'Img/Games/23.webp', 0, 'Adventure', 'This region of the Rocky Mountains has captivated the imagination of many, who have sought to uncover its bounties. Where once people scouted the natural trails of Silver Ridge Peaks in search of silver and gold, they now come seeking a different kind of trophy - to hunt their favourite animals. Whether you are tracking turkeys through the valley or lining up to shoot a mountain goat on a cliff above the cloudline, it\'s hard to resist taking in the grandeur of the Colorado wilderness.\n'),
(24, 'Assault on Dragon Keep', 33, 'Img/Games/24.webp', 9, 'Action', 'The Queen\'s been captured and her kingdom is in peril; only you and your friends have any chance of restoring peace to this eccentric, enchanted land. Blast your way through treacherous forests, spooky crypts, and fearsome fortresses, but beware—your journey can change in an instant on account of Tina\'s gleefully chaotic whims. Dive into this epic tabletop romp and get ready for the fantasy fight of your life!\n'),
(25, 'WarHammer', 199, 'Img/Games/25.webp', 0, 'Adventure', 'A fantasy strategy game of legendary proportions, Total War: WARHAMMER combines an addictive turn-based campaign of epic empire-building with explosive, colossal, real-time battles. All set in the vivid and incredible world of Warhammer Fantasy Battles.\n'),
(26, 'Valorant', 0, 'Img/Games/26.webp', 0, 'Action', 'Blend your style and experience on a global, competitive stage. You have 13 rounds to attack and defend your side using sharp gunplay and tactical abilities. And, with one life per-round, you\'ll need to think faster than your opponent if you want to survive. Take on foes across Competitive and Unranked modes as well as Deathmatch and Spike Rush.\n'),
(27, 'Riders Republic', 20, 'Img/Games/27.webp', 0, 'Adventure', 'Jump into a massive multiplayer playground! Bike, ski, snowboard, or wingsuit across an open world sports paradise.\n'),
(28, 'Chivalry', 70, 'Img/Games/28.webp', 0, 'Action', 'Besiege castles and raid villages in Chivalry: Medieval Warfare is a first-person slasher with a focus on multi-player. Featuring competitive online combat that seeks to capture the experience of truly being on a medieval battlefield. Inspired from the intensity and epicness of swordfighting movies such as 300, Gladiator and Braveheart, Chivalry: Medieval Warfare aims to bring that experience to the hands of a gamer.\n'),
(29, 'Horizon Zero Dawn', 71, 'Img/Games/29.webp', 5, 'Adventure', 'Experience Aloy’s entire legendary quest to unravel the mysteries of a world ruled by deadly Machines. An outcast from her tribe, the young hunter fights to uncover her past, discover her destiny… and stop a catastrophic threat to the future.\n'),
(30, 'Paladins Absolution', 50, 'Img/Games/30.webp', 0, 'Action', 'Once the king of a long-forgotten kingdom, the Eternal has existed to see countless reigns end. Forged in the crucible of the Pyre’s flames as the embodiment of all that Persists, Azaan is tasked with maintaining the existence of a Realm kept free from Abyssal influence.\n'),
(31, 'World of Warcraft', 90, 'Img/Games/apex-guild-wow-classic.jpg', 18, 'Action', 'orld of Warcraft (WoW) is a massively multiplayer online role-playing game (MMORPG) released in 2004 by Blizzard Entertainment. Set in the Warcraft fantasy universe, World of Warcraft takes place within the world of Azeroth, approximately four years after the events of the previous game in the series, Warcraft III: The Frozen Throne.[3] The game was announced in 2001, and was released for the 10th anniversary of the Warcraft franchise on November 23, 2004. Since launch, World of Warcraft has had eight major expansion packs: The Burning Crusade (2007), Wrath of the Lich King (2008), Cataclysm (2010), Mists of Pandaria (2012), Warlords of Draenor (2014), Legion (2016), Battle for Azeroth (2018), and Shadowlands (2020).');

-- --------------------------------------------------------

--
-- Table structure for table `libraries`
--

CREATE TABLE `libraries` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `bought_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `libraries`
--

INSERT INTO `libraries` (`id`, `user_id`, `game_id`, `bought_date`) VALUES
(127, 36, 17, '2021-12-21'),
(128, 36, 1, '2021-12-21'),
(129, 36, 1, '2021-12-21'),
(130, 36, 3, '2021-12-21'),
(131, 36, 3, '2021-12-21'),
(132, 36, 2, '2021-12-21'),
(133, 36, 3, '2021-12-21'),
(134, 36, 3, '2021-12-21'),
(135, 36, 3, '2021-12-21'),
(136, 36, 3, '2021-12-21'),
(137, 36, 3, '2021-12-21'),
(138, 36, 3, '2021-12-21'),
(139, 36, 3, '2021-12-21'),
(140, 36, 3, '2021-12-21'),
(141, 36, 3, '2021-12-21'),
(142, 36, 3, '2021-12-21'),
(143, 36, 3, '2021-12-21'),
(144, 36, 3, '2021-12-21'),
(145, 36, 3, '2021-12-21'),
(146, 36, 3, '2021-12-21'),
(147, 36, 3, '2021-12-21'),
(148, 36, 3, '2021-12-21'),
(149, 36, 3, '2021-12-21'),
(150, 36, 3, '2021-12-21'),
(151, 36, 3, '2021-12-21'),
(152, 36, 3, '2021-12-21'),
(153, 36, 3, '2021-12-21'),
(154, 36, 3, '2021-12-21'),
(155, 36, 3, '2021-12-21'),
(156, 36, 3, '2021-12-21'),
(157, 36, 3, '2021-12-21'),
(158, 36, 3, '2021-12-21'),
(159, 36, 3, '2021-12-21'),
(160, 36, 3, '2021-12-21'),
(161, 36, 3, '2021-12-21'),
(162, 36, 3, '2021-12-21'),
(163, 36, 3, '2021-12-21'),
(164, 36, 3, '2021-12-21'),
(165, 36, 3, '2021-12-21'),
(166, 36, 3, '2021-12-21'),
(167, 36, 3, '2021-12-21'),
(168, 36, 3, '2021-12-21'),
(169, 36, 11, '2021-12-21'),
(170, 36, 11, '2021-12-21'),
(171, 36, 11, '2021-12-21'),
(172, 36, 11, '2021-12-21'),
(173, 36, 11, '2021-12-21'),
(174, 36, 5, '2021-12-21'),
(175, 36, 5, '2021-12-21'),
(176, 36, 5, '2021-12-21'),
(177, 36, 5, '2021-12-21'),
(178, 36, 5, '2021-12-21'),
(179, 36, 5, '2021-12-21'),
(180, 36, 5, '2021-12-21'),
(181, 36, 5, '2021-12-21'),
(182, 36, 5, '2021-12-21'),
(183, 36, 5, '2021-12-21'),
(184, 36, 5, '2021-12-21'),
(185, 36, 5, '2021-12-21'),
(186, 36, 3, '2021-12-21'),
(187, 36, 3, '2021-12-21'),
(188, 36, 3, '2021-12-21'),
(189, 36, 3, '2021-12-21'),
(190, 36, 3, '2021-12-21'),
(191, 36, 3, '2021-12-21'),
(192, 36, 5, '2021-12-21'),
(193, 36, 5, '2021-12-21'),
(194, 36, 5, '2021-12-21'),
(195, 36, 2, '2021-12-21'),
(196, 36, 2, '2021-12-21'),
(197, 36, 2, '2021-12-21'),
(198, 36, 2, '2021-12-21'),
(199, 36, 2, '2021-12-21'),
(200, 36, 2, '2021-12-21'),
(201, 36, 2, '2021-12-21'),
(202, 36, 2, '2021-12-21'),
(203, 36, 2, '2021-12-21'),
(204, 36, 2, '2021-12-21'),
(205, 36, 2, '2021-12-21'),
(206, 36, 2, '2021-12-21'),
(207, 36, 2, '2021-12-21'),
(208, 36, 2, '2021-12-21'),
(209, 36, 2, '2021-12-21'),
(210, 36, 2, '2021-12-21'),
(211, 36, 2, '2021-12-21'),
(212, 36, 2, '2021-12-21'),
(213, 36, 2, '2021-12-21'),
(214, 36, 2, '2021-12-21'),
(215, 36, 2, '2021-12-21'),
(216, 36, 2, '2021-12-21'),
(217, 36, 2, '2021-12-21'),
(218, 36, 2, '2021-12-21'),
(219, 36, 2, '2021-12-21'),
(220, 36, 2, '2021-12-21'),
(221, 36, 3, '2021-12-21'),
(222, 36, 3, '2021-12-21'),
(223, 36, 3, '2021-12-21'),
(224, 36, 3, '2021-12-21'),
(225, 36, 3, '2021-12-21'),
(226, 36, 3, '2021-12-21'),
(227, 36, 3, '2021-12-21'),
(228, 36, 3, '2021-12-21'),
(229, 36, 3, '2021-12-21'),
(230, 36, 3, '2021-12-21'),
(231, 36, 3, '2021-12-21'),
(232, 36, 3, '2021-12-21'),
(233, 36, 3, '2021-12-21'),
(234, 36, 3, '2021-12-21'),
(235, 36, 3, '2021-12-21'),
(236, 36, 3, '2021-12-21'),
(237, 36, 3, '2021-12-21'),
(238, 36, 3, '2021-12-21'),
(239, 36, 4, '2021-12-21'),
(240, 36, 4, '2021-12-21'),
(241, 36, 4, '2021-12-21'),
(242, 36, 4, '2021-12-21'),
(243, 36, 4, '2021-12-21'),
(244, 36, 4, '2021-12-21'),
(245, 36, 3, '2021-12-21'),
(246, 36, 3, '2021-12-21'),
(247, 36, 16, '2021-12-21'),
(248, 36, 5, '2021-12-21'),
(249, 36, 4, '2021-12-21'),
(250, 36, 2, '2021-12-21'),
(251, 36, 2, '2021-12-21'),
(252, 36, 2, '2021-12-21'),
(253, 36, 2, '2021-12-21'),
(254, 36, 2, '2021-12-21'),
(255, 36, 2, '2021-12-21'),
(256, 36, 2, '2021-12-21'),
(257, 36, 2, '2021-12-21'),
(258, 36, 2, '2021-12-21'),
(259, 36, 2, '2021-12-21'),
(260, 36, 2, '2021-12-21'),
(261, 36, 2, '2021-12-21'),
(262, 36, 2, '2021-12-21'),
(263, 36, 2, '2021-12-21'),
(264, 36, 2, '2021-12-21'),
(265, 36, 2, '2021-12-21'),
(266, 36, 2, '2021-12-21'),
(267, 36, 2, '2021-12-21'),
(268, 36, 2, '2021-12-21'),
(269, 36, 2, '2021-12-21'),
(270, 36, 2, '2021-12-21'),
(271, 36, 2, '2021-12-21'),
(272, 36, 2, '2021-12-21'),
(273, 36, 2, '2021-12-21'),
(274, 36, 2, '2021-12-21'),
(275, 36, 2, '2021-12-21'),
(276, 36, 2, '2021-12-21'),
(277, 36, 2, '2021-12-21'),
(278, 36, 2, '2021-12-21'),
(279, 36, 2, '2021-12-21'),
(280, 36, 2, '2021-12-21'),
(281, 36, 2, '2021-12-21'),
(282, 36, 2, '2021-12-21'),
(283, 36, 2, '2021-12-21'),
(284, 36, 2, '2021-12-21'),
(285, 36, 2, '2021-12-21'),
(286, 36, 1, '2021-12-21'),
(287, 36, 1, '2021-12-21'),
(288, 36, 31, '2021-12-21'),
(289, 36, 31, '2021-12-21'),
(290, 36, 31, '2021-12-21'),
(291, 36, 31, '2021-12-21'),
(292, 36, 31, '2021-12-21'),
(293, 36, 31, '2021-12-21'),
(294, 36, 31, '2021-12-21'),
(295, 36, 31, '2021-12-21'),
(296, 36, 31, '2021-12-21'),
(297, 36, 31, '2021-12-21'),
(298, 36, 31, '2021-12-21'),
(299, 36, 31, '2021-12-21'),
(300, 36, 31, '2021-12-21'),
(301, 36, 31, '2021-12-21'),
(302, 36, 31, '2021-12-21'),
(303, 36, 31, '2021-12-21'),
(304, 36, 31, '2021-12-21'),
(305, 36, 31, '2021-12-21'),
(306, 36, 2, '2021-12-21'),
(307, 36, 3, '2021-12-21'),
(308, 36, 2, '2021-12-21'),
(309, 36, 10, '2021-12-21'),
(310, 36, 10, '2021-12-21'),
(311, 36, 4, '2021-12-21'),
(312, 36, 11, '2021-12-21'),
(313, 36, 4, '2021-12-21'),
(314, 36, 4, '2021-12-21'),
(315, 36, 4, '2021-12-21'),
(316, 36, 4, '2021-12-21'),
(317, 36, 4, '2021-12-21'),
(318, 36, 4, '2021-12-21'),
(319, 36, 4, '2021-12-21'),
(320, 36, 4, '2021-12-21'),
(321, 36, 4, '2021-12-21'),
(322, 36, 4, '2021-12-21'),
(323, 36, 4, '2021-12-21'),
(324, 36, 4, '2021-12-21'),
(325, 36, 4, '2021-12-21'),
(326, 36, 4, '2021-12-21'),
(327, 36, 4, '2021-12-21'),
(328, 36, 4, '2021-12-21'),
(329, 36, 4, '2021-12-21'),
(330, 36, 4, '2021-12-21'),
(331, 36, 4, '2021-12-21'),
(332, 36, 3, '2021-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `ID` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `discount` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`ID`, `game_id`, `discount`) VALUES
(2, 7, '0.30'),
(3, 29, '0.10'),
(4, 19, '0.25'),
(5, 13, '0.70'),
(6, 15, '0.50'),
(7, 17, '0.15'),
(10, 16, '1.00'),
(11, 5, '0.86'),
(12, 12, '0.10');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tstage1`
--

CREATE TABLE `tstage1` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `libraries_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tstage2`
--

CREATE TABLE `tstage2` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `user_id2` int(11) DEFAULT NULL,
  `game_id2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tstage3`
--

CREATE TABLE `tstage3` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `user_id2` int(11) DEFAULT NULL,
  `game_id2` int(11) DEFAULT NULL,
  `bought_date` date NOT NULL DEFAULT current_timestamp(),
  `Finish` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(32) NOT NULL,
  `admin` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `admin`) VALUES
(36, 'Ammar123', '25d55ad283aa400af464c76d713c07ad', 'ammar@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libraries`
--
ALTER TABLE `libraries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `game_id` (`game_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`user_id`,`game_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `tstage1`
--
ALTER TABLE `tstage1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `tstage2`
--
ALTER TABLE `tstage2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `game_id2` (`game_id2`),
  ADD KEY `user_id2` (`user_id2`);

--
-- Indexes for table `tstage3`
--
ALTER TABLE `tstage3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `game_id2` (`game_id2`),
  ADD KEY `user_id2` (`user_id2`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `libraries`
--
ALTER TABLE `libraries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=333;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tstage1`
--
ALTER TABLE `tstage1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tstage2`
--
ALTER TABLE `tstage2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tstage3`
--
ALTER TABLE `tstage3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Constraints for table `libraries`
--
ALTER TABLE `libraries`
  ADD CONSTRAINT `libraries_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `libraries_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`);

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Constraints for table `tstage1`
--
ALTER TABLE `tstage1`
  ADD CONSTRAINT `tstage1_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `tstage1_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Constraints for table `tstage2`
--
ALTER TABLE `tstage2`
  ADD CONSTRAINT `tstage2_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `tstage2_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `tstage2_ibfk_3` FOREIGN KEY (`game_id2`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `tstage2_ibfk_4` FOREIGN KEY (`user_id2`) REFERENCES `users` (`ID`);

--
-- Constraints for table `tstage3`
--
ALTER TABLE `tstage3`
  ADD CONSTRAINT `tstage3_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `tstage3_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `tstage3_ibfk_3` FOREIGN KEY (`game_id2`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `tstage3_ibfk_4` FOREIGN KEY (`user_id2`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
