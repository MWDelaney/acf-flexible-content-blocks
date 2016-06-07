<?php

    $rows = get_sub_field('slides');
    $count = count($rows);
    $title_attr = preg_replace('/[^A-Za-z0-9]/', '', strtolower(str_replace(' ', '', get_sub_field('title'))));  

?>

<?php if( have_rows('slides') ): ?>

    <div id="carousel-<?=$title_attr?>" class="block-addon carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php $i = 0; while($i < $count): ?>
                <?php $active = ($i < 1) ? "active" : ""; ?>
                <li data-target="#caroursel-<?=$title_attr?>" data-slide-to="<?=$i?>" class="<?=$active?>"></li>
                <?php $i++; ?>
            <?php endwhile; ?>
        </ol>
        <div class="carousel-inner" role="listbox">

        <?php $i = 0; while ( have_rows('slides') ) : the_row(); ?>

            <?php $active = ($i < 1) ? "active" : ""; ?>
            <div class="item <?=$active?>" style="<?php fcb_block_wrapper_styles(); ?>">

                <div class="carousel-content">
                    <div class="carousel-content-inner">
                        <?php cfb_template('blocks/parts/block-media', get_row_layout()); ?>
                        <?php cfb_template('blocks/parts/block-content', get_row_layout()); ?>
                        <div class="carousel-caption">
                            <?php the_sub_field('title'); ?>
                        </div>
                    </div>
                </div>


            </div>
            <?php $i++; ?>
        <?php endwhile; ?>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-<?=$title_attr?>" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-<?=$title_attr?>" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>

<?php endif; ?>