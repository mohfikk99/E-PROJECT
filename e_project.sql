-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Nov 2021 pada 06.37
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `level`) VALUES
(1, 'dini', '123', 'admin'),
(2, 'valkri', '123', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `kd_gejala` varchar(10) NOT NULL,
  `gejala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`kd_gejala`, `gejala`) VALUES
('G001', 'Nyeri pada dada'),
('G002', 'hitam'),
('G003', 'katup jantung tidak bekerja dengan baikkkkkkkkkkkkkk'),
('G004', 'biru'),
('G005', 'Detak jantung cepat (tachycardia)aaaaaaaaaaaaaaaaaaaa'),
('G006', 'pingsan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit_solusi`
--

CREATE TABLE `penyakit_solusi` (
  `kd_penyakit` varchar(10) NOT NULL,
  `nama_penyakit` varchar(100) NOT NULL,
  `definisi` text NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit_solusi`
--

INSERT INTO `penyakit_solusi` (`kd_penyakit`, `nama_penyakit`, `definisi`, `solusi`) VALUES
('P001', 'panu', 'parah', 'mati'),
('P002', 'gatal', 'parah', 'mati');

-- --------------------------------------------------------

--
-- Struktur dari tabel `relasi`
--

CREATE TABLE `relasi` (
  `id_relasi` int(11) NOT NULL,
  `kd_gejala` varchar(4) NOT NULL,
  `kd_penyakit` varchar(4) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `relasi`
--

INSERT INTO `relasi` (`id_relasi`, `kd_gejala`, `kd_penyakit`, `bobot`) VALUES
(1, 'G001', 'P001', 5),
(2, 'G002', 'P001', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_gejala`
--

CREATE TABLE `tmp_gejala` (
  `id` int(11) NOT NULL,
  `kd_gejala` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmp_gejala`
--

INSERT INTO `tmp_gejala` (`id`, `kd_gejala`) VALUES
(109, 'G001'),
(110, 'G002'),
(111, 'G003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_penyakit`
--

CREATE TABLE `tmp_penyakit` (
  `id` int(11) NOT NULL,
  `kd_penyakit` varchar(100) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmp_penyakit`
--

INSERT INTO `tmp_penyakit` (`id`, `kd_penyakit`, `nilai`) VALUES
(48, 'P001', 0.5);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kd_gejala`);

--
-- Indeks untuk tabel `penyakit_solusi`
--
ALTER TABLE `penyakit_solusi`
  ADD PRIMARY KEY (`kd_penyakit`);

--
-- Indeks untuk tabel `relasi`
--
ALTER TABLE `relasi`
  ADD PRIMARY KEY (`id_relasi`);

--
-- Indeks untuk tabel `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tmp_penyakit`
--
ALTER TABLE `tmp_penyakit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `relasi`
--
ALTER TABLE `relasi`
  MODIFY `id_relasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT untuk tabel `tmp_penyakit`
--
ALTER TABLE `tmp_penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
