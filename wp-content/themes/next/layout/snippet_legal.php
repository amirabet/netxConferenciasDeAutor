<?php
/**********************************************************************************************
 * <body> -> SNIPET Contenido texto legal
 * Recoge las variables desde 
 *
**********************************************************************************************
VERSION 0.1
*********************************************************************************************
TODO: 
	> Treballar amb variables des del WP Admin (Plugin WP users)

	> BOE --> http://www.boe.es/buscar/doc.php?id=BOE-A-1999-23750
	

*********************************************************************************************/
//// 
//
// VARIABLES SETEJADES DEL DEL WP ADMIN
//
//Empresa
$empresa_array = get_option('legal_empresa');
if ( isset($empresa_array['nombre']) ){ $empresa_nombre = $empresa_array['nombre'];}else{ $empresa_nombre = ''; }
if ( isset($empresa_array['nombre_legal']) ){ $empresa_nombre_legal = $empresa_array['nombre_legal'];}else{ $empresa_nombre_legal = ''; }
if ( isset($empresa_array['cif']) ){ $empresa_cif = $empresa_array['cif'];}else{ $empresa_cif = ''; }
if ( isset($empresa_array['adress']) ){ $empresa_direccion = $empresa_array['adress'];}else{ $empresa_direccion = ''; }
if ( isset($empresa_array['email']) ){ $empresa_email = $empresa_array['email'];}else{ $empresa_email = ''; }
if ( isset($empresa_array['telf']) ){ $empresa_telefono = $empresa_array['telf'];}else{ $empresa_telefono = ''; }
//
// Web
$web_array = get_option('legal_web');
if ( isset($web_array['url']) ){ $url_nombre = $web_array['url'];}else{ $url_nombre = ''; }
if ( !isset( $web_array['lopd'] ) ){$proteccion_datos = 0;}else{$proteccion_datos = $web_array['lopd'];}
//
// Hosting 
$hosting_array = get_option('legal_hosting');
if ( isset($hosting_array['hosting']) ){ $hosting = $hosting_array['hosting'];}else{ $hosting = ''; }
if ( isset($hosting_array['h_url']) ){ $hosting_url = $hosting_array['h_url'];}else{ $hosting_url = ''; }
if ( isset($hosting_array['h_adress']) ){ $hosting_dir = $hosting_array['h_adress'];}else{ $hosting_dir = ''; }
if ( isset($hosting_array['h_url_leg']) ){ $hosting_legal = $hosting_array['h_url_leg'];}else{ $hosting_legal = ''; }
// Cookies & LOPD
$analtytics_array = get_option('stats_analytics');
if (isset($analtytics_array['id'])){ $analtytics_id = $analtytics_array['id'];}
$cookies_array = get_option('legal_cookies');
if ( !isset( $cookies_array['analytics'] ) ){$legal_analytics = 0;}else{$legal_analytics = $cookies_array['analytics'];}
if ( !isset( $cookies_array['gmaps'] ) ){$legal_gmaps = 0;}else{$legal_gmaps = $cookies_array['gmaps'];}
if ( !isset( $cookies_array['gplus'] ) ){$legal_gplus = 0;}else{$legal_gplus = $cookies_array['gplus'];}
if ( !isset( $cookies_array['facebook'] ) ){$legal_facebook = 0;}else{$legal_facebook = $cookies_array['facebook'];}
if ( !isset( $cookies_array['twitter'] ) ){$legal_twitter = 0;}else{$legal_twitter = $cookies_array['twitter'];}
if ( !isset( $cookies_array['linkedin'] ) ){$legal_linkedin = 0;}else{$legal_linkedin = $cookies_array['linkedin'];}
if ( !isset( $cookies_array['pinterest'] ) ){$legal_pinterest = 0;}else{$legal_pinterest = $cookies_array['pinterest'];}
if ( !isset( $cookies_array['ytube'] ) ){$legal_youtube = 0;}else{$legal_youtube = $cookies_array['ytube'];}
if ( !isset( $cookies_array['vimeo'] ) ){$legal_vimeo = 0;}else{$legal_vimeo = $cookies_array['vimeo'];}
if ( !isset( $cookies_array['slideshare'] ) ){$legal_slideshare = 0;}else{$legal_slideshare = $cookies_array['slideshare'];}
?>
<!-- Aviso Legal -->
<section id="legal_section">
	<section>
		<h2>1.- Aceptación de los Términos de Uso</h2>
		<p>La visita o acceso a este sitio web exige la aceptación de los términos de uso que en cada momento se encuentren vigentes en esta dirección. En caso de que no esté de acuerdo con los términos y condiciones descritos a continuación, el usuario debe abstenerse de utilizar esta página web y todos sus servicios relacionados con ella. </p>
	</section>
	<section>
	<h2>2.- Acerca de <?php echo $url_nombre; ?></h2>
		<p>En cumplimiento con el deber de información recogido en <a href="http://www.boe.es/buscar/act.php?id=BOE-A-2002-13758" target="_blank">Artículo 10 de la Ley 34/2002, de 11 de julio, de Servicios de la Sociedad de la Información y del Comercio Electrónico</a> a continuación se declara <strong><?php echo $url_nombre; ?></strong>  como un sitio web gestionado por <?php echo $empresa_nombre_legal; ?> <?php if (isset($empresa_cif) && $empresa_cif != '') { echo '<em>con CIF / NIF ' . $empresa_cif .  '</em>'; }?> (en adelante, <em><?php echo $empresa_nombre; ?></em>) <?php if (isset($empresa_direccion) && $empresa_direccion != '') { echo 'con domicilio en <em>' . $empresa_direccion .  '</em> y'; } ?> con email <?php echo '<a href="mailto:' . antispambot( $empresa_email ) . '">' . antispambot( $empresa_email ) . '</a>'; ?>.</p>
	</section>
	<section>
		<h2>3.- Responsabilidad</h2>
		<p>Toda persona que acceda a este sitio web asume el papel de <strong>usuario</strong>, comprometiéndose a la observancia y cumplimiento riguroso de las disposiciones aquí dispuestas, así como a cualquier otra disposición legal que fuera de aplicación.</p>
		<p>El prestador se exime de cualquier tipo de responsabilidad derivada de la información publicada en su sitio web y por la falta de disponibilidad (caídas) del sitio el cual efectuará además paradas periódicas por mantenimientos técnicos, del mismo modo, el visitante explícitamente acepta declinar cualquier responsabilidad, por parte del prestador del servicio, derivada del acceso o uso de <strong><?php echo $url_nombre; ?></strong>. Además, el prestador se reserva el derecho a modificar cualquier tipo de información que pudiera aparecer en el sitio web, sin que exista obligación de aviso previo, o poner en conocimiento de los usuarios dichas obligaciones, entendiéndose como suficiente con la publicación en el sitio web del prestador.</p>
	</section>
	<a name="a_cookies" id="a_cookies"></a>
	<section>
		<h2>4.- Política de Cookies</h2>
		<p>El sitio web del prestador puede utilizar cookies (pequeños archivos de texto que el servidor envía al ordenador de quien accede a la página). Se trata de una técnica usada de manera habitual en Internet para llevar a cabo determinadas funciones que son consideradas imprescindibles para el correcto funcionamiento y visualización del sitio.</p>
		<h4>¿Qué es una cookie?</h4>
		<p>Una cookie es un fichero que se descarga en el ordenador/smartphone/tablet del usuario al acceder a determinadas páginas web para almacenar y recuperar información sobre la navegación que se efectúa desde dicho equipo. Para conocer más información sobre las cookies: <a href="http://es.wikipedia.org/wiki/Cookie_%28inform%C3%A1tica%29" target="_blank"> Wikipedia</a>.</p>
		<h3>4.1.- Las cookies puede ser, según su persistencia en el sistema:</h3>
		<ul>
			<li><em>Cookies de sesión</em>: Son un tipo de cookies diseñadas para recabar y almacenar datos mientras el usuario accede a una página web.</li>
			<li><em>Cookies permanentes</em>: Son un tipo de cookies en el que los datos siguen almacenados en el terminal y pueden ser accedidos y tratados durante un periodo definido por el responsable de la cookie, y que puede ir de unos minutos a varios años.</li>
		</ul>
		<h3>4.2.- Según su finalidad:</h3>
		<ul>
			<li><em>Cookies técnicas</em>: Son aquéllas que permiten al usuario la navegación a través de una página web, plataforma o aplicación y la utilización de las diferentes opciones o servicios que en ella existan como, por ejemplo, controlar el tráfico y la comunicación de datos, identificar la sesión, acceder a partes de acceso restringido, recordar los elementos que integran un pedido, realizar el proceso de compra de un pedido, realizar la solicitud de inscripción o participación en un evento, utilizar elementos de seguridad durante la navegación, almacenar contenidos para la difusión de videos o sonido o compartir contenidos a través de redes sociales.</li>
			<li><em>Cookies de personalización</em>: Son aquéllas que permiten al usuario acceder al servicio con algunas características de carácter general predefinidas en función de una serie de criterios en el terminal del usuario como por ejemplo serian el idioma, el tipo de navegador a través del cual accede al servicio, la configuración regional desde donde accede al servicio, etc.</li>
			<li><em>Cookies de análisis</em>: Son aquéllas que permiten al responsable de las mismas, el seguimiento y análisis del comportamiento de los usuarios de los sitios web a los que están vinculadas. La información recogida mediante este tipo de cookies se utiliza en la medición de la actividad de los sitios web, aplicación o plataforma y para la elaboración de perfiles de navegación de los usuarios de dichos sitios, aplicaciones y plataformas, con el fin de introducir mejoras en función del análisis de los datos de uso que hacen los usuarios del servicio. </li>
			<li><em>Cookies publicitarias</em>: Son aquéllas que permiten la gestión, de la forma más eficaz posible, de los espacios publicitarios que, en su caso, el editor haya incluido en una página web, aplicación o plataforma desde la que presta el servicio solicitado en base a criterios como el contenido editado o la frecuencia en la que se muestran los anuncios. </li>
			<li><em>Cookies de publicidad comportamental</em>: Son aquéllas que permiten la gestión, de la forma más eficaz posible, de los espacios publicitarios que, en su caso, el editor haya incluido en una página web, aplicación o plataforma desde la que presta el servicio solicitado. Estas cookies almacenan información del comportamiento de los usuarios obtenida a través de la observación continuada de sus hábitos de navegación, lo que permite desarrollar un perfil específico para mostrar publicidad en función del mismo. </li>
		</ul>
		<p><em>Las cookies utilizadas en el sitio web tienen</em>, en todo caso, <em>carácter temporal</em> con la única finalidad de hacer más eficaz su transmisión ulterior.  En ningún caso se utilizarán las cookies para recoger información de carácter personal o privado de nuestros visitantes.</p>
		<p><em><?php echo $url_nombre; ?></em> utiliza cookies de sesión para optimizar el uso de recursos del sistema y mejorar la velocidad de carga del web:</p>
		<ul>
			<li><strong>i_cookies</strong>: cookie generada por la página web, para determinar si el visitante acepta o no la política de cookies. Caduca al año, o cuando cambien el aviso legal del web. Lo que suceda antes.</li>
		</ul>
		<?php if ($legal_gmaps == 1 || $legal_youtube == 1 || $analtytics_id != '' || $legal_analytics == 1 || $legal_gplus || $legal_facebook ||$legal_twitter || $legal_vimeo){ ?>
			<h3>4.3.- Cookies de terceros:</h3>
			<?php $i = 1;
			if ($analtytics_id != '' || $legal_analytics == 1){?>
				<h4>4.3.<?php echo $i; ?> - Google Analytics:</h4>
				<p>El sitio utiliza el servicio Google Analytics, que es prestado por Google, Inc., entidad cuya oficina principal está en 1600 Amphitheatre Parkway, Mountain View (California), CA 94043, Estados Unidos. </p>
				<p>Google Analytics utiliza cookies para ayudarnos a analizar el uso que hacen los usuarios del sitio. La información que genera la cookie acerca de tu uso del sitio (incluyendo tu dirección IP) será directamente transmitida y archivada por Google en sus servidores de Estados Unidos. Google usará esta información por cuenta nuestra con el propósito de seguir la pista de tu uso del sitio, recopilando informes de la actividad del sitio y prestando otros servicios relacionados con la actividad del sitio y el uso de Internet. Google podrá transmitir dicha información a terceros cuando así se lo requiera la legislación, o cuando dichos terceros procesen la información por cuenta de Google. Google no asociará tu dirección IP con ningún otro dato del que disponga Google. </p>
				<p>Si lo deseas puedes rechazar el tratamiento de los datos o la información rechazando el uso de cookies mediante la selección de la configuración apropiada de tu navegador. Sin embargo, si lo haces, puede ser que no puedas usar la plena funcionabilidad de este sitio. Al utilizar este sitio consientes el tratamiento tu información por Google en la forma y para los fines arriba indicados. </p>
				<h6>Cookies utilizadas por  Google Analytics:</h6>
				<ul>
					<li><strong>__utma</strong>: Esta cookie tiene una duración de dos años, y es utilizada para distinguir la sesión de usuario.</li>
					<li><strong>__utmb</strong>: Esta cookie tiene una duración de 30 minutos. Se usa para determinar nuevas sesiones y/o visitas.</li>
					<li><strong>__utmc</strong>: Esta cookie permanece activa mientras perdura la sesión del navegador. Es una cookie temporal para indicar si la sesión está abierta o cerrada. Ya no suele utilizarse.</li>
					<li><strong>__utmz</strong>:  Esta cookie tiene una duración de seis meses. Esta cookie se utiliza para calcular el tráfico que proviene de motores de búsqueda (orgánico y PPC), las campañas publicitarias en display y la navegación dentro de la misma web (enlaces internos).</li>
					<li><strong>__utmv</strong>:  Esta cookie tiene una duración de dos años, y es utilizada para almacenar datos obtenidos de registros, para posteriormente poder segmentarlos demográficamente.</li>
					<li><strong>_ga</strong>:  Esta cookie tiene una duración de dos años, y es utilizada para distinguir usuarios.</li>
				</ul>
			<?php $i++;
			} //end if G Analytics cookies
			if ($legal_gmaps == 1){ ?>
				<h4>4.3.<?php echo $i; ?> - Google Maps:</h4>
				<p>Google maps permite la inserción de mapas en las webs de terceros, como la presente. Las cookies utilizadas por google maps son: <strong>SID</strong>, <strong>SAPISID</strong>, <strong>APISID</strong>, <strong>SSID</strong>, <strong>HSID</strong>, <strong>NID</strong>, <strong>PREF</strong>.</p>
				<p>Sirven para establecer varios identificadores únicos, salvo la cookie <strong>PREF</strong>, que es utilizada para mostrar las preferencias del zoom de los mapas.</p>
				<p>La cookie <strong>PREF</strong> tienen una duración de un año. Las cookies <strong>SAPISID</strong>, <strong>APISID</strong>, <strong>SSID</strong>, <strong>HSID</strong>, <strong>SID</strong>, tienen una duración de dos años. El resto son cookies de sesión, o que tienen una permanencia corta.</p>
				<p>Si desea obtener más información, visite el siguiente enlace: <a href="http://www.google.es/policies/privacy/" target="_blank">Política de Privacidad de Google</a>.</p>
				<p>Para más información sobre las cookies que utiliza google maps, puede visitar el siguiente enlace: <a href="http://www.google.com/policies/technologies/types/" target="_blank">Tecnologías de Google</a>.</p>
			<?php  $i++;
			} //end if $legal_gmaps
			if ($legal_gplus == 1 || $legal_facebook == 1 || $legal_twitter == 1 || $legal_linkedin == 1 ||$legal_pinterest || $legal_slideshare){ ?>
				<h4>4.3.<?php echo $i; ?> - Redes Sociales:</h4>
				<p>Las redes sociales tales como Facebook, Twitter, Google Plus, etc… nos proveen botones a través de los cuales podemos publicar contenidos directamente en ellas. Dichos botones también hacen uso de cookies para su funcionamiento.</p>
				<?php if ($legal_gplus == 1){ ?>
					<h6>Google Plus</h6>
					<p>Google se sirve de varias cookies para sus diferentes aplicaciones entre las que podemos observar "PREF", "NID", "GAPS", "LSID", "BEAT" o "ULS".</p>
					<p>Para más información sobre las cookies que utiliza Google Plus, puede visitar los siguientes enlaces: </p>
					<ul>
						<li><a href="http://www.google.com/policies/technologies/types/" target="_blank">Tecnologías de Google</a>.</li>
						<li><a href="http://www.google.es/intl/es-419/policies/technologies/types/" target="_blank">Tipos de cookies que Google usa</a>.</li>
					</ul>
				<?php } ?>
				<?php if ($legal_facebook == 1){ ?>
					<h6>Facebook</h6>
					<p>Facebook utiliza varias cookies como "locale", "reg_fb_gate" y "reg_fb_ref".</p>
					<p>Para más información sobre las cookies que utiliza Facebook, puede visitar los siguientes enlaces: </p>
					<ul>
						<li><a href="https://www.facebook.com/about/privacy/cookies" target="_blank">Política de Datos de Facebook</a>.</li>
						<li><a href="https://www.facebook.com/help/cookies/update" target="_blank">Cookies, píxeles y otras tecnologías similares</a>.</li>
					</ul>
				<?php } ?>
				<?php if ($legal_twitter == 1){ ?>
					<h6>Twitter</h6>
					<p>Twitter utiliza varias cookies como "guest_id", "_twitter_sess", "k" y "original_referer".</p>
					<p>Para más información sobre las cookies que utiliza Twitter, puede visitar los siguientes enlaces: </p>
					<ul>
						<li><a href="https://twitter.com/privacy?lang=es" target="_blank">Política de Privacidad de Twitter</a>.</li>
						<li><a href="https://support.twitter.com/articles/20170521-el-uso-que-hace-twitter-de-cookies-y-tecnologias-similares" target="_blank">El uso que hace Twitter de cookies y tecnologías similares</a>.</li>
					</ul>
				<?php } ?>
				<?php if ($legal_linkedin == 1){ ?>
					<h6>LinkedIn</h6>
					<p>Para más información sobre las cookies que utiliza LinkedIn, puede visitar los siguientes enlaces: </p>
					<ul>
						<li><a href="https://www.linkedin.com/legal/privacy-policy" target="_blank">Política de Privacidad de LinkedIn</a>.</li>
						<li><a href="https://www.linkedin.com/legal/cookie-policy" target="_blank">Política de cookies de LinkedIn</a>.</li>
					</ul>
				<?php } ?>
				<?php if ($legal_pinterest == 1){ ?>
					<h6>Pinterest</h6>
					<p>Pinterest utiliza una cookie llamada "_pinterest_cm".</p>
					<p>Para más información sobre las cookies que utiliza Pinterest, puede visitar los siguientes enlaces: </p>
					<ul>
						<li><a href="https://about.pinterest.com/es/privacy-policy" target="_blank">Política de Privacidad de Pinterest</a>.</li>
					</ul>
				<?php } ?>
			<?php  $i++;
			} //end if $legal social
			if ($legal_youtube == 1){ ?>                
				<h4>4.3.<?php echo $i; ?> - YouTube:</h4>
				<p>Youtube almacena información para poder generar estadísticas sobre las visitas de videos incrustados en otras páginas.</p>
				<p>Las siguientes cookies son generadas a través de Youtube:</p>
				<p>La cookie <strong>YSC</strong> contiene un identificador único para permitir el control de visitas a videos de Youtube y expira al finalizar la sesión (cierre de la pestaña o del navegador).</p>
				<p>La cookie <strong>VISITOR_INFO1_LIVE</strong> contiene un identificador único para permitir el control de visitas a videos de Youtube y expira a los 9 meses.</p>
				<p>La cookie <strong>PREF</strong> contiene datos sobre preferencias de visualización y expira a los 2 años.</p>
				<p>Si desea obtener más información, visite el siguiente enlace: <a href="http://www.google.es/policies/privacy/" target="_blank">Política de Privacidad de Google</a>.</p>
			<?php  $i++;
			} //end if $legal_youtube	
			if ($legal_vimeo == 1){ ?>                
				<h4>4.3.<?php echo $i; ?> - Vimeo:</h4>
				<p>Vimeo es una red social basada en videos que permite compartir y almacenar videos digitales para que los usuarios comenten en la página de cada uno de ellos.</p>
				<p>Vimeo se sirve de una serie de cookies tanto para su funcionamiento como para el análisis de su utilización con google analytics (<strong>"__utma", "__utmb", "__utmc", "__utmz"</strong>).</p>
				<p>Entre las cookies propias de Vimeo podemos observar <strong>"aka_debug"</strong>, <strong>"a"</strong> y <strong>"pl_volume"</strong>.</p>
				<p>En la <a href="https://vimeo.com/cookie_policy" target="_blank">Página de cookies de Vimeo</a> podemos observar la finalidad de cada una de ellas.</p>
			<?php  $i++;
			} //end if $legal_vimeo	
			if ($legal_slideshare == 1){ ?>                
				<h4>4.3.<?php echo $i; ?> - Slideshare:</h4>
				<p>Para más información sobre las cookies que utiliza Slideshare, puede visitar los siguientes enlaces: </p>
				<ul>
					<li><a href="https://www.linkedin.com/legal/privacy-policy" target="_blank">Política de Privacidad de LinkedIn</a>.</li>
					<li><a href="https://www.linkedin.com/legal/cookie-policy" target="_blank">Política de cookies de LinkedIn</a>.</li>
				</ul>
			<?php  $i++;
			} //end if $legal_vimeo	
		} // end if cookies terceros ?>
		<h3>4.4.- Desactivación de cookies.</h3>
		<h4>El usuario podrá en cualquier momento elegir qué cookies quiere que funcionen en este sitio web mediante:</h4>
		<h6>a) La configuración del navegador:</h6>
		<ul>
			<li><em>Navegador Chrome</em>: <a href="https://support.google.com/accounts/answer/61416?hl=es" target="_blank" class="wordwrap">https://support.google.com/accounts/answer/61416?hl=es</a></li>
			<li><em>Navegador Internet Explorer</em>: <a href="http://windows.microsoft.com/es-es/windows-vista/block-or-allow-cookies" target="_blank" class="wordwrap">http://windows.microsoft.com/es-es/windows-vista/block-or-allow-cookies</a></li>
			<li><em>Navegador Firefox</em>: <a href="https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-que-los-sitios-we" target="_blank" class="wordwrap">https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-que-los-sitios-we</a></li>
			<li><em>Navegador Safari</em>: <a href="http://support.apple.com/kb/HT1677?viewlocale=es_ES" target="_blank" class="wordwrap">http://support.apple.com/kb/HT1677?viewlocale=es_ES</a></li>
			<li><em>Navegador Opera</em>: <a href="http://help.opera.com/Windows/11.50/es-ES/cookies.html" target="_blank" class="wordwrap">http://help.opera.com/Windows/11.50/es-ES/cookies.html</a></li>
		</ul>
		<h6>b) Herramientas de terceros:</h6>
		<p>Otras herramientas de terceros, disponibles on line, que permiten a los usuarios detectar las cookies en cada sitio web que visita y gestionar su desactivación, por ejemplo, Ghostery.</p>
		<ul>
			<li><a href="http://www.ghostery.com" target="_blank">http://www.ghostery.com</a></li>
		</ul>
		<p><em>NOTA IMPORTANTE: </em> En caso de bloquear el uso de cookies en su navegador es posible que algunos servicios o funcionalidades de la página Web no estén disponibles.</p>
	</section>
	<a name="a_beacon" id="a_beacon"></a>
	<section>
		<h2>5.- Web beacons</h2>
		<p>Este sitio puede albergar también web beacons (también conocidos por web bugs).</p>
		<h4>¿Qué es un web beacon?</h4>
		<p>Los web beacons suelen ser pequeñas imágenes de un pixel por un pixel, visibles o invisibles colocados dentro del código fuente de las páginas web de un sitio. Los Web beacons sirven y se utilizan de una forma similar a las cookies. Además, los web beacons suelen utilizarse para medir el tráfico de usuarios que visitan una página web y poder sacar un patrón de los usuarios de un sitio. Dispone de más información sobre los web beacons en <a href="http://es.wikipedia.org/wiki/Web_bug" target="_blank"> Wikipedia</a>.</p>
	<a name="a_datos" id="a_datos"></a>
	<section>
		<h2>6.- Protección de datos personales</h2>
