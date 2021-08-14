<?php
/**
 * Secciones Principales para el Home y las páginas MADRE
 * Esto es un SNIPPET para mostrar las páginas principales en la página HOME
 * 

*/
?> 
<?php
global $post;
if ( is_front_page() ) {?> 
<!-- Secciones relacionadas HOME -->
	<article class="box box_nopad col1">
		<header class="main_header">
			<h3>Bienvenido a Comercial Romera</h3>
			<?php 
				$metaheader = get_post_meta($post->ID, 'metadescription', true);
				echo '<p>' . $metaheader . '</p>';
			?>
		</header>
		<?php
			$pageList = get_pages('sort_order=asc&sort_column=menu_order&parent=0&exclude=4,17'); //Excluimos la página de INICIO y de CONTACTO
			if ( $pageList ) {
				$arrayCount = 0;//Ponemos contador a 0
				foreach ( $pageList as $pageDiv ) {
					echo '<section id="' . $pageDiv->post_title . $pageDiv->ID . '" class="box fl col2 linktopage">';
						echo '<a href="' . get_permalink($pageDiv) . '" title="' . $pageDiv->post_title . '" target="_self">';
						echo '<em>'. $pageDiv->post_title .'</em>';
							if ( has_post_thumbnail($pageDiv->ID) ) {
								echo get_the_post_thumbnail($pageDiv->ID, 'medium');
							}
							else {
								echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" />';
							}
							$metafield = get_post_meta($pageDiv->ID, 'metadescription', $single);
							if (!empty ($metafield)){
								echo '<span class="pagelist_text">' . substr ($metafield,0,130) . ' ...' . '<i class="icon-circle-arrow-right"></i>' . '</span>';
							}
							else{
								echo '<span class="pagelist_text">' . $pageDiv->post_title . '<i class="icon-circle-arrow-right"></i>' . '</span>';
							}
						echo '</a>';
					echo '</section>';
					$arrayCount++;//Contador +1 en cada iteración
					if ( ($arrayCount%2 ==0) ) {//Si Contador es un número par incluye un clarboth para que no se casque el layout
						echo '<div class="clearboth">&nbsp;</div>';
					}
				}
			}
		?>
		<div class="clearboth">&nbsp;</div>
	</article>
<?php }elseif (is_page() && ($post->post_parent==$pageID)){ ?>
<!-- Secciones relacionadas PÁGINAS PRINCIPALES -->
		<article class="box box_nopad col1">
		<header class="main_header">
        	<?php
				echo '<h3>' . get_the_title($ID) . '</h3>';
				$metaheader = get_post_meta($post->ID, 'metadescription', true);
				echo '<p>' . $metaheader . '</p>';
			?>
		</header>
        <?php
			$pageList = get_pages(array( 'child_of' => $post->ID,'sort_column' => 'menu_order','sort_order' => 'asc' )); 
			if ( $pageList ) {
				$arrayCount = 0;//Ponemos contador a 0
			  	foreach ( $pageList as $pageDiv ) {
					echo '<section id="' . $pageDiv->post_title . $pageDiv->ID . '" class="box fl col2 linktopage">';
						echo '<a href="' . get_permalink($pageDiv) . '" title="' . $pageDiv->post_title . ' | ' . get_the_title($parent) . '" target="_self">';
						echo '<em>'. $pageDiv->post_title .'</em>';
							if ( has_post_thumbnail($pageDiv->ID) ) {
								$attr = array(
									'title' => get_the_title($pageDiv) . ' | ' . get_the_title($parent) ,
									'alt' => get_the_title($pageDiv) . ' | ' . get_the_title($parent)
									);
								echo get_the_post_thumbnail($pageDiv->ID, 'medium', $attr);//Thumb de la página
							}
							else {
								if(has_post_thumbnail( $parent )) {
									$attr = array(
										'title' => get_the_title($pageDiv) . ' | ' . get_the_title($parent) ,
										'alt' => get_the_title($pageDiv) . ' | ' . get_the_title($parent)
										);
									echo get_the_post_thumbnail($parent, 'medium', $attr);//Thumb del Parent
								}
								else {
									echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" alt="' . $pageDiv->post_title . ' | ' . get_the_title($parent) . '"/>';//Thumb Global
								}
							}
							$metafield = get_post_meta($pageDiv->ID, 'metadescription', $single);
							if (!empty ($metafield)){;
								echo '<span class="pagelist_text">' . substr($metafield, 0, 130) . ' ...' . '<i class="icon-circle-arrow-right"></i>' . '</span>';
							}
							else{
								echo '<span class="pagelist_text">' . $pageDiv->post_title . '<i class="icon-circle-arrow-right"></i>' . '</span>';
							}
						echo '</a>';
					echo '</section>';
					$arrayCount++; //Contador +1 en cada iteración
					if ( ($arrayCount%2 ==0) ) {//Si Contador es un número par incluye un clarboth para que no se casque el layout
						echo '<div class="clearboth">&nbsp;</div>';
					}
			  	}
			}
		?>
		<div class="clearboth">&nbsp;</div>
	</article>
<?php }elseif (is_search()){ ?>
<!-- Secciones relacionadas HOME -->
	<article class="box box_nopad col1">
		<header class="main_header">
			<h3>Secciones Principales</h3>
            <p>Si no has encontrado lo que buscabas, tal vez te interese alguno de estos recursos:</p>
		</header>
		<?php
			$pageList = get_pages('sort_order=asc&sort_column=menu_order&parent=0&exclude=4,17'); //Excluimos la página de INICIO y de CONTACTO
			if ( $pageList ) {
				$arrayCount = 0;//Ponemos contador a 0
				foreach ( $pageList as $pageDiv ) {
					echo '<section id="' . $pageDiv->post_title . $pageDiv->ID . '" class="box fl col2 linktopage">';
						echo '<a href="' . get_permalink($pageDiv) . '" title="' . $pageDiv->post_title . '" target="_self">';
						echo '<em>'. $pageDiv->post_title .'</em>';
							if ( has_post_thumbnail($pageDiv->ID) ) {
								echo get_the_post_thumbnail($pageDiv->ID, 'medium');
							}
							else {
								echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" />';
							}
							$metafield = get_post_meta($pageDiv->ID, 'metadescription', true);
							if (!empty ($metafield)){
								echo '<span class="pagelist_text">' . substr ($metafield,0,130) . ' ...' . '<i class="icon-circle-arrow-right"></i>' . '</span>';
							}
							else{
								echo '<span class="pagelist_text">' . $pageDiv->post_title . '<i class="icon-circle-arrow-right"></i>' . '</span>';
							}
						echo '</a>';
					echo '</section>';
					$arrayCount++;//Contador +1 en cada iteración
					if ( ($arrayCount%2 ==0) ) {//Si Contador es un número par incluye un clearboth para que no se casque el layout
						echo '<div class="clearboth">&nbsp;</div>';
					}
				}
			}
		?>
		<div class="clearboth">&nbsp;</div>
	</article>
<?php }?>