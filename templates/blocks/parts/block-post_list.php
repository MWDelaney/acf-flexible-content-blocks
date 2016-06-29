
<?php 

$args = array(
    'posts_per_page'        => get_sub_field('posts_per_page'),
    'category'              => implode(",", get_sub_field('category'))
    );
$posts = get_posts($args);

if( $posts ): ?>
<div class="block-addon block-post-list">
    <ul class="post-list">
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
        <li>
            <div class="post-list-post">
                <div class="post-list-post-inner">
                    <?php if ( has_post_thumbnail() && get_sub_field('show_featured_image') ): ?>
                        <figure>
                            <?php the_post_thumbnail('thumbnail'); ?>
                        </figure>
                    <?php endif; ?>
                    <header>
                        <h3>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <?php if ( get_sub_field('show_date') ): ?>
                            <time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time>
                        <?php endif; ?>
                        <?php if ( get_sub_field('show_author') ): ?>
                            <p class="byline author vcard"><?= __('By', 'sage'); ?> <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?= get_the_author(); ?></a></p>
                        <?php endif; ?>
                    </header>
                    <article><?php the_excerpt(); ?></article>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
    </ul>
</div>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
