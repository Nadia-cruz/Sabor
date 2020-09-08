-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 08, 2020 at 04:41 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `Idcategoria` int(11) NOT NULL COMMENT '(PK) ID da categoria',
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`Idcategoria`, `categoria`) VALUES
(1, 'Doces'),
(2, 'Salgados');

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `Idestado` int(11) NOT NULL COMMENT '(PK) ID da estado',
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`Idestado`, `tipo`) VALUES
(1, 'aprovado'),
(2, 'reprovado');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `Idmenu` int(11) NOT NULL COMMENT '(PK) ID da menu',
  `nome` varchar(45) NOT NULL,
  `preco` float NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `imagem` varchar(45) DEFAULT NULL,
  `categoria` varchar(20) NOT NULL,
  `idutilizador` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`Idmenu`, `nome`, `preco`, `descricao`, `imagem`, `categoria`, `idutilizador`) VALUES
(33, 'Pastel de milho', 15, 'Farinha de milho com recheio de peixe.', 'OIP_1596310165.jpg', 'Salgados', 3),
(34, 'Cachupa guisada', 190, 'Cahupa gizado com ovo estrelado.', 'ca_1596310336.jpg', 'Salgados', 3),
(35, 'cachupa ', 150, 'Carnes variados, milho, feijão e verduras.', 'cachup_1596310523.jpg', 'Salgados', 3),
(36, 'cuscuz simples', 60, 'Farinha de milho, purê de batata e canela.', 'OIP (1)_1596310572.jpg', 'Doces', 3),
(37, 'donetes', 20, 'Farinha de trigo, leite , sal e açúcar. ', 'donet_1599315380.jpg', 'Doces', 3),
(38, 'Queijada de coco', 50, 'Açúcar, coco e ovos.', 'queijadas-coco_1599315650.jpg', 'Doces', 3),
(39, 'Fidjós', 15, 'Farinha de trigo, banana e leite.', 'fidjos_1599315832.jpg', 'Doces', 3),
(41, 'Polvo', 450, 'Polvo grelhado, arroz, batata frita e salada.', 'comer_1599316183.jpg', 'Salgados', 3),
(42, 'Lagosta', 600, 'Lagosta  com salada e molho.', 'langosta_1599316509.jpg', 'Salgados', 3),
(44, 'Queijada ', 55, 'Queijo nacional ( de cabra) , ovos, leite, farinha e açúcar.', 'queijada_1599316838.jpg', 'Doces', 3),
(45, 'Sardinha', 200, 'Sardinhas grelhadas com molho verde.', 'images_1599317086.jpg', 'Salgados', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

CREATE TABLE `pedido` (
  `Idpedido` int(11) NOT NULL COMMENT '(PK) ID da pedido',
  `menu` int(11) NOT NULL,
  `obcevacoes` varchar(100) NOT NULL,
  `Idutilizador` int(10) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tipoutilizador`
--

CREATE TABLE `tipoutilizador` (
  `Idtipoutilizador` int(11) NOT NULL COMMENT '(PK) ID do tipoutilizador',
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipoutilizador`
--

INSERT INTO `tipoutilizador` (`Idtipoutilizador`, `tipo`) VALUES
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Table structure for table `utilizador`
--

CREATE TABLE `utilizador` (
  `Idutilizador` int(10) NOT NULL COMMENT '(PK) ID da utilizador',
  `nome` varchar(45) NOT NULL,
  `telefone` int(12) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `password` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilizador`
--

INSERT INTO `utilizador` (`Idutilizador`, `nome`, `telefone`, `email`, `endereco`, `password`, `username`, `tipo`, `estado`) VALUES
(3, 'admin', NULL, 'admin@gmail.com', 'Mindelo', '1234', 'admin', '1', '1'),
(4, 'ana rita', 963258123, 'ana@gmail.com', 'Monte sossego', '1234', 'ana', '2', '1'),
(6, 'nadia cruz', 938495236, 'nadia@gmail.com', 'Monte Sossego', '1234', 'nadia', '2', '1'),
(9, 'joana lima', 938495852, 'jo@gmail.com', 'Monte Sossego', '1234', 'joana', '2', '1'),
(10, 'Rita Ramos', 923654789, 'rita@gmail.com', 'Mindelo', '1234', 'rita', '2', '1'),
(11, 'Annica Almeida', 952147856, 'anni@gmail.com', 'Mindelo', '1234', 'annica', '2', '1'),
(18, 'Nadir Cruz', 938495663, 'dir@gmail.com', 'Monte Sossego', '1234', 'nadir', '2', '1'),
(19, 'Nadine Ramos', 938492563, 'nadine@gmail.com', 'Monte Sossego', '1234', 'nadine', 'cliente', 'aprovado'),
(20, 'Rui Rogriges', 965123478, 'rui@gmail.com', 'Chá de alecrim', '1234', 'rui', 'cliente', 'aprovado'),
(21, 'Fernanda Fernades', 951753258, 'fe@gmail.com', 'Chá de alecrim', '1234', 'fernada', 'cliente', 'aprovado');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria`) USING BTREE,
  ADD UNIQUE KEY `Idcategoria` (`Idcategoria`),
  ADD UNIQUE KEY `categoria` (`categoria`) USING BTREE;

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`tipo`),
  ADD UNIQUE KEY `idestado` (`Idestado`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`Idmenu`),
  ADD KEY `menu_utilizador` (`idutilizador`),
  ADD KEY `categoria` (`categoria`) USING BTREE;

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Idpedido`),
  ADD KEY `pedido_menu` (`menu`),
  ADD KEY `pedido_utilizador` (`Idutilizador`);

--
-- Indexes for table `tipoutilizador`
--
ALTER TABLE `tipoutilizador`
  ADD PRIMARY KEY (`tipo`),
  ADD UNIQUE KEY `idtipoutilizador` (`Idtipoutilizador`);

--
-- Indexes for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`Idutilizador`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `estado` (`estado`),
  ADD KEY `tipo_utilizador` (`tipo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `Idcategoria` int(11) NOT NULL AUTO_INCREMENT COMMENT '(PK) ID da categoria', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `Idestado` int(11) NOT NULL AUTO_INCREMENT COMMENT '(PK) ID da estado', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `Idmenu` int(11) NOT NULL AUTO_INCREMENT COMMENT '(PK) ID da menu', AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `Idpedido` int(11) NOT NULL AUTO_INCREMENT COMMENT '(PK) ID da pedido';

--
-- AUTO_INCREMENT for table `tipoutilizador`
--
ALTER TABLE `tipoutilizador`
  MODIFY `Idtipoutilizador` int(11) NOT NULL AUTO_INCREMENT COMMENT '(PK) ID do tipoutilizador', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `Idutilizador` int(10) NOT NULL AUTO_INCREMENT COMMENT '(PK) ID da utilizador', AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_utilizador` FOREIGN KEY (`idutilizador`) REFERENCES `utilizador` (`Idutilizador`) ON DELETE NO ACTION;

--
-- Constraints for table `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_menu` FOREIGN KEY (`menu`) REFERENCES `menu` (`Idmenu`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedido_utilizador` FOREIGN KEY (`Idutilizador`) REFERENCES `utilizador` (`Idutilizador`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
