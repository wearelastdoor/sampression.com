<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header id="masthead" class="site-header">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="site-branding">
						<a href="<?php bloginfo( 'wpurl' ); ?>" rel="home">
							<img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" onerror="this.src='<?php echo get_template_directory_uri(); ?>/images/logo.png'; this.onerror=null;" alt="<?php bloginfo( 'name' ); ?>" />
						</a>
					</div><!-- .site-branding -->
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
				</div><!-- .col-md-4 -->
				<div class="col-md-8">
					<nav id="primary-nav" class="navbar">
						<div id="primary-navbar-collapse-1" class="collapse navbar-collapse">
						<?php
		                wp_nav_menu(
		                    array(
		                        'theme_location' => 'primary',
		                        'container' => '',
		                        'menu_class' => 'nav navbar-nav'
		                    )
		                );
		                ?>
						</div>
					</nav>
				</div><!-- .col-md-8 -->
			</div><!-- .row -->
		</div><!-- .container -->
	</header><!-- #masthead -->