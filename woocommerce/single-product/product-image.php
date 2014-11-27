<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

?>
<div class="images">

	<?php
		if ( has_post_thumbnail() ) {

			$image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$post_thumbnail_id 	= get_post_thumbnail_id();
			$full_image			= wp_get_attachment_image_src($post_thumbnail_id, 'full');
			$image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );
			$image       		= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'title' => $image_title
				) );
			$attachment_count   = count( $product->get_gallery_attachment_ids() );

			if ( $attachment_count > 0 ) {
				$gallery = '[product-gallery]';
			} else {
				$gallery = '';
			}
			echo '<div class="main-image ui-widget-content">';
			//echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a>', $image_link, $image_title, $image ), $post->ID );
			echo '<img src="'.$full_image[0].'" id="main-image" >';
			echo '<img src="'.$full_image[0].'" id="main-image-hidden" >';
			echo '<a href="#" class="minus">+</a><a href="#" class="plus">-</a>';
			echo '</div>';
			?>
			<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
			<script type="text/javascript">
				var ReqWidth = <?php echo $full_image[1];?>; // Max width for the image
                var ReqHeight = <?php echo $full_image[2];?>;
				var zoom_step = 50;
				var k = <?php echo $full_image[2]/$full_image[1];?>;
				jQuery(function(){
					jQuery( "#main-image" ).draggable();
					jQuery('.plus').click(function(){
						var width = jQuery("#main-image").width(); // Current image width
						var height = jQuery("#main-image").height();						
						var new_width = width + zoom_step;
						var left = jQuery("#main-image").css("left");
						var top = jQuery("#main-image").css("top");
						var new_left = parseInt(left) - zoom_step/2;
						jQuery("#main-image").width(new_width);
						var new_height = jQuery("#main-image").height();
						var new_top = parseInt(top) - (new_height - height)/2;
						jQuery("#main-image").css("left", new_left);						
						return false;
					});	
					jQuery('.minus').click(function(){
						var width = jQuery("#main-image").width(); // Current image width
						var height = jQuery("#main-image").height();						
						var new_width = width - zoom_step;
						var left = jQuery("#main-image").css("left");
						var top = jQuery("#main-image").css("top");
						var new_left = parseInt(left) + zoom_step/2;
						jQuery("#main-image").width(new_width);
						var new_height = jQuery("#main-image").height();
						var new_top = parseInt(top) + (new_height - height)/2;
						jQuery("#main-image").css("left", new_left);						
						return false;
					});					
				});	
			</script>
		<?php
		} else {

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', wc_placeholder_img_src() ), $post->ID );

		}
	?>

	<?php do_action( 'woocommerce_product_thumbnails' ); ?>

</div>
