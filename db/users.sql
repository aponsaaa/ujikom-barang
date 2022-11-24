-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2022 pada 17.52
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faisal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `created_at`) VALUES
('1c082ed6a7ef43bb9058da36acbd0bd3', '', 'aa@gmsail.com', '$2y$10$eBwSyX9aElulSeyliRPmpOiRsFjjvgKw12ovAkj/ksJnmWuNKj9jO', '2022-11-24 16:51:32'),
('32ae94e3d67a4c22a731e2637220dc35', '', 'aa@gmail.com', '$2y$10$M6aRpU/Lp5iRBUBsqHcW3uvvwVVvHkPUHfwg4WOR9oBTPl/3CecpG', '2022-11-24 16:51:32'),
('5554d3f9f82146f796d4f687f9344494', '', 'alt.t7-260ma3l@yopmail.com', '$2y$10$L9jXFo6vJw8TZrUnCORO9erWh1tjJ83WwKS6kPZaGUateUuCcxyKy', '2022-11-24 16:51:32'),
('6fff5eabbede4147b9da518ffee5a9bd', '', 'alt.t7-260ma3l@yopmail.com', '$2y$10$SNbkjpSK90RnrGEHEh.aWeMuy2R4x5wADQGQLWOrbOGU/s2jF1nSe', '2022-11-24 16:51:32'),
('a01a093adbc648d9983c7e16f2f99f7b', 'Asdasd', 'asdasdad@gmia.com', '$2y$10$XXtB0UBPtAogPZrhNZewEuAOfhwOL/WUI/HNPUFILIKAhy079pD7S', '2022-11-24 16:51:40'),
('d88932b16f7c48aeaed833a9aae3dd6b', '', 'alt.t7-260ma3l@yopmail.com', '$2y$10$LyKrsvHOXqROersISFmXkeTlUQUKj.mqMEP4L68hOONqneBn62QNK', '2022-11-24 16:51:32'),
('f2a363d91f204dcb9ccca9fd2dc12fc0', '', 'alt.t7-260ma3l@yopmail.com', '$2y$10$FQG2NXDUxFMtznXmtPIe.Oh2NeWmhEA8/kJ3jTxJEm3MH2Fy83UR.', '2022-11-24 16:51:32'),
('f6d25c13ccc34323b01853ee4089e4e1', '', 'alt.t7-260ma3l@yopmail.com', '$2y$10$Ax9js2IJv2zdOJ.H/fBUg.i0eQgRHuW99C56WdFEvCXhFh6oK41nO', '2022-11-24 16:51:32');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
