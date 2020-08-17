<li class="col-sm-4">
	<div class="list_post_item pw">
		<div class="padding_figure">
			<div class="wrap_figure">
				<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium') ?>
				<figure style="background: url('<?php echo $image[0]; ?>');"><a href="<?php the_permalink(); ?>"></a></figure>
			</div>
		</div>
		<h2 class="post_title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</div>
</li>
