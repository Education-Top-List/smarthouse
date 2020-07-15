	<div class="scrolltop">
		<i class="fa fa-angle-up" aria-hidden="true"></i>	
	</div>			
	<footer class="footer">
		<div class="container">
			<?php
			$args = array(
				'post_type' => 'page',
          'post__in' => array(23) //list of page_ids
      );
			$page_query = new WP_Query( $args );
			if( $page_query->have_posts() ) :
        //print any general title or any header here//
				while( $page_query->have_posts() ) : $page_query->the_post();
					echo '<div class="page-on-page" id="page_id-' . $post->ID . '">';
					echo the_content();
					echo '</div>';
				endwhile;
			else:
        //optional text here is no pages found//
			endif;
			wp_reset_postdata();
			?>
		</div>
	</footer>
	<div class="popup popup_order" data-backdrop="static" data-keyboard="false" >
		<div class="content_popup">
			<h2>Đặt mua sản phẩm</h2>
			<div class="col-sm-6">
				<?php echo do_shortcode('[contact-form-7 id="478" title="Form liên hệ popup"]'); ?>
			</div>
			<div class="col-sm-6">
				<figure class="img_product_pop"><img src="<?php echo BASE_URL; ?>/images/anh_dha_canxi.png"></figure>
			</div>
			<div class="close_popup" data-dismiss="modal">
				<i class="fa fa-times" aria-hidden="true"></i>
			</div>
		</div>
	</div>
	<?php wp_footer(); ?>
	<!-- END  MESSENGER -->
	<script src="<?php echo BASE_URL; ?>/js/wow.min.js"></script>
	<script src="<?php echo BASE_URL; ?>/js/slick.js"></script>
	<script src="<?php echo BASE_URL; ?>/js/bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL; ?>/js/custom.js"></script>
</body>
</html>
