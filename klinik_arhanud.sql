/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100137 (10.1.37-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : klinik_arhanud

 Target Server Type    : MySQL
 Target Server Version : 100137 (10.1.37-MariaDB)
 File Encoding         : 65001

 Date: 19/02/2023 17:12:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for agama
-- ----------------------------
DROP TABLE IF EXISTS `agama`;
CREATE TABLE `agama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `keterangan` text,
  `deleted` int(4) DEFAULT '0',
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of agama
-- ----------------------------
BEGIN;
INSERT INTO `agama` (`id`, `nama`, `keterangan`, `deleted`, `status`) VALUES (1, 'Islam', NULL, 0, 1);
INSERT INTO `agama` (`id`, `nama`, `keterangan`, `deleted`, `status`) VALUES (2, 'Kristen', NULL, 0, 1);
INSERT INTO `agama` (`id`, `nama`, `keterangan`, `deleted`, `status`) VALUES (3, 'Khonghuncu', 'Okee', 1, 0);
INSERT INTO `agama` (`id`, `nama`, `keterangan`, `deleted`, `status`) VALUES (4, 'Hindu', '-', 0, 1);
COMMIT;

-- ----------------------------
-- Table structure for antrian
-- ----------------------------
DROP TABLE IF EXISTS `antrian`;
CREATE TABLE `antrian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pasien_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0 = menunggu;\n1 = dilewati; \n2 = selesai; \n3 = dicancel;',
  `no_antrian` int(11) DEFAULT NULL,
  `poli_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `antrian_FK` (`pasien_id`),
  KEY `antrian_created_at_IDX` (`created_at`) USING BTREE,
  KEY `antrian_FK_1` (`poli_id`),
  CONSTRAINT `antrian_FK` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id`),
  CONSTRAINT `antrian_FK_1` FOREIGN KEY (`poli_id`) REFERENCES `poli` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of antrian
-- ----------------------------
BEGIN;
INSERT INTO `antrian` (`id`, `pasien_id`, `created_at`, `status`, `no_antrian`, `poli_id`, `updated_at`) VALUES (29, 14, '2023-01-29 11:51:41', 4, 1, 1, '2023-02-04 14:40:34');
INSERT INTO `antrian` (`id`, `pasien_id`, `created_at`, `status`, `no_antrian`, `poli_id`, `updated_at`) VALUES (30, 14, '2023-01-29 11:53:09', 4, 1, 2, '2023-02-04 15:09:12');
INSERT INTO `antrian` (`id`, `pasien_id`, `created_at`, `status`, `no_antrian`, `poli_id`, `updated_at`) VALUES (31, 10, '2023-01-29 11:53:40', 4, 2, 1, '2023-02-04 15:03:05');
INSERT INTO `antrian` (`id`, `pasien_id`, `created_at`, `status`, `no_antrian`, `poli_id`, `updated_at`) VALUES (32, 10, '2023-01-29 11:53:45', 4, 3, 1, '2023-02-04 15:03:30');
INSERT INTO `antrian` (`id`, `pasien_id`, `created_at`, `status`, `no_antrian`, `poli_id`, `updated_at`) VALUES (33, 10, '2023-01-29 11:53:47', 2, 4, 1, '2023-02-04 17:29:53');
INSERT INTO `antrian` (`id`, `pasien_id`, `created_at`, `status`, `no_antrian`, `poli_id`, `updated_at`) VALUES (34, 1, '2023-02-04 17:19:02', 2, 5, 1, '2023-02-04 17:28:19');
INSERT INTO `antrian` (`id`, `pasien_id`, `created_at`, `status`, `no_antrian`, `poli_id`, `updated_at`) VALUES (35, 14, '2023-02-19 09:13:06', 0, 1, 1, NULL);
COMMIT;

-- ----------------------------
-- Table structure for berita
-- ----------------------------
DROP TABLE IF EXISTS `berita`;
CREATE TABLE `berita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) DEFAULT NULL,
  `keterangan` text,
  `file` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of berita
-- ----------------------------
BEGIN;
INSERT INTO `berita` (`id`, `judul`, `keterangan`, `file`) VALUES (1, 'Ini Berita Terbaru aaaa', 'ini konten berita lorm=e We are excited to introduce ChatGPT to get users\' feedback and learn about its strengths and weaknesses. During the research preview, usage of ChatGPT is free. Try it now at chat.openai.com.\r\n\r\nSamples\r\nIn the following sample, ChatGPT asks the clarifying questions to debug code.', 'berita1676783085.png');
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for fasilitasLayanan
-- ----------------------------
DROP TABLE IF EXISTS `fasilitasLayanan`;
CREATE TABLE `fasilitasLayanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `keterangan` text,
  `file` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fasilitasLayanan
