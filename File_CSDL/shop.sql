-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 20, 2021 lúc 06:16 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `gioitinh` varchar(50) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `gioitinh`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(5, 'quocdat', 'Nam', 'quocdatyl@gmail.com', 'quocdat', '4297f44b13955235245b2497399d7a93', 0),
(6, 'ADMIN', 'Nam', 'adminshop@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(27, 'Saga'),
(28, 'Fouetté'),
(29, 'Casio'),
(30, 'Citizen'),
(32, 'Seiko'),
(33, 'OP'),
(34, 'Daniel Wellington (DW)'),
(35, 'Smartwatch'),
(36, 'Orient'),
(37, 'G-Shock Baby-G'),
(38, 'Fossil'),
(39, 'Skagen'),
(40, 'Candino'),
(41, 'Michael Kors'),
(43, 'Adriatica'),
(44, 'Longines'),
(45, 'Doxa'),
(46, 'Tissot'),
(47, 'Rado'),
(48, 'Movado');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `productId`, `sId`, `productName`, `price`, `quantity`, `image`) VALUES
(96, 52, 'l9n1qbflul02b7ccoc00a17hro', 'APPLE WATCH SERIES 5 – GPS – 44MM – VIỀN THÉP VÀNG HỒNG – DÂY CAO SU (MWWH2VN-A)', '18200000', 1, '1e0abed808.jpg'),
(97, 52, 'cf225ert145ltv8pd57vh23f9r', 'APPLE WATCH SERIES 5 – GPS – 44MM – VIỀN THÉP VÀNG HỒNG – DÂY CAO SU (MWWH2VN-A)', '18200000', 1, '1e0abed808.jpg'),
(98, 53, 'cf225ert145ltv8pd57vh23f9r', 'CASIO ĐÔI – QUARTZ (PIN) – DÂY KIM LOẠI (MTP-TW100D-5AVDF – LTP-TW100D-5AVDF)', '4554000', 1, '5dd05d9a0e.png'),
(108, 25, '67avp476et8uvpht7d5auniit2', 'SAGA 53229 SVMWSV-6 – NỮ – QUARTZ (PIN) – DÂY KIM LOẠI', '6384000', 1, '35dec80c79.webp'),
(109, 70, '67avp476et8uvpht7d5auniit2', 'APPLE WATCH SERIES 3 – GPS – 42MM – VIỀN NHÔM ĐEN – DÂY CAO SU (MTH22VN-A)', '8300000', 1, 'eed53714aa.webp'),
(127, 50, 'vqmml6iu1dd1928t0i2nmkvi0n', 'DANIEL WELLINGTON DW00100011 – NAM – QUARTZ (PIN) – DÂY DA – MẶT SỐ 40MM', '5300000', 1, 'f5bbbadb5c.webp'),
(128, 70, 'vqmml6iu1dd1928t0i2nmkvi0n', 'APPLE WATCH SERIES 3 – GPS – 42MM – VIỀN NHÔM ĐEN – DÂY CAO SU (MTH22VN-A)', '8300000', 2, 'eed53714aa.webp'),
(130, 70, '84a2dufnji41somportd0077vg', 'APPLE WATCH SERIES 3 – GPS – 42MM – VIỀN NHÔM ĐEN – DÂY CAO SU (MTH22VN-A)', '8300000', 2, 'eed53714aa.webp'),
(131, 69, 'gr0btvr1l8mko1f72nnedlle86', 'APPLE WATCH SERIES 5 – GPS – 44MM – VIỀN THÉP – DÂY CAO SU (MWWF2VN-A)', '18200000', 2, 'e8fc662b87.webp'),
(132, 70, '9rhhvieak69on0a21d0jb9oc6b', 'APPLE WATCH SERIES 3 – GPS – 42MM – VIỀN NHÔM ĐEN – DÂY CAO SU (MTH22VN-A)', '8300000', 2, 'eed53714aa.webp'),
(139, 70, '14i5asa0227lt2ct9bf951bjfk', 'APPLE WATCH SERIES 3 – GPS – 42MM – VIỀN NHÔM ĐEN – DÂY CAO SU (MTH22VN-A)', '8300000', 1, 'eed53714aa.webp'),
(141, 69, '43rl6dlor9mb08ck54jc82ot0m', 'APPLE WATCH SERIES 5 – GPS – 44MM – VIỀN THÉP – DÂY CAO SU (MWWF2VN-A)', '18200000', 1, 'e8fc662b87.webp'),
(157, 39, '76p4fslf8kjbola8of9a659hjh', 'CASIO MTP-1381L-9AVDF – NAM – QUARTZ (PIN) – DÂY DA', '1457000', 1, 'e6db2aaab0.webp'),
(187, 69, '1vkf0qfgss3j4hnfsq2ehgom21', 'APPLE WATCH SERIES 5 – GPS – 44MM – VIỀN THÉP – DÂY CAO SU (MWWF2VN-A)', '18200000', 1, 'e8fc662b87.webp'),
(196, 69, '2p1htrrlikohks9ahbrh1kuauj', 'APPLE WATCH SERIES 5 – GPS – 44MM – VIỀN THÉP – DÂY CAO SU (MWWF2VN-A)', '18200000', 1, 'e8fc662b87.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(26, 'CÁC HÃNG BÁN CHẠY'),
(27, 'KHUYÊN DÙNG'),
(28, 'CÁC DÒNG ĐẶC BIỆT'),
(29, 'SWISS MADE (THỤY SỸ)'),
(30, 'CHẤT LIỆU DÂY'),
(31, 'KHOẢNG GIÁ'),
(33, 'THƯƠNG HIỆU HOT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `cmt_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cmt` text NOT NULL,
  `rep_cmt` text DEFAULT 'Null',
  `product_id` int(11) NOT NULL,
  `vote` int(11) NOT NULL,
  `datecmt` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_comment`
--

INSERT INTO `tbl_comment` (`cmt_id`, `name`, `email`, `cmt`, `rep_cmt`, `product_id`, `vote`, `datecmt`, `status`) VALUES
(27, 'Danh Quốc Đạt', 'nienluan@gmail.com', 'Sản phẩm đẹp, giao hàng nhanh', 'Cảm ơn khách hàng đã đóng góp ý kiến', 69, 4, 'Friday, May 14, 2021', 1),
(28, 'Danh Quốc Đạt', 'nienluan@gmail.com', 'Sản phẩm đẹp, chất lượng rất tốt.', 'Cảm ơn bạn đã đóng ý kiến và sử dụng sản phẩm từ cửa hàng.', 71, 5, 'Wednesday, May 19, 2021', 1),
(29, 'Quốc Đạt', 'datb1706798@gmail.com', 'Sản phẩm sử dụng rất ok. Giao hàng nhanh.', 'Null', 52, 5, 'Thursday, May 20, 2021', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `pro_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(50) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `gender`, `phone`, `email`, `password`, `type`) VALUES
(35, 'Danh Quốc Đạt', '150z/17 Nguyễn Văn Cừ, An Khánh, Ninh kiều', 'Cần Thơ', 'Việt Nam', 'Nam', '0941827403', 'nienluan@gmail.com', '4297f44b13955235245b2497399d7a93', 'Store'),
(38, 'Quốc Đạt', 'Châu Thành, Kiên Giang', 'Rạch Giá', 'Việt Nam', 'Nam', '0941827403', 'datb1706798@gmail.com', '', 'Google');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_ordered` varchar(255) DEFAULT NULL,
  `pay` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `productId`, `productName`, `customer_id`, `quantity`, `price`, `image`, `status`, `date_order`, `date_ordered`, `pay`) VALUES
(108, 71, 'APPLE WATCH SERIES 5 – GPS – 44MM – VIỀN NHÔM BẠC – DÂY KIM LOẠI (MWWJ2VN-A)', 38, 1, '19500000', 'ceb644d2c4.webp', 2, '2021-05-13 05:46:58', 'Thursday, May 13, 2021', 'check'),
(109, 52, 'APPLE WATCH SERIES 5 – GPS – 44MM – VIỀN THÉP VÀNG HỒNG – DÂY CAO SU (MWWH2VN-A)', 35, 1, '18200000', '1e0abed808.jpg', 2, '2021-05-14 00:43:28', 'Friday, May 14, 2021', 'check'),
(110, 52, 'APPLE WATCH SERIES 5 – GPS – 44MM – VIỀN THÉP VÀNG HỒNG – DÂY CAO SU (MWWH2VN-A)', 35, 1, '18200000', '1e0abed808.jpg', 0, '2021-05-19 16:17:51', NULL, 'unpaid'),
(111, 25, 'SAGA 53229 SVMWSV-6 – NỮ – QUARTZ (PIN) – DÂY KIM LOẠI', 35, 1, '6384000', '35dec80c79.webp', 0, '2021-05-19 16:17:51', NULL, 'unpaid');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` tinytext NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `pro_desc` text NOT NULL,
  `pro_details` text NOT NULL,
  `style` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `pro_desc`, `pro_details`, `style`, `type`, `price`, `image`) VALUES
