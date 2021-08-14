<?php 
/****************************************************************

Document d'Ajuda per la gestió de la Galeria Multimèdia
des del WordPress Admin

****************************************************************/
?>
<div class="metabox-holder no-widget" id="media-box">
    <div class="postbox closed">
        <div class="handlediv" title="Click to toggle."><br></div>
        <h3 class="hndle">
        	<span class="menu-icon-media">
            	<div class="dashicons dashicons-admin-media"></div>
            </span>
        	<span>
            <?php if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){	?>
				Medios (Imágenes y Video)
				<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Mèdia (Imatges i Video)
				<?php }else{ //english ?>
				Media
				<?php } 
            }else{//Not activeQtrans ?>
            	Medios (Imágenes y Video)
            <?php } ?>
            </span>
        </h3>
        <div class="inside">
          <a title="help_media" id="help_media"></a>
          <span class="closer"><div class="dashicons dashicons-dismiss"></div>
			<?php if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>MEDIOS</em>"
				<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>MÈDIA</em>"
				<?php }else{ //english ?>CLOSE
				<?php }
        	}else{//Not activeQtrans ?>
            	CERRAR "<em>MEDIOS</em>"
			<?php } ?>
        </span>
      	</div><!-- Inside -->
      </div>
</div>  
<?php ?>