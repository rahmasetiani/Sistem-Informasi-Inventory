-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2024 at 02:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: inventori
--

-- --------------------------------------------------------

--
-- Table structure for table barang_keluar
--

CREATE TABLE barang_keluar (
  id int(12) NOT NULL,
  id_transaksi varchar(15) NOT NULL,
  tanggal date NOT NULL,
  kode_barang varchar(10) NOT NULL,
  nama_barang varchar(20) NOT NULL,
  jumlah varchar(10) NOT NULL,
  keterangan varchar(50) NOT NULL,
  satuan varchar(10) NOT NULL,
  kondisibarang varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table barang_keluar
--

INSERT INTO barang_keluar (id, id_transaksi, tanggal, kode_barang, nama_barang, jumlah, keterangan, satuan, kondisibarang) VALUES
(10, 'TRK-231210001', '2023-12-10', 'BAR-2310001', 'Panci', '2', 'Relokasi', 'Unit ', 'Hilang'),
(11, 'TRK-231210002', '2023-12-10', 'BAR-2310001', 'Panci', '1', 'Relokasi', 'Unit ', 'Hilang'),
(12, 'TRK-240117003', '2024-01-17', 'BAR-2310002', 'Wajan', '4', 'Relokasi', 'Unit ', 'Pecah'),
(13, 'TRK-240117004', '2024-01-17', 'BAR-2401011', 'Plastik', '5', '-', 'Buah', 'Terpakai');

--
-- Triggers barang_keluar
--
DELIMITER $$
CREATE TRIGGER barang_keluar AFTER INSERT ON barang_keluar FOR EACH ROW BEGIN
	UPDATE gudang SET jumlah = jumlah-new.jumlah
    WHERE kode_barang=new.kode_barang;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table barang_masuk
--

CREATE TABLE barang_masuk (
  id int(12) NOT NULL,
  id_transaksi varchar(15) NOT NULL,
  tanggal date NOT NULL,
  kode_barang varchar(10) NOT NULL,
  nama_barang varchar(20) NOT NULL,
  pengirim varchar(50) NOT NULL,
  jumlah varchar(10) NOT NULL,
  satuan varchar(10) NOT NULL,
  kondisibarang varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table barang_masuk
--

INSERT INTO barang_masuk (id, id_transaksi, tanggal, kode_barang, nama_barang, pengirim, jumlah, satuan, kondisibarang) VALUES
(35, 'TRM-231210001', '2023-12-10', 'BAR-2310001', 'Panci', 'PT Garudafood Putra Putri Jaya', '3', 'Unit ', 'Pecah'),
(36, 'TRM-231210002', '2023-12-10', 'BAR-2310001', 'Panci', 'PT Kitchen Master Indonesia', '5', 'Unit ', 'Pecah'),
(37, 'TRM-231210003', '2023-12-10', 'BAR-2310001', 'Panci', 'PT Alat Masak Sejahtera', '3', 'Unit ', 'Hilang'),
(38, 'TRM-231210004', '2023-12-10', 'BAR-2310001', 'Panci', 'PT Sentra Bahan Makanan Prima', '3', 'Unit ', 'Hilang'),
(39, 'TRM-240117005', '2024-01-17', 'BAR-2310001', 'Panci', 'PT Mayora Indah', '10', 'Unit ', 'Hilang'),
(40, 'TRM-240117006', '2024-01-17', 'BAR-2310001', 'Panci', 'PT Nestlé Indonesia', '15', 'Unit ', 'Baru'),
(41, 'TRM-240117007', '2024-01-17', 'BAR-2310002', 'Wajan', 'PT Indofood Sukses Makmur', '4', 'Unit ', 'Baru'),
(42, 'TRM-240117008', '2024-01-17', 'BAR-2310002', 'Wajan', 'PT Garudafood Putra Putri Jaya', '4', 'Unit ', 'Baru'),
(44, 'TRM-240117009', '2024-01-17', 'BAR-2310002', 'Wajan', 'PT Alat Masak Sejahtera', '4', 'Unit ', 'Hilang'),
(45, 'TRM-240117010', '2024-01-17', 'BAR-2310001', 'Panci', 'PT Kitchen Master Indonesia', '6', 'Unit ', 'Pecah'),
(46, 'TRM-240117011', '2024-01-17', 'BAR-2310010', 'Mixer', 'PT Kitchen Master Indonesia', '5', 'Unit ', 'Baru'),
(47, 'TRM-240117012', '2024-01-17', 'BAR-2310003', 'Pisau dapur', 'PT Mayora Indah', '10', 'Unit ', 'Baru'),
(48, 'TRM-240117013', '2024-01-17', 'BAR-2310010', 'Mixer', 'PT Mayora Indah', '5', 'Unit ', 'Baru'),
(49, 'TRM-240117014', '2024-01-17', 'BAR-2310003', 'Pisau dapur', 'PT Indofood Sukses Makmur', '5', 'Unit ', 'Baru'),
(50, 'TRM-240117015', '2024-01-17', 'BAR-2310009', 'Rice cooker', 'PT Mayora Indah', '10', 'Unit ', 'Baru'),
(51, 'TRM-240117016', '2024-01-17', 'BAR-2310006', 'Microwave', 'PT Sentra Bahan Makanan Prima', '15', 'Unit ', 'Baru'),
(52, 'TRM-240117017', '2024-01-17', 'BAR-2310001', 'Panci', 'PT Unilever Indonesia', '4', 'Unit ', 'Baru'),
(53, 'TRM-240117018', '2024-01-17', 'BAR-2401011', 'Plastik', 'PT Cuisine Prima', '5', 'Buah', 'Baru');

--
-- Triggers barang_masuk
--
DELIMITER $$
CREATE TRIGGER barang_masuk AFTER INSERT ON barang_masuk FOR EACH ROW BEGIN
	UPDATE gudang SET jumlah = jumlah+new.jumlah
    WHERE kode_barang=new.kode_barang;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table gudang
--

CREATE TABLE gudang (
  id int(12) NOT NULL,
  kode_barang varchar(10) NOT NULL,
  nama_barang varchar(20) NOT NULL,
  jenisbarang varchar(10) NOT NULL,
  jumlah varchar(10) NOT NULL,
  satuan varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table gudang
--

INSERT INTO gudang (id, kode_barang, nama_barang, jenisbarang, jumlah, satuan) VALUES
(18, 'BAR-2310001', 'Panci', 'Alat Masak', '0', 'Unit '),
(19, 'BAR-2310002', 'Wajan', 'Alat Masak', '12', 'Unit '),
(20, 'BAR-2310003', 'Pisau dapur', 'Alat Masak', '15', 'Unit '),
(22, 'BAR-2310005', 'Pengaduk', 'Alat Masak', '10', 'Unit '),
(23, 'BAR-2310006', 'Microwave', 'Peralatan Listrik', '15', 'Unit '),
(24, 'BAR-2310007', 'Oven', 'Alat Masak', '5', 'Unit '),
(25, 'BAR-2310008', 'Blender', 'Peralatan Listrik', '0', 'Unit '),
(26, 'BAR-2310009', 'Rice cooker', 'Peralatan Listrik', '10', 'Unit '),
(27, 'BAR-2310010', 'Mixer', 'Peralatan Listrik', '10', 'Unit '),
(28, 'BAR-2401011', 'Plastik', 'Perangkat Khusus', '0', 'Buah');

-- --------------------------------------------------------

--
-- Table structure for table jenisbarang
--

CREATE TABLE jenisbarang (
  id int(12) NOT NULL,
  jenisbarang varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table jenisbarang
--

INSERT INTO jenisbarang (id, jenisbarang) VALUES
(8, 'Alat Masak'),
(9, 'Peralatan Listrik'),
(10, 'Perangkat Penyimpanan'),
(11, 'Perangkat Kecil'),
(12, 'Peralatan Memasak'),
(13, 'Peralatan untuk Persiapan Makanan'),
(14, 'Bahan Makanan dan Bumbu'),
(15, 'Perangkat Keamanan dan Kebersihan'),
(16, 'Perangkat Khusus'),
(17, 'Perangkat Pengukur');

-- --------------------------------------------------------

--
-- Table structure for table kondisibarang
--

CREATE TABLE kondisibarang (
  id int(12) NOT NULL,
  kondisibarang varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table kondisibarang
--

INSERT INTO kondisibarang (id, kondisibarang) VALUES
(1, 'Rusak'),
(20, 'Baru'),
(21, 'Terpakai');

-- --------------------------------------------------------

--
-- Table structure for table satuan
--

CREATE TABLE satuan (
  id int(12) NOT NULL,
  satuan varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table satuan
--

INSERT INTO satuan (id, satuan) VALUES
(10, 'Liter (L)'),
(11, 'Kilogram (kg)'),
(12, 'Ons (oz)'),
(13, 'Unit '),
(14, 'Karton'),
(15, 'Lusin'),
(16, 'Box'),
(17, 'Bar'),
(18, 'Pallet'),
(19, 'Buah');

-- --------------------------------------------------------

--
-- Table structure for table tb_supplier
--

CREATE TABLE tb_supplier (
  id int(12) NOT NULL,
  kode_supplier varchar(10) NOT NULL,
  nama_supplier varchar(20) NOT NULL,
  alamat varchar(50) NOT NULL,
  telepon varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table tb_supplier
--

INSERT INTO tb_supplier (id, kode_supplier, nama_supplier, alamat, telepon) VALUES
(14, 'SUP-2310005', 'PT Kitchen Master Indonesia', 'Jakarta Selatan', '081567672323'),
(15, 'SUP-2310006', 'PT Dapur Berkah Utama', 'Jakarta Barat', '081297976565'),
(16, 'SUP-2310007', 'PT Alat Masak Sejahtera', 'Jakarta Utara', '086765643234'),
(17, 'SUP-2310008', 'PT Cookware Terbaik', 'Jakarta Timur', '087743436278'),
(18, 'SUP-2310009', 'PT Cuisine Prima', 'Tanggerang Selatan', '087623436784'),
(19, 'SUP-2310010', 'PT Sentra Bahan Makanan Prima', 'Bogor', '086734231234'),
(20, 'SUP-2310011', 'PT Indofood Sukses Makmur', 'Jakarta Selatan', '087766332211'),
(21, 'SUP-2310012', 'PT Mayora Indah', 'Bekasi', '088237862354'),
(22, 'SUP-2310013', 'PT Garudafood Putra Putri Jaya', 'Bandung', '089256743564'),
(23, 'SUP-2310014', 'PT Unilever Indonesia', 'Semarang', '081123643453'),
(24, 'SUP-2310015', 'PT Nestlé Indonesia', 'Makasar', '084532732334');

-- --------------------------------------------------------

--
-- Table structure for table users
--

CREATE TABLE users (
  id int(12) NOT NULL,
  nik varchar(12) NOT NULL,
  nama varchar(20) NOT NULL,
  alamat varchar(50) NOT NULL,
  telepon varchar(13) NOT NULL,
  username varchar(20) NOT NULL,
  password varchar(10) NOT NULL,
  level varchar(25) NOT NULL DEFAULT 'member',
  foto varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table users
--

INSERT INTO users (id, nik, nama, alamat, telepon, username, password, level, foto) VALUES
(18, '1900120001', 'Rahma Superadmin', '', '0811228890', 'Rahma ', 'superadmin', 'superadmin', 'superadmin.jpg'),
(24, '1900120012', 'Rahma Admin', '', '085546982020', 'Rahma ', 'admin', 'admin', 'admin.jpg'),
(26, '3302036008', 'Jessica', '', '08156893103', 'Jessica', 'Superadmin', 'superadmin', 'jessica.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table barang_keluar
--
ALTER TABLE barang_keluar
  ADD PRIMARY KEY (id);

--
-- Indexes for table barang_masuk
--
ALTER TABLE barang_masuk
  ADD PRIMARY KEY (id);

--
-- Indexes for table gudang
--
ALTER TABLE gudang
  ADD PRIMARY KEY (id);

--
-- Indexes for table jenisbarang
--
ALTER TABLE jenisbarang
  ADD PRIMARY KEY (id);

--
-- Indexes for table kondisibarang
--
ALTER TABLE kondisibarang
  ADD PRIMARY KEY (id);

--
-- Indexes for table satuan
--
ALTER TABLE satuan
  ADD PRIMARY KEY (id);

--
-- Indexes for table tb_supplier
--
ALTER TABLE tb_supplier
  ADD PRIMARY KEY (id);

--
-- Indexes for table users
--
ALTER TABLE users
  ADD PRIMARY KEY (id);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table barang_keluar
--
ALTER TABLE barang_keluar
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table barang_masuk
--
ALTER TABLE barang_masuk
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table gudang
--
ALTER TABLE gudang
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table jenisbarang
--
ALTER TABLE jenisbarang
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table kondisibarang
--
ALTER TABLE kondisibarang
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table satuan
--
ALTER TABLE satuan
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table tb_supplier
--
ALTER TABLE tb_supplier
  MODIFY id int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table users
--
ALTER TABLE users
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;