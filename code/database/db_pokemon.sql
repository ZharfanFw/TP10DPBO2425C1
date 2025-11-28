-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 28, 2025 at 05:05 PM
-- Server version: 12.1.2-MariaDB
-- PHP Version: 8.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pokemon`
--

-- --------------------------------------------------------

--
-- Table structure for table `pokemons`
--

CREATE TABLE `pokemons` (
  `pokemon_id` int(11) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `species` varchar(100) NOT NULL,
  `photo` varchar(255) DEFAULT 'default.png',
  `trainer_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `type_id_2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pokemons`
--

INSERT INTO `pokemons` (`pokemon_id`, `nickname`, `species`, `photo`, `trainer_id`, `type_id`, `type_id_2`) VALUES
(2, 'Starmie', 'Starmie', 'https://upload.wikimedia.org/wikipedia/en/5/56/Starmie.png', 2, 2, NULL),
(3, 'Charizard', 'Charizard', 'https://upload.wikimedia.org/wikipedia/id/9/95/Charizard.png', 1, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `region_id` int(11) NOT NULL,
  `region_name` varchar(50) NOT NULL,
  `professor` varchar(100) DEFAULT 'Unknown'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`region_id`, `region_name`, `professor`) VALUES
(1, 'Kanto', 'Professor Oak'),
(2, 'Johto', 'Professor Elm'),
(3, 'Hoenn', 'Professor Birch'),
(4, 'Sinnoh', 'Professor Rowan'),
(5, 'Unova', 'Professor Juniper'),
(6, 'Kalos', 'Professor Sycamore'),
(7, 'Alola', 'Professor Kukui'),
(8, 'Galar', 'Professor Magnolia'),
(9, 'Paldea', 'Prof. Sada & Prof. Turo');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `trainer_id` int(11) NOT NULL,
  `trainer_name` varchar(100) NOT NULL,
  `level` int(11) DEFAULT 1,
  `region_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`trainer_id`, `trainer_name`, `level`, `region_id`) VALUES
(1, 'Ash Ketchum', 10, 1),
(2, 'Misty', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL,
  `badge_color` varchar(20) DEFAULT '#A8A77A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`type_id`, `type_name`, `badge_color`) VALUES
(1, 'Fire', '#EE8130'),
(2, 'Water', '#6390F0'),
(3, 'Grass', '#7AC74C'),
(4, 'Normal', '#A8A77A'),
(5, 'Electric', '#F7D02C'),
(6, 'Ice', '#96D9D6'),
(7, 'Fighting', '#C22E28'),
(8, 'Poison', '#A33EA1'),
(9, 'Ground', '#E2BF65'),
(10, 'Flying', '#A98FF3'),
(11, 'Psychic', '#F95587'),
(12, 'Bug', '#A6B91A'),
(13, 'Rock', '#B6A136'),
(14, 'Ghost', '#735797'),
(15, 'Dragon', '#6F35FC'),
(16, 'Steel', '#B7B7CE'),
(17, 'Dark', '#705746'),
(18, 'Fairy', '#D685AD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pokemons`
--
ALTER TABLE `pokemons`
  ADD PRIMARY KEY (`pokemon_id`),
  ADD KEY `trainer_id` (`trainer_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `type_id_2` (`type_id_2`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`region_id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`trainer_id`),
  ADD KEY `region_id` (`region_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pokemons`
--
ALTER TABLE `pokemons`
  MODIFY `pokemon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `region_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `trainer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pokemons`
--
ALTER TABLE `pokemons`
  ADD CONSTRAINT `1` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`trainer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `2` FOREIGN KEY (`type_id`) REFERENCES `types` (`type_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `3` FOREIGN KEY (`type_id_2`) REFERENCES `types` (`type_id`) ON DELETE SET NULL;

--
-- Constraints for table `trainers`
--
ALTER TABLE `trainers`
  ADD CONSTRAINT `1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`region_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
