<?php 

  $accordion_title = get_sub_field('title'); 

?>
<div class="block-addon panel-group" id="accordion-<?php fcb_the_block_id($accordion_title); ?>" role="tablist" aria-multiselectable="true">
  <?php $i = 0; while ( have_rows('collapsibles') ) : the_row(); ?>

  <div class="panel panel-<?php the_sub_field('panel_type'); ?>">
    <div class="panel-heading" role="tab" id="heading<?=$i?>">
      <h3 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion-<?php fcb_the_block_id($accordion_title); ?>" href="#collapse<?=$i?>" aria-expanded="true" aria-controls="collapse<?=$i?>">
          <?php the_sub_field('navigation_title'); ?>
        </a>
      </h3>
    </div>
    <div id="collapse<?=$i?>" class="panel-collapse collapse <?php fcb_is_active($i, 'in'); ?>" role="tabpanel" aria-labelledby="heading<?=$i?>" style="<?php fcb_block_wrapper_styles(); ?>">
      <div class="<?php fcb_panel_classes(); ?>">
        <div class="panel-inner">
          <?php cfb_template('blocks/parts/collapsibles/collapsibles-content', get_row_layout()); ?>
        </div>
      </div>
    </div>
  </div>

  <?php $i++; endwhile; ?>
</div>
