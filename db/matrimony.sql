-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2023 at 11:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matrimony`
--

-- --------------------------------------------------------

--
-- Table structure for table `1bd_personal_physical`
--

CREATE TABLE `1bd_personal_physical` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `biodatagender` varchar(100) NOT NULL,
  `dateofbirth` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `physicalstatus` varchar(100) NOT NULL,
  `Skin_tones` varchar(100) NOT NULL,
  `bloodgroup` varchar(100) NOT NULL,
  `profilecreationdate` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `1bd_personal_physical`
--

INSERT INTO `1bd_personal_physical` (`id`, `user_id`, `biodatagender`, `dateofbirth`, `height`, `weight`, `physicalstatus`, `Skin_tones`, `bloodgroup`, `profilecreationdate`) VALUES
(98, 230, 'পাত্রের বায়োডাটা', '১০-সেপ্টেম্বর-২০০৬', '6', '10', 'সমস্যা নেই', 'ফর্সা', 'AB+', '31 May 2023, 12:49:59 AM'),
(99, 81, 'পাত্রের বায়োডাটা', '১৩-নভেম্বর-২০০৫', '98', '63', 'সমস্যা নেই', 'ফর্সা', 'B+', '2 June 2023, 01:24:44 AM'),
(100, 244, 'পাত্রের বায়োডাটা', '১০-অক্টোবর-২০০৩', '2', '51', 'সমস্যা নেই', 'শ্যামবর্ণ', 'AB+', '2 June 2023, 01:39:41 AM'),
(101, 139, 'পাত্রের বায়োডাটা', '০৬-জুন-১৯৯৭', '8ft', '405kg', 'হাত কাটা', 'উজ্জ্বল ফর্সা', 'O+', '2 June 2023, 06:25:23 PM');

-- --------------------------------------------------------

--
-- Table structure for table `2bd_personal_lifestyle`
--

CREATE TABLE `2bd_personal_lifestyle` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `smoke` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation_sector` varchar(100) NOT NULL,
  `other_occupation_sector` varchar(250) NOT NULL,
  `business_occupation_level` varchar(250) NOT NULL,
  `student_occupation_level` varchar(100) NOT NULL,
  `health_occupation_level` varchar(100) NOT NULL,
  `engineer_occupation_level` varchar(100) NOT NULL,
  `teacher_occupation_level` varchar(100) NOT NULL,
  `defense_occupation_level` varchar(100) NOT NULL,
  `foreigner_occupation_level` varchar(100) NOT NULL,
  `garments_occupation_level` varchar(100) NOT NULL,
  `driver_occupation_level` varchar(100) NOT NULL,
  `service_andcommon_occupation_level` varchar(100) NOT NULL,
  `mistri_occupation_level` varchar(100) NOT NULL,
  `occupation_describe` varchar(2000) NOT NULL,
  `dress_code` varchar(500) NOT NULL,
  `aboutme` varchar(2000) NOT NULL,
  `grrom_bride_email` varchar(100) NOT NULL,
  `grrom_bride_number` varchar(100) NOT NULL,
  `grrom_bride_family_number` varchar(100) NOT NULL,
  `family_number_relation` varchar(100) NOT NULL,
  `profilecreationdate` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `2bd_personal_lifestyle`
--

INSERT INTO `2bd_personal_lifestyle` (`id`, `user_id`, `smoke`, `occupation_sector`, `other_occupation_sector`, `business_occupation_level`, `student_occupation_level`, `health_occupation_level`, `engineer_occupation_level`, `teacher_occupation_level`, `defense_occupation_level`, `foreigner_occupation_level`, `garments_occupation_level`, `driver_occupation_level`, `service_andcommon_occupation_level`, `mistri_occupation_level`, `occupation_describe`, `dress_code`, `aboutme`, `grrom_bride_email`, `grrom_bride_number`, `grrom_bride_family_number`, `family_number_relation`, `profilecreationdate`) VALUES
(111, 230, 'না', 'Engineer', '', '', '', '', 'রোবোটিক্স ইঞ্জিনিয়ার', '', '', '', '', '', '', '', 'robotics engr', 'normal dress', 'loyal', '', '', '', '', '31 May 2023, 12:49:59 AM'),
(112, 71, 'না', 'Student', '', '', 'বি.এসসি. ইঞ্জিনিয়ারিং শিক্ষার্থী', '', '', '', '', '', '', '', '', '', 'i am a students', 'normal dress', 'loyal', '', '', '', '', '1 June 2023, 03:53:37 PM'),
(113, 140, 'না', 'Student', '', '', 'বি.এসসি. ইঞ্জিনিয়ারিং শিক্ষার্থী', '', '', '', '', '', '', '', '', '', 'students of BSc', 'Normal', 'Loyal', '', '', '', '', '1 June 2023, 11:24:39 PM'),
(114, 16, 'না', 'Student', '', '', 'আলিয়া মাদ্রাসার ফাজিল শিক্ষার্থী', '', '', '', '', '', '', '', '', '', 'Overall, this code seems to be a form for capturing biodata information, ', 'Overall, this code seems to be a form for capturing biodata information, ', 'Overall, this code seems to be a form for capturing biodata information, ', '', '', '', '', '2 June 2023, 12:31:39 AM'),
(115, 235, 'না', 'Engineer', '', '', '', '', 'ইলেকট্রিক্যাল ইঞ্জিনিয়ার', '', '', '', '', '', '', '', 'Depending on the selected', 'Depending on the selected', 'Depending on the selected', '', '', '', '', '2 June 2023, 01:13:15 AM'),
(116, 81, 'না', 'Teacher', '', '', '', '', '', 'কওমি মাদ্রাসার শিক্ষক', '', '', '', '', '', '', 'Welcome to ShosurBari', 'Welcome to ShosurBari', 'Welcome to ShosurBari', '', '', '', '', '2 June 2023, 01:24:44 AM'),
(117, 244, 'না', 'Engineer', '', '', '', '', 'এগ্রিকালচার ইঞ্জিনিয়ার', '', '', '', '', '', '', '', 'fgfvv ghghg jhhgjhghg  hhg', 'fgfvv ghghg jhhgjhghg  hhg', 'fgfvv ghghg jhhgjhghg  hhg', '', '', '', '', '2 June 2023, 01:39:41 AM'),
(118, 139, 'না', 'Defense', '', '', '', '', 'নেটওয়ার্ক ইঞ্জিনিয়ার', '', 'বিমানবাহিনী', '', '', '', '', '', '5th update pehsa', '5th update ghor & bahire', '5th update about', '', '', '', '', '2 June 2023, 11:36:49 PM');

-- --------------------------------------------------------

--
-- Table structure for table `3bd_higher_secondaryedu_method`
--

CREATE TABLE `3bd_higher_secondaryedu_method` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `higher_secondary_edu_method` varchar(250) NOT NULL,
  `gnrlmdrs_hrsecondary_pass` varchar(250) NOT NULL,
  `gnrlmdrs_hrsecondary_pass_year` varchar(250) NOT NULL,
  `gnrlmdrs_hrsecondary_exam_year` varchar(250) NOT NULL,
  `gnrlmdrs_hrsecondary_group` varchar(250) NOT NULL,
  `gnrlmdrs_hrsecondary_rningstd` varchar(250) NOT NULL,
  `diploma_hrsecondary_pass` varchar(250) NOT NULL,
  `diploma_hrsecondary_pass_year` varchar(250) NOT NULL,
  `diploma_hrsecondary_sub` varchar(250) NOT NULL,
  `diploma_hrsecondary_endingyear` varchar(250) NOT NULL,
  `profilecreationdate` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `3bd_higher_secondaryedu_method`
--

