<?php
/**
 * Page Name: Single Video
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
        <section class="row single single-video content">
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<article id="single-<?php the_ID(); ?>" <?php post_class('content'); ?>>
					<h5 class="type"><?php echo get_the_term_list( $post->ID, 'type');?></h5>
					<?php if( get_field('video_embed')): ?>
						<div class="video-container large"><?php the_field('video_embed'); ?></div>
					<?php endif; ?>
					<h5 class="entry-title"><?php the_title();?></h5>
					<?php if( get_field('video_description')): ?>
					<div class="entry-content"><?php the_field('video_description'); ?></div>
					<?php endif; ?>
				</article>
			<?php endwhile; ?>
        </section>
        <section class="row gallery-video content">
			<h3 class="block-title">Other Videos</h3>
            <?php get_template_part('loops/video'); ?>
        </section>
    </div>
</div>
<?php get_footer(); ?>