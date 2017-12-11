-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2017 a las 23:37:07
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lavatronic_itm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(5) NOT NULL,
  `peso_ropa` int(3) NOT NULL,
  `tipo_ropa` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `sexo` enum('masculino','femenino') COLLATE utf8_spanish2_ci NOT NULL,
  `urgencia` enum('baja','media','alta','extrema') COLLATE utf8_spanish2_ci NOT NULL,
  `inicio_compra` datetime NOT NULL,
  `tiempo_aprox` datetime NOT NULL,
  `costo` int(6) NOT NULL,
  `username` varchar(150) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `peso_ropa`, `tipo_ropa`, `sexo`, `urgencia`, `inicio_compra`, `tiempo_aprox`, `costo`, `username`) VALUES
(4, 5, 'trajes, bebe, casual, deportivo', 'masculino', 'baja', '2017-12-12 13:00:00', '2017-12-14 01:30:00', 180, 'kamijuan'),
(5, 30, 'trajes, bebe, casual, deportivo', 'masculino', 'baja', '2017-12-12 13:00:00', '2017-12-14 04:00:00', 350, 'kamijuan'),
(6, 25, 'trajes, bebe', 'femenino', 'extrema', '2017-12-10 13:00:00', '2017-12-12 03:30:00', 400, 'admin000'),
(7, 15, 'trajes, deportivo', 'femenino', 'media', '2017-12-10 20:01:00', '2017-12-11 21:31:00', 190, 'kamijuan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `username` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` enum('admin','user') COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`username`, `correo`, `password`, `tipo`) VALUES
('admin', 'jamonconqueso001@gmail.com', '$2a$12$QqkWexK9W7OB4EGdmSn3Hu.oKw9/U0mtmh09oDl/fnNC14N5TE8s2', 'user'),
('admin000', 'jamonconqueso001@gmail.com', '$2y$12$AGSlY9CvQT7be8qdLyOr2.BKAWrPPUIRniun2oNNdL9/7sXHVP9ly', 'user'),
('admin02', 'juan1910@live.com.mx', '$2y$12$Xw02b0AIePDhQQQGVqCcueiMawXaUajdjJPASKF4kVxjfi/yocR0m', 'admin'),
('carmelo', 'jamonconqueso001@gmail.com', '$2a$16$0ENd.6ftIs9mTzTMogb.veZzk34UfU21g5lZWiTblEByD2AoMH8bu', 'user'),
('carmelo01', 'juan1910@live.com.mx', '$2y$12$6DkB3My2q3sh0b/6P1AeDuOSGEbjGo5WX4//fVTmgPXlt3NFdbNqe', 'user'),
('Juanazo', 'juan1910@live.com.mx', '$2a$12$iKR.HWOz57X1/cAyxXwnfuCQT4emzOagWzoWcv3XcwUFppsIwaROy', 'user'),
('juanazo999', 'jamonconqueso001@gmail.com', '$2y$12$e0EJHYViRwd2Uvsn6tbBGeyWqKAUyFL1L40/ENvfSuyX8KLQUy89W', 'user'),
('Juanazoo', 'jamonconqueso001@gmail.com', '$2a$12$MqkHONztLv5OnB.QoqO7kOwMnF.86g/TWPdyc1z23SnnZZXPXLX8C', 'user'),
('juandedios007', 'juan1910@live.com.mx', '$2y$12$Y1PuJhCGdcv2tWgriXUvCulLcFpPoXTz8TtukEkLgpIQhFqTFm7GS', 'user'),
('juandedios01', 'juan1910@live.com.mx', '$2a$12$qbfiMYBUfCIeM1NbwSHQMO5XfTYNQLPdQhOFlWjbuKxgoFhgXggiy', 'user'),
('JUanelo', 'jamonconqueso001@gmail.com', '$2a$12$Q13ufQa8LsOTuJH.hfAsuujsmS/MiEqQAQmBhT6f22N8uVpImoiWK', 'user'),
('juanelos', 'sanpotato189@gmail.com', '$2y$12$zwWgGPl.VQ.Wgddarx4PQew9vqnwBva/6afvANMkrsBQFIln8GDB2', 'user'),
('Juanito', 'juan1910@live.com.mx', '$2a$12$EyoyraXBXtuTk4R9BUS/huMsWqe77a8n5nKRujoeFQuLN4p7t17M2', 'user'),
('Juanitopp', 'juan1910@live.com.mx', '$2a$12$3EeBoNnSo2/Je6ercYFBQueOlzFho9Um7s5nn1V7P.cI9.3AiLlPq', 'user'),
('Juanitopppp', 'juan1910@live.com.mx', '$2a$12$81bPIfvaQSq4P3uYiNDX6ezPAaxaHYtXu0rT/Cth4AJ4Imzz.91jS', 'user'),
('kamijuan', 'juan1910@live.com.mx', '$2y$12$ikUK4APe8iBDYEXTjmbyAObybTU1JAJJwwR0XKOkCpCc4oqwJK/I.', 'user'),
('kamijuan2', 'juan1910@live.com.mx', '$2y$12$aUHa1c/oLjf47mCIH6qfC.LLDKN902K0LpWxUwe/BVktURbKvdtCC', 'user'),
('okass', 'sanpotato189@gmail.com', '$2y$12$YQvqOMdlp1.XTjvt0Efhoe3gRffY12bhJ6cSyAQVbfs1IBahxt4p.', 'user'),
('superusuario', 'juan1910@live.com.mx', '$2y$12$PMxZrSWBifTyid8EJcJm7O8lHgLNEAG7OJHqtI52jo2fmq4HgnVq.', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`username`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`username`) REFERENCES `usuario` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
