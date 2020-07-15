<?php

get_header();

?>

<div class="container container--narrow page-section">
    <?php
    if (have_posts()) {
        while (have_posts()) :
            the_post();
    ?>
            <div class="post-item">
                <h2 class="headline headline--medium headline--post-title"><a href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a></h2>
                <div class="metabox">
                    <p>Posted by <?= get_the_author_posts_link() ?> on date: <?= get_the_time("F - Y") ?> in <?= get_the_category_list(", ") ?></p>
                </div>
                <div class="generic_content">
                    <?= get_the_excerpt() ?>
                    <br>
                    <a class="btn btn--blue" href="<?= get_the_permalink() ?>">Continue reading >></a>
                </div>
            </div>
    <?php
        endwhile;
        echo paginate_links();
    } else {
        echo '<h2 class="headline headline--small-plus">No results match that search.</h2>';
    }

    get_search_form();

    ?>

</div>

<?php get_footer();

?>