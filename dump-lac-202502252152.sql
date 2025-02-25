-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: lac
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `user_books`
--

DROP TABLE IF EXISTS `user_books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_books` (
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_books`
--

LOCK TABLES `user_books` WRITE;
/*!40000 ALTER TABLE `user_books` DISABLE KEYS */;
INSERT INTO `user_books` VALUES (1,19),(1,20),(1,21),(1,22),(1,23),(1,24),(1,25),(1,28),(1,31),(1,32),(1,33),(1,34),(1,37),(1,38);
/*!40000 ALTER TABLE `user_books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_users`
--

DROP TABLE IF EXISTS `book_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varbinary(255) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_users`
--

LOCK TABLES `book_users` WRITE;
/*!40000 ALTER TABLE `book_users` DISABLE KEYS */;
INSERT INTO `book_users` VALUES (1,'maha','mahasuccess90@gmail.com','Iù•8Bnï]ºaè³y#Ò',NULL,NULL,'2025-02-25 04:49:34');
/*!40000 ALTER TABLE `book_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `isbn` (`isbn`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'The Great Gatsby','9780743273565','F. Scott Fitzgerald',NULL,'2025-02-25 05:09:07'),(2,'1984','9780451524935','George Orwell',NULL,'2025-02-25 05:09:07'),(3,'To Kill a Mockingbird','9780061120084','Harper Lee',NULL,'2025-02-25 05:09:07'),(4,'Pride and Prejudice','9781503290563','Jane Austen',NULL,'2025-02-25 05:09:07'),(5,'The Catcher in the Rye','9780316769488','J.D. Salinger',NULL,'2025-02-25 05:09:07'),(6,'The Hobbit','9780261103283','J.R.R. Tolkien',NULL,'2025-02-25 05:09:07'),(7,'Moby Dick','9781503280786','Herman Melville',NULL,'2025-02-25 05:09:07'),(8,'War and Peace','9781400079988','Leo Tolstoy',NULL,'2025-02-25 05:09:07'),(9,'The Odyssey','9780140268867','Homer',NULL,'2025-02-25 05:09:07'),(10,'Crime and Punishment','9780486415871','Fyodor Dostoevsky',NULL,'2025-02-25 05:09:07'),(11,'The Lord of the Rings','9780544003415','J.R.R. Tolkien',NULL,'2025-02-25 05:09:07'),(12,'The Alchemist','9780061122415','Paulo Coelho',NULL,'2025-02-25 05:09:07'),(13,'Brave New World','9780060850524','Aldous Huxley',NULL,'2025-02-25 05:09:07'),(14,'The Picture of Dorian Gray','9780141439570','Oscar Wilde',NULL,'2025-02-25 05:09:07'),(15,'The Grapes of Wrath','9780143039433','John Steinbeck',NULL,'2025-02-25 05:09:07'),(38,'mmhh','hjjj','hjjjj','hhjj','2025-02-25 16:03:49');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'lac'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-25 21:52:30
