<?php
/**
 * Loop Name: Homepage
 *
 * @package WordPress
 * @subpackage staples_facilties
 * @since staples_facilties 1.0
 *
 */
?>

<!-- #homepage-left-col -->
<div id="homepage-left-col" class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
	<!-- #homepage-slides -->
	<section id="homepage-slides" class="row">
		<div class="image-container">
			<ul id="image-slider">
				<?php 
					$homepage_slides = new WP_Query( array(
						'post_type' => array('homepageslides'),
						'orderby' => 'date',
						'order' => 'DESC',
					)); 
					while ($homepage_slides->have_posts() ) : $homepage_slides->the_post(); 
				?>
				<li id="<?php the_title() ?>" class="slide">
					<?php if( get_field('homepage_image')): ?>
						<img src="<?php the_field('homepage_image'); ?>" alt="<?php the_title(); ?>" />
					<?php endif; ?>
				</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</section>
	
	<!-- #nac-info -->
	<section id="homepage-info" class="flush row">
		<div id="nac-info" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<h3 class="block-title">NAC Information</h3>
			
			<?php 
				$nac_info = new WP_Query( array(
					'post_type' => array('nacinformation'),
					'orderby' => 'date',
					'order' => 'DESC',
					'showposts' => 1,
				)); 
				while ($nac_info->have_posts() ) : $nac_info->the_post(); 
			?>
				<div class="block-header-image">
					<?php the_post_thumbnail(); ?>
				</div>
				<article id="nac-info-<?php the_id(); ?>" <?php post_class('content'); ?>>
					<?php if( get_field('nac_primary_header')): ?>
						<h4 class="primary-header"><?php the_field('nac_primary_header'); ?></h4>
					<?php endif; ?>
					<?php if( get_field('nac_primary_content')): ?>
						<div class="entry-content"><?php the_field('nac_primary_content'); ?></div>
					<?php endif; ?>
					<?php if( get_field('nac_secondary_header')): ?>
						<h4 class="secondary-header"><?php the_field('nac_secondary_header'); ?></h4>
					<?php endif; ?>
					<?php if( get_field('nac_secondary_content')): ?>
						<div class="entry-content"><?php the_field('nac_secondary_content'); ?></div>
					<?php endif; ?>
				</article>
			<?php endwhile; ?>
		</div>
		
		<!-- #retail-info -->
		<div id="retail-info" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<h3 class="block-title">Retail Information</h3>
			<?php 
				$retail_info = new WP_Query( array(
					'post_type' => array('retailinformation'),
					'orderby' => 'date',
					'order' => 'DESC',
					'showposts' => 1,
				)); 
				while ($retail_info->have_posts() ) : $retail_info->the_post(); 
			?>
				<div class="block-header-image">
					<?php the_post_thumbnail(); ?>
				</div>
				<article id="retail-info-<?php the_id(); ?>" <?php post_class('content'); ?>>
					<?php if( get_field('retail_primary_header')): ?>
						<h4 class="primary-header"><?php the_field('retail_primary_header'); ?></h4>
					<?php endif; ?>
					<?php if( get_field('retail_primary_content')): ?>
						<div class="entry-content"><?php the_field('retail_primary_content'); ?></div>
					<?php endif; ?>
					<?php if( get_field('retail_secondary_header')): ?>
						<h4 class="secondary-header"><?php the_field('retail_secondary_header'); ?></h4>
					<?php endif; ?>
					<?php if( get_field('retail_secondary_content')): ?>
						<div class="entry-content"><?php the_field('retail_secondary_content'); ?></div>
					<?php endif; ?>
				</article>
			<?php endwhile; ?>
		</div>
	</section>
</div>

<!-- #homepage-right-col -->
<div id="homepage-right-col" class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

	<!-- #videos -->
	<section id="homepage-videos" class="row">
		<div id="featured-video" class="row">
			<h3 class="block-title">Videos</h3>
			<?php 
				$featured_video_query = new WP_Query( array(
					'post_type' => array('video'),
					'tag' => 'featured-video',
					'showposts' => 1,
				)); 
				while ($featured_video_query->have_posts() ) : $featured_video_query->the_post(); 
			?>
				<article class="video" id="featured-<?php the_id(); ?>" <?php post_class('content'); ?>>
					<?php if( get_field('video_embed')): ?>
						<div class="video-container responsive"><?php the_field('video_embed'); ?></div>
					<?php endif; ?>
					<?php if( get_field('video_description')): ?>
						<div class="entry-content"><?php the_field('video_description'); ?></div>
					<?php endif; ?>
				</article>
			<?php endwhile ?>
		</div>
		<div class="divider"></div>
		<h4 class="block-title more">More Videos</h4>
		<div id="homepage-video-gallery" class="row">
			<?php 
				$homepage_video_gallery = new WP_Query( array(
					'post_type' => array('video'),
					'tag' => 'homepage-gallery',
					'showposts' => 4,
				)); 
				while ($homepage_video_gallery->have_posts() ) : $homepage_video_gallery->the_post(); 
			?>
				<div id="video-<?php the_id(); ?>" class="row video-item">
					<?php if( get_field('video_poster')): ?>
						<a class="video-poster thumb col-lg-6 col-md-6 col-sm-12 col-xs-12" href="<?php the_permalink(); ?>">
							<img src="<?php the_field('video_poster'); ?>" alt="<?php the_title(); ?>" />
						</a>
					<?php endif; ?>
					<div class="video-content col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
						<?php if( get_field('video_description')): ?>
							<div class="entry-content "><?php the_field('video_description'); ?></div>
						<?php endif; ?>
					</div>
				</div>
			<?php endwhile ?>
			<div class="video-more">
				<a href="/videos">Go to Video Page</a>
			</div>
		</div>
	</section>
	
	<!-- #homepage-widget -->
	<div id="homepage-widget">
		<?php dynamic_sidebar('homepage-widget'); ?>
	</div>

</div>
