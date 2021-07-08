<?php
  declare( strict_types=1 );
  /**
   * Feature Hero Component
   * @description: Fields capture minimal information. Image/Video will be added set with link to AWS or Cloudinary.
   * If more slides are needed, I'll need to setup a repeater.
   * @author gmiller
   * @date: 5/13/2021
   */
  /**
   *
   */

  // use function Sodium\version_string;

  $aws_webm_source = 'https://soss-web-assets.s3.us-east-2.amazonaws.com/soss-hero.webm';// 37.3 mb
  $aws_mp4_source = 'https://soss-web-assets.s3.us-east-2.amazonaws.com/SOSSweb4.mp4'; // 125.8 mb
  $aws_static_source = 'https://soss-web-assets.s3.us-east-2.amazonaws.com/Website_Banner_Soss_Antique_Bronze_Invisible_Hinge.png'; // 125.8 mb
?>

  <div class="homepage-slider-block">
    <div class="homepage-slider-container">
      <div class="main-slider-block slider-1">
        <div class="homepage-slider">
          <?php
            if ( have_rows( 'add_hero_media' ) ) :
            while ( have_rows( 'add_hero_media' ) ) : the_row();
              $value_prop = get_sub_field('value_proposition');
              $cta = get_sub_field('call_to_action_label');
              $link_title_text = get_sub_field('link_title_text');
              $mp4_video = get_sub_field('mp4_video');
              $webm_video = get_sub_field('webm_video');
              $poster_image = get_sub_field('poster_image');
              $no_bypass = get_sub_field('bypass_video');

              $hero_page_link = get_sub_field( 'hero_page_link' ); ?>

          <div class="homepage-slider-slide">
            <?php if ( $hero_page_link ) : ?>

            <a href="<?php echo esc_url( $hero_page_link); ?>" class="slide-content-main video-slide">


              <!-- TODO: workout method to capture image dimensions to populate the dimensions -->
              <?php if ( $no_bypass == 1 ) : // if true, show the video options
                ?>

                <video poster="<?php echo $poster_image; ?>" playsinline muted autoplay loop preload="auto"
                       width="1900" height="814" id="soss_hero_video">
                  <?php if ( $mp4_video ) : ?>
                    <source src="<?php echo $mp4_video; ?>" type="video/mp4">
                  <?php endif; ?>
                  <?php if ( $webm_video ) : ?>
                    <source src="<?php echo $webm_video; ?>" type="video/webm">
                  <?php endif; ?>
                  <?php if ( $poster_image ) : // TODO: Fade in background image on load  ?>
                    <source src="<?php echo $poster_image; ?>" id="soss_poster_image" >
                  <?php endif; ?>
                </video>

              <?php else : // if false, show a static option
                ?>

                <video poster="<?php echo $poster_image; ?>" playsinline muted autoplay loop preload="auto"
                       width="1900" height="814" id="soss_hero_video">
                  <source src="<?php echo $aws_static_source; ?>" id="soss_poster_image" >

                </video>
              <?php endif; // show all video inputs ?>
              <div class="video-overlay">&nbsp;</div>
              <div class="logo-overlay"></div>

              <div class="slide-content">
                <h2><?php echo $value_prop; ?></h2>
              </div>
            </a>
              <div class="slide-button-content">
                <a href="<?php echo esc_url( $hero_page_link); ?>" class="btn button red cta-button"><?php echo $cta; ?></a>
              </div>


            <?php endif; // hero_page_link ?>
          </div>

            <?php endwhile; ?>
            <?php else : ?>
              <?php // no rows found ?>
            <?php endif; ?>
        </div>
<!--        <div class="slider-controls">-->
<!--          <a href="#" class="slide-control js-slide-control prev-slide">Prev</a>-->
<!--          <a href="#" class="slide-control js-slide-control next-slide">Next</a>-->
<!--        </div>-->
      </div>
    </div>
  </div>

<?php
