<?php
/**
 *
 * @package WordPress
 * Template Name: Woocommerce Page
 */
?>
<?php get_header(); ?>

<div class="page-title">
	<div class="center-wrap-940">
		<?php 
		if(function_exists('woocommerce_breadcrumb')){
			woocommerce_breadcrumb();
		}
		?>
	</div>
</div>

<?php if ( have_posts() ) : the_post(); ?>
	
	<div class="center-wrap" style="padding-bottom:30px;">
		<?php
			the_content();
		 ?>
	 </div>
	 
<?php endif; ?>

<?php get_footer(); ?>