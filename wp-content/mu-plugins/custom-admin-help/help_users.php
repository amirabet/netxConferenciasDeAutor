<?php 
/****************************************************************

Document d'Ajuda per la gestió d'Usuaris
des del WordPress Admin

****************************************************************/
?>
<div class="metabox-holder no-widget" id="users-box">
    <div class="postbox closed">
        <div class="handlediv" title="Click to toggle."><br></div>
        <h3 class="hndle">
        	<span class="menu-icon-users">
            	<div class="dashicons dashicons-admin-users"></div>
            </span>
        	<span>
            <?php if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){	?>
					Usuarios
				<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
					Usuaris
				<?php }else{ //english ?>
					Users
				<?php } 
            }else{//Not activeQtrans ?>
            	Usuarios
            <?php } ?>
            </span>
        </h3>
        <div class="inside">
          <a title="help_users" id="help_users"></a>
      		<span class="closer"><div class="dashicons dashicons-dismiss"></div>
             <?php if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>USUARIOS</em>"
                <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>USUARIS</em>"
                <?php }else{ //english ?>CLOSE
                <?php }
            }else{//Not activeQtrans ?>
            	CERRAR "<em>USUARIOS</em>"
            <?php } ?>
            </span>
        </div><!-- Inside -->
      </div>
</div>  
<?php ?>