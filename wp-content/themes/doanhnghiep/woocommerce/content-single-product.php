<?php 
global $post;
global $product;

?>
<?php $terms_post = get_the_terms( $post->cat_ID , 'product_cat' );
foreach ($terms_post as $term_cat) { 
	$term_cat_id = $term_cat->term_id; 
} ?>
<div class="tg_single_product <?php if($term_cat_id == 16 || $term_cat_id == 41  ){ echo 'single_lift_pd';} ?>">
	<div id="breadcrumb" class="breadcrumb">
		<div class="container">
			<ul>
				<li><a href="<?php echo home_url(); ?>"><?php if(get_locale()=='vi'){ ?>Trang chủ<?php }else{ ?> Home<?php }?></a></li>
				<li><?php if(get_locale()=='vi'){ ?>Sản phẩm<?php }else{ ?> Product<?php }?></li>
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
		<div class="btn_action_singlepd">
			<div class="pd_specification">
				<p><?php if(get_locale()=='vi'){?>Thông số kĩ thuật<?php }else{ ?> Product Specifications <?php }?></p>
			</div>
			<?php 
			$field_vitri = get_post_meta( $post->ID, '_tg_wp_editor', false );
			?>
			<div class="down_docs">
				<div class="link_hide_catalog" style="display: none;">
					<?php echo $field_vitri[0] ?>
				</div>
				<a href="#" class="btn_download_catalog" target="_blank"><?php if(get_locale()=='vi'){?>Tải Catalog<?php }else{ ?> Catalog Download <?php }?></a>
			</div>
			<script type="text/javascript">
				$(document).ready(function(){
					var x = $('.link_hide_catalog a').attr('href');
					var x_cut = x.split('"').pop().split('"')[0];
					$('.btn_download_catalog').attr('href',x_cut);
				});
			</script>
		</div>
	</div>
</div>
<?php 

if($term_cat_id == 16 || $term_cat_id == 41  ){
	?>
	<div class="benefit_single">
		<?php 
		if(get_locale()=='vi'){
		    $post = get_post(273); // specific post
			$the_content = apply_filters('the_content', $post->post_content);
			if ( !empty($the_content) ) {
				echo $the_content;
			}
		}
		else{
			$my_id = 291;
			$post_id_benefit = get_post($my_id);
			$content = $post_id_benefit->post_content;
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]>', $content);
			echo $content;
		}
		?>
	</div>
<?php }?>
<div class="tg_tabs_single_pd">
	<div class="container">
		<?php $tabs = apply_filters( 'woocommerce_product_tabs', array() );
		// print_r($tabs);
		?><?php
		if ( ! empty( $tabs ) ) : ?>
			<div class="woocommerce-tabs wc-tabs-wrapper">
				<div class="tg_wrap_tab">
					<ul class="tabs wc-tabs" role="tablist">
						<?php foreach ( $tabs as $key => $tab ) : ?>
							<li class="<?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
								<a href="#tab-<?php echo esc_attr( $key ); ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
							</li>
						<?php endforeach; ?>

					</ul>
				</div>
				<?php foreach ( $tabs as $key => $tab ) : ?>
					<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
						<?php if ( isset( $tab['callback'] ) ) { call_user_func( $tab['callback'], $key, $tab ); } ?>
					</div>
				<?php endforeach; ?>
			</div>

		<?php endif; ?>
	</div>
</div>
</div>
