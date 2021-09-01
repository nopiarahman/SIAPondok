-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Agu 2021 pada 21.41
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siapondok`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `santriwustha`
--

CREATE TABLE `santriwustha` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaLengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaPanggilan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempatLahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalLahir` date NOT NULL,
  `jk` enum('Laki laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `anakKe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bahasaKeseharian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Indonesia',
  `golonganDarah` enum('A','B','AB','O') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penyakit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Tidak ada',
  `baju` enum('XS','S','M','L','XL','XXL') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekolahSebelum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamatSekolahSebelum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nisnSekolahSebelum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namaAyah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaPanggilanAyah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikanAyah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggalLahirAyah` date DEFAULT NULL,
  `pekerjaanAyah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamatAyah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penghasilanAyah` int(11) NOT NULL,
  `teleponAyah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailAyah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namaIbu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaPanggilanIbu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempatLahirIbu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggalLahirIbu` date DEFAULT NULL,
  `pendidikanIbu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaanIbu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamatIbu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilanIbu` int(11) DEFAULT NULL,
  `teleponIbu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emailIbu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namaWali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaPanggilanWali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempatLahirWali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggalLahirWali` date DEFAULT NULL,
  `pendidikanWali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaanWali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamatWali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penghasilanWali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teleponWali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailWali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pasPhoto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suratWaliSantri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelas_id` bigint(20) DEFAULT 1,
  `kelastahfidz_id` bigint(20) DEFAULT 1,
  `jenjang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `santriwustha`
--

INSERT INTO `santriwustha` (`id`, `namaLengkap`, `namaPanggilan`, `tempatLahir`, `tanggalLahir`, `jk`, `anakKe`, `bahasaKeseharian`, `golonganDarah`, `penyakit`, `baju`, `sekolahSebelum`, `alamatSekolahSebelum`, `nisnSekolahSebelum`, `namaAyah`, `namaPanggilanAyah`, `pendidikanAyah`, `tanggalLahirAyah`, `pekerjaanAyah`, `alamatAyah`, `penghasilanAyah`, `teleponAyah`, `emailAyah`, `namaIbu`, `namaPanggilanIbu`, `tempatLahirIbu`, `tanggalLahirIbu`, `pendidikanIbu`, `pekerjaanIbu`, `alamatIbu`, `penghasilanIbu`, `teleponIbu`, `emailIbu`, `namaWali`, `namaPanggilanWali`, `tempatLahirWali`, `tanggalLahirWali`, `pendidikanWali`, `pekerjaanWali`, `alamatWali`, `penghasilanWali`, `teleponWali`, `emailWali`, `pasPhoto`, `suratWaliSantri`, `kelas_id`, `kelastahfidz_id`, `jenjang`, `angkatan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nopi Arahman', 'Nopi', 'Jambi', '0000-00-00', 'Laki laki', '3', NULL, 'A', NULL, 'XS', 'SMA 3', 'Jelutung', '3535', 'Paijo', NULL, 'SMP', '0000-00-00', 'Tani', 'Pal Merah', 3000000, '8345341434', NULL, 'Waginah', NULL, 'Semarang', NULL, 'SD', NULL, NULL, NULL, '82345324532', NULL, 'Paijo', NULL, NULL, NULL, NULL, 'Tani', 'Pondok Meja', '3500000', '8345234534', NULL, 'public/file/wustha/pasphoto/mnz3DeVlRWLUCaWyc930nrSqiP9unV8EdSOTM5wD.jpeg', 'public/file/wustha/suratWaliSantri/lspDjBcIJDbhPnSAIlYmwAdwWAW7HeOmK2r41skR.pdf', 3, 1, 'smpPutra', '2019', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Anjas Ferdian', 'Anjas', 'Jambi', '0000-00-00', 'Laki laki', '3', 'Medan', 'AB', NULL, 'M', 'SMA 2', 'Jelutung', '3535', 'Ngarsi', NULL, 'sd', '0000-00-00', 'Tani', 'Pondok Meja', 1500000, '8345341434', NULL, 'Waginah', NULL, 'Pati', '0000-00-00', 'SD', NULL, NULL, NULL, '85623435124', NULL, 'Ngarsi', NULL, NULL, NULL, NULL, 'Tani', 'Pondok Meja', '3500000', '8345234534', NULL, 'public/file/wustha/pasphoto/IJx4djSQ6cuau5LLj2ueQIE9tIu7BrCdOXUJDiVV.png', '', 3, 6, 'smpPutra', '2019', 'Aktif', '0000-00-00 00:00:00', '2021-04-06 17:59:05'),
(3, 'Sri Nurjannah', 'Jannah', 'Jambi', '0000-00-00', 'Laki laki', '3', 'Medan', 'O', NULL, 'L', 'SMA 3', 'Jelutung', '3535', 'Adi Septianto', 'Adi', 'SMP', '0000-00-00', 'Tani', 'Pal Merah', 1500000, '8345341434', 'adi@gmail.com', 'Hafsah', 'Ummu Jannah', 'Semarang', '0000-00-00', 'SD', 'URT', 'Pal Merah', 750000, '82345324532', 'ummujannah@gmail.com', 'Adi Septianto', 'Abu Fadhil', 'Jambi', '0000-00-00', 'D-3 Agrobisnis', 'Tani', 'Pal Merah', '3500000', '8345234534', 'abufadhil@gmail.com', '', '', 16, 1, 'smpPutra', '2019', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Fadhil Muzzafar', 'Fadhil', 'Jambi', '0000-00-00', 'Laki laki', '1', 'Jawa', 'B', NULL, 'S', 'SD N 2', 'Jelutung', '3452345', 'Slamet', NULL, 'D3', '0000-00-00', 'Tani', 'Pondok Meja', 3000000, '82376594686', 'slamet@gmail.com', 'Waginem', NULL, 'Klaten', '0000-00-00', 'S1', 'URT', 'Pondok Meja', NULL, '81245672345', NULL, 'Slamet', NULL, NULL, NULL, NULL, 'Wiraswasta', 'Simpang Rimbo', '2000000', '82398768647', 'ridhohermawansyah@gmail.com', '', '', 3, 1, 'smpPutra', '2019', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'AFIF NUR RAHMAN', 'AFIF', 'JAMBI', '0000-00-00', 'Laki laki', '1', NULL, 'AB', NULL, 'M', 'SD N 52', 'Kota Jambi', '23402042022', 'BAKHTIAR', NULL, 'SMA', '0000-00-00', 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', 3500000, '85698761545', NULL, 'NOVRIANI', NULL, 'Jambi', NULL, 'SMP', NULL, NULL, NULL, '896442123221', NULL, 'BAKHTIAR', 'Abu Kasim', 'Jambi', '0000-00-00', NULL, 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', '5000000', '82547851141', 'abukasim@gmail.com', 'public/file/wustha/pasphoto/ITEcheCuViRmNHWB7bekiXR1jT9AkTQUCD0SYaA5.png', '', 16, 6, 'smpPutra', '2019', 'aktif', '0000-00-00 00:00:00', '2021-01-22 11:41:30'),
(6, 'ABDUL MALIK KARIM AMRULLAH', 'ABDUL MALIK', 'JAMBI', '0000-00-00', 'Laki laki', '1', NULL, 'AB', NULL, 'M', 'SD N 52', 'Kota Jambi', '23402042022', 'AHMAD SAHID ', NULL, 'SMA', '0000-00-00', 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', 3500000, '85698761545', NULL, 'NOVRIANI', NULL, 'Jambi', NULL, 'SMP', NULL, NULL, NULL, '896442123221', NULL, 'AHMAD SAHID ', 'Abu Kasim', 'Jambi', '0000-00-00', NULL, 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', '5000000', '82547851141', 'ahmadsahid@gmail.com', '', '', 16, 6, 'smpPutra', '2020', 'aktif', '0000-00-00 00:00:00', '2021-01-22 11:41:26'),
(7, 'ABDURRAHMAN MILZAM IBRAHIM', 'Ibrahim', 'JAMBI', '0000-00-00', 'Laki laki', '1', NULL, 'AB', NULL, 'M', 'SD N 52', 'Kota Jambi', '23402042022', 'Azwarman', NULL, 'SMA', '0000-00-00', 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', 3500000, '85698761545', NULL, 'NOVRIANI', NULL, 'Jambi', NULL, 'SMP', NULL, NULL, NULL, '896442123221', NULL, 'Azwarman', 'Abu Kasim', 'Jambi', '0000-00-00', NULL, 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', '5000000', '82547851141', 'azwarman@gmail.com', '', '', 3, 6, 'smpPutra', '2019', 'aktif', '0000-00-00 00:00:00', '2021-01-22 11:41:28'),
(8, 'AHLAM HARIMAN SHALEH', 'Ahlam', 'JAMBI', '0000-00-00', 'Laki laki', '1', NULL, 'AB', NULL, 'M', 'SD N 52', 'Kota Jambi', '23402042022', 'Efendy', NULL, 'SMA', '0000-00-00', 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', 3500000, '85698761545', NULL, 'NOVRIANI', NULL, 'Jambi', NULL, 'SMP', NULL, NULL, NULL, '896442123221', NULL, 'Efendy', 'Abu Kasim', 'Jambi', '0000-00-00', NULL, 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', '5000000', '82547851141', 'efendy@gmail.com', '', '', 16, 6, 'smpPutra', '2019', 'aktif', '0000-00-00 00:00:00', '2021-01-22 11:41:35'),
(9, 'AHMAD ARIEL ARAHMAN AK.', 'Ariel', 'JAMBI', '0000-00-00', 'Laki laki', '1', NULL, 'AB', NULL, 'M', 'SD N 52', 'Kota Jambi', '23402042022', 'M Yakub', NULL, 'SMA', '0000-00-00', 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', 3500000, '85698761545', NULL, 'NOVRIANI', NULL, 'Jambi', NULL, 'SMP', NULL, NULL, NULL, '896442123221', NULL, 'M Yakub', 'Abu Kasim', 'Jambi', '0000-00-00', NULL, 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', '5000000', '82547851141', 'yakub@gmail.com', '', '', 3, 6, 'smpPutra', '2019', 'aktif', '0000-00-00 00:00:00', '2021-01-22 11:41:33'),
(10, 'AHMED YASIN MIZWAR', 'Ahmed', 'JAMBI', '0000-00-00', 'Laki laki', '1', NULL, 'AB', NULL, 'M', 'SD N 52', 'Kota Jambi', '23402042022', 'Afnal M Bareno', NULL, 'SMA', '0000-00-00', 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', 3500000, '85698761545', NULL, 'NOVRIANI', NULL, 'Jambi', NULL, 'SMP', NULL, NULL, NULL, '896442123221', NULL, 'Afnal M Bareno', 'Abu Kasim', 'Jambi', '0000-00-00', NULL, 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', '5000000', '82547851141', 'afnal@gmail.com', '', '', 12, 6, 'smpPutra', '2019', 'aktif', '0000-00-00 00:00:00', '2021-01-22 11:41:38'),
(11, 'ARIEL JUANDA PRATAMA', 'Ariel', 'JAMBI', '0000-00-00', 'Laki laki', '1', NULL, 'AB', NULL, 'M', 'SD N 52', 'Kota Jambi', '23402042022', 'Yurnalis', NULL, 'SMA', '0000-00-00', 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', 3500000, '85698761545', NULL, 'NOVRIANI', NULL, 'Jambi', NULL, 'SMP', NULL, NULL, NULL, '896442123221', NULL, 'Yurnalis', 'Abu Kasim', 'Jambi', '0000-00-00', NULL, 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', '5000000', '82547851141', 'yurnalis@gmail.com', '', '', 12, 6, 'smpPutra', '2019', 'aktif', '0000-00-00 00:00:00', '2021-01-22 11:41:50'),
(12, 'DAMA HERDIAN WIJANARKO', 'Dama', 'JAMBI', '0000-00-00', 'Laki laki', '1', NULL, 'AB', NULL, 'M', 'SD N 52', 'Kota Jambi', '23402042022', 'Bambang Wijanarko', NULL, 'SMA', '0000-00-00', 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', 3500000, '85698761545', NULL, 'NOVRIANI', NULL, 'Jambi', NULL, 'SMP', NULL, NULL, NULL, '896442123221', NULL, 'Bambang Wijanarko', 'Abu Kasim', 'Jambi', '0000-00-00', NULL, 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', '5000000', '82547851141', 'bambangwijanarko@gmail.com', '', '', 12, 1, 'smpPutra', '2019', 'aktif', '0000-00-00 00:00:00', '2020-09-08 02:13:54'),
(13, 'DAVID PRATAMA', 'David', 'JAMBI', '0000-00-00', 'Laki laki', '1', NULL, 'AB', NULL, 'M', 'SD N 52', 'Kota Jambi', '23402042022', 'Saidi', NULL, 'SMA', '0000-00-00', 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', 3500000, '85698761545', NULL, 'NOVRIANI', NULL, 'Jambi', NULL, 'SMP', NULL, NULL, NULL, '896442123221', NULL, 'Saidi', 'Abu Kasim', 'Jambi', '0000-00-00', NULL, 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', '5000000', '82547851141', 'saidi@gmail.com', '', '', 3, 1, 'smpPutra', '2019', 'aktif', '0000-00-00 00:00:00', '2020-09-08 02:14:00'),
(14, 'DIAZ AKBAR RIANTO', 'Diaz', 'JAMBI', '0000-00-00', 'Laki laki', '1', NULL, 'AB', NULL, 'M', 'SD N 52', 'Kota Jambi', '23402042022', 'Mulyo Rianto', NULL, 'SMA', '0000-00-00', 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', 3500000, '85698761545', NULL, 'NOVRIANI', NULL, 'Jambi', NULL, 'SMP', NULL, NULL, NULL, '896442123221', NULL, 'Mulyo Rianto', 'Abu Kasim', 'Jambi', '0000-00-00', NULL, 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', '5000000', '82547851141', 'mulyorianto@gmail.com', '', '', 16, 1, 'smpPutra', '2019', 'aktif', '0000-00-00 00:00:00', '2020-09-08 02:14:11'),
(15, 'DIO AKBAR RIANTO', 'Dio', 'JAMBI', '0000-00-00', 'Laki laki', '1', NULL, 'AB', NULL, 'M', 'SD N 52', 'Kota Jambi', '23402042022', 'Mulyo Rianto', NULL, 'SMA', '0000-00-00', 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', 3500000, '85698761545', NULL, 'NOVRIANI', NULL, 'Jambi', NULL, 'SMP', NULL, NULL, NULL, '896442123221', NULL, 'Mulyo Rianto', 'Abu Kasim', 'Jambi', '0000-00-00', NULL, 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', '5000000', '82547851141', 'mulyorianto2@gmail.com', '', '', 16, 1, 'smpPutra', '2020', 'aktif', '0000-00-00 00:00:00', '2020-09-08 02:13:38'),
(16, 'DUTA ERLANGGA RIZAL', 'Duta', 'JAMBI', '0000-00-00', 'Laki laki', '1', NULL, 'AB', NULL, 'M', 'SD N 52', 'Kota Jambi', '23402042022', 'Busrizal', NULL, 'SMA', '0000-00-00', 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', 3500000, '85698761545', NULL, 'NOVRIANI', NULL, 'Jambi', NULL, 'SMP', NULL, NULL, NULL, '896442123221', NULL, 'Busrizal', 'Abu Kasim', 'Jambi', '0000-00-00', NULL, 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', '5000000', '82547851141', 'busrizal@gmail.com', '', '', 3, 1, 'smpPutra', '2020', 'aktif', '0000-00-00 00:00:00', '2020-09-08 02:14:20'),
(17, 'FAUZAN RAHMA DINO', 'Fauzan', 'JAMBI', '0000-00-00', 'Laki laki', '1', NULL, 'AB', NULL, 'M', 'SD N 52', 'Kota Jambi', '23402042022', 'Dino Rizal', NULL, 'SMA', '0000-00-00', 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', 3500000, '85698761545', NULL, 'NOVRIANI', NULL, 'Jambi', NULL, 'SMP', NULL, NULL, NULL, '896442123221', NULL, 'Dino Rizal', 'Abu Kasim', 'Jambi', '0000-00-00', NULL, 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', '5000000', '82547851141', 'dinorizal@gmail.com', '', '', 3, 1, 'smpPutra', '2020', 'aktif', '0000-00-00 00:00:00', '2020-09-08 02:14:32'),
(18, 'HABIB RIFQIY', 'Habib', 'JAMBI', '0000-00-00', 'Laki laki', '1', NULL, 'AB', NULL, 'M', 'SD N 52', 'Kota Jambi', '23402042022', 'M Fahrizal', NULL, 'SMA', '0000-00-00', 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', 3500000, '85698761545', NULL, 'NOVRIANI', NULL, 'Jambi', NULL, 'SMP', NULL, NULL, NULL, '896442123221', NULL, 'M Fahrizal', 'Abu Kasim', 'Jambi', '0000-00-00', NULL, 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', '5000000', '82547851141', 'mfahrizal@gmail.com', '', '', 16, 1, 'smpPutra', '2020', 'aktif', '0000-00-00 00:00:00', '2020-09-08 02:15:14'),
(19, 'Bayu Satriya Pamungkas', 'Bayu', 'JAMBI', '0000-00-00', 'Laki laki', '1', NULL, 'AB', NULL, 'M', 'SD N 52', 'Kota Jambi', '23402042022', 'Candra Afrian', NULL, 'SMA', '0000-00-00', 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', 3500000, '85698761545', NULL, 'NOVRIANI', NULL, 'Jambi', NULL, 'SMP', NULL, NULL, NULL, '896442123221', NULL, 'Candra Afrian', 'Abu Kasim', 'Jambi', '0000-00-00', NULL, 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', '5000000', '82547851141', 'candraafrian@gmail.com', '', '', 12, 1, 'smpPutra', '2020', 'aktif', '0000-00-00 00:00:00', '2020-09-08 02:13:46'),
(20, 'Edi Purwanto Wibowo', 'Edi', 'JAMBI', '0000-00-00', 'Laki laki', '1', NULL, 'AB', NULL, 'M', 'SD N 52', 'Kota Jambi', '23402042022', 'Gilang Wibisono', NULL, 'SMA', '0000-00-00', 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', 3500000, '85698761545', NULL, 'NOVRIANI', NULL, 'Jambi', NULL, 'SMP', NULL, NULL, NULL, '896442123221', NULL, 'Gilang Wibisono', 'Abu Kasim', 'Jambi', '0000-00-00', NULL, 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', '5000000', '82547851141', 'gilang@gmail.com', '', '', 12, 1, 'smpPutra', '2020', 'aktif', '0000-00-00 00:00:00', '2020-09-08 02:14:27'),
(21, 'Deni Rudianto', 'Deni', 'JAMBI', '0000-00-00', 'Laki laki', '1', NULL, 'AB', NULL, 'M', 'SD N 52', 'Kota Jambi', '23402042022', 'Satrio Wisnu', NULL, 'SMA', '0000-00-00', 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', 3500000, '85698761545', NULL, 'NOVRIANI', NULL, 'Jambi', NULL, 'SMP', NULL, NULL, NULL, '896442123221', NULL, 'Satrio Wisnu', 'Abu Kasim', 'Jambi', '0000-00-00', NULL, 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', '5000000', '82547851141', 'satriowisnu@gmail.com', '', '', 16, 1, 'smpPutra', '2020', 'aktif', '0000-00-00 00:00:00', '2020-09-08 02:14:06'),
(22, 'Firmansyah', 'Firman', 'JAMBI', '0000-00-00', 'Laki laki', '1', NULL, 'AB', NULL, 'M', 'SD N 52', 'Kota Jambi', '23402042022', 'Andi Nassatiawan', NULL, 'SMA', '0000-00-00', 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', 3500000, '85698761545', NULL, 'NOVRIANI', NULL, 'Jambi', NULL, 'SMP', NULL, NULL, NULL, '896442123221', NULL, 'Andi Nassatiawan', 'Abu Kasim', 'Jambi', '0000-00-00', NULL, 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', '5000000', '82547851141', 'andi@gmail.com', '', '', 16, 1, 'smpPutra', '2020', 'aktif', '0000-00-00 00:00:00', '2020-09-08 02:15:09'),
(23, 'Praditya', 'Adit', 'JAMBI', '0000-00-00', 'Laki laki', '1', NULL, 'AB', NULL, 'M', 'SD N 52', 'Kota Jambi', '23402042022', 'A Syahrial', NULL, 'SMA', '0000-00-00', 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', 3500000, '85698761545', NULL, 'NOVRIANI', NULL, 'Jambi', NULL, 'SMP', NULL, NULL, NULL, '896442123221', NULL, 'A Syahrial', 'Abu Kasim', 'Jambi', '0000-00-00', NULL, 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', '5000000', '82547851141', 'syahrial@gmail.com', '', '', 16, 1, 'smpPutra', '2020', 'aktif', '0000-00-00 00:00:00', '2020-09-08 02:15:36'),
(24, 'Andre Prasetyo', 'Andre', 'JAMBI', '0000-00-00', 'Laki laki', '1', NULL, 'AB', NULL, 'M', 'SD N 52', 'Kota Jambi', '23402042022', 'Sapto Hadi', NULL, 'SMA', '0000-00-00', 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', 3500000, '85698761545', NULL, 'NOVRIANI', NULL, 'Jambi', NULL, 'SMP', NULL, NULL, NULL, '896442123221', NULL, 'Sapto Hadi', 'Abu Kasim', 'Jambi', '0000-00-00', NULL, 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', '5000000', '82547851141', 'saptohadi@gmail.com', '', '', 12, 6, 'smpPutra', '2020', 'aktif', '0000-00-00 00:00:00', '2021-01-22 11:41:42'),
(25, 'Ariyanto', 'Yanto', 'JAMBI', '0000-00-00', 'Laki laki', '1', NULL, 'AB', NULL, 'M', 'SD N 52', 'Kota Jambi', '23402042022', 'Ria Destiana', NULL, 'SMA', '0000-00-00', 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', 3500000, '85698761545', NULL, 'NOVRIANI', NULL, 'Jambi', NULL, 'SMP', NULL, NULL, NULL, '896442123221', NULL, 'Ria Destiana', 'Abu Kasim', 'Jambi', '0000-00-00', NULL, 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', '5000000', '82547851141', 'riadestiana@gmail.com', '', '', 3, 1, 'smpPutra', '2020', 'aktif', '0000-00-00 00:00:00', '2020-09-08 02:10:49'),
(26, 'Juanda Nasa Putra', 'Juanda', 'JAMBI', '0000-00-00', 'Laki laki', '1', NULL, 'AB', NULL, 'M', 'SD N 52', 'Kota Jambi', '23402042022', 'Nasa Bahtiar', NULL, 'SMA', '0000-00-00', 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', 3500000, '85698761545', NULL, 'NOVRIANI', NULL, 'Jambi', NULL, 'SMP', NULL, NULL, NULL, '896442123221', NULL, 'Nasa Bahtiar', 'Abu Kasim', 'Jambi', '0000-00-00', NULL, 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', '5000000', '82547851141', 'nasabahtiar@gmail.com', '', '', 16, 1, 'smpPutra', '2020', 'aktif', '0000-00-00 00:00:00', '2020-09-08 02:15:18'),
(27, 'Parmudi', 'Parmudi', 'JAMBI', '0000-00-00', 'Laki laki', '1', NULL, 'AB', NULL, 'M', 'SD N 52', 'Kota Jambi', '23402042022', 'Mulyanto', NULL, 'SMA', '0000-00-00', 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', 3500000, '85698761545', NULL, 'NOVRIANI', NULL, 'Jambi', NULL, 'SMP', NULL, NULL, NULL, '896442123221', NULL, 'Mulyanto', 'Abu Kasim', 'Jambi', '0000-00-00', NULL, 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', '5000000', '82547851141', 'mulyanto@gmail.com', '', '', 16, 1, 'smpPutra', '2020', 'aktif', '0000-00-00 00:00:00', '2020-09-08 02:15:30'),
(28, 'Sugito', 'Sugi', 'JAMBI', '0000-00-00', 'Laki laki', '1', NULL, 'AB', NULL, 'M', 'SD N 52', 'Kota Jambi', '23402042022', 'Alfi Munawaroh', NULL, 'SMA', '0000-00-00', 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', 3500000, '85698761545', NULL, 'NOVRIANI', NULL, 'Jambi', NULL, 'SMP', NULL, NULL, NULL, '896442123221', NULL, 'Alfi Munawaroh', 'Abu Kasim', 'Jambi', '0000-00-00', NULL, 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', '5000000', '82547851141', 'alfimunawaroh@gmail.com', '', '', 16, 1, 'smpPutra', '2020', 'aktif', '0000-00-00 00:00:00', '2020-09-08 02:15:48'),
(29, 'Romadi', 'Adi', 'JAMBI', '0000-00-00', 'Laki laki', '1', NULL, 'AB', NULL, 'M', 'SD N 52', 'Kota Jambi', '23402042022', 'Suharno', NULL, 'SMA', '0000-00-00', 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', 3500000, '85698761545', NULL, 'NOVRIANI', NULL, 'Jambi', NULL, 'SMP', NULL, NULL, NULL, '896442123221', NULL, 'Suharno', 'Abu Kasim', 'Jambi', '0000-00-00', NULL, 'Wiraswasta', 'LRG TAMBAK SARI GANG II RT 03 No. 13', '5000000', '82547851141', 'suharno@gmail.com', '', '', 16, 1, 'smpPutra', '2020', 'aktif', '0000-00-00 00:00:00', '2020-09-08 02:15:42'),
(36, 'Aldo Barelio', 'Aldo', 'Jambi', '2020-12-30', 'Laki laki', '4', 'Jawa', 'B', 'TBC', 'XS', 'SD N 1 Kota Jambi', 'Kota Jambi', '345267000102', 'Ahmad', 'Abu Aldo', 'SMA', '2021-01-13', 'Tani', 'Kota Jambi', 4000000, '08322454324431', 'ahmadsd@gmail.com', 'Surinem', 'Uri', 'Jambi', '2021-01-14', 'SD', 'URT', 'Kota Jambi', 1000000, '0825643421003', 'surinem@gmail.com', 'Surinem', 'Uri', 'Kota Jambi', '2021-01-14', 'SD', 'URT', 'Kota Jambi', '1000000', '0824355634230', 'surinem@gmail.com', '', '', 18, 3, 'sd', '2019', 'aktif', '2021-01-16 17:29:56', '2021-04-01 07:45:39'),
(37, 'Abdullah Muzzafar', 'Abdullah', 'Jambi', '2021-02-03', 'Laki laki', '4', 'Jawa', 'B', 'TBC', 'S', 'SD N 1 Kota Jambi', 'Kota Jambi', '1345267000102', 'Abdurrahman', 'Abu Abdullah', 'S1', '2021-01-28', 'Tani', 'Kota Jambi', 4000000, '08322454324421', 'abdullahsd@gmail.com', 'Khadijah', 'Ummu Abdullah', 'Palembang', '2021-01-27', 'SD', 'URT', 'Kota Jambi', 1000000, '0825643421003', 'khadijah@gmail.com', 'Abdurrahman', 'Abu Abdullah', 'Jambi', '2021-01-26', 'S1', 'Wiraswasta', 'Kota Jambi', '4000000', '0823452123100', 'abdurrahmansd@gmail.com', '', '', 18, 2, 'sd', '2019', 'aktif', '2021-01-21 19:12:59', '2021-01-21 20:03:22'),
(38, 'Nopi', 'Arahman', 'Jambi', '2021-01-14', 'Laki laki', '4', 'Indonesia', 'AB', NULL, 'M', 'SD N 1 Kota Jambi', 'Kota Jambi', '345267000102', 'Ahmad', 'Abu Nopi', 'S1', '2021-01-14', 'Tani', 'Kota Jambi', 4000000, '08322454324431', 'abunopi@gmail.com', 'Khadijah', 'Uri', 'Jambi', '2021-01-26', 'SD', 'URT', 'Kota Jambi', 1000000, '0825643421003', 'khadijahnopi@gmail.com', 'Ahmad', 'Abu Nopi', 'Kota Jambi', '2021-01-25', 'S1', 'Wiraswasta', 'Kota Jambi', '4000000', '0824355634230', 'abunopi@gmail.com', '', '', 18, 2, 'sd', '2020', 'aktif', '2021-01-22 04:07:23', '2021-04-01 07:46:04'),
(39, 'Khadijah Ath Thahirah', 'Khadijah', 'Jambi', '2000-02-01', 'Perempuan', '3', 'Indonesi', 'O', NULL, 'M', 'SD N 1 Kota Jambi', 'Jl, Sumantri , No, 45', '0034923001', 'Nopi Arahman', 'Nopi', 'SMA', '1993-01-11', 'Wiraswasta', 'Pondok Meja', 5000000, '082375207570', 'nopiarahman@gmail.com', 'Sri Nurjannah', 'Jannah', 'Jambi', '1993-12-30', 'S1', 'Guru', 'Pondok Meja', 2000000, '083124342311', 'jannah@gmail.com', 'Nopi Arahman', 'Nopi', 'Jambi', '1993-11-30', 'SMA', 'Wiraswasta', 'Pondok Meja', '5000000', '082375207570', 'nopibanaat@gmail.com', '', '', 24, 1, 'smpPutri', '2020', 'Aktif', '2021-04-13 08:00:33', '2021-04-13 08:00:51'),
(40, 'Wajidi Firdaus', 'Wajidi', 'Jambi', '1990-04-15', 'Laki laki', '2', 'Indonesia', 'AB', NULL, 'L', 'Ponpes Al-Qosim Jambi', 'Talang Belido, Muaro Jambi', '0034923001', 'Abdullah', 'Abdullah', 'SMA', '1982-04-19', 'Tani', 'Perumahan Arraihan', 3000000, '082334543200', 'abdullahwajidi@gmail.com', 'Zainab', 'Ummu Firdaus', 'Jambi', '1989-04-04', 'SMA', 'Ibu Rumah Tangga', 'Perumahan Arraihan', 1000000, '083124342311', 'zainabwajidi@gmail.com', 'Abdullah', 'Abdullah', 'Jambi', '1986-04-14', 'SMA', 'Tani', 'Perumahan Arraihan', '3000000', '0823452340201', 'abdullahwajidi@gmail.com', '', '', 25, 1, 'smaPutra', '2020', 'Aktif', '2021-04-15 08:58:40', '2021-04-15 09:02:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `santriwustha`
--
ALTER TABLE `santriwustha`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `santriwustha`
--
ALTER TABLE `santriwustha`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
