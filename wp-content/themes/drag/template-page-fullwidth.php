<?php
/**
 * Template Name: P&Aacute;GINA SIN BARRA LATERAL
 *
 * This Full Width template removes the primary and secondary asides so that content
 * can be displayed the entire width of the #content area.
 * 
 * @package Thematic
 * @subpackage Templates
 */

    // calling the header.php
    get_header('nomain');

    // action hook for placing content above #container
    thematic_abovecontainer();
?>
<!-- Dentro del #wrapper -->
	<!-- Incluimos el carrusel Flexslider a 100% width-->
	<?php include_once(get_stylesheet_directory() . '/snippet-flexslider.php');?>
    <!-- Costura Superior -->
    <span class="breaker brkr_top"><span class="brkr_top_costura"></span></span>
 <!-- Main Full + contenidos -->
    <div id="main_wrap">
        <div id="main_full">
            <div class="blue_textil">
                <div class="wrap_width container_wrap">
                    <div id="container">
                    
                        <?php
                            // action hook for inserting content above #content
                            thematic_abovecontent();		
                        
                            // filter for manipulating the element that wraps the content 
                            echo apply_filters( 'thematic_open_id_content', '<article id="content" class="gray_leather">' . "\n\n" );
                        
                            // calling the widget area 'page-top'
                            //get_sidebar('page-top');
                
                            // start the loop
                            while ( have_posts() ) : the_post();
                            
                            // action hook for inserting content above #post
                            thematic_abovepost();
                        ?>
                            
                            <?php
                                echo '<section id="post-' . get_the_ID() . '" ';
                                // Checking for defined constant to enable Thematic's post classes
                                if ( ! ( THEMATIC_COMPATIBLE_POST_CLASS ) ) {
                                    post_class();
                                    echo '>';
                                } else {
                                    echo 'class="';
                                    thematic_post_class();
                                    echo '">';
                                }
            
                                // creating the post header
                                thematic_postheader();
                            ?>
                                
                                <div class="entry-content">
                
                                    <?php
                                        the_content();
                                    
                                        //wp_link_pages( "\t\t\t\t\t<div class='page-link'>" . __( 'Pages: ', 'thematic' ), "</div>\n", 'number' );
                                    
                                        //edit_post_link( __( 'Edit', 'thematic' ), '<span class="edit-link">','</span>' );
                                    ?>
                
                                </div>
                                
                            </section><!-- .post -->
                
                        <?php
                            // calls the do_action for inserting content below #post
                            //thematic_belowpost();
                                        
                            // action hook for calling the comments_template
                            //thematic_comments_template();
                            
                            // end loop
                            endwhile;
                        
                            // calling the widget area 'page-bottom'
                            //get_sidebar( 'page-bottom' );
                        ?>
                
                        </article><!-- #content -->
                        
                        <?php 
                            // action hook for inserting content below #content
                            thematic_belowcontent(); 
                        ?> 
                     <div class="clearboth">&nbsp;</div>
                </div>
                <div class="clearboth">&nbsp;</div>
                <div class="wrap_width">
                    <?php include_once(get_stylesheet_directory() . '/snippet-banners.php');?>
                </div>
            </div>           
        </div>
    </div>
    <span class="breaker brkr_bottom"><span class="brkr_bottom_costura"></span></span>
    <!-- /#mainwrap -->	
<?php
	// calling footer.php
	get_footer();
?>