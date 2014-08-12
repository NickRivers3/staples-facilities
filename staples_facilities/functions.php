<?php
/**
 * staples_facilties functions and definitions
 *
 * @package WordPress
 * @subpackage staples_facilties
 * @since staples_facilties 1.0
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
 * staples_facilties setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * @since staples_facilties 1.0
 *
 */
 
if ( ! function_exists( 'staples_facilties_setup' ) ) :
	function staples_facilties_setup() {

		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 400, 300, true );
		add_image_size( 'staples_facilties-full-width', 1170, 600, true );

		// This theme uses wp_nav_menu() in four locations.
		register_nav_menus( array(
			'primary'   => __( 'Primary menu', 'staples_facilties' ),
			'secondary' => __( 'Secondary menu for Users', 'staples_facilties' ),
			'sidebar' => __( 'Sidebar menu', 'staples_facilties' ),
			'footer' => __( 'Footer menu', 'staples_facilties' ),
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
		add_theme_support( 'custom-background', apply_filters( 'staples_facilties_custom_background_args', array(
			'default-color' => 'f5f5f5',
		) ) );

	}
endif; // staples_facilties_setup
add_action( 'after_setup_theme', 'staples_facilties_setup' );

/**
 * Adjust content_width value for image attachment template.
 *
 * @since staples_facilties 1.0
 *
 */
function staples_facilties_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 810;
	}
}
add_action( 'template_redirect', 'staples_facilties_content_width' );

/**
 * Register three staples_facilties widget areas.
 *
 * @since staples_facilties 1.0
 *
 */
function staples_facilties_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'staples_facilties' ),
		'id'            => 'primary-sidebar',
		'description'   => __( 'Main sidebar that appears on the left.', 'staples_facilties' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', 'staples_facilties' ),
		'id'            => 'content-sidebar',
		'description'   => __( 'Additional sidebar that appears on the right.', 'staples_facilties' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'staples_facilties' ),
		'id'            => 'footer-widget',
		'description'   => __( 'Appears in the footer section of the site.', 'staples_facilties' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Homepage Widget Area', 'staples_facilties' ),
		'id'            => 'homepage-widget',
		'description'   => __( 'Appears on the Hompage.', 'staples_facilties' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Video Sidebar', 'staples_facilties' ),
		'id'            => 'video-sidebar',
		'description'   => __( 'Main Videos sidebar that appears on the left.', 'staples_facilties' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Resource Sidebar', 'staples_facilties' ),
		'id'            => 'resource-sidebar',
		'description'   => __( 'Main Resource sidebar that appears on the left.', 'staples_facilties' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Vendor Sidebar', 'staples_facilties' ),
		'id'            => 'vendor-sidebar',
		'description'   => __( 'Main Vendor Form sidebar that appears on the left.', 'staples_facilties' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'staples_facilties_widgets_init' );

/**
 * Add styles and Script
 *
 * @since staples_facilties 1.0
 *
 */
function load_js_and_styles() {
	// Load Bootstrap JS 
	wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array( 'jquery' ), null, true  );
	// Load Bootstrap CSS
	wp_enqueue_style('bootstrap_css', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), null, 'all' );
	
	// Load Theme JS 
	wp_enqueue_script('jquery.cookie', get_template_directory_uri() . '/js/jquery.cookie.js', array( 'jquery' ), null, true  );
	wp_enqueue_script('staples_facilties', get_template_directory_uri() . '/js/staples_facilities.js', array( 'jquery' ), null, true  );
	// Load Theme CSS
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), null, 'all' );
	wp_enqueue_style('overrides', get_template_directory_uri() . '/css/overrides.css', array(), null, 'all' );
	wp_enqueue_style('navigation', get_template_directory_uri() . '/css/navigation.css', array(), null, 'all' );
	wp_enqueue_style('resources', get_template_directory_uri() . '/css/resources.css', array(), null, 'all' );
	wp_enqueue_style('videos', get_template_directory_uri() . '/css/videos.css', array(), null, 'all' );
	wp_enqueue_style('homepage', get_template_directory_uri() . '/css/homepage.css', array(), null, 'all' );
	wp_enqueue_style('form', get_template_directory_uri() . '/css/form.css', array(), null, 'all' );
	wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css', array(), null, 'all' );

}
add_action( 'wp_enqueue_scripts', 'load_js_and_styles' );

/**
 * Walker Bootstrap
 *
 * @since staples_facilties 1.0
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
 * @since staples_facilties 1.0
 *
 */
function add_active_class($classes, $item) {
	if( $item->menu_item_parent == 0 && in_array('current-menu-item', $classes) ) {
		$classes[] = "active";
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_active_class', 10, 2 );


/**
 * Add custom taxonomies
 *
 * @since staples_facilties 1.0
 *
 */
add_action('init', 'resource_taxonomy'); 
function resource_taxonomy() {
	if (!is_taxonomy('type')) {
		register_taxonomy( 
			'type', 
			array('resource', 'video'),
			array(
				'hierarchical' => true, 
				'label' => __('Media Type'),  
				'public' => true, 
				'show_ui' => true,
				'query_var' => 'type',
				'show_admin_column' => true,
				'rewrite' => array( 'slug' => 'type')
			) 
		);
	}
}

/**
 * Permalink fixes for custom tax
 *
 * @since staples_facilties 1.0
 *
 */
add_filter('post_type_link', 'resource_type_permalink', 10, 3);
function resource_type_permalink($permalink, $post_id, $leavename) {
	if (strpos($permalink, '%type%') === FALSE) return $permalink;
	$post = get_post($post_id);
	if (!$post) return $permalink;
	$terms = wp_get_object_terms($post->ID, 'type');   
	if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0])) $taxonomy_slug = $terms[0]->slug;
	else $taxonomy_slug = 'no-type-defined';
	 
	return str_replace('%type%', $taxonomy_slug, $permalink);
}

