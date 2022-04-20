-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         8.0.28 - MySQL Community Server - GPL
-- SO del servidor:              Linux
-- HeidiSQL Versión:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando datos para la tabla test_project.failed_jobs: ~0 rows (aproximadamente)

-- Volcando datos para la tabla test_project.migrations: ~0 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- Volcando datos para la tabla test_project.password_resets: ~0 rows (aproximadamente)

-- Volcando datos para la tabla test_project.personal_access_tokens: ~0 rows (aproximadamente)

-- Volcando datos para la tabla test_project.users: ~0 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `lastname`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Demo', 'Bautista', '7711244052', 'test@gmail.com', NULL, 'demo', NULL, '2022-04-19 19:04:33', '2022-04-19 19:04:33'),
	(3, 'Eustacio', 'Bautista', '7711244052', 'test2@gmail.com', NULL, '$2y$10$U0gRGG5RD0qRNpir5oAXG..zAlzMgDztsoys9B9lnNwfkfeCG1gym', 'RDpOq1OzFdn5aap0aFj0ntTzga9iUvUfHWEFky6yAVqIJaILoXXkCfLF9W7j', '2022-04-19 20:20:55', '2022-04-19 20:20:55');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
