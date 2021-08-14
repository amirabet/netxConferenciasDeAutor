<?php
/**********************************************************************************************
 * Formulario de Contacto con comprobación de campos
 * Utilizar conjuntamente con validate.js
 * Esta version utiliza la libreria PhpMailer() -> https://github.com/PHPMailer/PHPMailer
**********************************************************************************************
VERSION 0.3
*********************************************************************************************
TO DO:
> Testejar si es poden buidar amb if (!isset($success_end) && !isset($error2)){ --> $success_end seteja una variable despres d'enviar el 2on missatge
> Preparar missatge de retorn de dades introduides per l'usuari
> Configurar GOALS a Google Analytics -> onSubmit="_gaq.push(['_trackEvent', 'FormularioContratacion', 'Enviar'])"
> Obrir Condiciones Legales amb un Modal Box (o Ajax) per evitar que l'usuari perdi les dades
*********************************************************************************************/
//
// Claus *****************************
include ("form_keys.php"); // Archivo de Variables
//
//Noms dels Camps
if (function_exists('qtrans_getLanguage')){
	if( qtrans_getLanguage() == 'es' ){ 
		//Header del Form
		$contr_h1 = 'Rellene el formulario para solicitar una conferencia o consultarnos cualquier duda';
		$contr_p = 'Los campos marcados con asterisco (*) son obligatorios.';
		$formsubmit_h1 = '<i class="fa fa-check-circle"></i> Mensaje enviado correctamente.';
		$formsubmit_p = 'Le responderemos en un plazo no superior a 72 horas.';
		$formsubmiterror_h1 = '<i class="fa fa-times-circle"></i> ERROR en el envío del mensaje.';
		$formsubmiterror_p = 'Estamos sufriendo problemas técnicos con la recepción de su mensaje.';
		//Datos Personales
		$personal_h = 'Persona de Contacto';
		$personal_p = 'Háganos llegar sus datos para poder responderle.';
		$personal_empresa = 'Datos de su empresa';
		$nombre = '* Nombre y Apellidos';
		$nombre_plhd = 'Obligatorio';
		$email = '* Correo Electrónico';
		$email_plhd = 'Obligatorio';
		$telefono = '* Teléfono';
		$telefono_plhd = 'Obligatorio';
		$empresa = 'Empresa';
		$empresa_plhd = 'Nombre de la Compañía';
		$poblacion = 'Ciudad';
		$poblacion_plhd = 'Sede de su compañía';
		$provincia = 'País';
		$provincia_plhd = 'País de su compañía';
		//Tematica
		$tematica_h = '¿Interesado en una temática concreta?';
		$tematica_p = 'Puede elegir la categoría en la que su compañía está interesada.';
		$tematica_p_info = 'Marque la casilla correspondiente. Puede elegir varias categorías a la vez.';
		//Autor
		$autor_h = '¿Interesado en algún/a Autor/a en particular?';
		$autor_p = 'Si lo desea puede escoger uno o varios conferenciantes que le interesen.';
		$autor_p_info = 'Marque la casilla correspondiente. Puede elegir varios autores a la vez.';
		$autor_bttn = 'Ver listado de Autores';
		//Servicios Auxiliares
		$servicios_h = 'Servicios complementarios a la conferencia';
		$servicios_p = 'Puede completar el evento de su conferencia con estos servicios auxiliares.';
		$servicios_libros = '<em>Ediciones especiales de los libros de nuestros conferenciantes</em> para instituciones y empresas.';
		$servicios_libros_val = 'Ediciones especiales de libros';
		$servicios_team = '<em>Experiencias de Team-Building</em> para la cohesión de equipos de la mano de los mejores expertos.';
		$servicios_team_val = 'Experiencias de Team-Building';
		$servicios_none = 'Ningún servicio seleccionado.';
		//Programacion
		$programacion_h = '¿Cuándo le gustaría celebrar la conferencia?';
		$programacion_p = 'Indíquenos de forma orientativa la fecha y la hora que prefiera.';
		$programacion_horario = 'Horario preferido:';
		$programacion_horario_name = 'fhorario';
		$programacion_horario_ind = 'Indiferente';
		$programacion_horario_man = 'Mañana';
		$programacion_horario_tar = 'Tarde';
		$programacion_horario_ind_slug = 'indiferente';
		$programacion_horario_man_slug = 'manana';
		$programacion_horario_tar_slug = 'tarde';
		$programacion_fecha = 'Indique una fecha: ';
		$programacion_fecha_opt = 'Fecha optativa: ';
		$programacion_fecha_format = 'dd/mm/AA';
		$programacion_fecha_none = 'Fecha no especificada.';
		//Comentarios
		$comentarios = '¿Desea comentarnos algo más?';
		$comentarios_placeholder = 'Si quiere hacernos llegar otra duda o cuestión utilice este espacio.';	
		$comentarios_none = 'Sin Comentarios.';
		//Altres
		$emptyfield = 'No especificado.';
		$honeypot = '¡NO rellenes este campo!';
		$enviar = 'ENVIAR';
		$enviar_aviso = 'Mediante el envío de este formulario acepta las ';
		$enviar_aviso_cond = 'Condiciones Legales';
		$qlang = 'es/';
	}elseif( qtrans_getLanguage() == 'ca' ){
		//Header del Form
		$contr_h1 = 'Ompli el formulari per a sol·licitar una conferència o consultar-nos qualsevol dubte';
		$contr_p = 'Els camps marcats amb asterisc (*) són obligatoris.';
		$formsubmit_h1 = 'El seu formulari s\'ha enviat amb èxit';
		$formsubmit_p = 'Li respondrem en un plaç no superior a 72 hores.';
		$formsubmiterror_h1 = '<i class="fa fa-times-circle"></i> ERROR en l\'enviament del seu missatge.';
		$formsubmiterror_p = 'Estem tenint problemes tècnics amb la recepció del seu missatge.';
		//Datos Personales
		$personal_h = 'Persona de Contacte';
		$personal_p = 'Faci\'ns arribar les seves dades per a poder respondre\'l.';
		$personal_empresa = 'Dades de la seva empresa';
		$nombre = '* Nom i Cognoms';
		$nombre_plhd = 'Obligatori';
		$email = '* Correu Electrònic';
		$email_plhd = 'Obligatori';
		$telefono = '* Telèfon';
		$telefono_plhd = 'Obligatori';
		$empresa = 'Empresa';
		$empresa_plhd = 'Nome de la Companyia';
		$poblacion = 'Ciutat';
		$poblacion_plhd = 'Seu de la companyia';
		$provincia = 'País';
		$provincia_plhd = 'País de la companyia';
		//Tematica
		$tematica_h = '¿Interessat en una temàtica concreta?';
		$tematica_p = 'Pot triar la categoria en la que la seva empresa está interessada.';
		$tematica_p_info = 'Marqui la casella corresponent. Pot triar diverses categories alhora.';
		//Autor
		$autor_h = '¿Interesat en algun/a Autor/a en concret?';
		$autor_p = 'Si ho desitja pot triar entre un o diversos conferenciants que li interessin.';
		$autor_p_info = 'Marqui la casella corresponent. Pot triar diversos autors alhora.';
		$autor_bttn = 'Veure listat d\'Autors';
		//Servicios Auxiliares
		$servicios_h = 'Serveis complementaris a la conferència';
		$servicios_p = 'Pot completar l\'event de la seva conferència amb aquests serveis auxiliars.';
		$servicios_libros = '<em>Edicions especials dels libres dels nostres conferenciants</em> per a institucions i empreses.';
		$servicios_libros_val = 'Edicions especials dels libres';
		$servicios_team = '<em>Experiències de Team-Building</em> per la cohesió d\'equips de la mà dels millors experts.';
		$servicios_team_val = 'Experiències de Team-Building';
		$servicios_none = 'Cap servei seleccionat';
		//Programacion
		$programacion_h = '¿Quan li agradaria celebrar la conferència?';
		$programacion_p = 'Indiqui\'ns orientativament la data i l\'hora que prefereixi.';
		$programacion_horario = 'Horari preferit:';
		$programacion_horario_name = 'fhorari';
		$programacion_horario_ind = 'Indiferent';
		$programacion_horario_man = 'Matins';
		$programacion_horario_tar = 'Tardes';
		$programacion_horario_ind_slug = 'indiferent';
		$programacion_horario_man_slug = 'mati';
		$programacion_horario_tar_slug = 'tarda';
		$programacion_fecha = 'Indiqui una data: ';
		$programacion_fecha_opt = 'Data optativa: ';
		$programacion_fecha_format = 'dd/mm/AA';
		$programacion_fecha_none = 'Data no especificada.';
		//Comentarios
		$comentarios = '¿Desitja comentar-nos quelcom més?';
		$comentarios_placeholder = 'Si vol fer-nos arribar algún dubte o qüestió utilitzi aquest espai.';	
		$comentarios_none = 'Sense Comentaris.';
		//Altres
		$emptyfield = 'No especificat.';
		$honeypot = 'NO omplis aquest camp!';
		$enviar = 'ENVIAR';
		$enviar_aviso = 'Amb l\'enviament d\'aquest formulari accepta les ';
		$enviar_aviso_cond = 'Condicions Legals';
		$qlang = 'ca/';
	}else{ //English
		//Header del Form
		$contr_h1 = 'Complete this form to appoint a conference or sand your doubts';
		$contr_p = '* Mandatory fields';
		$formsubmit_h1 = 'Your form has been submited';
		$formsubmit_p = 'We\'ll answer you before 72 hours.';
		$formsubmiterror_h1 = '<i class="fa fa-times-circle"></i>ERROR on form submission.';
		$formsubmiterror_p = 'We\'re suffering technical issues with your form\'s submission.';
		//Datos Personales
		$personal_h = 'Persona de Contacte';
		$personal_p = 'Necessitem saber qui és i com podem respondre\'l.';
		$personal_empresa = 'Datos de su empresa';
		$nombre = '* Nom i Cognoms';
		$nombre_plhd = 'Obligatori';
		$email = '* Correu Electrònic';
		$email_plhd = 'Obligatori';
		$telefono = '* Telèfon';
		$telefono_plhd = 'Obligatori';
		$empresa = 'Empresa';
		$empresa_plhd = 'Nome de la Companyia';
		$poblacion = 'Ciutat';
		$poblacion_plhd = 'Seu de la companyia';
		$provincia = 'País';
		$provincia_plhd = 'País de la companyia';
		//Tematica
		$tematica_h = '¿Interessat en una temàtica concreta?';
		$tematica_p = 'Pot triar la categoria en la que la seva empresa está interessada.';
		$tematica_p_info = 'Marqui la casella corresponent. Pot triar diverses categories alhora.';
		//Autor
		$autor_h = '¿Interesat en algun/a Autor/a en concret?';
		$autor_p = 'Si ho desitja pot triar entre un o diversos conferenciants que li interessin.';
		$autor_p_info = 'Marque la casilla correspondiente. Puede elegir varios autores a la vez.';
		$autor_bttn = 'Veure listat d\'Autors';
		//Servicios Auxiliares
		$servicios_h = 'Serveis complementaris a la conferència';
		$servicios_p = 'Pot completar l\'event de la seva conferència amb aquests serveis auxiliars.';
		$servicios_libros = '<em>Edicions especials dels libres dels nostres conferenciants</em> per a institucions i empreses.';
		$servicios_libros_val = 'Edicions especials dels libres';
		$servicios_team = '<em>Experiències de Team-Building</em> per la cohesió d\'equips de la mà dels millors experts.';
		$servicios_team_val = 'Experiències de Team-Building';
		$servicios_none = 'Cap servei seleccionat';
		//Programacion
		$programacion_h = '¿Quan li agradaria celebrar la conferència?';
		$programacion_p = 'Indiqui\'ns orientativament la data i l\'hora que prefereixi.';
		$programacion_horario = 'Horari preferit:';
		$programacion_horario_name = 'fhorari';
		$programacion_horario_ind = 'Indiferent';
		$programacion_horario_man = 'Matins';
		$programacion_horario_tar = 'Tardes';
		$programacion_horario_ind_slug = 'indiferente';
		$programacion_horario_man_slug = 'manana';
		$programacion_horario_tar_slug = 'tarde';
		$programacion_fecha = 'Indiqui una data: ';
		$programacion_fecha_opt = 'Data optativa: ';
		$programacion_fecha_format = 'YY/mm/dd';
		$programacion_fecha_none = 'Fecha no especificada.';
		//Comentarios
		$comentarios = '¿Desitja comentar-nos quelcom més?';
		$comentarios_placeholder = 'Si vol fer-nos arribar algún dubte o qüestió utilitzi aquest espai.';	
		$comentarios_none = 'Sense Comentaris.';
		//Altres
		$emptyfield = 'No especificat.';
		$honeypot = 'NO omplis aquest camp!';
		$enviar = 'ENVIAR';
		$enviar_aviso = 'Amb l\'enviament d\'aquest formulari accepta les ';
		$enviar_aviso_cond = 'Condicions Legals';
		$qlang = 'en/';
	}
}else{ //No qTranslate
	//Header del Form
	$contr_h1 = 'Rellene el formulario para solicitar una conferencia o consultarnos cualquier duda';
	$contr_p = 'Los campos marcados con asterisco (*) son obligatorios.';
	$formsubmit_h1 = '<i class="fa fa-check-circle"></i> Mensaje enviado correctamente.';
	$formsubmit_p = 'Le responderemos en un plazo no superior a 72 horas.';
	$formsubmiterror_h1 = '<i class="fa fa-times-circle"></i> ERROR en el envío del mensaje.';
	$formsubmiterror_p = 'Estamos sufriendo problemas técnicos con la recepción de su mensaje.';
	//Datos Personales
	$personal_h = 'Persona de Contacto';
	$personal_p = 'Háganos llegar sus datos para poder responderle.';
	$personal_empresa = 'Datos de su empresa';
	$nombre = '* Nombre y Apellidos';
	$nombre_plhd = 'Obligatorio';
	$email = '* Correo Electrónico';
	$email_plhd = 'Obligatorio';
	$telefono = '* Teléfono';
	$telefono_plhd = 'Obligatorio';
	$empresa = 'Empresa';
	$empresa_plhd = 'Nombre de la Compañía';
	$poblacion = 'Ciudad';
	$poblacion_plhd = 'Sede de su compañía';
	$provincia = 'País';
	$provincia_plhd = 'País de su compañía';
	//Tematica
	$tematica_h = '¿Interesado en una temática concreta?';
	$tematica_p = 'Puede elegir la categoría en la que su compañía está interesada.';
	$tematica_p_info = 'Marque la casilla correspondiente. Puede elegir varias categorías a la vez.';
	//Autor
	$autor_h = '¿Interesado en algún autor/a en particular?';
	$autor_p = 'Si lo desea puede escoger uno o varios conferenciantes que le interesen.';
	$autor_p_info = 'Marque la casilla correspondiente. Puede elegir varios autores a la vez.';
	$autor_bttn = 'Ver listado de Autores';
	//Servicios Auxiliares
	$servicios_h = 'Servicios complementarios a la conferencia';
	$servicios_p = 'Puede completar el evento de su conferencia con estos servicios auxiliares.';
	$servicios_libros = '<em>Ediciones especiales de los libros de nuestros conferenciantes</em> para instituciones y empresas.';
	$servicios_libros_val = 'Ediciones especiales de libros';
	$servicios_team = '<em>Experiencias de Team-Building</em> para la cohesión de equipos de la mano de los mejores expertos.';
	$servicios_team_val = 'Experiencias de Team-Building';
	$servicios_none = 'Ningún servicio seleccionado';
	//Programacion
	$programacion_h = '¿Cuándo le gustaría celebrar la conferencia?';
	$programacion_p = 'Indíquenos de forma orientativa la fecha y la hora que prefiera.';
	$programacion_horario = 'Horario Preferido:';
	$programacion_horario_name = 'fhorario';
	$programacion_horario_ind = 'Indiferente';
	$programacion_horario_man = 'Mañana';
	$programacion_horario_tar = 'Tarde';
	$programacion_horario_ind_slug = 'indiferente';
		$programacion_horario_man_slug = 'manana';
		$programacion_horario_tar_slug = 'tarde';
	$programacion_fecha = 'Indique una fecha: ';
	$programacion_fecha_opt = 'Fecha optativa: ';
	$programacion_fecha_format = 'dd/mm/AA';
	$programacion_fecha_none = 'Fecha no especificada.';
	//Comentarios
	$comentarios = '¿Desea comentarnos algo más?';
	$comentarios_placeholder = 'Si quiere hacernos llegar otra duda o cuestión utilice este espacio.';
	$comentarios_none = 'Sin Comentarios.';	
	//Altres
	$emptyfield = 'No especificado.';
	$honeypot = '¡NO rellenes este campo!';
	$enviar = 'ENVIAR';
	$enviar_aviso = 'Mediante el envío de este formulario acepta las ';
	$enviar_aviso_cond = 'Condiciones Legales';
	$qlang = '';
}
// Variables de validacio
$valid_name = '0';
$valid_email = '0';
$valid_telf = '0';
$valid_fecha = '0';
$valid_fecha_opt = '0';
?> 
<!-- Form PHP **********************************************************************-->
<?php
	if($_POST){
		// Variables -> Empresa & Missatge ***************************
		if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){ 
				$company_name = utf8_decode('NEXT Conferencias de Autor');
				$company_undr = '--------------------------';
				$subject = utf8_decode('Propuesta para Conferencia');
				$subject_date = ' con Fecha: ';
				//Propuesta para Conferencia con Fecha: 20/09/2014 11:00
				//------------------------------------------------------
				//******************************************************
				$msg_borders ='******************************************************';
				$subject_undr = '------------------------------------------------------';
				$subject_copy = 'Copia de su mensaje enviado desde www.nextconferencias.com';
				$message_thanks = 'Gracias por su atención. Recibirá nuestra respuesta con brevedad.';
				$message_noreply = 'NOTA IMPORTANTE: No responda a este mensaje. Si quiere consultarnos otra cuestión escríbanos a la dirección: ' . $company_mail;
			}elseif( qtrans_getLanguage() == 'ca' ){
				$company_name = utf8_decode('NEXT Conferències d\'Autor');
				$company_undr = '-------------------------';
				$subject = utf8_decode('Proposta per a Conferència');
				$subject_date = ' amb Data: ';
				//Proposta per a Conferència amb Data: 20/09/2014 11:00
				//-----------------------------------------------------
				//*****************************************************
				$msg_borders ='*****************************************************';
				$subject_undr = '-----------------------------------------------------';
				$subject_copy = 'Còpia del seu missatge enviat desde www.nextconferencias.com';
				$message_thanks = 'Gràcies per la seva atenció. Rebrá resposta amb brevetat.';
			}else{ //English
				$company_name = 'NEXT Conferencias de Autor';
				$company_undr = '--------------------------';
				$subject = 'Speech Petition';
				$subject_date = ' on Date: ';
				//Speech Petition on Date: 20/09/2014 11:00
				//-----------------------------------------
				//*****************************************
				$msg_borders ='*****************************************';
				$subject_undr = '-----------------------------------------';
				$subject_copy = 'Invoice copy sent from www.nextconferencias.com';
				$message_thanks = 'Thanks for your interest. We\'ll contact you soon.';
				$message_noreply = 'IMPORTANT ADVICE: Don\'t reply to this email. If you have futher questions write us to the adress: ' . $company_mail;
			}
		}else{//Not activeQtrans
			$company_name = utf8_decode('NEXT Conferencias de Autor');
			$company_undr = '--------------------------';
			$subject = utf8_decode('Propuesta para Conferencia');
			$subject_date = ' con Fecha: ';
			//Propuesta para Conferencia con Fecha: 20/09/2014 11:00
			//------------------------------------------------------
			//******************************************************
			$msg_borders ='******************************************************';
			$subject_undr = '------------------------------------------------------';
			$subject_copy = 'Copia de su mensaje enviado desde www.nextconferencias.com';
			$message_thanks = 'Gracias por su atención. Recibirá nuestra respuesta con brevedad.';
			$message_noreply = 'NOTA IMPORTANTE: No responda a este mensaje. Si quiere consultarnos otra cuestión escríbanos a la dirección: ' . $company_mail;
		}
		//
		// Variables del POST ***************************
		//Datos Personales
		$from_name = utf8_decode($_POST['fnombre']);
		$from_email = $_POST['femail'];
		$from_telf = $_POST['ftelf'];
		$from_empresa = utf8_decode($_POST['fempresa']);
		$from_poblacion = utf8_decode($_POST['fpoblacion']);
		$from_provincia = utf8_decode($_POST['fprovincia']);
		//Tematica
		//Autor
		//Servicios Auxiliares
		//Programacion
		$from_horario = $_POST[$programacion_horario_name];
		$from_fecha = $_POST['ffecha'];
		$from_fecha_opt = $_POST['ffecha_opt'];
		//Comentarios
		$from_comentarios = utf8_decode($_POST['fcomentarios']);
		//
		// Missatge ***************************
		//Subject
		$message = " \r\n";
		$message .= $subject . $subject_date . date('d/m/Y H:i', time()+7200) . " \r\n"; // Sumem 2h pq el servidor esta en GMT +0
		$message .= $subject_undr . " \r\n";
		//Datos Personales
		$message .= " \r\n";
		$message .= " \r\n";
		$message .= utf8_decode($personal_h);
		$message .= " \r\n";
		$message .= utf8_decode($nombre . ": ") . $from_name . " \r\n";
		$message .= utf8_decode($telefono . ": ") . $from_telf . " \r\n";
		$message .= utf8_decode($email . ": ") . $from_email . " \r\n";
		$message .= " \r\n";
		if (!empty($_POST['fempresa'])){ $message .= utf8_decode($empresa . ": ") . $from_empresa . " \r\n"; }else{$message .= utf8_decode($empresa . ": " . $emptyfield) . " \r\n";}
		if (!empty($_POST['fpoblacion'])){ $message .= utf8_decode($poblacion . ": ") . $from_poblacion . " \r\n"; }else{$message .= utf8_decode($poblacion . ": " . $emptyfield) . " \r\n";}
		if (!empty($_POST['fprovincia'])){ $message .= utf8_decode($provincia . ": ") . $from_provincia . " \r\n"; }else{$message .= utf8_decode($provincia . ": " . $emptyfield) . " \r\n";}
		//Tematica
		$message .= " \r\n";
		$message .= " \r\n";
		$message .= utf8_decode($tematica_h);
		$message .= " \r\n";
		if (!empty($_POST['form_checks_cats'])){ $message .= utf8_decode(substr(implode(" \r\n", $_POST['form_checks_cats']), 0)); }else{$message .= utf8_decode($emptyfield) . " \r\n";}
		//Autor
		$message .= " \r\n";
		$message .= " \r\n";
		$message .= utf8_decode($autor_h);
		$message .= " \r\n";
		if (!empty($_POST['form_checks_autors'])){ $message .= utf8_decode(substr(implode(" \r\n", $_POST['form_checks_autors']), 0)); }else{$message .= utf8_decode($emptyfield) . " \r\n";}
		//Servicios Auxiliares
		/*$message .= " \r\n";
		$message .= " \r\n";
		$message .= utf8_decode($servicios_h);
		$message .= " \r\n";
		if (!empty($_POST['fservicios_libros']) || !empty($_POST['fservicios_team'])){
			if (!empty($_POST['fservicios_libros'])){
				$message .= utf8_decode($servicios_libros_val) . "." . " \r\n";
			}
			if (!empty($_POST['fservicios_team'])){
				$message .= utf8_decode($servicios_team_val) . "." . " \r\n";
			}
		}else{
			$message .= utf8_decode($servicios_none) . " \r\n";
		}
		//Programacion
		$message .= " \r\n";*/
		$message .= " \r\n";
		$message .= utf8_decode($programacion_h);
		$message .= " \r\n";
		$message .= utf8_decode($programacion_horario . " " . $from_horario . "." ) . " \r\n";
		if (!empty($_POST['ffecha']) || !empty($_POST['ffecha_opt'])){
			if (!empty($_POST['ffecha'])){
				$message .= utf8_decode($programacion_fecha) . $from_fecha . " \r\n";
			}
			if (!empty($_POST['ffecha_opt'])){
				$message .= utf8_decode($programacion_fecha_opt) . $from_fecha_opt . " \r\n";
			}
		}else{
			$message .= utf8_decode($programacion_fecha_none) . " \r\n";
		}
		//Comentarios
		$message .= " \r\n";
		$message .= " \r\n";
		$message .= utf8_decode($comentarios);
		$message .= " \r\n";
		if (!empty($_POST['fcomentarios'])){	
			$message .= $from_comentarios . " \r\n"; 
		}else{
			$message .= utf8_decode($comentarios_none) . " \r\n";
		}
		//Idioma del Usuario
		if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){ 
				$message .= " \r\n";
				$message .= " \r\n";
				$message .= utf8_decode("Idioma: Castellano.") . " \r\n";
			}elseif( qtrans_getLanguage() == 'ca' ){
				$message .= " \r\n";
				$message .= " \r\n";
				$message .= utf8_decode("Idioma: Català.") . " \r\n";
			}else{//English
				$message .= " \r\n";
				$message .= " \r\n";
				$message .= "Languaje: English." . " \r\n";
			}
		}
		$message .= " \r\n";
		$message .= " \r\n";
		// Validacio de camps complerts
		//Nombre
		if (strlen($from_name) > 2){$valid_name = '2';}
		else{$valid_name = '1';}
		//Email
		if (filter_var($from_email, FILTER_VALIDATE_EMAIL)) {$valid_email = '2';}
		else{$valid_email = '1';}
		//Telefono
		if (preg_match("/^(?:\d[- ().+]*){9,}$/",$from_telf)) {
			$telf_clean = preg_replace('/[^0-9]/', '', $from_telf);
			$telf_filled = preg_replace('/([0-9]{3})([0-9]{2})([0-9]{2})([0-9]{2})/', '$1 $2 $3 $4', $telf_clean);
			$valid_telf = '2';
		}
		else{$valid_telf = '1';}
		//Fecha
		if($from_fecha){
			if (preg_match("/^[0-3]?[0-9].[0-3]?[0-9].(?:[0-9]{2})?[0-9]{2}$/",$from_fecha)) {
				$valid_fecha = '2';
			}
			else{$valid_fecha = '1';}
		}
		//Fecha
		if($from_fecha_opt){
			if (preg_match("/^[0-3]?[0-9].[0-3]?[0-9].(?:[0-9]{2})?[0-9]{2}$/",$from_fecha_opt)) {
				$valid_fecha_opt = '2';
			}
			else{$valid_fecha_opt = '1';}
		}
		//HoneyPot
		$robotest = $_POST['fhoney'];
		if($robotest){
			$error = "<p><i class='fa fa-android'></i>&nbsp;&nbsp;Nice try robot, nice try...</p>";
			echo '<div class="msg msg-error">' . $error . '</div>';
		}else{
			if($from_name && $from_email && $from_telf){
				if($valid_name == 2 && $valid_email == 2 && $valid_telf == 2 && $valid_fecha != '1' && $valid_fecha_opt != '1'){ //Camps Correctes
					//PROGRAMACIÓ PHP MAILER *************************************/
					$mail = new phpmailer();
					//Con PluginDir le indicamos a la clase phpmailer 
					$mail->PluginDir = $smtp_plugindir;
					//Con la propiedad Mailer le indicamos que vamos a usar un servidor smtp
					//$mail->Mailer = "smtp";
					$mail->isSMTP();
					//Asignamos a Host el nombre de nuestro servidor smtp
					$mail->Host = $smtp_host;
					//Le indicamos que el servidor smtp requiere autenticación
					$mail->SMTPAuth = true;
					//Protocolo de seguridad (Solo GMail)
					$mail->SMTPSecure = 'tls';
					//Le indicamos el port
					$mail->Port = $smtp_port;
					// Control de errores 1, 2, 4
					//$mail->SMTPDebug  = 1;
					//Le decimos cual es nuestro nombre de usuario y password
					$mail->Username = $smtp_user; 
					$mail->Password = $smtp_pass;
					//Indicamos cual es nuestra dirección de correo y el nombre
					$mail->From = $from_email;
					$mail->FromName = $from_name;
					//el valor por defecto 10 de Timeout es un poco escaso 
					$mail->Timeout=15;
					//Indicamos cual es la dirección de destino del correo
					$mail->AddAddress($smtp_user);
					// Mensaje solo de texto
					$mail->IsHTML(false); 
					//Asignamos asunto y cuerpo del mensaje
					$mail->Subject = $subject;
					$mail->Body = $message;
					//Definimos AltBody por si el destinatario del correo no admite email con formato html 
					//$mail->AltBody = $message; NO ES HTML
					//se envia el mensaje, si no ha habido problemas 
					//la variable $exito tendra el valor true
					$exito = $mail->Send();
					//Si el mensaje no ha podido ser enviado se realizaran 4 intentos mas como mucho 
					//para intentar enviar el mensaje, cada intento se hara 5 segundos despues 
					//del anterior, para ello se usa la funcion sleep	
					$intentos=1; 
					while ((!$exito) && ($intentos < 5)) {
					sleep(5);
						//echo $mail->ErrorInfo;
						$exito = $mail->Send();
						$intentos = $intentos+1;	
					}
					if(!$exito){ // FALLO EN EL ENVIO DEL MENSAJE
						if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){ 
								$error2 = '<p>Si necesita contactarnos puede hacerlo a través del email:';
								$error2 .= '<br/><a href="mailto:' . antispambot( $company_mail ) . '">' . antispambot( $company_mail ) . '</a>';
								$error2 .= '<p>Disculpe las molestias.';
								$error2 .= '<p class="hidden">' . $mail->ErrorInfo . '</p>';
							}elseif( qtrans_getLanguage() == 'ca' ){
								$error2 = '<p>Si necessita contactar-nos pot fer-ho a través de l\'email:';
								$error2 .= '<br/><a href="mailto:' . antispambot( $company_mail ) . '">' . antispambot( $company_mail ) . '</a>';
								$error2 .= '<p>Disculpi les molèsties.';
								$error2 .= '<p class="hidden">' . $mail->ErrorInfo . '</p>';
							}else{
								$error2 = '<p>If you need to contact us you can find us on the email adress:';
								$error2 .= '<br/><a href="mailto:' . antispambot( $company_mail ) . '">' . antispambot( $company_mail ) . '</a>';
								$error2 .= '<p>We appologize for the inconveniences.';
								$error2 .= '<p class="hidden">' . $mail->ErrorInfo . '</p>';
							}
						}else{
							$error2 = '<p>Si necesita contactarnos puede hacerlo a través del email:';
							$error2 .= '<br/><b>' . $company_mail . '</b></p>';
							$error2 .= '<p>Disculpe las molestias.';
							$error2 .= '<p class="hidden">' . $mail->ErrorInfo . '</p>';
						}
						$error2 .= '<img src="images/layout/tracking_img.gif" alt="tracking send form ga" class="fr" onload="_gaq.push([\'_trackEvent\', \'contratacion\', \'formulario\', \'fallo\']);"/>';
					}else{ //MENSAJE ENVIADO !!!		
						if (function_exists('qtrans_getLanguage')){
							if( qtrans_getLanguage() == 'es' ){ 
								// Aviso todo OK
								$success = '<p><em>Muchas gracias por su atención, </em><b>' . utf8_encode($from_name) . '</b>.</p>';
								$success .= '<p>Contactaremos con usted a través de las siguientes vías:</p>';
								$success .= '<p>Correo Electrónico: <b>' . $from_email . '</b>';
								$success .= '<br/ >Teléfono: <b>' . $from_telf . '</b></p>';
								$success .= '<img src="images/layout/tracking_img.gif" alt="tracking send form ga" class="fr" onload="_gaq.push([\'_trackEvent\', \'contratacion\', \'formulario\', \'enviado\']);"/>';
								// Datos enviados por el usuario
								$success_msg_form = 'Éstos son los datos que nos ha remitido con su mensaje:';
							}elseif( qtrans_getLanguage() == 'ca' ){
								// Aviso todo OK
								$success = '<p>Moltes gràcies per la teva atenció, <b>' . utf8_encode($from_name) . '</b>.';
								$success .= '<p>Contactarem amb vostè a través de les següents vies:';
								$success .= '<br/ >Correu Electrònic: <b>' . $from_email . '</b>';
								$success .= '<br/ >Telèfon: <b>' . $from_telf . '</b>.</p>';
								// Datos enviados por el usuario
								$success_msg_form = 'Aquestes son les dades que ens a remès amb el seu missatge:';
							}else{
								// Aviso todo OK
								$success = '<p>Thanks for your interest, <b>' . utf8_encode($from_name) . '</b>.';
								$success .= "<p>We'll contact you at the following ways:";
								$success .= '<br/ >e-Mail: <b>' . $from_email . '</b>';
								$success .= '<br/ >Phone: <b>' . $from_telf . '</b>.</p>';
								// Datos enviados por el usuario
								$success_msg_form = 'The data we\'ve recieved from your invocie:';
							}
						}else{//Not activeQtrans
							// Aviso todo OK
							$success = '<p><em>Muchas gracias por su atención, </em><b>' . utf8_encode($from_name) . '</b>.</p>';
								$success .= '<p><em>Contactaremos con usted a través de las siguientes vías:</em>';
								$success .= '<br/ >Correo Electrónico: <b>' . $from_email . '</b>';
								$success .= '<br/ >Teléfono: <b>' . $from_telf . '</b></p>';
								// Datos enviados por el usuario
								$success_msg_form = 'Éstos son los datos que nos ha remitido con su mensaje:';
						}
						//Tornem a enviar una còpia del missatge a l'usuari ************************************************************************
						//$Message2 & $Subject2
						/*$subject2 = utf8_decode($subject_copy);
						$message2 = " \r\n";
						$message2 .= $company_name . " \r\n";
						$message2 .= $company_undr . " \r\n";
						$message2 .= " \r\n";
						$message2 .= utf8_decode($subject_copy) . " \r\n";
						$message2 .= " \r\n";
						$message2 .= $msg_borders . " \r\n";
						$message2 .= $message . " \r\n";
						$message2 .= $msg_borders . " \r\n";
						$message2 .= " \r\n";
						$message2 .= utf8_decode($message_thanks) . " \r\n";
						$message2 .= " \r\n";
						$message2 .= " \r\n";
						$message2 .= utf8_decode($message_noreply) . " \r\n";
						$message2 .= " \r\n";*/
						// Enviamos 2º mensaje al usuario
						//PROGRAMACIÓ PHP MAILER *************************************/
						/*$mail2 = new phpmailer();
						//Definimos las propiedades 
						//Con PluginDir le indicamos a la clase phpmailer donde se 
						$mail2->PluginDir = $smtp_plugindir;
						//Con la propiedad Mailer le indicamos que vamos a usar un servidor smtp
						$mail2->Mailer = "smtp";
						//Asignamos a Host el nombre de nuestro servidor smtp
						$mail2->Host = $smtp_host;
						//Le indicamos el port
						$mail2->Port = $smtp_port;
						//Le indicamos que el servidor smtp requiere autenticación
						$mail2->SMTPAuth = true;
						//Protocolo de seguridad (Solo GMail)
						$mail2->SMTPSecure = 'ssl';
						//Le decimos cual es nuestro nombre de usuario y password
						$mail2->Username = $smtp_user; 
						$mail2->Password = $smtp_pass;
						//Indicamos cual es nuestra dirección de correo y el nombre que 
						//queremos que vea el usuario que lee nuestro correo
						$mail2->From = $smtp_user;
						$mail2->FromName = $company_name;
						//el valor por defecto 10 de Timeout es un poco escaso dado que voy a usar 
						//una cuenta gratuita, por tanto lo pongo a 30  
						$mail2->Timeout=30;
						//Indicamos cual es la dirección de destino del correo
						$mail2->AddAddress($from_email);
						// Mensaje solo de texto
						$mail2->IsHTML(false); 
						//Asignamos asunto y cuerpo del mensaje
						//El cuerpo del mensaje lo ponemos en formato html, haciendo 
						//que se vea en negrita
						$mail2->Subject = $subject2;
						$mail2->Body = $message2;
						//Definimos AltBody por si el destinatario del correo no admite email con formato html 
						//$mail->AltBody = $message; NO ES HTML
						//se envia el mensaje, si no ha habido problemas 
						//la variable $exito tendra el valor true
						$exito2 = $mail2->Send();
						//Si el mensaje no ha podido ser enviado se realizaran 4 intentos mas como mucho 
						//para intentar enviar el mensaje, cada intento se hara 5 segundos despues 
						//del anterior, para ello se usa la funcion sleep	
						$intentos=1; 
						while ((!$exito2) && ($intentos < 2)) {
							sleep(5);
							//echo $mail->ErrorInfo;
							$exito2 = $mail2->Send();
							$intentos=$intentos+1;	
						}
						if($exito2){
							if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){ 
									$success_copy = '<p>Recibirá una copia de su mensaje a la dirección de correo <b>' . $from_email . '</b>.';
									$success_copy .= '<br/>Si pasados unos minutos no encuentra el mensaje revise su carpeta de SPAM.<br/></p>';
								}elseif( qtrans_getLanguage() == 'ca' ){
									$success_copy = '<p>Rebrà una còpia del seu missatge a l\'adreça de correu <b>' . $from_email . '</b>.';
									$success_copy .= '<br/>Si passats uns minuts no troba el missatge revisi la seva carpeta d\'SPAM.<br/></p>';
			
								}else{
									$success_copy = '<p>A copy of your message have been sent to the adress <b>' . $from_email . '</b>.';
									$success_copy .= '<br/>If in a minutes you can\'t find the message, check your SPAM folder.<br/></p>';
								}
							}else{//Not activeQtrans
								$success_copy = '<p><br/>Recibirá una copia de su mensaje a la dirección de correo <b>' . $from_email . '</b>.';
								$success_copy .= '<br/>Si pasados unos minutos no encuentra el mensaje revise su carpeta de SPAM.<br/></p>';
							}
						}*/
					}
				}else{ //Campos no validados
					if (function_exists('qtrans_getLanguage')){
						if( qtrans_getLanguage() == 'es' ){ 
							$error = '<p><i class="fa fa-edit"></i> Por favor corrija los campos marcados en rojo.</p>';
						}elseif( qtrans_getLanguage() == 'ca' ){
							$error = '<p><i class="fa fa-edit"></i> Per favor corretgeixi els camps marcats en vermell.</p>';
						}else{
							$error = '<p><i class="fa fa-edit"></i> Pless correct marked fields.</p>';
						}
					}else{//Not activeQtrans
						$error = '<p><i class="fa fa-edit"></i> Por favor corrija los campos marcados en rojo.</p>';
					}
				} //Fin no validados
			}else{ //Hay campos vacíos
				if (function_exists('qtrans_getLanguage')){
					if( qtrans_getLanguage() == 'es' ){ 
						$error = '<p><i class="fa fa-exclamation-triangle"></i> Por favor rellene todos los campos.</p>';
					}elseif( qtrans_getLanguage() == 'ca' ){
						$error = '<p><i class="fa fa-exclamation-triangle"></i> Per favor ompli tots els camps.</p>';
					}else{
						$error = '<p><i class="fa fa-exclamation-triangle"></i> Please fill all the fields.</p>';
					}
				}else{//Not activeQtrans
					$error = '<p><i class="fa fa-exclamation-triangle"></i> Por favor rellene todos los campos.</p>';
				}
			}
		}
	}
