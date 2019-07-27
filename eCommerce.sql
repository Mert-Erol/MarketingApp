-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2019 at 11:59 AM
-- Server version: 8.0.11
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omert`
--

-- --------------------------------------------------------

--
-- Table structure for table `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `k_id` int(11) NOT NULL,
  `k_isim` varchar(30) NOT NULL,
  `k_soyisim` varchar(30) NOT NULL,
  `k_dogum_tarihi` date NOT NULL,
  `k_adres_il` varchar(30) NOT NULL,
  `k_adres_ulke` varchar(50) NOT NULL,
  `k_meslek` varchar(30) NOT NULL,
  `k_egitim_durumu` varchar(20) NOT NULL,
  `k_cinsiyet` varchar(1) NOT NULL,
  `yetki` tinyint(4) NOT NULL DEFAULT '0',
  `k_sifre` varchar(20) NOT NULL,
  `mail` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kullanicilar`
--

INSERT INTO `kullanicilar` (`k_id`, `k_isim`, `k_soyisim`, `k_dogum_tarihi`, `k_adres_il`, `k_adres_ulke`, `k_meslek`, `k_egitim_durumu`, `k_cinsiyet`, `yetki`, `k_sifre`, `mail`) VALUES
(1, 'Mert', 'Erol', '1996-10-08', 'Eskişehir', 'Türkiye', 'Admin', 'High School', 'M', 1, 'mert1996', 'merterol@gmail.com'),
(2, 'Ömer Faruk', 'Eş', '1996-01-23', 'İstanbul', 'Türkiye', 'Admin', 'University', 'M', 1, 'omer1996', 'omerfarukes@gmail.com'),
(3, 'Ahmet', 'Doğan', '1976-04-05', 'Ankara', 'Türkiye', 'Consultant', 'University', 'M', 0, 'ahmet123', 'ahmetdogan@gmail.com'),
(4, 'Şevval', 'Dönmez', '1998-01-08', 'Eskişehir', 'Türkiye', 'Student', 'High School', 'F', 0, 'sevval123', 'sevvaldonmez@gmail.com'),
(5, 'Başak', 'Dağhan', '1999-03-01', 'Eskişehir', 'Türkiye', 'Student', 'High School', 'F', 0, 'başak123', 'basakdaghan@gmail.com'),
(6, 'Michael', 'Jordan', '1965-02-15', 'Chicago', 'USA', 'Retired', 'High School', 'M', 0, 'michael123', 'michaeljordan@gmail.com'),
(7, 'Sonia', 'Raskolnikov', '1990-12-20', 'Moskova', 'Rusya', 'Nurse', 'University', 'F', 0, 'sonia123', 'soniaraskolnikov@gmail.com'),
(8, 'Dimitri', 'Andronovic', '1987-06-25', 'Yekaterinburg', 'Rusya', 'Cashier', 'High School', 'M', 0, 'dimitri123', 'dimitriandronovic@gmail.com'),
(9, 'Luis', 'Fernandez', '1955-09-13', 'Madrid', 'İspanya', 'Farmer', 'High School', 'M', 0, 'luis123', 'luisfernandez@gmail.com'),
(10, 'Pedro', 'Pollo', '1970-07-24', 'Barcelona', 'İspanya', 'Doctor', 'Master', 'M', 0, 'pedro123', 'pedropollo@gmail.com'),
(11, 'Helga', 'Daniel', '1980-11-20', 'Münih', 'Almanya', 'Teacher', 'University', 'F', 0, 'helga123', 'helgadaniel@gmail.com'),
(12, 'Jurgen', 'Reil', '1994-01-24', 'Frankfurt', 'Almanya', 'Student', 'High School', 'M', 0, 'jurgen123', 'jurgenreil@gmail.com'),
(13, 'Hiroshi', 'Takashi', '1983-06-07', 'Tokyo', 'Japonya', 'Engineer', 'Master', 'M', 0, 'hiroshi123', 'hiroshitakashi@gmail.com'),
(14, 'Keiko', 'Yoko', '1991-10-03', 'Osaka', 'Japonya', 'Sales Consultant', 'High School', 'F', 0, 'keiko123', 'keikoyoko@gmail.com'),
(15, 'Aykut', 'Göktaş', '1996-02-28', 'Ankara', 'Türkiye', 'Student', 'High School', 'M', 0, 'aykut123', 'aykutgoktas@gmail.com'),
(16, 'İbrahim', 'Mahmudov', '1999-02-20', 'Bakü', 'Azerbaycan', 'Software Developer', 'High School', 'M', 0, 'ibrahim123', 'ibrahimmahmudov@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `siparisler`
--

CREATE TABLE `siparisler` (
  `s_id` int(11) NOT NULL,
  `k_id` int(11) NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `urun_id` int(11) NOT NULL,
  `urun_adi` varchar(50) NOT NULL,
  `urun_kategori` varchar(20) NOT NULL,
  `urun_fiyat` smallint(6) NOT NULL,
  `adress_Il` varchar(30) NOT NULL,
  `adress_ulke` varchar(30) NOT NULL,
  `meslek` varchar(30) NOT NULL,
  `egitim` varchar(30) NOT NULL,
  `cinsiyet` varchar(3) NOT NULL,
  `dogum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siparisler`
--

INSERT INTO `siparisler` (`s_id`, `k_id`, `tarih`, `urun_id`, `urun_adi`, `urun_kategori`, `urun_fiyat`, `adress_Il`, `adress_ulke`, `meslek`, `egitim`, `cinsiyet`, `dogum`) VALUES
(1, 15, '2018-01-13 10:06:03', 1, 'Boss', 'watches', 1719, 'Ankara', 'Türkiye', 'Student', 'High School', 'M', '1996-02-28'),
(2, 15, '2019-02-14 10:08:10', 14, 'Tonny Black', 'shooes', 83, 'Ankara', 'Türkiye', 'Student', 'High School', 'M', '1996-02-28'),
(3, 15, '2018-03-10 10:08:25', 24, 'Buratti', 'clothes', 50, 'Ankara', 'Türkiye', 'Student', 'High School', 'M', '1996-02-28'),
(4, 15, '2019-03-18 10:08:35', 35, 'Nvidia RTX 2070', 'hardware', 5300, 'Ankara', 'Türkiye', 'Student', 'High School', 'M', '1996-02-28'),
(5, 4, '2018-05-03 10:09:41', 6, 'Burberry Saat', 'watches', 4445, 'Eskişehir', 'Türkiye', 'Student', 'High School', 'F', '1998-01-08'),
(6, 4, '2018-09-13 17:09:50', 17, 'US Polo Assn', 'shooes', 60, 'Eskişehir', 'Türkiye', 'Student', 'High School', 'F', '1998-01-08'),
(7, 4, '2018-08-19 10:10:19', 27, 'Pierre Cardin', 'clothes', 180, 'Eskişehir', 'Türkiye', 'Student', 'High School', 'F', '1998-01-08'),
(8, 4, '2018-02-10 18:11:22', 33, 'Apple İphone 7', 'smartphone', 5187, 'Eskişehir', 'Türkiye', 'Student', 'High School', 'F', '1998-01-08'),
(9, 7, '2018-05-13 15:58:52', 5, 'Burberry Saat', 'watches', 2310, 'Moskova', 'Rusya', 'Nurse', 'University', 'F', '1990-12-20'),
(10, 7, '2019-10-13 16:59:02', 13, 'US Polo Assn', 'shooes', 59, 'Moskova', 'Rusya', 'Nurse', 'University', 'F', '1990-12-20'),
(12, 5, '2019-12-17 17:35:24', 6, 'Burberry Saat', 'watches', 4445, 'Eskişehir', 'Türkiye', 'Student', 'High School', 'F', '1999-03-01'),
(13, 5, '2018-07-14 10:35:51', 23, 'Hotiç', 'shooes', 160, 'Eskişehir', 'Türkiye', 'Student', 'High School', 'F', '1999-03-01'),
(14, 5, '2018-05-08 17:36:07', 27, 'Pierre Cardin', 'clothes', 180, 'Eskişehir', 'Türkiye', 'Student', 'High School', 'F', '1999-03-01'),
(15, 6, '2019-09-14 10:37:11', 33, 'Apple İphone 7', 'smartphone', 5187, 'Chicago', 'USA', 'Retired', 'High School', 'M', '1965-02-15'),
(16, 6, '2018-11-14 22:37:34', 25, 'Loft', 'clothes', 140, 'Chicago', 'USA', 'Retired', 'High School', 'M', '1965-02-15'),
(17, 7, '2019-08-22 10:38:26', 13, 'US Polo Assn', 'shooes', 59, 'Moskova', 'Rusya', 'Nurse', 'University', 'F', '1990-12-20'),
(18, 7, '2018-06-04 16:38:44', 31, 'Samsung Galaxy M20', 'smartphone', 1585, 'Moskova', 'Rusya', 'Nurse', 'University', 'F', '1990-12-20'),
(19, 8, '2019-05-14 21:39:28', 39, 'Gigabyte Anakart', 'hardware', 498, 'Yekaterinburg', 'Rusya', 'Cashier', 'High School', 'M', '1987-06-25'),
(20, 8, '2018-02-20 08:39:40', 36, 'AMD Ryzen 7 1700X', 'hardware', 1699, 'Yekaterinburg', 'Rusya', 'Cashier', 'High School', 'M', '1987-06-25'),
(21, 8, '2019-07-24 18:39:51', 34, 'Amd Radeon RX580', 'hardware', 1263, 'Yekaterinburg', 'Rusya', 'Cashier', 'High School', 'M', '1987-06-25'),
(22, 9, '2019-04-07 17:40:31', 7, 'Casio Saat', 'watches', 317, 'Madrid', 'İspanya', 'Farmer', 'High School', 'M', '1955-09-13'),
(23, 9, '2019-09-26 19:40:50', 18, 'Tonny Black', 'shooes', 77, 'Madrid', 'İspanya', 'Farmer', 'High School', 'M', '1955-09-13'),
(24, 10, '2019-02-10 18:41:39', 10, 'Diesel Saat', 'watches', 858, 'Barcelona', 'İspanya', 'Doctor', 'Master', 'M', '1970-07-24'),
(25, 10, '2018-04-14 11:41:55', 19, 'Nike', 'shooes', 249, 'Barcelona', 'İspanya', 'Doctor', 'Master', 'M', '1970-07-24'),
(26, 11, '2019-08-14 23:44:40', 22, 'Bambi', 'shooes', 56, 'Münih', 'Almanya', 'Teacher', 'University', 'F', '1980-11-20'),
(27, 11, '2019-10-14 14:44:50', 27, 'Pierre Cardin', 'clothes', 180, 'Münih', 'Almanya', 'Teacher', 'University', 'F', '1980-11-20'),
(28, 12, '2019-08-14 17:46:12', 38, 'Msi Anakart', 'hardware', 610, 'Frankfurt', 'Almanya', 'Student', 'High School', 'M', '1994-01-24'),
(29, 12, '2019-05-14 17:46:27', 37, 'İntel i5-9400F', 'hardware', 1154, 'Frankfurt', 'Almanya', 'Student', 'High School', 'M', '1994-01-24'),
(30, 12, '2019-03-14 18:46:40', 35, 'Nvidia RTX 2070', 'hardware', 5300, 'Frankfurt', 'Almanya', 'Student', 'High School', 'M', '1994-01-24'),
(31, 13, '2018-12-14 20:47:17', 32, 'Huawei P30 Lite', 'smartphone', 2659, 'Tokyo', 'Japonya', 'Engineer', 'Master', 'M', '1983-06-07'),
(32, 13, '2019-08-14 14:47:30', 14, 'Tonny Black', 'shooes', 83, 'Tokyo', 'Japonya', 'Engineer', 'Master', 'M', '1983-06-07'),
(33, 14, '2018-01-14 09:48:05', 12, 'Swarovski Saat', 'watches', 1790, 'Osaka', 'Japonya', 'Sales Consultant', 'High School', 'F', '1991-10-03'),
(34, 14, '2019-09-14 16:48:15', 17, 'US Polo Assn', 'shooes', 60, 'Osaka', 'Japonya', 'Sales Consultant', 'High School', 'F', '1991-10-03'),
(35, 15, '2018-04-14 17:49:21', 9, 'Diesel Saat', 'watches', 1548, 'Ankara', 'Türkiye', 'Student', 'High School', 'M', '1996-02-28'),
(36, 15, '2019-10-14 15:49:33', 19, 'Nike', 'shooes', 249, 'Ankara', 'Türkiye', 'Student', 'High School', 'M', '1996-02-28'),
(37, 15, '2019-05-14 13:49:50', 24, 'Buratti', 'clothes', 50, 'Ankara', 'Türkiye', 'Student', 'High School', 'M', '1996-02-28'),
(38, 15, '2019-08-14 02:50:01', 25, 'Loft', 'clothes', 140, 'Ankara', 'Türkiye', 'Student', 'High School', 'M', '1996-02-28'),
(39, 16, '2019-03-14 19:50:43', 26, 'Jack', 'clothes', 76, 'Bakü', 'Azerbaycan', 'Software Developer', 'High School', 'M', '1999-02-20'),
(40, 16, '2019-07-04 12:50:53', 32, 'Huawei P30 Lite', 'smartphone', 2659, 'Bakü', 'Azerbaycan', 'Software Developer', 'High School', 'M', '1999-02-20'),
(41, 16, '2018-06-14 17:51:03', 34, 'Amd Radeon RX580', 'hardware', 1263, 'Bakü', 'Azerbaycan', 'Software Developer', 'High School', 'M', '1999-02-20'),
(42, 2, '2019-07-14 08:56:54', 24, 'Buratti', 'clothes', 50, 'İstanbul', 'Türkiye', 'Admin', 'University', 'M', '1996-01-23'),
(43, 15, '2019-07-14 12:26:04', 20, 'Bambi', 'shooes', 38, 'Ankara', 'Türkiye', 'Student', 'High School', 'M', '1996-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `urunler`
--

CREATE TABLE `urunler` (
  `urun_id` int(11) NOT NULL,
  `urun_adi` varchar(20) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `urun_hakkinda` varchar(255) NOT NULL,
  `urun_foto_link` varchar(100) NOT NULL,
  `urun_fiyat` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `urunler`
--

INSERT INTO `urunler` (`urun_id`, `urun_adi`, `kategori`, `urun_hakkinda`, `urun_foto_link`, `urun_fiyat`) VALUES
(1, 'Boss', 'watches', 'HB1513686 Erkek Kol Saati \r\nÇelik / Quartz Teknoloji / Yuvarlak Kasa Şekli / Mineral Cam Özellik / 3 ATM Su Geçirmezlik', 'https://foto-saatvesaat.mncdn.com/media/catalog/product/h/b/hb1513686_1.jpg', 1719),
(2, 'Boss Saat', 'watches', 'HB1513495 Erkek Kol Saati\r\nQuartz Teknoloji / Yuvarlak Kasa Şekli / Mineral Cam Özellik / 5 ATM Su Geçirmezlik', 'https://foto-saatvesaat.mncdn.com/media/catalog/product/h/b/hb1513495_1_2.jpg', 2061),
(3, 'Boss Saat', 'watches', 'HB1513677 Erkek Kol Saati\r\nÇelik / Quartz Teknoloji / Yuvarlak Kasa Şekli / Mineral Cam Özellik / 5 ATM Su Geçirmezlik', 'https://foto-saatvesaat.mncdn.com/media/catalog/product/h/b/hb1513538_1.jpg', 3096),
(4, 'Burberry Saat', 'watches', 'BU10012 Erkek Kol Saati\r\nÇelik / Quartz Teknoloji / Yuvarlak Kasa Şekli / Safir Cam Özellik / 5 ATM Su Geçirmezlik', 'https://foto-saatvesaat.mncdn.com/media/catalog/product/b/u/bu10012.jpg', 2620),
(5, 'Burberry Saat', 'watches', 'BU9109 Bayan Kol Saati\r\nÇelik / Quartz Teknoloji / Yuvarlak Kasa Şekli / Safir Cam Özellik / 5 ATM Su Geçirmezlik', 'https://foto-saatvesaat.mncdn.com/media/catalog/product/b/u/bu9109_1_2.jpg', 2310),
(6, 'Burberry Saat', 'watches', 'BU10117 Bayan Kol Saati\r\nÇelik / Quartz Teknoloji / Yuvarlak Kasa Şekli / Safir Cam Özellik / 5 ATM Su Geçirmezlik', 'https://foto-saatvesaat.mncdn.com/media/catalog/product/b/u/bu10117_1_1.jpg', 4445),
(7, 'Casio Saat', 'watches', 'CAS-MTP1375D1AVDF Erkek Kol Saati\r\nQuartz Teknoloji / Yuvarlak Kasa Şekli / Mineral Cam Özellik / 5 ATM Su Geçirmezlik', 'https://foto-saatvesaat.mncdn.com/media/catalog/product/c/a/cas-mtp1375d1avdf_1.jpg', 317),
(8, 'Casio Saat', 'watches', 'CAS-LTP1129A7BRDF Bayan Kol Saati\r\nQuartz Teknoloji / Yuvarlak Kasa Şekli / Mineral Cam Özellik / 3 ATM Su Geçirmezlik', 'https://foto-saatvesaat.mncdn.com/media/catalog/product/c/a/cas-ltp1129a7brdf_1.jpg', 142),
(9, 'Diesel Saat', 'watches', 'DZ1870 Erkek Kol Saati\r\nÇelik / Quartz Teknoloji / Yuvarlak Kasa Şekli / Mineral Cam Özellik / 10 ATM Su Geçirmezlik', 'https://foto-saatvesaat.mncdn.com/media/catalog/product/d/z/dz1870_1.jpg', 1548),
(10, 'Diesel Saat', 'watches', 'DZ5573 Bayan Kol Saati\r\nÇelik / Quartz Teknoloji / Yuvarlak Kasa Şekli / Mineral Cam Özellik / 5 ATM Su Geçirmezlik', 'https://foto-saatvesaat.mncdn.com/media/catalog/product/d/z/dz5573_1.jpg', 858),
(11, 'Swarovski Saat', 'watches', 'SWR5261664 Bayan Kol Saati\r\nQuartz Teknoloji / Yuvarlak Kasa Şekli / Mineral Cam Özellik / 5 ATM Su Geçirmezlik', 'https://foto-saatvesaat.mncdn.com/media/catalog/product/s/w/swr5261664.jpg', 995),
(12, 'Swarovski Saat', 'watches', 'SWR5181664 Bayan Kol Saati\r\nÇelik / Quartz Teknoloji / Oval Kasa Şekli / Mineral Cam Özellik / 3 ATM Su Geçirmezlik', 'https://foto-saatvesaat.mncdn.com/media/catalog/product/s/w/swr5181664.jpg', 1790),
(13, 'US Polo Assn', 'shooes', 'Beyaz Kadın Sneaker ', 'https://img-trendyol.mncdn.com/Assets/ProductImages/oa/100/2569752/1/8681711366313_1_org_zoom.jpg', 59),
(14, 'Tonny Black', 'shooes', 'Beyaz Unisex Sneaker ALX-0', 'https://img-trendyol.mncdn.com/Assets/ProductImages/oa/100094/6191460/1/TB63380024362_1_org_zoom.jpg', 83),
(15, 'Kinetix', 'shooes', 'Kadın Sneaker', 'https://img-trendyol.mncdn.com/Assets/ProductImages/oa/100/2855925/1/8681711729613_1_org_zoom.jpg', 53),
(16, 'Kinetix', 'shooes', 'Erkek Sneaker', 'https://img-trendyol.mncdn.com/Assets/ProductImages/oa/100/509729/3/8680733653999_1_org_zoom.jpg', 60),
(17, 'US Polo Assn', 'shooes', 'Kırmızı Kadın Sneaker', 'https://img-trendyol.mncdn.com/Assets/ProductImages/oa/100/2569697/1/8681564915133_1_org_zoom.jpg', 60),
(18, 'Tonny Black', 'shooes', 'Beyaz File Unisex Sneaker', 'https://img-trendyol.mncdn.com/Assets/ProductImages/oa/100094/6499002/1/TB63380024513_1_org_zoom.jpg', 77),
(19, 'Nike', 'shooes', 'Kadın Koşu Ayakkabı - Star Runner (Gs)', 'https://img-trendyol.mncdn.com/Assets/ProductImages/oa/47/2720202/1/884802415770_2_org_zoom.jpg', 249),
(20, 'Bambi', 'shooes', 'Siyah Kadın Babet', 'https://img-trendyol.mncdn.com/Assets/ProductImages/oa/100094/6462894/2/H05000031422_1_org_zoom.jpg', 38),
(21, 'Bambi', 'shooes', 'Lame Kadın Ayakkabı', 'https://img-trendyol.mncdn.com/Assets/ProductImages/oa/102/4693263/4/H05270003417_1_org_zoom.jpg', 75),
(22, 'Bambi', 'shooes', 'Krem Kadın Ayakkabı ', 'https://img-trendyol.mncdn.com/Assets/ProductImages/oa/102/4693479/4/H05480026110_1_org_zoom.jpg', 56),
(23, 'Hotiç', 'shooes', 'Siyah Kadın Klasik Topuklu Ayakkabı', 'https://img-trendyol.mncdn.com/Assets/ProductImages/oa/100/4964838/1/8680875726452_1_org_zoom.jpg', 160),
(24, 'Buratti', 'clothes', 'Buratti Erkek Uzun Kollu Gömlek', 'https://productimages.hepsiburada.net/l/21/552/9916225224754.jpg', 50),
(25, 'Loft', 'clothes', 'Loft Erkek Pantolon', 'https://productimages.hepsiburada.net/l/24/1000/10067336101938.jpg', 140),
(26, 'Jack&Jones', 'clothes', 'Jack & Jones Tişört Jcopaul Ss Crew Neck', 'https://productimages.hepsiburada.net/l/25/1000/10110133829682.jpg', 76),
(27, 'Pierre Cardin', 'clothes', 'Pierre Cardin Dokuma Elbise ', 'https://productimages.hepsiburada.net/l/27/1000/10182755582002.jpg', 180),
(28, 'Adobe Acrobat', 'software', '\r\nAdobe Acrobat Professional Kalıcı Lisans(Dijital İndirilebilir Lisans)', 'https://productimages.hepsiburada.net/s/19/500/9843902152754.jpg', 2690),
(29, 'Autodesk Fusion', 'software', '\r\nAutodesk Fusion 360 3 Yıllık Abonelik Lisansı', 'https://productimages.hepsiburada.net/s/28/1500/10220092588082.jpg', 9541),
(30, 'Eset Nod32', 'software', 'Eset NOD32 Antivirüs V10 - 1 Kullanıcı Kutu', 'https://productimages.hepsiburada.net/s/3/500/9585682972722.jpg', 119),
(31, 'Samsung Galaxy M20', 'smartphone', 'Samsung Galaxy M20 32 GB (Samsung Türkiye Garantili)', 'https://productimages.hepsiburada.net/s/25/1500/10094999240754.jpg', 1585),
(32, 'Huawei P30 Lite', 'smartphone', 'Huawei P30 Lite 128 GB (Huawei Türkiye Garantili)', 'https://productimages.hepsiburada.net/s/27/1500/10194864242738.jpg', 2659),
(33, 'Apple İphone 7', 'smartphone', 'Apple iPhone 7 Plus 32 GB (Apple Türkiye Garantili)', 'https://productimages.hepsiburada.net/s/18/1500/9801258663986.jpg', 5187),
(34, 'Amd Radeon RX580', 'hardware', '\r\nSapphire Pulse Amd Radeon RX 580 4G OC 256 Bit GDDR5 (DX12) PCI-E 3.0 Ekran Kartı ', 'https://productimages.hepsiburada.net/s/3/500/9617896702002.jpg', 1263),
(35, 'Nvidia RTX 2070', 'hardware', '\r\nAsus ROG Strix GeForce RTX 2070 OC 8GB Gaming 256Bit GDDR6 DX12 PCI-E 3.0 Ekran Kartı ', 'https://productimages.hepsiburada.net/s/22/1500/9950142955570.jpg', 5300),
(36, 'AMD Ryzen 7 1700X', 'hardware', 'AMD Ryzen 7 1700X 3.4GHz/3.8GHz 16MB Cache Soket AM4 İşlemci', 'https://productimages.hepsiburada.net/s/2/500/9581958692914.jpg', 1699),
(37, 'İntel i5-9400F', 'hardware', 'Intel i5-9400F 2.9 GHz 4.1 GHz 9MB 1151V8 -Vgasız', 'https://productimages.hepsiburada.net/s/26/500/10158249279538.jpg', 1154),
(38, 'Msi Anakart', 'hardware', 'MSI H310M Gaming PLUS DDR4 2666Mhz DDR4 1151 Soket mATX Anakart', 'https://productimages.hepsiburada.net/s/22/1500/9952775569458.jpg', 610),
(39, 'Gigabyte Anakart', 'hardware', 'Gigabyte B450M S2H AMD B450 2133MHz DDR4 Soket AM4 mATX Anakart', 'https://productimages.hepsiburada.net/s/24/500/10072262639666.jpg', 498);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`k_id`);

--
-- Indexes for table `siparisler`
--
ALTER TABLE `siparisler`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`urun_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `k_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `siparisler`
--
ALTER TABLE `siparisler`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `urunler`
--
ALTER TABLE `urunler`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
