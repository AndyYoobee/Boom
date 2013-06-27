-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 26, 2013 at 01:17 p.m.
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shoppingforcars`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbcustomer`
--

CREATE TABLE IF NOT EXISTS `tbcustomer` (
  `CustomerID` int(5) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Telephone` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Credit` double NOT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbcustomer`
--

INSERT INTO `tbcustomer` (`CustomerID`, `Firstname`, `Lastname`, `Telephone`, `Email`, `Username`, `Password`, `Credit`) VALUES
(1, 'Dennis', 'Benschop', '0215478965', 'goodbye@gmail.com', 'dennis', '12', 0),
(2, 'Dennis1', 'qwe', '1245784585', 'q@gmail.com', 'jimmy', 'hendrix', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbmake`
--

CREATE TABLE IF NOT EXISTS `tbmake` (
  `makeID` int(11) NOT NULL AUTO_INCREMENT,
  `Makename` varchar(100) NOT NULL,
  PRIMARY KEY (`makeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbmake`
--

INSERT INTO `tbmake` (`makeID`, `Makename`) VALUES
(1, 'Aston Martin'),
(2, 'Audi'),
(3, 'Maserati'),
(4, 'Mercedes');

-- --------------------------------------------------------

--
-- Table structure for table `tbmodel`
--

CREATE TABLE IF NOT EXISTS `tbmodel` (
  `ModelID` int(11) NOT NULL AUTO_INCREMENT,
  `Modelname` varchar(50) NOT NULL,
  `Description` varchar(5000) NOT NULL,
  `Price` double NOT NULL,
  `MakeID` int(11) NOT NULL,
  `Stocklevel` int(11) NOT NULL,
  `Photopath` varchar(50) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`ModelID`),
  KEY `MakeID` (`MakeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `tbmodel`
--

INSERT INTO `tbmodel` (`ModelID`, `Modelname`, `Description`, `Price`, `MakeID`, `Stocklevel`, `Photopath`, `active`) VALUES
(13, 'DB9', 'A Dynamic Beauty Appearing hot on the heels of the all-new Vanquish Super GT, the 2013 DB9 is revealed with significant developments affecting styling inside and out, plus key changes under the new DB9’s classically beautiful skin', 465000, 1, 5, 'assets/img/aston-martin-db9.jpg', 1),
(14, 'One 77', 'An Automotive Art Form The most advanced technology, design and standards of construction, culminating in one of the greatest Supercars of all time.', 2800000, 1, 2, 'assets/img/aston-martin-one77.jpg', 1),
(17, 'S8', 'On the heels of a redesigned A8, Audi unleashed a performance variant, the S8, for 2013. Though it''s four cylinders short of the 12-cylinder A8 W12, the S8''s twin-turbo V-8 makes more power and is the most powerful sedan Audi has built.', 218000, 2, 8, 'assets/img/audi-s8.jpg', 1),
(18, 'R8', 'This two-seat mid-engine sports car is named after an Audi Le Mans-winning racecar and is available as a hardtop coupe or Spyder roadster. The R8 has a mid-mounted engine. It features a weight-saving aluminum body and Quattro all-wheel drive, and both the coupe and convertible are available with an optional V-10 engine.', 325000, 2, 3, 'assets/img/audi-r8.jpg', 1),
(19, 'GranTurismo MC Stradale', 'The GranTurismo MC Stradale is the pinnacle of Maserati’s knowledge. A road car with racing genes.   A unique two-seater with the unmistakable style of the GranTurismo, renowned for its performance, design and comfort. But also a car with the sporting heritage of Maserati Corse, whose name it wears with pride, a synonym of adrenaline, competition and continuous development.   On the one hand, a heritage of Italian craftsmanship and attention to detail. On the other, technology tried and tested on the track for unbeatable performance. This is the synergy that has given birth to Maserati’s fastest, lightest and most powerful car.', 364900, 3, 3, 'assets/img/maserati-gran-turismo.jpg', 1),
(20, 'Quattroporte Sport GT S MC', 'The Quattroporte Sport GT S MC Sport Line is the most exciting combination of luxury sedan and performance sports car that Maserati has ever produced.', 295000, 3, 2, 'assets/img/maserati-quattroporte.jpg', 1),
(21, 'SLR McLaren 722', 'The SLR unites the Formula One-proven technology of McLaren with Mercedes engineering, listing a carbon fiber chassis and a 600-plus horsepower engine among its features.', 655000, 4, 1, 'assets/img/mercedes-slr.jpg', 1),
(22, 'SLS AMG GT Coupe', 'The Mercedes-Benz SLS AMG GT is a quicker, sharper handling and certainly more expensive take on the German automaker''s exclusive Gullwing Coupe and Roadster. Powered by a hand-built 583-bhp 6.2-liter V-8, the GT has 20 more horsepower than the standard (which it will replace once it goes on sale later this year). Torque output remains the same.', 755000, 4, 1, 'assets/img/mercedes-sls.jpg', 1),
(23, 'CLS 63 AMG', 'The 2013 Mercedes-Benz CLS 63 AMG boasts startlingly good acceleration for a sedan of its size, thanks to its powerful engine and our equipped performance package upgrades. It also manages to be quite comfortable thanks to an adaptive suspension, multiple drive modes, and a high level of cabin comfort amenities.', 135000, 4, 6, 'assets/img/mercedes-cls.jpg', 0),
(25, 'E63 AMG', 'To be Edited', 240000, 4, 5, 'assets/img/1372120806.jpg', 0),
(28, 'Rapide', 'The Rapide is powered by the same 470-horsepower 5.9-liter V12 engine found in the DB9 and Volante models. And, as one has come to expect from Aston Martin, the Rapide has beautiful lines and a super luxurious interior.', 246000, 1, 2, 'assets/img/1372124218.jpg', 0),
(29, 'fff', '222', 12, 1, 12, 'assets/img/1372208946.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tborder`
--

CREATE TABLE IF NOT EXISTS `tborder` (
  `OrderID` int(11) NOT NULL AUTO_INCREMENT,
  `OrderDate` date NOT NULL,
  `PickupDate` date NOT NULL,
  `OrderStatus` varchar(50) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `CustomerID` (`CustomerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tborder`
--


-- --------------------------------------------------------

--
-- Table structure for table `tborderline`
--

CREATE TABLE IF NOT EXISTS `tborderline` (
  `OrderlineID` int(11) NOT NULL AUTO_INCREMENT,
  `OrderID` int(11) NOT NULL,
  `ModelID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  PRIMARY KEY (`OrderlineID`),
  KEY `OrderID` (`OrderID`,`ModelID`),
  KEY `ModelID` (`ModelID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tborderline`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbmodel`
--
ALTER TABLE `tbmodel`
  ADD CONSTRAINT `tbmodel_ibfk_1` FOREIGN KEY (`MakeID`) REFERENCES `tbmake` (`makeID`);

--
-- Constraints for table `tborder`
--
ALTER TABLE `tborder`
  ADD CONSTRAINT `tborder_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `tbcustomer` (`CustomerID`);

--
-- Constraints for table `tborderline`
--
ALTER TABLE `tborderline`
  ADD CONSTRAINT `tborderline_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `tborder` (`OrderID`),
  ADD CONSTRAINT `tborderline_ibfk_2` FOREIGN KEY (`ModelID`) REFERENCES `tbmodel` (`ModelID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
