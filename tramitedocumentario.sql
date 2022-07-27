-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 27, 2022 at 02:27 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tramitedocumentario`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `idalumno` int(11) NOT NULL AUTO_INCREMENT,
  `codigoalumno` varchar(10) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `direccion` varchar(300) DEFAULT NULL,
  `apellidos` varchar(300) DEFAULT NULL,
  `nombres` varchar(300) DEFAULT NULL,
  `idescuela` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT '0',
  PRIMARY KEY (`idalumno`),
  UNIQUE KEY `codigoalumno` (`codigoalumno`),
  KEY `FK_ALUMNO_ESCUELA` (`idescuela`),
  KEY `FK_ALUMNO_USUARIO` (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `alumno`
--

INSERT INTO `alumno` (`idalumno`, `codigoalumno`, `dni`, `email`, `celular`, `direccion`, `apellidos`, `nombres`, `idescuela`, `idusuario`, `estado`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `idarea` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(300) NOT NULL,
  PRIMARY KEY (`idarea`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `egresado`
--

CREATE TABLE IF NOT EXISTS `egresado` (
  `idegresado` int(11) NOT NULL AUTO_INCREMENT,
  `dni` varchar(8) DEFAULT NULL,
  `idescuela` int(11) DEFAULT NULL,
  `direccion` varchar(300) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  `idusuario` int(11) NOT NULL,
  `email` varchar(300) DEFAULT NULL,
  `apellidos` varchar(300) DEFAULT NULL,
  `nombres` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`idegresado`),
  KEY `FK_ESCUELA_EGRESADO` (`idescuela`),
  KEY `FK_USUARIO_EGRESADO` (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `egresado`
--

INSERT INTO `egresado` (`idegresado`, `dni`, `idescuela`, `direccion`, `estado`, `idusuario`, `email`, `apellidos`, `nombres`) VALUES
(1, NULL, NULL, NULL, 0, 5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `escuela`
--

CREATE TABLE IF NOT EXISTS `escuela` (
  `idescuela` int(11) NOT NULL AUTO_INCREMENT,
  `escuela` varchar(300) NOT NULL,
  `idfacultad` int(11) NOT NULL,
  PRIMARY KEY (`idescuela`),
  KEY `FK_FACULTADESCUELA` (`idfacultad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `escuela`
--

