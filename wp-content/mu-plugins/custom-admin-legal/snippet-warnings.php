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
<section class="warnings">
    <!-- NO JAVASCRIPT ******* -->
    <article id="nojs_warnings" class="nojs">
        <div class="warning_wrap">
			<?php if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){?>
					Tienes desactivado JavaScript en tu navegador. Actívalo para disfrutar plenamente de la experienca web.
				<?php }elseif( qtrans_getLanguage() == 'ca' ){?>
					Tens desactivat el JavaScript al teu navegador. Activa'l per gaudir plenament de l'experiència web.
				<?php }else{?>
					Please enable JavaScript in your browser to enjoy full web experience.
				<?php }
			}else{?>
				Tienes desactivado JavaScript en tu navegador. Actívalo para disfrutar plenamente de la experienca web.
			<?php } ?>
		</div>
    </article>
    <!-- OLD IE 8 AND BEYOND  -->
    <article id="oldie_warnings">
        <div class="warning_wrap">
			<?php if (function_exists('qtrans_getLanguage')){
				if( qtrans_getLanguage() == 'es' ){?>
					<a href="http://www.whatbrowser.org/intl/es/" target="_blank" title="Instala un navegador Moderno">Tu navegador web está obsoleto. Para disfrutar plenamente de tu experienca web actualiza tu navegador AQUÍ</a>
				<?php }elseif( qtrans_getLanguage() == 'ca' ){?>
					<a href="http://www.whatbrowser.org/intl/ca/" target="_blank" title="Instal·la un navegador Modern">El teu navegador web està obsolet. Per gaudir plenament de la teva experiència web pots actualitzar-lo AQUÍ</a>
				<?php }else{?>
					<a href="http://www.whatbrowser.org/intl/en/" target="_blank" title="IUpdate your browser">Your web browser it's outdated. Enjoy a full web experience updating your browser HERE</a>.
            <?php }
			}else{?>
				<a href="http://www.whatbrowser.org/intl/es/" target="_blank" title="Instala un navegador Moderno">Tu navegador web está obsoleto. Para disfrutar plenamente de tu experienca web actualiza tu navegador AQUÍ</a>
			<?php } ?>
		</div>
    </article>
</section>
