-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 23, 2022 at 02:31 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workflow`
--

-- --------------------------------------------------------

--
-- Table structure for table `auto_filler`
--

CREATE TABLE `auto_filler` (
  `id` int NOT NULL,
  `module_id` int NOT NULL,
  `value` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int NOT NULL,
  `module_name` varchar(150) NOT NULL,
  `module_group_id` int NOT NULL,
  `sort` int NOT NULL DEFAULT '0',
  `module_price_inf` tinyint NOT NULL DEFAULT '1',
  `module_quantity_inf` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module_name`, `module_group_id`, `sort`, `module_price_inf`, `module_quantity_inf`) VALUES
(1, 'KALDIRMA HIZI', 1, 1, 0, 0),
(2, 'KALDIRMA MOTORU', 1, 2, 1, 1),
(3, 'KALDIRMA REDÜKTÖRÜ', 1, 3, 1, 1),
(4, 'KALDIRMA FRENİ', 1, 4, 1, 1),
(5, 'HALAT DONANIMI VE TİPİ', 1, 5, 1, 1),
(6, 'KANCA TİPİ', 1, 6, 1, 1),
(7, 'YÜRÜME HIZI', 1, 7, 0, 0),
(8, 'YÜRÜTME MOTORU', 1, 8, 1, 1),
(9, 'YÜRÜTME REDÜKTÖRÜ', 1, 9, 1, 1),
(10, 'YÜRÜTME FRENİ', 1, 10, 1, 1),
(11, 'YÜRÜTME TEKERİ', 1, 11, 1, 4),
(12, 'ARABA YÜRÜME RAYI', 2, 1, 1, 1),
(13, 'BAKIM PLATFORMU', 2, 2, 1, 1),
(14, 'KÖPRÜ KRİŞİ', 2, 3, 1, 1),
(15, 'KÖPRÜ SEHİMİ', 2, 4, 1, 1),
(16, 'KALDIRMA KAPASİTESİ', 3, 1, 0, 0),
(17, 'KALDIRMA YÜKSEKLİĞİ', 3, 2, 0, 0),
(18, 'KÖPRÜ (AKS) AÇIKLIĞI', 3, 3, 0, 0),
(19, 'YÜRÜME YOLU UZUNLUĞU', 3, 4, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `module_groups`
--

CREATE TABLE `module_groups` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `module_group_name` varchar(150) NOT NULL,
  `sort` int DEFAULT NULL,
  `price_inf` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `module_groups`
--

INSERT INTO `module_groups` (`id`, `product_id`, `module_group_name`, `sort`, `price_inf`) VALUES
(1, 2, 'KALDIRMA GRUBU', 1, 1),
(2, 2, 'KÖPRÜ GRUBU', 2, 1),
(3, 2, 'GENEL VERİLER', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int NOT NULL,
  `reference_no` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `firm_name` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `city_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `country` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `fax_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `gsm_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `tax_office` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `tax_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `auth_person` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `subject` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `revision_no` int NOT NULL DEFAULT '0',
  `quantity` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `offer_details`
--

CREATE TABLE `offer_details` (
  `id` int NOT NULL,
  `offer_id` int NOT NULL,
  `module_id` int NOT NULL,
  `value` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `price` decimal(7,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `product_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`) VALUES
(1, 'Pergel Vinç'),
(2, 'Çift Kiriş Gezer Köprülü Vinç');

-- --------------------------------------------------------

--
-- Table structure for table `revision_controller`
--

CREATE TABLE `revision_controller` (
  `id` int NOT NULL,
  `for_what` varchar(25) NOT NULL,
  `reference_no` varchar(25) NOT NULL,
  `last_rev_no` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `revision_controller`
--

INSERT INTO `revision_controller` (`id`, `for_what`, `reference_no`, `last_rev_no`) VALUES
(1, 'offers', '20220200', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transitions`
--

CREATE TABLE `transitions` (
  `id` int NOT NULL,
  `transaction_id` int NOT NULL,
  `transition_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `for_what` varchar(100) NOT NULL,
  `transition_type` int NOT NULL,
  `user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `privilage` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `first_name`, `last_name`, `privilage`) VALUES
(1, 'cbinal', '8f10d078b2799206cfe914b32cc6a5e9', 'Celalettin', 'Binal', 100),
(2, 'deneme', '8f10d078b2799206cfe914b32cc6a5e9', 'den', 'den', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_max_pos_transitions`
-- (See below for the actual view)
--
CREATE TABLE `vw_max_pos_transitions` (
`id` int
,`transaction_id` int
,`transition_date` datetime
,`for_what` varchar(100)
,`transition_type` int
,`user` int
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_max_rev_offers`
-- (See below for the actual view)
--
CREATE TABLE `vw_max_rev_offers` (
`id` int
,`reference_no` varchar(20)
,`created_date` datetime
,`firm_name` varchar(250)
,`city_name` varchar(50)
,`address` text
,`country` varchar(250)
,`phone_number` varchar(20)
,`fax_number` varchar(20)
,`gsm_number` varchar(20)
,`email` varchar(250)
,`tax_office` varchar(100)
,`tax_number` varchar(20)
,`auth_person` varchar(100)
,`subject` varchar(250)
,`revision_no` int
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_offer_to_others`
-- (See below for the actual view)
--
CREATE TABLE `vw_offer_to_others` (
`id` int
,`offer_id` int
,`value` varchar(250)
,`description` varchar(250)
,`quantity` int
,`price` decimal(7,2)
,`module_group_id` int
,`module_group_name` varchar(150)
,`module_id` int
,`module_name` varchar(150)
,`module_quantity_inf` tinyint
,`module_price_inf` tinyint
,`product_id` int
,`product_name` varchar(250)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_max_pos_transitions`
--
DROP TABLE IF EXISTS `vw_max_pos_transitions`;

CREATE ALGORITHM=UNDEFINED DEFINER=`debian-sys-maint`@`localhost` SQL SECURITY DEFINER VIEW `vw_max_pos_transitions`  AS  select `tr1`.`id` AS `id`,`tr1`.`transaction_id` AS `transaction_id`,`tr1`.`transition_date` AS `transition_date`,`tr1`.`for_what` AS `for_what`,`tr1`.`transition_type` AS `transition_type`,`tr1`.`user` AS `user` from (`transitions` `tr1` left join (select `transitions`.`transaction_id` AS `transaction_id`,max(`transitions`.`transition_type`) AS `transition_type` from `transitions` group by `transitions`.`transaction_id`) `tr2` on(((`tr2`.`transaction_id` = `tr1`.`transaction_id`) and (`tr2`.`transition_type` = `tr1`.`transition_type`)))) where (`tr2`.`transaction_id` is not null) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_max_rev_offers`
--
DROP TABLE IF EXISTS `vw_max_rev_offers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`debian-sys-maint`@`localhost` SQL SECURITY DEFINER VIEW `vw_max_rev_offers`  AS  select `tr1`.`id` AS `id`,`tr1`.`reference_no` AS `reference_no`,`tr1`.`created_date` AS `created_date`,`tr1`.`firm_name` AS `firm_name`,`tr1`.`city_name` AS `city_name`,`tr1`.`address` AS `address`,`tr1`.`country` AS `country`,`tr1`.`phone_number` AS `phone_number`,`tr1`.`fax_number` AS `fax_number`,`tr1`.`gsm_number` AS `gsm_number`,`tr1`.`email` AS `email`,`tr1`.`tax_office` AS `tax_office`,`tr1`.`tax_number` AS `tax_number`,`tr1`.`auth_person` AS `auth_person`,`tr1`.`subject` AS `subject`,`tr1`.`revision_no` AS `revision_no` from (`offers` `tr1` left join (select `offers`.`reference_no` AS `reference_no`,max(`offers`.`revision_no`) AS `revision_no` from `offers` group by `offers`.`reference_no`) `tr2` on(((`tr2`.`reference_no` = `tr1`.`reference_no`) and (`tr2`.`revision_no` = `tr1`.`revision_no`)))) where (`tr2`.`reference_no` is not null) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_offer_to_others`
--
DROP TABLE IF EXISTS `vw_offer_to_others`;

CREATE ALGORITHM=UNDEFINED DEFINER=`debian-sys-maint`@`localhost` SQL SECURITY DEFINER VIEW `vw_offer_to_others`  AS  select `od`.`id` AS `id`,`od`.`offer_id` AS `offer_id`,`od`.`value` AS `value`,`od`.`description` AS `description`,`od`.`quantity` AS `quantity`,`od`.`price` AS `price`,`m`.`module_group_id` AS `module_group_id`,`mg`.`module_group_name` AS `module_group_name`,`od`.`module_id` AS `module_id`,`m`.`module_name` AS `module_name`,`m`.`module_quantity_inf` AS `module_quantity_inf`,`m`.`module_price_inf` AS `module_price_inf`,`mg`.`product_id` AS `product_id`,`p`.`product_name` AS `product_name` from (((`offer_details` `od` left join `modules` `m` on((`m`.`id` = `od`.`module_id`))) left join `module_groups` `mg` on((`mg`.`id` = `m`.`module_group_id`))) left join `products` `p` on((`mg`.`product_id` = `p`.`id`))) order by `mg`.`sort`,`m`.`sort` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auto_filler`
--
ALTER TABLE `auto_filler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_groups`
--
ALTER TABLE `module_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_details`
--
ALTER TABLE `offer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revision_controller`
--
ALTER TABLE `revision_controller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transitions`
--
ALTER TABLE `transitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auto_filler`
--
ALTER TABLE `auto_filler`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `module_groups`
--
ALTER TABLE `module_groups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offer_details`
--
ALTER TABLE `offer_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `revision_controller`
--
ALTER TABLE `revision_controller`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transitions`
--
ALTER TABLE `transitions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
