<li class="col-sm-4">
	<div class="list_post_item pw">
		<div class="padding_figure">
			<div class="wrap_figure">
				<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail') ?>
				<figure style="background: url('<?php echo $image[0]; ?>');"><a href="<?php the_permalink(); ?>"></a></figure>
			</div>
		</div>
		<h2 class="post_title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php 
		$categories = get_the_category(); 
		$cat_ID = $categories[0]->cat_ID;
		?>
		<div class="excerpt">
			<?php echo excerpt(30); ?>
		</div>
		<div class="date_post">
			<p><?php the_time('d/m/Y'); ?> </p>
		</div>
	</div>
</li>

