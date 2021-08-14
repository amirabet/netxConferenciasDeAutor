<?php 
/****************************************************************

Pàgina en Blanc per incloure-hi els Metafiels
del Lector de Blogs 
****************************************************************/
// 
//
// Renderitzem la Pàgina
//
?>
<div class="wrap">
    <?php 
	// Missatges d'estat ******************************************
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			$updated_msg = 'Se han actualizado las preferencias del Lector RSS';
		}elseif( qtrans_getLanguage() == 'ca' ){
			$updated_msg = "S'han actualitzat les preferències del Lector RSS";
		}else{ //english
			$updated_msg = 'RSS Reader settings Updated';
		} 
		if ( isset( $_GET['settings-updated'] ) ) {
			echo "<div class='updated'><p>" . $updated_msg . "</p></div>";
		}
	}else{
		$updated_msg = 'Se han actualizado las preferencias del Lector RSS';
	}
	// Header ******************************************************
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){	?>
			<h2>Configuración de RSS</h2>
			<h3>Introduce la URL de un Blog que quieras seguir en uno de los campos de texto.</h3>
			<p>Añade o quita blogs con los botones <i>+</i> y <i>-</i>. Puedes añadir hasta 4 blogs por Grupo.<br />
			Las últimas entradas de cada blog aparecen en la página <a href="admin.php?page=reader" target="_self">Lector</a>.</p>
		<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
			<h2>Configuració d'RSS</h2>
			<h3>Introdeix la URL d'un Blog que vulguis seguir en un dels camps de text.</h3>
			<p>Afegeix o elimina blogs amb els botons <i>+</i> y <i>-</i>. Pots afegir fins a 4 blogs per Grup.<br />
			Les últimes entrades de cada blog apareixen a la pàgina <a href="admin.php?page=reader" target="_self">Lector</a>.</p>
		<?php }else{ //english ?>
			<h2>RSS Config</h2>
			<h3>Insert any ULR of a blog that you want to follow in the text fields.</h3>
			<p>Add or remove blogs with the buttons <i>+</i> y <i>-</i>. A maxium of 4 blogs can be added for each Group.<br />
			The recents posts followed blogs will appear on <a href="admin.php?page=reader" target="_self">Reader</a> page.</p>
		<?php } 
    }else{//Not activeQtrans?>
		<h2>Configuración de RSS</h2>
		<h3>Introduce la URL de un Blog que quieras seguir en uno de los campos de texto.</h3>
		<p>Añade o quita blogs con los botones <i>+</i> y <i>-</i>. Puedes añadir hasta 4 blogs por Grupo.<br />
		Las últimas entradas de cada blog aparecen en la página <a href="admin.php?page=reader" target="_self">Lector</a>.</p>
	<?php }?>
    <div id="dashboard-widgets-wrap">
        <div id="dashboard-widgets" class="metabox-holder">
            <!--GRUP 1 **************************************** -->
            <div id='postbox-container-1' class='postbox-container'>
                <div id="normal-sortables1" class="meta-box-sortables">
                    <div id="blog1" class="postbox ">
                        <div class="handlediv" title="Haz clic para cambiar"><br /></div>
                        <h3 class='hndle'><span>
                        	<?php 
							if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){	?>
									<b>GRUPO 1</b>
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
									<b>GRUP 1</b>
								<?php }else{ //english ?>
									<b>GROUP 1</b>
								<?php }
                            }else{?>
                            	<b>GRUPO 1</b>
                            <?php } ?>
                            <br/>
								<?php 
									$title_grup = get_option('reader_config_gr1_title');
										if ( ! empty( $title_grup ) ) {
											echo $title_grup;
										}else{
											if (function_exists('qtrans_getLanguage')){
												if( qtrans_getLanguage() == 'es' ){
													echo 'Sin título';
												}elseif( qtrans_getLanguage() == 'ca' ){ 
													echo 'Sense títol';
												}else{ //english
													echo 'No title';
												}
											}else{ //Not activeQtrans
												echo 'Sin título';
											}
										}
								?>
                        </span></h3>
                        <div class="inside">
                            <form method="post" action="options.php"> 
                            	<?php settings_fields('reader_config_gr1'); ?>
                                    <table class="form-table">
                                        <tr valign="top">
                                            <th scope="row"><label for="reader_config_gr1_title">
                                            	<?php 
												if (function_exists('qtrans_getLanguage')){
													if( qtrans_getLanguage() == 'es' ){	?>
														Título del grupo
													<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
														Títol del grupo
													<?php }else{ //english ?>
														Group Title
													<?php } 
                                            	}else{ //Not activeQtrans?>
                                                	Título del grupo
                                            	<?php } ?>
                                            </label></th>
                                            <td colspan="2"><input type="text" name="reader_config_gr1_title" value="<?php $title = get_option('reader_config_gr1_title');  echo sanitize_text_field($title); ?>" /></td>
                                        </tr>
                                        <?php 
										$output = '';
										$blogs_array1 = get_option('reader_config_gr1_blogs');
										if (is_array($blogs_array1)){ $blogs1 = array_filter($blogs_array1);}
										if (empty($blogs1)){
											$i = 1;
											$output .= '<tr class="repeatable-wrap" valign="top"><th scope="row"><label for="reader_config_gr1_blogs[blog'.$i.']"><em>Blog '.$i.'</em></label></th>' .
													'<td class="thefield"><input type="text" name="reader_config_gr1_blogs[blog'.$i.']" value="" /></td><td><b class="repeatable-field-remove button repeatable-hide">-</b></td></tr>';
										}else{
											$i = 1;
											foreach( $blogs1 as $blog1 ) {
												$output .= '<tr class="repeatable-wrap" valign="top"><th scope="row"><label for="reader_config_gr1_blogs[blog'.$i.']"><em>Blog '.$i.'</em></label></th>' .
													'<td class="thefield"><input type="text" name="reader_config_gr1_blogs[blog'.$i.']" value="'. sanitize_text_field($blog1).'" /></td><td><b class="repeatable-field-remove button';
												if ($i == 1) {$output .= ' repeatable-hide';}
												$output .= '">-</b></td></tr>';
												$i++;
											}
										}
										if (function_exists('qtrans_getLanguage')){
											if( qtrans_getLanguage() == 'es' ){
												$addfiled = 'Añadir <em>Blog</em>';
											}elseif( qtrans_getLanguage() == 'ca' ){
												$addfiled = 'Afegir <em>Blog</em>';
											}else{ //english
												$addfiled = 'Add <em>Blog</em>';
											}
										}else{ //Not activeQtrans
											$addfiled = 'Añadir <em>Blog</em>';
										}
										$output .= '<tr class="add-repeatable-wrap" valign="top"><th scope="row">' . $addfiled . '</th><td colspan="2"><b class="repeatable-field-add button">+</b></td></tr>';
										echo $output; ?>
                                    </table>
                                <br />
								<?php 
								$other_atributes1 = array( 'id' => 'submit_gr1' );
								submit_button('','','','',$other_atributes1); ?>
                                <br /><br />
                            </form>
                        </div><!-- /Inside -->
                    </div><!-- /ID Blog xx .postbox -->
                </div><!-- <div id="normal-sortables" class="meta-box-sortables"> -->
            </div><!-- div id='postbox-container-1' class='postbox-container' END FOREACH -->
            <!-- /Grup1 -->
            <!--GRUP 2 **************************************** -->
            <div id='postbox-container-2' class='postbox-container'>
                <div id="normal-sortables2" class="meta-box-sortables">
                    <div id="blog2" class="postbox ">
                        <div class="handlediv" title="Haz clic para cambiar"><br /></div>
                        <h3 class='hndle'><span>
                        	<?php 
							if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){	?>
									<b>GRUPO 2</b>
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
									<b>GRUP 2</b>
								<?php }else{ //english ?>
									<b>GROUP 2</b>
								<?php } 
                            }else{ //Not activeQtrans ?>
                            	<b>GRUPO 2</b>
                            <?php } ?>
                            <br/>
								<?php 
									$title_grup = get_option('reader_config_gr2_title');
										if ( ! empty( $title_grup ) ) {
											echo $title_grup;
										}else{
											if (function_exists('qtrans_getLanguage')){
												if( qtrans_getLanguage() == 'es' ){
													echo 'Sin título';
												}elseif( qtrans_getLanguage() == 'ca' ){ 
													echo 'Sense títol';
												}else{ //english
													echo 'No title';
												}
											}else{ //Not activeQtrans
												echo 'Sin título';
											}
										}
								?>
                        </span></h3>
                        <div class="inside">
                            <form method="post" action="options.php"> 
                            	<?php settings_fields('reader_config_gr2'); ?>
                                    <table class="form-table">
                                        <tr valign="top">
                                            <th scope="row"><label for="reader_config_gr2_title">
                                            	<?php 
												if (function_exists('qtrans_getLanguage')){
													if( qtrans_getLanguage() == 'es' ){	?>
														Título del grupo
													<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
														Títol del grupo
													<?php }else{ //english ?>
														Group Title
													<?php } 
                                            	}else{ //Not activeQtrans ?>
                                                	Título del grupo
                                                <?php } ?>
                                            </label></th>
                                            <td colspan="2"><input type="text" name="reader_config_gr2_title" value="<?php $title = get_option('reader_config_gr2_title');  echo sanitize_text_field($title); ?>" /></td>
                                        </tr>
                                        <?php 
										$output = '';
										$blogs_array2 = get_option('reader_config_gr2_blogs');
										if (is_array($blogs_array2)){ $blogs2 = array_filter($blogs_array2); }
										if (empty($blogs2)){
											$i = 1;
											$output .= '<tr class="repeatable-wrap" valign="top"><th scope="row"><label for="reader_config_gr2_blogs[blog'.$i.']"><em>Blog '.$i.'</em></label></th>' .
													'<td class="thefield"><input type="text" name="reader_config_gr2_blogs[blog'.$i.']" value="" /></td><td><b class="repeatable-field-remove button repeatable-hide">-</b></td></tr>';
										}else{
											$i = 1;
											foreach( $blogs2 as $blog2 ) {
												$output .= '<tr class="repeatable-wrap" valign="top"><th scope="row"><label for="reader_config_gr2_blogs[blog'.$i.']"><em>Blog '.$i.'</em></label></th>' .
													'<td class="thefield"><input type="text" name="reader_config_gr2_blogs[blog'.$i.']" value="'. sanitize_text_field($blog2).'" /></td><td><b class="repeatable-field-remove button';
												if ($i == 1) {$output .= ' repeatable-hide';}
												$output .= '">-</b></td></tr>';
												$i++;
											}
										}
										if (function_exists('qtrans_getLanguage')){
											if( qtrans_getLanguage() == 'es' ){
												$addfiled = 'Añadir <em>Blog</em>';
											}elseif( qtrans_getLanguage() == 'ca' ){
												$addfiled = 'Afegir <em>Blog</em>';
											}else{ //english
												$addfiled = 'Add <em>Blog</em>';
											}
										}else{ //Not activeQtrans
											$addfiled = 'Añadir <em>Blog</em>';
										}

										$output .= '<tr class="add-repeatable-wrap" valign="top"><th scope="row">' . $addfiled . '</th><td colspan="2"><b class="repeatable-field-add button">+</b></td></tr>';
										echo $output; ?>
                                    </table>
                                <br />
								<?php
								$other_atributes2 = array( 'id' => 'submit_gr2' );
								submit_button('','','','',$other_atributes2);
								?>
                                <br /><br />
                            </form>
                        </div><!-- /Inside -->
                    </div><!-- /ID Blog xx .postbox -->
                </div><!-- <div id="normal-sortables" class="meta-box-sortables"> -->
            </div><!-- div id='postbox-container-1' class='postbox-container' END FOREACH -->
            <!-- /Grup2 -->
            <!--GRUP 3 **************************************** -->
            <div id='postbox-container-3' class='postbox-container'>
                <div id="normal-sortables3" class="meta-box-sortables">
                    <div id="blog3" class="postbox ">
                        <div class="handlediv" title="Haz clic para cambiar"><br /></div>
                        <h3 class='hndle'><span>
                        	<?php 
							if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){	?>
									<b>GRUPO 3</b>
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
									<b>GRUP 3</b>
								<?php }else{ //english ?>
									<b>GROUP 3</b>
								<?php } 
                            }else{ //Not activeQtrans ?>
                            	<b>GRUPO 3</b>
                            <?php } ?>
                            <br/>
								<?php 
									$title_grup = get_option('reader_config_gr3_title');
										if ( ! empty( $title_grup ) ) {
											echo $title_grup;
										}else{
											if (function_exists('qtrans_getLanguage')){
												if( qtrans_getLanguage() == 'es' ){
													echo 'Sin título';
												}elseif( qtrans_getLanguage() == 'ca' ){ 
													echo 'Sense títol';
												}else{ //english
													echo 'No title';
												}
											}else{ //Not activeQtrans
												echo 'Sin título';
											}
										}
								?>
                        </span></h3>
                        <div class="inside">
                            <form method="post" action="options.php"> 
                            	<?php settings_fields('reader_config_gr3'); ?>
                                    <table class="form-table">
                                        <tr valign="top">
                                            <th scope="row"><label for="reader_config_gr3_title">
                                            	<?php 
												if (function_exists('qtrans_getLanguage')){
													if( qtrans_getLanguage() == 'es' ){	?>
														Título del grupo
													<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
														Títol del grupo
													<?php }else{ //english ?>
														Group Title
													<?php } 
                                            	}else{ //Not activeQtrans ?>
                                                	Título del grupo
                                                <?php } ?>
                                            </label></th>
                                            <td colspan="2"><input type="text" name="reader_config_gr3_title" value="<?php $title = get_option('reader_config_gr3_title');  echo sanitize_text_field($title); ?>" /></td>
                                        </tr>
                                        <?php 
										$output = '';
										$blogs_array3 = get_option('reader_config_gr3_blogs');
										if (is_array($blogs_array3)){ $blogs3 = array_filter($blogs_array3);}
										if (empty($blogs3)){
											$i = 1;
											$output .= '<tr class="repeatable-wrap" valign="top"><th scope="row"><label for="reader_config_gr3_blogs[blog'.$i.']"><em>Blog '.$i.'</em></label></th>' .
													'<td class="thefield"><input type="text" name="reader_config_gr3_blogs[blog'.$i.']" value="" /></td><td><b class="repeatable-field-remove button repeatable-hide">-</b></td></tr>';
										}else{
											$i = 1;
											foreach( $blogs3 as $blog3 ) {
												$output .= '<tr class="repeatable-wrap" valign="top"><th scope="row"><label for="reader_config_gr3_blogs[blog'.$i.']"><em>Blog '.$i.'</em></label></th>' .
													'<td class="thefield"><input type="text" name="reader_config_gr3_blogs[blog'.$i.']" value="'. sanitize_text_field($blog3).'" /></td><td><b class="repeatable-field-remove button';
												if ($i == 1) {$output .= ' repeatable-hide';}
												$output .= '">-</b></td></tr>';
												$i++;
											}
										}
										if (function_exists('qtrans_getLanguage')){
											if( qtrans_getLanguage() == 'es' ){
												$addfiled = 'Añadir <em>Blog</em>';
											}elseif( qtrans_getLanguage() == 'ca' ){
												$addfiled = 'Afegir <em>Blog</em>';
											}else{ //english
												$addfiled = 'Add <em>Blog</em>';
											}
										}else{ //Not activeQtrans
											$addfiled = 'Añadir <em>Blog</em>';
										}
										$output .= '<tr class="add-repeatable-wrap" valign="top"><th scope="row">' . $addfiled . '</th><td colspan="2"><b class="repeatable-field-add button">+</b></td></tr>';
										echo $output; ?>
                                    </table>
                                <br />
								<?php
								$other_atributes3 = array( 'id' => 'submit_gr3' );
								submit_button('','','','',$other_atributes3);
								?>
                                <br /><br />
                            </form>
                        </div><!-- /Inside -->
                    </div><!-- /ID Blog xx .postbox -->
                </div><!-- <div id="normal-sortables" class="meta-box-sortables"> -->
            </div><!-- div id='postbox-container-1' class='postbox-container' END FOREACH -->
            <!-- /Grup3 -->
            <!--GRUP 4 **************************************** -->
            <div id='postbox-container-4' class='postbox-container'>
                <div id="normal-sortables4" class="meta-box-sortables">
                    <div id="blog4" class="postbox ">
                        <div class="handlediv" title="Haz clic para cambiar"><br /></div>
                        <h3 class='hndle'><span>
                        	<?php 
							if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){	?>
									<b>GRUPO 4</b>
								<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
									<b>GRUP 4</b>
								<?php }else{ //english ?>
									<b>GROUP 4</b>
								<?php } 
                            }else{ //Not activeQtrans ?>
                            	<b>GRUPO 4</b>
                            <?php } ?>
                            <br/>
								<?php 
									$title_grup = get_option('reader_config_gr4_title');
										if ( ! empty( $title_grup ) ) {
											echo $title_grup;
										}else{
											if (function_exists('qtrans_getLanguage')){
												if( qtrans_getLanguage() == 'es' ){
													echo 'Sin título';
												}elseif( qtrans_getLanguage() == 'ca' ){ 
													echo 'Sense títol';
												}else{ //english
													echo 'No title';
												}
											}else{ //Not activeQtrans
												echo 'Sin título';
											}
										}
								?>
                        </span></h3>
                        <div class="inside">
                            <form method="post" action="options.php"> 
                            	<?php settings_fields('reader_config_gr4'); ?>
                                    <table class="form-table">
                                        <tr valign="top">
                                            <th scope="row"><label for="reader_config_gr4_title">
                                            	<?php 
												if (function_exists('qtrans_getLanguage')){
													if( qtrans_getLanguage() == 'es' ){	?>
														Título del grupo
													<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
														Títol del grupo
													<?php }else{ //english ?>
														Group Title
													<?php } 
                                            	}else{ //Not activeQtrans ?>
                                                	Título del grupo
                                                <?php } ?>
                                            </label></th>
                                            <td colspan="2"><input type="text" name="reader_config_gr4_title" value="<?php $title = get_option('reader_config_gr4_title');  echo sanitize_text_field($title); ?>" /></td>
                                        </tr>
                                        <?php 
										$output = '';
										$blogs_array4 = get_option('reader_config_gr4_blogs');
										if (is_array($blogs_array4)){ $blogs4 = array_filter($blogs_array4);}
										if (empty($blogs4)){
											$i = 1;
											$output .= '<tr class="repeatable-wrap" valign="top"><th scope="row"><label for="reader_config_gr4_blogs[blog'.$i.']"><em>Blog '.$i.'</em></label></th>' .
													'<td class="thefield"><input type="text" name="reader_config_gr4_blogs[blog'.$i.']" value="" /></td><td><b class="repeatable-field-remove button repeatable-hide">-</b></td></tr>';
										}else{
											$i = 1;
											foreach( $blogs4 as $blog4 ) {
												$output .= '<tr class="repeatable-wrap" valign="top"><th scope="row"><label for="reader_config_gr4_blogs[blog'.$i.']"><em>Blog '.$i.'</em></label></th>' .
													'<td class="thefield"><input type="text" name="reader_config_gr4_blogs[blog'.$i.']" value="'. sanitize_text_field($blog4).'" /></td><td><b class="repeatable-field-remove button';
												if ($i == 1) {$output .= ' repeatable-hide';}
												$output .= '">-</b></td></tr>';
												$i++;
											}
										}
										if (function_exists('qtrans_getLanguage')){
											if( qtrans_getLanguage() == 'es' ){
												$addfiled = 'Añadir <em>Blog</em>';
											}elseif( qtrans_getLanguage() == 'ca' ){
												$addfiled = 'Afegir <em>Blog</em>';
											}else{ //english
												$addfiled = 'Add <em>Blog</em>';
											}
										}else{ //Not activeQtrans
											$addfiled = 'Añadir <em>Blog</em>';
										}
										$output .= '<tr class="add-repeatable-wrap" valign="top"><th scope="row">' . $addfiled . '</th><td colspan="2"><b class="repeatable-field-add button">+</b></td></tr>';
										echo $output; ?>
                                    </table>
                                <br />
								<?php
								$other_atributes4 = array( 'id' => 'submit_gr4' );
								submit_button('','','','',$other_atributes4);
								?>
                                <br /><br />
                            </form>
                        </div><!-- /Inside -->
                    </div><!-- /ID Blog xx .postbox -->
                </div><!-- <div id="normal-sortables" class="meta-box-sortables"> -->
            </div><!-- div id='postbox-container-1' class='postbox-container' END FOREACH -->
            <!-- /Grup4 -->
        </div> <!-- div id="dashboard-widgets" class="metabox-holder" -->
    </div> <!-- /#div id="dashboard-widgets-wrap" -->