INSERT INTO `3bd_higher_secondaryedu_method` (`id`, `user_id`, `higher_secondary_edu_method`, `gnrlmdrs_hrsecondary_pass`, `gnrlmdrs_hrsecondary_pass_year`, `gnrlmdrs_hrsecondary_exam_year`, `gnrlmdrs_hrsecondary_group`, `gnrlmdrs_hrsecondary_rningstd`, `diploma_hrsecondary_pass`, `diploma_hrsecondary_pass_year`, `diploma_hrsecondary_sub`, `diploma_hrsecondary_endingyear`, `profilecreationdate`) VALUES
(2, 230, 'জেনারেল', 'হ্যাঁ', '২০১৮', '', 'বিজ্ঞান', '', '', '', '', '', '31 May 2023, 12:49:59 AM'),
(3, 71, 'জেনারেল', 'হ্যাঁ', '২০১৮', '', 'বিজ্ঞান', '', '', '', '', '', '1 June 2023, 03:53:37 PM'),
(4, 140, 'জেনারেল', 'হ্যাঁ', '২০১৩', '', 'বিজ্ঞান', '', '', '', '', '', '1 June 2023, 11:24:39 PM'),
(5, 16, 'জেনারেল', 'হ্যাঁ', '২০১২', '', 'ব্যবসা ও বাণিজ্য শাখা', '', '', '', '', '', '2 June 2023, 12:31:39 AM'),
(6, 235, 'জেনারেল', 'হ্যাঁ', '২০১৮', '', 'বিজ্ঞান', '', '', '', '', '', '2 June 2023, 01:13:15 AM'),
(7, 81, 'জেনারেল', 'হ্যাঁ', '২০১৮', '', 'মানবিক শাখা', '', '', '', '', '', '2 June 2023, 01:24:45 AM'),
(8, 139, 'জেনারেল', 'হ্যাঁ', '২০১৪', '', 'মানবিক শাখা', '', '', '', '', '', '2 June 2023, 02:05:03 AM');

-- --------------------------------------------------------

--
-- Table structure for table `3bd_kowmi_madrasaedu_method`
--

CREATE TABLE `3bd_kowmi_madrasaedu_method` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `qawmi_madrasa_hafez` varchar(250) NOT NULL,
  `qawmimadrasa_dawrapass` varchar(250) NOT NULL,
  `kowmi_dawrapas_year` varchar(250) NOT NULL,
  `kowmi_current_edu_level` varchar(250) NOT NULL,
  `profilecreationdate` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `3bd_kowmi_madrasaedu_method`
--

INSERT INTO `3bd_kowmi_madrasaedu_method` (`id`, `user_id`, `qawmi_madrasa_hafez`, `qawmimadrasa_dawrapass`, `kowmi_dawrapas_year`, `kowmi_current_edu_level`, `profilecreationdate`) VALUES
(2, 230, '', '', '', '', '31 May 2023, 12:49:59 AM'),
(3, 71, '', '', '', '', '1 June 2023, 03:53:37 PM'),
(4, 140, '', '', '', '', '1 June 2023, 11:24:39 PM'),
(5, 16, '', '', '', '', '2 June 2023, 12:31:39 AM'),
(6, 235, '', '', '', '', '2 June 2023, 01:13:15 AM'),
(7, 81, '', '', '', '', '2 June 2023, 01:24:44 AM'),
(8, 244, '', '', '', '', '2 June 2023, 01:39:41 AM'),
(9, 139, '', '', '', '', '2 June 2023, 02:05:03 AM');

-- --------------------------------------------------------

--
-- Table structure for table `3bd_secondaryedu_method`
--

CREATE TABLE `3bd_secondaryedu_method` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `scndry_edu_method` varchar(250) NOT NULL,
  `maxedu_qulfctn` varchar(250) NOT NULL,
  `gnrl_mdrs_secondary_pass` varchar(250) NOT NULL,
  `gnrl_mdrs_secondary_pass_year` varchar(250) NOT NULL,
  `gnrl_mdrs_secondary_end_year` varchar(250) NOT NULL,
  `gnrlmdrs_secondary_running_std` varchar(250) NOT NULL,
  `profilecreationdate` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `3bd_secondaryedu_method`
--

INSERT INTO `3bd_secondaryedu_method` (`id`, `user_id`, `scndry_edu_method`, `maxedu_qulfctn`, `gnrl_mdrs_secondary_pass`, `gnrl_mdrs_secondary_pass_year`, `gnrl_mdrs_secondary_end_year`, `gnrlmdrs_secondary_running_std`, `profilecreationdate`) VALUES
(2, 230, 'জেনারেল', '', 'হ্যাঁ', '২০১৫', '', '', '31 May 2023, 12:49:59 AM'),
(3, 71, 'জেনারেল', '', 'হ্যাঁ', '২০১৫', '', '', '1 June 2023, 03:53:37 PM'),
(4, 140, 'জেনারেল', '', 'হ্যাঁ', '২০১১', '', '', '1 June 2023, 11:24:39 PM'),
(5, 16, 'জেনারেল', '', 'হ্যাঁ', '২০১০', '', '', '2 June 2023, 12:31:39 AM'),
(6, 235, 'জেনারেল', '', 'হ্যাঁ', '২০১৫', '', '', '2 June 2023, 01:13:15 AM'),
(7, 81, 'জেনারেল', '', 'হ্যাঁ', '২০১৬', '', '', '2 June 2023, 01:24:44 AM'),
(8, 244, 'জেনারেল', '', 'হ্যাঁ', '২০১৫', '', '', '2 June 2023, 01:39:41 AM'),
(9, 139, 'জেনারেল', '', 'হ্যাঁ', '২০১২', '', '', '2 June 2023, 02:05:03 AM');

-- --------------------------------------------------------

--
-- Table structure for table `3bd_universityedu_method`
--

CREATE TABLE `3bd_universityedu_method` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `scndry_edu_method` varchar(250) NOT NULL,
  `higher_secondary_edu_method` varchar(250) NOT NULL,
  `varsity_edu_method` varchar(250) NOT NULL,
  `uvarsity_pass` varchar(250) NOT NULL,
  `varsity_passing_year` varchar(250) NOT NULL,
  `university_subject` varchar(250) NOT NULL,
  `varsity_ending_year` varchar(250) NOT NULL,
  `uvarsity_name` varchar(250) NOT NULL,
  `others_edu_qualification` varchar(500) NOT NULL,
  `profilecreationdate` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `3bd_universityedu_method`
--

INSERT INTO `3bd_universityedu_method` (`id`, `user_id`, `scndry_edu_method`, `higher_secondary_edu_method`, `varsity_edu_method`, `uvarsity_pass`, `varsity_passing_year`, `university_subject`, `varsity_ending_year`, `uvarsity_name`, `others_edu_qualification`, `profilecreationdate`) VALUES
(1, 139, 'জেনারেল', 'জেনারেল', 'জেনারেল', 'না, অধ্যায়নরত আছি', '', 'Software Engineer', '২০২৪', 'Daffodil Varsity', 'please solve with', '2 June 2023, 02:05:03 AM');

-- --------------------------------------------------------

--
-- Table structure for table `4bd_address_details`
--

CREATE TABLE `4bd_address_details` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `permanent_division` varchar(100) NOT NULL,
  `home_district_under_barishal` varchar(100) NOT NULL,
  `home_district_under_chattogram` varchar(100) NOT NULL,
  `home_district_under_dhaka` varchar(100) NOT NULL,
  `home_district_under_khulna` varchar(100) NOT NULL,
  `home_district_under_mymensingh` varchar(100) NOT NULL,
  `home_district_under_rajshahi` varchar(100) NOT NULL,
  `home_district_under_rangpur` varchar(100) NOT NULL,
  `home_district_under_sylhet` varchar(100) NOT NULL,
  `country_present_address` varchar(100) NOT NULL,
  `present_address_location` varchar(500) NOT NULL,
  `childhood` varchar(200) NOT NULL,
  `profilecreationdate` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `4bd_address_details`
--

