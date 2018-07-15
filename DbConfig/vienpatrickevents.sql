-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2016 at 01:08 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vienpatrickevents`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` varchar(100) NOT NULL,
  `date_registered` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `username`, `password`, `role`, `date_registered`) VALUES
(1, 'Mojolagbe Jamiu Babatunde', 'mojolagbe@gmail.com', 'Babatunde', 'ae2b1fca515949e5d54fb22b8ed95575', 'Admin', '2015-08-20'),
(2, 'Administrator', 'info@vienpatrickevents.com', 'Admin', 'ae2b1fca515949e5d54fb22b8ed95575', 'Admin', '2015-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `date_time` varchar(300) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `description`, `location`, `image`, `date_time`, `status`, `date_added`) VALUES
(1, 'Website Launch', '<p><span style="color:rgb(92, 101, 102); font-family:open sans; font-size:14px">The website was redesigned by <a href="http://kaisteventures.com">Kaiste Ventures Limited.</a></span></p>\r\n', 'Ketu, Lagos, Nigeria', '574060_website_launch.jpg', '2016/03/25 20:00', 1, '2015-11-13 13:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(700) NOT NULL,
  `answer` text NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `question` (`question`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `date_added`) VALUES
(1, 'What happens if I am unable to attend a course and I have already paid?', 'Your payment will be withhold until you attend a course of the same amount.', '2016-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `name` varchar(200) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`name`, `value`) VALUES
('ABOUT_US', '<p><strong>WE ARE AN EVENT PLANNING AGENCY</strong></p>\r\n\r\n<p>As one of the leading event planning companies, we know that it&rsquo;s not &ldquo;one size fits all&rdquo;. Each event and client is unique and we believe our services should be as well. We know that it should be &ldquo;Can I hire a planner?&rdquo; not &ldquo;Can I afford one?&rdquo;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>As one of the leading event planning companies, we know that it&rsquo;s not &ldquo;one size fits all&rdquo;. Each event and client is unique and we believe our services should be as well. We know that it should be &ldquo;Can I hire a planner?&rdquo; not &ldquo;Can I afford one?&rdquo;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>As one of the leading event planning companies, we know that it&rsquo;s not &ldquo;one size fits all&rdquo;. Each event and client is unique and we believe our services should be as well. We know that it should be &ldquo;Can I hire a planner?&rdquo; not &ldquo;Can I afford one?&rdquo;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>As one of the leading event planning companies, we know that it&rsquo;s not &ldquo;one size fits all&rdquo;. Each event and client is unique and we believe our services should be as well. We know that it should be &ldquo;Can I hire a planner?&rdquo; not &ldquo;Can I afford one?&rdquo;.</p>\r\n'),
('ADDTHIS_SHARE_BUTTON', '<!-- Go to www.addthis.com/dashboard to customize your tools -->\r\n<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-56a5fbdb49cbb5db" async="async"></script>\r\n'),
('ANALYTICS', '<script></script>'),
('COMPANY_ADDRESS', '<p style="text-align: center;">Obgyn Close, Friends colony Estate, Agungi.</p>\r\n'),
('COMPANY_ADDRESS_GMAP', '<p>Agungi</p>\r\n'),
('COMPANY_EMAIL', '<p>info@vienpatrickevents.com</p>\r\n'),
('COMPANY_HOTLINE', '<p>2348182004118</p>\r\n'),
('COMPANY_NAME', '<p>Vien Patrick Events</p>\r\n'),
('COMPANY_NUMBERS', '<p>+234-1-7932390<br />\r\n+234 803-3876456</p>\r\n'),
('COMPANY_OPEN_HOURS', '<p style="text-align: center;">Monday &ndash; Friday<br />\r\n8.00 am &ndash; 5.00 pm<br />\r\nWeekend Closed</p>\r\n'),
('COMPANY_OTHER_EMAILS', '<p>evelynosemwota@yahoo.com</p>\r\n'),
('DISPLAY_HOMEPAGE_HELLO', '<p>False</p>\r\n'),
('FACEBOOK_ADMINS', '<p>0</p>\r\n'),
('FACEBOOK_APP_ID', '<p>0</p>\r\n'),
('FACEBOOK_LINK', '<p>https://www.facebook.com/vienpatrickevents</p>\r\n'),
('GOOGLEPLUS_LINK', '<p>https://www.plus.google.com/vienpatrickevents</p>\r\n'),
('LINKEDIN_LINK', '<p>https://www.linkedin.com/</p>\r\n'),
('TOTAL_DISPLAYABLE_TESTIMONIAL', '<p>20</p>\r\n'),
('TWITTER_ID', '<p>0</p>\r\n'),
('TWITTER_LINK', '<p>https://twitter.com/vienpatrickevents</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE IF NOT EXISTS `testimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `author` varchar(500) NOT NULL,
  `image` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `content`, `author`, `image`) VALUES
(4, 'My family and I are beyond happy to have them plan our wedding day.', 'Jessica Mann', '745337_1456907312.jpg'),
(5, 'Look no further! You are in the right place to plan your celebration.', 'Linda Movrizza', '468289_1456907349.jpg'),
(6, 'I invited these event planner to arrange a bachelor party for my best friend!', 'John Snow', '181024_1456907382.jpg'),
(7, 'Perfect decoration and perfect buffet for my little sister''s birthday party!', 'Jane Sanders', '861325_1456907412.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `email` varchar(200) NOT NULL,
  `company` text NOT NULL,
  `country` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `picture` text NOT NULL,
  `website` varchar(300) NOT NULL,
  `skype_id` varchar(200) NOT NULL,
  `yahoo_id` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(500) NOT NULL,
  `time_entered` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `facebook_id` varchar(300) NOT NULL,
  `twitter_id` varchar(400) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `company`, `country`, `description`, `picture`, `website`, `skype_id`, `yahoo_id`, `phone`, `address`, `username`, `password`, `time_entered`, `status`, `facebook_id`, `twitter_id`) VALUES
(1, 'Kaiste Ventures Limited', 'info@kaisteventures.com', '', '', '', '', '', '', '', '', '', '', '', '1453378931', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `webpage`
--

CREATE TABLE IF NOT EXISTS `webpage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` varchar(700) NOT NULL,
  `keywords` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `webpage`
--

INSERT INTO `webpage` (`id`, `name`, `title`, `description`, `keywords`) VALUES
(1, 'home', 'Home', 'We are a consulting and training firm / provider in Nigeria. We offer open programmes, bespoke and implant management training courses in Nigeria.', 'group, home'),
(2, 'contact', 'Contact Us', 'Contact us', 'contact, enquiries'),
(5, 'event-detail', 'Event Details', 'Event description', 'event, detail'),
(7, 'about', 'About Us', 'About Us', 'about, impact, consulting, management'),
(8, 'gallery', 'Our Events Gallery', 'Events gallery - photos and images', 'gallery, photo, image'),
(14, 'events', 'Events Archive', 'All organized events. ', 'event, archive'),
(21, 'event', 'Event Detail', 'Details of this event', 'event, detail'),
(22, 'services', 'Our Services', 'Our services', 'service');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
