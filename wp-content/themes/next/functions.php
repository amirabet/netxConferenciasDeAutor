<?php
//****************************************************************************************/
//
//  Child Theme NEXT Conferencias de Autor Functions
//
//****************************************************************************************/
//
//
//
//CUSTOM SHORTCODES ************************************************************************************************************
//******************************************************************************************************************************
include(get_stylesheet_directory() . '/functions/custom_shortcodes.php');
//
//<HEAD> ***********************************************************************************************************************
//******************************************************************************************************************************
include(get_stylesheet_directory() . '/functions/functions_head.php');
//
//<BODY> ***********************************************************************************************************************
//******************************************************************************************************************************
//
//<BODY> -> GLOBAL *************************************************************************************************************
//
// Classes del Body
function childtheme_body_class($classes) {
	if ( is_singular( 'post' )) {
		global $post;
		if (!is_attachment() && !is_singular( 'news' ) && !is_singular( 'tribe-events' )){
			$category = get_the_category($post->ID);
			$category_id = $category[0]->cat_ID;
			$category_class = 'category-' . $category_id;
			$classes[] = $category_class;
		}
		$sidebar_class = 'page_sidebar';
		$classes[] = $sidebar_class;
		return $classes;
	}elseif ( !is_page(array(5,7,11,170)) && !is_home() && !is_front_page()) {
		global $post;
		$sidebar_class = 'page_sidebar';
		$classes[] = $sidebar_class;
		return $classes;
	}elseif ( is_front_page()) {
		global $post;
		$home_class = 'home';
		$classes[] = $home_class;
		return $classes;
	}
}
add_filter('body_class', 'childtheme_body_class');
//
//Ancla al top del body
function toppage_anchor(){
	echo '<a name="toppage" id="toppage"></a>';
}
add_action('thematic_before','toppage_anchor',1);
//
// SEARCH FIELD **************************************************************************************************************
include(get_stylesheet_directory() . '/functions/functions_body_searchform.php');
//
//<BODY> -> MAIN *************************************************************************************************************
//
//
//DEFINIR ELS WIDGETS *********************************************************************************************************
include(get_stylesheet_directory() . '/functions/functions_body_main_widgets.php');
//
// HEADER ********************************************************************************************************************
include(get_stylesheet_directory() . '/functions/functions_body_header.php');
//
// MENU **********************************************************************************************************************
include(get_stylesheet_directory() . '/functions/functions_body_header_menu.php');
//
// MAIN -> CONTAINER **********************************************************************************************************
include(get_stylesheet_directory() . '/functions/functions_body_main_layout.php');
//
// MAIN -> LOOPS **********************************************************************************************************************
include(get_stylesheet_directory() . '/functions/functions_body_main_loops.php');
//
// MAIN -> POST **********************************************************************************************************
include(get_stylesheet_directory() . '/functions/functions_body_main_post.php');
//
// FEED ***********************************************************************************************************************
include(get_stylesheet_directory() . '/functions/functions_feed.php');
//
// EVENTS *********************************************************************************************************************
include(get_stylesheet_directory() . '/functions/functions_events.php');
//
// <BODY> - FOOTER ************************************************************************************************************
//*****************************************************************************************************************************
///
// FOOTER *********************************************************************************************************************
include(get_stylesheet_directory() . '/functions/functions_body_footer.php');

// ADMIN ***********************************************************************************************************************
//******************************************************************************************************************************
//ADVANCED CUSTOM FIELDS
//add_action('acf/register_fields', 'my_register_fields');
//function my_register_fields(){
	//Custom Fields --> Generar y exportar desde el Admin
	//include_once('fields/advanced_custom_fields.php');
//}
// Text de l'Admin (footer left) //////////////////////////////////////////////////////////////////////////////////
function my_footer_text() {
    return '<br/ ><br/ ><br/ ><br/ ><b>' . get_bloginfo('name') . '</b> ' . get_bloginfo('description') . '<br/ >';
}
add_filter( 'admin_footer_text', 'my_footer_text' );
?>