DROP TABLE mod_company
DROP TABLE mod_job




--
-- Table structure for table `mod_company`
--

CREATE TABLE IF NOT EXISTS `mod_company` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(50) NOT NULL,
  `company_intro` text,
  `company_intro_pic` varchar(255) DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mod_drop_resume`
--

CREATE TABLE IF NOT EXISTS `mod_drop_resume` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `account` varchar(20) NOT NULL,
  `job_id` bigint(20) NOT NULL,
  `drop_date` datetime NOT NULL,
  `process_type` int(2) NOT NULL,
  `note` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mod_job`
--

CREATE TABLE IF NOT EXISTS `mod_job` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `job_address` varchar(200) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `salary_hour` int(10) DEFAULT NULL,
  `salary_week` int(10) DEFAULT NULL,
  `salary_month` int(10) DEFAULT NULL,
  `job_stert_date` date DEFAULT NULL,
  `job_end_date` date DEFAULT NULL,
  `job_desc` text,
  `job_status` int(2) NOT NULL,
  `job_term` varchar(255) DEFAULT NULL,
  `job_intro` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;


ALTER TABLE  `mod_job` CHANGE  `job_term`  `job_term` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
CHANGE  `job_intro`  `job_intro` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL

ALTER TABLE  `mod_drop_resume` CHANGE  `account`  `account` VARCHAR( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL

ALTER TABLE  `mod_drop_resume` CHANGE  `account`  `account` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL

ALTER TABLE  `mod_drop_resume` CHANGE  `note`  `note` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL