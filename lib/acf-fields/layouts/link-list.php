<?php

/**
 *
 * Layout: Link List
 *
 * @author Michael W. Delaney
 * @since 1.0
 * 
 * List of links with titles and content
 */
$layouts_array[] =
    array ( 'order' => '60',
	'layout' =>  array (
        'key' => $layout,
		'name' => 'link_list',
		'label' => 'Link List',
		'display' => 'block',
		'sub_fields' => array (
            // Titles
            $fields_array['title'],
            $fields_array['navigation_title'],

            // Content tab
            $fields_array['tab_content'],
            $fields_array['content'],

            // Linked Items repeater
            $fields_array['tab_linked_items'],
            $repeaters_array['repeater_linked_items'],

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
            $fields_array['cta_type'],

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