CREATE DATABASE  IF NOT EXISTS `liga_awe` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `liga_awe`;
-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: localhost    Database: liga_awe
-- ------------------------------------------------------
-- Server version	8.0.22-0ubuntu0.20.04.2

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
-- Table structure for table `clubs`
--

DROP TABLE IF EXISTS `clubs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clubs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cartola` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `abbreviation` char(3) NOT NULL,
  `shield` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_cartola_UNIQUE` (`id_cartola`)
) ENGINE=InnoDB AUTO_INCREMENT=269 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clubs`
--

LOCK TABLES `clubs` WRITE;
/*!40000 ALTER TABLE `clubs` DISABLE KEYS */;
INSERT INTO `clubs` VALUES (202,1,'Outros','OUT','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(203,1349,'Ipatinga','IPA','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(204,1371,'Cuiabá','CUI','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(205,1390,'Icasa','ICA','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(206,2190,'Oeste','OES','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(207,2193,'Duque de Caxias','DUQ','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(208,2197,'Americana','AME','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(209,2554,'Grêmio Prudente','PRU','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(210,2565,'Luverdense','LUV','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(211,262,'Flamengo','FLA','https://s.glbimg.com/es/sde/f/organizacoes/2018/04/09/Flamengo-65.png'),(212,263,'Botafogo','BOT','https://s.glbimg.com/es/sde/f/organizacoes/2019/02/04/botafogo-65.png'),(213,264,'Corinthians','COR','https://s.glbimg.com/es/sde/f/organizacoes/2019/09/30/Corinthians_65.png'),(214,265,'Bahia','BAH','https://s.glbimg.com/es/sde/f/organizacoes/2014/04/14/bahia_60x60.png'),(215,266,'Fluminense','FLU','https://s.glbimg.com/es/sde/f/organizacoes/2014/04/14/fluminense_60x60.png'),(216,267,'Vasco','VAS','https://s.glbimg.com/es/sde/f/organizacoes/2016/07/29/Vasco-65.png'),(217,275,'Palmeiras','PAL','https://s.glbimg.com/es/sde/f/organizacoes/2014/04/14/palmeiras_60x60.png'),(218,276,'São Paulo','SAO','https://s.glbimg.com/es/sde/f/organizacoes/2014/04/14/sao_paulo_60x60.png'),(219,277,'Santos','SAN','https://s.glbimg.com/es/sde/f/organizacoes/2014/04/14/santos_60x60.png'),(220,278,'Portuguesa','POR','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(221,279,'Guarani','GUA','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(222,280,'Bragantino','BGT','https://s.glbimg.com/es/sde/f/organizacoes/2020/01/01/65.png'),(223,282,'Atlético-MG','ATL','https://s.glbimg.com/es/sde/f/organizacoes/2017/11/23/Atletico-Mineiro-escudo65px.png'),(224,283,'Cruzeiro','CRU','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(225,284,'Grêmio','GRE','https://s.glbimg.com/es/sde/f/organizacoes/2014/04/14/gremio_60x60.png'),(226,285,'Internacional','INT','https://s.glbimg.com/es/sde/f/organizacoes/2016/05/03/inter65.png'),(227,286,'Juventude','JUV','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(228,287,'Vitória','VIT','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(229,288,'Criciúma','CRI','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(230,289,'Paraná','PAR','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(231,290,'Goiás','GOI','https://s.glbimg.com/es/sde/f/organizacoes/2019/05/01/Goias_65px.png'),(232,291,'Paysandu','PAY','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(233,292,'Sport','SPO','https://s.glbimg.com/es/sde/f/organizacoes/2015/07/21/sport65.png'),(234,293,'Athlético-PR','CAP','https://s.glbimg.com/es/sde/f/organizacoes/2019/09/09/Athletico-PR-65x65.png'),(235,294,'Coritiba','CFC','https://s.glbimg.com/es/sde/f/organizacoes/2017/03/29/coritiba65.png'),(236,296,'Botafogo-SP','BOT','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(237,303,'Ponte Preta','PON','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(238,3057,'Boa Esporte','BEC','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(239,306,'Santo André','SAN','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(240,307,'São Bento','SBE','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(241,309,'Brasil de Pelotas','BRA','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(242,314,'Avaí','AVA','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(243,315,'Chapecoense','CHA','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(244,316,'Figueirense','FIG','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(245,317,'Joinville','JEC','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(246,319,'Londrina','LON','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(247,321,'Operário-PR','OPE','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(248,327,'América-MG','AME','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(249,337,'Confiança','CON','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(250,340,'CRB','CRB','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(251,341,'CSA','CSA','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(252,342,'ASA Arapiraca','ASA','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(253,343,'Náutico','NAU','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(254,344,'Santa Cruz','STC','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(255,346,'Treze','TRZ','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(256,347,'Botafogo-PB','BOT','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(257,349,'Campinense','CAM','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(258,350,'ABC','ABC','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(259,351,'América-RN','AME','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(260,354,'Ceará','CEA','https://s.glbimg.com/es/sde/f/organizacoes/2019/10/10/ceara-65x65.png'),(261,356,'Fortaleza','FOR','https://s.glbimg.com/es/sde/f/organizacoes/2018/06/10/fortaleza-ec-65px.png'),(262,362,'Moto Club','MOT','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(263,363,'Sampaio Corrêa','SAM','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(264,364,'Remo','REM','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(265,373,'Atlético-GO','ACG','https://s.glbimg.com/es/sde/f/organizacoes/2020/07/02/atletico-go-2020-65.png'),(266,375,'Vila Nova','VIL','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(267,386,'São Caetano','SAO','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png'),(268,388,'Brasiliense','BRA','https://s.glbimg.com/es/sde/f/organizacoes/escudo_default_65x65.png');
/*!40000 ALTER TABLE `clubs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lineups`
--

DROP TABLE IF EXISTS `lineups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lineups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_round` int NOT NULL,
  `id_member` int NOT NULL,
  `id_athlete` int NOT NULL,
  `fl_captain` tinyint(1) NOT NULL,
  `id_position` int NOT NULL,
  `id_club` int NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `points` decimal(4,2) NOT NULL,
  `variation` decimal(4,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_club_idx` (`id_club`),
  KEY `fk_id_position_idx` (`id_position`),
  CONSTRAINT `fk_id_club` FOREIGN KEY (`id_club`) REFERENCES `clubs` (`id_cartola`),
  CONSTRAINT `fk_id_position` FOREIGN KEY (`id_position`) REFERENCES `positions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15220 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lineups`
--

LOCK TABLES `lineups` WRITE;
/*!40000 ALTER TABLE `lineups` DISABLE KEYS */;
/*!40000 ALTER TABLE `lineups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `members` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cartola` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `team` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `shield` varchar(255) NOT NULL,
  `shirt` varchar(255) NOT NULL,
  `pro` int NOT NULL,
  `first_year` year NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_cartola_UNIQUE` (`id_cartola`)
) ENGINE=InnoDB AUTO_INCREMENT=577 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (567,6664717,'newton','Al-Jaish FC','https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/placeholder/perfil.png','https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/cartola_svg_114/escudo/f5/28/51/00799be62d-ca50-4f11-aa70-34899cc580f520180420162851','https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/cartola_svg_180/camisa/f5/43/06/00799be62d-ca50-4f11-aa70-34899cc580f520200912184306',0,2016),(568,41084,'Mariano','CASH SINCE 2019','https://graph.facebook.com/v2.9/494698347320053/picture?width=100&height=100','https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/cartola_svg_166/escudo/a5/11/36/00af52c25e-daaa-4858-9155-b1368c66fba520200725161136','https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/cartola_svg_166/camisa/a5/13/56/00af52c25e-daaa-4858-9155-b1368c66fba520200725161356',1,2009),(569,6126264,'Myller e Matheus','Dupla Marques','https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/placeholder/perfil.png','https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/cartola_svg_181/escudo/c2/10/28/00ef471e0b-9abe-4da5-afa6-e775d705b2c220201103141028','https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/cartola_svg_181/camisa/c2/11/23/00ef471e0b-9abe-4da5-afa6-e775d705b2c220201103141123',0,2016),(570,1100348,'Allan Benatti','F.C.TADINHO','https://graph.facebook.com/v2.9/669357099780650/picture?width=100&height=100','https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/cartola_svg_166/escudo/a9/34/05/00484b13dd-034e-4cd5-ab78-28a26b71f7a920200728083405','https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/cartola_svg_166/camisa/a9/34/45/00484b13dd-034e-4cd5-ab78-28a26b71f7a920200728083445',1,2015),(571,178333,'Renan','JAKYES FC','https://graph.facebook.com/v2.9/599351216816925/picture?width=100&height=100','https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/cartola_svg_102/escudo/df/23/20/005b29b737-d8ed-46ba-9c34-95e4b64e74df20180325152320','https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/cartola_svg_165/camisa/85/14/39/0054ae4abf-ae19-40cb-aaac-2bc5a6d44c8520200722221439',1,2011),(572,340663,'Suso','JUSAN F C','https://graph.facebook.com/v2.9/10200962144015070/picture?width=100&height=100','https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/cartola_svg_133/escudo/26/15/58/00b4d6753c-ee05-4ee5-86bb-4da0f80ad52620190402171558','https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/cartola_svg_166/camisa/26/21/38/00b4d6753c-ee05-4ee5-86bb-4da0f80ad52620200726142138',1,2012),(573,662584,'Guilherme Jachetta','Macáquina Mortífera','https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/placeholder/perfil.png','https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/cartola_svg_166/escudo/a1/52/53/00dbc8101a-063a-4a74-bceb-a9d12bfa60a120200726185253','https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/cartola_svg_166/camisa/a1/52/53/00dbc8101a-063a-4a74-bceb-a9d12bfa60a120200726185253',1,2014),(574,2648784,'FABINHO','MANCHA FABINHO','https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/placeholder/perfil.png','https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/cartola_svg_166/escudo/8f/48/30/00e29157a4-3a6b-46b8-8a78-95669c9f118f20200726114830','https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/cartola_svg_169/camisa/8f/57/07/00e29157a4-3a6b-46b8-8a78-95669c9f118f20200805165707',1,2016),(575,13952016,'Myller10','Myller10FC','https://graph.facebook.com/v2.9/10203573682481423/picture?width=100&height=100','https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/cartola_svg_133/escudo/3f/15/10/002295d549-08d4-4074-be30-5d492ca7d33f20190402151510','https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/cartola_svg_164/camisa/3f/19/30/002295d549-08d4-4074-be30-5d492ca7d33f20200722151930',1,2018),(576,23706,'Matheus Marques','Riverville FC','https://graph.facebook.com/v2.9/587987031297725/picture?width=100&height=100','https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/cartola_svg_104/escudo/70/41/35/003e1bbbe1-8ac1-4a4a-b192-de57bf6ef17020180330224135','https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/cartola_svg_169/camisa/70/28/09/003e1bbbe1-8ac1-4a4a-b192-de57bf6ef17020200805162809',1,2008);
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `positions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cartola` int NOT NULL,
  `name` varchar(45) NOT NULL,
  `abbreviation` char(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_cartola_UNIQUE` (`id_cartola`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `positions`
--

LOCK TABLES `positions` WRITE;
/*!40000 ALTER TABLE `positions` DISABLE KEYS */;
INSERT INTO `positions` VALUES (1,1,'Goleiro','GOL'),(2,2,'Lateral','LAT'),(3,3,'Zagueiro','ZAG'),(4,4,'Meia','MEI'),(5,5,'Atacante','ATA'),(6,6,'Técnico','TEC');
/*!40000 ALTER TABLE `positions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rounds`
--

DROP TABLE IF EXISTS `rounds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rounds` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_round` int NOT NULL,
  `id_member` int NOT NULL,
  `id_scheme` int NOT NULL,
  `patrimony` decimal(6,2) NOT NULL,
  `team_value` decimal(5,2) NOT NULL,
  `points` decimal(5,2) DEFAULT '0.00',
  `total` decimal(6,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ids_UNIQUE` (`id_round`,`id_member`),
  KEY `fk_id_scheme_idx` (`id_scheme`),
  KEY `fk_id_member_idx` (`id_member`),
  CONSTRAINT `fk_id_member` FOREIGN KEY (`id_member`) REFERENCES `members` (`id_cartola`),
  CONSTRAINT `fk_id_scheme` FOREIGN KEY (`id_scheme`) REFERENCES `schemes` (`id_cartola`)
) ENGINE=InnoDB AUTO_INCREMENT=2967 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rounds`
--

LOCK TABLES `rounds` WRITE;
/*!40000 ALTER TABLE `rounds` DISABLE KEYS */;
INSERT INTO `rounds` VALUES (2767,1,6664717,3,115.02,0.00,61.08,61.08),(2768,1,41084,3,124.71,0.00,67.82,67.82),(2769,1,6126264,3,123.70,0.00,59.61,59.61),(2770,1,1100348,3,124.60,0.00,77.95,77.95),(2771,1,178333,3,113.36,0.00,59.43,59.43),(2772,1,340663,3,111.99,0.00,66.23,66.23),(2773,1,662584,1,112.18,0.00,47.52,47.52),(2774,1,2648784,3,112.57,0.00,50.72,50.72),(2775,1,13952016,3,125.58,0.00,78.51,78.51),(2776,1,23706,3,113.96,0.00,59.85,59.85),(2777,2,6664717,3,123.62,0.00,37.36,98.44),(2778,2,41084,3,143.94,0.00,67.02,134.84),(2779,2,6126264,3,116.20,0.00,33.97,93.58),(2780,2,1100348,3,120.29,0.00,47.86,125.81),(2781,2,178333,3,115.79,0.00,47.36,106.79),(2782,2,340663,3,109.61,0.00,49.51,115.74),(2783,2,662584,3,124.69,0.00,69.76,117.28),(2784,2,2648784,3,117.39,0.00,35.66,86.38),(2785,2,13952016,3,129.21,0.00,55.22,133.73),(2786,2,23706,3,116.47,0.00,61.76,121.61),(2787,3,6664717,3,118.50,0.00,32.83,131.27),(2788,3,41084,3,153.60,0.00,68.48,203.32),(2789,3,6126264,3,128.61,0.00,60.73,154.31),(2790,3,1100348,3,130.16,0.00,73.08,198.89),(2791,3,178333,3,126.30,0.00,75.83,182.62),(2792,3,340663,3,121.33,0.00,75.33,191.07),(2793,3,662584,3,129.60,0.00,83.68,200.96),(2794,3,2648784,3,125.66,0.00,68.68,155.06),(2795,3,13952016,3,142.00,0.00,85.21,218.94),(2796,3,23706,3,125.18,0.00,83.23,204.84),(2797,4,6664717,3,121.31,0.00,53.77,185.04),(2798,4,41084,3,159.76,0.00,51.47,254.79),(2799,4,6126264,3,130.71,0.00,24.34,178.65),(2800,4,1100348,3,127.19,0.00,27.59,226.48),(2801,4,178333,3,131.42,0.00,59.54,242.16),(2802,4,340663,3,126.04,0.00,65.87,256.94),(2803,4,662584,3,127.59,0.00,29.99,230.95),(2804,4,2648784,3,125.80,0.00,45.57,200.63),(2805,4,13952016,5,141.45,0.00,56.02,274.96),(2806,4,23706,3,121.67,0.00,40.42,245.26),(2807,5,6664717,1,127.33,0.00,62.64,247.68),(2808,5,41084,3,157.92,0.00,2.36,257.15),(2809,5,6126264,3,130.02,0.00,7.76,186.41),(2810,5,1100348,3,126.82,0.00,35.65,262.13),(2811,5,178333,3,130.36,0.00,41.17,283.33),(2812,5,340663,3,124.07,0.00,33.75,290.69),(2813,5,662584,3,126.60,0.00,39.48,270.43),(2814,5,2648784,3,128.95,0.00,59.68,260.31),(2815,5,13952016,3,147.05,0.00,81.07,356.03),(2816,5,23706,3,126.22,0.00,56.67,301.93),(2817,6,6664717,1,129.38,0.00,77.02,324.70),(2818,6,41084,3,163.85,0.00,34.58,291.73),(2819,6,6126264,3,137.19,0.00,42.48,228.89),(2820,6,1100348,3,132.05,0.00,69.38,331.51),(2821,6,178333,1,131.12,0.00,40.58,323.91),(2822,6,340663,1,128.31,0.00,57.28,347.97),(2823,6,662584,3,128.78,0.00,44.18,314.61),(2824,6,2648784,4,136.68,0.00,82.68,342.99),(2825,6,13952016,4,154.72,0.00,88.42,444.45),(2826,6,23706,3,131.61,0.00,74.88,376.81),(2827,7,6664717,3,134.26,0.00,79.31,404.01),(2828,7,41084,3,177.13,0.00,69.91,361.64),(2829,7,6126264,3,152.08,0.00,86.51,315.40),(2830,7,1100348,3,129.07,0.00,32.14,363.65),(2831,7,178333,3,129.61,0.00,53.24,377.15),(2832,7,340663,3,126.30,0.00,59.28,407.25),(2833,7,662584,3,126.02,0.00,52.05,366.66),(2834,7,2648784,3,132.62,0.00,49.14,392.13),(2835,7,13952016,3,150.62,0.00,57.43,501.88),(2836,7,23706,3,129.15,0.00,53.01,429.82),(2837,8,6664717,3,134.72,0.00,58.58,462.59),(2838,8,41084,3,189.85,0.00,72.63,434.27),(2839,8,6126264,4,161.98,0.00,57.87,373.27),(2840,8,1100348,3,136.43,0.00,74.83,438.48),(2841,8,178333,3,131.83,0.00,71.45,448.60),(2842,8,340663,3,132.50,0.00,85.67,492.92),(2843,8,662584,3,128.97,0.00,79.76,446.42),(2844,8,2648784,3,138.84,0.00,80.05,472.18),(2845,8,13952016,4,149.68,0.00,68.33,570.21),(2846,8,23706,4,128.14,0.00,54.78,484.60),(2847,9,6664717,3,142.16,0.00,107.30,569.89),(2848,9,41084,3,200.23,0.00,54.47,488.74),(2849,9,6126264,3,169.04,0.00,36.13,409.40),(2850,9,1100348,3,138.74,0.00,85.73,524.21),(2851,9,178333,3,134.75,0.00,67.53,516.13),(2852,9,340663,3,138.69,0.00,97.20,590.12),(2853,9,662584,3,133.37,0.00,87.03,533.45),(2854,9,2648784,3,151.59,0.00,122.97,595.15),(2855,9,13952016,3,154.63,0.00,85.73,655.94),(2856,9,23706,3,129.86,0.00,81.77,566.37),(2857,10,6664717,3,134.56,0.00,40.87,610.76),(2858,10,41084,3,204.99,0.00,20.02,508.76),(2859,10,6126264,3,172.12,0.00,5.84,415.24),(2860,10,1100348,3,136.63,0.00,48.69,572.90),(2861,10,178333,3,127.93,0.00,34.27,550.40),(2862,10,340663,3,137.89,0.00,53.77,643.89),(2863,10,662584,3,125.71,0.00,30.67,564.12),(2864,10,2648784,3,141.42,0.00,29.82,624.97),(2865,10,13952016,3,151.89,0.00,37.97,693.91),(2866,10,23706,3,124.62,0.00,22.07,588.44),(2867,11,6664717,3,129.99,0.00,40.35,651.11),(2868,11,41084,3,211.41,0.00,41.95,550.71),(2869,11,6126264,4,174.68,0.00,23.55,438.79),(2870,11,1100348,3,135.79,0.00,54.14,627.04),(2871,11,178333,3,123.77,0.00,31.27,581.67),(2872,11,340663,3,137.15,0.00,54.14,698.03),(2873,11,662584,3,125.73,0.00,54.34,618.46),(2874,11,2648784,3,141.96,0.00,57.44,682.41),(2875,11,13952016,3,155.02,0.00,72.13,766.04),(2876,11,23706,3,125.82,0.00,79.64,668.08),(2877,12,6664717,3,126.74,0.00,38.06,689.17),(2878,12,41084,3,220.75,0.00,51.14,601.85),(2879,12,6126264,3,184.68,0.00,46.15,484.94),(2880,12,1100348,3,138.19,0.00,85.75,712.79),(2881,12,178333,3,124.00,0.00,47.85,629.52),(2882,12,340663,1,144.50,0.00,94.93,792.96),(2883,12,662584,3,125.99,0.00,48.03,666.49),(2884,12,2648784,1,142.34,0.00,40.63,723.04),(2885,12,13952016,3,156.96,0.00,64.93,830.97),(2886,12,23706,1,128.14,0.00,49.78,717.86),(2887,13,6664717,3,131.28,0.00,74.60,763.77),(2888,13,41084,3,232.93,0.00,66.93,668.78),(2889,13,6126264,3,198.15,0.00,64.20,549.14),(2890,13,1100348,3,141.71,0.00,60.56,773.35),(2891,13,178333,3,125.33,0.00,59.75,689.27),(2892,13,340663,3,144.52,0.00,77.50,870.46),(2893,13,662584,3,126.08,0.00,65.33,731.82),(2894,13,2648784,3,146.30,0.00,68.09,791.13),(2895,13,13952016,3,166.18,0.00,86.32,917.29),(2896,13,23706,3,133.38,0.00,82.12,799.98),(2897,14,6664717,3,135.31,0.00,96.49,860.26),(2898,14,41084,3,246.90,0.00,58.59,727.37),(2899,14,6126264,3,210.66,0.00,54.59,603.73),(2900,14,1100348,3,146.76,0.00,90.15,863.50),(2901,14,178333,3,128.40,0.00,91.73,781.00),(2902,14,340663,3,150.24,0.00,101.39,971.85),(2903,14,662584,3,127.52,0.00,82.75,814.57),(2904,14,2648784,3,150.82,0.00,95.93,887.06),(2905,14,13952016,3,171.03,0.00,105.63,1022.92),(2906,14,23706,3,136.21,0.00,99.13,899.11),(2907,15,6664717,3,132.44,0.00,66.71,926.97),(2908,15,41084,3,259.24,0.00,81.99,809.36),(2909,15,6126264,4,221.92,0.00,71.81,675.54),(2910,15,1100348,3,144.98,0.00,87.65,951.15),(2911,15,178333,3,131.49,0.00,79.79,860.79),(2912,15,340663,3,149.08,0.00,99.09,1070.94),(2913,15,662584,3,126.11,0.00,77.27,891.84),(2914,15,2648784,3,149.99,0.00,81.99,969.05),(2915,15,13952016,3,172.16,0.00,89.89,1112.81),(2916,15,23706,3,135.71,0.00,86.39,985.50),(2917,16,6664717,3,126.82,0.00,12.54,939.51),(2918,16,41084,3,261.41,0.00,26.10,835.46),(2919,16,6126264,3,226.08,0.00,28.70,704.24),(2920,16,1100348,3,137.56,0.00,25.82,976.97),(2921,16,178333,3,124.18,0.00,10.82,871.61),(2922,16,340663,3,146.01,0.00,44.72,1115.66),(2923,16,662584,3,120.65,0.00,38.02,929.86),(2924,16,2648784,3,142.08,0.00,29.15,998.20),(2925,16,13952016,3,170.88,0.00,68.64,1181.45),(2926,16,23706,3,134.42,0.00,58.45,1043.95),(2927,17,6664717,3,127.33,0.00,76.34,1015.85),(2928,17,41084,3,269.61,0.00,38.59,874.05),(2929,17,6126264,3,236.70,0.00,43.79,748.03),(2930,17,1100348,3,135.71,0.00,77.19,1054.16),(2931,17,178333,3,125.02,0.00,77.95,949.56),(2932,17,340663,3,141.43,0.00,69.56,1185.22),(2933,17,662584,3,119.52,0.00,68.04,997.90),(2934,17,2648784,3,144.92,0.00,85.04,1083.24),(2935,17,13952016,3,172.40,0.00,69.04,1250.49),(2936,17,23706,3,136.02,0.00,79.14,1123.09),(2937,18,6664717,3,136.54,0.00,108.95,1124.80),(2938,18,41084,3,281.77,0.00,74.99,949.04),(2939,18,6126264,3,248.85,0.00,71.05,819.08),(2940,18,1100348,3,132.32,0.00,61.45,1115.61),(2941,18,178333,3,125.16,0.00,70.15,1019.71),(2942,18,340663,3,145.59,0.00,87.49,1272.71),(2943,18,662584,3,119.17,0.00,76.75,1074.65),(2944,18,2648784,3,142.18,0.00,71.59,1154.83),(2945,18,13952016,3,169.41,0.00,71.60,1322.09),(2946,18,23706,3,139.37,0.00,87.75,1210.84),(2947,19,6664717,3,132.11,0.00,53.46,1178.26),(2948,19,41084,3,297.72,0.00,76.40,1025.44),(2949,19,6126264,1,261.86,0.00,51.81,870.89),(2950,19,1100348,3,130.98,0.00,60.15,1175.76),(2951,19,178333,3,124.51,0.00,39.96,1059.67),(2952,19,340663,3,142.98,0.00,56.56,1329.27),(2953,19,662584,3,116.83,0.00,44.01,1118.66),(2954,19,2648784,3,144.30,0.00,53.40,1208.23),(2955,19,13952016,3,169.53,0.00,67.91,1390.00),(2956,19,23706,3,142.00,0.00,69.06,1279.90),(2957,20,6664717,3,129.68,0.00,35.18,1213.44),(2958,20,41084,3,303.76,0.00,36.03,1061.47),(2959,20,6126264,3,265.38,0.00,45.91,916.80),(2960,20,1100348,3,129.31,0.00,58.98,1234.74),(2961,20,178333,3,127.56,0.00,46.11,1105.78),(2962,20,340663,3,143.24,0.00,54.48,1383.75),(2963,20,662584,3,115.54,0.00,48.98,1167.64),(2964,20,2648784,3,144.20,0.00,64.61,1272.84),(2965,20,13952016,3,163.61,0.00,28.61,1418.61),(2966,20,23706,3,140.40,0.00,48.08,1327.98);
/*!40000 ALTER TABLE `rounds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schemes`
--

DROP TABLE IF EXISTS `schemes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `schemes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cartola` int NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_cartola_UNIQUE` (`id_cartola`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schemes`
--

LOCK TABLES `schemes` WRITE;
/*!40000 ALTER TABLE `schemes` DISABLE KEYS */;
INSERT INTO `schemes` VALUES (1,1,'3-4-3'),(2,2,'3-5-2'),(3,3,'4-3-3'),(4,4,'4-4-2'),(5,5,'4-5-1'),(6,6,'5-3-2'),(7,7,'5-4-1');
/*!40000 ALTER TABLE `schemes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-29 22:41:33
