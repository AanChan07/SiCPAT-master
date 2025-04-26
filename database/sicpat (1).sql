-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2025 at 03:27 PM
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
-- Database: `sicpat`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuti_pegawai`
--

CREATE TABLE `cuti_pegawai` (
  `id_cutipegawai` int(25) NOT NULL,
  `id_pegawai` int(25) NOT NULL,
  `jenis_cuti` varchar(225) NOT NULL,
  `alasan_cuti` varchar(225) NOT NULL,
  `lama_cuti` varchar(225) NOT NULL,
  `ket_lama_cuti` varchar(225) NOT NULL,
  `dari_tanggal` varchar(225) NOT NULL,
  `sampai_dengan` varchar(225) NOT NULL,
  `panmud_kasubag` varchar(225) DEFAULT NULL,
  `panitera_sekretaris` varchar(225) DEFAULT NULL,
  `ketua` varchar(225) DEFAULT NULL,
  `app_panmud_kasubag` int(25) NOT NULL,
  `app_panitera_sekretaris` int(25) NOT NULL,
  `app_ketua` int(25) NOT NULL,
  `status_cuti` varchar(225) NOT NULL,
  `ket_status_cuti` varchar(225) NOT NULL,
  `tanggal_pengajuan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cuti_pegawai`
--

INSERT INTO `cuti_pegawai` (`id_cutipegawai`, `id_pegawai`, `jenis_cuti`, `alasan_cuti`, `lama_cuti`, `ket_lama_cuti`, `dari_tanggal`, `sampai_dengan`, `panmud_kasubag`, `panitera_sekretaris`, `ketua`, `app_panmud_kasubag`, `app_panitera_sekretaris`, `app_ketua`, `status_cuti`, `ket_status_cuti`, `tanggal_pengajuan`) VALUES
(13, 34, 'Cuti Melahirkan', 'sakit', '3', 'Bulan', '2025-03-19', '2025-06-19', NULL, '197203151999031004', '196909301994031002', 1, 1, 1, 'Disetujui', 'Pengajuan Cuti Diterima', '2025-03-18'),
(16, 28, 'Cuti Tahunan', 'Acara keluarga', '1', 'Hari', '2025-03-22', '2025-03-22', NULL, '197203151999031004', '196909301994031002', 1, 1, 1, 'Disetujui', 'Pengajuan Cuti Diterima', '2025-03-20'),
(17, 22, 'Cuti Sakit', 'sakit', '1', '', '2025-03-22', '2025-03-22', '199307232019031004', NULL, NULL, 0, 0, 1, 'Diajukan', 'Menunggu Approval Kasubag Perencanaan, IT dan Pelaporan', '2025-03-20'),
(18, 23, 'Cuti Tahunan', 'Acara keluarga', '1', 'Hari', '2025-03-22', '2025-03-22', '198604092006042002', '197203151999031004', NULL, 1, 0, 1, 'Diajukan', 'Menunggu Approval Sekretaris', '2025-03-20'),
(19, 19, 'Cuti Tahunan', 'Acara keluarga', '1', 'Hari', '2025-03-26', '2025-03-26', '197902212006041009', '197007302003122001', NULL, 1, 1, 1, 'Disetujui', 'Pengajuan Cuti Diterima', '2025-03-25'),
(20, 19, 'Cuti Tahunan', 'Acara keluarga', '1', 'Hari', '2025-04-22', '2025-04-22', '197902212006041009', '197007302003122001', NULL, 1, 1, 1, 'Disetujui', 'Pengajuan Cuti Diterima', '2025-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` int(25) NOT NULL,
  `nama_golongan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `nama_golongan`) VALUES
(1, 'IV E'),
(2, 'IV D'),
(3, 'IV C'),
(4, 'IV B'),
(5, 'IV A'),
(6, 'III D'),
(7, 'III C'),
(8, 'III B'),
(9, 'III A'),
(10, 'II D'),
(11, 'II C'),
(12, 'II B'),
(13, 'II A'),
(14, 'PPPK'),
(15, 'PPNPN');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(25) NOT NULL,
  `nama_jabatan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'KETUA'),
