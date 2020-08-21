<?php 
function sc_search_func(){
	?>
		<form action="" role="search" method="get" id="searchform" action="<?php echo home_url('/');  ?>">
						<div class="search">
							<input type="text" value="" name="s" id="s" placeholder="Sản phẩm bạn muốn tìm kiếm">
							<input type="hidden" value="product" name="post_type">
							<button type="submit" id="searchsubmit">Tìm kiếm</button>
						</div>
					</form>
	<?php
}

add_shortcode('sc_search','sc_search_func');