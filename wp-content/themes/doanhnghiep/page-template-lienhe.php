<?php 
/*
Template Name: page-template-lienhe
*/
get_header(); 
?>	
<div class="page-wrapper">
	<div class="g_content">
    <?php 
    global $post;
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
    ?>
    <div id="breadcrumb" class="breadcrumb" style="background:url('<?php echo $image[0]; ?>')">
      <div class="container">
        <div class="breadcrumb_inner">
          <h1><?php echo get_the_title(); ?></h1>
          <?php  echo the_breadcrumb(); ?>
        </div>
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

