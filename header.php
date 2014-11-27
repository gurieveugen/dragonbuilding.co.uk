<?php
/**
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo TDU; ?>/css/style-construction.css">
	<link rel="stylesheet" type="text/css" href="<?php echo TDU; ?>/css/jquery.formstyler.css">
	<link rel="stylesheet" media="(max-width: 960px)" href="<?php echo TDU; ?>/css/tablet.css">
	<link rel="stylesheet" media="(max-width: 500px)" href="<?php echo TDU; ?>/css/mobile.css">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); 
		wp_head(); ?>
	<script type="text/javascript" src="<?php echo TDU; ?>/js/jquery.formstyler.min.js" ></script>
	<script type="text/javascript" src="<?php echo TDU; ?>/js/jquery.flexslider-min.js" ></script>
	<script type="text/javascript" src="<?php echo TDU; ?>/js/doubletaptogo.js" ></script>
	<script type="text/javascript" src="<?php echo TDU; ?>/js/jquery.main.js" ></script>
	<!--[if lt IE 9]>
		<script type="text/javascript" src="<?php echo TDU; ?>/js/html5.js"></script>
		<script type="text/javascript" src="<?php echo TDU; ?>/js/pie.js"></script>
		<script type="text/javascript" src="<?php echo TDU; ?>/js/init-pie.js"></script>
	<![endif]-->
	<!--[if lte IE 9]>
		<script type="text/javascript" src="<?php echo TDU; ?>/js/jquery.placeholder.min.js"></script>
		<script type="text/javascript">
			jQuery(function(){
				jQuery('input, textarea').placeholder();
			});
		</script>
	<![endif]-->
</head>
<body <?php body_class(); ?>>
	<div id="wrapper">
		<header id="header" class="cf">
			<div class="top-bar">
				<div class="center-wrap cf">
					<ul class="top-links">
						<li>
						<?php if ( is_user_logged_in() ) { ?>
						<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('MY ACCOUNT','woothemes'); ?>"><?php _e('MY ACCOUNT','woothemes'); ?></a>
						<?php }
						else { ?>
						<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('LOGIN/CREATE ACCOUNT','woothemes'); ?>"><?php _e('LOGIN/CREATE ACCOUNT','woothemes'); ?></a>
						<?php } ?>						
						</li>
						<?php global $woocommerce;						
						$cart_url = $woocommerce->cart->get_cart_url();	?>					
						<li><a href="<?php echo $cart_url;?>" class="link-basket">MY BASKET</a></li>
					</ul>
				</div>
			</div>
			<div class="center-wrap">
				<div class="contacts-area cf">
					<strong class="m-left"><a href="tel:+44 (0) 1656 870415">+44 (0) 1656 870415</a></strong>
					<strong><a href="/contact" class="link-email">Email us</a></strong>
				</div>
				<a href="<?php echo home_url('/'); ?>" class="logo" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><img src="<?php echo TDU; ?>/images/dragon_logo.png" alt="<?php bloginfo('name'); ?>"></a>
				<a href="#" class="mobile-visible btn-m-nav">open/close navigation</a>
				<!--<nav class="cf">
					<ul id="nav">
						<li><a href="#">Who we are</a></li>
						<li>
							<a href="#">What we do</a>
							<ul>
								<li><a href="#">Design</a></li>
								<li class="active">
									<a href="#">Manufacture</a>
									<ul>
										<li><a href="#">Moulding</a></li>
										<li><a href="#">Foam filling</a></li>
										<li><a href="#">Assembly</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li><a href="#">What we’ve done</a></li>
						<li><a href="#">How we do it</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</nav>-->
				<?php wp_nav_menu( array(
				'container' => 'nav',
				'container_class' => 'cf',
				'theme_location' => 'primary_nav',
				'menu_id' => 'nav',
				'menu_class' => 'navigation'
				/*'walker' => new Custom_Walker_Nav_Menu*/
				)); ?>
			</div>
		</header>