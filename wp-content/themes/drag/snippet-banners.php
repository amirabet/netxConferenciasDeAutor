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
<!-- *********************  BANNERS ***************************** -->

<?php if ( is_front_page() || is_home() ||  is_page() &&!(is_page(array(7,13))) || is_single() || is_404() || is_search() || is_archive() ) {?>
<!-- DRAG STANDARD******************************************** -->
    <section class="banner_wrap box col2b">
        <a href="<?php echo get_bloginfo('url') . ('/') . qtrans_getLanguage() . '/drag-policia-local/' ; ?>" class="banner" target="_self" title="<?php if( qtrans_getLanguage() == 'es' ){?>DRAG Dispositivo de Recursos para Agentes<?php }elseif( qtrans_getLanguage() == 'ca' ){?>Dispositiu de Recursos per Agents<?php }else { ?>DRAG<?php } ?>">
            <span class="mockup">
            	<span class="mockup_wrapper">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/mockup_drag.png" class="mockup_base" alt="<?php if( qtrans_getLanguage() == 'es' ){?>DRAG Dispositivo de Recursos para Agentes<?php }elseif( qtrans_getLanguage() == 'ca' ){?>Dispositiu de Recursos per Agents<?php }else { ?>DRAG<?php } ?>" />
                    <span class="mockup_screen mockup_banner"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/mockup_drag_screen_banner.jpg" alt="<?php if( qtrans_getLanguage() == 'es' ){?>DRAG Dispositivo de Recursos para Agentes<?php }elseif( qtrans_getLanguage() == 'ca' ){?>DRAG Dispositiu de Recursos per Agents<?php }else { ?>DRAG<?php } ?>" /></span>
            	</span>
            </span>
            <!-- TITULAR -->
            <span class="banner_h6">
            <?php if( qtrans_getLanguage() == 'es' ){?><em>DRAG - Dispositivo de Recursos para Agentes</em> Soluciona la gestión informática de tu policía local de forma eficiente, ágil y cómoda.
            <?php }elseif( qtrans_getLanguage() == 'ca' ){?><em>DRAG - Dispositiu de Recursos per Agents</em> Soluciona la gestió informàtica de la teva policia local de forma eficient, àgil i còmode.
            <?php }else { ?><em>DRAG - Dispositivo de Recursos para Agentes</em> Soluciona la gestión informática de tu policía local de forma eficiente, ágil y cómoda.
            <?php } ?>
            </span>
            <!-- CARACT -->
            <span class="banner_p">
            <?php if( qtrans_getLanguage() == 'es' ){?><i class="icon-angle-right"></i> SENCILLO Y FUNCIONAL
            <?php }elseif( qtrans_getLanguage() == 'ca' ){?><i class="icon-angle-right"></i> SENZILL I FUNCIONAL
            <?php }else { ?><i class="icon-angle-right"></i> SENZILL I FUNCIONAL
            <?php } ?>
            </span>
            <span class="banner_p">
            <?php if( qtrans_getLanguage() == 'es' ){?><i class="icon-angle-right"></i> CUOTA FIJA SIN SORPRESAS
            <?php }elseif( qtrans_getLanguage() == 'ca' ){?><i class="icon-angle-right"></i> QUOTA FIXA SENSE SORPRESES
            <?php }else { ?><i class="icon-angle-right"></i> SENZILL I FUNCIONAL
            <?php } ?>
            </span>
            <span class="banner_p">
            <?php if( qtrans_getLanguage() == 'es' ){?><i class="icon-angle-right"></i> ESTRUCTURA MODULAR AMPLIABLE
            <?php }elseif( qtrans_getLanguage() == 'ca' ){?><i class="icon-angle-right"></i> ESTRUCTURA MODULAR AMPLIABLE
            <?php }else { ?><i class="icon-angle-right"></i> ESTRUCTURA MODULAR AMPLIABLE
            <?php } ?>
            </span>
            <span class="banner_p">
            <?php if( qtrans_getLanguage() == 'es' ){?><i class="icon-angle-right"></i> SERVICIO DE ATENCIÓN POSTVENTA
            <?php }elseif( qtrans_getLanguage() == 'ca' ){?><i class="icon-angle-right"></i> SERVEI D’ATENCIÓ POSTVENDA
            <?php }else { ?><i class="icon-angle-right"></i> SERVICIO DE ATENCIÓN POSTVENTA
            <?php } ?>
            </span>
            <!-- CALLtoACT -->
            <span class="banner_a">
            <?php if( qtrans_getLanguage() == 'es' ){?>DESCUBRE SUS VENTAJAS <i class="icon-chevron-right"></i>
            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>DESCOBRIU ELS SEUS AVANTATGES <i class="icon-chevron-right"></i>
            <?php }else { ?>DESCUBRE SUS VENTAJAS <i class="icon-chevron-right"></i>
            <?php } ?>
            </span>
        </a>
    </section>
<?php } ?>
<?php if ( is_front_page() || is_home() ||  is_page() &&!(is_page(array(9,13))) || is_single() || is_404() || is_search() || is_archive() ) {?>
<!-- DRAGDROID ******************************************** -->
    <section class="banner_wrap box col2b">
        <a href="<?php echo get_bloginfo('url') . ('/') . qtrans_getLanguage() . '/dragdroid-app-policia-local/' ; ?>" class="banner" target="_self" title="<?php if( qtrans_getLanguage() == 'es' ){?>DRAGDroid Android App<?php }elseif( qtrans_getLanguage() == 'ca' ){?>DRAGDroid Android App<?php }else { ?>DRAGDroid Android App<?php } ?>">
            <span class="mockup">
            	<span class="mockup_wrapper">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/mockup_dragdroid.png" alt="DRAG Droid Android App" class="mockup_base" />
            	</span>
            </span>
            <!-- TITULAR -->
            <span class="banner_h6">
            <?php if( qtrans_getLanguage() == 'es' ){?><em>DRAGDroid </em> es una aplicación para terminales móviles (teléfonos o tabletas) que conectan con el programa DRAG instalado en jefatura.
            <?php }elseif( qtrans_getLanguage() == 'ca' ){?><em>DRAGDroid </em> és la nostra aplicació per a terminals mòbils (telèfons o tablets) que connecten amb el programa DRAG instal·lat a la prefectura.
            <?php }else { ?><em>DRAGDroid </em> és la nostra aplicació per a terminals mòbils (telèfons o tablets) que connecten amb el programa DRAG instal·lat a la prefectura.
            <?php } ?>
            </span>
            <!-- CARACT -->
            <span class="banner_p">
            <?php if( qtrans_getLanguage() == 'es' ){?><i class="icon-angle-right"></i> GESTIÓN INTEGRADA
            <?php }elseif( qtrans_getLanguage() == 'ca' ){?><i class="icon-angle-right"></i> GESTIÓ INTEGRADA
            <?php }else { ?><i class="icon-angle-right"></i> GESTIÓN INTEGRADA
            <?php } ?>
            </span>
            <span class="banner_p">
            <?php if( qtrans_getLanguage() == 'es' ){?><i class="icon-angle-right"></i> INFORMACIÓN EN TIEMPO REAL
            <?php }elseif( qtrans_getLanguage() == 'ca' ){?><i class="icon-angle-right"></i> INFORMACIÓ EN TEMPS REAL
            <?php }else { ?><i class="icon-angle-right"></i> INFORMACIÓN EN TIEMPO REAL
            <?php } ?>
            </span>
            <span class="banner_p">
            <?php if( qtrans_getLanguage() == 'es' ){?><i class="icon-angle-right"></i> PERFIL INDIVIDUALIZADO <br /><br />
            <?php }elseif( qtrans_getLanguage() == 'ca' ){?><i class="icon-angle-right"></i> PERFIL INDIVIDUALITZAT <br /><br />
            <?php }else { ?><i class="icon-angle-right"></i> PERFIL INDIVIDUALIZADO <br /><br />
            <?php } ?>
            </span>
            <!-- CALLtoACT -->
            <span class="banner_a">
            <?php if( qtrans_getLanguage() == 'es' ){?>CONOCE NUESTRA APP <i class="icon-chevron-right"></i>
            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>CONEGUEU LA NOSTRA APP <i class="icon-chevron-right"></i>
            <?php }else { ?>CONEGUEU LA NOSTRA APP <i class="icon-chevron-right"></i>
            <?php } ?>
            </span>
        </a>
    </section>
<?php } ?>
<?php if ( is_page(7) ) {?>
<!-- DRAG EXPRESS ******************************************** -->
    <section class="banner_wrap box col2b">
        <a href="<?php echo get_bloginfo('url') . ('/') . qtrans_getLanguage() . '/contacte/#form_contacto' ; ?>" class="banner" target="_self" title="<?php if( qtrans_getLanguage() == 'es' ){?>DRAG - Página de Contacto<?php }elseif( qtrans_getLanguage() == 'ca' ){?>DRAG - Pàgina de Contacte<?php }else { ?>DRAG - Contact Page<?php } ?>">
            <span class="mockup">
            	<span class="mockup_wrapper">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/mockup_drag.png" class="mockup_base" alt="<?php if( qtrans_getLanguage() == 'es' ){?>DRAG Dispositivo de Recursos para Agentes<?php }elseif( qtrans_getLanguage() == 'ca' ){?>Dispositiu de Recursos per Agents<?php }else { ?>DRAG<?php } ?>" />
                    <span class="mockup_screen mockup_banner"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/mockup_drag_screen_xpress.jpg" alt="<?php if( qtrans_getLanguage() == 'es' ){?>DRAG Express<?php }elseif( qtrans_getLanguage() == 'ca' ){?>DRAG Express<?php }else { ?>DRAG Express<?php } ?>" /></span>
            	</span>
            </span>
            <!-- TITULAR -->
            <span class="banner_h6">
            <?php if( qtrans_getLanguage() == 'es' ){?><em>DRAGExpress </em> Una versión simplificada y optimizada de DRAG para otros cuerpos de emergencias:
            <?php }elseif( qtrans_getLanguage() == 'ca' ){?><em>DRAG Express </em> Una versió simplificada i optimitzada del DRAG per a altres cossos d’emergències:
            <?php }else { ?><em>DRAGExpress </em> Una versión simplificada y optimizada de DRAG para otros cuerpos de emergencias:
            <?php } ?>
            </span>
            <!-- CARACT -->
            <span class="banner_p">
            <?php if( qtrans_getLanguage() == 'es' ){?><i class="icon-angle-right"></i> BOMBEROS
            <?php }elseif( qtrans_getLanguage() == 'ca' ){?><i class="icon-angle-right"></i> BOMBERS
            <?php }else { ?><i class="icon-angle-right"></i> BOMBEROS
            <?php } ?>
            </span>
            <span class="banner_p">
            <?php if( qtrans_getLanguage() == 'es' ){?><i class="icon-angle-right"></i> PROTECCIÓN CIVIL
            <?php }elseif( qtrans_getLanguage() == 'ca' ){?><i class="icon-angle-right"></i> PROTECCIÓ CIVIL
            <?php }else { ?><i class="icon-angle-right"></i> PROTECCIÓN CIVIL
            <?php } ?>
            </span>
            <span class="banner_p">
            <?php if( qtrans_getLanguage() == 'es' ){?><i class="icon-angle-right"></i> DEFENSA FORESTAL
            <?php }elseif( qtrans_getLanguage() == 'ca' ){?><i class="icon-angle-right"></i> DEFENSA FORESTAL
            <?php }else { ?><i class="icon-angle-right"></i> DEFENSA FORESTAL
            <?php } ?>
            </span>
            <span class="banner_p">
            <?php if( qtrans_getLanguage() == 'es' ){?><i class="icon-angle-right"></i> LICENCIA DE UTILIZACIÓN DRAGDROID
            <?php }elseif( qtrans_getLanguage() == 'ca' ){?><i class="icon-angle-right"></i> LICÈNCIA D’UTILITZACIÓ DRAGDROID
            <?php }else { ?><i class="icon-angle-right"></i> LICENCIA DE UTILIZACIÓN DRAGDROID
            <?php } ?>
            </span>
            <!-- CALLtoACT -->
            <span class="banner_a">
            <?php if( qtrans_getLanguage() == 'es' ){?>SOLICITA MÁS INFORMACIÓN <i class="icon-chevron-right"></i>
            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>SOL·LICITA MÉS INFORMACIÓ <i class="icon-chevron-right"></i>
            <?php }else { ?>SOLICITA MÁS INFORMACIÓN <i class="icon-chevron-right"></i>
            <?php } ?>
            </span>
        </a>
    </section>
<?php } ?>
<?php if ( is_page(9) ){?>
<!-- DRAGDROID PlayStore******************************************** -->
    <section class="banner_wrap box col2b">
        <a href="https://play.google.com/store/apps/details?id=com.dragsl.dragdroid&hl=<?php if( qtrans_getLanguage() == 'es' ){?>es<?php }elseif( qtrans_getLanguage() == 'ca' ){?>ca<?php }else { ?>en<?php } ?>" class="banner" target="_blank" title="<?php if( qtrans_getLanguage() == 'es' ){?>DRAGDroid Play Store<?php }elseif( qtrans_getLanguage() == 'ca' ){?>DRAGDroid Play Store<?php }else { ?>DRAGDroid Play Store<?php } ?>">
            <span class="mockup">
            	<span class="mockup_wrapper">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/mockup_dragdroid.png" alt="DRAG Droid Android App" class="mockup_base" />
            	</span>
            </span>
            <!-- TITULAR -->
            <span class="banner_h6">
            <?php if( qtrans_getLanguage() == 'es' ){?><em>Descárgate la aplicación DRAGDroid</em> de forma totalmente gratuita desde Play Store.
            <?php }elseif( qtrans_getLanguage() == 'ca' ){?><em>Descarrega’t l’aplicació DRAGDroid</em> de forma totalment gratuïta des del Play Store.
            <?php }else { ?><em>Descarrega’t l’aplicació DRAGDroid</em> de forma totalment gratuïta des del Play Store.
            <?php } ?>
            </span>
            <!-- CARACT -->
            <span class="banner_img">
            <?php if( qtrans_getLanguage() == 'es' ){?><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/gplay_es.png" alt="DRAG Droid Play Store" />
            <?php }elseif( qtrans_getLanguage() == 'ca' ){?><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/gplay_ca.png" alt="DRAG Droid Play Store" />
            <?php }else { ?><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/gplay_en.png" alt="DRAG Droid Play Store" />
            <?php } ?>
            </span>
        </a>
    </section>
<?php } ?>
<?php if ( is_page(13) ){?>
<!-- DRAG en Facebook******************************************** -->
    <section class="banner_wrap box col2b">
        <a href="http://www.facebook.com/drag.policia.local" class="banner banner_socialmedia fb_loader" target="_blank" title="<?php if( qtrans_getLanguage() == 'es' ){?>DRAG @ facebook<?php }elseif( qtrans_getLanguage() == 'ca' ){?>DRAG @ facebook<?php }else { ?>DRAG @ facebook<?php } ?>">
            <span class="mockup">
            	<span class="mockup_wrapper">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/mockup_socialmedia_fb.png" alt="DRAG @ facebook" class="mockup_base" />
            	</span>
            </span>
            <!-- TITULAR -->
            <span class="banner_h6">
            <?php if( qtrans_getLanguage() == 'es' ){?><em class="social_titl">DRAG en Facebook</em>
            <?php }elseif( qtrans_getLanguage() == 'ca' ){?><em class="social_titl">DRAG al Facebook</em>
            <?php }else { ?><em class="social_titl">DRAG Facebook Page</em>
            <?php } ?>
            </span>
            <!-- TEXTO -->
            <span class="banner_p"><i class="icon-facebook-sign"></i>&nbsp;&nbsp;facebook.com/ <span class="nowrap">drag.policia.local</span>
            <!-- CALL TO ACT -->
            <span class="banner_calltoact"><i class="icon-chevron-sign-down"></i></span>
            <span class="clearboth"></span>
        </a>
        <span id="loader_fb" class="loader_js"></span>
    </section>
<!-- DRAG en Twitter******************************************** -->
    <section class="banner_wrap box col2b">
        <a href="http://www.twitter.com/dragdroid" class="banner banner_socialmedia tw_loader" target="_blank" title="<?php if( qtrans_getLanguage() == 'es' ){?>DRAG @ Twitter<?php }elseif( qtrans_getLanguage() == 'ca' ){?>DRAG @ Twitter<?php }else { ?>DRAG @ Twitter<?php } ?>">
            <span class="mockup">
            	<span class="mockup_wrapper">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/mockup_socialmedia_tw.png" alt="DRAG @ Twitter" class="mockup_base" />
            	</span>
            </span>
            <!-- TITULAR -->
            <span class="banner_h6">
            <?php if( qtrans_getLanguage() == 'es' ){?><em class="social_titl">DRAG en Twitter</em>
            <?php }elseif( qtrans_getLanguage() == 'ca' ){?><em class="social_titl">DRAG al Twitter</em>
            <?php }else { ?><em class="social_titl">DRAG at Twitter</em>
            <?php } ?>
            </span>
            <!-- TEXTO -->
            <span class="banner_p"><i class="icon-twitter-sign"></i>&nbsp;&nbsp;@dragdroid
            <!-- CALL TO ACT -->
            <span class="banner_calltoact"><i class="icon-chevron-sign-down"></i></span>
            <span class="clearboth"></span>
        </a>
        <span id="loader_tw" class="loader_js"></span>
    </section>
<?php } ?>
<div class="clearboth wrap_width">&nbsp;</div>