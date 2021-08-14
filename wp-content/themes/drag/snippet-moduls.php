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
<!-- *********************  BANNERS ***************************** -->

<?php if ( is_page( 7 ) ) {?>
<!-- MÒDULS DEL DRAG******************************************** -->
    <article id="moduls_wrap">
    	<header> 
            <h2>
            	<?php if( qtrans_getLanguage() == 'es' ){?>MÓDULOS TEMÁTICOS
				<?php }elseif( qtrans_getLanguage() == 'ca' ){?>MÒDULS TEMÀTICS
                <?php }else { ?>MÓDULOS TEMÁTICOS
                <?php } ?>
            </h2>
            <h3>
            	<?php if( qtrans_getLanguage() == 'es' ){?>DRAG está estructurado en módulos que se pueden contratar separadamente según las necesidades de cada jefatura.
				<?php }elseif( qtrans_getLanguage() == 'ca' ){?>El DRAG està estructurat en mòduls que poden contractar-se separadament segons les necessitatsde cada prefectura.
                <?php }else { ?>DRAG está estructurado en módulos que se pueden contratar separadamente según las necesidades de cada jefatura.
                <?php } ?>
            </h3>
        </header>
        <section>
            <ul id="moduls_programa">
            	<!-- MÒDUL Serveis ******************************************** -->
                <li>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/moduls_serveis.png" class="" alt="<?php if( qtrans_getLanguage() == 'es' ){?>Servicios<?php }elseif( qtrans_getLanguage() == 'ca' ){?>Serveis<?php }else { ?>Servicios<?php } ?>" />
                    <h4>
                        <?php if( qtrans_getLanguage() == 'es' ){?>Servicios
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Serveis
                        <?php }else { ?>Serveis
                        <?php } ?>
                    </h4>
                    <p><em>
                    	<?php if( qtrans_getLanguage() == 'es' ){?>Registro de todas las actuaciones de la policía local.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Enregistrament de totes les actuacions de la policia local.
                        <?php }else { ?>DRAG
                        <?php } ?>
                    <span class="readmore"><i class="icon-chevron-down readplus"></i><i>&nbsp;</i></span></em></p>
                    <p class="moduls_caract">
                        <i class="icon-angle-right"></i><span> 
							<?php if( qtrans_getLanguage() == 'es' ){?> Novedades diarias.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Novetats diàries.
                            <?php }else { ?>Novetats diàries.
                            <?php } ?>
                        </span><i class="icon-angle-right"></i><span> 
                        	<?php if( qtrans_getLanguage() == 'es' ){?> Planificaciones y actividades programadas.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Planificacions y activitats programades.
                            <?php }else { ?>Planificacions y activitats programades.
                            <?php } ?>

                        </span><i class="icon-angle-right"></i><span> 
                        	<?php if( qtrans_getLanguage() == 'es' ){?>Registro de personas, comercios y vehículos enlazados y relacionados con todos los módulos de DRAG.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Registre de persones, comerços i vehicles enllaçats i relacionats amb tots els mòduls del DRAG.
                            <?php }else { ?>Registre de persones, comerços i vehicles enllaçats i relacionats amb tots els mòduls del DRAG.
                            <?php } ?>
                    </span></p>
                </li><!-- MÒDUL Trànsit ******************************************** -->
                <li>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/moduls_transit.png" class="" alt="<?php if( qtrans_getLanguage() == 'es' ){?>Tráfico<?php }elseif( qtrans_getLanguage() == 'ca' ){?>Serveis<?php }else { ?>Tráfico<?php } ?>" />
                    <h4>
                        <?php if( qtrans_getLanguage() == 'es' ){?>Tráfico
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Trànsit
                        <?php }else { ?>Tráfico
                        <?php } ?>
                    </h4>
                    <p><em>
                    	<?php if( qtrans_getLanguage() == 'es' ){?>Engloba todo lo relativo a temas de disciplina vial.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Engloba tot el relatiu a temes de disciplina viària.
                        <?php }else { ?>Engloba todo lo relativo a temas de disciplina vial.
                        <?php } ?>
                    <span class="readmore"><i class="icon-chevron-down readplus"></i><i>&nbsp;</i></span></em></p>
                    <p class="moduls_caract">
                        <i class="icon-angle-right"></i><span> 
							<?php if( qtrans_getLanguage() == 'es' ){?> Accidentes de tráfico.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Accidents de trànsit.
                            <?php }else { ?>Accidentes de tráfico.
                            <?php } ?>
                        </span><i class="icon-angle-right"></i><span> 
                        	<?php if( qtrans_getLanguage() == 'es' ){?> Denuncias de vehículos y grúa.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Denúncies de vehicles i grua.
                            <?php }else { ?>Denúncies de vehicles i grua.
                            <?php } ?>

                        </span><i class="icon-angle-right"></i><span> 
                        	<?php if( qtrans_getLanguage() == 'es' ){?>Vehículos abandonados.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Vehicles abandonats.
                            <?php }else { ?>Vehicles abandonats.
                            <?php } ?>
                    	</span><i class="icon-angle-right"></i><span> 
                        	<?php if( qtrans_getLanguage() == 'es' ){?>Vados.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Guals.
                            <?php }else { ?>Guals.
                            <?php } ?>
                    </span></p>
                </li><!-- MÒDUL Policia Judicial ******************************************** -->
                <li class="li_breaker2">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/moduls_judicial.png" class="" alt="<?php if( qtrans_getLanguage() == 'es' ){?>Policía Judicial<?php }elseif( qtrans_getLanguage() == 'ca' ){?>Policia Judicial<?php }else { ?>Policía Judicial<?php } ?>" />
                    <h4>
                        <?php if( qtrans_getLanguage() == 'es' ){?>Policía Judicial
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Policia Judicial
                        <?php }else { ?>Policía Judicial
                        <?php } ?>
                    </h4>
                    <p><em>
                    	<?php if( qtrans_getLanguage() == 'es' ){?>Actuaciones en colaboración con los órganos judiciales.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Actuacions en col·laboració amb els òrgans judicials.
                        <?php }else { ?>Actuaciones en colaboración con los órganos judiciales.
                        <?php } ?>
                    <span class="readmore"><i class="icon-chevron-down readplus"></i><i>&nbsp;</i></span></em></p>
                    <p class="moduls_caract">
                        <i class="icon-angle-right"></i><span> 
							<?php if( qtrans_getLanguage() == 'es' ){?> Registro de atestados.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Accidents de trànsit.
                            <?php }else { ?>Registre d’atestats.
                            <?php } ?>
                        </span><i class="icon-angle-right"></i><span> 
                        	<?php if( qtrans_getLanguage() == 'es' ){?> Depósito de detenidos.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Dipòsit de detinguts.
                            <?php }else { ?>Dipòsit de detinguts.
                            <?php } ?>

                        </span><i class="icon-angle-right"></i><span> 
                        	<?php if( qtrans_getLanguage() == 'es' ){?>Citaciones judiciales a particulares y agentes.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Citacions judicials a particulars i agents.
                            <?php }else { ?>Citacions judicials a particulars i agents.
                            <?php } ?>
                    </span></p>
                </li><!-- MÒDUL Policia Administrativa ******************************************** -->
                <li class="li_breaker3">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/moduls_administratiu.png" class="" alt="<?php if( qtrans_getLanguage() == 'es' ){?>Policía Administrativa<?php }elseif( qtrans_getLanguage() == 'ca' ){?>Policia Administrativa<?php }else { ?>Policia Administrativa<?php } ?>" />
                    <h4>
                        <?php if( qtrans_getLanguage() == 'es' ){?>Policía Administrativa
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Policia Administrativa
                        <?php }else { ?>Policía Administrativa
                        <?php } ?>
                    </h4>
                    <p><em>
                    	<?php if( qtrans_getLanguage() == 'es' ){?>Gestión interna y soporte al Ayuntamiento. Colaboración con otros organismos públicos.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Gestió interna i suport a l’Ajuntament. Col·laboració amb altres organismes públics.
                        <?php }else { ?>Gestión interna y soporte al Ayuntamiento. Colaboración con otros organismos públicos.
                        <?php } ?>
                    <span class="readmore"><i class="icon-chevron-down readplus"></i><i>&nbsp;</i></span></em></p>
                    <p class="moduls_caract">
                        <i class="icon-angle-right"></i><span> 
							<?php if( qtrans_getLanguage() == 'es' ){?> Registro de documentos.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Registre de documents.
                            <?php }else { ?>Registre d’atestats.
                            <?php } ?>
                        </span><i class="icon-angle-right"></i><span> 
                        	<?php if( qtrans_getLanguage() == 'es' ){?> Expedientes de ordenanzas.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Expedients d’ordenances.
                            <?php }else { ?>Expedients d’ordenances.
                            <?php } ?>

                        </span><i class="icon-angle-right"></i><span> 
                        	<?php if( qtrans_getLanguage() == 'es' ){?>Objetos encontrados.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Objectes trobats.
                            <?php }else { ?>Objectes trobats.
                            <?php } ?>
                    	</span><i class="icon-angle-right"></i><span> 
                        	<?php if( qtrans_getLanguage() == 'es' ){?>Tenencia de animales.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Tinença d’animals.
                            <?php }else { ?>Tinença d’animals.
                            <?php } ?>
                    </span></p>
                </li><!-- MÒDUL Recursos Humans ******************************************** -->
                <li class="li_breaker2">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/moduls_quadrant.png" class="" alt="<?php if( qtrans_getLanguage() == 'es' ){?>Recursos Humanos<?php }elseif( qtrans_getLanguage() == 'ca' ){?>Recursos Humans<?php }else { ?>Recursos Humans<?php } ?>" />
                    <h4>
                        <?php if( qtrans_getLanguage() == 'es' ){?>Recursos Humanos
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Recursos Humans
                        <?php }else { ?>Recursos Humans
                        <?php } ?>
                    </h4>
                    <p><em>
                    	<?php if( qtrans_getLanguage() == 'es' ){?>Administración del personal con acceso de cada usuario a su información.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Administració del personal amb accés de cada usuari a la seva informació.
                        <?php }else { ?>Administració del personal amb accés de cada usuari a la seva informació.
                        <?php } ?>
                    <span class="readmore"><i class="icon-chevron-down readplus"></i><i>&nbsp;</i></span></em></p>
                    <p class="moduls_caract">
                        <i class="icon-angle-right"></i><span> 
							<?php if( qtrans_getLanguage() == 'es' ){?> Personal.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Personal.
                            <?php }else { ?>Personal.
                            <?php } ?>
                        </span><i class="icon-angle-right"></i><span> 
                        	<?php if( qtrans_getLanguage() == 'es' ){?>Licencias y ausencias.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Llicències i absències.
                            <?php }else { ?>Llicències i absències.
                            <?php } ?>

                        </span><i class="icon-angle-right"></i><span> 
                        	<?php if( qtrans_getLanguage() == 'es' ){?>Cuadrante de servicio.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Quadrant de servei.
                            <?php }else { ?>Quadrant de servei.
                            <?php } ?>
                    	</span><i class="icon-angle-right"></i><span> 
                        	<?php if( qtrans_getLanguage() == 'es' ){?>Pluses.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Plusos.
                            <?php }else { ?>Plusos.
                            <?php } ?>
                    </span></p>
                </li><!-- MÒDUL Recursos Materials ******************************************** -->
                <li>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/moduls_recursos.png" class="" alt="<?php if( qtrans_getLanguage() == 'es' ){?>Recursos Materiales<?php }elseif( qtrans_getLanguage() == 'ca' ){?>Recursos Materials<?php }else { ?>Recursos Materials<?php } ?>" />
                    <h4>
                        <?php if( qtrans_getLanguage() == 'es' ){?>Recursos Materiales
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Recursos Materials
                        <?php }else { ?>Recursos Materials
                        <?php } ?>
                    </h4>
                    <p><em>
                    	<?php if( qtrans_getLanguage() == 'es' ){?>Gestión y control interno de los recursos materiales de la policía local.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Gestió i control intern dels recursos materials de la policia local.
                        <?php }else { ?>Gestió i control intern dels recursos materials de la policia local.
                        <?php } ?>
                    <span class="readmore"><i class="icon-chevron-down readplus"></i><i>&nbsp;</i></span></em></p>
                    <p class="moduls_caract">
                        <i class="icon-angle-right"></i><span> 
							<?php if( qtrans_getLanguage() == 'es' ){?> Armas reglamentarias y particulares de los agentes.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?> Armes reglamentàries i particulars dels agents.
                            <?php }else { ?>Personal.
                            <?php } ?>
                        </span><i class="icon-angle-right"></i><span> 
                        	<?php if( qtrans_getLanguage() == 'es' ){?>Vestuario y complementos de trabajo del personal.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Vestuari i complements de treball pel personal.
                            <?php }else { ?>Vestuario y complementos de trabajo del personal.
                            <?php } ?>
                    </span></p>
                </li></ul>    
    		<div class="clearboth">&nbsp;</div>
        </section>
    </article>
<!-- Final MÒDULS DEL DRAG *********************************** -->
<?php } ?>
<?php if ( is_page( 9 ) ) {?>
<!-- MÒDULS DRAGDROID ******************************************** -->
    <article id="moduls_wrap">
    	<header> 
            <h2>
            	<?php if( qtrans_getLanguage() == 'es' ){?>MÓDULOS TEMÁTICOS
				<?php }elseif( qtrans_getLanguage() == 'ca' ){?>MÒDULS TEMÀTICS
                <?php }else { ?>MÓDULOS TEMÁTICOS
                <?php } ?>
            </h2>
            <h3>
            	<?php if( qtrans_getLanguage() == 'es' ){?>La aplicación DRAGDroid incluye los módulos de información personal y aquellos esenciales para poder realizar el servicio sobre el terreno.
				<?php }elseif( qtrans_getLanguage() == 'ca' ){?>L’Aplicació DRAGDROID recull els mòduls d’informació personal i aquells essencials per a poder realitzar el servei sobre el terreny.
                <?php }else { ?>L’Aplicació DRAGDROID recull els mòduls d’informació personal i aquells essencials per a poder realitzar el servei sobre el terreny.
                <?php } ?>
            </h3>
        </header>
        <section>
            <ul id="moduls_dragdroid">
            	<!-- MÒDUL Serveis ******************************************** -->
                <li>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/moduls_serveis.png" class="" alt="<?php if( qtrans_getLanguage() == 'es' ){?>Servicios<?php }elseif( qtrans_getLanguage() == 'ca' ){?>Serveis<?php }else { ?>Servicios<?php } ?>" />
                    <h4>
                        <?php if( qtrans_getLanguage() == 'es' ){?>Servicios
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Serveis
                        <?php }else { ?>Serveis
                        <?php } ?>
                    </h4>
                    <p><em>
                    	<?php if( qtrans_getLanguage() == 'es' ){?>Consulta todas las actuaciones de la policía local.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Enregistrament de totes les actuacions de la policia local.
                        <?php }else { ?>Consulta todas las actuaciones de la policía local.
                        <?php } ?>
                    <span class="readmore"><i class="icon-chevron-down readplus"></i><i>&nbsp;</i></span></em></p>
                    <p class="moduls_caract">
                        <i class="icon-angle-right"></i><span> 
							<?php if( qtrans_getLanguage() == 'es' ){?> Novedades diarias del servicio en curso o selecciona el periodo a consultar.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Novetats diàries del servei en curs o selecciona el període que vols consultar.
                            <?php }else { ?>Novetats diàries del servei en curs o selecciona el període que vols consultar.
                            <?php } ?>
                        </span><i class="icon-angle-right"></i><span> 
                        	<?php if( qtrans_getLanguage() == 'es' ){?> Evolución de las planificaciones y actividades programadas
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Desenvolupament de les planificacions y activitats programades.
                            <?php }else { ?>Evolución de las planificaciones y actividades programadas.
                            <?php } ?>
                    </span></p>
                </li><!-- MÒDUL Grua ******************************************** -->
                <li>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/moduls_transit.png" class="" alt="<?php if( qtrans_getLanguage() == 'es' ){?>Grúa<?php }elseif( qtrans_getLanguage() == 'ca' ){?>Grua<?php }else { ?>Grua<?php } ?>" />
                    <h4>
                        <?php if( qtrans_getLanguage() == 'es' ){?>Grúa
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Grua
                        <?php }else { ?>Grua
                        <?php } ?>
                    </h4>
                    <p><em>
                    	<?php if( qtrans_getLanguage() == 'es' ){?>Coordina y comparte información entre la central de policía y los operarios de grúa municipal.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Coordina i comparteix informació entre la central de la policia i els operaris de grua.
                        <?php }else { ?>Coordina i comparteix informació entre la central de la policia i els operaris de grua.
                        <?php } ?>
                    <span class="readmore"><i class="icon-chevron-down readplus"></i><i>&nbsp;</i></span></em></p>
                    <p class="moduls_caract">
                        <i class="icon-angle-right"></i><span> 
							<?php if( qtrans_getLanguage() == 'es' ){?>Localización in situ de vehículos infractores. Captura y transmisión de imágenes fotográficas.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Localització in situ de vehicles infractors. Captura i transmissió d’imatges fotogràfiques.
                            <?php }else { ?>Localització in situ de vehicles infractors. Captura i transmissió d’imatges fotogràfiques.
                            <?php } ?>
                        </span><i class="icon-angle-right"></i><span> 
                        	<?php if( qtrans_getLanguage() == 'es' ){?> Orden de retirada desde la central de policía una vez valoradas las imágenes de la supuesta infracción.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Ordre de retirada des de la central de policia un cop valorades les imatges de la suposada infracció.
                            <?php }else { ?>Orden de retirada desde la central de policía una vez valoradas las imágenes de la supuesta infracción.
                            <?php } ?>
                    </span></p>
                </li><!-- MÒDUL Quadrant ******************************************** -->
                <li>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/layout/moduls_quadrant.png" class="" alt="<?php if( qtrans_getLanguage() == 'es' ){?>Cuadrante<?php }elseif( qtrans_getLanguage() == 'ca' ){?>Quadrante<?php }else { ?>Cuadrante<?php } ?>" />
                    <h4>
                        <?php if( qtrans_getLanguage() == 'es' ){?>Cuadrante
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Quadrant
                        <?php }else { ?>Cuadrante
                        <?php } ?>
                    </h4>
                    <p><em>
                    	<?php if( qtrans_getLanguage() == 'es' ){?>Administración del personal con acceso de cada usuario a su información.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Administració del personal amb accés de cada usuari a la seva informació.
                        <?php }else { ?>Administració del personal amb accés de cada usuari a la seva informació.
                        <?php } ?>
                    <span class="readmore"><i class="icon-chevron-down readplus"></i><i>&nbsp;</i></span></em></p>
                    <p class="moduls_caract">
                        <i class="icon-angle-right"></i><span> 
							<?php if( qtrans_getLanguage() == 'es' ){?> Calendario laboral con las autorizaciones de cambios ya reflejadas.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Calendari laboral amb les autoritzacions de canvis ja introduïdes. 
                            <?php }else { ?>Calendari laboral amb les autoritzacions de canvis ja introduïdes.
                            <?php } ?>
                        </span><i class="icon-angle-right"></i><span> 
                        	<?php if( qtrans_getLanguage() == 'es' ){?>Vinculación con el módulo de licencias.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Vinculació amb el mòdul de llicències.
                            <?php }else { ?>Vinculació amb el mòdul de llicències.
                            <?php } ?>
                    </span></p>
                </li></ul>    
    	</section>
    </article>
<!-- Final MÒDULS DRAGDROID *********************************** -->
<?php } ?>