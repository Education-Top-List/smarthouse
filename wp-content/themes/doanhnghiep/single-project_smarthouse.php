<?php 
get_header(); 
?>	
<div id="wrap">
	<div class="g_content">
		<div id="breadcrumb" class="breadcrumb">
			<div class="container">
				<ul>
					<?php  echo the_breadcrumb(); ?>
				</ul>
			</div>
				
			</div> 
		<div class="container">
			
			<div class="ct_single_post">
				<?php 
				wpb_set_post_views(get_the_ID());
				if(have_posts()) :
					while(have_posts()) : the_post(); ?>
							<article class="content_single_post">
								<div class="single_post_info">
									<h2><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<p><?php the_time('d/m/Y');?><span>  <?php the_time('g:i a') ?></span> 

										| Luợt xem : <?php echo wpb_get_post_views(get_the_ID()); ?>
									</p>
								</div>
								<div class="text_content">
									<?php  the_content(); ?>
								</div>
							</article>
							<div class="related_post">
								<h2 class="title_related">Tin cùng chuyên mục</h2>
								<?php
								global $post;
								$arg = array(
									'posts_per_page' => 6,
									'orderby' => 'date',
									'order' => 'ASC',
									'post_status' => 'publish',
									'post__not_in' => array($post->ID),
									'post_type' => 'project_smarthouse'
								);
								$related = new WP_Query($arg);
								?> 
								<ul class="row">
									<?php 
									while($related->have_posts()) : $related->the_post(); ?>
										<li class="col-sm-4">
											<div class="list_post_item pw">
												<div class="padding_figure">
													<div class="wrap_figure">
														<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large') ?>
														<figure style="background: url('<?php echo $image[0]; ?>');"><a href="<?php the_permalink(); ?>"></a></figure>
													</div>
												</div>
												<h2 class="post_title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h2>
											</div>
										</li>
									<?php endwhile; 
									wp_reset_postdata();
									?>
								</ul>
							</div>
					<?php endwhile;
				else:
				endif;
				wp_reset_postdata();
				?>
			</div>

		</div>

	</div>
</div>
<?php get_footer(); ?>
