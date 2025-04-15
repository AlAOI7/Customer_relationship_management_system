-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03 ديسمبر 2024 الساعة 07:27
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- بنية الجدول `clientes`
--

CREATE TABLE `clientes` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Telefono` varchar(12) NOT NULL,
  `Correo` varchar(120) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- إرجاع أو استيراد بيانات الجدول `clientes`
--

INSERT INTO `clientes` (`Id`, `Nombre`, `Telefono`, `Correo`, `Fecha_Nacimiento`, `Password`) VALUES
(100000, 'hss', '55555', 'alaoi@gmail.com', '2017-06-14', '?????');

-- --------------------------------------------------------

--
-- بنية الجدول `company`
--

CREATE TABLE `company` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Ubicacion` varchar(120) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Correo` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `reporte`
--

CREATE TABLE `reporte` (
  `Folio` int(11) NOT NULL,
  `Nivel_Dano` varchar(120) NOT NULL,
  `Folio_Seguro` int(11) NOT NULL,
  `Detalles` text NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ubicacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `root`
--

CREATE TABLE `root` (
  `Id` int(64) NOT NULL,
  `Name` text NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Password` varchar(128) NOT NULL,
  `img_profile` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- إرجاع أو استيراد بيانات الجدول `root`
--

INSERT INTO `root` (`Id`, `Name`, `Email`, `Password`, `img_profile`) VALUES
(7, 'ala', 'admin@gmail.com', '$2y$10$DFrI2lLjnZmGFypYAu5SZu6CfybkfPZpJegh9j.ciziK2phvIl0aC', 'img/user-manuel.jpg');

-- --------------------------------------------------------

--
-- بنية الجدول `seguro`
--

CREATE TABLE `seguro` (
  `Folio` int(11) NOT NULL,
  `Id_Cliente` int(11) NOT NULL,
  `Id_Suscripcion` int(11) NOT NULL,
  `Fecha_Contratacion` date NOT NULL,
  `Fecha_termino` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `suscripcion`
--

CREATE TABLE `suscripcion` (
  `Id` int(11) NOT NULL,
  `Costo` int(11) NOT NULL,
  `Caracteristicas` text NOT NULL,
  `Id_Company` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`Folio`),
  ADD KEY `Folio_Seguro` (`Folio_Seguro`);

--
-- Indexes for table `root`
--
ALTER TABLE `root`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `seguro`
--
ALTER TABLE `seguro`
  ADD PRIMARY KEY (`Folio`),
  ADD KEY `Id_Cliente` (`Id_Cliente`),
  ADD KEY `Id_Suscripcion` (`Id_Suscripcion`);

--
-- Indexes for table `suscripcion`
--
ALTER TABLE `suscripcion`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_Company` (`Id_Company`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100001;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99979;

--
-- AUTO_INCREMENT for table `reporte`
--
ALTER TABLE `reporte`
  MODIFY `Folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99938;

--
-- AUTO_INCREMENT for table `root`
--
ALTER TABLE `root`
  MODIFY `Id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seguro`
--
ALTER TABLE `seguro`
  MODIFY `Folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99985;

--
-- AUTO_INCREMENT for table `suscripcion`
--
ALTER TABLE `suscripcion`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99728;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `reporte_ibfk_1` FOREIGN KEY (`Folio_Seguro`) REFERENCES `seguro` (`Folio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- قيود الجداول `seguro`
--
ALTER TABLE `seguro`
  ADD CONSTRAINT `seguro_ibfk_1` FOREIGN KEY (`Id_Suscripcion`) REFERENCES `suscripcion` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seguro_ibfk_2` FOREIGN KEY (`Id_Cliente`) REFERENCES `clientes` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- قيود الجداول `suscripcion`
--
ALTER TABLE `suscripcion`
  ADD CONSTRAINT `suscripcion_ibfk_1` FOREIGN KEY (`Id_Company`) REFERENCES `company` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