INSERT INTO `4bd_address_details` (`id`, `user_id`, `permanent_division`, `home_district_under_barishal`, `home_district_under_chattogram`, `home_district_under_dhaka`, `home_district_under_khulna`, `home_district_under_mymensingh`, `home_district_under_rajshahi`, `home_district_under_rangpur`, `home_district_under_sylhet`, `country_present_address`, `present_address_location`, `childhood`, `profilecreationdate`) VALUES
(111, 230, 'রাজশাহী', '', '', '', '', '', 'নাটোর', '', '', 'Tajikistan', 'Mirpur', 'Natore', '31 May 2023, 12:49:59 AM'),
(112, 71, 'খুলনা', '', '', '', 'চুয়াডাঙ্গা', '', '', '', '', 'Bangladesh', 'Ashulia, Savar, Dhaka, Bangladesh', 'Natore', '1 June 2023, 03:53:37 PM'),
(113, 140, 'চট্টগ্রাম', '', 'নোয়াখালী', '', '', '', '', '', '', 'Mexico', 'Dhanmondi, Dhaka, Bangladesh', 'Dhaka boro hoyeci', '1 June 2023, 11:24:39 PM'),
(114, 16, 'বরিশাল', 'পটুয়াখালী', '', '', '', '', '', '', '', 'Kuwait', 'Ashulia', 'Natore', '2 June 2023, 12:31:39 AM'),
(115, 235, 'রংপুর', '', '', '', '', '', '', 'নীলফামারী', '', 'Qatar', 'Depending on the selected', 'Depending on the selected', '2 June 2023, 01:13:15 AM'),
(116, 81, 'সিলেট', '', '', '', '', '', '', '', 'সুনামগঞ্জ', 'Yemen', 'Welcome to ShosurBari', 'Welcome to ShosurBari', '2 June 2023, 01:24:45 AM'),
(117, 244, 'ময়মনসিংহ', '', '', '', '', 'নেত্রকোনা', '', '', '', 'Greece', 'fgfvv ghghg jhhgjhghg  hhg', 'fgfvv ghghg jhhgjhghg  hhg', '2 June 2023, 01:39:41 AM'),
(118, 139, 'চট্টগ্রাম', '', 'চট্টগ্রাম', '', '', '', '', '', '', 'Germany', 'please solve with', 'please solve with', '2 June 2023, 02:05:03 AM');

-- --------------------------------------------------------

--
-- Table structure for table `5bd_family_information`
--

CREATE TABLE `5bd_family_information` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `father_alive` varchar(200) NOT NULL,
  `fatheroccupation` varchar(200) NOT NULL,
  `mother_alive` varchar(200) NOT NULL,
  `motheroccupation` varchar(200) NOT NULL,
  `brosis_number` varchar(200) NOT NULL,
  `brosis_info` varchar(2000) NOT NULL,
  `uncle_profession` varchar(2000) NOT NULL,
  `family_class` varchar(100) NOT NULL,
  `financial_condition` varchar(2000) NOT NULL,
  `family_religious_condition` varchar(1000) NOT NULL,
  `profilecreationdate` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `5bd_family_information`
--

INSERT INTO `5bd_family_information` (`id`, `user_id`, `father_alive`, `fatheroccupation`, `mother_alive`, `motheroccupation`, `brosis_number`, `brosis_info`, `uncle_profession`, `family_class`, `financial_condition`, `family_religious_condition`, `profilecreationdate`) VALUES
(111, 230, 'yes', 'rtrd', 'yes', 'hswf', '2', 'dctr', 'tchr', 'উচ্চ শ্রেণী', 'mshal', 'valoi', '31 May 2023, 12:49:59 AM'),
(112, 71, 'Yes', 'Retired Army', 'Yes', 'House Wife', 'i have 1 brother, no sister', 'Brother are MBBS Doctor', 'They are Teachers', 'মধ্যম শ্রেণী', 'Alhamdulillah', 'MaShaAllah valoi', '1 June 2023, 03:53:37 PM'),
(113, 140, 'Jii', 'Obosor', 'Jii', 'Obosor', '1jon', 'doctor', 'sikkhok pesha', 'মধ্যম শ্রেণী', 'valoi ache', 'valoi ache samajik & dhormio obostha', '1 June 2023, 11:24:39 PM'),
(114, 16, 'yes', 'retired', 'yes', 'house wiife', 'i have 1 brother, no sister', 'Overall, this code seems to be a form for capturing biodata information, ', 'Overall, this code seems to be a form for capturing biodata information, ', 'নিম্নমধ্যম শ্রেণী', 'Overall, this code seems to be a form for capturing biodata information, ', 'Overall, this code seems to be a form for capturing biodata information, ', '2 June 2023, 12:31:39 AM'),
(115, 235, 'Depending on the selected', 'Depending on the selected', 'Depending on the selected', 'Depending on the selected', 'Depending on the selected', 'Depending on the selected', 'Depending on the selected', 'উচ্চ মধ্যম শ্রেণী', 'Depending on the selected', 'Depending on the selected', '2 June 2023, 01:13:15 AM'),
(116, 81, 'Welcome to ShosurBari', 'Welcome to ShosurBari', 'Welcome to ShosurBari', 'Welcome to ShosurBari', 'Welcome to ShosurBari', 'Welcome to ShosurBari', 'Welcome to ShosurBari', 'নিম্নমধ্যম শ্রেণী', 'Welcome to ShosurBari', 'Welcome to ShosurBari', '2 June 2023, 01:24:45 AM'),
(117, 244, 'fgfvv ghghg jhhgjhghg  hhg', 'fgfvv ghghg jhhgjhghg  hhg', 'fgfvv ghghg jhhgjhghg  hhg', 'fgfvv ghghg jhhgjhghg  hhg', 'fgfvv ghghg jhhgjhghg  hhg', 'fgfvv ghghg jhhgjhghg  hhg', 'fgfvv ghghg jhhgjhghg  hhg', 'উচ্চ মধ্যম শ্রেণী', 'fgfvv ghghg jhhgjhghg  hhg', 'fgfvv ghghg jhhgjhghg  hhg', '2 June 2023, 01:39:41 AM'),
(118, 139, 'please solve with', 'please solve with', 'please solve with', 'please solve with', 'please solve with', 'please solve with', 'please solve with', 'উচ্চ শ্রেণী', 'please solve with', 'please solve with', '2 June 2023, 02:05:03 AM');

-- --------------------------------------------------------

--
-- Table structure for table `6bd_7bd_marital_status`
--

CREATE TABLE `6bd_7bd_marital_status` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `maritalstatus` varchar(100) NOT NULL,
  `divorce_reason` varchar(2000) NOT NULL,
  `how_widow` varchar(2000) NOT NULL,
  `how_widower` varchar(2000) NOT NULL,
  `how_many_son` varchar(50) NOT NULL,
  `son_details` varchar(1000) NOT NULL,
  `get_wife_permission` varchar(500) NOT NULL,
  `get_family_permission` varchar(500) NOT NULL,
  `why_again_married` varchar(2000) NOT NULL,
  `profilecreationdate` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `6bd_7bd_marital_status`
--

INSERT INTO `6bd_7bd_marital_status` (`id`, `user_id`, `maritalstatus`, `divorce_reason`, `how_widow`, `how_widower`, `how_many_son`, `son_details`, `get_wife_permission`, `get_family_permission`, `why_again_married`, `profilecreationdate`) VALUES
(25, 230, 'অবিবাহিত', '', '', '', '', '', '', '', '', '31 May 2023, 12:49:59 AM'),
(26, 71, 'ডিভোর্স', 'Something wrong', '', '', '', '', '', '', '', '1 June 2023, 03:53:37 PM'),
(27, 16, 'ডিভোর্স', 'Overall, this code seems to be a form for capturing biodata information, ', '', '', '৪টি সন্তান', 'Overall, this code seems to be a form for capturing biodata information, ', '', '', '', '2 June 2023, 12:31:39 AM'),
(28, 235, 'বিপত্নীক', '', '', 'Depending on the selected', '৭টি সন্তান', 'Depending on the selected', '', '', '', '2 June 2023, 01:13:15 AM'),
(29, 81, 'অবিবাহিত', '', '', '', '', '', '', '', '', '2 June 2023, 01:24:45 AM'),
(30, 244, 'বিধবা', '', 'fgfvv ghghg jhhgjhghg  hhg', '', '৯টি সন্তান', 'fgfvv ghghg jhhgjhghg  hhg', '', '', '', '2 June 2023, 01:39:41 AM'),
(31, 139, 'বিবাহিত', '', '', '', '৮টি সন্তান', 'stdnt', 'hoo', 'niyeci ', 'emni', '2 June 2023, 06:25:23 PM');

