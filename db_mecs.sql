-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Feb 2020 pada 16.57
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mecs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_service`
--

CREATE TABLE `log_service` (
  `log_id` int(11) NOT NULL,
  `kd_serv` varchar(8) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_service`
--

INSERT INTO `log_service` (`log_id`, `kd_serv`, `tgl_masuk`, `status`, `ket`) VALUES
(1, 'serv0004', '0000-00-00', 'BARU', ''),
(2, 'serv0001', '0000-00-00', 'BARU', ''),
(3, 'serv0002', '0000-00-00', 'BARU', ''),
(4, 'serv0003', '0000-00-00', 'BARU', ''),
(5, 'serv0005', '0000-00-00', 'BARU', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_beli`
--

CREATE TABLE `tb_beli` (
  `beli_id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `tot_har` int(11) DEFAULT NULL,
  `sup_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_beli_detail`
--

CREATE TABLE `tb_beli_detail` (
  `beli_id` int(11) DEFAULT NULL,
  `kd_bar` varchar(8) DEFAULT NULL,
  `qty` int(3) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `tb_beli_detail`
--
DELIMITER $$
CREATE TRIGGER `stock_in` AFTER INSERT ON `tb_beli_detail` FOR EACH ROW BEGIN
   UPDATE tb_brg_master SET stok = stok + NEW.qty
     WHERE tb_brg_master.kd_bar = NEW.kd_bar;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_brg_master`
--

CREATE TABLE `tb_brg_master` (
  `kd_bar` varchar(8) NOT NULL,
  `nm_bar` varchar(50) DEFAULT NULL,
  `stok` int(3) DEFAULT NULL,
  `kat_id` int(1) DEFAULT NULL,
  `hjual` int(11) DEFAULT NULL,
  `hbeli` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_brg_master`
--

INSERT INTO `tb_brg_master` (`kd_bar`, `nm_bar`, `stok`, `kat_id`, `hjual`, `hbeli`) VALUES
('ADP001', 'Adaptor Acer 19V 3,42A 5.5 * 0.7mm', 0, 1, 180000, 100000),
('ADP002', 'Adaptor Asus 19V 3,42 A', 1, 1, 190000, 78000),
('BAT001', 'Batterai Acer 756', 2, 1, 500000, 395000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_invo_serv`
--

CREATE TABLE `tb_invo_serv` (
  `invoice` varchar(12) NOT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `kd_serv` varchar(8) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `tindakan` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_invo_serv`
--

INSERT INTO `tb_invo_serv` (`invoice`, `tgl_transaksi`, `kd_serv`, `biaya`, `tindakan`, `status`) VALUES
('INS200131000', '2020-01-31', 'serv0004', 65000, 'Di Install Ulang Windows', 'CASH'),
('INS310120001', '2020-01-30', 'serv0001', 65000, 'Di Install Ulang Windows nya', 'LUNAS'),
('INS310120002', '2020-01-30', 'serv0002', 500000, 'Service Motherboard', 'PIUTANG');

--
-- Trigger `tb_invo_serv`
--
DELIMITER $$
CREATE TRIGGER `pelunasan` AFTER UPDATE ON `tb_invo_serv` FOR EACH ROW BEGIN
	INSERT INTO tb_piutang_log (invoice, bayar, status, tgl_lunas) VALUES (NEW.invoice, NEW.biaya, NEW.status, NEW.tgl_transaksi);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `piutang_data` AFTER INSERT ON `tb_invo_serv` FOR EACH ROW BEGIN
	INSERT INTO tb_piutang_log (invoice, bayar, status, tgl_lunas) VALUES (NEW.invoice, NEW.biaya, NEW.status, NEW.tgl_transaksi);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jual`
--

CREATE TABLE `tb_jual` (
  `invoice` varchar(13) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `nm_pel` varchar(30) NOT NULL,
  `tot_har` int(11) DEFAULT NULL,
  `tot_bay` int(11) DEFAULT NULL,
  `tot_kem` int(11) DEFAULT NULL,
  `tot_pot` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jual`
--

INSERT INTO `tb_jual` (`invoice`, `tanggal`, `user_id`, `nm_pel`, `tot_har`, `tot_bay`, `tot_kem`, `tot_pot`) VALUES
('INP0302200002', '0000-00-00', 1, 'Contoh Customer', 2059994, 0, 0, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jual_detail`
--

CREATE TABLE `tb_jual_detail` (
  `invoice` varchar(13) NOT NULL,
  `kd_bar` varchar(8) DEFAULT NULL,
  `qty` int(3) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `pot` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jual_detail`
--

INSERT INTO `tb_jual_detail` (`invoice`, `kd_bar`, `qty`, `harga`, `pot`) VALUES
('INP0302200002', 'ADP001', 1, 180000, 1),
('INP0302200002', 'ADP002', 1, 190000, 1),
('INP0302200002', 'BAT001', 1, 500000, 1);

--
-- Trigger `tb_jual_detail`
--
DELIMITER $$
CREATE TRIGGER `stock_out` AFTER INSERT ON `tb_jual_detail` FOR EACH ROW BEGIN
   UPDATE tb_brg_master SET stok = stok - NEW.qty
     WHERE tb_brg_master.kd_bar = NEW.kd_bar;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kat_id` int(1) NOT NULL,
  `nm_kat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`kat_id`, `nm_kat`) VALUES
(1, 'BATTERAI'),
(2, 'KEYBOARD'),
(3, 'ADAPTOR'),
(4, 'LED');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_piutang_log`
--

CREATE TABLE `tb_piutang_log` (
  `trans_id` int(11) NOT NULL,
  `invoice` varchar(12) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `tgl_lunas` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_piutang_log`
--

INSERT INTO `tb_piutang_log` (`trans_id`, `invoice`, `bayar`, `status`, `tgl_lunas`) VALUES
(6, 'INS310120001', 65000, 'LUNAS', '2020-01-31'),
(7, 'INS310120002', 500000, 'PIUTANG', '2020-01-31'),
(8, 'INS310120001', 65000, 'LUNAS', '2020-01-30'),
(9, 'INS310120002', 500000, 'PIUTANG', '2020-01-30'),
(10, 'INS200131000', 65000, 'CASH', '2020-01-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_service`
--

CREATE TABLE `tb_service` (
  `kd_serv` varchar(8) NOT NULL,
  `nm_pel` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `kelengkapan` varchar(100) NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_service`
--

INSERT INTO `tb_service` (`kd_serv`, `nm_pel`, `no_telp`, `tgl_masuk`, `tipe`, `kelengkapan`, `keluhan`, `status`, `tgl_selesai`, `tgl_keluar`, `ket`) VALUES
('serv0001', 'Adil COmp', '00', '2020-01-29', 'Asus X453M', 'Unit', 'No Display', 'SELESAI', NULL, NULL, 'Sudah selesai'),
('serv0002', 'Adil COmp', '00', '2020-01-29', 'Asus X453M', 'Unit, Adaptor', 'Mati Total', 'KELUAR', '2020-01-30', '2020-01-30', 'Selesai'),
('serv0003', 'Connect', '0', '2020-01-28', 'Acer Z1402', 'Unit', 'Mati Total', 'BARU', NULL, NULL, ''),
('serv0004', 'Connect', '0', '2020-01-29', 'CPU Armagedon', 'Unit', 'Sering Bluescreen', 'KELUAR', NULL, '2020-01-31', 'Biaya terlalu mahal'),
('serv0005', 'Adil Comp', '0', '2020-01-31', 'Asus X453m', 'Unit', 'Mati Total', 'BARU', NULL, NULL, '');

--
-- Trigger `tb_service`
--
DELIMITER $$
CREATE TRIGGER `service_insert` AFTER INSERT ON `tb_service` FOR EACH ROW BEGIN
  INSERT INTO log_service (kd_serv, tgl_masuk, status, ket)
  VALUES (NEW.kd_serv, tgl_masuk, New.status, New.ket);
  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `sup_id` int(2) NOT NULL,
  `nm_sup` varchar(50) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`sup_id`, `nm_sup`, `alamat`) VALUES
(1, 'Connect', 'Jl. Pahlawan'),
(2, 'GIS', 'Jl. Veteran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `nama`, `user`, `pass`, `level`) VALUES
(1, '', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_invoice`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_invoice` (
`invoice` varchar(12)
,`tgl_transaksi` date
,`kd_serv` varchar(8)
,`nm_pel` varchar(50)
,`tipe` varchar(50)
,`tindakan` varchar(50)
,`biaya` int(11)
,`status` varchar(10)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_invoice`
--
DROP TABLE IF EXISTS `view_invoice`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_invoice`  AS  select `tb_invo_serv`.`invoice` AS `invoice`,`tb_invo_serv`.`tgl_transaksi` AS `tgl_transaksi`,`tb_invo_serv`.`kd_serv` AS `kd_serv`,`tb_service`.`nm_pel` AS `nm_pel`,`tb_service`.`tipe` AS `tipe`,`tb_invo_serv`.`tindakan` AS `tindakan`,`tb_invo_serv`.`biaya` AS `biaya`,`tb_invo_serv`.`status` AS `status` from (`tb_invo_serv` join `tb_service` on(`tb_invo_serv`.`kd_serv` = `tb_service`.`kd_serv`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `log_service`
--
ALTER TABLE `log_service`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `kd_serv` (`kd_serv`);

--
-- Indeks untuk tabel `tb_beli`
--
ALTER TABLE `tb_beli`
  ADD PRIMARY KEY (`beli_id`),
  ADD KEY `fk_sup` (`sup_id`);

--
-- Indeks untuk tabel `tb_beli_detail`
--
ALTER TABLE `tb_beli_detail`
  ADD KEY `fk_bar` (`kd_bar`);

--
-- Indeks untuk tabel `tb_brg_master`
--
ALTER TABLE `tb_brg_master`
  ADD PRIMARY KEY (`kd_bar`),
  ADD KEY `fk_kat` (`kat_id`);

--
-- Indeks untuk tabel `tb_invo_serv`
--
ALTER TABLE `tb_invo_serv`
  ADD PRIMARY KEY (`invoice`),
  ADD KEY `kd_serv` (`kd_serv`);

--
-- Indeks untuk tabel `tb_jual`
--
ALTER TABLE `tb_jual`
  ADD PRIMARY KEY (`invoice`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indeks untuk tabel `tb_jual_detail`
--
ALTER TABLE `tb_jual_detail`
  ADD KEY `kd_bar` (`kd_bar`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kat_id`);

--
-- Indeks untuk tabel `tb_piutang_log`
--
ALTER TABLE `tb_piutang_log`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `invoice` (`invoice`);

--
-- Indeks untuk tabel `tb_service`
--
ALTER TABLE `tb_service`
  ADD PRIMARY KEY (`kd_serv`);

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `log_service`
--
ALTER TABLE `log_service`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_beli`
--
ALTER TABLE `tb_beli`
  MODIFY `beli_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `kat_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_piutang_log`
--
ALTER TABLE `tb_piutang_log`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `sup_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `log_service`
--
ALTER TABLE `log_service`
  ADD CONSTRAINT `fk_log` FOREIGN KEY (`kd_serv`) REFERENCES `tb_service` (`kd_serv`);

--
-- Ketidakleluasaan untuk tabel `tb_beli`
--
ALTER TABLE `tb_beli`
  ADD CONSTRAINT `fk_sup` FOREIGN KEY (`sup_id`) REFERENCES `tb_supplier` (`sup_id`);

--
-- Ketidakleluasaan untuk tabel `tb_beli_detail`
--
ALTER TABLE `tb_beli_detail`
  ADD CONSTRAINT `fk_bar` FOREIGN KEY (`kd_bar`) REFERENCES `tb_brg_master` (`kd_bar`);

--
-- Ketidakleluasaan untuk tabel `tb_brg_master`
--
ALTER TABLE `tb_brg_master`
  ADD CONSTRAINT `fk_kat` FOREIGN KEY (`kat_id`) REFERENCES `tb_kategori` (`kat_id`);

--
-- Ketidakleluasaan untuk tabel `tb_invo_serv`
--
ALTER TABLE `tb_invo_serv`
  ADD CONSTRAINT `fk_invo_serv` FOREIGN KEY (`kd_serv`) REFERENCES `tb_service` (`kd_serv`);

--
-- Ketidakleluasaan untuk tabel `tb_jual`
--
ALTER TABLE `tb_jual`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `tb_jual_detail`
--
ALTER TABLE `tb_jual_detail`
  ADD CONSTRAINT `fk_bar_jual` FOREIGN KEY (`kd_bar`) REFERENCES `tb_brg_master` (`kd_bar`);

--
-- Ketidakleluasaan untuk tabel `tb_piutang_log`
--
ALTER TABLE `tb_piutang_log`
  ADD CONSTRAINT `fk_invo` FOREIGN KEY (`invoice`) REFERENCES `tb_invo_serv` (`invoice`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
