<?php
/**********************************************************************************************
 *
 * Configuración de Usuario para el Formulario de Contacto 
 * 
**********************************************************************************************
Define las variables clave del formulario
*********************************************************************************************/
//
// Configuracion SMTP ********************************
$smtp_plugindir = 'phpmailer/';
$smtp_host = "localhost";
$smtp_port = '25';
//
// ID del Usuario WP - Cliente ***********************
$editor_id = 2;
// Mail de Formularios *******************************
$form_mail = get_the_author_meta( 'form_email', $editor_id );
if (isset($form_mail) && $form_mail != ''){ // Desde BackEnd
	$smtp_user = $form_mail; 
}else{ //Manual
	$smtp_user ='';
}
// Password Mail de Formularios **********************
$form_mail_pass = get_the_author_meta( 'form_email_pass', $editor_id );
$form_mail_key = get_the_author_meta( 'form_email_key', $editor_id );
$form_mail_iv = get_the_author_meta( 'form_email_iv', $editor_id );
if (isset($form_mail_pass) && $form_mail_pass != ''){ // ACF
	$encrypt_method = "AES-256-CBC";
	$secret_key = $form_mail_key;
	$secret_iv = $form_mail_iv;
	// hash
	$key = hash('sha256', $secret_key);
	// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
	$iv = substr(hash('sha256', $secret_iv), 0, 16);
	// Descodifiquem
	$smtp_pass = openssl_decrypt(base64_decode($form_mail_pass), $encrypt_method, $key, 0, $iv);  
}else{ //Manual
	$smtp_pass = '';
}
// Mail de Empresa **********************************
$company_mail_acf = get_the_author_meta( 'company_email', $editor_id );
if (isset($company_mail_acf) && $company_mail_acf != ''){
	$company_mail = $company_mail_acf;
}else{ //Manual
	$company_mail ='';
}
//
// Cridem al phpMailer i l'extensio SMTP ************
require($smtp_plugindir . "class.phpmailer.php");
require($smtp_plugindir . "class.smtp.php");
?>