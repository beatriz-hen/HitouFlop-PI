-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/05/2025 às 17:55
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_hf`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin`
--

CREATE TABLE `tb_admin` (
  `idAdmin` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_classifacao`
--

CREATE TABLE `tb_classifacao` (
  `idClassificacao` int(11) NOT NULL,
  `classificacao` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_genero`
--

CREATE TABLE `tb_genero` (
  `idGenero` int(11) NOT NULL,
  `genero` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_generomidia`
--

CREATE TABLE `tb_generomidia` (
  `idGeneroMidia` int(11) NOT NULL,
  `idGenero` int(11) NOT NULL,
  `idMidia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_lista`
--

CREATE TABLE `tb_lista` (
  `idLista` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idMidia` int(11) NOT NULL,
  `notaMidia` char(2) DEFAULT NULL,
  `episodios` int(5) DEFAULT NULL,
  `status` varchar(1) NOT NULL,
  `comentarioMidia` varchar(255) DEFAULT NULL,
  `idTipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_midia`
--

CREATE TABLE `tb_midia` (
  `idMidia` int(11) NOT NULL,
  `nomeMidia` varchar(150) NOT NULL,
  `qtdEpisodio` int(5) NOT NULL,
  `anoLancamento` date NOT NULL,
  `membros` int(11) NOT NULL,
  `idTipo` int(11) NOT NULL,
  `idGeneroMidia` int(11) NOT NULL,
  `idClassificacao` int(11) NOT NULL,
  `notaMedia` float NOT NULL,
  `visualizacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_tipo`
--

CREATE TABLE `tb_tipo` (
  `idTipo` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Índices de tabela `tb_classifacao`
--
ALTER TABLE `tb_classifacao`
  ADD PRIMARY KEY (`idClassificacao`);

--
-- Índices de tabela `tb_genero`
--
ALTER TABLE `tb_genero`
  ADD PRIMARY KEY (`idGenero`);

--
-- Índices de tabela `tb_generomidia`
--
ALTER TABLE `tb_generomidia`
  ADD PRIMARY KEY (`idGeneroMidia`);

--
-- Índices de tabela `tb_lista`
--
ALTER TABLE `tb_lista`
  ADD PRIMARY KEY (`idLista`),
  ADD KEY `FK_idUsuario` (`idUsuario`),
  ADD KEY `FK_idMidia` (`idMidia`);

--
-- Índices de tabela `tb_midia`
--
ALTER TABLE `tb_midia`
  ADD PRIMARY KEY (`idMidia`),
  ADD KEY `FK_idTipo` (`idTipo`),
  ADD KEY `FK_idClassificacao` (`idClassificacao`),
  ADD KEY `FK_idGeneroMidia` (`idGeneroMidia`);

--
-- Índices de tabela `tb_tipo`
--
ALTER TABLE `tb_tipo`
  ADD PRIMARY KEY (`idTipo`);

--
-- Índices de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_classifacao`
--
ALTER TABLE `tb_classifacao`
  MODIFY `idClassificacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_genero`
--
ALTER TABLE `tb_genero`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_generomidia`
--
ALTER TABLE `tb_generomidia`
  MODIFY `idGeneroMidia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_lista`
--
ALTER TABLE `tb_lista`
  MODIFY `idLista` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_midia`
--
ALTER TABLE `tb_midia`
  MODIFY `idMidia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_tipo`
--
ALTER TABLE `tb_tipo`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_lista`
--
ALTER TABLE `tb_lista`
  ADD CONSTRAINT `FK_idMidia` FOREIGN KEY (`idMidia`) REFERENCES `tb_midia` (`idMidia`),
  ADD CONSTRAINT `FK_idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `tb_usuario` (`idUsuario`);

--
-- Restrições para tabelas `tb_midia`
--
ALTER TABLE `tb_midia`
  ADD CONSTRAINT `FK_idClassificacao` FOREIGN KEY (`idClassificacao`) REFERENCES `tb_classifacao` (`idClassificacao`),
  ADD CONSTRAINT `FK_idGenero` FOREIGN KEY (`idGeneroMidia`) REFERENCES `tb_genero` (`idGenero`),
  ADD CONSTRAINT `FK_idGeneroMidia` FOREIGN KEY (`idGeneroMidia`) REFERENCES `tb_generomidia` (`idGeneroMidia`),
  ADD CONSTRAINT `FK_idTipo` FOREIGN KEY (`idTipo`) REFERENCES `tb_tipo` (`idTipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
