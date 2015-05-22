-- MySQL dump 10.15  Distrib 10.0.19-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: Pruebas
-- ------------------------------------------------------
-- Server version	10.0.19-MariaDB-1~vivid-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `codigo_cli` int(11) NOT NULL DEFAULT '0',
  `nombre_cli` char(30) NOT NULL,
  `rfc` char(12) DEFAULT NULL,
  `direccion` char(30) DEFAULT NULL,
  `ciudad` char(20) DEFAULT NULL,
  `telefono` char(12) DEFAULT NULL,
  PRIMARY KEY (`codigo_cli`),
  UNIQUE KEY `rfc` (`rfc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (10,'ECIGSA','PUHA571010','Aragon 11','Queretaro','NULL'),(20,'CME','GUHA571010','Valencia 22','Guazve','972235721'),(30,'ACME','PIHA571010','Mallorca 33','Leon','973234567'),(40,'JGM','PUJA571010','RosellÃ³n 44','Toluca','977337143');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamentos` (
  `nombre_dep` char(20) NOT NULL DEFAULT '',
  `ciudad_dep` char(20) NOT NULL DEFAULT '',
  `telefono` int(11) DEFAULT NULL,
  PRIMARY KEY (`nombre_dep`,`ciudad_dep`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` VALUES ('DIR','Barcelona',934226070),('DIR','Girona',972238970),('DIS','Barcelona',932248523),('DIS','Lleida',973235040),('PROG','Girona',972235091),('PROG','Tarragona',977333852);
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleados`
--

DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleados` (
  `codigo_empl` int(11) NOT NULL DEFAULT '0',
  `nombre_empl` char(20) DEFAULT NULL,
  `apellido_empl` char(20) DEFAULT NULL,
  `sueldo` double DEFAULT NULL,
  `nombre_dep` char(20) DEFAULT NULL,
  `ciudad_dep` char(20) DEFAULT NULL,
  `num_proyec` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo_empl`),
  KEY `nombre_dep` (`nombre_dep`,`ciudad_dep`),
  KEY `num_proyec` (`num_proyec`),
  CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`nombre_dep`, `ciudad_dep`) REFERENCES `departamentos` (`nombre_dep`, `ciudad_dep`),
  CONSTRAINT `empleados_ibfk_2` FOREIGN KEY (`num_proyec`) REFERENCES `proyectos` (`codigo_proyec`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES (1,'María','Perez',100000,'DIR','Girona',1),(2,'Pedro','Martinez',90000,'DIR','Barcelona',4),(3,'Ana','Rosas',70000,'DIS','Lleida',3),(4,'Jorge','Romero',70000,'DIS','Barcelona',4),(5,'Clara','Blanco',40000,'PROG','Tarragona',1),(6,'Laura','Tamez',30000,'PROG','Tarragona',3),(7,'Rogelio','Saltillo',40000,NULL,NULL,4),(8,'Sergio','Granados',30000,'PROG','Tarragona',NULL);
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyectos`
--

DROP TABLE IF EXISTS `proyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyectos` (
  `codigo_proyec` int(11) NOT NULL DEFAULT '0',
  `nombre_proyec` char(20) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_prev_fin` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `codigo_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo_proyec`),
  KEY `codigo_cliente` (`codigo_cliente`),
  CONSTRAINT `proyectos_ibfk_1` FOREIGN KEY (`codigo_cliente`) REFERENCES `clientes` (`codigo_cli`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyectos`
--

LOCK TABLES `proyectos` WRITE;
/*!40000 ALTER TABLE `proyectos` DISABLE KEYS */;
INSERT INTO `proyectos` VALUES (1,'GESCOM',1,'0001-01-08','0001-01-09','0000-00-00',10),(2,'PESCI',2,'0001-10-06','2031-03-08','0001-05-08',10),(3,'SALSA',1,'2010-02-08','0001-02-09','0000-00-00',20),(4,'TINELL',4,'0001-01-07','0001-12-09','0000-00-00',30);
/*!40000 ALTER TABLE `proyectos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-15 21:39:57
