<?php
    class FCBFlexibleContent {

		private $layout;

		function __construct($layout) {
			$this->layout 	= $layout;
			$this->key 	= 'acffcb-';
			$this->key 	.= 'layout-' . $layout;
      $this->key      .= '-flexiblecontent-';
		}

		public function getCallingFunctionName($completeTrace=false)
		    {
		        $trace=debug_backtrace();
		        if($completeTrace)
		        {
		            $str = '';
		            foreach($trace as $caller)
		            {
		                $str .= $caller['function'];
		                if (isset($caller['class']))
		                    $str .= '-' . $caller['class'];
		            }
		        }
		        else
		        {
		            $caller=$trace[2];
		            $str = $caller['function'];
		            if (isset($caller['class']))
		                $str .= '-' . $caller['class'];
		        }
		        return $str;
		    }

		/**
		 *
		 * Flexible Content: Calls to Action
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 *
		 * Flexible Content field for Calls to Action
		 */
		function cta() {
	    $FCBFlexibleContentFields = new FCBFields($this->layout, __FUNCTION__);

			return(
				array (
				  'key' => $this->key . $this->getCallingFunctionName() . __FUNCTION__,
					'label' => 'Calls to Action',
					'name' => 'calls_to_action',
					'type' => 'flexible_content',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => 'acf-cta',
						'id' => '',
					),
					'min' => '',
					'max' => '',
					'button_label' => 'Add Call to Action',
					'layouts' => array (
						array (
							'key' => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-internal_link',
							'name' => 'internal_link',
							'label' => 'Internal Link',
							'display' => 'block',
							'sub_fields' => array (

								// Internal Link
								$FCBFlexibleContentFields->cta_type('internal'),
								$FCBFlexibleContentFields->cta_text('internal'),
								$FCBFlexibleContentFields->cta_link('internal'),
							),
						),
						array (
							'key' => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-external_link',
							'name' => 'external_link',
							'label' => 'External Link',
							'display' => 'block',
							'sub_fields' => array (

								// External Link
								$FCBFlexibleContentFields->cta_type('external'),
								$FCBFlexibleContentFields->cta_text('external'),
								$FCBFlexibleContentFields->cta_external('external'),
							),
						),

					)
				)
			);
		}


		/**
		 *
		 * Flexible Content: Media
		 *
		 * @author Michael W. Delaney
		 * @since 1.0
		 *
		 * Flexible Content field for Calls to Action
		 */
		function media() {
	    $FCBFlexibleContentFields = new FCBFields($this->layout, __FUNCTION__);

			return(
				array (
				  'key' => $this->key . $this->getCallingFunctionName() . __FUNCTION__,
					'label' => 'Media',
					'name' => 'media',
					'type' => 'flexible_content',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => 'acf-media',
						'id' => '',
					),
					'min' => '0',
					'max' => '1',
					'button_label' => 'Add Media',
					'layouts' => array (
						array (
							'key' => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-image',
							'name' => 'image',
							'label' => 'Image',
							'display' => 'block',
							'sub_fields' => array (

								// Image Field
								$FCBFlexibleContentFields->media_image(),

							),
						),
						array (
							'key' => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-video',
							'name' => 'video',
							'label' => 'Video',
							'display' => 'block',
							'sub_fields' => array (

								// Image Field
								$FCBFlexibleContentFields->media_video(),

							),
						),
						array (
							'key' => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-content',
							'name' => 'content',
							'label' => 'Content',
							'display' => 'block',
							'sub_fields' => array (

								// Image Field
								$FCBFlexibleContentFields->media_content(),

							),
						),
						array (
							'key' => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-code',
							'name' => 'code',
							'label' => 'Code',
							'display' => 'block',
							'sub_fields' => array (

								// Image Field
								$FCBFlexibleContentFields->media_code(),

							),
						),

					)
				)
			);
		}

	}
