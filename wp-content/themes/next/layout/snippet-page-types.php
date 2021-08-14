<?php
	// FRONT PAGE ***************** (ID = 5)
	if (is_front_page()) {
	// HOME PAGE***************** (ID = 7) [AUTORES]
	} elseif (is_home()){
	// PAGE ESPECÍFICA ***************** (ID = 11) [CONTRATACIÓN]
	} elseif (is_page(11)) { 
	// PAGE *****************  (amb l'array descartem les pàgines especifiques)
	} elseif (is_page() && !is_page(array(5,7,11))) {
	// ARCHIVE ***************** 
	} elseif (is_archive() && !is_author()) { 
		// ARCHIVO DE AUTORES**************
		if (!is_post_type_archive('news')){
			// CATEGORY ******************* 
			if (is_category()) { 
			// TAG ************************ 
			} elseif (is_tag()) { 
			// DATE ************************ 
			} elseif ( is_date() ){
			// CUSTOM POST TAGS NEWS  ******************* 
			} elseif (is_tax()) { 
			}
		// ARCHIVO DE NOTICIAS************** (NEWS) 
		}else{
			// DATE ************************ 
			if ( is_date() ){
			}else{ //Página FRONTPAGE de Noticias [ID = 9]
			}
		}
	// POST ***************** (AUTORES)
	} elseif (is_single() && !is_singular( 'news' ) && !is_attachment() && !is_archive()) {
	// POST ***************** (TYPE = NEWS)
	} elseif (is_singular( 'news' )) {
	// AUTOR de POSTS *****************
	}elseif (is_author()) {
	// SEARCH RESULTS ***************** 
	}elseif (is_search()) {
	//ATTACHMENT *********************
	}elseif (is_attachment()) {
	// PAGINA 404
	}elseif (is_404()) {
	// GENERAL ***************** 
	} else {
	}
?>
