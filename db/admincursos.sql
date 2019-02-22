-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 15-Fev-2019 às 16:32
-- Versão do servidor: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admincursos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cpanel_user`
--

CREATE TABLE `cpanel_user` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `senha` varchar(90) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcurso`
--

CREATE TABLE `tbcurso` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `local` varchar(255) DEFAULT NULL,
  `horario` varchar(45) DEFAULT NULL,
  `descricao` text,
  `ativo` int(11) DEFAULT '1',
  `fk_idfacilitador` int(11) NOT NULL,
  `fk_idparceiro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbdepoimentos`
--

CREATE TABLE `tbdepoimentos` (
  `id` int(11) NOT NULL,
  `responsavel` varchar(50) DEFAULT NULL,
  `depoimento` text,
  `fk_idcurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfacilitador`
--

CREATE TABLE `tbfacilitador` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `graduacao` text,
  `facebook` varchar(45) DEFAULT NULL,
  `linkedin` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfatura`
--

CREATE TABLE `tbfatura` (
  `id` int(11) NOT NULL,
  `tipo` varchar(9) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `razao_socal` varchar(45) DEFAULT NULL,
  `nome_fantasia` varchar(45) DEFAULT NULL,
  `cnpj` varchar(19) DEFAULT NULL,
  `responsavel` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fk_idincricoes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbincricoes`
--

CREATE TABLE `tbincricoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `informacaoadcional` text,
  `fk_idcurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbinfo`
--

CREATE TABLE `tbinfo` (
  `id` int(11) NOT NULL,
  `objetivo` text,
  `beneficio` text,
  `publico_alvo` text,
  `fk_idcurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbparceiros`
--

CREATE TABLE `tbparceiros` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `site` varchar(45) DEFAULT NULL,
  `logo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cpanel_user`
--
ALTER TABLE `cpanel_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbcurso`
--
ALTER TABLE `tbcurso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbcurso_tbfacilitador1_idx` (`fk_idfacilitador`),
  ADD KEY `fk_tbcurso_tbparceiros1_idx` (`fk_idparceiro`);

--
-- Indexes for table `tbdepoimentos`
--
ALTER TABLE `tbdepoimentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbdepoimentos_tbcurso1_idx` (`fk_idcurso`);

--
-- Indexes for table `tbfacilitador`
--
ALTER TABLE `tbfacilitador`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbfatura`
--
ALTER TABLE `tbfatura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbfatura_tbincricoes1_idx` (`fk_idincricoes`);

--
-- Indexes for table `tbincricoes`
--
ALTER TABLE `tbincricoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbincricoes_tbcurso1_idx` (`fk_idcurso`);

--
-- Indexes for table `tbinfo`
--
ALTER TABLE `tbinfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbinfo_tbcurso_idx` (`fk_idcurso`);

--
-- Indexes for table `tbparceiros`
--
ALTER TABLE `tbparceiros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cpanel_user`
--
ALTER TABLE `cpanel_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbcurso`
--
ALTER TABLE `tbcurso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbdepoimentos`
--
ALTER TABLE `tbdepoimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbfacilitador`
--
ALTER TABLE `tbfacilitador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbfatura`
--
ALTER TABLE `tbfatura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbincricoes`
--
ALTER TABLE `tbincricoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbinfo`
--
ALTER TABLE `tbinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbparceiros`
--
ALTER TABLE `tbparceiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tbcurso`
--
ALTER TABLE `tbcurso`
  ADD CONSTRAINT `fk_tbcurso_tbfacilitador1` FOREIGN KEY (`fk_idfacilitador`) REFERENCES `tbfacilitador` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tbcurso_tbparceiros1` FOREIGN KEY (`fk_idparceiro`) REFERENCES `tbparceiros` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tbdepoimentos`
--
ALTER TABLE `tbdepoimentos`
  ADD CONSTRAINT `fk_tbdepoimentos_tbcurso1` FOREIGN KEY (`fk_idcurso`) REFERENCES `tbcurso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tbfatura`
--
ALTER TABLE `tbfatura`
  ADD CONSTRAINT `fk_tbfatura_tbincricoes1` FOREIGN KEY (`fk_idincricoes`) REFERENCES `tbincricoes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tbincricoes`
--
ALTER TABLE `tbincricoes`
  ADD CONSTRAINT `fk_tbincricoes_tbcurso1` FOREIGN KEY (`fk_idcurso`) REFERENCES `tbcurso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tbinfo`
--
ALTER TABLE `tbinfo`
  ADD CONSTRAINT `fk_tbinfo_tbcurso` FOREIGN KEY (`fk_idcurso`) REFERENCES `tbcurso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
