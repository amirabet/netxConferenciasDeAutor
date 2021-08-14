<?php 
//Header del Form
$contr_h1 = 'Rellene el formulario para solicitar una conferencia';
$contr_p = 'Los campos marcados con asterisco (*) son obligatorios.';
//
$formsubmit_h1 = '<i class="fa fa-check-circle"></i> Mensaje enviado correctamente';
$formsubmit_p = 'Le responderemos en un plazon no superior a 72 horas.';
//
$formsubmit_h1 = '<i class="fa fa-check-circle"></i> Mensaje enviado correctamente';
$formsubmit_p = 'Puede revisar la información que nos ha remitido.';
//
$formsubmit_h1 = '<i class="fa fa-check-circle"></i> Mensaje enviado correctamente';
$formsubmit_p = 'Puede revisar la información que nos ha remitido.';
////
$formsubmiterror_h1 = '<i class="fa fa-times-circle"></i> ERROR en el envío del mensaje.';
$formsubmiterror_p = 'Estamos sufriendo problemas técnicos con la recepción de su mensaje.';
//
$formsubmiterror_h1 = '<i class="fa fa-times-circle"></i> ERROR en l\'enviament del seu missatge.';
$formsubmiterror_p = 'Estem tenint problemes tècnics amb la recepció del seu missatge.';
//
$formsubmiterror_h1 = '<i class="fa fa-times-circle"></i>ERROR on form submission.';
$formsubmiterror_p = 'We\'re suffering technical issues with your\'s form submission.';
//Datos Personales
$personal_h = 'Sus datos personales';
$personal_p = 'Necesitamos saber quién es y cómo responderle.';
$nombre = 'Nombre y Apellidos';
$email = 'Correo Electrónico';
$telefono = 'Teléfono';
$empresa = 'Empresa';
$poblacion = 'Población';
$provincia = 'Provincia';
//Tematica
$tematica_h = '¿Interesado en una temática concreta?';
$tematica_p = 'Marque la casilla correspondiente.Puede elegir varias categorías a la vez.';
//Autor
$autor_h = '¿Interesado en algún/a Autor/a en particular?';
$autor_p = 'Si lo desea puede escoger uno o varios conferenciantes que le interesen.';
$autor_bttn = 'Ver listado de Autores';
//Servicios Auxiliares
$servicios_h = 'Servicios complementarios a la conferencia';
$servicios_p = 'Puede completar el evento de su conferencia con estos servicios auxiliares.';
$servicios_libros = '<em>Ediciones especiales de los libros de nuestros conferenciantes</em> para instituciones y empresas.';
$servicios_libros_val = 'Ediciones especiales de libros.';
$servicios_team = '<em>Experiencias de Team-Building</em> para la cohesión de equipos de la mano de los mejores expertos.';
$servicios_team_val = 'Experiencias de Team-Building';
$servicios_none = 'No ha seleccionado' . $servicios_h;
//Programacion
$programacion_h = '¿Cuándo le gustaría celebrar la conferencia?';
$programacion_p = 'Indíquenos de forma orientativa la fecha y la hora que prefiera.';
$programacion_horario = 'Horario preferido:';
$programacion_horario_name = 'horario';
$programacion_horario_ind = 'Indiferente';
$programacion_horario_man = 'Mañana';
$programacion_horario_tar = 'Tarde';
$programacion_fecha = 'Indique una fecha: ';
$programacion_fecha_opt = 'Fecha optativa: ';
$programacion_fecha_format = 'dd/mm/AA';
$programacion_fecha_none = 'Fecha no especificada.';
//Comentarios
$comentarios = '¿Desea comentarnos algo más?';
$comentarios_placeholder = 'Si quiere hacernos llegar otra duda o cuestión utilice este espacio.';	
$comentarios_none = 'Sin Comentarios.';	
//Altres
$emptyfield = 'No especificado';
$honeypot = '¡NO rellenes este campo!';
$enviar = 'ENVIAR';
$enviar_aviso = 'Mediante el envío de este formulario acepta las ';
$enviar_aviso_cond = 'Condiciones Legales';

