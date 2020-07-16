<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php bloginfo('name'); ?></title>

	<link rel="shortcut icon" href="<?php echo BASE_URL; ?>/images/favicon.ico">
	<!-- css -->
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/slick.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/animate.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/style.css">
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
			<div class="container">
				<!-- display account top_header mobile -->
				<span class="icon_mobile_click"><i class="fa fa-bars" aria-hidden="true"></i></span>
				<div class="wrap_nav_logo">
					<div class="logo_site">
						<?php 
						if(has_custom_logo()){
							the_custom_logo();
						}
						else { ?> 
							<h2><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h2>
						<?php } ?>
					</div>
				</div>
				<nav class="nav nav_primary">
					<?php 
					$args = array('theme_location' => 'primary');
					?>
					<?php wp_nav_menu($args); ?>
				</nav>
			</div>
		</div>
		<?php if(is_front_page() && !is_home()){ ?>
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
					wp_reset_query();
					?>
				</ul>
			</div>	
		<?php }?> 
	</header>