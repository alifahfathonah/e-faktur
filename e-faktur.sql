-- phpMyAdmin SQL Dump
-- version 2.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2014 at 08:39 AM
-- Server version: 5.0.45
-- PHP Version: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `e-faktur`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip`
--

CREATE TABLE `arsip` (
  `no_fak` varchar(20) collate latin1_general_ci NOT NULL,
  `ssp` varchar(20) collate latin1_general_ci NOT NULL,
  `bupot` varchar(20) collate latin1_general_ci NOT NULL,
  `invoice` varchar(20) collate latin1_general_ci NOT NULL,
  `description` text collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`no_fak`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `arsip`
--

INSERT INTO `arsip` (`no_fak`, `ssp`, `bupot`, `invoice`, `description`) VALUES
('001-14.03884176', 'SELESAI', 'PROSES', 'PROSES', 'MINTA PAK TARSONO'),
('000.14-82033588 	', 'SELESAI', 'SELESAI', 'PROSES', 'TGL BUKTI POTONG'),
('000-14-82033587', 'SELESAI', 'SELESAI', 'SELESAI', 'SUDAH SELESAI'),
('000-14-82033586 	', 'SELESAI', 'PROSES', 'SELESAI', 'TGL BUKTI POTONG'),
('000-14-82033586 ', 'SELESAI', 'PROSES', 'SELESAI', 'TGL BUKTI POTONG'),
('000-14-82033585', 'BATAL', 'BATAL', 'BATAL', 'BATAL'),
('000-14-82033584', 'PROSES', 'SELESAI', 'SELESAI', 'SUDAH SELESAI'),
('000-14-82033583', 'SELESAI', 'SELESAI', 'SELESAI', 'SUDAH SELESAI'),
('000-14-82033582', 'SELESAI', 'SELESAI', 'SELESAI', 'SUDAH SELESAI'),
('000-14-97027220', 'PROSES', 'PROSES', 'PROSES', 'PROSES MINTA KE PLN'),
('000-14.97027219', 'SELESAI', 'SELESAI', 'PROSES', 'TGL SPK');

-- --------------------------------------------------------

--
-- Table structure for table `faktur`
--

CREATE TABLE `faktur` (
  `id_faktur` int(10) unsigned zerofill NOT NULL auto_increment,
  `id_lw` varchar(10) collate latin1_general_ci NOT NULL,
  `kode` varchar(10) collate latin1_general_ci NOT NULL,
  `no_fak` varchar(20) collate latin1_general_ci NOT NULL,
  `tanggal` varchar(12) collate latin1_general_ci NOT NULL,
  `keterangan` text collate latin1_general_ci NOT NULL,
  `nominal` double NOT NULL,
  `divisi` varchar(100) collate latin1_general_ci NOT NULL,
  `npwp` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_faktur`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=38 ;

--
-- Dumping data for table `faktur`
--

