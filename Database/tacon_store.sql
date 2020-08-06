-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 06, 2020 at 02:26 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tacon_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `bin_log`
--

DROP TABLE IF EXISTS `bin_log`;
CREATE TABLE IF NOT EXISTS `bin_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `USERID` int(11) NOT NULL,
  `CODE` varchar(11) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `serial_number` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `done_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `action_type` varchar(12) CHARACTER SET utf16 NOT NULL DEFAULT 'grn',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bin_log`
--

INSERT INTO `bin_log` (`id`, `USERID`, `CODE`, `serial_number`, `balance`, `done_date`, `action_type`) VALUES
(1, 4, '123312', 1003, 55, '2020-07-29 05:48:37', 'grn'),
(4, 2, '123312', 1000, 43, '2020-07-29 08:59:34', 'siv'),
(5, 2, '0011', 1001, 188, '2020-07-29 10:54:37', 'siv'),
(6, 2, '0011', 1002, 176, '2020-07-29 10:57:07', 'siv'),
(7, 2, '0011', 1003, 164, '2020-07-29 11:00:52', 'siv'),
(12, 6, '0012', 1002, 12, '2020-08-02 13:59:59', 'grn'),
(13, 6, '0012', 1003, 62, '2020-08-02 21:14:16', 'grn'),
(14, 6, '0012', 1004, 61, '2020-08-06 02:13:10', 'siv');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `DID` varchar(9) NOT NULL,
  `department_name` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `DID`, `department_name`) VALUES
(1, 'TACON-ICT', 'ICT Department'),
(2, 'TACON-HR', 'Human Resources Department'),
(3, 'TACON-PC', 'Procurement Department'),
(4, 'TACON-CON', 'Construction Department'),
(5, 'TACON-SEC', 'Security Department'),
(6, 'TACON-STR', 'Store Department');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `USERID` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `phone` int(10) NOT NULL,
  `DID` varchar(9) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(15) NOT NULL,
  PRIMARY KEY (`USERID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`USERID`, `first_name`, `last_name`, `phone`, `DID`, `email`, `pass`) VALUES
(2, 'Kabila', 'Haile', 910456904, 'TACON-ICT', 'kabilahaile@gmail.com', '123123'),
(3, 'Abebe', 'Kebede', 923141180, 'TACON-ICT', 'ak@gmail.com', 'WDuvKRk8b6vpK4s'),
(4, 'Tebikew', 'Ikawen', 923141181, 'TACON-STR', 'te@gmail.com', 'Uf6evkVjcNSqABi'),
(5, 'Jalene', 'Mirgisa', 923141182, 'TACON-PC', 'jm@gmail.com', 'Uf6evkVjcNSqABi'),
(6, 'Silas', 'Getachew', 923141183, 'TACON-PC', 'sg@gmail.com', 'Uf6evkVjcNSqABi');

-- --------------------------------------------------------

--
-- Table structure for table `grn`
--

DROP TABLE IF EXISTS `grn`;
CREATE TABLE IF NOT EXISTS `grn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(15) NOT NULL,
  `description` varchar(20) NOT NULL,
  `unit` varchar(12) NOT NULL,
  `qty` int(7) NOT NULL,
  `unit_price` double NOT NULL,
  `total_price` double NOT NULL,
  `remark` varchar(30) NOT NULL,
  `store_keeper` varchar(30) NOT NULL,
  `delivered_by` varchar(30) NOT NULL,
  `supplier` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `serial_number` int(11) NOT NULL,
  `supplier_invoice` int(11) NOT NULL,
  `pr_po_no` int(11) NOT NULL,
  `total_qty` int(11) NOT NULL,
  `total_unit` double NOT NULL,
  `grand_total` double NOT NULL,
  `receipt_type` varchar(15) NOT NULL,
  `sending_store` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grn`
--

INSERT INTO `grn` (`id`, `code`, `description`, `unit`, `qty`, `unit_price`, `total_price`, `remark`, `store_keeper`, `delivered_by`, `supplier`, `date`, `serial_number`, `supplier_invoice`, `pr_po_no`, `total_qty`, `total_unit`, `grand_total`, `receipt_type`, `sending_store`) VALUES
(10, '0012', 'Papers', 'Dozen', 12, 150, 1800, 'In good shape', 'Abebe Kebede Chanyalew', 'Kabila', 'Supplier', '2020-08-02 13:59:59', 1002, 32, 37, 12, 150, 1800, 'Purchase', 'BLING'),
(11, '0012', 'Papers', 'Dozen', 50, 145.9, 7295, 'In good shape', 'Abebe Kebede Chanyalew', 'Anbesse', '', '2020-08-05 21:36:11', 1003, 157875, 1000, 50, 145.9, 7295, 'Purchase', 'CMC'),
(12, '123312', 'Chair', 'Dozen', 50, 145.9, 7295, 'In good shape', 'Abebe Kebede Chanyalew', 'Anbesse', '', '2020-08-05 21:36:11', 1003, 157875, 1000, 50, 145.9, 7295, 'Purchase', 'CMC');

