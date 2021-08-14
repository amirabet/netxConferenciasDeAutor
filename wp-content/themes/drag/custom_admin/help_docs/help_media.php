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
            	<div class="wp-menu-image">
                </div>
            </span>
        	<span>
            <?php if( qtrans_getLanguage() == 'es' ){	?>
				Media (Imágenes y Video)
				<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Mèdia (Imatges i Video)
				<?php }else{ //english ?>
				Media
				<?php } ?>
            </span>
        </h3>
        <div class="inside">
          <a title="help_media" id="help_media"></a>
          <span class="closer"><i class="icon-remove-circle"></i>
			<?php if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>MEDIA</em>"
            <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>MEDIA</em>"
            <?php }else{ //english ?>CLOSE
            <?php } ?>
        </span>
      	</div><!-- Inside -->
      </div>
</div>  
<?php ?>