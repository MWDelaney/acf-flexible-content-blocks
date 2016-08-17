<?php
// check if the flexible content field has rows of data
if( have_rows('blocks') ): ?>

<?php

    if(!isset( $GLOBALS['fcb_rows_count'] ) )
	$GLOBALS['fcb_rows_count'] = 0;

?>

    <?php
    // loop through the rows of data
    while ( have_rows('blocks') ) : the_row(); ?>

        <?php
        	do_action('fcb_before_block');
        	cfb_template('blocks/layout-base', get_row_layout()); 
        	do_action('fcb_after_block');
        	$GLOBALS['fcb_rows_count']++;
        	
       	?>
<?php
    endwhile;

endif;

?>
