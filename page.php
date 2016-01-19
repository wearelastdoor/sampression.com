<?php
/*
  =================================================
  Sampression - Default Page Template
  =================================================
 */
get_header();
?>
<div id="content" class="clearfix">
    <section class="primary-content">
        <div class="container clearfix">
            <div class="sixteen columns">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
    <?php endwhile;
endif; ?>
                </div>
        </div> 
    </section>
    <!--.primary-content-->
</div>
<!--#content-->

<?php get_footer(); ?>