INSERT INTO `faktur` (`id_faktur`, `id_lw`, `kode`, `no_fak`, `tanggal`, `keterangan`, `nominal`, `divisi`, `npwp`) VALUES
(0000000037, 'LTR8', '010', '001-14.03884176', '2014-04-08', '<p>PEMBAYARAN TAHAP KE (TUJUH) PEKRJAAN INSTALASI DUCTING AC PROYEK PASAR ATOM PASAR BARU JAKARTA</p>\r\n<p>MATERIAL : 54.865.193,</p>\r\n<p>JASA : 17.634.807,-</p>', 79750000, 'TARSONO', '01.304.626.3-003.000'),
(0000000036, 'LTR6', '010', '000.14-82033588 	', '2014-04-01', '<p>BIAYA / ONGKOS CLEANING CUBICLE 20 KV. MELIPUTI : PEMELIHARAAN BODY / LBS / ISOLATOR / TERMINAL KABEL / BUSBAR / REL / CT / PT &amp; PERBAIKAN INSTALASI DGPT</p>\r\n<p>PO NO : R1310184 TANGGAL : 19 JULI 2013</p>', 20790000, 'KUSEN', '01.731.745.4-086.000'),
(0000000035, 'LTR6', '010', '000-14-82033587', '2014-04-01', '<p>FUSE TM MERLIN GERIN 6.3 A U/ PANEL CUBICLE 20 KV PLANT III</p>\r\n<p>PO NO : R1312210</p>\r\n<p>TANGGAL : 17/09/2013</p>', 6050000, 'KUSEN', '01.731.745.4-086.000'),
(0000000034, 'LTR7', '010', '000-14-82033586 	', '2014-04-01', '<p>BIAYA REPAIR TRAFO AND SUBSTATION INSTALLATION POWER HOUSE (REVISI INSTALASI GARDU DAN PERBAIKAN TRAFO BOCOR 500&nbsp; KVA )</p>', 12269950, 'KUSEN', '01.731.745.4-086.000'),
(0000000033, 'LTR5', '010', '000-14-82033585', '2014-03-21', '<p>PEMINDAHAN DAN PEMASANGAN KEMBALI BOX PANEL PJU</p>\r\n<p>RUKO AMBER 3</p>\r\n<p>NO. 002/GRAP/GDT/III-2014 TANGGAL : 07/03/2014</p>\r\n<p>TAGIHAN 100 %</p>', 8250000, 'KUSAINI', '01.731.745.4-086.000'),
(0000000032, 'LTR5', '010', '000-14-82033584', '2014-01-06', '<p>PEKERJAAN PENGADAAN DAYA LISTRIK .200 VA &amp; 3.500 VA ALEXANDERITE ARCADE &amp; JADE ARCADE</p>\r\n<p>NO : 043/GRAP/GDT-DIR/III-2013</p>\r\n<p>TAGIHAN TERMYN III 10 %</p>', 3150180, 'KUSAINI', '01.731.745.4-086.000'),
(0000000031, 'LTR4', '010', '000-14-82033583', '2014-01-06', '<p>PEKERJAAN PENGADAAN DAYA LISTRIK 2.200 VA CLUSTER JADE</p>\r\n<p>NO. 046/BPAL/GDT-DIR/III-2013 TANGGAL : 30 MARET 2013</p>\r\n<p>TAGIHAN TERMYN III 20 %</p>', 23463000, 'KUSAINI', '01.731.745.4-086.000'),
(0000000030, 'LTR3', '010', '000-14-82033582', '2014-01-06', '<p>PENGADAAN PJU BESERTA DAYA LISTRIK 6,600 VA DAN PANEL PJU</p>\r\n<p>NO. 143/DPLS/GDT/XII-2013</p>\r\n<p>TAGIHAN 100 %</p>', 36729000, 'KUSAINI', '01.731.745.4-086.000'),
(0000000029, 'LTR1', '030', '000.14-97027226', '2014-05-09', '<p>PEMBAYARAN</p>\r\n<p>PERBAIKAN GANGGUAN JTR (SKTR/SUTR), GARDU BETON/PORTAL DAN SUTM AREA CENGKARENG</p>\r\n<p>SPK NO : 121.SPK/613/A.CKR/2013</p>\r\n<p>TANGGAL : 26 APRIL 2013</p>\r\n<p>TAGIHAN 10%</p>', 3956725, 'MARYONO', '02.869.896.7-402.000'),
(0000000028, 'LTR1', '030', '000.14-97027225', '2014-05-14', '<p>PEMBANGUNAN GARDU PORTAL SISIPAN DENGAN PENARIKAN SUTM UNTUK MENANGGULANGI TEGANGAN DROP AKIBAT JARINGAN TERLALU JAUH DI CA 78</p>\r\n<p>SPK NO : 0001.SPK/613/A.CKP/2014</p>\r\n<p>TANGGAL " 02 JANUARI 2014</p>\r\n<p>TAGIHAN 100%</p>', 82555000, 'LEO S', '02.869.896.7-402.000'),
(0000000027, 'LTR1', '030', '000.14-97027224', '2014-05-08', '<p>PEMELIHARAAN JARINGAN TENAGA LISTRIK (JTL) BERBASIS&nbsp; KONDISI PERALATAN/INSTALASI SUTM, GARDU&nbsp; BETON/PORTAL DAN SUTR/SKTR POSKO CENGKARENG AREA CENGKARENG</p>\r\n<p>SPK NO :081.SPK/613/A.CKR/2013</p>\r\n<p>TANGGAL SPK : 01 APRIL 2013</p>\r\n<p>TAGIHAN : 10 %</p>', 7080159, 'MARYONO', '02.869.896.7-402.000'),
(0000000026, 'LTR1', '030', '000.14-97027223', '2014-05-08', '<p>PERBAIKAN GANGGUAN JARINGAN DISTRIBUSI JTM, GARDU DAN JTR AREA CENGKARENG<br />SPK NO : 057.SPK/613/ACKR/2013<br />Tanggal. : 08 MARET 2013</p>', 9412761, 'MARYONO', '02.869.896.7-402.000'),
(0000000025, 'LTR2', '010', '000.14-97027222', '2014-04-30', '<p>JASA PEMASANGAN TRAFO 3150 KVA</p>', 33000000, 'EDINUR', '02.869.896.7-402.000'),
(0000000024, 'LTR1', '030', '000.14-97027221', '2014-04-15', '<p>PERBAIKAN GANGGUAN JTR (SKTR/SUTR), GARDU BETON / PORTAL DAN SUTM</p>\r\n<p>SPK NO : 121.SPK/613/A.CKR/2013</p>\r\n<p>TANGGAL : 26 APRIL 2013</p>', 35610523, 'MARYONO', '02.869.896.7-402.000'),
(0000000022, 'LTR1', '030', '000-14.97027219', '2014-02-25', '<p>PERBAIKAN GANGGUAN JARINGAN JTM / JTR AREA TELUK NAGA</p>\r\n<p>SPK AO. 138/613/A.TLN/2013</p>', 83232000, 'AGUS', '02.869.896.7-402.000'),
(0000000023, 'LTR1', '030', '000-14-97027220', '2014-03-25', '<p>JASA PENYAMBUNGAN SR APP EX P2TL POSKO MELAYU SEBANYAK 2.000 PELANGGAN&nbsp;</p>\r\n<p>SPK NO : AI.139/613/A.TLN/2013</p>\r\n<p>TANGGAL : 25 NOVEMBER 2013</p>', 46677400, 'BAHRUN', '02.869.896.7-402.000');

