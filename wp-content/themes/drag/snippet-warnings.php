<?php
/**
 * Warnings: Activa divs de aviso para indicar al usuario
 * que tiene una vesión antigua de Internet Explorer (ie8 y anteriores)
 * o JS desactivado
 * 
 * Se muestran mediante CSS gracias a modernizr

*/
?> 
<!-- WARNINGS *****************************************************************************  -->
<section class="warning">
    <!-- NO JAVASCRIPT ******* -->
    <div id="nojs_warning" class="nojs">
        <div class="warning_wrap">
			<?php if( qtrans_getLanguage() == 'es' ){?>
            Tienes desactivado JavaScript en tu navegador. Actívalo para disfrutar plenamente de la experienca web.
            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>
            Tens desactivat el JavaScript al teu navegador. Activa'l per gaudir plenament de l'experiència web.
            <?php }else{?>
            Please enable JavaScript in your browser to enjoy full web experience.
            <?php }?>
		</div>
    </div>
    <!-- OLD IE 8 AND BEYOND  -->
    <div id="oldie_warning">
        <div class="warning_wrap">
        	<?php if( qtrans_getLanguage() == 'es' ){?>
            Tu navegador web está obsoleto. Para disfrutar plenamente de tu experienca web actualiza tu navegador <a href="http://www.whatbrowser.org/intl/es/" target="_blank" title="Instala un navegador Moderno">AQUÍ</a>.
            <?php }elseif( qtrans_getLanguage() == 'ca' ){?>
            El teu navegador web està obsolet. Per gaudir plenament de la teva experiència web pots actualitzar-lo <a href="http://www.whatbrowser.org/intl/ca/" target="_blank" title="Instal·la un navegador Modern">AQUÍ</a>.
            <?php }else{?>
            Your web browser it's outdated. Enjoy a full web experience updating your browser <a href="http://www.whatbrowser.org/intl/en/" target="_blank" title="IUpdate your browser">HERE</a>.
            <?php }?>     
		</div>
    </div>
</section>