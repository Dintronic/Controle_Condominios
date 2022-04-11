-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Abr-2022 às 23:48
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `condominio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ramal`
--

CREATE TABLE `ramal` (
  `id` int(11) NOT NULL,
  `ramal` decimal(4,0) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `data_entrada` date DEFAULT NULL,
  `reclamacao` varchar(30) DEFAULT NULL,
  `defeito` varchar(35) DEFAULT NULL,
  `reparo` varchar(40) DEFAULT NULL,
  `data_fechamento` date DEFAULT NULL,
  `observacao` varchar(80) DEFAULT NULL,
  `situacao` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ramal`
--

INSERT INTO `ramal` (`id`, `ramal`, `nome`, `data_entrada`, `reclamacao`, `defeito`, `reparo`, `data_fechamento`, `observacao`, `situacao`) VALUES
(1, '4001', 'Joaquim Souza', '2022-04-10', 'Mudo', 'Placa Danificada', 'Trocado Placa', '2022-04-11', 'CP 352 Intelbras', 'OK'),
(2, '4002', 'Amanda Silva', '2022-04-10', 'Só Recebe', 'Aparelho Telefônico Quebrado', 'Orientado a Trocar Aparelho Telefônico', '2022-04-11', '', 'Teste'),
(3, '4003', 'Ricardo Moura', '2022-04-12', 'Portaria Reclamou', 'Cabo Rompido', 'Refeita Ligação Externa', '2022-04-11', '', 'Defeito');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nome` varchar(15) DEFAULT NULL,
  `senha` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `nome`, `senha`) VALUES
(1, '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `ramal`
--
ALTER TABLE `ramal`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ramal`
--
ALTER TABLE `ramal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
