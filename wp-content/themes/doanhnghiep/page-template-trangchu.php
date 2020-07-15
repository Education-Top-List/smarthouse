<?php 
/*
Template Name: page-template-trangchu
*/
get_header(); 
?>	
<div class="page-wrapper">
	<div id="content">
		<div class="g_content">
			<?php 
			while(have_posts()) : the_post();
				the_content();
			endwhile;
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
