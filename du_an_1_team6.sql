-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2024 at 12:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `du_an_1_team6`
--

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key` varchar(50) NOT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(4, 'logo', 'zzimg'),
(5, 'overview', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'),
(6, 'test', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_binhluan`
--

CREATE TABLE `tb_binhluan` (
  `id` int(11) NOT NULL,
  `noi_dung` text NOT NULL,
  `thoi_gian` date NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `ten_khachhang` varchar(50) NOT NULL,
  `trang_thai` tinyint(4) DEFAULT 0,
  `ten_sanpham` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_binhluan`
--

INSERT INTO `tb_binhluan` (`id`, `noi_dung`, `thoi_gian`, `id_sanpham`, `ten_khachhang`, `trang_thai`, `ten_sanpham`) VALUES
(6, 'sản phẩm nhìn đẹp', '2024-03-30', 9, 'Thường', 0, ''),
(7, 'san pham bt', '2024-03-14', 1, 'Hoàng', 0, ''),
(9, 'sadasd', '2024-03-08', 9, 'loi', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_chitiet_donhang`
--

CREATE TABLE `tb_chitiet_donhang` (
  `id` int(11) NOT NULL,
  `id_donhang` int(11) NOT NULL,
  `soluong_sanpham` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `don_gia` float NOT NULL,
  `ngay_mua` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_chitiet_donhang`
--

INSERT INTO `tb_chitiet_donhang` (`id`, `id_donhang`, `soluong_sanpham`, `id_sanpham`, `don_gia`, `ngay_mua`) VALUES
(13, 9, 0, 11, 100, '2024-04-06'),
(14, 10, 0, 1, 10, NULL),
(15, 11, 0, 29, 66, NULL),
(16, 12, 0, 29, 66, NULL),
(17, 13, 0, 9, 9, NULL),
(18, 14, 0, 29, 66, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_chi_tiet_giohang`
--

CREATE TABLE `tb_chi_tiet_giohang` (
  `id` int(11) NOT NULL,
  `id_donhang` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `id_giohang` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `thanh_tien` double NOT NULL,
  `created_at` datetime NOT NULL,
  `id_khuyenmai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_chi_tiet_giohang`
--

INSERT INTO `tb_chi_tiet_giohang` (`id`, `id_donhang`, `id_sanpham`, `id_giohang`, `so_luong`, `thanh_tien`, `created_at`, `id_khuyenmai`) VALUES
(1, 0, 11, 1, 1, 0, '0000-00-00 00:00:00', 0),
(2, 0, 24, 1, 1, 0, '0000-00-00 00:00:00', 0),
(3, 0, 11, 1, 1, 0, '0000-00-00 00:00:00', 0),
(4, 0, 9, 1, 1, 0, '0000-00-00 00:00:00', 0),
(5, 0, 24, 1, 1, 0, '0000-00-00 00:00:00', 0),
(6, 0, 1, 1, 2, 0, '0000-00-00 00:00:00', 0),
(7, 0, 24, 1, 1, 0, '0000-00-00 00:00:00', 0),
(8, 0, 24, 1, 1, 0, '0000-00-00 00:00:00', 0),
(9, 0, 29, 1, 1, 0, '0000-00-00 00:00:00', 0),
(10, 0, 24, 1, 1, 0, '0000-00-00 00:00:00', 0),
(11, 0, 11, 1, 1, 0, '0000-00-00 00:00:00', 0),
(12, 0, 1, 1, 1, 0, '0000-00-00 00:00:00', 0),
(13, 0, 24, 1, 1, 0, '0000-00-00 00:00:00', 0),
(14, 0, 1, 1, 1, 0, '0000-00-00 00:00:00', 0),
(15, 0, 11, 1, 1, 0, '0000-00-00 00:00:00', 0),
(16, 0, 11, 1, 1, 0, '0000-00-00 00:00:00', 0),
(17, 0, 1, 2, 1, 0, '0000-00-00 00:00:00', 0),
(18, 0, 29, 2, 1, 0, '0000-00-00 00:00:00', 0),
(19, 0, 29, 1, 1, 0, '0000-00-00 00:00:00', 0),
(20, 0, 9, 2, 1, 0, '0000-00-00 00:00:00', 0),
(21, 0, 29, 2, 1, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_danhgia`
--

CREATE TABLE `tb_danhgia` (
  `id` int(11) NOT NULL,
  `diem_danhgia` int(1) DEFAULT 3 COMMENT '1: là 1 sao, 2 là 2 sao, 3 là 3 sao, 4 là 4 sao, 5 là 5 sao',
  `trang_thai` tinyint(50) NOT NULL DEFAULT 0,
  `noi_dung` text NOT NULL,
  `thoi_gian` date NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_danhgia`
--

INSERT INTO `tb_danhgia` (`id`, `diem_danhgia`, `trang_thai`, `noi_dung`, `thoi_gian`, `id_sanpham`, `id_khachhang`) VALUES
(4, 3, 0, 'sản phẩm toẹt vời', '2024-03-08', 2, 1),
(5, 4, 0, 'san pham tot, dang mua', '2024-03-14', 9, 1),
(6, 5, 0, 'asjkdjkashdjkashfjkasjklf.a', '2024-03-14', 9, 2),
(7, 4, 0, 'ấdasfasfasdas', '2024-03-15', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_danhmuc`
--

CREATE TABLE `tb_danhmuc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_danhmuc`
--

INSERT INTO `tb_danhmuc` (`id`, `name`) VALUES
(1, 'Điện thoại e121'),
(15, 'Máy tính ASUS A7Zgx'),
(18, 'do hand made quangthuong'),
(19, 'lenovo');

-- --------------------------------------------------------

--
-- Table structure for table `tb_donhang`
--

CREATE TABLE `tb_donhang` (
  `id` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `ngay_mua` date DEFAULT current_timestamp(),
  `phuongthuc_thanhtoan` int(11) NOT NULL DEFAULT 0 COMMENT '0 Tiền mặt, 1 Online Banking',
  `trang_thai` int(11) NOT NULL DEFAULT 0 COMMENT 'đã mua',
  `diachi_muahang` varchar(250) NOT NULL,
  `ten_khachhang` varchar(50) NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tong_tien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_donhang`
--

INSERT INTO `tb_donhang` (`id`, `id_khachhang`, `ngay_mua`, `phuongthuc_thanhtoan`, `trang_thai`, `diachi_muahang`, `ten_khachhang`, `sdt`, `email`, `tong_tien`) VALUES
(11, 1, '2024-04-08', 0, 2, 'ádf', 'hoang', '09567676723', 'client@gmail.com', 66),
(12, 0, '2024-04-09', 0, 0, 'gvycyvyu', 'vyvyvg', '10606060', 'admin@gmail.com', 66),
(13, 1, '2024-04-09', 0, 0, 'gvycyvyu', 'vyvyvg', '10606060', 'client@gmail.com', 9),
(14, 1, '2024-04-09', 0, 0, 'gvycyvyu', 'vyvyvg', '10606060', 'client@gmail.com', 66);

-- --------------------------------------------------------

--
-- Table structure for table `tb_giohang`
--

CREATE TABLE `tb_giohang` (
  `id` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_giohang`
--

INSERT INTO `tb_giohang` (`id`, `id_taikhoan`) VALUES
(1, 0),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_hinhanh`
--

CREATE TABLE `tb_hinhanh` (
  `id` int(11) NOT NULL,
  `link_hinhanh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_khuyenmai`
--

CREATE TABLE `tb_khuyenmai` (
  `id` int(11) NOT NULL,
  `ten_khuyenmai` varchar(255) NOT NULL,
  `ma_khuyenmai` varchar(50) NOT NULL,
  `thoigian_bd` date NOT NULL,
  `thoigian_kt` date NOT NULL,
  `gia_tri` int(9) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_khuyenmai`
--

INSERT INTO `tb_khuyenmai` (`id`, `ten_khuyenmai`, `ma_khuyenmai`, `thoigian_bd`, `thoigian_kt`, `gia_tri`, `trang_thai`) VALUES
(1, 'Giảm giá xuân', 'MSF1234', '2023-02-28', '2025-03-03', 5000000, 1),
(3, 'Winter', 'WT1234124', '2024-03-06', '2024-03-09', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lienhe`
--

CREATE TABLE `tb_lienhe` (
  `id` int(11) NOT NULL,
  `ten_khachhang` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sdt` varchar(15) NOT NULL,
  `noi_dung` text NOT NULL,
  `trang_thai_lien_he` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_lienhe`
--

INSERT INTO `tb_lienhe` (`id`, `ten_khachhang`, `email`, `sdt`, `noi_dung`, `trang_thai_lien_he`, `created_at`) VALUES
(1, 'Hoàng', 'hoangduong9104@gmail.com', '09567676723', 'Mình mua 3 cái áo mà không được freeship. Buồn quá :<', 1, '2024-03-25'),
(3, 'Nam', 'nam@gmail.com', '09883123321', 'Đồ đẹp lắm', 1, '2024-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sanpham`
--

CREATE TABLE `tb_sanpham` (
  `id` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL COMMENT 'ID danh mục sản phẩm',
  `name` varchar(255) DEFAULT NULL,
  `img_thumbnail` varchar(255) DEFAULT NULL,
  `gia_ban` int(11) NOT NULL COMMENT 'giá bán thường',
  `gia_khuyenmai` int(11) DEFAULT NULL COMMENT 'giá khuyến mãi',
  `mo_ta` text DEFAULT NULL COMMENT 'mô tả chi tiết sản phẩm',
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'ngày tạo sản phẩm',
  `so_luong` int(11) NOT NULL DEFAULT 0 COMMENT '0: trạng thái off\r\nlớn hơn 0 thay đổi trạng thái\r\n\r\nlớn hơn 0: trạng thái on'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_sanpham`
--

INSERT INTO `tb_sanpham` (`id`, `id_danhmuc`, `name`, `img_thumbnail`, `gia_ban`, `gia_khuyenmai`, `mo_ta`, `ngay_tao`, `so_luong`) VALUES
(1, 15, 'Máy tính ASUS 789', '/uploads/products/maytinh.jpg', 100, 10, 'sản phẩm laptopgaming asus', '2024-03-18 13:24:21', 1),
(9, 1, 'Điện thoại IP10', '/uploads/products/dienthoai.jpg', 99, 9, 'dien thoai iphone chinh hang', '2024-03-18 13:26:20', 0),
(11, 1, 'iphone 13', '/uploads/products/dienthoai.jpg', 100, 0, 'sản phẩm dien thoai', '2024-03-18 13:27:30', 5),
(24, 15, 'Máy tính ASUS pro 144hz', '/uploads/products1711777953-legion_game_shop.ico', 100, 0, 'sản phẩm laptopgaming', '2024-03-16 00:00:00', 1),
(29, 19, 'laptop lennovo120', '/uploads/products1712055411-yt_icon_rgb.ico', 66, 0, 'dien thoai laptop chinh hang', '2024-04-02 00:00:00', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tb_taikhoan`
--

CREATE TABLE `tb_taikhoan` (
  `id` int(11) NOT NULL,
  `ten_dang_nhap` varchar(30) NOT NULL,
  `mat_khau` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `chuc_vu` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_taikhoan`
--

INSERT INTO `tb_taikhoan` (`id`, `ten_dang_nhap`, `mat_khau`, `email`, `chuc_vu`) VALUES
(1, 'goku', '123', 'gku@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tintuc`
--

CREATE TABLE `tb_tintuc` (
  `id` int(11) NOT NULL,
  `tieu_de` varchar(255) NOT NULL,
  `noi_dung` text NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `ngay_tao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'true(1): admin, false(0): member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`) VALUES
(0, 'admin', 'admin@gmail.com', '12345678', 1),
(1, 'hoang', 'client@gmail.com', '12345678', 0),
(2, 'loi', 'loi@gmail.com', 'abc12345', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_binhluan`
--
ALTER TABLE `tb_binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_chitiet_donhang`
--
ALTER TABLE `tb_chitiet_donhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_chi_tiet_giohang`
--
ALTER TABLE `tb_chi_tiet_giohang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_danhgia`
--
ALTER TABLE `tb_danhgia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_danhmuc`
--
ALTER TABLE `tb_danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_donhang`
--
ALTER TABLE `tb_donhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_giohang`
--
ALTER TABLE `tb_giohang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_hinhanh`
--
ALTER TABLE `tb_hinhanh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_khuyenmai`
--
ALTER TABLE `tb_khuyenmai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lienhe`
--
ALTER TABLE `tb_lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sanpham`
--
ALTER TABLE `tb_sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_taikhoan`
--
ALTER TABLE `tb_taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tintuc`
--
ALTER TABLE `tb_tintuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_binhluan`
--
ALTER TABLE `tb_binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_chitiet_donhang`
--
ALTER TABLE `tb_chitiet_donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_chi_tiet_giohang`
--
ALTER TABLE `tb_chi_tiet_giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_danhgia`
--
ALTER TABLE `tb_danhgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_danhmuc`
--
ALTER TABLE `tb_danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_donhang`
--
ALTER TABLE `tb_donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_giohang`
--
ALTER TABLE `tb_giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_hinhanh`
--
ALTER TABLE `tb_hinhanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_khuyenmai`
--
ALTER TABLE `tb_khuyenmai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_lienhe`
--
ALTER TABLE `tb_lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_sanpham`
--
ALTER TABLE `tb_sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_taikhoan`
--
ALTER TABLE `tb_taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_tintuc`
--
ALTER TABLE `tb_tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
