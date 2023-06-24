-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2023 a las 05:04:20
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inmobiliaria`
--
CREATE DATABASE IF NOT EXISTS `inmobiliaria` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `inmobiliaria`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casas`
--

CREATE TABLE `casas` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `id_detalles` int(11) NOT NULL,
  `id_imagenes` int(11) NOT NULL,
  `anunciante` varchar(50) NOT NULL,
  `img_principal` varchar(1000) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `precio` int(11) NOT NULL,
  `fecha_alta` date NOT NULL DEFAULT current_timestamp(),
  `fecha_venta` date NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `casas`
--

INSERT INTO `casas` (`id`, `categoria`, `id_detalles`, `id_imagenes`, `anunciante`, `img_principal`, `titulo`, `ubicacion`, `direccion`, `precio`, `fecha_alta`, `fecha_venta`, `estado`) VALUES
(37, 'Terrenos y lotes', 31, 31, 'Dueño directo', '1687563127_01dfb728.webp', 'Lote barrio docentes', 'Tandil, Buenos Aires', 'Los Pensamientos 2100', 17000, '2023-06-23', '0000-00-00', 0),
(38, 'Terrenos y lotes', 32, 32, 'Inmobiliaria', '1687564065_25bac7c5.webp', 'Gran complejo deportivo', 'Moreno, Buenos Aires', 'Entre Ríos 2600', 1180000, '2023-06-23', '0000-00-00', 0),
(39, 'Casa', 33, 33, 'Dueño directo', '1687565438_df0e3b00.webp', 'Venta casa reciclada', 'Parque Chas, Capital Federal', 'Cádiz 4100, Parque Chas', 419000, '2023-06-23', '0000-00-00', 0),
(40, 'Casa', 34, 34, 'Inmobiliaria', '1687566545_9b7def05.webp', 'Casa hogareña', 'Escobar, Buenos Aires', 'Venecia 500', 107000, '2023-06-23', '0000-00-00', 0),
(41, 'PH', 35, 35, 'Inmobiliaria', '1687567194_f8181074.webp', 'PH reciclado con terraza', 'Villa Crespo, Capital Federal', 'Juan Ramírez de Velasco 1000', 169000, '2023-06-23', '0000-00-00', 0),
(42, 'Oficina', 36, 36, 'Inmobiliaria', '1687567844_fe3bf4da.webp', 'Venta oficina tribunales', 'Córdoba Capital, Córdoba', 'Avenida Duarte Quirós 300', 147000, '2023-06-23', '0000-00-00', 0),
(43, 'Quinta', 37, 37, 'Dueño directo', '1687568589_84c5ac68.webp', 'Casa Jauregui', 'Lujan, Buenos Aires', 'Doctor Luis Pasteur 1300', 230000, '2023-06-23', '0000-00-00', 0),
(44, 'Quinta', 38, 38, 'Inmobiliaria', '1687569177_84d2070d.webp', 'Estancia las lillas', 'Lujan, Buenos Aires', '1 0, San Eladio', 350000, '2023-06-23', '0000-00-00', 0),
(45, 'Quinta', 39, 39, 'Inmobiliaria', '1687569956_1f9902cc.webp', 'Casa quinta con galpón', 'La Plata, Buenos Aires', 'Calle 208 E/ 472 y 483 400', 300000, '2023-06-23', '0000-00-00', 0),
(46, 'Galpón', 40, 40, 'Inmobiliaria', '1687570462_14641404.webp', 'Galpón en Tandil', 'Tandil, Buenos Aires', 'Bariffi 400', 180000, '2023-06-23', '0000-00-00', 0),
(47, 'Galpón', 41, 41, 'Dueño directo', '1687571054_cdf5b18b.webp', 'Bodega única', 'Alto Verde, San Martin, Mendoza', 'Acceso a Alto Verde 0', 395000, '2023-06-23', '0000-00-00', 0),
(48, 'Departamento', 42, 42, 'Dueño directo', '1687573236_68f49e89.webp', 'Depto 4 ambientes', 'Belgrano, Capital Federal', 'Moldes 2600', 219000, '2023-06-23', '0000-00-00', 0),
(49, 'Chacra', 43, 43, 'Dueño directo', '1687574400_3a241a4d.webp', 'Casa de campo', 'Santa Ana, Corrientes', 'Calle Desconocida S/N', 200000, '2023-06-23', '0000-00-00', 0),
(50, 'Local', 44, 44, 'Dueño directo', '1687575334_4af74cbc.webp ', 'Local comercial', 'Barracas, Capital Federal', 'Avenida Suárez 1900', 250000, '2023-06-23', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Casa'),
(2, 'Chacra'),
(3, 'Cochera'),
(4, 'Departamento'),
(5, 'Galpón'),
(6, 'Local'),
(7, 'Oficina'),
(8, 'PH'),
(9, 'Quinta'),
(10, 'Terrenos y lotes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(11) NOT NULL,
  `id_casa_consulta` int(11) NOT NULL,
  `nombre_cliente` varchar(100) NOT NULL,
  `email_cliente` varchar(255) NOT NULL,
  `tel_cliente` varchar(45) NOT NULL,
  `mensaje_cliente` text NOT NULL,
  `fecha_de_recibo` date NOT NULL DEFAULT current_timestamp(),
  `estado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `id_casa_consulta`, `nombre_cliente`, `email_cliente`, `tel_cliente`, `mensaje_cliente`, `fecha_de_recibo`, `estado`) VALUES
(12, 18, 'Franco Orellana', 'forellana813@alumnos.frh.utn.edu.ar', '1141873847', '¡Hola! Quiero que se comuniquen conmigo por esta propiedad en venta que vi en el sitio.', '2023-06-22', 1),
(13, 18, 'Alejandro Martinez', 'AleMartinez@gmail.com', '1171073147', '¡Hola! Quiero que se comuniquen conmigo por esta propiedad en venta que vi en el sitio.', '2023-06-22', 0),
(14, 18, 'martin luque', 'mluque@gmail.com', '1141451201', '¡Hola! Quiero que se comuniquen conmigo por esta propiedad en venta que vi en el sitio.', '2023-06-22', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles`
--

CREATE TABLE `detalles` (
  `id_detalles` int(11) NOT NULL,
  `titulo_completo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `mapa` varchar(1000) NOT NULL,
  `cant_m2` varchar(30) NOT NULL,
  `cant_m2_cubierto` varchar(30) NOT NULL,
  `cant_ambientes` int(11) NOT NULL,
  `cant_banios` int(11) NOT NULL,
  `cant_dormitorios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `detalles`
--

INSERT INTO `detalles` (`id_detalles`, `titulo_completo`, `descripcion`, `mapa`, `cant_m2`, `cant_m2_cubierto`, `cant_ambientes`, `cant_banios`, `cant_dormitorios`) VALUES
(31, 'VENTA LOTE BARRIO DOCENTES TANDIL', 'VENTA LOTE BARRIO DOCENTES TANDIL\r\nEl Equipo Remax Sierras Vende Lote ubicado en el Barrio Docentes, de la ciudad de Tandil. El mismo se encuentra en calle Los Pensamientos al 2150, entre calles Azucena y Alvarado.\r\nPosee una superficie total de 468,55 m2, con medidas de 16,15 metros de frente por 29,01 metros de fondo.\r\n\r\nLa zona se encuentra en constante expansión con modernas casas.\r\n\r\nUsos: vivienda unifamiliar.\r\n\r\nConsultános y Mudate a la Vida que Querés!!', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3173.326524489418!2d-59.18600432424668!3d-37.31109247210577!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x959121edde4d014b%3A0x9d3ecd8ffe9eb5ba!2sLos%20Pensamientos%202100%2C%20Tandil%2C%20Provincia%20de%20Buenos%20Aires!5e0!3m2!1ses-419!2sar!4v1687563098859!5m2!1ses-419!2sar', '468.55', '0', 0, 0, 0),
(32, 'VENTA COMPLEJO DEPORTIVO MORENO ZONIFICACION', 'Predio 6700 metros 2 en la calle Entre Ríos 2602 en Moreno, zona oeste, a una cuadra de Gaona.\r\n\r\nFunciona como complejo deportivo con canchas de futbol, paddle y gimnasio.\r\n\r\nZonificación residencial:\r\nFOS 0.6\r\nFOT 1\r\n\r\nContiene:\r\n7 canchas de fútbol 5\r\n1 cancha de fútbol 9\r\n1 cancha de paddle (blindex)\r\nConfitería\r\n2 tinglados centrales\r\nIluminación\r\nCésped sintético forbex\r\nParrillas\r\n\r\nCerco perimetral con muro hormigón\r\n4 baños\r\nvestuarios con duchas femenino y masculino.\r\n\r\nGimnasio en el primer piso\r\nLos vestuarios del gimnasio son independientes.\r\nEstacionamiento privado\r\nAberturas corredizas en el buffet\r\n\r\nIdeal para complejo deportivo/ gimnasio o inversor.\r\n\r\nAcepta permuta de interés en parte de pago.\r\n\r\nUbicado a 3 cuadras de Ruta 23.\r\nA 7 cuadras del Shopping Nine.\r\nA metros de Gaona Acceso Oeste.\r\nA metros del centro de Moreno.\r\n\r\n\r\nTodas las medidas publicadas son aproximadas.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3282.689578888608!2d-58.78087572437059!3d-34.63728407294225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bc95b3c2f46f79%3A0xd3e83441b6972072!2sMUV%2C%20Entre%20R%C3%ADos%202600%2C%20B1744%20Moreno%2C%20Provincia%20de%20Buenos%20Aires!5e0!3m2!1ses-419!2sar!4v1687563991335!5m2!1ses-419!2sar', '6700', '5500', 11, 4, 0),
(33, 'Casa 5 Ambientes Venta Parque Chas Reciclada', 'Casa 5 Ambientes Venta Parque Chas Reciclada\r\nCASA EN VENTA 5 AMBIENTES EN PARQUE CHAS RECICLADA A NUEVO CON JARDÍN Y TERRAZA.\r\n\r\nLindísima casa en Parque Chas, completamente reciclada interiormente por un arquitecto, muy moderna. Desarrollada en 2 plantas.\r\n\r\nAl ingresar, nos encontramos con un living-comedor y un gran family, seguido de una cocina integrada rodeada de ventanales con mucho sol. Luego nos encontramos con dos dormitorios, uno de muy buen tamaño y el segundo un poco más pequeño que puede también ser utilizado como escritorio. En esta misma planta se encuentra un pintoresco jardín con lavadero incluido junto a un garage techado de hasta dos autos.\r\n\r\nEn la planta superior se encuentra una master suite con baño doble y amplio vestidor. Además, cuenta con terraza con posibilidad a extender un ambiente más o de construcción de una pequeña pileta / jacuzzi.\r\n\r\nDetalles de categoría y muy buena calidad constructiva. Sistema de calefacción por radiadores.\r\n\r\nRefaccionada hace 8 años.\r\n\r\nParque Chas es un barrio residencial de casas bajas de la Ciudad de Buenos Aires. Cuenta con muy buena conectividad entre diferentes barrios de la Capital. La principal característica y rasgo de identidad del barrio es la existencia, en su centro histórico, de una serie de calles circulares con nombres de ciudades europeas que le dieron fama de ser un verdadero laberinto. Similar a un barro privado pero dentro de la Ciudad.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.9237654580897!2d-58.48168642437316!3d-34.5807954729626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb66c225256a1%3A0xb423b76cb2700b9!2sC%C3%A1diz%204100%2C%20C1431DMH%20CABA!5e0!3m2!1ses-419!2sar!4v1687565228698!5m2!1ses-419!2sar', '165.3', '145.3', 5, 2, 3),
(34, 'VENTA CASA 3 AMBIENTES BARRIO COPROVI ESCOBAR', 'CASA DESARROLLADA EN UNA PLANTA DISTRIBUIDA EN :\r\n\r\n2 DORMITORIOS CON PLACARES EMPOTRADOS, PISOS DE MADERA\r\n1 BAÑO COMPLETO CON HIDROMASAJE CON ACCESORIOS NUEVOS\r\nLIVING COMEDOR,\r\nCOCINA CON MESADA, BAJO MESADA Y ALACENA\r\nLAVADERO CUBIERTO\r\nCUARTO DE HERRAMIENTAS\r\nBAULERA DE 10M2\r\nSISTEMA DE RECUPERACIÓN DE AGUA DE LLUVIA\r\nTANQUE DE 1000 LITROS CON BOMBA PRESURISADA\r\nFRENTE DE REJAS CON PORTÓN APERTURA Y CIERRE PREPARADO PARA PONERLO AUTOMATICO\r\nAIRE ACONDICIONADO FRIO CALOR\r\nESTUFA A GAS EN COCINA\r\nALARMA BARRIAL\r\nSEGURO DE MAFRE\r\nPOSIBILIDADES DE AMPLIACION\r\nAGUA DE RED\r\nLUZ\r\nCLAOCAS\r\nGAS\r\nREFACCIONES RECIENTES\r\nPINTADA A NUEVO INTERIOR / EXTERIOR CON TARQUINI\r\nSOCALOS NUEVOS\r\nINSTALACION DE GAS COMPLETA A NUEVO HACE 4 MESES\r\nSUELOS DE PARRILLA Y PARTE DE ZONA DEL JARDIN A NUEVO\r\nPLANOS AL DIA\r\n\r\nLA PROPIEDAD SE ENCUENTRA EN EXCELENTES CONDICIONES\r\n\r\nCERCANÍA\r\n\r\nPOLO ESTUDIANTIL UNIVERSITARIO X ISLANDIA\r\nPOLO GASTRONOMICO\r\nA 4.8KM PUERTO DE ESCOBAR\r\nA 400M DE RUTA 25\r\nA 2.2KM DE RUTA 9', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3294.2242123810834!2d-58.78295202438374!3d-34.34477137304831!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bb604c45eb008b%3A0xc9be84f64deff2d5!2sVenecia%20500%2C%20B1625LMK%20Bel%C3%A9n%20de%20Escobar%2C%20Provincia%20de%20Buenos%20Aires!5e0!3m2!1ses-419!2sar!4v1687566474291!5m2!1ses-419!2sar', '198.25', '88.05', 3, 1, 2),
(35, 'PH 3 AMB RECICLADO CON TERRAZA Y PARRILLA PROPIA!', 'Excelente PH reciclado de 3 ambientes ubicado en el corazón de Villa Crespo !!\r\nUnidad de 3 ambientes + espacio de escritorio. Patio con lavadero y amplia terraza con parrilla propia.\r\nMuy luminoso y con buena aireación interna!\r\n\r\nIngresamos a la propiedad ubicada internamente dentro del PH, accedemos a un patio con espacio de lavadero con conexión para lavarropas y bacha. A su vez nos conecta por una escalera con la amplia terraza con espacio en “L” y Parrilla.\r\nContinuando por el patio, esta el acceso al amplio living comedor con doble altura, cocina completa integrada y reciclada totalmente.\r\nConectada por un pasillito con el baño completo con bañera y ventanal con salida al exterior, también reciclado.\r\nSiguiendo por el otro extremo del living, nos topamos con la habitación principal con amplio placard empotrado y ventanal al patio. Gran espacio de guardado en la misma.\r\nAcceso por escalera a desnivel en el living, que nos lleva al actualmente espacio de escritorio o trabajo, seguido del mismo tenemos la segunda habitación. Tanto el espacio de escritorio como la habitación cuenta con ventanales hacia la terraza.\r\nLos pisos de pinotea en excelente estado. Muebles de cedro. Cabe destacar que todos los espacios tienen salida al exterior lo cual genera una muy buena aireación interna además de la gran entrada de luz natural.\r\n\r\nVENI A CONOCER ESTA PH QUE PUEDE SER TU PRÓXIMO HOGAR! VIVÍ LA EXPERIENCIA PREMIUM!\r\nEl presente inmueble NO es accesible para personas con discapacidades físicas.\r\nCOTI en tramite!', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.395049944139!2d-58.44339782437254!3d-34.59417067295765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb5f55002fc07%3A0xdfb5f12b9ae5c6fa!2sJuan%20Ram%C3%ADrez%20de%20Velasco%201000%2C%20C1414AQT%20CABA!5e0!3m2!1ses-419!2sar!4v1687567167062!5m2!1ses-419!2sar', '95', '65', 3, 1, 2),
(36, 'VENTA OFICINA PISO COMPLETO Y LOCAL TRIBUNALES CBA', 'En venta gran oficina, ubicada en el centro de Córdoba, sobre la calle Duarte Quiros 395, frente a la plaza de las intendencias. La oficina se encuentra en el ultimo piso del edificio, el piso 8 y ocupa todo el piso completo, con excelentes vistas a la plaza de la independencia, tribunales de cordoba, el palacio de justicia y la cañada.\r\n\r\nEs esquina calle Ayacucho, por lo que la oficina cuenta con ventanas en TODOS sus ambientes, algunas miran a la calle duarte quiros, otras a la calle ayacucho, y otras al patio interno del edificio.\r\n\r\nAparte de la oficina de piso 8 completo, cuenta tambien con 48 metros en planta baja que dan a la calle Ayacucho, que corresponden al patio del edificio y en donde se hizo un local comercial / lugar de guardado.\r\n\r\nCaracteristicas:\r\n- Ingreso al edificio con recepcion y portero\r\n- Recepcion en la oficina\r\n- 6 privados\r\n- 3 baños\r\n- Cocina completa\r\n- Cuarto de guardado\r\n- Pisos de parquet\r\n- Local comercial en planta baja\r\n\r\nCuenta con todos los papeles al dia y escritura', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3404.8554056743938!2d-64.19205712450898!3d-31.41810967426103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9432a283fdc3999d%3A0xef0a208a38730aff!2sAv.%20Duarte%20Quir%C3%B3s%20300%2C%20X5022%20C%C3%B3rdoba!5e0!3m2!1ses-419!2sar!4v1687567814570!5m2!1ses-419!2sar', '243', '195', 0, 3, 0),
(37, 'Venta Casa Jauregui', 'Casa quinta en Pueblo Nuevo, barrio abierto El Ombú.\r\nCasa de Estilo Colonial reciclada a nuevo. Casco Histórico del Pueblo.\r\n\r\nEn su totalidad mide 5691,72 m2, de los cuales 235 m2 son cubiertos y 5456,72 m2 descubiertos.\r\n\r\nSe compone de seis ambientes: cuatro dormitorios, el principal con chimenea a gas y baño en suite con bañera, 2 baños completos y un hall que divide los cuartos con placares empotrados, cocina comedor, amplio living comedor con hogar a leña y aire acondicionado frio. Amplio lavadero, escritorio o cuarto de servicio, Galpón de guardado de herramientas, leñero, piscina, parrilla con quincho y gran parque con frutales (Higuera, ciruelo, membrillo, naranjos, duraznero, etc.).\r\nLa circunferencia de la propiedad se encuentra rodeada de una galería con arcadas de época, piso cerámicos en excelente estado.\r\nTodos los ambientes cuentan con tiro balanceado y ventilador de techo. Pisos cerámicos y cielo raso, bomba sumergible de agua que abastece a la casa y a la pileta.\r\n\r\nLa propiedad tiene entrada por las dos calles laterales, una de ellas cuenta con portón automatizado y la otra manual.\r\n\r\nLa pileta es de 9 Mts. x 3 Mts. y su profundidad es de 1.50 a 3 Mts de profundidad con una ducha en su exterior para ser mas ameno el día. La misma se encuentra a una distancia prudenciada de la propiedad para una mayor tranquilidad.\r\n\r\nExcelente oportunidad para inversión.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3285.614321857888!2d-59.193173124373885!3d-34.56331927296884!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bc7ea9618a3281%3A0x5e4fd8651d16f607!2sDr.%20Luis%20Pasteur%201300%2C%20Luj%C3%A1n%2C%20Provincia%20de%20Buenos%20Aires!5e0!3m2!1ses-419!2sar!4v1687568558771!5m2!1ses-419!2sar', '5000', '235', 5, 2, 4),
(38, 'VENTA CASA DE CAMPO LUJAN - ESTANCIA LAS LILAS', 'El Barrio de Chacras se encuentra ubicado a 1.30 hs de Capital Federal por Acceso Oeste.\r\n\r\nLas Chacras cuentan con espacios comunes como el Casco histórico de 1000 m2 construidos en 1880 por la familia Casey, antiguos fundadores de la Estancia. Añosas arboledas de 14 hectáreas, laguna, canchas de tenis, pileta y una antigua construcción de fin de siglo XVIII que fue utilizado como puesto de carretas y pulpería en el pasado.\r\n\r\nLa propiedad se encuentra en perfecto estado de mantenimiento. Esta emplazada en un lote de 12.000 m2 y tiene una calidad constructiva con excelentes detalles de terminación.\r\nSe desarrolla completamente en Planta Baja. Todos los ambientes son de grandes dimensiones, súper luminosos y ventilados.\r\n\r\nDistribución:\r\n- Hall de distribución con salida a la galería.\r\n- Toilette de recepción.\r\n- Estar con hogar.\r\n- Cocina comedor con salida a la galería y al sector de la parrilla.\r\n- Dormitorio principal en suite con vista al jarín a través de un jardín de invierno.\r\n- Dos dormitorios en suite.\r\n- Galería con vista al jardín y pileta.\r\n- Lavadero - habitación de servicio.\r\n- Baño de servicio.\r\n- Semicubierto para dos autos.\r\n\r\n\r\nCaracterísiticas:\r\n- Aberturas de madera.\r\n- Ventanales de hierro con vidrio repartido.\r\n- Cielorrasos con detalles de madera.\r\n- Calefacción por radiadores.', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3788.245037387722!2d-59.12228540927016!3d-34.73380820958146!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzTCsDQ0JzAxLjQiUyA1OcKwMDcnMTIuMyJX!5e0!3m2!1ses-419!2sar!4v1687569057891!5m2!1ses-419!2sar', '310', '250', 4, 4, 3),
(39, 'Casa quinta con galpón', 'Quinta / Fracción Calle 208 entre 472 y 483 “Don Cacho”, Abasto, próximo a Estancia Chica.\r\n\r\nVENTA URGENTE POR VIAJE.\r\n\r\n- Lote 75 m y 249 m, 18.675 m2 (1,86 has), 501,28 m2 cub y 76 m2 semicub\r\n\r\nCasa 3 dorm, 2 galpones, 9 invernáculos y bosque al frente.\r\n\r\nIDEAL VIVIENDA + EXPLOTACIÓN COMERCIAL.\r\n\r\nZonificación R/RI Rural Intensivo y Suelo rural clase 1 y 2 (máxima categoría, cinturón frutihortícola).\r\n\r\nDESTINOS:\r\n1- Productores: agricultores, ganaderos, viveros, rural o semirural.\r\n2- Vivienda: temporal/permanente\r\n3- Comercial: alquiler vivienda, invernáculos, turismo o eventos.\r\n\r\nCASA PRINCIPAL 230,28 m2 (21 años)\r\n- 154,28 m2 cub (15,2 m x 10,5 m) y 76 m2 semicub (2 galerías), 230,28 m2 totales.\r\n- Aberturas aluminio con DVH\r\n- Liv-com con bajo y sobre mesada.\r\n- Dorm 1 c/ placard.\r\n- Dorm 2 amplio.\r\n- Baño completo con hidromasaje\r\n- Lavadero/dormitorio + Entrepiso\r\n- Taller de invierno (interno)\r\n- Construcción con doble base (evita rajaduras/grietas) y ladrillo macizo bueno, no hueco.\r\n- Pileta 8 x 3 m pintada.\r\n\r\nGALPÓN-QUINCHO (nuevo)\r\n- 12 x 8 = 96 m2 + baño = 105 m2\r\n- Parrilla.\r\n- Baño con ducha.\r\n- Termotanque nuevo.\r\n\r\nGALPÓN-TALLER (oficina en entrepiso)\r\n- 12 x 16 = 192 m2 + 50 m2 entrepiso = 242 m2 cub y totales\r\n- Piso cemento + 20 cm contrapiso > resiste elevador p/taller mecánico o camión de 7/8 toneladas\r\n\r\nINVERNÁCULOS\r\n- 9 invernáculos cubiertos con nylon\r\n- Antes alquilados para plantación de Lirium.\r\n\r\nSERVICIOS\r\n- Luz\r\n- Gas: pasa por la puerta (pedir conexión). Hoy usan garrafa, dura 2 meses.\r\n- Agua: 2 perforaciones de agua potable\r\n- Internet: Cooperativa de Abasto\r\n- Direct TV prepago\r\n\r\nGENERAL\r\n- Buena calidad constructiva y mantenimiento.\r\n- 8/9 Cámaras de seguridad (se ven desde el celular)\r\n- Grupo electrógeno\r\n- Sistema de riego hasta el ingreso\r\n- tablero de 380 V (casa) con disyuntor\r\n- Bomba trifásica de 3 y medio y 5 y medio HP (nueva) para pileta y sistema de riego\r\n- Bomba monofásica automatizada (Casa y galpón)\r\n- Pozo ciego 1,80 m x 5 m y 1/2 de profundidad + 2 cámaras sépticas 1 m x 2 m profundidad\r\n- Más de 280 árboles: Eucaliptus, Casuarinas y Pinos.\r\n- Frutales: limoneros, naranjas, quinoto, higueras, ciruelas, mandarinas y paltas.\r\n\r\nA 37´del casco de La Plata. Acceso por 460.\r\nCalle 208 poco transitada y Bosque al frente de la propiedad (seguridad y privacidad).\r\nA 10´ de RP 36 y Mizujo, próximo al Centro de entrenamiento Gimnasia y Autódromo Estancia Chica.\r\n\r\nFINANCIA: INGRESO 40% + CUOTAS\r\nTOMA PROPIEDADES (La Plata o CABA) O VEHÍCULOS.\r\nALQUILER CON OPCIÓN A COMPRA.\r\n', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3269.7642732781314!2d-58.12313734155259!3d-34.962516474596974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzTCsDU3JzM5LjkiUyA1OMKwMDcnMTMuNiJX!5e0!3m2!1ses-419!2sar!4v1687569938104!5m2!1ses-419!2sar', '18680.28', '501.28', 7, 2, 3),
(40, 'Venta de Galpón en Tandil', 'mportante galpón a la venta, ubicado en calle Salvat al 1200, con un importante tránsito diario.\r\nCaracterísticas del galpón:\r\n\r\nAmplio portón automático para un cómodo ingreso de vehículos y colectivos.\r\nIngreso adicional por puerta con reja.\r\nParedes de ladrillos en toda su extensión, sin columnas en el interior.\r\nPisos diseñados para soportar tráfico pesado.\r\nVentanas abiertas en altura para ventilación.\r\nTecho parabólico de chapa.\r\nConexión de luz trifásica.\r\nInstalación de luz en el techo.\r\nSuperficie total de 300 m2.\r\nFrente de 10 metros y fondo de 30 metros.\r\n\r\nFacil acceso desde Boulevard Rondeau y circuvalacion.\r\n\r\nPosibilidad de comprar el galpon lindero, de 223M2 con un frente de 10 x 22.3 Metros. - Con las mismas caracteristicas.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3172.955550179096!2d-59.16059212424618!3d-37.31988057210344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95911f7d756fec99%3A0xa4b5f2ade75d4dc0!2sBariffi%20400%2C%20Tandil%2C%20Provincia%20de%20Buenos%20Aires!5e0!3m2!1ses-419!2sar!4v1687570405522!5m2!1ses-419!2sar', '3199', '2037', 0, 2, 0),
(41, 'VENTA DE BODEGA , ALTO VERDE , SAN MARTIN, MENDOZA', 'Se encuentra montada sobre una superficie de 1 1/2 has, totalmente de material, en excelente estado de mantenimiento. Consta de cinco galpones de almacenaje de insumos secos, una casa y un departamento para encargado/empleados. La casa consta de 3 dormitorios , cocina comedor , sala de estar , despensa con lavandería, baño y patio . Y el departamento cuenta con un dormitorio, cocina y comedor. Báscula electrónica, 1 pozo propio de 12 pulgadas con electrobomba sumergible, laboratorio enológico completo, oficina privado, sector de fraccionamiento, sector de molienda, sector de fermentación, todo con sus máquinas en funcionamiento. Equipo de enfriamiento de 130.000 frigorías horas, torre de enfriamiento de agua, 3 contracorrientes de enfriados, bombas centrífugas de gran potencia y de acero inoxidable, bombas pistón varias, filtro de tierra fj2, hidrolavadora con caldera trifásica, protegidas con cámaras de seguridad afuera y adentro, alarma, rejas en todas sus ventanas y puertas, internet, sala de etiquetas y de corchos, repuestos de bodega, piletas de tratamientos de afluentes del agua de la bodega, amplio ingreso para camiones, viña respaldero de vista, cercado perimetral. La bodega consta de 62 piletas y tanques de acero inoxidable, con diferentes capacidades cómodas y muy prácticas para fermentaciones, conservación y fraccionamiento. OPORTUNIDAD IDEAL PARA INVERSORES. NO DUDES EN HACER TU CONSULTA Y PROGRAMAMOS UNA PRONTA VISITA.', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3340.7907068626305!2d-68.34547131650186!3d-33.14086261371944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzPCsDA4JzI2LjIiUyA2OMKwMjAnMzMuNSJX!5e0!3m2!1ses-419!2sar!4v1687570995133!5m2!1ses-419!2sar', '15000', '15000', 0, 2, 4),
(42, 'SE VENDE 5 AMBIENTES BELGRANO BALCON Y COCHERA', 'HERMOSO PISO UNICO DE 5 AMBIENTES AL FRENTE Y CONTRAFRENTE SUPER LUMINOSO, CON ESPACIO GUARDACOCHES.EL EQUIPO REMAX PREMIUM VENDE.\nEDIFICIO UBICADO EN LA MEJOR ZONA DE BELGRANO.\nLIVING Y DORMITORIOS CON SALIDA A GRAN BALCÓN! CALLE SÚPER SILENCIOSA (NO PASAN COLECTIVOS)\n\nSUPERFICIE CUBIERTA 105 M2 - BALCON CORRIDO 10 M2 - SUPERFICIE TOTAL 115 M2\nEDIFICIO MODERNO Y SOLIDO.\nAMPLIO LIVING COMEDOR CON PISOS DE MADERA ENTARUGADOS Y PUERTA BLINDADA.\nCOCINA CON COMEDOR DIARIO Y LAVADERO INDEPENDIENTE, SÚPER LUMINOSO CON GRAN VENTANAL\nPERSIANAS DE MADERA. ORIGINALMENTE SON 3 DORMITORIOS (hoy 4 dormitorios)\nEL LIVING TIENE 35 METROS ,SE HIZO UN CUARTO DORMITORIO O ESCRITORIO EN EL COMEDOR DE DURLOK(facilmente removible.)PROPIEDAD CON ALTO POTENCIAL.POR LAS DIMENSIONES.\nDORMITORIO PRINCIPAL EN SUITE CON AMPLIO PLACARES TIPO VESTIDOR,MAS 2 DORMITORIOS DE GENEROSAS MEDIDAS,CON PLACARES DE PARED A PARED.\n2 BAÑOS COMPLETOS ,EN PERFECTO ESTADO RECICLADO..MUCHO ESPACIO DE GUARDADO ,TODOS LOS DORMITORIOS TIENEN PLACARD DE MADERA EMPOTRADOS. EN PERFECTO ESTADO .\nSUPER LUMINOSO CON VENTILACION CRUZADA (FRENTE Y CONTRAFRENTE)\nAGUA CALIENTE CENTRAL Y CALEFACCION POR CALDERA INDIVIDUAL MARCA PEYSA.\nVENTILACION CRUZADA,DOBLE CIRCULACION.\nSOL DE MANANA AL FRENTE Y DE TARDE AL CONTRAFRENTE >\nA SOLO 1 CUADRA DE MONROE Y A 3 DE AV. CABILDO\nCERCA DEL SUBTE D, CINES ,RESTAURANTES ,ESCUELA Y SUPERMERCADOS.\n.EDIFICIO IMPECABLE SOLO 7 VECINOS.BAJAS EXPENSAS.\nESPACIO GUARDACOCHES.ENORME BAULERA EN SOTANO.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3285.772351091158!2d-58.46595742437407!3d-34.559318872970195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb68028a74589%3A0xe462a8ad9b2dfcd3!2sMoldes%202600%2C%20Buenos%20Aires!5e0!3m2!1ses-419!2sar!4v1687573203899!5m2!1ses-419!2sar', '115', '105', 5, 2, 4),
(43, 'Casa de campo lujosa', '¡Bienvenidos a esta encantadora casa de campo ubicada en un entorno natural y tranquilo, cerca de una hermosa laguna! Esta acogedora propiedad es ideal para aquellos que buscan escapar del bullicio de la ciudad y disfrutar de la serenidad y naturaleza del campo.\r\n\r\nAl ingresar a la casa, serás recibido por un ambiente cálido y acogedor\r\n\r\nLa cocina, totalmente equipada, te permitirá preparar deliciosas comidas caseras. Cuenta con, amplios mostradores de trabajo y una hermosa mesa de comedor donde podrás disfrutar de tus creaciones culinarias.\r\n\r\nLa casa cuenta con dos dormitorios confortables y luminosos. Cada habitación ha sido decorada con buen gusto y ofrece una atmósfera relajante para descansar después de un día lleno de actividades al aire libre. Los amplios ventanales permiten disfrutar de vistas panorámicas del entorno natural rodeado.\r\n\r\nAdemás, esta casa de campo cuenta con un entrepiso con una cama adicional, ideal para huéspedes adicionales o espacio de juegos.\r\n\r\nEl exterior de la propiedad es simplemente encantador. Un amplio jardín rodea la casa, con árboles autóctonos.. Aquí podrás disfrutar al aire libre, organizar reuniones familiares o simplemente relajarte mientras admiras las vistas\r\n\r\nLa ubicación de esta casa de campo es privilegiada, ya que se encuentra a pocos pasos de una laguna. Podrás disfrutar de actividades acuáticas.\r\n\r\nTambién cuenta con una casa para el puestero, totalmente equipada.\r\n', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3540.184979044731!2d-58.64879712466235!3d-27.463499976323277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjfCsDI3JzQ4LjYiUyA1OMKwMzgnNDYuNCJX!5e0!3m2!1ses-419!2sar!4v1687574364944!5m2!1ses-419!2sar', '120', '100', 3, 2, 3),
(44, 'VENTA LOCAL COMERCIAL - AV. SUAREZ, BARRACAS', 'Venta de local comercial ubicado en Avenida Suarez, Barracas.\r\n\r\nEl local esta dispuesto en dos niveles:\r\nConsta de un piso en planta baja con entre piso y subsuelo , con un total de 211, 5 m2.\r\n\r\nLa fachada de la propiedad en la Av. Suárez garantiza una excelente visibilidad y exposición. Posee una abertura realizada especialmente para carga y descarga de mercadería.\r\n\r\nEl piso principal ofrece un generoso espacio con entre piso. También una oficina, cocina y baño.\r\n\r\nEl subsuelo complementario a el espacio principal, es una amplia área adicional para almacenamiento, depósito o cualquier otro uso que requiera espacio extra. Su diseño práctico permite maximizar la superficie disponible.\r\n\r\nEsta propiedad se encuentra en una zona transitada, cercana a zona comercial, medios de trasporte, a pocos metros de autopista y a pocos km de capital federal; lo cual contribuye a una gran accesibilidad tanto para empleados como para clientes.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3282.560089677458!2d-58.37973412437032!3d-34.64055557294115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccb4bfcf6314b%3A0xc8de333775c22af9!2sAv.%20Su%C3%A1rez%201900%2C%20C1288AEN%20CABA!5e0!3m2!1ses-419!2sar!4v1687575306254!5m2!1ses-419!2sar', '211.5', '165.58', 0, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_img` int(11) NOT NULL,
  `casa_img` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id_img`, `casa_img`) VALUES
(31, '1687563127_ed07cfca.webp 1687563127_31105b2a.webp 1687563127_511f0022.webp 1687563127_ca494d1f.webp 1687563127_6b8f3a74.webp 1687563127_064235c0.webp 1687563127_8fca1905.webp 1687563127_36942f65.webp 1687563127_243a54a5.webp 1687563127_8e9915e5.webp '),
(32, '1687564505_c7b83d24.webp 1687564505_804fed02.webp 1687564505_32a42d26.webp 1687564505_4d647a2e.webp 1687564505_5eca45c4.webp 1687564505_3f9724df.webp 1687564505_239050e0.webp 1687564505_33362d05.webp 1687564505_54188608.webp 1687564505_7b3ec18d.webp '),
(33, '1687565438_f30baaf6.webp 1687565438_c0535206.webp 1687565438_069d08e7.webp 1687565438_f888f887.webp 1687565438_11f108d0.webp 1687565438_fc38aa25.webp 1687565438_f9d5ebe5.webp 1687565438_6ac699a8.webp 1687565438_82c4a84.webp 1687565438_e923b69d.webp '),
(34, '1687566545_2d7b9c1c.webp 1687566545_dfdfd0f7.webp 1687566545_5dd57c95.webp 1687566545_d99109d8.webp 1687566545_8da08529.webp 1687566545_f1b5e968.webp 1687566545_6d755b21.webp 1687566545_3b97a30d.webp 1687566545_6a97f40a.webp 1687566545_feaeb13e.webp '),
(35, '1687567194_074c37d8.webp 1687567194_e4a954c5.webp 1687567194_b3a6293a.webp 1687567194_c2e505b1.webp 1687567194_a317e9f2.webp 1687567194_1c896bfe.webp 1687567194_278e36c8.webp 1687567194_c726939c.webp 1687567194_cb6491c0.webp 1687567194_427a1a10.webp '),
(36, '1687567844_7b73b69c.webp 1687567844_f63d30ab.webp 1687567844_37654fb8.webp 1687567844_9759d5ae.webp 1687567844_1cfda33d.webp 1687567844_b335eaf0.webp 1687567844_e4b0df9b.webp 1687567844_17230349.webp 1687567844_0f2d6b38.webp 1687567844_0b172290.webp '),
(37, '1687568589_c8b050cb.webp 1687568589_9f90dfba.webp 1687568589_0ec65c83.webp 1687568589_e0ea249d.webp 1687568589_5d225f6a.webp 1687568589_49f2fbd1.webp 1687568589_d539f72d.webp 1687568589_0772c6b4.webp 1687568589_ad28e2ee.webp 1687568589_ae6e557e.webp '),
(38, '1687569177_b683f257.webp 1687569177_ce78f6f7.webp 1687569177_7d9062a3.webp 1687569177_9f73e3f8.webp 1687569177_8defbd53.webp 1687569177_78a48a47.webp 1687569177_0fc7bfe9.webp 1687569177_19dad43e.webp 1687569177_572c6dc4.webp 1687569177_437d35a4.webp '),
(39, '1687569955_47dc8d86.webp 1687569955_04a34498.webp 1687569955_fc1ad432.webp 1687569955_d4b3bbd8.webp 1687569955_23817c38.webp 1687569955_816db9d5.webp 1687569955_c8578e96.webp 1687569956_c068d63b.webp 1687569956_23f1237e.webp 1687569956_01d9047a.webp '),
(40, '1687570462_d9b7665e.webp 1687570462_aec27177.webp 1687570462_fb2118bc.webp 1687570462_b1e74bf1.webp 1687570462_eacdc906.webp 1687570462_c7097437.webp 1687570462_6c77503b.webp 1687570462_edb2e321.webp 1687570462_cd200cc5.webp 1687570462_6afc2510.webp '),
(41, '1687571054_87ea2a7a.webp 1687571054_6f9d2e38.webp 1687571054_80e94c2c.webp 1687571054_3b74a1a1.webp 1687571054_d8681217.webp 1687571054_1c46b4dd.webp 1687571054_0fb45040.webp 1687571054_808b61b1.webp 1687571054_aa635002.webp 1687571054_54c5f485-.webp '),
(42, '1687573236_d72947e4.webp 1687573236_928aada3.webp 1687573236_ed023989.webp 1687573236_bdf3e8a6.webp 1687573236_91fcb95b.webp 1687573236_b05ec002.webp 1687573236_09d46024.webp 1687573236_689979e8-.webp 1687573236_0b0d9182.webp 1687573236_42d3f212.webp '),
(43, '1687574400_7e9ba39b.webp 1687574400_45dde908.webp 1687574400_2924df13.webp 1687574400_8f63042a.webp 1687574400_a3e7a4b9.webp 1687574400_fb3d0176.webp 1687574400_7905e952.webp 1687574400_e8f79f4e.webp 1687574400_554df7df.webp 1687574400_260ce8b1.webp '),
(44, '1687575334_89a864f4.webp 1687575334_ff749740.webp 1687575334_1b66172f.webp 1687575334_26e34457.webp 1687575334_def2327f.webp 1687575334_baefb12a.webp 1687575334_6207c6ed.webp 1687575334_2c998dfd.webp 1687575334_8294653c.webp 1687575334_a962fad3.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `contra_usuario` varchar(100) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `contra_usuario`, `fecha_registro`, `estado`) VALUES
(1, 'ADMIN-HCA1B707', '$2y$10$RYwVoBkgVOdnM4g91nKwJOqzWovDXUufLFoppBOXNGyH0P6W5/Va.', '2023-06-20 12:46:43', 1),
(2, 'ADMIN-XNJ4C015', '$2y$10$swk.UYaEKuhbUdurjzO4beOwSS4ciWQoCYPmTGn6ds6omo3QZdQJO', '2023-06-20 14:55:32', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vender`
--

CREATE TABLE `vender` (
  `id_vender` int(11) NOT NULL,
  `nombre_cliente` varchar(100) NOT NULL,
  `email_cliente` varchar(255) NOT NULL,
  `tel_cliente` varchar(45) NOT NULL,
  `tipo_propiedad` varchar(50) NOT NULL,
  `comentarios` text NOT NULL,
  `fecha_recibo` date NOT NULL DEFAULT current_timestamp(),
  `estado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vender`
--

INSERT INTO `vender` (`id_vender`, `nombre_cliente`, `email_cliente`, `tel_cliente`, `tipo_propiedad`, `comentarios`, `fecha_recibo`, `estado`) VALUES
(26, 'Franco Orellana', 'forellana813@alumnos.frh.utn.edu.ar', '1141873847', 'Quinta', 'Hola me contacto con ustedes porque tengo la intención de poner en venta mi propiedad publicándolo en su sitio. ', '2023-06-21', 1),
(27, 'Alejandro Martinez', 'AleMartinez@gmail.com', '1171073147', 'Local', 'Hola me contacto con ustedes porque tengo la intención de poner en venta mi propiedad publicándolo en su sitio.', '2023-06-21', 1),
(28, 'martin luque', 'mluque@gmail.com', '1141451201', 'PH', 'Hola me contacto con ustedes porque tengo la intención de poner en venta mi propiedad publicándolo en su sitio.', '2023-06-21', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE `visita` (
  `id_visita` int(11) NOT NULL,
  `id_casa_visita` int(11) NOT NULL,
  `cliente_visita` varchar(30) NOT NULL,
  `email_visita` varchar(255) NOT NULL,
  `telefono_visita` varchar(30) NOT NULL,
  `fecha_visita` date NOT NULL,
  `horario_visita` varchar(30) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `visita`
--

INSERT INTO `visita` (`id_visita`, `id_casa_visita`, `cliente_visita`, `email_visita`, `telefono_visita`, `fecha_visita`, `horario_visita`, `fecha_registro`, `estado`) VALUES
(9, 18, 'Franco Orellana', 'forellana813@alumnos.frh.utn.edu.ar', '1141873847', '2023-06-25', 'Mañana', '2023-06-22 15:18:33', 0),
(10, 18, 'Alejandro Martinez', 'AleMartinez@gmail.com', '1171073147', '2023-06-23', 'Tarde', '2023-06-22 15:19:23', 1),
(11, 18, 'martin luque', 'mluque@gmail.com', '1141451201', '2023-06-28', 'Tarde', '2023-06-22 15:20:30', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `casas`
--
ALTER TABLE `casas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_detalles` (`id_detalles`,`id_imagenes`),
  ADD KEY `id_imagenes` (`id_imagenes`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`),
  ADD KEY `id_casa_consulta` (`id_casa_consulta`);

--
-- Indices de la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD PRIMARY KEY (`id_detalles`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_img`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `vender`
--
ALTER TABLE `vender`
  ADD PRIMARY KEY (`id_vender`);

--
-- Indices de la tabla `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`id_visita`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `casas`
--
ALTER TABLE `casas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `detalles`
--
ALTER TABLE `detalles`
  MODIFY `id_detalles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `vender`
--
ALTER TABLE `vender`
  MODIFY `id_vender` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `visita`
--
ALTER TABLE `visita`
  MODIFY `id_visita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `casas`
--
ALTER TABLE `casas`
  ADD CONSTRAINT `casas_ibfk_1` FOREIGN KEY (`id_imagenes`) REFERENCES `imagenes` (`id_img`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `casas_ibfk_2` FOREIGN KEY (`id_detalles`) REFERENCES `detalles` (`id_detalles`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
