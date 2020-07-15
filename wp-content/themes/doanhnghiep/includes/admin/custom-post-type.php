<?php

/*
	
@package sunsettheme
	
	========================
		THEME CUSTOM POST TYPES
	========================
*/



	add_action( 'init', 'sunset_contact_custom_post_type' );
	add_filter('manage_partners_posts_columns','sunset_set_contact_columns');
	add_action('manage_partners_posts_custom_column','sunset_contact_custom_column',10,2);

	/* DOI TAC */
	function sunset_contact_custom_post_type() {
		$labels = array(
			'name' 				=> 'Đối tác',
			'singular_name' 	=> 'Đối tác',
			'menu_name'			=> 'Đối tác',
			'name_admin_bar'	=> 'Đối tác'
		);

		$args = array(
			'labels'			=> $labels,
			'show_ui'			=> true,
			'show_in_menu'		=> true,
			'capability_type'	=> 'post',
			'hierarchical'		=> false,
			'menu_position'		=> 26,
			'menu_icon'			=> 'dashicons-businessman',
			'supports'			=> array( 'title', 'thumbnail' , 'excerpt' )
		);

		register_post_type( 'partners', $args );

	}

	function sunset_set_contact_columns($columns){
		$newColumns = array();
		$newColums['title'] = 'Title';
		$newColums['avatar'] = 'Avatar';
		return $newColums;
	}

	function sunset_contact_custom_column($column,$post_id){
		switch ($column) {
			case 'avatar':
			echo get_the_post_thumbnail();
			break;
		}
	}


	/* SAN PHAM */


	add_action( 'init', 'product_custom_post_type' );
	add_filter('manage_product_posts_columns','product_columns');
	add_action('manage_product_posts_custom_column','product_custom_column',10,2);

	function product_custom_post_type() {
		$labels = array(
			'name' 				=> 'Sản phẩm',
			'singular_name' 	=> 'Sản phẩm',
			'menu_name'			=> 'Sản phẩm',
			'name_admin_bar'	=> 'Sản phẩm'
		);

		$args = array(
			'labels'			=> $labels,
			'show_in_nav_menus ' => false,
			'show_ui'			=> true, 
		'show_in_menu'		=> true, // in sidebar left admin
		'capability_type'	=> 'post',
		'has_archive' => true,
		'hierarchical'		=> false,
		'menu_position'		=> 25,
		'menu_icon'			=> 'dashicons-clipboard',
		'public' => true, // required to display permalink under title post
		'query_var' => true,
		'publicly_queryable' => true, // permalink
		'supports'			=> array( 'title', 'thumbnail' , 'excerpt' , 'editor' )
	);

		register_post_type( 'product', $args );

	}

	function product_columns($columns){
		$newColumns = array();
		$newColums['title'] = 'Title';
		$newColums['avatar'] = 'Avatar';
		return $newColums;
	}

	function product_custom_column($column,$post_id){
		switch ($column) {
			case 'avatar':
			echo get_the_post_thumbnail();
			break;
		}
	}

	/* MANG LUOI */

	add_action( 'init', 'tgslide_custom_post_type' );
	add_filter('manage_tgslide_posts_columns','tgslide_columns');
	add_action('manage_tgslide_posts_custom_column','tgslide_custom_column',10,2);

	function tgslide_custom_post_type() {
		$labels = array(
			'name' 				=> 'Slide',
			'singular_name' 	=> 'Slide',
			'menu_name'			=> 'Slide',
			'name_admin_bar'	=> 'Slide'
		);

		$args = array(
			'labels'			=> $labels,
			'show_in_nav_menus ' => false,
			'show_ui'			=> true, 
		'show_in_menu'		=> true, // in sidebar left admin
		'capability_type'	=> 'post',
		'has_archive' => true,
		'hierarchical'		=> false,
		'menu_position'		=> 24,
		'menu_icon'			=> 'dashicons-clipboard',
		'public' => true, // required to display permalink under title post
		'query_var' => true,
		'publicly_queryable' => true, // permalink
		'supports'			=> array( 'title', 'thumbnail' , 'excerpt' , 'editor' )
	);
		register_post_type( 'tgslide', $args );

	}

	function tgslide_columns($columns){
		$newColumns = array();
		$newColums['title'] = 'Title';
		$newColums['avatar'] = 'Avatar';
		return $newColums;
	}

	function tgslide_custom_column($column,$post_id){
		switch ($column) {
			case 'avatar':
			echo get_the_post_thumbnail();
			break;
		}
	}

