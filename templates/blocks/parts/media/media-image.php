<?php
$image = get_sub_field('image');

$caption = $image['caption'];
$title = $image['title'];
$alt = $image['alt'];

if( !empty($image) ): ?>

	<img title="<?=$title?>" alt="<?=$alt?>" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
	
<?php endif; ?>

<?php if( !empty($caption) ): ?>
<figcaption><?=$caption?></figcaption>
<?php endif; ?>
