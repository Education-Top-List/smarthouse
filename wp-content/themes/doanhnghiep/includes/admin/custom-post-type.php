<?php

/*
	
@package sunsettheme
	
	========================
		THEME CUSTOM POST TYPES
	========================
*/



	add_action( 'init', 'certi_contact_custom_post_type' );
	add_filter('manage_certificate_posts_columns','sunset_set_contact_columns');
	add_action('manage_certificate_posts_custom_column','sunset_contact_custom_column',10,2);

	/* DOI TAC */
	function certi_contact_custom_post_type() {
		$labels = array(
			'name' 				=> 'Chứng chỉ',
			'singular_name' 	=> 'Chứng chỉ',
			'menu_name'			=> 'Chứng chỉ',
			'name_admin_bar'	=> 'Chứng chỉ'
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

		register_post_type( 'certificate', $args );

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

