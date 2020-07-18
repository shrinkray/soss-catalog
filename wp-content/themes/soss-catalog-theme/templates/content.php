<article <?php post_class('col-lg-4 col-sm-6 col-12 mb-3 mt-3'); ?>>
  <div class="card">
    <?php if(has_post_thumbnail()) : ?>
      <?php the_post_thumbnail(); ?>
    <?php else : ?>

    <?php endif; ?>
    <div class="card-block">
      <header>
        <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php get_template_part('templates/entry-meta'); ?>
      </header>
      <div class="card-summary card-text">
        <?php echo excerpt(16); ?>
      </div>
      <footer>
        <a href="<?php the_permalink(); ?>" class="btn btn-link pl-0 post-btn">Read More</a>
      </footer>
    </div>
  </div>
</article>