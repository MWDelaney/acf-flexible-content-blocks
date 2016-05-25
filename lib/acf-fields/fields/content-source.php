<?php
/**
 *
 * Field: Content Source
 *
 * @author Michael W. Delaney
 * @since 1.0
 * 
 * Radio button to select the source of content to be shown.
 */

$array['content_source'] = array (
	'key' => $key,
	'label' => 'Content Source',
	'name' => 'content_source',
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
		'excerpt' => 'Excerpt',
		'manual' => 'Manual Entry',
	),
	'other_choice' => 0,
	'save_other_choice' => 0,
	'default_value' => '',
	'layout' => 'horizontal',
);