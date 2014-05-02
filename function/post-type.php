<?php

add_action( 'init', 'codex_news_init' );


function codex_news_init() {
	$labels = array(
		'name'               => _x( 'News', 'news Post type', 'dom_theme' ),
		'singular_name'      => _x( 'News', 'news post type', 'dom_theme' ),
		'menu_name'          => _x( 'News', 'admin menu', 'dom_theme' ),
		'name_admin_bar'     => _x( 'News', 'add new on admin bar', 'dom_theme' ),
		'add_new'            => _x( 'Add News', 'News', 'dom_theme' ),
		'add_new_item'       => __( 'Add New News', 'dom_theme' ),
		'new_item'           => __( 'New News', 'dom_theme' ),
		'edit_item'          => __( 'Edit News', 'dom_theme' ),
		'view_item'          => __( 'View News', 'dom_theme' ),
		'all_items'          => __( 'All News', 'dom_theme' ),
		'search_items'       => __( 'Search News', 'dom_theme' ),
		'parent_item_colon'  => __( 'Parent News:', 'dom_theme' ),
		'not_found'          => __( 'No news found.', 'dom_theme' ),
		'not_found_in_trash' => __( 'No news found in Trash.', 'dom_theme' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'news' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'news', $args );


	$labels = array(
		'name'              => _x( 'News Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'News Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search News Categories' ),
		'all_items'         => __( 'All News Categories' ),
		'parent_item'       => __( 'Parent News Category' ),
		'parent_item_colon' => __( 'Parent News Category:' ),
		'edit_item'         => __( 'Edit News Category' ),
		'update_item'       => __( 'Update News Category' ),
		'add_new_item'      => __( 'Add New News Category' ),
		'new_item_name'     => __( 'New News Category Name' ),
		'menu_name'         => __( 'News Category' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'news_category' ),
	);

	register_taxonomy( 'news_category', array( 'news' ), $args );

}