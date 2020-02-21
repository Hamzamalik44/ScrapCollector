-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2020 at 11:18 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scrap_collector`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `admin_dashboard`
-- (See below for the actual view)
--
CREATE TABLE `admin_dashboard` (
`totalItems` bigint(21)
,`totalUsers` bigint(21)
,`pendingAppointments` bigint(21)
,`purchasedMaterials` decimal(42,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `collectorId` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `date`, `status`, `userId`, `collectorId`) VALUES
(43, '2020-02-16', 3, 69, 70),
(44, '2020-02-18', 3, 71, 70),
(45, '2020-02-18', 3, 72, 70),
(46, '2020-02-19', 3, 69, 70);

-- --------------------------------------------------------

--
-- Stand-in structure for view `appointments_with_status`
-- (See below for the actual view)
--
CREATE TABLE `appointments_with_status` (
`id` int(11)
,`date` date
,`userId` int(11)
,`collectorId` int(11)
,`status` varchar(50)
,`firstName` varchar(50)
,`address` varchar(200)
);

-- --------------------------------------------------------

--
-- Table structure for table `collected_scrap`
--

CREATE TABLE `collected_scrap` (
  `id` int(11) NOT NULL,
  `weight` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `scrapItemId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `scrapCollectorId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collected_scrap`
--

INSERT INTO `collected_scrap` (`id`, `weight`, `date`, `price`, `scrapItemId`, `userId`, `scrapCollectorId`) VALUES
(23, 2, '2020-02-16', 3000, 25, 69, 70),
(24, 5, '2020-02-16', 20000, 26, 69, 70),
(25, 10, '2020-02-18', 30000, 23, 71, 70),
(26, 5, '2020-02-18', 10000, 25, 71, 70),
(28, 10, '2020-02-19', 15000, 24, 72, 70),
(29, 5, '2020-02-19', 20000, 26, 72, 70),
(30, 5, '2020-02-20', 20000, 26, 69, 70),
(31, 10, '2020-02-20', 20000, 25, 69, 70);

-- --------------------------------------------------------

