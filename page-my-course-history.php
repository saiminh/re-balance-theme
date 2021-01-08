<?php
/**
 * Template Name: My Course History
 * The template for displaying the course history page
 *
 * @package rebalance
 */

get_header();
// Get user's Courses
$profile       = learn_press_get_profile();
$filter_status = LP_Request::get_string( 'filter-status' );
$query         = $profile->query_courses( 'purchased', array( 'status' => $filter_status ) );		
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
      <article>
        <h1 class="profile-header">My course history</h1>
        <div class="profile-course-history-content">
          <div class="courses-in-progress">  
            <h2>My current courses</h2>       
            <?php if ( $query['items'] ) : ?>
              <?php	$i = 0; ?>
              <?php foreach ( $query['items'] as $user_course ) : ?> 							
                <?php if ( $user_course->get_results( 'status' ) !== 'passed' ) : ?>                  
                  <?php $course = learn_press_get_course( $user_course->get_id() ); ?>
                    <div class="home-dashboard-courses-course">
                      <div class="home-dashboard-courses-thumbnail course-thumbnail">
                        <?php echo $course->get_image(); ?>
                      </div>
                      <h4 class="home-dashboard-courses-coursetitle">
                        <a href="<?php echo $course->get_permalink(); ?>">
                          <?php echo $course->get_title(); ?>
                        </a>
                      </h4>
                      <?php if ( $user_course->get_results( 'status' ) !== 'purchased' ) : ?>
                        <div class="learn-press-progress lp-course-progress">
                            <div class="progress-bg lp-progress-bar">
                                <div class="progress-active lp-progress-value"
                                      style="left: <?php echo $user_course->get_percent_result(); ?>;">
                                </div>
                            </div>
                        </div>
                        <span class="result-percent"><?php echo $user_course->get_percent_result(); ?></span>
                        <span class="lp-label label-<?php echo esc_attr( $user_course->get_results( 'status' ) ); ?>">
                          <?php echo $user_course->get_status_label( $user_course->get_results( 'status' ) ); ?>
                        </span>
                        <?php if ( $user_course->get_results( 'status' ) == 'passed' ) : ?>
                          <a class="course-progress-gotocourselink" href="<?php echo $course->get_permalink(); ?>">Revisit</a>
                        <?php else : ?>
                          <a class="course-progress-gotocourselink" href="<?php echo $course->get_permalink(); ?>">Continue</a>
                        <?php endif; ?>

                      <?php else : ?>
                        <span class="lp-label label-<?php echo esc_attr( $user_course->get_results( 'status' ) ); ?>">
                          <?php echo $user_course->get_status_label( $user_course->get_results( 'status' ) ); ?>
                        </span>
                      <?php endif; ?> 
                    </div>
                <?php endif; ?> 
              <?php endforeach; ?>											
            <?php else : ?>
              <p>You are not enrolled in any courses at the moment. <a href=""><i class="material-icons">info</i> What are courses?</a></p>
              <p><strong>Suggested courses</strong></p>'
              <?php echo do_shortcode( "[learn_press_popular_courses]" );	?>
            <?php endif; ?>
          </div>
          <div class="courses-completed">         
          <h2>My completed courses</h2>
            <?php if ( $query['items'] ) : ?>
              <?php	$i = 0; ?>
              <?php foreach ( $query['items'] as $user_course ) : ?> 							
                <?php if ( $user_course->get_results( 'status' ) == 'passed' ) : ?>                  
                  <?php $course = learn_press_get_course( $user_course->get_id() ); ?>
                    <div class="home-dashboard-courses-course">
                      <div class="home-dashboard-courses-thumbnail course-thumbnail">
                        <?php echo $course->get_image(); ?>
                      </div>
                      <h4 class="home-dashboard-courses-coursetitle">
                        <a href="<?php echo $course->get_permalink(); ?>">
                          <?php echo $course->get_title(); ?>
                        </a>
                      </h4>
                      <?php if ( $user_course->get_results( 'status' ) !== 'purchased' ) : ?>
                        <div class="learn-press-progress lp-course-progress">
                            <div class="progress-bg lp-progress-bar">
                                <div class="progress-active lp-progress-value"
                                      style="left: <?php echo $user_course->get_percent_result(); ?>;">
                                </div>
                            </div>
                        </div>
                        <span class="result-percent"><?php echo $user_course->get_percent_result(); ?></span>
                        <span class="lp-label label-<?php echo esc_attr( $user_course->get_results( 'status' ) ); ?>">
                          <?php echo $user_course->get_status_label( $user_course->get_results( 'status' ) ); ?>
                        </span>
                        <?php if ( $user_course->get_results( 'status' ) == 'passed' ) : ?>
                          <a class="course-progress-gotocourselink" href="<?php echo $course->get_permalink(); ?>">Revisit</a>
                        <?php else : ?>
                          <a class="course-progress-gotocourselink" href="<?php echo $course->get_permalink(); ?>">Continue</a>
                        <?php endif; ?>

                      <?php else : ?>
                        <span class="lp-label label-<?php echo esc_attr( $user_course->get_results( 'status' ) ); ?>">
                          <?php echo $user_course->get_status_label( $user_course->get_results( 'status' ) ); ?>
                        </span>
                      <?php endif; ?> 
                    </div>
                <?php endif; ?> 
              <?php endforeach; ?>											              
            <?php else : ?>
              <p>You are not enrolled in any courses at the moment. <a href=""><i class="material-icons">info</i> What are courses?</a></p>
              <p><strong>Suggested courses</strong></p>'
              <?php echo do_shortcode( "[learn_press_popular_courses]" );	?>
            <?php endif; ?>
          </div>
        </div>
        <div class="home-dashboard-courses-coursehistorylink">
          <h2> Do you want to keep learning?</h2>
          <a href="/courses/" class="button">
            Find more courses
          </a>
        </div>		
      </article>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
