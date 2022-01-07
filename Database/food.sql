-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2021 at 08:07 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user` varchar(30) DEFAULT NULL,
  `food` varchar(30) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `photo` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user`, `food`, `price`, `photo`) VALUES
('Rabbi', 'Romana Pizza', 1050, 'upload/romana_1584707911.png'),
('Parvez', 'Mimosa', 1050, 'upload/pas_1582636939.jpg'),
('Rabbi', 'Cherry Custard Cake', 500, 'upload/ds3_1582637673.jpg'),
('Parvez', 'Rocket Burgers', 750, 'upload/4_1586195037.png'),
('Parvez', 'Fruit Pizza', 860, 'upload/fruit-pizza11-srgb.1_1584700097.jpg'),
('sakibulislam', 'Cheese burger ', 950, 'upload/br10_1582637958.jpg'),
('Mehedi', 'Cheese Caprese Pizza', 1150, 'upload/caprese-pizza_6_1585464522.jpg'),
('Mehedi', 'Pasta e Fagioli Soup', 520, 'upload/pasta-fagioli-6-768x1152_1584700293.jpg'),
('Sakib', 'Romana Pizza', 1050, 'upload/romana_1584707911.png'),
('sakibulislam', 'American Harvest Salad', 350, 'upload/sa3_1582638530.jpg'),
('Mehedi', 'Romana Pizza', 1050, 'upload/romana_1584707911.png'),
('Sakib', 'Hawaiian BBQ Pizza', 1200, 'upload/Hawaiian-BBQ-Pizza_1590812985.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `catname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `catname`) VALUES
(9, 'Pizza'),
(10, 'Pasta'),
(11, 'Salad'),
(12, 'Dessert'),
(13, 'Burger'),
(15, 'Beverage'),
(16, 'Noodles'),
(17, 'Pitha');

-- --------------------------------------------------------

--
-- Table structure for table `postcomment`
--

CREATE TABLE `postcomment` (
  `comment_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `user_image` varchar(300) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postcomment`
--

INSERT INTO `postcomment` (`comment_id`, `username`, `post_id`, `comment`, `user_image`, `date`) VALUES
(9, 'Sakib', 1, 'Best item at best price', 'images/IMG_20190527_150037_1586182308_1596386367.jpg', 'Aug 09, 2020'),
(16, 'Mehedi', 1, 'I like this item', 'images/mehedi_1585213497_1585411782.jpg', 'Aug 09, 2020');

-- --------------------------------------------------------

--
-- Table structure for table `postnews`
--

CREATE TABLE `postnews` (
  `postid` int(11) NOT NULL,
  `food` varchar(150) NOT NULL,
  `title` varchar(300) NOT NULL,
  `news` varchar(1500) NOT NULL,
  `image` varchar(200) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postnews`
--

INSERT INTO `postnews` (`postid`, `food`, `title`, `news`, `image`, `date`) VALUES
(1, 'Cheese burger ', 'New cheese burger available', 'The most exciting cheese-burger is available now. This item added recently. You can order this food from your area at any time. Share this news with your friends and family. Enjoy our different types of food.', 'upload/br10_1582637958_1596964233.jpg', 'Aug 09, 2020'),
(3, 'Mimosa', 'The secret of the perfect italian pasta', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae optio nulla tempore, numquam officiis harum doloribus facilis amet sint tempora! Animi cumque nulla quisquam odio obcaecati ipsum, alias tempora excepturi tenetur ducimus, rem corrupti delectus iure nam soluta placeat minus, neque vel quos. Quaerat quasi, omnis illum ullam delectus eaque maiores ab. Cupiditate maxime voluptates delectus vero voluptatum ut dolores molestias eligendi nihil nam, ea doloremque? Labore nostrum deleniti rerum sequi vero cumque quasi provident, maiores doloribus quae voluptate placeat animi nihil quis molestiae tenetur ea recusandae, omnis beatae accusamus odit. Error doloribus nihil minus aspernatur autem eum reprehenderit vel rem consectetur quam quisquam exercitationem, velit excepturi sint adipisci eaque quos sed ratione eos dolorem magnam? ', 'upload/pas_1582636939_1596967590.jpg', 'Aug 09, 2020');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `categoryid` int(1) NOT NULL,
  `categoryname` varchar(30) DEFAULT NULL,
  `productname` varchar(30) NOT NULL,
  `price` double NOT NULL,
  `offer_title` varchar(150) DEFAULT NULL,
  `offer` int(11) DEFAULT NULL,
  `photo` varchar(150) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `categoryid`, `categoryname`, `productname`, `price`, `offer_title`, `offer`, `photo`, `quantity`) VALUES
(25, 9, 'Pizza', 'Pizza Margherita x', 1350, 'Boishakhi Discount', 15, 'upload/pizza-margarita_1584773081.jpg', 85),
(26, 10, 'Pasta', 'Italian pasta', 1500, NULL, NULL, 'upload/Italian-Sausage-Pasta-Image-5-735x986_1585465616.jpg', 45),
(28, 9, 'Pizza', 'Hawaiian BBQ Pizza', 1200, '', 0, 'upload/Hawaiian-BBQ-Pizza_1590812985.jpg', 650),
(32, 9, 'Pizza', 'Romana Pizza', 1050, NULL, NULL, 'upload/romana_1584707911.png', 0),
(33, 9, 'Pizza', 'Pizza Prosciuto', 950, NULL, 0, 'upload/baked-pepperoni-pizza-774487_1595256530.jpg', 85),
(34, 9, 'Pizza', 'Prosciutto e Funghi', 1350, NULL, NULL, 'upload/Prosciutto e Funghi_1582636293.jpg', 46),
(35, 9, 'Pizza', 'Parmigiana', 1950, NULL, NULL, 'upload/Parmigiana_1582636510.png', 78),
(36, 10, 'Pasta', 'Italian Sausage Pasta', 650, NULL, NULL, 'upload/Italian-Sausage-Pasta-Recipe-One-Pot_1585465479.jpg', 80),
(37, 10, 'Pasta', 'Mimosa', 1050, NULL, NULL, 'upload/pas_1582636939.jpg', 56),
(38, 10, 'Pasta', 'Bufalina', 1200, NULL, NULL, 'upload/classic-italian-pasta-salad-recipe-4-of-6_1585465280.jpg', 81),
(39, 10, 'Pasta', 'Padana', 1050, NULL, NULL, 'upload/pasta3_1582637021.jpg', 56),
(40, 13, 'Burger', 'Luger Burger', 950, NULL, 0, 'upload/ham-burger-with-vegetables-1639557_1595256813.jpg', 35),
(41, 13, 'Burger', 'Le Pigeon Burger', 1050, NULL, NULL, 'upload/bar3_1582637275.jpg', 54),
(42, 13, 'Burger', ' Double Animal Style', 1200, NULL, NULL, 'upload/bar4_1582637294.jpg', 92),
(44, 12, 'Dessert', 'Vanilla Cake', 150, NULL, 0, 'upload/ds3_1582637491.jpeg', 40),
(45, 12, 'Dessert', 'Cherry Custard Cake', 500, NULL, NULL, 'upload/ds3_1582637673.jpg', 41),
(46, 12, 'Dessert', 'Fruit-custard', 420, NULL, NULL, 'upload/ds4_1582637756.jpg', 24),
(47, 12, 'Dessert', 'Chocolate Ice Cream', 350, NULL, NULL, 'upload/ds5_1582637847.jpeg', 43),
(48, 13, 'Burger', 'Cheese burger ', 950, NULL, 10, 'upload/br10_1582637958.jpg', 143),
(49, 11, 'Salad', 'Italian Garden Salad', 250, NULL, NULL, 'upload/sa5_1582638488.jpg', 53),
(50, 11, 'Salad', 'American Harvest Salad', 350, NULL, 0, 'upload/sa3_1582638530.jpg', 52),
(51, 11, 'Salad', 'Asian-style chopped salad', 320, NULL, NULL, 'upload/sa_1582638654.jpeg', 57),
(68, 9, 'Pizza', 'Greek Chicken Pizza', 970, NULL, NULL, 'upload/Chicken-Pizza_exps30800_FM143298B03_11_8bC_RMS_1590812794.jpg', 69),
(69, 9, 'Pizza', 'Pepperoni Pizza', 1020, NULL, NULL, 'upload/pepperoni-pizza3+srgb._1584699903.jpg', 94),
(70, 9, 'Pizza', 'Cheese Caprese Pizza', 1150, NULL, 0, 'upload/caprese-pizza_6_1585464522.jpg', 65),
(71, 9, 'Pizza', 'Fruit Pizza', 860, NULL, 0, 'upload/fruit-pizza11-srgb.1_1584700097.jpg', 67),
(72, 10, 'Pasta', 'Pasta e Fagioli Soup', 520, NULL, NULL, 'upload/pasta-fagioli-6-768x1152_1584700293.jpg', 48),
(73, 10, 'Pasta', 'Grilled Chicken Caprese', 950, NULL, NULL, 'upload/chicken+caprese+pasta3_1585465737.jpg', 41),
(74, 13, 'Burger', 'Turkey Burgers', 350, NULL, NULL, 'upload/turkey-burger-12-768x1152_1584700501.jpg', 48),
(94, 13, 'Burger', 'Smokin Burger', 670, NULL, NULL, 'upload/3_1586194915.png', 43),
(95, 13, 'Burger', 'Rocket Burgers', 750, NULL, NULL, 'upload/4_1586195037.png', 57),
(96, 13, 'Burger', 'Bull Burgers', 450, NULL, NULL, 'upload/5_1586195064.png', 67),
(97, 13, 'Burger', 'Crackles Burger', 550, NULL, NULL, 'upload/6_1586195125.png', 70),
(104, 15, 'Beverage', '7up 250ml Lemon', 30, NULL, NULL, 'upload/41dw10tLxML._SX466__1592754238.jpg', 300),
(105, 15, 'Beverage', '7up 500ml Lemon', 45, NULL, NULL, 'upload/7up-500ml_1592754595.jpg', 120),
(106, 15, 'Beverage', '7up 1L Lemon', 75, NULL, NULL, 'upload/24122019.1577201359.SNCPSG10.obj.0.1.jpg.oe.jpg.pf.jpg.1350nowm.jpg.1350x_1592755111.jpg', 148),
(107, 15, 'Beverage', '7up 2L Lemon', 130, NULL, NULL, 'upload/7up-local-2L-500x500_1592755418.jpg', 78),
(108, 15, 'Beverage', 'Coca-Cola 400ml', 30, NULL, NULL, 'upload/0169979_coca-cola-pet-400ml_550_1592755616.jpeg', 200),
(109, 15, 'Beverage', 'Coca-Cola 1.25L', 75, NULL, NULL, 'upload/5da6cfa27abe4_1592755893.jpg', 156),
(110, 15, 'Beverage', 'Coca-Cola 2L ', 125, NULL, NULL, 'upload/ac0d01be3269-2018-06-06_124436857751coca_cola_pet_2_ltr_1592756148.jpg', 195),
(111, 15, 'Beverage', 'Coca-Cola Zero 1L', 90, NULL, NULL, 'upload/0005138_coca-cola-zero-soft-drink-bottle-1l_1592756408.jpeg', 100),
(112, 15, 'Beverage', 'Sprite 500ml', 45, NULL, NULL, 'upload/f31169f357c3f8e06777a2c7f4bebcad_1592756789.jpg', 230),
(113, 15, 'Beverage', 'Sprite 1L', 75, NULL, NULL, 'upload/Imagem5_5e9855a6-c221-4e43-bb3a-33d544c2ed6a_2048x_1592756886.png', 220),
(114, 16, 'Noodles', 'Thai style Fried Noodles', 550, NULL, NULL, 'upload/e5e368ef2fa2b378c09dba257b843dff_1594732817.jpg', 240),
(115, 16, 'Noodles', 'Veggie Garlic Noodles', 250, NULL, NULL, 'upload/veggie-garlic-noodles-1-scaled_1594748831.jpg', 140),
(116, 16, 'Noodles', ' Chicken Ramen Noodle ', 450, NULL, 0, 'upload/Veggie-and-Chicken-Ramen-3_1594748919.webp', 143),
(117, 16, 'Noodles', 'Rice Noodle Bowl', 350, NULL, NULL, 'upload/noodles2_2000_1125_1594733602.jpg', 70);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseid` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `location` varchar(30) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `total` double NOT NULL,
  `date_purchase` datetime NOT NULL,
  `order_status` int(11) DEFAULT NULL,
  `delivery_status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchaseid`, `customer`, `location`, `contact`, `total`, `date_purchase`, `order_status`, `delivery_status`) VALUES
(92, 'Mehedi', 'Uttara,Dhaka', 1797007193, 3450, '2020-05-27 15:50:45', 1, NULL),
(93, 'Mehedi', 'Mirpur,Dhaka', 1797007193, 4080, '2020-05-27 16:10:24', 1, NULL),
(94, 'Mehedi', 'Mirpur 2', 1797007193, 8400, '2020-05-27 16:11:31', 1, NULL),
(95, 'Mehedi', 'Banani,Dhaka', 1797007193, 700, '2020-05-27 16:12:14', 1, NULL),
(96, 'Mehedi', 'Dhaka', 1797007193, 700, '2020-05-27 16:15:02', 1, NULL),
(97, 'Mehedi', 'Khulna', 1797007193, 15600, '2020-05-27 16:16:35', 1, NULL),
(98, 'Rabbi', 'Mirpur 10', 1945763423, 1000, '2020-05-27 16:20:38', 1, NULL),
(99, 'Rabbi', 'Dhaka', 1945763423, 1280, '2020-05-27 16:21:37', 1, NULL),
(100, 'sakibulislam', 'Mirpur 10', 1912653424, 3800, '2020-05-28 12:10:52', 1, NULL),
(101, 'Sakib', 'Mirpur 6', 1914603437, 3900, '2020-05-28 17:13:36', 1, NULL),
(102, 'Sakib', 'Mirpur 10', 1914603437, 7200, '2020-06-13 15:36:27', 1, NULL),
(103, 'Sakib', 'Mirpur', 1914603437, 2400, '2020-06-13 15:36:43', 1, NULL),
(104, 'Parvez', 'Kalkini,Madaripur', 1989765434, 2910, '2020-06-14 09:30:26', 1, NULL),
(105, 'Parvez', 'Mirpur', 1989765434, 2600, '2020-06-14 09:31:01', 1, NULL),
(106, 'sakibulislam', 'Dhanmondi,Dhaka', 1912653424, 1900, '2020-06-14 09:32:48', 1, NULL),
(107, 'sakibulislam', 'Dhanmondi,Dhaka', 1912653424, 2300, '2020-06-19 11:10:21', 1, NULL),
(111, 'Rabbi', 'Mirpur 6', 1945763423, 2000, '2020-06-19 16:20:50', 1, NULL),
(112, 'Rabbi', 'Mirpur 1', 1945763423, 700, '2020-06-19 16:21:36', 1, NULL),
(113, 'Sakib', 'Mirpur 1', 1914603437, 1900, '2020-06-21 12:03:44', 1, NULL),
(114, 'Sakib', 'Mirpur 6', 1914603437, 5160, '2020-06-21 12:04:00', 1, NULL),
(115, 'Sakib', 'Mirpur', 1914603437, 960, '2020-06-21 12:04:18', 1, NULL),
(116, 'Sakib', 'Kalkini,Madaripur', 1914603437, 300, '2020-06-21 12:04:32', 1, NULL),
(132, 'Sakib', 'Mirpur 13', 1914603437, 300, '2020-06-22 16:29:41', 1, NULL),
(133, 'Sakib', 'Dhanmondi,Dhaka', 1914603437, 260, '2020-06-22 16:42:57', 1, NULL),
(134, 'Sakib', 'Dhanmondi,Dhaka', 1914603437, 1040, '2020-06-24 22:19:20', 1, NULL),
(135, 'Sakib', 'Kalkini,Madaripur', 1914603437, 4800, '2020-06-26 15:45:32', 1, NULL),
(136, 'Mehedi', 'Mirpur 11', 1797007193, 8100, '2020-06-26 15:49:31', 1, NULL),
(137, 'Mehedi', 'Mirpur 6', 1797007193, 250, '2020-06-26 15:52:26', 1, NULL),
(138, 'Mehedi', 'Mirpur', 1797007193, 300, '2020-06-26 15:53:50', 1, NULL),
(139, 'Mehedi', 'Dhaka,Bangladesh', 1797007193, 1340, '2020-06-30 20:04:48', 1, NULL),
(140, 'Sakib', 'Mirpur', 1914603437, 4200, '2020-07-05 23:26:07', 1, NULL),
(141, 'Sakib', 'Mirpur', 1914603437, 3900, '2020-07-06 17:59:22', 1, NULL),
(142, 'Sakib', 'Mirpur', 1914603437, 3800, '2020-07-27 20:07:37', 1, NULL),
(143, 'Sakib', 'Mirpur', 1914603437, 2700, '2020-07-27 20:08:15', 1, NULL),
(144, 'Mehedi', 'Dhaka,Bangladesh', 1797007193, 2850, '2020-07-29 14:09:28', 1, NULL),
(145, 'Mehedi', 'Dhaka,Bangladesh', 1797007193, 7800, '2020-07-29 14:09:59', 1, NULL),
(146, 'Mehedi', 'Mirpur', 1797007193, 640, '2020-07-29 14:10:40', 1, NULL),
(147, 'Rabbi', 'Dhaka,Bangladesh', 1945763423, 5700, '2020-07-29 14:11:53', 1, NULL),
(148, 'Mehedi', 'Dhaka,Bangladesh', 1797007193, 1000, '2020-07-31 21:21:13', 1, NULL),
(149, 'Mehedi', 'Mirpur', 1797007193, 1350, '2020-07-31 21:21:53', 1, 'Complete Delivery'),
(150, 'Sakib', 'Dhaka,Bangladesh', 1914603437, 700, '2020-08-08 14:57:20', 1, 'Complete Delivery'),
(151, 'Mehedi', 'Mirpur', 1797007193, 1710, '2020-08-14 09:45:12', 1, 'Complete Delivery'),
(152, 'Mehedi', 'Mirpur 6', 1797007193, 2565, '2020-08-14 21:33:02', 1, 'Complete Delivery'),
(155, 'Mehedi', 'Dhaka', 1797007193, 450, '2020-08-15 12:55:13', 1, 'Complete Delivery'),
(156, 'Mehedi', 'Dhaka,Bangladesh', 1797007193, 960, '2020-08-15 12:58:52', 1, 'Complete Delivery'),
(157, 'Mehedi', 'Dhaka,Bangladesh', 1797007193, 450, '2020-08-16 16:09:36', 1, 'Complete Delivery'),
(158, 'Mehedi', 'Dhaka', 1797007193, 375, '2020-08-22 13:03:22', 1, 'Complete Delivery'),
(159, 'Sakib', 'Dhaka,Bangladesh', 1914603437, 750, '2020-08-22 13:09:36', 1, 'Complete Delivery'),
(160, 'Sakib', 'Dhaka,Bangladesh', 1914603437, 1900, '2020-08-22 13:10:30', 1, 'Complete Delivery'),
(161, 'Sakib', 'Dhaka,Bangladesh', 1914603437, 450, '2020-08-22 13:20:42', 1, 'Complete Delivery'),
(162, 'Mehedi', 'Dhaka,Bangladesh', 1797007193, 2700, '2020-08-22 14:18:08', 1, 'Complete Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `pdid` int(11) NOT NULL,
  `purchaseid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `category` varchar(30) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `order_quantity` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `order_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_detail`
--

INSERT INTO `purchase_detail` (`pdid`, `purchaseid`, `productid`, `category`, `category_id`, `order_quantity`, `order_date`, `order_status`) VALUES
(110, 92, 70, 'Pizza', 9, 3, '2020-05-27', 1),
(111, 93, 69, 'Pizza', 9, 4, '2020-05-27', 1),
(112, 94, 37, 'Pasta', 10, 8, '2020-05-27', 1),
(113, 95, 50, 'Salad', 11, 2, '2020-05-27', 1),
(114, 96, 47, 'Dessert', 12, 2, '2020-05-27', 1),
(115, 97, 42, 'Burger', 13, 13, '2020-05-27', 1),
(116, 98, 45, 'Dessert', 12, 2, '2020-05-27', 1),
(117, 99, 51, 'Salad', 11, 4, '2020-05-27', 1),
(118, 100, 73, 'Pasta', 10, 4, '2020-05-28', 1),
(119, 101, 35, 'Pizza', 9, 2, '2020-05-28', 1),
(120, 102, 42, 'Burger', 13, 6, '2020-06-13', 1),
(121, 103, 28, 'Pizza', 9, 2, '2020-06-13', 1),
(122, 104, 68, 'Pizza', 9, 3, '2020-06-14', 1),
(123, 105, 36, 'Pasta', 10, 4, '2020-06-14', 1),
(124, 106, 48, 'Burger', 13, 2, '2020-06-14', 1),
(125, 107, 70, 'Pizza', 9, 2, '2020-06-19', 1),
(129, 111, 45, 'Dessert', 12, 4, '2020-06-19', 1),
(130, 112, 50, 'Salad', 11, 2, '2020-06-19', 1),
(131, 113, 33, 'Pizza', 9, 2, '2020-06-21', 1),
(132, 114, 71, 'Pizza', 9, 6, '2020-06-21', 1),
(133, 115, 51, 'Salad', 11, 3, '2020-06-21', 1),
(134, 116, 44, 'Dessert', 12, 2, '2020-06-21', 1),
(150, 132, 109, 'Beverage', 15, 4, '2020-06-22', 1),
(151, 133, 107, 'Beverage', 15, 2, '2020-06-22', 1),
(152, 134, 72, 'Pasta', 10, 2, '2020-06-24', 1),
(153, 135, 38, 'Pasta', 10, 4, '2020-06-26', 1),
(154, 136, 25, 'Pizza', 9, 6, '2020-06-26', 1),
(155, 137, 110, 'Beverage', 15, 2, '2020-06-26', 1),
(156, 138, 44, 'Dessert', 12, 2, '2020-06-26', 1),
(157, 139, 94, 'Burger', 13, 2, '2020-06-30', 1),
(158, 140, 37, 'Pasta', 10, 4, '2020-07-05', 1),
(159, 141, 36, 'Pasta', 10, 6, '2020-07-06', 1),
(160, 142, 40, 'Burger', 13, 4, '2020-07-27', 1),
(161, 143, 116, 'Noodles', 16, 6, '2020-07-27', 1),
(162, 144, 33, 'Pizza', 9, 3, '2020-07-29', 1),
(163, 145, 35, 'Pizza', 9, 4, '2020-07-29', 1),
(164, 146, 51, 'Salad', 11, 2, '2020-07-29', 1),
(165, 147, 40, 'Burger', 13, 6, '2020-07-29', 1),
(166, 148, 49, 'Salad', 11, 4, '2020-07-31', 1),
(167, 149, 96, 'Burger', 13, 3, '2020-07-31', 1),
(168, 150, 74, 'Burger', 13, 2, '2020-08-08', 1),
(169, 151, 48, 'Burger', 13, 2, '2020-08-14', 1),
(170, 152, 48, 'Burger', 13, 3, '2020-08-14', 1),
(172, 155, 116, 'Noodles', 16, 1, '2020-08-15', 1),
(173, 156, 51, 'Salad', 11, 3, '2020-08-15', 1),
(174, 157, 44, 'Dessert', 12, 3, '2020-08-16', 1),
(175, 158, 110, 'Beverage', 15, 3, '2020-08-22', 1),
(176, 159, 49, 'Salad', 11, 3, '2020-08-22', 1),
(177, 160, 73, 'Pasta', 10, 2, '2020-08-22', 1),
(178, 161, 44, 'Dessert', 12, 3, '2020-08-22', 1),
(179, 162, 25, 'Pizza', 9, 2, '2020-08-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`) VALUES
(1, 'Sakibul Islam', 'sakib', 1914603437, 'sakibulislam285@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 'Mehedi', 'mehedi', 1914605467, 'mehedi@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `user_review`
--

CREATE TABLE `user_review` (
  `review_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `foodid` int(11) NOT NULL,
  `review` varchar(500) NOT NULL,
  `rating` int(11) NOT NULL,
  `userimage` varchar(300) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_review`
--

INSERT INTO `user_review` (`review_id`, `username`, `foodid`, `review`, `rating`, `userimage`, `date`) VALUES
(11, 'Sakib', 25, 'I love this food', 5, 'images/IMG_20190527_150037_1586182308_1596386367.jpg', '2020/08/11'),
(13, 'Rabbi', 25, 'Not as much as good what I expect. Food quality should be improve', 2, 'images/sahin_1585221075.jpg', '2020/08/11'),
(14, 'Sakib', 48, 'This food quality is very good. I like this food', 5, 'images/IMG_20190527_150037_1586182308_1596386367.jpg', '2020/08/11');

-- --------------------------------------------------------

--
-- Table structure for table `u_info`
--

CREATE TABLE `u_info` (
  `u_name` varchar(100) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_phone` varchar(100) NOT NULL,
  `u_pass` varchar(100) NOT NULL,
  `u_cname` varchar(100) NOT NULL,
  `u_cardno` varchar(100) NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `u_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `u_info`
--

INSERT INTO `u_info` (`u_name`, `u_email`, `u_phone`, `u_pass`, `u_cname`, `u_cardno`, `image`, `u_status`) VALUES
('Mehedi', 'mehedi@gmail.com', '01797007193', '21abab07eaf26585783784ad8525c1bb', 'Mycreditcard', '6634', 'images/mehedi_1585213497_1585411782.jpg', 0),
('Rabbi', 'rabbi@gmail.com', '01945763423', '6ebe76c9fb411be97b3b0d48b791a7c9', 'Mycreditcard', '3212', 'images/sahin_1585221075.jpg', 0),
('Sakib', 'sakibulislam285@gmail.com', '01914603437', 'ce8ff4d4b0d72c680bec6c192c631d54', 'Credit', '12345', 'images/IMG_20190527_150037_1586182308_1596386367.jpg', 0),
('sakibulislam', 'sakib@gmail.com', '01912653424', '25f9e794323b453885f5181f1b624d0b', 'Mycard', '3437', 'images/sa_1585215788.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `u_pay`
--

CREATE TABLE `u_pay` (
  `p_id` int(100) NOT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `u_name` varchar(100) NOT NULL,
  `food` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `p_amount` varchar(100) NOT NULL,
  `p_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `u_pay`
--

INSERT INTO `u_pay` (`p_id`, `purchase_id`, `u_name`, `food`, `quantity`, `p_amount`, `p_date`) VALUES
(154, 132, 'Sakib', 'Coca-Cola 1.25L', 4, '300', '2020-06-22'),
(155, 133, 'Sakib', '7up 2L Lemon', 2, '260', '2020-06-22'),
(156, 134, 'Sakib', 'Pasta e Fagioli Soup', 2, '1040', '2020-06-24'),
(157, 135, 'Sakib', 'Bufalina', 4, '4800', '2020-06-26'),
(158, 136, 'Mehedi', 'Pizza Margherita x', 6, '8100', '2020-06-26'),
(159, 137, 'Mehedi', 'Coca-Cola 2L ', 2, '250', '2020-06-26'),
(160, 137, 'Mehedi', 'Coca-Cola 2L ', 2, '250', '2020-06-26'),
(161, 138, 'Mehedi', 'Vanilla Cake', 2, '300', '2020-06-26'),
(162, 139, 'Mehedi', 'Smokin Burger', 2, '1340', '2020-06-30'),
(163, 140, 'Sakib', 'Mimosa', 4, '4200', '2020-07-05'),
(164, 141, 'Sakib', 'Italian Sausage Pasta', 6, '3900', '2020-07-06'),
(165, 142, 'Sakib', 'Luger Burger', 4, '3800', '2020-07-27'),
(166, 143, 'Sakib', ' Chicken Ramen Noodle ', 6, '2700', '2020-07-27'),
(167, 144, 'Mehedi', 'Pizza Prosciuto', 3, '2850', '2020-07-29'),
(168, 145, 'Mehedi', 'Parmigiana', 4, '7800', '2020-07-29'),
(169, 146, 'Mehedi', 'Asian-style chopped salad', 2, '640', '2020-07-29'),
(170, 147, 'Rabbi', 'Luger Burger', 6, '5700', '2020-07-29'),
(171, 148, 'Mehedi', 'Italian Garden Salad', 4, '1000', '2020-07-31'),
(172, 149, 'Mehedi', 'Bull Burgers', 3, '1350', '2020-07-31'),
(173, 150, 'Sakib', 'Turkey Burgers', 2, '700', '2020-08-08'),
(174, 151, 'Mehedi', 'Cheese burger ', 2, '1710', '2020-08-14'),
(175, 152, 'Mehedi', 'Cheese burger ', 3, '2565', '2020-08-14'),
(176, 153, 'Mehedi', 'Fruit-custard', 3, '1260', '2020-08-14'),
(177, 155, 'Mehedi', ' Chicken Ramen Noodle ', 1, '450', '2020-08-15'),
(178, 156, 'Mehedi', 'Asian-style chopped salad', 3, '960', '2020-08-15'),
(179, 157, 'Mehedi', 'Vanilla Cake', 3, '450', '2020-08-16'),
(180, 158, 'Mehedi', 'Coca-Cola 2L ', 3, '375', '2020-08-22'),
(181, 159, 'Sakib', 'Italian Garden Salad', 3, '750', '2020-08-22'),
(182, 160, 'Sakib', 'Grilled Chicken Caprese', 2, '1900', '2020-08-22'),
(183, 161, 'Sakib', 'Vanilla Cake', 3, '450', '2020-08-22'),
(184, 162, 'Mehedi', 'Pizza Margherita x', 2, '2700', '2020-08-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `postcomment`
--
ALTER TABLE `postcomment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `postnews`
--
ALTER TABLE `postnews`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`pdid`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_review`
--
ALTER TABLE `user_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `u_info`
--
ALTER TABLE `u_info`
  ADD PRIMARY KEY (`u_name`);

--
-- Indexes for table `u_pay`
--
ALTER TABLE `u_pay`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `postcomment`
--
ALTER TABLE `postcomment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `postnews`
--
ALTER TABLE `postnews`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  MODIFY `pdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_review`
--
ALTER TABLE `user_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `u_pay`
--
ALTER TABLE `u_pay`
  MODIFY `p_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
