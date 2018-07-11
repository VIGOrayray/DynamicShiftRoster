
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `employee` (
  `EmpID` int(11) NOT NULL AUTO_INCREMENT,
  `ID` varchar(13) NOT NULL,
  `EmpName` varchar(30) NOT NULL,
  `EmpSurname` varchar(30) NOT NULL,
  `Title` varchar(5) NOT NULL,
  `EmployeeType` varchar(15) NOT NULL,
  `Qualification` varchar(15) NOT NULL,
  `Experience` varchar(15) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `MobileNumber` varchar(10) NOT NULL,
  `EmailAddress` varchar(50) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(32) NOT NULL,
  PRIMARY KEY (`EmpID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;


INSERT INTO `employee` (`EmpID`, `ID`, `EmpName`, `EmpSurname`, `Title`, `EmployeeType`, `Qualification`, `Experience`, `Status`, `MobileNumber`, `EmailAddress`, `Username`, `Password`) VALUES
(1, '', 'Daniel', 'Verwey', '', 'admin', '', '', 'active', '', '', 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(2, '', 'Pieter', 'Duplessis', 'Mr', 'p1', 'Cisco', '', 'active', '0715553333', '', 'p1', '202cb962ac59075b964b07152d234b70'),
(3, '', 'Sean', 'Symonds', 'Mr', 'p1', 'MCSA', '', 'active', '', '', '', ''),
(4, '', 'Nhlanhla', 'Motloung', 'Mr', 'p1', 'Cisco', '', 'active', '0784646121', '', 'Nhla1', '123'),
(5, '', 'Simphiwe', 'Zulu', 'Mrs', 'call', '', '', 'active', '', '', '', ''),
(6, '', 'Leolin', 'McPherson', 'Mrs', 'call', '', '', 'active', '', '', '', ''),
(7, '', 'Eugenia', 'Tshabala', 'Miss', 'SDM', 'SDM Training', 'P1 AND Call manager', 'active', '', '', '', ''),
(8, '', 'Mathew', 'Dolby', 'Mr', 'Engineer', '', 'TechnicalExperience', 'active', '', '', '', ''),
(9, '', 'Thomas', 'Zahradnik', 'Mr', 'Engineer', '', 'Lead Network Engineer', 'active', '', '', '', ''),
(10, '', 'Sean', 'Gravett', 'Mr', 'Engineer', '', 'Linux Experience', 'active', '', '', '', ''),
(11, '', 'Gregg', 'Gibbs', 'Mr', 'SDM', '', 'Customer Service', 'active', '', '', '', '');


CREATE TABLE IF NOT EXISTS `leaveday` (
  `LeaveID` int(11) NOT NULL AUTO_INCREMENT,
  `leaveDate` date NOT NULL,
  `Reason` text NOT NULL,
  `ApprovedBy` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `EmpID` int(11) NOT NULL,
  `shiftID` int(11) NOT NULL,
  PRIMARY KEY (`LeaveID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;


INSERT INTO `leaveday` (`LeaveID`, `leaveDate`, `Reason`, `ApprovedBy`, `status`, `EmpID`, `shiftID`) VALUES
(1, '2018-06-03', 'm going home', 1, 'approved', 2, 12),
(2, '2018-06-04', 'm going home', 1, 'approved', 2, 17),
(3, '2018-06-05', 'm going home', 1, 'approved', 2, 22);


CREATE TABLE IF NOT EXISTS `overtime` (
  `overtimeID` int(11) NOT NULL AUTO_INCREMENT,
  `EmpID` int(11) NOT NULL,
  `dataAssigned` date NOT NULL,
  `shiftID` int(11) NOT NULL,
  PRIMARY KEY (`overtimeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


INSERT INTO `overtime` (`overtimeID`, `EmpID`, `dataAssigned`, `shiftID`) VALUES
(1, 4, '2018-06-01', 2),
(2, 4, '2018-06-01', 2);


CREATE TABLE IF NOT EXISTS `schedule` (
  `ScheduleID` int(11) NOT NULL AUTO_INCREMENT,
  `DateCreated` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `EmpID` int(11) NOT NULL,
  PRIMARY KEY (`ScheduleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;



INSERT INTO `schedule` (`ScheduleID`, `DateCreated`, `status`, `EmpID`) VALUES
(1, '2018-06-01', 'active', 1);



CREATE TABLE IF NOT EXISTS `shift` (
  `shiftID` int(11) NOT NULL AUTO_INCREMENT,
  `WorkDate` date NOT NULL,
  `SartWork` double NOT NULL,
  `actualStart` double NOT NULL,
  `EndWork` double NOT NULL,
  `actualEnd` double NOT NULL,
  `shiftType` varchar(30) NOT NULL,
  `arragementID` int(11) NOT NULL,
  `EmpID` int(11) NOT NULL,
  PRIMARY KEY (`shiftID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=128 ;


INSERT INTO `shift` (`shiftID`, `WorkDate`, `SartWork`, `actualStart`, `EndWork`, `actualEnd`, `shiftType`, `arragementID`, `EmpID`) VALUES
(1, '2018-05-27', 6, 0, 14, 0, 'Both', 6, 0),
(2, '2018-05-27', 14, 0, 22, 0, 'Both', 7, 0),
(3, '2018-05-27', 22, 0, 6, 0, 'p1', 8, 2),
(4, '2018-05-28', 6, 0, 14, 0, 'p1', 2, 3),
(5, '2018-05-28', 18, 0, 24, 0, 'p1', 3, 4),
(6, '2018-05-28', 6, 0, 12, 0, 'call', 4, 5),
(7, '2018-05-28', 12, 0, 18, 0, 'call', 5, 7),
(8, '2018-05-29', 0, 0, 6, 0, 'p1', 1, 2),
(9, '2018-05-29', 6, 0, 14, 0, 'p1', 2, 3),
(10, '2018-05-29', 18, 0, 24, 0, 'p1', 3, 4),
(11, '2018-05-29', 6, 0, 12, 0, 'call', 4, 5),
(12, '2018-05-29', 12, 0, 18, 0, 'call', 5, 7),
(13, '2018-05-30', 0, 0, 6, 0, 'p1', 1, 2),
(14, '2018-05-30', 6, 0, 14, 0, 'p1', 2, 3),
(15, '2018-05-30', 18, 0, 24, 0, 'p1', 3, 4),
(16, '2018-05-30', 6, 0, 12, 0, 'call', 4, 5),
(17, '2018-05-30', 12, 0, 18, 0, 'call', 5, 7),
(18, '2018-05-31', 0, 0, 6, 0, 'p1', 1, 2),
(19, '2018-05-31', 6, 0, 14, 0, 'p1', 2, 3),
(20, '2018-05-31', 18, 0, 24, 0, 'p1', 3, 4),
(21, '2018-05-31', 6, 0, 12, 0, 'call', 4, 5),
(22, '2018-05-31', 12, 0, 18, 0, 'call', 5, 7),
(23, '2018-06-01', 0, 0, 6, 0, 'p1', 1, 2),
(24, '2018-06-01', 6, 0, 14, 0, 'p1', 2, 3),
(25, '2018-06-01', 18, 0, 24, 0, 'p1', 3, 4),
(26, '2018-06-01', 6, 0, 12, 0, 'call', 4, 5),
(27, '2018-06-01', 12, 0, 18, 0, 'call', 5, 7),
(28, '2018-06-02', 0, 0, 6, 0, 'p1', 0, 2),
(29, '2018-06-02', 6, 0, 14, 0, 'Both', 6, 0),
(30, '2018-06-02', 14, 0, 22, 0, 'Both', 7, 0),
(31, '2018-06-02', 22, 0, 6, 0, 'p1', 8, 0),
(32, '2018-06-03', 6, 0, 14, 0, 'Both', 6, 0),
(33, '2018-06-03', 14, 0, 22, 0, 'Both', 7, 0),
(34, '2018-06-03', 22, 0, 6, 0, 'p1', 8, 4),
(35, '2018-06-04', 6, 0, 14, 0, 'p1', 2, 2),
(36, '2018-06-04', 18, 0, 24, 0, 'p1', 3, 3),
(37, '2018-06-04', 6, 0, 12, 0, 'call', 4, 7),
(38, '2018-06-04', 12, 0, 18, 0, 'call', 5, 5),
(39, '2018-06-05', 0, 0, 6, 0, 'p1', 1, 4),
(40, '2018-06-05', 6, 0, 14, 0, 'p1', 2, 2),
(41, '2018-06-05', 18, 0, 24, 0, 'p1', 3, 3),
(42, '2018-06-05', 6, 0, 12, 0, 'call', 4, 7),
(43, '2018-06-05', 12, 0, 18, 0, 'call', 5, 5),
(44, '2018-06-06', 0, 0, 6, 0, 'p1', 1, 4),
(45, '2018-06-06', 6, 0, 14, 0, 'p1', 2, 2),
(46, '2018-06-06', 18, 0, 24, 0, 'p1', 3, 3),
(47, '2018-06-06', 6, 0, 12, 0, 'call', 4, 7),
(48, '2018-06-06', 12, 0, 18, 0, 'call', 5, 5),
(49, '2018-06-07', 0, 0, 6, 0, 'p1', 1, 4),
(50, '2018-06-07', 6, 0, 14, 0, 'p1', 2, 2),
(51, '2018-06-07', 18, 0, 24, 0, 'p1', 3, 3),
(52, '2018-06-07', 6, 0, 12, 0, 'call', 4, 7),
(53, '2018-06-07', 12, 0, 18, 0, 'call', 5, 5),
(54, '2018-06-08', 0, 0, 6, 0, 'p1', 1, 4),
(55, '2018-06-08', 6, 0, 14, 0, 'p1', 2, 2),
(56, '2018-06-08', 18, 0, 24, 0, 'p1', 3, 3),
(57, '2018-06-08', 6, 0, 12, 0, 'call', 4, 7),
(58, '2018-06-08', 12, 0, 18, 0, 'call', 5, 5),
(59, '2018-06-09', 0, 0, 6, 0, 'p1', 0, 4),
(60, '2018-06-09', 6, 0, 14, 0, 'Both', 6, 0),
(61, '2018-06-09', 14, 0, 22, 0, 'Both', 7, 0),
(62, '2018-06-09', 22, 0, 6, 0, 'p1', 8, 0),
(63, '2018-06-10', 6, 0, 14, 0, 'Both', 6, 0),
(64, '2018-06-10', 14, 0, 22, 0, 'Both', 7, 0),
(65, '2018-06-10', 22, 0, 6, 0, 'p1', 8, 3),
(66, '2018-06-11', 6, 0, 14, 0, 'p1', 2, 4),
(67, '2018-06-11', 18, 0, 24, 0, 'p1', 3, 2),
(68, '2018-06-11', 6, 0, 12, 0, 'call', 4, 5),
(69, '2018-06-11', 12, 0, 18, 0, 'call', 5, 7),
(70, '2018-06-12', 0, 0, 6, 0, 'p1', 1, 3),
(71, '2018-06-12', 6, 0, 14, 0, 'p1', 2, 4),
(72, '2018-06-12', 18, 0, 24, 0, 'p1', 3, 2),
(73, '2018-06-12', 6, 0, 12, 0, 'call', 4, 5),
(74, '2018-06-12', 12, 0, 18, 0, 'call', 5, 7),
(75, '2018-06-13', 0, 0, 6, 0, 'p1', 1, 3),
(76, '2018-06-13', 6, 0, 14, 0, 'p1', 2, 4),
(77, '2018-06-13', 18, 0, 24, 0, 'p1', 3, 2),
(78, '2018-06-13', 6, 0, 12, 0, 'call', 4, 5),
(79, '2018-06-13', 12, 0, 18, 0, 'call', 5, 7),
(80, '2018-06-14', 0, 0, 6, 0, 'p1', 1, 3),
(81, '2018-06-14', 6, 0, 14, 0, 'p1', 2, 4),
(82, '2018-06-14', 18, 0, 24, 0, 'p1', 3, 2),
(83, '2018-06-14', 6, 0, 12, 0, 'call', 4, 5),
(84, '2018-06-14', 12, 0, 18, 0, 'call', 5, 7),
(85, '2018-06-15', 0, 0, 6, 0, 'p1', 1, 3),
(86, '2018-06-15', 6, 0, 14, 0, 'p1', 2, 4),
(87, '2018-06-15', 18, 0, 24, 0, 'p1', 3, 2),
(88, '2018-06-15', 6, 0, 12, 0, 'call', 4, 5),
(89, '2018-06-15', 12, 0, 18, 0, 'call', 5, 7),
(90, '2018-06-16', 0, 0, 6, 0, 'p1', 1, 3),
(91, '2018-06-16', 6, 0, 14, 0, 'Both', 6, 0),
(92, '2018-06-16', 14, 0, 22, 0, 'Both', 7, 0),
(93, '2018-06-16', 22, 0, 6, 0, 'p1', 8, 0),
(94, '2018-06-17', 6, 0, 14, 0, 'Both', 6, 0),
(95, '2018-06-17', 14, 0, 22, 0, 'Both', 7, 0),
(96, '2018-06-17', 22, 0, 6, 0, 'p1', 8, 4),
(97, '2018-06-18', 6, 0, 14, 0, 'p1', 2, 2),
(98, '2018-06-18', 18, 0, 24, 0, 'p1', 3, 3),
(99, '2018-06-18', 6, 0, 12, 0, 'call', 4, 7),
(100, '2018-06-18', 12, 0, 18, 0, 'call', 5, 5),
(101, '2018-06-19', 0, 0, 6, 0, 'p1', 1, 4),
(102, '2018-06-19', 6, 0, 14, 0, 'p1', 2, 2),
(103, '2018-06-19', 18, 0, 24, 0, 'p1', 3, 3),
(104, '2018-06-19', 6, 0, 12, 0, 'call', 4, 7),
(105, '2018-06-19', 12, 0, 18, 0, 'call', 5, 5),
(106, '2018-06-20', 0, 0, 6, 0, 'p1', 1, 4),
(107, '2018-06-20', 6, 0, 14, 0, 'p1', 2, 2),
(108, '2018-06-20', 18, 0, 24, 0, 'p1', 3, 3),
(109, '2018-06-20', 6, 0, 12, 0, 'call', 4, 7),
(110, '2018-06-20', 12, 0, 18, 0, 'call', 5, 5),
(111, '2018-06-21', 0, 0, 6, 0, 'p1', 1, 4),
(112, '2018-06-21', 6, 0, 14, 0, 'p1', 2, 2),
(113, '2018-06-21', 18, 0, 24, 0, 'p1', 3, 3),
(114, '2018-06-21', 6, 0, 12, 0, 'call', 4, 7),
(115, '2018-06-21', 12, 0, 18, 0, 'call', 5, 5),
(116, '2018-06-22', 0, 0, 6, 0, 'p1', 1, 4),
(117, '2018-06-22', 6, 0, 14, 0, 'p1', 2, 2),
(118, '2018-06-22', 18, 0, 24, 0, 'p1', 3, 3),
(119, '2018-06-22', 6, 0, 12, 0, 'call', 4, 7),
(120, '2018-06-22', 12, 0, 18, 0, 'call', 5, 5),
(121, '2018-06-23', 0, 0, 6, 0, 'p1', 1, 4),
(122, '2018-06-23', 6, 0, 14, 0, 'Both', 6, 0),
(123, '2018-06-23', 14, 0, 22, 0, 'Both', 7, 0),
(124, '2018-06-23', 22, 0, 6, 0, 'p1', 8, 0),
(125, '2018-06-24', 6, 0, 14, 0, 'Both', 6, 0),
(126, '2018-06-24', 14, 0, 22, 0, 'Both', 7, 0),
(127, '2018-06-24', 22, 0, 6, 0, 'p1', 8, 3);


CREATE TABLE IF NOT EXISTS `shiftarrangement` (
  `arrangementID` int(11) NOT NULL AUTO_INCREMENT,
  `StartTime` double NOT NULL,
  `EndTime` double NOT NULL,
  `shiftType` varchar(10) NOT NULL,
  `dayType` varchar(10) NOT NULL,
  `ScheduleID` int(11) NOT NULL,
  PRIMARY KEY (`arrangementID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;


INSERT INTO `shiftarrangement` (`arrangementID`, `StartTime`, `EndTime`, `shiftType`, `dayType`, `ScheduleID`) VALUES
(1, 0, 6, 'p1', 'weekday', 1),
(2, 6, 14, 'p1', 'weekday', 1),
(3, 18, 24, 'p1', 'weekday', 1),
(4, 6, 12, 'call', 'weekday', 1),
(5, 12, 18, 'call', 'weekday', 1),
(6, 6, 14, 'Both', 'weekend', 1),
(7, 14, 22, 'Both', 'weekend', 1),
(8, 22, 6, 'p1', 'weekend', 1);


