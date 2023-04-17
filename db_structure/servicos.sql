-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 17/04/2023 às 15:32
-- Versão do servidor: 10.1.44-MariaDB-cll-lve
-- Versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `unimedtc_consultatuss`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicos`
--

CREATE TABLE `servicos` (
  `TUSS` bigint(10) DEFAULT NULL,
  `Descricao` varchar(301) DEFAULT NULL,
  `Classificacao` varchar(14) DEFAULT NULL,
  `DocRacionalizacao` varchar(1151) DEFAULT NULL,
  `Prazo_Executora` varchar(14) DEFAULT NULL,
  `Prazo_Origem` varchar(14) DEFAULT NULL,
  `Prazo_Total` varchar(15) DEFAULT NULL,
  `Valor` varchar(8) DEFAULT NULL,
  `Porte` varchar(3) DEFAULT NULL,
  `ValorHM` varchar(7) DEFAULT NULL,
  `ValorCO` varchar(8) DEFAULT NULL,
  `UCO` varchar(10) DEFAULT NULL,
  `Número_Auxil` varchar(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
