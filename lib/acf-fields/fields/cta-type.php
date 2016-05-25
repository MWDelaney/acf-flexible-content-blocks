<?php
/**
 *
 * Field: Call to Action Tye
 *
 * @author Michael W. Delaney
 * @since 1.0
 * 
 * Select field to choose the semantic button type for the CTA
 */

$array['cta_type'] = array (
    'key' => $key,
    'label' => 'Type',
    'name' => 'call_to_action_type',
    'type' => 'select',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => array (
        array (
            array (
                'field' => 'fcb-cta-checkbox-' . $repeater_name . $layout,
                'operator' => '==',
                'value' => '1',
            ),
        ),
    ),
    'wrapper' => array (
        'width' => 20,
        'class' => 'acf-cta',
        'id' => '',
    ),
    'choices' => array (
        'primary' => 'Primary',
        'default' => 'Default',
        'success' => 'Success',
        'info' => 'Info',
        'warning' => 'Warning',
        'danger' => 'Danger',
        'link' => 'Link Only',
    ),
    'default_value' => array (
    ),
    'allow_null' => 0,
    'multiple' => 0,
    'ui' => 0,
    'ajax' => 0,
    'placeholder' => '',
    'disabled' => 0,
    'readonly' => 0,
);