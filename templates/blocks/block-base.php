<?php
    $classes = 'block-' . get_row_layout();
?>
<section class="block-wrap <?=$classes?>">
    <div class="block">
        
        <?php cfb_template('blocks/block', 'title'); ?>
        <?php cfb_template('blocks/block', get_row_layout()); ?>

    </div> <!-- /block -->
</section> <!-- /block-wrap -->