-- --------------------------------------------------------

--
-- Table structure for table `no_ref`
--

CREATE TABLE `no_ref` (
  `id_no` int(5) unsigned zerofill NOT NULL auto_increment,
  `no_surat` varchar(50) collate latin1_general_ci NOT NULL,
  `tanggal` varchar(12) collate latin1_general_ci NOT NULL,
  `no_awal` varchar(50) collate latin1_general_ci NOT NULL,
  `no_akhir` varchar(50) collate latin1_general_ci NOT NULL,
  `npwp` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_no`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `no_ref`
--

INSERT INTO `no_ref` (`id_no`, `no_surat`, `tanggal`, `no_awal`, `no_akhir`, `npwp`) VALUES
(00001, '0111.SURAT/20004/DJP/20142', '2014-02-082', '1111111111182', '1111111111102', '01.731.745.4-086.000');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `npwp` varchar(100) collate latin1_general_ci NOT NULL,
  `nama_wp` varchar(150) collate latin1_general_ci NOT NULL,
  `alamat` varchar(200) collate latin1_general_ci NOT NULL,
  `kota` varchar(50) collate latin1_general_ci NOT NULL,
  `no_tel` varchar(14) collate latin1_general_ci NOT NULL,
  `usaha` varchar(100) collate latin1_general_ci NOT NULL,
  `klu` varchar(10) collate latin1_general_ci NOT NULL,
  `nama` varchar(100) collate latin1_general_ci NOT NULL,
  `jabatan` varchar(50) collate latin1_general_ci NOT NULL,
  `password` varchar(100) collate latin1_general_ci NOT NULL,
  `level` varchar(20) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`npwp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`npwp`, `nama_wp`, `alamat`, `kota`, `no_tel`, `usaha`, `klu`, `nama`, `jabatan`, `password`, `level`) VALUES
