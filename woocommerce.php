<?php
/**
 *
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
<?php get_header(); ?>

<div class="page-title">
	<div class="center-wrap-940">
		<h1>Products</h1>
	</div>
</div>

<?php if ( have_posts() ) : ?>
	
	<div class="main-shop">
		<!--<h1><?php woocommerce_page_title();?></h1>-->
		<?php
			woocommerce_content();
		?>
	</div>
	      
<?php endif; ?>

<?php get_footer(); ?>