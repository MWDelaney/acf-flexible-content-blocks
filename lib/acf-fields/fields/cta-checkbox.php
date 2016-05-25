<?php
/**
 *
 * Field: Display Call to Action? Checkbox
 *
 * @author Michael W. Delaney
 * @since 1.0
 * 
 * True/False field to display call to action or not
 */

$fields_array['cta_checkbox'] = array (
    'key' => $key,
    'label' => 'Display Call to Action?',
    'name' => 'display_call_to_action',
    'type' => 'true_false',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => 0,
    'wrapper' => array (
        'width' => 20,
        'class' => 'acf-cta',
        'id' => '',
    ),
    'message' => '',
    'default_value' => 0,
);