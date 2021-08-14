<?php
/**
 * Formulario de Contacto con comprobación de campos
 * Utilizar conjuntamente con validate.js
 * 

*/
?> 
<!-- Form PHP **********************************************************************-->
<?php
	if($_POST){
		if( qtrans_getLanguage() == 'es' ){ 
			$to = 'info@drag.es';
		}elseif( qtrans_getLanguage() == 'ca' ){
			$to = 'info@drag.cat';
		}else{
			$to = 'info@drag.cat';
		}
		$subject = 'Consulta desde la web del DRAG';
		$from_name = utf8_decode($_POST['fnombre']);
		$from_telf = $_POST['ftelf'];
		$from_email = $_POST['femail'];
		$from_poblacion = utf8_decode($_POST['fpoblacion']);
		$from_provincia = utf8_decode($_POST['fprovincia']);
		$from_cuerpo = utf8_decode($_POST['fcuerpo']);
		$from_consulta = $_POST['fconsulta'];
		$message = "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++" . " \r\n";
		$message .= utf8_decode("Consulta desde la web del DRAG amb DATA: ") . date('d/m/Y H:i', time()) . " \r\n";
		$message .= "-----------------------------------------------------------------------------------------" . " \r\n";
		$message .= "De: " . $from_name . " \r\n";
		$message .= "Tlf: " . $from_telf . " \r\n";
		$message .= "e-mail: " . $from_email . " \r\n";
		$message .= "Idioma preferit: ";
		if( qtrans_getLanguage() == 'es' ){ 
			$message .= "Castellano" . " \r\n";
		}elseif( qtrans_getLanguage() == 'ca' ){
			$message .= utf8_decode("Català") . " \r\n";
		}else{
			$message .= "English" . " \r\n";
		}
		$message .= "-----------------------------------------------------------------------------------------" . " \r\n";
		$message .= utf8_decode("Població: ") . $from_poblacion . " \r\n";
		$message .= utf8_decode("Província: ") . $from_provincia . " \r\n";
		$message .= utf8_decode("Cos de Seguretat / Emergències: ") . $from_cuerpo . " \r\n";
		$message .= "........................................................................................." . " \r\n";
		$message .= "Consulta:  \r\n";
		$message .= utf8_decode($from_consulta) . " \r\n";
		$message .= " \r\n";
		$message .= "+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++" . " \r\n";
		$robotest = $_POST['fhoney'];
		if($robotest){
			$error = "<p><i class='icon-github-alt'></i>&nbsp;&nbsp;Nice try robot, nice try...</p>";
		}else{
			if($from_name && $from_email && $from_telf && $from_consulta){
				$header = "From:" . $from_email . " \r\n";
				$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
				$header .= "Mime-Version: 1.0 \r\n";
				$header .= "Content-Type: text/plain";
				if(mail($to, $subject, $message, $header)){
					if( qtrans_getLanguage() == 'es' ){ 
						$success = '<p><i class="icon-ok"></i> Mensaje enviado correctamente.</p>';
						$success .= '<p class="thin">Gracias por tu atención, <b>' . utf8_encode($from_name) . '</b>.';
						$success .= '<br/ ><br/ >Te responderemos lo antes posible a través de las siguientes vías de contacto:';
						$success .= '<br/ >Teléfono: <b>' . $from_telf . '</b>';
						$success .= '<br/ >Correo Electrónico: <b>' . $from_email . '</b>.</p>';
                    }elseif( qtrans_getLanguage() == 'ca' ){
						$success = '<p><i class="icon-ok"></i> Missatge enviat correctament.</p>';
						$success .= '<p class="thin">Gràcies per la teva atenció, <b>' . utf8_encode($from_name) . '</b>.';
						$success .= '<br/ ><br/ >Et respondrem el més aviat possible a través de les següents víes de contacte:';
						$success .= '<br/ >Telèfon: <b>' . $from_telf . '</b>';
						$success .= '<br/ >Correu Electrònic: <b>' . $from_email . '</b>.</p>';

                    }else{
						$success = '<p><i class="icon-ok"></i> Message sending OK.</p>';
						$success .= '<p class="thin">Thanks for your interest, <b>' . utf8_encode($from_name) . '</b>.';
						$success .= "<br/ ><br/ >We'll answer as soon as possible at the following ways";
						$success .= '<br/ >Phone: <b>' . $from_telf . '</b>';
						$success .= '<br/ >e-Mail: <b>' . $from_email . '</b>.</p>';
					}
				}else{
					if( qtrans_getLanguage() == 'es' ){ 
						$error2 = '<p><i class="icon-remove-sign"></i><b>ERROR en el envío del mensaje.</b><p>';
						$error2 .= '<p class="thin">Ha habido un problema durante la recepción de tu mensaje.';
						$error2 .= '<br/>Por favor inténtalo de nuevo más tarde.</p>';
					}elseif( qtrans_getLanguage() == 'ca' ){
						$error2 = "<p><i class='icon-remove-sign'></i><b>ERROR en l'enviament del missatge.</b></p>";
						$error2 .= '<p class="thin">Hem tingut un problema durant la recepció del teu missatge.';
						$error2 .= '<br/>Per favor Torna-ho a intentar en una estona.</p>';
					}else{
						$error2 = '<p><i class="icon-remove-sign"></i><b>Sending message ERROR.</b></p>';
						$error2 .= '<p class="thin">Please try it again in a few minutes.</p>';
					}
				}
			}else{
				if( qtrans_getLanguage() == 'es' ){ 
					$error = '<p><i class="icon-warning-sign"></i>Por favor rellena los campos <em>marcados con asterisco (*)</em>.</p>';
				}elseif( qtrans_getLanguage() == 'ca' ){
					$error = '<p><i class="icon-warning-sign"></i>Per favor omple tots els camps <em>marcats amb asterisc (*)</em>.</p>';
				}else{
					$error = '<p><i class="icon-warning-sign"></i>Please fill all the <em>mandatory fields (*)</em>.</p>';
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
	if (isset($_POST['fempresa'])){
		$empresa_filled = $from_empresa;
	} else {
		$empresa_filled = '';
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
	if (isset($_POST['fconsulta'])){
		$consulta_filled = $from_consulta;
	} else {
		$consulta_filled = '';
	}
	if (isset($_POST['fpoblacion'])){
		$poblacion_filled = $from_poblacion;
	} else {
		$poblacion_filled = '';
	}
	if (isset($_POST['fprovincia'])){
		$provincia_filled = $from_provincia;
	} else {
		$provincia_filled = '';
	}
	if (isset($_POST['fcuerpo'])){
		$cuerpo_filled = $from_cuerpo;
	} else {
		$cuerpo_filled = '';
	}
?>
<!-- Test Missatge d'Errors  
	<div class="msg msg_success">
	<p><i class="icon-ok"></i> <b>Mensaje enviado correctamente</b>.</p>
    <p class="thin">Gracias por tu atención, <b>Ola k ase</b>.
    <br/ ><br/ >Te responderemos en menos de 72 horas a través de las siguientes vías de contacto:
    <br/ >Teléfono: <b> 666666 </b>
    <br/ >Correo Electrónico: <b>ola@kase.es</b>.<br/ ><br/ ></p>
</div>
<div class="msg msg_error"><p><i class="icon-remove-sign"></i><b>ERROR en l'enviament del missatge.</b></p><p class="thin">Per favor torna-ho a inténtar en una estona.</p></div>
<div class="msg msg_error"><p><i class="icon-warning-sign"></i>Por favor rellena los campos <em>marcados con asterisco (*)</em>.</p></div> -->
<form action="#form_contacto" method="post" name="form" id="form" class="form msg<?php if (isset($success)){ echo ' hidden'; }?>" onSubmit="_gaq.push(['_trackEvent', 'Formulario', 'Enviar'])">
	<h4>
		<?php if( qtrans_getLanguage() == 'es' ){?>FORMULARIO DE CONTACTO
        <?php }elseif( qtrans_getLanguage() == 'ca' ){?>FORMULARI DE CONTACTE
        <?php }else { ?>CONTACT FORM
        <?php } ?>
    </h4>
    <div class="form_ul_wrap">
        <ul class="contact_form_mandatory">
            <li><label for="fnombre" class="mandatory"><?php if( qtrans_getLanguage() == 'es' ){?>* Nombre y Apellidos<?php }elseif( qtrans_getLanguage() == 'ca' ){?>* Nom i Cognoms<?php }else { ?>* Name and Surname<?php } ?></label>
            <input name="fnombre" type="text" id="fnombre" class="required" value="<?php echo $name_filled; ?>" autocorrect="off"/></li>
            <li><label for="ftelf" class="mandatory"><?php if( qtrans_getLanguage() == 'es' ){?>* Teléfono<?php }elseif( qtrans_getLanguage() == 'ca' ){?>* Telèfon<?php }else { ?>* Phone<?php } ?></label>
            <input name="ftelf" type="text" id="ftelf" class="required digits" value="<?php echo $telf_filled; ?>" /></li>
            <li><label for="femail" class="mandatory"><?php if( qtrans_getLanguage() == 'es' ){?>* Correo electrónico<?php }elseif( qtrans_getLanguage() == 'ca' ){?>* Correu electrònic<?php }else { ?>* e-Mail<?php } ?></label>
            <input name="femail" type="text" id="femail" class="required email" value="<?php echo $email_filled; ?>" autocapitalize="off"/></li>
        </ul>
        <ul class="contact_form_optional">
            <li><label for="fpoblacion"><?php if( qtrans_getLanguage() == 'es' ){?>Población<?php }elseif( qtrans_getLanguage() == 'ca' ){?>Població<?php }else { ?>City<?php } ?></label>
            <input name="fpoblacion" type="text" id="fpoblacion" class="" value="<?php echo $poblacion_filled; ?>" autocorrect="off"/></li>
            <li><label for="fprovincia"><?php if( qtrans_getLanguage() == 'es' ){?>Provincia<?php }elseif( qtrans_getLanguage() == 'ca' ){?>Província<?php }else { ?>State<?php } ?></label>
            <input name="fprovincia" type="text" id="fprovincia" class="" value="<?php echo $provincia_filled; ?>" autocorrect="off"/></li>
            <li><label for="fpcuerpo"><?php if( qtrans_getLanguage() == 'es' ){?>Cuerpo de Seguridad / Emergencias<?php }elseif( qtrans_getLanguage() == 'ca' ){?>Cos de Seguretat / Emergències<?php }else { ?>Security / Emergency<?php } ?></label>
            <input name="fcuerpo" type="text" id="fcuerpo" class="" value="<?php echo $cuerpo_filled; ?>" autocorrect="off"/></li>
        </ul>
        <div class="clearboth">&nbsp;</div>
        <ul class="contact_form_closing">
            <li class="li_consulta"><label for="fconsulta" class="mandatory"><?php if( qtrans_getLanguage() == 'es' ){?>* Consulta<?php }elseif( qtrans_getLanguage() == 'ca' ){?>* Consulta<?php }else { ?>* Your Query<?php } ?></label>
            <textarea name="fconsulta" id="fconsulta" type="text" class="required" /><?php echo $consulta_filled; ?></textarea></li>
            <!-- The following field is for robots only, invisible to humans: -->
            <li class="li_honey"><label for="honey"><?php if( qtrans_getLanguage() == 'es' ){?>¡NO rellenes este campo!<?php }elseif( qtrans_getLanguage() == 'ca' ){?>NO omplis aquest camp!<?php }else { ?>Leave this field BLANK!<?php } ?></label>
            <input name="fhoney" type="text" id="fhoney"  / ></textarea></li>
            <li class="li_bttn"><input name="send" type="submit" class="calltoact bluebutton" value="<?php if( qtrans_getLanguage() == 'es' ){?>ENVIAR<?php }elseif( qtrans_getLanguage() == 'ca' ){?>ENVIAR<?php }else { ?>SEND<?php } ?>"/></li>
            <li class="li_condiciones"><p><?php if( qtrans_getLanguage() == 'es' ){?>Mediante el envío de este formulario aceptas las <a href="<?php echo get_bloginfo('url') . ('/') . qtrans_getLanguage() . '/drag-legal/' ; ?>" target="_self" title="Condiciones Legales">Condiciones Legales</a>.<?php }elseif( qtrans_getLanguage() == 'ca' ){?>Al enviar aquest formulari acceptes les <a href="<?php echo get_bloginfo('url') . ('/') . qtrans_getLanguage() . '/drag-legal/' ; ?>" target="_self" title="Condicions Legals">Condicions Legals</a>.<?php }else { ?>By sending this message you accept our  <a href="<?php echo get_bloginfo('url') . ('/') . qtrans_getLanguage() . '/drag-legal/' ; ?>" target="_self" title="Legal Terms">Legal Terms</a>.<?php } ?></p></li>
        </ul>
        <div class="clearboth">&nbsp;</div>
	</div>
</form>