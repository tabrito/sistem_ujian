-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2024 at 07:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `praktikum_ujian`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(10) NOT NULL,
  `guru` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `id_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `guru`, `tanggal_lahir`, `alamat`, `id_user`) VALUES
('19843527', 'M.Yunus Arrahman S.kom', '1975-07-24', 'Jl. Haji Akhyar, Kampung Rawa ', 'U-001'),
('19860926', 'Mita Amelia S.pd', '2000-02-02', 'Jlbelimbing , cipayung , citay', 'U-001'),
('19887459', 'Dimas S.Pd', '1989-10-01', 'Ruko Kartini Grande, Jl. Raya ', 'U-001'),
('19887562', 'Reka sulistiya', '1993-06-05', 'Jl. Raya Cipayung Rt.02/10, De', 'U-001'),
('34971209', 'a=rizki', '2024-12-04', 'Balaraja', 'U-001');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` varchar(10) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `id_mapel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `hari`, `jam`, `id_kelas`, `id_mapel`) VALUES
('J-001', 'Senin', '07:00 - 08:30', 'K-001', 'M-001'),
('J-002', 'Senin', '07:00 - 08:30', 'K-002', 'M-002'),
('J-003', 'Senin', '07:00 - 08:30', 'K-005', 'M-003'),
('J-004', 'Senin', '07:00 - 08:30', 'K-003', 'M-004'),
('J-005', 'Senin', '07:00 - 08:30', 'K-004', 'M-005'),
('J-006', 'Senin', '08:30 - 10:00', 'K-001', 'M-002'),
('J-007', 'Senin', '08:30 - 10:00', 'K-002', 'M-003'),
('J-008', 'Senin', '08:30 - 10:00', 'K-005', 'M-004'),
('J-009', 'Senin', '08:30 - 10:00', 'K-003', 'M-005'),
('J-010', 'Senin', '08:30 - 10:00', 'K-004', 'M-001'),
('J-011', 'Senin', '10:00 - 11:30', 'K-001', 'M-005'),
('J-012', 'Senin', '10:00 - 11:30', 'K-002', 'M-004'),
('J-013', 'Senin', '10:00 - 11:30', 'K-005', 'M-003'),
('J-014', 'Senin', '10:00 - 11:30', 'K-003', 'M-002'),
('J-015', 'Senin', '10:00 - 11:30', 'K-004', 'M-001'),
('J-016', 'Senin', '13:00 - 14:30', 'K-001', 'M-003'),
('J-017', 'Senin', '13:00 - 14:30', 'K-002', 'M-004'),
('J-018', 'Senin', '13:00 - 14:30', 'K-003', 'M-001'),
('J-019', 'Senin', '13:00 - 14:30', 'K-004', 'M-005'),
('J-020', 'Senin', '13:00 - 14:30', 'K-005', 'M-002');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(10) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `ruangan` varchar(10) NOT NULL,
  `ketua_kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `ruangan`, `ketua_kelas`) VALUES
('K-001', 'X-A', 'LT1-01', 'Dedi Pratama'),
('K-002', 'X-B', 'LT1-04', 'Vina Sari'),
('K-003', 'X-C', 'LT1-03', 'Yuni Mulani'),
('K-004', 'XI-A', 'LT2-04', 'Ahmad Rifai'),
('K-005', 'XI-B', 'LT2-03', 'Lukman Hakim');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` varchar(20) NOT NULL,
  `mapel` varchar(30) NOT NULL,
  `id_guru` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `mapel`, `id_guru`) VALUES
('M-001', 'Matematika', '19843527'),
('M-002', 'Bahasa Indonesia', '19860926'),
('M-003', 'Fisika', '19887562'),
('M-004', 'Bahasa Inggris', '19887459'),
('M-005', 'Teknik Komputer Jaringan', '19887562');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` varchar(5) NOT NULL,
  `id_siswa` varchar(10) NOT NULL,
  `id_ujian` varchar(10) NOT NULL,
  `jawaban_benar` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `id_siswa`, `id_ujian`, `jawaban_benar`, `nilai`) VALUES
