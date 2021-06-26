-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2021 at 06:45 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studybox`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_peserta`
--

CREATE TABLE `data_peserta` (
  `id_peserta` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `umur` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_wa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_peserta`
--

INSERT INTO `data_peserta` (`id_peserta`, `nama`, `umur`, `email`, `no_wa`) VALUES
(1, 'aaa', 'sss', 'ddd', '34'),
(2, 'aa', 'sss', 'dd', 'ff'),
(3, 'budi', '12', 'lala', '1234'),
(4, 'aaa', 'ss', 'dd', 'ff'),
(5, 'aa', 'ss', 'dd', 'ff'),
(6, 'lalaa', '20', 'lala@gmail.com', '081235232'),
(7, 'we', '19', 'we', 'we');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `deskripsi` varchar(300) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `nama_mentor` varchar(50) NOT NULL,
  `gambar_mentor` varchar(300) NOT NULL,
  `cv_mentor` varchar(300) NOT NULL,
  `harga_before` varchar(10) NOT NULL,
  `harga_after` varchar(10) NOT NULL,
  `judul_week1` varchar(100) NOT NULL,
  `detail_week1` varchar(200) NOT NULL,
  `judul_week2` varchar(100) NOT NULL,
  `detail_week2` varchar(200) NOT NULL,
  `judul_week3` varchar(100) NOT NULL,
  `detail_week3` varchar(200) NOT NULL,
  `judul_week4` varchar(100) NOT NULL,
  `detail_week4` varchar(200) NOT NULL,
  `judul_week5` varchar(100) NOT NULL,
  `detail_week5` varchar(200) NOT NULL,
  `judul_week6` varchar(100) NOT NULL,
  `detail_week6` varchar(200) NOT NULL,
  `judul_week7` varchar(100) NOT NULL,
  `detail_week7` varchar(200) NOT NULL,
  `judul_week8` varchar(100) NOT NULL,
  `detail_week8` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `deskripsi`, `gambar`, `nama_mentor`, `gambar_mentor`, `cv_mentor`, `harga_before`, `harga_after`, `judul_week1`, `detail_week1`, `judul_week2`, `detail_week2`, `judul_week3`, `detail_week3`, `judul_week4`, `detail_week4`, `judul_week5`, `detail_week5`, `judul_week6`, `detail_week6`, `judul_week7`, `detail_week7`, `judul_week8`, `detail_week8`) VALUES
(1, 'UI/UX', 'kelas ini merupakan ui/ux', 'produk/16ldyv96kPXDA.jpg', 'lala', 'produk/16ldyv96kPXDA.jpg', 'pintar', '4', '3', 'a', 's', 'a', 's', 'a', 's', 'a', 'a', 's', 'a', 's', 'a', 's', 'a', 's', 'a'),
(2, 'Web dev', 'Kelas ini merupakan web developer', 'produk/16ldyv96kPXDA.jpg', 'a', 'produk/16qOt7zfXGIiU.', 'dd', '2', '3', 'Pengenalan HTML', 'penjelasan singkat materi hari 1', 'q', 'w', 'q', 'w', 'q', 'w', 'q', 'e', 'w', 'q', 'w', 'q', 'w', 'q');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(7) NOT NULL DEFAULT 'Member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_user`, `nama`, `username`, `email`, `password`, `role`) VALUES
(1, 'ricky', 'ricky123', 'ricky@gmail.com', 'asdadadadad', 'Member'),
(2, 'asdd', 'fff', 'ggg', '$2y$10$V2O.oeB/uFvOKgiq0entqenquld2mrpuAz1RRM1L.Cp9nYCxkqWT2', 'Member'),
(3, 'user', 'user', 'user@gmail.com', '$2y$10$e/4H4AIKlE0atF5dnEngbe/Bpzm/PpONvp8KOE8whYMwJIvYonE02', 'Member'),
(4, 'admin', 'admin', 'admin', '$2y$10$c6i.RClfo2y6mYdjANoWWONTgA3O9hl39ijKFg363kMeh2r03zMcW', 'Member'),
(5, 'userr', 'userr', 'userr', '$2y$10$/mYnF92AcTwuFQMuy0kRK..CU3hweCjbny5xjLPPfFy0xnnIcpoaS', 'Member'),
(6, 'ricky', 'ricky', 'ricky@gmail.com', '$2y$10$lxTQ3Gh6xYAaB/tHbhOiw.TqIl1YAcAYjoPb63nwsvmigjaobtxGi', 'Admin'),
(7, 'aa', 'aa', 'aa@gmail.com', '$2y$10$0cG3sdOrLTspk42LqzRl8.EeL6Zuk/fOI67OFQn0NM4lKvvuBGP0W', 'Member'),
(8, 'aaa', 'aaa', 'aaa', '$2y$10$CxA2StzDVUkZYXlPxsXp.uz18rHSQUyC/joFG4D7C8mgYGDBlMkNW', 'Member'),
(9, 'puki', 'pukimak', 'pukimak@gmail.com', '$2y$10$yCMl4ogDBJYF9Utzqm0BpuyIi9tyrhlFcc0dL4Qg7KEXEqmvMESjm', 'Admin'),
(11, 'qq', 'qq', 'qq', '$2y$10$/cp8X/WkRj5VDA78CtGaRO9cKrmTlppyoU63t5XgO7UnFDKQ7inZq', 'Member'),
(12, 'toto', 'toto', 'toto', '$2y$10$AGsY.K0aE5pJPr984yiwoe4sTPvs7WtVb672/Lq72JryKcRrdSIzS', 'Admin'),
(13, 'Ricky berlando', 'RickyBR', 'berlandoricky@gmail.com', '$2y$10$Mga.G/7lycH4sgk7VYxfUuNhr7lCZfez6GDffiQZTOgnitQzq.8/i', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE `mentor` (
  `id_mentor` int(11) NOT NULL,
  `nama_mentor` varchar(80) NOT NULL,
  `cv_mentor` varchar(200) NOT NULL,
  `gambar_mentor` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `harga_before` int(11) NOT NULL,
  `harga_after` int(11) NOT NULL,
  `judul_week1` varchar(100) NOT NULL,
  `detail_week1` varchar(200) NOT NULL,
  `judul_week2` varchar(100) NOT NULL,
  `detail_week2` varchar(200) NOT NULL,
  `judul_week3` varchar(100) NOT NULL,
  `detail_week3` varchar(200) NOT NULL,
  `judul_week4` varchar(100) NOT NULL,
  `detail_week4` varchar(200) NOT NULL,
  `judul_week5` varchar(100) NOT NULL,
  `detail_week5` varchar(200) NOT NULL,
  `judul_week6` varchar(100) NOT NULL,
  `detail_week6` varchar(200) NOT NULL,
  `judul_week7` varchar(100) NOT NULL,
  `detail_week7` varchar(200) NOT NULL,
  `judul_week8` varchar(100) NOT NULL,
  `detail_week8` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `gambar`, `deskripsi`, `harga_before`, `harga_after`, `judul_week1`, `detail_week1`, `judul_week2`, `detail_week2`, `judul_week3`, `detail_week3`, `judul_week4`, `detail_week4`, `judul_week5`, `detail_week5`, `judul_week6`, `detail_week6`, `judul_week7`, `detail_week7`, `judul_week8`, `detail_week8`) VALUES
(1, 'a', 's', 'd', 4, 3, 'a', 's', 's', 'a', 's', 'a', 's', 'a', 's', 'a', 's', 'a', 's', 'a', 'a', 's');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_peserta`
--
ALTER TABLE `data_peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `mentor`
--
ALTER TABLE `mentor`
  ADD PRIMARY KEY (`id_mentor`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_peserta`
--
ALTER TABLE `data_peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mentor`
--
ALTER TABLE `mentor`
  MODIFY `id_mentor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
