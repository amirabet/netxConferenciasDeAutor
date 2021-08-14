<?php 
/****************************************************************

Document d'Ajuda relacionat amb les Eines i el seu ús
des del WordPress Admin

****************************************************************/
?>
<div class="metabox-holder no-widget" id="tools-box">
    <div class="postbox closed">
        <div class="handlediv" title="Click to toggle."><br></div>
        <h3 class="hndle">
        	<span class="menu-icon-tools">
            	<div class="dashicons dashicons-admin-tools"></div>
            </span>
        	<span>
            <?php if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){	?>
				Herramientas
				<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Tools (Eines)
				<?php }else{ //english ?>
				Tools
				<?php } 
            }else{//Not activeQtrans ?>
            	Herramientas
            <?php } ?>
            </span>
        </h3>
        <div class="inside">
          <a title="help_tools" id="help_tools"></a>
            <span class="closer"><div class="dashicons dashicons-dismiss"></div>
                <?php if (function_exists('qtrans_getLanguage')){
					if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>HERRAMIENTAS</em>"
					<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>EINES</em>"
					<?php }else{ //english ?>CLOSE
					<?php }
            }else{//Not activeQtrans ?>
            	CERRAR "<em>HERRAMIENTAS</em>"
            <?php } ?>
            </span>
        </div><!--/inside -->
      </div>
</div>  
<?php ?>