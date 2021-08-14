<?php 
/****************************************************************

Document d'Ajuda relacionat amb els Enllaços i la seva gestió
des del WordPress Admin

****************************************************************/
?>
<div class="metabox-holder no-widget" id="links-box">
    <div class="postbox closed">
        <div class="handlediv" title="Click to toggle."><br></div>
        <h3 class="hndle">
        	<span class="menu-icon-links">
            	<div class="dashicons dashicons-admin-links"></div>
            </span>
        	<span>
            <?php if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){	?>
				Enlaces
				<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Enllaços
				<?php }else{ //english ?>
				Links
				<?php }
            }else{//Not activeQtrans ?>
            	Enlaces
            <?php } ?>
			</span>
        </h3>
        <div class="inside">
          <a title="help_links" id="help_links"></a>
          <span class="closer"><div class="dashicons dashicons-dismiss"></div>
          <?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>ENLACES</em>"
            <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>ENLLAÇOS</em>"
            <?php }else{ //english ?>CLOSE
            <?php }
         }else{//Not activeQtrans ?>
         	CERRAR "<em>ENLACES</em>"
         <?php } ?>
		</span>
      	</div><!-- Inside -->
      </div>
</div>  
<?php ?>