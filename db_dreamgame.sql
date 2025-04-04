-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/04/2025 às 04:02
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
-- Banco de dados: `db_dreamgame`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_info_users`
--

CREATE TABLE `tb_info_users` (
  `ID_info` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `ID_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_produtos`
--

CREATE TABLE `tb_produtos` (
  `ID` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `ano` year(4) DEFAULT NULL,
  `desenvolvedor` varchar(100) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `tamanho` decimal(5,2) NOT NULL,
  `avaliacao` tinyint(2) NOT NULL CHECK (`avaliacao` between 0 and 10)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_produtos`
--

INSERT INTO `tb_produtos` (`ID`, `titulo`, `valor`, `ano`, `desenvolvedor`, `genero`, `descricao`, `tamanho`, `avaliacao`) VALUES
(1, 'Homem Aranha 2', 99.99, '2023', 'Sony Pictures', 'Ação', 'Entre no mundo emocionante do Homem-Aranha...', 9.99, 3),
(2, 'Homem Aranha', 99.99, '2023', 'Sony Pictures', 'Ação', 'Entre no mundo emocionante do Homem-Aranha...', 9.99, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `ID_users` int(11) NOT NULL,
  `apelido` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `nascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_info_users`
--
ALTER TABLE `tb_info_users`
  ADD PRIMARY KEY (`ID_info`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `ID_users` (`ID_users`);

--
-- Índices de tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`ID_users`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_info_users`
--
ALTER TABLE `tb_info_users`
  MODIFY `ID_info` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `ID_users` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_info_users`
--
ALTER TABLE `tb_info_users`
  ADD CONSTRAINT `tb_info_users_ibfk_1` FOREIGN KEY (`ID_users`) REFERENCES `tb_users` (`ID_users`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
