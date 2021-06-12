<?php
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

  <div class="">
    <ul class="carousel-panel">
    <?php
      if ( $post_query->have_posts() ) :

        while ( $post_query->have_posts() ) :

          $post_query->the_post();

      // Collects favorites
     // if ( is_sticky() ) :

        ?>

        <li class="row panel display-inline-flex">

          <?php

            if (has_post_thumbnail($post_query->ID)) :

              ?>

              <div class="col-md-8">
                <div class="card-body">
                  <?php the_title('<h3 class="card-title">', '</h3>'); ?>
                  <?php the_excerpt(); ?>
                  <a href="<?php echo esc_url(get_the_permalink()); ?>" class="btn btn-primary">
                    <?php esc_html_e('View More', 'sage'); ?>
                  </a>
                </div>
              </div>

              <div class="col-md-4">
                <?php the_post_thumbnail('full', ['class' => 'img-fluid lazyloaded']); ?>
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
  </div> <!-- close Carousel -->


<!--  END CAROUSEL  -->
