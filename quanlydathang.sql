-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 20, 2023 lúc 03:29 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlydathang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `SoDonDH` int(15) NOT NULL,
  `MSHH` int(15) NOT NULL,
  `SoLuong` int(100) NOT NULL,
  `GiaDatHang` int(255) NOT NULL,
  `GiamGia` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdathang`
--

INSERT INTO `chitietdathang` (`SoDonDH`, `MSHH`, `SoLuong`, `GiaDatHang`, `GiamGia`) VALUES
(16, 75, 1, 33990000, 0),
(18, 74, 2, 30990000, 0),
(19, 72, 1, 28990000, 0),
(20, 74, 1, 30990000, 0),
(21, 72, 1, 28990000, 0),
(21, 75, 1, 33990000, 0),
(22, 73, 1, 31990000, 0),
(22, 75, 1, 33990000, 0),
(23, 73, 1, 31990000, 0),
(24, 73, 1, 31990000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(15) NOT NULL,
  `MSKH` int(15) NOT NULL,
  `MSNV` int(15) NOT NULL,
  `NgayDH` date NOT NULL,
  `NgayGH` date NOT NULL,
  `TrangThaiDH` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `MSNV`, `NgayDH`, `NgayGH`, `TrangThaiDH`) VALUES
(19, 24, 1, '2023-03-05', '2023-03-15', '2'),
(20, 24, 1, '2023-03-05', '2023-03-15', '2'),
(21, 24, 1, '2023-03-05', '2023-03-15', '2'),
(23, 24, 1, '2023-04-05', '2023-04-15', '2'),
(24, 24, 1, '2023-04-19', '2023-04-29', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachikh`
--

