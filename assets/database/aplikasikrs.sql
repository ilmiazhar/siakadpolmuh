-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Okt 2018 pada 23.14
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasikrs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `username` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`username`, `nama_lengkap`) VALUES
('admin', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bobot`
--

CREATE TABLE `tbl_bobot` (
  `bobot` varchar(5) NOT NULL,
  `nilai` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bobot`
--

INSERT INTO `tbl_bobot` (`bobot`, `nilai`) VALUES
('4', 'A'),
('3', 'B'),
('2', 'C'),
('1', 'D'),
('0', 'E'),
('3.5', 'AB'),
('2.5', 'BC'),
('1.5', 'CD'),
('0.5', 'DE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `kd_dosen` varchar(5) NOT NULL,
  `nidn` varchar(10) NOT NULL,
  `nama_dosen` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`kd_dosen`, `nidn`, `nama_dosen`) VALUES
('D001', '-', 'M Adi Sulistyo, S. Kom.'),
('D002', '-', 'Randi Dwi W, S.T.'),
('D003', '-', 'Ragil Oktaviyani, S.T.'),
('D004', '-', 'Kasmad, S.Kom'),
('D005', '-', 'Didi Kusaeri, S.T.'),
('D006', '-', 'fgfgdgg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dosen_wali`
--

CREATE TABLE `tbl_dosen_wali` (
  `nim` varchar(20) NOT NULL,
  `kd_dosen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dosen_wali`
--

INSERT INTO `tbl_dosen_wali` (`nim`, `kd_dosen`) VALUES
('1819001', 'D001'),
('1819002', 'D001'),
('1819003', 'D001'),
('222', 'D001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `kd_jadwal` int(11) NOT NULL,
  `kd_mk` varchar(20) NOT NULL,
  `kd_dosen` varchar(5) NOT NULL,
  `kd_tahun` varchar(20) NOT NULL,
  `jadwal` varchar(100) NOT NULL,
  `kapasitas` int(3) NOT NULL,
  `kelas_program` varchar(10) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`kd_jadwal`, `kd_mk`, `kd_dosen`, `kd_tahun`, `jadwal`, `kapasitas`, `kelas_program`, `kelas`) VALUES
(1, 'MKK-TIK-001-1', 'D001', 'GNJL-18/19', 'Senin / 08.00-09.00 / M2', 15, 'Reguler', 'A'),
(2, 'MKK-TIK-001-1', 'D001', 'GNJL-18/19', 'Selasa / 19.00-20.00 / M1', 25, 'Ekstensi', 'B'),
(3, 'MKK-TIK-010-1', 'D001', 'GNJL-18/19', 'Kamis / 09.00-10.00 / M3', 15, 'Reguler', 'A'),
(4, 'MKK-TIK-088-1', 'D004', 'GNJL-18/19', 'Kamis / 08.00-09.00 / M5', 25, 'Reguler', 'A'),
(5, 'MKK-TIK-010-1', 'D005', 'GNJL-18/19', 'Jumat / 19.00-20.00 / M2', 15, 'Ekstensi', 'A'),
(6, 'MKK-TIK-088-1', 'D001', 'GNJL-18/19', 'Kamis / 20.00-21.00 / M4', 25, 'Ekstensi', 'A'),
(9, 'MKK-TIK-212-2', 'D003', 'GNP-18/19', 'Rabu / 08.00-09.00 / M5', 30, 'Reguler', 'B'),
(10, 'MKK-TIK-219-2', 'D001', 'GNP-18/19', 'Kamis / 09.00-10.00 / M3', 30, 'Reguler', 'A'),
(11, 'MKK-TIK-241-2', 'D002', 'GNP-18/19', 'Jumat / 08.00-09.00 / M5', 30, 'Reguler', 'A'),
(12, '4346wtsdsf', 'D004', 'GNP-18/19', 'Jumat / 05.00-07.00 / Alam Bebas', 50, 'Reguler', 'A'),
(14, 'MKK-TIK-212-2', 'D003', 'GNP-18/19', 'Kamis / 19.00-20.00 / M1', 25, 'Ekstensi', 'A'),
(15, 'MKK-TIK-219-2', 'D002', 'GNP-18/19', 'Rabu / 20.00-21.00 / M2', 15, 'Ekstensi', 'B'),
(16, 'MKK-TIK-241-2', 'D004', 'GNP-18/19', 'Senin / 19.00-20.00 / M3', 25, 'Ekstensi', 'B'),
(17, 'rarar', 'D006', 'GNP-18/19', 'Kamis / 09.00-10.00 / M3', 25, 'Reguler', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_krs`
--

CREATE TABLE `tbl_krs` (
  `nim` varchar(20) NOT NULL,
  `kd_jadwal` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_krs`
--

INSERT INTO `tbl_krs` (`nim`, `kd_jadwal`) VALUES
('1819001', 7),
('1819001', 8),
('1819001', 9),
('1819001', 10),
('1819001', 11),
('1516003', 1),
('1516003', 3),
('1516003', 4),
('1819002', 9),
('1819002', 10),
('1819002', 11),
('1819002', 12),
('1819003', 14),
('1819003', 15),
('1819003', 16),
('222', 1),
('222', 3),
('222', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_login`
--

CREATE TABLE `tbl_login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL,
  `stts` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_login`
--

INSERT INTO `tbl_login` (`username`, `password`, `stts`) VALUES
('1819001', '21e909166dc7d34c65f4754a10f1eeb3', 'mahasiswa'),
('1819002', '85a200ddd208a160ab8dbfe80f81cff5', 'mahasiswa'),
('1819003', '4d7a7281f72eb509c74e6a1fc0532be5', 'mahasiswa'),
('222', 'bcbe3365e6ac95ea2c0343a2395834dd', 'mahasiswa'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('D001', 'd5cbf528f740b502b79241ff873ce6c5', 'dosen'),
('D002', 'b3460c056d63af44fe66bd92c961a144', 'dosen'),
('D003', 'fda7f226bff2b2df5da2e703f84bab11', 'dosen'),
('D004', '22d164d469bfc0bc0f2aefe67dd2806e', 'dosen'),
('D005', 'b7ca9b1c84b0669f89357ee7bafb1274', 'dosen'),
('D006', '0d86b2d838d51e9ae5d1720054578f16', 'dosen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `angkatan` int(5) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `kelas_program` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`nim`, `nama_mahasiswa`, `angkatan`, `jurusan`, `kelas_program`) VALUES
('1819001', 'Abdul Somad', 2018, 'Teknik Elektro', 'Reguler'),
('1819002', 'Boy Oke', 2018, 'Teknik Elektro', 'Reguler'),
('1819003', 'Charles Chaplin Jr.', 2018, 'Teknik Elektro', 'Ekstensi'),
('222', 'stdfdf', 2018, 'Teknik Elektro', 'Reguler');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mk`
--

CREATE TABLE `tbl_mk` (
  `kd_mk` varchar(15) NOT NULL,
  `nama_mk` varchar(100) NOT NULL,
  `jum_sks` int(2) NOT NULL,
  `semester` int(2) NOT NULL,
  `prasyarat_mk` varchar(50) NOT NULL,
  `kode_jur` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mk`
--

INSERT INTO `tbl_mk` (`kd_mk`, `nama_mk`, `jum_sks`, `semester`, `prasyarat_mk`, `kode_jur`) VALUES
('4346wtsdsf', 'Jalan-jalan', 4, 2, '-', 'TE'),
('MKK-TE-125-6', 'Observasi Industri', 2, 6, '-', 'TE'),
('MKK-TE-181-6', 'Manajemen Industri', 2, 6, '-', 'TE'),
('MKK-TE-199-6', 'Manajemen Internetworking dan Router', 3, 5, '-', 'TE'),
('MKK-TIK-001-1', 'Bahasa Inggris', 3, 1, '-', 'TE'),
('MKK-TIK-010-1', 'Pancasila', 3, 1, '-', 'TE'),
('MKK-TIK-088-1', 'Dasar Pemrograman', 4, 1, '-', 'TE'),
('MKK-TIK-212-2', 'Struktur Data', 2, 2, '-', 'TE'),
('MKK-TIK-219-2', 'Paket Aplikasi Komputer', 3, 2, '-', 'TE'),
('MKK-TIK-241-2', 'Sistem Operasi', 2, 2, '-', 'TE'),
('rarar', 'arar', 2, 4, '-', 'TE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `nim` varchar(20) NOT NULL,
  `kd_mk` varchar(50) NOT NULL,
  `kd_dosen` varchar(20) NOT NULL,
  `kd_tahun` varchar(20) NOT NULL,
  `semester_ditempuh` int(2) NOT NULL,
  `grade` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`nim`, `kd_mk`, `kd_dosen`, `kd_tahun`, `semester_ditempuh`, `grade`) VALUES
('1819001', 'MKK-TIK-010-1', 'D001', 'GNJL-18/19', 1, 'A'),
('1819001', 'MKK-TIK-088-1', 'D004', 'GNJL-18/19', 1, 'B'),
('1819002', 'MKK-TIK-010-1', 'D001', 'GNJL-18/19', 1, 'C'),
('1819002', 'MKK-TIK-088-1', 'D004', 'GNJL-18/19', 1, 'D'),
('1819002', 'MKK-TIK-001-1', 'D001', 'GNJL-18/19', 1, 'A'),
('1819003', 'MKK-TIK-010-1', 'D005', 'GNJL-18/19', 1, 'B'),
('1819003', 'MKK-TIK-088-1', 'D001', 'GNJL-18/19', 1, 'A'),
('1819003', 'MKK-TIK-001-1', 'D001', 'GNJL-18/19', 1, 'A'),
('1819001', 'MKK-TIK-219-2', 'D001', 'GNP-18/19', 2, 'B'),
('1819001', 'MKK-TIK-241-2', 'D002', 'GNP-18/19', 2, 'A'),
('1819001', 'MKK-TIK-212-2', 'D003', 'GNP-18/19', 2, 'A'),
('1819001', 'MKK-TIK-001-1', 'D001', 'GNJL-18/19', 1, 'A'),
('1819003', 'MKK-TIK-212-2', 'D003', 'GNP-18/19', 2, 'A'),
('1819003', 'MKK-TIK-241-2', 'D004', 'GNP-18/19', 2, 'B'),
('1819003', 'MKK-TIK-219-2', 'D002', 'GNP-18/19', 2, 'C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_perwalian_header`
--

CREATE TABLE `tbl_perwalian_header` (
  `id_perwalian` int(5) NOT NULL,
  `nim` int(15) NOT NULL,
  `tgl_perwalian` varchar(20) NOT NULL,
  `tgl_persetujuan` varchar(20) NOT NULL,
  `status` char(1) NOT NULL,
  `semester` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_perwalian_header`
--

INSERT INTO `tbl_perwalian_header` (`id_perwalian`, `nim`, `tgl_perwalian`, `tgl_persetujuan`, `status`, `semester`) VALUES
(1, 1819001, '2018-10-11', '18-10-11', '0', '1'),
(2, 1819002, '2018-10-11', '18-10-16', '1', '1'),
(3, 1819003, '2018-10-11', '18-10-16', '1', '1'),
(4, 1819001, '2018-10-11', '18-10-11', '1', '2'),
(5, 1516003, '2018-10-16', '', '0', '1'),
(6, 1819002, '2018-10-16', '18-10-16', '1', '2'),
(7, 1819003, '2018-10-16', '18-10-16', '1', '2'),
(9, 222, '2018-10-16', '', '0', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_thn_ajaran`
--

CREATE TABLE `tbl_thn_ajaran` (
  `kd_tahun` varchar(20) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `tgl_kul` date NOT NULL,
  `tgl_awal_perwalian` date NOT NULL,
  `tgl_akhir_perwalian` date NOT NULL,
  `stts` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_thn_ajaran`
--

INSERT INTO `tbl_thn_ajaran` (`kd_tahun`, `keterangan`, `tgl_kul`, `tgl_awal_perwalian`, `tgl_akhir_perwalian`, `stts`) VALUES
('GNJL-15/16', 'Ganjil 2015/2016', '2015-09-14', '2015-09-14', '2016-01-30', '0'),
('GNJL-16/17', 'Ganjil 2016/2017', '2016-08-08', '2016-08-08', '2016-12-05', '0'),
('GNJL-17/18', 'Ganjil 2017/2018', '2017-10-12', '2017-10-12', '2018-03-22', '0'),
('GNJL-18/19', 'Ganjil 2018/2019', '2018-09-14', '2018-08-28', '2019-01-20', '0'),
('GNP-15/16', 'Genap 2015/2016', '2016-02-15', '2016-02-15', '2016-06-20', '0'),
('GNP-16/17', 'Genap 2016/2017', '2017-01-09', '2017-01-09', '2017-05-15', '0'),
('GNP-17/18', 'Genap 2017/2018', '2018-04-12', '2018-04-12', '2018-08-12', '0'),
('GNP-18/19', 'Genap 2018/2019', '2019-02-25', '2019-01-28', '2019-07-31', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`kd_dosen`);

--
-- Indexes for table `tbl_dosen_wali`
--
ALTER TABLE `tbl_dosen_wali`
  ADD PRIMARY KEY (`nim`,`kd_dosen`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`kd_jadwal`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_mk`
--
ALTER TABLE `tbl_mk`
  ADD PRIMARY KEY (`kd_mk`);

--
-- Indexes for table `tbl_perwalian_header`
--
ALTER TABLE `tbl_perwalian_header`
  ADD PRIMARY KEY (`id_perwalian`);

--
-- Indexes for table `tbl_thn_ajaran`
--
ALTER TABLE `tbl_thn_ajaran`
  ADD PRIMARY KEY (`kd_tahun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `kd_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_perwalian_header`
--
ALTER TABLE `tbl_perwalian_header`
  MODIFY `id_perwalian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
