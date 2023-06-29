-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 28, 2023 at 07:16 PM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ehostsx4_valogical`
--

-- --------------------------------------------------------

--
-- Table structure for table `pages_mng`
--

CREATE TABLE `pages_mng` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `heading_title` longtext NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `page_slug` varchar(255) NOT NULL,
  `descrip` longtext NOT NULL,
  `meta_keyword` longtext NOT NULL,
  `meta_descrip` longtext NOT NULL,
  `image_src` varchar(255) NOT NULL,
  `extra_title` longtext NOT NULL,
  `extra_descrip` longtext NOT NULL,
  `canonical_tag` longtext NOT NULL,
  `robot_index` varchar(100) NOT NULL,
  `robotindex` varchar(50) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages_mng`
--

INSERT INTO `pages_mng` (`id`, `title`, `heading_title`, `meta_title`, `page_slug`, `descrip`, `meta_keyword`, `meta_descrip`, `image_src`, `extra_title`, `extra_descrip`, `canonical_tag`, `robot_index`, `robotindex`, `added_on`, `status`) VALUES
(1, 'Home', 'Welcome to <span>OML PLUS</span> ', 'Rent Movies On Demand- DVDs,Blu-RAY & Games |OML PLUS.com', 'home', '<h3 style=\"text-align: center;\"><strong><span style=\"color: #000000;\">!! GET TRAINED BY <span style=\"color: #ff6600;\">INDUSTRY EXPERTS !!</span> </span><br /><br /></strong></h3>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\"><strong>EduCaff,</strong>&nbsp;is a group of Kolkata\'s Leading&nbsp;<span style=\"color: #ff6600;\"><strong>IT Software | IT Hardware | IT Networking | IT Management | IT Virtualization/Cloud Computing | and Non-IT Courses</strong> </span>(School/College/University Courses | Management Training Courses | Government Exam Coaching Classes) training institute that offers wide range of Class Room Training | Online Training | Boot Camp Training | Corporate Training courses from primary level to advanced level, and everything in between. In addition to our Class Room training techniques and study materials, we also provide Online live classes, Boot Camp Training and Corporate Training by our experienced and knowledgeable instructors.<br /><br /></span><span style=\"color: #000000;\">With recognizing the barriers and challenges in the present academic world, <strong>Educaff</strong>&nbsp;Kolkata started its journey in early 2016. We have taken an oath to spread education through a smart and informative way across Kolkata. We will provide our students with the perfect mechanism to build a robust present to secure their future. Almost <span style=\"color: #ff6600;\"><strong>85%</strong></span> of our serious and technology dedicated students are already placed in different MNC and non-MNC companies since our inception. The team of <strong>Educaff</strong> is not only a bunch of dedicated educational practitioners but we are also committed and passionate about our student\'s satisfaction and success.</span> <span style=\"color: #ff6600;\"><em><strong>\'We Care For Your Career\'</strong></em></span>.<br /><br /><span style=\"color: #000000;\"><strong>EduCaff</strong> Kolkata&nbsp;is not only committed but also passionate about our students&rsquo; satisfaction and success. At the end of the day <span style=\"color: #ff6600;\"><em><strong>&lsquo;We Care For Your Career&rsquo;.</strong></em></span> So, we are only as successful as our students are.&nbsp;</span><span style=\"color: #000000;\">From our Class Room training to real LAB, self-study LAB workbook to mock test facility- we are always ensuring that your study plan must be succeed. We are also dedicated to individual guidance in such an order that your certification goals and job, both are achieved at same time.&nbsp;</span><span style=\"color: #000000;\">We employ passion, dedication, satisfaction at a time that makes <strong>EduCaff </strong>a&nbsp;leading IT training institute in Kolkata. It is hard to find a match to&nbsp;<strong>EduCaff</strong>&nbsp;in quality anywhere else.<br /><br />Students or employees who want to enhance their knowledge in a specific career skill to accelerate their career, we offer specialization courses for them. You will learn your knowledge under certified and industry-specific trainers. We help our students to grow their knowledge with handling real-time projects from various industries. <br /></span></p>', 'best it training institutes in kolkata, best it training center in kolkata, best training provider in kolkata, best coaching classes in kolkata, best tutor in kolkata, job training in kolkata, coaching center in kolkata.', 'Best IT Classroom | Online | Corporate | BootCamp | Govt. Exam | Management Training Institute in Kolkata! Get Trained by Industry Experts Trainers.', '', 'Looking For Training  <span>By Industry Experts? </span>', 'Fill the Form &amp; Get the Best Course FEES Right Now!', 'https://www.educaffkolkata.in', 'follow', 'index', '2019-07-02 23:47:39', 0),
(2, 'About Us', 'About Us', 'Biggest IT & Non-IT Courses Training Institutes in Kolkata - EduCaff', 'about-us', '<p style=\"text-align: justify;\">From our start in the UK back in 1999 now our new home Toronto, Canda. Our mission is to provide high quality <br />digital content to our consumers while ensuring competitive pricing and outstanding quality. We retain the highest <br />quality, integrate the latest technologies into our products. This approach enables us to maintain a global <br />network of intellect, creativity, and industry-specific experience while encouraging innovative ideas and <br />fresh new approaches. We are commited to bring our fans the best content possible.<br /><br /></p>', 'best it networking training institute in kolkata, best cloud training institute in kolkata, java training institute in  kolkata, php training center in kolkata, cloud training center in  kolkata, cisco networking training & placement in kolkata, best cisco networking training institute in  kolkata.', 'Leading IT Networking | IT Programming | Cloud Computing | IT Mgmt. Training Center in Kolkata. Industry Experts Trainers with Affordable Course Fees.', '', 'Need More <span>Information?</span>', '<p>Do you have any question regarding any course? Just&nbsp;click the button below&nbsp;to Contact Us</p>\r\n<a class=\"el-btn-regular\" href=\"https://www.educaffkolkata.in/contact\">Contact Us</a>', 'https://www.educaffkolkata.in/aboutus', 'follow', 'index', '2019-07-04 04:08:46', 0),
(3, 'Movies', 'Movies', 'Movies | Post your movies free of cost | movies Listings Site | MirchiChef.com', 'movies', '', 'Movies,OML PLUS.com,Post your movies free of cost, Movies Listings Site', '', '', '', '', 'https://www.educaffkolkata.in/bootcamp', 'follow', 'index', '2019-07-02 00:30:27', 0),
(4, 'Movies Details', 'Movies Details', 'Redbox.com', '', 'Offering Courses', 'cisco networking training institute in kolkata, best cisco networking training institute in kolkata, best IT networking training center in kolkata, best IT software training center in kolkata, java courses training in kolkata, best cloud computing training institute in kolkata.', 'Leading IT Training | Non-IT Training | IT Management | Government Job Training Institute in Kolkata. Get Trained by Industry Experts Trainer.', '', '', '', 'https://www.educaffkolkata.in/courses', 'follow', 'index', '2019-07-03 23:54:07', 0),
(5, 'Recipe', 'Recipe', 'Post your recipes free of cost | Recipe Listings Site | MirchiChef.com', 'recipe', '', 'photo gallery, video gallery', 'Check out the latest photos of&nbsp;iNetwork Experts. Find our Tutorial Videos from Gallery.', '', '', '', 'https://www.inetworkexperts.com/gallery', 'nofollow', 'noindex', '2019-06-14 03:26:09', 0),
(6, 'Recipe Details', 'Placement', ' MirchiChef.com', '', '<h1 style=\"text-align: justify;\"><strong>JOB Placement Training in&nbsp;Kolkata - <span style=\"color: #ff6600;\">EduCaff</span></strong><br /><br /></h1>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Educaff is leading IT software, IT Hardware, IT Networking and Non-IT training institute in Kolkata. We are providing JOB oriented training with&nbsp;100% Job assistance. Our Industry Experts Trainer will assist you such a way that you will become an experts.&nbsp;We thrive for you, for your knowledge and for your success. With <strong>EduCaff</strong>, we believe that your future starts here and we are 100% committed to make you to the top. Here you will acquire the hands-on practical experience you need to apply the knowledge you learn in professional real-world environments.<br /><br />EduCaff is an institute based on IT and Non-IT training course. The very view of EduCaff is to promote the trainee to the corporate world with a trained mind which can deal with every problem the world throws at them. The trainees at the EduCaff stand witness to their very agenda of launching fresh and talented people. They focus their whole on maintaining the expectancy of the companies. EduCaff conducted many training courses starting from IT training course, Non-IT training course to job placement training course. <br /><br />Our Live Project will help you to gather knowledge in IT Software, IT Hardware, IT Virtualization, IT Management, IT Networking and Non-IT domains. It\'s a perfect combination of all domains that will make you a real Professional. School or College students/ recently pass out students and people who are thinking to start their carrier in IT and Non-IT industry are welcome to EduCaff Kolkata.<br /></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">The obvious reason is, No one in the Kolkata can give any JOB guarantee. The only JOB guarantee is your \"SKILLS\" which you can\'t learn from an ordinary Trainer. EduCaff build a conducive LAB environment and you will be trained by our Industry Experts Instructor who has Real world Industry Experience, who can\'t only train you but will lay a solid foundation for a Career.</span></p>', 'job training in kolkata, job placement in kolkata, job oriented training in kolkata', 'EduCaff in Kolkata Offers JOB Oriented Training Courses, also provides 100% Placement Assistance. Enquire Us for more details.', '', '', '<h3><strong>Mr. Sumanta Ghorai Got JOB in <span style=\"color: #0000ff;\">IBM</span>&nbsp; &nbsp; <span style=\"color: #ff6600;\">|</span>&nbsp; &nbsp; Mr.&nbsp;Manoj Patil&nbsp;Got JOB in <span style=\"color: #0000ff;\">TCS</span>&nbsp; &nbsp; <span style=\"color: #ff6600;\">|&nbsp;</span> &nbsp; Mr.&nbsp;Ankush M. Got JOB in <span style=\"color: #0000ff;\">WIPRO&nbsp; &nbsp;</span></strong><strong><span style=\"color: #ff6600;\">|&nbsp;</span>&nbsp; Mr.&nbsp;Anish&nbsp;Sindhe&nbsp;Got JOB in&nbsp;<span style=\"color: #0000ff;\">Infosys</span></strong></h3>', 'https://www.educaffkolkata.in/placement', 'follow', 'index', '2019-06-14 03:25:45', 0),
(7, 'Contact', 'Contact ', 'Contact Us For More Details  MirchiChef.com', '', '<h4 style=\"text-align: left;\">Please complete the form below, so we can provide quick and efficient service. If this is an urgent matter please contact Customer Support:</h4>', 'Contact us', 'Do you have any question regarding any course? Please Call or Email Us. Our team will reply within one business day.', '', '', '<br />\r\n<h2 style=\"text-align: center;\"><strong>OUR TRAINING <span style=\"color: #ff6600;\">CENTERS&nbsp;IN Kolkata</span></strong></h2>', 'https://www.educaffkolkata.in/contact', 'follow', 'index', '2019-06-14 03:26:48', 0),
(8, 'Privacy', 'Privacy <span>Policy</span>', 'Privacy Policy |  MirchiChef.com', '', '', '', 'Please read out and understand the terms and conditions that are outlined in EduCaff - Kolkata Privacy Policy.', '', '', '', 'https://www.educaffkolkata.in/privacy', 'follow', 'index', '2019-06-14 03:27:00', 0),
(9, 'Terms', 'Terms & <span>Condition</span>', 'Terms & Condition | OML PLUS', '', 'Terms and Conditions<br />Before Subscriber&rsquo;s transaction can be completed, Subscriber must read and agree to these terms and conditions. By applying for access and or services from this website, Subscriber is agreeing to these terms and conditions, and is agreeing to be legally bound by them. This agreement is subject to change at any time. Changes are effective when posted on this site without notice upon each subscriber.<br /><br />1. Definitions<br /><br />\"Member\" or \"Membership,\" shall mean the subscriber or user of a valid username and password for the site during the term of membership.<br />\"OMNIMEDIALONDON.COM &amp; OMNIMEDIALONDONPLUS.COM&rdquo; shall mean any of the companies billing the Subscriber including any additional billing companies used by OMNIMEDIALONDON.COM &amp; OMNIMEDIALONDONPLUS.COM or changes thereof.<br />\"Site\" shall mean the website for which subscriber is purchasing a username and password in order to access the site and its materials and obtain the benefits of membership.<br />\"Subscriber\" shall mean the user of the services of the site and holder of a valid username and password for the Site.<br />\"Access rights,\" shall mean the combination of unique username and password that is used to access a site. An access rights is a license to use a Site for a period of time that is specified.<br />\"Bookmarking,\" shall mean a URL placed into a temporary file on the subscriber\'s browser so that the subscriber may return to that page at a future date without having to type in its username and password.<br />2. Payment / Fee<br />The Sites may have periodic subscription fees at the time of the initial enrolment for subscription. The member is responsible for such fees according to the terms and conditions of such Site.<br /><br />3. Automatic Recurring Billing (If Selected By Subscriber On The Sign Up Page)<br />In accordance with the terms and conditions of the Site subscription fees may be automatically renewed at or after the end of the original term selected, for a similar period of time and for a similar or different amount, unless notice of cancellation is received from the Subscriber. Unless and until this agreement is cancelled in accordance with the terms hereof, Subscriber hereby authorizes OMNIMEDIALONDON.COM &amp; OMNIMEDIALONDONPLUS.COM to charge subscriber\'s chosen payment method to pay for the ongoing cost of membership. Subscriber hereby further authorizes OMNIMEDIALONDON.COM &amp; OMNIMEDIALONDONPLUS.COM to charge subscriber\'s chosen payment method for any and all additional purchases of materials provided on the site. In the event of an unsuccessful recurring payment, an administration fee of up to $4.00 may be applied in order to keep a subscription temporarily active until the full subscription fee can be processed successfully.<br /><br /> <br />4. Cancellation<br />At any time, and without cause, subscription to the service may be terminated by either: OMNIMEDIALONDON.COM &amp; OMNIMEDIALONDONPLUS.COM, the Site, or the Subscriber upon notification of the other by electronic or conventional mail, by chat, or by telephone. Subscribers are liable for charges incurred until the date of the termination.<br /><br />5. Refunds4Refunds for purchases or recurring charges may be requested by contacting customer support. Refunds or credits will not be issued for partially used Memberships. Cancelation for all future recurring billing may be requested in accordance with Section 4 - Cancelation. OMNIMEDIALONDON.COM &amp; OMNIMEDIALONDONPLUS.COM reserves the right to grant a refund or a credit applicable to purchases to the Site at its discretion. The decision to refund a charge does not imply the obligation to issue additional future refunds. Should a refund be issued by OMNIMEDIALONDON.COM &amp; OMNIMEDIALONDONPLUS.COM for any reason, it will be credited solely to the payment method used in the original transaction. OMNIMEDIALONDON.COM &amp; OMNIMEDIALONDONPLUS.COM will not issue refunds by cash, check, or to another payment mechanism.<br />6. Cardholder Disputes/Chargebacks<br />All chargebacks are thoroughly investigated and may prevent future purchases with OMNIMEDIALONDON.COM &amp; OMNIMEDIALONDONPLUS.COM given the circumstances. Fraud claims may result in OMNIMEDIALONDON.COM &amp; OMNIMEDIALONDONPLUS.COM contacting Subscriber&rsquo;s issuer to protect Subscriber and prevent future fraudulent charges to Subscriber card.<br /><br />7. Authorization of Use<br />Subscribers to the Site are hereby authorized a single access rights to access the service or material located at this website. This access rights shall be granted for sole use to one Subscriber. All memberships are provided for personal use and shall not be used for any commercial purposes or by any other third parties. Commercial use of either the Site or any material found within is strictly prohibited unless authorized by the website. No material within the Site may be transferred to any other person or entity, whether commercial or non-commercial. No material within the Site may be distributed through peer-to-peer networks or any other file sharing platforms. In addition, materials may not be modified, or altered. Materials may not be displayed publicly, or used for any rental, sale, or display. Materials shall extend to copyright, trademarks, or other proprietary notices there from. OMNIMEDIALONDON.COM &amp; OMNIMEDIALONDONPLUS.COM and the Site reserve the right to terminate this access rights at any time if the terms of this agreement are breached. In the case that the terms are breached, subscriber will be required to immediately destroy any information or material printed, downloaded or otherwise copied from the site.<br /><br /> .<br />8. Sanction and Approval of Adult Material<br />This Site contains age-restricted materials. If Subscriber is under the age of 18 years, or under the age of majority in the location from where accessing this Site Subscriber does not have authorization or permission to enter or access any of its materials. If Subscriber is over the age of 18 years or over the age of majority in the location from where accessing this site by entering the website you hereby agree to comply with these terms and conditions.<br /><br />9. Supplementary Terms and Conditions<br />The Site may have additional Terms and Conditions that are an integral part of their offering to the Subscriber, and are in addition to these Terms and Conditions. Such Terms and Conditions as listed at the site will in no way invalidate any of the Terms and Conditions listed here. This Agreement shall be construed and enforced in accordance with the Laws of Cyprus applicable to contracts negotiated, executed, and wholly performed within said Country. Disputes arising hereunder shall be settled in Cyprus.<br /><br />10. Severability<br />If any provision of this Agreement shall be held to be invalid or unenforceable for any reason, the remaining provisions shall continue to be valid and enforceable. If a court finds that any of this Agreement is invalid or unenforceable, but that by limiting such provision it would become valid or enforceable, then such provision shall be deemed to be written, construed, and enforced as so limited.<br /><br />11. Notice<br />Notices by the site to subscribers may be given by means of electronic messages through the site, by a general posting on the site, or by conventional mail. Notices by subscribers may be given by electronic messages, conventional mail, telephone or fax unless otherwise specified in the Agreement. All questions, complaints, or notices regarding the site must be directed to OMNIMEDIALONDON. All cancellations of service to a site must also be directed to OMNIMEDIALONDON.COM &amp; OMNIMEDIALONDONPLUS.COM. Questions and Contact Information All questions to OMNIMEDIALONDON.COM &amp; OMNIMEDIALONDONPLUS.COM regarding these terms and conditions must be directed to:<br /><br />For billing issues <br />For support/technical issues <br /><br />12. Privacy Policy<br />Personal data, or personal information, means any information about an individual from which that person can be identified by (&ldquo;Personal Information&rdquo;). It does not include data that has been anonymized or pseudonymized.<br /><br />We may collect, use, store and transfer different kinds of personal data about you, which we have grouped together as follows:<br /><br />Identity Data includes first name, maiden name, last name, username or similar identifier, marital status, title, date of birth and gender.<br />Contact Data includes billing address, email address and telephone numbers.<br />Financial Data includes bank account and payment card details.<br />Transaction Data includes details about payments to and from you and other details of products and services you have purchased or received from us.<br />Technical Data includes internet protocol (IP) address, your login data, browser type and version, time zone setting and location, browser plug-in types and versions, operating system and platform and other technology on the devices you use to access this Website.<br />Profile Data includes your username and password, purchases or orders made by you, your interests, preferences, feedback and survey responses.<br />Usage Data includes information about how you use our Website, products and services.<br />Marketing and Communications Data includes your preferences in receiving marketing from us and our third parties and your communication preferences.<br />13. SUBSCRIPTION FEES AND USER COMMUNICATION<br />Subscription and Membership fees to Site are subject to change at any time at the sole and absolute discretion of OMNIMEDIALONDON.COM &amp; OMNIMEDIALONDONPLUS.COM. The official standard membership rates for the Site shall be set forth at the following link: OMNIMEDIALONDON.COM &amp; OMNIMEDIALONDONPLUS.COM. The current monthly membership rate which will appear on Subscriber credit card bill, will be debited from Subscriber account, charged to Subscriber choice of payment means.<br /><br />\"OPT-IN AND USER COMMUNICATION\" &ndash; Subscriber\'s expressly and specifically acknowledges and agrees that his email address or other means of communicating with subscriber may be used to send him offers, information or any other commercially oriented emails or other means of communications. More specifically, some offers may be presented to the subscriber via email campaigns or other means of communications with the option to express the subscriber\'s preference by either clicking or entering \"accept\" (alternatively \"yes\") or \"decline\" (alternatively \"no\"). By selecting or clicking the \"accept\" or \"yes\", the subscriber indicates that the subscriber \"OPTS-IN\" to that offer and thereby agrees and assents that the subscriber\'s personal information, including its email address and data may be used for that matter or disclosed to third-parties.\"<br /><br />\"OPT-OUT AND USER COMMUNICATION\" &ndash; Subscriber\'s expressly and specifically acknowledges and agrees that his email address or other means of communicating with subscriber may be used to send him offers, information or any other commercially oriented emails or other means of communications. More specifically, other offers may be presented to the subscriber via email campaigns or other means of communications with a pre-selected preference or choice. If the subscriber does not deselect the pre-selected preference of choice (i.e. \"OPT-OUT\" of the offer) then the site may transfer the subscriber\'s personal profile information to the third-party service or content provider making the offer. If the subscriber deselects the pre-selected preference then no personal information about the subscriber may be disclosed to any third-party service or content provider.<br /><br />OMNIMEDIALONDON.COM &amp; OMNIMEDIALONDONPLUS.COM &copy; Copyright 2019 OML Limited <br />Trademarks Licensing', '', '', 'omlplus-frntp-slides-011.jpg', '', '', 'https://www.educaffkolkata.in/terms', 'follow', 'index', '2019-07-04 03:08:27', 0),
(13, 'Login', 'Account<span>Login</span>', 'Login | OML PLUS.com', 'login', '', '', '', '', '', '', 'https://www.mirchichef.com/login', 'follow', 'index', '2019-07-01 06:13:39', 0),
(14, 'Shop', 'Shop', 'Post your recipes free of cost | Recipe Listings Site | MirchiChef.com', 'shop', '', 'photo gallery, video gallery', 'Check out the latest photos of&nbsp;iNetwork Experts. Find our Tutorial Videos from Gallery.', '', '', '', 'https://www.inetworkexperts.com/gallery', 'nofollow', 'noindex', '2019-06-14 03:26:09', 0),
(15, 'Shop Details', 'Shop Details', 'Post your recipes free of cost | Recipe Listings Site | MirchiChef.com', 'shop-details', '', 'photo gallery, video gallery', 'Check out the latest photos of&nbsp;iNetwork Experts. Find our Tutorial Videos from Gallery.', '', '', '', 'https://www.inetworkexperts.com/gallery', 'nofollow', 'noindex', '2019-06-14 03:26:09', 0),
(16, 'Registration', 'User Registration', 'Registration | OML PLUS.com', '', 'User registration', '', '', '', '', '', '', '', '', '2019-07-01 06:31:24', 0),
(17, 'Fogot Password', 'forgot Password', 'Forgot Password |OML PLUS.com', '', '', '', '', '', '', '', '', '', '', '2019-07-01 06:43:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` text,
  `phone` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `relation` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `phone`, `email`, `address`, `relation`, `created_by`, `created_on`, `status`) VALUES
