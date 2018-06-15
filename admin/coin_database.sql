-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Jun-2018 às 16:39
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coin`
--
CREATE DATABASE IF NOT EXISTS `coin` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `coin`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `blocks`
--

CREATE TABLE `blocks` (
  `id` int(11) NOT NULL,
  `data` varchar(300) NOT NULL,
  `number` int(11) NOT NULL,
  `hash` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `blocks`
--

INSERT INTO `blocks` (`id`, `data`, `number`, `hash`) VALUES
(2, 'sdfsafdsf', 0, ''),
(3, 'sdfsafdsf', 0, 'ceac159bf069ad525b27bcdb88f3f30865431c99bc5e3ce88da02f5c7584a1b4'),
(4, 'sdfsafdsfqre', 0, 'd63123c1fc802aa14720a48e219bee4fdcfa7501c17c8333b4159ea13249b78c'),
(5, 'sdfsafdsfqre', 0, 'd63123c1fc802aa14720a48e219bee4fdcfa7501c17c8333b4159ea13249b78c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
