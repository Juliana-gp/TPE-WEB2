-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-10-2021 a las 01:42:27
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_books`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books`
--

CREATE TABLE `books` (
  `Book_id` int(10) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Author` varchar(60) NOT NULL,
  `ISBN` bigint(13) NOT NULL,
  `Genre_id` int(10) NOT NULL,
  `Cover` varchar(50) DEFAULT NULL,
  `Synopsis` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `books`
--

INSERT INTO `books` (`Book_id`, `Title`, `Author`, `ISBN`, `Genre_id`, `Cover`, `Synopsis`) VALUES
(5, 'Cuentos de amor, locura y muerte', 'Horacio Quiroga', 8498382665, 1, 'cuentosdeamor.jpg', 'Cuentos de amor de locura y de muerte es un libro de cuentos de Horacio Quiroga publicado en 1917 por la \"Sociedad Cooperativa Editorial Limitada\" de Buenos Aires. La primera publicación incluye 18 relatos y en siguientes ediciones el propio autor realiza algunas modificaciones en los cuentos y excluye Los ojos sombríos, El infierno artificial y El perro rabioso. El tema de la muerte resalta en la mayoría de los relatos. Por decisión expresa del autor, el título no lleva coma.'),
(6, 'El diario de Ana Frank', 'Ana Frank', 8478884957, 1, 'anafrank.jpg', 'El libro es escrito por la joven Ana Frank durante la Segunda Guerra Mundial (1942-1944), en un diario íntimo regalado por sus padres, los señores Frank, el día de su cumpleaños número 13. Ese mismo día empieza la narración sobre su vivencia “En la casa de atrás”, nombre que ella otorga al escondite donde pasaron escondidos junto a otra familia dos años.'),
(7, '¡Melisande! ¿Qué son los sueños?', 'Hillel Halkin', 8415625863, 5, 'arton1134.jpg', '¿Qué son los sueños? la sabia mirada de un hombre maduro sobre su vida y sobre aquello que le da sentido convierte este libro en un canto al amor y a la amistad, en una invitación al perdón. Una de las novelas de amor más extraordinarias de los últimos años que nos habla del poder de la literatura y la memoria.'),
(8, 'Peter Pan ', 'J. M. Barrie', 8489396043, 5, 'peterpan.jpg', 'Peter Pan es un niño, que tras abandonar a su madre cuando tan solo era un bebé, dejó de crecer para convertirse en un niño por siempre jamás. Vive en el País de Nunca Jamás junto a los Niños Perdidos, el hada Campanita y la tropa de piratas controlados por el Capitán Garfio.'),
(9, 'Azul', 'Rubén Darío', 1253458, 11, 'azul.jpg', '                                    En 1888 un grito revolucionario con el que Rubén Darío inauguró el Modernismo. «Es una obra –dijo él mismo– que contiene la flor de la juventud, que exterioriza la interna poesía de las primeras ilusiones y que está impregnada de amor».\r\n                '),
(16, 'Niña errante', 'Gabriela Mistral', 9788426417770, 11, 'ninaerrante.jpg', 'Niña erranteː cartas a Doris Dana es una selección de 250 cartas, de las más de 10.000 del intercambio epistolar entre Gabriela Mistral y Doris Dana desde 1948, año en que comenzó la relación amorosa entre ellas, hasta el fallecimiento de la premio Nobel de Literatura en 1957'),
(26, 'Colmillo Blanco', 'Jack London', 9780001849129, 4, 'colmilloblanco.jpg', 'La narración está muy cuidada y, aunque encontraremos muy pocos diálogos —únicamente cuando aparecen humanos—, eso no quita profundidad y sentimiento a la novela. El lector se conmoverá y sentirá la rabia, la pena y el dolor por las desgracias y dichas de Colmillo Blanco.'),
(29, 'Relato', 'Gabriel', 8766579, 1, 'relatodeunnaufrago.jpg', 'Tal como el título completo del libro lo indica, en él se ficcionaliza una voz que da cuenta de un hecho real: el \"Relato de un náufrago que estuvo diez días a la deriva en una balsa sin comer ni beber, que fue proclamado héroe de la patria, besado por las reinas de la belleza y hecho rico por la publicidad, y luego aborrecido por el gobierno y olvidado para siempre\".'),
(32, 'Seis personajes', 'Luigi Pirandello', 13584681, 1, 'seispersonajes.jpg', 'La historia es el drama de una familia. El padre, tras haberse casado con una mujer de clase inferior y de haber tenido con ella un hijo, la deja en libertad de unirse a un hombre de clase baja de quien está enamorada.'),
(33, 'El Hombre araña', 'njcdñsbvi', 1531584, 4, 'hombrearaña.jpeg', 'La historia es el drama de una familia. El padre, tras haberse casado con una mujer de clase inferior y de haber tenido con ella un hijo, la deja en libertad de unirse a un hombre de clase baja de quien está enamorada.'),
(35, 'Ya rabat', 'Isaac Asimov', 12543843, 4, 'yorobot.jpg', '                                                                                \"Yo, Robot\" es una colección de nueve relatos donde robots inteligentes asisten a la humanidad. Sin importar el modelo, todos tienen programados y almacenadas en su cerebro positrónico, la forma en que se deben conducirse, sin violar las tres leyes de la robótica. La narración es brillante, sencilla y clara.\r\n                \r\n                \r\n                \r\n                '),
(37, 'Harry Potter y la orden del fénix', 'J. K. Rowling', 153181, 5, 'harrypotter.jpg', 'Tras el ataque de los dementores a su primo Dudley, Harry Potter comprende que Voldemort no se detendrá ante nada para encontrarlo. Muchos niegan que el Señor Tenebroso haya regresado, pero Harry no está solo: una orden secreta se reúne en Grimmauld Place para luchar contra las fuerzas oscuras.'),
(38, 'Padrón y las inundaciones', 'Rosalía de Castro', 9786050446562, 4, 'Padron_y_las_inundaciones-Rosalia_de_Castro-lg.png', 'Esta obra se enfoca en la vida del pueblo gallego asumiendo un punto de vista relacionado con los gustos folclóricos del Romanticismo.'),
(39, 'El Señor de los Anillos', 'J. R. R. Tolkien', 9780007141326, 3, 'seniorAnillos.jpg', 'Su historia se desarrolla en la Tercera Edad del Sol de la Tierra Media, un lugar ficticio poblado por hombres y otras razas antropomorfas como los hobbits, los elfos o los enanos, así como por muchas otras criaturas reales y fantásticas. La novela narra el viaje del protagonista principal, Frodo Bolsón, hobbit de la Comarca, para destruir el Anillo Único y la consiguiente guerra que provocará el enemigo para recuperarlo, ya que es la principal fuente de poder de su creador, el Señor oscuro, Sauron.'),
(40, 'Sonetos de la Muerte', 'Gabriela Mistral', 9788441406704, 11, 'Sonetosdelamuerte.jpg', 'Sonetos de la muerte son una serie de poemas escritos por la poetisa y educadora chilena Lucila Godoy Alcayaga, más conocida por el seudónimo de Gabriela Mistral. Con estos sonetos ganó el concurso literario de los Juegos Florales de Santiago el 22 de diciembre de 1914 y saltó a la fama a nivel nacional.'),
(41, 'Las botas de Anselmo Soria', 'Pedro Orgambide', 998724638462, 4, 'lasbotasdeanselmosoria.jpg', 'Anselmo Soria es un joven de dieciséis años, criado en los fortines en tiempos de la guerra al malón. Un incidente lo empuja al desierto, territorio de extraños personajes que le harán vivir insólitas aventuras, como el viaje en globo con Mesié Pierre. Sus botas de jinete son las que lo llevan luego a Buenos Aires'),
(42, 'Romeo y Julieta', 'William Shakespeare', 8979766679, 19, 'romeoyjulieta.jpg', 'Cuando el amor se encarama a las ramas del destino no hay quien lo detenga. ... Allí Romeo conoce a Julieta e inmediatamente se enamora de ella, pero cuando los dos se enteran de sus respectivos linajes deciden esconder su amor e intentar luchar por él.'),
(43, '20 Poemas de amor y una canción desesperada', 'Pablo Neruda', 862418645, 11, 'veintepoemas.jpg', 'El libro Veinte poemas de amor y una canción desesperada aborda esencialmente el tema del amor, el recuerdo y el abandono. Ella es la fuente perenne de una sed que no termina, de las ansias que no se sacian en el sujeto amoroso.'),
(44, 'Asesinato en el Orient Express', 'Agatha Christie', 892745368, 2, 'asesinato.jpeg', 'Asesinato en el Orient Express es una novela de misterio de la escritora británica Agatha Christie, protagonizada por el detective belga Hércules Poirot. Fue publicada por el Collins Crime Club el 1 de enero de 19341​ y en EE. UU. por Dodd, Mead and Company más tarde en el mismo año, con el título Murder in the Calais Coach.'),
(45, 'Dios es redondo', 'Juan Villoro', 897249064691, 16, 'diosesredondo.jpeg', 'Dios es redondo ofrece una vibrante crónica de la religión laica que llena los estadios. La divertida y a menudo épica aproximación de Villoro puede cautivar al forofo deseoso de compartir datos reveladores en una tertulia, pero también al curioso –y aun al enemigo del fútbol– interesado en conocer las causas que llevan a proferir alaridos en nombre de un equipo.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genres`
--

CREATE TABLE `genres` (
  `Genre_id` int(10) NOT NULL,
  `Genre` varchar(30) NOT NULL,
  `Description` longtext NOT NULL,
  `Img` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genres`
--

INSERT INTO `genres` (`Genre_id`, `Genre`, `Description`, `Img`) VALUES
(1, 'Realista', 'El realismo literario es una corriente estética que supuso una ruptura con el romanticismo, tanto en los aspectos ideológicos como en los formales, durante la segunda mitad del siglo XIX. Se extendió también a las artes plásticas en Latinoamérica, lugar donde hasta entonces no había gran proliferación en este arte. Este se caracterizaba por una extensa y muy detallada información de los personajes, paisajes, escenas, etc. De esta forma, podían ser imaginados con mayor facilidad.', 'R.png'),
(2, 'Policial', 'Es un género que agrupa la narraciones breves de hechos ficticios o reales , relacionados directamente con criminales y con la justicia, resolución de un misterio, persecución de un delincuente o temáticas similares, puede ser clásico o negro, problema o suspenso.', 'P.png'),
(3, 'Fantástico', 'El género fantástico es un género artístico en el que hay presencia de elementos que rompen con la realidad establecida.', 'F.png'),
(4, 'Ciencia Ficción', 'Es un género especulativo que relata acontecimientos posibles desarrollados en un marco imaginario, cuya verosimilitud se fundamenta narrativamente en los campos de las ciencias físicas, naturales y sociales. La acción puede girar en torno a un abanico grande de posibilidades (viajes interestelares, conquista del espacio, consecuencias de una hecatombe terrestre o cósmica, evolución humana a causa de mutaciones, evolución de los robots, realidad virtual, civilizaciones alienígenas, etc.).', 'C.png'),
(5, 'Maravilloso', 'Lo maravilloso sería aquello que se ubica en el lado opuesto a lo insólito, siendo aquel conjunto de obras en que la incertidumbre es despejada pero su explicación remite a nuevas leyes que no van de acuerdo a la realidad conocida, lo que ocurre en las obras de Walpole.', 'M.png'),
(11, 'Poesía', 'Es una forma de literatura basada en el verso. Mediante este recurso de la literatura se embellece aquello sobre lo que se habla. Además, mediante él se transmiten sentimientos, emociones y pensamientos acerca de las impresiones que deja en el espíritu humano un determinado fragmento de la realidad o de las ideas.', 'P.png'),
(16, 'Deportivo', 'Los textos de literatura deportiva están clasificados en no-ficción y ficción. La primera categoría hace referencia a las historias reales, biografías, recuentos, etc.; la segunda trata una historia narrada desde un hecho real pero con elementos ficticios como los personajes, lugares y datos.', 'D.png'),
(19, 'Suspenso', 'Suspenso, del latín suspensus, es aquello que mantiene la expectativa sobre una resolución o el estado de tensión en una determinada situación. Se trata, en el ámbito del arte, de un recurso también conocido como suspense que busca la expectación impaciente del espectador o lector por el desarrollo de una acción.', 'S.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `user` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `user`, `password`) VALUES
(10, 'Guille', '$2y$10$WdrQgnmekAO1LfCaFkMtPOL5TlXFA6iXtoD3.lqOzBmbIU9VVfm0W'),
(17, 'Juli', '$2y$10$6Yrxki4XvYkA50bzosHhbeEj8FgguwPUXLFf9XidWV3tensFbSlB6');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Book_id`),
  ADD KEY `Genre_id` (`Genre_id`);

--
-- Indices de la tabla `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`Genre_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `books`
--
ALTER TABLE `books`
  MODIFY `Book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `genres`
--
ALTER TABLE `genres`
  MODIFY `Genre_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`Genre_id`) REFERENCES `genres` (`Genre_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
