<?php
/**********************************************************************************************
 * Formulario de Contacto con comprobación de campos
 * Utilizar conjuntamente con validate.js
 * Esta version utiliza la libreria PhpMailer() -> https://github.com/PHPMailer/PHPMailer
**********************************************************************************************
VERSION 0.9
> Eliminar el output del form en success
> Mostrar la pàgina desde la que s'ha enviat el formulari
*********************************************************************************************
TO DO:
*********************************************************************************************/
// Configuració SMTP *****************************
$smtp_plugindir = 'phpmailer/';
$smtp_host = "mail.nextconferencias.com";
// ID de l'Usuari - Client
$editor_id = 2;
// Cridem al phpMailer i l'extensio SMTP
require($smtp_plugindir . "class.phpmailer.php");
require($smtp_plugindir . "class.smtp.php");
//Noms dels Camps
if (function_exists('qtrans_getLanguage')){
	if( qtrans_getLanguage() == 'es' ){ 
		$nombre = 'Nombre y Apellidos';
		$email = 'Correo Electrónico';
		$telefono = 'Teléfono';
		$honeypot = '¡NO rellenes este campo!';
		$enviar = 'ENVIAR';
	}elseif( qtrans_getLanguage() == 'ca' ){
		$nombre = 'Nom i Cognoms';
		$email = 'Correu Electrònic';
		$telefono = 'Telèfon';
		$honeypot = 'NO omplis aquest camp!';
		$enviar = 'ENVIAR';
	}else{ //English
		$nombre = 'Name';
		$email = 'e-mail';
		$telefono = 'Phone';
		$honeypot = 'Leave this field blank';
		$enviar = 'SEND';
	}
}else{ //No qTranslate
	$nombre = 'Nombre y Apellidos';
	$email = 'Correo Electrónico';
	$telefono = 'Teléfono';
	$honeypot = '¡NO rellenes este campo!';
	$enviar = 'ENVIAR';
}
?> 
<!-- Form PHP **********************************************************************-->
<?php
	if($_POST){
		/*VARIABLES GLOBALS **********************************************************/
		// Usuario
		include ($smtp_plugindir . "form_keys.php"); // Archivo Manual
		$form_mail = get_the_author_meta( 'form_email', $editor_id );
		$company_mail = get_the_author_meta( 'company_email', $editor_id );
		if (isset($form_mail) && $form_mail != ''){ // Desde BackEnd
			$smtp_user = $form_mail; 
		}elseif ($email_usuario != ''){ // Archivo Manual
			$smtp_user = $email_usuario;
		}else{ //Manual
			$smtp_user ='';
		}
		// Password
		$form_mail_pass = get_the_author_meta( 'form_email_pass', $editor_id );
		if (isset($form_mail_pass) && $form_mail_pass != ''){ // ACF
			$encrypt_method = "AES-256-CBC";
			$secret_key = 'nextconferenciasdeautor';
			$secret_iv = '987654321';
			// hash
			$key = hash('sha256', $secret_key);
			// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
			$iv = substr(hash('sha256', $secret_iv), 0, 16);
			// Descodifiquem
			$smtp_pass = openssl_decrypt(base64_decode($form_mail_pass), $encrypt_method, $key, 0, $iv);  
		}elseif ($email_usuario != ''){ // Archivo Manual
			$smtp_pass = $email_password;
		}else{ //Manual
			$smtp_pass = '';
		}
		//
		// Variables -> Empresa & Missatge ***************************
		if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){ 
				$company_name = utf8_decode('NEXT Conferencias de Autor');
				$company_undr = '--------------------------';
				$subject = utf8_decode('Petición de Contacto desde la web de NEXT');
				$subject_date = ' con Fecha: ';
				//Petición de Contacto desde la web de NEXT con Fecha: 20/09/2014 11:00
				//---------------------------------------------------------------------
				//*********************************************************************
				$msg_borders ='*********************************************************************';
				$subject_undr = '---------------------------------------------------------------------';
				$subject_copy = 'Copia de su mensaje enviado desde www.nextconferencias.com';
				$message_thanks = 'Gracias por su atención. Recibirá nuestra respuesta con brevedad.';
				$message_noreply = 'NOTA IMPORTANTE: No responda a este mensaje. Si quiere consultarnos otra cuestión escríbanos a la dirección: ' . $company_mail;
			}elseif( qtrans_getLanguage() == 'ca' ){
				$company_name = utf8_decode('NEXT Conferències d\'Autor');
				$company_undr = '-------------------------';
				$subject = utf8_decode('Petició de Contacte des del web de NEXT');
				$subject_date = ' amb Data: ';
				//Petició de Contacte des del web de NEXT amb Data: 20/09/2014 11:00
				//------------------------------------------------------------------
				//******************************************************************
				$msg_borders ='******************************************************************';
				$subject_undr = '------------------------------------------------------------------';
				$subject_copy = 'Còpia del seu missatge enviat desde www.nextconferencias.com';
				$message_thanks = 'Gràcies per la seva atenció. Rebrá resposta amb brevetat.';
			}else{ //English
				$company_name = 'NEXT Conferencias de Autor';
				$company_undr = '--------------------------';
				$subject = 'Invoice sent from NEXT website';
				$subject_date = ' on Date: ';
				//Invoice sent from NEXT website on Date: 20/09/2014 11:00
				//--------------------------------------------------------
				//********************************************************
				$msg_borders ='********************************************************';
				$subject_undr = '--------------------------------------------------------';
				$subject_copy = 'Invoice copy sent from www.nextconferencias.com';
				$message_thanks = 'Thanks for your interest. We\'ll contact you soon.';
				$message_noreply = 'IMPORTANT ADVICE: Don\'t reply to this email. If you have futher questions write us to the adress: ' . $company_mail;
			}
		}else{//Not activeQtrans
			$company_name = 'NEXT Conferencias de Autor';
			$company_undr = '--------------------------';
			$subject = utf8_decode('Petición de Contacto desde la web de NEXT');
			$subject_date = ' con Fecha: ';
			//Petición de Contacto desde la web de NEXT con Fecha: 20/09/2014 11:00
			//---------------------------------------------------------------------
			//*********************************************************************
			$msg_borders ='*********************************************************************';
			$subject_undr = '---------------------------------------------------------------------';
			$subject_copy = 'Copia de su mensaje enviado desde www.nextconferencias.com';
			$message_thanks = 'Gracias por su atención. Recibirá nuestra respuesta con brevedad.';
			$message_noreply = 'NOTA IMPORTANTE: No responda a este mensaje. Si quiere consultarnos otra cuestión escríbanos a la dirección: ' . $company_mail;
		}
		//
		// Variables del POST ***************************
		$from_name = utf8_decode($_POST['fnombre']);
		$from_email = $_POST['femail'];
		$from_telf = $_POST['ftelf'];
		//
		// Missatge ***************************
		$message = " \r\n";
		$message .= $subject . $subject_date . date('d/m/Y H:i', time()+7200) . " \r\n"; // Sumem 2h pq el servidor esta en GMT +0
		$message .= $subject_undr . " \r\n";
		$message .= utf8_decode($nombre . ": ") . $from_name . " \r\n";
		$message .= utf8_decode($telefono . ": ") . $from_telf . " \r\n";
		$message .= utf8_decode($email . ": ") . $from_email . " \r\n";
		if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){ 
				$message .= utf8_decode("Idioma: Castellano") . " \r\n";
			}elseif( qtrans_getLanguage() == 'ca' ){
				$message .= utf8_decode("Idioma: Català") . " \r\n";
			}else{//English
				$message .= "Languaje: English" . " \r\n";
			}
		}
		$message .= " \r\n";
		$robotest = $_POST['fhoney'];
		if($robotest){
			$error = "<p><i class='fa fa-android'></i>&nbsp;&nbsp;Nice try robot, nice try...</p>";
		}else{
			if($from_name && $from_email && $from_telf){
				//PROGRAMACIÓ PHP MAILER *************************************/
				$mail = new phpmailer();
				//Con PluginDir le indicamos a la clase phpmailer 
				$mail->PluginDir = $smtp_plugindir;
				//Con la propiedad Mailer le indicamos que vamos a usar un servidor smtp
				$mail->Mailer = "smtp";
				//Asignamos a Host el nombre de nuestro servidor smtp
				$mail->Host = $smtp_host;
				//Le indicamos que el servidor smtp requiere autenticación
				$mail->SMTPAuth = true;
				//Le decimos cual es nuestro nombre de usuario y password
				$mail->Username = $smtp_user; 
				$mail->Password = $smtp_pass;
				//Indicamos cual es nuestra dirección de correo y el nombre
				$mail->From = $smtp_user;
				$mail->FromName = $company_name;
				//el valor por defecto 10 de Timeout es un poco escaso 
				$mail->Timeout=30;
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
							$error2 = '<p><i class="fa fa-times-circle"></i><b>ERROR en el envío del mensaje.</b><p>';
							$error2 .= '<p>Ha habido un problema durante la recepción de tu mensaje.';
							$error2 .= '<br/>Puedes contactarnos a través del email:';
							$error2 .= '<br/><b>' . $company_mail . '</b></p>';
							$error2 .= '<p class="hidden">' . $mail->ErrorInfo . '</p>';
						}elseif( qtrans_getLanguage() == 'ca' ){
							$error2 = "<p><i class='fa fa-times-circle'></i><b>ERROR en l'enviament del missatge.</b></p>";
							$error2 .= '<p>Hem tingut un problema durant la recepció del teu missatge.';
							$error2 .= '<br/>Pots contactar-nos a través de l\'email:';
							$error2 .= '<br/><b>' . $company_mail . '</b></p>';
							$error2 .= '<p class="hidden">' . $mail->ErrorInfo . '</p>';
						}else{
							$error2 = '<p><i class="fa fa-times-circle"></i><b>Sending message ERROR.</b></p>';
							$error2 .= '<br/>You can find us on the email adress:';
							$error2 .= '<br/><b>' . $company_mail . '</b></p>';
							$error2 .= '<p class="hidden">' . $mail->ErrorInfo . '</p>';
						}
					}else{
						$error2 = '<p><i class="fa fa-remove-sign"></i><b>ERROR en el envío del mensaje.</b><p>';
						$error2 .= '<p>Ha habido un problema durante la recepción de tu mensaje.';
						$error2 .= '<br/>Puedes contactarnos a través del email:';
						$error2 .= '<br/><b>' . $company_mail . '</b></p>';
						$error2 .= '<p class="hidden">' . $mail->ErrorInfo . '</p>';
					}
					echo '<div class="msg msg_error">' . $error2 . '</div>';
				}else{ //MENSAJE ENVIADO !!!		
					if (function_exists('qtrans_getLanguage')){
						if( qtrans_getLanguage() == 'es' ){ 
							$success = '<p><i class="fa fa-check-circle"></i> Mensaje enviado correctamente.</p>';
							$success .= '<p>Gracias por tu atención, <b>' . utf8_encode($from_name) . '</b>.';
							$success .= '<br/ ><br/ >Te responderemos lo antes posible a través de las siguientes vías de contacto.';
							$success .= '<br/ >Teléfono: <b>' . $from_telf . '</b>';
							$success .= '<br/ >Correo Electrónico: <b>' . $from_email . '</b>.</p>';
						}elseif( qtrans_getLanguage() == 'ca' ){
							$success = '<p><i class="fa fa-check-circle"></i> Missatge enviat correctament.</p>';
							$success .= '<p>Gràcies per la teva atenció, <b>' . utf8_encode($from_name) . '</b>.';
							$success .= '<br/ ><br/ >Et respondrem el més aviat possible a través de les següents víes de contacte.';
							$success .= '<br/ >Telèfon: <b>' . $from_telf . '</b>';
							$success .= '<br/ >Correu Electrònic: <b>' . $from_email . '</b>.</p>';
	
						}else{
							$success = '<p><i class="fa fa-check-circle"></i> Message sending OK.</p>';
							$success .= '<p>Thanks for your interest, <b>' . utf8_encode($from_name) . '</b>.';
							$success .= "<br/ ><br/ >We'll answer as soon as possible at the following ways.";
							$success .= '<br/ >Phone: <b>' . $from_telf . '</b>';
							$success .= '<br/ >e-Mail: <b>' . $from_email . '</b>.</p>';
						}
					}else{//Not activeQtrans
						$success = '<p><i class="fa fa-check-circle"></i> Mensaje enviado correctamente.</p>';
						$success .= '<p>Gracias por tu atención, <b>' . utf8_encode($from_name) . '</b>.';
						$success .= '<br/ ><br/ >Te responderemos lo antes posible a través de las siguientes vías de contacto:';
						$success .= '<br/ >Teléfono: <b>' . $from_telf . '</b>';
						$success .= '<br/ >Correo Electrónico: <b>' . $from_email . '</b>.</p>';
					}
					//Tornem a enviar una còpia del missatge a l'usuari ************************************************************************
					//$Message2 & $Subject2
					$subject2 = utf8_decode($subject_copy);
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
					$message2 .= " \r\n";
					// Enviamos 2º mensaje al usuario
					//PROGRAMACIÓ PHP MAILER *************************************/
					$mail2 = new phpmailer();
					//Definimos las propiedades 
					//Con PluginDir le indicamos a la clase phpmailer donde se 
					$mail2->PluginDir = $smtp_plugindir;
					//Con la propiedad Mailer le indicamos que vamos a usar un servidor smtp
					$mail2->Mailer = "smtp";
					//Asignamos a Host el nombre de nuestro servidor smtp
					$mail2->Host = $smtp_host;
					//Le indicamos que el servidor smtp requiere autenticación
					$mail2->SMTPAuth = true;
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
								$success .= '<p><br/>Recibirá una copia de su mensaje a la dirección de correo que nos ha indicado.';
								$success .= '<br/>Si no lo encuentra revise su carpeta de SPAM.<br/></p>';
							}elseif( qtrans_getLanguage() == 'ca' ){
								$success .= '<p><br/>Rebrà una còpia del seu missatge a l\'adreça de correu especificada.';
								$success .= '<br/>Si no el troba revisi la seva carpeta d\'SPAM.<br/></p>';
		
							}else{
								$success .= '<p><br/>A copy of your message have been sent to the adress you specified.';
								$success .= '<br/>If you can\t find it check your SPAM folder.<br/></p>';
							}
						}else{//Not activeQtrans
							$success .= '<p><br/>Recibirá una copia de su mensaje a la dirección de correo que nos ha indicado.';
							$success .= '<br/>Si no lo encuentra revise su carpeta de SPAM.<br/></p>';
						}
					}
					echo '<div class="msg msg_success">' . $success . '</div>';
				}
			}else{
				if (function_exists('qtrans_getLanguage')){
					if( qtrans_getLanguage() == 'es' ){ 
						$error = '<p><i class="fa fa-exclamation-triangle"></i>Por favor rellena todos los campos.</p>';
					}elseif( qtrans_getLanguage() == 'ca' ){
						$error = '<p><i class="fa fa-exclamation-triangle"></i>Per favor omple tots els camps.</p>';
					}else{
						$error = '<p><i class="fa fa-exclamation-triangle"></i>Please fill all the fields.</p>';
					}
				}else{//Not activeQtrans
					$error = '<p><i class="fa fa-exclamation-triangle"></i>Por favor rellena todos los campos.</p>';
				}
			}
		}
	}
