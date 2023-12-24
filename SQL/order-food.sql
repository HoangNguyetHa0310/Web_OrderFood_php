-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2023 at 06:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `order-food`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(24, 'admin', 'hoangyh2712@gmail.com', '123'),
(25, 'Phương', 'Phương xinh gái đáng yêu cute hột me', '12321'),
(27, 'admin', 'hoangadmin', '123'),
(28, '123', '123', '123'),
(31, 'asdmin', 'asdmin', '123'),
(32, 'admin', 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `image_name` varchar(50) NOT NULL,
  `featured` varchar(50) NOT NULL,
  `active` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(31, 'Bánh Mỳ ', 'Food_category_911.jpg', 'Yes', 'Yes'),
(32, 'Thịt Lợn ', 'Food_category_582.jpg', 'Yes', 'Yes'),
(33, 'Gạo ', 'Food_category_480.jpg', 'Yes', 'Yes'),
(34, 'Nước', 'Food_category_672.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `image_name` varchar(50) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(50) NOT NULL,
  `active` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(31, 'Bánh Mỳ ', 'Bánh Mỳ ngon bổ rẻ , ', 12000, 'food-name-7840.jpg', 31, 'No', 'Yes'),
(32, 'Bánh Mỳ trứng bò khô ', 'Bánh Mỳ trứng bò khô , ngon đậm vik , tuyệt vời ', 150000, 'food-name-3717.jpg', 32, 'No', 'Yes'),
(33, 'Cơm Rang ', 'Cơm ngon dẻo ', 10000, 'food-name-2640.jpg', 32, 'No', 'Yes'),
(34, 'Thịt kho tàu ', 'Thơm ngon bỏ rẻ ', 500000, 'food-name-7295.jpg', 31, 'No', 'Yes'),
(35, 'sting', 'thơm ngon mát lạnh ', 10000, 'food-name-8698.jpg', 34, 'No', 'Yes'),
(36, 'Nước Lọc ', 'Tuyệt , mát , lạnh ', 10000, 'food-name-3027.jpg', 33, 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(50) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_contact` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Bánh Mỳ ', 12000.00, 3, 36000.00, '2023-12-23 08:08:14', 'Cancelled', 'Hoàng Hạ', '0123456789', 'phuong@gmail.com', '  xóm 12 xuân phú xuân trường nam định  '),
(2, 'Thịt kho tàu ', 500000.00, 3, 1500000.00, '2023-12-23 16:06:13', 'Delivering', 'Hoàng Phan', '0123456789', 'hoang@gmail.com', '   my dinh , ha noi , viet nam   '),
(3, 'Cơm Rang ', 10000.00, 2, 20000.00, '2023-12-23 16:07:04', 'Ordered', 'Hoàng Hạ', '012345678', 'trang@gmail.com', 'xóm 12 xuân phú xuân trường nam định'),
(4, 'Bánh Mỳ trứng bò khô ', 150000.00, 2, 300000.00, '2023-12-23 16:07:43', 'Delivered', 'Hoàng Phan', '0123456789', 'z3murad3z@gmail.com', ' my dinh , ha noi , viet nam '),
(5, 'Cơm Rang ', 10000.00, 3, 30000.00, '2023-12-23 16:55:57', 'Cancelled', 'Hoàng Hạ', '0123456789', 'trang@gmail.com', '  xóm 12 xuân phú xuân trường nam định viet name '),
(6, 'Bánh Mỳ ', 12000.00, 3, 36000.00, '2023-12-23 18:25:26', 'Ordered', 'Phan Văn Hoàng ', '0123456789', 'hoangyh2712@gmail.com', '    xóm 12 xuân phú xuân trường nam định    ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
