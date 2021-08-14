<?php
/**
 * Index Template
 *
 * This file is required by WordPress to recoginze Thematic as a valid theme.
 * It is also the default template WordPress will use to display your web site,
 * when no other applicable templates are present in this theme's root directory
 * that apply to the query made to the site.
 * 
 * WP Codex Reference: http://codex.wordpress.org/Template_Hierarchy
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
                            
                            // create the navigation above the content
                            thematic_navigation_above();
                            
                            // calling the widget area 'index-top'
                            get_sidebar('index-top');
                            
                            // action hook for placing content above the index loop
                            thematic_above_indexloop();
                            
                            // action hook creating the index loop
                            thematic_indexloop();
                            
                            // action hook for placing content below the index loop
                            thematic_below_indexloop();
                            
                            // calling the widget area 'index-bottom'
                            get_sidebar('index-bottom');
                            
                            // create the navigation below the content
                            thematic_navigation_below();
                        ?>
            
                        </div><!-- #content -->
            
                        <?php
                            // action hook for placing content below #content
                            thematic_belowcontent();
                        ?>
                    </div><!-- #container -->
<?php  // calling the standard sidebar 
						thematic_sidebar();
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