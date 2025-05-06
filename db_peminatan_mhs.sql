-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2025 at 02:34 PM
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
-- Database: `db_peminatan_mhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nama`, `nip`, `email`) VALUES
(1, 'Dr. Disrespect', '197812311', 'dr.disrespect@upi.edu'),
(2, 'Prof. Akira99', '198001221', 'akira99@upi.edu'),
(3, 'Gus Azmi', '198503145', 'gusti@upi.edu'),
(4, 'Alan Walkers', '1979110151', 'alanturing@upi.edun');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `join_date` date NOT NULL,
  `id_peminatan` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `no_tlp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `email`, `join_date`, `id_peminatan`, `id_dosen`, `no_tlp`) VALUES
(1, 'Ahmad Fajar', '2311231', 'ahmad@upi.edu', '2023-09-01', 1, 3, '081234567890'),
(2, 'Bunga Melati', '2311232', 'bunga@upi.edu', '2023-09-01', 2, 2, '081223344556'),
(3, 'Citra Lestari', '2311233', 'citra@upi.edu', '2023-09-01', 3, 3, '081298765432'),
(4, 'Dedi Pratama', '2311234', 'dedi@upi.edu', '2023-09-01', 4, 4, '081212345678'),
(5, 'Eka Yuliana', '2311235', 'eka@upi.edu', '2023-09-01', 2, 1, '081376543210'),
(20, 'Faiz Bayu Erlangga', '2300000', 'faizbayu@upi.edun', '2025-05-06', 3, 2, '09301293012');

-- --------------------------------------------------------

--
-- Table structure for table `peminatan`
--

CREATE TABLE `peminatan` (
  `id` int(11) NOT NULL,
  `nama_peminatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminatan`
--

INSERT INTO `peminatan` (`id`, `nama_peminatan`) VALUES
(1, 'RPL'),
(2, 'IoT'),
(3, 'Multimedia'),
(4, 'AI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_peminatan` (`id_peminatan`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `peminatan`
--
ALTER TABLE `peminatan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `peminatan`
--
ALTER TABLE `peminatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_peminatan`) REFERENCES `peminatan` (`id`),
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