-- --------------------------------------------------------

--
-- Table structure for table `6bd_marriage_related_qs_male`
--

CREATE TABLE `6bd_marriage_related_qs_male` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `guardians_agree` varchar(500) NOT NULL,
  `allowstudy_aftermarriage` varchar(1000) NOT NULL,
  `allowjob_aftermarriage` varchar(1000) NOT NULL,
  `livewife_aftermarriage` varchar(2000) NOT NULL,
  `profileby` varchar(100) NOT NULL,
  `profilecreationdate` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `6bd_marriage_related_qs_male`
--

INSERT INTO `6bd_marriage_related_qs_male` (`id`, `user_id`, `guardians_agree`, `allowstudy_aftermarriage`, `allowjob_aftermarriage`, `livewife_aftermarriage`, `profileby`, `profilecreationdate`) VALUES
(111, 230, 'yes', 'yes', 'yes', 'barite', 'নিজের জন্য', '31 May 2023, 12:49:59 AM'),
(112, 71, 'Yes', '', '', '', 'নিজের জন্য', '1 June 2023, 03:53:37 PM'),
(113, 140, 'ha onumoti niyechi', '', '', '', 'নিজের জন্য', '1 June 2023, 11:24:39 PM'),
(114, 16, 'jj', '', '', '', 'নিজের জন্য', '2 June 2023, 12:31:39 AM'),
(115, 235, 'Depending on the selected', '', '', '', 'ভাই হই', '2 June 2023, 01:13:15 AM'),
(116, 81, 'Welcome to ShosurBari', '', '', '', 'নিজের জন্য', '2 June 2023, 01:24:45 AM'),
(117, 244, 'fgfvv ghghg jhhgjhghg  hhg', '', '', '', 'নিজের জন্য', '2 June 2023, 01:39:41 AM'),
(118, 139, '', 'maybe', 'na', 'barite', 'চাচা/মামা হই', '2 June 2023, 06:25:23 PM');

-- --------------------------------------------------------

--
-- Table structure for table `7bd_marriage_related_qs_female`
--

CREATE TABLE `7bd_marriage_related_qs_female` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `guardians_agree` varchar(500) NOT NULL,
  `anyjob_aftermarriage` varchar(1000) NOT NULL,
  `studies_aftermarriage` varchar(2000) NOT NULL,
  `agree_marriage_student` varchar(1000) NOT NULL,
  `profileby` varchar(100) NOT NULL,
  `profilecreationdate` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `7bd_marriage_related_qs_female`
--

INSERT INTO `7bd_marriage_related_qs_female` (`id`, `user_id`, `guardians_agree`, `anyjob_aftermarriage`, `studies_aftermarriage`, `agree_marriage_student`, `profileby`, `profilecreationdate`) VALUES
(113, 230, 'yes', '', '', '', 'নিজের জন্য', '31 May 2023, 12:49:59 AM'),
(114, 71, 'Yes', 'No', 'Maybe', 'Not Sure, but just accept be B.Sc Students', 'নিজের জন্য', '1 June 2023, 03:53:37 PM'),
(115, 140, 'ha onumoti niyechi', 'hoo', 'hoo korte cay', 'hoo raji aci', 'নিজের জন্য', '1 June 2023, 11:24:39 PM'),
(116, 16, 'jj', 'No', 'Yes', 'yes', 'নিজের জন্য', '2 June 2023, 12:31:39 AM'),
(117, 235, 'Depending on the selected', 'Depending on the selected', 'Depending on the selected', 'Depending on the selected', 'ভাই হই', '2 June 2023, 01:13:15 AM'),
(118, 81, 'Welcome to ShosurBari', 'Welcome to ShosurBari', 'Welcome to ShosurBari', 'Welcome to ShosurBari', 'নিজের জন্য', '2 June 2023, 01:24:45 AM'),
(119, 244, 'fgfvv ghghg jhhgjhghg  hhg', 'fgfvv ghghg jhhgjhghg  hhg', 'fgfvv ghghg jhhgjhghg  hhg', 'fgfvv ghghg jhhgjhghg  hhg', 'নিজের জন্য', '2 June 2023, 01:39:41 AM'),
(120, 139, '', 'please solve with', 'please solve with', 'please solve with', 'চাচা/মামা হই', '2 June 2023, 06:25:23 PM');

-- --------------------------------------------------------

--
-- Table structure for table `8bd_religion_details`
--

CREATE TABLE `8bd_religion_details` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `yourreligion_condition` varchar(2000) NOT NULL,
  `profilecreationdate` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `8bd_religion_details`
--

INSERT INTO `8bd_religion_details` (`id`, `user_id`, `religion`, `yourreligion_condition`, `profilecreationdate`) VALUES
(117, 230, 'ইসলাম ধর্ম', 'mdm', '31 May 2023, 12:49:59 AM'),
(118, 71, 'ইসলাম ধর্ম', 'valoi ache, Ma Sha Allah', '1 June 2023, 03:53:37 PM'),
(119, 140, 'ইসলাম ধর্ম', 'valoi ache ', '1 June 2023, 11:24:39 PM'),
(120, 16, 'ইসলাম ধর্ম', 'Overall, this code seems to be a form for capturing biodata information, ', '2 June 2023, 12:31:39 AM'),
(121, 235, 'ইসলাম ধর্ম', 'Depending on the selected', '2 June 2023, 01:13:15 AM'),
(122, 81, 'ইসলাম ধর্ম', 'Welcome to ShosurBari', '2 June 2023, 01:24:45 AM'),
(123, 244, 'ইসলাম ধর্ম', 'fgfvv ghghg jhhgjhghg  hhg', '2 June 2023, 01:39:41 AM'),
(124, 139, 'অন্যান্য', 'please solve with', '2 June 2023, 02:05:03 AM');

-- --------------------------------------------------------

--
-- Table structure for table `9bd_expected_life_partner`
--

CREATE TABLE `9bd_expected_life_partner` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `partner_religius` varchar(1000) NOT NULL,
  `partner_district` varchar(500) NOT NULL,
  `partner_maritialstatus` varchar(500) NOT NULL,
  `partner_age` varchar(500) NOT NULL,
  `partner_skintones` varchar(500) NOT NULL,
  `partner_height` varchar(500) NOT NULL,
  `partner_education` varchar(500) NOT NULL,
  `partner_profession` varchar(1000) NOT NULL,
  `partner_financial` varchar(500) NOT NULL,
  `partner_attributes` varchar(2000) NOT NULL,
  `profilecreationdate` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `9bd_expected_life_partner`
--

