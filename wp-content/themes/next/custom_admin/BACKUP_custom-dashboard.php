<?php
/*
Plugin Name: Admin WordPress 720º
Plugin URI: http://www.720grados.com
Description: Crea una versión a prueba de DUMMIES para la edición de contenidos en WordPress
Version: 3.9.1 A
Author: aMirabet
Author URI: http://www.artur.es
License: GPL2
*/

// GLOBALS **********************************************************************************************************************
//*******************************************************************************************************************************

// LOGIN  **********************************************************************************************************************
//******************************************************************************************************************************

// Personalizar pagina de Login
function custom_login() {
    //Añade una hoja de estilos CSS y condicionales para IE
	echo '<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->';
    echo '<!--[if IE 7]> <html class="lt-ie9 lt-ie8"> <![endif]-->'. "\n";
    echo'<!--[if IE 8]> <html class="lt-ie9"> <![endif]-->' . "\n";
    echo '<link rel="stylesheet" type="text/css" href="' . get_stylesheet_directory_uri() . '/custom_admin/custom-admin.css" />';
}
add_action('login_head', 'custom_login');
//
// ADMIN  **********************************************************************************************************************
//******************************************************************************************************************************
//
/* CONFINGURACIONS TOTS ELS USUARIS ****************************************************************************************************
***************************************************************************************************************************************/
//
//
/* <HEAD> & FOOTER ADMIN ***********************************************************************/
//
// Carreguem els scripts al <head> i al <footer>
//
function admin_custom_scripts($hook) {
	// Registre d'scripts ****************
	//wp_register_script('dygraph-combined-js', get_stylesheet_directory_uri() . '/custom_admin/admin_stats/dygraph/dygraph-combined.js', false, false);
	//wp_register_script('dygraph-canvas-js', get_stylesheet_directory_uri() . '/custom_admin/admin_stats/dygraph/dygraph-canvas.js', false, false);
	//wp_register_script('dygraph-js', get_stylesheet_directory_uri() . '/custom_admin/admin_stats/dygraph/dygraph.js', false, false);
	wp_register_script('google_jsapi', 'https://www.google.com/jsapi', false, false);
	// Registre d'estils
	wp_register_style('customadmin-css', get_stylesheet_directory_uri() . '/custom_admin/custom-admin.css', false, false);
	//Carrega estils
	wp_enqueue_style('customadmin-css');
}
add_action('admin_enqueue_scripts', 'admin_custom_scripts');
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
// Favicon a l'Admin
//
function admin_favicon() {
	echo '<!-- IE 9 and before ICON ><!-->' . "\n";
	echo '<!--[if (lt IE 9)|(IE 9)]>' . "\n";
	echo '<link rel="shortcut icon"  href="' . get_bloginfo('stylesheet_directory') . '/favicon.ico" /> <![endif]-->' . "\n";
	echo '<!-- Default ShortCut Icon ><!-->' . "\n";
	echo '<link rel="shortcut icon"  href="' . get_bloginfo('stylesheet_directory') . '/favicon.png" />' . "\n";
	echo '<!-- Apple Touch Icon ><!-->' . "\n";
	echo '<link rel="apple-touch-icon"  sizes="57x57" href="' . get_bloginfo('stylesheet_directory') . '/tile114.png"/>' . "\n";
	echo '<link rel="apple-touch-icon"  sizes="114x114" href="' . get_bloginfo('stylesheet_directory') . '/tile114.png"/>' . "\n";
	echo '<link rel="apple-touch-icon"  sizes="72x72" href="' . get_bloginfo('stylesheet_directory') . '/tile144.png"/>' . "\n";
	echo '<link rel="apple-touch-icon"  sizes="144x144" href="' . get_bloginfo('stylesheet_directory') . '/tile144.png"/>' . "\n";
	echo '<!-- ie10 metaTags For Tile ><!-->' . "\n";
	echo '<meta name="msapplication-TileColor" content="#0e1c2d" />' . "\n";
	echo '<meta name="msapplication-TileImage" content="' . get_bloginfo('stylesheet_directory') . '/tile144.png"/>' . "\n";
}
add_action('admin_head', 'admin_favicon');
//
/* FOOTER ADMIN ***********************************************************************/
//
// Canvia el Text del Footer de l'Admin
//
add_filter( 'admin_footer_text', 'my_footer_text' );
add_filter( 'update_footer', 'my_footer_version', 11 );
 function my_footer_text() {
    return '<br/ ><br/ ><br/ ><br/ ><b>NEXT</b> Conferencias de Autor<br/ >';
}
 function my_footer_version() {
    return '<span id="footer_dash_brand"><br/ ><br/ ><br/ ><img src="' . get_bloginfo('stylesheet_directory') . '/custom_admin/720_logo.png" alt="720º" /><i>www.720grados.com</i><b>Dash v3.9.1A</b></span>';
}
//
/* Final HEAD FOOTER ******************************************************************/
//
/* WP BAR *****************************************************************************/
//Modificacio de la Barra superior Flotant
//
// Es personalitza el LOGO mitjançant css
//
//
/* DASHBOARD *****************************************************************************/
//
//
// Elimina Panells del Dashboard
//
function remove_dashboard_meta() {
	remove_action('welcome_panel', 'wp_welcome_panel');
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
}
add_action( 'admin_init', 'remove_dashboard_meta' );
//
/* WIDGETS D'ESCRIPTORI (ACCESSOS DIRECTES) *****************************
*************************************************************************/
//
/* Escriptori > Autores > Crear Widget ************/
function reg_ini_autores() {
	if (function_exists('qtrans_getLanguage')){	
		if( qtrans_getLanguage() == 'es' ){
			$title = 'Autores';
		}elseif( qtrans_getLanguage() == 'ca' ){
			$title = 'Autors';
		}else{ //english 
			$title = 'Authors';
		}
	}else{//Not activeQtrans
		$title = 'Autores';
	}
	wp_add_dashboard_widget('red_ini_autores', $title, 'wdgt_ini_autores');
}
add_action('wp_dashboard_setup', 'reg_ini_autores');
/* Escriptori > Autores > Editar Widget ************/
function wdgt_ini_autores() {
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$tag = "Crea y Edita Fichas de Autor";
		}elseif( qtrans_getLanguage() == 'ca' ){
			$tag = "Crea i Edita Fitxes d'Autor";
		}else{ //english 
			$tag = "Create and Edit Author's Carts";
		}
	}else{//Not activeQtrans
		$tag = "Create and Edit Author's Carts";
	}
	echo '<a class="wdgt_dash wdgt_autores" href="' . admin_url('edit.php') . '"><b>' . $tag . '</b></a>';
}
//
/* Escriptori > Noticias > Crear Widget ************/
function reg_ini_news() {
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$title = 'Noticias';
		}elseif( qtrans_getLanguage() == 'ca' ){
			$title = 'Notícies';
		}else{ //english 
			$title = 'News';
		}
	}else{//Not activeQtrans
		$title = 'Noticias';
	}
	wp_add_dashboard_widget('reg_ini_news', $title, 'wdgt_ini_news');
}
add_action('wp_dashboard_setup', 'reg_ini_news');
/* Escriptori > Noticias > Editar Widget ************/
function wdgt_ini_news() {
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$tag = "Crea y Edita Noticias";
		}elseif( qtrans_getLanguage() == 'ca' ){
			$tag = "Crea i Edita Notícies";
		}else{ //english 
			$tag = "Create and Edit News";
		}
	}else{//Not activeQtrans
		$tag = "Crea y Edita Noticias";
	}
	echo '<a class="wdgt_dash wdgt_news" href="' . admin_url('edit.php?post_type=news') . '"><b>' . $tag . '</b></a>';
}
//
/* Escriptori > Comentarios > Crear Widget ************/
function reg_ini_comments() {
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$title = 'Comentarios';
		}elseif( qtrans_getLanguage() == 'ca' ){
			$title = 'Comentaris';
		}else{ //english 
			$title = 'Comments';
		}
	}else{//Not activeQtrans
		$title = 'Comentarios';
	}
	wp_add_dashboard_widget('reg_ini_comments', $title, 'wdgt_ini_comments');
}
add_action('wp_dashboard_setup', 'reg_ini_comments');
/* Escriptori > Comentarios > Editar Widget ************/
function wdgt_ini_comments() {
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$tag = "Modera los comentarios";
		}elseif( qtrans_getLanguage() == 'ca' ){
			$tag = "Modera los comentarios";
		}else{ //english 
			$tag = "Comments Managing";
		}
	}else{//Not activeQtrans
		$tag = "Modera los comentarios";
	}
	echo '<a class="wdgt_dash wdgt_comments" href="' . admin_url('edit-comments.php') . '"><b>' . $tag . '</b></a>';
}
//
/* Escriptori > View Page > Crear Widget ************/
function reg_ini_show() {
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$title = 'Ver la Web';
		}elseif( qtrans_getLanguage() == 'ca' ){
			$title = 'Vés al Web';
		}else{ //english 
			$title = 'View site';
		}
	}else{//Not activeQtrans
		$title = 'Ver la Web';
	}
	wp_add_dashboard_widget('red_ini_show', $title, 'wdgt_ini_show');
}
add_action('wp_dashboard_setup', 'reg_ini_show');
/* Escriptori > View Page > Editar Widget ************/
function wdgt_ini_show() {
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$tag = "Visita la Página Web";
		}elseif( qtrans_getLanguage() == 'ca' ){
			$tag = "Visita la Pàgina Web";
		}else{ //english 
			$tag = "Preview Site";
		}
	}else{//Not activeQtrans
		$tag = "Visita la Página Web";
	}
	echo '<a class="wdgt_dash wdgt_show" href="' . site_url() . '"><b>' . $tag . '</b></a>';
}
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
		$title = 'Reader';
	}
	wp_add_dashboard_widget('red_ini_reader', $title, 'wdgt_ini_reader');
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
		$title = 'Estadístiques';
	}
	wp_add_dashboard_widget('red_ini_stats', $title, 'wdgt_ini_stats');
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
/* SECCIONS ADMIN *************************************************************************************/
// ****************************************************************************************************
//
/* MENÚ LATERAL WORDPRESS *****************************************************************************/
//
// CAMBIEN ENTRADAS PER AUTORES **********************************
//
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Autores';
    $submenu['edit.php'][5][0] = 'Todos los Autores';
    $submenu['edit.php'][10][0] = 'Nuevo Autor';
    echo '';
}
function change_post_object_label() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'Autores';
	$labels->singular_name = 'Autor';
	$labels->add_new = 'Nuevo Autor';
	$labels->add_new_item = 'Nuevo Autor';
	$labels->edit_item = 'Editar';
	$labels->new_item = 'Autor';
	$labels->view_item = 'Ver Autor';
	$labels->search_items = 'Buscar';
	$labels->not_found = 'Sin Autores';
	$labels->not_found_in_trash = 'Papelera Vacía';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );
