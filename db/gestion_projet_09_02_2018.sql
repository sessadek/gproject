-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: gestion_projet
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
-- Table structure for table `backlog`
--

DROP TABLE IF EXISTS `backlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `backlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_backlog` int(11) NOT NULL,
  `fonctionnalite` text NOT NULL,
  `importance` int(11) NOT NULL,
  `estimation` int(11) NOT NULL,
  `demonstration` text NOT NULL,
  `notes` text NOT NULL,
  `id_projet` int(11) NOT NULL,
  `couleur` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `backlog`
--

LOCK TABLES `backlog` WRITE;
/*!40000 ALTER TABLE `backlog` DISABLE KEYS */;
INSERT INTO `backlog` VALUES (1,1,'Fonc 11',10,10,'demo texte11','Notes texte11',2,'#00e600'),(2,2,'Fonc 12',100,10,'demo texte12','Notes texte12',2,'#ff9933'),(3,5,'Fonc 13',150,12,'demo texte13','Notes texte13',2,'#4da6ff'),(4,10,'Fonc 1',100,8,'demo texte1','Notes texte1',2,'#ff0000'),(5,11,'Fonc2',150,5,'demo texte2','Notes texte2',2,'#ffb3b3'),(6,12,'Fonc3',151,6,'demo texte3','Notes texte3',2,'#fff'),(7,13,'Fonc4',152,7,'demo texte4','Notes texte4',2,'#fff'),(8,14,'Fonc5',153,8,'demo texte5','Notes texte5',2,'#fff'),(9,15,'Fonc6',154,9,'demo texte6','Notes texte6',2,'#fff'),(10,16,'Fonc7',155,10,'demo texte7','Notes texte7',2,'#fff'),(11,17,'Fonc8',156,11,'demo texte8','Notes texte8',2,'#fff'),(12,129,'Fonc 14',100,15,'demo texte14','Notes texte14',2,'#ff6699');
/*!40000 ALTER TABLE `backlog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentation`
--

DROP TABLE IF EXISTS `documentation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documentation` (
  `id_docs` int(11) NOT NULL AUTO_INCREMENT,
  `id_projet` int(11) NOT NULL,
  `lien` varchar(150) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_docs`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentation`
--

LOCK TABLES `documentation` WRITE;
/*!40000 ALTER TABLE `documentation` DISABLE KEYS */;
INSERT INTO `documentation` VALUES (1,2,'test.pdf','Rapport d\'activite',3,0,'2018-02-09 12:19:13'),(2,2,'test2.pdf','Rapport d\'activite 2',3,0,'2018-02-09 12:19:36'),(3,2,'201801261042355a6af80b0bba3.png','image',3,0,'2018-02-09 12:19:44'),(5,2,'201802042119435a776adf9de99.xlsx','backlog 1',3,0,'2018-02-09 12:20:09'),(6,2,'201802042121305a776b4aa87b7.xlsx','backlog 2',3,0,'2018-02-09 12:20:12'),(7,2,'201802042128205a776ce433d39.xlsx','tableau de suivi',3,0,'2018-02-09 12:20:22'),(8,2,'201802042129485a776d3c693f0.xlsx','backlog 3',3,0,'2018-02-09 12:20:33'),(9,2,'201802042222335a7779998eea2.pdf','Cahier des charges',3,0,'2018-02-09 12:20:45');
/*!40000 ALTER TABLE `documentation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etat_projet`
--

DROP TABLE IF EXISTS `etat_projet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etat_projet` (
  `id_etat` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_etat` varchar(100) NOT NULL,
  PRIMARY KEY (`id_etat`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etat_projet`
--

LOCK TABLES `etat_projet` WRITE;
/*!40000 ALTER TABLE `etat_projet` DISABLE KEYS */;
INSERT INTO `etat_projet` VALUES (1,'En cours de traitement'),(2,'En cours de validation'),(3,'LivrÃ©'),(4,'Nouveau');
/*!40000 ALTER TABLE `etat_projet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livrable`
--

DROP TABLE IF EXISTS `livrable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livrable` (
  `id_livrable` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(120) NOT NULL,
  `datedebut` datetime NOT NULL,
  `datefin` datetime NOT NULL,
  `description` text NOT NULL,
  `id_backlog` int(11) NOT NULL,
  `id_projet` int(11) NOT NULL,
  `prograssion` int(11) NOT NULL,
  `montant_livrable` float NOT NULL,
  `id_etat` int(11) NOT NULL,
  PRIMARY KEY (`id_livrable`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livrable`
--

LOCK TABLES `livrable` WRITE;
/*!40000 ALTER TABLE `livrable` DISABLE KEYS */;
INSERT INTO `livrable` VALUES (1,'Livraison tache 16','2018-01-31 00:00:00','2018-02-27 00:00:00','lorem ipsumo dolar sit amet lorem ipsumo dolar sit amet lorem ipsumo dolar sit amet lorem ipsumo dolar sit amet lorem ipsumo dolar sit amet lorem ipsumo dolar sit amet lorem ipsumo dolar sit amet lorem ipsumo dolar sit amet lorem ipsumo dolar sit amet lorem ipsumo dolar sit amet lorem ipsumo dolar sit amet lorem ipsumo dolar sit amet ',1,7,100,1000,2),(3,'Livraison tache 1','2018-01-09 12:00:00','2018-01-14 12:00:00','lorem ipsumo dolar sit amet lorem ipsumo dolar sit amet lorem ipsumo dolar sit amet lorem ipsumo dolar sit amet lorem ipsumo dolar sit amet lorem ipsumo dolar sit amet lorem ipsumo dolar sit amet lorem ipsumo dolar sit amet lorem ipsumo dolar sit amet lorem ipsumo dolar sit amet lorem ipsumo dolar sit amet lorem ipsumo dolar sit amet ',0,7,30,1000,2),(6,'Livraison tache 15','2018-01-10 09:45:00','2018-01-09 10:25:00','lofrme lofrme lofrme lofrme lofrme lofrme ',2,6,80,1000,2),(7,'Livraison tache 11','2018-02-01 05:25:00','2018-02-22 18:50:00','orem ipsum dolor sit amet consectetur adipiscing elit molestie, posuere eleifend suscipit rhoncus ac accumsan. Gravida tristique habitasse dignissim lobortis nisl metus quisque dapibus ante, sed class venenatis malesuada potenti varius aenean nascetur, vehicula pellentesque aptent etiam dictum taciti magna condimentum. Orci tellus posuere ante etiam molestie suspendisse torquent fusce, mauris nulla auctor erat commodo sem lacus, facilisi justo donec class mattis augue platea. Proin curae per eu ullamcorper nec lacinia eget diam magnis habitasse mollis eleifend, maecenas inceptos vel ultricies phasellus quis tristique dictu',1,2,60,1000,2),(8,'Livraison tache 2','2018-02-08 00:00:00','2018-04-12 00:00:00','orem ipsum dolor sit amet consectetur adipiscing elit molestie, posuere eleifend suscipit rhoncus ac accumsan. Gravida tristique habitasse dignissim lobortis nisl metus quisque dapibus ante, sed class venenatis malesuada potenti varius aenean nascetur, vehicula pellentesque aptent etiam dictum taciti magna condimentum. Orci tellus posuere ante etiam molestie suspendisse torquent fusce, mauris nulla auctor erat commodo sem lacus, facilisi justo donec class mattis augue platea. Proin curae per eu ullamcorper nec lacinia eget diam magnis habitasse mollis eleifend, maecenas inceptos vel ultricies phasellus quis tristique dictu',1,3,30,400,1),(9,'Livraison tache 3','2018-02-08 00:00:00','2018-04-12 00:00:00','orem ipsum dolor sit amet consectetur adipiscing elit molestie, posuere eleifend suscipit rhoncus ac accumsan. Gravida tristique habitasse dignissim lobortis nisl metus quisque dapibus ante, sed class venenatis malesuada potenti varius aenean nascetur, vehicula pellentesque aptent etiam dictum taciti magna condimentum. Orci tellus posuere ante etiam molestie suspendisse torquent fusce, mauris nulla auctor erat commodo sem lacus, facilisi justo donec class mattis augue platea. Proin curae per eu ullamcorper nec lacinia eget diam magnis habitasse mollis eleifend, maecenas inceptos vel ultricies phasellus quis tristique dictu',1,3,30,400,1),(10,'Livraison tache 12','2018-02-08 00:00:00','2018-04-12 00:00:00','orem ipsum dolor sit amet consectetur adipiscing elit molestie, posuere eleifend suscipit rhoncus ac accumsan. Gravida tristique habitasse dignissim lobortis nisl metus quisque dapibus ante, sed class venenatis malesuada potenti varius aenean nascetur, vehicula pellentesque aptent etiam dictum taciti magna condimentum. Orci tellus posuere ante etiam molestie suspendisse torquent fusce, mauris nulla auctor erat commodo sem lacus, facilisi justo donec class mattis augue platea. Proin curae per eu ullamcorper nec lacinia eget diam magnis habitasse mollis eleifend, maecenas inceptos vel ultricies phasellus quis tristique dictu',1,4,60,1000,2),(11,'Livraison tache 13','2018-02-08 00:00:00','2018-04-12 00:00:00','orem ipsum dolor sit amet consectetur adipiscing elit molestie, posuere eleifend suscipit rhoncus ac accumsan. Gravida tristique habitasse dignissim lobortis nisl metus quisque dapibus ante, sed class venenatis malesuada potenti varius aenean nascetur, vehicula pellentesque aptent etiam dictum taciti magna condimentum. Orci tellus posuere ante etiam molestie suspendisse torquent fusce, mauris nulla auctor erat commodo sem lacus, facilisi justo donec class mattis augue platea. Proin curae per eu ullamcorper nec lacinia eget diam magnis habitasse mollis eleifend, maecenas inceptos vel ultricies phasellus quis tristique dictu',3,9,60,6000,2),(12,'Livraison tache 4','2018-02-08 00:00:00','2018-04-12 00:00:00','orem ipsum dolor sit amet consectetur adipiscing elit molestie, posuere eleifend suscipit rhoncus ac accumsan. Gravida tristique habitasse dignissim lobortis nisl metus quisque dapibus ante, sed class venenatis malesuada potenti varius aenean nascetur, vehicula pellentesque aptent etiam dictum taciti magna condimentum. Orci tellus posuere ante etiam molestie suspendisse torquent fusce, mauris nulla auctor erat commodo sem lacus, facilisi justo donec class mattis augue platea. Proin curae per eu ullamcorper nec lacinia eget diam magnis habitasse mollis eleifend, maecenas inceptos vel ultricies phasellus quis tristique dictu',1,2,30,400,1),(13,'Livraison tache 5','2018-02-08 00:00:00','2018-04-12 00:00:00','orem ipsum dolor sit amet consectetur adipiscing elit molestie, posuere eleifend suscipit rhoncus ac accumsan. Gravida tristique habitasse dignissim lobortis nisl metus quisque dapibus ante, sed class venenatis malesuada potenti varius aenean nascetur, vehicula pellentesque aptent etiam dictum taciti magna condimentum. Orci tellus posuere ante etiam molestie suspendisse torquent fusce, mauris nulla auctor erat commodo sem lacus, facilisi justo donec class mattis augue platea. Proin curae per eu ullamcorper nec lacinia eget diam magnis habitasse mollis eleifend, maecenas inceptos vel ultricies phasellus quis tristique dictu',1,10,30,300,2),(14,'Livraison tache 6','2018-02-08 00:00:00','2018-04-12 00:00:00','orem ipsum dolor sit amet consectetur adipiscing elit molestie, posuere eleifend suscipit rhoncus ac accumsan. Gravida tristique habitasse dignissim lobortis nisl metus quisque dapibus ante, sed class venenatis malesuada potenti varius aenean nascetur, vehicula pellentesque aptent etiam dictum taciti magna condimentum. Orci tellus posuere ante etiam molestie suspendisse torquent fusce, mauris nulla auctor erat commodo sem lacus, facilisi justo donec class mattis augue platea. Proin curae per eu ullamcorper nec lacinia eget diam magnis habitasse mollis eleifend, maecenas inceptos vel ultricies phasellus quis tristique dictu',1,11,30,400,2),(15,'Livraison tache 7','2018-02-08 00:00:00','2018-04-12 00:00:00','orem ipsum dolor sit amet consectetur adipiscing elit molestie, posuere eleifend suscipit rhoncus ac accumsan. Gravida tristique habitasse dignissim lobortis nisl metus quisque dapibus ante, sed class venenatis malesuada potenti varius aenean nascetur, vehicula pellentesque aptent etiam dictum taciti magna condimentum. Orci tellus posuere ante etiam molestie suspendisse torquent fusce, mauris nulla auctor erat commodo sem lacus, facilisi justo donec class mattis augue platea. Proin curae per eu ullamcorper nec lacinia eget diam magnis habitasse mollis eleifend, maecenas inceptos vel ultricies phasellus quis tristique dictu',1,4,30,400,1),(16,'Livraison tache 8','2018-02-08 00:00:00','2018-04-12 00:00:00','orem ipsum dolor sit amet consectetur adipiscing elit molestie, posuere eleifend suscipit rhoncus ac accumsan. Gravida tristique habitasse dignissim lobortis nisl metus quisque dapibus ante, sed class venenatis malesuada potenti varius aenean nascetur, vehicula pellentesque aptent etiam dictum taciti magna condimentum. Orci tellus posuere ante etiam molestie suspendisse torquent fusce, mauris nulla auctor erat commodo sem lacus, facilisi justo donec class mattis augue platea. Proin curae per eu ullamcorper nec lacinia eget diam magnis habitasse mollis eleifend, maecenas inceptos vel ultricies phasellus quis tristique dictu',1,12,30,400,2),(17,'Livraison tache 9','2018-02-08 00:00:00','2018-04-12 00:00:00','orem ipsum dolor sit amet consectetur adipiscing elit molestie, posuere eleifend suscipit rhoncus ac accumsan. Gravida tristique habitasse dignissim lobortis nisl metus quisque dapibus ante, sed class venenatis malesuada potenti varius aenean nascetur, vehicula pellentesque aptent etiam dictum taciti magna condimentum. Orci tellus posuere ante etiam molestie suspendisse torquent fusce, mauris nulla auctor erat commodo sem lacus, facilisi justo donec class mattis augue platea. Proin curae per eu ullamcorper nec lacinia eget diam magnis habitasse mollis eleifend, maecenas inceptos vel ultricies phasellus quis tristique dictu',1,4,30,400,1),(18,'Livraison tache 10','2018-02-08 00:00:00','2018-04-12 00:00:00','orem ipsum dolor sit amet consectetur adipiscing elit molestie, posuere eleifend suscipit rhoncus ac accumsan. Gravida tristique habitasse dignissim lobortis nisl metus quisque dapibus ante, sed class venenatis malesuada potenti varius aenean nascetur, vehicula pellentesque aptent etiam dictum taciti magna condimentum. Orci tellus posuere ante etiam molestie suspendisse torquent fusce, mauris nulla auctor erat commodo sem lacus, facilisi justo donec class mattis augue platea. Proin curae per eu ullamcorper nec lacinia eget diam magnis habitasse mollis eleifend, maecenas inceptos vel ultricies phasellus quis tristique dictu',1,4,50,400,1),(19,'Livraison tache 14','2018-02-08 00:00:00','2018-04-12 00:00:00','orem ipsum dolor sit amet consectetur adipiscing elit molestie, posuere eleifend suscipit rhoncus ac accumsan. Gravida tristique habitasse dignissim lobortis nisl metus quisque dapibus ante, sed class venenatis malesuada potenti varius aenean nascetur, vehicula pellentesque aptent etiam dictum taciti magna condimentum. Orci tellus posuere ante etiam molestie suspendisse torquent fusce, mauris nulla auctor erat commodo sem lacus, facilisi justo donec class mattis augue platea. Proin curae per eu ullamcorper nec lacinia eget diam magnis habitasse mollis eleifend, maecenas inceptos vel ultricies phasellus quis tristique dictu',1,6,60,400,1);
/*!40000 ALTER TABLE `livrable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paiment`
--

DROP TABLE IF EXISTS `paiment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paiment` (
  `id_paiment` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_paiment` varchar(100) NOT NULL,
  PRIMARY KEY (`id_paiment`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paiment`
--

LOCK TABLES `paiment` WRITE;
/*!40000 ALTER TABLE `paiment` DISABLE KEYS */;
INSERT INTO `paiment` VALUES (1,'PayÃ©'),(2,'En attente du paiement par chÃ¨que'),(4,'RemboursÃ©'),(6,'Non payÃ©');
/*!40000 ALTER TABLE `paiment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penalite`
--

DROP TABLE IF EXISTS `penalite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penalite` (
  `id_penalite` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_projet` int(11) NOT NULL,
  `valeur` float NOT NULL,
  `description` text NOT NULL,
  `date_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_penalite`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penalite`
--

LOCK TABLES `penalite` WRITE;
/*!40000 ALTER TABLE `penalite` DISABLE KEYS */;
INSERT INTO `penalite` VALUES (1,3,2,5000,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor','2018-02-04 22:03:30'),(2,3,2,3000,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor','2018-02-04 22:10:09'),(3,3,2,4000,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor','2018-02-04 22:12:34');
/*!40000 ALTER TABLE `penalite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `planning`
--

DROP TABLE IF EXISTS `planning`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `planning` (
  `id_planning` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(150) NOT NULL,
  `datedebut` datetime NOT NULL,
  `datefin` datetime NOT NULL,
  `description` text NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_planning`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `planning`
--

LOCK TABLES `planning` WRITE;
/*!40000 ALTER TABLE `planning` DISABLE KEYS */;
INSERT INTO `planning` VALUES (3,'REUNION 2','2018-02-20 05:25:00','2018-02-24 06:30:00','Lorem ipsum dolor sit amet consectetur adipiscing elit eu suspendisse, tincidunt mauris sociosqu fames duis facilisi tristique habitant nunc euismod, ultrices cursus accumsan pharetra cum placerat nascetur himenaeos. Sem at libero morbi fermentum vestibulum ad, nullam ridiculus tellus dignissim nam in, convallis cursus eu lacinia netus. Dictumst dignissim risus justo dictum mattis morbi vitae molestie egestas cursus aenean, neque ante volutpat penatibus fames vel hac placerat porttitor metus suspendisse, eleifend tellus dis senectus cum nisi mauris aptent cubilia vulputate. Proin porta hac dictumst senectus cum pulvinar vel metus curae commodo tempor inceptos mus, etiam habitant laoreet est ligula fusce nibh sodales parturient potenti feugiat ultricies orci nisi, ridiculus lacinia faucibus nam lectus eu quis massa cursus ut tincidunt fames. Cursus magna tristique non egestas tincidunt ridiculus eros pretium magnis, laoreet cubilia purus mus quis parturient nec mauris, sociosqu proin montes imperdiet ',3),(4,'REUNION 3','2018-02-17 05:25:00','2018-02-17 06:30:00','Lorem ipsum dolor sit amet consectetur adipiscing elit eu suspendisse, tincidunt mauris sociosqu fames duis facilisi tristncidunt ridiculus eros pretium magnis, laoreet cubilia purus mus quis parturient nec mauris, sociosqu proin montes imperdiet ',3),(5,'REUNION 4','2018-02-21 05:25:00','2018-02-23 06:30:00','Lorem ipsum dolor sit amet consectetur adipiscing elit eu suspendisse, tincidunt mauris sociosqu fames duis facilisi tristncidunt ridiculus eros pretium magnis, laoreet cubilia purus mus quis parturient nec mauris, sociosqu proin montes imperdiet ',3),(6,'REUNION 5','2018-02-20 05:25:00','2018-02-24 06:30:00','Lorem ipsum dolor sit amet consectetur adipiscing elit eu suspendisse, tincidunt mauris sociosqu fames duis facilisi tristncidunt ridiculus eros pretium magnis, laoreet cubilia purus mus quis parturient nec mauris, sociosqu proin montes imperdiet ',3),(7,'REUNION 6','2018-04-19 05:25:00','2018-02-24 06:30:00','Lorem ipsum dolor sit amet consectetur adipiscing elit eu suspendisse, tincidunt mauris sociosqu fames duis facilisi tristncidunt ridiculus eros pretium magnis, laoreet cubilia purus mus quis parturient nec mauris, sociosqu proin montes imperdiet ',3),(8,'REUNION 7','2018-03-08 05:25:00','2018-02-24 06:30:00','Lorem ipsum dolor sit amet consectetur adipiscing elit eu suspendisse, tincidunt mauris sociosqu fames duis facilisi tristncidunt ridiculus eros pretium magnis, laoreet cubilia purus mus quis parturient nec mauris, sociosqu proin montes imperdiet ',3);
/*!40000 ALTER TABLE `planning` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projets`
--

DROP TABLE IF EXISTS `projets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projets` (
  `id_projet` int(11) NOT NULL AUTO_INCREMENT,
  `nom_projet` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `id_societe` int(11) NOT NULL,
  `id_responsable1` int(11) NOT NULL,
  `id_responsable2` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `etat_paiment` int(11) NOT NULL,
  `etat_projet` int(11) NOT NULL,
  `montant` float NOT NULL,
  `date_debut` date NOT NULL,
  `date_livraison` date NOT NULL,
  PRIMARY KEY (`id_projet`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projets`
--

LOCK TABLES `projets` WRITE;
/*!40000 ALTER TABLE `projets` DISABLE KEYS */;
INSERT INTO `projets` VALUES (1,'PROJET 1','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',1,3,5,3,1,1,130000,'2017-01-18','2017-02-18'),(2,'PROJET 2','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',1,3,6,1,2,2,50000,'2017-01-01','2017-06-01'),(3,'PROJET 3','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',4,7,5,2,4,1,14000,'2017-03-01','2017-06-01'),(4,'PROJET 4','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',6,3,6,3,6,2,14000,'2017-02-01','2017-06-01'),(5,'PROJET 5','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',3,6,5,2,1,3,1403400,'2017-02-01','2017-06-01'),(6,'PROJET 6','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',2,5,3,1,2,2,145000,'2017-02-01','2017-06-01'),(7,'PROJET 7','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',5,6,7,2,6,3,140000,'2017-02-01','2017-06-01'),(8,'PROJET 8','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',6,7,3,2,4,1,14000,'2017-02-01','2017-06-01'),(9,'PROJET 9','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',5,3,7,2,1,2,1404300,'2018-01-01','2018-04-01'),(10,'PROJET 10','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',5,6,5,2,2,3,14000,'2018-01-01','2017-04-01'),(11,'PROJET 11','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',4,5,3,3,6,3,14000,'2018-01-01','2018-04-01'),(12,'PROJET 12','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',2,6,5,1,6,1,135300,'2018-01-01','2018-04-01'),(13,'PROJET 13','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',6,3,7,3,4,2,140000,'2018-01-01','2017-04-01'),(14,'PROJET 14','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',3,5,7,4,1,4,154000,'2018-01-01','2018-04-01'),(15,'PROJET 15','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',4,7,3,2,6,1,1400000,'2018-01-01','2018-04-01'),(16,'PROJET 16','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',2,6,5,2,4,3,1453000,'2018-01-01','2018-04-01'),(17,'PROJET 17','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',3,5,3,2,1,1,14000,'2018-01-01','2019-01-01');
/*!40000 ALTER TABLE `projets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_rolle` varchar(100) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Administrateur'),(2,'Supervisuer'),(3,'Agent');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secteurs`
--

DROP TABLE IF EXISTS `secteurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `secteurs` (
  `id_secteur` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_secteur` varchar(100) NOT NULL,
  PRIMARY KEY (`id_secteur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secteurs`
--

LOCK TABLES `secteurs` WRITE;
/*!40000 ALTER TABLE `secteurs` DISABLE KEYS */;
INSERT INTO `secteurs` VALUES (1,'Gros oeuvre'),(2,'Installation electrique'),(3,'Installation informatique');
/*!40000 ALTER TABLE `secteurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `societes`
--

DROP TABLE IF EXISTS `societes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `societes` (
  `id_societe` int(11) NOT NULL AUTO_INCREMENT,
  `raison_social` varchar(150) NOT NULL,
  `id_secteur` int(11) NOT NULL,
  `note` varchar(20) NOT NULL,
  `adresse` text NOT NULL,
  `tele` varchar(15) NOT NULL,
  `contact_principale_nom` varchar(150) NOT NULL,
  `contact_principale_tele` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_societe`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `societes`
--

LOCK TABLES `societes` WRITE;
/*!40000 ALTER TABLE `societes` DISABLE KEYS */;
INSERT INTO `societes` VALUES (1,'AL AMANA',2,'2','40, avenue al fadila, 10130, Rabat, Maroc 10130','0537289500','Youssef Bencheqroun','0612345678','alamana@alamana.ma','2018-01-14 23:00:00','2018-02-09 11:25:02'),(2,'IBIZA',3,'5','Avenue Hassan II Citè Al Manar, Rabat 11000','0537707071','Ahmed El Alami','0612345679','ibiza@ibiza.ma','2018-01-18 15:50:01','2018-02-09 11:28:32'),(3,'NASSIME',3,'5','Avenue Hassan II Citè Al Manar, Rabat 11000','0537707070','Rachid Allali','0612345610','nassime@nassime.ma','2018-01-18 15:52:53','2018-02-09 11:28:30'),(4,'MARISAR',1,'3.8','Avenue Hassan II Citè Al Manar, Rabat 11000','0537724848','Hicham Benradi','0612345611','marisar@marisar.ma','2018-02-04 22:37:18','2018-02-09 11:25:07'),(5,'LAFARGE',1,'3.8','Boulevard de la Mecque, Casablanca','0522524972','Saad Sebbar','0612345612','lafarge@lafarge.ma','2018-02-04 22:37:18','2018-02-09 11:27:04'),(6,'INWI',2,'3.8','38 avenue chellah hassan, Rabat','0550042211','Yahya Belhaj','0612345613','contact@inwi.ma','2018-02-04 22:37:18','2018-02-09 11:28:04');
/*!40000 ALTER TABLE `societes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_projet`
--

DROP TABLE IF EXISTS `type_projet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_projet` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_type` varchar(100) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_projet`
--

LOCK TABLES `type_projet` WRITE;
/*!40000 ALTER TABLE `type_projet` DISABLE KEYS */;
INSERT INTO `type_projet` VALUES (1,'Projet informatique'),(2,'Projet industriel'),(3,'Marketing et communication'),(4,'Autres');
/*!40000 ALTER TABLE `type_projet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `password` varchar(150) NOT NULL,
  `id_role` int(11) NOT NULL,
  `service` varchar(150) NOT NULL,
  `deleted` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'Hamza','Natek','test@test.com','0612345678','e10adc3949ba59abbe56e057f20f883e',1,'Administration',0,'2018-01-09 23:00:00','2018-02-09 11:14:49'),(5,'Hicham','Benradi','benradi.hicham@gmail.com','0657052421','e10adc3949ba59abbe56e057f20f883e',2,'Service materiel',1,'2018-01-17 14:11:57','2018-02-09 11:16:49'),(6,'Abderahman','Isseksioui','issabdo0011@gmail.com','0657052421','e10adc3949ba59abbe56e057f20f883e',2,'Service informatique',1,'2018-01-17 14:15:28','2018-02-09 11:16:52'),(7,'Ahmed','Lorem','loremipsum@gmail.com','657052421','e10adc3949ba59abbe56e057f20f883e',3,'Ressources humaines',1,'2018-01-17 14:15:44','2018-02-09 11:16:54');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-09 14:37:35