('02.869.896.7-402.000', 'PT. GEMA CAHAYA LISTRINDO', 'KP. GEBANG JL. ASIJAH NO. 45 RT 002/002 SANGIANG JAYA PERIUK', 'TANGERANG', '021-59309136', 'INSTALASI LISTRIK', 'INSTALASI ', 'LASIMAN', 'DIREKTUR', 'e10adc3949ba59abbe56e057f20f883e', 'wp'),
('01.731.745.4-086.000', 'PT. PUTIMEKAR BERSAMA', 'JL. TOLO DALAM NO. 09 RT.006/002, SRENGSENG KEMBANGAN JAKARTA BARAT', 'JAKARTA', '021-5902758', 'INSTALASI BANGUNAN SIPIL LAINYA', '45329', 'KUSAINI', 'DIREKTUR', 'e10adc3949ba59abbe56e057f20f883e', 'wp'),
('01.304.626.3-003.000', 'PT. PRANA PERDANA', 'JL. H. TEN NO. 12-18 RAWAMANGUN PULO GADUNG JAKARTA TIMUR', 'JAKARTA', '0214891671', 'INSTALASI LISTRIK', '0214891671', 'WIWIN JAENUDIN', 'DIREKTUR', 'e10adc3949ba59abbe56e057f20f883e', 'wp');

-- --------------------------------------------------------

--
-- Table structure for table `profile_lw`
--

CREATE TABLE `profile_lw` (
  `id_lw` varchar(10) collate latin1_general_ci NOT NULL,
  `npwp_lw` varchar(100) collate latin1_general_ci NOT NULL,
  `npwp` varchar(100) collate latin1_general_ci NOT NULL,
  `nama_lw` varchar(150) collate latin1_general_ci NOT NULL,
  `alamat_lw` varchar(200) collate latin1_general_ci NOT NULL,
  `tlp_lw` varchar(15) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_lw`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `profile_lw`
--

INSERT INTO `profile_lw` (`id_lw`, `npwp_lw`, `npwp`, `nama_lw`, `alamat_lw`, `tlp_lw`) VALUES
('LTR8', '02.109.087.3-072.000', '01.304.626.3-003.000', 'PT. DUTA KIRANA SEJAHTERA', 'JL. SUNGAI GERONG NO. 09 RT. 010 RW. 020. KEBON MELATI TANAH ABANG JAKARTA PUSAT', '-'),
('LTR7', '03.007.335.7-074.000', '01.731.745.4-086.000', 'PT. INOAC POLYTECHNO INDONESIA', 'WISMA HAYAM WURUK LT.7, JL. HAYAM WURUK NO. 8, KEBON KELAPA, GAMBIR, JAKARTA PUSAT, DKI JAKARTA RAYA 10120', '0213500909'),
('LTR6', '01.000.243.4-052.000', '01.731.745.4-086.000', 'PT. IRC INOAC INDONESIA', 'JL. HAYAM WURUK NO. 8, WISMA HAYAM WURUK LT. 7, GAMBIR, JAKARTA PUSAT, DKI JAKARTA RAYA 10120', '0213500909'),
('LTR5', '01.528.662.8-402.000', '01.731.745.4-086.000', 'PT. GEBANG RAYA ALAM PERMAI', 'JL. PRABU KIAN SANTANG GEBANG RAYA PERIUK TANGERANG BANTEN', '02155730888'),
('LTR4', '01.528.660.2-402.000', '01.731.745.4-086.000', 'PT. BUMI PURATI ALAM LESTARI', 'JL. PRABU KIAN SANTANG GEBANG RAYA PERIUK TANGERANG BANTEN', '02155730888'),
('LTR2', '02.993.085.6-092.000', '02.869.896.7-402.000', 'PT. INDOFOOD CBP SUKSES MAKMUR Tbk', 'SUDIRMAN PLAZA - INDOFOOD TOWER LANTAI 23. JL. JEND, SUDIRMAN KAV. 76-78, SETIABUDI JAKARTA SELATAN', '-'),
('LTR3', '01.528.661.0-415.000', '01.731.745.4-086.000', 'PT. DUTA PURATI LESTARI SENTOSA', 'JL. PRABU KIAN SANTANG GEBANG RAYA PERIUK TANGERANG BANTEN', '02155730888'),
('LTR1', '01.001.629.3-051.000', '02.869.896.7-402.000', 'PT. PLN ( PERSERO ) KANTOR PUSAT', 'JL. TRUNO JOYO BLOK M 1/135 MELAWAI KEBAYORAN BARU JAKARTA SELATAN', '-');
