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
	} else {
		if ( is_active_sidebar( 'primary-sidebar' ) ) :
			dynamic_sidebar('primary-sidebar'); 
		endif;
	} ?>
</div>