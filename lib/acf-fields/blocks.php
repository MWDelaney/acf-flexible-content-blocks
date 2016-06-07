<?php
/**
 * Create custom fields for ACF Flexible Content Blocks
 *
 * @package   acf-flexible-content-blocks
 * @author    Michael W. Delaney
 * @link      https://github.com/MWDelaney/acf-flexible-content-blocks
 * @copyright 2016 Michael W. Delaney
 * @license   MIT
 * @version   1.0
 */

add_action( 'admin_init', 'fcb_create_blocks' );
if(!is_admin()) {
    add_action( 'wp_loaded', 'fcb_create_blocks' );
}
function fcb_create_blocks() {
if( function_exists('acf_add_local_field_group') ):

    /**
     * Variable holding the ACF fields definition to be automatically created
     */
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
    $args['location'] = $location_array;



    /**
    * Include all enabled layouts
    * 
    * @author Michael W. Delaney
    * @since 1.0
    *
    * Declare theme support for specific layouts. Default is to include all layouts: 
    *   add_theme_support( 'flexible-content-blocks', array( 'content', 'content-with-media' ) );
    */
        
    //Check if theme support is explicitly defined. If so, only enable layouts declared in theme support.
    if( current_theme_supports( 'flexible-content-blocks' ) ) {
        $layouts_supported = get_theme_support( 'flexible-content-blocks' );
        $layouts_enabled = $layouts_supported[0];
    } else {
        // If theme support is not explicitly defined, enable all layouts as a fallback.
        $layouts_enabled = array();
        foreach(get_class_methods('FCBLayouts') as $layout_name) {
            if($layout_name != '__construct') {
                $layouts_enabled[] = $layout_name;
            }
        }
    }

    // Enable each layout
    $FCBLayouts     = new FCBLayouts();
    $layouts_array  = array();
    foreach ($layouts_enabled as $layout) {
        $layouts_array[]    = $FCBLayouts->$layout();
    }
    // Sort layouts by the 'order' element
    usort($layouts_array, function ($a, $b) {
        if ($a['order'] == $b['order']) return 0;
        return $a['order'] < $b['order'] ? -1 : 1;
    });
    // Insert each layouts into the $args array
    foreach ( $layouts_array as $layout) {
        $args['fields'][0]['layouts'][] = $layout['layout'];
    }



    /**
    * Add the local field group, with its layouts, to ACF
    *
    * @author Michael W. Delaney
    * @since 1.0
    *
    */
   
    acf_add_local_field_group($args);

endif;
}