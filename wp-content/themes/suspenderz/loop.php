<?php
/**
 * Suspenderz loop.php
 *
 * @package WordPress
 * @subpackage Suspenderz
 * @since Suspenderz 1.0
 *
 */
?>

<?php 
   // No posts to show, the famous 404 error message
   if ( ! have_posts() ) :
?>
   <article id="post-0" class="post error404 not-found content">
      <h1 class="entry-title"><?php _e( 'Not Found', 'suspenderz' ); ?></h1>
      <section class="entry-content">
					<p><?php _e( 'Please contact us, or try a search below to find what you are looking for:', 'suspenderz' ); ?></p>
         <?php get_search_form(); ?>
      </section>
   </article>
<?php endif; ?>

<?php
	// Makes all Posts Display in Ascending Order
	global $query_string;
	query_posts( $query_string . '&order=DESC' ); 

	// The suspenderz loop
	while ( have_posts() ) : the_post();
	// If it's an archive or search result
	if ( is_home() || is_archive() || is_search() ) : ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('content'); ?>>
			<header>
				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>" title="<?php echo __('Permalink to ', 'suspenderz'); the_title(); ?>" rel="bookmark">
						<?php the_title(); ?>
					</a>
				</h2>
			</header>
			<section class="entry-content excerpt">
				<?php the_excerpt(); ?>
			</section>
		</article>
	<!-- Page Loop -->
	<?php elseif (is_page()) : ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('content'); ?>>
				<header>
					<h1 class="page-title"><?php the_title(); ?></h1>
				</header>
				<section class="entry-content entry">
					<?php the_content(); ?>
				</section>
				
		</article>
	<!-- Else Loop -->
	<?php else : ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('content'); ?>>
				<header>
					<h1 class="page-title"><?php the_title(); ?></h1>
				</header>
				<section class="entry-content entry">
					<?php the_content(); ?>
				</section>
				
		</article>
	<?php endif; ?>
<?php endwhile ?>