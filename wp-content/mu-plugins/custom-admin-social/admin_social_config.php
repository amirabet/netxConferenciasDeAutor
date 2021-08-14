<?php 
/****************************************************************

Pàgina de configuració per les Xarxes Socials 

****************************************************************/
// 
//
// Renderitzem la Pàgina
//
?>
<div class="wrap"><?php
	// Missatges d'estat ******************************************
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$updated_msg = 'Se han actualizado las preferencias de las Redes Sociales';
		}elseif( qtrans_getLanguage() == 'ca' ){
			$updated_msg = "S'han actualitzat les preferències de les Xarxes Socials";
		}else{ //english
			$updated_msg = 'Social Media settings Updated';
		} 
	}else{//Not activeQtrans
		$updated_msg = 'Se han actualizado las preferencias de las Redes Sociales';
	}
	if ( isset( $_GET['settings-updated'] ) ) {
    	echo "<div class='updated'><p>" . $updated_msg . "</p></div>";
	}
	// Header ******************************************
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){	?>
			<h2>Configuración de las Redes Sociales</h2>
			<h3>Introduce las URL y las claves para cada Red Social en la que participes</h3>
			<p>Puedes ver su actividad en la Página <a href="admin.php?page=social" target="_self">Social</a>. También puedes ver un resumen estadístico en la página <a href="admin.php?page=stats#social_stats" target="_self">Estadísticas</a>.</p>
		<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
			<h2>Configuració de les Xarxes Socials</h2>
			<h3>Introdueix les URL i les claus per a cada Xarxa Social en la que participis</h3>
			<p>Pots veure'n l'activitat a la Pàgina <a href="admin.php?page=social" target="_self">Social</a>. També pots veure un resum estadístic a la Pàgina <a href="admin.php?page=stats#social_stats" target="_self">Estadístiques</a>.</p>
		<?php }else{ //english ?>
			<h2>Social Nets Setup</h2>
			<h3>Fill the fileds with the URL and keys for each Social Network </h3>
			<p>Can see its feed in the <a href="admin.php?page=social" target="_self">Social</a> Page. You also can view charts of the stats at <a href="admin.php?page=stats#social_stats" target="_self">Stats</a> page.</p>
		<?php } 
    }else{//Not activeQtrans ?>
    	<h2>Configuración de las Redes Sociales</h2>
        <h3>Introduce las URL y las claves para cada Red Social en la que participes</h3>
        <p>Puedes ver su actividad en la Página <a href="admin.php?page=social" target="_self">Social</a>. También puedes ver un resumen estadístico en la página <a href="admin.php?page=stats#social_stats" target="_self">Estadísticas</a>.</p>
    <?php } ?>
    <div id="dashboard-widgets-wrap">
        <div id="dashboard-widgets" class="metabox-holder">
            <!--GRUP 1 **************************************** -->
            <div id='postbox-container-1' class='postbox-container'>
                <div id="normal-sortables1" class="meta-box-sortables">
                    <!-- Facebook -->
                    <div id="facebook" class="postbox closed">
                        <div class="handlediv" title="Haz clic para cambiar"><br /></div>
                        <h3 class='hndle'><span>Facebook</span></h3>
                        <div class="inside">
                            <form method="post" action="options.php"> 
                            	<?php settings_fields('social_config_facebook'); 
                                	$fb_array = get_option('social_facebook'); ?>
                                    <table class="form-table">
                                        <tr valign="top">
                                            <th scope="row"><label for="social_facebook[url]">URL</label></th>
                                            <td>
                                            	<input type="text" name="social_facebook[url]" value="<?php if ( isset($fb_array['url']) ){ $fb_url = $fb_array['url']; echo sanitize_text_field($fb_url); } ?>" /><br/>
                                                <i style="font-size:80%;">www.facebook.com/</i>
                                            </td>
                                        </tr>
                                        <tr valign="top">
                                            <th scope="row"><label for="social_facebook[url_id]">Page ID</label></th>
                                            <td>
                                            	<input type="text" name="social_facebook[url_id]" value="<?php if ( isset($fb_array['url_id']) ){ $fb_url_id = $fb_array['url_id']; echo sanitize_text_field($fb_url_id); } ?>" /><br/>
                                                <i style="font-size:80%;">www.findmyfacebookid.com/</i>
                                            </td>
                                        </tr>
                                        <tr valign="top">
                                            <th scope="row"><label for="social_facebook[app_id]">App ID</label></th>
                                            <td>
                                            	<input type="text" name="social_facebook[app_id]" value="<?php if ( isset($fb_array['app_id']) ) { $fb_app_id = $fb_array['app_id']; echo sanitize_text_field($fb_app_id); } ?>" /><br/>
                                                <i style="font-size:80%;">developers.facebook.com/apps/</i>
                                            </td>
                                        </tr>
                                    </table>
                                <br />
								<?php 
								$other_atributes_fb = array( 'id' => 'submit_fb' );
								submit_button('','','','',$other_atributes_fb); ?>
                                <br /><br />
                            </form>
                        </div><!-- /Inside -->
                    </div><!-- /ID Blog xx .postbox -->
                    <!-- Linked In -->
                    <div id="lin" class="postbox closed">
                        <div class="handlediv" title="Haz clic para cambiar"><br /></div>
                        <h3 class='hndle'><span>LinkedIn</span></h3>
                        <div class="inside">
                            <form method="post" action="options.php"> 
                            	<?php settings_fields('social_config_lin'); 
                                	$lin_array = get_option('social_lin'); ?>
                                    <table class="form-table">
                                        <tr valign="top">
                                            <th scope="row"><label for="social_lin[url]">URL</label></th>
                                            <td>
                                            	<input type="text" name="social_lin[url]" value="<?php if ( isset($lin_array['url'])){ $lin_url = $lin_array['url']; echo sanitize_text_field($lin_url); } ?>" /><br/>
                                                <i style="font-size:80%;">www.linkedin.com/company/</i>
                                            </td>
                                        </tr>
                                        <tr valign="top">
                                            <th scope="row"><label for="social_lin[w_id]">Widget ID</label></th>
                                            <td>
                                            	<input type="text" name="social_lin[w_id]" value="<?php if ( isset($lin_array['w_id'])){ $lin_wid = $lin_array['w_id']; echo sanitize_text_field($lin_wid); } ?>" /><br/>
                                                <i style="font-size:80%;">developer.linkedin.com/plugins/company-profile-plugin</i>
                                            </td>
                                        </tr>
                                    </table>
                                <br />
								<?php 
								$other_atributes_lin = array( 'id' => 'submit_lin' );
								submit_button('','','','',$other_atributes_lin); ?>
                                <br /><br />
                            </form>
                        </div><!-- /Inside -->
                    </div><!-- /ID Blog xx .postbox -->
                </div><!-- <div id="normal-sortables" class="meta-box-sortables"> -->
            </div><!-- div id='postbox-container-1' class='postbox-container' END FOREACH -->
            <!-- /Grup1 -->
            <!--GRUP 2 **************************************** -->
            <div id='postbox-container-2' class='postbox-container'>
                <div id="normal-sortables2" class="meta-box-sortables">
                    <!-- Twitter -->
                    <div id="twitter" class="postbox closed">
                        <div class="handlediv" title="Haz clic para cambiar"><br /></div>
                        <h3 class='hndle'><span>Twitter</span></h3>
                        <div class="inside">
                            <form method="post" action="options.php"> 
                            	<?php settings_fields('social_config_twitter'); 
                                	$tw_array = get_option('social_twitter'); ?>
                                    <table class="form-table">
                                        <tr valign="top">
                                            <th scope="row"><label for="social_twitter[url]">URL</label></th>
                                            <td>
                                            	<input type="text" name="social_twitter[url]" value="<?php if ( isset($tw_array['url'])){ $tw_url = $tw_array['url']; echo sanitize_text_field($tw_url); } ?>" /><br/>
                                                <i style="font-size:80%;">www.twitter.com/</i>
                                            </td>
                                        </tr>
                                        <tr valign="top">
                                            <th scope="row"><label for="social_twitter[user_id]">User ID</label></th>
                                            <td>
                                            	<input type="text" name="social_twitter[user_id]" value="<?php if ( isset($tw_array['user_id'])){ $tw_usrid = $tw_array['user_id']; echo sanitize_text_field($tw_usrid); } ?>" /><br/>
                                                <i style="font-size:80%;">gettwitterid.com/</i>
                                            </td>
                                        </tr>
                                        <tr valign="top">
                                            <th scope="row"><label for="social_twitter[wdgt_id]">Widget ID</label></th>
                                            <td>
                                            	<input type="text" name="social_twitter[wdgt_id]" value="<?php if ( isset($tw_array['wdgt_id'])){ $tw_wid = $tw_array['wdgt_id']; echo sanitize_text_field($tw_wid); } ?>" /><br/>
                                                <i style="font-size:80%;">twitter.com/settings/widgets/</i>
                                            </td>
                                        </tr>
                                        <tr valign="top">
                                            <th scope="row"><label for="social_twitter[script_url]">RSS Script URL</label></th>
                                            <td>
                                            	<input type="text" name="social_twitter[script_url]" value="<?php if ( isset($tw_array['script_url'])){ $tw_script = $tw_array['script_url']; echo sanitize_text_field($tw_script); } ?>" /><br/>
                                                <i style="font-size:80%;">www.labnol.org/internet/twitter-rss-feed/28149/</i>
                                            </td>
                                        </tr>
                                    </table>
                                <br />
								<?php 
								$other_atributes_tw = array( 'id' => 'submit_tw' );
								submit_button('','','','',$other_atributes_tw); ?>
                                <br /><br />
                            </form>
                        </div><!-- /Inside -->
                    </div><!-- /ID Blog xx .postbox -->
                    <!-- Instagram -->
                    <div id="igram" class="postbox closed">
                        <div class="handlediv" title="Haz clic para cambiar"><br /></div>
                        <h3 class='hndle'><span>Instagram</span></h3>
                        <div class="inside">
                            <form method="post" action="options.php"> 
                            	<?php settings_fields('social_config_igram'); 
                                	$igram_array = get_option('social_igram'); ?>
                                    <table class="form-table">
                                        <tr valign="top">
                                            <th scope="row"><label for="social_igram[url]">URL</label></th>
                                            <td>
                                            	<input type="text" name="social_igram[url]" value="<?php if ( isset($igram_array['url'])){ $igram_url = $igram_array['url']; echo sanitize_text_field($igram_url); } ?>" /><br/>
                                                <i style="font-size:80%;">www.instagram.com/</i>
                                            </td>
                                        </tr>
                                        <tr valign="top">
                                            <th scope="row"><label for="social_igram[id]">User ID</label></th>
                                            <td>
                                            	<input type="text" name="social_igram[id]" value="<?php if ( isset($igram_array['id'])){ $igram_id = $igram_array['id']; echo sanitize_text_field($igram_id); } ?>" /><br/>
                                                <i style="font-size:80%;">http://instagram.com/developer/clients/manage/</i>
                                            </td>
                                        </tr>
                                        <tr valign="top">
                                            <th scope="row"><label for="social_igram[accss]">Access Token</label></th>
                                            <td>
                                            	<input type="text" name="social_igram[accss]" value="<?php if ( isset($igram_array['accss'])){ $igram_accss = $igram_array['accss']; echo sanitize_text_field($igram_accss); } ?>" /><br/>
                                                <i style="font-size:80%;">http://instagram.com/developer/clients/manage/</i>
                                            </td>
                                        </tr>
                                        <tr valign="top">
                                            <th scope="row"><label for="social_igram[client]">Client ID</label></th>
                                            <td>
                                            	<input type="text" name="social_igram[client]" value="<?php if ( isset($igram_array['client'])){ $igram_client = $igram_array['client']; echo sanitize_text_field($igram_client); } ?>" /><br/>
                                                <i style="font-size:80%;">http://jelled.com/instagram/lookup-user-id</i>
                                            </td>
                                        </tr>
                                    </table>
                                <br />
								<?php 
								$other_atributes_ig = array( 'id' => 'submit_ig' );
								submit_button('','','','',$other_atributes_ig); ?>
                                <br /><br />
                            </form>
                        </div><!-- /Inside -->
                    </div><!-- /ID Blog xx .postbox -->
                </div><!-- <div id="normal-sortables" class="meta-box-sortables"> -->
            </div><!-- div id='postbox-container-1' class='postbox-container' END FOREACH -->
            <!-- /Grup2 -->
            <!--GRUP 3 **************************************** -->
            <div id='postbox-container-3' class='postbox-container'>
                <div id="normal-sortables3" class="meta-box-sortables">
                    <!-- Google Plus -->
                    <div id="gplus" class="postbox closed">
                        <div class="handlediv" title="Haz clic para cambiar"><br /></div>
                        <h3 class='hndle'><span>Google +</span></h3>
                        <div class="inside">
                            <form method="post" action="options.php"> 
                            	<?php settings_fields('social_config_gplus'); 
                                	$gplus_array = get_option('social_gplus'); ?>
                                    <table class="form-table">
                                        <tr valign="top">
                                            <th scope="row"><label for="social_gplus[url]">URL</label></th>
                                            <td>
                                            	<input type="text" name="social_gplus[url]" value="<?php if ( isset($gplus_array['url']) ){ $gplus_url = $gplus_array['url']; echo sanitize_text_field($gplus_url); } ?>" /><br/>
                                                <i style="font-size:80%;">plus.google.com/u/0/</i>
                                            </td>
                                        </tr>
                                    </table>
                                <br />
								<?php 
								$other_atributes_gplus = array( 'id' => 'submit_gplus' );
								submit_button('','','','',$other_atributes_gplus); ?>
                                <br /><br />
                            </form>
                        </div><!-- /Inside -->
                    </div><!-- /ID Blog xx .postbox -->
                    <!-- Pinterest -->
                    <div id="pinterest" class="postbox closed">
                        <div class="handlediv" title="Haz clic para cambiar"><br /></div>
                        <h3 class='hndle'><span>Pinterest</span></h3>
                        <div class="inside">
                            <form method="post" action="options.php"> 
                            	<?php settings_fields('social_config_pinterest'); 
                                	$pinterest_array = get_option('social_pinterest'); ?>
                                    <table class="form-table">
                                        <tr valign="top">
                                            <th scope="row"><label for="social_pinterest[url]">URL</label></th>
                                            <td>
                                            	<input type="text" name="social_pinterest[url]" value="<?php if ( isset($pinterest_array['url']) ){ $pinterest_url = $pinterest_array['url']; echo sanitize_text_field($pinterest_url); } ?>" /><br/>
                                                <i style="font-size:80%;">www.pinterest.com/</i>
                                            </td>
                                        </tr>
                                        <tr valign="top">
                                            <th scope="row"><label for="social_pinterest[meta]">Verify Metatag</label></th>
                                            <td>
                                            	<input type="text" name="social_pinterest[meta]" value="<?php if ( isset($pinterest_array['meta']) ){ $pinterest_url = $pinterest_array['meta']; echo sanitize_text_field($pinterest_url); } ?>" /><br/>
                                                <i style="font-size:80%;">name="p:domain_verify" content="xxxxxxxxxxxxx"</i>
                                            </td>
                                        </tr>
                                    </table>
                                <br />
								<?php 
								$other_atributes_pinterest = array( 'id' => 'submit_pinterest' );
								submit_button('','','','',$other_atributes_pinterest); ?>
                                <br /><br />
                            </form>
                        </div><!-- /Inside -->
                    </div><!-- /ID Blog xx .postbox -->
                </div><!-- <div id="normal-sortables" class="meta-box-sortables"> -->
            </div><!-- div id='postbox-container-1' class='postbox-container' END FOREACH -->
            <!-- /Grup3 -->
            <!--GRUP 4 **************************************** -->
            <div id='postbox-container-4' class='postbox-container'>
                <div id="normal-sortables4" class="meta-box-sortables">
                    <!-- YouTube -->
                    <div id="ytube" class="postbox closed">
                        <div class="handlediv" title="Haz clic para cambiar"><br /></div>
                        <h3 class='hndle'><span>YouTube</span></h3>
                        <div class="inside">
                            <form method="post" action="options.php"> 
                            	<?php settings_fields('social_config_ytube'); 
                                	$ytube_array = get_option('social_ytube'); ?>
                                    <table class="form-table">
                                        <tr valign="top">
                                            <th scope="row"><label for="social_ytube[url]">URL</label></th>
                                            <td>
                                            	<input type="text" name="social_ytube[url]" value="<?php if ( isset($ytube_array['url']) ){ $ytube_url = $ytube_array['url']; echo sanitize_text_field($ytube_url); } ?>" /><br/>
                                                <i style="font-size:80%;">www.youtube.com/user/</i>
                                            </td>
                                        </tr>
                                        <tr valign="top">
                                            <th scope="row"><label for="social_ytube[playlist]">YouTube Playlist</label></th>
                                            <td>
                                            	<input type="text" name="social_ytube[playlist]" value="<?php if ( isset($ytube_array['playlist']) ){ $ytube_playlist = $ytube_array['playlist']; echo sanitize_text_field($ytube_playlist); } ?>" /><br/>
                                                <i style="font-size:80%;">YouTube Playlist</i>
                                            </td>
                                        </tr>
                                    </table>
                                <br />
								<?php 
								$other_atributes_ytube = array( 'id' => 'submit_ytube' );
								submit_button('','','','',$other_atributes_ytube); ?>
                                <br /><br />
                            </form>
                        </div><!-- /Inside -->
                    </div><!-- /ID Blog xx .postbox -->
                    <!-- Klout -->
                    <div id="ytube" class="postbox closed">
                        <div class="handlediv" title="Haz clic para cambiar"><br /></div>
                        <h3 class='hndle'><span>Klout</span></h3>
                        <div class="inside">
                            <form method="post" action="options.php"> 
                            	<?php settings_fields('social_config_klout'); 
                                	$klout_array = get_option('social_klout'); ?>
                                    <table class="form-table">
                                        <tr valign="top">
                                            <th scope="row"><label for="social_klout[url]">URL</label></th>
                                            <td>
                                            	<input type="text" name="social_klout[url]" value="<?php if ( isset($klout_array['url']) ){ $klout_url = $klout_array['url']; echo sanitize_text_field($klout_url); } ?>" /><br/>
                                                <i style="font-size:80%;">www.klout.com/</i>
                                            </td>
                                        </tr>
                                    </table>
                                <br />
								<?php 
								$other_atributes_klout = array( 'id' => 'submit_klout' );
								submit_button('','','','',$other_atributes_klout); ?>
                                <br /><br />
                            </form>
                        </div><!-- /Inside -->
                    </div><!-- /ID Blog xx .postbox -->
                </div><!-- <div id="normal-sortables" class="meta-box-sortables"> -->
            </div><!-- div id='postbox-container-1' class='postbox-container' END FOREACH -->
            <!-- /Grup4 -->
        </div> <!-- div id="dashboard-widgets" class="metabox-holder" -->
    </div> <!-- /#div id="dashboard-widgets-wrap" -->
</div> <!-- /#wrap -->
<script>
var form = jQuery('form');
jQuery( form ).each(function( index, element ) {
	var button = jQuery( element ).find('input[type="submit"]');
	jQuery( button ).removeClass('button-primary');
	jQuery( element ).hover(
	  function() {
		jQuery( button ).addClass('button-primary');
	  }, function() {
		jQuery( button ).removeClass('button-primary');
	  }
	);
});
</script>