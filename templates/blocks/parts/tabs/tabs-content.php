    <div class="<?php fcb_tab_classes(); ?>">
		<article class="tab-content">
			<?php cfb_template('blocks/parts/tabs/tab-title', get_row_layout()); ?>
			<?php cfb_template('blocks/parts/block-content', get_row_layout()); ?>
		</article>
		<?php cfb_template('blocks/parts/block-media', get_row_layout()); ?>
    </div>