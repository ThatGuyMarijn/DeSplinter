-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2020 at 10:39 AM
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
  `Activity` varchar(256) NOT NULL,
  `Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`ID`, `UserID`, `Activity`, `Time`) VALUES
('8DACA8DA-1D1F-583E-DD35-AF6C6D45ACD2', '28F09366-FEAD-2238-49E8-AE7F150DA8E6', 'leerlingaccount heeft zojuist een opdracht voltooid', '2020-06-26 10:16:12');

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
('85226E97-0795-E05A-69C7-CD35797655E7', 6, 'A2F7759C-BD02-4D29-C1F8-5D02D5F5D0BC'),
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
('57FEF93C-4560-D1EC-53F5-94E1121FC466', '28F09366-FEAD-2238-49E8-AE7F150DA8E6', '2020-06-26 10:16:12', 'Oefening', 12);

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
(23, '28F09366-FEAD-2238-49E8-AE7F150DA8E6', '85226E97-0795-E05A-69C7-CD35797655E7');

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
('28F09366-FEAD-2238-49E8-AE7F150DA8E6', 'Leerling', 'Account', 'leerlingaccount', 'Student', 6, 'e0154d0edfc73406be649ed82593655cc0356866cf0b25db4579b450d49c7c7046c7bff128004562b90de3d0a6e9954d1f9c1eb4b1c468cc3f5467e1dcf5faab', '7453faebef5a2dc87d081148b940c021959155ba1dee6451e75ef3d2c8de5849bc99c9a99d001d559d194aa98985886aa249e327092ff1e1a3469e150ed2d163'),
('64AEE81C-0832-6A1A-ACA5-6AC628272299', 'Marijn', 'Deijnen', 'mdeijnen', 'Student', 6, '36c7270d1e0886d73aa5b738f990db4a4f04d324bd84a665e8db4702cc53418aa40056903688831cd9ebdab2ba1a8aa8965bbc80904e07c46c876c4def1ccb1c', '288e118038adab1ebdcc6c7eb41ed5d420f5c2e0601c81f83d7fcf31081cde16defd87aa98239a87d6bb6a945ca1fee4e6d3edd168ef4902663880ed1c550f41'),
('66A55F23-DD14-DD48-5FB1-8D42B4E033F5', 'admin', 'account', 'adminaccount', 'Teacher', 4, '5ef1b03cb67d1dc6b9721fdc1b45b7144083d1059947b5f251e7f6633bdaa67c8df60ad26367d8d2f2117df8382a57a7d4640e0689666d085e44c027898d700a', '06d88e65daf460b5f9561892a38a2765bf1ea403d0c306c60b2b1d5e33e99d9dd3b48f6f89859494f646087d44aed7d5ee0fe249a6f3d6c79ffbe45588848519'),
('8D17FAB7-02F2-5947-138F-9192B4CB6426', 'Ronnie', 'Radke', 'rradke', 'Student', 4, 'b0252058cb071eec2f396f56acedee10cb6940a94febf78ed6ea78676c9859b7241b900199e03c8fce352ab5ce0682a755af01d3c64f5aeb795a2b7108a69f0e', '6d37c692846380640f4adf28020ea3922e6facf75d945f8215bfd93be470f0dad002199e1513148d2adf326a709cd38545a2c7aec324ebf8dcc671b00a222225'),
('A2F7759C-BD02-4D29-C1F8-5D02D5F5D0BC', 'Pierre', 'Ruijters', 'pruijters', 'Teacher', 6, '1016a19b806201b3275068f0a9d832d8b571c8ec06e6e59dc9c2724488008461ec6f63fe1564121370d1af5615ede7e49ab9b18e145fc6df1469a26cd8401e7f', 'ccd4902bbc1ce7ba7bde34f151f747a227aa5b6482212f4e5bcf92bf284bf32a464ad6243abbd0df7a8bd42bc5eb0b988b307e41cfc69ca636856b5b345df3f9'),
('A35877ED-749A-A7C5-4289-43E71838130E', 'Monique', 'Moeskops', 'mmoeskops', 'Teacher', 5, '5977043c0a7a89c306d7314c73a49c69ac79468da1cd532c7cefb498b4cc34de9e1f4d8e63b3e3ece59ed1aa6c167c5d61b957d45c3512eb85fa4697cda51fc2', '5b4c6bbe5e8e3f9a6fbd7cb0d2c44baea38d5c87b0411758809471a218594c6f70aa2f45b784cad8ea6a48ee6db08f9d1573809a4500d245745354b35fa94990');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
