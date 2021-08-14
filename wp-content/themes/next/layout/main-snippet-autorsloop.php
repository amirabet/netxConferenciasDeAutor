<?php
/**********************************************************************************************
 * Plantilla de Layout para Fragmento de Pagina
 * Muestra un loop de Autores Destacados
 * Se llama desde varias paginas y presenta distintos tipos de info segun if
**********************************************************************************************
VERSION 0.1
*********************************************************************************************
TO DO:
*********************************************************************************************/
//
// Variables Idioma ***********************************
if (function_exists('qtrans_getLanguage')){ 
	if( qtrans_getLanguage() == 'es' ){
		$qlang = 'es/';
	}elseif( qtrans_getLanguage() == 'ca' ){
		$qlang = 'ca/';
	}else{
		$qlang = 'en/';
	}
}else{//no qTranslate
	$qlang = '';
}
/*
<article id="autorsloop">
    <header><h1>Autorsloop</h1></header>
    <section>
    </section>
    <footer>
    </footer>
</article>
*/?>