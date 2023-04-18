-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2023 at 09:28 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sandy`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `img_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `timesatmp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `img_id`, `username`, `comment`, `timesatmp`) VALUES
(10, 21, 'wild_boar', 'big fan', '2023-04-11 06:35:09'),
(11, 22, 'tanjiro_kamado', 'yes', '2023-04-11 06:39:20'),
(12, 21, 'tanjiro_kamado', 'inspiration', '2023-04-11 06:39:30'),
(13, 23, 'nezu_ko', '<3', '2023-04-11 06:45:18'),
(14, 24, 'sound_hashira', 'cute', '2023-04-11 06:46:28'),
(15, 24, 'tanjiro_kamado', 'nezuko kawaii', '2023-04-11 06:47:40'),
(16, 23, 'sound_hashira', 'best silblings ', '2023-04-11 15:39:15'),
(17, 21, 'nezu_ko', 'yaay', '2023-04-11 15:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `uname` varchar(100) NOT NULL,
  `likes` bigint(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `filename`, `description`, `created_at`, `uname`, `likes`) VALUES
(21, 't_1.jpg', 'strongest hashira', '2023-04-11 06:34:05', 'sound_hashira', 4),
(22, 'inosuke_1.jpg', 'the strongest here', '2023-04-11 06:37:44', 'wild_boar', 3),
(23, 'tk_2.jpg', 'with @nezu_ko', '2023-04-11 06:39:49', 'tanjiro_kamado', 4),
(24, 'nez_11.jpg', 'kimono <3', '2023-04-11 06:45:53', 'nezu_ko', 4);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `username`, `created_at`) VALUES
(17, 21, 'wild_boar', '2023-04-11 06:35:03'),
(18, 21, 'tanjiro_kamado', '2023-04-11 06:38:58'),
(19, 22, 'tanjiro_kamado', '2023-04-11 06:39:03'),
(20, 22, 'nezu_ko', '2023-04-11 06:45:01'),
(21, 21, 'nezu_ko', '2023-04-11 06:45:05'),
(22, 23, 'nezu_ko', '2023-04-11 06:45:10'),
(23, 23, 'sound_hashira', '2023-04-11 06:46:19'),
(24, 24, 'sound_hashira', '2023-04-11 06:46:22'),
(25, 23, 'wild_boar', '2023-04-11 06:47:00'),
(26, 24, 'wild_boar', '2023-04-11 06:47:03'),
(27, 24, 'tanjiro_kamado', '2023-04-11 06:47:29'),
(28, 23, 'tanjiro_kamado', '2023-04-11 06:47:59'),
(29, 21, 'sound_hashira', '2023-04-11 10:20:16'),
(30, 22, 'sound_hashira', '2023-04-11 15:39:21'),
(31, 24, 'nezu_ko', '2023-04-11 15:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `fn` varchar(256) NOT NULL,
  `eid` varchar(256) NOT NULL,
  `dob` date NOT NULL,
  `gen` varchar(30) NOT NULL,
  `phno` int(255) NOT NULL,
  `uname` varchar(256) NOT NULL,
  `pass` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`fn`, `eid`, `dob`, `gen`, `phno`, `uname`, `pass`) VALUES
('Tengen Uzui', 'sound@gmail.com', '1111-11-11', '', 2147483647, 'sound_hashira', '3wives'),
('Inosuke Hashibara', 'wildboar@gmail.com', '2222-02-22', '', 2147483647, 'wild_boar', 'intuition'),
('Tanjiro', 'tanjirokamado@gmail.com', '3333-03-31', 'on', 2147483647, 'tanjiro_kamado', 'fireson'),
('Nezuko', 'nezuko@gmail.com', '4444-04-04', 'on', 2147483647, 'nezu_ko', 'bamboo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
