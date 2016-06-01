<?php
    class FCBLayouts {

		function __construct() {
			$this->key 		= 'acffcb-';
			$this->key 		.= 'layout-';
		}



		/**
		 *
		 * Repeater: Content
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Basic content block
		 */
		function content() {
	        $FCBFields = new FCBFields(__FUNCTION__);
	        $FCBRepeaters = new FCBRepeaters(__FUNCTION__);

			return( 
			    array ( 'order' => '10', 
					'layout' => array (
						'key' => $this->key . __FUNCTION__,
				        'name' => 'content',
				        'label' => 'Content',
				        'display' => 'block',
				        'sub_fields' => array (
				            // Titles
				            $FCBFields->title(),
				            $FCBFields->navigation_title(),

				            // Content tab
				            $FCBFields->tab_content(),
				            $FCBFields->content(),

				            // Background tab
				            $FCBFields->tab_background(),
				            $FCBFields->background_image(),
				            $FCBFields->background_color(),
				            $FCBFields->background_color_placeholder(),
				            $FCBFields->theme_color(),
				            $FCBFields->choose_color(),

				            // Tab Endpoint
				            $FCBFields->tab_endpoint(),

				            // Call to Action
				            $FCBFields->cta_checkbox(),
				            $FCBFields->cta_placeholder(),
				            $FCBFields->cta_text(),
				            $FCBFields->cta_link(),
				            $FCBFields->cta_type(),
				        )
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
		 * Repeater field for tabs
		 */
		function tabs() {
	        $FCBFields = new FCBFields(__FUNCTION__);
	        $FCBRepeaters = new FCBRepeaters(__FUNCTION__);
	        return( 
			    array ( 'order' => '300', 
					'layout' => array (
						'key' => $this->key . __FUNCTION__,
				        'name' => 'tabs',
				        'label' => 'Tabs',
				        'display' => 'block',
				        'sub_fields' => array (
				            // Titles
				            $FCBFields->title(),
				            $FCBFields->navigation_title(),

				            // Content tab
				            $FCBFields->tab_content(),
				            $FCBFields->content(),

				            // Tabs tab
				            $FCBFields->tab_tabs(),
				            $FCBRepeaters->tabs(),

				            // Background tab
				            $FCBFields->tab_background(),
				            $FCBFields->background_image(),
				            $FCBFields->background_color(),
				            $FCBFields->background_color_placeholder(),
				            $FCBFields->theme_color(),
				            $FCBFields->choose_color(),

				            // Tab Endpoint
				            $FCBFields->tab_endpoint(),

				            // Call to Action
				            $FCBFields->cta_checkbox(),
				            $FCBFields->cta_placeholder(),
				            $FCBFields->cta_text(),
				            $FCBFields->cta_link(),
				            $FCBFields->cta_type(),
						)
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
		 * Repeater field for tabs
		 */
		function collapsibles() {
	        $FCBFields = new FCBFields(__FUNCTION__);
	        $FCBRepeaters = new FCBRepeaters(__FUNCTION__);
	        return( 
			    array ( 'order' => '400', 
					'layout' => array (
						'key' => $this->key . __FUNCTION__,
				        'name' => 'collapsibles',
				        'label' => 'Collapsibles',
				        'display' => 'block',
				        'sub_fields' => array (
				            // Titles
				            $FCBFields->title(),
				            $FCBFields->navigation_title(),

				            // Content tab
				            $FCBFields->tab_content(),
				            $FCBFields->content(),

				            // Collapsibles tab
				            $FCBFields->tab_collapsibles(),
				            $FCBRepeaters->collapsibles(),

				            // Background tab
				            $FCBFields->tab_background(),
				            $FCBFields->background_image(),
				            $FCBFields->background_color(),
				            $FCBFields->background_color_placeholder(),
				            $FCBFields->theme_color(),
				            $FCBFields->choose_color(),

				            // Tab Endpoint
				            $FCBFields->tab_endpoint(),

				            // Call to Action
				            $FCBFields->cta_checkbox(),
				            $FCBFields->cta_placeholder(),
				            $FCBFields->cta_text(),
				            $FCBFields->cta_link(),
				            $FCBFields->cta_type(),
						)
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
	        $FCBFields = new FCBFields(__FUNCTION__);
	        $FCBRepeaters = new FCBRepeaters(__FUNCTION__);
	        return( 
			    array ( 'order' => '90', 
					'layout' => array (
						'key' => $this->key . __FUNCTION__,
				        'name' => 'slides',
				        'label' => 'Slides',
				        'display' => 'block',
				        'sub_fields' => array (
				            // Titles
				            $FCBFields->title(),
				            $FCBFields->navigation_title(),

				            // Content tab
				            $FCBFields->tab_content(),
				            $FCBFields->content(),

				            // Slides tab
				            $FCBFields->tab_slides(),
				            $FCBRepeaters->slides(),

				            // Background tab
				            $FCBFields->tab_background(),
				            $FCBFields->background_image(),
				            $FCBFields->background_color(),
				            $FCBFields->background_color_placeholder(),
				            $FCBFields->theme_color(),
				            $FCBFields->choose_color(),

				            // Tab Endpoint
				            $FCBFields->tab_endpoint(),

				            // Call to Action
				            $FCBFields->cta_checkbox(),
				            $FCBFields->cta_placeholder(),
				            $FCBFields->cta_text(),
				            $FCBFields->cta_link(),
				            $FCBFields->cta_type(),
						)
					)
				)
			);
		}



		/**
		 *
		 * Layout: Content With Media
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * A simple content block with optional media include (image or video) and optional Call to Action button
		 */
		function content_with_media() {
	        $FCBFields = new FCBFields(__FUNCTION__);
	        $FCBRepeaters = new FCBRepeaters(__FUNCTION__);
	        return( 
			    array ( 'order' => '20', 
			    	'layout' => array (
					    'key' => $this->key . __FUNCTION__,
				        'name' => 'content_with_media',
				        'label' => 'Content with Media',
				        'display' => 'block',
				        'sub_fields' => array (
				            // Titles
				            $FCBFields->title(),
				            $FCBFields->navigation_title(),

				            // Content tab
				            $FCBFields->tab_content(),
				            $FCBFields->content(),

				            // Media tab
				            $FCBFields->tab_media(),
				            $FCBFields->type_of_media(),
				            $FCBFields->media_placeholder(),
				            $FCBFields->media_image(),
				            $FCBFields->media_video(),
				            $FCBFields->media_content(),

				            // Background tab
				            $FCBFields->tab_background(),
				            $FCBFields->background_image(),
				            $FCBFields->background_color(),
				            $FCBFields->background_color_placeholder(),
				            $FCBFields->theme_color(),
				            $FCBFields->choose_color(),

				            // Tab Endpoint
				            $FCBFields->tab_endpoint(),

				            // Call to Action
				            $FCBFields->cta_checkbox(),
				            $FCBFields->cta_placeholder(),
				            $FCBFields->cta_text(),
				            $FCBFields->cta_link(),
				            $FCBFields->cta_type(),
				        )
				    )
				)
			);
		}



		/**
		 *
		 * Layout: Featured Content
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Content block with relationship field to feature other site content and optional Call to Action button
		 */
		function featured_content() {
	        $FCBFields = new FCBFields(__FUNCTION__);
	        $FCBRepeaters = new FCBRepeaters(__FUNCTION__);
	        return( 
			    array ( 'order' => '100', 
			    	'layout' => array (
					    'key' => $this->key . __FUNCTION__,
				        'name' => 'featured_content',
				        'label' => 'Featured Content',
				        'display' => 'block',
				        'sub_fields' => array (
				            // Titles
				            $FCBFields->title(),
				            $FCBFields->navigation_title(),

				            // Content tab
				            $FCBFields->tab_content(),
				            $FCBFields->content(),

				            // Features tab
				            $FCBFields->tab_features(),
				            $FCBFields->featured_content(),

				            // Background tab
				            $FCBFields->tab_background(),
				            $FCBFields->background_image(),
				            $FCBFields->background_color(),
				            $FCBFields->background_color_placeholder(),
				            $FCBFields->theme_color(),
				            $FCBFields->choose_color(),

				            // Tab Endpoint
				            $FCBFields->tab_endpoint(),

				            // Call to Action
				            $FCBFields->cta_checkbox(),
				            $FCBFields->cta_placeholder(),
				            $FCBFields->cta_text(),
				            $FCBFields->cta_link(),
				            $FCBFields->cta_type(),
			        	)
				    )
				)
			);
		}



		/**
		 *
		 * Layout: Link List
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * List of links with titles and content
		 */
		function link_list() {
	        $FCBFields = new FCBFields(__FUNCTION__);
	        $FCBRepeaters = new FCBRepeaters(__FUNCTION__);
	        return( 
			    array ( 'order' => '100', 
			    	'layout' => array (
					    'key' => $this->key . __FUNCTION__,
						'name' => 'link_list',
						'label' => 'Link List',
						'display' => 'block',
						'sub_fields' => array (
				            // Titles
				            $FCBFields->title(),
				            $FCBFields->navigation_title(),

				            // Content tab
				            $FCBFields->tab_content(),
				            $FCBFields->content(),

				            // Linked Items repeater
				            $FCBFields->tab_linked_items(),
				            $FCBRepeaters->linked_items(),

				            // Background tab
				            $FCBFields->tab_background(),
				            $FCBFields->background_image(),
				            $FCBFields->background_color(),
				            $FCBFields->background_color_placeholder(),
				            $FCBFields->theme_color(),
				            $FCBFields->choose_color(),

				            // Tab Endpoint
				            $FCBFields->tab_endpoint(),

				            // Call to Action
				            $FCBFields->cta_checkbox(),
				            $FCBFields->cta_placeholder(),
				            $FCBFields->cta_text(),
				            $FCBFields->cta_link(),
				            $FCBFields->cta_type(),
			        	)
				    )
				)
			);
		}



		/**
		 *
		 * Layout: Media
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * A simple media block optional Call to Action button
		 */
		function media() {
	        $FCBFields = new FCBFields(__FUNCTION__);
	        $FCBRepeaters = new FCBRepeaters(__FUNCTION__);
	        return( 
			    array ( 'order' => '60', 
			    	'layout' => array (
					    'key' => $this->key . __FUNCTION__,
				        'name' => 'media',
				        'label' => 'Media',
						'display' => 'block',
						'sub_fields' => array (
				            // Titles
				            $FCBFields->title(),
				            $FCBFields->navigation_title(),

				            // Media tab
				            $FCBFields->tab_media(),
				            $FCBFields->type_of_media(),
				            $FCBFields->media_placeholder(),
				            $FCBFields->media_image(),
				            $FCBFields->media_video(),
				            $FCBFields->media_content(),

				            // Background tab
				            $FCBFields->tab_background(),
				            $FCBFields->background_image(),
				            $FCBFields->background_color(),
				            $FCBFields->background_color_placeholder(),
				            $FCBFields->theme_color(),
				            $FCBFields->choose_color(),

				            // Tab Endpoint
				            $FCBFields->tab_endpoint(),

				            // Call to Action
				            $FCBFields->cta_checkbox(),
				            $FCBFields->cta_placeholder(),
				            $FCBFields->cta_text(),
				            $FCBFields->cta_link(),
				            $FCBFields->cta_type(),
			        	)
				    )
				)
			);
		}



		/**
		 *
		 * Layout: Slider
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 * 
		 * Media slider with optional Call to Action button
		 */
		function slider() {
	        $FCBFields = new FCBFields(__FUNCTION__);
	        $FCBRepeaters = new FCBRepeaters(__FUNCTION__);
	        return( 
			    array ( 'order' => '200', 
			    	'layout' => array (
					    'key' => $this->key . __FUNCTION__,
				        'name' => 'slider',
				        'label' => 'Slider',
						'display' => 'block',
						'sub_fields' => array (
				            // Titles
				            $FCBFields->title(),
				            $FCBFields->navigation_title(),

				            // Content tab
				            $FCBFields->tab_content(),
				            $FCBFields->content(),

				            // Slides tab
				            $FCBFields->tab_slides(),
				            $FCBRepeaters->slides(),

				            // Background tab
				            $FCBFields->tab_background(),
				            $FCBFields->background_image(),
				            $FCBFields->background_color(),
				            $FCBFields->background_color_placeholder(),
				            $FCBFields->theme_color(),
				            $FCBFields->choose_color(),

				            // Tab Endpoint
				            $FCBFields->tab_endpoint(),

				            // Call to Action
				            $FCBFields->cta_checkbox(),
				            $FCBFields->cta_placeholder(),
				            $FCBFields->cta_text(),
				            $FCBFields->cta_link(),
				            $FCBFields->cta_type(),
			        	)
				    )
				)
			);
		}
}
