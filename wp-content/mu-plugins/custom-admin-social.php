<?php
/*
Plugin Name: Custom Admin Social 720º
Plugin URI: http://www.720grados.com
Description: NEXT CONFERENCIAS DE AUTOR -> Permite configurar y consultar los perfiles de las Redes Sociales.
Version: 3.9.1 A
Author: aMirabet
Author URI: http://www.artur.es
License: GPL2
*/
//
/* PÀGINA SOCIAL ******************************************************/
//
//
//* REGISTREM LA PÀGINA SOCIAL */
function register_social_page(){
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$social_title = 'Redes Sociales';
			$social_menu_title = 'Social';
			$social_conf_title = 'Configuración de Redes Sociales';
			$social_menu_conf_title = 'Configuración';
		 }elseif( qtrans_getLanguage() == 'ca' ){
			$social_title = "Xarxes Socials";
			$social_menu_title = 'Social';
			$social_conf_title = "Configuració de les Xarxes Socials";
			$social_menu_conf_title = 'Configuració';
		 }else{
			$social_title = "Social Media";
			$social_menu_title = 'Social';
			$social_conf_title = "Social Config";
			$social_menu_conf_title = 'Config';
		 }
    }else{
		$social_title = 'Redes Sociales';
		$social_menu_title = 'Social';
		$social_conf_title = 'Configuración de Redes Sociales';
		$social_menu_conf_title = 'Configuración';
	}
	$add_social_page = add_menu_page( $social_title, $social_menu_title, 'read', 'social', 'admin_social_page', ' dashicons-twitter', 31 );
	$add_social_config_page = add_submenu_page( 'social', $social_conf_title, $social_menu_conf_title, 'manage_options', 'social_config', 'admin_social_config_page' ); 
	// Callbacks de la creacio de les pagines
    add_action( 'load-' . $add_social_page, 'load_social_js' );
	add_action( 'load-' . $add_social_config_page, 'load_social_config_js' );
	//
	// Lector_ Carrega el js
	function load_social_js(){
		// Unfortunately we can't just enqueue our scripts here - it's too early. So register against the proper action hook to do it
		add_action( 'admin_enqueue_scripts', 'enqueue_social_js' );
	}
	function enqueue_social_js(){
		// Registre d'scripts
		/* Enqueue scripts */
		wp_enqueue_script('dashboard');
	}
	//
	// Config Carrega els metaboxes i els js
	function load_social_config_js(){
		/* User can choose between 1 or 2 columns (default 2) */
		add_action( 'admin_enqueue_scripts', 'enqueue_social_config_js' );
	}
	function enqueue_social_config_js(){
		/* Enqueue WordPress' script for handling the metaboxes */
		wp_enqueue_script('postbox'); 
		add_action('admin_footer-social_page_social_config','footer_scripts_social');
	}
	function footer_scripts_social(){
		?>
		<script>jQuery(document).ready(function(){ postboxes.add_postbox_toggles(pagenow); });</script>
		<?php
	}
}
add_action( 'admin_menu', 'register_social_page' );
//
//Carreguem els estils a l'Admin
function admin_custom_social_styles($hook) {
	// Registre d'estils
	wp_register_style('customadminsocial-css', plugin_dir_url( __FILE__ ) . 'custom-admin-social/custom-admin-social.css', false, false);
	//Carrega estils
	wp_enqueue_style('customadminsocial-css');
}
add_action('admin_enqueue_scripts', 'admin_custom_social_styles');
//
/* CRIDEM LA PÀGINA PHP AMB LES XARXES SOCIALS */
function admin_social_page(){
	include_once(plugin_dir_path( __FILE__ ) . 'custom-admin-social/admin_social.php');
}
//
/* CRIDEM LA PÀGINA PHP AMB EL CONFIGURADOR SOCIAL */
function admin_social_config_page(){
	include_once(plugin_dir_path( __FILE__ ) . 'custom-admin-social/admin_social_config.php');
}
//
//
// REGISTREM ELS CAMPS D'OPCIONS PER A LA PÀGINA DE CONFIGURACIÓ
//
// Registrem tots els camps de les opcions
function social_config_register() {
	//Facebook
	register_setting( 'social_config_facebook', 'social_facebook' );
	add_option( 'social_facebook', '');
	//Twitter
	register_setting( 'social_config_twitter', 'social_twitter' );
	add_option( 'social_twitter', '');
	//Google Plus
	register_setting( 'social_config_gplus', 'social_gplus' );
	add_option( 'social_gplus', '');
	//YouTube
	register_setting( 'social_config_ytube', 'social_ytube' );
	add_option( 'social_ytube', '');
	//Linked In
	register_setting( 'social_config_lin', 'social_lin' );
	add_option( 'social_lin', '');
	//Instagram
	register_setting( 'social_config_igram', 'social_igram' );
	add_option( 'social_igram', '');
	//Pinterest
	register_setting( 'social_config_pinterest', 'social_pinterest' );
	add_option( 'social_pinterest', '');
	//Klout
	register_setting( 'social_config_klout', 'social_klout' );
	add_option( 'social_klout', '');

}
add_action( 'admin_init', 'social_config_register' );
//
//
// Funció de Validació > Si el camp está buit esborra la key de l'array
// Va a ser que no...
//
//
/* Escriptori > Social > Crear Widget ************/
function reg_ini_social() {
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$title = 'Social';
		}elseif( qtrans_getLanguage() == 'ca' ){
			$title = 'Social';
		}else{ //english 
			$title = 'Social';
		}
	}else{//Not activeQtrans
		$title = 'Social';
	}
	wp_add_dashboard_widget('red_ini_social', $title, 'wdgt_ini_social');
}
add_action('wp_dashboard_setup', 'reg_ini_social');
/* Escriptori > Social > Editar Widget ************/
function wdgt_ini_social() {
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$tag = "Redes Sociales";
		}elseif( qtrans_getLanguage() == 'ca' ){
			$tag = "Xarxes Socials";
		}else{ //english 
			$tag = "Socialmedia";
		}
	}else{//Not activeQtrans
		$tag = "Redes Sociales";
	}
	echo '<a class="wdgt_dash wdgt_social" href="' . admin_url('admin.php?page=social') . '"><b>' . $tag . '</b></a>';
}
//
?>