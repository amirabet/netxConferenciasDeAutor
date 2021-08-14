<?php
/**
 * Error 404 Page Template
 *
 * Displays a "Not Found" message and a search form when a 404 Error is encountered.
 *
 * @package Thematic
 * @subpackage Templates
 *
 * @link http://codex.wordpress.org/Creating_an_Error_404_Page Codex: Create a 404 Page
 */

	// calling the header-nomain.php > no tiene apertura del main para poner antes el slider a 100%width
    get_header('nomain');
	
	// action hook for placing content above #container
	thematic_abovecontainer();
?>
<!-- Dentro del #wrapper -->
	<!-- Incluimos el carrusel Flexslider a 100% width-->
	<?php include_once(get_stylesheet_directory() . '/snippet-flexslider.php');?>
    <!-- Costura Superior -->
    <span class="breaker brkr_top"><span class="brkr_top_costura"></span></span>
    <!-- Main Full + contenidos -->
    <div id="main_wrap">
    	<div class="gray_leather">
            <article class="wrap_width">
            <!-- Inicio del MAIN -->
            	<h2>
					<?php if( qtrans_getLanguage() == 'es' ){ ?>No encontramos la página que buscas.
                    <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>No trobem la pàgina que busques.
                    <?php }elseif( qtrans_getLanguage() == 'en' ){ ?>Page not found.
                    <?php } ?>
                </h2>
                <header id="form_info" class="header404">
                    <!-- <p>Tal vez te interese alguna de las páginas del menú que tienes a continuación.</p> -->
                    <p><em>
						<?php if( qtrans_getLanguage() == 'es' ){ ?>Puedes realizar una búsqueda, consultar alguna de las noticias o visitar una de les páginas de nuestros productos.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>Pots realizar una cerca, consultar alguna de les notícies o visitar una de les la pàgines dels nostres productes.
                        <?php }elseif( qtrans_getLanguage() == 'en' ){ ?>You can make a search, view some news or visit one of our product's page.
                        <?php } ?>
                    </em></p>
                </header>
                <section id="form_wrap" class="header404"><div class="search_f msg"><?php thematic_search_form();?><div class="clearboth">&nbsp;</div></div></section>
                <div class="clearboth"></div>
            </article>
        </div>
        <div class="clearboth"></div>
        <div class="blue_textil blue_textil2">
        	<span class="breaker2"></span>
            	<?php include_once(get_stylesheet_directory() . '/snippet-lastnews.php');?>
            <div class="wrap_width">
                <?php include_once(get_stylesheet_directory() . '/snippet-banners.php');?>
                <div class="clearboth">&nbsp;</div>
            </div>
        </div>
        <div class="clearboth wrap_width">&nbsp;</div>
    </div>
    <span class="breaker brkr_bottom"><span class="brkr_bottom_costura"></span></span>
    <!-- /#mainwrap -->	
    
<?php
	// action hook for placing content below #container
	thematic_belowcontainer();

	// calling footer.php
	get_footer();
?>