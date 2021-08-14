<?php
/**
 * Formulario de Contacto con comprobación de campos
 * Utilizar conjuntamente con validate.js
 * 

*/
?> 
<!-- Form PHP **********************************************************************-->
<a name="form_contacto" id="form_contacto"></a>             
<?php
	if($_POST){
		if( qtrans_getLanguage() == 'es' ){ 
			$to = 'info@drag.es';
		}elseif( qtrans_getLanguage() == 'ca' ){
			$to = 'info@drag.cat';
		}else{
			$to = 'info@drag.cat';
		}
		$subject = utf8_decode('Petició de contacte desde la web del DRAG');
		$from_name = utf8_decode($_POST['fnombre']);
		$from_email = $_POST['femail'];
		$from_telf = $_POST['ftelf'];
		$message = "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++" . " \r\n";
		$message .= utf8_decode("PETICIÓ DE CONTACTE desde la web del DRAG amb data: ") . date('d/m/Y H:i', time()) . " \r\n";
		$message .= "-----------------------------------------------------------------------------------------" . " \r\n";
		$message .= " \r\n";
		$message .= "Nom: " . $from_name . " \r\n";
		$message .= " \r\n";
		$message .= "e-mail: " . $from_email . " \r\n";
		$message .= " \r\n";
		$message .= "Tlf: " . $from_telf . " \r\n";
		$message .= " \r\n";
		$message .= "Idioma preferit: ";
		if( qtrans_getLanguage() == 'es' ){ 
			$message .= "Castellano" . " \r\n";
		}elseif( qtrans_getLanguage() == 'ca' ){
			$message .= utf8_decode("Català") . " \r\n";
		}else{
			$message .= "English" . " \r\n";
		}
		$message .= " \r\n";
		$message .= "........................................................................................." . " \r\n";
		$robotest = $_POST['fhoney'];
		if($robotest){
			$error = "<p><i class='icon-github-alt'></i>&nbsp;&nbsp;Nice try robot, nice try...</p>";
		}else{
			if($from_name && $from_email && $from_telf){
				$header = "From:" . $from_email . " \r\n";
				$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
				$header .= "Mime-Version: 1.0 \r\n";
				$header .= "Content-Type: text/plain";
				if(mail($to, $subject, $message, $header)){
					if( qtrans_getLanguage() == 'es' ){ 
						$success = '<p><i class="icon-ok"></i><b>Mensaje enviado correctamente.</b></p>.';
						$success .= '<p class="thin">Contactaremos contigo lo antes posible. <br/ >Muchas gracias.</p>';
                    }elseif( qtrans_getLanguage() == 'ca' ){
						$success = "<p><i class='icon-ok'></i><b>Missatge enviat correctament.</b></p>";
						$success .= '<p class="thin">Et contactarem el més aviat possible. <br/ >Moltes gràcies.</p>';

                    }else{
						$success = "<p><i class='icon-ok'></i><b>We've recieved your message.</b></p>";
						$success .= "<p class='thin'>We'll call you back as soon as possible. <br/ >Thanks.</p>";
					}
				}else{
					if( qtrans_getLanguage() == 'es' ){ 
						$error2 = '<p><i class="icon-remove-sign"></i><b>ERROR en el envío del mensaje.</b><p>';
						$error2 .= '<p class="thin">Inténtalo de nuevo más tarde.</p>';
					}elseif( qtrans_getLanguage() == 'ca' ){
						$error2 = "<p><i class='icon-remove-sign'></i><b>ERROR en l'enviament del missatge.</b></p>";
						$error2 .= '<p class="thin">Torna-ho a intentar en una estona.</p>';
					}else{
						$error2 = '<p><i class="icon-remove-sign"></i><b>Sending message ERROR.</b></p>';
						$error2 .= '<p class="thin">Try it again in a few minutes.</p>';
					}
				}
			}else{
				if( qtrans_getLanguage() == 'es' ){ 
					$error = '<p><i class="icon-warning-sign"></i>Por favor rellena todos los campos.</p>';
				}elseif( qtrans_getLanguage() == 'ca' ){
					$error = '<p><i class="icon-warning-sign"></i>Per favor omple tots els camps.</p>';
				}else{
					$error = '<p><i class="icon-warning-sign"></i>Please fill all the fields.</p>';
				}
			}
		}
		if($error){
			echo '<div class="msg msg_error">' . $error . '</div>';
		}elseif($error2){
			echo '<div class="msg msg_error">' . $error2 . '</div>';
		}elseif($success){
			echo '<div class="msg msg_success">' . $success . '</div>';}
	}
