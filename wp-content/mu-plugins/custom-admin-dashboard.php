<?php
/*
Plugin Name: Custom Admin Dashboard 720º
Plugin URI: http://www.720grados.com
Description: NEXT CONFERENCIAS DE AUTOR -> Crea una versión a prueba de DUMMIES para la edición de contenidos en WordPress. 
Version: 3.9.1 A
Author: aMirabet
Author URI: http://www.artur.es
License: GPL2
*/
// LOGIN  **********************************************************************************************************************
//******************************************************************************************************************************
// Personalizar pagina de Login
function custom_login() {
    //Añade una hoja de estilos CSS y condicionales para IE
	echo '<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->';
    echo '<!--[if IE 7]> <html class="lt-ie9 lt-ie8"> <![endif]-->'. "\n";
    echo'<!--[if IE 8]> <html class="lt-ie9"> <![endif]-->' . "\n";
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/custom_admin/custom-admin.css" />';
}
add_action('login_head', 'custom_login');
//
// ADMIN  **********************************************************************************************************************
//******************************************************************************************************************************
//
/* <HEAD> ADMIN ****************************************************************************************************************/
//
// Favicon a l'Admin
//
function admin_favicon() {
	echo '<!-- IE 9 and before ICON ><!-->' . "\n";
	echo '<!--[if (lt IE 9)|(IE 9)]>' . "\n";
	echo '<link rel="shortcut icon"  href="' . get_bloginfo('stylesheet_directory') . '/images/favicon/favicon.ico" /> <![endif]-->' . "\n";
	echo '<!-- Default ShortCut Icon ><!-->' . "\n";
	echo '<link rel="shortcut icon"  href="' . get_bloginfo('stylesheet_directory') . '/images/favicon/favicon.png" />' . "\n";
	echo '<!-- Apple Touch Icon ><!-->' . "\n";
	echo '<link rel="apple-touch-icon"  sizes="57x57" href="' . get_bloginfo('stylesheet_directory') . '/images/favicon/tile114.png"/>' . "\n";
	echo '<link rel="apple-touch-icon"  sizes="114x114" href="' . get_bloginfo('stylesheet_directory') . '/images/favicon/tile114.png"/>' . "\n";
	echo '<link rel="apple-touch-icon"  sizes="72x72" href="' . get_bloginfo('stylesheet_directory') . '/images/favicon/tile144.png"/>' . "\n";
	echo '<link rel="apple-touch-icon"  sizes="144x144" href="' . get_bloginfo('stylesheet_directory') . '/images/favicon/tile144.png"/>' . "\n";
	echo '<!-- ie10 metaTags For Tile ><!-->' . "\n";
	echo '<meta name="msapplication-TileColor" content="#0e1c2d" />' . "\n";
	echo '<meta name="msapplication-TileImage" content="' . get_bloginfo('stylesheet_directory') . '/images/favicon/tile144.png"/>' . "\n";
}
add_action('admin_head', 'admin_favicon');
//
// Carreguem els scripts al <head> i al <footer>
//
function admin_custom_styles($hook) {
	// Registre d'estils
	wp_register_style('customadmin-css', get_bloginfo('stylesheet_directory') . '/custom_admin/custom-admin.css', false, false);
	wp_register_style('customadmin-dashboard-css', plugin_dir_url( __FILE__ ) . 'custom-admin-dashboard/custom-admin-dashboard.css', false, false);
	//Carrega estils
	wp_enqueue_style('customadmin-css');
	wp_enqueue_style('customadmin-dashboard-css');
}
add_action('admin_enqueue_scripts', 'admin_custom_styles');
//
/* FOOTER ADMIN **************************************************************************************************************************************/
//
// Inclou el Logo de 720º enlloc del de WordPress 
//


