<?php
/**********************************************************************************************
 * Plantilla de Layout para Fragmento de Pagina
 * Ofrece la caracteristica comercial principal + enlace a CONTRATACION
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
		$qofrec_side_b = 'Conferenciantes de alto nivel';
		$qofrec_side = 'expertos en su temática, a precios asequibles y competitivos.';
		$qofrec_footer = 'Contratación';
		$qlang = 'es/';
	}elseif( qtrans_getLanguage() == 'ca' ){
		$qofrec_header = 'Què li oferim?';
	}else{
		$qofrec_header = 'We offer';
	}
}else{//no qTranslate
	$qofrec_header = '¿Qué le ofrecemos?';
}
?>
<article id="queofrecemos" class="queofrecemos_side">
    <header><h1><?php echo $qofrec_header; ?></h1></header>
    <section>
        <span>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/form_loader1.gif" alt="<?php echo $qofrec_side_b; ?>" />
            <p><em><?php echo $qofrec_side_b; ?></em> <?php echo $qofrec_side; ?></p>
        </span>
    </section>
    <footer>
    	<a href="<?php echo get_bloginfo('url') . ('/') . $qlang . 'contratacion/'; ?>" target="_self" title="<?php echo $qofrec_footer; ?>" class="calltoact primarybutton"><?php echo $qofrec_footer; ?></a>
    </footer>
</article>