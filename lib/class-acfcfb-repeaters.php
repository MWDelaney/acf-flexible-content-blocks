<?php
    class FCBRepeaters {

		private $layout;

		function __construct($layout) {
			$this->layout 	= $layout;
			$this->key 	= 'acffcb-';
			$this->key 	.= 'layout-' . $layout;
        	$this->key      .= '-repeater-';
		}



		/**
		 *
		 * Repeater: Linked Items
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Linked content items repeater
		 */
		function linked_items() {
	        $FCBRepeaterFields = new FCBFields($this->layout, __FUNCTION__);
			return( 
				array (
				    'key' => $this->key . __FUNCTION__,
					'label' => 'Linked Items',
					'name' => 'linked_items',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => 'acf-media',
						'id' => '',
					),
					'collapsed' => 'field_573e0e481c7f7',
					'min' => '',
					'max' => '',
					'layout' => 'block',
					'button_label' => 'Add Item',
					'sub_fields' => array (

						// Title
				        $FCBRepeaterFields->title(),
				        $FCBRepeaterFields->navigation_title(),
				        
				    	// Content Tab 
				    	$FCBRepeaterFields->tab_content(),
				    	$FCBRepeaterFields->content_source(),
				    	$FCBRepeaterFields->content_excerpt_placeholder(),
				    	$FCBRepeaterFields->content_conditional(),

				    	// Background Tab 
				    	$FCBRepeaterFields->tab_background(),
				    	$FCBRepeaterFields->background_image(),
				    	$FCBRepeaterFields->background_color(),

				    	// Tab Endpoint
				    	$FCBRepeaterFields->tab_endpoint(),

				    	// Link
				    	$FCBRepeaterFields->link_text(),
				    	$FCBRepeaterFields->link(),

					)
				)
			);
		}



		/**
		 *
		 * Repeater: Tabs
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Linked content items repeater
		 */
		function tabs() {
	        $FCBRepeaterFields = new FCBFields($this->layout, __FUNCTION__);
			return( 
				array (
				    'key' => $this->key . __FUNCTION__,
					'label' => 'Tabs',
					'name' => 'tabs',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => 'acf-media',
						'id' => '',
					),
					'collapsed' => '',
					'min' => '',
					'max' => '',
					'layout' => 'block',
					'button_label' => 'Add Tab',
					'sub_fields' => array (

						// Title
				        $FCBRepeaterFields->title(),
				        $FCBRepeaterFields->navigation_title(),
				        
				    	// Content Tab 
				    	$FCBRepeaterFields->tab_content(),
				    	$FCBRepeaterFields->content(),

				        // Media
				        $FCBRepeaterFields->tab_media(),
			            $FCBRepeaterFields->type_of_media(),
			            $FCBRepeaterFields->media_placeholder(),
			            $FCBRepeaterFields->media_image(),
			            $FCBRepeaterFields->media_video(),

				    	// Background Tab 
				    	$FCBRepeaterFields->tab_background(),
				    	$FCBRepeaterFields->background_image(),
				    	$FCBRepeaterFields->background_color(),

				    	// Tab Endpoint
				    	$FCBRepeaterFields->tab_endpoint(),

			            // Call to Action
			            $FCBRepeaterFields->cta_checkbox(),
			            $FCBRepeaterFields->cta_placeholder(),
			            $FCBRepeaterFields->cta_text(),
			            $FCBRepeaterFields->cta_link(),
			            $FCBRepeaterFields->cta_type(),

					)
				)
			);
		}



		/**
		 *
		 * Repeater: Slides
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Repeater field for slides
		 */
		function slides() {
	        $FCBRepeaterFields = new FCBFields($this->layout, __FUNCTION__);
			return( 
				array (
				    'key' => $this->key . __FUNCTION__,
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
						// Title
				        $FCBRepeaterFields->title(),

				        // Media
			            $FCBRepeaterFields->type_of_media(),
			            $FCBRepeaterFields->media_placeholder(),
			            $FCBRepeaterFields->media_image(),
			            $FCBRepeaterFields->media_video(),
					)
				)
			);
		}

	}
