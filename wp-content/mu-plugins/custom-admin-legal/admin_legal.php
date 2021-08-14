<?php 
/****************************************************************

Configura les Condicions Legals (Avís)

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
	<?php // Missatges d'estat ******************************************
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$updated_msg = 'Se han actualizado las preferencias de la información legal';
		}elseif( qtrans_getLanguage() == 'ca' ){
			$updated_msg = "S'han actualitzat les preferències de la informació legal";
		}else{ //english
			$updated_msg = 'Terms and Conditions settings Updated';
		} 
	}else{//Not activeQtrans
		$updated_msg = 'Se han actualizado las preferencias de la información legal';
	}
	if ( isset( $_GET['settings-updated'] ) ) {
    	echo "<div class='updated'><p>" . $updated_msg . "</p></div>";
	} ?>
	<?php 
	// Header ******************************************
    if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){	?>
			<h2>Condiciones Legales</h2>
			<h3>Configura la página de Condiciones Legales y el Aviso de Cookies</h3>
		<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
			<h2>Condiviones Legals</h2>
			<h3>Configura la pàgina de Condicions Legals y l'Avís de Cookies</h3>
		<?php }else{ //english ?>
			<h2>Terms and Conditions</h2>
			<h3>Configures Term and Conditions Pge and Cookies PopUp</h3>
		<?php }
	}else{//Not activeQtrans ?>
    	<h2>Condiciones Legales</h2>
		<h3>Configura la página de Condiciones Legales y el Aviso de Cookies</h3>
    <?php } ?>
	<div id="dashboard-widgets-wrap">
        <div id="dashboard-widgets" class="metabox-holder" id="legal">
		<!--GRUP 1 **************************************** -->
            <div id='postbox-container-1' class='postbox-container'>
                <div id="normal-sortables1" class="meta-box-sortables">
                    <?php // INICI COL 1 ?>
					<!-- EMPRESA -->
                    <div id="empresa" class="postbox">
                        <div class="handlediv" title="Click to toggle."><br></div>
						<h3 class='hndle'><span>Empresa</span></h3>
                        <div class="inside">
                            <form method="post" action="options.php"> 
                            	<?php settings_fields('legal_config_empresa'); 
                                	$empresa_array = get_option('legal_empresa'); ?>
                                    <table class="form-table">
                                        <tr valign="top">
                                            <th scope="row"><label for="legal_empresa[nombre]">Nombre</label></th>
                                            <td>
                                            	<input type="text" name="legal_empresa[nombre]" value="<?php if ( isset($empresa_array['nombre']) ){ $empresa_nombre = $empresa_array['nombre']; echo sanitize_text_field($empresa_nombre); } ?>" /><br/>
                                                <i style="font-size:80%;">Nombre de su empresa</i>
                                            </td>
                                        </tr>
										<tr valign="top">
                                            <th scope="row"><label for="legal_empresa[nombre_legal]">Nombre Legal</label></th>
                                            <td>
                                            	<input type="text" name="legal_empresa[nombre_legal]" value="<?php if ( isset($empresa_array['nombre_legal']) ){ $empresa_nombre_legal = $empresa_array['nombre_legal']; echo sanitize_text_field($empresa_nombre_legal); } ?>" /><br/>
                                                <i style="font-size:80%;">Nomenclatura legal de la empresa</i>
                                            </td>
                                        </tr>
                                        <tr valign="top">
                                            <th scope="row"><label for="legal_empresa[email]">eMail</label></th>
                                            <td>
                                            	<input type="text" name="legal_empresa[email]" value="<?php if ( isset($empresa_array['email']) ){ $empresa_email = $empresa_array['email']; echo sanitize_text_field($empresa_email); } ?>" /><br/>
                                                <i style="font-size:80%;">eMail de contacto Legal</i>
                                            </td>
                                        </tr>
										<tr valign="top">
                                            <th scope="row"><label for="legal_empresa[telf]">Teléfono</label></th>
                                            <td>
                                            	<input type="text" name="legal_empresa[telf]" value="<?php if ( isset($empresa_array['telf']) ){ $empresa_telf = $empresa_array['telf']; echo sanitize_text_field($empresa_telf); } ?>" /><br/>
                                                <i style="font-size:80%;">Teléfono de contacto Legal</i>
                                            </td>
                                        </tr>
										<tr valign="top">
                                            <th scope="row">Dirección</th>
                                            <td>
                                            	<textarea rows="4" name="legal_empresa[adress]"><?php if ( isset($empresa_array['adress']) ){ $empresa_adress = $empresa_array['adress']; echo sanitize_text_field($empresa_adress); } ?></textarea><br/>
                                                <i style="font-size:80%;">Dirección postal de la sede central</i>
                                            </td>
                                        </tr>
										<tr valign="top">
                                            <th scope="row"><label for="legal_empresa[cif]">CIF / NIF</label></th>
                                            <td>
                                            	<input type="text" name="legal_empresa[cif]" value="<?php if ( isset($empresa_array['cif']) ){ $empresa_cif = $empresa_array['cif']; echo sanitize_text_field($empresa_cif); } ?>" /><br/>
                                                <i style="font-size:80%;">Nº de identificación</i>
                                            </td>
                                        </tr>
                                    </table>
                                <br />
								<?php 
								$other_atributes_empresa = array( 'id' => 'submit_empresa' );
								submit_button('','','','',$other_atributes_empresa); ?>
                                <br /><br />
                            </form>
                        </div><!-- /Inside -->
                    </div><!-- /ID Blog xx .postbox -->
					<?php // FINAL COL 1 ?>
                </div><!-- <div id="normal-sortables" class="meta-box-sortables"> -->
            </div><!-- div id='postbox-container-1' class='postbox-container' END FOREACH -->
			<div id='postbox-container-2' class='postbox-container'>
                <div id="normal-sortables2" class="meta-box-sortables">
					<?php // INICI COL 2 ?>
					<!-- EMPRESA -->
                    <div id="web" class="postbox">
                        <div class="handlediv" title="Click to toggle."><br></div>
						<h3 class='hndle'><span>Website</span></h3>
                        <div class="inside">
                            <form method="post" action="options.php"> 
                            	<?php settings_fields('legal_config_web'); 
                                	$web_array = get_option('legal_web'); ?>
                                    <table class="form-table">
										<tr valign="top">
                                            <th scope="row"><label for="legal_web[url]">URL</label></th>
                                            <td>
                                            	<input type="text" name="legal_web[url]" value="<?php if ( isset($web_array['url']) ){ $web_url = $web_array['url']; echo sanitize_text_field($web_url); } ?>" /><br/>
                                                <i style="font-size:80%;"><?php echo get_site_url(); ?></i>
                                            </td>
                                        </tr>
										<tr valign="top">
                                            <th scope="row">
												<label for="legal_web[url_legal]">URL Legal</label></br></br>
												<?php if ( isset($web_array['url']) ){ echo '<a href="' . get_site_url() . $web_array['url_legal'] . '" target="_blank">> Ver</a>';} ?>
											</th>
                                            <td>
                                            	<input type="text" name="legal_web[url_legal]" value="<?php if ( isset($web_array['url_legal']) ){ $web_url_legal = $web_array['url_legal']; echo sanitize_text_field($web_url_legal); } ?>" /><br/>
                                                <i style="font-size:80%;">La dirección web de la Página de Condiciones Legales</i>
                                            </td>
                                        </tr>
										<tr valign="top">
                                            <th scope="row"><label for="legal_web[id_legal]">ID Legal</label></th>
                                            <td>
                                            	<input type="text" name="legal_web[id_legal]" value="<?php if ( isset($web_array['id_legal']) ){ $web_id_legal = $web_array['id_legal']; echo sanitize_text_field($web_id_legal); } ?>" /><br/>
                                                <i style="font-size:80%;">El ID de la Página Legal (WordPress)</i>
                                            </td>
                                        </tr>
										<tr valign="top">
                                            <th scope="row"><label for="legal_web_lopd">L.O.P.D.</label></th>
                                            <td>
												<?php if ( ! isset( $web_array['lopd'] ) )$web_array['lopd'] = 0;?>
												<input type="checkbox" name="legal_web[lopd]" id="legal_web_lopd" value="1"  <?php checked( $web_array['lopd'], 1 ); ?>/>
                                                <i style="font-size:80%;"><b>Ley Orgánica de Protección de Datos.</b><br/>Marcar si se recogen datos personales.</i>
                                            </td>
                                        </tr>
                                    </table>
                                <br />
								<?php 
								$other_atributes_web = array( 'id' => 'submit_web' );
								submit_button('','','','',$other_atributes_web); ?>
                                <br /><br />
                            </form>
                        </div><!-- /Inside -->
                    </div><!-- /ID Blog xx .postbox -->
					<?php // FINAL COL 2 ?>
               </div><!-- <div id="normal-sortables" class="meta-box-sortables"> -->
            </div><!-- div id='postbox-container-1' class='postbox-container' END FOREACH -->
			<div id='postbox-container-3' class='postbox-container'>
                <div id="normal-sortables3" class="meta-box-sortables">
					<?php // INICI COL 3 ?>
					<!-- HOSTING -->
                    <div id="cookies" class="postbox">
                        <div class="handlediv" title="Click to toggle."><br></div>
						<h3 class='hndle'><span>Hosting</span></h3>
                        <div class="inside">
                            <form method="post" action="options.php"> 
                            	<?php settings_fields('legal_config_hosting'); 
                                	$hosting_array = get_option('legal_hosting'); ?>
                                    <table class="form-table">
										<tr valign="top">
                                            <th scope="row"><label for="legal_hosting[hosting]">Hosting</label></th>
                                            <td>
                                            	<input type="text" name="legal_hosting[hosting]" value="<?php if ( isset($hosting_array['hosting']) ){ $web_hosting = $hosting_array['hosting']; echo sanitize_text_field($web_hosting); } ?>" /><br/>
                                                <i style="font-size:80%;">Nombre de la Empresa que aloja la web</i>
                                            </td>
                                        </tr>
										<tr valign="top">
                                            <th scope="row">Dirección Hosting</th>
                                            <td>
                                            	<textarea rows="4" name="legal_hosting[h_adress]"><?php if ( isset($hosting_array['h_adress']) ){ $web_h_adress = $hosting_array['h_adress']; echo sanitize_text_field($web_h_adress); } ?></textarea><br/>
                                                <i style="font-size:80%;">Dirección postal de la empresa que aloja la web</i>
                                            </td>
                                        </tr>
										<tr valign="top">
                                            <th scope="row"><label for="legal_hosting[h_url]">URL Hosting</label></th>
                                            <td>
                                            	<input type="text" name="legal_hosting[h_url]" value="<?php if ( isset($hosting_array['h_url']) ){ $web_h_url = $hosting_array['h_url']; echo sanitize_text_field($web_h_url); } ?>" /><br/>
                                                <i style="font-size:80%;">La dirección web de la empresa de Hosting</i>
                                            </td>
                                        </tr>
										<tr valign="top">
                                            <th scope="row"><label for="legal_hosting[h_url_leg]">URL Hosting Legal</label></th>
                                            <td>
                                            	<input type="text" name="legal_hosting[h_url_leg]" value="<?php if ( isset($hosting_array['h_url_leg']) ){ $web_h_url_leg = $hosting_array['h_url_leg']; echo sanitize_text_field($web_h_url_leg); } ?>" /><br/>
                                                <i style="font-size:80%;">La dirección web de las Condiciones Legales de la empresa de Hosting</i>
                                            </td>
                                        </tr>
                                    </table>
                                <br />
								<?php 
								$other_atributes_hosting = array( 'id' => 'submit_hosting' );
								submit_button('','','','',$other_atributes_hosting); ?>
                                <br /><br />
                            </form>
                        </div><!-- /Inside -->
                    </div><!-- /ID Blog xx .postbox -->
					<?php // FINAL COL 3 ?>
               </div><!-- <div id="normal-sortables" class="meta-box-sortables"> -->
            </div><!-- div id='postbox-container-1' class='postbox-container' END FOREACH -->
			<div id='postbox-container-4' class='postbox-container'>
                <div id="normal-sortables4" class="meta-box-sortables">
					<?php // INICI COL 4 ?>
					<!-- COOKIES -->
                    <div id="cookies" class="postbox">
                        <div class="handlediv" title="Click to toggle."><br></div>
						<h3 class='hndle'><span>Cookies</span></h3>
                        <div class="inside">
                            <form method="post" action="options.php"> 
                            	<?php settings_fields('legal_config_cookies'); 
                                	$cookies_array = get_option('legal_cookies'); ?>
                                    <table class="form-table">
                                        <tr valign="middle">
                                            <th scope="row" colspan="2"><em>AVISO DE COOKIES</em></th>
                                        </tr>
                                        </tr>
										<tr valign="top">
                                            <th scope="row"><label for="legal_cookies_aviso">Mostrar aviso?</label></th>
                                            <td>
												<?php if ( ! isset( $cookies_array['aviso'] ) )$cookies_array['aviso'] = 0;?>
												<input type="checkbox" name="legal_cookies[aviso]" id="legal_cookies_aviso" value="1"  <?php checked( $cookies_array['aviso'], 1 ); ?>/>
                                                <i style="font-size:80%;">Con la opción marcada se mostrará el aviso de cookies</i>
                                            </td>
                                        </tr>
										<tr valign="top">
                                            <th scope="row">Texto del Aviso</th>
                                            <td>
                                            	<textarea rows="4" name="legal_cookies[txt]"><?php if ( isset($cookies_array['txt']) ){ $cookies_txt = $cookies_array['txt']; echo sanitize_text_field($cookies_txt); } ?></textarea><br/>
                                                <i style="font-size:80%;">El texto que aparecerá en el Aviso de Cookies</i>
                                            </td>
                                        </tr>
										<tr valign="top">
                                            <th scope="row"><label for="legal_cookies[link]">Texto del Enlace</label></th>
                                            <td>
                                            	<input type="text" name="legal_cookies[link]" value="<?php if ( isset($cookies_array['link']) ){ $cookies_link = $cookies_array['link']; echo sanitize_text_field($cookies_link); } ?>" /><br/>
                                                <i style="font-size:80%;">El texto que aparecerá en el Enlace</i>
                                            </td>
                                        </tr>
										<tr valign="middle">
                                            <th scope="row" colspan="2"><em>COOKIES UTILIZADAS</em></th>
                                        </tr>
										<tr valign="top">
                                            <th scope="row"><label for="legal_cookies_analytics">G. Analytics</label></th>
                                            <td>
												<?php if ( ! isset( $cookies_array['analytics'] ) )$cookies_array['analytics'] = 0;?>
												<input type="checkbox" name="legal_cookies[analytics]" id="legal_cookies_analytics" value="1"  <?php checked( $cookies_array['analytics'], 1 ); ?>/>
                                            </td>
                                        </tr>
										<tr valign="top">
                                            <th scope="row"><label for="legal_cookies_gmaps">Google Maps</label></th>
                                            <td>
												<?php if ( ! isset( $cookies_array['gmaps'] ) )$cookies_array['gmaps'] = 0;?>
												<input type="checkbox" name="legal_cookies[gmaps]" id="legal_cookies_gmaps" value="1"  <?php checked( $cookies_array['gmaps'], 1 ); ?>/>
                                            </td>
                                        </tr>
										<tr valign="top">
                                            <th scope="row"><label for="legal_cookies_gplus">Google+</label></th>
                                            <td>
												<?php if ( ! isset( $cookies_array['gplus'] ) )$cookies_array['gplus'] = 0;?>
												<input type="checkbox" name="legal_cookies[gplus]" id="legal_cookies_gplus" value="1"  <?php checked( $cookies_array['gplus'], 1 ); ?>/>
                                            </td>
                                        </tr>
										<tr valign="top">
                                            <th scope="row"><label for="legal_cookies_facebook">Facebook</label></th>
                                            <td>
												<?php if ( ! isset( $cookies_array['facebook'] ) )$cookies_array['facebook'] = 0;?>
												<input type="checkbox" name="legal_cookies[facebook]" id="legal_cookies_facebook" value="1"  <?php checked( $cookies_array['facebook'], 1 ); ?>/>
                                            </td>
                                        </tr>
										<tr valign="top">
                                            <th scope="row"><label for="legal_cookies_twitter">Twitter</label></th>
                                            <td>
												<?php if ( ! isset( $cookies_array['twitter'] ) )$cookies_array['twitter'] = 0;?>
												<input type="checkbox" name="legal_cookies[twitter]" id="legal_cookies_twitter" value="1"  <?php checked( $cookies_array['twitter'], 1 ); ?>/>
                                            </td>
                                        </tr>
										<tr valign="top">
                                            <th scope="row"><label for="legal_cookies_linkedin">LinkedIn</label></th>
                                            <td>
												<?php if ( ! isset( $cookies_array['linkedin'] ) )$cookies_array['linkedin'] = 0;?>
												<input type="checkbox" name="legal_cookies[linkedin]" id="legal_cookies_linkedin" value="1"  <?php checked( $cookies_array['linkedin'], 1 ); ?>/>
                                            </td>
                                        </tr>
										<tr valign="top">
                                            <th scope="row"><label for="legal_cookies_pinterest">Pinterest</label></th>
                                            <td>
												<?php if ( ! isset( $cookies_array['pinterest'] ) )$cookies_array['pinterest'] = 0;?>
												<input type="checkbox" name="legal_cookies[pinterest]" id="legal_cookies_pinterest" value="1"  <?php checked( $cookies_array['pinterest'], 1 ); ?>/>
                                            </td>
                                        </tr>
										<tr valign="top">
                                            <th scope="row"><label for="legal_cookies_ytube">YouTube</label></th>
                                            <td>
												<?php if ( ! isset( $cookies_array['ytube'] ) )$cookies_array['ytube'] = 0;?>
												<input type="checkbox" name="legal_cookies[ytube]" id="legal_cookies_ytube" value="1"  <?php checked( $cookies_array['ytube'], 1 ); ?>/>
                                            </td>
                                        </tr>
										<tr valign="top">
                                            <th scope="row"><label for="legal_cookies_vimeo">Vimeo</label></th>
                                            <td>
												<?php if ( ! isset( $cookies_array['vimeo'] ) )$cookies_array['vimeo'] = 0;?>
												<input type="checkbox" name="legal_cookies[vimeo]" id="legal_cookies_vimeo" value="1"  <?php checked( $cookies_array['vimeo'], 1 ); ?>/>
                                            </td>
                                        </tr>
										<tr valign="top">
                                            <th scope="row"><label for="legal_cookies_slideshare">SlideShare</label></th>
                                            <td>
												<?php if ( ! isset( $cookies_array['slideshare'] ) )$cookies_array['slideshare'] = 0;?>
												<input type="checkbox" name="legal_cookies[slideshare]" id="legal_cookies_slideshare" value="1"  <?php checked( $cookies_array['slideshare'], 1 ); ?>/>
                                            </td>
                                        </tr>
                                    </table>
                                <br />
								<?php 
								$other_atributes_cookies = array( 'id' => 'submit_cookies' );
								submit_button('','','','',$other_atributes_cookies); ?>
                                <br /><br />
                            </form>
                        </div><!-- /Inside -->
                    </div><!-- /ID Blog xx .postbox -->
					<?php // FINAL COL 4 ?>
               </div><!-- <div id="normal-sortables" class="meta-box-sortables"> -->
            </div><!-- div id='postbox-container-1' class='postbox-container' END FOREACH -->            <!-- /Grup1 -->
		</div>
	</div>
</div><!-- /#wrap -->
<script>
jQuery('body.toplevel_page_legal').css('background','none');
var widget = jQuery('.inside');
jQuery( widget ).each(function( index, element ) {
	var button = jQuery( element ).find('.button');
	jQuery( element ).hover(
	  function() {
		jQuery( button ).addClass('button-primary');
	  }, function() {
		jQuery( button ).removeClass('button-primary');
	  }
	);
});
</script>
<style>
	.inside .form-table tr th{width:35%;}
	.inside form input[type=text], .inside form textarea{width:100%; font-size:90%;}
</style>