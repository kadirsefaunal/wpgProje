-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 May 2016, 14:54:29
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
  PRIMARY KEY (`KullaniciID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

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
