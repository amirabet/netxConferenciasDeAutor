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
include_once(get_stylesheet_directory() . '/custom_admin/custom_shortcodes.php');
//
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
	} elseif (is_single() && !is_singular( 'news' ) && !is_attachment() && !is_archive() && !is_author()) {
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
	// registers validator script, loads in footer
    wp_register_script('forms-js', get_stylesheet_directory_uri() . '/js/jquery.forms.js', array('jquery'), false, true);
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
// Fonts de Google Fonts + Font Awesome ***********************************************************
//
function childtheme_fonts_manager() {
	//
	// register styles *****************************************************************************************
	wp_register_style('google-fonts', 'http://fonts.googleapis.com/css?family=Arvo:400', array(), null, true);
	// register style, Awesome Fonts ICONS
    wp_register_style('awesome-css', get_stylesheet_directory_uri() . '/css/font-awesome.min.css');
	// register style, Awesome Fonts ICONS ie7
    //wp_register_style('awesome-css-ie7', get_stylesheet_directory_uri() . '/css/font-awesome-ie7.min.css');
	// register style, Colores para la Barra
    wp_register_style('admin_css', get_stylesheet_directory_uri() . '/custom_admin/custom-admin.css');
	//
	// enqueue the styles for use in theme **********************************************************************
	wp_enqueue_style ('google-fonts');
	// enqueue the styles for  Awesome Fonts ICONS
    wp_enqueue_style('awesome-css');
	// enqueue the styles for  Awesome Fonts ICONS
    //wp_enqueue_style('awesome-css-ie7');
	// conditionally enqueue the styles fo Awesome Fonts ICONS
	//global $wp_styles;
	//$wp_styles->add_data('awesome-css-ie7', 'conditional', 'lte IE 7');
	// Estils per a la Barra de l'Admin
	if ( is_user_logged_in() ) {
		wp_enqueue_style('admin_css');
	}
}
add_action('wp_enqueue_scripts', 'childtheme_fonts_manager');
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
    submitHandler: function(form) {
	  // Test callback submit
      jQuery("#form input[type='submit']").removeClass( "bluebutton" ).addClass( "sendingbutton" ).val('    ');
      jQuery("#form_loader").removeClass( "hidden" );
	  // enviamos el form
      form.submit();
    }
  })
  // Placeholder for non HTML5
  jQuery(":input[placeholder]").placeholder();
});
</script>
<?php }else{ //FORM FOOTER ?>
<script>
jQuery(document).ready(function() {
  jQuery("#form").validate({
    submitHandler: function(form) {
	  // Test callback submit
      jQuery("#form input[type='submit']").removeClass( "bluebutton" ).addClass( "sendingbutton" ).val('    ');
      jQuery("#form_loader").removeClass( "hidden" );
	  // enviamos el form
      form.submit();
    }
  })
  // Placeholder for non HTML5
  jQuery(":input[placeholder]").placeholder();
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