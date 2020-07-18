<div class="flex-meta  justify-content-between">
  <time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time>
</div>
<div class="flex-meta cat ">
  <?php the_category(', '); ?>
</div>