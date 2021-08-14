<?php
/**
 * Template Name: Archives Page
 *
 * This is a custom Page template for displaying an index of Archives.
 * It will display the page content above an unordered list of the different 
 * post-type archives nested with an unordered list of thier post-type items.
 *
 * @package Thematic
 * @subpackage Templates
 *
 * @link http://codex.wordpress.org/Creating_an_Archive_Index Codex: Creating an Archives Index
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
                            // action hook for placing content above #content
                            thematic_abovecontent();
            
                            // filter for manipulating the element that wraps the content 
                            echo apply_filters( 'thematic_open_id_content', '<div id="content">' . "\n\n" );
            
                            // start the loop to get the page content
                            the_post();
                            
                            // action hook for placing content above #post
                            thematic_abovepost();
                        ?>
            
                            <?php
                                echo '<div id="post-' . get_the_ID() . '" ';
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
                                        // displays the "Page" content 
                                        the_content();
            
                                        // action hook for displaying a list of archive links
                                        thematic_archives();
            
                                        //edit_post_link( __( 'Edit', 'thematic' ),'<span class="edit-link">','</span>' );
                                    ?>
            
                                </div><!-- .entry-content -->
            
                            </div><!-- #post -->
            
                        <?php
                            // action hook for placing contentbelow #post
                            thematic_belowpost();
            
                            // action hook for calling the comments_template
                            thematic_comments_template();
                        ?>
            
                        </div><!-- #content -->
            
                        <?php 
                            // action hook for placing content below #content
                            thematic_belowcontent();
                        ?> 
                     <div class="clearboth">&nbsp;</div>
                </div>
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