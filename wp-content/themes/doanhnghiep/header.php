<!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php if(get_locale()=='vi'){ echo 'html_vi'; }else{ echo 'html_en';} ?>" >
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php bloginfo('name'); ?></title>
	<!-- css -->
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/slick.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/animate.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/jquery.fancybox.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/style.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/g_style.css">
	<!-- js -->
	<script src="<?php echo BASE_URL; ?>/js/jquery.min.js"></script>
	
	<?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
	<div class="bg_opacity"></div>
	<?php if ( wp_is_mobile() ) { ?>
		<div id="menu_mobile_full">
			<nav class="mobile-menu">
				<p class="close_menu"><span><i class="fa fa-times" aria-hidden="true"></i></span></p>
				<?php 
				$args = array('theme_location' => 'menu_mobile');
				?>
				<?php wp_nav_menu($args);?>
			</nav>
		</div>
	<?php }?>
	<header class="header">
		<div class="top_header">
			<div class="wrap_phone_hd">
				<p><a href="tel:243 351 8837">+ 243 351 8837</a>- <a href="tel:0898 015 115">0898 015 115</a></p>
			</div>
				<!-- display account top_header mobile -->
				<span class="icon_mobile_click"><i class="fa fa-bars" aria-hidden="true"></i></span>
				<div class="wrap_nav_logo">
					<div class="logo_site">
						<div class='logo_w'>
							<a href="<?php echo home_url(); ?>"><img src="<?php echo BASE_URL; ?>/images/logo_smarthouse_while.png"></a>
						</div>
						<div class="logo_rb">
							<?php 
						if(has_custom_logo()){
							the_custom_logo();
						}
						else { ?> 
							<h2><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h2>
						<?php } ?>
						</div>
						
					</div>
				</div>
				<div class="wrap_f_right">
					<div class="tg_language">
						<ul>
							<?php pll_the_languages(array(
								'dropdown'=>0,
								'show_flags'=>1,
								'show_names'=>0
							));  ?>
						</ul>
					</div>
					<div class="social_nav_hd">
						<?php if(get_option('footer_fb')){ ?>
							<div class="social_hd">
								<ul>
									<?php if(get_option('footer_fb')){ ?>
										<li class="fb_ft"><a href="<?php echo get_option('footer_fb'); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<?php }?>
									<?php if(get_option('footer_youtube')){ ?>
										<li class="youtube"><a href="<?php echo get_option('footer_youtube'); ?>" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
									<?php }?>
										<?php if(get_option('footer_zalo')){ ?>
										<li class="zalo">
											<a href="<?php echo get_option('footer_zalo'); ?>" target="_blank">
											<figure>
												<img src="<?php echo BASE_URL; ?>/images/icon_zalo_hd_small.png">
												<img src="<?php echo BASE_URL; ?>/images/icon_zalo_hd_small_black.png">
											</figure>
										</a>
										</li>
									<?php }?>
								</ul>
							</div>
						<?php }?> 
					</div>
					

				</div>
		</div>
		<?php if(is_front_page() && !is_home()) { ?>
			<div class="wrap_header_slide">
				<div class="slide_hd">
					<ul>
						<?php
						$args = array(  
							'post_type' => 'tgslide',
							'post_status' => 'publish',
							'posts_per_page' => 20, 
							'orderby' => 'title', 
							'order' => 'ASC'
						);

						$loop_slide = new WP_Query( $args ); 

						while ( $loop_slide->have_posts() ) : $loop_slide->the_post(); 
    	//echo the_title();
							?> 
							<li>
								<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full' ); ?>
								<figure class="thumbnail"  style="background:url('<?php echo $image[0]; ?>');"> <a href="<?php echo get_the_excerpt(); ?>" target="_blank"></a> </figure> 
							</li> 
							<?php
						endwhile;
						wp_reset_postdata();
						?>
					</ul>

				</div>
				<div class="project_gallery">
					<ul>
						<?php 
						while ( $loop_slide->have_posts() ) : $loop_slide->the_post(); 
							?> 
							<li>
								<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full' ); ?>
								<figure class="thumbnail"> <?php the_post_thumbnail(); ?></figure> 
							</li> 
							<?php
						endwhile;
						wp_reset_postdata();
						?>
					</ul>
				</div>	
			</div>
			<div class="wrap_video_hd">
				<div class="row">
						<ul>
							<?php
							$args = array(  
								'post_type' => 'videos_home',
								'post_status' => 'publish',
								'posts_per_page' => 3, 
								'orderby' => 'date'
							);
							$loop_slide = new WP_Query( $args ); 

							while ( $loop_slide->have_posts() ) : $loop_slide->the_post(); 
								?> 
								<li class="col-sm-4">
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
		<?php }?>
	</header>