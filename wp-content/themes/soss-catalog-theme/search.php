<?php
/**
 * Custom Search Results template
 * @card #259
 *
 * After displaying the title, we get the search-bar.php template
 * Results appear below form
 */

get_template_part('templates/page', 'header'); ?>

<div class="mb-3" id="search-component" >

  <?php get_template_part('templates/modules/search', 'bar'); ?>

</div>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'search'); ?>

<?php endwhile; ?>

<?php the_posts_navigation(); ?>
