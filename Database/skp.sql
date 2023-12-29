-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2020 at 08:20 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skp`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` char(50) NOT NULL,
  `kode_bidang` varchar(50) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_barang` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `waktu_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `waktu_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_update` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `kode_bidang`, `nama_barang`, `harga_barang`, `username`, `waktu_input`, `waktu_update`, `user_update`) VALUES
('2 1 1 1', '1', 'TANAH BENGKOK', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 1 2', '1', 'TANAH BONDO', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 1 3', '1', 'TANAH KALAKERAN NEGERI', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 1 4', '1', 'TANAH PECATU', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 1 5', '1', 'TANAH PENGAREM-AREM', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 1 6', '1', 'TANAH TITISARA', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 2 1', '1', 'TANAH PERKAMPUNGAN', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 2 2', '1', 'EMPLASMEN', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 2 3', '1', 'TANAH KUBURAN', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 3 1', '1', 'SAWAH SATU TAHUN DITANAMI', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 3 2', '1', 'TANAH KERING/TEGALAN', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 3 3', '1', 'LADANG', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 4 1', '1', 'TANAH PERKEBUNAN', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 5 1', '1', 'TANAH HUTAN LEBAT (DITANAMI JENIS KAYU UTAMA)', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 5 2', '1', 'TANAH HUTAN BELUKAR', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 5 3', '1', 'HUTAN TANAMAN JENIS', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 5 4', '1', 'HUTAN ALAM SEJENIS/HUTAN RAWA', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 5 5', '1', 'HUTAN UNTUK PENGGUNAAN KHUSUS', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 6 1', '1', 'TANAH YANG TIDAK ADA JARINGAN PENGAIRAN', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 6 2', '1', 'TUMBUH LIAR BERCAMPUR JENIS LAIN', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 7 1', '1', 'TAMBAK', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 7 2', '1', 'AIR TAWAR', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 8 1', '1', 'RAWA', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 8 2', '1', 'DANAU', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 9 1', '1', 'TANAH TANDUS', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 9 2', '1', 'TANAH RUSAK', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 10 1', '1', 'ALANG-ALANG', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 10 2', '1', 'PADANG RUMPUT', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 11 1', '1', 'TANAH PERTAMBANGAN', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 12 1', '1', 'TANAH BANGUNAN PERUMAHAN/GDG. TEMPAT TINGGAL', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 12 2', '1', 'TANAH UNTUK BANGUNAN GEDUNG PERDAGANGAN', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 12 3', '1', 'TANAH UNTUK BANGUNAN INDUSTRI', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 12 4', '1', 'TANAH UNTUK BANGUNAN TEMPAT KERJA/JASA', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 12 5', '1', 'TANAH KOSONG', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 12 6', '1', 'TANAH PETERNAKAN', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 12 7', '1', 'TANAH BANGUNAN PENGAIRAN', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 12 8', '1', 'TANAH BANGUNAN JALAN DAN JEMBATAN', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 12 9', '1', 'TANAH LEMBIRAN/BANTARAN/LEPE-LEPE/SETREN DST', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 13 1', '1', 'TANAH LAPANGAN OLAH RAGA', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 13 2', '1', 'TANAH LAPANGAN PARKIR', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 13 3', '1', 'TANAH LAPANGAN PENIMBUN BARANG', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 13 4', '1', 'TANAH LAPANGAN PEMANCAR DAN STUDIO ALAM', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 13 5', '1', 'TANAH LAPANGAN PENGUJIAN/PENGOLAHAN', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 13 6', '1', 'TANAH LAPANGAN TERBANG', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 13 7', '1', 'TANAH UNTUK BANGUNAN JALAN', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 13 8', '1', 'TANAH UNTUK BANGUNAN AIR', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 13 9', '1', 'TANAH UNTUK BANGUNAN INSTALASI', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 13 10', '1', 'TANAH UNTUK BANGUNAN JARINGAN', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 13 11', '1', 'TANAH UNTUK BANGUNAN BERSEJARAH', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 13 12', '1', 'TANAH UNTUK BANGUNAN GEDUNG OLAH RAGA', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 13 13', '1', 'TANAH UNTUK BANGUNAN TEMPAT IBADAH', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('2 1 14 1', '1', 'PENGGALIAN', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('3 1 1 1', '2', 'TRACTOR', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('3 1 1 2', '2', 'GRADER', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('3 1 1 3', '2', 'EXCAVATOR', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('3 1 1 4', '2', 'PILE DRIVER', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('3 1 1 5', '2', 'HAULER', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('3 1 1 6', '2', 'ASPHALT EQUIPMENT', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('3 1 1 7', '2', 'COMPACTING EQUIPMENT', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('3 1 1 8', '2', 'AGGREGATE & CONCRETE EQUIPMENT', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('3 1 1 9', '2', 'LOADER', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('3 1 1 10', '2', 'ALAT PENGANGKAT', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('3 1 1 11', '2', 'MESIN PROSES', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('3 1 1 99', '2', 'ALAT BESAR DARAT LAINNYA', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('3 1 2 1', '2', 'DREDGER', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('3 1 2 2', '2', 'FLOATING EXCAVATOR', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('3 1 2 3', '2', 'AMPHIBI DREDGER', '0', 'admin', '2020-08-18 08:39:14', '2020-08-31 17:00:00', 'admin'),
('3 1 2 4', '2', 'KAPAL TARIK', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 1 2 5', '2', 'MESIN PROSES APUNG', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 1 2 99', '2', 'ALAT BESAR APUNG LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 1 3 1', '2', 'ALAT PENARIK', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 1 3 2', '2', 'FEEDER', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 1 3 3', '2', 'COMPRESSOR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 1 3 4', '2', 'ELECTRIC GENERATING SET', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 1 3 5', '2', 'POMPA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 1 3 6', '2', 'MESIN BOR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 1 3 7', '2', 'UNIT PEMELIHARAAN LAPANGAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 1 3 8', '2', 'ALAT PENGOLAHAN AIR KOTOR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 1 3 9', '2', 'PEMBANGKIT UAP AIR PANAS/STEAM GENERATOR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 1 3 12', '2', 'PERALATAN KEBAKARAN HUTAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 1 3 13', '2', 'PERALATAN SELAM', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 1 3 14', '2', 'PERALATAN SAR MOUNTENERING', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 1 3 99', '2', 'ALAT BANTU LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 2 1 1', '2', 'KENDARAAN DINAS BERMOTOR PERORANGAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 2 1 2', '2', 'KENDARAAN BERMOTOR PENUMPANG', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 2 1 3', '2', 'KENDARAAN BERMOTOR ANGKUTAN BARANG', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 2 1 4', '2', 'KENDARAAN BERMOTOR BERODA DUA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 2 1 5', '2', 'KENDARAAN BERMOTOR KHUSUS', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 2 1 99', '2', 'ALAT ANGKUTAN DARAT BERMOTOR LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 2 2 1', '2', 'KENDARAAN TAK BERMOTOR ANGKUTAN BARANG', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 2 2 2', '2', 'KENDARAAN TAK BERMOTOR PENUMPANG', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 2 2 3', '2', 'ALAT ANGKUTAN KERETA REL TAK BERMOTOR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 2 2 99', '2', 'ALAT ANGKUTAN DARAT TAK BERMOTOR LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 2 3 1', '2', 'ALAT ANGKUTAN APUNG BERMOTOR UNTUK BARANG', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 2 3 2', '2', 'ALAT ANGKUTAN APUNG BERMOTOR UNTUK PENUMPANG', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 2 3 3', '2', 'ALAT ANGKUTAN APUNG BERMOTOR KHUSUS', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 2 3 99', '2', 'ALAT ANGKUTAN APUNG BERMOTOR LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 2 4 1', '2', 'ALAT ANGKUTAN APUNG TAK BERMOTOR UNTUK BARANG', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 2 4 2', '2', 'ALAT ANGKUTAN APUNG TAK BERMOTOR UNTUK PENUMPANG', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 2 4 3', '2', 'ALAT ANGKUTAN APUNG TAK BERMOTOR KHUSUS', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 2 4 99', '2', 'ALAT ANGKUTAN APUNG TAK BERMOTOR LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 1 1', '2', 'PERKAKAS KONSTRUKSI LOGAM TERPASANG PADA PONDASI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 1 2', '2', 'PERKAKAS KONSTRUKSI LOGAM YANG TRANSPORTABLE (BERPINDAH)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 1 3', '2', 'PERKAKAS BENGKEL LISTRIK', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 1 4', '2', 'PERKAKAS BENGKEL SERVICE', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 1 5', '2', 'PERKAKAS PENGANGKAT BERMESIN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 1 6', '2', 'PERKAKAS BENGKEL KAYU', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 1 7', '2', 'PERKAKAS BENGKEL KHUSUS', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 1 8', '2', 'PERALATAN LAS', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 1 99', '2', 'ALAT BENGKEL BERMESIN LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 2 1', '2', 'PERKAKAS BENGKEL KONSTRUKSI LOGAM', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 2 2', '2', 'PERKAKAS BENGKEL LISTRIK', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 2 3', '2', 'PERKAKAS BENGKEL SERVICE', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 2 4', '2', 'PERKAKAS PENGANGKAT', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 2 5', '2', 'PERKAKAS STANDARD (STANDARD TOOLS)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 2 6', '2', 'PERKAKAS KHUSUS (SPECIAL TOOLS)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 2 7', '2', 'PERKAKAS BENGKEL KERJA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 2 8', '2', 'PERALATAN TUKANG BESI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 2 9', '2', 'PERALATAN TUKANG KAYU', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 2 10', '2', 'PERALATAN TUKANG KULIT', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 2 11', '2', 'PERALATAN UKUR, GIP & FETING', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 2 12', '2', 'PERALATAN BENGKEL KHUSUS PELADAM', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 2 99', '2', 'ALAT BENGKEL TAK BERMESIN LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 3 1', '2', 'ALAT UKUR UNIVERSAL', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 3 2', '2', 'UNIVERSAL TESTER', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 3 3', '2', 'ALAT UKUR/PEMBANDING', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 3 4', '2', 'ALAT UKUR LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 3 5', '2', 'ALAT TIMBANGAN/BIARA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 3 6', '2', 'ANAK TIMBANGAN / BIARA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 3 7', '2', 'TAKARAN KERING', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 3 8', '2', 'TAKARAN BAHAN BANGUNAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 3 3 9', '2', 'TAKARAN LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 4 1 1', '2', 'ALAT PENGOLAHAN TANAH DAN TANAMAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 4 1 2', '2', 'ALAT PEMELIHARAAN TANAMAN/IKAN/TERNAK', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 4 1 3', '2', 'ALAT PANEN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 4 1 4', '2', 'ALAT PENYIMPAN HASIL PERCOBAAN PERTANIAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 4 1 5', '2', 'ALAT LABORATORIUM PERTANIAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 4 1 6', '2', 'ALAT PROSESING', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 4 1 7', '2', 'ALAT PASCA PANEN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 4 1 8', '2', 'ALAT PRODUKSI PERIKANAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 4 1 99', '2', 'ALAT PENGOLAHAN LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 5 1 1', '2', 'MESIN KETIK', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 5 1 2', '2', 'MESIN HITUNG/MESIN JUMLAH', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 5 1 3', '2', 'ALAT REPRODUKSI (PENGGANDAAN)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 5 1 4', '2', 'ALAT PENYIMPAN PERLENGKAPAN KANTOR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 5 1 5', '2', 'ALAT KANTOR LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 5 1 99', '2', 'ALAT KANTOR LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 5 2 1', '2', 'MEUBELAIR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 5 2 2', '2', 'ALAT PENGUKUR WAKTU', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 5 2 3', '2', 'ALAT PEMBERSIH', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 5 2 4', '2', 'ALAT PENDINGIN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 5 2 5', '2', 'ALAT DAPUR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 5 2 6', '2', 'ALAT RUMAH TANGGA LAINNYA ( HOME USE )', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 5 2 99', '2', 'ALAT RUMAH TANGGA LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 1 1', '2', 'PERALATAN STUDIO AUDIO', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 1 2', '2', 'PERALATAN STUDIO VIDEO DAN FILM', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 1 3', '2', 'PERALATAN STUDIO GAMBAR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 1 4', '2', 'PERALATAN CETAK', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 1 5', '2', 'PERALATAN STUDIO PEMETAAN/PERALATAN UKUR TANAH', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 1 99', '2', 'ALAT STUDIO LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 2 1', '2', 'ALAT KOMUNIKASI TELEPHONE', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 2 2', '2', 'ALAT KOMUNIKASI RADIO SSB', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 2 3', '2', 'ALAT KOMUNIKASI RADIO HF/FM', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 2 4', '2', 'ALAT KOMUNIKASI RADIO VHF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 2 5', '2', 'ALAT KOMUNIKASI RADIO UHF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 2 6', '2', 'ALAT KOMUNIKASI SOSIAL', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 2 7', '2', 'ALAT-ALAT SANDI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 2 8', '2', 'ALAT KOMUNIKASI KHUSUS', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 2 9', '2', 'ALAT KOMUNIKASI DIGITAL DAN KONVENSIONAL', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 2 10', '2', 'ALAT KOMUNIKASI SATELIT', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 2 99', '2', 'ALAT KOMUNIKASI LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 1', '2', 'PERALATAN PEMANCAR MF/MW', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 2', '2', 'PERALATAN PEMANCAR HF/SW', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 3', '2', 'PERALATAN PEMANCAR VHF/FM', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 4', '2', 'PERALATAN PEMANCAR UHF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 5', '2', 'PERALATAN PEMANCAR SHF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 6', '2', 'PERALATAN ANTENA MF/MW', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 7', '2', 'PERALATAN ANTENA HF/SW', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 8', '2', 'PERALATAN ANTENA VHF/FM', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 9', '2', 'PERALATAN ANTENA UHF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 10', '2', 'PERALATAN ANTENA SHF/PARABOLA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 11', '2', 'PERALATAN TRANSLATOR VHF/VHF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 12', '2', 'PERALATAN TRANSLATOR UHF/UHF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 13', '2', 'PERALATAN TRANSLATOR VHF/UHF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 14', '2', 'PERALATAN TRANSLATOR UHF/VHF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 15', '2', 'PERALATAN MICROWAVE F P U', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 16', '2', 'PERALATAN MICROWAVE TERESTRIAL', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 17', '2', 'PERALATAN MICROWAVE TVRO', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 18', '2', 'PERALATAN DUMMY LOAD', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 19', '2', 'SWITCHER ANTENA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 20', '2', 'SWITCHER/MENARA ANTENA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 21', '2', 'FEEDER', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 22', '2', 'HUMIDITY CONTROL', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 23', '2', 'PROGRAM INPUT EQUIPMENT', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 24', '2', 'PERALATAN ANTENE PENERIMA VHF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 25', '2', 'PERALATAN PEMANCAR LF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 26', '2', 'UNIT PEMANCAR MF+HF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 27', '2', 'PERALATAN ANTENA PEMANCAR MF+HF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 28', '2', 'PERALATAN PENERIMA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 29', '2', 'PERALATAN PEMANCAR DAN PENERIMA LF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 30', '2', 'PERALATAN PEMANCAR DAN PENERIMA MF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 31', '2', 'PERALATAN PEMANCAR DAN PENERIMA HF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 32', '2', 'PERALATAN PEMANCAR DAN PENERIMA MF+HF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 33', '2', 'PERALATAN PEMANCAR DAN PENERIMA VHF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 34', '2', 'PERALATAN PEMANCAR DAN PENERIMA UHF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 35', '2', 'PERALATAN PEMANCAR DAN PENERIMA SHF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 36', '2', 'PERALATAN ANTENA PEMANCAR DAN PENERIMA LF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 37', '2', 'PERALATAN ANTENA PEMANCAR DAN PENERIMA MF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 38', '2', 'PERALATAN ANTENA PEMANCAR DAN PENERIMA HF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 39', '2', 'PERALATAN ANTENA PEMANCAR DAN PENERIMA MF+HF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 40', '2', 'PERALATAN ANTENA PEMANCAR DAN PENERIMA VHF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 41', '2', 'PERALATAN ANTENA PEMANCAR DAN PENERIMA UHF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 42', '2', 'PERALATAN ANTENA PEMANCAR DAN PENERIMA SHF', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 43', '2', 'PERALATAN PENERIMA CUACA CITRA SATELITE RESOLUSI RENDAH', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 44', '2', 'PERALATAN PENERIMA CUACA CITRA SATELITE RESOLUSI TINGGI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 45', '2', 'PERALATAN PENERIMA DAN PENGIRIM GAMBAR KE PERMUKAAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 46', '2', 'PERALATAN PERLENGKAPAN RADIO', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 47', '2', 'SUMBER TENAGA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 3 99', '2', 'PERALATAN PEMANCAR LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 4 1', '2', 'PERALATAN KOMUNIKASI NAVIGASI INSTRUMEN LANDING SYSTEM', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 4 2', '2', 'VERY HIGHT FREQUENCE OMNI RANGE (VOR)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 4 3', '2', 'DISTANCE MEASURING EQUIPMENT (DME)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 4 4', '2', 'RADAR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 4 5', '2', 'ALAT PENGATUR TELEKOMUNIKASI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 4 6', '2', 'PERALATAN KOMUNIKASI UNTUK DOKUMENTASI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 6 4 99', '2', 'PERALATAN KOMUNIKASI NAVIGASI LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 7 1 1', '2', 'KOMPUTER JARINGAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 7 1 2', '2', 'PERSONAL KOMPUTER', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 7 1 99', '2', 'KOMPUTER UNIT LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 7 2 1', '2', 'PERALATAN MAINFRAME', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 7 2 2', '2', 'PERALATAN MINI KOMPUTER', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 7 2 3', '2', 'PERALATAN PERSONAL KOMPUTER', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 7 2 4', '2', 'PERALATAN JARINGAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 7 2 99', '2', 'PERALATAN KOMPUTER LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 8 1 1', '2', 'BOR MESIN TUMBUK', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 8 1 2', '2', 'BOR MESIN PUTAR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 8 1 99', '2', 'ALAT PENGEBORAN MESIN LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 8 2 1', '2', 'BANGKA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 8 2 2', '2', 'PANTEK', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 8 2 3', '2', 'PUTAR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 8 2 4', '2', 'PERALATAN BANTU', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 8 2 99', '2', 'ALAT PENGEBORAN NON MESIN LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 9 1 1', '2', 'PERALATAN SUMUR MINYAK', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 9 1 2', '2', 'SUMUR PEMBORAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 9 1 99', '2', 'SUMUR LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 9 2 1', '2', 'R I G', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 9 2 99', '2', 'PRODUKSI LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 9 3 1', '2', 'ALAT PENGOLAHAN MINYAK', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 9 3 2', '2', 'ALAT PENGOLAHAN AIR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 9 3 3', '2', 'ALAT PENGOLAHAN STEAM', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 9 3 4', '2', 'ALAT PENGOLAHAN WAX', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 9 3 99', '2', 'PENGOLAHAN DAN PEMURNIAN LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 10 1 1', '2', 'PERALATAN OLAH RAGA ATLETIK', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 10 1 2', '2', 'PERALATAN PERMAINAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 10 1 3', '2', 'PERALATAN SENAM', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 10 1 4', '2', 'PARALATAN OLAH RAGA AIR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 10 1 5', '2', 'PERALATAN OLAH RAGA UDARA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('3 10 1 6', '2', 'PERALATAN OLAH RAGA LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 1', '3', 'BANGUNAN GEDUNG KANTOR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 2', '3', 'BANGUNAN GUDANG', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 3', '3', 'BANGUNAN GEDUNG UNTUK BENGKEL', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 4', '3', 'BANGUNAN GEDUNG INSTALASI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 5', '3', 'BANGUNAN GEDUNG LABORATORIUM', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 6', '3', 'BANGUNAN KESEHATAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 7', '3', 'BANGUNAN GEDUNG TEMPAT IBADAH', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 8', '3', 'BANGUNAN GEDUNG TEMPAT PERTEMUAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 9', '3', 'BANGUNAN GEDUNG TEMPAT PENDIDIKAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 10', '3', 'BANGUNAN GEDUNG TEMPAT OLAH RAGA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 11', '3', 'BANGUNAN GEDUNG PERTOKOAN/KOPERASI/PASAR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 12', '3', 'BANGUNAN GEDUNG GARASI/POOL', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 13', '3', 'BANGUNAN GEDUNG PEMOTONG HEWAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 14', '3', 'BANGUNAN GEDUNG PERPUSTAKAAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 15', '3', 'BANGUNAN GEDUNG MUSIUM', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 16', '3', 'BANGUNAN GEDUNG TERMINAL/PELABUHAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 17', '3', 'BANGUNAN TERBUKA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 18', '3', 'BANGUNAN PENAMPUNG SEKAM', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 19', '3', 'BANGUNAN TEMPAT PELELANGAN IKAN (TPI)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 20', '3', 'BANGUNAN INDUSTRI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 21', '3', 'BANGUNAN PETERNAKAN/PERIKANAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 22', '3', 'BANGUNAN GEDUNG TEMPAT KERJA LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 23', '3', 'BANGUNAN FASILITAS UMUM', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 24', '3', 'BANGUNAN PARKIR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 25', '3', 'TAMAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 1 99', '3', 'BANGUNAN GEDUNG TEMPAT KERJA LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 2 1', '3', 'HOTEL', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 2 2', '3', 'MOTEL', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 2 3', '3', 'PANTI ASUHAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 1 2 99', '3', 'BANGUNAN GEDUNG TEMPAT TINGGAL LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 2 1 1', '3', 'CANDI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 2 1 2', '3', 'TUGU', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 2 1 3', '3', 'BANGUNAN PENINGGALAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('4 2 1 99', '3', 'CANDI/TUGU PERINGATAN/PRASASTI LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 1 1 1', '4', 'JALAN DESA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 1 1 2', '4', 'JALAN KHUSUS', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 1 1 99', '4', 'JALAN LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 1 2 1', '4', 'JEMBATAN PADA JALAN DESA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 1 2 2', '4', 'JEMBATAN PADA JALAN KHUSUS', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 1 2 3', '4', 'JEMBATAN PENYEBERANGAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 1 2 4', '4', 'JEMBATAN LABUH/SANDAR PADA TERMINAL', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 1 2 5', '4', 'JEMBATAN PENGUKUR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 1 2 99', '4', 'JEMBATAN LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 1 1', '4', 'BANGUNAN WADUK IRIGASI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 1 2', '4', 'BANGUNAN PENGAMBILAN IRIGASI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 1 3', '4', 'BANGUNAN PEMBAWA IRIGASI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 1 4', '4', 'BANGUNAN PEMBUANG IRIGASI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 1 5', '4', 'BANGUNAN PENGAMAN IRIGASI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 1 6', '4', 'BANGUNAN PELENGKAP IRIGASI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 1 7', '4', 'BANGUNAN SAWAH IRIGASI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 1 99', '4', 'BANGUNAN AIR IRIGASI LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 2 1', '4', 'BANGUNAN WADUK PASANG SURUT', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 2 2', '4', 'BANGUNAN PENGAMBILAN PASANG SURUT', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 2 3', '4', 'BANGUNAN PEMBAWA PASANG SURUT', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 2 4', '4', 'SALURAN PEMBUANG PASANG SURUT', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 2 5', '4', 'BANGUNAN PENGAMAN PASANG SURUT', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 2 6', '4', 'BANGUNAN PELENGKAP PASANG SURUT', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 2 7', '4', 'BANGUNAN SAWAH PASANG SURUT', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 2 99', '4', 'BANGUNAN PENGAIRAN PASANG SURUT LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 3 1', '4', 'BANGUNAN WADUK PENGEMBANGAN RAWA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 3 2', '4', 'BANGUNAN PENGAMBILAN PENGEMBANGAN RAWA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 3 3', '4', 'BANGUNAN PEMBAWA PENGEMBANGAN RAWA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 3 4', '4', 'BANGUNAN PEMBUANG PENGEMBANGAN RAWA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 3 5', '4', 'BANGUNAN PENGAMAN PENGEMBANGAN RAWA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 3 6', '4', 'BANGUNAN PELENGKAP PENGEMBANGAN RAWA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 3 7', '4', 'BANGUNAN SAWAH PENGEMBANGAN RAWA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 3 99', '4', 'BANGUNAN PENGEMBANGAN RAWA DAN POLDER LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 4 1', '4', 'BANGUNAN PENGAMAN SUNGAI/PANTAI & PENANGGULANGAN BENCANA ALAM', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 4 2', '4', 'BANGUNAN PENGAMBILAN PENGAMAN SUNGAI/PANTAI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 4 3', '4', 'BANGUNAN PEMBAWA PENGAMAN SUNGAI/PANTAI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 4 4', '4', 'BANGUNAN PEMBUANG PENGAMAN SUNGAI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 4 5', '4', 'BANGUNAN PENGAMAN PENGAMANAN SUNGAI/PANTAI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 4 6', '4', 'BANGUNAN PELENGKAP PENGAMAN SUNGAI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 4 99', '4', 'BANGUNAN PENGAMAN SUNGAI/PANTAI & PENANGGULANGAN BENCANA ALAM LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 5 1', '4', 'BANGUNAN WADUK PENGEMBANGAN SUMBER AIR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 5 2', '4', 'BANGUNAN PENGAMBILAN PENGEMBANGAN SUMBER AIR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 5 3', '4', 'BANGUNAN PEMBAWA PENGEMBANGAN SUMBER AIR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 5 4', '4', 'BANGUNAN PEMBUANG PENGEMBANGAN SUMBER AIR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 5 5', '4', 'BANGUNAN PENGAMAN PENGEMBANGAN SUMBER AIR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 5 6', '4', 'BANGUNAN PELENGKAP PENGEMBANGAN SUMBER AIR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 5 7', '4', 'BANGUNAN SAWAH IRIGASI AIR TANAH', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 5 99', '4', 'BANGUNAN PENGEMBANGAN SUMBER AIR DAN AIR TANAH LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 6 1', '4', 'BANGUNAN WADUK AIR BERSIH/AIR BAKU', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 6 2', '4', 'BANGUNAN PENGAMBILAN AIR BERSIH/AIR BAKU', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 6 3', '4', 'BANGUNAN PEMBAWA AIR BERSIH/AIR BAKU', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 6 4', '4', 'BANGUNAN PEMBUANG AIR BERSIH/AIR BAKU', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 6 5', '4', 'BANGUNAN PELENGKAP AIR BERSIH/AIR BAKU', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 6 99', '4', 'BANGUNAN AIR BERSIH/AIR BAKU LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 7 1', '4', 'BANGUNAN PEMBAWA AIR KOTOR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 7 2', '4', 'BANGUNAN WADUK AIR KOTOR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 7 3', '4', 'BANGUNAN PEMBUANG AIR KOTOR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 7 4', '4', 'BANGUNAN PENGAMAN AIR KOTOR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 7 5', '4', 'BANGUNAN PELENGKAP AIR KOTOR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 2 7 99', '4', 'BANGUNAN AIR KOTOR LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 1 1', '4', 'INSTALASI AIR PERMUKAAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 1 2', '4', 'INSTALASI AIR SUMBER / MATA AIR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 1 3', '4', 'INSTALASI AIR TANAH DALAM', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 1 4', '4', 'INSTALASI AIR TANAH DANGKAL', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 1 5', '4', 'INSTALASI AIR BERSIH / AIR BAKU LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 1 99', '4', 'INSTALASI AIR BERSIH / AIR BAKU LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 2 1', '4', 'INSTALASI AIR BUANGAN DOMESTIK', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 2 2', '4', 'INSTALASI AIR BUANGAN INDUSTRI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 2 3', '4', 'INSTALASI AIR BUANGAN PERTANIAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 2 99', '4', 'INSTALASI AIR KOTOR LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 3 1', '4', 'INSTALASI PENGOLAHAN SAMPAH ORGANIK', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 3 2', '4', 'INSTALASI PENGOLAHAN SAMPAH NON ORGANIK', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 3 3', '4', 'BANGUNAN PENAMPUNG SAMPAH', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 3 99', '4', 'INSTALASI PENGOLAHAN SAMPAH LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 4 1', '4', 'INSTALASI PENGOLAHAN BAHAN BANGUNAN PERCONTOHAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 4 2', '4', 'INSTALASI PENGOLAHAN BAHAN BANGUNAN PERINTIS', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 4 3', '4', 'INSTALASI PENGOLAHAN BAHAN BANGUNAN TERAPAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 4 99', '4', 'INSTALASI PENGOLAHAN BAHAN BANGUNAN LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 5 1', '4', 'INSTALASI PEMBANGKIT LISTRIK TENAGA AIR (PLTA)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 5 2', '4', 'INSTALASI PEMBANGKIT LISTRIK TENAGA DIESEL (PLTD)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 5 3', '4', 'INSTALASI PEMBANGKIT LISTRIK TENAGA MIKRO HIDRO (PLTM)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 5 4', '4', 'INSTALASI PEMBANGKIT LISTRIK TENAGA ANGIN (PLTAN)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 5 5', '4', 'INSTALASI PEMBANGKIT LISTRIK TENAGA UAP (PLTU)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 5 6', '4', 'INSTALASI PEMBANGKIT LISTRIK TENAGA NUKLIR (PLTN)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 5 7', '4', 'INSTALASI PEMBANGKIT LISTRIK TENAGA GAS (PLTG)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 5 8', '4', 'INSTALASI PEMBANGKIT LISTRIK TENAGA PANAS BUMI (PLTP)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 5 9', '4', 'INSTALASI PEMBANGKIT LISTRIK TENAGA SURYA (PLTS)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 5 10', '4', 'INSTALASI PEMBANGKIT LISTRIK TENAGA BIOGAS (PLTB)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 5 11', '4', 'INSTALASI PEMBANGKIT LISTRIK TENAGA SAMUDERA / GELOMBANG SAMUDERA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 5 99', '4', 'INSTALASI PEMBANGKIT LISTRIK LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 6 1', '4', 'INSTALASI GARDU LISTRIK INDUK', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 6 2', '4', 'INSTALASI GARDU LISTRIK DISTRIBUSI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 6 3', '4', 'INSTALASI PUSAT PENGATUR LISTRIK', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 6 99', '4', 'INSTALASI GARDU LISTRIK LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 3 7 1', '4', 'INSTALASI LAIN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 4 1 1', '4', 'JARINGAN PEMBAWA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 4 1 2', '4', 'JARINGAN INDUK DISTRIBUSI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 4 1 3', '4', 'JARINGAN CABANG DISTRIBUSI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 4 1 4', '4', 'JARINGAN SAMBUNGAN KE RUMAH', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 4 1 99', '4', 'JARINGAN AIR MINUM LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 4 2 1', '4', 'JARINGAN TRANSMISI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 4 2 2', '4', 'JARINGAN DISTRIBUSI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 4 2 99', '4', 'JARINGAN LISTRIK LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 4 3 1', '4', 'JARINGAN TELEPON DIATAS TANAH', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 4 3 2', '4', 'JARINGAN TELEPON DIBAWAH TANAH', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 4 3 3', '4', 'JARINGAN TELEPON DIDALAM AIR', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 4 3 4', '4', 'JARINGAN DENGAN MEDIA UDARA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 4 3 99', '4', 'JARINGAN TELEPON LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 4 4 1', '4', 'JARINGAN PIPA GAS TRANSMISI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 4 4 2', '4', 'JARINGAN PIPA DISTRIBUSI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 4 4 3', '4', 'JARINGAN PIPA DINAS', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 4 4 4', '4', 'JARINGAN BBM', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('5 4 4 99', '4', 'JARINGAN GAS LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 1 1 1', '5', 'BUKU', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 1 1 2', '5', 'SERIAL', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 1 1 99', '5', 'TERCETAK LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 1 2 1', '5', 'AUDIO VISUAL', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 1 2 2', '5', 'BENTUK MIKRO (MICROFORM)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 1 2 99', '5', 'TEREKAM DAN BENTUK MIKRO LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 1 3 1', '5', 'BAHAN KARTOGRAFI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 1 3 2', '5', 'NASKAH (MANUSKRIP) / ASLI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 1 3 3', '5', 'LUKISAN DAN UKIRAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 1 3 99', '5', 'KARTOGRAFI, NASKAH DAN LUKISAN LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 2 1 1', '5', 'ALAT MUSIK', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 2 1 2', '5', 'LUKISAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 2 1 3', '5', 'ALAT PERAGA KESENIAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 2 1 99', '5', 'BARANG BERCORAK KESENIAN LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 2 2 1', '5', 'PAHATAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 2 2 2', '5', 'MAKET, MINIATUR, REPLIKA DAN FOTO DOKUMEN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 2 2 99', '5', 'ALAT BERCORAK KEBUDAYAAN LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 2 3 1', '5', 'TANDA PENGHARGAAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 2 3 99', '5', 'TANDA PENGHARGAAN BIDANG OLAH RAGA LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 3 1 1', '5', 'HEWAN PENGAMAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 3 1 2', '5', 'HEWAN PENGANGKUT', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 3 1 99', '5', 'HEWAN PIARAAN LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 3 2 1', '5', 'TERNAK POTONG', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 3 2 2', '5', 'TERNAK PERAH', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 3 2 3', '5', 'TERNAK UNGGAS', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 3 2 99', '5', 'TERNAK LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin');
INSERT INTO `barang` (`kode_barang`, `kode_bidang`, `nama_barang`, `harga_barang`, `username`, `waktu_input`, `waktu_update`, `user_update`) VALUES
('6 3 3 1', '5', 'HEWAN LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 4 1 1', '5', 'IKAN BUDIDAYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 4 2 1', '5', 'CRUSTEA BUDIDAYA (UDANG, RAJUNGAN, KEPITING, DAN SEBANGSANYA)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 4 3 1', '5', 'MOLLUSCA BUDIDAYA (KERANG, TIRAM, CUMI-CUMI, GURITA, SIPUT, DAN SEBANGSANYA)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 4 4 1', '5', 'COELENTERATA BUDIDAYA (UBUR-UBUR DAN SEBANGSANYA)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 4 5 1', '5', 'ECHINODERMATA BUDIDAYA (TRIPANG, BULU BABI, DAN SEBANGSANYA)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 4 6 1', '5', 'AMPHIBIA BUDIDAYA (KODOK DAN SEBANGSANYA)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 4 7 1', '5', 'REPTILIA BUDIDAYA (BUAYA, PENYU, KURA-KURA, BIAWAK, ULAR AIR, DAN SEBANGSANYA)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 4 8 1', '5', 'MAMMALIA BUDIDAYA (PAUS, LUMBA-LUMBA, PESUT, DUYUNG, DAN SEBANGSANYA)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 4 9 1', '5', 'ALGAE BUDIDAYA (RUMPUT LAUT DAN TUMBUH-TUMBUHAN LAIN YANG HIDUP DI DALAM AIR)', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 4 10 1', '5', 'BUDIDAYA BIOTA PERAIRAN LAINNYA', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 5 1 1', '5', 'TANAMAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('6 6 1 1', '5', 'ASET TETAP DALAM RENOVASI', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('7 1 1 1', '6', 'KONSTRUKSI DALAM PENGERJAAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('8 1 1 1', '7', 'ASET TAK BERWUJUD', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin'),
('8 2 1 1', '7', 'ASET TAK BERWUJUD DALAM PENGERJAAN', '0', 'admin', '2020-08-18 08:39:15', '2020-08-31 17:00:00', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `kode_bidang` varchar(100) NOT NULL,
  `nama_bidang` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `waktu_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_update` varchar(100) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`kode_bidang`, `nama_bidang`, `username`, `waktu_input`, `user_update`, `waktu_update`) VALUES
('1', 'TANAH', 'admin', '2020-08-18 08:36:24', '', '0000-00-00 00:00:00'),
('2', 'MESIN DAN PERALATAN', 'admin', '2020-08-18 08:36:32', '', '0000-00-00 00:00:00'),
('3', 'GEDUNG DAN BANGUNAN', 'admin', '2020-08-18 08:36:41', '', '0000-00-00 00:00:00'),
('4', 'JALAN, JEMBATAN, IRIGASI DAN LAINNYA', 'admin', '2020-09-30 02:21:47', 'admin', '2020-09-30 02:21:47'),
('5', 'ASET TETAP LAINNYA', 'admin', '2020-08-21 05:37:57', 'admin', '2020-08-21 19:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `invesa`
--

CREATE TABLE `invesa` (
  `id_invesa` bigint(20) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `skpd` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `register` int(4) NOT NULL,
  `luas` varchar(100) NOT NULL,
  `no_sertifikat` varchar(20) DEFAULT NULL,
  `penggunaan` varchar(100) DEFAULT NULL,
  `jumlah` int(20) NOT NULL,
  `kondisi` enum('Baik','Kurang Baik','Rusak Berat') NOT NULL,
  `harga` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `waktu_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_update` varchar(100) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sumber_dana` varchar(100) NOT NULL,
  `status_penggunaan` enum('1','0') NOT NULL COMMENT '0 = terhapus. 1= dipakai'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invesa`
--

INSERT INTO `invesa` (`id_invesa`, `tanggal_pembelian`, `skpd`, `kode_barang`, `register`, `luas`, `no_sertifikat`, `penggunaan`, `jumlah`, `kondisi`, `harga`, `keterangan`, `username`, `waktu_input`, `user_update`, `waktu_update`, `sumber_dana`, `status_penggunaan`) VALUES
(4, '2020-10-14', '50 9 1 3', '2 1 7 2', 1, '2', '12', 'd', 1, 'Baik', '1200000', 'asas', '5090103', '2020-10-19 16:29:56', '', '0000-00-00 00:00:00', 'Kekayaan Asli Desa', '1');

--
-- Triggers `invesa`
--
DELIMITER $$
CREATE TRIGGER `upd` AFTER UPDATE ON `invesa` FOR EACH ROW insert into penghapusan values('',new.id_invesa , new.kode_barang, new.skpd, '','','' )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `invesb`
--

CREATE TABLE `invesb` (
  `id_invesb` bigint(20) NOT NULL,
  `kode_bidang` varchar(100) NOT NULL,
  `skpd` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `register` int(4) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `bahan` varchar(100) NOT NULL,
  `nomor_pabrik` varchar(100) NOT NULL,
  `nomor_rangka` varchar(100) NOT NULL,
  `nomor_mesin` varchar(100) NOT NULL,
  `nomor_pol` varchar(100) NOT NULL,
  `bpkb` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `kondisi` enum('Baik','Kurang Baik','Rusak Berat') NOT NULL,
  `keterangan` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `waktu_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_update` varchar(100) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sumber_dana` varchar(100) NOT NULL,
  `ruang` varchar(100) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `type` varchar(100) NOT NULL,
  `status_penggunaan` enum('1','0') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invesb`
--

INSERT INTO `invesb` (`id_invesb`, `kode_bidang`, `skpd`, `kode_barang`, `register`, `merk`, `ukuran`, `bahan`, `nomor_pabrik`, `nomor_rangka`, `nomor_mesin`, `nomor_pol`, `bpkb`, `jumlah`, `harga`, `kondisi`, `keterangan`, `username`, `waktu_input`, `user_update`, `waktu_update`, `sumber_dana`, `ruang`, `tanggal_pembelian`, `type`, `status_penggunaan`) VALUES
(64, '', '50 9 1 3', '3 7 2 3', 1, 'samsung', '', 'alumuniumm', '', '', '', '', '', '1', '400000', 'Baik', 'PC ', '5090103', '2020-10-13 17:58:51', '', '0000-00-00 00:00:00', 'APBDes', '0', '2020-10-14', 'samsung a345', '1'),
(65, '', '50 9 1 3', '3 7 2 3', 2, 'samsung', '', 'alumuniumm', '', '', '', '', '', '1', '400000', 'Baik', 'PC ', '5090103', '2020-10-13 17:58:55', '', '0000-00-00 00:00:00', 'APBDes', '0', '2020-10-14', 'samsung a345', '1'),
(66, '', '50 9 1 3', '3 5 2 1', 1, '-', '', 'kayu', '', '', '', '', '', '1', '1000000', 'Baik', '', '5090103', '2020-10-19 16:32:39', '', '0000-00-00 00:00:00', 'APBDes', '0', '2020-10-10', '-', '0'),
(67, '', '50 9 1 3', '3 5 2 1', 2, '-', '', 'kayu', '', '', '', '', '', '1', '1000000', 'Baik', '', '5090103', '2020-10-19 16:32:39', '', '0000-00-00 00:00:00', 'APBDes', '0', '2020-10-10', '-', '0'),
(68, '', '50 9 1 3', '3 5 2 1', 3, '-', '', 'kayu', '', '', '', '', '', '1', '1000000', 'Baik', '', '5090103', '2020-10-19 11:59:18', '', '0000-00-00 00:00:00', 'APBDes', '0', '2020-10-10', '-', '0');

-- --------------------------------------------------------

--
-- Table structure for table `invesc`
--

CREATE TABLE `invesc` (
  `id_invesc` bigint(20) NOT NULL,
  `kode_bidang` varchar(100) NOT NULL,
  `skpd` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `register` int(4) NOT NULL,
  `kondisi` enum('Baik','Kurang Baik','Rusak Berat') NOT NULL,
  `kondisi_tingkat` varchar(100) NOT NULL,
  `kondisi_beton` varchar(100) NOT NULL,
  `luas_lantai` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `waktu_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_update` varchar(100) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tanggal_pembelian` date NOT NULL,
  `luas` varchar(100) NOT NULL,
  `sumber_dana` varchar(100) NOT NULL,
  `status_penggunaan` enum('1','0') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invesd`
--

CREATE TABLE `invesd` (
  `id_invesd` int(11) NOT NULL,
  `kode_bidang` varchar(100) NOT NULL,
  `skpd` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `register` int(4) NOT NULL,
  `konstruksi` varchar(100) NOT NULL,
  `panjang` varchar(100) NOT NULL,
  `lebar` varchar(100) NOT NULL,
  `luas` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `kondisi` enum('Baik','Kurang Baik','Rusak Berat') NOT NULL,
  `harga` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `waktu_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_update` varchar(100) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tanggal_pembelian` date NOT NULL,
  `sumber_dana` varchar(100) NOT NULL,
  `beton` varchar(100) NOT NULL,
  `status_penggunaan` enum('1','0') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invese`
--

CREATE TABLE `invese` (
  `id_invese` int(11) NOT NULL,
  `skpd` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `register` int(4) NOT NULL,
  `asal_daerah` varchar(100) NOT NULL,
  `pencipta` varchar(100) NOT NULL,
  `bahan` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `asal` varchar(100) NOT NULL,
  `kondisi` set('Baik','Kurang Baik','Rusak Berat') NOT NULL,
  `harga` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `waktu_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_update` varchar(100) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tanggal_pembelian` date NOT NULL,
  `sumber_dana` varchar(100) NOT NULL,
  `ruang` varchar(100) NOT NULL,
  `status_penggunaan` enum('1','0') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invesf`
--

CREATE TABLE `invesf` (
  `kode_invesf` varchar(100) NOT NULL,
  `kode_bidang` varchar(100) NOT NULL,
  `skpd` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `register` int(4) NOT NULL,
  `bangunan` varchar(100) NOT NULL,
  `kondisi_bangunan` varchar(100) NOT NULL,
  `kondisi_beton` varchar(100) NOT NULL,
  `luas` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kondisi` set('Baik','Kurang Baik','Rusak Berat') NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `asal` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `waktu_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_update` varchar(100) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemeliharaan`
--

CREATE TABLE `pemeliharaan` (
  `id_pemeliharaan` int(11) NOT NULL,
  `kode_bidang` int(11) NOT NULL,
  `kode_barang` char(50) NOT NULL,
  `register` int(11) NOT NULL,
  `tgl_dokumen` date NOT NULL,
  `nilai` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penghapusan`
--

CREATE TABLE `penghapusan` (
  `id_penghapusan` int(11) NOT NULL,
  `id_inves` int(11) NOT NULL,
  `kode_barang` char(50) NOT NULL,
  `kode_bidang` int(4) NOT NULL,
  `skpd` varchar(100) NOT NULL,
  `tgl_penghapusan` date NOT NULL,
  `no_sk` varchar(30) NOT NULL,
  `tgl_sk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penghapusan`
--

INSERT INTO `penghapusan` (`id_penghapusan`, `id_inves`, `kode_barang`, `kode_bidang`, `skpd`, `tgl_penghapusan`, `no_sk`, `tgl_sk`) VALUES
(1, 65, '3 7 2 3', 2, '50 9 1 3', '2020-10-14', '123', '0000-00-00'),
(2, 64, '3 7 2 3', 2, '50 9 1 3', '2020-10-14', '123', '0000-00-00'),
(3, 68, '3 5 2 1', 2, '50 9 1 3', '2020-10-19', '123', '2020-10-19'),
(5, 67, '3 5 2 1', 2, '50 9 1 3', '2020-10-19', '1', '2020-10-19'),
(6, 66, '3 5 2 1', 2, '50 9 1 3', '2020-10-19', '1', '2020-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `personil`
--

CREATE TABLE `personil` (
  `id_personil` int(11) NOT NULL,
  `kode_subdinas` varchar(50) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL,
  `nama_pemangku` varchar(50) NOT NULL,
  `jenis_personil` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jkel` enum('Laki-laki','Perempuan') NOT NULL,
  `no_sk` varchar(25) NOT NULL,
  `tgl_sk` date NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personil`
--

INSERT INTO `personil` (`id_personil`, `kode_subdinas`, `nama_jabatan`, `nama_pemangku`, `jenis_personil`, `tempat_lahir`, `tgl_lahir`, `jkel`, `no_sk`, `tgl_sk`, `pendidikan`, `foto`) VALUES
(2, '50 9 1 3', 'q', 'q', 'BPD', 'q', '2020-10-21', 'Laki-laki', '123', '2020-10-21', 'q', 'baruuuu.PNG'),
(3, '50 9 1 3', 'ABABA', 'aaaaaaaaa', 'Tugas', 'a', '2020-10-21', 'Perempuan', '1233333', '2020-10-21', 'q', '12.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `subdinas`
--

CREATE TABLE `subdinas` (
  `id` int(255) UNSIGNED NOT NULL,
  `kd_bidang` varchar(2) NOT NULL,
  `kd_unit` varchar(2) NOT NULL,
  `kd_sub` varchar(2) NOT NULL,
  `kd_upb` varchar(2) NOT NULL,
  `kode_subdinas` varchar(100) DEFAULT NULL,
  `kode_dinas` varchar(100) DEFAULT NULL,
  `nama_subdinas` varchar(100) DEFAULT NULL,
  `kelompok` varchar(100) DEFAULT NULL,
  `nama_adminn` varchar(100) DEFAULT NULL,
  `nip` varchar(100) DEFAULT NULL,
  `alamat_subdinas` text,
  `telepon` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `waktu_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_update` varchar(100) DEFAULT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `password` varchar(100) DEFAULT NULL,
  `aktif` enum('A','T') DEFAULT NULL,
  `hp` varchar(50) DEFAULT NULL,
  `nama_admin` varchar(100) DEFAULT NULL,
  `admin` varchar(100) DEFAULT NULL,
  `kades` varchar(50) NOT NULL,
  `akses` enum('A','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subdinas`
--

INSERT INTO `subdinas` (`id`, `kd_bidang`, `kd_unit`, `kd_sub`, `kd_upb`, `kode_subdinas`, `kode_dinas`, `nama_subdinas`, `kelompok`, `nama_adminn`, `nip`, `alamat_subdinas`, `telepon`, `username`, `waktu_input`, `user_update`, `waktu_update`, `password`, `aktif`, `hp`, `nama_admin`, `admin`, `kades`, `akses`) VALUES
(1, '50', '9', '01', '01', '50 9 1 1', '1', 'KECAMATAN DAWE', '', '-', '-', '', '', '5090101', '2020-10-21 15:47:30', '', '0000-00-00 00:00:00', '21232f297a57a5a743894a0e4a801fc3', 'A', '', '50 9 1 1', '', '', 'A'),
(2, '50', '9', '01', '02', '50 9 1 2', '1', 'DESA SAMIREJO', '', '-', '-', '', '', '5090102', '2020-08-28 09:30:21', '', '0000-00-00 00:00:00', 'b82948d4da194898c5672b49847115c6', 'A', '', '50 9 1 2', '', '', 'A'),
(3, '50', '9', '01', '03', '50 9 1 3', '1', 'DESA CENDONO', '', '-', '-', '', '', '5090103', '2020-10-21 15:57:51', '', '0000-00-00 00:00:00', '21232f297a57a5a743894a0e4a801fc3', 'A', '88888', '50 9 1 3', '', 'qwqw', 'A'),
(4, '50', '9', '01', '04', '50 9 1 4', '1', 'DESA MARGOREJO', '', '-', '-', '', '', '5090104', '2020-08-28 09:30:36', '', '0000-00-00 00:00:00', 'b82948d4da194898c5672b49847115c6', 'A', '', '50 9 1 4', '', '', 'A'),
(5, '50', '9', '01', '05', '50 9 1 5', '1', 'DESA REJOSARI', '', '-', '-', '', '', '5090105', '2020-08-28 09:30:44', '', '0000-00-00 00:00:00', 'b82948d4da194898c5672b49847115c6', 'A', '', '50 9 1 5', '', '', 'A'),
(6, '50', '9', '01', '06', '50 9 1 6', '1', 'DESA KANDANGMAS', '', '-', '-', '', '', '5090106', '2020-08-28 09:30:52', '', '0000-00-00 00:00:00', ' 	b82948d4da194898c5672b49847115c6', 'A', '', '50 9 1 6', 'admin', '', 'A'),
(7, '50', '9', '01', '07', '50 9 1 7', '1', 'DESA GLAGAH KULON', '', '-', '-', '', '', '5090107', '2020-08-28 09:31:00', '', '0000-00-00 00:00:00', ' 	b82948d4da194898c5672b49847115c6', 'A', '', '50 9 1 7', 'admin', '', 'A'),
(8, '50', '9', '01', '08', '50 9 1 8', '1', 'DESA TERGO', '', '-', '-', '', '', '5090108', '2020-08-28 09:31:09', '', '0000-00-00 00:00:00', 'b82948d4da194898c5672b49847115c6', 'A', '', '50 9 1 8', '', '', 'A'),
(9, '50', '9', '01', '09', '50 9 1 9', '1', 'DESA CRANGGANG', '', '-', '-', '', '', '5090109', '2020-08-28 09:31:25', '', '0000-00-00 00:00:00', ' 	b82948d4da194898c5672b49847115c6', 'A', '', '50 9 1 9', 'admin', '', 'A'),
(10, '50', '9', '01', '10', '50 9 1 10', '1', 'DESA LAU', '', '-', '-', '', '', '5090110', '2020-10-19 17:20:32', '', '0000-00-00 00:00:00', 'b82948d4da194898c5672b49847115c6', 'A', '88888', '50 9 1 10', '', '', 'A'),
(11, '50', '9', '01', '11', '50 9 1 11', '1', 'DESA PIJI', '', '-', '-', '', '', '5090111', '2020-09-01 22:41:32', '', '0000-00-00 00:00:00', 'b82948d4da194898c5672b49847115c6', 'A', '', '50 9 1 11', '', '', 'A'),
(12, '50', '9', '01', '12', '50 9 1 12', '1', 'DESA PUYOH', '', '-', '-', '', '', '5090112', '2020-09-01 22:41:43', '', '0000-00-00 00:00:00', 'b82948d4da194898c5672b49847115c6', 'A', '', '50 9 1 12', '', '', 'A'),
(13, '50', '9', '01', '13', '50 9 1 13', '1', 'DESA SOCO', '', '-', '-', '', '', '5090113', '2020-09-01 22:42:04', '', '0000-00-00 00:00:00', 'b82948d4da194898c5672b49847115c6', 'A', '', '50 9 1 13', '', '', 'A'),
(14, '50', '9', '01', '14', '50 9 1 14', '1', 'DESA TERNADI', '', '-', '-', '', '', '5090114', '2020-09-10 06:41:31', '', '0000-00-00 00:00:00', 'a760bc617d3f52e851df0aa79ab00413', 'A', '', '50 9 1 14', '', '', 'A'),
(15, '50', '9', '01', '15', '50 9 1 15', '1', 'DESA KAJAR', '', '-', '-', '', '', '5090115', '2020-09-01 22:39:56', '', '0000-00-00 00:00:00', ' 	b82948d4da194898c5672b49847115c6', 'A', '', '50 9 1 15', 'admin', '', 'A'),
(16, '50', '9', '01', '16', '50 9 1 16', '1', 'DESA KUWUKAN', '', '-', '-', '', '', '5090116', '2020-09-01 22:40:18', '', '0000-00-00 00:00:00', ' 	b82948d4da194898c5672b49847115c6', 'A', '', '50 9 1 16', 'admin', '', 'A'),
(17, '50', '9', '01', '17', '50 9 1 17', '1', 'DESA DUKUHWARINGIN', '', '-', '-', '', '', '5090117', '2020-09-01 22:40:32', '', '0000-00-00 00:00:00', ' 	b82948d4da194898c5672b49847115c6', 'A', '', '50 9 1 17', 'admin', '', 'A'),
(18, '50', '9', '01', '18', '50 9 1 18', '1', 'DESA JAPAN', '', '-', '-', '', '', '5090118', '2020-09-01 22:40:47', '', '0000-00-00 00:00:00', ' 	b82948d4da194898c5672b49847115c6', 'A', '', '50 9 1 18', 'admin', '', 'A'),
(19, '50', '9', '01', '19', '50 9 1 19', '1', 'DESA COLO', '', '-', '-', '', '', '5090119', '2020-09-01 22:40:59', '', '0000-00-00 00:00:00', ' 	b82948d4da194898c5672b49847115c6', 'A', '', '50 9 1 19', 'admin', '', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_input`
--

CREATE TABLE `tahun_input` (
  `id_tahun` int(255) UNSIGNED NOT NULL,
  `tahun` int(4) DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_input`
--

INSERT INTO `tahun_input` (`id_tahun`, `tahun`, `status`) VALUES
(1, 2020, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemeliharaan`
--

CREATE TABLE `tb_pemeliharaan` (
  `id_pemeliharaan` int(11) NOT NULL,
  `id_inves` int(4) NOT NULL,
  `kode_bidang` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `register` int(4) NOT NULL,
  `tgl_documen` date NOT NULL,
  `nilai` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemeliharaan`
--

INSERT INTO `tb_pemeliharaan` (`id_pemeliharaan`, `id_inves`, `kode_bidang`, `kode_barang`, `register`, `tgl_documen`, `nilai`, `keterangan`) VALUES
(14, 1, 1, '2 1 1 1', 1, '2020-09-27', 787878, 'nsssh'),
(15, 60, 2, '3 7 1 2', 2, '2020-09-27', 12212, 'jxsnjxnsj\r\n'),
(16, 1, 3, '4 1 1 1', 1, '2020-09-27', 8989898, 'sxshxjhgsxh'),
(17, 1, 4, '5 1 1 1', 1, '2020-09-27', 778787, 'gfgjhbh'),
(18, 5, 5, '6 1 1 1', 5, '2020-09-27', 777, 'hghvg'),
(19, 64, 2, '3 7 2 3', 1, '2020-10-14', 234, 'Komputer Ganti RAM 8GB');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `skpd` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tutup` enum('B','T') COLLATE latin1_general_ci NOT NULL,
  `viewer` enum('S','V') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`, `id_session`, `skpd`, `tutup`, `viewer`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Udin', '-', '-', 'admin', 'N', 'gr5spl85t7h0ak6aji4k0crpb3', '', 'B', 'S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`kode_bidang`);

--
-- Indexes for table `invesa`
--
ALTER TABLE `invesa`
  ADD PRIMARY KEY (`id_invesa`);

--
-- Indexes for table `invesb`
--
ALTER TABLE `invesb`
  ADD PRIMARY KEY (`id_invesb`);

--
-- Indexes for table `invesc`
--
ALTER TABLE `invesc`
  ADD PRIMARY KEY (`id_invesc`);

--
-- Indexes for table `invesd`
--
ALTER TABLE `invesd`
  ADD PRIMARY KEY (`id_invesd`);

--
-- Indexes for table `invese`
--
ALTER TABLE `invese`
  ADD PRIMARY KEY (`id_invese`);

--
-- Indexes for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD PRIMARY KEY (`id_pemeliharaan`);

--
-- Indexes for table `penghapusan`
--
ALTER TABLE `penghapusan`
  ADD PRIMARY KEY (`id_penghapusan`);

--
-- Indexes for table `personil`
--
ALTER TABLE `personil`
  ADD PRIMARY KEY (`id_personil`);

--
-- Indexes for table `subdinas`
--
ALTER TABLE `subdinas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_input`
--
ALTER TABLE `tahun_input`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `tb_pemeliharaan`
--
ALTER TABLE `tb_pemeliharaan`
  ADD PRIMARY KEY (`id_pemeliharaan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invesa`
--
ALTER TABLE `invesa`
  MODIFY `id_invesa` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `invesb`
--
ALTER TABLE `invesb`
  MODIFY `id_invesb` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `invesc`
--
ALTER TABLE `invesc`
  MODIFY `id_invesc` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `invesd`
--
ALTER TABLE `invesd`
  MODIFY `id_invesd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `invese`
--
ALTER TABLE `invese`
  MODIFY `id_invese` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  MODIFY `id_pemeliharaan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `penghapusan`
--
ALTER TABLE `penghapusan`
  MODIFY `id_penghapusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `personil`
--
ALTER TABLE `personil`
  MODIFY `id_personil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subdinas`
--
ALTER TABLE `subdinas`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tahun_input`
--
ALTER TABLE `tahun_input`
  MODIFY `id_tahun` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_pemeliharaan`
--
ALTER TABLE `tb_pemeliharaan`
  MODIFY `id_pemeliharaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
