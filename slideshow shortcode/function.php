<?php
	function news_slideshow(){

		$first = array(
			'posts_per_page'    => 1,
			'post_type'     => 'post',
			'orderby' => 'modified',
			'order'=>'DESC',
			'suppress_filters' => 0,
			'meta_key'      => 'first_slide',
			'meta_value'    => true
		);
		$second = array(
			'posts_per_page'    => 1,
			'post_type'     => 'post',
			'orderby' => 'modified',
			'order'=>'DESC',
			'suppress_filters' => 0,
			'meta_key'      => 'second_slide',
			'meta_value'    => true
		);
		$third = array(
			'posts_per_page'    => 1,
			'post_type'     => 'post',
			'orderby' => 'modified',
			'order'=>'DESC',
			'suppress_filters' => 0,
			'meta_key'      => 'third_slide',
			'meta_value'    => true
		);
		$fourth = array(
			'posts_per_page'    => 1,
			'post_type'     => 'post',
			'orderby' => 'modified',
			'order'=>'DESC',
			'suppress_filters' => 0,
			'meta_key'      => 'fourth_slide',
			'meta_value'    => true
		);
		$fifth = array(
			'posts_per_page'    => 1,
			'post_type'     => 'post',
			'orderby' => 'modified',
			'order'=>'DESC',
			'suppress_filters' => 0,
			'meta_key'      => 'fifth_slide',
			'meta_value'    => true
		);
		?>
<div class="w3-content w3-display-container">


<?php
		$the_query = new WP_Query( $first );
		
		?>

<?php if( $the_query->have_posts() ): ?>
		<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

		<a href="<?php the_permalink(); ?>">

<div class="w3-display-container mySlides">
  <img src="<?php echo the_post_thumbnail_url() ?>" style="width:100%" class="w3-animate-left">
  <div class="w3-display w3-large w3-container w3-padding-16 w3-navyblue">
  <?php the_title(); ?>
  </div>
</div>
<?php endwhile; endif; ?>
		  
			<?php wp_reset_postdata() ?>
		</a>
		<?php
		$the_query = new WP_Query( $second );
		
		?>

<?php if( $the_query->have_posts() ): ?>
		<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

		<a href="<?php the_permalink(); ?>">

<div class="w3-display-container mySlides">
  <img src="<?php echo the_post_thumbnail_url() ?>" style="width:100%" class="w3-animate-left">
  <div class="w3-display w3-large w3-container w3-padding-16">
  <?php the_title(); ?>
  </div>
</div>
<?php endwhile; endif; ?>
		  
			<?php wp_reset_postdata() ?>
		</a>

		<?php
		$the_query = new WP_Query( $third );
		
		?>

<?php if( $the_query->have_posts() ): ?>
		<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

		<a href="<?php the_permalink(); ?>">

<div class="w3-display-container mySlides">
  <img src="<?php echo the_post_thumbnail_url() ?>" style="width:100%" class="w3-animate-left">
  <div class="w3-display w3-large w3-container w3-padding-16">
  <?php the_title(); ?>
  </div>
</div>
<?php endwhile; endif; ?>
		  
			<?php wp_reset_postdata() ?>
		</a>


		<?php
		$the_query = new WP_Query( $fourth );
		
		?>

<?php if( $the_query->have_posts() ): ?>
		<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

		<a href="<?php the_permalink(); ?>">

<div class="w3-display-container mySlides">
  <img src="<?php echo the_post_thumbnail_url() ?>" style="width:100%" class="w3-animate-left">
  <div class="w3-display w3-large w3-container w3-padding-16">
  <?php the_title(); ?>
  </div>
</div>
<?php endwhile; endif; ?>
		  
			<?php wp_reset_postdata() ?>
		</a>

		<?php
		$the_query = new WP_Query( $fifth );
		
		?>

<?php if( $the_query->have_posts() ): ?>
		<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

		<a href="<?php the_permalink(); ?>">

<div class="w3-display-container mySlides">
  <img src="<?php echo the_post_thumbnail_url() ?>" style="width:100%" class="w3-animate-left">
  <div class="w3-display w3-large w3-container w3-padding-16">
  <?php the_title(); ?>
  </div>
</div>
<?php endwhile; endif; ?>
		  
			<?php wp_reset_postdata() ?>
		</a>


<button class="w3-button w3-display-right" onclick="plusDivs(-1)">&#10094;</button>
<button class="w3-button w3-display-left" onclick="plusDivs(1)">&#10095;</button>

</div>
<?php
}
add_shortcode('show_slide', 'news_slideshow');
?
