<?php
	$layout = get_row_layout();
	$columns = count(get_sub_field('media'));
	$column = floor(12/$columns);
?>
<?php if( have_rows('media') ): ?>
<?php while ( have_rows('media') ) : the_row(); ?>
	<div class="block-strap-column block-strap-column-<?=get_row_layout()?> col-sm-<?=$column?>">
		<?php cfb_template('blocks/parts/media/media-' . get_row_layout(), $layout); ?>
	</div>
<?php endwhile; ?>
<?php endif; ?>
