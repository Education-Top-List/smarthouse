<?php 
get_header(); 
?>	
<div id="wrap">
	<div class="g_content">
		<div class="breadcrumb">
			<div class="container">
				<?php echo the_breadcrumb(); ?>
			</div>
			</div>
		<div class="container">
			<div class="archive_content">
				<?php 
				$arg = array(
					'post_type'=> 'project_smarthouse',
					'orderby'=> 'date',
					'order' => 'ASC',
					'post_status' => 'publish'
				);
				$query = new WP_Query($arg);
				if($query->have_posts()) : ?>
					<ul class="row">
						<?php while($query->have_posts()) : $query->the_post(); 
							get_template_part('includes/frontend/loop/loop_project'); 
						endwhile; ?>
					</ul>
				<?php endif; ?>
				<?php get_template_part('inc/frontend/pagination/pagination'); ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
