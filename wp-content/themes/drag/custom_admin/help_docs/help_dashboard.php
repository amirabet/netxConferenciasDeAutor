<?php 
/****************************************************************

Document d'Ajuda relacionat amb el Dashboard i els controls
generals del WordPress Admin

****************************************************************/
?>
<div class="metabox-holder no-widget" id="help-box">
    <div class="postbox closed">
        <div class="handlediv handle_first" title="Click to toggle."><br></div>
        <h3 class="hndle">
        	<span class="menu-icon-dashboard">
            	<div class="wp-menu-image">
                </div>
            </span>
        	<span>
            <?php if( qtrans_getLanguage() == 'es' ){	?>
				Escritorio
				<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Tauler
				<?php }else{ //english ?>
				Desktop
				<?php } ?>
            </span>
        </h3>
        <div class="inside">
          	<a title="help_dashboard" id="help_dashboard"></a>
            <span class="closer"><i class="icon-remove-circle"></i>
                <?php if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>ESCRITORIO</em>"
                <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>ESCRIPTORI</em>"
                <?php }else{ //english ?>CLOSE
                <?php } ?>
       		</span>
      </div><!-- Iniside -->
    </div>
</div>  
<?php ?>