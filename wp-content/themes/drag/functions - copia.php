<?php
//
//  Child's Play (a child theme for Thematic) Functions
//
// recreates the doctype section, html5boilerplate.com style with conditional classes
// the priority of 11 is added to override the priority of 10 on the Thematic HTML5 Plugin
// http://scottnix.com/html5-header-with-thematic/
//****************************************************************************************/

// Generador de ShortCodes
//GENERAR EL <HEAD> **********************************************************************************************************
//******************************************************************************************************************************
include_once(get_stylesheet_directory() . '/custom_shortcodes.php');
// DocType
function childtheme_create_doctype() {
    $content = "<!doctype html>" . "\n";
    $content .= '<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" dir="' . get_bloginfo ('text_direction') . '" lang="'. qtrans_getLanguage() . '"> <![endif]-->' . "\n";
    $content .= '<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" dir="' . get_bloginfo ('text_direction') . '" lang="'. qtrans_getLanguage() . '"> <![endif]-->'. "\n";
    $content .= '<!--[if IE 8]> <html class="no-js lt-ie9" dir="' . get_bloginfo ('text_direction') . '" lang="'. qtrans_getLanguage() . '"> <![endif]-->' . "\n";
    $content .= '<!--[if gt IE 8]><!-->' . "\n";
    $content .= '<html class="no-js"';
	$content .= ' prefix="og: http://ogp.me/ns#"';
    return $content;
}
add_filter('thematic_create_doctype', 'childtheme_create_doctype', 11);
// creates the head, meta charset, viewport tags & ie10 metatags
function childtheme_head_profile() {
	global $post;
    $content = "<!--<![endif]-->";
    $content .= "\n" . "<head>" . "\n";
    $content .= "<meta charset=\"utf-8\" />" . "\n";
    $content .= "<meta name=\"viewport\" content=\"user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width\" />" . "\n";
	$content .= "<!-- IE 9 and before ICON ><!-->" . "\n";
	$content .= "<!--[if (lt IE 9)|(IE 9)]>" . "\n";
	$content .= "<link rel=\"shortcut icon\"  href=\" ". get_stylesheet_directory_uri() . "/favicon.ico" . "\"/> <![endif]-->" . "\n";
	$content .= "<!-- Default ShortCut Icon ><!-->" . "\n";
	$content .= "<link rel=\"shortcut icon\"  href=\" ". get_stylesheet_directory_uri() . "/favicon.png" . "\"/>" . "\n";
	$content .= "<!-- Apple Touch Icon ><!-->" . "\n";
	$content .= "<link rel=\"apple-touch-icon\"  sizes=\"57x57\" href=\" ". get_stylesheet_directory_uri() . "/tile114.png" . "\"/>" . "\n";
	$content .= "<link rel=\"apple-touch-icon\"  sizes=\"114x114\" href=\" ". get_stylesheet_directory_uri() . "/tile114.png" . "\"/>" . "\n";
	$content .= "<link rel=\"apple-touch-icon\"  sizes=\"72x72\" href=\" ". get_stylesheet_directory_uri() . "/tile144.png" . "\"/>" . "\n";
	$content .= "<link rel=\"apple-touch-icon\"  sizes=\"144x144\" href=\" ". get_stylesheet_directory_uri() . "/tile144.png" . "\"/>" . "\n";
	//ie10 tags
	$content .= "<!-- ie10 metaTags For Tile ><!-->" . "\n";
	$content .= "<meta name=\"msapplication-TileColor\" content=\"#0e1c2d\" />" . "\n";
	$content .= "<meta name=\"msapplication-TileImage\" content=\"" . get_stylesheet_directory_uri() . "/tile144.png" . "\"/>" . "\n";
	// Open Graph Tags
    $default_img = get_stylesheet_directory_uri() . "/tile.png";
	$categories = get_the_category();
	if (is_front_page()) {
		$url = get_option('home');
		$title = get_bloginfo('name');
		$description = get_bloginfo('description');
		$type = 'website';
		$image = $default_img;
	} elseif (is_home()){ //Agafem l'ACF de la description amb l'ID de la pàgina
		$url = get_option('home');
		$title = get_bloginfo('name');
		if( qtrans_getLanguage() == 'es' ){
			$metafield = get_field ("metadescription_es", 11);
		 }elseif( qtrans_getLanguage() == 'ca' ){
			$metafield = get_field ("metadescription_ca", 11);
		 }else{
			$metafield = get_field ("metadescription_en", 11);
		 }
		if (!empty ($metafield)){ $description = $metafield . " | " . get_bloginfo('name');} else { $description = get_the_title() . " | " . get_bloginfo('name') . " / " . get_bloginfo('description');}
		$type = 'blog';
		$image = $default_img;
	} elseif (is_category()) { 
		global $wp; 
		$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
		if( qtrans_getLanguage() == 'es' ){$url_lang = '&lang=es';}elseif( qtrans_getLanguage() == 'ca' ){$url_lang = '&lang=ca';}else{$url_lang = '&lang=en';}
		$url =  $current_url . $url_lang;
		if( qtrans_getLanguage() == 'es' ){$taxonomy = 'Categoría';}elseif( qtrans_getLanguage() == 'ca' ){$taxonomy = 'Categoria';}else{$taxonomy = 'Category';}
		$title =  $taxonomy . ': ' . single_cat_title("", false) . " | " . get_bloginfo('name');
		$description = $taxonomy . ' ' . single_cat_title("", false) . ": " .  str_replace( "\n", "", strip_tags(category_description())) . " | " . get_bloginfo('name');
		$type = 'blog';
		$image = $default_img;
	} elseif (is_tag()) { 
		global $wp; 
		$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
		if( qtrans_getLanguage() == 'es' ){$url_lang = '&lang=es';}elseif( qtrans_getLanguage() == 'ca' ){$url_lang = '&lang=ca';}else{$url_lang = '&lang=en';}
		$url =  $current_url . $url_lang;
		if( qtrans_getLanguage() == 'es' ){$taxonomy = 'Etiquetado en';}elseif( qtrans_getLanguage() == 'ca' ){$taxonomy = 'Etiquetat a';}else{$taxonomy = 'Tagged in';}
		if( qtrans_getLanguage() == 'es' ){$taxonomy2 = 'Noticias etiquetadas en';}elseif( qtrans_getLanguage() == 'ca' ){$taxonomy2 = 'Notícies etiquetades a';}else{$taxonomy2 = 'Posts tagged in';}
		$title =  $taxonomy . ': ' . single_tag_title("", false) . " | " . get_bloginfo('name');
		$description = $taxonomy2 . ' ' . single_tag_title("", false) . " / "  .  get_bloginfo('description') . " | " . get_bloginfo('name');
		$type = 'blog';
		$image = $default_img;
	} elseif (is_archive()) { 
		global $wp; 
		$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
		if( qtrans_getLanguage() == 'es' ){$url_lang = '&lang=es';}elseif( qtrans_getLanguage() == 'ca' ){$url_lang = '&lang=ca';}else{$url_lang = '&lang=en';}
		$url =  $current_url . $url_lang;
		if( qtrans_getLanguage() == 'es' ){$archive = 'Archivo de Noticias';}elseif( qtrans_getLanguage() == 'ca' ){$archive = 'Arxiu de Notícies';}else{$archive = 'News Archive';}
		$title = $archive . " | " . get_bloginfo('name');
		$description = get_bloginfo('description') . " | " . get_bloginfo('name');
		$type = 'blog';
		$image = $default_img;
	} elseif (is_page()) {
		global $post;
		$url = get_permalink();
		if ($post->post_parent) {
			$parent_title = get_the_title($post->post_parent);
			$title = get_the_title() . " / " . $parent_title . " | " . get_bloginfo('name');
		} else {
			$title = get_the_title() . " | " . get_bloginfo('name');}    
			if( qtrans_getLanguage() == 'es' ){
			 	$metafield = get_field ("metadescription_es");
			 }elseif( qtrans_getLanguage() == 'ca' ){
			 	$metafield = get_field ("metadescription_ca");
			 }else{
			 	$metafield = get_field ("metadescription_en");
			 }
		if (!empty ($metafield)){ $description = $metafield . " | " . get_bloginfo('name');} else { $description = get_the_title() . " | " . get_bloginfo('name') . " / " . get_bloginfo('description');}
		$type = 'website';
		$image = get_fbimage();
	 } elseif (is_attachment()) {
		$url = get_permalink($post->ID);
		//$categories = get_the_category( $post->post_parent );
		$title = get_the_title() . " | " . get_bloginfo('name');
		if( qtrans_getLanguage() == 'es' ){
			 	$attach = 'Archivo Adjunto: ';
			 }elseif( qtrans_getLanguage() == 'ca' ){
			 	$attach = 'Arxiu Adjunt: ';
			 }else{
			 	$attach = 'Attached file: ';
			 }
        $description = $attach . get_the_title() . " | " . get_bloginfo('description') . " / " . get_bloginfo('name');
		$type = 'article';
		$image = get_fbimage();
	} elseif (is_single()) {
		$url = get_permalink($post->ID);
		$title = get_the_title() . " / " . $categories[0]->cat_name . " | " . get_bloginfo('name');
			if( qtrans_getLanguage() == 'es' ){
			 	$metafield = get_field ("metadescription_es");
			 }elseif( qtrans_getLanguage() == 'ca' ){
			 	$metafield = get_field ("metadescription_ca");
			 }else{
			 	$metafield = get_field ("metadescription_en");
			 }
            if (!empty ($metafield)){
				$description = $metafield . " | " . get_bloginfo('name');
			}elseif (has_excerpt($post->post_excerpt)) {
				$description = get_the_excerpt() . " / " . get_bloginfo('name');} 
			else {
				$description = get_the_title() . " | " . get_bloginfo('description') . " / " . get_bloginfo('name');} 
		$type = 'article';
		$image = get_fbimage();
	} else {
		$url = get_permalink();
		$title = get_the_title() . " | " . get_bloginfo('name');
		$description = get_bloginfo('description');
		$type = 'website';
		$image = $default_img;
	}
	$content .="<!-- og MetaTags ><!-->" . "\n";
	$content .='<meta property="og:site_name" content="' . get_bloginfo('name') . '" />' . "\n";
	$content .='<meta property="og:title" content="' . $title . '" />' . "\n";
	$content .='<meta property="og:description" content="' . $description . '" />' . "\n";
	$content .='<meta property="og:type" content="' . $type . '" />' . "\n";
	$content .='<meta property="og:url" content="' . $url . '" />' . "\n";
	$content .='<meta property="og:image" content="' . $image . '"/>' . "\n";
	$content .="<!-- END og MetaTags ><!-->" . "\n";
	// Twitter Summary Card
	$user_tw ="dragdroid";
	$content .="<!-- Twitter Summary Card ><!-->" . "\n";
	$content .='<meta name="twitter:card" content="summary">' . "\n";
	if (!empty ($user_tw)){
		$content .='<meta name="twitter:creator" content="@' . $user_tw . '">' . "\n";
	}
	$content .='<meta name="twitter:title" content="' . $title . '" />' . "\n";
	$content .='<meta name="twitter:description" content="' . $description . '" />' . "\n";
	$content .='<meta property="og:type" content="' . $type . '" />' . "\n";
	$content .='<meta property="og:url" content="' . $url . '" />' . "\n";
	$content .='<meta name="twitter:image" content="' . $image . '"/>' . "\n";
	$content .="<!-- END Twitter Summary Card ><!-->" . "\n";
	// Google Authorship (URL perfil Google Plus)
	$url_gplus ="u/0/116959801615366824799/";
	if (!empty ($url_gplus)){
		$content .="<!-- Google Authorship ><!-->" . "\n";
		$content .="<link rel='author' href='https://plus.google.com/" . $url_gplus . "' />" . "\n";
	}
	return $content;
}
add_filter('thematic_head_profile', 'childtheme_head_profile', 12);
// Thumbnail or Default Image (OG elements)
function get_fbimage() {
  global $post;
  $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium', '' );
  if (is_attachment()){
  	$fbimage = wp_get_attachment_url();
  }elseif ( has_post_thumbnail($post->ID) ) {
    $fbimage = $src[0];
  } else {
    global $post, $posts;
    $fbimage = '';
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $fbimage = $matches [1][0];
  }
  if(empty($fbimage)) {
    $fbimage = get_stylesheet_directory_uri() . "/tile.png";
  }
  return $fbimage;
}
// Create the title tag OPTIMIZED 
function childtheme_doctitle() {
	if(is_home() || is_front_page()) {
            $content = get_bloginfo('name') . " | " . get_bloginfo('description');
        }
	elseif (is_attachment()) {
			//$categories = get_the_category();
            $content = get_the_title() . " | " . get_bloginfo('name');
        }
	elseif (is_single()) {
			$categories = get_the_category();
            $content = get_the_title() . " / " . $categories[0]->cat_name . " | " . get_bloginfo('name');
        }
	elseif (is_page()) {
			global $post;
			if ( is_page() && $post->post_parent ) {
				$parent_title = get_the_title($post->post_parent);
				$content = get_the_title() . " / " . $parent_title . " | " . get_bloginfo('name');
			} else {
				$content = get_the_title() . " | " . get_bloginfo('name');
			}  
        }
	elseif (is_category()) {
			if( qtrans_getLanguage() == 'es' ){$taxonomy = 'Categoría';}elseif( qtrans_getLanguage() == 'ca' ){$taxonomy = 'Categoria';}else{$taxonomy = 'Category';}
			$current_category = single_cat_title("", false);
            $content = $taxonomy . ' ' . $current_category . " | " . get_bloginfo('name');
        }
	elseif (is_tag()) {
			if( qtrans_getLanguage() == 'es' ){$taxonomy = 'Etiquetado en';}elseif( qtrans_getLanguage() == 'ca' ){$taxonomy = 'Etiquetat a';}else{$taxonomy = 'Tagged in';}
			$current_tag = single_tag_title("", false);
            $content = $taxonomy . ' ' . $current_tag . " | " . get_bloginfo('name');
        }
	elseif (is_archive()) { 
			if( qtrans_getLanguage() == 'es' ){$archive = 'Archivo de Noticias';}elseif( qtrans_getLanguage() == 'ca' ){$archive = 'Arxiu de Notícies';}else{$archive = 'News Archive';}
			$content = $archive . " | " . get_bloginfo('name');
		}	
	elseif (is_search()) {
			if( qtrans_getLanguage() == 'es' ){$content = "BÚSQUEDA: ";}elseif( qtrans_getLanguage() == 'ca' ){$content = "CERCA: ";}else{$content = "SEARCH: ";}
            $content .= get_search_query() . " | " . get_bloginfo('name') . " / " . get_bloginfo('description');
        }
	elseif (is_404()) {
             if( qtrans_getLanguage() == 'es' ){$content = "No encontramos la Página";}elseif( qtrans_getLanguage() == 'ca' ){$content = "No trobem la Pàgina";}else{$content = "Page not found";}
			 $content .= " | " . get_bloginfo('name') . " / " . get_bloginfo('description');
        }
	else {
            $content = get_bloginfo('name') . " | " . get_bloginfo('description');
        }
    return $content;
}
add_filter('thematic_doctitle', 'childtheme_doctitle', 11);
// Create the meta description OPTIMIZED
function childtheme_show_description() {
	global $post;
	$content ="<!-- HTML Standard Description ><!-->" . "\n";
	$content .= '<meta name="description" content="';
	if(is_front_page()) {
            if( qtrans_getLanguage() == 'es' ){
			 	$metafield = get_field ("metadescription_es");
			 }elseif( qtrans_getLanguage() == 'ca' ){
			 	$metafield = get_field ("metadescription_ca");
			 }else{
			 	$metafield = get_field ("metadescription_en");
			 }
            if (!empty ($metafield)){
				$content .= $metafield . " | " . get_bloginfo('name');}
			else {
				$content .= get_bloginfo('description') . " / " . get_bloginfo('name');} 
        }
	elseif(is_home()) { //Per la portada del blog cal que cridem el $metafield amb l'ID
            if( qtrans_getLanguage() == 'es' ){
			 	$metafield = get_field ("metadescription_es", 11);
			 }elseif( qtrans_getLanguage() == 'ca' ){
			 	$metafield = get_field ("metadescription_ca", 11);
			 }else{
			 	$metafield = get_field ("metadescription_en", 11);
			 }
            if (!empty ($metafield)){
				$content .= $metafield . " | " . get_bloginfo('name');}
			else {
				$content .= get_bloginfo('description') . " / " . get_bloginfo('name');} 
        }
	elseif (is_attachment()) {
			if( qtrans_getLanguage() == 'es' ){
			 	$attach = 'Archivo Adjunto: ';
			 }elseif( qtrans_getLanguage() == 'ca' ){
			 	$attach = 'Arxiu Adjunt: ';
			 }else{
			 	$attach = 'Attached file: ';
			 }
            $content .= $attach . get_the_title() . " | " . get_bloginfo('description') . " / " . get_bloginfo('name');
        }
	elseif (is_single()) {
			if( qtrans_getLanguage() == 'es' ){
			 	$metafield = get_field ("metadescription_es");
			 }elseif( qtrans_getLanguage() == 'ca' ){
			 	$metafield = get_field ("metadescription_ca");
			 }else{
			 	$metafield = get_field ("metadescription_en");
			 }
            if (!empty ($metafield)){
				$content .= $metafield . " | " . get_bloginfo('name');
			}elseif (has_excerpt($post->post_excerpt)) {
				$content .= get_the_excerpt() . " / " . get_bloginfo('name');} 
			else {
				$content .= get_the_title() . " | " . get_bloginfo('description') . " / " . get_bloginfo('name');} 
        }
	elseif (is_page()) {
			if( qtrans_getLanguage() == 'es' ){
			 	$metafield = get_field ("metadescription_es");
			 }elseif( qtrans_getLanguage() == 'ca' ){
			 	$metafield = get_field ("metadescription_ca");
			 }else{
			 	$metafield = get_field ("metadescription_en");
			 }
            if (!empty ($metafield)){
				$content .= $metafield . " | " . get_bloginfo('name');
			} else { $content .= get_the_title() . " | " . get_bloginfo('name') . " / " . get_bloginfo('description');}
        }
	elseif (is_search()) {
			 if( qtrans_getLanguage() == 'es' ){
			 	$content .=  "Resultados de la BÚSQUEDA: ";
			 }elseif( qtrans_getLanguage() == 'ca' ){
			 	$content .= "Resultats de la CERCA: ";
			 }else{
			 	$content .= "SEARCH results: ";
			 }
             $content .= get_search_query() . " | " . get_bloginfo('name') . " / " . get_bloginfo('description');
        }
	elseif (is_404()) {
			if( qtrans_getLanguage() == 'es' ){
			 	$content .=  "Lo sentimos pero la Página que estás buscando no existe. Te proponemos algunas alternativas.";
			 }elseif( qtrans_getLanguage() == 'ca' ){
			 	$content .= "Ho sentim però la Pàgina que estás cercant no existeix. Et proposem algunes alternatives.";
			 }else{
			 	$content .= "Sorry we can't find the page that you're looking for. There are another options.";
			 }
             $content .= " | " . get_bloginfo('name') . get_bloginfo('description');
        }
	elseif (is_category()) {
			if( qtrans_getLanguage() == 'es' ){$taxonomy = 'Categoría';}elseif( qtrans_getLanguage() == 'ca' ){$taxonomy = 'Categoria';}else{$taxonomy = 'Category';}
            $content .= $taxonomy . ' ' . single_cat_title("", false) . ": " . str_replace( "\n", "", strip_tags(category_description())) . " | " . get_bloginfo('name');
        }
	elseif (is_tag()) {
			if( qtrans_getLanguage() == 'es' ){$taxonomy = 'Noticias etiquetadas en';}elseif( qtrans_getLanguage() == 'ca' ){$taxonomy = 'Notícies etiquetades a';}else{$taxonomy = 'Posts tagged in';}
            $content .= $taxonomy . ': ' . single_tag_title("", false) . " | " . get_bloginfo('name') . " / " .  get_bloginfo('description');
        }
	else {
            $content .= get_bloginfo('name') . " | " . get_bloginfo('description');
        }
	$content .= '" />' . "\n";
	$content .="<!-- END MetaTags ><!-->" . "\n";
    return $content;
}
add_filter('thematic_create_description', 'childtheme_show_description', 11);
// remove the index and follow tags from header since it is browser default.
// http://scottnix.com/polishing-thematics-head/
function childtheme_create_robots($content) {
    global $paged;
    if (thematic_seo()) {
        if((is_home() && ($paged < 2 )) || is_front_page() || is_single() || is_page() || is_attachment())
        {
            $content = "";
        } elseif (is_search()) {
            $content = "<meta name=\"robots\" content=\"noindex,nofollow\" />";
            $content .= "\n";
        } else {
            $content = "<meta name=\"robots\" content=\"noindex,follow\" />";
            $content .= "\n";
        }
    return $content;
    }
}
add_filter('thematic_create_robots', 'childtheme_create_robots');
	// clear useless garbage for a polished head
	// remove category and tags feed
	remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
	// remove comments feed
	remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
	// remove really simple discovery
	remove_action('wp_head', 'rsd_link');
	// remove windows live writer xml
	remove_action('wp_head', 'wlwmanifest_link');
	// remove index relational link
	remove_action('wp_head', 'index_rel_link');
	// remove parent relational link
	remove_action('wp_head', 'parent_post_rel_link');
	// remove start relational link
	remove_action('wp_head', 'start_post_rel_link');
	// remove prev/next relational link
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
// Reinsert the main RSS feed by using add_action to call our function
  add_action( 'wp_head', 'reinsert_rss_feed', 1 );
