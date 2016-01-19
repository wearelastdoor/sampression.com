<?php
/* ======================================================================= */

// Custom Menus
/* ======================================================================= */
function h5bs_register_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Navigation'),
        'secondary' => __('Secondary Navigation'),
        'tertiary' => __('Tertiary Navigation')
    ));
}

add_action('init', 'h5bs_register_menus');

function h5bs_primary_nav() {
    wp_nav_menu(array(
        'container' => false, // remove nav container
        'menu' => 'Primary Nav', // nav name
        'menu_id' => 'nav-main', // custom id
        'menu_class' => 'main-nav', // custom class
        'theme_location' => 'primary', // where it's located in the theme
        'before' => '', // before the menu
        'after' => '', // after the menu
        'link_before' => '', // before each link
        'link_after' => '', // after each link
        'depth' => 0, // set to 1 to disable dropdowns
        'fallback_cb' => 'h5bs_primary_nav_fallback'   // fallback function
    ));
}

function h5bs_secondary_nav() {
    wp_nav_menu(array(
        'container' => false, // remove nav container
        'menu' => 'Secondary Nav', // nav name
        'menu_id' => 'nav-sub', // custom id
        'menu_class' => 'nav group', // custom class
        'theme_location' => 'secondary', // where it's located in the theme
        'before' => '', // before the menu
        'after' => '', // after the menu
        'link_before' => '', // before each link
        'link_after' => '', // after each link
        'depth' => 0, // set to 1 to disable dropdowns
        'fallback_cb' => 'h5bs_secondary_nav_fallback' // fallback function
    ));
}

function h5bs_primary_nav_fallback() {
    wp_page_menu(array(
        'menu_class' => 'main-nav twelve columns',
        'include' => '',
        'exclude' => '',
        'link_before' => '',
        'link_after' => '',
        'show_home' => true
    ));
}

function h5bs_secondary_nav_fallback() {
    wp_page_menu(array(
        'menu_class' => 'nav group',
        'include' => '',
        'exclude' => '',
        'link_before' => '',
        'link_after' => '',
        'show_home' => true
    ));
}

/* ======================================================================= */
// Image Thumbnails
/* ======================================================================= */
add_theme_support('post-thumbnails');
/* ======================================================================= */
// Post formats
/* ======================================================================= */
add_theme_support('post-formats', array('aside', 'image', 'gallery', 'video', 'quote', 'link', 'status', 'audio', 'chat'));

add_filter('excerpt_more','__return_false');

/* ======================================================================= */

// Remove junk from head
/* ======================================================================= */

function h5bs_remove_junk() {
    // Really Simple Discovery
    remove_action('wp_head', 'rsd_link');
    // Windows Live Writer
    remove_action('wp_head', 'wlwmanifest_link');
    // WP Version
    remove_action('wp_head', 'wp_generator');
}

add_action('init', 'h5bs_remove_junk');

/* ======================================================================= */

// Enqueue Global Scripts
/* ======================================================================= */
function h5bs_enqueue_scripts() {
//wp_deregister_script( 'jquery' ); // Load Jquery from Google CDN instead
//wp_register_script( 'jquery', get_template_directory_uri() . '/lib/js/jquery-1.7.1.min.js', array(), '1.7.1', true );
wp_register_script('modernizr', get_template_directory_uri() . '/lib/js/modernizr.js', array(), '2.6.1', false);
wp_register_script('plugins', get_template_directory_uri() . '/lib/js/plugins.js', array('jquery'), '1.0', true);
wp_register_script('sticky', get_template_directory_uri() . '/lib/js/floatbox.js', array('jquery'), '1.0', true);
wp_register_script('main-js', get_template_directory_uri() . '/lib/js/main.js', array('jquery'), '1.0', true);

wp_enqueue_script('modernizr');
wp_enqueue_script('plugins');
wp_enqueue_script('sticky');
wp_enqueue_script('main-js');
}

add_action('wp_enqueue_scripts', 'h5bs_enqueue_scripts');

