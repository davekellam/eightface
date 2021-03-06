<?php

// add_editor_style('editor-style.css'); // needs to be first

// set content width
if ( ! isset( $content_width ) )
	$content_width = 640;

// Remove cruft from the WordPress header
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link' );
remove_action( 'wp_head', 'start_post_rel_link' ); 
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' ); 
remove_action( 'wp_head', 'wp_generator' );

function ef_setup() {

	// add_theme_support( 'automatic-feed-links' );

	// Enable Post Thumbnails
	add_theme_support( 'post-thumbnails' );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'link' ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'ef_setup' );


/**
 * Remove Jetpack cruft
 */
function remove_jetpack_styles() {
	wp_deregister_style( 'jetpack-widgets' ); // Widgets
	wp_deregister_style( 'jetpack-subscriptions' ); // Subscribe by email
}
add_action( 'wp_print_styles', 'remove_jetpack_styles' );

function remove_jetpack_devicepx() {
    wp_dequeue_script( 'devicepx' );
}
add_action( 'wp_enqueue_scripts', 'remove_jetpack_devicepx' );

/**
 * Never worry about cache again!
 */
function eightface_load_scripts() {
 
    // create css versions based on file date
    $css_ver = date( "ymdHi", filemtime( get_stylesheet_directory() . '/css/style.css' ) );
     
    // register stylesheets
    wp_register_style( 'eightface', get_template_directory_uri() . '/css/style.css', false, $css_ver );
	
	wp_enqueue_style ( 'eightface' );
 
}
add_action( 'wp_enqueue_scripts', 'eightface_load_scripts' );

/**
 * Move "Media" further down in the menus
 */
function ef_move_media () {
	global $menu; 

	$menu[14] = $menu[10];
	unset($menu[10]);
}
add_action( 'admin_menu', 'ef_move_media' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 */
function ef_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	elseif ( is_404() ) { $title = "404 Not Found" . " $sep "; }
	elseif ( is_search() ) { $title = "Search Results" . " $sep "; }

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page, if it's there
	$site_description = ''; // get_bloginfo( 'description', 'display' );

	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= $site_description; // $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'ef_wp_title', 10, 2 );

/**
 * Add html5.js script to <head> conditionally for IE8 and under
 */
function ef_ie_html5_js() {
	$ie_script = '<!--[if lt IE 9]>' . "\n\t" .
					'<script src="' . get_template_directory_uri() . '/js/html5.js" type="text/javascript"></script>' . "\n" .
				'<![endif]-->' . "\n";

	echo $ie_script;
}
add_action( 'wp_head', 'ef_ie_html5_js' );

/**
 * Add stats tracking scripts
 */
function ef_stats_js() {
	// TODO: Clean this up
	$google = 	'<script>' . "\n\t" .
					"(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){" . "\n\t\t" .
						"(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o)," . "\n\t\t" .
						"m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)" . "\n\t" .
					"})(window,document,'script','//www.google-analytics.com/analytics.js','ga');" . "\n\n\t" .

					"ga('create', 'UA-76978-1', 'eightface.com');" . "\n\t" .
					"ga('send', 'pageview');" . "\n" .
				'</script>' . "\n\n";

	echo $google;
}
// add_action( 'wp_footer', 'ef_stats_js' );

/**
 * Add a fallback image for Open Graph if nothing is present
 */
function ef_custom_image( $media, $post_id, $args ) {
    if ( empty( $media ) || is_home() ) {
        $permalink = get_permalink( $post_id );
        $img_url = get_template_directory_uri() . '/img/logo.png';
        $url = apply_filters( 'jetpack_photon_url', $img_url );
     
        return array( array(
            'type'  => 'image',
            'from'  => 'custom_fallback',
            'src'   => esc_url( $url ),
            'href'  => $permalink,
        ) );
    }
}
add_filter( 'jetpack_images_get_images', 'ef_custom_image', 10, 3 );

/**
 * Modify Jetpack's Open Graph Output
 */
function ef_og_tweaks( $tags ) {
	unset(  $tags['twitter:site' ] );

	$tags['twitter:site'] = sprintf( '@%s', 'eightface' );

	if( is_single() && $tags['twitter:card' ] === 'photo' )
		unset(  $tags['twitter:card' ] );
	if( is_single() )
		$tags['twitter:creator']= sprintf( '@%s', 'davekellam' );

	if( is_home() ){
		$ef_og_home_img = get_template_directory_uri() . '/img/logo.png';
		
		unset( $tags['og:image'] );
		$tags['og:image'] = esc_url( $ef_og_home_img );

		$tags['og:description'] = esc_attr( get_bloginfo( 'description' ) );
		$tags['og:type'] = 'website';
	}
 
	if( is_single() )
		$tags['article:publisher'] = 'https://www.facebook.com/eightface';
 
	return $tags;
}
add_filter( 'jetpack_open_graph_tags', 'ef_og_tweaks' );

/**
 * Adds custom classes to the array of body classes.
 */
function ef_body_classes( $classes ) {
	global $post;
	foreach ( $classes as &$str ) {

		if( strpos( $str, "page-id-" ) > -1 ){
			$str = "page-" . $post->post_name;
		}
		
	}
	return $classes;
}
add_filter( 'body_class', 'ef_body_classes' );

/**
 * Remove comment support from posts and pages
 */
function ef_remove_comment_support() {
	remove_post_type_support( 'post', 'comments' );
	remove_post_type_support( 'page', 'comments' );
}
add_action( 'init', 'ef_remove_comment_support' );

/**
 * Remove Feedback from the Admin menu sidebar
 */
function ef_admin_menu_tweaks() {
	remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'ef_admin_menu_tweaks' );

/**
 * Changes to the admin bar
 */
function ef_admin_bar_tweaks() {
	global $wp_admin_bar;
    
	$wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'ef_admin_bar_tweaks' );

/**
 * Prevent taxonomy feeds from being generated
 */
function ef_remove_taxonomy_feeds() {
  // return no data
  return;
}
add_filter( 'category_feed_link' , 'ef_remove_taxonomy_feeds' );