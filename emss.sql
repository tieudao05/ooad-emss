-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 28, 2021 lúc 05:50 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `emss`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `benh_an`
--

CREATE TABLE `benh_an` (
  `ma_ho_so` int(11) NOT NULL,
  `ma_benh_nhan` int(11) NOT NULL,
  `ma_benh_vien` varchar(50) NOT NULL,
  `tg_nhap_vien` date NOT NULL,
  `tg_xuat_vien` date NOT NULL,
  `tinh_trang_nhap_vien` text NOT NULL,
  `ly_do_xuat_vien` text NOT NULL,
  `tien_su` text NOT NULL,
  `dieu_tri` text NOT NULL,
  `chan_doan` text NOT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `benh_nhan`
--

CREATE TABLE `benh_nhan` (
  `ma_benh_nhan` int(11) NOT NULL,
  `ma_benh_vien` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_quyen`
--

CREATE TABLE `chi_tiet_quyen` (
  `ma_quyen` int(11) NOT NULL,
  `ma_vai_tro` int(11) NOT NULL,
  `ma_chuc_nang` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_quyen`
--

INSERT INTO `chi_tiet_quyen` (`ma_quyen`, `ma_vai_tro`, `ma_chuc_nang`, `trang_thai`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 1, 5, 1),
(6, 1, 6, 1),
(7, 1, 7, 1),
(8, 1, 8, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuc_nang`
--

CREATE TABLE `chuc_nang` (
  `ma_chuc_nang` int(11) NOT NULL,
  `ten_chuc_nang` varchar(50) NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chuc_nang`
--

INSERT INTO `chuc_nang` (`ma_chuc_nang`, `ten_chuc_nang`, `trang_thai`) VALUES
(1, 'Quản lí người dùng', 1),
(2, 'Quản lí bệnh nhân', 1),
(3, 'Quản lí đối tượng cách ly', 1),
(4, 'Quản lí truy vết', 1),
(5, 'Quản lí xét nghiệm', 1),
(6, 'Phân quyền', 1),
(7, 'Thống kê', 1),
(8, 'Quản lí thông tin cá nhân ', 1),
(9, 'Quản lí địa điểm', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dia_diem`
--

CREATE TABLE `dia_diem` (
  `ma_dia_diem` int(11) NOT NULL,
  `ten_dia_diem` varchar(50) NOT NULL,
  `tp_tinh` varchar(50) NOT NULL,
  `quan_huyen` varchar(50) NOT NULL,
  `phuong_xa` varchar(50) NOT NULL,
  `ap_thon` varchar(50) NOT NULL,
  `so_nha` varchar(50) NOT NULL,
  `phan_loai` varchar(50) NOT NULL,
  `suc_chua` int(11) NOT NULL,
  `so_luong_trong` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doi_tuong_cach_ly`
--

CREATE TABLE `doi_tuong_cach_ly` (
  `ma_doi_tuong` int(11) NOT NULL,
  `ma_dia_diem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ho_so_cach_ly`
--

CREATE TABLE `ho_so_cach_ly` (
  `ma_ho_so` int(11) NOT NULL,
  `ma_doi_tuong` int(11) NOT NULL,
  `ma_dia_diem` int(11) NOT NULL,
  `tg_bat_dau` date NOT NULL,
  `tg_ket_thuc` date NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lich_trinh`
--

CREATE TABLE `lich_trinh` (
  `ma_nguoi_dung` int(11) NOT NULL,
  `thoi_gian` datetime NOT NULL,
  `ma_dia_diem` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `ma_nguoi_dung` int(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ma_vai_tro` int(11) NOT NULL,
  `ho_lot` varchar(50) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `cmnd` varchar(50) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `phai` varchar(3) NOT NULL,
  `dia_chi` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `so_dien_thoai` varchar(15) NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`ma_nguoi_dung`, `user_name`, `password`, `ma_vai_tro`, `ho_lot`, `ten`, `cmnd`, `ngay_sinh`, `phai`, `dia_chi`, `email`, `so_dien_thoai`, `trang_thai`) VALUES
(2, 'admin', '$2y$10$8cJAqDsa1xVwh1vpqmjQUebF6BG0WSbJcyuF6DxGJIBat0O83SyFi', 1, 'admin', 'admin', '0000', '2001-01-01', 'Nam', 'TPHCM', 'ef.tieudao@gmail.com', '012345', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `ma_nhan_vien` int(11) NOT NULL,
  `ma_chuc_vu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_tin_truy_vet`
--

CREATE TABLE `thong_tin_truy_vet` (
  `ma_truy_vet` int(11) NOT NULL,
  `ma_benh_nhan` int(11) NOT NULL,
  `ma_nhan_vien` int(50) NOT NULL,
  `thoi_gian_truy_vet` datetime NOT NULL,
  `tg_bat_dau` datetime NOT NULL,
  `tg_ket_thuc` datetime NOT NULL,
  `trang_thai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_tin_xet_nghiem`
--

CREATE TABLE `thong_tin_xet_nghiem` (
  `ma_mau_XN` int(11) NOT NULL,
  `ma_ho_so` int(11) NOT NULL,
  `tg_lay_mau` datetime NOT NULL,
  `tg_co_ket_qua` datetime NOT NULL,
  `ket_qua` varchar(50) NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vai_tro`
--

CREATE TABLE `vai_tro` (
  `ma_vai_tro` int(11) NOT NULL,
  `ten_vai_tro` varchar(50) NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `vai_tro`
--

INSERT INTO `vai_tro` (`ma_vai_tro`, `ten_vai_tro`, `trang_thai`) VALUES
(1, 'Administrator', 1),
(2, 'Cán bộ quản lí', 1),
(3, 'Cán bộ nhập liệu', 1),
(4, 'Bệnh nhân', 1),
(5, 'Đối tượng cách ly', 1),
(6, 'Người dân ', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `benh_an`
--
ALTER TABLE `benh_an`
  ADD PRIMARY KEY (`ma_ho_so`),
  ADD KEY `ma_benh_nhan` (`ma_benh_nhan`);

--
-- Chỉ mục cho bảng `benh_nhan`
--
ALTER TABLE `benh_nhan`
  ADD PRIMARY KEY (`ma_benh_nhan`);

--
-- Chỉ mục cho bảng `chi_tiet_quyen`
--
ALTER TABLE `chi_tiet_quyen`
  ADD PRIMARY KEY (`ma_quyen`),
  ADD KEY `ma_vai_tro` (`ma_vai_tro`),
  ADD KEY `ma_chuc_nang` (`ma_chuc_nang`);

--
-- Chỉ mục cho bảng `chuc_nang`
--
ALTER TABLE `chuc_nang`
  ADD PRIMARY KEY (`ma_chuc_nang`);

--
-- Chỉ mục cho bảng `dia_diem`
--
ALTER TABLE `dia_diem`
  ADD PRIMARY KEY (`ma_dia_diem`);

--
-- Chỉ mục cho bảng `doi_tuong_cach_ly`
--
ALTER TABLE `doi_tuong_cach_ly`
  ADD PRIMARY KEY (`ma_doi_tuong`),
  ADD KEY `ma_dia_diem` (`ma_dia_diem`);

--
-- Chỉ mục cho bảng `ho_so_cach_ly`
--
ALTER TABLE `ho_so_cach_ly`
  ADD PRIMARY KEY (`ma_ho_so`),
  ADD KEY `ma_dia_diem` (`ma_dia_diem`),
  ADD KEY `ma_doi_tuong` (`ma_doi_tuong`);

--
-- Chỉ mục cho bảng `lich_trinh`
--
ALTER TABLE `lich_trinh`
  ADD PRIMARY KEY (`ma_nguoi_dung`,`thoi_gian`,`ma_dia_diem`),
  ADD KEY `ma_dia_diem` (`ma_dia_diem`);

--
-- Chỉ mục cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`ma_nguoi_dung`),
  ADD UNIQUE KEY `cmnd` (`cmnd`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD KEY `ma_vai_tro` (`ma_vai_tro`);

--
-- Chỉ mục cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`ma_nhan_vien`),
  ADD KEY `ma_chuc_vu` (`ma_chuc_vu`);

--
-- Chỉ mục cho bảng `thong_tin_truy_vet`
--
ALTER TABLE `thong_tin_truy_vet`
  ADD PRIMARY KEY (`ma_truy_vet`),
  ADD KEY `ma_benh_nhan` (`ma_benh_nhan`),
  ADD KEY `ma_nhan_vien` (`ma_nhan_vien`);

--
-- Chỉ mục cho bảng `thong_tin_xet_nghiem`
--
ALTER TABLE `thong_tin_xet_nghiem`
  ADD PRIMARY KEY (`ma_mau_XN`),
  ADD KEY `ma_ho_so` (`ma_ho_so`);

--
-- Chỉ mục cho bảng `vai_tro`
--
ALTER TABLE `vai_tro`
  ADD PRIMARY KEY (`ma_vai_tro`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `benh_an`
--
ALTER TABLE `benh_an`
  MODIFY `ma_ho_so` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `benh_nhan`
--
ALTER TABLE `benh_nhan`
  MODIFY `ma_benh_nhan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_quyen`
--
ALTER TABLE `chi_tiet_quyen`
  MODIFY `ma_quyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `chuc_nang`
--
ALTER TABLE `chuc_nang`
  MODIFY `ma_chuc_nang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `dia_diem`
--
ALTER TABLE `dia_diem`
  MODIFY `ma_dia_diem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ho_so_cach_ly`
--
ALTER TABLE `ho_so_cach_ly`
  MODIFY `ma_ho_so` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `ma_nguoi_dung` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `thong_tin_truy_vet`
--
ALTER TABLE `thong_tin_truy_vet`
  MODIFY `ma_truy_vet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `thong_tin_xet_nghiem`
--
ALTER TABLE `thong_tin_xet_nghiem`
  MODIFY `ma_mau_XN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vai_tro`
--
ALTER TABLE `vai_tro`
  MODIFY `ma_vai_tro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `benh_an`
--
ALTER TABLE `benh_an`
  ADD CONSTRAINT `benh_an_ibfk_1` FOREIGN KEY (`ma_benh_nhan`) REFERENCES `benh_nhan` (`ma_benh_nhan`);

--
-- Các ràng buộc cho bảng `benh_nhan`
--
ALTER TABLE `benh_nhan`
  ADD CONSTRAINT `benh_nhan_ibfk_1` FOREIGN KEY (`ma_benh_nhan`) REFERENCES `nguoi_dung` (`ma_nguoi_dung`);

--
-- Các ràng buộc cho bảng `chi_tiet_quyen`
--
ALTER TABLE `chi_tiet_quyen`
  ADD CONSTRAINT `chi_tiet_quyen_ibfk_1` FOREIGN KEY (`ma_vai_tro`) REFERENCES `vai_tro` (`ma_vai_tro`),
  ADD CONSTRAINT `chi_tiet_quyen_ibfk_2` FOREIGN KEY (`ma_chuc_nang`) REFERENCES `chuc_nang` (`ma_chuc_nang`);

--
-- Các ràng buộc cho bảng `doi_tuong_cach_ly`
--
ALTER TABLE `doi_tuong_cach_ly`
  ADD CONSTRAINT `doi_tuong_cach_ly_ibfk_1` FOREIGN KEY (`ma_doi_tuong`) REFERENCES `nguoi_dung` (`ma_nguoi_dung`),
  ADD CONSTRAINT `doi_tuong_cach_ly_ibfk_2` FOREIGN KEY (`ma_dia_diem`) REFERENCES `dia_diem` (`ma_dia_diem`);

--
-- Các ràng buộc cho bảng `ho_so_cach_ly`
--
ALTER TABLE `ho_so_cach_ly`
  ADD CONSTRAINT `ho_so_cach_ly_ibfk_1` FOREIGN KEY (`ma_dia_diem`) REFERENCES `dia_diem` (`ma_dia_diem`),
  ADD CONSTRAINT `ho_so_cach_ly_ibfk_2` FOREIGN KEY (`ma_doi_tuong`) REFERENCES `doi_tuong_cach_ly` (`ma_doi_tuong`);

--
-- Các ràng buộc cho bảng `lich_trinh`
--
ALTER TABLE `lich_trinh`
  ADD CONSTRAINT `lich_trinh_ibfk_1` FOREIGN KEY (`ma_dia_diem`) REFERENCES `dia_diem` (`ma_dia_diem`),
  ADD CONSTRAINT `lich_trinh_ibfk_2` FOREIGN KEY (`ma_nguoi_dung`) REFERENCES `nguoi_dung` (`ma_nguoi_dung`);

--
-- Các ràng buộc cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD CONSTRAINT `nguoi_dung_ibfk_1` FOREIGN KEY (`ma_vai_tro`) REFERENCES `vai_tro` (`ma_vai_tro`);

--
-- Các ràng buộc cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD CONSTRAINT `nhan_vien_ibfk_1` FOREIGN KEY (`ma_nhan_vien`) REFERENCES `nguoi_dung` (`ma_nguoi_dung`),
  ADD CONSTRAINT `nhan_vien_ibfk_2` FOREIGN KEY (`ma_chuc_vu`) REFERENCES `vai_tro` (`ma_vai_tro`);

--
-- Các ràng buộc cho bảng `thong_tin_truy_vet`
--
ALTER TABLE `thong_tin_truy_vet`
  ADD CONSTRAINT `thong_tin_truy_vet_ibfk_1` FOREIGN KEY (`ma_benh_nhan`) REFERENCES `benh_nhan` (`ma_benh_nhan`),
  ADD CONSTRAINT `thong_tin_truy_vet_ibfk_2` FOREIGN KEY (`ma_nhan_vien`) REFERENCES `nhan_vien` (`ma_nhan_vien`);

--
-- Các ràng buộc cho bảng `thong_tin_xet_nghiem`
--
ALTER TABLE `thong_tin_xet_nghiem`
  ADD CONSTRAINT `thong_tin_xet_nghiem_ibfk_1` FOREIGN KEY (`ma_ho_so`) REFERENCES `benh_an` (`ma_ho_so`),
  ADD CONSTRAINT `thong_tin_xet_nghiem_ibfk_2` FOREIGN KEY (`ma_ho_so`) REFERENCES `ho_so_cach_ly` (`ma_ho_so`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
