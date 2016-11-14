<?php
	$layout = get_row_layout();
?>
<?php if( have_rows('media') ): ?>
<?php while ( have_rows('media') ) : the_row(); ?>
	<figure class="block-addon block-figure block-figure-<?=get_row_layout()?>">
		<?php cfb_template('blocks/parts/media/media-' . get_row_layout(), $layout); ?>
	</figure>
<?php endwhile; ?>
<?php endif; ?>
