<?php
/**
 * Suspenderz header.php
 *
 * @package WordPress
 * @subpackage Suspenderz
 * @since Suspenderz 1.0
 *
 */
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<title><?php bloginfo('name'); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		
		<link rel="profile" href="http://gmpg.org/xfn/11"/>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url'); ?>" />
		
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" media="screen, print" />

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<?php wp_head();?>
	</head>

	<body <?php body_class(); ?>>
		<div class="container">
			<div class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php echo home_url(); ?>" title="<?php bloginfo('title');?>"><?php bloginfo('title');?></a>
					</div>
					<div class="navbar-collapse collapse">
						<?php 
							if ( has_nav_menu('primary') ) {
								wp_nav_menu( array(
									'menu' => 'primary',
									'theme_location'  => 'primary',
									'menu_class'      => 'nav navbar-nav',
									'depth'           => 0,
									'walker'          => new bs_menu()
								));
							}
							if ( has_nav_menu('secondary') ) {
								wp_nav_menu( array(
									'menu' => 'secondary',
									'theme_location'  => 'secondary',
									'menu_class'      => 'nav navbar-nav navbar-right',
									'depth'           => 0,
									'walker'          => new bs_menu()
								));
							} 
						?>
					</div>
				</div>
			</div>