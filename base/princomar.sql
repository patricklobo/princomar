-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05-Abr-2016 às 16:54
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `princomar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada`
--

CREATE TABLE IF NOT EXISTS `entrada` (
`id` int(11) NOT NULL,
  `peso` double NOT NULL,
  `data` date NOT NULL,
  `peixe` int(11) NOT NULL,
  `criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `entrada`
--

INSERT INTO `entrada` (`id`, `peso`, `data`, `peixe`, `criado`, `usuario`) VALUES
(1, 1000, '2016-02-18', 4, '2016-02-18 13:52:26', 1),
(2, 500, '2016-02-18', 1, '2016-02-18 13:57:35', 1),
(3, 1500, '2016-02-18', 5, '2016-02-18 13:57:54', 1),
(4, 1000, '2016-02-18', 4, '2016-02-18 14:01:14', 1),
(5, 4000, '2016-02-18', 1, '2016-02-18 14:01:19', 1),
(6, 5000, '2016-02-18', 5, '2016-02-18 14:01:22', 1),
(7, 500, '2016-02-18', 4, '2016-02-18 14:07:38', 1),
(8, 1000, '2016-02-18', 5, '2016-02-18 14:07:43', 1),
(9, 5000, '2016-02-18', 1, '2016-02-18 14:07:48', 1),
(10, 4000, '2016-02-18', 5, '2016-02-18 14:07:56', 1),
(11, 5000, '2016-02-18', 4, '2016-02-18 14:08:05', 1),
(12, 4555, '2016-02-18', 1, '2016-02-18 19:27:28', 1),
(13, 78, '2016-02-18', 1, '2016-02-18 21:14:56', 2),
(14, 78, '2016-02-18', 1, '2016-02-18 21:21:04', 2),
(15, 8000, '2016-02-19', 1, '2016-02-19 18:04:35', 1),
(16, 2000, '2016-02-19', 5, '2016-02-19 18:04:57', 1),
(17, 2000, '2016-02-19', 5, '2016-02-19 18:09:34', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lote`
--

CREATE TABLE IF NOT EXISTS `lote` (
`id` int(11) NOT NULL,
  `peixe` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data` date NOT NULL,
  `validade` int(11) NOT NULL,
  `entrada` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lote`
--

INSERT INTO `lote` (`id`, `peixe`, `usuario`, `criado`, `data`, `validade`, `entrada`) VALUES
(1, 1, 1, '2016-02-18 21:41:10', '0000-00-00', 30, 1),
(17, 1, 1, '2016-02-24 17:12:18', '2016-02-24', 30, 1),
(18, 2, 1, '2016-02-24 17:18:20', '2016-02-24', 30, 2),
(19, 1, 2, '2016-02-24 18:12:59', '2016-02-24', 30, 1),
(20, 8, 2, '2016-02-24 18:14:10', '2016-02-24', 30, 17),
(21, 1, 2, '2016-02-24 18:23:29', '2016-02-24', 40, 1),
(22, 1, 2, '2016-02-24 18:25:45', '2016-02-24', 40, 1),
(23, 1, 2, '2016-02-24 18:26:49', '2016-02-24', 40, 1),
(24, 8, 2, '2016-02-24 18:27:13', '2016-02-24', 60, 17),
(25, 8, 2, '2016-02-24 18:30:46', '2016-02-24', 60, 17),
(26, 8, 2, '2016-02-24 18:31:20', '2016-02-24', 60, 17),
(27, 1, 2, '2016-02-27 23:28:48', '2016-02-27', 90, 12),
(28, 1, 2, '2016-03-02 18:05:54', '2016-03-02', 90, 14),
(29, 1, 2, '2016-03-02 18:12:23', '2016-03-02', 90, 14),
(30, 1, 2, '2016-03-03 14:44:50', '2016-03-03', 90, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `peixe`
--

CREATE TABLE IF NOT EXISTS `peixe` (
`id` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `tipo` varchar(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `peixe`
--

INSERT INTO `peixe` (`id`, `descricao`, `tipo`) VALUES
(1, 'Dourada', 'P'),
(2, 'FilÃ© de pescada', 'P'),
(4, 'Dourada', 'B'),
(5, 'Pratiqueira', 'B'),
(8, 'Pratiqueira', 'P'),
(10, 'Pescada', 'B'),
(11, 'Pescada amarela', 'B');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pesagem_a`
--

CREATE TABLE IF NOT EXISTS `pesagem_a` (
`id` int(11) NOT NULL,
  `entrada` int(11) NOT NULL,
  `peso` double NOT NULL,
  `criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `porte` varchar(1) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pesagem_a`
--

INSERT INTO `pesagem_a` (`id`, `entrada`, `peso`, `criado`, `porte`, `usuario`) VALUES
(1, 17, 90, '2016-03-02 17:30:36', 'P', 1),
(2, 3, 80, '2016-03-02 17:34:38', 'M', 2),
(15, 17, 0, '2016-03-04 20:40:36', 'G', 2),
(16, 15, 0, '2016-03-04 20:41:12', 'P', 2),
(17, 17, 0, '2016-03-04 20:42:46', 'P', 2),
(18, 17, 0, '2016-03-04 20:43:31', 'P', 2),
(19, 17, 0, '2016-03-04 20:46:01', 'P', 2),
(20, 17, 70, '2016-03-04 20:46:12', 'P', 2),
(21, 17, 70, '2016-03-04 20:49:58', 'P', 2),
(22, 17, 56, '2016-03-05 02:07:18', 'P', 2),
(23, 14, 7855, '2016-03-06 12:37:04', 'G', 2),
(24, 14, 7855, '2016-03-06 19:35:28', 'G', 2),
(25, 17, 56, '2016-03-06 19:35:36', 'P', 2),
(26, 17, 9000, '2016-03-06 19:35:55', 'G', 2),
(27, 17, 9000, '2016-03-06 19:36:07', 'G', 2),
(28, 17, 89, '2016-03-08 18:13:08', 'M', 2),
(29, 17, 78, '2016-03-10 13:30:17', 'P', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pesagem_b`
--

CREATE TABLE IF NOT EXISTS `pesagem_b` (
`id` int(11) NOT NULL,
  `lote` int(11) NOT NULL,
  `peso` double NOT NULL,
  `criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pesagem_b`
--

INSERT INTO `pesagem_b` (`id`, `lote`, `peso`, `criado`, `usuario`) VALUES
(1, 18, 600, '2016-03-04 15:19:14', 1),
(45, 26, 67, '2016-03-04 21:21:09', 2),
(46, 26, 67, '2016-03-04 21:22:19', 2),
(47, 26, 67, '2016-03-04 21:22:24', 2),
(48, 26, 67, '2016-03-04 21:22:30', 2),
(49, 26, 67, '2016-03-04 21:27:28', 2),
(50, 26, 67, '2016-03-04 21:28:21', 2),
(51, 26, 67, '2016-03-04 21:31:12', 2),
(52, 26, 67, '2016-03-04 21:34:22', 2),
(53, 26, 67, '2016-03-04 21:35:49', 2),
(54, 26, 67, '2016-03-04 21:36:08', 2),
(55, 26, 67, '2016-03-05 01:43:56', 2),
(56, 27, 76, '2016-03-05 01:44:09', 2),
(57, 30, 98, '2016-03-08 18:06:25', 2),
(58, 30, 98, '2016-03-08 18:06:33', 2),
(59, 30, 98, '2016-03-08 18:08:04', 2),
(60, 21, 45, '2016-03-08 18:08:29', 2),
(61, 21, 45, '2016-03-08 18:11:28', 2),
(62, 21, 45, '2016-03-08 18:11:36', 2),
(63, 21, 45, '2016-03-08 18:11:56', 2),
(64, 21, 45, '2016-03-08 18:12:18', 2),
(65, 25, 90, '2016-03-10 13:30:47', 2),
(66, 25, 90, '2016-03-10 13:36:59', 2),
(67, 25, 45, '2016-03-10 13:47:23', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `nomeuser` varchar(45) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `nivel` int(11) NOT NULL,
  `criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `alterado` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `nomeuser`, `senha`, `nivel`, `criado`, `alterado`) VALUES
(1, 'Patrick Lobo', 'lobo', '4a98e660352b15561f17627f0085206eb1f053c2', 9, '2016-02-16 21:28:05', '2016-03-03 11:52:53'),
(2, 'Gheisy FranÃ§a', 'gheisyfranca', '4a98e660352b15561f17627f0085206eb1f053c2', 9, '2016-02-17 12:42:01', '2016-02-17 16:20:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entrada`
--
ALTER TABLE `entrada`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_entrada_usuario_idx` (`usuario`), ADD KEY `fk_entrada_peixe1_idx` (`peixe`);

--
-- Indexes for table `lote`
--
ALTER TABLE `lote`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD KEY `fk_lote_entrada1_idx` (`entrada`), ADD KEY `fk_lote_usuario1_idx` (`usuario`), ADD KEY `fk_lote_peixe1_idx` (`peixe`);

--
-- Indexes for table `peixe`
--
ALTER TABLE `peixe`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesagem_a`
--
ALTER TABLE `pesagem_a`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_pesagem_a_usuario1_idx` (`usuario`), ADD KEY `fk_pesagem_a_entrada1_idx` (`entrada`);

--
-- Indexes for table `pesagem_b`
--
ALTER TABLE `pesagem_b`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_pesagem_b_lote1_idx` (`lote`), ADD KEY `fk_pesagem_b_usuario1_idx` (`usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `nomeuser_UNIQUE` (`nomeuser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entrada`
--
ALTER TABLE `entrada`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `lote`
--
ALTER TABLE `lote`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `peixe`
--
ALTER TABLE `peixe`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pesagem_a`
--
ALTER TABLE `pesagem_a`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `pesagem_b`
--
ALTER TABLE `pesagem_b`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `entrada`
--
ALTER TABLE `entrada`
ADD CONSTRAINT `fk_entrada_peixe1` FOREIGN KEY (`peixe`) REFERENCES `peixe` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_entrada_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `lote`
--
ALTER TABLE `lote`
ADD CONSTRAINT `fk_lote_entrada1` FOREIGN KEY (`entrada`) REFERENCES `entrada` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_lote_peixe1` FOREIGN KEY (`peixe`) REFERENCES `peixe` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_lote_usuario1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pesagem_a`
--
ALTER TABLE `pesagem_a`
ADD CONSTRAINT `fk_pesagem_a_entrada1` FOREIGN KEY (`entrada`) REFERENCES `entrada` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_pesagem_a_usuario1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pesagem_b`
--
ALTER TABLE `pesagem_b`
ADD CONSTRAINT `fk_pesagem_b_lote1` FOREIGN KEY (`lote`) REFERENCES `lote` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_pesagem_b_usuario1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
