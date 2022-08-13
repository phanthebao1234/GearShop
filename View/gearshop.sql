-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 26, 2022 lúc 05:39 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `gearshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `adminname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `adminname`, `password`) VALUES
(1, 'gearadmin', 'gearadmin123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `hoadon_id` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`hoadon_id`, `id_sp`, `soluongmua`, `thanhtien`, `tinhtrang`) VALUES
(3, 9, 1, 36490000, 0),
(4, 9, 2, 72980000, 0),
(5, 20, 1, 37990000, 0),
(6, 8, 1, 8990000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `hoadon_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ngaydat` date NOT NULL,
  `tongtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`hoadon_id`, `user_id`, `ngaydat`, `tongtien`) VALUES
(1, 3, '2022-03-15', 10000000),
(2, 3, '2022-03-15', 0),
(3, 3, '2022-03-15', 36490000),
(4, 3, '2022-03-15', 72980000),
(5, 3, '2022-03-16', 37990000),
(6, 3, '2022-03-26', 8990000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `id_loai` int(11) NOT NULL,
  `ten_loai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `menu_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id_menu`, `menu_name`, `link`) VALUES
(1, 'Laptop Gaming', 'laptopgaming'),
(2, 'Laptop văn phòng', 'laptopvanphong'),
(3, 'Apple', 'apple'),
(4, 'PC Gaming', 'pcgaming'),
(5, 'Màn hình', 'manhinh'),
(6, 'Main - CPU - VGA', 'maincpuvga'),
(7, 'Case - Tản - Nguồn', 'casetannguon'),
(8, 'SSD - HDD - RAM', 'ssdhddram'),
(9, 'Bàn phím', 'banphim'),
(10, 'Chuột', 'chuot'),
(11, 'Tai nghe - Loa', 'taingheloa'),
(12, 'Máy in, phần mềm', 'mayinphanmem'),
(13, 'Ghế & bàn', 'gheban'),
(14, 'Thiết bị mạng', 'thietbimang'),
(27, 'test menu', 'testmenu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `ten_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dongia_sp` float NOT NULL,
  `giamgia_sp` float NOT NULL,
  `hinh_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maloai_sp` int(11) NOT NULL,
  `ngaylap_sp` date NOT NULL,
  `mota_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soluongton_sp` int(11) NOT NULL,
  `soluotxem_sp` int(11) NOT NULL,
  `id_thuonghieu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `ten_sp`, `dongia_sp`, `giamgia_sp`, `hinh_sp`, `maloai_sp`, `ngaylap_sp`, `mota_sp`, `soluongton_sp`, `soluotxem_sp`, `id_thuonghieu`) VALUES
(1, 'PC GVN PHANTOM S', 30000000, 27490000, 'gearvn-gvn-phantom-s.jpg', 4, '2022-03-13', 'CPU: Intel Core i5 12400F / 2.5GHz Turbo 4.4GHz / 6 Nhân 12 Luồng / 18MB / LGA 1700.<br>\r\nBo mạch chủ: GIGABYTE B660M AORUS PRO AX DDR4 <br>\r\nRAM: PNY XLR8 RGB DDR4 8GB 3200 x 2<br>\r\nVGA: GIGABYTE GeForce RTX 3050 GAMING OC 8G<br>\r\nSSD: Kingston NV1 250GB', 10, 0, 2),
(2, 'Laptop Gaming MSI Katana GF66 11UC 676VN', 25000000, 21990000, 'MSI-Katana.jpg', 1, '2022-03-13', 'CPU: Intel Core i5-11400H<br>\r\nRAM: 8GB (8GB x 1) DDR4 3200MHz (2 khe, tối đa 64GB)<br>\r\nỔ lưu trữ: 512GB NVMe PCIe Gen3x4 SSD<br>\r\nCard đồ họa: NVIDIA GeForce RTX 3050 4GB GDDR6 + Intel UHD Graphics<br>\r\nMàn hình: 15.6 inch FHD (1920*1080), 144Hz 45% N', 20, 0, 6),
(3, 'PC GVN IVY M', 15000000, 13990000, 'GVN-Ivy-10-M.jpg', 1, '2022-03-13', 'CPU: Intel Core i3 10100F / 6MB / 4.3GHZ / 4 nhân 8 luồng / LGA 1200<br>\r\nBo mạch chủ: MSI H510M Pro-E<br>\r\nRAM: PNY XLR8 RGB DDR4 1x8GB 3200<br>\r\nVGA: MANLI GeForce GTX 1650 4GB GDDR6<br>\r\nSSD: PNY CS900 120G 2.5<br>\r\nHDD: Có thể tùy chọn Nâng cấp<br>', 7, 0, 2),
(4, 'Laptop Gaming Asus ROG Strix G15 G513IC HN002T', 27000000, 25690000, 'laptop-gaming-asus-rog-strix-g15.jpg', 1, '2022-03-13', 'CPU: AMD Ryzen R7-4800H 2.9GHz up to 4.2GHz, 8 cores 16 threads<br>\r\nRAM: 8GB DDR4 3200MHz (2x SO-DIMM socket)<br>\r\nỔ lưu trữ: 512GB M.2 NVMe™ PCIe® 3.0 SSD<br>\r\nCard đồ họa: NVIDIA Geforce RTX 3050 4GB GDDR6<br>\r\nMàn hình: 15.6 inch FHD (1920 x 1080) I', 8, 0, 4),
(5, 'PC GVN RATCHET M', 19000000, 17990000, 'gvn-rachet-m.jpg', 4, '2022-03-13', 'CPU: Intel Core i5 11400F / 12MB / 4.4GHZ / 6 nhân 12 luồng / LGA 1200<br>\r\nBo mạch chủ: GIGABYTE B560M AORUS PRO (rev. 1.0)<br>\r\nRAM: PNY XLR8 RGB DDR4 1x8GB 3200<br>\r\nVGA: MANLI GeForce GTX 1650 4GB GDDR6<br>\r\nSSD: PNY CS900 120G 2.5<br>\r\nHDD: Có thể tù', 15, 0, 2),
(6, 'Ghế Cougar Armor K Type', 5500000, 479000, 'gearvn_cougar_armor.png', 13, '2022-03-13', 'Chất liệu: Da cao cấp PVC dễ dàng bảo quản.<br>\r\nTay vịn: 4D<br>\r\nCơ chế: 360°<br>\r\nTải trọng tối đa: Dưới 80kg<br>', 43, 0, 16),
(8, 'PC GVN VENTUS M', 8990000, 0, 'gearvn-gvn-ventus-m.jpg', 4, '2022-03-15', 'CPU: Intel Core i3 10100F / 6MB / 4.3GHZ / 4 nhân 8 luồng / LGA 1200<br>\r\nBo mạch chủ: MSI H510M Pro-E<br>\r\nRAM: PNY XLR8 RGB DDR4 1x8GB 3200<br>\r\nVGA: Gigabyte GeForce GT 1030 Low Profile D4 2G<br>\r\nSSD: Lexar NQ100 2.5\'\' SATA3 240GB<br>\r\nHDD: Có thể tùy', 46, 0, 2),
(9, 'Macbook Pro 13 2020 M1 8GB 512GB MYDC2SA/A – Silver', 36490000, 0, 'macbook-pro-13-2020.jpg', 3, '2022-03-15', 'CPU: Apple M1 chip with 8‑core CPU<br>\r\nRAM: 8GB<br>\r\nỔ lưu trữ: 512GB SSD<br>\r\nCard đồ họa: Apple M1 GPU 8 cores<br>\r\nMàn hình: Retina 13.3 inch (2560x1600) IPS Led Backlit True Tone<br>\r\nBàn phím: Magic Keyboard<br>\r\nAudio: Stereo speakers<br>\r\nĐọc ', 24, 0, 9),
(10, 'Màn hình LG 27GP850-B UltraGear 27″ Nano IPS 2K 180Hz 1ms HDR G-Sync', 11190000, 0, 'gearvn-gvn-ventus-m.jpg', 5, '2022-03-15', 'Độ phân giải: 2K (2560 x 1440) , tỷ lệ màn hình 16:9<br>\r\nTấm nền : IPS<br>\r\nTần số quét: HDMI : 144Hz, DP :165Hz (O/C 180Hz)<br>\r\nThời gian phản hồi: 1ms <br>\r\nKiểu màn hình (phẳng /cong): Phẳng<br>\r\nĐộ sáng: Độ sáng (Tối thiểu) 320 cd/m² Độ sáng ', 56, 0, 10),
(11, 'Laptop Gaming MSI GF65 Thin 10SER 622VN', 33900000, 0, 'laptop-msi-gf65.png', 1, '2022-03-15', 'CPU: Intel Core i7-10750H 2.6GHz up to 5.0GHz 12MB<br>\r\nRAM: 8GB DDR4 2666MHz (2x SO-DIMM socket, up to 32GB SDRAM)<br>\r\nỔ lưu trữ: 512GB SSD M.2 PCIE<br>\r\nCard đồ họa: NVIDIA GeForce RTX 2060 6GB GDDR6<br>\r\nMàn hình: 15.6<br>\r\nBàn phím: LED đỏ<br>\r\nA', 38, 0, 6),
(12, 'Laptop Acer Aspire 3 A315 56 502X', 12890000, 0, 'gearvn-laptop-acer-aspire.jpg', 1, '2022-03-15', 'CPU: Intel Core i5-1035G1 1.0GHz up to 3.6GHz 6MB<br>\r\nRAM: 4GB DDR4 2666MHz Onboard (1x SO-DIMM socket, up to 12GB SDRAM)<br>\r\nỔ lưu trữ: 256GB SSD M.2 PCIE, 1x slot SATA3 2.5<br>\r\nCard đồ họa: Intel UHD Graphics<br>\r\nMàn hình: 15.6<br>\r\nBàn phím: Bà', 123, 0, 7),
(13, 'Bàn phím Gaming DareU LK145 USB', 340000, 0, 'lk145.jpg', 9, '2022-03-15', 'Kết nối: Có dây<br>\r\nKiểu dáng: 104 phím<br>\r\nLoại bàn phím: Full size<br> \r\nĐèn LED: Có Led Rainbow 7 màu, 5 chế độ<br>\r\nSwitch: Membrane cao su giả cơ<br>\r\nTính năng: 19 key rollover, led rainbow 7 màu<br>', 78, 0, 17),
(14, 'Chuột Logitech G102 LightSync Black', 400000, 0, 'logitech-g102-lightsync-rgb-black.jpg', 10, '2022-03-15', 'Kiểu kết nối: USB 2.0<br>\r\nĐèn LED: RGB<br>\r\nKiểu thiết kế: Đối xứng - Ambidextrous<br>\r\nĐộ nhạy ( DPI ): 8000<br>\r\nCảm biến: Mercury Sensor<br>\r\nSố nút bấm: 6<br>\r\nSwitch: Omron<br>\r\nKích thước: Dài 116.6 x Rộng 62.15 x Cao 38.2<br>\r\nKhối lượng: 85g ', 100, 0, 8),
(15, 'Phần mềm Office Home & Student 2021 79G-05337', 21000000, 0, 'GEARVN-phan-mem-office-home-student-2021-79g-05337-768x768.jpeg', 12, '2022-03-15', 'Số thiết bị: Dành cho 1 người, 1 thiết bị<br>\r\nỨng dụng: Bộ ứng dụng cơ bản 2021: Word, Excel, PowerPoint, cùng tính năng cộng thêm OneNote <br>\r\nThời hạn: Vĩnh viễn<br>', 10, 0, 19),
(16, 'Máy in Laser Brother Đen Trắng đơn năng HL-L2321D', 2900000, 0, 'may_in_aebb650ea88d4f6aa8223a558a590f5b.jpg', 12, '2022-03-15', 'Loại máy in: In laser trắng đen<br>\r\nTốc độ: 30 ppm (Độ phủ 5%)<br>\r\nGiấy tương thích: A4, A5M<br>\r\nĐộ phân giải: 2400 x 600 dpi<br>\r\nCổng giao tiếp: USB 2.0 <br>\r\nKích thước: 356 mm x 360 mm x 183 mm<br>\r\nTrọng lượng: 6.8 kg<br>', 45, 0, 19),
(17, 'PC GVN VALORANT Z', 52490000, 0, 'gearvn.com-gvn-valorant-z-7.jpg', 4, '2022-03-15', 'CPU: Intel Core i7 12700K / 3.6GHz Turbo 5.0GHz / 12 Nhân 20 Luồng / 25MB / LGA 1700<br>\r\nBo mạch chủ: MSI MAG Z690 TOMAHAWK WIFI DDR4<br>\r\nRAM: Corsair Vengeance RS RGB DDR4 8G Bus 3200 x 2<br>\r\nVGA: MSI GeForce RTX 3070 VENTUS 2X (LHR)<br>\r\nSSD: MSI Spa', 5, 0, 5),
(19, 'PC GVN VOLIBEAR S', 37990000, 0, 'gearvn-gvn-volibear-s.jpg', 4, '2022-03-15', 'CPU: Intel Core i7 12700F / 2.1GHz Turbo 4.9GHz / 12 Nhân 20 Luồng / 25MB / LGA 1700<br>\r\nBo mạch chủ: MSI PRO Z690-A WIFI DDR4<br>\r\nRAM: PNY XLR8 RGB DDR4 1x8GB 3200 x 2<br>\r\nVGA: MSI GeForce RTX 3060 VENTUS 2X 12G OC V2 (LHR)<br>\r\nSSD: Kingston NV1 250G', 67, 0, 2),
(20, 'PC GVN VOLIBEAR S', 37990000, 0, 'gearvn-gvn-homework-athlon-1-768x768.jpg', 4, '2022-03-15', 'CPU: Intel Core i7 12700F / 2.1GHz Turbo 4.9GHz / 12 Nhân 20 Luồng / 25MB / LGA 1700<br>\r\nBo mạch chủ: MSI PRO Z690-A WIFI DDR4<br>\r\nRAM: PNY XLR8 RGB DDR4 1x8GB 3200 x 2<br>\r\nVGA: MSI GeForce RTX 3060 VENTUS 2X 12G OC V2 (LHR)<br>\r\nSSD: Kingston NV1 250G', 38, 0, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `id_thuonghieu` int(11) NOT NULL,
  `ten_thuonghieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hinh_thuonghieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link_thuonghieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thuonghieu`
--

INSERT INTO `thuonghieu` (`id_thuonghieu`, `ten_thuonghieu`, `hinh_thuonghieu`, `link_thuonghieu`) VALUES
(1, 'Intel', 'intel.png', 'intel'),
(2, 'NVIDIA', 'nvidia.jpg', 'nvidia'),
(3, 'AMD', 'amd.png', 'amd'),
(4, 'ASUS', 'asus.png', 'asus'),
(5, 'GIGABYTE', 'gigabyte.png', 'gigabyte'),
(6, 'MSI', 'msi.png', 'msi'),
(7, 'ACER', 'acer.png', 'acer'),
(8, 'LOGITECH', 'logitech.png', 'logitech'),
(9, 'APPLE', 'apple.png', 'apple'),
(10, 'LG', 'lg.png', 'lg'),
(11, 'SAMSUNG', 'samsung.png', 'samsung'),
(12, 'KINGSTON', 'kingston.png', 'kingston'),
(13, 'RAZER', 'razer.png', 'razer'),
(14, 'HYPERX', 'hyper.png', 'hyperx'),
(15, 'LENOVO', 'lenovo.png', 'lenovo'),
(16, 'Cougar', 'cougar.png', 'cougar'),
(17, 'DareU', 'dareu.png', 'dareu'),
(18, 'Akko', 'akko.png', 'akko'),
(19, 'HP', 'hp.png', 'hp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_number` int(11) NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_number`, `user_email`, `user_password`, `user_address`) VALUES
(3, 'Phan The Bao', 357432472, 'bao@gmail.com', 'd266f2f31cf903c870027659030e967e', 'Ben Tre');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`hoadon_id`,`id_sp`),
  ADD KEY `fk_cthd_mahh` (`id_sp`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`hoadon_id`),
  ADD KEY `fk_hoadon_kh` (`user_id`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`id_loai`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`);

--
-- Chỉ mục cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`id_thuonghieu`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `hoadon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `id_loai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `id_thuonghieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_hoadon_kh` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
