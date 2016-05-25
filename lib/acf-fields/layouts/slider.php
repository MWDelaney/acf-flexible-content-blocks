<?php

/**
 *
 * Layout: Slider
 *
 * @author Michael W. Delaney
 * @since 1.0
 * 
 * Media slider with optional Call to Action button
 */

$layouts_array[] =
    array ( 'order' => '200', 
    'layout' => array (
        'key' => '573b5057ebf46',
        'name' => 'slider',
        'label' => 'Slider',
        'display' => 'block',
        'sub_fields' => array (
            // Titles
            $fields_array['title'],
            $fields_array['navigation_title'],

            // Content tab
            $fields_array['tab_content'],
            $fields_array['content'],
            array (
                'key' => 'field_573b50a0ebf4b',
                'label' => 'Slides',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array (
                'key' => 'field_573b50a9ebf4c',
                'label' => 'Slides',
                'name' => 'slides',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => 'field_573b50b3ebf4d',
                'min' => '',
                'max' => '',
                'layout' => 'row',
                'button_label' => 'Add Slide',
                'sub_fields' => array (
                    array (
                        'key' => 'field_573b50b3ebf4d',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                    array (
                        'key' => 'field_573b50bdebf4e',
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
                    ),
                    array (
                        'key' => 'field_573b510cebf4f',
                        'label' => 'Media Placeholder',
                        'name' => '',
                        'type' => 'message',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array (
                            array (
                                array (
                                    'field' => 'field_573b50bdebf4e',
                                    'operator' => '==',
                                    'value' => 'none',
                                ),
                            ),
                        ),
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'message' => 'No media will be displayed.',
                        'new_lines' => 'wpautop',
                        'esc_html' => 0,
                    ),
                    array (
                        'key' => 'field_573b5129ebf50',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array (
                            array (
                                array (
                                    'field' => 'field_573b50bdebf4e',
                                    'operator' => '==',
                                    'value' => 'image',
                                ),
                            ),
                        ),
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                    array (
                        'key' => 'field_573b5137ebf51',
                        'label' => 'Video',
                        'name' => 'video',
                        'type' => 'oembed',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array (
                            array (
                                array (
                                    'field' => 'field_573b50bdebf4e',
                                    'operator' => '==',
                                    'value' => 'video',
                                ),
                            ),
                        ),
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'width' => '',
                        'height' => '',
                    ),
                ),
            ),
            // Background tab
            $fields_array['tab_background'],
            $fields_array['background_image'],
            $fields_array['background_color'],

            // Tab Endpoint
            $fields_array['tab_endpoint'],

            // Call to Action
            $fields_array['cta_checkbox'],
            $fields_array['cta_placeholder'],
            $fields_array['cta_text'],
            $fields_array['cta_link'],
            $fields_array['cta_type']
        )
    )
);