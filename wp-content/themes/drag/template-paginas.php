<?php
/**
 * 
 Template Name: P&aacute;ginas Estaticas DRAG
 Restrict to: admin,super user
 *
 * Plantilla para todas las p&aacute;ginas est&aacute;ticas
 * Recoge varios snippets mediante la funcion include de php
 * 
 * @package Thematic
 * @subpackage Templates
 */

    // calling the header-nomain.php > no tiene apertura del main para poner antes el slider a 100%width
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
        	<?php if ( is_page(array( 7, 9 )) ){?>
            <div class="gray_leather">
            	<?php include_once(get_stylesheet_directory() . '/snippet-avantatges.php');?>
            </div>
            <div class="clearboth">&nbsp;</div>
            <div class="blue_textil blue_textil2">
   	            <span class="breaker2"></span>
                <div class="wrap_width">
            		<?php include_once(get_stylesheet_directory() . '/snippet-moduls.php');?>
            		<div class="clearboth">&nbsp;</div>
                </div>
			<?php } else { ?>
            <div class="blue_textil">
            <?php } ?>
            	<?php if ( is_front_page() || is_page(array( 7, 9 )) ) :?>
                	<?php include_once(get_stylesheet_directory() . '/snippet-lastnews.php');?>
                <?php endif; ?>
                <div class="wrap_width">
            		<?php include_once(get_stylesheet_directory() . '/snippet-banners.php');?>
            		<div class="clearboth wrap_width">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#mainwrap -->	
<?php 
    // action hook for placing content below #container
    thematic_belowcontainer();
?>
	<span class="breaker brkr_bottom"><span class="brkr_bottom_costura"></span></span>
<?php    
    // calling footer.php
    get_footer();
?>