function my_footer_version() {
	return '<span id="footer_dash_brand"><br/ ><br/ ><br/ ><br/ ><br/ ><br/ ><b>Dash v3.9.1A</b></span>';
	//return '<span id="footer_dash_brand"><br/ ><br/ ><br/ ><img src="' . plugin_dir_url( __FILE__ ) . 'custom-admin-dashboard/720_logo.png" alt="720º" /><i>www.720grados.com</i><b>Dash v3.9.1A</b></span>';
}
add_filter( 'update_footer', 'my_footer_version', 11 );
//
/* Final HEAD & FOOTER ******************************************************************/
//
/* WP BAR *****************************************************************************/
//Modificacio de la Barra superior Flotant
//
// Es personalitza el LOGO mitjançant css
//
//
/* DASHBOARD *****************************************************************************/
//
//
// Elimina Panells del Dashboard
//
function remove_dashboard_meta() {
	remove_action('welcome_panel', 'wp_welcome_panel');
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
}
add_action( 'admin_init', 'remove_dashboard_meta' );
//
/* WIDGETS D'ESCRIPTORI (ACCESSOS DIRECTES) *****************************
*************************************************************************/
//
// La resta de Dashboard Widgets d'acces directe estan al seu corresponent mu-plugin
//
/* Escriptori > Perfil > Crear Widget ************/ //Anulat
/*function reg_ini_profile() {
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$title = 'Perfil';
		}elseif( qtrans_getLanguage() == 'ca' ){
			$title = 'Perfil';
		}else{ //english 
			$title = 'Profile';
		}
	}else{//Not activeQtrans
		$title = 'Perfil';
	}
	wp_add_dashboard_widget('reg_ini_profile', $title, 'wdgt_ini_profile');
}
add_action('wp_dashboard_setup', 'reg_ini_profile');
/* Escriptori > Perfil > Editar Widget ************/ //Anulat
/*function wdgt_ini_profile() {
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$tag = "Edita tu Perfil de Usuario";
		}elseif( qtrans_getLanguage() == 'ca' ){
			$tag = "Edita el teu Perfil d'Usuari";
		}else{ //english 
			$tag = "Edit your User Profile";
		}
	}else{//Not activeQtrans
		$tag = "Edita tu Perfil de Usuario";
	}
	echo '<a class="wdgt_dash wdgt_profile" href="' . admin_url('profile.php') . '"><b>' . $tag . '</b></a>';
}
//
//
/* Escriptori > Comentarios > Crear Widget ************/
function reg_ini_comments() {
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$title = 'Comentarios';
		}elseif( qtrans_getLanguage() == 'ca' ){
			$title = 'Comentaris';
		}else{ //english 
			$title = 'Comments';
		}
	}else{//Not activeQtrans
		$title = 'Comentarios';
	}
	wp_add_dashboard_widget('reg_ini_comments', $title, 'wdgt_ini_comments');
}
add_action('wp_dashboard_setup', 'reg_ini_comments');
/* Escriptori > Comentarios > Editar Widget ************/
function wdgt_ini_comments() {
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$tag = "Modera los comentarios";
		}elseif( qtrans_getLanguage() == 'ca' ){
			$tag = "Modera los comentarios";
		}else{ //english 
			$tag = "Comments Managing";
		}
	}else{//Not activeQtrans
		$tag = "Modera los comentarios";
	}
	echo '<a class="wdgt_dash wdgt_comments" href="' . admin_url('edit-comments.php') . '"><b>' . $tag . '</b></a>';
}
//
/* Escriptori > View Page > Crear Widget ************/
function reg_ini_show() {
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$title = 'Ver la Web';
		}elseif( qtrans_getLanguage() == 'ca' ){
			$title = 'Vés al Web';
		}else{ //english 
			$title = 'View site';
		}
	}else{//Not activeQtrans
		$title = 'Ver la Web';
	}
	wp_add_dashboard_widget('reg_ini_show', $title, 'wdgt_ini_show');
}
add_action('wp_dashboard_setup', 'reg_ini_show');
/* Escriptori > View Page > Editar Widget ************/
function wdgt_ini_show() {
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$tag = "Visita la Página Web";
		}elseif( qtrans_getLanguage() == 'ca' ){
			$tag = "Visita la Pàgina Web";
		}else{ //english 
			$tag = "Preview Site";
		}
	}else{//Not activeQtrans
		$tag = "Visita la Página Web";
	}
	echo '<a class="wdgt_dash wdgt_show" href="' . site_url() . '"><b>' . $tag . '</b></a>';
}
//
//
//* Escriptori > Eventos > Crear Widget ************/
function reg_ini_events() {
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$title = 'Eventos y Conferencias';
		}elseif( qtrans_getLanguage() == 'ca' ){
			$title = 'Events i Conferències';
		}else{ //english 
			$title = 'Events';
		}
	}else{//Not activeQtrans
		$title = 'Eventos y Conferencias';
	}
	wp_add_dashboard_widget('reg_ini_events', $title, 'wdgt_ini_events');
}
add_action('wp_dashboard_setup', 'reg_ini_events');
/* Escriptori > Eventos > Editar Widget ************/
function wdgt_ini_events() {
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$tag = "Crea y Edita Eventos";
		}elseif( qtrans_getLanguage() == 'ca' ){
			$tag = "Crea i Edita Events";
		}else{ //english 
			$tag = "Create and Edit Events";
		}
	}else{//Not activeQtrans
		$tag = "Crea y Edita Eventos";
	}
	echo '<a class="wdgt_dash wdgt_events" href="' . admin_url('edit.php?post_type=tribe_events') . '"><b>' . $tag . '</b></a>';
}
//
// COLUMNES DE LES PÀGINES D'EDICIO ***********************************************
//*********************************************************************************
//
/* COLUMNA MINIATURA IMATGE DESTACADA (a tots els post types & pages)*************/
// Add the column
function tcb_add_post_thumbnail_column($cols){
  $cols['tcb_post_thumb'] = __('Imagen');
  return $cols;
}
// Grab featured-thumbnail size post thumbnail and display it.
function tcb_display_post_thumbnail_column($col, $id){
  switch($col){
    case 'tcb_post_thumb':
      if( function_exists('the_post_thumbnail') )
	    if(has_post_thumbnail()){
          echo the_post_thumbnail( array(50,50) );
      	}else{
		  echo '<img src="' . get_stylesheet_directory_uri() . '/custom_admin/nofeatured_img.gif" />';
		}
	  else
        echo 'xxx';
      break;
  }
}
// Add the posts and pages columns filter. They can both use the same function.
add_filter('manage_posts_columns', 'tcb_add_post_thumbnail_column', 5);
// Hook into the posts an pages column managing. Sharing function callback again.
add_action('manage_posts_custom_column', 'tcb_display_post_thumbnail_column', 5, 2);
//
/* POST TYPE AUTORES *************************************************************/
//
// Amaguem la data, els comentaris i l'autor
function autores_edit_columns($columns){
	unset($columns['comments']);
	unset($columns['author']);
	unset($columns['date']);
	return $columns;
}
add_filter("manage_post_posts_columns", "autores_edit_columns");
//
// Afegim la jerarquia d'autor > Crear columna **********************************
function autores_add_jerarquia($cols){
  $cols['autores_jerarquia'] = __('Jerarquía');
  return $cols;
}
// Afegim la jerarquia d'autor > Contingut
function autores_show_jerarquia($col, $id){
	switch($col){
		case 'autores_jerarquia':
			$jerarquia = get_field('jerarquia_del_autor');
			if( $jerarquia ){
				if (is_sticky( $id )){ echo'<span class="dashicons dashicons-star-filled"></span> | '; }else{ echo'<span class="dashicons dashicons-star-empty"></span> | ';}
				echo $jerarquia;
			}else{
				if (is_sticky( $id )){ echo'<span class="dashicons dashicons-heart"></span>'; }else{ echo'<span class="dashicons dashicons-star-empty"></span>';}
				echo 'X';
			}
	}
}
// Add the posts and pages columns filter. They can both use the same function.
add_filter('manage_post_posts_columns', 'autores_add_jerarquia', 4);
// Hook into the posts an pages column managing. Sharing function callback again.
add_action('manage_post_posts_custom_column', 'autores_show_jerarquia', 4, 2);
//
/* POST TYPE NOTICIAS ************************************************************/
//
// Amaguem l'autor
function news_edit_columns($columns){
	unset($columns['author']);
	return $columns;
}
add_filter("manage_news_posts_columns", "news_edit_columns");
//
/* POST TYPE EVENTOS *************************************************************/
//
// Amaguem l'autor > Eventos
function events_edit_columns($columns){
	//unset($columns['author']);
	//set($columns['category']);
	return $columns;
}
add_filter("manage_tribe_events_posts_columns", "events_edit_columns");
//
// Afegim el lloc de l'event > Crear columna
function eventos_add_venue($cols){
  $cols['eventos_venue'] = __('Lugar');
  return $cols;
}
// Afegim el lloc de l'event > Contingut
function eventos_show_venue($col, $id){
	switch($col){
		case 'eventos_venue':
			$venue = tribe_get_venue() ;
			if( $venue ){
				echo $venue;
			}else{
				echo '—';
			}
	}
}
// Add the posts and pages columns filter. They can both use the same function.
add_filter('manage_tribe_events_posts_columns', 'eventos_add_venue', 4);
// Hook into the posts an pages column managing. Sharing function callback again.
add_action('manage_tribe_events_posts_custom_column', 'eventos_show_venue', 4, 2);
// Amaguem la Data > Llocs (Venue)
function events_venue_edit_columns($columns){
	unset($columns['date']);
	unset($columns['tcb_post_thumb']);
	return $columns;
}
add_filter("manage_tribe_venue_posts_columns", "events_venue_edit_columns");
//
//
/* PAGINES *************************************************************/
// Thumbnail a les pagines 
add_filter('manage_pages_columns', 'tcb_add_post_thumbnail_column', 5);
add_action('manage_pages_custom_column', 'tcb_display_post_thumbnail_column', 5, 2);
// Amaguem Data, Autor i Comentaris
function pages_edit_columns($columns){
	unset($columns['comments']);
	unset($columns['author']);
	unset($columns['date']);
	return $columns;
}
add_filter("manage_edit-page_columns", "pages_edit_columns");
//
// Afegim el check de la metadescripcio
function pages_add_metadescription_col($cols){
  $cols['pages_metadescription'] = __('Descripción');
  return $cols;
}
// Check si s'ha fet metadescripcio
function pages_check_metadescription($col, $id){
	switch($col){
		case 'pages_metadescription':
			$metadescription = get_field('metadescription_es');
			if( $metadescription ){
				echo $metadescription;
			}else{
				echo 'Sin descripción';
			}
	}
}
// Add the posts and pages columns filter. They can both use the same function.
add_filter('manage_pages_columns', 'pages_add_metadescription_col', 6);
// Hook into the posts an pages column managing. Sharing function callback again.
add_action('manage_pages_custom_column', 'pages_check_metadescription', 6, 2);
//
// METABOXES D'EDICIO *****************************************************************
//*************************************************************************************
//
// AMAGA BOX D'EDICIO A LES PAGINES D'EDICIO DE POSTS *********************************
//
function my_remove_meta_boxes() {
//Post
	//Els metabox dels posts es configuren al plugin custom-admin-postypes
//Link
  remove_meta_box('linktargetdiv', 'link', 'normal');
  remove_meta_box('linkxfndiv', 'link', 'normal');
  remove_meta_box('linkadvanceddiv', 'link', 'normal');
}
add_action( 'admin_menu', 'my_remove_meta_boxes' );
//* ***********************************************************************************************************************************
//
// CONFIGURACIÓ D'USUARIS
//
//*************************************************************************************************************************************
//
/* CONFINGURACIONS GENERALS ***********************************************************************************************************/
//
// Permet a múltiples usuaris compartir direcció d'email 
// Amb direccio GMAil pots afegir un + al final del mail i el que vulguis, els missatges arribaran.
// Ex: ola@gmail.com == ola+kease@gmail.com
//
/* PERFIL USUARI *************************************************************************/
// Camps d'informació par als usuaris
function user_fields_extra( $contactmethods ) {
    //Para quitar los que no queremos
    unset($contactmethods['aim']);  
    unset($contactmethods['jabber']);  
    unset($contactmethods['yim']); 
    return $contactmethods;
  }
