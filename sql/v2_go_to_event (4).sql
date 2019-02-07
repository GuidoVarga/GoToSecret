-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 07-02-2019 a las 15:36:22
-- Versión del servidor: 5.7.19
-- Versión de PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `v2_go_to_event`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `password`, `token`, `role_id`) VALUES
(1, 'guido@guido', '$2y$10$ikDC7djr6nheUIsR36Ch.uJI6cSz0LIOuqxIJE4NonkPGmeGtzFFa', NULL, 1),
(2, 'root@asd', '$2y$10$e/.6pMh2utIVHeDGZChtFu9ET13rXGji/9crHmLaV2oplt8ryCwnK', NULL, 1),
(3, 'q@q', '$2y$10$nJlQJkMrF/5U1aRghumgOuYsdqPw.hZ7lJ2RpeOOsNb38M0Xp2Nvm', NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `artists`
--

INSERT INTO `artists` (`id`, `name`, `description`, `img`) VALUES
(24, 'Los GuaranÃ­es', '28880.jpg', 'a'),
(25, 'Ettap Kyle', 'Artist-48-dcb39f1b459a601a1139dc40b6bc670f.jpg', 'a'),
(26, '', '0AB.jpg', ''),
(27, '', '48B.jpg', ''),
(28, 'dsadas', 'xczxczxczxc', '48B.jpg'),
(29, 'xaxasxas', '0AB.jpg', 'vzvzzxv'),
(30, 'dsaxsaxsa', 'asfsafasfasf', '48B.jpg'),
(31, 'xcxzczxc', 'vzxvzxv', '0AB.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(1, 'Mar del Plata'),
(3, 'TucumÃ¡n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `event_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `img`, `event_category_id`) VALUES
(1, 'Los GuaranÃ­es y Roxana Carabajal', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur condimentum, ex vel pretium vehicula, mauris erat tristique metus, et ultricies sapien mi sit amet lectus. Nulla egestas sollicitudin lectus et porttitor.', 'card2.jpg', 1),
(2, 'Basta Music Festival', 'Basta Music Festival', 'flyer3.jpg', 1),
(10, 'Charlotte de Witte', 'dasdasdasdasd', 'flyer2.jpg', 1),
(18, 'Ettap Kyle ', 'a', 'flyer1.jpg', 1),
(19, 'lollapaloozaaamnnnndd', 'dddddddd', '48B.jpg', 1),
(20, 'acacacacaca', 'dasdaasdasdasd', '48B.jpg', 1),
(21, 'dasdasdasdasdasd', 'dasdasdasdasdsad213', '48B.jpg', 1),
(22, 'dasdsa', 'dsadsad', '0AB.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event_categories`
--

CREATE TABLE `event_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `event_categories`
--

INSERT INTO `event_categories` (`id`, `name`) VALUES
(1, 'MÃºsica'),
(2, 'Entretenimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `locations`
--

INSERT INTO `locations` (`id`, `name`) VALUES
(1, 'Platea'),
(2, 'Campo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `date`, `account_id`) VALUES
(1, '03-02-2019', 1),
(2, '03-02-2019', 1),
(3, '03-02-2019', 1),
(4, '03-02-2019', 1),
(5, '03-02-2019', 1),
(6, '03-02-2019', 1),
(7, '03-02-2019', 1),
(8, '03-02-2019', 1),
(9, '03-02-2019', 1),
(10, '03-02-2019', 1),
(11, '03-02-2019', 1),
(12, '03-02-2019', 1),
(13, '03-02-2019', 1),
(14, '03-02-2019', 1),
(15, '03-02-2019', 1),
(16, '03-02-2019', 1),
(17, '03-02-2019', 1),
(18, '03-02-2019', 1),
(19, '03-02-2019', 1),
(20, '03-02-2019', 1),
(21, '03-02-2019', 1),
(22, '03-02-2019', 1),
(23, '03-02-2019', 1),
(24, '03-02-2019', 1),
(25, '04-02-2019', 1),
(26, '04-02-2019', 1),
(27, '04-02-2019', 1),
(28, '04-02-2019', 1),
(29, '04-02-2019', 1),
(30, '05-02-2019', 1),
(31, '05-02-2019', 1),
(32, '05-02-2019', 1),
(33, '05-02-2019', 1),
(34, '05-02-2019', 1),
(35, '05-02-2019', 1),
(36, '05-02-2019', 1),
(37, '05-02-2019', 1),
(38, '05-02-2019', 1),
(39, '05-02-2019', 1),
(40, '05-02-2019', 1),
(41, '05-02-2019', 1),
(42, '05-02-2019', 1),
(43, '05-02-2019', 1),
(44, '05-02-2019', 1),
(45, '05-02-2019', 1),
(46, '05-02-2019', 1),
(47, '05-02-2019', 1),
(48, '05-02-2019', 1),
(49, '07-02-2019', 1),
(50, '07-02-2019', 1),
(51, '07-02-2019', 1),
(52, '07-02-2019', 1),
(53, '07-02-2019', 1),
(54, '07-02-2019', 1),
(55, '07-02-2019', 1),
(56, '07-02-2019', 1),
(57, '07-02-2019', 1),
(58, '07-02-2019', 1),
(59, '07-02-2019', 1),
(60, '07-02-2019', 1),
(61, '07-02-2019', 1),
(62, '07-02-2019', 1),
(63, '07-02-2019', 1),
(64, '07-02-2019', 1),
(65, '07-02-2019', 1),
(66, '07-02-2019', 1),
(67, '07-02-2019', 1),
(68, '07-02-2019', 1),
(69, '07-02-2019', 1),
(70, '07-02-2019', 1),
(71, '07-02-2019', 1),
(72, '07-02-2019', 1),
(73, '07-02-2019', 1),
(74, '07-02-2019', 1),
(75, '07-02-2019', 1),
(76, '07-02-2019', 1),
(77, '07-02-2019', 1),
(78, '07-02-2019', 1),
(79, '07-02-2019', 1),
(80, '07-02-2019', 1),
(81, '07-02-2019', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_lines`
--

CREATE TABLE `order_lines` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `schedule_x_location_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `ticket_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `order_lines`
--

INSERT INTO `order_lines` (`id`, `quantity`, `price`, `schedule_x_location_id`, `order_id`, `ticket_id`) VALUES
(1, 2, 10, 36, 23, NULL),
(2, 4, 20, 37, 1, NULL),
(3, 2, 10, 36, 24, NULL),
(4, 4, 20, 37, 24, NULL),
(5, 5, 25, 37, 25, NULL),
(6, 5, 25, 37, 26, NULL),
(7, 5, 25, 37, 27, NULL),
(8, 3, 15, 36, 28, NULL),
(9, 3, 15, 36, 29, NULL),
(10, 7, 35, 37, 30, NULL),
(11, 7, 35, 37, 31, NULL),
(12, 7, 35, 37, 32, NULL),
(13, 7, 35, 37, 33, NULL),
(14, 7, 35, 37, 34, NULL),
(15, 7, 35, 37, 35, NULL),
(16, 1, 5, 37, 47, NULL),
(17, 1, 5, 37, 48, NULL),
(18, 1, 1, 43, 49, NULL),
(19, 5, 40, 38, 53, NULL),
(20, 3, 15, 36, 58, 0),
(21, 2, 10, 36, 59, 0),
(22, 4, 20, 36, 60, 1),
(23, 4, 20, 36, 61, 2),
(24, 3, 15, 36, 63, 3),
(25, 1, 5, 36, 64, 4),
(26, 2, 10, 36, 65, 5),
(27, 2, 10, 36, 66, 6),
(28, 1, 5, 36, 67, 7),
(29, 1, 5, 36, 68, 8),
(30, 1, 5, 36, 69, 9),
(31, 1, 5, 36, 70, 10),
(32, 1, 5, 37, 71, 11),
(33, 1, 5, 37, 72, 12),
(34, 5, 25, 36, 73, 13),
(35, 3, 15, 36, 74, 14),
(36, 3, 15, 36, 75, 15),
(37, 1, 5, 36, 76, 16),
(38, 1, 5, 36, 77, 17),
(39, 1, 5, 36, 78, 18),
(40, 1, 5, 36, 79, 19),
(41, 4, 20, 36, 80, 20),
(42, 1, 5, 36, 81, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `places`
--

INSERT INTO `places` (`id`, `name`, `address`, `city_id`) VALUES
(4, 'Crobar', 'Av. Cnel. Marcelino E. Freyre', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `description` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `description`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `day` varchar(50) NOT NULL,
  `event_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `schedules`
--

INSERT INTO `schedules` (`id`, `day`, `event_id`, `place_id`) VALUES
(11, '2018-11-29', 2, 4),
(12, '2019-02-08', 21, 4),
(13, '2019-02-13', 21, 4),
(14, '2019-02-27', 21, 4),
(15, '2019-02-12', 10, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedules_x_locations`
--

CREATE TABLE `schedules_x_locations` (
  `id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `surplus` int(11) UNSIGNED NOT NULL,
  `total_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `schedules_x_locations`
--

INSERT INTO `schedules_x_locations` (`id`, `schedule_id`, `location_id`, `price`, `surplus`, `total_quantity`) VALUES
(36, 11, 1, 5, 30, 5),
(37, 11, 2, 5, 1, 5),
(38, 11, 1, 8, 0, 8),
(39, 12, 1, 111, 32, 111),
(40, 13, 1, 1, 1, 1),
(42, 14, 1, 123, 5325, 123),
(43, 15, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_events`
--

CREATE TABLE `sub_events` (
  `id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `start_hour` varchar(50) NOT NULL,
  `finish_hour` varchar(50) NOT NULL,
  `schedule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sub_events`
--

INSERT INTO `sub_events` (`id`, `artist_id`, `start_hour`, `finish_hour`, `schedule_id`) VALUES
(1, 24, '11', '14', 12),
(2, 24, '2', '3', 13),
(4, 25, '7', '14', 14),
(5, 25, '5', '5', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `account_id`) VALUES
(1, 'guido', 'varga', 1),
(2, 'dsad', 'dsa', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indices de la tabla `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_category_id` (`event_category_id`);

--
-- Indices de la tabla `event_categories`
--
ALTER TABLE `event_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `order_lines`
--
ALTER TABLE `order_lines`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_schedule_event` (`event_id`),
  ADD KEY `fk_schedule_place` (`place_id`);

--
-- Indices de la tabla `schedules_x_locations`
--
ALTER TABLE `schedules_x_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`schedule_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indices de la tabla `sub_events`
--
ALTER TABLE `sub_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calendar_id` (`schedule_id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_account_id` (`account_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `event_categories`
--
ALTER TABLE `event_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `order_lines`
--
ALTER TABLE `order_lines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `schedules_x_locations`
--
ALTER TABLE `schedules_x_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `sub_events`
--
ALTER TABLE `sub_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `fk_accounts_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_event_event_category` FOREIGN KEY (`event_category_id`) REFERENCES `event_categories` (`id`);

--
-- Filtros para la tabla `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `fk_place_city` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `fk_schedule_event` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_schedule_place` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `schedules_x_locations`
--
ALTER TABLE `schedules_x_locations`
  ADD CONSTRAINT `fk_schedule_x_location_schedule` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_schedule_x_locations_locations` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sub_events`
--
ALTER TABLE `sub_events`
  ADD CONSTRAINT `fk_date_artist` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_scnedule_date` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_account_id` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
