-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 13, 2018 at 01:49 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpumanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
CREATE TABLE IF NOT EXISTS `branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`) VALUES
(1, 'All'),
(2, 'btech'),
(3, 'science'),
(4, 'computer science');

-- --------------------------------------------------------

--
-- Table structure for table `branchcourse`
--

DROP TABLE IF EXISTS `branchcourse`;
CREATE TABLE IF NOT EXISTS `branchcourse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branchId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `branchId` (`branchId`),
  KEY `courseId` (`courseId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`) VALUES
(1, 'MCA'),
(2, 'BCA'),
(3, 'bse'),
(4, 'Pgdca'),
(5, 'Pgdca'),
(6, 'Pgdca'),
(7, 'Pgdca'),
(8, 'dca'),
(9, 'Pgdca'),
(10, 'dca');

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

DROP TABLE IF EXISTS `day`;
CREATE TABLE IF NOT EXISTS `day` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dayName` varchar(111) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`id`, `dayName`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `hodbranch`
--

DROP TABLE IF EXISTS `hodbranch`;
CREATE TABLE IF NOT EXISTS `hodbranch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staffId` int(11) NOT NULL,
  `branchId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `branchId` (`branchId`),
  KEY `staffId` (`staffId`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hodbranch`
--

INSERT INTO `hodbranch` (`id`, `staffId`, `branchId`) VALUES
(14, 144, 4);

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

DROP TABLE IF EXISTS `lecture`;
CREATE TABLE IF NOT EXISTS `lecture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacherId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teacherId` (`teacherId`),
  KEY `courseId` (`courseId`),
  KEY `subjectId` (`subjectId`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`id`, `teacherId`, `courseId`, `sem`, `subjectId`) VALUES