add_filter('user_contactmethods','user_fields_extra',10,1);
//
// MOSTRAR ELS CAMPS DE CONTACTE D'EMAIL PER EMPRESA I FORMULARIS *****************************************************************
//
function my_show_extra_profile_fields( $user ) {  
	$editor_id = 2; // ID de l'Usuari - Client
	if ($user->ID == $editor_id || current_user_can( 'edit_user', $user->ID )) { //La ID de l'usuari Editor (client)
		// Descodifiquem la contrassenya de l'email de formularis
		$form_mail_pass = esc_attr( get_the_author_meta( 'form_email_pass', $editor_id ) );
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
			$dec_value = openssl_decrypt(base64_decode($form_mail_pass), $encrypt_method, $key, 0, $iv);  
			$smtp_pass = $dec_value;  
		}
		?>
        <h3>eMails de Empresa</h3>
        <table class="form-table">
            <tr>
                <th><label for="company_email">eMail de Contacto</label></th>
                <td>
                    <input type="text" name="company_email" id="company_email" value="<?php echo esc_attr( get_the_author_meta( 'company_email', $user->ID ) ); ?>" /><br />
                    <span class="description">La dirección de correo electrónico que aparece en el Pie de Página.</span>
                </td>
            </tr>
            <tr>
                <th><label for="form_email">eMail para Formularios</label></th>
                <td>
                    <input type="text" name="form_email" id="form_email" value="<?php echo esc_attr( get_the_author_meta( 'form_email', $user->ID ) ); ?>" /><br />
                    <span class="description">La dirección de correo electrónico dónde recibir los mensajes de los Formularios de Contacto .</span>
                </td>
            </tr>
            <tr>
                <th><label for="form_email_pass">Contraseña (eMail para Formularios)</label></th>
                <td>
                    <input type="password" name="form_email_pass" id="form_email_pass" value="<?php echo $smtp_pass; ?>" /><br />
                    <span class="description">La contraseña de la dirección de correo electrónico dónde recibir los mensajes de los Formularios de Contacto.</span>
                </td>
            </tr>
			<tr>
                <th><label for="form_email_key">Clave de Cifrado 1</label></th>
                <td>
                    <input type="text" name="form_email_key" id="form_email_key" value="<?php echo esc_attr( get_the_author_meta( 'form_email_key', $user->ID ) ); ?>" /><br />
                    <span class="description">Puede ser una frase aleatoria</span>
                </td>
            </tr>
			<tr>
                <th><label for="form_email_iv">Clave de Cifrado 2</label></th>
                <td>
                    <input type="text" name="form_email_iv" id="form_email_iv" value="<?php echo esc_attr( get_the_author_meta( 'form_email_iv', $user->ID ) ); ?>" /><br />
                    <span class="description">Debe tener 16 bits ("987654321")</span>
                </td>
            </tr>
        </table>
<?php }
// Camps de SocialMedia per a tots els usuaris ?>
	<h3>SocialMedia</h3>
    <table class="form-table">
        <tr>
        	<th valign="top" scope="row"><label for="user_twitter">Twitter URL</label></th>
            <td>
            	<input type="text" id="user_twitter" name="user_twitter" value="<?php echo esc_attr( get_the_author_meta( 'user_twitter', $user->ID ) ); ?>" /><br />
            	<span class="description">Nombre de Usuario de Twitter, si es distinto al perfil oficial de Empresa. <br/>
                <b>Si rellenas este campo, la autoría de tus posts se vinculará a tu usuario en vez de al perfil de Empresa.</b></span>
			</td>
		</tr>
        <tr>
            <th valign="top" scope="row"><label for="user_gplus">Google+ URL</label></th>
            <td>
            	<input type="text" id="user_gplus" name="user_gplus" value="<?php echo esc_attr( get_the_author_meta( 'user_gplus', $user->ID ) ); ?>" /><br />
                <span class="description">El código numérico que aparece en la URL de tu perfil de Google+: "https://plus.google.com/u/0/[CÓDIGO NUMÉRICO]". <br/>
                <b>Si rellenas este campo, la autoría de los posts que escribas se vinculará a tu perfil y no a la Página / Perfil de la Empresa.</b></span>
            </td>
        </tr>
    </table>
