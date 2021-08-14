<?php
/**********************************************************************************************
 * <form>
 * Un formulario de Contacto Polivalente
 * 
**********************************************************************************************
VERSION 0.1
*********************************************************************************************
TO DO:
 > Millorar el RegEx de Javascript que filtra els números de telf
*********************************************************************************************/
//
// Configuració SMTP *****************************
$smtp_plugindir = 'phpmailer/';
$smtp_host = ''; //"mail.nextconferencias.com";
//$smtp_port = 587; // Gmail = 587 // Default = 25 or comment line
$smtp_pass = ''; //Contrassenya SMTP
$form_mail = ''; //formulario@empresa.es -> mail de servei pels missatges ( = $smtp_user)
$company_mail = ''; //info@empresa.es -> mail de comunicacion
//
// Cridem al phpMailer i l'extensio SMTP
require($smtp_plugindir . "class.phpmailer.php");
require($smtp_plugindir . "class.smtp.php");
//
// Header Form 
$header_form = '¿Quiere más información?';
$header_form2 = 'Nosotros le contactamos';
$header_robotest = 'Robot gotcha!';
$header_empty_fields = 'Campos Vacíos';
$header_not_valid = 'Error en los campos';
$header_success = 'Mensaje Enviado';
$header_error_smpt = 'Error en el envío';
//
//Noms dels Camps
$nombre = 'Nombre y Apellidos';
$email = 'Correo Electrónico';
$telefono = 'Teléfono';
$consulta = 'Consulta';
$consulta_placeholder = 'Escriba aquí su consulta';
$honeypot = '¡NO rellenes este campo!';
$enviar = 'ENVIAR';
//
//Error validacio dels Camps
$nombre_val_error = '<i class="fa fa-exclamation"></i>&nbsp;Introduce tu Nombre y Apellidos';
$email_val_error = '<i class="fa fa-exclamation"></i>&nbsp;Formato de email incorrecto';
$telefono_val_error = '<i class="fa fa-exclamation"></i>&nbsp;Número de teléfono incorrecto';
$honeypot_val_error = '<i class="fa fa-exclamation"></i>&nbsp;¡NO rellenes este campo!';
//
//Success validacio dels Camps
$nombre_val_success = '<i class="fa fa-check"></i>&nbsp;OK';
$email_val_success = '<i class="fa fa-check"></i>&nbsp;OK';
$telefono_val_success = '<i class="fa fa-check"></i>&nbsp;OK';
//
// Variables de validacio
$valid_name = '0';
$valid_email = '0';
$valid_telf = '0';
?> 
<!-- Form PHP **********************************************************************-->
<?php
if($_POST){
	/*VARIABLES GLOBALS **********************************************************/
	// Usuario
	$smtp_user = $form_mail; 
	//
	// Variables -> Empresa & Missatge ***************************
	//'NEXT Conferencias de Autor'
	//'--------------------------'
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
	$message_noreply = 'NOTA IMPORTANTE: No responda a este mensaje.' . " \r\n";
	$message_noreply .= 'Si quiere consultarnos otra cuestión escríbanos a la dirección: ' . $company_mail;
	//
	// Variables del POST ***************************
	$from_name = utf8_decode($_POST['fnombre']);
	$from_email = $_POST['femail'];
	$from_telf = $_POST['ftelf'];
	//$from_consulta = utf8_decode($_POST['fconsulta']);
	//
	// Missatge ***************************
	$message = " \r\n";
	$message .= $subject . $subject_date . date('d/m/Y H:i', time()+7200) . " \r\n"; // Sumem 2h pq el servidor esta en GMT +0
	$message .= $subject_undr . " \r\n";
	$message .= utf8_decode($nombre . ": ") . $from_name . " \r\n";
	$message .= utf8_decode($telefono . ": ") . $from_telf . " \r\n";
	$message .= utf8_decode($email . ": ") . $from_email . " \r\n";
	$message .= utf8_decode($consulta . ": ") . " \r\n";
	//$message .= $from_consulta . " \r\n";
	$message .= " \r\n";
	//
	// Validacio de camps complerts
	//Nombre
	if (strlen($from_name) > 2){$valid_name = '2';}
	else{$valid_name = '1';}
	//Email
	if (filter_var($from_email, FILTER_VALIDATE_EMAIL)) {$valid_email = '2';}
	else{$valid_email = '1';}
	//Telefono
	if (preg_match("/^(?:\d[- ().+]*){9}$/",$from_telf)) {
		$telf_clean = preg_replace('/[^0-9]/', '', $from_telf);
		$telf_filled = preg_replace('/([0-9]{3})([0-9]{2})([0-9]{2})([0-9]{2})/', '$1 $2 $3 $4', $telf_clean);
		$valid_telf = '2';
	}
	else{$valid_telf = '1';}
	//
	// Control HoneyPot
	$robotest = $_POST['fhoney'];
	if($robotest){
		$error_robotest = "<p><span class='fa fa-android'></span>&nbsp;&nbsp;<em>Nice try robot, nice try...</em></p>";
	}else{ //No honeypot
		if($from_name && $from_email && $from_telf){ //Camps omplerts
			if($valid_name == 2 && $valid_email == 2 && $valid_telf == 2){ //Camps Correctes
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
				//Secure protocol for gMail
				//$mail->SMTPSecure = "tls";
				// Le indicamos el puerto -> Gmail = 587 // Default = 25 or comment line
				//$mail->Port = $smtp_port;
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
					$error_smpt = '<p><span class="fa fa-times-circle"></span>&nbsp;&nbsp;<em>ERROR en el envío del mensaje.</em><p>';
					$error_smpt .= '<p>Ha habido un problema durante la recepción de tu mensaje.</p>';
					$error_smpt .= '<p>Puedes contactarnos a través del email:';
					$error_smpt .= '<br/><b>' . $company_mail . '</b></p>';
					$error_smpt .= '<p class="hidden">' . $mail->ErrorInfo . '</p>';
				}else{ //MENSAJE ENVIADO !!!		
					$success = '<p><span class="fa fa-check-circle"></span>&nbsp;&nbsp;<em>Mensaje enviado correctamente.</em></p>';
					$success .= '<p>Gracias por tu atención, <b>' . utf8_encode($from_name) . '</b>.';
					$success .= '<br/ >Te responderemos lo antes posible a través de las siguientes vías de contacto.</p>';
					$success .= '<p>Teléfono: <b>' . $telf_filled . '</b>';
					$success .= '<br/ >Correo Electrónico: <b>' . $from_email . '</b>.</p>';
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
					$message2 .= " \r\n";
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
					if($exito2){ // Avís de 2on missatge enviat*/
					//$success .= '<p>Recibirá una copia de su mensaje a la dirección de correo que nos ha indicado.';
					//$success .= '<br/>Si no lo encuentra revise su carpeta de SPAM.</p>';
					echo '<article class="box-success"><section>' . $success . '</section></article>';
					/*}*/
				} //Fin mensaje ENVIADO
			}else{ //Validacio Incorrecte
				$not_valid = '<p><span class="fa fa-pencil-square-o"></span>&nbsp;&nbsp;<em>Por favor corrige los campos marcados en rojo.</em></p>';
			}
		}else{ //Camps buits
			$empty_fields = '<p><span class="fa fa-exclamation-triangle"></span>&nbsp;&nbsp;<em>Por favor rellena todos los campos.</em></p>';
		}
	}
}
?>
<!-- FORM **********************************************************************-->
<a name="form_anchor" id="form_anchor"></a>
<article id="form_wrap" class="">
<?php 
//Retorn de Variables
//
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
	if (preg_match("/^(?:\d[- ().+]*){9}$/",$from_telf)) {
		$telf_clean = preg_replace('/[^0-9]/', '', $from_telf);
		$telf_filled = preg_replace('/([0-9]{3})([0-9]{2})([0-9]{2})([0-9]{2})/', '$1 $2 $3 $4', $telf_clean);
	}else{
	$telf_filled = $from_telf;
	}
} else {
	$telf_filled = '';
}
//Consulta
if (isset($_POST['fconsulta'])){
	$consulta_filled = $from_consulta;
} else {
	$consulta_filled = '';
}
//HoneyPot
$honey_alert = '¡Borra este texto!';
if (isset($_POST['fhoney'])&&!empty($_POST['fhoney'])){
	$honey_filled = $honey_alert;
} else {
	$honey_filled = '';
}
// FORM RENDERING ******************************************************
//
//Mostra el form si no s'ha enviat o no hi ha error 2 (SMTP error)
if (!isset($success) && !isset($error_smpt)){ ?>
	<?php if ( isset($robotest) || isset($empty_fields) || isset($not_valid) ){ 
		if ( isset($error_robotest)){$error_message = $error_robotest; $error_header = $header_robotest;}
		elseif ( isset($empty_fields)){$error_message = $empty_fields; $error_header = $header_empty_fields;}
		elseif ( isset($not_valid)){$error_message = $not_valid; $error_header = $header_not_valid;}
		//echo '<header><h4>' . $error_header . '</h4></header><section><article class="box box-error"><section>' . $error_message . '</section></article>';
		echo '<section><article class="box box-error"><section>' . $error_message . '</section></article>';
	}else{// Header Form?>
	<header><h4><?php echo $header_form; ?></h4><p><?php echo $header_form2; ?></p></header>
	<section>
	<?php } //end if form header
		//
		// Tester del Missatge d'Errors
		$testerror = '2'; 
		if ($testerror == 1){
			$success = '<p><span class="fa fa-check-circle"></span>&nbsp;&nbsp;<em>Mensaje enviado correctamente.</em></p>';
			$success .= '<p>Gracias por tu atención, <b>[Nombre del Usuario]</b>.';
			$success .= '<br/ >Te responderemos lo antes posible a través de las siguientes vías de contacto.</p>';
			$success .= '<p>Teléfono: <b>[Telefono del Usuario]</b>';
			$success .= '<br/ >Correo Electrónico: <b>[email@usuario.es]</b>.</p>';
			$success .= '<p>Recibirá una copia de su mensaje a la dirección de correo que nos ha indicado.';
			$success .= '<br/>Si no lo encuentra revise su carpeta de SPAM.<br/></p>';
			echo '<article class="box-success"><section>' . $success . '</section></article>';
			$error1 = '<p><span class="fa fa-exclamation-triangle"></span>&nbsp;&nbsp;<em>Por favor rellena todos los campos.</em></p>';
			echo '<article class="box-error"><section>' . $error1 . '</section></article>';
			$error2 = '<p><span class="fa fa-times-circle"></span>&nbsp;&nbsp;<em>ERROR en el envío del mensaje.</em><p>';
			$error2 .= '<p>Ha habido un problema durante la recepción de tu mensaje.</p>';
			$error2 .= '<p>Puedes contactarnos a través del email:';
			$error2 .= '<br/><b>[company@email.es]</b></p>';
			$error2 .= '<p class="hidden">[Mail error info]</p>';
			echo '<article class="box-error"><section>' . $error2 . '</section></article>';
			$errorrobotest = "<p><span class='fa fa-android'></span>&nbsp;&nbsp;<em>Nice try robot, nice try...</em></p>";
			echo '<article class="box-error"><section>' . $errorrobotest . '</section></article>';
			$not_valid = '<p><span class="fa fa-pencil-square-o"></span>&nbsp;&nbsp;<em>Por favor corrige los campos marcados.</em></p>';
			echo '<article class="box-error"><section>' . $not_valid . '</section></article>';
		}
		// Test validation vars
		// echo 'Name: ' . $valid_name . '// email: ' . $valid_email . '// Phone: ' . $valid_telf;
		//
		?>
		<form action="#form_anchor" method="post" name="form" id="form" class="form_foot">
		<!-- <form action="#form_anchor" method="post" name="form" id="form" class="form_foot" onSubmit="_gaq.push(['_trackEvent', 'Formulario', 'Enviar'])"> -->
			<ul>
				<li class="form_nombre <?php if($_POST){ if ( empty($from_name) || $valid_name == 1 ){echo 'error';}elseif($valid_name == 2){echo 'valid';}}?>">
					<label class="mandatory" for="fnombre"><?php echo $nombre;
					if ($valid_name == 1){echo '<span>' . $nombre_val_error . '</span>';}elseif($valid_name == 2){echo '<span>' . $nombre_val_success . '</span>';}?>
				</label>
					<input name="fnombre" type="text" id="fnombre" class="" value="<?php echo $name_filled; ?>" placeholder="<?php echo $nombre; ?>" autocorrect="off"/>
				</li>
				<li class="form_mail <?php if($_POST){ if ( empty($from_email) || $valid_email == 1 ){echo 'error';}elseif($valid_email == 2){echo 'valid';}}?>">
					<label class="mandatory" for="femail"><?php echo $email;
					if ($valid_email == 1){echo '<span>' . $email_val_error . '</span>';}elseif($valid_email == 2){echo '<span>' . $email_val_success . '</span>';} ?>
				</label>
					<input name="femail" type="text" id="femail" class="" value="<?php echo $email_filled; ?>" placeholder="<?php echo $email; ?>" autocapitalize="off"/>
				</li>
				<li class="form_telf <?php if($_POST){ if ( empty($from_telf) || $valid_telf == 1 ){echo 'error';}elseif($valid_telf == 2){echo 'valid';}}?>">
					<label class="mandatory" for="ftelf"><?php echo $telefono;
					if ($valid_telf == 1){echo '<span>' . $telefono_val_error . '</span>';}elseif($valid_telf == 2){echo '<span>' . $telefono_val_success . '</span>';} ?>
				</label>
					<input name="ftelf" type="text" id="ftelf" class="" value="<?php echo $telf_filled; ?>" placeholder="<?php echo $telefono; ?>" />
				</li>
				<?php /*
				<li class="form_consulta">
					<label for="fconsulta"><?php echo $consulta; ?></label>
					<textarea name="fconsulta" id="fconsulta" type="text" placeholder="<?php echo $consulta_placeholder; ?>" /><?php echo $consulta_filled; ?></textarea>
				</li>
				*/ ?>
				<!-- The following field is for robots only, invisible to humans: -->
				<li class="form_honey <?php if($_POST && !empty($honey_filled)){echo 'error';} ?>">
					<label for="fhoney"><?php echo $honeypot;
						if ($_POST && !empty($honey_filled)){echo '<span>' . $honeypot_val_error . '</span>';}?>	
					</label>
					<input name="fhoney" type="text" id="fhoney" value="<?php echo $honey_filled; ?>"/ >
				</li>
				<li class="form_bttn">
					<input name="send" type="submit" class="button button-primary" value="<?php echo $enviar; ?>"/>
					<span id="form_loader" class="hidden">
						<img src="images/layout/form_loader1.gif" alt="loading" />
					<img src="images/layout/form_loader2.gif" alt="loading" />
					</span>
				</li>
			</ul>
			<?php // Testing CSS buttons -> duplicar estils a #form ul li.form_bttn input.button i #form ul li.form_bttn input.button-primary
			echo '<span class="button">I\'m a Button</span>&nbsp;&nbsp;<span class="button button-primary">I\'m a Primary!</span>'; ?>
		</form>
	</section>
<?php }else{ //If $success && $error2 
	if (isset($success)){
		//echo '<header><h4>' . $header_success . '</h4></header><section><article class="box box-success"><section>' . $success . '</section></article>';
		echo '<section><article class="box-success"><section>' . $success . '</section></article>';
	}elseif (isset($error_smpt)){
		//echo '<header><h4>' . $header_error_smpt . '</h4></header><section><article class="box box-error"><section>' . $error_smpt . '</section></article>';	
		echo '<section><article class="box-error"><section>' . $error_smpt . '</section></article>';	
	}
} ?>
</article>
<span class="clearboth"></span>