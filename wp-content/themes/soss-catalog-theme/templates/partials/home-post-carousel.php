<?php /** @noinspection PhpUndefinedFieldInspection */
  declare( strict_types=1 );


$args = [
  'posts_per_page'         => 4,
  'post_type'              => 'post',
  'update_post_meta_cache' => false,
  'update_post_term_cache' => false,
  'category_name'          => 'Feature',
  ];

  $post_query = new WP_Query( $args );
  ?>

  <div class="homepage-post-carousel ">
    <div class="row">

      <div class="col-lg-10 offset-lg-1 col-md-12">
       <ul class="carousel-panel ">
    <?php
      if ( $post_query->have_posts() ) :

        while ( $post_query->have_posts() ) :

          $post_query->the_post();

      // Collects favorites
     // using category = 'Feature'

        ?>

        <li class="row panel d-flex">

          <?php

            if ( has_post_thumbnail( $post_query->ID ) ) :

              ?>

              <div class="col-md-6 order-md-1 order-sm-2 order-xs-2 align-content-md-center">
                <div class="card-body ">
                  <?php the_title('<h3 class="card-title">', '</h3>'); ?>
                  <?php the_excerpt(); ?>
                  <a href="<?php echo esc_url(get_the_permalink()); ?>" class="button cm-tab-brand">
                    <?php esc_html_e('View More', 'sage'); ?>
                  </a>
                </div>
              </div>

              <div class="col-md-6 order-md-2 order-sm-1 order-xs-1 d-flex align-items-center">
                <?php the_post_thumbnail('feature_post', ['class' => 'img-fluid lazyloaded']); ?>
              </div>

            <?php endif; ?>

        </li>

      <?php

    //    endif; // is_sticky()
          ?>

        <?php
        endwhile;
      endif;
      wp_reset_postdata();

    ?>
    </ul>
      </div>
    </div>
  </div> <!-- close Carousel -->


<!--  END CAROUSEL  -->
