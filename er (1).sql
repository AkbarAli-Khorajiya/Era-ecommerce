-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 02:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `er`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `b_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `b_name`) VALUES
(1, 'Kalini'),
(2, 'Sangria'),
(3, 'Sidhidata'),
(4, '\r\nQOMN'),
(5, 'Athena'),
(6, 'StyleStone'),
(7, 'BAESD');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile_no`, `subject`, `message`, `added_at`) VALUES
(1, 'Mohammad', 'akb@gmail.com', '7623090030', 'For thanks', 'jygg uyfdd sdfifusdyy dfsdffh', '2024-02-23 05:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `mobile_no` varchar(10) NOT NULL,
  `billing_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `p_id`, `order_date`, `mobile_no`, `billing_address`) VALUES
(1, 1, 5, '2024-02-21 19:00:25', '7865745543', 'Badargadh,Palanpur,Gujarat,323232'),
(2, 1, 7, '2024-02-21 20:34:42', '7865745543', 'haiderpura,patan,Gujarat,455445'),
(3, 1, 7, '2024-10-19 17:36:16', '7623090030', 'Badargadh,Palanpur|Gujarat 385410');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `p_name` varchar(250) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `p_catagory_id` int(11) NOT NULL,
  `p_price` float NOT NULL,
  `p_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `brand_id`, `p_catagory_id`, `p_price`, `p_desc`) VALUES
