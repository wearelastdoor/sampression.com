                                    <?php
/*
  =================================================
  Sampression - Default Single Post Template
  =================================================
 */
get_header();
?>
<div id="content" class="clearfix">
    <section class="primary-content">
        <div class="container clearfix">
            <div class="eleven columns">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
                                <header  class="post-header">
                                            <small> <time datetime="<?php the_time('Y-m-d') ?>" pubdate><?php the_time('l , M j') ?></time> by <?php the_author() ?></small>
                                            <h1><?php the_title(); ?></h1>

                                        </header>
                                <div class="post-entry"><?php if (has_post_thumbnail()) { // Check if Featured Image exists or not ?>
<!--                                        <figure class="image-holder">-->
<!--                                            --><?php
//                                            $external_links = get_post_meta( get_the_ID(), 'wpcf-external-url', true);
//                                            if($external_links){
//                                                ?>
<!--                                                <a href="--><?php //echo $external_links; ?><!--" target="_blank">  --><?php //the_post_thumbnail('full'); ?><!-- </a>-->
<!--                                            --><?php //} else { ?>
<!--                                                --><?php //the_post_thumbnail('full'); ?>
<!--                                            --><?php //} ?>
<!--                                        </figure>-->
                                    <?php } ?><?php the_content(); ?></div>
                                <div class="social-share">
                                    <span class='st_fblike_hcount'></span>
                                    <span class='st_twitter_hcount'></span>
                                    <span class='st_facebook_hcount'></span>
                                    <span class="st_plusone_hcount"></span>
                                </div>
                            </article>
                            <?php comments_template('', true); ?>

                        <?php endwhile;
                    endif;
                    ?>
            </div>
            <?php get_sidebar();?>
        </div>
    </section>  
</div>
<!--/content-->

<?php get_footer(); ?>