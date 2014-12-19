<?php
/**
 * Page Name: 404
 *
 * @package WordPress
 * @subpackage staples_facilties
 * @since staples_facilties 1.0
 *
 */

?>
<?php get_header(); ?>

<div class="row <?php if( is_active_sidebar('primary-sidebar')): ?>row-offcanvas row-offcanvas-left<?php endif;?>"> 
	<?php if( is_active_sidebar('primary-sidebar')): ?>
		<div id="primary-sidebar" class="col-xs-6 col-sm-3 sidebar sidebar-offcanvas">
			<?php get_sidebar(); ?>
		</div>
	<?php endif;?>
	<article id="post-0" class="post error404 not-found content">
	<h1 class="entry-title"><?php _e( 'Not Found', 'staples_facilties' ); ?></h1>
      <section class="entry-content">
					<p><?php _e( 'Please contact us, or try a search below to find what you are looking for:', 'staples_facilties' ); ?></p>
         <?php get_search_form(); ?>
      </section>
	</article>
</div>
<?php get_footer(); ?>

