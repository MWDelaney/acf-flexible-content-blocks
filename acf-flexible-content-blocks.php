<?php
/*
Plugin Name: ACF Flexible Content Blocks
Plugin URI: 
Description: Adds flexible content blocks blow the_content();
Version: 1.0
Author: Michael W. Delaney
Author URI: 
License: MIT
*/
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_asdf',
	'title' => 'Call to Action',
	'fields' => array (
		array (
			'key' => 'field_57391d7dd9a46',
			'label' => 'Display Call to Action?',
			'name' => 'display_call_to_action',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 20,
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
		),
		array (
			'key' => 'field_57391d93d9a47',
			'label' => 'Text',
			'name' => 'text',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_57391d7dd9a46',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array (
				'width' => 30,
				'class' => 'acf-cta',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_57391d9fd9a48',
			'label' => 'Link',
			'name' => 'link',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_57391d7dd9a46',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array (
				'width' => 30,
				'class' => 'acf-cta',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_57391dbfd9a49',
			'label' => 'Type',
			'name' => 'type',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_57391d7dd9a46',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array (
				'width' => 20,
				'class' => 'acf-cta',
				'id' => '',
			),
			'choices' => array (
				'primary' => 'Primary',
				'default' => 'Default',
				'success' => 'Success',
				'info' => 'Info',
				'warning' => 'Warning',
				'danger' => 'Danger',
				'link' => 'Link-Only',
			),
			'default_value' => array (
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'disabled' => 0,
			'readonly' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
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
));

endif;

// ======================================================================== //		
// Include necessary functions and files
// ======================================================================== //

    define( 'ACFFCB_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

    require ACFFCB_PLUGIN_DIR . 'lib/class-gamajo-template-loader.php';
    require ACFFCB_PLUGIN_DIR . 'lib/class-acffcb-template-loader.php';


// ======================================================================== //



// ======================================================================== //		
// Wrapper for get_template_part() to check the plugin's template first
// ======================================================================== //

    function cfb_template($slug, $load = null) {
        $acffcb_templates = new ACFFCB_Template_Loader; 
        $acffcb_templates->get_template_part( $slug, $load );
    }

// ======================================================================== //



// ======================================================================== //		
// Class for other functionality
// ======================================================================== //

    class ACFFlexibleContentBlocks {

        // ======================================================================== //		
        // Initialize shortcodes and conditionally include opt-in Bootstrap scripts
        // ======================================================================== //

          function __construct() {

            //Initialize shortcodes
            add_action( 'init', array( $this, 'add_shortcodes' ) );

            //Initialize ACF fields
            add_action( 'init', array( $this, 'create_acf_fields' ) );	  

            // Append shortcode to the_content
            add_filter( 'the_content', array( $this, 'acffcb_add_to_content' ) );

          }

        // ======================================================================== //



        // ======================================================================== //		
        // Add a shortcode so we can more easily append it to the_content()
        // ======================================================================== //

            function add_shortcodes() {
                  add_shortcode( 'acffcb-blocks', array($this, 'acffcb_blocks'));
            }

            function acffcb_blocks() { 
                ob_start();
                cfb_template( 'content', 'blocks' );
                return ob_get_clean();
            }

        // ======================================================================== //



        // ======================================================================== //		
        // Create ACF Fields
        // ======================================================================== //

            function create_acf_fields() {
                $acf_includes = [
                  'lib/acf-fields/blocks.php'                  // Flexible content blocks
                ];

                foreach ($acf_includes as $file) {
                  require_once ACFFCB_PLUGIN_DIR . $file;
                }
            }

        // ======================================================================== //



        // ======================================================================== //		
        // Hook the ACF Flexible Content Blocks after the_content();
        // ======================================================================== //

            function acffcb_add_to_content( $content ) {    
                $content .= do_shortcode('[acffcb-blocks]');
                return $content;
            }

        // ======================================================================== //

        }

// ======================================================================== //

new ACFFlexibleContentBlocks();
