<?php
/**
 *
 * Field: Placeholder for CTA if none is to be shown
 *
 * @author Michael W. Delaney
 * @since 1.0
 * 
 * Message field for CTA placeholder
 */

$fields_array['cta_placeholder'] = array (
    'key' => $key,
    'label' => 'Placeholder',
    'name' => '',
    'type' => 'message',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => array (
        array (
            array (
                'field' => 'fcb-cta-checkbox-' . $layout,
                'operator' => '!=',
                'value' => '1',
            ),
        ),
    ),
    'wrapper' => array (
        'width' => 80,
        'class' => '',
        'id' => '',
    ),
    'message' => 'No Call to Action will be displayed.',
    'new_lines' => 'wpautop',
    'esc_html' => 0,
);