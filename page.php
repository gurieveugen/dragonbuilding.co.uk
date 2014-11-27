<?php
/*
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
		<?php if (have_posts()) : the_post(); ?>
	
		<?php if(has_post_thumbnail()){ ?>
		<?php $post_thumbnail_id = get_post_thumbnail_id();
		$post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id, 'full');
		if($post_thumbnail_src[1] > 500){
			$pc_h = round($post_thumbnail_src[2]*500/$post_thumbnail_src[1]);
		}else{
			$pc_h = $post_thumbnail_src[2];
		}
		if($post_thumbnail_src[1] > 320){
			$tablet_h = round($post_thumbnail_src[2]*320/$post_thumbnail_src[1]);
		}else{
			$tablet_h = $post_thumbnail_src[2];
		}
		$mobile_h = $pc_h;		
		?>
		
			<article id="content" class="left content-fw cf">
				<div class="image-full-right mobile-hide">
					<img src="<?php echo get_thumb($post_thumbnail_src[0], 500, $pc_h); ?>" alt="<?php the_title(); ?>" class="pc-visible">
					<img src="<?php echo get_thumb($post_thumbnail_src[0], 320, $tablet_h); ?>" alt="<?php the_title(); ?>" class="tablet-visible">
				</div>				
				<div class="column-content">
					<h1><?php the_title(); ?></h1>
					<div class="image-full-right mobile-visible">
						<img src="<?php echo get_thumb($post_thumbnail_src[0], 500, $mobile_h); ?>" alt="<?php the_title(); ?>">
					</div>
					<?php the_content(); ?>
				</div>
			</article>
		
		<?php }else{ ?>
		
			<article id="content" class="left">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</article>
		
		<?php } ?>

		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>