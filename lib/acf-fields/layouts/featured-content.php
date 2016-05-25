<?php

/**
 *
 * Layout: Featured Content
 *
 * @author Michael W. Delaney
 * @since 1.0
 * 
 * Content block with relationship field to feature other site content and optional Call to Action button
 */

$layouts_array[] =
    array ( 'order' => '100', 
    'layout' => array (
        'key' => $layout,
        'name' => 'featured_content',
        'label' => 'Featured Content',
        'display' => 'block',
        'sub_fields' => array (
              // Titles
            $fields_array['title'],
            $fields_array['navigation_title'],

            // Content tab
            $fields_array['tab_content'],
            $fields_array['content'],

            // Features tab
            $fields_array['tab_features'],
            $fields_array['featured_content'],

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