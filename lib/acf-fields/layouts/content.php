<?php

  /*--------------------------------------------------------------------------------------
    *
    * Layout: Content
    *
    * @author Michael W. Delaney
    * @since 1.0
    *
    * A simple content block with optional Call to Action button
    *
    *-------------------------------------------------------------------------------------*/

$content = 			
    array (
        'key' => '57392236ab5e3',
        'name' => 'content',
        'label' => 'Content',
        'display' => 'block',
        'sub_fields' => array (
            array (
                'key' => 'field_57392245f9c6b',
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 50,
                    'class' => 'acf-title',
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
                'key' => 'field_57392259f9c6c',
                'label' => 'Navigation Title',
                'name' => 'navigation_title',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 50,
                    'class' => 'acf-title',
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
                'key' => 'field_57392274f9c6e',
                'label' => 'Content',
                'name' => 'content',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
            ),
            array (
                'key' => 'field_573922faf9c75',
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
            ),
           array (
                'key' => 'field_57392389f9c79',
                'label' => 'Placeholder',
                'name' => '',
                'type' => 'message',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array (
                    array (
                        array (
                            'field' => 'field_573922faf9c75',
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
            ),
            array (
                'key' => 'field_5739230af9c76',
                'label' => 'Text',
                'name' => 'call_to_action_text',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array (
                    array (
                        array (
                            'field' => 'field_573922faf9c75',
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
            ),
            array (
                'key' => 'field_57392314f9c77',
                'label' => 'Link',
                'name' => 'call_to_action_link',
                'type' => 'page_link',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array (
                    array (
                        array (
                            'field' => 'field_573922faf9c75',
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
            ),
            array (
                'key' => 'field_57392349f9c78',
                'label' => 'Type',
                'name' => 'call_to_action_type',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array (
                    array (
                        array (
                            'field' => 'field_573922faf9c75',
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
            ),
        )
    );