(1, 'Bhabesh', '5632147886', 'bab@gmail.com', 'dfhrfyjn', 'cousin', 'CUST19000007', '2019-07-16', 0),
(2, 'Sneha', '7896541230', 'sneha@gmail.com', 'sfgsrjytk', 'doctor', 'CUST19000016', '2019-07-18', 0),
(3, 'Hello2', '7896541230', 'debadrita.paul94@gmail.com', 'sdfbr bnjhji', 'home minister', 'CUST19000028', '2019-08-19', 0),
(4, 'Biswa Nath', '1234567890', 'bswnth79@gmail.com', 'tet', 'friend', 'CUST19000035', '2019-09-04', 0),
(5, 'Anupam', '7788996554', 'anuana@gmail.com', 'anu12345', 'Testing', 'CUST23000048', '2023-04-04', 0),
(6, 'Ddbd', '54563353', 'asdfdfg@gmail.com', '&nbsp;vnv n', 'fnvncv', 'EMP23000014', '2023-04-06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coupons`
--

CREATE TABLE `tbl_coupons` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `coupon_desp` longtext,
  `type` varchar(50) NOT NULL,
  `redemption` varchar(50) NOT NULL,
  `new_user_coupon` tinyint(4) NOT NULL,
  `min_cart_value` varchar(100) NOT NULL,
  `max_cart_value` int(11) DEFAULT NULL,
  `dis_type` text,
  `time_add` int(11) DEFAULT NULL,
  `discount_amount` int(11) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_coupons`
--

INSERT INTO `tbl_coupons` (`id`, `coupon_code`, `start_date`, `end_date`, `coupon_desp`, `type`, `redemption`, `new_user_coupon`, `min_cart_value`, `max_cart_value`, `dis_type`, `time_add`, `discount_amount`, `is_active`, `create_date`) VALUES
(1, 'DB67', '2019-07-11', '2019-09-10', NULL, 'per', 'one_time', 1, '0', 9000, 'Discount', 0, 10, 2, '2019-08-02'),
(2, 'LK00P', '2019-07-19', '2019-09-21', 'Add 10 hrs to your time wallet', 'per', 'multiple', 1, '0', 1000, 'time', 10, 0, 2, '2019-08-02'),
(3, 'SDVA2001', '2019-08-01', '2019-09-04', 'Add 15 hrs to yor time wallet', '', 'multiple', 1, '0', 5000, 'Discount', 0, 10, 2, '2019-08-02'),
(5, 'KLOM90BH', '2019-08-14', '2019-09-20', 'ghujil mjhgb', '', 'multiple', 0, '0', 1000, 'Time', 10, 0, 2, '2019-08-19'),
(6, 'AUG20TIME', '2023-06-06', '2023-10-17', 'time coupon', '', 'one_time', 1, '200', 500, 'Time', 0, 0, 2, '2023-06-06'),
(7, 'AUG20DISC', '2019-08-01', '2019-08-31', 'discount coupons', '', 'multiple', 0, '100', 500, 'Discount', 0, 0, 1, '2019-08-30'),
(8, 'REGN12', '2019-09-02', '2019-09-12', 'discount coupons', '', 'one_time', 1, '400', 2000, 'Discount', 0, 20, 1, '2019-09-04'),
(9, 'TIME200', '2019-09-03', '2019-09-07', 'time coupon', '', 'multiple', 0, '50', 2000, 'Time', 2, 0, 1, '2019-09-04'),
(10, 'RAM321', '2023-03-29', '2023-03-30', '', '', 'one_time', 1, '500', 1000, 'Time', 2, 0, 1, '2023-03-29'),
(11, 'NEWUSER10', '2023-06-01', '2023-07-31', '', '', 'one_time', 1, '500', 1500, 'Discount', 0, 10, 1, '2023-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coupon_apply`
--

CREATE TABLE `tbl_coupon_apply` (
  `id` int(11) NOT NULL,
  `user_code` varchar(100) DEFAULT NULL,
  `coupon_code` varchar(100) DEFAULT NULL,
  `count_coupon` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `cust_code` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `profile_url` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `active_invoice_id` int(11) DEFAULT NULL,
  `time_wallet` int(11) DEFAULT '0',
  `profile_photo` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `preference` text,
  `address_line1` varchar(100) DEFAULT NULL,
  `address_line2` varchar(100) DEFAULT NULL,
  `city` text,
  `country` text,
  `state` text,
  `post_code` int(11) DEFAULT NULL,
  `information` text,
  `is_first_pass_changed` tinyint(4) NOT NULL DEFAULT '0',
  `created_on` date DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(255) NOT NULL,
  `status` enum('0','1','2') DEFAULT '1' COMMENT '0 inactive 1 active 2 delete',
  `user_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `cust_code`, `full_name`, `profile_url`, `email`, `user_id`, `mobile`, `active_invoice_id`, `time_wallet`, `profile_photo`, `dob`, `preference`, `address_line1`, `address_line2`, `city`, `country`, `state`, `post_code`, `information`, `is_first_pass_changed`, `created_on`, `updated_on`, `updated_by`, `status`, `user_type`) VALUES
(1, 'CUST23000000', 'Bera Cust One', 'bera-cust-one', 'bera.cust.1@crm.com', 122, '7898768909', NULL, 100, 'default.png', '2023-06-02', 'email', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-06-13', '2023-06-21 10:04:18', '', '1', '2'),
(2, 'CUST23000001', 'Bera Cust Two', 'bera-cust-two', 'bera.cust2@crm.com', 123, '9870987679', NULL, 0, 'default.png', '2023-06-02', 'phone', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-06-13', '2023-06-13 05:27:46', '', '1', '2'),
(3, 'CUST23000002', 'Bera Cust 3', 'bera-cust-3', 'beracust3@crm.com', 124, '2345678765', NULL, 0, 'default.png', '2023-06-02', 'email', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-06-13', '2023-06-14 06:04:11', '', '1', '2'),
(4, 'CUST23000003', 'Bera Cust 4', 'bera-cust-4', 'beracust4@crm.com', 125, '9878987678', NULL, 10, 'default.png', '2023-06-02', 'email', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-06-13', '2023-06-13 05:32:54', '', '1', '2'),
(5, 'CUST23000004', 'Bera Final Customer', 'bera-final-customer', 'bera1@gmail.com', 129, '2345321343', 1, 10, 'default.png', '2023-06-02', 'email', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-06-13', '2023-06-13 14:14:14', '', '1', '2'),
(7, 'CUST23000005', 'Joy Kumar Bera', 'joy-kumar-bera', 'joy.desuntech@gmail.com', 131, '9875614352', 3, 999, '6492cdfb63f03.jpg', '2023-06-02', 'email', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-06-21', '2023-06-22 10:09:09', '', '1', '2'),
(8, 'CUST23000007', 'Aranya', 'aranya', 'aranya.desuntech@gmail.com', 135, '9874259359', 4, 0, '649409737b9f3.png', '2008-06-11', 'email', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-06-22', '2023-06-22 08:44:46', '', '1', '2'),
(9, 'CUST23000008', 'Sfsdfshfgfhfgh', 'sfsdfshfgfhfgh', 'a@gmail.com', 136, '1234567890', 5, 10, '64941d0c402a9.png', '2019-02-04', 'email', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-06-22', '2023-06-22 10:06:04', '', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cust_invoice`
--

CREATE TABLE `tbl_cust_invoice` (
  `id` int(11) NOT NULL,
  `invoice_code` varchar(100) DEFAULT NULL,
  `trans_code` varchar(100) DEFAULT NULL,
  `service_code` varchar(100) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_name` text,
  `inv_descrp` varchar(100) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_method` varchar(255) NOT NULL COMMENT '0=cash,1=bank',
  `inv_date` date DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `comments` text,
  `status` tinyint(11) DEFAULT NULL COMMENT '0=paid,1=unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_cust_invoice`
--

INSERT INTO `tbl_cust_invoice` (`id`, `invoice_code`, `trans_code`, `service_code`, `package_id`, `customer_id`, `customer_name`, `inv_descrp`, `amount`, `payment_method`, `inv_date`, `create_date`, `created_by`, `comments`, `status`) VALUES
(1, 'INV-648879B6D6615', 'TXN-648879B6D6622', 'PACK19000000', 1, 5, 'Bera Final Customer', NULL, '100.00', 'N/A', '2023-06-13', '2023-06-13', NULL, 'Added from admin panel', NULL),
(3, 'INV-6492C8A5D47E1', 'TXN-6492C8A5D47EF', 'PACK19000000', 1, 7, 'Joy Kumar Bera', NULL, '100.00', 'N/A', '2023-06-21', '2023-06-21', NULL, 'Added from admin panel', NULL),
(4, 'INV-649409737C016', 'TXN-649409737C017', 'PACK19000000', 1, 8, 'Aranya', NULL, '100.00', 'N/A', '2023-06-22', '2023-06-22', NULL, 'Added from admin panel', NULL),
(5, 'INV-64941D0C40DC5', 'TXN-64941D0C40DC7', 'PACK19000001', 2, 9, 'Sfsdfshfgfhfgh', NULL, '200.00', 'N/A', '2023-06-22', '2023-06-22', NULL, 'Added from admin panel', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL,
  `emp_code` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `profile_url` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `address` text,
  `profile_photo` varchar(50) DEFAULT NULL,
  `supervisor_name` varchar(255) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('0','1','2') DEFAULT '1' COMMENT '0 inactive 1 active 2 delete',
  `user_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `emp_code`, `full_name`, `profile_url`, `user_id`, `email`, `mobile`, `address`, `profile_photo`, `supervisor_name`, `created_on`, `updated_on`, `status`, `user_type`) VALUES
(23, 'EMP23000022', 'Dev Pauls', 'dev-pauls', 120, NULL, '9875614442', 'Joka, Kolkata Pas', 'images.jpg', NULL, '2023-06-12', '2023-06-12 10:03:21', '2', '1'),
(24, 'EMP23000023', 'Bera Emp1', 'bera-emp1', 126, '', '9878908789', 'Joka, Kolkata', 'default.png', NULL, '2023-06-13', '2023-06-13 11:26:54', '1', '1'),
(25, 'EMP23000024', 'Bera EMP 2', 'bera-emp-2', 127, '', '9790987890', 'Noida, UP', 'default.png', NULL, '2023-06-13', '2023-06-13 11:27:20', '1', '1'),
(26, 'EMP23000025', 'Jinku Paul', 'jinku-paul', 134, NULL, '9876789876', 'Joka, Kolkata', 'images.jpg', NULL, '2023-06-21', '2023-06-21 11:45:18', '1', '1'),
(27, 'EMP23000026', 'Employee E', 'employee-e', 137, '', '1234567890', 'Ultadanga', 'download.jpg', NULL, '2023-06-22', '2023-06-22 10:22:08', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(100) DEFAULT NULL,
  `curr_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `customer_code` varchar(100) DEFAULT NULL,
  `package_code` varchar(100) DEFAULT NULL,
  `package_amount` varchar(100) DEFAULT NULL,
  `package_hours` int(11) DEFAULT NULL,
  `invoice_type` enum('Pending','Confirmed') DEFAULT 'Pending',
  `coupon_code` varchar(100) DEFAULT NULL,
  `coupon_type` enum('Discount','Time') DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_slug` varchar(255) NOT NULL,
  `parent` varchar(255) NOT NULL,
  `is_parent` varchar(255) NOT NULL COMMENT '0=parent,1=not'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `menu_name`, `menu_slug`, `parent`, `is_parent`) VALUES
(1, 'Packages Management', '#', '', '0'),
(2, 'Packages', 'package', 'Packages', '1'),
(3, 'Payment Management', '#', '', '0'),
(4, 'Order Package', 'orderpackage', 'Payment Management', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_access`
--

CREATE TABLE `tbl_menu_access` (
  `id` int(9) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `menu_ids` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_access`
--

INSERT INTO `tbl_menu_access` (`id`, `user_id`, `menu_ids`) VALUES
(1, 'SUP19000000', '[\"1\",\"3\",\"10\"]'),
(2, 'SUP19000025', '[\"1\",\"5\",\"6\",\"10\"]'),
(3, 'SUP23000026', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\"]'),
(4, 'SUP23000027', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\"]'),
(5, 'SUP23000028', '[\"1\",\"2\",\"3\",\"4\",\"5\"]'),
(6, 'SUP23000029', '[\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\"]'),
(7, 'SUP23000030', '[\"1\",\"2\",\"5\",\"6\",\"9\",\"10\"]'),
(8, 'SUP23000031', 'null'),
(9, 'SUP23000032', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\"]'),
(10, 'SUP23000033', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\"]'),
(11, 'SUP23000034', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\"]'),
(12, 'SUP23000035', '[\"2\"]'),
(13, 'SUP23000036', 'null'),
(14, 'SUP23000000', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"8\",\"9\"]'),
(15, 'SUP23000001', 'null'),
(16, 'SUP23000002', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"9\"]');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_child`
--

CREATE TABLE `tbl_menu_child` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_slug` varchar(255) NOT NULL,
  `parent_id` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_child`
--

INSERT INTO `tbl_menu_child` (`id`, `menu_name`, `menu_slug`, `parent_id`) VALUES
(1, 'Customer', 'customer', '1'),
(2, 'Service', 'service', '3'),
(3, 'Supervisor', 'supervisor', '2'),
(4, 'Employee', 'employee', '2'),
(5, 'Coupon', 'coupon/viewcoupon', '4'),
(6, 'Task', 'task', '5'),
(7, 'Packages', 'package', '6'),
(8, 'Order Package', 'orderpackage', '7'),
(9, 'Customer Invoice', 'invoice', '8'),
(10, 'Complete Payment', 'payment', '8'),
(11, 'Settings', 'settings', '9'),
(12, 'Custom Invoice', 'custominvoice', '8');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_parent`
--

CREATE TABLE `tbl_menu_parent` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_slug` varchar(255) NOT NULL,
  `menu_icon` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_parent`
--

INSERT INTO `tbl_menu_parent` (`id`, `menu_name`, `menu_slug`, `menu_icon`) VALUES
(1, 'Accounts', '#', '<i class=\"fa fa-user\" aria-hidden=\"true\"></i>'),
(2, 'Profile Management', '#', '<i class=\"fa fa-users\" aria-hidden=\"true\"></i>'),
(3, 'Service Management', '#', '<i class=\"fa fa-list\" aria-hidden=\"true\"></i>'),
(4, 'Coupon Management', '#', ' <i class=\"fa fa-files-o\" aria-hidden=\"true\"></i>'),
(5, 'Task Management', '#', '<i class=\"fa fa-tasks\" aria-hidden=\"true\"></i>'),
(6, 'Packages Management ', '#', '<i class=\"fa fa-th\"></i>'),
(7, 'Payment Management ', '#', '<i class=\"fa fa-money\" aria-hidden=\"true\"></i>'),
(8, 'Invoice Management', '#', ' <i class=\"fa fa-file-o\" aria-hidden=\"true\"></i>'),
(9, 'Settings', '#', '<i class=\"fa fa-cog\" aria-hidden=\"true\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `id` int(11) NOT NULL,
  `send_user_id` varchar(255) DEFAULT NULL,
  `receiver_user_id` varchar(100) DEFAULT NULL,
  `message` longtext,
  `attach_file` varchar(100) DEFAULT NULL,
  `task_code` varchar(100) DEFAULT NULL,
  `currently_date` date NOT NULL,
  `currently_time` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`id`, `send_user_id`, `receiver_user_id`, `message`, `attach_file`, `task_code`, `currently_date`, `currently_time`) VALUES
(1, 'AD001', 'CUST23000000', 'sdflsdflsdf', NULL, 'TASK23000000', '2023-06-14', '12:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `id` int(11) NOT NULL,
  `package_code` varchar(255) DEFAULT NULL,
  `package_name` text,
  `package_desp` varchar(255) DEFAULT NULL,
  `package_hours` int(11) DEFAULT NULL,
  `package_price` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`id`, `package_code`, `package_name`, `package_desp`, `package_hours`, `package_price`, `status`, `created_on`, `updated_on`) VALUES
(1, 'PACK19000000', 'Entire System', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 121, 100, 1, '2019-07-15', '2023-06-13 16:13:41'),
(2, 'PACK19000001', 'Gold / Platinum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 10, 200, 1, '2019-07-15', '2019-08-30 13:22:21'),
(3, 'PACK19000002', 'Website Creation', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 600, 5, 1, '2019-07-24', '2019-07-24 18:48:42'),
(4, 'PACK19000003', 'Stainless Steel', '', 1234, 30, 2, '2019-08-20', '2019-08-20 12:43:49'),
(5, 'PACK19000004', 'Regular', '', 10, 100, 1, '2019-09-04', '2019-09-04 18:42:32'),
(6, 'PACK19000005', 'Pay As You Like', 'Unlimited Validity', 1, 10, 2, '2019-09-06', '2019-09-06 10:11:09'),
(7, 'PACK23000006', 'Testing Package', '', 2, 500, 2, '2023-03-29', '2023-03-29 18:06:44'),
(8, 'PACK23000007', 'Test Package123 ', 'asdfghj', 5, 300, 2, '2023-04-03', '2023-04-03 11:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pass_recovery`
--

CREATE TABLE `tbl_pass_recovery` (
  `id` int(11) NOT NULL,
  `customer_id_fk` varchar(255) DEFAULT NULL,
  `retrieval_key` longtext,
  `status` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pass_recovery`
--

INSERT INTO `tbl_pass_recovery` (`id`, `customer_id_fk`, `retrieval_key`, `status`, `date`) VALUES
(13, 'CUST19000007', 'NDlmNDE0NzdmYTFiZmMzYjQ3OTJkNTIzM2I2YTY1OWY0YmMxNzcyNjkyZTlkNWZlN2RiMDYyNGEzMDA2NTJlYg==', 0, '2019-07-16 11:32:05'),
(14, 'CUST19000007', 'NDlmNDE0NzdmYTFiZmMzYjQ3OTJkNTIzM2I2YTY1OWY0YmMxNzcyNjkyZTlkNWZlN2RiMDYyNGEzMDA2NTJlYg==', 0, '2019-07-16 11:37:59'),
(15, 'CUST19000007', 'NDlmNDE0NzdmYTFiZmMzYjQ3OTJkNTIzM2I2YTY1OWY0YmMxNzcyNjkyZTlkNWZlN2RiMDYyNGEzMDA2NTJlYg==', 0, '2019-07-16 11:45:03'),
(16, 'CUST19000007', 'NDlmNDE0NzdmYTFiZmMzYjQ3OTJkNTIzM2I2YTY1OWY0YmMxNzcyNjkyZTlkNWZlN2RiMDYyNGEzMDA2NTJlYg==', 0, '2019-07-16 11:49:18'),
(17, 'CUST19000007', 'NDlmNDE0NzdmYTFiZmMzYjQ3OTJkNTIzM2I2YTY1OWY0YmMxNzcyNjkyZTlkNWZlN2RiMDYyNGEzMDA2NTJlYg==', 0, '2019-07-16 11:51:21'),
(18, 'CUST19000007', 'NDlmNDE0NzdmYTFiZmMzYjQ3OTJkNTIzM2I2YTY1OWY0YmMxNzcyNjkyZTlkNWZlN2RiMDYyNGEzMDA2NTJlYg==', 0, '2019-07-16 11:52:18'),
(19, 'CUST19000007', 'NDlmNDE0NzdmYTFiZmMzYjQ3OTJkNTIzM2I2YTY1OWY0YmMxNzcyNjkyZTlkNWZlN2RiMDYyNGEzMDA2NTJlYg==', 0, '2019-07-16 11:52:47'),
(20, 'CUST19000007', 'NDlmNDE0NzdmYTFiZmMzYjQ3OTJkNTIzM2I2YTY1OWY0YmMxNzcyNjkyZTlkNWZlN2RiMDYyNGEzMDA2NTJlYg==', 0, '2019-07-16 11:53:12'),
(21, 'CUST19000007', 'NDlmNDE0NzdmYTFiZmMzYjQ3OTJkNTIzM2I2YTY1OWY0YmMxNzcyNjkyZTlkNWZlN2RiMDYyNGEzMDA2NTJlYg==', 1, '2019-07-16 12:02:52'),
(22, 'CUST19000016', 'NDlmNDE0NzdmYTFiZmMzYjQ3OTJkNTIzM2I2YTY1OWY0YmMxNzcyNjkyZTlkNWZlN2RiMDYyNGEzMDA2NTJlYg==', 1, '2019-07-18 13:38:17'),
(23, 'CUST19000016', 'NDlmNDE0NzdmYTFiZmMzYjQ3OTJkNTIzM2I2YTY1OWY0YmMxNzcyNjkyZTlkNWZlN2RiMDYyNGEzMDA2NTJlYg==', 1, '2019-07-18 13:39:50'),
(24, 'CUST19000016', 'NDlmNDE0NzdmYTFiZmMzYjQ3OTJkNTIzM2I2YTY1OWY0YmMxNzcyNjkyZTlkNWZlN2RiMDYyNGEzMDA2NTJlYg==', 1, '2019-07-18 14:04:18'),
(25, 'CUST19000016', 'NDlmNDE0NzdmYTFiZmMzYjQ3OTJkNTIzM2I2YTY1OWY0YmMxNzcyNjkyZTlkNWZlN2RiMDYyNGEzMDA2NTJlYg==', 1, '2019-07-18 14:05:25'),
(26, 'CUST19000016', 'NDlmNDE0NzdmYTFiZmMzYjQ3OTJkNTIzM2I2YTY1OWY0YmMxNzcyNjkyZTlkNWZlN2RiMDYyNGEzMDA2NTJlYg==', 1, '2019-07-18 14:05:37'),
(27, 'CUST19000016', 'NDlmNDE0NzdmYTFiZmMzYjQ3OTJkNTIzM2I2YTY1OWY0YmMxNzcyNjkyZTlkNWZlN2RiMDYyNGEzMDA2NTJlYg==', 1, '2019-07-18 14:07:53'),
(28, 'CUST19000016', 'NDlmNDE0NzdmYTFiZmMzYjQ3OTJkNTIzM2I2YTY1OWY0YmMxNzcyNjkyZTlkNWZlN2RiMDYyNGEzMDA2NTJlYg==', 1, '2019-07-18 14:12:45'),
(29, 'CUST19000016', 'NDlmNDE0NzdmYTFiZmMzYjQ3OTJkNTIzM2I2YTY1OWY0YmMxNzcyNjkyZTlkNWZlN2RiMDYyNGEzMDA2NTJlYg==', 1, '2019-07-18 14:14:56'),
(30, 'CUST19000016', 'NDlmNDE0NzdmYTFiZmMzYjQ3OTJkNTIzM2I2YTY1OWY0YmMxNzcyNjkyZTlkNWZlN2RiMDYyNGEzMDA2NTJlYg==', 1, '2019-07-18 14:19:00'),
(31, 'CUST19000016', 'NDlmNDE0NzdmYTFiZmMzYjQ3OTJkNTIzM2I2YTY1OWY0YmMxNzcyNjkyZTlkNWZlN2RiMDYyNGEzMDA2NTJlYg==', 1, '2019-07-18 14:23:12'),
(32, 'CUST19000001', 'NDlmNDE0NzdmYTFiZmMzYjQ3OTJkNTIzM2I2YTY1OWY0YmMxNzcyNjkyZTlkNWZlN2RiMDYyNGEzMDA2NTJlYg==', 1, '2019-07-18 15:06:04'),
(33, 'CUST19000035', 'NDlmNDE0NzdmYTFiZmMzYjQ3OTJkNTIzM2I2YTY1OWY0YmMxNzcyNjkyZTlkNWZlN2RiMDYyNGEzMDA2NTJlYg==', 1, '2019-09-03 14:50:37'),
(34, 'CUST19000041', 'NDlmNDE0NzdmYTFiZmMzYjQ3OTJkNTIzM2I2YTY1OWY0YmMxNzcyNjkyZTlkNWZlN2RiMDYyNGEzMDA2NTJlYg==', 1, '2019-10-07 09:51:39'),
(35, 'CUST23000049', 'NDlmNDE0NzdmYTFiZmMzYjQ3OTJkNTIzM2I2YTY1OWY0YmMxNzcyNjkyZTlkNWZlN2RiMDYyNGEzMDA2NTJlYg==', 1, '2023-04-04 14:58:30'),
(36, 'CUST23000049', 'NDlmNDE0NzdmYTFiZmMzYjQ3OTJkNTIzM2I2YTY1OWY0YmMxNzcyNjkyZTlkNWZlN2RiMDYyNGEzMDA2NTJlYg==', 1, '2023-04-04 14:58:47'),
(37, 'SUP23000034', 'NDlmNDE0NzdmYTFiZmMzYjQ3OTJkNTIzM2I2YTY1OWY0YmMxNzcyNjkyZTlkNWZlN2RiMDYyNGEzMDA2NTJlYg==', 1, '2023-05-09 18:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `item_number` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_amount` double(10,2) NOT NULL,
  `payment_currency` varchar(255) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `customer_code` varchar(255) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `item_number`, `item_name`, `payment_status`, `payment_amount`, `payment_currency`, `txn_id`, `invoice_no`, `customer_code`, `payer_email`, `create_at`) VALUES
(8, 'PACK19000001', 'Gold / Platinum', 'Completed', 610.20, 'INR', '0SG226827L612143M', 'VL-INV16901', 'CUST19000020', 'debadrita@desuntechnology.in', '2019-07-31 10:58:53'),
(9, 'PACK19000001', 'Gold / Platinum', 'Completed', 610.20, 'INR', '9G166862DD5327458', 'VL-INV20804', 'CUST19000020', 'debadrita@desuntechnology.in', '2019-07-31 11:23:00'),
(10, 'PACK19000001', 'Gold / Platinum', 'Completed', 610.20, 'INR', '9AK172092N330061S', 'VL-INV21701', 'CUST19000020', 'debadrita@desuntechnology.in', '2019-07-31 11:28:06'),
(11, 'PACK19000001', 'Gold / Platinum', 'Completed', 610.20, 'INR', '5PE63029975186254', 'VL-INV95074', 'CUST19000020', 'debadrita@desuntechnology.in', '2019-07-31 11:34:00'),
(12, 'PACK19000002', 'Website Creation', 'Completed', 5400.00, 'INR', '6AV20133CA668372V', 'VL-INV48506', 'CUST19000020', 'debadrita@desuntechnology.in', '2019-07-31 11:44:56'),
(14, 'PACK19000000', 'Entire System', 'Completed', 5678.00, 'INR', '7BD716945U987903L', 'VL-INV76377', 'CUST19000020', 'debadrita@desuntechnology.in', '2019-08-06 08:10:30'),
(15, 'PACK19000000', 'Entire System', 'Completed', 5678.00, 'INR', '2UD467805S509261L', 'VL-INV87604', 'CUST19000020', 'debadrita@desuntechnology.in', '2019-08-06 08:22:24'),
(16, 'PACK19000001', 'Gold / Platinum', 'Completed', 678.00, 'INR', '2HN994866P938512C', 'VL-INV23639', 'CUST19000020', 'debadrita@desuntechnology.in', '2019-08-06 08:30:27'),
(17, 'PACK19000001', 'Gold / Platinum', 'Completed', 678.00, 'INR', '38K25930M8790432R', 'VL-INV61009', 'CUST19000020', 'debadrita@desuntechnology.in', '2019-08-06 08:32:55'),
(19, 'PACK19000001', 'Gold / Platinum', 'Completed', 678.00, 'INR', '2PR21911HC734263P', 'VL-INV29517', 'CUST19000020', 'debadrita@desuntechnology.in', '2019-08-06 08:37:13'),
(20, 'PACK19000001', 'Gold / Platinum', 'Completed', 678.00, 'INR', '0RP44797NN4287405', 'VL-INV83991', 'CUST19000020', 'debadrita@desuntechnology.in', '2019-08-06 08:39:35'),
(21, 'PACK19000000', 'Entire System', 'Completed', 10.00, 'INR', '7KS988678M1890810', 'VL-INV37018', 'CUST19000020', 'debadrita@desuntechnology.in', '2019-08-06 11:01:32'),
(22, 'PACK19000000', 'Entire System', 'Completed', 10.00, 'INR', '3B757148SY733105S', 'VL-INV28965', 'CUST19000020', 'debadrita@desuntechnology.in', '2019-08-06 11:01:46'),
(23, 'PACK19000000', 'Entire System', 'Completed', 10.00, 'INR', '76401281PT7236410', 'VL-INV25875', 'CUST19000020', 'debadrita@desuntechnology.in', '2019-08-06 11:02:01'),
(24, 'PACK19000000', 'Entire System', 'Completed', 10.00, 'INR', '0GW10296Y8412440T', 'VL-INV9252', 'CUST19000020', 'debadrita@desuntechnology.in', '2019-08-06 11:06:14'),
(25, 'PACK19000000', 'Entire System', 'Completed', 10.00, 'INR', '5R196296MK7288038', 'VL-INV20867', 'CUST19000020', 'debadrita@desuntechnology.in', '2019-08-06 11:07:10'),
(26, 'PACK19000000', 'Entire System', 'Completed', 10.00, 'INR', '8MA5692683400024P', 'VL-INV51807', 'CUST19000020', 'debadrita@desuntechnology.in', '2019-08-06 11:11:13'),
(27, 'PACK19000001', 'Gold / Platinum', 'Completed', 20.00, 'INR', '4ET96169J5115633W', 'VL-INV46195', 'CUST19000020', 'debadrita@desuntechnology.in', '2019-08-06 11:12:56'),
(28, 'PACK19000000', 'Entire System', 'Completed', 10.00, 'INR', '4TY44268FV727733M', 'VL-INV22045', 'CUST19000020', 'debadrita@desuntechnology.in', '2019-08-06 11:13:45'),
(29, 'PACK19000002', 'Website Creation', 'Completed', 5.00, 'INR', '2X700797D76993314', 'VL-INV94905', 'CUST19000020', 'debadrita@desuntechnology.in', '2019-08-06 11:15:42'),
(30, 'PACK19000000', 'Entire System', 'Completed', 10.00, 'INR', '1D902105M9033433C', 'VL-INV94480', 'CUST19000020', 'debadrita@desuntechnology.in', '2019-08-07 06:28:45'),
(31, 'PACK19000000', 'Entire System', 'Completed', 10.00, 'INR', '47K51051LL5851134', 'VL-INV95473', 'CUST19000020', 'debadrita@desuntechnology.in', '2019-08-07 06:33:01'),
(32, 'PACK19000000', 'Entire System', 'Completed', 10.00, 'INR', '0VJ31228HJ043684S', 'VL-INV14855', 'CUST19000020', 'debadrita@desuntechnology.in', '2019-08-07 06:46:17'),
(33, 'PACK19000002', 'Website Creation', 'Completed', 5.00, 'INR', '6HK38751NB164305K', 'VL-INV11930', 'CUST19000020', 'debadrita@desuntechnology.in', '2019-08-07 07:16:35'),
(34, 'PACK19000002', 'Website Creation', 'Completed', 5.00, 'INR', '5JK32003001874315', 'VL-INV26310', 'CUST19000020', 'debadrita@desuntechnology.in', '2019-08-07 07:45:13'),
(36, 'PACK19000000', 'Entire System', 'Completed', 10.00, 'INR', '3VD05157NU951200B', 'VL-INV94', 'CUST19000028', 'debadrita@desuntechnology.in', '2019-08-19 07:27:18'),
(37, 'PACK19000000', 'Entire System', 'Completed', 10.00, 'INR', '23T93429WD5112149', 'VL-INV69972', 'CUST19000028', 'debadrita@desuntechnology.in', '2019-08-19 07:43:46'),
(38, 'PACK19000001', 'Gold / Platinum', 'Completed', 200.00, 'INR', '57H40508K9294025N', 'VL-INV38672', 'CUST19000031', 'debadrita@desuntechnology.in', '2019-08-30 08:18:15'),
(39, 'PACK19000000', 'Entire System', 'Completed', 100.00, 'INR', '5JP73219LX178872F', 'VL-INV61019', 'CUST19000032', 'debadrita@desuntechnology.in', '2019-09-03 08:35:11'),
(40, 'PACK19000000', 'Entire System', 'Completed', 100.00, 'INR', '39M59256RG027303H', 'VL-INV94477', 'CUST19000035', 'debadrita@desuntechnology.in', '2019-09-03 10:00:07'),
(41, 'PACK19000000', 'Entire System', 'Completed', 100.00, 'INR', '878434442B819392V', 'VL-INV66070', 'CUST19000035', 'debadrita@desuntechnology.in', '2019-09-04 13:26:29'),
(42, 'PACK19000004', 'Regular', 'Completed', 100.00, 'INR', '27538803V6960604K', 'VL-INV25355', 'CUST19000035', 'debadrita@desuntechnology.in', '2019-09-04 13:36:40'),
(43, 'PACK19000000', 'Entire System', 'Completed', 100.00, 'INR', '9B2606483C1396624', 'VL-INV43883', 'CUST19000000', 'debadrita@desuntechnology.in', '2019-09-07 06:50:27'),
(44, 'PACK19000001', 'Gold / Platinum', 'Completed', 200.00, 'INR', '2DJ60061T13951616', 'VL-INV1423', 'CUST19000040', 'debadrita@desuntechnology.in', '2019-09-24 11:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paypal`
--

CREATE TABLE `tbl_paypal` (
  `id` int(11) NOT NULL,
  `paypal_business_name` varchar(100) DEFAULT NULL,
  `business_email` varchar(100) DEFAULT NULL,
  `paypal_url` varchar(100) DEFAULT NULL,
  `paypal_status` enum('sandbox','live') DEFAULT NULL,
  `currency_code` enum('INR','USD') DEFAULT NULL,
  `notify_url` varchar(100) DEFAULT NULL,
  `cancel_url` varchar(100) DEFAULT NULL,
  `return_url` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_paypal`
--

INSERT INTO `tbl_paypal` (`id`, `paypal_business_name`, `business_email`, `paypal_url`, `paypal_status`, `currency_code`, `notify_url`, `cancel_url`, `return_url`) VALUES
(1, 'Sanjib Sir', 'sanjib@desuntechnology.in', 'https://www.sandbox.paypal.com/cgi-bin/webscr', 'sandbox', 'INR', 'http://stage.rkshopkart.com/crm/notify.php', 'http://stage.rkshopkart.com/crm/client/invoice/paypal_cancel', 'http://stage.rkshopkart.com/crm/client/invoice/paypal_return');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `id` int(11) NOT NULL,
  `service_id` varchar(255) DEFAULT NULL,
  `service_name` text,
  `service_desp` varchar(255) DEFAULT NULL,
  `service_type` text,
  `ser_status` int(11) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`id`, `service_id`, `service_name`, `service_desp`, `service_type`, `ser_status`, `created_on`, `updated_on`) VALUES
(1, 'SER19000000', 'Content Writing', 'test', 'Postpaid', 1, '2019-07-15', '2023-03-29 13:26:32'),
(2, 'SER19000001', 'SEO Service', 'Seo ghnm', 'Prepaid', 1, '2019-07-15', '2019-09-09 19:48:37'),
(3, 'SER19000002', 'Web Development', 'srfgrfyjht', 'Prepaid', 1, '2019-07-15', '2019-07-15 13:25:19'),
(4, 'SER19000003', 'App Development', 'sdhrfyhj', 'Prepaid', 1, '2019-07-18', '2019-07-18 12:11:37'),
(5, 'SER19000004', 'Email Organization', 'Text messaging has again become very popular in the 21st century, particularly now, in the second decade of the century. The trend was started by the advent of cell phones', 'Prepaid', 1, '2019-08-02', '2019-08-02 16:51:53'),
(6, 'SER19000005', 'Test Services', 'Test Servicessas', 'Prepaid', 2, '2019-08-30', '2019-08-30 13:01:08'),
(7, 'SER19000006', 'Designing', '', 'Prepaid', 2, '2019-09-04', '2019-09-04 18:15:52'),
(8, 'SER23000007', 'Advertisement', 'Testing services', 'Prepaid', 1, '2023-03-29', '2023-03-29 15:56:29'),
(9, 'SER23000008', '*****', '', 'Prepaid', 2, '2023-05-19', '2023-05-19 15:58:13'),
(10, 'SER23000009', '***875654', '', 'Prepaid', 2, '2023-05-19', '2023-05-19 15:59:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(11) NOT NULL,
  `send_new_reg_and_chat_trans_email` varchar(255) NOT NULL,
  `payment_and_paypal_email` varchar(255) NOT NULL,
  `new_task_email` varchar(255) NOT NULL,
  `paypal_secret_key` varchar(255) NOT NULL,
  `paypal_business_email` varchar(255) NOT NULL,
  `paypal_business_name` varchar(255) NOT NULL,
  `paypal_url` varchar(255) NOT NULL,
  `paypal_status` varchar(255) NOT NULL,
  `currency_code` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `send_new_reg_and_chat_trans_email`, `payment_and_paypal_email`, `new_task_email`, `paypal_secret_key`, `paypal_business_email`, `paypal_business_name`, `paypal_url`, `paypal_status`, `currency_code`) VALUES
(1, 'Bswnth79@gmail.com', 'Bswnth79@gmail.com', 'Bswnth79@gmail.com', 'Sdf', 'Sanjib@desuntechnology.in', 'Sanjib Sir', 'Https://www.sandbox.paypal.com/cgi-bin/webscr', 'Sandbox', 'USD');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supervisor`
--

CREATE TABLE `tbl_supervisor` (
  `id` int(11) NOT NULL,
  `sup_code` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `profile_url` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `profile_photo` varchar(50) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('0','1','2') DEFAULT '1' COMMENT '0 inactive 1 active 2 delete',
  `user_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supervisor`
--

INSERT INTO `tbl_supervisor` (`id`, `sup_code`, `user_id`, `full_name`, `profile_url`, `email`, `mobile`, `profile_photo`, `created_on`, `updated_on`, `status`, `user_type`) VALUES
(1, 'SUP23000000', 121, 'Bera SUP Two', 'bera-sup-two', 'bera@gmail.com', '7898789879', 'images.jpg', '2023-06-12', '2023-06-12 10:42:34', '1', '3'),
(2, 'SUP23000001', 132, 'SUP Threefff444555', 'sup-threefff444555', 'sup.three@gmail.com', '8765789876', '6492dd05ad065.png', '2023-06-21', '2023-06-21 11:20:37', '1', '3'),
(3, 'SUP23000002', 133, 'SUP Final', 'sup-final', 'sup.final@gmail.com', '9876789098', '64941f46f0ed7.jpg', '2023-06-22', '2023-06-22 10:19:26', '1', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task`
--

CREATE TABLE `tbl_task` (
  `id` int(11) NOT NULL,
  `task_id` varchar(100) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `task_name` varchar(100) DEFAULT NULL,
  `service_code` varchar(100) DEFAULT NULL,
  `task_desp` longtext,
  `attach_file` varchar(255) DEFAULT NULL,
  `task_by` enum('Portal','Email','Phone','Chat') NOT NULL,
  `task_priority` enum('Normal','Urgent') DEFAULT 'Normal',
  `sup_name` varchar(100) DEFAULT NULL,
  `task_hours` int(100) DEFAULT NULL,
  `emp_details` longtext,
  `task_status` enum('Open','Follow Up','Response Needed','Closed','In Progress','Pipeline','Recurring') DEFAULT 'Open',
  `customer_code` varchar(100) DEFAULT NULL,
  `consume_time` int(11) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_task`
--

INSERT INTO `tbl_task` (`id`, `task_id`, `customer_id`, `task_name`, `service_code`, `task_desp`, `attach_file`, `task_by`, `task_priority`, `sup_name`, `task_hours`, `emp_details`, `task_status`, `customer_code`, `consume_time`, `created_on`, `updated_on`, `status`) VALUES
(1, 'TASK23000000', NULL, 'Create A Website', 'SER19000000', 'create a website', '[\"Terms_and_Conditions_Definitions_and_Responsibilities_(3).docx\"]', 'Portal', 'Normal', 'SUP23000000', 0, '[\"EMP23000024\"]', 'Open', 'CUST23000000', 200, '2023-06-13', '2023-06-21 00:52:34', 1),
(2, 'TASK23000001', NULL, 'Create A Logo', 'SER19000006', 'create a logo', NULL, 'Email', 'Urgent', NULL, 0, '[\"EMP23000023\"]', 'Open', 'CUST23000000', 50, '2023-06-13', '2023-06-14 11:37:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_time_wallet`
--

CREATE TABLE `tbl_time_wallet` (
  `id` int(11) NOT NULL,
  `trans_id` varchar(255) DEFAULT NULL,
  `hours` varchar(255) DEFAULT NULL,
  `remain_hours` varchar(255) DEFAULT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `cus_id` varchar(255) DEFAULT NULL,
  `task_id` varchar(255) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `user_code` varchar(50) DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `profile_url` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `profile_photo` varchar(255) NOT NULL DEFAULT 'default.png',
  `ecode` varchar(255) DEFAULT NULL,
  `mcode` varchar(255) DEFAULT NULL,
  `is_mobile_verified` enum('0','1') NOT NULL DEFAULT '0',
  `is_email_verified` enum('0','1') NOT NULL DEFAULT '0',
  `status` enum('0','1','2') DEFAULT '1' COMMENT '0 no 1 yes 2 delete',
  `created_by` varchar(110) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `user_code`, `user_type`, `full_name`, `profile_url`, `email`, `mobile`, `password`, `profile_photo`, `ecode`, `mcode`, `is_mobile_verified`, `is_email_verified`, `status`, `created_by`, `created_on`, `updated_on`) VALUES
(1, 'AD001', '4', 'CRM Admin', 'crm-admin', 'admin@gmail.com', '7498143684', '0192023a7bbd73250516f069df18b500', '6492f623aa30e.jpg', NULL, NULL, '1', '1', '1', 'AD001', NULL, '2023-06-28 13:15:05'),
(86, 'CUST23000048', '2', 'PravinQA', 'pravinqa', 'pravin.desun@gmail.com', '123456789123', '0192023a7bbd73250516f069df18b500', '', 'MmUwZDdjNmJkYmE2MjRiMDVjMWJhOGMwNGUzYjgyMDViNmY4NDVkMDlhMGQ1OWFkNjFkZWRhZDQ3MjdhZTEzMw==', NULL, '1', '1', '1', 'SUP23000027', '2023-03-29', '2023-06-28 13:15:05'),
(120, 'EMP23000022', '1', 'Dev Pauls', 'dev-pauls', NULL, '9875614442', '0192023a7bbd73250516f069df18b500', '', 'NDI3MzFjNWE5ZWM2ZDQyNTRkNDQ3NTkxNGYxYWExZGZhODNhMGE3MzM3ZDc2MGM5OWYzNDBlOGMzNGNhOGE3ZA==', NULL, '1', '1', '1', 'AD001', '2023-06-12', '2023-06-28 13:15:05'),
(121, 'SUP23000000', '3', 'Bera SUP Two', 'bera-sup-two', 'bera@gmail.com', '7898789879', '0192023a7bbd73250516f069df18b500', 'images.jpg', 'Nzg4NzlhYmNkMWM0MTBjMjcyZmNjZTdjNGQyNzNmODVkMWVjMWMwMWQxNDQ0OGQxNWFmNTllY2U4MjBlMTJhMQ==', NULL, '1', '0', '1', 'AD001', '2023-06-12', '2023-06-28 13:15:05'),
(122, 'CUST23000000', '2', 'Bera Cust One', 'bera-cust-one', 'bera.cust.1@crm.com', '7898768909', '0192023a7bbd73250516f069df18b500', '', 'YTNkYTY4NjcyMGQyOWY3ZjA0YjcxNDg3NWI2MjhjNzg5OWJlZjNkYzc4NDZlMjRjODVmYjhjMzdmNGI0ZWU4Zg==', NULL, '1', '1', '1', 'AD001', '2023-06-13', '2023-06-28 13:15:05'),
(123, 'CUST23000001', '2', 'Bera Cust Two', 'bera-cust-two', 'bera.cust2@crm.com', '9870987679', '0192023a7bbd73250516f069df18b500', 'default.png', 'MmMwZDkwZGIwMzNkNDQ4OTg3YzY2ZjVjZjFiYjg4ZmZhMzY1MDBhMmM4NzBkOTY2Y2Q2MjkxNjMwMDlmOGU2Zg==', NULL, '1', '0', '1', 'AD001', '2023-06-13', '2023-06-28 13:15:05'),
(124, 'CUST23000002', '2', 'Bera Cust 3', 'bera-cust-3', 'beracust3@crm.com', '2345678765', '0192023a7bbd73250516f069df18b500', 'default.png', 'Yjc2MjgwYzYwZjUwODU3OGVmZGRjMGRkNWEyM2NjNDY2MWNiZjM2MDU0ZmRiN2I2MmJlNDQwZWI4NGQ2MmMxMQ==', NULL, '1', '0', '0', 'AD001', '2023-06-13', '2023-06-28 13:15:05'),
(125, 'CUST23000003', '2', 'Bera Cust 4', 'bera-cust-4', 'beracust4@crm.com', '9878987678', '0192023a7bbd73250516f069df18b500', 'default.png', 'NjQ3MThlMDhhZTJlMjZiNTZiMzBjMjcwNjc5NzRiN2M2YTg1ZWQ4NjhmMzk4NWIwMjFhODM0YzBiYThhMmQxMg==', NULL, '1', '0', '1', 'AD001', '2023-06-13', '2023-06-28 13:15:05'),
(126, 'EMP23000023', '1', 'Bera Emp1', 'bera-emp1', NULL, '9878908789', '0192023a7bbd73250516f069df18b500', 'default.png', 'YTE5MWRlNGE5MDQxZjRjYWNmZmFmZWRlY2RhNDRjMzgzZWJmMWIyNzFmMGMxOWVhYmEyNTgyMzk1ODg2OGQ4Yg==', NULL, '1', '0', '1', 'AD001', '2023-06-13', '2023-06-28 13:15:05'),
(127, 'EMP23000024', '1', 'Bera EMP 2', 'bera-emp-2', NULL, '9790987890', '0192023a7bbd73250516f069df18b500', 'default.png', 'MWYxNzBiNzQ0MzQzMWQwYmVmNDY5ZTU4OWNkNjBhOWYwNmRmMmQxNDg2NTY4Y2RmYzc2OTEyM2ZlODdkNTY0Mw==', NULL, '1', '0', '1', 'AD001', '2023-06-13', '2023-06-28 13:15:05'),
(128, 'CUST23000004', '2', 'Final Customer', 'final-customer', 'final@gmail.com', '8567865456', '0192023a7bbd73250516f069df18b500', 'default.png', 'NTEyODY3Mjg5MjExYzE0YTliM2ZiNTM4OTQ1NzNlMzJhMWY3ZmRlNWRjZjlmMzU3Zjg1NDkxN2QyZmI2NDc0OA==', NULL, '1', '0', '1', 'AD001', '2023-06-13', '2023-06-28 13:15:05'),
(129, 'CUST23000004', '2', 'Bera Final Customer', 'bera-final-customer', 'bera1@gmail.com', '2345321343', '0192023a7bbd73250516f069df18b500', 'default.png', 'OTAwYmFiY2M5NzZlMmU0OTc2ZmFhN2FjNjQzYTc3YWRlYjNkYTQzM2FhMjM0ZGE1NGI5OTEzOTdjNjdlNWVmNA==', NULL, '1', '0', '1', 'AD001', '2023-06-13', '2023-06-28 13:15:05'),
(131, 'CUST23000005', '2', 'Joy Kumar Bera', 'joy-kumar-bera', 'joy.desuntech@gmail.com', '9875614352', '0192023a7bbd73250516f069df18b500', '', 'NzQxMjZjZThlODczOTUzOGI1ZTAxOTg1NTQ4NWQ0ZDAyNjhiNTZmOGI2MDg3MTZkNDFhYzE4YzUzMGQ0ZmQzMA==', NULL, '1', '1', '1', 'AD001', '2023-06-21', '2023-06-28 13:15:05'),
(132, 'SUP23000001', '3', 'SUP Threefff444555', 'sup-threefff444555', 'sup.three@gmail.com', '8765789876', '0192023a7bbd73250516f069df18b500', '6492dd05ad065.png', 'OGZlNWYwYzM2Y2YzMGQxZWU4MThlNjAzZWQxMWY3MjMzNzFiYmJiN2E1ZTlkNTUzYjkzZDA2NzEzMjJkZTJjNg==', NULL, '1', '0', '1', 'AD001', '2023-06-21', '2023-06-28 13:15:05'),
(133, 'SUP23000002', '3', 'SUP Final', 'sup-final', 'sup.final@gmail.com', '9876789098', '0192023a7bbd73250516f069df18b500', '', 'YTE0ZWU1MTU1ZmFkYmJhMTE4NjcyNjMzNzE0OWQ0YmY4ZGJjMTQyOTA2MDc1ZjQxMzcwZTYxMjc3MzNjMmYzNA==', NULL, '1', '0', '1', 'AD001', '2023-06-21', '2023-06-28 13:15:05'),
(134, 'EMP23000025', '1', 'Jinku Paul', 'jinku-paul', NULL, '9876789876', '0192023a7bbd73250516f069df18b500', '', 'OGRjMDI5ZmVhMmQ1Yjc2YjM1Y2Q4M2I0MTU5ZTJlODBlYjQ1Yzg2NGVkM2Y3MTYyNjgwY2E2NDkxMzNmMmRiOQ==', NULL, '1', '1', '1', 'AD001', '2023-06-21', '2023-06-28 13:15:05'),
(135, 'CUST23000007', '2', 'Aranya', 'aranya', 'aranya.desuntech@gmail.com', '9874259359', '0192023a7bbd73250516f069df18b500', '649409737b9f3.png', 'NzIxODY5NWU4YjYwMDczMWVhOGFhYThkZjBiOTU3YTg5NjZiZDdkOWUyMTU1MWJhYjJmY2UxMWM4NDVhYjgyNQ==', NULL, '1', '0', '1', 'AD001', '2023-06-22', '2023-06-28 13:15:05'),
(136, 'CUST23000008', '2', 'Sfsdfshfgfhfgh', 'sfsdfshfgfhfgh', 'a@gmail.com', '1234567890', '0192023a7bbd73250516f069df18b500', '64941d0c402a9.png', 'ZDMxYTI0Yzc3Y2VmMjBkNDg1MjY3MTNhZTk4Mjk4MmRjMTJkMWI0MjcwYjUwZGJhNWYzZDIxZWVhZDI4NzU5MQ==', NULL, '1', '0', '1', 'AD001', '2023-06-22', '2023-06-28 13:15:05'),
(137, 'EMP23000026', '1', 'Employee E', 'employee-e', NULL, '1234567890', '0192023a7bbd73250516f069df18b500', 'download.jpg', 'ZGRiZDA0ZjhiNWQ3NWI5ZTgwMmQ2YTI4ZGQzM2QxN2JlOGY2YjkwMGQ4YzY0ZjYyOTc3OTZmNDg5ZDUxNjIwMA==', NULL, '1', '0', '1', 'AD001', '2023-06-22', '2023-06-28 13:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '0 = no 1 yes 2 delete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`id`, `type_name`, `status`) VALUES
(1, 'Employees', 1),
(2, 'Customer', 1),
(3, 'Supervisor', 1),
(4, 'Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_weblogin`
--

CREATE TABLE `tbl_weblogin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_weblogin`
--

INSERT INTO `tbl_weblogin` (`id`, `email`, `website`, `password`, `created_by`, `customer_id`, `created_on`, `updated_on`, `updated_by`, `status`) VALUES
(1, 'bera1111', 'www.google.com', 'bera1234', 'AD001', 1, '2023-06-14', '2023-06-21 13:00:19', 'CUST23000000', 1),
(2, 'UTT111', 'dev.to', 'bera1234', 'AD001', 1, '2023-06-14', NULL, '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pages_mng`
--
ALTER TABLE `pages_mng`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_coupons`
--
ALTER TABLE `tbl_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_coupon_apply`
--
ALTER TABLE `tbl_coupon_apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_tbl_customer` (`user_id`),
  ADD KEY `fk_active_invoice_id_tbl_customer` (`active_invoice_id`);

--
-- Indexes for table `tbl_cust_invoice`
--
ALTER TABLE `tbl_cust_invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer_id_tbl_cust_invoice` (`customer_id`),
  ADD KEY `fk_package_id_tbl_cust_invoice` (`package_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_tbl_employee` (`user_id`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_access`
--
ALTER TABLE `tbl_menu_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_child`
--
ALTER TABLE `tbl_menu_child`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_parent`
--
ALTER TABLE `tbl_menu_parent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pass_recovery`
--
ALTER TABLE `tbl_pass_recovery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_paypal`
--
ALTER TABLE `tbl_paypal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_supervisor`
--
ALTER TABLE `tbl_supervisor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_tbl_supervisor` (`user_id`);

--
-- Indexes for table `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer_id_tbl_task` (`customer_id`);

--
-- Indexes for table `tbl_time_wallet`
--
ALTER TABLE `tbl_time_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_tbl_users` (`email`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_weblogin`
--
ALTER TABLE `tbl_weblogin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer_id_tbl_weblogin` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pages_mng`
--
ALTER TABLE `pages_mng`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_coupons`
--
ALTER TABLE `tbl_coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_coupon_apply`
--
ALTER TABLE `tbl_coupon_apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_cust_invoice`
--
ALTER TABLE `tbl_cust_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_menu_access`
--
ALTER TABLE `tbl_menu_access`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_menu_child`
--
ALTER TABLE `tbl_menu_child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_menu_parent`
--
ALTER TABLE `tbl_menu_parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_pass_recovery`
--
ALTER TABLE `tbl_pass_recovery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_paypal`
--
ALTER TABLE `tbl_paypal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_supervisor`
--
ALTER TABLE `tbl_supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_time_wallet`
--
ALTER TABLE `tbl_time_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_weblogin`
--
ALTER TABLE `tbl_weblogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD CONSTRAINT `fk_active_invoice_id_tbl_customer` FOREIGN KEY (`active_invoice_id`) REFERENCES `tbl_cust_invoice` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_id_tbl_customer` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_cust_invoice`
--
ALTER TABLE `tbl_cust_invoice`
  ADD CONSTRAINT `fk_customer_id_tbl_cust_invoice` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_package_id_tbl_cust_invoice` FOREIGN KEY (`package_id`) REFERENCES `tbl_package` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD CONSTRAINT `fk_user_id_tbl_employee` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_supervisor`
--
ALTER TABLE `tbl_supervisor`
  ADD CONSTRAINT `fk_user_id_tbl_supervisor` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD CONSTRAINT `fk_customer_id_tbl_task` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_weblogin`
--
ALTER TABLE `tbl_weblogin`
  ADD CONSTRAINT `fk_customer_id_tbl_weblogin` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
