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
     * Set the HTML header tag (h1, h2) for block titles. Defaults to 'h2'.
     * This can be overridden using filters like the following:
     *
     *     remove_filter( 'fcb_set_block_htag', 'block_htag_level', 10 );
     *     add_filter( 'set_block_htag', 'custom_htag_level', 10, 2 );
     *     function custom_htag_level($title, $htag) {
     *         if($GLOBALS['fcb_rows_count'] == 0) {
     *             $htag = 'h1';
     *         } else {
     *             $htag = 'h2';
     *         }
     *         return '<' . $htag . '>' . $title . '</' . $htag . '>';
     *     }
     *     
     * @param  string $title The sub-field containing the title.
     * @param  string $htag  The default header tag (defaults to h2)
     * @return string        The formatted title wrapped in the proper h-tag.
     */
    function block_htag_level($title, $htag) {
        return '<' . $htag . '>' . $title . '</' . $htag . '>';
    }



    /**
     * Set a filter to change the block title output.
     */
    add_filter( 'fcb_set_block_htag', 'block_htag_level', 10, 2 );



    /**
     * Echo the block title with applied filters
     * @return string The formatted title
     */
    function the_block_title() {
        echo apply_filters( 'fcb_set_block_htag', get_sub_field('title'), 'h2' );
    }



    /**
     * Set classes for a block. These can be overridden or added to with a filter like the following:
     *     add_filter( 'fcb_set_block_classes', 'custom_block_classes' );
     *     function custom_block_classes($classes) {
     *         if(is_page_template('template-landing-page.php') {
     *             $classes[]   = 'on-landing-page';
     *         }
     *         return $classes;
     *     }
     *         
     * @return string string of classes
     */
    function fcb_block_classes() {
        $classes    = array();
        $classes[]  = 'block-wrap';
        $classes[]  = 'block-' . get_row_layout();
        $classes[]  = (get_sub_field('background_image')) ? 'block-with-bg-image' : '';
        $classes[]  = (get_sub_field('title')) ? '' : 'block-no-title';
        $classes[]  = 'block-' . $GLOBALS['fcb_rows_count'];
        
        $classes = array_filter(array_map('trim', $classes));
        echo trim(implode(' ', apply_filters( 'fcb_set_block_classes', $classes )));
    }



    /**
     * Set styles for a block. These can be overridden or added to with a filter like the following:
     *     add_filter( 'set_block_styles', 'custom_block_styles' );
     *     function custom_block_styles($styles) {
     *         $styles[]   = 'border: 1px solid green;';
     *         return $styles;
     *     }
     * @return string string of styles
     */
    function fcb_block_styles() {
        $image      = get_sub_field('background_image');

        $styles     = array();
        $styles[]   = (get_sub_field('background_color')) ? 'background-color: ' . get_sub_field('background_color') . ';' : '';
        $styles[]   = ($image) ? 'background-image: url(' . $image['url'] . ');' : '';
        echo trim(implode(' ', apply_filters( 'set_block_styles', $styles )));
    }

/**
 * Main Flexible Content Blocks class
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
