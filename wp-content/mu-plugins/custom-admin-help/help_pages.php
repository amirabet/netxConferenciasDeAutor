<?php 
/****************************************************************

Document d'Ajuda relacionat amb les Pàgines i la seva gestió
des del WordPress Admin

****************************************************************/
?>
<div class="metabox-holder no-widget" id="pages-box">
    <div class="postbox closed">
        <div class="handlediv" title="Click to toggle."><br></div>
        <h3 class="hndle">
        	<span class="menu-icon-page">
            	<div class="dashicons dashicons-admin-page"></div>
            </span>
        	<span>
            <?php if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){	?>
				Páginas
				<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Pàgines
				<?php }else{ //english ?>
				Pages
				<?php }
            }else{//Not activeQtrans ?>
            	Páginas
			<?php } ?>
            </span>
        </h3>
        <div class="inside">
          <a title="help_pages" id="help_pages"></a>
          <span class="closer"><div class="dashicons dashicons-dismiss"></div>
          <?php if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>PÁGINAS</em>"
            <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>PÀGINES</em>"
            <?php }else{ //english ?>CLOSE
            <?php }
        }else{//Not activeQtrans ?>
        	CERRAR "<em>PÁGINAS</em>"
		<?php } ?>
        </span>
      	</div><!-- Inside -->
      </div>
</div>  
<?php ?>