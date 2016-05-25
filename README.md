# Advanced Custom Fields Flexible Content Blocks
**NOTE:** This plugin is very much a work in progress. It includes a small number of layouts now, and will include more as time allows.

A WordPress plugin that provides a collection of useful, reusable flexible content blocks for use with ACF Pro 5. Basic templates included and automatically loaded, can be optionally overridden at the theme level.

This plugin creates a Flexible Content Field below the content editor on Pages and automatically includes content entered there below `the_content()` on page templates.

Also wraps `the_content()` in some basic HTML to make it easy to differentiate from the added content blocks.

![Screenshot](/../gh-pages/screenshot.png?raw=true "Advanced Custom Fields Flexible Content Blocks")


## Requirements

1. WordPress 4.5+
2. Advanced Custom Fields Pro 5

## Usage
By default all included layouts are available:

1. Content
2. Media
3. Content With Media
4. Featured Content
5. Slider

### Enable only some layouts
To remove layouts from the available list, declare theme support for only the layouts you wish to use:
````{r, engine='php', count_lines}
add_theme_support( 'flexible-content-blocks', array( 'content', 'content-with-media' ) );
````

### Change post type blocks appear on
By default content blocks are enabled for Pages, to define which post types blocks should be available on, declare theme support:

````{r, engine='php', count_lines}
add_theme_support( 'flexible-content-location', array( array('post_type', '==', 'page'), array('post_type', '==', 'post') ) );
````

## Templates
Basic templates for each layout are included. These templates are designed to be simple for styling via your theme. To override the included templates, copy the template(s) you wish to override from `templates` to your theme in a sub-directory called `fcb-templates`

### Base template wrapper
The layout base can be overridden on a per-block-type basis. When a block is rendered, the plugin will first look in your theme, and then in the plugin directory, for `layout-base-[layout_name].php` (e.g. `layout-base-content_with_media.php`) if a specific base doesn't exist, the plugin will load the `layout-base.php` template. 

### Layout-specific template parts
Like the base template, each template part's file name can be appended with a layout name (like `content_with_media` to override the template for that layout only. For example, `[your-theme]/fcb-templates/blocks/parts/block-cta-content_with_media.php` will be loaded only for calls to action in the "Content with Media" layout. 

## Actions and filters
Several filters are available to alter the plugin's output.

### Filter: fcb_set_block_htag
Set the tag that block titles are wrapped in. This defaults to `<h2>`. First remove the existing filter and then add your own:

````{r, engine='php', count_lines}
/**
* Make the first block title an h1 and subsequent blocks default to h2
*/
remove_filter( 'fcb_set_block_htag', 'block_htag_level', 10 );
add_filter( 'fcb_set_block_htag', 'custom_htag_level', 10, 2 );
function custom_htag_level($title, $htag) {
    if($GLOBALS['fcb_rows_count'] == 0) {
        $htag = 'h1';
    } else {
        $htag = 'h2';
    }
    return '<' . $htag . '>' . $title . '</' . $htag . '>';
}
````

### Filter: fcb_set_block_classes
Set the classes applied to content blocks. This filter runs each time a block is rendered, so classes can be conditionally applied per-block. 

````{r, engine='php', count_lines}
/**
* Give the first block an additional class of 'block-first'
*/
add_filter( 'fcb_set_block_classes', 'custom_block_classes' );
function custom_block_classes($classes) {
    if($GLOBALS['fcb_rows_count'] == 0) {
        $classes[]   = 'block-first';
    }
    return $classes;
}
````

### Filter: fcb_set_block_styles
Set the styles applied to content blocks. This filter runs each time a block is rendered, so styles can be conditionally applied per-block.

This filter isn't recommended for use --it's used by the plugin to apply background styles which are set in the block. Semantic styles are always preferrable to style attributes applied per block.

````{r, engine='php', count_lines}
/**
* Give the first block an additional class of 'block-first'
*/
add_filter( 'fcb_set_block_styles', 'custom_block_styles' );
function custom_block_styles($styles) {
    if($GLOBALS['fcb_rows_count'] == 0) {
        $styles[]   = 'border: 1px solid green;';
    }
return $styles;
}
````
