<?php
/**************************************************************/
/*
/* PÀGINA D'ESTADÍSQTIQUES DE XARXES SOCIALS
/* Presenta un enllaç a la Pàgina d'Estadístiques de cada Xarxa Social 
/*
/**************************************************************/
//
//*****************************************************************
// Defineix a un array els widgets que estan disponibles
// amb l'enllaç a l'analytics de cada Xarxa si hi tenim configurats
// els settings pertinents.
//*****************************************************************
$social_array = array();
//
//Facebook**********************
$fb_site_link = $fb_array['url'];
if (!empty ($fb_site_link)) {
	$output = '';
	$output .= '<div class="postbox closed" id="facebook">';
	$output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div>';
	$output .= '<h3 class="hndle">Facebook </h3><div class="inside">';
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$stats_notice ='Para poder consultar las Estadísticas debes acceder con tu nombre de Usuario y Contraseña y ser Administrador de la Página';
			$stats_info = 'Las estadísticas de Página (Insights) sirven para medir el rendimiento de la página; para que estén disponibles, al menos 30 personas deben indicar que les gusta tu página. Busca datos demográficos anónimos sobre tu público y entérate de cómo los usuarios descubren y responden a tus publicaciones.';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="https://www.facebook.com/help/336893449723054" target="_blank"> Ayuda</a>';
			$gotostats = 'Estadísticas';
		}elseif( qtrans_getLanguage() == 'ca' ){ 
			$stats_notice ='Per poder consultar les Estadístiques has d\'accedir amb el teu nom d\'Usuari i Contrassenya i ser Administrador de la Pàgina';
			$stats_info = 'Les estadístiques de Pàgina (Insights) permeten mesurar el rendiment de la pàgina; per a que estiguin disponibles, al menys 30 persones han d\'indicar que els agradala teva pàgina. Cerca dades demogràfiques anònimes sobre el teu públic i entéra\'t de com els usuaris descubreixen i responen a les teves publicacions.';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="https://www.facebook.com/help/336893449723054" target="_blank"> Ajuda</a>';
			$gotostats = 'Estadístiques';
		}else{ //english
			$stats_notice ='You must Login to see your Stats and have Administration Roles';
			$stats_info = 'Insights provide information about your Page\'s performance and are available after at least 30 people like your Page. Find demographic data about your audience, and see how people are discovering and responding to your posts.';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="https://www.facebook.com/help/336893449723054" target="_blank">Help</a>';
			$gotostats = 'See Stats';
		}
	}else{//Not activeQtrans
		$stats_notice ='Para poder consultar las Estadísticas debes acceder con tu nombre de Usuario y Contraseña y ser Administrador de la Página';
		$stats_info = 'Las estadísticas de Página (Insights) sirven para medir el rendimiento de la página; para que estén disponibles, al menos 30 personas deben indicar que les gusta tu página. Busca datos demográficos anónimos sobre tu público y entérate de cómo los usuarios descubren y responden a tus publicaciones.';
		$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="https://www.facebook.com/help/336893449723054" target="_blank"> Ayuda</a>';
		$gotostats = 'Estadísticas';
	}
	$output .= '<div class="notice"><p><i>' . $stats_notice . '</i></p></div>';
	$output .= '<p>' . $stats_info . '</p>';
	$output .= '<p><b>' . $stats_help . '</b></p>';
	$output .= '<b><a href="https://www.facebook.com/' . $fb_site_link . '/insights" target="_blank" title="Facebook" class="alignright button ">' . $gotostats . '</a></b><br/><div class="clear"></div>';
	$output .= '</div><!-- div class="inside " -->';
	$output .= '</div><!-- div class="postbox " -->';
	$social_array[] = $output;
}

