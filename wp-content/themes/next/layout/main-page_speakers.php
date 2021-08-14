<?php
/**********************************************************************************************
 * Plantilla de Layout para Página
 * Página ID = 442 --> Speakers (comprobar ID en LIVE)
 * muestra los autores en forma de lista.
**********************************************************************************************
VERSION 0.1
*********************************************************************************************
TO DO:
*********************************************************************************************/
//
//
//
// Filter Cats ?>
<aside class="loop_filter_cats loop_filter_cats-home">
	<?php echo '<a href="' . get_bloginfo( 'url' ) . '/autores/" target="_self" class="button button-small button-primary fr animated"> Ver Fichas<i class="fa fa-th-large fl"></i></a>';
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){ 
			$content = 'FILTRAR POR CATEGORÍA';
			$qlang = qtrans_getLanguage() . '/';
		}elseif( qtrans_getLanguage() == 'ca' ){ 
			$content = 'FILTRAR PER CATEGORIA';
			$qlang = qtrans_getLanguage() . '/';
		}elseif( qtrans_getLanguage() == 'en' ){ 
			$content = 'FILTER BY CATEGORY';
			$qlang = qtrans_getLanguage() . '/';
		} 
	}else{
		$content = 'FILTRAR POR CATEGORÍA';
		$qlang = '';
	}?>
	<em><?php echo $content; ?></em>
	<?php wp_list_categories('orderby=count&style=none&show_count=0&exclude=1'); ?>
</aside> 
<?php //
// Contenidor Loop
echo('<section id="categoryloop" class="loop_results_wrap">');
//
// loop Autors
foreach(get_posts('posts_per_page=-1&orderby=title&order=ASC') as $post) { 
	$category = get_the_category(); ?>
	<article class="loop_results loop_autores loop_results_featured loop_results_list">
		<a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title(); ?>" class="loop_autores_link animated">
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail('autor');
			}else{
				echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/autor_nothumb.jpg" alt="' . get_the_title() . '"/>';
			} ?>
			<em><?php the_title(); ?></em>
		</a>
		<?php the_tags( '<section><a href="' . get_category_link( $category[0]->cat_ID) . '" target="_self" title="' . $category[0]->cat_name . '" class="loop_autores_cat_list"><b>' . $category[0]->cat_name . '</b></a> - ', ' - ', '</section>' ); ?>
		<span class="clearboth"></span>
	</article>
<?php } // Final Foreach
//
// Final Contenidor Loop
echo('</section>');
//