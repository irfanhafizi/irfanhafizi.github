-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 05:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_no_pekerja` varchar(15) NOT NULL,
  `admin_fullname` varchar(255) NOT NULL,
  `admin_icno` varchar(50) NOT NULL,
  `admin_tel` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_profile` text NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_no_pekerja`, `admin_fullname`, `admin_icno`, `admin_tel`, `admin_email`, `admin_profile`, `admin_password`, `admin_created_at`, `admin_updated_at`) VALUES
('123', 'MOHD IRFAN HAFIZI BIN FAKHRURRAZI', '123', '012-4242938', 'irfandevilcry10@gmail.com', '../upload/admin/profile/123_profile.jpg', '$2y$12$X.hu42.3g.QpakL1XWMKme/OrIBMF72QFll8Ti0R8ApbwipVyQyQS', '2023-03-30 02:38:45', '2023-06-06 05:12:17'),
('2', 'ADMIN', '@2', '2', '2@2', '../upload/admin/profile/2_profile.jpg', '$2y$12$ftpGmG331lgCzOj67I16KOqr3fRMGYJL9ipemQNmaL6SB72qUb/We', '2023-06-09 02:14:39', '2023-06-09 02:15:49'),
('222', '222', '222', '222', '222@222', '../upload/admin/profile/profile.png', '$2y$12$mpZ1RULwIwALBhYRhXiGRuX3ItLRx/Z68A.1swJQ7BSOOMWkT9w8a', '2023-05-21 02:59:48', '2023-05-21 02:59:48'),
('271172', 'AZLAN BIN ABDUL AZIZ', '465456098777', '0126654908', 'azlan172@uitm.edu.my', '../upload/admin/profile/profile.png', '$2y$12$kk6.dOsbyOohFOa1dqbH2e1g02x.xVJRKmb2xQJsM1J1/XcegtKK2', '2023-05-18 02:58:08', '2023-05-18 02:58:08');

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `app_matric` varchar(15) NOT NULL,
  `app_fullname` varchar(255) NOT NULL,
  `app_gender` varchar(50) NOT NULL,
  `app_ic` varchar(20) NOT NULL,
  `app_tel` varchar(15) NOT NULL,
  `app_birthdate` date NOT NULL,
  `app_email` varchar(50) NOT NULL,
  `app_faculty` int(11) DEFAULT NULL,
  `app_code` int(11) DEFAULT NULL,
  `app_address_line1` varchar(255) NOT NULL,
  `app_address_line2` varchar(255) DEFAULT NULL,
  `app_poskod` varchar(50) NOT NULL,
  `app_bandar` varchar(50) NOT NULL,
  `app_negeri` varchar(50) NOT NULL,
  `app_document_ic` text NOT NULL,
  `app_document1_ic` text NOT NULL,
  `app_document_matric` text NOT NULL,
  `app_document1_matric` text NOT NULL,
  `app_document_tawaran` text NOT NULL,
  `app_profile` text NOT NULL,
  `app_password` varchar(255) NOT NULL,
  `app_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `app_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`app_matric`, `app_fullname`, `app_gender`, `app_ic`, `app_tel`, `app_birthdate`, `app_email`, `app_faculty`, `app_code`, `app_address_line1`, `app_address_line2`, `app_poskod`, `app_bandar`, `app_negeri`, `app_document_ic`, `app_document1_ic`, `app_document_matric`, `app_document1_matric`, `app_document_tawaran`, `app_profile`, `app_password`, `app_created_at`, `app_updated_at`) VALUES
('11', '11', 'LELAKI', '11', '11', '2023-05-10', '11', 13, 2, '11', '11', '11', '11', 'MELAKA', '../upload/applicant/frontic/11_7846d9d3-7890-491e-920f-8c4f8ebe7c36.jpg', '../upload/applicant/backic/11_7846d9d3-7890-491e-920f-8c4f8ebe7c36.jpg', '../upload/applicant/frontmatric/11_6e84384b-d42b-4975-94b5-64f3b9a78f90.jpg', '../upload/applicant/backmatric/11_6e84384b-d42b-4975-94b5-64f3b9a78f90.jpg', '../upload/applicant/surat_tawaran/11_- Response Page.pdf', '../upload/applicant/profile/11_passport.jpg', '$2y$12$6gZvniTEgsCp8N7OxV6kZeI5pLOX.x9Z.P00h5k15sLvgLhlU.qfy', '2023-05-20 23:47:29', '2023-05-20 23:47:29'),
('111', 'FARAHIN', 'LELAKI', '111', '0124242938', '2023-05-18', 'irfandevilcry10@gmail.com', 10, 14, 'NO. 95, TAMAN SRI MERANTI,', 'JALAN SINTOK, 06010, CHANGLOON, KEDAH', '06010', 'CHANGLUN', 'MELAKA', '../upload/applicant/frontic/111_7846d9d3-7890-491e-920f-8c4f8ebe7c36.jpg', '../upload/applicant/backic/111_7846d9d3-7890-491e-920f-8c4f8ebe7c36.jpg', '../upload/applicant/frontmatric/111_6e84384b-d42b-4975-94b5-64f3b9a78f90.jpg', '../upload/applicant/backmatric/111_6e84384b-d42b-4975-94b5-64f3b9a78f90.jpg', '../upload/applicant/surat_tawaran/111_Bank Islam IB.pdf', '../upload/applicant/profile/111_dp.jpg', '$2y$12$fajLtIaLT.oav2yPNuXeIOvRMO2BWTLqIkEK6GHQ3jJZ/mruq9uiq', '2023-05-22 00:16:49', '2023-05-22 00:16:49'),
('123', 'MOHD IRFAN HAFIZI BIN FAKHRURRAZI', 'LELAKI', '1234', '012-4242938', '2023-03-27', 'irfandevilcry10@gmail.com', 13, 15, 'no. 95, taman sri meranti,', 'jalan sintok, 06010, changloon, kedah', '06010', 'Changlun', 'Kedah', '../upload/applicant/2021176678_Poster of Web-Based Jewelry Management System using WebScrapping.pdf', '', '', '', '0', '../upload/applicant/profile/123_profile.jpg', '$2y$12$6ZGJRcW3Tp97Dgy4vXG6geo.ULDqbcHG1X3EHlDqhLS5obEJKoeE6', '2023-04-03 04:15:02', '2023-05-25 01:15:05'),
('2021', 'SITI BAINUL BINTI NOOR', 'PEREMPUAN', '227870001', '0124242938', '2023-05-18', 'irfandevilcry10@gmail.com', 11, 1, 'NO. 95, TAMAN SRI MERANTI,', 'JALAN SINTOK, 06010, CHANGLOON, KEDAH', '06010', 'CHANGLUN', 'KEDAH', '../upload/applicant/frontic/2021167765_7846d9d3-7890-491e-920f-8c4f8ebe7c36.jpg', '../upload/applicant/backic/2021167765_7846d9d3-7890-491e-920f-8c4f8ebe7c36.jpg', '../upload/applicant/frontmatric/2021167765_6e84384b-d42b-4975-94b5-64f3b9a78f90.jpg', '../upload/applicant/backmatric/2021167765_6e84384b-d42b-4975-94b5-64f3b9a78f90.jpg', '../upload/applicant/surat_tawaran/2021167765_Bank Islam IB.pdf', '../upload/applicant/profile/2021167765_dp.jpg', '$2y$12$mF8HNaUVBA9aeQZDz7slWezdyXH3u6bYmq57TR6bGIM5VvwgLWw8e', '2023-05-18 03:12:37', '2023-05-18 03:29:22'),
('22', 'ZERO', 'PEREMPUAN', '22', '111', '0011-11-11', '111@111', 11, 1, '111', '111', '111', '111', 'KEDAH', '../upload/applicant/frontic/22_75yqzvkpketv5cob.jpg', '../upload/applicant/backic/22_33247.jpg', '../upload/applicant/frontmatric/22_75yqzvkpketv5cob.jpg', '../upload/applicant/backmatric/22_33247.jpg', '../upload/applicant/surat_tawaran/22_Bank Islam IB.pdf', '../upload/applicant/profile/22_artworks-zWK3FLP46r2DIdfo-QzGtfw-t500x500.jpg', '$2y$12$/upgHprGWqWGUPs.Atpatusayftosope8nV7AwKvGyHv5CnQzafai', '2023-06-08 04:31:55', '2023-06-08 04:31:55'),
('222', 'FARAHIN', 'LELAKI', '111', '0124242938', '2023-05-18', 'irfandevilcry10@gmail.com', 10, 14, 'NO. 95, TAMAN SRI MERANTI,', 'JALAN SINTOK, 06010, CHANGLOON, KEDAH', '06010', 'CHANGLUN', 'MELAKA', '../upload/applicant/frontic/222_7846d9d3-7890-491e-920f-8c4f8ebe7c36.jpg', '../upload/applicant/backic/222_7846d9d3-7890-491e-920f-8c4f8ebe7c36.jpg', '../upload/applicant/frontmatric/222_6e84384b-d42b-4975-94b5-64f3b9a78f90.jpg', '../upload/applicant/backmatric/222_6e84384b-d42b-4975-94b5-64f3b9a78f90.jpg', '../upload/applicant/surat_tawaran/222_Bank Islam IB.pdf', '../upload/applicant/profile/222_dp.jpg', '$2y$12$1slcAAPRR312W8ywphbASug1MAe6E6j.FDhTATVzNZgay19svzXMm', '2023-05-22 00:17:02', '2023-05-22 00:17:02');

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `apply_id` int(11) NOT NULL,
  `apply_matric` varchar(50) DEFAULT NULL,
  `apply_sesi` int(11) DEFAULT NULL,
  `apply_email` varchar(50) NOT NULL,
  `apply_tel` varchar(15) NOT NULL,
  `apply_address_line1` varchar(255) NOT NULL,
  `apply_address_line2` varchar(255) NOT NULL,
  `apply_poskod` varchar(50) NOT NULL,
  `apply_bandar` varchar(50) NOT NULL,
  `apply_negeri` varchar(50) NOT NULL,
  `apply_sem` int(11) DEFAULT NULL,
  `apply_cgpa` decimal(10,2) NOT NULL,
  `apply_nama_penasihat` varchar(50) NOT NULL,
  `apply_taraf_perkahwinan` varchar(50) NOT NULL,
  `apply_bank` varchar(20) NOT NULL,
  `apply_bank_penerima` varchar(255) NOT NULL,
  `apply_nama_bank` int(11) DEFAULT NULL,
  `apply_perokok` varchar(10) NOT NULL,
  `apply_nama_keluarga` varchar(255) NOT NULL,
  `apply_pekerjaan_keluarga` varchar(50) NOT NULL,
  `apply_hubungan_keluarga` int(11) DEFAULT NULL,
  `apply_status_perkahwinan_keluarga` varchar(50) NOT NULL,
  `apply_alamat_keluarga` varchar(255) NOT NULL,
  `apply_alamat2_keluarga` varchar(255) DEFAULT NULL,
  `apply_poskod_keluarga` varchar(50) NOT NULL,
  `apply_bandar_keluarga` varchar(50) NOT NULL,
  `apply_negeri_keluarga` varchar(50) NOT NULL,
  `apply_tel_keluarga` varchar(15) NOT NULL,
  `apply_pendapatan_bapa_sebulan` decimal(10,2) NOT NULL,
  `apply_pendapatan_ibu_sebulan` decimal(10,2) NOT NULL,
  `apply_pendapatan_lain_sebulan` decimal(10,2) NOT NULL,
  `apply_jumlah_tanggungan` int(11) NOT NULL,
  `apply_jumlah_tanggungan_oku` int(11) NOT NULL,
  `apply_tajaan` int(11) DEFAULT NULL,
  `apply_jumlah_tajaan` decimal(10,2) NOT NULL,
  `apply_terima_zakat` varchar(10) NOT NULL,
  `apply_kifayah` varchar(50) NOT NULL,
  `apply_sebab` text NOT NULL,
  `apply_document` text NOT NULL,
  `apply_pengakuan` tinyint(1) NOT NULL,
  `apply_status` int(11) DEFAULT NULL,
  `apply_status_sebab` varchar(255) NOT NULL DEFAULT '---',
  `apply_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `apply_updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`apply_id`, `apply_matric`, `apply_sesi`, `apply_email`, `apply_tel`, `apply_address_line1`, `apply_address_line2`, `apply_poskod`, `apply_bandar`, `apply_negeri`, `apply_sem`, `apply_cgpa`, `apply_nama_penasihat`, `apply_taraf_perkahwinan`, `apply_bank`, `apply_bank_penerima`, `apply_nama_bank`, `apply_perokok`, `apply_nama_keluarga`, `apply_pekerjaan_keluarga`, `apply_hubungan_keluarga`, `apply_status_perkahwinan_keluarga`, `apply_alamat_keluarga`, `apply_alamat2_keluarga`, `apply_poskod_keluarga`, `apply_bandar_keluarga`, `apply_negeri_keluarga`, `apply_tel_keluarga`, `apply_pendapatan_bapa_sebulan`, `apply_pendapatan_ibu_sebulan`, `apply_pendapatan_lain_sebulan`, `apply_jumlah_tanggungan`, `apply_jumlah_tanggungan_oku`, `apply_tajaan`, `apply_jumlah_tajaan`, `apply_terima_zakat`, `apply_kifayah`, `apply_sebab`, `apply_document`, `apply_pengakuan`, `apply_status`, `apply_status_sebab`, `apply_created_at`, `apply_updated_at`) VALUES
(1383, '2021', 26, 'irfandevilcry10@gmail.com', '0124242938', 'NO. 95, TAMAN SRI MERANTI,', 'JALAN SINTOK, 06010, CHANGLOON, KEDAH', '06010', 'CHANGLUN', 'KEDAH', 1, '3.80', 'MOHD ZAINAL', 'BUJANG', '203884433', 'MOHD IRFAN HAFIZI BIN FAKHRURRAZI', NULL, 'YA', 'FAKHRU', 'GURU', 2, 'BERKAHWIN', '', NULL, '121', 'CHANGLUN', 'KELANTAN', '01234444', '1500.00', '4000.00', '1000.00', 5, 1, 2, '1200.00', 'YA', 'MISKIN', 'SAJA', '../upload/apply/2021167765_SEMESTER 1_BORANG JUBAH UITM.pdf', 1, 9, 'sombong', '2023-05-18 11:15:55', '2023-05-21 12:15:04'),
(1386, '2021', 26, 'irfandevilcry10@gmail.com', '0124242938', 'NO. 95, TAMAN SRI MERANTI,', 'JALAN SINTOK, 06010, CHANGLOON, KEDAH', '06010', 'CHANGLUN', 'PERAK', 3, '3.00', 'SDS', 'BUJANG', '23', 'MOHD IRFAN HAFIZI BIN FAKHRURRAZI', NULL, 'TIDAK', 'MOHD IRFAN HAFIZI BIN FAKHRURRAZI', 'GURU', 7, 'DUDA', 'NO. 95, TAMAN SRI MERANTI,', 'JALAN SINTOK, 06010, CHANGLOON, KEDAH', '121', 'CHANGLUN', 'PERAK', '0124242938', '0.00', '0.00', '0.00', 0, 0, 6, '0.00', 'YA', 'MISKIN', 's', '../upload/apply/2021_SEMESTER 3_Bank Islam IB.pdf', 1, 8, '---', '2023-05-18 12:33:56', '2023-05-22 08:29:37'),
(1387, '2021', 26, 'irfandevilcry10@gmail.com', '0124242938', 'NO. 95, TAMAN SRI MERANTI,', 'JALAN SINTOK, 06010, CHANGLOON, KEDAH', '06010', 'CHANGLUN', 'PERAK', 3, '3.00', 'SDS', 'BUJANG', '23', 'MOHD IRFAN HAFIZI BIN FAKHRURRAZI', NULL, 'TIDAK', 'MOHD IRFAN HAFIZI BIN FAKHRURRAZI', 'GURU', 7, 'DUDA', 'NO. 95, TAMAN SRI MERANTI,', 'JALAN SINTOK, 06010, CHANGLOON, KEDAH', '121', 'CHANGLUN', 'PERAK', '0124242938', '0.00', '0.00', '0.00', 0, 0, 6, '0.00', 'YA', 'MISKIN', 's', '../upload/apply/2021_SEMESTER 3_Bank Islam IB.pdf', 1, 8, '---', '2023-05-18 12:33:56', '2023-05-22 15:57:07'),
(1388, '2021', 26, 'irfandevilcry10@gmail.com', '0124242938', 'NO. 95, TAMAN SRI MERANTI,', 'JALAN SINTOK, 06010, CHANGLOON, KEDAH', '06010', 'CHANGLUN', 'PERAK', 3, '3.00', 'SDS', 'BUJANG', '23', 'MOHD IRFAN HAFIZI BIN FAKHRURRAZI', NULL, 'TIDAK', 'MOHD IRFAN HAFIZI BIN FAKHRURRAZI', 'GURU', 7, 'DUDA', 'NO. 95, TAMAN SRI MERANTI,', 'JALAN SINTOK, 06010, CHANGLOON, KEDAH', '121', 'CHANGLUN', 'PERAK', '0124242938', '0.00', '0.00', '0.00', 0, 0, 6, '0.00', 'YA', 'MISKIN', 's', '../upload/apply/2021_SEMESTER 3_Bank Islam IB.pdf', 1, 3, '---', '2023-05-18 12:33:56', '2023-05-22 08:25:21'),
(1393, '123', 26, 'irfandevilcry10@gmail.com', '0124242938', 'NO. 95, TAMAN SRI MERANTI,', 'JALAN SINTOK, 06010, CHANGLOON, KEDAH', '06010', 'CHANGLUN', 'KEDAH', 2, '4.00', 'SDS', 'BUJANG', 'er', 'MOHD IRFAN HAFIZI BIN FAKHRURRAZI', 8, 'TIDAK', 'MOHD IRFAN HAFIZI BIN FAKHRURRAZI', 'GURU', 2, 'BERKAHWIN', 'NO. 95, TAMAN SRI MERANTI,', 'JALAN SINTOK, 06010, CHANGLOON, KEDAH', '06010', '3', 'PULAU PINANG', '0124242938', '0.01', '0.01', '0.01', 1, 1, 2, '0.00', 'TIDAK', 'FAKIR', 'ss', '../upload/apply/123_SEMESTER 2_Bank Islam IB.pdf', 1, 9, 'sombong', '2023-05-21 10:13:14', '2023-06-06 14:39:12'),
(1394, '2021', 41, 'irfandevilcry10@gmail.com', '0124242938', 'NO. 95, TAMAN SRI MERANTI,', 'JALAN SINTOK, 06010, CHANGLOON, KEDAH', '06010', 'CHANGLUN', 'KEDAH', 1, '3.80', 'MOHD ZAINAL', 'BUJANG', '203884433', 'MOHD IRFAN HAFIZI BIN FAKHRURRAZI', NULL, 'YA', 'FAKHRU', 'GURU', 2, 'BERKAHWIN', '', NULL, '121', 'CHANGLUN', 'KELANTAN', '01234444', '1500.00', '4000.00', '1000.00', 5, 1, 2, '1200.00', 'YA', 'MISKIN', 'SAJA', '../upload/apply/2021167765_SEMESTER 1_BORANG JUBAH UITM.pdf', 1, 8, '', '2023-05-18 11:15:55', '2023-06-09 15:58:07'),
(1395, '2021', 26, 'irfandevilcry10@gmail.com', '0124242938', 'NO. 95, TAMAN SRI MERANTI,', 'JALAN SINTOK, 06010, CHANGLOON, KEDAH', '06010', 'CHANGLUN', 'KEDAH', 1, '3.80', 'MOHD ZAINAL', 'BUJANG', '203884433', 'MOHD IRFAN HAFIZI BIN FAKHRURRAZI', NULL, 'YA', 'FAKHRU', 'GURU', 2, 'BERKAHWIN', '2', '3', '121', 'CHANGLUN', 'KELANTAN', '01234444', '1500.00', '4000.00', '1000.00', 5, 1, 2, '1200.00', 'YA', 'MISKIN', 'SAJA', '../upload/apply/2021167765_SEMESTER 1_BORANG JUBAH UITM.pdf', 1, 7, '', '2023-05-18 11:15:55', '2023-06-09 12:35:50'),
(1396, '222', 26, 'irfand@gmail.com', '0124242938', 'NO. 95, TAMAN SRI MERANTI,', 'JALAN SINTOK, 06010, CHANGLOON, KEDAH', '06010', 'CHANGLUN', 'MELAKA', 3, '3.60', 'WE', 'BUJANG', '242', 'RTETET', 4, 'YA', 'MOHD IRFAN HAFIZI BIN FAKHRURRAZI', 'GURU', 2, 'BUJANG', 'NO. 95, TAMAN SRI MERANTI,', 'JALAN SINTOK, 06010, CHANGLOON, KEDAH', '06010', 'CHANGLUN', 'PULAU PINANG', '0124242938', '1000.00', '1000.00', '1000.00', 10, 3, 3, '15666.00', 'YA', 'MISKIN', 'zxcvbnm,hgf', '../upload/apply/222_SEMESTER 3_Bank Islam IB.pdf', 1, 6, 'sombong', '2023-05-22 08:19:04', '2023-06-09 12:41:29'),
(1397, '123', 26, 'irfandevilcry10@gmail.com', '0124242938', 'NO. 95, TAMAN SRI MERANTI,', 'JALAN SINTOK, 06010, CHANGLOON, KEDAH', '06010', 'CHANGLUN', 'PULAU PINANG', 2, '4.00', 'SDS', 'BUJANG', 'er', 'MOHD IRFAN HAFIZI BIN FAKHRURRAZI', 2, 'TIDAK', 'MOHD IRFAN HAFIZI BIN FAKHRURRAZI', 'GURU', 2, 'BERKAHWIN', 'NO. 95, TAMAN SRI MERANTI,', 'JALAN SINTOK, 06010, CHANGLOON, KEDAH', '06010', '3', 'PULAU PINANG', '0124242938', '0.01', '0.01', '0.01', 1, 1, 2, '0.00', 'TIDAK', 'FAKIR', 'ss', '../upload/apply/123_SEMESTER 2_Bank Islam IB.pdf', 1, 8, '', '2023-05-21 10:13:14', '2023-05-25 11:16:00'),
(1398, '123', 26, 'irfandevilcry10@gmail.com', '0124242938', 'NO. 95, TAMAN SRI MERANTI,', 'JALAN SINTOK, 06010, CHANGLOON, KEDAH', '06010', 'CHANGLUN', 'PERLIS', 20, '3.00', '34', 'BUJANG', 'asd', 'MOHD IRFAN HAFIZI BIN FAKHRURRAZI', 3, 'TIDAK', 'MOHD IRFAN HAFIZI BIN FAKHRURRAZI', 'DR', 2, 'DUDA', 'NO. 95, TAMAN SRI MERANTI,', 'JALAN SINTOK, 06010, CHANGLOON, KEDAH', '121', 'CHANGLUN', 'PERLIS', '0124242938', '1000.00', '0.02', '0.02', 0, 0, 2, '0.00', 'YA', 'MISKIN', ',', '../upload/apply/123_SEMESTER 6_- Response Page.pdf', 1, 8, '', '2023-05-26 11:45:25', '2023-06-06 14:39:23'),
(1401, '123', 41, 'irfandevilcry10@gmail.com', '0124242938', 'NO. 95, TAMAN SRI MERANTI,', 'JALAN SINTOK, 06010, CHANGLOON, KEDAH', '06010', 'CHANGLUN', 'PULAU PINANG', 1, '3.00', '34', 'BUJANG', '23', 'MOHD IRFAN HAFIZI BIN FAKHRURRAZI', 3, 'YA', 'MOHD IRFAN HAFIZI BIN FAKHRURRAZI', 'GURU', 2, 'BERKAHWIN', 'NO. 95, TAMAN SRI MERANTI,', 'JALAN SINTOK, 06010, CHANGLOON, KEDAH', '06010', 'CHANGLUN', 'PULAU PINANG', '0124242938', '1000.00', '1000.00', '50.00', 4, 0, 6, '0.00', 'YA', 'TAK LAYAK', 'waspada', '../upload/apply/123_SEMESTER 1_Bank Islam IB.pdf', 1, 8, '', '2023-06-08 14:38:55', '2023-06-09 16:07:00'),
(1402, '123', 41, 'irfandevilcry10@gmail.com', '0124242938', 'NO. 95, TAMAN SRI MERANTI,', 'JALAN SINTOK, 06010, CHANGLOON, KEDAH', '06010', 'CHANGLUN', 'PULAU PINANG', 3, '3.00', '34', 'BUJANG', '23', 'MOHD IRFAN HAFIZI BIN FAKHRURRAZI', 3, 'YA', 'MOHD IRFAN HAFIZI BIN FAKHRURRAZI', 'GURU', 2, 'BERKAHWIN', 'NO. 95, TAMAN SRI MERANTI,', 'JALAN SINTOK, 06010, CHANGLOON, KEDAH', '06010', 'CHANGLUN', 'PULAU PINANG', '0124242938', '1000.00', '1000.00', '50.00', 4, 0, 6, '0.00', 'YA', 'TAK LAYAK', 'waspada', '../upload/apply/123_SEMESTER 1_Bank Islam IB.pdf', 1, 6, '', '2023-06-08 14:38:55', '2023-06-09 12:40:42'),
(1403, '123', 41, 'irfandevilcry10@gmail.com', '0124242938', 'NO. 95, TAMAN SRI MERANTI,', 'JALAN SINTOK, 06010, CHANGLOON, KEDAH', '06010', 'CHANGLUN', 'PAHANG', 9, '3.00', '34', 'BUJANG', '23', 'MOHD IRFAN HAFIZI BIN FAKHRURRAZI', 8, 'YA', '', '', NULL, '', '', NULL, '', '', '', '', '0.00', '0.00', '0.00', 0, 0, NULL, '0.00', '', '', '', '', 0, 1, '---', '2023-06-09 12:53:03', '2023-06-09 12:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `bank_updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_name`, `bank_created_at`, `bank_updated_at`) VALUES
(2, 'Maybank', '2023-05-22 08:04:42', '2023-05-22 08:04:42'),
(3, 'CIMB Bank', '2023-05-22 08:11:11', '2023-05-22 08:11:11'),
(4, 'Public Bank Berhad', '2023-05-22 08:11:17', '2023-05-22 08:11:17'),
(5, 'RHB Bank', '2023-05-22 08:11:23', '2023-05-22 08:11:23'),
(6, 'Hong Leong Bank', '2023-05-22 08:11:40', '2023-05-22 08:11:40'),
(7, '	AmBank', '2023-05-22 08:11:46', '2023-05-22 08:11:46'),
(8, 'Bank Rakyat', '2023-05-22 08:11:56', '2023-05-22 08:11:56'),
(9, 'Affin Bank', '2023-05-22 08:12:02', '2023-05-22 08:12:02'),
(10, 'Bank Islam Malaysia', '2023-05-22 08:12:09', '2023-05-22 08:12:09');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fac_id` int(11) NOT NULL,
  `fac_name` varchar(50) NOT NULL,
  `fac_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `fac_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fac_id`, `fac_name`, `fac_created_at`, `fac_updated_at`) VALUES
(10, 'SPORTS SCIENCE AND RECREATION', '2023-05-18 03:02:48', '2023-05-18 03:02:48'),
(11, 'PLANTATION & AGROTECHNOLOGY', '2023-05-18 03:02:58', '2023-05-18 03:02:58'),
(12, 'BUSINESS AND MANAGEMENT', '2023-05-18 03:03:07', '2023-05-18 03:03:07'),
(13, 'ACCOUNTANCY', '2023-05-18 03:03:19', '2023-05-18 03:03:19'),
(14, 'COLLEGE OF COMPUTING, INFORMATICS AND MEDIA', '2023-05-18 03:03:28', '2023-05-18 03:03:28'),
(15, 'APPLIED SCIENCES', '2023-05-18 03:03:37', '2023-05-18 03:03:37'),
(17, 'COLLEGE OF BUILT ENVIRONMENT', '2023-05-19 03:13:21', '2023-05-19 03:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `form_id` int(11) NOT NULL,
  `form_open` tinyint(1) NOT NULL DEFAULT 0,
  `form_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `form_updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`form_id`, `form_open`, `form_created_at`, `form_updated_at`) VALUES
(1, 1, '2023-05-02 09:50:46', '2023-06-08 12:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `hadkifayah`
--

CREATE TABLE `hadkifayah` (
  `had_id` int(11) NOT NULL,
  `had_minum` double(10,2) DEFAULT NULL,
  `had_penginapan` double(10,2) DEFAULT NULL,
  `had_pakaian` double(10,2) DEFAULT NULL,
  `had_perubatan` double(10,2) DEFAULT NULL,
  `had_komunikasi` double(10,2) DEFAULT NULL,
  `had_pengankutan` double(10,2) DEFAULT NULL,
  `had_peralatan` double(10,2) DEFAULT NULL,
  `had_pengajian` double(10,2) DEFAULT NULL,
  `had_persatuan` double(10,2) DEFAULT NULL,
  `had_buku` double(10,2) DEFAULT NULL,
  `had_percetakan` double(10,2) DEFAULT NULL,
  `had_utiliti` double(10,2) DEFAULT NULL,
  `had_kk` double(10,2) DEFAULT NULL,
  `had_kerja` double(10,2) DEFAULT NULL,
  `had_jumlah_sara` double(10,2) DEFAULT NULL,
  `had_jumlah_akademik` double(10,2) DEFAULT NULL,
  `had_jumlah` double(10,2) DEFAULT NULL,
  `had_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `had_updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hadkifayah`
