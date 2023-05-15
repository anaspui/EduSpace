-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2023 at 02:52 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `user_id` int(11) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `full_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`user_id`, `phone_number`, `full_name`) VALUES
(11, '0170000000222', 'geelle'),
(2, '0987654321', 'Jane Doe'),
(4, '1112222222', 'Alice Williams'),
(10, '12312312345', 'Emily Lee'),
(12, '1231231234555', 'Emily Lee'),
(23, '1234321', 'Rhyme'),
(1, '1234567890', 'John Smith'),
(9, '2223334444', 'Kevin Kim'),
(6, '4444444444', 'Sara Lee'),
(3, '5555555555', 'Bob Johnson'),
(8, '6666666666', 'Lisa Jones'),
(7, '7777777777', 'Mike Brown'),
(5, '9998887777', 'Tom Davis');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_image` varchar(255) DEFAULT NULL,
  `course_category` varchar(255) NOT NULL,
  `instructor_name` varchar(255) NOT NULL,
  `instructor_email` varchar(255) NOT NULL,
  `rating` float DEFAULT NULL,
  `description` text DEFAULT NULL,
  `course_modules` text DEFAULT NULL,
  `course_fee` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_image`, `course_category`, `instructor_name`, `instructor_email`, `rating`, `description`, `course_modules`, `course_fee`) VALUES
(1, 'Python for Data Science', 'https://th.bing.com/th/id/R.b1c66d2b33344feb0f619c5804026f44?rik=AG78vppewWX0ug&pid=ImgRaw&r=0', 'Data Science', 'John Smith', 'johnsmith@email.com', 4.5, 'Learn Python for data analysis and visualization', 'Introduction to Python;Data Manipulation with Pandas;Data Visualization with Matplotlib', '300.00'),
(2, 'Web Development with React', 'https://th.bing.com/th/id/R.776fd8269417774ef8b29304781e5277?rik=rV1PD0yroPYvSw&pid=ImgRaw&r=0', 'Web Development', 'Jane Doe', 'janedoe@email.com', 4.8, 'Learn how to build web applications using React', 'Introduction to React;Components and Props;State and Lifecycle;Routing', '400.00'),
(3, 'Java Programming', 'https://th.bing.com/th/id/R.003a9bb51342b68184fb56efbe849076?rik=2D2NUUEXF5F%2fdw&pid=ImgRaw&r=0', 'Programming', 'Sarah Lee', 'sarahlee@email.com', 4.8, 'Learn Java programming from scratch', 'Introduction to Java;Data types and variables;Control statements', '600.00'),
(4, 'Web Development with HTML and CSS', 'https://logodix.com/logo/470216.png', 'Web Development', 'Tom Jones', 'tomjones@email.com', 4.2, 'Learn to create responsive web pages with HTML and CSS', 'Introduction to HTML;CSS Styling;Web Page Layout', '400.00'),
(5, 'Android App Development', 'https://th.bing.com/th/id/R.be9dda907b0dd518a0325a70b68ba69c?rik=QG1bc7ffBd1b%2fw&pid=ImgRaw&r=0', 'Mobile App Development', 'David Kim', 'davidkim@email.com', 4.6, 'Learn to build Android apps using Java', 'Introduction to Android Development;UI Design;Data Storage', '300.00'),
(6, 'Machine Learning', 'https://th.bing.com/th/id/OIP.dDKPvmo7OWwPoWBa06smfAHaFj?pid=ImgDet&rs=1', 'Data Science', 'Rachel Green', 'rachelgreen@email.com', 4.7, 'Learn to build predictive models using Python', 'Introduction to Machine Learning;Data Preprocessing;Supervised Learning', '1000.00'),
(7, 'Blockchain Fundamentals', 'https://th.bing.com/th/id/R.f5f15d7bbaf8556fcf0da67d65dcc486?rik=Qc0GfkY1U68h%2fQ&pid=ImgRaw&r=0', 'Blockchain', 'Jack Johnson', 'jackjohnson@email.com', 4.4, 'Learn the basics of blockchain technology', 'Introduction to Blockchain;Consensus Mechanisms;Smart Contracts', '900.00');

-- --------------------------------------------------------

--
-- Table structure for table `course_content`
--

CREATE TABLE `course_content` (
  `content_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `totalModule` int(11) NOT NULL,
  `moduleNumber` int(11) NOT NULL,
  `moduleName` varchar(255) NOT NULL,
  `totalLecture` int(11) NOT NULL,
  `lectureNumber` int(11) NOT NULL,
  `lectureName` varchar(255) NOT NULL,
  `lectureDescription` text NOT NULL,
  `videoName` varchar(255) NOT NULL,
  `lectureVideoLinks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_content`
