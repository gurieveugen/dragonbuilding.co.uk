<?php
/*
 * @package WordPress
 * Template Name: TextOnly Page
*/
?>
<?php get_header(); ?>

<div class="center-wrap-940">
	<div class="main-area inner cf">

		<h1><?php _e( 'Not Found', 'theme' ); ?></h1>

		<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'theme' ); ?></p>

		<?php get_search_form(); ?>

	</div>
</div>

<?php get_footer(); ?>
