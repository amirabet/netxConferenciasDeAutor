<?php
//
//  Child's Play (a child theme for Thematic) Functions
//


//<BODY> **********************************************************************************************************
//******************************************************************************************************************************


//<BODY> - search  ******************************************************************************************************

// Títol de la Pàgina ****************************************************************************************
function childtheme_override_page_title() {
    global $post;
        $content = "\t\t\t\t";
        $content .= '<header class="title-wrap">';
        if (is_attachment()) {
                $content .= '<h2><a href="';
                $content .= apply_filters('the_permalink',get_permalink($post->post_parent));
                $content .= '" rev="attachment" title="' . get_the_title($post->post_parent) . '">';
                $content .= '<i class="icon-file"></i></a>';
				$content .= '<em>' . get_the_title($post->post_parent) . '</em>';
				if( qtrans_getLanguage() == 'es' ){ $content .= ': Archivos adjuntos.';
				}elseif( qtrans_getLanguage() == 'ca' ){ $content .= ": Arxius adjunts.";
				}elseif( qtrans_getLanguage() == 'en' ){ $content .= ': Attached files.';
				}
				$content .= '</h2>';
        } elseif (is_author()) {
                $content .= '<h1>';
                $content .= '<span class="icon-wrap"><i class="icon-pencil"></i></span>';
				$author = get_the_author_meta( 'nickname', $post->post_author );
                $content .= '<em>' . $author . '</em>';
				if( qtrans_getLanguage() == 'es' ){ $content .= ': Archivo del autor.';
				}elseif( qtrans_getLanguage() == 'ca' ){ $content .= ": Arxiu de l'autor.";
				}elseif( qtrans_getLanguage() == 'en' ){ $content .= ': Author Archive.';
				}
                $content .= '</h1>';
        } elseif (is_category()) {
                $content .= '<h1>';
				$queried_object = get_queried_object(); 
				$taxonomy = $queried_object->taxonomy;
				$term_id = $queried_object->term_id; 
				$iconcat = get_field('cat_icon', $taxonomy . '_' . $term_id);
                $content .= '<span class="icon-wrap"><i class="' . $iconcat . '"></i></span>';
                $content .= '<em>' . single_cat_title('', FALSE) . '</em>';
				if( qtrans_getLanguage() == 'es' ){ $content .= ': Archivo de la categoría.';
				}elseif( qtrans_getLanguage() == 'ca' ){ $content .= ': Arxiu de la categoria.';
				}elseif( qtrans_getLanguage() == 'en' ){ $content .= ': Category Archive.';
				}
                $content .= '</h1>' . "\n";
        } elseif (is_search()) {
                $content .= '<h1>';
                $content .= '<span class="icon-wrap"><i class="icon-search"></i></span>';
                $content .= '<em>' . get_search_query() . '</em>';
                if( qtrans_getLanguage() == 'es' ){ $content .= ': Resultados de la búsqueda.';
				}elseif( qtrans_getLanguage() == 'ca' ){ $content .= ': Resultats de la cerca.';
				}elseif( qtrans_getLanguage() == 'en' ){ $content .= ': Search Results.';
				}
				$content .= '</h1>';
        } elseif (is_tag()) {
                $content .= '<h1>';
				$content .= '<span class="icon-wrap"><i class="icon-tag"></i></span>';
                $content .= '<em>' . single_tag_title( '', false ) .'</em>';
                if( qtrans_getLanguage() == 'es' ){ $content .= ': Archivo temático.';
				}elseif( qtrans_getLanguage() == 'ca' ){ $content .= ': Arxiu temàtic.';
				}elseif( qtrans_getLanguage() == 'en' ){ $content .= ': Tag archive.';
				}
                $content .= '</h1>';
        } elseif (is_tax()) {
                global $taxonomy;
                $content .= '<h1>';
				$content .= '<span class="icon-wrap"><i class="icon-archive"></i></span>';
                $tax = get_taxonomy($taxonomy);
                $content .= '<em>' . $tax->labels->singular_name . '</em>';
                $content .= thematic_get_term_name();
                $content .= '</h1>';
        } elseif (is_post_type_archive() && is_archive() ) {
                $content .= '<h1>';
                $post_type_obj = get_post_type_object( get_post_type() );
				$content .= '<span class="icon-wrap"><i class="icon-calendar"></i></span>';
                $post_type_name = $post_type_obj->labels->singular_name;
                $content .= '<em>' . $post_type_name . '</em>';
				if( qtrans_getLanguage() == 'es' ){ $content .= ': Archivos.';
				}elseif( qtrans_getLanguage() == 'ca' ){ $content .= ': Arxius.';
				}elseif( qtrans_getLanguage() == 'en' ){ $content .= ': Archives.';
				}
                $content .= '</h1>';
        } elseif (is_day()) {
                $content .= '<h1>';
				$content .= '<span class="icon-wrap"><i class="icon-calendar"></i></span>';
                $content .= '<em>' . get_the_time(get_option('date_format')) . '</em>';
                if( qtrans_getLanguage() == 'es' ){ $content .= ': Archivo cronológico.';
				}elseif( qtrans_getLanguage() == 'ca' ){ $content .= ': Arxiu cronològic.';
				}elseif( qtrans_getLanguage() == 'en' ){ $content .= ': ' . sprintf(__('Daily Archives', 'thematic'));
				}
				$content .= '</h1>';
        } elseif (is_month()) {
                $content .= '<h1>';
				$content .= '<span class="icon-wrap"><i class="icon-calendar"></i></span>';
                $content .= '<em>' . get_the_time('F Y') . '</em>';
                if( qtrans_getLanguage() == 'es' ){ $content .= ': Archivo cronológico.';
				}elseif( qtrans_getLanguage() == 'ca' ){ $content .= ': Arxiu cronològic.';
				}elseif( qtrans_getLanguage() == 'en' ){ $content .= ': ' . sprintf(__('Monthly Archives', 'thematic'));
				}
				$content .= '</h1>';
        } elseif (is_year()) {
                $content .= '<h1>';
				$content .= '<span class="icon-wrap"><i class="icon-calendar"></i></span>';
                $content .= '<em>' . get_the_time('Y') . '</em>';
                if( qtrans_getLanguage() == 'es' ){ $content .= ': Archivo cronológico.';
				}elseif( qtrans_getLanguage() == 'ca' ){ $content .= ': Arxiu cronològic.';
				}elseif( qtrans_getLanguage() == 'en' ){ $content .= ': ' . sprintf(__('Yearly Archives', 'thematic'));
				}
				$content .= '</h1>';
        }
        $content .= "\n";
        $content .= "</header> <!-- .title-wrap -->";
    echo apply_filters('thematic_page_title', $content);
}
//<BODY> - output del POST ****************************************************************************************************************************
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
// Format dels Sticky Posts (eliminats del Loop)
function childtheme_flexslider_slider() {
    if ( is_home() ) {
        ?>
        <header class="title-wrap">
        	<h1>
            	<span class="icon-wrap"><i class="icon-fire"></i></span>
                <em><?php if( qtrans_getLanguage() == 'es' ){ $content = 'NOTICIAS DESTACADAS';
				}elseif( qtrans_getLanguage() == 'ca' ){ $content = 'NOTÍCIES DESTACADES';
				}elseif( qtrans_getLanguage() == 'en' ){ $content = 'FEATURES NEWS';
				} 
				echo $content?>
                </em>
            </h1>
        </header>
        <article class="loop_featured_wrap">
			<?php
            query_posts(array('post__in'=>get_option('sticky_posts'), 'numberposts' => 2, 'orderby'=>"post_date"));
            if(have_posts()) :
            while(have_posts()) : the_post();
            ?>
                <section class="loop_results_featured">
                <a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title(); ?>">
                	<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail('featured-slider');
					}
					else {
						echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" />';
					} ?>
                    <em><?php the_title(); ?></em>
                    <?php the_excerpt(); ?>
                </a>
                <?php thematic_postfooter(); ?>
                </section>
            <?php
            endwhile;
            endif;
                wp_reset_query();
            ?>
        	<span class="brkr brkr50 big_screen"></span>
            <div class="clearboth"></div> 
        </article>
    <?php }
}
add_action('thematic_above_indexloop', 'childtheme_flexslider_slider');
//override the index loop and remove the sticky posts, which will now be handled by the slider
function childtheme_override_index_loop() {
	global $post;
	$categories = get_categories( array ('orderby' => 'id', 'order' => 'asc' ) ); 
 	foreach ($categories as $category) :
		query_posts( array ("post__not_in" =>get_option("sticky_posts"), 'category_name' => $category->slug, 'showposts' => '4', 'orderby' => 'date', 'order' => 'DESC' ) ); ?>
        <article class="loop_expand_wrap">
            <header class="title-wrap">
                <h2 class="entry_title post_header">
                    <a href="<?php echo get_category_link($category->term_id); ?>" target="_self" title="<?php single_cat_title() ?>"><i class="<?php the_field('cat_icon', 'category_'.$category->cat_ID); ?>"></i></a> 
                    <?php single_cat_title(); ?>
                </h2>
            </header>
            <span class="loop_expand_news_wrap">
            <?php if ( have_posts() ): ?>
				<?php $i = 1; ?>
                <?php while ( have_posts() ) : ?>
                    <?php bm_ignorePost($post->ID); ?>
                    <?php the_post(); ?> 
                    <section id="post-<?php the_ID(); ?>" class="loop_results_expand">
                        <a href="<?php the_permalink(); ?>" title=" <?php echo the_title() ?>">
                            <?php
                                if ( has_post_thumbnail() ) {
                                echo get_the_post_thumbnail(get_the_ID(),'loop_thumb');
                                }
                                else {
                                    echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/nothumb.jpg" />';
                                }
                            ?>
                            <em><?php echo the_title() ?></em>
                        </a> 
                        <?php thematic_postfooter(); ?>
                	</section>
                    <?php if ( $i==2 ) : ?>
                            <div class="clearboth small_screen"></div> 
                    <?php endif; ?>
                    <?php $i++; ?>  
                <?php endwhile; ?> 
                <span class="brkr brkr25 big_screen"></span>
                <span class="brkr brkr50 big_screen"></span>
                <span class="brkr brkr50 small_screen"></span>
                <span class="brkr brkr75 big_screen"></span>
                <div class="clearboth"></div> 
            </span>
            </article>
			<?php endif;
	endforeach;?>
		<footer class="foot_paged">
        	<?php if( qtrans_getLanguage() == 'es' ){ $content = 'TODAS LAS NOTICIAS';
			}elseif( qtrans_getLanguage() == 'ca' ){ $content = 'TOTES LES NOTÍCIES';
			}elseif( qtrans_getLanguage() == 'en' ){ $content = 'ALL NEWS';
			} ?>
        	<a href="<?php echo get_bloginfo('url') . ('/') . qtrans_getLanguage() . '/arxiu-de-noticies/' ; ?>" class="link_to_archive" title="<?php echo $content; ?>"/>
            <?php echo $content; ?>
            &nbsp;<i class="icon-chevron-right"></i></a>
        </footer>
<?php }
// ARCHIVE LOOP *********************************************************
function childtheme_override_archive_loop() {
    global $post;
	while ( have_posts() ) : the_post();?>
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
				if( qtrans_getLanguage() == 'es' ){
			 		$metafield = get_post_meta(get_the_ID(), 'metadescription_es', true);
			 	}elseif( qtrans_getLanguage() == 'ca' ){
			 		$metafield = get_post_meta(get_the_ID(), 'metadescription_ca', true);
			 	}else{
			 		$metafield = get_post_meta(get_the_ID(), 'metadescription_en', true);
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
}
// CATEGORY LOOP *********************************************************
function childtheme_override_category_loop() {
    global $post;
	while ( have_posts() ) : the_post();?>
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
				if( qtrans_getLanguage() == 'es' ){
			 		$metafield = get_post_meta(get_the_ID(), 'metadescription_es', true);
			 	}elseif( qtrans_getLanguage() == 'ca' ){
			 		$metafield = get_post_meta(get_the_ID(), 'metadescription_ca', true);
			 	}else{
			 		$metafield = get_post_meta(get_the_ID(), 'metadescription_en', true);
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
}
// TAG LOOP *********************************************************
function childtheme_override_tag_loop() {
    global $post;
	while ( have_posts() ) : the_post();?>
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
				if( qtrans_getLanguage() == 'es' ){
			 		$metafield = get_post_meta(get_the_ID(), 'metadescription_es', true);
			 	}elseif( qtrans_getLanguage() == 'ca' ){
			 		$metafield = get_post_meta(get_the_ID(), 'metadescription_ca', true);
			 	}else{
			 		$metafield = get_post_meta(get_the_ID(), 'metadescription_en', true);
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
    endwhile;
}

// SEARCH LOOP **************************************************************
function childtheme_override_search_loop() {
	global $post;
	while ( have_posts() ) : the_post();?>
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
				if( qtrans_getLanguage() == 'es' ){
			 		$metafield = get_post_meta(get_the_ID(), 'metadescription_es', true);
			 	}elseif( qtrans_getLanguage() == 'ca' ){
			 		$metafield = get_post_meta(get_the_ID(), 'metadescription_ca', true);
			 	}else{
			 		$metafield = get_post_meta(get_the_ID(), 'metadescription_en', true);
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
    endwhile;
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
			'next_text' => '<i class="icon-chevron-right"></i>',
			'prev_text' => '<i class="icon-chevron-left"></i>'
			);
		if( $wp_rewrite->using_permalinks() )
			if ( is_search()){
				$pagination['base'] = get_bloginfo('url') . ('/') . qtrans_getLanguage() . '/page/%#%/';
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
// Arrecla l'error amb la paginacio a les cerques que contenen un espai
// FINAL LOOPS *********************************************************
// Elimina info postmeta header-post
function childtheme_override_postheader_postmeta() {
    // silence!
}
// PostHeader Title (incluimos el icono de la categoria + h)
function childtheme_override_postheader_posttitle(){
	$posttitle = "\n\n\t\t\t\t\t";
	if (is_attachment()) {
		global $post;
		$posttitle .= '<h3 class="entry-title post_section">';
		$posttitle .= get_the_title() ;
		$posttitle .= '</h3>';
	}
	elseif (is_single()) {
		global $post;
		$posttitle .= '<h3 class="entry-title  post_section">';
		//CRIDEM A LA ICONA DE LA CATEGORIA DEL POST
			$category = get_the_category($post->ID); 
			// load all 'category' terms for the post
			$terms = get_the_terms($post->ID, 'category');
			// we will use the first term to load ACF data from 
			if( !empty($terms) ){$term = array_pop($terms);	$iconcat = get_field('cat_icon', 'category_' . $term->term_id );}
        $posttitle .='<a href="' . get_category_link($category[0]->term_id ) . '" target="_self" title="' .  $category[0]->cat_name . '"><i class="' . $iconcat . '"></i></a>';
		$posttitle .= get_the_title() ;
		$posttitle .= '</h3>';
	} elseif (is_page()) { 
		$posttitle .= '<h3 class="entry-title post_section">' . get_the_title() . "</h3>\n";
	} elseif (is_404()) {    
		$posttitle .= '<h3 class="entry-title post_section">' . __('Not Found', 'thematic') . "</h3>\n";
	} else {
		$posttitle .= '<h3 class="entry-title post_section"><a href="';
		$posttitle .= apply_filters('the_permalink', get_permalink());
		$posttitle .= '" title="';
		$posttitle .= __('Permalink to ', 'thematic') . the_title_attribute('echo=0');
		$posttitle .= '" rel="bookmark">';
		$posttitle .= get_the_title();   
		$posttitle .= "</a></h3>\n";
	}
	return $posttitle;
}
// PostContent Imagen Destacada, Excerpt i Contenidor pel contingut WYSIWYG
function add_thumbexcerpt_to_content($post) {
	if ( is_single() ){
			$browser_title_encoded = urlencode( trim( wp_title( '', false, 'right' ) ) );
			$page_title_encoded = urlencode( get_the_title() );
			$page_url_encoded = urlencode( get_permalink() );
		// Botó Compartir 
		if( qtrans_getLanguage() == 'es' ){
			$thematic_postfooter_share = "COMPARTE";
		}elseif( qtrans_getLanguage() == 'ca' ){
			$thematic_postfooter_share = "COMPARTEIX";
		}else {
			$thematic_postfooter_share = "SHARE";
		} 
		$sharebutton = '<ul class="sub-sharing">';
		$sharebutton .= '<li class="share_bttn msg" id="share_bttn"><i class="icon-share-sign"></i>&nbsp;' . $thematic_postfooter_share . ' <i class="icon-caret-right"></i></li>';
		$sharebutton .= '<li id="share_php" class="nojs">';
		//Facebook
		$sharebutton .= '<a href="http://www.facebook.com/sharer.php?u=' . $page_url_encoded . '&amp;t=' . $browser_title_encoded . '" target="_blank" title="' . $thematic_postfooter_share . ' ' . get_the_title() . '"><i class=icon-facebook-sign></i> Facebook </a>';
		//Twitter
		$sharebutton .= '<a href="http://twitter.com/share?text=' . $page_title_encoded . '&amp;url=' . $page_url_encoded . '" target="_blank" title="' . $thematic_postfooter_share . ' ' . get_the_title() . ' "><i class=icon-twitter-sign></i> Twitter </a>';
		//Google+
		$sharebutton .= '<a href="http://plus.google.com/share?url=' . $page_url_encoded . '" target="_blank" title="' . $thematic_postfooter_share . ' ' . get_the_title() . ' "><i class=icon-google-plus-sign></i> Google+ </a>';
		//LinkedIn
		$sharebutton .= '<a href="http://www.linkedin.com/shareArticle?mini=true&url' . $page_url_encoded . '&title=' . $page_title_encoded . '" target="_blank" title="' . $thematic_postfooter_share . '  ' . get_the_title() . ' "><i class=icon-linkedin-sign></i> LinkedIn </a>';
		$sharebutton .= '</li>';
		$sharebutton .= '<li id="share_loader">&nbsp;</li>';
		$sharebutton .= '</ul>';	
		if (!is_attachment()){
			$postwrapper = '<section class="entry-wysiwyg post_section">';
			if ( has_excerpt() ) {
				$post_excerpt = '<section class="entry-excerpt post_section"><h4>' . get_the_excerpt() . '</h4></section>';
			} else {
				$post_excerpt = '';
			}
			if ( has_post_thumbnail() ) {
				$post = '<section class="entry-thumb post_section">' . get_the_post_thumbnail(get_the_ID(), 'large', true) . '</section>' . $post_excerpt . $postwrapper . $post . $sharebutton . '</section>' ;
			}else{
				$post = $post_excerpt . $postwrapper . $post . $sharebutton . '</section>' ;
			}
		}else{
			$post = $post . '<article>' . $sharebutton . '</article>';
		}
		
	}else{
		$post = '<section class="entry-wysiwyg post_section">' . $post . '</section>' ;
	}
	return $post;
}
add_filter('the_content' , 'add_thumbexcerpt_to_content');
// Limitar los caracteres del excerpt
//function get_excerpt($count){
  //$excerpt = get_the_content();
  //$excerpt = strip_tags($excerpt);
  //$excerpt = substr($excerpt, 220, $count);
  //$excerpt = substr($excerpt, 220, strripos($excerpt, " "));
  //$excerpt = $excerpt.'...';
  //return $excerpt;
//}
// Cambiar el límite de palabras en el excerpt
//function longitud_excerpt($length) {
    //return 220;
//}
//add_filter('excerpt_length', 'longitud_excerpt');
/*function handle_more_link( $link, $link_text ) {
	if( qtrans_getLanguage() == 'eu' ){
		return str_replace( $link_text, 'Gehiago irakurtzea &raquo;', $link);
		}else {
		return str_replace( $link_text, 'Leer m&aacute;s &raquo;', $link);
		}
}
add_filter( 'the_content_more_link', 'handle_more_link', 10, 2 );*/
// canvi del peu de POST
function childtheme_override_postfooter() {
		if( qtrans_getLanguage() == 'es' ) { $thematic_postfooter_share = 'Compartir'; }elseif ( qtrans_getLanguage() == 'ca' ){ $thematic_postfooter_share = 'Compartir'; }else{$thematic_postfooter_share = 'Share';}
		if( qtrans_getLanguage() == 'en' ) { $thematic_postfooter_date = get_the_date('Y/m/d'); }else{ $thematic_postfooter_date = get_the_date('d/m/Y'); }
        $post_type = get_post_type();
        $post_type_obj = get_post_type_object($post_type);
        // Check for "Page" post-type and logged in user to show edit link
        if ( $post_type == 'page' ) {
            $postfooter .= '<ul class="sub-utilities">';
            $postfooter .= '<li><i class="icon-calendar"></i>&nbsp;&nbsp;<a href="' . get_bloginfo('url') . ('/') . qtrans_getLanguage() . '/arxiu-de-noticies/" target="_self" title=' . $thematic_postfooter_date . '>' . $thematic_postfooter_date . '</a></li>';
			$postfooter .= '</ul>';
        // For post-types other than "Pages" press on
        } else {
			$postfooter = '<footer class="entry-utility post_section cf">';
			//$postfooter .= '<ul class="main-utilities">';
			//$postfooter .= '<li>' . thematic_postmeta_authorlink() . '</li>';
			//$postfooter .= '<li>' . thematic_postfooter_postcategory() . '</li>';
			//$postfooter .= '<li>' . thematic_postfooter_postcomments() . '</li>';
			//$postfooter .= '</ul>';
			$postfooter .= '<ul class="sub-utilities">';
			if ( !is_category()){
				$postfooter .= '<li class="sub-util_cats">' . thematic_postfooter_postcategory() . '</li>';
			}
			if ( is_single() ){
				$postfooter .= '<li class="sub-util_date"><i class="icon-calendar"></i>&nbsp;&nbsp;<a href="' . get_bloginfo('url') . ('/') . qtrans_getLanguage() . '/arxiu-de-noticies/" target="_self" title=' . $thematic_postfooter_date . '>' . $thematic_postfooter_date . '</a></li>';
			}
			$postfooter .= '<li class="sub-util_tags"><i class="icon-tags"></i> ' . thematic_postfooter_posttags() . '</li>';
			  //  if ( is_user_logged_in() ) {
			  //  $postfooter .= '<li>' . thematic_postfooter_posteditlink() . '</li>';
			$postfooter .= '</ul>';
			$postfooter .= "\n\n\t\t\t\t\t</footer><!-- .entry-utility -->\n";
        }
        // Put it on the screen
	echo apply_filters( 'thematic_postfooter', $postfooter ); // Filter to override default post footer
}
// Tunejar CATEGORIES 
function childtheme_override_postfooter_postcategory() {
	global $post;
	$category = get_the_category($post->ID); 
	// load all 'category' terms for the post
	$terms = get_the_terms($post->ID, 'category');
	// we will use the first term to load ACF data from 
	if( !empty($terms) ){$term = array_pop($terms);	$iconcat = get_field('cat_icon', 'category_' . $term->term_id );}
	$postcategory ='<a href="' . get_category_link($category[0]->term_id ) . '" target="_self" title="' .  $category[0]->cat_name . '"><i class="' . $iconcat . '"></i>&nbsp;&nbsp;' . $category[0]->cat_name . '</a>';
    return apply_filters('thematic_postfooter_postcategory',$postcategory);
}
// remove unneeded code from posttags
function childtheme_override_postfooter_posttags() {
    if ( is_single() && !is_object_in_taxonomy( get_post_type(), 'category' ) ) {
        //$tagtext = __('Tagged', 'thematic');
        $posttags = get_the_tag_list("<span class=\"tag-links\"> ",' | ','</span> ');
    } elseif ( is_single() ) {
        //$tagtext = __('Tagged', 'thematic');
        $posttags = get_the_tag_list("<span class=\"tag-links\"> ",' | ','</span> ');
    } elseif ( is_tag() && $tag_ur_it = thematic_tag_ur_it(', ') ) {
        $posttags = '<span class="tag-links">' . $tag_ur_it . '</span>' . "\n\n\t\t\t\t\t\t";
    } else {
        //$tagtext = __('Tagged', 'thematic');
        $posttags = get_the_tag_list("<span class=\"tag-links\"> ",' | ','</span>' . "\n\n\t\t\t\t\t\t");
    }
    return apply_filters('thematic_postfooter_posttags',$posttags);
}
// Escala las imágenes pequeñas a más grandes
function thumbnail_upscale( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ){
    if ( !$crop ) return null; // let the wordpress default function handle this
 
    $aspect_ratio = $orig_w / $orig_h;
    $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);
 
    $crop_w = round($new_w / $size_ratio);
    $crop_h = round($new_h / $size_ratio);
 
    $s_x = floor( ($orig_w - $crop_w) / 2 );
    $s_y = floor( ($orig_h - $crop_h) / 2 );
 
    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
}
add_filter( 'image_resize_dimensions', 'thumbnail_upscale', 10, 6 );

// post thumbnail sizing 
add_theme_support( 'post-thumbnails' );
if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'featured-slider', 960, 480, true); // thumbnail para el slider 
	add_image_size( 'loop_thumb', 300, 150, true ); // thumbnail para los loops
}
// Supertamaño de Miniatura Imagen Destacada
function childtheme_post_thumb_size($size) {
    $size = array(960,480);
    return $size;
}
// Añade clase para activar lightbox en los posts
function my_addlightboxclass($content) {
       global $post;
       $pattern ="/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
       $replacement = '<a$1href=$2$3.$4$5 class="gal_img" title="'. $post->post_title .'"$6>';
       $content = preg_replace($pattern, $replacement, $content);
       return $content;
}
add_filter('the_content', 'my_addlightboxclass',10,2);
// Añade clase para activar lightbox en los attachments
function add_class_attachment_link($html){
    if (is_attachment()){
		$postid = get_the_ID();
		$html = str_replace('<a','<a class="gal_img"',$html);
		return $html;
	}
	else{
		return $html;
	}
}
add_filter('wp_get_attachment_link','add_class_attachment_link',10,2);
// GALERIA DEL POST INTEGRADA AL COLORBOX*****************************************************************************
function custom_gallery($output, $attr) {
    global $post;
    static $instance = 0;
    $instance++;
    /**
     *  will remove this since we don't want an endless loop going on here
     */
    // Allow plugins/themes to override the default gallery template.
    //$output = apply_filters('post_gallery', '', $attr);
    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }
    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'figure',
        'icontag'    => '',
        'captiontag' => 'figcaption',
        'columns'    => 4,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => ''
    ), $attr));
    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';
    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }
    if ( empty($attachments) )
        return '';
    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }
    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';
    $selector = "gallery-{$instance}";
    $gallery_style = $gallery_div = '';
    if ( apply_filters( 'use_default_gallery_style', true ) )
        /**
         * this is the css you want to remove
         *  #1 in question
         */
        /*
        $gallery_style = "
        <style type='text/css'>
            #{$selector} {
                margin: auto;
            }
            #{$selector} .gallery-item {
                float: {$float};
                margin-top: 10px;
                text-align: center;
                width: {$itemwidth}%;
            }
            #{$selector} img {
                border: 2px solid #cfcfcf;
            }
            #{$selector} .gallery-caption {
                margin-left: 0;
            }
        </style>
        <!-- see gallery_shortcode() in wp-includes/media.php -->";
        */
    $size_class = sanitize_html_class( $size );
    $gallery_div = "<section id='" . $selector . "' class='gallery galleryid-" . $id . " gallery-columns-4'>";
    $output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );
    $i = 0;
	$arrayCount = 0;//Ponemos contador a 0
    foreach ( $attachments as $id => $attachment ) {
        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
		$link = str_replace( '<a href', '<a rel="'. $selector . '" class="gal_img" href', $link );
        $output .= "<{$itemtag} class='gallery-item'>";
        $output .= "$link";
        /*
         * This is the caption part so i'll comment that out
         * #2 in question
         */
        if ( $captiontag && trim($attachment->post_excerpt) ) {
            $output .= "<{$captiontag} class='wp-caption-text gallery-caption'>" . wptexturize($attachment->post_excerpt) . "</{$captiontag}>";
        }
        $output .= "</{$itemtag}>";
        /*if ( $columns > 0 && ++$i % $columns == 0 )
            $output .= '<br style="clear: both" />';*/
		$arrayCount++; //Contador +1 en cada iteración
		if ( ( $arrayCount%2 == 0 && $arrayCount%4 == 0 ) ) {//Si Contador es un número par incluye un clearboth para que no se casque el layout (Small Screens)
			$output .= '<div class="clearboth big_screen">&nbsp;</div>';
		}elseif ( ( $arrayCount%2 == 0 && $arrayCount%4 != 0 ) ) {//Si Contador es múltiple de 4 incluye un clearboth para que no se casque el layout (Big Screens)
			$output .= '<div class="clearboth small_screen">&nbsp;</div>';
		}
    }
    /**
     * this is the extra br you want to remove so we change it to jus closing div tag
     * #3 in question
     */
    /*$output .= "
            <br style='clear: both;' />
        </div>\n";
     */
    $output .= "</section>\n";
    return $output;
}
add_filter("post_gallery", "custom_gallery",10,2);
// <BODY> - MODIFICACIÓ WIDGETS **************************************************************
// Categories (Afegim la ICONA i Chevron Right
function wp_list_categories_tuneup($list) {
	$cats = get_categories();
	foreach($cats as $cat) {
		$iconcat = get_field('cat_icon', 'category_' . $cat->term_id );
		$find = '>' . $cat->cat_name . '</a>';
		$replace = '><i class="' . $iconcat . '"></i> ' . $cat->cat_name . ' <i class="icon-chevron-right"></i></a>';
		$list = str_replace( $find, $replace, $list );
	}
return $list;
}
add_filter('wp_list_categories', 'wp_list_categories_tuneup');
// Etiquetes -> http://designpx.com/tutorials/customize-tag-cloud-widget/
function custom_tag_cloud_widget($args) {
	$args['number'] = 0; //adding a 0 will display all tags
	$args['largest'] = .9; //largest tag
	$args['smallest'] = .9; //smallest tag
	$args['unit'] = 'em'; //tag font unit
	$args['orderby'] = 'count'; //order by number of posts with the tag
	$args['order'] = 'DESC'; //more to less
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'custom_tag_cloud_widget' );
// RSS widget -> Creat de Zero i Integrant subscripció MailChimp
add_action( 'widgets_init', 'widget_custom_syndicate' );
function widget_custom_syndicate() {
	register_widget( 'Widget_Custom_Syndicate' );
}
class Widget_Custom_Syndicate extends WP_Widget {
	function Widget_Custom_Syndicate() {
		$widget_ops = array( 'classname' => 'custom_syndication', 'description' => __('A widget for custom syndication ', 'custom_syndication') );
		$control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'custom-syndication' );
		$this->WP_Widget( 'custom-syndication', __('Widget Custom Syndicate', 'custom_syndication'), $widget_ops, $control_ops );
	}
	function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );
		echo $before_widget;
		// Display the widget title 
		if ( $title )
			echo $before_title . $title . $after_title;
		//Display Syndication  ?>
        <ul>
        	<li><a href="<?php bloginfo('url') ?>/feed/" target="_self" title="RSS"><i class="icon-rss"></i>RSS<i class="icon-chevron-right"></i></a><li>
            <!-- Insertar <li> per subscripció de Newsletter o d'altres -->
        </ul>
		<?php // Close Widget
		echo $after_widget;
	}
	//Update the widget 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags from title to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}
	function form( $instance ) {
		//Set up some default widget settings.
		$defaults = array( 'title' => __('', 'custom_syndication') );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		//Widget Title ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', ''); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
	<?php
	}
}
// <BODY> - FOOTER *************************************************************************************************************
//******************************************************************************************************************************
// load google analytics
function snix_google_analytics(){ ?>
<script>var _gaq=[['_setAccount','UA-47098241-1'],['_trackPageview']];(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.src='//www.google-analytics.com/ga.js';s.parentNode.insertBefore(g,s)}(document,'script'))</script>
<?php }
add_action('wp_footer', 'snix_google_analytics');
// ADMIN ***********************************************************************************************************************
//******************************************************************************************************************************
//ADVANCED CUSTOM FIELDS
add_action('acf/register_fields', 'my_register_fields');
function my_register_fields(){
	//Custom Fields --> Generar y exportar desde el Admin
	include_once('fields/advanced_custom_fields.php');
}
?>