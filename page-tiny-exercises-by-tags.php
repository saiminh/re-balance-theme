<?php
/**
 * Template Name: Tinies by Tags
 * The template for displaying the listing of tiny exercises by tag (eg. less tense)
 *
 * @package rebalance
 */
global $post;
$post_slug = $post->post_name;
if ( $post_slug == 'less-tense' ){
  $headline = 'Exercises that will make you feel <em>less tense</em>';
  $recommended_exercise_post = get_page_by_path( 'eye-relaxation', OBJECT, 'exercises' );
  $tag_name = 'less-tense';
} 
elseif ($post_slug == 'immediate-relief') {
  $headline = 'Exercises that will give you <em>immediate relief</em>';
  $recommended_exercise_post = get_page_by_path( 'emergency-breath', OBJECT, 'exercises' );
  $tag_name = 'immediate-relief';
} 
elseif ($post_slug == 'de-stressed') {
  $headline = 'Exercises that will <em>reduce stress</em>';
  $recommended_exercise_post = get_page_by_path( 'calming-breath', OBJECT, 'exercises' );
  $tag_name = 'de-stress';
} 
elseif ($post_slug == 'focussed') {
  $headline = 'Exercises that will feel <em>focused</em>';
  $recommended_exercise_post = get_page_by_path( 'focussing-breaths', OBJECT, 'exercises' );
  $tag_name = 'focus';
} 
elseif ($post_slug == 'energised') {
  $headline = 'Exercises that will make you feel <em>energised</em>';
  $recommended_exercise_post = get_page_by_path( 'energising-breaths', OBJECT, 'exercises' );
  $tag_name = 'energise';
} 
elseif ($post_slug == 'tired-eyes') {
  $headline = 'Exercises for <em>tired eyes</em>';
  $recommended_exercise_post = get_page_by_path( 'blinking-practice', OBJECT, 'exercises' );
  $tag_name = 'tired-eyes';
}
else {
  $headline = 'No Exercises found';
  $recommended_exercise_post = get_page_by_path( 'eye-relaxation', OBJECT, 'exercises' );
  $tag_name = 'less-tense';
}

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
      <h1 class="headline-homenav">
        <?php echo $headline; ?>
      </h1>
      <div class="exercises-by-tags-grid card-nav">
        <div class="exercises-by-tags-grid-column recommended">
          <h2 class="exercises-by-tags-grid-column-header">Recommended</h2>
          <div class="exercises-by-tags-grid-column-body">
            <div class="card">
              <div class="card-thumbnail">
                <div>
                  <?php echo get_the_post_thumbnail( $recommended_exercise_post ); ?>
                </div>
              </div>
              <h3 class="card-title">
                <a class="card-mainlink" href="<?php echo get_the_permalink( $recommended_exercise_post ); ?>">
                  <?php echo get_the_title( $recommended_exercise_post ); ?>
                </a>
              </h3>
            </div>
          </div>
        </div>
        <div class="exercises-by-tags-grid-column breathe">
          <h2 class="exercises-by-tags-grid-column-header">Breathe <a href="/exercise-type/tiny-breathwork/"> (See all)</a></h2>
            <?php
              $query = new WP_Query( array( 
                "post_type" => "exercises",
                "exercisetypes" => "tiny-breathwork",
                "exercises-tag" => $tag_name
                ) 
              ); 
            ?>             
          <div class="exercises-by-tags-grid-column-body<?php echo ' num-'.$query->post_count; ?>">
              <?php while ($query->have_posts()) : $query->the_post();
            ?>
            <div class="card-container">
              <div class="card">
                <div class="card-thumbnail">
                  <div><?php the_post_thumbnail(); ?></div>
                </div>
                <h3 class="card-title">
                  <a class="card-mainlink" href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                  </a>
                </h3>
              </div>
            </div>
            <?php endwhile; ?>
          </div>
        </div>
        <div class="exercises-by-tags-grid-column move">
          <h2 class="exercises-by-tags-grid-column-header">Move <a href="/exercise-type/tiny-movements/"> (See all)</a></h2>
            <?php
              $query = new WP_Query( array( 
                "post_type" => "exercises",
                "exercisetypes" => "tiny-movements",
                "exercises-tag" => $tag_name
                ) 
              );
            ?>
            <div class="exercises-by-tags-grid-column-body<?php echo ' num-'.$query->post_count; ?>">
            <?php
              while ($query->have_posts()) : $query->the_post();
            ?>
              <div class="card-container">
                <div class="card">
                  <div class="card-thumbnail">
                    <div><?php the_post_thumbnail(); ?></div>
                  </div>
                  <h3 class="card-title">
                    <a class="card-mainlink" href="<?php the_permalink(); ?>">
                      <?php the_title(); ?>
                    </a>
                  </h3>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
        <div class="exercises-by-tags-grid-column reflect">
          <h2 class="exercises-by-tags-grid-column-header">Reflect<a href="/exercise-type/tiny-reflections/"> (See all)</a></h2>
            <?php
              $query = new WP_Query( array( 
                "post_type" => "exercises",
                "exercisetypes" => "tiny-reflections",
                "exercises-tag" => $tag_name
                ) 
              );
            ?>
            <div class="exercises-by-tags-grid-column-body<?php echo ' num-'.$query->post_count; ?>">
            <?php
              while ($query->have_posts()) : $query->the_post();
            ?>
              <div class="card-container">
                <div class="card">
                  <div class="card-thumbnail">
                    <div><?php the_post_thumbnail(); ?></div>
                  </div>
                  <h3 class="card-title">
                    <a class="card-mainlink" href="<?php the_permalink(); ?>">
                      <?php the_title(); ?>
                    </a>
                  </h3>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
