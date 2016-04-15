<?php
/**
 * Template Name: Themes
 */
get_header(); ?>
    <div id="content" class="site-content">
        <main id="main" class="site-main">
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="page-description">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <h1><?php the_title() ?></h1>
                            <?php if( get_post_meta( get_the_ID(), 'wpcf-sub-title', true ) ) { ?>
                            <h3 class="sub-title"><?php echo get_post_meta( get_the_ID(), 'wpcf-sub-title', true ) ?></h3>
                            <?php } ?>
                        </div>

                    </div><!-- .row -->
                </div><!-- .container -->
            </div><!-- .site-description -->
            <?php
            $args = array(
                'child_of' => get_the_ID()
            );
            $childs = get_pages($args);
            foreach ($childs as $child) {
            ?>
            <div class="theme-demo">
                <div class="container">
                    <div class="row">
                        <?php
                        if( has_post_thumbnail($child->ID) ) {
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id($child->ID), 'full' );
                        ?>
                        <figure class="col-md-7 theme-screenshot">
                            <img src="<?php echo $image[0] ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id($child->ID), '_wp_attachment_image_alt', true ); ?>">
                        </figure>
                        <?php
                        }
                        ?>
                        <div class="theme-actions">
                            <h3><?php echo $child->post_title ?></h3>
                            <?php
                            if( get_post_meta( $child->ID, 'wpcf-sub-title', true ) ) {
                                echo '<p>' . get_post_meta( $child->ID, 'wpcf-sub-title', true ) . '</p>';
                            }
                            ?>
                            <div class="button-group">
                                <?php if( get_post_meta( $child->ID, 'wpcf-live-demo-url', true ) ) { ?>
                                <a href="<?php echo get_post_meta( $child->ID, 'wpcf-live-demo-url', true ) ?>" target="_blank" class="button secondary-button">Live Theme Demo</a>
                                <?php } ?>
                                <a href="<?php echo get_permalink( $child->ID ); ?>" class="button primary-button">Learn More</a>
                            </div><!-- .button-group -->
                        </div><!-- .theme-details -->
                    </div><!-- .row -->
                </div>
            </div>
            <?php
            }
            ?>
            <div class="extend-membership">
                <div class="container">
                    <div class="row">
                     <?php
                        if( has_post_thumbnail() ) {
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                        ?>
                        <figure class="col-md-6">
                            <img class="img-responsive" src="<?php echo $image[0] ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>">
                        </figure>
                        <?php
                        }
                        ?>
                        <div class="col-md-6 text-left">
                            <?php the_content() ?>
                            <div class="button-group">
                                <a href="#" class="button primary-button">SUBSCRIBE TO EXTENDED MEMBERSHIP</a>
                            </div><!-- .button-group -->
                        </div><!-- .theme-details -->
                        
                    </div><!-- .row -->
                </div>
            </div>
            <?php endwhile; ?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();