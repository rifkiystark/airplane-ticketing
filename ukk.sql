-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 18 Jun 2020 pada 13.19
-- Versi Server: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `airport`
--

CREATE TABLE `airport` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kota` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `airport`
--

INSERT INTO `airport` (`id`, `kode`, `nama`, `kota`) VALUES
(1, 'SKH', 'Soekarno Hatta', 'DKI Jakarta'),
(2, 'SMG', 'Halim Perdana Kusuma', 'Semarang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `jenkel` varchar(12) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kd_resv` varchar(20) NOT NULL,
  `seat` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `jenkel`, `nama`, `kd_resv`, `seat`) VALUES
(1, 'L', '0', 'LQRQUEKOX3', 85),
(2, 'L', '0', 'LBYPHTILA4', 86),
(3, 'L', '0', '4YPAAM4QUC', 42),
(4, 'L', 'Kiki', 'N1B6GT50P8', 72),
(5, 'L', 'Kiki', 'U2MLFAICDH', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `rute_id` int(11) NOT NULL,
  `kd_resv` varchar(20) NOT NULL,
  `namapemesan` varchar(30) NOT NULL,
  `alamatpemesan` text NOT NULL,
  `emailpemesan` varchar(30) NOT NULL,
  `notelpemesan` varchar(15) NOT NULL,
  `img` text NOT NULL,
  `kd_book` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reservation`
--

INSERT INTO `reservation` (`id`, `rute_id`, `kd_resv`, `namapemesan`, `alamatpemesan`, `emailpemesan`, `notelpemesan`, `img`, `kd_book`, `status`) VALUES
(1, 2, 'LQRQUEKOX3', '', '', '', '', '', '', 'Menunggu P'),
(2, 2, 'LBYPHTILA4', '', '', '', '', '', '', 'Menunggu P'),
(3, 2, '4YPAAM4QUC', 'Ananda Rifkiy Hasan', 'Purwokerto', 'ananda.rifkiy32@gmail.com', '081327000089', '', '', 'Menunggu P'),
(4, 2, 'N1B6GT50P8', 'Ananda Rifkiy Hasan', 'Purwokerto', 'ananda.rifkiy32@gmail.com', '081327000089', 'N1B6GT50P8.png', 'EWB1M', 'Sukses'),
(5, 2, 'U2MLFAICDH', 'Ananda Rifkiy Hasan', 'Purwokerto', '18104004@ittelkom-pwt.ac.id', '0895417459300', 'U2MLFAICDH.jpg', '7JT0E', 'Sukses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rute`
--

CREATE TABLE `rute` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `depart_at` time NOT NULL,
  `arrived_at` time NOT NULL,
  `rute_from` varchar(50) NOT NULL,
  `rute_to` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `transportationid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rute`
--

INSERT INTO `rute` (`id`, `date`, `depart_at`, `arrived_at`, `rute_from`, `rute_to`, `price`, `transportationid`) VALUES
(2, '2020-06-20', '20:03:00', '22:00:00', 'Halim Perdana Kusuma', 'Soekarno Hatta', 3000000, 1),
(3, '2020-06-20', '23:55:00', '00:00:00', 'Soekarno Hatta', 'Halim Perdana Kusuma', 3000000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transportation`
--

CREATE TABLE `transportation` (
  `id` int(11) NOT NULL,
  `code` varchar(5) NOT NULL,
  `description` varchar(50) NOT NULL,
  `seat_qty` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transportation`
--

INSERT INTO `transportation` (`id`, `code`, `description`, `seat_qty`) VALUES
(1, 'GDI', 'Garuda Indonesia', 150);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tuser`
--

CREATE TABLE `tuser` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tuser`
--

INSERT INTO `tuser` (`id`, `username`, `fullname`, `password`, `level`) VALUES
(2, 'rifkiystark', 'Ananda Rifkiy Hasan', '21232f297a57a5a743894a0e4a801fc3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rute_id` (`rute_id`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transportationid` (`transportationid`);

--
-- Indexes for table `transportation`
--
ALTER TABLE `transportation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airport`
--
ALTER TABLE `airport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transportation`
--
ALTER TABLE `transportation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tuser`
--
ALTER TABLE `tuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`rute_id`) REFERENCES `rute` (`id`);

--
-- Ketidakleluasaan untuk tabel `rute`
--
ALTER TABLE `rute`
  ADD CONSTRAINT `rute_ibfk_1` FOREIGN KEY (`transportationid`) REFERENCES `transportation` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
