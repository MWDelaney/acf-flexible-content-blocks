<?php
/**
 *
 * Field: Media Placeholder
 *
 * @author Michael W. Delaney
 * @since 1.0
 * 
 * Placeholder for when no media is selected
 */

$array['media_placeholder'] = array (
    'key' => $key,
    'label' => 'Media Placeholder',
    'name' => '',
    'type' => 'message',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => array (
        array (
            array (
                'field' => 'fcb-media-type-of-media-' . $repeater_name . $layout,
                'operator' => '==',
                'value' => 'none',
            ),
        ),
    ),
    'wrapper' => array (
        'width' => '',
        'class' => 'acf-media',
        'id' => '',
    ),
    'message' => 'No media will be displayed.',
    'new_lines' => 'wpautop',
    'esc_html' => 0,
);