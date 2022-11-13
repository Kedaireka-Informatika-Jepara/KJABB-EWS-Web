-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 05:38 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-ews`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_abiotic`
--

CREATE TABLE `additional_abiotic` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `nilai_awal` decimal(10,2) NOT NULL,
  `nilai_akhir` decimal(10,2) NOT NULL,
  `bobot` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `additional_abiotic`
--

INSERT INTO `additional_abiotic` (`id`, `name`, `nilai_awal`, `nilai_akhir`, `bobot`) VALUES
(1, 'Conductivity', '0.00', '2.99', '1.00'),
(2, 'Conductivity', '3.00', '4.99', '1.50'),
(3, 'Conductivity', '5.00', '10.00', '2.00'),
(4, 'Conductivity', '10.01', '50.00', '1.50'),
(5, 'Conductivity', '50.01', '99999999.99', '1.00'),
(6, 'Kekeruhan', '0.00', '5.99', '2.00'),
(7, 'Kekeruhan', '6.00', '100.00', '1.50'),
(8, 'Kekeruhan', '100.01', '99999999.99', '1.00'),
(9, 'Ratio CN', '0.00', '1.99', '1.00'),
(10, 'Ratio CN', '2.00', '3.99', '1.50'),
(11, 'Ratio CN', '4.00', '10.00', '2.00'),
(12, 'Ratio CN', '10.01', '20.00', '1.50'),
(13, 'Ratio CN', '20.01', '99999999.99', '1.00'),
(14, 'Clay', '0.00', '4.99', '1.00'),
(15, 'Clay', '5.00', '9.99', '1.50'),
(16, 'Clay', '10.00', '20.00', '2.00'),
(17, 'Silt', '0.00', '30.00', '1.00'),
(18, 'Silt', '30.01', '49.99', '1.50'),
(19, 'Silt', '50.00', '90.00', '2.00'),
(21, 'Sand', '0.00', '4.99', '1.00'),
(22, 'Sand', '5.00', '10.00', '2.00'),
(23, 'Sand', '10.01', '20.00', '1.50'),
(24, 'Sand', '20.01', '100.00', '1.00');

-- --------------------------------------------------------

--
-- Table structure for table `family_biotic`
--