-- --------------------------------------------------------

--
-- Table structure for table `heads`
--

DROP TABLE IF EXISTS `heads`;
CREATE TABLE IF NOT EXISTS `heads` (
  `USERID` int(11) NOT NULL,
  `DID` varchar(9) NOT NULL,
  `level` int(11) NOT NULL,
  KEY `USERID` (`USERID`),
  KEY `DID` (`DID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `heads`
--

INSERT INTO `heads` (`USERID`, `DID`, `level`) VALUES
(3, 'TACON-ICT', 1),
(4, 'TACON-STR', 1),
(5, 'TACON-PC', 1);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
CREATE TABLE IF NOT EXISTS `material` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `material_name` varchar(130) NOT NULL,
  `code` int(11) NOT NULL,
  `bought_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `available_quantity` int(11) NOT NULL,
  `unit_price` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `material_name`, `code`, `bought_on`, `available_quantity`, `unit_price`) VALUES
(1, 'Chair', 123312, '2020-07-28 20:55:57', 43, 600),
(2, 'Bic Pen', 11, '2020-07-29 09:48:15', 164, 75),
(3, 'Papers', 12, '2020-07-29 09:48:15', 61, 145);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notification_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(30) NOT NULL,
  `notification_body` varchar(120) NOT NULL,
  `unred` int(1) NOT NULL DEFAULT 0,
  `notify` int(11) NOT NULL,
  `notif_type` varchar(12) CHARACTER SET utf16le NOT NULL DEFAULT '',
  `USERID` int(11) NOT NULL DEFAULT 0,
  `serial_number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notification_time`, `title`, `notification_body`, `unred`, `notify`, `notif_type`, `USERID`, `serial_number`) VALUES
(1, '2020-07-29 11:15:56', 'SRV Approval', 'Kabila Haile is waiting for your approval...', 1, 3, 'rsiv', 2, 1000),
(2, '2020-08-05 09:58:09', 'SRV Approved', 'Abebe Kebede approved your SRV...', 1, 2, '', 0, 1000),
(5, '2020-07-29 12:48:31', 'SIV Requested', 'Kabila Haile requested SIV...', 1, 4, 'rsiv', 2, 1000),
(6, '2020-08-06 01:39:07', 'SIV Done', 'Tebikew Ikawen finished SIV...', 1, 2, 'sivdone', 0, 1001),
(20, '2020-07-29 11:15:39', 'SRV Approval', 'Kabila Haile is waiting for your approval...', 1, 3, 'rsiv', 2, 1004),
(21, '2020-08-02 21:54:34', 'SRV Approved', 'Abebe Kebede approved your SRV...', 1, 2, '', 0, 1004),
(22, '2020-07-29 12:20:03', 'SIV Requested', 'Kabila Haile requested SIV...', 1, 4, '', 2, 1004),
(24, '2020-08-02 21:54:34', 'SIV Done', 'Tebikew Ikawen finished SIV...', 1, 2, 'sivdone', 0, 1004),
(25, '2020-07-29 12:49:56', 'PR Request', 'Kabila Haile is waiting for your approval...', 1, 5, 'pr', 2, 1000),
(26, '2020-08-05 09:58:09', 'PR Approved', 'Jalene Mirgisa approved your PR...', 1, 2, 'pr_approved', 0, 1000),
(27, '2020-07-30 11:18:22', 'Prepare a PO', 'Jalene Mirgisa approved a PR...', 1, 0, 'pc_handle', 2, 1000),
(30, '2020-07-30 11:45:32', 'PO Approval', 'Silas Getachew is waiting for your approval...', 1, 5, 'po_approve', 6, 1000),
(31, '2020-08-06 01:44:12', 'PO Approved', 'Jalene Mirgisa approved your PR...', 1, 6, '', 0, 1000),
(36, '2020-08-02 21:54:34', 'Material Arrived', 'The requested material has arrived...', 1, 2, 'arrived', 0, 1004),
(39, '2020-08-06 02:05:39', 'SRV Approval', 'Silas Getachew is waiting for your approval...', 1, 5, 'srv', 6, 1003),
(40, '2020-08-06 02:17:48', 'SRV Approved', 'Jalene Mirgisa approved your SRV...', 1, 6, '', 0, 1003),
(41, '2020-08-06 02:13:10', 'SIV Requested', 'Silas Getachew requested SIV...', 1, 4, 'rsiv', 6, 1003),
(42, '2020-08-06 02:17:48', 'SIV Done', 'Tebikew Ikawen finished SIV...', 1, 6, 'sivdone', 0, 1005);

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

