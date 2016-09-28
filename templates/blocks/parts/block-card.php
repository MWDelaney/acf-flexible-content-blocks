<?php

    $image 			= get_sub_field('background_image');

    $classes    = 'card';

    $styles      = (get_sub_field('background_color')) ? 'background-color: ' . get_sub_field('background_color') . ';' : '';
    $styles     .= (get_sub_field('background_image')) ? ' background-image: url(' . $image['url'] . ');' : '';

?>
<li class="<?=$classes?>">
	<div class="card-background" style="<?=$styles?>">
		<div class="card-inner">
			<?php cfb_template('blocks/parts/block-media', get_row_layout()); ?>
			<h3><?php the_sub_field('title'); ?></h3>
			<article>
				<div class="card-content">
					<?php the_sub_field('content'); ?>
				</div>
            			<?php cfb_template('blocks/parts/block-cta', get_row_layout()); ?>
			</article>
		</div>
	</div>
</li>
