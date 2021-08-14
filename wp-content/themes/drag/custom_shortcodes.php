<?php
//[url_lang] Devuelve la URL global + carpeta idioma
function url_lang_func($atts, $content=null){
	$blogurl = get_bloginfo('url');
	$lang = qtrans_getLanguage();
	$urlbylang = ( $blogurl . ('/') . $lang );
	return $urlbylang;
}
add_shortcode( 'url_lang', 'url_lang_func' );
?>
<?php
//[socialmedia] Devuelve icono Socialmedia + URL
function socialmedia_iconlist($type){
	extract(shortcode_atts(array(
        'type' => 'type'
    ), $type));
     
    // Tipo de red social
    switch ($type) {
        case 'rss':
			//URL de los Feeds
			$blogurl = get_bloginfo('url');
			$lang = qtrans_getLanguage();
			$urlbylang = $blogurl . ('/') . $lang;
			$url_rss_lang = ('<a href="' . $urlbylang . '/feed/" class="socialmedia_rss"><i class="icon-rss-sign"></i><span>RSS</span></a>');
            return $url_rss_lang;
            break;
		case 'linkedin':
            //URL de LinkedIn
			$lin_url_cliente = ('');
			$lin_url = ('<a href="http://www.linkedin.com/' . $lin_url_cliente . '" target="_blank" class="socialmedia_lin"><i class="icon-linkedin-sign"></i><span>Linked In</span></a>');
			//montamos la funcion
			return $lin_url;
            break;
		case 'facebook':
            //URL de Facebook
			$fb_url_cliente = ('drag.policia.local');
			$fb_url = ('<a href="http://www.facebook.com/' . $fb_url_cliente . '" target="_blank" class="socialmedia_fb"><i class="icon-facebook-sign"></i><span>Facebook</span></a>');
			//montamos la funcion
			return $fb_url;
            break;
		case 'twitter':
            //URL de Twitter
			$tw_url_cliente = ('dragdroid');
			$tw_url = ('<a href="http://www.twitter.com/' . $tw_url_cliente . '" target="_blank" class="socialmedia_tw"><i class="icon-twitter-sign"></i><span>Twitter</span></a>');
			//montamos la funcion
			return $tw_url;
            break;
		case 'gplus':
            //URL de GPlus
			$gplus_url_cliente = ('0/116959801615366824799/');
			$gplus_url = ('<a href="https://plus.google.com/' . $gplus_url_cliente . '" target="_blank" class="socialmedia_gplus"><i class="icon-google-plus-sign"></i><span>Google Plus</a>');
			//montamos la funcion
			return $gplus_url;
            break;
    }
}
add_shortcode( 'socialmedia', 'socialmedia_iconlist' );
?>
<?php
//Activamos los shortcodes
//[url_lang]
add_action( 'init', 'url_lang_func');

//[socialmedia]
add_action( 'init', 'socialmedia_iconlist');

//Activamos los shortcodes para Widgets de HTML
add_filter('widget_text', 'do_shortcode'); 
?>