function sampression_login_stylesheet() {
    wp_enqueue_script( 'jquery');
    wp_enqueue_style( 'custom-login-css', get_template_directory_uri() . '/lib/css/style-login.css' );
    wp_enqueue_script( 'custom-login-js', get_template_directory_uri() . '/lib/js/sampression-login.js', array('jquery'), '1.0', false );
}
add_action( 'login_enqueue_scripts', 'sampression_login_stylesheet' );

/* ======================================================================= */

// Sidebars & Widgetizes Areas
/* ======================================================================= */
function h5bs_register_sidebars() {
    register_sidebar(array(
        'id' => 'primary-widget-area',
        'name' => 'Primary Widget',
        'description' => 'The Primary Widget Area',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));


    register_sidebar(array(
        'id' => 'footer-widget-area',
        'name' => 'Footer Widget',
        'description' => 'The Footer Widget Area',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));


    register_sidebar(array(
        'id' => 'woocommerce-widget',
        'name' => 'Woocommerce Widget Area',
        'description' => 'The Woocommerce  sidebar.',
        'before_widget' => '<div id="%1$s" class="widget widget-container %2$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2><div class="widget-entry">',
    ));
}

add_action('widgets_init', 'h5bs_register_sidebars');

/* ======================================================================= */

// dynamic classes and body IDs
/* ======================================================================= */
function dynamicClass() {

    global $post;
    
    $page_slug = $post->post_name;

    if (!empty($post->post_parent)) {
        $parent = get_post($post->post_parent);
        $parent_slug = $parent->post_name;
        $class = "$parent_slug $page_slug";
    } else {
        $class = "$page_slug";
    }

    return $class;
}

function pageID() {
    global $post;
    return $post->post_name;
}

function dynamicBody() {
    if(!is_404()) {
        $dynamic_class = dynamicClass();
        $page_id = pageID();
    }
    $classes = get_body_class(false);
    $default_classes = implode(" ", $classes);

    if (is_front_page()) {
        echo 'id="home" class="' . $default_classes . '"';
    } elseif (is_home()) {
        // echo 'id="blog"';
        echo 'id="blog" class="interior ' . $dynamic_class . ' ' . $default_classes . '"';
    } elseif (is_single()) {
        echo 'id="blog" class="interior ' . $dynamic_class . ' ' . $default_classes . '"';
    } elseif (is_archive()) {
        //echo 'id="blog" class="archive"';
        echo 'id="blog" class="interior ' . $dynamic_class . ' ' . $default_classes . '"';
    } elseif (is_search()) {
        //echo 'id="search"';
        echo 'id="search" class="interior ' . $dynamic_class . ' ' . $default_classes . '"';
    } elseif(is_404()) { 
        echo ' class="interior ' . $default_classes . '"';
    } else {
        echo 'id="' . $page_id . '" class="interior ' . $dynamic_class . ' ' . $default_classes . '"';
    }
}

/* ======================================================================= */
/** https://github.com/blineberry/Improved-HTML5-WordPress-Captions * */
// Removes inline styling from wp-caption and changes to HTML5 figure/figcaption
/* ======================================================================= */

add_filter('img_caption_shortcode', 'h5bs_img_caption_shortcode_filter', 10, 3);

function h5bs_img_caption_shortcode_filter($val, $attr, $content = null) {
    extract(shortcode_atts(array(
        'id' => '',
        'align' => '',
        'width' => '',
        'caption' => ''
                    ), $attr));

    if (1 > (int) $width || empty($caption))
        return $val;

    return '<figure id="' . $id . '" class="wp-caption ' . esc_attr($align) . '" style="width: ' . $width . 'px;">'
            . do_shortcode($content) . '<figcaption class="wp-caption-text">' . $caption . '</figcaption></figure>';
}

/* ======================================================================= */
//woocommerce section
/* ======================================================================= */


add_theme_support('woocommerce');

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
/**
 * WooCommerce Product Thumbnail
 * */
