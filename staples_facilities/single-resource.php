<?php
/**
 * Page Name: Single Resource
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
        <section class="row single content">
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<article id="single-<?php the_ID(); ?>" <?php post_class('content'); ?>>
					<h1 class="entry-title"><?php the_title();?></h1>
					<div class="entry-content"><?php the_content();?></h1>
					<?php if( get_field('link') ) { ?>
                        <a class="link-icon" href="<?php the_field('link'); ?>" target="_blank">Link</a>
                    <?php } else if (get_field('file')) { ?>
                        <a class="pdf-icon" href="<?php the_field('file'); ?>" target="_blank">PDF</a>
                    <?php } ?>
				</article>
			<?php endwhile; ?>
        </section>
    </div>
</div>
<?php get_footer(); ?>