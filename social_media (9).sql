-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2019 at 04:07 AM
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
(23, 'chittaranjan', 'Roy', NULL, 1234567890, 'dafas', '2019-10-15', 'admin@gmail.com', '1', 'MTEx', '522067'),
(25, 'dfdsf', 'dsfsd', NULL, 1234567890, 'dsfdsf', '2019-10-15', 'df', '0', 'ZA==', '771432'),
(26, 'dfsd', 'fgdf', NULL, 1234567890, 'fdgdf', '2019-10-15', 'admin@gmail.com', '0', 'MTE=', '944121'),
(27, 'dfsdf', 'sdf', NULL, 1234567890, 'sdfsd', '2019-10-15', 'admin@gmail.com', '0', 'MQ==', '287895'),
(28, 'fhgfgh', 'hjgjh', NULL, 1234567890, 'gjh@gmail.com', '2019-10-15', 'admin@gmail.com', '0', 'MQ==', '192414'),
(29, 'chittaranjan', 'Roy', NULL, 1234567890, 'admin1@gmail.com', '2019-10-16', 'Nigira', '1', 'MQ==', '747243'),
(30, 'chittaranjan', 'Roy', NULL, 1234567890, 'admin12@gmail.com', '2019-10-19', 'India', '0', 'MQ==', '158087'),
(31, 'chittaranjan', 'Roy', NULL, 1234567890, 'admin11@gmail.com', '2019-10-21', 'Nigira', '0', 'MQ==', '797661'),
(32, 'chittaranjan', 'Roy', NULL, 1234567890, 'admin1v@gmail.com', '2019-10-21', 'Nigira', '0', 'MQ==', '421229');

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
  `post_id` int(10) NOT NULL,
  `cdate` datetime NOT NULL,
  `cimage` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`c_id`, `user_id`, `comment`, `comment_status`, `post_id`, `cdate`, `cimage`) VALUES
(1, 29, 'dafas', 1, 5, '2019-10-19 13:35:50', ''),
(2, 29, 'sfsdfsdfsdfsdf', 1, 5, '2019-10-19 14:24:42', ''),
(3, 29, 'my test', 1, 5, '2019-10-21 10:57:22', ''),
(4, 29, '23', 1, 9, '2019-10-25 07:04:20', ''),
(5, 29, 'yu', 1, 9, '2019-10-25 07:04:57', ''),
(6, 29, 'lk', 1, 9, '2019-10-25 07:12:37', ''),
(7, 29, 'jkhkjhhgj', 1, 9, '2019-10-25 07:49:51', ''),
(8, 29, 'tets2', 1, 9, '2019-10-25 07:54:21', ''),
(9, 29, 'dsad', 1, 9, '2019-10-25 08:03:35', ''),
(10, 29, 'dsad', 1, 9, '2019-10-25 08:04:22', ''),
(11, 29, 'dsad', 1, 9, '2019-10-25 08:04:22', ''),
(12, 29, 'ZXZXZX', 1, 9, '2019-10-25 08:27:56', ''),
(13, 29, 'ZXZXZX11111111111111', 1, 9, '2019-10-25 08:29:26', '75240.387334001536942299aurangabad-ajanta-caves-0.jpg'),
(14, 29, 'test', 1, 9, '2019-10-25 09:36:05', '');

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
(1, 0, '', NULL, NULL, 0, '0000-00-00 00:00:00', 'india'),
(3, 0, '', NULL, NULL, 0, '0000-00-00 00:00:00', 'india'),
(4, 0, '', NULL, NULL, 0, '0000-00-00 00:00:00', 'USA'),
(5, 0, 'new test', NULL, NULL, 0, '2019-10-24 00:00:00', 'Nigira');

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
  `follow` varchar(200) NOT NULL DEFAULT '0',
  `f_date` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`f_id`, `user_id`, `follow`, `f_date`, `status`) VALUES
