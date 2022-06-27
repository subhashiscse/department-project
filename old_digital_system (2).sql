-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2020 at 08:43 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `application_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `application_subject` varchar(255) NOT NULL,
  `application_description` text NOT NULL,
  `application_sender` varchar(255) NOT NULL,
  `application_sender_email` varchar(255) NOT NULL,
  `application_date` datetime NOT NULL,
  `applicaiton_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `class_routine`
--

CREATE TABLE `class_routine` (
  `class_id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `teacher_email` varchar(255) NOT NULL,
  `class_course` varchar(255) NOT NULL,
  `class_date` varchar(255) NOT NULL,
  `class_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `class_routine`
--

INSERT INTO `class_routine` (`class_id`, `session`, `teacher_email`, `class_course`, `class_date`, `class_time`) VALUES
(6, '2013-14', 'aambia@cse.iu.ac.bd', '501', 'Sunday', '10:00:00'),
(9, '2014-15', 'ibrahim@cse.iu.ac.bd', '401', 'Sunday', '10:00:00'),
(10, '2014-15', 'aktaruzzaman@iu.ac.bd', '402', 'Wednesday', '10:00:00'),
(11, '2014-15', 'mfkhanbd2@gmail.com', '404', 'Wednesday', '11:00:00'),
(12, '2013-14', 'mfkhanbd2@gmail.com', '502', 'Sunday', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `exam_routine`
--

CREATE TABLE `exam_routine` (
  `exam_id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `exam_course` varchar(255) NOT NULL,
  `exam_start_time` time NOT NULL,
  `exam_date` date NOT NULL,
  `exam_end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `exam_routine`
--

INSERT INTO `exam_routine` (`exam_id`, `session`, `exam_course`, `exam_start_time`, `exam_date`, `exam_end_time`) VALUES
(6, '2014-15', '401', '10:00:00', '2020-09-06', '14:00:00'),
(7, '2014-15', '402', '10:00:00', '2020-09-09', '14:00:00'),
(8, '2014-15', '404', '10:00:00', '2020-09-12', '14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `meeting_agenda`
--

CREATE TABLE `meeting_agenda` (
  `agenda_id` int(11) NOT NULL,
  `meeting_id` int(11) NOT NULL,
  `meeting_title` varchar(255) NOT NULL,
  `agenda_list` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `meeting_list`
--

CREATE TABLE `meeting_list` (
  `meeting_id` int(11) NOT NULL,
  `meeting_type` varchar(255) NOT NULL,
  `meeting_title` varchar(255) NOT NULL,
  `meeting_date` date NOT NULL,
  `meeting_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `meeting_list`
--

INSERT INTO `meeting_list` (`meeting_id`, `meeting_type`, `meeting_title`, `meeting_date`, `meeting_time`) VALUES
(25, 'AC', '2014-15 (Project)', '2020-09-05', '11:00:00'),
(26, 'PC', 'Exam Meeting', '2020-09-26', '11:00:00'),
(27, 'AC', 'Project meeting', '2020-09-12', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `meeting_member_list`
--

CREATE TABLE `meeting_member_list` (
  `meeting_member_id` int(11) NOT NULL,
  `meeting_id` int(11) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `teacher_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `meeting_member_list`
--

INSERT INTO `meeting_member_list` (`meeting_member_id`, `meeting_id`, `teacher_name`, `teacher_email`) VALUES
(52, 25, '', 'mfkhanbd2@gmail.com'),
(53, 25, '', 'aktaruzzaman@iu.ac.bd'),
(54, 25, '', 'aambia@cse.iu.ac.bd'),
(55, 25, '', 'ibrahim@cse.iu.ac.bd'),
(61, 27, '', 'mfkhanbd2@gmail.com'),
(62, 27, '', 'aktaruzzaman@iu.ac.bd'),
(63, 27, '', 'aambia@cse.iu.ac.bd'),
(64, 27, '', 'ibrahim@cse.iu.ac.bd'),
(65, 27, '', 'sujit_iu@yahoo.com'),
(66, 27, '', 'robiul@cse.iu.ac.bd'),
(67, 27, '', 'bappa@cse.iu.ac.bd'),
(68, 27, '', 'shilunazrul@yahoo.com'),
(69, 26, '', 'mfkhanbd2@gmail.com'),
(70, 26, '', 'aktaruzzaman@iu.ac.bd'),
(71, 26, '', 'ibrahim@cse.iu.ac.bd'),
(72, 26, '', 'sujit_iu@yahoo.com'),
(73, 26, '', 'bappa@cse.iu.ac.bd');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `notice_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `notice_subject` varchar(255) NOT NULL,
  `notice_description` text NOT NULL,
  `notice_sender` varchar(255) NOT NULL,
  `notice_date` datetime NOT NULL,
  `notice_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`notice_id`, `user_email`, `notice_subject`, `notice_description`, `notice_sender`, `notice_date`, `notice_status`) VALUES
(69, 'mfkhanbd2@gmail.com', 'New Meeting (AC)  (2014-15 (Project))', '<p><strong>New Meeting:</strong></p>\r\n\r\n<p>Please join the meeting.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -21px; top: 60px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div> Time:11:00 (2020-09-05)', 'Dr. Md Aktaruzzaman', '2020-09-06 17:02:56', 0),
(70, 'aktaruzzaman@iu.ac.bd', 'New Meeting (AC)  (2014-15 (Project))', '<p><strong>New Meeting:</strong></p>\r\n\r\n<p>Please join the meeting.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -21px; top: 60px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div> Time:11:00 (2020-09-05)', 'Dr. Md Aktaruzzaman', '2020-09-06 17:02:56', 0),
(71, 'aambia@cse.iu.ac.bd', 'New Meeting (AC)  (2014-15 (Project))', '<p><strong>New Meeting:</strong></p>\r\n\r\n<p>Please join the meeting.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -21px; top: 60px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div> Time:11:00 (2020-09-05)', 'Dr. Md Aktaruzzaman', '2020-09-06 17:02:56', 0),
(72, 'ibrahim@cse.iu.ac.bd', 'New Meeting (AC)  (2014-15 (Project))', '<p><strong>New Meeting:</strong></p>\r\n\r\n<p>Please join the meeting.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -21px; top: 60px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div> Time:11:00 (2020-09-05)', 'Dr. Md Aktaruzzaman', '2020-09-06 17:02:56', 0),
(74, 'mfkhanbd2@gmail.com', 'New Meeting (Exam Meeting)', '<p><strong>New Meeting:</strong></p>\r\n\r\n<p>Please join the meeting.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -21px; top: 60px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div> Time:11:00:00 (2020-09-26)', 'Dr. Md Aktaruzzaman', '2020-09-06 17:44:11', 0),
(75, 'aktaruzzaman@iu.ac.bd', 'New Meeting (Exam Meeting)', '<p><strong>New Meeting:</strong></p>\r\n\r\n<p>Please join the meeting.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -21px; top: 60px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div> Time:11:00:00 (2020-09-26)', 'Dr. Md Aktaruzzaman', '2020-09-06 17:44:11', 0),
(76, 'aambia@cse.iu.ac.bd', 'New Meeting (Exam Meeting)', '<p><strong>New Meeting:</strong></p>\r\n\r\n<p>Please join the meeting.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -21px; top: 60px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div> Time:11:00:00 (2020-09-26)', 'Dr. Md Aktaruzzaman', '2020-09-06 17:44:11', 0),
(77, 'robiul@cse.iu.ac.bd', 'New Meeting (Exam Meeting)', '<p><strong>New Meeting:</strong></p>\r\n\r\n<p>Please join the meeting.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -21px; top: 60px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div> Time:11:00:00 (2020-09-26)', 'Dr. Md Aktaruzzaman', '2020-09-06 17:44:11', 0),
(80, 'mfkhanbd2@gmail.com', 'New Meeting (AC)  (Project meeting)', '<p><strong>New Meeting:</strong></p>\r\n\r\n<p>Please join the meeting.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -21px; top: 60px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div> Time:10:00 (2020-09-12)', 'Dr. Md Aktaruzzaman', '2020-09-07 15:09:16', 0),
(81, 'aktaruzzaman@iu.ac.bd', 'New Meeting (AC)  (Project meeting)', '<p><strong>New Meeting:</strong></p>\r\n\r\n<p>Please join the meeting.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -21px; top: 60px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div> Time:10:00 (2020-09-12)', 'Dr. Md Aktaruzzaman', '2020-09-07 15:09:16', 0),
(82, 'aambia@cse.iu.ac.bd', 'New Meeting (AC)  (Project meeting)', '<p><strong>New Meeting:</strong></p>\r\n\r\n<p>Please join the meeting.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -21px; top: 60px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div> Time:10:00 (2020-09-12)', 'Dr. Md Aktaruzzaman', '2020-09-07 15:09:16', 1),
(83, 'ibrahim@cse.iu.ac.bd', 'New Meeting (AC)  (Project meeting)', '<p><strong>New Meeting:</strong></p>\r\n\r\n<p>Please join the meeting.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -21px; top: 60px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div> Time:10:00 (2020-09-12)', 'Dr. Md Aktaruzzaman', '2020-09-07 15:09:16', 0),
(84, 'sujit_iu@yahoo.com', 'New Meeting (AC)  (Project meeting)', '<p><strong>New Meeting:</strong></p>\r\n\r\n<p>Please join the meeting.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -21px; top: 60px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div> Time:10:00 (2020-09-12)', 'Dr. Md Aktaruzzaman', '2020-09-07 15:09:16', 0),
(85, 'robiul@cse.iu.ac.bd', 'New Meeting (AC)  (Project meeting)', '<p><strong>New Meeting:</strong></p>\r\n\r\n<p>Please join the meeting.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -21px; top: 60px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div> Time:10:00 (2020-09-12)', 'Dr. Md Aktaruzzaman', '2020-09-07 15:09:16', 0),
(86, 'bappa@cse.iu.ac.bd', 'New Meeting (AC)  (Project meeting)', '<p><strong>New Meeting:</strong></p>\r\n\r\n<p>Please join the meeting.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -21px; top: 60px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div> Time:10:00 (2020-09-12)', 'Dr. Md Aktaruzzaman', '2020-09-07 15:09:16', 0),
(87, 'shilunazrul@yahoo.com', 'New Meeting (AC)  (Project meeting)', '<p><strong>New Meeting:</strong></p>\r\n\r\n<p>Please join the meeting.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -21px; top: 60px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div> Time:10:00 (2020-09-12)', 'Dr. Md Aktaruzzaman', '2020-09-07 15:09:16', 0),
(88, 'mfkhanbd2@gmail.com', 'New Meeting (Exam Meeting)', '<p><strong>New Meeting:</strong></p>\r\n\r\n<p>Please join the meeting.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -21px; top: 60px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div> Time:11:00:00 (2020-09-26)', 'Dr. Md Aktaruzzaman', '2020-09-07 15:12:05', 0),
(89, 'aktaruzzaman@iu.ac.bd', 'New Meeting (Exam Meeting)', '<p><strong>New Meeting:</strong></p>\r\n\r\n<p>Please join the meeting.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -21px; top: 60px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div> Time:11:00:00 (2020-09-26)', 'Dr. Md Aktaruzzaman', '2020-09-07 15:12:05', 0),
(90, 'ibrahim@cse.iu.ac.bd', 'New Meeting (Exam Meeting)', '<p><strong>New Meeting:</strong></p>\r\n\r\n<p>Please join the meeting.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -21px; top: 60px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div> Time:11:00:00 (2020-09-26)', 'Dr. Md Aktaruzzaman', '2020-09-07 15:12:05', 0),
(91, 'sujit_iu@yahoo.com', 'New Meeting (Exam Meeting)', '<p><strong>New Meeting:</strong></p>\r\n\r\n<p>Please join the meeting.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -21px; top: 60px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div> Time:11:00:00 (2020-09-26)', 'Dr. Md Aktaruzzaman', '2020-09-07 15:12:05', 0),
(92, 'bappa@cse.iu.ac.bd', 'New Meeting (Exam Meeting)', '<p><strong>New Meeting:</strong></p>\r\n\r\n<p>Please join the meeting.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -21px; top: 60px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div> Time:11:00:00 (2020-09-26)', 'Dr. Md Aktaruzzaman', '2020-09-07 15:12:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `profile_fname` varchar(255) NOT NULL,
  `profile_lname` varchar(255) NOT NULL,
  `profile_username` varchar(255) NOT NULL,
  `profile_email` varchar(255) NOT NULL,
  `profile_password` varchar(255) NOT NULL,
  `profile_role` varchar(255) NOT NULL,
  `profile_phone` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `approve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `session`) VALUES
(13, '2013-14'),
(14, '2014-15'),
(16, '2016-17'),
(17, '2017-18'),
(18, '2018-19'),
(22, '2020-21');

-- --------------------------------------------------------

--
-- Table structure for table `session_class`
--

CREATE TABLE `session_class` (
  `course_id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `course_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `session_class`
--

INSERT INTO `session_class` (`course_id`, `session`, `course_no`) VALUES
(12, '2013-14', '501'),
(13, '2013-14', '502'),
(14, '2013-14', '503'),
(15, '2013-14', '504'),
(16, '2014-15', '401'),
(17, '2014-15', '402'),
(18, '2015-16', '403'),
(19, '2014-15', '404');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `meeting_join_info` varchar(255) NOT NULL,
  `meeting_cancel_info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `meeting_join_info`, `meeting_cancel_info`) VALUES
(1, 'smollickcseiu@gmail.com', '<p><strong>New Meeting:</strong></p>\r\n\r\n<p>Please join the meeting.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -21px; top: 60px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', '<p>The Meeting has been cancelled.</p>\r\n\r\n<p>Now the meeting will be held at</p>');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_username` varchar(255) NOT NULL,
  `student_session` varchar(255) NOT NULL,
  `student_roll` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_pass` varchar(255) NOT NULL,
  `student_phone` varchar(255) NOT NULL,
  `student_image` varchar(255) NOT NULL,
  `student_send_notice` varchar(255) NOT NULL,
  `student_receive_notice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `student_username`, `student_session`, `student_roll`, `student_email`, `student_pass`, `student_phone`, `student_image`, `student_send_notice`, `student_receive_notice`) VALUES
(7, 'Subhashis Mollick', 'Subhashis Mollick', '2014-15', '1414029', 'smollickcseiu@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '01705206077', 'cpy.jpg', '', ''),
(8, 'Bipro Kumar Sharma', 'Bipro Kumar Sharma', '2014-15', '1414014', 'biprosharma@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '017654987321', 'bipss.png', '', ''),
(9, 'Nibir Hossain', 'Nibir Hossain', '2014-15', '1414022', 'nibirhossain@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '017654987322', 'nibir.jpg', '', ''),
(10, 'Waliulllah GM', 'Waliulllah GM', '2013-14', '1314005', 'waliullah@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '017951364821', 'wali_vai.jpg', '', ''),
(11, 'Abdullah Al Amin', 'Abdullah Al Amin', '2013-14', '1314012', 'abdulllahalamin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '0169876312354', 'amin_vai.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `stuffs`
--

CREATE TABLE `stuffs` (
  `stuff_id` int(11) NOT NULL,
  `stuff_name` varchar(255) NOT NULL,
  `stuff_username` varchar(255) NOT NULL,
  `stuff_email` varchar(255) NOT NULL,
  `stuff_pass` varchar(255) NOT NULL,
  `stuff_phone` varchar(255) NOT NULL,
  `stuff_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `stuffs`
--

INSERT INTO `stuffs` (`stuff_id`, `stuff_name`, `stuff_username`, `stuff_email`, `stuff_pass`, `stuff_phone`, `stuff_image`) VALUES
(3, 'Kutub Uddin', 'Kutub Uddin', 'kutubuddin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '01987654321', 'person1.jpg'),
(4, 'Aynal Haque', 'Aynal Haque', 'aynalhaque@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '01654785239', 'person2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `teacher_email` varchar(255) NOT NULL,
  `teacher_pass` varchar(255) NOT NULL,
  `teacher_username` varchar(255) NOT NULL,
  `teacher_phone` varchar(255) NOT NULL,
  `teacher_image` varchar(255) NOT NULL,
  `teacher_designation` varchar(255) NOT NULL,
  `teacher_send_notice` varchar(255) NOT NULL,
  `teacher_receive_notice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `teacher_name`, `teacher_email`, `teacher_pass`, `teacher_username`, `teacher_phone`, `teacher_image`, `teacher_designation`, `teacher_send_notice`, `teacher_receive_notice`) VALUES
(11, 'Dr. Md. Farukuzzaman Khan', 'mfkhanbd2@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Dr. Md. Farukuzzaman Khan', '017987654321', 'faruk_sir.jpg', 'Professor', '', ''),
(12, 'Dr. Md Aktaruzzaman', 'aktaruzzaman@iu.ac.bd', '827ccb0eea8a706c4c34a16891f84e7b', 'Dr. Md Aktaruzzaman', '01751639010', 'babu_sir.jpg', 'Professor', '', ''),
(13, 'Dr. Ahsan-Ul-Ambia', 'aambia@cse.iu.ac.bd', '827ccb0eea8a706c4c34a16891f84e7b', 'Dr. Ahsan-Ul-Ambia', '01738020088', 'ambia_sir.jpg', 'Professor', '', ''),
(14, 'Md. Ibrahim Abdullah', 'ibrahim@cse.iu.ac.bd', '827ccb0eea8a706c4c34a16891f84e7b', 'Md. Ibrahim Abdullah', '017123456789', 'sijar_sir.jpg', 'Professor', '', ''),
(18, 'Sujit Kumar Mondal', 'sujit_iu@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Sujit Kumar Mondal', '01789654321', 'sujit_sir3.jpg', 'Professor', '', ''),
(19, 'Dr. Md. Robiul Hoque', 'robiul@cse.iu.ac.bd', '827ccb0eea8a706c4c34a16891f84e7b', 'Dr. Md. Robiul Hoque', '019987654321', 'shopon_sir.jpg', 'Associate Professor', '', ''),
(20, 'Bappa Sarkar', 'bappa@cse.iu.ac.bd', '827ccb0eea8a706c4c34a16891f84e7b', 'Bappa Sarkar', '01717007865', 'bappa_sir.jpg', 'Assistant Professor', '', ''),
(21, 'Md. Nazrul Islam', 'shilunazrul@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Md. Nazrul Islam', '013123654789', 'nazrul_sir.PNG', 'Associate Professor', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_phone`, `user_image`) VALUES
(1, 'Dr. Md Aktaruzzaman', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', '+880 1751639010', 'cse_logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `work_slider`
--

CREATE TABLE `work_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `work_slider`
--

INSERT INTO `work_slider` (`slider_id`, `slider_image`) VALUES
(1, 'cover1.jpg'),
(2, 'cover.jpg'),
(5, 'Mujib_Mural_1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `class_routine`
--
ALTER TABLE `class_routine`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `exam_routine`
--
ALTER TABLE `exam_routine`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `meeting_agenda`
--
ALTER TABLE `meeting_agenda`
  ADD PRIMARY KEY (`agenda_id`);

--
-- Indexes for table `meeting_list`
--
ALTER TABLE `meeting_list`
  ADD PRIMARY KEY (`meeting_id`);

--
-- Indexes for table `meeting_member_list`
--
ALTER TABLE `meeting_member_list`
  ADD PRIMARY KEY (`meeting_member_id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `session_class`
--
ALTER TABLE `session_class`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `stuffs`
--
ALTER TABLE `stuffs`
  ADD PRIMARY KEY (`stuff_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `work_slider`
--
ALTER TABLE `work_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `class_routine`
--
ALTER TABLE `class_routine`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `exam_routine`
--
ALTER TABLE `exam_routine`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `meeting_agenda`
--
ALTER TABLE `meeting_agenda`
  MODIFY `agenda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `meeting_list`
--
ALTER TABLE `meeting_list`
  MODIFY `meeting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `meeting_member_list`
--
ALTER TABLE `meeting_member_list`
  MODIFY `meeting_member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `session_class`
--
ALTER TABLE `session_class`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `stuffs`
--
ALTER TABLE `stuffs`
  MODIFY `stuff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `work_slider`
--
ALTER TABLE `work_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
