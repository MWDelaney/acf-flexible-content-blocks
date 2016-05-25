<?php
/**
 *
 * Field: Excerpt Placeholder
 *
 * @author Michael W. Delaney
 * @since 1.0
 * 
 * Placeholder for when the "excerpt" is selected as the source of content
 */

$array['content_excerpt_placeholder'] = array (
	'key' => $key,
	'label' => 'Excerpt Placeholder',
	'name' => '',
	'type' => 'message',
	'instructions' => '',
	'required' => 0,
	'conditional_logic' => array (
		array (
			array (
                'field' => 'fcb-content-source-' . $repeater_name . $layout,
				'operator' => '==',
				'value' => 'excerpt',
			),
		),
	),
	'wrapper' => array (
		'width' => '',
		'class' => 'acf-media',
		'id' => '',
	),
	'message' => 'Content will be drawn from the linked item\'s excerpt.',
	'new_lines' => 'wpautop',
	'esc_html' => 0,
);