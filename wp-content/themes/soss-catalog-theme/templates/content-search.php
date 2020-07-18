<article <?php  ?>>


    <?php
    /**
     * Results of search.
     *
     * @return post-type 'post'
     * @return post-type 'docs'
     */

    // Show this format for regular posts

    if (get_post_type() === 'post') { ?>
  <header>

    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

      <?php

      get_template_part('templates/entry-meta'); ?>

  </header>

  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>


    <?php } ?>

    <?php
    // Show results for 'docs' Post Type

    if (get_post_type() === 'docs') { ?>

    <header>

      <h2 class="entry-title"><?php the_title(); ?></h2>

      <?php

      get_template_part('templates/modules/document-template'); ?>

    </header>

      <?php

    } ?>

</article>
