<?php
/*
Plugin Name: Custom Admin Reader 720º
Plugin URI: http://www.720grados.com
Description: NEXT CONFERENCIAS DE AUTOR ->Módulo que incluye un lector de RSS (blogs). 
Version: 3.9.1 A
Author: aMirabet
Author URI: http://www.artur.es
License: GPL2
*/
//
//
/* PÀGINA LECTOR RSS ******************************************************/
//
//
//* REGISTREM LA PÀGINA LECTOR RSS */
function register_reader_page(){
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$reader_title = 'Lector de Blogs';
			$reader_menu_title = 'Lector';
			$reader_conf_title = 'Configuración RSS';
			$reader_menu_conf_title = 'Configuración';
		 }elseif( qtrans_getLanguage() == 'ca' ){
			$reader_title = "Lector de Blogs";
			$reader_menu_title = 'Lector';
			$reader_conf_title = "Configuració RSS";
			$reader_menu_conf_title = 'Configuració';
		 }else{
			$reader_title = "Blogs Reader";
			$reader_menu_title = 'Reader';
			$reader_conf_title = "RSS Config";
			$reader_menu_conf_title = 'Config';
		 }
    }else{
		$reader_title = 'Lector de Blogs';
		$reader_menu_title = 'Lector';
		$reader_conf_title = 'Configuración RSS';
		$reader_menu_conf_title = 'Configuración';
	}
	$add_reader_page = add_menu_page( $reader_title, $reader_menu_title, 'read', 'reader', 'admin_reader_page', 'dashicons-rss', 30 );
	$add_reader_config_page = add_submenu_page( 'reader', $reader_conf_title, $reader_menu_conf_title, 'manage_options', 'reader_config', 'admin_reader_config_page' ); 
	// Callbacks de la creacio de les pagines
    add_action( 'load-' . $add_reader_page, 'load_reader_js' );
	add_action( 'load-' . $add_reader_config_page, 'load_reader_config_js' );
	//
	// Lector_ Carrega el js
	function load_reader_js(){
		// Unfortunately we can't just enqueue our scripts here - it's too early. So register against the proper action hook to do it
		add_action( 'admin_enqueue_scripts', 'enqueue_reader_js' );
	}
	function enqueue_reader_js(){
		// Registre d'estils
		wp_register_style('customadmin-reader-css', plugin_dir_url( __FILE__ ) . 'custom-admin-reader/custom-admin-reader.css', false, false);
		//Carrega estils
		wp_enqueue_style('customadmin-reader-css');
		/* Enqueue WordPress' DASHBOARD SCRIPT */
		wp_enqueue_script('dashboard');
	}
	//
	// Config Carrega els metaboxes i els js
	function load_reader_config_js(){
		/* User can choose between 1 or 2 columns (default 2) */
		add_action( 'admin_enqueue_scripts', 'enqueue_reader_config_js' );
	}
	function enqueue_reader_config_js(){
		/* Enqueue WordPress' script for handling the metaboxes */
		wp_enqueue_script('postbox'); 
		add_action('admin_footer-lector_page_reader_config','footer_scripts_reader');
	}
	function footer_scripts_reader(){
		?>
		<script>jQuery(document).ready(function(){ postboxes.add_postbox_toggles(pagenow); });</script>
		<?php
	}
//
}
add_action( 'admin_menu', 'register_reader_page' );
//
//Carreguem els estils a l'Admin
function admin_custom_reader_scripts($hook) {
	// Registre d'estils
	wp_register_style('customadminreader-css', plugin_dir_url( __FILE__ ) . 'custom-admin-reader/custom-admin-reader.css', false, false);
	//Carrega estils
	wp_enqueue_style('customadminreader-css');		
}
add_action('admin_enqueue_scripts', 'admin_custom_reader_scripts');
//
/* CRIDEM LA PÀGINA PHP AMB EL LECTOR RSS */
function admin_reader_page(){
	include_once(plugin_dir_path( __FILE__ ) . 'custom-admin-reader/admin_reader.php');
}
//
/* CRIDEM LA PÀGINA PHP AMB EL CONFIGURADOR RSS */
function admin_reader_config_page(){
	include_once(plugin_dir_path( __FILE__ ) . 'custom-admin-reader/admin_reader_config.php');
}
//
//
// REGISTREM ELS CAMPS D'OPCIONS PER A LA PÀGINA DE CONFIGURACIÓ
//
// Registrem tots els camps de les opcions
function reader_config_register() {
	//Grup1
	register_setting( 'reader_config_gr1', 'reader_config_gr1_title' );
	add_option( 'reader_config_gr1_title', '');
	register_setting( 'reader_config_gr1', 'reader_config_gr1_blogs'); // Sense funció de validació -> , 'reader_validate_options' );
	add_option( 'reader_config_gr1_blogs', '');
	//Grup2
	register_setting( 'reader_config_gr2', 'reader_config_gr2_title' );
	add_option( 'reader_config_gr2_title', '');
	register_setting( 'reader_config_gr2', 'reader_config_gr2_blogs'); // Sense funció de validació -> , 'reader_validate_options' );
	add_option( 'reader_config_gr2_blogs', '');
	//Grup3
	register_setting( 'reader_config_gr3', 'reader_config_gr3_title' );
	add_option( 'reader_config_gr3_title', '');
	register_setting( 'reader_config_gr3', 'reader_config_gr3_blogs'); // Sense funció de validació -> , 'reader_validate_options' );
	add_option( 'reader_config_gr3blogs', '');
	//Grup4
	register_setting( 'reader_config_gr4', 'reader_config_gr4_title' );
	add_option( 'reader_config_gr4_title', '');
	register_setting( 'reader_config_gr4', 'reader_config_gr4_blogs'); // Sense funció de validació -> , 'reader_validate_options' );
	add_option( 'reader_config_gr4_blogs', '');
}
add_action( 'admin_init', 'reader_config_register' );
//
//
// Funció de Validació > Si el camp está buit esborra la key de l'array
// Va a ser que no...
//
//
/* WIDGETS D'ESCRIPTORI (ACCESSOS DIRECTES) **********************************************************
******************************************************************************************************/
//
//
/* Escriptori > Lector > Crear Widget ************/
function reg_ini_reader() {
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$title = 'Lector';
		}elseif( qtrans_getLanguage() == 'ca' ){
			$title = 'Lector';
		}else{ //english 
			$title = 'Reader';
		}
	}else{//Not activeQtrans
		$title = 'Lector';
	}
	wp_add_dashboard_widget('reg_ini_reader', $title, 'wdgt_ini_reader');
}
add_action('wp_dashboard_setup', 'reg_ini_reader');
/* Escriptori > Lector > Editar Widget ************/
function wdgt_ini_reader() {
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$tag = "Lee otros Blogs";
		}elseif( qtrans_getLanguage() == 'ca' ){
			$tag = "Llegeix altres Blogs";
		}else{ //english 
			$tag = "Blogs Reader";
		}
	}else{//Not activeQtrans
		$tag = "Lee otros Blogs";
	}
	echo '<a class="wdgt_dash wdgt_reader" href="' . admin_url('admin.php?page=reader') . '"><b>' . $tag . '</b></a>';
}
//
//
//
//Script pel help docs
//
function style_reader() { ?>
<style type="text/css">
@media only screen and (max-width: 1499px) and (min-width: 800px){
.toplevel_page_reader #wpbody-content #dashboard-widgets #postbox-container-3{ float:left; width:49.5%;}
}
</style>
<?php }
add_action('admin_print_scripts-toplevel_page_reader','style_reader');
//
//
?>