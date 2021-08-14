<?php
//****************************************************************************************/
//
//  Child Theme NEXT Conferencias de Autor Functions
//  
//  FUNCTIONS > BODY > MAIN > LOOPS --> Controla l'output dels loops de WP
//
//********************************************************************************************/
// ELIMINA ETIQUETES <P> de les descripcioins de les taxonimies
remove_filter('term_description','wpautop');
// LOOPS *************************************************************************************
// Evita que es dupluquin posts fent amb multiples categories
$bmIgnorePosts = array();
/**
 * add a post id to the ignore list for future query_posts
 */
function bm_ignorePost ($id) {
	if (!is_page()) {
		global $bmIgnorePosts;
		$bmIgnorePosts[] = $id;
	}
}
/**
 * reset the ignore list
 */
function bm_ignorePostReset () {
	global $bmIgnorePosts;
	$bmIgnorePosts = array();
}
/**
 * remove the posts from query_posts
 */
function bm_postStrip ($where) {
	global $bmIgnorePosts, $wpdb;
	if (count($bmIgnorePosts) > 0) {
		$where .= ' AND ' . $wpdb->posts . '.ID NOT IN(' . implode (',', $bmIgnorePosts) . ') ';
	}
	return $where;
}
add_filter ('posts_where', 'bm_postStrip');
// Loop general AUTORES
// Format dels Sticky Posts (eliminats del Loop) ////////////////////////////////////////////
function childtheme_override_index_loop_featured() {
    if ( is_home()){
		$sticky = get_option('sticky_posts');
		if (!empty($sticky)) {
			query_posts(array('post__in'=>$sticky, 'orderby'=>"rand"));
			if(have_posts()) :
				$i = 1;
				$readmore_wrap = 0;
				while(have_posts()) : the_post();
				$category = get_the_category(); ?>
					<?php if ( $i == 3 || $i == 6 || $i == 10 || $i == 15 ) {?> 
						<article class="loop_results loop_autores loop_results_featured loop_results_featured">
							<a href="<?php echo get_category_link( $category[0]->cat_ID);?>" target="_self" title="<?php echo $category[0]->cat_name; ?>" class="loop_autores_cat animated"><i class="fa <?php the_field('cat_icon', 'category_'.$category[0]->cat_ID); ?>"></i><?php echo $category[0]->cat_name; ?>
							</a>
							<a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title(); ?>" id="post-<?php the_ID();?>" class="loop_autores_link animated">
								<?php if ( has_post_thumbnail() ) {
									the_post_thumbnail('autor');
								}else{
									echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/autor_nothumb.jpg" alt="' . get_the_title() . '"/>';
								} ?>
								<em><?php the_title(); ?></em>
								<i>"<?php the_field('eslogan_autor'); ?>"</i>
								<span class="clearboth"></span>
							</a>
							<?php the_tags( '<footer>', ' -', '<div class="clearboth"></div> </footer>' ); ?>
						</article>
					<?php }else{ ?>
						<article class="loop_results loop_autores loop_results_compact">
							<a href="<?php echo get_category_link( $category[0]->cat_ID);?>" target="_self" title="<?php echo $category[0]->cat_name; ?>" class="loop_autores_cat animated"><i class="fa <?php the_field('cat_icon', 'category_'.$category[0]->cat_ID); ?>"></i><?php echo $category[0]->cat_name; ?>
							</a> 
							<a href="<?php the_permalink(); ?>" title="<?php echo the_title() ?>" id="post-<?php the_ID();?>" class="loop_autores_link animated">
								<?php if ( has_post_thumbnail() ) {
									echo get_the_post_thumbnail(get_the_ID(),'autor');
								}else{
									echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/autor_nothumb.jpg" alt="' . get_the_title() . '"/>';
								}?>
								<em><?php the_title() ?></em>
							</a> 
						</article>
					<?php } //END if ( $i>6 )?>
				<?php $i++;
				endwhile;
			endif;
			wp_reset_query();
		} //if (!empty($sticky)) { 
		//
		//<span class="brkr brkr50 big_screen"></span>
		//<div class="clearboth"></div> ?>
	<?php }//end if_home
}
add_action('thematic_above_indexloop', 'childtheme_override_index_loop_featured');
//override the index loop and remove the sticky posts, which will now be handled by the slider
function childtheme_override_index_loop() {
	global $post;
	query_posts( array ("post__not_in" =>get_option("sticky_posts"), 'orderby' => 'rand', 'posts_per_page' => -1) );
	if ( have_posts() ):
		$i = 1;
		$readmore_wrap = 0;
		while ( have_posts() ) :
			bm_ignorePost($post->ID);
			the_post(); 
			$category = get_the_category(); 
			//Readmore
			if ( $i == 36 ) {  // Limitem els autors no destacats que apareixen amb READMORE
				$readmore_wrap =  1 ;?>
				<section class="wrap_readmore">
					<span class="readmore"><span class="readmore_button"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span></span>
					<section class="readmore_content">
			
			<?php } //END if ( $i == 12 ) {
			//Formats
			if ( $i == 1 || $i == 5 || $i == 10 || $i == 14) {?> 
				<article class="loop_results loop_autores loop_results_featured loop_results_featured">
					<a href="<?php echo get_category_link( $category[0]->cat_ID);?>" target="_self" title="<?php echo $category[0]->cat_name; ?>" class="loop_autores_cat animated"><i class="fa <?php the_field('cat_icon', 'category_'.$category[0]->cat_ID); ?>"></i><?php echo $category[0]->cat_name; ?>
					</a>
					<a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title(); ?>" id="post-<?php the_ID();?>" class="loop_autores_link animated">
						<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail('autor');
						}else{
							echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/autor_nothumb.jpg" alt="' . get_the_title() . '"/>';
						} ?>
						<em><?php the_title(); ?></em>
						<i>"<?php the_field('eslogan_autor', $post->ID); ?>"</i>
						<span class="clearboth"></span>
					</a>
					<?php the_tags( '<footer>', ' -', '<div class="clearboth"></div> </footer>' ); ?>
				</article>
			<?php }else{ ?>
				<article class="loop_results loop_autores loop_results_compact">
					<a href="<?php echo get_category_link( $category[0]->cat_ID);?>" target="_self" title="<?php echo $category[0]->cat_name; ?>" class="loop_autores_cat animated"><i class="fa <?php the_field('cat_icon', 'category_'.$category[0]->cat_ID); ?>"></i><?php echo $category[0]->cat_name; ?>
					</a> 
					<a href="<?php the_permalink(); ?>" title="<?php echo the_title() ?>" id="post-<?php the_ID();?>" class="loop_autores_link animated">
						<?php if ( has_post_thumbnail() ) {
							echo get_the_post_thumbnail(get_the_ID(),'autor');
						}else{
							echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/autor_nothumb.jpg" alt="' . get_the_title() . '"/>';
						}?>
						<em><?php the_title() ?></em>
					</a> 
				</article>
			<?php } //END if ( $i>6 )?>
			<?php if ( $i==24 ) :
					//24 condition
			endif;
			$i++;?> 
		<?php endwhile;
		if ( $readmore_wrap == 1 ) {  
			echo '</section></section>';
		}?> 
		<div class="clearboth"></div> 
	<?php endif;?>
