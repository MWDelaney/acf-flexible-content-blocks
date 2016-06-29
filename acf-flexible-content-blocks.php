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
     * Available background colors by semantic name. These can be overridden or added to with a filter like the following:
     *     add_filter( 'fcb_bg_colors', 'custom_bg_colors');
     *     function custom_bg_colors($array) {
     *         $array['secondary'] = 'Secondary';
     *         return $array;
     *     }
     */
    function fcb_bg_colors() {
        $colors = array (
            'primary'   => 'Primary',
            'success'   => 'Success',
            'info'      => 'Info',
            'warning'   => 'Warning',
            'danger'    => 'Danger',
        );
        $colors = apply_filters('fcb_bg_colors', $colors);
        return $colors;
    }



    /**
     * Available button colors by semantic name. These can be overridden or added to with a filter like the following:
     *     add_filter( 'fcb_btn_colors', 'custom_btn_colors');
     *     function custom_btn_colors($array) {
     *         $array['secondary'] = 'Secondary';
     *         return $array;
     *     }
     */
    function fcb_btn_colors() {
        $colors = array (
            'primary'   => 'Primary',
            'default'   => 'Default',
            'success'   => 'Success',
            'info'      => 'Info',
            'warning'   => 'Warning',
            'danger'    => 'Danger',
            'link'      => 'Link Only',
        );
        $colors = apply_filters('fcb_btn_colors', $colors);
        return $colors;
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
        echo trim(implode(' ', apply_filters( 'fcb_set_block_wrapper_classes', $classes )));
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

          private $args;

          function __construct() {

            //Initialize shortcodes
            add_action( 'init', array( $this, 'add_shortcodes' ) );

            // Append shortcode to the_content
            add_filter( 'the_content', array( $this, 'acffcb_add_to_content' ) );

            // Enable layouts
            add_filter( 'fcb_add_layouts', array( $this, 'add_layouts' ) );

            // Create the ACF fields
            add_action( 'acf/init', array( $this, 'fcb_create_blocks') );

            // Armor the original WordPress content
            add_filter('fcb_content_before', 'acfcfb_content_before');
            add_filter('fcb_content_after', 'acfcfb_content_after');


            $this->args = array (
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
                'location' => array (),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => 1,
                'description' => '',
            );
          }


        function fcb_create_blocks() {
            if( function_exists('acf_add_local_field_group') ):

                /**
                * Check for declared post types to attach fields to
                *
                * @author Michael W. Delaney
                * @since 1.0
                *
                * Default: post_type == page
                *
                * Declare theme support for specific post types:
                *   add_theme_support( 'flexible-content-location', array( array('post_type', '==', 'page'), array('post_type', '==', 'post') ) );
                */

                //Check if theme support is explicitly defined. If so, enable all attachments declared in theme support.
                if( current_theme_supports( 'flexible-content-location' ) ) {
                    $locations_supported    = get_theme_support( 'flexible-content-location' );
                    $locations_enabled      = $locations_supported[0];

                } else {
                    // If theme support is not explicitly defined, enable default attachments.
                    $locations_enabled = array();
                    $locations_enabled[] = array('post_type', '==', 'page');
                }

                // Enable each location
                $location_array = array();
                foreach ($locations_enabled as $location) {
                    // There is probably a better way to do this, but this makes it easy to visualize each location being added
                    $this_array = array();
                    $this_array['param']        = ($location[0]) ? $location[0] : 'post_type';
                    $this_array['operator']     = ($location[1]) ? $location[1] : '==';
                    $this_array['value']        = ($location[2]) ? $location[2] : '';
                    $location_array[]           = array($this_array);
                }
                // Insert each location into the $args array
                $this->args['location'] = $location_array;



                /**
                * Include all enabled layouts
                * 
                * @author Michael W. Delaney
                * @since 1.0
                *
                * Declare theme support for specific layouts. Default is to include all layouts: 
                *   add_theme_support( 'flexible-content-blocks', array( 'content', 'content_with_media' ) );
                */
                $layouts_array  = array();
                $layouts_array = apply_filters('fcb_add_layouts', $layouts_array);
                $layouts_array = $this->layout_sort($layouts_array);
                $layouts_array = $this->filter_layouts($layouts_array);
                // Insert each layouts into the $args array

                foreach ( $layouts_array as $layout) {
                    $this->args['fields'][0]['layouts'][] = $layout['layout'];
                }



                /**
                * Add the local field group, with its layouts, to ACF
                *
                * @author Michael W. Delaney
                * @since 1.0
                *
                */
               
                acf_add_local_field_group($this->args);

            endif;
        }


        /**
         * Function called from filter to execute adding layouts to the passed array
         * @param array $layouts_array the current layouts array
         */
        function add_layouts($layouts_array) {
            return $this->insert_the_layouts('FCBLayouts', $layouts_array);
        }



        /**
         * Insert all functions from the passed $class into $layouts_array as layouts
         * @param  string $class         class to search for functions
         * @param  array $layouts_array  the current layouts array
         * @return array                 the layouts array with all class functions inserted into it
         */
        function insert_the_layouts($class, $layouts_array) {
            foreach(get_class_methods($class) as $layout_name) {
                $layouts     = new $class();
                if($layout_name != '__construct') {
                    $layouts_array[] = $layouts->$layout_name();
                }
            }
            return $layouts_array;
        }



        /**
         * Check for theme support and extending classes and enable all appropriate layouts
         */
        function filter_layouts($layouts_array) {

            //Check if theme support is explicitly defined. If so, only enable layouts declared in theme support.
            if( current_theme_supports( 'flexible-content-blocks' ) ) {
                $layouts_supported = get_theme_support( 'flexible-content-blocks' );
                foreach($layouts_array as $subKey => $subArray){
                    if(!in_array($subArray['layout']['name'], $layouts_supported[0])){
                        unset($layouts_array[$subKey]);
                    }
                }
            }
            return $layouts_array;
        }



        /**
         * Sort the layouts array
         */
        function layout_sort($array) {
            // Sort layouts by the 'order' element
            usort($array, function ($a, $b) {
                if ($a['order'] == $b['order']) return 0;
                return $a['order'] < $b['order'] ? -1 : 1;
            });
            return $array;
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
         * Append content blocks to the WordPress the_content()
         * 
         * @param string $content The original WordPress content
         * @return string
         */
            function acffcb_add_to_content( $content ) {
                if(in_the_loop ()) {
                    // Only edit the_content() if blocks have been added to this $post
                    if(have_rows('blocks')) {
                        $content_before     = '';
                        $content_after      = '';
                        $content_before     = (!empty($content)) ? apply_filters('fcb_content_before', $content_before) : '';
                        $content_after      = (!empty($content)) ? apply_filters('fcb_content_after', $content_after) : '';
                        $content = $content_before . $content . $content_after . '[acffcb-blocks]';
                        return $content;
                    } else {
                        // If no blocks are present, return the content unmolested
                        return $content;
                    }
                }
            }
        }

        function acfcfb_content_before($content_before) {
            return '<section class="block-wrap block-wrap-wp-content"><div class="block block-wp-content"><div class="block-inner"><article class="block-the-content">' . $content_before;
        }

        function acfcfb_content_after($content_after) {
            return $content_after . '</article></div></div></section>';
        }


$acf_flexible_content_blocks = new ACFFlexibleContentBlocks();