</div> <!-- /#wrap -->
<script>
var form = jQuery('form');
jQuery( form ).each(function( index, element ) {
	var formtable = jQuery( element ).find( 'tb' );
	var globalsfieldsCount = jQuery( formtable ).find('.repeatable-field-remove').length;
	if( globalsfieldsCount == 5 ) { // Límit de blogs per afegir
		jQuery( formtable ).find('.add-repeatable-wrap').css('display','none');
	}
	var button = jQuery( element ).find('input[type="submit"]');
	jQuery( button ).removeClass('button-primary');
	jQuery( element ).hover(
	  function() {
		jQuery( button ).addClass('button-primary');
	  }, function() {
		jQuery( button ).removeClass('button-primary');
	  }
	);
});
jQuery('.repeatable-field-add').click(function() {
    var theField = jQuery(this).parents('.form-table').find('tr.repeatable-wrap:last').clone(true);
    var theLocation = jQuery(this).parents('.form-table').find('tr.repeatable-wrap:last');
	//Canvi de numero al label, em i field name
    jQuery('th label', theField).attr('for', function(index, name) {
        return name.replace(/((\d+)(?!.*\d))/, function(fullMatch, n) {
            return Number(n) + 1;
       });
    });
	jQuery('th label em', theField).text( function(index,txt) {return txt.replace(/(\d+)/, function(fullMatch, n) {
            return Number(n) + 1;
       });
	});
	jQuery('td input', theField).val('').attr('value','').attr('name', function(index, name) {
        return name.replace(/((\d+)(?!.*\d))/, function(fullMatch, n) {
            return Number(n) + 1;
       });
    });
    theField.insertAfter(theLocation);
    var fieldsCount = jQuery(this).parents('.form-table').find('.repeatable-field-remove').length;
    if( fieldsCount > 1 ) {
        jQuery(this).parents('.form-table').find('.repeatable-field-remove').removeClass('repeatable-hide');
		jQuery(this).parents('.form-table').find('.repeatable-field-remove:first').addClass('repeatable-hide');
    }
	if( fieldsCount > 4 ) {
		jQuery(this).parents('.add-repeatable-wrap').css('display','none');
	}
});
jQuery('.repeatable-field-remove').click(function(){
    var fieldsCount = jQuery(this).parents('.form-table').find('.repeatable-wrap').length;
	if( fieldsCount == 5 ) { // Límit de blogs per afegir
		jQuery(this).parents('.form-table').find('.add-repeatable-wrap').css('display','table-row');
	}
	jQuery(this).parents('tr.repeatable-wrap').remove();
});
</script>