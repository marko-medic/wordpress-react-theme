<?php
get_header();

while(have_posts()):
    the_post();
    pageBanner([
        "subtitle" => "Custom subtitle",
        "photo" => "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTXgdJyjlbNXbZEAWIf1B-P4ZsaaN_mAvCwkWTlzuuifKSlNsRA&usqp=CAU"
    ]);
?>

  <div class="container container--narrow page-section">
      <?php
        $parentID = wp_get_post_parent_id(get_the_ID());
        if ($parentID): ?>
    <div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="<?=get_permalink($parentID)?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?=get_the_title($parentID)?></a> <span class="metabox__main"><?=get_the_title()?></span></p>
    </div>

      <?php
      endif;
      $childArray = get_pages(['child_of' => get_the_ID()]);
      if($parentID or $childArray): ?>
    <div class="page-links">
      <h2 class="page-links__title"><a href=<?=get_permalink($parentID)?>><?=get_the_title($parentID)?></a></h2>
      <ul class="min-list">
        <?php
            wp_list_pages([
                    "title_li" => null,
                    "child_of" => $parentID ?? get_the_ID(),
                    'sort_column' => "menu_order"
            ]);
        ?>
      </ul>
          </div>
    <? endif ?>

    <div class="generic-content">
      <?php the_content()?>
    </div>

  </div>
<?php 
    endwhile;
    get_footer();
?>

