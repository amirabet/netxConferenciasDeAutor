<?php
/**
 * MODULS DEL DRAG / DRAGDROID
 * Esto es un SNIPPET para incluir dentro de una plantilla de página de WP
 * Las imagenes se colocan en la carpeta "images" del directorio del ChildTheme
 
 ****************************

IDs de Páginas
--------------
INICI -> 4
DRAG -> 7
DRAGDROID -> 9
CONTACTE -> 13
NOTICIES -> .blog is_frontpage
 */
?>
<!-- *********************  AVANTATGES i CARACTERÍSTIQUES ***************************** -->
<a name="caracteristicas" id="caracteristicas"></a>
<?php if ( is_page( 7 ) ) {?>
<!-- AVANTATGES DEL DRAG******************************************** -->
    <article id="avantatges_wrap">
    	<header> 
            <h2>
            	<?php if( qtrans_getLanguage() == 'es' ){?>VENTAJAS Y CARACTERÍSTICAS
				<?php }elseif( qtrans_getLanguage() == 'ca' ){?>AVANTATGES i CARACTERÍSTIQUES
                <?php }else { ?>AVANTATGES i CARACTERÍSTIQUES
                <?php } ?>
            </h2>
            <h3>
            	<?php if( qtrans_getLanguage() == 'es' ){?>DRAG es el programa informático que te lo pone más fácil, adaptable para que encaje en tu corporación.
				<?php }elseif( qtrans_getLanguage() == 'ca' ){?>DRAG és el programa informàtic que t’ho posa més fàcil, adaptable perquè encaixi a la teva corporació.
                <?php }else { ?>DRAG es el programa informático que te lo pone más fácil, adaptable para que encaje en tu corporación.
                <?php } ?>
            </h3>
        </header>
        <section>
            <ul id="avantatges_programa1">
            	<!-- *SENZILL I FUNCIONAL******************************************* -->
                <li>
                    <h4>
                        <?php if( qtrans_getLanguage() == 'es' ){?>SENCILLO Y FUNCIONAL
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>SENZILL I FUNCIONAL
                        <?php }else { ?>SENZILL I FUNCIONAL
                        <?php } ?>
                    </h4>
                    <h5>
                    	<?php if( qtrans_getLanguage() == 'es' ){?>para que obtengas el máximo rendimiento.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>per a que en treguis el màxim rendiment.
                        <?php }else { ?>para que obtengas el máximo rendimiento.
                        <?php } ?>
                    </h5>
                    <!-- CARACT -->
                    <span class="icon-stack"><i class="icon-certificate icon-stack-base"></i><i class="icon-ok"></i></span>
                    <p>
						<?php if( qtrans_getLanguage() == 'es' ){?> <b>Accesible y funcional para cualquier cuerpo de emergencias</b>, independientemente del número de efectivos y de conocimientos informáticos de los usuarios.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?> <b>Accessible i funcional per a qualsevol cos d’emergències</b>, independentment del seu número d’efectius i de coneixements informàtics dels usuaris.
                        <?php }else { ?> <b>Accessible i funcional per a qualsevol cos d’emergències</b>, independentment del seu número d’efectius i de coneixements informàtics dels usuaris.
                        <?php } ?>
                	</p>
                    <!-- CARACT -->
                    <span class="icon-stack"><i class="icon-certificate icon-stack-base"></i><i class="icon-eye-open"></i></span>
                    <p>
						<?php if( qtrans_getLanguage() == 'es' ){?> <b>Visualmente intuitivo</b>, con un entorno gráfico claro, ordenado y agradable.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?> <b>Visualment intuïtiu</b>, amb un entorn gràfic clar, endreçat i agradable.
                        <?php }else { ?> <b>Visualment intuïtiu</b>, amb un entorn gràfic clar, endreçat i agradable.
                        <?php } ?>
                	</p>
                    <span class="icon-stack"><i class="icon-certificate icon-stack-base"></i><i class="icon-time"></i></span>
                    <p>
						<?php if( qtrans_getLanguage() == 'es' ){?> <b>Con poco más de una hora de sesión formativa, DRAG está al alcance de cualquier usuario.</b>
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?> <b>Amb poc més d’una hora de sessió formativa DRAG és a l’abast de qualsevol usuari.</b>
                        <?php }else { ?> <b>Con poco más de una hora de sesión formativa, DRAG está al alcance de cualquier usuario.</b>
                        <?php } ?>
                	</p>
                </li>
                <!-- *POTENT BASE DE DADES******************************************* -->
                <li>
                    <h4>
                        <?php if( qtrans_getLanguage() == 'es' ){?>POTENTE BASE DE DATOS
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>POTENT BASE DE DADES
                        <?php }else { ?>POTENT BASE DE DADES
                        <?php } ?>
                    </h4>
                    <h5>
                    	<?php if( qtrans_getLanguage() == 'es' ){?>Un motor extraordinario para almacenar tus datos, adjuntar imágenes y otros archivos relacionados.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Un motor extraordinari per emmagatzemar les teves dades, adjuntar-hi imatges i altres arxius relacionats.
                        <?php }else { ?>Un motor extraordinario para almacenar tus datos, adjuntar imágenes y otros archivos relacionados.
                        <?php } ?>
                    </h5>
                    <!-- CARACT -->
                    <span class="icon-stack"><i class="icon-certificate icon-stack-base"></i><i class="icon-zoom-in"></i></span>
                    <p>
						<?php if( qtrans_getLanguage() == 'es' ){?> <b>Sistema de búsqueda inteligente</b>, capaz de reconocer el tipo de información introducida únicamente con el fragmento de un nombre o un número.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?> <b>Sistema de cerques intel·ligent</b>, capaç de reconèixer el tipus d’informació introduïda només amb part del nom o número.
                        <?php }else { ?> <b>Sistema de cerques intel·ligent</b>, capaç de reconèixer el tipus d’informació introduïda només amb part del nom o número.
                        <?php } ?>
                	</p>
                    <!-- CARACT -->
                    <span class="icon-stack"><i class="icon-certificate icon-stack-base"></i><i class="icon-list-ul"></i></span>
                    <p>
						<?php if( qtrans_getLanguage() == 'es' ){?> <b>Formularios intuitivos que se rellenan siguiendo un orden lógico</b>, evitando campos obligatorios que dificultan la introducción de datos.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?> <b>Formularis intuitius que s’emplenen seguint un ordre lògic</b>, evitant camps obligatoris que dificulten la introducció de dades.
                        <?php }else { ?> <b>Formularios intuitivos que se rellenan siguiendo un orden lógico</b>, evitando campos obligatorios que dificultan la introducción de datos.
                        <?php } ?>
                	</p>
                    <span class="icon-stack"><i class="icon-certificate icon-stack-base"></i><i class="icon-male"></i></span>
                    <p>
						<?php if( qtrans_getLanguage() == 'es' ){?> <b>Acceso multiusuario para que cada agente disponga de toda la información de su perfil</b> y la gestione sin problemas.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?> <b>Accés multiusuari perquè cada agent disposi de tota la informació del seu perfil</b> i la gestioni sense problemes.
                        <?php }else { ?> <b>Accés multiusuari perquè cada agent disposi de tota la informació del seu perfil</b> i la gestioni sense problemes.
                        <?php } ?>
                	</p>
                </li>
    		</ul>
            <ul id="avantatges_programa2">
            	<!-- *ESTRUCTURA MODULAR AMPLIABLE******************************************* -->
                <li>
                    <h4>
                        <?php if( qtrans_getLanguage() == 'es' ){?>ESTRUCTURA MODULAR AMPLIABLE
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>ESTRUCTURA MODULAR AMPLIABLE
                        <?php }else { ?>ESTRUCTURA MODULAR AMPLIABLE
                        <?php } ?>
                    </h4>
                    <h5>
                    	<?php if( qtrans_getLanguage() == 'es' ){?>para que adaptes el programa a las necesidades de tu jefatura.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>per adaptar el programa a les necessitats de la teva prefectura..
                        <?php }else { ?>para que adaptes el programa a las necesidades de tu jefatura.
                        <?php } ?>
                    </h5>
                    <!-- CARACT -->
                    <span class="icon-stack"><i class="icon-certificate icon-stack-base"></i><i class="icon-cogs"></i></span>
                    <p>
						<?php if( qtrans_getLanguage() == 'es' ){?> <b>Flexibilidad de configuración</b> para que puedas personalizar tu DRAG sin depender de nadie.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?> <b>Flexibilitat de configuració</b> per a que puguis personalitzar el teu DRAG sense dependre de ningú.
                        <?php }else { ?> <b>Flexibilitat de configuració</b> per a que puguis personalitzar el teu DRAG sense dependre de ningú.
                        <?php } ?>
                	</p>
                    <!-- CARACT -->
                    <span class="icon-stack"><i class="icon-certificate icon-stack-base"></i><i class="icon-tag"></i></span>
                    <p>
						<?php if( qtrans_getLanguage() == 'es' ){?> <b>Sistema temático de navegación</b>, ordenado, sencillo e intuitivo.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?> <b>Sistema temàtic de navegació</b>, ordenat, senzill i intuitiu.
                        <?php }else { ?> <b>Sistema temático de navegación</b>, ordenado, sencillo e intuitivo.
                        <?php } ?>
                	</p>
                    <span class="icon-stack"><i class="icon-certificate icon-stack-base"></i><i class="icon-sitemap"></i></span>
                    <p>
						<?php if( qtrans_getLanguage() == 'es' ){?> <b>Contrata los módulos que necesites.</b> Puedes adquirir el programa de forma integral o escoger los módulos que precises.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?> <b>Contracta els mòduls que necessitis.</b> Pots adquirir el programa de forma integrada o escollir els mòduls que calguin.
                        <?php }else { ?> <b>Contracta els mòduls que necessitis.</b> Pots adquirir el programa de forma integrada o escollir els mòduls que calguin.
                        <?php } ?>
                	</p>
                </li>
                <!-- *SERVEI D’ATENCIÓ POSTVENDA******************************************* -->
                <li>
                    <h4>
                        <?php if( qtrans_getLanguage() == 'es' ){?>SERVICIO DE ATENCIÓN POSTVENTA
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>SERVEI D’ATENCIÓ POSTVENDA
                        <?php }else { ?>SERVICIO DE ATENCIÓN POSTVENTA
                        <?php } ?>
                    </h4>
                    <h5>
                    	<?php if( qtrans_getLanguage() == 'es' ){?>que resolverá rápidamente cualquier duda.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>que resoldrà ràpidament qualsevol dubte.
                        <?php }else { ?>que resoldrà ràpidament qualsevol dubte.
                        <?php } ?>
                    </h5>
                    <!-- CARACT -->
                    <span class="icon-stack"><i class="icon-certificate icon-stack-base"></i><i class="icon-wrench"></i></span>
                    <p>
						<?php if( qtrans_getLanguage() == 'es' ){?> <b>Te ayudamos a adaptar el programa para que lo ajustes perfectamente a tu corporación.</b>
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?> <b>T’ajudarem a adaptar el programa perquè l’ajustis perfectament a la teva corporació.</b>
                        <?php }else { ?> <b>Te ayudamos a adaptar el programa para que lo ajustes perfectamente a tu corporación.</b>
                        <?php } ?>
                	</p>
                    <!-- CARACT -->
                    <span class="icon-stack"><i class="icon-certificate icon-stack-base"></i><i class="icon-microphone"></i></span>
                    <p>
						<?php if( qtrans_getLanguage() == 'es' ){?> <b>Servicio Técnico OnLine</b> para resolver cualquier duda de forma inmediata.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?> <b>Servei Tècnic OnLine</b> per resoldre qualsevol dubte de forma inmediata.
                        <?php }else { ?> <b>Servei Tècnic OnLine</b> per resoldre qualsevol dubte de forma inmediata.
                        <?php } ?>
                	</p>
                    <span class="icon-stack"><i class="icon-certificate icon-stack-base"></i><i class="icon-comments-alt"></i></span>
                    <p>
						<?php if( qtrans_getLanguage() == 'es' ){?> <b>Canal de sugerencias para nuestros clientes:</b> propuestas que nos hacen mejorar el programa cada día.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?> <b>Canal de suggerències pels nostres clients:</b> propostes que ens fan millorar el programa cada dia.
                        <?php }else { ?> <b>Canal de sugerencias para nuestros clientes:</b> propuestas que nos hacen mejorar el programa cada día.
                        <?php } ?>
                	</p>
                    <span class="icon-stack"><i class="icon-certificate icon-stack-base"></i><i class="icon-rotate-right"></i></span>
                    <p>
						<?php if( qtrans_getLanguage() == 'es' ){?> <b>Información de actualizaciones del software</b> para que conozcas puntualmente la incorporación de estas nuevas mejoras.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?> <b>Informació d’actualitzacions del programari</b> perquè coneguis puntualment la incorporació d’aquestes millores.
                        <?php }else { ?> <b>Informació d’actualitzacions del programari</b> perquè coneguis puntualment la incorporació d’aquestes millores.
                        <?php } ?>
                	</p>
                </li>
    		</ul> 
            <div class="clearboth">&nbsp;</div>   
        </section>
        <footer>
        	<ul id="avantatges_programa3">
            	<!-- *QUOTA MENSUAL FIXA SENSE SORPRESES******************************************* -->
                <li>
                    <h4>
                        <?php if( qtrans_getLanguage() == 'es' ){?>CUOTA MENSUAL FIJA SIN SORPRESAS
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>QUOTA MENSUAL FIXA SENSE SORPRESES
                        <?php }else { ?>QUOTA MENSUAL FIXA SENSE SORPRESES
                        <?php } ?>
                    </h4>
                    <h5>
                    	<?php if( qtrans_getLanguage() == 'es' ){?>Dispondrás de un DRAG siempre actualizado con nuestro sistema de actualizaciones automáticas.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Disposaràs d’un DRAG sempre actualitzat amb el nostre sistema d’actualitzacions automàtiques.
                        <?php }else { ?>Disposaràs d’un DRAG sempre actualitzat amb el nostre sistema d’actualitzacions automàtiques.
                        <?php } ?>
                    </h5>
                    <!-- CARACT -->
                    <span class="icon-stack"><i class="icon-certificate icon-stack-base"></i><i class="icon-euro"></i></span>
                    <p>
						<?php if( qtrans_getLanguage() == 'es' ){?> <b>Con todos los servicios incluidos</b>, sin costosas licencias para la adquisición del programa ni de instalación. <b>Sin contratos de permanencia</b>.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?> <b>Amb tots els serveis inclosos</b>, sense costoses llicències per l’adquisició del programa ni d’instal·lació. <b>Sense contractes de permanència</b>.
                        <?php }else { ?> <b>Con todos los servicios incluidos</b>, sin costosas licencias para la adquisición del programa ni de instalación. <b>Sin contratos de permanencia</b>.
                        <?php } ?>
                	</p>
                    <!-- CARACT -->
                    <span class="icon-stack"><i class="icon-certificate icon-stack-base"></i><i class="icon-trophy"></i></span>
                    <p>
						<?php if( qtrans_getLanguage() == 'es' ){?> <b>Te invitamos a que puedas evaluar DRAG y compruebes su rendimiento.</b> <br />Ofrecemos una demo gratuita de prueba para que descubras sus prestaciones.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?> <b>Et convidem que puguis avaluar el DRAG i constatis el seu rendiment.</b> <br />T’oferim una demo gratuïta de prova. Coneix les seves prestacions, ordenat, senzill i intuitiu.
                        <?php }else { ?> <b>Et convidem que puguis avaluar el DRAG i constatis el seu rendiment.</b> <br />T’oferim una demo gratuïta de prova. Coneix les seves prestacions, ordenat, senzill i intuitiu.
                        <?php } ?>
                	</p>
                </li>
                <!-- *CALL TO ACTION DEMO ******************************************* -->
                <li class="avantatges_calltoact">
                    <a href="<?php echo get_bloginfo('url') . ('/') . qtrans_getLanguage() . '/contacte/#form_contacto' ; ?>" class="msg" target="_self" title="<?php if( qtrans_getLanguage() == 'es' ){?>DRAG - Página de Contacto<?php }elseif( qtrans_getLanguage() == 'ca' ){?>DRAG - Pàgina de Contacte<?php }else { ?>DRAG - Contact Page<?php } ?>"> 
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/mockup_demo-trans-<?php if( qtrans_getLanguage() == 'es' ){?>es<?php }elseif( qtrans_getLanguage() == 'ca' ) { ?>ca<?php }else { ?>es<?php } ?>.png" alt="<?php if( qtrans_getLanguage() == 'es' ){?>Demo Gratuita <?php }elseif( qtrans_getLanguage() == 'ca' ) { ?>Demo Gratuïta <?php }else { ?>Free Demo <?php } ?>" />
                        <span class="calltoact bluebutton">
                        	<?php if( qtrans_getLanguage() == 'es' ){?>SOLICITAR DEMO GRATUITA
							<?php }elseif( qtrans_getLanguage() == 'ca' ){?>SOL·LICITAR DEMO GRATUITA
                            <?php }else { ?>SOLICITAR DEMO GRATUITA
                            <?php } ?>
                            <i class="icon-chevron-right"></i>
                        </span>
                	</a>
                </li>
    		</ul>
            <div class="clearboth">&nbsp;</div>
        </footer>
    <div class="clearboth">&nbsp;</div>
    </article>
<!-- Final MÒDULS DEL DRAG *********************************** -->
<?php } ?>
<?php if ( is_page( 9 ) ) {?>
<!-- AVANTATGES DEL DRAGDROID******************************************** -->
    <article id="avantatges_wrap">
    	<header> 
            <h2>
            	<?php if( qtrans_getLanguage() == 'es' ){?>VENTAJAS Y CARACTERÍSTICAS
				<?php }elseif( qtrans_getLanguage() == 'ca' ){?>AVANTATGES i CARACTERÍSTIQUES
                <?php }else { ?>AVANTATGES i CARACTERÍSTIQUES
                <?php } ?>
            </h2>
            <h3>
            	<?php if( qtrans_getLanguage() == 'es' ){?>DRAGDroid es un avance tecnológico muy importante. Nuestra empresa ha sido la primera en desarrollar una app de estas características, de la cual se han hecho eco diferentes medios de comunicación.
				<?php }elseif( qtrans_getLanguage() == 'ca' ){?>DRAGDroid és un avenç tecnològic molt important. La nostra empresa ha estat la primera en desenvolupar una app d’aquestes característiques de la qual s’han fet ressò diferents mitjans de comunicació.
                <?php }else { ?>DRAGDroid és un avenç tecnològic molt important. La nostra empresa ha estat la primera en desenvolupar una app d’aquestes característiques de la qual s’han fet ressò diferents mitjans de comunicació.
                <?php } ?>
            </h3>
        </header>
        <section>
            <ul id="avantatges_programa1">
            	<!-- *GESTIÓ INTEGRADA******************************************* -->
                <li>
                    <h4>
                        <?php if( qtrans_getLanguage() == 'es' ){?>GESTIÓN INTEGRADA
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>GESTIÓ INTEGRADA
                        <?php }else { ?>GESTIÓN INTEGRADA
                        <?php } ?>
                    </h4>
                    <h5>
                    	<?php if( qtrans_getLanguage() == 'es' ){?>Conectamos la base de datos de DRAG a dispositivos móviles.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Connectem la base de dades del DRAG a dispositius mòbils.
                        <?php }else { ?>Connectem la base de dades del DRAG a dispositius mòbils.
                        <?php } ?>
                    </h5>
                    <!-- CARACT -->
                    <span class="icon-stack"><i class="icon-certificate icon-stack-base"></i><i class="icon-move"></i></span>
                    <p>
						<?php if( qtrans_getLanguage() == 'es' ){?> <b>Administración y activación del servicio DRAGDroid desde el propio programa DRAG</b>.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?> <b>Administració i activació del servei DRAGDroid des del propi programa DRAG</b>.
                        <?php }else { ?> <b>Administración y activación del servicio DRAGDroid desde el propio programa DRAG</b>.
                        <?php } ?>
                	</p>
                    <!-- CARACT -->
                    <span class="icon-stack"><i class="icon-certificate icon-stack-base"></i><i class="icon-info"></i></span>
                    <p>
						<?php if( qtrans_getLanguage() == 'es' ){?> <b>Asignación de permisos y acceso a la información</b> por parte de jefatura.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?> <b>Assignació de permisos i accés a la informació</b> per part de prefectura.
                        <?php }else { ?> <b>Assignació de permisos i accés a la informació</b> per part de prefectura.
                        <?php } ?>
                	</p>
                    <span class="icon-stack"><i class="icon-certificate icon-stack-base"></i><i class="icon-unlock-alt"></i></span>
                    <p>
						<?php if( qtrans_getLanguage() == 'es' ){?> <b>Bloqueo de terminales desde la misma jefatura</b> si fuera preciso.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?> <b>Bloqueig de terminals des de la mateixa prefectura</b> si fos necessari.
                        <?php }else { ?> <b>Bloqueo de terminales desde la misma jefatura</b> si fuera preciso.
                        <?php } ?>
                	</p>
                </li>
                <!-- *INFORMACIÓ EN TEMPS REAL******************************************* -->
                <li>
                    <h4>
                        <?php if( qtrans_getLanguage() == 'es' ){?>INFORMACIÓN EN TIEMPO REAL
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>INFORMACIÓ EN TEMPS REAL
                        <?php }else { ?>INFORMACIÓ EN TEMPS REAL
                        <?php } ?>
                    </h4>
                    <h5>
                    	<?php if( qtrans_getLanguage() == 'es' ){?>La información que muestra DRAGDroid está permanentemente actualizada.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>La informació que mostra DRAGDroid està permanentement actualitzada.
                        <?php }else { ?>La informació que mostra DRAGDroid està permanentement actualitzada.
                        <?php } ?>
                    </h5>
                    <!-- CARACT -->
                    <span class="icon-stack"><i class="icon-certificate icon-stack-base"></i><i class="icon-tablet"></i></span>
                    <p>
						<?php if( qtrans_getLanguage() == 'es' ){?> <b>La información de DRAG se recepciona en los terminales móviles</b> previamente autorizados.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?> <b>La informació del DRAG es recepciona als terminals mòbils</b> previament autoritzats.
                        <?php }else { ?> <b>La información de DRAG se recepciona en los terminales móviles</b> previamente autorizados.
                        <?php } ?>
                	</p>
                    <!-- CARACT -->
                    <span class="icon-stack"><i class="icon-certificate icon-stack-base"></i><i class="icon-refresh"></i></span>
                    <p>
						<?php if( qtrans_getLanguage() == 'es' ){?> <b>Permite la interacción en las opciones permitidas</b>, desde DRAGDroid a jefatura y viceversa.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?> <b>Permet la interacció a les opcions permeses</b>, des del DRAGDroid a prefectura i a l’inrevés.
                        <?php }else { ?> <b>Permet la interacció a les opcions permeses</b>, des del DRAGDroid a prefectura i a l’inrevés.
                        <?php } ?>
                	</p>
                    <!-- CARACT -->
                    <span class="icon-stack"><i class="icon-certificate icon-stack-base"></i><i class="icon-cloud-upload"></i></span>
                    <p>
						<?php if( qtrans_getLanguage() == 'es' ){?> <b>Envío de archivos multimedia a jefatura</b> como documentación gráfica en las actuaciones.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?> <b>Enviament d’arxius multimèdia a prefectura</b> com a documentació gràfica de les actuacions.
                        <?php }else { ?> <b>Envío de archivos multimedia a jefatura</b> como documentación gráfica en las actuaciones.
                        <?php } ?>
                	</p>
                </li>
    		</ul> 
            <div class="clearboth">&nbsp;</div>   
        </section>
        <footer>
        	<ul id="avantatges_programa3">
            	<!-- *PERFIL INDIVIDUALITZAT******************************************* -->
                <li>
                    <h4>
                        <?php if( qtrans_getLanguage() == 'es' ){?>PERFIL INDIVIDUALITZADO
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>PERFIL INDIVIDUALITZAT
                        <?php }else { ?>PERFIL INDIVIDUALITZAT
                        <?php } ?>
                    </h4>
                    <h5>
                    	<?php if( qtrans_getLanguage() == 'es' ){?>Cada DRAGDroid está asignado a un agente, ofreciéndole información relevante.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Cada DRAGDroid es troba assignat a un agent, oferint-li informació rellevant.
                        <?php }else { ?>Cada DRAGDroid es troba assignat a un agent, oferint-li informació rellevant.
                        <?php } ?>
                    </h5>
                    <!-- CARACT -->
                    <span class="icon-stack"><i class="icon-certificate icon-stack-base"></i><i class="icon-calendar"></i></span>
                    <p>
						<?php if( qtrans_getLanguage() == 'es' ){?> <b>Consulta del cuadrante de servicio en el terminal:</b> calendario personal, licencias y permisos.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?> <b>Consulta del quadrant personal al terminal:</b> calendari, llicències i permisos.
                        <?php }else { ?> <b>Consulta del quadrant personal al terminal:</b> calendari, llicències i permisos.
                        <?php } ?>
                	</p>
                    <!-- CARACT -->
                    <span class="icon-stack"><i class="icon-certificate icon-stack-base"></i><i class="icon-tasks"></i></span>
                    <p>
						<?php if( qtrans_getLanguage() == 'es' ){?> <b>Diferentes niveles de permisos e información</b> según sean los perfiles asignados.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?> <b>Diferents nivells de permisos i d’informació</b> segons l’usuari i la seva aplicació vinculada.
                        <?php }else { ?> <b>Diferents nivells de permisos i d’informació</b> segons l’usuari i la seva aplicació vinculada.
                        <?php } ?>
                	</p>
                    <!-- CARACT -->
                    <span class="icon-stack"><i class="icon-certificate icon-stack-base"></i><i class="icon-user"></i></span>
                    <p>
						<?php if( qtrans_getLanguage() == 'es' ){?> <b>Identificación del usuario por la seguridad del propio agente y de la jefatura.</b>
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?> <b>Identificació de l’usuari per la seguretat del propi agent i de la prefectura.</b>
                        <?php }else { ?> <b>Identificación del usuario por la seguridad del propio agente y de la jefatura.</b>
                        <?php } ?>
                	</p>
                </li>
    		</ul>
            <div class="clearboth">&nbsp;</div>
        </footer>
    <div class="clearboth">&nbsp;</div>
    </article>
<?php } ?>