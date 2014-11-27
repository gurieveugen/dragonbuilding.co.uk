<?php
/**
 *
 * @package WordPress
 * Template Name: Page Full Width
 */
?>
<?php get_header(); ?>

<div class="page-title">
	<div class="center-wrap-940">
		<div class="breadcrumbs cf">
		<?php if(function_exists('bcn_display'))
		{
			bcn_display();
		}?>
		</div>
	</div>
</div>
<div class="center-wrap-940">
	<div class="main-area inner cf">
		<?php if ( have_posts() ) : the_post(); ?>
		<article id="content" class="content-fw">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</article>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
