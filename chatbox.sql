-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2020 at 06:38 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `language_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stateQues` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cityQues` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ageQues` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genderQues` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempQues` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symptomsQues` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `travelQues` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicalQues` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `changeSymptQues` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `language_name`, `stateQues`, `cityQues`, `ageQues`, `genderQues`, `tempQues`, `symptomsQues`, `travelQues`, `medicalQues`, `changeSymptQues`) VALUES
(1, 'English', 'Which State are you staying?', 'Which City are you staying?', 'Please Select your age group', 'Please Select your gender', 'Your current body Temperature', 'Do you have any Symptoms?', 'Do you have any history of travel?', 'Do you have any Medical History?', 'Symptoms have, over last 48 hours'),
(2, 'Hindi', 'राज्य का नाम', 'शहर का नाम', 'आपकी उम्र क्या है?', 'लिंग', 'शरीर का तापमान', 'वर्तमान लक्षण', 'हाल ही में की गई यात्रा', 'पहले से कोई चिकित्सा समस्या', 'लक्षणकाबर्ताव, पिछले 48 घंटों में'),
(3, 'Malayalam', 'ഏത്സംസ്ഥാനം? ', 'ഏത്നഗരം? ', 'നിങ്ങളുടെപ്രായം?', 'ലിംഗഭേദം? ', 'ശരീരതാപനില', 'ലക്ഷണങ്ങൾകാണപ്പെടുന്ന', 'യാത്രയുടെചരിത്രം', 'ആരോഗ്യചരിത്രം', 'കഴിഞ്ഞ 48 മണിക്കൂറിലധികംലക്ഷണങ്ങൾ'),
(4, 'Odia', '', '', '', '', '', '', '', '', ''),
(5, 'Marathi', '', '', '', '', '', '', '', '', ''),
(6, 'Punjabi', '', '', '', '', '', '', '', '', ''),
(7, 'Tamil', '', '', '', '', '', '', '', '', ''),
(8, 'Telugu', '', '', '', '', '', '', '', '', ''),
(9, 'Gujarati', '', '', '', '', '', '', '', '', ''),
(10, 'Urdu', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `risk_users`
--

CREATE TABLE `risk_users` (
  `id` int(11) NOT NULL,
  `phone` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `risk_users`
--

INSERT INTO `risk_users` (`id`, `phone`, `pin`, `created_date`) VALUES
(1, '9764157458', '415506', '2020-04-11 21:16:43'),
(2, '9764157458', '415506', '2020-04-11 21:16:54'),
(3, '9764157458', '415506', '2020-04-11 21:18:01'),
(4, '9764157458', '415506', '2020-04-11 21:18:45'),
(5, '9764157458', '415506', '2020-04-11 21:19:18'),
(6, '9764157458', '415506', '2020-04-11 21:19:24'),
(7, '9764157458', '415506', '2020-04-11 21:19:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `state` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sympt` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `travelhistory` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicalSym` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `state`, `city`, `gender`, `temp`, `sympt`, `travelhistory`, `medicalSym`, `created_date`) VALUES
(1, 'Maharashtra', 'Pune', 'male', 'Normal(96&deg;F-98.6&deg;F)', 'None of the above', 'No history of contact and symptoms', 'Heart disease', '2020-04-11 21:09:42'),
(2, 'Maharashtra', 'Pune', 'male', 'Normal(96&deg;F-98.6&deg;F)', 'None of the above', 'No history of contact and symptoms', 'Heart disease', '2020-04-11 21:16:31'),
(3, 'Maharashtra', 'Pune', 'male', 'Normal(96&deg;F-98.6&deg;F)', 'None of the above', 'No history of contact and symptoms', 'Reduced immunity', '2020-04-11 21:20:26'),
(4, 'Maharashtra', 'pune', 'male', 'Normal(96&deg;F-98.6&deg;F)', 'None of the above', 'No history of contact and symptoms', '', '2020-04-11 21:27:11'),
(5, 'Maharashtra', 'pune', 'male', 'Normal(96&deg;F-98.6&deg;F)', 'None of the above', 'No history of contact and symptoms', '', '2020-04-11 21:29:16'),
(6, 'Maharashtra', 'Pune', 'male', 'Normal(96&deg;F-98.6&deg;F)', 'None of the above', 'No history of contact and symptoms', 'Diabetes', '2020-04-11 22:00:03'),
(7, 'Maharashtra', 'Pune', 'male', 'Normal(96&deg;F-98.6&deg;F)', 'None of the above', 'No history of contact and symptoms', 'Diabetes', '2020-04-11 22:04:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `risk_users`
--
ALTER TABLE `risk_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `risk_users`
--
ALTER TABLE `risk_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
