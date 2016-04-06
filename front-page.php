<?php
/**
 * Template Name: Home Page
 */
get_header(); ?>
<div id="content" class="site-content">
	<main id="main" class="site-main">
		<div class="site-description">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Minimal WordPress Themes</h1>
						<h3 class="sub-description">We are a theme shop providing minimal responsive WordPress themes.</h3>
					</div><!-- .col-md-12 -->
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .site-description -->
		<div class="theme-block clearfix">
			<div class="container">
				<div class="row">
				<?php
				while ( have_posts() ) : the_post();

					the_content();

				endwhile; // End of the loop.
				?>
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .theme-block -->
		<div id="theme-features" class="block">
			<div class="container">
				<div class="row center">
					<?php dynamic_sidebar( 'feature-area' ); ?>
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- #features -->   
		
<?php
//get_sidebar();
get_footer();