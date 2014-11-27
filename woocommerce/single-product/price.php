<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;
?>
<div class="price-row" itemprop="offers" itemscope itemtype="http://schema.org/Offer">

	<?php 
	$product_brochure = get_field('product_brochure',$product->id);
	if(!empty($product_brochure['url'])){ ?>
	<a href="<?php echo $product_brochure['url']; ?>" class="btn-brochure mobile-hide">download brochure</a>
	<?php } ?>
	
	<p class="price"><?php echo $product->get_price_html(); ?></p>

	<meta itemprop="price" content="<?php echo $product->get_price(); ?>" />
	<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
	<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />

</div>