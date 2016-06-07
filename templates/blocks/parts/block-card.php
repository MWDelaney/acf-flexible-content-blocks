<?php

    $content_source = get_sub_field('content_source');
    $content 		= get_sub_field('content');
    $image 			= get_sub_field('background_image');
	$link_text 		= get_sub_field('link_text');


    $classes    = 'card';

    $styles      = (get_sub_field('background_color')) ? 'background-color: ' . get_sub_field('background_color') . ';' : '';
    $styles     .= (get_sub_field('background_image')) ? ' background-image: url(' . $image['url'] . ');' : '';

?>
<li class="<?=$classes?>">
	<div class="card-background" style="<?=$styles?>">
		<div class="card-inner">
            <?php cfb_template('blocks/parts/block-media', get_row_layout()); ?>
			<h3><?php the_sub_field('title'); ?></h3>
			<?php
			$post_object = get_sub_field('link');
			if( $post_object ): 
				$post = $post_object;
				setup_postdata( $post );
			endif;

			?>
			<article>
				<div class="card-content">
					<?php echo ($content_source == 'excerpt') ? get_the_excerpt() : $content; ?>
				</div>
				<aside>
					<a class="card-link btn" href="<?php the_permalink(); ?>">
						<?=$link_text?>
					</a>
				</aside>

			    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			</article>
		</div>
	</div>

</li>
