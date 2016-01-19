<?php
/*
	=================================================
	Sampression - Default Features Template
 *      Template Name: Features Page
	=================================================
*/
get_header(); ?>

<section id="content" class="clearfix">
    <section class="primary-content">
        <div class="container clearfix">
            <div class="theme-features">
                 <?php
            $args = array(
                'taxonomy' => 'product_feature',
            );
            $counter = 0;
            $terms = get_categories($args);
            foreach ($terms as $term) {
                $counter++;
                ?>
                <article class="features clearfix">
                    <?php if(($counter % 2) == 0) { ?>
                    <div class="eight columns">
                                <img src="<?php echo get_term_meta($term->term_id, '_cat_image_large', true); ?>" alt="" class="aligncenter scale-with-grid"/>
                            </div>
                            <div class="eight columns entry">
                                <h2 class="heading2"><?php echo $term->name; ?></h2>
                                <p><?php echo $term->description; ?></p>
                            </div>
                    <?php }else{ ?>
                    <div class="eight columns entry">
                                <h2 class="heading2"><?php echo $term->name; ?></h2>
                                <p><?php echo $term->description; ?></p>
                            </div>
                            <div class="eight columns">
                                <img src="<?php echo get_term_meta($term->term_id, '_cat_image_large', true); ?>" alt="" class="aligncenter scale-with-grid"/>
                            </div>
                    <?php }  ?>
                </article>
                  <?php }
            ?>
            </div>
        </div>
    </section>
    <!--.primary-content-->
</section>
	
<?php get_footer(); ?>