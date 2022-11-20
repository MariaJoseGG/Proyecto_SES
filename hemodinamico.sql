-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2022 a las 03:31:57
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hemodinamico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrardiagnostico`
--

CREATE TABLE `administrardiagnostico` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paciente` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `tipoPadecimiento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medico` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `administrardiagnostico`
--

INSERT INTO `administrardiagnostico` (`id`, `paciente`, `fecha`, `tipoPadecimiento`, `descripcion`, `medico`, `created_at`, `updated_at`) VALUES
(1, 2, '2022-11-20', 'Resultados de laboratorio', 'Se han obtenido resultados normales de los estudios de laboratorio realizados en la mañana.', 2, '2022-11-20 07:24:44', '2022-11-20 07:24:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antecedentes`
--

CREATE TABLE `antecedentes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `antecedente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paciente` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `antecedentes`
--

INSERT INTO `antecedentes` (`id`, `antecedente`, `paciente`, `created_at`, `updated_at`) VALUES
(1, 'Cirugía de hernia femoral realizada hace 2 años.', 1, '2022-11-20 06:53:13', '2022-11-20 06:53:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `es_usuario` bigint(20) UNSIGNED DEFAULT NULL,
  `documento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `especialidad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`id`, `es_usuario`, `documento`, `nombre`, `especialidad`, `created_at`, `updated_at`) VALUES
(1, NULL, '19083829', 'Roberto Musso', 'Cirujano', '2022-11-20 06:31:53', '2022-11-20 06:31:53'),
(2, 2, NULL, NULL, NULL, '2022-11-20 06:35:33', '2022-11-20 06:35:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen`
--

CREATE TABLE `examen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipoExamen` bigint(20) UNSIGNED NOT NULL,
  `paciente` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `doctor` bigint(20) UNSIGNED NOT NULL,
  `jefe` bigint(20) UNSIGNED NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `examen`
--

INSERT INTO `examen` (`id`, `tipoExamen`, `paciente`, `fecha`, `hora`, `doctor`, `jefe`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-12-08', '09:20:00', 2, 4, 0, '2022-11-20 07:19:06', '2022-11-20 07:19:06'),
(2, 2, 1, '2022-11-22', '15:30:00', 1, 4, 1, '2022-11-20 07:19:50', '2022-11-20 07:20:04'),
(3, 3, 2, '2022-11-20', '11:25:00', 1, 4, 1, '2022-11-20 07:26:56', '2022-11-20 07:27:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fluids`
--

CREATE TABLE `fluids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fluids`
--

INSERT INTO `fluids` (`id`, `hour`, `input`, `created_at`, `updated_at`) VALUES
(1, '07', 6000.00, '2022-11-20 06:12:27', '2022-11-20 06:12:38'),
(2, '08', 1000.00, '2022-11-20 06:12:27', '2022-11-20 06:12:43'),
(3, '09', 0.00, '2022-11-20 06:12:27', '2022-11-20 06:12:47'),
(4, '10', NULL, '2022-11-20 06:12:27', '2022-11-20 06:12:27'),
(5, '11', NULL, '2022-11-20 06:12:27', '2022-11-20 06:12:27'),
(6, '12', NULL, '2022-11-20 06:12:27', '2022-11-20 06:12:27'),
(7, '13', NULL, '2022-11-20 06:12:27', '2022-11-20 06:12:27'),
(8, '14', NULL, '2022-11-20 06:12:27', '2022-11-20 06:12:27'),
(9, '15', NULL, '2022-11-20 06:12:27', '2022-11-20 06:12:27'),
(10, '16', NULL, '2022-11-20 06:12:27', '2022-11-20 06:12:27'),
(11, '17', NULL, '2022-11-20 06:12:27', '2022-11-20 06:12:27'),
(12, '18', NULL, '2022-11-20 06:12:27', '2022-11-20 06:12:27'),
(13, '19', NULL, '2022-11-20 06:12:27', '2022-11-20 06:12:27'),
(14, '20', NULL, '2022-11-20 06:12:27', '2022-11-20 06:12:27'),
(15, '21', NULL, '2022-11-20 06:12:27', '2022-11-20 06:12:27'),
(16, '22', NULL, '2022-11-20 06:12:27', '2022-11-20 06:12:27'),
(17, '23', NULL, '2022-11-20 06:12:27', '2022-11-20 06:12:27'),
(18, '24', NULL, '2022-11-20 06:12:27', '2022-11-20 06:12:27'),
(19, '00', NULL, '2022-11-20 06:12:27', '2022-11-20 06:12:27'),
(20, '01', NULL, '2022-11-20 06:12:27', '2022-11-20 06:12:27'),
(21, '02', NULL, '2022-11-20 06:12:27', '2022-11-20 06:12:27'),
(22, '03', NULL, '2022-11-20 06:12:27', '2022-11-20 06:12:27'),
(23, '04', NULL, '2022-11-20 06:12:27', '2022-11-20 06:12:27'),
(24, '05', NULL, '2022-11-20 06:12:28', '2022-11-20 06:12:28'),
(25, '06', NULL, '2022-11-20 06:12:28', '2022-11-20 06:12:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hours`
--

CREATE TABLE `hours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `hours`
--

INSERT INTO `hours` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '00:00', '2022-11-20 06:12:30', '2022-11-20 06:12:30'),
(2, '01:00', '2022-11-20 06:12:30', '2022-11-20 06:12:30'),
(3, '02:00', '2022-11-20 06:12:30', '2022-11-20 06:12:30'),
(4, '03:00', '2022-11-20 06:12:30', '2022-11-20 06:12:30'),
(5, '04:00', '2022-11-20 06:12:30', '2022-11-20 06:12:30'),
(6, '05:00', '2022-11-20 06:12:30', '2022-11-20 06:12:30'),
(7, '06:00', '2022-11-20 06:12:30', '2022-11-20 06:12:30'),
(8, '07:00', '2022-11-20 06:12:31', '2022-11-20 06:12:31'),
(9, '08:00', '2022-11-20 06:12:31', '2022-11-20 06:12:31'),
(10, '09:00', '2022-11-20 06:12:31', '2022-11-20 06:12:31'),
(11, '10:00', '2022-11-20 06:12:31', '2022-11-20 06:12:31'),
(12, '11:00', '2022-11-20 06:12:31', '2022-11-20 06:12:31'),
(13, '12:00', '2022-11-20 06:12:31', '2022-11-20 06:12:31'),
(14, '13:00', '2022-11-20 06:12:31', '2022-11-20 06:12:31'),
(15, '14:00', '2022-11-20 06:12:31', '2022-11-20 06:12:31'),
(16, '15:00', '2022-11-20 06:12:31', '2022-11-20 06:12:31'),
(17, '16:00', '2022-11-20 06:12:31', '2022-11-20 06:12:31'),
(18, '17:00', '2022-11-20 06:12:31', '2022-11-20 06:12:31'),
(19, '18:00', '2022-11-20 06:12:31', '2022-11-20 06:12:31'),
(20, '19:00', '2022-11-20 06:12:31', '2022-11-20 06:12:31'),
(21, '20:00', '2022-11-20 06:12:31', '2022-11-20 06:12:31'),
(22, '21:00', '2022-11-20 06:12:31', '2022-11-20 06:12:31'),
(23, '22:00', '2022-11-20 06:12:31', '2022-11-20 06:12:31'),
(24, '23:00', '2022-11-20 06:12:31', '2022-11-20 06:12:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_16_000409_create_fluids_table', 1),
(6, '2022_06_16_002229_create_hours_table', 1),
(7, '2022_06_20_171716_pacientes', 1),
(8, '2022_10_09_033348_signos_vitales', 1),
(9, '2022_11_14_193852_turno', 1),
(10, '2022_11_14_203418_tipo_examen', 1),
(11, '2022_11_14_203912_doctor', 1),
(12, '2022_11_14_211801_examen', 1),
(13, '2022_11_18_022350_administrar_diagnostico', 1),
(14, '2022_11_18_223657_create_antecedentes_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `documento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipoDoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `regimen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipoAfiliacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaIngreso` date NOT NULL,
  `auxiliarId` bigint(20) UNSIGNED NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `documento`, `tipoDoc`, `nombre`, `entidad`, `sexo`, `edad`, `regimen`, `tipoAfiliacion`, `cama`, `fechaIngreso`, `auxiliarId`, `estado`, `created_at`, `updated_at`) VALUES
(1, '234567844', 'Cédula de ciudadanía', 'Eduardo Ocampo Toro', 'Salud Total', 'Masculino', 48, 'Contributivo', 'Cotizante', '4', '2022-11-18', 3, 'Activo', '2022-11-20 06:42:38', '2022-11-20 06:42:38'),
(2, '1093736873', 'Tarjeta de identidad', 'Luisa Fernanda Pérez', 'Sanitas', 'Femenino', 17, 'Subsidiado', 'Adicional', '2', '2022-11-19', 3, 'Activo', '2022-11-20 06:43:32', '2022-11-20 06:43:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `signos_vitales`
--

CREATE TABLE `signos_vitales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paciente` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `temperatura` double(8,2) NOT NULL,
  `pulso` double(8,2) NOT NULL,
  `respiracion` double(8,2) NOT NULL,
  `presionarterial` double(8,2) NOT NULL,
  `presionarterial2` double(8,2) NOT NULL,
  `pam` double(8,2) NOT NULL,
  `sat` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `signos_vitales`
--

INSERT INTO `signos_vitales` (`id`, `paciente`, `fecha`, `hora`, `temperatura`, `pulso`, `respiracion`, `presionarterial`, `presionarterial2`, `pam`, `sat`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-11-19', '21:00:00', 36.00, 33.00, 25.00, 120.00, 80.00, 57.00, 96.00, '2022-11-20 06:47:49', '2022-11-20 06:47:49'),
(2, 1, '2022-11-19', '20:00:00', 37.00, 44.00, 23.00, 105.00, 60.00, 80.00, 99.00, '2022-11-20 06:50:04', '2022-11-20 06:50:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_examen`
--

CREATE TABLE `tipo_examen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_examen`
--

INSERT INTO `tipo_examen` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Electrocardiograma', 'Un electrocardiograma (ECG) es un procedimiento simple e indoloro que mide la actividad eléctrica del corazón', '2022-11-20 06:28:44', '2022-11-20 06:28:44'),
(2, 'Rayos X', 'Los rayos X son una forma de radiación electromagnética, similar a la luz visible', '2022-11-20 06:28:58', '2022-11-20 06:29:11'),
(3, 'Creatinina en suero', 'Es un análisis de sangre que mide qué tan bien funcionan los riñones del paciente', '2022-11-20 07:26:16', '2022-11-20 07:26:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fechaIngreso` date NOT NULL,
  `horaInicio` bigint(20) UNSIGNED NOT NULL,
  `fechaSalida` date NOT NULL,
  `horaFin` bigint(20) UNSIGNED NOT NULL,
  `auxiliarId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id`, `fechaIngreso`, `horaInicio`, `fechaSalida`, `horaFin`, `auxiliarId`, `created_at`, `updated_at`) VALUES
(1, '2022-11-18', 7, '2022-11-18', 19, 3, '2022-11-20 06:44:53', '2022-11-20 06:44:53'),
(2, '2022-11-19', 19, '2022-11-20', 7, 3, '2022-11-20 06:45:16', '2022-11-20 06:45:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identificacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaNac` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `identificacion`, `fechaNac`, `sexo`, `email`, `email_verified_at`, `password`, `tipo_usuario`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', '9827819', '1979-09-09', 'Femenino', 'admin@gmail.com', NULL, '$2y$10$Rt2Xw0veNd1ouyeZuQL0HecYRPOKm7ogWFzEYia5lQ7MVNpZdHGM2', '1', NULL, '2022-11-20 06:25:18', '2022-11-20 06:25:18'),
(2, 'Edgar Allan Poe', '6983948', '1989-01-19', 'Masculino', 'edgar@gmail.com', NULL, '$2y$10$1JZTnlKiM6TqmvTejaLrwOAYIeVkwpWSLWuRaEddLW7DAUZRymU8S', '3', NULL, '2022-11-20 06:33:12', '2022-11-20 06:35:14'),
(3, 'Mariana Gómez López', '8274637', '1980-09-08', 'Femenino', 'mariana@gmail.com', NULL, '$2y$10$lrqPEbZCvPIEEvqhUyPJeuyaZANL/rV1dk0Fo39C0/80.Sed6vD5u', '0', NULL, '2022-11-20 06:39:29', '2022-11-20 06:39:29'),
(4, 'Natalia García Ramírez', '30827618', '1978-04-01', 'Femenino', 'natalia@gmail.com', NULL, '$2y$10$kEWVyDbUPYPUG7axbRS6ROA2w7ufHTJXgGLgDSG.iQtziigquZ6rG', '2', NULL, '2022-11-20 06:56:45', '2022-11-20 06:56:45');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrardiagnostico`
--
ALTER TABLE `administrardiagnostico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `administrardiagnostico_paciente_foreign` (`paciente`),
  ADD KEY `administrardiagnostico_medico_foreign` (`medico`);

--
-- Indices de la tabla `antecedentes`
--
ALTER TABLE `antecedentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `antecedentes_paciente_foreign` (`paciente`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_es_usuario_foreign` (`es_usuario`);

--
-- Indices de la tabla `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examen_tipoexamen_foreign` (`tipoExamen`),
  ADD KEY `examen_paciente_foreign` (`paciente`),
  ADD KEY `examen_doctor_foreign` (`doctor`),
  ADD KEY `examen_jefe_foreign` (`jefe`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `fluids`
--
ALTER TABLE `fluids`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hours`
--
ALTER TABLE `hours`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pacientes_documento_unique` (`documento`),
  ADD KEY `pacientes_auxiliarid_foreign` (`auxiliarId`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `signos_vitales`
--
ALTER TABLE `signos_vitales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `signos_vitales_paciente_foreign` (`paciente`);

--
-- Indices de la tabla `tipo_examen`
--
ALTER TABLE `tipo_examen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turnos_auxiliarid_foreign` (`auxiliarId`),
  ADD KEY `turnos_horainicio_foreign` (`horaInicio`),
  ADD KEY `turnos_horafin_foreign` (`horaFin`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrardiagnostico`
--
ALTER TABLE `administrardiagnostico`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `antecedentes`
--
ALTER TABLE `antecedentes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `examen`
--
ALTER TABLE `examen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fluids`
--
ALTER TABLE `fluids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `hours`
--
ALTER TABLE `hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `signos_vitales`
--
ALTER TABLE `signos_vitales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_examen`
--
ALTER TABLE `tipo_examen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrardiagnostico`
--
ALTER TABLE `administrardiagnostico`
  ADD CONSTRAINT `administrardiagnostico_medico_foreign` FOREIGN KEY (`medico`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `administrardiagnostico_paciente_foreign` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `antecedentes`
--
ALTER TABLE `antecedentes`
  ADD CONSTRAINT `antecedentes_paciente_foreign` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_es_usuario_foreign` FOREIGN KEY (`es_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `examen_doctor_foreign` FOREIGN KEY (`doctor`) REFERENCES `doctor` (`id`),
  ADD CONSTRAINT `examen_jefe_foreign` FOREIGN KEY (`jefe`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `examen_paciente_foreign` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id`),
  ADD CONSTRAINT `examen_tipoexamen_foreign` FOREIGN KEY (`tipoExamen`) REFERENCES `tipo_examen` (`id`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_auxiliarid_foreign` FOREIGN KEY (`auxiliarId`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `signos_vitales`
--
ALTER TABLE `signos_vitales`
  ADD CONSTRAINT `signos_vitales_paciente_foreign` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD CONSTRAINT `turnos_auxiliarid_foreign` FOREIGN KEY (`auxiliarId`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `turnos_horafin_foreign` FOREIGN KEY (`horaFin`) REFERENCES `hours` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `turnos_horainicio_foreign` FOREIGN KEY (`horaInicio`) REFERENCES `hours` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
