-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 08, 2026 at 03:08 AM
-- Server version: 8.0.45-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tolist_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int NOT NULL,
  `course_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`) VALUES
(1, 'Algoritma Pemrograman'),
(2, 'Kalkulus'),
(3, 'Big Data'),
(4, 'Kimia'),
(5, 'Dasar-dasar perangkat lunak'),
(6, 'permancingan');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `course_id` int DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `file_path` varchar(255) NOT NULL,
  `tags` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `course_id`, `title`, `description`, `file_path`, `tags`, `created_at`) VALUES
(1, 5, 3, 'Catatan big data pert-1', 'membahas pengenalan big data', 'img/buku.jpg', 'data', '2026-04-03 17:39:37'),
(2, 2, 5, 'DDPL pertemuan ke-1', 'membahas apa itu perangkat lunak', 'img/buku.jpg', 'software', '2026-04-03 17:39:37'),
(3, 1, 1, 'Pengenalan Basis Data Relasional', 'Membahas konsep dasar RDBMS, Tabel, Primary Key, dan Foreign Key.', 'img/db_intro.jpg', 'database', '2026-04-01 02:00:00'),
(4, 2, 2, 'Struktur Data: Linked List', 'Penjelasan mengenai Single Linked List dan Double Linked List beserta implementasinya.', 'img/ds_linkedlist.png', 'coding', '2026-04-01 03:30:00'),
(5, 1, 3, 'Algoritma Sorting', 'Mempelajari Bubble Sort, Quick Sort, dan Merge Sort beserta kompleksitas waktunya.', 'img/algo_sort.jpg', 'algorithm', '2026-04-02 04:15:00'),
(6, 3, 1, 'Query SQL Lanjutan', 'Latihan menggunakan JOIN, GROUP BY, dan Subqueries pada MySQL.', 'img/sql_adv.jpg', 'database', '2026-04-03 07:00:00'),
(7, 4, 4, 'Dasar-Dasar Jaringan Komputer', 'Memahami Model OSI 7 Layer dan cara kerja protokol TCP/IP.', 'img/network_basic.png', 'network', '2026-04-04 01:45:00'),
(8, 5, 5, 'Pemrograman Web dengan MVC', 'Konsep dasar Model-View-Controller dan pemisahan logika aplikasi.', 'img/mvc_pattern.png', 'web', '2026-04-04 06:20:00'),
(9, 2, 2, 'Struktur Data: Stack & Queue', 'Cara kerja tumpukan (LIFO) dan antrean (FIFO) dalam pemrograman.', 'img/buku.jpg', 'coding', '2026-04-04 08:10:00'),
(10, 1, 4, 'Konfigurasi IP Address', 'Tutorial cara setting IP Static dan DHCP pada sistem operasi Linux.', 'img/buku.jpg', 'network', '2026-04-04 15:30:00'),
(11, 1, 4, 'qfqefqqef', 'qefnqoefnq', 'img/69d23abf1eb26.png', 'coding', '2026-04-05 10:34:39'),
(12, 1, 6, 'mancing', 'mancing ikan di empang', 'img/69d245b2e7015.png', 'ikan', '2026-04-05 11:21:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '123', '2026-03-31 07:31:18'),
(2, 'nopal', '1234', '2026-03-31 08:21:53'),
(3, 'amsal', '000', '2026-03-31 08:31:30'),
(4, 'tes', 'tes', '2026-03-31 08:34:13'),
(5, 'ilham', 'ilham123', '2026-03-31 09:13:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
