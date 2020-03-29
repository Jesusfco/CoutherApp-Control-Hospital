-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 29-03-2020 a las 19:45:53
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `couther`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antecedentes`
--

DROP TABLE IF EXISTS `antecedentes`;
CREATE TABLE IF NOT EXISTS `antecedentes` (
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `controls`
--

DROP TABLE IF EXISTS `controls`;
CREATE TABLE IF NOT EXISTS `controls` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `paciente_id` bigint(20) NOT NULL,
  `medico_id` bigint(20) NOT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alergias` text COLLATE utf8mb4_unicode_ci,
  `TA` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peso` double DEFAULT NULL,
  `talla` double DEFAULT NULL,
  `temperatura` double DEFAULT NULL,
  `IMC` double DEFAULT NULL,
  `SPO2` double DEFAULT NULL,
  `FC` double DEFAULT NULL,
  `FR` double DEFAULT NULL,
  `DXTX` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p` text COLLATE utf8mb4_unicode_ci,
  `s` text COLLATE utf8mb4_unicode_ci,
  `o` text COLLATE utf8mb4_unicode_ci,
  `a` text COLLATE utf8mb4_unicode_ci,
  `diagnostico` text COLLATE utf8mb4_unicode_ci,
  `pronostico` text COLLATE utf8mb4_unicode_ci,
  `plan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `controls`
--

INSERT INTO `controls` (`id`, `paciente_id`, `medico_id`, `telefono`, `alergias`, `TA`, `peso`, `talla`, `temperatura`, `IMC`, `SPO2`, `FC`, `FR`, `DXTX`, `p`, `s`, `o`, `a`, `diagnostico`, `pronostico`, `plan`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '9615551', 'NINGUNA', '1', 5, 56, 3, 2, 4, 5, 6, '7', 'Desde Palacio Nacional, el funcionario explicó que si continúa la Jornada Nacional de Sana Distancia en estas cuatro semanas, “en lugar de tener una curva epidémica inmensa, que supere la capacidad de atención, vamos a tener una curva de menor tamaño que permita atender a las personas críticas”.\r\n\r\nAsimismo, consideró que las autoridades quisieran hacer las medidas de salud pública lo más extremas posibles ante lo que está ocurriendo con el COVID-19 en otros países, sin embargo, reiteró que “hay algunas de estas medidas que no tiene un fundamento técnico como el cierre de fronteras y el cierre de aeropuertos”.', 'Desde Palacio Nacional, el funcionario explicó que si continúa la Jornada Nacional de Sana Distancia en estas cuatro semanas, “en lugar de tener una curva epidémica inmensa, que supere la capacidad de atención, vamos a tener una curva de menor tamaño que permita atender a las personas críticas”.\r\n\r\nAsimismo, consideró que las autoridades quisieran hacer las medidas de salud pública lo más extremas posibles ante lo que está ocurriendo con el COVID-19 en otros países, sin embargo, reiteró que “hay algunas de estas medidas que no tiene un fundamento técnico como el cierre de fronteras y el cierre de aeropuertos”.', 'Desde Palacio Nacional, el funcionario explicó que si continúa la Jornada Nacional de Sana Distancia en estas cuatro semanas, “en lugar de tener una curva epidémica inmensa, que supere la capacidad de atención, vamos a tener una curva de menor tamaño que permita atender a las personas críticas”.\r\n\r\nAsimismo, consideró que las autoridades quisieran hacer las medidas de salud pública lo más extremas posibles ante lo que está ocurriendo con el COVID-19 en otros países, sin embargo, reiteró que “hay algunas de estas medidas que no tiene un fundamento técnico como el cierre de fronteras y el cierre de aeropuertos”.', 'Desde Palacio Nacional, el funcionario explicó que si continúa la Jornada Nacional de Sana Distancia en estas cuatro semanas, “en lugar de tener una curva epidémica inmensa, que supere la capacidad de atención, vamos a tener una curva de menor tamaño que permita atender a las personas críticas”.\r\n\r\nAsimismo, consideró que las autoridades quisieran hacer las medidas de salud pública lo más extremas posibles ante lo que está ocurriendo con el COVID-19 en otros países, sin embargo, reiteró que “hay algunas de estas medidas que no tiene un fundamento técnico como el cierre de fronteras y el cierre de aeropuertos”.', 'Desde Palacio Nacional, el funcionario explicó que si continúa la Jornada Nacional de Sana Distancia en estas cuatro semanas, “en lugar de tener una curva epidémica inmensa, que supere la capacidad de atención, vamos a tener una curva de menor tamaño que permita atender a las personas críticas”.\r\n\r\nAsimismo, consideró que las autoridades quisieran hacer las medidas de salud pública lo más extremas posibles ante lo que está ocurriendo con el COVID-19 en otros países, sin embargo, reiteró que “hay algunas de estas medidas que no tiene un fundamento técnico como el cierre de fronteras y el cierre de aeropuertos”.', 'Desde Palacio Nacional, el funcionario explicó que si continúa la Jornada Nacional de Sana Distancia en estas cuatro semanas, “en lugar de tener una curva epidémica inmensa, que supere la capacidad de atención, vamos a tener una curva de menor tamaño que permita atender a las personas críticas”.\r\n\r\nAsimismo, consideró que las autoridades quisieran hacer las medidas de salud pública lo más extremas posibles ante lo que está ocurriendo con el COVID-19 en otros países, sin embargo, reiteró que “hay algunas de estas medidas que no tiene un fundamento técnico como el cierre de fronteras y el cierre de aeropuertos”.', 'Desde Palacio Nacional, el funcionario explicó que si continúa la Jornada Nacional de Sana Distancia en estas cuatro semanas, “en lugar de tener una curva epidémica inmensa, que supere la capacidad de atención, vamos a tener una curva de menor tamaño que permita atender a las personas críticas”.\r\n\r\nAsimismo, consideró que las autoridades quisieran hacer las medidas de salud pública lo más extremas posibles ante lo que está ocurriendo con el COVID-19 en otros países, sin embargo, reiteró que “hay algunas de estas medidas que no tiene un fundamento técnico como el cierre de fronteras y el cierre de aeropuertos”.', '2020-03-27 05:42:38', '2020-03-27 06:57:06'),
(2, 7, 4, '8445664', 'NINGUNA', 'TA/AS', 55.5, 160, 36.5, 54.2, 45.5, 55.1, 55.2, '55.3', 'col', 'col', 'col', 'col', 'col', 'col', 'col', '2020-03-29 23:47:54', '2020-03-30 00:16:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccions`
--

