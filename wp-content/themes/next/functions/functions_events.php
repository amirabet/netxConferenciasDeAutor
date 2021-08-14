<?php
//****************************************************************************************/
//
//  Child Theme NEXT Conferencias de Autor Functions
//  
//  FUNCTIONS > EVENTS --> Configuraciones para el plugin The Events Calendar >> https://theeventscalendar.com/
//
//****************************************************************************************/
//FEED RSS *********************************************************************************************************************
//******************************************************************************************************************************
//Avoid misfunction order
function maybe_teardown_tribe_order_filter() {
    if ( is_feed() ) remove_filter( 'posts_orderby', array( 'TribeEventsQuery', 'posts_orderby' ), 10, 2 );
}
add_action( 'pre_get_posts', 'maybe_teardown_tribe_order_filter', 60 );
//
// ADMIN *********************************************************************************************************************
//******************************************************************************************************************************
// Amaga els Eventos al WP ADMIN BAR
define('TRIBE_DISABLE_TOOLBAR_ITEMS', true);
// Amaga els Add-On a WP ADMIN BAR
define('TRIBE_HIDE_UPSELL', true);
//
// WIDGET **********************************************************************************************************************
//******************************************************************************************************************************
function custom_widget_featured_image() {
	global $post;
	if ( has_post_thumbnail( $post->ID ) ){
		echo tribe_event_featured_image( $post->ID, 'thumbnail' );
	}
}
add_action( 'tribe_events_list_widget_before_the_event_title', 'custom_widget_featured_image' );

/*
 * Possible solution for Single Event page 404 errors where the WP_Query has an attachment set
 * IMPORTANT: Flush permalinks after pasting this code: http://tri.be/support/documentation/troubleshooting-404-errors/

function tribe_attachment_404_fix () {
	if (class_exists('TribeEvents')) {
		remove_action( 'init', array( TribeEvents::instance(), 'init' ), 10 );
		add_action( 'init', array( TribeEvents::instance(), 'init' ), 1 );
	}
}
add_action( 'after_setup_theme', 'tribe_attachment_404_fix' ); */