INSERT INTO `9bd_expected_life_partner` (`id`, `user_id`, `partner_religius`, `partner_district`, `partner_maritialstatus`, `partner_age`, `partner_skintones`, `partner_height`, `partner_education`, `partner_profession`, `partner_financial`, `partner_attributes`, `profilecreationdate`) VALUES
(111, 230, 'mdm', 'ntr', 'nmrd', 'any', 'fr', '987', 'sh', 'engr', 'mdm', 'lyl', '2023-05-31'),
(112, 71, 'Sunnah motabek hote hobe.', 'Rajshahi, Dhaka, Khulna, Sylhet, Natore', 'Unmarried', '18 to 23', 'Fair', 'Minimum 5ft 3in', 'Minimum HSC', 'Students', 'No Applicable,', 'Must be loyal and respect and good characters need.', '2023-06-01'),
(113, 140, 'obossoy valo asha kori', 'jekono jelaa', 'jekono obostha', 'jekono boyos', 'jekono borno', '5ft er upore', 'jekono joggota', 'jekono pesha', 'jekono orthonoitik', 'obossoy loyal hote hobe', '2023-06-01'),
(114, 16, 'Muslim', 'Rajshahi & Dhaka Division', 'Unmarried', '16 to 23', 'Fair', 'Overall, this code seems to be a form for capturing biodata information, ', 'Overall, this code seems to be a form for capturing biodata information, ', 'Overall, this code seems to be a form for capturing biodata information, ', 'Overall, this code seems to be a form for capturing biodata information, ', 'Overall, this code seems to be a form for capturing biodata information, ', '2023-06-02'),
(115, 235, 'Depending on the selected', 'Depending on the selected', 'Depending on the selected', 'Depending on the selected', 'Depending on the selected', 'Depending on the selected', 'Depending on the selected', 'Depending on the selected', 'Depending on the selected', 'Depending on the selected', '2023-06-02'),
(116, 81, 'Welcome to ShosurBari', 'Welcome to ShosurBari', 'Welcome to ShosurBari', 'Welcome to ShosurBari', 'Welcome to ShosurBari', 'Welcome to ShosurBari', 'Welcome to ShosurBari', 'Welcome to ShosurBari', 'Welcome to ShosurBari', 'Welcome to ShosurBari', '2023-06-02'),
(117, 244, 'fgfvv ghghg jhhgjhghg  hhg', 'fgfvv ghghg jhhgjhghg  hhg', 'fgfvv ghghg jhhgjhghg  hhg', 'fgfvv ghghg jhhgjhghg  hhg', 'fgfvv ghghg jhhgjhghg  hhg', 'fgfvv ghghg jhhgjhghg  hhg', 'fgfvv ghghg jhhgjhghg  hhg', 'fgfvv ghghg jhhgjhghg  hhg', 'fgfvv ghghg jhhgjhghg  hhg', 'fgfvv ghghg jhhgjhghg  hhg', '2023-06-02'),
(118, 139, 'please solve with', 'please solve with', 'please solve with', 'please solve with', 'please solve with', 'please solve with', 'please solve with', 'please solve with', 'please solve with', 'please solve with', '2023-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(8) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name_contactus` varchar(100) NOT NULL,
  `number_contactus` int(20) NOT NULL,
  `email_contactus` varchar(100) NOT NULL,
  `message_contactus` varchar(1000) NOT NULL,
  `message_sendingdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `user_id`, `name_contactus`, `number_contactus`, `email_contactus`, `message_contactus`, `message_sendingdate`) VALUES
(1, 0, 'nafi', 0, 'nafiz@gmail.com', 'happy eid', '2023-04-04'),
(2, 0, 'nafis', 0, 'nafis@hotmail.com', 'hey nafis, check the user id and new id.', '2023-04-04'),
(3, 0, 'nahid', 0, 'nahid@gmail.com', 'hey nahid', '2023-04-04'),
(4, 0, 'noyon', 9090909, 'noyon@yahoo.com', 'hey noyon', '2023-04-04'),
(5, 0, 'roman', 292, '', 'hey roman , without email', '2023-04-05'),
(12, 0, 'nafi', 2147483647, 'nafiz@gmail.com', 'mb', '2023-04-25'),
(13, 0, 'nafi', 2147483647, 'nafiz@gmail.com', 'oky', '2023-04-25'),
(14, 0, 'nafi', 2147483647, 'noyon@yahoo.com', 'mnbh', '2023-04-25'),
(15, 0, 'nayem', 2147483647, 'nafiz@gmail.com', 'ok', '2023-04-25'),
(16, 0, 'nafi', 0, 'noyon@yahoo.com', '000ooookkkmmm', '2023-04-25'),
(17, 0, '', 0, '', '', '2023-04-25'),
(18, 0, 'noyon', 2147483647, 'noyon1@gmail.com', 'kjndkj ndsjd njjuj', '2023-04-25'),
(19, 0, 'AD RHM', 987654599, 'abrrhmn@gmail.com', 'okay vatija', '2023-04-26'),
(20, 0, 'nafizul', 2147483647, 'nafizulislam.swe@gmail.com', 'hey, checking', '2023-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_number` varchar(25) NOT NULL,
  `cust_permanent_address` varchar(100) NOT NULL,
  `request_biodata_number` varchar(100) NOT NULL,
  `biodata_quantities` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `bkash_number` varchar(100) NOT NULL,
  `bkash_transaction_id` varchar(100) NOT NULL,
  `nagad_number` varchar(100) NOT NULL,
  `nagad_transaction_id` varchar(100) NOT NULL,
  `roket_number` varchar(100) NOT NULL,
  `roket_transaction_id` varchar(100) NOT NULL,
  `request_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `cust_name`, `cust_email`, `cust_number`, `cust_permanent_address`, `request_biodata_number`, `biodata_quantities`, `payment_method`, `bkash_number`, `bkash_transaction_id`, `nagad_number`, `nagad_transaction_id`, `roket_number`, `roket_transaction_id`, `request_date`) VALUES
(1, 'nafizul', 'nafizul480@gmail.com', '01737226404', 'Natore', '657', '2 Biodata', 'bkash', '01737226404', 'SA67TDVZV7YV', '', '', '', '', '2023-04-26'),
(2, 'Nafis', 'nafis@gmail.com', '018453443545', 'RAJ', '5432', '3 Biodata', 'roket', '', '', '', '', '0178768423', 'AT34KDSMNWE', '2023-04-26'),
(3, 'NOYON', 'Noyon@gmail.com', '010456658767', 'Khulna', '7689', '4 Biodata', 'nagad', '', '', '015390539093', 'NE85HTLAMX3', '', '', '2023-04-26'),
(4, 'Nafiz', 'nafiz@gmail.com', '013843877635', 'Dhaka', '5445', '5 Biodata', 'bkash', '01737 226404', 'ZIUY876547BCQ', '', '', '', '', '2023-04-26'),
(5, 'Nafiz', 'noyon@gmail.com', '0145679876', 'Rajshahi', '8764', '1 Biodata 70tk', 'bkash', '018765434', 'DE56544VCTYKL344', '', '', '', '', '2023-04-26'),
(6, 'Nayem', 'nayem@gmail.com', '09876543245', 'Rajshahi', '987,  7653, 46783, 4555', '4 Biodata 245tk', 'roket', '', '', '', '', '013034730914', 'H4HSTYKL382X', '2023-04-27'),
(7, 'Abdur Rahman', 'abdurrahman@gmail.com', '01332927237', 'Natore, Bonpara', '3748, 4873, 372, 398, 2822', '5 Biodata 295tk', 'nagad', '', '', '01923729829', '5HTKJ5L9ANDH', '', '', '2023-04-27'),
(8, 'nafizul', 'nafizul480@gmail.com', '6546565445345', 'Natore', '767454', '3 Biodata 190tk', 'nagad', '', '', '0176564535476', '3HGYRZ4HGUTS', '', '', '2023-04-27'),
(9, 'diu', 'jhddh@gmail.com', '0939299845', 'diu', '71', '3 Biodata 190tk', 'roket', '', '', '', '', '090830984', 'DJIHF6IJF', '2023-05-08'),
(10, 'nafizul islam', 'nafizul480@gmail.com', '01892882873778', 'Natore', '230', '5 Biodata 295tk', 'bkash', '01700000000', 'MSKSJE7HDJS', '', '', '', '', '2023-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(100) NOT NULL,
  `incoming_msg_user_id` int(100) NOT NULL,
  `outgoing_msg_user_id` int(100) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `msg_date` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_user_id`, `outgoing_msg_user_id`, `message`, `msg_date`) VALUES
