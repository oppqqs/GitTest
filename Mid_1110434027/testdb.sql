-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2019-04-16 17:24:01
-- 伺服器版本: 5.7.11
-- PHP 版本： 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `testdb`
--
CREATE DATABASE IF NOT EXISTS `testdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `testdb`;

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--
-- 建立時間: 2019-04-16 13:59:26
-- 最後更新: 2019-04-16 16:32:48
--

CREATE TABLE `products` (
  `pId` int(11) UNSIGNED NOT NULL,
  `pCategory` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `pName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pPrice` int(11) UNSIGNED DEFAULT NULL,
  `pImages` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pDescription` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表新增前先清除舊資料 `products`
--

TRUNCATE TABLE `products`;
--
-- 資料表的匯出資料 `products`
--

INSERT INTO `products` (`pId`, `pCategory`, `pName`, `pPrice`, `pImages`, `pDescription`) VALUES
(1, 'ASUS', 'ASUS W5GT24DD', 54800, 'W5GT24DD.jpg', '◆ 1024MBDDRII雙通道記憶體\r\n◆ 100GB超大硬碟容量\r\n◆ 內建130萬畫素網路攝影機\r\n◆ 12吋鏡面寬螢幕'),
(2, 'ASUS', 'ASUS F3APT24DD', 51800, 'F3APT24DD.jpg', '◆ Intel雙核T2400\r\n◆ ATi獨立顯示TC256\r\n◆ 15.4吋鏡面寬螢幕\r\n◆ 100G-SATA\r\n◆ DVDSuperMulti(DL)'),
(3, 'ASUS', 'ASUS W7J', 58800, 'W7J.jpg', '◆ 雙核IntelDualCoreT2400處理器1.83G\r\n◆ Intel945PM高效晶片\r\n◆ nV獨立顯示256MB\r\n◆ 13吋鏡面寬螢'),
(4, 'ASUS', 'ASUS S6F', 68800, 'S6F.jpg', '◆ 11.1吋鏡面寬螢幕\r\n◆ 內建1GBDDRII記憶體\r\n◆ 雙核心低電壓超省電CPU\r\n◆ 大容量120GB\r\n◆ 附贈真皮保證書與真皮光學滑鼠'),
(5, 'ASUS', 'ASUS VX1', 108800, 'VX1.jpg', '◆ 師法藍寶堅尼跑車俐落線條美學\r\n◆ 15吋高解析鏡面螢幕1400x1050\r\n◆ 頂級獨立顯示NV7400VX-512MB\r\n◆ Intel雙核心T2500'),
(6, 'ACER', 'ACER 3628A', 26900, '3628A.jpg', '◆ 14.1吋鏡面寬螢幕\r\n◆ 內建DVD燒錄機SuperMuti\r\n◆ 超輕巧2.35KG\r\n◆ IntelPentium1.7G'),
(7, 'ACER', 'ACER TM2403', 22900, 'TM2403.jpg', '◆ 14.1吋寬螢幕\r\n◆ Intel新一代910GML晶片,DDR2記憶體\r\n◆ CeleronM最新超值奈米機\r\n◆ 創新FOLIO造型'),
(8, 'ACER', 'ACER 5562', 48900, '5562.jpg', '◆ IntelCoreDuo雙核心\r\n◆ ATIX1400512MB3D顯示\r\n◆ 旋轉式130萬視訊\r\n◆ 抽取式藍芽網路話機'),
(9, 'ACER', 'ACER Ferrari 4002WLMi', 48800, '4002WLMi.jpg', '◆ 採用AMDTurion64全新64位元處理器\r\n◆ 上蓋碳纖維材質\r\n◆ ATIX700獨立顯示\r\n◆ 內建藍芽'),
(10, 'ACER', 'ACER 3022WTMi', 52900, '3022WTMi.jpg', '◆ 1.5kg輕巧靈動A4大小\r\n◆ 超效IntelCoreDuo雙核心\r\n◆ 130萬畫素225度網路視訊\r\n◆ 藍芽無線傳輸'),
(11, 'HP', 'HP TC4200', 57900, 'TC4200.jpg', '◆ 可拆式旋轉鍵盤設計\r\n◆ 採用強化玻璃\r\n◆ 效能卓越、攜帶方便\r\n◆ 三年保固'),
(12, 'HP', 'HP NC2400', 55900, 'NC2400.jpg', '◆ 超輕12吋WXGA\r\n◆ 鎂合金機身\r\n◆ 內建指紋辨識器\r\n◆ 內建光碟1.5KG'),
(13, 'HP', 'HP V2632', 39900, 'V2632.jpg', '◆ 14吋鏡面寬螢幕\r\n◆ Intel雙核心T2400\r\n◆ 80GB-SATA超大硬碟\r\n◆ 藍芽技術'),
(14, 'HP', 'HP Presario B2821', 36900, 'B2821.jpg', '◆ ATIX600獨立128MB顯示晶片\r\n◆ 白色鋼琴烤漆外觀\r\n◆ BrightView超亮顯示屏\r\n◆ 輕薄便攜僅重2.0kg'),
(15, 'SONY', 'SONY VGN-AR18TP', 149800, 'VGN-AR18TP.jpg', '◆ Intel雙核心T2600\r\n◆ NVIGF7600GT256MB\r\n◆ 160超大SATA硬碟\r\n◆ 17吋1920X1200高畫質\r\n◆ 藍光燒錄'),
(16, 'SONY', 'SONY VAIO VGN-FJ79TP', 39800, 'VGN-FJ79TP.jpg', '◆ IntelPM2G處理器\r\n◆ 14吋寬螢\r\n◆ 80GBSATA大硬碟\r\n◆ DVD雙層燒錄\r\n◆ 專業版XPP'),
(17, 'SONY', 'SONY VGN-FE25TP', 49800, 'VGN-FE25TP.jpg', '◆ Intel雙核心T2400\r\n◆ 80GBSATA大硬碟\r\n◆ NVIGF7400獨立顯示256MB\r\n◆ 15.4吋2.85KG');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pId`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `pId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
