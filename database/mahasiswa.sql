-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               PostgreSQL 12.1, compiled by Visual C++ build 1914, 64-bit
-- Server OS:                    
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES  */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table public.mahasiswa
CREATE TABLE IF NOT EXISTS "mahasiswa" (
	"id" INTEGER NOT NULL DEFAULT 'nextval(''mahasiswa_id_seq''::regclass)',
	"name" VARCHAR NULL DEFAULT NULL,
	"email" VARCHAR NULL DEFAULT NULL,
	"nrp" VARCHAR NULL DEFAULT NULL,
	"jurusan" VARCHAR NULL DEFAULT NULL,
	PRIMARY KEY ("id")
);

-- Dumping data for table public.mahasiswa: 2 rows
DELETE FROM "mahasiswa";
/*!40000 ALTER TABLE "mahasiswa" DISABLE KEYS */;
INSERT INTO "mahasiswa" ("id", "name", "email", "nrp", "jurusan") VALUES
	(1, 'Rizal Fauzi', 'rizalfauzi774@gmail.com', '202143501913', 'Teknik Informatika'),
	(3, 'Husein Azka Fadhillah', 'huseinazka@gmail.com', '202143501713', 'Teknik Informatika');
/*!40000 ALTER TABLE "mahasiswa" ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
