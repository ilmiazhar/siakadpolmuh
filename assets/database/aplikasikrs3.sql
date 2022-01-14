-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Okt 2018 pada 00.23
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
('D005', '-', 'Didi Kusaeri, S.T.');

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
('121516001', 'D001'),
('121516002', 'D001'),
('121516003', 'D001'),
('121617001', 'D002');

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
(3, 'MKK-TIK-088-1', 'D001', 'GNP-15/16', 'Senin / 08.00-09.00 / M1', 20, 'Reguler', '-'),
(7, 'MKK-TIK-010-1', 'D001', 'GNP-15/16', 'Senin / 09.00-10.00 / 3', 32, 'Reguler', '-'),
(10, 'MKK-TIK-001-1', 'D003', 'GNJL-17/18', 'Kamis / 19.00-20.00 / m4', 20, 'Ekstensi', 'B'),
(11, 'MKK-TIK-001-1', 'D003', 'GNJL-17/18', 'Jum''at / 08.00-09.00 / m3', 30, 'Reguler', 'B'),
(12, 'MKK-TIK-010-1', 'D002', 'GNJL-17/18', 'Selasa / 20.00-21.00 / M 1', 20, 'Ekstensi', 'A'),
(13, 'MKK-TIK-088-1', 'D001', 'GNJL-17/18', 'Rabu / 19.00-20.00 / M2', 25, 'Ekstensi', 'A'),
(15, 'MKK-TIK-212-2', 'D003', 'GNP-17/18', 'Senin / 08.00-09.00 / M4', 25, 'Reguler', 'b'),
(16, 'MKK-TIK-219-2', 'D001', 'GNP-17/18', 'Selasa / 08.00-09.00 / m3', 40, 'Reguler', 'a'),
(17, 'MKK-TIK-241-2', 'D002', 'GNP-17/18', 'Senin / 09.00-10.00 / m1', 20, 'Reguler', 'b'),
(18, 'MKK 020-2', 'D004', 'GNP-15/16', 'Jumat / 08.00-09.00 / M5', 30, 'Reguler', 'A');

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
('121516001', 'ed4d02ef5415b77c5cc75b29ee683a0e', 'mahasiswa'),
('121516002', '9003ca355a62c9fc7c0f9cbeea582c45', 'mahasiswa'),
('121516003', 'a2660c60054dba771b790e9fc0d7a76e', 'mahasiswa'),
('121617001', '4b41a7461626275ab139250fc88e1b2b', 'mahasiswa'),
('121718004', 'b050e2bf0dfd5cecabdb3084c6a4e536', 'mahasiswa'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('D001', 'd5cbf528f740b502b79241ff873ce6c5', 'dosen'),
('D002', 'b3460c056d63af44fe66bd92c961a144', 'dosen'),
('D003', 'fda7f226bff2b2df5da2e703f84bab11', 'dosen'),
('D004', '22d164d469bfc0bc0f2aefe67dd2806e', 'dosen'),
('D005', 'b7ca9b1c84b0669f89357ee7bafb1274', 'dosen');

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
('121516001', 'Admad Dahlan', 2015, 'Teknik Elektro', 'Reguler'),
('121516002', 'Joko Tingkir', 2015, 'Teknik Elektro', 'Reguler'),
('121516003', 'Z', 2015, 'Teknik Elektro', 'Reguler'),
('121617001', 'Brian', 2016, 'Teknik Elektro', 'Reguler');

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
('MKK 001-3', 'Komputer Jaringan', 4, 3, '-', 'TE'),
('MKK 002-3', 'PKL', 3, 3, '-', 'TE'),
('MKK 020-2', 'Aplikasi Web', 3, 2, '-', 'TE'),
('MKK-TE-125-6', 'Observasi Industri', 2, 6, '-', 'TE'),
('MKK-TE-181-6', 'Manajemen Industri', 2, 6, '-', 'TE'),
('MKK-TE-199-6', 'Manajemen Internetworking dan Router', 3, 6, '-', 'TE'),
('MKK-TIK-001-1', 'Bahasa Inggris', 3, 1, '-', 'TE'),
('MKK-TIK-010-1', 'Pancasila', 3, 1, '-', 'TE'),
('MKK-TIK-088-1', 'Dasar Pemrograman', 4, 1, '-', 'TE'),
('MKK-TIK-212-2', 'Struktur Data', 2, 2, '-', 'TE'),
('MKK-TIK-219-2', 'Paket Aplikasi Komputer', 3, 2, '-', 'TE'),
('MKK-TIK-241-2', 'Sistem Operasi', 2, 2, '-', 'TE');

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
('121516002', 'MKK-TIK-088-1', 'D001', 'GNP-15/16', 1, 'A'),
('121516002', 'MKK-TIK-010-1', 'D001', 'GNP-15/16', 1, 'B'),
('121516002', 'MKK-TIK-001-1', 'D003', 'GNJL-17/18', 1, 'B'),
('121516003', 'MKK-TIK-088-1', 'D001', 'GNP-15/16', 1, 'B'),
('121516003', 'MKK-TIK-010-1', 'D001', 'GNP-15/16', 1, 'B'),
('121516003', 'MKK-TIK-001-1', 'D003', 'GNJL-17/18', 1, 'B'),
('121516001', 'MKK-TIK-088-1', 'D001', 'GNP-15/16', 1, 'A'),
('121516001', 'MKK-TIK-010-1', 'D001', 'GNP-15/16', 1, 'A'),
('121516001', 'MKK-TIK-001-1', 'D003', 'GNJL-17/18', 1, 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_perwalian_detail`
--

CREATE TABLE `tbl_perwalian_detail` (
  `nim` varchar(20) NOT NULL,
  `kd_jadwal` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_perwalian_detail`
--

INSERT INTO `tbl_perwalian_detail` (`nim`, `kd_jadwal`) VALUES
('121516001', 3),
('121516001', 7),
('121516001', 11),
('121516003', 3),
('121516003', 7),
('121516003', 11),
('121516002', 3),
('121516002', 7),
('121516002', 11);

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
(1, 121516001, '2018-10-01', '18-10-01', '1', '1'),
(4, 121516003, '2018-10-08', '18-10-08', '1', '1'),
(5, 121516002, '2018-10-08', '18-10-08', '1', '1');

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
('GNP-15/16', 'Genap 2015/2016', '2016-02-15', '2016-02-15', '2016-06-20', '1'),
('GNP-16/17', 'Genap 2016/2017', '2017-01-09', '2017-01-09', '2017-05-15', '0'),
('GNP-17/18', 'Genap 2017/2018', '2018-04-12', '2018-04-12', '2018-08-12', '0');

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
  MODIFY `kd_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_perwalian_header`
--
ALTER TABLE `tbl_perwalian_header`
  MODIFY `id_perwalian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
