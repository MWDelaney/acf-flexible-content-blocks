<?php

namespace MWD\ACFFCB;

class Repeaters {

		private $layout;

		function __construct($layout) {
			$this->layout		= $layout;
			$this->key			= 'acffcb-';
			$this->key			.= 'layout-' . $layout;
      $this->key			.= '-repeater-';
		}



		/**
		 *
		 * Repeater: Cards
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 *
		 * Linked content items repeater
		 */
		function cards() {
			$FCBRepeaterFields = new Fields($this->layout, __FUNCTION__);
			$FCBRepeaterFlexibleContent = new FlexibleContent(__FUNCTION__);

			return(
				array (
				  'key' => $this->key . __FUNCTION__,
					'label' => 'Cards',
					'name' => 'cards',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => 'acf-media',
						'id' => '',
					),
					'collapsed' => $this->key . __FUNCTION__ . '-field-title',
					'min' => '',
					'max' => '',
					'layout' => 'block',
					'button_label' => 'Add Card',
					'sub_fields' => array (
						// Title
						$FCBRepeaterFields->title(),
						$FCBRepeaterFields->navigation_title(),

						// Content Tab
						$FCBRepeaterFields->tab_content(),
						$FCBRepeaterFields->content(),

						// Media tab
						$FCBRepeaterFields->tab_media(),
						$FCBRepeaterFlexibleContent->media(),

						// Background Tab
						$FCBRepeaterFields->tab_background(),
						$FCBRepeaterFields->background_image(),
						$FCBRepeaterFields->background_color(),
						$FCBRepeaterFields->background_color_placeholder(),
						$FCBRepeaterFields->theme_color(),
						$FCBRepeaterFields->choose_color(),

						// Call to Action
						$FCBRepeaterFields->tab_cta(),
						$FCBRepeaterFlexibleContent->cta('card'),

						// Tab Endpoint
						$FCBRepeaterFields->tab_endpoint(),

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
		 * Tabs repeater
		 */
		function tabs() {
			$FCBRepeaterFields = new Fields($this->layout, __FUNCTION__);
			$FCBRepeaterFlexibleContent = new FlexibleContent(__FUNCTION__);

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

						// Media tab
						$FCBRepeaterFields->tab_media(),
						$FCBRepeaterFlexibleContent->media(),

						// Background Tab
						$FCBRepeaterFields->tab_background(),
						$FCBRepeaterFields->background_image(),
						$FCBRepeaterFields->background_color(),
						$FCBRepeaterFields->background_color_placeholder(),
						$FCBRepeaterFields->theme_color(),
						$FCBRepeaterFields->choose_color(),

						// Call to Action
						$FCBRepeaterFields->tab_cta(),
						$FCBRepeaterFlexibleContent->cta('tab'),

						// Tab Endpoint
						$FCBRepeaterFields->tab_endpoint(),

					)
				)
			);
		}



