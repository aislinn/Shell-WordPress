<?php

if ( ! function_exists( 'shell_setup' ) ) :
function shell_setup() {


	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	//Enable support for Post Thumbnails on posts and pages.
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 1000, 450, true );
	add_image_size( 'shell-thumbnail', 210, 150, true );


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'shell' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );


	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'shell_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );
}
endif; // shell_setup
add_action( 'after_setup_theme', 'shell_setup' );






// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Forces small images to upsize for featured images
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -



class ThumbnailUpscaler
{
	/** http://wordpress.stackexchange.com/questions/50649/how-to-scale-up-featured-post-thumbnail **/
	static function image_crop_dimensions($default, $orig_w, $orig_h, $new_w, $new_h, $crop)
	{
	    if(!$crop)
	    	return null; // let the wordpress default function handle this
	
	    $aspect_ratio = $orig_w / $orig_h;
	    $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);
	
	    $crop_w = round($new_w / $size_ratio);
	    $crop_h = round($new_h / $size_ratio);
	
	    $s_x = floor( ($orig_w - $crop_w) / 2 );
	    $s_y = floor( ($orig_h - $crop_h) / 2 );
	
	    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
	}
}

add_filter('image_resize_dimensions', array('ThumbnailUpscaler', 'image_crop_dimensions'), 10, 6);













/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function shell_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'shell' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'shell_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function shell_scripts() {
	wp_enqueue_style( 'shell-custom', get_template_directory_uri() . '/assets/css/main.css' );

	wp_enqueue_style( 'shell-style', get_stylesheet_uri() );



	wp_enqueue_script( 'shell-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'shell-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'shell_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
