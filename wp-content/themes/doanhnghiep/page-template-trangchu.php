<?php 
/*
Template Name: page-template-trangchu
*/
get_header(); 
?>	
<div class="page-wrapper">
	<div id="content">
		<div class="g_content">
			<div class="wrap_video_home">
				<?php 
			if(have_posts()):
				while(have_posts()) : the_post();
					the_content();
				endwhile;
			endif;
			?>
			</div>
			
			<div class="cat_product_home">
				<h2 class="title_home"><?php if(get_locale()=='vi') { ?>Sản phẩm<?php }else{ ?> Products <?php }?></h2>
				<?php 
				$cat_args = array(
					'orderby'    => 'menu_order',
					'hide_empty' => false,
				);

				$product_categories = get_terms( 'product_cat', $cat_args );

				if( !empty($product_categories) ){?>
					<ul class="row">
						<?php foreach ($product_categories as  $category) { ?>
							<?php 
							$category_id = $category->term_id;
							$hide_cat_sub = get_term_meta($category_id, 'wh_meta_desc', true); 
							if($hide_cat_sub == false){
							?>
							<li class="col-sm-6">
								<div class="banner_category">
						  					<?php 
						  					
						  					$thumbnail_id = get_term_meta( $category_id, 'thumbnail_id', true );
						  					$image = wp_get_attachment_url( $thumbnail_id );
						  					?>
						  					<figure class="thumbnail" style="background:url(<?php echo $image; ?>);" >
						  						<a href="<?php echo get_category_link($category_id) ?>"></a>
						  					</figure>
						  					<!-- $cat->count -->
						  		</div>
						  		<div class="tg_info_cat">
						  			<div class="textwidget">
						  				<a href="<?php echo get_term_link($category);?>"><?php echo $category->name; ?></a>
						  			</div>
						  		</div>
							</li>
							<?php } ?>
						<?php } ?>
					</ul>
				<?php }?>
				</div>
				<div class="certificate">
					<div class="container">
						<h2 class="title_home"><?php if(get_locale()=='vi') { ?>Chứng nhận<?php }else{ ?> Certificates <?php }?></h2>
						<ul>
							<?php
							$args = array(  
								'post_type' => 'certificate',
								'post_status' => 'publish',
								'posts_per_page' => 20, 
								'orderby' => 'date'
							);

							$loop_slide = new WP_Query( $args ); 

							while ( $loop_slide->have_posts() ) : $loop_slide->the_post(); 
    	//echo the_title();
								?> 
								<li>
									<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full' ); ?>
									<figure class="thumbnail"  style="background:url('<?php echo $image[0]; ?>')"> 
										<a href="<?php echo $image[0]; ?>" data-fancybox="images" class="fancybox"><?php the_post_thumbnail(); ?></a>
									</figure> 
								</li> 
								<?php
							endwhile;
							wp_reset_postdata();
							?>
						</ul>
					</div>
				</div>	
				<div class="partner_home">
					<div class="container">
						<h2 class="title_home"><?php if(get_locale()=='vi') { ?>Đối tác của chúng tổi<?php }else{ ?> Partners <?php }?></h2>
						<ul>
							<?php
							$args = array(  
								'post_type' => 'partner',
								'post_status' => 'publish',
								'posts_per_page' => 20, 
								'orderby' => 'date'
							);

							$loop_slide = new WP_Query( $args ); 

							while ( $loop_slide->have_posts() ) : $loop_slide->the_post(); 
								?> 
								<li>
									<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full' ); ?>
									<figure class="thumbnail"> 
										<a href="<?php echo get_the_excerpt(); ?>" target="_blank"><?php the_post_thumbnail(); ?></a>
									</figure> 
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
