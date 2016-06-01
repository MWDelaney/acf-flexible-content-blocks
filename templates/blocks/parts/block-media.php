<?php if(get_sub_field('type_of_media') != 'none'): ?>

	<figure class="block-figure"><?php cfb_template('blocks/parts/media/media-' . get_sub_field('type_of_media'), get_row_layout()); ?></figure>

<?php endif; ?>