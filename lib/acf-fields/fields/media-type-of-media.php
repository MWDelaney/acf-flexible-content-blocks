<?php
/**
 *
 * Field: Type of Media
 *
 * @author Michael W. Delaney
 * @since 1.0
 * 
 * Radio button field for Type of Media attachment
 */

$fields_array['type_of_media'] = array (
    'key' => $key,
    'label' => 'Type of Media',
    'name' => 'type_of_media',
    'type' => 'radio',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => 0,
    'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
    ),
    'choices' => array (
        'none' => 'None',
        'image' => 'Image',
        'video' => 'Video',
    ),
    'other_choice' => 0,
    'save_other_choice' => 0,
    'default_value' => '',
    'layout' => 'horizontal',
);