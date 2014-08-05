<?php
/**
 * Page Name: Taxonomy
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
    <div id="content" <?php if( is_active_sidebar('primary-sidebar')): ?>class="col-xs-12 col-sm-9"<?php endif;?>>
		<section class="row tax content">
			<h2><?php $current_term = single_term_title("", false); echo "You are browsing " . $current_term;?>:</h2>
			<?php get_template_part( 'loops/tax', 'index' ); ?>
		</section>
	</div>

</div>
<?php get_footer(); ?>