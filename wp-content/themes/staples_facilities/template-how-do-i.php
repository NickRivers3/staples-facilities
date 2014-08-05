<?php
/**
 * Template Name: How Do I
 *
 * @package WordPress
 * @subpackage staples_facilties
 * @since staples_facilties 1.0
 *
 */
?>
<?php get_header(); ?>

<div id="how-do-i-section" class="row <?php if( is_active_sidebar('primary-sidebar')): ?>row-offcanvas row-offcanvas-left<?php endif;?>">
	<?php if( is_active_sidebar('primary-sidebar')): ?>
		<div id="primary-sidebar" class="col-xs-6 col-sm-3 sidebar sidebar-offcanvas">
			<?php get_sidebar(); ?>
		</div>
	<?php endif;?>
    <div id="content" <?php if( is_active_sidebar('primary-sidebar')): ?>class="col-xs-12 col-sm-9"<?php endif;?>>
		<p class="pull-left visible-xs">
			<button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle sidebar</button>
		</p>
        <section class="row page content">
			<?php get_template_part( 'loop', 'index' ); ?>
        </section>
		<section class="row resource-content">
            <?php get_template_part('loops/resource'); ?>
        </section>
    </div>
</div>

<?php get_footer(); ?>