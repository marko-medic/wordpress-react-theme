<?php
get_header();

?>

<div class="blog-page">
    <div class="container container--main">
        <?php
        while (have_posts()) :
            the_post();
        ?>
            <div class="post-item">
                <h2 class="post-item__headline"><a class="post-item__headline-link" href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a></h2>
                <div class="metabox">
                    <p class="post-item__desc">Posted <?= get_the_time("F - Y") ?> in <?= get_the_category_list(", ") ?> by <?= get_the_author_posts_link() ?></p>
                </div>
                <div class="post-item__thumbnail">
                    <a class="post-item__thumnail-link" href="<?= get_the_permalink() ?>">
                        <?php if (has_post_thumbnail()) :
                            echo get_the_post_thumbnail(null, "blog-post-thumbnail");
                        endif; ?>
                    </a>
                </div>
                <div class="post-item__content">
                    <?= get_the_content() ?>
                    <br>
                </div>
            </div>
            <div class="post-pag-wrap">
                <?php
                $prevPost = get_previous_post(false);
                if ($prevPost) :
                    $prevThumbnail = get_the_post_thumbnail($prevPost->ID, "paginate-post-thumbnail");
                ?>
                    <div class="post-pag-container post-pag-container--prev">
                        <div class="post-pag__col">
                            <?php previous_post_link('<div class="post-pag__item">%link</div>', "$prevThumbnail", false) ?>
                        </div>
                        <div class="post-pag__col post-pag__col--ml">
                            <?php
                            previous_post_link('<div class="post-pag__title-link">%link</div>', '« Previous', false);
                            previous_post_link('<div class="post-pag__item">%link</div>', '%title', false);
                            ?>
                        </div>
                    </div> <!-- end of post-container-prev -->

                <?php
                endif;
                $nextPost = get_next_post(false);
                if ($nextPost) :
                    $nextThumbnail = get_the_post_thumbnail($nextPost->ID, "paginate-post-thumbnail");
                ?>

                    <div class="post-pag-container post-pag-container--next">
                        <div class="post-pag__col">
                            <?php
                            next_post_link('<div class="post-pag__title-link">%link</div>', 'Next »', false);
                            next_post_link('<div class="post-pag__item">%link</div>', '%title', false);
                            ?>
                        </div>
                        <div class="post-pag__col post-pag__col--ml">
                            <?php next_post_link('<div class="post-pag__item">%link</div>', "$nextThumbnail", false) ?>
                        </div>
                    </div> <!-- end of post-container-next -->

                <?php endif ?>
            </div> <!-- end of post-pag-wrap -->
        <?php
        endwhile;

        ?>
    </div>
</div>

<?php get_footer(); ?>