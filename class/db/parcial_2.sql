-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2025 a las 03:10:34
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parcial_2`
--
CREATE DATABASE IF NOT EXISTS `parcial_2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `parcial_2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`id`, `name`, `logo`) VALUES
(1, 'Coca Cola', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fgraffica.info%2Fcual-es-la-historia-del-logo-de-coca-cola%2F&psig=AOvVaw3Pr7xQ2UVKe8g6PNa4S-UN&ust=1748653037928000&source=images&cd=vfe&opi=89978449&ved=0CBEQjRxqFwoTCPikjLX-yY0DFQAAAAAdAAAAABAX'),
(2, 'Uber', 'https://cdn-icons-png.flaticon.com/512/732/732135.png'),
(3, 'Pedidos Ya', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.pedidosya.com.ar%2F&psig=AOvVaw2TmyExSDziCZPvYNVZOREh&ust=1748653126012000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCMDvrNf-yY0DFQAAAAAdAAAAABAE'),
(4, 'Mercado Libre', 'https://www.expoknews.com/wp-content/uploads/2020/03/1200px-MercadoLibre.svg-1.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `developer` varchar(255) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `project`
--

INSERT INTO `project` (`id`, `name`, `developer`, `description`, `image`, `link`) VALUES
(1, 'Rick and Morty App', 'Leila Salguero', 'Single Page con temática de Rick and Morty. Permite buscar personajes al azar, por id, agregarlos a favoritos, aplicar filtros, ordenamientos y eliminar personajes buscados. Las Técnologias que se utilizaron para crear esta página fueron React, Redux, Html, Css, Node Js, Express, Sequelize y PostgreSQL.', 'https://www.youtube.com/watch?v=A5jKQXZmlPg', 'https://rick-and-morty-one-tan.vercel.app/'),
(5, 'Sushi Chat Bot', 'Leila Salguero', 'Sushi Chatbot es un proyecto que implementa un chatbot para un restaurante de sushi, utilizando inteligencia artificial de Cohere para responder preguntas frecuentes de manera más interactiva y dinámica. Los usuarios pueden ver el menú, realizar pedidos y consultar dudas frecuentes. El chatbot es capaz de entender consultas relacionadas con pedidos, ingredientes, disponibilidad, entre otros. Está construido con Node.js, React, MongoDB. Además, el modelo de Cohere se integra para ofrecer respuestas más naturales y precisas a los usuarios.', 'https://www.youtube.com/watch?time_continue=89&v=qpLnSc69CQQ&embeds_referring_euri=https%3A%2F%2Fleila-salguero.vercel.app%2F&source_ve_path=MzY4NDIsMzY4NDIsMzY4NDIsMzY4NDIsMjg2NjY', 'https://sushi-chatbot.vercel.app/'),
(6, 'Poke Page', 'Ignacio Gimenez', 'Pokedex en la que puedes revisar todos los pokemons con sus detalles, las distintas pokedex, regiones y peliculas de pokemon', 'https://ignacio-gimenez.vercel.app/static/media/PokePage.0af939a3709d9ad557d4.png', 'https://nacho077.github.io/');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
