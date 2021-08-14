<?php
/**
 * CONSEJO > Contiene el <article> con el contenido dinamico para cada tipo de pagina
 * Esto es un SNIPPET para incluir dentro de una plantilla de página de WP
 * Las imagenes se colocan en la carpeta "images" del directorio del ChildTheme
 
 ****************************

IDs de Páginas
--------------
INICI -> 4
DRAG -> 7
DRAGDROID -> 9
CONTACTE -> 13
NOTICIES -> .blog is_frontpage
 */
?>
<!-- *********************  ESTRUCTURA GLOBAL ***************************** -->
<section id="consejo" class="box col1">
	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/consejo.png" alt="<?php if( qtrans_getLanguage() == 'es' ){?>Consejo de Comercial Romera<?php }else { ?><?php } ?>" class="consejo_img" />
	<header><h3>Nuestro consejo</h3>
    <!-- *********************  FIN ESTRUCTURA GLOBAL ***************************** -->
    <!-- // Elige en que pagina aparece >>>>> PAGINA DE INICIO (HOME) ************* -->
    <?php if ( is_front_page() || is_404() || is_search() ) { ?>
    	<h4>Estamos aqu&iacute; para ayudarte</h4></header>
    	<article>
        <p>Te ofrecemos nuestra experiencia profesional para que encuentres las soluciones que necesitas para tu casa.</p>
        <p>Recuerda que puedes estar en contacto con nosotros en la <a href="<?php echo get_bloginfo('url') . ('/') . qtrans_getLanguage() . '/contacto/' ; ?>" target="_self">SECCI&Oacute;N DE CONTACTO</a> o en nuestra <a href="https://www.facebook.com/ComercialRomera" target="_blank">P&Aacute;GINA DE FACEBOOK.</a></p>
    <!-- // Elige en que pagina aparece >>>>> PAGINA DE CORTINAS ************* -->
    <?php } elseif ( is_page(8) ) {?>
    	<h4>Elegir las cortinas ideales para tu hogar</h4></header>
    	<article>
        <p>Las <b>cortinas</b> son un elemento decorativo muy importante de tu casa, vistiendo los espacios e imprimiendo un carácter propio.</p>
        <p>No debemos olvidar tampoco la funcionalidad de las cortinas: son las encargadas de filtrar la luz exterior y a la vez dar intimidad a la vivienda, por lo que son una herramienta fundamental para <b>configurar la atmósfera doméstica</b>.</p>
    <!-- // Elige en que pagina aparece >>>>> PAGINA DE CORTINAS -> MARCAS ************* -->
    <?php } elseif ( is_page(20) ) {?>
    	<h4>La marca de cortinas que se adapta a ti</h4></header>
    	<article>
        <p>Cada fabricante ofrece una amplia gama de colecciones, estilos y sistemas de cortinas.</p>
        <p>Podemos aconsejarte entre todo su catálogo para que encuentres la <b>cortina</b> perfecta: adaptada a tu gusto y a las particularidades arquitectónicas de tu hogar.</p>
	<!-- // Elige en que pagina aparece >>>>> PAGINA DE CORTINAS -> SISTEMAS ************* -->
    <?php } elseif ( is_page(23) ) {?>
    	<h4>El sistema de cortina ideal para tu hogar</h4></header>
    	<article>
        <p>A la hora de elegir un sistema de cortinas debemos tener en cuenta varios factores: la configuración arquitectónica de tu hogar, las horas de Sol directo que recibe y cantidad de luz que queremos filtrar, y muy especialmente el estilo decorativo que estás buscando.</p>
	<!-- // Elige en que pagina aparece >>>>> PAGINA DE TOLDOS ************* -->
    <?php } elseif ( is_page(10) ) {?>
    	<h4>Elegir un toldo para tu vivienda o negocio</h4></header>
    	<article>
        <p>Dispones de infinidad de soluciones y acabados.</p>
        <p>Una correcta elección te asegura un control eficaz de la luz solar en tus espacios exteriores y una integración acorde con las características arquitectónicas del lugar.</p>
	<!-- // Elige en que pagina aparece >>>>> PAGINA DE TOLDOS -> SISTEMAS ************* -->
    <?php } elseif ( is_page(45) ) {?>
    	<h4>El sistema perfecto: bienestar lumínico y belleza</h4></header>
    	<article>
        <p>Cada sistema de Toldos está especialmente desarrollado para ser instalado con una configuración arquitectónica concreta.</p>
        <p>Otros factores importantes serán la superficie de sombra deseada y la orientación respecto al Sol.</p>
	<!-- // Elige en que pagina aparece >>>>> PAGINA DE TOLDOS -> ACCESORIOS ************* -->
    <?php } elseif ( is_page(47) ) {?>
    	<h4>Los automatismos para toldos proporcionan un plus</h4></header>
    	<article>
        <p>Añaden confort, alargan la vida útil de nuestro sistema y permiten optimizar el uso energético gracias a su respuesta automática frente a los cambios atmosféricos.</p>
        <p>En el sector de la hostlería, estos accesorios se han convertido en piezas elementales para mejorar el uso de las terrazas y alargar la temporada de uso.</p>
    <!-- // Elige en que pagina aparece >>>>> PAGINA DE DESCANSO ************* -->
    <?php } elseif ( is_page(12) ) {?>
    	<h4>Un equipo de descanso adecuado es salud y calidad de vida</h4></header>
    	<article>
        <p>Solemos pasar un tercio de nuestras vidas descansando, por lo que gozar de un sueño reparador condiciona nuestro estado físico y anímico.</p>
        <p>Un equipo de descanso adecuado es aquél que se adapta a las características de nuestro cuerpo, nuestras costumbres a la hora de dormir y necesidades en cuánto a firmeza y tacto.</p>
    <!-- // Elige en que pagina aparece >>>>> PAGINA DE DESCANSO -> COLCHONES ************* -->
	<?php } elseif ( is_page(25) ) {?>
    	<h4>¿Qué colchón es el que más te conviene?</h4></header>
    	<article>
        <p>El colchón es el elemento más importante de tu equipo de descanso y determina en gran medida la calidad del sueño.</p>
        <p>Para elegir correctamente tendremos en cuenta su firmeza, la capacidad de transpiración del material y la durabilidad del sistema, con tal de poder disfrutar muchos años de un colchón en óptimo estado para el descanso.</p>
    <!-- // Elige en que pagina aparece >>>>> PAGINA DE DESCANSO -> BASES DE CAMA ************* -->
	<?php } elseif ( is_page(29) ) {?>
    	<h4>Cómo elegir la base perfecta para tu cama</h4></header>
    	<article>
        <p>La base de cama determina, juntamente con el colchón, la firmeza de nuestro equipo de descanso.</p>
        <p>El somier nos permite regular la dureza de la cama y los articulados también nos ofrecen propiedades anatómicas y un descanso individualizado en camas dobles. El canapé aporta una base firme que a su vez nos permite aprovechar mejor el espacio en nuestro hogar, decorándolo con estilo.</p>
    <!-- // Elige en que pagina aparece >>>>> PAGINA DE DESCANSO -> ALMOHADAS ************* -->
	<?php } elseif ( is_page(31) ) {?>
    	<h4>Cómo elegir la almohada perfecta para ti</h4></header>
    	<article>
        <p>En el mercado hay gran variedad de tamaños, formas y materiales de relleno que determinan el tacto, la altura y la firmeza de la almohada.</p>
        <p>Para acertar en nuestra decisión debemos tener en cuenta la postura preferida a la hora de dormir, si nos movemos mucho durmiendo y contemplaremos también posibles alergias y dolencias musculares o óseas.</p>
        <p>Te recomendamos también que pruebes tu almohada antes de comprarla.</p>
	<!-- // Elige en que pagina aparece >>>>> PAGINA DE DESCANSO -> AYUDAS DINÁMICAS ************* -->
	<?php } elseif ( is_page(111) ) {?>
    	<h4>Configurar un equipo ergonómico personalizado</h4></header>
    	<article>
        <p>Los sistemas de <b>ayudas técnicas</b> están desarrollados bajo altos estándares de calidad y ofrecen multitud de soluciones especializadas.</p>
        <p>Por ello es recomendable recibir el <b>consejo de un profesional</b> para configurar adecuadamente un sistema totalmente adaptado a sus necesidades.</p>
	<!-- // Elige en que pagina aparece >>>>> PAGINA DE TEXTIL HOGAR ************* -->
	<?php } elseif ( is_page(14) ) {?>
    	<h4>Renovar el estilo de tu hogar</h4></header>
    	<article>
        <p>Nuevos textiles en tu casa dan un aire fresco a tu hogar de forma fácil y económica.</p>
        <p>Las gamas de colores y las distintas texturas configuran el ambiente de tu casa y le otorgan un aspecto novedoso sin ningún esfuerzo.</p>
	<!-- // Elige en que pagina aparece >>>>> PAGINA DE TEXTIL HOGAR -> CAMA ************* -->
	<?php } elseif ( is_page(33) ) {?>
    	<h4>Renueva tu dormitorio al mejor precio</h4></header>
    	<article>
        <p>Los Textiles de Cama te permiten darle una nueva vida a tu dormitorio, configurando el ambiente que más te gusta para tu habitación: relajante, vibrante, clásico, minimalista...</p>
        <p>Te ofrecemos varias soluciones para que puedas elegir entre distintos estilos, niveles de abrigo, tipos de textil, combinaciones...</p>
	<!-- // Elige en que pagina aparece >>>>> PAGINA DE TEXTIL HOGAR -> BAÑO ************* -->
	<?php } elseif ( is_page(35) ) {?>
    	<h4>Construye un ambiente relajante</h4></header>
    	<article>
        <p>Gracias a una acertada combinación de toallas, albornoces y alfombras de baño podrás disfrutar de una atmósfera agradable que refuerza las capacidades terapéuticas de la higiene diaria.</p>
        <p>Tienes multitud de colecciones para que vistas tu baño siguiendo el estilo de tu hogar.</p>
	<!-- // Elige en que pagina aparece >>>>> PAGINA DE TEXTIL HOGAR -> MESA ************* -->
	<?php } elseif ( is_page(37) ) {?>
    	<h4>Cómo disfrutar más de tus comidas</h4></header>
    	<article>
        <p>Tan importante es comer bien como disfrutar del ritual culinario.</p>
        <p>Cuando preparas tu mesa con gusto y delicadeza logras un ambiente idóneo para charlar y sentirte más cerca de los tuyos. Pruébalo y verás.</p>
	<!-- // Elige en que pagina aparece >>>>> PAGINA DE TEXTIL HOGAR -> SALÓN ************* -->
	<?php } elseif ( is_page(39) ) {?>
    	<h4>Renovar el Salón no es caro</h4></header>
    	<article>
        <p>Dale un aire totalmente renovado a tu salón con nuestros textiles.</p>
        <p>No necesitas cambiar el sofá ni los muebles: hazte con unos foulards, nuevas fundas de cojín y de sofá y conseguirás un ambiente totalmente nuevo.</p>
    <!-- // Elige en que pagina aparece >>>>> Dummy text DEFAULT ************* -->
	<?php } else { ?>
    	<h4>Título del consejo</h4></header>
    	<article>
        <p>Te ofrecemos nuestra experiencia profesional para que encuentres las soluciones que necesitas para tu casa texto del consejo Lorem Ipsum.</p>
    <?php } ?>
	<!-- *********************  CIERRE ESTRUCTURA GLOBAL ***************************** -->
    </article>
    <footer>
    	<h5>Te ayudamos</h5>
        <p>Resolvemos tus dudas en:</p>
        <a href="<?php echo get_bloginfo('url') . ('/') . qtrans_getLanguage() . '/contacto/' ; ?>" target="_self" class="calltoact redbutton"><i class="icon-comment"></i>P&aacute;gina de Contacto</a>
        <a href="https://www.facebook.com/ComercialRomera" target="_blank" class="calltoact bluebutton"><i class="icon-facebook-sign"></i>P&aacute;gina de Facebook</a>
    </footer>
    <div class="clearboth"></div>
</section>