if (!function_exists('woocommerce_template_loop_product_thumbnail')) {

    function woocommerce_get_product_thumbnail() {
        global $post, $woocommerce;
        $output = ' <figure class="image-holder" style="min-height:182px;">';
        if (has_post_thumbnail()) {
            $output .= '<img src="' . get_template_directory_uri() . '/timthumb/timthumb.php?src=' . wp_get_attachment_url(get_post_thumbnail_id()) . '&w=420&h=275" alt="Placeholder"/>';
        }
        $output .= '</figure>';
        return $output;
    }

}

add_filter('loop_shop_per_page', create_function('$cols', 'return -1;'), 20);

//add_filter('woocommerce_is_sold_individually', 'wc_remove_all_quantity_fields', 10, 2);
//
//function wc_remove_all_quantity_fields($return, $product) {
//    return( true );
//}
/**
 * To remove buy now button from product loop
 */
function remove_loop_button() {
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
}
//add_action('init', 'remove_loop_button');


/**
 * To disable woocommerce tabs 
 */
add_filter('woocommerce_product_tabs', 'sb_woo_remove_reviews_tab', 98);

function sb_woo_remove_reviews_tab($tabs) {

    unset($tabs['reviews']);
    unset($tabs['description']);

    return $tabs;
}

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);


/**
 * To disable breadcrumbs in Woocommerce, 
 */
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10, 0);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30, 0);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20, 0);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10, 0);
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_price', 10, 0);

//Reposition WooCommerce breadcrumb
function lds_woo_custom_breadcrumb() {
    $args = apply_filters( 'woocommerce_breadcrumb_defaults',
        array(
            'delimiter'   => ' &gt; ',
            'wrap_before' => '',
            'wrap_after'  => '',
            'before'      => '',
            'after'       => '',
            'home'        => 'Sampression',
        )
    );
    woocommerce_breadcrumb( $args );
}
add_action( 'lds_woo_breadcrumb', 'lds_woo_custom_breadcrumb' );

/**
* Custom Add To Cart Messages
* Add this to your theme functions.php file
**/

add_filter( 'woocommerce_add_to_cart_message', 'woocommrece_custom_add_to_cart_message' );
function woocommrece_custom_add_to_cart_message() {
global $woocommerce;
// Output success messages

if (get_option('woocommerce_cart_redirect_after_add')=='yes') :
$return_to = get_permalink(woocommerce_get_page_id('shop'));// Give the url, you want to redirect
$message = sprintf('<a href="%s" class="button">%s</a> %s', $return_to, __('Continue Shopping &rarr;', 'woocommerce'), __('Theme was successfully added to your cart.', 'woocommerce') );
else :
$message = sprintf('<a href="%s" class="button">%s</a> %s', get_permalink(woocommerce_get_page_id('cart')), __('View Cart &rarr;', 'woocommerce'), __('Theme was successfully added to your cart.', 'woocommerce') );
endif;
return $message;
}

/* Custom Add To Cart Messages */

/* Load Script for Uploading */
/* ======================================================================= */

function enqueue_admin_scripts() {
    wp_register_script('admin-script', get_template_directory_uri() . '/lib/js/custom-admin-script.js', array('jquery'), '1.0', true); //, 'thickbox', 'media-upload'
    wp_enqueue_media();
    wp_enqueue_script('admin-script');
}

add_action('admin_print_scripts', 'enqueue_admin_scripts');

/* Stylesheet for Admin only */
/* ======================================================================= */

function enqueue_admin_style() {
    wp_enqueue_style('custom-admin-style', get_template_directory_uri() . '/lib/css/custom-admin-style.css', false, false, 'screen');
}

add_action('admin_print_styles', 'enqueue_admin_style');

/* ======================================================================= */

//adding extra filed on taxonomy product_feature
/* ======================================================================= */
function _cat_add_page($tag) {
    ?>
    <div class="form-field">
        <label for="feature_excerpt">Excerpt</label>
        <textarea cols="40" rows="5" id="feature_excerpt" name="feature_excerpt"></textarea>
        <p>The description is for excerpt.</p>
    </div>
    <div class="form-field">
        <label for="feature_icon">Icon Slug</label>
        <input id="feature_icon" type="text" size="40" value="" name="feature_icon">
        <p>The icon slug to show icon</p>
    </div>

    <?php
}