-- ----------------------------
BEGIN;
INSERT INTO `fasilitasLayanan` (`id`, `nama`, `keterangan`, `file`, `type`) VALUES (26, 'Fasilitas Terbaru', 'sadfasfasfasdf', 'fasilitas1676183195.jpg', 0);
INSERT INTO `fasilitasLayanan` (`id`, `nama`, `keterangan`, `file`, `type`) VALUES (27, 'asfasdf', 'asdfasdf', 'fasilitas1676183266.jpg', 0);
INSERT INTO `fasilitasLayanan` (`id`, `nama`, `keterangan`, `file`, `type`) VALUES (28, 'jangan tangs', 'asdfasdfsaf', NULL, 0);
INSERT INTO `fasilitasLayanan` (`id`, `nama`, `keterangan`, `file`, `type`) VALUES (29, 'weqrqwr', 'asdfasdf', NULL, 0);
INSERT INTO `fasilitasLayanan` (`id`, `nama`, `keterangan`, `file`, `type`) VALUES (30, 'asdfasdf', 'asdfasdf', NULL, 0);
INSERT INTO `fasilitasLayanan` (`id`, `nama`, `keterangan`, `file`, `type`) VALUES (31, 'asdfasdf', 'asdfasdf', NULL, 0);
INSERT INTO `fasilitasLayanan` (`id`, `nama`, `keterangan`, `file`, `type`) VALUES (32, 'sdfasdfas', 'asdfasdf', NULL, 0);
INSERT INTO `fasilitasLayanan` (`id`, `nama`, `keterangan`, `file`, `type`) VALUES (33, 'asdfasdf', 'asdfasfd', NULL, 0);
INSERT INTO `fasilitasLayanan` (`id`, `nama`, `keterangan`, `file`, `type`) VALUES (34, 'Rawat Jalan', 'Ini Keterangan Rawat Jalan Dari Pasien', 'fasilitas1676706540.png', 1);
COMMIT;

-- ----------------------------
-- Table structure for gambar_carousel
-- ----------------------------
DROP TABLE IF EXISTS `gambar_carousel`;
CREATE TABLE `gambar_carousel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gambar_carousel
-- ----------------------------
BEGIN;
INSERT INTO `gambar_carousel` (`id`, `nama`, `file`) VALUES (6, 'Gambar Rumah Sakit', 'carousel_1676184945.jpg');
INSERT INTO `gambar_carousel` (`id`, `nama`, `file`) VALUES (7, 'Ruang Umum', 'carousel_1676185001.png');
COMMIT;

-- ----------------------------
-- Table structure for init_antrian
-- ----------------------------
DROP TABLE IF EXISTS `init_antrian`;
CREATE TABLE `init_antrian` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of init_antrian
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for kemitraan
-- ----------------------------
DROP TABLE IF EXISTS `kemitraan`;
CREATE TABLE `kemitraan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `keterangan` text,
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kemitraan
-- ----------------------------
BEGIN;
INSERT INTO `kemitraan` (`id`, `nama`, `keterangan`, `file`) VALUES (1, 'Buenos Venturo', 'asdfasfd', 'kemitraan1676181049.jpeg');
INSERT INTO `kemitraan` (`id`, `nama`, `keterangan`, `file`) VALUES (28, 'ffff', NULL, '/private/var/folders/5h/9s_kd51n6k7gpf2qb6mmvcq00000gn/T/phpelxdsN');
COMMIT;

-- ----------------------------
-- Table structure for lab
-- ----------------------------
DROP TABLE IF EXISTS `lab`;
CREATE TABLE `lab` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `harga` int(6) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lab
-- ----------------------------
BEGIN;
INSERT INTO `lab` (`id`, `nama`, `satuan`, `harga`, `created_time`, `updated_time`, `deleted`) VALUES (1, 'Kolesterol', 'mg/dl', 15000, '2020-04-07 15:32:20', '2020-04-12 10:05:59', 1);
INSERT INTO `lab` (`id`, `nama`, `satuan`, `harga`, `created_time`, `updated_time`, `deleted`) VALUES (2, 'Asam Urat', 'mg/dl', 15000, '2020-04-07 08:43:20', '2020-04-07 08:43:20', 0);
INSERT INTO `lab` (`id`, `nama`, `satuan`, `harga`, `created_time`, `updated_time`, `deleted`) VALUES (3, 'Gula Darah Sewaktu', 'mg/dl', 15000, '2020-04-07 08:43:47', '2020-04-07 08:51:29', 0);
INSERT INTO `lab` (`id`, `nama`, `satuan`, `harga`, `created_time`, `updated_time`, `deleted`) VALUES (4, 'Gula Darah Puasa', 'mg/dl', 15000, '2020-04-12 10:06:27', '2020-04-12 10:06:27', 0);
INSERT INTO `lab` (`id`, `nama`, `satuan`, `harga`, `created_time`, `updated_time`, `deleted`) VALUES (5, 'Gula Darah 2 Jam PP', 'mg/dl', 15000, '2020-04-26 12:09:37', '2020-04-27 04:05:34', 0);
INSERT INTO `lab` (`id`, `nama`, `satuan`, `harga`, `created_time`, `updated_time`, `deleted`) VALUES (6, 'Hemoglobin', 'mg/dl', 15000, '2020-04-26 12:45:42', '2020-04-26 12:45:42', 1);
COMMIT;

