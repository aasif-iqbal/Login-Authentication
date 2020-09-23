-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 23, 2020 at 09:23 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users_login_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `email`, `password`, `confirm_password`, `token`, `status`) VALUES
(1, 'javascriptDev', 'javascriptdev067@gmail.com', 'fc5e038d38a57032085441e7fe7010b0', 'fc5e038d38a57032085441e7fe7010b0', '6b4c314cb2cab6fe4d97f48c82e8d2', 1),
(2, 'johnDeo11', 'johndeo@gmail.com', '83354342045a1a38af2d16c01428cc80', '83354342045a1a38af2d16c01428cc80', '4ab937b0436a5b34e3e8b9d1d31e7a', 1),
(3, 'Sid_deo', 'sid439889@gmail.com', '97cbc5f9423905429600954f50e31f5e', '97cbc5f9423905429600954f50e31f5e', 'be5ebf9d335a6fc902b3ad9d6735ff', 0),
(4, 'Arman_raza12', 'arman_raza12@gmail.com', '29ade523552d2a28f07beef050f57f97', '29ade523552d2a28f07beef050f57f97', '111c02a1d31a33c39a193a59a3fc95', 0),
(5, 'will_smith5455', 'smith5455@gmail.com', '25be44605e7063e6bd722eb5128bcde4', '25be44605e7063e6bd722eb5128bcde4', '66e0f1df69c70d8bebdf19af763c9f', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