?>
<!-- FORM Fields **********************************************************************-->
<?php 
	// VARIABLES DE RECÀRREGA DELS FIELDS ************************************************
	//
	//
	//Datos Personales ********************
	//Nombre
	if (isset($_POST['fnombre'])){$name_filled = $from_name;
	} else {$name_filled = '';	}
	//Email
	if (isset($_POST['femail'])){$email_filled = $from_email;
	} else {$email_filled = '';	}
	//Telefono
	if (isset($_POST['ftelf'])){$telf_filled = $from_telf;
	} else {$telf_filled = '';	}
	//Empresa
	if (isset($_POST['fempresa'])){$empresa_filled = $from_empresa;
	} else {$empresa_filled = '';	}
	//Poblacion
	if (isset($_POST['fpoblacion'])){$poblacion_filled = $from_poblacion;
	} else {$poblacion_filled = '';	}
	//Provincia
	if (isset($_POST['fprovincia'])){$provincia_filled = $from_provincia;
	} else {$provincia_filled = '';	}
	//
	//Tematica ********************************
	//
	//
	//Autor ***********************************
	//
	//
	//Servicios Auxiliares ********************
	//
	//
	//Libros
	if (isset($_POST['fservicios_libros'])){$servicios_libros_check = 'checked';
	}else{$servicios_libros_check = '';}
	//Teambuilding
	if (isset($_POST['fservicios_team'])){$servicios_team_check = 'checked';
	}else{$servicios_team_check = '';}
	//
	//Programacion ****************************
	//
	//
	//Horario
	if (isset($_POST[$programacion_horario_name])){
		$from_horario = $_POST[$programacion_horario_name];
		if ($from_horario == $programacion_horario_ind) {
			$programacion_horario_ind_check = 'checked';
			$programacion_horario_man_check = '';
			$programacion_horario_tar_check = '';
		}else if ($from_horario == $programacion_horario_man) {
			$programacion_horario_ind_check = '';
			$programacion_horario_man_check = 'checked';
			$programacion_horario_tar_check = '';
		}else if ($from_horario == $programacion_horario_tar) {
			$programacion_horario_ind_check = '';
			$programacion_horario_man_check = '';
			$programacion_horario_tar_check = 'checked';
		}
	} else{
		$programacion_horario_ind_check = 'checked';
		$programacion_horario_man_check = '';
		$programacion_horario_tar_check = '';
	}
	//Fecha
	if (isset($_POST['ffecha'])){$programacion_fecha_filled = $from_fecha;
	} else {$programacion_fecha_filled = '';	}
	//Fecha optativa
	if (isset($_POST['ffecha_opt'])){$programacion_fecha_opt_filled = $from_fecha_opt;
	} else {$programacion_fecha_opt_filled = '';	}
	//
	//Comentarios ****************************
	if (isset($_POST['fcomentarios'])){$comentarios_filled = $from_comentarios;
	} else {$comentarios_filled = '';}
	//
	//HoneyPot *****************************
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){ 
			$honey_alert = '¡Borra este texto!';
		}elseif( qtrans_getLanguage() == 'ca' ){
			$honey_alert = 'Esborra aquest text!';
		}else{
			$honey_alert = 'Delete me!';
		}
	}else{ //No qTranslate
		$honey_alert = '¡Borra este texto!';
	}
	if (isset($_POST['fhoney']) && !empty($_POST['fhoney'])){$honey_filled = $honey_alert;
	} else {$honey_filled = '';	}
