<?php
//****************************************************************************************/
//
//  Child Theme NEXT Conferencias de Autor Functions
//
//****************************************************************************************/
//
//
//GENERAR EL <HEAD> ************************************************************************************************************
//******************************************************************************************************************************
//
// Custom ShortCodes
include_once(get_stylesheet_directory() . '/custom_shortcodes.php');
//
// DocType *********************************************************************************************************************
//
function childtheme_create_doctype() {
    if (function_exists('qtrans_getLanguage')){
		$doctype_lang = qtrans_getLanguage();
	}else{
		$doctype_lang = 'es';
	}
	$content = "<!doctype html>" . "\n";
    $content .= '<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" dir="' . get_bloginfo ('text_direction') . '" lang="'. $doctype_lang . '"> <![endif]-->' . "\n";
    $content .= '<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" dir="' . get_bloginfo ('text_direction') . '" lang="'. $doctype_lang . '"> <![endif]-->'. "\n";
    $content .= '<!--[if IE 8]> <html class="no-js lt-ie9" dir="' . get_bloginfo ('text_direction') . '" lang="'. $doctype_lang . '"> <![endif]-->' . "\n";
    $content .= '<!--[if gt IE 8]><!-->' . "\n";
    $content .= '<html class="no-js"';
	$content .= ' prefix="og: http://ogp.me/ns#"';
    return $content;
}
add_filter('thematic_create_doctype', 'childtheme_create_doctype', 11);
//
// Head ViewPort + META + Open Tags *******************************************************************************************************
//
//
function childtheme_head_profile() {
	global $post;
    $content = "<!--<![endif]-->";
    $content .= "\n" . "<head>" . "\n";
    $content .= "<meta charset=\"utf-8\" />" . "\n";
    $content .= "<meta name=\"viewport\" content=\"user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width\" />" . "\n";
	$content .= "<!-- IE 9 and before ICON ><!-->" . "\n";
	$content .= "<!--[if (lt IE 9)|(IE 9)]>" . "<link rel=\"shortcut icon\"  href=\" ". get_stylesheet_directory_uri() . "/favicon.ico" . "\"/> <![endif]-->" . "\n";
	$content .= "<!-- Default ShortCut Icon ><!-->" . "\n";
	$content .= "<link rel=\"shortcut icon\"  href=\" ". get_stylesheet_directory_uri() . "/favicon.png" . "\"/>" . "\n";
	$content .= "<!-- Apple Touch Icon ><!-->" . "\n";
	$content .= "<link rel=\"apple-touch-icon\"  sizes=\"57x57\" href=\" ". get_stylesheet_directory_uri() . "/tile114.png" . "\"/>" . "\n";
	$content .= "<link rel=\"apple-touch-icon\"  sizes=\"114x114\" href=\" ". get_stylesheet_directory_uri() . "/tile114.png" . "\"/>" . "\n";
	$content .= "<link rel=\"apple-touch-icon\"  sizes=\"72x72\" href=\" ". get_stylesheet_directory_uri() . "/tile144.png" . "\"/>" . "\n";
	$content .= "<link rel=\"apple-touch-icon\"  sizes=\"144x144\" href=\" ". get_stylesheet_directory_uri() . "/tile144.png" . "\"/>" . "\n";
	//ie10 tags
	$content .= "<!-- ie10 metaTags For Tile ><!-->" . "\n";
	$content .= "<meta name=\"msapplication-TileColor\" content=\"#38af37\" />" . "\n";
	$content .= "<meta name=\"msapplication-TileImage\" content=\"" . get_stylesheet_directory_uri() . "/tile144.png" . "\"/>" . "\n";
	// Open Graph Tags
    $default_img = get_stylesheet_directory_uri() . "/tile.png";
	$categories = get_the_category();
	// FRONT PAGE ***************** (ID = )
	if (is_front_page()) {
		$url = get_option('home');
		$title = get_bloginfo('name') . ' ' . get_bloginfo('description');
		if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){
				$metafield = get_field ("metadescription_es");
			 }elseif( qtrans_getLanguage() == 'ca' ){
				$metafield = get_field ("metadescription_ca");
			 }else{
				$metafield = get_field ("metadescription_en");
			 }
		 }else{//Not activeQtrans
		 	$metafield = get_field ("metadescription_es");
		 }
		if (!empty ($metafield)){ $description = $metafield . " | " . get_bloginfo('name');} else { $description = get_the_title() . " | " . get_bloginfo('name') . " " . get_bloginfo('description');}
		$type = 'website';
		$image = $default_img;
	// FRONT PAGE***************** (ID = 5)
	} elseif (is_home()){ //Agafem l'ACF de la description amb l'ID de la pàgina
		$url = get_option('home');
		$title = get_bloginfo('name') . ' ' . get_bloginfo('description');
		if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){
				$metafield = get_field ("metadescription_es", 5);
			 }elseif( qtrans_getLanguage() == 'ca' ){
				$metafield = get_field ("metadescription_ca", 5);
			 }else{
				$metafield = get_field ("metadescription_en", 5);
			 }
		 }else{//Not activeQtrans
		 	$metafield = get_field ("metadescription_es", 5);
		 }
		if (!empty ($metafield)){ $description = $metafield . " | " . get_bloginfo('name');} else { $description = get_the_title() . " | " . get_bloginfo('name') . " " . get_bloginfo('description');}
		$type = 'blog';
		$image = $default_img;
	// CATEGORY ******************* 
	} elseif (is_category()) { 
		global $wp; 
		$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
		if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){$url_lang = '&lang=es';}elseif( qtrans_getLanguage() == 'ca' ){$url_lang = '&lang=ca';}else{$url_lang = '&lang=en';}
		}else{//Not activeQtrans
			$url_lang = '';
		}
		$url =  $current_url . $url_lang;
		if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){$taxonomy = 'Categoría';}elseif( qtrans_getLanguage() == 'ca' ){$taxonomy = 'Categoria';}else{$taxonomy = 'Category';}
		}else{//Not activeQtrans
		 	$taxonomy = 'Categoría';
		 }
		$title =  $taxonomy . ': ' . single_cat_title("", false) . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
		$description = $taxonomy . ' ' . single_cat_title("", false) . ": " .  str_replace( "\n", "", strip_tags(category_description())) . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
		$type = 'blog';
		$image = $default_img;
	// TAG ************************ 
	} elseif (is_tag()) { 
		global $wp; 
		$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
		if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){$url_lang = '&lang=es';}elseif( qtrans_getLanguage() == 'ca' ){$url_lang = '&lang=ca';}else{$url_lang = '&lang=en';}
		}else{//Not activeQtrans
			$url_lang = '';
		}
		$url =  $current_url . $url_lang;
		if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){$taxonomy = 'Etiquetado en';}elseif( qtrans_getLanguage() == 'ca' ){$taxonomy = 'Etiquetat a';}else{$taxonomy = 'Tagged in';}
			if( qtrans_getLanguage() == 'es' ){$taxonomy2 = 'Noticias etiquetadas en';}elseif( qtrans_getLanguage() == 'ca' ){$taxonomy2 = 'Notícies etiquetades a';}else{$taxonomy2 = 'Posts tagged in';}
		}else{//Not activeQtrans
			$taxonomy = 'Etiquetado en';
			$taxonomy2 = 'Noticias etiquetadas en';
		}
		$title =  $taxonomy . ': ' . single_tag_title("", false) . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
		$description = $taxonomy2 . ' ' . single_tag_title("", false) . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
		$type = 'blog';
		$image = $default_img;
	// ARCHIVE ***************** 
	} elseif (is_archive()) { 
		global $wp; 
		$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
		if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){$url_lang = '&lang=es';}elseif( qtrans_getLanguage() == 'ca' ){$url_lang = '&lang=ca';}else{$url_lang = '&lang=en';}
		}else{//Not activeQtrans
			$url_lang = '';
		}
		$url =  $current_url . $url_lang;
		if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){$archive = 'Archivo de Noticias';}elseif( qtrans_getLanguage() == 'ca' ){$archive = 'Arxiu de Notícies';}else{$archive = 'News Archive';}
		}else{//Not activeQtrans
			$archive = 'Archivo de Noticias';
		}
		$title = $archive . " | " . get_bloginfo('name');
		$description = get_bloginfo('name') . " " . get_bloginfo('description');
		$type = 'blog';
		$image = $default_img;
	// PAGE ***************** 
	} elseif (is_page()) {
		global $post;
		$url = get_permalink();
		if ($post->post_parent) {
			$parent_title = get_the_title($post->post_parent);
			$title = get_the_title() . " / " . $parent_title . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
		} else {
			$title = get_the_title() . " | " . get_bloginfo('name') . " " . get_bloginfo('description');}    
			if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){
					$metafield = get_field ("metadescription_es");
				 }elseif( qtrans_getLanguage() == 'ca' ){
					$metafield = get_field ("metadescription_ca");
				 }else{
					$metafield = get_field ("metadescription_en");
				 }
			 }else{//Not activeQtrans
				$metafield = get_field ("metadescription_es");
		}
		if (!empty ($metafield)){ $description = $metafield . " | " . get_bloginfo('name') . " " . get_bloginfo('description');} else { $description = get_the_title() . " | " . get_bloginfo('name') . " " . get_bloginfo('description');}
		$type = 'website';
		$image = get_fbimage();
	 	}elseif (is_attachment()) {
		$url = get_permalink($post->ID);
		//$categories = get_the_category( $post->post_parent );
		$title = get_the_title() . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
		if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){
			 	$attach = 'Archivo Adjunto: ';
			 }elseif( qtrans_getLanguage() == 'ca' ){
			 	$attach = 'Arxiu Adjunt: ';
			 }else{
			 	$attach = 'Attached file: ';
			 }
        }else{//Not activeQtrans
			$attach = 'Archivo Adjunto: ';
		}
		$description = $attach . get_the_title() . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
		$type = 'article';
		$image = get_fbimage();
	// POST ***************** (AUTORES)
	} elseif (is_single() && !is_singular( 'news' )) {
		$url = get_permalink($post->ID);
		$title = get_the_title() . " / " . $categories[0]->cat_name . " | " . get_bloginfo('name');
			if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){
					$metafield = get_field ("metadescription_es");
					$expertise = '. Especialista en: ';
				 }elseif( qtrans_getLanguage() == 'ca' ){
					$metafield = get_field ("metadescription_ca");
					$expertise = '. Especialista en: ';
				 }else{
					$metafield = get_field ("metadescription_en");
					$expertise = '. Expertise: ';
				 }
			}else{//Not activeQtrans
				$metafield = get_field ("metadescription_es");
				$expertise = '. Especialista en: ';
			}
			if ( has_tag() ){
				$post_tags = get_tags(array('orderby' => 'count', 'order' => 'DESC'));
				$post_terms = $expertise;
				$p = 1;
				foreach ( $post_tags as $tag ) {
					if ( $p >= 2 ){$post_terms .= ', ';}
					$post_terms .= $tag->name;
					$p++;
				}
				$post_terms .= '.';
			}else{
				$post_terms = '';
			}
            if (!empty ($metafield)){
				$categories = get_the_category();
				$description = $metafield . $post_terms . " / " . $categories[0]->cat_name . " | " . get_bloginfo('name') . " " .  get_bloginfo('description');
			}elseif (!empty($post->post_excerpt)) {
				$categories = get_the_category();
				$description = get_the_excerpt() . $post_terms . " / " . $categories[0]->cat_name . " | " . get_bloginfo('name') . " " .  get_bloginfo('description');
			}else {
				$categories = get_the_category();
				$description = get_the_title() . $post_terms . " / " . $categories[0]->cat_name . " | " . get_bloginfo('name') . " " .  get_bloginfo('description');} 
		$type = 'article';
		$image = get_fbimage();
	// POST ***************** (TYPE = NEWS)
	} elseif (is_singular( 'news' )) {
		$url = get_permalink($post->ID);
		$title = get_the_title() . " | " . get_bloginfo('name');
			if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){
					$metafield = get_field ("metadescription_es");
				}elseif( qtrans_getLanguage() == 'ca' ){
					$metafield = get_field ("metadescription_ca");
				}else{
					$metafield = get_field ("metadescription_en");
				}
			}else{//Not activeQtrans
				$metafield = get_field ("metadescription_es");
			}
            if (!empty ($metafield)){
				$description = $metafield . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
			}elseif (!empty($post->post_excerpt)) {
				$description = get_the_excerpt() . " / " . get_bloginfo('name') . " " . get_bloginfo('description');} 
			else {
				$description = get_the_title() . " | " . get_bloginfo('description') . " / " . get_bloginfo('name') . " " . get_bloginfo('description');} 
		$type = 'article';
		$image = get_fbimage();
	// SEARCH RESULTS ***************** 
	}elseif (is_search()) {
		$url = get_permalink();
		if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){$search = "BÚSQUEDA: ";}elseif( qtrans_getLanguage() == 'ca' ){$search = "CERCA: ";}else{$search = "SEARCH: ";}
		}else{//Not activeQtrans
			$search = "BÚSQUEDA: ";
		}
		$title = $search . get_search_query() . " | " . get_bloginfo('name');
		$description = get_bloginfo('name') . " " . get_bloginfo('description');
		$type = 'website';
		$image = $default_img;

	// GENERAL ***************** 
	} else {
		$url = get_permalink();
		$title = get_the_title() . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
		$description = get_bloginfo('description');
		$type = 'website';
		$image = $default_img;
	}
	// OPEN GRAPH METATAGS ************************************************************************/
	$content .="<!-- og MetaTags ><!-->" . "\n";
	$content .='<meta property="og:site_name" content="' . get_bloginfo('name') . '" />' . "\n";
	$content .='<meta property="og:title" content="' . $title . '" />' . "\n";
	$content .='<meta property="og:description" content="' . $description . '" />' . "\n";
	$content .='<meta property="og:type" content="' . $type . '" />' . "\n";
	$content .='<meta property="og:url" content="' . $url . '" />' . "\n";
	$content .='<meta property="og:image" content="' . $image . '"/>' . "\n";
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){$content .='<meta property="og:locale" content="es_ES"/>' . "\n";}elseif( qtrans_getLanguage() == 'ca' ){$content .='<meta property="og:locale" content="ca_ES"/>' . "\n";}else{$content .='<meta property="og:locale" content="en_EN"/>' . "\n";}
	}else{//Not activeQtrans
		$content .='<meta property="og:locale" content="es_ES"/>' . "\n";
	}
	// Facebook ID for insights ********************
	// Configurable desde l'Admin > Social > Config
	$fb_array = get_option('social_facebook');
	if (isset($fb_array['app_id']) && $fb_array['app_id'] != ''){
		$appid_fb = $fb_array['app_id'];
	}
	if (isset($fb_array['url_id']) && $fb_array['url_id'] != ''){
		$admin_fb = $fb_array['url_id'];
	}
	if (!empty ($appid_fb) || !empty ($admin_fb)){
		$content .="<!-- Facebook insights metatags ><!-->" . "\n";
		if (!empty ($appid_fb)){	$content .='<meta property="fb:app_id" content="' . $appid_fb . '" />' . "\n";}
		if (!empty ($admin_fb)){	$content .='<meta property="fb:admins" content="' . $admin_fb . '" />' . "\n";}
	}
	// Twitter Summary Card ************************************************************************/
	//Usuari de Twitter
	// Configurable desde l'Admin > Social > Config
	$tw_array = get_option('social_twitter');
	if (isset($tw_array['url']) && $tw_array['url'] != ''){
		$user_tw = $tw_array['url'];
	}
	if (isset($tw_array['user_id']) && $tw_array['user_id'] != ''){
		$userid_tw = $tw_array['user_id'];
	}
	// Usuari Twitter de l'Autor (especificat a la pàgina de perfil d'Usuari)
	global $wp_query;
	if ( is_single()){
		$thePostID = $wp_query->post->ID;
		$postdata = get_post($thePostID, ARRAY_A);
		$authorid = 'user_' . $postdata['post_author'];
		$authortw = get_field('twitter', $authorid);
	}elseif(is_page()){
		if (!empty ($user_tw)){ $authortw = $user_tw; }else{$authortw ='';}
	}else{
		$authortw ='';
	}
	// Outoput metafileds
	$content .="<!-- Twitter Summary Card ><!-->" . "\n";
	$content .='<meta name="twitter:card" content="summary">' . "\n";
	if (!empty ($user_tw)){
		$content .='<meta name="twitter:site" content="@' . $user_tw . '">' . "\n";
	}
	if (!empty ($userid_tw)){
		$content .='<meta name="twitter:site:id" content="' . $userid_tw . '">' . "\n";
	}
	if (!empty ($authortw)){
		$content .='<meta name="twitter:creator" content="@' . $authortw . '">' . "\n";
	}elseif (!empty ($user_tw)){
		$content .='<meta name="twitter:creator" content="@' . $user_tw . '">' . "\n";
	}
	$content .='<meta name="twitter:title" content="' . $title . '" />' . "\n";
	$content .='<meta name="twitter:description" content="' . $description . '" />' . "\n";
	$content .='<meta name="twitter:image" content="' . $image . '"/>' . "\n";
	// Google Authorship (URL perfil Google Plus) **************************
	// Configurable desde l'Admin > Social > Config
	$gplus_array = get_option('social_gplus');
	if (isset($gplus_array['url']) && $gplus_array['url'] != ''){
		$url_gplus = $gplus_array['url'];
	}
	// Usuari G+ de l'Autor (especificat a la pàgina de perfil)
	if ( is_single()){
		$authorgplus = get_field('google+', $authorid);
	}elseif(is_page()){
		if (!empty ($url_gplus)){ $authorgplus = $url_gplus; }else{$authorgplus ='';}
	}else{
		$authorgplus ='';
	}
	if (!empty ($url_gplus) || !empty ($authorgplus)){
		$content .="<!-- Google Authorship ><!-->" . "\n";
		if (!empty ($url_gplus) ){$content .="<link rel='publisher' href='https://plus.google.com/" . $url_gplus . "' />" . "\n";}
		if (!empty ($authorgplus) ){$content .="<link rel='author' href='https://plus.google.com/" . $authorgplus . "' />" . "\n";}
	}
	// Pinterest Metatag (Verificació Web) **************************
	// Configurable desde l'Admin > Social > Config
	$pin_array = get_option('social_pinterest');
	if (isset($pin_array['meta']) && $pin_array['meta'] != ''){
		$pin_meta = $pin_array['meta'];
	}
	if (!empty ($pin_meta)){
		$content .="<!-- Pinterest Verfiy Metatag ><!-->" . "\n";
		$content .='<meta name="p:domain_verify" content="' . $pin_meta . '"/>' . "\n";
	}
	return $content;
}
add_filter('thematic_head_profile', 'childtheme_head_profile', 12);
//
// Thumbnail or Default Image (OG elements)
//
function get_fbimage() {
  global $post;
  $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large', '' );
  if (is_attachment()){
  	$fbimage = wp_get_attachment_url();
  }elseif ( has_post_thumbnail($post->ID) ) {
    $fbimage = $src[0];
  } else {
    global $post, $posts;
    $fbimage = '';
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	if (!empty ($output)){
    	$fbimage = $matches [1][0];
  	}else{
		$fbimage = get_stylesheet_directory_uri() . "/tile.png";
  	}
  }
  return $fbimage;
}
//
// Create the title tag OPTIMIZED ********************************************************************
//
function childtheme_doctitle() {
	if(is_home() || is_front_page()) {
            $content = get_bloginfo('name') . " " . get_bloginfo('description');
        }
	elseif (is_attachment()) {
			//$categories = get_the_category();
            $content = get_the_title() . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
        }
	elseif (is_single() && !is_singular( 'news' )) {
			$categories = get_the_category();
            $content = get_the_title() . " / " . $categories[0]->cat_name . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
        }
	elseif (is_singular( 'news' )) {
			$content = get_the_title() . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
        }
	elseif (is_page()) {
			global $post;
			if ( is_page() && $post->post_parent ) {
				$parent_title = get_the_title($post->post_parent);
				$content = get_the_title() . " / " . $parent_title . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
			} else {
				$content = get_the_title() . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
			}  
        }
	elseif (is_category()) {
			if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){$taxonomy = 'Categoría';}elseif( qtrans_getLanguage() == 'ca' ){$taxonomy = 'Categoria';}else{$taxonomy = 'Category';}
			}else{//Not activeQtrans
				$taxonomy = 'Categoría';
			}
			$current_category = single_cat_title("", false);
            $content = $taxonomy . ' ' . $current_category . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
        }
	elseif (is_tag()) {
			if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){$taxonomy = 'Etiquetado en';}elseif( qtrans_getLanguage() == 'ca' ){$taxonomy = 'Etiquetat a';}else{$taxonomy = 'Tagged in';}
			}else{//Not activeQtrans
				$taxonomy = 'Etiquetado en';
			}
			$current_tag = single_tag_title("", false);
            $content = $taxonomy . ' ' . $current_tag . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
        }
	elseif (is_archive()) { 
			if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){$archive = 'Archivo de Noticias';}elseif( qtrans_getLanguage() == 'ca' ){$archive = 'Arxiu de Notícies';}else{$archive = 'News Archive';}
			}else{//Not activeQtrans
				$archive = 'Archivo de Noticias';
			}
			$content = $archive . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
		}	
	elseif (is_search()) {
			if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){$content = "BÚSQUEDA: ";}elseif( qtrans_getLanguage() == 'ca' ){$content = "CERCA: ";}else{$content = "SEARCH: ";}
            }else{//Not activeQtrans
				$content = "BÚSQUEDA: ";
			}
			$content .= get_search_query() . " | " . get_bloginfo('name');
        }
	elseif (is_404()) {
             if (function_exists('qtrans_getLanguage')){
			 	if( qtrans_getLanguage() == 'es' ){$content = "No encontramos la Página";}elseif( qtrans_getLanguage() == 'ca' ){$content = "No trobem la Pàgina";}else{$content = "Page not found";}
			 }else{//Not activeQtrans
				$content = "No encontramos la Página";
			}
			 $content .= " | " . get_bloginfo('name') . " " . get_bloginfo('description');
        }
	else {
            $content = get_bloginfo('name') . " " . get_bloginfo('description');
        }
    echo "<!-- HTML Page Title ><!-->" . "\n";
	return $content;
}
add_filter('thematic_doctitle', 'childtheme_doctitle', 11);
//
// Create the meta description OPTIMIZED  ********************************************************************
//
function childtheme_show_description() {
	global $post;
	$content ="<!-- HTML Standard Description ><!-->" . "\n";
	$content .= '<meta name="description" content="';
	if(is_front_page()) {
            if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){
					$metafield = get_field ("metadescription_es");
				 }elseif( qtrans_getLanguage() == 'ca' ){
					$metafield = get_field ("metadescription_ca");
				 }else{
					$metafield = get_field ("metadescription_en");
				 }
            }else{//Not activeQtrans
				$metafield = get_field ("metadescription_es");
			}
			if (!empty ($metafield)){
				$content .= $metafield . " | " . get_bloginfo('name') . " " .  get_bloginfo('description');}
			else {
				$content .= get_bloginfo('name') . " " . get_bloginfo('description');} 
        }
	elseif(is_home()) { //Per la portada del blog cal que cridem el $metafield amb l'ID de la Pàgina dedicada al HOME
            if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){
					$metafield = get_field ("metadescription_es", 5);
				 }elseif( qtrans_getLanguage() == 'ca' ){
					$metafield = get_field ("metadescription_ca", 5);
				 }else{
					$metafield = get_field ("metadescription_en", 5);
				 }
            }else{//Not activeQtrans
				$metafield = get_field ("metadescription_es", 5);
			}
			if (!empty ($metafield)){
				$content .= $metafield . " | " . get_bloginfo('name');}
			else {
				$content .= get_bloginfo('description') . " | " . get_bloginfo('name') . " " .  get_bloginfo('description');} 
        }
	elseif (is_attachment()) {
			if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){
					$attach = 'Archivo Adjunto: ';
				 }elseif( qtrans_getLanguage() == 'ca' ){
					$attach = 'Arxiu Adjunt: ';
				 }else{
					$attach = 'Attached file: ';
				 }
			}else{//Not activeQtrans
				$attach = 'Archivo Adjunto: ';
			}
            $content .= $attach . get_the_title() . " | " . get_bloginfo('name') . " " .  get_bloginfo('description');
        }
	elseif (is_single() && !is_singular( 'news' )) {
			if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){
					$metafield = get_field ("metadescription_es");
					$expertise = '. Experto en: ';
				 }elseif( qtrans_getLanguage() == 'ca' ){
					$metafield = get_field ("metadescription_ca");
					$expertise = '. Expert en: ';
				 }else{
					$metafield = get_field ("metadescription_en");
					$expertise = '. Expertise: ';
				 }
			}else{//Not activeQtrans
				$metafield = get_field ("metadescription_es");
				$expertise = '. Experto en: ';
			}
			if ( has_tag() ){
				$post_tags = get_tags(array('orderby' => 'count', 'order' => 'DESC'));
				$post_terms = $expertise;
				$p = 1;
				foreach ( $post_tags as $tag ) {
					if ( $p >= 2 ){$post_terms .= ', ';}
					$post_terms .= $tag->name;
					$p++;
				}
				$post_terms .= '.';
			}else{
				$post_terms = '';
			}
            if (!empty ($metafield)){
				$categories = get_the_category();
				$content .= $metafield . $post_terms . " / " . $categories[0]->cat_name . " | " . get_bloginfo('name') . " " .  get_bloginfo('description');
			}elseif (!empty($post->post_excerpt)) {
				$categories = get_the_category();
				$content .= get_the_excerpt() . $post_terms . " / " . $categories[0]->cat_name . " | " . get_bloginfo('name') . " " .  get_bloginfo('description');} 
			else {
				$categories = get_the_category();
				$content .= get_the_title() . $post_terms . " / " . $categories[0]->cat_name . " | " . get_bloginfo('name') . " " .  get_bloginfo('description');} 
        }
	elseif (is_singular( 'news' )) {
			if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){
					$metafield = get_field ("metadescription_es");
					$archived = '/ Archivado en: ';
				 }elseif( qtrans_getLanguage() == 'ca' ){
					$metafield = get_field ("metadescription_ca");
					$archived = '/ Arxivat a: ';
				 }else{
					$metafield = get_field ("metadescription_en");
					$archived = '/ Archived: ';
				 }
			}else{//Not activeQtrans
				$metafield = get_field ("metadescription_es");
				$archived = '/ Archivado en: ';
			}
			if ( has_tag() ){
				$post_tags = get_tags(array('orderby' => 'count', 'order' => 'DESC'));
				$post_terms = $archived;
				$p = 1;
				foreach ( $post_tags as $tag ) {
					if ( $p >= 2 ){$post_terms .= ', ';}
					$post_terms .= $tag->name;
					$p++;
				}
				$post_terms .= '.';
			}else{
				$post_terms = '';
			}
            if (!empty ($metafield)){
				$content .= $metafield . $post_terms . " | " . get_bloginfo('name') . " " .  get_bloginfo('description');
			}elseif (!empty($post->post_excerpt)) {
				$content .= get_the_excerpt() . $post_terms . " | " . get_bloginfo('name') . " " .  get_bloginfo('description');} 
			else {
				$content .= get_the_title() . $post_terms . " | " . get_bloginfo('name') . " " .  get_bloginfo('description');} 
        }
	elseif (is_page()) {
			if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){
					$metafield = get_field ("metadescription_es");
				 }elseif( qtrans_getLanguage() == 'ca' ){
					$metafield = get_field ("metadescription_ca");
				 }else{
					$metafield = get_field ("metadescription_en");
				 }
            }else{//Not activeQtrans
				$metafield = get_field ("metadescription_es");
			}
			if (!empty ($metafield)){
				$content .= $metafield . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
			} else { $content .= get_the_title() . " | " . get_bloginfo('name') . " " .  get_bloginfo('description');}
        }
	elseif (is_search()) {
			 if (function_exists('qtrans_getLanguage')){
				 if( qtrans_getLanguage() == 'es' ){
					$content .=  "Resultados de la BÚSQUEDA: ";
				 }elseif( qtrans_getLanguage() == 'ca' ){
					$content .= "Resultats de la CERCA: ";
				 }else{
					$content .= "SEARCH results: ";
				 }
			 }else{//Not activeQtrans
				$content .=  "Resultados de la BÚSQUEDA: ";
			 }
             $content .= get_search_query() . " | " . get_bloginfo('name') . " " .  get_bloginfo('description');
        }
	elseif (is_404()) {
			if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){
					$content .=  "Lo sentimos pero la Página que estás buscando no existe. Te proponemos algunas alternativas.";
				}elseif( qtrans_getLanguage() == 'ca' ){
					$content .= "Ho sentim però la Pàgina que estás cercant no existeix. Et proposem algunes alternatives.";
				}else{
					$content .= "Sorry we can't find the page that you're looking for. There are another options.";
				}
            }else{//Not activeQtrans
				$content .=  "Lo sentimos pero la Página que estás buscando no existe. Te proponemos algunas alternativas.";
			 }
			$content .= " | " . get_bloginfo('name') . "  " . get_bloginfo('description');
        }
	elseif (is_category()) {
			if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){$taxonomy = 'Categoría';}elseif( qtrans_getLanguage() == 'ca' ){$taxonomy = 'Categoria';}else{$taxonomy = 'Category';}
            }else{//Not activeQtrans
				$taxonomy = 'Categoría';
			}
			$content .= $taxonomy . ' ' . single_cat_title("", false) . ": " . str_replace( "\n", "", strip_tags(category_description())) . " | " . get_bloginfo('name') . " " .  get_bloginfo('description');
        }
	elseif (is_tag()) {
			if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){$taxonomy = 'Noticias etiquetadas en';}elseif( qtrans_getLanguage() == 'ca' ){$taxonomy = 'Notícies etiquetades a';}else{$taxonomy = 'Posts tagged in';}
            }else{//Not activeQtrans
				$taxonomy = 'Noticias etiquetadas en';
			}
			$content .= $taxonomy . ': ' . single_tag_title("", false) . " | " . get_bloginfo('name') . " " .  get_bloginfo('description');
        }
	else {
            $content .= get_bloginfo('name') . " " .  get_bloginfo('description');
        }
	$content .= '" />' . "\n";
	$content .="<!-- END MetaTags ><!-->" . "\n";
    return $content;
}
add_filter('thematic_create_description', 'childtheme_show_description', 11);
//
// Neteja Elements Innecesaris del HEAD  ********************************************************************
//
// Robots
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
            $content = "<meta name=\"robots\" content=\"index,follow\" />";
            $content .= "\n";
        }
    return $content;
    }
}
add_filter('thematic_create_robots', 'childtheme_create_robots');
// Neteja
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
      echo '<!-- RSS Links ><!-->' . "\n";
	  echo '<link rel="alternate" type="application/rss+xml" title="' . get_bloginfo('sitename') . ' / RSS Feed" href="' . get_bloginfo('rss2_url') . '" />' . "\n";
}
// kills the 4 scripts for the drop downs, combined and reloaded by the script manager (dropdowns-js)
function childtheme_override_head_scripts() {
    // silence
}
//
// Script manager template for registering and enqueuing files ***********************************************************
//
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
    //wp_register_script('flexslider-js', get_stylesheet_directory_uri() . '/flexslider/jquery.flexslider-min.js', array('jquery'), false, true);
	// registers validator script, loads in footer
    wp_register_script('validate-js', get_stylesheet_directory_uri() . '/js/jquery.validate.js', array('jquery'), false, true);
	 // registers flexslider styles, local stylesheet path
     //wp_register_style('flexslider-page-css', get_stylesheet_directory_uri() . '/flexslider/flexslider_page.css');
	 // registers flexslider styles, local stylesheet path
    //wp_register_style('flexslider-css', get_stylesheet_directory_uri() . '/flexslider/flexslider.css');
	// registers colorbox script, loads in footer
    //wp_register_script('colorbox-js', get_stylesheet_directory_uri() . '/js/jquery.colorbox-min.js', array('jquery'), false, true);
	// registers flexslider styles, local stylesheet path
    //wp_register_style('colorbox-css', get_stylesheet_directory_uri() . '/css/colorbox.css');
	// registers flexslider styles, local stylesheet path
    //wp_register_style('colorbox-css-posts', get_stylesheet_directory_uri() . '/css/colorbox_posts.css');
	// register style, Colores para la Barra
    wp_register_style('admin_css', get_stylesheet_directory_uri() . '/custom_admin/custom-admin.css');
	// enqueue the scripts for use in theme
    wp_enqueue_script ('modernizr-js');
    wp_enqueue_script ('fitvids-js');
	wp_enqueue_script ('validate-js');
	// Estils per a la Barra de l'Admin
	if ( is_user_logged_in() ) {
		wp_enqueue_style('admin_css');
	}
	//
	//poner en cola scripts y css de flexslider
       //if ( is_home() ) {
       //     wp_enqueue_style ('flexslider-page-css');
       // } elseif ( is_front_page() ) {//en el array elegimos que paginas cargan el script. Más abajo debemos activar el script del head
		//	wp_enqueue_script ('flexslider-js');
		//} 
		//if ( is_front_page() || is_page() || is_single() || is_404() || is_search() || is_archive() ) {
          //  wp_enqueue_style ('flexslider-page-css');
		//}			
	//carga el colorbox para las páginas de contenido
       //if ( is_page(7) ) {
         //   wp_enqueue_script ('colorbox-js');
			//wp_enqueue_style ('colorbox-css');
		//} elseif ( is_single() || ( is_page() && !is_page(array( 4, 8, 10, 13 )) ) ) {
          //  wp_enqueue_script ('colorbox-js');
			//wp_enqueue_style ('colorbox-css-posts');
		//}		
    //always enqueue this last, helps with conflicts
    wp_enqueue_script ('custom-js');
}
add_action('wp_enqueue_scripts', 'childtheme_script_manager');
//
// Fonts de Google Fonts + Font Awesome ***********************************************************
//
function childtheme_fonts_manager() {
	// register style, google-fonts css custom font
	wp_register_style('google-fonts', 'http://fonts.googleapis.com/css?family=Arvo:400', array(), null, true);
	// register style, Awesome Fonts ICONS
    wp_register_style('awesome-css', get_stylesheet_directory_uri() . '/css/font-awesome.min.css');
	// register style, Awesome Fonts ICONS ie7
    //wp_register_style('awesome-css-ie7', get_stylesheet_directory_uri() . '/css/font-awesome-ie7.min.css');
	// enqueue the styles for use in theme
	wp_enqueue_style ('google-fonts');
	// enqueue the styles for  Awesome Fonts ICONS
    wp_enqueue_style('awesome-css');
	// enqueue the styles for  Awesome Fonts ICONS
    //wp_enqueue_style('awesome-css-ie7');
	// conditionally enqueue the styles fo Awesome Fonts ICONS
	//global $wp_styles;
	//$wp_styles->add_data('awesome-css-ie7', 'conditional', 'lte IE 7');
}
add_action('wp_enqueue_scripts', 'childtheme_fonts_manager');
// Remove Qtranslate CSS code from <HEAD>
remove_action('wp_head', 'qtrans_header');
//
// ESTILS AL HEADER **************************************************************************************
//

