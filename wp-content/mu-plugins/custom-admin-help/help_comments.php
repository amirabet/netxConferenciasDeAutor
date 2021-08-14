<?php 
/****************************************************************

Document d'Ajuda relacionat amb els Comentaris i la moderació
des del WordPress Admin

****************************************************************/
?>
<div class="metabox-holder no-widget" id="comments-box">
    <div class="postbox closed">
        <div class="handlediv" title="Click to toggle."><br></div>
        <h3 class="hndle">
        	<span class="menu-icon-comments">
            	<div class="dashicons dashicons-admin-comments"></div>
            </span>
        	<span>
            <?php if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){	?>
				Comentarios
				<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Comentaris
				<?php }else{ //english ?>
				Comments
				<?php } 
            }else{//Not activeQtrans ?>
            	Comentarios
            <?php } ?>
            </span>
        </h3>
        <div class="inside">
          <a title="help_comments" id="help_comments"></a>
          	<span class="closer"><div class="dashicons dashicons-dismiss"></div>
				<?php if (function_exists('qtrans_getLanguage')){
					if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>COMENTARIOS</em>"
					<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>COMENTARIS</em>"
					<?php }else{ //english ?>CLOSE
					<?php } 
				}else{//Not activeQtrans ?>
					CERRAR "<em>COMENTARIOS</em>"
				<?php } ?>
            </span>
      	</div><!-- Inside -->
      </div>
</div>  
<?php ?>