//
// ***********************************************************************************
// LAYOUT DE LA PAGINA ***************************************************************
// ?>
<?php   
// layout sense enviar o no hi ha error 2 (SMTP error)
if (!isset($success) && !isset($error2)){
?>
<!-- Test Missatge d'Errors  
<div class="msg msg_success">
	<p><i class="icon-ok"></i> <b>Mensaje enviado correctamente</b>.</p>
    <p>Gracias por tu atención, <b>Ola k ase</b>.
    <br/ ><br/ >Te responderemos en menos de 72 horas a través de las siguientes vías de contacto:
    <br/ >Teléfono: <b> 660171337 </b>
    <br/ >Correo Electrónico: <b>ola@kase.es</b>.<br/ ><br/ ></p>
</div>
<div class="msg msg_error"><p><i class="icon-remove-sign"></i><b>ERROR en l'enviament del missatge.</b></p><p class="thin">Per favor torna-ho a inténtar en una estona.</p></div>
<div class="msg msg_error"><p><i class="icon-warning-sign"></i>Por favor rellena los campos <em>marcados con asterisco (*)</em>.</p></div>-->
<section id="contratacion_form">
	<form action="#form_contacto" method="post" name="form" id="form" class="form_contrat" onSubmit="_gaq.push(['_trackEvent', 'FormularioContratacion', 'Enviar'])">
		<!-- Header -->
		<header>
			<h1><?php echo $contr_h1; ?></h1>
			<p><?php echo $contr_p; ?></p>
		</header>
		<?php if ($error != ''){
			echo '<div class="msg msg-error">' . $error . '</div>';
		}
		?>
		<!-- Datos Personales -->
		<section>
			<header>
				<h2><?php echo $personal_h; ?></h2>
				<p><?php echo $personal_p; ?></p>
			</header>
			<div>
				<ul id="form_personal">
					<li class="form_nombre <?php if($_POST){ if ( empty($from_name) || $valid_name == 1 ){echo 'error';}elseif($valid_name == 2){echo 'valid';}}?>">
						<label class="mandatory" for="fnombre"><?php echo $nombre; ?></label>
						<input name="fnombre" type="text" id="fnombre" class="required <?php if($_POST && empty($from_name)){echo 'error';}?>" value="<?php echo $name_filled; ?>" placeholder="<?php echo $nombre_plhd; ?>" autocorrect="off"/>
					</li>
					<li class="form_mail <?php if($_POST){ if ( empty($from_email) || $valid_email == 1 ){echo 'error';}elseif($valid_email == 2){echo 'valid';}}?>">
						<label class="mandatory" for="femail"><?php echo $email; ?></label>
						<input name="femail" type="text" id="femail" class="required email <?php if($_POST && empty($from_email)){echo 'error';}?>" value="<?php echo $email_filled; ?>" placeholder="<?php echo $email_plhd; ?>" autocapitalize="off"/>
					</li>
					<li class="form_telf <?php if($_POST){ if ( empty($from_telf) || $valid_telf == 1 ){echo 'error';}elseif($valid_telf == 2){echo 'valid';}}?>">
						<label for="ftelf"><?php echo $telefono; ?></label>
						<input name="ftelf" type="text" id="ftelf" class="<?php if($_POST && empty($from_tlf)){echo 'error';}?>" value="<?php echo $telf_filled; ?>" placeholder="<?php echo $telefono_plhd; ?>" />
					</li>
					<li class="form_empresa <?php if($_POST){ if ( !empty($from_empresa) ){echo 'valid';}}?>">
						<label for="fempresa"><?php echo $empresa; ?></label>
						<input name="fempresa" type="text" id="fempresa" value="<?php echo $empresa_filled; ?>" placeholder="<?php echo $empresa_plhd; ?>" autocorrect="off"/>
					</li>
					<li class="form_poblacion <?php if($_POST){ if ( !empty($from_poblacion) ){echo 'valid';}}?>">
						<label for="fpoblacion"><?php echo $poblacion; ?></label>
						<input name="fpoblacion" type="text" id="fpoblacion" value="<?php echo $poblacion_filled; ?>" placeholder="<?php echo $poblacion_plhd; ?>" autocorrect="off"/>
					</li>
					<li class="form_provincia <?php if($_POST){ if ( !empty($from_provincia) ){echo 'valid';}}?>">
						<label for="fprovincia"><?php echo $provincia; ?></label>
						<input name="fprovincia" type="text" id="fprovincia" value="<?php echo $provincia_filled; ?>" placeholder="<?php echo $provincia_plhd; ?>" autocorrect="off"/>
					</li>
				</ul>
				<span class="clearboth"></span>
			</div>
		</section>
		<!-- Tematica -->
		<section class="wrap_readmore <?php if (isset($_POST['form_checks_cats'])){echo 'readopen';}?>">
			<header>
				<h2><?php echo $tematica_h; ?></h2>
				<p><?php echo $tematica_p; ?></p>
				<span class="readmore"><span class="readmore_button"><span class="fa fa-sitemap"></span></span></span>
			</header>
			<div class="readmore_content">
				<ul id="form_tematica">
					<li class="form_li_info"><i class="fa fa-info-circle"></i><?php echo $tematica_p_info; ?></li>
					<?php 
					foreach(get_categories('hide_empty=0&orderby=count&order=DESC&exclude=1') as $cat) {
						$iconcat = get_field('cat_icon', 'category_' . $cat->term_id );
						//$cat_input_array = $_POST['form_checks_cats'];
						$cat_input_li = '<li><input name="form_checks_cats[]" id="cat_' . $cat->slug . '" type="checkbox" value="' . $cat->cat_name . '" ';
						if (isset($_POST['form_checks_cats']) && in_array($cat->cat_name, $_POST['form_checks_cats'])) { $cat_input_li .=  'checked="checked" ' ; }
						$cat_input_li .= '/><label for="cat_' . $cat->slug . '" class="anitamed"> <i class="fa ' . $iconcat . '"></i> ' . $cat->cat_name . '</label></li>';
						echo $cat_input_li;
					}
					?>
				</ul>
				<span class="clearboth"></span>
			</div>
		</section>
		<!-- Autor -->
		<section class="wrap_readmore <?php if (isset($_POST['form_checks_autors'])){echo 'readopen';}?>">
			<header>
				<h2><?php echo $autor_h; ?></h2>
				<p><?php echo $autor_p; ?></p>
				<span class="readmore"><span class="readmore_button"><span class="fa fa-group"></span></span></span>
			</header>
			<div class="readmore_content">
				<ul id="form_autor">
					<li class="form_li_info"><i class="fa fa-info-circle"></i><?php echo $autor_p_info; ?></li>
					<?php 
					foreach(get_posts('posts_per_page=-1&orderby=title&order=ASC') as $post) {
						if ( has_post_thumbnail() ) {
							$post_thumb = get_the_post_thumbnail($post->ID, 'autor_loop');
						}else{
							$post_thumb = '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/autor_nothumb.jpg" alt="' . get_the_title() . '"/>';
						}
						$autor_input_li = '<li><input name="form_checks_autors[]" id="autor_' . $post->ID . '" type="checkbox" value="' . get_the_title() . '" ';
						if (isset($_POST['form_checks_autors']) && in_array(get_the_title(), $_POST['form_checks_autors'])) { $autor_input_li .=  'checked="checked" ' ; }
						$autor_input_li .= '/><label for="autor_' . $post->ID . '" class="anitamed">' . $post_thumb . get_the_title() . '</label></li>'; //Per a que funcioni a IE11 requereix label img{  pointer-events: none;}
						echo $autor_input_li;
					}
					?>
				</ul>
				<span class="clearboth"></span>
			</div>
		</section>
		<!-- Servicios Auxiliares -->
		<section class="wrap_readmore hidden <?php if (isset($_POST['fservicios_libros']) || isset($_POST['fservicios_team'])){echo 'readopen';}?>">
			<header>
				<h2><?php echo $servicios_h; ?></h2>
				<p><?php echo $servicios_p; ?></p>
				<span class="readmore"><span class="readmore_button"><span class="fa fa-book"></span></span></span>
			</header>
			<div class="readmore_content">
				<ul id="form_servicios">
					<li><input name="fservicios_libros" id="fservicios_libros" type="checkbox" value="<?php echo $servicios_libros_val; ?>" <?php echo $servicios_libros_check; ?> /> <label for="fservicios_libros"><?php echo $servicios_libros; ?></label></li>
					<li><input name="fservicios_team" id="fservicios_team" type="checkbox" value="<?php echo $servicios_team_val; ?>" <?php echo $servicios_team_check; ?> /> <label for="fservicios_team"><?php echo $servicios_team; ?></label></li>
				</ul>
				<span class="clearboth"></span>			
			</div>
		</section>
		<!-- Programacion -->
		<section class="wrap_readmore <?php if (isset($_POST[$programacion_horario_name]) && $from_horario != $programacion_horario_ind || $programacion_fecha_filled != '' || $programacion_fecha_opt_filled != ''){echo 'readopen';}?>">
			<header>
				<h2><?php echo $programacion_h; ?></h2>
				<p><?php echo $programacion_p; ?></p>
				<span class="readmore"><span class="readmore_button"><span class="fa fa-calendar"></span></span></span>
			</header>
			<div class="readmore_content">
				<ul id="form_programacion">
					<li  class="form_date <?php if($_POST){ if ( $valid_fecha == 1 ){echo 'error';}elseif($valid_fecha == 2){echo 'valid';}}?>">
						<label for="ffecha"><?php echo $programacion_fecha; ?></label>
						<input name="ffecha" type="text" id="ffecha" value="<?php echo $programacion_fecha_filled; ?>" class="datepicker" placeholder="<?php echo $programacion_fecha_format; ?>"  autocomplete="off" />
					</li>
					<li  class="form_date <?php if($_POST){ if ( $valid_fecha_opt == 1 ){echo 'error';}elseif($valid_fecha_opt == 2){echo 'valid';}}?>">
						<label for="ffecha_opt"><?php echo $programacion_fecha_opt; ?></label>
						<input name="ffecha_opt" type="text" id="ffecha_opt" value="<?php echo $programacion_fecha_opt_filled; ?>" class="datepicker" placeholder="<?php echo $programacion_fecha_format; ?>"  autocomplete="off" />
					</li>
					<li id="form_programacion_horario">
						<span><?php echo $programacion_horario; ?></span>
						<span><input type="radio" name="<?php echo $programacion_horario_name; ?>"  id="<?php echo 'f'. $programacion_horario_ind_slug; ?>" value="<?php echo $programacion_horario_ind; ?>" <?php echo $programacion_horario_ind_check; ?> /><label for="<?php echo 'f'. $programacion_horario_ind_slug; ?>"><?php echo $programacion_horario_ind; ?></label></span>
						<span><input type="radio" name="<?php echo $programacion_horario_name; ?>" id="<?php echo 'f'. $programacion_horario_man_slug; ?>" value="<?php echo $programacion_horario_man; ?>" <?php echo $programacion_horario_man_check; ?> /><label for="<?php echo 'f'. $programacion_horario_man_slug; ?>"><?php echo $programacion_horario_man; ?></label></span>
						<span><input type="radio" name="<?php echo $programacion_horario_name; ?>" id="<?php echo 'f'. $programacion_horario_tar_slug; ?>" value="<?php echo $programacion_horario_tar; ?>" <?php echo $programacion_horario_tar_check; ?> /><label for="<?php echo 'f'. $programacion_horario_tar_slug; ?>"><?php echo $programacion_horario_tar; ?></label></span>
					</li>
				</ul> 
				<span class="clearboth"></span>	
				<?php if($_POST){echo $from_fecha; }?>				
			</div>
		</section>
		<!-- Comentarios -->
		<section>
			<header>
				<h2><?php echo $comentarios; ?></h2>
			</header>
			<div>
				<ul id="form_comentarios">
					<li>
						<textarea name="fcomentarios" id="fcomentarios" type="text" placeholder="<?php echo $comentarios_placeholder; ?>" /><?php echo $comentarios_filled; ?></textarea>
					</li>
				</ul>
				<span class="clearboth"></span>
			</div>
		</section>
		<!-- Honey i Submit -->
		<footer>
			<ul id="form_submit">
				<!-- The following field is for robots only, invisible to humans: -->
				<li class="li_honey form_honey">
					<label for="honey"><?php echo $honeypot; ?></label>
					<input name="fhoney" type="text" id="fhoney" value="<?php echo $honey_filled; ?>"/ >
				</li>
				<li class="li_bttn_foot">
					<input name="send" type="submit" class="calltoact button button-big button-primary animated" value="<?php echo $enviar; ?>"/>
					<span id="form_loader" class="hidden">
						<img src="<?php echo get_stylesheet_directory_uri() . '/images/layout/form_loader1.gif" alt="loading'; ?>" />
					</span>
				</li>
				<?php $web_array = get_option('legal_web');
				if ( isset($web_array['url_legal']) && $web_array['url_legal'] != ''){
					$url_legal = $web_array['url_legal'];
					echo '<li class="li_legal">';
					echo '<p>' . $enviar_aviso;
					echo '<a href="' . get_bloginfo('url') . $qlang . $url_legal . '" target="_self" title=' . $enviar_aviso_cond . '">' . $enviar_aviso_cond . '</a><p>';
					echo '<p>';
					echo '</li>';
				} ?>
				</li>
			</ul>
		</footer>
	</form>
</section>
<?php }else{ //Si el missatge s'ha enviat o te error SMTP 
	if (isset($success)){?>
<section id="contratacion_form"  class="noform noform_success">
	<header>
		<h1><?php echo $formsubmit_h1; ?></h1>
		<p><?php echo $formsubmit_p; ?></p>
	</header>
	<section>
		<!-- Mensaje todo OK -->
		<?php echo '<section class="msg msg_success">' . $success . '</section>'; ?>
		<?php if (!empty($_POST['fempresa']) || !empty($_POST['fpoblacion']) || !empty($_POST['fprovincia']) || !empty($_POST['form_checks_cats']) || !empty($_POST['form_checks_autors']) || !empty($_POST['fservicios_libros']) || !empty($_POST['fservicios_team']) || isset($_POST[$programacion_horario_name]) && $from_horario != $programacion_horario_ind || !empty($_POST['ffecha']) || !empty($_POST['ffecha_opt']) || !empty($_POST['fcomentarios'])){ ?>
			<article>
				<h1><?php echo $success_msg_form; ?></h1>
				<!-- Datos Usuario -->
				<?php if (!empty($_POST['fempresa']) || !empty($_POST['fpoblacion']) || !empty($_POST['fprovincia'])){
					echo '<h2>' . $personal_empresa . '</h2>';
					if (!empty($_POST['fempresa'])){ echo '<p><em>' . $empresa . ':</em> ' . $_POST['fempresa'] . '</p>'; }
					if (!empty($_POST['fpoblacion'])){ echo '<p><em>' . $poblacion . ':</em> ' . $_POST['fpoblacion'] . '</p>'; }
					if (!empty($_POST['fprovincia'])){ echo '<p><em>' . $provincia . ':</em> ' . $_POST['fprovincia'] . '</p>'; }
				} ?>
				
				<!-- Tematica -->
				<?php if (!empty($_POST['form_checks_cats'])){
					echo '<h2>' . $tematica_h . '</h2>';
					echo '<p>';
					echo substr(implode(", ", $_POST['form_checks_cats']), 0) . '.';
					echo '</p>';
				} ?>
				<!-- Autor -->
				<?php if (!empty($_POST['form_checks_autors'])){
					echo '<h2>' . $autor_h . '</h2>';
					echo '<p>';
					echo substr(implode(", ", $_POST['form_checks_autors']), 0) . '.';
					echo '</p>';
				} ?>
				<!-- Servicios Auxiliares -->
				<?php if (!empty($_POST['fservicios_libros']) || !empty($_POST['fservicios_team'])){
					echo '<h2>' . $servicios_h . '</h2>';
					if (!empty($_POST['fservicios_libros'])){ echo '<p>' . $servicios_libros_val . '.</p>';}
					if (!empty($_POST['fservicios_team'])){ echo '<p>' . $servicios_team_val . '.</p>';}
				} ?>
				<!-- Programacion -->
				<?php if (isset($_POST[$programacion_horario_name]) && $from_horario != $programacion_horario_ind || !empty($_POST['ffecha']) || !empty($_POST['ffecha_opt'])){
					echo '<h2>' . $programacion_h . '</h2>';
					echo '<p><em>' . $programacion_horario . '</em> ' . $from_horario . ".</p>";
					if (!empty($_POST['ffecha'])){ echo '<p><em>' . $programacion_fecha . '</em>' . $from_fecha . '</p>';}
					if (!empty($_POST['ffecha_opt'])){ echo '<p><em>' . $programacion_fecha_opt . '</em>' . $from_fecha_opt . '</p>';}
				} ?>
				<!-- Comentarios -->
				<?php if (!empty($_POST['fcomentarios'])){
					echo '<h2>' . $comentarios . '</h2>';
					echo '<p>' . $_POST['fcomentarios'] . '</p>';
				} ?>
			</article>
			
		<?php $br_after = '<br/>';
		} ?>
		<!-- Copia de mensaje enviada -->
		<?php //if($exito2) {echo '<div class="msg msg_success">' . $success_copy . '</div>';}?>
	</section>
	<br/>
</section>
<?php include ('main-snippet-queofrecemos.php');?>
<?php }else{ //Error SMTP?>
<section id="contratacion_form" class="noform noform_error">
	<header>
		<h1><?php echo $formsubmiterror_h1; ?></h1>
		<p><?php echo $formsubmiterror_p; ?></p>
	</header>
	<section>
		<?php echo $error2; ?>
	</section>
</section>
<?php include ('main-snippet-queofrecemos.php');?>
<?php } //End if $error2
} //End if $success && $error2 ?>