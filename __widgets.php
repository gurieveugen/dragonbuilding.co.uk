<?php

class Contact_Us_Widget extends WP_Widget {
	
	function Contact_Us_Widget() {
		$widget_ops = array('classname' => 'widget-contact-us', 'description' => __('in right sidebar'));
		$control_ops = array('width' => 400, 'height' => 350);
		$this->WP_Widget('widget-contact-us', __('Contact Us Widget'), $widget_ops, $control_ops);
	}

    function widget($args, $instance) {
		global $wpdb;

		extract( $args );

		$title = apply_filters('widget_title', $instance['title']);
	?>
	<aside class="widget widget-contact">
		<?php if(!empty($title)){ echo '<h3><img src="'.TDU.'/images/ico-contact.png" alt="">'.$title.'</h3>'; }?>
		<?php echo do_shortcode('[contact-form-7 id="105" title="Contact form 1"]');?>
	</aside>			
	<?php
		wp_reset_postdata();
    }

    function update($new_instance, $old_instance) {				
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
        return $instance;
    }

    function form($instance) {
        $title = $instance['title'];
        ?>
        <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <?php 
    }

}

add_action('widgets_init', create_function('', 'return register_widget("Contact_Us_Widget");'));

class Case_Studies_Widget extends WP_Widget {

	function Case_Studies_Widget() {
		$widget_ops = array('classname' => 'case-studies-widge', 'description' => __('In Right Sidebar'));
		$control_ops = array('width' => 400, 'height' => 350);
		$this->WP_Widget('case-studies-widge', __('Case Studies Widget'), $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		global $wpdb;
		
		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
		$text = apply_filters( 'case-studies-widge', $instance['text'], $instance );
		$link = apply_filters( 'case-studies-widge', $instance['link'], $instance );
		?>
		<aside class="widget widget-cs">
			<?php if(!empty($title)){?><h3><img src="<?php echo TDU; ?>/images/ico-cs-big.png" alt=""><?php echo $title; ?></h3><?php }?>
			<p><?php echo $instance['filter'] ? wpautop($text) : $text; ?> <a href="<?php echo $link; ?>" class="link-view pc-visible">ViEW</a></p>
			<div class="link-holder pc-hide">
				<a href="<?php echo $link; ?>" class="link-view">ViEW</a>
			</div>
		</aside>	  
		<?php			
	}


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( $new_instance['text'] ) );
		$instance['filter'] = isset($new_instance['filter']);
		$instance['link'] = $new_instance['link'];
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => 'Case studies', 'text' => '', 'link' => '') );
		$title = strip_tags($instance['title']);
		$text = format_to_edit($instance['text']);
		$link = $instance['link'];
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
		<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs.'); ?></label></p>		
		<p><label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo esc_attr($link); ?>" /></p>
<?php
	}

}

add_action('widgets_init', create_function('', 'return register_widget("Case_Studies_Widget");'));

/*
class Latest_Article_Widget extends WP_Widget {
	
	function Latest_Article_Widget() {
		$widget_ops = array('classname' => 'widget-news', 'description' => __('in the footer'));
		$control_ops = array('width' => 400, 'height' => 350);
		$this->WP_Widget('widget-news', __('Latest Article Widget'), $widget_ops, $control_ops);
	}

    function widget($args, $instance) {
		global $wpdb;

		extract( $args );

		$title = apply_filters('widget_title', $instance['title']);

		$last_article_query = new WP_Query(array('posts_per_page' => 1));

	?>
      <section class="widget-news">
        <?php if(!empty($title)){ echo '<h3>'.$title.'</h3>'; }?>
        <ul class="list-news-footer">
		<?php while ( $last_article_query->have_posts() ) {?>
		<?php $last_article_query->the_post(); ?>
          <li>
			<?php if ( has_post_thumbnail() ) { ?>
            <figure><?php the_post_thumbnail('footer_thumb'); ?></figure>
			<?php } ?>
            <div class="txt">
              <h2><a href="<?php the_permalink();?>" title="<?php the_title()?>"><?php the_title()?></a></h2>
              <p><?php the_excerpt();?></p>
              <p>Click to <a href="<?php the_permalink();?>">read more.</a></p>
            </div>
          </li>
		<?php }?>  
        </ul>
      </section>		
	<?php
		wp_reset_postdata();
    }

    function update($new_instance, $old_instance) {				
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
        return $instance;
    }

    function form($instance) {
        $title = $instance['title'];
        ?>
        <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <?php 
    }

}

add_action('widgets_init', create_function('', 'return register_widget("Latest_Article_Widget");'));
*/
?>