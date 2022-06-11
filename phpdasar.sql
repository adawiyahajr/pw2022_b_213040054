-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2022 at 06:00 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `nama_film` varchar(50) NOT NULL,
  `sutradara` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `release` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `nama_film`, `sutradara`, `genre`, `release`, `gambar`) VALUES
(1, 'hometown cha-cha-cha', 'yoo je-won', 'romantic comedy', 'august 28, 21', 'satu.jpg'),
(2, 'squid game', 'hwang dong-hyuk', 'thriller', 'september 17, 2021', 'dua.jpg'),
(3, 'vicenzo', 'kim hee-won', 'crime drama', 'february 20, 21', 'tiga.jpg'),
(4, 'moon lovers', 'kim kyu-tae', 'historical', 'august 29, 2016', 'empat.jpg'),
(5, 'all of us are dead', 'lee jae-kyoo', 'zombie apocalypse', 'january 28, 2022', 'lima.jpeg'),
(6, 'happiness', 'ahn gil-ho', 'thriller', 'november 5, 2021', 'enam.jpg'),
(7, 'strong women do bong soon', 'lee hyung-min', 'action', 'february 24, 2017', 'tujuh.jpg'),
(8, 'legend of the blue sea', ' park seon-Ho', 'romantic comedy', 'november 16, 2016', 'delapan.jpg'),
(9, 'crash landing on you', 'lee jung-hyo', 'romantic drama', 'december 14, 2019', 'sembilan.jpg'),
(10, 'descendats of the sun', 'lee eung-bok', 'melodrama, action', 'february 24, 2016', 'sepuluh.jpg'),
(11, 'true beauty', 'kim sang-hyeop', 'romance comedy', 'december 9, 2020', 'sebelas.jpg'),
(12, 'start up', 'oh choong-hwan', 'drama romance', 'october 17, 2020', 'dua belas.jpg'),
(13, '18 again', 'ha byung-hoon', 'melodrama', 'september 21, 2020', 'tiga belas.jpg'),
(14, '100 days my prince', 'nam sung-woo', 'historical', 'september 10, 2018', 'empat belas.jpg'),
(15, 'twenty five, twenty one', 'jung ji-hyun', 'coming-of-age', 'february 12, 2022', 'lima belas.jpg'),
(16, 'the heirs', 'kang shin-hyo', 'romance drama', 'october 9, 2013', 'enam belas.jpg'),
(17, 'the moon that embraces the sun', 'kim do-hoon', 'historical', 'january 4, 2012', 'tujuh belas.jpg'),
(18, 'forecasting love and weather', 'cha young-hoon', 'romantic comedy', 'february 12, 2022', 'delapan belas.jpeg'),
(19, 'military prosecutor doberman', 'jin chang-gyu', 'military', 'february 28, 2022', 'sembilan belas.jpg'),
(20, 'hotel del luna', 'oh choong-hwan', 'dark fantasy', 'july 13, 2019', 'dua puluh.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nrp` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nrp`, `nama`, `email`, `jurusan`, `gambar`) VALUES
(1, '213040054', 'adawiyah ajriah', 'adawiyahajr@gmail.com', 'teknik informatika', 'satu.jpg'),
(2, '213040064', 'salma salsabila', 'salma@gmail.com', 'teknik informatika', 'dua.jpg'),
(3, '213040041', 'najwa septiana', 'najwa@gmail.com', 'teknik informatika', 'tiga,jpg'),
(4, '213040039', 'putri legiani', 'putrilegiani@gmail.com', 'teknik informatika', 'empat.jpg'),
(5, '213040047', 'rahma aliaputri efendi', 'rahma@gmail.com', 'teknik informatika', 'lima.jpg'),
(6, '213040043', 'emilia paradila', 'emilia@gmail.com', 'teknik informatika', 'enam.jpg'),
(7, '213040055', 'putri aulia maulidina', 'putriaulia@gmail.com', 'teknik informatika', 'tujuh.jpg'),
(8, '213040059', 'lita yusdia fatimah', 'lita@gmail.com', 'teknik informatika', 'delapan.jpg'),
(9, '213040067', 'gloria rustama simbolon', 'gloria@gmail.com', 'teknik informatika', 'sembilan.jpg'),
(10, '213040070', 'dea abeliya casmita', 'dea@gmail.com', 'teknik informatika', 'sepuluh.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(27, 'adawiyahajr', '$2y$10$yL3O83Q0EPlSqfDoCUUqIeeecYgUFhXRQz2n8DRJk9Cgq6gtfXLxW'),
(30, 'admin', '$2y$10$RoXSu.HMday185tTLF9DkuYODdErjyB4IjiMnfrgpZDmNG0O8GOSu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
