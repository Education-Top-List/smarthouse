
<div class="list_post_item pw">
	<div class="post_wrapper_content">
		<h2 class="post_title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php 
		  $categories = get_the_category(); 
          $cat_ID = $categories[0]->cat_ID;
		 ?>

		<div class="post_meta">
			<p><strong><?php the_time('d/m/Y');?> </strong><span>  | <?php the_time('H:i') ?></span> <b>Đã đăng trong <a href="<?php echo get_category_link($cat_ID); ?>"><?php echo $categories[0]->cat_name; ?> </a></b></p>
		</div>
	
	
	</div>


</div>