?>
<!-- FORM Fields **********************************************************************-->
<?php 
	if (isset($_POST['fnombre'])){
		$name_filled = $from_name;
	} else {
		$name_filled = '';
	}
	if (isset($_POST['femail'])){
		$email_filled = $from_email;
	} else {
		$email_filled = '';
	}
	if (isset($_POST['ftelf'])){
		$telf_filled = $from_telf;
	} else {
		$telf_filled = '';
	}
?>
<!-- Test Missatge d'Errors  
<div class="msg msg_success">
	<p><i class="icon-ok"></i> <b>Mensaje enviado correctamente</b>.</p>
    <p class="thin">Gracias por tu atención, <b>Ola k ase</b>.
    <br/ ><br/ >Te responderemos en menos de 72 horas a través de las siguientes vías de contacto:
    <br/ >Teléfono: <b> 660171337 </b>
    <br/ >Correo Electrónico: <b>ola@kase.es</b>.<br/ ><br/ ></p>
</div>
<div class="msg msg_error"><p><i class="icon-remove-sign"></i><b>ERROR en l'enviament del missatge.</b></p><p class="thin">Per favor torna-ho a inténtar en una estona.</p></div>
<div class="msg msg_error"><p><i class="icon-warning-sign"></i>Por favor rellena los campos <em>marcados con asterisco (*)</em>.</p></div>-->
<form action="#form_contacto" method="post" name="form" id="form" class="form_foot<?php if (isset($success)){ echo ' hidden'; }?>" onSubmit="_gaq.push(['_trackEvent', 'Formulario', 'Enviar'])">
	<ul>
		<li><label class="mandatory" for="fnombre"><?php if( qtrans_getLanguage() == 'es' ){?>Nombre y Apellidos <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Nom i Cognoms <?php }else { ?>Name and Surname <?php } ?></label>
		<input name="fnombre" type="text" id="fnombre" class="required" value="<?php echo $name_filled; ?>" autocorrect="off"/></li>
		<li><label class="mandatory" for="femail"><?php if( qtrans_getLanguage() == 'es' ){?>Correo-e <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Correu-e <?php }else { ?>e-Mail <?php } ?></label>
		<input name="femail" type="text" id="femail" class="required email" value="<?php echo $email_filled; ?>" autocapitalize="off"/></li>
        <li><label class="mandatory" for="ftelf"><?php if( qtrans_getLanguage() == 'es' ){?>Teléfono <?php }elseif( qtrans_getLanguage() == 'ca' ){?>Telèfon <?php }else { ?>Phone <?php } ?></label>
		<input name="ftelf" type="text" id="ftelf" class="required digits" value="<?php echo $telf_filled; ?>" /></li>
		<!-- The following field is for robots only, invisible to humans: -->
		<li class="li_honey"><label for="honey"><?php if( qtrans_getLanguage() == 'es' ){?>¡NO rellenes este campo!<?php }elseif( qtrans_getLanguage() == 'ca' ){?>NO omplis aquest camp!<?php }else { ?>Leave this fiels blank<?php } ?></label>
		<input name="fhoney" type="text" id="fhoney"/ ></textarea></li>
		<li class="li_bttn_foot"><input name="send" type="submit" class="calltoact bluebutton" value="<?php if( qtrans_getLanguage() == 'es' ){?>ENVIAR<?php }elseif( qtrans_getLanguage() == 'ca' ){?>ENVIAR<?php }else { ?>CALL ME BACK<?php } ?>"/></li>
	</ul>
</form>