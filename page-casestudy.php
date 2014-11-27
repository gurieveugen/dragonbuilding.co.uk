<?php
/*
 * @package WordPress
 * Template Name: Casestudy Page
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
		<article id="content" class="left content-cs">
			<h1><?php the_title(); ?></h1>
			<?php
			$client = get_field('client');
			$brief = get_field('brief');
			$product = get_field('product');
			
			?>
			<div class="cs-info">
				<?php if(!empty($client)){	?><p><strong>Client:</strong> <?php echo $client; ?></p><?php }?>
				<?php if(!empty($brief)){	?><p><strong>Brief:</strong> <?php echo $brief; ?></p><?php }?>
				<?php if(!empty($product)){	?><p><strong>Product:</strong> <?php echo $product; ?></p><?php }?>
			</div>
			<?php the_content(); ?>
		</article>
	</div>
</div>

<?php get_footer(); ?>