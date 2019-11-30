-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2019 at 06:02 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_media`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `adminname` varchar(100) COLLATE utf8_bin NOT NULL,
  `adminpassword` varchar(100) COLLATE utf8_bin NOT NULL,
  `adminemail` varchar(100) COLLATE utf8_bin NOT NULL,
  `adminphone` bigint(11) NOT NULL,
  `adminaddress` text COLLATE utf8_bin NOT NULL,
  `admindate` date NOT NULL,
  `adminstatus` enum('1','0') COLLATE utf8_bin NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminname`, `adminpassword`, `adminemail`, `adminphone`, `adminaddress`, `admindate`, `adminstatus`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin@gmail.com', 9716799201, 'G-12', '2016-08-26', '1');

-- --------------------------------------------------------

--
-- Table structure for table `all_user`
--

CREATE TABLE `all_user` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `display_name` varchar(200) DEFAULT NULL,
  `mobile_no` int(12) DEFAULT NULL,
  `email_id` varchar(200) DEFAULT NULL,
  `joindate` date NOT NULL,
  `country` varchar(100) NOT NULL,
  `user_status` enum('1','0') NOT NULL DEFAULT '0',
  `password` varchar(200) NOT NULL,
  `uniqueid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_user`
--

INSERT INTO `all_user` (`user_id`, `first_name`, `last_name`, `display_name`, `mobile_no`, `email_id`, `joindate`, `country`, `user_status`, `password`, `uniqueid`) VALUES
(1, 'chittaranjan', 'Roy', NULL, 1234567890, 'admin@gmail.com', '2019-10-11', 'India', '1', '123456', ''),
(7, '', '', NULL, 0, '', '2019-10-14', '', '0', '', '529464');

-- --------------------------------------------------------

--
-- Table structure for table `block_list`
--

