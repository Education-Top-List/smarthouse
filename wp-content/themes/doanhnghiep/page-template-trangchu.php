<?php 
/*
Template Name: page-template-trangchu
*/
get_header(); 
?>	
<div class="page-wrapper">
	<div id="content">
		<div class="g_content">
			<?php 
			if(have_posts()):
				while(have_posts()) : the_post();
					the_content();
				endwhile;
			endif;
			?>
			<div class="cat_product_home">
				<?php 
				$cat_args = array(
					'orderby'    => 'name',
					'hide_empty' => false,
				);

				$product_categories = get_terms( 'product_cat', $cat_args );

				if( !empty($product_categories) ){?>
					<ul>
						<?php foreach ($product_categories as  $category) { ?>
							<li>
								<div class="banner_category pw">
						  					<?php 
						  					$category_id = $category->term_id;
						  					$thumbnail_id = get_term_meta( $category_id, 'thumbnail_id', true );
						  					$image = wp_get_attachment_url( $thumbnail_id );
						  					?>
						  					<figure class="thumbnail" style="background:url(<?php echo $image; ?>);" >
						  						<a href="<?php echo get_category_link($category_id) ?>"></a>
						  					</figure>
						  					<!-- $cat->count -->
						  		</div>
						  		<div class="tg_info_cat">
						  			<a href="<?php echo get_term_link($category);?>"><?php echo $category->name; ?></a>
						  		</div>
							</li>
						<?php } ?>
					</ul>
				<?php }?>
				</div>
				<div class="certificate">
					<div class="container">
						<ul>
							<?php
							$args = array(  
								'post_type' => 'certificate',
								'post_status' => 'publish',
								'posts_per_page' => 20, 
								'orderby' => 'title', 
								'order' => 'ASC'
							);

							$loop_slide = new WP_Query( $args ); 

							while ( $loop_slide->have_posts() ) : $loop_slide->the_post(); 
    	//echo the_title();
								?> 
								<li>
									<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full' ); ?>
									<figure class="thumbnail" > <?php  the_post_thumbnail(); ?></figure> 
								</li> 
								<?php
							endwhile;
							wp_reset_postdata();
							?>
						</ul>
					</div>
				</div>	
			</div>
		</div>
	</div>
	<?php get_footer(); ?>
