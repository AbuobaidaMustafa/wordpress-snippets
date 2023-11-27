
<?php

// function that runs when shortcode is called
function latest_news_Shortcode() { 
	ob_start(); 
// args
$args = array(
    'posts_per_page'    => 10,
    'post_type'     => 'post',
    'meta_key'      => 'latestnews',
    'meta_value'    => 1
);


// query
$the_query = new WP_Query( $args );

?>

<div class="container">
<?php if( $the_query->have_posts() ): ?>
    <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <div class="text">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
            </div>
            <img src="https://7enews.net/wp-content/uploads/2022/10/logo-.png" width="30px" height="30px" /> 

    <?php endwhile; ?>
    
<?php endif; ?>
</div>  
<?php  return ob_get_clean(); ?>
<?php wp_reset_query();   // Restore global post data stomped by the_post(). 

   

	}
	// register shortcode
	add_shortcode('latest_news', 'latest_news_Shortcode');


	