<?php
/**********************************************************************************************
 * Plantilla de Layout para Fragmento de Pagina
 * Ofrece las caracteristicas comerciales principales + enlace a CONTRATACION
 * Se llama desde varias paginas y presenta distintos tipos de info segun if
**********************************************************************************************
VERSION 0.1
*********************************************************************************************
TO DO:
*********************************************************************************************/
//
// Variables Idioma ***********************************
if (function_exists('qtrans_getLanguage')){ 
	if( qtrans_getLanguage() == 'es' ){
		$qofrec_header = '¿Qué le ofrecemos?';
		$qofrec_libros_b = 'Ediciones especiales de los libros';
		$qofrec_libros = 'de nuestros conferenciantes para instituciones y empresas.';
		$qofrec_autores_b = 'Grandes autores, grandes expertos';
		$qofrec_autores = 'al servicio de la formación y la excelencia profesional.';
		$qofrec_planificacion_b = 'Planificamos las intervenciones';
		$qofrec_planificacion = 'de autores en su congreso o evento para adaptarnos a sus objetivos y necesidades.';
		$qofrec_asesor_b = 'Le asesoramos sobre los speakers';
		$qofrec_asesor = 'profesionales que mejor se adaptan a sus objetivos.';
		$qofrec_asesorext = 'profesionales que mejor se adaptan a sus objetivos y planificamos las intervenciones de autores en su congreso o evento.';
		$qofrec_team_b = 'Experiencias de Team-Building';
		$qofrec_team = 'para la cohesión de equipos, de la mano de los mejores expertos.';
		$qofrec_footer = 'Contratación';
		$qlang = 'es/';
	}elseif( qtrans_getLanguage() == 'ca' ){
		$qofrec_header = 'Què li oferim?';
		$qofrec_libros_b = 'Edicions especials dels llibres';
		$qofrec_libros = 'dels nostres conferenciants per a institucions i empreses.';
		$qofrec_autores_b = 'Grans autors, grans experts';
		$qofrec_autores = 'al servei de la formació i l\'excelència professional.';
		$qofrec_planificacion_b = 'Planifiquem les intervencions';
		$qofrec_planificacion = 'd\'autors en el seu congrés o event per adaptar-nos als seus objectius i necessitats.';
		$qofrec_asesor_b = 'L\'assessorem sobre els speakers';
		$qofrec_asesor = 'professionals que millor s\'adapten als seus objectius.';
		$qofrec_asesorext = 'professionals que millor s\'adapten als seus objectius i panifiquem les intervencions d\'autors en el seu congrés o event.';
		$qofrec_team_b = 'Experiències en Team-Building';
		$qofrec_team = 'per a la cohesió d\'equips, de la ma dels millors experts.';
		$qlang = 'ca/';
	}else{
		$qofrec_header = 'We offer';
		$qofrec_libros_b = 'Edicions especials dels llibres';
		$qofrec_libros = 'dels nostres conferenciants per a institucions i empreses.';
		$qofrec_autores_b = 'Grans autors, grans experts';
		$qofrec_autores = 'al servei de la formació i l\'excelència professional.';
		$qofrec_planificacion_b = 'Planifiquem les intervencions';
		$qofrec_planificacion = 'd\'autors en el seu congrés o event per adaptar-nos als seus objectius i necessitats.';
		$qofrec_asesor_b = 'L\'assessorem sobre els speakers';
		$qofrec_asesor = 'professionals que millor s\'adapten als seus objectius.';
		$qofrec_asesorext = 'professionals que millor s\'adapten als seus objectius i panifiquem les intervencions d\'autors en el seu congrés o event.';
		$qofrec_team_b = 'Experiències en Team-Building';
		$qofrec_team = 'per a la cohesió d\'equips, de la ma dels millors experts.';
		$qlang = 'en/';
	}
}else{//no qTranslate
	$qofrec_header = '¿Qué le ofrecemos?';
	$qofrec_libros_b = 'Ediciones especiales de los libros';
	$qofrec_libros = 'de nuestros conferenciantes para instituciones y empresas.';
	$qofrec_autores_b = 'Grandes autores, grandes expertos';
	$qofrec_autores = 'al servicio de la formación y la excelencia profesional.';
	$qofrec_planificacion_b = 'Planificamos las intervenciones';
	$qofrec_planificacion = 'de autores en su congreso o evento para adaptarnos a sus objetivos y necesidades.';
	$qofrec_asesor_b = 'Le asesoramos sobre los speakers';
	$qofrec_asesor = 'profesionales que mejor se adaptan a sus objetivos.';
	$qofrec_asesorext = 'profesionales que mejor se adaptan a sus objetivos y planificamos las intervenciones de autores en su congreso o evento.';
	$qofrec_team_b = 'Experiencias de Team-Building';
	$qofrec_team = 'para la cohesión de equipos, de la mano de los mejores expertos.';
	$qofrec_footer = 'Contratación';
	$qlang = '';
}
?>
<article id="queofrecemos">
    <header><h1><?php echo $qofrec_header; ?></h1></header>
    <section>
    	<ul>
            <li id="queofrecemos_libros">
                <span>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/queofrecemos_libros.png" alt="<?php echo $qofrec_libros_b; ?>" />
                    <p><em><?php echo $qofrec_libros_b; ?></em> <?php echo $qofrec_libros; ?></p>
                </span>
            </li>
<?php 
// PÀGINA D'INICI *******************************
// FRONT PAGE ***************** (ID = 5)
if (is_front_page() || is_page(11)) {
?>
			<li id="queofrecemos_autores" class="queofrecemos_front">
                <span>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/queofrecemos_autores.png" alt="<?php echo $qofrec_autores_b; ?>" />
                    <p><em><?php echo $qofrec_autores_b; ?></em> <?php echo $qofrec_autores; ?></p>
                </span>
            </li>
            <li id="queofrecemos_planificacion">
                <span>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/queofrecemos_planificacion.png" alt="<?php echo $qofrec_planificacion_b; ?>" />
                    <p><em><?php echo $qofrec_planificacion_b; ?></em> <?php echo $qofrec_planificacion; ?></p>
                </span>
            </li>
            <li id="queofrecemos_asesor" class="queofrecemos_front">
                <span>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/queofrecemos_asesor.png" alt="<?php echo $qofrec_asesor_b; ?>" />
                    <p><em><?php echo $qofrec_asesor_b; ?></em> <?php echo $qofrec_asesor; ?></p>
                </span>
            </li>
<?php }else{ ?>
			<li id="queofrecemos_asesor">
                <span>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/queofrecemos_asesor.png" alt="<?php echo $qofrec_asesor_b; ?>" />
                    <p><em><?php echo $qofrec_asesor_b; ?></em> <?php echo $qofrec_asesorext; ?></p>
                </span>
            </li>
<?php } ?>
            <li id="queofrecemos_team">
                <span>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/queofrecemos_team.png" alt="<?php echo $qofrec_team_b; ?>" />
                    <p><em><?php echo $qofrec_team_b; ?></em> <?php echo $qofrec_team; ?></p>
                </span>
            </li>
        </ul>
    </section>
    <footer>
		<?php if (!is_page(11)) { ?>
		<a href="<?php echo get_bloginfo('url') . ('/') . $qlang . 'contratacion/'; ?>" target="_self" title="<?php echo $qofrec_footer; ?>" class="calltoact button button-big animated"><?php echo $qofrec_footer; ?></a>
		<?php }else{ ?>
		&nbsp;
		<?php } ?>
    </footer>
</article>