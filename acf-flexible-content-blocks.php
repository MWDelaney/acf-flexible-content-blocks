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
                $content_before     = (!empty($content)) ? '<section class="block-wrap block-wp-content"><div class="block">' : '';
                $content_after      = (!empty($content)) ? '</div></section>' : '';
                $content = $content_before . $content . $content_after . do_shortcode('[acffcb-blocks]');
                return $content;
            }

        // ======================================================================== //

        }

// ======================================================================== //

new ACFFlexibleContentBlocks();
