<?php 
/*
Template Name: page-template-lienhe
*/
get_header(); 
?>	
<div class="page-wrapper">
	<div class="g_content">
      <div id="breadcrumb" class="breadcrumb">
        <div class="container">
         <ul>
            <?php  echo the_breadcrumb(); ?>
        </ul>
    </div>
</div>
<div class="container">
    <div class="contact_form"> 
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
</div>
<?php get_footer(); ?>

