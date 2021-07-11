

<?php

use Roots\Sage\Controllers\Branding;
use Roots\Sage\Controllers\BusinessInfo;
use Roots\Sage\Controllers\Navigation;


$social_args = Navigation\social_nav('fa-3x brand');
$footer_args = Navigation\footer_nav('nav-pills flex-column flex-sm-row justify-content-center');

$invitation = get_field('invitation', 'option');
$section_title = get_field('section_title', 'option');

$pattern = get_field('background_pattern', 'option');

// Promo Opt-in footer row ?>

<footer class="content-info">

<?php include( 'partials/promofooter.php' ); ?>

  <div class="container" >
    <div class="row">

      <div class="col-12 col-md-4 social-nav-wrap mt-3">
        <div class="footer-brand">
          <?php include( 'modules/logo.svg.php'); // logo svg file saves http requests ?>
        </div>

        <?php if (is_active_sidebar('first-4col-footer')): ?>
          <nav class="mt-35">
            <div class="footer-widgets">
              <?php dynamic_sidebar('first-4col-footer'); ?>
            </div>
          </nav>
        <?php endif; ?>

        <?php if (has_nav_menu('social_navigation')) : ?>
          <nav class="social-nav">
            <div class="footer-widgets">
              <?php wp_nav_menu($social_args); ?>
            </div>
          </nav>
        <?php endif; ?>

      </div>


      <?php if (is_active_sidebar('second-2col-footer')): ?>
        <div class="col-12 col-md-7  footer-widgets mt-3">

          <div class="row">
            <div class="col  ">
              <?php  dynamic_sidebar('second-2col-footer'); ?>
            </div>

            <div class="col">
              <h4 class="">Top Categories</h4>
              <ul>
                <?php // shows top five categories in args list
                  wp_list_categories('number=5&show_count=1&orderby=count&order=DESC&title_li=') ?>
              </ul>
            </div>

            <?php if (is_active_sidebar('fourth-2col-footer')): ?>
              <div class="col footer-widgets mt-3">
                <?php dynamic_sidebar('fourth-2col-footer'); ?>
              </div>
            <?php endif; ?>

            </div>

          </div>

      <?php endif; ?>





    </div>
  </div>

  <div class="lower-footer">
    <div class="container">

      <div class="legal d-flex justify-content-between flex-column flex-sm-row py-3">
        <?= BusinessInfo\privacy_policy('small p-2'); ?>
        <?= BusinessInfo\terms_page('small p-2'); ?>
        <?= BusinessInfo\copyright('small pr-2'); ?>
      </div>
    </div>
  </div>

  <!-- Return to top link -->
  <a href=”#anchored” class="go-top"  rel="nofollow">
    <span class="fixed-btn fa fa-angle-up" aria-hidden="true"></span>
  </a>

</footer>
