<?php
/** NEW SINGLE TEMPLATE FOR SOSS DOCS POST TYPE
 *  A user might call this if clicking on the document or 'continue' message from an excerpt
 *
 * The presentation is info from the custom fields page
 *
 */

?>

<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <div class="card">

      <div class="card-block">
        <header>
          <h1 class="entry-title"><?php the_title(); ?></h1>
          <?php get_template_part('templates/entry-meta');
          ?>
        </header>
        <div class="entry-content">
            <?php

            // Remove embedded featured image thumbnail from post.

            if(has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('thumbnail'); ?>
            <?php else : ?>
          <!--  <img class="card-img-top" src="holder.js/800x400">-->
            <?php endif; ?>
          <?php the_content(); ?>
          <?php $docs_excerpt = get_field( 'docs_excerpt' ); ?>
          <?php $pdf_type = get_field( 'pdf_type' ); ?>
          <?php $category_id = get_field( 'category' ); ?>
          <?php
          $svgPath = get_template_directory() . '/dist/adobe.svg';                            // adobe logo doc SVG
          $svg = file_get_contents( $svgPath );                                               // Sets content of file in var
          ?>


          <div><p><span class="list-inline-item terms" ><?php echo get_cat_name( $category_id ) ?></span></p></div>


          
          <div><p><?php echo $docs_excerpt; ?></p></div>

          <?php if ( $pdf_type ) { ?>
            <strong>View:</strong>&nbsp; <a href="<?php echo $pdf_type['url']; ?>" target="_blank" title="View: '<?php echo  $pdf_type['filename']  ?>' "><?php echo $svg; ?>  <?php echo $pdf_type['filename']; ?></a>
          <?php } ?>



        </div>
        <footer>
          <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
        </footer>
        <?php // Customer requested no commenting at this time
        //comments_template('/templates/comments.php'); ?>
      </div>
    </div>
  </article>
<?php endwhile; ?>
