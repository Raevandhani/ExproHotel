-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 08:52 AM
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
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(37) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(16) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `name`, `username`, `password`, `status`) VALUES
(7, 'admin', 'admin', '321', 'admin'),
(9, 'pesat', 'pesat', '', 'admin'),
(10, 'root', 'root', '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `room_id` int(37) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `price` int(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`room_id`, `room_type`, `price`, `description`) VALUES
(1, 'Standard Room', 1000000, 'Kamar standar kami yang nyaman dengan fasilitas modern, menawarkan pengalaman menginap yang menyenangkan bagi setiap tamu.'),
(2, 'Superior Room', 1500000, 'Kamar superior kami yang mewah dengan fasilitas premium, menjanjikan pengalaman menginap yang istimewa bagi setiap tamu.'),
(3, 'Deluxe Room', 1800000, 'Kamar deluxe kami menawarkan kemewahan tambahan dengan ruang yang lebih luas dan fasilitas eksklusif, menciptakan pengalaman menginap yang tak terlupakan.\r\n'),
(10, 'Kamar', 100, 'Kamar Baru');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int(37) NOT NULL,
  `room_id` int(37) NOT NULL,
  `name` varchar(100) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `durasi` int(100) NOT NULL,
  `identitas` varchar(36) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `total_harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `room_id`, `name`, `checkin`, `checkout`, `durasi`, `identitas`, `no_hp`, `jumlah`, `total_harga`) VALUES
(7, 1, 'Supah', '2024-06-03', '2024-06-07', 4, '232410040', '088812345678', 1, 3200000),
(8, 2, 'Grayson Miller', '2024-06-03', '2024-06-05', 2, '23210041', '086931415926', 3, 9000000),
(9, 3, 'Juliandra', '2024-06-04', '2024-06-14', 10, '232410042', '086969696969', 1, 18000000),
(10, 2, 'ted', '2024-06-04', '2024-06-06', 2, 'ted', 'ted', 2, 6000000),
(11, 1, 'ABC', '2024-06-04', '2024-06-07', 3, '321', '0808', 2, 6000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(37) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `room_id` int(37) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(37) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
