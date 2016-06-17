<?php 

	$image_ids = get_sub_field('gallery', false, false);

	$shortcode = '[gallery ids="' . implode(',', $image_ids) . '"]';

	echo do_shortcode( $shortcode );

?>