(1, 'Shibori Dyed Regular Kurta with Trousers & Dupatta', 1, 1, 869, '\r\n<ul>\r\n	<li>Shibori Dyed</li>\r\n	<li>Straight shape</li>\r\n	<li>Regular style</li>\r\n	<li>Round neck, three-quarter regular sleeves</li>\r\n	<li>Calf length with straight hem</li>\r\n	<li>Cotton blend machine weave fabric</li>\r\n</ul>\r\n\r\n\r\n<h4>Size &amp; Fit</h4>\r\n\r\n<p>The model (height 5&#39;8) is wearing a size S</p>\r\n\r\n<h4>Material &amp; Care</h4>\r\n\r\n<p>Cotton Blend<br/>\r\nDry Clean</p>\r\n'),
(2, 'Ethnic Motifs Embroidered Anarkali Kurta With Palazzo & Dupatta Set', 2, 1, 1623, '\r\n<ul>\r\n<li>Purple Kurta</li>\r\n<li>Embroidered</li>\r\n<li>V-neck</li>\r\n<li>Purple solid Palazzo</li>\r\n<li>Purple Dupatta</li>\r\n</ul>\r\n<h4>Size &amp; Fit</h4>\r\n<p>Dupatta size: 2.2m x 88cm (Length x Width)\r\n\r\n<h4>Material &amp; Care</h4>\r\n<p>Kurta and Palazzo material: Silk Blend<br />\r\nDupatta Fabric: Organza<br />\r\nDry clean</p>\r\n'),
(3, 'Embellished Zari Silk Blend Designer Banarasi Saree', 3, 4, 829, '\r\n<ul>\r\n	<li>Navy blue banarasi saree</li>\r\n	<li>Embellished woven design saree with woven design border&nbsp;</li>\r\n	<li>Has zari detail</li>\r\n</ul>\r\n\r\n<h4>Size &amp; Fit</h4>\r\n\r\n<p>Length: 5.5 metres plus 0.8 metre blouse piece<br />\r\n\r\n<h4>Material &amp; Care</h4>\r\n\r\n<p>\r\nSaree Fabric: 90% Silk Blend, 10% Polyster<br />\r\nMachine Wash</p>\r\n'),
(4, 'Ethnic Motifs Printed Saree', 1, 4, 692, '<ul>\r\n	<li>Off white and blue&nbsp;saree</li>\r\n	<li>Ethnic motifs printed saree with solid border&nbsp;</li>\r\n</ul>\r\n\r\n<h4>Size &amp; Fit</h4>\r\n\r\n<p>Length: 5.5 metres plus 0.8 metre blouse piece<br />\r\nWidth: 1.0 metres (approx.)</p>\r\n\r\n<h4>Material &amp; Care</h4>\r\n\r\n<p>Art Silk<br />\r\nMachine Wash</p>\r\n'),
(5, 'Blue Print Mandarin Collar Empire Pure Cotton Longline Top', 4, 3, 999, '<ul>\r\n	<li>Blue longline empire top</li>\r\n	<li>Ethnic motifs print</li>\r\n	<li>Mandarin collar, three-quarter, cuffed sleeves</li>\r\n	<li>Gathered or pleated detail</li>\r\n	<li>Woven cotton</li>\r\n</ul>\r\n\r\n<h4>Size &amp; Fit</h4>\r\n\r\n<p>The model (height 5&#39;8) is wearing a size S</p>\r\n\r\n<h4>Material &amp; Care</h4>\r\n\r\n<p>100% cotton<br />\r\nHand Wash</p>\r\n'),
(6, 'White Tie-Up Neck Puff Sleeves Lace Top', 5, 3, 679, '<ul>\r\n	<li>Colour: white regular Top</li>\r\n	<li>self design</li>\r\n	<li>woven lace</li>\r\n	<li>tie-up neck</li>\r\n	<li>three-quarter sleeves , puff</li>\r\n	<li>tie-ups</li>\r\n</ul>\r\n\r\n<h4>Size &amp; Fit</h4>\r\n\r\n<p>The model (height 5&#39;8) is wearing a size S</p>\r\n\r\n<h4>Material &amp; Care</h4>\r\n\r\n<p>polyester ,<br />\r\nhand wash</p>\r\n'),
(7, 'Denim Midi Straight Skirt', 6, 6, 730, '<ul>\r\n<li>Blue solid midi Straight skirt</li>\r\n<li>Button closure</li>\r\n<li>Solid pattern type</li>\r\n<li>Side slit</li>\r\n<li> Straight hem</li>\r\n</ul>\r\n<h4>Size &amp; Fit</h4>\r\n<p>Regular Fit<br />\r\nThe model (height 5&#39;8&quot;) is wearing a size 30</p>\r\n\r\n<h4>Material &amp; Care</h4>\r\n<p>Denim<br />\r\nMachine Wash</p>\r\n'),
(8, 'Studded Detailed Washed Crop Denim Jacket', 7, 9, 799, '<ul>\r\n	<li>Navy blue solid denim jacket.</li>\r\n	<li>Spread collar.</li>\r\n	<li>Button closure.</li>\r\n	<li>Three-quarter sleeves.</li>\r\n	<li>Straight hemline, cotton lining.</li>\r\n</ul>\r\n\r\n<h4>Size &amp; Fit</h4>\r\n\r\n<p>The model (height 5&#39;8) is wearing a size S</p>\r\n\r\n<h4>Material &amp; Care</h4>\r\n\r\n<p>Cotton<br />\r\nHand Wash</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `product_catagory`
--

CREATE TABLE `product_catagory` (
  `id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_catagory`
--

INSERT INTO `product_catagory` (`id`, `c_name`) VALUES
(1, 'Kurtas & Suits'),
(2, 'Salwars'),
(3, 'Tops'),
(4, 'Sarees'),
(5, 'Ethnic wear'),
(6, 'Skirts & Plazzos'),
(7, 'Lehenga Cholis'),
(8, 'Dupattas & Shawls'),
(9, 'Jackets');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `p_id`, `image_url`) VALUES
(1, 1, 'p1-1.jpg'),
(2, 1, 'p1-2.jpg'),
(3, 1, 'p1-3.jpg'),
(4, 2, 'p2-1.jpg'),
(5, 2, 'p2-2.jpg'),
(6, 2, 'p2-3.jpg'),
(7, 3, 'p3-1.jpg'),
(8, 3, 'p3-2.jpg'),
(9, 3, 'p3-3.jpg'),
(10, 4, 'p4-1.jpg'),
(11, 4, 'p4-2.jpg'),
(12, 4, 'p4-3.jpg'),
(13, 5, 'p5-1.jpg'),
(14, 5, 'p5-2.jpg'),
(15, 5, 'p5-3.jpg'),
(16, 6, 'p6-1.jpg'),
(17, 6, 'p6-2.jpg'),
(18, 6, 'p6-3.jpg'),
(19, 7, 'p7-1.jpg'),
(20, 7, 'p7-2.jpg'),
(21, 7, 'p7-3.jpg'),
(22, 8, 'p8-1.jpg'),
(23, 8, 'p8-2.jpg'),
(24, 8, 'p8-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'Khorajiya AkbarAli', 'akb@gmail.com', '$2y$10$oGrNZqbwQ4uN/LcW9mII9.YnizS1ry6afP2TDQo9myIVh5ZMX/QDS'),
(15, 'Lubna', 'saiyedsaiyed847@gmail.com', '$2y$10$NVRdfL0a8ks2tt7rNpXkcumYF2ZXYADy7DsrofND0/yvBhZJpchnm'),
(17, 'Akbar Ali', 'akb123@gmail.com', '$2y$10$O63SYlql1CB9NUeUxdLHIuLYMm33VRcsiWU2i/WttJ0h3guS0OPna');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `p_id`) VALUES
(85, 1, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_catagory`
--
ALTER TABLE `product_catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_catagory`
--
ALTER TABLE `product_catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
