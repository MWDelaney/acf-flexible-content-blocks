<?php 

$image = get_sub_field('image');

if( !empty($image) ): ?>

	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

<?php endif; ?>