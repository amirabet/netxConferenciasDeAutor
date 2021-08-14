<?php 
/*************************************************************************************************************
**************************************************************************************************************
**                              
**                      ADVANCED CUSTOM FIELDS
**
**************************************************************************************************************
Instructions
Copia el código PHP generado
Pegalo en tu archivo functions.php
Para activar cualquier Add-on, edita y usa el código en las primeras pocas lineas.
Notes
Registered field groups will not appear in the list of editable field groups. This is useful for including fields in themes.
Please note that if you export and register field groups within the same WP, you will see duplicate fields on your edit screens. To fix this, please move the original field group to the trash or remove the code from your functions.php file.
Include in theme
The Advanced Custom Fields plugin can be included within a theme. To do so, move the ACF plugin inside your theme and add the following code to your functions.php file:
include_once('advanced-custom-fields/acf.php');
To remove all visual interfaces from the ACF plugin, you can use a constant to enable lite mode. Add the following code to your functions.php file before the include_once code:
define( 'ACF_LITE', true );
**************************************************************************************************************
*************************************************************************************************************/
if(function_exists("register_field_group")){
	register_field_group(array (
		'id' => 'acf_descripcion-para-paginas',
		'title' => 'Descripción para PÁGINAS',
		'fields' => array (
			array (
				'key' => 'field_53aa9f31a3d93',
				'label' => 'Descripción ES',
				'name' => 'metadescription_es',
				'type' => 'textarea',
				'instructions' => 'Breve descripción del Contenido de la Página (Máximo 200 caracteres)',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => 200,
				'rows' => '',
				'formatting' => 'none',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_iconos-para-categorias',
		'title' => 'ICONOS para Categorías',
		'fields' => array (
			array (
				'key' => 'field_53aa9ff13c371',
				'label' => 'icono',
				'name' => 'cat_icon',
				'type' => 'text',
				'instructions' => 'Codi de la icona, disponible del llistat <a href="http://fortawesome.github.io/Font-Awesome/3.2.1/icons/" target="_blank"> http://fortawesome.github.io/Font-Awesome/3.2.1/icons/ </a>',
				'default_value' => 'icon-bookmark',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'category',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_jerarquia-de-autor',
		'title' => 'Jerarquía de Autor',
		'fields' => array (
			array (
				'key' => 'field_53e397e8a41b4',
				'label' => 'Jerarquía del Autor',
				'name' => 'jerarquia_del_autor',
				'type' => 'text',
				'instructions' => 'Puntua numéricamente la importancia de este autor en relación a los demás speakers.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 1,
	));
	register_field_group(array (
		'id' => 'acf_idiomas',
		'title' => 'Idiomas',
		'fields' => array (
			array (
				'key' => 'field_53e398d2df17c',
				'label' => 'Idioma 1',
				'name' => 'idioma_1',
				'type' => 'select',
				'instructions' => 'Elegir Idioma',
				'required' => 1,
				'choices' => array (
					'es' => 'Castellano',
					'cat' => 'Catalán',
					'en' => 'Inglés',
					'fr' => 'Francés',
					'de' => 'Alemán',
					'pt' => 'Portugués',
					'ar' => 'Árabe',
				),
				'default_value' => '',
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_53e399a3fbd01',
				'label' => 'Idioma 2',
				'name' => 'idioma_2',
				'type' => 'select',
				'instructions' => 'Elegir Idioma',
				'choices' => array (
					'es' => 'Castellano',
					'cat' => 'Catalán',
					'en' => 'Inglés',
					'fr' => 'Francés',
					'de' => 'Alemán',
					'pt' => 'Portugués',
					'ar' => 'Árabe',
				),
				'default_value' => '',
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_53e399b5fbd03',
				'label' => 'Idioma 3',
				'name' => 'idioma_3',
				'type' => 'select',
				'instructions' => 'Elegir Idioma',
				'choices' => array (
					'es' => 'Castellano',
					'cat' => 'Catalán',
					'en' => 'Inglés',
					'fr' => 'Francés',
					'de' => 'Alemán',
					'pt' => 'Portugués',
					'ar' => 'Árabe',
				),
				'default_value' => '',
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_53e399cdfbd04',
				'label' => 'Idioma 4',
				'name' => 'idioma_4',
				'type' => 'select',
				'instructions' => 'Elegir Idioma',
				'choices' => array (
					'es' => 'Castellano',
					'cat' => 'Catalán',
					'en' => 'Inglés',
					'fr' => 'Francés',
					'de' => 'Alemán',
					'pt' => 'Portugués',
					'ar' => 'Árabe',
				),
				'default_value' => 'Elegir',
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_53e399d3fbd05',
				'label' => 'Idioma 5',
				'name' => 'idioma_5',
				'type' => 'select',
				'instructions' => 'Elegir Idioma',
				'choices' => array (
					'es' => 'Castellano',
					'cat' => 'Catalán',
					'en' => 'Inglés',
					'fr' => 'Francés',
					'de' => 'Alemán',
					'pt' => 'Portugués',
					'ar' => 'Árabe',
				),
				'default_value' => 'Elegir',
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_53e39a9bfd229',
				'label' => 'Idioma 6',
				'name' => 'idioma_6',
				'type' => 'text',
				'instructions' => 'Si el idioma no aparece en el desplegable puedes introducirlo aquí.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 2,
	));
	register_field_group(array (
		'id' => 'acf_video-1',
		'title' => 'Vídeo 1',
		'fields' => array (
			array (
				'key' => 'field_53e3b2a121d92',
				'label' => 'Vídeo 1',
				'name' => 'video_1',
				'type' => 'text',
				'instructions' => 'Dirección Web del Vídeo',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53e3b30421d94',
				'label' => 'Vídeo 1 Embebible ?',
				'name' => 'video_1_embebible',
				'type' => 'select',
				'instructions' => 'Si el vídeo 1 es de un servicio como YouTube o Vimeo marcar "Sí" para insertarlo directamente en la web.',
				'choices' => array (
					'no' => 'No',
					'yes' => 'Sí',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_53e3b2d021d93',
				'label' => 'Imagen Vídeo 1',
				'name' => 'imagen_video_1',
				'type' => 'image',
				'instructions' => 'Una imagen representativa del Vídeo 1 (Optativo. Ideal formato 4:3)',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53e3b30421d94',
							'operator' => '==',
							'value' => 'no',
						),
					),
					'allorany' => 'all',
				),
				'save_format' => 'object',
				'preview_size' => 'medium',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 3,
	));
	register_field_group(array (
		'id' => 'acf_video-2',
		'title' => 'Vídeo 2',
		'fields' => array (
			array (
				'key' => 'field_53e3b895c06df',
				'label' => 'Vídeo 2',
				'name' => 'video_2',
				'type' => 'text',
				'instructions' => 'Dirección Web del Vídeo',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53e3b8a7c06e0',
				'label' => 'Vídeo 2 Embebible ?',
				'name' => 'video_2_embebible',
				'type' => 'select',
				'instructions' => 'Si el vídeo 1 es de un servicio como YouTube o Vimeo marcar "Sí" para insertarlo directamente en la web.',
				'choices' => array (
					'no' => 'No',
					'yes' => 'Sí',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_53e3b8ccc06e1',
				'label' => 'Imagen Vídeo 2',
				'name' => 'imagen_video_2',
				'type' => 'image',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53e3b8a7c06e0',
							'operator' => '==',
							'value' => 'no',
						),
					),
					'allorany' => 'all',
				),
				'save_format' => 'object',
				'preview_size' => 'medium',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 4,
	));
	register_field_group(array (
		'id' => 'acf_video-3',
		'title' => 'Vídeo 3',
		'fields' => array (
			array (
				'key' => 'field_53e3b9199eaa7',
				'label' => 'Vídeo 3',
				'name' => 'video_3',
				'type' => 'text',
				'instructions' => 'Dirección Web del Vídeo',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53e3b9269eaa8',
				'label' => 'Vídeo 3 Embebible ?',
				'name' => 'video_3_embebible',
				'type' => 'select',
				'instructions' => 'Si el vídeo 3 es de un servicio como YouTube o Vimeo marcar "Sí" para insertarlo directamente en la web.',
				'choices' => array (
					'no' => 'No',
					'yes' => 'Sí',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_53e3b9479eaa9',
				'label' => 'Imagen Vídeo 3',
				'name' => 'imagen_video_3',
				'type' => 'image',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53e3b9269eaa8',
							'operator' => '==',
							'value' => 'no',
						),
					),
					'allorany' => 'all',
				),
				'save_format' => 'object',
				'preview_size' => 'medium',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 5,
	));
	register_field_group(array (
		'id' => 'acf_libro-1',
		'title' => 'Libro 1',
		'fields' => array (
			array (
				'key' => 'field_53b187ad8c8fe',
				'label' => 'Libro 1',
				'name' => 'libro_1',
				'type' => 'text',
				'instructions' => 'Título del Libro 1',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53b187dc8c8ff',
				'label' => 'Portada Libro 1',
				'name' => 'portada_libro_1',
				'type' => 'image',
				'instructions' => 'Una Imagen de la Portada del Libro cargada desde el Disco Duro',
				'save_format' => 'object',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_53e394b6c448e',
				'label' => 'URL Libro 1',
				'name' => 'url_libro_1',
				'type' => 'text',
				'instructions' => 'La dirección web dónde se vende el Libro 1',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 6,
	));
	register_field_group(array (
		'id' => 'acf_libro-2',
		'title' => 'Libro 2',
		'fields' => array (
			array (
				'key' => 'field_53e3964acf689',
				'label' => 'Libro 2',
				'name' => 'libro_2',
				'type' => 'text',
				'instructions' => 'Título del Libro 2',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53e39667cf68a',
				'label' => 'Portada Libro 2',
				'name' => 'portada_libro_2',
				'type' => 'image',
				'instructions' => 'Una Imagen de la Portada del Libro cargada desde el Disco Duro',
				'save_format' => 'object',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_53e3968dcf68b',
				'label' => 'URL Libro 2',
				'name' => 'url_libro_2',
				'type' => 'text',
				'instructions' => 'La dirección web dónde se vende el Libro 2',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 7,
	));
	register_field_group(array (
		'id' => 'acf_libro-3',
		'title' => 'Libro 3',
		'fields' => array (
			array (
				'key' => 'field_53e396fe31dc6',
				'label' => 'Libro 3',
				'name' => 'libro_3',
				'type' => 'text',
				'instructions' => 'Título del Libro 3',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53e396db31dc5',
				'label' => 'Portada Libro 3',
				'name' => 'portada_libro_3',
				'type' => 'image',
				'instructions' => 'Una Imagen de la Portada del Libro cargada desde el Disco Duro',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_53e3972a31dc7',
				'label' => 'URL Libro 3',
				'name' => 'url_libro_3',
				'type' => 'text',
				'instructions' => 'La dirección web dónde se vende el Libro 3',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 8,
	));
}
?>