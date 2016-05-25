<?php
/**
 *
 * Field: Features Tab
 *
 * @author Michael W. Delaney
 * @since 1.0
 * 
 * Tab titled "Features"
 */

$array['featured_content'] = array (
    'key' => $key,
    'label' => 'Featured Content',
    'name' => 'featured_content',
    'type' => 'relationship',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => 0,
    'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
    ),
    'post_type' => array (
    ),
    'taxonomy' => array (
    ),
    'filters' => array (
        0 => 'search',
        1 => 'post_type',
        2 => 'taxonomy',
    ),
    'elements' => '',
    'min' => 0,
    'max' => 0,
    'return_format' => 'object',
);