<?php if ($proteccion_datos == 1){?>
	<p>De conformidad con lo establecido en el <a href="http://www.boe.es/buscar/doc.php?id=BOE-A-1999-23750" target="_blank" title="Ley Orgánica 15/1999">Art. 5 de la Ley Orgánica 15/1999 de diciembre de Protección de Datos de Carácter Personal</a>, por el que se regula el derecho de información en la recogida de datos le informamos de los siguientes extremos:</p>
	<ul>
		<li>Los datos de carácter personal que nos ha suministrado en esta y otras comunicaciones mantenidas con usted serán objeto de tratamiento en los ficheros responsabilidad de <strong><?php echo $empresa_nombre_legal; ?></strong>.</li>
		<li>La finalidad del tratamiento de datos es la de gestionar de forma adecuada la comunicación y la prestación de servicios. Asimismo estos datos no serán cedidos a terceros, salvo las cesiones legalmente permitidas.</li>
		<li>Los datos solicitados a través de esta y otras comunicaciones son de suministro necesario para la comunicación y prestación de servicios. Estos son adecuados, pertinentes y no excesivos.</li>
		<li>Asimismo, le informamos de la posibilidad de ejercitar los correspondiente derechos de acceso, rectificación, cancelación y oposición de conformidad con lo establecido en la Ley 15/1999 ante <em><?php echo $empresa_nombre_legal; ?></em> como responsables del fichero.</li>
	</ul>
	<p><em>Los derechos mencionados los puede ejercitar a través de los siguientes medios:</em></p>
	<ul>
		<li>Mediante email <?php echo '<a href="mailto:' . antispambot( $empresa_email ) . '">' . antispambot( $empresa_email ) . '</a>'; ?></li>
		<?php if ($empresa_telefono != ''){ echo '<li><strong>Por teléfono: </strong> ' . $empresa_telefono . '</li>'; }?>
		<?php if ($empresa_direccion != ''){ echo '<li><strong>' . $empresa_nombre_legal . '</strong>: ' . $empresa_direccion . '</li>'; }?>
	</ul>
<?php  }else{?>
	<p>El prestador no almacena datos de carácter personal de los clientes.</p>
<?php  } //end if Proteccion Datos ?>
	</section>
	<section>
		<h2>7.- Política anti-spam</h2>
		<p>El prestador se declara completamente en contra del envío de comunicaciones comerciales no solicitadas y a cualquier tipo de conducta o manifestación conocida como <em>spam</em>, asimismo se declara comprometido con la lucha contra este tipo de prácticas abusivas.</p>
		<p>Por tanto, el prestador garantiza al usuario a que bajo ningún concepto los datos personales recogidos en el sitio web (en el caso de ser recogidos) serán cedidos, compartidos, transferidos, ni vendidos a ningún tercero.</p>
		<p>El usuario puede ponerse en contacto con nosotros a través del formulario de contacto o en su defecto, por el email proporcionado en las presentes condiciones legales, tanto para comunicarse con nosotros como para informar de cualquier irregularidad.</p>
	</section>
	<section>
		<h2>8.- Alojamiento de datos</h2>
		<p>Por razones técnicas y de calidad de servicio, el sitio web  <strong><?php echo $url_nombre; ?></strong> se encuentra alojado en los servidores de la empresa <strong><?php echo $hosting; ?></strong>. La empresa tiene su domicilio social en <i><?php echo $hosting_dir; ?></i>.</p>
		<h4>Más información:</h4>
		<ul>
			<li><a href="<?php echo $hosting_url; ?>" target="_blank"><?php echo $hosting_url; ?></a></li>
			<li><a href="<?php echo $hosting_legal; ?>" target="_blank"><?php echo $hosting_legal; ?></a></li>
		</ul>
	</section>
	<section>
		<h2>9.- Propiedad Intelectual y uso de los contenidos</h2>
		<p>El sitio web <strong><?php echo $url_nombre; ?></strong>, incluyendo a título enunciativo pero no limitativo su programación, edición, compilación y demás elementos necesarios para su funcionamiento, los diseños, logotipos, texto y/o gráficos son propiedad del prestador o en su caso dispone de licencia o autorización expresa por parte de los autores.
		<p>Cualquier uso no autorizado previamente por parte del prestador será considerado un incumplimiento grave de los derechos de propiedad intelectual o industrial del autor.</p>
		<p>Los diseños, logotipos, texto y/o gráficos ajenos al prestador y que pudieran aparecer en el sitio web, pertenecen a sus respectivos propietarios, siendo ellos mismos responsables de cualquier posible controversia que pudiera suscitarse respecto a los mismos. En todo caso, el prestador cuenta con la autorización expresa y previa por parte de los mismos.</p>
		<p>Para realizar cualquier tipo de observación respecto a posibles incumplimientos de los derechos de propiedad intelectual o industrial, así como sobre cualquiera de los contenidos del sitio web, puede hacerlo a través del formulario de contacto que se mantiene en el sitio web.</p>
	</section>
	<section>
		<h2>10.- Ley Aplicable y Jurisdicción</h2>
		<p>Para la resolución de todas las controversias o cuestiones relacionadas con el presente sitio web o de las actividades en él desarrolladas, será de aplicación la <em>Legislación Española</em>, a la que se someten expresamente las partes.</p>
	</section>
<div class="clearboth"></div>
</section>
<?php ?>