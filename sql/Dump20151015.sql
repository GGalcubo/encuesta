CREATE DATABASE  IF NOT EXISTS `encuesta` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `encuesta`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: encuesta
-- ------------------------------------------------------
-- Server version	5.5.37

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
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personas` (
  `idpersonas` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `apellido` varchar(150) DEFAULT NULL,
  `documento` varchar(11) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `enviada` binary(1) DEFAULT NULL,
  `completa` binary(1) DEFAULT NULL,
  PRIMARY KEY (`idpersonas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preguntas` (
  `idpreguntas` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(500) DEFAULT NULL,
  `tipo_pregunta` varchar(1) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpreguntas`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntas`
--

LOCK TABLES `preguntas` WRITE;
/*!40000 ALTER TABLE `preguntas` DISABLE KEYS */;
INSERT INTO `preguntas` VALUES (1,'En líneas generales cómo calificarías el servicio de Logos Traslados?','3',1),(2,'Cómo valorarías los siguientes ítems?<br>Atención de nuestra Mesa Operativa','3',2),(3,'Cómo valorarías los siguientes ítems?<br>Asesoramiento y Comunicación','3',3),(4,'Cómo valorarías los siguientes ítems?<br>Velocidad de Respuesta','3',4),(5,'Cómo valorarías los siguientes ítems?<br>Estado de las Unidades','3',5),(6,'Cómo valorarías los siguientes ítems?<br>Presencia de nuestros Conductores','3',6),(7,'Cómo valorarías los siguientes ítems?<br>Puntualidad en los Servicios','3',7),(8,'Con qué nivel de eficacia cumplimos los servicios requeridos?','2',8),(9,'Cómo calificarías nuestra velocidad de respuesta frente a los problemas?','3',9),(10,'Utilizaste nuestros servicios en el interior del país?','2',10),(11,'Cómo valorarías los siguientes ítems?<br>Valoración general del servicio.','3',11),(12,'Cómo valorarías los siguientes ítems?<br>Cobertura de Ciudades.','3',12),(13,'Cómo valorarías los siguientes ítems?<br>Estado de los vehículos.','3',13),(14,'Cómo valorarías los siguientes ítems?<br>Velocidad de respuesta a las Reservas / Presupuestos.','3',14),(15,'Teniendo en cuenta este 2015.<br>Cómo pensás que es nuestro desempeño comparado con años anteriores?','2',15),(16,'Cómo calificarías en líneas generales la atención de Administración?','3',16),(17,'Con qué nivel de puntualidad recibís las liquidaciones y facturas por los servicios?','2',17),(18,'Recomendarías nuestros servicios a otros colegas?','2',18),(19,'Qué mejorarías de nuestro servicio?','2',19),(20,'<b>FINAL</b><br>Te pedimos unos minutos para que puedas dejarnos tus observaciones, <br>críticas o detallar algún inconveniente que hayas tenido','1',20);
/*!40000 ALTER TABLE `preguntas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuesta_persona`
--

DROP TABLE IF EXISTS `respuesta_persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuesta_persona` (
  `idrespuesta_persona` int(11) NOT NULL AUTO_INCREMENT,
  `persona_id` int(11) NOT NULL,
  `pregunta_id` int(11) NOT NULL,
  `respuesta_fija_id` int(11) DEFAULT NULL,
  `respuesta_txt` blob,
  PRIMARY KEY (`idrespuesta_persona`),
  KEY `persona_fk_idx` (`persona_id`),
  KEY `pregunta_fk_idx` (`pregunta_id`),
  KEY `respuesta_fija_fk_idx` (`respuesta_fija_id`),
  CONSTRAINT `respuesta_fija_fk` FOREIGN KEY (`respuesta_fija_id`) REFERENCES `respuestas_fijas` (`idrespuestas_fijas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `persona_fk` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`idpersonas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `preguntas_fk` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`idpreguntas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuesta_persona`
--

LOCK TABLES `respuesta_persona` WRITE;
/*!40000 ALTER TABLE `respuesta_persona` DISABLE KEYS */;
/*!40000 ALTER TABLE `respuesta_persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuestas_fijas`
--

DROP TABLE IF EXISTS `respuestas_fijas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuestas_fijas` (
  `idrespuestas_fijas` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta_id` int(11) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idrespuestas_fijas`),
  KEY `pregunta_fk_idx` (`pregunta_id`),
  CONSTRAINT `pregunta_fk` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`idpreguntas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuestas_fijas`
--

LOCK TABLES `respuestas_fijas` WRITE;
/*!40000 ALTER TABLE `respuestas_fijas` DISABLE KEYS */;
INSERT INTO `respuestas_fijas` VALUES (1,8,'Extremadamente eficaces.'),(2,8,'Muy eficaces.'),(3,8,'Poco eficaces.'),(4,8,'Ligeramente eficaces.'),(16,8,'Nada eficaces.'),(17,10,'Si.'),(18,10,'No.'),(19,10,'No sabía que ofrecían cobertura en otras ciudades.'),(20,15,'Mejor.'),(21,15,'Peor.'),(22,15,'Similar.'),(23,15,'No realicé actividades con Uds. anteriormente.'),(25,17,'Extremadamente puntual.'),(26,17,'Muy puntual.'),(27,17,'Poco puntual.'),(28,17,'Ligeramente puntual.'),(29,17,'Nada puntual.'),(30,18,'Extremadamente probable.'),(31,18,'Muy probable.'),(32,18,'Poco probable.'),(33,18,'Ligeramente probable.'),(34,18,'Nada probable.'),(35,19,'Atención Operativa.'),(36,19,'Vehículos y conductores.'),(37,19,'Puntualidad.'),(38,19,'Nada.');
/*!40000 ALTER TABLE `respuestas_fijas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-15 21:50:23
