<?php
/*
Plugin Name: Custom Admin Help 720º
Plugin URI: http://www.720grados.com
Description: NEXT CONFERENCIAS DE AUTOR -> Wiki de ayuda de WordPRess. 
Version: 3.9.1 A
Author: aMirabet
Author URI: http://www.artur.es
License: GPL2
*/
//
/* PÀGINA D'AJUDA ******************************************************/
//
//
//* REGISTREM LA PÀGINA D'AJUDA */
function register_help_page(){
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$help_title = 'Documentos de Ayuda';
			$help_menu_title = 'Ayuda';
		 }elseif( qtrans_getLanguage() == 'ca' ){
			$help_title = "Documents d'Ajuda";
			$help_menu_title = 'Ajuda';
		 }else{
			$help_title = "Help Docs";
			$help_menu_title = 'Help';
		 }
    }else{
		$help_title = 'Documentos de Ayuda';
		$help_menu_title = 'Ayuda';
	}
	$add_help_page = add_menu_page( $help_title, $help_menu_title, 'read', 'help', 'admin_help_page', 'dashicons-sos', 100  );
}
add_action( 'admin_menu', 'register_help_page' );
//
//Carreguem els estils a l'Admin
function admin_custom_help_styles($hook) {
	// Registre d'estils
	wp_register_style('customadminhelp-css', plugin_dir_url( __FILE__ ) . 'custom-admin-help/custom-admin-help.css', false, false);
	//Carrega estils
	wp_enqueue_style('customadminhelp-css');		
}
add_action('admin_enqueue_scripts', 'admin_custom_help_styles');
//
/* CRIDEM LA PÀGINA PHP AMB ELS DOCUMENTS D'AJUDA */
function admin_help_page(){
	include_once(plugin_dir_path( __FILE__ ) . 'custom-admin-help/help_admin.php');
}
/* Escriptori > Ayuda > Crear Widget ************/
function reg_ini_help() {
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$title = 'Ayuda';
		}elseif( qtrans_getLanguage() == 'ca' ){
			$title = "Ajuda";
		}else{ //english 
			$title = 'Help';
		}
	}else{//Not activeQtrans
		$title = 'Ayuda';
	}
	wp_add_dashboard_widget('red_ini_help', $title, 'wdgt_ini_help');
}
add_action('wp_dashboard_setup', 'reg_ini_help');
/* Escriptori > Ayuda > Editar Widget ************/
function wdgt_ini_help() {
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$tag = "Documentos de Ayuda";
		}elseif( qtrans_getLanguage() == 'ca' ){
			$tag = "Documents d'Ajuda";
		}else{ //english 
			$tag = "Help Docs";
		}
	}else{//Not activeQtrans
		$tag = "Documentos de Ayuda";
	}
	echo '<a class="wdgt_dash wdgt_help" href="' . admin_url('admin.php?page=help') . '"><b>' . $tag . '</b></a>';
}
//
//
//Script pel help docs
//
function help_accordions() { ?>
<script>
jQuery(document).ready(function(){	
	jQuery(".hndle").click(function(){
		var $handler = jQuery(this);
		var $handlerwrap = $handler.parent();
		$handlerwrap.toggleClass("closed"); 
	});
	jQuery(".handlediv").click(function(){
		var $handler = jQuery(this);
		var $handlerwrap = $handler.parent();
		$handlerwrap.toggleClass("closed"); 
	});
	jQuery("a[href^=#]").click(function(e) {
		e.preventDefault();
		var $this = jQuery(this);
		var $href = $this.attr('href').split('=');
		//console.log("$href = " + $href[0]);
		var $anchor = jQuery("body").find($href[0]);
		//var $anchor = jQuery("body").find('#' + $href);
		//var $anchor = jQuery($href);
		//var $anchor = document.getElementById($href);
		//console.log("$anchor = " + $anchor[0]);
		var $postboxs = $anchor.parents('.postbox');
		//console.log("$postboxs = " + $postboxs[0]);
		if ($postboxs.hasClass("closed"))
			$postboxs.removeClass ("closed");
		//var $postbox = $anchor.parent('.postbox');
		//console.log("$postbox = " + $postbox[0]);
		jQuery('html, body').stop().animate({scrollTop: $postboxs.offset().top - "80"}, 'slow');
	});
	jQuery(".closer").click(function(){
		var $closer = jQuery(this);
		var $inside = $closer.parent('.inside');
		var $open = $inside.parent('.postbox');
		$open.addClass ("closed");
		jQuery('html, body').stop().animate({scrollTop: $open.offset().top - "80"}, 'slow');
	});
});
</script>
<?php }
add_action('admin_footer-toplevel_page_help','help_accordions');
//
//
?>