<?php
/**
 *
 * Field: Call to Action Link
 *
 * @author Michael W. Delaney
 * @since 1.0
 * 
 * Page Link field for call to action link
 */

$fields_array['cta_link'] = array (
    'key' => $key,
    'label' => 'Link',
    'name' => 'call_to_action_link',
    'type' => 'page_link',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => array (
        array (
            array (
                'field' => 'fcb-cta-checkbox-' . $layout,
                'operator' => '==',
                'value' => '1',
            ),
        ),
    ),
    'wrapper' => array (
        'width' => 30,
        'class' => 'acf-cta',
        'id' => '',
    ),
    'post_type' => array (
    ),
    'taxonomy' => array (
    ),
    'allow_null' => 0,
    'multiple' => 0,
);