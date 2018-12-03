-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2018 at 02:51 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokokamera`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id_detail` int(10) NOT NULL,
  `id_kamera` int(10) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `id_transaksi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id_detail`, `id_kamera`, `jumlah`, `id_transaksi`) VALUES
(3, 1, 2, 4),
(4, 3, 5, 6),
(5, 4, 1, 6),
(6, 5, 5, 8),
(7, 3, 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `kamera`
--

CREATE TABLE `kamera` (
  `id_kamera` int(10) NOT NULL,
  `nama_kamera` varchar(50) NOT NULL,
  `foto_kamera` text NOT NULL,
  `spesifikasi` text NOT NULL,
  `harga` int(15) NOT NULL,
  `stok` int(5) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_merek` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamera`
--

INSERT INTO `kamera` (`id_kamera`, `nama_kamera`, `foto_kamera`, `spesifikasi`, `harga`, `stok`, `id_kategori`, `id_merek`) VALUES
(1, 'Canon PowerShot SX400 IS', '0_1d5c9d81-5612-4336-bcef-cd20ee0ecd01_654_626.jpg', '<b>Isi Box :</b><br>- Kamera Canon PowerShot SX400 IS<br>- Charger Battery Canon CB-2LFE, CB-2LFC<br>- Li-ion Battery NB-11LH<br>- Strap Canon<br>- Lenscap / Tutup Lensa<br>- Cable Usb<br>- Manual Book &amp; CD<br><br><b>Spesifikasi Produk :</b><br>- 16,0 MP dengan Processor Canon DIGIC 4+ menghasilkan hasil photo yg lebih tajam<br>- 30x Optical Zoom (24-720mm) dengan 24mm Wide-Angle lens<br>- 3\'0 TFT LCD<br>- Image Stabilizer ( IS ) photo yg dihasilkan lebih fokus tanpa blur<br>- HD Video dengan kualitas 1280x720p untuk Video Movie<br>- Smart AUTO setting otomatis yg efektik untuk fungsi &amp; mode pengambilan photo<br>- ISO ( Auto, 100, 200, 400, 800, 1600 )<br>- Li-ion Battery ga perlu lagi repot beli baterai utk operasional kamera<br>', 1950000, 15, 4, 3),
(2, 'CANON EOS 650 D KIT18-55 IS II', '2222335_7717cfaa-0800-4b10-af2c-ec1afd578a7b.jpg', '<h3>Deskripsi Produk</h3><ul><li>Tipe:Canon EOS 650D&nbsp;</li><li>Ukuran (L x W x H cm):13.31 x 9.98 x 7.8 cm</li><li>Berat (kg):0.6</li><li>Tipe Layar:TFT Layar</li><li>Ukuran Layar (inc):3.0</li><li>Resolusi Layar:1040k dots</li><li>Megapiksel:18.0</li><li>Format Foto:JPEG, RAW</li><li>Ukuran File Foto:5184 x 345</li><li>Format Video:MOV</li><li>Video HD:Ya</li><li>Resolusi Video:19201080</li><li>Focal Length:29 216mm</li><li>Image Stabilization:Ya</li><li>Built in Flash:Ya</li><li>ISO Range:100-12800</li><li>Range Shutter Speed:1/4000- 1/60 detik</li><li>Range Aperture Lensa:f/3.5-5.6</li><li>Tipe Memory Card:SD/SDHC/SDXC</li><li>Input:USB</li><li>Output:Component Video|Composite Video|3.5mm jack|USB|HDMI</li><li>HDMI Port:Ya</li><li>Tipe Baterai:Li-Ion</li><li>Zoom Optik:7.0</li></ul>', 5700000, 3, 1, 3),
(3, 'Go Pro Cam Full HD 1080P WIFI', '50481633_b50456aa-e909-46ce-a69a-a673787b95fa_700_700.png', '<b>Action kamera</b><br><br>- wifi connection<br>- HMDI slot<br>- 2 inch screen<br>- waterproof casing housing<br>- water resistence<br>- HD 1020p<br>- include : clip 1, handle bar / pole mount, mount 1, mount 2, mount 3<br>- video : 1080P / 720P / QVGA<br>- recorded MOV format<br>- micro sdhc card slot<br>- dimension : 59.27 x 29.28 x 41.1 mm<br>- 12 MP HD wide angle lens,memory micro sd ( tidak dapat )<br>warna : hitam, biru, silver, gold, kuning										<br>', 600000, 22, 3, 7),
(4, 'SONY ALPHA A6000 Kit 16-50', '478016_dbf3b261-8225-4e9e-b399-833d04aa0ab3.jpg', 'SONY ALPHA A6000 Kit 16-50-Camera<br>BLACK,GRAY,SILVER Dan WHITE<br>BONUS UV FILTER<br><br>Mirrorless<br>Spesifikasi :<br>Lensa : KIT 16-50mm f/3.5-5.6 OSS<br>Body : Rangefinder-style mirrorless<br>Sensor :<br>Resolusi Maximum : 6000 x 4000<br>Pixels : 24 megapixels<br>Ukuran Sensor : APS-C (23.5 x 15.6 mm)<br>Tipe Sensor : CMOS<br>Prosesor : Bionz X<br><br>Image : ISO : Auto, 100-25600 (51200 with Multi-Frame NR)<br>LCD:Dapat diputar /dimiringkan<br>Ukuran layar: 3 Resolusi Layar: 921.600 dot<br>Min shutter speed: 30 sec<br>Max shutter speed: 1/4000 sec<br>Format: MPEG-4, AVCHD<br>Jenis penyimpanan: SD / SDHC / SDXC, Memory Stick Pro Duo / Pro-HG Duo<br><br>Optik &amp; Fokus :<br>Digital Zoom : Yes (2x)<br>Manual Fokus : Yes<br>Jumlah Titik Fokus : 179<br>Dudukan Lensa : Sony E<br>Focal Length (mult. / equiv.) : 1.5x<br><br>Layar / Viewfinder :<br>Articulate LCD : Tilting<br>Ukuran Layar : 3 inch<br>Screen Dots : 921,000<br>Layar Sentuh : No<br>Tipe Layar : TFT LCD<br><br>Fitur Foto :<br>Min Shutter Speed : 30 sec<br>Max Shutter Speed : 1/4000 sec<br>Built in Flash : Yes<br>Jangkauan Flash : 6.00 m (at ISO 100)<br><br>Fitur Video :<br>Resolusi : 1920 x 1080 (60p, 60i, 24p), 1440 x 1080 (30p, 25p), 640 x 480 (30p, 25p)<br>Format : MPEG-4, AVCHD<br><br>USB 2.0 (480 MBPS)<br>Berat (inc baterai.): 344 g<br>Dimensi: 120 x 67 x 45cm<br>', 7189000, 1, 5, 4),
(5, 'Samsung SCP-2370RH', '7952936_cbc66962-bdd7-47bc-baef-d07cb3e097e3_500_500.jpg', 'High Resolution of 600TV Lines ( Color ), 700TV Lines ( B/W )<br>Min. Illumination 0 Lux @F1.6 (IR LED On),<br>0.2Lux @F1.6 (Color), 0.02Lux (B/W)<br>Powerful 37x Zoom (3.5 ~ 129.5mm), Digital 16x<br>True Day &amp; Night (ICR), MD, SSNR (3D+2D Noise Reduction)<br>IP66, Coaxial Control (Pelco-C), RS-485, 24V AC<br>IR intensity adjustment with zooming in/out ratio<br>', 23790000, 245, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'DSLR'),
(3, 'Action'),
(4, 'Pocket'),
(5, 'Mirrorless'),
(6, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(10) NOT NULL,
  `komentar` text NOT NULL,
  `tgl_komentar` date NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `id_merek` int(10) NOT NULL,
  `nama_merek` varchar(20) NOT NULL,
  `foto_merek` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`id_merek`, `nama_merek`, `foto_merek`) VALUES
(2, 'Nikon', 'download.png'),
(3, 'Canon', 'images_(1).png'),
(4, 'Sony', 'download_(1).png'),
(5, 'Samsung', 'samsung-logo-191-1.jpg'),
(6, 'FujiFilm', 'images.png'),
(7, 'GoPro', 'maxresdefault.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `kode_unik` int(5) NOT NULL,
  `total` int(10) NOT NULL,
  `bayar` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `tgl_transaksi`, `kode_unik`, `total`, `bayar`, `status`) VALUES
(4, 9, '2018-07-27', 226, 3900000, 1, 1),
(7, 8, '2018-07-27', 190, 0, 1, 0),
(8, 8, '2018-07-28', 620, 120750000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat`, `no_hp`, `email`, `password`, `role`) VALUES
(5, 'riza', 'jalan jalan                                                                        ', '55555', 'riza@baqy.com', '8b5a1468ca99337be14f5fa7bbd96fee7f4275989f7002de4fe0799d0ad228c273ad58d8b3c6593c49aa819d66cf9ab2dbf7f66a130299788e75ecab1b6763954A7+916F56t2NTf/EPdixWHOLPjr7xHNGYI91muaV1s=', 'Administrator'),
(6, 'admin', 'admin', '0123456789', 'admin', '90d740d914eb069f73f0770dd7b4cad17d8323fda13506e2419c3854f276fa5f2b2f6d8c114e6f75bf2c8697cd84c5741cac6bbc60b336125e019d79d9f33697FltRrl55jjrgcpSJY0qsULXuTBfGqHwV0WTTUoN3cZ4=', 'Administrator'),
(8, 'awang', 'awang  \r\n                                                                        ', '0123', 'awang@awang.com', '55581a9f544a95257b068175c5b11c41429c22e0477d79833a2a4b5c397420c193522d4680059d5777d89671bf401b7b36ab2fc8163e3db51a759a319c6cd4e5795cofbeTpiqwpN599/Y91oONvKgGM2J880/IRgMup4=', 'Pengguna'),
(9, 'user', 'user													', '0987654321', 'user', 'af7182bd33eb0ed02e9d30c624ab9a6643474c71eea51edbfdef3efef7519cf6eebe4682c5098498827aceb1bf70635e4af2fad25a694d14f8bdaf951c0a2d14rz13rIuOojtTRrxH8o3hEQ5Jq0BZ6THIxojcvTAcm+w=', 'Pengguna');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `kamera`
--
ALTER TABLE `kamera`
  ADD PRIMARY KEY (`id_kamera`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kamera`
--
ALTER TABLE `kamera`
  MODIFY `id_kamera` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `merek`
--
ALTER TABLE `merek`
  MODIFY `id_merek` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