/**
 * Add Content Types
 *
 * @since staples_facilties 1.0
 *
 */
function codex_custom_init() {
	// Resources
	$resource_label = array(
		'name' => 'Resources',
		'singular_name' => 'Resource',
		'add_new' => 'Add Resource',
		'add_new_item' => 'Add New Resource',
		'edit_item' => 'Edit Resource',
		'new_item' => 'New Resource',
		'all_items' => 'All Resources',
		'view_item' => 'View Resource',
		'search_items' => 'Search Resource',
		'not_found' => 'No Resource found',
		'not_found_in_trash' => 'No Resources found in Trash',
		'parent_item_colon' => '',
		'menu_name' => 'Resources'
	);
	$resource_args = array (
		'labels' => $resource_label,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'resources/%type%'),
		'capability_type' => 'post',
		'has_archive' => true,
		'with_front' => true ,
		'hierarchical' => true,
		'supports' => array('title', 'attachments', 'page-attributes', 'page-templates'),
	);
	register_post_type('resource', $resource_args);
	// Videos
	$video_label = array(
		'name' => 'Videos',
		'singular_name' => 'Video',
		'add_new' => 'Add Video',
		'add_new_item' => 'Add New Video',
		'edit_item' => 'Edit Video',
		'new_item' => 'New Video',
		'all_items' => 'All Videos',
		'view_item' => 'View Video',
		'search_items' => 'Search Video',
		'not_found' => 'No Video found',
		'not_found_in_trash' => 'No Videos found in Trash',
		'parent_item_coln' => '',
		'menu_name' => 'Videos'
	);
	$video_args = array (
		'labels' => $video_label,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'videos/%type%'),
		'capability_type' => 'post',
		'has_archive' => true,
		'with_front' => true ,
		'hierarchical' => true,
		'supports' => array('title', 'attachments', 'page-attributes', 'page-templates'),
		'taxonomies' => array('post_tag'),
	);
	register_post_type('video', $video_args);
	// Team Members
	$team_label = array(
		'name' => 'Team Members',
		'singular_name' => 'Team Member',
		'add_new' => 'Add Team Member',
		'add_new_item' => 'Add Team Member',
		'edit_item' => 'Edit Team Member',
		'new_item' => 'New Team Member',
		'all_items' => 'All Team Members',
		'view_item' => 'View Team Member',
		'search_items' => 'Search Team Members',
		'not_found' => 'No Team Members',
		'not_found_in_trash' => 'No Team Members found in Trash',
		'parent_item_coln' => '',
		'menu_name' => 'Team Members'
	);
	$team_args = array (
		'labels' => $team_label,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'team-members'),
		'capability_type' => 'post',
		'has_archive' => true,
		'with_front' => true ,
		'hierarchical' => true,
		'supports' => array('title'),
	);
	register_post_type('team members', $team_args);
	
	// Homepage Slides
	$homepage_slides_label = array(
		'name' => 'Homepage Slides',
		'singular_name' => 'Homepage Slide',
		'add_new' => 'Add Homepage Slide',
		'add_new_item' => 'Add Homepage Slide',
		'edit_item' => 'Edit Homepage Slide',
		'new_item' => 'New Homepage Slide',
		'all_items' => 'All Homepage Slides',
		'view_item' => 'View Homepage Slide',
		'search_items' => 'Search Homepage Slides',
		'not_found' => 'No Homepage Slides',
		'not_found_in_trash' => 'No Homepage Slides found in Trash',
		'parent_item_coln' => '',
		'menu_name' => 'Homepage Slides'
	);
	$homepage_slides_args = array (
		'labels' => $homepage_slides_label,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'homepage-slides'),
		'capability_type' => 'post',
		'has_archive' => true,
		'with_front' => true ,
		'hierarchical' => true,
		'supports' => array('title'),
	);
	register_post_type('homepage slides', $homepage_slides_args);
	
	// NAC Information
	$nac_information_label = array(
		'name' => 'NAC Information',
		'singular_name' => 'NAC Information',
		'add_new' => 'Add NAC Information',
		'add_new_item' => 'Add NAC Information',
		'edit_item' => 'Edit NAC Information',
		'new_item' => 'New NAC Information',
		'all_items' => 'All NAC Information',
		'view_item' => 'View NAC Information',
		'search_items' => 'Search NAC Information',
		'not_found' => 'No NAC Information',
		'not_found_in_trash' => 'No NAC Information found in Trash',
		'parent_item_coln' => '',
		'menu_name' => 'NAC Info'
	);
	$nac_information_args = array (
		'labels' => $nac_information_label,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'nac-information'),
		'capability_type' => 'post',
		'has_archive' => true,
		'with_front' => true ,
		'hierarchical' => true,
		'supports' => array('title'),
	);
	register_post_type('nac information', $nac_information_args);
	
	// Retail Information
	$retail_information_label = array(
		'name' => 'Retail Information',
		'singular_name' => 'Retail Information',
		'add_new' => 'Add Retail Information',
		'add_new_item' => 'Add Retail Information',
		'edit_item' => 'Edit Retail Information',
		'new_item' => 'New Retail Information',
		'all_items' => 'All Retail Information',
		'view_item' => 'View Retail Information',
		'search_items' => 'Search Retail Information',
		'not_found' => 'No Retail Information',
		'not_found_in_trash' => 'No Retail Information found in Trash',
		'parent_item_coln' => '',
		'menu_name' => 'Retail Info'
	);
	$retail_information_args = array (
		'labels' => $retail_information_label,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'retail-information'),
		'capability_type' => 'post',
		'has_archive' => true,
		'with_front' => true ,
		'hierarchical' => true,
		'supports' => array('title'),
	);
	register_post_type('retail information', $retail_information_args);
}
add_action( 'init', 'codex_custom_init');

