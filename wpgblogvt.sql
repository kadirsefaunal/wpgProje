-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 15 May 2016, 21:51:23
-- Sunucu sürümü: 5.7.9
-- PHP Sürümü: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `wpgblogvt`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

DROP TABLE IF EXISTS `kullanicilar`;
CREATE TABLE IF NOT EXISTS `kullanicilar` (
  `KullaniciID` int(11) NOT NULL AUTO_INCREMENT,
  `KullaniciAdi` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `KullaniciSifre` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `KullaniciEMail` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `ProfilFoto` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`KullaniciID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`KullaniciID`, `KullaniciAdi`, `KullaniciSifre`, `KullaniciEMail`, `ProfilFoto`) VALUES
(1, 'kadirsefau', 'asd', 'kadirsefau@gmail.com', 'img\\sefa.png'),
(2, 'kadirmutlu', 'asd', 'kadirmutluu@gmail.com', 'img\\mutlu.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `makale`
--

DROP TABLE IF EXISTS `makale`;
CREATE TABLE IF NOT EXISTS `makale` (
  `MakaleID` int(11) NOT NULL AUTO_INCREMENT,
  `YazarID` int(11) NOT NULL,
  `Kategori` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `MakaleBaslik` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `MakaleIcerik` text COLLATE utf8_turkish_ci NOT NULL,
  `EklenmeTarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`MakaleID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `makale`
--

INSERT INTO `makale` (`MakaleID`, `YazarID`, `Kategori`, `MakaleBaslik`, `MakaleIcerik`, `EklenmeTarihi`) VALUES
(1, 1, 'Yazılım', 'Deneme 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin maximus, mauris elementum finibus rhoncus, ligula purus lobortis est, ac pellentesque elit sapien vel nunc. Fusce non euismod nisl. Etiam sit amet enim egestas odio dapibus semper eu sit amet velit. Curabitur ultricies laoreet dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eleifend id arcu quis porta. Cras non cursus leo. Sed nibh est, semper nec diam eget, faucibus condimentum massa. Cras pellentesque purus ut odio semper, sed dictum est finibus. Aenean maximus nibh at metus sollicitudin, eget tincidunt nisl tristique. Donec nec convallis lorem. Aliquam diam neque, congue non pulvinar ac, tincidunt nec felis. Proin convallis eros sit amet lacus venenatis ornare ac id nunc. Aenean eget arcu a erat bibendum auctor vel a turpis.\r\n\r\nPhasellus diam dui, hendrerit nec mattis quis, sollicitudin in massa. Sed sem lacus, pretium id semper ut, tristique volutpat velit. Nulla faucibus leo turpis, et convallis nisl volutpat sed. Ut vulputate vestibulum felis, sit amet scelerisque neque sodales nec. Cras ipsum mi, vulputate ut odio et, congue tempus massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et nulla porttitor, dapibus nisl et, convallis sapien. Proin sed est nec mi ultricies egestas.', '2016-05-14 15:40:16'),
(2, 2, '', 'Deneme 2', 'Deneme 2 yazısıdır.Deneme 2 yazısıdır.Deneme 2 yazısıdır.Deneme 2 yazısıdır.Deneme 2 yazısıdır.', '2016-05-14 15:40:58'),
(3, 2, 'Donanım', 'Deneme 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin maximus, mauris elementum finibus rhoncus, ligula purus lobortis est, ac pellentesque elit sapien vel nunc. Fusce non euismod nisl. Etiam sit amet enim egestas odio dapibus semper eu sit amet velit. Curabitur ultricies laoreet dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eleifend id arcu quis porta. Cras non cursus leo. Sed nibh est, semper nec diam eget, faucibus condimentum massa. Cras pellentesque purus ut odio semper, sed dictum est finibus. Aenean maximus nibh at metus sollicitudin, eget tincidunt nisl tristique. Donec nec convallis lorem. Aliquam diam neque, congue non pulvinar ac, tincidunt nec felis. Proin convallis eros sit amet lacus venenatis ornare ac id nunc. Aenean eget arcu a erat bibendum auctor vel a turpis.\r\n\r\nPhasellus diam dui, hendrerit nec mattis quis, sollicitudin in massa. Sed sem lacus, pretium id semper ut, tristique volutpat velit. Nulla faucibus leo turpis, et convallis nisl volutpat sed. Ut vulputate vestibulum felis, sit amet scelerisque neque sodales nec. Cras ipsum mi, vulputate ut odio et, congue tempus massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et nulla porttitor, dapibus nisl et, convallis sapien. Proin sed est nec mi ultricies egestas.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin maximus, mauris elementum finibus rhoncus, ligula purus lobortis est, ac pellentesque elit sapien vel nunc. Fusce non euismod nisl. Etiam sit amet enim egestas odio dapibus semper eu sit amet velit. Curabitur ultricies laoreet dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eleifend id arcu quis porta. Cras non cursus leo. Sed nibh est, semper nec diam eget, faucibus condimentum massa. Cras pellentesque purus ut odio semper, sed dictum est finibus. Aenean maximus nibh at metus sollicitudin, eget tincidunt nisl tristique. Donec nec convallis lorem. Aliquam diam neque, congue non pulvinar ac, tincidunt nec felis. Proin convallis eros sit amet lacus venenatis ornare ac id nunc. Aenean eget arcu a erat bibendum auctor vel a turpis.\r\n\r\nPhasellus diam dui, hendrerit nec mattis quis, sollicitudin in massa. Sed sem lacus, pretium id semper ut, tristique volutpat velit. Nulla faucibus leo turpis, et convallis nisl volutpat sed. Ut vulputate vestibulum felis, sit amet scelerisque neque sodales nec. Cras ipsum mi, vulputate ut odio et, congue tempus massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et nulla porttitor, dapibus nisl et, convallis sapien. Proin sed est nec mi ultricies egestas.', '2016-05-14 15:40:58'),
(4, 1, 'Yazılım', 'Deneme 4', 'a', '2016-05-15 11:52:04'),
(5, 2, 'Donanım', 'Deneme 4', '', '2016-05-15 11:52:15'),
(6, 1, 'asd', 'Deneme 5', 'Deneme 5', '2016-05-15 11:53:05'),
(7, 2, 'KonuDışı', 'Deneme 6', 'Deneme 6', '2016-05-15 11:53:49');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

DROP TABLE IF EXISTS `yorumlar`;
CREATE TABLE IF NOT EXISTS `yorumlar` (
  `YorumID` int(11) NOT NULL AUTO_INCREMENT,
  `MakaleID` int(11) NOT NULL,
  `AdSoyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `Yorum` text COLLATE utf8_turkish_ci NOT NULL,
  `Tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`YorumID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
