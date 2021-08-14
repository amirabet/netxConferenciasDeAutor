<?php
//****************************************************************************************/
//
//  Child Theme NEXT Conferencias de Autor Functions
//  
//  FUNCTIONS > BODY > FOOTER --> Defineix els elements del Footer
//
//********************************************************************************************/
//
///FOOTER ********************************************************************
//Esborrem el SITEinfo
function childtheme_override_siteinfoopen(){
	//slience
}
function childtheme_override_siteinfo(){
	//slience
}
function childtheme_override_siteinfoclose(){
	//slience
}
///FOOTER ********************************************************************
function footer_nextfooter() {
	// Perfils Socialmedia
	$fb_array = get_option('social_facebook');
	if (isset($fb_array['url']) && $fb_array['url'] != ''){
		$fb_url = $fb_array['url'];
	}
	$tw_array = get_option('social_twitter');
	if (isset($tw_array['url']) && $tw_array['url'] != ''){
		$tw_url = $tw_array['url'];
	}
	$gplus_array = get_option('social_gplus');
	if (isset($gplus_array['url']) && $gplus_array['url'] != ''){
		$gplus_url = $gplus_array['url'];
	}
	// Mail de Contacte Empresarial
	$company_mail_acf = get_field('company_email', 'user_2');
	if (isset($user_mail_acf) && $user_mail_acf != ''){
		$user_mail = $company_mail_acf;
	}else{ //Manual
		$user_mail ='info@nextconferencias.com';
	}
	// Idioma
	if (function_exists('qtrans_getLanguage')){
		$lang = qtrans_getLanguage();
		if( qtrans_getLanguage() == 'es' ){
			$conferencias = 'Conferencias de Autor';
			$aviso = 'Aviso Legal';
			$iniciativa ='Una iniciativa de';
			$agencia = 'Agencia Literaria';
		}elseif( qtrans_getLanguage() == 'ca' ){
			$conferencias = 'Conferències d\'Autor';
			$aviso = 'Avís Legal';
			$iniciativa ='Una iniciativa de';
			$agencia = 'Agència Literària';
		}else{
			$conferencias = 'Author Conferences';
			$aviso = 'Disclaimer';
			$iniciativa ='Made by';
			$agencia = 'Literary Agency';
		}
	}else{//Not activeQtrans
		$conferencias = 'Conferencias de Autor';
		$aviso = 'Aviso Legal';
		$iniciativa ='Una iniciativa de';
		$agencia = 'Agencia Literaria';
		$toppage ='Ir Arriba';
	}
	echo '<ul>';
	echo '<li class="col_2-1">';
	if(!empty($fb_url) || !empty($tw_url) || !empty($gplus_url)) {
		echo '<ul id="sociallinks">';
		if(!empty($fb_url)) {echo '<li><a href="http://www.facebook.com/' . $fb_url . '" target="_blank" title="NEXT @ facebook" class="animated"><i class="fa fa-facebook"></i> facebook</a></li>';}
		if(!empty($tw_url)) {echo '<li><a href="http://www.twitter.com/' . $tw_url . '" target="_blank" title="NEXT @ twitter" class="animated"><i class="fa fa-twitter"></i> twitter</a></li>';}
		if(!empty($gplus_url)) {echo '<li><a href="https://plus.google.com/' . $gplus_url . '" target="_blank" title="NEXT @ Google+" class="animated"><i class="fa fa-google-plus"></i> google+</a></li>';}
		echo '</ul>';
	}//!empty sociallinks
	echo '<span><h5><em>NEXT</em> ' . $conferencias . '</h5></span>';
	echo '<span class="footer_mail"><a href="mailto:' . antispambot( $user_mail ) . '"><i class="fa fa-envelope-o"></i>' . antispambot( $user_mail ) . '</a></span>';
	echo '</li>';
	echo '<li class="col_2-1">';
	echo '<span id="empresa_datos">';
	echo '<p>' . $iniciativa . '<br /><a href="http://www.zarana.es" target="_blank" title="Zarana ' . $agencia . '" class="zarana"><img src="' . get_stylesheet_directory_uri() . '/images/layout/zarana.gif" alt="Zarana ' . $agencia . '" /></a> &copy;' . date('Y');
	$web_array = get_option('legal_web');
	if ( isset($web_array['url_legal']) && $web_array['url_legal'] != ''){
		$url_legal = $web_array['url_legal'];
		if ( isset($web_array['id_legal']) && $web_array['id_legal'] != ''){
			$id_legal = $web_array['id_legal'];
			if (!is_page($id_legal)){echo '<a href="' . get_site_url() . $url_legal . '" title="' . $aviso . '">' . $aviso . '</a>';}
		}else{
		echo '<a href="" title="' . $aviso . '">' . $aviso . '</a>';
		}
	}
	echo '</p>';
	echo '</span>';
	echo '</li>';
	echo '</ul>';
}
add_action('thematic_footer','footer_nextfooter',99);
///SUBFOOTER ********************************************************************
function footer_addsubfooter(){
	// Idioma
	if (function_exists('qtrans_getLanguage')){
		$lang = qtrans_getLanguage();
		$login_lang = '/' . $lang;
		if( qtrans_getLanguage() == 'es' ){
			$login_admin = 'Administración';
			$toppage ='Ir Arriba';
		}elseif( qtrans_getLanguage() == 'ca' ){
			$login_admin = 'Administració';
			$toppage ='Vés a Dalt';
		}else{
			$login_admin = 'Admin';
			$toppage ='To Top';
		}
	}else{//Not activeQtrans
		$lang = '';
		$login_lang = '';
		$login_admin = 'Administración';
		$toppage ='Ir Arriba';
	}
	echo '<aside id=subfooter>';
	echo '<div class="subfooter_wrapper">';
	echo '<span id="footer_login">';
	echo '<a href="' . get_bloginfo('url') . $login_lang . '/wp-admin/" target="_self" title="LOGIN">'; 
	if ( is_user_logged_in() ) { echo '<i class="fa fa-unlock-alt"></i>' . $login_admin . '</a>'; }else{ echo '<i class="fa fa-lock"></i>' . $login_admin . '</a>'; }
	echo '</span>';
	echo '<span id="totop_wrap"><a href="#toppage" id="to_top" class="animated">' . $toppage . '<i class="fa fa-chevron-up"></i ></a></span>';
	echo '</div>';
	echo '</aside>';
}
add_action('thematic_after','footer_addsubfooter',10);
//
// load google analytics @WP_FOOTER *******************************************
$analtytics_array = get_option('stats_analytics');
if (isset($analtytics_array['id']) && $analtytics_array['id'] != ''){
	// Funció del codi
	function footer_google_analytics(){ 
		$analtytics_array = get_option('stats_analytics');
		$analtytics_id = $analtytics_array['id']; ?>
		<script>var _gaq=[['_setAccount','<?php echo $analtytics_id ?>'],['_trackPageview']];(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.src='//www.google-analytics.com/ga.js';s.parentNode.insertBefore(g,s)}(document,'script'))</script>
        <!-- <script type='text/javascript' src='<?php //echo get_stylesheet_directory() . '/js/ga_social_tracking.js' ?>'></script> -->
	<?php }
	add_action('wp_footer', 'footer_google_analytics');
}?>