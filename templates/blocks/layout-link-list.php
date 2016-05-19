<?php
if( have_rows('linked_items') ): ?>
	<ul class="link-list">
    <?php while ( have_rows('linked_items') ) : the_row(); ?>

        <?php cfb_template('blocks/parts/block-link_list_item', get_row_layout()); ?>

	<?php endwhile; ?>
	</ul>
<?php endif; ?>
