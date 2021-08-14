<?php
// FRONT PAGE ***************** (ID = 5)
if (is_front_page()) { $open_above = '';
	$open_above = '';
// HOME PAGE***************** (ID = 7) [AUTORES]
} elseif (is_home()){ $open_above = '';
// PAGE ***************** 
} elseif (is_page()) { $open_above = '';
// ARCHIVE ***************** 
} elseif (is_archive() && !is_author()) { 
	// ARCHIVO DE AUTORES**************
	if (!is_post_type_archive('news')){
		// CATEGORY ******************* 
		if (is_category()) { $open_above = '';
		// TAG ************************ 
		} elseif (is_tag()) { $open_above = '';
		// DATE ************************ 
		} elseif ( is_date() ){$open_above = '';
		// CUSTOM POST TAGS NEWS  ******************* 
		}elseif (is_tax()) { $open_above = '';
		}
	// ARCHIVO DE NOTICIAS************** (NEWS) 
	}else{
		// DATE ************************ 
		if ( is_date() ){$open_above = '';
		}else{ $open_above = '';//Página de Noticias
		}
	}
// POST ***************** (AUTORES)
} elseif (is_single() && !is_singular( 'news' ) && !is_singular( 'tribe_events' ) && !is_attachment() && !is_archive() && !is_author()) {
	$open_above = '';
// POST ***************** (TYPE = NEWS)
} elseif (is_singular( 'news' )) {
	$open_above = '';
// POST TYPE EVENTS
} elseif (is_singular( 'tribe_events' )) {
	$open_above = '';
// pagina eventos mes
}elseif( tribe_is_month()) { // Month View Page
	$open_above = '';
// PAGINA de AUTOR
}elseif (is_author()) {
	$open_above = '';
// SEARCH RESULTS ***************** 
}elseif (is_search()) {
	$open_above = '';
//ATTACHMENT
}elseif (is_attachment()) {
	$open_above = '';
// PAGINA 404
}elseif (is_404()) {
	$open_above = '';
// GENERAL ***************** 
} else {
	$open_above = '';
}
?>