DROP TABLE IF EXISTS `po`;
CREATE TABLE IF NOT EXISTS `po` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `part_no` varchar(15) NOT NULL,
  `description` varchar(20) NOT NULL,
  `unit` varchar(12) NOT NULL,
  `qty_ordered` int(7) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `unit_price` double NOT NULL,
  `total_price` double NOT NULL,
  `remark` varchar(30) NOT NULL,
  `prepared_by` varchar(30) NOT NULL,
  `checked_by` varchar(30) NOT NULL,
  `project_name` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `serial_number` int(11) NOT NULL,
  `performa` int(11) NOT NULL,
  `offer_date` date NOT NULL,
  `total_birr` double NOT NULL,
  `tax_birr` double NOT NULL,
  `net_birr` double NOT NULL,
  `terms` varchar(50) NOT NULL,
  `delivery_time` date NOT NULL,
  `ordered_by` int(11) NOT NULL,
  `is_done` int(11) NOT NULL DEFAULT 0,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `important_index` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `serial_number` (`serial_number`),
  KEY `serial_number_2` (`serial_number`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`id`, `part_no`, `description`, `unit`, `qty_ordered`, `supplier`, `unit_price`, `total_price`, `remark`, `prepared_by`, `checked_by`, `project_name`, `date`, `serial_number`, `performa`, `offer_date`, `total_birr`, `tax_birr`, `net_birr`, `terms`, `delivery_time`, `ordered_by`, `is_done`, `is_approved`, `important_index`) VALUES
(5, '453534', ' Papers', 'Dozen', 34, 'Supplier', 147, 4998, 'None', 'Silas Getachew', 'Jalene Mirgisa', 'ICT Department', '2020-08-01 21:53:53', 1000, 77665432, '2020-07-30', 4998, 750, 5748, 'On delivery', '2020-08-01', 2, 0, 1, 1004);

-- --------------------------------------------------------

--
-- Table structure for table `pr`
--

DROP TABLE IF EXISTS `pr`;
CREATE TABLE IF NOT EXISTS `pr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(15) NOT NULL,
  `description` varchar(20) NOT NULL,
  `unit` varchar(12) NOT NULL,
  `qty` int(7) NOT NULL,
  `stock_balance` int(7) NOT NULL,
  `remark` varchar(30) NOT NULL,
  `requested_by` varchar(30) NOT NULL,
  `approved_by` varchar(30) NOT NULL,
  `DID` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `serial_number` int(11) NOT NULL,
  `send_to` varchar(30) NOT NULL,
  `deliver_to` varchar(30) NOT NULL,
  `is_approved` int(1) NOT NULL DEFAULT 0,
  `srv` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pr`
--

INSERT INTO `pr` (`id`, `item`, `description`, `unit`, `qty`, `stock_balance`, `remark`, `requested_by`, `approved_by`, `DID`, `date`, `serial_number`, `send_to`, `deliver_to`, `is_approved`, `srv`) VALUES
(3, '0012', 'Papers', 'Dozen', 34, 0, 'None', 'Abebe Kebede Chanyalew', 'Jalene Mirgisa', 'ICT Department', '2020-08-01 21:28:59', 1000, 'CMC Store', 'Kabila Haile', 1, 1004),
(8, '0012', 'Papers', 'Dozen', 34, 0, 'None', 'Abebe Kebede Chanyalew', 'Jalene Mirgisa', 'ICT Department', '2020-08-01 21:41:12', 1001, 'Kabila', 'Abebe', 1, 1004);

-- --------------------------------------------------------

--
-- Table structure for table `siv`
--

DROP TABLE IF EXISTS `siv`;
CREATE TABLE IF NOT EXISTS `siv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(15) NOT NULL,
  `description` varchar(20) NOT NULL,
  `unit` varchar(12) NOT NULL,
  `qty_requested` int(7) NOT NULL,
  `qty_issued` int(7) NOT NULL,
  `unit_price` double NOT NULL,
  `total_price` double NOT NULL,
  `remark` varchar(30) NOT NULL,
  `store_keeper` varchar(30) NOT NULL,
  `recepient_name` varchar(30) NOT NULL,
  `DID` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `serial_number` int(11) NOT NULL,
  `issuing_store` varchar(50) NOT NULL,
  `grv_number` int(11) NOT NULL,
  `authorized_by` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siv`
--

