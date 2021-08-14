<?php
/**

// CONTENIDO DE LAS PÁGINAS BASE
// Llama a los snippets secundarios según la categoría

IDs de Páginas
--------------
INICIO -> 4

ESTUDIO -> 8

PROYECTOS -> 10

SERVICIOS -> 12

CONTACTO -> 17 

*/
?>
<?php
/* SECCIÓN DE ESTUDIO */
if ( is_page(8) ) {
	include_once(get_stylesheet_directory() . '/contenido-estudio.php');
/* SECCIÓN DE PROYECTOS */
}elseif ( is_page(10) ) { 
	include_once(get_stylesheet_directory() . '/contenido-proyectos.php');
/* SECCIÓN DE SERVICIOS */
}elseif ( is_page(12) ) { 
	include_once(get_stylesheet_directory() . '/contenido-servicios.php');
}?>