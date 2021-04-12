-- Base de datos: eVisitas
CREATE DATABASE IF NOT EXISTS `eVisitas` DEFAULT CHARACTER SET utf8;
USE `eVisitas`;


-- Estructura de tabla para la tabla `usuarios`
CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `activo` int(1) NOT NULL,
  `perfil` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;


-- Volcado de datos para la tabla `usuarios
INSERT INTO `usuarios` (`id_usuarios`, `nombre`, `email`, `password`, `fecha_registro`, `activo`, `perfil`) VALUES
(1, 'Luis Medina Sánchez', 'luismedinasanchez@hotmail.com', '$2y$10$MY3i3oRGCafbGywEG/n07.FEXQONeWuMwRMbmXYyVPEj1ctgDsrZe', '2018-10-31 08:02:25', 1, 0);


-- Estructura de tabla para la tabla `visitas`
CREATE TABLE `visitas` (
  `id_visitas` int(11) NOT NULL,
  `fec_visita` datetime NOT NULL,
  `nom_visitas` varchar(50) NOT NULL,
  `mail_visita` varchar(200) NOT NULL,
  `ide_oficial` varchar(50) DEFAULT NULL,
  `per_visita` varchar(50) DEFAULT NULL,
  `asunto` varchar(255) NOT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `hor_atencion` time DEFAULT NULL,
  `tip_visita` int(1) DEFAULT NULL,
  `num_gafete` int(2) DEFAULT NULL,
  `fot_visita` text,
  `fot_ide_visita` text,
  `hor_salida` datetime DEFAULT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Indices de la tabla usuarios, visitas
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id_visitas`),
  ADD UNIQUE KEY `id_visitas` (`id_visitas`);


-- AUTO_INCREMENT de la tabla usuarios, visitas
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `visitas`
  MODIFY `id_visitas` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;