	<div class="scrolltop">
		<i class="fa fa-angle-up" aria-hidden="true"></i>	
	</div>			
	<footer class="footer">
		<div class="container">
			<div class="row">
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
			</div>
		</div>
	</footer>
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
