
CREATE TABLE `attendance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `signed_in` datetime DEFAULT NULL,
  `signed_out` datetime DEFAULT NULL,
  `studentid` int DEFAULT NULL,
  `courseid` int DEFAULT NULL,
  PRIMARY KEY (`id`)
)
--
-- Dumping data for table `attendance`
--


CREATE TABLE `courses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `coursename` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
)

--


-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(64) DEFAULT NULL,
  `lastname` varchar(64) DEFAULT NULL,
  `regno` varchar(64) DEFAULT NULL,
  `fingerprint` varchar(64) DEFAULT NULL,
  `userid` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) 

--
-- Dumping data for table `students`
--


--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(64) DEFAULT NULL,
  `lastname` varchar(64) DEFAULT NULL,
  `staffno` varchar(64) DEFAULT NULL,
  `userid` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) 

--
-- Dumping data for table `teachers`
--


--
-- Table structure for table `user_courses`
--

CREATE TABLE `user_courses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userid` int DEFAULT NULL,
  `courseid` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) 

--
-- Dumping data for table `user_courses`
--


--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(64) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(32) DEFAULT NULL,
  `levelid` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) 

--
-- Dumping data for table `users`
--



