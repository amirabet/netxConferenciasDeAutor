<?php
/**
 * Ultimas Noticias : Muestra las utlimas N entradas
 * Esto es un SNIPPET para incluir dentro de una plantilla de página de WP
 * 

*/
?>
<?php
if ( (is_front_page()) || (is_page() && ($post->post_parent==$pageID)) ) {?>
    <article class="box box_nopad col1">
<?php }else{ ?>
	<article class="box box_nopad col2">
<?php }?>
        <header class="main_header">
            <h4>CONSEJOS</h4>
        </header>
        <section class="box fl linktopage">
            <p>Muy pronto podrás disfrutar de los mejores consejos para decorar tu hogar y convertirlo en el lugar de tus sueños.</p>
            <p>Síguenos también en nuestra <a href="https://www.facebook.com/ComercialRomera" target="_blank">página de Facebook</a> para recibir las últimas novedades en decoración.</p>
      </section>
    </article>