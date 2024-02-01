-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 03:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pecellele`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id_pembayar` int(11) NOT NULL,
  `nama_pembayar` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `ygdipesan` text NOT NULL,
  `jumlah_bayar` int(30) NOT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_produk` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `Jumlah` int(255) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `harga` int(20) NOT NULL,
  `status` enum('belum_dipesan','belum_dibayar','dikemas','dikirim','selesai') DEFAULT 'belum_dipesan',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbkategori`
--

CREATE TABLE `tbkategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbkategori`
--

INSERT INTO `tbkategori` (`id`, `nama`) VALUES
(1, 'Ayam'),
(2, 'Kambing'),
(3, 'Kepiting'),
(4, 'Cumi'),
(5, 'Udang'),
(6, 'Sayur'),
(7, 'Ikan'),
(8, 'Minuman'),
(9, 'lele'),
(10, 'Sapi'),
(11, 'Bebek'),
(12, 'Mie'),
(13, 'Nasi');

-- --------------------------------------------------------

--
-- Table structure for table `tbkomen`
--

CREATE TABLE `tbkomen` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `wa` text NOT NULL,
  `komen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbproduk`
--

CREATE TABLE `tbproduk` (
  `id` int(11) NOT NULL,
  `id_kategori` int(4) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `harga` int(20) NOT NULL,
  `stok` int(20) NOT NULL,
  `gambar` varchar(40) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbproduk`
--

INSERT INTO `tbproduk` (`id`, `id_kategori`, `nama`, `harga`, `stok`, `gambar`, `deskripsi`) VALUES
(7, 0, 'sate kambing', 38000, 45, 'satekambing.jpg', 'Sate dengan daging kambing yang memiliki tekstur yang lembut dan dengan bumbu Nusantara'),
(8, 1, 'Sup Daging Kambing ', 42000, 22, 'supdagingkambing.jpg', 'Daging Kambing yang empuk dengan olahan bumbu halus khas '),
(9, 1, 'Ayam Goreng Mentega ', 31000, 20, 'ayamgorengmentega.jpg', 'Ayam yang diolah dengan cara di presto bercampur dengan bumbu dan mentega yang empuk dan nikmat'),
(10, 1, 'Ayam Teriyaki', 34000, 29, 'ayamteriyaki.jpg', 'Masakan ayam dengan bumbu teriyaki khas Jepang yang enak dan lezat, menggunakan saus spesial khas negara sakura yang dicampur dengan bumbu khas dan daging ayam serta memiliki cita rasa manis.'),
(11, 1, 'Ayam Panggang', 370000, 15, 'ayampanggang.jpg', 'Ayam yang di panggang di atas api, dan memiliki tekstur yang lembut dilengkapi dengan olahan bumbu bakar yang sangat lezat'),
(12, 3, 'Kepiting Saus Tiram ', 49000, 10, 'kepitingsaustiram.jpg', 'Makanan laut yang berasal dari Tiongkok dengan saus tiram yang lezat dan nikmat diolah dengan cara di presto dan ditumis'),
(13, 6, 'Lodeh Kepiting', 44000, 7, 'lodehkepiting.jpg', 'Lodeh Kepiting yang menggunakan bumbu khas Nusantara dan di tongseng kemudian di tumis yang memberikan cita rasa '),
(14, 4, 'Sate Cumi Saus ', 39000, 6, 'satecumisausmerah.jpg', 'Cumi yang dicincang lalu dibaluri bumbu merah khas Gorontalo kemudian dibakar yang memberikan rasa nikmat dan lezat'),
(15, 4, 'Cumi Bumbu Kari', 48000, 13, 'cumibumbukari.jpg', 'Diolah menggunakan bumbu rempah kari dengan perpaduan rasa yang manis pedas dan asam yang sangat nikmat'),
(16, 5, 'Laksa Udang', 52000, 7, 'laksaudang.jpg', 'Makanan yang diolah dengan cara di presto yang memiliki cita rasa pedas asam manis gurih dengan campuran salad sayur'),
(17, 5, 'Udang Saus Padang ', 57000, 10, 'udangsauspadang.jpg', 'Udang dengan bumbu khas Padang yang memiliki tekstur lembut dan rasa yang enak'),
(18, 5, 'Pasta Udang', 50000, 15, 'pastaudang.jpg', 'Pasta yang menggunakan keju dan bumbu yang asin pedas manis dan dengan citarasa yang lezat'),
(19, 6, 'Salad Sayur ', 23000, 27, 'saladsayur.jpg', 'Dengan beragam sayuran sehat dan segar, diolah menjadi salad yang enak dan lezat'),
(20, 6, 'Salad Vegetarian Khas Malang', 58000, 17, 'saladvegetariankhasmalang.jpg', 'Makanan vegetarian yang memiliki tekstur yang creamy dan cita rasa yang beragam dan tentunya sangat sehat.'),
(21, 1, 'Iga Bakar ', 54000, 30, 'igabakar.jpg', 'Hidangan yang berasal dari Indonesia terbuat dari sapi yang dipanggang dan mempunyai taste rasa yang enak.\r\n'),
(22, 1, 'Ikan Nila Goreng', 31000, 50, 'ikannilagoreng.jpg', 'Ikan air tawar yang digoreng menggunakan olahan cabai dan bumbu yang enak, dengan olahan daging yang dimasak sampai empuk.\r\n'),
(23, 7, 'Ikan Patin Bumbu Kuning', 36000, 20, 'ikannilagoreng.jpg', 'Dimasak dengan bumbu khas Manado yang memberikan kesan khas Nusantara dan tekstur rasa yang enak.\r\n'),
(24, 11, 'Bebek Goreng Bumbu Kecap', 48000, 15, 'bebekgorengbumbukecap.jpg', 'Hidangan yang dibuat dengan bumbu kecap dan rasa yang enak.'),
(25, 7, 'Pempek', 7000, 500, 'pempek.jpg', 'Makanan khas Palembang, Makanan ini terbuat dari bahan dasar sagu dan ikan.'),
(26, 12, 'Mie Aceh', 18000, 125, 'mieaceh.jpg', 'Masakan mie pedas khas Aceh di Indonesia. Mie kuning tebal dengan irisan daging sapi, daging kambing, atau makanan laut (udang dan cumi) disajikan dalam sup sejenis kari yang gurih dan pedas.'),
(27, 13, 'Nasi Goreng', 22000, 100, 'nasigoreng.jpg', 'Nasi yang diolah dengan cara digoreng menggunakan bumbu dapur seperti bawang, cabai, dan lain-lain.');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `namauser` varchar(50) NOT NULL,
  `level` enum('pembeli','penjual','admin') DEFAULT 'pembeli',
  `user_role` enum('belum_dipesan','belum_dibayar','sedang_diproses','dikirim','selesai') DEFAULT 'belum_dipesan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`id`, `nama`, `email`, `password`, `namauser`, `level`, `user_role`) VALUES
(10, 'pembeli', 'pembeli123@gmail.com', '$2y$10$ZwMf6e5cRbC7HRmFBtQD.u1nL7RiWFlXtaOHQCpPWGWIvXlUbVUaG', 'pembeli', 'pembeli', 'belum_dipesan'),
(11, 'penjual', 'penjual@gmail.com', '$2y$10$1wp8sFdsl8VqJv4/6WtchOzF87tmHN88iwFXv6fR0eF6xSTM4riFi', 'penjual', 'penjual', 'belum_dipesan'),
(12, 'admin', 'admin@gmail.com', '$2y$10$whrORGKK4k5B/NlO1pEAJegtdLap.X28JTY7QjScSLG9t019pyBxa', 'admin', 'admin', 'belum_dipesan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_pembayar`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tbkategori`
--
ALTER TABLE `tbkategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbkomen`
--
ALTER TABLE `tbkomen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbproduk`
--
ALTER TABLE `tbproduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `id_pembayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbkategori`
--
ALTER TABLE `tbkategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbkomen`
--
ALTER TABLE `tbkomen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbproduk`
--
ALTER TABLE `tbproduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
