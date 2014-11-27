<?php
/*
 * @package WordPress
 * Template Name: Page with Right Sidebar
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
		<div id="sidebar" class="right mobile-hide">
			<?php get_sidebar(); ?>
		</div>
		<?php if ( have_posts() ) : the_post(); ?>
		<article id="content" class="left">
			<h1><?php the_title(); ?></h1>
			<?php if(has_post_thumbnail()){ 
			$post_thumbnail_id = get_post_thumbnail_id();
			$post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id, 'full'); ?>
			<div class="full-image">
				<img src="<?php echo $post_thumbnail_src[0]; ?>" alt="<?php the_title(); ?>">
			</div>
			<?php } ?>
			<?php the_content(); ?>
		</article>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>