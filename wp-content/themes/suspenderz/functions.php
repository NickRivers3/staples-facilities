<?php
/**
 * Suspenderz functions and definitions
 *
 * @package WordPress
 * @subpackage Suspenderz
 * @since Suspenderz 1.0
 *
 */
 
/**
 *
 * Set up the content width value based on the theme's design.
 *
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1200;
}

/**
 * Suspenderz setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * @since Suspenderz 1.0
 *
 */
 
if ( ! function_exists( 'suspenderz_setup' ) ) :
function suspenderz_setup() {

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 400, 300, true );
	add_image_size( 'suspenderz-full-width', 1170, 600, true );

	// This theme uses wp_nav_menu() in four locations.
	register_nav_menus( array(
		'primary'   => __( 'Primary menu', 'suspenderz' ),
		'secondary' => __( 'Secondary menu for Users', 'suspenderz' ),
		'sidebar' => __( 'Sidebar menu', 'suspenderz' ),
		'footer' => __( 'Footer menu', 'suspenderz' ),
	) );
	
	// Custom Header Image
	add_theme_support( 'custom-header', array(
		'flex-width'    => true,
		'width'         => 1170,
		'flex-height'    => true,
		'height'        => 200,
		'default-image' => get_template_directory_uri() . '/images/header.jpg',
	) );
	
	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'suspenderz_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );

}
endif; // suspenderz_setup
add_action( 'after_setup_theme', 'suspenderz_setup' );

/**
 * Adjust content_width value for image attachment template.
 *
 * @since Suspenderz 1.0
 *
 */
function suspenderz_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 810;
	}
}
add_action( 'template_redirect', 'suspenderz_content_width' );

/**
 * Register three Suspenderz widget areas.
 *
 * @since Suspenderz 1.0
 *
 */
function suspenderz_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'suspenderz' ),
		'id'            => 'primary-sidebar',
		'description'   => __( 'Main sidebar that appears on the left.', 'suspenderz' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', 'suspenderz' ),
		'id'            => 'content-sidebar',
		'description'   => __( 'Additional sidebar that appears on the right.', 'suspenderz' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'suspenderz' ),
		'id'            => 'footer-widget',
		'description'   => __( 'Appears in the footer section of the site.', 'suspenderz' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'suspenderz_widgets_init' );


/**
 * Extend the default WordPress body classes.
 *
 * @since Suspenderz 1.0
 *
 */
function suspenderz_body_classes( $classes ) {
	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} else {
		$classes[] = 'masthead-fixed';
	}

	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}

	//if ( ( ! is_active_sidebar( 'sidebar-2' ) )
		//|| is_page_template( 'templates/.php' )
		//|| is_page_template( 'templates/.php' )
		//|| is_attachment() ) {
		//$classes[] = 'full-width';
	//}

	//if ( is_active_sidebar( 'sidebar-3' ) ) {
		//$classes[] = 'footer-widgets';
	//}

	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}

	return $classes;
}
add_filter( 'body_class', 'suspenderz_body_classes' );

/**
 * Add styles and Script
 *
 * @since Suspenderz 1.0
 *
 */
function load_js_and_styles() {
	// Load Bootstrap JS 
	wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array( 'jquery' ), null, true  );
	// Load Bootstrap CSS
	wp_enqueue_style('bootstrap_css', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), null, 'all' );
	
	// Load Theme JS 
	wp_enqueue_script('suspenderz', get_template_directory_uri() . '/js/suspenderz.js', array( 'jquery' ), null, true  );
	// Load Theme CSS
	wp_enqueue_style('overrides', get_template_directory_uri() . '/css/overrides.css', array(), null, 'all' );
	wp_enqueue_style('navigation', get_template_directory_uri() . '/css/navigation.css', array(), null, 'all' );
	wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css', array(), null, 'all' );
}
add_action( 'wp_enqueue_scripts', 'load_js_and_styles' );

/**
 * Walker Bootstrap
 *
 * @since Suspenderz 1.0
 *
 */
class bs_menu extends Walker_Nav_Menu {

	function start_el(&$output, $item, $depth = 0, $args = Array(), $current_object_id = 0) {
		
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';
		
		if ( $args->has_children) {
			$class_names = "dropdown ";
		}
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names .= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';
		
		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		if ( $args->has_children ) {
			$attributes .= ' class="dropdown-toggle" data-toggle="dropdown"';
		}
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
		$item_output .= $description.$args->link_after;
		
		if( $args->has_children ) {
			$item_output .= '<b class="caret"></b></a>';
		}
		else {
			$item_output .= '</a>';
		}

		$item_output .= $args->after;
		
		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);

	}
	
	function start_lvl(&$output, $depth = 0, $args = Array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
	}
	
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
		$id_field = $this->db_fields['id'];
		if ( is_object( $args[0] ) ) {
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
		}
		return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
}

/**
 * Add active class
 *
 * @since Suspenderz 1.0
 *
 */
function add_active_class($classes, $item) {
	if( $item->menu_item_parent == 0 && in_array('current-menu-item', $classes) ) {
		$classes[] = "active";
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_active_class', 10, 2 );

?>