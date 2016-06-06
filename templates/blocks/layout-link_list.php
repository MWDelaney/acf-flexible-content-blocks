<?php cfb_template('blocks/parts/block-content', get_row_layout()); ?>

<?php if( have_rows('linked_items') ): ?>
	<div class="block-addon link-list-wrap">
		<ul class="link-list">
		    <?php while ( have_rows('linked_items') ) : the_row(); ?>

		        <?php cfb_template('blocks/parts/block-link_list_item', get_row_layout()); ?>

			<?php endwhile; ?>
		</ul>
	</div>
<?php endif; ?>