// This function will reinsert the main RSS feed *after* the others have been removed
  function reinsert_rss_feed() {
      echo '<link rel="alternate" type="application/rss+xml" title="' . get_bloginfo('sitename') . ' / RSS Feed" href="' . get_bloginfo('rss2_url') . '" />' . "\n";
}
// kills the 4 scripts for the drop downs, combined and reloaded by the script manager (dropdowns-js)
function childtheme_override_head_scripts() {
    // silence
}
// script manager template for registering and enqueuing files
function childtheme_script_manager() {
    // wp_register_script template ( $handle, $src, $deps, $ver, $in_footer );
    // registers modernizr script, stylesheet local path, no dependency, no version, loads in header
    wp_register_script('modernizr-js', get_stylesheet_directory_uri() . '/js/modernizr.js', false, false, false);
    // registers dropdowns script, local stylesheet path, yes dependency is jquery, no version, loads in footer
    // wp_register_script('dropdowns-js', get_bloginfo('stylesheet_directory') . '/js/superfish-dropdowns.js', array('jquery'), false, true);
    // registers fitvids script, local stylesheet path, yes dependency is jquery, no version, loads in footer
    wp_register_script('fitvids-js', get_stylesheet_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), false, true);
    // registers misc custom script, local stylesheet path, yes dependency is jquery, no version, loads in footer
    wp_register_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), false, true);
    // registers flexslider script, local stylesheet path, yes dependency is jquery, no version, loads in footer
    wp_register_script('flexslider-js', get_stylesheet_directory_uri() . '/flexslider/jquery.flexslider-min.js', array('jquery'), false, true);
	// registers validator script, loads in footer
    wp_register_script('validate-js', get_stylesheet_directory_uri() . '/js/jquery.validate.js', array('jquery'), false, true);
	 // registers flexslider styles, local stylesheet path
    wp_register_style('flexslider-page-css', get_stylesheet_directory_uri() . '/flexslider/flexslider_page.css');
	 // registers flexslider styles, local stylesheet path
    wp_register_style('flexslider-css', get_stylesheet_directory_uri() . '/flexslider/flexslider.css');
	// registers colorbox script, loads in footer
    wp_register_script('colorbox-js', get_stylesheet_directory_uri() . '/js/jquery.colorbox-min.js', array('jquery'), false, true);
	// registers flexslider styles, local stylesheet path
    wp_register_style('colorbox-css', get_stylesheet_directory_uri() . '/css/colorbox.css');
	// registers flexslider styles, local stylesheet path
    wp_register_style('colorbox-css-posts', get_stylesheet_directory_uri() . '/css/colorbox_posts.css');
	// enqueue the scripts for use in theme
    wp_enqueue_script ('modernizr-js');
    wp_enqueue_script ('fitvids-js');
	wp_enqueue_script ('validate-js');
	//
	//poner en cola scripts y css de flexslider
       if ( is_home() ) {
            wp_enqueue_style ('flexslider-page-css');
        } elseif ( is_front_page() ) {//en el array elegimos que paginas cargan el script. Más abajo debemos activar el script del head
			wp_enqueue_script ('flexslider-js');
		} 
		if ( is_front_page() || is_page() || is_single() || is_404() || is_search() || is_archive() ) {
            wp_enqueue_style ('flexslider-page-css');
		}			
	//carga el colorbox para las páginas de contenido
       if ( is_page(7) ) {
            wp_enqueue_script ('colorbox-js');
			wp_enqueue_style ('colorbox-css');
		} elseif ( is_single() || ( is_page() && !is_page(array( 4, 8, 10, 13 )) ) ) {
            wp_enqueue_script ('colorbox-js');
			wp_enqueue_style ('colorbox-css-posts');
		}		
    //always enqueue this last, helps with conflicts
    wp_enqueue_script ('custom-js');
}
add_action('wp_enqueue_scripts', 'childtheme_script_manager');
// Añadir Fuentes al Framework 
function childtheme_fonts_manager() {
	// register style, google-fonts css custom font
	wp_register_style('google-fonts', 'http://fonts.googleapis.com/css?family=Roboto:300,500,700');
	// register style, Awesome Fonts ICONS
    wp_register_style('awesome-css', get_stylesheet_directory_uri() . '/css/font-awesome.min.css');
	// register style, Awesome Fonts ICONS ie7
    wp_register_style('awesome-css-ie7', get_stylesheet_directory_uri() . '/css/font-awesome-ie7.min.css');
	// enqueue the styles for use in theme
	wp_enqueue_style ('google-fonts');
	// enqueue the styles for  Awesome Fonts ICONS
    wp_enqueue_style('awesome-css');
	// enqueue the styles for  Awesome Fonts ICONS
    wp_enqueue_style('awesome-css-ie7');
	// conditionally enqueue the styles fo Awesome Fonts ICONS
	global $wp_styles;
	$wp_styles->add_data('awesome-css-ie7', 'conditional', 'lte IE 7');
}
add_action('wp_enqueue_scripts', 'childtheme_fonts_manager');
// Remove Qtranslate CSS code from <HEAD>
remove_action('wp_head', 'qtrans_header');
// SCRIPTS AL HEAD ***************************************************************************************
// Script de FlexSlider <head> - Condicional elige tipo de pagina a donde se activa
function childtheme_flexslider_script() {
if ( is_front_page() ) { ?>
<script>
jQuery(window).ready(function() {
	jQuery(".flexslider").flexslider({
		animation: "fade",
		animationLoop: true, 
		slideshow: false,
		animationSpeed: 1000,
		pauseOnHover: true,
		keyboard: false,
		controlNav: true, 
		manualControls: ".flex-control-nav li",
		start: function(slider) {
   			slider.removeClass('loading');
		}
	});
});
</script>
<?php }
}
add_action('wp_head', 'childtheme_flexslider_script');
// Script de validate.js (tria a quina pagina s'activa)
function contact_form_validator() {?>
<?php if ( is_home() || is_single() || (is_page() && !is_page_template()) || is_404() || is_archive() || is_search() ) { // Combina validació FORM FOOTER + SEARCHFORM ?>
<script>
jQuery(document).ready(function() {
  jQuery.validator.addMethod('defaultCheck', function (value, element) {
		return !(element.value == element.defaultValue);
		}, '');
  jQuery("#searchform").validate({
  	rules: {
		s: {'defaultCheck':'',
		required: true
		}
	}
  })
  jQuery("#form").validate({
  })
});
</script>
<?php }else{ //FORM FOOTER ?>
<script>
jQuery(document).ready(function() {
  jQuery("#form").validate({
  })
});
</script>
<?php } //Cierre IF 
}
add_action('wp_head', 'contact_form_validator');
//DEFINIR ELS WIDGETS **********************************************************************************************************
//******************************************************************************************************************************
// had to add this to get a div around the titles, mostly for correct scaling on em paddings.
// also beefed up to add more robust style options with spans which all around gives you tons of title styling options
// register two additional custom menu slots
function childtheme_register_menus() {
    if ( function_exists( 'register_nav_menu' )) {
        register_nav_menu( 'secondary-menu', 'Secondary Menu' );
        register_nav_menu( 'tertiary-menu', 'Tertiary Menu' );
    }
}
add_action('init', 'childtheme_register_menus');
// completely remove nav above functionality
function childtheme_override_nav_above() {
    // silence
}
// add a header aside widget, currently set up to be inside the #branding div
function childtheme_add_header_widget($content) {
    $content['Header Aside Widget'] = array(
        'admin_menu_order' => 2,
        'args' => array (
        'name' => 'Header Aside',
        'id' => 'header-aside-widget',
        'description' => __('The widget area in the header.', 'thematic'),
        'before_widget' => thematic_before_widget(),
        'after_widget' => thematic_after_widget(),
        'before_title' => thematic_before_title(),
        'after_title' => thematic_after_title(),
            ),
        'action_hook'   => 'thematic_header',
        'function'      => 'childtheme_header_aside_widget',
        'priority'      => 6
        );
    return $content;
}
add_filter('thematic_widgetized_areas', 'childtheme_add_header_widget');
// set structure for the header aside widget
function childtheme_header_aside_widget() {
    if ( is_active_sidebar('header-aside-widget') ) {
        echo thematic_before_widget_area('header-widget');
        dynamic_sidebar('header-aside-widget');
        echo thematic_after_widget_area('header-widget');
    }
}
// add 4th subsidiary aside widget, currently set up to be a footer widget (#footer-widget) underneath the 3 subs
function childtheme_add_subsidiary($content) {
    $content['Footer Widget Aside'] = array(
        'admin_menu_order' => 550,
        'args' => array (
        'name' => 'Footer Aside',
        'id' => '4th-subsidiary-aside',
        'description' => __('The 4th bottom widget area in the footer.', 'thematic'),
        'before_widget' => thematic_before_widget(),
        'after_widget' => thematic_after_widget(),
        'before_title' => thematic_before_title(),
        'after_title' => thematic_after_title(),
            ),
        'action_hook'   => 'widget_area_subsidiaries',
        'function'      => 'childtheme_4th_subsidiary_aside',
        'priority'      => 90
        );
    return $content;
}
add_filter('thematic_widgetized_areas', 'childtheme_add_subsidiary');
// set structure for the 4th subsidiary aside, footer widget (#footer-widget)
// this is modified from the original by adding the .sub-wrapper, super hacky!
function childtheme_4th_subsidiary_aside() {
    if ( is_active_sidebar('4th-subsidiary-aside') ) {
        echo thematic_before_widget_area('footer-widget');
        dynamic_sidebar('4th-subsidiary-aside');
        echo thematic_after_widget_area('footer-widget');
    }
    echo "\n" . '</div><!-- .sub-wrapper -->' . "\n";
}
// open the sub-wrapper, super hacky!
function childtheme_subsidiary_wrapper_div () { ?>
    <div class="sub-wrapper">
<?php }
add_action('thematic_footer', 'childtheme_subsidiary_wrapper_div');
// hide unused widget areas inside the WordPress admin
function childtheme_hide_areas($content) {
    unset($content['Index Top']);
    unset($content['Index Insert']);
    unset($content['Index Bottom']);
    unset($content['Single Top']);
    unset($content['Single Insert']);
    unset($content['Single Bottom']);
    unset($content['Page Top']);
    unset($content['Page Bottom']);
    return $content;
}
add_filter('thematic_widgetized_areas', 'childtheme_hide_areas');
//<BODY> **********************************************************************************************************
//******************************************************************************************************************************
// <BODY> header ************************************************************************************
function childtheme_override_access() { ?>
    <div id="access" class="cf">
        <div class="menu-button">
        <?php //Nombre "MENU" multidioma
			if( qtrans_getLanguage() == 'en' ){ ?>
    			<span class="menu-title graybutton"><span>MENU</span><i class="icon-list"></i></i></span>
			<?php }else { ?>
        		<span class="menu-title graybutton"><span>MENÚ</span><i class="icon-list"></i></span>
			<?php } ?>     
		<div class="button">
        <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></div></div>
        <nav class="access-nav cf" role="navigation">
               <?php
                if ( ( function_exists("has_nav_menu") ) && ( has_nav_menu( apply_filters('thematic_primary_menu_id', 'primary-menu') ) ) ) {
                    echo  wp_nav_menu(thematic_nav_menu_args());
                } else {
                    echo  thematic_add_menuclass(wp_page_menu(thematic_page_menu_args()));
                }
                ?>
        </nav>
    </div><!-- #access -->
    <?php
}
// Add Header Logo + Link Home
function thematic_logo_image() {
	echo '<a href="' . get_bloginfo('url') . ('/') . qtrans_getLanguage() . ('/') . '" title="' . get_bloginfo('name') . '" id="header-image" ><span><img src="' . get_stylesheet_directory_uri() . ('/images/layout/drag_logo.gif') . '" alt="DRAG" /></span></a>';
}
add_action('thematic_header','thematic_logo_image',6);
// Breadcrumbs
function dimox_breadcrumbs() {
  /* === OPTIONS === */
  $text['home']     = 'INICIO'; // text for the 'Home' link
  $text['category'] = 'Archivo de "%s"'; // text for a category page
  $text['search']   = 'Resultados para "%s"'; // text for a search results page
  $text['tag']      = '"%s"'; // text for a tag page
  $text['author']   = 'Articles Posted by %s'; // text for an author page
  $text['404']      = 'P&aacute;gina no encontrada'; // text for the 404 page
 
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $showOnHome  = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter   = '&nbsp;&nbsp;&gt;&nbsp;&nbsp;'; // delimiter between crumbs
  $before      = '<span class="current">'; // tag before the current crumb
  $after       = '</span>'; // tag after the current crumb
  /* === END OF OPTIONS === */ 
  global $post;
  $homeLink = get_bloginfo('url') . '/' . qtrans_getLanguage() . '/';
  $linkBefore = '<span typeof="v:Breadcrumb">';
  $linkAfter = '</span>';
  $linkAttr = ' rel="v:url" property="v:title"';
  $link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;
  if (is_home() || is_front_page()) {
    if ($showOnHome == 1) echo '<nav id="crumbs"><span class="current">' . $text['home'] . '</span></nav>';
  } else {
    echo '<nav id="crumbs" xmlns:v="http://rdf.data-vocabulary.org/#">' . sprintf($link, $homeLink, $text['home']) . $delimiter;
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) {
        $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
        $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
        $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
        echo $cats;
      }
      echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
    } elseif ( is_search() ) {
      echo $before . sprintf($text['search'], get_search_query()) . $after;
    } elseif ( is_day() ) {
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
      echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
      echo $before . get_the_time('d') . $after;
    } elseif ( is_month() ) {
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
      echo $before . get_the_time('F') . $after;
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
        if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, $delimiter);
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
        $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
        $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      $cats = get_category_parents($cat, TRUE, $delimiter);
      $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
      $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
      echo $cats;
      printf($link, get_permalink($parent), $parent->post_title);
      if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo $delimiter;
      }
      if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . sprintf($text['author'], $userdata->display_name) . $after;
 
    } elseif ( is_404() ) {
      echo $before . $text['404'] . $after;
    }
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
    echo '</nav>';
  }
} // end dimox_breadcrumbs()
//<BODY> - search  ******************************************************************************************************
// change the default search box text
function childtheme_search_field_value() {
	if( qtrans_getLanguage() == 'es' ){
		return "Introduce tu búsqueda";
	}elseif( qtrans_getLanguage() == 'ca' ){
		return "Introdueix la teva cerca";
	}else {
		return "Your search query";
	}
}
add_filter('search_field_value', 'childtheme_search_field_value');
// Canvia el text del boto del search
function childtheme_search_submit_value() {
	$search_submit = '<input id="searchsubmit" name="searchsubmit" type="submit" ';
	if ( is_home() || is_page() || is_page_template('template-full-archive.php') || is_page_template('template-page-fullwidth.php') || is_single() || is_archive() || is_attachment() || is_search() && have_posts() ){
		$search_submit .= 'value="&#xF002;" tabindex="2" />';
	}else{
		if( qtrans_getLanguage() == 'es' ){ $search_submit .= 'value="' . __('Search', 'thematic') . '" tabindex="2" />';
        }elseif( qtrans_getLanguage() == 'ca' ){ $search_submit .= 'value="CERCAR" tabindex="2" />';
        }elseif( qtrans_getLanguage() == 'en' ){ $search_submit .= 'value="' . __('Search', 'thematic') . '" tabindex="2" />';
        }
	}
	return $search_submit;
}
add_filter('thematic_search_submit', 'childtheme_search_submit_value');
// Regenerem el Search Form per a que sigui miltilanguaje
function childtheme_search_form() {
	$search_form_length = apply_filters('thematic_search_form_length', '22');
	$search_form  = "\n\t\t\t\t\t\t";
	$search_form .= '<form id="searchform" method="get" action="' . home_url() .'/' . qtrans_getLanguage() . '/">';
	$search_form .= "\n\n\t\t\t\t\t\t\t";
	$search_form .= '<div>';
	$search_form .= "\n\t\t\t\t\t\t\t\t";
	if (is_search()) {
	    	$search_form .= '<input id="s" name="s" type="text" value="' . esc_html ( stripslashes( $_GET['s'] ) ) .'" size="' . $search_form_length . '" tabindex="1" />';
	} else {
	    	$value = __( 'To search, type and hit enter', 'thematic' );
	    	$value = apply_filters( 'search_field_value',$value );
	    	$search_form .= '<input id="s" name="s" type="text" value="' . $value . '" onfocus="if (this.value == \'' . $value . '\') {this.value = \'\';}" onblur="if (this.value == \'\') {this.value = \'' . $value . '\';}" size="'. $search_form_length .'" tabindex="1" />';
	}
	$search_form .= "\n\n\t\t\t\t\t\t\t\t";
	
	$search_submit = '<input id="searchsubmit" name="searchsubmit" type="submit" value="' . __('Search', 'thematic') . '" tabindex="2" />';
	
	$search_form .= apply_filters('thematic_search_submit', $search_submit);
	
	$search_form .= "\n\t\t\t\t\t\t\t";
	$search_form .= '</div>';
	
	$search_form .= "\n\n\t\t\t\t\t\t";
	$search_form .= '</form>' . "\n\n\t\t\t\t\t";
	echo apply_filters('childtheme_search_form', $search_form);
}
add_filter('thematic_search_form', 'childtheme_search_form');
// Títol de la Pàgina ****************************************************************************************
function childtheme_override_page_title() {
    global $post;
        $content = "\t\t\t\t";
        $content .= '<header class="title-wrap">';
        if (is_attachment()) {
                $content .= '<h2><a href="';
                $content .= apply_filters('the_permalink',get_permalink($post->post_parent));
                $content .= '" rev="attachment" title="' . get_the_title($post->post_parent) . '">';
                $content .= '<i class="icon-file"></i></a>';
				$content .= '<em>' . get_the_title($post->post_parent) . '</em>';
				if( qtrans_getLanguage() == 'es' ){ $content .= ': Archivos adjuntos.';
				}elseif( qtrans_getLanguage() == 'ca' ){ $content .= ": Arxius adjunts.";
				}elseif( qtrans_getLanguage() == 'en' ){ $content .= ': Attached files.';
				}
				$content .= '</h2>';
        } elseif (is_author()) {
                $content .= '<h1>';
                $content .= '<span class="icon-wrap"><i class="icon-pencil"></i></span>';
				$author = get_the_author_meta( 'nickname', $post->post_author );
                $content .= '<em>' . $author . '</em>';
				if( qtrans_getLanguage() == 'es' ){ $content .= ': Archivo del autor.';
				}elseif( qtrans_getLanguage() == 'ca' ){ $content .= ": Arxiu de l'autor.";
				}elseif( qtrans_getLanguage() == 'en' ){ $content .= ': Author Archive.';
				}
                $content .= '</h1>';
        } elseif (is_category()) {
                $content .= '<h1>';
				$queried_object = get_queried_object(); 
				$taxonomy = $queried_object->taxonomy;
				$term_id = $queried_object->term_id; 
				$iconcat = get_field('cat_icon', $taxonomy . '_' . $term_id);
                $content .= '<span class="icon-wrap"><i class="' . $iconcat . '"></i></span>';
                $content .= '<em>' . single_cat_title('', FALSE) . '</em>';
				if( qtrans_getLanguage() == 'es' ){ $content .= ': Archivo de la categoría.';
				}elseif( qtrans_getLanguage() == 'ca' ){ $content .= ': Arxiu de la categoria.';
				}elseif( qtrans_getLanguage() == 'en' ){ $content .= ': Category Archive.';
				}
                $content .= '</h1>' . "\n";
        } elseif (is_search()) {
                $content .= '<h1>';
                $content .= '<span class="icon-wrap"><i class="icon-search"></i></span>';
                $content .= '<em>' . get_search_query() . '</em>';
                if( qtrans_getLanguage() == 'es' ){ $content .= ': Resultados de la búsqueda.';
				}elseif( qtrans_getLanguage() == 'ca' ){ $content .= ': Resultats de la cerca.';
				}elseif( qtrans_getLanguage() == 'en' ){ $content .= ': Search Results.';
				}
				$content .= '</h1>';
        } elseif (is_tag()) {
                $content .= '<h1>';
				$content .= '<span class="icon-wrap"><i class="icon-tag"></i></span>';
                $content .= '<em>' . single_tag_title( '', false ) .'</em>';
                if( qtrans_getLanguage() == 'es' ){ $content .= ': Archivo temático.';
				}elseif( qtrans_getLanguage() == 'ca' ){ $content .= ': Arxiu temàtic.';
				}elseif( qtrans_getLanguage() == 'en' ){ $content .= ': Tag archive.';
				}
                $content .= '</h1>';
        } elseif (is_tax()) {
                global $taxonomy;
                $content .= '<h1>';
				$content .= '<span class="icon-wrap"><i class="icon-archive"></i></span>';
                $tax = get_taxonomy($taxonomy);
                $content .= '<em>' . $tax->labels->singular_name . '</em>';
                $content .= thematic_get_term_name();
                $content .= '</h1>';
        } elseif (is_post_type_archive() && is_archive() ) {
                $content .= '<h1>';
                $post_type_obj = get_post_type_object( get_post_type() );
				$content .= '<span class="icon-wrap"><i class="icon-calendar"></i></span>';
                $post_type_name = $post_type_obj->labels->singular_name;
                $content .= '<em>' . $post_type_name . '</em>';
				if( qtrans_getLanguage() == 'es' ){ $content .= ': Archivos.';
				}elseif( qtrans_getLanguage() == 'ca' ){ $content .= ': Arxius.';
				}elseif( qtrans_getLanguage() == 'en' ){ $content .= ': Archives.';
				}
                $content .= '</h1>';
        } elseif (is_day()) {
                $content .= '<h1>';
				$content .= '<span class="icon-wrap"><i class="icon-calendar"></i></span>';
                $content .= '<em>' . get_the_time(get_option('date_format')) . '</em>';
                if( qtrans_getLanguage() == 'es' ){ $content .= ': Archivo cronológico.';
				}elseif( qtrans_getLanguage() == 'ca' ){ $content .= ': Arxiu cronològic.';
				}elseif( qtrans_getLanguage() == 'en' ){ $content .= ': ' . sprintf(__('Daily Archives', 'thematic'));
				}
				$content .= '</h1>';
        } elseif (is_month()) {
                $content .= '<h1>';
				$content .= '<span class="icon-wrap"><i class="icon-calendar"></i></span>';
                $content .= '<em>' . get_the_time('F Y') . '</em>';
                if( qtrans_getLanguage() == 'es' ){ $content .= ': Archivo cronológico.';
				}elseif( qtrans_getLanguage() == 'ca' ){ $content .= ': Arxiu cronològic.';
				}elseif( qtrans_getLanguage() == 'en' ){ $content .= ': ' . sprintf(__('Monthly Archives', 'thematic'));
				}
				$content .= '</h1>';
        } elseif (is_year()) {
                $content .= '<h1>';
				$content .= '<span class="icon-wrap"><i class="icon-calendar"></i></span>';
                $content .= '<em>' . get_the_time('Y') . '</em>';
                if( qtrans_getLanguage() == 'es' ){ $content .= ': Archivo cronológico.';
				}elseif( qtrans_getLanguage() == 'ca' ){ $content .= ': Arxiu cronològic.';
				}elseif( qtrans_getLanguage() == 'en' ){ $content .= ': ' . sprintf(__('Yearly Archives', 'thematic'));
				}
				$content .= '</h1>';
        }
        $content .= "\n";
        $content .= "</header> <!-- .title-wrap -->";
    echo apply_filters('thematic_page_title', $content);
}
//<BODY> - output del POST ****************************************************************************************************************************
// LOOPS *************************************************************************************
// Evita que es dupluquin posts fent amb multiples categories
$bmIgnorePosts = array();
/**
 * add a post id to the ignore list for future query_posts
 */
