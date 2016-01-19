<?php
/*
	=================================================
	Sampression - Default Blog Template
	=================================================
*/
get_header(); ?>
<div id="content" class="clearfix">
    <section class="primary-content">
      <div class="container clearfix">
        <div class="eleven columns">
            <div class="article-holder">
         <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
             $excerpt = get_the_excerpt();?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">
			<header  class="post-header">
                                <small> <time datetime="<?php the_time( 'Y-m-d' ) ?>" pubdate><?php the_time( 'l , M j' ) ?></time> by <?php the_author() ?></small>
				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

			</header>
			<div class="post-entry"> <?php  the_content();
                
                ?>
    </div>
                        <footer class="post-meta clearfix">
                                    <span class="post-category"><?php the_category(', ') ?></span>
                                    <span class="post-tags"><?php the_tags('') ?></span>
                                    <span class="post-comments"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span>
                                </footer>
            <div class="social-share">
                <span class='st_fblike_hcount'></span>
                <span class='st_twitter_hcount'></span>
                <span class='st_facebook_hcount'></span>
                <span class="st_plusone_hcount"></span>
            </div>
		</article>
		
		<?php endwhile; endif; ?>
            </div>
          <?php wp_pagenavi(); ?>
        </div>
          <?php get_sidebar();?>
      </div>
    </section>  
  </div>
  <!--/content-->
<?php get_footer(); ?>