DROP TABLE IF EXISTS `direccions`;
CREATE TABLE IF NOT EXISTS `direccions` (
  `user_id` int(11) NOT NULL,
  `calle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colonia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `numero_int` int(11) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `ciudad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `direccions`
--

INSERT INTO `direccions` (`user_id`, `calle`, `colonia`, `numero`, `numero_int`, `cp`, `ciudad`, `estado`) VALUES
(4, '4 NORTE PONIENTE', 'Teran', 583, NULL, 29050, 'TUXTLA GUTIERREZ', 'CHIAPAS'),
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_03_18_220518_create_direccions_table', 1),
(4, '2020_03_18_220538_create_antecendes_table', 1),
(5, '2020_03_18_220601_create_controls_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paterno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `materno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `curp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cedula` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `especialidad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_empleado` bigint(20) DEFAULT NULL,
  `user_type` int(11) NOT NULL,
  `sexo` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `paterno`, `materno`, `nacimiento`, `curp`, `cedula`, `especialidad`, `status`, `area`, `no_empleado`, `user_type`, `sexo`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jesus Fco', 'jfcr@live.com', 'Rodriguez', NULL, NULL, NULL, '555asddew555f14', NULL, NULL, NULL, NULL, 3, NULL, '$2y$10$f37n7Pra/vkndDZSqZJppevx2Fl/kuSlIn233jaReFRevVxrihsJO', NULL, NULL, '2020-03-30 01:45:36'),
(4, 'Ana', 'ana@gmail.com', 'Constantino', 'P', '2000-01-01', 'CORJ950923HCSRDS06', '1551', NULL, 'Base', 'Urgencias', 55546, 2, 'Femenino', '$2y$10$wD24U/THpAm4mQgXEtSUCOs2gX9cIfG4VBO8p1bwqBSpJ9.9SLT2a', NULL, '2020-03-25 07:32:10', '2020-03-29 23:19:31'),
(5, 'Carolina', NULL, 'Sanchez', 'Castillo', '1995-01-01', 'CORJ950923HCSRDS06', NULL, NULL, 'Base', 'asdfasdf', 5554566, 1, 'Masculino', '$2y$10$RtBVAG/XNXTkTCiYdFZj5.EbC/0muZJg4ge3j1hB4Mi6E62xP/IIu', NULL, '2020-03-25 22:22:42', '2020-03-26 00:02:10'),
(7, 'Andrea', NULL, 'Mocker', 'Dylan', '1980-01-01', NULL, NULL, NULL, 'Contrato', 'Urgencias', 6545454, 1, 'Femenino', '$2y$10$6OgtBYDzWyBg.nlXLN.il.KpYNEo9SDGamuskSzyCh545RAsZUgOS', NULL, '2020-03-29 23:13:55', '2020-03-29 23:15:45');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
