<?php 
global $post;
global $product;
?>
<div class="tg_single_product">
	<div id="breadcrumb" class="breadcrumb">
		<ul>
			<li><a href="<?php echo home_url(); ?>">Trang chủ</a></li>
			<li>Sản phẩm</li>
	<!-- 		<li><?php 
			    if(is_product_category()){
    // The WP_Term object for the current product category
          $term = get_queried_object();

    // Get the current term name for the product category page
          $term_name = $term->name;

    // Test output
          echo $term->name;
        }
			?></li> -->
			<li><?php the_title(); ?></li>
		</ul>
		</div>
		<div class="container">
			<div class="col-sm-6 tg_gallery_pd">
				<div class="tg_img_product">
					<?php 
					$id = $product->get_id();
					$image = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'single-post-thumbnail' );?>
					<img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
				</div>
				<div class="woocommerce-product-gallery">
					<ul>
						<?php
						global $product;
						$attachment_ids = $product->get_gallery_image_ids();
						foreach( $attachment_ids as $attachment_id ) {
        			//echo $image_link = wp_get_attachment_url( $attachment_id );
							?>
							<li><figure style="background:url(<?php echo wp_get_attachment_url( $attachment_id ); ?>)"><img src="<?php echo wp_get_attachment_url( $attachment_id ); ?>"></figure></li>
							<?php
						}
						?>
					</ul>
				</div>
			</div>
			<div class="col-sm-6 tg_info_single_pd">
				<h1><?php the_title(); ?></h1>
				<div class="tg_short_description">
					<?php $short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );
					echo $short_description;
					?>
				</div>

			</div>
		</div>
	</div>
