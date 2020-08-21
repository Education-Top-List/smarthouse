<?php
add_action('admin_menu', 'ch_essentials_admin');
function ch_essentials_admin() {

	register_setting('zang-settings-header', 'phone');
	register_setting('zang-settings-socials', 'footer_fb');
	register_setting('zang-settings-socials', 'footer_zalo');
	register_setting('zang-settings-socials', 'footer_youtube');
	/* Base Menu */
	add_menu_page('Zang Theme Option','ZQ Framework','manage_options','template_admin_zang','zang_theme_create_page',get_template_directory_uri() . '/images/setting_icon.png',110);
}
add_action('admin_init', 'zang_custom_settings');
function zang_custom_settings() { 

	/* Header Options Section */
	add_settings_section('zang-header-options', 'Chỉnh sửa header','zang_header_options_callback','zang-settings-header' );
	add_settings_field('address-hd','Số điện thoại', 'zang_phone_header','zang-settings-header', 'zang-header-options');

	/* Social Options Section */
	add_settings_section('zang-social-options','Chỉnh sửa social','zang_social_options_callback','zang-settings-socials' );
	add_settings_field('facebook','Facebook Link', 'zang_footer_fb','zang-settings-socials', 'zang-social-options');
	add_settings_field('zalo','Zalo Link', 'zang_footer_zalo','zang-settings-socials', 'zang-social-options');
	add_settings_field('youtube','Youtube Link', 'zang_footer_youtube','zang-settings-socials', 'zang-social-options');

}

function zang_header_options_callback(){
	echo '';
}

function zang_social_options_callback(){
	echo '';
}

function zang_commit_options_callback(){
	echo '';
}

function zang_phone_header(){
	$phone = esc_attr(get_option('phone'));
	echo '<input type="text" class="iptext_adm" name="phone" value="'.$phone.'" >';
}

function zang_footer_fb(){
	$footer_fb = esc_attr(get_option('footer_fb'));
	echo '<input type="text" class="iptext_adm" name="footer_fb" value="'.$footer_fb.'" placeholder="" ';
}
function zang_footer_zalo(){
	$footer_zalo = esc_attr(get_option('footer_zalo'));
	echo '<input type="text" class="iptext_adm" name="footer_zalo" value="'.$footer_zalo.'" placeholder="" ';
}
function zang_footer_youtube(){
	$footer_youtube = esc_attr(get_option('footer_youtube'));
	echo '<input type="text" class="iptext_adm" name="footer_youtube" value="'.$footer_youtube.'" placeholder="" ';
}

function myshortcode(){
	ob_start();
	if(get_option('footer_fb') || get_option('footer_zalo') || get_option('footer_youtube') || get_option('footer_insta') ){
		?>
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
												<img class="img_zl_ft" src="<?php echo BASE_URL; ?>/images/icon_zalo_ft.png">
											</figure>
										</a>
										</li>
									<?php }?>
								</ul>
						</div>	
		<?php
	}
	return ob_get_clean();
}
add_shortcode('social_ft','myshortcode');

function shortcode_gbh(){
	ob_start();
	?>
	<div class="gbh">
		<div class="container">
			<h4 class="title_under_before"><span>Các gói bảo hiểm được quan tâm</span></h4>
			<ul class="row">
				<?php
				$args = array(  
					'post_type' => 'product',
					'post_status' => 'publish',
					'posts_per_page' => 4, 
					'orderby' => 'title', 
					'order' => 'ASC'
				);
				$loop_partner = new WP_Query( $args ); 

				while ( $loop_partner->have_posts() ) : $loop_partner->the_post(); 
    	//echo the_title();
					?> <li class="col-sm-3">
						<div class="product_inner pw">
							<div class="wrap_figure">
								<?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );  ?>
								<figure class="thumbnail" style="background:url('<?php echo $image[0]; ?>');"><a href="<?php the_permalink(); ?>"></a> </figure>
							</div>
							<h4><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h4>
							<div class="excerpt">
								<p><?php echo excerpt(20); ?></p>
							</div>
						</div>
						</li> <?php
					endwhile;
					wp_reset_query();
					?>
				</ul>
			</div>
		</div>
	</div>
	<?php
	return ob_get_clean();
}
add_shortcode('sc_gbh','shortcode_gbh');



/* Display Page
-----------------------------------------------------------------*/
function zang_theme_create_page() {
	?>
	<div class="wrap">  
		<?php settings_errors(); ?>  

		<?php  
		$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'header_page_options';  
		?>  

		<ul class="nav-tab-wrapper"> 
			<li><a href="?page=template_admin_zang&tab=header_page_options" class="nav-tab <?php echo $active_tab == 'header_page_options' ? 'nav-tab-active' : ''; ?>">Header</a> </li>
			<li><a href="?page=template_admin_zang&tab=social_page_options" class="nav-tab <?php echo $active_tab == 'social_page_options' ? 'nav-tab-active' : ''; ?>">Social Footer</a></li>	
		</ul>  

		<form method="post" action="options.php">  
			<?php 
			if( $active_tab == 'header_page_options' ) {  
				settings_fields( 'zang-settings-header' );
				do_settings_sections( 'zang-settings-header' ); 
			} else if( $active_tab == 'social_page_options' ) {
				settings_fields( 'zang-settings-socials' );
				do_settings_sections( 'zang-settings-socials' ); 
			}
			?>             
			<?php submit_button(); ?>  
		</form> 

	</div> 

	<?php
}

