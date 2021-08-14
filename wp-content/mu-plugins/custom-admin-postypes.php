<?php
/*
Plugin Name: Custom Admin PostTypes 720º
Plugin URI: http://www.720grados.com
Description: NEXT CONFERENCIAS DE AUTOR -> Controla los tipos de Posts. 
Version: 3.9.1 A
Author: aMirabet
Author URI: http://www.artur.es
License: GPL2
*/
//
//Carreguem els estils a l'Admin
function admin_custom_postypes_styles($hook) {
	// Registre d'estils
	wp_register_style('customadminpostypes-css', plugin_dir_url( __FILE__ ) . 'custom-admin-postypes/custom-admin-postypes.css', false, false);
	//Carrega estils
	wp_enqueue_style('customadminpostypes-css');
}
add_action('admin_enqueue_scripts', 'admin_custom_postypes_styles');
/* POST TYPES *************************************************************************************/
// ****************************************************************************************************
//
//
// MEDIA ******************************************************************************
//
// Escala las imágenes pequeñas a más grandes
function thumbnail_upscale( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ){
    if ( !$crop ) return null; // let the wordpress default function handle this
    $aspect_ratio = $orig_w / $orig_h;
    $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);
    $crop_w = round($new_w / $size_ratio);
    $crop_h = round($new_h / $size_ratio);
    $s_x = floor( ($orig_w - $crop_w) / 2 );
    $s_y = floor( ($orig_h - $crop_h) / 2 );
    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
}
add_filter( 'image_resize_dimensions', 'thumbnail_upscale', 10, 6 );
// post thumbnail sizing 
add_theme_support( 'post-thumbnails', array('post', 'page', 'news', 'tribe_events') );
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'autor', 200, 223, true); // thumbnail per l'autor 
	add_image_size( 'autor_loop_thumb', 100, 111, true ); // thumbnail para los loops
}
// Supertamaño de Miniatura Imagen Destacada
function childtheme_post_thumb_size($size) {
    $size = array(960,480);
    return $size;
}
// AUTORES********************************************************
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
/* WIDGETS D'ESCRIPTORI (ACCESSOS DIRECTES) **********************************************************
******************************************************************************************************/
//
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
	wp_add_dashboard_widget('reg_ini_autores', $title, 'wdgt_ini_autores');
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
		$tag = "Crea y Edita Fichas de Autor";
	}
	echo '<a class="wdgt_dash wdgt_autores" href="' . admin_url('edit.php') . '"><b>' . $tag . '</b></a>';
}
//
//* Escriptori > Noticias > Crear Widget ************/
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
//
/* PANTALLES EDICIO DE POSTS *************************************************************************
******************************************************************************************************/
//
// Apaga l'autoprocessador de codi
//remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
//
// Elimina Metaboxes d'edicio
//
function remove_postype_meta_boxes() {
//Posts (Autores)
  remove_meta_box('trackbacksdiv', 'post', 'normal'); // Pingbacks
  remove_meta_box('postcustom', 'post', 'normal'); //WP Custom Fields
  remove_meta_box('commentstatusdiv', 'post', 'normal');  //Comentarios (Moderación)
  remove_meta_box('commentsdiv', 'post', 'normal');  //Comentarios
  remove_meta_box('revisionsdiv', 'post', 'normal');  //Revisiones
  remove_meta_box('authordiv', 'post', 'normal');   //Autor
  remove_meta_box('slugdiv', 'post', 'normal');   //Slug
//Posts (Noticias)
  remove_meta_box('authordiv', 'news', 'normal');   //Autor
  remove_meta_box('slugdiv', 'news', 'normal');   //Slug
}
add_action( 'admin_menu', 'remove_postype_meta_boxes' );
//
// Força les pantalles d'Edició a 1 coluna
//
function so_screen_layout_columns( $columns ) {
    $columns['post'] = 2;
	$columns['news'] = 2;
    return $columns;
}
add_filter( 'screen_layout_columns', 'so_screen_layout_columns' );
function so_screen_layout_post() {
    return 2;
}
add_filter( 'get_user_option_screen_layout_post', 'so_screen_layout_post' );