(2, 29, '23', '2019-10-26 11:13:32', 'yes'),
(3, 29, '25', '2019-10-26 16:03:37', 'yes'),
(4, 29, '27', '2019-10-26 18:08:58', 'yes');

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
  `do_like` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(10) NOT NULL,
  `l_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_like`
--

INSERT INTO `post_like` (`like_id`, `post_id`, `user_id`, `do_like`, `status`, `l_date`) VALUES
(12, 5, 29, 1, 'yes', '2019-10-19 12:16:44'),
(13, 3, 29, 1, 'yes', '2019-10-19 14:03:40'),
(14, 6, 29, 1, 'yes', '2019-10-23 09:16:58'),
(15, 9, 29, 1, 'yes', '2019-10-23 19:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `r_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `r_comment` text DEFAULT NULL,
  `r_status` tinyint(1) NOT NULL DEFAULT 0,
  `post_id` int(10) NOT NULL,
  `c_id` int(10) NOT NULL,
  `rdate` datetime NOT NULL,
  `rmage` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`r_id`, `user_id`, `r_comment`, `r_status`, `post_id`, `c_id`, `rdate`, `rmage`) VALUES
(1, 29, 'bfgdfgsdfghsd', 1, 5, 1, '2019-10-19 15:22:14', ''),
(2, 29, 'ðŸ˜­ðŸ˜­ðŸ˜„ðŸ˜Š', 1, 5, 1, '2019-10-20 12:44:49', ''),
(3, 29, 'ðŸ˜­ðŸ˜­ðŸ˜„ðŸ˜Š', 1, 5, 1, '2019-10-20 12:45:14', ''),
(4, 29, 'zxdcczxcðŸ˜­', 1, 5, 2, '2019-10-21 10:37:50', '');

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
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `skills` text NOT NULL,
  `s_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `user_id`, `skills`, `s_date`) VALUES
(1, 29, 'HTML', '2019-10-28 09:59:48'),
(2, 29, 'PHP', '2019-10-28 10:00:33'),
(3, 29, 'new', '2019-10-28 18:17:07'),
(5, 29, 'new', '2019-10-28 18:17:18'),
(6, 29, 'New India', '2019-10-28 18:18:18');

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
-- Table structure for table `user_education`
--

CREATE TABLE `user_education` (
  `edu_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `edu_title` text NOT NULL,
  `star_year` varchar(50) NOT NULL,
  `end_year` varchar(200) NOT NULL,
  `degree` text NOT NULL,
  `description` longtext NOT NULL,
  `edu_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_education`
--

