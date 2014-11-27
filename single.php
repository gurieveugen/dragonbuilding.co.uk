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
		
		<div id="sidebar" class="right mobile-hide sidebar-blog">
			<?php get_sidebar(); ?>
		</div>
		
		<section id="content" class="left">

		<?php if ( have_posts() ) : the_post(); ?>
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="entry-meta">
					Posted on 
					<a href="<?php the_permalink() ?>" rel="bookmark">
						<span class="entry-date"><?php the_date() ?></span>
					</a> 
					by 
					<span class="author vcard">
						<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php the_author() ?></a>
					</span>
				</div>
		
				<?php if(has_post_thumbnail()){	
						$post_thumbnail_id = get_post_thumbnail_id();		
						$post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id, 'full');
						echo '<div class="full-image"><img src="'.$post_thumbnail_src[0].'"></div>';
				}
				?>
		
				<div class="entry-content">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'theme' ) . '</span>', 'after' => '</div>' ) ); ?>
				</div>
		
				<div class="entry-meta">
					<?php theme_entry_meta(); ?>
					<?php edit_post_link( 'Edit' , '<span class="edit-link">', '</span>' ); ?>
				</div>
			</article>
		
			<div id="nav-below" class="navigation nav-single">
				<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous Entry: %title', 'theme' ) ); ?></span>
				<span class="nav-next"><?php next_post_link( '%link', __( 'Next Entry: %title <span class="meta-nav">&rarr;</span>', 'theme' ) ); ?></span>
			</div>
			
			<?php comments_template( '', true ); ?>
		
		<?php endif; ?>

		</section>
	</div>
</div>
<div id="sidebar" class="blog-sidebar">
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
