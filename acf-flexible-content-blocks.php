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


/**
 * Define constants
 */

    define( 'ACFFCB_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

/**
 * Require classes
 *
 * Require classes to load template files from site theme with fallback to plugin directory
 */

    require ACFFCB_PLUGIN_DIR . 'lib/class-gamajo-template-loader.php';
    require ACFFCB_PLUGIN_DIR . 'lib/class-acffcb-template-loader.php';



/**
 * Template wrapper
 *
 * @param string $slug The slug name for the generic template.
 * @param string $load The name of the specialised template.
 */

    function cfb_template($slug, $load = null) {
        $acffcb_templates = new ACFFCB_Template_Loader; 
        $acffcb_templates->get_template_part( $slug, $load );
    }



/**
 * Main Complex a Titles class
 */

    class ACFFlexibleContentBlocks {

        /**
         * Run filters and actions
         */

          function __construct() {

            //Initialize shortcodes
            add_action( 'init', array( $this, 'add_shortcodes' ) );

            //Initialize ACF fields
            add_action( 'init', array( $this, 'create_acf_fields' ) );	  

            // Append shortcode to the_content
            add_filter( 'the_content', array( $this, 'acffcb_add_to_content' ) );

          }



        /**
         * Add 'acffcb-blocks' shortcode
         *
         * @uses acffcb_blocks Function to build the shorcode
         */

            function add_shortcodes() {
                  add_shortcode( 'acffcb-blocks', array($this, 'acffcb_blocks'));
            }



        /**
         * Build the shortcode, call templates
         */

            function acffcb_blocks() { 
                ob_start();
                cfb_template( 'content', 'blocks' );
                return ob_get_clean();
            }



        /**
         * Add the ACF fields
         */

            function create_acf_fields() {
                $acf_includes = [
                  'lib/acf-fields/blocks.php'                  // Flexible content blocks
                ];

                foreach ($acf_includes as $file) {
                  require_once ACFFCB_PLUGIN_DIR . $file;
                }
            }



        /**
         * Append content blocks to the WordPress the_content()
         * 
         * @param string $content The original WordPress content
         * @return string
         */
            function acffcb_add_to_content( $content ) {
                // Only edit the_content() if blocks have been added to this $post
                if(have_rows('blocks')) {
                    $content_before     = (!empty($content)) ? '<section class="block-wrap block-wp-content"><div class="block">' : '';
                    $content_after      = (!empty($content)) ? '</div></section>' : '';
                    $content = $content_before . $content . $content_after . do_shortcode('[acffcb-blocks]');
                    return $content;
                } else {
                    // If no blocks are present, return the content unmolested
                    return $content;
                }
            }

        }


$acf_flexible_content_blocks = new ACFFlexibleContentBlocks();
