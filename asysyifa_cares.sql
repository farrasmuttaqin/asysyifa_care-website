-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2019 at 05:08 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asysyifa_cares`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(15) NOT NULL,
  `username` varchar(150) DEFAULT NULL,
  `pass` varchar(150) DEFAULT NULL,
  `nama_lengkap` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `pass`, `nama_lengkap`) VALUES
(1, 'farras', 'md5(\"farras\")', NULL),
(2, 'farras', '27b7597f25f85ef4a8c26443f7a0ebcf', 'farras muttaqin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `id_cart` int(15) NOT NULL,
  `nomor_invoice` int(30) DEFAULT NULL,
  `id_user` int(15) DEFAULT NULL,
  `id_product` int(15) DEFAULT NULL,
  `quantity` int(15) DEFAULT NULL,
  `nama_product` varchar(150) DEFAULT NULL,
  `harga_product` int(30) DEFAULT NULL,
  `gambar_product` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cart`
--

INSERT INTO `tb_cart` (`id_cart`, `nomor_invoice`, `id_user`, `id_product`, `quantity`, `nama_product`, `harga_product`, `gambar_product`, `email`) VALUES
(1, 1, 1, 1, 1, 'Deep Olive', 45000, 'DEEP_OLIVE.png', 'farrasmuttaqin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_comment`
--

CREATE TABLE `tb_comment` (
  `id_comment` int(15) NOT NULL,
  `id_paper` int(15) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `komen` text,
  `tanggal_komen` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_comment`
--

INSERT INTO `tb_comment` (`id_comment`, `id_paper`, `nama`, `komen`, `tanggal_komen`) VALUES
(1, 6, 'farras', 'good blog', '09:46 PM, 2019/09/06'),
(3, 7, 'farras', 'another good blog', '09:49 PM, 2019/09/06'),
(4, 2, 'farras', 'best article ever made', '09:50 PM, 2019/09/06');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE `tb_contact` (
  `id_contact` int(15) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `subject` varchar(150) DEFAULT NULL,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_contact`
--

INSERT INTO `tb_contact` (`id_contact`, `nama`, `email`, `subject`, `message`) VALUES
(1, '12321', 'farrasmuttaqin@gmail.com', '123', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id_invoice` int(15) NOT NULL,
  `id_user` int(15) DEFAULT NULL,
  `status_pembayaran` varchar(100) DEFAULT NULL,
  `nomor_invoice` int(30) DEFAULT NULL,
  `biaya_total` int(30) DEFAULT NULL,
  `biaya_pengiriman` int(30) DEFAULT NULL,
  `status_penerimaan_barang` varchar(150) DEFAULT NULL,
  `alamat_pengiriman` text,
  `kota` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kode_pos` varchar(100) DEFAULT NULL,
  `catatan` text,
  `tanggal_invoice` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id_invoice`, `id_user`, `status_pembayaran`, `nomor_invoice`, `biaya_total`, `biaya_pengiriman`, `status_penerimaan_barang`, `alamat_pengiriman`, `kota`, `provinsi`, `kode_pos`, `catatan`, `tanggal_invoice`) VALUES
(1, 1, 'Belum dibayar', 1, 57250, 10000, '-', 'Jl alexindo no 05', 'Jakarta', 'jawa barat', '17124', 'Tidak ada', '09:09 PM, 2019/09/06');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paper`
--

CREATE TABLE `tb_paper` (
  `id_paper` int(15) NOT NULL,
  `jenis` varchar(150) DEFAULT NULL,
  `tanggal_publish` varchar(150) DEFAULT NULL,
  `judul` varchar(150) DEFAULT NULL,
  `tags` varchar(150) DEFAULT NULL,
  `isi` text,
  `kalimat_pendek` varchar(150) DEFAULT NULL,
  `thumbnail` varchar(150) DEFAULT NULL,
  `nama_pembuat` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_paper`
--

INSERT INTO `tb_paper` (`id_paper`, `jenis`, `tanggal_publish`, `judul`, `tags`, `isi`, `kalimat_pendek`, `thumbnail`, `nama_pembuat`) VALUES
(1, 'Article', '2019/09/06', 'Manfaat Air Putih', 'asysyifa cares', '                                 isi artikel           ', '                                            isi singkat', 'article_airputih.jpg', 'farras muttaqin'),
(2, 'Article', '2019/09/06', 'Manfaat bekam', 'asysyifa cares', '                                            isi bekam ', 'isi singkat bekam                                            ', 'article_bekam.jpg', 'farras muttaqin'),
(3, 'Article', '2019/09/06', 'Manfaat habatussauda', 'asysyifa cares', '                                            isi habatussauda', 'isi singkat habatussauda                                            ', 'article_habbatussauda.jpg', 'farras muttaqin'),
(4, 'Article', '2019/09/06', 'Manfaat madu', 'asysyifa cares', '                                           isi madu  ', 'isi singkat madu                                            ', 'article_madu.jpg', 'farras muttaqin'),
(5, 'Article', '2019/09/06', 'Manfaat Minyak Zaitun', 'asysyifa cares', '                                            minyak', 'minyak                                            ', 'article_minyakzaitun.jpg', 'farras muttaqin'),
(6, 'Blog', '2019/09/06', 'Blog 1', 'asysyifa cares', '                                            isi blog 1', 'isi singkat blog 1                                            ', 'blog_1.jpg', 'farras muttaqin'),
(7, 'Blog', '2019/09/06', 'Blog 2', 'asysyifa cares', '                                            isi blog 2', 'isi singkat blog 2                                            ', 'blog_2.jpg', 'farras muttaqin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_products`
--

CREATE TABLE `tb_products` (
  `id_product` int(15) NOT NULL,
  `nama_product` varchar(100) DEFAULT NULL,
  `harga_product` int(30) DEFAULT NULL,
  `gambar_product` varchar(150) DEFAULT NULL,
  `jenis_product` varchar(150) DEFAULT NULL,
  `stock` int(15) DEFAULT NULL,
  `deskripsi_singkat_product` text,
  `deskripsi_product` text,
  `addinfo_product` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_products`
--

INSERT INTO `tb_products` (`id_product`, `nama_product`, `harga_product`, `gambar_product`, `jenis_product`, `stock`, `deskripsi_singkat_product`, `deskripsi_product`, `addinfo_product`) VALUES
(1, 'Deep Olive', 45000, 'DEEP_OLIVE.png', 'healthy food dan beverage', 10, 'Deskripsi singkat', 'Deskripsi product', 'add info product'),
(2, 'DIABEXTRAC', 60000, 'DIABEXTRAC.png', 'herbs', 10, '                                  DIABEXTRAC          ', 'DIABEXTRAC', 'DIABEXTRAC'),
(3, 'ETTA_GOAT_MILK', 70000, 'ETTA_GOAT_MILK.png', 'cosmetic dan home care', 10, '                                            ETTA_GOAT_MILK', 'ETTA_GOAT_MILK', 'ETTA_GOAT_MILK');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reviews`
--

CREATE TABLE `tb_reviews` (
  `id_review` int(15) NOT NULL,
  `id_product` int(15) DEFAULT NULL,
  `rating` int(15) DEFAULT NULL,
  `id_user` int(15) DEFAULT NULL,
  `reason` varchar(150) DEFAULT NULL,
  `komen` text,
  `tgl_review` varchar(150) DEFAULT NULL,
  `nama_depan_reviewers` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_reviews`
--

INSERT INTO `tb_reviews` (`id_review`, `id_product`, `rating`, `id_user`, `reason`, `komen`, `tgl_review`, `nama_depan_reviewers`) VALUES
(1, 1, 5, 1, 'Quality', 'Produknya bener bener bagus', '06 September 2019', 'farras');

-- --------------------------------------------------------

--
-- Table structure for table `tb_subscribe`
--

CREATE TABLE `tb_subscribe` (
  `id_subscribe` int(15) NOT NULL,
  `email` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_subscribe`
--

INSERT INTO `tb_subscribe` (`id_subscribe`, `email`) VALUES
(1, 'farrasmuttaqin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(15) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nomor_hp` varchar(150) DEFAULT NULL,
  `nama_lengkap` varchar(150) DEFAULT NULL,
  `pass` varchar(150) DEFAULT NULL,
  `hashh` varchar(150) DEFAULT NULL,
  `active` int(15) DEFAULT NULL,
  `awal_join` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `email`, `nomor_hp`, `nama_lengkap`, `pass`, `hashh`, `active`, `awal_join`) VALUES
(1, 'farrasmuttaqin@gmail.com', '081296886565', 'farras', '27b7597f25f85ef4a8c26443f7a0ebcf', 'ad2f6b9145d278b39017ff0740dac8bc', 1, '06/09/2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `fk_id_user` (`id_user`),
  ADD KEY `fk_id_product` (`id_product`);

--
-- Indexes for table `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id_invoice`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_paper`
--
ALTER TABLE `tb_paper`
  ADD PRIMARY KEY (`id_paper`);

--
-- Indexes for table `tb_products`
--
ALTER TABLE `tb_products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `tb_reviews`
--
ALTER TABLE `tb_reviews`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `fk2_id_user` (`id_user`);

--
-- Indexes for table `tb_subscribe`
--
ALTER TABLE `tb_subscribe`
  ADD PRIMARY KEY (`id_subscribe`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `id_cart` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_comment`
--
ALTER TABLE `tb_comment`
  MODIFY `id_comment` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `id_contact` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id_invoice` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_paper`
--
ALTER TABLE `tb_paper`
  MODIFY `id_paper` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_products`
--
ALTER TABLE `tb_products`
  MODIFY `id_product` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_reviews`
--
ALTER TABLE `tb_reviews`
  MODIFY `id_review` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_subscribe`
--
ALTER TABLE `tb_subscribe`
  MODIFY `id_subscribe` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD CONSTRAINT `fk_id_product` FOREIGN KEY (`id_product`) REFERENCES `tb_products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_reviews`
--
ALTER TABLE `tb_reviews`
  ADD CONSTRAINT `fk2_id_user` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_product` FOREIGN KEY (`id_product`) REFERENCES `tb_products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
