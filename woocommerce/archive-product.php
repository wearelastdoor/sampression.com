<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>

<section id="content" class="clearfix">
    <section class="primary-content">
        <div class="container clearfix">
            <section id="options" class="clearfix">
                <ul id="filters" class="option-set clearfix" data-option-key="filter">
                    <li><a href="#filter" data-option-value="*" class="selected">all</a></li>
                    <?php
                    $args = array(
                        'taxonomy' => 'product_cat',
                    );
                    $terms = get_categories($args);
                    foreach ($terms as $term) {
                        ?>
                        <li><a href="#filter" data-option-value=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
                    <?php }
                    ?>
                </ul>
                <select id="get-cats" name="get-cats">
                    <option value="*">Show all</option>
                    <?php
                    $args = array(
                        'taxonomy' => 'product_cat',
                    );
                    $terms = get_categories($args);
                    foreach ($terms as $term) {
                        ?>
                       <option value=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                    <?php }
                    ?>
                </select>
              </section> <!-- #options -->
	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
<?php /* ?>
			<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

 <?php  */ ?>

		<?php endif; ?>

		<?php do_action( 'woocommerce_archive_description' ); ?>

		<?php if ( have_posts() ) : ?>
                        
			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>
        </div>
    </section>
</section>
                       
<?php get_footer( 'shop' ); ?>