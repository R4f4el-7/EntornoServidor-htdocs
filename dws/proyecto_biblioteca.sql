-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2026 a las 21:18:24
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_biblioteca`
--
CREATE DATABASE IF NOT EXISTS `proyecto_biblioteca` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `proyecto_biblioteca`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_prestamo`
--

CREATE TABLE `detalles_prestamo` (
  `detalle_id` int(11) NOT NULL,
  `prestamo_id` int(11) NOT NULL,
  `libro_id` int(11) NOT NULL,
  `cantidad_prestada` int(11) NOT NULL,
  `fecha_devolucion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `editorial` varchar(255) DEFAULT NULL,
  `anio_publicacion` varchar(10) DEFAULT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `autor`, `editorial`, `anio_publicacion`, `isbn`, `descripcion`, `imagen`) VALUES
(1, 'El Señor de los anillos', 'J. R. R. Tolkien', 'Minotauro Ediciones Avd', '2006', '9788445076118', 'Con el objetivo de poner al alcance de todos la gran obra de Tolkien, presentamos la trilogía de El Señor de los Anillos en una edición más amable y atractiva. Sin duda, el nuevo formato, la encuadernación en cartoné y las innovadoras cubiertas harán las delicias tanto de los coleccionistas como de aquellos que se acerquen a Tolkien y a El Señor de los Anillos por primera vez.', 'http://books.google.com/books/content?id=yUYHPwAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api'),
(2, '1984 (edición definitiva avalada por The Orwell Estate)', 'George Orwell', 'DEBOLS!LLO', '2013', '9788490325070', '«No creo que la sociedad que he descrito en 1984 necesariamente llegue a ser una realidad, pero sí creo que puede llegar a existir algo parecido», escribía Orwell después de publicar su novela. Corría el año 1948, y la realidad se ha encargado de convertir esa pieza -entonces de ciencia ficción- en un manifiesto de la realidad. UNO DE LOS 5 LIBROS MÁS IMPORTANTES DE LOS ÚLTIMOS 125 AÑOS SEGÚN THE NEW YORK TIMES «Está entre mis libros favoritos, lo leo una y otra vez». Margaret Atwood En el año 1984 Londres es una ciudad lúgubre en la que la Policía del Pensamiento controla de forma asfixiante la vida de los ciudadanos. Winston Smith es un peón de este engranaje perverso y su cometido es reescribir la historia para adaptarla a lo que el Partido considera la versión oficial de los hechos. Hasta que decide replantearse la verdad del sistema que los gobierna y somete. La presente edición, avalada por The Orwell Estate, sigue fielmente el texto definitivo de las obras completas del autor, fijado por el profesor Peter Davison. Incluye un epílogo del novelista Thomas Pynchon, que aporta al análisis del libro su personal visión de los totalitarismos y la paranoia en el mundo moderno. Miguel Temprano García firma la soberbia traducción, que es la más reciente de la obra. La crítica ha dicho... «Aquí ya no estamos solo ante lo que habitualmente reconocemos como \"literatura\" e identificamos con la buena escritura. Aquí estamos, repito, ante energía visionaria. Y no todas las visiones se refieren al futuro, o al Más Allá.» Umberto Eco «No es difícil pensar que Orwell, en 1984, estuviera imaginando un futuro para la generación de su hijo, un mundo del que deseaba prevenirle.» Thomas Pynchon «La libertad es una obligación tan dolorosa que siempre habrá quien prefiera rendirse. La virtud de libros como 1984 es su capacidad para recordarnos que la libertad de los seres humanos responsables no es igual a la de los animales.» Anthony Burgess «Desde El proceso de Kafka ninguna obra fantástica ha alcanzado el horror lógico de 1984.» Arthur Koestler «Un libro magnífico y profundamente interesante.» Aldous Huxley «Orwell desarrolló la prosa inglesa más clara y atractiva del siglo XX. Pero es obvio que era mucho más que un gran escritor. Hoy resulta necesario debido a su pasión por la verdad.» The Sunday Times «Casi antes que nadie él comprendió que la corrupción de las palabras es un síntoma y a la vez la causa de la corrupción del pensamiento.» Antonio Muñoz Molina «Un intelectual radicalmente independiente cuya obra es de una claridad moral insobornable.» Guillermo Altares, El País «Probablemente el más influyente escritor occidental del siglo XX. [...] El verdadero Orwell, quienquiera que sea, sigue tomando forma.» The Times «Orwell fue la fuerza moral de su época.» Spectator', 'http://books.google.com/books/content?id=uFI8Kmx3a0oC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
(3, 'Juego de tronos (Canción de Hielo y Fuego 1)', 'George R. R. Martin', 'PLAZA JANÉS', '2014', '9786073123662', 'En el legendario mundo de los Siete Reinos, lord Stark y su familia se encuentran en el centro de un conflicto que desatará todas las pasiones y la más mortal de las batallas... Juego de tronos es el primer volumen de Canción de hielo y fuego, la monumental saga de fantasía épica del escritor George R. R. Martin que ha vendido más de 20 millones de ejemplares en todo el mundo. De la saga que inspiró la filmación de la aclamada serie televisiva de HBO: Game of Thrones. En el legendario mundo de los Siete Reinos, donde el verano puede durar décadas y el invierno toda una vida, y donde rastros de una magia inmemorial surgen en los rincones más sombríos, la tierra del norte, Invernalia, está resguardada por un colosal muro de hielo que detiene a fuerzas oscuras y sobrenaturales. En este majestuoso escenario, lord Stark y su familia se encuentran en el centro de un conflicto que desatará todas las pasiones: la traición y la lealtad, la compasión y la sed de venganza, el amor y el poder, la lujuria y el incesto, todo ello para ganar la más mortal de las batallas: el trono de hierro, una poderosa trampa que atrapará a los personajes... y al lector.', 'http://books.google.com/books/content?id=-c02AwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
(4, 'Don Quijote de la Mancha', 'Miguel de Cervantes', 'RBA Libros', '2019', '9788491873815', 'UN CLÁSICO IMPRESCINDIBLE PARA ENTENDER LA LITERATURA, LA HISTORIA Y EL ALMA HUMANA «La novela cervantina ha inspirado a innumerables ilustradores y pintores, músicos, escritores, cineastas y hasta filósofos. El Quijote ha sido traducido a todos los idiomas y a todos los medios, desde el cine hasta el cómic, de la ópera al ballet, desde las teleseries hasta los cartoons; sus personajes se han convertido en mitos culturales en los que es fácil reconocer perfiles antropológicos universales (el gordo y el flaco, el listo y el tonto...) repetidos una y otra vez. El caudal de estudios y libros que ha inspirado es descomunal y hoy constituye una industria académica, con varias revistas monográficas, asociaciones internacionales y congresos periódicos. Don Quijote se ha convertido en un mito sin fronteras, pero el texto de la novela sigue indemne y ajeno, tal como lo escribió su autor, a la espera de los lectores». De la Introducción de DOMINGO RÓDENAS', 'http://books.google.com/books/content?id=vIvODwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
(5, 'El gran Gatsby', 'Francis Scott Fitzgerald', 'DEBOLS!LLO', '2015', '9788466329712', 'Una extraordinaria fábula sobre el sueño americano. Jay Gatsby, el caballero que reina sobre West Egg, es el arquetipo de los legendarios años veinte en los que todo parecía posible, tiempo de felicidad entre el horror de la Primera Guerra Mundial y la barbarie de la Segunda. Con los demás protagonistas, forma parte de la Generación Perdida, los «jóvenes tristes» que personificaron el mito de la pasión y el desafecto, la literatura que se funde con la vida. Publicada por primera vez en 1925, El gran Gatsby está considerada La Gran Novela Americana. Simboliza el triunfo, la perpetua juventud y el deslumbramiento que desembocan en la tragedia, la decadencia y la caída, vicisitudes reflejadas con asombrosa precisión en la propia vida de Fitzgerald. La crítica ha dicho... « El gran Gatsby es el primer paso adelante dado por la narrativa norteamericana desde Henry James.» T. S. Eliot «Él tenía una de las cualidades más raras en la literatura: encanto, encanto como Keats lo había tenido ¿y quién lo posee hoy día?» Raymond Chandler «Fitzgerald representa el estilo, la profundidad y la lucidez... Hay frases en sus libros que quedarán grabadas para siempre en tu memoria... Bienvenido sea cualquier pretexto cinematográfico si sirve para que los lectores jóvenes descubran a Fitzgerald. Los viejos nunca hemos dejado de releerlo. La adicción que crea es para siempre.» Carlos Boyero, Babelia «Fitzgerald era el mejor de todos nosotros.» Ernest Hemingway «Fitzgerald es mi autor favorito.» Haruki Murakami «Le leerán cuando muchos de sus contemporáneos estén olvidados.» Gertrude Stein', 'http://books.google.com/books/content?id=AnosCAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
(6, 'La ladrona de libros', 'Markus Zusak', 'Vintage Espanol', '2010', '9780307475732', 'Érase una vez un mundo donde las noches eran largas y la Muerte contaba su propia historia. Érase una vez una ladrona que robaba libros y regalaba palabras. En el pueblo vivía una niña que quería leer, un hombre que tocaba el acordeón y un joven judío que escribía cuentos hermosos para escapar del horror de la guerra. Al cabo de un tiempo, la niña se convirtió en una ladrona que robaba libros y regalaba palabras. Y con esas palabras se escribió una historia hermosa y cruel. Una novela tremendamente humana, emocionante e inolvidable, que describe las peripecias de una niña alemana de nueve años desde que es dada en adopción por su madre hasta el final de la II Guerra Mundial. Su nueva familia, gente sencilla y nada afecta al nazismo, le enseña a leer y, a través de los libros, a distraerse durante los bombardeos y combatir la tristeza. Pero es el libro que ella misma está escribiendo el que finalmente le salvará la vida.', 'http://books.google.com/books/content?id=ey57kP_baUkC&printsec=frontcover&img=1&zoom=1&source=gbs_api');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `prestamo_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_prestamo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(100) DEFAULT NULL,
  `fecha_inicio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `sesiones`
--

INSERT INTO `sesiones` (`id`, `nombre_usuario`, `fecha_inicio`) VALUES
(1, 'admin', '2026-02-12 20:05:32'),
(2, 'admin', '2026-02-12 20:05:40'),
(3, 'Rafael', '2026-02-12 20:07:10'),
(4, 'Rafael', '2026-02-12 20:07:19'),
(5, 'admin', '2026-02-12 20:07:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido1` varchar(100) DEFAULT NULL,
  `apellido2` varchar(100) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contrasenia` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido1`, `apellido2`, `telefono`, `correo`, `contrasenia`) VALUES
(1, 'admin', NULL, NULL, NULL, 'admin@admin.com', '$2y$10$tHsgraCinNdZU4Cugg00Wujj9fTExAeZ8mNpANywZLWrtdefiOYQ6'),
(2, 'Rafael', 'cosquillo', 'cervantes', '123456789', 'ejemplo@gmail.com', '$2y$10$bsTU16aXBiyV7WiAUcmIeerbZfUpzerAxskivPKDA/YR3lcOtS4AS');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalles_prestamo`
--
ALTER TABLE `detalles_prestamo`
  ADD PRIMARY KEY (`detalle_id`),
  ADD KEY `prestamo_id` (`prestamo_id`),
  ADD KEY `libro_id` (`libro_id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`prestamo_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalles_prestamo`
--
ALTER TABLE `detalles_prestamo`
  MODIFY `detalle_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `prestamo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles_prestamo`
--
ALTER TABLE `detalles_prestamo`
  ADD CONSTRAINT `detalles_prestamo_ibfk_1` FOREIGN KEY (`prestamo_id`) REFERENCES `prestamos` (`prestamo_id`),
  ADD CONSTRAINT `detalles_prestamo_ibfk_2` FOREIGN KEY (`libro_id`) REFERENCES `libros` (`id`);

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
