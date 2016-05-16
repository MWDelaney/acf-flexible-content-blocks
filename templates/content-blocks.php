<?php
// check if the flexible content field has rows of data
if( have_rows('blocks') ): ?>

    <?php
    // loop through the rows of data
    while ( have_rows('blocks') ) : the_row(); ?>

        <?php cfb_template('blocks/layout', 'base'); ?>
<?php
    endwhile;

endif;

?>
