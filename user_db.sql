-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2024 at 04:01 AM
-- Server version: 10.4.28-MariaDB-log
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `extnumber` varchar(50) NOT NULL,
  `intnumber` varchar(50) NOT NULL,
  `postalcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `username`, `street`, `extnumber`, `intnumber`, `postalcode`) VALUES
(1, 'bubu', 'Lucas', '2323', '01', '43532'),
(4, 'yaza02', 'San Mateo', '8934', '07', '12312'),
(5, 'rosa', 'Lopez', '3456', '02', '34343');

-- --------------------------------------------------------

--
-- Table structure for table `bitacora_prod`
--

CREATE TABLE `bitacora_prod` (
  `id` int(11) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `sentencia` varchar(256) NOT NULL,
  `contrasentencia` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bitacora_prod`
--

INSERT INTO `bitacora_prod` (`id`, `fecha`, `sentencia`, `contrasentencia`) VALUES
(1, '2023-12-04 21:43:18', 'INSERT INTO products (name, price, description) VALUES (\'Apple\', \'Manzanas rojas\', 200);', 'DELETE FROM products WHERE id = 1'),
(2, '2023-12-04 21:43:41', 'UPDATE products SET name = \'Apple\', price = 200, des = \'Manzanas Rojas\', quantity = 23 WHERE name = Apple;', 'DELETE FROM products WHERE id = 1'),
(3, '2023-12-04 21:43:55', 'DELETE FROM products WHERE name = Apple', 'INSERT FROM products WHERE id = 1'),
(4, '2023-12-04 21:44:26', 'INSERT INTO products (name, price, description) VALUES (\'1Kg Apples\', \'1 kilo de manzanas rojas\', 200);', 'DELETE FROM products WHERE id = 2'),
(5, '2023-12-04 21:45:15', 'INSERT INTO products (name, price, description) VALUES (\'1Kg Avocado\', \'1 Kilo de Aguacate\', 350);', 'DELETE FROM products WHERE id = 3'),
(6, '2023-12-04 21:46:08', 'INSERT INTO products (name, price, description) VALUES (\'1Kg Strawberry\', \'1 Kilo de Fresas\', 239);', 'DELETE FROM products WHERE id = 4'),
(7, '2023-12-04 21:59:50', 'UPDATE products SET name = \'1Kg Apples\', price = 200, des = \'1 kilo de manzanas rojas\', quantity = 22 WHERE name = 1Kg Apples;', 'DELETE FROM products WHERE id = 2'),
(8, '2023-12-04 21:59:50', 'UPDATE products SET name = \'1Kg Avocado\', price = 350, des = \'1 Kilo de Aguacate\', quantity = 21 WHERE name = 1Kg Avocado;', 'DELETE FROM products WHERE id = 3'),
(9, '2023-12-04 21:59:50', 'UPDATE products SET name = \'1Kg Strawberry\', price = 239, des = \'1 Kilo de Fresas\', quantity = 20 WHERE name = 1Kg Strawberry;', 'DELETE FROM products WHERE id = 4'),
(10, '2023-12-04 22:00:30', 'UPDATE products SET name = \'1Kg Apples\', price = 200, des = \'1 kilo de manzanas rojas\', quantity = 20 WHERE name = 1Kg Apples;', 'DELETE FROM products WHERE id = 2'),
(11, '2023-12-04 22:00:30', 'UPDATE products SET name = \'1Kg Avocado\', price = 350, des = \'1 Kilo de Aguacate\', quantity = 19 WHERE name = 1Kg Avocado;', 'DELETE FROM products WHERE id = 3'),
(12, '2023-12-04 22:00:58', 'UPDATE products SET name = \'1Kg Strawberry\', price = 239, des = \'1 Kilo de Fresas\', quantity = 19 WHERE name = 1Kg Strawberry;', 'DELETE FROM products WHERE id = 4'),
(13, '2023-12-04 22:01:15', 'UPDATE products SET name = \'1Kg Apples\', price = 200, des = \'1 kilo de manzanas rojas\', quantity = 19 WHERE name = 1Kg Apples;', 'DELETE FROM products WHERE id = 2'),
(14, '2023-12-04 22:01:15', 'UPDATE products SET name = \'1Kg Avocado\', price = 350, des = \'1 Kilo de Aguacate\', quantity = 18 WHERE name = 1Kg Avocado;', 'DELETE FROM products WHERE id = 3'),
(15, '2023-12-04 22:01:15', 'UPDATE products SET name = \'1Kg Strawberry\', price = 239, des = \'1 Kilo de Fresas\', quantity = 18 WHERE name = 1Kg Strawberry;', 'DELETE FROM products WHERE id = 4'),
(16, '2023-12-04 22:02:19', 'UPDATE products SET name = \'1Kg Apples\', price = 200, des = \'1 kilo de manzanas rojas\', quantity = 14 WHERE name = 1Kg Apples;', 'DELETE FROM products WHERE id = 2'),
(17, '2023-12-04 22:02:19', 'UPDATE products SET name = \'1Kg Avocado\', price = 350, des = \'1 Kilo de Aguacate\', quantity = 10 WHERE name = 1Kg Avocado;', 'DELETE FROM products WHERE id = 3'),
(18, '2023-12-04 22:02:19', 'UPDATE products SET name = \'1Kg Strawberry\', price = 239, des = \'1 Kilo de Fresas\', quantity = 10 WHERE name = 1Kg Strawberry;', 'DELETE FROM products WHERE id = 4'),
(19, '2023-12-04 22:05:21', 'UPDATE products SET name = \'1Kg Apples\', price = 200, des = \'1 kilo de manzanas rojas\', quantity = 10 WHERE name = 1Kg Apples;', 'DELETE FROM products WHERE id = 2'),
(20, '2023-12-04 22:05:21', 'UPDATE products SET name = \'1Kg Avocado\', price = 350, des = \'1 Kilo de Aguacate\', quantity = 9 WHERE name = 1Kg Avocado;', 'DELETE FROM products WHERE id = 3'),
(21, '2023-12-04 22:05:21', 'UPDATE products SET name = \'1Kg Strawberry\', price = 239, des = \'1 Kilo de Fresas\', quantity = 9 WHERE name = 1Kg Strawberry;', 'DELETE FROM products WHERE id = 4'),
(22, '2023-12-04 22:07:09', 'UPDATE products SET name = \'1Kg Apples\', price = 200, des = \'1 kilo de manzanas rojas\', quantity = 9 WHERE name = 1Kg Apples;', 'DELETE FROM products WHERE id = 2'),
(23, '2023-12-04 22:07:09', 'UPDATE products SET name = \'1Kg Avocado\', price = 350, des = \'1 Kilo de Aguacate\', quantity = 7 WHERE name = 1Kg Avocado;', 'DELETE FROM products WHERE id = 3'),
(24, '2023-12-04 22:07:09', 'UPDATE products SET name = \'1Kg Strawberry\', price = 239, des = \'1 Kilo de Fresas\', quantity = 8 WHERE name = 1Kg Strawberry;', 'DELETE FROM products WHERE id = 4'),
(25, '2023-12-04 22:12:19', 'UPDATE products SET name = \'1Kg Avocado\', price = 350, des = \'1 Kilo de Aguacate\', quantity = 6 WHERE name = 1Kg Avocado;', 'DELETE FROM products WHERE id = 3'),
(26, '2023-12-04 22:12:19', 'UPDATE products SET name = \'1Kg Apples\', price = 200, des = \'1 kilo de manzanas rojas\', quantity = 8 WHERE name = 1Kg Apples;', 'DELETE FROM products WHERE id = 2'),
(27, '2023-12-04 22:13:01', 'UPDATE products SET name = \'1Kg Apples\', price = 200, des = \'1 kilo de manzanas rojas\', quantity = 7 WHERE name = 1Kg Apples;', 'DELETE FROM products WHERE id = 2'),
(28, '2023-12-04 22:13:01', 'UPDATE products SET name = \'1Kg Avocado\', price = 350, des = \'1 Kilo de Aguacate\', quantity = 5 WHERE name = 1Kg Avocado;', 'DELETE FROM products WHERE id = 3'),
(29, '2023-12-04 22:15:33', 'INSERT INTO user_form (name, username, email, password, user_type) VALUES (\'Ramon\', \'monchuy\',\'charritos33@hotmail.com\',\'1234\',\'user);', 'DELETE FROM user_form WHERE id = 11'),
(30, '2023-12-04 22:21:05', 'DELETE FROM user_form WHERE name = Ramon', 'INSERT INTO user_form (name, username, email, password, user_type) VALUES (\'Ramon\', \'monchuy\',\'charritos33@hotmail.com\',\'1234\',\'user);'),
(31, '2023-12-04 22:21:11', 'DELETE FROM user_form WHERE name = Yazael', 'INSERT INTO user_form (name, username, email, password, user_type) VALUES (\'Yazael\', \'bubusaurio\',\'bubusaurio@gmail.com\',\'123\',\'user);'),
(32, '2023-12-04 22:21:24', 'DELETE FROM user_form WHERE name = Jose', 'INSERT INTO user_form (name, username, email, password, user_type) VALUES (\'Jose\', \'jose2\',\'dsad@gmail.com\',\'dsad\',\'user);'),
(33, '2023-12-04 22:21:30', 'DELETE FROM user_form WHERE name = Yaza', 'INSERT INTO user_form (name, username, email, password, user_type) VALUES (\'Yaza\', \'peter\',\'charritos67@hotmail.com\',\'12345\',\'admin);'),
(34, '2023-12-04 22:22:20', 'INSERT INTO user_form (name, username, email, password, user_type) VALUES (\'Yazael\', \'yaza02\',\'charritos33@hotmail.com\',\'1234\',\'user);', 'DELETE FROM user_form WHERE id = 12'),
(35, '2023-12-04 22:27:28', 'DELETE FROM user_form WHERE name = Yazael', 'INSERT INTO user_form (name, username, email, password, user_type) VALUES (\'Yazael\', \'yaza02\',\'charritos33@hotmail.com\',\'1234\',\'user);'),
(36, '2023-12-04 22:28:00', 'INSERT INTO user_form (name, username, email, password, user_type) VALUES (\'Yazael\', \'yaza02\',\'charritos33@hotmail.com\',\'123\',\'user);', 'DELETE FROM user_form WHERE id = 13'),
(37, '2023-12-04 22:28:20', 'UPDATE products SET name = \'1Kg Apples\', price = 200, des = \'1 kilo de manzanas rojas\', quantity = 6 WHERE name = 1Kg Apples;', 'DELETE FROM products WHERE id = 2'),
(38, '2023-12-04 22:28:20', 'UPDATE products SET name = \'1Kg Strawberry\', price = 239, des = \'1 Kilo de Fresas\', quantity = 6 WHERE name = 1Kg Strawberry;', 'DELETE FROM products WHERE id = 4'),
(39, '2023-12-04 22:28:20', 'UPDATE products SET name = \'1Kg Avocado\', price = 350, des = \'1 Kilo de Aguacate\', quantity = 4 WHERE name = 1Kg Avocado;', 'DELETE FROM products WHERE id = 3'),
(40, '2023-12-04 22:30:20', 'UPDATE products SET name = \'1Kg Avocado\', price = 350, des = \'1 Kilo de Aguacate\', quantity = 3 WHERE name = 1Kg Avocado;', 'DELETE FROM products WHERE id = 3'),
(41, '2023-12-04 22:30:20', 'UPDATE products SET name = \'1Kg Apples\', price = 200, des = \'1 kilo de manzanas rojas\', quantity = 5 WHERE name = 1Kg Apples;', 'DELETE FROM products WHERE id = 2'),
(42, '2023-12-04 22:31:39', 'UPDATE products SET name = \'1Kg Avocado\', price = 350, des = \'1 Kilo de Aguacate\', quantity = 2 WHERE name = 1Kg Avocado;', 'DELETE FROM products WHERE id = 3'),
(43, '2023-12-04 22:31:39', 'UPDATE products SET name = \'1Kg Apples\', price = 200, des = \'1 kilo de manzanas rojas\', quantity = 4 WHERE name = 1Kg Apples;', 'DELETE FROM products WHERE id = 2'),
(44, '2023-12-04 22:39:58', 'UPDATE products SET name = \'1Kg Avocado\', price = 350, des = \'1 Kilo de Aguacate\', quantity = 0 WHERE name = 1Kg Avocado;', 'DELETE FROM products WHERE id = 3'),
(45, '2023-12-04 22:40:40', 'UPDATE products SET name = \'1Kg Avocado\', price = 350, des = \'1 Kilo de Aguacate\', quantity = -3 WHERE name = 1Kg Avocado;', 'DELETE FROM products WHERE id = 3'),
(46, '2023-12-04 22:41:33', 'UPDATE products SET name = \'1Kg Avocado\', price = 350, des = \'1 Kilo de Aguacate\', quantity = 1 WHERE name = 1Kg Avocado;', 'DELETE FROM products WHERE id = 3'),
(47, '2023-12-04 22:42:42', 'UPDATE products SET name = \'1Kg Avocado\', price = 350, des = \'1 Kilo de Aguacate\', quantity = 7 WHERE name = 1Kg Avocado;', 'DELETE FROM products WHERE id = 3'),
(48, '2023-12-04 22:42:47', 'UPDATE products SET name = \'1Kg Avocado\', price = 350, des = \'1 Kilo de Aguacate\', quantity = 4 WHERE name = 1Kg Avocado;', 'DELETE FROM products WHERE id = 3'),
(49, '2023-12-04 23:10:10', 'UPDATE products SET name = \'1Kg Avocado\', price = 350, des = \'1 Kilo de Aguacate\', quantity = 3 WHERE name = 1Kg Avocado;', 'DELETE FROM products WHERE id = 3'),
(50, '2023-12-04 23:10:10', 'UPDATE products SET name = \'1Kg Strawberry\', price = 239, des = \'1 Kilo de Fresas\', quantity = 5 WHERE name = 1Kg Strawberry;', 'DELETE FROM products WHERE id = 4'),
(51, '2023-12-04 23:11:16', 'UPDATE products SET name = \'1Kg Avocado\', price = 350, des = \'1 Kilo de Aguacate\', quantity = 2 WHERE name = 1Kg Avocado;', 'DELETE FROM products WHERE id = 3'),
(52, '2023-12-04 23:11:16', 'UPDATE products SET name = \'1Kg Strawberry\', price = 239, des = \'1 Kilo de Fresas\', quantity = 4 WHERE name = 1Kg Strawberry;', 'DELETE FROM products WHERE id = 4'),
(53, '2023-12-04 23:45:50', 'UPDATE products SET name = \'1Kg Strawberry\', price = 239, des = \'1 Kilo de Fresas\', quantity = 3 WHERE name = 1Kg Strawberry;', 'DELETE FROM products WHERE id = 4'),
(54, '2023-12-06 12:07:01', 'INSERT INTO products (name, price, description) VALUES (\'1Kg Watermelon\', \'Sandia\', 560);', 'DELETE FROM products WHERE id = 5'),
(55, '2023-12-06 12:07:48', 'UPDATE products SET name = \'1Kg Apples\', price = 200, des = \'1 kilo de manzanas rojas\', quantity = 3 WHERE name = 1Kg Apples;', 'DELETE FROM products WHERE id = 2'),
(56, '2023-12-06 12:07:48', 'UPDATE products SET name = \'1Kg Avocado\', price = 350, des = \'1 Kilo de Aguacate\', quantity = 1 WHERE name = 1Kg Avocado;', 'DELETE FROM products WHERE id = 3'),
(57, '2023-12-06 12:07:48', 'UPDATE products SET name = \'1Kg Watermelon\', price = 560, des = \'Sandia\', quantity = 13 WHERE name = 1Kg Watermelon;', 'DELETE FROM products WHERE id = 5'),
(58, '2023-12-06 12:11:10', 'UPDATE products SET name = \'1Kg Avocado\', price = 350, des = \'1 Kilo de Fresas\', quantity = 12 WHERE name = 1Kg Avocado;', 'DELETE FROM products WHERE id = 3'),
(59, '2023-12-06 12:14:17', 'DELETE FROM user_form WHERE name = Yazael', 'INSERT INTO user_form (name, username, email, password, user_type) VALUES (\'Yazael\', \'yaza02\',\'charritos33@hotmail.com\',\'123\',\'user);'),
(60, '2023-12-06 12:15:10', 'INSERT INTO user_form (name, username, email, password, user_type) VALUES (\'Yazael\', \'yaza02\',\'charritos33@hotmail.com\',\'1234\',\'user);', 'DELETE FROM user_form WHERE id = 14'),
(61, '2023-12-06 13:04:40', 'INSERT INTO user_form (name, username, email, password, user_type) VALUES (\'Rosa\', \'rosa\',\'rsantana@ceti.mx\',\'1234\',\'user);', 'DELETE FROM user_form WHERE id = 15'),
(62, '2023-12-06 13:05:54', 'INSERT INTO products (name, price, description) VALUES (\'1Kg Carrot\', \'1 Kilo de Zanahoria\', 199);', 'DELETE FROM products WHERE id = 6'),
(63, '2023-12-06 13:06:39', 'UPDATE products SET name = \'1Kg Apples\', price = 250, des = \'1 kilo de manzanas rojas\', quantity = 9 WHERE name = 1Kg Apples;', 'DELETE FROM products WHERE id = 2'),
(64, '2023-12-06 13:06:55', 'DELETE FROM products WHERE name = 1Kg Watermelon', 'INSERT FROM products WHERE id = 5'),
(65, '2023-12-06 13:07:34', 'UPDATE products SET name = \'1Kg Strawberry\', price = 239, des = \'1 Kilo de Fresas\', quantity = 1 WHERE name = 1Kg Strawberry;', 'DELETE FROM products WHERE id = 4'),
(66, '2023-12-06 13:07:34', 'UPDATE products SET name = \'1Kg Avocado\', price = 350, des = \'1 Kilo de Fresas\', quantity = 10 WHERE name = 1Kg Avocado;', 'DELETE FROM products WHERE id = 3'),
(67, '2023-12-06 13:07:34', 'UPDATE products SET name = \'1Kg Apples\', price = 250, des = \'1 kilo de manzanas rojas\', quantity = 8 WHERE name = 1Kg Apples;', 'DELETE FROM products WHERE id = 2'),
(68, '2023-12-06 14:18:22', 'INSERT INTO products (name, price, description) VALUES (\'jicama\', \'1 kilo jicama\', 200);', 'DELETE FROM products WHERE id = 7'),
(69, '2023-12-06 14:19:12', 'UPDATE products SET name = \'fresa\', price = 200, des = \'1 kilo jicama\', quantity = 19 WHERE name = fresa;', 'DELETE FROM products WHERE id = 7'),
(70, '2023-12-06 14:19:42', 'DELETE FROM products WHERE name = fresa', 'INSERT FROM products WHERE id = 7'),
(71, '2023-12-07 22:47:31', 'INSERT INTO products (name, price, description) VALUES (\'Platano\', \'1 Kilo Platano\', 250);', 'DELETE FROM products WHERE id = 8');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `name`, `status`) VALUES
(1, 'FedEx', 'Delivering to Mateo#2210');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `quantity`, `image`) VALUES
(2, '1Kg Apples', '250', '1 kilo de manzanas rojas', '8', './img/apple.png'),
(3, '1Kg Avocado', '350', '1 Kilo de Fresas', '10', './img/avocado.png'),
(4, '1Kg Strawberry', '239', '1 Kilo de Fresas', '1', './img/strawberry.png'),
(6, '1Kg Carrot', '199', '1 Kilo de Zanahoria', '34', './img/carrot.png'),
(8, 'Platano', '250', '1 Kilo Platano', '34', '');

