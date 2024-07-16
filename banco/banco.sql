CREATE DATABASE  IF NOT EXISTS `gestaodespesas` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `gestaodespesas`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: gestaodespesas
-- ------------------------------------------------------
-- Server version	8.0.37

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
-- Table structure for table `base`
--

DROP TABLE IF EXISTS `base`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `base` (
  `idBase` int NOT NULL AUTO_INCREMENT,
  `idUsuario` int NOT NULL,
  `nomeBase` varchar(255) NOT NULL,
  `dataCadastro` datetime DEFAULT NULL,
  `responsavelBase` varchar(45) DEFAULT NULL,
  `telefoneBase` varchar(45) DEFAULT NULL,
  `celularBase` varchar(45) DEFAULT NULL,
  `emailBase` varchar(45) DEFAULT NULL,
  `ativo` enum('S','N') DEFAULT 'S',
  PRIMARY KEY (`idBase`,`idUsuario`),
  KEY `fk_base_usuario1_idx` (`idUsuario`),
  CONSTRAINT `fk_base_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `base`
--

LOCK TABLES `base` WRITE;
/*!40000 ALTER TABLE `base` DISABLE KEYS */;
INSERT INTO `base` VALUES (1,2,'Base','2024-06-30 00:00:00','Responsavel','9','9','base@email','S'),(2,2,'outra base','2024-06-30 00:00:00','O Outro Responsavel','52 999999','33344222','outrabase@email','S'),(3,2,'Mais uma','2024-06-30 00:00:00','irresponsável ','66666','22666','umabase@email','S'),(4,2,'Canguçu','2024-07-02 00:00:00','Flavio Treib','51981349464','','base@email','S'),(5,5,'Outra Base','2024-07-06 00:00:00','O Outro Responsavel','52 999999','33344222','base@email','S'),(6,5,'Dteste','2024-07-15 10:25:48','dresp','52 999999','33344222','teste@base.com','S'),(7,6,'Luza','2024-07-16 12:08:52','Elisandro','52 999999','33344222','Luza@email.com','S');
/*!40000 ALTER TABLE `base` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `credor`
--

DROP TABLE IF EXISTS `credor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `credor` (
  `idCredor` int NOT NULL AUTO_INCREMENT,
  `idUsuario` int NOT NULL,
  `nomeCredor` varchar(255) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `responsavelCredor` varchar(45) DEFAULT NULL,
  `telefoneCredor` varchar(45) DEFAULT NULL,
  `celularCredor` varchar(45) DEFAULT NULL,
  `ativo` enum('S','N') DEFAULT 'S',
  PRIMARY KEY (`idCredor`,`idUsuario`),
  KEY `fk_credor_usuario1_idx` (`idUsuario`),
  CONSTRAINT `fk_credor_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credor`
--

LOCK TABLES `credor` WRITE;
/*!40000 ALTER TABLE `credor` DISABLE KEYS */;
INSERT INTO `credor` VALUES (1,2,'fulano','2024-06-30 00:00:00','ELE','51999990','7','N'),(2,2,'SEgundo','2024-06-30 00:00:00','tu','7','5673889','S'),(3,5,'Ciclano','2024-07-15 00:00:00','Cliclaro','51999990','510000009','S'),(4,6,'Fadergs','2024-07-16 12:07:49','Flavio','534423232','534423232','S');
/*!40000 ALTER TABLE `credor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `despesa`
--

DROP TABLE IF EXISTS `despesa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `despesa` (
  `idDespesa` int NOT NULL AUTO_INCREMENT,
  `idCredor` int NOT NULL,
  `idUsuario` int NOT NULL,
  `nomeDespesa` varchar(45) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `ativo` enum('S','N') DEFAULT NULL,
  PRIMARY KEY (`idDespesa`,`idCredor`,`idUsuario`),
  KEY `fk_despesa_credor_idx` (`idCredor`),
  KEY `fk_despesa_usuario1_idx` (`idUsuario`),
  CONSTRAINT `fk_despesa_credor` FOREIGN KEY (`idCredor`) REFERENCES `credor` (`idCredor`),
  CONSTRAINT `fk_despesa_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `despesa`
--

LOCK TABLES `despesa` WRITE;
/*!40000 ALTER TABLE `despesa` DISABLE KEYS */;
INSERT INTO `despesa` VALUES (1,3,2,'Energia elétrica','2024-06-30 20:20:40','N'),(2,1,2,'Agua','2024-06-30 20:21:03','N'),(3,2,2,'Telefone fixo','2024-06-30 20:21:23','S'),(4,1,2,'Internet','2024-06-30 20:21:39','S'),(5,1,2,'','2024-07-02 00:28:35','S'),(6,1,2,'Nova','2024-07-02 00:00:00','N'),(7,1,2,'data','2024-07-02 12:52:14','S'),(8,1,2,'','2024-07-03 10:25:04','N'),(9,1,2,'','2024-07-05 10:23:54','N'),(10,1,5,'','2024-07-05 11:55:37','N'),(11,3,5,'DataT','2024-07-15 10:28:02','S'),(12,3,6,'Energia elétrica','2024-07-16 12:01:17','S'),(13,4,6,'Faculdade','2024-07-16 12:08:18','S');
/*!40000 ALTER TABLE `despesa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lancamento`
--

DROP TABLE IF EXISTS `lancamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lancamento` (
  `idLancamento` int NOT NULL AUTO_INCREMENT,
  `idBase` int NOT NULL,
  `idUsuario` int NOT NULL,
  `idDespesa` int NOT NULL,
  `competenciaDespesa` char(2) NOT NULL,
  `dataVencimento` date NOT NULL,
  `valorLiquido` float(10,2) NOT NULL,
  `valorMulta` float(10,2) NOT NULL,
  `valorCorrecao` float(10,2) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `ativo` enum('S','N') NOT NULL DEFAULT 'S',
  `observacao` text,
  PRIMARY KEY (`idLancamento`,`idBase`,`idUsuario`,`idDespesa`),
  KEY `fk_lancamento_despesa1_idx` (`idDespesa`),
  KEY `fk_lancamento_base1_idx` (`idBase`),
  KEY `fk_lancamento_usuario1_idx` (`idUsuario`),
  CONSTRAINT `fk_lancamento_base1` FOREIGN KEY (`idBase`) REFERENCES `base` (`idBase`),
  CONSTRAINT `fk_lancamento_despesa1` FOREIGN KEY (`idDespesa`) REFERENCES `despesa` (`idDespesa`),
  CONSTRAINT `fk_lancamento_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lancamento`
--

LOCK TABLES `lancamento` WRITE;
/*!40000 ALTER TABLE `lancamento` DISABLE KEYS */;
INSERT INTO `lancamento` VALUES (1,1,2,1,'2','2024-08-08',22.33,22.33,12.44,'2024-06-30 00:00:00','N','sim mas nao'),(2,1,2,7,'','2024-08-02',22.00,22.00,232.00,'2024-07-03 00:00:00','S',''),(3,4,2,1,'22','2024-07-18',232.00,0.00,0.00,'2024-07-03 11:48:20','S','sim mas nao'),(4,1,2,4,'32','2024-08-14',21.00,0.00,0.00,'2024-07-03 11:48:49','S','ewree'),(5,3,2,6,'22','2024-08-07',0.00,0.00,0.00,'2024-07-03 11:50:54','S','ahA'),(6,4,5,6,'8','2024-07-09',1400.00,0.00,0.00,'2024-07-07 09:51:09','S','sim mas nao'),(7,1,5,1,'12','2024-08-08',0.00,0.00,0.00,'2024-07-07 09:52:00','S','sim mas nao'),(8,4,5,7,'3','2024-08-16',1123.22,0.00,0.00,'2024-07-15 10:19:13','S','uma obs'),(9,3,5,3,'9','2024-08-29',556.00,0.00,0.00,'2024-07-15 10:20:06','S','outra obs'),(10,7,6,13,'8','2024-08-31',1000.00,0.00,0.00,'2024-07-16 12:11:22','S','Alguma obs');
/*!40000 ALTER TABLE `lancamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perfil` (
  `idPerfil` int NOT NULL AUTO_INCREMENT,
  `nomePerfil` varchar(255) NOT NULL,
  `dataCadastro` datetime DEFAULT NULL,
  `ativo` enum('S','N') DEFAULT NULL,
  PRIMARY KEY (`idPerfil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'Perfil 1','2023-01-15 10:00:00','S'),(2,'Perfil 2','2023-02-20 15:30:00','N'),(3,'Perfil 3','2023-03-10 08:45:00','S');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfilsessao`
--

DROP TABLE IF EXISTS `perfilsessao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perfilsessao` (
  `idPerfil` int NOT NULL,
  `idSessao` int NOT NULL,
  PRIMARY KEY (`idPerfil`,`idSessao`),
  KEY `fk_perfil_has_sessao_sessao1_idx` (`idSessao`),
  KEY `fk_perfil_has_sessao_perfil1_idx` (`idPerfil`),
  CONSTRAINT `fk_perfil_has_sessao_perfil1` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`idPerfil`),
  CONSTRAINT `fk_perfil_has_sessao_sessao1` FOREIGN KEY (`idSessao`) REFERENCES `sessao` (`idSessao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfilsessao`
--

LOCK TABLES `perfilsessao` WRITE;
/*!40000 ALTER TABLE `perfilsessao` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfilsessao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessao`
--

DROP TABLE IF EXISTS `sessao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessao` (
  `idSessao` int NOT NULL AUTO_INCREMENT,
  `nomeSessao` varchar(255) NOT NULL,
  `dataCadsatro` datetime DEFAULT NULL,
  PRIMARY KEY (`idSessao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessao`
--

LOCK TABLES `sessao` WRITE;
/*!40000 ALTER TABLE `sessao` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idUsuario` int NOT NULL AUTO_INCREMENT,
  `idPerfil` int NOT NULL,
  `nomeUsuario` varchar(255) NOT NULL,
  `emailUsuario` varchar(255) NOT NULL,
  `loginUsuario` varchar(255) NOT NULL,
  `senhaUsuario` varchar(255) NOT NULL,
  `dataCadastro` datetime DEFAULT NULL,
  `telefoneCelular` varchar(45) DEFAULT NULL,
  `ativo` enum('S','N') DEFAULT 'S',
  PRIMARY KEY (`idUsuario`,`idPerfil`),
  KEY `fk_usuario_perfil1_idx` (`idPerfil`),
  CONSTRAINT `fk_usuario_perfil1` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`idPerfil`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,1,'Nome do Usuário','usuario@email.com','login123','senha123','2024-06-30 15:16:34','123456789','S'),(2,1,'Nome do Usuário','usuario@email.com','login123','senha123','2024-06-30 15:16:35','123456789','S'),(3,1,'um','usuario@email.com','123','123','2024-06-30 15:16:35','123456789','S'),(4,1,'1','1','1','1','2024-06-30 15:16:35','1','N'),(5,1,'MoonS','MoonS@email.com','MoonS','$2y$10$u1g1EqTgIqfVYcEk/08MXO2m2iieDZQT/NZ1kAEjAaRKytpq4R3IO','2024-07-05 11:52:00','519999999','S'),(6,1,'4321','4321@email.com','4321','$2y$10$brkX.Vf11aIxlOl1h5wWke28ZcAJcI0qdSTFiABkQFw8WsIHUa.Oy','2024-07-15 11:23:37','43211676933','S');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-15 21:22:24
