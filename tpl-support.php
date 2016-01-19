<?php
/*
  =================================================
  Sampression - Default Page Template
 * Template Name: Support Page
  =================================================
 */
get_header();
?>
<div id="content" class="clearfix">
    <section class="primary-content">
        <div class="container clearfix">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                   <div class="txt-block-wrap">
                       <?php
                       $support_title = lds_get_post_meta($post->ID, 'txt_bw_title');
    $support_link = lds_get_post_meta($post->ID, 'txt_bw_link');
    $support_description = lds_get_post_meta($post->ID, 'txt_bw_description');
    $support_icon = lds_get_post_meta($post->ID, 'txt_icon');
    $support_link_text = lds_get_post_meta($post->ID, 'txt_bw_link_text');
        for ($i = 0; $i < count($support_title); $i++) {
    ?>
              	<div class="eight columns">
             <div class="txt-block">
                           <span class="text-center <?php echo $support_icon[$i]; ?>"></span>
                        <h3><?php echo $support_title[$i]; ?></h3>
                      <p> <?php echo $support_description[$i]; ?> </p> 
                      <a class="button gform_button btn red-btn" id="proceed-btn" href="<?php echo $support_link[$i]; ?>"><?php echo $support_link_text[$i];  ?><i class="icon-arrow-triangle"></i></a>
                      </div>     
              </div>
        <?php } ?>
              	
              </div><!--/txt-block-wrap-->
    <?php endwhile;
endif; ?>
        </div> 
    </section>
    <!--.primary-content-->
</div>
<!--#content-->

<?php get_footer(); ?>