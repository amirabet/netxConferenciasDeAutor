<?php
//****************************************************************************************/
//
//  Child Theme NEXT Conferencias de Autor Functions
//  
//  FUNCTIONS > HEAD --> Todas las configuraciones relativas al <head> de la pagina
//
//****************************************************************************************/
//GENERAR EL <HEAD> ************************************************************************************************************
//******************************************************************************************************************************
//
//
// DocType + Title + Description ***********************************************************************************************
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
    // Viewport
	$content .= "<meta name=\"viewport\" content=\"user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width\" />" . "\n";
	// Favicon
	$content .= "<!-- IE 9 and before ICON ><!-->" . "\n";
	$content .= "<!--[if (lt IE 9)|(IE 9)]>" . "<link rel=\"shortcut icon\"  href=\" ". get_stylesheet_directory_uri() . "/images/favicon/favicon.ico" . "\"/> <![endif]-->" . "\n";
	$content .= "<!-- Default ShortCut Icon ><!-->" . "\n";
	$content .= "<link rel=\"shortcut icon\"  href=\" ". get_stylesheet_directory_uri() . "/images/favicon/favicon.png" . "\"/>" . "\n";
	$content .= "<!-- Apple Touch Icon ><!-->" . "\n";
	$content .= "<link rel=\"apple-touch-icon\"  sizes=\"57x57\" href=\" ". get_stylesheet_directory_uri() . "/images/favicon/tile114.png" . "\"/>" . "\n";
	$content .= "<link rel=\"apple-touch-icon\"  sizes=\"114x114\" href=\" ". get_stylesheet_directory_uri() . "/images/favicon/tile114.png" . "\"/>" . "\n";
	$content .= "<link rel=\"apple-touch-icon\"  sizes=\"72x72\" href=\" ". get_stylesheet_directory_uri() . "/images/favicon/tile144.png" . "\"/>" . "\n";
	$content .= "<link rel=\"apple-touch-icon\"  sizes=\"144x144\" href=\" ". get_stylesheet_directory_uri() . "/images/favicon/tile144.png" . "\"/>" . "\n";
	//ie10 tags
	$content .= "<!-- ie10 metaTags For Tile ><!-->" . "\n";
	$content .= "<meta name=\"msapplication-TileColor\" content=\"#38af37\" />" . "\n";
	$content .= "<meta name=\"msapplication-TileImage\" content=\"" . get_stylesheet_directory_uri() . "/images/favicon/tile144.png" . "\"/>" . "\n";
	// Open Graph Tags Vars
    $default_img = get_stylesheet_directory_uri() . "/images/favicon/tile.png";
	$categories = get_the_category();
	// Variables per a cada Pàgina ***************************************
	// FRONT PAGE ***************** (ID = 5)
	if (is_front_page()) {
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
		if (!empty ($metafield)){ $description = $metafield . " | " . get_bloginfo('name') . " " . get_bloginfo('description');} else { $description = get_the_title() . " | " . get_bloginfo('name') . " " . get_bloginfo('description');}
		$type = 'website';
		$image = $default_img;
	// HOME PAGE***************** (ID = 7) [AUTORES]
	} elseif (is_home()){ //Agafem l'ACF de la description amb l'ID de la pàgina
		$url = get_permalink(7);
		$title = get_the_title(7) . ' | ' . get_bloginfo('name') . ' ' . get_bloginfo('description');
		if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){
				$metafield = get_field ("metadescription_es", 7);
			 }elseif( qtrans_getLanguage() == 'ca' ){
				$metafield = get_field ("metadescription_ca", 7);
			 }else{
				$metafield = get_field ("metadescription_en", 7);
			 }
		 }else{//Not activeQtrans
		 	$metafield = get_field ("metadescription_es", 7);
		 }
		if (!empty ($metafield)){ $description = $metafield  . " / Speakers" . " | " . get_bloginfo('name'). " " . get_bloginfo('description');} else { $description = get_the_title() . " | " . get_bloginfo('name') . " " . get_bloginfo('description');}
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
	// ARCHIVE ***************** 
	} elseif (is_archive() && !is_author()) { 
		// ARCHIVO DE AUTORES**************
		if (!is_post_type_archive('news')){
			// CATEGORY ******************* 
			if (is_category()) { 
				global $wp; 
				$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
				if (function_exists('qtrans_getLanguage')){
					if( qtrans_getLanguage() == 'es' ){$url_lang = '&lang=es';}elseif( qtrans_getLanguage() == 'ca' ){$url_lang = '&lang=ca';}else{$url_lang = '&lang=en';}
				}else{//Not activeQtrans
					$url_lang = '';
				}
				$url =  $current_url . $url_lang;
				if (function_exists('qtrans_getLanguage')){
					if( qtrans_getLanguage() == 'es' ){$authors = 'Speakers'; $divulgacion = 'Divulgación';
					}elseif( qtrans_getLanguage() == 'ca' ){$authors = 'Speakers'; $divulgacion = 'Divulgació';
					}else{$authors = 'Speakers'; $divulgacion = 'Popularization';}
				}else{//Not activeQtrans
					$authors = 'Speakers';
					$divulgacion = 'Popularization';
				 }
				$title =  single_cat_title("", false) . ': ' . $authors  . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
				$cat_descript = str_replace( "\n", "", strip_tags(category_description()));
				if (!empty ($cat_descript)){
					$cat_description = ': ' . $cat_descript;
				}else{
					// Descripcio genèrica de la Pagina d'Autors ID7
					if (function_exists('qtrans_getLanguage')){
						if( qtrans_getLanguage() == 'es' ){
							$metafield = get_field ("metadescription_es", 7);
						 }elseif( qtrans_getLanguage() == 'ca' ){
							$metafield = get_field ("metadescription_ca", 7);
						 }else{
							$metafield = get_field ("metadescription_en", 7);
						 }
					 }else{//Not activeQtrans
						$metafield = get_field ("metadescription_es", 7);
					 }
					$cat_description = '. ' . $metafield;
				}
				$description = $divulgacion . ' / ' . single_cat_title("", false) . $cat_description . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
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
					if( qtrans_getLanguage() == 'es' ){$authors = 'Speakers'; $divulgacion = 'Divulgación';
					}elseif( qtrans_getLanguage() == 'ca' ){$authors = 'Speakers'; $divulgacion = 'Divulgació';
					}else{$authors = 'Speakers'; $divulgacion = 'Popularization';}
				}else{//Not activeQtrans
					$authors = 'Speakers';
					$divulgacion = 'Divulgación';
				 }
				$title =  single_tag_title("", false) . ': ' . $authors . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
				$tag_descript = str_replace( "\n", "", strip_tags(tag_description()));
				if (!empty ($tag_descript)){
					$tag_description = ': ' . $tag_descript;
				}else{
					// Descripcio genèrica de la Pagina d'Autors ID7
					if (function_exists('qtrans_getLanguage')){
						if( qtrans_getLanguage() == 'es' ){
							$metafield = get_field ("metadescription_es", 7);
						 }elseif( qtrans_getLanguage() == 'ca' ){
							$metafield = get_field ("metadescription_ca", 7);
						 }else{
							$metafield = get_field ("metadescription_en", 7);
						 }
					 }else{//Not activeQtrans
						$metafield = get_field ("metadescription_es", 7);
					 }
					$tag_description = '. ' . $metafield;
				}
				$description = $divulgacion . ' / ' . single_tag_title("", false) . $tag_description . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
				$type = 'blog';
				$image = $default_img;
			// DATE ************************ 
			} elseif ( is_date() ){
				global $wp; 
				$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
				if  (is_day()) { global $post; $archive_url = ': ' . get_the_time(get_option('date_format'));
				}elseif  (is_month()) { global $post; $archive_url = ': ' . get_the_time('F Y');
				}elseif  (is_year()) { global $post; $archive_url = ': ' . get_the_time('Y');
				}
				// Descripcio genèrica de la Pagina d'Autors ID7
				if (function_exists('qtrans_getLanguage')){
					if( qtrans_getLanguage() == 'es' ){
						$metafield = get_field ("metadescription_es", 7);
					 }elseif( qtrans_getLanguage() == 'ca' ){
						$metafield = get_field ("metadescription_ca", 7);
					 }else{
						$metafield = get_field ("metadescription_en", 7);
					 }
				 }else{//Not activeQtrans
					$metafield = get_field ("metadescription_es", 7);
				 }
				if (function_exists('qtrans_getLanguage')){
					if( qtrans_getLanguage() == 'es' ){$url_lang = '&lang=es';}elseif( qtrans_getLanguage() == 'ca' ){$url_lang = '&lang=ca';}else{$url_lang = '&lang=en';}
				}else{//Not activeQtrans
					$url_lang = '';
				}
				$url =  $current_url . $url_lang;
				if (function_exists('qtrans_getLanguage')){
					if( qtrans_getLanguage() == 'es' ){$archive = 'Cronología de Autores';}elseif( qtrans_getLanguage() == 'ca' ){$archive = 'Cronologia d\'Autors';}else{$archive = 'Authors Archive';}
				}else{//Not activeQtrans
					$archive = 'Cronología de Autores';
				}
				$title = $archive . $archive_url . " | " . get_bloginfo('name'). " " . get_bloginfo('description');
				$description = get_the_title(7) . $archive_url . " | " . $metafield . " | " . get_bloginfo('name'). " " . get_bloginfo('description');
				$type = 'blog';
				$image = $default_img;
			// CUSTOM POST TAGS NEWS  ******************* 
			}elseif (is_tax()) { 
				global $wp; 
				global $wptaxonomies; 
				if (function_exists('qtrans_getLanguage')){
					if( qtrans_getLanguage() == 'es' ){
						$url_lang = '&lang=es';
						$metafield = get_field ("metadescription_es", 9);
						$archive = 'Archivo de Noticias';
						$divulgacion = 'Divulgación';
					 }elseif( qtrans_getLanguage() == 'ca' ){
						$url_lang = '&lang=ca';
						$metafield = get_field ("metadescription_ca", 9);
						$archive = 'Arxiu de Notícies';
						$divulgacion = 'Divulgació';
					 }else{
						$url_lang = '&lang=en';
						$metafield = get_field ("metadescription_en", 9);
						$archive = 'News Archive';
						$divulgacion = 'Popularization';
					 }
				 }else{//Not activeQtrans
					$url_lang = '&lang=es';
					$metafield = get_field ("metadescription_es", 9);
					$archive = 'Archivo de Noticias';
					$divulgacion = 'Divulgación';
				 }
				$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
				$url =  $current_url . $url_lang;
				$title =  single_term_title("", false) . ': ' . $archive . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
				$tag_descript = str_replace( "\n", "", strip_tags(term_description()));
				if (!empty ($tag_descript)){
					$tag_description =  ': ' . $tag_descript . ' / ' . get_the_title(9);
				}else{
					// Descripcio genèrica de la Pagina de Noticies ID9
					$tag_description = '. ' . $metafield. ' / ' . get_the_title(9);
				}
				$description = single_term_title("", false) . $tag_description . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
				$type = 'blog';
				$image = $default_img;
			}
		// ARCHIVO DE NOTICIAS************** (NEWS) 
		}else{
			// DATE ************************ 
			if ( is_date() ){
				global $wp; 
				$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
				if  (is_day()) { global $post; $archive_url = ': ' . get_the_time(get_option('date_format'));
				}elseif  (is_month()) { global $post; $archive_url = ': ' . get_the_time('F Y');
				}elseif  (is_year()) { global $post; $archive_url = ': ' . get_the_time('Y');
				}
				// Descripcio genèrica de la Pagina Noticias ID9
				if (function_exists('qtrans_getLanguage')){
					if( qtrans_getLanguage() == 'es' ){
						$metafield = get_field ("metadescription_es", 9);
					 }elseif( qtrans_getLanguage() == 'ca' ){
						$metafield = get_field ("metadescription_ca", 9);
					 }else{
						$metafield = get_field ("metadescription_en", 9);
					 }
				 }else{//Not activeQtrans
					$metafield = get_field ("metadescription_es", 9);
				 }
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
				$title = $archive . $archive_url . " | " . get_bloginfo('name'). " " . get_bloginfo('description');
				$description = get_the_title(9) . $archive_url . " / " . $metafield . " | " . get_bloginfo('name'). " " . get_bloginfo('description');
				$type = 'blog';
				$image = $default_img;
			}else{ //Página de Noticias
				global $wp;
				$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
				if (function_exists('qtrans_getLanguage')){
					if( qtrans_getLanguage() == 'es' ){$url_lang = '&lang=es';}elseif( qtrans_getLanguage() == 'ca' ){$url_lang = '&lang=ca';}else{$url_lang = '&lang=en';}
				}else{//Not activeQtrans
					$url_lang = '';
				}
				// Descripcio genèrica de la Pagina Noticias ID9
				if (function_exists('qtrans_getLanguage')){
					if( qtrans_getLanguage() == 'es' ){
						$metafield = get_field ("metadescription_es", 9);
					 }elseif( qtrans_getLanguage() == 'ca' ){
						$metafield = get_field ("metadescription_ca", 9);
					 }else{
						$metafield = get_field ("metadescription_en", 9);
					 }
				 }else{//Not activeQtrans
					$metafield = get_field ("metadescription_es", 9);
				 }
				$url =  $current_url . $url_lang;
				$title = get_the_title(9) . " | " . get_bloginfo('name'). " " . get_bloginfo('description');
				$description = get_the_title(9) . " / " . $metafield . " | " . get_bloginfo('name'). " " . get_bloginfo('description');
				$type = 'blog';
				$image = $default_img;
			}
		}
	// POST ***************** (AUTORES)
	} elseif (is_single() && !is_singular( 'news' ) && !is_singular( 'tribe_events' ) && !is_attachment() && !is_archive() && !is_author()) {
		$url = get_permalink($post->ID);
		$title = get_the_title() . " / " . "Speakers - " . $categories[0]->cat_name . " | " . get_bloginfo('name') . " " .  get_bloginfo('description');
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
				$description = $metafield . $post_terms . " / " . "Speakers - " . $categories[0]->cat_name . " | " . get_bloginfo('name') . " " .  get_bloginfo('description');
			}elseif (!empty($post->post_excerpt)) {
				$categories = get_the_category();
				$description = get_the_excerpt() . $post_terms . " / " . "Speakers - " . $categories[0]->cat_name . " | " . get_bloginfo('name') . " " .  get_bloginfo('description');} 
			else {
				$categories = get_the_category();
				$description = get_the_title() . $post_terms . " / " . "Speakers - " . $categories[0]->cat_name . " | " . get_bloginfo('name') . " " .  get_bloginfo('description');} 
		$type = 'article';
		$image = get_fbimage();
	// POST ***************** (TYPE = NEWS)
	} elseif (is_singular( 'news' )) {
		$url = get_permalink($post->ID);
		$title = get_the_title() . " / " . get_the_title(9) . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
			if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){
					$metafield = get_field ("metadescription_es");
					$tagged = 'Noticia etiquetada en ';
					$metafield2 = get_field ("metadescription_es", 9);
				}elseif( qtrans_getLanguage() == 'ca' ){
					$metafield = get_field ("metadescription_ca");
					$tagged = 'Notícia etiquetada a ';
					$metafield2 = get_field ("metadescription_ca", 9);
				}else{
					$metafield = get_field ("metadescription_en");
					$tagged = 'News tagged in ';
					$metafield2 = get_field ("metadescription_en", 9);
				}
			}else{//Not activeQtrans
				$metafield = get_field ("metadescription_es");
				$tagged = 'Noticia etiquetada en ';
				$metafield2 = get_field ("metadescription_es", 9);
			}
			if ( has_term('','news_tag') ){
				$post_tags = get_terms('news_tag',array('orderby' => 'count', 'order' => 'DESC'));
				$post_terms = $tagged;
				$p = 1;
				foreach ( $post_tags as $tag ) {
					if ( $p >= 2 ){$post_terms .= ', ';}
					$post_terms .= $tag->name;
					$p++;
				}
				$post_terms .= '.';
			}else{
				$post_terms = get_the_title(9);
			}
            if (!empty ($metafield)){
				$description = $metafield . " / " . $post_terms . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
			}elseif (!empty($post->post_excerpt)) {
				$description = get_the_excerpt() . " / " . $post_terms . " | " . get_bloginfo('name') . " " . get_bloginfo('description');} 
			else {
				$description = $metafield2 . " / " . $post_terms . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
			}
		$type = 'article';
		$image = get_fbimage();
	// POST TYPE EVENTS
	} elseif (is_singular( 'tribe_events' )) {
		$url = get_permalink($post->ID);
		$title = get_the_title() . " / Conferencias y Eventos | " . get_bloginfo('name') . " " . get_bloginfo('description');
		if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){
				$metafield = get_field ("metadescription_es");
				$tagged = ' - ';
				$metafield2 = get_field ("metadescription_es", 5);
			}elseif( qtrans_getLanguage() == 'ca' ){
				$metafield = get_field ("metadescription_ca");
				$tagged = ' - ';
				$metafield2 = get_field ("metadescription_ca", 5);
			}else{
				$metafield = get_field ("metadescription_en");
				$tagged = ' - ';
				$metafield2 = get_field ("metadescription_en", 5);
			}
		}else{//Not activeQtrans
			$metafield = get_field ("metadescription_es");
			$tagged = ' - ';
			$metafield2 = get_field ("metadescription_es", 5);
		}
		if ( has_term('','tribe_events_cat') ){
			$post_cats = get_terms('tribe_events_cat',array('orderby' => 'count', 'order' => 'DESC'));
			$post_cat_terms = " / ";
			$p = 1;
			foreach ( $post_cats as $cat ) {
				if ( $p >= 2 ){$post_cat_terms .= ', ';}
				$post_cat_terms .= $cat->name;
				$p++;
			}
		}else{
			$post_cat_terms = '';
		}
		if (!empty ($metafield)){
			$description = $metafield . $post_cat_terms . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
		}elseif (!empty($post->post_excerpt)) {
			$description = get_the_excerpt() . $post_cat_terms . " | " . get_bloginfo('name') . " " . get_bloginfo('description');} 
		else {
			$description = $metafield2 . $post_cat_terms . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
		}
		$type = 'event';
		$image = get_fbimage();
	// pagina eventos mes
	}elseif( tribe_is_month()) { // Month View Page
		global $post;
		$url = get_permalink(151);
		$title = "Conferencias y Eventos | " . get_bloginfo('name') . " " . get_bloginfo('description');
		if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){
				$metafield = get_field ("metadescription_es", 151);
			}elseif( qtrans_getLanguage() == 'ca' ){
				$metafield = get_field ("metadescription_ca", 151);
			}else{
				$metafield = get_field ("metadescription_en", 151);
			}
		}else{//Not activeQtrans
			$metafield = get_field ("metadescription_es", 151);
		}
		$description = $metafield . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
		$type = 'website';
		$image = get_fbimage();
	// PAGINA de AUTOR
	}elseif (is_author()) {
		if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){$colaboradores = "Colaboradores";}elseif( qtrans_getLanguage() == 'ca' ){$colaboradores = "Col·laboradors";}else{$colaboradores = "Contributors";}
		}else{//Not activeQtrans
			$colaboradores = "Colaboradores";
		}
		$url = get_author_posts_url(get_the_author_meta('ID'));
		$title = get_the_author_meta( 'first_name' ) . " " . get_the_author_meta( 'last_name' ) . " / " . $colaboradores . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
		// Descripcio genèrica de la Pagina ID5 (frontPage)
		$author_bio = get_the_author_meta( 'user_description' );
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
		if (!empty ($author_bio)){ $description = $author_bio . " | " . get_bloginfo('name') . " " . get_bloginfo('description');} elseif (!empty ($metafield)){ $description = $metafield . " | " . get_bloginfo('name') . " " . get_bloginfo('description');} else { $description = $colaboradores . ": " .  get_the_author_meta( 'first_name' ) . " " . get_the_author_meta( 'last_name' ) . " | " . get_bloginfo('name') . " " . get_bloginfo('description');}
		$type = 'blog';
		// Imatge
		function get_avatar_url($author_id, $size){
			$get_avatar = get_avatar( $author_id, $size );
			preg_match("/src='(.*?)'/i", $get_avatar, $matches);
			return ( $matches[1] );
		}
		$avatar_url = get_avatar_url ( get_the_author_meta('ID'), $size = '360' ); 
		$image = $avatar_url;
	// SEARCH RESULTS ***************** 
	}elseif (is_search()) {
		$url = get_permalink();
		if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){$search = "Búsqueda: ";}elseif( qtrans_getLanguage() == 'ca' ){$search = "Cerca: ";}else{$search = "Search: ";}
		}else{//Not activeQtrans
			$search = "Búsqueda: ";
		}
		$title = $search . get_search_query() . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
		// Descripcio genèrica de la Pagina ID5 (frontPage)
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
		if (!empty ($metafield)){ $description = $metafield . " | " . get_bloginfo('name') . " " . get_bloginfo('description');} else { $description = get_the_title() . " | " . get_bloginfo('name') . " " . get_bloginfo('description');}
		$type = 'website';
		$image = $default_img;
	//ATTACHMENT
	}elseif (is_attachment()) {
		$url = get_permalink($post->ID);
		//$categories = get_the_category( $post->post_parent );
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
		$title = $attach . get_the_title() . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
		if (!empty($post->post_excerpt)) {
			$description = get_the_excerpt() . " / " . $attach . get_the_title() . " | " . get_bloginfo('name') . " " .  get_bloginfo('description');
		}else{
			// Descripcio genèrica de la Pagina ID5 (frontPage)
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
			if (!empty ($metafield)){ $description = $metafield . " | " . get_bloginfo('name') . " " . get_bloginfo('description');} else { $description = $notfound . " | " . get_bloginfo('name') . " " . get_bloginfo('description');}
		}
		$type = 'article';
		if (wp_attachment_is_image()){
			$image = get_fbimage();
		}else{
			$default_img;
		}
	// PAGINA 404
	}elseif (is_404()) {
		 if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){$notfound = "No encontramos la Página";}elseif( qtrans_getLanguage() == 'ca' ){$notfound = "No trobem la Pàgina";}else{$notfound = "Page not found";}
		 }else{//Not activeQtrans
			$notfound = "No encontramos la Página";
		}
		$url = get_option('home');
		$title = $notfound . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
		// Descripcio genèrica de la Pagina ID5 (frontPage)
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
		if (!empty ($metafield)){ $description = $description = $notfound . ". " . $metafield . " | " . get_bloginfo('name') . " " . get_bloginfo('description');} else { $description = $notfound . " | " . get_bloginfo('name') . " " . get_bloginfo('description');}
		$type = 'website';
		$image = $default_img;
	// GENERAL ***************** 
	} else {
		$url = get_permalink();
		$title = get_the_title() . " | " . get_bloginfo('name') . " " . get_bloginfo('description');
		// Descripcio genèrica de la Pagina ID5 (frontPage)
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
		if (!empty ($metafield)){ $description = $metafield . " | " . get_bloginfo('name') . " " . get_bloginfo('description');} else { $description = $notfound . " | " . get_bloginfo('name') . " " . get_bloginfo('description');}
		$type = 'website';
		$image = $default_img;
	}
	// OPEN GRAPH METATAGS ************************************************************************/
	$content .="<!-- og MetaTags ><!-->" . "\n";
	$content .='<meta property="og:site_name" content="' . get_bloginfo('name') . " " . get_bloginfo('description') . '" />' . "\n";
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
		$authorid = $postdata['post_author'];
		$authortwmeta = get_the_author_meta( 'user_twitter', $authorid );
		$authortw = $authortwmeta;
	}elseif(is_page()){
		if (!empty ($user_tw)){ $authortw = $user_tw; }else{$authortw ='';}
	}elseif (is_author()) {
		$authortw = get_the_author_meta( 'user_twitter' );
	}else{
		$authortw ='';
	}
	// Output metafileds
	$content .="<!-- Twitter Summary Card ><!-->" . "\n";
	$content .='<meta name="twitter:card" content="summary" />' . "\n";
	if (!empty ($user_tw)){
		$content .='<meta name="twitter:site" content="@' . $user_tw . '" />' . "\n";
	}
	if (!empty ($userid_tw)){
		$content .='<meta name="twitter:site:id" content="' . $userid_tw . '" />' . "\n";
	}
	if (!empty ($authortw)){
		$content .='<meta name="twitter:creator" content="@' . $authortw . '" />' . "\n";
	}elseif (!empty ($user_tw)){
		$content .='<meta name="twitter:creator" content="@' . $user_tw . '" />' . "\n";
	}
	$content .='<meta name="twitter:title" content="' . $title . '" />' . "\n";
	$content .='<meta name="twitter:description" content="' . $description . '" />' . "\n";
	$content .='<meta name="twitter:image" content="' . $image . '" />' . "\n";
	$content .='<meta name="twitter:url" content="' . $url . '" />' . "\n";
	// HTML Microdata
	$content .="<!-- HTML Microdata ><!-->" . "\n";
	$content .='<meta itemprop="name" content="' . $title . '">' . "\n";
	$content .='<meta itemprop="description" content="' . $description . '">' . "\n";
	$content .='<meta itemprop="image" content="' . $image . '">' . "\n";
	// Google Authorship (URL perfil Google Plus) **************************
	// Configurable desde l'Admin > Social > Config
	$gplus_array = get_option('social_gplus');
	if (isset($gplus_array['url']) && $gplus_array['url'] != ''){
		$url_gplus = $gplus_array['url'];
	}
	// Usuari G+ de l'Autor (especificat a la pàgina de perfil)
	if ( is_single()){
		$thePostID = $wp_query->post->ID;
		$postdata = get_post($thePostID, ARRAY_A);
		$authorid = $postdata['post_author'];
		$authorgplus = get_the_author_meta( 'user_gplus', $authorid );
	}elseif(is_page()){
		if (!empty ($url_gplus)){ $authorgplus = $url_gplus; }else{$authorgplus ='';}
	}elseif (is_author()) {
		$authorgplus = get_the_author_meta( 'user_gplus' );
	}else{
		if (!empty ($url_gplus)){ $authorgplus = $url_gplus; }else{$authorgplus ='';}
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
	// MetaTag <title> **********************************************
	// 
		$content .= "<!-- HTML Page Title ><!-->" . "\n";
		$content .= "<title>" . $title . "</title>" . "\n";
	// MetaTag <description> **********************************************
	// 
		$content .= "<!-- HTML Standard Description ><!-->" . "\n";
		$content .= '<meta name="description" content="' . $description . '" />' . "\n";
		$content .= "<!-- END MetaTags ><!-->" . "\n";
	//
	//
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
		$fbimage = get_stylesheet_directory_uri() . "/images/favicon/tile.png";
  	}
  }
  return $fbimage;
}
//
// Create the title tag OPTIMIZED ********************************************************************
//
// Eliminat, insertem el Title a childtheme_head_profile per aprofitar les variables
// S'ha comentat la linia de thematic_doctitle(); al head.php
//
//function childtheme_doctitle() {
//add_filter('thematic_doctitle', 'childtheme_doctitle', 11);
//
// Create the meta description OPTIMIZED  ********************************************************************
//
// Eliminat, insertem la MetaDescription a childtheme_head_profile per aprofitar les variables
// S'ha comentat la linia de thematic_doctitle(); al head.php
//
//function childtheme_show_description() {
//add_filter('thematic_create_description', 'childtheme_show_description', 11);
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
            $content = "<meta name=\"robots\" content=\"noindex,follow\" />";
            $content .= "\n";
        }
    return $content;
    }
}
add_filter('thematic_create_robots', 'childtheme_create_robots');
// Neteja
	// clear useless garbage for a polished head ***********************************************************************
	// Neteja el títol 
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
	  // Comentari scripts
	  echo '<!-- Styles & Scripts ><!-->' . "\n";
}
// kills the 4 scripts for the drop downs, combined and reloaded by the script manager (dropdowns-js)
function childtheme_override_head_scripts() {
    // silence
}
//
// Script manager template for registering and enqueuing files ****************************************************************************
//
function childtheme_script_manager() {
	//
	// register script template ( $handle, $src, $deps, $ver, $in_footer ); ************************************************************
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
	//
	// registers validator script, loads in footer -> sense autocomplete
    //wp_register_script('forms-js', get_stylesheet_directory_uri() . '/js/jquery.forms.js', array('jquery'), false, true);
	//
	// Registrem form scripts amb opcions per l'autocomplete
	wp_register_script('forms-js', get_stylesheet_directory_uri() . '/js/jquery.forms.js', array('jquery','jquery-ui-autocomplete'),null,true);
	// Variable per l'Ajax de l'autocomplete
	wp_localize_script( 'forms-js', 'MyAcSearch', array('url' => admin_url( 'admin-ajax.php' )));
	 // registers flexslider styles, local stylesheet path
     //wp_register_style('flexslider-page-css', get_stylesheet_directory_uri() . 'layout/flexslider/flexslider_page.css');
	 // registers flexslider styles, local stylesheet path
    //wp_register_style('flexslider-css', get_stylesheet_directory_uri() . 'layout/flexslider/flexslider.css');
	// registers colorbox script, loads in footer
    //wp_register_script('colorbox-js', get_stylesheet_directory_uri() . '/js/jquery.colorbox-min.js', array('jquery'), false, true);
	// registers flexslider styles, local stylesheet path
    //wp_register_style('colorbox-css', get_stylesheet_directory_uri() . '/css/colorbox.css');
	// registers flexslider styles, local stylesheet path
    //wp_register_style('colorbox-css-posts', get_stylesheet_directory_uri() . '/css/colorbox_posts.css');
	//
	// enqueue the scripts for use in theme ********************************************************************************************
    wp_enqueue_script ('modernizr-js');
    wp_enqueue_script ('fitvids-js');
	wp_enqueue_script ('forms-js');
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
// Fulles d'Estils amb MediaQueries ****************************************************************************
//
function childtheme_styles_manager() {
	//
	// register styles *****************************************************************************************
	wp_register_style('media-orientation', get_stylesheet_directory_uri() . '/css/style_01_mediaqueries_orientation.css', array(), null);
	wp_register_style('media-280', get_stylesheet_directory_uri() . '/css/style_02_mediaqueries_280.css', array(), null);
	wp_register_style('media-480', get_stylesheet_directory_uri() . '/css/style_03_mediaqueries_480.css', array(), null);
	wp_register_style('media-640', get_stylesheet_directory_uri() . '/css/style_04_mediaqueries_640.css', array(), null);
	wp_register_style('media-800', get_stylesheet_directory_uri() . '/css/style_05_mediaqueries_800.css', array(), null);
	wp_register_style('media-960', get_stylesheet_directory_uri() . '/css/style_06_mediaqueries_960.css', array(), null);
	wp_register_style('media-1280', get_stylesheet_directory_uri() . '/css/style_07_mediaqueries_1280.css', array(), null);
	wp_register_style('media-1366', get_stylesheet_directory_uri() . '/css/style_08_mediaqueries_1366.css', array(), null);
	wp_register_style('old-ie', get_stylesheet_directory_uri() . '/css/style_09_oldie.css', array(), null);
	wp_register_style('print', get_stylesheet_directory_uri() . '/css/style_99_print.css', array(), null, 'print');
	//
	// enqueue the styles for use in theme **********************************************************************
	wp_enqueue_style ('media-orientation');
	wp_enqueue_style ('media-280');
	wp_enqueue_style ('media-480');
	wp_enqueue_style ('media-640');
	wp_enqueue_style ('media-800');
	wp_enqueue_style ('media-960');
	wp_enqueue_style ('media-1280');
	wp_enqueue_style ('media-1366');
	// conditionally enqueue the styles for Awesome Fonts ICONS
	$GLOBALS['wp_styles']->add_data('old-ie', 'conditional', 'lte IE 9');
	wp_enqueue_style('old-ie');
	wp_enqueue_style ('print');
}
add_action('wp_enqueue_scripts', 'childtheme_styles_manager',11);
//
// Fonts de Google Fonts + Font Awesome ***********************************************************
//
function childtheme_fonts_manager() {
	//
	// register styles *****************************************************************************************
	// register style, Reset CSS
	wp_register_style('reset-css', get_stylesheet_directory_uri() . '/css/style_00_normalize.css');
	// register style, Google Fonts
	wp_register_style('google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700|Bree+Serif');
	// register style, Awesome Fonts ICONS
    wp_register_style('awesome-css', get_stylesheet_directory_uri() . '/css/font-awesome.min.css');
	// register style, Awesome Fonts ICONS ie7
    wp_register_style('awesome-css-ie7', get_stylesheet_directory_uri() . '/css/font-awesome-ie7.min.css');
	// register style, Colores para la Barra
    wp_register_style('admin_css', get_stylesheet_directory_uri() . '/custom_admin/custom-admin.css');
	//
	// enqueue the styles for use in theme **********************************************************************
	wp_enqueue_style ('reset-css');
	// enqueue the styles for  Google Fonts
	wp_enqueue_style ('google-fonts');
	// enqueue the styles for  Awesome Fonts ICONS
    wp_enqueue_style('awesome-css');
	// conditionally enqueue the styles for Awesome Fonts ICONS
	$GLOBALS['wp_styles']->add_data('awesome-css-ie7', 'conditional', 'lte IE 7');
	wp_enqueue_style('awesome-css-ie7');
	// Estils per a la Barra de l'Admin
	if ( is_user_logged_in() ) {
		wp_enqueue_style('admin_css');
	}
}
add_action('wp_enqueue_scripts', 'childtheme_fonts_manager');
//
// Remove Qtranslate CSS code from <HEAD>
remove_action('wp_head', 'qtrans_header');
//
// ESTILS AL HEADER **************************************************************************************
//
//
//
// SCRIPTS AL HEAD ***************************************************************************************
//
// Script de validate.js (tria a quina pagina s'activa)
function doc_ready() {?>
<script>
jQuery(document).ready(function() {
  //
  // Placeholder for non HTML5
  jQuery(":input[placeholder]").placeholder();
  //
  // Header Searchform Validator
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
  //
  // Autocomplete Searchform
  var acs_action = 'myprefix_autocompletesearch';
  jQuery("#s").autocomplete({
      //delay: 5,
      //position: {of: "#search-outer #search .container" },
      //appendTo: $("#search-box"), 
      source: function(req, response){
          jQuery.getJSON(MyAcSearch.url+'?callback=?&action='+acs_action, req, response);
      },
      select: function(event, ui) {
<?php if (function_exists('qtrans_getLanguage')){ ?>
          var lang = '<?php echo qtrans_getLanguage(); ?>';
          window.location.href=ui.item.link+'?lang='+lang;
<?php }else{ ?>
          window.location.href=ui.item.link;
<?php } ?>
      },
      minLength: 4,
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        return jQuery( "<li>" )
        .append( "<a>" + item.image + "<span class='title'>" + item.label + "</span></a>" )
        .appendTo( ul );
    };
  // Formulario ***************************** 
  // Metodos de validacion
	jQuery.validator.addMethod("phoneES", function(phone_number, element) {
	//phone_number = phone_number.replace(/\s\+\(\)\-/g, "");
		return this.optional(element) || phone_number.match(/^(?:\d[- ().+]*){9,}$/);
	}, "Teléfono incorrecto");
	jQuery.validator.addMethod("dateFormat", function(value, element) {
		return this.optional(element) || /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/.test(value);
      },
	"Formato Incorrecto. Debe ser dd/mm/aa");
  // Form validation
  if (jQuery("#form").length) {
	  jQuery("#form").validate({
		//debug: true,
		// Inici Validacio
		//onkeyup: true,
		// Validador -> Error Message
		errorElement: "span",
		errorPlacement: function(error, element) {
			error.appendTo( element.parent('li').children('label') );
		},
		highlight: function (element, errorClass, validClass) {
			jQuery(element).parent('li')
			.addClass("error").removeClass("valid");
		},
		// Validador -> Classes
		unhighlight: function (element, errorClass, validClass) {
			jQuery(element).parent('li')
			.removeClass("error").addClass("valid");
		},
		//success: function(label) {
			//label.html('<i class="fa fa-check"></i>');
		 //},
		// Funcio abans d'enviar
		submitHandler: function(form) {
		  // Test callback submit
		  //jQuery("#form input[type='submit']").removeClass( "button-primary" ).addClass( "button-sending" ).val('      ');
		  jQuery("#form input[type='submit']").removeClass( "button-primary" ).addClass( "button-sending" );
		  //jQuery("#form_loader").removeClass( "hidden" );
		  // enviamos el form
		  form.submit();
		}
	  })
	  //Normes de Validacio
	  //Nom
	  jQuery( "#fnombre" ).rules( "add", {
		  required: true,
		  minlength: 3,
		  messages: {
			required: '<i class="fa fa-exclamation-triangle"></i>',
			success: "valid",
			minlength: jQuery.format('<i class="fa fa-exclamation-triangle"></i>')
		  }
		});
	  //email
	  jQuery( "#femail" ).rules( "add", {
		  required: true,
		  email: true,
		  messages: {
			required: '<i class="fa fa-exclamation-triangle"></i>',
			success: "valid",
			email: jQuery.format('<i class="fa fa-exclamation-triangle"></i>')
		  }
		});
	  //Tlf
	  jQuery( "#ftelf" ).rules( "add", {
		  required: true,
		  phoneES: true,
		  messages: {
			required: '<i class="fa fa-exclamation-triangle"></i>',
			success: "valid_tlf",
			phoneES: jQuery.format('<i class="fa fa-exclamation-triangle"></i>')
		  }
		});
		if (jQuery("#ffecha").length) {
		  jQuery( "#ffecha" ).rules( "add", {
			  required: false,
			  dateFormat: true,
			  messages: {
				success: "valid",
				dateFormat: jQuery.format('<i class="fa fa-exclamation-triangle"></i>')
			  }
			});
		  jQuery( "#ffecha_opt" ).rules( "add", {
			  required: false,
			  dateFormat: true,
			  messages: {
				success: "valid",
				dateFormat: jQuery.format('<i class="fa fa-exclamation-triangle"></i>')
			  }
			});
		}
	}
<?php if ( is_404() ) { // Pagina 404 ?>
  //
  // Validator Searchform 404
  jQuery("#error404-searchform").validate({
  	rules: {
		s: {'defaultCheck':'',
		required: true
		}
	}
  })
  //
  // Autocomplete Searchform 404
  var acs_action = 'myprefix_autocompletesearch';
  jQuery("#error404-s").autocomplete({
      //delay: 5,
      //position: {of: "#search-outer #search .container" },
      //appendTo: $("#search-box"), 
      source: function(req, response){
          jQuery.getJSON(MyAcSearch.url+'?callback=?&action='+acs_action, req, response);
      },
      select: function(event, ui) {
<?php if (function_exists('qtrans_getLanguage')){ ?>
          var lang = '<?php echo qtrans_getLanguage(); ?>';
          window.location.href=ui.item.link+'?lang='+lang;
<?php }else{ ?>
          window.location.href=ui.item.link;
<?php } ?>
      },
      minLength: 4,
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        return jQuery( "<li>" )
        .append( "<a>" + item.image + "<span class='title'>" + item.label + "</span></a>" )
        .appendTo( ul );
    };
<?php } //Cierre IF 404
//
if ( is_search() ) { // Search No Results ?>
	// Autocomplete Searchform Noresults
  if (jQuery("#noresults-s").length) {
	  jQuery("#noresults-s").autocomplete({
		  //delay: 5,
		  //position: {of: "#search-outer #search .container" },
		  //appendTo: $("#search-box"), 
		  source: function(req, response){
			  jQuery.getJSON(MyAcSearch.url+'?callback=?&action='+acs_action, req, response);
		  },
		  select: function(event, ui) {
	<?php if (function_exists('qtrans_getLanguage')){ ?>
			  var lang = '<?php echo qtrans_getLanguage(); ?>';
			  window.location.href=ui.item.link+'?lang='+lang;
	<?php }else{ ?>
			  window.location.href=ui.item.link;
	<?php } ?>
		  },
		  minLength: 4,
		}).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
			return jQuery( "<li>" )
			.append( "<a>" + item.image + "<span class='title'>" + item.label + "</span></a>" )
			.appendTo( ul );
		};
	} //Cierre if no-results length 
<?php } //Cierre IF Search+
//
if ( is_page(11) ) { // Pagina CONTRATACION -> DatePicker ?>
  // DatePicker Fecha
  jQuery('#ffecha').datetimepicker({
<?php if (function_exists('qtrans_getLanguage')){
	if( qtrans_getLanguage() == 'es' ){ echo "lang:'es',dayOfWeekStart:1,format:'d/m/y',";
	}elseif( qtrans_getLanguage() == 'ca' ){ echo "lang:'cat',dayOfWeekStart:1,format:'d/m/y',";
	}else{ echo "lang:'en',dayOfWeekStart:0,format:'y/m/d',";}
}else{ echo "lang:'es',dayOfWeekStart:1,format:'d/m/y',";}?>
	timepicker:false,
	validateOnBlur:false,
	todayButton:false,
	defaultSelect:false,
	allowBlank:true,
	closeOnDateSelect:true,
	lazyInit:true,
	yearStart: 2015,
	yearEnd: 2020,
	onShow:function(){
		$form_date = jQuery('#ffecha').parent();
		$form_date.addClass('cal_open');
	},
	onClose:function(){
		$form_date = jQuery('#ffecha').parent();
		$form_date.removeClass('cal_open');
	}
  });
  // DatePicker Fecha Optativa
  jQuery('#ffecha_opt').datetimepicker({
<?php if (function_exists('qtrans_getLanguage')){
	if( qtrans_getLanguage() == 'es' ){ echo "lang:'es',dayOfWeekStart:1,format:'d/m/y',";
	}elseif( qtrans_getLanguage() == 'ca' ){ echo "lang:'cat',dayOfWeekStart:1,format:'d/m/y',";
	}else{ echo "lang:'en',dayOfWeekStart:0,format:'y/m/d',";}
}else{ echo "lang:'es',dayOfWeekStart:1,format:'d/m/y',";}?>
	timepicker:false,
	validateOnBlur:false,
	todayButton:false,
	allowBlank:true,
	closeOnDateSelect:true,
	lazyInit:true,
	yearStart: 2015,
	yearEnd: 2020,
	onShow:function(){
		$form_date_opt = jQuery('#ffecha_opt').parent();
		$form_date_opt.addClass('cal_open');
	},
	onClose:function(){
		$form_date_opt = jQuery('#ffecha_opt').parent();
		$form_date_opt.removeClass('cal_open');
	}
  });
<?php } //Cierre IF page ID 11 
if ( is_front_page() ) { // Pagina INICIO -> fLEXSLIDER iMG ANIMATED ?>
	// Animacio imatge HOME
	function animation(){
		// Al iniciar eliminem imatges clonades
		//window.console&&console.log('Animation');
		if (jQuery(".cloned").length) {
			jQuery(".cloned").remove();
		}
		//window.console&&console.log(WidthDiff);
		// Variables
		var flex = jQuery('.flexslider');
		var flexLi = jQuery('#slide_global');
		//window.console&&console.log(WidthDiff);
		var flexWidth = flex.width();
		var flexImg = jQuery('.img_fullback');
		flexImg.css({ "left": "0", "position": "" });
		var flexImgWidth = flexImg.width();
		var flexImgHeight = flexImg.height();
		var WidthDiff = flexImgWidth - flexWidth;
		//flexLi.css( "height", flexImgHeight );
		var cloneflag = false;
		var slideSpeed = 60000;
		jQuery(flexImg).animate({
			left: -(flexImgWidth)
		},//slideSpeed, 'linear',
		{
			duration: slideSpeed,
			easing: 'linear',
			complete: function() {
				flexImg.remove();
				jQuery(".cloned").removeClass("cloned").css( "position", "");
				animation();
			},
			step: function(now, fx) {
				var pos = jQuery(flexImg).position();
				var data = Math.round(pos.left);
				var posData = flexWidth + WidthDiff + data -2;
				//window.console&&console.log(posData);
				//window.console&&console.log(-data);
				//window.console&&console.log(WidthDiff);
				//window.console&&console.log(cloneflag);
				if(-data > WidthDiff){ 
					//window.console&&console.log(cloneflag);
					if (!cloneflag) {
						var cloneimg = jQuery(flexImg).clone();
						cloneimg.addClass("cloned");
						cloneimg.css( "position", "absolute");
						cloneimg.appendTo(flexLi);
						cloneflag = true;
						
					}
				}
				if (jQuery(".cloned").length) {
					jQuery(".cloned").css( "left", posData );
				}
				//window.console&&console.log(data);
			}
		});
	};
	/*function animation(){
		// Al iniciar eliminem imatges clonades
		//window.console&&console.log('Animation');
		if (jQuery(".cloned").length) {
			jQuery(".cloned").remove();
		}
		//window.console&&console.log(WidthDiff);
		// Variables
		var flex = jQuery('.flexslider');
		var flexLi = jQuery('#slide_global');
		//window.console&&console.log(WidthDiff);
		var flexWidth = flex.width();
		var flexImg = jQuery('.img_fullback');
		flexImg.css({ "left": "0", "position": "" });
		var flexImgWidth = flexImg.width();
		var flexImgHeight = flexImg.height();
		var WidthDiff = flexImgWidth - flexWidth;
		//flexLi.css( "height", flexImgHeight );
		var cloneflag = false;
		var slideSpeed = 60000;
		jQuery(flexImg).animate({
			left: -(flexImgWidth)
		},//slideSpeed, 'linear',
		{
			duration: slideSpeed,
			easing: 'linear',
			complete: function() {
				flexImg.remove();
				jQuery(".cloned").removeClass("cloned").css( "position", "");
				animation();
			},
			step: function(now, fx) {
				var pos = jQuery(flexImg).position();
				var data = Math.round(pos.left);
				var posData = flexWidth + WidthDiff + data -2;
				//window.console&&console.log(posData);
				//window.console&&console.log(-data);
				//window.console&&console.log(WidthDiff);
				//window.console&&console.log(cloneflag);
				if(-data > WidthDiff){ 
					//window.console&&console.log(cloneflag);
					if (!cloneflag) {
						var cloneimg = jQuery(flexImg).clone();
						cloneimg.addClass("cloned");
						cloneimg.css( "position", "absolute");
						cloneimg.appendTo(flexLi);
						cloneflag = true;
						
					}
				}
				if (jQuery(".cloned").length) {
					jQuery(".cloned").css( "left", posData );
				}
				//window.console&&console.log(data);
			}
		});
	};*/
	animation();
	// Responsive
	var resizeTimer;
	jQuery(window).resize(function(){
		if (resizeTimer) clearTimeout(resizeTimer);
		resizeTimer = setTimeout(function(){
			var flexImg = jQuery('.img_fullback');
			flexImg.stop(true);
			animation();
			//function animation(){}
		}, 300)
	});
<?php } //Cierre IF page HOME ?>
	jQuery('#to_top').on('click', function (e) {
        e.preventDefault();
        jQuery(document).off("scroll");
        //Target
        $target = jQuery('#wrapper');
		$target_offset = $target.offset().top;
        jQuery('html, body').stop().animate({
            'scrollTop':$target_offset
        }, 1200, 'swing');
    });
});
</script>
<?php
}
add_action('wp_head', 'doc_ready');
//
// *****************************************************************************************************************************
// </HEAD>**********************************************************************************************************************