--

INSERT INTO `course_content` (`content_id`, `course_id`, `totalModule`, `moduleNumber`, `moduleName`, `totalLecture`, `lectureNumber`, `lectureName`, `lectureDescription`, `videoName`, `lectureVideoLinks`) VALUES
(1, 1, 3, 1, 'Introduction to Programming', 5, 1, 'What is Programming?', 'This lecture introduces the basics of programming.', 'Introduction Video', 'https://www.youtube.com/embed/zOjov-2OZ0E'),
(2, 1, 3, 1, 'Introduction to Programming', 5, 2, 'Variables and Data Types', 'This lecture covers variables and data types in programming.', 'Variables and Data Types Video', 'https://www.youtube.com/embed/kqtD5dpn9C8'),
(3, 1, 3, 1, 'Introduction to Programming', 5, 3, 'Operators and Expressions', 'This lecture covers operators and expressions in programming.', 'Operators and Expressions Video', 'https://www.youtube.com/embed/VSEnzzjAm0c'),
(4, 1, 3, 1, 'Introduction to Programming', 5, 4, 'Control Structures', 'This lecture covers control structures in programming.', 'Control Structures Video', 'https://www.youtube.com/embed/MHPGeQD8TvI'),
(5, 1, 3, 1, 'Introduction to Programming', 5, 5, 'Functions and Modules', 'This lecture covers functions and modules in programming.', 'Functions and Modules Video', 'https://www.youtube.com/watch?v=mno789'),
(6, 1, 3, 2, 'Intermediate to Programming', 5, 1, 'What is Programming?', 'This lecture introduces the basics of programming.', 'Introduction Video', 'https://www.youtube.com/embed/Z1Yd7upQsXY'),
(7, 1, 3, 2, 'Intermediate to Programming', 5, 2, 'Variables and Data Types', 'This lecture covers variables and data types in programming.', 'Variables and Data Types Video', 'https://www.youtube.com/watch?v=def123'),
(8, 1, 3, 2, 'Intermediate to Programming', 5, 3, 'Operators and Expressions', 'This lecture covers operators and expressions in programming.', 'Operators and Expressions Video', 'https://www.youtube.com/watch?v=ghi789'),
(9, 1, 3, 2, 'Intermediate to Programming', 5, 4, 'Control Structures', 'This lecture covers control structures in programming.', 'Control Structures Video', 'https://www.youtube.com/watch?v=jkl456'),
(10, 1, 3, 2, 'Intermediate to Programming', 5, 5, 'Functions and Modules', 'This lecture covers functions and modules in programming.', 'Functions and Modules Video', 'https://www.youtube.com/embed/79pKwdiqcwI');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_courses`
--

CREATE TABLE `enrolled_courses` (
  `id` int(11) NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrolled_courses`
--

