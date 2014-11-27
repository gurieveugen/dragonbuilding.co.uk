<?php
/**
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
<?php get_header(); ?>

<div class="page-title blog">
	<div class="center-wrap-940">
		<h1>Blog</h1>
	</div>
</div>
<div class="center-wrap-940">
	<div class="main-area inner cf">
		
		<div id="sidebar" class="right mobile-hide sidebar-blog">
			<?php get_sidebar(); ?>
		</div>
		
		<section id="content" class="content-blog left">
			<?php include("loop.php"); ?>
			<?php /*
			<div class="posts-holder">
				<article>
					<h1 class="pc-hide"><a href="#">Story 1</a></h1>
					<a href="#" class="image">
						<img src="<?php echo TDU; ?>/images/img-3.jpg" class="pc-visible" alt="">
						<img src="<?php echo TDU; ?>/images/img-3-t.jpg" class="pc-hide" alt="">
					</a>
					<div class="content">
						<h1 class="pc-visible"><a href="#">Story 1</a></h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac metus varius, iaculis diam eget, mollis diam. Morbi lobortis tristique. <a href="#" class="link-view pc-visible">ViEW</a></p>
						<div class="link-holder pc-hide">
							<a href="#" class="link-view">ViEW</a>
						</div>
					</div>
				</article>
				<article class="even">
					<h1 class="pc-hide"><a href="#">Story 2</a></h1>
					<a href="#" class="image">
						<img src="<?php echo TDU; ?>/images/img-4.jpg" class="pc-visible" alt="">
						<img src="<?php echo TDU; ?>/images/img-4-t.jpg" class="pc-hide" alt="">
					</a>
					<div class="content">
						<h1 class="pc-visible"><a href="#">Story 2</a></h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac metus varius, iaculis diam eget, mollis diam. Morbi lobortis tristique. <a href="#" class="link-view pc-visible">ViEW</a></p>
						<div class="link-holder pc-hide">
							<a href="#" class="link-view">ViEW</a>
						</div>
					</div>
				</article>
				<article>
					<h1 class="pc-hide"><a href="#">Story 3</a></h1>
					<a href="#" class="image">
						<img src="<?php echo TDU; ?>/images/img-5.jpg" class="pc-visible" alt="">
						<img src="<?php echo TDU; ?>/images/img-5-t.jpg" class="pc-hide" alt="">
					</a>
					<div class="content">
						<h1 class="pc-visible"><a href="#">Story 3</a></h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac metus varius, iaculis diam eget, mollis diam. Morbi lobortis tristique. <a href="#" class="link-view pc-visible">ViEW</a></p>
						<div class="link-holder pc-hide">
							<a href="#" class="link-view">ViEW</a>
						</div>
					</div>
				</article>
				<article class="even">
					<h1 class="pc-hide"><a href="#">Story 4</a></h1>
					<a href="#" class="image">
						<img src="<?php echo TDU; ?>/images/img-6.jpg" class="pc-visible" alt="">
						<img src="<?php echo TDU; ?>/images/img-6-t.jpg" class="pc-hide" alt="">
					</a>
					<div class="content">
						<h1 class="pc-visible"><a href="#">Story 4</a></h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac metus varius, iaculis diam eget, mollis diam. Morbi lobortis tristique. <a href="#" class="link-view pc-visible">ViEW</a></p>
						<div class="link-holder pc-hide">
							<a href="#" class="link-view">ViEW</a>
						</div>
					</div>
				</article>
				<article>
					<h1 class="pc-hide"><a href="#">Story 5</a></h1>
					<a href="#" class="image">
						<img src="<?php echo TDU; ?>/images/img-7.jpg" class="pc-visible" alt="">
						<img src="<?php echo TDU; ?>/images/img-7-t.jpg" class="pc-hide" alt="">
					</a>
					<div class="content">
						<h1 class="pc-visible"><a href="#">Story 5</a></h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac metus varius, iaculis diam eget, mollis diam. Morbi lobortis tristique. <a href="#" class="link-view pc-visible">ViEW</a></p>
						<div class="link-holder pc-hide">
							<a href="#" class="link-view">ViEW</a>
						</div>
					</div>
				</article>
			</div>
			*/ ?>
		</section>
	</div>
</div>

<?php get_footer(); ?>