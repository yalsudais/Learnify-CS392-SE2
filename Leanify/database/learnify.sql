-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 09:16 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learnify`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminapproval`
--

CREATE TABLE `adminapproval` (
  `approval_id` int(11) NOT NULL,
  `upload_id` int(11) DEFAULT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `approval_time` datetime DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `challengeattempts`
--

CREATE TABLE `challengeattempts` (
  `attempt_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `challenge_id` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `challengechoices`
--

CREATE TABLE `challengechoices` (
  `choice_id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `choice_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `challengequestions`
--

CREATE TABLE `challengequestions` (
  `question_id` int(11) NOT NULL,
  `challenge_id` int(11) DEFAULT NULL,
  `question_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE `challenges` (
  `challenge_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `difficulty_level` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contentuploads`
--

CREATE TABLE `contentuploads` (
  `upload_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `content_type` varchar(255) DEFAULT NULL,
  `upload_time` datetime DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contentuploads`
--

INSERT INTO `contentuploads` (`upload_id`, `user_id`, `title`, `content`, `path`, `image`, `subject_id`, `course_id`, `content_type`, `upload_time`, `is_approved`) VALUES
(3, 1, '12', '12', '../upload//65a2e77714f1dSSRN-id3679078.pdf', '12', 36, 12, '12', '2024-12-12 00:00:00', 12),
(4, 1, '1', '12', '../upload//65a2ead5635a6أثر التحول الرقمي عمى مهنة المحاسبة والمراجعة والتعميم المحاسبي في ليبيا - المعوقات والحمول.pdf', '65a2ead563339.png', 36, 2, '12', '2024-12-31 00:00:00', 1),
(6, 1, '1', '12', '../upload//65a2eb4a93578E_ESCWA_TDD_2019_4-AR.pdf', '65a2eb4a93239.jpg', 36, 2, '12', '2024-12-31 00:00:00', 1),
(7, 1, '1', '1', '../upload//65a2ec1fc7086SSRN-id3679078.pdf', '65a2ec1fc6c9c.png', 36, 2, '1', '2024-12-31 00:00:00', 1),
(8, 1, '1', '1', '../upload//65a2ee2353738SSRN-id3679078.pdf', '65a2ee235331d.jpg', 36, 2, '1', '2024-12-31 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `course_description` text DEFAULT NULL,
  `course_price` decimal(10,2) DEFAULT NULL,
  `create_date` date DEFAULT current_timestamp(),
  `course_banner_image` varchar(255) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_code`, `course_name`, `course_description`, `course_price`, `create_date`, `course_banner_image`, `subject_id`) VALUES
(2, 'fsdfsd', 'sdfsdf', 'sdfasdf', '23.00', '2024-01-13', '65a1a8a713dea.png', 1),
(12, '123', 'sddfsdf', 'sdfsd', '20.00', '2024-01-13', '65a292caace4c.png', 23),
(14, 'sdfsdf', 'sdfsdfsdf', 'sdfsdfs', '20.00', '2024-01-13', '65a29b2674157.png', 36);

-- --------------------------------------------------------

--
-- Table structure for table `discussionposts`
--

CREATE TABLE `discussionposts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_text` text DEFAULT NULL,
  `post_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quizattempts`
--

CREATE TABLE `quizattempts` (
  `attempt_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quizchoices`
--

CREATE TABLE `quizchoices` (
  `choice_id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `choice_text` text DEFAULT NULL,
  `is_correct` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quizquestions`
--

CREATE TABLE `quizquestions` (
  `question_id` int(11) NOT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `question_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `quiz_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resultchallenge`
--

CREATE TABLE `resultchallenge` (
  `ResultChallenge_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `challenge_id` int(11) DEFAULT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `searches`
--

CREATE TABLE `searches` (
  `search_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `search_text` text DEFAULT NULL,
  `search_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `image_banner` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `image_banner`) VALUES
(36, 'sdfsdf', '65a2974c2265d.jpg'),
(38, 'dfsdfsdf', '65a29739ef781.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `phone_number`, `user_type`) VALUES
(1, 'sarah', '123', '123@gmail.com', '+966751745642', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminapproval`
--
ALTER TABLE `adminapproval`
  ADD PRIMARY KEY (`approval_id`),
  ADD KEY `upload_id` (`upload_id`);

--
-- Indexes for table `challengeattempts`
--
ALTER TABLE `challengeattempts`
  ADD PRIMARY KEY (`attempt_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `challenge_id` (`challenge_id`);

--
-- Indexes for table `challengechoices`
--
ALTER TABLE `challengechoices`
  ADD PRIMARY KEY (`choice_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `challengequestions`
--
ALTER TABLE `challengequestions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `challenge_id` (`challenge_id`);

--
-- Indexes for table `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`challenge_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contentuploads`
--
ALTER TABLE `contentuploads`
  ADD PRIMARY KEY (`upload_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `discussionposts`
--
ALTER TABLE `discussionposts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `quizattempts`
--
ALTER TABLE `quizattempts`
  ADD PRIMARY KEY (`attempt_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `quizchoices`
--
ALTER TABLE `quizchoices`
  ADD PRIMARY KEY (`choice_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `quizquestions`
--
ALTER TABLE `quizquestions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`quiz_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `resultchallenge`
--
ALTER TABLE `resultchallenge`
  ADD PRIMARY KEY (`ResultChallenge_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `challenge_id` (`challenge_id`);

--
-- Indexes for table `searches`
--
ALTER TABLE `searches`
  ADD PRIMARY KEY (`search_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contentuploads`
--
ALTER TABLE `contentuploads`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adminapproval`
--
ALTER TABLE `adminapproval`
  ADD CONSTRAINT `adminapproval_ibfk_1` FOREIGN KEY (`upload_id`) REFERENCES `contentuploads` (`upload_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `challengeattempts`
--
ALTER TABLE `challengeattempts`
  ADD CONSTRAINT `challengeattempts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `challengeattempts_ibfk_2` FOREIGN KEY (`challenge_id`) REFERENCES `challenges` (`challenge_id`);

--
-- Constraints for table `challengechoices`
--
ALTER TABLE `challengechoices`
  ADD CONSTRAINT `challengechoices_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `challengequestions` (`question_id`);

--
-- Constraints for table `challengequestions`
--
ALTER TABLE `challengequestions`
  ADD CONSTRAINT `challengequestions_ibfk_1` FOREIGN KEY (`challenge_id`) REFERENCES `challenges` (`challenge_id`);

--
-- Constraints for table `challenges`
--
ALTER TABLE `challenges`
  ADD CONSTRAINT `challenges_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `contentuploads`
--
ALTER TABLE `contentuploads`
  ADD CONSTRAINT `contentuploads_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contentuploads_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contentuploads_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discussionposts`
--
ALTER TABLE `discussionposts`
  ADD CONSTRAINT `discussionposts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `quizattempts`
--
ALTER TABLE `quizattempts`
  ADD CONSTRAINT `quizattempts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `quizattempts_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`quiz_id`);

--
-- Constraints for table `quizchoices`
--
ALTER TABLE `quizchoices`
  ADD CONSTRAINT `quizchoices_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `quizquestions` (`question_id`);

--
-- Constraints for table `quizquestions`
--
ALTER TABLE `quizquestions`
  ADD CONSTRAINT `quizquestions_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`quiz_id`);

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `resultchallenge`
--
ALTER TABLE `resultchallenge`
  ADD CONSTRAINT `resultchallenge_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `resultchallenge_ibfk_2` FOREIGN KEY (`challenge_id`) REFERENCES `challenges` (`challenge_id`);

--
-- Constraints for table `searches`
--
ALTER TABLE `searches`
  ADD CONSTRAINT `searches_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
