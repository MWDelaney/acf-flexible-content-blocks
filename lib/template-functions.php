<?php 

/**
 * Template wrapper
 *
 * @param string $slug The slug name for the generic template.
 * @param string $load The name of the specialised template.
 */

    function cfb_template($slug, $load = null) {
        $acffcb_templates = new ACFFCB_Template_Loader;
        $acffcb_templates->get_template_part( $slug, $load );
    }



    /**
     * Set the HTML header tag (h1, h2) for block titles. Defaults to 'h2'.
     * This can be overridden using filters like the following:
     *
     *     remove_filter( 'fcb_set_block_htag', 'block_htag_level', 10 );
     *     add_filter( 'set_block_htag', 'custom_htag_level', 10, 2 );
     *     function custom_htag_level($title, $htag) {
     *         if($GLOBALS['fcb_rows_count'] == 0) {
     *             $htag = 'h1';
     *         } else {
     *             $htag = 'h2';
     *         }
     *         return '<' . $htag . '>' . $title . '</' . $htag . '>';
     *     }
     *
     * @param  string $title The sub-field containing the title.
     * @param  string $htag  The default header tag (defaults to h2)
     * @return string        The formatted title wrapped in the proper h-tag.
     */
    function block_htag_level() {
        return 'h2';
    }

    function build_block_title($title) {
        $htag = apply_filters( 'fcb_set_block_htag', null, null);
        return '<' . $htag . ' id="' . sanitize_title_with_dashes($title) . '">' . $title . '</' . $htag . '>';
    }



    /**
     * Available background colors by semantic name. These can be overridden or added to with a filter like the following:
     *     add_filter( 'fcb_bg_colors', 'custom_bg_colors');
     *     function custom_bg_colors($array) {
     *         $array['secondary'] = 'Secondary';
     *         return $array;
     *     }
     */
    function fcb_bg_colors() {
        $colors = array (
            'primary'   => 'Primary',
            'success'   => 'Success',
            'info'      => 'Info',
            'warning'   => 'Warning',
            'danger'    => 'Danger',
        );
        $colors = apply_filters('fcb_bg_colors', $colors);
        return $colors;
    }



    /**
     * Available button colors by semantic name. These can be overridden or added to with a filter like the following:
     *     add_filter( 'fcb_btn_colors', 'custom_btn_colors');
     *     function custom_btn_colors($array) {
     *         $array['secondary'] = 'Secondary';
     *         return $array;
     *     }
     */
    function fcb_btn_colors() {
        $colors = array (
            'primary'   => 'Primary',
            'default'   => 'Default',
            'success'   => 'Success',
            'info'      => 'Info',
            'warning'   => 'Warning',
            'danger'    => 'Danger',
            'link'      => 'Link Only',
        );
        $colors = apply_filters('fcb_btn_colors', $colors);
        return $colors;
    }



    /**
     * Echo the block title with applied filters
     * @return string The formatted title
     */
    function the_block_title() {
        echo build_block_title( get_sub_field('title') );
    }


    /**
     * Set a filter to change the block title output.
     */
    add_filter( 'fcb_set_block_htag', 'block_htag_level', 10);



    /**
     * Return a attribute-friendly string based on input
     * @return  string The formatted string
     */
    function fcb_the_block_id($string) {
        echo preg_replace('/[^A-Za-z0-9]/', '', strtolower(str_replace(' ', '', $string)));
    }



    /**
     * Return "active" if the input is less than or equal to 0, for tabs
     */
    function fcb_is_active($i, $classes = null) {
        $return = ($i < 1) ? "active" : "";
        $return .= ($i < 1 && $classes) ? " " . $classes : "";
        echo $return;
    }


    /**
     * Do background classes for any block or element that has backgroud options
     */
    add_filter( 'fcb_set_background_classes', 'fcb_background_classes' );
    function fcb_background_classes($classes) {
      $classes[]  = (get_sub_field('background_image')) ? 'block-with-bg-image' : '';
      $classes[]  = (get_sub_field('background_color') == "theme") ? 'block-with-bg-color bg-' . get_sub_field('theme_color') : '';
      $classes[]  = (get_sub_field('background_color') == "choose") ? 'block-with-bg-color bg-choose' : '';
      return($classes);
    }

    /**
     * Set classes for a block wrapper. These can be overridden or added to with a filter like the following:
     *     add_filter( 'fcb_set_block_wrapper_classes', 'custom_block_wrapper_classes' );
     *     function custom_block_wrapper_classes($classes) {
     *         if(is_page_template('template-landing-page.php') {
     *             $classes[]   = 'on-landing-page';
     *         }
     *         return $classes;
     *     }
     *
     * @return string string of classes
     */
    function fcb_block_wrapper_classes() {
        $classes    = array();
        $classes[]  = 'block-wrap';
        $classes[]  = 'block-wrap-' . get_row_layout();
        $classes[]  = 'block-' . $GLOBALS['fcb_rows_count'];
        $classes[]  = (get_sub_field('title')) ? '' : 'block-no-title';
        $classes[]  = (get_sub_field('block_classes'));
        $classes    = apply_filters( 'fcb_set_background_classes', $classes );

        $classes = array_filter(array_map('trim', $classes));
        echo trim(implode(' ', apply_filters( 'fcb_set_block_wrapper_classes', $classes )));
    }


    /**
     * Set classes for a collapsibles. These can be overridden or added to with a filter like the following:
     *     add_filter( 'fcb_set_panel_classes', 'custom_panel_classes' );
     *     function custom_panel_classes($classes) {
     *         if(is_page_template('template-landing-page.php') {
     *             $classes[]   = 'on-landing-page';
     *         }
     *         return $classes;
     *     }
     *
     * @return string string of classes
     */
    function fcb_panel_classes() {
        $classes    = array();
        $classes[]  = 'panel-body';
        $classes[]  = (get_sub_field('type_of_media') != 'none' ) ? 'panel-with-media' : '';
        $classes    = apply_filters( 'fcb_set_background_classes', $classes );

        $classes = array_filter(array_map('trim', $classes));
        echo trim(implode(' ', apply_filters( 'fcb_set_collapsible_classes', $classes )));
    }



    /**
     * Set classes for a tabs. These can be overridden or added to with a filter like the following:
     *     add_filter( 'fcb_set_tab_classes', 'custom_tab_classes' );
     *     function custom_tab_classes($classes) {
     *         if(is_page_template('template-landing-page.php') {
     *             $classes[]   = 'on-landing-page';
     *         }
     *         return $classes;
     *     }
     *
     * @return string string of classes
     */
    function fcb_tab_classes() {
        $classes    = array();
        $classes[]  = 'tab-body';
        $classes[]  = (get_sub_field('type_of_media') != 'none' ) ? 'tab-with-media' : '';
        $classes    = apply_filters( 'fcb_set_background_classes', $classes );

        $classes = array_filter(array_map('trim', $classes));
        echo trim(implode(' ', apply_filters( 'fcb_set_tab_classes', $classes )));
    }


    /**
     * Set classes for a content. These can be overridden or added to with a filter like the following:
     *     add_filter( 'fcb_set_content_classes', 'custom_content_classes' );
     *     function custom_content_classes($classes) {
     *         if(is_page_template('template-landing-page.php') {
     *             $classes[]   = 'on-landing-page';
     *         }
     *         return $classes;
     *     }
     *
     * @return string string of classes
     */
    function fcb_content_classes() {
        $classes    = array();
        $classes[]  = 'block-the-content';
        $classes[]  = get_sub_field('content_classes');

        $classes = array_filter(array_map('trim', $classes));
        echo trim(implode(' ', apply_filters( 'fcb_set_content_classes', $classes )));
    }


    /**
     * Set classes for a media. These can be overridden or added to with a filter like the following:
     *     add_filter( 'fcb_set_media_classes', 'custom_media_classes' );
     *     function custom_media_classes($classes) {
     *         if(is_page_template('template-landing-page.php') {
     *             $classes[]   = 'on-landing-page';
     *         }
     *         return $classes;
     *     }
     *
     * @return string string of classes
     */
    function fcb_media_classes() {
        $classes    = array();
        $classes[]  = 'block-addon block-figure';
        $classes[]  = get_sub_field('media_classes');

        $classes = array_filter(array_map('trim', $classes));
        echo trim(implode(' ', apply_filters( 'fcb_set_media_classes', $classes )));
    }



    /**
     * Set classes for a block. These can be overridden or added to with a filter like the following:
     *     add_filter( 'fcb_set_block_classes', 'custom_block_classes' );
     *     function custom_block_classes($classes) {
     *         if(is_page_template('template-landing-page.php') {
     *             $classes[]   = 'on-landing-page';
     *         }
     *         return $classes;
     *     }
     *
     * @return string string of classes
     */
    function fcb_block_classes() {
        $classes    = array();
        $classes[]  = 'block';
        $classes[]  = 'block-' . get_row_layout();

        $classes = array_filter(array_map('trim', $classes));
        echo trim(implode(' ', apply_filters( 'fcb_set_block_classes', $classes )));
    }



    /**
     * Set styles for a block-wrapper. These can be overridden or added to with a filter like the following:
     *     add_filter( 'set_block_wrapper_styles', 'custom_block_wrapper_styles' );
     *     function custom_block_wrapper_styles($styles) {
     *         $styles[]   = 'border: 1px solid green;';
     *         return $styles;
     *     }
     * @return string string of styles
     */
    function fcb_block_wrapper_styles() {
        $image      = get_sub_field('background_image');

        $styles     = array();
        $styles[]   = (get_sub_field('background_color') == "choose" ) ? 'background-color: ' . get_sub_field('choose_color') . ';' : '';
        $styles[]   = ($image) ? 'background-image: url(' . $image['url'] . ');' : '';
        echo trim(implode(' ', apply_filters( 'set_block_wrapper_styles', $styles )));
    }


    function acfcfb_content_before($content_before) {
        return '<section class="block-wrap block-wrap-wp-content"><div class="block block-wp-content"><div class="block-inner"><article class="block-the-content">' . $content_before;
    }

    function acfcfb_content_after($content_after) {
        return $content_after . '</article></div></div></section>';
    }


 ?>
