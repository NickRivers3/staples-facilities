<?php
/**
 * Template Name: Homepage 2
 *
 * @package WordPress
 * @subpackage staples_facilties
 * @since staples_facilties 1.0
 *
 */
?>

<?php get_header(); ?>

<div id="front-page" class="row flush"> 
	<div id="content">
		<?php get_template_part( 'loops/homepage', 'index' ); ?>
	</div>
</div>
<?php get_footer(); ?>