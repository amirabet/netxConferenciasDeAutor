<?php
/**
 * FOOTER NEXT
 */
 // Variables pel Footer NEXT ************************************************
// Variants pagina CONTRATACION
?>
		<?php // action hook for placing content above the closing of the #main div
			thematic_abovemainclose();
		?>
		
		</main><!-- #main -->
    	
    	<?php
			// action hook for placing content above the footer
			thematic_abovefooter(); ?>
		<?php
			// Filter provided for altering output of the footer opening element
    		echo ( apply_filters( 'thematic_open_footer', '<div id="footer">' ) );

        	
        	// action hook creating the footer 
			thematic_footer(); 	?>
        	
		<?php
			// Filter provided for altering output of the footer closing element
    		echo ( apply_filters( 'thematic_close_footer', '</div><!-- #footer -->' . "\n" ) );
   
   			// action hook for placing content below the footer
			thematic_belowfooter();
    	?>
	<?php
		// Filter provided for altering output of wrapping element follows the body tag  
    	if ( apply_filters( 'thematic_close_wrapper', true ) ) 
    		echo ( '</div><!-- #wrapper .hfeed -->' . "\n" );

		// action hook for placing content before closing the BODY tag
		thematic_after(); 
		
		// calling WordPress' footer action hook
		wp_footer();
	?>
</body>
</html>