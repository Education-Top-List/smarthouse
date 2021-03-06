<?php 
get_header();
global $post;
global $product;
?>
<div class="page-wrapper">
	<div class="g_content">
		<div id="breadcrumb" class="breadcrumb">
      <div class="container">
        <ul>
          <li><a href="<?php echo home_url(); ?>">Trang chủ</a></li>
          <li>Sản phẩm</li>
          <li><?php 
          if(is_product_category()){
    // The WP_Term object for the current product category
            $term = get_queried_object();

    // Get the current term name for the product category page
            $term_name = $term->name;

    // Test output
            echo $term->name;
          }
          ?></li>
        </ul>
      </div>
    </div>
    <div class="product_page_wrap">
     <div class="container">
      <div class="row">
       <?php 
       if ( is_search() ) {
    //put your search results markup here (you can copy some code from archive-product.php file and also from content-product.php to create a standard markup
        ?>
        <div class="col-sm-12 list_pd_archive_woo">
          <?php 
          if ( woocommerce_product_loop() ) {

                            /**
                             * Hook: woocommerce_before_shop_loop.
                             *
                             * @hooked woocommerce_output_all_notices - 10
                             * @hooked woocommerce_result_count - 20
                             * @hooked woocommerce_catalog_ordering - 30
                             */
                            do_action( 'woocommerce_before_shop_loop' );

                            woocommerce_product_loop_start();

                            if ( wc_get_loop_prop( 'total' ) ) {
                              while ( have_posts() ) {
                                the_post();

                                /**
                                 * Hook: woocommerce_shop_loop.
                                 */
                                do_action( 'woocommerce_shop_loop' );

                                wc_get_template_part( 'content', 'product' );
                              }
                            }

                            woocommerce_product_loop_end();

                            /**
                             * Hook: woocommerce_after_shop_loop.
                             *
                             * @hooked woocommerce_pagination - 10
                             */
                            do_action( 'woocommerce_after_shop_loop' );
                          } else {
                            /**
                             * Hook: woocommerce_no_products_found.
                             *
                             * @hooked wc_no_products_found - 10
                             */
                            do_action( 'woocommerce_no_products_found' );
                          }
                          ?>
                        </div>
                        <?php
                      } else {
                        ?>
                        <div class="col-sm-12 list_pd_archive_woo">
                          <?php
                     if ( is_shop() || is_product_category() || is_product_tag() ) { // Only run on shop archive pages, not single products or other pages

                      // Products per page

                      $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 9,

                        'paged' => get_query_var( 'paged' ),
                        'tax_query' => array(
                          array(
                            'taxonomy' => get_query_var( 'taxonomy' ),
                            'field'    => 'slug',
                            'terms'    => get_query_var( 'term' ),
                          ),
                        ),
                      );


                      // Set the query
                      $products = new WP_Query( $args );
                      
                      // Standard loop
                      if ( $products->have_posts() ) : ?>
                        <ul class="row">
                          <?php while ( $products->have_posts() ) : $products->the_post();?>
                            <?php global $product; ?>
                            <li class="col-sm-4">
                              <div class="product_inner">
                                <?php 
                                $image = wp_get_attachment_image_src(get_post_thumbnail_id($products->post->ID), $size = "large");
                                $featured = get_post_meta( $post->ID );
                                $thuonghieu_sp = get_post_meta($post->ID,'_thuonghieu_sp',true);
                                ?>
                                <?php if($thuonghieu_sp || get_post_meta($post->ID, 'meta-checkbox', true) == 'yes'){ ?>
                                <div class="trademark_pd">
                                  <?php if($thuonghieu_sp){ ?>
                                  <div class="name_trademark">
                                      <span></span>
                                      <p><?php echo $thuonghieu_sp; ?></p>
                                  </div>
                                  <?php }?>
                                 <?php if(get_post_meta($post->ID, 'meta-checkbox', true) == 'yes') { ?>
                                  <div class="made_in_italy">
                                    <img src="<?php echo BASE_URL; ?>/images/made_italy.jpg">
                                  </div>
                                <?php  } ?>
                              </div>
                            <?php }?>
                              <figure style="background:url('<?php echo $image[0]; ?>');"><a href="<?php echo the_permalink(); ?>"></a></figure>
                              <h3><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h3>
                              <div class="price">
                                <span>
                                  <?php 

                                  echo $product->get_price_html(); ?>
                                </span>      
                              </div>
                            </div>
                          </li>
                        <?php endwhile; ?>
                      </ul>
                      <?php wp_reset_postdata();
                    endif;
                     } else { // If not on archive page (cart, checkout, etc), do normal operations

                      echo 'No data';

                    }
                    ?>
                    <div class="tg_pagination">
                      <?php
                      echo paginate_links( array(
                        'prev_text' => '<span><i class="fa fa-angle-left" aria-hidden="true"></i></span>',
                        'next_text' => '<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>'
                      )); 
                      ?>
                    </div>
                  </div>
                  <?php
                }
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <?php get_footer(); ?>