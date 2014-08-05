<?php
/**
 * Suspenderz index.php
 *
 * @package WordPress
 * @subpackage Suspenderz
 * @since Suspenderz 1.0
 *
 */
?>

<?php get_header(); ?>

<?php 
	if( is_active_sidebar('primary-sidebar') ) { ?>
		<div class="row row-offcanvas row-offcanvas-left"> 
			<div id="content" class="col-xs-12 col-sm-9">
				<?php get_template_part( 'loop', 'index' ); ?>
			</div>
			<div id="sidebar" class="col-xs-6 col-sm-3 sidebar-offcanvas">
				<?php get_sidebar(); ?>
			</div>
		</div>
	<?php }	else { ?>
		<div class="row"> 
			<div id="content">
				<?php get_template_part( 'loop', 'index' ); ?>
			</div>
		</div>
	<?php } 
?>
<?php get_footer(); ?>