(51, 141, 1, 2, 1),
(52, 141, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lecturetimetable`
--

DROP TABLE IF EXISTS `lecturetimetable`;
CREATE TABLE IF NOT EXISTS `lecturetimetable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lectureId` int(11) NOT NULL,
  `dayId` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lectureId` (`lectureId`),
  KEY `dayId` (`dayId`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturetimetable`
--

INSERT INTO `lecturetimetable` (`id`, `lectureId`, `dayId`, `time`) VALUES
(56, 51, 1, '13:00'),
(57, 51, 2, '14:00'),
(58, 52, 1, '10:00'),
(59, 52, 2, '11:00'),
(60, 52, 4, '00:00');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
CREATE TABLE IF NOT EXISTS `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name`) VALUES
(1, 'Dean'),
(2, 'BC'),
(3, 'HOD'),
(4, 'Teacher'),
(5, 'LA'),
(6, 'clerk');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Hod'),
(3, 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `sbranchcourse`
--

DROP TABLE IF EXISTS `sbranchcourse`;
CREATE TABLE IF NOT EXISTS `sbranchcourse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentId` int(11) NOT NULL,
  `branchId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `branchId` (`branchId`),
  KEY `courseId` (`courseId`),
  KEY `studentId` (`studentId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sbranchcourse`
--

INSERT INTO `sbranchcourse` (`id`, `studentId`, `branchId`, `courseId`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 4, 1, 1),
(5, 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `semcoursesubject`
--

DROP TABLE IF EXISTS `semcoursesubject`;
CREATE TABLE IF NOT EXISTS `semcoursesubject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courseId` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `password`, `createdBy`, `created`, `updated`, `deleted`) VALUES
(141, 't1', 't1@gmail.com', 't1', 1, '2018-06-12 11:07:22', '2018-06-12 11:07:22', b'0'),
(142, 't2', 't2@gmail.com', 't2', 1, '2018-06-12 11:07:41', '2018-06-12 11:07:41', b'0'),
(143, 't3', 't3@gmail.com', 't2', 1, '2018-06-12 11:07:52', '2018-06-12 11:07:52', b'0'),
(144, 'new hod', 'hod@gmail.com', '12345', 1, '2018-06-12 16:41:51', '2018-06-12 16:41:51', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `staffposition`
--

DROP TABLE IF EXISTS `staffposition`;
CREATE TABLE IF NOT EXISTS `staffposition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staffId` int(11) NOT NULL,
  `positionId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `positionId` (`positionId`),
  KEY `staffId` (`staffId`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffposition`
--

INSERT INTO `staffposition` (`id`, `staffId`, `positionId`) VALUES
(70, 144, 3);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `rollno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isDeleted` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `rollno`, `email`, `created`, `updated`, `isDeleted`) VALUES
(1, 'kuldeep', 'h10526', 'devx.kuldeep@gmail.com', '2018-06-10 05:46:39', '2018-06-10 05:46:39', b'0'),
(2, 'john', 'h10784', 'john@gmail.com', '2018-06-10 05:47:04', '2018-06-10 05:47:04', b'0'),
(3, 'lucky', 'h10456', 'lucky@gmail.com', '2018-06-10 15:56:08', '2018-06-10 15:56:08', b'0'),
(4, 'Kuldeep chopra', 'h10526', 'admin@pmoi.onmicrosoft.com', '2018-06-10 16:13:09', '2018-06-10 16:13:09', b'0'),
(5, 'Kuldeep chopra', 'h10526', 'devx.kuldeep@gmail.com', '2018-06-12 02:08:47', '2018-06-12 02:08:47', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `studentsem`
--

DROP TABLE IF EXISTS `studentsem`;
CREATE TABLE IF NOT EXISTS `studentsem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentId` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `studentId` (`studentId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentsem`
--

INSERT INTO `studentsem` (`id`, `studentId`, `sem`) VALUES
(1, 2, 6),
(2, 4, 1),
(3, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjectName` varchar(255) NOT NULL,
  `subjectCode` varchar(100) NOT NULL,
  `isDelete` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subjectName`, `subjectCode`, `isDelete`) VALUES
(1, 'c++', 'CAL-101', b'0'),
(2, 'Math', 'CAL-102', b'0'),
(3, 'vhe', 'cal', b'0'),
(4, 'computer', '101', b'0'),
(5, 'clnag', '102', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `teacherbranch`
--

DROP TABLE IF EXISTS `teacherbranch`;
CREATE TABLE IF NOT EXISTS `teacherbranch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staffId` int(11) NOT NULL,
  `branchId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `staffId` (`staffId`),
  KEY `branchId` (`branchId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherbranch`
--

INSERT INTO `teacherbranch` (`id`, `staffId`, `branchId`) VALUES
(2, 141, 4),
(3, 142, 4),
(4, 143, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teachersubject`
--

DROP TABLE IF EXISTS `teachersubject`;
CREATE TABLE IF NOT EXISTS `teachersubject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staffId` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subjectId` (`subjectId`),
  KEY `teacherId` (`staffId`),
  KEY `courseId` (`courseId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isDeleted` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `createdby`, `updatedby`, `created`, `updated`, `isDeleted`) VALUES
(2, 'devx.kuldeep@gmail.com', 'Kul@1234', 1, 1, '2018-06-09 18:06:13', '2018-06-09 18:06:13', b'0'),
(36, 't1@gmail.com', 't1', 1, 1, '2018-06-12 13:54:19', '2018-06-12 13:54:19', b'0'),
(37, 'hod@gmail.com', '12345', 1, 1, '2018-06-12 16:41:51', '2018-06-12 16:41:51', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

DROP TABLE IF EXISTS `userrole`;
CREATE TABLE IF NOT EXISTS `userrole` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uId` int(11) NOT NULL,
  `roleId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uId` (`uId`),
  KEY `roleId` (`roleId`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`id`, `uId`, `roleId`) VALUES
(1, 2, 1),
(30, 36, 3),
(31, 37, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branchcourse`
--
ALTER TABLE `branchcourse`
  ADD CONSTRAINT `branchcourse_ibfk_1` FOREIGN KEY (`branchId`) REFERENCES `branch` (`id`),
  ADD CONSTRAINT `branchcourse_ibfk_2` FOREIGN KEY (`courseId`) REFERENCES `course` (`id`);

--
-- Constraints for table `hodbranch`
--
ALTER TABLE `hodbranch`
  ADD CONSTRAINT `hodbranch_ibfk_1` FOREIGN KEY (`branchId`) REFERENCES `branch` (`id`),
  ADD CONSTRAINT `hodbranch_ibfk_2` FOREIGN KEY (`staffId`) REFERENCES `staff` (`id`);

--
-- Constraints for table `lecture`
--
ALTER TABLE `lecture`
  ADD CONSTRAINT `lecture_ibfk_1` FOREIGN KEY (`teacherId`) REFERENCES `staff` (`id`),
  ADD CONSTRAINT `lecture_ibfk_2` FOREIGN KEY (`courseId`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `lecture_ibfk_3` FOREIGN KEY (`subjectId`) REFERENCES `subject` (`id`);

--
-- Constraints for table `lecturetimetable`
--
ALTER TABLE `lecturetimetable`
  ADD CONSTRAINT `lecturetimetable_ibfk_1` FOREIGN KEY (`lectureId`) REFERENCES `lecture` (`id`),
  ADD CONSTRAINT `lecturetimetable_ibfk_2` FOREIGN KEY (`dayId`) REFERENCES `day` (`id`);

--
-- Constraints for table `sbranchcourse`
--
ALTER TABLE `sbranchcourse`
  ADD CONSTRAINT `sbranchcourse_ibfk_1` FOREIGN KEY (`branchId`) REFERENCES `branch` (`id`),
  ADD CONSTRAINT `sbranchcourse_ibfk_2` FOREIGN KEY (`courseId`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `sbranchcourse_ibfk_3` FOREIGN KEY (`studentId`) REFERENCES `student` (`id`);

--
-- Constraints for table `staffposition`
--
ALTER TABLE `staffposition`
  ADD CONSTRAINT `staffposition_ibfk_1` FOREIGN KEY (`positionId`) REFERENCES `position` (`id`),
  ADD CONSTRAINT `staffposition_ibfk_2` FOREIGN KEY (`staffId`) REFERENCES `staff` (`id`);

--
-- Constraints for table `studentsem`
--
ALTER TABLE `studentsem`
  ADD CONSTRAINT `studentsem_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `student` (`id`);

--
-- Constraints for table `teacherbranch`
--
ALTER TABLE `teacherbranch`
  ADD CONSTRAINT `teacherbranch_ibfk_1` FOREIGN KEY (`staffId`) REFERENCES `staff` (`id`),
  ADD CONSTRAINT `teacherbranch_ibfk_2` FOREIGN KEY (`branchId`) REFERENCES `branch` (`id`);

--
-- Constraints for table `teachersubject`
--
ALTER TABLE `teachersubject`
  ADD CONSTRAINT `teachersubject_ibfk_1` FOREIGN KEY (`subjectId`) REFERENCES `subject` (`id`),
  ADD CONSTRAINT `teachersubject_ibfk_2` FOREIGN KEY (`staffId`) REFERENCES `staff` (`id`),
  ADD CONSTRAINT `teachersubject_ibfk_3` FOREIGN KEY (`courseId`) REFERENCES `course` (`id`);

--
-- Constraints for table `userrole`
--
ALTER TABLE `userrole`
  ADD CONSTRAINT `userrole_ibfk_1` FOREIGN KEY (`uId`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `userrole_ibfk_2` FOREIGN KEY (`roleId`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
