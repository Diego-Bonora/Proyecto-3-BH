CREATE DATABASE  IF NOT EXISTS `netclip` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `netclip`;
-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: netclip
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `catalogo`
--

DROP TABLE IF EXISTS `catalogo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catalogo` (
  `ID_productos` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(70) NOT NULL,
  `Precio` decimal(5,0) DEFAULT NULL,
  `Categoria` varchar(15) NOT NULL,
  `Img_link` varchar(200) DEFAULT NULL,
  `especial` varchar(255) DEFAULT NULL,
  `stock` decimal(5,0) DEFAULT '100',
  PRIMARY KEY (`ID_productos`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogo`
--

LOCK TABLES `catalogo` WRITE;
/*!40000 ALTER TABLE `catalogo` DISABLE KEYS */;
INSERT INTO `catalogo` VALUES (1,'Arroz Saman',50,'Arroz','arroz saman.jpg',NULL,100),(2,'Arroz Blue Patna',65,'Arroz','arroz blue patna.jpg',NULL,100),(3,'Fideos Cololo con Morron',53,'Fideos','fideos cololo morron.jpg',NULL,97),(4,'Fideos Cololo con Espinaca',60,'Fideos','fideos cololo espinaca.jpg',NULL,100),(5,'Fideos Adria',65,'Fideos','fideos adria.jpg',NULL,100),(6,'Tallarines Adria',65,'Fideos','tallarines adria.jpg',NULL,100),(7,'Aceite Optimo 1L ',120,'Aceites','aceite optimo 1L.jpg',NULL,100),(8,'Aceite Optimo 5L',650,'Aceites','aceite optimo 5L.jpg',NULL,100),(9,'Aceite Saman 1L',140,'Aceites','aceite saman 1L.jpg',NULL,100),(10,'Aceite Saman 3L',450,'Aceites','aceite saman 3L.jpg',NULL,100),(11,'Aceite de Oliva Extra Virgen MAZZA 1Lt',600,'Aceites','aceite de oliva.jpg',NULL,100),(12,'Schneck Clásica',90,'Hamburguesas','schneck clásica.jpg',NULL,100),(13,'Schneck XL',120,'Hamburguesas','schneck XL.jpg',NULL,100),(14,'Nuggets Ardo 1KG',535,'Nuggets','nuggets ardo 1KG.jpg',NULL,100),(15,'Nuggets Baita 700GR',170,'Nuggets','nuggets baita 700GR.jpg',NULL,100),(16,'Nuggets Sadia 900GR',296,'Nuggets','nuggets sadia 900GR.jpg',NULL,100),(17,'Coca cola 2.25L ',150,'Bebida','coca cola 2.25L.jpg',NULL,100),(18,'Fanta 3L',160,'Bebida','fanta 3L.jpg',NULL,100),(19,'Sprite 1.5L',115,'Bebida','sprite 1.5L.jpg',NULL,100),(20,'Fanta 1.5L',115,'Bebida','fanta 1.5L.jpg',NULL,100),(21,'Chocolate cailler',315,'Chocolate','chocolate cailler 1.jpg','especial',100),(22,'Chocolate cailler',270,'Chocolate','chocolate cailler 2.jpg',NULL,100),(23,'Chocolate cailler',435,'Chocolate','chocolate cailler 3.jpg','especial',100),(24,'Chocolate Lindor',420,'Chocolate','chocolate lindor 1.jpg',NULL,100),(25,'Chocolate Lindor',255,'Chocolate','chocolate lindor 2.jpg',NULL,100),(26,'Chocolate Milka',136,'Chocolate','chocolate milka.jpg',NULL,100),(27,'Chocolate nestle',80,'Chocolate','chocolate nestle.jpg',NULL,100),(28,'JOHNNIE WALKER BLACK',1990,'Whisky','johnnie walker black.jpg','especial',100),(29,'Chivas Regal 18',3699,'Whisky','chivas regal 18.jpg',NULL,100),(30,'Chivas Regal 13',1699,'Whisky','chivas regal 13.jpg',NULL,100),(31,'JOHNNIE WALKER RED',990,'Whisky','johnnie walker red.jpg','especial',100),(32,'Jack Daniels',1880,'Whisky','jack_daniels.jpg',NULL,100),(33,'Don pascual tinto',289,'Vinos','don pascual tinto.jpg',NULL,100),(34,'Don pascual blanco',289,'Vinos','don pascual blanco.jpg','especial',100),(35,'Casillero del diablo Cabernet\nsauvignon',459,'Vinos','casillero del diablo cabernet.jpg',NULL,100),(36,'Casillero del diablo tinto',459,'Vinos','Casillero del diablo tinto.jpg','especial',100),(37,'Don Perignon',12266,'Champagne','don perignon.jpg','especial',100),(38,'BOLLINGER',4900,'Champagne','bollinger.jpg','especial',98),(39,'Moet & Chandon',3599,'Champagne','moet chandon.jpg',NULL,100);
/*!40000 ALTER TABLE `catalogo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chatbot`
--

DROP TABLE IF EXISTS `chatbot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chatbot` (
  `id` int NOT NULL,
  `consulta` varchar(300) NOT NULL,
  `respuesta` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatbot`
--

LOCK TABLES `chatbot` WRITE;
/*!40000 ALTER TABLE `chatbot` DISABLE KEYS */;
INSERT INTO `chatbot` VALUES (1,'en donde estan?|en donde esta el local?|ubicacion?|cual es la ubicación?| donde?| lugar?| donde los puedo encontrar?','Nos encontramos en el centro de Carrasco.'),(2,'celular?| número?| numero de teléfono?| como me puedo comunicar?| comunicar?','El numero telefonico es: 099345876'),(3,'forma de pago?| formas de pago?| cuales son las formas de pago?| tarjeta?| se puede pagar con tarjeta?','Se puede pagar tanto como en efectivo, como con tarjeta'),(4,'Como funciona la modalidad de click&go?|como funciona click&go?|click&go?','Debes hacer el pago on-line y pasarte directamente por la sucursal mas cercana, allí estarán nuestros empleados esperando para cargarte la mercadería en tu vehículo'),(5,'batman|ingles| profe de inglés','<img class=\"batman\" src=\"./assets/media/buttons/batman.png\">'),(6,'que ofrecen?| ofrecer?| ofrecen?','ofrecemos un amplio catálogo, donde se puede comprar de manera comoda ganando muchos premios'),(7,'presupuesto?| necesito un presupuesto?| haceme un presupuesto?| podes presupuestar algo?','comunícate al 099854456'),(8,'hola| cómo estás?/ que tal?','estaria mejor si no jodieras'),(10,'que eres?| que sos?| quien sos?| quien eres?','Tu madre seguro que no');
/*!40000 ALTER TABLE `chatbot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compras` (
  `ID_compras` int NOT NULL AUTO_INCREMENT,
  `ID_producto` int NOT NULL,
  `cantidad` decimal(10,0) NOT NULL,
  `precioP` decimal(10,0) NOT NULL,
  `ID_ticket` int NOT NULL,
  PRIMARY KEY (`ID_compras`),
  KEY `ID_producto` (`ID_producto`),
  KEY `ID_ticket` (`ID_ticket`),
  CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`ID_producto`) REFERENCES `catalogo` (`ID_productos`),
  CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`ID_ticket`) REFERENCES `tickets` (`ID_tickets`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direccion`
--

DROP TABLE IF EXISTS `direccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `direccion` (
  `ID_direccion` int NOT NULL AUTO_INCREMENT,
  `departamento` varchar(50) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `apartamento` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_direccion`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direccion`
--

LOCK TABLES `direccion` WRITE;
/*!40000 ALTER TABLE `direccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `direccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fechas`
--

DROP TABLE IF EXISTS `fechas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fechas` (
  `ID_fecha` int NOT NULL AUTO_INCREMENT,
  `day` varchar(20) DEFAULT NULL,
  `month` varchar(20) DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  `ID_ticket` int DEFAULT NULL,
  PRIMARY KEY (`ID_fecha`),
  KEY `ID_ticket` (`ID_ticket`),
  CONSTRAINT `fechas_ibfk_1` FOREIGN KEY (`ID_ticket`) REFERENCES `tickets` (`ID_tickets`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fechas`
--

LOCK TABLES `fechas` WRITE;
/*!40000 ALTER TABLE `fechas` DISABLE KEYS */;
/*!40000 ALTER TABLE `fechas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suscripciones`
--

DROP TABLE IF EXISTS `suscripciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suscripciones` (
  `ID_suscripto` int NOT NULL AUTO_INCREMENT,
  `ID_usuario` int DEFAULT NULL,
  `puntos` decimal(20,0) DEFAULT '0',
  PRIMARY KEY (`ID_suscripto`),
  KEY `ID_usuario` (`ID_usuario`),
  CONSTRAINT `suscripciones_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuarios` (`ID_usuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suscripciones`
--

LOCK TABLES `suscripciones` WRITE;
/*!40000 ALTER TABLE `suscripciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `suscripciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarjetas`
--

DROP TABLE IF EXISTS `tarjetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tarjetas` (
  `ID_tarjetas` int NOT NULL AUTO_INCREMENT,
  `Nombre_T` varchar(15) NOT NULL,
  `Apellido_T` varchar(15) NOT NULL,
  `Numero_T` varchar(20) NOT NULL,
  `Vencimiento_T` varchar(50) NOT NULL,
  `CVV_T` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_tarjetas`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarjetas`
--

LOCK TABLES `tarjetas` WRITE;
/*!40000 ALTER TABLE `tarjetas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarjetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tickets` (
  `ID_tickets` int NOT NULL AUTO_INCREMENT,
  `ID_usuario` int NOT NULL,
  `ID_direccion` int DEFAULT NULL,
  `fecha` int DEFAULT NULL,
  `precioF` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`ID_tickets`),
  KEY `ID_usuario` (`ID_usuario`),
  KEY `ID_direccion` (`ID_direccion`),
  KEY `fecha` (`fecha`),
  CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuarios` (`ID_usuarios`),
  CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`ID_direccion`) REFERENCES `direccion` (`ID_direccion`),
  CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`fecha`) REFERENCES `fechas` (`ID_fecha`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `ID_usuarios` int NOT NULL AUTO_INCREMENT,
  `Password` varchar(70) NOT NULL,
  `Nombre` varchar(15) NOT NULL,
  `Apellido` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Num_tarjeta` int DEFAULT NULL,
  `Direccion` int DEFAULT NULL,
  PRIMARY KEY (`ID_usuarios`),
  KEY `Direccion` (`Direccion`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Direccion`) REFERENCES `direccion` (`ID_direccion`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'netclip'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-22 10:40:25
