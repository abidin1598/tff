-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 16 Ara 2012, 13:35:10
-- Sunucu sürümü: 5.5.27
-- PHP Sürümü: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `tff`
--

DELIMITER $$
--
-- Yordamlar
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `takim_sil`(in id INT)
BEGIN 
DELETE FROM takimlar where takim_id=id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cezalar`
--

CREATE TABLE IF NOT EXISTS `cezalar` (
  `futbolcu_id` int(11) DEFAULT NULL,
  `kart_tipi` varchar(3) COLLATE utf8_turkish_ci DEFAULT NULL,
  `mac_id` int(11) DEFAULT NULL,
  KEY `futbolcu_id` (`futbolcu_id`),
  KEY `mac_id` (`mac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `futbolcular`
--

CREATE TABLE IF NOT EXISTS `futbolcular` (
  `lisans_no` int(11) NOT NULL AUTO_INCREMENT,
  `adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `soyadi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `mevki` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `takim_id` int(11) DEFAULT NULL,
  `boy` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kilo` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `dogum_yeri` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `dogum_tarihi` date DEFAULT NULL,
  `forma_no` int(2) DEFAULT NULL,
  PRIMARY KEY (`lisans_no`),
  KEY `takim_id` (`takim_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=35 ;

--
-- Tablo döküm verisi `futbolcular`
--

INSERT INTO `futbolcular` (`lisans_no`, `adi`, `soyadi`, `mevki`, `takim_id`, `boy`, `kilo`, `dogum_yeri`, `dogum_tarihi`, `forma_no`) VALUES
(1, 'Cihad', 'ÇİNAR', 'Orta Saha', 2, '1.77', '66', 'Adiyaman', '1990-11-25', 7),
(2, 'Alex', 'De Souza', 'Orta Saha', 2, '1.75', '78', 'Sanliurfa', '1978-06-26', 10),
(3, 'Vahap', 'Bıyık', 'Forvet', 1, '1.74', '70', 'Trabzon', '1991-06-12', 61),
(4, 'Onur', 'Kıvrak', 'Kaleci', 1, '1.85', '80', 'Trabzon', '1981-01-03', 1),
(5, 'Bilal', 'Cebel', 'Forvet', 3, '1.75', '76', 'Gumushane', '1990-03-18', 29),
(6, 'Selçuk', 'İnan', 'Orta Saha', 3, '1.81', '79', 'Malatya', '1983-06-14', 8),
(7, 'Manuel', 'Fernandes', 'Orta Saha', 4, '1.87', '80', 'Hakkari', '1986-11-25', 11),
(8, 'Emrah', 'Gürpinar', 'Orta Saha', 4, '1.80', '78', 'Erzurum', '1990-10-14', 25),
(9, 'Gökçek', 'Vederson', 'Defans', 5, '1.76', '66', 'Kahramanmaras', '1987-10-10', 63),
(10, 'Sanica', 'Batalla', 'Orta Saha', 5, '1.70', '69', 'Denizli', '1978-06-26', 16),
(11, 'Pier', 'Webo', 'Forvet', 8, '1.81', '79', 'Isparta', '1979-06-26', 89),
(12, 'Mert', 'Nobre', 'Forvet', 10, '1.85', '78', 'Kars', '1986-11-25', 78),
(13, 'Erman ', 'Kılıç', 'Orta Saha', 7, '1.83', '74', 'Aydin', '1985-02-02', 55),
(14, 'Sarbi ', 'Sarıoğlu', 'Defans', 3, '1.80', '77', 'Samsun', '1985-05-05', 55),
(15, 'Oğuzhan', 'Özyakup', 'Orta Saha', 4, '1.77', '76', 'Bitlis', '1990-10-14', 56),
(16, 'Cristiano', 'Ronaldo', 'Forvet', 2, '1.88', '80', 'Adiyaman', '1986-06-06', 9),
(17, 'zinedine ', 'Zidane', 'Orta Saha', 3, '1.80', '79', 'Konya', '1985-02-02', 10),
(18, 'Fatih', 'Tekke', 'Forvet', 1, '1.82', '83', 'Trabzon', '1978-06-26', 10),
(19, 'Dirk', 'Kuyt', 'Forvet', 2, '1.80', '80', 'Amasya', '1985-02-02', 12),
(20, 'Rıdvan', 'Dilmen', 'Orta Saha', 2, '1.77', '79', 'Gaziantep', '1976-06-06', 11),
(21, 'George', 'Hagi', 'Orta Saha', 3, '1.80', '1.78', 'Rize', '1972-02-03', 7),
(22, 'Sergen', 'Yalçın', 'Forvet', 4, '1.76', '80', 'Ardahan', '1974-04-04', 9),
(23, 'Fernando', 'Muslera', 'Kaleci', 3, '1.90', '79', 'Bingol', '1985-05-05', 1),
(24, 'Volkan', 'Demirel', 'Kaleci', 2, '1.95', '85', 'Istanbul', '1981-01-01', 1),
(25, 'Rüştü', 'Reçber', 'Kaleci', 4, '1.90', '88', 'Elazig', '1972-02-03', 1),
(26, 'Hasan', 'Kabze', 'Forvet', 13, '1.79', '80', 'Bitlis', '1979-09-09', 81),
(27, 'Zeynel Abidin', 'Shamak', 'Defans', 15, '1.65', '68', 'Sanliurfa', '1991-10-10', 63),
(28, 'Caber', 'Stancu', 'Forvet', 16, '1.76', '77', 'Izmir', '1985-02-02', 13),
(29, 'Kalu', 'Uche', 'Forvet', 9, '1.85', '77', 'Eskisehir', '1986-11-27', 10),
(30, 'Murat', 'Terlik', 'Defans', 11, '1.88', '80', 'Cankiri', '1985-02-02', 98),
(31, 'Huşrut', 'Meriç', 'Orta Saha', 14, '1.70', '76', 'Amasya', '1985-02-06', 42),
(32, 'Onur Özcan', 'Turgut', 'Defans', 12, '1.80', '80', 'Artvin', '1990-10-14', 10),
(33, 'Cimili', 'İbo', 'Orta Saha', 17, '1.25', '33', 'Burdur', '1999-09-09', 61),
(34, 'Sait', 'Uçar', 'Forvet', 6, '1.74', '71', 'Cankiri', '1990-10-14', 56);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `fikstur`
--

CREATE TABLE IF NOT EXISTS `fikstur` (
  `mac_id` int(11) NOT NULL AUTO_INCREMENT,
  `hafta` int(11) NOT NULL,
  `lig_id` int(11) DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  `ev_sahibi_id` int(11) DEFAULT NULL,
  `misafir_id` int(11) DEFAULT NULL,
  `stadyum_id` int(11) DEFAULT NULL,
  `hakem_id` int(11) DEFAULT NULL,
  `gozlemci_id` int(11) DEFAULT NULL,
  `skor_ev` int(11) DEFAULT NULL,
  `skor_dep` int(11) DEFAULT NULL,
  PRIMARY KEY (`mac_id`),
  KEY `lig_id` (`lig_id`),
  KEY `ev_sahibi_id` (`ev_sahibi_id`),
  KEY `misafir_id` (`misafir_id`),
  KEY `hakem_id` (`hakem_id`),
  KEY `gozlemci_id` (`gozlemci_id`),
  KEY `stadyum_id` (`stadyum_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=10 ;

--
-- Tablo döküm verisi `fikstur`
--

INSERT INTO `fikstur` (`mac_id`, `hafta`, `lig_id`, `tarih`, `ev_sahibi_id`, `misafir_id`, `stadyum_id`, `hakem_id`, `gozlemci_id`, `skor_ev`, `skor_dep`) VALUES
(1, 1, 1, '2012-12-12', 13, 12, 5, 8, 1, 1, 3),
(2, 1, 1, '2012-12-12', 4, 5, 3, 6, 2, 1, 2),
(3, 1, 1, '2012-12-12', 11, 2, 5, 7, 1, NULL, NULL),
(4, 1, 1, '2012-12-12', 3, 15, 2, 1, 2, NULL, NULL),
(5, 1, 1, '2012-12-12', 14, 8, 5, 3, 2, NULL, NULL),
(6, 1, 1, '2012-12-12', 17, 9, 9, 2, 1, NULL, NULL),
(7, 1, 1, '2012-12-12', 6, 10, 10, 4, 2, NULL, NULL),
(8, 1, 1, '2012-12-12', 16, 7, 8, 9, 2, NULL, NULL),
(9, 1, 1, '2012-12-12', 18, 1, 4, 5, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `goller`
--

CREATE TABLE IF NOT EXISTS `goller` (
  `mac_id` int(11) DEFAULT NULL,
  `oyuncu_id` int(11) DEFAULT NULL,
  `gol_sayisi` tinyint(4) DEFAULT NULL,
  KEY `mac_id` (`mac_id`),
  KEY `oyuncu_id` (`oyuncu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `goller`
--

INSERT INTO `goller` (`mac_id`, `oyuncu_id`, `gol_sayisi`) VALUES
(1, 32, 3),
(2, 8, 1),
(2, 10, 2);

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `gol_kral`
--
CREATE TABLE IF NOT EXISTS `gol_kral` (
`takim_id` int(11)
,`adsoyad` varchar(151)
,`gol` decimal(25,0)
);
-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gozlemci`
--

CREATE TABLE IF NOT EXISTS `gozlemci` (
  `gozlemci_id` int(11) NOT NULL AUTO_INCREMENT,
  `adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `soyadi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`gozlemci_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `gozlemci`
--

INSERT INTO `gozlemci` (`gozlemci_id`, `adi`, `soyadi`) VALUES
(1, 'Oğuz ', 'Sarvan'),
(2, 'Samet', 'Tekdüze');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakemler`
--

CREATE TABLE IF NOT EXISTS `hakemler` (
  `hakem_id` int(11) NOT NULL AUTO_INCREMENT,
  `adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `soyadi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `klasman` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `dogum_tarihi` date DEFAULT NULL,
  PRIMARY KEY (`hakem_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=11 ;

--
-- Tablo döküm verisi `hakemler`
--

INSERT INTO `hakemler` (`hakem_id`, `adi`, `soyadi`, `klasman`, `dogum_tarihi`) VALUES
(1, 'Cüneyt ', 'ÇAKIR', 'FIFA Hakemi', '1970-10-10'),
(2, 'Halis ', 'ÖZKAHYA', 'Üst Klasman Hakemi', '1980-05-30'),
(3, 'Fırat', 'AYDINUS', 'FIFA Hakemi', '1973-12-20'),
(4, 'Hüseyin ', 'GÖÇEK', 'FIFA Hakemi', '1976-03-23'),
(5, 'Yunus ', 'YILDIRIM', 'FIFA Hakemi', '1975-10-23'),
(6, 'Bülent', 'YILDIRIM', 'FIFA Hakemi', '1979-03-26'),
(7, 'İlker', 'MERAL', 'Üst Klasman Hakemi', '1980-10-03'),
(8, 'Aytekin ', 'DURMAZ', 'Üst Klasman Hakemi', '1973-12-12'),
(9, 'Serkan', 'ÇINAR', 'FIFA Hakemi', '1982-06-26'),
(10, 'Özgür', 'YANKAYA', 'FIFA Hakemi', '1984-04-18');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kupa`
--

CREATE TABLE IF NOT EXISTS `kupa` (
  `kupa_id` int(11) NOT NULL AUTO_INCREMENT,
  `kupa_adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `sezon` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sampiyon_takim_id` int(11) NOT NULL,
  `sponsor` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`kupa_id`),
  KEY `sampiyon_takim_id` (`sampiyon_takim_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ligler`
--

CREATE TABLE IF NOT EXISTS `ligler` (
  `lig_id` int(11) NOT NULL AUTO_INCREMENT,
  `lig_adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `takim_sayisi` int(11) NOT NULL,
  `yayinci_kurulus` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sponsor` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`lig_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `ligler`
--

INSERT INTO `ligler` (`lig_id`, `lig_adi`, `takim_sayisi`, `yayinci_kurulus`, `sponsor`) VALUES
(1, 'Spor Toto Süper Lig', 18, 'Lig TV', 'Spor Toto'),
(2, 'PTT 1.Lig', 18, 'TRT Spor', 'PTT');

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `puan_tablo`
--
CREATE TABLE IF NOT EXISTS `puan_tablo` (
`takim_id` int(11)
,`adi` varchar(50)
,`baskan` varchar(100)
,`kurulus_tarihi` varchar(11)
,`sponsor` varchar(50)
,`lig_id` int(11)
,`teknik_id` int(11)
,`resim_yolu` varchar(100)
,`puan` int(3)
);
-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stadyumlar`
--

CREATE TABLE IF NOT EXISTS `stadyumlar` (
  `stadyum_id` int(11) NOT NULL AUTO_INCREMENT,
  `stadyum_adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kapasite` int(11) DEFAULT NULL,
  `il` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `olimpik` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`stadyum_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=11 ;

--
-- Tablo döküm verisi `stadyumlar`
--

INSERT INTO `stadyumlar` (`stadyum_id`, `stadyum_adi`, `kapasite`, `il`, `olimpik`) VALUES
(1, 'Şükrü Saraçoğlu', 52000, 'Istanbul', 'Olimpik Değil'),
(2, 'Türk Telekom Arena', 50000, 'Istanbul', 'Olimpik Değil'),
(3, 'İnönü', 30000, 'Istanbul', 'Olimpik Değil'),
(4, 'Hüseyin Avni Aker', 25000, 'Trabzon', 'Olimpik Değil'),
(5, 'Atatürk Olimpiyat ', 750000, 'Istanbul', 'Olimpik'),
(6, 'Kadir Has', 45000, 'Kayseri', 'Olimpik Değil'),
(7, 'Bursa Atatürk', 30000, 'Bursa', 'Olimpik Değil'),
(8, '9 Eylül', 20000, 'Sivas', 'Olimpik Değil'),
(9, 'GAP Arena', 30000, 'Sanliurfa', 'Olimpik'),
(10, '5 Ocak', 22000, 'Adana', 'Olimpik Değil');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `takimlar`
--

CREATE TABLE IF NOT EXISTS `takimlar` (
  `takim_id` int(11) NOT NULL AUTO_INCREMENT,
  `adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `baskan` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kurulus_tarihi` varchar(11) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sponsor` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `lig_id` int(11) DEFAULT NULL,
  `teknik_id` int(11) DEFAULT NULL,
  `resim_yolu` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `puan` int(3) DEFAULT NULL,
  PRIMARY KEY (`takim_id`),
  KEY `lig_id` (`lig_id`),
  KEY `teknik_id` (`teknik_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=20 ;

--
-- Tablo döküm verisi `takimlar`
--

INSERT INTO `takimlar` (`takim_id`, `adi`, `baskan`, `kurulus_tarihi`, `sponsor`, `lig_id`, `teknik_id`, `resim_yolu`, `puan`) VALUES
(1, 'Trabzonspor', 'Sadri Şener', '1967', 'Avea', 1, 1, 'photo/trabzon.jpg', 0),
(2, 'Fenerbahçe SK', 'Aziz Yıldırım', '1907', 'Avea', 1, 15, 'photo/fenerbahce.jpg', 0),
(3, 'Galatasaray', 'Ünal Aysal', '1905', 'Türk Telekom', 1, 3, 'photo/galatasaray.jpg', 0),
(4, 'Beşiktaş JK', ' Fikret Orman', '1903', 'Vodafone', 1, 16, 'photo/besiktas.jpg', 0),
(5, 'Bursaspor', 'Zeynel Abidin Samak', '1955', 'Nokia', 1, 4, 'photo/bursa.jpg', 3),
(6, 'Kayserispor', 'Bülent Başkan', '1965', 'Tahsildaroğlu', 1, 12, 'photo/kayseri.jpg', 0),
(7, 'Sivasspor', 'Vahap BIYIK', '1966', 'Kangal Sucuk', 1, 11, 'photo/sivas.jpg', 0),
(8, 'İstanbul B.B', 'İbrahim Terkip', '1989', 'Hamidiye', 1, 7, 'photo/istanbulbb.jpg', 0),
(9, 'Kasımpaşa SK', 'Bilal Cebel', '1975', 'Erik Su', 1, 11, 'photo/kasimpasa.jpg', 0),
(10, 'Mersin İdman Yurdu', 'Samet Tekin', '1990', 'Samsung', 1, 13, 'photo/mersiniy.jpg', 0),
(11, 'Elazığspor', 'Polat Kalender', '1945', 'Asus', 1, 5, 'photo/elazig.jpg', 0),
(12, 'Antalyaspor', 'Kerim Fertek', '1963', 'Hilton Otel', 1, 9, 'photo/antalya.jpg', 3),
(13, 'Akhisar Belediye', 'Murat Atlı', '1949', 'Halkbank', 1, 2, 'photo/akhisar.jpg', 0),
(14, 'Geçlerbirliği', 'Emrah Seyter', '1936', 'Metro Turizm', 1, 6, 'photo/genclerbirligi.jpg', 0),
(15, 'Gaziantepspor', 'İlhan Kavkaf', '1929', 'Güllüoğlu', 1, 14, 'photo/gaziantep.jpg', 0),
(16, 'Orduspor', 'Nazım Karabekir', '1956', 'Fisko', 1, 17, 'photo/ordu.jpg', 0),
(17, 'Karabükspor', 'Furkan Ketenci', '1976', 'Demir Çelik', 1, 18, 'photo/karabuk.jpg', 0),
(18, 'Eskişehirspor', 'Ahmet BIYIK', '1948', 'Packerd Bell', 1, 5, 'photo/eskisehir.jpg', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teknik_direktor`
--

CREATE TABLE IF NOT EXISTS `teknik_direktor` (
  `teknik_id` int(11) NOT NULL AUTO_INCREMENT,
  `adi` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `soyadi` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `maas` float DEFAULT NULL,
  `sozlesme_bas` date DEFAULT NULL,
  `sozlesme_bit` date DEFAULT NULL,
  PRIMARY KEY (`teknik_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=19 ;

--
-- Tablo döküm verisi `teknik_direktor`
--

INSERT INTO `teknik_direktor` (`teknik_id`, `adi`, `soyadi`, `maas`, `sozlesme_bas`, `sozlesme_bit`) VALUES
(1, 'Şenol', 'GÜNEŞ', 10000, '2010-10-10', '2013-05-05'),
(2, 'Aykut', 'KOCAMAN', 2000000, '2009-06-10', '2014-06-10'),
(3, 'Fatih', 'Terim', 250000, '2010-06-25', '2015-06-25'),
(4, 'Ertuğrul', 'SAĞLAM', 600000, '2008-10-10', '2013-10-10'),
(5, 'Yılmaz ', 'VURAL', 1000000, '2012-09-30', '2014-09-30'),
(6, 'Şota', 'ARVELADZE', 300000, '2012-09-15', '2014-09-15'),
(7, 'Bülent', 'KORKMAZ', 600000, '2012-09-30', '2014-10-10'),
(8, 'Ersun', 'YANAL', 500000, '2008-10-10', '2015-06-25'),
(9, 'Mehmet', 'ÖZDİLEK', 350000, '2007-06-06', '2015-06-06'),
(10, 'Cihad', 'ÇİNAR', 5000000, '2000-10-10', '2020-10-10'),
(11, 'Alex', 'FERGUSON', 4500000, '1983-06-30', '2015-06-30'),
(12, 'Arthur', 'ZICO', 6500000, '2010-06-25', '2016-10-30'),
(13, 'Tito', 'VILANOVA', 6500000, '2012-08-30', '2016-08-30'),
(14, 'Josep', 'GUARDIOLA', 9000000, '2010-06-23', '2016-06-23'),
(15, 'Jose ', 'MOURINHO', 10000000, '2008-09-30', '2015-09-30'),
(16, 'Samet', 'AYBABA', 3000, '2012-09-25', '2015-09-25'),
(17, 'Hector', 'Cuper', 300000, '2010-09-30', '2015-06-30'),
(18, 'Mehmet', 'Bakkal', 450000, '2008-10-10', '2015-06-30');

-- --------------------------------------------------------

--
-- Görünüm yapısı `gol_kral`
--
DROP TABLE IF EXISTS `gol_kral`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `gol_kral` AS select `futbolcular`.`takim_id` AS `takim_id`,concat(`futbolcular`.`adi`,' ',ucase(`futbolcular`.`soyadi`)) AS `adsoyad`,sum(`goller`.`gol_sayisi`) AS `gol` from (`futbolcular` join `goller` on((`futbolcular`.`lisans_no` = `goller`.`oyuncu_id`))) group by `goller`.`oyuncu_id` order by sum(`goller`.`gol_sayisi`) desc limit 10;

-- --------------------------------------------------------

--
-- Görünüm yapısı `puan_tablo`
--
DROP TABLE IF EXISTS `puan_tablo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `puan_tablo` AS select `takimlar`.`takim_id` AS `takim_id`,`takimlar`.`adi` AS `adi`,`takimlar`.`baskan` AS `baskan`,`takimlar`.`kurulus_tarihi` AS `kurulus_tarihi`,`takimlar`.`sponsor` AS `sponsor`,`takimlar`.`lig_id` AS `lig_id`,`takimlar`.`teknik_id` AS `teknik_id`,`takimlar`.`resim_yolu` AS `resim_yolu`,`takimlar`.`puan` AS `puan` from `takimlar` order by `takimlar`.`puan` desc;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `cezalar`
--
ALTER TABLE `cezalar`
  ADD CONSTRAINT `cezalar_ibfk_1` FOREIGN KEY (`futbolcu_id`) REFERENCES `futbolcular` (`lisans_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cezalar_ibfk_2` FOREIGN KEY (`mac_id`) REFERENCES `fikstur` (`mac_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `futbolcular`
--
ALTER TABLE `futbolcular`
  ADD CONSTRAINT `futbolcular_ibfk_1` FOREIGN KEY (`takim_id`) REFERENCES `takimlar` (`takim_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `fikstur`
--
ALTER TABLE `fikstur`
  ADD CONSTRAINT `fikstur_ibfk_1` FOREIGN KEY (`lig_id`) REFERENCES `ligler` (`lig_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fikstur_ibfk_2` FOREIGN KEY (`ev_sahibi_id`) REFERENCES `takimlar` (`takim_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fikstur_ibfk_3` FOREIGN KEY (`misafir_id`) REFERENCES `takimlar` (`takim_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fikstur_ibfk_4` FOREIGN KEY (`hakem_id`) REFERENCES `hakemler` (`hakem_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fikstur_ibfk_5` FOREIGN KEY (`gozlemci_id`) REFERENCES `gozlemci` (`gozlemci_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fikstur_ibfk_6` FOREIGN KEY (`stadyum_id`) REFERENCES `stadyumlar` (`stadyum_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `goller`
--
ALTER TABLE `goller`
  ADD CONSTRAINT `goller_ibfk_1` FOREIGN KEY (`mac_id`) REFERENCES `fikstur` (`mac_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `goller_ibfk_2` FOREIGN KEY (`oyuncu_id`) REFERENCES `futbolcular` (`lisans_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `kupa`
--
ALTER TABLE `kupa`
  ADD CONSTRAINT `kupa_ibfk_1` FOREIGN KEY (`sampiyon_takim_id`) REFERENCES `takimlar` (`takim_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `takimlar`
--
ALTER TABLE `takimlar`
  ADD CONSTRAINT `takimlar_ibfk_1` FOREIGN KEY (`lig_id`) REFERENCES `ligler` (`lig_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `takimlar_ibfk_2` FOREIGN KEY (`teknik_id`) REFERENCES `teknik_direktor` (`teknik_id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