(1, 0, 1, '', ''),
(2, 0, 1, '', ''),
(3, 0, 1, '', ''),
(4, 0, 1, '', ''),
(5, 0, 1, '', ''),
(6, 0, 1, '', ''),
(7, 0, 1, '', ''),
(8, 0, 1, '', ''),
(9, 0, 1, '', ''),
(10, 0, 1, '', ''),
(11, 0, 1, '', ''),
(12, 0, 1, '', ''),
(13, 0, 1, '', ''),
(14, 0, 1, '', ''),
(15, 0, 1, '', ''),
(16, 0, 1, '', ''),
(17, 0, 1, '', ''),
(18, 0, 1, '', ''),
(19, 0, 1, '', ''),
(20, 0, 1, '', ''),
(21, 0, 1, '', ''),
(22, 0, 1, '', ''),
(23, 0, 1, '', ''),
(24, 0, 1, '', ''),
(25, 0, 1, '', ''),
(26, 0, 1, '', ''),
(27, 0, 1, '', ''),
(28, 0, 1, '', ''),
(29, 0, 1, '', ''),
(30, 0, 1, '', ''),
(31, 0, 1, '', ''),
(32, 0, 1, '', ''),
(33, 0, 1, '', ''),
(34, 0, 1, '', ''),
(35, 0, 1, '', ''),
(36, 0, 1, '', ''),
(37, 0, 1, '', ''),
(38, 0, 1, '', ''),
(39, 0, 1, '', ''),
(40, 0, 1, '', ''),
(41, 0, 1, '', ''),
(42, 0, 1, '', ''),
(43, 0, 1, '', ''),
(44, 0, 1, '', ''),
(45, 0, 1, '', ''),
(46, 0, 1, '', ''),
(47, 0, 0, '', ''),
(48, 0, 0, '', ''),
(49, 0, 230, '', ''),
(50, 0, 0, '', ''),
(51, 0, 230, '', ''),
(52, 0, 230, '', ''),
(53, 0, 230, '', ''),
(54, 0, 230, '', ''),
(55, 0, 230, '', ''),
(56, 0, 230, '', ''),
(57, 230, 230, '', ''),
(58, 0, 230, '', ''),
(59, 0, 230, '', ''),
(60, 0, 230, '', ''),
(61, 0, 139, '', ''),
(62, 0, 139, '', ''),
(63, 230, 139, 'mm', ''),
(64, 230, 139, 'mm', ''),
(65, 230, 139, 'Alhamdulillah', ''),
(66, 244, 230, 'hey nafiz', ''),
(67, 139, 230, 'hi noyon', ''),
(68, 230, 230, 'my profile id , same id message', ''),
(69, 81, 230, 'SWE 30th', ''),
(70, 81, 230, 'Matiur Sir', ''),
(71, 81, 230, 'sent message disply show after click sent button.', ''),
(72, 0, 230, '', ''),
(73, 81, 230, 'try', ''),
(74, 81, 230, 'diu try show display', ''),
(75, 81, 230, 'try display', ''),
(76, 81, 230, 'hoo', ''),
(77, 0, 230, '', ''),
(78, 81, 230, 'অবিবাহিত', ''),
(79, 81, 230, 'try again', ''),
(80, 81, 230, '415 baje', ''),
(81, 0, 230, 'incom', ''),
(82, 0, 230, 'inco', ''),
(83, 244, 230, 'bbb', ''),
(84, 244, 230, 'hi', ''),
(85, 244, 230, 'ji', ''),
(86, 230, 139, 'okay', ''),
(87, 230, 139, 'ki', ''),
(88, 230, 139, 'message body', ''),
(89, 230, 139, 'kikorar', ''),
(90, 0, 139, '', ''),
(91, 230, 139, 'akhon ghumabao', ''),
(92, 244, 139, 'hy', ''),
(93, 244, 139, 'try date', '2 July 2023, 02:33:33 PM'),
(94, 244, 139, '', '2 July 2023, 02:43:11 PM'),
(95, 244, 139, 'textarea try', '2 July 2023, 02:43:53 PM'),
(96, 244, 139, '909 pm', '2 July 2023, 09:09:52 PM'),
(97, 139, 139, 'without form ', '2 July 2023, 10:36:50 PM'),
(98, 244, 139, 'without from sections', '2 July 2023, 10:37:30 PM'),
(99, 244, 139, 'design sent button test.', '2 July 2023, 10:43:34 PM'),
(100, 244, 139, 'yes, perfectly work, Alhamdulillah\n', '2 July 2023, 10:44:23 PM'),
(101, 244, 139, 'hi, nafizul, display message show', '2 July 2023, 10:55:07 PM'),
(102, 244, 139, 'hi', '2 July 2023, 10:57:02 PM'),
(103, 244, 139, 'noo', '2 July 2023, 10:58:41 PM'),
(104, 244, 139, 'noo', '2 July 2023, 10:58:41 PM'),
(105, 81, 139, 'hi, noyon', '2 July 2023, 11:04:03 PM'),
(106, 81, 139, 'hy hujur', '2 July 2023, 11:40:29 PM'),
(107, 81, 139, 'hujur', '2023-07-02 23:59:30'),
(108, 0, 139, '', '3 July 2023, 12:02:40 AM'),
(109, 81, 139, 'hok', '3 July 2023, 12:06:45 AM'),
(110, 81, 139, 'no', '3 July 2023, 12:13:14 AM'),
(111, 81, 139, 'sad', '3 July 2023, 12:16:58 AM'),
(112, 81, 139, 'mmm', '3 July 2023, 12:18:07 AM'),
(113, 81, 139, 'v', '3 July 2023, 12:19:34 AM'),
(114, 0, 139, '', '3 July 2023, 12:28:27 AM'),
(115, 0, 139, '', '3 July 2023, 12:29:19 AM'),
(116, 81, 139, 'hmm', '3 July 2023, 11:49:08 AM'),
(117, 230, 139, 'm', '3 July 2023, 12:05:56 PM'),
(118, 244, 139, 'tooo', '3 July 2023, 12:15:07 PM'),
(119, 244, 139, 'bnklb,kojj', '3 July 2023, 12:24:58 PM'),
(120, 244, 139, 'ttttt', '3 July 2023, 12:38:36 PM'),
(121, 230, 139, 'oo', '3 July 2023, 12:47:58 PM'),
(122, 244, 139, 'vbv', '3 July 2023, 12:54:42 PM'),
(123, 244, 139, 'ki', '3 July 2023, 01:03:11 PM'),
(124, 244, 139, 'hi', '3 July 2023, 01:29:33 PM'),
(125, 244, 139, 'jko', '3 July 2023, 01:30:21 PM'),
(126, 244, 139, 'm', '3 July 2023, 01:41:11 PM'),
(127, 244, 139, 'hj', '3 July 2023, 01:47:59 PM'),
(128, 244, 139, 'hooo', '3 July 2023, 02:01:48 PM'),
(129, 244, 139, 'sukriya, Alhamdulillah, successfully done', '3 July 2023, 02:02:34 PM'),
(130, 244, 139, 'done', '3 July 2023, 02:03:05 PM'),
(131, 230, 139, 'helllo nafizul', '3 July 2023, 02:03:35 PM'),
(132, 81, 139, 'hi nafiz noyon', '3 July 2023, 02:03:48 PM'),
(133, 81, 139, 'koi', '3 July 2023, 02:15:15 PM'),
(134, 139, 81, 'hi bro', '3 July 2023, 02:19:29 PM'),
(135, 81, 139, 'hoccena', '3 July 2023, 02:20:15 PM'),
(136, 139, 81, 'hoo', '3 July 2023, 02:20:29 PM'),
(137, 81, 139, 'test', '3 July 2023, 02:23:02 PM'),
(138, 81, 139, 'hommom', '3 July 2023, 02:25:24 PM'),
(139, 81, 139, 'mm', '3 July 2023, 02:27:31 PM'),
(140, 81, 139, 'test hobe', '3 July 2023, 03:08:19 PM'),
(141, 139, 81, 'hocce na', '3 July 2023, 03:08:42 PM'),
(142, 139, 81, 'hi', '3 July 2023, 03:10:52 PM'),
(143, 81, 139, 'fhm', '3 July 2023, 03:18:18 PM'),
(144, 81, 139, 'hi', '3 July 2023, 03:32:58 PM'),
(145, 0, 139, '', '3 July 2023, 03:34:59 PM'),
(146, 81, 139, 'tu', '3 July 2023, 03:35:06 PM'),
(147, 0, 139, '', '3 July 2023, 03:35:17 PM'),
(148, 0, 81, '', '3 July 2023, 03:35:24 PM'),
(149, 81, 139, 'hoo', '3 July 2023, 03:50:00 PM'),
(150, 0, 139, '', '3 July 2023, 03:57:25 PM'),
(151, 81, 139, 'we', '3 July 2023, 03:57:30 PM'),
(152, 0, 139, '', '3 July 2023, 03:57:33 PM'),
(153, 0, 81, '', '3 July 2023, 03:58:07 PM'),
(154, 0, 139, '', '3 July 2023, 03:58:31 PM'),
(155, 81, 139, 'ttt', '3 July 2023, 03:58:36 PM'),
(156, 81, 139, 'ki', '3 July 2023, 04:05:52 PM'),
(157, 81, 139, 'hoina ken', '3 July 2023, 04:06:12 PM'),
(158, 139, 81, 'hus', '3 July 2023, 04:06:45 PM'),
(159, 81, 139, 'hoo', '3 July 2023, 04:06:55 PM'),
(160, 81, 139, 'bro', '3 July 2023, 04:16:40 PM'),
(161, 81, 139, 'hi', '3 July 2023, 05:32:19 PM'),
(162, 81, 139, 'ki koro', '3 July 2023, 05:34:05 PM'),
(163, 139, 81, 'kicuna', '3 July 2023, 05:35:08 PM'),
(164, 81, 139, 'koi akhon', '3 July 2023, 05:35:19 PM'),
(165, 139, 81, 'try', '3 July 2023, 05:41:36 PM'),
(166, 81, 139, 'try 2 hoina', '3 July 2023, 05:41:51 PM'),
(167, 139, 81, 'naa', '3 July 2023, 05:59:20 PM'),
(168, 81, 139, 'koi', '3 July 2023, 05:59:35 PM'),
(169, 139, 81, 'kkkkkk', '3 July 2023, 06:00:04 PM'),
(170, 139, 81, 'bor', '3 July 2023, 06:00:32 PM'),
(171, 139, 81, 'we jaaaaa', '3 July 2023, 06:02:40 PM'),
(172, 81, 139, 'haaasss', '3 July 2023, 06:03:16 PM'),
(173, 81, 139, 'hooo\nsnanana', '3 July 2023, 06:04:29 PM'),
(174, 139, 81, 'haaaaaa jaaa kaaa', '3 July 2023, 06:04:46 PM'),
(175, 81, 139, 'sorry vai', '3 July 2023, 06:09:00 PM'),
(176, 139, 81, 'naaa vabi', '3 July 2023, 06:09:14 PM'),
(177, 81, 139, 'OO bai', '3 July 2023, 06:13:56 PM'),
(178, 139, 81, 'ooo vabi', '3 July 2023, 06:14:04 PM'),
(179, 230, 139, 'hi nafizul', '3 July 2023, 10:46:47 PM'),
(180, 230, 139, 'kmn acho?', '3 July 2023, 10:46:54 PM'),
(181, 230, 139, 'ki koro', '3 July 2023, 10:47:00 PM'),
(182, 230, 139, 'jgh', '4 July 2023, 12:36:54 AM'),
(183, 230, 139, 'hey anik', '4 July 2023, 10:48:03 PM'),
(184, 230, 81, 'hi nishu', '10 July 2023, 01:55:15 PM'),
(185, 230, 81, 'helllo sir', '10 July 2023, 01:57:25 PM'),
(186, 81, 81, 'hey, this is my id, 81 to 81 message sent and received test', '12 July 2023, 01:13:39 AM'),
(187, 244, 81, 'test', '12 July 2023, 02:13:39 AM'),
(188, 244, 140, 'hi nafizul islam', '12 July 2023, 11:49:31 PM'),
(191, 139, 140, 'hi noyon', '12 July 2023, 11:58:24 PM'),
(192, 139, 140, 'noyon 480', '13 July 2023, 01:15:48 AM'),
(193, 140, 139, 'hi 140', '13 July 2023, 02:10:19 AM'),
(194, 139, 237, 'from 237, dicci 139 ke', '13 July 2023, 02:20:01 AM'),
(195, 140, 237, 'from 237, dicci 140 ke', '13 July 2023, 02:20:13 AM'),
(196, 230, 237, 'from 237, dicci 230 ke', '13 July 2023, 02:21:34 AM'),
(197, 230, 237, '2nd time test from 237, dicci 139 ke', '13 July 2023, 02:22:02 AM'),
(198, 81, 237, '237 theke 81 ke msg', '13 July 2023, 02:58:02 AM'),
(199, 237, 236, '236 theke 27 ke msg', '13 July 2023, 03:07:39 AM'),
(200, 230, 236, '236 theke 230 ke msg', '13 July 2023, 03:09:12 AM'),
(201, 139, 236, '236 theke 139 ke msg', '13 July 2023, 03:21:48 AM'),
(202, 237, 236, '236 theke 237 ke msg', '13 July 2023, 03:22:00 AM'),
(203, 81, 236, '236 theke 81 ke msg', '13 July 2023, 03:25:07 AM'),
(204, 236, 238, '238  theke 236 ke msg', '13 July 2023, 03:38:37 AM'),
(205, 230, 238, '238  theke 230 ke msg', '13 July 2023, 03:38:48 AM'),
(206, 238, 238, 'nijer id tei msg', '13 July 2023, 03:39:40 AM'),
(207, 244, 81, 'hi 244', '13 July 2023, 02:40:47 PM'),
(208, 230, 81, '81 theke 230 message', '15 July 2023, 04:30:28 PM'),
(209, 230, 81, 'hi 81, from 230', '15 July 2023, 04:30:40 PM'),
(210, 230, 244, '244 the 30 message test', '15 July 2023, 05:55:01 PM'),
(211, 230, 244, 'search message test', '15 July 2023, 05:55:11 PM'),
(212, 230, 244, '2nd test message search', '15 July 2023, 06:00:41 PM'),
(213, 244, 81, 'Hi 81', '15 July 2023, 06:18:46 PM'),
(214, 81, 244, 'hello 244', '15 July 2023, 06:18:56 PM');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pic1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `user_id`, `pic1`) VALUES
(41, 71, '342670387_1578020439359079_3301382812120421222_n.jpg'),
(46, 15, 'technical-support-png_309009.jpg'),
(49, 16, 'shosurbari-male.jpg'),
(50, 81, 'naf.png'),
(62, 244, 'GKEM4850.JPG'),
(63, 139, ''),
(64, 230, 'noyon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `fullname` varchar(60) NOT NULL,
  `username` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(40) NOT NULL,
  `number` int(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `deactivated` tinyint(1) NOT NULL,
  `register_date` varchar(100) NOT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `last_active_time` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `gender`, `password`, `number`, `email`, `active`, `deactivated`, `register_date`, `active_status`, `last_active_time`) VALUES
(15, '', 'nafiz', 'male', 'nafiz', 0, 'nafiz@gmail.com', 1, 0, '', 0, '2023-07-13 12:52:54'),
(16, '', 'noyon', 'male', 'noyon', 1789898927, 'noyon@gmail.com', 1, 0, '', 0, '2023-07-13 12:52:54'),
(71, '', 'nahida', 'male', 'nahida', 0, 'nahida@gmail.com', 1, 0, '', 0, '2023-07-13 12:52:54'),
(81, 'Nafizul', 'nafizul', 'male', '193-35-480', 1737226404, 'nafiz.noyon.480@gmail.com', 1, 0, '', 0, 'Sat 06:33 PM - 15 Jul 2023'),
(138, 'Nafiz Noyon', 'nafis', 'male', 'nafis', 1737226404, 'nafis@gmail.com', 1, 0, '', 0, '2023-07-13 12:52:54'),
(139, 'marufa', 'marufa', 'male', 'marufa', 2147483647, 'Samia@gmail.com', 1, 0, '', 0, '2023-07-13 12:52:54'),
(140, 'mizan', 'mizan', 'Male', 'mizan', 198987334, 'mizan@hotmail.com', 1, 0, '', 0, '2023-07-13 12:52:54'),
(141, 'nasa', 'nasa', 'Male', 'nasa', 2147483647, 'nasa@hotmail.com', 1, 0, '', 0, '2023-07-13 12:52:54'),
(229, 'Tajkim', 'Tajkim', 'Male', '$2y$10$mcM/WwzQuP0FwAnAdlKom.Kq3aFGYpHBm', 1737226404, 'Tajkim@gmail.com', 1, 0, '5 May 2023, 04:39:29 PM', 0, '2023-07-13 12:52:54'),
(230, 'Nawaz', 'Nawaz', 'Male', 'Nawaz', 187878987, 'Nawaz@gmail.com', 1, 0, '5 May 2023, 06:14:11 PM', 0, 'Thu Jul 13 2023 - 02:38 PM'),
(231, 'Bin', 'Bin', 'Male', '$2y$12$O3.2T66AFQU.ZZvIHWmM9OWqI6n79y2qo', 2147483647, 'Bin@gmail.com', 1, 0, '5 May 2023, 06:54:29 PM', 0, '2023-07-13 12:52:54'),
(232, 'rabbi', 'rabbi', 'Male', '$2y$10$UnC5t0IQFXLS//H7lY57C.P9AryGJy1sH', 2147483647, 'rabbi@gmail.com', 1, 0, '5 May 2023, 07:57:18 PM', 0, '2023-07-13 12:52:54'),
(235, 'badhon', 'badhon', 'Male', 'badhon', 2147483647, 'badhon@gmail.com', 1, 0, '17 May 2023, 02:06:47 PM', 0, '2023-07-13 12:52:54'),
(236, 'nafizul', 'naf', 'Male', 'naf', 1737226404, 'nafiz.swe@gmail.com', 1, 0, '29 May 2023, 12:45:23 AM', 0, '2023-07-13 12:52:54'),
(237, 'nafizul', 'nafizul2', 'Male', 'nafiz', 1737226404, 'nafiz.swe@hotmail.com', 1, 0, '29 May 2023, 01:08:23 AM', 0, '2023-07-13 12:52:54'),
(238, 'habib', 'habib', 'Male', '1212', 2147483647, 'habib@yahoo.com', 1, 0, '29 May 2023, 01:31:26 AM', 0, '2023-07-13 12:52:54'),
(239, 'rajib', 'rajib', 'Male', '123456', 2147483647, 'rajib.swe@yahoo.com', 1, 0, '29 May 2023, 10:28:46 AM', 0, '2023-07-13 12:52:54'),
(240, 'imran', 'imran', 'Male', 'imran', 1937778727, 'imran.swe@gmail.com', 1, 0, '29 May 2023, 12:20:30 PM', 0, '2023-07-13 12:52:54'),
(241, 'noyon nafiz', 'nafiz480', 'Male', '1111', 2147483647, 'nafiznoyon480@yahoo.com', 1, 0, '29 May 2023, 01:30:18 PM', 0, '2023-07-13 12:52:54'),
(242, 'khaled', 'khaled', 'Male', '1234', 2147483647, 'khaled.swe@gmail.com', 1, 0, '29 May 2023, 05:19:03 PM', 0, '2023-07-13 12:52:54'),
(243, 'hasiba', 'hasiba', 'Female', '1234', 2147483647, 'hasiba@gmail.com', 1, 0, '29 May 2023, 07:54:24 PM', 0, '2023-07-13 12:52:54'),
(244, 'hamza', 'hamza', 'Male', '1234', 2147483647, 'hamza@hotmail.com', 1, 0, '29 May 2023, 09:37:47 PM', 0, 'Mon 01:52 PM - 17 Jul 2023'),
(245, 'Omar', 'omar', 'Male', '123456', 2147483647, 'omar@gmail.com', 1, 0, '30 May 2023, 12:12:23 AM', 0, '2023-07-13 12:52:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `1bd_personal_physical`
--
ALTER TABLE `1bd_personal_physical`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `2bd_personal_lifestyle`
--
ALTER TABLE `2bd_personal_lifestyle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`) USING BTREE;

--
-- Indexes for table `3bd_higher_secondaryedu_method`
--
ALTER TABLE `3bd_higher_secondaryedu_method`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `3bd_kowmi_madrasaedu_method`
--
ALTER TABLE `3bd_kowmi_madrasaedu_method`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `3bd_secondaryedu_method`
--
ALTER TABLE `3bd_secondaryedu_method`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `3bd_universityedu_method`
--
ALTER TABLE `3bd_universityedu_method`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `4bd_address_details`
--
ALTER TABLE `4bd_address_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `5bd_family_information`
--
ALTER TABLE `5bd_family_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `6bd_7bd_marital_status`
--
ALTER TABLE `6bd_7bd_marital_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `6bd_marriage_related_qs_male`
--
ALTER TABLE `6bd_marriage_related_qs_male`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `7bd_marriage_related_qs_female`
--
ALTER TABLE `7bd_marriage_related_qs_female`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `8bd_religion_details`
--
ALTER TABLE `8bd_religion_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `9bd_expected_life_partner`
--
ALTER TABLE `9bd_expected_life_partner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `1bd_personal_physical`
--
ALTER TABLE `1bd_personal_physical`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `2bd_personal_lifestyle`
--
ALTER TABLE `2bd_personal_lifestyle`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `3bd_higher_secondaryedu_method`
--
ALTER TABLE `3bd_higher_secondaryedu_method`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `3bd_kowmi_madrasaedu_method`
--
ALTER TABLE `3bd_kowmi_madrasaedu_method`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `3bd_secondaryedu_method`
--
ALTER TABLE `3bd_secondaryedu_method`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `3bd_universityedu_method`
--
ALTER TABLE `3bd_universityedu_method`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `4bd_address_details`
--
ALTER TABLE `4bd_address_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `5bd_family_information`
--
ALTER TABLE `5bd_family_information`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `6bd_7bd_marital_status`
--
ALTER TABLE `6bd_7bd_marital_status`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `6bd_marriage_related_qs_male`
--
ALTER TABLE `6bd_marriage_related_qs_male`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `7bd_marriage_related_qs_female`
--
ALTER TABLE `7bd_marriage_related_qs_female`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `8bd_religion_details`
--
ALTER TABLE `8bd_religion_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `9bd_expected_life_partner`
--
ALTER TABLE `9bd_expected_life_partner`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `1bd_personal_physical`
--
ALTER TABLE `1bd_personal_physical`
  ADD CONSTRAINT `1bd_personal_physical_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `2bd_personal_lifestyle`
--
ALTER TABLE `2bd_personal_lifestyle`
  ADD CONSTRAINT `2bd_personal_lifestyle_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `3bd_higher_secondaryedu_method`
--
ALTER TABLE `3bd_higher_secondaryedu_method`
  ADD CONSTRAINT `3bd_higher_secondaryedu_method_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `3bd_kowmi_madrasaedu_method`
--
ALTER TABLE `3bd_kowmi_madrasaedu_method`
  ADD CONSTRAINT `3bd_kowmi_madrasaedu_method_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `3bd_secondaryedu_method`
--
ALTER TABLE `3bd_secondaryedu_method`
  ADD CONSTRAINT `3bd_secondaryedu_method_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `3bd_universityedu_method`
--
ALTER TABLE `3bd_universityedu_method`
  ADD CONSTRAINT `3bd_universityedu_method_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `4bd_address_details`
--
ALTER TABLE `4bd_address_details`
  ADD CONSTRAINT `4bd_address_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `5bd_family_information`
--
ALTER TABLE `5bd_family_information`
  ADD CONSTRAINT `5bd_family_information_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `6bd_7bd_marital_status`
--
ALTER TABLE `6bd_7bd_marital_status`
  ADD CONSTRAINT `6bd_7bd_marital_status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `6bd_marriage_related_qs_male`
--
ALTER TABLE `6bd_marriage_related_qs_male`
  ADD CONSTRAINT `6bd_marriage_related_qs_male_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `7bd_marriage_related_qs_female`
--
ALTER TABLE `7bd_marriage_related_qs_female`
  ADD CONSTRAINT `7bd_marriage_related_qs_female_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `8bd_religion_details`
--
ALTER TABLE `8bd_religion_details`
  ADD CONSTRAINT `8bd_religion_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `9bd_expected_life_partner`
--
ALTER TABLE `9bd_expected_life_partner`
  ADD CONSTRAINT `9bd_expected_life_partner_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
