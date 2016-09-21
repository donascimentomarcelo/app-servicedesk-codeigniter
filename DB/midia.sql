-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31-Ago-2016 às 15:55
-- Versão do servidor: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `midia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cd`
--

CREATE TABLE IF NOT EXISTS `cd` (
`idcd` int(11) NOT NULL,
  `nomecd` varchar(32) NOT NULL,
  `gravadora` varchar(32) NOT NULL,
  `datafinal` date NOT NULL,
  `horafinal` varchar(255) NOT NULL,
  `minutofinal` varchar(101) NOT NULL,
  `data` datetime NOT NULL,
  `datainicial` date NOT NULL,
  `hora` time(6) NOT NULL,
  `sla` int(101) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Extraindo dados da tabela `cd`
--

INSERT INTO `cd` (`idcd`, `nomecd`, `gravadora`, `datafinal`, `horafinal`, `minutofinal`, `data`, `datainicial`, `hora`, `sla`) VALUES
(3, 'Sergio Lopes', 'MK', '2016-09-20', '15', '28', '2016-09-19 15:28:00', '2016-09-19', '15:32:00.000000', 8),
(4, 'Sergio Lopes', 'MK', '2016-09-21', '21', '40', '2016-09-21 21:40:00', '2016-09-20', '07:07:00.000000', 18),
(5, 'Teste', 'abc', '2016-09-20', '13', '37', '2016-09-20 13:37:00', '2016-09-20', '12:37:00.000000', 1),
(7, 'Hisoka', 'Hunter x Hunter', '2016-09-22', '12', '20', '2016-09-21 12:20:00', '2016-09-20', '18:17:00.000000', 48),
(8, 'Kano', 'Mortal Kombat', '2016-09-22', '14', '10', '2016-09-23 14:10:00', '2016-09-20', '14:07:00.000000', 20),
(9, 'Ali', 'ali', '2016-09-20', '11', '17', '2016-09-21 11:17:00', '2016-09-20', '15:11:00.000000', 5),
(55, 'ssssssss', 'sssssssssssssss', '2016-09-20', '16', '16', '2016-09-21 16:16:00', '2016-09-19', '16:14:00.000000', 2);


-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE IF NOT EXISTS `setor` (
`idsetor` int primary key auto_increment,
  `nomesetor` varchar(255) NOT NULL,
  `statussetor` enum('ativo','inativo') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`idsetor`, `nomesetor`, `statussetor`) VALUES
(1, 'TI', 'ativo'),
(2, 'Suporte', 'ativo'),
(3, 'Engenharia', 'ativo'),
(4, 'Arquitetura', 'inativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int primary key auto_increment,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `perfil` enum('administrador','usuario') NOT NULL,
  `status` enum('ativo','inativo') NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `setor_fk` int NOT NULL,
   foreign key(setor_fk) references setor(idsetor)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `perfil`, `status`, `imagem`, `setor_fk`) VALUES
(3, 'Marcelo do Nascimento Sant'' Anna Junior', 'marcelojunin2010@hotmail.com', '123', 'administrador', 'ativo', './imagem/3174757d822c05e605.png', 1),
(4, 'Joana', 'teste@teste', '123', 'usuario', 'ativo', './imagem/3166057d82e72dc56d.jpg', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cd`
--
ALTER TABLE `cd`
 ADD PRIMARY KEY (`idcd`);

--
-- Indexes for table `setor`
--
ALTER TABLE `setor`
 ADD PRIMARY KEY (`idsetor`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cd`
--
ALTER TABLE `cd`
MODIFY `idcd` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `setor`
--
ALTER TABLE `setor`
MODIFY `idsetor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