INSERT INTO `escuela` (`idescuela`, `escuela`, `idfacultad`) VALUES
(1, 'INGENIERIA INDUSTRIAL', 2),
(2, 'SISTEMAS', 2),
(3, 'DERECHO Y CIENCIAS POLITICAS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `estadocuenta`
--

CREATE TABLE IF NOT EXISTS `estadocuenta` (
  `idestadocuenta` int(11) NOT NULL AUTO_INCREMENT,
  `estadocuenta` varchar(300) NOT NULL,
  PRIMARY KEY (`idestadocuenta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `estadocuenta`
--

INSERT INTO `estadocuenta` (`idestadocuenta`, `estadocuenta`) VALUES
(1, 'DESHABILITADA'),
(2, 'HABILITADA');

-- --------------------------------------------------------

--
-- Table structure for table `estadotramite`
--

CREATE TABLE IF NOT EXISTS `estadotramite` (
  `idestadotramite` int(11) NOT NULL AUTO_INCREMENT,
  `estadotramite` varchar(300) NOT NULL,
  PRIMARY KEY (`idestadotramite`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `estadotramite`
--

INSERT INTO `estadotramite` (`idestadotramite`, `estadotramite`) VALUES
(1, 'ENVIADO'),
(2, 'RECIBIDO'),
(3, 'REVISADO'),
(4, 'ANULADO');

-- --------------------------------------------------------

--
-- Table structure for table `facultad`
--

CREATE TABLE IF NOT EXISTS `facultad` (
  `idfacultad` int(11) NOT NULL AUTO_INCREMENT,
  `facultad` varchar(300) NOT NULL,
  PRIMARY KEY (`idfacultad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `facultad`
--

INSERT INTO `facultad` (`idfacultad`, `facultad`) VALUES
(1, 'DERECHO'),
(2, 'FIISI');

-- --------------------------------------------------------

--
-- Table structure for table `historialtramite`
--

CREATE TABLE IF NOT EXISTS `historialtramite` (
  `idhistorialtramite` int(11) NOT NULL AUTO_INCREMENT,
  `idtramite` varchar(8) NOT NULL,
  `fechaactualizacion` date NOT NULL,
  `idestadotramite` int(11) NOT NULL,
  PRIMARY KEY (`idhistorialtramite`),
  KEY `FK_ESTADOTRAMITE_HISTORIAL` (`idestadotramite`),
  KEY `FK_TRAMITE_HISTORIAL` (`idtramite`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `institucion`
--

CREATE TABLE IF NOT EXISTS `institucion` (
  `idinstitucion` int(11) NOT NULL AUTO_INCREMENT,
  `ruc` varchar(300) DEFAULT NULL,
  `razon social` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `direccion` varchar(300) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idinstitucion`),
  KEY `FK_USUARIOINSTITUCION` (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `institucion`
--

INSERT INTO `institucion` (`idinstitucion`, `ruc`, `razon social`, `email`, `telefono`, `direccion`, `estado`, `idusuario`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `motivo`
--

CREATE TABLE IF NOT EXISTS `motivo` (
  `idmotivo` int(11) NOT NULL AUTO_INCREMENT,
  `motivo` varchar(300) NOT NULL,
  PRIMARY KEY (`idmotivo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `motivo`
--

INSERT INTO `motivo` (`idmotivo`, `motivo`) VALUES
(1, 'informacion incorrecta'),
(2, 'falta de informacion'),
(3, 'otro motivo');

-- --------------------------------------------------------

--
-- Table structure for table `observacion`
--

CREATE TABLE IF NOT EXISTS `observacion` (
  `idobservacion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(300) NOT NULL,
  `idtramite` varchar(8) NOT NULL,
  `idmotivo` int(11) NOT NULL,
  PRIMARY KEY (`idobservacion`),
  KEY `FK_MOTIVO_OBSERVACION` (`idmotivo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
  `idpersonal` int(11) NOT NULL AUTO_INCREMENT,
  `codigoadministrativo` varchar(10) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `direccion` varchar(300) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  `apellidos` varchar(300) DEFAULT NULL,
  `nombres` varchar(300) DEFAULT NULL,
  `idarea` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `idescuela` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpersonal`),
  KEY `FK_AREA__PERSONAL` (`idarea`),
  KEY `FK_USUARIO__PERSONAL` (`idusuario`),
  KEY `FK_ESCUELA__PERSONAL` (`idescuela`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`idpersonal`, `codigoadministrativo`, `dni`, `email`, `celular`, `direccion`, `estado`, `apellidos`, `nombres`, `idarea`, `idusuario`, `idescuela`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tipotramite`
--

CREATE TABLE IF NOT EXISTS `tipotramite` (
  `idtipotramite` int(11) NOT NULL AUTO_INCREMENT,
  `tipotramite` varchar(300) NOT NULL,
  PRIMARY KEY (`idtipotramite`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tipousuario`
--

CREATE TABLE IF NOT EXISTS `tipousuario` (
  `idtipousuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipousuario` varchar(300) NOT NULL,
  PRIMARY KEY (`idtipousuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tipousuario`
--

INSERT INTO `tipousuario` (`idtipousuario`, `tipousuario`) VALUES
(1, 'alumno'),
(2, 'egresado'),
(3, 'personal administrativo'),
(4, 'institucion'),
(5, 'administrador');

-- --------------------------------------------------------

--
-- Table structure for table `tramite`
--

CREATE TABLE IF NOT EXISTS `tramite` (
  `idtramite` varchar(8) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idarea` int(11) NOT NULL,
  `idtipotramite` int(11) NOT NULL,
  `fecharegistro` date NOT NULL,
  `asunto` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  PRIMARY KEY (`idtramite`),
  KEY `FK_USUARIO_TRAMITE` (`idusuario`),
  KEY `FK_TIPOTRAMITE_TRAMITE` (`idtipotramite`),
  KEY `FK_AREA_TRAMITE` (`idarea`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `idtipousuario` int(11) NOT NULL,
  `idestadocuenta` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `FK_TIPOUSUARIO` (`idtipousuario`),
  KEY `FK_ESTADOUSUARIO` (`idestadocuenta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idusuario`, `username`, `password`, `idtipousuario`, `idestadocuenta`) VALUES
(3, 'chokidar', '123123123', 1, 2),
(4, 'personal', '123123123', 3, 2),
(5, 'egresado', '123123123', 2, 1),
(6, 'institucion', '123123123', 4, 1),
(7, 'administrador', 'administrador', 5, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `FK_ALUMNO_ESCUELA` FOREIGN KEY (`idescuela`) REFERENCES `escuela` (`idescuela`),
  ADD CONSTRAINT `FK_ALUMNO_USUARIO` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Constraints for table `egresado`
--
ALTER TABLE `egresado`
  ADD CONSTRAINT `FK_ESCUELA_EGRESADO` FOREIGN KEY (`idescuela`) REFERENCES `escuela` (`idescuela`),
  ADD CONSTRAINT `FK_USUARIO_EGRESADO` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Constraints for table `escuela`
--
ALTER TABLE `escuela`
  ADD CONSTRAINT `FK_FACULTADESCUELA` FOREIGN KEY (`idfacultad`) REFERENCES `facultad` (`idfacultad`);

--
-- Constraints for table `historialtramite`
--
ALTER TABLE `historialtramite`
  ADD CONSTRAINT `FK_ESTADOTRAMITE_HISTORIAL` FOREIGN KEY (`idestadotramite`) REFERENCES `estadotramite` (`idestadotramite`),
  ADD CONSTRAINT `FK_TRAMITE_HISTORIAL` FOREIGN KEY (`idtramite`) REFERENCES `tramite` (`idtramite`);

--
-- Constraints for table `institucion`
--
ALTER TABLE `institucion`
  ADD CONSTRAINT `FK_USUARIOINSTITUCION` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Constraints for table `observacion`
--
ALTER TABLE `observacion`
  ADD CONSTRAINT `FK_MOTIVO_OBSERVACION` FOREIGN KEY (`idmotivo`) REFERENCES `motivo` (`idmotivo`);

--
-- Constraints for table `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `FK_AREA__PERSONAL` FOREIGN KEY (`idarea`) REFERENCES `area` (`idarea`),
  ADD CONSTRAINT `FK_USUARIO__PERSONAL` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `FK_ESCUELA__PERSONAL` FOREIGN KEY (`idescuela`) REFERENCES `escuela` (`idescuela`);

--
-- Constraints for table `tramite`
--
ALTER TABLE `tramite`
  ADD CONSTRAINT `FK_AREA_TRAMITE` FOREIGN KEY (`idarea`) REFERENCES `area` (`idarea`),
  ADD CONSTRAINT `FK_TIPOTRAMITE_TRAMITE` FOREIGN KEY (`idtipotramite`) REFERENCES `tipotramite` (`idtipotramite`),
  ADD CONSTRAINT `FK_USUARIO_TRAMITE` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_ESTADOUSUARIO` FOREIGN KEY (`idestadocuenta`) REFERENCES `estadocuenta` (`idestadocuenta`),
  ADD CONSTRAINT `FK_TIPOUSUARIO` FOREIGN KEY (`idtipousuario`) REFERENCES `tipousuario` (`idtipousuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
