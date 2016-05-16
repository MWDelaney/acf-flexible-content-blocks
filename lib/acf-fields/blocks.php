<?php
if( function_exists('acf_add_local_field_group') ):

// ======================================================================== //		
// Include all reusable fields
// ======================================================================== //

    foreach (glob(ACFFCB_PLUGIN_DIR . 'lib/acf-fields/reusable-fields/*.php') as $filename) {
        include $filename;
    }

// ======================================================================== //


$args = array (
	'key' => 'cfb_blocks',
	'title' => 'Content Blocks',
	'fields' => array (
		array (
			'key' => 'cfb_content_blocks',
			'label' => 'Blocks',
			'name' => 'blocks',
			'type' => 'flexible_content',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'button_label' => 'Add Block',
			'min' => '',
			'max' => '',
			'layouts' => array (),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
);

// ======================================================================== //		
// Include all layouts
// ======================================================================== //

    foreach (glob(ACFFCB_PLUGIN_DIR . 'lib/acf-fields/layouts/*.php') as $filename) {
        $layouts[] = include($filename);
        $layout  = ${str_replace( '-', '_', basename($filename, '.php'))};
        $args['fields'][0]['layouts'][] = $layout;

    }

// ======================================================================== //


acf_add_local_field_group($args);

endif;