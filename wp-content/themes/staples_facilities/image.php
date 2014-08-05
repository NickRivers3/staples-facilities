<?php
/**
 * Page Name: Iamge
 *
 * @package WordPress
 * @subpackage staples_facilties
 * @since staples_facilties 1.0
 *
 */
 
 $metadata = wp_get_attachment_metadata();
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
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<div class="entry-meta">
							<span class="entry-date"><time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></span>
							<span class="full-size-link"><a href="<?php echo wp_get_attachment_url(); ?>"><?php echo $metadata['width']; ?> &times; <?php echo $metadata['height']; ?></a></span>
							<span class="parent-post-link"><a href="<?php echo get_permalink( $post->post_parent ); ?>" rel="gallery"><?php echo get_the_title( $post->post_parent ); ?></a></span>
							<?php edit_post_link( __( 'Edit', 'staples_facilities' ), '<span class="edit-link">', '</span>' ); ?>
						</div><!-- .entry-meta -->
					</header><!-- .entry-header -->
					<div class="attachment">
						<?php staples_facilities_the_attached_image(); ?>
					</div><!-- .attachment -->

					<?php if ( has_excerpt() ) : ?>
						<div class="entry-caption">
							<?php the_excerpt(); ?>
						</div><!-- .entry-caption -->
					<?php endif; ?>
					
					<?php
						the_content();
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'staples_facilities' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						) );
					?>
				</article>
				
				<nav id="image-navigation" class="navigation image-navigation">
					<div class="nav-links">
						<?php previous_image_link( false, '<div class="previous-image">' . __( 'Previous Image', 'staples_facilities' ) . '</div>' ); ?>
						<?php next_image_link( false, '<div class="next-image">' . __( 'Next Image', 'staples_facilities' ) . '</div>' ); ?>
					</div><!-- .nav-links -->
				</nav><!-- #image-navigation -->
			<?php endwhile; ?>
		</section>
	</div>
</div>
<?php get_footer(); ?>