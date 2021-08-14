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
            	<div class="wp-menu-image">
                </div>
            </span>
        	<span>
            <?php if( qtrans_getLanguage() == 'es' ){	?>
				Páginas
				<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Pàgines
				<?php }else{ //english ?>
				Pages
				<?php } ?>
            </span>
        </h3>
        <div class="inside">
          <a title="help_pages" id="help_pages"></a>
          <span class="closer"><i class="icon-remove-circle"></i>
			<?php if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>PÁGINAS</em>"
            <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>PÀGINES</em>"
            <?php }else{ //english ?>CLOSE
            <?php } ?>
        </span>
      	</div><!-- Inside -->
      </div>
</div>  
<?php ?>