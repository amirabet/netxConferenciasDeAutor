<?php
/*
Plugin Name: Custom Admin Stats 720º
Plugin URI: http://www.720grados.com
Description: NEXT CONFERENCIAS DE AUTOR -> Permite configurar las página de condiciones legales.
Version: 3.9.1 A
Author: aMirabet
Author URI: http://www.artur.es
License: GPL2
*/
//
/* PLUGIN PER L'AVÍS LEGAL ******************************************************/
// Fa necessaris els següents elements (a part dels propis de la carpeta del plugin):
// Modificar page.php i page_full_width.php per a que filtri el contingut a partir de l'ID
// Modificar fold-flexslider.php per a que reculli la variable
// Modificar funcions_body_footer.php per a que reculli la URL de l'aviso legal
// Modificar la pàgina de formularis oln hi hagi enllaç  als Terms & Conditions (ID11)
// A Layout está l'arxiu de text snippet_legal.php
// Estils CSS (.warnings i #cookie_warning)
// Programacio JS per l'avis de cookies (custom.js)
//
//
//* REGISTREM LA PÀGINA STATS */
function register_legal_page(){
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$legal_title = 'Legal';
			$legal_menu_title = 'Aviso Legal';
		 }elseif( qtrans_getLanguage() == 'ca' ){
			$legal_title = "Legal";
			$legal_menu_title = 'Avís Legal';
		 }else{
			$legal_title = "Terms";
			$legal_menu_title = 'Terms and Conditions';
		 }
    }else{
		$legal_title = 'Legal';
		$legal_menu_title = 'Aviso Legal';
	}
	$add_legal_page = add_menu_page($legal_title, $legal_menu_title,  'manage_options', 'legal', 'admin_legal_page', 'dashicons-hammer', 58 );
	// Callbacks de la creacio de les pagines
    add_action( 'load-' . $add_legal_page, 'load_legal_js' );
	//
	// arrega el js
	function load_legal_js(){
		// Unfortunately we can't just enqueue our scripts here - it's too early. So register against the proper action hook to do it
		add_action( 'admin_enqueue_scripts', 'enqueue_legal_js' );
	}
	function enqueue_legal_js(){
		// Registre d'scripts
		/* Enqueue scripts */
		wp_enqueue_script('dashboard');
	}
}
add_action( 'admin_menu', 'register_legal_page' );
/* CRIDEM LA PÀGINA PHP AMB ELS STATS */
function admin_legal_page(){
	include_once(plugin_dir_path( __FILE__ ) . '/custom-admin-legal/admin_legal.php');
}
// REGISTREM ELS CAMPS D'OPCIONS PER A LA PÀGINA DE CONFIGURACIÓ
//
// Registrem tots els camps de les opcions
function legal_register() {
	// Empresa
	register_setting( 'legal_config_empresa', 'legal_empresa' );
	add_option( 'legal_empresa', '');
	// Web
	register_setting( 'legal_config_web', 'legal_web' );
	add_option( 'legal_web', '');
	// Hosting
	register_setting( 'legal_config_hosting', 'legal_hosting' );
	add_option( 'legal_hosting', '');
	// Cookies
	register_setting( 'legal_config_cookies', 'legal_cookies' );
	add_option( 'legal_cookies', '');
}
add_action( 'admin_init', 'legal_register' );
///WARNINGS ********************************************************************
function footer_warnings(){
	// Incluim avisos
	include_once(plugin_dir_path( __FILE__ ) . '/custom-admin-legal/snippet-warnings.php');
}
add_action('thematic_after','footer_warnings',10);
//
//
///COOKIES ********************************************************************
// Incloem l'avís de cookiesal layout
function footer_cookies() {
	//include cookies
	include_once(plugin_dir_path( __FILE__ ) . '/custom-admin-legal/snippet-cookies.php');
}
add_action('thematic_after','footer_cookies',11);
?>