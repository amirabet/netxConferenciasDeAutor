<?php 
/****************************************************************

Document d'Ajuda relacionat amb els Posts i la seva gestió
des del WordPress Admin

****************************************************************/
?>
<div class="metabox-holder no-widget" id="posts-box">
    <div class="postbox closed">
        <div class="handlediv" title="Click to toggle."><br></div>
        <h3 class="hndle">
        	<span class="menu-icon-post">
            	<div class="dashicons dashicons-id-alt"></div>
            </span>
        	<span>
            <?php if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){	?>
                    Posts (Noticias)
                <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
                    Posts (Notícies)
                <?php }else{ //english ?>
                    Posts
                <?php } 
            }else{//Not activeQtrans?>
            	Posts (Noticias)
            <?php }  ?>
            </span>
        </h3>
        <div class="inside">
          <a title="help_posts" id="help_posts"></a>
          <h4>
          	<?php if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){	?>
                    Las entradas (o Posts) son noticias que se mostrarán en orden cronológico inverso en la página de inicio de la web. Normalmente son las que más se comentan, y se incluyen en el <a href="#gl_r">feed RSS</a> de la web.<br />Están jerarquizadas mediante CATEGORÍAS y ETIQUETAS,  y vinculadas a una fecha concreta de publicación.
                <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
                    Les entrades (o Posts) son notícies que es mostraran en ordre cronològic invers a la pàgina d'inici de la web. Normalment són les seccions més comentades i s'inclouen al <a href="#gl_r">feed RSS</a> del web.<br />Estan jerarquitzades mitjançant CATEGORIES i ETIQUETES, i vinculades a una data concreta de publicació.
                <?php }else{ //english ?>
                    Intro Posts
                <?php }
          	}else{//Not activeQtrans?>
            	Las entradas (o Posts) son noticias que se mostrarán en orden cronológico inverso en la página de inicio de la web. Normalmente son las que más se comentan, y se incluyen en el <a href="#gl_r">feed RSS</a> de la web.<br />Están jerarquizadas mediante CATEGORÍAS y ETIQUETAS,  y vinculadas a una fecha concreta de publicación.
            <?php }  ?>
          </h4>
          <!-- Totes les entrades -->
          <div class="postbox closed">
            <div class="handlediv" title="Click to toggle."><br></div>
            <h3 class="hndle"><div class="dashicons dashicons-list-view"></div>&nbsp;&nbsp;
            <?php if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){	?>
					Todas las Entradas (Gestión)
				<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
					Totes les Entrades (Gestió)
				<?php }else{ //english ?>
					All Entries
				<?php }
            }else{//Not activeQtrans?>
            	Todas las Entradas (Gestión)
            <?php } ?>
            </h3>
            <div class="inside">
          		<a title="help_posts_all" id="help_posts_all"></a>
            	<h4>
                	<?php if (function_exists('qtrans_getLanguage')){
						if( qtrans_getLanguage() == 'es' ){	?>
							Este apartado va a listar todos los artículos ya publicados o borradores, donde podremos modificarlos.
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							Aquest apartat mostra una llista dels articles publicats i els esborranys, on podrem modificar-los.
						<?php }else{ //english ?>
							Intro All Posts
						<?php }
					}else{//Not activeQtrans?>
                        Este apartado va a listar todos los artículos ya publicados o borradores, donde podremos modificarlos.
                    <?php } ?>
                  </h4>
                  <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_01a.gif" />' ?>
                  <br /><br />
                  <p>
					<?php if (function_exists('qtrans_getLanguage')){
						if( qtrans_getLanguage() == 'es' ){	?>
							Desde este menú podemos <b>ver, editar y borrar los artículos</b>: si clicamos el botón “EDITAR”, se abre la página de redacción donde podemos hacer todas las modificaciones oportunas.
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							Des d'aquest menú podem <b>veure, editar i esborrar els articles</b>: si cliquem el botó “EDITAR”, se'ns obrirá la pàgina de redacció, on podrem realitzar totes les modificacions oportunes.
						<?php }else{ //english ?>
							Intro All Posts
						<?php }
					}else{//Not activeQtrans?>
                        Desde este menú podemos <b>ver, editar y borrar los artículos</b>: si clicamos el botón “EDITAR”, se abre la página de redacción donde podemos hacer todas las modificaciones oportunas.
                    <?php } ?>
                  </p>
                  <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_01b.gif" />' ?>
                  <br />
                  <p>
					<?php if (function_exists('qtrans_getLanguage')){
						if( qtrans_getLanguage() == 'es' ){	?>
							También podemos realizar la <b>edición o eliminación de varias entradas</b> al mismo tiempo marcando los “checks” de varias entradas y escogiendo la opción “EDIT”(para editar) o “Move to Trash” (para Eliminar) del menú desplegable.
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							També podem realitzar l'<b>edició o eliminació de múltiples  entrades</b> al mateix temps marcant els “checks” de les entrades que volguem editar i triant la opció “EDIT” (per editar) o “Move to Trash” (per Eliminar) del menú desplegable.
						<?php }else{ //english ?>
							Intro All Posts
						<?php }
                    }else{//Not activeQtrans?>
                        También podemos realizar la <b>edición o eliminación de varias entradas</b> al mismo tiempo marcando los “checks” de varias entradas y escogiendo la opción “EDIT”(para editar) o “Move to Trash” (para Eliminar) del menú desplegable.
                    <?php } ?>
                  </p>
					<?php echo '<img class="help_img fl" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_01c.gif" />' ?>
                  <br />
                  <p class="clear">
                  	<br />
                    <?php if (function_exists('qtrans_getLanguage')){
						if( qtrans_getLanguage() == 'es' ){	?>
							<b>Si elegimos la opción “EDITAR”</b> podremos modificar distintos parámetros del grupo de entradas seleccionadas mediante el menú que aparece tras pulsar el botón “APLICAR”.
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							<b>Si escollim la opció “EDITAR”</b> podrem modificar diferents paràmetres del grup d'entrades seleccionades mitjançant el menú que apareix un cop premem el botó “APLICAR”.
						<?php }else{ //english ?>
							Intro All Posts
						<?php }
					}else{//Not activeQtrans?>
                        <b>Si elegimos la opción “EDITAR”</b> podremos modificar distintos parámetros del grupo de entradas seleccionadas mediante el menú que aparece tras pulsar el botón “APLICAR”.
                    <?php } ?>
                  </p>
					<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_01d.gif" />' ?>
                  <p>
                  	<br />
					<?php if (function_exists('qtrans_getLanguage')){
						if( qtrans_getLanguage() == 'es' ){	?>
							En caso de tener un gran número de artículos publicados, <b>para encontrar uno en concreto</b> podemos utilizar el buscador que aparece en esta página (buscar por categorías, palabras, fecha, etc.) o utilizar el botón “FILTER” para seleccionar entradas siguiendo varios criterios (Categoría, Etiquetas, Fecha...)
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							En cas de tenir un gran nombre d'articles publicats, <b>per tal de trobar-ne un de concret</b>, podem utilitzar el cercador que apareix a aquesta pàgina (cercar per categories, paraules, data, etc.)   o utilitzar el botó “FILTER” per seleccionar entrades seguint diferents criteris (Categoria, Etiquetes, Data...)
						<?php }else{ //english ?>
							Intro All Posts
						<?php }
                    }else{//Not activeQtrans?>
                        En caso de tener un gran número de artículos publicados, <b>para encontrar uno en concreto</b> podemos utilizar el buscador que aparece en esta página (buscar por categorías, palabras, fecha, etc.) o utilizar el botón “FILTER” para seleccionar entradas siguiendo varios criterios (Categoría, Etiquetas, Fecha...)
                    <?php } ?>
                  </p>
                  <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_01e.gif" />' ?><br />
                  <!-- Recuperar un Post de la Paperera -->
                  <a title="help_posts_all_trash" id="help_posts_all_trash"></a>
                  <br /><br />
                  <h4>
                  	<?php if (function_exists('qtrans_getLanguage')){
						if( qtrans_getLanguage() == 'es' ){	?>
							RECUPERAR UNA ENTRADA DE LA PAPELERA
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							RECUPERAR UNA ENTRADA DE LA PAPERERA
						<?php }else{ //english ?>
							Trash restore
						<?php }
                    }else{//Not activeQtrans?>
                        En caso de tener un gran número de artículos publicados, <b>para encontrar uno en concreto</b> podemos utilizar el buscador que aparece en esta página (buscar por categorías, palabras, fecha, etc.) o utilizar el botón “FILTER” para seleccionar entradas siguiendo varios criterios (Categoría, Etiquetas, Fecha...)
                    <?php } ?>
                  </h4>
                  <p>
                  	<?php if (function_exists('qtrans_getLanguage')){
						if( qtrans_getLanguage() == 'es' ){	?>
							Si por error hemos eliminado una entrada, podemos recuperarla mediante el siguiente procedimiento:<br /><br />
							Dentro del menú Todas las Entradas pulsaremos <strong>Papelera</strong>.
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							Si per error hem eliminat una entrada, podem recuperar-la mitjançant el següent procediment:<br /><br />
							Dins del menú Totes les Entrades premem <strong>Paperera</strong>.
						<?php }else{ //english ?>
							Intro All Posts
						<?php }
                    }else{//Not activeQtrans?>
                        Si por error hemos eliminado una entrada, podemos recuperarla mediante el siguiente procedimiento:<br /><br />
						Dentro del menú Todas las Entradas pulsaremos <strong>Papelera</strong>.
                    <?php } ?>
                  </p>
                  <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_01f.gif" />' ?><br />
                  <p>
					<?php if (function_exists('qtrans_getLanguage')){
						if( qtrans_getLanguage() == 'es' ){	?>
							<strong>Nos aparecerá una tabla con un listado de todas las noticias que están en la papelera.<br />
							Colocando el cursor sobre cualquiera de ellas, bajo la columna del Título de la Noticia nos aparecerán 2 enlaces:</strong>
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							<strong>Ens apareixerà una taula que conté el llistat de totes les notícies que estan a la paperera.<br />
							Col·locant el cursor sobre qualsevol d'elles, sota la columna del Títol de la Notícia, ens apareixerán 2 enllaços:</strong>
						<?php }else{ //english ?>
							Intro All Posts
						<?php }
                    }else{//Not activeQtrans?>
                        <strong>Nos aparecerá una tabla con un listado de todas las noticias que están en la papelera.<br />
						Colocando el cursor sobre cualquiera de ellas, bajo la columna del Título de la Noticia nos aparecerán 2 enlaces:</strong>
                    <?php } ?>
                  </p>
                  <ul>
                  	<?php if (function_exists('qtrans_getLanguage')){
						if( qtrans_getLanguage() == 'es' ){	?>
							<li><strong>RESTORE</strong>: Devuelve la entrada al estado original, ya fuese pública o borrador (volverá a aparecer en el listado de noticias de la tabla <strong>Todas las Entradas</strong>).</li>
							<li><strong>BORRAR PERMENENTEMENTE</strong>: Elimina definitivamente la noticia. <strong>Atención porque este proceso es irreversible</strong>.</li>
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							<li><strong>RESTAURA</strong>: Torna a l'entrada l'estat original, ja fos pública o esborrany (apareixerà de nou al llistat de notícies de la taula <strong>Totes les Entrades</strong>).</li>
							<li><strong>DELETE PERMANENTLY</strong>: Elimina definitivament la notícia. <strong>Aquest pas el farem amb cura ja que és un procés irreversible</strong>.</li>
						<?php }else{ //english ?>
							Intro All Posts
						<?php }
                    }else{//Not activeQtrans?>
                        <li><strong>RESTORE</strong>: Devuelve la entrada al estado original, ya fuese pública o borrador (volverá a aparecer en el listado de noticias de la tabla <strong>Todas las Entradas</strong>).</li>
						<li><strong>BORRAR PERMENENTEMENTE</strong>: Elimina definitivamente la noticia. <strong>Atención porque este proceso es irreversible</strong>.</li>
                    <?php } ?>
                  </ul>
                  <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_01g.gif" />' ?><br />
            	<span class="closer"><div class="dashicons dashicons-dismiss"></div>
            	<?php if (function_exists('qtrans_getLanguage')){
					if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS > Todas las Entradas</em>"
					<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>POSTS > Totes les Entradas</em>"
					<?php }else{ //english ?>CLOSE
					<?php } 
            	}else{//Not activeQtrans?>
                    <li><strong>RESTORE</strong>: Devuelve la entrada al estado original, ya fuese pública o borrador (volverá a aparecer en el listado de noticias de la tabla <strong>Todas las Entradas</strong>).</li>
                    <li><strong>BORRAR PERMENENTEMENTE</strong>: Elimina definitivamente la noticia. <strong>Atención porque este proceso es irreversible</strong>.</li>
                <?php } ?>
                </span>
            </div> 
        </div>
      	<!-- Nova Entrada -->
        <div class="postbox closed">
            <div class="handlediv" title="Click to toggle."><br></div>
            <h3 class="hndle"><div class="dashicons dashicons-welcome-add-page"></div>&nbsp;&nbsp;
				<?php if (function_exists('qtrans_getLanguage')){
                    if( qtrans_getLanguage() == 'es' ){	?>
                        Añadir Nueva (Edición de la Noticia)
                    <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
                        Afegeix (Edició de la Notícia)
                    <?php }else{ //english ?>
                        New Post
                    <?php }
				}else{//Not activeQtrans?>
                    Añadir Nueva (Edición de la Noticia)
                <?php } ?>
            </h3>
            <div class="inside">
            	<a title="help_posts_new" id="help_posts_new"></a>
            	<!-- Avís Omplir tots els camps --> 
                <div class="msg_updated"><p><b>
                    <?php if (function_exists('qtrans_getLanguage')){
						if( qtrans_getLanguage() == 'es' ){	?>
							Para redactar una nueva entrada ES IMPRESCINDIBLE SEGUIR TODOS LOS PASOS QUE APARECEN A CONTINUACIÓN
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							Per a Redactar una Nova entrada ÉS IMPRESCINDIBLE SEGUIR TOTS ELS PASSOS ESMENTATS A CONTINUACIÓ
						<?php }else{ //english ?>
							New Post
						<?php }
                    }else{//Not activeQtrans?>
                    	Para redactar una nueva entrada ES IMPRESCINDIBLE SEGUIR TODOS LOS PASOS QUE APARECEN A CONTINUACIÓN
                	<?php } ?>
                </b></p>
                </div><!-- Final Avís Omplir tots els camps -->
                <!-- Títol -->
                <div class="postbox closed">
                    <div class="handlediv" title="Click to toggle."><br></div>
                    <h3 class="hndle"><div class="dashicons dashicons-arrow-right-alt2"></div>&nbsp;
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								Título y enlace a la noticia (URL)
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								Títol i enllaç a la noticia (URL)
							<?php }else{ //english ?>
								Title and permalink
							<?php }
                        }else{//Not activeQtrans?>
                    		Título y enlace a la noticia (URL)
                		<?php } ?>
                    </h3>
                    <div class="inside">
                        <a title="help_posts_new_title" id="help_posts_new_title"></a>
                        <p>
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								<strong>En estos campos de texto introducimos el título de la notícia para cada idioma (ES = Castellano, CAT = Catalán, etc...)</strong>. Debemos mantener una extensión uniforme para todos los títulos de las noticias, procurando no hacerlos demasiado largos.
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								<strong>En aquests camps de text introduïm el títol de la notícia per a cada idioma (ES = Castellà, CAT =  Català, etc...)</strong>. Hem de mantenir una extenisó uniforme per a tots els títols de les notícies, evitant de fer-los massa llargs.
							<?php }else{ //english ?>
								Title
							<?php }
                        }else{//Not activeQtrans?>
                    		<strong>En estos campos de texto introducimos el título de la notícia para cada idioma (ES = Castellano, CAT = Catalán, etc...)</strong>. Debemos mantener una extensión uniforme para todos los títulos de las noticias, procurando no hacerlos demasiado largos.
                		<?php } ?>
                        <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02a.gif" />' ?>
                        </p>
                        <p><br />
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
							   <strong>Una vez publicamos una noticia, WordPress asigna automáticamente una dirección web (URL) para la misma, basándose en el título insertado</strong>. La URL aparece bajo el campo de título en Castellano. Podemos cambiar esta URL editando la noticia ya publicada, mediante el botón EDITAR.
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								<strong>Un cop publiquem una notícia, WordPress li assigna automàticament una direcció web (URL),  basant-se en el títol anteriorment inserit</strong>. La URL apareix sota el camp de títol en Castellà. Podem canviar la URL editant la noticia ja publicada, mitjançant el botó EDITAR.
							<?php }else{ //english ?>
								Edit permalink
							<?php }
						}else{//Not activeQtrans?>
                    		<strong>Una vez publicamos una noticia, WordPress asigna automáticamente una dirección web (URL) para la misma, basándose en el título insertado</strong>. La URL aparece bajo el campo de título en Castellano. Podemos cambiar esta URL editando la noticia ya publicada, mediante el botón EDITAR.
                		<?php } ?>
                        <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02b.gif" />' ?>
                        </p>
                        <p><b>
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
							   Para insertar un nuevo nombre de enlace seguiremos estas directrices:
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								Per inserir un nou nom d'enllaç seguirem aquestes directrius:
							<?php }else{ //english ?>
								Permalinks advices
							<?php }
						}else{//Not activeQtrans?>
                    		Para insertar un nuevo nombre de enlace seguiremos estas directrices:
                		<?php } ?>
                        </b></p>
                        <ul>
                        	<?php if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){	?>
								   <li>Procurar usar palabras clave relacionadas con la noticia.</li>
								   <li>NO crear una URL excesivamente larga.</li>
								   <li>NO utilizar caracteres latinos (ñ, ç...) ni acentos.</li>
								   <li>Sustituir los espacios por barras bajas ( _ ) o guiones ( - ).</li>
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								   <li>Procurar usar paraules clau relacionades amb la notícia.</li>
								   <li>NO crear una URL excessivament llarga.</li>
								   <li>NO utilitzar caràcters llatins (ñ, ç...) ni accents.</li>
								   <li>Substituir els espais per barres baixes ( _ ) o guions ( - ).</li>
								<?php }else{ //english ?>
									<li>Permalinks advices</li>
								<?php }
                            }else{//Not activeQtrans?>
                               <li>Procurar usar palabras clave relacionadas con la noticia.</li>
                               <li>NO crear una URL excesivamente larga.</li>
                               <li>NO utilizar caracteres latinos (ñ, ç...) ni acentos.</li>
                               <li>Sustituir los espacios por barras bajas ( _ ) o guiones ( - ).</li>
                            <?php } ?>
                        </ul>
                        <p><br /><b>
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
							   También podemos obtener una versión acortada del enlace a la noticia mediante el botón GET SHORTLINK.
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								També podem obtenir una versió curta de l'enllaç a la notícia mitjançant el botó GET SHORTLINK.
							<?php }else{ //english ?>
								Get shotlink.
							<?php }
                        }else{//Not activeQtrans?>
                           También podemos obtener una versión acortada del enlace a la noticia mediante el botón GET SHORTLINK.
                        <?php } ?>
                        </b></p>
                        <span class="closer"><div class="dashicons dashicons-dismiss"></div> 
                        	<?php if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS > Añadir (Edicion de la Noticia) > Título</em>"
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>POSTS > Afegeix (Edició de la Notícia) > Títol</em>"
								<?php }else{ //english ?>CLOSE
								<?php }
                            }else{//Not activeQtrans?>
                           		CERRAR "<em>POSTS > Añadir (Edicion de la Noticia) > Título</em>"
                        	<?php } ?>
                        </span>
                    </div><!-- /inside -->
                </div> <!-- Final Títol -->
                <!-- WYSIWYG -->
                <div class="postbox closed">
                    <div class="handlediv" title="Click to toggle."><br></div>
                    <h3 class="hndle"><div class="dashicons dashicons-arrow-right-alt2"></div>&nbsp;
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								Editor de contenido WYSIWYG
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								Editor de contingut WYSIWYG
							<?php }else{ //english ?>
								Content Editor WYSIWYG
							<?php }
                    	}else{//Not activeQtrans?>
                            Editor de contenido WYSIWYG
                        <?php } ?>
                    </h3>
                    <div class="inside">
                    	<a title="help_posts_new_wysiwyg" id="help_posts_new_wysiwyg"></a>
                        <!-- Cridem la info del WYSIWYG ******************************* -->
    					<?php include_once(plugin_dir_path( __FILE__ ) . 'help_posts_wysiwyg.php');?>
                    </div><!-- /inside -->
                </div> <!-- WYSIWYG -->
                <!-- Extracte -->
                <div class="postbox closed">
                    <div class="handlediv" title="Click to toggle."><br></div>
                    <h3 class="hndle"><div class="dashicons dashicons-arrow-right-alt2"></div>&nbsp;
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								Extracto (Resumen de la noticia)
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								Extracte (Resum de la notícia)
							<?php }else{ //english ?>
								Post Excerpt 
							<?php }
						}else{//Not activeQtrans?>
                            Extracto (Resumen de la noticia)
                        <?php } ?>
                    </h3>
                    <div class="inside">
                    	<a title="help_posts_new_excerpt" id="help_posts_new_excerpt"></a>
                    	<h4><b>
							<?php if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){	?>
									El Extracto es un elemento FUNDAMENTAL para el rendimiento del contenido de la página en internet: además de funcionar como resumen de la noticia y aparecer cmom tal dentro de varias secciones de la web, este bloque de texto será el que aparece al compartir la noticias en las redes sociales (Facebook, Twitter, etc...) y en los resultados de la búsqueda de Google y otros buscadores. 
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
									L'Extracte és un element FONAMENTAL pel rendiment del contingut de la pàgina a internet: a més de funcionar com a resum de la notícia i aparèixer com a tal dins de diverses seccions del web, qaquest bloc de text será el que apareixerà en compartir les notícies a les xarxes socials (Facebook, Twitter, etc...) i als resultats de cerca de Google i altres cercadors. 
								<?php }else{ //english ?>
									Excerpt Description
								<?php }
                            }else{//Not activeQtrans?>
                                El Extracto es un elemento FUNDAMENTAL para el rendimiento del contenido de la página en internet: además de funcionar como resumen de la noticia y aparecer cmom tal dentro de varias secciones de la web, este bloque de texto será el que aparece al compartir la noticias en las redes sociales (Facebook, Twitter, etc...) y en los resultados de la búsqueda de Google y otros buscadores. 
                            <?php } ?>
                      	</b></h4>
                        <p><br />
							<?php if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){	?>
									<strong>Para rellenar el extracto resumiremos el contenido principal de la noticia, intentando utilizar palabras clave relacionadas con la misma.</strong></p>
									<p><strong>La longitud óptima del extracto es de entre 150 y 220 caracteres</strong>, por lo que nos guiaremos por el contador de caracteres que aparece al lado del campo de texto.</p>
									<p><strong>Crearemos un extracto para cada idioma</strong>, conmutando el visionado del mismo mediante el icono de la bandera de cada lengua (el idioma activo aparece con colores más vívidos).
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
									<strong>Per emplenar l'extracte resumirem el contingut principal de la notícia, intentant emprar paraules clau relaciones amb el seu contingut.</strong></p>
									<p><strong>La longitud òptima de l'extracte és d'entre 150 i 220 caràcters</strong>, pel que ens guiarem pel comptador de caràcters que apareix al costat del camp de text.</p>
									<p><strong>Crearem un  extracte per a cada idioma</strong>, commutant el seu visionat mitjançant la icona de la bandera relativa a cada llengua (l'idioma actiu apareix amb colors més vius).
								<?php }else{ //english ?>
									Excerpt Description
								<?php }
                            }else{//Not activeQtrans?>
                                <strong>Para rellenar el extracto resumiremos el contenido principal de la noticia, intentando utilizar palabras clave relacionadas con la misma.</strong></p>
									<p><strong>La longitud óptima del extracto es de entre 150 y 220 caracteres</strong>, por lo que nos guiaremos por el contador de caracteres que aparece al lado del campo de texto.</p>
									<p><strong>Crearemos un extracto para cada idioma</strong>, conmutando el visionado del mismo mediante el icono de la bandera de cada lengua (el idioma activo aparece con colores más vívidos).
                            <?php } ?>
							<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02c.gif" />' ?>
                      	</p>
                        <span class="closer"><div class="dashicons dashicons-dismiss"></div>
							<?php if (function_exists('qtrans_getLanguage')){
                            	if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS > Añadir (Edicion de la Noticia) > Extracto</em>"
                                <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>POSTS > Afegeix (Edició de la Notícia) > Extracte</em>"
                                <?php }else{ //english ?>CLOSE
                                <?php }
                        	}else{//Not activeQtrans?>
                            	CERRAR "<em>POSTS > Añadir (Edicion de la Noticia) > Extracto</em>"
                            <?php } ?>
                        </span>
                    </div><!-- /inside -->
                </div> <!-- Extracte -->
                <!-- Imatge Destacada -->
                <div class="postbox closed">
                    <div class="handlediv" title="Click to toggle."><br></div>
                    <h3 class="hndle"><div class="dashicons dashicons-arrow-right-alt2"></div>&nbsp;
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								Imagen Destacada (Featured Image)
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								Imatge Destacada (Featured Image)
							<?php }else{ //english ?>
								Featured Image 
							<?php }
                        }else{//Not activeQtrans?>
                            Imagen Destacada (Featured Image)
                        <?php } ?>
                    </h3>
                    <div class="inside">
                    	<a title="help_posts_new_featuredimg" id="help_posts_new_featuredimg"></a>
                        <!-- Intro -->
                        <p><b>
							<?php if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){	?>
									La Imagen Destacada es un elemento gráfico importante, ya que ayuda a  potenciar el lenguaje visual de la web y se utiliza para crear una miniatura de la noticia cuando la compartimos en las redes sociales.</b></p>
									<p>A la hora de escoger una imagen destacada podemos prescindir ligeramente de la literalidad de la misma, y nos centraremos principalmente en que tenga una relación aparente con la noticia y que resulte atractiva y representativa del tema que estamos tratando.
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
									La Imatge Destacada és un element gràfic important, ja que ajuda a potenciar el llenguatge visual de la web i s'utilitza per crear una miniatura de la notícia quan la compartim a les xarxes socials.</b></p>
								   <p> A l'hora de triar la  imatge destacada, podem prescindir una mica de la literalitat de la mateixa, i ens centrarem principalment en que tingui una relació aparent amb la notícia i que resulti atractiva i representativa pel tema que tractem.
								<?php }else{ //english ?>
									Featured Image Intro</b>
								<?php }
                      		}else{//Not activeQtrans?>
                                La Imagen Destacada es un elemento gráfico importante, ya que ayuda a  potenciar el lenguaje visual de la web y se utiliza para crear una miniatura de la noticia cuando la compartimos en las redes sociales.</b></p>
								<p>A la hora de escoger una imagen destacada podemos prescindir ligeramente de la literalidad de la misma, y nos centraremos principalmente en que tenga una relación aparente con la noticia y que resulte atractiva y representativa del tema que estamos tratando.
                            <?php } ?>
                        </p>
                        <!-- Eligiendo la Imagen Óptima -->
                        <p><br />
							<?php if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){	?>
									<strong>ELIGIENDO LA IMAGEN ÓPTIMA</strong></p>
									<p>El formato de la imagen es de 960x480 píxeles (formato apaisado).<br />
									Si no disponemos de una imagen adecuada para la notícia, podemos utilizar el buscador de imágenes de Google.</p>
									<p><a href="https://www.google.es/imghp?as_st=y&tbm=isch&as_q=&as_epq=&as_oq=&as_eq=&cr=countryES&as_sitesearch=&safe=images&tbs=ctr:countryES,isz:lt,islt:svga,iar:w" target="_blank"> BUSCADOR DE IMÁGENES DE GOOGLE </a> <div class="dashicons dashicons-share-alt2"></div></p>
									<p>Cuando encontremos una imagen adecuada, clicamos sobre ella y se nos abrirá un recuadro con la imagen a gran tamaño. Clicaremos sobre el botón VER IMAGEN, situado a la derecha.<br /><strong>La imagen se nos abrirá el navegador y ya podremos guardarlas en nuestro disco duro (botón derecho > guardar Imagen).</strong><br />
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
									<strong>TRIANT LA IMATGE ÒPTIMA</strong></p>
									<p>El format de la imatge és de 960x480 píxels (format apaïsat).<br />
									Si no disposem d'una imatge adequada per a la notícia, podem utilitzar el cercador d'imatges de Google.</p>
									<p><a href="https://www.google.es/imghp?as_st=y&tbm=isch&as_q=&as_epq=&as_oq=&as_eq=&cr=countryES&as_sitesearch=&safe=images&tbs=ctr:countryES,isz:lt,islt:svga,iar:w" target="_blank"> BUSCADOR D'IMATGES DE GOOGLE </a> <div class="dashicons dashicons-share-alt2"></div></p>
									<p>Quan trobem una imatge adequada, fem clic sobre ella i se'ns obrirà un requadre amb la imatge en mida gran. Clicarem sobre el botó VER IMAGEN, situat a la dreta.<br /><strong>La imatge s'obrirà al navegador i ja podem guardar-la al nostre disc dur (botó dret > Guardar Imagen).</strong><br />
								<?php }else{ //english ?>
									Excerpt Description
								<?php }
                            }else{//Not activeQtrans?>
                                <strong>ELIGIENDO LA IMAGEN ÓPTIMA</strong></p>
                                <p>El formato de la imagen es de 960x480 píxeles (formato apaisado).<br />
                                Si no disponemos de una imagen adecuada para la notícia, podemos utilizar el buscador de imágenes de Google.</p>
                                <p><a href="https://www.google.es/imghp?as_st=y&tbm=isch&as_q=&as_epq=&as_oq=&as_eq=&cr=countryES&as_sitesearch=&safe=images&tbs=ctr:countryES,isz:lt,islt:svga,iar:w" target="_blank"> BUSCADOR DE IMÁGENES DE GOOGLE </a> <div class="dashicons dashicons-share-alt2"></div></p>
                                <p>Cuando encontremos una imagen adecuada, clicamos sobre ella y se nos abrirá un recuadro con la imagen a gran tamaño. Clicaremos sobre el botón VER IMAGEN, situado a la derecha.<br /><strong>La imagen se nos abrirá el navegador y ya podremos guardarlas en nuestro disco duro (botón derecho > guardar Imagen).</strong><br />
                            <?php } ?>
							<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02d.gif" />' ?>
                      	</p>
                        <!-- Insertando la Imagen al Post -->
                        <p><br />
							<?php if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){	?>
									<strong>INSERTANDO LA IMAGEN EN EL POST</strong></p>
									<p>Pulsamos en <strong>ASIGNAR IMAGEN DESTACADA</strong>.<br />
									Se nos abrirá una ventana en la que tenemos 2 opciones para elegir la imagen destacada (cambiamos el sistema para elegir la imagen mediante las pestañas de la parte superior).<br />
									<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02e.gif" />' ?>
									</p>
									<p><strong>1/ From Computer</strong> > Subir un archivo desde nuestro disco duro.<br />
									Podemos arrastrar el archivo desde el Sistema Operativo dentro del cuadro o bien pulsar el botón <strong>SELECCIONAR ARCHIVO</strong> y buscarlo.<br />
									<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02f.gif" />' ?>
									</p>
									<p><strong>2/ Librería Multimedia</strong> > Elegir una imagen desde la Galería Multimedia de nuestro Wordpress.<br />
									Nos aparece el listado de los elementos multimedia disponibles en nuestra galería. Hemos de pulsar sobre el enlace <strong>SHOW</strong> del archivo que queramos insertar.<br />
									<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02f2.gif" />' ?>
									</p>
									<!-- Avís Mida Imatges --> 
									<div class="msg_updated"><p><b>NOTA: Debemos tener en cuenta que no todas las imágenes de la galería tendrán el tamaño adecuado para funcionar como Imagen Destacada.   </b></p></div><!-- /Avís Mida Imatges -->
									<p><a href="#help_media"><strong>Más información acerca de la gestión de la Galería Multimedia (Media) ></strong></a></p><br />
									<p><br /><strong>Una vez elegida la imagen, se nos expandirá un nuevo menú con más opciones. Debemos completar:</strong></p>
									<ol>
										<li>Título para la Imagen.</li>
										<li>Texto Alternativo: Este campo también debemos completarlo. Podemos usar el mismo texto que en el Título.</li>
										<li>Pulsamos sobre el enlace ”USAR COMO IMAGEN DESTACADA”</li>
										<li>Cerramos el menú con el botón superior de la derecha (cruz de cerrar).</li>
									</ol>
									<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02g.gif" />' ?>
									<p><br /><strong>ELIMINAR LA IMAGEN DESTACADA</strong>.</p>
									<p>Podemos cancelar la Imagen Destacada pulsando sobre el botón “ELIMINAR IMAGEN DESTACADA”.<br />
									Para insertar una nueva Imagen Destacada repetiremos de nuevo el procedimiento.</p>
									<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02h.gif" />' ?>
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
									<strong>INSERINT LA IMATGE AL POST</strong></p>
									<p>Premem sobre <strong>SET FEATURED IMAGE</strong>.<br />
									Se'ns obrirà una finestra en la que tenim 2 opcions per triar la imatge destacada (canviem el sistema per escollir la imatge mitjançant les pestanyes de la part superior).<br />
									<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02e.gif" />' ?>
									</p>
									<p><strong>1/ From Computer</strong> > Pujar un arxiu des del disc dur.<br />
									Podem arrossegar l'arxiu des del Sistema Operatiu a dins del quadre o bé prémer el botó <strong>SELECT FILES</strong> i cercar-lo.<br />
									<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02f.gif" />' ?>
									</p>
									<p><strong>2/ Librería Multimedia</strong> > Triar una imatge des de la Galeria Multimèdia del nostre WordPress.<br />
									Ens apareix el llistat d'elements multimèdia disponibles a la nostra galeria. Hem de prémer l'enllaç <strong>SHOW</strong> del arxiu que volguem utilitzar.<br />
									<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02f2.gif" />' ?>
									</p>
				<!-- Avís Mida Imatges --> 
									<div class="msg_updated"><p><b>NOTA: Cal tenir en compte que no totes les imatges de la galeria tindran la mida òptima per a ser una Imatge Destacada.</b></p></div><!-- /Avís Mida Imatges -->
									<p><a href="#help_media"><strong>Més informació sobre la gestió de la Galeria Multimèdia (Mèdia) ></strong></a></p><br />
									<p><br /><strong>Un cop tinguem escollida la imatge se'ns expandirà un nou menú amb més opcions. Haurem de completar:</strong></p>
									<ol>
										<li>Títol: Un títol per la Imatge.</li>
										<li>Text Alternatiu: Aquest camp també l'haurem d'emplenar. Podem utilitzar el mateix text que al Títol.</li>
										<li>Premem l'enllaç “<strong>USEU COM A IMATGE DESTACADA</strong>”</li>
										<li>Tanquem el menú amb el botó superior dret (creu de tancar).</li>
									</ol>
									<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02g.gif" />' ?>
									<p><br /><strong>ELIMINAR LA IMATGE DESTACADA</strong>.</p>
									<p>Podem cancel·lar la imatge destacada prement al botó “<strong>REMOVE FEATURED IMAGE</strong>”.<br />
									Per inserir una nova Imatge Destacada podem repetir el procés de nou.</p>
									<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02h.gif" />' ?>
								<?php }else{ //english ?>
									Excerpt Description
								<?php }
                    		}else{//Not activeQtrans?>
                            	<strong>INSERTANDO LA IMAGEN EN EL POST</strong></p>
                                <p>Pulsamos en <strong>ASIGNAR IMAGEN DESTACADA</strong>.<br />
                                Se nos abrirá una ventana en la que tenemos 2 opciones para elegir la imagen destacada (cambiamos el sistema para elegir la imagen mediante las pestañas de la parte superior).<br />
                                <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02e.gif" />' ?>
                                </p>
                                <p><strong>1/ From Computer</strong> > Subir un archivo desde nuestro disco duro.<br />
                                Podemos arrastrar el archivo desde el Sistema Operativo dentro del cuadro o bien pulsar el botón <strong>SELECCIONAR ARCHIVO</strong> y buscarlo.<br />
                                <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02f.gif" />' ?>
                                </p>
                                <p><strong>2/ Librería Multimedia</strong> > Elegir una imagen desde la Galería Multimedia de nuestro Wordpress.<br />
                                Nos aparece el listado de los elementos multimedia disponibles en nuestra galería. Hemos de pulsar sobre el enlace <strong>SHOW</strong> del archivo que queramos insertar.<br />
                                <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02f2.gif" />' ?>
                                </p>
                                <!-- Avís Mida Imatges --> 
                                <div class="msg_updated"><p><b>NOTA: Debemos tener en cuenta que no todas las imágenes de la galería tendrán el tamaño adecuado para funcionar como Imagen Destacada.   </b></p></div><!-- /Avís Mida Imatges -->
                                <p><a href="#help_media"><strong>Más información acerca de la gestión de la Galería Multimedia (Media) ></strong></a></p><br />
                                <p><br /><strong>Una vez elegida la imagen, se nos expandirá un nuevo menú con más opciones. Debemos completar:</strong></p>
                                <ol>
                                    <li>Título para la Imagen.</li>
                                    <li>Texto Alternativo: Este campo también debemos completarlo. Podemos usar el mismo texto que en el Título.</li>
                                    <li>Pulsamos sobre el enlace ”USAR COMO IMAGEN DESTACADA”</li>
                                    <li>Cerramos el menú con el botón superior de la derecha (cruz de cerrar).</li>
                                </ol>
                                <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02g.gif" />' ?>
                                <p><br /><strong>ELIMINAR LA IMAGEN DESTACADA</strong>.</p>
                                <p>Podemos cancelar la Imagen Destacada pulsando sobre el botón “ELIMINAR IMAGEN DESTACADA”.<br />
                                Para insertar una nueva Imagen Destacada repetiremos de nuevo el procedimiento.</p>
                                <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02h.gif" />' ?>
                            <?php } ?>
                        <br />
                        <span class="closer"><div class="dashicons dashicons-dismiss"></div>
							<?php if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS > Añadir (Edicion de la Noticia) > Imagen Destacada</em>"
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>POSTS > Afegeix (Edició de la Notícia) > Imatge Destacada</em>"
								<?php }else{ //english ?>CLOSE
								<?php }
                        	}else{//Not activeQtrans ?>
								CERRAR "<em>POSTS > Añadir (Edicion de la Noticia) > Imagen Destacada</em>"
							<?php } ?>
                        </span>
                    </div><!-- /inside -->
                </div> <!-- Imatge Destacada -->
                <!-- Categoria -->
                <div class="postbox closed">
                    <div class="handlediv" title="Click to toggle."><br></div>
                    <h3 class="hndle"><div class="dashicons dashicons-arrow-right-alt2"></div>&nbsp;
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								Categoría
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								Categoria
							<?php }else{ //english ?>
								Category
							<?php }
                        }else{//Not activeQtrans ?>
                            Categoría
                        <?php } ?>
                    </h3>
                    <div class="inside">
                    	<a title="help_posts_new_cats" id="help_posts_new_cats"></a>
                        <!-- Avís Crear Categoria --> 
                        <div class="msg_updated"><p><b>
                            <?php if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){	?>
									Este sub-apartado únicamente explica como categorizar una noticia durante su edición. <br />
									Para crear nuevas categorías consulta el apartado <strong><a href="#help_posts_categories">CATEGORÍAS</a></strong>.
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
									Aquest sub-apartat només explica com categoritzar una notícia durant la seva edició. <br />Per crear noves categories consulta l'apartat <strong><a href="#help_posts_categories">CATEGORIES</a></strong>.
								<?php }else{ //english ?>
									Categories
								<?php }
                            }else{//Not activeQtrans ?>
                            	Este sub-apartado únicamente explica como categorizar una noticia durante su edición. <br />
                                Para crear nuevas categorías consulta el apartado <strong><a href="#help_posts_categories">CATEGORÍAS</a></strong>.
                        	<?php } ?>
                        </b></p>
                        </div><!-- Avís Crear Categoria -->
                        <h4>
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								En la pantalla de edición de la entrada, nos dirigimos al panel <strong>Categorías</strong> y marcamos aquellas acordes con el contenido de la noticia.
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								A la pantalla d'edició de l'entrada, ens dirigim al panell de <strong>Categories</strong> i marquem aquelles opcions que concorden amb el contingut de la notícia.
							<?php }else{ //english ?>
								Intro new categories
							<?php }
                        }else{//Not activeQtrans ?>
                            En la pantalla de edición de la entrada, nos dirigimos al panel <strong>Categorías</strong> y marcamos aquellas acordes con el contenido de la noticia.
                        <?php } ?>
                      </h4>
						<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02i.gif" />' ?>
                        <p>
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								<strong>NOTA 1</strong>: Es recomendable (aunque no obligatorio) <strong>utilizar sólo 1 categoría para cada noticia</strong> y así lograr una jerarquización del contenido más sencilla. Se pueden usar las ETIQUETAS para concretar las temáticas de la noticia.
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								<strong>NOTA 1</strong>: És recomanable (malgrat no ser obligatori) <strong>utilitzar només 1 categoria per a cada notícia</strong> i així assolir una jerarquització del contingut més senzilla. Podem utilitzar ETIQUETES per a concretar les temàtiques de la notícia.
							<?php }else{ //english ?>
								NOTE 1
							<?php }
                        }else{//Not activeQtrans ?>
                            <strong>NOTA 1</strong>: Es recomendable (aunque no obligatorio) <strong>utilizar sólo 1 categoría para cada noticia</strong> y así lograr una jerarquización del contenido más sencilla. Se pueden usar las ETIQUETAS para concretar las temáticas de la noticia.
                        <?php } ?>
                        </p>
                        <p>
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								<strong>NOTA 2</strong>: Pese a que el panel permite crear nuevas categorías, desde esta sección no podremos redactar su descripción, ni elegir el icono de la misma ni realizar su traducción en otro idioma para estas tareas ver <strong><a href="#help_posts_categories">CATEGORÍAS</a></strong>).
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								<strong>NOTA 2</strong>: Malgrat que aquest panell permet crear noves categories, des d'aquesta secció no podrem redactar-ne la descripció, ni escollir la seva icona ni realitzar-ne la traducció a un altre idioma (per aquestes tasques consulteu <strong><a href="#help_posts_categories">CATEGORIES</a></strong>).
							<?php }else{ //english ?>
								NOTE 2
                        <?php }
                        }else{//Not activeQtrans ?>
                            <strong>NOTA 2</strong>: Pese a que el panel permite crear nuevas categorías, desde esta sección no podremos redactar su descripción, ni elegir el icono de la misma ni realizar su traducción en otro idioma para estas tareas ver <strong><a href="#help_posts_categories">CATEGORÍAS</a></strong>).
                        <?php } ?>
                        </p>
                        <span class="closer"><div class="dashicons dashicons-dismiss"></div>
                        	<?php if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS > Añadir (Edicion de la Noticia) > Categoria</em>"
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>POSTS > Afegeix (Edició de la Notícia) > Categoria</em>"
								<?php }else{ //english ?>CLOSE
								<?php }
                            }else{//Not activeQtrans ?>
                            	CERRAR "<em>POSTS > Añadir (Edicion de la Noticia) > Categoria</em>"
                        	<?php } ?>
                        </span>
                    </div><!-- /inside -->
                </div> <!-- Categoria -->
                <!-- Etiquetes -->
                <div class="postbox closed">
                    <div class="handlediv" title="Click to toggle."><br></div>
                    <h3 class="hndle"><div class="dashicons dashicons-arrow-right-alt2"></div>&nbsp;
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								Etiquetas
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								Etiquetes
							<?php }else{ //english ?>
								Tags
							<?php }
                    	}else{//Not activeQtrans ?>
                            Etiquetas
                        <?php } ?>
                    </h3>
                    <div class="inside">
                    	<a title="help_posts_new_tags" id="help_posts_new_tags"></a>
                        <!-- Avís Crear Etiquetes --> 
                        <div class="msg_updated"><p><b>
                        	<?php if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){	?>
									Este sub-apartado únicamente explica como etiquetar una noticia durante su edición. <br />
									Para crear nuevas etiquetas consulta el apartado <strong><a href="#help_posts_tags">ETIQUETAS</a></strong>.
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
									Aquest sub-apartat només explica com etiquetar una notícia durant la seva edició. <br />
									Per crear noves etiquetes consulta l'apartat <strong><a href="#help_posts_tags">ETIQUETES</a></strong>.
								<?php }else{ //english ?>
									Tags
								<?php }
                        	}else{//Not activeQtrans ?>
                                Este sub-apartado únicamente explica como etiquetar una noticia durante su edición. <br />
								Para crear nuevas etiquetas consulta el apartado <strong><a href="#help_posts_tags">ETIQUETAS</a></strong>.
                            <?php } ?>
                        </b></p>
                        </div><!-- Avís Crear Etiquetes -->
                        <h4>
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								En la pantalla de edición de la entrada, nos dirigimos al panel <strong>Etiquetas</strong>. Disponemos de las siguientes opciones:
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								A la pantalla d'edició de l'entrada, ens dirigim al panell de <strong>Etiquetes.</strong>. Disposem de les següents opcions:
							<?php }else{ //english ?>
								Intro new tags
							<?php }
                        }else{//Not activeQtrans ?>
                           En la pantalla de edición de la entrada, nos dirigimos al panel <strong>Etiquetas</strong>. Disponemos de las siguientes opciones:
                        <?php } ?>
                     	</h4>
                        <ol>
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								<li><strong>Introducir la etiqueta en el campo de texto</strong>. Podemos incluir varias, separadas por comas.</li>
								<li><strong>Elegir entre las etiquetas más utilizadas</strong>. Si clicamos sobre este enlace se nos desplegará un menú con todas las etiquetas existentes en el blog, ordenadas alfabéticamente e indicando su importancia (a mayor uso, más tamaño).</li>
								<li><strong>Listado de etiquetas seleccionadas para esta noticia</strong>. Podemos eliminarlas pulsando sobre <div class="dashicons dashicons-dismiss"></div>.</li>
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								<li><strong>Introduir l'etiqueta al camp de text</strong>. En podem incloure més d'una, separades per comes.</li>
								<li><strong>Trieu una de les etiquetes més utilitzades</strong>. Si cliquem sobre aquest enllaç se'ns desplegarà un menú amb totes les etiquetes existents al blog, ordenades alfabèticament i indicant la seva importància (a major ús, major mida).</li>
								<li><strong>Llistat d'etiquetes seleccionades per aquesta notícia</strong>. Podem eliminar-les prement sobre <div class="dashicons dashicons-dismiss"></div>.</li>
							<?php }else{ //english ?>
								<li></li>
							<?php }
                        }else{//Not activeQtrans ?>
                        	<li><strong>Introducir la etiqueta en el campo de texto</strong>. Podemos incluir varias, separadas por comas.</li>
							<li><strong>Elegir entre las etiquetas más utilizadas</strong>. Si clicamos sobre este enlace se nos desplegará un menú con todas las etiquetas existentes en el blog, ordenadas alfabéticamente e indicando su importancia (a mayor uso, más tamaño).</li>
                        <?php } ?>
                        </ol>
						<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02j.gif" />' ?>
                        <p>
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								<strong>NOTA</strong>: Si hemos creado una nueva etiqueta mediante el <strong>campo de texto (1)</strong> tendremos que realizar su traducción y redactar su descripción en el apartado <strong><a href="#help_posts_tags">ETIQUETAS</a></strong>.
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								<strong>NOTA</strong>: Si hem creat una nova etiqueta mitjançant el <strong>camp de text (1)</strong> haurem de realitzar la seva traducció i redactar la seva descripció a l'apartat <strong><a href="#help_posts_tags">ETIQUETES</a></strong>.
							<?php }else{ //english ?>
								NOTE
							<?php }
                        }else{//Not activeQtrans ?>
                        	<strong>NOTA</strong>: Si hemos creado una nueva etiqueta mediante el <strong>campo de texto (1)</strong> tendremos que realizar su traducción y redactar su descripción en el apartado <strong><a href="#help_posts_tags">ETIQUETAS</a></strong>.
                        <?php } ?>
                        </p>
                        <span class="closer"><div class="dashicons dashicons-dismiss"></div>
                        	<?php if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS > Añadir (Edicion de la Noticia) > Etiquetas</em>"
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR  "<em>POSTS > Afegeix (Edició de la Notícia) > Etiquetes</em>"
								<?php }else{ //english ?>CLOSE
								<?php } 
                            }else{//Not activeQtrans ?>
                                CERRAR "<em>POSTS > Añadir (Edicion de la Noticia) > Etiquetas</em>"
                            <?php } ?>
                        </span>
                    </div><!-- /inside -->
                </div> <!-- Etiquetes -->
                <!-- Opcions Publicació -->
                <div class="postbox closed">
                    <div class="handlediv" title="Click to toggle."><br></div>
                    <h3 class="hndle"><div class="dashicons dashicons-arrow-right-alt2"></div>&nbsp;
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								Publica (opciones de Publicación)
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								Publica (opcions de Publicació)
							<?php }else{ //english ?>
								Publish options
							<?php }
                    	}else{//Not activeQtrans ?>
                            Publica (opciones de Publicación)
                        <?php } ?>
                    </h3>
                    <div class="inside">
                    	<a title="help_posts_new_publish" id="help_posts_new_publish"></a>
                        <h4>
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								Este panel controla parámetros relacionados con temas editoriales.
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								Aquest panell controla paràmetres relatius a temes editorials.
							<?php }else{ //english ?>
								Intro Publish
							<?php }
                        }else{//Not activeQtrans ?>
                            Este panel controla parámetros relacionados con temas editoriales.
                        <?php } ?>
                     	</h4>
                        <p><strong>
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								Botones del Panel:
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								Botones del Panell:
							<?php }else{ //english ?>
								Intro Publish
							<?php }
                        }else{//Not activeQtrans ?>
                            Botones del Panel:
                        <?php } ?>
                        </strong></p>
                        <ul>
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								<li><strong>PUBLICAR / ACTUALIZAR</strong>: Con este botón publicamos la noticia (cuando esta es nueva) o actualizamos los cambios realizados a posteriori de su publicación.</li>
								<li><strong>VISTA PREVIA</strong>: Nos permite visualizar la entrada antes de realizar su publicación o ver los cambios que hayamos realizado a posteriori antes de aprobarlos.</li>
								<li><strong>Move to Trash</strong>: Elimina la entrada y la manda a la papelera.<br />
								En caso de querer recuperar una entrada eliminada por error lo haremos mediante el menú<strong><a href="#help_posts_all_trash"> Todas las Entradas (Gestión)</a></strong>.</li>
								<li><strong>GUARDAR BORRADOR</strong>: Si estamos editando una entrada que no ha sido publicada, nos aparecerá  este botón por si queremos salvar el trabajo de edición realizado sin perder los cambios.</li>
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								<li><strong>PUBLICAR / ACTUALITZAR</strong>: Amb aquest botó publiquem la notícia (quan és nova) o actualitzem els canvis que haguem realitzat amb posterioritat de la seva publicació.</li>
								<li><strong>PREVISUALITZA</strong>: Permet visualitzar la entrada abans de fer-ne la publicació o veure els canvis realitzats amb una edició posterior a la seva publicació abans d'aprovar-los.</li>
								<li><strong>Move to Trash</strong>: Elimina l'Entrada i l'envia a la Paperera.<br />
								Per recuperar una entrada eliminada per error ho farem mitjançant el menú <strong><a href="#help_posts_all_trash">Totes les Entrades (Gestió)</a></strong>.</li>
								<li><strong>DESA L'ESBORRANY</strong>: Si estem editant una entrada que encara no ha estat publicada, ens apareixerà aquest botó per si volem desar el treball d'edició realitzat sense perdre els canvis.</li>
							<?php }else{ //english ?>
								<li></li>
							<?php }
						}else{//Not activeQtrans ?>
                            <li><strong>PUBLICAR / ACTUALIZAR</strong>: Con este botón publicamos la noticia (cuando esta es nueva) o actualizamos los cambios realizados a posteriori de su publicación.</li>
                            <li><strong>VISTA PREVIA</strong>: Nos permite visualizar la entrada antes de realizar su publicación o ver los cambios que hayamos realizado a posteriori antes de aprobarlos.</li>
                            <li><strong>Move to Trash</strong>: Elimina la entrada y la manda a la papelera.<br />
                            En caso de querer recuperar una entrada eliminada por error lo haremos mediante el menú<strong><a href="#help_posts_all_trash"> Todas las Entradas (Gestión)</a></strong>.</li>
                            <li><strong>GUARDAR BORRADOR</strong>: Si estamos editando una entrada que no ha sido publicada, nos aparecerá  este botón por si queremos salvar el trabajo de edición realizado sin perder los cambios.</li>
                        <?php } ?>
                        </ul>
						<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02k.gif" />' ?><br />
						<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02k2.gif" />' ?><br /><br />
                        <p>
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								<strong>Status (Estado de la Noticia)</strong>. Pulsando el botón EDITAR podremos cambiarlo mediante el menú desplegable:
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								<strong>Status (Estat de la Notícia)</strong>. Prement el botó EDITAR podrem canviar-lo mitjançant el menú desplegable:
							<?php }else{ //english ?>
								Intro Publish
							<?php }
                        }else{//Not activeQtrans ?>
                            <strong>Status (Estado de la Noticia)</strong>. Pulsando el botón EDITAR podremos cambiarlo mediante el menú desplegable:
                        <?php } ?>
                        </p>
                        <ul>
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								<li><strong>Publicada</strong>: la noticia aparece en la web y la puede ver cualquier usuario.</li>
								<li><strong>Pendiente de Revisión</strong>: para grupos de edición, sólo los usuarios con rol igual o superior a Editor pueden publicarla.</li>
								<li><strong>Borrador</strong>: no aparece en la web pero sí en el listado de noticias del menú <strong>Todas las Entradas</strong> para su finalización y posterior edición.</li>
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								<li><strong>Publicada</strong>: la notícia apareix al web i la pot veure qualsevol usuari.</li>
								<li><strong>Pendent de Revisió</strong>: per a grups d'edició, només els usuaris amb un rol igual o superior a Editor poden publicar-la.</li>
								<li><strong>Esborrany</strong>: no apareix al web però si al llistat de notícies del menú <strong>Totes les Entrades</strong> per a la seva finalització i posterior edició.</li>
							<?php }else{ //english ?>
								<li></li>
							<?php }
                        }else{//Not activeQtrans ?>
                            <li><strong>Publicada</strong>: la noticia aparece en la web y la puede ver cualquier usuario.</li>
                            <li><strong>Pendiente de Revisión</strong>: para grupos de edición, sólo los usuarios con rol igual o superior a Editor pueden publicarla.</li>
                            <li><strong>Borrador</strong>: no aparece en la web pero sí en el listado de noticias del menú <strong>Todas las Entradas</strong> para su finalización y posterior edición.</li>
                        <?php } ?>
                        </ul>
						<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02l.gif" />' ?><br /><br />
                        <p>
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								<strong>Visibility (Visibilidad de la noticia)</strong>. Pulsando el botón EDITAR se nos desplegará un menú con opciones:
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								<strong>Visibiliy (Visibilitat de la notícia)</strong>. Prement el botó EDITAR es desplega un menú amb opcions:
							<?php }else{ //english ?>
								Intro Publish
							<?php }
                        }else{//Not activeQtrans ?>
                            <strong>Visibility (Visibilidad de la noticia)</strong>. Pulsando el botón EDITAR se nos desplegará un menú con opciones:
                        <?php } ?>
                        </p>
                        <ul>
						<?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								<li><strong>Público</strong>: Todo el mundo puede ver esta entrada.</li>
								<li><strong>Stick this post on th front Page</strong>: Convierte la noticia en destacada (Ver <strong><a href="#help_posts_sticky">NOTICIAS DESTACADAS</a></strong>).</li>
								<li><strong>Password Protected</strong>: Entrada protegida con contraseña, sólo visible para aquellos que la conozcan.</li>
								<li><strong>Privada</strong>: Entrada solo visible para los gestores del blog.</li>
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								<li><strong>Públic</strong>: Tothom pot veure aquesta entrada.</li>
							  <li><strong>Stick this post on the front Page</strong>: Converteix la notícia en destacada (Veure <strong><a href="#help_posts_sticky">NOTÍCIES DESTACADES</a></strong>).</li>
								<li><strong>Password Protected</strong>: Entrada protegida amb contrasenya, només visible per aquells que la coneguin.</li>
								<li><strong>Privada</strong>: Entrada només visible pels gestors del blog.</li>
							<?php }else{ //english ?>
								<li></li>
							<?php }
						}else{//Not activeQtrans ?>
                            <li><strong>Público</strong>: Todo el mundo puede ver esta entrada.</li>
                            <li><strong>Stick this post on th front Page</strong>: Convierte la noticia en destacada (Ver <strong><a href="#help_posts_sticky">NOTICIAS DESTACADAS</a></strong>).</li>
                            <li><strong>Password Protected</strong>: Entrada protegida con contraseña, sólo visible para aquellos que la conozcan.</li>
                            <li><strong>Privada</strong>: Entrada solo visible para los gestores del blog.</li>
                        <?php } ?>
                        </ul>
						<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02m.gif" />' ?><br /><br />
                        <p>
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								<strong>Published on (Fecha de Publicación)</strong>. Pulsando el botón EDITAR se nos desplegará un menú dónde editar la fecha de publicación de la noticia (Mes / Día / Año @ Horas : Minutos).
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								<strong>Published on (Data de Publicació)</strong>. Prement el botó EDITAR se'ns desplegarà un menú on editar la data de publicació de la notícia (Mes / Dia / Any @ Hores : Minuts).
							<?php }else{ //english ?>
								Intro Publish
							<?php }
                        }else{//Not activeQtrans ?>
                            <strong>Published on (Fecha de Publicación)</strong>. Pulsando el botón EDITAR se nos desplegará un menú dónde editar la fecha de publicación de la noticia (Mes / Día / Año @ Horas : Minutos).
                        <?php } ?>
                        </p>
                        <p>
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								<strong>PUBLISH IMMADIATELY (Publicar inmediatamente)</strong>. Si estamos trabajando con una entrada no publicada (borrador), mediante el botón EDITAR podremos programar la noticia para que se publique en un futuro. Por defecto se publica al momento.
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								<strong>PUBLISH IMMEDIATELY (Publicar immediatament)</strong>. Si estem treballant amb una entrada no publicada (esborrany), mitjançant el botó EDITAR podrem programar una notícia per a que es publiqui en un futur. Per defecte es publica al moment.
							<?php }else{ //english ?>
								Intro Publish
							<?php }
						}else{//Not activeQtrans ?>
                            <strong>PUBLISH IMMADIATELY (Publicar inmediatamente)</strong>. Si estamos trabajando con una entrada no publicada (borrador), mediante el botón EDITAR podremos programar la noticia para que se publique en un futuro. Por defecto se publica al momento.
                        <?php } ?>
                        </p>
						<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_02n.gif" />' ?><br />
                        <span class="closer"><div class="dashicons dashicons-dismiss"></div>
                        	<?php if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS > Añadir (Edicion de la Noticia) > Opcions de Publicació</em>"
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>POSTS > Afegeix (Edició de la Notícia) > Opcions de Publicació</em>"
								<?php }else{ //english ?>CLOSE
								<?php }
                            }else{//Not activeQtrans ?>
                                CERRAR "<em>POSTS > Añadir (Edicion de la Noticia) > Opcions de Publicació</em>"
                            <?php } ?>
                        </span>
                    </div><!-- /inside -->
                </div> <!-- Opcions Publicació -->
                <span class="closer"><div class="dashicons dashicons-dismiss"></div>
					<?php if (function_exists('qtrans_getLanguage')){
						if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS > Añadir (Edicion de la Noticia)</em>"
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>POSTS > Afegeix (Edició de la Notícia)</em>"
						<?php }else{ //english ?>CLOSE
						<?php }
                    }else{//Not activeQtrans ?>
                        CERRAR "<em>POSTS > Añadir (Edicion de la Noticia)</em>"
                    <?php } ?>
                </span>
            </div><!-- /inside -->
        </div><!-- Final Nova Entrada -->
        <!-- Categories -->
        <div class="postbox closed">
            <div class="handlediv" title="Click to toggle."><br></div>
            <h3 class="hndle"><div class="dashicons dashicons-networking"></div>&nbsp;&nbsp;
            <?php if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){	?>
					Categorías
				<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
					Categories
				<?php }else{ //english ?>
					Categories
				<?php }
			}else{//Not activeQtrans ?>
                Categorías
            <?php } ?>
            </h3>
            <div class="inside">
            	<a title="help_posts_categories" id="help_posts_categories"></a>
            	<h4>
                <?php if (function_exists('qtrans_getLanguage')){
					if( qtrans_getLanguage() == 'es' ){	?>
						Cada entrada (noticia) se clasifica bajo una o varias categorías. Las categorías permiten la clasificación de las noticias en grupos y subgrupos, de tal manera que ayuden al visitante en la navegación y uso del sitio web.
					<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
						Cadascuna de les entrades (notícies) es classifica sota una o vàries categories. Les categories permeten la classificació de les notícies en grups i subgrups, de tal manera que ajuden a la navegació i l'ús del lloc web.
					<?php }else{ //english ?>
						Intro categories
					<?php }
                }else{//Not activeQtrans ?>
                    Cada entrada (noticia) se clasifica bajo una o varias categorías. Las categorías permiten la clasificación de las noticias en grupos y subgrupos, de tal manera que ayuden al visitante en la navegación y uso del sitio web.
                <?php } ?>
                </h4>
                <p>
                <?php if (function_exists('qtrans_getLanguage')){
					if( qtrans_getLanguage() == 'es' ){	?>
						Cada categoría puede tener una categoría “padre” para crear una jerarquía dentro de la estructura de categorías.
					<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
						Cada categoria pot tenir una categoria “pare” per crear una jerarquia dins de l'estructura de categories.
					<?php }else{ //english ?>
						Intro categories
					<?php }
				}else{//Not activeQtrans ?>
                    Cada categoría puede tener una categoría “padre” para crear una jerarquía dentro de la estructura de categorías.
                <?php } ?>
                </p>
                <!-- Avís Usar 1 categoria --> 
                <div class="msg_updated"><p><b>
                    <?php if (function_exists('qtrans_getLanguage')){
						if( qtrans_getLanguage() == 'es' ){	?>
							NOTA: Es recomendable utilizar únicamente SÓLO UNA CATEGORÍA para las noticias, así aseguraremos un correcto visionado del icono de la categoría.
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							NOTA: És recomanable utilitzar únicament UNA SOLA CATEGORIA per a les notícies, així assegurarem un correcte visionat de la icona de la categoria.
						<?php }else{ //english ?>
							New Post
						<?php }
					}else{//Not activeQtrans ?>
                        NOTA: Es recomendable utilizar únicamente SÓLO UNA CATEGORÍA para las noticias, así aseguraremos un correcto visionado del icono de la categoría.
                    <?php } ?>
                </b></p>
                </div><!-- Final Avís Usar 1 categoria -->
                <!-- Categoria Nueva --> 
                <div class="postbox closed">
                    <div class="handlediv" title="Click to toggle."><br></div>
                    <h3 class="hndle"><div class="dashicons dashicons-arrow-right-alt2"></div>&nbsp;&nbsp;
                    <?php if (function_exists('qtrans_getLanguage')){
						if( qtrans_getLanguage() == 'es' ){	?>
							Crear Nueva Categoría
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							Crear Nova Categoria
						<?php }else{ //english ?>
							Categories
						<?php }
                    }else{//Not activeQtrans ?>
                        Crear Nueva Categoría
                    <?php } ?>
                    </h3>
                    <div class="inside">
                        <a title="help_posts_categories_new" id="help_posts_categories_new"></a>
                        <h4>
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								La página <em>Posts > Categorías</em> contiene 2 menús. Utilizaremos el menú de la derecha (titulado “<em>Añadir nueva Categoría</em>”) para crear una nueva categoría, rellenando los siguientes campos:
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								La pàgina <em>Posts > Categories</em> conté 2 menús. Utilitzarem el menú de la dreta (titulat “<em>Afegir nova Categoria</em>”) per crear una nova categoria, omplint els següents camps:
							<?php }else{ //english ?>
								Intro categories
							<?php }
                        }else{//Not activeQtrans ?>
                            La página <em>Posts > Categorías</em> contiene 2 menús. Utilizaremos el menú de la derecha (titulado “<em>Añadir nueva Categoría</em>”) para crear una nueva categoría, rellenando los siguientes campos:
                        <?php } ?>
                        </h4>
                        <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_03a.gif" />' ?>
                        <ol>
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								<li><strong>Nombre (Idioma)</strong><br />
								Según la cantidad de idiomas que tengamos instalados en el WordPress, nos aparecerá un campo para cada idioma; en él pondremos el título de la categoría.<br />
								Los idiomas son <em>ES</em> > Castellano, <em>CA</em> > Catalán, <em>EN</em> > Inglés, etc...
								</li>
								<li><strong>Slug</strong><br />
								Este campo hacer referencia a la <em>URL</em> (dirección web) que tendrá la categoría que estamos creando.<br />
								<strong>Es un campo opcional</strong>, por lo que podemos dejarlo en blanco y que sea WordPress quien lo cree en función del nombre de la categoría.
								</li>
								<li><strong>Parent</strong><br />
								Este menú desplegable sirve para asignar una “<em>categoría padre</em>” a la categoría que estamos creando.<br />
								Si clicamos se nos desplegará un menú donde aparecerán el resto de categorías que ya están creadas, por lo que al elegir una, ésta será la categoría padre de la que actualmente estamos creando.<br />
								Si dejamos marcada la opción “<em>Ninguna</em>” (por defecto), la nueva categoría no tendrá categorías superiores.
								</li>
								<li><strong>Description</strong><br />
								La descripción de la categoría. Aunque algunos temas de WordPress no muestran esta información, <strong>siempre es recomendable rellenar el campo para lograr un buen rendimiento SEO</strong> (presencia en buscadores) de nuestra web.<br />
								Rellenaremos este campo explicando el contenido temático de las noticias que pertenecen a esta categoría, intentando utilizar palabras clave (relevantes con relación al contenido) y con una extensión aproximada de 150 caracteres.<br />
								<strong>Podemos crear descripciones en varios idiomas</strong><br />
								Para lograrlo, utilizaremos etiquetas de idioma para separar el contenido perteneciente a cada lengua. Introduciremos una descripción para cada idioma que esté instalado en nuestro WordPress. Por ejemplo:<br /><em><strong>[:es]</strong></em> Descripción en Castellano.<br /><em><strong>[:ca]</strong></em> Descripción en Catalán.<br /><em><strong>[:en]</strong></em> Descripción en Inglés.
								</li>
								<li><strong>Icono</strong><br />
								Algunas personalizaciones de WordPress permiten añadir un icono relacionado con la categoría.<br />
								Este servicio funciona gracias a Font-Awesome, cuyo listado de iconos disponible se puede consultar <a href="http://fortawesome.github.io/Font-Awesome/3.2.1/icons/" target="_blank"><strong>AQUÍ</strong></a> <div class="dashicons dashicons-share-alt2"></div>.<br />
								Una vez elijamos el icono de la lista, introduciremos el código correspondiente (por ejemplo <em>icon-shield</em> = <div class="dashicons dashicons-shield-alt"></div>).  Por defecto nos aparecerá el icono <em>icon-bookmark</em> ( <div class="dashicons dashicons-pressthis"></div> ).
							  </li>
							  <li>Pulsaremos el botón <strong>AÑADIR NUEVA CATEGORÍA</strong> para terminar con la creación de la categoría.</li>
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								<li><strong>Nom (Idioma)</strong><br />
								Segons la quantitat d'idiomes que tinguem instal·lats al WordPress, ens apareixerà un camp per a cada idioma; en cadascun d'ells introduirem el títol de la categoria.<br />
								Els idiomes son <em>ES</em> > Castellà, <em>CA</em> > Català, <em>EN</em> > Anglès, etc...
								</li>
								<li><strong>Slug</strong><br />
								Aquest camp fa referència a la URL (direcció web) que tindrà la categoria que estem creant. <br />
								<strong>És un camp opcional</strong> pel que podem deixar-lo en blanc i WordPress el crearà automàticament en funció del nom de la categoria.
								</li>
								<li><strong>Parent</strong><br />
								Aquest menú desplegable serveix per assignar una “categoria pare” a la categoria que estem creant.<br />
								Si cliquem se'ns desplegarà un menú on apareixen la resta de categories que ja estan creades, pel que al escollir una, serà la categoria pare de la que actualment estem creant.<br />
								Si deixem marcada la opció “<em>Ninguna</em>” (per defecte), la nova categoria no tindrà categories superiors.
								</li>
								<li><strong>Descrició</strong><br />
								La descripció de la categoria. Malgrat que alguns temes de WordPress no mostren aquesta informació, sempre és recomanable omplir el camp per aconseguir un bon rendiment SEO (presència als cercadors) del nostre web. <br />
								Omplirem aquest camp explicant el contingut temàtic de les noticies que pertanyen a aquesta categoria, intentant utilitzar paraules clau (rellevants en relació amb el contingut) i amb una extensió aproximada de 150 caràcters.<br />
								<strong>Podem crear descripcions en varis idiomes</strong><br />
								Per aconseguir-ho, utilitzarem etiquetes d'idioma per separar el contingut pertanyent a cada llengua. Introduirem una descripció per a cada idioma que tinguem instal·lat al nostre WordPress. Per exemple:<br /><em><strong>[:es]</strong></em> Descripció en Castellà.<br /><em><strong>[:ca]</strong></em> Descripció en Català.<br /><em><strong>[:en]</strong></em> Descripció en Anglès.
								</li>
								<li><strong>Icona</strong><br />
								Algunes personalitzacions de WordPress permeten afegir una icona relacionada amb la categoria.<br />
								Aquest servei funciona gràcies a Font-Awesome, i el llistat d'icones disponibles es pot consultar <a href="http://fortawesome.github.io/Font-Awesome/3.2.1/icons/" target="_blank"><strong>AQUÍ</strong></a> <div class="dashicons dashicons-share-alt2"></div>.<br />
								Un cop triem la icona de la llista, introduirem el codi corresponent (per exemple <em>icon-shield</em> = <div class="dashicons dashicons-shield-alt"></div>).  Per defecte ens apareixerà la icona <em>icon-bookmark</em> ( <div class="dashicons dashicons-pressthis"></div> ).
							  </li>
							  <li>Premerem el botó <strong>AFEGEIX</strong> per finalitzar la creació de la categoria.</li>
							<?php }else{ //english ?>
								Intro categories
							<?php }
                        }else{//Not activeQtrans ?>
                            <li><strong>Nombre (Idioma)</strong><br />
                            Según la cantidad de idiomas que tengamos instalados en el WordPress, nos aparecerá un campo para cada idioma; en él pondremos el título de la categoría.<br />
                            Los idiomas son <em>ES</em> > Castellano, <em>CA</em> > Catalán, <em>EN</em> > Inglés, etc...
                            </li>
                            <li><strong>Slug</strong><br />
                            Este campo hacer referencia a la <em>URL</em> (dirección web) que tendrá la categoría que estamos creando.<br />
                            <strong>Es un campo opcional</strong>, por lo que podemos dejarlo en blanco y que sea WordPress quien lo cree en función del nombre de la categoría.
                            </li>
                            <li><strong>Parent</strong><br />
                            Este menú desplegable sirve para asignar una “<em>categoría padre</em>” a la categoría que estamos creando.<br />
                            Si clicamos se nos desplegará un menú donde aparecerán el resto de categorías que ya están creadas, por lo que al elegir una, ésta será la categoría padre de la que actualmente estamos creando.<br />
                            Si dejamos marcada la opción “<em>Ninguna</em>” (por defecto), la nueva categoría no tendrá categorías superiores.
                            </li>
                            <li><strong>Description</strong><br />
                            La descripción de la categoría. Aunque algunos temas de WordPress no muestran esta información, <strong>siempre es recomendable rellenar el campo para lograr un buen rendimiento SEO</strong> (presencia en buscadores) de nuestra web.<br />
                            Rellenaremos este campo explicando el contenido temático de las noticias que pertenecen a esta categoría, intentando utilizar palabras clave (relevantes con relación al contenido) y con una extensión aproximada de 150 caracteres.<br />
                            <strong>Podemos crear descripciones en varios idiomas</strong><br />
                            Para lograrlo, utilizaremos etiquetas de idioma para separar el contenido perteneciente a cada lengua. Introduciremos una descripción para cada idioma que esté instalado en nuestro WordPress. Por ejemplo:<br /><em><strong>[:es]</strong></em> Descripción en Castellano.<br /><em><strong>[:ca]</strong></em> Descripción en Catalán.<br /><em><strong>[:en]</strong></em> Descripción en Inglés.
                            </li>
                            <li><strong>Icono</strong><br />
                            Algunas personalizaciones de WordPress permiten añadir un icono relacionado con la categoría.<br />
                            Este servicio funciona gracias a Font-Awesome, cuyo listado de iconos disponible se puede consultar <a href="http://fortawesome.github.io/Font-Awesome/3.2.1/icons/" target="_blank"><strong>AQUÍ</strong></a> <div class="dashicons dashicons-share-alt2"></div>.<br />
                            Una vez elijamos el icono de la lista, introduciremos el código correspondiente (por ejemplo <em>icon-shield</em> = <div class="dashicons dashicons-shield-alt"></div>).  Por defecto nos aparecerá el icono <em>icon-bookmark</em> ( <div class="dashicons dashicons-pressthis"></div> ).
                          </li>
                          <li>Pulsaremos el botón <strong>AÑADIR NUEVA CATEGORÍA</strong> para terminar con la creación de la categoría.</li>
                        <?php } ?>
                        </ol>
                        <br />
                        <span class="closer"><div class="dashicons dashicons-dismiss"></div>
                            <?php if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS > Categoría > Nueva Categoría</em>"
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>POSTS > Categoria > Categoria Nova</em>"
								<?php }else{ //english ?>CLOSE
								<?php }
                        	}else{//Not activeQtrans ?>
                            	CERRAR "<em>POSTS > Categoría > Nueva Categoría</em>"
                            <?php } ?>
						</span>
                    </div>
                </div><!-- /Categoria Nueva -->
                <!-- Gestionar las Categorías -->
                <div class="postbox closed">
                    <div class="handlediv" title="Click to toggle."><br></div>
                    <h3 class="hndle"><div class="dashicons dashicons-arrow-right-alt2"></div>&nbsp;&nbsp;
                    <?php if (function_exists('qtrans_getLanguage')){
						if( qtrans_getLanguage() == 'es' ){	?>
							Gestionar las Categorías
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							Gestionar les Categories
						<?php }else{ //english ?>
							Categories
						<?php }
                    }else{//Not activeQtrans ?>
                        Gestionar las Categorías
                    <?php } ?>
                    </h3>
                    <div class="inside">
                        <a title="help_posts_categories_gestio" id="help_posts_categories_gestio"></a>
                        <h4>
                        <?php if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){	?>
								El menú de la derecha de la página <em>Posts > Categorías</em> permite la gestión individual y en bloque de las categorías existentes.
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								El menú de la dreta de la pàgina Posts > Categories permet la gestió individual i en bloc de les categories existents.
							<?php }else{ //english ?>
								Intro categories
							<?php }
                        }else{//Not activeQtrans ?>
                            El menú de la derecha de la página <em>Posts > Categorías</em> permite la gestión individual y en bloque de las categorías existentes.
                        <?php } ?>
                        </h4>
                        <p>
                        <?php if (function_exists('qtrans_getLanguage')){ 
							if( qtrans_getLanguage() == 'es' ){	?>
								En este menú veremos una tabla con el listado de Categorías y sus características (Título, Descripción, Slug...).
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								Aquest menú presenta una taula amb el llistat de Categories i les seves característiques (Títol, Descripció, Slug...).
							<?php }else{ //english ?>
								Intro categories
							<?php } 
                        }else{//Not activeQtrans ?>
                            En este menú veremos una tabla con el listado de Categorías y sus características (Título, Descripción, Slug...).
                        <?php } ?>
                        </p>
                        <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_03b.gif" />' ?>
                        <ol>
                        <?php if (function_exists('qtrans_getLanguage')){ 
							if( qtrans_getLanguage() == 'es' ){	?>
								<li><strong>Gestión Individualizada</strong><br />
								Si colocamos el cursor sobre alguna fila de la tabla de categorías nos aparecerán 4 botones que nos permiten gestionar esta categoría en concreto:<br />
								<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_03c.gif" />' ?>
									<ul>
										<li><strong>EDITAR</strong><br />
										Abre una página de edición de los atributos de la categoría. El método de edición es el mismo que al <a href="#help_posts_categories_new"><strong>Crear nueva Categoría.</strong></a></li>
										<li><strong>QUICK EDIT</strong><br />
										Abre un pequeño menú dónde poder editar rápidamente los atributos de la categoría. <strong>Esta opción NO ES RECOMENDABLE ya que excluye los atributos multiidioma</strong>.</li>
										<li><strong>DELETE</strong><br />
										Permite borrar la categoría, por lo que las noticias categorizadas bajo la misma, dejarán de pertenecer a este grupo. <strong>Esta opción NO SE PUEDE DESHACER.</strong></li>
										<li><strong>VIEW</strong><br />
										Abre la página de archivo de la categoría, dónde aparecerán listadas todas las noticias que pertenecen al grupo, ordenadas de forma cronológica inversa. Si nos fijamos en la URL de esta página (dirección web, en la barra de direcciones del navegador) veremos como el <em>Slug</em> forma parte de dicha dirección y la <em>Descripción de la Categoría</em> aparece en la cabecera de la página.<br />
										<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_03d.gif" />' ?></li>
									</ul>
								</li>
								<li><strong>Gestión en Grupo</strong><br />
								<strong>Esta opción permite borrar varias categorías en bloque.</strong><br />
								Marcamos varias categorías (mediante los <em>checks</em> situados a la izquierda de cada fila de la tabla de Categorías) y en el menú desplegable de la parte superior (<em>Bulk Actions</em>) marcamos la opción <em><strong>DELETE</strong></em>. Pulsamos el botón <em><strong>APLICAR</strong></em> y confirmamos. <strong>Esta opción NO SE PUEDE DESHACER</strong>.<br />
								<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_03e.gif" />' ?>
								</li>
								<li><strong>Buscar Categorías</strong><br />
								<strong>Mediante la barra de buscar situada en la parte superior derecha podemos filtrar los resultados que aparecen en la Tabla de Categorías.</strong><br />
								Si ya hemos realizado un filtrado en la tabla, podemos eliminarlo mediante la cruz situada dentro del campo de búsqueda.<br />
								<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_03f.gif" />' ?>
								</li>
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								<li><strong>Gestió Individualitzada</strong><br />
								Si col·loquem el cursor sobre alguna fila de la taula de categories ens apareixeran 4 botons que ens permeten gestionar aquesta categoria en concret:<br />
								<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_03c.gif" />' ?>
									<ul>
										<li><strong>EDITAR</strong><br />
										Obre una pàgina d'Edició dels atributs de la categoria. El mètode d'Edició és el mateix que al <a href="#help_posts_categories_new"><strong>Crear nova Categoria.</strong></a></li>
										<li><strong>QUICK EDIT</strong><br />
										Obre un petit menú on podem edita ràpidament els atributs de la categoria. <strong>Aquesta opció NO ÉS RECOMANABLE ja que exclou els atributs multi idioma</strong>.</li>
										<li><strong>DELETE</strong><br />
										Permet esborrar la categoria, pel que totes les noticies categoritzades sota aquesta categoria, deixarán de pertànyer a aquest grup (no s'esborren). <strong>Aquesta opció NO ES POT DESFER</strong>.</li>
										<li><strong>VIEW</strong><br />
										Obre la pàgina d'arxiu de la categoria, on apareixeran llistades totes les noticies que pertanyen al grup, ordenades de forma cronològica inversa. Si ens fixem en la URL d'aquesta pàgina (direcció web, a la barra de direccions del navegador) veurem com el <em>Slug</em> forma part de la direcció, i la <em>Descripció de la Categoria</em> apareix a la capçalera de la pàgina.<br />
										<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_03d.gif" />' ?></li>
									</ul>
								</li>
								<li><strong>Gestió en Grup</strong><br />
								<strong>Aquesta opció permet esborrar diverses categories en bloc.</strong><br />
								Marquem vàries categories (mitjançant els <em>checks</em> situats a l'esquerra de cada fila de la taula de Categories) i al menú desplegable de la part superior (<em>Bulk Actions</em>) marcarem la opció <strong><em>DELETE</em></strong>. Premem el botó <strong><em>APLICA</em></strong> i confirmem. <strong>Aquesta opció NO ES POT DESFER</strong>.<br />
								<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_03e.gif" />' ?>
								</li>
								<li><strong>Cercar Categories</strong><br />
								<strong>Mitjançant la barra de cercar situada a la part superior dreta podem filtrar els resultats que apareixen a la Taula de Categories.</strong><br />
								Si ja hem realitzat un filtrat a la taula, podem eliminar-lo mitjançant la creu situada dins del camp de cerca.<br />
								<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_03f.gif" />' ?>
								</li>
							<?php }else{ //english ?>
								Intro categories
							<?php }
                        }else{//Not activeQtrans ?>
                            <li><strong>Gestión Individualizada</strong><br />
                            Si colocamos el cursor sobre alguna fila de la tabla de categorías nos aparecerán 4 botones que nos permiten gestionar esta categoría en concreto:<br />
                            <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_03c.gif" />' ?>
                                <ul>
                                    <li><strong>EDITAR</strong><br />
                                    Abre una página de edición de los atributos de la categoría. El método de edición es el mismo que al <a href="#help_posts_categories_new"><strong>Crear nueva Categoría.</strong></a></li>
                                    <li><strong>QUICK EDIT</strong><br />
                                    Abre un pequeño menú dónde poder editar rápidamente los atributos de la categoría. <strong>Esta opción NO ES RECOMENDABLE ya que excluye los atributos multiidioma</strong>.</li>
                                    <li><strong>DELETE</strong><br />
                                    Permite borrar la categoría, por lo que las noticias categorizadas bajo la misma, dejarán de pertenecer a este grupo. <strong>Esta opción NO SE PUEDE DESHACER.</strong></li>
                                    <li><strong>VIEW</strong><br />
                                    Abre la página de archivo de la categoría, dónde aparecerán listadas todas las noticias que pertenecen al grupo, ordenadas de forma cronológica inversa. Si nos fijamos en la URL de esta página (dirección web, en la barra de direcciones del navegador) veremos como el <em>Slug</em> forma parte de dicha dirección y la <em>Descripción de la Categoría</em> aparece en la cabecera de la página.<br />
                                    <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_03d.gif" />' ?></li>
                                </ul>
                            </li>
                            <li><strong>Gestión en Grupo</strong><br />
                            <strong>Esta opción permite borrar varias categorías en bloque.</strong><br />
                            Marcamos varias categorías (mediante los <em>checks</em> situados a la izquierda de cada fila de la tabla de Categorías) y en el menú desplegable de la parte superior (<em>Bulk Actions</em>) marcamos la opción <em><strong>DELETE</strong></em>. Pulsamos el botón <em><strong>APLICAR</strong></em> y confirmamos. <strong>Esta opción NO SE PUEDE DESHACER</strong>.<br />
                            <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_03e.gif" />' ?>
                            </li>
                            <li><strong>Buscar Categorías</strong><br />
                            <strong>Mediante la barra de buscar situada en la parte superior derecha podemos filtrar los resultados que aparecen en la Tabla de Categorías.</strong><br />
                            Si ya hemos realizado un filtrado en la tabla, podemos eliminarlo mediante la cruz situada dentro del campo de búsqueda.<br />
                            <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_03f.gif" />' ?>
                            </li>
                        <?php } ?>
                        </ol>
                        <span class="closer"><div class="dashicons dashicons-dismiss"></div>
                            <?php if (function_exists('qtrans_getLanguage')){ 
								if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS > Categoría > Gestionar Categorías</em>"
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>POSTS > Categoria > Gestionar Categories</em>"
								<?php }else{ //english ?>CLOSE
								<?php }
							}else{//Not activeQtrans ?>
                            	CERRAR "<em>POSTS > Categoría > Gestionar Categorías</em>"
                            <?php } ?>
                        </span>
                    </div>
                </div><!-- /Gestionar las Categorías -->
                <br />
                <span class="closer"><div class="dashicons dashicons-dismiss"></div>
                    <?php if (function_exists('qtrans_getLanguage')){ 
						if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS > Categoría</em>"
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>POSTS > Categoria</em>"
						<?php }else{ //english ?>CLOSE
						<?php }
                	}else{//Not activeQtrans ?>
                        CERRAR "<em>POSTS > Categoría</em>"
                    <?php } ?>
                </span>
            </div>
        </div><!-- / Categories -->
        <!-- Etiquetes -->
          <div class="postbox closed">
            <div class="handlediv" title="Click to toggle."><br></div>
            <h3 class="hndle"><div class="dashicons dashicons-tag"></div>&nbsp;&nbsp;
            <?php if (function_exists('qtrans_getLanguage')){ 
				if( qtrans_getLanguage() == 'es' ){	?>
					Etiquetas
				<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
					Etiquetes
				<?php }else{ //english ?>
					Tags
				<?php }
            }else{//Not activeQtrans ?>
                Etiquetas
            <?php } ?>
            </h3>
            <div class="inside">
            	<a title="help_posts_tags" id="help_posts_tags"></a>
            	<h4>
                <?php if (function_exists('qtrans_getLanguage')){ 
					if( qtrans_getLanguage() == 'es' ){	?>
						Cada entrada (noticia) puede contener una o varias etiquetas. A diferencia de las categorías, las etiquetas no clasifican las noticias en grupos sino que permiten relacionarlas con conceptos concretos relativos a su contenido.
					<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
						Cadascuna de les entrades (notícies) pot contenir una o vàries etiquetes. A diferència de les categories, les etiquetes no classifiquen les notícies en grups sinó que permeten relacionar-les amb conceptes concrets relatius al seu contingut.
					<?php }else{ //english ?>
						Intro categories
					<?php }
                }else{//Not activeQtrans ?>
                    Cada entrada (noticia) puede contener una o varias etiquetas. A diferencia de las categorías, las etiquetas no clasifican las noticias en grupos sino que permiten relacionarlas con conceptos concretos relativos a su contenido.
                <?php } ?>
                </h4>
                <p>
                <?php if (function_exists('qtrans_getLanguage')){ 
					if( qtrans_getLanguage() == 'es' ){	?>
						Las etiquetas tampoco tienen una clasificación  jerárquica.
					<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
						Les etiquetes tampoc tenen una classificació jeràrquica.
					<?php }else{ //english ?>
						Intro categories
					<?php }
				}else{//Not activeQtrans ?>
                    Las etiquetas tampoco tienen una clasificación  jerárquica.
                <?php } ?>
                </p>
                <!-- Etiqueta Nueva --> 
                <div class="postbox closed">
                    <div class="handlediv" title="Click to toggle."><br></div>
                    <h3 class="hndle"><div class="dashicons dashicons-arrow-right-alt2"></div>&nbsp;&nbsp;
                    <?php if (function_exists('qtrans_getLanguage')){ 
						if( qtrans_getLanguage() == 'es' ){	?>
							Las etiquetas tampoco tienen una clasificación  jerárquica.
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							Crear Nova Etiqueta
						<?php }else{ //english ?>
							Categories
						<?php }
					}else{//Not activeQtrans ?>
                        Las etiquetas tampoco tienen una clasificación  jerárquica.
                    <?php } ?>
                    </h3>
                    <div class="inside">
                        <a title="help_posts_tags_new" id="help_posts_tags_new"></a>
                        <h4>
                        <?php if (function_exists('qtrans_getLanguage')){ 
							if( qtrans_getLanguage() == 'es' ){	?>
								La página <em>Posts > Etiquetas</em> contiene 3 menús. Utilizaremos el menú inferior de la derecha (titulado “<em>Añadir nueva Etiqueta</em>”)  para crear una nueva etiqueta, rellenando los siguientes campos:
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								La pàgina <em>Posts > Categories</em> conté 2 menús. Utilitzarem el menú de la dreta (titulat “<em>Afegir nova Categoria</em>”) per crear una nova categoria, omplint els següents camps:
							<?php }else{ //english ?>
								Intro categories
							<?php }
                        }else{//Not activeQtrans ?>
                            La página <em>Posts > Etiquetas</em> contiene 3 menús. Utilizaremos el menú inferior de la derecha (titulado “<em>Añadir nueva Etiqueta</em>”)  para crear una nueva etiqueta, rellenando los siguientes campos:
                        <?php } ?>
                        </h4>
                        <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_04a.gif" />' ?>
                        <ol>
                        <?php if (function_exists('qtrans_getLanguage')){ 
							if( qtrans_getLanguage() == 'es' ){	?>
								<li><strong>Nombre (Idioma)</strong><br />
								Según la cantidad de idiomas que tengamos instalados en el WordPress, nos aparecerá un campo para cada idioma; en él pondremos el título de la etiqueta.<br />
								Los idiomas son <em>ES</em> > Castellano, <em>CA</em> > Catalán, <em>EN</em> > Inglés, etc...
								</li>
								<li><strong>Slug</strong><br />
								Este campo hacer referencia a la <em>URL</em> (dirección web) que tendrá la etiqueta que estamos creando.<br />
								<strong>Es un campo opcional</strong>, por lo que podemos dejarlo en blanco y que sea WordPress quien lo cree en función del nombre de la etiqueta.
								</li>
								<li><strong>Description</strong><br />
								La descripción de la etiqueta. Algunos temas de WordPress no muestran esta información, y no resulta tan decisivo como la descripción de Categorías.<br />
								Si queremos rellenar este campo lo haremos explicando el contenido temático de las noticias que poseen esta etiqueta, intentando utilizar palabras clave (relevantes con relación al contenido) y con una extensión aproximada de 150 caracteres.<br />
								<strong>Podemos crear descripciones en varios idiomas</strong><br />
								Para lograrlo, utilizaremos etiquetas de idioma para separar el contenido perteneciente a cada lengua. Introduciremos una descripción para cada idioma que esté instalado en nuestro WordPress. Por ejemplo:<br /><em><strong>[:es]</strong></em> Descripción en Castellano.<br /><em><strong>[:ca]</strong></em> Descripción en Catalán.<br /><em><strong>[:en]</strong></em> Descripción en Inglés.
								</li>
								<li>Pulsaremos el botón <strong>AÑADIR NUEVA ETIQUETA</strong> para terminar con la creación de la etiqueta.</li>
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								<li><strong>Nom (Idioma)</strong><br />
								Segons la quantitat d'idiomes que tinguem instal·lats al WordPress, ens apareixerà un camp per a cada idioma; en cadascun d'ells introduirem el títol de l'etiqueta.<br />
								Els idiomes son <em>ES</em> > Castellà, <em>CA</em> > Català, <em>EN</em> > Anglès, etc...
								</li>
								<li><strong>Slug</strong><br />
								Aquest camp fa referència a la URL (direcció web) que tindrà l'etiqueta que estem creant. <br />
								<strong>És un camp opcional</strong>, pel que podem deixar-lo en blanc i WordPress el crearà automàticament en funció del nom de l'etiqueta.
								</li>
								<li><strong>Descripció</strong><br />
								La descripció de l'etiqueta. Alguns temes de WordPress no mostren aquesta informació, que no resulta tan rellevant com en el cas de les Categories.<br />
								Si volem omplir aquest camp ho farem explicant el contingut temàtic de les noticies que pertanyen a aquesta etiqueta, intentant utilitzar paraules clau (rellevants en relació amb el contingut) i amb una extensió aproximada de 150 caràcters.<br />
								<strong>Podem crear descripcions en varis idiomes</strong><br />
								Per aconseguir-ho, utilitzarem etiquetes d'idioma per separar el contingut pertanyent a cada llengua. Introduirem una descripció per a cada idioma que tinguem instal·lat al nostre WordPress. Per exemple:<br /><em><strong>[:es]</strong></em> Descripció en Castellà.<br /><em><strong>[:ca]</strong></em> Descripció en Català.<br /><em><strong>[:en]</strong></em> Descripció en Anglès.
								</li>
								<li>Premerem el botó <strong>AFEGEIX</strong> per finalitzar la creació de l'etiqueta.</li>
							<?php }else{ //english ?>
								Intro categories
							<?php }
                        }else{//Not activeQtrans ?>
                            <li><strong>Nombre (Idioma)</strong><br />
                            Según la cantidad de idiomas que tengamos instalados en el WordPress, nos aparecerá un campo para cada idioma; en él pondremos el título de la etiqueta.<br />
                            Los idiomas son <em>ES</em> > Castellano, <em>CA</em> > Catalán, <em>EN</em> > Inglés, etc...
                            </li>
                            <li><strong>Slug</strong><br />
                            Este campo hacer referencia a la <em>URL</em> (dirección web) que tendrá la etiqueta que estamos creando.<br />
                            <strong>Es un campo opcional</strong>, por lo que podemos dejarlo en blanco y que sea WordPress quien lo cree en función del nombre de la etiqueta.
                            </li>
                            <li><strong>Description</strong><br />
                            La descripción de la etiqueta. Algunos temas de WordPress no muestran esta información, y no resulta tan decisivo como la descripción de Categorías.<br />
                            Si queremos rellenar este campo lo haremos explicando el contenido temático de las noticias que poseen esta etiqueta, intentando utilizar palabras clave (relevantes con relación al contenido) y con una extensión aproximada de 150 caracteres.<br />
                            <strong>Podemos crear descripciones en varios idiomas</strong><br />
                            Para lograrlo, utilizaremos etiquetas de idioma para separar el contenido perteneciente a cada lengua. Introduciremos una descripción para cada idioma que esté instalado en nuestro WordPress. Por ejemplo:<br /><em><strong>[:es]</strong></em> Descripción en Castellano.<br /><em><strong>[:ca]</strong></em> Descripción en Catalán.<br /><em><strong>[:en]</strong></em> Descripción en Inglés.
                            </li>
                            <li>Pulsaremos el botón <strong>AÑADIR NUEVA ETIQUETA</strong> para terminar con la creación de la etiqueta.</li>
                        <?php } ?>
                        </ol>
                        <br />
                        <span class="closer"><div class="dashicons dashicons-dismiss"></div>
                            <?php if (function_exists('qtrans_getLanguage')){ 
								if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS > Etiquetas > Nueva Etiqueta</em>"
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR  "<em>POSTS > Etiquetes > Etiqueta Nova</em>"
								<?php }else{ //english ?>CLOSE
								<?php }
                        	}else{//Not activeQtrans ?>
                            	CERRAR "<em>POSTS > Etiquetas > Nueva Etiqueta</em>"
                            <?php } ?>
                        </span>
                    </div>
                </div><!-- /Etiqueta Nueva -->
                <!-- Gestionar las Etiquetas -->
                <div class="postbox closed">
                    <div class="handlediv" title="Click to toggle."><br></div>
                    <h3 class="hndle"><div class="dashicons dashicons-arrow-right-alt2"></div>&nbsp;&nbsp;
                    <?php if (function_exists('qtrans_getLanguage')){ 
						if( qtrans_getLanguage() == 'es' ){	?>
							Gestionar las Etiquetas
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							Gestionar les Etiquetes
						<?php }else{ //english ?>
							Categories
						<?php }
					}else{//Not activeQtrans ?>
                        Gestionar las Etiquetas
                    <?php } ?>
                    </h3>
                    <div class="inside">
                        <a title="help_posts_tags_gestio" id="help_posts_tags_gestio"></a>
                        <h4>
                        <?php if (function_exists('qtrans_getLanguage')){ 
							if( qtrans_getLanguage() == 'es' ){	?>
								El menú de la derecha de la página <em>Posts > Etiquetas</em> permite la gestión individual y en bloque de las etiquetas existentes.
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								l menú de la dreta de la pàgina <em>Posts > Etiquetes</em> permet la gestió individual i en bloc de les etiquetes existents.
							<?php }else{ //english ?>
								Intro categories
							<?php }
                        }else{//Not activeQtrans ?>
                            El menú de la derecha de la página <em>Posts > Etiquetas</em> permite la gestión individual y en bloque de las etiquetas existentes.
                        <?php } ?>
                        </h4>
                        <p>
                        <?php if (function_exists('qtrans_getLanguage')){ 
							if( qtrans_getLanguage() == 'es' ){	?>
								En este menú veremos una tabla con el listado de Etiquetas y sus características (Título, Descripción, Slug...).
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								Aquest menú presenta una taula amb el llistat d'Etiquetes i les seves característiques (Títol, Descripció, Slug...).
							<?php }else{ //english ?>
								Intro categories
							<?php }
						}else{//Not activeQtrans ?>
                            En este menú veremos una tabla con el listado de Etiquetas y sus características (Título, Descripción, Slug...).
                        <?php } ?>
                        </p>
                        <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_04b.gif" />' ?>
                        <ol>
                        <?php if (function_exists('qtrans_getLanguage')){ 
							if( qtrans_getLanguage() == 'es' ){	?>
								<li><strong>Gestión Individualizada</strong><br />
								Si colocamos el cursor sobre alguna fila de la tabla de etiquetas nos aparecerán 4 botones que nos permiten gestionar esta categoría en concreto:<br />
								<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_04c.gif" />' ?>
									<ul>
										<li><strong>EDITAR</strong><br />
										Abre una página de edición de los atributos de la etiqueta. El método de edición es el mismo al <a href="#help_posts_tags_new"><strong>Crear nueva Etiqueta</strong></a>.</li>
										<li><strong>QUICK EDIT</strong><br />
										Abre un pequeño menú dónde poder editar rápidamente los atributos de la etiqueta. <strong>Esta opción NO ES RECOMENDABLE ya que excluye los atributos multiidioma</strong>.</li>
										<li><strong>DELETE</strong><br />
										Permite borrar la etiqueta, por lo que las noticias etiquetadas bajo la misma, dejarán de pertenecer a este grupo. <strong>Esta opción NO SE PUEDE DESHACER.</strong></li>
										<li><strong>VIEW</strong><br />
										Abre la página de archivo de la etiqueta, dónde aparecerán listadas todas las noticias que pertenecen al grupo, ordenadas de forma cronológica inversa. Si nos fijamos en la URL de esta página (dirección web, en la barra de direcciones del navegador) veremos como el <em>Slug</em> forma parte de dicha dirección.<br />
										<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_04d.gif" />' ?></li>
									</ul>
								</li>
								<li><strong>Gestión en Grupo</strong><br />
								<strong>Esta opción permite borrar varias etiquetas en bloque.</strong><br />
								Marcamos varias etiquetas (mediante los <em>checks</em> situados a la izquierda de cada fila de la tabla de Etiquetas) y en el menú desplegable de la parte superior (<em>Bulk Actions</em>) marcamos la opción <strong><em>DELETE</em></strong>. Pulsamos el botón <strong><em>APLICAR</em></strong> y confirmamos. <strong>Esta opción NO SE PUEDE DESHACER</strong>.<br />
								<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_03e.gif" />' ?>
								</li>
								<li><strong>Buscar Etiquetas</strong><br />
								<strong>Mediante la barra de buscar situada en la parte superior derecha podemos filtrar los resultados que aparecen en la Tabla de Etiquetas.</strong><br />
								Si ya hemos realizado un filtrado en la tabla, podemos eliminarlo mediante la cruz situada dentro del campo de búsqueda.<br />
								<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_03f.gif" />' ?>
								</li>
								<li><strong>Nube de Etiquetas</strong><br />
								<strong>Este menú lo genera automáticamente WordPress y lista todas las etiquetas utilizadas.</strong><br />
								Las etiquetas aparecen listadas por orden alfabético, y su tamaño depende de la cantidad de noticias que incluyen la etiqueta.<br />
								<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_04e.gif" />' ?><br />
								Al hacer clic en alguna de las etiquetas de la nube abriremos su ventana de edición, que podemos modificar siguiendo el mismo procedimiento que al <a href="#help_posts_tags_new"><strong>Crear nueva Etiqueta.</strong></a>.
								</li>
							<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
								<li><strong>Gestió Individualitzada</strong><br />
								Si col·loquem el cursor sobre alguna fila de la taula d'etiquetes ens apareixeran 4 botons que ens permeten gestionar aquesta etiqueta en concret:<br />
								<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_04c.gif" />' ?>
									<ul>
										<li><strong>EDITAR</strong><br />
										Obre una pàgina d'Edició dels atributs de l'etiqueta. El mètode d'Edició és el mateix que al <a href="#help_posts_tags_new"><strong>Crear nova Etiqueta.</strong></a></li>
										<li><strong>QUICK EDIT</strong><br />
										Obre un petit menú on podem edita ràpidament els atributs de l'etiqueta. <strong>Aquesta opció NO ÉS RECOMANABLE ja que exclou els atributs multi idioma</strong>.</li>
										<li><strong>DELETE</strong><br />
										Permet esborrar l'etiqueta, pel que totes les noticies etiquetades deixaran de pertànyer a aquest grup.<strong>Aquesta opció NO ES POT DESFER</strong>.</li>
										<li><strong>VIEW</strong><br />
										Obre la pàgina d'arxiu de l'etiqueta, on apareixeran llistades totes les noticies que pertanyen al grup, ordenades de forma cronològica inversa. Si ens fixem en la URL d'aquesta pàgina (direcció web, a la barra de direccions del navegador) veurem com el <em>Slug</em> forma part de la direcció.<br />
										<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_04d.gif" />' ?></li>
									</ul>
								</li>
								<li><strong>Gestió en Grup</strong><br />
								<strong>Aquesta opció permet esborrar diverses etiquetes en bloc.</strong><br />
								Marquem vàries etiquetes (mitjançant els <em>checks</em> situats a l'esquerra de cada fila de la taula d'Etiquetes) i al menú desplegable de la part superior (<em>Bulk Actions</em>) marcarem la opció <strong><em>DELETE</em></strong>. Premem el botó <strong><em>APLICA</em></strong> i confirmem. <strong>Aquesta opció NO ES POT DESFER</strong>.<br />
								<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_03e.gif" />' ?>
								</li>
								<li><strong>Cercar Etiquetes</strong><br />
								<strong>Mitjançant la barra de cercar situada a la part superior dreta podem filtrar els resultats que apareixen a la Taula d'Etiquetes.</strong><br />
								Si ja hem realitzat un filtrat a la taula, podem eliminar-lo mitjançant la creu situada dins del camp de cerca.<br />
								<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_03f.gif" />' ?>
								</li>
								<li><strong>Núvol d'Etiquetes</strong><br />
								<strong>Aquest menú el genera automàticament WordPress i llista totes les etiquetes utilitzades.</strong><br />
								Les etiquetes apareixen llistades per ordre alfabètic i la seva mida depèn del número de notícies que inclouen l'etiqueta.<br />
								<?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_04e.gif" />' ?><br />
								Al fer clic en alguna de les etiquetes del núvol obrirem la seva finestra d'edició, que podem modificar seguint el mateix procediment que al <a href="#help_posts_tags_new"><strong>Crear nova Etiqueta.</strong></a>.
								</li>
							<?php }else{ //english ?>
								Intro categories
							<?php }
                        }else{//Not activeQtrans ?>
                            <li><strong>Gestión Individualizada</strong><br />
                            Si colocamos el cursor sobre alguna fila de la tabla de etiquetas nos aparecerán 4 botones que nos permiten gestionar esta categoría en concreto:<br />
                            <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_04c.gif" />' ?>
                                <ul>
                                    <li><strong>EDITAR</strong><br />
                                    Abre una página de edición de los atributos de la etiqueta. El método de edición es el mismo al <a href="#help_posts_tags_new"><strong>Crear nueva Etiqueta</strong></a>.</li>
                                    <li><strong>QUICK EDIT</strong><br />
                                    Abre un pequeño menú dónde poder editar rápidamente los atributos de la etiqueta. <strong>Esta opción NO ES RECOMENDABLE ya que excluye los atributos multiidioma</strong>.</li>
                                    <li><strong>DELETE</strong><br />
                                    Permite borrar la etiqueta, por lo que las noticias etiquetadas bajo la misma, dejarán de pertenecer a este grupo. <strong>Esta opción NO SE PUEDE DESHACER.</strong></li>
                                    <li><strong>VIEW</strong><br />
                                    Abre la página de archivo de la etiqueta, dónde aparecerán listadas todas las noticias que pertenecen al grupo, ordenadas de forma cronológica inversa. Si nos fijamos en la URL de esta página (dirección web, en la barra de direcciones del navegador) veremos como el <em>Slug</em> forma parte de dicha dirección.<br />
                                    <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_04d.gif" />' ?></li>
                                </ul>
                            </li>
                            <li><strong>Gestión en Grupo</strong><br />
                            <strong>Esta opción permite borrar varias etiquetas en bloque.</strong><br />
                            Marcamos varias etiquetas (mediante los <em>checks</em> situados a la izquierda de cada fila de la tabla de Etiquetas) y en el menú desplegable de la parte superior (<em>Bulk Actions</em>) marcamos la opción <strong><em>DELETE</em></strong>. Pulsamos el botón <strong><em>APLICAR</em></strong> y confirmamos. <strong>Esta opción NO SE PUEDE DESHACER</strong>.<br />
                            <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_03e.gif" />' ?>
                            </li>
                            <li><strong>Buscar Etiquetas</strong><br />
                            <strong>Mediante la barra de buscar situada en la parte superior derecha podemos filtrar los resultados que aparecen en la Tabla de Etiquetas.</strong><br />
                            Si ya hemos realizado un filtrado en la tabla, podemos eliminarlo mediante la cruz situada dentro del campo de búsqueda.<br />
                            <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_03f.gif" />' ?>
                            </li>
                            <li><strong>Nube de Etiquetas</strong><br />
                            <strong>Este menú lo genera automáticamente WordPress y lista todas las etiquetas utilizadas.</strong><br />
                            Las etiquetas aparecen listadas por orden alfabético, y su tamaño depende de la cantidad de noticias que incluyen la etiqueta.<br />
                            <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_04e.gif" />' ?><br />
                            Al hacer clic en alguna de las etiquetas de la nube abriremos su ventana de edición, que podemos modificar siguiendo el mismo procedimiento que al <a href="#help_posts_tags_new"><strong>Crear nueva Etiqueta.</strong></a>.
                            </li>
                        <?php } ?>
                        </ol>
                        <span class="closer"><div class="dashicons dashicons-dismiss"></div>
                            <?php if (function_exists('qtrans_getLanguage')){ 
								if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS > Etiquetas > Gestionar Etiquetas</em>"
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>POSTS > Etiquetes > Gestionar Etiquetes</em>"
								<?php }else{ //english ?>CLOSE
								<?php }
                        	}else{//Not activeQtrans ?>
                            	CERRAR "<em>POSTS > Etiquetas > Gestionar Etiquetas</em>"
                            <?php } ?>
                        </span>
                    </div>
                </div><!-- /Gestionar las Etiquetas -->
                <br />
                <span class="closer"><div class="dashicons dashicons-dismiss"></div>
                    <?php if (function_exists('qtrans_getLanguage')){ 
						if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS > Etiquetas</em>"
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>POSTS > Etiquetes</em>"
						<?php }else{ //english ?>CLOSE
						<?php }
                	}else{//Not activeQtrans ?>
                        CERRAR "<em>POSTS > Etiquetas</em>"
                    <?php } ?>
                </span>
            </div>
        </div><!-- / Etiquetes -->
        <!-- EXTRES --><hr /><br />
        <!-- Anatomia del Post -->
          <div class="postbox closed">
            <div class="handlediv" title="Click to toggle."><br></div>
            <h3 class="hndle"><div class="dashicons dashicons-align-center"></div>&nbsp;&nbsp;
            <?php if (function_exists('qtrans_getLanguage')){ 
				if( qtrans_getLanguage() == 'es' ){	?>
					Partes de la Noticia
				<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
					Parts de la Notícia
				<?php }else{ //english ?>
					Post Parts
				<?php }
            }else{//Not activeQtrans ?>
                Partes de la Noticia
            <?php } ?>
            </h3>
            <div class="inside">
            	<a title="help_posts_anatomia" id="help_posts_anatomia"></a>
            	<h4>
					<?php if (function_exists('qtrans_getLanguage')){ 
						if( qtrans_getLanguage() == 'es' ){	?>
							Relación entre la página de Edición del Post (BackEnd) y su visualización en la web (FrontEnd).
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							Relació entre la pàgina d'Edició del Post (BackEnd) i la seva visualització al web (FrontEnd).
						<?php }else{ //english ?>
							Intro anatomy
						<?php }
                  	}else{//Not activeQtrans ?>
                        Relación entre la página de Edición del Post (BackEnd) y su visualización en la web (FrontEnd).
                    <?php } ?>
                  </h4>
                  <ol>
					<?php if (function_exists('qtrans_getLanguage')){ 
						if( qtrans_getLanguage() == 'es' ){	?>
							<li><a href="#help_posts_new_title"><strong>Título</strong> (multiidioma)</a></li>
							<li><a href="#help_posts_new_wysiwyg"><strong>Contenido del post</strong> (WYSIWYG)</a></li>
							<li><a href="#help_posts_new_excerpt"><strong>Extracto</strong> (Titular)</a></li>
							<li><a href="#help_posts_new_featuredimg"><strong>Imagen Destacada</strong> (Featured Image)</a></li>
							<li><a href="#help_posts_new_cats"><strong>Categoría</strong></a></li>
							<li><a href="#help_posts_new_tags"><strong>Etiquetas</strong></a></li>
							<li><a href="#help_posts_new_publish"><strong>Fecha</strong> (dentro de las opciones de Publicación)</a></li>
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							<li><a href="#help_posts_new_title"><strong>Títol</strong> (multiidioma)</a></li>
							<li><a href="#help_posts_new_wysiwyg"><strong>Contingut del post</strong> (WYSIWYG)</a></li>
							<li><a href="#help_posts_new_excerpt"><strong>Extracte</strong> (Titular)</a></li>
							<li><a href="#help_posts_new_featuredimg"><strong>Imatge Destacada</strong> (Featured Image)</a></li>
							<li><a href="#help_posts_new_cats"><strong>Categoria</strong></a></li>
							<li><a href="#help_posts_new_tags"><strong>Etiquetes</strong></a></li>
							<li><a href="#help_posts_new_publish"><strong>Data</strong> (dins les opcions de Publicació)</a></li>
						<?php }else{ //english ?>
							Intro All Posts
						<?php }
        			}else{//Not activeQtrans ?>
                        <li><a href="#help_posts_new_title"><strong>Título</strong> (multiidioma)</a></li>
                        <li><a href="#help_posts_new_wysiwyg"><strong>Contenido del post</strong> (WYSIWYG)</a></li>
                        <li><a href="#help_posts_new_excerpt"><strong>Extracto</strong> (Titular)</a></li>
                        <li><a href="#help_posts_new_featuredimg"><strong>Imagen Destacada</strong> (Featured Image)</a></li>
                        <li><a href="#help_posts_new_cats"><strong>Categoría</strong></a></li>
                        <li><a href="#help_posts_new_tags"><strong>Etiquetas</strong></a></li>
                        <li><a href="#help_posts_new_publish"><strong>Fecha</strong> (dentro de las opciones de Publicación)</a></li>
                    <?php } ?>
                    </ol>
                    <?php echo '<img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_00a.gif" />' ?>
                    <br />
                    <span class="closer"><div class="dashicons dashicons-dismiss"></div>
                    	<?php if (function_exists('qtrans_getLanguage')){ 
						if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS > Partes de la Noticia</em>"
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>POSTS > Parts de la Notícia</em>"
                        <?php }else{ //english ?>CLOSE
                        <?php }
						}else{//Not activeQtrans ?>
                            CERRAR "<em>POSTS > Partes de la Noticia</em>"
                        <?php } ?>
                    </span>
            </div>
        </div><!-- / Partes de la Noticia -->
        <!-- Notícies Destacades -->
          <div class="postbox closed">
            <div class="handlediv" title="Click to toggle."><br></div>
            <h3 class="hndle"><div class="dashicons dashicons-awards"></div>&nbsp;&nbsp;
            <?php if (function_exists('qtrans_getLanguage')){ 
				if( qtrans_getLanguage() == 'es' ){	?>
					Noticias Destacadas
				<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
					Noticíes Destacades
				<?php }else{ //english ?>
					Sticky Posts
				<?php }
			}else{//Not activeQtrans ?>
            	Noticias Destacadas
            <?php } ?>
            </h3>
            <div class="inside">
            	<a title="help_posts_sticky" id="help_posts_sticky"></a>
            	<h4>
                	<?php if (function_exists('qtrans_getLanguage')){ 
						if( qtrans_getLanguage() == 'es' ){	?>
							El tema de WordPress permite el uso de Noticias Destacadas (Sticky Posts), una opción que hace posible colocar 2 noticias en un formato prominente, con una imagen a mayor tamaño, y que se mantienen en la portada de la página Web y de la sección NOTICIAS.
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							El tema de WordPress permet l'ús de Notícies Destacades (Sticky Posts), una opció que fa possible col·locar 2 notícies en un format prominent, amb una imatge a més gran, i que es manté a la portada de la pàgina Web i de la secció NOTÍCIES.
						<?php }else{ //english ?>
							Intro sticky
						<?php }
                  	}else{//Not activeQtrans ?>
                        El tema de WordPress permite el uso de Noticias Destacadas (Sticky Posts), una opción que hace posible colocar 2 noticias en un formato prominente, con una imagen a mayor tamaño, y que se mantienen en la portada de la página Web y de la sección NOTICIAS.
                    <?php } ?>
                  </h4>
                  <p>
                  	<?php if (function_exists('qtrans_getLanguage')){ 
						if( qtrans_getLanguage() == 'es' ){	?>
							<strong>Las Noticias Destacadas SIEMPRE aparecen en esta posición</strong>, quedando excluidas de la sección de NOTICIAS RECIENTES (que aparece en la Página de INICIO, mostrando las últimas 4 entradas del blog) o de la sección correspondiente a su CATEGORÍA (Página NOTICIAS, dónde se muestras las 4 noticias más recientes de cada categoría).
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							<strong>Les notícies Destacades SEMPRE apareixen a la mateixa posició</strong>, i queden fora de la secció NOTÍCIES RECENTS (que apareix a la Pàgina d'INICI, mostrant les últimes 4 entrades del blog) o de la secció corresponent a la seva CATEGORIA (Pàgina NOTÍCIES, on es mostren les 4 notícies més recents de cada categoria).
						<?php }else{ //english ?>
							Intro All Posts
						<?php }
        			}else{//Not activeQtrans ?>
                        <strong>Las Noticias Destacadas SIEMPRE aparecen en esta posición</strong>, quedando excluidas de la sección de NOTICIAS RECIENTES (que aparece en la Página de INICIO, mostrando las últimas 4 entradas del blog) o de la sección correspondiente a su CATEGORÍA (Página NOTICIAS, dónde se muestras las 4 noticias más recientes de cada categoría).
                    <?php } ?>
                    </p>
                    <?php echo '<br /><img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_00b.gif" />' ?><br /><br />
					<?php if (function_exists('qtrans_getLanguage')){ 
						if( qtrans_getLanguage() == 'es' ){	?>
							<h4>Para cambiar las Noticias Destacadas deberemos seguir los siguientes pasos:</h4>
							<p><strong>1/ Quitar el estatus de Noticia Destacada de la noticia que ya no queramos que aparezca en la sección NOTICIAS DESTACADAS.</strong><br />
							Para ello editaremos la noticia en cuestión, y dentro de su página de edición, en el Panel PUBLICAR pulsaremos sobre <strong>Visibility > EDITAR</strong>.
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							<h4>Per canviar les Notícies Destacades seguirem els següents passos:</h4>
							<p><strong>1/ Treure l'estatus de Notícia Destacada d'aquella notícia que ja no volem que aparegui a la secció NOTÍCIES DESTACADES.</strong><br />
							Per fer-ho editarem la notícia en qüestió, i dins de la seva pàgina d'edició, al Panell PUBLICAR premem Visibility > EDITAR.
						<?php }else{ //english ?>
							Intro sticky
						<?php }
                   }else{//Not activeQtrans ?>
                        <h4>Para cambiar las Noticias Destacadas deberemos seguir los siguientes pasos:</h4>
                        <p><strong>1/ Quitar el estatus de Noticia Destacada de la noticia que ya no queramos que aparezca en la sección NOTICIAS DESTACADAS.</strong><br />
                        Para ello editaremos la noticia en cuestión, y dentro de su página de edición, en el Panel PUBLICAR pulsaremos sobre <strong>Visibility > EDITAR</strong>.
                    <?php } ?>
                    <?php echo '<br /><img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_00c.gif" />' ?><br /></p>
                    <?php if (function_exists('qtrans_getLanguage')){ 
						if( qtrans_getLanguage() == 'es' ){	?>
							<p>Se nos expandirá un menú con varias opciones y entre ellas desmarcaremos la opción <strong>“Stick this post to the front Page”</strong>.<br />
							Pulsaremos el botón <strong>ACTUALIZAR</strong>.<br />
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							<p>Se'ns expandirà un menú amb més opcions i entre elles desmarcarem la opció <strong>“Stick this post on the front Page”</strong>.<br />
							Premem el botó <strong>ACTUALITZAR</strong>.<br />
						<?php }else{ //english ?>
							Intro sticky
						<?php }
                    }else{//Not activeQtrans ?>
                        <p>Se nos expandirá un menú con varias opciones y entre ellas desmarcaremos la opción <strong>“Stick this post to the front Page”</strong>.<br />
						Pulsaremos el botón <strong>ACTUALIZAR</strong>.<br />
                    <?php } ?>
					<?php echo '<br /><img class="help_img" src="' . plugin_dir_url( __FILE__ ) . 'images/02posts_00d.gif" />' ?><br /><br /></p>
                    <?php if (function_exists('qtrans_getLanguage')){ 
						if( qtrans_getLanguage() == 'es' ){	?>
							<p><strong>2/ Añadir la nueva NOTÍCIA DESTACADA.</strong><br />
							Repetiremos la operación a la inversa: en la pantalla de edición de la noticia que queramos destacar, <strong>iremos al panel PUBLICAR y pulsaremos sobre Visibility > EDITAR</strong>.<br />
							Marcaremos la opción <strong>“Stick this post to the front Page”</strong> y pulsaremos el botón <strong>ACTUALIZAR</strong>.<br /></p>
							<p><strong><a href="#help_posts_new_publish">Ver TODAS las opciones del Panel PUBLICAR ></a></strong></p>
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							<p><strong>2/ Afegir la nova NOTÍCIA DESTACADA.</strong><br />
							Repetim la operació anterior a l'inversa: a la pantalla d'edició de la notícia que volguem destacar, <strong>anem al panell PUBLICAR i premem sobre Visibility > EDITAR</strong>.<br />
							Marcarem la opció <strong>“Stick this post on the front Page”</strong> i premem el botó <strong>ACTUALITZAR</strong>.<br /></p>
							<p><strong><a href="#help_posts_new_publish">Veure TOTES les opcions del panell PUBLICAR ></a></strong></p>
						<?php }else{ //english ?>
							Intro sticky
						<?php }
                    }else{//Not activeQtrans ?>
                        <p><strong>2/ Añadir la nueva NOTÍCIA DESTACADA.</strong><br />
                        Repetiremos la operación a la inversa: en la pantalla de edición de la noticia que queramos destacar, <strong>iremos al panel PUBLICAR y pulsaremos sobre Visibility > EDITAR</strong>.<br />
                        Marcaremos la opción <strong>“Stick this post to the front Page”</strong> y pulsaremos el botón <strong>ACTUALIZAR</strong>.<br /></p>
                        <p><strong><a href="#help_posts_new_publish">Ver TODAS las opciones del Panel PUBLICAR ></a></strong></p>
                    <?php } ?>
                    <br />
                    <span class="closer"><div class="dashicons dashicons-dismiss"></div>
						<?php if (function_exists('qtrans_getLanguage')){ 
						if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS > Noticias Destacadas</em>"
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>POSTS > Notícies Destacades</em>"
                        <?php }else{ //english ?>CLOSE
                        <?php }
						}else{//Not activeQtrans ?>
                            CERRAR "<em>POSTS > Noticias Destacadas</em>"
                        <?php } ?>
                    </span>
            </div>
        </div><!-- / Notícies Destacades -->
        <!-- Diferència entre Posts i Pàgines -->
          <div class="postbox closed">
            <div class="handlediv" title="Click to toggle."><br></div>
            <h3 class="hndle"><div class="dashicons dashicons-format-aside"></div>&nbsp;&nbsp;
            <?php if (function_exists('qtrans_getLanguage')){ 
				if( qtrans_getLanguage() == 'es' ){	?>
					Diferencias entre Posts (Entradas) y Páginas
				<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
					Diferències entre Posts (Entrades) i Pàgines 
				<?php }else{ //english ?>
					Sticky Posts
				<?php }
            }else{//Not activeQtrans ?>
                Diferencias entre Posts (Entradas) y Páginas
            <?php } ?>
            </h3>
            <div class="inside">
            	<a title="help_posts_posts-page" id="help_posts_posts-page"></a>
            	<h4>
					<?php if (function_exists('qtrans_getLanguage')){ 
						if( qtrans_getLanguage() == 'es' ){	?>
							Pese a que se editan del mismo modo, las diferencias entre Posts (Entradas / Noticias) y Páginas son importantes:
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							Malgrat que s'editen de la mateixa manera, les diferències entre Posts (Entrades / Notícies) i Pàgines son importants:
						<?php }else{ //english ?>
						<?php }
					}else{//Not activeQtrans ?>
                        Pese a que se editan del mismo modo, las diferencias entre Posts (Entradas / Noticias) y Páginas son importantes:
                    <?php } ?>
                </h4>
              <p>
					<?php if (function_exists('qtrans_getLanguage')){ 
						if( qtrans_getLanguage() == 'es' ){	?>
							<strong>Posts</strong><br />
							<a href="#help_posts">Los Posts</a> (o Noticias) son entradas que aparecen listadas en orden cronológico inverso en la página de Noticias y otras páginas de la web (según la configuración del tema usado).<br />
							<br />
							Características:
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							<strong>Posts</strong><br />
							<a href="#help_posts">Els Posts</a> (o Notícies) són entrades que apareixen llistades en ordre cronològic invers a la pàgina de notícies i altres pàgines del Web (segons la configuració del tema utilitzat).<br /><br />
							Característiques:
						<?php }else{ //english ?>
						<?php }
              		}else{//Not activeQtrans ?>
                        <strong>Posts</strong><br />
                        <a href="#help_posts">Los Posts</a> (o Noticias) son entradas que aparecen listadas en orden cronológico inverso en la página de Noticias y otras páginas de la web (según la configuración del tema usado).<br />
                        <br />
                        Características:
                    <?php } ?>
              </p>
                <ul>
                	<?php if (function_exists('qtrans_getLanguage')){ 
						if( qtrans_getLanguage() == 'es' ){	?>
							<li>No aparecen en el menú principal de la web.</li>
							<li>Pueden tener <a href="#help_posts_categories">CATEGORÍAS</a>.</li>
							<li>Pueden tener <a href="#help_posts_tags">ETIQUETAS</a>.</li>
							<li>Entre los Posts no existe una jerarquía.</li>
							<li>Aparecen en el RSS del Blog.</li>
							<li>Su URL incluye la fecha de creación: <em>http://www.mipaginaweb.com/2008/11/30/título-del-post/</em></li>
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							<li>No apareixen al menú principal del web.</li>
							<li>Poden tenir <a href="#help_posts_categories">CATEGORIES</a>.</li>
							<li>Poden tenir <a href="#help_posts_tags">ETIQUETES</a>.</li>
							<li>Entre els Posts no existeix una jerarquia</li>
							<li>Apareixen en el RSS del Blog.</li>
							<li>La seva URL inclou la data de creació: <em>http://www.lamevaplanaweb.com/2008/11/30/títol-del-post/</em></li>
						<?php }else{ //english ?>
							<li>ola k ase</li>
                    <?php }
                    }else{//Not activeQtrans ?>
                    	<li>No aparecen en el menú principal de la web.</li>
                        <li>Pueden tener <a href="#help_posts_categories">CATEGORÍAS</a>.</li>
                        <li>Pueden tener <a href="#help_posts_tags">ETIQUETAS</a>.</li>
                        <li>Entre los Posts no existe una jerarquía.</li>
                        <li>Aparecen en el RSS del Blog.</li>
                        <li>Su URL incluye la fecha de creación: <em>http://www.mipaginaweb.com/2008/11/30/título-del-post/</em></li>
                    <?php } ?>
                </ul>
                <br /><br />
                <p>
					<?php if (function_exists('qtrans_getLanguage')){ 
						if( qtrans_getLanguage() == 'es' ){	?>
							<strong>Páginas</strong><br />
							<a href="#help_pages">Las Páginas</a> son entradas que aparecen como SECCIONES ESTÁTICAS  de la web, sin estar vinculadas a ninguna fecha y cuyo cometido es formar parte del contenido fijo de la web.<br /><br />
							Características:
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
							<strong>Pàgines</strong><br />
							<a href="#help_pages">Les Pàgines</a> són entrades que apareixen com a SECCIONS ESTÀTIQUES del web, sense estar vinculades a cap data i amb la funció de formar part del contingut fixe del web.  <br /><br />
							Característiques:
						<?php }else{ //english ?>
							ola k ase
						<?php }
                    }else{//Not activeQtrans ?>
                    	<strong>Páginas</strong><br />
                        <a href="#help_pages">Las Páginas</a> son entradas que aparecen como SECCIONES ESTÁTICAS  de la web, sin estar vinculadas a ninguna fecha y cuyo cometido es formar parte del contenido fijo de la web.<br /><br />
                        Características:
                    <?php } ?>
                </p>
                <ul>
                	<?php if (function_exists('qtrans_getLanguage')){ 
                    if( qtrans_getLanguage() == 'es' ){	?>
                    	<li>Se organizan jerárquicamente, siendo algunas páginas “<em>padre</em>” de otras.</li>
                        <li>Aparecen en el menú principal de la web, organizadas según su jerarquía.</li>
                        <li>No tienen ni CATEGORÍAS ni ETIQUETAS.</li>
                        <li>Permiten usar varias plantillas para su aspecto.</li>
                        <li>No aparecen en la RSS del blog.</li>
                        <li>Su URL se basa en su nombre: <em>http://www.mipaginaweb.com/título-de-la-pagina/</em></li>
                    <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
                    	<li>S'organitzen jeràrquicament, sent algunes pàgines “<em>pare</em>” d'altres</li>
                        <li>Apareixen al menú principal del web, organitzades segons la seva jerarquia.</li>
                        <li>No tenen ni CATEGORIES ni ETIQUETES.</li>
                        <li>Permeten usar diverses plantilles pel seu aspecte.</li>
                        <li>No apareixen a l'RSS del blog.</li>
                        <li>La seva URL es basa en el seu nom: <em>http://www.lamevaplanaweb.com/títol-de-la-pàgina/</em></li>
                    <?php }else{ //english ?>
                    	<li>ola ka ase</li>
                    <?php }
                    }else{//Not activeQtrans ?>
                    	<li>Se organizan jerárquicamente, siendo algunas páginas “<em>padre</em>” de otras.</li>
                        <li>Aparecen en el menú principal de la web, organizadas según su jerarquía.</li>
                        <li>No tienen ni CATEGORÍAS ni ETIQUETAS.</li>
                        <li>Permiten usar varias plantillas para su aspecto.</li>
                        <li>No aparecen en la RSS del blog.</li>
                        <li>Su URL se basa en su nombre: <em>http://www.mipaginaweb.com/título-de-la-pagina/</em></li>
                    <?php } ?>
                </ul>
                <span class="closer"><div class="dashicons dashicons-dismiss"></div>
                    <?php if (function_exists('qtrans_getLanguage')){ 
						if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS > Diferencia entre Posts y Páginas</em>"
						<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>POSTS > Diferència entre Posts i Pàgines</em>"
						<?php }else{ //english ?>CLOSE
                    <?php }
                    }else{//Not activeQtrans ?>
                    	CERRAR "<em>POSTS > Diferencia entre Posts y Páginas</em>"
                    <?php } ?>
                </span>
            </div>
        </div><!-- / Diferència entre Posts i Pàgines -->
      	<span class="closer"><div class="dashicons dashicons-dismiss"></div>
			<?php if (function_exists('qtrans_getLanguage')){ 
				if( qtrans_getLanguage() == 'es' ){	?>CERRAR "<em>POSTS</em>"
				<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>TANCAR "<em>POSTS</em>"
				<?php }else{ //english ?>CLOSE
				<?php }
            }else{//Not activeQtrans ?>
                CERRAR "<em>CERRAR "<em>POSTS</em>"
            <?php } ?>
        </span>
      </div><!-- Posts -->
</div>  
<?php ?>