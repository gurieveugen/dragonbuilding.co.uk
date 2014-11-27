<?php
/*
 * @package WordPress
 * Template Name: Home Page
*/
?>
<?php get_header(); ?>

	<?php if (have_posts()) : the_post(); ?>

<!--<section class="visual">
	<div class="bg"></div>
	<div class="box">
		<h1>Corilla Plastics is a rotational moulding company with more than 40 years experience.</h1>
		<p class="pc-visible">From our home in South Wales, we create high quality mouldings for our customers around the world.</p>
		<a href="#" class="link-video mobile-hide"><span><img src="<?php echo TDU; ?>/images/ico-video.png" alt=""></span><span>Watch our latest video to see why you can trust Corilla Plastics</span></a>
	</div>
</section>-->
<div class="main-slider">
	<?php
	$big_slide = get_field('big_slide');
	if($big_slide){ ?>
	<div class="slides cf">
	<?php foreach($big_slide as $slide){?>
		<div class="slide">
			<a href="<?php echo $slide['link']; ?>">
				<img src="<?php echo get_thumb($slide['image']['url'], 918, 340); ?>" alt="<?php echo $slide['title']; ?>">
				<div class="text">
					<div class="holder">
						<h2><?php echo $slide['title']; ?></h2>
						<?php if(!empty($slide['price'])){?>
						<small>ONLY</small>
						<big><?php echo $slide['price']; ?></big>
						<?php }?>
					</div>
				</div>
			</a>
		</div>
	<?php }?>	
	</div>
	<?php }?>	
</div>
<div class="home-area center-wrap-810">
	<?php
	$slides = get_field('slides');
	if($slides){
	?>
	<section class="widgets-slider">
		<div class="slides cf">
		<?php foreach($slides as $slide){ ?>
			<aside class="widget">
				<div class="holder">
					<!--<h3><a href="<?php echo $slide['link']; ?>"><img src="<?php echo $slide['icon']['url']; ?>" alt=""><?php echo $slide['title']; ?></a></h3>
					<p><?php echo $slide['text']; ?> <a href="<?php echo $slide['link']; ?>" class="link-view pc-visible">ViEW</a></p>-->
					<h2><?php echo $slide['title']; ?></h2>
					<div class="link-holder">
						<a href="<?php echo $slide['link']; ?>" class="link-view">FIND OUT MORE</a>
					</div>
				</div>
			</aside>
		<?php } ?>	
		</div>
	</section>
	<?php } ?>
			
	<div class="main-area cf">
		<div id="sidebar" class="sidebar-home right">
		<?php
		$products = get_field('products');
		if(!empty($products)){
		?>
			<aside class="widget widget-top-picks">
				<h3>TOP CUSTOMER PICKS</h3>
				<div class="picks-list-slider">
					<ul class="slides picks-list cf">
					<?php foreach($products as $post_product){?>
					<?php
					$_product = get_product( $post_product->ID );					
					$post_thumbnail_id = get_post_thumbnail_id($post_product->ID);
					?>
						<li>
							<div class="image">
								<a href="<?php echo get_permalink( $post_product->ID );?>">
								<?php if (has_post_thumbnail( $post_product->ID )){?>
								<img src="<?php echo get_thumb($post_thumbnail_id, 144, 500); ?>" title="<?php echo $post_product->post_title; ?>">
								<?php } ?>
								</a>
							</div>
							<h4><a href="<?php echo get_permalink( $post_product->ID );?>"><?php echo $post_product->post_title; ?></a></h4>
							<strong class="price"><?php echo $_product->get_price_html(); ?></strong>							
						</li>
					<?php } ?>	
					</ul>
				</div>
			</aside>
		<?php } ?>	
		</div>

		<article id="content" class="content-home left">
			<?php the_content(); ?>
		</article>

	</div>
</div>
<script type="text/javascript">
(function(){
	
	$(function(){
		
		//var $window = $(window), flexslider;
		
		setTimeout(function(){ $('.widgets-slider .holder').equalHeightColumns(); }, 300);
		
		$('.main-slider').flexslider({
			animation: "fade",
			selector: ".slides > div",
			animationLoop: false,
			slideshowSpeed: 10000,
			animationSpeed: 600,
			directionNav: false,
			touch: false
		});
		
		$('.widgets-slider').flexslider({
			animation: "slide",
			selector: ".slides > aside",
			animationLoop: false,
			slideshowSpeed: 10000,
			animationSpeed: 600,
			controlNav: false,
			touch: false,
			smoothHeight: false,
			itemWidth: 1,
			itemMargin: getItemMargin1(),
			minItems: getGridSize1(),
			maxItems: getGridSize1()
		});
		
		$('.picks-list-slider').flexslider({
			animation: "slide",
			direction: getSliderDirection2(),
			animationLoop: false,
			slideshowSpeed: 10000,
			animationSpeed: 600,
			slideshow: false,
			controlNav: false,
			touch: false,
			smoothHeight: false,
			minItems: getGridSize2(),
			maxItems: getGridSize2(),
			itemWidth: getItemWidth2(),
			itemMargin: getItemMargin2()
		});
		
	});
	
	function getGridSize1(){
		return (window.innerWidth < 500) ? 1 : 
		(window.innerWidth < 960) ? 2 : 3;
	}
	/*function getItemWidth1(){
		return (window.innerWidth < 500) ? 0 : 
		(window.innerWidth < 960) ? 270 : 250;
	}*/
	function getItemMargin1(){
		return (window.innerWidth < 500) ? 0 : 
		(window.innerWidth < 960) ? 50 : 30;
	}
	
	function getSliderDirection2(){
		return (window.innerWidth < 500) ? 'vertical' : 
		(window.innerWidth < 960) ? 'horizontal' : 'vertical';
	}
	function getGridSize2(){
		return (window.innerWidth < 500) ? 2 : 
		(window.innerWidth < 960) ? 3 : 2;
	}
	function getItemWidth2(){
		return (window.innerWidth < 500) ? 0 : 
		(window.innerWidth < 960) ? 215 : 0;
	}
	function getItemMargin2(){
		return (window.innerWidth < 500) ? 0 : 
		(window.innerWidth < 960) ? 30 : 20;
	}
	
	/*$window.resize(function() {
		var gridSize = getGridSize1();
		//flexslider.vars.itemWidth = gridSize;
		flexslider.vars.minItems = gridSize;
		flexslider.vars.maxItems = gridSize;
	});*/

})(jQuery);
</script>
	<?php endif; ?>
<?php get_footer(); ?>