<?php
/*
Plugin Name: Carousel Widget
Plugin URI: http://mathewnephews.wordpress.com/
Description: Carousel Widget shows the images from a certain category
Author: Mathie Neven
Version: 1
Author URI: http://mathewnephews.wordpress.com/
*/

/* to make sure this widget works properly: lees de readme.txt */
 
 
class CarouselWidget extends WP_Widget
{
  function CarouselWidget()
  {
    $widget_ops = array('classname' => 'CarouselWidget', 'description' => 'Shows a carousel' );
    $this->WP_Widget('CarouselWidget', 'Carousel Widget', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title (category name): <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
    if (!empty($title))
	    // Get the ID of a given category
    	$category_id = get_cat_ID( $title );
	    // Get the URL of this category
    	$category_link = get_category_link( $category_id );
		echo '<a style="color: #ee1d01;" href="' . esc_url( $category_link ) . '">' . $before_title . $title . $after_title .'</a>';		
		?>
  
<!-- opdat deze plugin goed zou werken: lees de readme.txt -->	
       
 <div id="myCarousel" class="carousel slide">
 <div class="carousel-inner">
  <?php 
   $the_query = new WP_Query(array(
    'category_name' => $title, 
    'posts_per_page' => 1 
    )); 
   while ( $the_query->have_posts() ) : 
   $the_query->the_post();
  ?>
   <div class="item active">
   <?php echo '<a href="' . get_permalink() . '">';?>
    	<?php the_post_thumbnail( 'category-thumb' );?>
    	<div class="carouselcaption">
    		<h4><?php the_title();?></h4>
    	</div>
    </a>
   </div><!-- item active -->
  <?php 
   endwhile; 
   wp_reset_postdata();
  ?>
  <?php 
   $the_query = new WP_Query(array(
    'category_name' => $title, 
    'posts_per_page' => 10, 
    'offset' => 1 
    )); 
   while ( $the_query->have_posts() ) : 
   $the_query->the_post();
  ?>
   <div class="item">
   <?php echo '<a href="' . get_permalink() . '">';?>
    	<?php the_post_thumbnail('category-thumb');?>
    	<div class="carouselcaption" >
     		<h4><?php the_title();?></h4>
    	</div>
    </a>
   </div><!-- item -->
  <?php 
   endwhile; 
   wp_reset_postdata();
  ?>
 </div><!-- carousel-inner -->
 </div><!-- #myCarousel -->
	<?php //end of code
    echo $after_widget;
  }
}
add_action( 'widgets_init', create_function('', 'return register_widget("CarouselWidget");') );?>