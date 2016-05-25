<?php
/**
 *
 * Field: Media Video
 *
 * @author Michael W. Delaney
 * @since 1.0
 * 
 * Video field for media selector
 */

$fields_array['media_video'] = array (
    'key' => $key,
    'label' => 'Video',
    'name' => 'video',
    'type' => 'oembed',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => array (
        array (
            array (
                'field' => 'fcb-media-type-of-media-' . $layout,
                'operator' => '==',
                'value' => 'video',
            ),
        ),
    ),
    'wrapper' => array (
        'width' => '',
        'class' => 'acf-media',
        'id' => '',
    ),
    'width' => '',
    'height' => '',
);