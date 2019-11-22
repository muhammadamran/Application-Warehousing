-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21 Jul 2019 pada 19.16
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `vendor_id` varchar(10) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `company_type` enum('P1','P2','P3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `document`
--

CREATE TABLE `document` (
  `document_id` int(11) NOT NULL,
  `vendor_id` varchar(10) NOT NULL,
  `criteria_id` varchar(10) NOT NULL,
  `file` text NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `notification`
--

CREATE TABLE `notification` (
  `notif_id` int(11) NOT NULL,
  `sender_id` varchar(10) NOT NULL,
  `recipient_id` varchar(10) NOT NULL,
  `notif_type` varchar(10) NOT NULL,
  `notif_title` varchar(100) NOT NULL,
  `notif_body` text NOT NULL,
  `url` text NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `created_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notification`
--

INSERT INTO `notification` (`notif_id`, `sender_id`, `recipient_id`, `notif_type`, `notif_title`, `notif_body`, `url`, `is_read`, `created_time`) VALUES
(1, 'U0001', 'PIC0001', 'Vendor', 'Vendor Lolos Kualifikasi V0001', 'Selamat, Koperasi Pegawai Pos Indonesia Jakarta Pusat dinyatakan lolos kualifikasi dan menjadi Rekanan PT Pos Logistik Indonesia', 'http://localhost/eproc/index.php/vendor/document/', 0, '2017-11-22 08:10:52'),
(2, 'U0001', 'U0001', 'default', 'Permintaan Pengadaan R0001', 'Permintaan Pengadaan Jasa Sewa kendaraan dinas sebanyak 20 unit oleh Staff Pengadaan', 'http://localhost/eproc/index.php/admin/request/detail/R0001', 1, '2017-11-22 08:33:09'),
(3, 'U0001', 'U0002', 'Admin', 'Permintaan Pengadaan R0001', 'Permintaan Pengadaan Jasa Sewa kendaraan dinas sebanyak 20 unit oleh Staff Pengadaan', 'http://localhost/eproc/index.php/admin/request/detail/R0001', 0, '2017-11-22 08:33:09'),
(4, 'U0001', 'U0003', 'default', 'Permintaan Pengadaan R0001', 'Permintaan Pengadaan Jasa Sewa kendaraan dinas sebanyak 20 unit oleh Staff Pengadaan', 'http://localhost/eproc/index.php/admin/request/detail/R0001', 1, '2017-11-22 08:33:09'),
(5, 'U0001', 'U0001', 'default', 'Konfirmasi Permintaan Pengadaan R0001', 'Permintaan Pengadaan Jasa Sewa kendaraan dinas sebanyak 20 unit telah dikonfirmasi oleh Divisi Pengadaan', 'http://localhost/eproc/index.php/user/request/detail/R0001', 1, '2017-11-22 08:37:23'),
(6, 'U0001', 'PIC0001', 'Vendor', 'Undangan Aanwizing I11170001', ' akan dilaksanakan pada 2017-11-30 8:30:00 WIB di Ruang Rapat PT Pos Logistik Indonesia, mohon konfirmasi kehadiran secepatnya.', 'http://localhost/eproc/index.php/vendor/invitation/detail/I11170001', 0, '2017-11-22 08:39:15'),
(7, 'U0001', 'U0001', 'default', 'Undangan Aanwizing I11170001', ' akan dilaksanakan pada 2017-11-30 8:30:00 WIB di Ruang Rapat PT Pos Logistik Indonesia', 'http://localhost/eproc/index.php/admin/invitation/detail/I11170001', 1, '2017-11-22 08:39:15'),
(8, 'U0001', 'U0002', 'Assessor', 'Undangan Aanwizing I11170001', ' akan dilaksanakan pada 2017-11-30 8:30:00 WIB di Ruang Rapat PT Pos Logistik Indonesia', 'http://localhost/eproc/index.php/admin/invitation/detail/I11170001', 0, '2017-11-22 08:39:16'),
(9, 'U0001', 'U0003', 'default', 'Undangan Aanwizing I11170001', ' akan dilaksanakan pada 2017-11-30 8:30:00 WIB di Ruang Rapat PT Pos Logistik Indonesia', 'http://localhost/eproc/index.php/admin/invitation/detail/I11170001', 1, '2017-11-22 08:39:16'),
(10, 'U0001', 'PIC0001', 'Vendor', 'Undangan Beauty Contest I11170002', ' akan dilaksanakan pada 2017-12-01 8:00:00 WIB di Ruang Rapat PT Pos Logistik Indonesia, mohon konfirmasi kehadiran secepatnya.', 'http://localhost/eproc/index.php/vendor/invitation/detail/I11170002', 0, '2017-11-22 08:47:29'),
(11, 'U0001', 'U0001', 'default', 'Undangan Beauty Contest I11170002', 'Beauty Contest akan dilaksanakan pada 2017-12-01 8:00:00 WIB di Ruang Rapat PT Pos Logistik Indonesia', 'http://localhost/eproc/index.php/admin/invitation/detail/I11170002', 1, '2017-11-22 08:47:29'),
(12, 'U0001', 'U0002', 'Assessor', 'Undangan Beauty Contest I11170002', 'Beauty Contest akan dilaksanakan pada 2017-12-01 8:00:00 WIB di Ruang Rapat PT Pos Logistik Indonesia', 'http://localhost/eproc/index.php/admin/invitation/detail/I11170002', 0, '2017-11-22 08:47:29'),
(13, 'U0001', 'U0003', 'default', 'Undangan Beauty Contest I11170002', 'Beauty Contest akan dilaksanakan pada 2017-12-01 8:00:00 WIB di Ruang Rapat PT Pos Logistik Indonesia', 'http://localhost/eproc/index.php/admin/invitation/detail/I11170002', 1, '2017-11-22 08:47:29'),
(14, 'U0001', 'PIC0001', 'Vendor', 'Undangan Aanwizing I11170003', ' akan dilaksanakan pada 2017-12-08 8:00:00 WIB di Ruang Rapat PT Pos Logistik Indonesia, mohon konfirmasi kehadiran secepatnya.', 'http://localhost/eproc/index.php/vendor/invitation/detail/I11170003', 0, '2017-11-22 09:45:27'),
(15, 'U0001', 'U0001', 'default', 'Undangan Aanwizing I11170003', 'Aanwizing akan dilaksanakan pada 2017-12-08 8:00:00 WIB di Ruang Rapat PT Pos Logistik Indonesia', 'http://localhost/eproc/index.php/admin/invitation/detail/I11170003', 1, '2017-11-22 09:45:28'),
(16, 'U0001', 'U0002', 'Assessor', 'Undangan Aanwizing I11170003', 'Aanwizing akan dilaksanakan pada 2017-12-08 8:00:00 WIB di Ruang Rapat PT Pos Logistik Indonesia', 'http://localhost/eproc/index.php/admin/invitation/detail/I11170003', 0, '2017-11-22 09:45:28'),
(17, 'U0001', 'U0003', 'default', 'Undangan Aanwizing I11170003', 'Aanwizing akan dilaksanakan pada 2017-12-08 8:00:00 WIB di Ruang Rapat PT Pos Logistik Indonesia', 'http://localhost/eproc/index.php/admin/invitation/detail/I11170003', 1, '2017-11-22 09:45:28'),
(18, 'U0001', 'PIC0001', 'Vendor', 'Undangan Beauty Contest I11170004', ' akan dilaksanakan pada 2017-11-22 8:00:00 WIB di Ruang Rapat PT Pos Logistik Indonesia, mohon konfirmasi kehadiran secepatnya.', 'http://localhost/eproc/index.php/vendor/invitation/detail/I11170004', 0, '2017-11-22 13:45:48'),
(19, 'U0001', 'PIC0001', 'Vendor', 'Undangan Beauty Contest I11170005', 'Beauty Contest akan dilaksanakan pada 2017-11-22 8:00:00 WIB di Ruang Rapat PT Pos Logistik Indonesia, mohon konfirmasi kehadiran secepatnya.', 'http://localhost/eproc/index.php/vendor/invitation/detail/I11170005', 0, '2017-11-22 13:46:21'),
(20, 'U0001', 'PIC0001', 'Vendor', 'Undangan Bidding I11170004', ' akan dilaksanakan pada 2017-12-02 15:00:00 WIB di Ruang Rapat PT Pos Logistik Indonesia, mohon konfirmasi kehadiran secepatnya.', 'http://localhost/eproc/index.php/vendor/invitation/detail/I11170004', 0, '2017-11-22 13:47:37'),
(21, 'U0001', 'U0001', 'default', 'Undangan Bidding I11170004', 'Bidding akan dilaksanakan pada 2017-12-02 15:00:00 WIB di Ruang Rapat PT Pos Logistik Indonesia', 'http://localhost/eproc/index.php/admin/invitation/detail/I11170004', 1, '2017-11-22 13:47:37'),
(22, 'U0001', 'U0002', 'Assessor', 'Undangan Bidding I11170004', 'Bidding akan dilaksanakan pada 2017-12-02 15:00:00 WIB di Ruang Rapat PT Pos Logistik Indonesia', 'http://localhost/eproc/index.php/admin/invitation/detail/I11170004', 0, '2017-11-22 13:47:37'),
(23, 'U0001', 'U0003', 'default', 'Undangan Bidding I11170004', 'Bidding akan dilaksanakan pada 2017-12-02 15:00:00 WIB di Ruang Rapat PT Pos Logistik Indonesia', 'http://localhost/eproc/index.php/admin/invitation/detail/I11170004', 1, '2017-11-22 13:47:37'),
(24, 'U0001', 'PIC0001', 'Vendor', 'Undangan Bidding I11170005', 'Bidding akan dilaksanakan pada 2017-12-02 15:00:00 WIB di Ruang Rapat PT Pos Logistik Indonesia, mohon konfirmasi kehadiran secepatnya.', 'http://localhost/eproc/index.php/vendor/invitation/detail/I11170005', 0, '2017-11-22 13:47:59'),
(25, 'U0001', 'U0001', 'default', 'Undangan Bidding I11170005', 'Bidding akan dilaksanakan pada 2017-12-02 15:00:00 WIB di Ruang Rapat PT Pos Logistik Indonesia', 'http://localhost/eproc/index.php/admin/invitation/detail/I11170005', 1, '2017-11-22 13:47:59'),
(26, 'U0001', 'U0002', 'Assessor', 'Undangan Bidding I11170005', 'Bidding akan dilaksanakan pada 2017-12-02 15:00:00 WIB di Ruang Rapat PT Pos Logistik Indonesia', 'http://localhost/eproc/index.php/admin/invitation/detail/I11170005', 0, '2017-11-22 13:47:59'),
(27, 'U0001', 'U0003', 'default', 'Undangan Bidding I11170005', 'Bidding akan dilaksanakan pada 2017-12-02 15:00:00 WIB di Ruang Rapat PT Pos Logistik Indonesia', 'http://localhost/eproc/index.php/admin/invitation/detail/I11170005', 1, '2017-11-22 13:47:59'),
(28, 'U0001', 'PIC0001', 'Vendor', 'Undangan Beauty Contest I11170006', 'Beauty Contest akan dilaksanakan pada 2017-11-27 8:00:00 WIB di Ruang Rapat PT Pos Logistik Indonesia, mohon konfirmasi kehadiran secepatnya.', 'http://localhost/eproc/index.php/vendor/invitation/detail/I11170006', 0, '2017-11-22 16:19:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimaan_barang`
--

CREATE TABLE `penerimaan_barang` (
  `id_barang` int(11) NOT NULL,
  `no_po` varchar(255) NOT NULL,
  `kd_barang` varchar(255) NOT NULL,
  `nama_vendor` varchar(255) NOT NULL,
  `alamat_vendor` varchar(255) NOT NULL,
  `email_vendor` varchar(255) NOT NULL,
  `jumlah_barang` int(100) NOT NULL,
  `tgl_brg_dtg` varchar(255) NOT NULL,
  `efile_upload` varchar(500) NOT NULL,
  `tgl_brg_klr` date NOT NULL,
  `stok_barang` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penerimaan_barang`
--

INSERT INTO `penerimaan_barang` (`id_barang`, `no_po`, `kd_barang`, `nama_vendor`, `alamat_vendor`, `email_vendor`, `jumlah_barang`, `tgl_brg_dtg`, `efile_upload`, `tgl_brg_klr`, `stok_barang`) VALUES
(13, ' SK/2019', 'BR001', 'PIPA', 'Jakarta', 'pipa@pipa.com', 5, '2019-07-21', 'pdf/_20190721171602_5-47-2-PB.pdf', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pic`
--

CREATE TABLE `pic` (
  `pic_id` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `regdate` datetime NOT NULL,
  `lastmod` datetime NOT NULL,
  `lastlog` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pic`
--

INSERT INTO `pic` (`pic_id`, `username`, `password`, `fullname`, `email`, `phone`, `status`, `regdate`, `lastmod`, `lastlog`) VALUES
('PIC0001', 'kopposindo', 'e10adc3949ba59abbe56e057f20f883e', 'Zaelani', 'bayurahmadazhari@gmail.com', '085693694313', 1, '2017-11-20 10:51:15', '0000-00-00 00:00:00', '2017-11-20 11:02:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `vendor_id` varchar(10) NOT NULL,
  `project_owner` varchar(100) NOT NULL,
  `project_type` text NOT NULL,
  `evaluation` text NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_log`
--

CREATE TABLE `tb_log` (
  `log_id` int(10) NOT NULL,
  `log_user` varchar(100) NOT NULL,
  `log_type` varchar(100) NOT NULL,
  `log_date` date NOT NULL,
  `log_remarks` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_log`
--

INSERT INTO `tb_log` (`log_id`, `log_user`, `log_type`, `log_date`, `log_remarks`) VALUES
(1, 'admin', 'login', '2019-07-13', ' '),
(2, 'admin', 'login', '2019-07-13', ' '),
(3, 'admin', 'login', '2019-07-13', ' '),
(4, 'admin', 'login', '2019-07-13', ' '),
(5, 'admin', 'login', '2019-07-13', ' '),
(6, 'admin', 'login', '2019-07-13', ' '),
(7, 'admin', 'login', '2019-07-13', ' '),
(8, 'admin', 'login', '2019-07-20', ' '),
(9, 'admin', 'login', '2019-07-21', ' '),
(10, 'admin', 'login', '2019-07-21', ' '),
(11, 'admin', 'login', '2019-07-21', ' ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_role` enum('Admin','Vendor','Kepala Gudang','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_name`, `user_pass`, `user_role`) VALUES
(1, 'Admin', 'admin', 'Admin'),
(2, 'vendor', 'vendor', 'Admin'),
(3, 'user', 'user', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` varchar(10) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `qualification_id` varchar(20) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `founded` date NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `business_field` text NOT NULL,
  `status` enum('Belum Lolos','Tidak Lolos','Lolos') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `user_id`, `qualification_id`, `company_name`, `founded`, `address`, `city`, `email`, `phone`, `business_field`, `status`) VALUES
('V0001', 'PIC0001', 'Q07', 'Koperasi Pegawai Pos Indonesia Jakarta Pusat', '0000-00-00', 'Jl. Pos # 2', 'Jakarta Pusat', 'kopposindojkp@gmail.com', '0213442714', 'Perorangan', 'Lolos'),
('V0002', 'PIC0001', 'Q07', 'PT Dapensi Trio Usaha', '0000-00-00', 'Gedung Pos Ibukota (GPI) Lt. 4, Jl. Gedung Kesenian # 2', 'Jakarta Pusat', 'dtu_jakarta1@yahoo.co.id', '0213505186', 'Perorangan', 'Belum Lolos'),
('V0003', 'PIC0001', 'Q07', 'PT Dinamika Prima Cargo', '0000-00-00', 'Gedung JPT I Lt. 2 # D14, Area Kargo Bandara Int''l Soekarno-Hatta / Vivo Business Park Blok A7, Jl. Pembangunan 2, Kel. Karang Anyar, Kec. Neglasari', 'Tangerang', 'hrd.dpk@gmail.com', '02155911046', 'Perorangan', 'Belum Lolos'),
('V0004', 'PIC0001', 'Q07', 'PT Bhayangkara Satria Perkasa', '0000-00-00', 'Jl. Raya Lapan # 44A, RT 010/RW 001, Pekayon, Pasar Rebo', 'Jakarta Timur', 'bsp_bhayangkara@yahoo.co.id', '0288715512', 'Perorangan', 'Belum Lolos'),
('V0005', 'PIC0001', 'Q07', 'PT Provis Garuda Services', '0000-00-00', 'Jl. Tanah Abang I # 8, Petojo Selatan', 'Jakarta Pusat', 'marketing@provis-garuda.co.id', '02134831818', 'Perorangan', 'Belum Lolos'),
('V0006', 'PIC0001', 'Q07', 'PT Bersama Menuju Sejahtera', '0000-00-00', 'Jl. Pos # 2', 'Jakarta Pusat', 'bersamamenujusejahtera@yahoo.co.id', '0213442714', 'Perorangan', 'Belum Lolos'),
('V0007', 'PIC0001', 'Q07', 'PT Safitri Asta Wijaya', '0000-00-00', 'Jl. Padat Karya RT 05 # 88', 'Balikpapan', 'safitriastawijaya.pt@gmail.com', '0542414059', 'Perorangan', 'Belum Lolos'),
('V0008', 'PIC0001', 'Q07', 'PT Dina Akrimna', '0000-00-00', 'Jl. Kamboja # 91, RT 30, Gunung Sari Ilir', 'Balikpapan', 'dina.akrimna@yahoo.com', '05427138007', 'Borongan', 'Belum Lolos'),
('V0009', 'PIC0001', 'Q07', 'PT Usaha Yekapepe', '0000-00-00', 'Jl. Veteran 6-8', 'Surabaya', 'yekapepe@ymail.com', '0313552228', 'Perorangan', 'Belum Lolos'),
('V0010', 'PIC0001', 'Q07', 'PT Rubidena Perkasa', '0000-00-00', 'Jl. Rungkut Lor Rl. V-G/10', 'Surabaya', 'rubidenaperkasa@ymail.com', '081231994000', 'Borongan', 'Belum Lolos'),
('V0011', 'PIC0001', 'Q07', 'PT Bima Raya Jaya', '0000-00-00', 'Jl. Tata Praja II Blok 1-H # 18', 'Balikpapan', 'bimarayajaya@yahoo.com', '05427019090', 'Borongan', 'Belum Lolos'),
('V0012', 'PIC0001', 'Q07', 'PT Soekiman Poetra Perkasa', '0000-00-00', 'Perumahan Taman Citra Sedati Blok B 1', 'Sidoarjo', 'spp.poetraperkasa@gmail.com', '081703321222', 'Borongan', 'Belum Lolos');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `penerimaan_barang`
--
ALTER TABLE `penerimaan_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `pic`
--
ALTER TABLE `pic`
  ADD PRIMARY KEY (`pic_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `penerimaan_barang`
--
ALTER TABLE `penerimaan_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
