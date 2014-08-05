<?php
/**
 * staples_facilties header.php
 *
 * @package WordPress
 * @subpackage staples_facilties
 * @since staples_facilties 1.0
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
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <![endif]-->
        <?php wp_head();?>
    </head>

    <body <?php body_class(); ?> >
        <div id="site">
            <header id="header" class="navbar navbar-default container" role="navigation">
				<div class="header-top">
					<div class="left-column col-lg-2 col-md-2 col-sm-2 col-xs-2">
						<img id="staples-logo" src="<?php bloginfo('template_url'); ?>/images/staples-logo.png"/>
					</div>
					<div class="center-column col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<div class="branding row">
							<h1 class="site-title">
								<a href="<?php echo home_url(); ?>" title="<?php bloginfo('title');?>"><?php bloginfo('title');?></a>
								<span class="site-tag"><?php bloginfo('description');?></span>
							</h1>
						</div>
						<div class="header-info">
							<p>24x7 Building Issues: 866-888-4321</p>
							<p>24x7 Conveyor Equipment Issues: 888-438-4800</p>
						</div>
						<img id="flags" src="<?php bloginfo('template_url'); ?>/images/flags.png"/>
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle sidebarigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="right-column col-lg-2 col-md-2 col-sm-2 col-xs-2">
						<img id="toolbox" src="<?php bloginfo('template_url'); ?>/images/toolbox.png"/>
					</div>
				</div>
                <div class="navbar-collapse collapse flush">
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
            </header>
			<div id="main-content" class="container">