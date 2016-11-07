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

CREATE TABLE IF NOT EXISTS `chamado` (
`idchamado` int primary key auto_increment,
 `nomechamado` varchar(32) NOT NULL,
  `codusuario` varchar(50) NOT NULL,
  `datainicial` datetime NOT NULL,
  `datafinal` datetime NOT NULL,
  `nome` varchar(50) NOT NULL,
  `ramal` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `nometec` varchar(50) NOT NULL,
  `ramaltec` varchar(32) NOT NULL,
  `emailtec` varchar(32) NOT NULL,
  `statuschamado` enum('aguardando','ematendimento','encerrar','reabrir') NOT NULL,
  `setor_fk` int NOT NULL,
  `usuarios_fk` int NOT NULL,
  `categoria_fk` int NOT NULL,
  `subcategoria_fk` int NOT NULL,
  foreign key(setor_fk) references setor(idsetor),
  foreign key(usuarios_fk) references usuarios(id),
  foreign key(categoria_fk) references categoria(idcategoria),
  foreign key(subcategoria_fk) references subcategoria(idsubcategoria)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;


CREATE TABLE IF NOT EXISTS `historico` (
  `idhistorico` int primary key auto_increment,
  `nometecnico` varchar(50) NOT NULL,
  `ramaltecnico` varchar(32) NOT NULL,
  `emailtecnico` varchar(32) NOT NULL,
  `data` datetime NOT NULL,
  `statuschamado` varchar(32) NOT NULL,
  `justificativa` varchar(500) NOT NULL,
  `chamado_fk`  int NOT NULL,
  `usuarios_fk` int NOT NULL,
  foreign key(chamado_fk) references chamado(idchamado),
  foreign key(usuarios_fk) references usuarios(id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;


/*CREATE TABLE IF NOT EXISTS `chamado_historico` (
  `idchamado_historico` int primary key auto_increment,
   `chamado_fk`  int NOT NULL,
   `historico_fk`  int NOT NULL,
    foreign key(chamado_fk) references chamado(idchamado),
    foreign key(historico_fk) references historico(idhistorico)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
*/


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

create table categoria (
    idcategoria int primary key auto_increment,
    nomecategoria varchar (20)
);

create table subcategoria (
    idsubcategoria int primary key auto_increment,
    nomesubCategoria varchar (20),
    categoria_fk int,
    foreign key (categoria_fk) references categoria(idcategoria)
);

create table inventario(
    idinventario int primary key auto_increment,
    nome varchar(20),
    modelo varchar(20),
    marca varchar(20)
    );

create table software(
    idsoftware int primary key auto_increment,
    nomesoftware varchar(20),
    serialsoftware varchar(20),
    marcasoftware varchar(20)
    );
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
