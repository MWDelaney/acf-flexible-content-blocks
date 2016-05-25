<?php
/**
 *
 * Repeater: Linked Items
 *
 * @author Michael W. Delaney
 * @since 1.0
 * 
 * Linked content items repeater
 */

$repeaters_array['repeater_linked_items'] = array (
	'key' => $repeater_key,
	'label' => 'Linked Items',
	'name' => 'linked_items',
	'type' => 'repeater',
	'instructions' => '',
	'required' => 0,
	'conditional_logic' => 0,
	'wrapper' => array (
		'width' => '',
		'class' => 'acf-media',
		'id' => '',
	),
	'collapsed' => 'field_573e0e481c7f7',
	'min' => '',
	'max' => '',
	'layout' => 'block',
	'button_label' => 'Add Item',
	'sub_fields' => array (

		// Title
        $repeater_fields_array['title'],
        $repeater_fields_array['navigation_title'],
        
    	// Content Tab
    	$repeater_fields_array['tab_content'],
    	$repeater_fields_array['content_source'],
    	$repeater_fields_array['content_excerpt_placeholder'],
    	$repeater_fields_array['content_conditional'],
    	$repeater_fields_array['tab_background'],

        // Background tab
        $repeater_fields_array['tab_background'],
        $repeater_fields_array['background_image'],
        $repeater_fields_array['background_color'],

        // Tab Endpoint
        $repeater_fields_array['tab_endpoint'],

        // Link
		$repeater_fields_array['link_text'],
        $repeater_fields_array['link'],

	)
);
