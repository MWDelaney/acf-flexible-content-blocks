<?php
/**
 *
 * Field: Content Conditional
 *
 * @author Michael W. Delaney
 * @since 1.0
 * 
 * Content field shown when "manual" is entered as the content source.
 */

$array['content_conditional'] = array (
	'key' => $key,
	'label' => 'Content',
	'name' => 'content',
	'type' => 'wysiwyg',
	'instructions' => '',
	'required' => 0,
	'conditional_logic' => array (
		array (
			array (
                'field' => 'fcb-content-source-' . $repeater_name . $layout,
				'operator' => '==',
				'value' => 'manual',
			),
		),
	),
	'wrapper' => array (
		'width' => '',
		'class' => '',
		'id' => '',
	),
	'default_value' => '',
	'tabs' => 'all',
	'toolbar' => 'full',
	'media_upload' => 1,
);