?>
<!-- FORM Fields **********************************************************************-->
<a name="form_contacto" id="form_contacto"></a>
<?php 
	//Nombre
	if (isset($_POST['fnombre'])){
		$name_filled = $from_name;
	} else {
		$name_filled = '';
	}
	//Email
	if (isset($_POST['femail'])){
		$email_filled = $from_email;
	} else {
		$email_filled = '';
	}
	//Telefono
	if (isset($_POST['ftelf'])){
		$telf_filled = $from_telf;
	} else {
		$telf_filled = '';
	}
	//HoneyPot
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
	if (isset($_POST['fhoney'])&&!empty($_POST['fhoney'])){
		$honey_filled = $honey_alert;
	} else {
		$honey_filled = '';
	}
//Nomes mostra el form si no s'ha enviat o no hi ha error 2 (SMTP error)
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
<form action="#form_contacto" method="post" name="form" id="form" class="form_foot" onSubmit="_gaq.push(['_trackEvent', 'Formulario', 'Enviar'])">
	<ul>
		<li>
        	<label class="mandatory" for="fnombre"><?php echo $nombre; ?></label>
			<input name="fnombre" type="text" id="fnombre" class="required <?php if($_POST && empty($from_name)){echo 'error';}?>" value="<?php echo $name_filled; ?>" placeholder="<?php echo $nombre; ?>" autocorrect="off"/>
        </li>
		<li>
        	<label class="mandatory" for="femail"><?php echo $email; ?></label>
			<input name="femail" type="text" id="femail" class="required email <?php if($_POST && empty($from_email)){echo 'error';}?>" value="<?php echo $email_filled; ?>" placeholder="<?php echo $email; ?>" autocapitalize="off"/>
        </li>
        <li>
            <label class="mandatory" for="ftelf"><?php echo $telefono; ?></label>
			<input name="ftelf" type="text" id="ftelf" class="required digits <?php if($_POST && empty($from_tlf)){echo 'error';}?>" value="<?php echo $telf_filled; ?>" placeholder="<?php echo $telefono; ?>" />
        </li>
		<!-- The following field is for robots only, invisible to humans: -->
		<li class="li_honey">
        	<label for="honey"><?php echo $honeypot; ?></label>
			<input name="fhoney" type="text" id="fhoney" value="<?php echo $honey_filled; ?>"/ >
        </li>
		<li class="li_bttn_foot">
        	<input name="send" type="submit" class="calltoact bluebutton" value="<?php echo $enviar; ?>"/>
            <span id="form_loader" class="hidden">
            	<img src="<?php echo get_stylesheet_directory_uri() . '/images/layout/form_loader1.gif" alt="loading'; ?>" />
                <img src="<?php echo get_stylesheet_directory_uri() . '/images/layout/form_loader2.gif" alt="loading'; ?>" />
            </span>
        </li>
	</ul>
</form>
<?php } //End if $success && $error2 ?>