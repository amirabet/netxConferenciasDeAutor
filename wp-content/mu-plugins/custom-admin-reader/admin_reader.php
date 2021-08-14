<?php 
/****************************************************************

Permet carregar el feed RSS de diferents blogs 
desde la Pàginade COnfiguració

****************************************************************/
//
// Ampliem el temps límit per carregar els blogs
//
ini_set('max_execution_time', 90); //300 seconds = 5 minutes
//
/* WIDGETS DELS BLOGS CONFIGURABLES ************************************
*************************************************************************/
//
//Inclou el lector d'RSS
include_once( ABSPATH . WPINC . '/feed.php' );
//
//
?>
<div class="wrap">
    <?php 
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){	?>
			<h2>Lector de Blogs&nbsp;</h2>
		<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
			<h2>Lector de Blogs&nbsp;</h2>
		<?php }else{ //english ?>
			<h2>Blogs Reader&nbsp;</h2>
		<?php } 
	}else{ //Not activeQtrans?>
        <h2>Lector de Blogs&nbsp;</h2>
    <?php }  ?>
        <div id="dashboard-widgets-wrap">
            <div id="dashboard-widgets" class="metabox-holder">
                <!-- POSTBOX CONTAINER 1 **************************************** -->
                <div id='postbox-container-1' class='postbox-container'>
                    <div id="normal-sortables1" class="meta-box-sortables">
                        <!-- FOREACH BLOGS -->
                        <?php 
                        $i = 1;
                        $blogs1 = get_option('reader_config_gr1_blogs');
                        $blogs1_blog = $blogs1['blog1'];
                        if( empty ( $blogs1_blog )){
                            $output = '<div id="blog1_'.$i.'" class="postbox ">';
                            	$output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div><h3 class="hndle"><span><b>';
								if (function_exists('qtrans_getLanguage')){
									if( qtrans_getLanguage() == 'es' ){
										$output .= 'Grupo 01 > ';
									}elseif( qtrans_getLanguage() == 'ca' ){ 
										$output .= 'Grup 01 > ';
									}else{ //english
										$output .= 'Group 01 > ';
									}
                                }else{ //Not activeQtrans
									$output .= 'Grupo 01 > ';
								} //activeQtrans
								$title_grup =  get_option('reader_config_gr1_title');
                                if ( ! empty( $title_grup ) ) {
                                    $output .= $title_grup;
                                }else{
									if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){
											$output .= 'Sin título';
										}elseif( qtrans_getLanguage() == 'ca' ){ 
											$output .= 'Sense títol';
										}else{ //english
											$output .= 'No title';
										}
									}else{ //Not activeQtrans
										$output .= 'Sin título';
									}
                                }
                                $output .= '</b><br/>';
                                if (function_exists('qtrans_getLanguage')){
									if( qtrans_getLanguage() == 'es' ){
										$output .= '<em>No hay blogs configurados</em>';
									}elseif( qtrans_getLanguage() == 'ca' ){ 
										$output .= '<em>No hi ha blogs configurats</em>';
									}else{ //english
										$output .= '<em>No RSS feed set</em>';
									}
                                }else{ //Not activeQtrans
									$output .= '<em>No hay blogs configurados</em>';
								}
								$output .= '</span></h3><div class="inside">';
                                if (function_exists('qtrans_getLanguage')){
									if( qtrans_getLanguage() == 'es' ){
										$output .= '<p><b>Este Grupo no tiene ningún Blog configurado (fuente de RSS).</b></p>';
										if ( current_user_can('manage_options') ) { $output .= '<p>Puedes configurar los Blogs que aparecen en cada Grupo en la página <b><a href="admin.php?page=reader_config" target="_self">Configuración</a></b>.<br/><br/></p>'; }
									}elseif( qtrans_getLanguage() == 'ca' ){ 
										$output .= "<p><b>Aquest Grup no té cap Blog configurat (font d'RSS).</b></p>";
										$output .= "<p>Pots configurar els Blogs que apareixen a cada Grup a la pàgina <b><a href=\"admin.php?page=reader_config\" target=\"_self\">Configuració</a></b>.<br/><br/></p>";
									}else{ //english
										$output .= "<p><b>No set Blogs found(RSS feed).</b></p>";
										if ( current_user_can('manage_options') ) { $output .= "<p>Groups and Blogs can be set on <b><a href=\"admin.php?page=reader_config\" target=\"_self\">Config</a></b> page.<br/><br/></p>"; }
									}
                               	}else{ //Not activeQtrans
							   		$output .= '<p><b>Este Grupo no tiene ningún Blog configurado (fuente de RSS).</b></p>';
									if ( current_user_can('manage_options') ) { $output .= '<p>Puedes configurar los Blogs que aparecen en cada Grupo en la página <b><a href="admin.php?page=reader_config" target="_self">Configuración</a></b>.<br/><br/></p>';}
							   	}
							   	$output .= '</div>'; //Inside
                              	$output .= '</div>'; //ID Blog xx .postbox
                               	echo $output;
                        }else{ // !empty $blogs1_blog
                            foreach( $blogs1 as $blog1 ) {
                                $output = '<div id="blog1_'.$i.'" class="postbox closed">';
                                $output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div><h3 class="hndle"><span><b>';
                                $title_grup =  get_option('reader_config_gr1_title');
                                if ( ! empty( $title_grup ) ) {
                                    $output .= $title_grup;
                                }else{ //empty( $title_grup )
                                    if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){
											$output .= 'Grupo sin título';
										}elseif( qtrans_getLanguage() == 'ca' ){ 
											$output .= 'Grup sense títol';
										}else{ //english
											$output .= 'No title Group';
										}
                                	}else{ //Not activeQtrans
										$output .= 'Grupo sin título';	
									}
								} //! empty( $title_grup )
                                $output .= ' - Blog '.$i.'</b><br/>';
                                // Fetch RSS
                                $rss = fetch_feed( $blog1 );
                                if ( is_wp_error($rss) ) {
                                   $output .= '<div class="dashicons dashicons-dismiss"></div>';
                                   $output .= '&nbsp;<em>RSS Error</em>';
                                   $output .= '</span></h3><div class="inside">';
                                   $output .= '<p>';
                                   $output .= sprintf(__('<strong>RSS Error</strong>: %s'), $rss->get_error_message());
                                   $output .= '</p>';
                                    //return;
                                } elseif ( !$rss->get_item_quantity() ) {
									$output .= '<div class="dashicons dashicons-clock"></div>&nbsp;<em>';
									$output .= $rss->get_title();
									$output .= '</em></span></h3><div class="inside">';
									if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){
											$output .= '<p>Parece que aún no hay nada publicado, intenta a consultar el blog más tarde.</p>';
										}elseif( qtrans_getLanguage() == 'ca' ){ 
											$output .= '<p>Sembla que encara no hi ha res publicat, intenta consultar el blog més tard.</p>';
										}else{ //english
											$output .= "<p>There aren't any updates to show, try again later.</p>";
										}
									 }else{ //Not activeQtrans
										$output .= '<p>Parece que aún no hay nada publicado, intenta a consultar el blog más tarde.</p>';
									 }
									 $rss->__destruct();
									 unset($rss);
									 //return;
                                }else{
									$output .= $rss->get_title();
									$output .= '</span></h3><div class="inside">';
									$output .= "<ul>\n";
									if ( !isset($items) )
										 $items = 3;
									 foreach ( $rss->get_items(0, $items) as $item ) {
										  $publisher = '';
										  $feed = $item->get_feed();
										  $site_link = $feed->get_permalink();
										  $link = '';
										  $content = '';
										  $date = '';
										  $link = esc_url( strip_tags( $item->get_link() ) );
										  $title = esc_html( $item->get_title() );
										  $content = $item->get_content();
										  $content = wp_html_excerpt($content, 250, '...');
										  $date = $item->get_date('j-m-Y');
				
										$output .= "<li><span style='font-size:80%; line-height:0.9;'>" . $date . "</span><br/ ><a class='rsswidget' href='$link' target='_blank'>$title</a>\n<div class='rssSummary'>$content</div><br/ >\n";
										}
									$output .= "</ul>\n";
									if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){
											$gotoblog = 'Ir al Blog';
										}elseif( qtrans_getLanguage() == 'ca' ){ 
											$gotoblog = 'Vés al Blog';
										}else{ //english
											$gotoblog = 'Read this Blog';
										}
									}else{//Not activeQtrans
										$gotoblog = 'Ir al Blog';
									}
									$output .= '<b><a href="' . $site_link . '" target="_blank" title="' . $rss->get_title() . '" class="button ">' . $gotoblog . '</a></b><br/>'; 
									$rss->__destruct();
									unset($rss);
								}
								$output .= '</div>'; //Inside
								$output .= '</div>'; //ID Blog xx .postbox
								$i++;
								echo $output;
							} //End foreach
						} // End if Blogs
                        ?>
                    </div><!-- div id="normal-sortables" class="meta-box-sortables-->
                </div><!-- div id='postbox-container-1' class='postbox-container' -->
                <!-- FINAL POSTBOX CONTAINER 1 **************************************** -->
                <!-- POSTBOX CONTAINER 2 **************************************** -->
                <div id='postbox-container-2' class='postbox-container'>
                    <div id="normal-sortables2" class="meta-box-sortables">
                        <!-- FOREACH BLOGS -->
                        <?php 
                        $i = 1;
                        $blogs2 = get_option('reader_config_gr2_blogs');
						$blogs2_blog = $blogs2['blog1'];
						if( empty ( $blogs2_blog )){
                            $output = '<div id="blog2_'.$i.'" class="postbox ">';
							$output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div><h3 class="hndle"><span><b>';
							if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){
									$output .= 'Grupo 02 > ';
								}elseif( qtrans_getLanguage() == 'ca' ){ 
									$output .= 'Grup 02 > ';
								}else{ //english
									$output .= 'Group 02 > ';
								}
							}else{//Not activeQtrans
								$output .= 'Grupo 02 > ';
							}
							$title_grup =  get_option('reader_config_gr2_title');
							if ( ! empty( $title_grup ) ) {
								$output .= $title_grup;
							}else{
								if (function_exists('qtrans_getLanguage')){
									if( qtrans_getLanguage() == 'es' ){
										$output .= 'Sin título';
									}elseif( qtrans_getLanguage() == 'ca' ){ 
										$output .= 'Sense títol';
									}else{ //english
										$output .= 'No title';
									}
								}else{//Not activeQtrans
									$output .= 'Sin título';
								}
							}
							$output .= '</b><br/>';
							if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){
									$output .= '<em>No hay blogs configurados</em>';
								}elseif( qtrans_getLanguage() == 'ca' ){ 
									$output .= '<em>No hi ha blogs configurats</em>';
								}else{ //english
									$output .= '<em>No RSS feed set</em>';
								}
							}else{//Not activeQtrans
								$output .= '<em>No hay blogs configurados</em>';
							}
							$output .= '</span></h3><div class="inside">';
							if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){
									$output .= '<p><b>Este Grupo no tiene ningún Blog configurado (fuente de RSS).</b></p>';
									if ( current_user_can('manage_options') ) { $output .= '<p>Puedes configurar los Blogs que aparecen en cada Grupo en la página <b><a href="admin.php?page=reader_config" target="_self">Configuración</a></b>.<br/><br/></p>'; }
								}elseif( qtrans_getLanguage() == 'ca' ){ 
									$output .= "<p><b>Aquest Grup no té cap Blog configurat (font d'RSS).</b></p>";
									if ( current_user_can('manage_options') ) { $output .= "<p>Pots configurar els Blogs que apareixen a cada Grup a la pàgina <b><a href=\"admin.php?page=reader_config\" target=\"_self\">Configuració</a></b>.<br/><br/></p>"; }
								}else{ //english
									$output .= "<p><b>No set Blogs found(RSS feed).</b></p>";
									if ( current_user_can('manage_options') ) { $output .= "<p>Groups and Blogs can be set on <b><a href=\"admin.php?page=reader_config\" target=\"_self\">Config</a></b> page.<br/><br/></p>"; }
								}
						   	}else{//Not activeQtrans
								$output .= '<p><b>Este Grupo no tiene ningún Blog configurado (fuente de RSS).</b></p>';
								if ( current_user_can('manage_options') ) { $output .= '<p>Puedes configurar los Blogs que aparecen en cada Grupo en la página <b><a href="admin.php?page=reader_config" target="_self">Configuración</a></b>.<br/><br/></p>'; }
							}
						 	$output .= '</div>'; //Inside
						   	$output .= '</div>'; //ID Blog xx .postbox
						   	echo $output;
                        }else{
							foreach( $blogs2 as $blog2 ) {
								$output = '<div id="blog2_'.$i.'" class="postbox closed">';
								$output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div><h3 class="hndle"><span><b>';
								$title_grup =  get_option('reader_config_gr2_title');
								if ( ! empty( $title_grup ) ) {
									$output .= $title_grup;
								}else{
									if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){
											$output .= 'Grupo sin título';
										}elseif( qtrans_getLanguage() == 'ca' ){ 
											$output .= 'Grup sense títol';
										}else{ //english
											$output .= 'No title Group';
										}
									}else{//Not activeQtrans
										$output .= 'Grupo sin título';
									}
								}
								$output .= ' - Blog '.$i.'</b><br/>';
								// Fetch RSS
								$rss = fetch_feed( $blog2 );
								if ( is_wp_error($rss) ) {
								   $output .= '<div class="dashicons dashicons-dismiss"></div>';
								   $output .= '&nbsp;<em>RSS Error</em>';
								   $output .= '</span></h3><div class="inside">';
								   $output .= '<p>';
								   $output .= sprintf(__('<strong>RSS Error</strong>: %s'), $rss->get_error_message());
								   $output .= '</p>';
									//return;
								} elseif ( !$rss->get_item_quantity() ) {
								 $output .= '<div class="dashicons dashicons-clock"></div>&nbsp;<em>';
								 $output .= $rss->get_title();
								 $output .= '</em></span></h3><div class="inside">';
								 if (function_exists('qtrans_getLanguage')){
									 if( qtrans_getLanguage() == 'es' ){
										$output .= '<p>Parece que aún no hay nada publicado, intenta a consultar el blog más tarde.</p>';
									 }elseif( qtrans_getLanguage() == 'ca' ){ 
										$output .= '<p>Sembla que encara no hi ha res publicat, intenta consultar el blog més tard.</p>';
									 }else{ //english
										$output .= "<p>There aren't any updates to show, try again later.</p>";
									 }
								 }else{//Not activeQtrans
										$output .= '<p>Parece que aún no hay nada publicado, intenta a consultar el blog más tarde.</p>';
								 }
								 $rss->__destruct();
								 unset($rss);
								 //return;
								}else{
									$output .= $rss->get_title();
									$output .= '</span></h3><div class="inside">';
									$output .= "<ul>\n";
									if ( !isset($items) )
										 $items = 3;
									 foreach ( $rss->get_items(0, $items) as $item ) {
										  $publisher = '';
										  $feed = $item->get_feed();
										  $site_link = $feed->get_permalink();
										  $link = '';
										  $content = '';
										  $date = '';
										  $link = esc_url( strip_tags( $item->get_link() ) );
										  $title = esc_html( $item->get_title() );
										  $content = $item->get_content();
										  $content = wp_html_excerpt($content, 250, '...');
										  $date = $item->get_date('j-m-Y');
				
										$output .= "<li><span style='font-size:80%; line-height:0.9;'>" . $date . "</span><br/ ><a class='rsswidget' href='$link' target='_blank'>$title</a>\n<div class='rssSummary'>$content</div><br/ >\n";
										}
									$output .= "</ul>\n";
									if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){
											$gotoblog = 'Ir al Blog';
										}elseif( qtrans_getLanguage() == 'ca' ){ 
											$gotoblog = 'Vés al Blog';
										}else{ //english
											$gotoblog = 'Read this Blog';
										}
									}else{//Not activeQtrans
										$gotoblog = 'Ir al Blog';
									}
									$output .= '<b><a href="' . $site_link . '" target="_blank" title="' . $rss->get_title() . '" class="button ">' . $gotoblog . '</a></b><br/>'; 
									$rss->__destruct();
									unset($rss);
								}
								$output .= '</div>'; //Inside
								$output .= '</div>'; //ID Blog xx .postbox
								$i++;
								echo $output;
							} //End foreach
						} // End if Blogs
                        ?>
                    </div><!-- div id="normal-sortables" class="meta-box-sortables-->
                </div><!-- div id='postbox-container-1' class='postbox-container' -->
                <!-- FINAL POSTBOX CONTAINER 2 **************************************** -->
                <!-- POSTBOX CONTAINER 3 **************************************** -->
                <div id='postbox-container-3' class='postbox-container'>
                    <div id="normal-sortables3" class="meta-box-sortables">
                        <!-- FOREACH BLOGS -->
                        <?php 
                        $i = 1;
                        $blogs3 = get_option('reader_config_gr3_blogs');
						$blogs3_blog = $blogs3['blog1'];
						if( empty ( $blogs3_blog )){
                            $output = '<div id="blog3_'.$i.'" class="postbox ">';
							$output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div><h3 class="hndle"><span><b>';
							if (function_exists('qtrans_getLanguage')){ 
								if( qtrans_getLanguage() == 'es' ){
									$output .= 'Grupo 03 > ';
								}elseif( qtrans_getLanguage() == 'ca' ){ 
									$output .= 'Grup 03 > ';
								}else{ //english
									$output .= 'Group 03 > ';
								}
							}else{//Not activeQtrans
								$output .= 'Grupo 03 > ';
							}
							$title_grup =  get_option('reader_config_gr3_title');
							if ( ! empty( $title_grup ) ) {
								$output .= $title_grup;
							}else{
								if (function_exists('qtrans_getLanguage')){ 
									if( qtrans_getLanguage() == 'es' ){
										$output .= 'Sin título';
									}elseif( qtrans_getLanguage() == 'ca' ){ 
										$output .= 'Sense títol';
									}else{ //english
										$output .= 'No title';
									}
								}else{//Not activeQtrans
									$output .= 'Sin título';
								}
							}
							$output .= '</b><br/>';
							if (function_exists('qtrans_getLanguage')){ 
								if( qtrans_getLanguage() == 'es' ){
									$output .= '<em>No hay blogs configurados</em>';
								}elseif( qtrans_getLanguage() == 'ca' ){ 
									$output .= '<em>No hi ha blogs configurats</em>';
								}else{ //english
									$output .= '<em>No RSS feed set</em>';
								}
							}else{//Not activeQtrans
								$output .= '<em>No hay blogs configurados</em>';
							}
							$output .= '</span></h3><div class="inside">';
							if (function_exists('qtrans_getLanguage')){ 
								if( qtrans_getLanguage() == 'es' ){
									$output .= '<p><b>Este Grupo no tiene ningún Blog configurado (fuente de RSS).</b></p>';
									if ( current_user_can('manage_options') ) { $output .= '<p>Puedes configurar los Blogs que aparecen en cada Grupo en la página <b><a href="admin.php?page=reader_config" target="_self">Configuración</a></b>.<br/><br/></p>'; }
								}elseif( qtrans_getLanguage() == 'ca' ){ 
									$output .= "<p><b>Aquest Grup no té cap Blog configurat (font d'RSS).</b></p>";
									if ( current_user_can('manage_options') ) { $output .= "<p>Pots configurar els Blogs que apareixen a cada Grup a la pàgina <b><a href=\"admin.php?page=reader_config\" target=\"_self\">Configuració</a></b>.<br/><br/></p>"; }
								}else{ //english
									$output .= "<p><b>No set Blogs found(RSS feed).</b></p>";
									if ( current_user_can('manage_options') ) { $output .= "<p>Groups and Blogs can be set on <b><a href=\"admin.php?page=reader_config\" target=\"_self\">Config</a></b> page.<br/><br/></p>"; }
								}
						    }else{//Not activeQtrans
								$output .= "<p><b>Aquest Grup no té cap Blog configurat (font d'RSS).</b></p>";
								if ( current_user_can('manage_options') ) { $output .= "<p>Pots configurar els Blogs que apareixen a cada Grup a la pàgina <b><a href=\"admin.php?page=reader_config\" target=\"_self\">Configuració</a></b>.<br/><br/></p>"; }
							}
							$output .= '</div>'; //Inside
							$output .= '</div>'; //ID Blog xx .postbox
						   echo $output;
                        }else{
							foreach( $blogs3 as $blog3 ) {
								$output = '<div id="blog3_'.$i.'" class="postbox closed">';
								$output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div><h3 class="hndle"><span><b>';
								$title_grup =  get_option('reader_config_gr3_title');
								if ( ! empty( $title_grup ) ) {
									$output .= $title_grup;
								}else{
									if (function_exists('qtrans_getLanguage')){ 
										if( qtrans_getLanguage() == 'es' ){
											$output .= 'Grupo sin título';
										}elseif( qtrans_getLanguage() == 'ca' ){ 
											$output .= 'Grup sense títol';
										}else{ //english
											$output .= 'No title Group';
										}
									}else{//Not activeQtrans
										$output .= 'Grupo sin título';
									}
								}
								$output .= ' - Blog '.$i.'</b><br/>';
								// Fetch RSS
								$rss = fetch_feed( $blog3 );
								if ( is_wp_error($rss) ) {
								   $output .= '<div class="dashicons dashicons-dismiss"></div>';
								   $output .= '&nbsp;<em>RSS Error</em>';
								   $output .= '</span></h3><div class="inside">';
								   $output .= '<p>';
								   $output .= sprintf(__('<strong>RSS Error</strong>: %s'), $rss->get_error_message());
								   $output .= '</p>';
									//return;
								} elseif ( !$rss->get_item_quantity() ) {
								 $output .= '<div class="dashicons dashicons-clock"></div>&nbsp;<em>';
								 $output .= $rss->get_title();
								 $output .= '</em></span></h3><div class="inside">';
								 if (function_exists('qtrans_getLanguage')){ 
									if( qtrans_getLanguage() == 'es' ){
										$output .= '<p>Parece que aún no hay nada publicado, intenta a consultar el blog más tarde.</p>';
									}elseif( qtrans_getLanguage() == 'ca' ){ 
										$output .= '<p>Sembla que encara no hi ha res publicat, intenta consultar el blog més tard.</p>';
									}else{ //english
										$output .= "<p>There aren't any updates to show, try again later.</p>";
									}
								}else{//Not activeQtrans
									$output .= '<p>Parece que aún no hay nada publicado, intenta a consultar el blog más tarde.</p>';
								}
								 $rss->__destruct();
								 unset($rss);
								 //return;
								}else{
									$output .= $rss->get_title();
									$output .= '</span></h3><div class="inside">';
									$output .= "<ul>\n";
									if ( !isset($items) )
										 $items = 3;
									 foreach ( $rss->get_items(0, $items) as $item ) {
										  $publisher = '';
										  $feed = $item->get_feed();
										  $site_link = $feed->get_permalink();
										  $link = '';
										  $content = '';
										  $date = '';
										  $link = esc_url( strip_tags( $item->get_link() ) );
										  $title = esc_html( $item->get_title() );
										  $content = $item->get_content();
										  $content = wp_html_excerpt($content, 250, '...');
										  $date = $item->get_date('j-m-Y');
				
										$output .= "<li><span style='font-size:80%; line-height:0.9;'>" . $date . "</span><br/ ><a class='rsswidget' href='$link' target='_blank'>$title</a>\n<div class='rssSummary'>$content</div><br/ >\n";
										}
									$output .= "</ul>\n";
									if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){
											$gotoblog = 'Ir al Blog';
										}elseif( qtrans_getLanguage() == 'ca' ){ 
											$gotoblog = 'Vés al Blog';
										}else{ //english
											$gotoblog = 'Read this Blog';
										}
									}else{//Not activeQtrans
										$gotoblog = 'Ir al Blog';
									}
									$output .= '<b><a href="' . $site_link . '" target="_blank" title="' . $rss->get_title() . '" class="button ">' . $gotoblog . '</a></b><br/>'; 
									$rss->__destruct();
									unset($rss);
								}
								$output .= '</div>'; //Inside
								$output .= '</div>'; //ID Blog xx .postbox
								$i++;
								echo $output;
							} //End foreach
                        }//End if
						?>
                    </div><!-- div id="normal-sortables" class="meta-box-sortables-->
                </div><!-- div id='postbox-container-1' class='postbox-container' -->
                <!-- FINAL POSTBOX CONTAINER 3 **************************************** -->
                <!-- POSTBOX CONTAINER 4 **************************************** -->
                <div id='postbox-container-4' class='postbox-container'>
                    <div id="normal-sortables4" class="meta-box-sortables">
                        <!-- FOREACH BLOGS -->
                        <?php 
                        $i = 1;
                        $blogs4 = get_option('reader_config_gr4_blogs');
						$blogs4_blog = $blogs4['blog1'];
						if( empty ( $blogs4_blog )){
                            $output = '<div id="blog4_'.$i.'" class="postbox ">';
							$output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div><h3 class="hndle"><span><b>';
							if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){
									$output .= 'Grupo 04 > ';
								}elseif( qtrans_getLanguage() == 'ca' ){ 
									$output .= 'Grup 04 > ';
								}else{ //english
									$output .= 'Group 04 > ';
								}
							}else{//Not activeQtrans
								$output .= 'Grupo 04 > ';
							}
							$title_grup =  get_option('reader_config_gr4_title');
							if ( ! empty( $title_grup ) ) {
								$output .= $title_grup;
							}else{
								if (function_exists('qtrans_getLanguage')){
									if( qtrans_getLanguage() == 'es' ){
										$output .= 'Sin título';
									}elseif( qtrans_getLanguage() == 'ca' ){ 
										$output .= 'Sense títol';
									}else{ //english
										$output .= 'No title';
									}
								}else{//Not activeQtrans
									$output .= 'Sin título';
								}
							}
							$output .= '</b><br/>';
							if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){
									$output .= '<em>No hay blogs configurados</em>';
								}elseif( qtrans_getLanguage() == 'ca' ){ 
									$output .= '<em>No hi ha blogs configurats</em>';
								}else{ //english
									$output .= '<em>No RSS feed set</em>';
								}
							}else{//Not activeQtrans
								$output .= '<em>No hay blogs configurados</em>';
							}
							$output .= '</span></h3><div class="inside">';
							if (function_exists('qtrans_getLanguage')){
								if( qtrans_getLanguage() == 'es' ){
									$output .= '<p><b>Este Grupo no tiene ningún Blog configurado (fuente de RSS).</b></p>';
									if ( current_user_can('manage_options') ) { $output .= '<p>Puedes configurar los Blogs que aparecen en cada Grupo en la página <b><a href="admin.php?page=reader_config" target="_self">Configuración</a></b>.<br/><br/></p>'; }
								}elseif( qtrans_getLanguage() == 'ca' ){ 
									$output .= "<p><b>Aquest Grup no té cap Blog configurat (font d'RSS).</b></p>";
									if ( current_user_can('manage_options') ) { $output .= "<p>Pots configurar els Blogs que apareixen a cada Grup a la pàgina <b><a href=\"admin.php?page=reader_config\" target=\"_self\">Configuració</a></b>.<br/><br/></p>"; }
								}else{ //english
									$output .= "<p><b>No set Blogs found(RSS feed).</b></p>";
									if ( current_user_can('manage_options') ) { $output .= "<p>Groups and Blogs can be set on <b><a href=\"admin.php?page=reader_config\" target=\"_self\">Config</a></b> page.<br/><br/></p>"; }
								}
							}else{//Not activeQtrans
								$output .= '<p><b>Este Grupo no tiene ningún Blog configurado (fuente de RSS).</b></p>';
								if ( current_user_can('manage_options') ) { $output .= '<p>Puedes configurar los Blogs que aparecen en cada Grupo en la página <b><a href="admin.php?page=reader_config" target="_self">Configuración</a></b>.<br/><br/></p>'; }
							}
						    $output .= '</div>'; //Inside
							$output .= '</div>'; //ID Blog xx .postbox
						   echo $output;
                        }else{
							foreach( $blogs4 as $blog4 ) {
								$output = '<div id="blog4_'.$i.'" class="postbox closed">';
								$output .= '<div class="handlediv" title="Haz clic para cambiar"><br /></div><h3 class="hndle"><span><b>';
								$title_grup =  get_option('reader_config_gr4_title');
								if ( ! empty( $title_grup ) ) {
									$output .= $title_grup;
								}else{
									if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){
											$output .= 'Grupo sin título';
										}elseif( qtrans_getLanguage() == 'ca' ){ 
											$output .= 'Grup sense títol';
										}else{ //english
											$output .= 'No title Group';
										}
									}else{//Not activeQtrans
										$output .= 'Grupo sin título';
									}
								}
								$output .= ' - Blog '.$i.'</b><br/>';
								// Fetch RSS
								$rss = fetch_feed( $blog4 );
								if ( is_wp_error($rss) ) {
								   $output .= '<div class="dashicons dashicons-dismiss"></div>';
								   $output .= '&nbsp;<em>RSS Error</em>';
								   $output .= '</span></h3><div class="inside">';
								   $output .= '<p>';
								   $output .= sprintf(__('<strong>RSS Error</strong>: %s'), $rss->get_error_message());
								   $output .= '</p>';
									//return;
								} elseif ( !$rss->get_item_quantity() ) {
								 $output .= '<div class="dashicons dashicons-clock"></div>&nbsp;<em>';
								 $output .= $rss->get_title();
								 $output .= '</em></span></h3><div class="inside">';
								 if (function_exists('qtrans_getLanguage')){
									 if( qtrans_getLanguage() == 'es' ){
										 $output .= '<p>Parece que aún no hay nada publicado, intenta a consultar el blog más tarde.</p>';
									 }elseif( qtrans_getLanguage() == 'ca' ){ 
										 $output .= '<p>Sembla que encara no hi ha res publicat, intenta consultar el blog més tard.</p>';
									 }else{ //english
										$output .= "<p>There aren't any updates to show, try again later.</p>";
									 }
								 }else{//Not activeQtrans
									$output .= '<p>Parece que aún no hay nada publicado, intenta a consultar el blog más tarde.</p>';
								 }
								 $rss->__destruct();
								 unset($rss);
								 //return;
								}else{
									$output .= $rss->get_title();
									$output .= '</span></h3><div class="inside">';
									$output .= "<ul>\n";
									if ( !isset($items) )
										 $items = 3;
									 foreach ( $rss->get_items(0, $items) as $item ) {
										  $publisher = '';
										  $feed = $item->get_feed();
										  $site_link = $feed->get_permalink();
										  $link = '';
										  $content = '';
										  $date = '';
										  $link = esc_url( strip_tags( $item->get_link() ) );
										  $title = esc_html( $item->get_title() );
										  $content = $item->get_content();
										  $content = wp_html_excerpt($content, 250, '...');
										  $date = $item->get_date('j-m-Y');
				
										$output .= "<li><span style='font-size:80%; line-height:0.9;'>" . $date . "</span><br/ ><a class='rsswidget' href='$link' target='_blank'>$title</a>\n<div class='rssSummary'>$content</div><br/ >\n";
										}
									$output .= "</ul>\n";
									if (function_exists('qtrans_getLanguage')){
										if( qtrans_getLanguage() == 'es' ){
											$gotoblog = 'Ir al Blog';
										}elseif( qtrans_getLanguage() == 'ca' ){ 
											$gotoblog = 'Vés al Blog';
										}else{ //english
											$gotoblog = 'Read this Blog';
										}
									}else{//Not activeQtrans
										$gotoblog = 'Ir al Blog';
									}
									$output .= '<b><a href="' . $site_link . '" target="_blank" title="' . $rss->get_title() . '" class="button ">' . $gotoblog . '</a></b><br/>'; 
									$rss->__destruct();
									unset($rss);
								}
								$output .= '</div>'; //Inside
								$output .= '</div>'; //ID Blog xx .postbox
								$i++;
								echo $output;
							} //End foreach
                        } // End if
						?>
                    </div><!-- div id="normal-sortables" class="meta-box-sortables-->
                </div><!-- div id='postbox-container-1' class='postbox-container' -->
                <!-- FINAL POSTBOX CONTAINER 4 **************************************** -->
            </div> <!-- div id="dashboard-widgets" class="metabox-holder" -->
        </div> <!-- /#div id="dashboard-widgets-wrap" -->
</div> <!-- /#wrap -->
<script>
jQuery('body.toplevel_page_reader').css('background','none');
var widget = jQuery('.inside');
jQuery( widget ).each(function( index, element ) {
	var button = jQuery( element ).find('a.button');
	jQuery( element ).hover(
	  function() {
		jQuery( button ).addClass('button-primary');
	  }, function() {
		jQuery( button ).removeClass('button-primary');
	  }
	);
});
</script>