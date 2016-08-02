            <div class="block-addon tabs-wrapper">
                <ul role="tablist" class="nav nav-tabs">
                <?php $i = 0; while ( have_rows('tabs') ) : the_row(); ?>
                    <li role="presentation" class="tab-<?php fcb_the_block_id(get_sub_field('navigation_title')); ?> <?php fcb_is_active($i); ?>">
                        <a href="#tab-<?php fcb_the_block_id(get_sub_field('title')); ?>" aria-controls="<?php get_sub_field('title'); ?>" role="tab" data-toggle="tab">
                            <span>
                                <?php the_sub_field('navigation_title') ?>
                            </span>
                        </a>
                    </li>

                <?php $i++; endwhile; ?>
                </ul>
            </div>
