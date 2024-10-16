-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2024 at 05:18 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpnbtc`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_soal`
--

CREATE TABLE `bank_soal` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `deskrip_bank` varchar(100) NOT NULL,
  `tipe_bank` enum('Test','Practice') NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank_soal`
--

INSERT INTO `bank_soal` (`id_bank`, `nama_bank`, `deskrip_bank`, `tipe_bank`, `created_at`) VALUES
(1, 'Practice Bank 1', 'bank latihan cuy', 'Test', '2024-07-30'),
(5, 'bank 2', 'ini bank 2 buat test', 'Practice', '2024-07-30');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_ujian`
--

CREATE TABLE `hasil_ujian` (
  `id_hasil` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `nilai_listening` int(11) NOT NULL,
  `nilai_reading` int(11) NOT NULL,
  `nilai_total` int(11) NOT NULL,
  `tipe_ujian` varchar(255) NOT NULL,
  `tgl_ujian` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hasil_ujian`
--

INSERT INTO `hasil_ujian` (`id_hasil`, `id_user`, `id_bank`, `nilai_listening`, `nilai_reading`, `nilai_total`, `tipe_ujian`, `tgl_ujian`) VALUES
(2, 3, 1, 5, 5, 10, 'Listening', '2024-07-31 08:38:28'),
(3, 36, 5, 0, 0, 0, 'Practice', '2024-07-31 04:16:19'),
(4, 36, 1, 5, 0, 5, 'Test', '2024-07-31 04:19:24'),
(5, 36, 5, 5, 0, 5, 'Practice', '2024-07-31 04:33:23'),
(6, 36, 5, 5, 5, 10, 'Practice', '2024-07-31 05:11:42'),
(7, 36, 1, 5, 0, 5, 'Test', '2024-07-31 05:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `otp_table`
--

CREATE TABLE `otp_table` (
  `id_otp` int(11) NOT NULL,
  `email` int(255) NOT NULL,
  `otp` int(10) NOT NULL,
  `otp_expiry` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id_section` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `part_section` tinyint(3) DEFAULT NULL,
  `nama_section` varchar(100) NOT NULL,
  `deskrip_section` text NOT NULL,
  `gambar_section` varchar(255) DEFAULT NULL,
  `timer` time DEFAULT NULL,
  `tipe_section` enum('Listening','Reading') NOT NULL,
  `audio_section` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id_section`, `id_bank`, `part_section`, `nama_section`, `deskrip_section`, `gambar_section`, `timer`, `tipe_section`, `audio_section`) VALUES
(29, 1, 1, 'Part 1: Photographs', '', 'Screenshot_21.png', '00:00:06', 'Listening', 'that-one-josh-hutcherson-whistle-edit12.mp3'),
(30, 1, 2, 'Part 2: Question-Response', 'You will hear a question or statement and three responses spoken in English. <strong> They will not be printed and will be spoken only one time </strong>. Select the best response to the question or statement and mark the letter (A), (B), or (C)', NULL, '00:00:05', 'Listening', NULL),
(31, 1, 3, 'Part 3: Conversations', 'You will hear some conversations between two or more people. You will be asked to answer three questions about what the speakers say in each conversation. Select the best response to each question and mark the letter (A), (B), (C), or (D). <strong> The co', NULL, '00:00:08', 'Listening', NULL),
(32, 1, 4, 'Part 4: Talk', 'You will hear some talks given by a single speaker. You will be asked to answer three questions about what the speaker says in each talk. Select the best response to each question and mark the letter (A), (B), (C), or (D). <strong> The talks will not be p', NULL, '00:00:08', 'Listening', NULL),
(37, 1, 5, 'Part 5: Incomplete Sentences', 'A word or phrase is missing in each of the sentences below. Four answer choices are given below each sentence. Select the best answer to complete the sentence. Then mark the letter (A), (B), (C), or (D)', NULL, NULL, 'Reading', NULL),
(38, 1, 6, 'Part 6: Text Completion', 'Read the texts that follow. A word, phrase, or sentence is missing in parts of each text. Four answer choices for each question are given below the text. Select the best answer to complete the text. Then mark the letter (A), (B), (C), or (D)', NULL, NULL, 'Reading', NULL),
(40, 1, 7, 'Part 7: Reading Comprehension', 'In this part you will read a selection of texts, such as magazine and newspaper articles, e-mails, and instant messages. Each text or set of texts is followed by several questions. Select the best answer for each question and mark the letter (A), (B), (C)', NULL, NULL, 'Reading', NULL),
(51, 5, 1, 'Part 1: Photographs', 'For each question in this part, you will hear four statements about a picture. When you hear the statements, you must select the one statement that best describes what you see in the picture and mark your answer. <strong>The statements will not be printed and will be spoken only one time.</strong>', 'Section_photo.jpg', '00:00:30', 'Listening', 'Latihan_Soal_TOEIC_Listening_dan_Reading_Beserta_Jawabannya_-_YEC.mp3'),
(52, 5, 2, 'Part 2: Question-Response', 'You will hear a question or statement and three responses spoken in English. <strong>They will not be printed and will be spoken only one time.</strong> Select the best response to the question or statement and mark the letter (A), (B), or (C).', NULL, '00:01:00', 'Listening', '2Latihan_Soal_TOEIC_Listening_dan_Reading_Beserta_Jawabannya_-_YEC_2.mp3'),
(53, 5, 3, 'Part 3: Conversations', 'You will hear some conversations between two or more people. You will be asked to answer three questions about what the speakers say in each conversation. Select the best response to each question and mark the letter (A), (B), (C), or (D). <strong>The conversations will not be printed and will be spoken only one time.</strong>', NULL, '00:01:00', 'Listening', '3Latihan_Soal_TOEIC_Listening_dan_Reading_Beserta_Jawabannya_-_YEC.mp3'),
(54, 5, 4, 'Part 4: Talk', 'You will hear some talks given by a single speaker. You will be asked to answer three questions about what the speaker says in each talk. Select the best response to each question and mark the letter (A), (B), (C), or (D). <strong>The talks will not be printed and will be spoken only one time.</strong>', NULL, '00:01:00', 'Listening', '4Latihan_Soal_TOEIC_Listening_dan_Reading_Beserta_Jawabannya_-_YEC_2.mp3'),
(55, 5, 5, 'Part 5: Incomplete Sentences', 'A word or phrase is missing in each of the sentences below. Four answer choices are given below each sentence. Select the best answer to complete the sentence. Then mark the letter (A), (B), (C), or (D).', NULL, NULL, 'Reading', NULL),
(56, 5, 6, 'Part 6: Text Completion', 'Read the texts that follow. A word, phrase, or sentence is missing in parts of each text. Four answer choices for each question are given below the text. Select the best answer to complete the text. Then mark the letter (A), (B), (C), or (D).', NULL, NULL, 'Reading', NULL),
(57, 5, 7, 'Part 7: Reading Comprehension', 'In this part you will read a selection of texts, such as magazine and newspaper articles, e-mails, and instant messages. Each text or set of texts is followed by several questions. Select the best answer for each question and mark the letter (A), (B), (C), or (D).', NULL, NULL, 'Reading', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `id_section` int(11) NOT NULL,
  `tipe_soal` enum('Listening','Reading') NOT NULL,
  `pertanyaan` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `audio` varchar(255) DEFAULT NULL,
  `a` text DEFAULT 'Option A',
  `b` text DEFAULT 'Option B',
  `c` text DEFAULT 'Option C',
  `d` text DEFAULT 'Option D',
  `jawaban` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `id_section`, `tipe_soal`, `pertanyaan`, `gambar`, `audio`, `a`, `b`, `c`, `d`, `jawaban`) VALUES
(1, 51, 'Listening', 'Listen to four statements about each photo on the screen. Click on the letter of the best description of the photo.', 'photoseal11.jpg', 'Soal_photo_uno.mp3', 'The meeting is not going well', 'The business is very successful', 'The people are all very tired', 'The people are talking to each other', 'c'),
(2, 51, 'Listening', 'Listen to four statements about each photo on the screen. Click on the letter of the best description of the photo.\r\n', 'photo_21.jpg', 'Photo_seal_2.mp3', 'The scientist are discussing an experiment', 'The technician are sitting together', 'The people are in the laboratory', 'The people are using the safety equipment', 'a'),
(3, 51, 'Listening', 'Listen to four statements about each photo on the screen. Click on the letter of the best description of the photo.', 'photo_31.jpg', 'Photo_seal_3.mp3', 'The teacher is holding up her hand', 'The children are sitting in group', 'The children are participating in the lesson', 'The children are speaking to each other', 'c'),
(4, 52, 'Listening', 'In each question, you will listen to a question and then listen to 3 possible responses. Choose the correct response.', NULL, 'Qr_1.mp3', 'When will you finished?.', 'Where are you living?.', 'What\'s next?.', 'Will you coming over?.', 'a'),
(5, 52, 'Listening', 'In each question, you will listen to a question and then listen to 3 possible responses. Choose the correct response', NULL, 'Qr_soal_2.mp3', 'I quite enjoyed it but the ending is weak.', 'I\'ll show you the result, later.', 'Shall we go tomorrow?.', 'I\'d be happy to join you.', 'a'),
(6, 52, 'Listening', 'In each question, you will listen to a question and then listen to 3 possible responses. Choose the correct response', NULL, 'Qr_soal_3.mp3', 'That\'s a pity.', 'It won\'t start.', 'Yes, That\'s right.', 'That\'s a bummer.', 'b'),
(60, 53, 'Listening', 'Where is the manager’s office?', NULL, 'Conve_1.mp3', 'on the second floor', 'near the restaurant', 'next to the changing room', 'next to the staff kitchen', 'a'),
(61, 53, 'Listening', 'What is the man going to do?', NULL, 'Conve_soal_2.mp3', 'telephone the suppliers', ' call the woman back', 'order a new part', ' pick up the motorbike', 'a'),
(62, 55, 'Reading', 'Customer reviews indicate that many\r\n modern mobile devices are often\r\n unnecessarily ------- .', NULL, NULL, 'complication', 'complicates', 'complicate', 'complicated', 'd'),
(63, 54, 'Listening', 'The people at the conference make signs for...', NULL, 'Talks_1.mp3', 'advertisements', 'roads', 'restaurants', 'shops', 'b'),
(64, 54, 'Listening', 'What does the woman tell her colleagues to do with the records?', NULL, 'Talks_2.mp3', 'give them to the administration manager', ' file them away', 'give them to the patient', 'put them in a box', 'd'),
(65, 54, 'Listening', 'When will they arrive in London?', NULL, 'Talks_3.mp3', 'on time', '8 minutes late', ' 80 minutes late', '18 minutes late', 'a'),
(66, 55, 'Reading', 'Jamal Floyd The Third has received top\r\n performance reviews ------- he joined the\r\n sales department two years ago.', NULL, NULL, 'during', 'since', 'except', 'despite', 'b'),
(67, 55, 'Reading', 'Among ------- recognized at the company\r\n awards ceremony were senior business\r\n analyst Natalie Obi and sales associate\r\n Peter Comeau.', NULL, NULL, 'us', 'whose', 'they', 'those', 'd'),
(68, 56, 'Reading', 'Complete sentence 131', 'Screenshot_231.png', NULL, 'interest', 'interests', 'interested', 'interesting', 'c'),
(69, 57, 'Reading', 'What is suggested about the car?', 'Screenshot_252.png', NULL, 'It was recently repaired.', 'It has had more than one owner.', 'It is very fuel efficient.', 'It has been on sale for six months.', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `test_credits`
--

CREATE TABLE `test_credits` (
  `id_bayar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL,
  `jmlh_beli` int(11) NOT NULL,
  `total_bayar` double NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_credits`
--

INSERT INTO `test_credits` (`id_bayar`, `id_user`, `tgl_bayar`, `bukti_bayar`, `jmlh_beli`, `total_bayar`, `status`) VALUES
(8, 3, '2024-07-30 21:17:48', 'Screenshot_214.png', 1, 550000, 'Success'),
(9, 3, '2024-07-30 21:20:03', 'Screenshot_215.png', 2, 1100000, 'Decline'),
(10, 3, '2024-07-31 00:04:52', 'Screenshot_216.png', 1, 550000, 'Pending'),
(11, 36, '2024-07-31 04:15:12', 'Screenshot_2111.png', 1, 550000, 'Success'),
(12, 36, '2024-07-31 04:22:14', 'Screenshot_221.png', 10, 5500000, 'Success');

-- --------------------------------------------------------

--
-- Table structure for table `toeic_score`
--

CREATE TABLE `toeic_score` (
  `id_score` int(11) NOT NULL,
  `benar` int(5) NOT NULL,
  `nilai_reading` int(5) NOT NULL,
  `nilai_listening` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `toeic_score`
--

INSERT INTO `toeic_score` (`id_score`, `benar`, `nilai_reading`, `nilai_listening`) VALUES
(1, 1, 5, 5),
(2, 2, 5, 5),
(3, 3, 5, 5),
(4, 4, 5, 5),
(5, 5, 5, 5),
(6, 6, 5, 5),
(7, 7, 5, 5),
(8, 8, 5, 5),
(9, 9, 5, 5),
(10, 10, 5, 5),
(11, 11, 5, 5),
(12, 12, 5, 5),
(13, 13, 5, 5),
(14, 14, 5, 5),
(15, 15, 5, 5),
(16, 16, 5, 5),
(17, 17, 5, 5),
(18, 18, 5, 10),
(19, 19, 5, 15),
(20, 20, 5, 20),
(21, 21, 5, 25),
(22, 22, 10, 30),
(23, 23, 15, 35),
(24, 24, 20, 40),
(25, 25, 25, 45),
(26, 26, 30, 50),
(27, 27, 35, 55),
(28, 28, 40, 60),
(29, 29, 45, 70),
(30, 30, 55, 80),
(31, 31, 60, 85),
(32, 32, 65, 90),
(33, 33, 70, 95),
(34, 34, 75, 100),
(35, 35, 80, 105),
(36, 36, 85, 115),
(37, 37, 90, 125),
(38, 38, 95, 135),
(39, 39, 105, 140),
(40, 40, 115, 150),
(41, 41, 120, 160),
(42, 42, 125, 170),
(43, 43, 130, 175),
(44, 44, 135, 180),
(45, 45, 140, 190),
(46, 46, 145, 200),
(47, 47, 155, 205),
(48, 48, 160, 215),
(49, 49, 170, 220),
(50, 50, 175, 225),
(51, 51, 185, 230),
(52, 52, 195, 235),
(53, 53, 205, 245),
(54, 54, 210, 255),
(55, 55, 215, 260),
(56, 56, 220, 265),
(57, 57, 230, 275),
(58, 58, 240, 285),
(59, 59, 245, 290),
(60, 60, 250, 295),
(61, 61, 255, 300),
(62, 62, 260, 310),
(63, 63, 270, 320),
(64, 64, 275, 325),
(65, 65, 280, 330),
(66, 66, 285, 335),
(67, 67, 290, 340),
(68, 68, 295, 345),
(69, 69, 295, 350),
(70, 70, 300, 355),
(71, 71, 310, 360),
(72, 72, 315, 365),
(73, 73, 320, 370),
(74, 74, 325, 375),
(75, 75, 330, 385),
(76, 76, 335, 395),
(77, 77, 340, 400),
(78, 78, 345, 405),
(79, 79, 355, 415),
(80, 80, 360, 420),
(81, 81, 370, 425),
(82, 82, 375, 430),
(83, 83, 385, 435),
(84, 84, 390, 440),
(85, 85, 395, 445),
(86, 86, 405, 455),
(87, 87, 415, 460),
(88, 88, 420, 465),
(89, 89, 425, 475),
(90, 90, 435, 480),
(91, 91, 440, 485),
(92, 92, 450, 490),
(93, 93, 455, 495),
(94, 94, 460, 495),
(95, 95, 470, 495),
(96, 96, 475, 495),
(97, 97, 485, 495),
(98, 98, 485, 495),
(99, 99, 490, 495),
(100, 100, 495, 495);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `tipe_card` enum('Identity Card','Driver License','Student Card','Passport') DEFAULT NULL,
  `id_card` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `foto` varchar(255) DEFAULT 'default.jpg',
  `gender` enum('Male','Female') DEFAULT NULL,
  `status` enum('Student','Worker','Unemployed') DEFAULT NULL,
  `role` enum('user','admin') NOT NULL,
  `credits` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `tipe_card`, `id_card`, `email`, `nama`, `password`, `tgl_lahir`, `foto`, `gender`, `status`, `role`, `credits`) VALUES
(1, 'Identity Card', '02112121', 'jakaalfariza24@gmail.com', 'Admin JAX', '$2y$10$PWq2VgdodJ5xW9igquDj6.P14gkVsFfgE3905IayVeoIJkET12cmC', '2002-01-20', '1_profile_photo2.png', 'Male', 'Student', 'admin', 0),
(3, 'Identity Card', '1231231231', 'srisoraya72@gmail.com', 'Jaka Alfariza', '$2y$10$UaR6XnuCd0BnmDmlat74Oe/OLOUxFz4DDROj/CubchOUclOAlZxoi', '2014-07-10', '3_profile_photo.jpg', 'Male', 'Student', 'user', 93),
(7, 'Identity Card', '1', 'admin2@admin.com', 'Admin 2', '$2y$10$9tMMUty6Q87D2RNw2mU.QeRADIp1fHDCRZwtOmW4FGw1PshsXi6tK', NULL, 'default.jpg', 'Male', NULL, 'admin', 0),
(29, NULL, NULL, 'yourname1774@gmail.com', 'jekszy', '$2y$10$lnB.toWrPp0W5rdnrcocx.6Vevp1pnaaEJklNEIFeJmph5EOZEEJG', '2003-08-01', 'default.jpg', 'Male', NULL, 'user', 1),
(31, 'Identity Card', '2', 'admin@admin.com', 'aaa', '$2y$10$2dfNput8Yxdm/hY3pK5cLOu.C6.Zrddg.YoFj7q1tDXW3L8jJqsFq', NULL, 'default.jpg', 'Male', NULL, 'admin', 0),
(35, NULL, NULL, 'jaka@gmail.com', 'Jax', '$2y$10$m.dtRXGcw5CndIKl0uOFqOeNY/CTrnGPMpRanLQM1poxOYO5iRvN.', '2002-01-20', 'default.jpg', 'Male', NULL, 'user', 3),
(36, NULL, NULL, 'achmaddewa15@gmail.com', 'achmad dewa', '$2y$10$Jr/EE6L6xykxllV0CCxIMuDQ9ukqrovN6A5joUEwU9QhDA89NaytO', '2024-07-31', 'default.jpg', 'Male', NULL, 'user', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_soal`
--
ALTER TABLE `bank_soal`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `hasil_ujian`
--
ALTER TABLE `hasil_ujian`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `fk_Hasil_ujian_user_idx` (`id_user`),
  ADD KEY `fk_bank_soal` (`id_bank`);

--
-- Indexes for table `otp_table`
--
ALTER TABLE `otp_table`
  ADD PRIMARY KEY (`id_otp`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id_section`),
  ADD KEY `fk_section_bank_soal1_idx` (`id_bank`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `fk_soal_section1_idx` (`id_section`);

--
-- Indexes for table `test_credits`
--
ALTER TABLE `test_credits`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `toeic_score`
--
ALTER TABLE `toeic_score`
  ADD PRIMARY KEY (`id_score`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id_card_UNIQUE` (`id_card`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_soal`
--
ALTER TABLE `bank_soal`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hasil_ujian`
--
ALTER TABLE `hasil_ujian`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `otp_table`
--
ALTER TABLE `otp_table`
  MODIFY `id_otp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id_section` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `test_credits`
--
ALTER TABLE `test_credits`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `toeic_score`
--
ALTER TABLE `toeic_score`
  MODIFY `id_score` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil_ujian`
--
ALTER TABLE `hasil_ujian`
  ADD CONSTRAINT `fk_Hasil_ujian_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bank_soal` FOREIGN KEY (`id_bank`) REFERENCES `bank_soal` (`id_bank`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `fk_section_bank_soal1` FOREIGN KEY (`id_bank`) REFERENCES `bank_soal` (`id_bank`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `fk_soal_section1` FOREIGN KEY (`id_section`) REFERENCES `section` (`id_section`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test_credits`
--
ALTER TABLE `test_credits`
  ADD CONSTRAINT `test_credits_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
