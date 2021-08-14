<?php 
/****************************************************************

Mostra els gràfics i els Informes de Visites i Xarxes Socials

****************************************************************/
/**
//
/* WIDGETS DELS BLOGS CONFIGURABLES ************************************
*************************************************************************/
//
//
//
?>
<div class="wrap">
    <?php if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){	?>
			<h2>Estadísticas</h2>
		<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
			<h2>Estadístiques</h2>
		<?php }else{ //english ?>
			<h2>Stats</h2>
		<?php }
	}else{//Not activeQtrans ?>
    	<h2>Estadísticas</h2>
    <?php } ?>
    <div class="metabox-holder no-widget" id="stats">
    	<?php 
		//Analytics **********************
		$analytics = get_option('stats_analytics');
		$ga_folder = $analytics['folder'];
		if (!isset ($analytics['folder_view']) || $analytics['folder_view'] = '' || $analytics['folder_view'] == 0){
			$ga_folder_view = 'list';
		}else{
			$ga_folder_view = 'grid';
		}
		if (isset ($analytics['folder_url'])){ $ga_folder_url = $analytics['folder_url'];}else{$ga_folder_url = '';}
		$ga_code = $analytics['code'];
		$ga_id = $analytics['id'];
		$ga_user = $analytics['user'];
		$ga_pass = $analytics['pass'];
		//Facebook**********************
		$fb_array = get_option('social_facebook');
		$fb_site_link = $fb_array['url'];
		//Twitter **********************
		$tw_array = get_option('social_twitter');
		$tw_site_link = $tw_array['url'];
		//Google Plus **********************
		$gplus_array = get_option('social_gplus');
		$gp_site_link = $gplus_array['url'];
		//You Tube **********************
		$ytube_array = get_option('social_ytube');
		$yt_site_link = $ytube_array['url'];
		//Linked In **********************
		$lin_array = get_option('social_lin');
		$lin_site_link = $lin_array['url'];
		//Instagram **********************
		$igram_array = get_option('social_igram');
		$ig_site_link = $igram_array['url'];
		//Pinterest **********************
		$pin_array = get_option('social_pinterest');
		$pin_site_link = $pin_array['url'];
		//Klout **********************
		$klout_array = get_option('social_klout');
		$kl_site_link = $klout_array['url'];
		// Si tots els camps d'Estadistica estan buits
		if ( empty($ga_folder) && empty($ga_id) && empty($ga_code) && empty($ga_user) && empty($ga_pass) && empty($fb_site_link) && empty($tw_site_link) && empty($gp_site_link) && empty($yt_site_link) && empty($lin_site_link) && empty($ig_site_link) && empty($pin_site_link) && empty($kl_site_link)){ ?>
        	<div class="postbox ">
                <div class="handlediv" title="Click to toggle."><br></div>
                    <h3 class="hndle"><span>
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								Sin estadísticas
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								Sense Estadístiques
							<?php }else{ //english ?>
								No Stats
							<?php }
                    	}else{//Not activeQtrans ?>
                        	Sin estadísticas
                        <?php } ?>
                    </span></h3>
                <div class="inside">
                	<div class="dashicons dashicons-dismiss alignleft" style="font-size:60px; display:block; width:72px; height:72px; text-align:left; float:left;"></div>
						<?php if (function_exists('qtrans_getLanguage')){
                        	if( qtrans_getLanguage() == 'es' ){	?>
                                <p><b>No hay ningun Informe Estadístico configurado.</b></p>
                                <?php if ( current_user_can('manage_options') ) { ?><p>Puedes configurar los Informes de Visitas y perfiles de Redes Sociales en las páginas <b><a href="admin.php?page=social_config" target="_self">Social -> Configuración</a></b> y <b><a href="admin.php?page=stats_config" target="_self">Estadísticas -> Configuración</a></b>.<br/><br/></p><?php } ?>
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
                                <p><b>No hi ha cap Informe Estadístic configurat.</b></p>
                                <?php if ( current_user_can('manage_options') ) { ?><p>Pots configurar els Informes de Visites i perfils de Xarxes Socials a les pàgines <b><a href="admin.php?page=social_config" target="_self">Social -> Configuració</a></b> i <b><a href="admin.php?page=stats_config" target="_self">Estadístiques -> Configuració</a></b>.<br/><br/></p><?php } ?>
                            <?php }else{ //english ?>
                                <p><b>There's any Stats Report set.</b></p>
                                <?php if ( current_user_can('manage_options') ) { ?><p>You can set Web Stats and Social Media Profiles at <b><a href="admin.php?page=social_config" target="_self">Social -> Settings</a></b> and <b><a href="admin.php?page=stats_config" target="_self">Stats -> Settings</a></b>.<br/><br/></p><?php } ?>
                            <?php }
                    	}else{//Not activeQtrans ?>
                        	<p><b>No hay ningun Informe Estadístico configurado.</b></p>
                            <?php if ( current_user_can('manage_options') ) { ?><p>Puedes configurar los Informes de Visitas y perfiles de Redes Sociales en las páginas <b><a href="admin.php?page=social_config" target="_self">Social -> Configuración</a></b> y <b><a href="admin.php?page=stats_config" target="_self">Estadísticas -> Configuración</a></b>.<br/><br/></p><?php } ?>
                        <?php } ?>
                    </div>
            </div>
		<?php }else{ //Si tenim algún camp d'estadístiques **********************************************************//
			// Social ***************************************************************************************************
			if (!empty($fb_site_link) || !empty($tw_site_link) || !empty($gp_site_link) || !empty($yt_site_link) || !empty($lin_site_link) || !empty($ig_site_link) || !empty($pin_site_link) || !empty($kl_site_link)){ // Si hi algun compte de socialMedia
				require 'admin_stats_social.php';
            }
			// Carpeta d'Informes ***********************************************************************************
			if (!empty($ga_folder)){ // Analytics Folder ?>
				<!-- Analytics Google Drive Folder -->
                <div class="postbox closed">
					<div class="handlediv" title="Click to toggle."><br></div>
						<h3 class="hndle"><span><div class="dashicons dashicons-media-spreadsheet"></div>
							<?php if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){	?>
									Visitas Web: Informes
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
									Visites web: Informes
								<?php }else{ //english ?>
									Web Visits: Reports
								<?php }
							}else{//Not activeQtrans ?>
								Visitas Web: Informes
							<?php } ?>
						</span></h3>
					<div class="inside">
						<iframe src="https://drive.google.com/embeddedfolderview?id=<?php echo $ga_folder . '#' . $ga_folder_view;?>" width="100%" height="280" frameborder="0"></iframe>
					</div>
					<?php if (isset ($analytics['folder_url']) && $analytics['folder_url'] != ''){?>
						<div class="outside"><br><a href="<?php echo $analytics['folder_url'] ;?>" class="button" target="_blank">Ver en Google Drive</a></div>
					<?php } ?>	
				</div>
        	<?php } // Final Drive Folder
			//
			// Analytics Graph **************************************************************************************************
			if (!empty($ga_id) &&!empty($ga_code) && !empty($ga_user) && !empty($ga_pass)){ // Analytics Graphs ?>
            	<div class="postbox ">
                    <div class="handlediv" title="Click to toggle."><br></div>
                        <h3 class="hndle"><span><div class="dashicons dashicons-chart-pie"></div>
                            <?php if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){	?>
									Visitas Web: Gráficos y Datos
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
									Visites web: Gràfics i Dades
								<?php }else{ //english ?>
									Web Visits: Graphs and Data
								<?php }
                        	}else{//Not activeQtrans ?>
                        	Visitas Web:  Gráficos y Datos
                        	<?php } ?>
                        </span></h3>
                    <div class="inside">
                        <?php require 'admin_stats_analytics.php'; ?>
                    </div>
                    <div class="clear"></div>
                </div>
        	<?php }else{ // Si els camps de GA estan buits
				if (!empty($ga_id)){ //Però la propietat de GA esta configurada ?>
					<div class="postbox ">
                        <div class="handlediv" title="Click to toggle."><br></div>
                            <h3 class="hndle"><span><div class="dashicons dashicons-admin-generic"></div>
                                <?php if (function_exists('qtrans_getLanguage')){
									if( qtrans_getLanguage() == 'es' ){	?>
										Configura las Estadísticas Web
									<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
										Configura les Estadístiques Web
									<?php }else{ //english ?>
										Set Web Stats
									<?php }
                        	}else{//Not activeQtrans ?>
                                Configura las Estadísticas Web
                        	<?php } ?>
                            </span></h3>
                        <div class="inside">
                            <div class="dashicons dashicons-info" style="font-size:60px; display:block; width:72px; height:72px; text-align:left; float:left; "></div>
                            <?php if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){	?>
                                    <p><b>Parece que tienes configurada una propiedad de <i>Google Analytics</i>.</b></p>
                                    <p>Para poder visualizar en tiempo real las Estadísticas de Visitas debes configurar todas las variables <?php if ( current_user_can('manage_options') ) { ?>en la página <b><a href="admin.php?page=stats_config" target="_self">Estadísticas -> Configuración</a></b>.<br/><br/></p> <?php }else{ ?>accediendo con una <b>cuenta de Administrador</b>. <?php }?>
                                <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
                                    <p><b>Sembla que ja hi ha configurada una propietat de <i>Google Analytics</i>.</b></p>
                                    <p>Per poder visualitzar en temps real les Estadístiques de Visites has de configurar totes les variables <?php if ( current_user_can('manage_options') ) { ?>de la pàgina <b><a href="admin.php?page=stats_config" target="_self">Estadístiques -> Configuració</a></b>.<br/><br/></p> <?php }else{ ?>accedint amb un <b>compte d'Administrador</b>. <?php }?>
                                <?php }else{ //english ?>
                                    <p><b>It seems that you have already a <i>Google Analytics</i> property set.</b></p>
                                    <p>You'll be albe to see real time Web Stats if all the fields are set  <?php if ( current_user_can('manage_options') ) { ?>at page <b><a href="admin.php?page=stats_config" target="_self">Stats -> Settings</a></b>.<br/><br/></p> <?php }else{ ?>using an <b>Admin Account</b>. <?php }?>
                                <?php } 
                        	}else{//Not activeQtrans ?>
                                <p><b>Parece que tienes configurada una propiedad de <i>Google Analytics</i>.</b></p>
                                p>Para poder visualizar en tiempo real las Estadísticas de Visitas debes configurar todas las variables <?php if ( current_user_can('manage_options') ) { ?>en la página <b><a href="admin.php?page=stats_config" target="_self">Estadísticas -> Configuración</a></b>.<br/><br/></p> <?php }else{ ?>accediendo con una <b>cuenta de Administrador</b>. <?php }?>
                        	<?php } ?><strong></strong>
                        </div>
                    </div>
				<?php } //Final avis propietat GA configurada
			} // Final Analytics Graph
			//
			?>
		<?php } // Final Global if "Si hi ha stats" ?>
	</div>
</div><!-- /#wrap -->