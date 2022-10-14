-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-10-2022 a las 17:10:18
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
(1, '07', 12.00, '2022-10-10 20:02:46', '2022-10-10 20:03:22'),
(2, '08', 4.00, '2022-10-10 20:02:46', '2022-10-10 20:03:31'),
(3, '09', 10.00, '2022-10-10 20:02:46', '2022-10-10 20:09:12'),
(4, '10', NULL, '2022-10-10 20:02:46', '2022-10-10 20:02:46'),
(5, '11', NULL, '2022-10-10 20:02:46', '2022-10-10 20:02:46'),
(6, '12', NULL, '2022-10-10 20:02:46', '2022-10-10 20:02:46'),
(7, '13', NULL, '2022-10-10 20:02:46', '2022-10-10 20:02:46'),
(8, '14', NULL, '2022-10-10 20:02:46', '2022-10-10 20:02:46'),
(9, '15', NULL, '2022-10-10 20:02:46', '2022-10-10 20:02:46'),
(10, '16', NULL, '2022-10-10 20:02:46', '2022-10-10 20:02:46'),
(11, '17', NULL, '2022-10-10 20:02:46', '2022-10-10 20:02:46'),
(12, '18', NULL, '2022-10-10 20:02:46', '2022-10-10 20:02:46'),
(13, '19', NULL, '2022-10-10 20:02:46', '2022-10-10 20:02:46'),
(14, '20', NULL, '2022-10-10 20:02:46', '2022-10-10 20:02:46'),
(15, '21', NULL, '2022-10-10 20:02:47', '2022-10-10 20:02:47'),
(16, '22', NULL, '2022-10-10 20:02:47', '2022-10-10 20:02:47'),
(17, '23', NULL, '2022-10-10 20:02:47', '2022-10-10 20:02:47'),
(18, '24', NULL, '2022-10-10 20:02:47', '2022-10-10 20:02:47'),
(19, '00', NULL, '2022-10-10 20:02:47', '2022-10-10 20:02:47'),
(20, '01', NULL, '2022-10-10 20:02:47', '2022-10-10 20:02:47'),
(21, '02', NULL, '2022-10-10 20:02:47', '2022-10-10 20:02:47'),
(22, '03', NULL, '2022-10-10 20:02:47', '2022-10-10 20:02:47'),
(23, '04', NULL, '2022-10-10 20:02:47', '2022-10-10 20:02:47'),
(24, '05', NULL, '2022-10-10 20:02:47', '2022-10-10 20:02:47'),
(25, '06', NULL, '2022-10-10 20:02:47', '2022-10-10 20:02:47');

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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2022_06_16_000409_create_fluids_table', 1),
(14, '2022_06_16_002229_create_hours_table', 1),
(15, '2022_06_20_171716_pacientes', 1),
(16, '2022_10_09_033348_signos_vitales', 1);

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
(1, '107623965', 'Tarjeta de identidad', 'Mariana Gómez López', 'Salud Total', 'Femenino', 13, 'Vinculado', 'Beneficiario', '9', '2022-10-10', 2, 'Activo', '2022-10-10 19:46:17', '2022-10-10 19:46:17'),
(2, '309187328', 'Pasaporte', 'Roberto Musso', 'Sanitas', 'Masculino', 66, 'Particular', 'Cotizante', '14', '2022-10-09', 3, 'Activo', '2022-10-10 19:49:16', '2022-10-10 19:49:16'),
(3, '2345678', 'Cédula de ciudadanía', 'Álvaro Tavella', 'Nueva EPS', 'Masculino', 44, 'Contributivo', 'Cotizante', '4', '2022-10-03', 3, 'Inactivo', '2022-10-10 19:50:04', '2022-10-10 19:50:12');

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
(1, 2, '2022-10-11', '09:00:00', 37.10, 51.00, 36.00, 120.00, 87.00, 98.00, 97.00, '2022-10-10 19:58:24', '2022-10-10 19:58:57'),
(2, 1, '2022-10-11', '10:00:00', 36.30, 49.00, 39.00, 120.00, 80.00, 93.00, 99.00, '2022-10-10 20:00:08', '2022-10-10 20:00:08'),
(3, 1, '2022-10-11', '12:00:00', 37.00, 55.00, 45.00, 120.00, 87.00, 98.00, 96.00, '2022-10-10 20:06:05', '2022-10-10 20:06:05');

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
(1, 'Administrador', '123', '1984-10-10', 'Femenino', 'admin@gmail.com', NULL, '$2y$10$wj4QGODeC5JENrv3eXgNfuB7sX0QBYctdt99eDwXx7L/BGzh.DeqG', '1', NULL, '2022-10-10 19:43:27', '2022-10-10 19:43:27'),
(2, 'Ernesto Pérez', '30765124', '1990-09-09', 'Masculino', 'ep@gmail.com', NULL, '$2y$10$1pYRZhMClciANt8xVb1h5uTqPfxhucNECqa./T0BnbeqBt79j7f76', '0', NULL, '2022-10-10 19:45:00', '2022-10-10 19:45:00'),
(3, 'Isabel Hernández', '1008746752', '1980-09-12', 'Femenino', 'is@gmail.com', NULL, '$2y$10$OQeWDmKbpCc0zMwVNH303es/on2sCGMCJUs2Nbpxb3xdce0Ae9VNq', '0', NULL, '2022-10-10 19:48:25', '2022-10-10 19:48:25');

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `signos_vitales`
--
ALTER TABLE `signos_vitales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
