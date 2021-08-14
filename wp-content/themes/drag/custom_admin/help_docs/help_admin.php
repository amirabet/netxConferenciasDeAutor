<?php 
/****************************************************************

Índex de documents d'Ajuda que crida diferents mòduls temàtics

****************************************************************/
?>
<div class="wrap">
    <?php //get the data of the user with an id equal to the $id variable
	$user_id = get_current_user_id();
	$user = get_userdata($user_id);
	//print the admin color scheme being used
	$current_color = $user->admin_color; 
	if ($current_color == 'fresh') { //gris ?>
    	<div id="icon-help" class="icon32"><br></div>
    <?php }else{ //blau ?>
    	<div id="icon-help-blue" class="icon32"><br></div>
    <?php } 
	if( qtrans_getLanguage() == 'es' ){	?>
    	<h2>Documentos de Ayuda</h2>
    <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
    	<h2>Documents d'Ajuda</h2>
    <?php }else{ //english ?>
    	<h2>Help Docs</h2>
    <?php } ?>
    <!-- Cridem les FAQ ******************************* -->
    <?php include_once(get_stylesheet_directory() . '/custom_admin/help_docs/help_faq.php');?>
    <!-- Cridem el DASHBOARD ************************** -->
    <?php include_once(get_stylesheet_directory() . '/custom_admin/help_docs/help_dashboard.php');?>
    <!-- Cridem les ENTRADES ************************** -->
    <?php include_once(get_stylesheet_directory() . '/custom_admin/help_docs/help_posts.php');?>
    <!-- Cridem les MEDIA ***************************** -->
    <?php include_once(get_stylesheet_directory() . '/custom_admin/help_docs/help_media.php');?>
    <!-- Cridem els ENLLAÇOS ************************** -->
    <?php include_once(get_stylesheet_directory() . '/custom_admin/help_docs/help_links.php');?>
    <!-- Cridem les PÀGINES *************************** -->
    <?php include_once(get_stylesheet_directory() . '/custom_admin/help_docs/help_pages.php');?>
    <!-- Cridem els COMENTARIS ************************ -->
    <?php include_once(get_stylesheet_directory() . '/custom_admin/help_docs/help_comments.php');?>
    <!-- ********************************************** -->
    <!-- Cridem els USUARIS *************************** -->
    <?php include_once(get_stylesheet_directory() . '/custom_admin/help_docs/help_users.php');?>
    <!-- Cridem les EINES ***************************** -->
    <?php include_once(get_stylesheet_directory() . '/custom_admin/help_docs/help_tools.php');?>
     <!-- LINK A L'ÍNDEX ***************************** -->
    <a href="#help_index" class="index_a"><i class="icon-list-alt icon-2x pull-left"></i>
    <?php if( qtrans_getLanguage() == 'es' ){	?>
    	ÍNDICE DE CONTENIDOS
    <?php }elseif( qtrans_getLanguage() == 'ca' ){ ?>
    	ÍNDEX DE CONTINGUTS
    <?php }else{ //english ?>
    	CONTENT SUMMARY
    <?php } ?>
    </a>
</div>
<?php ?>