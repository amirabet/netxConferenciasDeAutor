<?php 
/****************************************************************

Preguntes freqüents del WordPress Admin + INDEX de Continguts 

****************************************************************/
?>
<!-- FAQ -->
<div class="metabox-holder no-widget" id="faq-box">
    <div class="postbox closed">
        <div class="handlediv" title="Click to toggle."><br></div>
        <h3 class="hndle">
        	<span>
            <?php if( qtrans_getLanguage() == 'es' ){	?>
				Preguntas Frecuentes
				<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Preguntes Freqüents
				<?php }else{ //english ?>
				FAQ
				<?php } ?>
            </span>
        </h3>
        <div class="inside">
          <a title="help_faq" id="help_faq"></a>
          <ul>
          	<?php if( qtrans_getLanguage() == 'es' ){	?>
            <li><i class="icon-question-sign"></i>&nbsp;&nbsp;<a href="#help_posts_new"><b>Publicar una nueva Entrada</b></a></li>
            <li><i class="icon-question-sign"></i>&nbsp;&nbsp;<a href="#help_posts_anatomia"><b>Partes de la Noticia</b></a></li>
            <li><i class="icon-question-sign"></i>&nbsp;&nbsp;<a href="#help_posts_new_featuredimg"><b>Buscar una Imagen para "Imagen Destacada"</b></a></li>
            <li><i class="icon-question-sign"></i>&nbsp;&nbsp;<a href="#help_posts_sticky"><b>Destacar una entrada en la portada de la Página</b></a></li>
            <li><i class="icon-question-sign"></i>&nbsp;&nbsp;<a href="#help_posts_new_wysiwyg_media"><b>Insertar una imagen en la Entrada</b></a></li>
            <li><i class="icon-question-sign"></i>&nbsp;&nbsp;<a href="#help_posts_new_wysiwyg_media_gallery"><b>Crear una Galería con varias Imágenes</b></a></li>
            <li><i class="icon-question-sign"></i>&nbsp;&nbsp;<a href="#help_posts_categories"><b>Editar las Categorías</b></a></li>
            <li><i class="icon-question-sign"></i>&nbsp;&nbsp;<a href="#help_posts_tags"><b>Editar las Etiquetas</b></a></li>
            <li><i class="icon-question-sign"></i>&nbsp;&nbsp;<a href="#help_posts_posts-page"><b>Diferencias entre Posts (Noticias / Entradas) y Páginas</b></a></li>
            <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
            <li><i class="icon-question-sign"></i>&nbsp;&nbsp;<a href="#help_posts_new"><b>Publicar una nova Entrada</b></a></li>
            <li><i class="icon-question-sign"></i>&nbsp;&nbsp;<a href="#help_posts_anatomia"><b>Parts de la Notícia</b></a></li>
            <li><i class="icon-question-sign"></i>&nbsp;&nbsp;<a href="#help_posts_new_featuredimg"><b>Buscar una Imatge per a "Imatge Destacada"</b></a></li>
            <li><i class="icon-question-sign"></i>&nbsp;&nbsp;<a href="#help_posts_sticky"><b>Destacar una entrada a la portada de la Pàgina</b></a></li>
            <li><i class="icon-question-sign"></i>&nbsp;&nbsp;<a href="#help_posts_new_wysiwyg_media"><b>Insertar una imatge a l'Entrada</b></a></li>
            <li><i class="icon-question-sign"></i>&nbsp;&nbsp;<a href="#help_posts_new_wysiwyg_media_gallery"><b>Crear una Galeria amb vàries Imatges</b></a></li>
            <li><i class="icon-question-sign"></i>&nbsp;&nbsp;<a href="#help_posts_categories"><b>Editar les Categories</b></a></li>
            <li><i class="icon-question-sign"></i>&nbsp;&nbsp;<a href="#help_posts_tags"><b>Editar les Etiquetes</b></a></li>
            <li><i class="icon-question-sign"></i>&nbsp;&nbsp;<a href="#help_posts_posts-page"><b>Diferències entre Posts (Notícies / Entrades) i Pàgines</b></a></li>
            <?php }else{ //english ?>
            <li>FAQ</li>
            <?php } ?>
          </ul>
          <span class="closer"><i class="icon-remove-circle"></i>
			<?php if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>Preguntas Frecuentes</em>"
            <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>Preguntes Freqüents</em>"
            <?php }else{ //english ?>CLOSE
            <?php } ?>
        </span>
        </div><!-- Inside -->
      </div>
