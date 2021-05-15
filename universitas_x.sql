-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2021 at 05:36 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `universitas_x`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_dosen`
--

CREATE TABLE `login_dosen` (
  `id` int(11) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_dosen`
--

INSERT INTO `login_dosen` (`id`, `username`, `password`) VALUES
(1, 'Arie', 'arie06'),
(2, 'Chintya', 'chintya05'),
(3, 'Vinny', 'vinny04');

-- --------------------------------------------------------

--
-- Table structure for table `login_mahasiswa`
--

CREATE TABLE `login_mahasiswa` (
  `id` int(11) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_mahasiswa`
--

INSERT INTO `login_mahasiswa` (`id`, `username`, `password`) VALUES
(1, '11420086', 'theresya06');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_akademis`
--

CREATE TABLE `mahasiswa_akademis` (
  `id` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `program_studi` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa_akademis`
--

INSERT INTO `mahasiswa_akademis` (`id`, `nim`, `nama`, `angkatan`, `program_studi`, `kelas`, `username`, `password`) VALUES
(1, 11420057, 'Tahnia Viona Hartanti', 2017, 'D4 Teknologi Rekayasa Perangkat Lunak', '41TRPL2', '11420057', 'tahnia13'),
(2, 11420086, 'Theresya Gurning', 2020, 'D4 Teknologi Rekayasa Perangkat Lunak', '41TRPL2', '11420086', 'theresya06'),
(9, 11420047, 'Daniel Pasaribu', 2020, 'D4 Teknologi Rekayasa Perangkat Lunak', '41TRPL1', '', ''),
(10, 11420062, 'Angela One Erika', 2020, 'D4 Teknologi Rekayasa Perangkat Lunak', '41TRPL2', '', ''),
(18, 11420073, 'Jesika ', 2029, 'S1 Teknik Informatika', '41TI1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_matkul`
--

CREATE TABLE `mahasiswa_matkul` (
  `id` int(11) NOT NULL,
  `kode_matkul` int(11) NOT NULL,
  `nama_matkul` varchar(255) NOT NULL,
  `jumlah_sks` int(11) NOT NULL,
  `dosen_pengampu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa_matkul`
--

INSERT INTO `mahasiswa_matkul` (`id`, `kode_matkul`, `nama_matkul`, `jumlah_sks`, `dosen_pengampu`) VALUES
(1, 123456, 'Pengembangan Situs Web II', 3, 'Arie Satia, S.T,M.Kom'),
(3, 123455, 'Matematika dasar', 2, 'Mukhammad Solikhin, S.Si, M.Si');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_pribadi`
--

CREATE TABLE `mahasiswa_pribadi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(255) NOT NULL,
  `golongan_darah` varchar(255) NOT NULL,
  `jalur_masuk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa_pribadi`
--

INSERT INTO `mahasiswa_pribadi` (`id`, `nama`, `ttl`, `alamat`, `agama`, `golongan_darah`, `jalur_masuk`) VALUES
(1, 'Tahnia', 'Porsea, 13 Juni 2002', 'Batu Bara', 'Islam', 'O', 'USM 1'),
(3, 'Theresya Gurning ', 'Lumban Gurning, 6 Mei 2003', 'Pintupohan Meranti', 'Kristen Protestan', 'B', 'USM 3'),
(4, 'Daniel Exaudi Pasaribu', 'Garoga, 1 September 2002', 'Pasar Garoga', 'Kristen Protestan', 'O', 'USM 2B');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_prodi`
--

CREATE TABLE `mahasiswa_prodi` (
  `id` int(11) NOT NULL,
  `kode_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(255) NOT NULL,
  `fakultas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa_prodi`
--

INSERT INTO `mahasiswa_prodi` (`id`, `kode_prodi`, `nama_prodi`, `fakultas`) VALUES
(1, 114, 'D4 Teknologi Rekayasa Perangkat Lunak', 'Fakultas Teknik Informatika dan Teknik Elektro'),
(3, 125, 'S1 Information', 'Fakultas Sistem Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_upload`
--

CREATE TABLE `tbl_upload` (
  `id` int(11) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `tipe_file` varchar(10) NOT NULL,
  `ukuran_file` varchar(20) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_upload`
--

INSERT INTO `tbl_upload` (`id`, `tanggal_upload`, `nama_file`, `tipe_file`, `ukuran_file`, `file`) VALUES
(2, '2021-05-09', 'English w14', 'pptx', '218340', 'file/English w14.pptx'),
(3, '2021-05-09', 'Pemrograman Dasar', 'jpg', '7014', 'file/Pemrograman Dasar.jpg'),
(4, '2021-05-09', 'Pengembangan Web', 'pptx', '764768', 'file/Pengembangan Web.pptx');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_dosen`
--
ALTER TABLE `login_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_mahasiswa`
--
ALTER TABLE `login_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa_akademis`
--
ALTER TABLE `mahasiswa_akademis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa_matkul`
--
ALTER TABLE `mahasiswa_matkul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa_pribadi`
--
ALTER TABLE `mahasiswa_pribadi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa_prodi`
--
ALTER TABLE `mahasiswa_prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_upload`
--
ALTER TABLE `tbl_upload`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_dosen`
--
ALTER TABLE `login_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_mahasiswa`
--
ALTER TABLE `login_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mahasiswa_akademis`
--
ALTER TABLE `mahasiswa_akademis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mahasiswa_matkul`
--
ALTER TABLE `mahasiswa_matkul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mahasiswa_pribadi`
--
ALTER TABLE `mahasiswa_pribadi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mahasiswa_prodi`
--
ALTER TABLE `mahasiswa_prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_upload`
--
ALTER TABLE `tbl_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
