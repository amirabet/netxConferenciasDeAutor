<?php 
/****************************************************************

v2.0 Optimitzat pel Dashboard de WordPRess 3.9.1
Índex de documents d'Ajuda que crida diferents mòduls temàtics

****************************************************************/
?>
<div class="wrap">
    <?php 
	if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){	?>
			<h2>Documentos de Ayuda</h2>
		<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
			<h2>Documents d'Ajuda</h2>
		<?php }else{ //english ?>
			<h2>Help Docs</h2>
		<?php } 
    }else{//Not activeQtrans?>
    	<h2>Documentos de Ayuda</h2>
	<?php } ?>
    <!-- Cridem les FAQ ******************************* -->
    <?php include_once(plugin_dir_path( __FILE__ ) . 'help_faq.php');?>
    <!-- Cridem el DASHBOARD ************************** -->
    <?php include_once(plugin_dir_path( __FILE__ ) . 'help_dashboard.php');?>
    <!-- Cridem les ENTRADES ************************** -->
    <?php include_once(plugin_dir_path( __FILE__ ) . 'help_posts.php');?>
    <!-- Cridem les MEDIA ***************************** -->
    <?php include_once(plugin_dir_path( __FILE__ ) . 'help_media.php');?>
    <!-- Cridem els ENLLAÇOS ************************** -->
    <?php include_once(plugin_dir_path( __FILE__ ) . 'help_links.php');?>
    <!-- Cridem les PÀGINES *************************** -->
    <?php include_once(plugin_dir_path( __FILE__ ) . 'help_pages.php');?>
    <!-- Cridem els COMENTARIS ************************ -->
    <?php include_once(plugin_dir_path( __FILE__ ) . 'help_comments.php');?>
    <!-- ********************************************** -->
    <!-- Cridem els USUARIS *************************** -->
    <?php include_once(plugin_dir_path( __FILE__ ) . 'help_users.php');?>
    <!-- Cridem les EINES ***************************** -->
    <?php include_once(plugin_dir_path( __FILE__ ) . 'help_tools.php');?>
     <!-- LINK A L'ÍNDEX ***************************** -->
    <a href="#help_index" class="index_a"><div class="dashicons dashicons-list-view"></div>
    <?php if (function_exists('qtrans_getLanguage')){
		if( qtrans_getLanguage() == 'es' ){	?>
			ÍNDICE DE CONTENIDOS
		<?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
			ÍNDEX DE CONTINGUTS
		<?php }else{ //english ?>
			CONTENT SUMMARY
		<?php } 
     }else{//Not activeQtrans?>
    	ÍNDICE DE CONTENIDOS
	<?php } ?>
    </a>
</div>