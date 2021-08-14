<?php
//****************************************************************************************/
//
//  Child Theme NEXT Conferencias de Autor Functions
//  
//  FUNCTIONS > BODY > HEADER --> Defineix els elements del Header
//
//********************************************************************************************/
//
///Extra wrapper for header sectiom
function header_wrapper_open(){
	echo ' <div id="head_wrap">';
}
add_action('thematic_header','header_wrapper_open',0);
function header_wrapper_close(){
	echo ' </div>';
}
add_action('thematic_header','header_wrapper_close',12);
//
//remove WordPress site title, blog description
function unhook_thematic_functions() {
    remove_action('thematic_header','thematic_blogtitle',3);
    remove_action('thematic_header','thematic_blogdescription',5);
}
add_action('init','unhook_thematic_functions');
//
//Add in custom branding ********************************************
function childtheme_logo() {
	if (function_exists('qtrans_getLanguage')){
		$logo_lang = qtrans_getLanguage() . ('/');
		if( qtrans_getLanguage() == 'es' ){ $description1 = '<em>Conferencias</em>'; $description2 = 'de Autor'; 
		}elseif( qtrans_getLanguage() == 'ca' ){ $description1 = '<em>Conferències</em>'; $description2 = 'd\' Autor'; 
		}elseif( qtrans_getLanguage() == 'en' ){ $description1 = 'Author'; $description2 = '<em>Speaches</em>'; 
		}
	}else{
		$logo_lang = '';
		$description1 = '<em>Conferencias</em>';
		$description2 = 'de Autor'; 
	}
	echo '<h1 id="branding-logo"><a href="' . get_bloginfo('url') . ('/') . $logo_lang . '" title="' . get_bloginfo('name') . " " .  get_bloginfo('description') . '"><img src="' . get_stylesheet_directory_uri() . ('/images/layout/next_logo.gif') . '" alt="' . get_bloginfo('name') . '" /><span>' . $description1 . ' '  . $description2 .  '</span></a></h1>'; 
}
add_action('thematic_header','childtheme_logo',2);
//
// Cridem el searchform al header
function childtheme_header_searchform() {
    get_search_form();
}
add_action('thematic_header', 'childtheme_header_searchform', 11);