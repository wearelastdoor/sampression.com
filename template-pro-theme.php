<?php

/**
 * Template Name: Pro Theme
 */

get_header();
while ( have_posts() ) : the_post();
?>
<div id="content" class="site-content">
        <main id="main" class="site-main">
         <div class="site-description">
            <div class="container">
              <div class="row">
                <?php get_sidebar() ?>
              </div><!-- .row -->
            </div><!-- .container -->
          </div><!-- .site-description -->
           <div class="theme-block clearfix">
            <div class="container">
              <div class="row">
              <?php
              if( has_post_thumbnail() ) {
              	$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
              	$alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
              ?>
                <figure class="left">
                  <img src="<?php echo $image[0]; ?>" alt="<?php echo $alt; ?>">
                </figure>
                <?php } ?>
                 <div class="theme-details">
                   <?php the_excerpt() ?>
                 </div><!-- .theme-details -->
                </div><!-- .row -->
            </div><!-- .container -->
           </div><!-- .theme-block -->
           <div class="theme-features">
              <div class="container theme-feature-section">
                <div class="row center">
                   <div class="col-md-12">
					<?php
					$content = sampression_split_more_content();
					echo $content[0];
					?>
                    
                   </div><!-- .col-md-12 -->
                </div><!-- .row -->
            </div><!-- .container -->
            <div class="theme-feature-section">
              <?php echo $content[1]; ?>
            </div><!-- .theme-feature-section -->
            <div class="container theme-feature-section">
            <?php echo $content[2]; ?>
                
            </div><!-- .container -->
          </div><!-- #features -->   
          <div class="subscription-block inverse">
           <div class="container">
             <div class="row">
               <div class="col-md-12">
                 <h4>Claim your 30% Discount Today</h4>
                 <div class="gf_browser_chrome gform_wrapper gplaceholder_wrapper" id="gform_wrapper_1"><a id="gf_1" class="gform_anchor"></a><form method="post" enctype="multipart/form-data" target="gform_ajax_frame_1" id="gform_1" class="gplaceholder" action="/#gf_1">
                        <div class="gform_body">
                          <ul id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below">
                             <li id="field_1_1" class="gfield gfield_contains_required field_sublabel_below field_description_below"><label class="gfield_label" for="input_1_1" style="display: none;">Enter your email address…<span class="gfield_required">*</span></label><div class="ginput_container ginput_container_email">
                            <input name="input_1" id="input_1_1" type="text" value="" class="medium" tabindex="103" placeholder="Enter your email address…">
                             </div>
                           </li>
                        </ul></div>
                          <div class="gform_footer top_label"> 
                          <input type="submit" id="gform_submit_button_1" class="gform_button button" value="Subscribe To Our Newsletter" tabindex="104"> 
                             <span class="spam-note">We hate spam, as much as you do.</span>
                          </div>
                        </form>
                   </div>
               </div><!-- .col-md-12 -->
              </div><!-- .row -->
            </div><!-- .container -->
          </div><!-- .subscription-block -->
        </main><!-- #main -->
    
  </div><!-- #content -->
<?php
endwhile;
get_footer();


// var td = jQuery('.acf-field-56826fd104114 table.acf-table td.copy-price').length;
// td = td - 2;
// jQuery('.acf-field-56826fd104114 table.acf-table td.copy-price').each(function( index, value ) {
// 	if(index == td) {
// 		jQuery(this).children('.acf-input').children('.acf-input-wrap').children('input').val('12345');
// 	}
// });
// 

/*
 * Force URLs in srcset attributes into HTTPS scheme.

function ssl_srcset( $sources ) {
	if(	! is_array( $sources ) )
		return $sources;

	foreach ( $sources as &$source ) {
		$source['url'] = set_url_scheme( $source['url'], 'https' );
	}
	return $sources;
}
add_filter( 'wp_calculate_image_srcset', 'ssl_srcset' );
 */
/**
 * Force https scheme on srcset urls

add_filter( 'wp_calculate_image_srcset', function( $sources )
{
    if(	! is_array( $sources ) )
       	return $sources;

    foreach( $sources as &$source )
    {
        if( isset( $source['url'] ) )
            $source['url'] = set_url_scheme( $source['url'], 'https' );
    }
    return $sources;

}, PHP_INT_MAX );
 */