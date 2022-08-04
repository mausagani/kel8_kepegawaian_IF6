-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Agu 2022 pada 09.00
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kel8_pegawai`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetLog` ()  BEGIN
	SELECT *
	FROM log;
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti`
--

CREATE TABLE `cuti` (
  `no` int(11) NOT NULL,
  `nik_pegawai` varchar(8) NOT NULL,
  `tanggal_cuti` date NOT NULL,
  `jumlah_cuti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cuti`
--

INSERT INTO `cuti` (`no`, `nik_pegawai`, `tanggal_cuti`, `jumlah_cuti`) VALUES
(16, '12232212', '2022-08-01', 23),
(17, '43323322', '2022-08-03', 12),
(18, '77764532', '2022-07-31', 7);

--
-- Trigger `cuti`
--
DELIMITER $$
CREATE TRIGGER `logCuti` AFTER INSERT ON `cuti` FOR EACH ROW INSERT INTO log VALUES ('INSERT','Cuti',NOW(),NEW.nik_pegawai)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `logCuti2` AFTER UPDATE ON `cuti` FOR EACH ROW INSERT INTO log VALUES ('UPDATE','Cuti',NOW(),OLD.nik_pegawai)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `logCuti3` AFTER DELETE ON `cuti` FOR EACH ROW INSERT INTO log VALUES ('DELETE','Cuti',NOW(),OLD.nik_pegawai)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `no` int(11) NOT NULL,
  `nik_pegawai` varchar(8) NOT NULL,
  `gaji_pokok` int(15) NOT NULL,
  `upah_lembur` int(15) NOT NULL,
  `tunjangan` int(15) NOT NULL,
  `pajak` int(15) NOT NULL,
  `total_gaji` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gaji`
--

INSERT INTO `gaji` (`no`, `nik_pegawai`, `gaji_pokok`, `upah_lembur`, `tunjangan`, `pajak`, `total_gaji`) VALUES
(2, '12232212', 7500000, 200000, 1500000, 500000, 8700000),
(3, '43323322', 4000000, 150000, 1500000, 500000, 5150000),
(4, '77764532', 3000000, 300000, 1500000, 500000, 4300000);

--
-- Trigger `gaji`
--
DELIMITER $$
CREATE TRIGGER `logGaji` AFTER INSERT ON `gaji` FOR EACH ROW INSERT INTO log VALUES ('INSERT','Gaji',NOW(),NEW.nik_pegawai)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `logGaji2` AFTER UPDATE ON `gaji` FOR EACH ROW INSERT INTO log VALUES ('UPDATE','Gaji',NOW(),OLD.nik_pegawai)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `logGaji3` AFTER DELETE ON `gaji` FOR EACH ROW INSERT INTO log VALUES ('DELETE','Gaji',NOW(),OLD.nik_pegawai)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `no` int(11) NOT NULL,
  `nik_pegawai` varchar(8) NOT NULL,
  `jenis_jabatan` varchar(25) NOT NULL,
  `masa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`no`, `nik_pegawai`, `jenis_jabatan`, `masa`) VALUES
(2, '12232212', 'Manager', 4),
(3, '43323322', 'Marketing', 3),
(4, '77764532', 'Sales', 4);

--
-- Trigger `jabatan`
--
DELIMITER $$
CREATE TRIGGER `logJabatan` AFTER INSERT ON `jabatan` FOR EACH ROW INSERT INTO log VALUES ('INSERT','Jabatan',NOW(),NEW.nik_pegawai)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `logJabatan2` AFTER UPDATE ON `jabatan` FOR EACH ROW INSERT INTO log VALUES ('UPDATE','Jabatan',NOW(),OLD.nik_pegawai)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `logJabatan3` AFTER DELETE ON `jabatan` FOR EACH ROW INSERT INTO log VALUES ('DELETE','Jabatan',NOW(),OLD.nik_pegawai)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `change` varchar(50) NOT NULL,
  `on_table` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL,
  `nik_pegawai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`change`, `on_table`, `waktu`, `nik_pegawai`) VALUES