(24, 'SAGA 53229 RGMWRG-2 – NỮ – QUARTZ (PIN) – DÂY KIM LOẠI', 26, 27, '<p><span>Mẫu Saga 53229 RGMWRG-2 phi&ecirc;n bản d&acirc;y lắc tone m&agrave;u v&agrave;ng hồng thời trang kết hợp c&ugrave;ng nền mặt số x&agrave; cừ size 24 với thiết kế 3 kim đơn giản trẻ trung.</span></p>', '<p><strong>Thương Hiệu: Saga</strong><br /><strong>Số Hiệu Sản Phẩm: 53229 RGMWRG-2</strong><br /><strong>Xuất Xứ: Mỹ</strong><br /><strong>Giới T&iacute;nh: Nữ</strong><br /><strong>K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)</strong><br /><strong>M&aacute;y: Quartz (Pin)</strong><br /><strong>Bảo H&agrave;nh Quốc Tế: 2 Năm</strong><br /><strong>Bảo H&agrave;nh Tại Hải Triều: 5 Năm</strong><br /><strong>Đường K&iacute;nh Mặt Số: 24 mm</strong><br /><strong>Bề D&agrave;y Mặt Số: mm</strong><br /><strong>Niềng: Th&eacute;p Kh&ocirc;ng Gỉ</strong><br /><strong>D&acirc;y Đeo: Th&eacute;p Kh&ocirc;ng Gỉ</strong><br /><strong>M&agrave;u Mặt Số: Trắng X&agrave; Cừ</strong><br /><strong>Chống Nước: 3 ATM</strong><br /><strong>T&iacute;nh Năng: Đ&iacute;nh Đ&aacute; Swarovski</strong><br /><strong>Nơi sản xuất: Trung Quốc</strong></p>\r\n<p>&nbsp;</p>', 0, 2, '6384000', '0c64c6f47e.webp'),
(25, 'SAGA 53229 SVMWSV-6 – NỮ – QUARTZ (PIN) – DÂY KIM LOẠI', 26, 27, '<p><span>Mẫu Saga 53229 SVMWSV-6 phi&ecirc;n bản d&acirc;y lắc tone m&agrave;u bạc thời trang kết hợp c&ugrave;ng nền mặt số x&agrave; cừ size 24 với thiết kế 3 kim đơn giản trẻ trung.</span></p>', '<p><br /><strong>Thương Hiệu: Saga</strong><br /><strong>Số Hiệu Sản Phẩm: 53229 SVMWSV-6</strong><br /><strong>Xuất Xứ: Mỹ</strong><br /><strong>Giới T&iacute;nh: Nữ</strong><br /><strong>K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)</strong><br /><strong>M&aacute;y: Quartz (Pin)</strong><br /><strong>Bảo H&agrave;nh Quốc Tế: 2 Năm</strong><br /><strong>Bảo H&agrave;nh Tại Hải Triều: 5 Năm</strong><br /><strong>Đường K&iacute;nh Mặt Số: 24 mm</strong><br /><strong>Bề D&agrave;y Mặt Số: mm</strong><br /><strong>Niềng: Th&eacute;p Kh&ocirc;ng Gỉ</strong><br /><strong>D&acirc;y Đeo: Th&eacute;p Kh&ocirc;ng Gỉ</strong><br /><strong>M&agrave;u Mặt Số: Trắng X&agrave; Cừ</strong><br /><strong>Chống Nước: 3 ATM</strong><br /><strong>T&iacute;nh Năng: Đ&iacute;nh Đ&aacute; Swarovski</strong><br /><strong>Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</strong></p>', 0, 2, '6384000', '35dec80c79.webp'),
(27, 'SAGA 80727 GPMWGP-2L – NỮ – QUARTZ (PIN) – DÂY KIM LOẠI', 26, 27, '<p><span>Mẫu Saga 80727 GPMWGP-2L mặt số vu&ocirc;ng tone m&agrave;u x&agrave; cừ c&ugrave;ng với thiết kế đơn giản 2 kim trẻ trung sang trọng kết hợp c&ugrave;ng bộ d&acirc;y lắc mạ v&agrave;ng.</span></p>', '<p><br />Thương Hiệu: Saga<br />Số Hiệu Sản Phẩm: 80727 GPMWGP-2L<br />Xuất Xứ: Mỹ<br />Giới T&iacute;nh: Nữ<br />K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)<br />M&aacute;y: Quartz (Pin)<br />Bảo H&agrave;nh Quốc Tế: 2 Năm<br />Bảo H&agrave;nh Tại Hải Triều: 5 Năm<br />Đường K&iacute;nh Mặt Số: 21.7 mm x 22.5 mm<br />Bề D&agrave;y Mặt Số: mm<br />Niềng: Th&eacute;p Kh&ocirc;ng Gỉ<br />D&acirc;y Đeo: Th&eacute;p Kh&ocirc;ng Gỉ<br />M&agrave;u Mặt Số: Trắng X&agrave; Cừ<br />Chống Nước: 3 ATM<br />T&iacute;nh Năng: Đ&iacute;nh Đ&aacute; Swarovski<br />Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 0, 2, '6004000', '9d5944d87c.webp'),
(28, 'SAGA 53555 RGMWRG-2 – NỮ – QUARTZ (PIN) – DÂY KIM LOẠI', 26, 27, '<p>Mẫu Saga 53555 RGMWRG-2 phi&ecirc;n bản v&agrave;ng hồng tone m&agrave;u thời trang với nền mặt số x&agrave; cừ size 22mm nổi bật thiết kế đ&iacute;nh pha l&ecirc; Swarovski kết hợp c&ugrave;ng bộ d&acirc;y đeo tay kiểu d&acirc;y lắc.</p>', '<p>Thương Hiệu: Saga<br />Số Hiệu Sản Phẩm: 53555 RGMWRG-2<br />Xuất Xứ: Mỹ<br />Giới T&iacute;nh: Nữ<br />K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)<br />M&aacute;y: Quartz (Pin)<br />Bảo H&agrave;nh Quốc Tế: 2 Năm<br />Bảo H&agrave;nh Tại Hải Triều: 5 Năm<br />Đường K&iacute;nh Mặt Số: 22.5 mm<br />Bề D&agrave;y Mặt Số: mm<br />Niềng: Th&eacute;p Kh&ocirc;ng Gỉ<br />D&acirc;y Đeo: Th&eacute;p Kh&ocirc;ng Gỉ<br />M&agrave;u Mặt Số: Trắng X&agrave; Cừ<br />Chống Nước: 3 ATM<br />T&iacute;nh Năng: Đ&iacute;nh Đ&aacute; Swarovski<br />Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 0, 2, '5624000', '692930a123.webp'),
(29, 'SAGA 53624 SVBLBL-2 – NỮ – QUARTZ (PIN) – DÂY DA', 26, 27, '<p>Mẫu Saga 53624 SVBLBL-2 phi&ecirc;n bản d&acirc;y da tạo h&igrave;nh v&acirc;n thanh lịch trẻ trung với tone m&agrave;u xanh, mặt số tr&ograve;n size 28mm với họa tiết thời trang tone m&agrave;u x&agrave; cừ.</p>', '<p><br />Thương Hiệu: Saga<br />Số Hiệu Sản Phẩm: 53624 SVBLBL-2<br />Xuất Xứ: Mỹ<br />Giới T&iacute;nh: Nữ<br />K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)<br />M&aacute;y: Quartz (Pin)<br />Bảo H&agrave;nh Quốc Tế: 2 Năm<br />Bảo H&agrave;nh Tại Hải Triều: 5 Năm<br />Đường K&iacute;nh Mặt Số: 28.5 mm<br />Bề D&agrave;y Mặt Số: mm<br />Niềng: Th&eacute;p Kh&ocirc;ng Gỉ<br />D&acirc;y Đeo: D&acirc;y Da Ch&iacute;nh H&atilde;ng<br />M&agrave;u Mặt Số: Xanh khảm X&agrave; Cừ<br />Chống Nước: 3 ATM<br />T&iacute;nh Năng: Đ&iacute;nh Đ&aacute; Swarovski<br />Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 1, 2, '6004000', 'f7cce829c1.webp'),
(30, 'FOUETTÉ OR-FAIRY I – NỮ – KÍNH SAPPHIRE – QUARTZ (PIN) – DÂY DA – LIMITED EDITION', 26, 28, '<p><span>Mẫu Fouett&eacute; OR-FAIRY I phi&ecirc;n bản giới hạn 99 chiếc tr&ecirc;n to&agrave;n thế giới mang tr&ecirc;n m&igrave;nh một thiết kế độc đ&aacute;o khắc họa l&ecirc;n h&igrave;nh ảnh một vũ c&ocirc;ng ba l&ecirc; tr&ecirc;n nền mặt số size 38mm.</span></p>', '<p>Thương Hiệu: Fouett&eacute; (Phi&ecirc;n Bản Giới Hạn 99 Chiếc Tr&ecirc;n To&agrave;n Thế Giới)<br />Số Hiệu Sản Phẩm: OR-FAIRY I<br />Xuất Xứ: Hồng K&ocirc;ng (Nh&agrave; v&ocirc; địch cuộc thi thiết kế đồng hồ Hong Kong Watch &amp; Clock Fair 2016)<br />Giới T&iacute;nh: Nữ<br />K&iacute;nh: Sapphire (K&iacute;nh Chống Trầy)<br />M&aacute;y:Đồng hồ Quartz (Pin) Ronda (Thụy Sỹ) &amp; B&uacute;p b&ecirc; Ba l&ecirc; hoạt động bằng bộ m&aacute;y cơ<br />Bảo H&agrave;nh Quốc Tế: 2 Năm<br />Bảo H&agrave;nh Tại Hải Triều: 4 Năm &ndash; RED Guarantee<br />Đường K&iacute;nh Mặt Số: 38 mm<br />Bề D&agrave;y Mặt Số: <br />Niềng: Th&eacute;p Kh&ocirc;ng Gỉ<br />D&acirc;y Đeo:D&acirc;y da &Aacute;o của h&atilde;ng Hirsch, da thật 100%<br />M&agrave;u Mặt Số: Hồng<br />Chống Nước: 3 ATM<br />T&iacute;nh Năng: X&agrave; Cừ &ndash; Mặt K&iacute;nh Cong</p>', 1, 2, '25500000', '32a8688d1a.webp'),
(31, 'FOUETTÉ OR-5 – NỮ – QUARTZ (PIN) – DÂY DA', 26, 27, '<p><span>Mẫu đồng hồ Fouett&eacute; OR-5 mang tr&ecirc;n m&igrave;nh một thiết kế độc đ&aacute;o khắc họa l&ecirc;n h&igrave;nh ảnh một vũ c&ocirc;ng ba l&ecirc; chuy&ecirc;n nghiệp đang tr&igrave;nh diễn tr&ecirc;n nền mặt số được đ&iacute;nh k&egrave;m c&aacute;c vi&ecirc;n kim cương tạo n&ecirc;n một vẻ đẹp đầy cuốn h&uacute;t d&agrave;nh cho ph&aacute;i đẹp.</span></p>', '<p>Thương Hiệu: Fouett&eacute; (Đọc: Ph&iacute;t Ty)<br />Số Hiệu Sản Phẩm: Fouett&eacute; OR-5<br />Xuất Xứ: Hong Kong (Nh&agrave; v&ocirc; địch cuộc thi thiết kế đồng hồ Hong Kong Watch &amp; Clock Fair 2016)<br />Giới T&iacute;nh: Nữ<br />K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)<br />M&aacute;y: Đồng hồ Quartz (Pin) Ronda (Thụy Sỹ) &amp; B&uacute;p b&ecirc; Ba l&ecirc; hoạt động bằng bộ m&aacute;y cơ<br />Mặt số: X&agrave; cừ tự nhi&ecirc;n, đ&iacute;nh pha l&ecirc; Swarovski (V&aacute;y b&uacute;p b&ecirc; 12 vi&ecirc;n, viền 76 vi&ecirc;n)<br />B&uacute;p B&ecirc; Ballet: Chất liệu Bạc 925, thiết kế thủ c&ocirc;ng<br />Bảo H&agrave;nh Quốc Tế: 2 Năm<br />Bảo H&agrave;nh Tại Hải Triều: 4 Năm &ndash; RED Guarantee<br />Đường K&iacute;nh Mặt Số: 38 mm<br />Hộp: Gỗ, c&ocirc;ng nghệ sơn của đ&agrave;n Piano, c&oacute; hộp nhạc<br />Chất Liệu Niềng, Vỏ, Đ&aacute;y: Th&eacute;p Kh&ocirc;ng Gỉ (Inox 316L)<br />D&acirc;y Đeo: D&acirc;y da &Aacute;o của h&atilde;ng Hirsch, da b&ograve; thật 100% phủ Satin<br />M&agrave;u Mặt Số: Đen<br />Chống Nước: 3 ATM</p>', 1, 2, '15500000', '921622d513.webp'),
(33, 'FOUETTÉ OR-STAR – NỮ – QUARTZ (PIN) – DÂY DA', 26, 28, '<p><span>Mẫu Fouett&eacute; OR-STAR mang tr&ecirc;n m&igrave;nh một thiết kế độc đ&aacute;o khắc họa l&ecirc;n h&igrave;nh ảnh một vũ c&ocirc;ng ba l&ecirc; chuy&ecirc;n nghiệp đang tr&igrave;nh diễn tr&ecirc;n nền mặt số được đ&iacute;nh k&egrave;m c&aacute;c vi&ecirc;n kim cương tạo n&ecirc;n một vẻ đẹp đầy cuốn h&uacute;t d&agrave;nh cho ph&aacute;i đẹp.</span></p>', '<p>Thương Hiệu: Fouett&eacute; (Đọc: Ph&iacute;t Ty)<br />Số Hiệu Sản Phẩm: OR-STAR<br />Xuất Xứ: Hong Kong (Nh&agrave; v&ocirc; địch cuộc thi thiết kế đồng hồ Hong Kong Watch &amp; Clock Fair 2016)<br />Giới T&iacute;nh: Nữ<br />K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)<br />M&aacute;y: Đồng hồ Quartz (Pin) Ronda (Thụy Sỹ) &amp; B&uacute;p b&ecirc; Ba l&ecirc; hoạt động bằng bộ m&aacute;y cơ<br />Mặt số: X&agrave; cừ tự nhi&ecirc;n, đ&iacute;nh pha l&ecirc; Swarovski (V&aacute;y b&uacute;p b&ecirc; 12 vi&ecirc;n, viền 76 vi&ecirc;n)<br />B&uacute;p B&ecirc; Ballet: Chất liệu Bạc 925, thiết kế thủ c&ocirc;ng<br />Bảo H&agrave;nh Quốc Tế: 2 Năm<br />Bảo H&agrave;nh Tại Hải Triều: 4 Năm &ndash; RED Guarantee<br />Đường K&iacute;nh Mặt Số: 38 mm<br />Hộp: Gỗ, c&ocirc;ng nghệ sơn của đ&agrave;n Piano, c&oacute; hộp nhạc<br />Chất Liệu Niềng, Vỏ, Đ&aacute;y: Th&eacute;p Kh&ocirc;ng Gỉ (Inox 316L)<br />D&acirc;y Đeo: D&acirc;y da &Aacute;o của h&atilde;ng Hirsch, da b&ograve; thật 100% phủ Satin<br />M&agrave;u Mặt Số: Đen<br />Chống Nước: 3 ATM</p>', 1, 2, '15500000', 'c61ae50672.webp'),
(34, 'FOUETTÉ OR-LOVE – NỮ – QUARTZ (PIN) – DÂY DA', 26, 27, '<p><span>Mẫu đồng hồ Fouett&eacute; OR-LOVE mang tr&ecirc;n m&igrave;nh một thiết kế độc đ&aacute;o khắc họa l&ecirc;n h&igrave;nh ảnh một vũ c&ocirc;ng ba l&ecirc; chuy&ecirc;n nghiệp đang tr&igrave;nh diễn tr&ecirc;n nền mặt số được đ&iacute;nh k&egrave;m c&aacute;c vi&ecirc;n kim cương tạo n&ecirc;n một vẻ đẹp đầy cuốn h&uacute;t d&agrave;nh cho ph&aacute;i đẹp.</span></p>', '<p>Thương Hiệu: Fouett&eacute; (Đọc: Ph&iacute;t Ty)<br />Số Hiệu Sản Phẩm: OR-LOVE<br />Xuất Xứ: Hong Kong (Nh&agrave; v&ocirc; địch cuộc thi thiết kế đồng hồ Hong Kong Watch &amp; Clock Fair 2016)<br />Giới T&iacute;nh: Nữ<br />K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)<br />M&aacute;y: Đồng hồ Quartz (Pin) Ronda (Thụy Sỹ) &amp; B&uacute;p b&ecirc; Ba l&ecirc; hoạt động bằng bộ m&aacute;y cơ<br />Mặt số: X&agrave; cừ tự nhi&ecirc;n, đ&iacute;nh pha l&ecirc; Swarovski (V&aacute;y b&uacute;p b&ecirc; 12 vi&ecirc;n, viền 76 vi&ecirc;n)<br />B&uacute;p B&ecirc; Ballet: Chất liệu Bạc 925, thiết kế thủ c&ocirc;ng<br />Bảo H&agrave;nh Quốc Tế: 2 Năm<br />Bảo H&agrave;nh Tại Hải Triều: 4 Năm &ndash; RED Guarantee<br />Đường K&iacute;nh Mặt Số: 38 mm<br />Hộp: Gỗ, c&ocirc;ng nghệ sơn của đ&agrave;n Piano, c&oacute; hộp nhạc<br />Chất Liệu Niềng, Vỏ, Đ&aacute;y: Th&eacute;p Kh&ocirc;ng Gỉ (Inox 316L)<br />D&acirc;y Đeo: D&acirc;y da &Aacute;o của h&atilde;ng Hirsch, da b&ograve; thật 100% phủ Satin<br />M&agrave;u Mặt Số: Hồng<br />Chống Nước: 3 ATM</p>', 1, 2, '15500000', 'e062907f1e.webp'),
(35, 'FOUETTÉ OR-FAIRY II – NỮ – KÍNH SAPPHIRE – QUARTZ (PIN) – DÂY DA – LIMITED EDITION', 26, 28, '<p><span>Mẫu Fouett&eacute; OR-FAIRY II phi&ecirc;n bản giới hạn 99 chiếc tr&ecirc;n to&agrave;n thế giới mang tr&ecirc;n m&igrave;nh một thiết kế độc đ&aacute;o khắc họa l&ecirc;n h&igrave;nh ảnh một vũ c&ocirc;ng ba l&ecirc; tr&ecirc;n nền mặt số x&agrave; cừ size 38mm.</span></p>', '<p>Thương Hiệu: Fouett&eacute; (Phi&ecirc;n Bản Giới Hạn 99 Chiếc Tr&ecirc;n To&agrave;n Thế Giới)<br />Số Hiệu Sản Phẩm: OR-FAIRY II<br />Xuất Xứ: Hồng K&ocirc;ng (Nh&agrave; v&ocirc; địch cuộc thi thiết kế đồng hồ Hong Kong Watch &amp; Clock Fair 2016)<br />Giới T&iacute;nh: Nữ<br />K&iacute;nh: Sapphire (K&iacute;nh Chống Trầy)<br />M&aacute;y: Đồng hồ Quartz (Pin) của h&atilde;ng Ronda (Thụy Sỹ) &amp; B&uacute;p b&ecirc; Ba l&ecirc; hoạt động bằng bộ m&aacute;y cơ<br />Bảo H&agrave;nh Quốc Tế: 2 Năm<br />Bảo H&agrave;nh Tại Hải Triều: 4 Năm &ndash; RED Guarantee<br />Đường K&iacute;nh Mặt Số: 38 mm<br />Bề D&agrave;y Mặt Số: <br />Niềng: Th&eacute;p Kh&ocirc;ng Gỉ<br />D&acirc;y Đeo: D&acirc;y da &Aacute;o của h&atilde;ng Hirsch, da thật 100%<br />M&agrave;u Mặt Số: Xanh<br />Chống Nước: 3 ATM<br />T&iacute;nh Năng: X&agrave; Cừ &ndash; Mặt K&iacute;nh Cong</p>', 1, 2, '25500000', '1f71428a08.webp'),
(36, 'CASIO EFV-500D-7AVUDF – NAM – QUARTZ (PIN) – DÂY KIM LOẠI', 26, 29, '<p><span>Đồng hồ nam Casio EFV-500D-7AVUDF với thiết kế thời trang, vỏ m&aacute;y kim loại, 3 &ocirc; phụ với 3 chức năng kh&aacute;c nhau tạo n&ecirc;n vẻ hiện đại, d&acirc;y đeo mạ bạc nam t&iacute;nh.</span></p>', '<p>Thương Hiệu: Casio<br />Số Hiệu Sản Phẩm: EFV-500D-7AVUDF<br />Xuất Xứ: Nhật Bản<br />Giới T&iacute;nh: Nam<br />K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)<br />M&aacute;y: Quartz (Pin)<br />Bảo H&agrave;nh Quốc Tế: 1 Năm<br />Bảo H&agrave;nh Tại Hải Triều: <br />Đường K&iacute;nh Mặt Số: 47.2 mm<br />Bề D&agrave;y Mặt Số: 12 mm<br />Niềng: <br />D&acirc;y Đeo: <br />M&agrave;u Mặt Số: Trắng<br />Chống Nước: 10 ATM<br />Chức Năng: Lịch Ng&agrave;y &ndash; Đồng Hồ 24 Giờ &ndash; Chronograph<br />Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng):<br /> <br />Trung Quốc</p>', 0, 1, '2562000', 'c40502a56e.webp'),
(37, 'CASIO ECB-900DB-1ADR – NAM – SOLAR (NĂNG LƯỢNG ÁNH SÁNG) – DÂY KIM LOẠI', 26, 29, '<p><span>Mẫu Casio ECB-900DB-1ADR thiết kế viền bezel nền cọc số nổi bật tạo n&ecirc;n phong c&aacute;ch thể thao, t&iacute;nh năng vượt trội pin được trang bị c&ocirc;ng nghệ Solar (Năng lượng &aacute;nh s&aacute;ng).</span></p>', '<p>Thương Hiệu: Casio</p>\r\n<p>Số Hiệu Sản Phẩm: ECB-900DB-1ADR</p>\r\n<p>Xuất Xứ: Nhật Bản</p>\r\n<p>Giới T&iacute;nh: Nam</p>\r\n<p>K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)</p>\r\n<p>M&aacute;y: Solar (Năng lượng &aacute;nh s&aacute;ng)</p>\r\n<p>Bảo H&agrave;nh Quốc Tế: 1 Năm</p>\r\n<p>Bảo H&agrave;nh Tại Hải Triều:</p>\r\n<p>Đường K&iacute;nh Mặt Số: 48 mm</p>\r\n<p>Bề D&agrave;y Mặt Số: 13.9 mm</p>\r\n<p>Niềng:</p>\r\n<p>D&acirc;y Đeo:</p>\r\n<p>M&agrave;u Mặt Số: Đen</p>\r\n<p>Chống Nước: 10 ATM</p>\r\n<p>Chức Năng: Lịch &ndash; Bộ Bấm Giờ &ndash; Giờ K&eacute;p &ndash; V&agrave;i Chức Năng Kh&aacute;c</p>\r\n<p>Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 0, 1, '6580000', 'aae81a1912.webp'),
(38, 'CASIO EFR-560L-7AVUDF – NAM – QUARTZ (PIN) – DÂY DA', 26, 29, '<p><span>Mẫu Casio EFV-580L-7AVUDF đặc trưng thuộc d&ograve;ng Edifice với kiểu d&aacute;ng 6 kim k&egrave;m t&iacute;nh năng đo thời gian Chronograph đi c&ugrave;ng với phi&ecirc;n bản d&acirc;y da v&acirc;n n&acirc;u kho&aacute;c tr&ecirc;n m&igrave;nh vẻ ngo&agrave;i trẻ trung lịch l&atilde;m d&agrave;nh cho ph&aacute;i mạnh.</span></p>', '<p>Thương Hiệu: Casio</p>\r\n<p>Số Hiệu Sản Phẩm: EFV-580L-7AVUDF</p>\r\n<p>Xuất Xứ: Nhật Bản</p>\r\n<p>Giới T&iacute;nh: Nam</p>\r\n<p>K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)</p>\r\n<p>M&aacute;y: Quartz (Pin)</p>\r\n<p>Bảo H&agrave;nh Quốc Tế: 1 Năm</p>\r\n<p>Bảo H&agrave;nh Tại Hải Triều:</p>\r\n<p>Đường K&iacute;nh Mặt Số: 43.8 mm</p>\r\n<p>Bề D&agrave;y Mặt Số: 12.4 mm</p>\r\n<p>Niềng:</p>\r\n<p>D&acirc;y Đeo: D&acirc;y Da Ch&iacute;nh H&atilde;ng</p>\r\n<p>M&agrave;u Mặt Số: Trắng</p>\r\n<p>Chống Nước: 10 ATM</p>\r\n<p>Chức Năng: Lịch Ng&agrave;y &ndash; Chronograph</p>\r\n<p>Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 1, 1, '3361000', '2ed5bba9ed.webp'),
(39, 'CASIO MTP-1381L-9AVDF – NAM – QUARTZ (PIN) – DÂY DA', 26, 29, '<p><span>Đồng hồ nam Casio MTP-1381L-9AVDF với kiểu d&aacute;ng thời trang d&agrave;nh cho nam, kim chỉ v&agrave; vạch số to r&otilde; nổi bật tr&ecirc;n mặt đồng hồ tr&ograve;n to nam t&iacute;nh, phối c&ugrave;ng với d&acirc;y đeo bằng da n&acirc;u lịch l&atilde;m.</span></p>', '<p>Thương Hiệu: Casio</p>\r\n<p>Số Hiệu Sản Phẩm: MTP-1381L-9AVDF</p>\r\n<p>Xuất Xứ: Nhật Bản</p>\r\n<p>Giới T&iacute;nh: Nam</p>\r\n<p>K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)</p>\r\n<p>M&aacute;y: Quartz (Pin)</p>\r\n<p>Bảo H&agrave;nh Quốc Tế: 1 Năm</p>\r\n<p>Bảo H&agrave;nh Tại Hải Triều:</p>\r\n<p>Đường K&iacute;nh Mặt Số: 40 mm</p>\r\n<p>Bề D&agrave;y Mặt Số: 8.9 mm</p>\r\n<p>Niềng:</p>\r\n<p>D&acirc;y Đeo: D&acirc;y Da Ch&iacute;nh H&atilde;ng</p>\r\n<p>M&agrave;u Mặt Số: Trắng</p>\r\n<p>Chống Nước: 5 ATM</p>\r\n<p>Chức Năng: Lịch Ng&agrave;y &ndash; Lịch Thứ</p>\r\n<p>Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 1, 1, '1457000', 'e6db2aaab0.webp'),
(40, 'CASIO NỮ – QUARTZ (PIN) – DÂY DA (LTP-1303L-1AVDF', 26, 29, '<p><span>Casio LTP-1303L-1AVDF, đồng hồ d&acirc;y da d&agrave;nh cho nữ với phong c&aacute;ch lịch thiệp c&ugrave;ng t&ocirc;ng m&agrave;u đen, chất liệu đồng hồ l&agrave; th&eacute;p kh&ocirc;ng gỉ, d&acirc;y đeo bằng da thật, chữ số vạch s&aacute;ng b&oacute;ng v&agrave; 3 kim chỉ trắng.</span></p>', '<p>Thương Hiệu: Casio</p>\r\n<p>Số Hiệu Sản Phẩm: LTP-1303L-1AVDF</p>\r\n<p>Xuất Xứ: Nhật Bản</p>\r\n<p>Giới T&iacute;nh: Nữ</p>\r\n<p>K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)</p>\r\n<p>M&aacute;y: Quartz (Pin)</p>\r\n<p>Bảo H&agrave;nh Quốc Tế: 1 Năm</p>\r\n<p>Bảo H&agrave;nh Tại Hải Triều:</p>\r\n<p>Đường K&iacute;nh Mặt Số: 30mm</p>\r\n<p>Bề D&agrave;y Mặt Số: 7mm</p>\r\n<p>Niềng:</p>\r\n<p>D&acirc;y Đeo: D&acirc;y Da Ch&iacute;nh H&atilde;ng</p>\r\n<p>M&agrave;u Mặt Số: Đen</p>\r\n<p>Chống Nước: 5 ATM</p>\r\n<p>Chức Năng:</p>\r\n<p>Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 1, 2, '1034000', '53195b39d2.webp'),
(42, 'CITIZEN AW1370-51F – NAM – ECO-DRIVE (NĂNG LƯỢNG ÁNH SÁNG) – DÂY KIM LOẠI', 26, 30, '<p>Mẫu Citizen AW1370-51F tạo điểm ấn tượng khi đồng hồ được t&iacute;ch hợp c&ocirc;ng nghệ hiện đại Eco-Drive (Năng Lượng &Aacute;nh S&aacute;ng) với một vẻ ngo&agrave;i giản dị c&ugrave;ng chi tiết vạch số tạo h&igrave;nh mỏng tinh tế.</p>', '<p>Thương Hiệu: Citizen</p>\r\n<p>Số Hiệu Sản Phẩm: AW1370-51F</p>\r\n<p>Xuất Xứ: Nhật Bản</p>\r\n<p>Giới T&iacute;nh: Nam</p>\r\n<p>K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)</p>\r\n<p>M&aacute;y: Eco-Drive (Năng Lượng &Aacute;nh S&aacute;ng)</p>\r\n<p>Bảo H&agrave;nh Quốc Tế: 1 Năm</p>\r\n<p>Bảo H&agrave;nh Tại Hải Triều: 5 Năm</p>\r\n<p>Đường K&iacute;nh Mặt Số: 41 mm</p>\r\n<p>Bề D&agrave;y Mặt Số: 9.6 mm</p>\r\n<p>Niềng: Th&eacute;p Kh&ocirc;ng Gỉ</p>\r\n<p>D&acirc;y Đeo: Th&eacute;p Kh&ocirc;ng Gỉ</p>\r\n<p>M&agrave;u Mặt Số: Đen</p>\r\n<p>Chống Nước: 5 ATM</p>\r\n<p>Chức Năng: Lịch Ng&agrave;y</p>\r\n<p>Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 0, 1, '5080000', 'f20585e343.webp'),
(43, 'CITIZEN GA1052-55E – NỮ – ECO-DRIVE (NĂNG LƯỢNG ÁNH SÁNG) – DÂY KIM LOẠI', 26, 30, '<p>Đồng hồ Citizen GA1052-55E với thiết kế đơn giản nữ t&iacute;nh được mạ v&agrave;ng sang trọng, kim chỉ được l&agrave;m thanh mảnh nhẹ nh&agrave;ng, kết hợp c&ugrave;ng d&acirc;y đeo kim loại phủ v&agrave;ng s&aacute;ng b&oacute;ng tạo n&ecirc;n vẻ đẹp thời trang ki&ecirc;u sa cho ph&aacute;i nữ.</p>', '<p>Thương Hiệu: Citizen</p>\r\n<p>Số Hiệu Sản Phẩm: GA1052-55E</p>\r\n<p>Xuất Xứ: Nhật Bản</p>\r\n<p>Giới T&iacute;nh: Nữ</p>\r\n<p>K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)</p>\r\n<p>M&aacute;y: Eco-Drive (Năng Lượng &Aacute;nh S&aacute;ng)</p>\r\n<p>Bảo H&agrave;nh Quốc Tế: 1 Năm</p>\r\n<p>Bảo H&agrave;nh Tại Hải Triều: 5 Năm</p>\r\n<p>Đường K&iacute;nh Mặt Số: 30 mm</p>\r\n<p>Bề D&agrave;y Mặt Số: 9 mm</p>\r\n<p>Niềng: Th&eacute;p Kh&ocirc;ng Gỉ</p>\r\n<p>D&acirc;y Đeo: Th&eacute;p Kh&ocirc;ng Gỉ</p>\r\n<p>M&agrave;u Mặt Số: Đen</p>\r\n<p>Chống Nước: 3 ATM</p>\r\n<p>Chức Năng: Lịch Ng&agrave;y</p>\r\n<p>Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 0, 2, '6200000', 'c981b08b9a.webp'),
(44, 'CITIZEN AU1080-20A – NAM – KÍNH SAPPHIRE – ECO-DRIVE (NĂNG LƯỢNG ÁNH SÁNG) – DÂY VẢI', 26, 30, '<p>Đồng hồ nam Citizen AU1080-20A nổi bật Pin sử dụng c&ocirc;ng nghệ hiện đại Eco-Drive (Năng Lượng &Aacute;nh S&aacute;ng), với thiết kế theo phong c&aacute;ch thời trang với d&acirc;y đeo chất liệu bằng vải trẻ trung.</p>', '<p>Thương Hiệu: Citizen<br />Số Hiệu Sản Phẩm: AU1080-20A<br />Xuất Xứ: Nhật Bản<br />Giới T&iacute;nh: Nam<br />K&iacute;nh: Sapphire (K&iacute;nh Chống Trầy)<br />M&aacute;y: Eco-Drive (Năng Lượng &Aacute;nh S&aacute;ng)<br />Bảo H&agrave;nh Quốc Tế:&nbsp;1 Năm<br />Bảo H&agrave;nh Tại Hải Triều:&nbsp;5 Năm<br />Đường K&iacute;nh Mặt Số:&nbsp;40 mm<br />Bề D&agrave;y Mặt Số:&nbsp;9 mm<br />Niềng:&nbsp;Th&eacute;p Kh&ocirc;ng Gỉ<br />D&acirc;y Đeo:&nbsp;D&acirc;y Vải<br />M&agrave;u Mặt Số:&nbsp;Trắng<br />Chống Nước:&nbsp;3 ATM<br />Chức Năng:&nbsp;Lịch Ng&agrave;y<br />Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng):&nbsp;Trung Quốc</p>', 3, 1, '5600000', 'aa9664fbaf.webp'),
(45, 'CITIZEN EM0579-14A – NỮ – ECO-DRIVE (NĂNG LƯỢNG ÁNH SÁNG) – DÂY DA', 26, 30, '<p>Mẫu Citizen EM0579-14A phi&ecirc;n bản d&acirc;y da trơn bản nhỏ tone m&agrave;u trắng thanh lịch d&agrave;nh cho ph&aacute;i đẹp đi k&egrave;m lối thiết kế giản dị 3 kim được mạ v&agrave;ng hồng.</p>', '<p>Thương Hiệu: Citizen</p>\r\n<p>Số Hiệu Sản Phẩm: EM0579-14A</p>\r\n<p>Xuất Xứ: Nhật Bản</p>\r\n<p>Giới T&iacute;nh: Nữ</p>\r\n<p>K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)</p>\r\n<p>M&aacute;y: Eco-Drive (Năng Lượng &Aacute;nh S&aacute;ng)</p>\r\n<p>Bảo H&agrave;nh Quốc Tế: 1 Năm</p>\r\n<p>Bảo H&agrave;nh Tại Hải Triều: 5 Năm</p>\r\n<p>Đường K&iacute;nh Mặt Số: 30.2 mm</p>\r\n<p>Bề D&agrave;y Mặt Số: 7.5 mm</p>\r\n<p>Niềng: Th&eacute;p Kh&ocirc;ng Gỉ</p>\r\n<p>D&acirc;y Đeo: D&acirc;y Da Ch&iacute;nh H&atilde;ng</p>\r\n<p>M&agrave;u Mặt Số: Trắng</p>\r\n<p>Chống Nước: 5 ATM</p>\r\n<p>Chức Năng:</p>\r\n<p>Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 1, 2, '5530000', 'c81b8bdc47.webp'),
(47, 'CITIZEN NH8390-71L – NAM – AUTOMATIC (TỰ ĐỘNG) – DÂY KIM LOẠI – MẶT SỐ 40MM', 26, 30, '<p>Mẫu Citizen C7 NH8390-71L phi&ecirc;n bản nền mặt số xanh size 40mm với họa tiết trải tia nhẹ phong c&aacute;ch trẻ trung với thiết kế đơn giản 3 kim.</p>', '<p>Thương Hiệu: Citizen</p>\r\n<p>Số Hiệu Sản Phẩm: NH8390-71L</p>\r\n<p>Xuất Xứ: Nhật Bản</p>\r\n<p>Giới T&iacute;nh: Nam</p>\r\n<p>K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)</p>\r\n<p>M&aacute;y: Automatic (Tự Động)</p>\r\n<p>Bảo H&agrave;nh Quốc Tế: 1 Năm</p>\r\n<p>Bảo H&agrave;nh Tại Hải Triều: 5 Năm</p>\r\n<p>Đường K&iacute;nh Mặt Số: 40.2 mm</p>\r\n<p>Bề D&agrave;y Mặt Số: 13.1 mm</p>\r\n<p>Niềng: Th&eacute;p Kh&ocirc;ng Gỉ</p>\r\n<p>D&acirc;y Đeo: Th&eacute;p Kh&ocirc;ng Gỉ</p>\r\n<p>M&agrave;u Mặt Số: Xanh</p>\r\n<p>Chống Nước: 5 ATM</p>\r\n<p>Chức Năng: Lịch Ng&agrave;y &ndash; Lịch Thứ</p>', 0, 1, '8177000', 'bdbff21a09.webp'),
(48, 'SEIKO SRP691J1 – NAM – KÍNH SAPPHIRE – AUTOMATIC (TỰ ĐỘNG) – DÂY KIM LOẠI', 26, 27, '<p>Đồng hồ cao cấp Seiko SRP691J1 thanh lịch đối với c&aacute;c ng&agrave;i, với thiết kế mặt nền trắng kh&aacute; đơn giản, c&aacute;c chữ số La M&atilde; r&otilde; r&agrave;ng c&ugrave;ng mặt k&iacute;nh sapphire.</p>', '<p>Thương Hiệu: Seiko</p>\r\n<p>Số Hiệu Sản Phẩm: SRP691J1</p>\r\n<p>Xuất Xứ: Nhật Bản</p>\r\n<p>Giới T&iacute;nh: Nam</p>\r\n<p>K&iacute;nh: Sapphire (K&iacute;nh Chống Trầy)</p>\r\n<p>M&aacute;y: Automatic (Tự Động)</p>\r\n<p>Bảo H&agrave;nh Quốc Tế: 1 Năm</p>\r\n<p>Bảo H&agrave;nh Tại Hải Triều: 5 Năm</p>\r\n<p>Đường K&iacute;nh Mặt Số: 40mm</p>\r\n<p>Bề D&agrave;y Mặt Số: 12mm</p>\r\n<p>Niềng: Th&eacute;p Kh&ocirc;ng Gỉ</p>\r\n<p>D&acirc;y Đeo: Th&eacute;p Kh&ocirc;ng Gỉ</p>\r\n<p>M&agrave;u Mặt Số: Trắng</p>\r\n<p>Chống Nước: 10 ATM</p>\r\n<p>Chức Năng: Lịch Ng&agrave;y &ndash; Lịch Thứ</p>', 0, 1, '9580000', '78d30ea30c.webp'),
(49, 'OP 58070MK-V-04 – NAM – KÍNH SAPPHIRE – QUARTZ (PIN) – DÂY KIM LOẠI', 26, 33, '<p>Một vẻ ngo&agrave;i lịch l&atilde;m d&agrave;nh cho ph&aacute;i mạnh đến từ mẫu đồng hồ Olym Pianus (Olympia Star) 58070MK-V-04 với c&aacute;c chi tiết vạch số v&agrave; kim chỉ b&ecirc;n dưới mặt k&iacute;nh Sapphire được tạo h&igrave;nh mỏng sang trọng trẻ trung.</p>', '<p>Thương Hiệu: Olym Pianus (Olympia Star)</p>\r\n<p>Số Hiệu Sản Phẩm: 58070MK-V-04</p>\r\n<p>Xuất Xứ: Nhật Bản</p>\r\n<p>Giới T&iacute;nh: Nam</p>\r\n<p>K&iacute;nh: Sapphire (K&iacute;nh Chống Trầy)</p>\r\n<p>M&aacute;y: Quartz (Pin)</p>\r\n<p>Bảo H&agrave;nh Quốc Tế: 2 Năm</p>\r\n<p>Bảo H&agrave;nh Tại Hải Triều: 5 Năm</p>\r\n<p>Đường K&iacute;nh Mặt Số: 38 mm</p>\r\n<p>Bề D&agrave;y Mặt Số: 8 mm</p>\r\n<p>Niềng: Th&eacute;p Kh&ocirc;ng Gỉ</p>\r\n<p>D&acirc;y Đeo: Th&eacute;p Kh&ocirc;ng Gỉ</p>\r\n<p>M&agrave;u Mặt Số: V&agrave;ng</p>\r\n<p>Chống Nước: 3 ATM</p>\r\n<p>Chức Năng: Lịch Ng&agrave;y</p>', 0, 1, '3630000', 'd2536d066f.webp'),
(50, 'DANIEL WELLINGTON DW00100011 – NAM – QUARTZ (PIN) – DÂY DA – MẶT SỐ 40MM', 26, 34, '<p>Đồng hồ Daniel Wellington DW00100011 c&oacute; d&acirc;y đeo bằng chất liệu da n&acirc;u b&oacute;ng, kết hợp với mặt số tr&ograve;n c&oacute; viền mỏng tinh tế, kim chỉ v&agrave; vạch số mỏng nổi bật tr&ecirc;n nền số m&agrave;u trắng trang nh&atilde;.</p>', '<p>Thương Hiệu: Daniel Wellington<br />Số Hiệu Sản Phẩm: DW00100011<br />Xuất Xứ: Thụy Điển<br />Giới T&iacute;nh: Nam<br />K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)<br />M&aacute;y: Quartz (Pin)<br />Bảo H&agrave;nh Quốc Tế: 2 Năm<br />Bảo H&agrave;nh Tại Hải Triều: 5 Năm<br />Đường K&iacute;nh Mặt Số: 40 mm<br />Bề D&agrave;y Mặt Số: 6 mm<br />Niềng: Th&eacute;p Kh&ocirc;ng Gỉ<br />D&acirc;y Đeo: D&acirc;y Da Ch&iacute;nh H&atilde;ng<br />M&agrave;u Mặt Số: Trắng<br />Chống Nước: 3 ATM<br />Chức Năng: <br />Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng):<br /> <br />Trung Quốc</p>', 1, 1, '5300000', 'f5bbbadb5c.webp'),
(51, 'SEIKO ĐÔI – KÍNH SAPPHIRE – AUTOMATIC (TỰ ĐỘNG) – DÂY DA (SRPA14J1 – SRP860J1)', 26, 32, '<p>Đồng hồ đ&ocirc;i Seiko phong c&aacute;ch giản dị, với kim chỉ c&ugrave;ng vạch số thiết kế mỏng tinh tế tr&ecirc;n nền k&iacute;nh Sapphire, nổi bật với vỏ m&aacute;y kim loại mạ v&agrave;ng phối c&ugrave;ng d&acirc;y đeo da n&acirc;u, tạo cho cặp đ&ocirc;i n&ecirc;n vẻ thanh lịch nổi bật.</p>', '<p>Thương Hiệu: Seiko<br />Số Hiệu Sản Phẩm: SRPA14J1 (Nam) &ndash; SRP860J1 (Nữ)<br />Gi&aacute;: 10,600,000 (Nam) &ndash; 9,850,000 (Nữ) VND / C&aacute;i<br />Xuất Xứ: Nhật Bản<br />K&iacute;nh: Sapphire (K&iacute;nh Chống Trầy)<br />M&aacute;y: Automatic (Tự Động)<br />Bảo H&agrave;nh Quốc Tế: 1 Năm<br />Bảo H&agrave;nh Tại Hải Triều: 5 Năm<br />Đường K&iacute;nh Mặt Số: 39 mm (Nam) &ndash; 34 mm (Nữ)<br />Bề D&agrave;y Mặt Số: 11 mm (Nam) &ndash; 11 mm (Nữ)<br />Niềng: Th&eacute;p Kh&ocirc;ng Gỉ<br />D&acirc;y Đeo: D&acirc;y Da Ch&iacute;nh H&atilde;ng<br />M&agrave;u Mặt Số: Trắng<br />Chống Nước: 10 ATM (Nam) &ndash; 10 ATM (Nữ)<br />Chức Năng: Lịch Ng&agrave;y</p>', 1, 0, '20450000', '040c778c23.webp'),
(52, 'APPLE WATCH SERIES 5 – GPS – 44MM – VIỀN THÉP VÀNG HỒNG – DÂY CAO SU (MWWH2VN-A)', 28, 35, '<p><strong>T&igrave;nh trạng</strong><br /><span>Nguy&ecirc;n hộp, đầy đủ phụ kiện từ nh&agrave; sản xuất</span><br /><strong>Hộp bao gồm</strong><br /><span>Đồng hồ, d&acirc;y cao su, củ sạc 5W, d&acirc;y c&aacute;p</span><br /><strong>Bảo h&agrave;nh</strong><br /><span>Bảo h&agrave;nh 12 th&aacute;ng tại trung t&acirc;m bảo h&agrave;nh Ch&iacute;nh h&atilde;ng. 1 đổi 1 trong 30 ng&agrave;y nếu c&oacute; lỗi nh&agrave; sản xuất.</span></p>', '<p><strong>Chất liệu:</strong><span>&nbsp;Viền Th&eacute;p V&agrave;ng Hồng &ndash; D&acirc;y Cao Su</span><br /><strong>K&iacute;ch thước:</strong><span>&nbsp;44 mm x 38 mm x 10.74 mm</span><br /><strong>Trọng lượng:</strong><span>&nbsp;47.8 g</span><br /><strong>Chipset:</strong><br /><strong>CPU:</strong><span>&nbsp;Apple S5</span><br /><strong>Chống nước:</strong><span>&nbsp;5 ATM</span><br /><strong>Bluetooth:</strong><span>&nbsp;5.0</span><br /><strong>Pin:</strong><span>&nbsp;L&ecirc;n đến 18 giờ</span><br /><strong>T&iacute;nh năng kh&aacute;c:</strong><span>&nbsp;B&aacute;o thức, Gọi điện tr&ecirc;n đồng hồ, Từ chối cuộc gọi, Đồng hồ bấm giờ, Rung th&ocirc;ng b&aacute;o, Thay mặt đồng hồ, Ph&aacute;t hiện t&eacute; ng&atilde;, Nghe nhạc với tai nghe Bluetooth, Dự b&aacute;o thời tiết, Điều khiển chơi nhạc</span></p>', 1, 3, '18200000', '1e0abed808.jpg'),
(53, 'CASIO ĐÔI – QUARTZ (PIN) – DÂY KIM LOẠI (MTP-TW100D-5AVDF – LTP-TW100D-5AVDF)', 27, 29, '<p>Đồng hồ đ&ocirc;i Casio thiết kế với xu hướng thời trang, kim chỉ c&ugrave;ng chữ số la m&atilde; in nổi bật tr&ecirc;n nền số m&agrave;u n&acirc;u trẻ trung, vỏ m&aacute;y kết hợp c&ugrave;ng d&acirc;y đeo kim loại m&agrave;u bạc đem lại vẻ trẻ trung thời trang cho cặp đ&ocirc;i.</p>', '<p>Thương Hiệu: Casio<br />Số Hiệu Sản Phẩm: MTP-TW100D-5AVDF (Nam) &ndash; LTP-TW100D-5AVDF (Nữ)<br />Gi&aacute;: 2,277,000 (Nam) &ndash; 2,277,000 (Nữ) VND / C&aacute;i<br />Xuất Xứ: Nhật Bản<br />K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)<br />M&aacute;y: Quartz (Pin)<br />Bảo H&agrave;nh Quốc Tế: 1 Năm<br />Đường K&iacute;nh Mặt Số: 47.3 mm (Nam) &ndash; 36 mm (Nữ)<br />Bề D&agrave;y Mặt Số: 8.9 mm (Nam) &ndash; 8.5 mm (Nữ)<br />Niềng: D&acirc;y Đeo<br />M&agrave;u Mặt Số: N&acirc;u<br />Chống Nước: 5 ATM (Nam) &ndash; 5 ATM (Nữ)<br />Chức Năng<br />Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 0, 0, '4554000', '5dd05d9a0e.png'),
(56, 'DANIEL WELLINGTON DW00100006 – NAM – QUARTZ (PIN) – DÂY DA – MẶT SỐ 40MM', 26, 34, '<p>Đồng hồ thời trang nam Daniel Wellington DW00100006 &ndash; 0106DW c&oacute; mặt số tr&ograve;n tinh tế với nền số m&agrave;u trắng trang nh&atilde;, kim chỉ v&agrave; vạch số được d&aacute;t mỏng nổi bật, d&acirc;y đeo da n&acirc;u thanh lịch.</p>', '<p>Thương Hiệu: Daniel Wellington</p>\r\n<p>Số Hiệu Sản Phẩm: DW00100006</p>\r\n<p>Xuất Xứ: Thụy Điển</p>\r\n<p>Giới T&iacute;nh: Nam</p>\r\n<p>K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)</p>\r\n<p>M&aacute;y: Quartz (Pin)</p>\r\n<p>Bảo H&agrave;nh Quốc Tế: 2 Năm</p>\r\n<p>Bảo H&agrave;nh Tại Hải Triều: 5 Năm</p>\r\n<p>Đường K&iacute;nh Mặt Số: 40 mm</p>\r\n<p>Bề D&agrave;y Mặt Số: 7 mm</p>\r\n<p>Niềng: Th&eacute;p Kh&ocirc;ng Gỉ</p>\r\n<p>D&acirc;y Đeo: D&acirc;y Da Ch&iacute;nh H&atilde;ng</p>\r\n<p>M&agrave;u Mặt Số: Trắng</p>\r\n<p>Chống Nước: 3 ATM</p>\r\n<p>Chức Năng:</p>\r\n<p>Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 1, 1, '5300000', 'b9d746b031.webp'),
(57, 'ORIENT FEV0V001BH – NAM – AUTOMATIC (TỰ ĐỘNG) – DÂY KIM LOẠI', 27, 36, '<p>Đồng hồ Orient FEV0V001BH c&oacute; vỏ v&agrave; d&acirc;y đeo kim loại bằng chất liệu th&eacute;p kh&ocirc;ng gỉ mạ bạc tinh tế, nền số m&agrave;u đen mạnh mẽ, c&ugrave;ng kim chỉ v&agrave; vạch số được phủ phản quang nổi bật, &ocirc; lịch ng&agrave;y v&agrave; thanh đĩa lịch thứ sắp xếp độc đ&aacute;o.</p>', '<p>Thương Hiệu: Orient</p>\r\n<p>Số Hiệu Sản Phẩm: FEV0V001BH</p>\r\n<p>Xuất Xứ: Nhật Bản</p>\r\n<p>Giới T&iacute;nh: Nam</p>\r\n<p>K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)</p>\r\n<p>M&aacute;y: Automatic (Tự Động)</p>\r\n<p>Bảo H&agrave;nh Quốc Tế: 1 Năm</p>\r\n<p>Bảo H&agrave;nh Tại Hải Triều: 5 Năm</p>\r\n<p>Đường K&iacute;nh Mặt Số: 40 mm</p>\r\n<p>Bề D&agrave;y Mặt Số: 12 mm</p>\r\n<p>Niềng: Th&eacute;p Kh&ocirc;ng Gỉ</p>\r\n<p>D&acirc;y Đeo: Th&eacute;p Kh&ocirc;ng Gỉ</p>\r\n<p>M&agrave;u Mặt Số: Đen</p>\r\n<p>Chống Nước: 5 ATM</p>\r\n<p>Chức Năng: Lịch Ng&agrave;y &ndash; Lịch Thứ</p>\r\n<p>Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 0, 1, '7260000', 'eb6ae64fb7.webp'),
(58, 'G-SHOCK GA-700-1BDR – NAM – QUARTZ (PIN) – DÂY CAO SU', 27, 37, '<p>Đồng hồ nam G-Shock GA-700-1BDR mặt đồng hồ kiểu d&aacute;ng tr&ograve;n to với phong c&aacute;ch mạnh mẽ, c&ugrave;ng mặt số điện tử với những t&iacute;nh năng hiện đại tiện dụng, vỏ m&aacute;y nhựa kết hợp với d&acirc;y đeo nhựa c&ugrave;ng t&ocirc;ng m&agrave;u đen chủ đạo.</p>', '<p>Thương Hiệu: Casio</p>\r\n<p>Số Hiệu Sản Phẩm: GA-700-1BDR</p>\r\n<p>Xuất Xứ: Nhật Bản</p>\r\n<p>Giới T&iacute;nh: Nam</p>\r\n<p>K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)</p>\r\n<p>M&aacute;y: Quartz (Pin)</p>\r\n<p>Bảo H&agrave;nh Quốc Tế: 5 Năm</p>\r\n<p>Bảo H&agrave;nh Tại Hải Triều:</p>\r\n<p>Đường K&iacute;nh Mặt Số: 57.5 mm x 53.4 mm</p>\r\n<p>Bề D&agrave;y Mặt Số: 18.4 mm</p>\r\n<p>Niềng: Nhựa</p>\r\n<p>D&acirc;y Đeo: D&acirc;y Cao Su</p>\r\n<p>M&agrave;u Mặt Số: Đen</p>\r\n<p>Chống Nước: 20 ATM</p>\r\n<p>Chức Năng: Lịch &ndash; Bộ Bấm Giờ &ndash; Giờ K&eacute;p &ndash; Đ&egrave;n Led &ndash; V&agrave;i Chức Năng Kh&aacute;c</p>\r\n<p>Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 2, 1, '3196000', 'ef4dddcd70.webp'),
(59, 'FOSSIL ES4369 – NỮ – QUARTZ (PIN) – DÂY DA', 27, 38, '<p>Mẫu đồng hồ ES4369 mang đậm phong c&aacute;ch thời trang cho ph&aacute;i đẹp từ thương hiệu Fossil c&ugrave;ng c&aacute;c chi tiết đồng hồ tạo n&eacute;t thanh mảnh nữ t&iacute;nh khi phối c&ugrave;ng mẫu d&acirc;y da t&ocirc;ng m&agrave;u trắng kem trẻ trung thanh lịch.</p>', '<p><br />Thương Hiệu: Fossil<br />Số Hiệu Sản Phẩm: ES4369<br />Xuất Xứ: Mỹ<br />Giới T&iacute;nh: Nữ<br />K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)<br />M&aacute;y: Quartz (Pin)<br />Bảo H&agrave;nh Quốc Tế: 2 Năm<br />Bảo H&agrave;nh Tại Hải Triều: 5 Năm<br />Đường K&iacute;nh Mặt Số: 36 mm<br />Bề D&agrave;y Mặt Số: 9 mm<br />Niềng: Th&eacute;p Kh&ocirc;ng Gỉ<br />D&acirc;y Đeo: D&acirc;y Da Ch&iacute;nh H&atilde;ng<br />M&agrave;u Mặt Số: Trắng<br />Chống Nước: 3ATM<br />Chức Năng: Lịch Ng&agrave;y<br />Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 1, 2, '3210000', 'a882f05e65.webp'),
(60, 'SKAGEN NỮ – QUARTZ (PIN) – DÂY KIM LOẠI (SKW2151)', 27, 39, '<p>Đồng hồ nữ cao cấp Skagen SKW2151, kiểu d&aacute;ng nữ t&iacute;nh quyến rũ với mặt đồng hồ nền trắng mặt trắng, chữ số hạt pha l&ecirc;, vỏ v&agrave; d&acirc;y đeo được l&agrave;m v&agrave;ng th&eacute;p kh&ocirc;ng gỉ mạ v&agrave;ng dạng lưới.</p>', '<p>Thương Hiệu: Skagen</p>\r\n<p>Số Hiệu Sản Phẩm: SKW2151</p>\r\n<p>Xuất Xứ: Đan Mạch</p>\r\n<p>Giới T&iacute;nh: Nữ</p>\r\n<p>K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)</p>\r\n<p>M&aacute;y: Quartz (Pin)</p>\r\n<p>Bảo H&agrave;nh Quốc Tế: 3 Năm</p>\r\n<p>Bảo H&agrave;nh Tại Hải Triều:</p>\r\n<p>Đường K&iacute;nh Mặt Số: 37mm</p>\r\n<p>Bề D&agrave;y Mặt Số: 5mm</p>\r\n<p>Niềng: Th&eacute;p Kh&ocirc;ng Gỉ</p>\r\n<p>D&acirc;y Đeo: Th&eacute;p Kh&ocirc;ng Gỉ</p>\r\n<p>M&agrave;u Mặt Số: Trắng</p>\r\n<p>Chống Nước: 3 ATM</p>\r\n<p>Chức Năng: Lịch Ng&agrave;y</p>', 0, 2, '4950000', '8d797ed644.webp'),
(61, 'CANDINO NAM – QUARTZ (PIN) – KÍNH SAPPHIRE – DÂY DA (C4471/P)', 27, 40, '<p>Đồng hồ nam Candino C4471/P, chất liệu cao cấp được l&agrave;m bằng th&eacute;p kh&ocirc;ng gỉ, kiểu d&aacute;ng mạnh mẽ sang trọng, nền đen kết hợp chữ số vạch trắng, c&ograve;n c&oacute; 3 kim chỉ giờ trắng v&agrave; 1 lịch ng&agrave;y.</p>', '<p>Thương Hiệu: Candino</p>\r\n<p>Số Hiệu Sản Phẩm: C4471/P</p>\r\n<p>Xuất Xứ: Thụy Sỹ</p>\r\n<p>Giới T&iacute;nh: Nam</p>\r\n<p>K&iacute;nh: Sapphire (K&iacute;nh Chống Trầy)</p>\r\n<p>M&aacute;y: Quartz (Pin)</p>\r\n<p>Bảo H&agrave;nh Quốc Tế: 2 Năm</p>\r\n<p>Bảo H&agrave;nh Tại Hải Triều: 5 Năm</p>\r\n<p>Đường K&iacute;nh Mặt Số: 40mm</p>\r\n<p>Bề D&agrave;y Mặt Số: 8mm</p>\r\n<p>Niềng: Th&eacute;p Kh&ocirc;ng Gỉ (Mạ v&agrave;ng theo c&ocirc;ng nghệ PVD cao cấp)</p>\r\n<p>D&acirc;y Đeo: Da Ch&iacute;nh H&atilde;ng</p>\r\n<p>M&agrave;u Mặt Số: Trắng</p>\r\n<p>Chống Nước: 5 ATM</p>\r\n<p>Chức Năng:</p>', 1, 1, '8800000', '1c346e360e.webp'),
(62, 'MICHAEL KORS NỮ – QUARTZ (PIN) – DÂY KIM LOẠI (MK3191)', 27, 41, '<p>Đồng hồ Michael Kors MK3191 được thiết kế sang trọng với mặt đồng hồ nền v&agrave;ng v&agrave; viền đ&iacute;nh hạt sang trọng, chất liệu được l&agrave;m từ th&eacute;p kh&ocirc;ng gỉ mạ v&agrave;ng, c&ograve;n c&oacute; 3 kim chỉ tinh tế.</p>', '<p>Thương Hiệu: Michael Kors<br />Số Hiệu Sản Phẩm: MK3191<br />Xuất Xứ: Mỹ<br />Giới T&iacute;nh: Nữ<br />K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)<br />M&aacute;y: Quartz (Pin)<br />Bảo H&agrave;nh Quốc Tế: 2 Năm<br />Bảo H&agrave;nh Tại Hải Triều: 5 Năm<br />Đường K&iacute;nh Mặt Số: 39mm<br />Bề D&agrave;y Mặt Số: 8mm<br />Niềng: Th&eacute;p Kh&ocirc;ng Gỉ<br />D&acirc;y Đeo: Th&eacute;p Kh&ocirc;ng Gỉ<br />M&agrave;u Mặt Số: V&agrave;ng<br />Chống Nước: 10 ATM<br />Chức Năng: <br />Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 0, 2, '6910000', '4f2d7bbdee.webp'),
(63, 'ADRIATICA NỮ – QUARTZ (PIN) – DÂY KIM LOẠI (A3508.1143QZ)', 27, 43, '<p>Đồng hồ nữ thời trang Adriatica A3508.1143QZ với kiểu d&aacute;ng lắc tay tinh xảo, d&acirc;y đeo c&oacute; đ&iacute;nh hạt sang trọng, mặt số ovan nền trắng, chất liệu th&eacute;p kh&ocirc;ng gỉ mạ v&agrave;ng, 2 kim chỉ tinh tế.</p>', '<p>Thương Hiệu: Adriatica<br />Số Hiệu Sản Phẩm: A3508.1143QZ<br />Xuất Xứ: Thụy Sĩ<br />Giới T&iacute;nh: Nữ<br />K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)<br />M&aacute;y: Quartz (Pin)<br />Bảo H&agrave;nh Quốc Tế: 2 Năm<br />Bảo H&agrave;nh Tại Hải Triều: 5 Năm<br />Đường K&iacute;nh Mặt Số: 17mm<br />Bề D&agrave;y Mặt Số: 7mm<br />Niềng: Th&eacute;p Kh&ocirc;ng Gỉ<br />D&acirc;y Đeo: Th&eacute;p Kh&ocirc;ng Gỉ<br />M&agrave;u Mặt Số: Trắng<br />Chống Nước: 3 ATM<br />Chức Năng</p>', 0, 2, '5310000', 'dac6ffdafb.webp'),
(64, 'LONGINES L2.673.4.78.6 – NAM – KÍNH SAPPHIRE – AUTOMATIC (TỰ ĐỘNG) – DÂY KIM LOẠI', 29, 44, '<p>Đồng hồ Longines L2.673.4.78.6 c&oacute; vỏ v&agrave; d&acirc;y đeo kim loại được mạ bạc tinh xảo bao quanh nền trắng mặt số, kim chỉ m&agrave;u xanh nổi bật, phần r&igrave;a mặt c&oacute; vạch chia ng&agrave;y v&agrave; vạch chia gi&acirc;y tinh tế, 3 mặt số phụ được sắp xếp ở vị tr&iacute; 12,9,6 giờ, đặc biệt c&oacute; chu kỳ hoạt động của trăng trong mặt số phụ 12h.</p>', '<p>Thương Hiệu: Longines<br />Số Hiệu Sản Phẩm: L2.673.4.78.6<br />Xuất Xứ: Thụy Sỹ<br />Giới T&iacute;nh: Nam<br />K&iacute;nh: Sapphire (K&iacute;nh Chống Trầy)<br />M&aacute;y: Automatic (Tự Động)<br />Bảo H&agrave;nh Quốc Tế: 2 Năm<br />Bảo H&agrave;nh Tại Hải Triều: 4 Năm &ndash; RED Guarantee<br />Đường K&iacute;nh Mặt Số: 40 mm<br />Bề D&agrave;y Mặt Số: 11 mm<br />Niềng: Th&eacute;p Kh&ocirc;ng Gỉ<br />D&acirc;y Đeo: Th&eacute;p Kh&ocirc;ng Gỉ<br />M&agrave;u Mặt Số: Trắng<br />Chống Nước: 3 ATM<br />Chức Năng: Lịch &ndash; Chronograph &ndash; Đồng hồ 24h<br />Nơi sản xuất<br /> <br />Thụy Sỹ</p>', 0, 1, '84040000', 'd6301c3b5d.webp'),
(65, 'DOXA D156SST – NỮ – KÍNH SAPPHIRE – QUARTZ (PIN) – DÂY KIM LOẠI', 29, 45, '<p>Đồng hồ nữ Doxa D156SST đồng hồ kiểu tr&ograve;n với mặt k&iacute;nh chất liệu Sapphire, b&ecirc;n dưới lớp k&iacute;nh c&aacute;c vạch số c&ugrave;ng kim chỉ được mạ v&agrave;ng đem lại vẻ sang trọng qu&yacute; ph&aacute;i tr&ecirc;n nền mặt số trắng c&oacute; v&acirc;n sọc.</p>', '<p>Thương Hiệu: Doxa<br />Số Hiệu Sản Phẩm: D156SST<br />Xuất Xứ: Thụy Sỹ<br />Giới T&iacute;nh: Nữ<br />K&iacute;nh: Sapphire (K&iacute;nh Chống Trầy)<br />M&aacute;y: Quartz (Pin)<br />Bảo H&agrave;nh Quốc Tế: 2 Năm<br />Bảo H&agrave;nh Tại Hải Triều: 4 Năm &ndash; RED Guarantee<br />Đường K&iacute;nh Mặt Số: 26 mm<br />Bề D&agrave;y Mặt Số: 6 mm<br />Niềng: Th&eacute;p Kh&ocirc;ng Gỉ<br />D&acirc;y Đeo: Th&eacute;p Kh&ocirc;ng Gỉ<br />M&agrave;u Mặt Số: Trắng<br />Chống Nước: 3 ATM<br />Chức Năng: <br />Nơi sản xuất<br /> <br />Thụy Sỹ</p>', 0, 2, '19150000', '4d363aa76a.webp'),
(66, 'TISSOT T035.439.16.051.00 – NAM – KÍNH SAPPHIRE – QUARTZ (PIN) – DÂY DA', 29, 46, '<p>Đồng hồ Tissot T035.439.16.051.00 c&oacute; vỏ kim loại mạ bạc s&aacute;ng b&oacute;ng bao quanh nền số m&agrave;u đen mạnh mẽ, kim chỉ v&agrave; vạch số được phủ phản quang nổi bật, d&acirc;y đeo da cao cấp m&agrave;u đen lịch l&atilde;m.</p>', '<p>Thương Hiệu: Tissot</p>\r\n<p>Số Hiệu Sản Phẩm: T035.439.16.051.00</p>\r\n<p>Xuất Xứ: Thụy Sỹ</p>\r\n<p>Giới T&iacute;nh: Nam</p>\r\n<p>K&iacute;nh: Sapphire (K&iacute;nh Chống Trầy)</p>\r\n<p>M&aacute;y: Quartz (Pin)</p>\r\n<p>Bảo H&agrave;nh Quốc Tế: 2 Năm</p>\r\n<p>Bảo H&agrave;nh Tại Hải Triều: 4 Năm &ndash; RED Guarantee</p>\r\n<p>Đường K&iacute;nh Mặt Số: 41 mm</p>\r\n<p>Bề D&agrave;y Mặt Số: 11.51 mm</p>\r\n<p>Niềng: Th&eacute;p Kh&ocirc;ng Gỉ</p>\r\n<p>D&acirc;y Đeo: D&acirc;y Da Ch&iacute;nh H&atilde;ng</p>\r\n<p>M&agrave;u Mặt Số: Đen</p>\r\n<p>Chống Nước: 10 ATM</p>\r\n<p>Chức Năng: Lịch Ng&agrave;y &ndash; Đồng hồ 24h &ndash; Chronograph</p>\r\n<p>Nơi sản xuất: Thụy Sỹ</p>', 1, 1, '15980000', 'fb0fc5c772.webp'),
(67, 'RADO R30178152 – NAM – KÍNH SAPPHIRE – AUTOMATIC (TỰ ĐỘNG) – DÂY KIM LOẠI', 29, 47, '<p>Mẫu Rado R30178152 phi&ecirc;n bản độc đ&aacute;o với nển mặt số size 38mm thiết kế trong suốt để lộ ra hoạt động của bộ m&aacute;y cơ vẻ ngo&agrave;i nam t&iacute;nh đầy cuốn h&uacute;t.</p>', '<p><br />Thương Hiệu: Rado<br />Số Hiệu Sản Phẩm: R30178152<br />Xuất Xứ: Thụy Sỹ<br />Giới T&iacute;nh: Nam<br />K&iacute;nh: Sapphire (K&iacute;nh Chống Trầy)<br />M&aacute;y: Automatic (Tự Động)<br />Bảo H&agrave;nh Quốc Tế: 2 Năm<br />Bảo H&agrave;nh Tại Hải Triều: 4 Năm &ndash; RED Guarantee<br />Đường K&iacute;nh Mặt Số: 38 mm<br />Bề D&agrave;y Mặt Số: 10.1 mm<br />Niềng: Th&eacute;p Kh&ocirc;ng Gỉ<br />D&acirc;y Đeo: Th&eacute;p Kh&ocirc;ng Gỉ<br />M&agrave;u Mặt Số: Trắng<br />Chống Nước: 3 ATM<br />Chức Năng: <br />Nơi sản xuất: Thụy Sỹ</p>', 0, 1, '58130000', '5158700ed4.webp'),
(68, 'MOVADO 0607100 – NỮ – KÍNH SAPPHIRE – QUARTZ (PIN) – DÂY KIM LOẠI', 29, 48, '<p>Mẫu Movado 0607100 phi&ecirc;n bản đ&iacute;nh kim cương sang trọng nổi bật tr&ecirc;n mặt số tone m&agrave;u trắng size 28mm, vỏ m&aacute;y pin mỏng chỉ 7mm phối tone v&agrave;ng hồng thời trang cho ph&aacute;i đẹp.</p>\r\n<p>&nbsp;</p>', '<p>Thương Hiệu: Movado<br />Số Hiệu Sản Phẩm: 0607100<br />Xuất Xứ: Thụy Sỹ<br />Giới T&iacute;nh: Nữ<br />K&iacute;nh: Sapphire (K&iacute;nh Chống Trầy)<br />M&aacute;y: Quartz (Pin)<br />Bảo H&agrave;nh Quốc Tế: 2 Năm<br />Bảo H&agrave;nh Tại Hải Triều: 4 Năm &ndash; RED Guarantee<br />Đường K&iacute;nh Mặt Số: 28 mm<br />Bề D&agrave;y Mặt Số: 7 mm<br />Niềng: Th&eacute;p Kh&ocirc;ng Gỉ<br />D&acirc;y Đeo: Th&eacute;p Kh&ocirc;ng Gỉ<br />M&agrave;u Mặt Số: Trắng<br />Chống Nước: 3 ATM<br />Chức Năng</p>', 0, 2, '52000000', 'c258c8ca1a.webp'),
(69, 'APPLE WATCH SERIES 5 – GPS – 44MM – VIỀN THÉP – DÂY CAO SU (MWWF2VN-A)', 28, 35, '<p><strong>T&igrave;nh trạng</strong><br />Nguy&ecirc;n hộp, đầy đủ phụ kiện từ nh&agrave; sản xuất<br /><strong>Hộp bao gồm</strong><br />Đồng hồ, d&acirc;y cao su, củ sạc 5W, d&acirc;y c&aacute;p<br /><strong>Bảo h&agrave;nh</strong><br />Bảo h&agrave;nh 12 th&aacute;ng tại trung t&acirc;m bảo h&agrave;nh Ch&iacute;nh h&atilde;ng. 1 đổi 1 trong 30 ng&agrave;y nếu c&oacute; lỗi nh&agrave; sản xuất.</p>', '<p>Chất liệu: Viền Th&eacute;p &ndash; D&acirc;y Cao Su<br />K&iacute;ch thước: 44 mm x 38 mm x 10.74 mm<br />Trọng lượng: 47.8 g<br />Chipset:<br />CPU: Apple S5<br />Chống nước: 5 ATM<br />Bluetooth: 5.0<br />Pin: L&ecirc;n đến 18 giờ<br />T&iacute;nh năng kh&aacute;c: B&aacute;o thức, Gọi điện tr&ecirc;n đồng hồ, Từ chối cuộc gọi, Đồng hồ bấm giờ, Rung th&ocirc;ng b&aacute;o, Thay mặt đồng hồ, Ph&aacute;t hiện t&eacute; ng&atilde;, Nghe nhạc với tai nghe Bluetooth, Dự b&aacute;o thời tiết, Điều khiển chơi nhạc</p>', 2, 3, '18200000', 'e8fc662b87.webp'),
(70, 'APPLE WATCH SERIES 3 – GPS – 42MM – VIỀN NHÔM ĐEN – DÂY CAO SU (MTH22VN-A)', 28, 35, '<p><strong>T&igrave;nh trạng</strong><br />Nguy&ecirc;n hộp, đầy đủ phụ kiện từ nh&agrave; sản xuất<br /><strong>Hộp bao gồm</strong><br />Đồng hồ, d&acirc;y cao su, củ sạc 5W, d&acirc;y c&aacute;p<br /><strong>Bảo h&agrave;nh</strong><br />Bảo h&agrave;nh 12 th&aacute;ng tại trung t&acirc;m bảo h&agrave;nh Ch&iacute;nh h&atilde;ng. 1 đổi 1 trong 30 ng&agrave;y nếu c&oacute; lỗi nh&agrave; sản xuất.</p>', '<p>Chất liệu: Viền Nh&ocirc;m Bạc &ndash; D&acirc;y Cao Su<br />K&iacute;ch thước: 42 mm x 36 mm x 11.4 mm<br />Trọng lượng: 34.9 g<br />Chipset:<br />CPU: Apple S3<br />Chống nước: 5 ATM<br />Bluetooth: 4.2<br />Pin: L&ecirc;n đến 18 giờ<br />T&iacute;nh năng kh&aacute;c: B&aacute;o thức, Gọi điện tr&ecirc;n đồng hồ, Từ chối cuộc gọi, Đồng hồ bấm giờ, Rung th&ocirc;ng b&aacute;o, Thay mặt đồng hồ</p>', 2, 3, '8300000', 'eed53714aa.webp'),
(71, 'APPLE WATCH SERIES 5 – GPS – 44MM – VIỀN NHÔM BẠC – DÂY KIM LOẠI (MWWJ2VN-A)', 28, 35, '<p>T&igrave;nh trạng: Nguy&ecirc;n hộp, đầy đủ phụ kiện từ nh&agrave; sản xuất<br />Hộp bao gồm: Đồng hồ, d&acirc;y kim loại, củ sạc 5W, d&acirc;y c&aacute;p<br />Bảo h&agrave;nh: Bảo h&agrave;nh 12 th&aacute;ng tại trung t&acirc;m bảo h&agrave;nh Ch&iacute;nh h&atilde;ng. 1 đổi 1 trong 30 ng&agrave;y nếu c&oacute; lỗi nh&agrave; sản xuất.</p>', '<p>Chất liệu: Viền Nh&ocirc;m Bạc &ndash; D&acirc;y Kim Loại<br />K&iacute;ch thước: 44 mm x 38 mm x 10.74 mm<br />Trọng lượng: 47.8 g<br />Chipset:<br />CPU: Apple S5<br />Chống nước: 5 ATM<br />Bluetooth: 5.0<br />Pin: L&ecirc;n đến 18 giờ<br />T&iacute;nh năng kh&aacute;c: B&aacute;o thức, Gọi điện tr&ecirc;n đồng hồ, Từ chối cuộc gọi, Đồng hồ bấm giờ, Rung th&ocirc;ng b&aacute;o, Thay mặt đồng hồ, Ph&aacute;t hiện t&eacute; ng&atilde;, Nghe nhạc với tai nghe Bluetooth, Dự b&aacute;o thời tiết, Điều khiển chơi nhạc</p>', 0, 3, '19500000', 'ceb644d2c4.webp'),
(72, 'SKAGEN SKW2873 – NAM – QUARTZ (PIN) – DÂY KIM LOẠI – MẶT SỐ 28MM', 31, 39, '<p>Mẫu Skagen SKW2873 phi&ecirc;n bản mặt số vu&ocirc;ng size 28mm tone m&agrave;u x&aacute;m thời trang nổi bật c&aacute;c cọc vạch số la m&atilde; trắng tạo h&igrave;nh mỏng.</p>', '<p>Thương Hiệu: Skagen<br />Số Hiệu Sản Phẩm: SKW2873<br />Xuất Xứ: Đan Mạch<br />Giới T&iacute;nh: Nam<br />K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)<br />M&aacute;y: Quartz (Pin)<br />Bảo H&agrave;nh Quốc Tế: 2 Năm <br />Đường K&iacute;nh Mặt Số: 28 mm<br />Bề D&agrave;y Mặt Số: 6 mm<br />Niềng: Th&eacute;p Kh&ocirc;ng Gỉ<br />D&acirc;y Đeo: Th&eacute;p Kh&ocirc;ng Gỉ<br />M&agrave;u Mặt Số: X&aacute;m<br />Chống Nước: 3 ATM<br />Chức Năng</p>', 0, 1, '4520000', 'f9e3f52673.webp'),
(73, 'DOXA D162SBY – NAM – KÍNH SAPPHIRE – AUTOMATIC (TỰ ĐỘNG) – DÂY KIM LOẠI', 33, 45, '<p>Mẫu Doxa nam D162SBY phi&ecirc;n bản đồng hồ lặn với trang bị vỏ m&aacute;y cơ d&agrave;y dặn 13mm với khả năng chống nước l&ecirc;n đến 20ATM, mặt số tr&ograve;n c&ugrave;ng với thiết kế vỏ viền bezel.</p>\r\n<p>&nbsp;</p>', '<p><br />Thương Hiệu: Doxa<br />Số Hiệu Sản Phẩm: D162SBY<br />Xuất Xứ: Thụy Sỹ<br />Giới T&iacute;nh: Nam<br />K&iacute;nh: Sapphire (K&iacute;nh Chống Trầy)<br />M&aacute;y: Automatic (Tự Động)<br />Bảo H&agrave;nh Quốc Tế: 2 Năm<br />Bảo H&agrave;nh Tại Hải Triều: 4 Năm &ndash; RED Guarantee<br />Đường K&iacute;nh Mặt Số: 42 mm<br />Bề D&agrave;y Mặt Số: 13.82 mm<br />Niềng: Th&eacute;p Kh&ocirc;ng Gỉ<br />D&acirc;y Đeo: Th&eacute;p Kh&ocirc;ng Gỉ<br />M&agrave;u Mặt Số: Đen<br />Chống Nước: 20 ATM<br />Chức Năng: Lịch Ng&agrave;y<br />T&iacute;nh Năng: Dạ Quang &ndash; Bezel &ndash; 8 Vi&ecirc;n Kim Cương Thật<br />Nơi sản xuất<br /> <br />Thụy Sỹ</p>', 0, 1, '30070000', 'c79d530c83.webp'),
(74, 'MOVADO 606114 – NAM – KÍNH SAPPHIRE – AUTOMATIC (TỰ ĐỘNG) – DÂY DA', 29, 48, '<p>Mẫu Movado 606114 mặt đồng hồ k&iacute;ch thước to tr&ograve;n với trải nghiệm b&ocirc; m&aacute;y cơ d&agrave;nh cho nam, thiết kế theo phong c&aacute;ch giản dị chức năng lịch ng&agrave;y sắp ở vị tr&iacute; m&uacute;i 6 giờ tinh tế tr&ecirc;n nền mặt số tone m&agrave;u đen nam t&iacute;nh.</p>', '<p>Thương Hiệu: Movado<br />Số Hiệu Sản Phẩm: 006114<br />Xuất Xứ: Thụy Sỹ<br />Giới T&iacute;nh: Nam<br />K&iacute;nh: Sapphire (K&iacute;nh Chống Trầy)<br />M&aacute;y: Automatic (Tự Động)<br />Bảo H&agrave;nh Quốc Tế: 2 Năm<br />Đường K&iacute;nh Mặt Số: 38 mm<br />Bề D&agrave;y Mặt Số: 10 mm<br />Niềng: Th&eacute;p Kh&ocirc;ng Gỉ<br />D&acirc;y Đeo: D&acirc;y Da Ch&iacute;nh H&atilde;ng<br />M&agrave;u Mặt Số: Đen<br />Chống Nước: 3 ATM<br />Chức Năng: Lịch Ng&agrave;y<br />Nơi sản xuất: Thụy Sỹ</p>', 1, 1, '44800000', '55885bb566.webp'),
(75, 'CASIO A159WGED-1DF – NỮ – KÍNH NHỰA – QUARTZ (PIN) – DÂY KIM LOẠI', 31, 29, '<p>Mẫu đồng hồ Casio A159WGED-1DF vẻ ngo&agrave;i giản dị nhưng kh&ocirc;ng k&eacute;m phần cuốn h&uacute;t c&ugrave;ng thiết kế tinh xảo được đ&iacute;nh vi&ecirc;n kim cương tạo n&ecirc;n vẻ thời trang quyến rũ cho ph&aacute;i đẹp tr&ecirc;n nền mặt số vu&ocirc;ng điện tử.</p>\r\n<p>&nbsp;</p>', '<p>Thương Hiệu: Casio</p>\r\n<p>Số Hiệu Sản Phẩm: A159WGED-1DF</p>\r\n<p>Xuất Xứ: Nhật Bản</p>\r\n<p>Giới T&iacute;nh: Nữ</p>\r\n<p>K&iacute;nh: Resin Glass (K&iacute;nh Nhựa)</p>\r\n<p>M&aacute;y: Quartz (Pin)</p>\r\n<p>Bảo H&agrave;nh Quốc Tế: 1 Năm</p>\r\n<p>Bảo H&agrave;nh Tại Hải Triều:</p>\r\n<p>Đường K&iacute;nh Mặt Số: 36.6 mm x 33.2 mm</p>\r\n<p>Bề D&agrave;y Mặt Số: 9.7 mm</p>\r\n<p>Niềng:</p>\r\n<p>D&acirc;y Đeo: Th&eacute;p Kh&ocirc;ng Gỉ</p>\r\n<p>M&agrave;u Mặt Số: Đen</p>\r\n<p>Chống Nước: 3 ATM</p>\r\n<p>Chức Năng: B&aacute;o Thức &ndash; Bộ Bấm Giờ &ndash; Đ&egrave;n LED &ndash; V&agrave;i Chức Năng Kh&aacute;c</p>\r\n<p>Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 0, 2, '2468000', 'f243945dde.webp');
INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `pro_desc`, `pro_details`, `style`, `type`, `price`, `image`) VALUES
(76, 'BABY-G BSA-B100-4A1DR – NỮ – QUARTZ (PIN) – DÂY CAO SU', 30, 37, '<p>Mẫu Baby-G BSA-B100-4A1DR với phi&ecirc;n bản tổng thể vỏ m&aacute;y c&ugrave;ng d&acirc;y đeo được phối t&ocirc;ng m&agrave;u thời trang trắng sữa, c&ugrave;ng với khả năng chịu nước l&ecirc;n đến 10ATM th&iacute;ch hợp cho c&aacute;c cuộc vui năng động.</p>', '<p>Thương Hiệu: Casio</p>\r\n<p>Số Hiệu Sản Phẩm: BSA-B100-4A1DR</p>\r\n<p>Xuất Xứ: Nhật Bản</p>\r\n<p>Giới T&iacute;nh: Nữ</p>\r\n<p>K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)</p>\r\n<p>M&aacute;y: Quartz (Pin)</p>\r\n<p>Bảo H&agrave;nh Quốc Tế: 5 Năm</p>\r\n<p>Bảo H&agrave;nh Tại Hải Triều:</p>\r\n<p>Đường K&iacute;nh Mặt Số: 49.6 mm x 41.4 mm</p>\r\n<p>Bề D&agrave;y Mặt Số: 12.6 mm</p>\r\n<p>Niềng: Nhựa</p>\r\n<p>D&acirc;y Đeo: D&acirc;y Cao Su</p>\r\n<p>M&agrave;u Mặt Số: Trắng Sữa</p>\r\n<p>Chống Nước: 10 ATM</p>\r\n<p>Chức Năng: Lịch &ndash; Bộ Bấm Giờ &ndash; Giờ K&eacute;p &ndash; Đ&egrave;n Led &ndash; V&agrave;i Chức Năng Kh&aacute;c</p>\r\n<p>Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 2, 2, '3984000', '0e1c9a23cb.webp'),
(77, 'DANIEL WELLINGTON DW00100311 – NỮ – QUARTZ (PIN) – DÂY VẢI – MẶT SỐ 32MM', 30, 34, '<p>Mẫu Daniel Wellington DW00100311 phi&ecirc;n bản d&acirc;y vải tone trắng t&ocirc; điểm th&ecirc;m vẻ trẻ trung c&aacute; t&iacute;nh cho ph&aacute;i đẹp, mặt số đơn giản 2 kim nền trắng tương phản l&ecirc;n c&aacute;c chi tiết v&agrave;ng hồng thời trang.</p>', '<p>Thương Hiệu: Daniel Wellington<br />Số Hiệu Sản Phẩm: DW00100311<br />Xuất Xứ: Thụy Điển<br />Giới T&iacute;nh: Nữ<br />K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)<br />M&aacute;y: Quartz (Pin)<br />Bảo H&agrave;nh Quốc Tế: 2 Năm<br />Bảo H&agrave;nh Tại Hải Triều: 5 Năm<br />Đường K&iacute;nh Mặt Số: 32 mm<br />Bề D&agrave;y Mặt Số: 6 mm<br />Niềng: Th&eacute;p Kh&ocirc;ng Gỉ<br />D&acirc;y Đeo: D&acirc;y Vải<br />M&agrave;u Mặt Số: Trắng<br />Chống Nước: 3 ATM<br />Chức Năng: <br />Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 3, 2, '3500000', 'f560d59948.webp'),
(78, 'CASIO ĐÔI – QUARTZ (PIN) – DÂY KIM LOẠI (MTP-V004D-7BUDF – LTP-V004D-7BUDF) – MẶT SỐ 42MM -30 MM', 31, 29, '<p>Mẫu Casio đ&ocirc;i thiết kế mỏng thời trang với phần vỏ m&aacute;y pin chỉ 8mm, mặt số trắng kiểu d&aacute;ng đơn giản 3 kim 1 lịch.</p>', '<p>Thương Hiệu: Casio<br />Số Hiệu Sản Phẩm: MTP-V004D-7BUDF (Nam) &ndash; LTP-V004D-7BUDF (Nữ)<br />Gi&aacute;: 846.000 (Nam) &ndash; 846.000 (Nữ) VND / C&aacute;i<br />Xuất Xứ: Nhật Bản<br />K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)<br />M&aacute;y: Quartz (Pin)<br />Bảo H&agrave;nh Quốc Tế: 1 Năm<br />Đường K&iacute;nh Mặt Số: 42 mm (Nam) &ndash; 30 mm (Nữ)<br />Bề D&agrave;y Mặt Số: 8 mm (Nam) &ndash; 7 mm (Nữ)<br />Niềng: <br />D&acirc;y Đeo: <br />M&agrave;u Mặt Số: Trắng<br />Chống Nước: 3 ATM (Nam) &ndash; 3 ATM (Nữ)<br />Chức Năng: Lịch Ng&agrave;y</p>', 0, 0, '1962000', '95eea4f60f.webp'),
(79, 'CASIO ĐÔI – QUARTZ (PIN) – DÂY KIM LOẠI (MTP-1183A-1ADF – LTP-1183A-1ADF)', 31, 29, '<p>Đồng hồ đ&ocirc;i Casio được thiết kế kh&aacute; đơn giản nhưng cũng kh&ocirc;ng k&eacute;m phần tinh tế, mặt đồng hồ đen v&agrave; c&oacute; 1 lịch ng&agrave;y.</p>', '<p>Thương Hiệu: Casio<br />Số Hiệu Sản Phẩm: MTP-1183A-1ADF (Nam) &ndash; LTP-1183A-1ADF (Nữ)<br />Gi&aacute;: 1,034,000 (Nam) &ndash; 1,034,000 (Nữ) VND / C&aacute;i<br />Xuất Xứ: Nhật Bản<br />K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)<br />M&aacute;y: Quartz (Pin)<br />Bảo H&agrave;nh Quốc Tế: 1 Năm<br />Đường K&iacute;nh Mặt Số: 42mm (Nam) &ndash; 28mm (Nữ)<br />Bề D&agrave;y Mặt Số: 8mm (Nam) &ndash; 6mm (Nữ)<br />Niềng: D&acirc;y Đeo <br />M&agrave;u Mặt Số: Đen<br />Chống Nước: 3 ATM<br />Chức Năng: Lịch Ng&agrave;y<br />Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 0, 0, '2064000', '6883f901d9.webp'),
(80, 'CASIO ĐÔI – QUARTZ (PIN) – DÂY KIM LOẠI (MTP-1302SG-7AVDF – LTP-1302SG-7AVDF)', 31, 29, '<p>Đồng hồ đ&ocirc;i Casio theo xu hướng thời trang, mặt đồng hồ tr&ograve;n với kim chỉ thiết kế kiểu d&aacute;ng mỏng phủ v&agrave;ng, niổ bật với vỏ m&aacute;y kết hợp c&ugrave;ng d&acirc;y đeo demi thời trang cho c&aacute;c cặp đ&ocirc;i.</p>', '<p>Thương Hiệu: Casio<br />Số Hiệu Sản Phẩm: MTP-1302SG-7AVDF (Nam) &ndash; LTP-1302SG-7AVDF (Nữ)<br />Gi&aacute;: 1,739,000 (Nam) &ndash; 1,739,000 (Nữ) VND / C&aacute;i<br />Xuất Xứ: Nhật Bản<br />K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)<br />M&aacute;y: Quartz (Pin)<br />Bảo H&agrave;nh Quốc Tế: 1 Năm<br />Đường K&iacute;nh Mặt Số: 38 mm (Nam) &ndash; 32 mm (Nữ)<br />Bề D&agrave;y Mặt Số: 9.2 mm (Nam) &ndash; 8.7 mm (Nữ)<br />M&agrave;u Mặt Số: Trắng<br />Chống Nước: 5 ATM (Nam) &ndash; 5 ATM (Nữ)<br />Chức Năng: Lịch Ng&agrave;y<br />Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 0, 0, '3487000', '4774681868.webp'),
(81, 'CITIZEN ĐÔI – QUARTZ (PIN) – DÂY DA (BF2001-12A – EQ0591-21A) – MẶT SỐ 41MM – 27MM', 33, 30, '<p>Mẫu Citizen đ&ocirc;i d&acirc;y da tạo h&igrave;nh v&acirc;n phi&ecirc;n bản lịch l&atilde;m, thiết kế đơn giản chức năng 3 kim c&ugrave;ng với cọc vạch số tạo n&eacute;t mỏng trẻ trung.</p>', '<p><br />Thương Hiệu: Citizen<br />Số Hiệu Sản Phẩm: BF2001-12A (Nam) &ndash; EQ0591-21A (Nữ)<br />Gi&aacute;: 3.470.000 (Nam) &ndash; 3.250.000 (Nữ) VND / C&aacute;i<br />Xuất Xứ: Nhật Bản<br />K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)<br />M&aacute;y: Quartz (Pin)<br />Bảo H&agrave;nh Quốc Tế: 1 Năm<br />Đường K&iacute;nh Mặt Số: 41 mm (Nam) &ndash; 27 mm (Nữ)<br />Bề D&agrave;y Mặt Số: 9 mm (Nam) &ndash; 8 mm (Nữ)<br />Niềng: Th&eacute;p Kh&ocirc;ng Gỉ<br />D&acirc;y Đeo: D&acirc;y Da Ch&iacute;nh H&atilde;ng<br />M&agrave;u Mặt Số: Trắng<br />Chống Nước: 5 ATM (Nam) &ndash; 3 ATM (Nữ)<br />Chức Năng: Lịch Ng&agrave;y &ndash; Lịch Thứ</p>', 1, 0, '6720000', '90dad5c315.webp'),
(86, 'CASIO MTP-1375D-7A2VDF – NAM – QUARTZ (PIN) – DÂY KIM LOẠI', 31, 29, '<p>Đồng hồ nam Casio MTP-1375D-7A2VDF với xu hướng hiện đại, mặt đồng hồ to tr&ograve;n nam t&iacute;nh c&ugrave;ng với kim chỉ được l&agrave;m mỏng tinh tế, kết hợp với d&acirc;y đeo kim loại.</p>', '<p>Thương Hiệu: Casio</p>\r\n<p>Số Hiệu Sản Phẩm: MTP-1375D-7A2VDF</p>\r\n<p>Xuất Xứ: Nhật Bản</p>\r\n<p>Giới T&iacute;nh: Nam</p>\r\n<p>K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)</p>\r\n<p>M&aacute;y: Quartz (Pin)</p>\r\n<p>Bảo H&agrave;nh Quốc Tế: 1 Năm</p>\r\n<p>Đường K&iacute;nh Mặt Số: 42 mm</p>\r\n<p>Bề D&agrave;y Mặt Số: 9.7 mm</p>\r\n<p>Niềng: Th&eacute;p Kh&ocirc;ng Gỉ</p>\r\n<p>D&acirc;y Đeo: Th&eacute;p Kh&ocirc;ng Gỉ</p>\r\n<p>M&agrave;u Mặt Số: Trắng</p>\r\n<p>Chống Nước: 5 ATM</p>\r\n<p>Chức Năng: Lịch Ng&agrave;y &ndash; Lịch Thứ &ndash; Đồng Hồ 24 Giờ</p>\r\n<p>Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 0, 1, '1974000', 'b7e493c991.jpg'),
(87, 'CASIO MTP-1302L-1AVDF – NAM – QUARTZ (PIN) – DÂY DA', 31, 29, '<p>Đồng hồ Casio MTP-1302L-1AVDF c&oacute; vỏ kim loại được mạ bạc tinh tế quanh nền đen mặt số, kim chỉ v&agrave; vạch số được phủ phản quang nổi bật, d&acirc;y đeo da v&acirc;n đen lịch l&atilde;m, nam t&iacute;nh.</p>', '<p>Thương Hiệu: Casio</p>\r\n<p>Số Hiệu Sản Phẩm: MTP-1302L-1AVDF</p>\r\n<p>Xuất Xứ: Nhật Bản</p>\r\n<p>Giới T&iacute;nh: Nam</p>\r\n<p>K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)</p>\r\n<p>M&aacute;y: Quartz (Pin)</p>\r\n<p>Bảo H&agrave;nh Quốc Tế: 1 Năm</p>\r\n<p>Đường K&iacute;nh Mặt Số: 38 mm</p>\r\n<p>Bề D&agrave;y Mặt Số: 9.2 mm</p>\r\n<p>Niềng:</p>\r\n<p>D&acirc;y Đeo: D&acirc;y Da Ch&iacute;nh H&atilde;ng</p>\r\n<p>M&agrave;u Mặt Số: Đen</p>\r\n<p>Chống Nước: 5 ATM</p>\r\n<p>Chức Năng: Lịch Ng&agrave;y &ndash; Dạ quang</p>\r\n<p>Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 1, 1, '1128000', '5c8b578b28.jpg'),
(88, 'CASIO MTP-1374D-7AVDF – NAM – QUARTZ (PIN) – DÂY KIM LOẠI', 31, 29, '<p>Đồng hồ Casio MTP-1374D-7AVDF với niềng kim loại được phủ m&agrave;u đen nổi bật bao quanh nền số m&agrave;u bạc sang trọng, kim chỉ v&agrave; vạch số được phủ phản quang nổi bật.</p>\r\n<p>&nbsp;</p>', '<p>Thương Hiệu: Casio</p>\r\n<p>Số Hiệu Sản Phẩm: MTP-1374D-7AVDF</p>\r\n<p>Xuất Xứ: Nhật Bản</p>\r\n<p>Giới T&iacute;nh: Nam</p>\r\n<p>K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)</p>\r\n<p>M&aacute;y: Quartz (Pin)</p>\r\n<p>Bảo H&agrave;nh Quốc Tế: 1 Năm</p>\r\n<p>Đường K&iacute;nh Mặt Số: 43.5mm</p>\r\n<p>Bề D&agrave;y Mặt Số: 10.4 mm</p>\r\n<p>Niềng: Th&eacute;p Kh&ocirc;ng Gỉ</p>\r\n<p>D&acirc;y Đeo: Th&eacute;p Kh&ocirc;ng Gỉ</p>\r\n<p>M&agrave;u Mặt Số: Trắng</p>\r\n<p>Chống Nước: 5 ATM</p>\r\n<p>Chức Năng: Lịch Ng&agrave;y &ndash; Lịch Thứ &ndash; Đồng hồ 24h</p>\r\n<p>Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 0, 1, '1974000', 'e58e1e0e97.jpg'),
(89, 'CITIZEN BI5006-81P – NAM – QUARTZ (PIN) – DÂY KIM LOẠI', 31, 30, '<p>Mẫu Citizen BI5006-81P sang trọng v&agrave; lịch l&atilde;m l&agrave; yếu tố tạo n&ecirc;n kh&iacute; chất đ&agrave;n &ocirc;ng với thiết kế c&aacute;c chi tiết vạch số tạo n&eacute;t mỏng của sự tinh tế được bao phủ t&ocirc;ng m&agrave;u v&agrave;ng đầy cuốn h&uacute;t.</p>', '<p>Thương Hiệu: Citizen</p>\r\n<p>Số Hiệu Sản Phẩm: BI5006-81P</p>\r\n<p>Xuất Xứ: Nhật Bản</p>\r\n<p>Giới T&iacute;nh: Nam</p>\r\n<p>K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)</p>\r\n<p>M&aacute;y: Quartz (Pin)</p>\r\n<p>Bảo H&agrave;nh Quốc Tế: 1 Năm</p>\r\n<p>Đường K&iacute;nh Mặt Số: 39 mm</p>\r\n<p>Bề D&agrave;y Mặt Số: 8 mm</p>\r\n<p>Niềng: Th&eacute;p Kh&ocirc;ng Gỉ</p>\r\n<p>D&acirc;y Đeo: Th&eacute;p Kh&ocirc;ng Gỉ</p>\r\n<p>M&agrave;u Mặt Số: Trắng</p>\r\n<p>Chống Nước: 5 ATM</p>\r\n<p>Chức Năng: Lịch Ng&agrave;y</p>\r\n<p>Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 0, 1, '2900000', '54ad6cd912.jpg'),
(90, 'G-SHOCK NAM – QUARTZ (PIN) – DÂY CAO SU (AW-590-1ADR)', 31, 37, '<p>Đồng hồ thời trang Casio G-Shock AW-590-1ADR phong c&aacute;ch thể thao c&ugrave;ng với mặt nền m&agrave;u đen tinh tế, c&oacute; thiết kế điện tử v&agrave; 2 kim chỉ.</p>', '<p>Thương Hiệu: Casio</p>\r\n<p>Số Hiệu Sản Phẩm: AW-590-1ADR</p>\r\n<p>Xuất Xứ: Nhật Bản</p>\r\n<p>Giới T&iacute;nh: Nam</p>\r\n<p>K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)</p>\r\n<p>M&aacute;y: Quartz (Pin)</p>\r\n<p>Bảo H&agrave;nh Quốc Tế: 5 Năm</p>\r\n<p>Đường K&iacute;nh Mặt Số: 52mm</p>\r\n<p>Bề D&agrave;y Mặt Số: 14mm</p>\r\n<p>Niềng: Nhựa</p>\r\n<p>D&acirc;y Đeo: D&acirc;y Cao Su</p>\r\n<p>M&agrave;u Mặt Số: Đen</p>\r\n<p>Chống Nước: 20 ATM</p>\r\n<p>Chức Năng: Lịch &ndash; Bộ Bấm Giờ &ndash; Giờ K&eacute;p &ndash; Đ&egrave;n Led &ndash; V&agrave;i Chức Năng Kh&aacute;c</p>\r\n<p>Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 2, 1, '2515000', '4ca999952d.jpg'),
(91, 'ORIENT NAM – QUARTZ (PIN) – DÂY DA (FUG1X003W9)', 31, 36, '<p>Đồng hồ nam Orient FUG1X003W9 d&acirc;y da với th&eacute;p kh&ocirc;ng gỉ, mặt nền trắng niềng đen c&oacute; kh&iacute;a mạnh mẽ, d&acirc;y da đen, 3 kim chỉ lớn v&agrave; 2 &ocirc; lịch ng&agrave;y thứ, mặt k&iacute;nh kho&aacute;ng chịu lực tốt.</p>\r\n<p>&nbsp;</p>', '<p>Thương Hiệu: Orient</p>\r\n<p>Số Hiệu Sản Phẩm: FUG1X003W9</p>\r\n<p>Xuất Xứ: Nhật Bản</p>\r\n<p>Giới T&iacute;nh: Nam</p>\r\n<p>K&iacute;nh: Mineral Crystal (K&iacute;nh Cứng)</p>\r\n<p>M&aacute;y: Quartz (Pin)</p>\r\n<p>Bảo H&agrave;nh Quốc Tế: 1 Năm</p>\r\n<p>Đường K&iacute;nh Mặt Số: 43mm</p>\r\n<p>Bề D&agrave;y Mặt Số: 9mm</p>\r\n<p>Niềng: Th&eacute;p Kh&ocirc;ng Gỉ</p>\r\n<p>D&acirc;y Đeo: D&acirc;y Da Ch&iacute;nh H&atilde;ng</p>\r\n<p>M&agrave;u Mặt Số: Trắng</p>\r\n<p>Chống Nước: 5 ATM</p>\r\n<p>Chức Năng: Lịch Ng&agrave;y &ndash; Lịch Thứ</p>\r\n<p>Nơi sản xuất (T&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', 1, 1, '2720000', '56f53be3e7.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderId` int(11) NOT NULL,
  `sliderName` varchar(255) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderId`, `sliderName`, `slider_image`, `type`) VALUES
(4, 'slider2', '12bdaf2ec0.png', 1),
(7, 'slider3', '0eb1f1009d.png', 1),
(8, 'slider', 'a91561440e.png', 1),
(9, 'slider1', '8b3131b096.png', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Chỉ mục cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`cmt_id`);

--
-- Chỉ mục cho bảng `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
