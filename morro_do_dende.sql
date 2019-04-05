-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Mar-2019 às 02:08
-- Versão do servidor: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema_seguro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tentativa`
--

CREATE TABLE `tentativa` (
  `id` int(11) NOT NULL,
  `ip` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `login` varchar(200) COLLATE utf8_bin NOT NULL,
  `datahora` datetime DEFAULT CURRENT_TIMESTAMP,
  `post_token` varchar(64) COLLATE utf8_bin NOT NULL,
  `session_token` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `login` varchar(200) COLLATE utf8_bin NOT NULL,
  `senha` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `login`, `senha`) VALUES
(1, 'gabriel', '005a5facd00f6657150ee8b163046f73efc8c26485f42479ff317c58f878e5c7'),
(2, 'admin', 'dee589322f61be212e72193c01fa09e6cbdcb2ae92d854862a7ad113b6815167'),
(3, 'simples', '173af653133d964edfc16cafe0aba33c8f500a07f3ba3f81943916910c257705');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tentativa`
--
ALTER TABLE `tentativa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tentativa`
--
ALTER TABLE `tentativa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
