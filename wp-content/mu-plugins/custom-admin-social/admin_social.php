<?php 
/****************************************************************

Permet consultar el feed / widgets de les xarxes socials configurades

****************************************************************/
/**
//
/* WIDGETS DELS BLOGS CONFIGURABLES ************************************
*************************************************************************/
//
//*****************************************************************
// Defineix a un array els widgets que estan disponibles
//en funció de les xarxes socials configurades:
//*****************************************************************
$social_array = array();
//
//Facebook**********************
$fb_array = get_option('social_facebook');
$fb_site_link = $fb_array['url'];
$fb_url_id = $fb_array['url_id'];
$fb_app_id = $fb_array['app_id'];
if (!empty ($fb_site_link)) {
	$output = '';
	$output .= '<div class="postbox " id="facebook">';
	$output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div>';
	$output .= '<h3 class="hndle">Facebook </h3><div class="inside"><span class="inside_wdgt">';
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$gotoblog = 'Ver el Perfil';
			$stats_notice ='Parece que no tienes configurada una App ID de Facebook';
			$stats_info = 'Puedes crear una App de Facebook y copiar su ID <b><a href="https://developers.facebook.com/apps/" target="_blank">AQUÍ</a></b>.</p><p>Cuando tengas tu App ID debes introducirla en el campo pertinente en la página <b><a href="admin.php?page=social_config" target="_self">Social -> Configuración</a></b>.';
		}elseif( qtrans_getLanguage() == 'ca' ){ 
			$gotoblog = 'Vés al Perfil';
			$stats_notice ='Sembla que no tens configurada una App ID de Facebook';
			$stats_info = 'Pots cerar una App de Facebook i copiar-ne l\'ID <b><a href="https://developers.facebook.com/apps/" target="_blank">AQUÍ</a></b>.</p><p>Un cop tinguis l\'ID de l\'App l\'has d\'introduïr al camp pertinent a la pàgina <b><a href="admin.php?page=social_config" target="_self">Social -> Configuració</a></b>.';
		}else{ //english
			$gotoblog = 'Profile';
			$stats_notice ='Looks like a Facebook App ID hasn\'t been set';
			$stats_info = 'Create and copy App\'s ID <b><a href="https://developers.facebook.com/apps/" target="_blank">HERE</a></b>.</p><p>Once you know your App ID you must set it in its own field at page <b><a href="admin.php?page=social_config" target="_self">Social -> Settings</a></b>.';
		}
	}else{//Not activeQtrans
		$gotoblog = 'Ver el Perfil';
		$stats_notice ='Parece que no tienes configurada una App ID de Facebook';
		$stats_info = 'Puedes crear una App de Facebook y copiar su ID <b><a href="https://developers.facebook.com/apps/" target="_blank">AQUÍ</a></b>.</p><p>Cuando tengas tu App ID debes introducirla en el campo pertinente en la página <b><a href="admin.php?page=social_config" target="_self">Social -> Configuración</a></b>.';
	}
	if (!empty ($fb_app_id)){ //1398228117096999
		$output .= '<div id="fb-root"></div><script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&appId=' . $fb_app_id . '&version=v2.0";fjs.parentNode.insertBefore(js, fjs);}(document, \'script\', \'facebook-jssdk\'));</script>';
		$output .= '<div class="fb-like-box" data-href="https://www.facebook.com/' . $fb_site_link . '" data-width="280" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="true" data-show-border="true"></div><br/><br/>';
	}else{
		$output .= '<div class="notice"><p><i>' . $stats_notice . '</i></p></div>';
		if ( current_user_can('manage_options') ) { $output .= '<p>' . $stats_info . '</p><br/>'; }
	}
	$output .= '<b><a href="http://www.facebook.com/' . $fb_site_link . '" target="_blank" title="Facebook" class="alignright button ">' . $gotoblog . '</a></b><br/><div class="clear"></div>';
	$output .= '</span></div><!-- div class="inside " -->';
	$output .= '</div><!-- div class="postbox " -->';
	$social_array[] = $output;
}
//
//Twitter **********************
$tw_array = get_option('social_twitter');
$tw_site_link = $tw_array['url'];
$tw_wdgt = $tw_array['wdgt_id'];
if (!empty ($tw_site_link)) {
	$output = '';
	$output .= '<div class="postbox " id="twitter">';
	$output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div>';
	$output .= '<h3 class="hndle">Twitter </h3><div class="inside"><span class="inside_wdgt">';
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$gotoblog = 'Ver el Perfil';
			$stats_notice ='Parece que no tienes configurado tu ID de Widget';
			$stats_info = 'Puedes crear un Widget y copiar su ID <b><a href="https://twitter.com/settings/widgets" target="_blank">AQUÍ</a></b>.</p><p>Cuando tengas tu ID de Widget debes introducirlo en el campo pertinente en la página <b><a href="admin.php?page=social_config" target="_self">Social -> Configuración</a></b>.';
		}elseif( qtrans_getLanguage() == 'ca' ){ 
			$gotoblog = 'Vés al Perfil';
			$stats_notice ='Sembla que no tens configurat el teu ID de Widget';
			$stats_info = 'Pots crear un Widget i copiar-ne l\'ID <b><a href="https://twitter.com/settings/widgets" target="_blank">AQUÍ</a></b>.</p><p>Un cop tinguis l\'ID de Widget has d\'introduir-lo al camp pertinent a la pàgina <b><a href="admin.php?page=social_config" target="_self">Social -> Configuració</a></b>.';
		}else{ //english
			$gotoblog = 'Profile';
			$stats_notice ='Looks like a Widget ID hasn\'t been set';
			$stats_info = 'Create and copy Widget\'s ID <b><a href="https://twitter.com/settings/widgets" target="_blank">HERE</a></b>.</p><p>Once you know your widget ID you must set it in its own field at page <b><a href="admin.php?page=social_config" target="_self">Social -> Settings</a></b>.';
		}
	}else{//Not activeQtrans
		$gotoblog = 'Ver el Perfil';
		$stats_notice ='Parece que no tienes configurado tu ID de Widget';
		$stats_info = 'Puedes crear un Widget y copiar su ID <b><a href="https://twitter.com/settings/widgets" target="_blank">AQUÍ</a></b>.</p><p>Cuando tengas tu ID de Widget debes introducirlo en el campo pertinente en la página <b><a href="admin.php?page=social_config" target="_self">Social -> Configuración</a></b>.';
	}
	if (!empty ($tw_wdgt)){ //Si hi ha ID del Widget el construim 
		$output .= '<a class="twitter-timeline" href="https://twitter.com/' . $tw_site_link . '" data-widget-id="' . $tw_wdgt . '">Tweets por @' . $tw_site_link . '</a>';
		$output .= '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script><br/><br/>';
	}else{ //Si no hi ha ID del Widget de Twitter
		$output .= '<div class="notice"><p><i>' . $stats_notice . '</i></p></div>';
		if ( current_user_can('manage_options') ) {  $output .= '<p>' . $stats_info . '</p><br/>'; }
	}
	$output .= '<b><a href="http://www.twitter.com/' . $tw_site_link . '" target="_blank" title="Twitter" class="alignright button ">' . $gotoblog . '</a></b><br/><div class="clear"></div>';
	$output .= '</span></div><!-- div class="inside " -->';
	$output .= '</div><!-- div class="postbox " -->';
	$social_array[] = $output;
}//
//
//
//Google Plus **********************
$gplus_array = get_option('social_gplus');
$gp_site_link = $gplus_array['url'];
if (!empty ($gp_site_link)) {
	$output = '';
	$output .= '<div class="postbox " id="gplus">';
	$output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div>';
	$output .= '<h3 class="hndle">Google+ </h3><div class="inside"><span class="inside_wdgt">';
	$output .= '<div class="g-page" data-width="280" data-href="https://plus.google.com/' . $gp_site_link . '" data-rel="publisher"></div>';
	$output .= '<script type="text/javascript">window.___gcfg = {lang: \'es\'};(function() {var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;po.src = \'https://apis.google.com/js/platform.js\'; var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s); })();</script><br/><br/>';
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$gotoblog = 'Ver el Perfil';
		}elseif( qtrans_getLanguage() == 'ca' ){ 
			$gotoblog = 'Vés al Perfil';
		}else{ //english
			$gotoblog = 'Profile';
		}
	}else{//Not activeQtrans
		$gotoblog = 'Ver el Perfil';
	}
	$output .= '<b><a href="https://plus.google.com/' . $gp_site_link . '" target="_blank" title="Google Plus" class="alignright button ">' . $gotoblog . '</a></b><br/><div class="clear"></div>';
	$output .= '</span></div><!-- div class="inside " -->';
	$output .= '</div><!-- div class="postbox " -->';
	$social_array[] = $output;
}//
//
//
//You Tube **********************
$ytube_array = get_option('social_ytube');
$yt_site_link = $ytube_array['url'];
$playlist = $ytube_array['playlist'];
if (!empty ($yt_site_link)) {
	$output = '';
	$output .= '<div class="postbox " id="ytube">';
	$output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div>';
	$output .= '<h3 class="hndle">YouTube </h3><div class="inside">';
	$output .= '<script src="https://apis.google.com/js/platform.js"></script><div class="g-ytsubscribe" data-channel="' . $yt_site_link . '" data-layout="full" data-count="undefined"></div><br/><br/>';
	if (!empty ($playlist)) {
		$output .= '<iframe width="280" height="158" src="//www.youtube.com/embed/videoseries?list=' . $playlist . '" frameborder="0" allowfullscreen></iframe><br/><br/>';
	}
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$gotoblog = 'Ver el Perfil';
		}elseif( qtrans_getLanguage() == 'ca' ){ 
			$gotoblog = 'Vés al Perfil';
		}else{ //english
			$gotoblog = 'Profile';
		}
	}else{//Not activeQtrans
		$gotoblog = 'Ver el Perfil';
	}
	$output .= '<b><a href="https://www.youtube.com/user/' . $yt_site_link . '" target="_blank" title="You Tube" class="alignright button ">' . $gotoblog . '</a></b><br/><div class="clear"></div>';
	$output .= '</span></div><!-- div class="inside " -->';
	$output .= '</div><!-- div class="postbox " -->';
	$social_array[] = $output;
}
//
//
//Linked In **********************
$lin_array = get_option('social_lin');
$lin_site_link = $lin_array['url'];
$lin_wdgt = $lin_array['w_id'];
if (!empty ($lin_site_link)) {
	$output = '';
	$output .= '<div class="postbox " id="lin">';
	$output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div>';
	$output .= '<h3 class="hndle"> LinkedIn </h3><div class="inside"><span class="inside_wdgt">';
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$gotoblog = 'Ver el Perfil';
			$stats_notice ='Parece que no tienes configurado tu ID de Widget';
			$stats_info = 'Puedes crear un Widget y copiar su ID <b><a href="https://developer.linkedin.com/plugins/company-profile-plugin" target="_blank">AQUÍ</a></b>.</p><p>Cuando tengas tu ID de Widget debes introducirlo en el campo pertinente en la página <b><a href="admin.php?page=social_config" target="_self">Social -> Configuración</a></b>.';
		}elseif( qtrans_getLanguage() == 'ca' ){ 
			$gotoblog = 'Vés al Perfil';
			$stats_notice ='Sembla que no tens configurat el teu ID de Widget';
			$stats_info = 'Pots crear un Widget i copiar-ne l\'ID <b><a href="https://developer.linkedin.com/plugins/company-profile-plugin" target="_blank">AQUÍ</a></b>.</p><p>Un cop tinguis l\'ID de Widget has d\'introduir-lo al camp pertinent a la pàgina <b><a href="admin.php?page=social_config" target="_self">Social -> Configuració</a></b>.';
		}else{ //english
			$gotoblog = 'Profile';
			$stats_notice ='Looks like a Widget ID hasn\'t been set';
			$stats_info = 'Create and copy Widget\'s ID <b><a href="https://developer.linkedin.com/plugins/company-profile-plugin" target="_blank">HERE</a></b>.</p><p>Once you know your widget ID you must set it in its own field at page <b><a href="admin.php?page=social_config" target="_self">Social -> Settings</a></b>.';
		}
	}else{//Not activeQtrans
		$gotoblog = 'Ver el Perfil';
		$stats_notice ='Parece que no tienes configurado tu ID de Widget';
		$stats_info = 'Puedes crear un Widget y copiar su ID <b><a href="https://developer.linkedin.com/plugins/company-profile-plugin" target="_blank">AQUÍ</a></b>.</p><p>Cuando tengas tu ID de Widget debes introducirlo en el campo pertinente en la página <b><a href="admin.php?page=social_config" target="_self">Social -> Configuración</a></b>.';
	}
	if (!empty ($lin_wdgt)){
		$output .= '<script src="//platform.linkedin.com/in.js" type="text/javascript"></script><script type="IN/CompanyProfile" data-id="' . $lin_site_link . '" data-format="inline" data-related="false" data-width="300"></script><br/ ><br/ >';
	}else{
		$output .= '<div class="notice"><p><i>' . $stats_notice . '</i></p></div>';
		$output .= '<p>' . $stats_info . '</p><br/>';
	}
	$output .= '<b><a href="https://www.linkedin.com/company/' . $lin_site_link . '" target="_blank" title="Linked In" class="alignright button ">' . $gotoblog . '</a></b><br/><div class="clear"></div>';
	$output .= '</span></div><!-- div class="inside " -->';
	$output .= '</div><!-- div class="postbox " -->'; 
	$social_array[] = $output;
}
//
//
//Instagram **********************
$igram_array = get_option('social_igram');
$ig_site_link = $igram_array['url'];
$ig_id = $igram_array['id'];
$ig_accss = $igram_array['accss'];
$ig_client = $igram_array['client'];
if (!empty ($ig_site_link)) {
	$output = '';
	$output .= '<div class="postbox " id="igram">';
	$output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div>';
	$output .= '<h3 class="hndle">Instagram</h3><div class="inside"><span class="inside_wdgt">';
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$gotoblog = 'Ver el Perfil';
			$stats_notice ='Parece que no tienes configurado tu <b>ID de Usuario</b> ni <b>ID de Acceso</b>';
			$stats_info = 'Puedes configurar un nuevo Cliente y copiar su ID de Acceso <b><a href="http://instagram.com/developer/clients/manage/" target="_blank">AQUÍ</a></b>.<br/>Para saber tu ID de Usuario puedes hacerlo desde <b><a href="http://jelled.com/instagram/lookup-user-id" target="_blank">AQUÍ</a></b>.</p><p>Cuando tengas estos datos debes introducirlos en sus campos pertinentes en la página <b><a href="admin.php?page=social_config" target="_self">Social -> Configuración</a></b>.';
		}elseif( qtrans_getLanguage() == 'ca' ){ 
			$gotoblog = 'Vés al Perfil';
			$stats_notice ='Sembla que no tens configurat el teu <b>ID d\'Usuari</b> ni <b>ID d\'Accés</b>';
			$stats_info = 'Pots configurar un nou Client i copiar-ne l\'ID d\'Accés <b><a href="http://instagram.com/developer/clients/manage/" target="_blank">AQUÍ</a></b>.<br/>Per saber el teu ID d\'Usuari pots dirigir-te  <b><a href="http://jelled.com/instagram/lookup-user-id" target="_blank">AQUÍ</a></b>.</p><p>Un cop tinguis aquestes dades has d\'introduir-les als camps pertinents de la pàgina <b><a href="admin.php?page=social_config" target="_self">Social -> Configuració</a></b>.';
		}else{ //english
			$gotoblog = 'Profile';
			$stats_notice ='Looks like <b>Access/<b> and <b>User ID</b>  haven\'t been set';
			$stats_info = 'Create a new Client and copy Access\' ID <b><a href="http://instagram.com/developer/clients/manage/" target="_blank">HERE</a></b>.<br/>To know your User ID you can go  <b><a href="http://jelled.com/instagram/lookup-user-id" target="_blank">HERE</a></b></p><p>Once you know your User and Access ID you must set it in their respective fields at page <b><a href="admin.php?page=social_config" target="_self">Social -> Settings</a></b>.';
		}
	}else{//Not activeQtrans
		$gotoblog = 'Ver el Perfil';
		$stats_notice ='Parece que no tienes configurado tu <b>ID de Usuario</b> ni <b>ID de Acceso</b>';
		$stats_info = 'Puedes configurar un nuevo Cliente y copiar su ID de Acceso <b><a href="http://instagram.com/developer/clients/manage/" target="_blank">AQUÍ</a></b>.<br/>Para saber tu ID de Usuario puedes hacerlo desde <b><a href="http://jelled.com/instagram/lookup-user-id" target="_blank">AQUÍ</a></b>.</p><p>Cuando tengas estos datos debes introducirlos en sus campos pertinentes en la página <b><a href="admin.php?page=social_config" target="_self">Social -> Configuración</a></b>.';
	}
	if (!empty ($ig_id) && !empty ($ig_accss) ){
		$output .= '<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-instagram/0.2.2/jquery.instagram.min.js"></script>';
		$output .= "<span id='ig_render'><script>jQuery('#ig_render').instagram({ userId: " . $ig_id . ", show: 6, accessToken: '" . $ig_accss . "'});</script></span><div class=\"clear\"></div><br/ ><br/ >";
	}else{
		$output .= '<div class="notice"><p><i>' . $stats_notice . '</i></p></div>';
		if ( current_user_can('manage_options') ) { $output .= '<p>' . $stats_info . '</p><br/>'; }
	}
	$output .= '<b><a href="https://www.instagram.com/' . $ig_site_link . '" target="_blank" title="Instagram" class="alignright button ">' . $gotoblog . '</a></b><br/><div class="clear"></div>';
	$output .= '</span></div><!-- div class="inside " -->';
	$output .= '</div><!-- div class="postbox " -->'; 
	$social_array[] = $output;
}
//
//
//Pinterest **********************
$pin_array = get_option('social_pinterest');
$pin_site_link = $pin_array['url'];
if (!empty ($pin_site_link)) {
	$output = '';
	$output .= '<div class="postbox " id="pin">';
	$output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div>';
	$output .= '<h3 class="hndle">Pinterest</h3><div class="inside"><span class="inside_wdgt">';
	$output .= '<a data-pin-do="embedUser" href="http://es.pinterest.com/' . $pin_site_link . '" data-pin-scale-width="50" data-pin-scale-height="200" data-pin-board-width="300">Pinterest</a><script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script><br /><br />';
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$gotoblog = 'Ver el Perfil';
		}elseif( qtrans_getLanguage() == 'ca' ){ 
			$gotoblog = 'Vés al Perfil';
		}else{ //english
			$gotoblog = 'Profile';
		}
	}else{//Not activeQtrans
		$gotoblog = 'Ver el Perfil';
	}
	$output .= '<b><a href="https://www.pinterest.com/' . $pin_site_link . '" target="_blank" title="Pinterest" class="alignright button ">' . $gotoblog . '</a></b><br/><div class="clear"></div>';
	$output .= '</span></div><!-- div class="inside " -->';
	$output .= '</div><!-- div class="postbox " -->'; 
	$social_array[] = $output;
}
//
//
//Klout **********************
$klout_array = get_option('social_klout');
$kl_site_link = $klout_array['url'];
if (!empty ($kl_site_link)) {
	$output = '';
	$output .= '<div class="postbox " id="klout">';
	$output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div>';
	$output .= '<h3 class="hndle">Klout</h3><div class="inside"><span class="inside_wdgt">';
	$output .= '<iframe src="http://widgets.klout.com/badge/' . $kl_site_link . '" scrolling="no" allowtransparency="true" frameborder="0" width="200px" height="100px">< /iframe ></iframe><br/ ><br/ >';
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$gotoblog = 'Ver el Perfil';
		}elseif( qtrans_getLanguage() == 'ca' ){ 
			$gotoblog = 'Vés al Perfil';
		}else{ //english
			$gotoblog = 'Profile';
		}
	}else{//Not activeQtrans
		$gotoblog = 'Ver el Perfil';
	}
	$output .= '<b><a href="https://www.klout.com/' . $kl_site_link . '" target="_blank" title="Klout" class="alignright button ">' . $gotoblog . '</a></b><br/><div class="clear"></div>';
	$output .= '</span></div><!-- div class="inside " -->';
	$output .= '</div><!-- div class="postbox " -->'; 
	$social_array[] = $output;
}
//
//
?>
<div class="wrap">
    <?php 
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){	?>
			<h2>Redes Sociales</h2>
		<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
			<h2>Xarxes Socials</h2>
		<?php }else{ //english ?>
			<h2>SocialMedia</h2>
		<?php } 
	}else{//Not activeQtrans ?>
    	<h2>Redes Sociales</h2>
	<?php } 
	if (empty ($social_array[0])) { //Si no tenim configuracions per les xarxes socials ?>
    <div class="metabox-holder no-widget" id="nosocial">
    	<div class="postbox">
        	<div class="handlediv" title="Click to toggle."><br></div>
        		<h3 class="hndle"><span>
                	<?php if (function_exists('qtrans_getLanguage')){
						 if( qtrans_getLanguage() == 'es' ){	?>
                            Sin Redes Sociales
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
                            Sense Xarxes Socials
                        <?php }else{ //english ?>
                            No SocialMedia
                        <?php }
        			}else{//Not activeQtrans ?>
                        Sin Redes Sociales
                    <?php } ?>
                </span></h3>
        	<div class="inside">
            	<div class="dashicons dashicons-dismiss alignleft" style="font-size:60px; display:block; width:72px; height:72px; text-align:left; float:left;"></div>
                <?php if (function_exists('qtrans_getLanguage')){
					if( qtrans_getLanguage() == 'es' ){	?>
                        <p><b>No hay ninguna Red Social configurada.</b></p>
                         <?php if ( current_user_can('manage_options') ) { ?><p>Puedes configurar las Redes Sociales vinculadas a tu empresa en la página <b><a href="admin.php?page=social_config" target="_self">Configuración</a></b>.<br/><br/></p> <?php }?>
                    <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
                        <p><b>No hi ha cap Xarxa Social configurada.</b></p>
                        <?php if ( current_user_can('manage_options') ) { ?><p>Pots configurar les Xarxes Socials vinculades a la teva empresa a la pàgina <b><a href="admin.php?page=social_config" target="_self">Configuració</a></b>.<br/><br/></p><?php }?>
                    <?php }else{ //english ?>
                        <p><b>There's any Social Media Channel set.</b></p>
                        <?php if ( current_user_can('manage_options') ) { ?><p>You can link your business' Social Media Channels at <b><a href="admin.php?page=social_config" target="_self">Settings</a></b> Page.<br/><br/></p><?php }?>
                    <?php }
            	}else{//Not activeQtrans ?>
                	<p><b>No hay ninguna Red Social configurada.</b></p>
                    <?php if ( current_user_can('manage_options') ) { ?><p>Puedes configurar las Redes Sociales vinculadas a tu empresa en la página <b><a href="admin.php?page=social_config" target="_self">Configuración</a></b>.<br/><br/></p> <?php }?>
                <?php } ?>
			</div>
    	</div>
	</div>
	<?php }else{ // Construim la pagina si hi ha elements a l'array   
	//Inclou el lector d'RSS
	//include_once( ABSPATH . WPINC . '/feed.php' );?>
        <div id="dashboard-widgets-wrap">
            <div id="dashboard-widgets" class="metabox-holder">
                <!-- POSTBOX CONTAINER 1 **************************************** -->
                <div id='postbox-container-1' class='postbox-container'>
                    <div id="normal-sortables1" class="meta-box-sortables">
                        <!-- Postbox -->
                        <?php // Imprimim els widgets disponibles
						print_r($social_array[0]); 
						if (!empty ($social_array[4])) {
							print_r($social_array[4]); 
						}
						?>
                    </div><!-- div id="normal-sortables" class="meta-box-sortables-->
                </div><!-- div id='postbox-container-1' class='postbox-container' -->
                <!-- FINAL POSTBOX CONTAINER 1 **************************************** -->
                <!-- POSTBOX CONTAINER 2 **************************************** -->
                <div id='postbox-container-2' class='postbox-container'>
                    <div id="normal-sortables2" class="meta-box-sortables">
                    	<!-- Postbox -->
                        <?php // Imprimim els widgets disponibles
						if (!empty ($social_array[1])) {
							print_r($social_array[1]); 
						}
						if (!empty ($social_array[5])) {
							print_r($social_array[5]); 
						}
						?>
                    </div><!-- div id="normal-sortables" class="meta-box-sortables-->
                </div><!-- div id='postbox-container-1' class='postbox-container' -->
                <!-- FINAL POSTBOX CONTAINER 2 **************************************** -->
                <!-- POSTBOX CONTAINER 3 **************************************** -->
                <div id='postbox-container-3' class='postbox-container'>
                    <div id="normal-sortables3" class="meta-box-sortables">
                    	<!-- Postbox -->
                        <?php // Imprimim els widgets disponibles
						if (!empty ($social_array[2])) {
							print_r($social_array[2]); 
						}
						if (!empty ($social_array[6])) {
							print_r($social_array[6]); 
						}
						?>
                    </div><!-- div id="normal-sortables" class="meta-box-sortables-->
                </div><!-- div id='postbox-container-1' class='postbox-container' -->
                <!-- FINAL POSTBOX CONTAINER 3 **************************************** -->
                <!-- POSTBOX CONTAINER 4 **************************************** -->
                <div id='postbox-container-4' class='postbox-container'>
                    <div id="normal-sortables4" class="meta-box-sortables">
                    	<!-- Postbox -->
                        <?php // Imprimim els widgets disponibles
						if (!empty ($social_array[3])) {
							print_r($social_array[3]); 
						}
						if (!empty ($social_array[7])) {
							print_r($social_array[7]); 
						}
						?>
                    </div><!-- div id="normal-sortables" class="meta-box-sortables-->
                </div><!-- div id='postbox-container-1' class='postbox-container' -->
                <!-- FINAL POSTBOX CONTAINER 4 **************************************** -->
            </div> <!-- div id="dashboard-widgets" class="metabox-holder" -->
        </div> <!-- /#div id="dashboard-widgets-wrap" -->
	<?php } //End if global ?>
</div> <!-- /#wrap -->
<script>
jQuery('body.toplevel_page_social').css('background','none');
var widget = jQuery('.inside');
jQuery( widget ).each(function( index, element ) {
	var button = jQuery( element ).find('a.button');
	jQuery( element ).hover(
	  function() {
		jQuery( button ).addClass('button-primary');
	  }, function() {
		jQuery( button ).removeClass('button-primary');
	  }
	);
});
</script>