CREATE TABLE `family_biotic` (
  `id` int(11) NOT NULL,
  `family` varchar(256) NOT NULL,
  `bobot` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `family_biotic`
--

INSERT INTO `family_biotic` (`id`, `family`, `bobot`) VALUES
(1, 'Capitellidae', '6.00'),
(2, 'Chaoboridae', '5.00'),
(3, 'Chironomidae', '5.00'),
(4, 'Cirratulidae', '6.00'),
(5, 'Eunicidae', '4.00'),
(6, 'Littorinidae', '4.00'),
(7, 'Lumbrinereidae', '3.00'),
(8, 'Sabellidae', '4.00'),
(9, 'Spionidae', '6.00'),
(10, 'Thiaridae', '4.00'),
(11, 'Tubificidae', '5.00'),
(12, 'Turritellidae', '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `geographical_zone`
--

CREATE TABLE `geographical_zone` (
  `id` int(11) NOT NULL,
  `zone` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `geographical_zone`
--

INSERT INTO `geographical_zone` (`id`, `zone`) VALUES
(1, 'Tropical'),
(2, 'Temperate'),
(3, '-');

-- --------------------------------------------------------

--
-- Table structure for table `index_add_station`
--

CREATE TABLE `index_add_station` (
  `id` int(11) NOT NULL,
  `similarity` varchar(12) NOT NULL,
  `bobot_similarity` decimal(10,2) NOT NULL,
  `dominance` varchar(12) NOT NULL,
  `bobot_dominance` decimal(10,2) NOT NULL,
  `diversity` varchar(12) NOT NULL,
  `bobot_diversity` decimal(10,2) NOT NULL,
  `total_abundance` decimal(10,2) NOT NULL,
  `bobot_total_abundance` decimal(10,2) NOT NULL,
  `number_species` decimal(10,2) NOT NULL,
  `bobot_number_species` decimal(10,2) NOT NULL,
  `taxa_indicator` decimal(10,2) NOT NULL,
  `conductivity` varchar(12) NOT NULL,
  `bobot_conductivity` decimal(10,2) NOT NULL,
  `ratiocn` varchar(12) NOT NULL,
  `bobot_ratiocn` decimal(10,2) NOT NULL,
  `turbidity` varchar(12) NOT NULL,
  `bobot_turbidity` decimal(10,2) NOT NULL,
  `sand` varchar(12) NOT NULL,
  `bobot_sand` decimal(10,2) NOT NULL,
  `clay` varchar(12) NOT NULL,
  `bobot_clay` decimal(10,2) NOT NULL,
  `silt` varchar(12) NOT NULL,
  `bobot_silt` decimal(10,2) NOT NULL,
  `station_id` varchar(14) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `index_add_station`
--

INSERT INTO `index_add_station` (`id`, `similarity`, `bobot_similarity`, `dominance`, `bobot_dominance`, `diversity`, `bobot_diversity`, `total_abundance`, `bobot_total_abundance`, `number_species`, `bobot_number_species`, `taxa_indicator`, `conductivity`, `bobot_conductivity`, `ratiocn`, `bobot_ratiocn`, `turbidity`, `bobot_turbidity`, `sand`, `bobot_sand`, `clay`, `bobot_clay`, `silt`, `bobot_silt`, `station_id`, `user_id`) VALUES
(15, '0.72', '10.00', '0.22', '10.00', '1.73', '3.00', '46.00', '3.00', '8.00', '3.00', '4.00', '50.16', '1.00', '7.21', '2.00', '', '2.00', '11.40', '1.50', '16.71', '2.00', '71.83', '2.00', 'PolikulturTmbk', 2),
(16, '0.79', '10.00', '0.24', '10.00', '1.84', '3.00', '13.00', '3.00', '3.00', '3.00', '16.00', '43.1', '1.50', '3.16', '1.50', '', '2.00', '93.38', '1.00', '0', '1.00', '6.62', '1.00', 'Pesisir', 2),
(17, '', '10.00', '', '10.00', '', '10.00', '32.00', '3.00', '1.00', '3.00', '4.00', '', '2.00', '', '2.00', '', '2.00', '', '2.00', '', '2.00', '', '2.00', 'TambakEmas', 2);

-- --------------------------------------------------------

--
-- Table structure for table `index_biotic`
--

CREATE TABLE `index_biotic` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `nilai_awal` decimal(10,2) NOT NULL,
  `nilai_akhir` decimal(10,2) NOT NULL,
  `bobot` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `index_biotic`
--

INSERT INTO `index_biotic` (`id`, `name`, `nilai_awal`, `nilai_akhir`, `bobot`) VALUES
(2, 'Diversity', '0.00', '1.99', '3.00'),
(3, 'Diversity', '2.00', '2.99', '6.00'),
(4, 'Diversity', '3.00', '4.00', '10.00'),
(5, 'Dominance', '0.00', '0.31', '10.00'),
(6, 'Dominance', '0.32', '0.68', '6.00'),
(7, 'Dominance', '0.69', '1.00', '3.00'),
(8, 'Number of Species', '0.00', '49.00', '3.00'),
(9, 'Number of Species', '50.00', '99.00', '6.00'),
(10, 'Number of Species', '99.01', '99999999.99', '10.00'),
(11, 'Similarity', '0.00', '0.49', '3.00'),
(12, 'Similarity', '0.50', '0.69', '6.00'),
(13, 'Similarity', '0.70', '1.00', '10.00'),
(14, 'Total Abundance', '0.00', '499.00', '3.00'),
(15, 'Total Abundance', '500.00', '999.00', '6.00'),
(16, 'Total Abundance', '999.01', '99999999.99', '10.00');

-- --------------------------------------------------------

--
-- Table structure for table `main_abiotic`
--

CREATE TABLE `main_abiotic` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `geographical_zone` int(11) NOT NULL,
  `type_water` int(11) NOT NULL,
  `nilai_awal` decimal(10,2) NOT NULL,
  `nilai_akhir` decimal(10,2) NOT NULL,
  `bobot` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_abiotic`
--

INSERT INTO `main_abiotic` (`id`, `name`, `geographical_zone`, `type_water`, `nilai_awal`, `nilai_akhir`, `bobot`) VALUES
(2, 'Salinity', 3, 1, '0.00', '27.99', '1.00'),
(3, 'Salinity', 3, 1, '28.00', '31.99', '2.00'),
(4, 'Salinity', 3, 1, '32.00', '38.00', '3.00'),
(5, 'Salinity', 3, 1, '38.01', '41.00', '2.00'),
(6, 'Salinity', 3, 1, '41.01', '9999999.99', '1.00'),
(7, 'Salinity', 3, 2, '0.00', '0.50', '3.00'),
(8, 'Salinity', 3, 2, '0.51', '4.00', '2.00'),
(9, 'Salinity', 3, 2, '4.01', '99999999.99', '1.00'),
(10, 'Salinity', 3, 3, '0.00', '2.99', '1.00'),
(11, 'Salinity', 3, 3, '3.00', '4.99', '2.00'),
(12, 'Salinity', 3, 3, '5.00', '25.00', '3.00'),
(13, 'Salinity', 3, 3, '25.01', '30.00', '2.00'),
(14, 'Salinity', 3, 3, '30.01', '99999999.99', '1.00'),
(15, 'Temperature', 2, 4, '0.00', '2.99', '1.00'),
(16, 'Temperature', 2, 4, '3.00', '4.99', '2.00'),
(17, 'Temperature', 2, 4, '5.00', '22.00', '3.00'),
(18, 'Temperature', 2, 4, '22.01', '25.00', '2.00'),
(19, 'Temperature', 2, 4, '25.01', '100.00', '1.00'),
(20, 'Temperature', 1, 4, '0.00', '13.99', '1.00'),
(21, 'Temperature', 1, 4, '14.00', '17.99', '2.00'),
(22, 'Temperature', 1, 4, '18.00', '28.00', '3.00'),
(23, 'Temperature', 1, 4, '28.01', '32.00', '2.00'),
(24, 'Temperature', 1, 4, '32.01', '100.00', '1.00'),
(25, 'DO', 3, 4, '0.00', '3.99', '1.00'),
(26, 'DO', 3, 4, '4.00', '5.99', '2.00'),
(27, 'DO', 3, 4, '6.00', '13.00', '3.00'),
(28, 'PH', 3, 4, '0.00', '4.99', '1.00'),
(29, 'PH', 3, 4, '5.00', '6.99', '2.00'),
(30, 'PH', 3, 4, '7.00', '8.00', '3.00'),
(31, 'PH', 3, 4, '8.01', '9.00', '2.00'),
(32, 'PH', 3, 4, '9.01', '14.00', '1.00');

-- --------------------------------------------------------

--
-- Table structure for table `main_abiotic_station`
--

CREATE TABLE `main_abiotic_station` (
  `id` int(11) NOT NULL,
  `salinity` varchar(12) NOT NULL,
  `bobot_salinity` decimal(10,2) NOT NULL,
  `temperature` varchar(12) NOT NULL,
  `bobot_temperature` decimal(10,2) NOT NULL,
  `do` varchar(12) NOT NULL,
  `bobot_do` decimal(10,2) NOT NULL,
  `ph` varchar(12) NOT NULL,
  `bobot_ph` decimal(10,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `station_id` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_abiotic_station`
--

INSERT INTO `main_abiotic_station` (`id`, `salinity`, `bobot_salinity`, `temperature`, `bobot_temperature`, `do`, `bobot_do`, `ph`, `bobot_ph`, `user_id`, `station_id`) VALUES
(20, '33.1', '3.00', '33.9', '1.00', '4.37', '2.00', '6.4', '2.00', 2, 'PolikulturTmbk'),
(22, '31.5', '2.00', '31.40', '2.00', '3.63', '1.00', '4.32', '1.00', 2, 'Pesisir'),
(23, '', '3.00', '', '3.00', '', '3.00', '', '3.00', 2, 'TambakEmas');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `membership_id` int(11) NOT NULL,
  `status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`membership_id`, `status`) VALUES
(1, 'Trial'),
(2, 'Monthly'),
(3, 'Annual'),
(4, 'Admin/Operator');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `bukti` varchar(256) NOT NULL,
  `datetime` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_email`, `bukti`, `datetime`, `status`) VALUES
(8, 'bayuw@gmail.com', '1632472055Struk-Transfer.jpg', '2021-09-24 15:27:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `result` decimal(10,2) NOT NULL,
  `status` varchar(256) NOT NULL,
  `conclusion` varchar(256) NOT NULL,
  `recommendation` varchar(256) NOT NULL,
  `station_id` varchar(14) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `result`, `status`, `conclusion`, `recommendation`, `station_id`, `user_id`) VALUES
(9, '60.00', 'Undisturbed Area', 'Water environment condition is healthy, within normal range and undisturbed (Undisturbed Areas)', 'Keep the carrying capacity of the environment (environmental carrying capacity) under normal/ stable conditions (equilibrium)', 'Karimunjawa', 3),
(12, '43.50', 'Lightly Disturbed Area', 'The aquatic environment is disrupted light level by the surrounding activity (Lightly Disturbed Areas)', 'Further monitoring of local environmental conditions is needed and also needed to identifies the underlying causes of environmental disturbance', 'PolikulturTmbk', 2),
(13, '27.00', 'Moderately Disturbed Area', 'The aquatic environment is disrupted medium level by the surrounding activity  (Moderately Disturbed Areas)', 'Further investigation and the application of biomonitoring on a regular basis is necessary to determine the factors causing environmental disturbance and decreased activity', 'Pesisir', 2),
(14, '56.00', 'Undisturbed Area', 'Water environment condition is healthy, within normal range and undisturbed (Undisturbed Areas)', 'Keep the carrying capacity of the environment (environmental carrying capacity) under normal/ stable conditions (equilibrium)', 'TambakEmas', 2);

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE `species` (
  `id` int(11) NOT NULL,
  `family` varchar(256) NOT NULL,
  `species` varchar(256) NOT NULL,
  `abundance` int(255) NOT NULL,
  `taxa_indicator` decimal(10,2) NOT NULL,
  `station_id` varchar(14) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`id`, `family`, `species`, `abundance`, `taxa_indicator`, `station_id`, `user_id`) VALUES
(40, 'Potamididae', 'Cerithideopsis fuscata', 10, '0.00', 'PolikulturTmbk', 2),
(41, 'Potamididae', 'Cerithideopsis costata', 6, '0.00', 'PolikulturTmbk', 2),
(42, 'Potamididae', 'Cerithidea anticipata', 7, '0.00', 'PolikulturTmbk', 2),
(43, 'Potamididae', 'Cerithidea baltea', 3, '0.00', 'PolikulturTmbk', 2),
(44, 'Mytilidae', 'Adipicola crypta', 9, '0.00', 'PolikulturTmbk', 2),
(45, 'Batillariidae', 'Lampanella minima', 7, '0.00', 'PolikulturTmbk', 2),
(46, 'Thiaridae', 'Sermyla riqueti', 3, '4.00', 'PolikulturTmbk', 2),
(47, 'Nereidae', 'Alitta virens', 1, '0.00', 'PolikulturTmbk', 2),
(48, 'Cirratulidae', 'Cirratulus abranchiatus', 10, '6.00', 'Pesisir', 2),
(50, 'Capitellidae', 'Capitella capitata', 1, '6.00', 'Pesisir', 2),
(51, 'Thiaridae', 'Tarebia granifera', 2, '4.00', 'Pesisir', 2),
(52, 'Eunicidae', 'Cerithideopsis costata', 32, '4.00', 'TambakEmas', 2);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `id` int(11) NOT NULL,
  `station_id` varchar(14) NOT NULL,
  `geographical_zone` int(11) NOT NULL,
  `type_water` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`id`, `station_id`, `geographical_zone`, `type_water`, `user_id`) VALUES
(30, 'PolikulturTmbk', 1, 1, 2),
(32, 'Pesisir', 1, 1, 2),
(33, 'TambakEmas', 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `type_water`
--

CREATE TABLE `type_water` (
  `id` int(11) NOT NULL,
  `water` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_water`
--

INSERT INTO `type_water` (`id`, `water`) VALUES
(1, 'Marine Water'),
(2, 'Fresh Water'),
(3, 'Estuarine Water'),
(4, '-');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `membership` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `membership`) VALUES
(2, 'Randy Wahyu Pe', 'randy@gmail.com', 'default.jpg', '$2y$10$QC97X0zhfsPZjRIVkG5nbOs9lLOPkU1faQz2EBWuiNmmNpoi8D3NG', 2, 1, 1596658120, 2),
(3, 'Randy Wahyu', 'randy1@gmail.com', 'default.jpg', '$2y$10$9pA3QrGWoIttdmfG7Vr46eU3z8xZNLdjH6h90QOgt5RykrO.9qGd6', 1, 1, 1597352392, 3),
(4, 'Randy W', 'randy2@gmail.com', 'default.jpg', '$2y$10$Dh2Z8Vj.FC52eDPan5.cBuuYtMibDyFlazw5mWeN.EVvCXwlvnWt.', 3, 1, 1597352461, 4),
(6, 'Randy', 'randy4@gmail.com', 'default.jpg', '$2y$10$D.GmLTWzc4Hgizi4lgMrDO0.ek5PpSezY4OAPVHcswbO/7YsoJjOC', 2, 0, 1630674590, 3),
(11, 'Bayu', 'bayuw@gmail.com', 'default.jpg', '$2y$10$1OrCqLIl.mf9JeLOtcCzZe7K1vmjtqPZRuvooRBG2fnTMaxKG/8rO', 2, 0, 1632472040, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Operator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_abiotic`
--
ALTER TABLE `additional_abiotic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `family_biotic`
--
ALTER TABLE `family_biotic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `index_add_station`
--
ALTER TABLE `index_add_station`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `index_biotic`
--
ALTER TABLE `index_biotic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_abiotic`
--
ALTER TABLE `main_abiotic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_abiotic_station`
--
ALTER TABLE `main_abiotic_station`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additional_abiotic`
--
ALTER TABLE `additional_abiotic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `family_biotic`
--
ALTER TABLE `family_biotic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `index_add_station`
--
ALTER TABLE `index_add_station`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `index_biotic`
--
ALTER TABLE `index_biotic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `main_abiotic`
--
ALTER TABLE `main_abiotic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `main_abiotic_station`
--
ALTER TABLE `main_abiotic_station`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `species`
--
ALTER TABLE `species`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
