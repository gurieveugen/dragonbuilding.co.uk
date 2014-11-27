<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>
<div class="main-product center-wrap-950">
<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="column right">

		<!-- .mobile-visible -->
		<div class="summary entry-summary mobile-visible box cf">
	
			<?php
				/**
				 * woocommerce_single_product_summary hook
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 */
				do_action( 'woocommerce_single_product_summary' );
			?>
	
			<a href="#" class="btn-brochure mobile-hide">download brochure</a>
		</div><!-- .summary -->
		<!-- .mobile-visible -->
		
	<?php
		/**
		 * woocommerce_before_single_product_summary hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
		
		
	?>
		<div class="box box-basket mobile-hide">
			<h3>IN YOUR BASKET</h3>
			<span class="divider"></span>
			<table class="single-basket">
				<tr>
					<td>Ergonomic Bucket</td>
					<td>x4</td>
					<td class="last">£100</td>
				</tr>
				<tr>
					<td>Mixing & Carrier Bucket</td>
					<td>x2</td>
					<td class="last">£20</td>
				</tr>
				<tr class="total">
					<td colspan="2">Total</td>
					<td class="last">£120</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="column left">
		<div class="summary entry-summary box mobile-hide cf">
	
			<?php
				/**
				 * woocommerce_single_product_summary hook
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 */
				do_action( 'woocommerce_single_product_summary' );
			?>
	
			<a href="#" class="btn-brochure mobile-hide">download brochure</a>
		</div><!-- .summary -->
		<div class="box box-1 cf">
			<div class="attr-accordion open">
				<h3 class="title">Size</h3>
				<div class="content">
					<div class="holder">
						<p><strong>125 LITRE</strong> - L 96cm - W 64cm - D 31cm</p>
						<p><strong>165 LITRE</strong> - L 128cm - W 64 cm - D 32.5cm</p>
					</div>
				</div>
			</div>
			<div class="attr-accordion">
				<h3 class="title">Colour</h3>
				<div class="content">
					<div class="holder">
						<p>White</p>
						<p>Black</p>
					</div>
				</div>
			</div>
			<div class="buttons">
				<div class="right">
					<button class="single_add_to_cart_button button alt" type="submit">add to basket</button>
					<button class="button grey alt">checkout</button>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		jQuery(function(){
			jQuery('.attr-accordion h3').click(function(){
				jQuery(this).next().slideToggle({
					complete: function(){
						jQuery(this).parent().toggleClass('open');
					}
				});
			});
		});
	</script>

	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>