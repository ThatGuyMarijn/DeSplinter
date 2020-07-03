-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 09:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desplinter`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `ID` varchar(256) NOT NULL,
  `UserID` varchar(256) NOT NULL,
  `TeacherID` varchar(256) NOT NULL,
  `Activity` varchar(256) NOT NULL,
  `Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`ID`, `UserID`, `TeacherID`, `Activity`, `Time`) VALUES
('7A201FAA-39AB-AD61-0235-8B4A6C204CF9', 'DFA4B270-CE91-30A7-F78F-68872BE65ADA', '137A5E51-26AD-2D06-2C93-89CF1BA1A91C', 'nogeenaccount heeft zojuist een opdracht voltooid', '2020-06-29 14:27:43'),
('C400A0FA-C547-E6A4-C195-7F4D33F48D90', 'AFC1AB67-89DE-0D75-3F6F-68964CC82B07', '137A5E51-26AD-2D06-2C93-89CF1BA1A91C', 'marijndeijnen heeft zojuist een opdracht voltooid', '2020-06-29 13:01:28'),
('F93BA3A6-A081-D2B9-CD6F-0BB2A2675C1A', '28F09366-FEAD-2238-49E8-AE7F150DA8E6', 'A2F7759C-BD02-4D29-C1F8-5D02D5F5D0BC', 'leerlingaccount heeft zojuist een opdracht voltooid', '2020-06-29 12:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `ClassID` varchar(256) NOT NULL,
  `Class` int(11) NOT NULL,
  `TeacherID` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`ClassID`, `Class`, `TeacherID`) VALUES
('212DD417-B298-149C-FA6A-3E710DC1155E', 4, '66A55F23-DD14-DD48-5FB1-8D42B4E033F5'),
('A4BEF087-61CB-1EFE-CD74-C5D7680F9CBD', 6, '137A5E51-26AD-2D06-2C93-89CF1BA1A91C'),
('E4EC8075-6BA5-E5F1-317C-4E6D839EEF51', 5, 'A35877ED-749A-A7C5-4289-43E71838130E');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `ID` varchar(256) NOT NULL,
  `StudentID` varchar(256) NOT NULL,
  `Date` datetime NOT NULL,
  `Type` varchar(36) NOT NULL,
  `Correct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`ID`, `StudentID`, `Date`, `Type`, `Correct`) VALUES
('8E653DE9-DF82-3E88-945A-7174FF4F79E9', 'DFA4B270-CE91-30A7-F78F-68872BE65ADA', '2020-06-29 14:27:43', 'Oefening', 1),
('91C45990-1737-9F3F-7047-87E3F1E8493E', 'AFC1AB67-89DE-0D75-3F6F-68964CC82B07', '2020-06-29 13:01:28', 'Oefening', 10),
('C9B8BC5C-F210-68FB-8548-65C14F18CF6C', '28F09366-FEAD-2238-49E8-AE7F150DA8E6', '2020-06-29 12:46:15', 'Oefening', 10);

-- --------------------------------------------------------

--
-- Table structure for table `student_class`
--

CREATE TABLE `student_class` (
  `ID` int(11) NOT NULL,
  `StudentID` varchar(256) NOT NULL,
  `ClassID` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_class`
--

