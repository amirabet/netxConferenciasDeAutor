<?php
/**
 * Secciones Principales para el Home
 * Esto es un SNIPPET para mostrar las páginas phermanas que comparten mismo parent
 * 

*/
?> 
<?php
global $post;
if (is_page() && ($post->post_parent)){ 
$ancestors = get_post_ancestors($post->ID);
$parent = $ancestors[0];
?>
<!-- Páginas hermanas de la que estamos y tiene mismo parent -->
	<article class="box box_nopad col2">
		<header class="main_header">
        	<?php
				echo '<h4><a href="' . get_permalink($parent) . '" title="' . get_the_title($parent) . '" target="_self">' . get_the_title($parent) . '<i class="icon-chevron-right"></i></a></h4>';
			?>
		</header>
        <?php
			$pageList = get_pages(array( 'child_of' => $parent,'sort_column' => 'menu_order','sort_order' => 'asc' )); 
			if ( $pageList ) {
			  foreach ( $pageList as $pageDiv ) {
			  	if ($pageDiv->ID == $post->ID){
					//no hagas nada
				}else{
				echo '<section id="' . $pageDiv->post_title . $pageDiv->ID . '" class="box fl linktopage">';
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
								echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" alt="' . get_the_title($pageDiv) . ' | ' . get_the_title($parent) . '"/>';//Thumb Global
							}
						}
					echo '</a>';
				echo '</section>';
			  }
			  }
			}
		?>
		<div class="clearboth">&nbsp;</div>
	</article>
<?php } ?>