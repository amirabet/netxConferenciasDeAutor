<?php
/*
Plugin Name: Custom Admin Stats 720º
Plugin URI: http://www.720grados.com
Description: NEXT CONFERENCIAS DE AUTOR -> Muestra Estadísticas de Google Analytics y Accesos directos a los perfiles de las Redes Sociales.
Version: 3.9.1 A
Author: aMirabet
Author URI: http://www.artur.es
License: GPL2
*/
//
/* PÀGINA ESTADÍSTIQUES ******************************************************/
//
//
//* REGISTREM LA PÀGINA STATS */
function register_stats_page(){
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$reader_title = 'Estadísticas';
			$reader_menu_title = 'Estadísticas';
			$reader_conf_title = 'Configuración de Estadísticas';
			$reader_menu_conf_title = 'Configuración';
		 }elseif( qtrans_getLanguage() == 'ca' ){
			$reader_title = "Estadístiques";
			$reader_menu_title = 'Estadístiques';
			$reader_conf_title = "Configuració d'Estadístiques";
			$reader_menu_conf_title = 'Configuració';
		 }else{
			$reader_title = "Stats";
			$reader_menu_title = 'Stats';
			$reader_conf_title = "Stats Config";
			$reader_menu_conf_title = 'Config';
		 }
    }else{
		$reader_title = 'Estadísticas';
		$reader_menu_title = 'Estadísticas';
		$reader_conf_title = 'Configuración de Estadísticas';
		$reader_menu_conf_title = 'Configuración';
	}
	$add_stats_page = add_menu_page( $reader_title, $reader_menu_title, 'read', 'stats', 'admin_stats_page', 'dashicons-chart-area', 32 );
	$add_stats_config_page = add_submenu_page( 'stats', $reader_conf_title, $reader_menu_conf_title, 'manage_options', 'stats_config', 'admin_stats_config_page' ); 
	// Callbacks de la creacio de les pagines
    add_action( 'load-' . $add_stats_page, 'load_stats_js' );
	add_action( 'load-' . $add_stats_config_page, 'load_stats_config_js' );
	//
	// Stats_ Carrega el js
	function load_stats_js(){
		// Unfortunately we can't just enqueue our scripts here - it's too early. So register against the proper action hook to do it
		add_action( 'admin_enqueue_scripts', 'enqueue_stats_js' );
	}
	function enqueue_stats_js(){
		// Registre d'scripts
		wp_register_script('google_jsapi', 'https://www.google.com/jsapi', false, false);
		/* Enqueue Scripts */
		wp_enqueue_script('dashboard');
		wp_enqueue_script('google_jsapi');
	}
	//
	// Config Carrega els metaboxes i els js
	function load_stats_config_js(){
		/* User can choose between 1 or 2 columns (default 2) */
		add_action( 'admin_enqueue_scripts', 'enqueue_stats_config_js' );
	}
	function enqueue_stats_config_js(){
		/* Enqueue WordPress' script for handling the metaboxes */
		wp_enqueue_script('dashboard'); 
		// Add the color picker css file       
        wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker');
	}
	function footer_scripts_stats(){
		?>
		<script>jQuery(document).ready(function(){ postboxes.add_postbox_toggles(pagenow); });</script>
		<?php
	}
	add_action('admin_footer-admin_stats_page_stats_config','footer_scripts_stats');
//
}
add_action( 'admin_menu', 'register_stats_page' );
//
//Carreguem els estils a l'Admin
function admin_custom_stats_styles($hook) {
	// Registre d'estils
	wp_register_style('customadmin-stats-css', plugin_dir_url( __FILE__ ) . 'custom-admin-stats/custom-admin-stats.css', false, false);
	//Carrega estils
	wp_enqueue_style('customadmin-stats-css');	
}
add_action('admin_enqueue_scripts', 'admin_custom_stats_styles');
//
/* CRIDEM LA PÀGINA PHP AMB ELS STATS */
function admin_stats_page(){
	include_once(plugin_dir_path( __FILE__ ) . '/custom-admin-stats/admin_stats.php');
}
//
/* CRIDEM LA PÀGINA PHP AMB EL CONFIGURADOR STATS */
function admin_stats_config_page(){
	include_once(plugin_dir_path( __FILE__ ) . '/custom-admin-stats/admin_stats_config.php');
}
//
//
// REGISTREM ELS CAMPS D'OPCIONS PER A LA PÀGINA DE CONFIGURACIÓ
//
// Registrem tots els camps de les opcions
function stats_config_register() {
	//Google Analytics
	register_setting( 'stats_analytics_ga', 'stats_analytics' );
	add_option( 'stats_analytics', '');
}
add_action( 'admin_init', 'stats_config_register' );
//
//
// Funció de Validació > Si el camp está buit esborra la key de l'array
// Va a ser que no...
//
//
/* Escriptori > Estadistiques > Crear Widget ************/
function reg_ini_stats() {
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$title = 'Estadísticas';
		}elseif( qtrans_getLanguage() == 'ca' ){
			$title = 'Estadístiques';
		}else{ //english 
			$title = 'Stats';
		}
	}else{//Not activeQtrans
		$title = 'Estadísticas';
	}
	wp_add_dashboard_widget('reg_ini_stats', $title, 'wdgt_ini_stats');
}
add_action('wp_dashboard_setup', 'reg_ini_stats');
/* Escriptori > Estadistiques > Editar Widget ************/
function wdgt_ini_stats() {
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$tag = "Visitas y Presencia onLine";
		}elseif( qtrans_getLanguage() == 'ca' ){
			$tag = "Visites i Presència onLine";
		}else{ //english 
			$tag = "Site stats and Social Influence";
		}
	}else{//Not activeQtrans
		$tag = "Visitas y Presencia onLine";
	}
	echo '<a class="wdgt_dash wdgt_stats" href="' . admin_url('admin.php?page=stats') . '"><b>' . $tag . '</b></a>';
}
?>