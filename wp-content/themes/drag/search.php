<?php
/**
 * Search Template
 *
 * …
 * 
 * @package Thematic
 * @subpackage Templates
 */

    // calling the header.php
    get_header('nomain');
	// action hook for placing content above #container
    thematic_abovecontainer(); ?>
    <?php include_once(get_stylesheet_directory() . '/snippet-flexslider.php');?>
     <!-- Costura Superior -->
    <span class="breaker brkr_top"><span class="brkr_top_costura"></span></span>
    <div id="main_wrap">
		<?php         
            if (have_posts()) {
                // displays the page title
                //thematic_page_title();?>
                <div id="main_full">
                    <div class="blue_textil">
                        <div class="wrap_width container_wrap">
                            <div id="container">
								<?php
                                // action hook for placing content above #content
                                thematic_abovecontent();
                
                                // filter for manipulating the element that wraps the content 
                                echo apply_filters( 'thematic_open_id_content', '<article id="content" class="gray_leather">' . "\n\n" );
                            
                                // displays the page title
                                thematic_page_title();
                    
                                // action hook creating the tag loop
                                thematic_searchloop();?>
                             
                            <footer class="foot_paged">
                            <?php
                            // create the navigation below the content
                            
                            thematic_navigation_below();
                            ?>
                            </footer>
                
                            </article><!-- #content -->
                            
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
                <?php } else {
            
                // action hook for inserting content above #post
                //thematic_abovepost();
           ?>
           	<div class="gray_leather">
                <article class="wrap_width">
                <!-- Inicio del MAIN -->
                    <h2>
                        <?php if( qtrans_getLanguage() == 'es' ){ ?>"<i><?php the_search_query();?></i>" no ha devuelto resultados.
                        <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>"<i><?php the_search_query();?></i>" no ha retornat resultats.
                        <?php }elseif( qtrans_getLanguage() == 'en' ){ ?>"<i><?php the_search_query();?></i>" has no results.
                        <?php } ?>
                    </h2>
                    <header id="form_info" class="header404">
                        <!-- <p>Tal vez te interese alguna de las páginas del menú que tienes a continuación.</p> -->
                        <p><em>
                            <?php if( qtrans_getLanguage() == 'es' ){ ?>Puedes realizar una nueva búsqueda o visitar alguno de los siguientes recursos.
                            <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>Pots realitzar una nova cerca o visitar alguns dels següents recursos.
                            <?php }elseif( qtrans_getLanguage() == 'en' ){ ?>You can make a new query or visit one of this resources.
                            <?php } ?>
                        </em></p>
                    </header>
                    <section id="form_wrap" class="header404"><div class="search_f msg"><?php thematic_search_form();?><div class="clearboth">&nbsp;</div></div></section>
                    <div class="clearboth"></div>
                </article>
        	</div>
            <div class="clearboth"></div>
            <div class="blue_textil blue_textil2">
                <span class="breaker2"></span>
                	<?php include_once(get_stylesheet_directory() . '/snippet-lastnews.php');?>
            <?php
                // action hook for inserting content below #post
                //thematic_belowpost();
            }
            ?>
                <div class="wrap_width">
					<?php include_once(get_stylesheet_directory() . '/snippet-banners.php');?>
                    <div class="clearboth">&nbsp;</div>
                </div>
            </div>
            
        <?php 
            // action hook for inserting content below #content
            //thematic_belowcontent(); 
        ?>
    </div><!-- #container -->
    <span class="breaker brkr_bottom"><span class="brkr_bottom_costura"></span></span>

<?php 
    // action hook for placing content below #container
    //thematic_belowcontainer();

    // calling the standard sidebar 
    //thematic_sidebar();
    
    // calling footer.php
    get_footer();
?>