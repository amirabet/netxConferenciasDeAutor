<?php
/**
 *  Template Name: Full Archive by Year
 *
 * Mostra TOTES les notícies del blog repartides per anys
 * 
 * 
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
                            echo apply_filters( 'thematic_open_id_content', '<article id="content" class="gray_leather">' . "\n\n" );
            
                            // start the loop to get the page content
                            //the_post();
                            
                            // action hook for placing content above #post
                            //thematic_abovepost();
                        	// displays the page title
                            //thematic_page_title();
						?>
                        	<header class="title-wrap">
                            	<h1>
                                	<span class="icon-wrap"><i class="icon-list-alt"></i></span>
                                	<em><?php if( qtrans_getLanguage() == 'es' ) { $all_news = 'TODAS LAS NOTICIAS'; }elseif ( qtrans_getLanguage() == 'ca' ){ $all_news = 'TOTES LES NOTÍCIES'; }else{$all_news = 'ALL NEWS ARCHIVE';}
									echo $all_news; ?>
                                    </em>
                                </h1>
                            </header> <!-- .title-wrap -->  
            				<?php
							query_posts( array( 'posts_per_page' => -1, 'post_status' => 'publish' ) );
							if( have_posts() ):
							  while( have_posts() ):
								the_post();
								echo '<section class="loop_results_compact supercompact">';
								echo '<a href="';
								the_permalink();
								echo '" title="';
								the_title();
								echo '" class="loop_text_wrap">';
								if( qtrans_getLanguage() == 'en' ) { $thematic_postfooter_date = get_the_date('Y/m/d'); }else{ $thematic_postfooter_date = get_the_date('d/m/Y'); }
								echo '<span class="date_supercompact"><i class="icon-calendar"></i>&nbsp;&nbsp';
								echo $thematic_postfooter_date;
								echo '</span>';	
								echo '<em>';								
								the_title();
								echo '</em><span class="loop_text_chevron"><span><i class="icon-chevron-right"></i></span></span></a>';
								thematic_postfooter();
								echo '</section>';
							  endwhile;
							endif;
							wp_reset_query(); ?>
                           
                            </div><!-- #content --> 
            
                        <?php 
                            // action hook for placing contentbelow #post
                            //thematic_belowpost();
            
                            // action hook for calling the comments_template
                            //thematic_comments_template();
                        ?>
            
                        </article><!-- #container -->
                <?php 
				 // action hook for placing content below #content
				 //thematic_belowcontent();
				 // calling the standard sidebar 
				thematic_sidebar();
				?>
            	<div class="clearboth">&nbsp;</div>
            </div> <!-- #container -->
            <div class="wrap_width">
				<?php include_once(get_stylesheet_directory() . '/snippet-banners.php');?>
            </div>          
        </div>
    </div>
    <span class="breaker brkr_bottom"><span class="brkr_bottom_costura"></span></span>
    <!-- /#mainwrap -->	
<?php
	// calling footer.php
	get_footer();
?>