<?php
/**
 * COOKIES: Muestra el aviso de cookies
 * Funciona con mu-plugin custom admin legal
 * 
 * 
 * 

*/
?> 
<?php  // COOKIES ************************************************************************
//
// Crea i modifica les cookies
function checkCookie($check = 1){
	if($check == 1){//Modo producción
		//Si no existe la cookie
		if(!isset($_COOKIE['i_cookies'])){
			//Creamos la cookie de primera visita
			setcookie("i_cookies", 1, time() + 60 * 5);
		//Si es la segunda visita
		}elseif($_COOKIE['i_cookies'] == 1){
			//Le indicamos que es la segunda visita
			setcookie("i_cookies", 2, time() + 60 * 60 * 24 * 365);
		}
	}else{//modo trabajo
		//Le indicamos que no queremos cookies
		setcookie("i_cookies", 1, 0);
	}
}
add_action( 'init', 'checkCookie');
//
// plugin
$cookie_array = get_option('legal_cookies');
if ( isset( $cookie_array['aviso']) && $cookie_array['aviso'] == 1){
	///
	// Cookie HTML
	function cookieAlert(){
		$web_array = get_option('legal_web');
		$cookie_array = get_option('legal_cookies');
		if ( isset($web_array['id_legal']) && $web_array['id_legal'] != ''){ $id_legal = $web_array['id_legal'];}
		// VARIABLES
		//Enlace URL info
		$cookie_url = $web_array['url_legal'];
		$cookie_url = get_site_url() . $cookie_url;
		// Texto Enlace
		$cookie_link_txt = $cookie_array['link'];
		// Enlace
		if(!is_page($id_legal)){
			$cookie_link = '<br/ ><a href="' . $cookie_url . '#cookies" target="_self" title="' . $cookie_link_txt . '">' . $cookie_link_txt . '</a>';
		}else{
			$cookie_link = '<br/ ><span>ACEPTAR</span>';
		}
	// Span no Enlace Legal		// Text
	$cookie_txt = $cookie_array['txt'];
	$cookie_txt = $cookie_txt . $cookie_link;
		echo '<section id="cookie_warning" class="cookie_spacer"><article class="wrap_content">' . $cookie_txt . '</article><span class="clearboth"></span></section><span class="cookie_spacer"></span>';
	}
	//Si no se ha aceptado la cookie
	if(!isset($_COOKIE['i_cookies']) || $_COOKIE['i_cookies'] != 2){
		//Mostramos la alerta
		cookieAlert();
	}
// Test CookieAlert echo '<section id="cookie_warning" class="cookie_spacer"><article class="wrap_content">' . $cookie_txt . '</article></section><span class="cookie_spacer"></span>';
} // fINAL IF IS SET COOKIES ALERT
?>