<?php }
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );
//
// GUARDAR A LA BBDD ELS CAMPS DE CONTACTE D'EMAIL PER EMPRESA I FORMULARIS *****************************************************************
// $editor_id -> Variable amb la ID d'usuari del CLIENT
//
function my_save_extra_profile_fields( $user_id ) {
	$editor_id = 2; // ID de l'Usuari - Client
	if ($user_id == $editor_id || current_user_can( 'edit_user', $user->ID )) {
		$form_mail_key = get_the_author_meta( 'form_email_key', $editor_id );
		$form_mail_iv = get_the_author_meta( 'form_email_iv', $editor_id );
		//eMail de Contacto
		update_user_meta( $user_id, 'company_email', $_POST['company_email'] );
		//eMail para Formularios
		update_user_meta( $user_id, 'form_email', $_POST['form_email'] );
		//Contraseña (eMail para Formularios)
		$encrypt_method = "AES-256-CBC";
		$secret_key = $form_mail_key;
		//$secret_key = 'nextconferenciasdeautor';
		$secret_iv = $form_mail_iv; 
		//$secret_iv = '987654321';
			// hash
		$key = hash('sha256', $secret_key);
		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
			// Codifiquem
		$password = $_POST['form_email_pass'];
		$enc_value = openssl_encrypt($password, $encrypt_method, $key, 0, $iv);
		$enc_value = base64_encode($enc_value);
		$enc_password = $enc_value;
		update_user_meta( $user_id, 'form_email_pass', $enc_password );
		//eMail de Contacto
		update_user_meta( $user_id, 'form_email_key', $_POST['form_email_key'] );
		//eMail para Formularios
		update_user_meta( $user_id, 'form_email_iv', $_POST['form_email_iv'] );
	}
	//Twitter URL
	update_user_meta( $user_id, 'user_twitter', $_POST['user_twitter'] );
	//GPlus URL
	update_user_meta( $user_id, 'user_gplus', $_POST['user_gplus'] );
}
add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );
//
/* CONFINGURACIONS PER A ADMINISTRADOR ************************************************************************************************
********************************************************************************************************************************/
// Mostra el Rendiment MySQL *************************************************************
function mqw_performance( $visible = true ) {
	$stat = sprintf(  '%d CONSULTES EN %.3f SEGONS, USANT %.2fMB DE MEMÒRIA',
		get_num_queries(),
		timer_stop( 0, 3 ),
		memory_get_peak_usage() / 1024 / 1024
		);
	echo $visible ? $stat : "$stat" ;
}
function add_widget_performance() {
	$user_id = get_current_user_id();
	if (current_user_can('manage_options') && $user_id != '2' ) { //$user_id != '2' -> amaguem a l'Usuari Client
		wp_add_dashboard_widget( 'mysql_performance', 'MySQL Performance', 'mqw_performance' );
	}
}
add_action( 'wp_dashboard_setup', 'add_widget_performance');
//
//
/* Ajuda amb els hooks > afegeix una secció d'ajuda que exlica els hooks de la pàgina d'admin */
add_action( 'contextual_help', 'wptuts_screen_help', 10, 3 );
function wptuts_screen_help( $contextual_help, $screen_id, $screen ) {
    // The add_help_tab function for screen was introduced in WordPress 3.3.
    if ( ! method_exists( $screen, 'add_help_tab' ) )
        return $contextual_help;
    global $hook_suffix;
    // List screen properties
    $variables = '<ul style="width:50%;float:left;"> <strong>Screen variables </strong>'
        . sprintf( '<li> Screen id : %s</li>', $screen_id )
        . sprintf( '<li> Screen base : %s</li>', $screen->base )
        . sprintf( '<li>Parent base : %s</li>', $screen->parent_base )
        . sprintf( '<li> Parent file : %s</li>', $screen->parent_file )
        . sprintf( '<li> Hook suffix : %s</li>', $hook_suffix )
        . '</ul>';
    // Append global $hook_suffix to the hook stems
    $hooks = array(
        "load-$hook_suffix",
        "admin_print_styles-$hook_suffix",
        "admin_print_scripts-$hook_suffix",
        "admin_head-$hook_suffix",
        "admin_footer-$hook_suffix"
    );
    // If add_meta_boxes or add_meta_boxes_{screen_id} is used, list these too
    if ( did_action( 'add_meta_boxes_' . $screen_id ) )
        $hooks[] = 'add_meta_boxes_' . $screen_id;
    if ( did_action( 'add_meta_boxes' ) )
        $hooks[] = 'add_meta_boxes';
    // Get List HTML for the hooks
    $hooks = '<ul style="width:50%;float:left;"> <strong>Hooks </strong> <li>' . implode( '</li><li>', $hooks ) . '</li></ul>';
    // Combine $variables list with $hooks list.
    $help_content = $variables . $hooks;
    // Add help panel
    $screen->add_help_tab( array(
        'id'      => 'wptuts-screen-help',
        'title'   => 'Screen Information',
        'content' => $help_content,
    ));
    $user_id = get_current_user_id();
	if (current_user_can('manage_options') && $user_id != '2' ) {  //$user_id != '2' -> amaguem a l'Usuari Client
		return $contextual_help;
	}
}
// CONFINGURACIONS PER A SÚPER-EDITOR (ID2) -> És Admin per Editar les opcions de Lector, Social i Stats però per la resta d'Opcions les té amagades ********
// TAMBÉ CONFIGUREM L'EDITOR NORMAL, QUE NO PODRA TOCAR AQUESTES OPCIONS
//***********************************************************************************************************************************************************
// Amaga elements del MENÚ ************************************
function remove_menu_elements() {
	$user_id = get_current_user_id();
	if ($user_id == '2' || !current_user_can('manage_options')) {  //$user_id != '2' -> amaguem a l'Usuari Client
	  // Amaguem els avisos d'Actualització
	  remove_action( 'admin_notices', 'update_nag', 3);
	  // Amaguem Diverses Pàgines 
	  remove_submenu_page( 'index.php', 'update-core.php' );
	  remove_menu_page( 'edit.php?post_type=page' );
	  remove_menu_page( 'link-manager.php' );
	  remove_menu_page( 'themes.php' );
	  remove_menu_page( 'plugins.php' );
	  remove_menu_page( 'tools.php' );
	  remove_menu_page( 'options-general.php' );
	  remove_menu_page( 'edit.php?post_type=acf' );
	  }
}
add_action('admin_menu', 'remove_menu_elements', 999);
//
//
// Amaga elements de l'Admin Bar ****************************
function remove_admin_bar() {
    global $wp_admin_bar;
	$user_id = get_current_user_id();
    if ($user_id == '2' || !current_user_can('manage_options')) {  //$user_id != '2' -> amaguem a l'Usuari Client
		$wp_admin_bar->remove_menu('view-site');
		$wp_admin_bar->remove_menu('updates');          // Remove the updates link
		$wp_admin_bar->remove_menu('new-content');      // Remove the content link
		$wp_admin_bar->remove_menu('edit');      		// Remove the edit link
    }
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar' );
//
//
//
/* CONFINGURACIONS PER A EDITOR ************************************************************************************************
********************************************************************************************************************************/
//
//
//
?>