--

INSERT INTO `hadkifayah` (`had_id`, `had_minum`, `had_penginapan`, `had_pakaian`, `had_perubatan`, `had_komunikasi`, `had_pengankutan`, `had_peralatan`, `had_pengajian`, `had_persatuan`, `had_buku`, `had_percetakan`, `had_utiliti`, `had_kk`, `had_kerja`, `had_jumlah_sara`, `had_jumlah_akademik`, `had_jumlah`, `had_created_at`, `had_updated_at`) VALUES
(1, 100.00, 100.00, 100.00, 100.00, 100.00, 100.00, 100.01, 100.00, 100.00, 100.00, 100.00, 100.00, 100.00, 100.00, 700.01, 700.00, 1400.01, '2023-05-29 09:46:37', '2023-05-30 09:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `hubungan`
--

CREATE TABLE `hubungan` (
  `hubungan_id` int(11) NOT NULL,
  `hubungan_name` varchar(255) NOT NULL,
  `hubungan_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `hubungan_updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hubungan`
--

INSERT INTO `hubungan` (`hubungan_id`, `hubungan_name`, `hubungan_created_at`, `hubungan_updated_at`) VALUES
(1, 'BAPA', '2023-05-08 07:47:00', '2023-05-16 10:20:49'),
(2, 'IBU', '2023-05-08 07:47:08', '2023-05-16 10:20:53'),
(3, 'BAPA TIRI', '2023-05-08 07:47:15', '2023-05-16 10:20:58'),
(4, 'IBU TIRI', '2023-05-08 07:47:20', '2023-05-16 10:21:02'),
(5, 'BAPA ANGKAT', '2023-05-08 07:47:27', '2023-05-16 10:21:08'),
(6, 'IBU ANGKAT', '2023-05-08 07:47:35', '2023-05-16 10:21:15'),
(7, 'DATUK', '2023-05-08 07:47:43', '2023-05-16 10:21:19'),
(8, 'NENEK', '2023-05-08 07:47:46', '2023-05-16 10:21:23'),
(9, 'ABANG', '2023-05-08 07:48:07', '2023-05-16 10:21:28'),
(10, 'KAKAK', '2023-05-08 07:48:10', '2023-05-16 10:21:34'),
(11, 'ADIK', '2023-05-08 07:48:20', '2023-05-16 10:21:38'),
(12, 'SAUDARA', '2023-05-08 07:48:24', '2023-05-16 10:21:42'),
(13, 'LAIN-LAIN', '2023-05-08 07:48:31', '2023-05-16 10:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

CREATE TABLE `interview` (
  `interview_id` int(11) NOT NULL,
  `interview_sesi` int(11) DEFAULT NULL,
  `interview_interviewer` varchar(15) DEFAULT NULL,
  `interview_apply` int(11) DEFAULT NULL,
  `interview_asnaf` varchar(255) NOT NULL,
  `interview_pengajian` varchar(255) NOT NULL,
  `interview_pinjaman` varchar(255) NOT NULL,
  `interview_yatim` varchar(255) NOT NULL,
  `interview_amt` decimal(10,2) NOT NULL,
  `interview_amt_final` decimal(10,2) NOT NULL,
  `interview_nota` varchar(255) DEFAULT '---',
  `interview_status` int(11) DEFAULT NULL,
  `interview_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `interview_updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interview`
--

INSERT INTO `interview` (`interview_id`, `interview_sesi`, `interview_interviewer`, `interview_apply`, `interview_asnaf`, `interview_pengajian`, `interview_pinjaman`, `interview_yatim`, `interview_amt`, `interview_amt_final`, `interview_nota`, `interview_status`, `interview_created_at`, `interview_updated_at`) VALUES
(59, 26, '123', 1383, 'MISKIN', 'MASTER/PHD', 'YA', 'TIDAK', '300.00', '300.00', '', 7, '2023-05-19 14:35:03', '2023-05-22 15:48:10'),
(60, 26, '123', 1386, 'MISKIN', 'DIPLOMA', 'YA', 'YA', '300.00', '2000.00', 'ayah pemohon dikejar ahlong.', 7, '2023-05-19 14:35:03', '2023-06-07 13:11:32'),
(61, 26, '123', 1387, 'FAKIR', 'IJAZAH', 'YA', 'YA', '1000.00', '83.00', 'azaz', 8, '2023-05-19 14:35:03', '2023-06-07 13:11:12'),
(63, 26, '2021', 1395, '', '', '', '', '5.00', '0.00', '---', 6, '2023-05-21 11:38:14', '2023-06-09 12:38:45'),
(65, 26, '2021', 1388, '', '', '', '', '0.00', '0.00', '---', 6, '2023-05-22 08:25:35', '2023-05-22 08:25:35'),
(70, 26, '123', 1393, 'MISKIN', 'MASTER/PHD', 'TIDAK', 'YA', '1720.00', '1720.00', '', 9, '2023-06-06 14:18:21', '2023-06-06 14:38:56'),
(71, 26, '123', 1398, 'MISKIN', 'DIPLOMA', 'TIDAK', 'YA', '1520.00', '520.00', '', 8, '2023-06-06 14:18:21', '2023-06-06 14:39:23'),
(72, 41, '123', 1402, '', '', '', '', '0.00', '0.00', '---', 6, '2023-06-09 12:40:42', '2023-06-09 12:40:42'),
(73, 26, '123', 1396, '', '', '', '', '0.00', '0.00', '---', 6, '2023-06-09 12:41:29', '2023-06-09 12:41:29'),
(79, 41, '123', 1394, 'MISKIN', 'IJAZAH', 'YA', 'YA', '370.00', '1000.00', '', 8, '2023-06-09 15:49:31', '2023-06-09 15:58:07'),
(80, 41, '123', 1401, 'FAKIR', 'MASTER/PHD', 'TIDAK', 'TIDAK', '700.00', '1000.00', '', 8, '2023-06-09 15:49:32', '2023-06-09 16:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `interviewer`
--

CREATE TABLE `interviewer` (
  `inter_no_pekerja` varchar(15) NOT NULL,
  `inter_ic` varchar(15) NOT NULL,
  `inter_name` varchar(255) NOT NULL,
  `inter_faculty` int(11) DEFAULT NULL,
  `inter_tel` varchar(15) NOT NULL,
  `inter_email` varchar(50) NOT NULL,
  `inter_profile` text NOT NULL,
  `inter_password` varchar(255) NOT NULL,
  `inter_status` tinyint(1) NOT NULL DEFAULT 1,
  `inter_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `inter_updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interviewer`
--

INSERT INTO `interviewer` (`inter_no_pekerja`, `inter_ic`, `inter_name`, `inter_faculty`, `inter_tel`, `inter_email`, `inter_profile`, `inter_password`, `inter_status`, `inter_created_at`, `inter_updated_at`) VALUES
('123', '123', 'PENEMUDUGAZ', 14, '0124242938', '11@123', '../upload/interviewer/profile/123_profile.jpg', '$2y$12$1No6ZQkt2NI5ZL8ZhggVr.wPXG0q27f/fT9BKPcT72lJa.k5sqz4K', 1, '2023-05-18 15:56:55', '2023-06-09 15:48:52'),
('2021', '0011', 'NOORFAIZALFARID', 11, '0124233833', 'nfaizalf@uitm.edu.my', '../upload/interviewer/profile/profile.png', '$2y$12$HgFL32aufPehmEXRzKkqZOMo5AgvWaAEwSylcwvtzlPg3D2z9V9A.', 0, '2023-05-18 11:38:00', '2023-05-26 11:17:03'),
('22', '22', 'ZERO', 12, '22', '22@22', '../upload/interviewer/profile/profile.png', '$2y$12$Ns0hG1pE4.FP9IzQUoFAKOkfQDORopVLROSEz6c6cxnLOMz434rjy', 1, '2023-06-08 14:12:49', '2023-06-08 14:12:49'),
('3', '3', '3', 11, '3', '3@3', '../upload/interviewer/profile/3_profile.jpg', '$2y$12$0U5DxQNJB8tCtRhVml7hd.MlY3NoiGakwXc26Np5xfnVNmqa6GwDq', 1, '2023-06-09 10:13:30', '2023-06-09 10:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `kodprogram`
--

CREATE TABLE `kodprogram` (
  `kod_id` int(11) NOT NULL,
  `kod_name` varchar(255) NOT NULL,
  `kod_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `kod_updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kodprogram`
--

INSERT INTO `kodprogram` (`kod_id`, `kod_name`, `kod_created_at`, `kod_updated_at`) VALUES
(1, 'SR241', '2023-05-18 00:56:17', '2023-05-18 00:56:17'),
(2, '\r\nSR243', '2023-05-18 11:04:46', '2023-05-18 11:04:46'),
(3, 'SR245', '2023-05-18 11:05:02', '2023-05-18 11:05:02'),
(4, 'SR111', '2023-05-18 11:05:13', '2023-05-18 11:05:13'),
(5, 'SR113', '2023-05-18 11:05:30', '2023-05-18 11:05:30'),
(6, 'AT232', '2023-05-18 11:05:52', '2023-05-18 11:05:52'),
(7, 'AT110', '2023-05-18 11:06:02', '2023-05-18 11:06:02'),
(10, 'BM240/BA240', '2023-05-22 07:44:04', '2023-05-22 07:44:04'),
(11, 'BM242/BA242', '2023-05-22 07:44:14', '2023-05-22 07:44:14'),
(12, 'BM243/BA243', '2023-05-22 07:44:26', '2023-05-22 07:44:26'),
(13, 'AC120', '2023-05-22 07:44:47', '2023-05-22 07:44:47'),
(14, 'CS110', '2023-05-22 07:45:11', '2023-05-22 07:45:11'),
(15, 'CS143', '2023-05-22 07:45:22', '2023-05-22 07:45:22'),
(16, 'CS240', '2023-05-22 07:45:38', '2023-05-22 07:45:38'),
(17, 'CS248', '2023-05-22 07:45:48', '2023-05-22 07:45:48'),
(18, 'CS251', '2023-05-22 07:45:59', '2023-05-22 07:45:59'),
(19, 'CS255', '2023-05-22 07:46:11', '2023-05-22 07:46:11'),
(20, ' AS201', '2023-05-22 07:46:35', '2023-05-22 07:46:35'),
(21, 'AS202', '2023-05-22 07:46:48', '2023-05-22 07:46:48'),
(22, ' AS203', '2023-05-22 07:47:17', '2023-05-22 07:47:17'),
(23, 'AS222', '2023-05-22 07:47:26', '2023-05-22 07:47:26'),
(24, 'AS243', '2023-05-22 07:47:35', '2023-05-22 07:47:35'),
(25, 'AS245', '2023-05-22 07:47:43', '2023-05-22 07:47:43'),
(26, 'AS254', '2023-05-22 07:47:50', '2023-05-22 07:47:50'),
(27, 'AS113', '2023-05-22 07:47:58', '2023-05-22 07:47:58'),
(28, 'AS115', '2023-05-22 07:48:05', '2023-05-22 07:48:05'),
(29, ' AS120', '2023-05-22 07:48:12', '2023-05-22 07:48:12'),
(30, ' AP220', '2023-05-22 07:48:25', '2023-05-22 07:48:25'),
(31, 'AP120', '2023-05-22 07:48:35', '2023-05-22 07:48:35');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nilai_id` int(11) NOT NULL,
  `nilai_name` varchar(255) NOT NULL,
  `nilai_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `nilai_updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nilai_id`, `nilai_name`, `nilai_created_at`, `nilai_updated_at`) VALUES
(1, 'Sa', '2023-05-13 16:02:55', '2023-05-15 15:47:20'),
(2, 'Average', '2023-05-13 16:02:55', '2023-05-13 16:02:55'),
(3, 'Good', '2023-05-13 16:03:13', '2023-05-13 16:03:13'),
(4, 'Very Good', '2023-05-13 16:03:13', '2023-05-13 16:03:13'),
(5, 'S', '2023-05-13 16:03:19', '2023-05-15 15:50:38');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `sem_id` int(11) NOT NULL,
  `sem_name` varchar(50) NOT NULL,
  `sem_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `sem_updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`sem_id`, `sem_name`, `sem_created_at`, `sem_updated_at`) VALUES
(1, 'SEMESTER 1', '2023-04-06 14:35:22', '2023-05-16 10:11:53'),
(2, 'SEMESTER 2', '2023-04-06 14:35:22', '2023-05-16 10:12:01'),
(3, 'SEMESTER 3', '2023-04-06 14:35:51', '2023-05-16 10:12:06'),
(9, 'SEMESTER 4', '2023-05-07 10:37:40', '2023-05-16 10:12:09'),
(10, 'SEMESTER 5', '2023-05-07 10:37:47', '2023-05-16 10:12:14'),
(20, 'SEMESTER 6', '2023-05-12 08:10:37', '2023-05-16 10:12:19'),
(21, 'SEMESTER 7', '2023-05-12 08:10:42', '2023-05-16 10:12:22'),
(23, 'SEMESTER 8', '2023-05-12 08:12:05', '2023-05-16 10:12:26'),
(24, 'SEMESTER 9', '2023-05-12 08:12:13', '2023-05-16 10:12:29'),
(26, 'SEMESTER 10', '2023-05-12 08:15:20', '2023-05-16 10:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `sesi`
--

CREATE TABLE `sesi` (
  `sesi_id` int(11) NOT NULL,
  `sesi_name` varchar(50) NOT NULL,
  `sesi_date_start` varchar(255) NOT NULL,
  `sesi_date_end` varchar(255) NOT NULL,
  `sesi_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `sesi_updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sesi`
--

INSERT INTO `sesi` (`sesi_id`, `sesi_name`, `sesi_date_start`, `sesi_date_end`, `sesi_created_at`, `sesi_updated_at`) VALUES
(1, 'SESI AWAL', '2023-05-30', '2023-05-30', '2023-05-12 15:11:27', '2023-05-12 15:11:45'),
(2, 'SESI APRIL23', '2023-05-1', '2023-05-30', '2023-04-18 09:56:23', '2023-06-08 11:26:31'),
(26, 'SESI MAC 2023', '2023-05-18', '2023-05-18', '2023-05-18 11:01:48', '2023-06-08 11:26:46'),
(41, 'SESI JUNE 2023', '2023-06-09', '2023-06-30', '2023-06-08 12:18:24', '2023-06-09 16:26:54'),
(43, 'SESI JAN2023', '2023-04-10', '2023-04-12', '2023-06-09 16:23:27', '2023-06-09 16:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL,
  `status_description` varchar(255) DEFAULT NULL,
  `status_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status_updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`, `status_description`, `status_created_at`, `status_updated_at`) VALUES
(1, 'Belum hantar', 'Untuk permohonan yang belum lengkap', '2023-05-08 12:26:10', '2023-05-21 12:10:10'),
(2, 'Telah mohon', 'Untuk permohonan yang telah dihantar', '2023-05-08 12:26:28', '2023-05-13 14:47:41'),
(3, 'Permohonan diterima', 'Untuk permohonan yang telah disemak dan disahkan oleh pentadbir', '2023-05-08 12:28:21', '2023-05-13 14:47:37'),
(4, 'Permohonan perlu pembetulan', 'Untuk permohonan yang telah disemak oleh pentadbir tetapi tidak lengkap', '2023-05-08 12:28:46', '2023-05-13 14:47:34'),
(5, 'Permohonan ditolak', 'Untuk permohonan yang telah disemak dan ditolak oleh pentadbir', '2023-05-08 12:28:58', '2023-05-13 14:47:30'),
(6, 'Peringkat temuduga', 'Untuk permohonan yang telah ditugaskan penemuduga tetapi belum dinilai oleh penemuduga', '2023-05-11 11:24:26', '2023-05-19 11:17:11'),
(7, 'Temuduga Selesai', 'Untuk permohonan yang telah ditugaskan penemuduga dan telah dinilai oleh penemuduga', '2023-05-11 11:25:05', '2023-05-13 14:47:23'),
(8, 'Permohonan berjaya', 'Untuk permohonan yang telah diluluskan', '2023-05-12 09:16:28', '2023-05-13 14:47:19'),
(9, 'Permohonan zakat gagal', 'Untuk penolakan selepas ditemuduga', '2023-05-12 09:18:41', '2023-05-13 14:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `tajaan`
--

CREATE TABLE `tajaan` (
  `taja_id` int(11) NOT NULL,
  `taja_name` varchar(50) NOT NULL,
  `taja_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `taja_updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tajaan`
--

INSERT INTO `tajaan` (`taja_id`, `taja_name`, `taja_created_at`, `taja_updated_at`) VALUES
(1, 'JPA', '2023-04-19 09:44:44', '2023-04-19 09:44:44'),
(2, 'PTPTN', '2023-04-19 09:44:44', '2023-04-19 09:44:44'),
(3, 'MARA', '2023-04-19 09:44:44', '2023-04-19 09:44:44'),
(4, 'KERAJAAN NEGERI', '2023-04-19 09:45:37', '2023-05-04 20:58:01'),
(5, 'LAIN-LAIN', '2023-04-19 09:45:37', '2023-04-19 09:45:37'),
(6, 'TIADA TAJAAN', '2023-04-19 09:45:37', '2023-04-19 09:45:37');

-- --------------------------------------------------------

--
-- Table structure for table `zakatamt`
--

CREATE TABLE `zakatamt` (
  `amt_id` int(11) NOT NULL,
  `amt_fakir_diploma_0` decimal(10,2) NOT NULL,
  `amt_fakir_diploma_1` decimal(10,2) NOT NULL,
  `amt_fakir_ijazah_0` decimal(10,2) NOT NULL,
  `amt_fakir_ijazah_1` decimal(10,2) NOT NULL,
  `amt_fakir_master_0` decimal(10,2) NOT NULL,
  `amt_fakir_master_1` decimal(10,2) NOT NULL,
  `amt_miskin_diploma_0` decimal(10,2) NOT NULL,
  `amt_miskin_diploma_1` decimal(10,2) NOT NULL,
  `amt_miskin_ijazah_0` decimal(10,2) NOT NULL,
  `amt_miskin_ijazah_1` decimal(10,2) NOT NULL,
  `amt_miskin_master_0` decimal(10,2) NOT NULL,
  `amt_miskin_master_1` decimal(10,2) NOT NULL,
  `amt_yatim` decimal(10,2) NOT NULL,
  `amt_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `amt_updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zakatamt`
--

INSERT INTO `zakatamt` (`amt_id`, `amt_fakir_diploma_0`, `amt_fakir_diploma_1`, `amt_fakir_ijazah_0`, `amt_fakir_ijazah_1`, `amt_fakir_master_0`, `amt_fakir_master_1`, `amt_miskin_diploma_0`, `amt_miskin_diploma_1`, `amt_miskin_ijazah_0`, `amt_miskin_ijazah_1`, `amt_miskin_master_0`, `amt_miskin_master_1`, `amt_yatim`, `amt_created_at`, `amt_updated_at`) VALUES
(1, '500.00', '250.00', '600.00', '300.00', '700.00', '350.00', '400.00', '200.00', '500.00', '250.00', '600.00', '300.00', '120.00', '2023-05-11 11:11:44', '2023-05-30 09:49:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_no_pekerja`);

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`app_matric`),
  ADD KEY `app_faculty` (`app_faculty`),
  ADD KEY `app_code` (`app_code`);

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`apply_id`),
  ADD KEY `apply_applicant` (`apply_matric`),
  ADD KEY `apply_sem` (`apply_sem`),
  ADD KEY `apply_tajaan` (`apply_tajaan`),
  ADD KEY `apply_ibfk_3` (`apply_sesi`),
  ADD KEY `apply_hubungan_keluarga` (`apply_hubungan_keluarga`),
  ADD KEY `apply_status` (`apply_status`),
  ADD KEY `apply_ibfk_7` (`apply_nama_bank`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fac_id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `hadkifayah`
--
ALTER TABLE `hadkifayah`
  ADD PRIMARY KEY (`had_id`);

--
-- Indexes for table `hubungan`
--
ALTER TABLE `hubungan`
  ADD PRIMARY KEY (`hubungan_id`);

--
-- Indexes for table `interview`
--
ALTER TABLE `interview`
  ADD PRIMARY KEY (`interview_id`),
  ADD KEY `interview_ibfk_2` (`interview_apply`),
  ADD KEY `interview_interviewer` (`interview_interviewer`),
  ADD KEY `interview_sesi` (`interview_sesi`),
  ADD KEY `interview_status` (`interview_status`);

--
-- Indexes for table `interviewer`
--
ALTER TABLE `interviewer`
  ADD PRIMARY KEY (`inter_no_pekerja`) USING BTREE,
  ADD KEY `inter_faculty` (`inter_faculty`);

--
-- Indexes for table `kodprogram`
--
ALTER TABLE `kodprogram`
  ADD PRIMARY KEY (`kod_id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`nilai_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`sem_id`),
  ADD UNIQUE KEY `sem_name` (`sem_name`);

--
-- Indexes for table `sesi`
--
ALTER TABLE `sesi`
  ADD PRIMARY KEY (`sesi_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tajaan`
--
ALTER TABLE `tajaan`
  ADD PRIMARY KEY (`taja_id`);

--
-- Indexes for table `zakatamt`
--
ALTER TABLE `zakatamt`
  ADD PRIMARY KEY (`amt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `apply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1404;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hadkifayah`
--
ALTER TABLE `hadkifayah`
  MODIFY `had_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hubungan`
--
ALTER TABLE `hubungan`
  MODIFY `hubungan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `interview`
--
ALTER TABLE `interview`
  MODIFY `interview_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `kodprogram`
--
ALTER TABLE `kodprogram`
  MODIFY `kod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `sem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sesi`
--
ALTER TABLE `sesi`
  MODIFY `sesi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tajaan`
--
ALTER TABLE `tajaan`
  MODIFY `taja_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `zakatamt`
--
ALTER TABLE `zakatamt`
  MODIFY `amt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicant`
--
ALTER TABLE `applicant`
  ADD CONSTRAINT `applicant_ibfk_1` FOREIGN KEY (`app_faculty`) REFERENCES `faculty` (`fac_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `applicant_ibfk_2` FOREIGN KEY (`app_code`) REFERENCES `kodprogram` (`kod_id`);

--
-- Constraints for table `apply`
--
ALTER TABLE `apply`
  ADD CONSTRAINT `apply_ibfk_1` FOREIGN KEY (`apply_matric`) REFERENCES `applicant` (`app_matric`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `apply_ibfk_2` FOREIGN KEY (`apply_sem`) REFERENCES `semester` (`sem_id`),
  ADD CONSTRAINT `apply_ibfk_3` FOREIGN KEY (`apply_sesi`) REFERENCES `sesi` (`sesi_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `apply_ibfk_4` FOREIGN KEY (`apply_tajaan`) REFERENCES `tajaan` (`taja_id`),
  ADD CONSTRAINT `apply_ibfk_5` FOREIGN KEY (`apply_hubungan_keluarga`) REFERENCES `hubungan` (`hubungan_id`),
  ADD CONSTRAINT `apply_ibfk_6` FOREIGN KEY (`apply_status`) REFERENCES `status` (`status_id`),
  ADD CONSTRAINT `apply_ibfk_7` FOREIGN KEY (`apply_nama_bank`) REFERENCES `bank` (`bank_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `interview`
--
ALTER TABLE `interview`
  ADD CONSTRAINT `interview_ibfk_2` FOREIGN KEY (`interview_apply`) REFERENCES `apply` (`apply_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `interview_ibfk_3` FOREIGN KEY (`interview_interviewer`) REFERENCES `interviewer` (`inter_no_pekerja`) ON UPDATE CASCADE,
  ADD CONSTRAINT `interview_ibfk_4` FOREIGN KEY (`interview_sesi`) REFERENCES `sesi` (`sesi_id`),
  ADD CONSTRAINT `interview_ibfk_6` FOREIGN KEY (`interview_status`) REFERENCES `status` (`status_id`);

--
-- Constraints for table `interviewer`
--
ALTER TABLE `interviewer`
  ADD CONSTRAINT `interviewer_ibfk_1` FOREIGN KEY (`inter_faculty`) REFERENCES `faculty` (`fac_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
