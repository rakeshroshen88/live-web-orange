-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2019 at 02:57 AM
-- Server version: 10.2.29-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orangestate_chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` mediumtext COLLATE utf8mb4_bin NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL,
  `mp3` mediumtext COLLATE utf8mb4_bin DEFAULT NULL,
  `aplay` enum('1','0') COLLATE utf8mb4_bin NOT NULL DEFAULT '1',
  `f_userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`, `mp3`, `aplay`, `f_userid`) VALUES
(257, 19, 28, '5dd01b4d89de2yes boss.png', '2019-11-18 17:32:03', 0, '5dd01b4bb8f63YES BOSS.mp3', '0', 0),
(258, 28, 19, '5dd01b404e5b4who goes dia 2.png', '2019-11-18 17:38:56', 0, '5dd01b423fbc3WHO GOES DIA.mp3', '0', 0),
(259, 19, 28, '5dd01a7291105i don show.png', '2019-11-18 17:46:24', 0, '5dd01a70445f1I DON SHOW.mp3', '0', 0),
(260, 19, 28, '5dd019c373465clear road 1.png', '2019-11-18 17:46:48', 2, '5dd019c674c81CLEAR ROAD.mp3', '0', 0),
(261, 28, 19, '5dd01b23698a8tufiakwa 1.png', '2019-11-18 17:52:41', 0, '5dd01b2563389TUFIAKWA.mp3', '0', 0),
(262, 19, 28, '5dd019686260cado die 2.png', '2019-11-18 17:55:57', 2, '5dd0196d319dfADODIE.mp3', '0', 0),
(263, 19, 28, 'test', '2019-11-18 17:57:32', 0, NULL, '0', 0),
(264, 19, 28, '5dd01a8bccbe1naija 4 life 2.png', '2019-11-18 17:57:41', 0, '5dd01aa4f07e8NAIJA 4 LIFE.mp3', '0', 0),
(265, 32, 19, 'hlo', '2019-11-18 17:59:28', 0, NULL, '0', 0),
(266, 32, 19, '5dd01aac852d8nduk.png', '2019-11-18 17:59:33', 2, '5dd01aaa7e504NDUK.mp3', '0', 0),
(267, 28, 32, 'ADODIE.png', '2019-11-18 18:01:45', 0, 'ADODIE.mp3', '0', 0),
(268, 32, 19, '5dd01b2b7e296walai 2.png', '2019-11-18 18:40:19', 2, '5dd01b2f9faabWALAHI.mp3', '0', 0),
(269, 28, 19, 'ghfdjg', '2019-11-19 05:07:37', 0, NULL, '0', 0),
(270, 28, 19, 'vn', '2019-11-19 05:07:48', 0, NULL, '0', 0),
(271, 28, 19, 'ncv', '2019-11-19 05:07:55', 0, NULL, '0', 0),
(272, 28, 19, '12', '2019-11-19 05:18:49', 0, NULL, '0', 0),
(273, 28, 19, '5dd01b4d89de2yes boss.png', '2019-11-19 05:20:02', 0, '5dd01b4bb8f63YES BOSS.mp3', '0', 0),
(274, 28, 19, '121', '2019-11-19 07:23:37', 0, NULL, '0', 0),
(275, 28, 19, 'ABEGI1.png', '2019-11-19 07:23:53', 0, 'ABEGI.mp3', '0', 0),
(276, 28, 19, '5dd01b362438fukwu4.png', '2019-11-19 07:24:06', 0, '5dd01b3aa3f89UKWU.mp3', '0', 0),
(277, 28, 19, '5dd01b1a27fb6story de ground.png', '2019-11-19 07:24:14', 0, '5dd01b213f07cTORI DEY GROUND.mp3', '0', 0),
(278, 28, 19, '5dd01aa0d788diyammi 1.png', '2019-11-19 07:24:18', 0, '5dd01a9eee750IYAMMI.mp3', '0', 0),
(279, 28, 19, '5dd019c373465clear road 1.png', '2019-11-19 07:24:24', 0, '5dd019c674c81CLEAR ROAD.mp3', '0', 0),
(280, 28, 33, '5dd01b327efdfwahala dey1.png', '2019-11-19 14:40:14', 0, '', '0', 0),
(281, 28, 33, '5dd01b4d89de2yes boss.png', '2019-11-19 14:40:14', 0, '5dd01b4bb8f63YES BOSS.mp3', '0', 0),
(282, 28, 33, '5dd019895db63cabash.png', '2019-11-19 14:41:19', 0, '5dd0198f40023CABASH.mp3', '0', 0),
(283, 28, 33, '5dd019952b56dbiko.png', '2019-11-19 14:41:22', 0, '5dd0199b4a6e4BIKO.mp3', '0', 0),
(284, 28, 33, '5dd01b37f3090ukwu3.png', '2019-11-19 15:26:57', 0, '5dd01b3aa3f89UKWU.mp3', '0', 0),
(285, 28, 33, '5dd019ecf30d4dakkada1.png', '2019-11-19 15:26:57', 0, '5dd019f2a2138DAKADA.mp3', '0', 0),
(286, 28, 33, '5dd01ae38d454only God.png', '2019-11-19 15:27:04', 0, '5dd01abb7c5a8ONLY GOD.mp3', '0', 0),
(287, 28, 33, '5dd0195c5a65cabegi 2.png', '2019-11-19 15:27:09', 0, '5dd0195f5f911ABEGI.mp3', '0', 0),
(288, 28, 33, '5dd01a9ac3eb1jesu 1.png', '2019-11-19 15:27:15', 0, '5dd01a96c39e4JESU.mp3', '0', 0),
(289, 28, 33, '5dd01b275e9c2tufiakwa.png', '2019-11-19 15:27:21', 2, '5dd01b2563389TUFIAKWA.mp3', '0', 0),
(290, 28, 33, '5dd01a9ac3eb1jesu 1.png', '2019-11-19 15:27:28', 0, '5dd01a96c39e4JESU.mp3', '0', 0),
(291, 28, 33, 'sdffsf', '2019-11-19 15:37:15', 0, NULL, '0', 0),
(292, 28, 33, 'sdfsdf', '2019-11-19 15:37:18', 0, NULL, '0', 0),
(293, 28, 33, 'sdfsdf', '2019-11-19 15:37:19', 0, NULL, '0', 0),
(294, 28, 33, 'sdfsdf', '2019-11-19 15:37:19', 0, NULL, '0', 0),
(295, 28, 33, 'sdfsdf', '2019-11-19 15:37:19', 0, NULL, '0', 0),
(296, 28, 33, 'sdfsdf', '2019-11-19 15:37:19', 0, NULL, '0', 0),
(297, 34, 33, 'gu', '2019-11-19 15:47:41', 1, NULL, '1', 0),
(298, 34, 33, 'hi', '2019-11-19 15:47:43', 1, NULL, '1', 0),
(299, 34, 33, '5dd019dfbce98e dey pain u.png', '2019-11-19 15:48:06', 1, '5dd019d4207feE DEY PAIN YOU OH.mp3', '0', 0),
(300, 34, 33, '5dd01b13a522bshakara 1.png', '2019-11-19 15:48:09', 1, '5dd01b15dec8bSHAKARA.mp3', '0', 0),
(301, 34, 33, '5dd01b1a27fb6story de ground.png', '2019-11-19 15:48:12', 1, '5dd01b213f07cTORI DEY GROUND.mp3', '0', 0),
(302, 34, 33, '5dd019ea4bc72diaris god o 2.png', '2019-11-19 15:50:28', 1, '5dd019e461ab0DIARIS GOD OH.mp3', '0', 0),
(303, 34, 33, '5dd01b44851a6who u be 1.png', '2019-11-19 15:50:45', 1, '5dd01b480c4d6WHO YOU BE.mp3', '0', 0),
(304, 34, 33, '5dd01b2d5d3a9walai 1.png', '2019-11-19 15:50:45', 1, '5dd01b2f9faabWALAHI.mp3', '0', 0),
(305, 34, 33, '5dd01b2d5d3a9walai 1.png', '2019-11-19 15:50:45', 1, '5dd01b2f9faabWALAHI.mp3', '0', 0),
(306, 34, 33, '5dd01a795cab2i tire o 2.png', '2019-11-19 15:50:53', 1, '5dd01a7bb7c41I TIRE OH.mp3', '0', 0),
(307, 34, 33, '5dd01b11cbedarrasta2.png', '2019-11-19 15:52:18', 1, '5dd01abf1a03eRASTA.mp3', '0', 0),
(308, 34, 33, '5dd0197cd8d40area2.png', '2019-11-19 15:55:17', 1, '5dd01979ac1b2AREA.mp3', '0', 0),
(309, 34, 33, '5dd01a6b6c194how market.png', '2019-11-19 15:57:07', 1, '5dd01a6dbabe9HOW MARKET.mp3', '0', 0),
(310, 28, 33, '5dd01aa6c4d18naija 4 life.png', '2019-11-19 15:57:45', 0, '5dd01aa4f07e8NAIJA 4 LIFE.mp3', '0', 0),
(311, 28, 33, '5dd01a5c8b62ai don blow.png', '2019-11-19 16:00:20', 0, '5dd01a5f0eaa0I DON BLOW.mp3', '0', 0),
(312, 28, 33, '5dd0198631b8dcabash.png', '2019-11-19 16:06:38', 0, '5dd0198f40023CABASH.mp3', '0', 0),
(313, 28, 33, '5dd019b5e3257chill2.png', '2019-11-19 16:06:40', 0, '5dd019b0288adCHILL.mp3', '0', 0),
(314, 33, 19, 'hh', '2019-11-19 16:13:28', 0, NULL, '0', 0),
(315, 33, 19, 'mila', '2019-11-19 16:14:27', 0, NULL, '0', 0),
(316, 33, 19, 'msg', '2019-11-19 16:14:31', 0, NULL, '0', 0),
(317, 34, 33, '5dd01a795cab2i tire o 2.png', '2019-11-19 16:17:54', 1, '5dd01a7bb7c41I TIRE OH.mp3', '0', 0),
(318, 34, 33, 'sddsfd', '2019-11-19 16:18:03', 1, NULL, '1', 0),
(319, 32, 33, '5dd01b181d749shakara2.png', '2019-11-19 16:22:03', 1, '5dd01b15dec8bSHAKARA.mp3', '0', 0),
(320, 32, 33, '5dd01a9ac3eb1jesu 1.png', '2019-11-19 16:22:06', 1, '5dd01a96c39e4JESU.mp3', '0', 0),
(321, 32, 33, '5dd01aa6c4d18naija 4 life.png', '2019-11-19 16:22:07', 1, '5dd01aa4f07e8NAIJA 4 LIFE.mp3', '0', 0),
(322, 32, 33, '5dd01a897f515ifot.png', '2019-11-19 16:22:09', 1, '5dd01a876856dIFOOD.mp3', '0', 0),
(323, 32, 33, '5dd019a47b24abeta pikin 2.png', '2019-11-19 16:22:11', 1, '5dd019a16e293BETA PIKIN.mp3', '0', 0),
(324, 32, 33, '5dd019a47b24abeta pikin 2.png', '2019-11-19 16:22:12', 1, '5dd019a16e293BETA PIKIN.mp3', '0', 0),
(325, 32, 33, '5dd0197cd8d40area2.png', '2019-11-19 16:22:12', 1, '5dd01979ac1b2AREA.mp3', '0', 0),
(326, 32, 33, '5dd0197cd8d40area2.png', '2019-11-19 16:22:12', 1, '5dd01979ac1b2AREA.mp3', '0', 0),
(327, 32, 33, '5dd0197cd8d40area2.png', '2019-11-19 16:22:12', 1, '5dd01979ac1b2AREA.mp3', '0', 0),
(328, 32, 33, '5dd01b3e5cbbdu say 1.png', '2019-11-19 16:23:02', 1, '5dd01b4fcfb95YOU SAY.mp3', '0', 0),
(329, 32, 33, '5dd01b34563f0wahala dey.png', '2019-11-19 16:23:37', 1, '', '0', 0),
(330, 32, 33, '5dd01a68e17eci de hail o 1.png', '2019-11-19 16:23:40', 1, '5dd01a6379a8eI DEY HAIL OH.mp3', '0', 0),
(331, 32, 33, '5dd019e76697ddiaris god o.png', '2019-11-19 16:23:41', 1, '5dd019e461ab0DIARIS GOD OH.mp3', '0', 0),
(332, 19, 33, 'hi', '2019-11-19 16:24:47', 0, NULL, '0', 0),
(333, 19, 33, '5dd01b11cbedarrasta2.png', '2019-11-19 16:24:55', 0, '5dd01abf1a03eRASTA.mp3', '0', 0),
(334, 34, 19, 'zxcxzc', '2019-11-19 16:25:23', 1, NULL, '1', 0),
(335, 28, 33, 'hi', '2019-11-19 16:25:58', 0, NULL, '0', 0),
(336, 19, 33, 'hi', '2019-11-19 16:38:04', 0, NULL, '0', 0),
(337, 19, 33, '5dd019aade990Calm down.png', '2019-11-19 16:38:35', 0, '5dd0197fd95bcCALM DOWN.mp3', '0', 0),
(338, 32, 33, '5dd01aac852d8nduk.png', '2019-11-19 16:39:32', 1, '5dd01aaa7e504NDUK.mp3', '0', 0),
(339, 32, 35, 'sfdsfd', '2019-11-19 17:43:50', 1, NULL, '1', 0),
(340, 33, 35, '5dd01ab42f976odeshi 2.png', '2019-11-19 17:43:58', 1, '5dd01aaecc413ODESHI (2).mp3', '0', 0),
(341, 37, 19, 'Hi sir', '2019-11-19 19:22:44', 0, NULL, '0', 0),
(342, 37, 19, '5dd01b49c468byes boss 1.png', '2019-11-19 19:23:34', 0, '5dd01b4bb8f63YES BOSS.mp3', '0', 0),
(343, 36, 37, 'hi', '2019-11-19 19:25:11', 1, NULL, '1', 0),
(344, 19, 37, 'Hi Raj', '2019-11-19 19:26:05', 0, NULL, '0', 0),
(345, 19, 37, '5dd01ae38d454only God.png', '2019-11-19 19:26:11', 0, '5dd01abb7c5a8ONLY GOD.mp3', '0', 0),
(346, 19, 37, '5dd01a68e17eci de hail o 1.png', '2019-11-19 19:26:17', 0, '5dd01a6379a8eI DEY HAIL OH.mp3', '0', 0),
(347, 19, 37, 'Please send me an emoji', '2019-11-19 19:26:43', 0, NULL, '0', 0),
(348, 37, 19, 'ABEGI.png', '2019-11-19 19:26:56', 0, 'ABEGI.mp3', '0', 0),
(349, 37, 19, '5dd01adea1f43peace 2.png', '2019-11-19 19:27:07', 0, '5dd01adb83a30PEACE.mp3', '0', 0),
(350, 37, 19, '5dd0196565441ado die 1.png', '2019-11-19 19:27:19', 0, '5dd0196d319dfADODIE.mp3', '0', 0),
(351, 36, 19, '12', '2019-11-19 19:29:24', 1, NULL, '1', 0),
(352, 19, 37, 'I\'m not hearing the voice', '2019-11-19 19:30:26', 0, NULL, '0', 0),
(353, 34, 37, '5dd01b362438fukwu4.png', '2019-11-19 20:07:13', 1, '5dd01b3aa3f89UKWU.mp3', '0', 0),
(354, 34, 37, '5dd01b11cbedarrasta2.png', '2019-11-19 20:07:20', 1, '5dd01abf1a03eRASTA.mp3', '0', 0),
(355, 34, 37, '5dd01a68e17eci de hail o 1.png', '2019-11-19 20:07:36', 1, '5dd01a6379a8eI DEY HAIL OH.mp3', '0', 0),
(356, 34, 37, '5dd01a9ac3eb1jesu 1.png', '2019-11-19 20:07:51', 1, '5dd01a96c39e4JESU.mp3', '0', 0),
(357, 19, 40, 'hi', '2019-11-20 07:47:44', 0, NULL, '0', 0),
(358, 19, 40, '5dd01b362438fukwu4.png', '2019-11-20 07:47:57', 0, '5dd01b3aa3f89UKWU.mp3', '0', 0),
(359, 19, 40, '5dd01b362438fukwu4.png', '2019-11-20 07:47:57', 0, '5dd01b3aa3f89UKWU.mp3', '0', 0),
(360, 19, 40, '5dd01b362438fukwu4.png', '2019-11-20 07:47:57', 0, '5dd01b3aa3f89UKWU.mp3', '0', 0),
(361, 19, 37, 'Hi Raj, just checking', '2019-11-21 03:07:38', 0, NULL, '0', 0),
(362, 19, 37, '5dd01ad8372capeace.png', '2019-11-21 03:07:58', 0, '5dd01adb83a30PEACE.mp3', '0', 0),
(363, 37, 19, 'ADODIE.png', '2019-11-22 12:38:40', 0, 'ADODIE.mp3', '0', 0),
(364, 37, 19, 'ABEGI1.png', '2019-11-22 12:38:44', 0, 'ABEGI.mp3', '0', 0),
(365, 37, 19, 'ABEGI.png', '2019-11-22 12:38:48', 0, 'ABEGI.mp3', '0', 0),
(366, 39, 19, '5dd01b4d89de2yes boss.png', '2019-11-22 12:39:15', 1, '5dd01b4bb8f63YES BOSS.mp3', '0', 0),
(367, 35, 19, 'ADODIE1.png', '2019-11-22 12:39:22', 1, 'ADODIE.mp3', '0', 0),
(368, 35, 19, '5dd01a9ac3eb1jesu 1.png', '2019-11-22 12:39:29', 1, '5dd01a96c39e4JESU.mp3', '0', 0),
(369, 32, 19, 'ABEGI.png', '2019-11-22 12:39:44', 1, 'ABEGI.mp3', '0', 0),
(370, 28, 19, '5dd01b0fa4d5errasta.png', '2019-11-22 12:39:56', 0, '5dd01abf1a03eRASTA.mp3', '0', 0),
(371, 19, 28, '5dd01b11cbedarrasta2.png', '2019-11-22 12:50:14', 0, '5dd01abf1a03eRASTA.mp3', '0', 0),
(372, 28, 19, '5dd01a5c8b62ai don blow.png', '2019-11-22 12:50:14', 0, '5dd01a5f0eaa0I DON BLOW.mp3', '0', 0),
(373, 33, 28, 'hello', '2019-11-22 13:41:23', 1, NULL, '1', 101),
(374, 32, 28, 'hello', '2019-11-22 13:42:00', 1, NULL, '1', 101),
(375, 32, 28, 'hello', '2019-11-22 13:42:16', 1, NULL, '1', 101),
(376, 32, 28, 'hello', '2019-11-22 13:42:44', 1, NULL, '1', 101),
(377, 32, 28, 'hi', '2019-11-22 13:43:07', 1, NULL, '1', 101),
(378, 34, 19, '5dd01aac852d8nduk.png', '2019-11-22 13:57:57', 1, '5dd01aaa7e504NDUK.mp3', '0', NULL),
(379, 34, 19, '5dd01b29503b9who goes dia 1.png', '2019-11-22 13:58:05', 1, '5dd01b423fbc3WHO GOES DIA.mp3', '0', NULL),
(380, 34, 19, 'hi', '2019-11-22 13:58:15', 1, NULL, '1', NULL),
(381, 32, 19, '5dd01aa897ec0nduk 2.png', '2019-11-22 13:58:38', 1, '5dd01aaa7e504NDUK.mp3', '0', NULL),
(382, 32, 19, '5dd01aa6c4d18naija 4 life.png', '2019-11-22 14:01:35', 1, '5dd01aa4f07e8NAIJA 4 LIFE.mp3', '0', NULL),
(383, 34, 19, 'hi\nhi', '2019-11-22 14:03:31', 1, NULL, '1', 92),
(384, 34, 19, '5dd01b181d749shakara2.png', '2019-11-22 14:03:40', 1, '5dd01b15dec8bSHAKARA.mp3', '0', NULL),
(385, 28, 19, 'yes', '2019-11-22 14:09:41', 0, NULL, '0', 92),
(386, 19, 28, '5dd01b462fad4who u be 2.png', '2019-11-22 14:11:06', 0, '5dd01b480c4d6WHO YOU BE.mp3', '0', NULL),
(387, 19, 28, '5dd01b4d89de2yes boss.png', '2019-11-22 14:12:37', 0, '5dd01b4bb8f63YES BOSS.mp3', '0', NULL),
(388, 39, 37, 'hi andy', '2019-11-22 15:21:14', 1, NULL, '1', 124),
(389, 39, 37, 'ADODIE1.png', '2019-11-22 15:21:52', 1, 'ADODIE.mp3', '0', NULL),
(390, 39, 37, '5dd01aac852d8nduk.png', '2019-11-22 16:12:41', 1, '5dd01aaa7e504NDUK.mp3', '0', NULL),
(391, 39, 55, 'Hi Andy', '2019-11-23 13:14:53', 1, NULL, '1', 148),
(392, 19, 55, '5dd01a949477fjesu.png', '2019-11-23 13:15:38', 1, '5dd01a96c39e4JESU.mp3', '0', NULL),
(393, 37, 56, 'Hello Sir', '2019-11-23 14:10:16', 1, NULL, '1', 149),
(394, 40, 55, 'ghk', '2019-11-23 16:10:03', 1, NULL, '1', 148),
(395, 28, 19, 'hi', '2019-11-25 10:10:30', 0, NULL, '0', 92),
(396, 19, 28, 'hello', '2019-11-25 10:11:42', 1, NULL, '1', 101);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `f_userid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `password`, `name`, `f_userid`) VALUES
(19, 'raj@gmail.com', '$2y$10$ASIdHpQb/UKDbyq1beeJuuHVW7fzsA0EI3llMDHjwqT7RYvOWxGJ2', 'Raj\r\n', NULL),
(28, 'PANDEY@GMAIL.COM', '$2y$10$LgtTzPcvBwvVktw71N.JYu3xDVLtbXnz.mYscsj20zHuu5LsmyMYW', 'VINOD', NULL),
(32, 'ravikumar030499@gmail.com', '$2y$10$PV/PADqvsOzDrpqJDIIOGuAaFYoO79MhjYXgzBuJo1W6J.LFFnDIu', 'RAVI', NULL),
(33, 'sdfsdfsdomsdf@gmail.com', '$2y$10$xPgJBTlz.0ViWN/T2PYK1OpOl7pQ53C2BehBX4YQwIc.ZJJo2WpnS', 'hdsflsdlf', NULL),
(34, 'hellosimdsfsdf@123.com', '$2y$10$R22wzYGBsPHLlBKIme3hJuGDNkThhPa/KmZH2fHpF0QA/9JJC1qrO', 'sachin', NULL),
(35, 'sdfdsfp@gmail.com', '$2y$10$IKVnFvWCf85JOTWoMyBXL.kwrFY3Wq.Vn6RyxEbkJlyjqA.eJ3Cha', 'jdsfdsjfsdf', NULL),
(37, 'agim@webguru.ng', '$2y$10$xWJk18JmCe7q9Lzd.RJAWOU7tOBqGwDZSyagA1J8DiZX0goBTFwAW', 'Agim', NULL),
(39, 'omdsfdsfsfsdfsdf@gmial.com', '$2y$10$ANR7BcObqtDxYSr.ipTxCeBTnvqQoRLTBTqbnDfzjUiKANgQOvvni', 'Andy', NULL),
(40, 'sdfmomsdfmsd@gmail.com', '$2y$10$MoIEQ/2UTfFet6S2gUn3quxY2Lxpz9PoyQHfCIRujlRzyDYqRcJwy', 'sdfsd', NULL),
(41, 'agimikwen@gmail.com', '$2y$10$tUUnC9/Hmndu.BHiB.qMNuktrFLC/yx9KpCNBsl8N9UsvrOC0SRqm', 'Agim', NULL),
(42, 'shirem@gmail.com', '$2y$10$mjqK8PwwJ7SMBaY2PV68iOiFEYUHZ0z9vP.UPid3sQ6C3muSsT6K.', 'shire', NULL),
(43, 'rakeshroshen88@gmail.com', '$2y$10$1Hxl5ZDkTrDYrD.WO2ijMe/l576lLbey1e3oCYRJo3arUxuJotc/q', 'yaho', NULL),
(44, 'helloss@gmail.com', '$2y$10$seQSzFETPGygH6QWLu.WR.67nlcmBKGDOac5UKig0yDfFeBPW8rjO', 'shiren', NULL),
(45, 'shiremsfddsfsd@gmail.com', '$2y$10$sjnXBd3bp35PjoBr4dqY8.RFpElxStl0quMDBPFuBC1bCTm4wtGhe', 'shiren', NULL),
(46, 'c.k.roy930@gmail.com', '$2y$10$3ZXWKncT9cGRATlLFWwtFe7WEPTYMTuevlo/Bi4u85OM35T6hqj8e', 'Roy', NULL),
(47, '15sdfdsf@gmai.com', '$2y$10$x7xx/93gxFABZSSrMp.mee879lWPV2Rcpb2S3MSrGoSS9JyVN4Boe', 'simsdfsdf', NULL),
(48, 'fsdfomfdsf@gmail.com', '$2y$10$cFXR18EPsM9LnPgXSKCoNOXB/fb3Ni1R.jT8T6fxnI97XfwfVXEVq', 'sdfhisdf', NULL),
(49, 'mbuotidem.ukpe@orangestate.ng', '$2y$10$pyF8Gf5vILm2UNrj8YNMw.oMVPPN84YeHaQjBeiHaVW6UuMydR.LS', 'Mbuotidem', NULL),
(50, 'mbuotidem.ukpe@orangestate.ng', '$2y$10$GPq05A5aG3N8nF2Pc6fqPeBrJTXiFBOFctRQEpmoBz5i6WP2dBWdi', 'Mbuotidem', NULL),
(51, 'mbuotiandu2@gmail.com', '$2y$10$c.3CpgxEj6OH.IrjYU3Upeh5.YaLEaMXBQgH7jzLXNlvE/BcV2d9e', 'Mbuotidem', NULL),
(52, 'jhonebong@gmail.com', '$2y$10$mzzA/Q66mT6dW5d5cUMJZ.vn8fAsV6bxnAnZzfKWIdtKhJ3kvapH.', 'jhon', NULL),
(53, 'mbuotiandu2@gmail.com', '$2y$10$.zCkCq6iqBcY95CEHcCiquS/BjkdOJsceGVGVeuBbMaLVXOLQlsfy', 'Mbuotidem', NULL),
(54, 'mbuotiandu2@gmail.com', '$2y$10$V55.PJVXZZQuFEjSwRkKKOqTdtrZP9ivMO/jg3reUQxlBGRG7c.8O', 'Mbuotidem', NULL),
(55, 'agimikwen@yahoo.com', '$2y$10$CGm4V0NuAd3PTjYUxIwR9OYruD/dvnaQj90.ll69Ujf3.nL6a1d4a', 'Agim', NULL),
(56, 'ofofonediene@gmail.com', '$2y$10$N3Msq4d7QrKMk4z7IBEN5OjO9QWXBhZNUwxjaiJshLjomci60yG42', 'Ediene', NULL),
(57, 'chinelombamalu@gmail.com', '$2y$10$pf.uH0PJpkBFSyz6KHEf9.Q7elzbmB4EqC5BDv.wX.9PYbj5HxhJC', 'Stephanie ', NULL),
(58, 'ugwusolomonobinna@gmail.com', '$2y$10$3Z0V0TfI0mANWpz8DEefq.n6g6JdCLAdAWpeav3jpixyRWs1xZ7FW', 'Solomon', NULL),
(59, 'pascalineorji81@gmail.com', '$2y$10$XKjdq/vcc8oz.c/KZd3DnuFtPKTFFprAm0SjbGCLLlg4j.hHXNwem', 'Ada', NULL),
(60, 'tochukwuchinedu21@gmail.com', '$2y$10$jRI5l8bUU97F6XFnPr6Pj.heo9hsd519uHcnmA6yCNBUxX6sQxICy', 'Tochukwu', NULL),
(61, 'buchianike@gmail.com', '$2y$10$mstQV6upYsF0E7/5TrYDUuYBTw.eoU3c2uLBXEOYclYZX2.Lrv5pS', 'Onyebuchi ', NULL),
(62, 'pascalineorji81@gmail.com', '$2y$10$rDeE4JiFJGVqNr0ptH7TIOgkuHVo7o4u1M2tOz8ckxRD4VaoFCAa2', 'Ada', NULL),
(63, 'pascalineorji81@gmail.com', '$2y$10$FyaKep9xUBOMjxqI2Q0.7.chqEZIJhZPsTgtkxgbrzxBHR3mTveYm', 'Ada', NULL),
(64, 'maryjessicaasouzu@gmail.com', '$2y$10$sPJ3JWTLHS9Bt5Ga0rJBFujK.ImhZ1om35qShZ2RVNoDyWPBdwGFW', 'Amaka', NULL),
(65, 'pascalineorji81@gmail.com', '$2y$10$uJwIRJVjrC.jm5Na9Yf.Kuh0D6N/roPq8uuJP7ZPCDaj9/655x1dy', 'Ada', NULL),
(66, 'pascalineorji81@gmail.com', '$2y$10$uVglfmC/WqVwFNmq4XygjOFavCJBoKzQeeqWTfnDxwASWAiaHRvoa', 'Ada', NULL),
(67, 'pascalineorji81@gmail.com', '$2y$10$NfPyUfeDvFCbhpqvuWvMoOTyJqqnCbyzp9P0qRauAH1am9hm3Adwi', 'Ada', NULL),
(68, 'udazike@gmail.com', '$2y$10$e2oAPk6IywSDvG69fUvAkOwRz3opXUrxmcQ4fLjkMxyVTDjDgZ4ca', 'Udochukwu', NULL),
(69, 'pascalineorji81@gmail.com', '$2y$10$1/PPOns21cqCCecea57waeR6GbTJ1U/HiZQARF5DXSmY4YkyV/JSK', 'Ada', NULL),
(70, 'onuorahanthony07@gmail.com', '$2y$10$icD1BlFdC8SQq5P7W1UrCOPrDgFSInppBiti5UEJVxKFb8Z7zeLOa', 'Anthony ', NULL),
(71, 'pascalineorji81@gmail.com', '$2y$10$AXcf.66KSg4zLHzHJg75s.0/8Lh96Lv5qyMms27RiPcmGL.NYbqzm', 'Ada', NULL),
(72, 'pascalineorji81@gmail.com', '$2y$10$QvbYmy60pjA8dorrFrKZMOTUTDctjm8DjxltwNTMM.xY3kr8CJ/tm', 'Ada', NULL),
(73, 'pascalineorji81@gmail.com', '$2y$10$ZroPHgK8GWvnhYj3IjG2rOPFxvlh06gpIA.zAPpNsujl6dQXKLtim', 'Ada', NULL),
(74, 'pascalineorji81@gmail.com', '$2y$10$F7/q1zi.3b34VolFF./WAuuB33XdBKLLLYO8II8asd2yPE6La1NBy', 'Ada', NULL),
(75, 'stevedyke4real@gmail.com', '$2y$10$hM6qoUEchK2YAk2g9lxRRO8z4spJ1QYhHYD5l1k0IPW2ThHwBmSNO', 'Dike', NULL),
(76, 'pascalineorji81@gmail.com', '$2y$10$jRmzWyiWC5bK6O/FSJ8qxOYDgxUDpg5KLMP9w8hoFmDSEG4EuFbSy', 'Ada', NULL),
(77, 'pascalineorji81@gmail.com', '$2y$10$/B9j/SWHLhi1Fee/NDta9.4aqHOZNMfYjcxnW9WgOOiCqsUhAwquW', 'Ada', NULL),
(78, 'udazike@gmail.com', '$2y$10$2rq4r/ZvH8iiBUhitI/eXem5FrOUYM/MA6cCUtu1urQ.zCk1.24aq', 'Udochukwu', NULL),
(79, 'pascalineorji81@gmail.com', '$2y$10$XmcXUiNsyqk800R3rB70p.RxoOImkZ0IcSBq9hU2Adb/r7fWQwc0a', 'Ada', NULL),
(80, 'pascalineorji81@gmail.com', '$2y$10$Pg2EbKoJJIA5fN.zIhyBN.mgMD9niX6cNbvqAJFd9mlZ8JbpqSHKS', 'Ada', NULL),
(81, 'onuorahanthony07@gmail.com', '$2y$10$FTljc/eY7qhGGDOcc93C4OmCEJlpk.9tAm2aXbs8UMIbY15h2fu9.', 'Anthony ', NULL),
(82, 'pascalineorji81@gmail.com', '$2y$10$py1ZqwCUIBpt9rkzVxhll.dUXjoAciXd68WJUzYtYwMcDvYVYIWPy', 'Ada', NULL),
(83, 'pascalineorji81@gmail.com', '$2y$10$Lt8omPGnOqTQucGEmAJ4qOeWCLCkOYF6mjijbwolA7l2PFcTGA7Ou', 'Ada', NULL),
(84, 'pascalineorji81@gmail.com', '$2y$10$FL9KB0SzCVnm38r.EQvKk.Tijtjit3pPTjY.7DdrerXDSREn09ode', 'Ada', NULL),
(85, 'pascalineorji81@gmail.com', '$2y$10$uJm2aTUhXneYeq2nAb0XeOEIhKVkIdVqSvUhbTyY4N6hD0j3M1iPO', 'Ada', NULL),
(86, 'stevedyke4real@gmail.com', '$2y$10$/3sNtgOAVwNUmYtCKbPbnOGOkUyIowBDs/9gojrgGkp67bcOM3w/a', 'Dike', NULL),
(87, 'pascalineorji81@gmail.com', '$2y$10$mcLwO7ppX11q1Pa7PnVIfejtIY.WJn.WMtPbads2NUPnf0ZCjIL.q', 'Ada', NULL),
(88, 'pascalineorji81@gmail.com', '$2y$10$kq0J9aaiz1tkxjUuziIIROwLpB5dWSci8ipchznMUtknsKNWZGHzq', 'Ada', NULL),
(89, 'stevedyke4real@gmail.com', '$2y$10$vzl2FIKCypJ3.sG/NGZeXe.Sh.ZylDERGoK3/VFb2U3UxZF4pnmuy', 'Dike', NULL),
(90, 'pascalineorji81@gmail.com', '$2y$10$iRq8S6lSiKyWUn0oGooiXeOvtjaIa91oGLtgfADjY9GqdcHYhS1vW', 'Ada', NULL),
(91, 'chikwendulota@gmail.com', '$2y$10$J7eVez5oqNwCHXGFaxP7KeGnuFEvErGCaZRq5swHiyx9zsoEhF9Ey', 'Chikwendu', NULL),
(92, 'pascalineorji81@gmail.com', '$2y$10$53FiY0//fSnwlpKN2IDLBeXgdoAJrcPjcjAV1DtBTJ8llCn9NwVlK', 'Ada', NULL),
(93, 'pascalineorji81@gmail.com', '$2y$10$t4WW/V/aKAE9eWyAzPIOuO1SwrVP8CzfF8lf0Sb8jAUPuv7GxQ.92', 'Ada', NULL),
(94, 'noemic13@yahoo.com', '$2y$10$WmI6j3Op6Ah47vMnLWz8OeVGNFm4t3gsvAq1yGqdV4GlrPpHQoFL6', 'Michael', NULL),
(95, 'pascalineorji81@gmail.com', '$2y$10$zBgEz2XliVAA6qZaEIIVv.bqIUqsDTuatYO/pbX8WFQQR65pAV1hG', 'Ada', NULL),
(96, 'obiekezieirenee@gmail.com', '$2y$10$qpPbov.5Q56RrQAEpzmi6uPMn5aIwlsaa392nIn3DzlLQaG2kHedq', 'Irene', NULL),
(97, 'pascalineorji81@gmail.com', '$2y$10$F4o/gBvRouh2WYvziaSEXOq3Vd6xPA4TtZYui5b.zRz/h56tJb0Qy', 'Ada', NULL),
(98, 'udazike@gmail.com', '$2y$10$/VU9mSaMojxwuzmEm8FuDeHxf3LmBg0vWghCU9F1n2JM7JXVbSVvy', 'Udochukwu', NULL),
(99, 'pascalineorji81@gmail.com', '$2y$10$LWuj8MQdaFpGietUCoamfeq2V6VhvV/5wt92d7hgpmSH.DV5yXXzq', 'Ada', NULL),
(100, 'pascalineorji81@gmail.com', '$2y$10$s1daxuOcb8RHKDuwZ8BtnO5xn/SFXCXkrfSQPLfFqBGzqyEHX/GmK', 'Ada', NULL),
(101, 'obiekezieirenee@gmail.com', '$2y$10$SKAm2rttIboehACB8I5dt.4OgsU4NTWDarQZoasHLBPMuVaWxPK7.', 'Irene', NULL),
(102, 'pascalineorji81@gmail.com', '$2y$10$6sdQ3n3alSUO9HruJXb3puh3L.Fg27LNLf1RSVXAZXE3VcM46Z8zq', 'Ada', NULL),
(103, 'pascalineorji81@gmail.com', '$2y$10$dxfcjeuvyl/A5eTtSa7jKeAH3YcfAgOKVDgDZJcMNt8U8JUySFUxy', 'Ada', NULL),
(104, 'obiekezieirenee@gmail.com', '$2y$10$3UFSBdkQR53GkvCRHh4GZOx/rm8QFvMGrlBrN7ggXdylnpyU6CgY6', 'Irene', NULL),
(105, 'pascalineorji81@gmail.com', '$2y$10$Zt4lI/OVcUIL5iHqz3g65uecomAqph0TBZo0bZa2nU5nyGv7Fc9GC', 'Ada', NULL),
(106, 'pascalineorji81@gmail.com', '$2y$10$9rXYeDvVXgFRmLAGbUsRd.ZdQLLqBna.vLdVziR3spo3T8PX0HCq6', 'Ada', NULL),
(107, 'pascalineorji81@gmail.com', '$2y$10$9EzTs4GUuPDzVIsgyvoy0.idQBX6XLTZil4IHGvFF73pJflorAJfy', 'Ada', NULL),
(108, 'pascalineorji81@gmail.com', '$2y$10$xHb2lOK1YDsYzq6xN611MOg4TqOt0MkMpkA5j04I6XD9/bVnCvwea', 'Ada', NULL),
(109, 'pascalineorji81@gmail.com', '$2y$10$XU6c1VhBtrJ1QwfDNMSpw.gabs2igJbCzq36yzbvoNpY.hWNM6PTS', 'Ada', NULL),
(110, 'pascalineorji81@gmail.com', '$2y$10$5AZi67Wq.v9lx1b70LBkdu/OPq9gwgAFt4e9gmhQocrycJ.FkXDcW', 'Ada', NULL),
(111, 'pascalineorji81@gmail.com', '$2y$10$yhW8e7Qf8blSJpYuCa0WxuU3k0onZoCEEr6nVTmlOvJ/NJOsCzpPq', 'Ada', NULL),
(112, 'obiekezieirenee@gmail.com', '$2y$10$fPPvjpcNDkadTHBdxLT8nu6lOzX1LVEJH.IOI2F3cwXzG3Fyg5Igy', 'Irene', NULL),
(113, 'pascalineorji81@gmail.com', '$2y$10$yxFJpbkgUbtAgIcL2rdz3ufckqoxXkjeW1hKWYzGz52IdVqkRFguW', 'Ada', NULL),
(114, 'obiekezieirenee@gmail.com', '$2y$10$Ek0Y07eS.Qg5YJgfBFNxie9ULC9IfuuU.F/eoh.BB3DMuDLn18Vnm', 'Irene', NULL),
(115, 'pascalineorji81@gmail.com', '$2y$10$gjUtzKwpFQ45OT4UgPMR.eP5HnSfYP.R8kvlx2p8pS4NUiFvfSDry', 'Ada', NULL),
(116, 'obiekezieirenee@gmail.com', '$2y$10$l8VgK5nKbIW0QmaoWnyYsOFobSbLDUAHNzo7es5dV64Wfx64WVFEC', 'Irene', NULL),
(117, 'pascalineorji81@gmail.com', '$2y$10$KrVvvAoFTWOEwlYKwOIAGeYgL1eJ3wN8d8sK1R3jIf2cZZoM7b36W', 'Ada', NULL),
(118, 'pascalineorji81@gmail.com', '$2y$10$/mvAmSNHtna/POubT47zoOSlJANE0f/Cres950s0vCDrDH8Qh2iia', 'Ada', NULL),
(119, 'obiekezieirenee@gmail.com', '$2y$10$/73Rj5/QDpB5qLyZOh0XMe0ECnJIkElMVC7Y83iQnmEoF0NCWZfrq', 'Irene', NULL),
(120, 'pascalineorji81@gmail.com', '$2y$10$/lS7pvPXiordYcS4SDFntOfutHdrrltonRxgpCnyECXHgl9EYx.N.', 'Ada', NULL),
(121, 'pascalineorji81@gmail.com', '$2y$10$rtM2zGSKe9PrgnB8rFTNY.V9NTWM9/l10OWJ5X3v9b6RgJAcspLr6', 'Ada', NULL),
(122, 'obiekezieirenee@gmail.com', '$2y$10$Nec4CLd8oBosiFKpLCVx5u4mXE0iwsyjCZmwCx.0U3KDTXMfpE73u', 'Irene', NULL),
(123, 'pascalineorji81@gmail.com', '$2y$10$X/fnIHZH4cauVNaW9hXaJOITKU05gxLzQEEpjv0L.VPC1uNMrmRWi', 'Ada', NULL),
(124, 'pascalineorji81@gmail.com', '$2y$10$54yjNotLryNhQE28dWh4l.OWQapN.ZK1JIUVpUsZY5iCH9U4.LmMS', 'Ada', NULL),
(125, 'pascalineorji81@gmail.com', '$2y$10$x5Gc6c.tGHBoJ7D9RJpa8efQHdHPopD1ctPHJYBeb4R8H7hdbcJLG', 'Ada', NULL),
(126, 'pascalineorji81@gmail.com', '$2y$10$qkORxZVTCcGlBnZCUxdkg.uPbUTXtLOmmB8kLR7lAhjzAFYafu3Jm', 'Ada', NULL),
(127, 'pascalineorji81@gmail.com', '$2y$10$VUFleB8C4AtBQCtCiDPV.eKsnvmSiix6roySHPjlpk.XhPzxbMOk2', 'Ada', NULL),
(128, 'pascalineorji81@gmail.com', '$2y$10$8IhZMwhzXu1FqGBg4N3c9ugMU65h0TQk8y00h7icp4OirK/IsWbxS', 'Ada', NULL),
(129, 'pascalineorji81@gmail.com', '$2y$10$hUa6EqWIgPTDZrfcwnGZ7.dnKp/mf2byjKIL85acsKK49OKtewD4C', 'Ada', NULL),
(130, 'pascalineorji81@gmail.com', '$2y$10$IpLlCd558NEDxzJLCNWP5O0QtR8IpBgkc57NWu2YMSzFQP9fB1pjK', 'Ada', NULL),
(131, 'pascalineorji81@gmail.com', '$2y$10$y4/mZZtaERSmPP8X..OQA.UXUQi9Uawhi1nBAeTJE/VXLImSutMOi', 'Ada', NULL),
(132, 'pascalineorji81@gmail.com', '$2y$10$mIlFMQl82rUEFS05vkLLAOqleu9eaDHA6TlMDaXxCVF0vt/Vctx6q', 'Ada', NULL),
(133, 'amakaasouzu7@gmail.com', '$2y$10$W7VbUD/G9Foi4zR7/N9vnOR1uUPWs6wXOF4Yjieb8KjPIPTuqBLGi', 'Amaka', NULL),
(134, 'aniwhatz@gmail.com', '$2y$10$K329LrF.4QwAIqHKB1TpiuouAoHu..hJWWXy3dsg8YmdqhJNfeFlq', 'ani', NULL),
(135, 'aniwhatz@gmail.com', '$2y$10$o8RO/lTaMn7QMiaXjgp6qeagw13vIn6PYzyecc.3XG.TgmTCpZrdS', 'ani', NULL),
(136, 'mbuotiandu2@gmail.com', '$2y$10$v5klKq/pMjkNwGWPvsbJ7.b2KmbCRu36or1dHcCLkjpr4dElaROHW', 'mbuotidem', NULL),
(137, 'mbuotiandu2@gmail.com', '$2y$10$OzZ.dyPuG82teq2IG/3Qo.bf/lGFcxVyWSLZH6hu6dPGaou3o6kUy', 'Mbuotidem ', NULL),
(138, 'mbuotiandu2@gmail.com', '$2y$10$4FvL9ocmacebwz5OiL5/BO787sYWNtAnVweG0aUkXoBM.bESJJhcq', 'Mbuotidem ', NULL),
(139, 'mbuotiandu2@gmail.com', '$2y$10$pCAcSjPOMFci9CO6y.jWnebd3N76lWho2MgZyhAZzWOur8ehB0q6a', 'Mbuotidem ', NULL),
(140, 'mbuotiandu2@gmail.com', '$2y$10$At76BvXGbwIGpfN9BieOvehCTVS5O3FLI4ysrA14UM18t/kG2dKLW', 'Mbuotidem', NULL),
(141, 'mbuotiandu2@gmail.com', '$2y$10$9ScPkXxVXiCDGriF8UBjYebxS5A1GC15gPSoUzhdI.VozSe2ZiT2W', 'Faith', NULL),
(142, 'mbuotiandu2@gmail.com', '$2y$10$n38Qdj2WwtgxZiMxm/HhsOqwGH2s5HkLlhG0EHh6WSecD4e8lFIC2', 'Faith', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_type` enum('no','yes') NOT NULL,
  `status` enum('Online','Offline') NOT NULL DEFAULT 'Offline'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`, `status`) VALUES
