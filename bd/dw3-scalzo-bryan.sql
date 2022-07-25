-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dw3_scalzo_bryan
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.21-MariaDB

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
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `categoria_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (5,'colgantes'),(6,'exterior'),(7,'mesa'),(8,'bombillas');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `producto_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_fk` int(10) unsigned NOT NULL,
  `categoria_fk` tinyint(3) unsigned NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `intro` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `precio_inicial` decimal(6,2) NOT NULL,
  `precio_descuento` decimal(6,2) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `alt` varchar(150) NOT NULL,
  PRIMARY KEY (`producto_id`,`categoria_fk`),
  KEY `fk_noticias_usuarios1_idx` (`usuario_fk`),
  KEY `fk_productos_equipos1_idx` (`categoria_fk`),
  CONSTRAINT `fk_productos_equipos1` FOREIGN KEY (`categoria_fk`) REFERENCES `categorias` (`categoria_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_productos_usuarios1` FOREIGN KEY (`usuario_fk`) REFERENCES `usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (7,11,5,'Lámpara de techo Cuska','Lámpara de techo de madera Cuska.','Esta original lámpara con pantalla de madera es ideal para iluminar y decorar distintos espacios de interior. La pantalla deja la bombilla a la vista, permitiendo una mejor difusión de la luz y potenciando el estilo decorativo de la lámpara. Lámpara colgante perfecta para espacios de restauración y ocio.',680.00,580.00,'banner6.png','Lámpara cuska'),(8,11,5,'Lámpara de techo Cloé','Lámpara de techo retro con pantalla de metal.','Pensada para iluminar zonas como mesas o barras de bar, pudiendo colocarse en tu hogar o en tu comercio al ser una lámpara muy decorativa. Los detalles de metal en diferentes colores y la pieza de madera decorativa combinan muy bien con todo tipo de estancias.',580.00,480.00,'img2.png','Lámpara de techo Cloé'),(9,11,5,'Lámpara colgante Lírica','Lámpara colgante de acero y madera.','Por un lado tenemos la pantalla de acero de color gris, fácil de combinar con decoraciones en colores claros y oscuros. La madera natural se encuentra en la parte superior de la pantalla y le da un toque muy decorativo. Puedes colocar una o varias lámparas para completar la iluminación.',780.00,680.00,'img3.png','Lámpara colgante Lírica'),(10,11,5,'Lámpara de techo Nicolas','Lámpara de techo de estilo retro.','Lámpara fabricada en aluminio con acabado negro, cristal transparente y tres puntos de luz. El estilo retro-vintage lo podemos completar al incluir bombillas decorativas. Posibilidad de regular la altura, ideal para colocar en comedores, cocinas, restaurantes.',580.00,480.00,'img4.png','Lámpara colgante Lírica');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `rol_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador'),(2,'Usuario');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `usuario_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rol_fk` tinyint(3) unsigned NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`usuario_id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_usuarios_roles_idx` (`rol_fk`),
  CONSTRAINT `fk_usuarios_roles` FOREIGN KEY (`rol_fk`) REFERENCES `roles` (`rol_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (11,1,'hola5@hola.com','12345');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_passwords_reset`
--

DROP TABLE IF EXISTS `usuarios_passwords_reset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios_passwords_reset` (
  `usuario_password_reset_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(200) NOT NULL,
  `fecha_expiracion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`usuario_password_reset_id`),
  CONSTRAINT `fk_usuarios_passwords_reset_usuarios` FOREIGN KEY (`usuario_password_reset_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_passwords_reset`
--

LOCK TABLES `usuarios_passwords_reset` WRITE;
/*!40000 ALTER TABLE `usuarios_passwords_reset` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios_passwords_reset` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-08 11:19:58
