-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2024 a las 18:20:03
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `portal21a`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `id_autor` int(11) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id_autor`, `correo`, `nombre`, `tipo`, `clave`, `estado`) VALUES
(1, 'levimendoza1999@gmail.com', 'Levi_Mendoza', 'Administrador', 'Admin123@', 1),
(2, 'Rodolfo Agrio', 'Rodolfo Agrio', 'Periodista', 'rodolfito45@', 1),
(3, 'zelayajoseph12@gmail.com', 'Jose Zelaya', 'Pasante', 'Z3l4y4123@', 1),
(4, 'ferrer123@gmail.com', 'Ernesto Ferrer', 'Pasante', 'f3rr3r@12', 1),
(5, 'chaconpetter12@gmail.com', 'Pedro Chacones', 'Pasante', 'ch4c0n123@', 1),
(7, 'dvvv', '', 'Sin categoria', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `ncategoria` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `ncategoria`, `estado`) VALUES
(1, 'Deportes', 1),
(2, 'Entretenimiento', 1),
(3, 'Nacionales', 1),
(5, 'Economia', 1),
(6, 'Internacionales', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id_publicacion` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `autor` varchar(50) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `texto` text NOT NULL,
  `imagen1` varchar(100) NOT NULL,
  `imagen2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id_publicacion`, `fecha`, `autor`, `titulo`, `categoria`, `texto`, `imagen1`, `imagen2`) VALUES
