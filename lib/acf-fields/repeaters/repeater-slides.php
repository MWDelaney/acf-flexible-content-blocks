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

$repeaters_array['repeater_slides'] = array (
    'key' => $repeater_key,
    'label' => 'Slides',
    'name' => 'slides',
    'type' => 'repeater',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => 0,
    'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
    ),
    'collapsed' => 'field_573b50b3ebf4d',
    'min' => '',
    'max' => '',
    'layout' => 'row',
    'button_label' => 'Add Slide',
    'sub_fields' => array (

        // Title
        $repeater_fields_array['title'],
        $repeater_fields_array['navigation_title'],

        // Media
        $repeater_fields_array['type_of_media'],
        $repeater_fields_array['media_placeholder'],
        $repeater_fields_array['media_image'],
        $repeater_fields_array['media_video'],

    )
);
