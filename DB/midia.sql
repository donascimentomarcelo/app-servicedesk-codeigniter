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
  `gravadora` varchar(32) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Extraindo dados da tabela `cd`
--

INSERT INTO `cd` (`idcd`, `nomecd`, `gravadora`) VALUES
(3, 'Sergio Lopes', 'MK'),
(4, 'Sergio Lopes', 'MK'),
(5, 'Teste', 'abc'),
(7, 'Hisoka', 'Hunter x Hunter'),
(8, 'Kano', 'Mortal Kombat'),
(9, 'Ali', 'ali'),
(16, 'teste 3', 'teste 345'),
(34, 'teste 25', 'teste 25'),
(35, 'tttty', 'tytyyyyy'),
(38, 'hyhy', 'yhyhy'),
(39, 'eeed', 'ededed'),
(40, 'tgtgtg', 'tgtgtg'),
(42, 'teste ', 'teste'),
(43, 'rfrfrfr', 'frfrfrf'),
(44, 'eeeeeeeeeee', 'eeeeeeeeeeeeee'),
(45, 'dddddddddddddd', 'ddddddddddddddd'),
(46, 'dddddddddds', 'ssssssssss'),
(47, 'deeee', 'dee'),
(48, '333333', '3333333'),
(49, 'ffffff', 'ffffffffffff'),
(50, 'rrffrr', 'ffrfrfr'),
(51, 'ssssss', 'sssssssssssss'),
(52, 'eeeee', 'eeeeeeeeeeeee'),
(53, 'wwwwww', 'wwwwwww'),
(54, 'ssssssss', 'sssssssssssssss'),
(55, 'ssssssss', 'sssssssssssssss');

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE IF NOT EXISTS `setor` (
`idsetor` int(11) NOT NULL,
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
  `setor_fk` int NOT NULL,
   foreign key(setor_fk) references setor(idsetor)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `perfil`, `status`, `setor_fk`) VALUES
(1, 'Marcelo', 'marcelojunin2010@hotmail.com', '123', 'administrador', 'ativo', 4),
(2, 'Marcelo do Nascimento Sant'' Anna Junior', 'teste', '123', 'usuario', 'ativo', 1);

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
