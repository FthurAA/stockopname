-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jun 2021 pada 18.56
-- Versi server: 8.0.23
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockopname`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kodebarang` varchar(10) NOT NULL,
  `namabarang` varchar(30) NOT NULL,
  `satuan` int DEFAULT NULL,
  `hargapokok` float NOT NULL,
  `hargajualsatuan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kodebarang`, `namabarang`, `satuan`, `hargapokok`, `hargajualsatuan`) VALUES
('20AUG21078', 'TEST user 1', 0, 300, 900),
('20DES20099', 'TEST input1', 0, 10, 200),
('20DES20100', 'TEST input2', 0, 4000, 8000),
('21APR20023', 'TEST barang 2', 21, 2100, 5000),
('21JAN20003', 'TEST barang 1', 10, 500, 800);

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `HistoryNO` int NOT NULL,
  `kodebarang` varchar(10) DEFAULT NULL,
  `satuan` int NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`HistoryNO`, `kodebarang`, `satuan`, `tanggal`, `keterangan`) VALUES
(1, '20AUG21078', 21, '2021-06-04', 'rusak'),
(3, '20DES20099', 12, '2021-06-02', 'masuk'),
(4, '20DES20099', 12, '2021-06-02', 'masuk'),
(5, '20DES20100', 1, '2021-06-02', 'masuk'),
(7, '20AUG21078', 7, '2021-06-22', 'return'),
(8, '20DES20100', 9, '2021-06-17', 'keluar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jumlah`
--

CREATE TABLE `jumlah` (
  `kodebarang` varchar(10) NOT NULL,
  `persediaanawal` int DEFAULT NULL,
  `penjualan` int DEFAULT NULL,
  `barangmasuk` int DEFAULT NULL,
  `persediaanakhir` int DEFAULT NULL,
  `persediaangudang` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `jumlah`
--

INSERT INTO `jumlah` (`kodebarang`, `persediaanawal`, `penjualan`, `barangmasuk`, `persediaanakhir`, `persediaangudang`) VALUES
('20DES20099', 16, 0, 0, 0, 32),
('20DES20100', 122, 0, 0, 0, 0),
('21APR20023', 2, 2, 2, NULL, 6),
('21JAN20003', 1, 7, 2, NULL, 10),
('20AUG21078', 22, 0, 0, 0, 99);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `idpegawai` int NOT NULL,
  `username` varchar(10) NOT NULL,
  `namapegawai` varchar(30) NOT NULL,
  `pass` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jeniskelamin` varchar(1) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `userlevel` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`idpegawai`, `username`, `namapegawai`, `pass`, `jeniskelamin`, `alamat`, `userlevel`) VALUES
(1, 'AulR', 'Aulia Rahmadhani', 'root1', 'P', 'jl. nin aja dulu', 'Owner'),
(2, 'Reni', 'Anggraeni Dwi L', 'root2', 'P', 'jl. ku masih panjang', 'Admin'),
(3, 'FAA', 'Fathurrachman A A', 'root3', 'L', 'jl. tak berujung', 'User'),
(4, 'Admin', 'Admin', 'Admin', 'L', 'Admin', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kodebarang`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`HistoryNO`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idpegawai`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `HistoryNO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `idpegawai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