INSERT INTO `enrolled_courses` (`id`, `user_email`, `course_id`, `date`) VALUES
(29, 'omar224md@teacher.eduspace.edu', 4, '2023-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `podcasts`
--

CREATE TABLE `podcasts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `published` date DEFAULT current_timestamp(),
  `rating` float DEFAULT 0,
  `source` text DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `podcasts`
--

INSERT INTO `podcasts` (`id`, `name`, `author`, `published`, `rating`, `source`, `image`) VALUES
(9, 'daw', 'daw', '2023-05-15', 0, 'https://podcasts.google.com/feed/aHR0cHM6Ly9hbmNob3IuZm0vcy9iOGQzMzVjL3BvZGNhc3QvcnNz?sa=X&ved=0CBwQjs4CKAFqFwoTCKD0x7G29f4CFQAAAAAdAAAAABAB', 'podcast_default.jpg'),
(10, 'gsr', 'grg', '2023-05-15', 0, 'https://podcasts.google.com/feed/aHR0cHM6Ly9hbmNob3IuZm0vcy9iOGQzMzVjL3BvZGNhc3QvcnNz?sa=X&ved=0CBwQjs4CKAFqFwoTCKD0x7G29f4CFQAAAAAdAAAAABAB', 'podcast_default.jpg'),
(11, 'anas', 'anas', '2023-05-15', 0, 'https://podcasts.google.com/feed/aHR0cHM6Ly9hbmNob3IuZm0vcy9iOGQzMzVjL3BvZGNhc3QvcnNz?sa=X&ved=0CBwQjs4CKAFqFwoTCKD0x7G29f4CFQAAAAAdAAAAABAB', 'podcast_default.jpg'),
(12, 'jitu', 'jitu', '2023-05-15', 0, 'https://podcasts.google.com/feed/aHR0cHM6Ly9hbmNob3IuZm0vcy9iOGQzMzVjL3BvZGNhc3QvcnNz?sa=X&ved=0CBwQjs4CKAFqFwoTCKD0x7G29f4CFQAAAAAdAAAAABAB', 'podcast_default.jpg'),
(13, 'daw', 'daw', '2023-05-15', 0, 'https://podcasts.google.com/feed/aHR0cHM6Ly9hbmNob3IuZm0vcy9iOGQzMzVjL3BvZGNhc3QvcnNz?sa=X&ved=0CBwQjs4CKAFqFwoTCKD0x7G29f4CFQAAAAAdAAAAABAB', 'podcast_default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `recommended_courses`
--

CREATE TABLE `recommended_courses` (
  `recommended_course_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recommended_courses`
--

INSERT INTO `recommended_courses` (`recommended_course_id`, `course_id`) VALUES
(13, 1),
(5, 2),
(1, 4),
(20, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `username`, `password`, `role`) VALUES
('Hatem', 'hatem@student.eduspace.edu', 'hatem', '$2y$10$FnS0pJBly5gpLfl.7VH0oOn7Aezy7CIHriM.TaQncwsiawF2LSXIC', 'student'),
('Hai', 'hola2212@gmail.com', 'Hai', '$2y$10$MbvWpS3b6a.uSwpXZi8yfu0L5o4oq1x9Es5yWe1.jimvIxjEckJVK', 'student'),
('Md. Jidanul Hakim', 'hola22@gmail.com', 'jitu', '$2y$10$pZhrdy61KbNtydrleZEzAOb9rmXrUEU8s4piRKk8tEMXCh9iX7h/O', ''),
('Md. Jidanul Hakim Jitu', 'jisan.jitu@yahoo.com', '123', '$2y$10$ZkKwfilMN.AaUQG6cT9QkODBpZmFPXFpiQVCERWP8gASFdU0yxcdK', ''),
('Md. Jidanul Hakim Jitu', 'jitu000166@gmail.com', 'jitu', '$2y$10$IQhsFKy0bhCw6mYO8VUhYuqydKZefkUSxFqgw9ibPW2.2KsO767ee', ''),
('Mohammad Oma', 'omar224md@teacher.eduspace.edu', 'omar', '$2y$10$OKeXJ.BcZ9Jm1.LCRczO.uGHhwgXKEBN36WDzEubMwKpx//PySjwu', 'teacher'),
('anas', 'omar24md@gmail.com', 'anas', '$2y$10$7H8yDCmHwqrxoqqMKZcP5euer/jhen1ZI.hqJjWwmdfZL.aENM98i', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`phone_number`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_content`
--
ALTER TABLE `course_content`
  ADD PRIMARY KEY (`content_id`),
  ADD KEY `fk_course_content_course_id` (`course_id`);

--
-- Indexes for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_email` (`user_email`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `podcasts`
--
ALTER TABLE `podcasts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommended_courses`
--
ALTER TABLE `recommended_courses`
  ADD PRIMARY KEY (`recommended_course_id`),
  ADD UNIQUE KEY `unique_course_id` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `course_content`
--
ALTER TABLE `course_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `podcasts`
--
ALTER TABLE `podcasts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `recommended_courses`
--
ALTER TABLE `recommended_courses`
  MODIFY `recommended_course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_content`
--
ALTER TABLE `course_content`
  ADD CONSTRAINT `fk_course_content_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  ADD CONSTRAINT `enrolled_courses_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `enrolled_courses_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `recommended_courses`
--
ALTER TABLE `recommended_courses`
  ADD CONSTRAINT `recommended_courses_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
