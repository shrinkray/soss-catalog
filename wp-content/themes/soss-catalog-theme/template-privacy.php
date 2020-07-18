<?php
/**
 * Template Name: Privacy Policy
 * To add custom data fields such as Cookie Tables
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'privacy-page'); ?>
<?php endwhile; ?>
