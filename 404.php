<?php
/*
	=================================================
	Sampression - Default 404 Template
	=================================================
*/
get_header(); ?>

<div id="content" class="clearfix">
    <section class="primary-content">
        <div class="container clearfix">
                <article id="post-404-error" <?php post_class( 'group' ); ?>>
			<img src="<?php bloginfo( 'template_url' ); ?>/images/404.png" alt="404" class="alignleft"/>
                        <div class="entry seven columns alignleft">
                        <h2 class="with-border none">OOPS !!! PAGE NOT FOUND</h2>
                        <p>It's looking like you may have taken a wrong turn.  Don't worry... it happens to the best of us.</p>
                        <p>Here's a little map that might help you get back on track:</p>
                        <div class="red-links">
                            <a href="/home">Home /</a><a href="/contact-us"> Contact</a>
                        </div>
                        </div>
		</article>
    </div> 
    </section>
    <!--.primary-content-->
</div>
<!--#content-->
	
<?php get_footer(); ?>