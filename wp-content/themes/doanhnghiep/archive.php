<?php 
get_header(); 
if(have_posts()) :
	?>	
	<div id="wrap">
		<div class="g_content">
			<div class="container">
				<div class="breadcrumb">
					<?php echo the_breadcrumb(); ?>
				</div>
				<div class="row">
					<div class="col-sm-12 content_left">
						<?php 
						if(is_category()){
							?> <h3 class="title_archives">Chuyên mục : <?php  single_cat_title(); ?> </h3><?php
						}
						else if(is_tag()){
							echo '<h3 class="title_archives"><strong>' . single_tag_title() . '/<strong></h3>';
						}
						else if(is_author()){
							the_post();
							echo '<h3 class="title_archives">Author Archives : <strong> ' . get_the_author() . '</strong></h3>';
							rewind_posts();
						}
						else if(is_day()){
							echo '<h3 class="title_archives">Day Archives : <strong>' . get_the_date() . '</strong></h3>';
						}
						else if(is_month()){
							echo '<h3 class="title_archives">Monthly Archives : <strong>' . get_the_date('F Y') . '</strong></h3>';
						}
						else if(is_year()){
							echo '<h3 class="title_archives">Yearly Archives : <strong>' . get_the_date('Y') . '</strong></h3>';
						}
						else{
							echo 'archive';
						}
						?>
						<?php 
						$args = array(
							'parent' => get_queried_object_id(),
						); 
						$terms = get_terms( 'category', $args );
						$term_ids = wp_list_pluck( $terms, 'term_id' );
						$categories = get_categories( $args );
						?>
						<div class="list_post_categories">
							<?php 
							while(have_posts()): the_post();
								get_template_part('includes/frontend/loop/loop_post');
							endwhile;
							get_template_part('includes/frontend/pagination/pagination'); 
							?>
						</div>
						<?php
					else:
					endif;
					wp_reset_postdata();
					?>
				</div>
				
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
