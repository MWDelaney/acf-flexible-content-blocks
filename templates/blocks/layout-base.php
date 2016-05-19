<?php

    $classes    = 'block-' . get_row_layout();

    $image = get_sub_field('background_image');

    $styles      = (get_sub_field('background_color')) ? 'background-color: ' . get_sub_field('background_color') . ';' : '';
    $styles     .= (get_sub_field('background_image')) ? ' background-image: url(' . $image['url'] . ');' : '';

?>
<section class="block-wrap <?=$classes?>" style="<?=$styles?>">
    <div class="block">
        <div class="block-inner">

        <?php cfb_template('blocks/parts/block-title', get_row_layout()); ?>
        <?php cfb_template('blocks/layout', get_row_layout()); ?>

        </div> <!-- /block-inner -->
    </div> <!-- /block -->
</section> <!-- /block-wrap -->
