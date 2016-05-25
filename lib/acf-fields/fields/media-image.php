<?php
/**
 *
 * Field: Media Image
 *
 * @author Michael W. Delaney
 * @since 1.0
 * 
 * Image field for media selector
 */

$fields_array['media_image'] = array (
    'key' => $key,
    'label' => 'Image',
    'name' => 'image',
    'type' => 'image',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => array (
        array (
            array (
                'field' => 'fcb-media-type-of-media-' . $layout,
                'operator' => '==',
                'value' => 'image',
            ),
        ),
    ),
    'wrapper' => array (
        'width' => '',
        'class' => 'acf-media',
        'id' => '',
    ),
    'return_format' => 'array',
    'preview_size' => 'medium',
    'library' => 'all',
    'min_width' => '',
    'min_height' => '',
    'min_size' => '',
    'max_width' => '',
    'max_height' => '',
    'max_size' => '',
    'mime_types' => '',
);