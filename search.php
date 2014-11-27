<?php
/**
 *
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

<div class="page-title">
	<div class="center-wrap-940">
		<h1><?php printf( __( 'Search Results for: %s', 'theme' ), get_search_query() ); ?></h1>
	</div>
</div>
<div class="center-wrap-940">
	<div class="main-area inner cf">
		<section id="content" class="left content-fw">
			<?php include("loop.php"); ?>
		</section>
	</div>
</div>

<?php else : ?>
	<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'theme' ); ?></p>
	<?php get_search_form(); ?>
<?php endif; ?>

<?php get_footer(); ?>