('N-001', '1212424124', 'UJ-0001', 2, 70),
('N-002', '4523341243', 'UJ-0001', 1, 40),
('N-003', '1234567890', 'UJ-0001', 1, 40),
('N-004', '2342342342', 'UJ-0001', 2, 70),
('N-005', '2112312312', 'UJ-0001', 3, 100),
('N-006', '2112312312', 'UJ-0002', 2, 70),
('N-007', '2112312312', 'UJ-0003', 2, 70),
('N-008', '2112312312', 'UJ-0004', 1, 40),
('N-009', '2112312312', 'UJ-0005', 3, 100),
('N-010', '2112312312', 'UJ-0006', 3, 100),
('N-011', '2112312312', 'UJ-0007', 3, 100),
('N-012', '2112312312', 'UJ-0008', 2, 70),
('N-013', '2112312312', 'UJ-0009', 3, 100),
('N-014', '2112312312', 'UJ-0010', 3, 100);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(10) NOT NULL,
  `siswa` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `kontak` varchar(13) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `siswa`, `tanggal_lahir`, `alamat`, `kontak`, `id_kelas`, `id_user`) VALUES
('1212424124', 'Dewi Lestari', '2005-01-01', 'Jl. Merpati No. 10, Jakarta', '081234567890', 'K-001', 'U-001'),
('1234567890', 'Andi Wijaya', '2005-01-01', 'Jl. Merpati No. 10, Jakarta', '081234567890', 'K-001', 'U-001'),
('1234567891', 'Budi Santoso', '2005-02-02', 'Jl. Kenanga No. 15, Jakarta', '081234567891', 'K-001', 'U-001'),
('2112312312', 'Bayu Nugroho', '2005-01-01', 'Jl. Merpati No. 10, Jakarta', '081234567890', 'K-002', 'U-001'),
('2312312312', 'Fajar Hidayat', '2005-01-01', 'Jl. Merpati No. 10, Jakarta', '081234567890', 'K-003', 'U-001'),
('2323432432', 'Intan Permatasari', '2005-01-01', 'Jl. Merpati No. 10, Jakarta', '081234567890', 'K-003', 'U-001'),
('2342342342', 'Ayu Kartika', '2005-01-01', 'Jl. Merpati No. 10, Jakarta', '081234567890', 'K-003', 'U-001'),
('2342342343', 'Siti Aisyah', '2005-01-01', 'Jl. Merpati No. 10, Jakarta', '081234567890', 'K-002', 'U-001'),
('2342344122', 'Rizky Saputra', '2005-01-01', 'Jl. Merpati No. 10, Jakarta', '081234567890', 'K-001', 'U-001'),
('2414344243', 'Citra Anggraini', '2005-01-01', 'Jl. Merpati No. 10, Jakarta', '081234567890', 'K-004', 'U-001'),
('3423434134', 'Hendra Kurniawan', '2005-01-01', 'Jl. Merpati No. 10, Jakarta', '081234567890', 'K-002', 'U-001'),
('4323423423', 'Dimas Yulianto', '2005-01-01', 'Jl. Merpati No. 10, Jakarta', '081234567890', 'K-004', 'U-001'),
('4342342332', 'Adi Wijaya', '2005-01-01', 'Jl. Merpati No. 10, Jakarta', '081234567890', 'K-003', 'U-001'),
('4523341243', 'Ahmad Prasetyo', '2005-01-01', 'Jl. Merpati No. 10, Jakarta', '081234567890', 'K-001', 'U-001'),
('4532523434', 'Putri Maharani', '2005-01-01', 'Jl. Merpati No. 10, Jakarta', '081234567890', 'K-002', 'U-001'),
('4634252323', 'Hana Ramadhani', '2005-01-01', 'Jl. Merpati No. 10, Jakarta', '081234567890', 'K-005', 'U-001'),
('5343452323', 'Yuni Astuti', '2005-01-01', 'Jl. Merpati No. 10, Jakarta', '081234567890', 'K-002', 'U-001'),
('5643435324', 'Budi Santoso', '2005-01-01', 'Jl. Merpati No. 10, Jakarta', '081234567890', 'K-003', 'U-001'),
('7436343452', 'Kirana Sari', '2005-01-01', 'Jl. Merpati No. 10, Jakarta', '081234567890', 'K-005', 'U-001'),
('7454345345', 'Eka Putra', '2005-01-01', 'Jl. Merpati No. 10, Jakarta', '081234567890', 'K-004', 'U-001'),
('7456343452', 'Galih Setiawan', '2005-01-01', 'Jl. Merpati No. 10, Jakarta', '081234567890', 'K-004', 'U-001'),
('7466733525', 'Joko Susanto', '2005-01-01', 'Jl. Merpati No. 10, Jakarta', '081234567890', 'K-005', 'U-001'),
('7534634642', 'Lutfi Hakim', '2005-01-01', 'Jl. Merpati No. 10, Jakarta', '081234567890', 'K-005', 'U-001'),
('8453545643', 'Fitri Handayani', '2005-01-01', 'Jl. Merpati No. 10, Jakarta', '081234567890', 'K-004', 'U-001'),
('8743643453', 'Irfan Maulana', '2005-01-01', 'Jl. Merpati No. 10, Jakarta', '081234567890', 'K-005', 'U-001');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` varchar(20) NOT NULL,
  `id_ujian` varchar(10) NOT NULL,
  `soal` varchar(255) NOT NULL,
  `jawaban` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `id_ujian`, `soal`, `jawaban`) VALUES
('SO-0001', 'UJ-0001', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'a'),
('SO-0002', 'UJ-0001', 'bbbbbbbbbbbbbbbbbbbbbbbb', 'b'),
('SO-0003', 'UJ-0001', 'cccccccccccccccccccccc', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `id_ujian` varchar(10) NOT NULL,
  `id_mapel` varchar(10) NOT NULL,
  `jenis_ujian` varchar(25) NOT NULL,
  `total_soal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`id_ujian`, `id_mapel`, `jenis_ujian`, `total_soal`) VALUES
