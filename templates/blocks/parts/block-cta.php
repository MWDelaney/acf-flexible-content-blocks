<?php if( have_rows('calls_to_action') ): ?>
<aside class="calls-to-action">
<?php while ( have_rows('calls_to_action') ) : the_row(); ?>
    <?php

        // Set the button classes
        $classes = 'btn';
        $classes .= ' btn-' . get_sub_field('call_to_action_type');

        // Set the link URL
        $link = ( get_sub_field('call_to_action_external') ) ? get_sub_field('call_to_action_external') : get_sub_field('call_to_action_link');

        // Set the link text
        $text = get_sub_field('call_to_action_text');

    ?>

    <a class="<?=$classes?>" href="<?=$link?>"><?=$text?></a>
<?php endwhile;?>
</aside>
<?php endif; ?>
