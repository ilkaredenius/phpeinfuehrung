-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 22. Feb 2023 um 10:06
-- Server-Version: 10.4.27-MariaDB
-- PHP-Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `training`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `excercise`
--

CREATE TABLE `excercise` (
  `id` int(11) NOT NULL,
  `split_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `sets` int(11) NOT NULL,
  `reps` int(11) NOT NULL,
  `sequence` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `excercise`
--

INSERT INTO `excercise` (`id`, `split_id`, `user_id`, `name`, `number`, `sets`, `reps`, `sequence`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 'Kniebeuge', 3, 2, 5, 4, '2023-02-21', '2023-02-21'),
(3, 2, 1, 'Kniebeuge', 3, 1, 5, 4, '2023-02-21', '2023-02-21'),
(4, 2, 1, 'Kniebeuge', 3, 1, 5, 4, '2023-02-21', '2023-02-21');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `tabellex` (
  `Spaltea` int(11) null,
  `Spalteb` varchar(255) not null,
  `Spaltec` int(11) null
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
-- Daten für Tabelle `person`
--

INSERT INTO `person` (`id`, `firstname`, `lastname`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Ilka', 'Redenius', '', '', '2023-02-21', '2023-02-21'),
(3, 'Ilka', 'Redenius', '', '', '2023-02-21', '2023-02-21');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sets`
--

CREATE TABLE `sets` (
  `id` int(11) NOT NULL,
  `training_id` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `repetitions` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `sets`
--

INSERT INTO `sets` (`id`, `training_id`, `weight`, `repetitions`, `created_at`, `updated_at`) VALUES
(1, 2, 50, 2, '2023-02-21', '2023-02-21');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `split`
--

CREATE TABLE `split` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `part` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `split`
--

INSERT INTO `split` (`id`, `name`, `part`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-02-21', '2023-02-21'),
(2, 2, 1, '2023-02-21', '2023-02-21'),
(3, 2, 2, '2023-02-21', '2023-02-21'),
(4, 3, 1, '2023-02-21', '2023-02-21'),
(5, 3, 2, '2023-02-21', '2023-02-21'),
(6, 3, 3, '2023-02-21', '2023-02-21'),
(7, 4, 1, '2023-02-21', '2023-02-21'),
(8, 4, 2, '2023-02-21', '2023-02-21'),
(9, 4, 3, '2023-02-21', '2023-02-21'),
(10, 4, 4, '2023-02-21', '2023-02-21'),
(11, 5, 1, '2023-02-21', '2023-02-21'),
(12, 5, 2, '2023-02-21', '2023-02-21'),
(13, 5, 3, '2023-02-21', '2023-02-21'),
(14, 5, 4, '2023-02-21', '2023-02-21'),
(15, 5, 5, '2023-02-21', '2023-02-21'),
(16, 6, 1, '2023-02-21', '2023-02-21'),
(17, 6, 2, '2023-02-21', '2023-02-21'),
(18, 6, 3, '2023-02-21', '2023-02-21'),
(19, 6, 4, '2023-02-21', '2023-02-21'),
(20, 6, 5, '2023-02-21', '2023-02-21'),
(21, 6, 6, '2023-02-21', '2023-02-21'),
(22, 7, 1, '2023-02-21', '2023-02-21'),
(23, 7, 2, '2023-02-21', '2023-02-21'),
(24, 7, 3, '2023-02-21', '2023-02-21'),
(25, 7, 4, '2023-02-21', '2023-02-21'),
(26, 7, 5, '2023-02-21', '2023-02-21'),
(27, 7, 6, '2023-02-21', '2023-02-21'),
(28, 7, 7, '2023-02-21', '2023-02-21');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `excercise_id` int(11) NOT NULL,
  `user_weight` int(11) NOT NULL,
  `user_scope` int(11) NOT NULL,
  `user_leg` double NOT NULL,
  `user_arm` double NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `training`
--

INSERT INTO `training` (`id`, `user_id`, `day`, `excercise_id`, `user_weight`, `user_scope`, `user_leg`, `user_arm`, `created_at`, `updated_at`) VALUES
(1, 1, 2023, 1, 70, 90, 40, 20, '2023-02-21', '2023-02-21');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `excercise`
--
ALTER TABLE `excercise`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `sets`
--
ALTER TABLE `sets`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `split`
--
ALTER TABLE `split`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `excercise`
--
ALTER TABLE `excercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `sets`
--
ALTER TABLE `sets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `split`
--
ALTER TABLE `split`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT für Tabelle `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