if ( ! function_exists( 'staples_facilities_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Twenty Fourteen 1.0
 */
function staples_facilities_the_attached_image() {
	$post = get_post();
	/**
	 * Filter the default Twenty Fourteen attachment size.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array $dimensions {
	 *     An array of height and width dimensions.
	 *
	 *     @type int $height Height of the image in pixels. Default 810.
	 *     @type int $width  Width of the image in pixels. Default 810.
	 * }
	 */
	$attachment_size     = apply_filters( 'staples_facilities_attachment_size', array( 810, 810 ) );
	$next_attachment_url = wp_get_attachment_url();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Adds Type Filter widget.
 */
class type_filter extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'type_filter', // Base ID
			__('Media Type Filter', 'staples_facilities'), // Name
			array( 'description' => __( 'A Media Type Filter Widget', 'staples_facilities' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		$filters .= "<div class='filters'>";
		$filters .= "<div class='row'><span class='filter-label'>Filters</span></div>";
		$filters .= "<div class='row'><input class='chk' type='checkbox' value='pest-control' id='pest-control'><label for='pest-control'>Pest Control</label></div>";
		$filters .= "<div class='row'><input class='chk' type='checkbox' value='auto-doors' id='auto-doors'><label for='auto-doors'>Auto Doors</label></div>";
		$filters .= "<div class='row'><input class='chk' type='checkbox' value='buffers-and-scrubbers' id='buffers-and-scrubbers'><label for='buffers-and-scrubbers'>Buffers and Scrubbers</label></div>";
		$filters .= "<div class='row'><input class='chk' type='checkbox' value='locks' id='locks'><label for='locks'>Locks</label></div>";
		$filters .= "<div class='row buttons'><button id='submit'>submit</button><button id='reset'>clear videos</button></div>";
		$filters .= "</div>";
		
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		echo __( $filters, 'staples_facilities' );
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'staples_facilities' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class type_filter

// register type_filter widget
function register_type_filter() {
    register_widget( 'type_filter' );
}
add_action( 'widgets_init', 'register_type_filter' );


/**
 * Adds Type Filter widget.
 */
class type_filter2 extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'type_filter2', // Base ID
			__('Media Type Filter 2', 'staples_facilities'), // Name
			array( 'description' => __( 'A Media Type Filter Widget 2', 'staples_facilities' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		$filters .= "<div class='filters2'>";
		$filters .= "<div class='row'><span class='filter-label'>Filters</span></div>";
		$filters .= "<div class='row'><input class='chk' type='checkbox' value='auto-doors' id='auto-doors'><label for='auto-doors'>Auto Doors</label></div>";
		$filters .= "<div class='row'><input class='chk' type='checkbox' value='baler' id='baler'><label for='baler'>Baler</label></div>";
		$filters .= "<div class='row'><input class='chk' type='checkbox' value='batteries' id='batteries'><label for='batteries'>Batteries</label></div>";
		$filters .= "<div class='row'><input class='chk' type='checkbox' value='buffers-and-scrubbers' id='buffers-and-scrubbers'><label for='buffers-and-scrubbers'>Buffers and Scrubbers</label></div>";
		$filters .= "<div class='row'><input class='chk' type='checkbox' value='eas-systems' id='eas-systems'><label for='eas-systems'>EAS Systems</label></div>";
		$filters .= "<div class='row'><input class='chk' type='checkbox' value='general' id='general'><label for='general'>General</label></div>";
		$filters .= "<div class='row'><input class='chk' type='checkbox' value='ladder' id='ladder'><label for='ladder'>Ladder</label></div>";
		$filters .= "<div class='row'><input class='chk' type='checkbox' value='lighting' id='lighting'><label for='lighting'>Lighting</label></div>";
		$filters .= "<div class='row'><input class='chk' type='checkbox' value='locks' id='locks'><label for='locks'>Locks</label></div>";
		$filters .= "<div class='row'><input class='chk' type='checkbox' value='panic-doors' id='panic-doors'><label for='panic-doors'>Panic Doors</label></div>";
		$filters .= "<div class='row'><input class='chk' type='checkbox' value='pest-control' id='pest-control'><label for='pest-control'>Pest Control</label></div>";
		$filters .= "<div class='row'><input class='chk' type='checkbox' value='plumbing' id='plumbing'><label for='plumbing'>Plumbing</label></div>";
		$filters .= "<div class='row'><input class='chk' type='checkbox' value='wet-dry-vacuums' id='wet-dry-vacuums'><label for='wet-dry-vacuums'>Wet-Dry Vacuums</label></div>";

		$filters .= "<div class='row buttons'><button id='submit'>submit</button><button id='reset'>clear resources</button></div>";
		$filters .= "</div>";
		
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		echo __( $filters, 'staples_facilities' );
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'staples_facilities' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class type_filter

// register type_filter widget
function register_type_filter2() {
    register_widget( 'type_filter2' );
}
add_action( 'widgets_init', 'register_type_filter2' );
?>