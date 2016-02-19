-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 19-Fev-2016 às 04:46
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `princomar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada`
--

CREATE TABLE `entrada` (
  `id` int(11) NOT NULL,
  `peso` double NOT NULL,
  `data` date NOT NULL,
  `peixe` int(11) NOT NULL,
  `criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(14, 78, '2016-02-18', 1, '2016-02-18 21:21:04', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lote`
--

CREATE TABLE `lote` (
  `id` int(11) NOT NULL,
  `peixe` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data` date NOT NULL,
  `validade` int(11) NOT NULL,
  `entrada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lote`
--

INSERT INTO `lote` (`id`, `peixe`, `usuario`, `criado`, `data`, `validade`, `entrada`) VALUES
(1, 1, 1, '2016-02-18 21:41:10', '0000-00-00', 30032016, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `peixe`
--

CREATE TABLE `peixe` (
  `id` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `tipo` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `peixe`
--

INSERT INTO `peixe` (`id`, `descricao`, `tipo`) VALUES
(1, 'Dourada', 'B'),
(2, 'FilÃ© de pescada', 'P'),
(4, 'Dourada', 'B'),
(5, 'Pratiqueira', 'B');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pesagem_a`
--

CREATE TABLE `pesagem_a` (
  `id` int(11) NOT NULL,
  `entrada` int(11) NOT NULL,
  `peso` double NOT NULL,
  `criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `porte` varchar(1) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pesagem_b`
--

CREATE TABLE `pesagem_b` (
  `id` int(11) NOT NULL,
  `lote` int(11) NOT NULL,
  `peso` double NOT NULL,
  `criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `nomeuser` varchar(45) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `nivel` int(11) NOT NULL,
  `criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `alterado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `nomeuser`, `senha`, `nivel`, `criado`, `alterado`) VALUES
(1, 'Patrick Lobo', 'lobo', '4a98e660352b15561f17627f0085206eb1f053c2', 9, '2016-02-16 21:28:05', '2016-02-17 16:22:04'),
(2, 'Gheisy FranÃ§a', 'gheisyfranca', '4a98e660352b15561f17627f0085206eb1f053c2', 9, '2016-02-17 12:42:01', '2016-02-17 16:20:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_entrada_usuario_idx` (`usuario`),
  ADD KEY `fk_entrada_peixe1_idx` (`peixe`);

--
-- Indexes for table `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_lote_entrada1_idx` (`entrada`),
  ADD KEY `fk_lote_usuario1_idx` (`usuario`),
  ADD KEY `fk_lote_peixe1_idx` (`peixe`);

--
-- Indexes for table `peixe`
--
ALTER TABLE `peixe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesagem_a`
--
ALTER TABLE `pesagem_a`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pesagem_a_usuario1_idx` (`usuario`),
  ADD KEY `fk_pesagem_a_entrada1_idx` (`entrada`);

--
-- Indexes for table `pesagem_b`
--
ALTER TABLE `pesagem_b`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pesagem_b_lote1_idx` (`lote`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomeuser_UNIQUE` (`nomeuser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `lote`
--
ALTER TABLE `lote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `peixe`
--
ALTER TABLE `peixe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
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
  ADD CONSTRAINT `fk_pesagem_b_lote1` FOREIGN KEY (`lote`) REFERENCES `lote` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