function bm_ignorePost ($id) {
	if (!is_page()) {
		global $bmIgnorePosts;
		$bmIgnorePosts[] = $id;
	}
}
/**
 * reset the ignore list
 */
function bm_ignorePostReset () {
	global $bmIgnorePosts;
	$bmIgnorePosts = array();
}
/**
 * remove the posts from query_posts
 */
function bm_postStrip ($where) {
	global $bmIgnorePosts, $wpdb;
	if (count($bmIgnorePosts) > 0) {
		$where .= ' AND ' . $wpdb->posts . '.ID NOT IN(' . implode (',', $bmIgnorePosts) . ') ';
	}
	return $where;
}
add_filter ('posts_where', 'bm_postStrip');
// Format dels Sticky Posts (eliminats del Loop)
function childtheme_flexslider_slider() {
    if ( is_home() ) {
        ?>
        <header class="title-wrap">
        	<h1>
            	<span class="icon-wrap"><i class="icon-fire"></i></span>
                <em><?php if( qtrans_getLanguage() == 'es' ){ $content = 'NOTICIAS DESTACADAS';
				}elseif( qtrans_getLanguage() == 'ca' ){ $content = 'NOTÍCIES DESTACADES';
				}elseif( qtrans_getLanguage() == 'en' ){ $content = 'FEATURES NEWS';
				} 
				echo $content?>
                </em>
            </h1>
        </header>
        <article class="loop_featured_wrap">
			<?php
            query_posts(array('post__in'=>get_option('sticky_posts'), 'numberposts' => 2, 'orderby'=>"post_date"));
            if(have_posts()) :
            while(have_posts()) : the_post();
            ?>
                <section class="loop_results_featured">
                <a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title(); ?>">
                	<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail('large');
					}
					else {
						echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" />';
					} ?>
                    <em><?php the_title(); ?></em>
                    <?php the_excerpt(); ?>
                </a>
                <?php thematic_postfooter(); ?>
                </section>
            <?php
            endwhile;
            endif;
                wp_reset_query();
            ?>
        	<span class="brkr brkr50 big_screen"></span>
            <div class="clearboth"></div> 
        </article>
    <?php }
}
add_action('thematic_above_indexloop', 'childtheme_flexslider_slider');
//override the index loop and remove the sticky posts, which will now be handled by the slider
function childtheme_override_index_loop() {
	global $post;
	$categories = get_categories( array ('orderby' => 'id', 'order' => 'asc' ) ); 
 	foreach ($categories as $category) :
		query_posts( array (/*"post__not_in" =>get_option("sticky_posts"),*/ 'category_name' => $category->slug, 'showposts' => '4', 'orderby' => 'date', 'order' => 'DESC' ) ); ?>
        <article class="loop_expand_wrap">
            <header class="title-wrap">
                <h2 class="entry_title post_header">
                    <a href="<?php echo get_category_link($category->term_id); ?>" target="_self" title="<?php single_cat_title() ?>"><i class="<?php the_field('cat_icon', 'category_'.$category->cat_ID); ?>"></i></a> 
                    <?php single_cat_title(); ?>
                </h2>
            </header>
            <span class="loop_expand_news_wrap">
            <?php if ( have_posts() ): ?>
				<?php $i = 1; ?>
                <?php while ( have_posts() ) : ?>
                    <?php bm_ignorePost($post->ID); ?>
                    <?php the_post(); ?> 
                    <section id="post-<?php the_ID(); ?>" class="loop_results_expand">
                        <a href="<?php the_permalink(); ?>" title=" <?php echo the_title() ?>">
                            <?php
                                if ( has_post_thumbnail() ) {
                                echo get_the_post_thumbnail(get_the_ID(),'loop_thumb');
                                }
                                else {
                                    echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" />';
                                }
                            ?>
                            <em><?php echo the_title() ?></em>
                        </a> 
                        <?php thematic_postfooter(); ?>
                	</section>
                    <?php if ( $i==2 ) : ?>
                            <div class="clearboth small_screen"></div> 
                    <?php endif; ?>
                    <?php $i++; ?>  
                <?php endwhile; ?> 
                <span class="brkr brkr25 big_screen"></span>
                <span class="brkr brkr50 big_screen"></span>
                <span class="brkr brkr50 small_screen"></span>
                <span class="brkr brkr75 big_screen"></span>
                <div class="clearboth"></div> 
            </span>
            </article>
			<?php endif;
	endforeach;?>
		<footer class="foot_paged">
        	<?php if( qtrans_getLanguage() == 'es' ){ $content = 'TODAS LAS NOTICIAS';
			}elseif( qtrans_getLanguage() == 'ca' ){ $content = 'TOTES LES NOTÍCIES';
			}elseif( qtrans_getLanguage() == 'en' ){ $content = 'ALL NEWS';
			} ?>
        	<a href="<?php echo get_bloginfo('url') . ('/') . qtrans_getLanguage() . '/arxiu-de-noticies/' ; ?>" class="link_to_archive" title="<?php echo $content; ?>"/>
            <?php echo $content; ?>
            &nbsp;<i class="icon-chevron-right"></i></a>
        </footer>
<?php }
// ARCHIVE LOOP *********************************************************
function childtheme_override_archive_loop() {
    global $post;
	while ( have_posts() ) : the_post();?>
        <section id="post-<?php the_ID(); ?>" class="loop_results_compact">
            <a href="<?php echo get_permalink() ?>" title=" <?php echo get_the_title() ?>" target="_self" class="loop_thumb_wrap">
			<?php
                if ( has_post_thumbnail() ) {
                echo get_the_post_thumbnail(get_the_ID(),'loop_thumb');
                }
                else {
                    echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" />';
                }
            ?>
            </a>
            <a href="<?php echo get_permalink() ?>" title=" <?php echo get_the_title() ?>" target="_self" class="loop_text_wrap">
                <em><?php echo get_the_title() ?></em>
                <?php $my_excerpt = get_the_excerpt();
				if( qtrans_getLanguage() == 'es' ){
			 		$metafield = get_post_meta(get_the_ID(), 'metadescription_es', true);
			 	}elseif( qtrans_getLanguage() == 'ca' ){
			 		$metafield = get_post_meta(get_the_ID(), 'metadescription_ca', true);
			 	}else{
			 		$metafield = get_post_meta(get_the_ID(), 'metadescription_en', true);
				}
				if (!empty ($metafield)){
					echo '<span class="pagelist_text">' . substr ($metafield,0,220) . ' ...</span>';
				}
				elseif (!empty ($my_excerpt)){
					echo '<span class="pagelist_text">' . substr ($my_excerpt,0,220) . ' ...</span>';
				}else{
					echo '<span class="pagelist_text">' . get_the_title() . ' ...</span>';
				} ?>
                <span class="loop_text_chevron"><span><i class="icon-chevron-right"></i></span></span>
            </a>
                <?php thematic_postfooter(); ?>
        </section><!-- #post --> <?php 
    endwhile;
}
// CATEGORY LOOP *********************************************************
function childtheme_override_category_loop() {
    global $post;
	while ( have_posts() ) : the_post();?>
        <section id="post-<?php the_ID(); ?>" class="loop_results_compact">
            <a href="<?php echo get_permalink() ?>" title=" <?php echo get_the_title() ?>" target="_self" class="loop_thumb_wrap">
			<?php
                if ( has_post_thumbnail() ) {
                echo get_the_post_thumbnail(get_the_ID(),'loop_thumb');
                }
                else {
                    echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" />';
                }
            ?>
            </a>
            <a href="<?php echo get_permalink() ?>" title=" <?php echo get_the_title() ?>" target="_self" class="loop_text_wrap">
                <em><?php echo get_the_title() ?></em>
                <?php $my_excerpt = get_the_excerpt();
				if( qtrans_getLanguage() == 'es' ){
			 		$metafield = get_post_meta(get_the_ID(), 'metadescription_es', true);
			 	}elseif( qtrans_getLanguage() == 'ca' ){
			 		$metafield = get_post_meta(get_the_ID(), 'metadescription_ca', true);
			 	}else{
			 		$metafield = get_post_meta(get_the_ID(), 'metadescription_en', true);
				}
				if (!empty ($metafield)){
					echo '<span class="pagelist_text">' . substr ($metafield,0,220) . ' ...</span>';
				}
				elseif (!empty ($my_excerpt)){
					echo '<span class="pagelist_text">' . substr ($my_excerpt,0,220) . ' ...</span>';
				}else{
					echo '<span class="pagelist_text">' . get_the_title() . ' ...</span>';
				} ?>
                <span class="loop_text_chevron"><span><i class="icon-chevron-right"></i></span></span>
            </a>
                <?php thematic_postfooter(); ?>
        </section><!-- #post --> <?php 
    endwhile;
}
// TAG LOOP *********************************************************
function childtheme_override_tag_loop() {
    global $post;
	while ( have_posts() ) : the_post();?>
        <section id="post-<?php the_ID(); ?>" class="loop_results_compact">
            <a href="<?php echo get_permalink() ?>" title=" <?php echo get_the_title() ?>" target="_self" class="loop_thumb_wrap">
			<?php
                if ( has_post_thumbnail() ) {
                echo get_the_post_thumbnail(get_the_ID(),'loop_thumb');
                }
                else {
                    echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" />';
                }
            ?>
            </a>
            <a href="<?php echo get_permalink() ?>" title=" <?php echo get_the_title() ?>" target="_self" class="loop_text_wrap">
                <em><?php echo get_the_title() ?></em>
                <?php $my_excerpt = get_the_excerpt();
				if( qtrans_getLanguage() == 'es' ){
			 		$metafield = get_post_meta(get_the_ID(), 'metadescription_es', true);
			 	}elseif( qtrans_getLanguage() == 'ca' ){
			 		$metafield = get_post_meta(get_the_ID(), 'metadescription_ca', true);
			 	}else{
			 		$metafield = get_post_meta(get_the_ID(), 'metadescription_en', true);
				}
				if (!empty ($metafield)){
					echo '<span class="pagelist_text">' . substr ($metafield,0,220) . ' ...</span>';
				}
				elseif (!empty ($my_excerpt)){
					echo '<span class="pagelist_text">' . substr ($my_excerpt,0,220) . ' ...</span>';
				}else{
					echo '<span class="pagelist_text">' . get_the_title() . ' ...</span>';
				} ?>
                <span class="loop_text_chevron"><span><i class="icon-chevron-right"></i></span></span>
            </a>
                <?php thematic_postfooter(); ?>
        </section><!-- #post --> <?php 
    endwhile;
}

