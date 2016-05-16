# Advanced Custom Fields Flexible Content Blocks
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
2. Content With Media
3. Featured Content

To remove layouts from the available list, declare theme support for only the layouts you wish to use:
````
add_theme_support( 'flexible-content-blocks', array( 'content', 'content-with-media' ) );
````

## Templates
Basic templates for each layout are included. These templates are designed to be simple for styling via your theme. To override the included templates, copy the template(s) you wish to override from `templates` to your theme in a sub-directory called `fcb-templates`
