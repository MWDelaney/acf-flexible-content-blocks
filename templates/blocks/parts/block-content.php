<?php if(get_sub_field('content')): ?>
	<article class="block-the-content">
    	<?php the_sub_field('content'); ?>
    	<aside><?php cfb_template('blocks/parts/block-cta', get_row_layout()); ?></aside>
	</article>
<?php endif; ?>
