<?php if(get_sub_field('content')): ?>
	<article class="block-the-content">
    	<?php the_sub_field('content'); ?>
    	<?php cfb_template('blocks/parts/block-cta', get_row_layout()); ?>
	</article>
<?php endif; ?>
