<?php
/**
 * Activate Add-ons
 * Here you can enter your activation codes to unlock Add-ons to use in your theme. 
 * Since all activation codes are multi-site licenses, you are allowed to include your key in premium themes.
 */ 

function my_acf_settings( $options )
{
    // activate add-ons
    $options['activation_codes']['repeater'] = 'XXXX-XXXX-XXXX-XXXX';
    $options['activation_codes']['options_page'] = 'XXXX-XXXX-XXXX-XXXX';
    $options['activation_codes']['flexible_content'] = 'XXXX-XXXX-XXXX-XXXX';
    $options['activation_codes']['gallery'] = 'XXXX-XXXX-XXXX-XXXX';
    
    // setup other options (http://www.advancedcustomfields.com/docs/filters/acf_settings/)
    
    return $options;
    
}
add_filter('acf_settings', 'my_acf_settings');


/**
 * Registrar field groups
 * La función register_field_group acepta un 1 array que contiene los datos pertinentes para registrar un Field Group
 * Puedes editar el array como mejor te parezca. Sin embargo, esto puede dar lugar a errores si la matriz no es compatible con ACF
 * Este código debe ejecutarse cada vez que se lee el archivo functions.php
 */

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => '526b7b4f0146e',
		'title' => 'ICONES de les CATEGORIES',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_1',
				'label' => 'icona',
				'name' => 'cat_icon',
				'type' => 'text',
				'order_no' => 0,
				'instructions' => 'Codi de la icona, disponible del llistat <a href="http://fortawesome.github.io/Font-Awesome/3.2.1/icons/" target="_blank"> http://fortawesome.github.io/Font-Awesome/3.2.1/icons/ </a>',
				'required' => 0,
				'conditional_logic' => 
				array (
					'status' => 0,
					'rules' => 
					array (
						0 => 
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => 'icon-bookmark',
				'formatting' => 'none',
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'category',
					'order_no' => '0',
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
}


?>