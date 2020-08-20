	<div class="scrolltop">
		<i class="fa fa-angle-up" aria-hidden="true"></i>	
	</div>			
	<footer class="footer">
		<?php 
			$post = get_post(549); // specific post
			$the_content = apply_filters('the_content', $post->post_content);
			if ( !empty($the_content) ) {
				echo $the_content;
			}
		?>
	</footer>
	<?php if(get_option('phone')){ ?>
	<div class="phonering-alo-phone phonering-alo-green phonering-alo-show" id="phonering-alo-phoneIcon">
<div class="phonering-alo-ph-circle"></div>
 <div class="phonering-alo-ph-circle-fill"></div>
<a href="tel:<?php echo get_option('phone');?>" class="pps-btn-img" title="Liên hệ">
 <div class="phonering-alo-ph-img-circle"></div>
 </a>
</div>
<?php }?>
	<?php wp_footer(); ?>
	<!-- END  MESSENGER -->
	<script src="<?php echo BASE_URL; ?>/js/wow.min.js"></script>
	<script src="<?php echo BASE_URL; ?>/js/slick.js"></script>
	<script src="<?php echo BASE_URL; ?>/js/bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL; ?>/js/owl.carousel.min.js"></script>
	<script src="<?php echo BASE_URL; ?>/js/jquery.fancybox.min.js"></script>
	<script src="<?php echo BASE_URL; ?>/js/custom.js"></script>
</body>
</html>