INSERT INTO `user_education` (`edu_id`, `user_id`, `edu_title`, `star_year`, `end_year`, `degree`, `description`, `edu_date`) VALUES
(1, 29, 'Master of Computer Science', '2015', '2018', 'zx', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra.', '2019-10-28 06:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_experience`
--

CREATE TABLE `user_experience` (
  `exp_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `subject` text NOT NULL,
  `details` longtext NOT NULL,
  `exp_date` datetime NOT NULL,
  `exp_status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_experience`
--

INSERT INTO `user_experience` (`exp_id`, `user_id`, `subject`, `details`, `exp_date`, `exp_status`) VALUES
(12, 29, '', 'tesstsubject=Quotation for website development of venkateshwaraassociates.com', '2019-10-27 10:32:25', '1'),
(13, 29, 'Quotation for', 'fhgfhgfgh', '2019-10-27 10:33:11', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_image`
--

CREATE TABLE `user_image` (
  `img_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `profile_id` int(10) NOT NULL,
  `imgpath` text NOT NULL,
  `ses_id` varchar(100) NOT NULL,
  `gallery_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_image`
--

INSERT INTO `user_image` (`img_id`, `user_id`, `profile_id`, `imgpath`, `ses_id`, `gallery_name`) VALUES
(10, 29, 0, 'upload/68584Chrysanthemum.jpg', 'f85qu7j9n9e293m6dcorsvbvdh', 'kljlkjlk'),
(11, 29, 0, 'upload/68584Desert.jpg', 'f85qu7j9n9e293m6dcorsvbvdh', 'kljlkjlk');

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
  `post_date` datetime NOT NULL,
  `allpath` text NOT NULL,
  `postemos` text NOT NULL,
  `post_hide` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_post`
--

INSERT INTO `user_post` (`post_id`, `user_id`, `post_title`, `post_details`, `post_status`, `post_date`, `allpath`, `postemos`, `post_hide`) VALUES
(6, 29, NULL, 'test', 1, '2019-10-23 09:14:53', 'upload/34584591536729925GT.jpg,upload/34584591536730651LT.jpg,upload/34584591536942299aurangabad-ajanta-caves-0.jpg,upload/34584591536943059river-rafting250.jpg,upload/34584591536944468Popular-Books-on-Adventure.jpg', 'test', '1'),
(7, 29, NULL, 'testnew', 1, '2019-10-23 09:30:18', 'upload/95839555b93ab025dc58LKJJHJKLJKLJKL.jpg,upload/95839555b939ed1c15b8airpt.jpg', 'testnewðŸ˜’ðŸ˜³', '0'),
(8, 29, NULL, 'video test', 1, '2019-10-23 18:28:58', 'video/3255416introsss.mp4', 'ðŸ˜³', '0'),
(9, 29, NULL, 'f video test', 1, '2019-10-23 19:20:45', 'video/4890660intro.mp4', 'test', '0');

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
  `state` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `mobileno` varchar(12) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `intrest_in` varchar(200) NOT NULL,
  `cover_image_id` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`profile_id`, `user_id`, `image_id`, `old_image_id`, `update_date`, `lastupdate`, `current_city`, `twon`, `work`, `college`, `school`, `current_company`, `last_company`, `current_studied`, `address`, `website`, `about_user`, `intrest_area`, `termandcondition`, `zip_code`, `state`, `dob`, `mobileno`, `gender`, `intrest_in`, `cover_image_id`) VALUES
(5, 1, '2713454pic1.jpg', NULL, '2019-10-14 14:18:45', '0000-00-00 00:00:00', 'SAMASTIPUR', 'SAMASTIPUR', 'SAMASTIPUR', 'SAMASTIPUR', 'SAMASTIPUR', 'SAMASTIPUR', '', 'SAMASTIPUR', 'SAMASTIPUR', 'SAMASTIPUR', ' <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>', '', '1', '', 'SAMASTIPUR', '0000-00-00', '', '', '', ''),
(6, 29, '69110-.jpg', NULL, '2019-10-16 13:01:13', '0000-00-00 00:00:00', 'New Delhi Wala', 'South Delhi', '1', '1', 'Samastipur', 'webz-engine', '', '1', '1', 'facebook.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra.\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. ', '', '1', '', '1', '2019-10-16', '1236547890', 'Male', 'Female', '6301.jpg');

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
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `reward_point`
--
ALTER TABLE `reward_point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_document`
--
ALTER TABLE `upload_document`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `user_education`
--
ALTER TABLE `user_education`
  ADD PRIMARY KEY (`edu_id`);

--
-- Indexes for table `user_experience`
--
ALTER TABLE `user_experience`
  ADD PRIMARY KEY (`exp_id`);

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
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `company_document`
--
ALTER TABLE `company_document`
  MODIFY `com_d_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_page`
--
ALTER TABLE `company_page`
  MODIFY `com_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `error_log`
--
ALTER TABLE `error_log`
  MODIFY `error_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `f_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `like_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `r_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reward_point`
--
ALTER TABLE `reward_point`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `upload_document`
--
ALTER TABLE `upload_document`
  MODIFY `doc_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_education`
--
ALTER TABLE `user_education`
  MODIFY `edu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_experience`
--
ALTER TABLE `user_experience`
  MODIFY `exp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_image`
--
ALTER TABLE `user_image`
  MODIFY `img_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_post`
--
ALTER TABLE `user_post`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `profile_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
