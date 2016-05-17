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

### Enable only some layouts
To remove layouts from the available list, declare theme support for only the layouts you wish to use:
````
add_theme_support( 'flexible-content-blocks', array( 'content', 'content-with-media' ) );
````

### Change post type blocks appear on
By default content blocks are enabled for Pages, to define which post types blocks should be available on, declare theme support:

````
add_theme_support( 'flexible-content-location', array( 'page', 'post' ) );
````

## Templates
Basic templates for each layout are included. These templates are designed to be simple for styling via your theme. To override the included templates, copy the template(s) you wish to override from `templates` to your theme in a sub-directory called `fcb-templates`