-- ----------------------------
-- Table structure for metadata
-- ----------------------------
DROP TABLE IF EXISTS `metadata`;
CREATE TABLE `metadata` (
  `id` int(11) NOT NULL,
  `Judul` varchar(25) NOT NULL,
  `Deskripsi` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of metadata
-- ----------------------------
BEGIN;
INSERT INTO `metadata` (`id`, `Judul`, `Deskripsi`) VALUES (1, 'Daftar Pasien', 'Merupakan list pasien yang sudah terdaftar di klinik anda.');
INSERT INTO `metadata` (`id`, `Judul`, `Deskripsi`) VALUES (2, 'Tambah Pasien', 'Isi biodata berikut untuk menambah pasien baru.');
INSERT INTO `metadata` (`id`, `Judul`, `Deskripsi`) VALUES (3, 'Edit Pasien', 'Lakukan pengeditan pasien sesuai kolom yang tertera.');
INSERT INTO `metadata` (`id`, `Judul`, `Deskripsi`) VALUES (4, 'Daftar Obat', 'Daftar obat-obatan yang terdaftar di klinik.');
INSERT INTO `metadata` (`id`, `Judul`, `Deskripsi`) VALUES (5, 'Tambah Obat Baru', 'Tambahkan obat baru kedalam database dengan mengisi formulir berikut');
INSERT INTO `metadata` (`id`, `Judul`, `Deskripsi`) VALUES (6, 'Edit Obat', 'lakukan perubahan informasi mengenai obat yang anda inginkan dengan menuliskannya di formulir berikut.');
INSERT INTO `metadata` (`id`, `Judul`, `Deskripsi`) VALUES (7, 'Daftar Pemeriksaan Lab', 'Daftar pemeriksaan lab yang tersedia di klinik.');
INSERT INTO `metadata` (`id`, `Judul`, `Deskripsi`) VALUES (8, 'Tambah Pemeriksaan Lab', 'Tabahkan fasilitas lab kedalam database dengan mengisi formulir berikut.');
INSERT INTO `metadata` (`id`, `Judul`, `Deskripsi`) VALUES (9, 'Edit Lab', 'lakukan perubahan informasi mengenai obat yang anda inginkan dengan menuliskannya di formulir berikut.');
INSERT INTO `metadata` (`id`, `Judul`, `Deskripsi`) VALUES (10, 'Lihat Rekam Medis', 'Lihat rekam medis yang tersdia pada pasien yang dipilih.');
INSERT INTO `metadata` (`id`, `Judul`, `Deskripsi`) VALUES (11, 'Tambah Rekam Medis', 'Tambahkan rekam medis pada pasien yang dipilih.');
INSERT INTO `metadata` (`id`, `Judul`, `Deskripsi`) VALUES (12, 'List Rekam Medis Pasien', 'Jejak rekam medis pasien di klinik anda.');
INSERT INTO `metadata` (`id`, `Judul`, `Deskripsi`) VALUES (13, 'Edit Rekam Medis', 'Lakukan Pengeditan rekam medis.');
INSERT INTO `metadata` (`id`, `Judul`, `Deskripsi`) VALUES (14, 'Buat Tagihan Kunjungan', 'Berikut adalah tagihan tehadap pasien yang diperiksa.');
INSERT INTO `metadata` (`id`, `Judul`, `Deskripsi`) VALUES (15, 'Lihat rekam Medis', 'Lihat Rekam Medis Pasien Yang Dipilih');
INSERT INTO `metadata` (`id`, `Judul`, `Deskripsi`) VALUES (16, 'Pengaturan', 'Pengaturan yang tersedia untuk klinik anda');
INSERT INTO `metadata` (`id`, `Judul`, `Deskripsi`) VALUES (17, 'Dashboard', 'Halaman muka dari klinik anda, overview hal-hal mengenai klinik anda.');
INSERT INTO `metadata` (`id`, `Judul`, `Deskripsi`) VALUES (18, 'Daftar Pengguna', 'Daftar pengguna atau pegawai yang dapat log-in di klinik anda.');
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
COMMIT;

-- ----------------------------
-- Table structure for obat
-- ----------------------------
DROP TABLE IF EXISTS `obat`;
CREATE TABLE `obat` (
  `id` int(4) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `sediaan` varchar(50) NOT NULL,
  `dosis` int(12) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `stok` int(5) NOT NULL,
  `harga` int(9) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of obat
-- ----------------------------
BEGIN;
INSERT INTO `obat` (`id`, `nama_obat`, `sediaan`, `dosis`, `satuan`, `stok`, `harga`, `created_time`, `updated_time`, `deleted`) VALUES (1, 'Metronidazole', 'Tablet', 500, 'mg', 4, 10000, '2020-04-26 19:00:17', '2020-04-26 19:00:17', 0);
INSERT INTO `obat` (`id`, `nama_obat`, `sediaan`, `dosis`, `satuan`, `stok`, `harga`, `created_time`, `updated_time`, `deleted`) VALUES (2, 'Amoxicillin', 'Tablet', 500, 'mg', 90, 10000, '2020-04-26 19:00:52', '2020-04-26 19:00:52', 0);
INSERT INTO `obat` (`id`, `nama_obat`, `sediaan`, `dosis`, `satuan`, `stok`, `harga`, `created_time`, `updated_time`, `deleted`) VALUES (3, 'Cefixime', 'Kapsul', 200, 'mg', 100, 40000, '2020-04-26 12:04:38', '2020-04-26 12:04:38', 0);
INSERT INTO `obat` (`id`, `nama_obat`, `sediaan`, `dosis`, `satuan`, `stok`, `harga`, `created_time`, `updated_time`, `deleted`) VALUES (4, 'Cefixime', 'Kapsul', 100, 'mg', 100, 30000, '2020-04-26 12:05:19', '2020-04-26 12:05:19', 1);
INSERT INTO `obat` (`id`, `nama_obat`, `sediaan`, `dosis`, `satuan`, `stok`, `harga`, `created_time`, `updated_time`, `deleted`) VALUES (5, 'Paracetamol', 'Tablet', 500, 'mg', 100, 10000, '2020-04-26 12:08:32', '2020-04-26 12:08:32', 0);
COMMIT;

-- ----------------------------
-- Table structure for pasien
-- ----------------------------
DROP TABLE IF EXISTS `pasien`;
CREATE TABLE `pasien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `jk` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(14) NOT NULL,
  `pendidikan` varchar(16) DEFAULT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `no_bpjs` bigint(20) DEFAULT NULL,
  `alergi` text,
  `created_time` datetime NOT NULL,
  `updated_time` datetime NOT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `rm_id` int(5) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `alamat_ktp` varchar(50) DEFAULT NULL,
  `agama_id` int(11) DEFAULT NULL,
  `status_pernikahan` varchar(50) DEFAULT NULL,
  `penanggung_jawab` varchar(50) DEFAULT NULL,
  `no_telp_penanggung_jawab` varchar(100) DEFAULT NULL,
  `golongan_darah` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pasien_FK` (`rm_id`),
  KEY `agama_id` (`agama_id`),
  CONSTRAINT `pasien_FK` FOREIGN KEY (`rm_id`) REFERENCES `rm` (`id`),
  CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`agama_id`) REFERENCES `agama` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of pasien
-- ----------------------------
BEGIN;
INSERT INTO `pasien` (`id`, `nama`, `tgl_lhr`, `jk`, `alamat`, `hp`, `pendidikan`, `pekerjaan`, `no_bpjs`, `alergi`, `created_time`, `updated_time`, `deleted`, `rm_id`, `nik`, `alamat_ktp`, `agama_id`, `status_pernikahan`, `penanggung_jawab`, `no_telp_penanggung_jawab`, `golongan_darah`) VALUES (1, 'Jajang Rukmana Sukarna', '2020-04-01', 'Perempuan', 'JAKARTA', '082191019181', 'SMP', 'Buruh', 9182717, 'tidak ada alergi', '0000-00-00 00:00:00', '2020-04-27 03:48:16', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `pasien` (`id`, `nama`, `tgl_lhr`, `jk`, `alamat`, `hp`, `pendidikan`, `pekerjaan`, `no_bpjs`, `alergi`, `created_time`, `updated_time`, `deleted`, `rm_id`, `nik`, `alamat_ktp`, `agama_id`, `status_pernikahan`, `penanggung_jawab`, `no_telp_penanggung_jawab`, `golongan_darah`) VALUES (2, 'Abdul Somara', '1991-01-01', 'Laki-laki', 'Garut indah sekali jaya tentrem abadi dan tak terlupakan', '0918212111', NULL, 'Pengangguran', 1092811221, 'alergi kamu', '0000-00-00 00:00:00', '2020-04-27 03:58:25', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `pasien` (`id`, `nama`, `tgl_lhr`, `jk`, `alamat`, `hp`, `pendidikan`, `pekerjaan`, `no_bpjs`, `alergi`, `created_time`, `updated_time`, `deleted`, `rm_id`, `nik`, `alamat_ktp`, `agama_id`, `status_pernikahan`, `penanggung_jawab`, `no_telp_penanggung_jawab`, `golongan_darah`) VALUES (6, 'Pinkan Rambo', '1991-02-01', 'perempuan', 'Hutan', '019281992', 'Tidak Ssekolah', 'Model', NULL, NULL, '2020-04-27 04:01:21', '2020-04-27 04:01:21', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `pasien` (`id`, `nama`, `tgl_lhr`, `jk`, `alamat`, `hp`, `pendidikan`, `pekerjaan`, `no_bpjs`, `alergi`, `created_time`, `updated_time`, `deleted`, `rm_id`, `nik`, `alamat_ktp`, `agama_id`, `status_pernikahan`, `penanggung_jawab`, `no_telp_penanggung_jawab`, `golongan_darah`) VALUES (7, 'Fia Jatuh', '1991-01-01', 'Laki-laki', 'Panggung', '01999212', 'Tidak Ssekolah', 'soundsystem', NULL, NULL, '2020-04-27 04:05:21', '2020-04-27 04:05:21', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `pasien` (`id`, `nama`, `tgl_lhr`, `jk`, `alamat`, `hp`, `pendidikan`, `pekerjaan`, `no_bpjs`, `alergi`, `created_time`, `updated_time`, `deleted`, `rm_id`, `nik`, `alamat_ktp`, `agama_id`, `status_pernikahan`, `penanggung_jawab`, `no_telp_penanggung_jawab`, `golongan_darah`) VALUES (8, 'Jamal', '2023-01-11', 'Laki-laki', 'asdfasdf', '241234123412', NULL, 'qwrqwerqwer', 123456789012345, NULL, '2023-01-12 08:20:18', '2023-01-12 08:20:18', 0, NULL, '12412341234123412342', 'asdfas', 1, '0', 'aaa', '123444', 'B');
INSERT INTO `pasien` (`id`, `nama`, `tgl_lhr`, `jk`, `alamat`, `hp`, `pendidikan`, `pekerjaan`, `no_bpjs`, `alergi`, `created_time`, `updated_time`, `deleted`, `rm_id`, `nik`, `alamat_ktp`, `agama_id`, `status_pernikahan`, `penanggung_jawab`, `no_telp_penanggung_jawab`, `golongan_darah`) VALUES (9, 'Haidar Rais', '2023-01-13', 'Laki-laki', 'asfsad', '12342134', NULL, 'qwerqwer', 1256172818199999, NULL, '2023-01-19 13:49:40', '2023-01-19 13:49:40', 1, NULL, '28172938192', '10291826178', 1, '0', 'qwrqwer', '123412432134', 'A');
INSERT INTO `pasien` (`id`, `nama`, `tgl_lhr`, `jk`, `alamat`, `hp`, `pendidikan`, `pekerjaan`, `no_bpjs`, `alergi`, `created_time`, `updated_time`, `deleted`, `rm_id`, `nik`, `alamat_ktp`, `agama_id`, `status_pernikahan`, `penanggung_jawab`, `no_telp_penanggung_jawab`, `golongan_darah`) VALUES (10, 'Sulaeman alayubi', '2023-01-11', 'Laki-laki', 'ASD', '028330293838', NULL, 'WQERQWE', 214214, NULL, '2023-01-19 14:13:14', '2023-01-19 14:13:14', 0, NULL, '123456789', 'aD', 1, '0', 'judiran', '09228173894', 'A');
INSERT INTO `pasien` (`id`, `nama`, `tgl_lhr`, `jk`, `alamat`, `hp`, `pendidikan`, `pekerjaan`, `no_bpjs`, `alergi`, `created_time`, `updated_time`, `deleted`, `rm_id`, `nik`, `alamat_ktp`, `agama_id`, `status_pernikahan`, `penanggung_jawab`, `no_telp_penanggung_jawab`, `golongan_darah`) VALUES (11, 'Sulaeman alayubi 121', '2023-01-11', 'Laki-laki', 'ASD', '028330293838', NULL, 'WQERQWE', 214214, NULL, '2023-01-19 14:14:16', '2023-01-19 14:14:16', 1, NULL, '123456789123', 'aD', 1, '0', 'judiran', '09228173894', 'A');
INSERT INTO `pasien` (`id`, `nama`, `tgl_lhr`, `jk`, `alamat`, `hp`, `pendidikan`, `pekerjaan`, `no_bpjs`, `alergi`, `created_time`, `updated_time`, `deleted`, `rm_id`, `nik`, `alamat_ktp`, `agama_id`, `status_pernikahan`, `penanggung_jawab`, `no_telp_penanggung_jawab`, `golongan_darah`) VALUES (12, 'hhhhhh', '2023-01-13', 'Laki-laki', 'wqer', '1234243', NULL, 'qwerq', 123423, NULL, '2023-01-19 14:15:40', '2023-01-19 14:15:40', 1, NULL, '123456789012933', 'wqr', 1, '0', NULL, NULL, 'B');
INSERT INTO `pasien` (`id`, `nama`, `tgl_lhr`, `jk`, `alamat`, `hp`, `pendidikan`, `pekerjaan`, `no_bpjs`, `alergi`, `created_time`, `updated_time`, `deleted`, `rm_id`, `nik`, `alamat_ktp`, `agama_id`, `status_pernikahan`, `penanggung_jawab`, `no_telp_penanggung_jawab`, `golongan_darah`) VALUES (13, 'Jamal Musiala', '2000-01-12', 'Laki-laki', 'Melbourne', '089918273812', NULL, 'Software Developer', 98293019283, NULL, '2023-01-21 11:18:52', '2023-01-21 11:18:52', 1, NULL, '1234', 'Johor', 1, '1', NULL, NULL, 'AB');
INSERT INTO `pasien` (`id`, `nama`, `tgl_lhr`, `jk`, `alamat`, `hp`, `pendidikan`, `pekerjaan`, `no_bpjs`, `alergi`, `created_time`, `updated_time`, `deleted`, `rm_id`, `nik`, `alamat_ktp`, `agama_id`, `status_pernikahan`, `penanggung_jawab`, `no_telp_penanggung_jawab`, `golongan_darah`) VALUES (14, 'Sifani Affan', '2023-01-17', 'Laki-laki', 'Sidoarjo', '098827381723', NULL, 'Pekerjaan', 12345678, NULL, '2023-01-22 07:50:16', '2023-01-22 07:50:16', 0, NULL, '12345', 'Sidoarjo', 1, '0', NULL, NULL, 'B');
INSERT INTO `pasien` (`id`, `nama`, `tgl_lhr`, `jk`, `alamat`, `hp`, `pendidikan`, `pekerjaan`, `no_bpjs`, `alergi`, `created_time`, `updated_time`, `deleted`, `rm_id`, `nik`, `alamat_ktp`, `agama_id`, `status_pernikahan`, `penanggung_jawab`, `no_telp_penanggung_jawab`, `golongan_darah`) VALUES (15, 'Muhammad Affan', '2023-01-01', 'Laki-laki', 'sidoarjo', '08339287812', NULL, 'Pekerjaan', 78293021213, NULL, '2023-01-22 07:55:06', '2023-01-22 07:55:06', 0, NULL, '098765', 'sidoarjo', 1, '0', NULL, NULL, 'B');
INSERT INTO `pasien` (`id`, `nama`, `tgl_lhr`, `jk`, `alamat`, `hp`, `pendidikan`, `pekerjaan`, `no_bpjs`, `alergi`, `created_time`, `updated_time`, `deleted`, `rm_id`, `nik`, `alamat_ktp`, `agama_id`, `status_pernikahan`, `penanggung_jawab`, `no_telp_penanggung_jawab`, `golongan_darah`) VALUES (16, 'Junaidi Junet', '2002-02-04', 'Laki-laki', 'Jawa Utara', '089927381291', NULL, 'Kuli Bangunan', NULL, NULL, '2023-02-04 02:37:28', '2023-02-04 02:37:28', 1, NULL, '8922019238419', 'Bintaro', 2, '0', NULL, NULL, 'A');
INSERT INTO `pasien` (`id`, `nama`, `tgl_lhr`, `jk`, `alamat`, `hp`, `pendidikan`, `pekerjaan`, `no_bpjs`, `alergi`, `created_time`, `updated_time`, `deleted`, `rm_id`, `nik`, `alamat_ktp`, `agama_id`, `status_pernikahan`, `penanggung_jawab`, `no_telp_penanggung_jawab`, `golongan_darah`) VALUES (17, 'Junaidi Junet', '2002-02-04', 'Laki-laki', 'Jawa Utara', '089927381291', NULL, 'Kuli Bangunan', 1241234, NULL, '2023-02-04 02:54:54', '2023-02-04 02:54:54', 1, NULL, '8922019238419', 'Bintaro', 2, '0', 'qwerq', '12341234', 'A');
COMMIT;

-- ----------------------------
-- Table structure for pengaturan
-- ----------------------------
DROP TABLE IF EXISTS `pengaturan`;
CREATE TABLE `pengaturan` (
  `id` int(1) NOT NULL,
  `n_Klinik` varchar(50) NOT NULL,
  `Slogan` varchar(50) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `gambarbool` tinyint(1) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `jasa` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of pengaturan
-- ----------------------------
BEGIN;
INSERT INTO `pengaturan` (`id`, `n_Klinik`, `Slogan`, `logo`, `gambarbool`, `gambar`, `jasa`) VALUES (1, 'Klinik Arhanud', 'Melayani Sepenuh Hati', 'fa-plus', 0, 'logo1587958142.png', 20000);
COMMIT;

-- ----------------------------
-- Table structure for poli
-- ----------------------------
DROP TABLE IF EXISTS `poli`;
CREATE TABLE `poli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '0 = nonaktif\n1 = aktif',
  `kode` varchar(100) DEFAULT NULL,
  `deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of poli
-- ----------------------------
BEGIN;
INSERT INTO `poli` (`id`, `nama`, `keterangan`, `status`, `kode`, `deleted`) VALUES (1, 'Poli Gigi', 'aaaaa', 1, 'A', 0);
INSERT INTO `poli` (`id`, `nama`, `keterangan`, `status`, `kode`, `deleted`) VALUES (2, 'Poli Umum', NULL, 1, 'B', 0);
INSERT INTO `poli` (`id`, `nama`, `keterangan`, `status`, `kode`, `deleted`) VALUES (3, 'Poli KAI', 'asdfasdfsadf', 1, 'C', 0);
INSERT INTO `poli` (`id`, `nama`, `keterangan`, `status`, `kode`, `deleted`) VALUES (4, 'Poli Testing', 'KKK', 0, 'D', 1);
COMMIT;

-- ----------------------------
-- Table structure for rm
-- ----------------------------
DROP TABLE IF EXISTS `rm`;
CREATE TABLE `rm` (
  `id` int(11) NOT NULL,
  `idpasien` int(11) NOT NULL,
  `ku` varchar(40) NOT NULL,
  `anamnesis` text NOT NULL,
  `pxfisik` text NOT NULL,
  `lab` text,
  `hasil` text,
  `diagnosis` varchar(40) DEFAULT NULL,
  `resep` text,
  `jumlah` text,
  `aturan` text,
  `dokter` int(3) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of rm
-- ----------------------------
BEGIN;
INSERT INTO `rm` (`id`, `idpasien`, `ku`, `anamnesis`, `pxfisik`, `lab`, `hasil`, `diagnosis`, `resep`, `jumlah`, `aturan`, `dokter`, `created_time`, `updated_time`, `deleted`) VALUES (1, 1, 'Pusing', 'Demam 10 hari', 'T:38.7', '3|1|2', '150|260|10', 'Febris', '1|2', '1|6', '3x1|3x1', 2, '2020-04-11 12:26:51', '2020-04-26 13:32:15', 0);
INSERT INTO `rm` (`id`, `idpasien`, `ku`, `anamnesis`, `pxfisik`, `lab`, `hasil`, `diagnosis`, `resep`, `jumlah`, `aturan`, `dokter`, `created_time`, `updated_time`, `deleted`) VALUES (3, 1, 'Pegal', 'Pegal Linu', 'Nyeri tekan di otot biceps', '', '', 'Myalgia', '1', '2', '2x1', 4, '2020-04-12 09:31:03', '2020-04-26 05:51:40', 0);
INSERT INTO `rm` (`id`, `idpasien`, `ku`, `anamnesis`, `pxfisik`, `lab`, `hasil`, `diagnosis`, `resep`, `jumlah`, `aturan`, `dokter`, `created_time`, `updated_time`, `deleted`) VALUES (5, 2, 'lemas', 'Sakit', 'Normal', '', '', 'Typhoid Fever', '2', '10', '2x1', 2, '2020-04-26 05:56:01', '2020-04-26 05:56:01', 0);
COMMIT;

-- ----------------------------
-- Table structure for tenaga_medis
-- ----------------------------
DROP TABLE IF EXISTS `tenaga_medis`;
CREATE TABLE `tenaga_medis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tenaga_medis
-- ----------------------------
BEGIN;
INSERT INTO `tenaga_medis` (`id`, `nama`, `pekerjaan`, `file`) VALUES (1, 'Jamal Musiala ahsanul', 'Dokter', 'tenaga_medis1676782168.jpg');
COMMIT;

-- ----------------------------
-- Table structure for tentang_kami
-- ----------------------------
DROP TABLE IF EXISTS `tentang_kami`;
CREATE TABLE `tentang_kami` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  `content` text,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tentang_kami
-- ----------------------------
BEGIN;
INSERT INTO `tentang_kami` (`id`, `type`, `content`, `updated_at`, `updated_by`) VALUES (1, 'informasi_klinik', '{\"id\":\"informasi_klinik\",\"keterangan\":\"Klinik adalah fasilitas pelayanan kesehatan yang menyelenggarakan dan menyediakan pelayanan medis dasar dan atau spesialistik, diselenggarakan oleh lebih dari satu jenis tenaga kesehatan dan dipimpin oleh seorang tenaga medis (Permenkes RI No.9, 2014).\"}', '2023-02-18 08:37:52', NULL);
INSERT INTO `tentang_kami` (`id`, `type`, `content`, `updated_at`, `updated_by`) VALUES (2, 'visi', '{\"id\":\"visi\",\"visi\":[\"Jangan Kalah\",\"Ayo Bisa\",\"Ahay\"]}', '2023-02-11 12:28:48', NULL);
INSERT INTO `tentang_kami` (`id`, `type`, `content`, `updated_at`, `updated_by`) VALUES (3, 'misi', '{\"id\":\"misi\",\"misi\":[\"Maju Terus Pantang Menyerah\",\"Input misi\"]}', '2023-02-11 03:58:14', NULL);
INSERT INTO `tentang_kami` (`id`, `type`, `content`, `updated_at`, `updated_by`) VALUES (4, 'fasilitas', NULL, NULL, NULL);
INSERT INTO `tentang_kami` (`id`, `type`, `content`, `updated_at`, `updated_by`) VALUES (5, 'layanan', NULL, NULL, NULL);
INSERT INTO `tentang_kami` (`id`, `type`, `content`, `updated_at`, `updated_by`) VALUES (7, 'lokasi', '{\"id\":\"lokasi\",\"keterangan\":\"Klinik Arhanud Kota Batu terletak di Pendem, Kec. Junrejo, Kota Batu, Jawa Timur dengan Kode Pos 65324\"}', '2023-02-11 12:29:04', NULL);
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profesi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `username`, `profesi`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `admin`, `created_at`, `updated_at`, `deleted`) VALUES (2, 'admin', 'Dokter', 'Reza Irfan Raditya', 'rezaraditya21@gmail.com', NULL, '$2y$10$lsIzdwxI18oSYwTJVMNDd.QqN3lsbI6M3B0VhJzl9BEasd8cSIbUK', 'avatar1587795209.jpg', NULL, 1, '2020-04-22 09:54:12', '2020-04-25 09:22:53', 0);
INSERT INTO `users` (`id`, `username`, `profesi`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `admin`, `created_at`, `updated_at`, `deleted`) VALUES (4, 'dokter', 'Dokter', 'Irfan', 'reza@linx.com', NULL, '$2y$10$GWj0qd8EpKugu4ji56nN7.iOanxOVneq4w3Lq4i11iS2uS6pYGoqK', 'default.jpg', NULL, 0, '2020-04-23 04:43:07', '2020-04-25 05:43:18', 0);
INSERT INTO `users` (`id`, `username`, `profesi`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `admin`, `created_at`, `updated_at`, `deleted`) VALUES (5, NULL, 'Staff', 'Alek Kelek', NULL, NULL, '$2y$10$NvOWdrlhoHpf31D/uXUt..hT6U5.m1RY6lhdcW/hIeZpkWj.oUdPu', 'default.jpg', NULL, 0, '2020-04-24 02:05:08', '2020-04-27 04:17:38', 1);
INSERT INTO `users` (`id`, `username`, `profesi`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `admin`, `created_at`, `updated_at`, `deleted`) VALUES (6, NULL, 'Staff', 'test', NULL, NULL, '$2y$10$DcxoUIpnCtZluFcAZgDnvujKQM2X9lT0Ga4oTgks6zxFZJnryIG/K', 'avatar1587712752.jpg', NULL, 1, '2020-04-24 07:19:12', '2020-04-27 04:17:16', 1);
INSERT INTO `users` (`id`, `username`, `profesi`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `admin`, `created_at`, `updated_at`, `deleted`) VALUES (9, 'staff', 'Staff', 'Raditya', 'staff@Raditya.com', NULL, '$2y$10$KLpJyGVF3n7p7rAKv17iL.wHauTIgm/HYLoReHAfX5FJR5MSZ5AQC', 'avatar1587961527.jpg', NULL, 0, '2020-04-25 05:40:12', '2020-04-27 04:33:32', 0);
COMMIT;

-- ----------------------------
-- View structure for v_antrian
-- ----------------------------
DROP VIEW IF EXISTS `v_antrian`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_antrian` AS select `antrian`.`id` AS `id`,`antrian`.`pasien_id` AS `pasien_id`,`antrian`.`status` AS `status`,`antrian`.`no_antrian` AS `no_antrian`,`antrian`.`poli_id` AS `poli_id`,`poli`.`nama` AS `poli_nama`,`poli`.`kode` AS `poli_kode`,`antrian`.`created_at` AS `created_at`,`pasien`.`nama` AS `pasien_nama`,`pasien`.`nik` AS `pasien_nik`,`pasien`.`hp` AS `pasien_hp`,`pasien`.`no_bpjs` AS `pasien_no_bpjs` from ((`antrian` left join `poli` on((`antrian`.`poli_id` = `poli`.`id`))) join `pasien` on((`antrian`.`pasien_id` = `pasien`.`id`)));

-- ----------------------------
-- View structure for v_pasien
-- ----------------------------
DROP VIEW IF EXISTS `v_pasien`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_pasien` AS select `pasien`.`id` AS `id`,`pasien`.`nama` AS `nama`,`pasien`.`tgl_lhr` AS `tgl_lhr`,`pasien`.`jk` AS `jk`,`pasien`.`alamat` AS `alamat`,`pasien`.`hp` AS `hp`,`pasien`.`pendidikan` AS `pendidikan`,`pasien`.`pekerjaan` AS `pekerjaan`,`pasien`.`no_bpjs` AS `no_bpjs`,`pasien`.`alergi` AS `alergi`,`pasien`.`created_time` AS `created_time`,`pasien`.`updated_time` AS `updated_time`,`pasien`.`deleted` AS `deleted`,`pasien`.`rm_id` AS `rm_id`,`pasien`.`nik` AS `nik`,`pasien`.`alamat_ktp` AS `alamat_ktp`,`pasien`.`agama_id` AS `agama_id`,`pasien`.`status_pernikahan` AS `status_pernikahan`,`pasien`.`penanggung_jawab` AS `penanggung_jawab`,`pasien`.`no_telp_penanggung_jawab` AS `no_telp_penanggung_jawab`,`pasien`.`golongan_darah` AS `golongan_darah`,`agama`.`nama` AS `agama_nama` from (`pasien` left join `agama` on((`pasien`.`agama_id` = `agama`.`id`)));

SET FOREIGN_KEY_CHECKS = 1;
