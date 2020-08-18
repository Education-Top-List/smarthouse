<?php

/*
	
@package sunsettheme
	
	========================
		THEME CUSTOM POST TYPES
	========================
*/


add_action( 'init', 'patner_custom_post_type' );
	add_filter('manage_partner_posts_columns','partner_contact_columns');
	add_action('manage_partner_posts_custom_column','partner_custom_column',10,2);

	/* DOI TAC */
	function patner_custom_post_type() {
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

		register_post_type( 'partner', $args );

	}

	function partner_contact_columns($columns){
		$newColumns = array();
		$newColums['title'] = 'Title';
		$newColums['avatar'] = 'Avatar';
		return $newColums;
	}

	function partner_custom_column($column,$post_id){
		switch ($column) {
			case 'avatar':
			echo get_the_post_thumbnail();
			break;
		}
	}


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



	/* Slide */

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


	/* DU AN */

	add_action( 'init', 'project_smarthouse_custom_post_type' );
	add_filter('manage_project_smarthouse_posts_columns','project_smarthouse_columns');
	add_action('manage_project_smarthouse_posts_custom_column','project_smarthouse_custom_column',10,2);

	function project_smarthouse_custom_post_type() {
		$labels = array(
			'name' 				=> 'Dự án',
			'singular_name' 	=> 'Dự án',
			'menu_name'			=> 'Dự án',
			'name_admin_bar'	=> 'Dự án'
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
   register_taxonomy('smarthouse_project', 'project_smarthouse', array(
        'label' => __('Chuyên mục dự án'),
        'hierarchical' => true
    ));

		register_post_type( 'project_smarthouse', $args );

	}

	function project_smarthouse_columns($columns){
		$newColumns = array();
		$newColums['title'] = 'Title';
		$newColums['avatar'] = 'Avatar';
		return $newColums;
	}

	function project_smarthouse_custom_column($column,$post_id){
		switch ($column) {
			case 'avatar':
			echo get_the_post_thumbnail();
			break;
		}
	}

	/* Video home */

	add_action( 'init', 'videos_home_custom_post_type' );
	add_filter('manage_videos_home_posts_columns','videos_home_columns');
	add_action('manage_videos_home_posts_custom_column','videos_home_custom_column',10,2);

	function videos_home_custom_post_type() {
		$labels = array(
			'name' 				=> 'Videos Home',
			'singular_name' 	=> 'Videos Home',
			'menu_name'			=> 'Videos Home',
			'name_admin_bar'	=> 'Videos Home'
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
		'supports'			=> array( 'title', 'thumbnail' , 'excerpt' )
	);

		register_post_type( 'videos_home', $args );

	}

	function videos_home_columns($columns){
		$newColumns = array();
		$newColums['title'] = 'Title';
		$newColums['avatar'] = 'Avatar';
		return $newColums;
	}

	function videos_home_custom_column($column,$post_id){
		switch ($column) {
			case 'avatar':
			echo get_the_post_thumbnail();
			break;
		}
	}