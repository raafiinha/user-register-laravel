-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Jun-2022 às 22:35
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cadastro de usuario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE IF NOT EXISTS `cadastro de usuario` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `ultimo_nome` longtext NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `RG_id` int(30) NOT NULL,
  `CPF_id` int(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `conteudo`
--

INSERT INTO `cadastro de usuario` (`id`, `nome`, `ultimo_nome`, `telefone`, `senha`, `RG_id`, `CPF_id`) VALUES


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