add_action('product_feature_add_form_fields', '_cat_add_page', 10, 1);

function _cat_edit_page($tag) {
    ?>
    <tr class="form-field">
        <th valign="top" scope="row"><label for="feature_excerpt">Excerpt</label></th>
        <td><textarea class="large-text" cols="20" rows="2" id="feature_excerpt" name="feature_excerpt"><?php echo get_term_meta($tag->term_id, 'feature_excerpt', true); ?></textarea><br>
            <span class="description">The description is for excerpt.</span></td>
    </tr>
    <tr class="form-field">
        <th valign="top" scope="row"><label for="feature_icon">Icon Slug</label></th>
        <td><input type="text" size="40" id="feature_icon" name="feature_icon" value="<?php echo get_term_meta($tag->term_id, 'feature_icon', true); ?>"><br>
            <span class="description">The icon slug to show icon</span></td>
    </tr>


    <?php
}

add_action('product_feature_edit_form_fields', '_cat_edit_page', 10, 1);

add_action("created_product_feature", 'save_tax_metadata', 10, 1);
add_action("edited_product_feature", 'save_tax_metadata', 10, 1);

function save_tax_metadata($term_id) {
    if (isset($_POST['feature_icon'])) {
        update_term_meta($term_id, 'feature_icon', esc_attr($_POST['feature_icon']));
        update_term_meta($term_id, 'feature_excerpt', esc_attr($_POST['feature_excerpt']));
    }
}

/* ======================================================================= */
//Activate BBpress template
/* ======================================================================= */

//add_theme_support('bbpress');

/* ======================================================================= */

//function for  taxonomy slug
/* ======================================================================= */
function sam_get_category_slug($id, $category) {
    $my_terms = get_the_terms($id, $category);
    if ($my_terms && !is_wp_error($my_terms)) {
        $output = array();
        foreach ($my_terms as $term) {
            $output[] = $term->slug;
        }
        return implode(' ', $output);
    }
}

function gpm($pid, $cf) {
    return get_post_meta($pid, $cf, true);
}

add_action("admin_init", "admin_init");

function admin_init() {
    if (isset($_GET['post']) && $_GET['post'] != '') {
        add_meta_box("changelog_options", "Change Log Options", "build_acc", "product", "advanced", "default");
    }
     if(isset($_GET['post']) && get_post_meta($_GET['post'], '_wp_page_template', true) == 'tpl-support.php') { 
	add_meta_box("support_page", "Support Options", "build_support_options", "page", "advanced", "default");
    }
}