//
//Twitter **********************
$tw_site_link = $tw_array['url'];
$tw_user_id = $tw_array['user_id'];
if (!empty ($tw_site_link) && !empty ($tw_user_id)) {
	$output = '';
	$output .= '<div class="postbox closed" id="twitter">';
	$output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div>';
	$output .= '<h3 class="hndle">Twitter </h3><div class="inside">';
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$stats_notice ='Para poder consultar las Estadísticas debes acceder con tu nombre de Usuario y Contraseña';
			$stats_info = '<b>Mide y mejora tu impacto en Twitter.</b> Conoce tus paneles de control:<br/><b>Actividad del Tweet</b> Mide la interacción y aprende cómo hacer que tus Tweets sean más exitosos.<br/><b>Seguidores</b> Explora los intereses, ubicaciones y demografía de tus seguidores.<br/><b>Tarjetas de Twitter</b> Vigila la forma en que tus Tarjetas de Twitter incitan clics, instalaciones de aplicación, y Retweets.';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="https://analytics.twitter.com/about?lang=es" target="_blank"> Ayuda</a>';
			$gotostats = 'Estadísticas';
		}elseif( qtrans_getLanguage() == 'ca' ){ 
			$stats_notice ='Per poder consultar les Estadístiques has d\'accedir amb el teu nom d\'Usuari i Contrassenya';
			$stats_info = '<b>Mesura i millora el teu impacte a Twitter.</b> Coneix els panells de control:<br/><b>Activitat de la Piulada</b> Mesura la interacció i aprèn com fer que les teves piulades siguin més exitoses.<br/><b>Seguidors</b> Explora els interessos, ubicacions i demografia dels teus seguidors.<br/><b>Tarjes de Twitter</b> Vigila la forma en la que les teves Tarjes de Twitter inciten clics, instal·laciones d\'aplicació, i Retweets.';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="https://analytics.twitter.com/about?lang=es" target="_blank"> Ajuda</a>';
			$gotostats = 'Estadístiques';
		}else{ //english
			$stats_notice ='You must Login to see your Stats';
			$stats_info = '<b>Measure and boost your impact on Twitter.</b> Meet your dashboards:<br/><b>Tweet activity</b> Measure engagement and learn how to make your Tweets more successful.<br/><b>Followers</b> Explore the interests, locations, and demographics of your followers.<br/><b>Twitter Cards</b> Track how your Twitter Cards drive clicks, app installs, and Retweets.';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="https://analytics.twitter.com/about?lang=en" target="_blank">Help</a>';
			$gotostats = 'See Stats';
		}
	}else{//Not activeQtrans
		$stats_notice ='Para poder consultar las Estadísticas debes acceder con tu nombre de Usuario y Contraseña';
		$stats_info = '<b>Mide y mejora tu impacto en Twitter.</b> Conoce tus paneles de control:<br/><b>Actividad del Tweet</b> Mide la interacción y aprende cómo hacer que tus Tweets sean más exitosos.<br/><b>Seguidores</b> Explora los intereses, ubicaciones y demografía de tus seguidores.<br/><b>Tarjetas de Twitter</b> Vigila la forma en que tus Tarjetas de Twitter incitan clics, instalaciones de aplicación, y Retweets.';
		$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="https://analytics.twitter.com/about?lang=es" target="_blank"> Ayuda</a>';
		$gotostats = 'Estadísticas';
	}
	$output .= '<div class="notice"><p><i>' . $stats_notice . '</i></p></div>';
	$output .= '<p>' . $stats_info . '</p>';
	$output .= '<p><b>' . $stats_help . '</b></p>';
	$output .= '<b><a href="http://analytics.twitter.com" target="_blank" title="Twitter" class="alignright button ">' . $gotostats . '</a></b><br/><div class="clear"></div>';
	$output .= '</div><!-- div class="inside " -->';
	$output .= '</div><!-- div class="postbox " -->';
	$social_array[] = $output;
}else{// Si tenim l'URL de Twitter però no està configurat l'ID d'usuari apareix l'avís que cal configurar Twitter Analytics
	if (!empty ($tw_site_link) && empty ($tw_user_id)) {
		$output = '';
		$output .= '<div class="postbox closed" id="twitter">';
		$output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div>';
		$output .= '<h3 class="hndle">Twitter </h3><div class="inside">';
		if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){
				$stats_notice ='Parece que no tienes configurado tu ID de Usuario';
				$stats_info = 'Puedes encontrar tu ID de Usuario <b><a href="http://gettwitterid.com/" target="_blank">AQUÍ</a></b>.</p><p>Cuando tengas tu ID de Usuario debes introducirlos en el campo pertinente en la página <b><a href="admin.php?page=stats_config" target="_self">Estadísticas -> Configuración</a></b>.';
				$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="https://dev.twitter.com/docs/cards/markup-reference" target="_blank"> Ayuda</a></b></b>';
			}elseif( qtrans_getLanguage() == 'ca' ){ 
				$stats_notice ='Sembla que no tens configurat el teu ID d\'usuari';
				$stats_info = 'Pots trobar el teu ID d\'Usuari <b><a href="http://gettwitterid.com/" target="_blank">AQUÍ</a></b>.</p><p>Un cop tinguis el teu ID d\'Usuari l\'has d\'introduïr dins del camp pertinent a la pàgina <b><a href="admin.php?page=stats_config" target="_self">Estadístiques -> Configuració</a></b>.';
				$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="https://dev.twitter.com/docs/cards/markup-reference" target="_blank"> Ajuda</a>';
			}else{ //english
				$stats_notice ='Looks like you haven\'t set your User ID';
				$stats_info = 'You can find your User ID <b><a href="http://gettwitterid.com/" target="_blank">HERE</a>.</p><p>Once you know your user ID you must set it in its own field at page <b><a href="admin.php?page=stats_config" target="_self">Stats -> Settings</a></b>.';
				$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="https://dev.twitter.com/docs/cards/markup-reference" target="_blank">Help</a>';
			}
		}else{//Not activeQtrans
			$stats_notice ='Parece que no tienes configurado tu ID de Usuario';
			$stats_info = 'Puedes encontrar tu ID de Usuario <b><a href="http://gettwitterid.com/" target="_blank">AQUÍ</a></b>.</p><p>Cuando tengas tu ID de Usuario debes introducirlos en el campo pertinente en la página <b><a href="admin.php?page=stats_config" target="_self">Estadísticas -> Configuración</a></b>.';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="https://dev.twitter.com/docs/cards/markup-reference" target="_blank"> Ayuda</a></b></b>';
		}
		$output .= '<div class="notice_error"><p><i>' . $stats_notice . '</i></p></div>';
		$output .= '<p>' . $stats_info . '</p>';
		$output .= '<p><b>' . $stats_help . '</b></p>';
		$output .= '</div><!-- div class="inside " -->';
		$output .= '</div><!-- div class="postbox " -->';
		$social_array[] = $output;
	}// Final avís Falta Twitter ID
}
//
//
//Google Plus **********************
$gplus_array = get_option('social_gplus');
$gp_site_link = $gplus_array['url'];
if (!empty ($gp_site_link)) {
	$output = '';
	$output .= '<div class="postbox closed" id="gplus">';
	$output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div>';
	$output .= '<h3 class="hndle">Google+ </h3><div class="inside">';
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$stats_notice ='Para poder consultar las Estadísticas debes acceder con tu nombre de Usuario y Contraseña';
			$stats_info = 'Las estadísticas proporcionan información sobre cómo interactúan los usuarios con la información de tu empresa verificada en Google. Para consultar las estadísticas, primero debes verificar la información de tu empresa.';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="https://support.google.com/business/answer/2911773?hl=es" target="_blank"> Ayuda</a>';
			$gotostats = 'Estadísticas';
		}elseif( qtrans_getLanguage() == 'ca' ){ 
			$stats_notice ='Per poder consultar les Estadístiques has d\'accedir amb el teu nom d\'Usuari i Contrassenya';
			$stats_info = 'Les dades estadístiques proporcionen informació estadística sobre la manera com els usuaris interaccionen amb la informació verificada de la teva empresa a Google. Per veure dades estadístiques, primera has de verificar la informació de la teva empresa.';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="https://support.google.com/business/answer/2911773?hl=ca" target="_blank"> Ajuda</a>';
			$gotostats = 'Estadístiques';
		}else{ //english
			$stats_notice ='You must Login to see your Stats';
			$stats_info = 'Insights share statistical information on how users interact with your verified business information on Google. To see insights, you\'ll first need to verify your business information.';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="https://support.google.com/business/answer/2911773?hl=en" target="_blank">Help</a>';
			$gotostats = 'See Stats';
		}
	}else{//Not activeQtrans
		$stats_notice ='Para poder consultar las Estadísticas debes acceder con tu nombre de Usuario y Contraseña';
		$stats_info = 'Las estadísticas proporcionan información sobre cómo interactúan los usuarios con la información de tu empresa verificada en Google. Para consultar las estadísticas, primero debes verificar la información de tu empresa.';
		$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="https://support.google.com/business/answer/2911773?hl=es" target="_blank"> Ayuda</a>';
		$gotostats = 'Estadísticas';
	}
	$output .= '<div class="notice"><p><i>' . $stats_notice . '</i></p></div>';
	$output .= '<p>' . $stats_info . '</p>';
	$output .= '<p><b>' . $stats_help . '</b></p>';
	$output .= '<b><a href="https://plus.google.com/b/' . $gp_site_link . '/insights/" target="_blank" title="Google Plus" class="alignright button ">' . $gotostats . '</a></b><br/><div class="clear"></div>';
	$output .= '</div><!-- div class="inside " -->';
	$output .= '</div><!-- div class="postbox " -->';
	$social_array[] = $output;
}//
//
//
//You Tube **********************
$ytube_array = get_option('social_ytube');
$yt_site_link = $ytube_array['url'];
$playlist = $ytube_array['playlist'];
if (!empty ($yt_site_link)) {
	$output = '';
	$output .= '<div class="postbox closed" id="ytube">';
	$output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div>';
	$output .= '<h3 class="hndle">YouTube </h3><div class="inside">';
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$stats_notice ='Para poder consultar las Estadísticas debes acceder con tu nombre de Usuario y Contraseña';
			$stats_info = 'YouTube Analytics te permite monitorizar el rendimiento de tu canal y vídeos con métricas e informes actualizados. Hay una enorme cantidad de datos disponibles repartidos en diferentes informes (por ejemplo, Reproducciones, Fuentes de tráfico, Datos demográficos...).';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="https://support.google.com/youtube/answer/1714323?hl=es" target="_blank"> Ayuda</a>';
			$gotostats = 'Estadísticas';
		}elseif( qtrans_getLanguage() == 'ca' ){ 
			$stats_notice ='Per poder consultar les Estadístiques has d\'accedir amb el teu nom d\'Usuari i Contrassenya';
			$stats_info = 'YouTube Analytics et permet monitoritzar el rendimient del teu canal i videos amb mètriques i informes actualizats. Hi ha una enorme quantitat de dades disponibles repartits en diferents informes (per exemple, Reproduccions, Fonts de trànsit, Dades demogràfiques...).';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="https://support.google.com/youtube/answer/1714323?hl=ca" target="_blank"> Ajuda</a>';
			$gotostats = 'Estadístiques';
		}else{ //english
			$stats_notice ='You must Login to see your Stats';
			$stats_info = 'YouTube Analytics lets you monitor the performance of your channel and videos with up-to-date metrics and reports. There\'s a ton of data available in different reports (e.g. Views, Traffic sources, Demographics).';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="https://support.google.com/youtube/answer/1714323?hl=en" target="_blank">Help</a>';
			$gotostats = 'See Stats';
		}
	}else{//Not activeQtrans
		$stats_notice ='Para poder consultar las Estadísticas debes acceder con tu nombre de Usuario y Contraseña';
		$stats_info = 'YouTube Analytics te permite monitorizar el rendimiento de tu canal y vídeos con métricas e informes actualizados. Hay una enorme cantidad de datos disponibles repartidos en diferentes informes (por ejemplo, Reproducciones, Fuentes de tráfico, Datos demográficos...).';
		$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="https://support.google.com/youtube/answer/1714323?hl=es" target="_blank"> Ayuda</a>';
		$gotostats = 'Estadísticas';
	}
	$output .= '<div class="notice"><p><i>' . $stats_notice . '</i></p></div>';
	$output .= '<p>' . $stats_info . '</p>';
	$output .= '<p><b>' . $stats_help . '</b></p>';
	$output .= '<b><a href="https://www.youtube.com/analytics" target="_blank" title="You Tube" class="alignright button ">' . $gotostats . '</a></b><br/><div class="clear"></div>';
	$output .= '</div><!-- div class="inside " -->';
	$output .= '</div><!-- div class="postbox " -->';
	$social_array[] = $output;
}
//
//
//Linked In **********************
$lin_array = get_option('social_lin');
$lin_site_link = $lin_array['url'];
$lin_wdgt = $lin_array['w_id'];
if (!empty ($lin_site_link)) {
	$output = '';
	$output .= '<div class="postbox closed" id="lin">';
	$output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div>';
	$output .= '<h3 class="hndle"> LinkedIn </h3><div class="inside">';
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$stats_notice ='Para poder consultar las Estadísticas debes acceder con tu nombre de Usuario y Contraseña';
			$stats_info = 'La pestaña de Análisis proporciona a las empresas parámetros de medición y tendencias sobre sus propias páginas de empresa. Los administradores de páginas de empresa pueden ver datos multimedia sobre sus páginas de empresa divididos en secciones específicas: Actualizaciones de empresa y Seguidores.';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="http://ayuda.linkedin.com/app/utils/auth/callback/%2Fapp%2Fanswers%2Fdetail%2Fa_id%2F26032%2F~%2Fanalytics-tab-for-company-pages" target="_blank"> Ayuda</a>';
			$gotostats = 'Estadísticas';
		}elseif( qtrans_getLanguage() == 'ca' ){ 
			$stats_notice ='Per poder consultar les Estadístiques has d\'accedir amb el teu nom d\'Usuari i Contrassenya';
			$stats_info = 'La pestanya d\'Anàlisi proporciona a les empresas paràmetres de medició i tendències sobre les seves pàgines d\'empresa. Els administradors de pàginas d\'empresa poden veure dades multimèdia sobre les seves pàgines d\'empresa dividides en seccions específiques: Actualizacions d\'empresa i Seguidors';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="http://ayuda.linkedin.com/app/utils/auth/callback/%2Fapp%2Fanswers%2Fdetail%2Fa_id%2F26032%2F~%2Fanalytics-tab-for-company-pages" target="_blank"> Ayuda</a>';
			$gotostats = 'Estadístiques';
		}else{ //english
			$stats_notice ='You must Login to see your Stats';
			$stats_info = 'The Analytics tab provides companies with metrics and trends about their Company Page. Company Page administrators can view rich data about their Company Page divided into specific sections: Updates, Followers, and Visitors.';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="http://help.linkedin.com/app/utils/auth/callback/%2Fapp%2Fanswers%2Fdetail%2Fa_id%2F26032%2F~%2Fanalytics-tab-for-company-pages" target="_blank">Help</a>';
			$gotostats = 'See Stats';
		}
	}else{//Not activeQtrans
		$stats_notice ='Para poder consultar las Estadísticas debes acceder con tu nombre de Usuario y Contraseña';
		$stats_info = 'La pestaña de Análisis proporciona a las empresas parámetros de medición y tendencias sobre sus propias páginas de empresa. Los administradores de páginas de empresa pueden ver datos multimedia sobre sus páginas de empresa divididos en secciones específicas: Actualizaciones de empresa y Seguidores.';
		$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="http://ayuda.linkedin.com/app/utils/auth/callback/%2Fapp%2Fanswers%2Fdetail%2Fa_id%2F26032%2F~%2Fanalytics-tab-for-company-pages" target="_blank"> Ayuda</a>';
	}
	$output .= '<div class="notice"><p><i>' . $stats_notice . '</i></p></div>';
	$output .= '<p>' . $stats_info . '</p>';
	$output .= '<p><b>' . $stats_help . '</b></p>';
	$output .= '<b><a href="https://www.linkedin.com/company/' . $lin_site_link . '/analytics" target="_blank" title="Linked In" class="alignright button ">' . $gotostats . '</a></b><br/><div class="clear"></div>';
	$output .= '</div><!-- div class="inside " -->';
	$output .= '</div><!-- div class="postbox " -->'; 
	$social_array[] = $output;
}
//
//
//Instagram **********************
$igram_array = get_option('social_igram');
$ig_site_link = $igram_array['url'];
if (!empty ($ig_site_link)) {
	$output = '';
	$output .= '<div class="postbox closed" id="igram">';
	$output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div>';
	$output .= '<h3 class="hndle">Instagram</h3><div class="inside">';
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$stats_notice ='Para poder consultar las Estadísticas debes acceder con tu nombre de Usuario y Contraseña';
			$stats_info = '<b>Datos estadísticos clave sobre tu cuenta de Instagram</b> <br/>Consulta el número total de Likes recibidos, las fotos más populares, el número de likes y comentarios promedio por fotografía, gráficos sobre la evolución de tu número de seguidores y estadísticas avanzadas.';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="https://iconosquare.desk.com/customer/portal/topics/267958-statistics/articles" target="_blank"> Ayuda</a>';
			$gotostats = 'Estadísticas';
		}elseif( qtrans_getLanguage() == 'ca' ){ 
			$stats_notice ='Per poder consultar les Estadístiques has d\'accedir amb el teu nom d\'Usuari i Contrassenya';
			$stats_info = '<b>Dades estadístiques clau del teu compte d\'Instagram</b> <br/>Consulta el número total de Likes rebuts, les fotos més populars, el número de likes y comentaris promig per fotografia, gràficos sobre l\'evolució del teu número de seguidors i estadístiques avançades.';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="https://iconosquare.desk.com/customer/portal/topics/267958-statistics/articles" target="_blank"> Ajuda</a>';
			$gotostats = 'Estadístiques';
		}else{ //english
			$stats_notice ='You must Login to see your Stats';
			$stats_info = '<b>Key metrics about your Instagram account</b> <br/>Get your total number of likes received, your most liked photos ever, your average number of likes and comments per photo, your follower growth charts and more advanced analytics.';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="https://iconosquare.desk.com/customer/portal/topics/267958-statistics/articles" target="_blank">Help</a>';
			$gotostats = 'See Stats';
		}
	}else{//Not activeQtrans
		$stats_notice ='Para poder consultar las Estadísticas debes acceder con tu nombre de Usuario y Contraseña';
		$stats_info = '<b>Datos estadísticos clave sobre tu cuenta de Instagram</b> <br/>Consulta el número total de Likes recibidos, las fotos más populares, el número de likes y comentarios promedio por fotografía, gráficos sobre la evolución de tu número de seguidores y estadísticas avanzadas.';
		$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="https://iconosquare.desk.com/customer/portal/topics/267958-statistics/articles" target="_blank"> Ayuda</a>';
		$gotostats = 'Estadísticas';
	}
	$output .= '<div class="notice"><p><i>' . $stats_notice . '</i></p></div>';
	$output .= '<p>' . $stats_info . '</p>';
	$output .= '<p><b>' . $stats_help . '</b></p>';
	$output .= '<b><a href="https://www.instagram.com/' . $ig_site_link . '" target="_blank" title="Instagram" class="alignright button ">' . $gotostats . '</a></b><br/><div class="clear"></div>';
	$output .= '</div><!-- div class="inside " -->';
	$output .= '</div><!-- div class="postbox " -->'; 
	$social_array[] = $output;
}
//
//
//Pinterest **********************
$pin_array = get_option('social_pinterest');
$pin_site_link = $pin_array['url'];
$pin_site_meta = $pin_array['meta'];
if (!empty ($pin_site_link) && !empty ($pin_site_meta)) {
	$output = '';
	$output .= '<div class="postbox closed" id="pin">';
	$output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div>';
	$output .= '<h3 class="hndle">Pinterest</h3><div class="inside">';
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$stats_notice ='Para poder consultar las Estadísticas debes acceder con tu nombre de Usuario y Contraseña';
			$stats_info = '<b>Analiza tu actividad</b> Averigua cuántas personas añaden Pines desde tu sitio web, ven tus Pines y hacen clic en tu contenido. Selecciona un periodo de tiempo para ver la evolución de tus datos durante un tiempo determinado.<br/><b>Conoce los gustos de los Pineadores</b> Averigua cuáles son los Pines que se comparten más, quién interactúa con ellos y qué otras cosas añaden con ellos. Utiliza esta información para adaptar tu sitio web y tableros de Pinterest.<br/><b>Consulta tus informes de análisis</b> Para obtener tus datos de análisis, primero debes verificar tu sitio web. Luego, haz clic en Análisis en el menú debajo de tu nombre.';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="http://business.pinterest.com/es/analytics" target="_blank"> Ayuda</a>';
			$gotostats = 'Estadísticas';
		}elseif( qtrans_getLanguage() == 'ca' ){ 
			$stats_notice ='Per poder consultar les Estadístiques has d\'accedir amb el teu nom d\'Usuari i Contrassenya';
			$stats_info = '<b>Analitza la teva activitat</b> Descobreix quantes persones afegeixen Pins des del teu lloc web, veuen els teus Pins fan clic al teu contingut. Selecciona un periode de temps per veure l\'evolució de les teves dades durant un temps determinat.<br/><b>Coneix els gustos dels Pinejadors</b> Descobreix quins són els Pins que més es comparteixen, qui interactua amb ells i quines coses més hi afegeixen. Utilitza aquesta informació per adaptar el teu lloc web i taulers de Pinterest.<br/><b>Consulta els teus informes d\'anàlisi</b> Per obtenir les teves dades d\'anàlisi, primer has de verificar el teu lloc web. Després, fes clic en Anàlisi al menú assota del teu nom.';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="http://business.pinterest.com/es/analytics" target="_blank"> Ajuda</a>';
			$gotostats = 'Estadístiques';
		}else{ //english
			$stats_notice ='You must Login to see your Stats';
			$stats_info = '<b>Track your activity</b>Find out how many people are Pinning from your website, seeing your Pins and clicking on your content. Pick a timeframe to see how your numbers trend over time.
	<br/><b>arn what Pinners like</b> Find out which Pins get shared the most, who interacts with them and what else people add alongside them. Use this info to tailor your website and Pinterest boards.<br/><b>See your analytics</b> To get to your analytics, first verify your website. Then click Analytics in the menu under your name.';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="http://business.pinterest.com/en/analytics" target="_blank">Help</a>';
			$gotostats = 'See Stats';
		}
	}else{//Not activeQtrans
		$stats_notice ='Para poder consultar las Estadísticas debes acceder con tu nombre de Usuario y Contraseña';
		$stats_info = '<b>Analiza tu actividad</b> Averigua cuántas personas añaden Pines desde tu sitio web, ven tus Pines y hacen clic en tu contenido. Selecciona un periodo de tiempo para ver la evolución de tus datos durante un tiempo determinado.<br/><b>Conoce los gustos de los Pineadores</b> Averigua cuáles son los Pines que se comparten más, quién interactúa con ellos y qué otras cosas añaden con ellos. Utiliza esta información para adaptar tu sitio web y tableros de Pinterest.<br/><b>Consulta tus informes de análisis</b> Para obtener tus datos de análisis, primero debes verificar tu sitio web. Luego, haz clic en Análisis en el menú debajo de tu nombre.';
		$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="http://business.pinterest.com/es/analytics" target="_blank"> Ayuda</a>';
		$gotostats = 'Estadísticas';
	}
	$output .= '<div class="notice"><p><i>' . $stats_notice . '</i></p></div>';
	$output .= '<p>' . $stats_info . '</p>';
	$output .= '<p><b>' . $stats_help . '</b></p>';
	$output .= '<b><a href="https://www.pinterest.com/' . $pin_site_link . '" target="_blank" title="Pinterest" class="alignright button ">' . $gotostats . '</a></b><br/><div class="clear"></div>';
	$output .= '</div><!-- div class="inside " -->';
	$output .= '</div><!-- div class="postbox " -->'; 
	$social_array[] = $output;
}else{// Si tenim l'URL de Twitter però no està configurat l'ID d'usuari apareix l'avís que cal configurar Twitter Analytics
	if (!empty ($pin_site_link) && empty ($pin_site_meta)) {
		$output = '';
		$output .= '<div class="postbox closed" id="pin">';
		$output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div>';
		$output .= '<h3 class="hndle">Pinterest</h3><div class="inside">';
		if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){
				$stats_notice ='Parece que no tienes verificada tu <b>Propiedad Web</b>';
				$stats_info = 'Además de la <b><a href="https://help.pinterest.com/es/articles/verify-your-website" target="_blank">Propiedad Web</a></b>, recuerda que para poder consultar tus estadísticas debes tener configurada una <b><a href="http://business.pinterest.com/es" target="_blank"> Cuenta Profesional</a></b>.';
				$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="http://help.pinterest.com/es/articles/set-your-business-account" target="_blank">  Ayuda</a>';
			}elseif( qtrans_getLanguage() == 'ca' ){ 
				$stats_notice ='Sembla que no has verificat la teva <b>Propietat Web</b>';
				$stats_info = 'A més de la <b><a href="https://help.pinterest.com/es/articles/verify-your-website" target="_blank">Propietat Web</a></b>, recorda que per poder consultar les teves estadístiques has de tenir configurat un <b><a href="http://business.pinterest.com/es" target="_blank"> Compte Professional</a></b>.';
				$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="http://help.pinterest.com/es/articles/set-your-business-account" target="_blank"> Ajuda</a>';
			}else{ //english
				$stats_notice ='Looks like you haven\'t Verified your <b>Web Property</b>';
				$stats_info = 'You must verify your <b><a href="https://help.pinterest.com/en/articles/verify-your-website" target="_blank">Web Property</a></b>, and own a <b><a href="http://business.pinterest.com/en" target="_blank"> Business Account</a></b> to see your Stats.';
				$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="http://help.pinterest.com/es/articles/set-your-business-account" target="_blank">Help</a>';
			}
		}else{//Not activeQtrans
			$stats_notice ='Parece que no tienes verificada tu <b>Propiedad Web</b>';
			$stats_info = 'Además de la <b><a href="https://help.pinterest.com/es/articles/verify-your-website" target="_blank">Propiedad Web</a></b>, recuerda que para poder consultar tus estadísticas debes tener configurada una <b><a href="http://business.pinterest.com/es" target="_blank"> Cuenta Profesional</a></b>.';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="http://help.pinterest.com/es/articles/set-your-business-account" target="_blank">  Ayuda</a>';
		}
		$output .= '<div class="notice_error"><p><i>' . $stats_notice . '</i></p></div>';
		$output .= '<p>' . $stats_info . '</p>';
		$output .= '<p><b>' . $stats_help . '</b></p>';
		$output .= '</div><!-- div class="inside " -->';
		$output .= '</div><!-- div class="postbox " -->';
		$social_array[] = $output;
	}// Final avís Falta Twitter ID
}
//
//
//Klout **********************
$klout_array = get_option('social_klout');
$kl_site_link = $klout_array['url'];
if (!empty ($kl_site_link)) {
	$output = '';
	$output .= '<div class="postbox closed" id="klout">';
	$output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div>';
	$output .= '<h3 class="hndle">Klout</h3><div class="inside">';
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$stats_notice ='Para poder consultar las Estadísticas debes acceder con tu nombre de Usuario y Contraseña';
			$stats_info = 'Klout ayuda a la gente que quiere ser importante en las Redes Sociales. Ofrece a los creadores de contenidos las herramientas necesarias para causar un impacto en las Redes. <br/>Klout ayuda a encontrar los artículos y noticias que vale la pena compartir con su audiencia. <br/>Finalmente, Klout permite medir el impacto de los creadores con la Puntuación Klout, una medida de referencia de la influencia onLine.';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="http://support.klout.com/" target="_blank"> Ayuda</a>';
			$gotostats = 'Estadísticas';
		}elseif( qtrans_getLanguage() == 'ca' ){ 
			$stats_notice ='Per poder consultar les Estadístiques has d\'accedir amb el teu nom d\'Usuari i Contrassenya';
			$stats_info = 'Las estadísticas de Página (Insights) sirven para medir el rendimiento de la página; para que estén disponibles, al menos 30 personas deben indicar que les gusta tu página. Busca datos demográficos anónimos sobre tu público y entérate de cómo los usuarios descubren y responden a tus publicaciones.';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="http://support.klout.com/" target="_blank"> Ayuda</a>';
			$gotostats = 'Estadístiques';
		}else{ //english
			$stats_notice ='You must Login to see your Stats';
			$stats_info = 'Klout ajuda a les persones que volen ser importants a les Xarxes Socials. Ofereix als creadors de continguts les eines necessàries per causar un bon impacte a les Xarxes. <br/>Klout permet trobar els articles i notícies que mereixen ser compartits amb l\'audiència. <br/>Finalment, Klout permet mesurar l\'impacte dels creadors amb la Puntuació Klout, una mesura de referència de la influència onLine.';
			$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="http://support.klout.com/" target="_blank"> Ayuda</a>';
			$gotostats = 'See Stats';
		}
	}else{//Not activeQtrans
		$stats_notice ='Para poder consultar las Estadísticas debes acceder con tu nombre de Usuario y Contraseña';
		$stats_info = 'Klout ayuda a la gente que quiere ser importante en las Redes Sociales. Ofrece a los creadores de contenidos las herramientas necesarias para causar un impacto en las Redes. <br/>Klout ayuda a encontrar los artículos y noticias que vale la pena compartir con su audiencia. <br/>Finalmente, Klout permite medir el impacto de los creadores con la Puntuación Klout, una medida de referencia de la influencia onLine.';
		$stats_help = '<div class="dashicons dashicons-editor-help"></div><a href="http://support.klout.com/" target="_blank"> Ayuda</a>';
		$gotostats = 'Estadísticas';
	}
	$output .= '<div class="notice"><p><i>' . $stats_notice . '</i></p></div>';
	$output .= '<p>' . $stats_info . '</p>';
	$output .= '<p><b>' . $stats_help . '</b></p>';
	$output .= '<b><a href="https://www.klout.com/' . $kl_site_link . '" target="_blank" title="Klout" class="alignright button ">' . $gotostats . '</a></b><br/><div class="clear"></div>';
	$output .= '</div><!-- div class="inside " -->';
	$output .= '</div><!-- div class="postbox " -->'; 
	$social_array[] = $output;
}
//
//
?>
<a name="social_stats" id="social_stats"></a>
<div id="dashboard-widgets-wrap">
    <div id="dashboard-widgets" class="metabox-holder">
        <!-- POSTBOX CONTAINER 1 **************************************** -->
        <div id='postbox-container-1' class='postbox-container'>
            <div id="normal-sortables1" class="meta-box-sortables">
                <!-- Postbox -->
                <?php // Imprimim els widgets disponibles
                print_r($social_array[0]); 
                if (!empty ($social_array[4])) {
                    print_r($social_array[4]); 
                }
                ?>
            </div><!-- div id="normal-sortables" class="meta-box-sortables-->
        </div><!-- div id='postbox-container-1' class='postbox-container' -->
        <!-- FINAL POSTBOX CONTAINER 1 **************************************** -->
        <!-- POSTBOX CONTAINER 2 **************************************** -->
        <div id='postbox-container-2' class='postbox-container'>
            <div id="normal-sortables2" class="meta-box-sortables">
                <!-- Postbox -->
                <?php // Imprimim els widgets disponibles
                if (!empty ($social_array[1])) {
                    print_r($social_array[1]); 
                }
                if (!empty ($social_array[5])) {
                    print_r($social_array[5]); 
                }
                ?>
            </div><!-- div id="normal-sortables" class="meta-box-sortables-->
        </div><!-- div id='postbox-container-1' class='postbox-container' -->
        <!-- FINAL POSTBOX CONTAINER 2 **************************************** -->
        <!-- POSTBOX CONTAINER 3 **************************************** -->
        <div id='postbox-container-3' class='postbox-container'>
            <div id="normal-sortables3" class="meta-box-sortables">
                <!-- Postbox -->
                <?php // Imprimim els widgets disponibles
                if (!empty ($social_array[2])) {
                    print_r($social_array[2]); 
                }
                if (!empty ($social_array[6])) {
                    print_r($social_array[6]); 
                }
                ?>
            </div><!-- div id="normal-sortables" class="meta-box-sortables-->
        </div><!-- div id='postbox-container-1' class='postbox-container' -->
        <!-- FINAL POSTBOX CONTAINER 3 **************************************** -->
        <!-- POSTBOX CONTAINER 4 **************************************** -->
        <div id='postbox-container-4' class='postbox-container'>
            <div id="normal-sortables4" class="meta-box-sortables">
                <!-- Postbox -->
                <?php // Imprimim els widgets disponibles
                if (!empty ($social_array[3])) {
                    print_r($social_array[3]); 
                }
                if (!empty ($social_array[7])) {
                    print_r($social_array[7]); 
                }
                ?>
            </div><!-- div id="normal-sortables" class="meta-box-sortables-->
        </div><!-- div id='postbox-container-1' class='postbox-container' -->
        <!-- FINAL POSTBOX CONTAINER 4 **************************************** -->
    </div> <!-- div id="dashboard-widgets" class="metabox-holder" -->
</div> <!-- /#div id="dashboard-widgets-wrap" -->
<script>
jQuery('body.toplevel_page_social').css('background','none');
var widget = jQuery('.inside');
jQuery( widget ).each(function( index, element ) {
	var button = jQuery( element ).find('a.button');
	jQuery( element ).hover(
	  function() {
		jQuery( button ).addClass('button-primary');
	  }, function() {
		jQuery( button ).removeClass('button-primary');
	  }
	);
});
</script>