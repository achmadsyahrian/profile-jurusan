-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2023 at 01:19 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project-ukk`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `nama_kegiatan` varchar(200) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `lokasi` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `penanggung_jawab` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `nama_kegiatan`, `tgl_kegiatan`, `waktu`, `lokasi`, `deskripsi`, `penanggung_jawab`, `foto`) VALUES
(1, 'Kegiatan Makan Siang Bersama', '2023-03-14', '14:00 WIB', 'Lapangan Utama SMK1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis quam numquam molestias dolor distinctio quisquam fuga reiciendis, molestiae in ipsum aut ab mollitia culpa nulla corrupti. Magni cupiditate facere obcaecati dolorum officiis tempora blanditiis dolore nisi, incidunt libero iure, natus, illo voluptates perferendis recusandae voluptatem id neque quibusdam error consequatur esse ipsa nihil laborum reprehenderit? Magnam, facilis ipsum deserunt cumque in incidunt! Magni nisi quae quas, a fugit iste suscipit.', 'Kepala Jurusan', 'kegiatan1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi_berita` text NOT NULL,
  `tgl_post` date NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `isi_berita`, `tgl_post`, `foto`) VALUES
(3, 'as', 'asd', '2023-03-15', '641220d26d25a.Screenshot (25).png'),
(6, 'asdasd', 'asdasdsdsd', '2023-03-15', '641225e51c453.Screenshot (26).png');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `judul`, `foto`, `tgl`) VALUES
(1, 'Angkatan Baru 2022', '64125b2de3e32.DSC03772.JPG', '2023-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tgl_komentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `komentar_gallery`
--

CREATE TABLE `komentar_gallery` (
  `id_komentar` int(11) NOT NULL,
  `id_gallery` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tgl_komentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar_gallery`
--

INSERT INTO `komentar_gallery` (`id_komentar`, `id_gallery`, `id_user`, `nama`, `foto`, `isi_komentar`, `tgl_komentar`) VALUES
(1, 1, 1, 'Achmad Syahrian', '6410b26db8970.1672753762527 (2).jpg', 'Aku jadi merindukannya..', '2023-03-14'),
(3, 1, 4, 'Cristiano', '6410b4466929c.wallpaperflare.com_wallpaper (1).jpg', 'Wah Cantik.', '2023-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi_pengumuman` text NOT NULL,
  `tgl_pengumuman` date NOT NULL,
  `jam` varchar(200) NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `tempat` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul`, `isi_pengumuman`, `tgl_pengumuman`, `jam`, `pengirim`, `tempat`, `foto`) VALUES
(5, 'Pembagian Jadwal Kegiatan UKK', 'Segera Ambil ', '2023-03-15', '09:00 WIB', 'Kepala Jurusan (Heru)', 'Bengkel PSPTV', '64120f0f2cd24.IMG-20220511-WA0056.jpg'),
(6, 'asd', 'asdasd', '2023-03-15', 'asd', 'asd', 'asd', '64121a473083d.Screenshot (27).png');

-- --------------------------------------------------------

--
-- Table structure for table `profile_jurusan`
--

CREATE TABLE `profile_jurusan` (
  `id_pk` int(11) NOT NULL,
  `nama_pk` varchar(200) NOT NULL,
  `kepala_pk` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(200) NOT NULL,
  `jlh_siswa` int(11) NOT NULL,
  `jlh_guru` int(11) NOT NULL,
  `jlh_mapel` int(11) NOT NULL,
  `email_pk` varchar(100) NOT NULL,
  `telp_pk` varchar(100) NOT NULL,
  `fb_pk` varchar(200) NOT NULL,
  `yt_pk` varchar(200) NOT NULL,
  `ig_pk` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_jurusan`
--

INSERT INTO `profile_jurusan` (`id_pk`, `nama_pk`, `kepala_pk`, `deskripsi`, `foto`, `jlh_siswa`, `jlh_guru`, `jlh_mapel`, `email_pk`, `telp_pk`, `fb_pk`, `yt_pk`, `ig_pk`) VALUES
(1, 'Produksi Siaran & Program Televisi', 'Achmad Syahrian', 'He legged it up the kyver have it mush super me old mucker cheeky naff that are you taking the piss, blow off down the pub bite your arm off the wireless boot cor blimey guvnor happy days bender what a load of rubbish, say pardon me horse play spiffing Why car boot gosh bubble and squeak. Cheers Richard bugger show off show off pick your nose and blow off get stuffed mate chancer in my flat loo, bevvy amongst hunky-dory bender bubble and squeak me old mucker vagabond, barmy spend a penny chimney pot young delinquent bum bag the bee\'s knees chap, gosh nice one knees up the wireless Charles such a fibber. Mush barmy bleeding Jeffrey pardon me barney grub loo cup of tea bubble and squeak bugger all mate say, I bloke matie boy tickety-boo give us a bell up the duff bugger lurgy wind up I don\'t want no agro.', 'profile.png', 160, 3, 12, 'psptv@gmail.com', '089528126200', '#', 'https://www.youtube.com/channel/UCYJBSOsZ3xv2NeoYFmMz2sg', 'https://www.instagram.com/broadcast.smkone.pst/');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `level` enum('user','admin','member') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `foto`, `level`) VALUES
(1, 'Achmad Syahrian', 'user1', '7815696ecbf1c96e6894b779456d330e', '6410b26db8970.1672753762527 (2).jpg', 'user'),
(2, 'Syahrian Achmad', 'user2', '7e58d63b60197ceb55a1c487989a3720', '6411b09753080.BAL00320 (2).jpg', 'user'),
(4, 'Cristiano', 'user4', '3f02ebe3d7929b091e3d8ccfde2f3bc6', '6410b4466929c.wallpaperflare.com_wallpaper (1).jpg', 'user'),
(5, 'Member 1', 'member1', 'c7764cfed23c5ca3bb393308a0da2306', 'user-default.svg', 'member'),
(6, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'user-default.svg', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_news` (`id_berita`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `komentar_gallery`
--
ALTER TABLE `komentar_gallery`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_gallery` (`id_gallery`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `profile_jurusan`
--
ALTER TABLE `profile_jurusan`
  ADD PRIMARY KEY (`id_pk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `komentar_gallery`
--
ALTER TABLE `komentar_gallery`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `profile_jurusan`
--
ALTER TABLE `profile_jurusan`
  MODIFY `id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`id_berita`) REFERENCES `berita` (`id_berita`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar_gallery`
--
ALTER TABLE `komentar_gallery`
  ADD CONSTRAINT `komentar_gallery_ibfk_1` FOREIGN KEY (`id_gallery`) REFERENCES `gallery` (`id_gallery`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_gallery_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
