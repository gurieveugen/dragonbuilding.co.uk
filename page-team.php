<?php
/*
 * @package WordPress
 * Template Name: Team Page
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
	<div class="team-content cf">
		<?php if ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<div class="team-text pc-visible">
			<?php the_content(); ?>
		</div>
		<?php
		$persons = get_field('persons');
		$c=1;
		if (wpmd_is_phone()) { 
			$per_row = 2;
		}else{
			$per_row = 4;		
		}
		
		if($persons){
		
		echo '<div class="photo-list cf">';
		
		foreach($persons as $key=>$person){ ?>
		<?php
		//echo '<pre>';
		//print_r($person);
		//echo '</pre>';
		?>
		
		<?php
		$photo_list = '';
		$photo_item = '';
		$display_none = 'style="display:none"';
		$active = '';
		if($c == 1){
			$display_none = '';
			$active = ' active';
		}
		
		
			$photo_list .= '<div class="photo"><a href="#" rel="'.$c.'"><img src="'.get_thumb($person['photo']['url'], 140, 140, true).'" alt=""></a></div>';
			
			$photo_item .= '<div class="photo-item" '.$display_none.' id="photo-item-'.$c.'">';
			$photo_item .= '<h3><strong>'.$person['name'].' /</strong> '.$person['position'].'</h3>';
			$photo_item .= '<div class="cf">';
			if(!empty( $person['photo'])){
			$photo_item .= '<img src="'.get_thumb($person['photo']['url'], 350, 335, true).'" alt="" class="photo mobile-hide">';
			}
			$photo_item .= '<div class="column-content">';
			if(!empty($person['description'])){
				$content = apply_filters('the_content', $person['description']);
				$content = str_replace(']]>', ']]&gt;', $content);
			$photo_item .= $content;
			}
			if(!empty($person['email'])){	
			$photo_item .= '<p><strong><a href="mailto:'.$person['email'].'">'.$person['email'].'</a></strong></p>';
			}		
			$photo_item .= '</div>
						</div>
					</div>';
			//$photo_item .= '</li>';			
			
			echo '<div class="person-data'.$active.'">';
				echo $photo_list;
				echo $photo_item;
			echo '</div>';
		
			$c++; 
			}
			
			echo '</div>';
			
		} ?>
		
		<?php /*
		<ul class="photo-list cf">
			<li class="active"><a href="#"><img src="<?php echo TDU; ?>/images/photo-1.jpg" alt=""></a></li>
			<li><a href="#"><img src="<?php echo TDU; ?>/images/photo-2.jpg" alt=""></a></li>
			<li><a href="#"><img src="<?php echo TDU; ?>/images/photo-3.jpg" alt=""></a></li>
			<li><a href="#"><img src="<?php echo TDU; ?>/images/photo-4.jpg" alt=""></a></li>
		</ul>
		<div class="photo-item">
			<h3><strong>Tom Fleming /</strong> Group Chairman</h3>
			<div class="cf">
				<img src="<?php echo photo; ?>/images/photo-1-full.jpg" alt="" class="photo mobile-hide">
				<div class="column-content">
					<p>Tom is a qualified chartered accountant, with 14 years experience working in the Corporate Finance Department of Deloitte. During this time he specialised in assisting corporations with design and implementation of profit improvement plans, including a secondment to RBS to work on some of their more difficult cases. <br>
					Tom’s work has taken him to USA, Italy and Germany to work on international assignments and he has worked for businesses of all sizes from family run concerns to large PLCs.</p>
					<p>Tom presided over the acquisition of a number of rotational moulding businesses to help form Corilla in 2010.</p>
					<p>
						<strong><a href="mailto:tom.fleming@corillaplastics.co.uk">tom.fleming@corillaplastics.co.uk</a></strong>
					</p>
				</div>
			</div>
		</div>
		<ul class="photo-list cf">
			<li><a href="#"><img src="<?php echo TDU; ?>/images/photo-5.jpg" alt=""></a></li>
			<li><a href="#"><img src="<?php echo TDU; ?>/images/photo-6.jpg" alt=""></a></li>
			<li><a href="#"><img src="<?php echo TDU; ?>/images/photo-7.jpg" alt=""></a></li>
			<li><a href="#"><img src="<?php echo TDU; ?>/images/photo-8.jpg" alt=""></a></li>
		</ul>
		<ul class="photo-list cf">
			<li><a href="#"><img src="<?php echo TDU; ?>/images/photo-9.jpg" alt=""></a></li>
			<li><a href="#"><img src="<?php echo TDU; ?>/images/photo-10.jpg" alt=""></a></li>
		</ul>
		*/ ?>
		<script type="text/javascript">
			jQuery(function(){
				jQuery('.photo-list .photo-item').outerWidth(jQuery('.team-content').width());
				
				jQuery('.photo-list .photo a').click(function(){
					var item_id = jQuery(this).attr('rel');
					jQuery('.photo-list .person-data').removeClass('active');
					jQuery(this).parents('.person-data').addClass('active');
					jQuery(".photo-item").hide();
					jQuery("#photo-item-"+item_id).show();
					
					var p_offset = jQuery(this).offset();
					var c_offset = jQuery('.team-content').offset();
					var left_coord = c_offset.left - p_offset.left;
					
					jQuery('.photo-list .active .photo-item').css({'left': left_coord});
					
					return false;
				});
				
				jQuery(window).resize(function(){
					jQuery('.photo-list .photo-item').outerWidth(jQuery('.team-content').width());
				});
			});
		</script>		
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>