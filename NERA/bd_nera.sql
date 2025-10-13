-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Set-2025 às 21:40
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_nera`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_coleta`
--

CREATE TABLE `tb_coleta` (
  `id_coleta` int(11) NOT NULL,
  `tipo_coleta` varchar(24) NOT NULL,
  `quantidade_coleta` int(8) NOT NULL,
  `data_coleta` date NOT NULL,
  `hora_coleta` time NOT NULL,
  `endereco_coleta` varchar(128) NOT NULL,
  `status_coleta` varchar(16) NOT NULL,
  `codigo_coleta` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_coletor`
--

CREATE TABLE `tb_coletor` (
  `id_coletor` int(11) NOT NULL,
  `nome_coletor` varchar(64) NOT NULL,
  `datanascimento_coletor` date NOT NULL,
  `email_coletor` varchar(128) NOT NULL,
  `senha_coletor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_coletor_coleta`
--

CREATE TABLE `tb_coletor_coleta` (
  `id_coletor` int(11) NOT NULL,
  `id_coleta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_notificacoes`
--

CREATE TABLE `tb_notificacoes` (
  `id_notificacao` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `mensagem_notificacao` varchar(256) NOT NULL,
  `status_notificacao` tinyint(1) NOT NULL,
  `criacao_notificacao` datetime NOT NULL,
  `ultima_notificacao` datetime NOT NULL,
  `tipo_notificacao` varchar(48) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_user` int(11) NOT NULL,
  `nome_user` varchar(48) NOT NULL,
  `datanascimento_user` date NOT NULL,
  `email_user` varchar(128) NOT NULL,
  `senha_user` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario_coleta`
--

CREATE TABLE `tb_usuario_coleta` (
  `id_user` int(11) NOT NULL,
  `id_coleta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_coleta`
--
ALTER TABLE `tb_coleta`
  ADD PRIMARY KEY (`id_coleta`);

--
-- Índices para tabela `tb_coletor`
--
ALTER TABLE `tb_coletor`
  ADD PRIMARY KEY (`id_coletor`);

--
-- Índices para tabela `tb_coletor_coleta`
--
ALTER TABLE `tb_coletor_coleta`
  ADD KEY `id_coleta` (`id_coleta`),
  ADD KEY `tb_coletor_coleta_ibfk_2` (`id_coletor`);

--
-- Índices para tabela `tb_notificacoes`
--
ALTER TABLE `tb_notificacoes`
  ADD PRIMARY KEY (`id_notificacao`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices para tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- Índices para tabela `tb_usuario_coleta`
--
ALTER TABLE `tb_usuario_coleta`
  ADD KEY `id_coleta` (`id_coleta`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_coleta`
--
ALTER TABLE `tb_coleta`
  MODIFY `id_coleta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_coletor`
--
ALTER TABLE `tb_coletor`
  MODIFY `id_coletor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_notificacoes`
--
ALTER TABLE `tb_notificacoes`
  MODIFY `id_notificacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_coletor_coleta`
--
ALTER TABLE `tb_coletor_coleta`
  ADD CONSTRAINT `tb_coletor_coleta_ibfk_1` FOREIGN KEY (`id_coleta`) REFERENCES `tb_coleta` (`id_coleta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_coletor_coleta_ibfk_2` FOREIGN KEY (`id_coletor`) REFERENCES `tb_coletor` (`id_coletor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_notificacoes`
--
ALTER TABLE `tb_notificacoes`
  ADD CONSTRAINT `tb_notificacoes_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_usuario` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_usuario_coleta`
--
ALTER TABLE `tb_usuario_coleta`
  ADD CONSTRAINT `tb_usuario_coleta_ibfk_1` FOREIGN KEY (`id_coleta`) REFERENCES `tb_coleta` (`id_coleta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_usuario_coleta_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_usuario` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
