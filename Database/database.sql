-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2018 at 06:28 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drivingschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(1) NOT NULL,
  `contact` int(12) NOT NULL,
  `address` varchar(150) NOT NULL,
  `branch` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `name`, `email`, `password`, `dob`, `sex`, `contact`, `address`, `branch`) VALUES
('admin1111', 'Admin', 'admin1111@gmail.com', 'admin', '1998-08-24', 'M', 35465467, 'Mumbai', 'Ghatkopar');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `name` varchar(20) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`name`, `address`) VALUES
('Ghatkopar', 'Ghatkopar(W)');

-- --------------------------------------------------------

--
-- Table structure for table `changedate`
--

CREATE TABLE `changedate` (
  `issuer` varchar(50) NOT NULL,
  `id` varchar(5) NOT NULL,
  `old` date NOT NULL,
  `new` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `changetime`
--

CREATE TABLE `changetime` (
  `issuer` varchar(50) NOT NULL,
  `id` varchar(5) NOT NULL,
  `old` time NOT NULL,
  `new` time NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lec_num` int(2) NOT NULL,
  `lec_details` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `lec_num`, `lec_details`) VALUES
(1, 'Basics', 1, 'Getting accustomed with systems & working of car'),
(1, 'Basics', 2, 'Working on starting the car, brakes, clutch & gear-shifting. Basic forward & reverse driving'),
(2, 'Driving Basics', 1, 'Driving in empty space, basic turning scenarios, speed judgement.'),
(2, 'Driving Basics', 2, 'Test - Driving on a road with obstacles'),
(3, 'Driving Advanced - 1', 1, 'Driving in real traffic, not a challenging environment. Following signals and some basic traditions.'),
(3, 'Driving Advanced - 1', 2, 'Driving in real traffic, not a challenging environment. Following signals and some basic traditions.'),
(3, 'Driving Advanced - 1', 3, 'Driving in real traffic, not a challenging environment. Following signals and some basic traditions.'),
(3, 'Driving Advanced - 1', 4, 'Driving in real traffic, more challenging environment. Following signals as well as lane-changing strategies.'),
(3, 'Driving Advanced - 1', 5, 'Driving in real traffic, more challenging environment. Following signals and maintaining co-ordination with other nearby drivers.'),
(3, 'Driving Advanced - 1', 6, 'Driving in real traffic, more  challenging environment. Following signals and using symbols to co-ordinate with other drivers.'),
(4, 'Driving Advanced - 2', 1, 'Driving in heavy traffic, learning constant speeding & braking. '),
(4, 'Driving Advanced - 2', 2, 'Driving in heavy traffic, learning constant speeding & braking.'),
(4, 'Driving Advanced - 2', 3, 'Driving on highways, maintaining high speeds & changing lanes'),
(4, 'Driving Advanced - 2', 4, 'Driving on highways, maintaining high speeds & changing lanes'),
(4, 'Driving Advanced - 2', 5, 'Various Parking Scenarios'),
(4, 'Driving Advanced - 2', 6, 'Test - Traffic Test & Parking'),
(5, 'Car Safety & Repairing', 1, 'Listing & knowing various parts of car, & tire changing'),
(5, 'Car Safety & Repairing', 2, 'Learning various common problems that occur frequently & how to resolve them'),
(5, 'Car Safety & Repairing', 3, 'Test - Safety measures & various repairing procedures'),
(6, 'Test', 1, 'Driving test under constrained environment'),
(6, 'Test', 2, 'Driving test under constrained environment');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(30) NOT NULL,
  `code` varchar(6) NOT NULL,
  `raddress` varchar(75) NOT NULL,
  `plocation` varchar(100) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `vehicle` varchar(50) NOT NULL,
  `instructor` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instrschedule`
--

CREATE TABLE `instrschedule` (
  `email` varchar(50) NOT NULL,
  `stud_email` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `course_id` int(5) NOT NULL,
  `lec_num` int(2) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'incomplete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `username` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(1) NOT NULL,
  `contact` int(12) NOT NULL,
  `address` varchar(150) NOT NULL,
  `reg_num` varchar(30) NOT NULL,
  `branch` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`username`, `name`, `email`, `password`, `dob`, `gender`, `contact`, `address`, `reg_num`, `branch`) VALUES
('instructor1', 'Instructor1', 'instructor1@gmail.com', 'instructor1', '2018-11-12', 'M', 3546536, 'Mumbai', 'MH-00-ZZ-99', 'Ghatkopar'),
('instructor2', 'Instructor2', 'instructor2@gmail.com', 'instructor2', '2018-11-12', 'M', 345654, 'Mumbai', 'MH-02-DV-2192', 'Ghatkopar'),
('instructor3', 'Instructor3', 'instructor3@gmail.com', 'instructor3', '2018-11-13', 'M', 5346457, 'Mumbai', 'MH-04-AC-0104', 'Ghatkopar'),
('instructor4', 'Instructor4', 'instructor4@gmail.com', 'instructor4', '2018-11-13', 'M', 354646, 'Mumbai', 'MH-11-PH-00', 'Ghatkopar'),
('instructor5', 'Instructor5', 'instructor5@gmail.com', 'instructor5', '2018-08-13', 'M', 6755463, 'Mumbai', 'MH-20-BB-72', 'Ghatkopar'),
('instructor6', 'Instructor6', 'instructor6@gmail.com', 'instructor6', '2018-11-21', 'M', 768634, 'Mumbai', 'MH-54-KY-18', 'Ghatkopar'),
('instructor7', 'Instructor7', 'instructor7@gmail.com', 'instructor7', '2018-06-10', 'M', 546567, 'Mumbai', 'MH-99-AC-01', 'Ghatkopar'),
('rohit11', 'Rohit', 'nadiger.r@somaiya.edu', 'rohit', '2018-10-01', 'M', 741369850, 'Yogi Nagar, Borivali West', 'MH-07-AC-11', 'Ghatkopar'),
('microice1234', 'Pravar', 'pravar.p@somaiya.edu', 'pravar', '2018-10-17', 'M', 987452136, 'Jogeshwari, ground floor', 'MH-30-HK-42', 'Ghatkopar');

-- --------------------------------------------------------

--
-- Table structure for table `lecoutcome`
--

CREATE TABLE `lecoutcome` (
  `course_id` int(5) NOT NULL,
  `lec_num` int(2) NOT NULL,
  `outcome_num` int(2) NOT NULL,
  `outcome_detail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecoutcome`
--

INSERT INTO `lecoutcome` (`course_id`, `lec_num`, `outcome_num`, `outcome_detail`) VALUES
(1, 1, 1, 'How well is does the student know regarding various systems that function the car?'),
(1, 1, 2, 'Is the student familiar with basic components of the car'),
(1, 2, 1, 'Is the student able to start the car without any mistakes?'),
(1, 2, 2, 'How frequently does the student make mistakes while driving. Mainly includes clutch & accelerator co-ordination'),
(1, 2, 3, 'How well does the student drive in reverse? '),
(2, 1, 1, 'How well is the student able to judge speed & following traffic signals?'),
(2, 1, 2, 'Is the student able to co-ordinate driving corresponding to other drivers?'),
(2, 1, 3, 'Is the student able to adapt to these new learnt methods for safe driving?'),
(2, 1, 4, 'How often does the student make mistakes & you have to control the car?');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `email` varchar(50) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `sender` varchar(50) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `header` varchar(25) NOT NULL,
  `message` varchar(150) NOT NULL,
  `status` varchar(6) NOT NULL,
  `changedate_id` varchar(5) NOT NULL,
  `changetime_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `preference`
--

CREATE TABLE `preference` (
  `email` varchar(50) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `course_type` varchar(20) NOT NULL,
  `day1` int(1) NOT NULL,
  `day2` int(1) NOT NULL,
  `day3` int(1) NOT NULL,
  `day4` int(1) NOT NULL,
  `day5` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preference`
--

INSERT INTO `preference` (`email`, `time_start`, `time_end`, `course_type`, `day1`, `day2`, `day3`, `day4`, `day5`) VALUES
('jaineel.ns@somaiya.edu', '16:00:00', '19:00:00', '3', 3, 6, 6, 0, 0),
('pulinshah07@gmail.com', '12:00:00', '14:00:00', '6', 1, 4, 6, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `username` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `age` int(3) NOT NULL,
  `reg_num` varchar(30) NOT NULL,
  `instr_email` varchar(50) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `raddress` varchar(150) NOT NULL,
  `plocation` varchar(150) NOT NULL,
  `branch` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`username`, `name`, `email`, `password`, `dob`, `age`, `reg_num`, `instr_email`, `gender`, `contact`, `raddress`, `plocation`, `branch`) VALUES
('yelowflash', 'Jaineel', 'jaineel.ns@somaiya.edu', 'jaineel', '2018-10-15', 20, 'MH-07-AC-11', 'nadiger.r@somaiya.edu', 'M', '747520369', 'Dombivali', 'Dombivali', 'Ghatkopar'),
('kaushal18', 'Kaushal', 'kaushal.y@somaiya.edu', 'kaushal', '2018-10-08', 19, 'MH-30-HK-42', 'pravar.p@somaiya.edu', 'M', '948750321', 'Sector 19, Airoli', 'Sector 19, Airoli', 'Ghatkopar');

-- --------------------------------------------------------

--
-- Table structure for table `studentschedule`
--

CREATE TABLE `studentschedule` (
  `email` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `course_id` int(5) NOT NULL,
  `lec_num` int(2) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'incomplete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `Instr_email` varchar(50) NOT NULL,
  `stud_email` varchar(50) NOT NULL,
  `period` int(3) NOT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `model_name` varchar(50) NOT NULL,
  `company` varchar(30) NOT NULL,
  `reg_num` varchar(30) NOT NULL,
  `branch` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`model_name`, `company`, `reg_num`, `branch`) VALUES
('Tata Tiago NRG', 'Tata', 'MH-00-ZZ-99', 'Ghatkopar'),
('Hyundai Xcent', 'Hyundai', 'MH-02-DV-2192', 'Ghatkopar'),
('Skoda Rapid', 'Skoda', 'MH-04-AC-0104', 'Ghatkopar'),
('Renault Kwid', 'Renault', 'MH-07-AC-11', 'Ghatkopar'),
('Mahindra Marazzo', 'Mahindra', 'MH-11-PH-00', 'Ghatkopar'),
('Maruti Suzuki Swift', 'Maruti', 'MH-20-BB-72', 'Ghatkopar'),
('Vitarra Brezza', 'Maruti', 'MH-30-HK-42', 'Ghatkopar'),
('Ford Figo Aspire', 'Ford', 'MH-54-KY-18', 'Ghatkopar'),
('Tata Nexon', 'Tata', 'MH-99-AC-01', 'Ghatkopar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`),
  ADD KEY `Branch` (`branch`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `changedate`
--
ALTER TABLE `changedate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `changetime`
--
ALTER TABLE `changetime`
  ADD PRIMARY KEY (`issuer`,`old`,`date`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`,`name`,`lec_num`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `instrschedule`
--
ALTER TABLE `instrschedule`
  ADD PRIMARY KEY (`email`,`stud_email`,`course_id`,`lec_num`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `stud_email` (`stud_email`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`email`),
  ADD KEY `Reg_num` (`reg_num`),
  ADD KEY `Branch` (`branch`);

--
-- Indexes for table `lecoutcome`
--
ALTER TABLE `lecoutcome`
  ADD PRIMARY KEY (`course_id`,`lec_num`,`outcome_num`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`sender`,`receiver`,`header`,`message`);

--
-- Indexes for table `preference`
--
ALTER TABLE `preference`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`email`),
  ADD KEY `Reg_num` (`reg_num`),
  ADD KEY `Instr_email` (`instr_email`),
  ADD KEY `Branch` (`branch`);

--
-- Indexes for table `studentschedule`
--
ALTER TABLE `studentschedule`
  ADD PRIMARY KEY (`email`,`course_id`,`lec_num`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `teaches`
--
ALTER TABLE `teaches`
  ADD PRIMARY KEY (`Instr_email`,`stud_email`),
  ADD KEY `Instr_email` (`Instr_email`),
  ADD KEY `stud_email` (`stud_email`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`reg_num`),
  ADD KEY `Branch` (`branch`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`branch`) REFERENCES `branch` (`name`);

--
-- Constraints for table `instrschedule`
--
ALTER TABLE `instrschedule`
  ADD CONSTRAINT `instrschedule_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `instrschedule_ibfk_2` FOREIGN KEY (`stud_email`) REFERENCES `student` (`email`),
  ADD CONSTRAINT `instrschedule_ibfk_3` FOREIGN KEY (`email`) REFERENCES `instructor` (`email`);

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_2` FOREIGN KEY (`reg_num`) REFERENCES `vehicle` (`reg_num`),
  ADD CONSTRAINT `instructor_ibfk_3` FOREIGN KEY (`branch`) REFERENCES `branch` (`name`);

--
-- Constraints for table `lecoutcome`
--
ALTER TABLE `lecoutcome`
  ADD CONSTRAINT `lecoutcome_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`email`) REFERENCES `instructor` (`email`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`instr_email`) REFERENCES `instructor` (`email`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`reg_num`) REFERENCES `vehicle` (`reg_num`),
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`branch`) REFERENCES `branch` (`name`);

--
-- Constraints for table `studentschedule`
--
ALTER TABLE `studentschedule`
  ADD CONSTRAINT `studentschedule_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `studentschedule_ibfk_2` FOREIGN KEY (`email`) REFERENCES `student` (`email`);

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `teaches_ibfk_1` FOREIGN KEY (`Instr_email`) REFERENCES `instructor` (`email`),
  ADD CONSTRAINT `teaches_ibfk_2` FOREIGN KEY (`stud_email`) REFERENCES `student` (`email`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`branch`) REFERENCES `branch` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
