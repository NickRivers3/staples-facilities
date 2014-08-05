<?php
/**
 * Template Name: Videos 
 *
 * @package WordPress
 * @subpackage staples_facilties
 * @since staples_facilties 1.0
 *
 */
?>
<?php get_header(); ?>

<div id="videos-section" class="row <?php if( is_active_sidebar('video-sidebar')): ?>row-offcanvas row-offcanvas-left<?php endif;?>">
	<?php if( is_active_sidebar('video-sidebar')): ?>
		<div id="video-sidebar" class="col-xs-6 col-sm-3 sidebar sidebar-offcanvas">
			<?php get_sidebar(); ?>
		</div>
	<?php endif;?>
    <div id="content" <?php if( is_active_sidebar('video-sidebar')): ?>class="col-xs-12 col-sm-9"<?php endif;?>>
		<p class="pull-left visible-xs">
			<button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle sidebar</button>
		</p>
        <section class="row page content">
			<?php 
				// Makes all Posts Display in Ascending Order
				global $query_string;
				query_posts( $query_string . '&order=DESC' ); 

				// The staples_facilties loop
				while ( have_posts() ) : the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('content'); ?>>
					<div class="wrap row">
						<header>
							<h1 class="page-title"><?php the_title(); ?></h1>
						</header>
						<section class="entry-content entry">
							<?php the_content(); ?>
						</section>
					</div>
				</article>
			<?php endwhile ?>
        </section>
		<section class="row featured-video content">
            <?php get_template_part( 'loops/featured-video', 'index' ); ?>
        </section>
        <section class="row gallery-video content">
			<h3 class="block-title">Other Videos</h3>
            <?php get_template_part('loops/video'); ?>
        </section>
    </div>
</div>

<?php get_footer(); ?>