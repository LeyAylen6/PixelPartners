-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2025 at 04:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parcial_2`
--
DROP DATABASE IF EXISTS `parcial_2`;
CREATE DATABASE IF NOT EXISTS `parcial_2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `parcial_2`;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `logo`) VALUES
(1, 'Coca Cola', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpyk_jri6J5Qz0RsTpG_ZOIQDlLeckY7ZU1g&s'),
(2, 'Uber', 'https://cdn-icons-png.flaticon.com/512/732/732135.png'),
(3, 'Pedidos Ya', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRhTYd_OViFVl-ObgNR6ftmQOpynyZx5bbAA&s'),
(4, 'Mercado Libre', 'https://www.expoknews.com/wp-content/uploads/2020/03/1200px-MercadoLibre.svg-1.png'),
(5, 'Henry', 'https://assets.soyhenry.com/LOGO-REDES-01_og.jpg'),
(6, 'Da Vinci', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTrGQKOjqdGra0m0HpKzdF3VSA3Ck0s-wp3Gw&s');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `description`, `image`, `link`, `company_id`) VALUES
(1, 'Sushi Chatbot', 'Proyecto que implementa un chatbot para un restaurante de sushi, utilizando inteligencia artificial de Cohere para responder preguntas frecuentes de manera más interactiva y dinámica', 'https://github.com/LeyAylen6/sushi-chatbot/raw/main/client/src/assets/home.jpeg', 'https://sushi-chatbot.vercel.app/', NULL),
(2, 'Paycash - People', ' Implementa una API RESTful para gestionar un catálogo de personas, permitiendo realizar operaciones CRUD.', 'https://github.com/LeyAylen6/paycash/raw/main/client/assets/paycash-people.jpeg', 'https://paycash-seven.vercel.app/', NULL),
(3, 'PokePage', 'Pokedex en la que puedes revisar todos los pokemons con sus detalles, las distintas pokedex, regiones y peliculas de pokemon', 'https://github.com/Nacho077/Nacho077/raw/main/assets/img/PokePage.png', 'https://nacho077.github.io/', NULL),
(4, 'Henry Videogames', ' En este proyecto puedes ver más de 100 juegos en diferentes páginas, buscar juegos por nombre, ver su descripción, filtrarlos por ubicación, ordenarlos en orden Ascendente, Descendente o por su Rating.', 'https://github.com/LeyAylen6/Videogames/raw/main/assets/landing.gif', 'https://henry-videogames-zeta.vercel.app/', 5),
(5, 'Henry World Web', 'Version web de Henry World en la que los administradores y profesores pueden realizar cambios de una manera comoda y con mayor rapidez.', 'https://ignacio-gimenez.vercel.app/static/media/Henry-World-Web.7f3e6e3cca52bad067ba.png', 'https://henry-app.vercel.app/', 5),
(6, 'Rick & Morty', 'Single Page con temática de Rick and Morty. Permite buscar personajes al azar, por id, agregarlos a favoritos, aplicar filtros, ordenamientos y eliminar personajes buscados.', 'https://github.com/LeyAylen6/Rick-Morty/raw/main/assets/login.gif', 'https://rick-and-morty-one-tan.vercel.app/', 5),
(7, 'TutorIA', 'Aplicación educativa que usa inteligencia artificial para personalizar el aprendizaje, permitiendo a los usuarios avanzar a su propio ritmo con recomendaciones y actividades interactivas.', 'https://github.com/user-attachments/assets/575000b8-6b0a-471c-bba6-9a4067767e79', NULL, 5),
(8, 'Leila\'s Portfolio', 'Aplicación web construida como portfolio profesional. Implementa prácticas de desarrollo moderno como diseño responsive, enrutamiento dinámico y carga optimizada. Organiza información personal y proyectos en una estructura clara, escalable y fácil de mantener.', 'https://media.licdn.com/dms/image/v2/D4D22AQFQFEIikN3OCA/feedshare-shrink_800/feedshare-shrink_800/0/1690499052910?e=1753920000&v=beta&t=422ImdD2zr-a_VlkthZBuBybRCNJgLkSXhmfkG1UrsI', 'https://leila-salguero.vercel.app/', NULL),
(9, 'Ignacio\'s Portfolio', 'Portfolio personal desarrollado para presentar experiencia, habilidades y proyectos. Enfocado en Backend armado para manejo dinámico de proyectos y diseño modular pensado para facilitar mantenimiento y futuras integraciones', 'https://github.com/Nacho077/Nacho077/raw/main/assets/img/Portfolio.png', 'https://ignacio-gimenez.vercel.app/', NULL),
(10, 'Pixel Partners', 'Un sistema completo para gestionar proyectos tecnológicos, sus equipos de desarrollo y las empresas clientes, con una interfaz moderna y funcional.', 'https://github.com/user-attachments/assets/05c73f61-56ac-4964-89af-46795ca8775c', NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `name` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `image` varchar(256) NOT NULL,
  `id` int(11) NOT NULL,
  `rol` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `email`, `image`, `id`, `rol`) VALUES
('Leila Salguero', 'leiisalguero@gmail.com', 'https://avatars.githubusercontent.com/u/75590409?v=4', 1, 'Backend Developer Ssr'),
('Ignacio Gimenez', 'ignaciogimenez70@gmail.com', 'https://ignacio-gimenez.vercel.app/static/media/profile.6c1887699f4fa9a49bb7.png', 2, 'Backend Developer Sr');

-- --------------------------------------------------------

--
-- Table structure for table `user_project`
--

DROP TABLE IF EXISTS `user_project`;
CREATE TABLE `user_project` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_project`
--

INSERT INTO `user_project` (`id`, `user_id`, `project_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 1, 4),
(5, 2, 5),
(6, 1, 6),
(7, 1, 7),
(8, 2, 7),
(9, 1, 8),
(10, 2, 9),
(11, 1, 10),
(12, 2, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_company_id` (`company_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_project`
--
ALTER TABLE `user_project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_project_id` (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_project`
--
ALTER TABLE `user_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `fk_company_id` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `user_project`
--
ALTER TABLE `user_project`
  ADD CONSTRAINT `fk_project_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
