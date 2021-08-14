<?php
/**
 * Footer Template
 *
 * This template closes #main div and displays the #footer div.
 * 
 * Thematic Action Hooks: thematic_abovefooter thematic_belowfooter thematic_after
 * Thematic Filters: thematic_close_wrapper can be used to remove the closing of the #wrapper div
 * 
 * @package Thematic
 * @subpackage Templates
 */
?>
		<?php // action hook for placing content above the closing of the #main div
			thematic_abovemainclose();
		?>
    	
    	<?php
			// action hook for placing content above the footer
			thematic_abovefooter();
			include_once(get_stylesheet_directory() . '/snippet-warnings.php');
			
			// Filter provided for altering output of the footer opening element
    		echo ( apply_filters( 'thematic_open_footer', '<div id="footer">' ) );
    	?>	
        	
         <div class="wrap_width">
            <ul id="footer_ul">
                <li class="foot_li1">
                	<h5><?php if( qtrans_getLanguage() == 'es' ){?>Vías de Contacto <?php }elseif( qtrans_getLanguage() == 'ca' ) { ?>Vies de Contacte <?php }else { ?>Contact Ways <?php } ?></h5>
                    <p><i class="icon-envelope-alt pull-left"></i><b><?php if( qtrans_getLanguage() == 'es' ){?>Correo Electrónico<?php }elseif( qtrans_getLanguage() == 'ca' ) { ?>Correu Electrònic<?php }else { ?>e-Mail<?php } ?></b> <br />info<span>&nbsp;</span>&#64;<span>&nbsp;</span>drag.<?php if( qtrans_getLanguage() == 'es' ){?>es<?php }elseif( qtrans_getLanguage() == 'ca' ) { ?>cat<?php }else { ?>es<?php } ?></p>
                    <p><i class="icon-phone pull-left"></i><b><?php if( qtrans_getLanguage() == 'es' ){?>Teléfono<?php }elseif( qtrans_getLanguage() == 'ca' ) { ?>Telèfon<?php }else { ?>Phone<?php } ?></b> <br />931 145 837</p>
                    <p><a href="<?php echo get_bloginfo('url') . ('/') . qtrans_getLanguage() . '/contacte/' ; ?>" target="_self" title="<?php if( qtrans_getLanguage() == 'es' ){?>Página de Contacto <?php }elseif( qtrans_getLanguage() == 'ca' ) { ?>Pàgina de Contacte <?php }else { ?>Contact Page <?php } ?>" class="msg"><i class="icon-file-alt"></i>&nbsp;<b><?php if( qtrans_getLanguage() == 'es' ){?>Página de <br />Contacto <?php }elseif( qtrans_getLanguage() == 'ca' ) { ?>Pàgina de <br />Contacte<?php }else { ?>Contact Page<?php } ?></b></a></p>
                </li>
                <li class="foot_li2">
                	<h5><?php if( qtrans_getLanguage() == 'es' ){?>¿Necesitas más Información? <?php }elseif( qtrans_getLanguage() == 'ca' ) { ?>Necessites més Informació? <?php }else { ?>Need more information? <?php } ?></h5>
					<p class="sub_h"><?php if( qtrans_getLanguage() == 'es' ){?>Nosotros contactamos contigo. <?php }elseif( qtrans_getLanguage() == 'ca' ) { ?>Nosaltres contactem amb tú. <?php }else { ?>We call you back. <?php } ?></p>
					<?php include_once(get_stylesheet_directory() . '/snippet-form-footer.php');?>
                </li>
                <li class="foot_li3">
                	<h5><?php if( qtrans_getLanguage() == 'es' ){?>SERVICIO TÉCNICO ONLINE <?php }elseif( qtrans_getLanguage() == 'ca' ) { ?>SERVIEI TÈCNIC ONLINE <?php }else { ?>ONLINE SUPPORT<?php } ?></h5>
                    <p class="sub_h"><?php if( qtrans_getLanguage() == 'es' ){?>Soporte al instante.<?php }elseif( qtrans_getLanguage() == 'ca' ) { ?>Suport instantani.<?php }else { ?>Fast troubleshooting<?php } ?></p>
                    <!-- ISL Pronto -->
                        <a id="islpronto_link" href="mailto:alexandre.fillat@drag.es">
                        	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/<?php if( qtrans_getLanguage() == 'es' ){?>es<?php }elseif( qtrans_getLanguage() == 'ca' ) { ?>ca<?php }else { ?>en<?php } ?>/islpronto-message.jpg" id="islpronto_image" border="0" alt="<?php if( qtrans_getLanguage() == 'es' ){?>Chat OnLine<?php }elseif( qtrans_getLanguage() == 'ca' ) { ?>Xat OnLine<?php }else { ?>OnLine Chat<?php } ?>" />
                        </a>
                    <!-- script al footer -->
                    <!-- ISL Pronto -->
                    <h6><?php if( qtrans_getLanguage() == 'es' ){?>También estamos en<?php }elseif( qtrans_getLanguage() == 'ca' ) { ?>També ens trobareu a <?php }else { ?>You can reach us at <?php } ?></h6>
                    <p><i class="icon-facebook-sign pull-left"></i><a href="http://www.facebook.com/drag.policia.local" target="_blank" title="DRAG @ facebook"> facebook.com/ <span class="nowrap">drag.policia.local <i class="icon-angle-right"></i></span></a></p>
                    <p><i class="icon-twitter-sign pull-left"></i><a href="https://twitter.com/dragdroid" target="_blank" title="DRAG @ Twitter"> Twitter @DRAGDROID <i class="icon-angle-right"></i></a></p>
                    <p><i class="icon-google-plus-sign pull-left"></i><a href="https://plus.google.com/u/0/116959801615366824799/about?hl=<?php if( qtrans_getLanguage() == 'es' ){?>es<?php }elseif( qtrans_getLanguage() == 'ca' ) { ?>ca<?php }else { ?>en<?php } ?>" target="_blank" title="DRAG @ Google+"> Google Plus <i class="icon-angle-right"></i></a></p>
                    <!-- <p><i class="icon-twitter-sign pull-left"></i><a href="http://www.twitter.com/drag" target="_blank" title="DRAG @ twitter"> twitter @ DRAG <i class="icon-angle-right"></i></a></p> -->
                    <p>&nbsp;</p>
                </li>
                <li class="foot_li4">
                    <h6><i class="icon-shield"></i><?php if( qtrans_getLanguage() == 'es' ){?> Homologado por<?php }elseif( qtrans_getLanguage() == 'ca' ) { ?> Homologat per<?php }else { ?> Homologation by <?php } ?></h6>
                    <a href="http://www.belsatia.com" target="_blank" title="Belsatia"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/belsatia.gif" alt="Belsatia" /></a>
                    <a href="<?php echo get_bloginfo('url') . ('/') . qtrans_getLanguage() . '/drag-legal/' ; ?>" target="_self" title="<?php if( qtrans_getLanguage() == 'es' ){?>Condiciones Legales<?php }elseif( qtrans_getLanguage() == 'ca' ) { ?>Condicions Legals<?php }else { ?>Legal Issues<?php } ?>" class="legal"><?php if( qtrans_getLanguage() == 'es' ){?>Condiciones Legales<?php }elseif( qtrans_getLanguage() == 'ca' ) { ?>Condicions Legals<?php }else { ?>Legal Issues<?php } ?></a>
					<?php
                        // action hook creating the footer 
                        thematic_footer();
                    ?>
                    <br /><br />
                    <a href="<?php echo get_bloginfo('url') . ('/') . qtrans_getLanguage() . '/wp-admin/' ; ?>" target="_self" title="LOGIN" class="legal">
                    <?php if ( is_user_logged_in() ) { ?><i class="icon-unlock-alt"></i>&nbsp;<b><?php if( qtrans_getLanguage() == 'es' ){?>ADMINISTRACIÓN<?php }elseif( qtrans_getLanguage() == 'ca' ) { ?>ADMINISTRACIÓ<?php }else { ?>ADMIN<?php } ?></b>
                    <?php }else{ ?><i class="icon-lock"></i>&nbsp;<b>LOGIN</b>
                    <?php }?></a>
                </li>
            </ul>
            <div class="clearboth"></div>
		</div>
        <a href="#toppage" id="to_top"><i class="icon-chevron-up"></i> <?php if( qtrans_getLanguage() == 'es' ){?> IR ARRIBA<?php }elseif( qtrans_getLanguage() == 'ca' ) { ?> VÉS A DALT<?php }else { ?> TO TOP<?php } ?></a>
		<?php
			// Filter provided for altering output of the footer closing element
    		echo ( apply_filters( 'thematic_close_footer', '</div><!-- #footer -->' . "\n" ) );
   
   			// action hook for placing content below the footer
			thematic_belowfooter();
    	?>
    	
	<?php
		// Filter provided for altering output of wrapping element follows the body tag  
    	if ( apply_filters( 'thematic_close_wrapper', true ) ) 
    		echo ( '</div><!-- #wrapper .hfeed -->' . "\n" );
	
		// calling WordPress' footer action hook
		wp_footer();

		// action hook for placing content before closing the BODY tag
		thematic_after(); 
	?>
<script src="http://islpronto.islonline.net/live/islpronto/public/chat_info.js?d=drag&lang=<?php if( qtrans_getLanguage() == 'es' ){?>es<?php }elseif( qtrans_getLanguage() == 'ca' ) { ?>ca<?php }else { ?>en<?php } ?>"></script>
<script type="text/javascript">
if(ISLProntoInfo.supporters > 0) {
var link = document.getElementById('islpronto_link');
link.href = 'javascript:void(0)';
link.onclick = ISLProntoInfo.onchat;
var image = document.getElementById('islpronto_image');
image.src = 'http://www.drag.cat/web/wp-content/themes/drag/images/layout/<?php if( qtrans_getLanguage() == 'es' ){?>es<?php }elseif( qtrans_getLanguage() == 'ca' ) { ?>ca<?php }else { ?>en<?php } ?>/islpronto-chat.jpg';
}
</script>
</body>
</html>