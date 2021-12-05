-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2021 a las 11:34:13
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `meowka`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adopcion`
--

CREATE TABLE `adopcion` (
  `idAdop` int(10) NOT NULL,
  `ahora` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `antes` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `coment` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `decision` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `deseo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estadoPeticion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaPeticion` date NOT NULL DEFAULT current_timestamp(),
  `horas` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `razon` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `vive` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idGato` int(50) NOT NULL,
  `idUsuario` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `adopcion`
--

INSERT INTO `adopcion` (`idAdop`, `ahora`, `antes`, `coment`, `decision`, `deseo`, `estadoPeticion`, `fechaPeticion`, `horas`, `razon`, `vive`, `idGato`, `idUsuario`) VALUES
(1, 'Gato', 'No he tenido animales', NULL, '', 'Quiero que mi actual gato tenga compaía', 'Aceptada', '2021-10-18', '7', '', 'Piso', 6, 4),
(2, 'Gato', 'No he tenido animales', NULL, '', 'Quiero que mi actual gato tenga compañía felina', 'Aceptada', '2021-10-25', '7', '', 'Piso', 8, 6),
(3, 'Nada', 'Perro', NULL, '', '', 'Aceptada', '2021-10-25', '7', '', 'Chalet', 6, 10),
(4, 'Perro', 'Reptiles', NULL, '', '', 'Recibida', '2021-10-29', '8', '', 'Chalet', 9, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gatos`
--

CREATE TABLE `gatos` (
  `idGato` int(11) NOT NULL,
  `nombreGato` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `edad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `esterilizado` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `testado` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `caracter` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(2000) COLLATE utf8_spanish_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fechaAlta` date NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `gatos`
--

INSERT INTO `gatos` (`idGato`, `nombreGato`, `edad`, `sexo`, `esterilizado`, `testado`, `caracter`, `descripcion`, `img`, `fechaAlta`, `estado`) VALUES
(1, 'Pop', 'Joven', 'Macho', 'Pendiente', 'Pendiente', 'Simpático/a', 'Rock y Pop llegaban el domingo a nuestra gran familia Felina. Estaban plagados de pulgas. Al principio se mostraron muy asustados y fue complicado poder pesarlos, desparasitarlos externamente e incluso darle la primera dosis de desparasitacion interna. Ni 24 horas después no solo estaban mas relajados si no que pedían mimos!\r\n\r\nA Rock las fotos no le hacen justicia, tiene un pelaje color ceniza espectacular!\r\n\r\nNos encantaría encontrar una familia conjunta para ellos ya que forman un equipo estupendo.\r\n\r\n¡¡Anímate y pregunta por ellos!!\r\n', 'assets/img/gatosimg/Pop1-768x1024.jpeg', '2021-10-25', 'Reservado'),
(2, 'Niebla', 'Cachorro', 'Hembra', 'Pendiente', 'Pendiente', 'Cariñoso/a', 'NIEBLA llegó junto con su hermanita BRISA pesando ambos poco más de 200 gr. Gracias al trabajo de la casa de acogida se está tan guapo y  fuerte como su hermanica y ya pesa más de medio kilo. Ambos son adorables y si fuera posible nos gustaría que permanecieran juntos y que la adopción fuera conjunta de ambos pero no es imprescindible.', 'assets/img/gatosimg/Niebla7-977x1024.jpg', '2021-10-25', 'Refugio'),
(3, 'Nasel', 'Aduto', 'Macho', 'Sí', 'Negativo', 'Asustadizo/a', 'Nasel llegaba a la perrera la semana pasada. Lo hacia muy muy desubicado y no tarda en mostrar enfado si intentas tocarle, aunque gruñe acaba dejandose acariciar lentamente. Pesa 10,100kg, tiene sobrepeso y esta muy descuidado (muchos nudos que no se deja peinar) Necesitamos con urgencia alguien con mucha paciencia para evitar que enferme y muera. Una casa donde sean conscientes que necesita tiempo para volver a confiar y dieta.\r\n\r\n \r\n\r\n¡¡Ayuda para Nasel!!\r\n', 'assets/img/gatosimg/Nasel-4-1024x1002.jpg', '2021-10-25', 'Reservado'),
(4, 'Mogwai', 'Cachorro', 'Macho', 'Sí', 'Negativo', 'Huidizo/a', 'Mogwai fue recogido por unos particulares y llevado a la perrera en el estado en el que veis. Automaticamente le trasladamos a una clinica veterinaria donde ademas de curar la gran herida que presentaba en la  barbilla ha sido operado de un fractura de sínfilis mandibular. Por el momento aunque se muestra muy asustado ya sin dolor comienza a confiar algo mas.', 'assets/img/gatosimg/MOGWAI-Marzo-2021-II-1024x768.jpg', '2021-10-25', 'Reservado'),
(5, 'Frijolita', 'Joven', 'Hembra', 'Sí', 'Negativo', 'Sociable', 'Frijolito resultó ser Frijolita. Ha sido esterilizada y pasado a los recintos exteriores de la perrera. Está mucho más tranquila y relajada que cuándo llegó. La entrada en perrera siempre les asusta y estresa mucho, por eso, en ocasiones, no muestran el carácter que en realidad tienen. En el caso de Frijolita, vemos que es una gata buena, que en cuánto le hablas ella se frota con lo que pilla, eso nos da muchas pistas y son muy buenas.\r\n\r\nLo único que necesita en un hogar donde poder vivir tranquila y felizmente para siempre.\r\n\r\n¿ADOPTAS A FRIJOLITA?\r\n', 'assets/img/gatosimg/FRIJOLITA-Marzo-2021-1024x768.jpg', '2021-10-25', 'Reservado'),
(6, 'Esmeralda', 'Joven', 'Hembra', 'Sí', 'Negativo', 'Tímido/a', 'Nuestra preciosa Esmeralda lleva con nosotros más de un año. La recogió herida en la carretera una compañera de camino a la perrera. La  trasladamos a veterinario, donde le hicieron una revisión a fondo, y afortunadamente no hubo nada grave.\r\nEs una gata que se muestra tímida, pero en espacios reducidos, no ha dejado acariciarla. Convive con gatos en los recintos exteriores, y espera el momento en que alguien le de la oportunidad de poder vivir feliz y relajarse en un hogar.\r\n¡ESMERALDA TE ESPERA!\r\n', 'assets/img/gatosimg/ESMERALDA-Marzo-2021-III-1024x768.jpg', '2021-10-25', 'Adoptado'),
(7, 'Peppo', 'Adulto', 'Macho', 'Sí', 'Negativo', 'Asustadizo/a', 'Peppo llegaba hace alguna semana a la perrera, viajaba en los bajos de un coche donde sin demasiado problema pudieron rescatarle.Tiene una cicatriz en su ojo izquierdo probablemente como secuela de algún virus de cachorro. Es un gato muy tímido y asustadizo que no se deja manipular pero que ya convive con el resto de gatos sin mayor problema\r\n\r\n¡¡Peppo merece una familia con compañía de su especie!!\r\n', 'assets/img/gatosimg/PEPPO-Marzo-2021-1024x768.jpg', '2021-10-25', 'Refugio'),
(8, 'Arlet', 'Adulta', 'Hembra', 'Sí', 'Negativo', 'Tímido/a', 'Arlet es esta preciosa pantera que nos llegaba a primeros de Junio. Como peculiaridad física os contaremos que tiene la cola corta suponemos que de nacimiento. Ya ha sido esterilizada y testada siendo negativo a inmunodeficiencia y leucemia felina. Convive con otros gatos en el recinto exterior de la perrera pero por el momento siempre que vamos está escondida y tenemos que buscarla. Parece que aun no se acostumbra a su nueva vida. Como peculiaridad física os contaremos que tiene la cola corta suponemos que de nacimiento. Arlet Necesita una casa que sepa darle tiempo para que se adapte.¿Te animas a adoptar a este bellezon?', 'assets/img/gatosimg/Arlet5-1024x823.jpg', '2021-10-25', 'Adoptado'),
(9, 'Dakar', 'Cachorro', 'Macho', 'Sí', 'Pendiente', 'Simpático/a', 'DAKAR fue recogido en la calle con una úlcera muy fea en uno de sus ojitos como podéis ver en las fotos. Rápidamente fue llevado a nuestros veterinarios para que lo revisaran y realizaran los cuidados oportunos. DAKAR es más bueno que el pan y se deja curar perfectamente', 'assets/img/gatosimg/webJAT_0297-1024x970.jpg', '2021-10-25', 'Reservado'),
(10, 'Nisca', 'Joven', 'Hembra', 'Sí', 'Negativo', 'Sociable', 'Trufa y Nisca son dos pequeñinas que fueron recogidas solitas con menos de un mes en un colegio\r\n\r\nTan chiquitinas no iban a sobrevivir en la perrera, ni siquiera comian aún  pero tuvieron la suerte de encontrar una casa de acogida donde les han podido dar todos los cuidados, atenciones y cariño que han necesitado\r\n\r\nHan crecido sanas y fuertes, juguetonas y adorables  y ya están listas para encontrar unas familias que se enamoren de ellas y les den hogares donde seguir creciendo mimadas y felices…ANIMAOS!!\r\n', 'assets/img/gatosimg/nisca.jpeg', '2021-10-25', 'Reservado'),
(11, 'Megan', 'Adulta', 'Hembra', 'Sí', 'Negativo', 'Simpático/a', 'Megan llegó hace una semana a nosotros. Es una gata adulta de unos 4 años, esterilizada y testada negativa.\r\n\r\nCreemos que es casera porque confía rápidamente en la gente y se muestra muy cariñosa.\r\n\r\nEsta txikitina se merece un hogar, quieres dárselo?\r\n', 'assets/img/gatosimg/IMG-8990-794x1024.jpg', '2021-10-25', 'Reservado'),
(12, 'Yarus', 'Cachorro', 'Macho', 'Pendiente', 'Pendiente', 'Cariñoso/a', 'Cachorrita de unos dos meses que la semana pasada llegaba a la perrera.\r\nEstá un poco asustadilla y nos bufa, nada que con un par de sobeteos y mucho cariño no podamos solucionar ', 'assets/img/gatosimg/Yaris5-1024x831.jpg', '2021-10-25', 'Reservado'),
(13, 'Masako', 'Adulta', 'Hembra', 'Sí', 'Negativo', 'Huidizo/a', 'Masako se ha seguido manteniendo en las alturas todo este tiempo pero por fin el otro día pudimos verla entre los demás gatos a la espera de su racion de lata. Es tan preciosa como desconfiada.Seria estupendo encontrar para ella un hogar con el menos otro compañero felino donde pueda llegar a vencer todos sus miedos, y si no lo hace, donde la dejen ser ella..', 'assets/img/gatosimg/Masako-1.jpg', '2021-10-25', 'Refugio'),
(15, 'Tommy', 'Aduto', 'Macho', 'Sí', 'Negativo', 'Desconfiado/a', 'TOMMY es otro de los peques de la colonia de Miraflores. Hace unos días las alimentadoras vieron que tenía algo en la pata trasera izquierda así que ayer lo llevamos al veterinario. Lo que parecía una herida, es una masa con células compatibles con un tumor ????. Además en una de las radiografiás se ve el hueso de uno de los dedos destruido por la misma. Por el momento hay que amputar dos de los deditos junto con la masa y mandaremos todo a analizar.', 'assets/img/gatosimg/Tommy-III-1-1024x768.jpg', '2021-11-21', 'Refugio'),
(16, 'Arraultza', 'Adulto', 'Macho', 'Sí', 'Negativo', 'Huidizo/a', 'ARRAULTZ  es otro gatete de la colonia de Miraflores.  Fue recogido e ingresado con cuadro respiratorio leve.  Ha pasado mucho tiempo escondido en las casetas pero ya se deja ver..es muy muy tímido pero no tiene problemas con otros gatos. Necesita un poco de tiempo para ir haciéndose a su nuevo entorno.', 'assets/img/gatosimg/Arraultz-1-1024x768.jpg', '2021-11-21', 'Refugio'),
(17, 'Negua', 'Cachorro', 'Hembra', 'Pendiente', 'Pendiente', 'Sociable', 'Negua Y Kala llegaban hace un mes a la perrera,demasiado pequeñas para quedarse alli asi que una compañera les hizo un hueco en su casa donde estan creciendo a pasos agigantados. Ya tienen la segunda desparasitacion y seran vacunadas en breve. Conviven sin problema con un bebe humano .', 'assets/img/gatosimg/Negua5-768x1024.jpg', '2021-11-21', 'Refugio'),
(18, 'Kala', 'Cachorro', 'Hembra', 'Pendiente', 'Pendiente', 'Cariñoso/a', 'Negua Y Kala llegaban hace un mes a la perrera,demasiado pequeñas para quedarse alli asi que una compañera les hizo un hueco en su casa donde estan creciendo a pasos agigantados. Ya tienen la segunda desparasitacion y seran vacunadas en breve. Conviven sin problema con un bebe humano .', 'assets/img/gatosimg/Kala8-768x1024.jpg', '2021-11-21', 'Refugio'),
(19, 'Mandala', 'Cachorro', 'Hembra', 'Pendiente', 'Pendiente', 'Simpático/a', 'MANDALA es una cachorrita de unos 3 meses aproximadamente que se encontró encerrada en un garaje. Como es de suponer llegó muy asustada pero nos deja manipularla. Se va relajando poco a poco ahora que ya no está en un oscuro y frio garaje. Estamos seguras de que en un tiempo estará correteando feliz. ', 'assets/img/gatosimg/mandala1-891x1024.jpg', '2021-11-21', 'Refugio'),
(20, 'Emma', 'Joven', 'Hembra', 'Sí', 'Negativo', 'Simpático/a', 'EMMA ha llegado hace un par de semanas. Es una gata jovencita y majísima que por su forma de actuar y comportarse estamos convencidas de que ha vivido en una casa. Tiene un problema digestivo importante debido a la porquería de la calle que ha estado comiendo. Está en observación por si hubiera algo más oculto pero en breve estará recuperada para encontrar un hogar.', 'assets/img/gatosimg/EMMA-986x1024.jpeg', '2021-11-21', 'Refugio'),
(21, 'Gotz', 'Joven', 'Macho', 'Sí', 'Negativo', 'Cariñoso/a', 'Gotz es este precioso gato que en Abril hará un año de edad. El pasado domingo era llevado a una clinica veterinaria por unas vecinas que le vieron caer desde un cuarto piso. Los que hasta el momento han sido su familia han cedido EL gato a la asociación por no poder hacerse cargo ni de los gastos ni del.\r\n\r\nGotz tiene fractura de fémur y requiere una intervención quirúrgica. El traumatólogo aun no ve claro hasta el momento de abrir si será necesario poner tornillos o una placa. Sea como sea es una operación costosa pero no podemos dejar a Gotz sin operar. ', 'assets/img/gatosimg/Gotz4-498x1024.jpeg', '2021-11-21', 'Refugio'),
(22, 'Ally', 'Cachorro', 'Macho', 'Pendiente', 'Pendiente', 'Cariñoso/a', 'ALLY es esta pequeñaja de 4 meses que llegó ayer hasta nosotras.  A pesar de la gravedad de sus fracturas se muestra muy cariñosa con nosotras y sólo busca mimos.  Ayer mismo fue ingresada para que la revisaran y le hicieran las pruebas oportunas para ver el alcance de las lesiones. Los RX muestran luxación de cadera con fragmento de la cabeza además fractura de fémur. La operación va a ser muy costosa y complicada debido a su corta edad. Se le va a realizar una artoplastia de la cabeza del fémur (extirpación) y por otro colocar dos gujas en el fémur para unir la fractura. ', 'assets/img/gatosimg/WhatsApp-Image-2021-11-10-at-10.47.07-AM-768x1024.jpeg', '2021-11-21', 'Refugio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(50) NOT NULL,
  `nombreUs` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `poblacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `numTlf` int(20) NOT NULL,
  `fechNac` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `rol` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUs`, `apellidos`, `email`, `direccion`, `poblacion`, `numTlf`, `fechNac`, `rol`, `pass`) VALUES
(1, 'Andrea', 'Boyano', 'admin@meowka.es', 'C/Autonomia', 'Basauri', 659895712, '11/11/1991', 'admin', '$2y$10$FjULl9HdsYRho5YOQxGogeaQjwX/YQaffCVnZeA/Gn7J.yEBBGtKm'),
(2, 'Elara', 'by', 'co@co.es', 'fs', '345', 345, '12/12/81', 'usuario', '$2y$10$qUAUPdEffpxP38uFgJxbeeTw.cL8MfUxQmiM60NFpzn1FYcRiRKO.'),
(4, 'Saioa', 'Perez', 'saioa@hotmail.com', 'C/lavanda 5 1a', 'Bilbao', 944512355, '13/2/1989', 'usuario', '$2y$10$yKQiMoQxj/aFIC0DutFjq.9L7r8X/3UgNfhHkjBOL.Z.v.KB31mRe'),
(6, 'Danae', 'Herranz Gómez', 'danae@gmail.com', 'C/Aretxabaleta', 'Amorebieta', 685712386, '12/12/1981', 'usuario', '$2y$10$jB4STZmPmP.5cd.DmX8UaO.wKZp0iCA6PKB.TTgjfOd3FiVwg.vcK'),
(7, 'admin', 'prueba', 'correo@y.es', 'fgsgsgf', 'dfgssgg', 563346535, '34242', 'admin', '$2y$10$KX/6P7dZtZED3/NzAKf80OZ/rLKiZqfFPmyn3TgLdsBF1lbdG30Be'),
(10, 'drte', 'sdfsf', 'p@p.es', 'sfsg', 'sgsfg', 356363653, 'sfgsfg', 'usuario', '$2y$10$R6BaR3oAPDGMhk7eIs2eJufsevWp8rg3BfwEej18OeJI.kIVdLS6m');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adopcion`
--
ALTER TABLE `adopcion`
  ADD PRIMARY KEY (`idAdop`),
  ADD KEY `idGato` (`idGato`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `gatos`
--
ALTER TABLE `gatos`
  ADD PRIMARY KEY (`idGato`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adopcion`
--
ALTER TABLE `adopcion`
  MODIFY `idAdop` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `gatos`
--
ALTER TABLE `gatos`
  MODIFY `idGato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adopcion`
--
ALTER TABLE `adopcion`
  ADD CONSTRAINT `adopcion_ibfk_1` FOREIGN KEY (`idGato`) REFERENCES `gatos` (`idGato`),
  ADD CONSTRAINT `adopcion_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