CREATE TABLE `diachikh` (
  `MaDC` int(15) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `MSKH` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `diachikh`
--

INSERT INTO `diachikh` (`MaDC`, `DiaChi`, `MSKH`) VALUES
(7, '15a 3/2', 24),
(8, '15a 3/2', 24),
(9, '1', 24),
(10, 'Cần Thơ', 27),
(11, 'Cần Thơ', 28);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` int(15) NOT NULL,
  `TenHH` varchar(100) NOT NULL,
  `Thongsokythuat` varchar(500) NOT NULL,
  `Gia` int(100) NOT NULL,
  `SoLuongHang` int(100) NOT NULL,
  `MaLoaiHang` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `Thongsokythuat`, `Gia`, `SoLuongHang`, `MaLoaiHang`) VALUES
(72, 'iPhone 12 Pro', 'Màn hình: 6.1\"., Chip: Apple A14 Bionic., RAM: 6GB., ROM: 128GB., Camera sau: 3 camera 12 MP., Camera trước: 12 MP., Pin: 2815mAh., Sạc: 20W.                                            ', 28990000, 100, 1),
(73, 'iPhone 12 Pro Max', 'Màn hình: 6.7\", Chip: Apple A14 Bionic., RAM: 6GB., ROM: 128GB., Camera sau: 3 camera 12MP., Camera trước: 12MP., Pin: 3687mAh., Sạc: 20W.                      ', 31990000, 100, 1),
(74, 'iPhone 13 Pro', 'Màn hình: 6.1\"., ChipL Apple A15 Bionic., RAM: 6GB., ROM: 128GB., Camera sau: 3 camera 12MP., Camera trước: 12MP., Pin: 3095mAh., Sạc: 20W.', 30990000, 100, 1),
(75, 'iPhone 13 Pro Max', 'Màn hình: 6.7\"., Chip: Apple A15 Bionic., RAM: 6GB., ROM: 128GB., Camera sau: 3 camera 12MP., Camera trước: 12 MP., Pin: 4352mAh., Sạc: 20W.', 33990000, 100, 1),
(76, 'iPhone 13', 'Màn hình: 6.1\"., Chip: Apple A15 Bionic., RAM: 4GB., ROM: 128GB., Camera sau: 2 camera 12MP., Camera trước: 12MP., Pin: 3240mAh., Sạc: 20W.', 24990000, 100, 1),
(77, 'Samsung Galaxy A03s', 'Màn hình: 6.5\"., Chip: MediaTek MT6765., RAM: 4 GB., ROM: 64GB., Camera sau: Chính 13 MP & Phụ 2 MP 2 MP., Camera trước: 5 MP., Pin: 5000mAh., Sạc: 7.75 W.', 3690000, 100, 1),
(78, 'Samsung Galaxy Z Fold 2 5G', 'Màn hình: Chính 7.59\" & Phụ 6.23\"., Chip: Snapdragon 865+., RAM: 12GB., ROM: 256GB., Camera sau: 3 camera 12MP., Camera trước: Trong: 10MP & Ngoài: 10MP., Pin: 4500mAh., Sạc: 25W.', 44000000, 100, 1),
(79, 'Samsung Galaxy Z Fold 3 5G', 'Màn hình: Chính 7.6\" & Phụ 6.2\"., Chip: Snapdragon 888., RAM: 12GB., ROM: 256GB., Camera sau: 3 camera 12 MP., Camera trước: 10MP & 4MP., Pin: 4400.mAh, Sạc: 25W.', 41990000, 100, 1),
(80, 'Vivo Y21', 'Màn hình: 6.51\", Chip: MediaTek Helio P35., RAM: 4GB., ROM: 64GB., Camera sau: Chính: 13MP & Phụ: 2MP., Camera trước: 8MP., Pin: 5000mAh., Sạc: 18W.', 4290000, 100, 1),
(81, 'Vivo X70 Pro 5G', 'Màn hình: 6.56\"., Chip: MediaTek Dimensity 1200., RAM: 12GB., ROM: 256GB., Camera sau: Chính: 50MP & Phụ: 12MP & 12MP & 8MP., Camera trước: 32MP., Pin: 4450mAh., Sạc: 44W.', 18990000, 100, 1),
(82, 'Xiaomi 11T Pro 5G', 'Màn hình: 6.67\"., Chip: Snapdragon 888., RAM: 12GB., ROM: 256GB., Camera sau: Chính: 108MP & Phụ: 8MP & 5MP., Camera trước: 16MP., Pin: 5000mAh., Sạc: 120W.', 14990000, 100, 1),
(83, 'Xiaomi 11T Pro 5G', 'Màn hình 6.67\", Chip MediaTek Dimensity 1200 , RAM 8 GB, ROM 128 GB , Camera sau: Chính 108 MP & Phụ 8 MP 5 MP , Camera trước: 16 MP , Pin 5000 mAh, Sạc 67 W', 10490000, 100, 1),
(84, 'Xiaomi Redmi Note 10', 'Màn hình: 6.5\"., Chip: MediaTek Helio G88 8 nhân., RAM: 6GB., ROM: 128GB., Camera sau: Chính: 50MP & Phụ: 8MP & 2MP & 2MP., Camera trước: 8MP., Pin: 5000mAh., Sạc: 18W.', 4960000, 100, 1),
(85, 'Xiaomi Redmi Note 9T', 'Màn hình: 6.53\"., Chip: Snapdragon 662., RAM: 6GB., ROM: 128GB., Camera sau: Chính: 48MP & Phụ: 8MP & 2MP & 2MP., Camera trước: 8MP., Pin: 6000mAh., Sạc: 18W.', 4990000, 100, 1),
(86, 'Xiaomi Redmi Note 10', 'Màn hình 6.5\", Chip MediaTek Helio G88 8 nhân , RAM 6 GB, ROM 128 GB , Camera sau: Chính 50 MP & Phụ 8 MP 2 MP 2 MP , Camera trước: 8 MP,  Pin 5000 mAh, Sạc 18 W', 4690000, 100, 1),
(87, 'iPhone 14 256GB', 'Màn hình: 6.1\"., chip: Apple A15 Bionic., RAM: 6GB., ROM: 256GB., Camera sau: 12MP., Camera trước: 12MP., Pin: 3279mAh., Sạc: 20W.', 23490000, 100, 1),
(88, 'iPhone 14 128GB', 'Màn hình: 6.1\"., chip: Apple A15 Bionic., RAM: 6GB., ROM: 128GB., Camera sau: 12MP., Camera trước: 12MP., Pin: 3279mAh., Sạc nhanh: 20W.', 20390000, 100, 1),
(89, 'iPhone 14 512gb', 'Màn hình: 6.1\"., Chip: Apple A15 Bionic., RAM: 6GB., ROM: 512GB., Camera sau: 12MP & ƒ/1.5., Camera trước: 12MP & ƒ/1.9., Pin: 2815mAh., Sạc nhanh: 20W., Sạc không dây: 15W.', 25490000, 100, 1),
(90, 'OPPO Reno8 T 5G', 'Màn hình: 6.7\"., Chip: Snapdragon 695 5G 8 nhân., RAM: 8GB + Mở rộng 8GB., ROM: 128GB., Camera sau: Chính 108MP & Phụ 2MP., Camera trước: 32MP., Pin: 4800mAh., Sạc nhanh: 67W.                                                                  ', 9990000, 100, 1),
(91, 'Xiaomi 13 8GB 256GB', 'Màn hình: 6.36\"., Chip: Snapdragon® 8 thế hệ thứ 2., RAM: 8GB., ROM: 256GB., Camera sau: 50MP., Camera trước: 32MP., Pin: 4500mAh., Sạc nhanh: 67W., sạc không dây: 50W., sạc ngược không dây: 10W.                      ', 22990000, 100, 1),
(92, 'Xiaomi Redmi Note 11 Pro', 'Màn hình: 6.67\"., Chip: MediaTek Helio G96., RAM: 8GB., ROM: 128GB., Camera sau: 108MP & f/1.9 & PDAF., Camera trước: 16MP & f/2.4., Pin: 5000mAh., Sạc nhanh: 67W hỗ trợ giao thức sạc nhanh QC3 + / PD2.0 / PD3.0                                            ', 5990000, 100, 1),
(93, 'Samsung Galaxy A73 (5G) 256GB', 'Màn hình: 6.7\"., Chip: Snapdragon 778G 5G 8 nhân., RAM: 8GB., ROM: 256GB., Camera sau: 108MP & f/1.8 & PDAF & OIS., Camera trước: 32MP & f/2.2., Pin: 5000mAh., Sạc nhanh: 25W.', 11690000, 100, 1),
(94, 'VIVO T1X', 'Màn hình: 6.58\"., Chip: Snapdragon 680., RAM: 4GB + Mở rộng 1GB., ROM: 64GB., Camera sau: 50MP & f/1.8., Camera trước: 8MP & f/2.0., Pin: 5000mAh., Sạc nhanh: 18W.', 4190000, 100, 1),
(95, 'Samsung Galaxy S23 Ultra 256GB', 'Màn hình: 6.8\"., Chip: Snapdragon 8 Gen 2 (4 nm)., RAM: 8GB., ROM: 256GB., Camera sau: 200MP F1.7 OIS ±3° (Super Quad Pixel AF)., Camera trước: 12MP F2.2 (Dual Pixel AF)., Pin: 5000mAh., Sạc có dây: 45W có dây., Sạc không dây: 15W (Qi/PMA)., Chia sẻ pin không dây.', 28990000, 100, 1),
(96, 'Nokia C31 4GB 128GB', 'Màn hình: 6.7\"., Chip: Unisoc 9863A1., RAM: 4GB., ROM: 128GB., Camera sau: 13MP + 2MP độ sâu trường ảnh + 2MP macro + đèn flash., Camera trước: 5MP., Pin: 5050mAh., Sạc: 10W.', 2450000, 100, 1),
(97, 'Nokia C21 Plus 3GB 64GB', 'Màn hình: 6.52\"., Chip: Unisoc SC9863A., RAM: 3GB., ROM: 64GB., Camera sau: 13MP + 2 MP., Camera trước: 5MP., Pin: 5050mAh., Cổng sạc: Micro-USB.', 2150000, 100, 1),
(98, 'realme C55 6GB 128GB', 'Màn hình: 6.72\"., Chip: Helio G88., RAM: 6GB., ROM: 128GB., Camera sau: Camera chính 64MP & Camera phụ 2 MP., Camera trước: 8 MP & f/2.0., Pin: 5000mAh., Sạc nhanh: SuperVOOC 33W.', 4790000, 100, 1),
(99, 'Xiaomi 12T', 'Màn hình: 6.67\"., Chip: MediaTek Dimensity 8100 Ultra., RAM: 8GB., ROM: 128GB., Camera sau: 108MP + 8MP + 2MP., Camera trước: 20MP., Pin: 5000mAh., Sạc nhanh: 120W & Sạc không dây & Power Delivery 3.0 & Quick Charge 4+.', 10890000, 100, 1),
(100, 'Xiaomi 13 Lite', 'Màn hình: 6.55\"., Chip: Snapdragon 7 Gen 1 (4 nm)., RAM: 5GB., ROM: 256GB., Camera sau: Camera chính: 50 MP & f/1.8 & PDAF., Camera góc siêu rộng: 8 MP & f/2.2 & 119˚., Camera macro: 2 MP & f/2.4., Camera trước: Camera góc siêu rộng: 32 MP & f/2.4., Camera cảm chân dung: 8MP., Pin: 4500mAh., Sạc nhanh: 67W.                      ', 11490000, 100, 1),
(101, 'Samsung Galaxy A53 (5G)', 'Màn hình: 6.5\", Chip: Exynos 1280 8 nhân, RAM: 8GB, ROM: 128GB, Camera sau: Camera chính góc rộng: 64 MP & f/1.8 & PDAF & OIS, Camera góc siêu rộng: 12 MP & f/2.2 & 123˚, Camera macro: 5 MP & f/2.4, Cảm biến độ sâu: 5 MP & f/2.4, Camera trước: 32 MP & f/2.2, Pin: Li-Po 5000 mAh, Sạc nhanh: 25W', 9990000, 100, 1),
(102, 'Samsung Galaxy S22 Ultra (8GB - 128GB)', 'Màn hình: 6.8\", Chip: Qualcomm Snapdragon 8 Gen 1 (4 nm), RAM: 8GB, ROM: 128GB, Camera sau: 108 MP & f/1.8 góc rộng, Camera trước: 40 MP & f/2.2, Pin: Li-Ion 5000mAh, Sạc pin nhanh: 45W, Sạc không dây: Qi 15W, Sạc không dây ngược: 4.5W                      ', 25990000, 100, 1),
(103, 'Samsung Galaxy Z Flip4 128GB', 'Màn hình: 6.7\", Chip: Snapdragon 8+ Gen 1 (4 nm), RAM: 8GB, ROM: 128GB, Camera sau: Camera góc rộng: 12 MP & f/1.8 & PDAF & OIS, Camera góc siêu rộng: 12 MP & f/2.2 & 123˚, Camera trước: 10MP & f/2.4, Pin: 3700mAh, Sạc nhanh: 25W, Sạc nhanh không dây: 10W, Sạc không dây ngược 4.5W                      ', 20990000, 100, 1),
(104, 'Xiaomi POCO M5 4GB 64GB', 'Màn hình: 6.58\"., Chip: MediaTek Helio G99 (6nm)., RAM: 4GB., ROM: 64GB., Camera sau: Camera góc rộng: 50 MP & f/1.8 & PDAF., Camera macro: 2 MP & f/2.4., Camera góc sâu: 2 MP & f/2.4., Camera trước: Camera góc rộng: 5 MP & f/2.2 & 1/5.0\" & 1.12µm., Pin: Li-Po 5000 mAh., Sạc nhanh: 18W.                      ', 3500000, 100, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhhanghoa`
--

CREATE TABLE `hinhhanghoa` (
  `MaHinh` int(15) NOT NULL,
  `TenHinh` char(255) NOT NULL,
  `MSHH` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hinhhanghoa`
--

INSERT INTO `hinhhanghoa` (`MaHinh`, `TenHinh`, `MSHH`) VALUES
(52, './img/iphone-12-pro-vang-dong-new-600x600-1-600x600.jpg', 72),
(53, './img/iphone-12-pro-max-xanh-duong-new-600x600-600x600.jpg', 73),
(54, './img/iphone-13-pro-silver-600x600.jpg', 74),
(55, './img/iphone-13-pro-max-sierra-blue-600x600.jpg', 75),
(56, './img/iphone-13-midnight-2-600x600.jpg', 76),
(57, './img/samsung-galaxy-a03s-black-600x600.jpg', 77),
(58, './img/samsung-galaxy-z-fold-2-den-600x600.jpg', 78),
(59, './img/samsung-galaxy-z-fold-3-silver-1-600x600.jpg', 79),
(60, './img/vivo-y21-white-01-1-600x600.jpg', 80),
(61, './img/vivo-x70-pro-xanh-hong-1-600x600.jpg', 81),
(62, './img/xiaomi-11t-pro-blue-1-600x600.jpg', 82),
(63, './img/xiaomi-11t-white-1-2-600x600.jpg', 82),
(64, './img/xiaomi-redmi-note-10s-xam-1-600x600.jpg', 84),
(65, './img/xiaomi-redmi-9c-4gb-xanh-1-600x600.jpg', 85),
(66, './img/xiaomi-redmi-note-10s-xam-1-600x600.jpg', 84),
(67, './img/iPhone 14 256GB.webp', 87),
(68, './img/iPhone 14 128GB.webp', 88),
(69, './img/iPhone 14 256GB.webp', 89),
(70, 'OPPO Reno8 T 5G.webp', 90),
(71, 'Xiaomi 13 8GB 256GB.webp', 91),
(72, './img/Xiaomi Redmi Note 11 Pro.webp', 92),
(73, './img/Samsung Galaxy A73 (5G) 256GB.webp', 93),
(74, './img/vivo T1X.webp', 94),
(75, './img/Samsung Galaxy S23 Ultra 256GB.webp', 95),
(76, './img/Nokia C31 4GB 128GB.webp', 96),
(77, './img/Nokia C21 Plus 3GB 64GB.webp', 97),
(78, './img/realme C55 6GB 128GB.webp', 98),
(79, './img/Xiaomi 12T.webp', 99),
(80, './img/Xiaomi 13 Lite.webp', 100),
(81, './img/Samsung Galaxy A53 (5G)', 101),
(82, './img/Samsung Galaxy S22 Ultra (8GB - 128GB).webp', 102),
(83, './img/Samsung Galaxy Z Flip4 128GB.webp', 103),
(84, './img/Xiaomi POCO M5 4GB 64GB.webp', 104);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` int(15) NOT NULL,
  `HoTenKH` varchar(100) NOT NULL,
  `TenCongTy` varchar(100) NOT NULL,
  `SoDienThoai` varchar(15) NOT NULL,
  `SoFax` int(15) NOT NULL,
  `Matkhau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `TenCongTy`, `SoDienThoai`, `SoFax`, `Matkhau`) VALUES
(24, 'Nguyễn Cao Khởi', 'CTY 1 thành viên', '0912449264', 123123, 123456789),
(25, 'Nguyễn Cao Khởi', '', '0912449264', 0, 123),
(26, 'Nguyễn Cao Khởi', '', '0912449264', 0, 123456789),
(27, 'Trần Thanh Vũ Phương', '', '123456789', 0, 123456789),
(28, 'Bùi Trần Ngọc Ly', '', '12345678', 0, 123456789);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `MaLoaiHang` int(15) NOT NULL,
  `TenLoaiHang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`) VALUES
(1, 'Điện thoại');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` int(15) NOT NULL,
  `HoTenNV` varchar(100) NOT NULL,
  `ChucVu` varchar(100) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `SoDienThoai` int(15) NOT NULL,
  `Matkhau` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`, `Matkhau`) VALUES
(1, 'Admin', 'Quản trị web bán hàng', 'Cần Thơ', 912345678, 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`SoDonDH`,`MSHH`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `MSNV` (`MSNV`),
  ADD KEY `MSKH` (`MSKH`);

--
-- Chỉ mục cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD PRIMARY KEY (`MaDC`),
  ADD KEY `MSKH` (`MSKH`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `MaLoaiHang` (`MaLoaiHang`);

--
-- Chỉ mục cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD PRIMARY KEY (`MaHinh`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Chỉ mục cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  ADD PRIMARY KEY (`MaLoaiHang`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dathang`
--
ALTER TABLE `dathang`
  MODIFY `SoDonDH` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  MODIFY `MaDC` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `MSHH` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  MODIFY `MaHinh` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MSKH` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  MODIFY `MaLoaiHang` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MSNV` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`),
  ADD CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`);

--
-- Các ràng buộc cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD CONSTRAINT `diachikh_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`);

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`MaLoaiHang`) REFERENCES `loaihanghoa` (`MaLoaiHang`);

--
-- Các ràng buộc cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD CONSTRAINT `hinhhanghoa_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