('UJ-0001', 'M-001', 'Ujian Tengah Semester', 5),
('UJ-0002', 'M-002', 'Ujian Tengah Semester', 5),
('UJ-0003', 'M-003', 'Ujian Tengah Semester', 5),
('UJ-0004', 'M-004', 'Ujian Tengah Semester', 5),
('UJ-0005', 'M-005', 'Ujian Tengah Semester', 5),
('UJ-0006', 'M-001', 'Ujian Akhir Semester', 10),
('UJ-0007', 'M-002', 'Ujian Akhir Semester', 10),
('UJ-0008', 'M-003', 'Ujian Akhir Semester', 10),
('UJ-0009', 'M-004', 'Ujian Akhir Semester', 10),
('UJ-0010', 'M-005', 'Ujian Akhir Semester', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `no_induk` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `no_induk`, `password`, `fullname`, `role`) VALUES
('U-001', '19860926', '020200', 'Mita Amelia', 'Guru'),
('U-002', '19887459', '011089', 'Dimas S.Pd', 'Guru'),
('U-003', '19864268', '180898', 'Iis Sulastri', 'Kesiswaan'),
('U-004', '1212424124', '010105', 'Dewi Lestari', 'Siswa'),
('U-005', '1234567890', '010105', 'Andi Wijaya', 'Siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD UNIQUE KEY `kelas` (`kelas`),
  ADD UNIQUE KEY `ruangan` (`ruangan`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_ujian` (`id_ujian`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_ujian` (`id_ujian`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id_ujian`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id_ujian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id_ujian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ujian`
--
ALTER TABLE `ujian`
  ADD CONSTRAINT `ujian_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