('DELETE', 'Jabatan', '2022-08-04 13:40:46', '123123'),
('DELETE', 'Pegawai', '2022-08-04 13:40:58', '123123'),
('DELETE', 'Pegawai', '2022-08-04 13:40:59', '12333333'),
('INSERT', 'Pegawai', '2022-08-04 13:41:30', '1223221'),
('INSERT', 'Pegawai', '2022-08-04 13:41:58', '77764532'),
('INSERT', 'Pegawai', '2022-08-04 13:42:27', '43323322'),
('INSERT', 'Pegawai', '2022-08-04 13:42:32', '1223221'),
('INSERT', 'Pendidikan', '2022-08-04 13:44:49', '12232212'),
('INSERT', 'Pendidikan', '2022-08-04 13:45:22', '43323322'),
('INSERT', 'Pendidikan', '2022-08-04 13:45:59', '77764532'),
('INSERT', 'Jabatan', '2022-08-04 13:46:19', '12232212'),
('INSERT', 'Jabatan', '2022-08-04 13:46:32', '43323322'),
('INSERT', 'Jabatan', '2022-08-04 13:46:43', '77764532'),
('INSERT', 'Gaji', '2022-08-04 13:54:19', '12232212'),
('INSERT', 'Gaji', '2022-08-04 13:55:31', '43323322'),
('INSERT', 'Gaji', '2022-08-04 13:56:48', '77764532'),
('INSERT', 'Cuti', '2022-08-04 13:57:14', '12232212'),
('INSERT', 'Cuti', '2022-08-04 13:57:46', '43323322'),
('INSERT', 'Cuti', '2022-08-04 13:57:57', '77764532');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nik_pegawai` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `usia` varchar(5) NOT NULL,
  `jk` char(1) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telpon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nik_pegawai`, `nama`, `usia`, `jk`, `alamat`, `no_telpon`) VALUES
('12232212', 'Syahid Hidayat', '23', 'L', 'Bandung', '086444343232'),
('43323322', 'Dewi Sartika', '27', 'P', 'Bandung', '089666454323'),
('77764532', 'Sofyan Sarifudin', '32', 'L', 'jakarta', '081232565323');

--
-- Trigger `pegawai`
--
DELIMITER $$
CREATE TRIGGER `logPegawai` AFTER INSERT ON `pegawai` FOR EACH ROW INSERT INTO log VALUES ('INSERT','Pegawai',NOW(),NEW.nik_pegawai)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `logPegawai2` AFTER UPDATE ON `pegawai` FOR EACH ROW INSERT INTO log VALUES ('INSERT','Pegawai',NOW(),OLD.nik_pegawai)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `logPegawai3` AFTER DELETE ON `pegawai` FOR EACH ROW INSERT INTO log VALUES ('DELETE','Pegawai',NOW(),OLD.nik_pegawai)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE `pendidikan` (
  `no` int(11) NOT NULL,
  `nik_pegawai` varchar(8) NOT NULL,
  `perguruan` varchar(50) NOT NULL,
  `sma` varchar(50) NOT NULL,
  `smp` varchar(50) NOT NULL,
  `sd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendidikan`
--

INSERT INTO `pendidikan` (`no`, `nik_pegawai`, `perguruan`, `sma`, `smp`, `sd`) VALUES
(1, '12232212', 'Universitas Indonesia', 'SMAN 12 Bandung', 'SMPN 3 Bandung', 'SDN 5 Bandung'),
(2, '43323322', 'Universitas Islam Negeri', 'SMAN 14 Bandung', 'SMPN 10 Bandung', 'SDN 9 Bandung'),
(3, '77764532', 'Universitas Indonesia', 'SMAN 7 Jakarta', 'SMPN 12 Jakarta', 'SDN 4 Jakarta');

--
-- Trigger `pendidikan`
--
DELIMITER $$
CREATE TRIGGER `logPendidikan` AFTER INSERT ON `pendidikan` FOR EACH ROW INSERT INTO log VALUES ('INSERT','Pendidikan',NOW(),NEW.nik_pegawai)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `logPendidikan2` AFTER UPDATE ON `pendidikan` FOR EACH ROW INSERT INTO log VALUES ('UPDATE','Pendidikan',NOW(),OLD.nik_pegawai)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `logPendidikan3` AFTER DELETE ON `pendidikan` FOR EACH ROW INSERT INTO log VALUES ('DELETE','Pendidikan',NOW(),OLD.nik_pegawai)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('ilham', 'ilham'),
('andre', 'andre123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `nik_pegawai` (`nik_pegawai`);

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `nik_pegawai` (`nik_pegawai`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `nik_pegawai` (`nik_pegawai`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nik_pegawai`);

--
-- Indeks untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `nik_pegawai` (`nik_pegawai`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cuti`
--
ALTER TABLE `cuti`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD CONSTRAINT `cuti_ibfk_1` FOREIGN KEY (`nik_pegawai`) REFERENCES `pegawai` (`nik_pegawai`);

--
-- Ketidakleluasaan untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `gaji_ibfk_1` FOREIGN KEY (`nik_pegawai`) REFERENCES `pegawai` (`nik_pegawai`);

--
-- Ketidakleluasaan untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD CONSTRAINT `jabatan_ibfk_1` FOREIGN KEY (`nik_pegawai`) REFERENCES `pegawai` (`nik_pegawai`);

--
-- Ketidakleluasaan untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `pendidikan_ibfk_1` FOREIGN KEY (`nik_pegawai`) REFERENCES `pegawai` (`nik_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
