<?php
    class FCBLayouts {
    	public $key = '';
		function __construct() {
			$this->key 		= 'acffcb-';
			$this->key 		.= 'layout-';
		}



		/**
		 *
		 * Layout: Content
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 *
		 * Basic content block
		 */
		function content() {
	        $FCBFields = new FCBFields(__FUNCTION__);
	        $FCBRepeaters = new FCBRepeaters(__FUNCTION__);
					$FCBFlexibleContent = new FCBFlexibleContent(__FUNCTION__);

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

										// Call to Action
										$FCBFields->tab_cta(),
				            $FCBFlexibleContent->cta(),

				            // Dev Mode tab
				            $FCBFields->tab_dev(),
				            $FCBFields->dev_block_message(),
				            $FCBRepeaters->block_data_attributes(),
				            $FCBFields->block_classes(),

				            $FCBFields->dev_content_message(),
				            $FCBRepeaters->content_data_attributes(),
				            $FCBFields->content_classes(),

				            // Tab Endpoint
				            $FCBFields->tab_endpoint(),

				        )
				    )
				)
			);
		}



		/**
		 *
		 * Layout: Tabs
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 *
		 * Layout for tabbed content
		 */
		function tabs() {
	        $FCBFields = new FCBFields(__FUNCTION__);
	        $FCBRepeaters = new FCBRepeaters(__FUNCTION__);
					$FCBFlexibleContent = new FCBFlexibleContent(__FUNCTION__);

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

										// Call to Action
										$FCBFields->tab_cta(),
				            $FCBFlexibleContent->cta(),

				            // Tab Endpoint
				            $FCBFields->tab_endpoint(),

						)
					)
				)
			);
		}



		/**
		 *
		 * Layout: Gallery
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 *
		 * Image gallery layout
		 */
		function gallery() {
	        $FCBFields = new FCBFields(__FUNCTION__);
	        $FCBRepeaters = new FCBRepeaters(__FUNCTION__);
					$FCBFlexibleContent = new FCBFlexibleContent(__FUNCTION__);

			return(
			    array ( 'order' => '70',
					'layout' => array (
						'key' => $this->key . __FUNCTION__,
				        'name' => 'gallery',
				        'label' => 'Gallery',
				        'display' => 'block',
				        'sub_fields' => array (
				            // Titles
				            $FCBFields->title(),
				            $FCBFields->navigation_title(),

				            // Content tab
				            $FCBFields->tab_content(),
				            $FCBFields->content(),
				            $FCBRepeaters->content_data_attributes(),

				            // Gallery tab
				            $FCBFields->tab_gallery(),
				            $FCBFields->gallery(),

				            // Background tab
				            $FCBFields->tab_background(),
				            $FCBFields->background_image(),
				            $FCBFields->background_color(),
				            $FCBFields->background_color_placeholder(),
				            $FCBFields->theme_color(),
				            $FCBFields->choose_color(),

										// Call to Action
										$FCBFields->tab_cta(),
				            $FCBFlexibleContent->cta(),

				            // Tab Endpoint
				            $FCBFields->tab_endpoint(),

				        )
				    )
				)
			);
		}



		/**
		 *
		 * Layout: Collapsibles
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 *
		 * Layout for collapsible or "accordion" content
		 */
		function collapsibles() {
	        $FCBFields = new FCBFields(__FUNCTION__);
	        $FCBRepeaters = new FCBRepeaters(__FUNCTION__);
					$FCBFlexibleContent = new FCBFlexibleContent(__FUNCTION__);

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
				            $FCBRepeaters->content_data_attributes(),

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

										// Call to Action
										$FCBFields->tab_cta(),
				            $FCBFlexibleContent->cta(),

				            // Tab Endpoint
				            $FCBFields->tab_endpoint(),

						)
					)
				)
			);
		}



		/**
		 *
		 * Layout: Slides
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 *
		 * Layout for a carousel of images or other media content
		 */
		function slides() {
	        $FCBFields = new FCBFields(__FUNCTION__);
	        $FCBRepeaters = new FCBRepeaters(__FUNCTION__);
					$FCBFlexibleContent = new FCBFlexibleContent(__FUNCTION__);

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

										// Call to Action
										$FCBFields->tab_cta(),
				            $FCBFlexibleContent->cta(),

				            // Tab Endpoint
				            $FCBFields->tab_endpoint(),

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
					$FCBFlexibleContent = new FCBFlexibleContent(__FUNCTION__);

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
										$FCBFlexibleContent->media(),

				            // Background tab
				            $FCBFields->tab_background(),
				            $FCBFields->background_image(),
				            $FCBFields->background_color(),
				            $FCBFields->background_color_placeholder(),
				            $FCBFields->theme_color(),
				            $FCBFields->choose_color(),

										// Call to Action
										$FCBFields->tab_cta(),
				            $FCBFlexibleContent->cta(),

				            // Dev Mode tab
				            $FCBFields->tab_dev(),
				            $FCBFields->dev_content_message(),
				            $FCBRepeaters->content_data_attributes(),
				            $FCBFields->content_classes(),

				            $FCBFields->dev_media_message(),
				            $FCBRepeaters->media_data_attributes(),
				            $FCBFields->media_classes(),


				            // Tab Endpoint
				            $FCBFields->tab_endpoint(),

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
					$FCBFlexibleContent = new FCBFlexibleContent(__FUNCTION__);

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
				            $FCBRepeaters->content_data_attributes(),

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

										// Call to Action
										$FCBFields->tab_cta(),
				            $FCBFlexibleContent->cta(),

				            // Tab Endpoint
				            $FCBFields->tab_endpoint(),

			        	)
				    )
				)
			);
		}



		/**
		 *
		 * Layout: Cards
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 *
		 * List of links with titles and content
		 */
		function cards() {
	        $FCBFields = new FCBFields(__FUNCTION__);
	        $FCBRepeaters = new FCBRepeaters(__FUNCTION__);
					$FCBFlexibleContent = new FCBFlexibleContent(__FUNCTION__);

	        return(
			    array ( 'order' => '100',
			    	'layout' => array (
					    'key' => $this->key . __FUNCTION__,
						'name' => 'cards',
						'label' => 'Cards',
						'display' => 'block',
						'sub_fields' => array (
				            // Titles
				            $FCBFields->title(),
				            $FCBFields->navigation_title(),

				            // Content tab
				            $FCBFields->tab_content(),
				            $FCBFields->content(),
				            $FCBRepeaters->content_data_attributes(),

				            // Linked Items repeater
				            $FCBFields->tab_cards(),
				            $FCBRepeaters->cards(),

				            // Background tab
				            $FCBFields->tab_background(),
				            $FCBFields->background_image(),
				            $FCBFields->background_color(),
				            $FCBFields->background_color_placeholder(),
				            $FCBFields->theme_color(),
				            $FCBFields->choose_color(),

										// Call to Action
										$FCBFields->tab_cta(),
				            $FCBFlexibleContent->cta(),

				            // Tab Endpoint
				            $FCBFields->tab_endpoint(),

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
					$FCBFlexibleContent = new FCBFlexibleContent(__FUNCTION__);

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
										$FCBFlexibleContent->media(),

				            // Background tab
				            $FCBFields->tab_background(),
				            $FCBFields->background_image(),
				            $FCBFields->background_color(),
				            $FCBFields->background_color_placeholder(),
				            $FCBFields->theme_color(),
				            $FCBFields->choose_color(),

										// Call to Action
										$FCBFields->tab_cta(),
										$FCBFlexibleContent->cta(),

				            // Tab Endpoint
				            $FCBFields->tab_endpoint(),

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
					$FCBFlexibleContent = new FCBFlexibleContent(__FUNCTION__);

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
				            $FCBRepeaters->content_data_attributes(),

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

										// Call to Action
										$FCBFields->tab_cta(),
				            $FCBFlexibleContent->cta(),

				            // Tab Endpoint
				            $FCBFields->tab_endpoint(),

			        	)
				    )
				)
			);
		}


		/**
		 *
		 * Layout: Post List
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 *
		 * List of posts
		 */
		function post_list() {
	        $FCBFields = new FCBFields(__FUNCTION__);
	        $FCBRepeaters = new FCBRepeaters(__FUNCTION__);
					$FCBFlexibleContent = new FCBFlexibleContent(__FUNCTION__);

			return(
			    array ( 'order' => '500',
					'layout' => array (
						'key' => $this->key . __FUNCTION__,
				        'name' => 'post_list',
				        'label' => 'Post List',
				        'display' => 'block',
				        'sub_fields' => array (
				            // Titles
				            $FCBFields->title(),
				            $FCBFields->navigation_title(),

				            // Content tab
				            $FCBFields->tab_content(),
				            $FCBFields->content(),
				            $FCBRepeaters->content_data_attributes(),

				            // Post List Tab
				            $FCBFields->tab_post_list(),
										$FCBFields->posts_per_page(),
										$FCBFields->show_author(),
										$FCBFields->show_date(),
										$FCBFields->show_featured_image(),
										$FCBFields->category(),

				            // Background tab
				            $FCBFields->tab_background(),
				            $FCBFields->background_image(),
				            $FCBFields->background_color(),
				            $FCBFields->background_color_placeholder(),
				            $FCBFields->theme_color(),
				            $FCBFields->choose_color(),

										// Call to Action
										$FCBFields->tab_cta(),
				            $FCBFlexibleContent->cta(),

				            // Tab Endpoint
				            $FCBFields->tab_endpoint(),

				        )
				    )
				)
			);
		}
}
