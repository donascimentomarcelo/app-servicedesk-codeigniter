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
   `datainicial` datetime NOT NULL,
  `datafinal` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Extraindo dados da tabela `cd`
--

INSERT INTO `cd` (`idcd`, `nomecd`, `gravadora`, `datainicial`, `datafinal`) VALUES
(3, 'Sergio Lopes', 'MK', '2016-09-27 07:43:00', '2016-09-27 15:28:00'),
(4, 'Sergio Lopes', 'MK', '2016-09-26 15:14:32', '2016-09-27 13:40:00'),
(5, 'Teste', 'abc', '2016-09-26 16:27:29', '2016-09-27 16:27:00'),
(7, 'Hisoka', 'Hunter x Hunter', '2016-09-27 09:19:15', '2016-09-27 14:20:00'),
(8, 'Kano', 'Mortal Kombat', '2016-09-27 06:59:00', '2016-09-28 14:10:00'),
(9, 'Ali', 'ali', '2016-09-27 07:37:37', '2016-09-28 11:17:00'),
(55, 'ssssssss', 'sssssssssssssss', '2016-09-23 13:20:00', '2016-09-29 16:16:00');


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
