<header>

  <?php

  $svgPath = get_template_directory() . '/dist/login.svg';  // adobe logo doc SVG
  $svg = file_get_contents( $svgPath );

  ?>
  <!-- End Top Bar -->
    <div class="container">

      <div class="row">

        <div class="header-group">
          <div class="col-3  logo d-flex justify-content-start">
            <a href="/" title="The most comfortable handle ever!" class="brand-logo" style=""><?php echo $svg; ?></a>
          </div>

          <div class="col-9  member-services">
            <div class="col-12 col-sm-8  search-bar d-flex justify-content-sm-start justify-content-end">

              <?php

              // Calls custom search form

              get_template_part('site-searchform');

              ?>

            </div>

            <div class="col-12 col-sm-4 account-login d-flex justify-content-end">

              <a href="<?php get_site_url(); ?>/my-account/" title="<?php esc_attr_e( 'View your quote', 'sage' ); ?>" class="basket-link">
<!--                <i class="fa fa-shopping-basket" aria-hidden="true"></i>-->
                <svg  width='28'  height='28'  viewBox='0 0 2048 1792' xmlns='http://www.w3.org/2000/svg' aria-labelledby='shopping_title shopping_desc' role='img'><title id='shopping_title'>Click to see your shopping cart</title><desc id='shopping_desc'>Use this to check on the items in your cart</desc><path d='M1920 768q53 0 90.5 37.5t37.5 90.5-37.5 90.5-90.5 37.5h-15l-115 662q-8 46-44 76t-82 30h-1280q-46 0-82-30t-44-76l-115-662h-15q-53 0-90.5-37.5t-37.5-90.5 37.5-90.5 90.5-37.5h1792zm-1435 800q26-2 43.5-22.5t15.5-46.5l-32-416q-2-26-22.5-43.5t-46.5-15.5-43.5 22.5-15.5 46.5l32 416q2 25 20.5 42t43.5 17h5zm411-64v-416q0-26-19-45t-45-19-45 19-19 45v416q0 26 19 45t45 19 45-19 19-45zm384 0v-416q0-26-19-45t-45-19-45 19-19 45v416q0 26 19 45t45 19 45-19 19-45zm352 5l32-416q2-26-15.5-46.5t-43.5-22.5-46.5 15.5-22.5 43.5l-32 416q-2 26 15.5 46.5t43.5 22.5h5q25 0 43.5-17t20.5-42zm-1156-1217l-93 412h-132l101-441q19-88 89-143.5t160-55.5h167q0-26 19-45t45-19h384q26 0 45 19t19 45h167q90 0 160 55.5t89 143.5l101 441h-132l-93-412q-11-44-45.5-72t-79.5-28h-167q0 26-19 45t-45 19h-384q-26 0-45-19t-19-45h-167q-45 0-79.5 28t-45.5 72z'/></svg></a>

              <?php if ( is_user_logged_in() ) { ?>
                <a href="<?php echo wp_logout_url(); ?>" title="Logout now" class="user-link">
<!--                  <i class="fa fa-user-circle-o fa-uco-on" aria-hidden="true"></i>-->
                  <svg  width='28' height='28' viewBox='0 0 1792 1792' xmlns='http://www.w3.org/2000/svg' aria-labelledby='user_account_title user_account_desc' role='img'><title id='user_account_title'>Click to visit the account page</title><desc id='user_account_desc'>Login and check your account settings</desc><path  d='M896 0q182 0 348 71t286 191 191 286 71 348q0 181-70.5 347t-190.5 286-286 191.5-349 71.5-349-71-285.5-191.5-190.5-286-71-347.5 71-348 191-286 286-191 348-71zm619 1351q149-205 149-455 0-156-61-298t-164-245-245-164-298-61-298 61-245 164-164 245-61 298q0 250 149 455 66-327 306-327 131 128 313 128t313-128q240 0 306 327zm-235-647q0-159-112.5-271.5t-271.5-112.5-271.5 112.5-112.5 271.5 112.5 271.5 271.5 112.5 271.5-112.5 112.5-271.5z'/></svg></a>
              <?php } else { ?>
                <a href="<?php get_site_url(); ?>/my-account/" title="Login to your member page" rel="home" class="user-link_non-active">
<!--                  <i class="fa fa-user-circle-o fa-uco-on" aria-hidden="true"></i>-->
                  <svg  width='28' height='28' viewBox='0 0 1792 1792' xmlns='http://www.w3.org/2000/svg' aria-labelledby='user_account_title user_account_desc' role='img'><title id='user_account_title'>User Account Icon</title><desc id='user_account_desc'>Login and check your account settings</desc><path  d='M896 0q182 0 348 71t286 191 191 286 71 348q0 181-70.5 347t-190.5 286-286 191.5-349 71.5-349-71-285.5-191.5-190.5-286-71-347.5 71-348 191-286 286-191 348-71zm619 1351q149-205 149-455 0-156-61-298t-164-245-245-164-298-61-298 61-245 164-164 245-61 298q0 250 149 455 66-327 306-327 131 128 313 128t313-128q240 0 306 327zm-235-647q0-159-112.5-271.5t-271.5-112.5-271.5 112.5-112.5 271.5 112.5 271.5 271.5 112.5 271.5-112.5 112.5-271.5z'/></svg></a>
              <?php } ?>

            </div>
          </div>
        </div>
      </div>
    </div>

  <!-- Navigation Row -->


    <div class="">
      <div class="main-nav">
        <div class="container">

          <?php if ( function_exists('max_mega_menu_is_enabled') && max_mega_menu_is_enabled('primary_navigation') ) : ?>
            <?php wp_nav_menu( ['theme_location' => 'primary_navigation', 'menu_class' => 'navbar-nav ml-auto d-flex flex-wrap'] ); ?>
          <?php else: ?>
            <nav class="navbar navbar-toggleable-md">
              <button class="navbar-toggler navbar-light navbar-toggler-right " type="button" data-toggle="collapse"
                      data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                      aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon ml-auto"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                if (has_nav_menu('primary_navigation')) :
                  wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'navbar-nav ml-auto d-flex flex-wrap']);
                endif; ?>
              </div><!-- #site-navigation -->
            </nav>
          <?php endif; ?>
        </div>
      </div>
    </div>
</header>
