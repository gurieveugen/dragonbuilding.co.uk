<?php
/*
 * @package WordPress
 * Template Name: WhatWeveDone Page
*/
?>
<?php get_header(); ?>

<div class="main-area inner">
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
	<?php if (have_posts()) : the_post(); ?>
	<div class="center-wrap-940">
		<h1><?php the_title(); ?></h1>
		<section class="two-columns inner">
			<?php the_content(); ?>
		</section>
	</div>
	<?php endif; ?>
	
	<?php
	$customers = get_field('customers');
	if($customers){
	?>
	<section class="logos-section">
		<div class="center-wrap-980">
			<div class="text-center">
				<p><?php the_field('customers_title');?></p>
			</div>
			<ul class="logos-list">
			<?php foreach($customers as $customer){ ?>
				<li><a href="<?php echo $customer['url']; ?>" title="<?php echo $customer['title']; ?>"><img src="<?php echo $customer['logo']['url'];?>" alt="<?php echo $customer['title']; ?> "></a></li>
			<?php } ?>	
			</ul>
		</div>
	</section>
	<?php }?>
	
	<?php
	$bottom_content = get_field('bottom_content');
	$bottom_right_image = get_field('bottom_right_image');
	$bottom_image_capture = get_field('bottom_image_capture');
	if(!empty($bottom_content)){
	?>
	<section class="data-section center-wrap-940 cf">
		<div class="column<?php if(empty($bottom_right_image)) echo ' full-width"';?>">
			<?php echo $bottom_content; ?>
		</div>
		<?php if(!empty($bottom_right_image)){?>
		<div class="right">
			<figure>
				<img src="<?php echo $bottom_right_image['url']; ?>" alt="<?php echo $bottom_image_capture; ?>">
				<?php if(!empty($bottom_image_capture)){?>
				<figcaption><?php echo $bottom_image_capture; ?></figcaption>
				<?php } ?>
			</figure>
		</div>
		<?php }?>
	</section>
	<?php }?>
</div>

<?php get_footer(); ?>