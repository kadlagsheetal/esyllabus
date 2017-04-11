-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2015 at 07:05 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `esyllabus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `b_id` int(11) NOT NULL,
  `admin_type` int(11) NOT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `department` (`b_id`),
  KEY `b_id` (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `a_id`, `first_name`, `last_name`, `password`, `b_id`, `admin_type`) VALUES
(1, 501370, 'Lakshmi', 'Gadhikar', 'lakshmi', 1, 4),
(2, 501371, 'Khushbu', 'Pandya', 'khushbu', 1, 4),
(3, 501364, 'Prachi ', 'Goel', 'prachi', 1, 4),
(4, 501365, 'Harish ', 'Kaura', 'harish', 2, 4),
(5, 501366, 'Amroz', 'Siddiqui', 'amroz', 2, 4),
(6, 501367, 'Deepa ', 'Vincent', 'deepa', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_name` varchar(255) NOT NULL,
  PRIMARY KEY (`b_id`),
  KEY `b_id` (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`b_id`, `b_name`) VALUES
(1, 'Information Technology'),
(2, 'Computer'),
(3, 'Mechanical'),
(4, 'Electronics'),
(5, 'Electrical'),
(6, 'All');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE IF NOT EXISTS `enquiry` (
  `q_id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`q_id`, `question`) VALUES
(1, 'References to the real life examples?'),
(2, 'Knowledge of the subject?'),
(4, 'Interaction with students?'),
(5, 'The way of solving students doubt.'),
(6, 'Presentation skills?');

-- --------------------------------------------------------

--
-- Table structure for table `manual`
--

CREATE TABLE IF NOT EXISTS `manual` (
  `manual_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`manual_id`),
  KEY `sub_id` (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `manual`
--

INSERT INTO `manual` (`manual_id`, `sub_id`, `path`) VALUES
(1, 8, 'ls/16.pdf'),
(2, 8, '16.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(500) NOT NULL,
  `b_id` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  PRIMARY KEY (`news_id`),
  KEY `b_id` (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `heading`, `b_id`, `sem`) VALUES
(25, 'College reopens on 7th of July.', 1, 0),
(26, 'College reopens on 7th of July.', 2, 0),
(27, 'College reopens on 7th of July.', 3, 0),
(28, 'College reopens on 7th of July.', 4, 0),
(29, 'College reopens on 7th of July.', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ppts`
--

CREATE TABLE IF NOT EXISTS `ppts` (
  `ppt_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`ppt_id`),
  KEY `sub_id` (`sub_id`),
  KEY `sub_id_2` (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ppts`
--

INSERT INTO `ppts` (`ppt_id`, `sub_id`, `path`) VALUES
(1, 2, 'Presentation1.pptx'),
(2, 13, 'entation2.pptx'),
(3, 21, 'Presentation2.pptx');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE IF NOT EXISTS `query` (
  `query_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`query_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`query_id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Sheetal', 'kadlag.sheetal@gmail.com', 'Hello', 'Query');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `q_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_id` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`q_id`),
  KEY `b_id` (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=319 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `b_id`, `sem`, `path`) VALUES
(1, 1, 1, 'Applied Mathematics(Dec13).pdf'),
(2, 1, 1, 'Applied Mathematics(May13).pdf'),
(4, 1, 1, 'Applied Mathematics(May14).pdf'),
(5, 1, 1, 'Applied Chemistry(Dec13).pdf'),
(6, 1, 1, 'Applied Chemistry(June14).pdf'),
(7, 1, 1, 'Applied Physics(Dec13).pdf'),
(8, 1, 1, 'Applied Physics(May13).pdf'),
(9, 1, 1, 'Applied Physics(May14).pdf'),
(10, 1, 1, 'Basic Electrical & Electronics Engineering(Dec13).pdf'),
(11, 1, 1, 'Basic Electrical & Electronics Engineering(June14).pdf'),
(12, 1, 1, 'Engineering Mechanics(Des13).pdf'),
(13, 1, 1, 'Engineering Mechanics(June14).pdf'),
(14, 1, 1, 'Environmental studies(Dec13).pdf'),
(15, 1, 1, 'Environmental studies(June14).pdf'),
(16, 1, 2, 'Applied Chemistry(Dec13).pdf'),
(17, 1, 2, 'Applied Chemistry(June14).pdf'),
(18, 1, 2, 'Applied Mathematics(Dec13).pdf'),
(19, 1, 2, 'Applied Mathematics(June14).pdf'),
(20, 1, 2, 'Applied Physics(Dec13).pdf'),
(21, 1, 2, 'Applied Physics(June14).pdf'),
(22, 1, 2, 'Communication Skills(Dec13).pdf'),
(23, 1, 2, 'Communication Skills(June14).pdf'),
(24, 1, 2, 'Engineering Drawing(Dec13).pdf'),
(25, 1, 2, 'Engineering Drawing(June14).pdf'),
(26, 1, 2, 'Structured Programming Approach(Dec13).pdf'),
(27, 1, 2, 'Structured Programming Approach(June14).pdf'),
(28, 1, 3, 'Analog and Digital Circuits(Dec13).pdf'),
(29, 1, 3, 'Analog and Digital Circuits(June14).pdf'),
(30, 1, 3, 'Applied Mathematics(Dec13).pdf'),
(31, 1, 3, 'Applied Mathematics(June14).pdf'),
(32, 1, 3, 'Database Management Systems(Dec13).pdf'),
(33, 1, 3, 'Database Management Systems(June14).pdf'),
(34, 1, 3, 'Data Structure and Algorithm Analysis(Dec13).pdf'),
(35, 1, 3, 'Data Structure and Algorithm Analysis(June14).pdf'),
(36, 1, 3, 'Object Oriented Programming Methodology(Dec13).pdf'),
(37, 1, 3, 'Object Oriented Programming Methodology(June14).pdf'),
(38, 1, 3, 'Principles of Analog and Digital Communication(Dec13).pdf'),
(39, 1, 3, 'Principles of Analog and Digital Communication(June14).pdf'),
(40, 1, 4, 'Applied Mathematics(Dec13).pdf'),
(41, 1, 4, 'Applied Mathematics(June14).pdf'),
(42, 1, 4, 'Automata Theory(June14).pdf'),
(43, 1, 4, 'Computer Networks(June14).pdf'),
(44, 1, 4, 'Computer Organization and Architecture(June14).pdf'),
(45, 1, 4, 'Web Programming(Dec13).pdf'),
(46, 1, 4, 'Web Programming(June14).pdf'),
(47, 1, 4, 'Information Theory and Coding(June14).pdf'),
(48, 1, 5, 'Advanced Database Management Systems(Dec14).pdf'),
(49, 1, 5, 'Advanced Database Management Systems(June14).pdf'),
(50, 1, 5, 'Computer Graphics and Virtual Reality(Dec12).pdf'),
(51, 1, 5, 'Computer Graphics and Virtual Reality(June13).pdf'),
(52, 1, 5, 'Computer Graphics and Virtual Reality(June14)'),
(53, 1, 5, 'Microcontroller and Embedded Systems(Dec14).pdf'),
(54, 1, 5, 'Operating Systems(Dec12).pdf'),
(55, 1, 5, 'Operating Systems(Dec13).pdf'),
(56, 1, 5, 'Operating Systems(Dec14).pdf'),
(57, 1, 5, 'Operating Systems(June13).pdf'),
(58, 1, 5, 'Operating Systems(June14).pdf'),
(59, 1, 5, 'Open Source Technologies(Dec14).pdf'),
(60, 1, 6, 'Distributed Systems(Dec14).pdf'),
(61, 1, 6, 'Distributed Systems(June14).pdf'),
(62, 1, 6, 'Data Mining and Business Intelligence(Dec14).pdf'),
(63, 1, 6, 'Data Mining and Business Intelligence(May14).pdf'),
(64, 1, 6, 'Software Engineering(Dec14).pdf'),
(65, 1, 6, 'Software Engineering(June14).pdf'),
(66, 1, 6, 'System and Web Security(Dec13).pdf'),
(67, 1, 6, 'System and Web Security(June14).pdf'),
(68, 1, 7, 'Artificial Intelligence(Dec14).pdf'),
(69, 1, 7, 'Digital Signal & Image Processing(Dec14).pdf'),
(70, 1, 7, 'Digital Signal & Image Processing(June14).pdf'),
(71, 1, 7, 'Nanotechnology(Dec14).pdf'),
(72, 1, 7, 'Simulation and Modelling(Dec14).pdf'),
(73, 1, 7, 'Simulation and Modelling(June14).pdf'),
(74, 1, 7, 'Software testing & Quality Assurance(Dec12).pdf'),
(75, 1, 7, 'Software testing & Quality Assurance(June14).pdf'),
(76, 1, 7, 'Wireless Network(Dec14).pdf'),
(77, 1, 8, 'Gaming Architecture & Programming(Dec14).pdf'),
(78, 1, 8, 'Gaming Architecture & Programming(May14).pdf'),
(79, 1, 8, 'Information Storage Management & Disaster Recovery(Dec14).pdf'),
(80, 1, 8, 'Information Storage Management & Disaster Recovery(June14).pdf'),
(81, 1, 8, 'Software Project Management(Dec14).pdf'),
(82, 1, 8, 'Software Project Management(June14).pdf'),
(83, 2, 1, 'Applied Chemistry(Dec13).pdf'),
(84, 2, 1, 'Applied Chemistry(June14).pdf'),
(85, 2, 1, 'Applied Mathematics(Dec13).pdf'),
(86, 2, 1, 'Applied Mathematics(May13).pdf'),
(87, 2, 1, 'Applied Mathematics(May14).pdf'),
(88, 2, 1, 'Applied Physics(Dec13).pdf'),
(89, 2, 1, 'Applied Physics(May13).pdf'),
(90, 2, 1, 'Applied Physics(May14).pdf'),
(91, 2, 1, 'Basic Electrical & Electronics Engineering(Dec13).pdf'),
(92, 2, 1, 'Basic Electrical & Electronics Engineering(June14).pdf'),
(93, 2, 1, 'Engineering Mechanics(Des13).pdf'),
(94, 2, 1, 'Engineering Mechanics(June14).pdf'),
(95, 2, 1, 'Environmental studies(Dec13).pdf'),
(96, 2, 1, 'Environmental studies(June14).pdf'),
(97, 2, 2, 'Applied Chemistry(Dec13).pdf'),
(98, 2, 2, 'Applied Chemistry(June14).pdf'),
(99, 2, 2, 'Applied Mathematics(Dec13).pdf'),
(100, 2, 2, 'Applied Mathematics(June14).pdf'),
(101, 2, 2, 'Applied Physics(Dec13).pdf'),
(102, 2, 2, 'Applied Physics(June14).pdf'),
(103, 2, 2, 'Communication Skills(Dec13).pdf'),
(104, 2, 2, 'Communication Skills(June14).pdf'),
(105, 2, 2, 'Engineering Drawing(Dec13).pdf'),
(106, 2, 2, 'Engineering Drawing(June14).pdf'),
(107, 2, 2, 'Structured Programming Approach(Dec13).pdf'),
(108, 2, 2, 'Structured Programming Approach(June14).pdf'),
(109, 2, 3, 'Applied Mathematics(Dec13).pdf'),
(110, 2, 3, 'Applied Mathematics(June14).pdf'),
(111, 2, 3, 'Discrete Structures(Dec13).pdf'),
(112, 2, 3, 'Discrete Structures(June14).pdf'),
(113, 2, 3, 'Digital Logic Design and Analysis(Dec13).pdf'),
(114, 2, 3, 'Digital Logic Design and Analysis(June14).pdf'),
(115, 2, 3, 'Data Structures(Dec13).pdf'),
(116, 2, 3, 'Data Structures(June14).pdf'),
(117, 2, 3, 'Electronic Circuits and Communication Fundamentals(Dec13).pdf'),
(118, 2, 3, 'Electronic Circuits and Communication Fundamentals(June14).pdf'),
(119, 2, 3, 'Object Oriented Programming Methodology(Dec13).pdf'),
(120, 2, 3, 'Object Oriented Programming Methodology(June14).pdf'),
(121, 2, 4, 'Analysis of Algorithms(Dec13).pdf'),
(122, 2, 4, 'Analysis of Algorithms(June14).pdf'),
(123, 2, 4, 'Applied Mathematic(Dec13).pdf'),
(124, 2, 4, 'Applied Mathematic(June14).pdf'),
(125, 2, 4, 'Computer Graphics(Dec13).pdf'),
(126, 2, 4, 'Computer Graphics(June14).pdf'),
(127, 2, 4, 'Computer Organization and Architecture(June14).pdf'),
(128, 2, 4, 'Data Base Management systems(Dec13).pdf'),
(129, 2, 4, 'Data Base Management systems(June14).pdf'),
(130, 2, 4, 'Theoretical Computer Science(June14).pdf'),
(131, 2, 5, 'Advanced Database Management Systems(Dec12).pdf'),
(132, 2, 5, 'Advanced Database Management Systems(June13).pdf'),
(133, 2, 5, 'Computer Networks(Dec12).pdf'),
(134, 2, 5, 'Computer Networks(May13).pdf'),
(135, 2, 5, 'Microprocessor(Dec12).pdf'),
(136, 2, 5, 'Microprocessor(May13).pdf'),
(137, 2, 5, 'Web Engineering(June13).pdf'),
(138, 2, 5, 'Web Engineering(June14).pdf'),
(139, 2, 6, 'Advance Computer Network(June13).pdf'),
(140, 2, 6, 'Advance Microprocessor(June13).pdf'),
(141, 2, 6, 'Data Warehouse & Mining(June13).pdf'),
(142, 2, 6, 'Object Oriented Software Engineering(Dec12).pdf'),
(143, 2, 6, 'Object Oriented Software Engineering(June13).pdf'),
(144, 2, 6, 'System Programming & Complier Construction(Dec12).pdf'),
(145, 2, 6, 'System Programming & Complier Construction(June13).pdf'),
(146, 2, 7, 'Digital Signal & Image Processing(Dec14).pdf'),
(147, 2, 7, 'Digital Signal & Image Processing(June14).pdf'),
(148, 2, 7, 'Mobile Computing(June13).pdf'),
(149, 2, 7, 'Robotics & AI(June13).pdf'),
(150, 2, 7, 'System Security(May13).pdf'),
(151, 2, 8, 'Distributed Computing(June13).pdf'),
(152, 2, 8, 'Multimedia System Design(June13).pdf'),
(153, 2, 8, 'Software Architecture(June13).pdf'),
(154, 3, 1, 'Applied Chemistry(Dec13).pdf'),
(155, 3, 1, 'Applied Chemistry(June14).pdf'),
(156, 3, 1, 'Applied Mathematics(Dec13).pdf'),
(157, 3, 1, 'Applied Mathematics(May13).pdf'),
(158, 3, 1, 'Applied Mathematics(May14).pdf'),
(159, 3, 1, 'Applied Physics(Dec13).pdf'),
(160, 3, 1, 'Applied Physics(May13).pdf'),
(161, 3, 1, 'Applied Physics(May14).pdf'),
(162, 3, 1, 'Basic Electrical & Electronics Engineering(Dec13).pdf'),
(163, 3, 1, 'Basic Electrical & Electronics Engineering(June14).pdf'),
(164, 3, 1, 'Engineering Mechanics(Des13).pdf'),
(165, 3, 1, 'Engineering Mechanics(June14).pdf'),
(166, 3, 1, 'Environmental studies(Dec13).pdf'),
(167, 3, 1, 'Environmental studies(June14).pdf'),
(168, 3, 2, 'Applied Chemistry(Dec13).pdf'),
(169, 3, 2, 'Applied Chemistry(June14).pdf'),
(170, 3, 2, 'Applied Mathematics(Dec13).pdf'),
(171, 3, 2, 'Applied Mathematics(June14).pdf'),
(172, 3, 2, 'Applied Physics(Dec13).pdf'),
(173, 3, 2, 'Applied Physics(June14).pdf'),
(174, 3, 2, 'Communication Skills(Dec13).pdf'),
(175, 3, 2, 'Communication Skills(June14).pdf'),
(176, 3, 2, 'Engineering Drawing(Dec13).pdf'),
(177, 3, 2, 'Engineering Drawing(June14).pdf'),
(178, 3, 2, 'Structured Programming Approach(Dec13).pdf'),
(179, 3, 2, 'Structured Programming Approach(June14).pdf'),
(180, 3, 3, 'Applied Mathematics(May14).pdf'),
(181, 3, 3, 'Production Process(June14)).pdf'),
(182, 3, 3, 'Strength of Materials(May14).pdf'),
(183, 3, 3, 'Thermodynamic(May14).pdf'),
(184, 3, 4, 'Applied Mathematics(June14).pdf'),
(185, 3, 4, 'Industrial Electronics(June14).pdf'),
(186, 3, 4, 'Material Technology(June14).pdf'),
(187, 3, 4, 'Production Process(June14).pdf'),
(188, 3, 4, 'Theory of Machines(June14).pdf'),
(189, 3, 5, 'Fluid Mechanics(Dec12).pdf'),
(190, 3, 5, 'Heat Transfer(Dec12).pdf'),
(191, 3, 5, 'Mechanical Measurements and Control(Dec12).pdf'),
(192, 3, 5, 'Theory of Machines(Dec12).pdf'),
(193, 3, 6, 'E.Com & Ind. Finance(Dec12).pdf'),
(194, 3, 6, 'Hydraulic Machinary(May12).pdf'),
(195, 3, 6, 'ICEngine(Dec12).pdf'),
(196, 3, 6, 'Mechanical Vibrations(Dec12).pdf'),
(197, 3, 7, 'CADCAMCIM(Dec12).pdf'),
(198, 3, 7, 'Machine Design(Dec12).pdf'),
(199, 3, 7, 'Manufacturing Planning and Control(Dec12).pdf'),
(200, 3, 7, 'Power Plant Engg(Dec12).pdf'),
(201, 3, 7, 'Refrigeration and Air Conditioning(Dec12).pdf'),
(202, 3, 8, 'Automobile Engineering(Dec12).pdf'),
(203, 3, 8, 'Finite Element Analysis(May12).pdf'),
(204, 3, 8, 'Industrial Engineering & Enterprise Resource Planning(Dec12)'),
(205, 4, 1, 'Applied Chemistry(Dec13).pdf'),
(206, 4, 1, 'Applied Chemistry(June14).pdf'),
(207, 4, 1, 'Applied Mathematics(Dec13).pdf'),
(208, 4, 1, 'Applied Mathematics(May13).pdf'),
(209, 4, 1, 'Applied Mathematics(May14).pdf'),
(210, 4, 1, 'Applied Physics(Dec13).pdf'),
(211, 4, 1, 'Applied Physics(May13).pdf'),
(212, 4, 1, 'Applied Physics(May14).pdf'),
(213, 4, 1, 'Basic Electrical & Electronics Engineering(Dec13).pdf'),
(214, 4, 1, 'Basic Electrical & Electronics Engineering(June14).pdf'),
(215, 4, 1, 'Engineering Mechanics(Des13).pdf'),
(216, 4, 1, 'Engineering Mechanics(June14).pdf'),
(217, 4, 1, 'Environmental studies(Dec13).pdf'),
(218, 4, 1, 'Environmental studies(June14).pdf'),
(219, 4, 2, 'Applied Chemistry(Dec13).pdf'),
(220, 4, 2, 'Applied Chemistry(June14).pdf'),
(221, 4, 2, 'Applied Mathematics(Dec13).pdf'),
(222, 4, 2, 'Applied Mathematics(June14).pdf'),
(223, 4, 2, 'Applied Physics(Dec13).pdf'),
(224, 4, 2, 'Applied Physics(June14).pdf'),
(225, 4, 2, 'Communication Skills(Dec13).pdf'),
(226, 4, 2, 'Communication Skills(June14).pdf'),
(227, 4, 2, 'Engineering Drawing(Dec13).pdf'),
(228, 4, 2, 'Engineering Drawing(June14).pdf'),
(229, 4, 2, 'Structured Programming Approach(Dec13).pdf'),
(230, 4, 2, 'Structured Programming Approach(June14).pdf'),
(231, 4, 3, 'Analog Electronics(June14).pdf'),
(232, 4, 3, 'Applied Mathematics(June14).pdf'),
(233, 4, 3, 'Circuits and Transmission(June14).pdf'),
(234, 4, 3, 'Digital Electronics(June14).pdf'),
(235, 4, 3, 'Electronic Instruments and Measurements(June14).pdf'),
(236, 4, 4, 'Analog Electronics(June14).pdf'),
(237, 4, 4, 'Applied Mathematics(June14).pdf'),
(238, 4, 4, 'Control Systems(June14).pdf'),
(239, 4, 4, 'Microprocessors and Peripherals(June14).pdf'),
(240, 4, 4, 'Signals and Systems(June14).pdf'),
(241, 4, 4, 'Wave Theory and Propagation(June14).pdf'),
(242, 4, 5, 'Microcontrollers and Applications(May13).pdf'),
(243, 4, 5, 'Principles of Control System(June13).pdf'),
(244, 4, 5, 'Random Signal Analysis(May13).pdf'),
(245, 4, 5, 'RF Modelling & Antennas(May13).pdf'),
(246, 4, 6, 'Antenna & Wave Propagation(June13).pdf'),
(247, 4, 6, 'Digital Communication(June13).pdf'),
(248, 4, 6, 'Industrial Economics & Telecom Regulations(June13).pdf'),
(249, 4, 6, 'Microprocessor & Microcontroller(June13).pdf'),
(250, 4, 6, 'Television Engineering(June13).pdf'),
(251, 4, 7, 'Computer Communication network(June13).pdf'),
(252, 4, 7, 'Discrete Time Signal Processing(June13).pdf'),
(253, 4, 7, 'Fundamentals of Microwave Engineering(June13).pdf'),
(254, 4, 7, 'Mobile Communication & System(June13).pdf'),
(255, 4, 8, 'Advance Microwave Engineering(June13).pdf'),
(256, 4, 8, 'Optical Fiber Communication(June13).pdf'),
(257, 4, 8, 'Wireless Network(June13).pdf'),
(258, 5, 1, 'Applied Chemistry(Dec13).pdf'),
(259, 5, 1, 'Applied Chemistry(June14).pdf'),
(260, 5, 1, 'Applied Mathematics(Dec13).pdf'),
(291, 5, 1, 'Applied Mathematics(May13).pdf'),
(292, 5, 1, 'Applied Mathematics(May14).pdf'),
(293, 5, 1, 'Applied Physics(Dec13).pdf'),
(294, 5, 1, 'Applied Physics(May13).pdf'),
(295, 5, 1, 'Applied Physics(May14).pdf'),
(296, 5, 1, 'Basic Electrical & Electronics Engineering(Dec13).pdf'),
(297, 5, 1, 'Basic Electrical & Electronics Engineering(June14).pdf'),
(298, 5, 1, 'Engineering Mechanics(Des13).pdf'),
(299, 5, 1, 'Engineering Mechanics(June14).pdf'),
(300, 5, 1, 'Environmental studies(Dec13).pdf'),
(301, 5, 1, 'Environmental studies(June14).pdf'),
(302, 5, 2, 'Applied Chemistry(Dec13).pdf'),
(303, 5, 2, 'Applied Chemistry(June14).pdf'),
(304, 5, 2, 'Applied Mathematics(Dec13).pdf'),
(305, 5, 2, 'Applied Mathematics(June14).pdf'),
(306, 5, 2, 'Applied Physics(June14).pdf'),
(307, 5, 2, 'Communication Skills(Dec13).pdf'),
(308, 5, 2, 'Communication Skills(June14).pdf'),
(309, 5, 2, 'Engineering Drawing(Dec13).pdf'),
(310, 5, 2, 'Engineering Drawing(June14).pdf'),
(311, 5, 2, 'Structured Programming Approach(Dec13).pdf'),
(312, 5, 2, 'Structured Programming Approach(June14).pdf'),
(313, 5, 3, 'All Subject(June09).pdf'),
(314, 5, 4, 'All Subject(June09).pdf'),
(315, 5, 5, 'All Subject(June09).pdf'),
(316, 5, 6, 'All Subject(June09).pdf'),
(317, 5, 7, 'All Subject(June09).pdf'),
(318, 5, 8, 'All Subject(June9).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `s_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `b_id` int(11) NOT NULL,
  `survey_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`s_id`),
  KEY `b_id` (`b_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`s_id`, `password`, `b_id`, `survey_status`) VALUES
(101360, 'tejashree', 2, 1),
(201361, 'swapnali', 3, 1),
(501245, 'Pratik', 1, 1),
(501259, 'Shreyas', 1, 1),
(501273, 'kaustubh', 1, 1),
(501301, 'Aishwarya', 1, 1),
(501302, 'Liliyan', 1, 1),
(501303, 'Pradnya', 1, 1),
(501304, 'Darshil', 1, 1),
(501305, 'Vicky', 1, 1),
(501306, 'Bensy', 1, 1),
(501307, 'Christina', 1, 1),
(501308, 'Daphne', 1, 1),
(501309, 'Elizabeth', 1, 1),
(501312, 'Aniket', 1, 1),
(501313, 'Ansel', 1, 1),
(501314, 'Eldridge', 1, 1),
(501315, 'Astrid', 1, 1),
(501316, 'Prerana', 1, 1),
(501317, 'Abhinav', 1, 1),
(501318, 'Roshani', 1, 1),
(501319, 'Mitali', 1, 1),
(501320, 'Tejas', 1, 1),
(501321, 'Allen', 1, 1),
(501322, 'Pranit', 1, 1),
(501323, 'Shreyans', 1, 1),
(501324, 'Rohan', 1, 1),
(501325, 'Nikhil', 1, 1),
(501326, 'Janice', 1, 1),
(501327, 'Rashika', 1, 1),
(501328, 'vaishali', 1, 1),
(501330, 'Harshad', 1, 1),
(501331, 'Rakshita', 1, 1),
(501332, 'Radhika', 1, 1),
(501335, 'Delrina', 1, 1),
(501337, 'Vishnu', 1, 1),
(501339, 'Mit', 1, 1),
(501341, 'Shubham', 1, 1),
(501342, 'Justin', 1, 1),
(501344, 'Rincy', 1, 1),
(501345, 'Shalina', 1, 1),
(501346, 'Rowland', 1, 1),
(501348, 'Ananya', 1, 1),
(501349, 'Nishiti', 1, 1),
(501352, 'Kundan', 1, 1),
(501353, 'Utkarsh', 1, 1),
(501354, 'Aayushi', 1, 1),
(501355, 'Hardik', 1, 1),
(501356, 'Tanya', 1, 1),
(501357, 'Abhishek', 1, 1),
(501358, 'Karan', 1, 1),
(501359, 'Allen', 1, 1),
(501360, 'Ribhu', 1, 1),
(501361, 'Namrata', 1, 1),
(501362, 'Poonam', 1, 1),
(501363, 'Prajakta', 1, 1),
(501364, 'Prati', 1, 1),
(501365, 'Rajkumar', 1, 1),
(501366, 'Rutuja', 1, 1),
(501367, 'Sanket', 1, 1),
(501368, 'Santosh', 1, 1),
(501369, 'Sean', 1, 1),
(501370, 'sheetal', 1, 1),
(501371, 'Sherene', 1, 1),
(501372, 'Shraddha', 1, 1),
(501373, 'Supriya', 1, 1),
(501374, 'Manasi', 1, 1),
(501375, 'jitesh', 1, 1),
(501376, 'Vikram', 1, 1),
(501377, 'Ayaz', 1, 1),
(501378, 'gauri', 1, 1),
(501379, 'Bhavesh', 1, 1),
(501382, 'Ankita', 1, 1),
(501383, 'Kajal', 1, 1),
(501384, 'Kaveri', 1, 1),
(501385, 'Ashwini', 1, 1),
(501386, 'Mohamed', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students_profile`
--

CREATE TABLE IF NOT EXISTS `students_profile` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `b_id` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `mobileno` bigint(10) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  PRIMARY KEY (`profile_id`),
  KEY `s_id` (`s_id`),
  KEY `b_id` (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `students_profile`
--

INSERT INTO `students_profile` (`profile_id`, `s_id`, `first_name`, `last_name`, `b_id`, `sem`, `mobileno`, `email_id`) VALUES
(1, 501370, 'Sheetal', 'Kadlag', 1, 5, 9856870944, 'sheetal.kadlag@gmail.com'),
(3, 501364, 'Pratidnya', 'Bhalerao', 1, 5, 9870250945, 'angelprati25@gmail.com'),
(5, 501375, 'Jitesh', 'Patil', 1, 5, 8979589647, 'jitesh.patil@gmail.com'),
(6, 501378, 'Gauri', 'Vaidya', 1, 5, 8898806758, 'gauri56@gmail.com'),
(7, 101360, 'Tejashree', 'Mane', 2, 5, 8745903475, 'tejashree@gmail.com'),
(8, 201361, 'Swapnali', 'Shinde', 3, 3, 9870235467, 'Swapnalis@gmail.com'),
(9, 501273, 'Kaustubh', 'Padawal', 1, 7, 9967144075, 'padawalkaustubh95@gmail.com'),
(10, 501301, 'Aishwarya', 'Mohan', 1, 5, 8879963916, 'aishwaryamohan10.10@gmail.com'),
(11, 501302, 'Liliyan', 'Anthony', 1, 5, 9769235107, 'anthonyliliyan@gmail.com\r\n'),
(12, 501303, 'Pradnya', 'Chavan', 1, 5, 9773143395, 'pradnyachavan126@gmail.com\r\n'),
(13, 501304, 'Darshil', 'Chheda', 1, 5, 9819781745, 'darshilchheda88@yahoo.com\r\n'),
(14, 501305, 'Vicky', 'Chirayath', 1, 5, 9967527723, 'kenhell50@gmail.com\r\n'),
(15, 501306, 'Bensy', 'Charly', 1, 5, 9820482521, 'bensycharly19@gmail.com\r\n'),
(16, 501307, 'Christina', 'Rainy', 1, 5, 9757196574, 'christyrob007@gmail.com\r\n'),
(17, 501308, 'Daphne', 'Wilson', 1, 5, 9969217844, 'wilsondaffy@gmail.com\r\n'),
(18, 501309, 'Elizabeth', 'James', 1, 5, 9768201490, 'ashrick662@gmail.com\r\n'),
(19, 501312, 'Aniket', 'Fegade', 1, 5, 9820975615, 'aniketpf@gmail.com\r\n'),
(20, 501313, 'Ansel', 'Fernandes', 1, 5, 9833538729, 'anselfernandes77@gmail.com\r\n'),
(21, 501314, 'Eldridge', 'Fernandes', 1, 5, 9461088640, 'eldferns86@gmail.com\r\n'),
(22, 501315, 'Astrid', 'Ferreira', 1, 5, 9619199027, 'astrid.ferreira30@gmail.com\r\n'),
(23, 501316, 'Prerana', 'Gadhave', 1, 5, 9004731587, 'preranagadhave1994@gmail.com\r\n'),
(24, 501317, 'Abhinav', 'Gautam', 1, 5, 7875101306, 'abhinav.gautam95@gmail.com\r\n'),
(25, 501318, 'Roshani', 'Ghatule', 1, 5, 7208481041, 'roshanighatule@gmail.com\r\n'),
(26, 501319, 'Mitali', 'Ghogare', 1, 5, 9967282036, 'mitughogare@gmail.com\r\n'),
(27, 501320, 'Tejas', 'Gupta', 1, 5, 9167798902, 'tejasgupta14121995@gmail.com\r\n'),
(28, 501321, 'Allen', 'Henry', 1, 5, 9869337806, 'allenhenry94@gmail.com\r\n'),
(29, 501322, 'Pranit', 'Jaiswal', 1, 5, 9819084764, 'pranitjsl@gmail.com\r\n'),
(30, 501323, 'Shreyans', 'Jasoriya', 1, 5, 9619279162, 'shreyansjasoriya@gmail.com\r\n'),
(31, 501324, 'Rohan', '', 1, 5, 9892848821, 'jt.siemens@gmail.com\r\n'),
(32, 501325, 'Nikhil', 'Raphi', 1, 5, 8655437905, 'nikhil.raphi07@gmail.com\r\n'),
(33, 501326, 'Janice', '', 1, 5, 9004515027, 'jenusmk31@rediffmail.com\r\n'),
(34, 501327, 'Rashika', 'Koul', 1, 5, 7678089804, 'rashikak295@gmail.com\r\n'),
(35, 501328, 'vaishali', 'Koul', 1, 5, 8390791731, 'koulvaishali07@gmail.com\r\n'),
(36, 501330, 'Harshad', 'Kulkarni', 1, 5, 9869032336, 'harshadk2011@gmail.com\r\n'),
(37, 501331, 'Rakshita', 'Macheri', 1, 5, 9833851654, 'rakshita.macheri@gmail.com\r\n'),
(38, 501332, 'Radhika', 'Malpani', 1, 5, 9158733377, '23radhikamalpani@gmail.com\r\n'),
(39, 501335, 'Delrina', 'Michael', 1, 5, 7666770446, 'dellmichaelmjm@gmail.com\r\n'),
(40, 501337, 'Vishnu', 'Nambiar', 1, 5, 9920784770, 'vishnuthedb9@gmail.com\r\n'),
(41, 501339, 'Mit', 'Patel', 1, 5, 7738550021, 'mitcpatel278@gmail.com\r\n'),
(42, 501341, 'Shubham', 'Patil', 1, 5, 9764715887, 'shubhamfastrack@gmail.com\r\n'),
(43, 501342, 'Justin', 'Pinto', 1, 5, 7507173859, 'justinp0594@gmail.com\r\n'),
(44, 501344, 'Rincy', '', 1, 5, 9969395731, 'rincy_mails@yahoo.com\r\n'),
(45, 501345, 'Shalina', 'Rodrigues', 1, 5, 9987206233, 'shalina29@yahoo.in\r\n'),
(46, 501346, 'Rowland', '', 1, 5, 7506581369, 'rowlanddominic9768@gmail.com\r\n'),
(47, 501348, 'Ananya', 'Satoskar', 1, 5, 9757073222, 'ananyasatoskar@gmail.com\r\n'),
(48, 501349, 'Nishiti', 'Sawant', 1, 5, 9967827549, 'sawantnishiti@gmail.com\r\n'),
(49, 501352, 'Kundan', 'Shrivastav', 1, 5, 9167565804, 'KUNDANS95@GMAIL.COM\r\n'),
(50, 501353, 'Utkarsh', 'Singh', 1, 5, 9930265797, 'uasingh3103@gmail.com\r\n'),
(51, 501354, 'Aayushi', 'Sinha', 1, 5, 9869807520, 'sinhaaayu17@gmail.com\r\n'),
(52, 501355, 'Hardik', 'Sonetta', 1, 5, 7208257344, 'hsonetta@gmail.com\r\n'),
(53, 501356, 'Tanya', 'Kumar', 1, 5, 9757143209, 'kumartanya17@yahoo.com\r\n'),
(54, 501357, 'Abhishek', 'Tiwari', 1, 5, 8806114855, 'abhishek501357@gmail.com\r\n'),
(55, 501358, 'Karan', 'Tupe', 1, 5, 9920889422, 'tupekaran@gmail.com\r\n'),
(56, 501359, 'Allen', 'Turner', 1, 5, 9833106016, 'turnerallen006@gmail.com\r\n'),
(57, 501360, 'Ribhu', 'Vats', 1, 5, 9820493993, 'ribhuvats9@gmail.com\r\n'),
(58, 501361, 'Namrata', 'Walanj', 1, 5, 9967550008, 'namratawalanj@gmail.com\r\n'),
(59, 501245, 'Pratik', 'Ruptake', 1, 5, 8446789716, 'pratikrocks176@gmail.com\r\n'),
(60, 501259, 'Shreyas', 'Uikey', 1, 5, 9833874035, 'shreyashuikey26@gmail.com\r\n'),
(61, 501362, 'Poonam', 'Bhosale', 1, 5, 9594290342, 'bhosalepanu@gmail.com\r\n'),
(62, 501363, 'Prajakta', 'Borude', 1, 5, 8082014704, 'borudeprajakta5@gmail.com\r\n'),
(63, 501365, 'Rajkumar', 'Mokal', 1, 5, 7276367578, 'raj143mokal@gmail.com\r\n'),
(64, 501366, 'Rutuja', 'Dawkhar', 1, 5, 9619019425, 'rutujadawkhar95@gmail.com\r\n'),
(65, 501367, 'Sanket', 'Borhade', 1, 5, 9768730739, 'sanketborhade0@gmail.com\r\n'),
(66, 501368, 'Santosh', 'Bhosale', 1, 5, 9130939501, 'bsantosh195@gmail.com\r\n'),
(67, 501369, 'Sean', 'Sequeira', 1, 5, 9930835213, 'seansequeira11@gmail.com\r\n'),
(68, 501371, 'Sherene', 'Paul', 1, 5, 7506068451, 'sherene250396@gmail.com\r\n'),
(69, 501372, 'Shraddha', 'Chogale', 1, 5, 8983173016, 'chogaleshraddha1@gmail.com\r\n'),
(70, 501373, 'Supriya', 'Kadam', 1, 5, 8691931723, 'supriyakadamsup@gmail.com\r\n'),
(71, 501375, 'Tina', 'Dutta', 1, 5, 8097672313, 'tinadutta419@gmail.com\r\n'),
(72, 501374, 'Manasi', 'Suryawanshi', 1, 5, 7738238854, 'sunandasalve@gmail.com\r\n'),
(73, 501376, 'Vikram', 'Choudhary', 1, 5, 8879236163, 'vikramus4@gmail.com\r\n'),
(74, 501377, 'Ayaz', 'Mujawar', 1, 5, 9819846259, 'ayaz1295@gmail.com\r\n'),
(75, 501378, 'Nimesh', 'Pashte', 1, 5, 9689418222, 'nimeshpashte@gmail.com\r\n'),
(76, 501379, 'Bhavesh', 'Rothagan', 1, 5, 8286240866, 'rothagan1bhavesh@gmail.com\r\n'),
(77, 501382, 'Ankita', 'Raut', 1, 5, 9892304434, 'ankitaraut50@gmail.com\r\n'),
(78, 501383, 'Kajal', 'Aher', 1, 5, 8097067125, 'kajal28aher@gmail.com\r\n'),
(79, 501384, 'Kaveri', 'Andhale', 1, 5, 9702866750, 'andhale.kaveri@gmail.com\r\n'),
(80, 501385, 'Ashwini', 'Dhongade', 1, 5, 9619516809, 'ashwinidhongade9@gmail.com\r\n'),
(81, 501386, 'Mohamed', 'Pathan', 1, 5, 7738734559, 'mohmadpathan74@gmail.com\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(255) NOT NULL,
  `b_id` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  PRIMARY KEY (`sub_id`),
  KEY `b_id` (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sub_id`, `sub_name`, `b_id`, `sem`) VALUES
(1, 'Applied Mathematics I', 1, 1),
(2, 'Applied Physics I', 1, 1),
(3, 'Applied Chemistry I', 1, 1),
(4, 'Engineering Mechanics', 1, 1),
(5, 'Basic Electrical & Electronics Engineering', 1, 1),
(6, 'Environmental studies', 1, 1),
(7, 'Applied Mathematics II', 1, 2),
(8, 'Applied Physics II', 1, 2),
(9, 'Applied Chemistry II', 1, 2),
(10, 'Engineering Drawing', 1, 2),
(11, 'Structured Programming Approach', 1, 2),
(12, 'Communication Skills', 1, 2),
(13, 'Applied Mathematics III', 1, 3),
(14, 'Data Structure and Algorithm Analysis', 1, 3),
(15, 'Object Oriented Programming Methodology', 1, 3),
(16, 'Analog and Digital Circuits', 1, 3),
(17, 'Database Management Systems', 1, 3),
(19, 'Principles of Analog and Digital Communication.', 1, 3),
(20, 'Applied Mathematics IV', 1, 4),
(21, 'Computer Networks', 1, 4),
(22, 'Computer Organization and Architecture', 1, 4),
(23, 'Automata Theory', 1, 4),
(24, 'Web Programming', 1, 4),
(25, 'Information Theory and Coding', 1, 4),
(26, 'Business Communication and Ethics', 1, 5),
(27, 'Open Source Technologies', 1, 5),
(28, 'Advanced Database Management Systems', 1, 5),
(29, 'Microcontroller and Embedded Systems', 1, 5),
(30, 'Operating Systems', 1, 5),
(31, 'Computer Graphics and Virtual Reality', 1, 5),
(32, 'Software Engineering', 1, 6),
(33, 'Distributed Systems', 1, 6),
(34, 'System and Web Security', 1, 6),
(35, 'Data Mining and Business Intelligence', 1, 6),
(36, 'Advance Internet Technology', 1, 6),
(37, 'Data Warehousing, Mining & Business Intelligence', 1, 7),
(38, 'Digital Signal & Image processing', 1, 7),
(39, 'Simulation and Modeling', 1, 7),
(40, 'Software testing & Quality Assurance', 1, 7),
(41, 'Information Storage Management and Disaster Recovery', 1, 8),
(42, 'Gaming Architecture and programming', 1, 8),
(43, 'Software Project Management', 1, 8),
(44, 'Applied Mathematics III*', 2, 3),
(45, 'Object Oriented Programming Methodology*', 2, 3),
(46, 'Data Structures', 2, 3),
(47, 'Digital Logic Design and Analysis', 2, 3),
(48, 'Discrete Structures', 2, 3),
(49, 'Electronic Circuits and Communication Fundamentals', 2, 3),
(50, 'Applied Mathematics IV', 2, 4),
(51, 'Analysis of Algorithms', 2, 4),
(52, 'Computer Organization and Architecture', 2, 4),
(53, 'Data Base Management systems', 2, 4),
(54, 'Theoretical Computer Science', 2, 4),
(55, 'Computer Graphics', 2, 4),
(56, 'Microprocessor', 2, 5),
(57, 'Operating Systems', 2, 5),
(58, 'Structured and Object Oriented Analysis and Design', 2, 5),
(59, 'Computer Networks', 2, 5),
(60, 'Web Technologies Laboratory', 2, 5),
(61, 'Business Communication and Ethics', 2, 5),
(64, 'System Programming and Compiler Construction', 2, 6),
(65, 'Software Engineering', 2, 6),
(66, 'Distributed Databases', 2, 6),
(67, 'Mobile Communication and Computing', 2, 6),
(68, 'Digital Signal Processing', 2, 7),
(69, 'Cryptography and System Security', 2, 7),
(70, 'Artificial Intelligence', 2, 7),
(71, 'Data Warehouse and Mining', 2, 8),
(72, 'Human Machine Interaction', 2, 8),
(73, 'Parallel and distributed Systems', 2, 8),
(74, 'Applied Mathematics I', 2, 1),
(75, 'Applied Physics I', 2, 1),
(76, 'Applied Chemistry I', 2, 1),
(77, 'Engineering Mechanics', 2, 1),
(78, 'Basic Electrical & Electronics Engineering', 2, 1),
(79, 'Applied Mathematics II', 2, 2),
(80, 'Applied Physics II', 2, 2),
(81, 'Applied Chemistry II', 2, 2),
(82, 'Engineering Drawing', 2, 2),
(83, 'Structured Programming Approach', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `supreme`
--

CREATE TABLE IF NOT EXISTS `supreme` (
  `supreme_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supreme`
--

INSERT INTO `supreme` (`supreme_id`, `password`) VALUES
(1234, '1234');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE IF NOT EXISTS `survey` (
  `survey_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `result` int(11) NOT NULL,
  PRIMARY KEY (`survey_id`),
  KEY `sub_id` (`sub_id`),
  KEY `q_id` (`q_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`survey_id`, `sub_id`, `q_id`, `result`) VALUES
(1, 26, 1, 4),
(2, 26, 2, 4),
(3, 26, 4, 4),
(4, 26, 5, 4),
(5, 26, 6, 4),
(6, 27, 1, 4),
(7, 27, 2, 4),
(8, 27, 4, 4),
(9, 27, 5, 4),
(10, 27, 6, 4),
(11, 28, 1, 4),
(12, 28, 2, 4),
(13, 28, 4, 4),
(14, 28, 5, 4),
(15, 28, 6, 4),
(16, 29, 1, 4),
(17, 29, 2, 4),
(18, 29, 4, 4),
(19, 29, 5, 4),
(20, 29, 6, 4),
(21, 30, 1, 4),
(22, 30, 2, 4),
(23, 30, 4, 4),
(24, 30, 5, 4),
(25, 30, 6, 4),
(26, 31, 1, 4),
(27, 31, 2, 4),
(28, 31, 4, 4),
(29, 31, 5, 4),
(30, 31, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE IF NOT EXISTS `syllabus` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`s_id`),
  KEY `b_id` (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`s_id`, `b_id`, `path`) VALUES
(1, 1, 'Information Technology/FE.pdf'),
(2, 1, 'Information Technology/SE.pdf'),
(3, 1, 'Information Technology/TE.pdf'),
(4, 1, 'Information Technology/BE.pdf'),
(5, 2, 'Computer/FE.pdf'),
(6, 2, 'Computer/SE.pdf'),
(7, 2, 'Computer/TE.pdf'),
(8, 2, 'Computer/BE.pdf'),
(9, 3, 'Mechanical/FE.pdf'),
(10, 3, 'Mechanical/SE.pdf'),
(11, 3, 'Mechanical/TE-BE.pdf'),
(12, 4, 'Electronics/FE.pdf'),
(13, 4, 'Electronics/SE.pdf'),
(14, 4, 'Electronics/TE.pdf'),
(15, 4, 'Electronics/BE.pdf'),
(16, 4, 'Electronics/BE.pdf'),
(17, 5, 'Electrical/FE.pdf'),
(18, 5, 'Electrical/FE.pdf'),
(19, 5, 'Electrical/SE.pdf'),
(20, 5, 'Electrical/SE.pdf'),
(21, 5, 'Electrical/TE-BE.pdf'),
(22, 5, 'Electrical/TE-BE.pdf'),
(23, 5, 'Electrical/TE-BE.pdf'),
(24, 5, 'Electrical/TE-BE.pdf');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `branch` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manual`
--
ALTER TABLE `manual`
  ADD CONSTRAINT `manual_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `branch` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ppts`
--
ALTER TABLE `ppts`
  ADD CONSTRAINT `ppts_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `branch` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `branch` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students_profile`
--
ALTER TABLE `students_profile`
  ADD CONSTRAINT `students_profile_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `students` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_profile_ibfk_2` FOREIGN KEY (`b_id`) REFERENCES `branch` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `branch` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `survey`
--
ALTER TABLE `survey`
  ADD CONSTRAINT `survey_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `survey_ibfk_2` FOREIGN KEY (`q_id`) REFERENCES `questions` (`q_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD CONSTRAINT `syllabus_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `branch` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `sem_update` ON SCHEDULE EVERY 6 MONTH STARTS '2015-06-20 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE students_profile SET sem=sem+1$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
