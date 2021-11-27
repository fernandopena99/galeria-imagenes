-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2021 a las 18:27:50
-- Versión del servidor: 8.0.22
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `csv_db`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `pr_eliminar_imagen` (IN `idE` INT)  SQL SECURITY INVOKER
begin
DELETE FROM IMAGECRUD WHERE ID = idE;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pr_eliminar_tags` (IN `idE` INT)  SQL SECURITY INVOKER
begin
DELETE FROM tags WHERE id= idE;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pr_insertar_imagen` (IN `titulo` VARCHAR(30), IN `descripcion` VARCHAR(60), IN `imagen` VARCHAR(255), IN `orientacionI` TEXT, IN `tagsI` VARCHAR(9999), IN `tamanoI` VARCHAR(255), IN `imagen_completa_menuI` VARCHAR(255), IN `formato_imagenI` VARCHAR(255))  BEGIN
	INSERT INTO IMAGECRUD (TITLE, DESCRIPTION, 
           IMAGE, orientacion, tags, tamano, imagen_completa_menu, formato_imagen) VALUES ( titulo, descripcion,imagen, orientacionI, tagsI, tamanoI, imagen_completa_menuI, formato_imagenI);
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pr_insertar_tags` (IN `descripcionI` VARCHAR(150))  BEGIN
	insert into tags(descripcion)
    
    values (descripcionI );
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pr_listar_tags` (IN `id` INT)  begin
SELECT * FROM imagecrud I
    INNER JOIN imagen_tags R ON id_imagen = R.id_imagen
    INNER JOIN tags T ON R.id_tags = T.id
WHERE R.ID = id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pr_modificar_imagen` (IN `titulo` VARCHAR(30), IN `descripcion` VARCHAR(60), IN `orientacionM` TEXT, IN `tamanoM` VARCHAR(255), IN `tagsM` VARCHAR(9999), IN `imagen_completa_menuM` VARCHAR(255), IN `formato_imagenM` VARCHAR(250), IN `idM` INT)  SQL SECURITY INVOKER
begin
UPDATE IMAGECRUD SET TITLE = titulo, 
              DESCRIPTION= descripcion, orientacion = orientacionM, tamano = tamanoM, tags = tagsM, imagen_completa_menu = imagen_completa_menuM, formato_imagen = formato_imagenM WHERE ID = idM;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pr_modificar_tags` (IN `idM` INT)  SQL SECURITY INVOKER
begin
SELECT * FROM IMAGECRUD WHERE ID = idM ;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pr_mostrar_imagen` ()  SQL SECURITY INVOKER
begin
SELECT * FROM IMAGECRUD;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pr_mostrar_tags` ()  BEGIN
	SELECT * FROM tags;
    
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagecrud`
--

CREATE TABLE `imagecrud` (
  `ID` int NOT NULL,
  `TITLE` varchar(30) NOT NULL,
  `DESCRIPTION` varchar(60) NOT NULL,
  `IMAGE` varchar(255) NOT NULL,
  `orientacion` text NOT NULL,
  `tamano` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tags` varchar(9999) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `imagen_completa_menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `formato_imagen` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `imagecrud`
--

INSERT INTO `imagecrud` (`ID`, `TITLE`, `DESCRIPTION`, `IMAGE`, `orientacion`, `tamano`, `tags`, `imagen_completa_menu`, `formato_imagen`) VALUES
(1, 'Prueba 1', 'Google', '/galleryCrud/imagesRecop/google.jpg', 'Vertical', '1520x720', 'Azul', 'Completa', 'jpg'),
(2, 'Prueba 2', 'whatsapp', '/galleryCrud/imagesRecop/wsp.jpg', 'Horizontal', '1520x720', 'Verde', 'Menu', 'jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagecrud`
--
ALTER TABLE `imagecrud`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagecrud`
--
ALTER TABLE `imagecrud`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
