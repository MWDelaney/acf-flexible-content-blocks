<?php if( have_rows('columns') ): ?>

    <?php $i = 0; while ( have_rows('columns') ) : the_row(); ?>

		<div class="col-sm-<?php the_sub_field('column_width'); ?>">
			<?php cfb_template('blocks/parts/block-media', get_row_layout()); ?>
		</div>

	<?php endwhile; ?>

<?php endif; ?>