<?php 
/****************************************************************

Document d'Ajuda relacionat amb l'Editor Visual de WordPress.
Es crida tant a l'Apartat de Posts com al de Pàgines.
Està contingut dins del div "inside"

****************************************************************/
?>
                        <h4><b>
                        	<?php if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){	?>
									Este editor genera en cuerpo de texto de la noticia.<br />
									Funciona como un procesador de textos, permitiendo una edición visual fácil e intuitiva. 
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
									Aquest editor genera el cos de text de la notícia.<br />
									Funciona com un processador de textes, permetent una edició visual fàcil i intuïtiva.
								<?php }else{ //english ?>
									Excerpt Description
								<?php }
                            }else{//Not activeQtrans?>
                                Este editor genera en cuerpo de texto de la noticia.<br />
                                Funciona como un procesador de textos, permitiendo una edición visual fácil e intuitiva. 
                            <?php } ?>
                      	</b></h4>
                        <ol>
                        	<?php if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){	?>
									<li><strong><a href="#help_posts_new_wysiwyg_lang">Selector de Idioma</a></strong></li>
									<li><strong><a href="#help_posts_new_wysiwyg_code">Selector de Edición (Visual – Código)</a></strong></li>
									<li><strong><a href="#help_posts_new_wysiwyg_media">Insertar Medio en la Noticia</a></strong></li>
									<li><strong><a href="#help_posts_new_wysiwyg_bar1">Barra de Edición 1</a></strong></li>
									<li><strong><a href="#help_posts_new_wysiwyg_bar2">Barra de Edición 2</a></strong></li>
									<li><strong><a href="#help_posts_new_wysiwyg_footer">Información del pie</a></strong></li>
									<li><strong><a href="#help_posts_new_wysiwyg_main">Ventana de Edición</a></strong></li>
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
									<li><strong><a href="#help_posts_new_wysiwyg_lang">Selector d'Idioma</a></strong></li>
									<li><strong><a href="#help_posts_new_wysiwyg_code">Selector d'Edició (Visual – Codi)</a></strong></li>
									<li><strong><a href="#help_posts_new_wysiwyg_media">Inserir Mèdia a la Notícia</a></strong></li>
									<li><strong><a href="#help_posts_new_wysiwyg_bar1">Barra d'Edició 1</a></strong></li>
									<li><strong><a href="#help_posts_new_wysiwyg_bar2">Barra d'Edició 2</a></strong></li>
									<li><strong><a href="#help_posts_new_wysiwyg_footer">Informació del Peu</a></strong></li>
									<li><strong><a href="#help_posts_new_wysiwyg_main">Finestra d'Edició</a></strong></li>
								<?php }else{ //english ?>
									<li>Excerpt Description</li>
								<?php }
							}else{//Not activeQtrans?>
                                <li><strong><a href="#help_posts_new_wysiwyg_lang">Selector de Idioma</a></strong></li>
                                <li><strong><a href="#help_posts_new_wysiwyg_code">Selector de Edición (Visual – Código)</a></strong></li>
                                <li><strong><a href="#help_posts_new_wysiwyg_media">Insertar Medio en la Noticia</a></strong></li>
                                <li><strong><a href="#help_posts_new_wysiwyg_bar1">Barra de Edición 1</a></strong></li>
                                <li><strong><a href="#help_posts_new_wysiwyg_bar2">Barra de Edición 2</a></strong></li>
                                <li><strong><a href="#help_posts_new_wysiwyg_footer">Información del pie</a></strong></li>
                                <li><strong><a href="#help_posts_new_wysiwyg_main">Ventana de Edición</a></strong></li>
                            <?php } ?>
                        </ol>
                        <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_a.gif" />' ?><br /><br />
                        <!-- WYSIWYG > Idioma -->
                        <div class="postbox closed">
                            <div class="handlediv" title="Click to toggle."><br></div>
                            <h3 class="hndle"><div class="dashicons dashicons-arrow-right"></div>&nbsp;
                                <?php if (function_exists('qtrans_getLanguage')){
									if( qtrans_getLanguage() == 'es' ){	?>
										Selector de Idioma
									<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
										Selector d'Idioma
									<?php }else{ //english ?>
										Languaje Selector 
									<?php }
								}else{//Not activeQtrans?>
									Selector de Idioma
								<?php } ?>
                            </h3>
                            <div class="inside">
                                <a title="help_posts_new_wysiwyg_lang" id="help_posts_new_wysiwyg_lang"></a>
                                <p>
                                    <?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>
											 Pulsando en las pestañas podremos conmutar entre los idiomas disponibles. <strong>El contenido de la ventana de edición (7) es independiente para cada lengua</strong>, por lo que la noticia la editaremos íntegramente en cada idioma.                                      
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
											Prement a les pestanyes podem commutar entre els idiomes disponibles. <strong>El contingut de la finestra d'Edició (7) és independent per a cada llengua</strong>, pel que la notícia l'editarem íntegrament en cada idioma.                                        
										<?php }else{ //english ?>
											Excerpt Description
										<?php }
                                	}else{//Not activeQtrans?>
                                        Pulsando en las pestañas podremos conmutar entre los idiomas disponibles. <strong>El contenido de la ventana de edición (7) es independiente para cada lengua</strong>, por lo que la noticia la editaremos íntegramente en cada idioma.  
                                    <?php } ?>
                                </p>
                                <span class="closer"><div class="dashicons dashicons-dismiss"></div>
									<?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>CERRAR  "<em>POSTS > Añadir (Edición de la Noticia) > Editor de Contenidos > Selección de Idioma</em>"
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>POSTS > Afegeix (Edició de la Notícia) > Editor de Continguts > Selecció d'Idioma</em>"
										<?php }else{ //english ?>CLOSE
										<?php }
                                	}else{//Not activeQtrans?>
                                        CERRAR  "<em>POSTS > Añadir (Edición de la Noticia) > Editor de Contenidos > Selección de Idioma</em>"
                                    <?php } ?>
                                </span>
                            </div><!-- /inside -->
                        </div> <!-- WYSIWYG > Idioma -->
                        <!-- WYSIWYG > Selector d'Edició -->
                        <div class="postbox closed">
                            <div class="handlediv" title="Click to toggle."><br></div>
                            <h3 class="hndle"><div class="dashicons dashicons-arrow-right"></div>&nbsp;
                                <?php if (function_exists('qtrans_getLanguage')){
									if( qtrans_getLanguage() == 'es' ){	?>
										Selector de Edición (Visual - Código)
									<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
										Selector d'Edició (Visual - Codi)
									<?php }else{ //english ?>
										Languaje Selector 
									<?php }
								}else{//Not activeQtrans?>
                                    Selector de Edición (Visual - Código)
                                <?php } ?>
                            </h3>
                            <div class="inside">
                                <a title="help_posts_new_wysiwyg_code" id="help_posts_new_wysiwyg_code"></a>
                                <p>
                                    <?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>
											Conmuta entre los 2 sistemas de confección de contenido que permite WordPress: <strong>editor visual</strong> (por defecto) o <strong>visualizar el código html</strong> (lenguaje web).
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
											Commuta els 2 sistemes de confecció de contingut que permet WordPress: <strong>editor visual</strong> (per defecte) o <strong>visualitzar el codi html</strong> (llenguatge web).
										<?php }else{ //english ?>
											Excerpt Description
										<?php }
									}else{//Not activeQtrans?>
                                        Conmuta entre los 2 sistemas de confección de contenido que permite WordPress: <strong>editor visual</strong> (por defecto) o <strong>visualizar el código html</strong> (lenguaje web).
                                    <?php } ?>
                                </p>
                                <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_a2.gif" />' ?><br />
                            	<span class="closer"><div class="dashicons dashicons-dismiss"></div>
									<?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS > Añadir (Edición de la Noticia) > Editor de Contenidos > Selector de Edición</em>"
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>POSTS > Afegeix (Edició de la Notícia) > Editor de Continguts > Selector de Edición</em>"
										<?php }else{ //english ?>CLOSE
										<?php }
                                	}else{//Not activeQtrans?>
                                        CERRAR "<em>POSTS > Añadir (Edición de la Noticia) > Editor de Contenidos > Selector de Edición</em>"
                                    <?php } ?>
                                </span>
                            </div><!-- /inside -->
                        </div> <!-- WYSIWYG > Selector d'Edició -->
                        <!-- WYSIWYG > Media -->
                        <div class="postbox closed">
                            <div class="handlediv" title="Click to toggle."><br></div>
                            <h3 class="hndle"><div class="dashicons dashicons-arrow-right"></div>&nbsp;
                                <?php if (function_exists('qtrans_getLanguage')){
									if( qtrans_getLanguage() == 'es' ){	?>
										Insertar Media en la noticia
									<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
										Inserir Mèdia a la Notícia
									<?php }else{ //english ?>
										Languaje Selector 
									<?php }
								}else{//Not activeQtrans?>
                                    Insertar Media en la noticia
                                <?php } ?>
                            </h3>
                            <div class="inside">
                                <a title="help_posts_new_wysiwyg_media" id="help_posts_new_wysiwyg_media"></a>
                                <p>
                                    <?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>
											Al pulsar sobre el enlace <strong>Upload / Insert</strong> se nos abrirá una ventana en la que tenemos varias opciones para elegir el elemento multimedia que queramos usar (imagen, vídeo, audio...).<br />
											<strong>Cambiamos el sistema para elegir el elemento multimedia mediante las pestañas de la parte superior</strong>.   
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
											Al prémer sobre l'enllaç <strong>Upload / Insert</strong> se'ns obrirà una finestra en la que tenim diverses opcions per escollir l'element multimèdia que volguem usar (imatge, vídeo, àudio...).<br />
											<strong>Canviarem el sistema per escollir l'element mèdia mitjançant les pestanyes de la part superior</strong>.
										<?php }else{ //english ?>
											Excerpt Description
										<?php }
									}else{//Not activeQtrans?>
                                        Al pulsar sobre el enlace <strong>Upload / Insert</strong> se nos abrirá una ventana en la que tenemos varias opciones para elegir el elemento multimedia que queramos usar (imagen, vídeo, audio...).<br />
										<strong>Cambiamos el sistema para elegir el elemento multimedia mediante las pestañas de la parte superior</strong>.   
                                	<?php } ?>
                                </p>
                                <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_b.gif" />' ?><br />
                                <ol>
                                	<?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>
											<li><strong>From Computer ></strong> Subir un archivo desde nuestro disco duro.<br />
											Podemos arrastrar el archivo desde el Sistema Operativo dentro del cuadro o bien pulsar el botón <strong>SELECCIONAR ARCHIVO</strong> y buscarlo.</li>
											<li><strong>From URL ></strong> Permite insertar un archivo que se encuentra en internet, fuera de nuestro dominio web.<br />
											Tendremos en primer lugar que elegir entre imagen o otro tipo de archivo e <strong>introducir la dirección web del objeto en el campo URL</strong>.</li>
											<li><strong>Gallery ></strong> Esta opción permite crear una galería con varias imágenes. <br />
											<strong><a href="#help_posts_new_wysiwyg_media_gallery">Ver "Crear Galería de Imágenes" ></a></strong></li>
											<li><strong>Librería Multimedia ></strong> Elegir una imagen desde la Galería Multimedia de nuestro Wordpress.<br />
											Nos aparece el listado de los elementos multimedia disponibles en nuestra galería. Hemos de pulsar sobre el enlace <strong>SHOW</strong> del archivo que queramos insertar.<br />
											<strong><a href="#help_media">Más información acerca de la gestión de la Galería Multimedia (Media) ></a></strong></li>
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
											<li><strong>From Computer ></strong> Pujar un arxiu des del disc dur.<br />
											Podem arrossegar l'arxiu des del Sistema Operatiu a dins del quadre o bé prémer el botó <strong>SELECT FILES</strong> i cercar-lo.</li>
											<li><strong>From URL ></strong> Permet inserir un arxiu d'internet, fora del domini del nostre web.<br />
											Tindrem en primer lloc que triar entre imatge o un altre tipus d'arxiu mèdia i <strong>introduir la direcció web  de l'objecte mèdia al camp URL</strong>.</li>
											<li><strong>Gallery ></strong> Aquesta opció permet crear una galeria amb múltiples imatges. <br />
											<strong><a href="#help_posts_new_wysiwyg_media_gallery">Veure "Crear Galeria d'Imatges" ></a></strong></li>
											<li><strong>Media Library ></strong> Triar una imatge des de la Galeria Multimèdia del nostre WordPress.<br />
											Ens apareix el llistat d'elements multimèdia disponibles a la nostra galeria. Hem de prémer l'enllaç <strong>SHOW</strong> del arxiu que volguem utilitzar.<br />
											<strong><a href="#help_media">Més informació sobre la gestió de la Galeria Multimèdia (Mèdia)</a></strong></li>
										<?php }else{ //english ?>
											<li>Excerpt Description</li>
										<?php }
                                	}else{//Not activeQtrans?>
                                        <li><strong>From Computer ></strong> Subir un archivo desde nuestro disco duro.<br />
                                        Podemos arrastrar el archivo desde el Sistema Operativo dentro del cuadro o bien pulsar el botón <strong>SELECCIONAR ARCHIVO</strong> y buscarlo.</li>
                                        <li><strong>From URL ></strong> Permite insertar un archivo que se encuentra en internet, fuera de nuestro dominio web.<br />
                                        Tendremos en primer lugar que elegir entre imagen o otro tipo de archivo e <strong>introducir la dirección web del objeto en el campo URL</strong>.</li>
                                        <li><strong>Gallery ></strong> Esta opción permite crear una galería con varias imágenes. <br />
                                        <strong><a href="#help_posts_new_wysiwyg_media_gallery">Ver "Crear Galería de Imágenes" ></a></strong></li>
                                        <li><strong>Librería Multimedia ></strong> Elegir una imagen desde la Galería Multimedia de nuestro Wordpress.<br />
                                        Nos aparece el listado de los elementos multimedia disponibles en nuestra galería. Hemos de pulsar sobre el enlace <strong>SHOW</strong> del archivo que queramos insertar.<br />
                                        <strong><a href="#help_media">Más información acerca de la gestión de la Galería Multimedia (Media) ></a></strong></li>
                                	<?php } ?>
                                </ol><br />
                                <h4>
                                    <?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>
											CONFIGURACIONES COMUNES EN LA INSERCIÓN DE LA IMAGEN
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
											CONFIGURACIONS COMUNS EN LA INSERCIÓ DE LA IMATGE
										<?php }else{ //english ?>
											Excerpt Description
										<?php }
                                	}else{//Not activeQtrans?>
                                        CONFIGURACIONES COMUNES EN LA INSERCIÓN DE LA IMAGEN
                                	<?php } ?>
                                </h4>
                                <p>
                                	<?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>
											Con cualquiera de los métodos anteriores, tendremos que rellenar una serie de campos fundamentales para que la imagen se visualice correctamente:
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
											Amb qualsevol dels mètodes anteriors, haurem d'emplenar una sèrie de camps fonamentals per a que la imatge es visualitzi correctament:
										<?php }else{ //english ?>
											Excerpt Description
										<?php }
                                	}else{//Not activeQtrans?>
                                        Con cualquiera de los métodos anteriores, tendremos que rellenar una serie de campos fundamentales para que la imagen se visualice correctamente:
                                	<?php } ?>
                                </p>
                                <ol>
                                	<?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>
											<li><strong>Título para la Imagen</strong>.</li>
											<li><strong>Texto Alternativo</strong>: Este campo también debemos completarlo. Podemos usar el mismo texto que en el Título.</li>
											<li><strong>Leyenda</strong>: Es optativo. Podemos introducir un texto que aparecerá como pie de foto de la imagen insertada.</li>
											<li><strong>Descripción</strong>: Es optativo. Podemos introducir un texto explicativo que se mostrará en páginas puntuales, como la página del archivo Media.</li>
											<li><strong>URL del Enlace</strong>: Dictamina si la imagen contendrá un enlace a otra dirección web.<br />
											Ninguna: Sin enlace (recomendado para imágenes de tamaño pequeño).<br />
											File URL: Enlace directo al archivo original de la imagen, permitirá ver la imagen a mayor tamaño si el usuario hace clic en la imagen insertada.<br />
											Attachment Post URL: Enlaza a la <strong><a href="#help_media">página del archivo Media ></a>.</strong></li>
											<li><strong>Alineación</strong>: <strong>Esta configuración es importante</strong> ya que nos marcará el aspecto de la entrada: si la imagen es de gran tamaño podemos elegir <strong>NINGUNA</strong> o <strong>CENTRAR</strong>, pero con imágenes de tamaño pequeño y mediano es recomendable usar <strong>DERECHA</strong> o <strong>IZQUIERDA</strong> para que el texto fluyua alrededor de la imagen.<br />
											<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_c2.gif" />' ?>
											</li>
											<li><strong>Tamaño</strong>: Podemos elegir el tamaño de inserción.</li>
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
											<li><strong>Títol de la Imatge</strong>.</li>
											<li><strong>Text Alternatiu</strong>: Aquest camp també hem de completar-lo. Podem utilitzar el mateix text que al Títol.</li>
											<li><strong>Llegenda</strong>: És optatiu. Podem introduir un text que apareixerà com a peu de fotografia de la imatge inserida..</li>
											<li><strong>Descripció</strong>: És optatiu. Podem introduir un text explicatiu que es mostrarà en pàgines puntuals, com la pàgina de l'Arxiu Mèdia.</li>
											<li><strong>URL</strong>: Dictamina si la imatge contindrà un enllaç a un altre direcció web.<br />
											Ninguna: Sense enllaç (recomanat per a imatges de mida petita).<br />
											File URL: Enllaç directe a l'arxiu original de la imatge, permetrà veure la imatge a major mida si l'usuari clica sobre la imatge inserida.<br />
											Attachment Post URL: Enllaça a la <strong><a href="#help_media">pàgina de l'Arxiu Mèdia ></a>.</strong></li>
											<li><strong>Alineació</strong>: <strong>Aquesta configuració és important</strong> ja que ens marcarà l'aspecte de l'entrada: si la imatge és de mida gran podem escollir <strong>NINGUNA</strong> o <strong>CENTRAR</strong>, però amb imatges petites és recomanable triar <strong>DRETA</strong> o <strong>ESQUERRA</strong> per a que el text flueixi al voltant de la imatge.<br />
											<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_c2.gif" />' ?>
											</li>
											<li><strong>Mida</strong>: podem triar la mida d'inserció.</li>                                        
										<?php }else{ //english ?>
											Excerpt Description
										<?php }
                                	}else{//Not activeQtrans?>
                                        <li><strong>Título para la Imagen</strong>.</li>
                                        <li><strong>Texto Alternativo</strong>: Este campo también debemos completarlo. Podemos usar el mismo texto que en el Título.</li>
                                        <li><strong>Leyenda</strong>: Es optativo. Podemos introducir un texto que aparecerá como pie de foto de la imagen insertada.</li>
                                        <li><strong>Descripción</strong>: Es optativo. Podemos introducir un texto explicativo que se mostrará en páginas puntuales, como la página del archivo Media.</li>
                                        <li><strong>URL del Enlace</strong>: Dictamina si la imagen contendrá un enlace a otra dirección web.<br />
                                        Ninguna: Sin enlace (recomendado para imágenes de tamaño pequeño).<br />
                                        File URL: Enlace directo al archivo original de la imagen, permitirá ver la imagen a mayor tamaño si el usuario hace clic en la imagen insertada.<br />
                                        Attachment Post URL: Enlaza a la <strong><a href="#help_media">página del archivo Media ></a>.</strong></li>
                                        <li><strong>Alineación</strong>: <strong>Esta configuración es importante</strong> ya que nos marcará el aspecto de la entrada: si la imagen es de gran tamaño podemos elegir <strong>NINGUNA</strong> o <strong>CENTRAR</strong>, pero con imágenes de tamaño pequeño y mediano es recomendable usar <strong>DERECHA</strong> o <strong>IZQUIERDA</strong> para que el texto fluyua alrededor de la imagen.<br />
                                        <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_c2.gif" />' ?>
                                        </li>
                                        <li><strong>Tamaño</strong>: Podemos elegir el tamaño de inserción.</li>
                                	<?php } ?>
                                </ol>
								<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_c.gif" />' ?>
                                <br />
                                <p>
                                	<?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>
											Pulsaremos sobre <strong>Insert to Post</strong> para insertar la imagen en la entrada o <strong>Delete</strong> en caso de que queramos borrarla.
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
											A continuació premerem <strong>Insert to Post</strong> per a inserir la imatge a la Notícia o <strong>Delete</strong> en cas de que volguem esborrar-la.
										<?php }else{ //english ?>
											Excerpt Description
										<?php }
                                    }else{//Not activeQtrans?>
                                        Pulsaremos sobre <strong>Insert to Post</strong> para insertar la imagen en la entrada o <strong>Delete</strong> en caso de que queramos borrarla.
                                	<?php } ?>
                                </p>
                                <p>
                                	<?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>
											También disponemos del enlace También disponemos del enlace Usar como Imagen Destacada, que nos permitirá usar la imagen como miniatura de la noticia. Ver Imagen Destacada >, que nos permitirá usar la imagen como miniatura de la noticia. <strong><a href="help_posts_new_featuredimg">Ver Imagen Destacada ></a></strong>
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
											També disposem de l'enllaç <strong>Useu com a imatge Destacada</strong>, que ens permetrà usar la imatge com a miniatura de la notícia. <strong><a href="help_posts_new_featuredimg">Veure Imatge Destacada ></a></strong>
										<?php }else{ //english ?>
											Excerpt Description
										<?php }
                                	}else{//Not activeQtrans?>
                                        También disponemos del enlace También disponemos del enlace Usar como Imagen Destacada, que nos permitirá usar la imagen como miniatura de la noticia. Ver Imagen Destacada >, que nos permitirá usar la imagen como miniatura de la noticia. <strong><a href="help_posts_new_featuredimg">Ver Imagen Destacada ></a></strong>
                                	<?php } ?>
                                </p>
                                <p>
                                	<?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>
											Debajo de la imagen (parte superior izquierda del menú) disponemos además de un botón <strong>EDITAR IMAGEN</strong> que nos permite realizar ajustes básicos sobre la imagen: recortar, reflejar, cambiar tamaño...
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
											Assota de la imatge (part superior esquerre del menú) disposem a més d'un botó <strong>EDIT</strong> que ens permet realitzar ajustos bàsics a la imatge: retallar, reflectir, canviar la mida...
										<?php }else{ //english ?>
											Excerpt Description
										<?php }
									}else{//Not activeQtrans?>
                                        Debajo de la imagen (parte superior izquierda del menú) disponemos además de un botón <strong>EDITAR IMAGEN</strong> que nos permite realizar ajustes básicos sobre la imagen: recortar, reflejar, cambiar tamaño...
                                	<?php } ?>
                                </p>
                                <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_d.gif" />' ?><br /><br />
                                <h4>
                                	<?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>
											VOLVER A EDITAR O BORRAR IMAGEN INSERTADA
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
											TORNAR A EDITAR O ESBORRAR LA IMATGE INSERIDA
										<?php }else{ //english ?>
											Excerpt Description
										<?php }
									}else{//Not activeQtrans?>
                                        VOLVER A EDITAR O BORRAR IMAGEN INSERTADA
                                	<?php } ?>
                                </h4>
                                <p>
                                	<?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>
											Una vez hayamos insertado la imagen en el post podemos hacer clic sobre la imagen que nos interese. Nos aparecerán 2 símbolos:<br />
											<div class="dashicons dashicons-marker"></div> <strong>Elimina la Imagen</strong>.<br />
											<div class="dashicons dashicons-format-image"></div> <strong>Vuelve a Editar los ajustes de la Imagen</strong>.
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
											Un cop inserida la imatge al post,  podem fer-hi clic i ens apareixeran 2 símbols:<br />
											<div class="dashicons dashicons-marker"></div> <strong>Elimina la Imatge</strong>.<br />
											<div class="dashicons dashicons-format-image"></div> <strong>Torna a editar els ajustos d'Imatge</strong>.                                    
										<?php }else{ //english ?>
											Excerpt Description
										<?php }
									}else{//Not activeQtrans?>
                                        Una vez hayamos insertado la imagen en el post podemos hacer clic sobre la imagen que nos interese. Nos aparecerán 2 símbolos:<br />
                                        <div class="dashicons dashicons-marker"></div> <strong>Elimina la Imagen</strong>.<br />
                                        <div class="dashicons dashicons-format-image"></div> <strong>Vuelve a Editar los ajustes de la Imagen</strong>.
                                	<?php } ?>
                                </p>
                                <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_e.gif" />' ?><br /><br />
                                <!-- Crear GALERIA -->
                                <div class="postbox closed">
                                    <div class="handlediv" title="Click to toggle."><br></div>
                                    <h3 class="hndle"><div class="dashicons dashicons-arrow-right-alt2"></div>&nbsp;
										<?php if (function_exists('qtrans_getLanguage')){
                                            if( qtrans_getLanguage() == 'es' ){	?>
                                                CREAR GALERÍA DE IMÁGENES
                                            <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
                                                CREAR GALERIA D'IMATGES
                                            <?php }else{ //english ?>
                                                Edit bar1 
                                            <?php }
										}else{//Not activeQtrans?>
                                        	CREAR GALERÍA DE IMÁGENES
                                		<?php } ?>
                                    </h3>
                                    <div class="inside">
                                        <a title="help_posts_new_wysiwyg_media_gallery" id="help_posts_new_wysiwyg_media_gallery"></a>
                                        <p>
                                            <?php if (function_exists('qtrans_getLanguage')){
												if( qtrans_getLanguage() == 'es' ){	?>
													Una de las opciones al pulsar <strong>Upload / Insert</strong> es la correspondiente a la pestaña <strong>Gallery</strong>.<br />
													<strong>Ésta nos permite crear una galería de varias imágenes</strong>.
												<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
													Una de les opcions disponibles al clicar <strong>Upload / Insert</strong> és la corresponent a la pestanya <strong>Gallery</strong>.<br />
													<strong>Aquesta secció ens permet crear una galeria de múltiples imatges</strong>.                               
												<?php }else{ //english ?>
													Excerpt Description
												<?php }
											}else{//Not activeQtrans?>
                                                Una de las opciones al pulsar <strong>Upload / Insert</strong> es la correspondiente a la pestaña <strong>Gallery</strong>.<br />
												<strong>Ésta nos permite crear una galería de varias imágenes</strong>.
                                			<?php } ?>
                                        </p>
                                        <p>
                                            <?php if (function_exists('qtrans_getLanguage')){
												if( qtrans_getLanguage() == 'es' ){	?>
													Dentro de esta pestaña nos aparecerá el <strong>listado de imágenes </strong>vinculadas a la noticia que estamos editando. <br />
													Si queremos añadir más imágenes para la galería, volveremos a la pestaña <strong>From Computer</strong> y elegiremos más imágenes de nuestro disco duro. <br />
													Una vez cargadas las imágenes, <strong>sin realizar ningún ajuste más en esta pantalla</strong>, volveremos a la pestaña <strong>Gallery</strong> y las nuevas imágenes aparecerán en la lista.<br />
													Podemos ajustar las propiedades de cada una de las imágenes de la lista (Título, Descripción...) mediante el enlace <strong>SHOW</strong>.<br />
													También podemos cambiar el orden de las imágenes arrastrándolas o insertando un número en la caja de texto de la columna <strong>ORDER</strong>.<br />
													Guardaremos los cambios con el botón <strong>SAVE ALL CHANGES</strong>.
												<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
													Dins del menú de la pestanya ens apareix el <strong>llistat d'imatges</strong> vinculades a la notícia que ens trobem editant. <br />
													Si volem afegir més imatges per a la galeria, tornarem a la pestanya <strong>From Computer</strong> i triarem més imatges del nostre disc dur. <br />
													Un cop carregades les imatges, <strong>sense realitzar cap ajust més en aquesta pantalla</strong>, tornarem a la pestanya <strong>Gallery</strong> i les noves imatges apareixeran a la llista.<br />
													Podem ajustar cadascuna de  les imatges de la llista (Títol, Descripció...) mitjançant l'enllaç <strong>SHOW</strong>.<br />
													També podem canviar l'ordre de les imatges arrossegant-les o intrudint un número a la caixa de text de la columna <strong>ORDER</strong>.<br />
													Desarem els canvis amb el botó <strong>SAVE ALL CHANGES</strong>.            
												<?php }else{ //english ?>
													Excerpt Description
												<?php }
											}else{//Not activeQtrans?>
                                                Dentro de esta pestaña nos aparecerá el <strong>listado de imágenes </strong>vinculadas a la noticia que estamos editando. <br />
                                                Si queremos añadir más imágenes para la galería, volveremos a la pestaña <strong>From Computer</strong> y elegiremos más imágenes de nuestro disco duro. <br />
                                                Una vez cargadas las imágenes, <strong>sin realizar ningún ajuste más en esta pantalla</strong>, volveremos a la pestaña <strong>Gallery</strong> y las nuevas imágenes aparecerán en la lista.<br />
                                                Podemos ajustar las propiedades de cada una de las imágenes de la lista (Título, Descripción...) mediante el enlace <strong>SHOW</strong>.<br />
                                                También podemos cambiar el orden de las imágenes arrastrándolas o insertando un número en la caja de texto de la columna <strong>ORDER</strong>.<br />
                                                Guardaremos los cambios con el botón <strong>SAVE ALL CHANGES</strong>.
                                			<?php } ?>
                                        </p>
                                        <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_f.gif" />' ?><br />
                                        <p>
                                            <?php if (function_exists('qtrans_getLanguage')){
												if( qtrans_getLanguage() == 'es' ){	?>
													En la parte inferior del menú de la pestaña <strong>Gallery</strong> tenemos la sección <strong>Ajustes de la Galería</strong>, que ofrece una serie de opciones para terminar de configurar la galería:
												<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
													A la part inferior del menú de la pestanya <strong>Gallery</strong> hi tenim la secció <strong>Gallery Settings</strong>, que ofereix una sèrie d'opcions per a finalitzar la configuració de la nostra galeria:       
												<?php }else{ //english ?>
													Excerpt Description
												<?php }
                                        	}else{//Not activeQtrans?>
                                                En la parte inferior del menú de la pestaña <strong>Gallery</strong> tenemos la sección <strong>Ajustes de la Galería</strong>, que ofrece una serie de opciones para terminar de configurar la galería:
                                			<?php } ?>
                                        </p>
                                        </p>
                                        <ul>
                                            <?php if (function_exists('qtrans_getLanguage')){
												if( qtrans_getLanguage() == 'es' ){	?>
													<li><strong>Link Thumbnails to ></strong> Elegir la opción <strong>Image File</strong> (la miniatura de cada imagen se enlaza con la versión grande de la misma, permitiendo ver la imagen a gran tamaño).</li>
													<li><strong>Order Images by ></strong> Elige como se ordenarán las imágenes mediante un menú desplegable. Las opciones son: siguiendo el orden que hemos configurado en la lista de imágenes (Menu Order), por Título, Fecha o Aleatorio (Random).</li>
													<li><strong>Order ></strong> Siempre que no elijamos un orden Aleatorio, podemos elegir si el criterio de ordenación será ascendente o descendente.</li>
													<li><strong>Gallery Columns ></strong> Dado que la Galería funciona como una cuadrícula, con esta opción podremos elegir el número de columnas de la cuadrícula (funciona sólo en algunos temas).</li>
												<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
													<li><strong>Link Thumbnails to ></strong> Cal escollir la opció <strong>Image File</strong> (la miniatura de cada imatge s'enllaça amb la seva versió gran, permetent veure la imatge a mida gran.</li>
													<li><strong>Order Images by ></strong> Escull com s'ordenaran les imatges mitjançant un menú desplegable. Les opcions son: seguint l'ordre que hem configurat a la llista d'imatges (Menu order), pel Títol, Data i Aleatori (Random).</li>
													<li><strong>Order ></strong> Sempre que no escollim un ordre Alatori, podem triar si el criteri d'ordenació serà ascendent o descendent.</li>
													<li><strong>Gallery Columns ></strong> Com que la Galeria funciona com una quadrícula, amb aquesta opció podrem escollir el número de columnes de la quadrícula (funciona només en alguns temes).</li>
												<?php }else{ //english ?>
													<li>Excerpt Description</li>
												<?php }
											}else{//Not activeQtrans?>
                                                <li><strong>Link Thumbnails to ></strong> Elegir la opción <strong>Image File</strong> (la miniatura de cada imagen se enlaza con la versión grande de la misma, permitiendo ver la imagen a gran tamaño).</li>
                                                <li><strong>Order Images by ></strong> Elige como se ordenarán las imágenes mediante un menú desplegable. Las opciones son: siguiendo el orden que hemos configurado en la lista de imágenes (Menu Order), por Título, Fecha o Aleatorio (Random).</li>
                                                <li><strong>Order ></strong> Siempre que no elijamos un orden Aleatorio, podemos elegir si el criterio de ordenación será ascendente o descendente.</li>
                                                <li><strong>Gallery Columns ></strong> Dado que la Galería funciona como una cuadrícula, con esta opción podremos elegir el número de columnas de la cuadrícula (funciona sólo en algunos temas).</li>
                                			<?php } ?>
                                        </ul>
                                        <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_f2.gif" />' ?><br />
                                        <p>
                                            <?php if (function_exists('qtrans_getLanguage')){
												if( qtrans_getLanguage() == 'es' ){	?>
													Podremos editar la galería insertada clicando sobre el botón <strong>Upload / Insert</strong> y dirigiéndonos de nuevo a la pestaña <strong>Gallery</strong>.
												<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
													Podem editar la galeria inserida clicant el botó <strong>Upload / Insert</strong> i dirigint-nos de nou a la pestanya <strong>Gallery</strong>.      
												<?php }else{ //english ?>
													Excerpt Description
												<?php }
											}else{//Not activeQtrans?>
                                                Podremos editar la galería insertada clicando sobre el botón <strong>Upload / Insert</strong> y dirigiéndonos de nuevo a la pestaña <strong>Gallery</strong>.
                                			<?php } ?>
                                        </p>
                                        <p><b>
                                            <?php if (function_exists('qtrans_getLanguage')){
												if( qtrans_getLanguage() == 'es' ){	?>
												   Una vez completada la galería este es su aspecto final y la ventana modal que aparece al abrir una de sus imágenes:
												<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
													Un cop completada la Galeria aquest és el seu aspecte final i la finestra modal que apareix a l'obrir una de les seves imatges:     
												<?php }else{ //english ?>
													Excerpt Description
												<?php }
											}else{//Not activeQtrans?>
                                                Una vez completada la galería este es su aspecto final y la ventana modal que aparece al abrir una de sus imágenes:
                                			<?php } ?>
                                        </b></p>
                                        <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_g.gif" />' ?><br />
                           				<span class="closer"><div class="dashicons dashicons-dismiss"></div>
											<?php if (function_exists('qtrans_getLanguage')){
												if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS > Añadir (Edición de la Noticia) > Editor de Contenidos > Insertar Media > Crear Galería</em>"
												<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>POSTS > Afegeix (Edició de la Notícia) > Editor de Continguts > Insertar Media > Crear Galeria</em>"
												<?php }else{ //english ?>CLOSE
												<?php }
                                        	}else{//Not activeQtrans?>
                                                CERRAR "<em>POSTS > Añadir (Edición de la Noticia) > Editor de Contenidos > Insertar Media > Crear Galería</em>"
                                			<?php } ?>
                                        </span>
                                    </div><!-- /inside -->
                            	</div> <!-- WYSIWYG > Insertar Media  > Crear Galeria -->
                                <span class="closer"><div class="dashicons dashicons-dismiss"></div>
									<?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS > Añadir (Edición de la Noticia) > Editor de Contenidos > Insertar Media > Crear Galería</em>"
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR  "<em>POSTS > Afegeix (Edició de la Notícia) > Editor de Continguts > Insertar Media > Crear Galeria</em>"
										<?php }else{ //english ?>CLOSE
										<?php }
									}else{//Not activeQtrans?>
                                        CERRAR "<em>POSTS > Añadir (Edición de la Noticia) > Editor de Contenidos > Insertar Media > Crear Galería</em>"
                                    <?php } ?>
                                </span>
                            </div><!-- /inside -->
                        </div> <!-- WYSIWYG > Insertar Media -->
                        <!-- WYSIWYG > Barra Edició 1 -->
                        <div class="postbox closed">
                            <div class="handlediv" title="Click to toggle."><br></div>
                            <h3 class="hndle"><div class="dashicons dashicons-arrow-right"></div>&nbsp;
                                <?php if (function_exists('qtrans_getLanguage')){
									if( qtrans_getLanguage() == 'es' ){	?>
										Barra de Edición 1
									<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
										Barra d'Edició 1
									<?php }else{ //english ?>
										Edit bar1 
									<?php }
								}else{//Not activeQtrans?>
                                    Barra de Edición 1
                                <?php } ?>
                            </h3>
                            <div class="inside">
                                <a title="help_posts_new_wysiwyg_bar1" id="help_posts_new_wysiwyg_bar1"></a>
                                <h4><b>
                                    <?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>
										   Principalmente ofrece opciones de edición y formateo de texto.
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
										   Ofereix principalment opcions d'Edició i Formateig de Text.
										<?php }else{ //english ?>
											Excerpt Description
										<?php }
									}else{//Not activeQtrans?>
                                        Principalmente ofrece opciones de edición y formateo de texto.
                                    <?php } ?>
                                </b></h4>
                                <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_h.gif" />' ?>
                                <ol>
                                	<?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>
										<li><strong>Negrita</strong></li>
										<li><em>Cursiva</em></li>
										<li><strike>Texto Tachado</strike></li>
										<li>Lista Desordenada
											<ul>
												<li>Ejemplo lista Desordenada 1</li>
												<li>Ejemplo lista Desordenada 2</li>
											</ul>
									   </li>
									   <li>Lista Ordenada
										 <ol>
										   <li>Ejemplo lista Ordenada 1</li>
										   <li>Ejemplo lista Ordenada 2</li>
										 </ol>
									   </li>
									   <li><blockquote><em>"Formato de Cita"</em></blockquote></li>
									   <li>Alinear a la Izquierda</li>
									   <li>Alinear Centrado</li>
									   <li>Alinear a la Derecha</li>
									   <li>Insertar / Editar Enlace<br />
									   Con el cursor, seleccionamos el texto que queramos convertir en enlace y al pulsar el botón se nos abrirá una ventana con sus opciones:<br />
									   <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_i.gif" />' ?>
										   <ul>
												<li><em>Enlazar a una página externa</em>: rellenamos el campo <strong>URL</strong> con la dirección a la que queramos que apunte el enlace. Optativamente podemos añadir un <strong>Título</strong> en el correspondiente campo.</li>
												<li><em>Enlazar a un contenido de nuestra web</em>: Haciendo clic sobre el botón <strong>O enlaza a contenido ya existente</strong> se nos abrirá un listado con todas las páginas de la web. Podemos utilizar la <strong>barra de búsqueda</strong> para encontrar más rápido la página que queramos enlazar.</li>
												<li>Una vez configurado el enlace pulsaremos en <strong>Añadir Enlace</strong>.</li>
										   </ul>
									   </li>
									   <li>Borrar Enlace<br />
									   Para borrar un enlace previamente creado colocaremos el cursos sobre él y pulsaremos el botón.
									   </li>
									   <li>Etiqueta “Más Texto”<br />
									   Permite dividir la noticia entre el Resumen / Titular y el cuerpo de la misa (no funciona en todos los temas). Para crear un resumen de la noticia siempre es más recomendable usar el <strong><a href="#help_posts_new_excerpt">Extracto</a></strong>.
									   </li>
									   <li>Corrector</li>
									   <li>Pantalla Completa</li>
									   <li>Muestra / Oculta la <strong><a href="#help_posts_new_wysiwyg_bar2">Barra de Edición 2</a></strong></li>
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
										<li><strong>Negreta</strong></li>
										<li><em>Cursiva</em></li>
										<li><strike>Text Tatxat</strike></li>
										<li>Llista Desordenada
											<ul>
												<li>Exemple llista Desordenada 1</li>
												<li>Exemple llista Desordenada 2</li>
											</ul>
									   </li>
									   <li>Llista Ordenada
										 <ol>
										   <li>Exemple llista Ordenada 1</li>
										   <li>Exemple llista Ordenada 2</li>
										 </ol>
									   </li>
									   <li><blockquote><em>"Format de Cita"</em></blockquote></li>
									   <li>Alinear a l'Esquerra</li>
									   <li>Alineació Centrada</li>
									   <li>Alinear a la Dreta</li>
									   <li>Inserir / Editar Enllaç<br />
									   Amb el cursor, hem de seleccionar el text que volguem convertir en enllaç i al prémer el botó se'ns obrirà una finestra amb les opcions d'aquest:<br />
									   <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_i.gif" />' ?>
										   <ul>
												<li>Enllaçar a una pàgina externa: omplirem el camp <strong>URL</strong> amb la direcció a la que volguem que dirigeixi l'enllaç. Optativament li podem afegir un <strong>Títol</strong> al camp corresponent.</li>
												<li>Enllaçar a un contingut de la web: Clicarem sobre el botó <strong>O enllaça a un contingut existent</strong> i se'ns desplegarà un llistat amb totes les pàgines del web. Podem utilitzar la <strong>Barra de Cerca</strong> per trobar més ràpidament la pàgina que volguem enllaçar.</li>
												<li>Un cop configurat l'enllaç premem el botó <strong>Afegeix un Enllaç</strong>.</li>
										   </ul>
									   </li>
									   <li>Esborrar l'Enllaç<br />
									   Per esborrar un enllaç prèviament creat col·locarem el cursor sobre l'enllaç i premerem el botó.
									   </li>
									   <li>Etiqueta “Més Text”<br />
									   Permet dividir la notícia entre el Resum / Titular  i el Cos (no funciona en alguns temes). Per crear un resum de la notícia sempre és més recomanable usar l'<strong><a href="#help_posts_new_excerpt">Extracte</a></strong>.
									   </li>
									   <li>Corrector ortogràfic</li>
									   <li>Pantalla Completa</li>
									   <li>Mostra / Oculta la <strong><a href="#help_posts_new_wysiwyg_bar2">Barra d'Edició 2</a></strong>.</li>
										<?php }else{ //english ?>
										   <li>ola k ase</li>
										<?php }
                                    }else{//Not activeQtrans?>
                                        <li><strong>Negrita</strong></li>
										<li><em>Cursiva</em></li>
										<li><strike>Texto Tachado</strike></li>
										<li>Lista Desordenada
											<ul>
												<li>Ejemplo lista Desordenada 1</li>
												<li>Ejemplo lista Desordenada 2</li>
											</ul>
									   </li>
									   <li>Lista Ordenada
										 <ol>
										   <li>Ejemplo lista Ordenada 1</li>
										   <li>Ejemplo lista Ordenada 2</li>
										 </ol>
									   </li>
									   <li><blockquote><em>"Formato de Cita"</em></blockquote></li>
									   <li>Alinear a la Izquierda</li>
									   <li>Alinear Centrado</li>
									   <li>Alinear a la Derecha</li>
									   <li>Insertar / Editar Enlace<br />
									   Con el cursor, seleccionamos el texto que queramos convertir en enlace y al pulsar el botón se nos abrirá una ventana con sus opciones:<br />
									   <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_i.gif" />' ?>
										   <ul>
												<li><em>Enlazar a una página externa</em>: rellenamos el campo <strong>URL</strong> con la dirección a la que queramos que apunte el enlace. Optativamente podemos añadir un <strong>Título</strong> en el correspondiente campo.</li>
												<li><em>Enlazar a un contenido de nuestra web</em>: Haciendo clic sobre el botón <strong>O enlaza a contenido ya existente</strong> se nos abrirá un listado con todas las páginas de la web. Podemos utilizar la <strong>barra de búsqueda</strong> para encontrar más rápido la página que queramos enlazar.</li>
												<li>Una vez configurado el enlace pulsaremos en <strong>Añadir Enlace</strong>.</li>
										   </ul>
									   </li>
									   <li>Borrar Enlace<br />
									   Para borrar un enlace previamente creado colocaremos el cursos sobre él y pulsaremos el botón.
									   </li>
									   <li>Etiqueta “Más Texto”<br />
									   Permite dividir la noticia entre el Resumen / Titular y el cuerpo de la misa (no funciona en todos los temas). Para crear un resumen de la noticia siempre es más recomendable usar el <strong><a href="#help_posts_new_excerpt">Extracto</a></strong>.
									   </li>
									   <li>Corrector</li>
									   <li>Pantalla Completa</li>
									   <li>Muestra / Oculta la <strong><a href="#help_posts_new_wysiwyg_bar2">Barra de Edición 2</a></strong></li>
                                    <?php } ?>
                                </ol>
                            	<span class="closer"><div class="dashicons dashicons-dismiss"></div>
									<?php if (function_exists('qtrans_getLanguage')){
									if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS > Añadir (Edición de la Noticia) > Editor de Contenidos > Barra de Edición 1</em>"
                                    <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>POSTS > Afegeix (Edició de la Notícia) > Editor de Continguts > Barra d'Edició 1</em>"
                                    <?php }else{ //english ?>CLOSE
                                    <?php }
									}else{//Not activeQtrans?>
                                    	CERRAR "<em>POSTS > Añadir (Edición de la Noticia) > Editor de Contenidos > Barra de Edición 1</em>"
                                    <?php } ?>
                                </span>
                            </div><!-- /inside -->
                        </div> <!-- WYSIWYG > Barra Edició 1 -->
                        <!-- WYSIWYG > Barra Edició 2 -->
                        <div class="postbox closed">
                            <div class="handlediv" title="Click to toggle."><br></div>
                            <h3 class="hndle"><div class="dashicons dashicons-arrow-right"></div>&nbsp;
                                <?php if (function_exists('qtrans_getLanguage')){
									if( qtrans_getLanguage() == 'es' ){	?>
										Barra de Edición 2
									<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
										Barra d'Edició 2
									<?php }else{ //english ?>
										Edit bar1 
									<?php }
								}else{//Not activeQtrans?>
                                    Barra de Edición 2
                                <?php } ?>
                            </h3>
                            <div class="inside">
                                <a title="help_posts_new_wysiwyg_bar2" id="help_posts_new_wysiwyg_bar2"></a>
                                <!-- Avís Botó obrir Barra 2 --> 
                              <div class="msg_updated">
                                	<p>
                                    <?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>
										   <strong>NOTA</strong>: Para abrir la Barra de Edición2 debemos pulsar el botón <?php echo '<img src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_j.gif" />' ?> situado en la <strong><a href="#help_posts_new_wysiwyg_bar1">Barra de Edición 1</a></strong>
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
										   <strong>NOTA</strong>: Per obrir la Barra d'Edició 2 hem de prémer el botó <?php echo '<img src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_j.gif" />' ?> situat a la <strong><a href="#help_posts_new_wysiwyg_bar1">Barra d'Edició 1</a></strong>
										<?php }else{ //english ?>
											Warning Bar2
										<?php }
									}else{//Not activeQtrans?>
                                        <strong>NOTA</strong>: Para abrir la Barra de Edición2 debemos pulsar el botón <?php echo '<img src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_j.gif" />' ?> situado en la <strong><a href="#help_posts_new_wysiwyg_bar1">Barra de Edición 1</a></strong>
                                    <?php } ?>
                                    </p>
                                </div><!-- /Botó obrir Barra 2 -->
                                <h4><b>
                                    <?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>
										   Esta barra de herramientas ofrece opciones avanzadas de edición y formateo de texto.
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
										   Aquesta barra d'eines ofereix opcions avançades d'edició i format de text.
										<?php }else{ //english ?>
											Excerpt Description
										<?php }
									}else{//Not activeQtrans?>
                                        Esta barra de herramientas ofrece opciones avanzadas de edición y formateo de texto.
                                    <?php } ?>
                                </b></h4>
                                <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_k.gif" />' ?>
                                <ol>
                                	<?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>
										<li>Estilos<br />
										Permite cambiar el formato de texto seleccionado (Cabecera, párrafo...)<br />
										Alternando el uso de las Cabeceras de distinto nivel (<em>Título1, Título2</em>...) junto con parágrafos normales y en negrita lograremos dar una jerarquía visual y conceptual del contenido que estamos publicando.<br />
										<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_l.gif" />' ?>
										</li>
										<li><span style="text-decoration:underline;">Texto Subrayado</span></li>
										<li>Alineación Justificada</li>
										<li>Seleccionar / cambiar el color del texto</li>
										<li>Pegar como texto plano<br />
										Se nos abrirá una ventana dónde pegaremos el texto.<br />
										Con esta opción, el texto que peguemos perderá cualquier formato (color, tamaño, estilo...). <br />
										<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_m.gif" />' ?>
										<br />
										Si dejamos marcada la casilla <em>“Conservar los saltos de línea”</em> WordPress mantendrá los puntos y aparte.
										</li>
										<li>Pegar desde Word<br />
										Se nos abrirá una ventana dónde pegaremos el texto.<br />
										Con esta opción, el texto que peguemos mantendrá su formato (color, tamaño, estilo...).
										</li>
										<li>Borrar Formato</li>
										<li>Insertar carácter especial<br />
										Abre un menú dónde podemos elegir todo tipo de signos y grafías que podemos insertar en el texto.<br />
										<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_n.gif" />' ?>
										</li>
										<li>Aumentar Margen / Sangría<br />
										Con texto normal, este botón permite generar un margen izquierdo del párrafo más amplio.<br />
										Si estamos trabajando con <strong><a href="#help_posts_new_wysiwyg_bar1">LISTAS</a></strong>, este botón permite crear un nuevo subnivel de jerarquía.
										</li>
										<li>Disminuir Margen / Sangría<br />
										Con texto normal, este botón permite disminuir el margen izquierdo del párrafo.<br />
										Si estamos trabajando con <strong><a href="#help_posts_new_wysiwyg_bar1">LISTAS</a></strong>, este botón permite disminuir un subnivel de jerarquía.
										</li>
										<li>Deshacer<br />
										Elimina la última acción realizada, volviendo a la anterior.
										</li>
										<li>Rehacer<br />
										Elimina los cambios realizados con el botón <em>DESHACER</em>.
										</li>
										<li>Ayuda<br />
										Abre un menú con 4 pestañas:
											<ul>
												<li><em>Básico</em>: Consejos básicos sobre el uso del Editor Visual.</li>
												<li><em>Avanzado</em>: Funciones complejas del editor visual.</li>
												<li><em>Atajos de teclado</em>: Combinaciones de teclas para realizar acciones concretas de forma rápida.<br />
												<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_o.gif" />' ?>
												</li>
												<li><em>Acerca de</em>: Créditos y licencia de los creadores del editor visual.</li>
											</ul>
										</li>
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
										<li>Estils<br />
										Permet canviar el format de text seleccionat (Capçalera, Paràgraf...)<br />
										Alternar l'ús entre les Capçaleres de diferent nivell (<em>Títol1, Títol2</em>...) amb paràgrafs normals i en negreta ens ajudarà a atorgar una jerarquia visual i conceptual del contingut que estem publicant.<br />
										<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_l.gif" />' ?>
										</li>
										<li><span style="text-decoration:underline;">Text Subratllat</span></li>
										<li>Alineació Justificada</li>
										<li>Seleccionar / canviar el color del text</li>
										<li>Enganxar com a text pla<br />
										Se'ns obrirà una finestra on enganxarem el text.<br />
										Amb aquesta opció, el text enganxat perdrà qualsevol format (color, tamany, estil...).<br />
										<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_m.gif" />' ?>
										<br />
										Si deixem marcada la casella “<em>Manté la separació de línies</em>”  WordPress mantindrà els punts i a part.
										</li>
										<li>Enganxar des de Word<br />
										Se'ns obrirà una finestra on enganxarem el text.<br />
										Amb aquesta opció, el text enganxat mantindrà el seu format (color, tamany, estil...).
										</li>
										<li>Esborrar Format</li>
										<li>Inserir un caràcter especial<br />
										Obre un menú on podrem triar entre tota mena de símbols i grafies que podem afegir al text.<br />
										<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_n.gif" />' ?>
										</li>
										<li>Augmentar Marge / Sagnat<br />
										Amb text normal, aquest botó permet generar un marge esquerra més ampli del paràgraf.<br />
										Si estem treballant amb <strong><a href="#help_posts_new_wysiwyg_bar1">LLISTES</a></strong>, aquest botó permet crear un nou subnivell de jerarquia.
										</li>
										<li>Disminuir Marge / Sagnat<br />
										Amb text normal, aquest botó permet disminuir el marge esquerra del paràgraf.<br />
										Si estem treballant amb <strong><a href="#help_posts_new_wysiwyg_bar1">LLISTES</a></strong> aquest botó permet disminuir un subnivell de jerarquia.
										</li>
										<li>Desfer<br />
										Elimina l'última acció realitzada, tornant a l'anterior.
										</li>
										<li>Refer<br />
										Elimina els canvis realitzats amb el botó <em>DESFER</em>.
										</li>
										<li>Ajuda<br />
										Obre un menú amb 4 pestanyes:
											<ul>
												<li><em>Bàsic</em>: Consells bàsics sobre l'ús de l'Editor Visual.</li>
	
												<li><em>Avançat</em>: Funcions complexes de l'Editor Visual.</li>
												<li><em>Draceres de Teclat</em>: Combinacions de tecles per realitzar accions concretes de forma ràpida.<br />
												<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_o.gif" />' ?>
												</li>
												<li><em>Acerca de</em>: Crèdits i llicència dels creadors de l'Editor Visual..</li>
											</ul>
										</li>
										<?php }else{ //english ?>
										   <li>ola k ase</li>
										<?php }
                                	}else{//Not activeQtrans?>
                                       <li>Estilos<br />
										Permite cambiar el formato de texto seleccionado (Cabecera, párrafo...)<br />
										Alternando el uso de las Cabeceras de distinto nivel (<em>Título1, Título2</em>...) junto con parágrafos normales y en negrita lograremos dar una jerarquía visual y conceptual del contenido que estamos publicando.<br />
										<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_l.gif" />' ?>
										</li>
										<li><span style="text-decoration:underline;">Texto Subrayado</span></li>
										<li>Alineación Justificada</li>
										<li>Seleccionar / cambiar el color del texto</li>
										<li>Pegar como texto plano<br />
										Se nos abrirá una ventana dónde pegaremos el texto.<br />
										Con esta opción, el texto que peguemos perderá cualquier formato (color, tamaño, estilo...). <br />
										<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_m.gif" />' ?>
										<br />
										Si dejamos marcada la casilla <em>“Conservar los saltos de línea”</em> WordPress mantendrá los puntos y aparte.
										</li>
										<li>Pegar desde Word<br />
										Se nos abrirá una ventana dónde pegaremos el texto.<br />
										Con esta opción, el texto que peguemos mantendrá su formato (color, tamaño, estilo...).
										</li>
										<li>Borrar Formato</li>
										<li>Insertar carácter especial<br />
										Abre un menú dónde podemos elegir todo tipo de signos y grafías que podemos insertar en el texto.<br />
										<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_n.gif" />' ?>
										</li>
										<li>Aumentar Margen / Sangría<br />
										Con texto normal, este botón permite generar un margen izquierdo del párrafo más amplio.<br />
										Si estamos trabajando con <strong><a href="#help_posts_new_wysiwyg_bar1">LISTAS</a></strong>, este botón permite crear un nuevo subnivel de jerarquía.
										</li>
										<li>Disminuir Margen / Sangría<br />
										Con texto normal, este botón permite disminuir el margen izquierdo del párrafo.<br />
										Si estamos trabajando con <strong><a href="#help_posts_new_wysiwyg_bar1">LISTAS</a></strong>, este botón permite disminuir un subnivel de jerarquía.
										</li>
										<li>Deshacer<br />
										Elimina la última acción realizada, volviendo a la anterior.
										</li>
										<li>Rehacer<br />
										Elimina los cambios realizados con el botón <em>DESHACER</em>.
										</li>
										<li>Ayuda<br />
										Abre un menú con 4 pestañas:
											<ul>
												<li><em>Básico</em>: Consejos básicos sobre el uso del Editor Visual.</li>
												<li><em>Avanzado</em>: Funciones complejas del editor visual.</li>
												<li><em>Atajos de teclado</em>: Combinaciones de teclas para realizar acciones concretas de forma rápida.<br />
												<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_o.gif" />' ?>
												</li>
												<li><em>Acerca de</em>: Créditos y licencia de los creadores del editor visual.</li>
											</ul>
										</li>
                                    <?php } ?>
                                </ol>
                                <span class="closer"><div class="dashicons dashicons-dismiss"></div>
									<?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS > Añadir (Edición de la Noticia) > Editor de Contenidos > Barra de Edición 2</em>"
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>POSTS > Afegeix (Edició de la Notícia) > Editor de Continguts > Barra d'Edició 2</em>"
										<?php }else{ //english ?>CLOSE
										<?php }
                                    }else{//Not activeQtrans?>
                                    	CERRAR "<em>POSTS > Añadir (Edición de la Noticia) > Editor de Contenidos > Barra de Edición 2</em>"
                                    <?php } ?>
                                </span>
                            </div><!-- /inside -->
                        </div> <!-- WYSIWYG > Barra Edició 2 -->
                        <!-- WYSIWYG > Información del pie -->
                        <div class="postbox closed">
                            <div class="handlediv" title="Click to toggle."><br></div>
                            <h3 class="hndle"><div class="dashicons dashicons-arrow-right"></div>&nbsp;
                                <?php if (function_exists('qtrans_getLanguage')){
									if( qtrans_getLanguage() == 'es' ){	?>
										Información del pie
									<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
										Informació del Peu
									<?php }else{ //english ?>
										Edit bar1 
									<?php }
								}else{//Not activeQtrans?>
                                    Información del pie
                                <?php } ?>
                            </h3>
                            <div class="inside">
                                <a title="help_posts_new_wysiwyg_footer" id="help_posts_new_wysiwyg_footer"></a>
                                <h4><b>
                                    <?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>
										   El pie del Editor de Contenidos muestra 3 campos de información relevante para la edición:
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
										   El peu de l'Editor de Continguts mostra 3 camps d'informació rellevant per a l'edició:
										<?php }else{ //english ?>
											Excerpt Description
										<?php }
									}else{//Not activeQtrans?>
                                        El pie del Editor de Contenidos muestra 3 campos de información relevante para la edición:
                                    <?php } ?>
                                </b></h4>
								<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02_wys_p.gif" />' ?>
                                <p><br />
                                    <?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>
											<b>Ruta</b><br />
											La ruta corresponde a la jerarquía del <em>código html</em> (lenguaje web) que hemos insertado en la entrada . Así, al colocar el cursor sobre una parte del texto creado, nos aparecerá aquí las etiquetas web que posee el atributo seleccionado.<br />
											Las etiquetas más comunes son:
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
											<b>Camí</b><br />
											El concepte Camí (o Ruta) correspon aq la jerarquia del codi html (llenguatge web) que hem inserit a l'entrada. Així, al col·locar el cursos sobre una part del text creat, ens apareixerán aquí les etiquetes web que posseeix l'atribut seleccionat.
										<?php }else{ //english ?>
											Excerpt Description
										<?php }
									}else{//Not activeQtrans?>
                                       <b>Ruta</b><br />
                                        La ruta corresponde a la jerarquía del <em>código html</em> (lenguaje web) que hemos insertado en la entrada . Así, al colocar el cursor sobre una parte del texto creado, nos aparecerá aquí las etiquetas web que posee el atributo seleccionado.<br />
                                        Las etiquetas más comunes son:
                                    <?php } ?>
                                </p>
                                <ul>
                                    <?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>
											<li><em><strong>h1 – h6</strong></em> Título1 a Título 6</li>
											<li><em><strong>p</strong></em> Parágrafo</li>
											<li><em><strong>a</strong></em> Enlace</li>
											<li><em><strong>strong</strong></em> Negrita</li>
											<li><em><strong>img</strong></em> Imagen</li>
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
											<li><em><strong>h1 – h6</strong></em> Títol1 a Títol 6</li>
											<li><em><strong>p</strong></em> Paràgraf</li>
											<li><em><strong>a</strong></em> Enllaç</li>
											<li><em><strong>strong</strong></em> Negreta</li>
											<li><em><strong>img</strong></em> Imatge</li>
										<?php }else{ //english ?>
											Excerpt Description
										<?php }
									}else{//Not activeQtrans?>
                                        <li><em><strong>h1 – h6</strong></em> Título1 a Título 6</li>
                                        <li><em><strong>p</strong></em> Parágrafo</li>
                                        <li><em><strong>a</strong></em> Enlace</li>
                                        <li><em><strong>strong</strong></em> Negrita</li>
                                        <li><em><strong>img</strong></em> Imagen</li>
                                    <?php } ?>
                                </ul>
                                <p>
                                    <?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>
											<li><em><strong>h1 – h6</strong></em> Título1 a Título 6</li>
                                            <li><em><strong>p</strong></em> Parágrafo</li>
                                            <li><em><strong>a</strong></em> Enlace</li>
                                            <li><em><strong>strong</strong></em> Negrita</li>
                                            <li><em><strong>img</strong></em> Imagen</li>
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
											Per exemple, dins d'un paràgraf podem tenir un enllaç amb una imatge, i el seu camí seria:<br />
											<em><strong>p</strong> &raquo; <strong>a</strong> &raquo; <strong>img</strong></em>.<br />
											<strong><a href="http://www.w3schools.com/tags/default.asp" target="_blank">Consulteu aquí el llistat d'etiquetes web</a></strong> <div class="dashicons dashicons-share-alt2"></div>.
										<?php }else{ //english ?>
											Excerpt Description
										<?php }
									}else{//Not activeQtrans?>
                                        <li><em><strong>h1 – h6</strong></em> Título1 a Título 6</li>
                                        <li><em><strong>p</strong></em> Parágrafo</li>
                                        <li><em><strong>a</strong></em> Enlace</li>
                                        <li><em><strong>strong</strong></em> Negrita</li>
                                        <li><em><strong>img</strong></em> Imagen</li>
                                    <?php } ?>
                                </p>
                                <p><br /><br />
                                    <?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>
											<b>Número de Palabras</b><br />
											Nos indica el número de palabras introducidas en el Editor, descontando preposiciones y conjunciones de una sola letra.
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
											<b>Paraules Comptades</b><br />
											Ens indica el nombre de paraules introduïdes a l'Editor, descomptant preposicions i conjuncions d'una sola lletra.
										<?php }else{ //english ?>
											Excerpt Description
										<?php }
									}else{//Not activeQtrans?>
                                        <b>Número de Palabras</b><br />
                                        Nos indica el número de palabras introducidas en el Editor, descontando preposiciones y conjunciones de una sola letra.
                                    <?php } ?>
                                </p>
                                <p><br /><br />
                                    <?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>
											<b>Última Edición</b><br />
											Esta información corresponde al autor y la fecha en la que se realizaron cambios en la entrada por última vez.
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
											<b>Última Edició</b><br />
											Aquesta informació correspon a l'autor i la data en la que es van realitzar canvis a l'entrada per última vegada.
										<?php }else{ //english ?>
											Excerpt Description
										<?php }
									}else{//Not activeQtrans?>
                                        <b>Última Edición</b><br />
											Esta información corresponde al autor y la fecha en la que se realizaron cambios en la entrada por última vez.
                                    <?php } ?>
                                </p>
                                <span class="closer"><div class="dashicons dashicons-dismiss"></div>
									<?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS > Añadir (Edición de la Noticia) > Editor de Contenidos > Información del Pie</em>"
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>POSTS > Afegeix (Edició de la Notícia) > Editor de Continguts > Información del Pie</em>"
										<?php }else{ //english ?>CLOSE
										<?php }
									}else{//Not activeQtrans?>
                                        CERRAR "<em>POSTS > Añadir (Edición de la Noticia) > Editor de Contenidos > Información del Pie</em>"
                                    <?php } ?>
                                </span>
                            </div><!-- /inside -->
                        </div> <!-- WYSIWYG > Información del pie -->
                        <!-- WYSIWYG > Ventana de Edición -->
                        <div class="postbox closed">
                            <div class="handlediv" title="Click to toggle."><br></div>
                            <h3 class="hndle"><div class="dashicons dashicons-arrow-right"></div>&nbsp;
                                <?php if (function_exists('qtrans_getLanguage')){
									if( qtrans_getLanguage() == 'es' ){	?>
										Ventana de Edición
									<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
										Finestra d'Edició
									<?php }else{ //english ?>
										Edit bar1 
									<?php }
								}else{//Not activeQtrans?>
                                    Ventana de Edición
                                <?php } ?>
                            </h3>
                            <div class="inside">
                                <a title="help_posts_new_wysiwyg_main" id="help_posts_new_wysiwyg_main"></a>
                                <h4><b>
                                    <?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>
											En la ventana de edición realizamos la inserción y el formateado del texto.
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
											A la finestra d'edició realitzem la inserció i donem el format al text.
										<?php }else{ //english ?>
											Excerpt Description
										<?php }
									}else{//Not activeQtrans?>
                                        En la ventana de edición realizamos la inserción y el formateado del texto.
                                    <?php } ?>
                                </b></h4>
                                <p>
                                    <?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>
											Hay que tener en cuenta que algunos elementos como el tipo y el tamaño de letra, los espacios entre párrafos y la colocación y el tamaño de las imágenes, entre otros, no se muestran con el mismo aspecto con el que finalmente la página web los muestra.<br /><br />
											Para comprobar el aspecto del contenido editado, lo mejor es usar el botón <em>VISTA PREVIA</em> situado en el <strong><a href="#help_posts_new_publish">Panel Publica</a></strong>.
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
											Cal tenir en compte que alguns elements com el tipus i la mida de la lletra, l'espaiat entre paràgrafs i la disposició i mida de les imatges, entre d'altres, no es mostren aquí amb el mateix aspecte amb el que finalment apareixen a la pàgina web.<br /><br />
											Per comprovar l'aspecte del contingut editat, la millor opció és utilitzar el botó <em>PREVISUALTIZA</em> situat al <strong><a href="#help_posts_new_publish">Panell Publica</a></strong>.                                    <?php }else{ //english ?>
											Excerpt Description
										<?php }
									}else{//Not activeQtrans?>
                                        Hay que tener en cuenta que algunos elementos como el tipo y el tamaño de letra, los espacios entre párrafos y la colocación y el tamaño de las imágenes, entre otros, no se muestran con el mismo aspecto con el que finalmente la página web los muestra.<br /><br />
										Para comprobar el aspecto del contenido editado, lo mejor es usar el botón <em>VISTA PREVIA</em> situado en el <strong><a href="#help_posts_new_publish">Panel Publica</a></strong>.
                                    <?php } ?>
                                </p>
                                <span class="closer"><div class="dashicons dashicons-dismiss"></div>
									<?php if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS > Añadir (Edición de la Noticia) > Editor de Contenidos > Ventana de Edición</em>"
										<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>POSTS > Afegeix (Edició de la Notícia) > Editor de Continguts > Finestra d'Edició</em>"
										<?php }else{ //english ?>CLOSE
										<?php }
									}else{//Not activeQtrans?>
                                        CERRAR "<em>POSTS > Añadir (Edición de la Noticia) > Editor de Contenidos > Ventana de Edición</em>"
                                    <?php } ?>
                                </span>
                            </div><!-- /inside -->
                        </div> <!-- WYSIWYG > Ventana de Edición -->
                        <span class="closer"><div class="dashicons dashicons-dismiss"></div>
							<?php if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS > Añadir (Edición de la Noticia) > Editor de Contenidos</em>"
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>POSTS > Afegeix (Edició de la Notícia) > Editor de Continguts</em>"
								<?php }else{ //english ?>CLOSE
								<?php }
							}else{//Not activeQtrans?>
                                CERRAR "<em>POSTS > Añadir (Edición de la Noticia) > Editor de Contenidos</em>"
                            <?php } ?>
                        </span>