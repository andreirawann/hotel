-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21. Desember 2017 jam 15:32
-- Versi Server: 5.5.8
-- Versi PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `idbooking` int(11) NOT NULL AUTO_INCREMENT,
  `idmember` int(11) NOT NULL,
  `idtipe` int(11) NOT NULL,
  `idkamar` int(11) NOT NULL,
  `kdbooking` varchar(25) NOT NULL,
  `tglbooking` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tglmasuk` date NOT NULL DEFAULT '0000-00-00',
  `tglkeluar` date NOT NULL DEFAULT '0000-00-00',
  `lamanginap` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`idbooking`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data untuk tabel `booking`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `checkin`
--

CREATE TABLE IF NOT EXISTS `checkin` (
  `idcheckin` int(11) NOT NULL AUTO_INCREMENT,
  `idbooking` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `suratnikah` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`idcheckin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `checkin`
--

INSERT INTO `checkin` (`idcheckin`, `idbooking`, `iduser`, `suratnikah`, `status`) VALUES
(8, 18, 4, '', 'Checkout'),
(9, 19, 4, '', 'Checkout');

-- --------------------------------------------------------

--
-- Struktur dari tabel `grup`
--

CREATE TABLE IF NOT EXISTS `grup` (
  `idgrup` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `kdgrup` varchar(10) NOT NULL,
  `namagrup` varchar(30) NOT NULL,
  `diskon` int(11) NOT NULL,
  PRIMARY KEY (`idgrup`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `grup`
--

INSERT INTO `grup` (`idgrup`, `iduser`, `kdgrup`, `namagrup`, `diskon`) VALUES
(1, 1, 'UM', 'Tamu Umum', 0),
(2, 3, 'CORP', 'Corporate / Tamu Perusahaan', 10),
(3, 3, 'GOV', 'Government / Tamu Pemerintahan', 20),
(4, 1, 'VOUC', 'Voucher Hotel', 25),
(5, 3, 'SPEC', 'Special / Tamu Khusus', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori`
--

CREATE TABLE IF NOT EXISTS `histori` (
  `idbooking` int(11) NOT NULL AUTO_INCREMENT,
  `idmember` int(11) NOT NULL,
  `idtipe` int(11) NOT NULL,
  `idkamar` int(11) NOT NULL,
  `kdbooking` varchar(25) NOT NULL,
  `tglbooking` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tglmasuk` date NOT NULL DEFAULT '0000-00-00',
  `tglkeluar` date NOT NULL DEFAULT '0000-00-00',
  `lamanginap` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`idbooking`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data untuk tabel `histori`
--

INSERT INTO `histori` (`idbooking`, `idmember`, `idtipe`, `idkamar`, `kdbooking`, `tglbooking`, `tglmasuk`, `tglkeluar`, `lamanginap`, `status`) VALUES
(18, 1, 1, 1, 'BOOK-20171221014018', '2017-12-21 01:40:45', '2017-12-21', '2017-12-24', 3, 'Terisi'),
(19, 1, 1, 1, 'BOOK-20171221091350', '2017-12-21 09:13:53', '2017-12-25', '2017-12-27', 2, 'Terisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa`
--

CREATE TABLE IF NOT EXISTS `jasa` (
  `idjasa` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  PRIMARY KEY (`idjasa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `jasa`
--

INSERT INTO `jasa` (`idjasa`, `iduser`, `nama`, `harga`) VALUES
(1, 1, 'Paket SPA Hotel', 275000),
(2, 1, 'Jasa Antar ke Bandara', 250000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE IF NOT EXISTS `kamar` (
  `idkamar` int(11) NOT NULL AUTO_INCREMENT,
  `idtipe` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `nokamar` int(11) NOT NULL,
  PRIMARY KEY (`idkamar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`idkamar`, `idtipe`, `iduser`, `nokamar`) VALUES
(1, 1, 1, 201),
(2, 2, 1, 206),
(3, 4, 1, 301),
(4, 5, 1, 306),
(5, 1, 1, 202),
(6, 1, 1, 203),
(7, 2, 1, 207),
(8, 4, 1, 302),
(9, 3, 1, 401),
(10, 1, 1, 204),
(11, 1, 1, 205),
(12, 3, 1, 402),
(13, 5, 1, 307),
(14, 2, 1, 208),
(15, 5, 1, 308);

-- --------------------------------------------------------

--
-- Struktur dari tabel `makanminum`
--

CREATE TABLE IF NOT EXISTS `makanminum` (
  `idmakanminum` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  PRIMARY KEY (`idmakanminum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `makanminum`
--

INSERT INTO `makanminum` (`idmakanminum`, `iduser`, `nama`, `harga`) VALUES
(1, 1, 'Paket Breakfast', 40000),
(2, 1, 'Paket Lunch', 55000),
(3, 1, 'Paket Dinner', 70000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `idmember` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `noktp` varchar(20) NOT NULL,
  `namalengkap` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `tgldaftar` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idmember`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`idmember`, `username`, `password`, `noktp`, `namalengkap`, `alamat`, `nohp`, `tgldaftar`) VALUES
(1, 'ekapraja', 'ekapraja', '123456789012345', 'Eka Praja Wiyata Mandala', 'Komp. Jondul V Blok I No. 16 Tabing Padang Sumatera Barat', '085213873216', '2017-11-27 09:09:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipekamar`
--

CREATE TABLE IF NOT EXISTS `tipekamar` (
  `idtipe` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `kdtipe` varchar(10) NOT NULL,
  `namatipe` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` double NOT NULL,
  `fasilitas` text NOT NULL,
  `foto1` text NOT NULL,
  `foto2` text NOT NULL,
  `foto3` text NOT NULL,
  PRIMARY KEY (`idtipe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `tipekamar`
--

INSERT INTO `tipekamar` (`idtipe`, `iduser`, `kdtipe`, `namatipe`, `keterangan`, `harga`, `fasilitas`, `foto1`, `foto2`, `foto3`) VALUES
(1, 1, 'DXQN', 'Deluxe Queen', 'Dengan luas 31m2 dan dengan pemandangan kolam renang atau kota. Diawali dengan Kamar Deluxe seluas 27m2 dengan berbagai fasilitas yang lengkap. Tersedia dalam pilihan tempat tidur queen dan twin dengan pemandangan kolam yang menenangkan, atau kesibukan kota. ', 750000, 'Pendingin ruangan dengan kontrol individual<br />\r\nTelepon IDD<br />\r\nLCD TV dengan saluran internasional<br />\r\nAkses internet kecepatan tinggi<br />\r\nKotak penyimpanan pribadi<br />\r\nFasilitas pembuat kopi dan teh<br />\r\nMini-bar<br />\r\nMeja kerja dengan sambungan listrik yang mudah diakses<br />\r\nKamar mandi dengan shower', 'DeluxeQueen1.jpg', 'DeluxeQueen2.jpg', 'DeluxeQueen3.jpg'),
(2, 1, 'DXTW', 'Deluxe Twin', '27 sqm / 291 sqft Dengan luas 31m2 dan dengan pemandangan kolam renang atau kota. Diawali dengan Kamar Deluxe seluas 27m2 dengan berbagai fasilitas yang lengkap. Tersedia dalam pilihan tempat tidur queen dan twin dengan pemandangan kolam yang menenangkan, atau kesibukan kota. ', 750000, 'Pendingin ruangan dengan kontrol individual<br />\r\nTelepon IDD<br />\r\nLCD TV dengan saluran internasional<br />\r\nAkses internet kecepatan tinggi<br />\r\nKotak penyimpanan pribadi<br />\r\nFasilitas pembuat kopi dan teh<br />\r\nMini-bar<br />\r\nMeja kerja dengan sambungan listrik yang mudah diakses<br />\r\nKamar mandi dengan shower', 'DeluxeTwin1.jpg', 'DeluxeTwin2.jpg', 'DeluxeTwin3.jpg'),
(3, 1, 'GRDXQN', 'Grand Deluxe Queen', '37m2 dengan pemandangan kolam renang atau kota. Kamar bebas asap rokok. Grand Deluxe menyediakan 24 jam koneksi internet gratis dan semuanya adalah kamar bebas asap rokok. ', 977500, 'Pendingin ruangan dengan kontrol individual<br>\r\nTelepon IDD<br>\r\nLCD TV dengan saluran internasional<br>\r\nAkses internet kecepatan tinggi<br>\r\nKotak penyimpanan pribadi<br>\r\nFasilitas pembuat kopi dan teh<br>\r\nMini-bar<br>\r\nMeja kerja dengan sambungan listrik yang mudah diakses\r\nKoran setiap hari<br>\r\nMajalah<br>\r\nRadio<br>\r\nAir dingin dan panas<br>\r\nKamar mandi dan alat pencukur 100/200 volt', 'GrandDeluxeQueen1.jpg', 'GrandDeluxeQueen2.jpg', ''),
(4, 1, 'EXQN', 'Executive Queen', '27m2 dengan akses cuma-cuma ke Lounge Eksekutif dan manfaat lainnya. Kamar bebas asap rokok. Kamar ini sangat sempurna untuk para eksekutif yang sesuai dengan hidupnya. 27m2 dan dilengkapi dengan fasilitas suite yang lengkap dan tersedia disemua kamar. ', 1258000, 'Pendingin ruangan dengan kontrol individual<br />\r\nTelepon IDD<br />\r\nLCD TV dengan saluran internasional<br />\r\nAkses internet kecepatan tinggi<br />\r\nKotak penyimpanan pribadi<br />\r\nFasilitas pembuat kopi dan teh<br />\r\nMini-bar<br />\r\nMeja kerja dengan sambungan listrik yang mudah diakses<br />\r\nKamar mandi dengan shower', 'ExecutiveQueen1.jpg', 'ExecutiveQueen2.jpg', ''),
(5, 0, 'EXTW', 'Executive Twin', '27m2 dengan akses cuma-cuma ke Lounge Eksekutif dan manfaat lainnya. Kamar bebas asap rokok. Kamar ini sangat sempurna untuk para eksekutif yang sesuai dengan hidupnya. 27m2 dan dilengkapi dengan fasilitas suite yang lengkap dan tersedia disemua kamar. ', 1258000, 'Pendingin ruangan dengan kontrol individual<br />\r\nTelepon IDD<br />\r\nLCD TV dengan saluran internasional<br />\r\nAkses internet kecepatan tinggi<br />\r\nKotak penyimpanan pribadi<br />\r\nFasilitas pembuat kopi dan teh<br />\r\nMini-bar<br />\r\nMeja kerja dengan sambungan listrik yang mudah diakses<br />\r\nKamar mandi dengan shower', 'ExecutiveTwin1.jpg', 'ExecutiveTwin2.jpg', 'ExecutiveTwin3.jpg'),
(6, 1, 'CBFMST', 'Cabana Family Suite', 'Kamar dengan luas 63m2, dengan akses langsung ke lounge dan manfaat lainnya. Cabana Suite dilengkapi dengan ruang tamu yang luas dengan akses langsung ke kolam renang. Teras dan pemandangan kolam renang membuat Cabana adalah kamar yang sempurna untuk liburan bersama keluarga.', 2320000, 'Ruang tamu<br />\r\nKamar mandi terpisah dengan tambahan sofabed<br />\r\nArea makan<br />\r\nPendingin ruangan dengan kontrol individual<br />\r\nTelepon IDD<br />\r\nLCD TV dengan saluran internasional<br />\r\nHome stereo sound system<br />\r\nNintendo Wii<br />\r\nAkses internet kecepatan tinggi<br />\r\nKotak penyimpanan pribadi<br />\r\nFasilitas pembuat kopi dan teh<br />\r\nKulkas mini<br />\r\nMeja kerja dengan sambungan listrik yang mudah diakses<br />\r\nKoran setiap hari<br />\r\nAir panas dan dingin', 'CabanaFamilySuite1.jpg', 'CabanaFamilySuite2.jpg', 'CabanaFamilySuite3.jpg'),
(7, 1, 'ST', 'Suite', '63 m2 dilengkapi dengan ruang tamu terpisah. Kamar bebas asap rokok dengan pilihan tempat tidur queen. Penampilan terbaru dari Kamar Suite yang dirancang untuk Anda untuk kenyamanan Anda, sofa yang nyaman dan meja makan. ', 2830000, 'Ruang tamu<br />\r\nPendingin ruangan dengan kontrol individual<br />\r\nTelepon IDD<br />\r\nLCD TV dengan saluran internasional<br />\r\nAkses internet kecepatan tinggi<br />\r\nKotak penyimpanan pribadi<br />\r\nFasilitas pembuat kopi dan teh<br />\r\nMini-bar<br />\r\nMeja kerja dengan sambungan listrik yang mudah diakses<br />\r\nKoran setiap hari<br />\r\nMajalah<br />\r\nRadio<br />\r\nAir dingin dan panas<br />\r\nKamar mandi dan alat pencukur 100/200 volt<br />\r\nIpod docking port<br />\r\nPengering rambut', 'Suite1.jpg', 'Suite2.jpg', 'Suite3.jpg'),
(8, 1, 'PRST', 'Presidential Suite', '85m2. Harga termasuk makan pagi. Kamar bebas asap rokok. Akses ke lounge Terbaik. 82 m2 dengan desain dan fasilitas yang mewah. Tersedia dalam pilihan satu tempat tidur untuk kenyamanan maksimum tidur Anda. ', 3500000, '    Pendingin ruangan dengan kontrol individual<br />\r\n    Telepon IDD<br />\r\n    LCD TV dengan saluran internasional<br />\r\n    Akses internet kecepatan tinggi<br />\r\n    Kotak penyimpanan pribadi<br />\r\n    Fasilitas pembuat kopi dan teh<br />\r\n    Mini-bar<br />\r\n    Meja kerja dengan sambungan listrik yang mudah diakses<br />\r\n    Koran setiap hari<br />\r\n    Majalah<br />\r\n    Radio<br />\r\n    Air dingin dan panas<br />\r\n    Kamar mandi dan alat pencukur 100/200 volt', 'PresidentialSuite1.jpg', 'PresidentialSuite2.jpg', 'PresidentialSuite4.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `idtransaksi` int(11) NOT NULL AUTO_INCREMENT,
  `idcheckin` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `tglbayar` date NOT NULL DEFAULT '0000-00-00',
  `totalbayar` double NOT NULL,
  PRIMARY KEY (`idtransaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `idcheckin`, `ppn`, `tglbayar`, `totalbayar`) VALUES
(1, 8, 233550, '2017-12-24', 2569050),
(2, 9, 150000, '2017-12-27', 1650000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `level` varchar(15) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', 'admin', 'Administrator Hotel', 'Administrator'),
(2, 'manajer1', 'manajer1', 'Eka Praja Wiyata Mandala', 'Manajer'),
(3, 'ajo', 'ajo', 'Ajo Piaman', 'Administrator'),
(4, 'resepsionis1', 'resepsionis1', 'Ade Firman Diraja', 'Resepsionis');
