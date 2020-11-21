<?php 
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

//------------------Register Custom Post портфолио----------------------
	function new_post_type() {
			$labels = array(
					'name'                  => _x( 'Новости', 'Post Type General Name', 'text_domain' ),
					'singular_name'         => _x( 'Новости', 'Post Type Singular Name', 'text_domain' ),
					'menu_name'             => __( 'Новости', 'text_domain' ),
					'all_items'             => __( 'Новости', 'text_domain' ),
					'add_new_item'          => __( 'Добавить новость', 'text_domain' ),
					'add_new'               => __( 'Добавить новость', 'text_domain' ),
			);
			$args = array(
					'label'                 => __( 'Новости', 'text_domain' ),
					'labels'                => $labels,
					'supports'              => array( 'title', 'editor', 'thumbnail','excerpt' ),// 'title','editor','author','thumbnail',,'trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
					'hierarchical'          => false,
					'public'                => true,
					'show_ui'               => true,
					'show_in_menu'          => true,
					'menu_position'         => 4,
					'menu_icon'             => 'dashicons-images-alt2',
					'show_in_admin_bar'     => true,
					'show_in_nav_menus'     => true,
					'can_export'            => true,
					'has_archive'           => true,
					'exclude_from_search'   => false,
					'publicly_queryable'    => true,
					'capability_type'       => 'page',
					'show_in_rest' => true, // Important !
					// 'taxonomies'          => array( 'category' ),
			);
			register_post_type( 'new', $args );
			
	}
	add_action( 'init', 'new_post_type', 0 );
