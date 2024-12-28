-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 28, 2024 at 12:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `excerpt` varchar(200) NOT NULL,
  `content` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `excerpt`, `content`, `user_id`, `created_at`) VALUES
(9, 'Cumque explicabo Mo', 'Cumque explicabo Mo', 'Provident amet ea', 1, '2024-11-10'),
(10, 'Cumque cum est conse', 'Necessitatibus animi', 'Numquam do voluptate', 1, '2024-11-10'),
(11, 'Dolorum culpa et ius', 'Et autem vero fugiat', 'Velit dolor sapient', 2, '2024-11-10'),
(12, 'Necessitatibus conse', 'Minima velit et esse', 'Quae rerum rerum in', 2, '2024-11-10'),
(15, 'Qui corrupti eius n', 'Voluptatem harum vol', 'Officiis voluptate d', 3, '2024-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT '/uploads/avatar.jpg',
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `avatar`, `created_at`) VALUES
(1, 'user', '$2y$10$ziDEZ0ithojremEKLKE8X.ligDhVKIvOmsW7/ENEIlxjQIMoip0Pe', 'user@gmail.com', '/uploads/avatar.jpg', '2024-11-10'),
(2, 'user2', '$2y$10$sH15j2jMofCvoW30.zJBjeCtDh.VSG6a2m4da.uH6r7/FEr4OPMLu', 'user2@gmail.com', '/uploads/avatar.jpg', '2024-11-10'),
(3, 'user22', '$2y$10$dDsn/RPfn47rfKj8LE8f1eYCgRiuROHEgXy6.o5wY387iavn5g/MO', 'user22@gmail.com', '/uploads/avatar.jpg', '2024-12-27'),
(4, 'dmkur', '$2y$10$5Xb52vCQdpZkl2ubpCgtFe2UlTSAstk5ZlhSgauz5e0fOpDSiUgvG', 'dmkur@gmail.com', '/uploads/avatar.jpg', '2024-12-27'),
(12, 'new', '$2y$10$50WcGsKSeJX.ZGm9kdfQDOZvrpwlnEg5D5D73SCTyl5VbesoQ1Zjm', 'new@new', '/uploads/avatars/2024/12/28/avatar-12.png', '2024-12-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