// SEARCH LOOP **************************************************************
function childtheme_override_search_loop() {
	global $post;
	while ( have_posts() ) : the_post();?>
        <section id="post-<?php the_ID(); ?>" class="loop_results_compact">
            <a href="<?php echo get_permalink() ?>" title=" <?php echo get_the_title() ?>" target="_self" class="loop_thumb_wrap">
			<?php
                if ( has_post_thumbnail() ) {
                echo get_the_post_thumbnail(get_the_ID(),'loop_thumb');
                }
                else {
                    echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" />';
                }
            ?>
            </a>
            <a href="<?php echo get_permalink() ?>" title=" <?php echo get_the_title() ?>" target="_self" class="loop_text_wrap">
                <em><?php echo get_the_title() ?></em>
                <?php $my_excerpt = get_the_excerpt();
				if( qtrans_getLanguage() == 'es' ){
			 		$metafield = get_post_meta(get_the_ID(), 'metadescription_es', true);
			 	}elseif( qtrans_getLanguage() == 'ca' ){
			 		$metafield = get_post_meta(get_the_ID(), 'metadescription_ca', true);
			 	}else{
			 		$metafield = get_post_meta(get_the_ID(), 'metadescription_en', true);
				}
				if (!empty ($metafield)){
					echo '<span class="pagelist_text">' . substr ($metafield,0,220) . ' ...</span>';
				}
				elseif (!empty ($my_excerpt)){
					echo '<span class="pagelist_text">' . substr ($my_excerpt,0,220) . ' ...</span>';
				}else{
					echo '<span class="pagelist_text">' . get_the_title() . ' ...</span>';
				} ?>
                <span class="loop_text_chevron"><span><i class="icon-chevron-right"></i></span></span>
            </a>
            	<?php if ( get_post_type() == 'post' ){ thematic_postfooter(); }?>
        </section><!-- #post --> <?php 
    endwhile;
}
// PAGINACIÓ PELS LOOPS
// remove single page nav below functionality
function childtheme_override_nav_below() {
    if ( is_search() || is_archive() ) {
        global $wp_query, $wp_rewrite;
		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
		$pagination = array(
			'base' => @add_query_arg('page','%#%'),
			'format' => '',
			'total' => $wp_query->max_num_pages,
			'current' => $current,
			'show_all' => true,
			'type' => 'list',
			'next_text' => '<i class="icon-chevron-right"></i>',
			'prev_text' => '<i class="icon-chevron-left"></i>'
			);
		if( $wp_rewrite->using_permalinks() )
			if ( is_search()){
				$pagination['base'] = get_bloginfo('url') . ('/') . qtrans_getLanguage() . '/page/%#%/';
				$cq = $_GET['s'];
				$sq = str_replace(" ", "+", $cq);
			}else{
        		$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
			}
		if( !empty($wp_query->query_vars['s']) )
			$pagination['add_args'] = array( 's' => $sq);
		echo paginate_links( $pagination );
    }
}
// Arrecla l'error amb la paginacio a les cerques que contenen un espai
// FINAL LOOPS *********************************************************
// Elimina info postmeta header-post
function childtheme_override_postheader_postmeta() {
    // silence!
}
// PostHeader Title (incluimos el icono de la categoria + h)
function childtheme_override_postheader_posttitle(){
	$posttitle = "\n\n\t\t\t\t\t";
	if (is_attachment()) {
		global $post;
		$posttitle .= '<h3 class="entry-title post_section">';
		$posttitle .= get_the_title() ;
		$posttitle .= '</h3>';
	}
	elseif (is_single()) {
		global $post;
		$posttitle .= '<h3 class="entry-title  post_section">';
		//CRIDEM A LA ICONA DE LA CATEGORIA DEL POST
			$category = get_the_category($post->ID); 
			// load all 'category' terms for the post
			$terms = get_the_terms($post->ID, 'category');
			// we will use the first term to load ACF data from 
			if( !empty($terms) ){$term = array_pop($terms);	$iconcat = get_field('cat_icon', 'category_' . $term->term_id );}
        $posttitle .='<a href="' . get_category_link($category[0]->term_id ) . '" target="_self" title="' .  $category[0]->cat_name . '"><i class="' . $iconcat . '"></i></a>';
		$posttitle .= get_the_title() ;
		$posttitle .= '</h3>';
	} elseif (is_page()) { 
		$posttitle .= '<h3 class="entry-title post_section">' . get_the_title() . "</h3>\n";
	} elseif (is_404()) {    
		$posttitle .= '<h3 class="entry-title post_section">' . __('Not Found', 'thematic') . "</h3>\n";
	} else {
		$posttitle .= '<h3 class="entry-title post_section"><a href="';
		$posttitle .= apply_filters('the_permalink', get_permalink());
		$posttitle .= '" title="';
		$posttitle .= __('Permalink to ', 'thematic') . the_title_attribute('echo=0');
		$posttitle .= '" rel="bookmark">';
		$posttitle .= get_the_title();   
		$posttitle .= "</a></h3>\n";
	}
	return $posttitle;
}
// PostContent Imagen Destacada, Excerpt i Contenidor pel contingut WYSIWYG
function add_thumbexcerpt_to_content($post) {
	if ( is_single() ){
			$browser_title_encoded = urlencode( trim( wp_title( '', false, 'right' ) ) );
			$page_title_encoded = urlencode( get_the_title() );
			$page_url_encoded = urlencode( get_permalink() );
		// Botó Compartir 
		if( qtrans_getLanguage() == 'es' ){
			$thematic_postfooter_share = "COMPARTE";
		}elseif( qtrans_getLanguage() == 'ca' ){
			$thematic_postfooter_share = "COMPARTEIX";
		}else {
			$thematic_postfooter_share = "SHARE";
		} 
		$sharebutton = '<ul class="sub-sharing">';
		$sharebutton .= '<li class="share_bttn msg" id="share_bttn"><i class="icon-share-sign"></i>&nbsp;' . $thematic_postfooter_share . ' <i class="icon-caret-right"></i></li>';
		$sharebutton .= '<li id="share_php" class="nojs">';
		//Facebook
		$sharebutton .= '<a href="http://www.facebook.com/sharer.php?u=' . $page_url_encoded . '&amp;t=' . $browser_title_encoded . '" target="_blank" title="' . $thematic_postfooter_share . ' ' . get_the_title() . '"><i class=icon-facebook-sign></i> Facebook </a>';
		//Twitter
		$sharebutton .= '<a href="http://twitter.com/share?text=' . $page_title_encoded . '&amp;url=' . $page_url_encoded . '" target="_blank" title="' . $thematic_postfooter_share . ' ' . get_the_title() . ' "><i class=icon-twitter-sign></i> Twitter </a>';
		//Google+
		$sharebutton .= '<a href="http://plus.google.com/share?url=' . $page_url_encoded . '" target="_blank" title="' . $thematic_postfooter_share . ' ' . get_the_title() . ' "><i class=icon-google-plus-sign></i> Google+ </a>';
		//LinkedIn
		$sharebutton .= '<a href="http://www.linkedin.com/shareArticle?mini=true&url' . $page_url_encoded . '&title=' . $page_title_encoded . '" target="_blank" title="' . $thematic_postfooter_share . '  ' . get_the_title() . ' "><i class=icon-linkedin-sign></i> LinkedIn </a>';
		$sharebutton .= '</li>';
		$sharebutton .= '<li id="share_loader">&nbsp;</li>';
		$sharebutton .= '</ul>';	
		if (!is_attachment()){
			$postwrapper = '<section class="entry-wysiwyg post_section">';
			if ( has_excerpt() ) {
				$post_excerpt = '<section class="entry-excerpt post_section"><h4>' . get_the_excerpt() . '</h4></section>';
			} else {
				$post_excerpt = ' ';
			}
			if ( has_post_thumbnail() ) {
				$post = '<section class="entry-thumb post_section">' . get_the_post_thumbnail(get_the_ID(), 'featured-slider', true) . '</section>' . $post_excerpt . $postwrapper . $post . $sharebutton . '</section>' ;
			}else{
				$post = '<section class="entry-thumb post_section"><img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" alt="' . get_bloginfo('name') . '" /></section>' . $post_excerpt . $postwrapper . $post . $sharebutton . '</section>' ;
			}
		}else{
			$post = $post . '<article>' . $sharebutton . '</article>';
		}
		
	}else{
		$post = '<section class="entry-wysiwyg post_section">' . $post . '</section>' ;
	}
	return $post;
}
add_filter('the_content' , 'add_thumbexcerpt_to_content');
// Limitar los caracteres del excerpt
function get_excerpt($count){
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 220, $count);
  $excerpt = substr($excerpt, 220, strripos($excerpt, " "));
  $excerpt = $excerpt.'...';
  return $excerpt;
}
// Cambiar el límite de palabras en el excerpt
function longitud_excerpt($length) {
    return 220;
}
add_filter('excerpt_length', 'longitud_excerpt');
/*add_filter( 'the_content_more_link', 'handle_more_link', 10, 2 );
function handle_more_link( $link, $link_text ) {
	if( qtrans_getLanguage() == 'eu' ){
		return str_replace( $link_text, 'Gehiago irakurtzea &raquo;', $link);
		}else {
		return str_replace( $link_text, 'Leer m&aacute;s &raquo;', $link);
		}
}*/
// canvi del peu de POST
function childtheme_override_postfooter() {
		if( qtrans_getLanguage() == 'es' ) { $thematic_postfooter_share = 'Compartir'; }elseif ( qtrans_getLanguage() == 'ca' ){ $thematic_postfooter_share = 'Compartir'; }else{$thematic_postfooter_share = 'Share';}
		if( qtrans_getLanguage() == 'en' ) { $thematic_postfooter_date = get_the_date('Y/m/d'); }else{ $thematic_postfooter_date = get_the_date('d/m/Y'); }
        $post_type = get_post_type();
        $post_type_obj = get_post_type_object($post_type);
        // Check for "Page" post-type and logged in user to show edit link
        if ( $post_type == 'page' ) {
            $postfooter .= '<ul class="sub-utilities">';
            $postfooter .= '<li><i class="icon-calendar"></i>&nbsp;&nbsp;<a href="' . get_bloginfo('url') . ('/') . qtrans_getLanguage() . '/arxiu-de-noticies/" target="_self" title=' . $thematic_postfooter_date . '>' . $thematic_postfooter_date . '</a></li>';
			$postfooter .= '</ul>';
        // For post-types other than "Pages" press on
        } else {
			$postfooter = '<footer class="entry-utility post_section cf">';
			//$postfooter .= '<ul class="main-utilities">';
			//$postfooter .= '<li>' . thematic_postmeta_authorlink() . '</li>';
			//$postfooter .= '<li>' . thematic_postfooter_postcategory() . '</li>';
			//$postfooter .= '<li>' . thematic_postfooter_postcomments() . '</li>';
			//$postfooter .= '</ul>';
			$postfooter .= '<ul class="sub-utilities">';
			if ( !is_category()){
				$postfooter .= '<li class="sub-util_cats">' . thematic_postfooter_postcategory() . '</li>';
			}
			if ( is_single() ){
				$postfooter .= '<li class="sub-util_date"><i class="icon-calendar"></i>&nbsp;&nbsp;<a href="' . get_bloginfo('url') . ('/') . qtrans_getLanguage() . '/arxiu-de-noticies/" target="_self" title=' . $thematic_postfooter_date . '>' . $thematic_postfooter_date . '</a></li>';
			}
			$postfooter .= '<li class="sub-util_tags"><i class="icon-tags"></i> ' . thematic_postfooter_posttags() . '</li>';
			  //  if ( is_user_logged_in() ) {
			  //  $postfooter .= '<li>' . thematic_postfooter_posteditlink() . '</li>';
			$postfooter .= '</ul>';
			$postfooter .= "\n\n\t\t\t\t\t</footer><!-- .entry-utility -->\n";
        }
        // Put it on the screen
	echo apply_filters( 'thematic_postfooter', $postfooter ); // Filter to override default post footer
}
// Tunejar CATEGORIES 
function childtheme_override_postfooter_postcategory() {
	global $post;
	$category = get_the_category($post->ID); 
	// load all 'category' terms for the post
	$terms = get_the_terms($post->ID, 'category');
	// we will use the first term to load ACF data from 
	if( !empty($terms) ){$term = array_pop($terms);	$iconcat = get_field('cat_icon', 'category_' . $term->term_id );}
	$postcategory ='<a href="' . get_category_link($category[0]->term_id ) . '" target="_self" title="' .  $category[0]->cat_name . '"><i class="' . $iconcat . '"></i>&nbsp;&nbsp;' . $category[0]->cat_name . '</a>';
    return apply_filters('thematic_postfooter_postcategory',$postcategory);
}
// remove unneeded code from posttags
function childtheme_override_postfooter_posttags() {
    if ( is_single() && !is_object_in_taxonomy( get_post_type(), 'category' ) ) {
        //$tagtext = __('Tagged', 'thematic');
        $posttags = get_the_tag_list("<span class=\"tag-links\"> ",' | ','</span> ');
    } elseif ( is_single() ) {
        //$tagtext = __('Tagged', 'thematic');
        $posttags = get_the_tag_list("<span class=\"tag-links\"> ",' | ','</span> ');
    } elseif ( is_tag() && $tag_ur_it = thematic_tag_ur_it(', ') ) {
        $posttags = '<span class="tag-links">' . $tag_ur_it . '</span>' . "\n\n\t\t\t\t\t\t";
    } else {
        //$tagtext = __('Tagged', 'thematic');
        $posttags = get_the_tag_list("<span class=\"tag-links\"> ",' | ','</span>' . "\n\n\t\t\t\t\t\t");
    }
    return apply_filters('thematic_postfooter_posttags',$posttags);
}
// post thumbnail sizing 
add_theme_support( 'post-thumbnails' );
if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'featured-slider', 960, 480, true); // thumbnail para el slider 
	add_image_size( 'loop_thumb', 300, 150, true ); // thumbnail para los loops
}
// Supertamaño de Miniatura Imagen Destacada
function childtheme_post_thumb_size($size) {
    $size = array(960,480);
    return $size;
}
// Añade clase para activar lightbox en los posts
function my_addlightboxclass($content) {
       global $post;
       $pattern ="/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
       $replacement = '<a$1href=$2$3.$4$5 class="gal_img" title="'. $post->post_title .'"$6>';
       $content = preg_replace($pattern, $replacement, $content);
       return $content;
}
add_filter('the_content', 'my_addlightboxclass',10,2);
// Añade clase para activar lightbox en los attachments
function add_class_attachment_link($html){
    if (is_attachment()){
		$postid = get_the_ID();
		$html = str_replace('<a','<a class="gal_img"',$html);
		return $html;
	}
	else{
		return $html;
	}
}
add_filter('wp_get_attachment_link','add_class_attachment_link',10,2);
// GALERIA DEL POST INTEGRADA AL COLORBOX*****************************************************************************
function custom_gallery($output, $attr) {
    global $post;
    static $instance = 0;
    $instance++;
    /**
     *  will remove this since we don't want an endless loop going on here
     */
    // Allow plugins/themes to override the default gallery template.
    //$output = apply_filters('post_gallery', '', $attr);
    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }
    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'figure',
        'icontag'    => '',
        'captiontag' => 'figcaption',
        'columns'    => 4,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => ''
    ), $attr));
    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';
    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }
    if ( empty($attachments) )
        return '';
    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }
    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';
    $selector = "gallery-{$instance}";
    $gallery_style = $gallery_div = '';
    if ( apply_filters( 'use_default_gallery_style', true ) )
        /**
         * this is the css you want to remove
         *  #1 in question
         */
        /*
        $gallery_style = "
        <style type='text/css'>
            #{$selector} {
                margin: auto;
            }
            #{$selector} .gallery-item {
                float: {$float};
                margin-top: 10px;
                text-align: center;
                width: {$itemwidth}%;
            }
            #{$selector} img {
                border: 2px solid #cfcfcf;
            }
            #{$selector} .gallery-caption {
                margin-left: 0;
            }
        </style>
        <!-- see gallery_shortcode() in wp-includes/media.php -->";
        */
    $size_class = sanitize_html_class( $size );
    $gallery_div = "<section id='" . $selector . "' class='gallery galleryid-" . $id . " gallery-columns-4'>";
    $output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );
    $i = 0;
	$arrayCount = 0;//Ponemos contador a 0
    foreach ( $attachments as $id => $attachment ) {
        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
		$link = str_replace( '<a href', '<a rel="'. $selector . '" class="gal_img" href', $link );
        $output .= "<{$itemtag} class='gallery-item'>";
        $output .= "$link";
        /*
         * This is the caption part so i'll comment that out
         * #2 in question
         */
        if ( $captiontag && trim($attachment->post_excerpt) ) {
            $output .= "<{$captiontag} class='wp-caption-text gallery-caption'>" . wptexturize($attachment->post_excerpt) . "</{$captiontag}>";
        }
        $output .= "</{$itemtag}>";
        /*if ( $columns > 0 && ++$i % $columns == 0 )
            $output .= '<br style="clear: both" />';*/
		$arrayCount++; //Contador +1 en cada iteración
		if ( ( $arrayCount%2 == 0 && $arrayCount%4 == 0 ) ) {//Si Contador es un número par incluye un clearboth para que no se casque el layout (Small Screens)
			$output .= '<div class="clearboth big_screen">&nbsp;</div>';
		}elseif ( ( $arrayCount%2 == 0 && $arrayCount%4 != 0 ) ) {//Si Contador es múltiple de 4 incluye un clearboth para que no se casque el layout (Big Screens)
			$output .= '<div class="clearboth small_screen">&nbsp;</div>';
		}
    }
    /**
     * this is the extra br you want to remove so we change it to jus closing div tag
     * #3 in question
     */
    /*$output .= "
            <br style='clear: both;' />
        </div>\n";
     */
    $output .= "</section>\n";
    return $output;
}
add_filter("post_gallery", "custom_gallery",10,2);
// <BODY> - MODIFICACIÓ WIDGETS **************************************************************
// Categories (Afegim la ICONA i Chevron Right
function wp_list_categories_tuneup($list) {
	$cats = get_categories();
	foreach($cats as $cat) {
		$iconcat = get_field('cat_icon', 'category_' . $cat->term_id );
		$find = '>' . $cat->cat_name . '</a>';
		$replace = '><i class="' . $iconcat . '"></i> ' . $cat->cat_name . ' <i class="icon-chevron-right"></i></a>';
		$list = str_replace( $find, $replace, $list );
	}
return $list;
}
add_filter('wp_list_categories', 'wp_list_categories_tuneup');
// Etiquetes -> http://designpx.com/tutorials/customize-tag-cloud-widget/
function custom_tag_cloud_widget($args) {
	$args['number'] = 0; //adding a 0 will display all tags
	$args['largest'] = .9; //largest tag
	$args['smallest'] = .9; //smallest tag
	$args['unit'] = 'em'; //tag font unit
	$args['orderby'] = 'count'; //order by number of posts with the tag
	$args['order'] = 'DESC'; //more to less
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'custom_tag_cloud_widget' );
// RSS widget -> Creat de Zero i Integrant subscripció MailChimp
add_action( 'widgets_init', 'widget_custom_syndicate' );
function widget_custom_syndicate() {
	register_widget( 'Widget_Custom_Syndicate' );
}
class Widget_Custom_Syndicate extends WP_Widget {
	function Widget_Custom_Syndicate() {
		$widget_ops = array( 'classname' => 'custom_syndication', 'description' => __('A widget for custom syndication ', 'custom_syndication') );
		$control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'custom-syndication' );
		$this->WP_Widget( 'custom-syndication', __('Widget Custom Syndicate', 'custom_syndication'), $widget_ops, $control_ops );
	}
	function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );
		echo $before_widget;
		// Display the widget title 
		if ( $title )
			echo $before_title . $title . $after_title;
		//Display Syndication  ?>
        <ul>
        	<li><a href="<?php bloginfo('url') ?>/feed/" target="_self" title="RSS"><i class="icon-rss"></i>RSS<i class="icon-chevron-right"></i></a><li>
            <!-- Insertar <li> per subscripció de Newsletter o d'altres -->
        </ul>
		<?php // Close Widget
		echo $after_widget;
	}
	//Update the widget 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags from title to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}
	function form( $instance ) {
		//Set up some default widget settings.
		$defaults = array( 'title' => __('', 'custom_syndication') );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		//Widget Title ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', ''); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
	<?php
	}
}
// <BODY> - FOOTER *************************************************************************************************************
//******************************************************************************************************************************
// load google analytics
/*function snix_google_analytics(){
<script>var _gaq=[['_setAccount','UA-12563601-12'],['_trackPageview']];(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.src='//www.google-analytics.com/ga.js';s.parentNode.insertBefore(g,s)}(document,'script'))</script>
}
add_action('wp_footer', 'snix_google_analytics');*/
// ADMIN ***********************************************************************************************************************
//******************************************************************************************************************************
//ADVANCED CUSTOM FIELDS
add_action('acf/register_fields', 'my_register_fields');
function my_register_fields(){
	//Custom Fields --> Generar y exportar desde el Admin
	include_once('fields/advanced_custom_fields.php');
}
?>