--
-- Triggers `products`
--
DELIMITER $$
CREATE TRIGGER `bitacoraDeleteProd` AFTER DELETE ON `products` FOR EACH ROW BEGIN
            INSERT INTO bitacora_prod(fecha, sentencia, contrasentencia)
            VALUES (NOW(), 
                    CONCAT('DELETE FROM products WHERE name = ', OLD.name),
                    CONCAT('INSERT FROM products WHERE id = ', OLD.id)
            );
                IF ROW_COUNT() = 0 THEN
                    SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'Error: El trigger no insertó en bitacora_prod';
                END IF;
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bitacoraInsertProd` AFTER INSERT ON `products` FOR EACH ROW BEGIN
            INSERT INTO bitacora_prod(fecha, sentencia, contrasentencia)
            VALUES (NOW(), 
                    CONCAT('INSERT INTO products (name, price, description) VALUES (''', NEW.name, ''', ''', NEW.description, ''', ', NEW.price, ');'),
                    CONCAT('DELETE FROM products WHERE id = ', NEW.id)
            );
                IF ROW_COUNT() = 0 THEN
                    SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'Error: El trigger no insertó en bitacora_prod';
                END IF;
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bitacoraUpdateProd` AFTER UPDATE ON `products` FOR EACH ROW BEGIN
            INSERT INTO bitacora_prod(fecha, sentencia, contrasentencia)
            VALUES (NOW(), 
                    CONCAT('UPDATE products SET name = ''', NEW.name, ''', price = ', NEW.price, ', des = ''', NEW.description, ''', quantity = ', NEW.Quantity, ' WHERE name = ', NEW.name, ';'),
                    CONCAT('DELETE FROM products WHERE id = ', NEW.id)
            );
                IF ROW_COUNT() = 0 THEN
                    SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'Error: El trigger no insertó en bitacora_prod';
                END IF;
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `username`, `email`, `password`, `user_type`) VALUES
(1, 'Pedro', 'bubu', 'pmercadoruano@gmail.com', '1234', 'admin'),
(4, 'Rosa', 'rosa', 'rsantana@ceti.mx', '123', 'user'),
(14, 'Yazael', 'yaza02', 'charritos33@hotmail.com', '1234', 'user'),
(15, 'Rosa', 'rosa', 'rsantana@ceti.mx', '1234', 'user');

--
-- Triggers `user_form`
--
DELIMITER $$
CREATE TRIGGER `afterUpdateUser` AFTER UPDATE ON `user_form` FOR EACH ROW BEGIN
            INSERT INTO bitacora_prod(fecha, sentencia, contrasentencia)
            VALUES (NOW(), 
                    CONCAT('UPDATE user_form SET name = ''', NEW.name, ''', username = ', NEW.username, ', email = ''', NEW.email, ''', password = ', NEW.password, ' WHERE name = ', NEW.name, ';'),
                    CONCAT('DELETE FROM user_form WHERE id = ', NEW.id)
            );
                IF ROW_COUNT() = 0 THEN
                    SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'Error: El trigger no insertó en bitacora_prod';
                END IF;
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `afterUserDelete` AFTER DELETE ON `user_form` FOR EACH ROW BEGIN
            INSERT INTO bitacora_prod(fecha, sentencia, contrasentencia)
            VALUES (NOW(), 
                    CONCAT('DELETE FROM user_form WHERE name = ', OLD.name),
                    CONCAT('INSERT INTO user_form (name, username, email, password, user_type) VALUES (''', OLD.name, ''', ''', OLD.username, ''',''', OLD.email, ''',''', OLD.password, ''',''', OLD.user_type,');')
            );
                IF ROW_COUNT() = 0 THEN
                    SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'Error: El trigger no insertó en bitacora_prod';
                END IF;
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `afterUserInsert` AFTER INSERT ON `user_form` FOR EACH ROW BEGIN
            INSERT INTO bitacora_prod(fecha, sentencia, contrasentencia)
            VALUES (NOW(), 
                    CONCAT('INSERT INTO user_form (name, username, email, password, user_type) VALUES (''', NEW.name, ''', ''', NEW.username, ''',''', NEW.email, ''',''', NEW.password, ''',''', NEW.user_type,');'),
                    CONCAT('DELETE FROM user_form WHERE id = ', NEW.id)
            );
                IF ROW_COUNT() = 0 THEN
                    SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'Error: El trigger no insertó en bitacora_prod';
                END IF;
            END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bitacora_prod`
--
ALTER TABLE `bitacora_prod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bitacora_prod`
--
ALTER TABLE `bitacora_prod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
