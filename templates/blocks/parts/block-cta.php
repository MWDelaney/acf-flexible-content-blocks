<?php if(get_sub_field('display_call_to_action')): ?>
    <aside>
    <?php

        // Set the button classes
        $classes = 'btn';
        $classes .= ' btn-' . get_sub_field('call_to_action_type');

        // Set the link URL
        $link = get_sub_field('call_to_action_link');

        // Set the link text
        $text = get_sub_field('call_to_action_text');

    ?>

    <a class="<?=$classes?>" href="<?=$link?>"><?=$text?></a>
    </aside>
<?php endif; ?>