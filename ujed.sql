-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.22-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para ujed
CREATE DATABASE IF NOT EXISTS `ujed` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `ujed`;

-- Volcando estructura para tabla ujed.eventos
CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `informacion` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL,
  `inmuebles.id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `inmuebles.id` (`inmuebles.id`),
  CONSTRAINT `inmuebles.id` FOREIGN KEY (`inmuebles.id`) REFERENCES `inmuebles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla ujed.inmuebles
CREATE TABLE IF NOT EXISTS `inmuebles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `disponibilidad` enum('Disponible','Ocupado') NOT NULL DEFAULT 'Disponible',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla ujed.reservaciones
CREATE TABLE IF NOT EXISTS `reservaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `usuarios.id` int(11) NOT NULL,
  `eventos.id` int(11) NOT NULL,
  `secciones.id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuarios.id` (`usuarios.id`),
  KEY `eventos.id` (`eventos.id`),
  KEY `secciones.id` (`secciones.id`),
  CONSTRAINT `evento.id` FOREIGN KEY (`eventos.id`) REFERENCES `eventos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `seccion.id` FOREIGN KEY (`secciones.id`) REFERENCES `secciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuarios.id` FOREIGN KEY (`usuarios.id`) REFERENCES `usuarios` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla ujed.secciones
CREATE TABLE IF NOT EXISTS `secciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `disponibilidad` int(11) NOT NULL,
  `precio` double NOT NULL,
  `eventos.id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `eventos.id` (`eventos.id`),
  CONSTRAINT `eventos.id` FOREIGN KEY (`eventos.id`) REFERENCES `eventos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla ujed.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `matricula` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `tipo` enum('administrador','usuario') NOT NULL DEFAULT 'usuario',
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