function build_support_options() {
    global $post;
    $support_title = $support_description = $support_icon = $support_link = $support_link_text = array();
    $support_title = lds_get_post_meta($post->ID, 'txt_bw_title');
    $support_link = lds_get_post_meta($post->ID, 'txt_bw_link');
    $support_description = lds_get_post_meta($post->ID, 'txt_bw_description');
    $support_icon = lds_get_post_meta($post->ID, 'txt_icon');
    $support_link_text = lds_get_post_meta($post->ID, 'txt_bw_link_text');
    ?>
    <fieldset class="fieldset-1">
        <legend>Product Options</legend>
        <ol type="1" id="clone-input-list" class="clonedInput">
    <?php
    if (count($support_title) > 0 && $support_title[0] != '') {
        for ($i = 0; $i < count($support_title); $i++) {
            ?>
                    <li class="clone-section group">
                        <div class="field-section">
                            <div class="group">
                                <label>Title</label>
                                <input class="text_field large" type="text" name="txt_bw_title[]" value="<?php echo $support_title[$i]; ?>" />
                            </div>
                            <div class="group">
                                <label>Description</label>
                                <textarea class="text_field" name="txt_bw_description[]"><?php echo $support_description[$i]; ?></textarea>
                            </div>
							<div class="group">
                                <label>Link</label>
                                <input class="text_field large" type="text" name="txt_bw_link[]" value="<?php echo $support_link[$i]; ?>" />
                            </div>
                            <div class="group">
                                <label>Link Text</label>
                                <input class="text_field large" type="text" name="txt_bw_link_text[]" value="<?php echo $support_link_text[$i]; ?>" />
                            </div>
                            <div class="group">
                                <label>Icon Slug</label>
                                <input class="text_field large" type="text" name="txt_icon[]" value="<?php echo $support_icon[$i]; ?>" />
                            </div>
                        </div>
                        <span class="btn-remove" style="cursor:pointer;">Remove</span>
                    </li>
            <?php
        }
    } else {
        ?>
                <li class="clone-section group">
                    <div class="field-section">
                        <div class="group">
                            <label>Title</label>
                            <input class="text_field large" type="text" name="txt_bw_title[]" />
                        </div>
                        <div class="group">
                            <label>Description</label>
                            <textarea class="text_field" name="txt_bw_description[]"></textarea>
                        </div>
						<div class="group">
                                <label>Link</label>
                                <input class="text_field large" type="text" name="txt_bw_link[]" />
                            </div>
                        <div class="group">
                                <label>Link Text</label>
                                <input class="text_field large" type="text" name="txt_bw_link_text[]" />
                            </div>
                        <div class="group">
                            <label>Icon Slug</label>
                            <input class="text_field large" type="text" name="txt_icon[]" />
                        </div>
                    </div>
                    <span class="btn-remove" style="cursor:pointer;">Remove</span>
                </li>
        <?php
    }
    ?>
        </ol>
        <div class="add-more-section">
            <span class="btn-add" style="cursor:pointer;">+ Add More</span>
        </div>
    </fieldset>

    <?php
}


function build_acc() {
    global $post;
    $changelog_title = $changelog_cnt = array();
    $changelog_title = lds_get_post_meta($post->ID, 'txt_changelog_title');
    $changelog_cnt = lds_get_post_meta($post->ID, 'txt_changelog_cnt');
    ?>
    <fieldset class="fieldset-1">
        <legend>Change log</legend>
        <ol type="1" id="clone-input-list" class="clonedInput">
            <?php
            if (count($changelog_title) > 0 && $changelog_title[0] != '') {
                for ($i = 0; $i < count($changelog_title); $i++) {
                    ?>
                    <li class="clone-section group">
                        <div class="field-section">
                            <div class="group">
                                <label>Change log Title</label>
                                <input class="text_field small" type="text" name="txt_changelog_title[]" value="<?php echo $changelog_title[$i]; ?>" />
                            </div>
                        </div>
                        <div class="field-section">
                            <div class="group">
                                <label>Change log Content</label>
                                <textarea name="txt_changelog_cnt[]"  class="large-text" cols="50" rows="5"><?php echo $changelog_cnt[$i]; ?></textarea>
                            </div>
                        </div>
                        <span class="btn-remove" style="cursor:pointer;">Remove</span>
                    </li>
                    <?php
                }
            } else {
                ?>
                <li class="clone-section group">
                    <div class="field-section">
                        <div class="group">
                            <label>Change log Title</label>
                            <input class="text_field small" type="text" name="txt_changelog_title[]" />
                        </div>
                    </div>
                    <div class="field-section">
                        <div class="group">
                            <label>Change log Content</label>
                            <textarea name="txt_changelog_cnt[]"  class="large-text" cols="50" rows="5"></textarea>
                        </div>
                    </div>
                    <span class="btn-remove" style="cursor:pointer;">Remove</span>
                </li>
                <?php
            }
            ?>
        </ol>
        <div class="add-more-section">
            <span class="btn-add" style="cursor:pointer;">+ Add More</span>
        </div>
    </fieldset>
    <?php
}

