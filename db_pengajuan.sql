-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Agu 2020 pada 12.35
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pengajuan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pelayanan`
--

CREATE TABLE `t_pelayanan` (
  `id_pelayanan` int(11) NOT NULL,
  `nama_pelayanan` enum('verifikasi-KK','verifikasi-EKTP-baru','verifikasi-SPK') NOT NULL,
  `deskripsi_layanan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_pelayanan`
--

INSERT INTO `t_pelayanan` (`id_pelayanan`, `nama_pelayanan`, `deskripsi_layanan`) VALUES
(1, 'verifikasi-KK', 'nama_pemohon,no_nik,no_pengajuan,status_pemohon,kk_lama,ektp_suami,ektp_istri,akta_nikah,skl,surat_pindah_kk,form_kk,verifikasi_kk'),
(2, 'verifikasi-EKTP-baru', 'no_pengajuan,kk_baru_skrng,foto,ijazah,nama_pemohon,no_nik,verifikasi_ektp_baru'),
(3, 'verifikasi-SPK', 'no_pengajuan,kk_baru_skrng,ektp_baru_skrng,formulir_surat_pindah,alasan_pindah,nama_ygpindah,jumlah_ygpindah,alamat_asal,alamat_pindah,verifikasi_surat_pindah_keluar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pengajuan`
--

CREATE TABLE `t_pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelayanan` int(11) NOT NULL,
  `no_nik` varchar(16) NOT NULL,
  `no_pengajuan` varchar(11) NOT NULL,
  `nama_pemohon` varchar(255) NOT NULL,
  `status_pemohon` varchar(255) NOT NULL,
  `kk_baru_skrng` varchar(255) NOT NULL,
  `kk_lama` varchar(255) NOT NULL,
  `ektp_baru_skrng` varchar(255) NOT NULL,
  `ektp_suami` varchar(255) NOT NULL,
  `ektp_istri` varchar(255) NOT NULL,
  `akta_nikah` varchar(255) NOT NULL,
  `skl` varchar(255) NOT NULL,
  `surat_pindah_kk` varchar(255) NOT NULL,
  `form_kk` varchar(255) NOT NULL,
  `verifikasi_kk` enum('','belum verifikasi','sudah verifikasi','') NOT NULL,
  `ijazah` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `verifikasi_ektp_baru` enum('','belum verifikasi','sudah verifikasi','') NOT NULL,
  `formulir_surat_pindah` varchar(255) NOT NULL,
  `alamat_asal` varchar(255) NOT NULL,
  `alasan_pindah` varchar(255) NOT NULL,
  `nama_ygpindah` varchar(255) NOT NULL,
  `jumlah_ygpindah` int(11) NOT NULL,
  `alamat_pindah` varchar(255) NOT NULL,
  `verifikasi_surat_pindah_keluar` enum('','belum verifikasi','sudah verifikasi','') NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `type_login` enum('user','admin') NOT NULL,
  `no_nik` int(16) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_tlp` int(13) NOT NULL,
  `email` varchar(255) NOT NULL,
  `j_k` varchar(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nama_kepala` varchar(100) NOT NULL,
  `alamat_kk` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `ktp_kk` varchar(255) NOT NULL,
  `verifikasi` enum('belum verifikasi','sudah verifikasi','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `type_login`, `no_nik`, `no_kk`, `password`, `nama`, `no_tlp`, `email`, `j_k`, `tgl_lahir`, `alamat`, `nama_kepala`, `alamat_kk`, `foto`, `ktp_kk`, `verifikasi`) VALUES
(1, 'admin', 2147483647, '1234567891', '21232f297a57a5a743894a0e4a801fc3', 'admin', 80808080, 'admin@gmail.com', 'laki-laki', '2020-06-21', '-', '-', '-', '-', '-', 'sudah verifikasi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_pelayanan`
--
ALTER TABLE `t_pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`);

--
-- Indeks untuk tabel `t_pengajuan`
--
ALTER TABLE `t_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pelayanan` (`id_pelayanan`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `no_nik` (`no_nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_pelayanan`
--
ALTER TABLE `t_pelayanan`
  MODIFY `id_pelayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_pengajuan`
--
ALTER TABLE `t_pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_pengajuan`
--
ALTER TABLE `t_pengajuan`
  ADD CONSTRAINT `t_pengajuan_ibfk_1` FOREIGN KEY (`id_pelayanan`) REFERENCES `t_pelayanan` (`id_pelayanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_pengajuan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
