<?php
/**
 * Loop Name: Featured Video
 *
 * @package WordPress
 * @subpackage staples_facilties
 * @since staples_facilties 1.0
 *
 */

?>
<div class="row">
	<?php 
		$video_query = new WP_Query( array(
			'post_type' => array('video'),
			'tag' => 'featured-video',
			'showposts' => 1,
		)); 
		while ($video_query->have_posts() ) : $video_query->the_post(); 
	?>
	<article id="featured-<?php the_ID(); ?>" <?php post_class('content'); ?>>
		<h5 class="type"><?php echo get_the_term_list( $post->ID, 'type');?></h5>
		<?php if( get_field('video_embed')): ?>
			<div class="video-container large"><?php the_field('video_embed'); ?></div>
		<?php endif; ?>
		<h5 class="entry-title"><?php the_title();?></h5>
		<?php if( get_field('video_description')): ?>
			<div class="entry-content"><?php the_field('video_description'); ?></div>
		<?php endif; ?>
	</article>
	<?php endwhile ?>
</div>
