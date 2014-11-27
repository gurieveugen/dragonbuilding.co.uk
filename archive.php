<?php
/**
 *
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
<?php get_header(); ?>

<div class="page-title blog">
	<div class="center-wrap-940">
		<h1>
			<?php global $post;
			if (is_category()):
				printf( __( 'Category Archives: %s', 'theme' ), single_cat_title( '', false ) );
			elseif( is_tag() ):
				printf( __( 'Tag Archives: %s', 'theme' ), single_tag_title( '', false ) );
			elseif ( is_day() ) :
				printf( __( 'Daily Archives: %s', 'theme' ), get_the_date() );
			elseif ( is_month() ) :
				printf( __( 'Monthly Archives: %s', 'theme' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'theme' ) ) );
			elseif ( is_year() ) :
				printf( __( 'Yearly Archives: %s', 'theme' ), get_the_date( _x( 'Y', 'yearly archives date format', 'theme' ) ) );
			elseif (is_author()):
				printf( __( 'All posts by %s', 'theme' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
			else :
				_e( 'Archives', 'theme' );
			endif;
		?>
		</h1>
	</div>
</div>
<div class="center-wrap-940">
	<div class="main-area inner cf">
		
		<div id="sidebar" class="right mobile-hide sidebar-blog">
			<?php get_sidebar(); ?>
		</div>
		
		<section id="content" class="content-blog left">
			<?php include("loop.php"); ?>
		</section>
	</div>
</div>
<?php get_footer(); ?>
