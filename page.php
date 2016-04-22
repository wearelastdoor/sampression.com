<?php
get_header(); ?>
	<div id="content" class="site-content">
	    <main id="main" class="site-main">
	    	<?php while ( have_posts() ) : the_post(); ?>
	        <div class="page-description">
	            <div class="container">
	                <div class="row">
	                    <div class="col-md-8">
	                        <?php if(is_page(107)){ ?>
	                        	<h1>My Account</h1>
	                        	<?php }else{ ?>
	                        	<h1><?php the_title() ?></h1>
	                        	<?php } ?>
	                        <?php if( get_post_meta( get_the_ID(), 'wpcf-sub-title', true ) ) { ?>
	                        <h3 class="sub-title"><?php echo get_post_meta( get_the_ID(), 'wpcf-sub-title', true ) ?></h3>
                            <?php } ?>
	                    </div>

	                </div><!-- .row -->
	            </div><!-- .container -->
	        </div><!-- .site-description -->

	            <div class="container">
	                <div class="row">
	                    <div class="col-md-12">
	                        <h4 class="edit-account-title">Edit Your Account</h4>
	                    	<?php the_content(); ?>
	                    </div><!-- .col-md-12 -->
	                </div><!-- .row -->
	            </div>

	    	<?php endwhile; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();