//
//
/* REGISTER POST TYPES & TAX ****************************************************************************/
//
//POST TYPE NOTICIES *********************************************
//
// Registrem el Post Type
function my_custom_post_news() {
  $labels = array(
    'name'               => _x( 'Noticias', 'post type general name' ),
    'singular_name'      => _x( 'Noticia', 'post type singular name' ),
    'add_new'            => _x( 'Nueva Noticia', 'book' ),
    'add_new_item'       => __( 'Nueva Noticia' ),
    'edit_item'          => __( 'Editar Noticia' ),
    'new_item'           => __( 'Nueva Noticia' ),
    'all_items'          => __( 'Todas las Noticias' ),
    'view_item'          => __( 'Ver la Noticia' ),
    'search_items'       => __( 'Buscar' ),
    'not_found'          => __( 'No se han encontrado' ),
    'not_found_in_trash' => __( 'Papelera Vacía' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Noticias'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Novedades relativas a NEXT',
    'public'        => true,
    'menu_position' => 5,
	'menu_icon' 	=> 'dashicons-welcome-write-blog',
    'supports'      => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions', 'comments' ),
    'has_archive'   => true,
	'publicly_queryable' => true,
    'query_var' => 'news',
    'rewrite' => array(
        'slug'=>'noticias',
        'with_front'=> true,
        'feed'=> true,
        'pages'=> true
    )
  );
  register_post_type( 'news', $args ); 
  }
add_action( 'init', 'my_custom_post_news' );
//
// Missatges al Dashboard
function my_updated_messages( $messages ) {
  global $post, $post_ID;
  $messages['news'] = array(
    0 => '', 
    1 => sprintf( __('Noticia Actualizada. <a href="%s">Ver</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Campo actualizado.'),
    3 => __('Campo borrado.'),
    4 => __('Noticia Actualizada.'),
    5 => isset($_GET['revision']) ? sprintf( __('Noticia recuperdada desde %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Noticia Publicada. <a href="%s">Ver</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Noticia guardada.'),
    8 => sprintf( __('Noticia Enviada. <a target="_blank" href="%s">Ver</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Noticia programada: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Vista Previa</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Borrador de la Noticia Actualizado. <a target="_blank" href="%s">Vista Previa</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'my_updated_messages' );
//
// Taxonomies de les Notícies
function my_taxonomies_news() {
  $labels = array(
    'name'              => _x( 'Etiquetas de las Noticias', 'taxonomy general name' ),
    'singular_name'     => _x( 'Etiqueta', 'taxonomy singular name' ),
    'search_items'      => __( 'Buscar Etiquetas de Noticias' ),
    'all_items'         => __( 'Todas las Etiquetas de Noticias' ),
	'parent_item' 		=> null,
    'parent_item_colon' => null,
    'edit_item'         => __( 'Editar Etiqueta de Noticias' ), 
    'update_item'       => __( 'Actualizar Etiqueta de Noticias' ),
    'add_new_item'      => __( 'Nueva Etiqueta de Noticias' ),
    'new_item_name'     => __( 'Nueva Etiqueta de Noticias' ),
	'separate_items_with_commas' => __( 'Separa las etiquetas con comas' ),
    'add_or_remove_items' => __( 'Añade o Elimina Etiquetas' ),
    'choose_from_most_used' => __( 'Elige entre las más utilizadas' ),
    'menu_name'         => __( 'Etiquetas de Noticias' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => false,
	'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'topic' ),
  );
  register_taxonomy( 'news_tag', 'news', $args );
}
add_action( 'init', 'my_taxonomies_news', 0 );
//
//
// Permalinks del Custom Post Type
function my_custom_post_news_url() {
	global $wp_rewrite;
	// Permaestructura custom Posts
	$wp_rewrite->add_rewrite_tag("%news%", '([^/]+)', "news=");
	$custom_post_url = '/noticias/%news%';
	$wp_rewrite->add_permastruct('news', $custom_post_url, false);
	// Permaestructura custom Posts Tags
	$wp_rewrite->add_rewrite_tag("%news_tag%", '([^/]+)', "news_tag=");
	$wp_rewrite->add_permastruct('news_tag', '/noticias/temas/%news_tag%', false);
	// Add day archive (and pagination)
	add_rewrite_rule("noticias/([0-9]{4})/([0-9]{2})/([0-9]{2})/page/?([0-9]{1,})/?",'index.php?post_type=news&year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]','top');
	add_rewrite_rule("noticias/([0-9]{4})/([0-9]{2})/([0-9]{2})/?",'index.php?post_type=news&year=$matches[1]&monthnum=$matches[2]&day=$matches[3]','top');
	// Add month archive (and pagination)
	add_rewrite_rule("noticias/([0-9]{4})/([0-9]{2})/page/?([0-9]{1,})/?",'index.php?post_type=news&year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]','top');
	add_rewrite_rule("noticias/([0-9]{4})/([0-9]{2})/?",'index.php?post_type=news&year=$matches[1]&monthnum=$matches[2]','top');
	// Add year archive (and pagination)
	add_rewrite_rule("noticias/([0-9]{4})/page/?([0-9]{1,})/?",'index.php?post_type=news&year=$matches[1]&paged=$matches[2]','top');
	add_rewrite_rule("noticias/([0-9]{4})/?",'index.php?post_type=news&year=$matches[1]','top');
	// Reseteja els canvis a la BBDD
	$wp_rewrite->flush_rules();
}
add_action( 'init', 'my_custom_post_news_url', 15, 0 );
//
//
//Redireccions Canòniques
function my_custom_post_news_canonical($redirect_url, $requested_url) {
    global $wp_rewrite;
    // Abort if not using pretty permalinks, is a feed, or not an archive for the post type 'news'
    if( ! $wp_rewrite->using_permalinks() || is_feed() || ! is_post_type_archive('news') )
        return $redirect_url;
    // Get the original query parts
    $redirect = @parse_url($requested_url);
    $original = $redirect_url;
    if( !isset($redirect['query'] ) )
        $redirect['query'] ='';
    // If is year/month/day - append year
    if ( is_year() || is_month() || is_day() ) {
        $year = get_query_var('year');
        $redirect['query'] = remove_query_arg( 'year', $redirect['query'] );
        $redirect_url = user_trailingslashit(get_post_type_archive_link('news')).$year;
    }
    // If is month/day - append month
    if ( is_month() || is_day() ) {
        $month = zeroise( intval(get_query_var('monthnum')), 2 );
        $redirect['query'] = remove_query_arg( 'monthnum', $redirect['query'] );
        $redirect_url .= '/'.$month;
    }
    // If is day - append day
    if ( is_day() ) {
        $day = zeroise( intval(get_query_var('day')), 2 );
        $redirect['query'] = remove_query_arg( 'day', $redirect['query'] );
        $redirect_url .= '/'.$day;
    }
    // If paged, apppend pagination
    if ( get_query_var('paged') > 0 ) {
        $paged = (int) get_query_var('paged');
        $redirect['query'] = remove_query_arg( 'paged', $redirect['query'] );
        if ( $paged > 1 )
            $redirect_url .= user_trailingslashit("/page/$paged", 'paged');
    }
    if( $redirect_url == $original )
        return $original;
    // tack on any additional query vars
    $redirect['query'] = preg_replace( '#^\??&*?#', '', $redirect['query'] );
    if ( $redirect_url && !empty($redirect['query']) ) {
        parse_str( $redirect['query'], $_parsed_query );
        $_parsed_query = array_map( 'rawurlencode', $_parsed_query );
        $redirect_url = add_query_arg( $_parsed_query, $redirect_url );
    }
    return $redirect_url;
}
add_filter('redirect_canonical', 'my_custom_post_news_canonical', 10, 2);
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
/* CRIDEM LA PÀGINA PHP AMB EL LECTOR RSS */
function admin_reader_page(){
	include_once(get_stylesheet_directory() . '/custom_admin/admin_reader/admin_reader.php');
}
//
/* CRIDEM LA PÀGINA PHP AMB EL CONFIGURADOR RSS */
function admin_reader_config_page(){
	include_once(get_stylesheet_directory() . '/custom_admin/admin_reader/admin_reader_config.php');
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
/* PÀGINA SOCIAL ******************************************************/
//
//
//* REGISTREM LA PÀGINA SOCIAL */
function register_social_page(){
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$reader_title = 'Redes Sociales';
			$reader_menu_title = 'Social';
			$reader_conf_title = 'Configuración de Redes Sociales';
			$reader_menu_conf_title = 'Configuración';
		 }elseif( qtrans_getLanguage() == 'ca' ){
			$reader_title = "Xarxes Socials";
			$reader_menu_title = 'Social';
			$reader_conf_title = "Configuració de les Xarxes Socials";
			$reader_menu_conf_title = 'Configuració';
		 }else{
			$reader_title = "Social Media";
			$reader_menu_title = 'Social';
			$reader_conf_title = "Social Config";
			$reader_menu_conf_title = 'Config';
		 }
    }else{
		$reader_title = 'Redes Sociales';
		$reader_menu_title = 'Social';
		$reader_conf_title = 'Configuración de Redes Sociales';
		$reader_menu_conf_title = 'Configuración';
	}
	$add_social_page = add_menu_page( $reader_title, $reader_menu_title, 'read', 'social', 'admin_social_page', ' dashicons-twitter', 31 );
	$add_social_config_page = add_submenu_page( 'social', $reader_conf_title, $reader_menu_conf_title, 'manage_options', 'social_config', 'admin_social_config_page' ); 
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
		/* Enqueue WordPress' DASHBOARD SCRIPT */
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
/* CRIDEM LA PÀGINA PHP AMB LES XARXES SOCIALS */
function admin_social_page(){
	include_once(get_stylesheet_directory() . '/custom_admin/admin_social/admin_social.php');
}
//
/* CRIDEM LA PÀGINA PHP AMB EL CONFIGURADOR SOCIAL */
function admin_social_config_page(){
	include_once(get_stylesheet_directory() . '/custom_admin/admin_social/admin_social_config.php');
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
		/* Enqueue WordPress' DASHBOARD SCRIPT */
		wp_enqueue_script('dashboard');
		wp_enqueue_script('google_jsapi');
		//wp_enqueue_script('dygraph-combined-js');
		//wp_enqueue_script('dygraph-canvas-js');
		//wp_enqueue_script('dygraph-js');
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
		add_action('admin_footer-admin_stats_page_stats_config','footer_scripts_stats');
	}
	function footer_scripts_stats(){
		?>
		<script>jQuery(document).ready(function(){ postboxes.add_postbox_toggles(pagenow); });</script>
		<?php
	}
//
}
add_action( 'admin_menu', 'register_stats_page' );
//
/* CRIDEM LA PÀGINA PHP AMB ELS STATS */
function admin_stats_page(){
	include_once(get_stylesheet_directory() . '/custom_admin/admin_stats/admin_stats.php');
}
//
/* CRIDEM LA PÀGINA PHP AMB EL CONFIGURADOR STATS */
function admin_stats_config_page(){
	include_once(get_stylesheet_directory() . '/custom_admin/admin_stats/admin_stats_config.php');
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
	add_menu_page( $help_title, $help_menu_title, 'read', 'help', 'admin_help_page', 'dashicons-sos', 100 );
}
add_action( 'admin_menu', 'register_help_page' );
//
/* CRIDEM LA PÀGINA PHP AMB ELS DOCUMENTS D'AJUDA */
function admin_help_page(){
	include_once(get_stylesheet_directory() . '/custom_admin/help_docs/help_admin.php');
}
//
//
/* EDICIÓ D'ENTRADES i PÀGINES *****************************************************************************/
//
// Elimina Opcions d'Edició
//
function my_remove_meta_boxes() {
//Posts (Autores)
  remove_meta_box('trackbacksdiv', 'post', 'normal'); // Pingbacks
  remove_meta_box('postcustom', 'post', 'normal'); //WP Custom Fields
  remove_meta_box('commentstatusdiv', 'post', 'normal');  //Comentarios (Moderación)
  remove_meta_box('commentsdiv', 'post', 'normal');  //Comentarios
  remove_meta_box('revisionsdiv', 'post', 'normal');  //Revisiones
  remove_meta_box('authordiv', 'post', 'normal');   //Autor
  remove_meta_box('slugdiv', 'post', 'normal');   //Slug
//Posts (Autores)
  remove_meta_box('slugdiv', 'news', 'normal');   //Slug
//Posts (News)
  remove_meta_box('linktargetdiv', 'link', 'normal');
  remove_meta_box('linkxfndiv', 'link', 'normal');
  remove_meta_box('linkadvanceddiv', 'link', 'normal');
}
add_action( 'admin_menu', 'my_remove_meta_boxes' );
//
// Força les pantalles d'Edició a 1 coluna
//
function so_screen_layout_columns( $columns ) {
    $columns['post'] = 1;
	$columns['news'] = 1;
    return $columns;
}
add_filter( 'screen_layout_columns', 'so_screen_layout_columns' );
function so_screen_layout_post() {
    return 1;
}
add_filter( 'get_user_option_screen_layout_post', 'so_screen_layout_post' );
//
//
/* COLUMNA MINIATURA IMATGE DESTACADA LLISTAT ENTRADES ***************************/
// Add the posts and pages columns filter. They can both use the same function.
add_filter('manage_posts_columns', 'tcb_add_post_thumbnail_column', 5);
add_filter('manage_pages_columns', 'tcb_add_post_thumbnail_column', 5);
// Add the column
function tcb_add_post_thumbnail_column($cols){
  $cols['tcb_post_thumb'] = __('Featured');
  return $cols;
}
// Hook into the posts an pages column managing. Sharing function callback again.
add_action('manage_posts_custom_column', 'tcb_display_post_thumbnail_column', 5, 2);
add_action('manage_pages_custom_column', 'tcb_display_post_thumbnail_column', 5, 2);
// Grab featured-thumbnail size post thumbnail and display it.
function tcb_display_post_thumbnail_column($col, $id){
  switch($col){
    case 'tcb_post_thumb':
      if( function_exists('the_post_thumbnail') )
        echo the_post_thumbnail( array(100,100) );
      else
        echo 'xxx';
      break;
  }
}
//* ***********************************************************************************************************************************
//
// CONFIGURACIÓ D'USUARIS
//
//*************************************************************************************************************************************
//
/* CONFINGURACIONS GENERALS ***********************************************************************************************************/
//
// Permet a múltiples usuaris compartir direcció d'email 
// Amb direccio GMAil pots afegir un + al final del mail i el que vulguis, els missatges arribaran.
// Ex: ola@gmail.com == ola+kease@gmail.com
//
/* PERFIL USUARI *************************************************************************/
// Camps d'informació par als usuaris
function user_fields_extra( $contactmethods ) {
    //Para quitar los que no queremos
    unset($contactmethods['aim']);  
    unset($contactmethods['jabber']);  
    unset($contactmethods['yim']); 
    return $contactmethods;
  }
add_filter('user_contactmethods','user_fields_extra',10,1);
//
// MOSTRAR ELS CAMPS DE CONTACTE D'EMAIL PER EMPRESA I FORMULARIS *****************************************************************
//
function my_show_extra_profile_fields( $user ) {  
	$editor_id = 2; // ID de l'Usuari - Client
	if ($user->ID == $editor_id) { //La ID de l'usuari Editor (client)
		// Descodifiquem la contrassenya de l'email de formularis
		$form_mail_pass_acf = esc_attr( get_the_author_meta( 'form_email_pass', $editor_id ) );
		if (isset($form_mail_pass_acf) && $form_mail_pass_acf != ''){ // ACF
			$encrypt_method = "AES-256-CBC";
			$secret_key = 'nextconferenciasdeautor';
			$secret_iv = '987654321';
			// hash
			$key = hash('sha256', $secret_key);
			// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
			$iv = substr(hash('sha256', $secret_iv), 0, 16);
			// Descodifiquem
			$dec_value = openssl_decrypt(base64_decode($form_mail_pass_acf), $encrypt_method, $key, 0, $iv);  
			$smtp_pass = $dec_value;  
		}
		?>
        <h3>eMails de Empresa</h3>
        <table class="form-table">
            <tr>
                <th><label for="company_email">eMail de Contacto</label></th>
                <td>
                    <input type="text" name="company_email" id="company_email" value="<?php echo esc_attr( get_the_author_meta( 'company_email', $user->ID ) ); ?>" /><br />
                    <span class="description">La dirección de correo electrónico que aparece en el Pie de Página.</span>
                </td>
            </tr>
            <tr>
                <th><label for="form_email">eMail para Formularios</label></th>
                <td>
                    <input type="text" name="form_email" id="form_email" value="<?php echo esc_attr( get_the_author_meta( 'form_email', $user->ID ) ); ?>" /><br />
                    <span class="description">La dirección de correo electrónico dónde recibir los mensajes de los Formularios de Contacto .</span>
                </td>
            </tr>
            <tr>
                <th><label for="form_email_pass">Contraseña (eMail para Formularios)</label></th>
                <td>
                    <input type="password" name="form_email_pass" id="form_email_pass" value="<?php echo $smtp_pass; ?>" /><br />
                    <span class="description">La contraseña de la dirección de correo electrónico dónde recibir los mensajes de los Formularios de Contacto.</span>
                </td>
            </tr>
        </table>
<?php }
// Camps de SocialMedia per a tots els usuaris ?>
	<h3>SocialMedia</h3>
    <table class="form-table">
        <tr>
        	<th valign="top" scope="row"><label for="user_twitter">Twitter URL</label></th>
            <td>
            	<input type="text" id="user_twitter" name="user_twitter" value="<?php echo esc_attr( get_the_author_meta( 'user_twitter', $user->ID ) ); ?>" /><br />
            	<span class="description">Nombre de Usuario de Twitter, si es distinto al perfil oficial de Empresa. <br/>
                <b>Si rellenas este campo, la autoría de tus posts se vinculará a tu usuario en vez de al perfil de Empresa.</b></span>
			</td>
		</tr>
        <tr>
            <th valign="top" scope="row"><label for="user_gplus">Google+ URL</label></th>
            <td>
            	<input type="text" id="user_gplus" name="user_gplus" value="<?php echo esc_attr( get_the_author_meta( 'user_gplus', $user->ID ) ); ?>" /><br />
                <span class="description">El código numérico que aparece en la URL de tu perfil de Google+: "https://plus.google.com/u/0/[CÓDIGO NUMÉRICO]". <br/>
                <b>Si rellenas este campo, la autoría de los posts que escribas se vinculará a tu perfil y no a la Página / Perfil de la Empresa.</b></span>
            </td>
        </tr>
    </table>
<?php }
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );
//
// GUARDAR A LA BBDD ELS CAMPS DE CONTACTE D'EMAIL PER EMPRESA I FORMULARIS *****************************************************************
//
function my_save_extra_profile_fields( $user_id ) {
	if ( !current_user_can( 'edit_user', $user->ID ) ) { return false; }
	$editor_id = 2; // ID de l'Usuari - Client
	if ($user_id == $editor_id) {
		//eMail de Contacto
		update_user_meta( $user_id, 'company_email', $_POST['company_email'] );
		//eMail para Formularios
		update_user_meta( $user_id, 'form_email', $_POST['form_email'] );
		//Contraseña (eMail para Formularios)
		$encrypt_method = "AES-256-CBC";
		$secret_key = 'nextconferenciasdeautor';
		$secret_iv = '987654321';
			// hash
		$key = hash('sha256', $secret_key);
		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
			// Codifiquem
		$password = $_POST['form_email_pass'];
		$enc_value = openssl_encrypt($password, $encrypt_method, $key, 0, $iv);
		$enc_value = base64_encode($enc_value);
		$enc_password = $enc_value;
		update_user_meta( $user_id, 'form_email_pass', $enc_password );
	}
	//Twitter URL
	update_user_meta( $user_id, 'user_twitter', $_POST['user_twitter'] );
	//GPlus URL
	update_user_meta( $user_id, 'user_gplus', $_POST['user_gplus'] );
}
add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );
//
/* CONFINGURACIONS PER A ADMINISTRADOR ************************************************************************************************
********************************************************************************************************************************/
// Mostra el Rendiment MySQL *************************************************************
function mqw_performance( $visible = true ) {
	$stat = sprintf(  '%d CONSULTES EN %.3f SEGONS, USANT %.2fMB DE MEMÒRIA',
		get_num_queries(),
		timer_stop( 0, 3 ),
		memory_get_peak_usage() / 1024 / 1024
		);
	echo $visible ? $stat : "$stat" ;
}
function add_widget_performance() {
	if (current_user_can('manage_options')) { 
		wp_add_dashboard_widget( 'mysql_performance', 'MySQL Performance', 'mqw_performance' );
	}
}
add_action( 'wp_dashboard_setup', 'add_widget_performance');
//
//
/* Ajuda amb els hooks > afegeix una secció d'ajuda que exlica els hooks de la pàgina d'admin */
add_action( 'contextual_help', 'wptuts_screen_help', 10, 3 );
function wptuts_screen_help( $contextual_help, $screen_id, $screen ) {
    // The add_help_tab function for screen was introduced in WordPress 3.3.
    if ( ! method_exists( $screen, 'add_help_tab' ) )
        return $contextual_help;
    global $hook_suffix;
    // List screen properties
    $variables = '<ul style="width:50%;float:left;"> <strong>Screen variables </strong>'
        . sprintf( '<li> Screen id : %s</li>', $screen_id )
        . sprintf( '<li> Screen base : %s</li>', $screen->base )
        . sprintf( '<li>Parent base : %s</li>', $screen->parent_base )
        . sprintf( '<li> Parent file : %s</li>', $screen->parent_file )
        . sprintf( '<li> Hook suffix : %s</li>', $hook_suffix )
        . '</ul>';
    // Append global $hook_suffix to the hook stems
    $hooks = array(
        "load-$hook_suffix",
        "admin_print_styles-$hook_suffix",
        "admin_print_scripts-$hook_suffix",
        "admin_head-$hook_suffix",
        "admin_footer-$hook_suffix"
    );
    // If add_meta_boxes or add_meta_boxes_{screen_id} is used, list these too
    if ( did_action( 'add_meta_boxes_' . $screen_id ) )
        $hooks[] = 'add_meta_boxes_' . $screen_id;
    if ( did_action( 'add_meta_boxes' ) )
        $hooks[] = 'add_meta_boxes';
    // Get List HTML for the hooks
    $hooks = '<ul style="width:50%;float:left;"> <strong>Hooks </strong> <li>' . implode( '</li><li>', $hooks ) . '</li></ul>';
    // Combine $variables list with $hooks list.
    $help_content = $variables . $hooks;
    // Add help panel
    $screen->add_help_tab( array(
        'id'      => 'wptuts-screen-help',
        'title'   => 'Screen Information',
        'content' => $help_content,
    ));
    return $contextual_help;
}
// CONFINGURACIONS PER A SÚPER-EDITOR (ID2) -> És Admin per Editar les opcions de Lector, Social i Stats però per la resta d'Opcions les té amagades ********
// TAMBÉ CONFIGUREM L'EDITOR NORMAL, QUE NO PODRA TOCAR AQUESTES OPCIONS
//***********************************************************************************************************************************************************
// Amaga elements del MENÚ ************************************
function remove_menu_elements() {
	$user_id = get_current_user_id();
	if ($user_id == '2' || !current_user_can('manage_options')) {
	  // Amaguem els avisos d'Actualització
	  remove_action( 'admin_notices', 'update_nag', 3);
	  // Amaguem Diverses Pàgines 
	  remove_submenu_page( 'index.php', 'update-core.php' );
	  remove_menu_page( 'edit.php?post_type=page' );
	  remove_menu_page( 'link-manager.php' );
	  remove_menu_page( 'themes.php' );
	  remove_menu_page( 'plugins.php' );
	  remove_menu_page( 'tools.php' );
	  remove_menu_page( 'options-general.php' );
	  remove_menu_page( 'edit.php?post_type=acf' );
	  }
}
add_action('admin_menu', 'remove_menu_elements', 999);
//
// Amaga elements de l'ESCRIPTORI ****************************
function remove_dashboard_widgets() {
	$user_id = get_current_user_id();
	if ($user_id == '2' || !current_user_can('manage_options')){
		remove_meta_box( 'mysql_performance', 'dashboard', 'normal');//since 3.8
	}
}
add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets');
//
// Amaga elements de l'Admin Bar ****************************
function remove_admin_bar() {
    global $wp_admin_bar;
	$user_id = get_current_user_id();
    if ($user_id == '2' || !current_user_can('manage_options')) {
        $wp_admin_bar->remove_menu('view-site');
		$wp_admin_bar->remove_menu('updates');          // Remove the updates link
        $wp_admin_bar->remove_menu('new-content');      // Remove the content link
		$wp_admin_bar->remove_menu('edit');      		// Remove the edit link
    }
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar' );
//
//
//
/* CONFINGURACIONS PER A EDITOR ************************************************************************************************
********************************************************************************************************************************/
//
//
//
?>