INSERT INTO `student_class` (`ID`, `StudentID`, `ClassID`) VALUES
(13, '11675362-10D4-B44C-6DCA-B14CF97D1FED', '85226E97-0795-E05A-69C7-CD35797655E7'),
(14, '64AEE81C-0832-6A1A-ACA5-6AC628272299', '85226E97-0795-E05A-69C7-CD35797655E7'),
(18, 'A174F656-3C40-C03B-C88B-5BC29B7780F4', '85226E97-0795-E05A-69C7-CD35797655E7'),
(23, '28F09366-FEAD-2238-49E8-AE7F150DA8E6', '85226E97-0795-E05A-69C7-CD35797655E7'),
(24, 'E0C82A6D-A948-30DD-F417-C8A0A3F9EFE3', '212DD417-B298-149C-FA6A-3E710DC1155E'),
(25, 'AFC1AB67-89DE-0D75-3F6F-68964CC82B07', 'A4BEF087-61CB-1EFE-CD74-C5D7680F9CBD'),
(26, 'DFA4B270-CE91-30A7-F78F-68872BE65ADA', 'A4BEF087-61CB-1EFE-CD74-C5D7680F9CBD');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` varchar(256) NOT NULL,
  `FirstName` varchar(256) NOT NULL,
  `LastName` varchar(256) NOT NULL,
  `Username` varchar(256) NOT NULL,
  `Role` varchar(256) NOT NULL,
  `Class` int(11) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Salt` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FirstName`, `LastName`, `Username`, `Role`, `Class`, `Password`, `Salt`) VALUES
('11675362-10D4-B44C-6DCA-B14CF97D1FED', 'Troye', 'Sivan', 'tsivan', 'Student', 6, 'b90b78b5823bc3c173e7176ff1026932bf8581a43200e5ac29461c43c20bb46298395a8f4c92237dc851e524b13487972cf5f481597193dbf0d0ee44d73bcb67', '517d32365e01e76bffe944e706315e3811b9bdaaa7804433a2c8f8ff519147df6b8e0773f482f48007fab4de4fe6371dce5b1aa8387c1a3f7b36208b996f0615'),
('137A5E51-26AD-2D06-2C93-89CF1BA1A91C', 'Pierre', 'Ruijters', 'pierreruijters', 'Teacher', 6, '152c4a5996e26a6d91a3af637951e2c13e46e6296dbf90afdfd6be5ddf2400eb67c2c1200214c0c23e420db7aa55803ae7f52077754734454dbd3c7b06ca9fb5', '5915374695bcee23d59b015247103ac48ccb791ef41909225b5127c2d301d752107c35b8c992d16aaed8e1b24447981e7f2de847d4f830d7f2fe054bf9e33b75'),
('28F09366-FEAD-2238-49E8-AE7F150DA8E6', 'Leerling', 'Account', 'leerlingaccount', 'Student', 6, 'e0154d0edfc73406be649ed82593655cc0356866cf0b25db4579b450d49c7c7046c7bff128004562b90de3d0a6e9954d1f9c1eb4b1c468cc3f5467e1dcf5faab', '7453faebef5a2dc87d081148b940c021959155ba1dee6451e75ef3d2c8de5849bc99c9a99d001d559d194aa98985886aa249e327092ff1e1a3469e150ed2d163'),
('66A55F23-DD14-DD48-5FB1-8D42B4E033F5', 'admin', 'account', 'adminaccount', 'Teacher', 4, '5ef1b03cb67d1dc6b9721fdc1b45b7144083d1059947b5f251e7f6633bdaa67c8df60ad26367d8d2f2117df8382a57a7d4640e0689666d085e44c027898d700a', '06d88e65daf460b5f9561892a38a2765bf1ea403d0c306c60b2b1d5e33e99d9dd3b48f6f89859494f646087d44aed7d5ee0fe249a6f3d6c79ffbe45588848519'),
('8D17FAB7-02F2-5947-138F-9192B4CB6426', 'Ronnie', 'Radke', 'rradke', 'Student', 4, 'b0252058cb071eec2f396f56acedee10cb6940a94febf78ed6ea78676c9859b7241b900199e03c8fce352ab5ce0682a755af01d3c64f5aeb795a2b7108a69f0e', '6d37c692846380640f4adf28020ea3922e6facf75d945f8215bfd93be470f0dad002199e1513148d2adf326a709cd38545a2c7aec324ebf8dcc671b00a222225'),
('A35877ED-749A-A7C5-4289-43E71838130E', 'Monique', 'Moeskops', 'mmoeskops', 'Teacher', 5, '5977043c0a7a89c306d7314c73a49c69ac79468da1cd532c7cefb498b4cc34de9e1f4d8e63b3e3ece59ed1aa6c167c5d61b957d45c3512eb85fa4697cda51fc2', '5b4c6bbe5e8e3f9a6fbd7cb0d2c44baea38d5c87b0411758809471a218594c6f70aa2f45b784cad8ea6a48ee6db08f9d1573809a4500d245745354b35fa94990'),
('AFC1AB67-89DE-0D75-3F6F-68964CC82B07', 'marijn', 'deijnen', 'marijndeijnen', 'Student', 6, '88be6a1cb15b2a5987509cd63417f6c005806a486415329034bf705a4f365c38636c100034bd7710508bb1a7b8c505303763f84da30776618b3d0f0ab769741f', 'add7511dc404c8697440e4a4aa27f29ac102170fd76f3b2f915850442914278bcb8cbf83ff89f3988430f8a9261d2262966e760f043514ff1de19c429986cfe5'),
('DFA4B270-CE91-30A7-F78F-68872BE65ADA', 'NogEen', 'Account', 'nogeenaccount', 'Student', 6, '152a3ec271d50a7869675ddb41fe2e49acd13baf3c7235813545cf0b94af45877555296bfefcbbf45b8c8f1190be6a2637c2d70fb98ef991b09b41829f65c505', '995fd24a24a8ae9c74a950f8a4b01ae46f5f6c19913a347884f572728f7dd29ba00afadd65ddfe64fb1c0a6dc486d4bf2e3829702eb4e960f08bc5261e159ada'),
('E0C82A6D-A948-30DD-F417-C8A0A3F9EFE3', 'studentaccount', 'groep4', 'studentaccountgroep4', 'Student', 4, '48678506ce6e69781c49d558f128723bbac175b4e314a1478c444b1361309d99dc6cba510508e44632495345e438a7d95e0b06fe18624d4a240647184c7dff4b', '0c3198ff28f1c6353f89e2a7321b1cb31f0e784559a510a295ad57c28a897f149053396aef0ad288b05245a9cd6fbf25f231b91ecacfcf66f9d1a9a9ef1ca3f6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`ClassID`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student_class`
--
ALTER TABLE `student_class`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_class`
--
ALTER TABLE `student_class`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
