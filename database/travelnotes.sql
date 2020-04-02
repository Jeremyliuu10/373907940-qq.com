-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2011 at 03:56 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY  (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(3, 'HTML & Web design'),
(5, 'Programming');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `store_name` varchar(45) NOT NULL,
  `store_address` varchar(150) NOT NULL,
  `tel_no` varchar(8) NOT NULL,
  `fax_no` varchar(8) NOT NULL,
  `email` varchar(45) NOT NULL,
  `store_loc_x` double NOT NULL,
  `store_loc_y` double NOT NULL,
  `mtr_loc_x` double NOT NULL,
  `mtr_loc_y` double NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `store_name`, `store_address`, `tel_no`, `fax_no`, `email`, `store_loc_x`, `store_loc_y`, `mtr_loc_x`, `mtr_loc_y`) VALUES
(1, 'ZF Bookstore MK', 'Shop 05, 4/F, Langham Place Shopping Mall, 8 Argyle Street Mong Kok', '23232323', '24242424', 'mk@zf-bookstore.com', 22.317733, 114.168816, 22.318319, 114.169363),
(2, 'ZF Bookstore TST', 'Shop G, 2/F, Star Computer City, Star House, TST, Hong Kong', '25252525', '26262626', 'tst@zf-bookstore.com', 22.294685, 114.169449, 22.295628, 114.172164),
(3, 'ZF Bookstore CB', 'Shop 1009, 10/F, Windsor House, 331 Gloucester Road, Causeway Bay, Hong Kong', '27272727', '28282828', 'cb@zf-bookstore.com', 22.280648, 114.186401, 22.28028, 114.185022);

-- --------------------------------------------------------

--
-- Table structure for table `googlekeys`
--

CREATE TABLE IF NOT EXISTS `googlekeys` (
  `key_id` int(11) NOT NULL auto_increment,
  `key_value` varchar(255) NOT NULL,
  `key_status` varchar(1) NOT NULL,
  PRIMARY KEY  (`key_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `googlekeys`
--

INSERT INTO `googlekeys` (`key_id`, `key_value`, `key_status`) VALUES
(1, 'ABQIAAAAQgfz6A9ItGmXyuAmLIIr5hSbiI8Q8SJp_rjpYZBvjY-HFYAkVhQU3kQtFy_kYXvWVIxKR9ZYfBfHkw', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `travels` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `city` varchar(100) default NULL,
  `description` text,
  `image_url` varchar(100) default NULL,
  `notes` text,
  `is_recommended` tinyint(4) default '0',
  `rating` int(11) default '0',
  `rating_count` int(11) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `books`
--

INSERT INTO `travels` (`id`, `name`, `city`, `description`, `image_url`, `notes`, `is_recommended`, `rating`, `rating_count`) VALUES
(1, 'Penny', 'Hong Kong','Hong Kong is full of handsome guys','images/travelnotes/01.png','Fantanstic places for tavelling',0,0,0),
(2, 'XiaoXiao','Shen Zhen','N-fly will be there','images/travelnotes/02.png','I just love next-fly so much',0,0,0);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `member_id` int(11) NOT NULL auto_increment,
  `member_login` varchar(20) NOT NULL,
  `member_password` varchar(20) NOT NULL,
  `member_level` int(11) NOT NULL default '1',
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) default NULL,
  `birthday` date default NULL,
  `address` varchar(50) default NULL,
  `notes` text,
  PRIMARY KEY  (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `member_login`, `member_password`, `member_level`, `first_name`, `last_name`, `email`, `phone`, `birthday`, `address`, `notes`) VALUES
(1, 'admin', 'admin', 2, 'Administrator', 'Account', 'admin@localhost', NULL, '1980-10-10', NULL, NULL),
(2, 'guest', 'guest', 1, 'Guest', 'Account', 'guest@localhost', NULL, '1980-10-21', NULL, NULL),
(6, 'steven', 'steven', 1, 'steven', 'steven', 'cibsteven@gmail.com', 'steven', '1977-10-21', 'steven', NULL),
(21, 'aaa', 'aaa', 1, 'aaa', 'aaa', 'aaa@gmail.com', 'aaa', '2001-10-10', 'aaa', NULL);



-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE IF NOT EXISTS `stores` (
  `store_id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `tel` varchar(45) NOT NULL,
  `fax` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `MTRstation` varchar(100) NOT NULL,
  `MTR_Lat` double NOT NULL,
  `MTR_Lon` double NOT NULL,
  `Lat` double NOT NULL,
  `Lon` double NOT NULL,
  `ImagePath` varchar(100) NOT NULL,
  PRIMARY KEY  (`store_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`store_id`, `name`, `address`, `tel`, `fax`, `email`, `MTRstation`, `MTR_Lat`, `MTR_Lon`, `Lat`, `Lon`, `ImagePath`) VALUES
(1, 'ZF Bookstore TST', 'Shop G, 2/F, Star Computer City, Star House, TST, Hong Kong', '25252525', '26262626', 'tst@zf-bookstore.com', 'Tsim Sha Tsui MTR Exit F', 22.295628, 114.172164, 22.294685, 114.169449, 'images/contact/bookazine.jpg'),
(2, 'ZF Bookstore CB', 'Shop 1009, 10/F, Windsor House, 331 Gloucester Road, Causeway Bay', '27272727', '28282828', 'cb@zf-bookstore.com', 'Causeway Bay MTR Exit E ', 22.28028, 114.185022, 22.280648, 114.186401, 'images/contact/commercial.jpg'),
(3, 'ZF Bookstore MK', 'Shop 05, 4/F, Langham Place Shopping Mall, 8 Argyle Street Mong Kok', '23232323', '24242424', 'mk@zf-bookstore.com', 'Mong Kok MTR Exit E1', 22.318319, 114.169363, 22.317733, 114.168816, 'images/contact/dymocks.jpg');


ALTER TABLE travels ADD column created_at TIMESTAMP;
ALTER TABLE travels add column updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL; ALTER TABLE travels CHANGE category_id category_id INT(11) NULL DEFAULT NULL;