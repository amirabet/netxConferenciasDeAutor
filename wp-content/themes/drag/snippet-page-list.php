<?php
/**
 * Muestra un listado con todas las páginas de la web
 * 
 * 

*/
?> 
<?php
//global $post;
?> 
<!-- Cortinas -->
<article class="box box_nopad col2 page_list">
    <header class="main_header">
    	<?php  
			echo '<h3><a href="' . get_permalink(8) . '" target="_self">' . get_the_title(8) . '<i class="icon-chevron-right"></i></a></h3>';
            $metaheader = get_post_meta(8, 'metadescription', true);
            echo '<p>' . substr ($metaheader,0,130) . ' ...</p>';
        ?>
    </header>
    <?php
        $pageList = get_pages('sort_order=asc&sort_column=menu_order&child_of=8'); //Listado de paginas
        if ( $pageList ) {
            $arrayCount = 0;//Ponemos contador a 0
            foreach ( $pageList as $pageDiv ) {
                echo '<section id="' . $pageDiv->post_title . $pageDiv->ID . '" class="box fl col2 linktopage">';
                    echo '<a href="' . get_permalink($pageDiv) . '" title="' . $pageDiv->post_title . '" target="_self">';
                    echo '<em>' . $pageDiv->post_title . '</em>';
                        if ( has_post_thumbnail($pageDiv->ID) ) {
                            echo get_the_post_thumbnail($pageDiv->ID, 'medium');
                        }
                        else {
							if(has_post_thumbnail( 8 )) {
								$attr = array(
                                'title' => get_the_title($pageDiv) . ' | ' . get_the_title($parent) ,
                                'alt' => get_the_title($pageDiv) . ' | ' . get_the_title($parent)
                            );
								echo get_the_post_thumbnail(8, 'medium', $attr);//Thumb del Parent
							}
							else {
								echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" alt="' . get_the_title($pageDiv) . ' | ' . get_the_title($parent) . '"/>';//Thumb Global
							}
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
<!-- Toldos -->
<article class="box box_nopad col2 page_list">
    <header class="main_header">
    	<?php  
			echo '<h3><a href="' . get_permalink(10) . '" target="_self">' . get_the_title(10) . '<i class="icon-chevron-right"></i></a></h3>';
            $metaheader = get_post_meta(10, 'metadescription', true);
            echo '<p>' . substr ($metaheader,0,130) . ' ...</p>';
        ?>
    </header>
    <?php
        $pageList = get_pages('sort_order=asc&sort_column=menu_order&child_of=10'); //Listado de paginas
        if ( $pageList ) {
            $arrayCount = 0;//Ponemos contador a 0
            foreach ( $pageList as $pageDiv ) {
                echo '<section id="' . $pageDiv->post_title . $pageDiv->ID . '" class="box fl col2 linktopage">';
                    echo '<a href="' . get_permalink($pageDiv) . '" title="' . $pageDiv->post_title . '" target="_self">';
                    echo '<em>' . $pageDiv->post_title . '</em>';
                        if ( has_post_thumbnail($pageDiv->ID) ) {
                            echo get_the_post_thumbnail($pageDiv->ID, 'medium');
                        }
                         else {
							if(has_post_thumbnail( 10 )) {
								$attr = array(
                                'title' => get_the_title($pageDiv) . ' | ' . get_the_title($parent) ,
                                'alt' => get_the_title($pageDiv) . ' | ' . get_the_title($parent)
                            );
								echo get_the_post_thumbnail(10, 'medium', $attr);//Thumb del Parent
							}
							else {
								echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" alt="' . get_the_title($pageDiv) . ' | ' . get_the_title($parent) . '"/>';//Thumb Global
							}
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
<div class="clearboth">&nbsp;</div>
<!-- Descanso -->
<article class="box box_nopad col2 page_list">
    <header class="main_header">
    	<?php  
			echo '<h3><a href="' . get_permalink(12) . '" target="_self">' . get_the_title(12) . '<i class="icon-chevron-right"></i></a></h3>';
            $metaheader = get_post_meta(12, 'metadescription', true);
            echo '<p>' . substr ($metaheader,0,130) . ' ...</p>';
        ?>
    </header>
    <?php
        $pageList = get_pages('sort_order=asc&sort_column=menu_order&child_of=12'); //Listado de paginas
        if ( $pageList ) {
            $arrayCount = 0;//Ponemos contador a 0
            foreach ( $pageList as $pageDiv ) {
                echo '<section id="' . $pageDiv->post_title . $pageDiv->ID . '" class="box fl col2 linktopage">';
                    echo '<a href="' . get_permalink($pageDiv) . '" title="' . $pageDiv->post_title . '" target="_self">';
                    echo '<em>' . $pageDiv->post_title . '</em>';
                        if ( has_post_thumbnail($pageDiv->ID) ) {
                            echo get_the_post_thumbnail($pageDiv->ID, 'medium');
                        }
                         else {
							if(has_post_thumbnail( 12 )) {
								$attr = array(
                                'title' => get_the_title($pageDiv) . ' | ' . get_the_title($parent) ,
                                'alt' => get_the_title($pageDiv) . ' | ' . get_the_title($parent)
                            );
								echo get_the_post_thumbnail(12, 'medium', $attr);//Thumb del Parent
							}
							else {
								echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" alt="' . get_the_title($pageDiv) . ' | ' . get_the_title($parent) . '"/>';//Thumb Global
							}
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
<!-- Textil Hogar -->
<article class="box box_nopad col2 page_list">
    <header class="main_header">
    	<?php  
			echo '<h3><a href="' . get_permalink(14) . '" target="_self">' . get_the_title(14) . '<i class="icon-chevron-right"></i></a></h3>';
            $metaheader = get_post_meta(14, 'metadescription', true);
            echo '<p>' . substr ($metaheader,0,130) . ' ...</p>';
        ?>
    </header>
    <?php
        $pageList = get_pages('sort_order=asc&sort_column=menu_order&child_of=14'); //Listado de paginas
        if ( $pageList ) {
            $arrayCount = 0;//Ponemos contador a 0
            foreach ( $pageList as $pageDiv ) {
                echo '<section id="' . $pageDiv->post_title . $pageDiv->ID . '" class="box fl col2 linktopage">';
                    echo '<a href="' . get_permalink($pageDiv) . '" title="' . $pageDiv->post_title . '" target="_self">';
                    echo '<em>' . $pageDiv->post_title . '</em>';
                        if ( has_post_thumbnail($pageDiv->ID) ) {
                            echo get_the_post_thumbnail($pageDiv->ID, 'medium');
                        }
                         else {
							if(has_post_thumbnail( 14 )) {
								$attr = array(
                                'title' => get_the_title($pageDiv) . ' | ' . get_the_title($parent) ,
                                'alt' => get_the_title($pageDiv) . ' | ' . get_the_title($parent)
                            );
								echo get_the_post_thumbnail(14, 'medium', $attr);//Thumb del Parent
							}
							else {
								echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" alt="' . get_the_title($pageDiv) . ' | ' . get_the_title($parent) . '"/>';//Thumb Global
							}
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