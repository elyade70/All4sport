-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: all4sport
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Table structure for table `achat`
--

DROP TABLE IF EXISTS `achat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `achat` (
  `id_achat` int NOT NULL,
  `achat_libellé` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_achat` date NOT NULL,
  `fk_cl` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_achat`),
  KEY `fkcl_idx` (`fk_cl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `achat`
--

LOCK TABLES `achat` WRITE;
/*!40000 ALTER TABLE `achat` DISABLE KEYS */;
INSERT INTO `achat` VALUES (1,'voiture','2022-11-10','CLI70914652'),(2,'maison','2022-12-05','CLI68171927');
/*!40000 ALTER TABLE `achat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `code_client` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `adresse` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telephone` int NOT NULL,
  `date_naissance` date NOT NULL,
  PRIMARY KEY (`code_client`),
  UNIQUE KEY `code_client_UNIQUE` (`code_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES ('CLI68171927','Valenciennes','bruh@gmail.com',878098112,'1992-10-30'),('CLI70914652','Paris','ekip@gmail.com',987654312,'2002-05-03');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enfant`
--

DROP TABLE IF EXISTS `enfant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enfant` (
  `id_enfant` int NOT NULL,
  `age_enfant` int NOT NULL,
  `fk_cl` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_enfant`),
  UNIQUE KEY `id_enfant_UNIQUE` (`id_enfant`),
  KEY `fkcl_idx` (`fk_cl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enfant`
--

LOCK TABLES `enfant` WRITE;
/*!40000 ALTER TABLE `enfant` DISABLE KEYS */;
INSERT INTO `enfant` VALUES (1,12,'CLI68171927'),(2,23,'CLI68171927'),(3,4,'CLI68171927'),(4,12,'CLI70914652'),(5,17,'CLI70914652');
/*!40000 ALTER TABLE `enfant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `photos` (
  `id_photos` int NOT NULL,
  `libelle_photo` varchar(45) NOT NULL,
  `fk_pr` varchar(18) NOT NULL,
  `photo` blob NOT NULL,
  PRIMARY KEY (`id_photos`),
  KEY `produit_idx` (`fk_pr`),
  CONSTRAINT `produit` FOREIGN KEY (`fk_pr`) REFERENCES `produits` (`reference_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pratique`
--

DROP TABLE IF EXISTS `pratique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pratique` (
  `fk_cl` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fk_sp` int NOT NULL,
  PRIMARY KEY (`fk_cl`,`fk_sp`),
  KEY `fksp_idx` (`fk_sp`),
  CONSTRAINT `fkclt` FOREIGN KEY (`fk_cl`) REFERENCES `client` (`code_client`),
  CONSTRAINT `fksp` FOREIGN KEY (`fk_sp`) REFERENCES `sport` (`id_sport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pratique`
--

LOCK TABLES `pratique` WRITE;
/*!40000 ALTER TABLE `pratique` DISABLE KEYS */;
INSERT INTO `pratique` VALUES ('CLI68171927',1),('CLI70914652',1),('CLI70914652',2),('CLI68171927',3);
/*!40000 ALTER TABLE `pratique` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produits`
--

DROP TABLE IF EXISTS `produits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produits` (
  `reference_produit` varchar(18) NOT NULL,
  `nom_fournisseur` varchar(45) NOT NULL,
  `cout_unitaire` int NOT NULL,
  `description` varchar(45) NOT NULL,
  `stock_internet` int NOT NULL,
  `stock_magasin` int NOT NULL,
  `lieu_stockage` varchar(45) NOT NULL,
  `fk_ray` int DEFAULT NULL,
  PRIMARY KEY (`reference_produit`),
  KEY `rayon_idx` (`fk_ray`),
  CONSTRAINT `rayon` FOREIGN KEY (`fk_ray`) REFERENCES `rayon` (`id_rayon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produits`
--

LOCK TABLES `produits` WRITE;
/*!40000 ALTER TABLE `produits` DISABLE KEYS */;
/*!40000 ALTER TABLE `produits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rayon`
--

DROP TABLE IF EXISTS `rayon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rayon` (
  `id_rayon` int NOT NULL,
  `rayon_libelle` varchar(45) NOT NULL,
  PRIMARY KEY (`id_rayon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rayon`
--

LOCK TABLES `rayon` WRITE;
/*!40000 ALTER TABLE `rayon` DISABLE KEYS */;
/*!40000 ALTER TABLE `rayon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sport`
--

DROP TABLE IF EXISTS `sport`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sport` (
  `id_sport` int NOT NULL,
  `libelle_sport` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_sport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sport`
--

LOCK TABLES `sport` WRITE;
/*!40000 ALTER TABLE `sport` DISABLE KEYS */;
INSERT INTO `sport` VALUES (1,'Foot'),(2,'Basket'),(3,'tennis'),(4,'baseball'),(5,'e-sport');
/*!40000 ALTER TABLE `sport` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-27 13:28:04
