<?php
//****************************************************************************************/
//
//  Child Theme NEXT Conferencias de Autor Functions
//
//********************************************************************************************/
//  
//  FUNCTIONS > BODY > HEAD > SEARCH --> Controla l'Output del Search Form del Header
//
// change the default search box text
function childtheme_search_field_value() {
    if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){
			return "Buscar";
		}elseif( qtrans_getLanguage() == 'ca' ){
			return "Cercar";
		}else {
			return "Search";
		}
	}else{//Not activeQtrans
		return "Buscar";
	}
}
add_filter('search_field_value', 'childtheme_search_field_value');
//
// Canvia el text del boto del search
function childtheme_search_submit_value() {
	$search_submit = '<input id="searchsubmit" name="searchsubmit" type="submit" ';
	$search_submit .= 'value="&#xF002;" tabindex="2" />';
	/*if ( is_home() || is_page() || is_page_template('template-full-archive.php') || is_page_template('template-page-fullwidth.php') || is_single() || is_archive() || is_attachment() || is_search() && have_posts() ){
		$search_submit .= 'value="&#xF002;" tabindex="2" />';
	}else{
		if (function_exists('qtrans_getLanguage')){
			if( qtrans_getLanguage() == 'es' ){ $search_submit .= 'value="' . __('Search', 'thematic') . '" tabindex="2" />';
			}elseif( qtrans_getLanguage() == 'ca' ){ $search_submit .= 'value="CERCAR" tabindex="2" />';
			}elseif( qtrans_getLanguage() == 'en' ){ $search_submit .= 'value="' . __('Search', 'thematic') . '" tabindex="2" />';
			}
		}else{//Not activeQtrans
			$search_submit .= 'value="' . __('Search', 'thematic') . '" tabindex="2" />';
		}
	}*/
	return $search_submit;
}
add_filter('thematic_search_submit', 'childtheme_search_submit_value');
//
// Regenerem el Search Form per a que sigui miltilanguaje
function childtheme_search_form() {
	$search_form_length = apply_filters('thematic_search_form_length', '22');
	if (function_exists('qtrans_getLanguage')){
		$search_form_url_lang = home_url() . '/' . qtrans_getLanguage();
	}else{//Not activeQtrans
		$search_form_url_lang = home_url();
	}
	$search_form  = "\n\t\t\t\t\t\t";
	$search_form .= '<form id="searchform" method="get" action="' . $search_form_url_lang . '/">';
	$search_form .= "\n\n\t\t\t\t\t\t\t";
	$search_form .= '<div>';
	$search_form .= "\n\t\t\t\t\t\t\t\t";
	if (is_search()) {
	    	$search_form .= '<input id="s" name="s" type="text" value="' . esc_html ( stripslashes( $_GET['s'] ) ) .'" size="' . $search_form_length . '" tabindex="1" />';
	} else {
	    	$value = __( 'To search, type and hit enter', 'thematic' );
	    	$value = apply_filters( 'search_field_value',$value );
	    	$search_form .= '<input id="s" name="s" type="text" value="' . $value . '" onfocus="if (this.value == \'' . $value . '\') {this.value = \'\';}" onblur="if (this.value == \'\') {this.value = \'' . $value . '\';}" size="'. $search_form_length .'" tabindex="1" />';
	}
	$search_form .= "\n\n\t\t\t\t\t\t\t\t";
	$search_submit = '<input id="searchsubmit" name="searchsubmit" type="submit" value="' . __('Search', 'thematic') . '" tabindex="2" />';
	$search_form .= apply_filters('thematic_search_submit', $search_submit);
	$search_form .= "\n\t\t\t\t\t\t\t";
	$search_form .= '</div>';
	$search_form .= "\n\n\t\t\t\t\t\t";
	$search_form .= '</form>' . "\n\n\t\t\t\t\t";
	echo apply_filters('childtheme_search_form', $search_form);
}
add_filter('thematic_search_form', 'childtheme_search_form');
//
// PAGE 404 SEARCHFORM
/*function childtheme_override_404_content() {thematic_postheader(); 
	if (function_exists('qtrans_getLanguage')){
		$search_form_url_lang = home_url() . '/' . qtrans_getLanguage();
		if( qtrans_getLanguage() == 'es' ){ $value = __('Search', 'thematic');
		}elseif( qtrans_getLanguage() == 'ca' ){ $value = 'Cercar';
		}elseif( qtrans_getLanguage() == 'en' ){ $value = __('Search', 'thematic');
		}
	}else{//Not activeQtrans
		$search_form_url_lang = home_url();
		$value = __('Search', 'thematic');
	}
?>
    <form id="error404-searchform" method="get" action="<?php echo $search_form_url_lang; ?>/">
            <input id="error404-s" name="s" type="text" value="<?php echo $value; ?>"  onfocus="if (this.value == '<?php echo $value; ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo $value; ?>';}" size="40" />
            <input id="error404-searchsubmit" name="searchsubmit" type="submit" value="&#xF002;" tabindex="3"/>
    </form>
<?php }*/ // end 404_content
//
//
// AUTOCOMPLETE FOR SEARCHFORMS ***************************************************************************************
//
// Preparem els arxius necessaris
function myprefix_autocomplete_init() {
    add_action( 'wp_ajax_myprefix_autocompletesearch', 'myprefix_autocomplete_suggestions' );
    add_action( 'wp_ajax_nopriv_myprefix_autocompletesearch', 'myprefix_autocomplete_suggestions' );
}
add_action( 'init', 'myprefix_autocomplete_init' );
//
// Ajax array
function myprefix_autocomplete_suggestions(){
    // Query for suggestions
    $posts = get_posts( array(
        's' =>$_REQUEST['term'],
    ) );
    // Initialise suggestions array
    $suggestions=array();
    // Loop
	global $post;
    foreach ($posts as $post): setup_postdata($post);
        // Initialise suggestion array
        $suggestion = array();
		if (function_exists('qtrans_getLanguage')){ 
			$suggestion['label'] = esc_html(qtrans_use(qtrans_getLanguage(), $post->post_title, true));
			$suggestion['link'] = qtrans_convertURL(get_permalink());
		}else{
			$suggestion['label'] = esc_html($post->post_title);
			$suggestion['link'] = get_permalink();
		}
		if ( has_post_thumbnail() ) {
			$suggestion['image'] = get_the_post_thumbnail($post->ID, 'loop_results', array());
		}else{
			$suggestion['image'] = '<img width="200" height="223" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/layout/autor_nothumb.jpg" alt="' . get_the_title() . '" />';
		}
		
		//$suggestion['image']
        // Add suggestion to suggestions array
        $suggestions[]= $suggestion;
    endforeach;
    // JSON encode and echo
    $response = $_GET["callback"] . "(" . json_encode($suggestions) . ")";
    echo $response;
    // Don't forget to exit!
    exit;
}