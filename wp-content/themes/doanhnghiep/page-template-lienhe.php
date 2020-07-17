<?php 
/*
Template Name: page-template-lienhe
*/
get_header(); 
?>	
<div class="page-wrapper">
	<div class="g_content">
        <div class="breadcrumb" id="breadcrumb">
            <div class="container">
                <?php the_breadcrumb(); ?>
            </div>
        </div>
		<div class="container"> 
	 <?php
    while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
        <div class="entry-content-page">
            <?php the_content(); ?> 
        </div>
    <?php
    endwhile; 
    ?>
		</div><!-- container -->
	</div>
</div>
<?php get_footer(); ?>

