<?php
//****************************************************************************************/
//
//  Child Theme NEXT Conferencias de Autor Functions
//  
//  FUNCTIONS > FEED --> Configuraciones para el feed RSS de WordPress
//
//****************************************************************************************/
//
//CUSTOM POST TYPES ************************************************************************************************************
//******************************************************************************************************************************
// Afegeix els custom post Types al Feed Global de WP
function myfeed_request($qv) {
	if (isset($qv['feed']) && !isset($qv['post_type']))
		//$qv['post_type'] = array('post', 'news'); //Afegim eventos
		$qv['post_type'] = array('post', 'news', 'tribe_events');
	return $qv;
}
add_filter('request', 'myfeed_request');
//
//Thumbnails *******************************************************************************************************************
//******************************************************************************************************************************
// Afegir thumbnail al feed (content)
function featured_image_in_feed( $content ) {
    global $post;
    if( is_feed() ) {
        if ( has_post_thumbnail( $post->ID ) ){
            $output = get_the_post_thumbnail( $post->ID, 'medium', array( 'style' => 'float:right; margin:0 0 10px 10px;' ) );
            $content = $output . $content;
        }
    }
    return $content;
}
add_filter( 'the_content', 'featured_image_in_feed' );
// Afegir thumbnail al feed (tag <image>)
function add_my_rss_node() {
	global $post;
	if(has_post_thumbnail($post->ID)):
		$thumbnail = get_attachment_link(get_post_thumbnail_id($post->ID));
		echo("<image>{$thumbnail}</image>");
	endif;
}
add_action('rss2_item', 'add_my_rss_node');
//