function save__custom_fields() {
    global $post;
    if ($post) {
        $types = array('page', 'product');
        if (in_array(get_post_type($post->ID), $types)) {
            foreach ($_POST as $key => $value) {
                if (substr($key, 0, 4) == 'txt_') {
                    delete_post_meta($post->ID, $key);
                }
            }
            foreach ($_POST as $key => $value) {
                if (substr($key, 0, 4) == 'txt_') {
                    if (is_array($_POST[$key])) {
                        foreach ($_POST[$key] as $val) {
                            add_post_meta($post->ID, $key, $val);
                        }
                    } else {
                        add_post_meta($post->ID, $key, $value);
                    }
                }
            }
        }
    }
}

add_action('save_post', 'save__custom_fields');

function lds_get_post_meta($post_id, $meta_key) {
    global $wpdb;
    $q = "SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = \"$meta_key\" AND post_id = $post_id ORDER BY meta_id ASC";
    $pageposts = $wpdb->get_results($q, OBJECT);
    $return = array();
    foreach ($pageposts AS $key => $val) {
        $return[] = $val->meta_value;
    }
    return $return;
}

/* =======================================================================
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own sampression_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Eleven 1.0
 * ======================================================================= */

if (!function_exists('sampression_comment')) :

    function sampression_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) :
            case 'pingback' :
            case 'trackback' :
                ?>
                <li class="post pingback">
                    <p><?php _e('Pingback:', 'sampression'); ?> <?php comment_author_link(); ?><?php edit_comment_link(__('Edit', 'sampression'), '<span class="edit-link">', '</span>'); ?></p>
                    <?php
                    break;
                default :
                    ?>
                <li <?php comment_class('clearfix'); ?> id="li-comment-<?php comment_ID(); ?>">
                    <article id="comment-<?php comment_ID(); ?>" class="post-comments">
                        <div class="avatar-wrapper">
                            <span class="pointer"></span>
                            <div class="avatar-holder">
                                <div class="avatar-shadow"></div>
                                <?php
                                // Get Avatar
                                $avatar_size = 60;
                                if ('0' != $comment->comment_parent)
                                    $avatar_size = 60;

                                echo get_avatar($comment, $avatar_size);
                                ?>
                            </div>
                            <!-- .avatar -->
                        </div>
                        <!-- .col-2 -->
                        <div class="comment-wrapper">
                            <div class="comment-entry">
                                <header class="comment-meta clearfix">
                                    <div class="comment-author">
                                        <?php
                                        /* translators: 1: comment author, 2: date and time */
                                        printf(__('%1$s %2$s', 'sampression'), sprintf('<span class="fn">%s</span>', get_comment_author_link()), sprintf('<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>', esc_url(get_comment_link($comment->comment_ID)), get_comment_time('c'),
                                                        /* translators: 1: date, 2: time */ sprintf(__('<span class="date-details">%1$s</span>'), get_comment_date(), get_comment_time(''))
                                                )
                                        );
                                        ?>

                                        <?php edit_comment_link(__('Edit', 'sampression'), '<span class="edit-link">', '</span>'); ?>
                                    </div><!-- .comment-author  -->		
                                </header>

                                        <?php if ($comment->comment_approved == '0') : ?>
                                    <div class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'sampression'); ?></div>
                                        <?php endif; ?>



                                <div class="comment-content"><?php comment_text(); ?></div>
                                <div class="reply">
                                <?php comment_reply_link(array_merge($args, array('reply_text' => __('Reply <span>&darr;</span>', 'sampression'), 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                                </div><!-- .reply -->
                            </div>
                        </div>
                        <!-- .col-2 -->


                    </article><!-- #comment-## -->

                <?php
                break;
        endswitch;
    }

endif;

/*function bm_bbp_no_breadcrumb($param) {

    return true;
}

add_filter('bbp_no_breadcrumb', 'bm_bbp_no_breadcrumb');*/


/*=======================================================================*/
// Client Options Page
/*=======================================================================*/

function my_search_filter($query) {
    if (!is_admin() && $query->is_search) {
        $query->set( 'post_type', array('post') );
    }
    return $query;
}
add_filter('pre_get_posts','my_search_filter', 1);


/*=======================================================================*/
// Disable Woocommerce default css
/*=======================================================================*/
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

/*=======================================================================*/
// Change Admin Login Logo
/*=======================================================================*/
function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url("<?php echo get_stylesheet_directory_uri(); ?>/images/sam-logo.png");
            background-size:initial;
            height:30px;
            width:auto;
            
        }
    </style>
<?php }
add_action( 'login_head', 'my_login_logo' );

