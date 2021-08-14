<?php
/**
 * 
 Template Name: CONTACTO
 Restrict to: admin,super user
 *
 * This Full Width template removes the primary and secondary asides so that content
 * can be displayed the entire width of the #content area.
 * 
 * @package Thematic
 * @subpackage Templates
 */

    // calling the header.php
    get_header('nomain');

    // action hook for placing content above #container
    thematic_abovecontainer();
?>
<!-- Dentro del #wrapper -->
	<!-- Incluimos el carrusel Flexslider a 100% width-->
	<?php include_once(get_stylesheet_directory() . '/snippet-flexslider.php');?>
    <!-- Costura Superior -->
    <span class="breaker brkr_top"><span class="brkr_top_costura"></span></span>
    <!-- Inicio del MAIN -->
    <div id="main_wrap">	
        <!-- Inicio del MAIN -->
        <div class="gray_leather">
        <a name="form_contacto" id="form_contacto"></a>             
        	<div class="wrap_width">
                <article id="form_info">
                	<h2><?php if( qtrans_getLanguage() == 'es' ){?>ESTAMOS A TU SERVICIO<?php }elseif( qtrans_getLanguage() == 'ca' ){?>ESTEM AL TEU SERVEI<?php }else { ?>WE'RE AT YOUR SERVICE<?php } ?></h2>
                    <section class="form_info_info">
                        <h3>
                        <i class="icon-info-sign"></i>&nbsp;
                        <?php if( qtrans_getLanguage() == 'es' ){?>¿Necesitas más información?
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Necessites més informació?
                        <?php }else { ?>¿Necesitas más información?<?php } ?>
                        </h3>
                        <p><em>
                        <?php if( qtrans_getLanguage() == 'es' ){?>Rellena el formulario y nosotros contactaremos contigo para resolver cualquier duda que tengas.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Omple el formulari i nosaltres et contactarem per resoldre qualsevol dubte que tinguis.
                        <?php }else { ?>Omple el formulari i nosaltres et contactarem per resoldre qualsevol dubte que tinguis.<?php } ?>
                        </em></p>
                        <p>
                        <?php if( qtrans_getLanguage() == 'es' ){?>Ofrecemos asesoramiento completo para adaptar DRAG a vuestras necesidades.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Oferim un assessorament complert per adaptar el DRAG a les vostres necessitats.
                        <?php }else { ?>Ofrecemos asesoramiento completo para adaptar DRAG a vuestras necesidades.<?php } ?>
                        </p>
                    </section>
                    <section class="form_info_feedback">
                        <h3>
                        <i class="icon-thumbs-up"></i>&nbsp;
                        <?php if( qtrans_getLanguage() == 'es' ){?>Mejoramos día a día.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Millorem cada dia.
                        <?php }else { ?>Millorem cada dia.<?php } ?>
                        </h3>
                        <p><em>
                        <?php if( qtrans_getLanguage() == 'es' ){?>Las sugerencias y opiniones de los usuarios de DRAG son nuestro valor añadido.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Les suggerències i opinions dels usuaris del DRAG són el nostre valor afegit.
                        <?php }else { ?>Les suggerències i opinions dels usuaris del DRAG són el nostre valor afegit.<?php } ?>
                        </em></p>
                        <p>
                        <?php if( qtrans_getLanguage() == 'es' ){?>Éstas son las personas que nos permiten un DRAG que se actualice de forma periódica y automática para incorporar todas estas mejoras.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>En atenció a totes aquestes persones fem que el DRAG s’actualitzi de forma periòdica i automàtica per incorporar totes aquestes millores.
                        <?php }else { ?>En atenció a totes aquestes persones fem que el DRAG s’actualitzi de forma periòdica i automàtica per incorporar totes aquestes millores.<?php } ?>
                        </p>
                    </section>
                    <section class="form_info_demo">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/mockup_demo-trans-<?php if( qtrans_getLanguage() == 'es' ){?>es<?php }elseif( qtrans_getLanguage() == 'ca' ) { ?>ca<?php }else { ?>es<?php } ?>.png" alt="<?php if( qtrans_getLanguage() == 'es' ){?>Demo Gratuita <?php }elseif( qtrans_getLanguage() == 'ca' ) { ?>Demo Gratuïta <?php }else { ?>Free Demo <?php } ?>" />
                        <h3>
                        <i class="icon-gift"></i>&nbsp;
                        <?php if( qtrans_getLanguage() == 'es' ){?>Demo Gratuita
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Demo Gratuïta
                        <?php }else { ?>Demo Gratuita<?php } ?>
                        </h3>
                        <p><em>
                        <?php if( qtrans_getLanguage() == 'es' ){?>Te invitamos que puedas evaluar DRAG y compruebes su rendimiento.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Et convidem que puguis avaluar el DRAG i constatis el seu rendiment.
                        <?php }else { ?>Te invitamos que puedas evaluar DRAG y compruebes su rendimiento.<?php } ?>
                        </em></p>
                        <p>
                        <?php if( qtrans_getLanguage() == 'es' ){?>Rellena y envíanos este formulario para que te podamos facilitar una versión demo de prueba.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Emplena i envia’ns aquest formulari perquè et poguem facilitar una versió demo de prova.
                        <?php }else { ?>Rellena y envíanos este formulario para que te podamos facilitar una versión demo de prueba.<?php } ?>
                        </p>
                        <div class="clearboth"></div>
                    </section>
                </article>
                <div class="clearboth smallscreens">&nbsp;</div>
                <article id="form_wrap">
                	<!-- Formulario de contacto -->
            		<?php include_once(get_stylesheet_directory() . '/snippet-form-contacto.php');?>
                </article>
				<div class="clearboth">&nbsp;</div>
            </div>
        </div>
        <span class="breaker brkr_center"><span class="brkr_bottom_costura"></span><span class="brkr_top_costura"></span></span>
        <div class="blue_textil">
            <div class="wrap_width">
                <?php include_once(get_stylesheet_directory() . '/snippet-banners.php');?>
                <div class="clearboth">&nbsp;</div>
            </div>
        </div>
        <div class="clearboth">&nbsp;</div>
    </div>
<?php 
    // action hook for placing content below #container
    thematic_belowcontainer();
?>    
	<span class="breaker brkr_bottom"><span class="brkr_bottom_costura"></span></span>
<?php 	
    // calling footer.php
    get_footer('contact');
?>