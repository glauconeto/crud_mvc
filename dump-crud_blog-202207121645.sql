-- ESTE É UM DUMP DO BANCO DE DADOS UTILIZADO NO PROJETO.


-- MariaDB dump 10.19  Distrib 10.6.7-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: crud_blog
-- ------------------------------------------------------
-- Server version	10.6.7-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comentario`
--

DROP TABLE IF EXISTS `comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `mensagem` text DEFAULT NULL,
  `id_postagem` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario`
--

LOCK TABLES `comentario` WRITE;
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
INSERT INTO `comentario` VALUES (10,'Flávio','Bla',5);
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postagem`
--

DROP TABLE IF EXISTS `postagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) DEFAULT NULL,
  `conteudo` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postagem`
--

LOCK TABLES `postagem` WRITE;
/*!40000 ALTER TABLE `postagem` DISABLE KEYS */;
INSERT INTO `postagem` VALUES (1,'Primeira Postagem','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget mauris tortor. Nulla eu arcu ut diam egestas interdum sed non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis iaculis dapibus dictum. Maecenas tempus odio at ligula facilisis rhoncus. Sed nec hendrerit risus. Aliquam erat volutpat. Vivamus congue libero leo, sit amet pharetra orci dapibus ac. Suspendisse dictum commodo tincidunt. In aliquam quam vitae nisi tempus sodales. Suspendisse potenti. Curabitur et elit lorem. Etiam justo velit, luctus eu malesuada pulvinar, tempor interdum lectus. Pellentesque tincidunt tellus ultrices, scelerisque ex vitae, iaculis odio. Donec turpis ante, congue a posuere a, dapibus eget nisl. Phasellus est ipsum, vulputate et odio vitae, facilisis suscipit urna. Vivamus luctus ac tellus sit amet posuere. Proin efficitur accumsan accumsan. Cras eu lectus lacus. Sed efficitur eleifend nibh vel fringilla. Suspendisse aliquam non dolor at facilisis. Pellentesque efficitur aliquet finibus.'),(2,'Segunda Postagem',' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat lacus id velit lobortis tincidunt. Donec mauris leo, tempor vitae elementum quis, dignissim eu ligula. Aliquam erat volutpat. Maecenas molestie tincidunt mattis. Phasellus dapibus tempor mauris at aliquet. Ut scelerisque, libero non pellentesque euismod, tortor ipsum scelerisque leo, a egestas risus orci non felis. Duis ut odio sapien. Vestibulum volutpat lectus nec ligula hendrerit lacinia. Aliquam gravida neque id efficitur sollicitudin. Pellentesque eu erat sapien. Morbi at tempus purus. Ut nunc dui, ornare a neque sit amet, rutrum porta ex. Vestibulum rutrum, tellus ac tincidunt fermentum, nulla elit convallis nibh, et laoreet diam nunc non metus. Morbi mauris nisl, fermentum vitae arcu nec, semper scelerisque justo. Donec a tellus nisi. Donec fermentum convallis urna quis rhoncus.\n\nProin mollis est luctus fringilla tempus. Nulla dignissim purus imperdiet nibh luctus, a hendrerit neque venenatis. Aliquam accumsan libero et fringilla laoreet. Pellentesque sagittis lacus blandit nulla rutrum gravida.'),(3,'asdafas','asdafas'),(4,'Quarta Postagem','sdsrhwgs sgsgrwg desew'),(5,'Quinta Postagem','sdsrhwgs sgsgrwg desew');
/*!40000 ALTER TABLE `postagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'crud_blog'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-12 16:45:12