//Datos Personales
$from_name = utf8_decode($_POST['fnombre']);
$from_email = $_POST['femail'];
$from_telf = $_POST['ftelf'];
$from_empresa = utf8_decode($_POST['fempresa']);
$from_poblacion = utf8_decode($_POST['fpoblacion']);
$from_provincia = utf8_decode($_POST['fprovincia']);
//Tematica
//Autor
//Servicios Auxiliares ********************
//Libros
if (isset($_POST['fservicios_libros'])){$servicios_libros_check = 'checked';
}else{$servicios_libros_check = 'unchecked';}
//Teambuilding
if (isset($_POST['fservicios_team'])){$servicios_team_check = 'checked';
}else{$servicios_team_check = 'unchecked';}
//Programacion
$from_fecha = $_POST['ffecha'];
$from_fecha_opt = $_POST['ffechaopt'];
//Comentarios
$from_comentarios = utf8_decode($_POST['fcomentarios']);
//

//Empresa
if (isset($_POST['fempresa'])){$empresa_filled = $from_empresa;
} else {$empresa_filled = '';	}
//Poblacion
if (isset($_POST['fpoblacion'])){$poblacion_filled = $from_poblacion;
} else {$poblacion_filled = '';	}
//Provincia
if (isset($_POST['fprovincia'])){$provincia_filled = $from_provincia;
} else {$provincia_filled = '';	}

