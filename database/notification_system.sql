-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2020 at 01:04 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notification_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(11) NOT NULL,
  `followed_by` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `followed_by`, `status`, `added_on`) VALUES
(1, 2455, 1, '2020-08-27 08:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE `following` (
  `id` int(11) NOT NULL,
  `follwing_by` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `google_user`
--

CREATE TABLE `google_user` (
  `id` int(11) NOT NULL,
  `clint_id` int(20) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `google_email` varchar(255) NOT NULL,
  `picture_link` varchar(255) NOT NULL,
  `bio` varchar(500) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `msg_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `follow_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `google_user`
--

INSERT INTO `google_user` (`id`, `clint_id`, `user_name`, `firstname`, `last_name`, `google_email`, `picture_link`, `bio`, `status`, `msg_id`, `post_id`, `follow_id`, `added_on`) VALUES
(1, 2147483647, 'programshadab', 'Programming with Shadab', '', 'ks615044@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14GgoHw5Xf_aMqb82GbmxM_Fbo8H3eb85tI9z-N4JWQ', 'ðŸ‘‰ðŸ‘‘kÃ¬Ã±g Ã¸f 30 AprilðŸ‘‘ ðŸ‘‰â¤blÃ¤Ã§k lÃ¸vÄ“râ¤ ðŸ‘‰ðŸ“·phÃ¸Å¥Ã¶hÃ¸Å‚Ã¯Ã§ðŸ“· ðŸ‘‰ðŸ‘”fÃ¡ÅŸhÃ­Ã¸Ã±ðŸ‘“Å‚Ã¸vÃªÅ™ðŸ‘Ÿ ðŸ‘‰ðŸ˜‘PÃ»rÃª sÃ¬Ã±glÃ©ðŸ˜‘ ðŸ‘‰ðŸ™ŒPrÅÃ»d 2 mÃ«ðŸ™Œ ðŸ‘‡Youtuber', 1, 2511, 1235, 2455, '2020-08-26 06:39:24'),
(2, 2147483647, 'skmia', 'all in', 'one video', 'ks579265@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14GjyBHyMDzZIiLJOZYIckXU6tuK_i34xKPefO2bE', 'kìñg øf 30 April', 1, 0, 12351, 0, '2020-08-26 07:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message_from` int(11) NOT NULL,
  `message_to` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message_from`, `message_to`, `message`, `status`, `added_on`) VALUES
(1, 2511, 1, 'hi programiing', 0, '2020-08-26 11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `post_img` varchar(255) NOT NULL,
  `post_by` int(11) NOT NULL,
  `post_desc` varchar(255) NOT NULL,
  `likes` int(10) NOT NULL,
  `comments` int(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post_img`, `post_by`, `post_desc`, `likes`, `comments`, `status`, `added_on`) VALUES
(1, 'https://pbs.twimg.com/profile_images/932986247642939392/CDq_0Vcw_400x400.jpg', 1235, 'MY NAME IS SHADAB', 20, 120, 1, '2020-08-27 06:00:00'),
(2, 'https://i.ytimg.com/vi/NsEWYunbzCE/maxresdefault_live.jpg', 12351, 'MY NAME IS SHADAB', 20, 120, 1, '2020-08-27 06:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `google_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture_link` varchar(255) NOT NULL,
  `bio` longtext NOT NULL,
  `verification_code` int(11) NOT NULL,
  `admin_approval_status` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `msg_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `follow_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `firstname`, `last_name`, `google_email`, `password`, `picture_link`, `bio`, `verification_code`, `admin_approval_status`, `status`, `msg_id`, `post_id`, `follow_id`, `added_on`) VALUES
(1, 'skshadab11234', 'Khan Shadab', '', 'ks579265@gmail.com', '$2y$10$O.pTREGB2T2kyFMilpTd8eaRPJJ6z5r2zYtQ02hfyAIX9Gew47/gi', 'https://i.ytimg.com/vi/NsEWYunbzCE/maxresdefault_live.jpg', '??kìñg øf 30 April? ??bläçk løv?r? ??phø?öhø?ïç? ??fá?híøñ??øvê?? ??Pûrê sìñglé? ??Pr?ûd 2 më? ?Youtuber', 25141, 0, 0, 2511, 0, 0, '2020-08-26 06:40:00'),
(2, 'mehtabkhan', 'Khan Mehtab', '', 'mehtabkhan@gmail.com', '$2y$10$YCcrS78ChLmG1g5ZUGfK0e9UUk7QUbv3QddhRiRfDplhcBUt1Xwhi', '', '??kìñg øf 30 April? ??bläçk løv?r? ??phø?öhø?ïç? ??fá?híøñ??øvê?? ??Pûrê sìñglé? ??Pr?ûd 2 më? ?Youtuber', 40308, 0, 0, 0, 0, 0, '2020-08-26 07:08:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google_user`
--
ALTER TABLE `google_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `following`
--
ALTER TABLE `following`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `google_user`
--
ALTER TABLE `google_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
