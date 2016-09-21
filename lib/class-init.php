<?php
namespace MWD\ACFFCB;

/**
 * Main Flexible Content Blocks class
 */

    class CreateBlocks {

        /**
         * Run filters and actions
         */

          private $args;

          function __construct() {

            //Initialize shortcodes
            $this->add_shortcodes();
						
            // Enqueue admin styles and scripts
            add_action('admin_enqueue_scripts', array( $this, 'admin_styles' ) );
            add_action('admin_enqueue_scripts', array( $this, 'dev_mode' ) );
            add_action('admin_enqueue_scripts', array( $this, 'admin_scripts' ) );

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


        public function fcb_create_blocks() {
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
                * $landing_page_templates = array(
                *   array (
                *       array (
                *           'param' => 'post_type',
                *           'operator' => '==',
                *           'value' => 'page',
                *       ),
                *       array (
                *           'param' => 'page_template',
                *           'operator' => '!=',
                *           'value' => 'template-no-header-image.php',
                *       ),
                *   ),
                * );
                * add_theme_support( 'flexible-content-location', $landing_page_templates );
                */

                //Check if theme support is explicitly defined. If so, enable all attachments declared in theme support.
                if( current_theme_supports( 'flexible-content-location' ) ) {
                    $locations_supported    = get_theme_support( 'flexible-content-location' );
                    $locations_enabled      = $locations_supported[0];
                } else {
                    // If theme support is not explicitly defined, enable default attachments.
                    $locations_enabled = array(
                      array (
                        array (
                          'param' => 'post_type',
                          'operator' => '==',
                          'value' => 'page',
                        )
                      )
                    );
                }
                // Insert each location into the $args array
                $this->args['location'] = $locations_enabled;



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
								$layouts_class 	= null;
								$layouts_class	= apply_filters('fcb_get_layouts', $layouts_class);
                $layouts_array 	= $this->add_layouts($layouts_class, $layouts_array);
                $layouts_array 	= $this->layout_sort($layouts_array);
                $layouts_array 	= $this->filter_layouts($layouts_array);
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
         * Enqueue admin scripts and styles
         */
        function admin_scripts() {
						wp_enqueue_script( 'acf-flexible-content-fields-ace', ACFFCB_PLUGIN_URL . 'assets/js/ace/ace.js' );
            wp_enqueue_script( 'acf-flexible-content-fields-admin-script', ACFFCB_PLUGIN_URL . 'assets/js/admin-script.js' );
        }

        function admin_styles() {
            wp_enqueue_style( 'acf-flexible-content-fields-admin-style', ACFFCB_PLUGIN_URL . 'assets/css/admin.css' );
        }

        function dev_mode() {
            if( current_theme_supports( 'flexible-content-dev-mode' ) ) {
                wp_enqueue_style( 'acf-flexible-content-fields-dev-mode', ACFFCB_PLUGIN_URL . 'assets/css/dev-mode.css' );
            } else {
                wp_enqueue_style( 'acf-flexible-content-fields-no-dev-mode', ACFFCB_PLUGIN_URL . 'assets/css/no-dev-mode.css' );
            }
        }


        /**
         * Function called from filter to execute adding layouts to the passed array
         * @param array $layouts_array the current layouts array
         */

				function add_layouts($class, $layouts_array) {
          return $this->insert_the_layouts($class, $layouts_array);
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
            public static function acffcb_add_to_content( $content ) {
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
