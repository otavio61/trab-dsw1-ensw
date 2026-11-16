-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/11/2026 às 04:41
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
-- Banco de dados: `bancobat`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alternativa_questao`
--

CREATE TABLE `alternativa_questao` (
  `id` int(11) NOT NULL,
  `id_questao` int(11) NOT NULL,
  `descricao` varchar(6000) NOT NULL,
  `resposta_correta` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alternativa_questao`
--

INSERT INTO `alternativa_questao` (`id`, `id_questao`, `descricao`, `resposta_correta`) VALUES
(1, 1, 'Modelo Entidade-Relacionamento', 1),
(2, 1, 'Modelo Estrutural Relacional', 0),
(3, 1, 'Método de Estrutura de Registros', 0),
(4, 2, 'Criar consultas SQL', 0),
(5, 2, 'Representar graficamente entidades e relacionamentos', 1),
(6, 2, 'Armazenar os dados do banco', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `materia`
--

INSERT INTO `materia` (`id`, `nome`) VALUES
(1, 'Banco de dados'),
(2, 'Linguagem de programação 1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `questao`
--

CREATE TABLE `questao` (
  `id` int(11) NOT NULL,
  `enunciado` varchar(6000) NOT NULL,
  `valor_questao` int(11) NOT NULL,
  `materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `questao`
--

INSERT INTO `questao` (`id`, `enunciado`, `valor_questao`, `materia`) VALUES
(1, 'O que significa a sigla MER?', 1, 1),
(2, 'Qual é a principal finalidade de um DER?', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` text NOT NULL,
  `tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `data_nascimento`, `email`, `senha`, `tipo_usuario`) VALUES
(4, 'teste', '2026-11-12', 'teste@email.com', '$2y$10$k6nRk51wEyd/XQKRvEoJo.82fRVMH1jHOsOXg9F3Es7EZeAfp0rGS', 0),
(6, 'Carlos', '1999-03-12', 'carlos@email.com', '$2y$10$9I8yW5A.78TkeFBACWKdvu7XNxUDb30KG8O36k3M5Pbs4Aal/RajC', 0),
(7, 'Otávio de Moraes', '2006-06-14', 'otavio@email.com', '$2y$10$QyhuLBHKOk5ZtFfg5aLzbOcBaWtQjP/XskCp8LIHa3BLodrBcvup.', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alternativa_questao`
--
ALTER TABLE `alternativa_questao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_questao` (`id_questao`);

--
-- Índices de tabela `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `questao`
--
ALTER TABLE `questao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materia` (`materia`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alternativa_questao`
--
ALTER TABLE `alternativa_questao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `questao`
--
ALTER TABLE `questao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `alternativa_questao`
--
ALTER TABLE `alternativa_questao`
  ADD CONSTRAINT `alternativa_questao_ibfk_1` FOREIGN KEY (`id_questao`) REFERENCES `questao` (`id`);

--
-- Restrições para tabelas `questao`
--
ALTER TABLE `questao`
  ADD CONSTRAINT `questao_ibfk_1` FOREIGN KEY (`materia`) REFERENCES `materia` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