</div>  <!-- /FAQ -->
<!-- Index -->
<div class="metabox-holder no-widget" id="index-box">
    <div class="postbox closed">
        <div class="handlediv" title="Click to toggle."><br></div>
        <h3 class="hndle">
        	<span>
            <?php if( qtrans_getLanguage() == 'es' ){	?>
				Índice de Contenidos
				<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
				Índex de Continguts
				<?php }else{ //english ?>
				INDEX
				<?php } ?>
            </span>
        </h3>
        <div class="inside">
          <a title="help_index" id="help_index"></a>
          <ul>
          	<?php if( qtrans_getLanguage() == 'es' ){	?>
            <!-- Desktop  -->
            <li><i class="icon-chevron-right"></i>&nbsp;&nbsp;<strong><a href="#help_dashboard">Escritorio</a></strong></li>
            <!-- <li>
            	<ul>
            		<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-caret-right"></i>&nbsp;&nbsp;<a href="#help_dashboard_blogs">Subscripción de Blogs</a></li>
            	</ul>
            </li> -->
            <!-- /Desktop  -->
            <li><br /></li>
            <!-- Posts  -->
            <li><i class="icon-chevron-right"></i>&nbsp;&nbsp;<strong><a href="#help_posts">Posts (Noticias)</a></strong></li>
            <li>
            	<ul>
            		<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-caret-right"></i>&nbsp;&nbsp;<a href="#help_posts_all">Todas las Entradas (Gestión)</a></li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-caret-right"></i>&nbsp;&nbsp;<a href="#help_posts_new">Añadir Nueva (Edición de la Noticia)</a></li>
                    <li>
                    	<ul>
                        	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-double-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_title">Título y Enlace a la noticia (URL)</a></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-double-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_wysiwyg">Editor de Contenido WYSIWYG</a></li>
                            <li>
                            	<ul>
                                	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_wysiwyg_lang">Selector de Idioma</a></li>
                                	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_wysiwyg_code">Selector de Edición (Visual - Código)</a></li>
                                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_wysiwyg_media">Insertar Media en la noticia</a></li>
                                    <li>
                                    	<ul>
                                        	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;<a href="#help_posts_new_wysiwyg_media_gallery">Crear Galería de Imágenes</a></li>
                                        </ul>
                                    </li>
                                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_wysiwyg_bar1">Barra de Edición 1</a></li>
                                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_wysiwyg_bar2">Barra de Edición 2</a></li>
                                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_wysiwyg_footer">Información del Pie</a></li>
                                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_wysiwyg_main">Ventana de Edición</a></li>
                                </ul>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-double-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_excerpt">Extracto (Resumen de la noticia)</a></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-double-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_featuredimg">Imagen Destacada (Featured Image)</a></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-double-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_cats">Categoría</a></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-double-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_tags">Etiquetas</a></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-double-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_publish">Publica (Opciones de Publicación)</a></li>
                        </ul>
                    </li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-caret-right"></i>&nbsp;&nbsp;<a href="#help_posts_categories">Categorías</a></li>
                    	<ul>
                        	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-double-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_categories_new">Crear Nueva Categoría</a></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-double-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_categories_gestio">Gestionar las Categorías</a></li>
                    	</ul>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-caret-right"></i>&nbsp;&nbsp;<a href="#help_posts_tags">Etiquetas</a></li>
                    	<ul>
                        	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-double-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_tags_new">Crear Nueva Etiqueta</a></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-double-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_tags_gestio">Gestionar las Etiquetas</a></li>
                    	</ul>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-caret-right"></i>&nbsp;&nbsp;<a href="#help_posts_anatomia">Partes de la Noticia</a></li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-caret-right"></i>&nbsp;&nbsp;<a href="#help_posts_sticky">Noticias Destacadas</a></li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-caret-right"></i>&nbsp;&nbsp;<a href="#help_posts_posts-page">Diferencias entre Entrada (Post) y Página (Page)</a></li>
            	</ul>
            </li>
            <!-- /Posts  -->
            <li><br /></li>
            <!-- Media  -->
            <li><i class="icon-chevron-right"></i>&nbsp;&nbsp;<strong><a href="#help_media">Media (Imágenes y Video)</a></strong></li>
            <!-- /Media  -->
            <li><br /></li>
            <!-- Enllaços  -->
            <li><i class="icon-chevron-right"></i>&nbsp;&nbsp;<strong><a href="#help_links">Enlaces</a></strong></li>
            <!-- /Enllaços  -->
            <li><br /></li>
            <!-- Pàgines  -->
            <li><i class="icon-chevron-right"></i>&nbsp;&nbsp;<strong><a href="#help_pages">Páginas</a></strong></li>
            <!-- /Pàgines  -->
            <li><br /></li>
            <!-- Comentaris  -->
            <li><i class="icon-chevron-right"></i>&nbsp;&nbsp;<strong><a href="#help_comments">Comentarios</a></strong></li>
            <!-- /Comentaris  -->
            <li><br /></li>
            <!-- Usuaris  -->
            <li><i class="icon-chevron-right"></i>&nbsp;&nbsp;<strong><a href="#help_users">Usuarios</a></strong></li>
            <!-- /Usuaris  -->
            <li><br /></li>
            <!-- Eines  -->
            <li><i class="icon-chevron-right"></i>&nbsp;&nbsp;<strong><a href="#help_tools">Herramientas</a></strong></li>
            <!-- /Eines  -->
            <li><br /></li>
            <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
            <!-- Desktop  -->
            <li><i class="icon-chevron-right"></i>&nbsp;&nbsp;<strong><a href="#help_dashboard">Escritorio</a></strong></li>
            <!-- <li>
            	<ul>
            		<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-caret-right"></i>&nbsp;&nbsp;<a href="#help_dashboard_blogs">Subscripción de Blogs</a></li>
            	</ul>
            </li> -->
            <!-- /Desktop  -->
            <li><br /></li>
            <!-- Posts  -->
            <li><i class="icon-chevron-right"></i>&nbsp;&nbsp;<strong><a href="#help_posts">Posts (Notícies)</a></strong></li>
            <li>
            	<ul>
            		<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-caret-right"></i>&nbsp;&nbsp;<a href="#help_posts_all">Totes les Entrades (Gestió)</a></li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-caret-right"></i>&nbsp;&nbsp;<a href="#help_posts_new">Afegir Nova (Edició de la Notícia)</a></li>
                    <li>
                    	<ul>
                        	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-double-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_title">Títol i Enllaç a la notícia (URL)</a></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-double-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_wysiwyg">Editor de Continguts WYSIWYG</a></li>
                            <li>
                            	<ul>
                                	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_wysiwyg_lang">Selector d'Idioma</a></li>
                                	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_wysiwyg_code">Selector d'Edició (Visual - Codi)</a></li>
                                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_wysiwyg_media">Inserir Mèdia a la notícia</a></li>
                                    <li>
                                    	<ul>
                                        	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;<a href="#help_posts_new_wysiwyg_media_gallery">Crear Galeria d'Imatges</a></li>
                                        </ul>
                                    </li>
                                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_wysiwyg_bar1">Barra d'Edició 1</a></li>
                                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_wysiwyg_bar2">Barra d'Edició 2</a></li>
                                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_wysiwyg_footer">Informació del Peu</a></li>
                                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_wysiwyg_main">Finestra d'Edició</a></li>
                                </ul>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-double-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_excerpt">Extracte (Resum de la notícia)</a></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-double-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_featuredimg">Imatge Destacada (Featured Image)</a></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-double-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_cats">Categoria</a></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-double-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_tags">Etiquetes</a></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-double-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_new_publish">Publica (Opcions de Publicació)</a></li>
                        </ul>
                    </li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-caret-right"></i>&nbsp;&nbsp;<a href="#help_posts_categories">Categories</a></li>
                    	<ul>
                        	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-double-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_categories_new">Crear Nova Categoria</a></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-double-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_categories_gestio">Gestionar les Categories</a></li>
                    	</ul>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-caret-right"></i>&nbsp;&nbsp;<a href="#help_posts_tags">Etiquetes</a></li>
                    	<ul>
                        	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-double-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_tags_new">Crear Nova Etiqueta</a></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-double-angle-right"></i>&nbsp;&nbsp;<a href="#help_posts_tags_gestio">Gestionar les Etiquetes</a></li>
                    	</ul>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-caret-right"></i>&nbsp;&nbsp;<a href="#help_posts_anatomia">Parts de la Notícia</a></li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-caret-right"></i>&nbsp;&nbsp;<a href="#help_posts_sticky">Notícies Destacades</a></li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-caret-right"></i>&nbsp;&nbsp;<a href="#help_posts_posts-page">Diferències entre Entrada (Post) i Pàgina (Page)</a></li>
            	</ul>
            </li>
            <!-- /Posts  -->
            <li><br /></li>
            <!-- Media  -->
            <li><i class="icon-chevron-right"></i>&nbsp;&nbsp;<strong><a href="#help_media">Mèdia (Imatges i Video)</a></strong></li>
            <!-- /Media  -->
            <li><br /></li>
            <!-- Enllaços  -->
            <li><i class="icon-chevron-right"></i>&nbsp;&nbsp;<strong><a href="#help_links">Enllaços</a></strong></li>
            <!-- /Enllaços  -->
            <li><br /></li>
            <!-- Pàgines  -->
            <li><i class="icon-chevron-right"></i>&nbsp;&nbsp;<strong><a href="#help_pages">Pàgines</a></strong></li>
            <!-- /Pàgines  -->
            <li><br /></li>
            <!-- Comentaris  -->
            <li><i class="icon-chevron-right"></i>&nbsp;&nbsp;<strong><a href="#help_comments">Comentaris</a></strong></li>
            <!-- /Comentaris  -->
            <li><br /></li>
            <!-- Usuaris  -->
            <li><i class="icon-chevron-right"></i>&nbsp;&nbsp;<strong><a href="#help_users">Usuaris</a></strong></li>
            <!-- /Usuaris  -->
            <li><br /></li>
            <!-- Eines  -->
            <li><i class="icon-chevron-right"></i>&nbsp;&nbsp;<strong><a href="#help_tools">Eines</a></strong></li>
            <!-- /Eines  -->
            <li><br /></li>
            <?php }else{ //english ?>
            <li>Index</li>
			<?php } ?>
          </ul>
          <span class="closer"><i class="icon-remove-circle"></i>
			<?php if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>Índice de Contenidos</em>"
            <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>Índex de Continguts</em>"
            <?php }else{ //english ?>CLOSE
            <?php } ?>
          </span>
        </div><!-- Inside -->
      </div>
</div>  <!-- /Index -->
<?php ?>