(88, 3, '2019-11-15 11:19:18', 'no', 'Offline'),
(89, 1, '2019-11-15 11:19:38', 'no', 'Offline'),
(90, 3, '2019-11-15 11:58:16', 'no', 'Offline'),
(91, 39, '2019-11-15 11:45:34', 'no', 'Online'),
(92, 2, '2019-11-15 11:48:58', 'no', 'Offline'),
(93, 5, '2019-11-15 11:49:22', 'no', 'Offline'),
(94, 4, '2019-11-15 11:49:37', 'no', 'Offline'),
(95, 6, '2019-11-15 13:43:19', 'no', 'Offline'),
(96, 7, '2019-11-15 08:00:00', 'no', 'Offline'),
(97, 8, '2019-11-15 17:01:11', 'no', 'Offline'),
(98, 6, '2019-11-15 17:20:19', 'no', 'Online'),
(99, 8, '2019-11-15 17:20:27', 'no', 'Online'),
(100, 8, '2019-11-16 01:48:23', 'no', 'Online'),
(101, 6, '2019-11-16 02:26:58', 'no', 'Online'),
(102, 8, '2019-11-16 04:34:12', 'no', 'Online'),
(103, 6, '2019-11-16 10:31:39', 'no', 'Online'),
(104, 6, '2019-11-16 08:03:53', 'no', 'Online'),
(105, 15, '2019-11-16 15:52:01', 'no', 'Offline'),
(106, 14, '2019-11-16 14:32:38', 'no', 'Online'),
(107, 15, '2019-11-16 14:39:02', 'no', 'Offline'),
(108, 15, '2019-11-16 14:44:24', 'no', 'Offline'),
(109, 15, '2019-11-16 14:53:17', 'no', 'Offline'),
(110, 15, '2019-11-16 14:57:47', 'no', 'Offline'),
(111, 15, '2019-11-16 15:00:30', 'no', 'Offline'),
(112, 15, '2019-11-16 15:16:14', 'no', 'Offline'),
(113, 15, '2019-11-16 16:28:31', 'no', 'Offline'),
(114, 17, '2019-11-16 18:13:05', 'no', 'Online'),
(115, 6, '2019-11-16 16:21:10', 'no', 'Online'),
(116, 15, '2019-11-16 16:51:50', 'no', 'Online'),
(117, 15, '2019-11-16 17:00:04', 'no', 'Online'),
(118, 15, '2019-11-16 17:00:53', 'no', 'Online'),
(119, 15, '2019-11-16 17:07:40', 'no', 'Online'),
(120, 15, '2019-11-16 17:10:21', 'no', 'Online'),
(121, 15, '2019-11-16 17:14:14', 'no', 'Online'),
(122, 15, '2019-11-16 17:18:18', 'no', 'Online'),
(124, 15, '2019-11-16 17:32:28', 'no', 'Online'),
(125, 6, '2019-11-16 17:43:02', 'no', 'Online'),
(126, 6, '2019-11-16 18:10:35', 'no', 'Online'),
(127, 19, '2019-11-16 18:26:05', 'no', 'Offline'),
(128, 20, '2019-11-16 18:33:09', 'no', 'Online'),
(129, 19, '2019-11-16 18:35:18', 'no', 'Offline'),
(130, 21, '2019-11-16 18:38:29', 'no', 'Online'),
(131, 22, '2019-11-16 18:48:36', 'no', 'Online'),
(132, 6, '2019-11-16 18:51:09', 'no', 'Online'),
(133, 23, '2019-11-16 18:51:20', 'no', 'Online'),
(134, 6, '2019-11-16 18:55:26', 'no', 'Online'),
(135, 24, '2019-11-16 18:59:12', 'no', 'Online'),
(136, 19, '2019-11-17 06:27:23', 'no', 'Offline'),
(137, 19, '2019-11-17 07:57:00', 'no', 'Offline'),
(139, 19, '2019-11-17 08:09:34', 'no', 'Offline'),
(140, 19, '2019-11-17 08:58:05', 'no', 'Offline'),
(141, 19, '2019-11-17 13:16:15', 'no', 'Offline'),
(142, 19, '2019-11-17 13:30:34', 'no', 'Offline'),
(143, 19, '2019-11-17 14:07:49', 'no', 'Offline'),
(144, 19, '2019-11-17 19:08:04', 'no', 'Offline'),
(145, 19, '2019-11-17 16:24:47', 'yes', 'Offline'),
(146, 19, '2019-11-17 17:41:09', 'no', 'Offline'),
(147, 19, '2019-11-17 19:08:00', 'no', 'Offline'),
(148, 19, '2019-11-17 20:15:08', 'no', 'Offline'),
(149, 19, '2019-11-18 05:41:56', 'no', 'Offline'),
(150, 19, '2019-11-18 05:42:45', 'no', 'Offline'),
(151, 25, '2019-11-18 07:08:45', 'no', 'Offline'),
(152, 26, '2019-11-18 07:04:36', 'no', 'Offline'),
(153, 27, '2019-11-18 07:07:06', 'no', 'Offline'),
(154, 28, '2019-11-18 08:34:37', 'no', 'Offline'),
(155, 29, '2019-11-18 11:53:48', 'no', 'Online'),
(156, 19, '2019-11-18 09:18:16', 'no', 'Offline'),
(157, 19, '2019-11-18 10:57:17', 'no', 'Offline'),
(158, 19, '2019-11-18 14:12:04', 'no', 'Offline'),
(159, 19, '2019-11-18 18:08:45', 'no', 'Offline'),
(160, 31, '2019-11-18 17:03:12', 'no', 'Online'),
(161, 30, '2019-11-18 17:17:44', 'no', 'Online'),
(162, 28, '2019-11-18 18:09:05', 'no', 'Offline'),
(163, 32, '2019-11-18 18:51:57', 'no', 'Online'),
(164, 19, '2019-11-18 18:35:36', 'no', 'Offline'),
(165, 19, '2019-11-19 06:42:41', 'no', 'Offline'),
(166, 28, '2019-11-19 14:29:49', 'no', 'Offline'),
(167, 19, '2019-11-19 08:30:04', 'no', 'Offline'),
(168, 19, '2019-11-19 14:26:48', 'no', 'Offline'),
(169, 33, '2019-11-19 17:15:04', 'no', 'Online'),
(170, 19, '2019-11-19 19:00:13', 'no', 'Offline'),
(171, 19, '2019-11-19 16:21:21', 'yes', 'Offline'),
(172, 19, '2019-11-19 20:08:38', 'no', 'Offline'),
(173, 35, '2019-11-19 17:51:56', 'no', 'Online'),
(174, 37, '2019-11-21 01:36:09', 'no', 'Online'),
(175, 40, '2019-11-20 07:18:30', 'no', 'Online'),
(176, 19, '2019-11-20 08:24:40', 'no', 'Offline'),
(177, 19, '2019-11-20 17:50:47', 'no', 'Offline'),
(178, 19, '2019-11-20 17:47:10', 'no', 'Offline'),
(179, 37, '2019-11-21 13:23:49', 'no', 'Online'),
(180, 37, '2019-11-21 16:12:10', 'no', 'Online'),
(181, 37, '2019-11-21 23:37:12', 'no', 'Online'),
(182, 19, '2019-11-22 09:52:21', 'no', 'Offline'),
(183, 19, '2019-11-22 12:17:55', 'no', 'Offline'),
(184, 19, '2019-11-22 13:44:38', 'no', 'Offline'),
(185, 19, '2019-11-22 12:07:27', 'no', 'Offline'),
(186, 19, '2019-11-22 14:30:36', 'no', 'Offline'),
(187, 19, '2019-11-22 12:45:08', 'no', 'Offline'),
(188, 28, '2019-11-22 13:44:31', 'no', 'Online'),
(189, 19, '2019-11-22 14:21:15', 'no', 'Offline'),
(190, 19, '2019-11-22 14:06:04', 'no', 'Offline'),
(191, 28, '2019-11-22 14:20:21', 'no', 'Online'),
(192, 44, '2019-11-22 14:53:00', 'no', 'Online'),
(193, 45, '2019-11-22 14:58:30', 'no', 'Online'),
(194, 46, '2019-11-22 15:02:02', 'no', 'Online'),
(195, 47, '2019-11-22 16:17:52', 'no', 'Online'),
(196, 37, '2019-11-22 21:19:45', 'no', 'Online'),
(197, 19, '2019-11-22 16:10:06', 'no', 'Offline'),
(198, 19, '2019-11-22 18:22:21', 'no', 'Offline'),
(199, 48, '2019-11-22 16:17:52', 'no', 'Online'),
(200, 52, '2019-11-22 19:34:21', 'no', 'Online'),
(201, 52, '2019-11-23 10:46:32', 'no', 'Online'),
(202, 55, '2019-11-23 16:45:07', 'no', 'Online'),
(203, 19, '2019-11-23 13:41:47', 'no', 'Offline'),
(204, 56, '2019-11-23 14:27:49', 'no', 'Online'),
(205, 57, '2019-11-23 16:19:55', 'no', 'Online'),
(206, 58, '2019-11-23 15:49:33', 'no', 'Online'),
(207, 61, '2019-11-23 16:00:39', 'no', 'Online'),
(208, 58, '2019-11-23 15:54:39', 'no', 'Online'),
(209, 58, '2019-11-23 15:58:49', 'no', 'Online'),
(210, 58, '2019-11-23 15:58:49', 'no', 'Online'),
(211, 58, '2019-11-23 15:58:49', 'no', 'Online'),
(212, 58, '2019-11-23 15:58:49', 'no', 'Online'),
(213, 60, '2019-11-23 15:59:24', 'no', 'Online'),
(214, 60, '2019-11-23 16:00:39', 'no', 'Online'),
(215, 19, '2019-11-23 16:44:50', 'no', 'Offline'),
(216, 133, '2019-11-23 16:27:16', 'no', 'Online'),
(217, 37, '2019-11-23 20:20:52', 'no', 'Online'),
(218, 37, '2019-11-23 23:52:46', 'no', 'Online'),
(219, 37, '2019-11-24 03:34:02', 'no', 'Online'),
(220, 37, '2019-11-24 17:43:08', 'no', 'Online'),
(221, 37, '2019-11-25 04:35:34', 'no', 'Online'),
(222, 19, '2019-11-25 02:48:52', 'no', 'Offline'),
(223, 19, '2019-11-25 10:11:01', 'no', 'Offline'),
(224, 19, '2019-11-25 10:57:04', 'no', 'Offline'),
(225, 28, '2019-11-25 10:57:09', 'no', 'Online');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=397;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
