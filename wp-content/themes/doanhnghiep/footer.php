	<div class="scrolltop">
		<i class="fa fa-angle-up" aria-hidden="true"></i>	
	</div>			
	<footer class="footer">
		<div class="container">
			<div class="row">
				<?php if(get_locale()=='vi') { ?>
				<?php if(is_active_sidebar('footer1')){ ?>
					<div class="col-sm-4">
						<?php dynamic_sidebar('footer1'); ?>
					</div>
				<?php }?>
				<?php if(is_active_sidebar('footer2')){ ?>
					<div class="col-sm-4">
						<?php dynamic_sidebar('footer2'); ?>
					</div>
				<?php }?>
				<?php if(is_active_sidebar('footer3')){ ?>
					<div class="col-sm-4">
						<?php dynamic_sidebar('footer3'); ?>
					</div>
				<?php }?>
			<?php }else {?>
					<?php if(is_active_sidebar('footer1_en')){ ?>
					<div class="col-sm-4">
						<?php dynamic_sidebar('footer1_en'); ?>
					</div>
				<?php }?>
				<?php if(is_active_sidebar('footer2_en')){ ?>
					<div class="col-sm-4">
						<?php dynamic_sidebar('footer2_en'); ?>
					</div>
				<?php }?>
				<?php if(is_active_sidebar('footer3_en')){ ?>
					<div class="col-sm-4">
						<?php dynamic_sidebar('footer3_en'); ?>
					</div>
				<?php }?>
				<?php }?>
			</div>
		</div>
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