--
-- Stand-in structure for view `collector_report`
-- (See below for the actual view)
--
CREATE TABLE `collector_report` (
`UserId` int(11)
,`date` date
,`firstName` varchar(50)
,`lastName` varchar(50)
,`address` varchar(200)
,`totalWeight` decimal(32,0)
,`totalAmount` decimal(42,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `item_types`
--

CREATE TABLE `item_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_types`
--

INSERT INTO `item_types` (`id`, `name`, `status`) VALUES
(42, 'Type1', 1),
(43, 'Type2', 1),
(44, 'Type3', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `one_collector_report`
-- (See below for the actual view)
--
CREATE TABLE `one_collector_report` (
`userId` int(11)
,`date` date
,`firstName` varchar(50)
,`lastName` varchar(50)
,`address` varchar(200)
,`weight` int(11)
,`price` int(11)
,`totalPrice` bigint(21)
,`material` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `one_user_report`
-- (See below for the actual view)
--
CREATE TABLE `one_user_report` (
`userId` int(11)
,`date` date
,`firstName` varchar(50)
,`lastName` varchar(50)
,`address` varchar(200)
,`weight` int(11)
,`price` int(11)
,`totalPrice` bigint(21)
,`material` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `roleName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roleName`) VALUES
(2, 'Admin'),
(3, 'Scrap collector'),
(4, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `scrap_items`
--

CREATE TABLE `scrap_items` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `itemTypeId` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scrap_items`
--

INSERT INTO `scrap_items` (`id`, `name`, `price`, `itemTypeId`, `status`) VALUES
(23, 'Material1', 3000, 42, 1),
(24, 'Material2', 1500, 42, 1),
(25, 'Material4', 2000, 43, 1),
(26, 'Material5', 4000, 43, 1),
(27, 'Material6', 3000, 44, 1),
(28, 'Material7', 2000, 44, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `scrap_with_type`
-- (See below for the actual view)
--
CREATE TABLE `scrap_with_type` (
`id` int(11)
,`name` varchar(50)
,`materialStatus` tinyint(1)
,`price` int(11)
,`type` varchar(50)
,`typeStatus` tinyint(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'In process'),
(3, 'done');

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_scrap_collected`
-- (See below for the actual view)
--
CREATE TABLE `total_scrap_collected` (
`date` date
,`weight` int(11)
,`price` int(11)
,`name` varchar(50)
,`id` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT 'defaultImage/defaultUser.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `phone`, `address`, `status`, `image`) VALUES
(68, 'Hamza', 'Malik', 'admin@gmail.com', '$2y$10$aQLqsU3UESeSdFHIEw3V2eqFIiQpHr7BVclbEw5q8W1VGAqXq5akS', '03152439425', 'abc', 1, '5e49757bc713b11.png'),
(69, 'Hamza', 'Malik', 'user@gmail.com', '$2y$10$h6dLDm6ZwfMkhxa.SHxOjetIiWZgSaRkkOYWvJMQRDxGPow1.cYZe', '03152439425', 'abc', 1, 'defaultImage/defaultUser.png'),
(70, 'Jhon', 'Smith', 'collector@gmail.com', '$2y$10$LGuo2/W62elRET2JxyfzkOMCujy3DndjacmU5X6EbsySwQNTU7r0i', '03152439425', 'abc', 1, 'defaultImage/defaultUser.png'),
(71, 'Hamza', 'Malik', 'admin@gmail.com\\', '$2y$10$aQLqsU3UESeSdFHIEw3V2eqFIiQpHr7BVclbEw5q8W1VGAqXq5akS', '03152439425', 'abc', 1, 'defaultImage/defaultUser.png'),
(72, 'Abdullah', 'arif', 'Abdullah@localhost.com', '$2y$10$sWYTH125U70LwvJDH6df3Ot6/MdYiomRO.hzOoQRmNCyheHGN4hfq', '03003544007', 'abc', 1, '5e4bb9e56a77511.png'),
(73, 'Hamza', 'Malik', 'hamza.malik3498hm@gmail.com', '$2y$10$h2k1CZ1RyXM2SaXLIuYecu0N/F5cHBBPSvlGzRM7bio5pw499jlr2', '03152439425', 'abc', 1, 'defaultImage/defaultUser.png');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_report`
-- (See below for the actual view)
--
CREATE TABLE `user_report` (
`userId` int(11)
,`date` date
,`firstName` varchar(50)
,`lastName` varchar(50)
,`address` varchar(200)
,`totalWeight` decimal(32,0)
,`totalAmount` decimal(42,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `roleId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `userId`, `roleId`) VALUES
(77, 68, 2),
(78, 69, 4),
(79, 70, 3),
(80, 71, 2),
(81, 72, 4),
(82, 73, 4);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_with_role`
-- (See below for the actual view)
--
CREATE TABLE `user_with_role` (
`id` int(11)
,`firstName` varchar(50)
,`lastName` varchar(50)
,`email` varchar(100)
,`password` varchar(255)
,`phone` varchar(50)
,`address` varchar(200)
,`status` tinyint(1)
,`image` varchar(255)
,`roleName` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `admin_dashboard`
--
DROP TABLE IF EXISTS `admin_dashboard`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_dashboard`  AS  select (select count(0) from `scrap_items` where `scrap_items`.`status` = 1) AS `totalItems`,(select count(0) from `users` where `users`.`status` = 1) AS `totalUsers`,(select count(0) from `appointments` where `appointments`.`status` = 1) AS `pendingAppointments`,(select sum(`collected_scrap`.`weight` * `collected_scrap`.`price`) from `collected_scrap` where extract(month from `collected_scrap`.`date`) = extract(month from curdate())) AS `purchasedMaterials` ;

-- --------------------------------------------------------

--
-- Structure for view `appointments_with_status`
--
DROP TABLE IF EXISTS `appointments_with_status`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `appointments_with_status`  AS  select `a`.`id` AS `id`,`a`.`date` AS `date`,`a`.`userId` AS `userId`,`a`.`collectorId` AS `collectorId`,`s`.`name` AS `status`,`u`.`firstName` AS `firstName`,`u`.`address` AS `address` from ((`appointments` `a` join `status` `s` on(`a`.`status` = `s`.`id`)) join `users` `u` on(`u`.`id` = `a`.`userId`)) ;

-- --------------------------------------------------------

--
-- Structure for view `collector_report`
--
DROP TABLE IF EXISTS `collector_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `collector_report`  AS  select `u`.`id` AS `UserId`,`c`.`date` AS `date`,`u`.`firstName` AS `firstName`,`u`.`lastName` AS `lastName`,`u`.`address` AS `address`,sum(`c`.`weight`) AS `totalWeight`,sum(`c`.`weight` * `c`.`price`) AS `totalAmount` from (`collected_scrap` `c` join `users` `u` on(`u`.`id` = `c`.`scrapCollectorId`)) group by `c`.`userId` ;

-- --------------------------------------------------------

--
-- Structure for view `one_collector_report`
--
DROP TABLE IF EXISTS `one_collector_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `one_collector_report`  AS  select `u`.`id` AS `userId`,`c`.`date` AS `date`,`u`.`firstName` AS `firstName`,`u`.`lastName` AS `lastName`,`u`.`address` AS `address`,`c`.`weight` AS `weight`,`c`.`price` AS `price`,`c`.`weight` * `c`.`price` AS `totalPrice`,`s`.`name` AS `material` from ((`collected_scrap` `c` join `users` `u` on(`u`.`id` = `c`.`scrapCollectorId`)) join `scrap_items` `s` on(`s`.`id` = `c`.`scrapItemId`)) ;

-- --------------------------------------------------------

--
-- Structure for view `one_user_report`
--
DROP TABLE IF EXISTS `one_user_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `one_user_report`  AS  select `u`.`id` AS `userId`,`c`.`date` AS `date`,`u`.`firstName` AS `firstName`,`u`.`lastName` AS `lastName`,`u`.`address` AS `address`,`c`.`weight` AS `weight`,`c`.`price` AS `price`,`c`.`weight` * `c`.`price` AS `totalPrice`,`s`.`name` AS `material` from ((`collected_scrap` `c` join `users` `u` on(`u`.`id` = `c`.`userId`)) join `scrap_items` `s` on(`s`.`id` = `c`.`scrapItemId`)) ;

-- --------------------------------------------------------

--
-- Structure for view `scrap_with_type`
--
DROP TABLE IF EXISTS `scrap_with_type`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `scrap_with_type`  AS  select `s`.`id` AS `id`,`s`.`name` AS `name`,`s`.`status` AS `materialStatus`,`s`.`price` AS `price`,`i`.`name` AS `type`,`i`.`status` AS `typeStatus` from (`scrap_items` `s` join `item_types` `i` on(`i`.`id` = `s`.`itemTypeId`)) ;

-- --------------------------------------------------------

--
-- Structure for view `total_scrap_collected`
--
DROP TABLE IF EXISTS `total_scrap_collected`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_scrap_collected`  AS  select `c`.`date` AS `date`,`c`.`weight` AS `weight`,`c`.`price` AS `price`,`s`.`name` AS `name`,`s`.`id` AS `id` from (`collected_scrap` `c` join `scrap_items` `s` on(`c`.`scrapItemId` = `s`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `user_report`
--
DROP TABLE IF EXISTS `user_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_report`  AS  select `u`.`id` AS `userId`,`c`.`date` AS `date`,`u`.`firstName` AS `firstName`,`u`.`lastName` AS `lastName`,`u`.`address` AS `address`,sum(`c`.`weight`) AS `totalWeight`,sum(`c`.`weight` * `c`.`price`) AS `totalAmount` from (`collected_scrap` `c` join `users` `u` on(`u`.`id` = `c`.`userId`)) group by `c`.`userId` ;

-- --------------------------------------------------------

--
-- Structure for view `user_with_role`
--
DROP TABLE IF EXISTS `user_with_role`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_with_role`  AS  select `u`.`id` AS `id`,`u`.`firstName` AS `firstName`,`u`.`lastName` AS `lastName`,`u`.`email` AS `email`,`u`.`password` AS `password`,`u`.`phone` AS `phone`,`u`.`address` AS `address`,`u`.`status` AS `status`,`u`.`image` AS `image`,`r`.`roleName` AS `roleName` from ((`users` `u` join `user_roles` `ur` on(`u`.`id` = `ur`.`userId`)) join `roles` `r` on(`ur`.`roleId` = `r`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `userId` (`userId`),
  ADD KEY `collectorId` (`collectorId`);

--
-- Indexes for table `collected_scrap`
--
ALTER TABLE `collected_scrap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scrapItemId` (`scrapItemId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `scrapCollectorId` (`scrapCollectorId`);

--
-- Indexes for table `item_types`
--
ALTER TABLE `item_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scrap_items`
--
ALTER TABLE `scrap_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itemTypeId` (`itemTypeId`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `roleId` (`roleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `collected_scrap`
--
ALTER TABLE `collected_scrap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `item_types`
--
ALTER TABLE `item_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `scrap_items`
--
ALTER TABLE `scrap_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`collectorId`) REFERENCES `users` (`id`);

--
-- Constraints for table `collected_scrap`
--
ALTER TABLE `collected_scrap`
  ADD CONSTRAINT `collected_scrap_ibfk_1` FOREIGN KEY (`scrapItemId`) REFERENCES `scrap_items` (`id`),
  ADD CONSTRAINT `collected_scrap_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `collected_scrap_ibfk_3` FOREIGN KEY (`scrapCollectorId`) REFERENCES `users` (`id`);

--
-- Constraints for table `scrap_items`
--
ALTER TABLE `scrap_items`
  ADD CONSTRAINT `scrap_items_ibfk_1` FOREIGN KEY (`itemTypeId`) REFERENCES `item_types` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`roleId`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
