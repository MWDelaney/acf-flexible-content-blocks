<?php
    class FCBFields {

		private $layout;
		private $repeater;

		function __construct($layout, $repeater = null) {
			$this->layout 	= $layout;
			$this->repeater = $repeater;
			$this->key 		= 'acffcb-';
			$this->key 		.= 'layout-' . $layout;
			$this->key 	   .= (isset($repeater)) ? '-repeater-' . $repeater : null;
        		$this->key     .= '-field-';
		}



		/**
		 *
		 * Field: Title
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Title fields shared by all layouts
		 */
		function title() {
			return( 
				array (
				    'key' => $this->key . __FUNCTION__,
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
				)
			);
		}



		/**
		 *
		 * Field: Navigation Title
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Navigation Title fields shared by all layouts
		 */
		function navigation_title() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
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
				)
			);
		}


		/**
		 *
		 * Field: Background Color
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Background color selector field
		 */
		function background_color() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
				    'label' => 'Background Color',
				    'name' => 'background_color',
				    'type' => 'color_picker',
				    'instructions' => '',
				    'required' => 0,
				    'conditional_logic' => 0,
				    'wrapper' => array (
				        'width' => '',
				        'class' => '',
				        'id' => '',
				    ),
				    'default_value' => '',
				)
			);
		}


		/**
		 *
		 * Field: Background Image
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Background image
		 */
		function background_image() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
				    'label' => 'Background Image',
				    'name' => 'background_image',
				    'type' => 'image',
				    'instructions' => '',
				    'required' => 0,
				    'conditional_logic' => 0,
				    'wrapper' => array (
				        'width' => '',
				        'class' => 'acf-media',
				        'id' => '',
				    ),
				    'return_format' => 'array',
				    'preview_size' => 'large',
				    'library' => 'all',
				    'min_width' => '',
				    'min_height' => '',
				    'min_size' => '',
				    'max_width' => '',
				    'max_height' => '',
				    'max_size' => '',
				    'mime_types' => '',
				)
			);
		}



		/**
		 *
		 * Field: Content Source
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Radio button to select the source of content to be shown.
		 */
		function content_source() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
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
				)
			);
		}		


		/**
		 *
		 * Field: Excerpt Placeholder
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Placeholder for when the "excerpt" is selected as the source of content
		 */
		function content_excerpt_placeholder() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
					'label' => 'Excerpt Placeholder',
					'name' => '',
					'type' => 'message',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
				                'field' => $this->key . 'content_source',
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
				)
			);
		}



		/**
		 *
		 * Field: Content Conditional
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Content field shown when "manual" is entered as the content source.
		 */
		function content_conditional() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
					'label' => 'Content',
					'name' => 'content',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
				                'field' => $this->key . 'content_source',
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
				)
			);
		}



		/**
		 *
		 * Field: Content Field
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * WYSIWYG content field
		 */
		function content() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
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
				)
			);
		}


		/**
		 *
		 * Field: Display Call to Action? Checkbox
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * True/False field to display call to action or not
		 */
		function cta_checkbox() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
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
				)
			);
		}


		/**
		 *
		 * Field: Call to Action Link
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Page Link field for call to action link
		 */
		function cta_link() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
				    'label' => 'Link',
				    'name' => 'call_to_action_link',
				    'type' => 'page_link',
				    'instructions' => '',
				    'required' => 0,
				    'conditional_logic' => array (
				        array (
				            array (
				                'field' => $this->key . 'cta_checkbox',
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
				)
			);
		}


		/**
		 *
		 * Field: Placeholder for CTA if none is to be shown
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Message field for CTA placeholder
		 */
		function cta_placeholder() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
				    'label' => 'Placeholder',
				    'name' => '',
				    'type' => 'message',
				    'instructions' => '',
				    'required' => 0,
				    'conditional_logic' => array (
				        array (
				            array (
				                'field' => $this->key . 'cta_checkbox',
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
				)
			);
		}


		/**
		 *
		 * Field: Call to Action Text
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Text field for CTA
		 */
		function cta_text() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
				    'label' => 'Text',
				    'name' => 'call_to_action_text',
				    'type' => 'text',
				    'instructions' => '',
				    'required' => 0,
				    'conditional_logic' => array (
				        array (
				            array (
				                'field' => $this->key . 'cta_checkbox',
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
				)
			);
		}


		/**
		 *
		 * Field: Call to Action Type
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Select field to choose the semantic button type for the CTA
		 */
		function cta_type() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
				    'label' => 'Type',
				    'name' => 'call_to_action_type',
				    'type' => 'select',
				    'instructions' => '',
				    'required' => 0,
				    'conditional_logic' => array (
				        array (
				            array (
				                'field' => $this->key . 'cta_checkbox',
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
				)
			);
		}


		/**
		 *
		 * Field: Featured Content
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Relationship field for featured content
		 */
		function featured_content() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
				    'label' => 'Featured Content',
				    'name' => 'featured_content',
				    'type' => 'relationship',
				    'instructions' => '',
				    'required' => 0,
				    'conditional_logic' => 0,
				    'wrapper' => array (
				        'width' => '',
				        'class' => '',
				        'id' => '',
				    ),
				    'post_type' => array (
				    ),
				    'taxonomy' => array (
				    ),
				    'filters' => array (
				        0 => 'search',
				        1 => 'post_type',
				        2 => 'taxonomy',
				    ),
				    'elements' => '',
				    'min' => 0,
				    'max' => 0,
				    'return_format' => 'object',
				)
			);
		}


		/**
		 *
		 * Field: Link Text
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Text field for a link's text.
		 */
		function link_text() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
					'label' => 'Link Text',
					'name' => 'link_text',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 50,
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
				)
			);
		}


		/**
		 *
		 * Field: Link
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Post Object field for link
		 */
		function link() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
					'label' => 'Link',
					'name' => 'link',
					'type' => 'post_object',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 50,
						'class' => '',
						'id' => '',
					),
					'post_type' => array (
					),
					'taxonomy' => array (
					),
					'allow_null' => 0,
					'multiple' => 0,
					'return_format' => 'object',
					'ui' => 1,
				)
			);
		}


		/**
		 *
		 * Field: Type of Media
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Radio button field for Type of Media attachment
		 */
		function type_of_media() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
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
				)
			);
		}



		/**
		 *
		 * Field: Media Placeholder
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Placeholder for when no media is selected
		 */
		function media_placeholder() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
				    'label' => 'Media Placeholder',
				    'name' => '',
				    'type' => 'message',
				    'instructions' => '',
				    'required' => 0,
				    'conditional_logic' => array (
				        array (
				            array (
				                'field' => $this->key . 'type_of_media',
				                'operator' => '==',
				                'value' => 'none',
				            ),
				        ),
				    ),
				    'wrapper' => array (
				        'width' => '',
				        'class' => 'acf-media',
				        'id' => '',
				    ),
				    'message' => 'No media will be displayed.',
				    'new_lines' => 'wpautop',
				    'esc_html' => 0,
				)
			);
		}



		/**
		 *
		 * Field: Media Image
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Image field for media selector
		 */
		function media_image() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
				    'label' => 'Image',
				    'name' => 'image',
				    'type' => 'image',
				    'instructions' => '',
				    'required' => 0,
				    'conditional_logic' => array (
				        array (
				            array (
				                'field' => $this->key . 'type_of_media',
				                'operator' => '==',
				                'value' => 'image',
				            ),
				        ),
				    ),
				    'wrapper' => array (
				        'width' => '',
				        'class' => 'acf-media',
				        'id' => '',
				    ),
				    'return_format' => 'array',
				    'preview_size' => 'medium',
				    'library' => 'all',
				    'min_width' => '',
				    'min_height' => '',
				    'min_size' => '',
				    'max_width' => '',
				    'max_height' => '',
				    'max_size' => '',
				    'mime_types' => '',
				)
			);
		}


		/**
		 *
		 * Field: Media Video
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Video field for media selector
		 */
		function media_video() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
				    'label' => 'Video',
				    'name' => 'video',
				    'type' => 'oembed',
				    'instructions' => '',
				    'required' => 0,
				    'conditional_logic' => array (
				        array (
				            array (
				                'field' => $this->key . 'type_of_media',
				                'operator' => '==',
				                'value' => 'video',
				            ),
				        ),
				    ),
				    'wrapper' => array (
				        'width' => '',
				        'class' => 'acf-media',
				        'id' => '',
				    ),
				    'width' => '',
				    'height' => '',
				)
			);
		}


		/**
		 *
		 * Field: Background Tab
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Tab titled "Background"
		 */
		function tab_background() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
				    'label' => 'Background',
				    'name' => 'background',
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
				)
			);
		}



		/**
		 *
		 * Field: Tabs Tab
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Tab titled "Tabs"
		 */
		function tab_tabs() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
				    'label' => 'Tabs',
				    'name' => 'tabs',
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
				)
			);
		}



		/**
		 *
		 * Field: Content Tab
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Tab titled "Content"
		 */
		function tab_content() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
				    'label' => 'Content',
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
				)
			);
		}


		/**
		 *
		 * Field: Tab Endpoint
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Endpoint field for content tabs
		 */
		function tab_endpoint() {
			return(
				array (
					'key' => $this->key . __FUNCTION__,
				    'label' => '',
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
				    'endpoint' => 1,
				)
			);
		}


		/**
		 *
		 * Field: Features Tab
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Tab titled "Features"
		 */
		function tab_features() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
				    'label' => 'Features',
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
				)
			);
		}


		/**
		 *
		 * Field: Linked Items Tab
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Tab titled "Linked Items"
		 */
		function tab_linked_items() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
					'label' => 'Linked Items',
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
				)
			);
		}


		/**
		 *
		 * Field: Media Tab
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Tab titled "Media"
		 */
		function tab_media() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
				    'label' => 'Media',
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
				)
			);
		}


		/**
		 *
		 * Field: Slides Tab
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Tab titled "Slides"
		 */
		function tab_slides() {
			return( 
				array (
					'key' => $this->key . __FUNCTION__,
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
				)
			);
		}


    }