/*=======================================================================*/
// Change Default RSS content Length
/*=======================================================================*/


// add custom feed content
function add_feed_content($content) {
	if(is_feed()) {
		$content = substr($content, 0, 100);
	}
	return $content;
}
add_filter('the_excerpt_rss', 'add_feed_content');
add_filter('the_content', 'add_feed_content');

//Change $0 or default Free! to custom text
function lds_woocommerce_free_price_html($price, $product) {
    return 'Free';
}
add_filter('woocommerce_free_price_html', 'lds_woocommerce_free_price_html', 10, 2);

// To add a confirm password field on the register form under My Accounts.
add_filter('woocommerce_registration_errors', 'registration_errors_validation', 10,3);
function registration_errors_validation($reg_errors, $sanitized_user_login, $user_email) {
    global $woocommerce;
    extract( $_POST );

    if ( strcmp( $password, $password2 ) !== 0 ) {
        return new WP_Error( 'registration-error', __( 'Passwords do not match.', 'woocommerce' ) );
    }
    return $reg_errors;
}

add_action( 'woocommerce_register_form', 'wc_register_form_password_repeat' );
function wc_register_form_password_repeat() {
    ?>
    <p class="form-row form-row-wide">
        <input type="password" class="input-text" name="password2" id="reg_password2" value="<?php if ( ! empty( $_POST['password2'] ) ) echo esc_attr( $_POST['password2'] ); ?>" placeholder="Confirm Password * " />
    </p>
    <?php
}

function featured_image($post) {
    if (has_post_thumbnail($post->id)){
       //the_post_thumbnail('large');
       return wp_get_attachment_url( get_post_thumbnail_id($post->id) );
    }
}

add_shortcode('featured_image', 'featured_image');

/**
 * Customize url for Wordpress Admin Logo
 */
function loginpage_custom_link() {
    return 'http://sampression.com';
}
add_filter('login_headerurl','loginpage_custom_link');

function change_title_on_logo() {
    return 'Sampression Theme';
}
add_filter('login_headertitle', 'change_title_on_logo');

if(isset($_GET['confirm']) && $_GET['confirm'] == 'sent') {
    //add_filter('woocommerce_registration_errors', 'registration_errors_validation_', 10,3);
    
    //wc_add_notice( $message );
    add_action('woocommerce_before_customer_login_form', 'woocommerce_confirmation_link_sent', 10);
}

function woocommerce_confirmation_link_sent() {
    $message = 'A confirmation link has been sent to your email address. Please follow the instructions in the email to activate your account.';
    echo '<ul class="woocommerce-message">
            <li>'.$message.'</li>
    </ul>';
}
function sampression_variation_desc(){
    $variation_term = get_term_by('slug', $_POST['slug'], $_POST['term_name'] );
    $variation_desc = $variation_term->description;
    die($variation_desc);
}
// create custom Ajax call for WordPress
add_action( 'wp_ajax_nopriv_sampression_variation_desc', 'sampression_variation_desc' );
add_action( 'wp_ajax_sampression_variation_desc', 'sampression_variation_desc' );


remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart_live_preview', 35);

function woocommerce_template_single_add_to_cart_live_preview() {
    global $post;
    echo '<a href="'.get_post_meta($post->ID, 'wpcf-live-demo', true).'" class="button2 button" target="_blank"><i class="icon-eye"></i>Live Preview</a>';
}

/*add_filter ('add_to_cart_redirect', 'woo_redirect_to_checkout');
function woo_redirect_to_checkout() {
    global $woocommerce;
    //$checkout_url = $woocommerce->cart->get_checkout_url();
    $checkout_url = $woocommerce->cart->get_cart_url();
    return $checkout_url;
}*/