<?php }
// ARCHIVE LOOP *********************************************************
function childtheme_override_archive_loop() {
	global $post;
	$category = get_the_category(); 
	if ( is_post_type_archive('news')){
		while ( have_posts() ) : the_post();?>
			<section id="post-<?php the_ID(); ?>" class="loop_results_compact">
				<a href="<?php echo get_permalink() ?>" title=" <?php echo get_the_title() ?>" target="_self" class="loop_thumb_wrap animated">
				<?php if ( has_post_thumbnail() ) {
					echo get_the_post_thumbnail(get_the_ID(),'loop_thumb');
				}
				else {
					echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" alt="' . get_the_title() . '" />';
				}?>
				</a>
				<a href="<?php echo get_permalink() ?>" title=" <?php echo get_the_title() ?>" target="_self" class="loop_text_wrap animated">
					<em><?php echo get_the_title() ?></em>
					<?php $my_excerpt = get_the_excerpt();
					if (function_exists('qtrans_getLanguage')){
						if( qtrans_getLanguage() == 'es' ){
							$metafield = get_post_meta(get_the_ID(), 'metadescription_es', true);
						}elseif( qtrans_getLanguage() == 'ca' ){
							$metafield = get_post_meta(get_the_ID(), 'metadescription_ca', true);
						}else{
							$metafield = get_post_meta(get_the_ID(), 'metadescription_en', true);
						}
					}else{
						$metafield = get_post_meta(get_the_ID(), 'metadescription_es', true);
					}
					if (!empty ($metafield)){
						echo '<span class="pagelist_text">' . $metafield . '</span>';
					}
					elseif (!empty ($my_excerpt)){
						echo '<span class="pagelist_text">' . $my_excerpt . '</span>';
					}else{
						echo '<span class="pagelist_text">' . get_the_title() . '</span>';
					} ?>
					<span class="loop_text_chevron"><span><i class="icon-chevron-right"></i></span></span>
				</a>
					<?php thematic_postfooter(); ?>
			</section><!-- #post --> <?php 
		endwhile;
	}elseif ( is_post_type_archive('events')){
		echo 'Events archive bro!';
	}else{ //Autores
		while ( have_posts() ) : the_post();?>
		<article class="loop_results loop_autores loop_results_featured loop_results_featured">
			<a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title(); ?>" class="loop_autores_link animated">
				<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail('autor');
				}else{
					echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/autor_nothumb.jpg" alt="' . get_the_title() . '"/>';
				} ?>
				<em><?php the_title(); ?></em>
				<i>"<?php the_field('eslogan_autor', $post->ID); ?>"</i>
				<span class="clearboth"></span>
			</a>
			<?php the_tags( '<footer>', ' -', '<div class="clearboth"></div> </footer>' ); ?>
		</article>
	<?php endwhile;
	}
}
// CATEGORY LOOP *********************************************************
function childtheme_override_category_loop() {
	global $post;
	while ( have_posts() ) : the_post();
		if ( is_post_type_archive('news')){
			/*?>
			<article class="loop_results loop_autores loop_results_featured">
				<a href="<?php echo get_category_link( $category[0]->cat_ID);?>" target="_self" title="<?php echo $category[0]->cat_name; ?>"><i class="fa <?php the_field('cat_icon', 'category_'.$category[0]->cat_ID); ?>"></i><?php echo $category[0]->cat_name; ?>
				</a>
				<a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title(); ?>">
					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail('autor');
					}else{
						echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/autor_nothumb.jpg" alt="' . the_title() . '"/>';
					} ?>
					<em><?php the_title(); ?></em>
					<span><?php the_excerpt(); ?></span>
				</a>
				<?php the_tags( '<footer>', ' -', '<div class="clearboth"></div> </footer>' ); ?>
			</article>
			*/ ?>
			<section id="post-<?php the_ID(); ?>" class="loop_results_compact">
				<a href="<?php echo get_permalink() ?>" title=" <?php echo get_the_title() ?>" target="_self" class="loop_thumb_wrap animated">
				<?php
					if ( has_post_thumbnail() ) {
					echo get_the_post_thumbnail(get_the_ID(),'loop_thumb');
					}
					else {
						echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" alt="' . the_title() . '"/>';
					}
				?>
				</a>
				<a href="<?php echo get_permalink() ?>" title=" <?php echo get_the_title() ?>" target="_self" class="loop_text_wrap animated">
					<em><?php echo get_the_title() ?></em>
					<?php $my_excerpt = get_the_excerpt();
					if (function_exists('qtrans_getLanguage')){
						if( qtrans_getLanguage() == 'es' ){
							$metafield = get_post_meta(get_the_ID(), 'metadescription_es', true);
						}elseif( qtrans_getLanguage() == 'ca' ){
							$metafield = get_post_meta(get_the_ID(), 'metadescription_ca', true);
						}else{
							$metafield = get_post_meta(get_the_ID(), 'metadescription_en', true);
						}
					}else{
						$metafield = get_post_meta(get_the_ID(), 'metadescription_es', true);
					}
					if (!empty ($metafield)){
						echo '<span class="pagelist_text">' . $metafield . '</span>';
					}
					elseif (!empty ($my_excerpt)){
						echo '<span class="pagelist_text">' . $my_excerpt . '</span>';
					}else{
						echo '<span class="pagelist_text">' . get_the_title() . '</span>';
					} ?>
					<span class="loop_text_chevron"><span><i class="icon-chevron-right"></i></span></span>
				</a>
					<?php thematic_postfooter(); ?>
			</section><!-- #post --> <?php 
	}elseif ( is_post_type_archive('events')){?>
		<article class="loop_results loop_autores loop_results_featured loop_results_featured_cat">
			<a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title(); ?>" class="animated">
				<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail('autor');
				}else{
					echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/autor_nothumb.jpg" alt="' . get_the_title() . '"/>';
				} ?>
				<em><?php the_title(); ?></em>
				<i>"<?php the_field('eslogan_autor', $post->ID); ?>"</i>
				<span class="clearboth"></span>
			</a>
			<?php the_tags( '<footer>', ' -', '</footer>' ); ?>
		</article>
	<?php }else{ //Autors ?>
		<article class="loop_results loop_autores loop_results_featured">
			<a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title(); ?>" class="loop_autores_link animated">
				<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail('autor');
				}else{
					echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/autor_nothumb.jpg" alt="' . get_the_title() . '"/>';
				} ?>
				<em><?php the_title(); ?></em>
				<i>"<?php the_field('eslogan_autor', $post->ID); ?>"</i>
				<span class="clearboth"></span>
			</a>
			<?php the_tags( '<footer>', ' -', '</footer>' ); ?>
		</article>
	<?php } //END if posty types
	endwhile;
}
// TAG LOOP *********************************************************
function childtheme_override_tag_loop() {
	global $post;
	while ( have_posts() ) : the_post();
		$category = get_the_category(); 
		if ( is_post_type_archive('news')){?>
			<section id="post-<?php the_ID(); ?>" class="loop_results_compact">
				<a href="<?php echo get_permalink() ?>" title=" <?php echo get_the_title() ?>" target="_self" class="loop_thumb_wrap animated">
				<?php
					if ( has_post_thumbnail() ) {
					echo get_the_post_thumbnail(get_the_ID(),'loop_thumb');
					}else{
						echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" />';
					}?>
				</a>
				<a href="<?php echo get_permalink() ?>" title=" <?php echo get_the_title() ?>" target="_self" class="loop_text_wrap animated">
					<em><?php echo get_the_title() ?></em>
					<?php $my_excerpt = get_the_excerpt();
					if (function_exists('qtrans_getLanguage')){
						if( qtrans_getLanguage() == 'es' ){
							$metafield = get_post_meta(get_the_ID(), 'metadescription_es', true);
						}elseif( qtrans_getLanguage() == 'ca' ){
							$metafield = get_post_meta(get_the_ID(), 'metadescription_ca', true);
						}else{
							$metafield = get_post_meta(get_the_ID(), 'metadescription_en', true);
						}
					}else{
						$metafield = get_post_meta(get_the_ID(), 'metadescription_es', true);
					}
					if (!empty ($metafield)){
						echo '<span class="pagelist_text">' . $metafield . '</span>';
					}
					elseif (!empty ($my_excerpt)){
						echo '<span class="pagelist_text">' . $my_excerpt . '</span>';
					}else{
						echo '<span class="pagelist_text">' . get_the_title() . ' ...</span>';
					} ?>
					<span class="loop_text_chevron"><span><i class="icon-chevron-right"></i></span></span>
				</a>
					<?php thematic_postfooter(); ?>
			</section><!-- #post --> <?php 
		}elseif ( is_post_type_archive('events')){
			echo 'Autors archive';
		}else{ //Autors ?>
			<article class="loop_results loop_autores loop_results_featured loop_results_expand animated">
				<a href="<?php echo get_category_link( $category[0]->cat_ID);?>" target="_self" title="<?php echo $category[0]->cat_name; ?>" class="loop_autores_cat animated"><i class="fa <?php the_field('cat_icon', 'category_'.$category[0]->cat_ID); ?>"></i><?php echo $category[0]->cat_name; ?>
				</a>
				<a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title(); ?>" class="loop_autores_link animated">
					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail('autor');
					}else{
						echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/autor_nothumb.jpg" alt="' . get_the_title() . '"/>';
					} ?>
					<em><?php the_title(); ?></em>
					<i>"<?php the_field('eslogan_autor', $post->ID); ?>"</i>
					<b><?php the_excerpt(); ?></b>
					<span class="clearboth"></span>
				</a>
				<?php 
				the_tags( '<footer>', ' |', '<div class="clearboth"></div></footer>' ); ?>
			</article>
		<?php } //END if posty types
	endwhile;
}
// SEARCH LOOP **************************************************************
function childtheme_override_search_loop() {
	global $post;
	while ( have_posts() ) : the_post();
		$category = get_the_category(); 
		if ($post->post_type == 'news') {
			$object = get_post_type_object( 'news' );
			echo $object->labels->singular_name;?>
			<section id="post-<?php the_ID(); ?>" class="loop_results_compact">
				<a href="<?php echo get_permalink() ?>" title=" <?php echo get_the_title() ?>" target="_self" class="loop_thumb_wrap animated">
				<?php
					if ( has_post_thumbnail() ) {
					echo get_the_post_thumbnail(get_the_ID(),'loop_thumb');
					}
					else {
						echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" />';
					}
				?>
				</a>
				<a href="<?php echo get_permalink() ?>" title=" <?php echo get_the_title() ?>" target="_self" class="loop_text_wrap animated">
					<em><?php echo get_the_title() ?></em>
					<?php $my_excerpt = get_the_excerpt();
					if (function_exists('qtrans_getLanguage')){
						if( qtrans_getLanguage() == 'es' ){
							$metafield = get_post_meta(get_the_ID(), 'metadescription_es', true);
						}elseif( qtrans_getLanguage() == 'ca' ){
							$metafield = get_post_meta(get_the_ID(), 'metadescription_ca', true);
						}else{
							$metafield = get_post_meta(get_the_ID(), 'metadescription_en', true);
						}
					}else{
						$metafield = get_post_meta(get_the_ID(), 'metadescription_es', true);
					}
					if (!empty ($metafield)){
						echo '<span class="pagelist_text">' . $metafield . '</span>';
					}
					elseif (!empty ($my_excerpt)){
						echo '<span class="pagelist_text">' . $my_excerpt . '</span>';
					}else{
						echo '<span class="pagelist_text">' . get_the_title() . '</span>';
					} ?>
					<span class="loop_text_chevron"><span><i class="icon-chevron-right"></i></span></span>
				</a>
					<?php if ( get_post_type() == 'post' ){ thematic_postfooter(); }?>
			</section><!-- #post --> <?php 
		}elseif ($post->post_type == 'events') {
			$object = get_post_type_object( 'events' );
			echo $object->labels->singular_name;
		}else{ //Autores ?>
			<article class="loop_results loop_autores loop_results_featured loop_results_expand animated">
				<a href="<?php echo esc_url( home_url( '/autores/' ) ); ?>" target="_self" title="<?php  ?>" class="loop_autores_cat animated">AUTORES</a>
				<a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title(); ?>" class="loop_autores_link animated">
					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail('autor');
					}else{
						echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/autor_nothumb.jpg" alt="' . get_the_title() . '"/>';
					} ?>
					<em><?php the_title(); ?></em>
					<i>"<?php the_field('eslogan_autor', $post->ID); ?>"</i>
					<b><?php the_excerpt(); ?></b>
					<span class="clearboth"></span>
				</a>
				<?php 
				$cat_link = '<a href="' . get_category_link( $category[0]->cat_ID) . '" target="_self" title="' . $category[0]->cat_name . '" class="loop_results_expand_footer_cat">' . $category[0]->cat_name . '</a> ';
				the_tags( '<footer>' . $cat_link . ' |', ' -', '<div class="clearboth"></div> </footer>' ); ?>
			</article>
		<?php } //END if post types
	endwhile;
}
// AUTHOR LOOP *********************************************************
function childtheme_override_author_loop() {
	global $post;
	echo '<section id="authorloop" class="loop_results_wrap">';
	while ( have_posts() ) : the_post();
		if ($post->post_type == 'news') {
			$object = get_post_type_object( 'news' );
			echo $object->labels->singular_name;?>
			<section id="post-<?php the_ID(); ?>" class="loop_results_compact">
				<a href="<?php echo get_permalink() ?>" title=" <?php echo get_the_title() ?>" target="_self" class="loop_thumb_wrap">
				<?php
					if ( has_post_thumbnail() ) {
					echo get_the_post_thumbnail(get_the_ID(),'loop_thumb');
					}
					else {
						echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" />';
					}
				?>
				</a>
				<a href="<?php echo get_permalink() ?>" title=" <?php echo get_the_title() ?>" target="_self" class="loop_text_wrap">
					<em><?php echo get_the_title() ?></em>
					<?php $my_excerpt = get_the_excerpt();
					if (function_exists('qtrans_getLanguage')){
						if( qtrans_getLanguage() == 'es' ){
							$metafield = get_post_meta(get_the_ID(), 'metadescription_es', true);
						}elseif( qtrans_getLanguage() == 'ca' ){
							$metafield = get_post_meta(get_the_ID(), 'metadescription_ca', true);
						}else{
							$metafield = get_post_meta(get_the_ID(), 'metadescription_en', true);
						}
					}else{
						$metafield = get_post_meta(get_the_ID(), 'metadescription_es', true);
					}
					if (!empty ($metafield)){
						echo '<span class="pagelist_text">' . $metafield . '</span>';
					}
					elseif (!empty ($my_excerpt)){
						echo '<span class="pagelist_text">' . $my_excerpt . '</span>';
					}else{
						echo '<span class="pagelist_text">' . get_the_title() . '</span>';
					} ?>
					<span class="loop_text_chevron"><span><i class="icon-chevron-right"></i></span></span>
				</a>
					<?php if ( get_post_type() == 'post' ){ thematic_postfooter(); }?>
			</section><!-- #post --> <?php 
		}elseif ($post->post_type == 'events') {
			$object = get_post_type_object( 'events' );
			echo $object->labels->singular_name;
		}else{ //Autores ?>
			<article class="loop_results loop_autores loop_results_featured loop_results_expand animated">
				<a href="<?php ?>" target="_self" title="<?php  ?>">AUTORES</a>
				<a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title(); ?>">
					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail('autor');
					}else{
						echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/autor_nothumb.jpg" alt="' . get_the_title() . '"/>';
					} ?>
					<em><?php the_title(); ?></em>
					<i>"<?php the_field('eslogan_autor', $post->ID); ?>"</i>
					<span class="clearboth"></span>
				</a>
				<?php the_tags( '<footer>', ' -', '<div class="clearboth"></div> </footer>' ); ?>
			</article>
		<?php } //END if post types
	endwhile;
	echo '</section>';
}
// PAGINACIÓ PELS LOOPS
// remove single page nav below functionality
function childtheme_override_nav_below() {
    if ( is_search() || is_archive() ) {
        global $wp_query, $wp_rewrite;
		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
		$pagination = array(
			'base' => @add_query_arg('page','%#%'),
			'format' => '',
			'total' => $wp_query->max_num_pages,
			'current' => $current,
			'show_all' => true,
			'type' => 'list',
			'next_text' => '<i class="fa fa-angle-right"></i>',
			'prev_text' => '<i class="fa fa-angle-left"></i>'
			);
		if( $wp_rewrite->using_permalinks() )
			if ( is_search()){
				if (function_exists('qtrans_getLanguage')){
					if( qtrans_getLanguage() == 'es' ){ 
						$qlang = qtrans_getLanguage() . '/';
					}elseif( qtrans_getLanguage() == 'ca' ){ 
						$qlang = qtrans_getLanguage() . '/';
					}elseif( qtrans_getLanguage() == 'en' ){ 
						$qlang = qtrans_getLanguage() . '/';
					} 
				}else{
					$qlang = '';
				}
				$pagination['base'] = get_bloginfo('url') . ('/') . $qlang . 'page/%#%/';
				$cq = $_GET['s'];
				$sq = str_replace(" ", "+", $cq);
			}else{
        		$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
			}
		if( !empty($wp_query->query_vars['s']) )
			$pagination['add_args'] = array( 's' => $sq);
		echo paginate_links( $pagination );
    }
}