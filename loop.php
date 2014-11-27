<?php
/**
 * @package WordPress
 * @subpackage Base_Theme
 */
 
 
?>

<?php if ( have_posts() ) : ?>

<div class="posts-holder">
<?php while ( have_posts() ) : the_post(); ?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1 class="pc-hide"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php if ( has_post_thumbnail() && ! post_password_required() ){ ?>
		<?php $post_thumbnail_id = get_post_thumbnail_id(); ?>
		<a href="<?php the_permalink(); ?>" class="image">
			<img src="<?php echo get_thumb($post_thumbnail_id, 222, 142, true); ?>" class="pc-visible" alt="<?php the_title(); ?>">
			<img src="<?php echo get_thumb($post_thumbnail_id, 500, 150, true); ?>" class="pc-hide" alt="<?php the_title(); ?>">
		</a>
		<?php } ?>
		<div class="content">
			<h1 class="pc-visible"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<?php
			if(!empty($post->post_excerpt)){
				$excerpt = $post->post_excerpt;
			}else{
				$excerpt = get_content_excerpt($post->post_content, 135);
			}
			
			echo '<p>'.$excerpt.' <a href="'.get_permalink().'" class="link-view pc-visible">ViEW</a></p>';
			?>
			<div class="link-holder pc-hide">
				<a href="<?php the_permalink(); ?>" class="link-view">ViEW</a>
			</div>
		</div>
	</article>

<?php endwhile; ?>
</div> <!-- .posts-holder -->
	
<?php theme_paging_nav(); ?>

<?php else: ?>
	
	<h1 class="page-title"><?php _e( 'Nothing Found', 'theme' ); ?></h1>
	
	<div class="page-content">

		<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'theme' ); ?></p>
		<?php get_search_form(); ?>

	</div><!-- .page-content -->
	
<?php endif; ?>