(2, 'WAKIL KETUA'),
(3, 'HAKIM UTAMA MUDA'),
(4, 'HAKIM MADYA UTAMA'),
(5, 'PANITERA'),
(6, 'SEKRETARIS'),
(7, 'PANMUD HUKUM'),
(8, 'PANMUD  GUGATAN'),
(9, 'PANMUD PERMOHONAN'),
(10, 'JURUSITA'),
(11, 'JURUSITA PENGGANTI'),
(12, 'KASUBBAG KEPEGAWAIAN DAN ORTALA'),
(13, 'KASUBBAG PERENCANAAN IT DAN PELAPORAN'),
(14, 'KASUBBAG UMUM DAN KEUANGAN'),
(15, 'PRANATA KEUANGA APBN TERAMPIL'),
(16, 'PENGELOLA PENANGANAN PERKARA HUKUM'),
(17, 'PENGELOLA PENANGANAN PERKARA GUGATAN'),
(18, 'PENGELOLA PENANGANAN PERKARA PERMOHONAN'),
(19, 'ANALIS PERKARA PERADILAN HUKUM'),
(20, 'ANALIS PERKARA PERADILAN GUGATAN'),
(21, 'ANALIS PERKARA PERADILAN PERMOHONAN'),
(22, 'PENELAAH TEKNIS KEBIJAKAN'),
(23, 'PENGOLAH DATA DAN INFORMASI'),
(24, 'STAF PANITERA MUDA HUKUM'),
(25, 'STAF PANITERA MUDA GUGATAN'),
(26, 'STAF SUBBAG KEPEGAWAIAN ORTALA'),
(27, 'STAF SUBBAG UMUM DAN KEUANGAN'),
(28, 'SUPIR/DRIVER'),
(29, 'SECURITY/SATPAM'),
(30, 'STAF PERENCANAAN IT DAN PELAPORAN'),
(33, 'dua'),
(34, 'lima'),
(35, 'enam');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(25) NOT NULL,
  `nama_pegawai` varchar(225) NOT NULL,
  `nip` varchar(225) NOT NULL,
  `id_jabatan` int(25) NOT NULL,
  `id_golongan` int(25) NOT NULL,
  `unit_kerja` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `nip`, `id_jabatan`, `id_golongan`, `unit_kerja`) VALUES
