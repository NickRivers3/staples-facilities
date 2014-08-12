<?php
/**
 * Sidebar Name: Primary
 *
 * @package WordPress
 * @subpackage staples_facilties
 * @since staples_facilties 1.0
 *
 */

?>

<div class="sidebar-wrapper">
	<?php if (is_page('videos') || is_singular('video')) {
		if ( is_active_sidebar( 'video-sidebar' ) ) :
			dynamic_sidebar('video-sidebar'); 
		endif; 
	} else if (is_page('how-do-i')) {
		if ( is_active_sidebar( 'resource-sidebar' ) ) :
			dynamic_sidebar('resource-sidebar'); 
		endif; 
	} else if (is_page('vendor-form') || is_page('vendor-thank-you')) {
		if ( is_active_sidebar( 'vendor-sidebar' ) ) :
			dynamic_sidebar('vendor-sidebar'); 
		endif; 
	} else {
		if ( is_active_sidebar( 'primary-sidebar' ) ) :
			dynamic_sidebar('primary-sidebar'); 
		endif;
	} ?>
</div>