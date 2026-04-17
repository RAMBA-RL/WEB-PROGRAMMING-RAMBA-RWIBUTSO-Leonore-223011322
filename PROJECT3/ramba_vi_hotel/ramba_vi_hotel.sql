-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 17, 2026 at 01:36 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ramba_vi_hotel`
--

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `full_name`, `role`, `created_at`) VALUES
(1, 'admin', 'admin123@', 'Administrator', 'admin', '2026-04-12 07:59:55');

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `full_name`, `email`, `phone`, `menu_item`, `address`, `order_date`, `status`, `created_at`) VALUES
(1, 'Jean Habimana', 'jean@gmail.com', '+250788111222', 'Fried Tilapia', 'Kigali, Nyarugenge', '2024-12-01', 'Confirmed', '2026-04-12 07:59:55'),
(2, 'Marie Uwase', 'marie@gmail.com', '+250722333444', 'Beef Brochettes', 'Kigali, Gasabo', '2024-12-02', 'Delivered', '2026-04-12 07:59:55'),
(3, 'Emmanuel Ntwali', 'emma@gmail.com', '+250738555666', 'Passion Fruit Juice', 'Kigali, Kicukiro', '2024-12-03', 'Pending', '2026-04-12 07:59:55');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
