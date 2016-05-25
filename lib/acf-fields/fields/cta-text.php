<?php
/**
 *
 * Field: Call to Action Text
 *
 * @author Michael W. Delaney
 * @since 1.0
 * 
 * Text field for CTA
 */

$fields_array['cta_text'] = array (
    'key' => $key,
    'label' => 'Text',
    'name' => 'call_to_action_text',
    'type' => 'text',
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
    'default_value' => '',
    'placeholder' => '',
    'prepend' => '',
    'append' => '',
    'maxlength' => '',
    'readonly' => 0,
    'disabled' => 0,
);