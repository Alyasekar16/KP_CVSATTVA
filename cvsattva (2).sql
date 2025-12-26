-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 26 Des 2025 pada 09.57
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cvsattva`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tim` enum('Designer','Architect','Project') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `jabatan`, `tim`, `email`, `notelepon`, `alamat`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'apiw', 'Senior', 'Designer', 'dwisekaralya168@gmail.com', '09987548', 'aa', 'aa', 'foto/cJJDW4suXgh34QtZg7D7RgxVHT0M6gv5Kl6VLoFV.png', '2025-12-20 22:56:31', '2025-12-22 09:34:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komen`
--

CREATE TABLE `komen` (
  `komen_id` bigint UNSIGNED NOT NULL,
  `proyek_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint DEFAULT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `komen`
--

INSERT INTO `komen` (`komen_id`, `proyek_id`, `nama`, `email`, `rating`, `isi`, `created_at`, `updated_at`) VALUES
(1, 6, 'yoy', 'demo@gmail.com', 5, 'fbuebfebfoie', '2025-12-25 22:22:55', '2025-12-25 22:22:55'),
(2, 6, 'yaya', 'dwisekaralya168@gmail.com', 4, 'wah mantap sekali', '2025-12-25 22:23:19', '2025-12-25 22:23:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komen_admin`
--

CREATE TABLE `komen_admin` (
  `id` bigint UNSIGNED NOT NULL,
  `komen_id` bigint UNSIGNED NOT NULL,
  `balasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `komen_admin`
--

INSERT INTO `komen_admin` (`id`, `komen_id`, `balasan`, `nama`, `created_at`, `updated_at`) VALUES
(1, 2, 'terimakasi ya', 'Administrator', '2025-12-25 23:08:32', '2025-12-25 23:08:32'),
(2, 1, 'bcidbvidfabdvduh', 'Administrator', '2025-12-25 23:08:50', '2025-12-25 23:08:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id` bigint UNSIGNED NOT NULL,
  `kantor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id`, `kantor`, `email`, `notelepon`, `foto`, `created_at`, `updated_at`) VALUES
(5, 'Jakarta', 'cvsattvajkt@gmail.com', '09987548', 'kontak/VmvRPUCYGyeyUvZ65TCJyBtaP0RK6snSk7rZ5I1c.png', '2025-12-25 06:35:42', '2025-12-25 06:35:42'),
(7, 'Jakarta', 'cvsattvasmii@gmail.com', '098765', 'kontak/L3FW25mH2dMz3UYeCZqUWT71rW0DUR2rQZ8Jp6JX.png', '2025-12-25 06:50:53', '2025-12-25 06:51:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_12_12_061947_create_proyek_table', 1),
(6, '2025_12_19_161020_create_karyawan_table', 1),
(7, '2025_12_21_050411_create_penghargaan_table', 2),
(8, '2025_12_21_051019_create_karyawan_table', 3),
(10, '2025_12_21_051649_create_perusahaan_table', 4),
(11, '2025_12_21_103708_create_ulasan_table', 5),
(12, '2025_12_23_170707_create_komen_table', 6),
(13, '2025_12_23_173526_create_komen_admin_table', 7),
(15, '2025_12_25_123814_create_kontak_table', 8),
(16, '2025_12_25_140114_create_order_table', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` enum('Kontruksi','Desain Arsitektur') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('Rumah','Kantor','Kafe','Taman','Interior','Lainnya') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','diproses','selesai','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id`, `nama`, `email`, `notelepon`, `kategori`, `jenis`, `status`, `created_at`, `updated_at`) VALUES
(1, 'yaya', 'dwisekaralya168@gmail.com', '23245535325', 'Kontruksi', 'Taman', 'pending', '2025-12-25 08:36:01', '2025-12-25 22:04:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghargaan`
--

CREATE TABLE `penghargaan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penghargaan`
--

INSERT INTO `penghargaan` (`id`, `nama`, `tahun`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
(2, 'kompetisi', '2020', 'zvbvrrfbvfbgdbzdbzgbafbszf', NULL, '2025-12-20 23:08:26', '2025-12-20 23:08:26'),
(3, 'Bintang', '2020', 'zvbvrrfbvfbgdbzdbzgbafbszf', 'foto/L1OfqcCbb0dL94aIjRvCIfwlAcPdCC4ebzsrN2Fq.png', '2025-12-22 09:33:22', '2025-12-22 09:33:41'),
(4, 'for anak semester 4', '2020', 'zvbvrrfbvfbgdbzdbzgbafbszf', 'penghargaan/UuAZHKwm080iZRYrbKTUtHr1IjETFL05rbI5LMyn.png', '2025-12-26 01:05:26', '2025-12-26 01:06:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` bigint UNSIGNED NOT NULL,
  `visimisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sejarah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `maknalogo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `visimisi`, `sejarah`, `maknalogo`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'aaaa', 'aaa', 'aaaa', 'foto/LmZYVe6eQuChMnO1ZCWDPo3LtyBClRdFOczEHGCR.png', '2025-12-20 23:03:16', '2025-12-22 09:35:07'),
(3, 'bb', 'bbb', 'bb', 'foto/45xpBu6JJh9LYZr8QFdfhiGcS2LaxJegmX8l03eU.png', '2025-12-22 09:41:07', '2025-12-22 09:41:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `proyek_id` bigint UNSIGNED NOT NULL,
  `namaproyek` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategoriproyek` enum('Kontruksi','Desain Arsitektur') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenisproyek` enum('Rumah','Kantor','Kafe','Taman','Interior','Lainnya') COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `klien` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalmulai` date NOT NULL,
  `tanggalselesai` date NOT NULL,
  `status` enum('sedang berjalan','selesai','perencanaan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `gambarproyek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`proyek_id`, `namaproyek`, `kategoriproyek`, `jenisproyek`, `lokasi`, `klien`, `tanggalmulai`, `tanggalselesai`, `status`, `deskripsi`, `gambarproyek`, `created_at`, `updated_at`) VALUES
(1, 'yaya', 'Kontruksi', 'Rumah', 'ggr', 'grg', '2025-12-21', '2025-12-21', 'sedang berjalan', 'nxgnhgjzdh', 'gambarproyek/lFz8eP4RjXMFfsmZMGB87R5SjUGcWxCyL5bgfBKJ.png', '2025-12-20 22:28:26', '2025-12-26 02:32:50'),
(3, 'lana', 'Desain Arsitektur', 'Kantor', 'bbb', 'bbb', '2026-01-10', '2026-01-10', 'perencanaan', 'pppp', NULL, '2025-12-20 23:19:18', '2025-12-20 23:19:44'),
(4, 'calm', 'Kontruksi', 'Kafe', 'Sukaraja Cihuy', 'apipi', '2025-10-01', '2025-12-12', 'perencanaan', 'aaaaaaaaaaaaaaa', 'gambarproyek/ZOPvYPaDDpOr2MsyG2uQx1qsp5UAkLvMC7fPRLJc.png', '2025-12-21 23:57:21', '2025-12-21 23:57:21'),
(5, 'yaya', 'Kontruksi', 'Rumah', 'ggr', 'grg', '2025-12-27', '2026-01-03', 'perencanaan', 'pppppppppppppp', 'gambarproyek/Xhxa80dghzTU3fhDKptNIJnOxqZF4PyhKKywuuD0.png', '2025-12-22 07:53:49', '2025-12-22 08:51:55'),
(6, 'vr', 'Desain Arsitektur', 'Kafe', 'yayaya', 'aaaa', '2025-12-25', '2026-01-10', 'perencanaan', 'swwswsw', 'gambarproyek/Jt3oYLlpMf7i8kSp42fd8jyap2FCFYxjtjIrjcG0.png', '2025-12-25 06:38:12', '2025-12-25 06:38:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@demo.app', NULL, '$2y$12$czgPwx.B81910mLSdiLjDeszk44PTHbDallnLdJP59Ml26YQt9VMm', NULL, '2025-12-24 22:50:03', '2025-12-24 22:50:03'),
(2, 'User Biasa', 'user@demo.app', NULL, '$2y$12$n/Xq9yDXSWwX9xQZUqBe3e21epiHy4Qm.hIBgozViFc1650VE4Mdi', NULL, '2025-12-24 22:50:04', '2025-12-24 22:50:04');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komen`
--
ALTER TABLE `komen`
  ADD PRIMARY KEY (`komen_id`),
  ADD KEY `komen_proyek_id_foreign` (`proyek_id`);

--
-- Indeks untuk tabel `komen_admin`
--
ALTER TABLE `komen_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komen_admin_komen_id_foreign` (`komen_id`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `penghargaan`
--
ALTER TABLE `penghargaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`proyek_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `komen`
--
ALTER TABLE `komen`
  MODIFY `komen_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `komen_admin`
--
ALTER TABLE `komen_admin`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penghargaan`
--
ALTER TABLE `penghargaan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `proyek`
--
ALTER TABLE `proyek`
  MODIFY `proyek_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `komen`
--
ALTER TABLE `komen`
  ADD CONSTRAINT `komen_proyek_id_foreign` FOREIGN KEY (`proyek_id`) REFERENCES `proyek` (`proyek_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komen_admin`
--
ALTER TABLE `komen_admin`
  ADD CONSTRAINT `komen_admin_komen_id_foreign` FOREIGN KEY (`komen_id`) REFERENCES `komen` (`komen_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