		/**
		 *
		 * Repeater: Collapsibles
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 *
		 * Collapsibles repeater
		 */
		function collapsibles() {
			$FCBRepeaterFields = new Fields($this->layout, __FUNCTION__);
			$FCBRepeaterFlexibleContent = new FlexibleContent(__FUNCTION__);

			return(
				array (
				  'key' => $this->key . __FUNCTION__,
					'label' => 'Collapsibles',
					'name' => 'collapsibles',
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
					'button_label' => 'Add Collapsible',
					'sub_fields' => array (

						// Title
						$FCBRepeaterFields->title(),
						$FCBRepeaterFields->navigation_title(),
						$FCBRepeaterFields->panel_type(),

						// Content Tab
						$FCBRepeaterFields->tab_content(),
						$FCBRepeaterFields->content(),

						// Media tab
						$FCBRepeaterFields->tab_media(),
						$FCBRepeaterFlexibleContent->media(),

						// Background Tab
						$FCBRepeaterFields->tab_background(),
						$FCBRepeaterFields->background_image(),
						$FCBRepeaterFields->background_color(),
						$FCBRepeaterFields->background_color_placeholder(),
						$FCBRepeaterFields->theme_color(),
						$FCBRepeaterFields->choose_color(),

						// Call to Action
						$FCBRepeaterFields->tab_cta(),
						$FCBRepeaterFlexibleContent->cta('collapse'),

						// Tab Endpoint
						$FCBRepeaterFields->tab_endpoint(),

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
			$FCBRepeaterFields = new Fields($this->layout, __FUNCTION__);
			$FCBRepeaterFlexibleContent = new FlexibleContent(__FUNCTION__);

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
				    'layout' => 'block',
				    'button_label' => 'Add Slide',
				    'sub_fields' => array (
							// Title
							$FCBRepeaterFields->title(),

							// Content Tab
							$FCBRepeaterFields->tab_content(),
							$FCBRepeaterFields->content(),

							// Call to Action
							$FCBRepeaterFields->tab_cta(),
							$FCBRepeaterFlexibleContent->cta('slide'),

							// Media tab
							$FCBRepeaterFields->tab_media(),
							$FCBRepeaterFlexibleContent->media(),

							// Background Tab
							$FCBRepeaterFields->tab_background(),
							$FCBRepeaterFields->background_image(),
							$FCBRepeaterFields->background_color(),
							$FCBRepeaterFields->background_color_placeholder(),
							$FCBRepeaterFields->theme_color(),
							$FCBRepeaterFields->choose_color(),
					)
				)
			);
		}


		/**
		 *
		 * Field: Block Data Attributes
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 *
		 * Repeater for data attributes on blocks
		 */
		function block_data_attributes() {
			$FCBRepeaterFields = new Fields($this->layout, __FUNCTION__);

			return(
				array (
				    'key' => $this->key . __FUNCTION__,
				    'label' => 'Data Attributes',
				    'name' => 'data_attributes',
				    'type' => 'repeater',
				    'instructions' => '',
				    'required' => 0,
				    'conditional_logic' => 0,
				    'wrapper' => array (
				        'width' => '',
				        'class' => 'acf-dev',
				        'id' => '',
				    ),
				    'collapsed' => '',
				    'min' => '',
				    'max' => '',
				    'layout' => 'table',
				    'button_label' => 'Add Data Attribute',
				    'sub_fields' => array (
						// Data Attributes
				        $FCBRepeaterFields->data_attribute(),
				        $FCBRepeaterFields->data_value(),
					)
				)
			);
		}


		/**
		 *
		 * Field: Content Data Attributes
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 *
		 * Repeater for data attributes on content tabs
		 */
		function content_data_attributes() {
			$FCBRepeaterFields = new Fields($this->layout, __FUNCTION__);

			return(
				array (
				    'key' => $this->key . __FUNCTION__,
				    'label' => 'Data Attributes',
				    'name' => 'data_attributes',
				    'type' => 'repeater',
				    'instructions' => '',
				    'required' => 0,
				    'conditional_logic' => 0,
				    'wrapper' => array (
				        'width' => '',
				        'class' => 'acf-dev',
				        'id' => '',
				    ),
				    'collapsed' => '',
				    'min' => '',
				    'max' => '',
				    'layout' => 'table',
				    'button_label' => 'Add Data Attribute',
				    'sub_fields' => array (
						// Data Attributes
				        $FCBRepeaterFields->data_attribute(),
				        $FCBRepeaterFields->data_value(),
					)
				)
			);
		}



		/**
		 *
		 * Field: Media Data Attributes
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 *
		 * Repeater for data attributes on media tabs
		 */
		function media_data_attributes() {
	        $FCBRepeaterFields = new Fields($this->layout, __FUNCTION__);
			return(
				array (
				    'key' => $this->key . __FUNCTION__,
				    'label' => 'Data Attributes',
				    'name' => 'data_attributes',
				    'type' => 'repeater',
				    'instructions' => '',
				    'required' => 0,
				    'conditional_logic' => 0,
				    'wrapper' => array (
				        'width' => '',
				        'class' => 'acf-dev',
				        'id' => '',
				    ),
				    'collapsed' => '',
				    'min' => '',
				    'max' => '',
				    'layout' => 'table',
				    'button_label' => 'Add Data Attribute',
				    'sub_fields' => array (
						// Data Attributes
				        $FCBRepeaterFields->data_attribute(),
				        $FCBRepeaterFields->data_value(),
					)
				)
			);
		}

	}
