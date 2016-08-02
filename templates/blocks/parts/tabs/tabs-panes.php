            <div class="block-addon tab-content">
            <?php $i = 0; while ( have_rows('tabs') ) : the_row(); ?>

                <div role="tabpanel" class="tab-pane fade <?php fcb_is_active($i, 'in'); ?> tab-<?php fcb_the_block_id(get_sub_field('navigation_title')); ?>" id="tab-<?php fcb_the_block_id(get_sub_field('title')); ?>"  style="<?php fcb_block_wrapper_styles(); ?>">
                    <?php cfb_template('blocks/parts/tabs/tabs-content', get_row_layout()); ?>
                </div>

            <?php $i++; endwhile; ?>
            </div>
