<?php
/**
 * Page Template
 *
 * …
 * 
 * @package Thematic
 * @subpackage Templates
 */
 ///
 // Plugin Aviso Legal
$web_array = get_option('legal_web');
if ( isset($web_array['id_legal']) && $web_array['id_legal'] != '' ){$id_legal = $web_array['id_legal'];}else{$id_legal = '9999';}
 
    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();
	
?>

		<div id="container">
		
			<?php
				// action hook for placing content above #content
				thematic_abovecontent();

				// filter for manipulating the element that wraps the content 
				echo apply_filters( 'thematic_open_id_content', '<div id="content">' . "\n" );
				//
				// FRONT PAGE ***************** (ID = 5)
				//
				// PAGE ESPECÍFICA ***************** (ID = 11) [CONTRATACIÓN]
				if (is_page(11)) { include (get_stylesheet_directory() . '/layout/main-page11.php');
				// PAGE ESPECÍFICA ***************** (ID = var) [AVISO LEGAL] --> La Id desde wpadmin
				} elseif (is_page($id_legal)) { include (get_stylesheet_directory() . '/layout/snippet_legal.php');
				// PAGE ESPECÍFICA ***************** (ID = 422) [SPEAKERS] --> una llista amb els autors
				} elseif (is_page(496)) { include (get_stylesheet_directory() . '/layout/main-page_speakers.php');
				//
				// PAGE *****************
				} else {
					// calling the widget area 'page-top'
					get_sidebar('page-top');
		
					// start the loop
					while ( have_posts() ) : the_post();

					// action hook for placing content above #post
					thematic_abovepost();
					?>
						
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> > 

					<?php
						
						// creating the post header
						thematic_postheader();
					?>
						
						<div class="entry-content">
		
							<?php
								the_content();
							
								wp_link_pages( "\t\t\t\t\t<div class='page-link'>" . __( 'Pages: ', 'thematic' ), "</div>\n", 'number' );
							
								edit_post_link( __( 'Edit', 'thematic' ), "\n\t\t\t\t\t\t" . '<span class="edit-link">' , '</span>' . "\n" );
							?>

						</div><!-- .entry-content -->
						
					</div><!-- #post -->
		
				<?php
					// action hook for inserting content below #post
					thematic_belowpost();
								
					// action hook for calling the comments_template
					thematic_comments_template();
					
					// end loop
					endwhile;
				
					// calling the widget area 'page-bottom'
					get_sidebar( 'page-bottom' );
	        } //FINAL IF PAGES
			?>
			</div><!-- #content -->
			
			<?php 
				// action hook for placing content below #content
				thematic_belowcontent(); 
			?> 
			
		</div><!-- #container -->

<?php 
	//
    // action hook for placing content below #container
    thematic_belowcontainer();

    // calling the standard sidebar 
    thematic_sidebar();
    
    // calling footer.php
    get_footer();
?>