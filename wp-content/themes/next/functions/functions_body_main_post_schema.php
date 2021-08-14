<?php
//****************************************************************************************/
//
//  Child Theme NEXT Conferencias de Autor Functions
//  
//  FUNCTIONS > BODY > MAIN > POST --> Controla l'output dels elements del POST
//
//********************************************************************************************/
//
// POST OUTPUT GLOBAL **************************************************************
// 
/*function childtheme_override_single_post() {
}// end single_post*/
//
// POST OUTPUT HEADER **************************************************************
// 
// Elimina info postmeta header-post (date and author)
function childtheme_override_postheader_postmeta() {
    // silence!
}
// PostHeader 
function childtheme_override_postheader(){
	$posttitle = "\n\n\t\t\t\t\t";
	if (is_attachment()) {
		global $post;
		$posttitle .= '<h1 class="entry-title post_section">';
		$posttitle .= get_the_title();
		$posttitle .= '</h1>';
	}elseif (is_single()) { // TO DO: POST TYPES
		global $post;
		echo '<header class="entry-header">';
		if ( has_post_thumbnail() ) {
			echo the_post_thumbnail('autor');
		}else{
			echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/autor_nothumb.jpg" alt="' . get_the_title() . '"/>';
		}
		echo '<h1 class="entry-title post_section">' . get_the_title() . '</h1>';
		$eslogan = get_field('eslogan_autor', get_the_ID());
		if (!empty($eslogan)){echo '<em>' . $eslogan . '</em>';}
		/*Links*/
		$link_blog = get_field('autor_blog', get_the_ID());
		$link_facebook = get_field('autor_facebook', get_the_ID());
		$link_twitter = get_field('autor_twitter', get_the_ID());
		$link_linkedin = get_field('autor_linkedin', get_the_ID());
		$link_youtube = get_field('autor_youtube', get_the_ID());
		$link_googleplus = get_field('autor_googleplus', get_the_ID());
		$link_instagram = get_field('autor_instagram', get_the_ID());
		$link_pinterest = get_field('autor_pinterest', get_the_ID());
		// Variables finals
		$links_autor = '';
		if (!empty($link_blog)){ $links_autor .= '<a href="' . $link_blog . '" target="_blank" title="Blog de ' . get_the_title() . '"  ><span class="fa fa-globe">Blog</a>';}
		if (!empty($link_facebook)){$links_autor .= '<a href="' . $link_facebook . '" target="_blank" title="' . get_the_title() . ' en Facebook"  ><span class="fa fa-facebook">Facebook</a>';}
		if (!empty($link_twitter)){$links_autor .= '<a href="' . $link_twitter . '" target="_blank" title="' . get_the_title() . ' en Twitter"  ><span class="fa fa-twitter">Twitter</a>';}
		if (!empty($link_linkedin)){$links_autor .= '<a href="' . $link_linkedin . '" target="_blank" title="' . get_the_title() . ' en LinkedIn"  ><span class="fa fa-linkedin">LinkedIn</a>';}
		if (!empty($link_youtube)){$links_autor .= '<a href="' . $link_youtube . '" target="_blank" title="' . get_the_title() . ' en Youtube"  ><span class="fa fa-youtube">Youtube</a>';}
		if (!empty($link_googleplus)){$links_autor .= '<a href="' . $link_googleplus . '" target="_blank" title="' . get_the_title() . ' en Google +"  ><span class="fa fa-google-plus">Google +</a>';}
		if (!empty($link_instagram)){$links_autor .= '<a href="' . $link_googleplus . '" target="_blank" title="' . get_the_title() . ' en Instagram"  ><span class="fa fa-instagram">Instagram</a>';}
		if (!empty($link_pinterest)){$links_autor .= '<a href="' . $link_pinterest . '" target="_blank" title="' . get_the_title() . ' en Pinterest"  ><span class="fa fa-pinterest">Pinterest</a>';}
		/*Output Links*/
		if (!empty($links_autor)){	
			echo '<div class="entry-header-links">' . $links_autor . '</div>';
		}
		/* TAGS */
		$tag_output = '<p class="entry-header-tags">Especialista en ';
		echo $tag_output ;
		$posttags = get_the_tags();
		if ($posttags) {
			$i = 0;
			foreach($posttags as $tag) {
				if ($i != 0) { echo ', ';}
				echo ' <a href="' . get_tag_link($tag->term_id) . '" target="_self" title="' . $tag->name . '">' . $tag->name . '</a>'; 
				$i++;
			}
		}
		echo '.</p>';
		/*Cierre*/
		echo '</header>';
		
	}
	/*} elseif (is_page()) { 
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
	*/
	
}
// Afegim elements al cos del post
function add_stuff_to_content($post) {
	if ( is_single() ){
		//
		// Llibres
		//01
		$libro01_tit = get_field('libro_1', get_the_ID());
		$libro01_ed = get_field('editorial_libro1', get_the_ID());
		$libro01_url = get_field('url_libro_1', get_the_ID());
		$libro01_portada = get_field('portada_libro_1', get_the_ID());
		if ($libro01_portada == 'enlace'){
			$libro01_portada_url = get_field('portada_libro_1_url', get_the_ID());
		}else{
			$libro01_portada_object = get_field('portada_libro_1_imagen', get_the_ID());
			$libro01_portada_url = $libro01_portada_object['url'];
		}
		if (!empty($libro01_tit)){ $libro_01 = '<a href="' . $libro01_url . '" target="_blank" title="' . $libro01_tit . '"  class="book_link"><img src="' . $libro01_portada_url . '" alt="' . $libro01_tit . '"><em>' . $libro01_tit . '</em>' . $libro01_ed . '</a>';}
		//02
		$libro02_tit = get_field('libro_2', get_the_ID());
		$libro02_ed = get_field('editorial_libro_2', get_the_ID());
		$libro02_url = get_field('url_libro_2', get_the_ID());
		$libro02_portada = get_field('portada_libro_2', get_the_ID());
		if ($libro02_portada == 'enlace'){
			$libro02_portada_url = get_field('portada_libro_2_url', get_the_ID());
		}else{
			$libro02_portada_object = get_field('portada_libro_2_imagen', get_the_ID());
			$libro02_portada_url = $libro02_portada_object['url'];
		}
		if (!empty($libro02_tit)){ $libro_02 = '<a href="' . $libro02_url . '" target="_blank" title="' . $libro02_tit . '"  class="book_link"><img src="' . $libro02_portada_url . '" alt="' . $libro02_tit . '"><em>' . $libro02_tit . '</em>' . $libro02_ed . '</a>';}
		//03
		$libro03_tit = get_field('libro_3', get_the_ID());
		$libro03_ed = get_field('editorial_libro_3', get_the_ID());
		$libro03_url = get_field('url_libro_3', get_the_ID());
		$libro03_portada = get_field('portada_libro_3', get_the_ID());
		if ($libro03_portada == 'enlace'){
			$libro03_portada_url = get_field('portada_libro_3_url', get_the_ID());
		}else{
			$libro03_portada_object = get_field('portada_libro_3_imagen', get_the_ID());
			$libro03_portada_url = $libro03_portada_object['url'];
		}
		if (!empty($libro03_tit)){ $libro_03 = '<a href="' . $libro03_url . '" target="_blank" title="' . $libro03_tit . '"  class="book_link"><img src="' . $libro03_portada_url . '" alt="' . $libro03_tit . '"><em>' . $libro03_tit . '</em>' . $libro03_ed . '</a>';}
		// Variable Global Libros
		if (!empty($libro_01) || !empty($libro_02) || !empty($libro_03)){
			$libros_autor = '';
			if (!empty($libro_01)){$libros_autor .= $libro_01;}
			if (!empty($libro_02)){$libros_autor .= $libro_02;}
			if (!empty($libro_03)){$libros_autor .= $libro_03;}
			$libros = '<aside class="entry-wysiwyg-books">' . $libros_autor . '</aside>';
		}
		//
		// Videos
		//01
		$video_01_url = get_field('video_1', get_the_ID());
		$video_01_embebible = get_field('video_1_embebible', get_the_ID());
		if ($video_01_embebible == 'no'){
			$video_01_img = get_field('imagen_video_1', get_the_ID());
			if (empty($video_01_img)){ $video_01_img = get_bloginfo( 'stylesheet_directory' ) . '/images/layout/video_nothumb.jpg';
			}else{
				$video_01_img = $video_01_img['url'];
			}
		}else{
			// Get image form video URL
			$url = $video_01_url;
			$urls = parse_url($url);
			// Vimeo
			if ($urls['host'] == 'vimeo.com' || $urls['host'] == 'player.vimeo.com') :
				$url = str_replace('http://vimeo.com/', 'http://vimeo.com/api/v2/video/', $url) . '.php';
				$html_returned = unserialize(file_get_contents($url));
				$video_01_img = $html_returned[0]['thumbnail_medium'];
			// Youtube
			//Expect the URL to be http://youtu.be/abcd, where abcd is the video ID
			elseif ($urls['host'] == 'youtu.be') :
				$video_01_img_url = ltrim($urls['path'],'/');
				$video_01_img = 'http://i1.ytimg.com/vi/' . $video_01_img_url . '/mqdefault.jpg';
			//Expect the URL to be http://www.youtube.com/embed/abcd
			elseif (strpos($urls['path'],'embed') == 1) :
				$video_01_img_url = end(explode('/',$urls['path']));
				$video_01_img = 'http://i1.ytimg.com/vi/' . $video_01_img_url . '/mqdefault.jpg';
			//Expect the URL to be abcd only
			elseif (strpos($url,'/') === false):
				$video_01_img_url = $url;
				$video_01_img = 'http://i1.ytimg.com/vi/' . $video_01_img_url . '/mqdefault.jpg';
			//Expect the URL to be http://www.youtube.com/watch?v=abcd
			else :
				parse_str($urls['query']);
				$video_01_img_url = $v;
				$video_01_img = 'http://i1.ytimg.com/vi/' . $video_01_img_url . '/mqdefault.jpg';
			endif;
			if (empty($video_01_img)){
				$video_01_img = get_bloginfo( 'stylesheet_directory' ) . '/images/layout/video_nothumb.jpg';
			}
		}
		if (!empty($video_01_url)){ $video_01 = '<a href="' . $video_01_url . '" target="_blank" class="video_link colorbox"><img src="' . $video_01_img . '" alt="' . get_the_title() . '"></a>';}
		//02
		$video_02_url = get_field('video_2', get_the_ID());
		$video_02_embebible = get_field('video_2_embebible', get_the_ID());
		if ($video_02_embebible == 'no'){
			$video_02_img = get_field('imagen_video_2', get_the_ID());
			if (empty($video_02_img)){ $video_02_img = get_bloginfo( 'stylesheet_directory' ) . '/images/layout/video_nothumb.jpg';
			}else{
				$video_02_img = $video_02_img['url'];
			}
		}else{
			// Get image form video URL
			$url = $video_02_url;
			$urls = parse_url($url);
			// Vimeo
			if ($urls['host'] == 'vimeo.com' || $urls['host'] == 'player.vimeo.com') :
				$url = str_replace('http://vimeo.com/', 'http://vimeo.com/api/v2/video/', $url) . '.php';
				$html_returned = unserialize(file_get_contents($url));
				$video_02_img = $html_returned[0]['thumbnail_medium'];
			// Youtube
			//Expect the URL to be http://youtu.be/abcd, where abcd is the video ID
			elseif ($urls['host'] == 'youtu.be') :
				$video_02_img_url = ltrim($urls['path'],'/');
				$video_02_img = 'http://i1.ytimg.com/vi/' . $video_02_img_url . '/mqdefault.jpg';
			//Expect the URL to be http://www.youtube.com/embed/abcd
			elseif (strpos($urls['path'],'embed') == 1) :
				$video_02_img_url = end(explode('/',$urls['path']));
				$video_02_img = 'http://i1.ytimg.com/vi/' . $video_02_img_url . '/mqdefault.jpg';
			//Expect the URL to be abcd only
			elseif (strpos($url,'/') === false):
				$video_02_img_url = $url;
				$video_02_img = 'http://i1.ytimg.com/vi/' . $video_02_img_url . '/mqdefault.jpg';
			//Expect the URL to be http://www.youtube.com/watch?v=abcd
			else :
				parse_str($urls['query']);
				$video_02_img_url = $v;
				$video_02_img = 'http://i1.ytimg.com/vi/' . $video_02_img_url . '/mqdefault.jpg';
			endif;
			if (empty($video_02_img)){
				$video_02_img = get_bloginfo( 'stylesheet_directory' ) . '/images/layout/video_nothumb.jpg';
			}
		}
		if (!empty($video_02_url)){ $video_02 = '<a href="' . $video_02_url . '" target="_blank" class="video_link colorbox"><img src="' . $video_02_img . '" alt="' . get_the_title() . '"></a>';}
		//03
		$video_03_url = get_field('video_3', get_the_ID());
		$video_03_embebible = get_field('video_3_embebible', get_the_ID());
		if ($video_03_embebible == 'no'){
			$video_03_img = get_field('imagen_video_3', get_the_ID());
			if (empty($video_03_img)){ $video_03_img = get_bloginfo( 'stylesheet_directory' ) . '/images/layout/video_nothumb.jpg';
			}else{
				$video_03_img = $video_03_img['url'];
			}
		}else{
			/// Get image form video URL
			$url = $video_03_url;
			$urls = parse_url($url);
			// Vimeo
			if ($urls['host'] == 'vimeo.com' || $urls['host'] == 'player.vimeo.com') :
				$url = str_replace('http://vimeo.com/', 'http://vimeo.com/api/v2/video/', $url) . '.php';
				$html_returned = unserialize(file_get_contents($url));
				$video_03_img = $html_returned[0]['thumbnail_medium'];
			// Youtube
			//Expect the URL to be http://youtu.be/abcd, where abcd is the video ID
			elseif ($urls['host'] == 'youtu.be') :
				$video_03_img_url = ltrim($urls['path'],'/');
				$video_03_img = 'http://i1.ytimg.com/vi/' . $video_03_img_url . '/mqdefault.jpg';
			//Expect the URL to be http://www.youtube.com/embed/abcd
			elseif (strpos($urls['path'],'embed') == 1) :
				$video_03_img_url = end(explode('/',$urls['path']));
				$video_03_img = 'http://i1.ytimg.com/vi/' . $video_03_img_url . '/mqdefault.jpg';
			//Expect the URL to be abcd only
			elseif (strpos($url,'/') === false):
				$video_03_img_url = $url;
				$video_03_img = 'http://i1.ytimg.com/vi/' . $video_03_img_url . '/mqdefault.jpg';
			//Expect the URL to be http://www.youtube.com/watch?v=abcd
			else :
				parse_str($urls['query']);
				$video_03_img_url = $v;
				$video_03_img = 'http://i1.ytimg.com/vi/' . $video_03_img_url . '/mqdefault.jpg';
			endif;
			if (empty($video_03_img)){	$video_03_img = get_bloginfo( 'stylesheet_directory' ) . '/images/layout/video_nothumb.jpg';}
		}
		if (!empty($video_03_url)){ $video_03 = '<a href="' . $video_03_url . '" target="_blank" class="video_link colorbox"><img src="' . $video_03_img . '" alt="' . get_the_title() . '"></a>';}
		// Variable Global Videos
		if (!empty($video_01) || !empty($video_02) || !empty($video_03)){
			$videos_autor = '';
			if (!empty($video_01)){$videos_autor .= $video_01;}
			if (!empty($video_02)){$videos_autor .= $video_02;}
			if (!empty($video_03)){$videos_autor .= $video_03;}
			$videos = '<footer class="entry-wysiwyg-videos">' . $videos_autor . '</footer>';
		}
		//
		// Output Final
		if (!is_attachment()){
			$postwrapper = '<section class="entry-wysiwyg post_section">';
			if ( has_excerpt() ) {
				$post_excerpt = '<h2>' . get_the_excerpt() . '</h2>';
			} else {
				$post_excerpt = '';
			}
			$post = $postwrapper . $post_excerpt . $post . '</section>' . $libros . $videos;
		}else{
			$post = $post;
		}
		
	}else{
		$post = '<section class="entry-wysiwyg post_section">' . $post . '</section>' ;
	}
	return $post;
}
add_filter('the_content' , 'add_stuff_to_content');
// canvi del peu de POST
function childtheme_override_postfooter() {
	//
	// Compartir TODO: vA AL FOOTER!!
	$browser_title_encoded = urlencode( trim( wp_title( '', false, 'right' ) ) );
	$page_title_encoded = urlencode( get_the_title() );
	$page_url_encoded = urlencode( get_permalink() );
	// Botó Compartir 
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$thematic_postfooter_share = "COMPARTE";
		}elseif( qtrans_getLanguage() == 'ca' ){
			$thematic_postfooter_share = "COMPARTEIX";
		}else {
			$thematic_postfooter_share = "SHARE";
		} 
	}else {
		$thematic_postfooter_share = "COMPARTE";
	}
	$sharebutton = '<ul class="sub-sharing">';
	$sharebutton .= '<li class="share_bttn" id="share_bttn">' . $thematic_postfooter_share . ' <i class="fa fa-caret-right"></i></li>';
	$sharebutton .= '<li id="share_php">';
	//Facebook
	$sharebutton .= '<a href="http://www.facebook.com/sharer.php?u=' . $page_url_encoded . '&amp;t=' . $browser_title_encoded . '" target="_blank" title="' . $thematic_postfooter_share . ' ' . get_the_title() . '"><i class="fa fa-facebook"></i> Facebook </a>';
	//Twitter
	$sharebutton .= '<a href="http://twitter.com/share?text=' . $page_title_encoded . '&amp;url=' . $page_url_encoded . '" target="_blank" title="' . $thematic_postfooter_share . ' ' . get_the_title() . ' "><i class="fa fa-twitter"></i> Twitter </a>';
	//Google+
	$sharebutton .= '<a href="http://plus.google.com/share?url=' . $page_url_encoded . '" target="_blank" title="' . $thematic_postfooter_share . ' ' . get_the_title() . ' "><i class="fa fa-google-plus"></i> Google+ </a>';
	//LinkedIn
	$sharebutton .= '<a href="http://www.linkedin.com/shareArticle?mini=true&url=' . $page_url_encoded . '&title=' . $page_title_encoded . '" target="_blank" title="' . $thematic_postfooter_share . '  ' . get_the_title() . ' "><i class="fa fa-linkedin"></i> LinkedIn </a>';
	$sharebutton .= '</li>';
	$sharebutton .= '</ul>';
	echo '<footer>';
	echo $sharebutton;
	echo '</footer>';
}
//
// POST OUTPUT FOOTER **************************************************************
//*/