CREATE TABLE `block_list` (
  `user_id` int(10) NOT NULL,
  `block_id` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `block_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `catname` varchar(100) COLLATE utf8_bin NOT NULL,
  `cat_desc` longtext COLLATE utf8_bin NOT NULL,
  `cat_date` date NOT NULL,
  `status` enum('yes','no') COLLATE utf8_bin NOT NULL DEFAULT 'yes',
  `menuname` varchar(100) COLLATE utf8_bin NOT NULL,
  `imgid` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `catname`, `cat_desc`, `cat_date`, `status`, `menuname`, `imgid`) VALUES
(1, 'Brand', '<p>Brand</p>', '2019-10-11', 'yes', 'about', 'Capture.JPG'),
(2, 'Community or Public Figure', '<p>Community or Public Figure</p>', '2019-10-11', 'yes', 'about', 'Capture.JPG'),
(3, 'BUSINESS', '<p>BUSINESS</p>', '2019-10-11', 'yes', 'program', 'Capture.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `c_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `comment` text DEFAULT NULL,
  `comment_status` tinyint(1) NOT NULL DEFAULT 0,
  `post_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_document`
--

CREATE TABLE `company_document` (
  `com_d_id` int(10) NOT NULL,
  `com_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `com_doc_id` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `cdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_page`
--

CREATE TABLE `company_page` (
  `com_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `page_name` varchar(200) DEFAULT NULL,
  `page_details` text DEFAULT NULL,
  `page_address` text DEFAULT NULL,
  `page_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_date` datetime NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_page`
--

INSERT INTO `company_page` (`com_id`, `user_id`, `page_name`, `page_details`, `page_address`, `page_status`, `created_date`, `country`) VALUES
(1, 0, '', NULL, NULL, 0, '0000-00-00 00:00:00', 'india');

-- --------------------------------------------------------

--
-- Table structure for table `error_log`
--

CREATE TABLE `error_log` (
  `error_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `error_time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `f_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `follow` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hospitality`
--

CREATE TABLE `hospitality` (
  `id` int(10) NOT NULL,
  `title` text NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  `h_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospitality`
--

INSERT INTO `hospitality` (`id`, `title`, `status`, `date`, `h_desc`) VALUES
(1, 'BUSINESS', '', '2019-10-13', '<p>test</p>');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `m_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `message` varchar(250) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `m_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ourintrest`
--

CREATE TABLE `ourintrest` (
  `id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `idesc` text NOT NULL,
  `date` date NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ourintrest`
--

INSERT INTO `ourintrest` (`id`, `title`, `idesc`, `date`, `status`) VALUES
(1, 'BUSINESS', '<p>test</p>', '2019-10-14', '');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_detail` longtext NOT NULL,
  `page_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `page_title`, `page_detail`, `page_date`) VALUES
(1, 'about', '', '2019-10-05'),
(2, '', '<p>test</p>', '2019-10-05'),
(3, '', '<p>Established in&nbsp;<strong>2010</strong>&nbsp;by&nbsp;<strong>Mr. Soumiik Mitraa</strong>.&nbsp;<strong>Harley Food Products Pvt. Ltd.</strong>&nbsp;(An ISO 22000 : 2005 Certified &amp; GMO Free Company), an Era of Goodness, Freshness and a creation of Sensational Taste. Our mission of&nbsp;<strong>&ldquo;Bache khush toh hum khush&rdquo;</strong>&nbsp;is to provide consumers with the best tantalizing taste, keeping in mind with sets of most nutritious choices exhibiting a wide range of potato chips, namkeens, fruit beverage and confectionery products. Harley Food products have&nbsp;<strong>no artificial colors, no added MSG and no Gelatin &amp; GMO free</strong>&nbsp;are prepared with less oil for a healthy heart.</p>\r\n<h5>Branding</h5>\r\n<p><strong>All the product needs its own identity.</strong>&nbsp;With one of the leading designer in the industry to fill the blanks of a product emphasizing using the twisted combination of attractive and colorful packaging design, we ensure it meets more than an eye of a consumer tempting to grab Harley Foods Products.</p>', '2018-09-06'),
(4, '', '<p>sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget,</p>', '2015-12-09'),
(5, '', '<p>&nbsp;</p>\r\n<h2>Returns &amp; exchanges</h2>\r\n<p>We strive to ensure 100% customer satisfaction. In case you are unhappy with your order, we would be happy to assist you with an exchange or a return &amp; refund, subject to the following conditions:</p>\r\n<ul>\r\n<li>Ensure that you get in touch with Viant Shoes &amp; initiate request for exchange/return within 14 days from the date of delivery.</li>\r\n<li>Ensure that the item(s) is shipped back to us within thirty days from the date of delivery.</li>\r\n</ul>\r\n<p>Unfortunately, we cannot accept a cancellation of an order once it has already been placed. For any further queries, please contact Viant Shoes.</p>\r\n<p>Due to the nature of the items, the following cannot be exchanged or returned unless they are delivered to you in a damaged or defective state:</p>\r\n<ul>\r\n<li>Custom or personalised orders</li>\r\n<li>Items on sale</li>\r\n</ul>\r\n<p>Conditions of Return</p>\r\n<p>Buyers are responsible for return shipping costs. If the item is not returned in its original condition, the buyer is responsible for any loss in value.</p>', '2017-09-27'),
(6, '', '<h2>Privacy policy</h2>\r\n<p>We will only use the information (including shipping &amp; billing addresses) that you have provided us with -</p>\r\n<ul style=\"list-style-type: disc;\">\r\n<li>To communicate with you about your order</li>\r\n<li>To fulfill your order</li>\r\n<li>For legal reasons (like paying taxes)</li>\r\n</ul>\r\n<p>&nbsp;</p>', '2017-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `post_like`
--

CREATE TABLE `post_like` (
  `like_id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `do_like` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reward_point`
--

CREATE TABLE `reward_point` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `ref_user_id` int(10) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `reward_point` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upload_document`
--

CREATE TABLE `upload_document` (
  `doc_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `profile_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_image`
--

CREATE TABLE `user_image` (
  `img_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `profile_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_post`
--

CREATE TABLE `user_post` (
  `post_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `post_title` varchar(200) DEFAULT NULL,
  `post_details` tinytext DEFAULT NULL,
  `post_status` tinyint(1) NOT NULL DEFAULT 0,
  `post_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `profile_id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `image_id` varchar(120) NOT NULL,
  `old_image_id` int(10) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `lastupdate` datetime NOT NULL,
  `current_city` varchar(150) NOT NULL,
  `twon` varchar(150) NOT NULL,
  `work` varchar(150) NOT NULL,
  `college` text NOT NULL,
  `school` text NOT NULL,
  `current_company` text NOT NULL,
  `last_company` text NOT NULL,
  `current_studied` text NOT NULL,
  `address` text NOT NULL,
  `website` text NOT NULL,
  `about_user` text NOT NULL,
  `intrest_area` varchar(150) NOT NULL,
  `termandcondition` enum('1','0') NOT NULL DEFAULT '0',
  `zip_code` varchar(12) NOT NULL,
  `state` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`profile_id`, `user_id`, `image_id`, `old_image_id`, `update_date`, `lastupdate`, `current_city`, `twon`, `work`, `college`, `school`, `current_company`, `last_company`, `current_studied`, `address`, `website`, `about_user`, `intrest_area`, `termandcondition`, `zip_code`, `state`) VALUES
(5, 1, '2713454pic1.jpg', NULL, '2019-10-14 14:18:45', '0000-00-00 00:00:00', 'SAMASTIPUR', 'SAMASTIPUR', 'SAMASTIPUR', 'SAMASTIPUR', 'SAMASTIPUR', 'SAMASTIPUR', '', 'SAMASTIPUR', 'SAMASTIPUR', 'SAMASTIPUR', 'SAMASTIPUR', '', '1', '', 'SAMASTIPUR');

-- --------------------------------------------------------

--
-- Table structure for table `user_uploder`
--

CREATE TABLE `user_uploder` (
  `upload_id` int(10) NOT NULL,
  `upload_doc_id` varchar(200) NOT NULL DEFAULT '0',
  `user_id` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_user`
--
ALTER TABLE `all_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `block_list`
--
ALTER TABLE `block_list`
  ADD PRIMARY KEY (`block_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `company_document`
--
ALTER TABLE `company_document`
  ADD PRIMARY KEY (`com_d_id`);

--
-- Indexes for table `company_page`
--
ALTER TABLE `company_page`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `error_log`
--
ALTER TABLE `error_log`
  ADD PRIMARY KEY (`error_id`),
  ADD KEY `error_log_fk0` (`user_id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `hospitality`
--
ALTER TABLE `hospitality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `ourintrest`
--
ALTER TABLE `ourintrest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_like`
--
ALTER TABLE `post_like`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `reward_point`
--
ALTER TABLE `reward_point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_document`
--
ALTER TABLE `upload_document`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `user_image`
--
ALTER TABLE `user_image`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `user_post`
--
ALTER TABLE `user_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `user_uploder`
--
ALTER TABLE `user_uploder`
  ADD PRIMARY KEY (`upload_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `all_user`
--
ALTER TABLE `all_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `block_list`
--
ALTER TABLE `block_list`
  MODIFY `block_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_document`
--
ALTER TABLE `company_document`
  MODIFY `com_d_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_page`
--
ALTER TABLE `company_page`
  MODIFY `com_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `error_log`
--
ALTER TABLE `error_log`
  MODIFY `error_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `f_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospitality`
--
ALTER TABLE `hospitality`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `m_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ourintrest`
--
ALTER TABLE `ourintrest`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_like`
--
ALTER TABLE `post_like`
  MODIFY `like_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reward_point`
--
ALTER TABLE `reward_point`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upload_document`
--
ALTER TABLE `upload_document`
  MODIFY `doc_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_image`
--
ALTER TABLE `user_image`
  MODIFY `img_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_post`
--
ALTER TABLE `user_post`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `profile_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_uploder`
--
ALTER TABLE `user_uploder`
  MODIFY `upload_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `error_log`
--
ALTER TABLE `error_log`
  ADD CONSTRAINT `error_log_fk0` FOREIGN KEY (`user_id`) REFERENCES `all_user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