///////////////////////////////////////////////////////////////////////// ?>

 				 <!-- Datos Personales -->
                    <article>
                        <header><h3><?php echo $personal_h; ?></h3></header>
                        <ul id="form_personal">
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
                            <li>
                                <label for="fempresa"><?php echo $empresa; ?></label>
                                <input name="fempresa" type="text" id="fempresa" value="<?php echo $empresa_filled; ?>" placeholder="<?php echo $empresa; ?>" autocorrect="off"/>
                            </li>
                            <li>
                                <label for="fpoblacion"><?php echo $poblacion; ?></label>
                                <input name="fpoblacion" type="text" id="fpoblacion" value="<?php echo $poblacion_filled; ?>" placeholder="<?php echo $poblacion; ?>" autocorrect="off"/>
                            </li>
                            <li>
                                <label for="fprovincia"><?php echo $provincia; ?></label>
                                <input name="fprovincia" type="text" id="fprovincia" value="<?php echo $provincia_filled; ?>" placeholder="<?php echo $provincia; ?>" autocorrect="off"/>
                            </li>
                        </ul>
                    </article>
                    <!-- Tematica -->
                    <article>
                        <header><h3><?php echo $tematica_h; ?></h3></header>
                        <p><?php echo $tematica_p; ?></p>
                        <ul>
                            <?php 
                            foreach(get_categories('hide_empty=0&orderby=count&order=DESC&exclude=1') as $cat) {
                                $iconcat = get_field('cat_icon', 'category_' . $cat->term_id );
                                //$cat_input_array = $_POST['form_checks_cats'];
                                $cat_input_li = '<li><input name="form_checks_cats[]" id="cat_' . $cat->slug . '" type="checkbox" value="' . $cat->cat_name . '" ';
                                if (isset($_POST['form_checks_cats']) && in_array($cat->cat_name, $_POST['form_checks_cats'])) { $cat_input_li .=  'checked="checked" ' ; }
                                $cat_input_li .= '/><label for="cat_' . $cat->slug . '"> <i class="fa ' . $iconcat . '"></i> ' . $cat->cat_name . '</label></li>';
                                echo $cat_input_li;
                            }
                            ?>
                        </ul>
                    </article>
                    <!-- Autor -->
                    <article>
                        <header><h3><?php echo $autor_h; ?></h3></header>
                        <p><?php echo $autor_p; ?></p>
                        <span class="js"><?php echo $autor_bttn; ?></span>
                        <ul>
                            <?php 
                            foreach(get_posts('orderby=title') as $post) {
                                $autor_input_li = '<li><input name="form_checks_autors[]" id="autor_' . $post->ID . '" type="checkbox" value="' . get_the_title() . '" ';
                                if (isset($_POST['form_checks_autors']) && in_array(get_the_title(), $_POST['form_checks_autors'])) { $autor_input_li .=  'checked="checked" ' ; }
                                $autor_input_li .= '/><label for="autor_' . $post->ID . '">' . get_the_post_thumbnail($post->ID, 'thumbnail') . get_the_title() . '</label></li>'; //Per a que funcioni a IE11 requereix label img{  pointer-events: none;}
                                echo $autor_input_li;
                            }
                            ?>
                        </ul>
                    </article>
                    <!-- Servicios Auxiliares -->
                    <article>
                        <header><h3><?php echo $servicios_h; ?></h3></header>
                        <p><?php echo $servicios_p; ?></p>
                        <ul id="form_servicios">
                            <li><input name="fservicios_libros" id="fservicios_libros" type="checkbox" value="<?php echo $servicios_libros_val; ?>" <?php echo $servicios_libros_check; ?> /> <label for="fservicios_libros"><?php echo $servicios_libros; ?></label></li>
                            <li><input name="fservicios_team" id="fservicios_team" type="checkbox" value="<?php echo $servicios_team_val; ?>" <?php echo $servicios_team_check; ?> /> <label for="fservicios_team"><?php echo $servicios_team; ?></label></li>
                        </ul>        
                    </article>
                    <!-- Programacion -->
                    <article>
                        <header><h3><?php echo $programacion_h; ?></h3></header>
                        <p><?php echo $programacion_p; ?></p>
                        <ul id="form_programacion">
                            <li id="form_programacion_horario">
                                <span><?php echo $programacion_horario; ?></span>
                                <span><input type="radio" name="<?php echo $programacion_horario_name; ?>"  id="<?php echo 'f'. $programacion_horario_ind; ?>" value="<?php echo $programacion_horario_ind; ?>" <?php echo $programacion_horario_ind_check; ?> /><label for="<?php echo 'f'. $programacion_horario_ind; ?>"><?php echo $programacion_horario_ind; ?></label></span>
                                <span><input type="radio" name="<?php echo $programacion_horario_name; ?>" id="<?php echo 'f'. $programacion_horario_man; ?>" value="<?php echo $programacion_horario_man; ?>" <?php echo $programacion_horario_man_check; ?> /><label for="<?php echo 'f'. $programacion_horario_man; ?>"><?php echo $programacion_horario_man; ?></label></span>
                                <span><input type="radio" name="<?php echo $programacion_horario_name; ?>" id="<?php echo 'f'. $programacion_horario_tar; ?>" value="<?php echo $programacion_horario_tar; ?>" <?php echo $programacion_horario_tar_check; ?> /><label for="<?php echo 'f'. $programacion_horario_tar; ?>"><?php echo $programacion_horario_tar; ?></label></span>
                            </li>
                            <li>
                                <label for="ffecha"><?php echo $programacion_fecha; ?></label>
                                <input name="ffecha" type="text" id="ffecha" value="<?php echo $programacion_fecha_filled; ?>" class="datepicker" placeholder="<?php echo $programacion_fecha_format; ?>"  autocomplete="off" />
                            </li>
                            <li>
                                <label for="ffecha_opt"><?php echo $programacion_fecha_opt; ?></label>
                                <input name="ffecha_opt" type="text" id="ffecha_opt" value="<?php echo $programacion_fecha_opt_filled; ?>" class="datepicker" placeholder="<?php echo $programacion_fecha_format; ?>"  autocomplete="off" />
                            </li>
                        </ul>  
                    </article>
                    <!-- Comentarios -->
                    <article>
                        <header><h3><?php echo $comentarios; ?></h3></header>
                        <ul id="form_comentarios">
                            <li>
                                <textarea name="fcomentarios" id="fcomentarios" type="text" placeholder="<?php echo $comentarios_placeholder; ?>" /><?php echo $comentarios_filled; ?></textarea>
                            </li>
                        </li>
                    </article>
                    <!-- Honey i Submit -->
                    <footer>
                        <ul id="form_submit">
                            <!-- The following field is for robots only, invisible to humans: -->
                            <li class="li_honey">
                                <label for="honey"><?php echo $honeypot; ?></label>
                                <input name="fhoney" type="text" id="fhoney" value="<?php echo $honey_filled; ?>"/ >
                            </li>
                            <li class="li_bttn_foot">
                                <input name="send" type="submit" class="calltoact primarybutton" value="<?php echo $enviar; ?>"/>
                                <span id="form_loader" class="hidden">
                                    <img src="<?php echo get_stylesheet_directory_uri() . '/images/layout/form_loader1.gif" alt="loading'; ?>" />
                                    <img src="<?php echo get_stylesheet_directory_uri() . '/images/layout/form_loader2.gif" alt="loading'; ?>" />
                                </span>
                            </li>
                            <li class="li_legal">
                                <p><?php echo $enviar_aviso; ?> <a href="<?php echo get_bloginfo('url') . ('/') . $qlang . 'contacte/next-legal/' ; ?>" target="_blank" title="<?php echo $enviar_aviso_cond; ?>"><?php echo $enviar_aviso_cond; ?></a>.<p>
                            </li>
                        </ul>
                    </footer>
<?php
//////////////////////////////////////////////////
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
		$message .= " \r\n";
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
		$message .= " \r\n";
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
?>