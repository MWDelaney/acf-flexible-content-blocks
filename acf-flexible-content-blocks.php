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

    require ACFFCB_PLUGIN_DIR . 'lib/class-acfcfb-fields.php';
    require ACFFCB_PLUGIN_DIR . 'lib/class-acfcfb-repeaters.php';
    require ACFFCB_PLUGIN_DIR . 'lib/class-acfcfb-layouts.php';


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
    function block_htag_level() {
        return 'h2';
    }

    function build_block_title($title) {
        $htag = apply_filters( 'fcb_set_block_htag', null, null);
        return '<' . $htag . ' id="' . sanitize_title_with_dashes($title) . '">' . $title . '</' . $htag . '>';
    }



    /**
     * Echo the block title with applied filters
     * @return string The formatted title
     */
    function the_block_title() {
        echo build_block_title( get_sub_field('title') );
    }



    /**
     * Set a filter to change the block title output.
     */
    add_filter( 'fcb_set_block_htag', 'block_htag_level', 10);



    /**
     * Return a attribute-friendly string based on input
     * @return  string The formatted string
     */
    function fcb_the_block_id($string) {
        echo preg_replace('/[^A-Za-z0-9]/', '', strtolower(str_replace(' ', '', $string)));
    }



    /**
     * Return "active" if the input is less than or equal to 0, for tabs
     */
    function fcb_is_active($i, $classes = null) {
        $return = ($i < 1) ? "active" : "";
        $return .= ($i < 1 && $classes) ? " " . $classes : "";
        echo $return;
    }


    /**
     * Set classes for a block wrapper. These can be overridden or added to with a filter like the following:
     *     add_filter( 'fcb_set_block_wrapper_classes', 'custom_block_wrapper_classes' );
     *     function custom_block_wrapper_classes($classes) {
     *         if(is_page_template('template-landing-page.php') {
     *             $classes[]   = 'on-landing-page';
     *         }
     *         return $classes;
     *     }
     *         
     * @return string string of classes
     */
    function fcb_block_wrapper_classes() {
        $classes    = array();
        $classes[]  = 'block-wrap';
        $classes[]  = 'block-wrap-' . get_row_layout();
        $classes[]  = (get_sub_field('background_image')) ? 'block-with-bg-image' : '';
        $classes[]  = (get_sub_field('title')) ? '' : 'block-no-title';
        $classes[]  = 'block-' . $GLOBALS['fcb_rows_count'];
        $classes[]  = (get_sub_field('background_color') == "theme") ? 'bg-' . get_sub_field('theme_color') : '';
        $classes[]  = (get_sub_field('background_color') == "choose") ? 'bg-choose' : '';

        
        $classes = array_filter(array_map('trim', $classes));
        echo trim(implode(' ', apply_filters( 'fcb_set_block_classes', $classes )));
    }




    /**
     * Set classes for a collapsibles. These can be overridden or added to with a filter like the following:
     *     add_filter( 'fcb_set_panel_classes', 'custom_panel_classes' );
     *     function custom_panel_classes($classes) {
     *         if(is_page_template('template-landing-page.php') {
     *             $classes[]   = 'on-landing-page';
     *         }
     *         return $classes;
     *     }
     *         
     * @return string string of classes
     */
    function fcb_panel_classes() {
        $classes    = array();
        $classes[]  = 'panel-body';
        $classes[]  = (get_sub_field('type_of_media') != 'none' ) ? 'panel-with-media' : '';
        
        $classes = array_filter(array_map('trim', $classes));
        echo trim(implode(' ', apply_filters( 'fcb_set_collapsible_classes', $classes )));
    }



    /**
     * Set classes for a tabs. These can be overridden or added to with a filter like the following:
     *     add_filter( 'fcb_set_tab_classes', 'custom_tab_classes' );
     *     function custom_tab_classes($classes) {
     *         if(is_page_template('template-landing-page.php') {
     *             $classes[]   = 'on-landing-page';
     *         }
     *         return $classes;
     *     }
     *         
     * @return string string of classes
     */
    function fcb_tab_classes() {
        $classes    = array();
        $classes[]  = 'tab-body';
        $classes[]  = (get_sub_field('type_of_media') != 'none' ) ? 'tab-with-media' : '';
        
        $classes = array_filter(array_map('trim', $classes));
        echo trim(implode(' ', apply_filters( 'fcb_set_collapsible_classes', $classes )));
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
        $classes[]  = 'block';
        $classes[]  = 'block-' . get_row_layout();
        
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
    function fcb_block_wrapper_styles() {
        $image      = get_sub_field('background_image');

        $styles     = array();
        $styles[]   = (get_sub_field('background_color') == "choose" ) ? 'background-color: ' . get_sub_field('choose_color') . ';' : '';
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
                do_action('before_blocks');
                cfb_template( 'content', 'blocks' );
                do_action('after_blocks');
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
                    $content_before     = (!empty($content)) ? '<section class="block-wrap block-wrap-wp-content"><div class="block block-wp-content"><div class="block-inner"><article class="block-the-content">' : '';
                    $content_after      = (!empty($content)) ? '</article></div></div></section>' : '';
                    $content = $content_before . $content . $content_after . do_shortcode('[acffcb-blocks]');
                    return $content;
                } else {
                    // If no blocks are present, return the content unmolested
                    return $content;
                }
            }

        }


$acf_flexible_content_blocks = new ACFFlexibleContentBlocks();
