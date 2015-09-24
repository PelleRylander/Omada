<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $product, $woocommerce_loop, $qode_options;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
    $woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
    $woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
    return;

// Increase loop count
$woocommerce_loop['loop']++;

$products_list_type = 'type1';
if(isset($qode_options['woo_products_list_type'])){
	$products_list_type = $qode_options['woo_products_list_type'];
}

// Extra post classes
$classes = array();

if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
    $classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
    $classes[] = 'last';
?>

<?php switch($products_list_type) { 
	
	case 'type1': ?>

	<li <?php post_class( $classes ); ?>>

		<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
			<div class="top-product-section">

				<a href="<?php the_permalink(); ?>">
					<span class="image-wrapper">
					<?php
						/**
						 * woocommerce_before_shop_loop_item_title hook
						 *
						 * @hooked woocommerce_show_product_loop_sale_flash - 10
						 * @hooked woocommerce_template_loop_product_thumbnail - 10
						 */
						do_action( 'woocommerce_before_shop_loop_item_title' );
					?>
					</span>
				</a>

				<?php do_action('qode_woocommerce_after_product_image'); ?>

			</div>

			<div class="product_info_box">

				<span class="product-categories"><?php echo $product->get_categories(); ?></span>

				<a href="<?php the_permalink(); ?>" class="product-category">

					<span class="product-title"><?php the_title(); ?></span>

					<?php
						/**
						 * woocommerce_after_shop_loop_item_title hook
						 *
						 * @hooked woocommerce_template_loop_rating - 5
						 * @hooked woocommerce_template_loop_price - 10
						 */
						do_action( 'woocommerce_after_shop_loop_item_title' );
					?>
				</a>
			</div>
			<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
	</li>

<?php break; 
case 'type2': ?>

	<li <?php post_class( $classes ); ?>>
		<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
			<div class="top-product-section">
				<a href="<?php the_permalink(); ?>">
					<span class="image-wrapper">
						<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
					</span>
				</a>
				<?php do_action('qode_woocommerce_after_product_image'); ?>
			</div>
			<div class="product_info_box">
				<span class="product-categories"><?php echo $product->get_categories(); ?></span>
				<a href="<?php the_permalink(); ?>" class="product-category">            
					<div class="title_price_holder">
						<span class="product-title"><?php the_title(); ?></span>
						<div class="separator_holder"><span class="separator medium"></span></div>
						<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
					</div>
					<div class="product_info_holder">
						<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt );?>
					</div>
				</a>
			</div>
			<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>

	</li>

<?php break; 
case 'type3': ?>

	<li <?php post_class( $classes ); ?>>
		<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
			<div class="top-product-section">
				<a href="<?php the_permalink(); ?>">
					<span class="image-wrapper">
					<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
					</span>
				</a>
				<?php do_action('qode_woocommerce_after_product_image'); ?>
			</div>
			<div class="product_info_box">
				<span class="product-categories"><?php echo $product->get_categories(); ?></span>
				<a href="<?php the_permalink(); ?>" class="product-category">            

					<span class="product-title"><?php the_title(); ?></span>
					<div class="separator_holder"><span class="separator medium"></span></div>
					<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
				</a>
			</div>
			<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
	</li>
	
<?php break; } ?>
