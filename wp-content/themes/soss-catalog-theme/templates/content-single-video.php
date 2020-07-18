<?php
/**
 * Created by PhpStorm.
 * User: gmiller
 * Date: 2/26/18
 * Time: 7:47 PM
 */

// Template heading missing on this single page, have added it for convenience

// TODO: see why single templates do not have the template header

get_template_part('templates/page', 'header');


// https://wordpress.stackexchange.com/questions/41507/wordpress-remove-link-in-the-tags

while (have_posts()) : the_post();

// new vars

  $learn_more = get_field( 'page_link_name' );
  $video = get_field( 'oembed' );
  $custom_excerpt = get_field( 'add_excerpt' );
  $vid_desc = get_field( 'video_description' );
  $social_toggle = get_field( 'add_social_links');
  $facebook_link = get_field( 'facebook_share_link' );
  $twitter_link = get_field( 'twitter_share_link' );
  $linkedin_link = get_field( 'linkedin_share_link' ); ?>


  <div class="single-video">
    <div class="row mb-8 video-post">
      <div <?php post_class(); ?>>
        <div class="card d-flex align-items-center">
          <div class="col-xs-12  col-lg-8 px-0">
            <div class="embed-container">
              <?php if ( $video ) : ?>
                <?php echo $video; ?>
              <?php else : ?>

              <?php endif; ?>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-1 mt-1">
              <div class="meta d-flex px-3 x-sm-0">
                <?php
                // Use this to make tags clickable
                // the_tags( ' ', ' <span class="tag align-self-center">•</span> ', ' ' ); ?>
                <?php
                // Use this to strip anchor tags away from tags
                $posttags = get_the_tags();
                if ($posttags) {
                  foreach($posttags as $tag) {
                    echo '<span class="tag align-self-center">' . $tag->name . '</span>';
                  }
                }
                ?>
              </div>
              <div class="social-dots px-3 px-sm-0">
                <?php if ( $social_toggle ) { ?>
                  <?php if ($facebook_link) { ?>
                    <a class="launch" href="<?php echo $facebook_link; ?>" target="_blank">
                      <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                      </span>
                    </a>
                  <?php }

                  if ($twitter_link) { ?>
                    <a class="launch" href="<?php echo $twitter_link; ?>" target="_blank">
                      <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                      </span>
                    </a>
                  <?php }

                  if ( $linkedin_link ) { ?>
                    <a class="launch" href="<?php echo $linkedin_link; ?>" target="_blank">
                      <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                      </span>
                    </a>
                  <?php } ?>
                <?php } else { echo 'Social Not Displaying'; } ?>
              </div>
            </div>

            <?php if( $vid_desc ) { ?>
              <div class="entry-content mb-2 flex-row px-3 px-sm-0">
                <?php echo $vid_desc; ?>
              </div>
            <?php }  else {  } // else there will be no excerpt ?>

          </div>
        </div>
      </div>
    </div>
  </div>

  <?php wp_reset_query(); //reset the  WP_Query



endwhile; // the presenting post ?>