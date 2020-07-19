-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2020 at 06:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_php-dasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` char(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id`, `nim`, `name`, `email`, `jurusan`, `gambar`) VALUES
(1, '190030209', 'Erik Cahya Pradana 23', 'erikcp38@gmail.com', 'Sistem Informatika', 'img1.jpg'),
(2, '190030066', 'Dewi Indah', 'dewi@gmail.com', 'Sistem Informasi', 'img2.jpg'),
(3, '190030299', 'Bagus Tedjoe Kusuma', 'Tedjo221@gmail.com', 'Sistem Komputer', 'img3.jpg'),
(4, '180050205', 'Hamid Ali', 'alihamid@rocketmail.com', 'Sistem Informasi', 'img4.jpg'),
(5, '190030254', 'Clarissa ', 'clarissa990@gmail.com', 'Sistem Komputer', 'img5.jpg'),
(6, '123456789', 'Iwan Bopeng', 'iwan.bopeng@gmail.com', 'Teknik Pertambangan', 'img6.jpg'),
(35, '190085214', 'Erik Cahya ', 'erik.cahya841@gmail.com', 'Sistem Informatika &amp; Web Developer', 'img10.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
