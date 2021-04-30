-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 10:14 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sellsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `title` varchar(20) NOT NULL,
  `subtitle` varchar(20) NOT NULL,
  `content` mediumtext NOT NULL,
  `id` int(100) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`title`, `subtitle`, `content`, `id`, `image`) VALUES
('Sell Site', 'JAWAR ATTA', 'Since childhood days, I used to see my father working in the jawar fields. He struggled very hard to sell the product in the market. Our net income was very less and survival was very difficult. All the problems which our family was experiencing motivated me to build a successful jawar atta company.Our company supplies jawar atta to dealers and retailers who sell it to end customers. The end users can purchase atta from our website in wholesale rates. Home delivery service is also provided.our aim is to provide best services', 5, 'IMG-20200816-WA0006[1].jpg'),
(' About SORGHUM', 'Short Information', 'SORGHUM !!\r\nScientific name: Sorghum bicolor (L.) Moench !\r\nHindi name: Jowar !\r\nMarathi: Jwari !\r\nTelugu name: Jonnalu \r\n\r\n-Sorghum is traditional staple food of the dry land regions of the world, a warm season crop intolerant to low temperatures, resistant to pests and diseases highly nutritious and a \r\n climate-compliant crop.\r\n-It ranks fifth in cereals produced world-wide and fourth in India. Generally, sorghum grains act as a principal source of protein, vitamins, energy and minerals  for millions of people especially in the semi-arid regions playing a crucial role in the world’s food economy. It has a nutritional profile better than rice which is the staple food of majority of the human population for its rich protein, fibre thiamine, riboflavin, folic acid, calcium, phosphorous, iron and ?-carotene.\r\n-Sorghum is rich in potassium, phosphorus and calcium with sufficient amounts of iron, zinc and sodium. Due to this, it is being targeted as a means to reduce malnutrition globally. It helps to control heart problems, obesity and arthritis.\r\n', 6, 'wallpaperflare.com_wallpaper.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `bid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`, `bid`, `username`, `usertype`, `image`) VALUES
('radhika123@gmail.com', 'asdf', 38, 'Radhika Badgujar', 'admin', 'avatar2.png'),
('ssw@admin.com', 'asdf', 39, 'Saurabh Wani', 'admin', 'avatar5.png');

-- --------------------------------------------------------

--
-- Table structure for table `b_person`
--

CREATE TABLE `b_person` (
  `bid` int(10) NOT NULL,
  `Name` text NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Mobile` bigint(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Adhaar` bigint(50) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `b_person`
--

INSERT INTO `b_person` (`bid`, `Name`, `Email`, `Mobile`, `Password`, `Adhaar`, `image`) VALUES
(8, 'Ram', 'cr5423@gmail.com', 9404341181, 'ram', 456732156709, 'avatar04.png'),
(9, 'shreyas', 'smfegade2799@gmail.com', 9404341181, 'shreyas', 567890876543, 'avatar5.png'),
(12, 'rajesh patil', 'admin@admin.com', 9513576248, 'asdf', 123456789122, 'avatar2.png'),
(15, 'ramesh malode', 'ram2@gmail.com', 9513576248, 'asdf', 123456789745, 'avatar04.png'),
(23, 'saurabh wani', 'saurabh123@gmail.com', 9513576248, 'asdf', 123456789745, 'avatar5.png');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `pname` text NOT NULL,
  `price` int(200) NOT NULL,
  `name` text NOT NULL,
  `noofpr` int(11) NOT NULL,
  `costprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `image`, `pname`, `price`, `name`, `noofpr`, `costprice`) VALUES
(5, 'about-img.jpg', '1', 40, 'Atta', 490, 30),
(8, 'aid10155888-v4-728px-Make-Jowar-Roti-Step-2.jpg.jpg', '1 kG', 101, 'rice', 487, 90),
(9, '6.jpg', '1 kG', 50, 'jwari', 495, 30),
(10, '5.jpg', '250 G', 100, 'Bhakri', 496, 80),
(11, 'biscuits.jpg', '250 G', 100, 'Biscuit', 499, 85),
(12, '7.jpg', '2Kg', 90, 'Gahu', 497, 70);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city` text NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city`, `code`) VALUES
(12, 'dhule', 424001),
(18, 'mumbai', 400008),
(19, 'jalgaon', 425001),
(20, 'jalgaon', 425001);

-- --------------------------------------------------------

--
-- Table structure for table `distributer`
--

CREATE TABLE `distributer` (
  `id` int(100) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(255) NOT NULL,
  `msg` varchar(200) NOT NULL,
  `DATE` datetime NOT NULL,
  `status` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `phone` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` mediumtext NOT NULL,
  `abtus` varchar(200) NOT NULL,
  `addres` varchar(200) NOT NULL,
  `conno` bigint(20) NOT NULL,
  `facebk` varchar(200) NOT NULL,
  `twt` varchar(200) NOT NULL,
  `linked` varchar(200) NOT NULL,
  `gp` varchar(200) NOT NULL,
  `insta` varchar(200) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`phone`, `email`, `location`, `abtus`, `addres`, `conno`, `facebk`, `twt`, `linked`, `gp`, `insta`, `id`) VALUES
(1234567890, 'SellSite@gmail.com', 'Jalgaon', 'We are here to serve you with the best Jawar Atta with best quality.Our main aim is to provide best service.', 'Dhule ,Maharashtra', 9653624948, 'Enter facebook id', 'Enter twitter id', 'Enter linked in id ', 'Enter Google plus Id', 'Enter instagram Id', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `image` varchar(10000) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`image`, `id`) VALUES
('avatar3.png', 24),
('aid10155888-v4-728px-Make-Jowar-Roti-Step-2.jpg.jpg', 26),
('download (1).jpg', 27),
('jowar-roti-recipe15.jpg', 29),
('slider-03.jpg', 30),
('images (3).jpg', 31),
('images (4).jpg', 32),
('images (1).jpg', 34),
('1.jpg', 35),
('3.jpg', 36),
('jawar3.jpg', 37),
('images (10).jpg', 39),
('images (7).jpg', 40),
('2.jpg', 44),
('jawar5.jpg', 47);

-- --------------------------------------------------------

--
-- Table structure for table `nav`
--

CREATE TABLE `nav` (
  `id` int(100) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `h1` text NOT NULL,
  `h3` text NOT NULL,
  `h4` text NOT NULL,
  `h5` text NOT NULL,
  `h6` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nav`
--

INSERT INTO `nav` (`id`, `image`, `h1`, `h3`, `h4`, `h5`, `h6`) VALUES
(1, 'veg.png', 'Homee', 'Loginn', 'About uss', 'Galleryy', 'Contactt');

-- --------------------------------------------------------

--
-- Table structure for table `nupd`
--

CREATE TABLE `nupd` (
  `id` int(100) NOT NULL,
  `l1` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nupd`
--

INSERT INTO `nupd` (`id`, `l1`) VALUES
(1, 'here is new offer for you 200'),
(2, 'asdf'),
(3, 'here is');

-- --------------------------------------------------------

--
-- Table structure for table `prdanalysis`
--

CREATE TABLE `prdanalysis` (
  `prdname` text NOT NULL,
  `month` text NOT NULL,
  `itmcount` int(11) NOT NULL,
  `srid` int(11) NOT NULL,
  `prdid` int(11) NOT NULL,
  `pricepermonth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prdanalysis`
--

INSERT INTO `prdanalysis` (`prdname`, `month`, `itmcount`, `srid`, `prdid`, `pricepermonth`) VALUES
('rice', 'Mar/2021', 15, 1, 8, 90),
('rice', 'Aprl/2021', 5, 4, 8, 92),
('rice', 'May/2021', 12, 5, 8, 93),
('jwari', 'Aprl/2021', 4, 6, 9, 97),
('jwari', 'May/2021', 10, 7, 9, 99),
('jwari', 'Jun/2021', 10, 8, 9, 104),
('rice', 'Mar/2021', 2, 9, 8, 89),
('Atta', 'Mar/2021', 3, 12, 5, 40),
('Gahu', 'May/2021', 2, 13, 12, 90),
('Atta', 'May/2021', 1, 14, 5, 40),
('Atta', 'Apr/2021', 1, 15, 5, 40),
('Gahu', 'Apr/2021', 1, 16, 12, 90),
('Biscuit', 'Apr/2021', 1, 17, 11, 100);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(100) NOT NULL,
  `review` varchar(1000) NOT NULL DEFAULT 'NO REVIEW',
  `rate` int(100) NOT NULL,
  `status` text NOT NULL,
  `DATE` datetime NOT NULL,
  `display` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `review`, `rate`, `status`, `DATE`, `display`) VALUES
(4, '			', 93, 'read', '2011-01-12 01:44:49', 'yes'),
(2, 'checking the form is working or not checking the form is working or not checking the form is working or not checking the form is working or not checking the form is working or not checking the form is working or not checking the form is working or not checking the form is working or not checking the form is working or not checking the form is working or not checking the form is working or not checking the form is working or not checking the form is working or not checking the form is working or not 			', 98, 'read', '2011-01-12 02:57:27', 'no'),
(7, '		gopa atta is pure and fresh product .it gives taste of essence\r\n', 90, 'read', '2020-04-07 15:04:46', 'no'),
(8, '			i like this product very much .', 95, 'read', '2020-04-07 15:05:51', 'no'),
(7, 'This is very good product.', 90, 'read', '2020-09-12 18:57:57', 'no'),
(7, 'nice prodt', 98, 'read', '2020-09-20 13:46:00', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `image` varchar(1000) NOT NULL,
  `h1` varchar(1000) NOT NULL,
  `h2` varchar(1000) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`image`, `h1`, `h2`, `id`) VALUES
('arrow.jpg', 'Home', 'Admin Login', 21),
('arrow.jpg', 'hello', 'jaude sod', 22);

-- --------------------------------------------------------

--
-- Table structure for table `wishcartbuy`
--

CREATE TABLE `wishcartbuy` (
  `wish` varchar(256) NOT NULL,
  `cart` varchar(256) NOT NULL,
  `buy` varchar(256) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishcartbuy`
--

INSERT INTO `wishcartbuy` (`wish`, `cart`, `buy`, `id`) VALUES
('a:1:{i:0;i:5;}', 'a:1:{i:0;i:5;}', 'a:0:{}', 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `b_person`
--
ALTER TABLE `b_person`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributer`
--
ALTER TABLE `distributer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nav`
--
ALTER TABLE `nav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nupd`
--
ALTER TABLE `nupd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prdanalysis`
--
ALTER TABLE `prdanalysis`
  ADD PRIMARY KEY (`srid`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishcartbuy`
--
ALTER TABLE `wishcartbuy`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `b_person`
--
ALTER TABLE `b_person`
  MODIFY `bid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `distributer`
--
ALTER TABLE `distributer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `nav`
--
ALTER TABLE `nav`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nupd`
--
ALTER TABLE `nupd`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prdanalysis`
--
ALTER TABLE `prdanalysis`
  MODIFY `srid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wishcartbuy`
--
ALTER TABLE `wishcartbuy`
  ADD CONSTRAINT `wishcartbuy_ibfk_1` FOREIGN KEY (`id`) REFERENCES `b_person` (`bid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
