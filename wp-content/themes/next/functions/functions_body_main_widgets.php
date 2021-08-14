<?php
//****************************************************************************************/
//
//  Child Theme NEXT Conferencias de Autor Functions
//  
//  FUNCTIONS > BODY > MAIN > WIDGETS --> Configura els Widgets del Tema
//
//********************************************************************************************/
//
// filter thematic_sidebar() ... switch off on static home page
/*function remove_sidebar($show) {
 // We test if we are on the front page
 //if (is_front_page() and !is_home()) {
 // Yes, we are .. now we switch off the sidebar
 //return FALSE;
 return FALSE;
 //} else {
 // we are not .. we leave the switch on
 //return TRUE;
 //}
}
// Connect the filter to thematic_sidebar()
add_filter('thematic_sidebar', 'remove_sidebar');*/
//
//Thematic 0.9.7.6+ compatible
//define('THEMATIC_COMPATIBLE_BODY_CLASS', true);
//define('THEMATIC_COMPATIBLE_POST_CLASS', true);
//define('THEMATIC_COMPATIBLE_COMMENT_HANDLING', true);
//define('THEMATIC_COMPATIBLE_COMMENT_FORM', true);
//define('THEMATIC_COMPATIBLE_FEEDLINKS', true);
//
//
//
//DEFINIR ELS WIDGETS AREA DEL CHILDTHEME *********************************************************
//
//
/* Let's move the subsidiary widget area above the footer
function move_subsidiaries($content) {
$content['1st Subsidiary Aside']['action_hook'] = 'thematic_abovefooter';
$content['2nd Subsidiary Aside']['action_hook'] = 'thematic_abovefooter';
$content['3rd Subsidiary Aside']['action_hook'] = 'thematic_abovefooter';
return $content;
}
add_filter('thematic_widgetized_areas', 'move_subsidiaries');
 
// Now we need to unhook everything else that's related to the subsidiary widget area
function remove_relatedfunctions() {
remove_action('widget_area_subsidiaries', 'thematic_subsidiaryopen', 10);
remove_action('widget_area_subsidiaries', 'thematic_before_first_sub',20);
remove_action('widget_area_subsidiaries', 'thematic_between_firstsecond_sub',40);
remove_action('widget_area_subsidiaries', 'thematic_between_secondthird_sub',60);
remove_action('widget_area_subsidiaries', 'thematic_after_third_sub',80);
remove_action('widget_area_subsidiaries', 'thematic_subsidiaryclose', 200);
}
add_action('init', 'remove_relatedfunctions');
// And now we need to add these functions to thematic_abovefooter()
add_action('thematic_abovefooter', 'thematic_subsidiaryopen', 10);
add_action('thematic_abovefooter', 'thematic_before_first_sub',20);
add_action('thematic_abovefooter', 'thematic_between_firstsecond_sub',40);
add_action('thematic_abovefooter', 'thematic_between_secondthird_sub',60);
add_action('thematic_abovefooter', 'thematic_after_third_sub',80);
add_action('thematic_abovefooter', 'thematic_subsidiaryclose', 200);
/*/
//CONDICIONALS PER MOSTRAR EL SIDEBAR ****************************
function move_sidebar($content) {
	if ( is_page(array(5,7,11,170, 442)) || is_home()) {
		$content['Primary Aside']['action_hook'] = '';
		return $content;
	}else{
		$content['Primary Aside']['action_hook'] = 'thematic_belowcontent';
		return $content;
		
	}
}
add_filter('thematic_widgetized_areas', 'move_sidebar');
//
// MOU EL SIDEBAR DE HOOK ****************************
// Now we need to unhook everything else that's related to the subsidiary widget area
function remove_relatedfunctions() {
remove_action('widget_area_primary_aside', 'thematic_abovemainasides', 10);
remove_action('widget_area_primary_aside', 'thematic_widget_area_primary_aside',20);
remove_action('widget_area_primary_aside', 'thematic_betweenmainasides',40);
remove_action('widget_area_primary_aside', 'thematic_widget_area_secondary_aside',60);
remove_action('widget_area_primary_aside', 'thematic_belowmainasides',80);
}
add_action('init', 'remove_relatedfunctions');
// And now we need to add these functions to thematic_abovefooter()
add_action('thematic_belowcontent', 'thematic_abovemainasides', 10);
add_action('thematic_belowcontent', 'thematic_widget_area_primary_aside',20);
//add_action('thematic_belowcontent', 'thematic_betweenmainasides',40);
//add_action('thematic_belowcontent', 'thematic_widget_area_secondary_aside',60);
add_action('thematic_belowcontent', 'thematic_belowmainasides',80);
//
// MENUS
//
/*function childtheme_register_menus() {
    if ( function_exists( 'register_nav_menu' )) {
        register_nav_menu( 'secondary-menu', 'Secondary Menu' );
        register_nav_menu( 'tertiary-menu', 'Tertiary Menu' );
    }
}
add_action('init', 'childtheme_register_menus');*/
// completely remove nav above functionality
function childtheme_override_nav_above() {
    // silence
}
//
// HEADER ASIDE
//
// add a header aside widget, currently set up to be inside the #branding div
/*function childtheme_add_header_widget($content) {
    $content['Header Aside Widget'] = array(
        'admin_menu_order' => 2,
        'args' => array (
        'name' => 'Header Aside',
        'id' => 'header-aside-widget',
        'description' => __('The widget area in the header.', 'thematic'),
        'before_widget' => thematic_before_widget(),
        'after_widget' => thematic_after_widget(),
        'before_title' => thematic_before_title(),
        'after_title' => thematic_after_title(),
            ),
        'action_hook'   => 'thematic_header',
        'function'      => 'childtheme_header_aside_widget',
        'priority'      => 6
        );
    return $content;
}
add_filter('thematic_widgetized_areas', 'childtheme_add_header_widget');
// set structure for the header aside widget
function childtheme_header_aside_widget() {
    if ( is_active_sidebar('header-aside-widget') ) {
        echo thematic_before_widget_area('header-widget');
        dynamic_sidebar('header-aside-widget');
        echo thematic_after_widget_area('header-widget');
    }
}
// add 4th subsidiary aside widget, currently set up to be a footer widget (#footer-widget) underneath the 3 subs
function childtheme_add_subsidiary($content) {
    $content['Footer Widget Aside'] = array(
        'admin_menu_order' => 550,
        'args' => array (
        'name' => 'Footer Aside',
        'id' => '4th-subsidiary-aside',
        'description' => __('The 4th bottom widget area in the footer.', 'thematic'),
        'before_widget' => thematic_before_widget(),
        'after_widget' => thematic_after_widget(),
        'before_title' => thematic_before_title(),
        'after_title' => thematic_after_title(),
            ),
        'action_hook'   => 'widget_area_subsidiaries',
        'function'      => 'childtheme_4th_subsidiary_aside',
        'priority'      => 90
        );
    return $content;
}
add_filter('thematic_widgetized_areas', 'childtheme_add_subsidiary');
// set structure for the 4th subsidiary aside, footer widget (#footer-widget)
// this is modified from the original by adding the .sub-wrapper, super hacky!
function childtheme_4th_subsidiary_aside() {
    if ( is_active_sidebar('4th-subsidiary-aside') ) {
        echo thematic_before_widget_area('footer-widget');
        dynamic_sidebar('4th-subsidiary-aside');
        echo thematic_after_widget_area('footer-widget');
    }
    echo "\n" . '</div><!-- .sub-wrapper -->' . "\n";
}
// open the sub-wrapper, super hacky!
function childtheme_subsidiary_wrapper_div () { ?>
    <div class="sub-wrapper">
<?php }
add_action('thematic_footer', 'childtheme_subsidiary_wrapper_div');*/
//
// Amagare WIDGET areas al backend
// 
function childtheme_hide_areas($content) {
	//unset($content['Primary Aside']);
	unset($content['Secondary Aside']);
	unset($content['1st Subsidiary Aside']);
	unset($content['2nd Subsidiary Aside']);
	unset($content['3rd Subsidiary Aside']);
	//unset($content['4th Subsidiary Aside']); // S'ha de crear primer
    unset($content['Index Top']);
    unset($content['Index Insert']);
    unset($content['Index Bottom']);
    unset($content['Single Top']);
    unset($content['Single Insert']);
	unset($content['Single Bottom']);
    unset($content['Page Top']);
    unset($content['Page Bottom']);
    return $content;
}
add_filter('thematic_widgetized_areas', 'childtheme_hide_areas');
//MODIFICAR ELS DEFAULT WIDGET LISTS ********************************************************* TODO : Adaptar el markup a Font Awesome 4
//
// Modificar Widget Category List
function wp_list_categories_tuneup($list) {
	//if (wp_list_categories['taxonomy'] == 'category'){
		$cats = get_categories();
		foreach($cats as $cat) {
			$iconcat = get_field('cat_icon', 'category_' . $cat->term_id );
			$find = '>' . $cat->cat_name . '</a>';
			//$replace = '><i class="fa ' . $iconcat . '"></i> ' . $cat->cat_name . ' <i class="fa fa-chevron-right"></i></a>';
			$replace = ' class="button button-small animated">' . $cat->cat_name . ' <i class="fa fr fa-angle-right"></i></a>';
			$list = str_replace( $find, $replace, $list );
		}
	//}elseif (wp_list_categories['taxonomy'] == 'tags'){
		//$tags = get_tags();
		//foreach($tags as $tag) {
			//$find = '>' . $tag->tag_name . '</a>';
			//$replace = ' class="button animated">' . $tag->tag_name . '</a>';
			//$list = str_replace( $find, $replace, $list );
		//}
	//}
return $list;
}
add_filter('wp_list_categories', 'wp_list_categories_tuneup');
//
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
//
// RSS widget -> Creat de Zero i Integrant subscripció MailChimp
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
add_action( 'widgets_init', 'widget_custom_syndicate' );
//
// Sharebuttons -> Creat de Zero i Integrant subscripció MailChimp
function widget_custom_sharebuttons() {
	register_widget( 'Widget_Custom_Sharebuttons' );
}
class Widget_Custom_Sharebuttons extends WP_Widget {
	function Widget_Custom_Sharebuttons() {
		$widget_ops = array( 'classname' => 'custom_sharebuttons', 'description' => __('A widget for custom PHP share buttons ', 'custom_sharebuttons') );
		$control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'custom-sharebuttons' );
		$this->WP_Widget( 'custom-sharebuttons', __('Widget Custom Sharebuttons', 'custom_sharebuttons'), $widget_ops, $control_ops );
	}
	function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );
		echo $before_widget;
		// Display the widget title 
		if ( $title )
			echo $before_title . $title . $after_title;
		//
		// Widget Content
        $browser_title_encoded = urlencode( trim( wp_title( '', false, 'right' ) ) );
		$page_title_encoded = urlencode( get_the_title() );
		$page_url_encoded = urlencode( get_permalink() );
		// Botó Compartir 
		if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){
				$thematic_postfooter_share = "COMPARTE";
			}elseif( qtrans_getLanguage() == 'ca' ){
				$thematic_postfooter_share = "COMPARTEIX";
			}else {
				$thematic_postfooter_share = "SHARE";
			} 
		}else {
			$thematic_postfooter_share = "COMPARTE";
		}
		//$sharebutton = '<ul class="sub-sharing">';
		//$sharebutton .= '<li class="share_bttn" id="share_bttn">' . $thematic_postfooter_share . ' <i class="fa fa-caret-right"></i></li>';
		//$sharebutton .= '<li id="share_php">';
		//Facebook
		$sharebutton = '<a href="http://www.facebook.com/sharer.php?u=' . $page_url_encoded . '&amp;t=' . $browser_title_encoded . '" target="_blank" title="' . $thematic_postfooter_share . ' ' . get_the_title() . '" class="button button-primary button_social_fb animated">Facebook<i class="fa fl fa-facebook"></i></a>';
		//Twitter
		$sharebutton .= '<a href="http://twitter.com/share?text=' . $page_title_encoded . '&amp;url=' . $page_url_encoded . '" target="_blank" title="' . $thematic_postfooter_share . ' ' . get_the_title() . ' " class="button button-primary button_social_tw animated">Twitter<i class="fa fl fa-twitter"></i></a>';
		//Google+
		$sharebutton .= '<a href="http://plus.google.com/share?url=' . $page_url_encoded . '" target="_blank" title="' . $thematic_postfooter_share . ' ' . get_the_title() . ' " class="button button-primary button_social_gp animated">Google+<i class="fa fl fa-google-plus"></i></a>';
		//LinkedIn
		$sharebutton .= '<a href="http://www.linkedin.com/shareArticle?mini=true&url=' . $page_url_encoded . '&title=' . $page_title_encoded . '" target="_blank" title="' . $thematic_postfooter_share . '  ' . get_the_title() . ' " class="button button-primary button_social_li animated">LinkedIn<i class="fa fl fa-linkedin"></i></a>';
		//$sharebutton .= '</li>';
		//$sharebutton .= '</ul>';
		//echo '<section>';
		echo $sharebutton;
		//echo '</section>';
		//
		// Close Widget
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
		$defaults = array( 'title' => __('', 'custom_sharebuttons') );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		//Widget Title ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', ''); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
	<?php
	}
}
add_action( 'widgets_init', 'widget_custom_sharebuttons' );
//
// Contratación -> Creat de Zero i Integrant subscripció MailChimp
function widget_custom_contratacion() {
	register_widget( 'Widget_Custom_Contratacion' );
}
class Widget_Custom_Contratacion extends WP_Widget {
	function Widget_Custom_Contratacion() {
		$widget_ops = array( 'classname' => 'custom_contratacion', 'description' => __('Enlace a la página de Contratación', 'custom_contratacion') );
		$control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'custom-contratacion' );
		$this->WP_Widget( 'custom-contratacion', __('Widget Custom Contratacion', 'custom_contratacion'), $widget_ops, $control_ops );
	}
	function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );
		echo $before_widget;
		// Display the widget title 
		if ( $title )
			echo $before_title . $title . $after_title;
		//
		// Widget Content
		$qofrec_autores_b = 'Grandes autores, grandes expertos';
		$qofrec_autores = ' al servicio de la formación y la excelencia profesional.';
        $contratacion = '<a href="' . get_bloginfo('url') . '/contratacion/" target="_self" class="animated">';
		$contratacion .= '<img src="' . get_stylesheet_directory_uri() . '/images/layout/widget_contratacion.png" alt="Contratación" />';
		$contratacion .= '<em>' . $qofrec_autores_b . '</em><i>' . $qofrec_autores. '</i>';
		$contratacion .= '<br><span class="button button-small button-primary">CONTRATACIÓN</span>';
		$contratacion .= '<span class="clearboth"></span></a>';
		echo $contratacion;
		//
		// Close Widget
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
		$defaults = array( 'title' => __('', 'custom_contratacion') );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		//Widget Title ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', ''); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
	<?php
	}
}
add_action( 'widgets_init', 'widget_custom_contratacion' );