<?php
//****************************************************************************************/
//
//  Child Theme NEXT Conferencias de Autor Functions
//  
//  FUNCTIONS > BODY > HEADER > MENU --> Configura l'Output del MENU (responsive + standard)
//
//********************************************************************************************/
//
//
// Permet substituir markup del menu
function replace_menu_elements( $aclass ) {
  return preg_replace( '/<a href="/', '<a class="animated" href="', $aclass, 10 );
}
add_filter( 'wp_page_menu', 'replace_menu_elements' );
// Tunejat del Menú Responsive
//TODO -> Actualitzar el markup de la versio del Font Awesome
function childtheme_override_access() { ?>
    <div id="access" class="cf">
		<?php //Boto small screens MENU ?>
		<div class="menu-button">
		<?php //Nombre "MENU" multidioma
			if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'en' ){ ?>
					<span class="menu-title"><span>MENU</span></span>
				<?php }else { ?>
					<span class="menu-title"><span>MENÚ</span></span>
				<?php }      
			}else{//Not activeQtrans?>
				<span class="menu-title"><span>MENÚ</span></span>
			<?php } ?>
			<span class="fa fa-bars"></span><span class="fa fa-times"></span>
		</div>
		<nav class="access-nav cf" role="navigation">
			<?php
			if ( ( function_exists("has_nav_menu") ) && ( has_nav_menu( apply_filters('thematic_primary_menu_id', 'primary-menu') ) ) ) {
				echo  wp_nav_menu(thematic_nav_menu_args());
			} else {
				echo  thematic_add_menuclass(wp_page_menu(thematic_page_menu_args()));
			}
			?>
		</nav>
	</div><!-- #access -->
	<?php //Boto small screens obre searchfield ?>
	<div class="head-search-button">
	<?php //Nombre "Buscar" multidioma
			if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'en' ){ ?>
					<span class="head-search-title"><span>SEARCH</span></span>
				<?php }elseif ( qtrans_getLanguage() == 'ca' ){ ?>
					<span class="head-search-title"><span>CERCAR</span></span>
				<?php }else { ?>
					<span class="head-search-title"><span>BUSCAR</span></span>
				<?php }      
			}else{//Not activeQtrans?>
				<span class="head-search-title"><span>BUSCAR</span></span>
			<?php } ?>
			<span class="fa fa-search"></span><span class="fa fa-search-minus"></span>
	</div>
    <?php 
}