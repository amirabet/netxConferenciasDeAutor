<?php
/**
 * Single Post Template
 *
 * …
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
                        // action hook for placing content above #content
                        thematic_abovecontent();
                                
                        // filter for manipulating the element that wraps the content 
                        echo apply_filters( 'thematic_open_id_content', '<div id="content" class="gray_leather">' . "\n\n" );
                                    
                        // start the loop
                        while ( have_posts() ) : the_post();
                        
                        // create the navigation above the content
                        thematic_navigation_above();
                
                        // calling the widget area 'single-top'
                        get_sidebar('single-top');
                
                        // action hook creating the single post
                        thematic_singlepost();
                        
                        // calling the widget area 'single-insert'
                        get_sidebar('single-insert');
                
                        // create the navigation below the content
                        thematic_navigation_below();
                        
                        // end the loop
                        endwhile;
                
                        // calling the widget area 'single-bottom'
                        get_sidebar('single-bottom');
                    ?>
                
                    </div><!-- #content -->
                    
                    <?php
                        // action hook for placing content below #content
                        //thematic_belowcontent();
                    ?> 
                    </div><!-- #container -->
                    <?php  // calling the standard sidebar 
					thematic_sidebar();
					?>
                    <div class="clearboth">&nbsp;</div>
                    <?php  //YARPP RELATEDO POSTS
						related_posts();
					?>
                </div>
                <div class="wrap_width">
                    <?php include_once(get_stylesheet_directory() . '/snippet-banners.php');?>
                </div>
            </div>           
        </div>
    </div>
	<span class="breaker brkr_bottom"><span class="brkr_bottom_costura"></span></span>

<?php     
    // calling footer.php
    get_footer();
?>