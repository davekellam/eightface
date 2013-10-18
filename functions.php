<?php

// add_editor_style('editor-style.css'); // needs to be first

// set content width
if ( ! isset( $content_width ) )
	$content_width = 640;

// remove cruft from the WordPress header
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'index_rel_link');
remove_action( 'wp_head', 'parent_post_rel_link');
remove_action( 'wp_head', 'start_post_rel_link'); 
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head'); 
remove_action( 'wp_head', 'wp_generator');

// remove Jetpack cruft
function remove_jetpack_styles() {
	wp_deregister_style( 'jetpack-widgets' ); // Widgets
}
add_action( 'wp_print_styles', 'remove_jetpack_styles' );

function remove_jetpack_devicepx() {
    wp_dequeue_script( 'devicepx' );
}
add_action( 'wp_enqueue_scripts', 'remove_jetpack_devicepx' );

// move "Media" further down in the menus
function ef_move_media () {
	global $menu; $menu[14] = $menu[10]; unset($menu[10]);
} 

add_action('admin_menu', 'ef_move_media');


/**
*
* Code for the front dashboard page
*
**/
function ef_disable_default_dashboard_widgets() {

	//remove_meta_box('dashboard_right_now', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
	//remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');

	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
	//remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
	remove_meta_box('dashboard_primary', 'dashboard', 'core');
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');
}
add_action('admin_menu', 'ef_disable_default_dashboard_widgets');
