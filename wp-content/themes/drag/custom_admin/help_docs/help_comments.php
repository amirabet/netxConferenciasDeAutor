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
            	<div class="wp-menu-image">
                </div>
            </span>
        	<span>
            <?php if( qtrans_getLanguage() == 'es' ){	?>
				Comentarios
				<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Comentaris
				<?php }else{ //english ?>
				Comments
				<?php } ?>
            </span>
        </h3>
        <div class="inside">
          <a title="help_comments" id="help_comments"></a>
          	<span class="closer"><i class="icon-remove-circle"></i>
				<?php if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>COMENTARIOS</em>"
                <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>COMENTARIS</em>"
                <?php }else{ //english ?>CLOSE
                <?php } ?>
            </span>
      	</div><!-- Inside -->
      </div>
</div>  
<?php ?>