(1, 'Drs. H. HABIB RASYIDI DAULAY, M.H.', '196909301994031002', 1, 2, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(2, 'FAKHRURRAZI, S.Ag.', '197510042001121002', 2, 3, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(3, 'Drs. H. HAMZAH, M.H.', '196005251992031002', 4, 2, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(4, 'Dra. Hj. YULISMAR, M.H.', '196307251992032002', 4, 2, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(5, 'Drs. HUSNUL YAKIN, S.H., M.H.', '196711101995031003', 4, 2, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(6, 'MARWIYAH, S. Ag., M.H.', '197007302003122001', 5, 5, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(7, 'MAIMONALISA, S.H.', '197203151999031004', 6, 5, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(8, 'MUKHSIN, S.H.I.', '197902212006041009', 7, 6, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(9, 'HESTI SYARIFAINI, S.H.I., M.H.', '198402172009122004', 9, 6, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(10, 'ZAINUDDIN, S.Ag.', '197307132006041006', 10, 6, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(11, 'FARIDA', '196902251991032001', 11, 8, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(12, 'FITRIA', '198212242006042017', 11, 9, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(13, 'MUHAMMAD NAWAWI, S.Ag.', '197412082001121001', 12, 5, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(14, 'RIAN KURNIAWAN, S.H.', '199307232019031004', 13, 8, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(15, 'RINA APRIANI,S.H.', '198604092006042002', 14, 6, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(16, 'ISMAIL AJI PUTERA, S.E', '199005192020121004', 15, 9, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(17, 'MARIA SELVIANA, A.Md.', '199407082022032010', 17, 11, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(18, 'ALVIYATU NICMAH, A.Md.', '199608232020122006', 18, 10, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(19, 'ULFA SHABRINA, S.H. ', '199812092024052001', 19, 9, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(20, 'YOURI GUSLIANDARI, S.H.', '199808102024052001', 20, 9, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(21, 'FADHILAH FAUZAN, S.H.', '199902222024052001', 21, 9, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(22, 'RAKHA MAGISTRA SUMARNO, S.E.', '199803292022031006', 22, 9, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(23, 'ANGGO, A.Md.', '199704102022031006', 23, 11, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(24, 'SRI SUSANTI.,SE.Sy.', '001', 25, 14, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(25, 'NURUL AINI', '002', 24, 14, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(26, 'DARNAWATI.,S.Pdi', '003', 26, 14, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(27, 'BAMBANG PRIAWAN', '004', 27, 14, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(28, 'BUDI HARTONO', '005', 27, 14, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(29, 'DIDI USMAN', '006', 28, 14, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(30, 'SUPIRMANSAH', '007', 28, 14, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(31, 'SUROTO', '008', 29, 14, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(32, 'EKO ARDILES', '009', 29, 14, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(33, 'KHAIRUL SYABIRIN DAULAY, S.E.', '010', 30, 15, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(34, 'ADMIN, S.T.', '011', 26, 15, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(38, 'Wulan', '012', 27, 9, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(40, 'hanisa', '055', 19, 8, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA'),
(41, 'raju', '060', 16, 9, 'PENGADILAN AGAMA TANJUNGPINANG KELAS IA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cuti_tahunan`
--

CREATE TABLE `tb_cuti_tahunan` (
  `id_ct` int(11) NOT NULL,
  `id_pegawai` int(25) NOT NULL,
  `sisa_cuti_n2` int(11) DEFAULT 0,
  `sisa_cuti_n1` int(11) DEFAULT 0,
  `sisa_cuti_n` int(11) DEFAULT 0,
  `total_cuti` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_cuti_tahunan`
--

INSERT INTO `tb_cuti_tahunan` (`id_ct`, `id_pegawai`, `sisa_cuti_n2`, `sisa_cuti_n1`, `sisa_cuti_n`, `total_cuti`) VALUES
(1, 1, 0, 0, 12, 12),
(2, 2, 0, 0, 12, 12),
(3, 3, 0, 0, 12, 12),
(4, 4, 0, 0, 12, 12),
(5, 5, 0, 0, 12, 12),
(6, 6, 0, 0, 12, 12),
(7, 7, 0, 0, 12, 12),
(8, 8, 0, 0, 12, 12),
(9, 9, 0, 0, 12, 12),
(10, 10, 0, 2, 12, 14),
(11, 11, 0, 2, 12, 14),
(13, 13, 0, 2, 12, 14),
(14, 14, 0, 2, 12, 14),
(15, 15, 0, 2, 12, 14),
(16, 16, 0, 0, 12, 12),
(17, 17, 0, 0, 12, 12),
(18, 18, 0, 0, 12, 12),
(19, 19, 0, 0, 10, 10),
(20, 20, 0, 0, 12, 12),
(21, 21, 0, 0, 12, 12),
(22, 22, 0, 0, 12, 12),
(23, 23, 0, 0, 11, 11),
(24, 24, 0, 4, 12, 16),
(25, 25, 0, 0, 12, 12),
(26, 26, 0, 0, 12, 12),
(27, 27, 0, 0, 12, 12),
(28, 28, 0, 0, 9, 9),
(29, 29, 0, 0, 12, 12),
(30, 30, 0, 0, 12, 12),
(31, 31, 0, 0, 12, 12),
(32, 32, 0, 0, 12, 12),
(33, 33, 0, 0, 12, 12),
(34, 34, 0, 0, 3, 3),
(35, 12, 0, 0, 1, 1),
(36, 40, 0, 0, 12, 12),
(37, 41, 0, 0, 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(25) NOT NULL,
  `nip` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` text NOT NULL,
  `foto` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nip`, `password`, `role`, `foto`) VALUES
(1, '196909301994031002', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', '1741574314.png'),
(2, '197510042001121002', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(3, '196005251992031002', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(4, '196307251992032002', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(5, '196711101995031003', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(6, '197007302003122001', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(7, '197203151999031004', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(8, '198402172009122004', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(9, '197902212006041009', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(10, '197307132006041006', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(11, '197412082001121001', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(12, '199307232019031004', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(13, '198604092006042002', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(14, '199005192020121004', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(15, '199704102022031006', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(16, '199803292022031006', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(17, '196902251991032001', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(18, '198212242006042017', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(19, '199407082022032010', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(20, '199808102024052001', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(21, '199812092024052001', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(22, '199608232020122006', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(23, '199902222024052001', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(24, '001', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(25, '002', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(26, '003', 'ee11cbb19052e40b07aac0ca060c23ee', 'Admin', NULL),
(27, '004', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(28, '005', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(29, '006', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(30, '007', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(31, '008', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(32, '009', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(33, '010', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(34, '011', '1b2fb3860ba0590ada797c5694ec2d22', 'Admin', '1742489512.png'),
(36, '012', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(37, '055', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL),
(38, '060', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti_pegawai`
--
ALTER TABLE `cuti_pegawai`
  ADD PRIMARY KEY (`id_cutipegawai`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_golongan` (`id_golongan`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tb_cuti_tahunan`
--
ALTER TABLE `tb_cuti_tahunan`
  ADD PRIMARY KEY (`id_ct`),
  ADD KEY `fk_id_pegawai` (`id_pegawai`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `nip` (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuti_pegawai`
--
ALTER TABLE `cuti_pegawai`
  MODIFY `id_cutipegawai` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_golongan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tb_cuti_tahunan`
--
ALTER TABLE `tb_cuti_tahunan`
  MODIFY `id_ct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuti_pegawai`
--
ALTER TABLE `cuti_pegawai`
  ADD CONSTRAINT `cuti_pegawai_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `fk_golongan` FOREIGN KEY (`id_golongan`) REFERENCES `golongan` (`id_golongan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_golongan`) REFERENCES `golongan` (`id_golongan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_cuti_tahunan`
--
ALTER TABLE `tb_cuti_tahunan`
  ADD CONSTRAINT `fk_id_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_pegawai` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
