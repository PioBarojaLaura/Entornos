-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: ropa
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

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
-- Table structure for table `calzado`
--

DROP TABLE IF EXISTS `calzado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calzado` (
  `id` int(11) NOT NULL,
  `talla` int(11) DEFAULT NULL,
  `precio` decimal(5,2) DEFAULT NULL,
  `marca` int(11) DEFAULT NULL,
  `color` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `marca` (`marca`),
  CONSTRAINT `calzado_ibfk_1` FOREIGN KEY (`marca`) REFERENCES `marca` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calzado`
--

LOCK TABLES `calzado` WRITE;
/*!40000 ALTER TABLE `calzado` DISABLE KEYS */;
INSERT INTO `calzado` VALUES (1,45,109.90,6,'Azul'),(2,41,69.90,6,'Blanca'),(3,44,29.90,5,'Gris'),(4,43,39.90,7,'Blanca'),(5,42,89.90,7,'Blanca'),(6,45,89.90,8,'Gris'),(7,40,19.90,5,'Azul'),(8,42,64.90,7,'Roja'),(9,41,57.90,6,'Blanca'),(10,46,112.90,6,'Verde');
/*!40000 ALTER TABLE `calzado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `camiseta`
--

DROP TABLE IF EXISTS `camiseta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `camiseta` (
  `id` int(11) NOT NULL,
  `talla` int(11) DEFAULT NULL,
  `precio` decimal(5,2) DEFAULT NULL,
  `marca` int(11) DEFAULT NULL,
  `color` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `marca` (`marca`),
  CONSTRAINT `camiseta_ibfk_1` FOREIGN KEY (`marca`) REFERENCES `marca` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `camiseta`
--

LOCK TABLES `camiseta` WRITE;
/*!40000 ALTER TABLE `camiseta` DISABLE KEYS */;
INSERT INTO `camiseta` VALUES (1,6,49.90,3,'Blanca'),(2,5,49.90,3,'Blanca'),(3,4,49.90,3,'Blanca'),(4,4,9.90,5,'Blanca'),(5,4,49.90,3,'Azul'),(6,4,49.90,3,'Negra'),(7,4,49.90,3,'Roja'),(8,5,9.90,5,'Azul'),(9,6,79.90,4,'Azul'),(10,5,19.90,5,'Blanca'),(11,4,19.90,5,'Blanca');
/*!40000 ALTER TABLE `camiseta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `llevar`
--

DROP TABLE IF EXISTS `llevar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `llevar` (
  `fecha` date NOT NULL,
  `pers` int(11) NOT NULL,
  `pantalon` int(11) DEFAULT NULL,
  `camiseta` int(11) DEFAULT NULL,
  `calzado` int(11) DEFAULT NULL,
  PRIMARY KEY (`fecha`,`pers`),
  KEY `pantalon` (`pantalon`),
  KEY `camiseta` (`camiseta`),
  KEY `calzado` (`calzado`),
  CONSTRAINT `llevar_ibfk_1` FOREIGN KEY (`pantalon`) REFERENCES `pantalon` (`id`),
  CONSTRAINT `llevar_ibfk_2` FOREIGN KEY (`camiseta`) REFERENCES `camiseta` (`id`),
  CONSTRAINT `llevar_ibfk_3` FOREIGN KEY (`calzado`) REFERENCES `calzado` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `llevar`
--

LOCK TABLES `llevar` WRITE;
/*!40000 ALTER TABLE `llevar` DISABLE KEYS */;
INSERT INTO `llevar` VALUES ('2019-06-01',1,4,2,4),('2019-06-01',2,2,8,5),('2019-06-01',3,1,11,9),('2019-06-01',4,5,6,7),('2019-06-01',5,3,8,10),('2019-06-01',6,9,4,1),('2019-06-02',2,1,9,10),('2019-06-02',3,7,3,7),('2019-06-02',6,6,4,3),('2019-06-02',7,5,5,8),('2019-06-02',8,4,6,2),('2019-06-02',9,3,7,9),('2019-06-02',10,2,8,1),('2019-06-03',1,9,8,7),('2019-06-03',4,1,2,4),('2019-06-03',5,3,5,7),('2019-06-03',7,2,4,5),('2019-06-03',8,7,11,10),('2019-06-03',9,4,1,2),('2019-06-03',10,6,7,2),('2019-06-04',2,1,5,9),('2019-06-04',4,3,7,1),('2019-06-04',6,5,9,3),('2019-06-04',8,7,11,5),('2019-06-04',10,9,2,7),('2019-06-05',1,2,11,8),('2019-06-05',3,4,9,10),('2019-06-05',5,6,7,2),('2019-06-05',7,8,5,4),('2019-06-05',9,1,3,6),('2019-06-06',1,5,5,5),('2019-06-06',2,6,4,7),('2019-06-06',3,7,3,9),('2019-06-06',4,8,2,10),('2019-06-06',5,1,11,2),('2019-06-06',6,9,10,4),('2019-06-06',7,9,6,2),('2019-06-06',8,1,5,9),('2019-06-06',9,2,4,6),('2019-06-06',10,3,3,3),('2019-06-07',2,5,11,2),('2019-06-07',3,7,9,3),('2019-06-07',4,9,7,4),('2019-06-07',5,2,5,5),('2019-06-07',6,4,3,6),('2019-06-07',8,6,1,7),('2019-06-07',10,8,8,8);
/*!40000 ALTER TABLE `llevar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca`
--

DROP TABLE IF EXISTS `marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca`
--

LOCK TABLES `marca` WRITE;
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` VALUES (1,'Zara'),(2,'Springfield'),(3,'Massimo Dutti'),(4,'Levis'),(5,'Nisu'),(6,'Nike'),(7,'Adidas'),(8,'Geox');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pantalon`
--

DROP TABLE IF EXISTS `pantalon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pantalon` (
  `id` int(11) NOT NULL,
  `talla` int(11) DEFAULT NULL,
  `precio` decimal(5,2) DEFAULT NULL,
  `marca` int(11) DEFAULT NULL,
  `color` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `marca` (`marca`),
  CONSTRAINT `pantalon_ibfk_1` FOREIGN KEY (`marca`) REFERENCES `marca` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pantalon`
--

LOCK TABLES `pantalon` WRITE;
/*!40000 ALTER TABLE `pantalon` DISABLE KEYS */;
INSERT INTO `pantalon` VALUES (1,44,75.50,4,'Azul'),(2,40,42.90,2,'Azul'),(3,38,29.90,2,'Negro'),(4,46,89.90,4,'Negro'),(5,48,49.90,5,'Azul'),(6,44,89.90,4,'Azul'),(7,42,39.90,1,'Azul'),(8,40,39.90,1,'Negro'),(9,40,39.90,1,'Azul');
/*!40000 ALTER TABLE `pantalon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `fnac` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'Pepe','1999-12-04'),(2,'Ana','2002-04-30'),(3,'Juan','2001-10-14'),(4,'Sara','1998-07-17'),(5,'Pedro','1999-01-20'),(6,'Pablo','2002-06-18'),(7,'Eva','2001-09-11'),(8,'Marta','2000-03-01'),(9,'Julia','2002-11-14'),(10,'Adrian','2000-03-15'),(11,'Diana','1999-07-25');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-29 18:49:06