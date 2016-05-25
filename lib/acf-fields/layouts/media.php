<?php

/**
 *
 * Layout: Media
 *
 * @author Michael W. Delaney
 * @since 1.0
 * 
 * A simple media block optional Call to Action button
 */

$layouts_array[] =
    array ( 'order' => '60', 
    'layout' => array (
        'key' => '5739d9a42c504',
        'name' => 'media',
        'label' => 'Media',
        'display' => 'block',
        'sub_fields' => array (
            // Titles
            $fields_array['title'],
            $fields_array['navigation_title'],

            // Media tab
            $fields_array['tab_media'],
            $fields_array['type_of_media'],
            $fields_array['media_placeholder'],
            $fields_array['media_image'],
            $fields_array['media_video'],

            // Background tab
            $fields_array['tab_background'],
            $fields_array['background_image'],
            $fields_array['background_color'],

            // Tab Endpoint
            $fields_array['tab_endpoint'],

            // Call to Action
            $fields_array['cta_checkbox'],
            $fields_array['cta_placeholder'],
            $fields_array['cta_text'],
            $fields_array['cta_link'],
            $fields_array['cta_type']
        )
    )
);