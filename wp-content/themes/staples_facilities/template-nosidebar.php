<?php
/**
 * Template Name: No Sidebars
 *
 * @package WordPress
 * @subpackage staples_facilties
 * @since staples_facilties 1.0
 *
 */
?>

<?php get_header(); ?>

<div class="row"> 
	<div id="content">
		<?php get_template_part( 'loops/loop', 'index' ); ?>
	</div>
</div>
<?php get_footer(); ?>