-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2024 at 02:18 PM
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
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `co_id` int(10) NOT NULL,
  `co_name` varchar(20) NOT NULL,
  `co_email` varchar(30) NOT NULL,
  `co_body` varchar(500) NOT NULL,
  `co_status` tinyint(1) NOT NULL,
  `crated_at` date NOT NULL DEFAULT current_timestamp(),
  `p_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lookup`
--

CREATE TABLE `tbl_lookup` (
  `l_id` int(10) NOT NULL,
  `l_name` varchar(300) NOT NULL,
  `l_code` int(15) NOT NULL,
  `l_type` int(10) NOT NULL,
  `l_position` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `p_id` int(10) NOT NULL,
  `p_title` varchar(50) NOT NULL,
  `p_body` int(20) NOT NULL,
  `p_status` int(1) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `u_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tag`
--

CREATE TABLE `tbl_tag` (
  `t_id` int(10) NOT NULL,
  `t_name` varchar(20) NOT NULL,
  `t_frquency` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `u_id` int(10) NOT NULL,
  `u_email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`co_id`),
  ADD UNIQUE KEY `eml_unique` (`co_email`),
  ADD KEY `fk-comment` (`p_id`);

--
-- Indexes for table `tbl_lookup`
--
ALTER TABLE `tbl_lookup`
  ADD PRIMARY KEY (`l_id`),
  ADD UNIQUE KEY `pstn_unique` (`l_position`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `fk-post` (`u_id`);

--
-- Indexes for table `tbl_tag`
--
ALTER TABLE `tbl_tag`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `nm_unique` (`t_name`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `eml_unique` (`u_email`),
  ADD UNIQUE KEY `usrnm_unique` (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `fk-comment` FOREIGN KEY (`p_id`) REFERENCES `tbl_post` (`p_id`);

--
-- Constraints for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `fk-post` FOREIGN KEY (`u_id`) REFERENCES `tbl_user` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
