-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Лис 26 2024 р., 14:03
-- Версія сервера: 10.4.32-MariaDB
-- Версія PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `military_district`
--

-- --------------------------------------------------------

--
-- Структура таблиці `logistics`
--

CREATE TABLE `logistics` (
  `logistics_id` int(11) NOT NULL,
  `resource_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп даних таблиці `logistics`
--

INSERT INTO `logistics` (`logistics_id`, `resource_id`, `unit_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 1),
(4, 4, 3),
(5, 5, 2),
(6, 1, 4),
(7, 2, 5),
(8, 3, 6),
(9, 4, 7),
(10, 5, 8);

-- --------------------------------------------------------

--
-- Структура таблиці `medicalstaff`
--

CREATE TABLE `medicalstaff` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `specialization` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп даних таблиці `medicalstaff`
--

INSERT INTO `medicalstaff` (`id`, `name`, `specialization`) VALUES
(1, 'John Doe', 'Surgeon'),
(2, 'Jane Smith', 'Nurse'),
(3, 'James Wilson', 'Cardiologist'),
(4, 'Sarah Johnson', 'General Practitioner'),
(5, 'Emily Davis', 'Orthopedic'),
(6, 'Michael Brown', 'Psychiatrist'),
(7, 'Linda Clark', 'Pediatrician'),
(8, 'David Miller', 'Dermatologist'),
(9, 'Barbara Moore', 'Neurologist'),
(10, 'Robert Taylor', 'Radiologist');

-- --------------------------------------------------------

--
-- Структура таблиці `officer`
--

CREATE TABLE `officer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rank` varchar(255) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп даних таблиці `officer`
--

INSERT INTO `officer` (`id`, `name`, `rank`, `unit_id`) VALUES
(1, 'Alexander Johnson', 'Captain', 1),
(2, 'Samuel Edwards', 'Lieutenant', 2),
(3, 'William Roberts', 'Major', 3),
(4, 'Michael Taylor', 'Lieutenant', 4),
(5, 'Daniel Clark', 'Colonel', 5),
(6, 'Matthew Lewis', 'Major', 6),
(7, 'Christopher Walker', 'Captain', 7),
(8, 'Andrew Young', 'Lieutenant', 8),
(9, 'Joshua Martinez', 'Colonel', 9),
(10, 'Nicholas Allen', 'Major', 10);

-- --------------------------------------------------------

--
-- Структура таблиці `operation`
--

CREATE TABLE `operation` (
  `operation_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `plan` text DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп даних таблиці `operation`
--

INSERT INTO `operation` (`operation_id`, `name`, `plan`, `order_id`) VALUES
(1, 'Operation Dawn', 'Plan A', 1),
(2, 'Operation Shield', 'Plan B', 2),
(3, 'Operation Eagle', 'Plan C', 3),
(4, 'Operation Lion', 'Plan D', 4),
(5, 'Operation Phoenix', 'Plan E', 5),
(6, 'Operation Thunder', 'Plan F', 6),
(7, 'Operation Horizon', 'Plan G', 7),
(8, 'Operation Sky', 'Plan H', 8),
(9, 'Operation Star', 'Plan I', 9),
(10, 'Operation Sword', 'Plan J', 10);

-- --------------------------------------------------------

--
-- Структура таблиці `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `officer_id` int(11) DEFAULT NULL,
  `soldier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп даних таблиці `order`
--

INSERT INTO `order` (`id`, `date`, `officer_id`, `soldier_id`) VALUES
(1, '2024-10-01', 1, 1),
(2, '2024-10-02', 2, 2),
(3, '2024-10-03', 3, 3),
(4, '2024-10-04', 4, 4),
(5, '2024-10-05', 5, 5),
(6, '2024-10-06', 6, 6),
(7, '2024-10-07', 7, 7),
(8, '2024-10-08', 8, 8),
(9, '2024-10-09', 9, 9),
(10, '2024-10-10', 10, 10);

-- --------------------------------------------------------

--
-- Структура таблиці `resourceprovision`
--

CREATE TABLE `resourceprovision` (
  `id` int(11) NOT NULL,
  `resource_type` varchar(255) DEFAULT NULL,
  `quantity_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп даних таблиці `resourceprovision`
--

INSERT INTO `resourceprovision` (`id`, `resource_type`, `quantity_id`, `unit_id`) VALUES
(1, 'Food Supplies', 100, 1),
(2, 'Ammunition', 200, 2),
(3, 'Medical Kits', 150, 3),
(4, 'Fuel', 120, 4),
(5, 'Clothing', 300, 5),
(6, 'Water', 180, 6),
(7, 'Building Materials', 50, 7),
(8, 'Vehicles', 30, 8),
(9, 'Communication Equipment', 25, 9),
(10, 'Field Tools', 40, 10);

-- --------------------------------------------------------

--
-- Структура таблиці `soldier`
--

CREATE TABLE `soldier` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rank` varchar(255) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп даних таблиці `soldier`
--

INSERT INTO `soldier` (`id`, `name`, `rank`, `unit_id`) VALUES
(1, 'John Smith', 'Private', 1),
(2, 'David Johnson', 'Corporal', 2),
(3, 'Michael Brown', 'Sergeant', 3),
(4, 'Chris Evans', 'Lieutenant', 4),
(5, 'Eric Wilson', 'Captain', 5),
(6, 'James Moore', 'Private', 6),
(7, 'Kevin Thomas', 'Sergeant', 7),
(8, 'George White', 'Corporal', 8),
(9, 'Henry Harris', 'Lieutenant', 9),
(10, 'Jack Martin', 'Private', 10);

-- --------------------------------------------------------

--
-- Структура таблиці `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `readiness_status` varchar(255) DEFAULT NULL,
  `health_status` varchar(255) DEFAULT NULL,
  `medical_staff_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп даних таблиці `unit`
--

INSERT INTO `unit` (`id`, `readiness_status`, `health_status`, `medical_staff_id`) VALUES
(1, 'Ready', 'Good', 1),
(2, 'Standby', 'Fair', 2),
(3, 'Active', 'Good', 3),
(4, 'Deployed', 'Fair', 4),
(5, 'Inactive', 'Poor', 5),
(6, 'Reserve', 'Good', 6),
(7, 'Alert', 'Good', 7),
(8, 'Standby', 'Good', 8),
(9, 'Deployed', 'Poor', 9),
(10, 'Inactive', 'Fair', 10);

-- --------------------------------------------------------

--
-- Структура таблиці `usertbl`
--

CREATE TABLE `usertbl` (
  `id` int(11) NOT NULL,
  `full_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп даних таблиці `usertbl`
--

INSERT INTO `usertbl` (`id`, `full_name`, `email`, `username`, `password`) VALUES
(1, 'Yurets Serhiienko', 'iamyurets@mail.com', 'serhienko y.s.', '123456');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `medicalstaff`
--
ALTER TABLE `medicalstaff`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `officer`
--
ALTER TABLE `officer`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `officer`
--
ALTER TABLE `officer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблиці `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
