<?php 
get_header(); 
?>	
<div id="wrap">
	<div class="g_content">
		<div class="breadcrumb">
					<?php 
	  				// Get the current category ID, e.g. if we're on a category archive page
		$postcat = get_the_category( $post->ID );
		//var_dump($postcat);
		if ( ! empty( $postcat ) ) {
			//echo esc_html( $postcat[0]->cat_ID );  
    // Get the image ID for the category
			$category_image_id = $postcat[0]->term_id;
			$image_id = get_term_meta ( $category_image_id, 'category-image-id', true );
			$src_image = wp_get_attachment_image_src( $image_id , 'full');
		}	
		?>
			<div class="container">
				<?php echo the_breadcrumb(); ?>
			</div>
		</div>
		<div class="container">

			<div class="archive_content">
				<?php 
				$arg = array(
					'post_type'=> 'post',
					'orderby'=> 'date',
					'order' => 'ASC',
					'post_status' => 'publish'
				);
				$query = new WP_Query($arg);
				if($query->have_posts()) : ?>
					<ul class="row">
						<?php while($query->have_posts()) : $query->the_post(); 
							get_template_part('includes/frontend/loop/loop_post'); 
						endwhile; ?>
					</ul>
				<?php endif; ?>
				<?php get_template_part('inc/frontend/pagination/pagination'); ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
