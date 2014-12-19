<?php
/**
 * staples_facilties footer.php
 *
 * @package WordPress
 * @subpackage staples_facilties
 * @since staples_facilties 1.0
 *
 */
 ?>

			</div><!-- /#main-container -->
		</div><!-- /#site -->
		<footer class="container">
			<?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>

				<div class="row">
					<?php dynamic_sidebar('footer-sidebar'); ?>
				</div>
			
			<?php endif; ?>
			<div class="footer-bottom row">
				<p>Facilities Management Contact: 866-888-4321</p>
			</div>
		</footer>
		<?php wp_footer(); ?>
		 <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-57866837-1', 'auto');
			ga('send', 'pageview');
		</script>
	</body>
</html>