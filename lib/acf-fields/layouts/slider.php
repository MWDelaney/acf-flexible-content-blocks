<?php

/**
 *
 * Layout: Slider
 *
 * @author Michael W. Delaney
 * @since 1.0
 * 
 * Media slider with optional Call to Action button
 */

$layouts_array[] =
    array ( 'order' => '200', 
    'layout' => array (
        'key' => $layout,
        'name' => 'slider',
        'label' => 'Slider',
        'display' => 'block',
        'sub_fields' => array (
            // Titles
            $fields_array['title'],
            $fields_array['navigation_title'],

            // Content tab
            $fields_array['tab_content'],
            $fields_array['content'],

            // Slides tab
            $fields_array['tab_slides'],
            $repeaters_array['repeater_slides'],

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