INSERT INTO `siv` (`id`, `code`, `description`, `unit`, `qty_requested`, `qty_issued`, `unit_price`, `total_price`, `remark`, `store_keeper`, `recepient_name`, `DID`, `date`, `serial_number`, `issuing_store`, `grv_number`, `authorized_by`) VALUES
(15, '0011', 'Bic Pen', 'Dozen', 12, 12, 24.45, 293.4, 'None', 'Tebikew Ikawen', '', 'ICT Department', '2020-07-29 10:54:37', 1001, 'CMC', 343210, 'Abebe Kebede Chanyalew'),
(16, '0011', 'Bic Pen', 'Dozen', 12, 12, 24.45, 293.4, 'None', 'Tebikew Ikawen', 'Kabila Haile', 'ICT Department', '2020-07-29 10:57:07', 1002, 'CMC', 123123, 'Abebe Kebede Chanyalew'),
(17, '0011', 'Bic Pen', 'Dozen', 12, 12, 24.45, 293.4, 'None', 'Tebikew Ikawen', 'Kabila Haile', 'ICT Department', '2020-07-29 11:00:52', 1003, 'CMC', 7635567, 'Abebe Kebede Chanyalew'),
(18, '0012', 'Papers', 'Inch', 1, 1, 145.9, 145.9, 'In good shape', 'Tebikew Ikawen', 'Silas Getachew', 'ICT Department', '2020-08-06 02:13:10', 1004, 'CMC', 1003, 'Abebe Kebede Chanyalew'),
(19, '123312', 'Chair', 'Inch', 7, 7, 145.9, 145.9, 'In good shape', 'Tebikew Ikawen', 'Silas Getachew', 'ICT Department', '2020-08-06 02:16:16', 1000, 'CMC', 1000, 'Abebe Kebede Chanyalew');

-- --------------------------------------------------------

--
-- Table structure for table `sno`
--

DROP TABLE IF EXISTS `sno`;
CREATE TABLE IF NOT EXISTS `sno` (
  `document_type` varchar(6) NOT NULL,
  `current_number` int(11) NOT NULL,
  PRIMARY KEY (`document_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sno`
--

INSERT INTO `sno` (`document_type`, `current_number`) VALUES
('grn', 1002),
('po', 1001),
('pr', 1002),
('siv', 1005),
('srv', 1004);

-- --------------------------------------------------------

--
-- Table structure for table `srv`
--

DROP TABLE IF EXISTS `srv`;
CREATE TABLE IF NOT EXISTS `srv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(15) NOT NULL,
  `description` varchar(20) NOT NULL,
  `unit` varchar(12) NOT NULL,
  `qty_requested` int(7) NOT NULL,
  `qty_issued` int(7) NOT NULL,
  `unit_price` double NOT NULL,
  `total_price` double NOT NULL,
  `remark` varchar(30) NOT NULL DEFAULT 'None',
  `requested_by` varchar(30) NOT NULL,
  `approved_by` varchar(30) NOT NULL,
  `DID` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `serial_number` int(11) NOT NULL,
  `USERID` int(11) NOT NULL,
  `is_approved` int(1) NOT NULL DEFAULT 0,
  `is_provided` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srv`
--

INSERT INTO `srv` (`id`, `code`, `description`, `unit`, `qty_requested`, `qty_issued`, `unit_price`, `total_price`, `remark`, `requested_by`, `approved_by`, `DID`, `date`, `serial_number`, `USERID`, `is_approved`, `is_provided`) VALUES
(1, '123312', 'Black Chair', 'Peice', 12, 0, 23.75, 285, 'None', 'Kabila Haile', 'Abebe Kebede', 'TACON-ICT', '2020-07-29 09:55:21', 1000, 2, 1, 1),
(3, '0011', 'Bic Pen', 'Dozen', 12, 0, 24.45, 293.4, 'None', 'Kabila Haile', 'Abebe Kebede', 'TACON-ICT', '2020-07-29 10:57:07', 1004, 2, 1, 1),
(4, '0012', 'Papers', 'Dozen', 34, 0, 145.9, 4960.6, 'None', 'Kabila Haile', 'Abebe Kebede', 'TACON-ICT', '2020-07-29 09:52:48', 1004, 2, 1, 0),
(5, '1234', 'Bic Pen', 'Dozen', 12, 0, 50, 600, 'In good shape', 'Kabila Haile', 'Not approved yet', 'TACON-ICT', '2020-08-05 07:33:04', 1002, 2, 0, 0),
(6, '0012', 'Papers', 'Inch', 1, 0, 145.9, 145.9, 'In good shape', 'Silas Getachew', 'Jalene Mirgisa', 'TACON-PC', '2020-08-06 02:13:10', 1003, 6, 1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `heads`
--
ALTER TABLE `heads`
  ADD CONSTRAINT `heads_ibfk_1` FOREIGN KEY (`USERID`) REFERENCES `employee` (`USERID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
