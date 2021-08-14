<?php
//****************************************************************************************/
//
//  Child Theme NEXT Conferencias de Autor Functions
//  
//  FUNCTIONS > BODY --> main --> Elementos del <main>
//  Filtra funciones de los tempates
//
//

//*********************************************************************************************/
// ABOVE CONTAINER ******************************************************************************
//*********************************************************************************************
function child_abovecontainer() {
	echo '<main id="main" role="main">';
	include_once(get_stylesheet_directory() . '/layout/fold-flexslider.php');
}
add_action('thematic_abovecontainer','child_abovecontainer',1);
//*********************************************************************************************/
// ABOVE CONTENT ******************************************************************************
//*********************************************************************************************
//
// 
function child_abovecontent() {
}
add_action('thematic_abovecontent', 'child_abovecontent', 1);
//
//*********************************************************************************************/
// CONTENT ************************************************************************************
//*********************************************************************************************
function childtheme_content_role() {
	echo '<div id="content">';
}
add_filter('thematic_open_id_content','childtheme_content_role');
//****************************************************************************************/
//WRAPPERS PEL CONTAINER **************************************************************************************
//*************************************************************************************************************
//
//
// PAGES ****************************************************************************************************
// page.php
//
// TODO: Millorar el markup hardcoded
//
// open
// close
//
// POSTS ****************************************************************************************************
// single.php
// open
// close
//
// COMMENTS ****************************************************************************************************
// comments.php
// open
// close
//
// ARCHIVE ****************************************************************************************************
// archive.php
if (is_archive() ){} 
// open
function child_above_archiveloop() {
	echo('<section id="archiveloop" class="loop_results_wrap">');
}
add_action('thematic_above_archiveloop', 'child_above_archiveloop', 0);
// close
function child_below_archiveloop() {
	echo('</section>');
}
add_action('thematic_below_archiveloop', 'child_below_archiveloop', 0);
//
// CATEGORIES ***********************************************************************************************
// category.php
// open
function child_above_categoryloop() {
	echo('<section id="categoryloop" class="loop_results_wrap">');
}
add_action('thematic_above_categoryloop', 'child_above_categoryloop', 0);
// close
function child_below_categoryloop() {
	echo('</section>'); ?>
	<aside class="loop_filter_cats">
		<?php if (function_exists('qtrans_getLanguage')){
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
<?php }
add_action('thematic_below_categoryloop', 'child_below_categoryloop', 0);
//
// TAGS ****************************************************************************************************
// tag.php
function child_above_tagloop() {
	echo('<section id="tagloop" class="loop_results_wrap">');
}
add_action('thematic_above_tagloop', 'child_above_tagloop', 0);
// close
function child_below_tagloop() {
	echo('</section>'); ?>
	<aside class="loop_filter_cats">
		<?php if (function_exists('qtrans_getLanguage')){
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
	<?php /* TAGS */
		$posttags = get_tags();
		if ($posttags) {
			$post_tags = '<footer class="entry-wysiwyg-tags">';
			foreach($posttags as $tag) {
				$post_tags .= '<a href="' . get_tag_link($tag->term_id) . '" target="_self" title="' . $tag->name . '" class="button button-small animated">' . $tag->name . '</a>'; 
			}
			$post_tags .= '</footer>';
		}else{
			$post_tags = '';
		}
		echo $post_tags;
	}
add_action('thematic_below_tagloop', 'child_below_tagloop', 0);
//
// SEARCH **************************************************************************************************
// search.php
//
// TODO: Millorar el markup hardcoded
//
// SearchLoop
function child_above_searchloop() {
	echo('<section id="searchloop" class="loop_results_wrap">');
}
add_action('thematic_above_searchloop', 'child_above_searchloop', 0);
// close
function child_below_searchloop() {
	echo('</section>'); ?>
	<aside class="loop_filter_cats">
		<?php if (function_exists('qtrans_getLanguage')){
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
	<?php /* TAGS */
	$posttags = get_tags();
	if ($posttags) {
		$post_tags = '<footer class="entry-wysiwyg-tags">';
		foreach($posttags as $tag) {
			$post_tags .= '<a href="' . get_tag_link($tag->term_id) . '" target="_self" title="' . $tag->name . '" class="button button-small animated">' . $tag->name . '</a>'; 
		}
		$post_tags .= '</footer>';
	}else{
		$post_tags = '';
	}
	echo $post_tags;
}
add_action('thematic_below_searchloop', 'child_below_searchloop', 0);
//
// IndexLoop
function child_above_indexloop() { ?>
	<aside class="loop_filter_cats loop_filter_cats-home">
		<?php echo '<a href="' . get_bloginfo( 'url' ) . '/speakers" target="_self" class="button button-small button-primary fr animated"> Ver Lista<i class="fa fa-list fl"></i></a>';
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
	<?php echo('<section id="indexloop" class="loop_results_wrap">');
}
add_action('thematic_above_indexloop', 'child_above_indexloop', 0);
// close
function child_below_indexloop() {
	echo('</section>'); ?>
<?php }
add_action('thematic_below_indexloop', 'child_below_indexloop', 0);
//
// AUTOR ****************************************************************************************************
// autor.php
// Dins del propi loop, no té hooks propis
//
// 404 ****************************************************************************************************
// 404.php
// open
// close
//
// LINKS ****************************************************************************************************
// links.php
// open
// close
//
//****************************************************************************************/
//PAGE TITLE *********************************************************************************
//*********************************************************************************************
//
function child_thematic_page_title($content) {
	if (is_archive() || is_search()) {
		$content = '';
	}
	return $content;
}
add_filter('thematic_page_title', 'child_thematic_page_title');
/*********************************************************************************************/
// BELOW POST ******************************************************************************
//*********************************************************************************************
function child_belowpost() {
	
	if(is_404()){
		echo '<div class="clearboth"></div>';
		echo('</section>'); ?>
		<aside class="loop_filter_cats">
			<?php if (function_exists('qtrans_getLanguage')){
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
		<?php /* TAGS */
		$posttags = get_tags();
		if ($posttags) {
			$post_tags = '<footer class="entry-wysiwyg-tags">';
			foreach($posttags as $tag) {
				$post_tags .= '<a href="' . get_tag_link($tag->term_id) . '" target="_self" title="' . $tag->name . '" class="button button-small animated">' . $tag->name . '</a>'; 
			}
			$post_tags .= '</footer>';
		}else{
			$post_tags = '';
		}
		echo $post_tags;
	}
}
add_action('thematic_belowpost','child_belowpost',99);
//*********************************************************************************************/
// BELOW CONTENT ******************************************************************************
//*********************************************************************************************
function child_belowcontent() {
	echo '<div class="clearboth"></div>';
	if(is_archive() || is_search() || is_front_page() || is_home() || is_404()){
		echo '<div class="clearboth"></div>';
		include (get_stylesheet_directory() . '/layout/main-snippet-queofrecemos.php');
		echo '<div class="clearboth"></div>';
	}
}
add_action('thematic_belowcontent','child_belowcontent',99);
//*********************************************************************************************/
// BELOW CONTAINER ******************************************************************************
//*********************************************************************************************
function child_belowcontainer() {
}
add_action('thematic_belowcontainer','child_belowcontainer',1);
//*********************************************************************************************/
// PREFOOTER MOREINFO **************************************************************************
//*********************************************************************************************
function child_abovemainclose() {
	echo '<footer id="main_moreinfo">';
	if(!is_page(11)){include(get_stylesheet_directory() . '/layout/main-snippet-moreinfo.php');}else{echo '&nbsp;';}
	echo '</footer>';
	echo '</main>';
}
add_action('thematic_abovemainclose','child_abovemainclose',1);