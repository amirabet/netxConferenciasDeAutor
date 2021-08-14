<?php
/**
 * Footer Template DRAG
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
        <?php include_once(get_stylesheet_directory() . '/snippet-warnings.php');?>
    	
    	<?php
			// action hook for placing content above the footer
			thematic_abovefooter();
		
			// Filter provided for altering output of the footer opening element
    		echo ( apply_filters( 'thematic_open_footer', '<div id="footer">' ) );
    	?>	
        	
        	<div class="wrap_width">
            	<ul class="footer_ul footer_ul_contact">
                	<li class="foot_li5">
                        <h6><i class="icon-shield"></i><?php if( qtrans_getLanguage() == 'es' ){?> Homologado por<?php }elseif( qtrans_getLanguage() == 'ca' ) { ?> Homologat per<?php }else { ?> Homologation by <?php } ?></h6>
                        <a href="http://www.belsatia.com" target="_blank" title="Belsatia"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/belsatia.gif" alt="Belsatia" /></a>
                	</li>
                    <li class="foot_li6">
                    	<p><a href="http://www.facebook.com/drag.policia.local" target="_blank" title="DRAG @ facebook"><i class="icon-facebook-sign pull-left"></i> facebook</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://twitter.com/dragdroid" target="_blank" title="DRAG @ Twitter"><i class="icon-twitter-sign pull-left"></i> Twitter</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://plus.google.com/u/0/116959801615366824799/about?hl=<?php if( qtrans_getLanguage() == 'es' ){?>es<?php }elseif( qtrans_getLanguage() == 'ca' ) { ?>ca<?php }else { ?>en<?php } ?>" target="_blank" title="DRAG @ Google+"><i class="icon-google-plus-sign pull-left"></i> Google+</a></p>
                        <?php
							// action hook creating the footer 
							thematic_footer();
						?>
                        <p><br /><br />
                        <a href="<?php echo get_bloginfo('url') . ('/') . qtrans_getLanguage() . '/wp-admin/' ; ?>" target="_self" title="LOGIN" class="legal">
                    <?php if ( is_user_logged_in() ) { ?><i class="icon-unlock-alt"></i>&nbsp;<b><?php if( qtrans_getLanguage() == 'es' ){?>ADMINISTRACIÓN<?php }elseif( qtrans_getLanguage() == 'ca' ) { ?>ADMINISTRACIÓ<?php }else { ?>ADMIN<?php } ?></b>
                    <?php }else{ ?><i class="icon-lock"></i>&nbsp;<b>LOGIN</b>
                    <?php }?></a>
</p>
                    </li>
                </ul>
                <div class="clearboth"></div>
			
        	</div>
            <a href="#toppage" id="to_top"><i class="icon-chevron-up"></i ><?php if( qtrans_getLanguage() == 'es' ){?> IR ARRIBA<?php }elseif( qtrans_getLanguage() == 'ca' ) { ?> VÉS A DALT<?php }else { ?> TO TOP<?php } ?></a>
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