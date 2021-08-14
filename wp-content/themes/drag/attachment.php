<?php
/**
 * Attachments Template
 *
 * Displays singular WordPress Media Library items.
 *
 * @package Thematic
 * @subpackage Templates
 *
 * @link http://codex.wordpress.org/Using_Image_and_File_Attachments Codex:Using Attachments
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
                            echo apply_filters( 'thematic_open_id_content', '<div id="content" class="gray_leather attach_content">' . "\n\n" );
            
                            // start the loop
                            while ( have_posts() ) : the_post();
            
                            // displays the page title
                            thematic_page_title();
            
                            // action hook for placing content above #post
                            //thematic_abovepost();
                        ?>
                            <?php
                                echo '<article id="post-' . get_the_ID() . '" ';
                                // Checking for defined constant to enable Thematic's post classes
                                if ( !( THEMATIC_COMPATIBLE_POST_CLASS ) ) {
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
            					<br />
                                <div class="entry-content">
            
                                    <div class="entry-attachment"><?php the_attachment_link( $post->ID, true ) ?></div>
            
                                        <?php 
                                            the_content( thematic_more_text() );
            
                                            wp_link_pages( 'before=<div class="page-link">' . __( 'Pages:', 'thematic' ) . '&after=</div>' );
                                        ?>
            
                                </div><!-- .entry-content -->
            
                            </article><!-- #post -->
            				<?php
								// creating the post footer
								//thematic_postfooter();
                            ?>
                            <?php
                                // action hook for placing contentbelow #post
                                //thematic_belowpost();
                                
                                // action hook for calling the comments_template
                                //thematic_comments_template();
                                
                                // end loop
                                endwhile;
                            ?>
            				<footer class="entry-utility post_section cf">
                            	<ul class="sub-utilities">
                                	<?php if( qtrans_getLanguage() == 'en' ) { $thematic_postfooter_date = get_the_date('Y/m/d'); }else{ $thematic_postfooter_date = get_the_date('d/m/Y'); } ?>
                                	<li class="sub-util_date"><i class="icon-calendar"></i>&nbsp;&nbsp; <a href=" <?php echo get_bloginfo('url') . ('/') . qtrans_getLanguage() . '/arxiu-de-noticies/" target="_self" title="' . $thematic_postfooter_date;?>"><?php echo $thematic_postfooter_date;?> </a> </li>
                                    <?php if( qtrans_getLanguage() == 'es' ) { $back = 'VOLVER A LA NOTICIA'; }elseif( qtrans_getLanguage() == 'ca' ) {$back = 'TORNAR A LA NOTÍCIA';}else{$back = 'BACK TO POST';} ?>
                                </ul>
                            </footer>
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