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
  `gravadora` varchar(32) NOT NULL,
   `datainicial` datetime NOT NULL,
  `datafinal` datetime NOT NULL,
  `nome` varchar(32) NOT NULL,
  `ramal` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `nometec` varchar(32) NOT NULL,
  `ramaltec` varchar(32) NOT NULL,
  `emailtec` varchar(32) NOT NULL,
  `statuschamado` enum('aguardando','ematendimento') NOT NULL,
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
  `nometecnico` varchar(32) NOT NULL,
  `ramaltecnico` varchar(32) NOT NULL,
  `emailtecnico` varchar(32) NOT NULL,
  `data` datetime NOT NULL,
  `chamado_fk`  int NOT NULL,
  foreign key(chamado_fk) references chamado(idchamado)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;


/*CREATE TABLE IF NOT EXISTS `chamado_historico` (
  `idchamado_historico` int primary key auto_increment,
   `chamado_fk`  int NOT NULL,
   `historico_fk`  int NOT NULL,
    foreign key(chamado_fk) references chamado(idchamado),
    foreign key(historico_fk) references historico(idhistorico)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
*/
--
-- Extraindo dados da tabela `cd`
--

INSERT INTO `chamado` (`idchamado`, `nomechamado`, `gravadora`, `datainicial`, `datafinal`, `nome`, `ramal`, `email`, `descricao`, `setor_fk`, `usuarios_fk`, `categoria_fk`, `subcategoria_fk`) VALUES
(1, 'Teste 1', '0', '2016-10-03 09:00:00', '2016-10-05 13:19:00', 'Marcelo do Nascimento Sant'' Anna', '1248', 'marcelojunin2010@hotmail.com', 'Hoje acordei cedo, contemplei mais uma vez a natureza. A chuva fina chegava de mansinho. O encanto e aroma matinal traziam um ar de reflexão.  Enquanto isso, o meio ambiente pedia socorro. Era o homem construindo e destruindo a sua casa. ', 1, 3, 2, 1),
(2, 'teste 2', '0', '2016-10-03 11:00:00', '2016-10-03 21:37:00', 'Marcelo do Nascimento Sant'' Anna', '1248', 'marcelojunin2010@hotmail.com', 'A sua irritação não solucionará problema algum. As suas contrariedades não alteram a natureza das coisas. Os seus desapontamentos não fazem o trabalho que só o tempo conseguirá realizar.', 1, 3, 1, 7),
(14, 'Teste 3', '0', '2016-10-05 14:38:13', '2016-10-05 16:38:13', 'Marcelo do Nascimento Sant'' Anna', '1248', 'marcelojunin2010@hotmail.com', 'tttttt', 1, 3, 2, 2),
(15, 'Teste 4', '0', '2016-10-06 13:31:33', '2016-10-06 16:31:33', 'Marcelo do Nascimento Sant'' Anna', '1248', 'marcelojunin2010@hotmail.com', 'Testando o sistema', 1, 3, 1, 3),
(39, 'Teste 4', '0', '2016-10-06 14:21:11', '2016-10-06 15:21:11', 'Marcelo do Nascimento Sant'' Anna', '1248', 'marcelojunin2010@hotmail.com', 'Teste', 1, 3, 2, 1),
(58, 'Teste 5', '0', '2016-10-06 14:22:57', '2016-10-06 20:22:57', 'Marcelo do Nascimento Sant'' Anna', '1248', 'marcelojunin2010@hotmail.com', 'Teste 123456', 1, 3, 3, 6);


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