(1, '2023-05-27', 'Levi Mendoza', 'Legionarios en actividad: los partidos de Jairo y Tamacas', 'Deportes', '<p>El volante entró al 61′ y anotó para la honra en la derrota de su<strong> Switchbacks FC</strong> (1-2) contra Tampa Bay. Luego de una increíble acción individual de uno de sus compañeros, Henríquez le pegó de tres dedos y el remate entró justo en la escuadra al 90+2′. Inatajable para el guardameta.</p><ul><li><strong>Tamacas</strong> <strong>titular y victoria</strong></li></ul><p>Con el zaguero cuscatleco desde el arranque, el<strong> Oakland Roots</strong> se impusó (2-0) al San Diego Royal SC. El lateral disputó los 90 minutos y aportó a que su equipo no recibiera gol.</p><h2><strong>Los legionarios en la tabla</strong></h2><p>Ubicados en la Conferencia Oeste, por una parte, el<strong> </strong>Switchbacks de Jairo marcha en el sexto lugar de la tabla con 16 puntos. Mientras que, el<strong> </strong>Roots de Tamacas es quinto con 17 unidades.</p><h2><strong>Compromiso con Selección Nacional</strong></h2><p>Ambos futbolistas están convocados por Hugo Pérez de cara a la gira asiática, donde la Selecta se enfrentará a sus similares de Japón (15 de junio) y Corea del Sur (20 de junio). Duelos de carácter amistoso con el fin de tener rodaje previo a la Copa Oro 2023.</p>', 'archivos/IMG1_IdPublic_001.jpg', 'archivos/IMG2_IdPublic_001.jpg'),
(2, '2023-05-28', 'Jose Zelaya', 'Barca se despide de Busquets, Alba y el Camp Nou con victoria', 'Deportes', '<p>En un partido emotivo para todos los aficionados culés, el <strong>Barca</strong> derrotó (3-0) al Mallorca por la penúltima jornada de Liga. Victoria agridulce porque significó el adiós al <strong>Camp Nou</strong>, a <strong>Sergio Busquets</strong> y <strong>Jordi Alba</strong>.</p><h2><strong>Mejores incidencias</strong></h2><p>Apenas trascurría el primer minuto de partido cuando Ansu Fati abrió el marcador tras concluir una jugada grupal que rompió a la defensa (1-0). Duro mazazo del que no pudo reponerse los bermellones y todo se les complicó al cuarto de hora cuando se quedaron con uno menos por la roja directa a Amath.</p><p>Con la misma fórmula, Fati amplió la ventaja producto de un pase al pie de Robert Lewandowski al 24′ (2-0). Diez minutos después, el español le devolvió el favor al polaco, pero este último la mandó a las nubes. En la última del primer tramo, Dominik Greif le quitó el <i>hat-trick</i> al canterano.</p><p>La parte complementaria no cambió de guion. El Mallorca estaba volcado en su campo debido al envión azulgrana y sobre la línea Valjent&nbsp;evitó el tanto de Ousmane Dembélé al 56′.</p><p>Posteriormente, la figura de Muriqui comenzó a tener presencia en la zaga catalana, pero no pudo convertir en la doble oportunidad que tuvo al 58′.</p><p>Con más acierto, Gavi selló el triunfo con un zurdazo potente que el guardameta no pudo detener al 69′ (3-0). El marcador no se volvió a mover en los minutos siguientes y el conjunto de Xavi Hernández se quedó con los tres puntos.</p><h2><strong>Terminan una etapa en el Barca</strong></h2><p>Un total de 88 775 asistentes se congregaron para decirle adiós a dos de sus grandes figuras en el último tiempo. Tanto Sergio como Jordi tomaron la decisión de cerrar su paso con el Barcelona.</p><p>Por otro lado, comienzan los trabajos de renovación en el recinto catalán, lo cuales concluyen hasta el próximo noviembre de 2024.</p>', 'archivos/IMG1_IdPublic_002.jpg', 'archivos/IMG2_IdPublic_002.jpg'),
(3, '2023-05-27', 'Ernesto Ferrer', 'Homicidio en Michigan resuelto gracias a una consola de videojuego', 'Internacionales', '<p><i>Por medio de un jugador anónimo, reveló un audio que permitió a la policía resolver un caso de asesinato en Michigan, Estados Unidos.</i></p><p>En muchas ocasiones, los videojuegos son empleados, tanto por chicos y grandes, como una distracción clara para superar el aburrimiento. Además, se consideran herramientas de ocio para que las personas puedan distraer su mente. Sin embargo, en muy pocas ocasiones, se considera un canal que puede llegar a revelar, y muchos menos esclarecer, un crimen.</p><p>Siempre hay una primera vez para todo, y esta es la ocasión. En el año 2019, Daushawn Lamarr Guthridge, de 41 años, mientras se distraía en su consola con un juego de baloncesto, fue atacado a tiros dentro de su vivienda. Esas fueron las primeras investigaciones por parte de las autoridades.</p><p>Luego del hecho, no se supo más. Las investigaciones siguieron su curso, hasta que un informante anónimo mencionó un detalle que se le había escapado acordarse. Él recordó que, mientras se encontraba jugando con Lamarr, la consola guardó los audios intactos de todo lo que ocurrió ese día.</p><h2><strong>Asesinato de Lamarr:</strong> <strong>¿Qué se escucha en el audio?</strong></h2><p>Esta persona anónima entregó a las autoridades policiales la grabación completa de todo lo que ocurrió mientras se encontraba jugando en línea con Lamarr y otros. En el audio, se puede escuchar una fuerte discusión entre el hombre de 41 años con otra persona (que se presume sea su asesino).</p><p>El oficial a cargo de la investigación, Dustin Hurt, mencionó que la discusión, al parecer, se desencadenó por un cobro a Lamarr proveniente de un negocio con droga.</p><p><i>“No te muevas. Habla rápido. ¿Dónde está el dinero? Tienes treinta segundos, hermano”</i>, aseguró que el oficial que es parte de la transcripción del audio.</p><p>Además, lo que se conoce, es que esta persona que le quitó la vida, mencionó que ya había estado vigilando la casa de su víctima semanas atrás. Sin embargo, ese día, llegó a solicitar el dinero de manera agresiva.</p><p>Por lo menos fueron 12 disparos los que han sido percibidos en el audio. Luego, asegura, solo se escuchó silencio en el lugar.</p><p>Darel King sería la identidad del criminal. Es un hombre que ya poseía antecedentes criminales. El 22 de mayo de este año también fue acusado por un asalto a mano armada y el asesinato de Lamarr. Esta persona ha quedado detenida, y su juicio inicia el próximo 5 de junio.</p>', 'archivos/IMG1_IdPublic_003.jpg', 'archivos/IMG2_IdPublic_003.jpeg'),
(4, '2023-05-27', 'Pedro Chacones', 'Dres 7 presenta su nuevo sencillo como solista en “Play”', 'Entretenimiento', '<p>Andrés Morales, conocido artísticamente como “Dres 7”, fue exintegrante del dúo <strong>“Shaka y Dres”</strong> junto a su hermano Antonio, quienes con sus melodías cautivaron a muchos salvadoreños y sobre todo pusieron el nombre de El Salvador en alto en el extranjero.</p><p>En esta ocasión, el programa “Play” tuvo como invitado a Andrés, el pasado viernes 26 de mayo, el cual, llegó a promocionar su más reciente producción musical como solista titulado <strong>“Olvídate de todo”</strong>, el mismo que fue lanzado el pasado 12 de mayo. Sin embargo, durante la entrevista que sostuvo con Mafer Salina, externó que siente diferente no estar acompañado de su hermano.</p><p>El motivo por el cual “Shaka y Dres” no están juntos es porque, Antonio se encuentra viviendo en otro país y por la distancia se les complicaba seguir produciendo música juntos. A raíz de las dificultades que se les presentaba para continuar como dúo, decidieron darse un tiempo, para que cada uno explore su propia creatividad. Por tanto, surgió la idea de <strong>Dres 7.</strong></p><h2>¡<strong>Dres 7 y su nueva faceta en el mundo musical</strong>!</h2><p>El nuevo sencillo del cantante salvadoreño es toda una innovación, en cuanto al ritmo musical que propone el artista<i>. “Me he estado reuniendo con músicos salvadoreños, Diego Membreño y con Francisco Cornejo, bajista. Y, teníamos la idea de sacar una propuesta diferente, con un sonido propio original, y ahí nace, pues, lo de Dres 7, que es una propuesta más fusionada, con ritmos latimos, pero con esos instrumentos en vivo, que le dan vida la propuesta”,</i> aseveró.</p><p>No obstante, el reconocido intérprete de “Pas de Panique”, externó que esta etapa, como solita que está vivenciando actualmente, se la está disfrutando al máximo. Además, explicó que esta nueva canción surgió de reunirse con un grupo de músicos y asimismo, reveló que cuentan con más de 10 canciones terminadas para presentarlas próximamente.</p><p>“Olvídate de todo” es la primera incluida en el repertorio de canciones que mencionó el cantante. Por su parte, Dres 7 dejó claro que se encuentra muy contento de su debut como solita.</p>', 'archivos/IMG1_IdPublic_004.jpg', 'archivos/IMG2_IdPublic_004.jpg'),
(5, '2023-05-27', 'Ernesto Ferrer', 'Cierran urnas en Turquía tras segunda vuelta en elecciones', 'Internacionales', '<p><i>Hoy se llevó a cabo la segunda vuelta de los comicios presidenciales en Turquía, y será la población quien decide si Erdogan continua.</i></p><p>Sin vuelta atrás. Así han denominado a estas elecciones en Turquía algunos analistas políticos que, considerando las condiciones de población, han mencionado, tal vez, un cambio de gobierno tras más de dos décadas de<strong>&nbsp;Erdogan</strong> en el poder.</p><p>En caso, termine consolidándose como ganador, estaría gobernando por otros cinco años más, una decisión que, para algunos, no es lo más conveniente. Dicha elección determinará hacia dónde se irá el país en cuanto a la política exterior, ya que Turquía es miembro clave en la OTAN.</p><p>Son 60 millones de turcos quienes decidirán porque Recep Tayyip Erdogan siga siendo el presidente de la República o que su opositor, Kemal Kiliçdaroglu, sea quien gobierne por cinco años la nación. El pasado 14 de mayo se llevaron la primera jornada electoral, en la cual, ninguno de ambos aspirantes a la silla presidencial logró alcanzar más de la mitad de los votos.</p><p>A través de su cuenta personal de Twitter, Erdoğan publicó un mensaje a la población turca, acerca de su visión de las elecciones. Aseguró que, a pesar de no ganar, las votaciones a su favor mostraron un favoritismo a su persona, así como la confianza que le tienen. Parte del comunicado, reza:</p><p><i>“Nuestra nación,&nbsp;<strong>con más de 27 millones</strong>&nbsp;de votos (el 49,51% de los sufragios), volvió a mostrarnos una enorme satisfacción, y dio la mayoría en la Gran Asamblea Nacional turca a la Alianza Popular, confirmando que confían en nosotros y en su Alianza, y que&nbsp;<strong>creen y&nbsp;</strong>ven su futuro aquí”</i>.</p><h2><strong>Pronunciamientos de candidatos en Turquía</strong></h2><p>Este día, el presidente actual, Erdogan, luego de cerradas las urnas, escribió:<br><br><i>“Quisiera dar las gracias a cada uno de mis colegas que han estado trabajando con devoción en las urnas desde las primeras horas de la mañana. Invito a todos mis hermanos a ocuparse de las urnas hasta que los resultados sean definitivos. ¡Ahora es el momento de proteger la voluntad de nuestra nación sobre nuestras cabezas hasta el último momento!”</i></p><p>Su contrincante, Kemal, también expresó su sentir en las elecciones, haciendo un llamado a las personas que aún no han ido a votar, para que ese acerquen a hacerlo. Escribió:</p><p><i>“Mi hermano que aún no ha votado, ve a las urnas, no seas perezoso, juega el juego. Tan cerca como a poca distancia del futuro…”</i></p><p>Las urnas están cerradas y la población ha decidido. En unas pocas horas se conocerá quién será el que gobernará el país turco en los próximos cinco años.</p>', 'archivos/IMG1_IdPublic_005.jpg', ''),
(6, '2023-05-22', 'Pedro Chacones', '¡Chayanne estrenó su nuevo sencillo “Bailando bachata”!', 'Entretenimiento', '<p><i>Chayanne lanzó el jueves 25 de mayo su nueva canción y la protagonista del video musical es junto a la venezolana, Verónica Schneider.</i></p><p>El cantante puertorriqueño, Chayanne estrenó su más reciente sencillo el pasado jueves 25 de mayo, titulado “Bailando Bachata”, que lanzó junto con el video oficial de la canción.</p><p>En esta ocasión el artista sorprendió a sus seguidores con un ritmo bastante pegajoso que presenta la producción musical. Ya que, este tema destaca todo el carisma y talento que conocemos del artista.</p><p>Asimismo, el originario de San Lorenzo, retoma el sabor de la música tropical con su nuevo proyecto, quien desde el 22 de mayo se encuentra anunciado la melodía a través de su cuenta de Instagram ante sus más de 7 millones de seguidores. En el que, agregó un divertido video, relacionado con el rodaje del videoclip, además redactó una breve descripción <i>“Jumm, espero que les guste… el video de Bailando Bachata. xD”.</i></p><h2><strong>¡Una pegajosa canción a cargo de Chayanne!</strong></h2><p>No obstante, en una entrevista que sostuvo Chayanne recientemente con “Billboard Español”. Quien habló sobre su tema musical y aseguró que le gusta esta nueva propuesta, <i>“me encanta el género”, </i>destacó.</p><p>Elmer Figueroa Arce, como es su nombre real, mencionó que “Bailando Bachata” insta a quererla bailar. “En cualquier parte del mundo, cuando ponen esa música caribeña que es la salsa, el merengue, la bachata, uno disfruta bailarla bien pegadito, entonces estoy bien ilusionado”, aseveró.</p><p>La producción musical fue escrita junto a grandes talentos como: Yasmil Marrufo, Andy Clay Cruz Felipe y Mario Alberto Cáceres Pacheco.</p><p>La protagonista del videoclip es la actriz de telenovelas, Verónica Schneider, una venezolana, quien ha interpretado grandes historias televisivas como “La viuda joven”, “Betty en NY”, entre otras. Mientras que, forma parte de la pareja de ficción junto a Chayanne en la trama de la melodía.</p><p>El video fue filmado en una casa de estilo mediterráneo en Miami, Estados Unidos. Este fue dirigido por Katherine Díaz y la producción de Guacamaya Films, ambientada en la época de los 70.</p>', 'archivos/IMG1_IdPublic_006.jpg', 'archivos/IMG2_IdPublic_006.jpg'),
(7, '2023-05-28', 'Jose Zelaya', 'Gobierno quiere retiro de 5,000 jubilados que siguen laborando', 'Economia', '<p>El director general del Presupuesto del Ministerio de Hacienda, informó a los diputados que trabajadores pensionados o jubilados del Ejecutivo se podrían acoger al beneficio de hasta $25,000 como máximo de compensación por “retiro voluntario”. La medida sería aprobada hoy en el pleno.</p><p>El gobierno pretende que unos 5,000 trabajadores del Órgano Ejecutivo y entidades descentralizadas no empresariales y autónomas que están pensionados o jubilados, pero que aún siguen laborando, se acojan al decreto de “retiro voluntario”, que fue avalado ayer por los diputados de la Comisión de Hacienda de la Asamblea Legislativa.</p><p>Los parlamentarios emitieron dictamen favorable para la propuesta de “Ley Transitoria de Compensación Económica por Retiro Voluntario de Servidores Públicos Jubilados o Pensionados del Órgano Ejecutivo, entidades descentralizadas no empresariales y entidades autónomas”, enviada a la Asamblea el pasado 11 de mayo. La petición fue avalada en una sola sesión de la Comisión de Hacienda.</p><p>El director general del Presupuesto del Ministerio de Hacienda, Carlos Salazar, llegó ayer a la comisión a explicar a los diputados que prevén que unos 5,000 trabajadores del sector público que siguen laborando a pesar de estar pensionados o jubilados, se acojan al beneficio de la compensación, estipulada en la iniciativa de ley hasta en un máximo de $25,000.</p><p>La medida abarca a los trabajadores jubilados o pensionados que estén bajo Ley de Salarios o por contrato. No aplicará para empleados de los Órganos Legislativo y del Judicial, ni al personal militar.</p><p>Quienes se acojan a este beneficio no podrán volver a laborar en el sector público, ya sea por el régimen de Ley de Salario o contrato, durante el periodo de 10 años, contados a partir de la fecha de interposición de su renuncia.</p><p>El pago de la misma estará exenta del pago del Impuesto sobre la Renta y gozará del beneficio de la inembargabilidad.</p><h2>El gobierno no tiene liquidez</h2><p>Para la diputada del FMLN, Marleni Funes, es contradictorio lo que la Asamblea acordó ayer, ya que por un lado quieren quitar plazas, pero por el otro engrosan a otras instituciones recién creadas como la Dirección Nacional de Compras Públicas (DINAC), con más personal, incluso, devengando jugosos salarios de entre $1,800 hasta en más de $2,300. (Ver nota aparte).</p><p>Añadió que el movimiento efectuado por el gobierno de “obligar a los trabajadores a retirarse” responde más a un tema de falta de liquidez (dinero) y de desorden presupuestario.</p><p>En enero de 2022 los diputados aprobaron otorgar $27,000 de compensación para 2,000 empleados del Órgano Judicial que estuvieran en edad de retiro.</p><p>Esto fue calificado por la oposición política como el segundo golpe a la democracia del oficialismo en contra del Órgano Judicial. La primera fue la destitución “ilegal” de los magistrados de la Sala de lo Constitucional.</p>', 'archivos/IMG1_IdPublic_007.jpg', 'archivos/IMG2_IdPublic_007.jpg'),
(8, '2023-05-29', 'Jose Zelaya', 'Alertan de riesgo de hambruna por sequía en zonas fronterizas de Honduras, Guatemala y El Salvador', 'Economia', '<p>Alrededor de 140,000 personas están en crisis alimentaria en diferentes etapas, sobre todo en Guatemala y Honduras, informó Plan Trifinio.</p><p>Autoridades de la zona conocida como del \"Trifinio”, donde convergen las fronteras de Honduras, Guatemala y El Salvador, declararon una “alerta” para evitar que cerca de 140,000 pobladores caigan en “hambruna” por la sequía.</p><p>“Entramos en una alerta porque hay que evitar que la situación de crisis” por falta de alimentos que viven los pobladores “pase a hambruna a causa de la sequía por el cambio climático”, dijo el jueves el director por Honduras, del Plan Trifinio, Jorge Aguilar.</p><p>El Plan Trifinio fue creado en 1997 en el marco del Sistema de la Integración Centroamericana (SICA) para desarrollar esa zona de 7,584 kilómetros cuadrados que tiene más de un millón de habitantes entre los tres países, con el 62% de los hogares en la pobreza.</p><p>La secretaria ejecutiva trinacional del Plan, la hondureña Liseth Hernández, dijo en rueda de prensa que “alrededor de 140,000 personas están en crisis alimentaria en diferentes etapas”, sobre todo en Guatemala y Honduras, y que “no debe pasar a hambruna”.</p><p>En respuesta, para ayudar a la población, dijo que las autoridades de los tres países se enfocarán en “producir alimentos en corto tiempo” como “huertos familiares o comunitarios”, “sistemas de riegos en diferentes modalidades”, “cosechadoras de agua”, “cultivos adaptables a la sequía” y “viveros comunitarios”.</p><p>Esa reducción en la producción se vio afectada, además, por un fenómeno contrario al que está experimentando actualmente el rubro agropecuario, pues el paso de la tormenta tropical Julia, en octubre del año pasado, provocó pérdidas en los cultivos valoradas en hasta $17 millones.</p><p>En semanas anteriores, la Asociación Cafetalera de El Salvador (Acafesal) también advirtió que las altas temperaturas y las escasas lluvias podrían derivar en una caída en la producción de ese grano.</p><p>El Ministerio de Agricultura y Ganadería salvadoreño no ha especificado cuál podría ser el impacto de las fuertes temperaturas en la producción de granos y, recientemente, solo informó, a través de un comunicado, que “más de 150 técnicos del Centro Nacional de Tecnología Agropecuaria y Forestal (y de otras instituciones) están brindando asistencia con énfasis en las Buenas Prácticas Agrícola”, con el fin de aumentar la producción agrícola hasta en un 20%.</p>', 'archivos/IMG1_IdPublic_008.jpg', 'archivos/IMG2_IdPublic_008.jpg'),
(9, '2023-05-28', 'Ernesto Ferrer', 'Jefe de mercenarios prorrusos admite fracaso de Rusia en Ucrania', 'Internacionales', '<p>Si antes del comienzo de la operación especial ellos (los ucranianos) tenían<strong>&nbsp;500 tanques, ahora tienen 5.000</strong>. Si entonces sabían combatir&nbsp;<strong>20.000 efectivos, ahora son 400.000</strong>. ¿Así la desmilitarizamos? Ahora resulta que nosotros&nbsp;<strong>militarizamos Ucrania</strong>, y de qué manera\", sentenció&nbsp;<strong>Yevgeni Prigozhin</strong>&nbsp;este miércoles en una entrevista que publicó él mismo en un su canal de Telegram. Una vez más el<strong>&nbsp;líder&nbsp;</strong>de los infames&nbsp;mercenarios Wagner<strong>&nbsp;</strong>salió a la palestra para&nbsp;<strong>criticar&nbsp;</strong>el desarrollo del conflicto al asegurar<strong>&nbsp;</strong>que no se han cumplido<strong>&nbsp;</strong>ninguno de los objetivos iniciales.</p><p>Estos los hizo públicos el mismo presidente ruso a primera hora del&nbsp;<strong>24 de febrero de 2022</strong>, cuando afirmó ante la nación que Rusia empezaba una&nbsp;\"operación militar especial\" para \"desmilitarizar \" Ucrania. En el mismo discurso, Putin también comentó la intención de Moscú de \"desnazificar\" Ucrania. En cambio,&nbsp;<strong>Prigozhin</strong>, considera que la ofensiva, aunque tuviera ese fin, supuso convertir a Ucrania \"en una nación conocida en todo el mundo\". \"Son (los ucranianos) como los griegos y los romanos de los tiempos del florecimiento, les&nbsp;<strong>hemos legitimizado</strong>\".</p><p>El líder mercenario es el primer gran nombre en&nbsp;<strong>Rusia</strong>&nbsp;que admite que la&nbsp;<strong>contienda está fracasando</strong>. Mientras tanto, el grueso de<strong>&nbsp;medios oficialistas&nbsp;</strong>y miembros del Gobierno se han esforzado en mantener, desde el mismo 24 de febrero de 2022, que todo va según lo previsto, aunque&nbsp;<strong>más lento</strong>&nbsp;de lo deseado por el<strong>&nbsp;apoyo occidental</strong>&nbsp;a&nbsp;<strong>Kiev</strong>. Esta tesis también se suele plasmar en los medios estatales rusos, donde incluso es habitual que algunos tertulianos pidan ir más allá para \"desnazificar\" otros países.</p><p>En la misma entrevista, Prigozhin presume de sus hombres, a los que califica de \"<strong>mejor ejército del mundo</strong>\" para, a renglón seguido, añadir que el ruso es \"el segundo mejor\". Aunque son enemigos, también señala que las fuerzas armadas de&nbsp;<strong>Ucrania</strong>&nbsp;también son una fuerza a tener en cuenta, \"uno de los ejércitos más fuertes\" que maneja con éxito cualquier sistema de armamento, ya sea de origen soviético o de la OTAN.</p><p>Desde el inicio del conflicto, el&nbsp;oficialismo ruso ha buscado compararse con el Ejército soviético durante la Segunda Guerra Mundial. Sin embargo, el cocinero de Putin ha roto los esquemas al comparar la motivación de las tropas ucranianas con las de sus antepasados en lo años 40. \"Hacen todo en aras del logro del objetivo supremo, como nosotros durante la Gran Guerra Patria (como denominó la Unión Soviética el periodo de la Segunda Guerra Mundial entre el comienzo de la invasión de la URSS en junio de 1941 y la capitulación de Alemania)\", añade el líder de los mercenarios.</p>', 'archivos/IMG1_IdPublic_009.jpg', 'archivos/IMG2_IdPublic_009.jpg'),
(10, '2023-05-28', 'Rodolfo Agrio', 'Familiares retiran cuerpos de menores víctimas de triple homicidio en Cuscatancingo', 'Nacionales', '<p>Los cuerpos de dos menores y su madre, a quienes su padre les quitó la vida, fueron retirados en Medicina Legal la tarde de este sábado.</p><p>Familiares retiraron la tarde de este sábado los cuerpos de dos menores de edad y de Julia Mercedes Laínez, quienes fueron asesinados en la madrugada de este mismo día por Mario Edmundo Miranda, padre y esposo de las víctimas.</p><p>Los cuerpos fueron encontrados dentro de su vivienda ubicada en la calle principal de la colonia San Carlos 1 en Cuscatancingo, San Salvador, y luego de cometer los asesinatos se suicidó, informó la Policía Nacional Civil (PNC).</p><p>Las víctimas fueron identificadas como Julia Mercedes Laínez, de 36 años, Mario y María Miranda (ambos menores de edad). Una persona más, identificada como Alicia Montano, de 14 años, fue encontrada con lesiones y fue trasladada al Hospital Zacamil. De acuerdo con la información policial, los asesinatos ocurrieron tras una discusión.</p><p>Preliminarmente, se dio a conocer que a eso de las 2:35 de la madrugada del sábado 27 de mayo, reportaron disparos en la colonia, por lo que el personal de inspecciones de la Policía Nacional Civil (PNC) se hicieron presentes al lugar para realizar las investigaciones correspondientes.</p><p>En horas de la mañana, Medicina Legal se hizo presente a la escena para realizar el reconocimiento de los cuerpos e informó que la pareja llevaba 11 años juntos. Miranda trabaja como vigilante y Laínez vendía pupusas en la zona.</p><p>&nbsp;</p>', 'archivos/IMG1_IdPublic_0010.jpg', 'archivos/IMG2_IdPublic_0010.jpg'),
(11, '2023-05-28', 'Rodolfo Agrio', 'Hombre murió al chocar su moto en redondel Integración', 'Nacionales', '<p>En el accidente también se vio involucrado un carro que volcó. Paramédicos indicaron que atendieron a una persona lesionada.</p><p>Un hombre murió este domingo por la madrugada luego que chocara su motocicleta<strong> contra un carro que ya había volcado.</strong></p><p>El hecho se registró sobre el<strong> kilómetro seis de la calle que conduce al redondel Integración</strong>, correspondiente al municipio de Apopa.</p><p>La víctima fue identificada como<strong> Baltazar Barraza, de 23 años, </strong>quien regresaba a su vivienda luego de una jornada laboral, explicaron sus conocidos.</p><p>Paramédicos del Sistema de Emergencias Médicas indicaron que además del fallecido<strong> se reportó otra persona lesionada de gravedad.</strong></p><p>\"En el lugar se brindó <strong>asistencia prehospitalaria a una persona lesionada</strong> y lamentablemente se reporta una persona fallecida\", reportó Protección Civil.</p><p>Debido al impacto, <strong>la moto quedó completamente destruida. </strong>El cuerpo quedó a unos dos metros de la moto. Socorristas de Comandos de Salvamento llevaron al herido al Hospital Nacional Zacamil.</p><p>La víctima perdió la vida de inmediato y hasta las 8:00 de la mañana del domingo el <strong>paso vehicular se encontraba registrando a un carril </strong>ya que estaban a la espera que Medicina Legal retirara el cadáver.</p><p>Se conoció que el conductor del carro volcado <strong>iba en aparente estado de ebriedad</strong> por lo que fue detenido por los policías.</p>', 'archivos/IMG1_IdPublic_0011.jpg', 'archivos/IMG2_IdPublic_0011.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id_publicacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id_publicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