//
// SCRIPTS AL HEAD ***************************************************************************************
//
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
//
// *****************************************************************************************************************************
// </HEAD>**********************************************************************************************************************
//
//
//<BODY> ***********************************************************************************************************************
//******************************************************************************************************************************
//
// Als posts afegim al body la clase de la categoria
function childtheme_body_class($classes) {
	if ( is_singular( 'post' ) && !is_attachment() && !is_singular( 'news' ) ) {
		global $post;
		$category = get_the_category($post->ID);
		$category_id = $category[0]->cat_ID;
		$category_class = 'category' . $category_id;
		$classes[] = $category_class;
		return $classes;
	}else{
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
//DEFINIR ELS WIDGETS **********************************************************************************************************
//
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
//
// HEADER ************************************************************************
//
///Extra wrapper for header sectiom
function header_wrapper_open(){
	echo ' <div id="header_wrapper">';
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
//Add in custom branding
function childtheme_logo() {
	if (function_exists('qtrans_getLanguage')){
		$logo_lang = qtrans_getLanguage() . ('/');
	}else{
		$logo_lang = '';
	}
	echo '<h1 id="branding-logo"><a href="' . get_bloginfo('url') . ('/') . $logo_lang . '" title="' . get_bloginfo('name') . " " .  get_bloginfo('description') . '"><img src="' . get_stylesheet_directory_uri() . ('/images/layout/next_logo.jpg') . '" alt="' . get_bloginfo('name') . '" /><span><em>Conferencias</em> de Autor</span></a></h1>'; 
}
add_action('thematic_header','childtheme_logo',2);
//
// SEARCH FIELD ************************************************************************
function childtheme_header_searchform() {
    get_search_form();
}
add_action('thematic_header', 'childtheme_header_searchform', 11);
// change the default search box text
function childtheme_search_field_value() {
    if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			return "Buscar";
		}elseif( qtrans_getLanguage() == 'ca' ){
			return "Cercar";
		}else {
			return "Search";
		}
	}else{//Not activeQtrans
		return "Buscar";
	}
}
add_filter('search_field_value', 'childtheme_search_field_value');
// Canvia el text del boto del search
function childtheme_search_submit_value() {
	$search_submit = '<input id="searchsubmit" name="searchsubmit" type="submit" ';
	if ( is_home() || is_page() || is_page_template('template-full-archive.php') || is_page_template('template-page-fullwidth.php') || is_single() || is_archive() || is_attachment() || is_search() && have_posts() ){
		$search_submit .= 'value="&#xF002;" tabindex="2" />';
	}else{
		if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){ $search_submit .= 'value="' . __('Search', 'thematic') . '" tabindex="2" />';
			}elseif( qtrans_getLanguage() == 'ca' ){ $search_submit .= 'value="CERCAR" tabindex="2" />';
			}elseif( qtrans_getLanguage() == 'en' ){ $search_submit .= 'value="' . __('Search', 'thematic') . '" tabindex="2" />';
			}
		}else{//Not activeQtrans
			$search_submit .= 'value="' . __('Search', 'thematic') . '" tabindex="2" />';
		}
	}
	return $search_submit;
}
add_filter('thematic_search_submit', 'childtheme_search_submit_value');
// Regenerem el Search Form per a que sigui miltilanguaje
function childtheme_search_form() {
	$search_form_length = apply_filters('thematic_search_form_length', '22');
	if (function_exists('qtrans_getLanguage')){
		$search_form_url_lang = home_url() . '/' . qtrans_getLanguage();
	}else{//Not activeQtrans
		$search_form_url_lang = home_url();
	}
	$search_form  = "\n\t\t\t\t\t\t";
	$search_form .= '<form id="searchform" method="get" action="' . $search_form_url_lang . '/">';
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
//
// Tunejat del Menú
function childtheme_override_access() { ?>
    <div id="access" class="cf">
        <div class="menu-button">
        <?php //Nombre "MENU" multidioma
			if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'en' ){ ?>
					<span class="menu-title graybutton"><span>MENU</span><i class="icon-list"></i></span>
				<?php }else { ?>
					<span class="menu-title graybutton"><span>MENÚ</span><i class="icon-list"></i></span>
				<?php }      
			}else{//Not activeQtrans?>
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
//
// SLIDER AL BELOWHEADER ***************************************************************
function childtheme_header_flexslider() {
    include_once(get_stylesheet_directory() . '/snippets/snippet-header-flexslider.php');
}
add_action('thematic_belowheader', 'childtheme_header_flexslider', 11);
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
// <BODY> - FOOTER *************************************************************************************************************
//******************************************************************************************************************************
// load google analytics
$analtytics_array = get_option('stats_analytics');
if (isset($analtytics_array['id']) && $analtytics_array['id'] != ''){
	// Funció del codi
	function footer_google_analytics(){ 
		$analtytics_array = get_option('stats_analytics');
		$analtytics_id = $analtytics_array['id']; ?>
		<script>var _gaq=[['_setAccount','<?php echo $analtytics_id ?>'],['_trackPageview']];(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.src='//www.google-analytics.com/ga.js';s.parentNode.insertBefore(g,s)}(document,'script'))</script>
        <!-- <script type='text/javascript' src='<?php //echo get_stylesheet_directory() . '/js/ga_social_tracking.js' ?>'></script> -->
	<?php }
	add_action('wp_footer', 'footer_google_analytics');
}
// ADMIN ***********************************************************************************************************************
//******************************************************************************************************************************
//ADVANCED CUSTOM FIELDS
//add_action('acf/register_fields', 'my_register_fields');
//function my_register_fields(){
	//Custom Fields --> Generar y exportar desde el Admin
	//include_once('fields/advanced_custom_fields.php');
//}
?>